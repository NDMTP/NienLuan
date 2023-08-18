# %% [markdown]
# ***Importing all the Necessary libraries***

# %% [code] {"papermill":{"duration":8.438843,"end_time":"2022-09-16T22:09:16.603738","exception":false,"start_time":"2022-09-16T22:09:08.164895","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:21:01.686956Z","iopub.execute_input":"2023-07-09T08:21:01.687674Z","iopub.status.idle":"2023-07-09T08:21:10.583152Z","shell.execute_reply.started":"2023-07-09T08:21:01.68764Z","shell.execute_reply":"2023-07-09T08:21:10.582161Z"}}
import numpy as np 
import pandas as pd 
import matplotlib.pyplot as plt 
import seaborn as sns 
import tensorflow as tf 
import os 
import matplotlib.image as mpimg
import random
from tensorflow.keras import layers
from tensorflow.keras.preprocessing.image import ImageDataGenerator 
from sklearn.model_selection import train_test_split 
from tensorflow.keras.utils import load_img, img_to_array
import pathlib
import numpy as np

# %% [markdown] {"papermill":{"duration":0.011808,"end_time":"2022-09-16T22:09:16.628392","exception":false,"start_time":"2022-09-16T22:09:16.616584","status":"completed"},"tags":[]}
# ***Definning the dataset path***
# * *os.walk() function: to traverse a directory tree starting from the path "../input/fruit-recognition".*
# * *The current directory path is stored in the variable dirpath, the list of subdirectory names is stored in the variable dirnames, and the list of filenames is stored in the variable filenames.*

# %% [code] {"papermill":{"duration":15.475357,"end_time":"2022-09-16T22:09:32.115732","exception":false,"start_time":"2022-09-16T22:09:16.640375","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:21:10.585075Z","iopub.execute_input":"2023-07-09T08:21:10.585741Z","iopub.status.idle":"2023-07-09T08:21:18.538766Z","shell.execute_reply.started":"2023-07-09T08:21:10.585713Z","shell.execute_reply":"2023-07-09T08:21:18.537757Z"}}
for dirpath, dirnames, filenames in os.walk("../input/fruit-recognition"):
    print(f"There are {len(dirnames)} directories and {len(filenames)} images in '{dirpath}'.")

# %% [markdown] {"papermill":{"duration":0.013224,"end_time":"2022-09-16T22:09:32.14353","exception":false,"start_time":"2022-09-16T22:09:32.130306","status":"completed"},"tags":[]}
# ***Setting path for TRAIN AND TEST***

# %% [code] {"papermill":{"duration":0.021547,"end_time":"2022-09-16T22:09:32.178666","exception":false,"start_time":"2022-09-16T22:09:32.157119","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:21:18.539971Z","iopub.execute_input":"2023-07-09T08:21:18.540342Z","iopub.status.idle":"2023-07-09T08:21:18.545241Z","shell.execute_reply.started":"2023-07-09T08:21:18.540309Z","shell.execute_reply":"2023-07-09T08:21:18.544308Z"}}
train_path = "../input/fruit-recognition/train/train/"
test_path = "../input/fruit-recognition/test/test/"

# %% [markdown]
# ***Getting the Different class names from the directory***

# %% [code] {"papermill":{"duration":0.025513,"end_time":"2022-09-16T22:09:32.218209","exception":false,"start_time":"2022-09-16T22:09:32.192696","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:21:18.547866Z","iopub.execute_input":"2023-07-09T08:21:18.548169Z","iopub.status.idle":"2023-07-09T08:21:18.557129Z","shell.execute_reply.started":"2023-07-09T08:21:18.548141Z","shell.execute_reply":"2023-07-09T08:21:18.555811Z"}}
data_dir = pathlib.Path(train_path) 
class_names = np.array(sorted([item.name for item in data_dir.glob('*')])) 
print(class_names)

# %% [markdown]
# ***Plot a grid of images from a training dataset***

# %% [code] {"papermill":{"duration":0.024298,"end_time":"2022-09-16T22:09:32.256447","exception":false,"start_time":"2022-09-16T22:09:32.232149","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:21:18.558797Z","iopub.execute_input":"2023-07-09T08:21:18.559124Z","iopub.status.idle":"2023-07-09T08:21:18.566098Z","shell.execute_reply.started":"2023-07-09T08:21:18.559094Z","shell.execute_reply":"2023-07-09T08:21:18.565084Z"}}
def view_random_image(target_dir, target_class):
  # Setup target directory (we'll view images from here)
  target_folder = target_dir+target_class

  # Get a random image path
  random_image = random.sample(os.listdir(target_folder), 100)

  # Read in the image and plot it using matplotlib
  img = mpimg.imread(target_folder + "/" + random_image[0])
  plt.imshow(img)
  plt.title(target_class)
  plt.axis("off");

  return img

