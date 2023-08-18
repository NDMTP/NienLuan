import os
import pathlib
import numpy as np
import random
import matplotlib.image as mpimg
import matplotlib.pyplot as plt
import pandas as pd
import tensorflow as tf
from tensorflow.keras.utils import load_img, img_to_array
from tensorflow.keras.models import load_model
from sklearn.model_selection import train_test_split
import tensorflow as tf
from tensorflow.keras import layers
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Conv2D, MaxPool2D, Flatten, Dense

data_directory = r"C:\xampp\htdocs\NienLuan\kaggle_ai\train"  # Đường dẫn đến thư mục chứa dữ liệu

for dirpath, dirnames, filenames in os.walk(data_directory):
    print(f"There are {len(dirnames)} directories and {len(filenames)} images in '{dirpath}'.")

train_path = os.path.join(data_directory, "train")
test_path = os.path.join(data_directory, "test")

data_dir = pathlib.Path(train_path)
class_names = np.array(sorted([item.name for item in data_dir.glob('*')]))
print(class_names)

def view_random_image(target_dir, target_class):
    # Setup target directory (we'll view images from here)
    target_folder = os.path.join(target_dir, target_class)

    # Get a list of image filenames in the target directory
    image_files = [f for f in os.listdir(target_folder) if f.endswith(".jpg")]
    
    # Get a random image filename
    random_image_filename = random.choice(image_files)

    # Read in the image and plot it using matplotlib
    img = mpimg.imread(os.path.join(target_folder, random_image_filename))
    plt.imshow(img)
    plt.title(target_class)
    plt.axis("off")

    return img


fruit_dirs = [d for d in os.listdir(train_path) if os.path.isdir(os.path.join(train_path, d))]

plt.figure(figsize=(15, 15))
# View a random image from the training dataset for all classes
for i, class_name in enumerate(class_names):
    plt.subplot(5, 8, i + 1)
    img = view_random_image(target_dir=train_path, target_class=class_name)

    


train_val_data = {'path': [],
                  'filename': [],
                  'label': []}
for dirpath, dirnames, filenames in os.walk(train_path):
    for f in filenames:
        train_val_data['path'].append(dirpath)
        train_val_data['filename'].append(f)
        train_val_data['label'].append(f.split('_')[0])

train_val_data_df = pd.DataFrame(train_val_data)
train_val_data_df.head()

test_data = {'path': [],
             'filename': []}
for dirpath, dirnames, filenames in os.walk(test_path):
    for f in filenames:
        test_data['path'].append(dirpath)
        test_data['filename'].append(f)

test_data_df = pd.DataFrame(test_data)
test_data_df.head()

images = []
label = [] 

for _, d in train_val_data_df.iterrows():
    img = load_img(os.path.join(d['path'],d['filename']))
    images.append(img_to_array(img))
    label.append(d['label'])

images = np.array(images)
labels = np.array(label)
print(f"Complete data images shape: {images.shape} and label shape: {labels.shape}")

test_images = []

for _, d in test_data_df.iterrows():
    img = load_img(os.path.join(d['path'],d['filename']))
    test_images.append(img_to_array(img))

test_images = np.array(test_images)
print(f"Test images shape: {test_images.shape}")

class_indices = dict(zip(class_names, range(len(class_names))))
labels_encoded = list(map(class_indices.get, labels))

# Convert to categorical data using tensorflow 
# labels to One-hot encoded
label_categorical = tf.keras.utils.to_categorical(labels_encoded, num_classes=len(class_names), dtype='uint8')

train_im, valid_im, train_lab, valid_lab = train_test_split(images, label_categorical, test_size=0.20, 
                                                            stratify=label_categorical, 
                                                            random_state=40, shuffle=True)

print("train data shape after the split: ", train_im.shape)
print('new validation data shape: ', valid_im.shape)
print("validation labels shape: ", valid_lab.shape)

print('train im and label types: ', type(train_im), type(train_lab))

training_data = tf.data.Dataset.from_tensor_slices((train_im, train_lab))
validation_data = tf.data.Dataset.from_tensor_slices((valid_im, valid_lab))
test_data = tf.data.Dataset.from_tensor_slices(test_images)

