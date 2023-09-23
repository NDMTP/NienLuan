/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     9/19/2023 9:32:09 AM                         */
/*==============================================================*/


drop table if exists CHITIETHOADON;

drop table if exists DANHGIASP;

drop table if exists GIAOHANG;

drop table if exists HOADON;

drop table if exists KHUVUC;

drop table if exists KHUYENMAI;

drop table if exists LOAISANPHAM;

drop table if exists NGUOIDUNG;

drop table if exists PHUONGTHUCTT;

drop table if exists SANPHAM;

/*==============================================================*/
/* Table: CHITIETHOADON                                         */
/*==============================================================*/
create table CHITIETHOADON
(
   MAHOADON             int not null,
   MASP                 varchar(10) not null,
   SOLUONGSP            int,
   DONBAN               int,
   primary key (MAHOADON, MASP)
);

/*==============================================================*/
/* Table: DANHGIASP                                             */
/*==============================================================*/
create table DANHGIASP
(
   EMAIL                varchar(70) not null,
   MASP                 varchar(10) not null,
   NOIDUNGDG            varchar(300),
   LINKANHDG            varchar(30),
   primary key (EMAIL, MASP)
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
/* Table: HOADON                                                */
/*==============================================================*/
create table HOADON
(
   MAHOADON             int not null,
   MAKM                 varchar(10) not null,
   EMAIL                varchar(70) not null,
   MAPT                 varchar(20) not null,
   NGAYLAP              datetime,
   TRANGTHAIHOADON      varchar(40),
   primary key (MAHOADON)
);

/*==============================================================*/
/* Table: KHUVUC                                                */
/*==============================================================*/
create table KHUVUC
(
   MAKHUVUC             varchar(20) not null,
   TENKHUVUC            varchar(70),
   PHIGIAO              int,
   primary key (MAKHUVUC)
);

/*==============================================================*/
/* Table: KHUYENMAI                                             */
/*==============================================================*/
create table KHUYENMAI
(
   MAKM                 varchar(10) not null,
   PHANTRAMKM           decimal,
   DIEUKIENKM           int,
   NGAYBD               date,
   NGAYKT               date,
   primary key (MAKM)
);

/*==============================================================*/
/* Table: LOAISANPHAM                                           */
/*==============================================================*/
create table LOAISANPHAM
(
   MALOAI               varchar(10) not null,
   TENLOAI              varchar(50),
   primary key (MALOAI)
);

/*==============================================================*/
/* Table: NGUOIDUNG                                             */
/*==============================================================*/
create table NGUOIDUNG
(
   EMAIL                varchar(70) not null,
   MATKHAU              varchar(70) not null,
   DIACHI               varchar(100) not null,
   TEN                  varchar(50) not null,
   SDT                  varchar(12) not null,
   PHANQUYEN            varchar(20) not null,
   primary key (EMAIL)
);

/*==============================================================*/
/* Table: PHUONGTHUCTT                                          */
/*==============================================================*/
create table PHUONGTHUCTT
(
   MAPT                 varchar(20) not null,
   TENPT                varchar(40),
   primary key (MAPT)
);

/*==============================================================*/
/* Table: SANPHAM                                               */
/*==============================================================*/
create table SANPHAM
(
   MASP                 varchar(10) not null,
   MALOAI               varchar(10) not null,
   TENSP                varchar(100) not null,
   DONGIABANSP          varchar(100) not null,
   MOTA                 varchar(300) not null,
   LINKANH              varchar(200) not null,
   primary key (MASP)
);

alter table CHITIETHOADON add constraint FK_GIOHANG_CTGIOHANG foreign key (MAHOADON)
      references HOADON (MAHOADON) on delete restrict on update restrict;

alter table CHITIETHOADON add constraint FK_RELATIONSHIP_10 foreign key (MASP)
      references SANPHAM (MASP) on delete restrict on update restrict;

alter table DANHGIASP add constraint FK_DANHGIACUANGUOIDUNG foreign key (EMAIL)
      references NGUOIDUNG (EMAIL) on delete restrict on update restrict;

alter table DANHGIASP add constraint FK_DANHGIACUASP foreign key (MASP)
      references SANPHAM (MASP) on delete restrict on update restrict;

alter table GIAOHANG add constraint FK_HOADON_GIAOHANG foreign key (MAHOADON)
      references HOADON (MAHOADON) on delete restrict on update restrict;

alter table GIAOHANG add constraint FK_KHUVUC_GIAOHANG foreign key (MAKHUVUC)
      references KHUVUC (MAKHUVUC) on delete restrict on update restrict;

alter table HOADON add constraint FK_GIOHANGCUAKHACH foreign key (EMAIL)
      references NGUOIDUNG (EMAIL) on delete restrict on update restrict;

alter table HOADON add constraint FK_KHUYENMAI_HOADON foreign key (MAKM)
      references KHUYENMAI (MAKM) on delete restrict on update restrict;

alter table HOADON add constraint FK_PTTHANHTOANCUAHD foreign key (MAPT)
      references PHUONGTHUCTT (MAPT) on delete restrict on update restrict;

alter table SANPHAM add constraint FK_LOAICUASP foreign key (MALOAI)
      references LOAISANPHAM (MALOAI) on delete restrict on update restrict;

