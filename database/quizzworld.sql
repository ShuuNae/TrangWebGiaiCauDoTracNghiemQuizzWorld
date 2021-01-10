create database QuizzWorld;
use QuizzWorld;

create table Phan(
	MaPhan smallint not null primary key,
    TenPhan varchar(20) not null
);
create table CauHoi
(
	MaCH varchar(3) not null primary key,
	NDCH varchar(1000) not null,
	MaPhan	smallint not null references Phan(MaPhan)
);

create table DapAn
(
	MaDA int not null,
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
insert into Phan(MaPhan, TenPhan) values ();
insert into Phan(MaPhan, TenPhan) values ();
insert into Phan(MaPhan, TenPhan) values ();
insert into Phan(MaPhan, TenPhan) values ();
insert into Phan(MaPhan, TenPhan) values ();
-- Bảng Câu hỏi --

-- Bảng đáp án --

-- Bảng tài khoản -- 

-- Bảng thí sinh -- 

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
	insert into CauHoi values(@MaCH,@ndcauhoi,@maphan,@hinh)
end
DELIMITER ;

create procedure prc_ThemDapAn
	@MaDA int,
	@NDDA varchar(300),
	@MaCH varchar(3),
	@dungsai bit
as
begin
	insert into DapAn values(@MaDA,@NDDA,@MaCH,@dungsai)
end
DELIMITER ;
