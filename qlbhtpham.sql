/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     8/14/2023 3:50:26 PM                         */
/*==============================================================*/


drop table if exists CHITIETGIOHANG;

drop table if exists GIAOHANG;

drop table if exists GIOHANG;

drop table if exists HINHANH;

drop table if exists HOADON;

drop table if exists KHUVUC;

drop table if exists LOAISANPHAM;

drop table if exists NGUOIDUNG;

drop table if exists SANPHAM;

/*==============================================================*/
/* Table: CHITIETGIOHANG                                        */
/*==============================================================*/
create table CHITIETGIOHANG
(
   MAGIOHANG            int not null,
   MASP                 varchar(10) not null,
   SOLUONGSP            char(10),
   primary key (MAGIOHANG, MASP)
);

/*==============================================================*/
/* Table: GIAOHANG                                              */
/*==============================================================*/
create table GIAOHANG
(
   MAKHUVUC             varchar(20) not null,
   MAHOADON             int not null,
   PHIGIAO              int,
   GHICHU               varchar(70),
   primary key (MAKHUVUC, MAHOADON)
);

/*==============================================================*/
/* Table: GIOHANG                                               */
/*==============================================================*/
create table GIOHANG
(
   MAGIOHANG            int not null,
   MAHOADON             int,
   EMAIL                varchar(50) not null,
   NGAYCAPNHAT          date,
   primary key (MAGIOHANG)
);

/*==============================================================*/
/* Table: HINHANH                                               */
/*==============================================================*/
create table HINHANH
(
   MAHINHANH            int not null,
   MASP                 varchar(10) not null,
   TENHINHANH           varchar(50),
   LINKANH              varchar(200),
   primary key (MAHINHANH)
);

/*==============================================================*/
/* Table: HOADON                                                */
/*==============================================================*/
create table HOADON
(
   MAHOADON             int not null,
   MAGIOHANG            int not null,
   NGAYLAP              datetime,
   TRANGTHAI            varchar(70),
   GHICHU               varchar(70),
   primary key (MAHOADON)
);

/*==============================================================*/
/* Table: KHUVUC                                                */
/*==============================================================*/
create table KHUVUC
(
   MAKHUVUC             varchar(20) not null,
   TENKHUVUC            varchar(50),
   primary key (MAKHUVUC)
);

/*==============================================================*/
/* Table: LOAISANPHAM                                           */
/*==============================================================*/
create table LOAISANPHAM
(
   MALOAI               varchar(10) not null,
   TENLOAI              varchar(50) not null,
   primary key (MALOAI)
);

/*==============================================================*/
/* Table: NGUOIDUNG                                             */
/*==============================================================*/
create table NGUOIDUNG
(
   EMAIL                varchar(50) not null,
   MATKHAU              varchar(70) not null,
   DIACHI               varchar(100) not null,
   TEN                  varchar(50) not null,
   SDT                  varchar(12) not null,
   PHANQUYEN            varchar(20) not null,
   primary key (EMAIL)
);

/*==============================================================*/
/* Table: SANPHAM                                               */
/*==============================================================*/
create table SANPHAM
(
   MASP                 varchar(10) not null,
   MALOAI               varchar(10) not null,
   MAHINHANH            int not null,
   TENSP_               varchar(100),
   DONGIABANSP          int,
   MOTA                 varchar(300),
   primary key (MASP)
);

alter table CHITIETGIOHANG add constraint FK_GIOHANG_CTGIOHANG foreign key (MAGIOHANG)
      references GIOHANG (MAGIOHANG) on delete restrict on update restrict;

alter table CHITIETGIOHANG add constraint FK_SP_CTGIOHANG foreign key (MASP)
      references SANPHAM (MASP) on delete restrict on update restrict;

alter table GIAOHANG add constraint FK_HOADON_GIAOHANG foreign key (MAHOADON)
      references HOADON (MAHOADON) on delete restrict on update restrict;

alter table GIAOHANG add constraint FK_KHUVUC_GIAOHANG foreign key (MAKHUVUC)
      references KHUVUC (MAKHUVUC) on delete restrict on update restrict;

alter table GIOHANG add constraint FK_GIOHANGCUAKHACH foreign key (EMAIL)
      references NGUOIDUNG (EMAIL) on delete restrict on update restrict;

alter table GIOHANG add constraint FK_HOADONCUAGIOHANG foreign key (MAHOADON)
      references HOADON (MAHOADON) on delete restrict on update restrict;

alter table HINHANH add constraint FK_SP_HINHANH2 foreign key (MASP)
      references SANPHAM (MASP) on delete restrict on update restrict;

alter table HOADON add constraint FK_HOADONCUAGIOHANG2 foreign key (MAGIOHANG)
      references GIOHANG (MAGIOHANG) on delete restrict on update restrict;

alter table SANPHAM add constraint FK_LOAICUASP foreign key (MALOAI)
      references LOAISANPHAM (MALOAI) on delete restrict on update restrict;

alter table SANPHAM add constraint FK_SP_HINHANH foreign key (MAHINHANH)
      references HINHANH (MAHINHANH) on delete restrict on update restrict;