# %% [code] {"papermill":{"duration":1.613055,"end_time":"2022-09-16T22:09:33.8832","exception":false,"start_time":"2022-09-16T22:09:32.270145","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:21:18.567434Z","iopub.execute_input":"2023-07-09T08:21:18.568158Z","iopub.status.idle":"2023-07-09T08:21:21.307221Z","shell.execute_reply.started":"2023-07-09T08:21:18.568129Z","shell.execute_reply":"2023-07-09T08:21:21.306117Z"}}
plt.figure(figsize = (15,15))
# View a random image from the training dataset for all classes
for i in range(33):
    plt.subplot(5,8,i+1)
    img = view_random_image(target_dir=train_path,
                        target_class=class_names[i])

# %% [markdown] {"papermill":{"duration":0.022803,"end_time":"2022-09-16T22:09:33.928977","exception":false,"start_time":"2022-09-16T22:09:33.906174","status":"completed"},"tags":[]}
# ***Preparing VALIDATION Data***
# 
# *Collects Information about the training dataset by traversing the directory tree using os.walk() and populating a dictionary called train_val_data.*

# %% [code] {"papermill":{"duration":0.111993,"end_time":"2022-09-16T22:09:34.063641","exception":false,"start_time":"2022-09-16T22:09:33.951648","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:21:21.308197Z","iopub.execute_input":"2023-07-09T08:21:21.308509Z","iopub.status.idle":"2023-07-09T08:21:21.404912Z","shell.execute_reply.started":"2023-07-09T08:21:21.308481Z","shell.execute_reply":"2023-07-09T08:21:21.404124Z"}}
train_val_data = {'path' : [],
       'filename': [],
       'label': []}
for dirpath, dirnames, filenames in os.walk(train_path):
    for f in filenames:
        train_val_data['path'].append(dirpath)
        train_val_data['filename'].append(f)
        train_val_data['label'].append(f.split('_')[0])

# %% [code] {"papermill":{"duration":0.048876,"end_time":"2022-09-16T22:09:34.134618","exception":false,"start_time":"2022-09-16T22:09:34.085742","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:21:21.406336Z","iopub.execute_input":"2023-07-09T08:21:21.406883Z","iopub.status.idle":"2023-07-09T08:21:21.428128Z","shell.execute_reply.started":"2023-07-09T08:21:21.406852Z","shell.execute_reply":"2023-07-09T08:21:21.427208Z"}}
train_val_data_df = pd.DataFrame(train_val_data)
train_val_data_df.head()

# %% [markdown]
# ***Prepare the Testing Data***

# %% [code] {"papermill":{"duration":1.388321,"end_time":"2022-09-16T22:09:35.546434","exception":false,"start_time":"2022-09-16T22:09:34.158113","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:21:21.429353Z","iopub.execute_input":"2023-07-09T08:21:21.429755Z","iopub.status.idle":"2023-07-09T08:21:22.561232Z","shell.execute_reply.started":"2023-07-09T08:21:21.429725Z","shell.execute_reply":"2023-07-09T08:21:22.560323Z"}}
#Read test data and create a dataframe
test_data = {'path' : [],
       'filename': []}
for dirpath, dirnames, filenames in os.walk(test_path):
    for f in filenames:
        test_data['path'].append(dirpath)
        test_data['filename'].append(f)

# %% [code] {"papermill":{"duration":0.037982,"end_time":"2022-09-16T22:09:35.609144","exception":false,"start_time":"2022-09-16T22:09:35.571162","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:21:22.565659Z","iopub.execute_input":"2023-07-09T08:21:22.567646Z","iopub.status.idle":"2023-07-09T08:21:22.577738Z","shell.execute_reply.started":"2023-07-09T08:21:22.56762Z","shell.execute_reply":"2023-07-09T08:21:22.576549Z"}}
test_data_df = pd.DataFrame(test_data)
test_data_df.head()

# %% [markdown] {"papermill":{"duration":0.023999,"end_time":"2022-09-16T22:09:36.39505","exception":false,"start_time":"2022-09-16T22:09:36.371051","status":"completed"},"tags":[]}
# ***Read Images and create numpy data array***

