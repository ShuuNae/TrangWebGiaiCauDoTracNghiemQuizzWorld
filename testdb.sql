create database testdb;
use testdb;
create table Nguoidung(
mand nvarchar(15) primary key,
tentaikhoan nvarchar(35),
matkhau nvarchar(35)
);

create table Thongtinnguoidung(
mand nvarchar(15),
tennguoidung nvarchar(35),
email nvarchar(50),
primary key(mand),
foreign key (mand) references Nguoidung(mand)
);
