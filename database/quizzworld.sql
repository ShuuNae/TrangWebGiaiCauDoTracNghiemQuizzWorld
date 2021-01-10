create database QuizzWorld;
use QuizzWorld;


create table Phan(
	MaPhan varchar(2) not null primary key,
    TenPhan varchar(20) not null
);
create table CauHoi
(
	MaCH int auto_increment not null primary key,
	NDCH varchar(1000) not null,
	MaPhan	smallint not null references Phan(MaPhan)
);

create table DapAn
(
	MaDA int auto_increment not null,
	NDDA varchar(300) not null,
	MaCH varchar(3) not null,
	DungSai bit not null,
	primary key(MaDA,NDDA),
	foreign key (MaCH) references CauHoi(MaCH)
);

create table TaiKhoan
(
	Username varchar(20) not null primary key ,
	Password varchar(20) not null,
	IsAdmin bit not null
);

create table ThiSinh
(
	MaTS varchar(10) not null primary key,
	HoTen varchar(50) not null,
	NgaySinh date not null,
	GioiTinh char(1) default 'M',
    Email varchar(100) not null,
	Username varchar(20) not null,
    HinhAnh text null,
	foreign key (Username) references TaiKhoan(Username)
);

create table KetQua
(
	STT int primary key AUTO_INCREMENT,
	MaTS varchar(10) not null,
	ThoiGian datetime null,
	LanThi int not null,
	KetQua varchar(5) not null,
	foreign key (MaTS) references ThiSinh(MaTS)
);

-- Thêm dữ liệu --
-- Bảng Phần --
insert into Phan(MaPhan, TenPhan) values ('CN','Con người');
insert into Phan(MaPhan, TenPhan) values ('CC','Cây cỏ');
insert into Phan(MaPhan, TenPhan) values ('LV','Loài vật');
insert into Phan(MaPhan, TenPhan) values ('DS','Đời sống');
insert into Phan(MaPhan, TenPhan) values ('TH','Tổng hợp');
-- Bảng Câu hỏi --
-- Con người --
insert into CauHoi(NDCH, MaPhan) values ('Ba ông ngồi lại một mâm<br>Một ông có tóc, hai ông trọc đầu ?','CN');
insert into CauHoi(NDCH, MaPhan) values ('Của mình mà nói của người <br>Đố ai biết được vàng mười thường cho ?','CN');
insert into CauHoi(NDCH, MaPhan) values ('Có cổ mà không có đầu<br>Xòe như hoa nở một màu hồng tươi<br>Nhưng khi đa nắm lại rồi<br>Tựa quả phật thủ theo người suốt năm ?','CN');
insert into CauHoi(NDCH, MaPhan) values ('Một cây mà có năm cành<br>Giáp nước thì héo, để dành thì tươi ?','CN');
insert into CauHoi(NDCH, MaPhan) values ('Hai cô nằm nghỉ hai phòng<br>Ngày thì mở cửa mà trông ra ngoài<br>Đêm thì đóng kín chẳng ai thấy gì ?','CN');
insert into CauHoi(NDCH, MaPhan) values ('Vừa bằng lá đa đi xa về gần ?','CN');
insert into CauHoi(NDCH, MaPhan) values ('Vừa bằng lá niệt, trông xiết cả trời ?','CN');
insert into CauHoi(NDCH, MaPhan) values ('Vừa bằng bước chân mà bước không qua ?','CN');
insert into CauHoi(NDCH, MaPhan) values ('Vừa bằng trái cau, bu nhau đi trước ?','CN');
insert into CauHoi(NDCH, MaPhan) values ('Vừa bằng điếu thuốc, ngủ ngày ngáy ton ?','CN');

-- Cây cỏ --
insert into CauHoi(NDCH, MaPhan) values ('','CC');
insert into CauHoi(NDCH, MaPhan) values ('','CC');
insert into CauHoi(NDCH, MaPhan) values ('','CC');
insert into CauHoi(NDCH, MaPhan) values ('','CC');
insert into CauHoi(NDCH, MaPhan) values ('','CC');
insert into CauHoi(NDCH, MaPhan) values ('','CC');
insert into CauHoi(NDCH, MaPhan) values ('','CC');
insert into CauHoi(NDCH, MaPhan) values ('','CC');
insert into CauHoi(NDCH, MaPhan) values ('','CC');
insert into CauHoi(NDCH, MaPhan) values ('','CC');

-- Loài vật --
insert into CauHoi(NDCH, MaPhan) values ('','LV');
insert into CauHoi(NDCH, MaPhan) values ('','LV');
insert into CauHoi(NDCH, MaPhan) values ('','LV');
insert into CauHoi(NDCH, MaPhan) values ('','LV');
insert into CauHoi(NDCH, MaPhan) values ('','LV');
insert into CauHoi(NDCH, MaPhan) values ('','LV');
insert into CauHoi(NDCH, MaPhan) values ('','LV');
insert into CauHoi(NDCH, MaPhan) values ('','LV');
insert into CauHoi(NDCH, MaPhan) values ('','LV');
insert into CauHoi(NDCH, MaPhan) values ('','LV');