# %% [code] {"papermill":{"duration":120.489023,"end_time":"2022-09-16T22:11:36.909052","exception":false,"start_time":"2022-09-16T22:09:36.420029","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:21:22.579336Z","iopub.execute_input":"2023-07-09T08:21:22.580487Z","iopub.status.idle":"2023-07-09T08:22:26.390804Z","shell.execute_reply.started":"2023-07-09T08:21:22.580456Z","shell.execute_reply":"2023-07-09T08:22:26.389842Z"}}

images = []
label = [] 

for _, d in train_val_data_df.iterrows():
    img = load_img(os.path.join(d['path'],d['filename']))
    images.append(img_to_array(img))
    label.append(d['label'])

# %% [code] {"papermill":{"duration":3.333301,"end_time":"2022-09-16T22:11:40.268384","exception":false,"start_time":"2022-09-16T22:11:36.935083","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:22:26.392193Z","iopub.execute_input":"2023-07-09T08:22:26.39254Z","iopub.status.idle":"2023-07-09T08:22:27.010877Z","shell.execute_reply.started":"2023-07-09T08:22:26.392508Z","shell.execute_reply":"2023-07-09T08:22:27.009959Z"}}
images = np.array(images)
labels = np.array(label)
print(f"Complete data images shape: {images.shape} and label shape: {labels.shape}")

# %% [code] {"papermill":{"duration":50.823223,"end_time":"2022-09-16T22:12:31.115719","exception":false,"start_time":"2022-09-16T22:11:40.292496","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:22:27.012354Z","iopub.execute_input":"2023-07-09T08:22:27.012718Z","iopub.status.idle":"2023-07-09T08:22:47.367966Z","shell.execute_reply.started":"2023-07-09T08:22:27.012685Z","shell.execute_reply":"2023-07-09T08:22:47.366977Z"}}
test_images = []

for _, d in test_data_df.iterrows():
    img = load_img(os.path.join(d['path'],d['filename']))
    test_images.append(img_to_array(img))
    
test_images = np.array(test_images)
print(f"Test images shape: {test_images.shape} ")

# %% [markdown] {"papermill":{"duration":0.025456,"end_time":"2022-09-16T22:12:31.165727","exception":false,"start_time":"2022-09-16T22:12:31.140271","status":"completed"},"tags":[]}
# ***Label Encoding***

# %% [code] {"papermill":{"duration":0.042329,"end_time":"2022-09-16T22:12:31.232274","exception":false,"start_time":"2022-09-16T22:12:31.189945","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:22:47.369335Z","iopub.execute_input":"2023-07-09T08:22:47.369655Z","iopub.status.idle":"2023-07-09T08:22:47.385837Z","shell.execute_reply.started":"2023-07-09T08:22:47.369631Z","shell.execute_reply":"2023-07-09T08:22:47.384136Z"}}
class_indices = dict(zip(class_names, range(len(class_names))))

labels_encoded = list(map(class_indices.get, labels))

#Convert to categorical data using tensorflow 
#labels to One-hot encoded
label_categorical = tf.keras.utils.to_categorical(labels_encoded, num_classes=len(class_names), dtype='uint8')


# %% [markdown] {"papermill":{"duration":0.024002,"end_time":"2022-09-16T22:12:31.280833","exception":false,"start_time":"2022-09-16T22:12:31.256831","status":"completed"},"tags":[]}
# ***Train And Validation split***

# %% [code] {"papermill":{"duration":1.81415,"end_time":"2022-09-16T22:12:33.119695","exception":false,"start_time":"2022-09-16T22:12:31.305545","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:22:47.387181Z","iopub.execute_input":"2023-07-09T08:22:47.387754Z","iopub.status.idle":"2023-07-09T08:22:48.764875Z","shell.execute_reply.started":"2023-07-09T08:22:47.387724Z","shell.execute_reply":"2023-07-09T08:22:48.763883Z"}}
train_im, valid_im, train_lab, valid_lab = train_test_split(images, label_categorical, test_size=0.20, 
                                                            stratify=label_categorical, 
                                                            random_state=40, shuffle = True)

