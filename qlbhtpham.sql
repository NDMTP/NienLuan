/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     8/29/2023 4:01:43 PM                         */
/*==============================================================*/


drop table if exists CHITIETHOADON;

drop table if exists GIAOHANG;

drop table if exists HOADON;

drop table if exists KHUVUC;

drop table if exists LOAISANPHAM;

drop table if exists NGUOIDUNG;

drop table if exists SANPHAM;

/*==============================================================*/
/* Table: CHITIETHOADON                                         */
/*==============================================================*/
create table CHITIETHOADON
(
   MAHOADON             int not null,
   MASP                 varchar(10) not null,
   SOLUONGSP            int,
   TONGTIEN             int,
   primary key (MASP, MAHOADON)
);

/*==============================================================*/
/* Table: GIAOHANG                                              */
/*==============================================================*/
create table GIAOHANG
(
   MAHOADON             int not null,
   MAKHUVUC             varchar(20) not null,
   PHIGIAO              int,
   GHICHU               varchar(70),
   primary key (MAHOADON, MAKHUVUC)
);

/*==============================================================*/
/* Table: HOADON                                                */
/*==============================================================*/
create table HOADON
(
   MAHOADON             int not null,
   EMAIL                varchar(50),
   NGAYLAP              datetime,
   TRANGTHAI            varchar(70),
   primary key (MAHOADON)
);

/*==============================================================*/
/* Table: KHUVUC                                                */
/*==============================================================*/
create table KHUVUC
(
   MAKHUVUC             varchar(20) not null,
   TENKHUVUC            varchar(50),
   PHIGIAO              int,
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
   TENSP_               varchar(100),
   DONGIABANSP          int,
   MOTA                 varchar(300),
   LINKANH              varchar(200),
   primary key (MASP)
);

alter table CHITIETHOADON add constraint FK_RELATIONSHIP_6 foreign key (MAHOADON)
      references HOADON (MAHOADON) on delete restrict on update restrict;

alter table CHITIETHOADON add constraint FK_RELATIONSHIP_7 foreign key (MASP)
      references SANPHAM (MASP) on delete restrict on update restrict;

alter table GIAOHANG add constraint FK_RELATIONSHIP_4 foreign key (MAHOADON)
      references HOADON (MAHOADON) on delete restrict on update restrict;

alter table GIAOHANG add constraint FK_RELATIONSHIP_8 foreign key (MAKHUVUC)
      references KHUVUC (MAKHUVUC) on delete restrict on update restrict;

alter table HOADON add constraint FK_RELATIONSHIP_5 foreign key (EMAIL)
      references NGUOIDUNG (EMAIL) on delete restrict on update restrict;

alter table SANPHAM add constraint FK_LOAICUASP foreign key (MALOAI)
      references LOAISANPHAM (MALOAI) on delete restrict on update restrict;