-- Đời sống --
insert into CauHoi(NDCH, MaPhan) values ('','DS');
insert into CauHoi(NDCH, MaPhan) values ('','DS');
insert into CauHoi(NDCH, MaPhan) values ('','DS');
insert into CauHoi(NDCH, MaPhan) values ('','DS');
insert into CauHoi(NDCH, MaPhan) values ('','DS');
insert into CauHoi(NDCH, MaPhan) values ('','DS');
insert into CauHoi(NDCH, MaPhan) values ('','DS');
insert into CauHoi(NDCH, MaPhan) values ('','DS');
insert into CauHoi(NDCH, MaPhan) values ('','DS');
insert into CauHoi(NDCH, MaPhan) values ('','DS');

-- Tổng hợp -- 
insert into CauHoi(NDCH, MaPhan) values ('','TH');
insert into CauHoi(NDCH, MaPhan) values ('','TH');
insert into CauHoi(NDCH, MaPhan) values ('','TH');
insert into CauHoi(NDCH, MaPhan) values ('','TH');
insert into CauHoi(NDCH, MaPhan) values ('','TH');
insert into CauHoi(NDCH, MaPhan) values ('','TH');
insert into CauHoi(NDCH, MaPhan) values ('','TH');
insert into CauHoi(NDCH, MaPhan) values ('','TH');
insert into CauHoi(NDCH, MaPhan) values ('','TH');
insert into CauHoi(NDCH, MaPhan) values ('','TH');