# %% [code] {"papermill":{"duration":0.036597,"end_time":"2022-09-16T22:12:33.182459","exception":false,"start_time":"2022-09-16T22:12:33.145862","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:22:48.766496Z","iopub.execute_input":"2023-07-09T08:22:48.766839Z","iopub.status.idle":"2023-07-09T08:22:48.772926Z","shell.execute_reply.started":"2023-07-09T08:22:48.766807Z","shell.execute_reply":"2023-07-09T08:22:48.771979Z"}}
print ("train data shape after the split: ", train_im.shape)
print ('new validation data shape: ', valid_im.shape)
print ("validation labels shape: ", valid_lab.shape)

# %% [code] {"papermill":{"duration":2.188143,"end_time":"2022-09-16T22:12:35.397349","exception":false,"start_time":"2022-09-16T22:12:33.209206","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:22:48.774535Z","iopub.execute_input":"2023-07-09T08:22:48.775585Z","iopub.status.idle":"2023-07-09T08:22:55.539303Z","shell.execute_reply.started":"2023-07-09T08:22:48.775554Z","shell.execute_reply":"2023-07-09T08:22:55.538219Z"}}
print ('train im and label types: ', type(train_im), type(train_lab))

training_data = tf.data.Dataset.from_tensor_slices((train_im, train_lab))
validation_data = tf.data.Dataset.from_tensor_slices((valid_im, valid_lab))
test_data = tf.data.Dataset.from_tensor_slices(test_images)

print ('check types; ', type(training_data), type(validation_data), type(test_data))

# %% [code] {"papermill":{"duration":2.07673,"end_time":"2022-09-16T22:12:37.501838","exception":false,"start_time":"2022-09-16T22:12:35.425108","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:22:55.540639Z","iopub.execute_input":"2023-07-09T08:22:55.541237Z","iopub.status.idle":"2023-07-09T08:22:57.392995Z","shell.execute_reply.started":"2023-07-09T08:22:55.541206Z","shell.execute_reply":"2023-07-09T08:22:57.390425Z"}}
### check using element_spec

print (training_data.element_spec)
print (validation_data.element_spec)

### as expected, tensors of image and original label shape


### create an iterator and turn it into numpy array 
train_iter = iter(training_data)
print(next(train_iter)[0].numpy(), '\n', next(train_iter)[1].numpy(), np.argmax(next(train_iter)[1].numpy()))

# %% [code] {"papermill":{"duration":0.689466,"end_time":"2022-09-16T22:12:38.21767","exception":false,"start_time":"2022-09-16T22:12:37.528204","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:22:57.394397Z","iopub.execute_input":"2023-07-09T08:22:57.394993Z","iopub.status.idle":"2023-07-09T08:22:57.409521Z","shell.execute_reply.started":"2023-07-09T08:22:57.394961Z","shell.execute_reply":"2023-07-09T08:22:57.408349Z"}}
train_iter_im, train_iter_label = next(iter(training_data))
print (train_iter_im.numpy().shape, train_iter_label.numpy().shape)

# %% [code] {"papermill":{"duration":0.716612,"end_time":"2022-09-16T22:12:38.959121","exception":false,"start_time":"2022-09-16T22:12:38.242509","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:22:57.410485Z","iopub.execute_input":"2023-07-09T08:22:57.413501Z","iopub.status.idle":"2023-07-09T08:22:57.426435Z","shell.execute_reply.started":"2023-07-09T08:22:57.41347Z","shell.execute_reply":"2023-07-09T08:22:57.425579Z"}}
train_iter_im1, train_iter_label1 = next(training_data.as_numpy_iterator())
print (train_iter_im1.shape, train_iter_label1.shape)

# %% [code] {"papermill":{"duration":2.45875,"end_time":"2022-09-16T22:12:41.444661","exception":false,"start_time":"2022-09-16T22:12:38.985911","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:22:57.427734Z","iopub.execute_input":"2023-07-09T08:22:57.428322Z","iopub.status.idle":"2023-07-09T08:23:01.340628Z","shell.execute_reply.started":"2023-07-09T08:22:57.428292Z","shell.execute_reply":"2023-07-09T08:23:01.339648Z"}}
check_list = list(training_data.as_numpy_iterator())
print (len(check_list), check_list[1])

# %% [code] {"papermill":{"duration":0.652219,"end_time":"2022-09-16T22:12:42.121665","exception":false,"start_time":"2022-09-16T22:12:41.469446","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:23:01.342154Z","iopub.execute_input":"2023-07-09T08:23:01.342527Z","iopub.status.idle":"2023-07-09T08:23:02.385756Z","shell.execute_reply.started":"2023-07-09T08:23:01.342495Z","shell.execute_reply":"2023-07-09T08:23:02.38473Z"}}