print('check types; ', type(training_data), type(validation_data), type(test_data))

print("Training data element spec: ", training_data.element_spec)
print("Validation data element spec: ", validation_data.element_spec)

train_iter = iter(training_data)
train_iter_im, train_iter_label = next(train_iter)
print(train_iter_im.numpy().shape, train_iter_label.numpy().shape)

train_iter_im1, train_iter_label1 = next(training_data.as_numpy_iterator())
print(train_iter_im1.shape, train_iter_label1.shape)

check_list = list(training_data.as_numpy_iterator())
print(len(check_list), check_list[1])

fig = plt.figure(figsize=(10, 10))
for i in range(12):
    plt.subplot(4, 3, i + 1)
    plt.xticks([])
    plt.yticks([])
    plt.grid(False)
    plt.imshow(check_list[i][0] / 255.)
    plt.xlabel(class_names[np.argmax(check_list[i][1])], fontsize=13)
plt.tight_layout()    
plt.show()

rescale_data = tf.keras.Sequential([
    layers.experimental.preprocessing.Rescaling(1/255.)
])

data_augmentation = tf.keras.Sequential([
    layers.experimental.preprocessing.RandomFlip(mode="horizontal"),
    # layers.experimental.preprocessing.RandomRotation(0.1)
])

random_image_index = random.randint(0, len(train_im))
img = rescale_data(train_im[random_image_index])
img = data_augmentation(img)
plt.imshow(img)
plt.show()

BATCH_SIZE = 128 
AUTOTUNE = tf.data.AUTOTUNE 

def prepare(ds, shuffle=False, augment=False, test=False):
    if test:
        ds = ds.map(lambda x: (rescale_data(x)), num_parallel_calls=AUTOTUNE)
    else:
        ds = ds.map(lambda x, y: (rescale_data(x), y), num_parallel_calls=AUTOTUNE)
    
    if shuffle:
        ds = ds.shuffle(1000)
    
    # batch the data 
    ds = ds.batch(BATCH_SIZE)
    
    # Use data augmentation only on the training set.
    if augment:
        ds = ds.map(lambda x, y: (data_augmentation(x, training=True), y), 
                    num_parallel_calls=AUTOTUNE)
    
    # Use buffered prefetching on all datasets.
    return ds.prefetch(buffer_size=AUTOTUNE)

train_ds = prepare(training_data, shuffle=True, augment=True)
val_ds = prepare(validation_data)
test_ds = prepare(test_data, test=True)

model_1 = tf.keras.models.Sequential([
    tf.keras.layers.Conv2D(filters=5, 
                          kernel_size = 3,
                          activation = "relu",
                          input_shape = (100,100,3)),
    tf.keras.layers.MaxPool2D(pool_size =2,
                             padding='valid'),
    tf.keras.layers.Flatten(),
    tf.keras.layers.Dense(len(class_names), activation="softmax")
])

model_1.compile(loss="categorical_crossentropy",
               optimizer=tf.keras.optimizers.Adam(),
               metrics=['accuracy'])

model_1.summary()

history_1 = model_1.fit(train_ds,
                       epochs=25,
                       validation_data=val_ds)

# Plot the loss and accuracy
pd.DataFrame(history_1.history).plot()
plt.title("Model 1: Loss and Accuracy")
plt.xlabel("Epochs")
plt.ylabel("Value")
plt.show()

# Save the model using the Keras native format
model_1.save('model_1.keras')

# Load the model
loaded_model = tf.keras.models.load_model('model_1.keras')

import sys

# ... (các đoạn mã khác)

# Đường dẫn đến ảnh bạn muốn dự đoán
image_path = 'C:/xampp/htdocs/uploads/' + sys.argv[1]


# ...


# Đọc ảnh và tiến hành dự đoán
img = load_img(image_path, target_size=(100, 100))
img_array = img_to_array(img) / 255.0  # Chuẩn hóa ảnh
img_array = np.expand_dims(img_array, axis=0)  # Thêm chiều batch
prediction = loaded_model.predict(img_array)
predicted_class_index = np.argmax(prediction)
predicted_class = class_names[predicted_class_index]

print(f"Predicted class: {predicted_class}")