-- Bảng đáp án --
-- Con người --
insert into DapAn(NDDA,MaCH,DungSai) values ('Đầu, hai đầu gối','1',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('Đầu, hai củi trỏ','1',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Đầu, hai bàn tay','1',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Đầu, hai bàn chân','1',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('Đầu tóc mượn','2',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('Mắt','2',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Miệng','2',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Tay','2',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('Bàn chân','3',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Bàn tay','3',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('Cánh tay','3',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Chân','3',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('Bàn chân','4',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Cánh tay','4',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Bàn tay','4',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('Đôi chân','4',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('Mũi','5',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Miệng','5',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Đôi mi','5',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Đôi mắt','5',1);

insert into DapAn(NDDA,MaCH,DungSai) values ('Bàn tay','6',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Đôi tay','6',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Bàn chân','6',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('Đôi chân','6',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('Con ngươi','7',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Con mắt','7',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('Miệng','7',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Tai','7',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('Cái tay','8',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Cái chân','8',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Cái tai','8',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Cái bóng','8',1);

insert into DapAn(NDDA,MaCH,DungSai) values ('Ngón Chân','9',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('Ngón tay','9',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Tai','9',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Mũi','9',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('Ngón chân','10',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Tay','10',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('Ngón Tay','10',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('Chân','10',0);

-- Cây cỏ --
insert into DapAn(NDDA,MaCH,DungSai) values ('','11',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','11',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','11',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','11',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','12',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','12',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','12',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','12',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','13',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','13',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','13',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','13',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','14',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','14',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','14',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','14',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','15',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','15',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','15',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','15',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','16',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','16',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','16',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','16',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','17',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','17',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','17',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','17',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','18',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','18',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','18',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','18',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','19',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','19',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','19',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','19',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','20',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','20',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','20',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','20',);
-- Loài vật --
insert into DapAn(NDDA,MaCH,DungSai) values ('','21',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','21',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','21',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','21',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','22',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','22',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','22',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','22',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','23',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','23',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','23',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','23',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','24',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','24',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','24',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','24',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','25',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','25',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','25',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','25',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','26',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','26',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','26',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','26',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','27',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','27',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','27',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','27',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','28',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','28',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','28',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','28',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','29',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','29',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','29',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','29',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','30',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','30',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','30',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','30',);
-- Đời sống --
insert into DapAn(NDDA,MaCH,DungSai) values ('','31',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','31',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','31',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','31',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','32',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','32',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','32',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','32',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','33',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','33',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','33',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','33',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','34',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','34',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','34',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','34',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','35',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','35',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','35',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','35',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','36',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','36',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','36',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','36',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','37',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','37',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','37',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','37',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','38',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','38',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','38',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','38',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','39',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','39',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','39',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','39',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','40',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','40',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','40',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','40',);
-- Tổng hợp -- 
insert into DapAn(NDDA,MaCH,DungSai) values ('','41',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','41',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','41',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','41',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','42',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','42',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','42',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','42',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','43',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','43',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','43',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','43',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','44',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','44',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','44',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','44',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','45',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','45',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','45',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','45',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','46',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','46',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','46',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','46',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','47',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','47',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','47',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','47',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','48',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','48',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','48',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','48',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','49',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','49',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','49',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','49',);

insert into DapAn(NDDA,MaCH,DungSai) values ('','50',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','50',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','50',);
insert into DapAn(NDDA,MaCH,DungSai) values ('','50',);
-- Bảng tài khoản -- 
insert into TaiKhoan() values ();
insert into TaiKhoan() values ();
insert into TaiKhoan() values ();
insert into TaiKhoan() values ();
insert into TaiKhoan() values ();
-- Bảng thí sinh -- 
insert into ThiSinh() values ();
insert into ThiSinh() values ();

-- Bảng Kết quả --






/*procedure*/
DELIMITER //
create procedure prc_DangKiTaiKhoan
	@username varchar(20),
	@password varchar(20),
	@MaTS varchar(10),
	@HoTen varchar(50),
	@NgaySinh date,
	@GioiTinh char(1),
	@Email varchar(50),
    @HinhAnh text
as
begin
	insert into TaiKhoan values(@username,@password,0)
	insert into ThiSinh values(@MaTS,@HoTen,@NgaySinh,@GioiTinh,@Email,@username,@HinhAnh)
end
DELIMITER ;
DELIMITER //
create procedure prc_SuaThongTinThiSinh
	@username varchar(20),
	@HoTen varchar(50),
	@NgaySinh date,
	@GioiTinh char(1),
	@Email varchar(50)
as
begin
	update ThiSinh 
	set HoTen = @HoTen, NgaySinh = @NgaySinh, GioiTinh = @GioiTinh, Email = @Email
	where Username = @username
end
DELIMITER ;
DELIMITER //
create procedure prc_SuaMatKhau
	@username varchar(20),
	@password varchar(20)
as
begin
	update TaiKhoan
	set Password = @password
	where Username = @username
end
DELIMITER ;
DELIMITER //
create procedure prc_TimKiemThongTinThiSinh
	@chuoitimkiem varchar(50)
as
begin
	select *
	from ThiSinh
	where MaTS like '%'+@chuoitimkiem+'%' or HoTen like '%'+@chuoitimkiem+'%' or NgaySinh like '%'+@chuoitimkiem+'%'
	or GioiTinh like '%'+@chuoitimkiem+'%' or Email like '%'+@chuoitimkiem+'%' or Username like '%'+@chuoitimkiem+'%'
end
DELIMITER ;
DELIMITER //
create procedure prc_TimKiemKetQua 
	@ketqua varchar(50)
as
begin
	if(@ketqua = N'Đậu')
		select KetQua.MaTS as N'Mã Thí Sinh',ThiSinh.HoTen as N'Họ Tên',
		KetQua.LanThi as N'Lần Thi',KetQua.ThoiGian as N'Thời Gian ',KetQua.KetQua as N'Kết Quả'
		from KetQua inner join ThiSinh on KetQua.MaTS = ThiSinh.MaTS
		where CONVERT(int,SUBSTRING(KetQua,1,2)) >=16
	if(@ketqua = N'Trượt')
		select KetQua.MaTS as N'Mã Thí Sinh',ThiSinh.HoTen as N'Họ Tên',
		KetQua.LanThi as N'Lần Thi',KetQua.ThoiGian as N'Thời Gian ',KetQua.KetQua as N'Kết Quả'
		from KetQua inner join ThiSinh on KetQua.MaTS = ThiSinh.MaTS
		where CONVERT(int,SUBSTRING(KetQua,1,2)) < 16
	else
		select KetQua.MaTS as N'Mã Thí Sinh',ThiSinh.HoTen as N'Họ Tên',
		KetQua.LanThi as N'Lần Thi',KetQua.ThoiGian as N'Thời Gian ',KetQua.KetQua as N'Kết Quả'
		from KetQua inner join ThiSinh on KetQua.MaTS = ThiSinh.MaTS
		where ThiSinh.HoTen like '%'+@ketqua+'%' or KetQua.MaTS like '%'+@ketqua+'%' or KetQua.LanThi like '%'+@ketqua+'%' or KetQua.ThoiGian like '%'+@ketqua+'%' or KetQua.KetQua like '%'+@ketqua
end
DELIMITER ;

create procedure prc_ThemCauHoi
	@MaCH varchar(3),
	@ndcauhoi varchar(500),
	@maphan smallint,
	@hinh varchar(20)
as
begin
	insert into CauHoi values(@@ndcauhoi,@maphan,@hinh)
end
DELIMITER ;

create procedure prc_ThemDapAn
	@MaDA int,
	@NDDA varchar(300),
	@MaCH varchar(3),
	@dungsai bit
as
begin
	insert into DapAn values(@MaDA,@NDDA,@@dungsai)
end
DELIMITER ;