fig = plt.figure(figsize=(10,10))
for i in range(12):
    plt.subplot(4,3,i+1)
    plt.xticks([])
    plt.yticks([])
    plt.grid(False)
    plt.imshow(check_list[i][0]/255.)
    plt.xlabel(class_names[np.argmax(check_list[i][1])], fontsize=13)
plt.tight_layout()    
plt.show()

# %% [markdown] {"papermill":{"duration":0.031418,"end_time":"2022-09-16T22:12:42.185303","exception":false,"start_time":"2022-09-16T22:12:42.153885","status":"completed"},"tags":[]}
# ***Data Pipeline using`tf.data` & Prefetching***

# %% [code] {"papermill":{"duration":0.069621,"end_time":"2022-09-16T22:12:42.286537","exception":false,"start_time":"2022-09-16T22:12:42.216916","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:23:02.387297Z","iopub.execute_input":"2023-07-09T08:23:02.387894Z","iopub.status.idle":"2023-07-09T08:23:02.415238Z","shell.execute_reply.started":"2023-07-09T08:23:02.387863Z","shell.execute_reply":"2023-07-09T08:23:02.414321Z"}}
rescale_data = tf.keras.Sequential([
    layers.experimental.preprocessing.Rescaling(1/255.)
])

data_augmenation = tf.keras.Sequential([
    layers.experimental.preprocessing.RandomFlip(mode = "horizontal"),
    #layers.experimental.preprocessing.RandomRotation(0.1)
])

# %% [code] {"papermill":{"duration":0.342307,"end_time":"2022-09-16T22:12:42.660002","exception":false,"start_time":"2022-09-16T22:12:42.317695","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:23:02.417094Z","iopub.execute_input":"2023-07-09T08:23:02.417498Z","iopub.status.idle":"2023-07-09T08:23:03.08212Z","shell.execute_reply.started":"2023-07-09T08:23:02.417463Z","shell.execute_reply":"2023-07-09T08:23:03.081158Z"}}
random_image_index = random.randint(0,len(train_im))
img = rescale_data(train_im[random_image_index])
img = data_augmenation(img)
plt.imshow(img)

# %% [code] {"papermill":{"duration":0.047335,"end_time":"2022-09-16T22:12:42.753724","exception":false,"start_time":"2022-09-16T22:12:42.706389","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:23:03.083582Z","iopub.execute_input":"2023-07-09T08:23:03.08457Z","iopub.status.idle":"2023-07-09T08:23:03.092661Z","shell.execute_reply.started":"2023-07-09T08:23:03.084537Z","shell.execute_reply":"2023-07-09T08:23:03.091565Z"}}
BATCH_SIZE = 128 
AUTOTUNE = tf.data.AUTOTUNE 

def prepare(ds, shuffle=False, augment = False, test = False):
    if test:
        ds = ds.map(lambda x: (rescale_data(x)), num_parallel_calls=AUTOTUNE)
    else:
        ds = ds.map(lambda x, y: (rescale_data(x), y), num_parallel_calls=AUTOTUNE)
    
    if shuffle:
        ds = ds.shuffle(1000)
    
    #batch the data 
    ds = ds.batch(BATCH_SIZE)
    
    # Use data augmentation only on the training set.
    if augment:
        ds = ds.map(lambda x, y: (data_augmenation(x, training=True), y), 
                num_parallel_calls=AUTOTUNE)
    
    # Use buffered prefetching on all datasets.
    return ds.prefetch(buffer_size=AUTOTUNE)

# %% [code] {"papermill":{"duration":0.154513,"end_time":"2022-09-16T22:12:42.942154","exception":false,"start_time":"2022-09-16T22:12:42.787641","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:23:03.094389Z","iopub.execute_input":"2023-07-09T08:23:03.094749Z","iopub.status.idle":"2023-07-09T08:23:03.250618Z","shell.execute_reply.started":"2023-07-09T08:23:03.094719Z","shell.execute_reply":"2023-07-09T08:23:03.249629Z"}}
train_ds = prepare(training_data, shuffle = True, augment = True)
val_ds = prepare(validation_data)
test_ds = prepare(test_data, test=True)

