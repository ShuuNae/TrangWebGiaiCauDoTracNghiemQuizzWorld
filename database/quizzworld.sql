create database QuizzWorld;
use QuizzWorld;

create table Phan(
	MaPhan smallint not null primary key,
    TenPhan varchar(20) not null
);
create table CauHoi
(
	MaCauHoi varchar(3) not null primary key,
	NDCauHoi nvarchar(1000) not null,
	MaPhan	smallint not null references Phan(MaPhan),
	Hinh varchar(100) null
);

create table DapAn
(
	MaCauTraLoi int not null,
	NDCauTraLoi nvarchar(300) not null,
	MaCauHoi varchar(3) not null,
	DungSai bit not null,
	primary key(MaCauTraLoi,NDCauTraLoi),
	foreign key (MaCauHoi) references CauHoi(MaCauHoi)
);

create table TaiKhoan
(
	Username varchar(20) not null primary key ,
	Password varchar(20) not null,
	IsAdmin bit not null
);

create table ThiSinh
(
	MaThiSinh varchar(10) not null primary key,
	HoTenThiSinh nvarchar(50) not null,
	NgaySinh date not null,
	GioiTinh char(1) default 'M',
	DiaChi nvarchar(50),
	Username varchar(20) not null,
	foreign key (Username) references TaiKhoan(Username)
);

create table KetQua
(
	STT int primary key AUTO_INCREMENT,
	MaThiSinh varchar(10) not null,
	ThoiGian datetime not null,
	LanThi int not null,
	KetQua varchar(5) not null,
	foreign key (MaThiSinh) references ThiSinh(MaThiSinh)
);
/*procedure*/
DELIMITER //
create procedure prc_DangKiTaiKhoan
	@username varchar(20),
	@password varchar(20),
	@mathisinh varchar(10),
	@hotenthisinh nvarchar(50),
	@ngaysinh date,
	@gioitinh char(1),
	@diachi nvarchar(50)
as
begin
	insert into TaiKhoan values(@username,@password,0)
	insert into ThiSinh values(@mathisinh,@hotenthisinh,@ngaysinh,@gioitinh,@diachi,@username)
end
DELIMITER ;
DELIMITER //
create procedure prc_SuaThongTinThiSinh
	@username varchar(20),
	@hotenthisinh nvarchar(50),
	@ngaysinh date,
	@gioitinh char(1),
	@diachi nvarchar(50)
as
begin
	update ThiSinh 
	set HoTenThiSinh = @hotenthisinh, NgaySinh = @ngaysinh, GioiTinh = @gioitinh, DiaChi = @diachi
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
	@chuoitimkiem nvarchar(50)
as
begin
	select *
	from ThiSinh
	where MaThiSinh like '%'+@chuoitimkiem+'%' or HoTenThiSinh like '%'+@chuoitimkiem+'%' or NgaySinh like '%'+@chuoitimkiem+'%'
	or GioiTinh like '%'+@chuoitimkiem+'%' or DiaChi like '%'+@chuoitimkiem+'%' or Username like '%'+@chuoitimkiem+'%'
end
DELIMITER ;
DELIMITER //
create procedure prc_TimKiemKetQua 
	@ketqua nvarchar(50)
as
begin
	if(@ketqua = N'Đậu')
		select KetQua.MaThiSinh as N'Mã Thí Sinh',ThiSinh.HoTenThiSinh as N'Họ Tên',
		KetQua.LanThi as N'Lần Thi',KetQua.ThoiGian as N'Thời Gian ',KetQua.KetQua as N'Kết Quả'
		from KetQua inner join ThiSinh on KetQua.MaThiSinh = ThiSinh.MaThiSinh
		where CONVERT(int,SUBSTRING(KetQua,1,2)) >=16
	if(@ketqua = N'Trượt')
		select KetQua.MaThiSinh as N'Mã Thí Sinh',ThiSinh.HoTenThiSinh as N'Họ Tên',
		KetQua.LanThi as N'Lần Thi',KetQua.ThoiGian as N'Thời Gian ',KetQua.KetQua as N'Kết Quả'
		from KetQua inner join ThiSinh on KetQua.MaThiSinh = ThiSinh.MaThiSinh
		where CONVERT(int,SUBSTRING(KetQua,1,2)) < 16
	else
		select KetQua.MaThiSinh as N'Mã Thí Sinh',ThiSinh.HoTenThiSinh as N'Họ Tên',
		KetQua.LanThi as N'Lần Thi',KetQua.ThoiGian as N'Thời Gian ',KetQua.KetQua as N'Kết Quả'
		from KetQua inner join ThiSinh on KetQua.MaThiSinh = ThiSinh.MaThiSinh
		where ThiSinh.HoTenThiSinh like '%'+@ketqua+'%' or KetQua.MaThiSinh like '%'+@ketqua+'%' or KetQua.LanThi like '%'+@ketqua+'%' or KetQua.ThoiGian like '%'+@ketqua+'%' or KetQua.KetQua like '%'+@ketqua
end
DELIMITER ;

create procedure prc_ThemCauHoi
	@macauhoi varchar(3),
	@ndcauhoi nvarchar(500),
	@maphan smallint,
	@hinh varchar(20)
as
begin
	insert into CauHoi values(@macauhoi,@ndcauhoi,@maphan,@hinh)
end
DELIMITER ;

create procedure prc_ThemDapAn
	@macautraloi int,
	@ndcautraloi nvarchar(300),
	@macauhoi varchar(3),
	@dungsai bit
as
begin
	insert into DapAn values(@macautraloi,@ndcautraloi,@macauhoi,@dungsai)
end
DELIMITER ;