# %% [markdown] {"papermill":{"duration":0.034785,"end_time":"2022-09-16T22:12:43.010401","exception":false,"start_time":"2022-09-16T22:12:42.975616","status":"completed"},"tags":[]}
# ***CNN Model***
# * *The model consists of a convolutional layer, a max pooling layer, a flatten layer, and a dense (fully connected) layer with a softmax activation function*

# %% [code] {"papermill":{"duration":0.092862,"end_time":"2022-09-16T22:12:43.136476","exception":false,"start_time":"2022-09-16T22:12:43.043614","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:23:03.252323Z","iopub.execute_input":"2023-07-09T08:23:03.252675Z","iopub.status.idle":"2023-07-09T08:23:03.321165Z","shell.execute_reply.started":"2023-07-09T08:23:03.252642Z","shell.execute_reply":"2023-07-09T08:23:03.320194Z"}}
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
               optimizer = tf.keras.optimizers.Adam(),
               metrics = ['accuracy'])

# %% [code] {"papermill":{"duration":0.042118,"end_time":"2022-09-16T22:12:43.210674","exception":false,"start_time":"2022-09-16T22:12:43.168556","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:23:03.326526Z","iopub.execute_input":"2023-07-09T08:23:03.326823Z","iopub.status.idle":"2023-07-09T08:23:03.346344Z","shell.execute_reply.started":"2023-07-09T08:23:03.326798Z","shell.execute_reply":"2023-07-09T08:23:03.345586Z"}}
model_1.summary()

# %% [markdown]
# ***Fitting The Model***

# %% [code] {"papermill":{"duration":73.138945,"end_time":"2022-09-16T22:13:56.383876","exception":false,"start_time":"2022-09-16T22:12:43.244931","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:23:03.347348Z","iopub.execute_input":"2023-07-09T08:23:03.34769Z","iopub.status.idle":"2023-07-09T08:24:59.559676Z","shell.execute_reply.started":"2023-07-09T08:23:03.347658Z","shell.execute_reply":"2023-07-09T08:24:59.558562Z"}}
#Fit the model on training data 
history_1 = model_1.fit(train_ds,
                       epochs =25,
                       validation_data= val_ds)

# %% [markdown]
# ***Plotting Graph for loss & accuracy***

# %% [code] {"papermill":{"duration":0.306299,"end_time":"2022-09-16T22:13:58.464669","exception":false,"start_time":"2022-09-16T22:13:58.15837","status":"completed"},"tags":[],"execution":{"iopub.status.busy":"2023-07-09T08:24:59.562579Z","iopub.execute_input":"2023-07-09T08:24:59.56326Z","iopub.status.idle":"2023-07-09T08:24:59.889093Z","shell.execute_reply.started":"2023-07-09T08:24:59.563223Z","shell.execute_reply":"2023-07-09T08:24:59.888138Z"}}
#loss and accuracy plot 
pd.DataFrame(history_1.history).plot()

# %% [markdown]
# ***Saving The Model***

# %% [code] {"execution":{"iopub.status.busy":"2023-07-09T08:24:59.890445Z","iopub.execute_input":"2023-07-09T08:24:59.891449Z","iopub.status.idle":"2023-07-09T08:24:59.938494Z","shell.execute_reply.started":"2023-07-09T08:24:59.891414Z","shell.execute_reply":"2023-07-09T08:24:59.937577Z"}}
model_1.save('model.h5')

# %% [code] {"execution":{"iopub.status.busy":"2023-07-09T08:24:59.939933Z","iopub.execute_input":"2023-07-09T08:24:59.940301Z","iopub.status.idle":"2023-07-09T08:25:00.020603Z","shell.execute_reply.started":"2023-07-09T08:24:59.940255Z","shell.execute_reply":"2023-07-09T08:25:00.019647Z"}}
loaded_model = tf.keras.models.load_model('/kaggle/working/model.h5')

# %% [code] {"execution":{"iopub.status.busy":"2023-07-09T08:25:00.022009Z","iopub.execute_input":"2023-07-09T08:25:00.022338Z","iopub.status.idle":"2023-07-09T08:25:00.027958Z","shell.execute_reply.started":"2023-07-09T08:25:00.022307Z","shell.execute_reply":"2023-07-09T08:25:00.027128Z"}}
def preprocess_images(path):
    img = image.load_img(path, target_size=(224, 224))

    img_array = image.img_to_array(img)

    img_array = np.expand_dims(img_array, axis=0)

    img_preprocessed = img_array / 255.0
    
    return img_preprocessed

# %% [code]
