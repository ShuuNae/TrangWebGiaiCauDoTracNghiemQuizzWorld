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
insert into CauHoi(NDCH, MaPhan) values ('Ba tháng cuốn cờ bồng con đỏ<br>Một phen cởi giáp cứu dân đen<br>Là cây gì ?','CC');
insert into CauHoi(NDCH, MaPhan) values ('Bao năm kinh sử dồi mài<br>Anh mong đỗ Trạng, xe về rước em','CC');
insert into CauHoi(NDCH, MaPhan) values ('Bằng đồng tiền nằm nghiêng giữa bụi<br>Là rau gì ?','CC');
insert into CauHoi(NDCH, MaPhan) values ('Bên sông cây đứng đợi đò<br>Ai kêu khắc khoải nhớ làng, nhớ quê<br>Là cây gì ?','CC');
insert into CauHoi(NDCH, MaPhan) values ('Bỏ ngoài nướng trong, ăn ngoài bỏ trong là cái gì?','CC');
insert into CauHoi(NDCH, MaPhan) values ('Buổi xuân xanh người chuộng, kẻ yêu<br>Càng cao danh vọng, càng nhiều gian nan<br>Lòng không dạ đói lang thang<br>Thương người quân tử hai hàng chong chong<br>Đó là cây gì ?','CC');
insert into CauHoi(NDCH, MaPhan) values ('Cà gì không có hột','CC');
insert into CauHoi(NDCH, MaPhan) values ('Cá gì ở trên cây?','CC');
insert into CauHoi(NDCH, MaPhan) values ('Cây cao vòi vọi,<br>Có đọi nước đầu<br>Là cây gì ?','CC');
insert into CauHoi(NDCH, MaPhan) values ('Cây chi có trái không cành<br>Có hai thằng bé rập rình hai bên<br>Là cây gì ?','CC');

-- Loài vật --
insert into CauHoi(NDCH, MaPhan) values ('Loài vật nào sau đây có thể thở bằng mông?','LV');
insert into CauHoi(NDCH, MaPhan) values ('Loài chim nào có khả năng bay ngược?','LV');
insert into CauHoi(NDCH, MaPhan) values ('Loài cá nước ngọt nào là động vật ăn thịt?','LV');
insert into CauHoi(NDCH, MaPhan) values ('Bộ phận nào trên người cá voi xanh nặng xấp xỉ một con voi châu Á?','LV');
insert into CauHoi(NDCH, MaPhan) values ('Cơ quan khứu giác của loài ong mật nằm ở...','LV');
insert into CauHoi(NDCH, MaPhan) values ('Loài vật nào sau đây đạt được khoái cảm khi giao phối?','LV');
insert into CauHoi(NDCH, MaPhan) values ('Con người sẽ chết nếu ăn phải gan của loài động vật nào sau đây?','LV');
insert into CauHoi(NDCH, MaPhan) values ('Bạch tuộc có tất cả bao nhiêu quả tim?','LV');
insert into CauHoi(NDCH, MaPhan) values ('Sản phẩm nào của động vật có hạn sử dụng vĩnh viễn?','LV');
insert into CauHoi(NDCH, MaPhan) values ('Con gì chân ngắn<br>Mà lại có màng<br>Mỏ bẹt màu vàng<br>Hay kêu cạp cạp?','LV');

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
insert into DapAn(NDDA,MaCH,DungSai) values ('A. Đầu, hai đầu gối','1',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Đầu, hai củi trỏ','1',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Đầu, hai bàn tay','1',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Đầu, hai bàn chân','1',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Đầu tóc mượn','2',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Mắt','2',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Miệng','2',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Tay','2',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Bàn chân','3',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Bàn tay','3',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Cánh tay','3',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Chân','3',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Bàn chân','4',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Cánh tay','4',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Bàn tay','4',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Đôi chân','4',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Mũi','5',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Miệng','5',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Đôi mi','5',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Đôi mắt','5',1);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Bàn tay','6',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Đôi tay','6',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Bàn chân','6',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Đôi chân','6',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Con ngươi','7',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Con mắt','7',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Miệng','7',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Tai','7',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Cái tay','8',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Cái chân','8',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Cái tai','8',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Cái bóng','8',1);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Ngón Chân','9',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Ngón tay','9',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Tai','9',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Mũi','9',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Ngón chân','10',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Tay','10',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Ngón Tay','10',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Chân','10',0);

-- Cây cỏ --
insert into DapAn(NDDA,MaCH,DungSai) values ('A. Cây chuối','11',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Cây ổi','11',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Cây bắp','11',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Cây nhãn','11',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Cây nhãn','12',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Cây Trạng Nguyên','12',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Cây vải','12',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Cây dừa','12',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Rau muống','13',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Rau dền','13',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Rau má','13',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Rau đắng','13',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Bụi tre','14',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Bụi chuối','14',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Bụi cỏ','14',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Bụi phấn','14',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Ổi','15',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Dưa','15',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Khoai','15',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Ngô (bắp)','15',1);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Cây tre','16',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Cây ổi','16',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Cây dừa','16',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Cây vải','16',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Cà pháo','17',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Cà chua','17',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Cà rốt','17',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Cà bát','17',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Cá quả','18',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Cá chép','18',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Cá đuối','18',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Cá bống','18',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Cây cọ','19',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Cây nhãn','19',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Cây vải','19',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Cây dừa','19',1);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Cây ngô','20',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Cây đậu','20',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Cây sắn','20',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Cây đay','20',0);

-- Loài vật --
insert into DapAn(NDDA,MaCH,DungSai) values ('A. Kangaroo','21',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Rùa','21',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Cá mập','21',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Chồn hương','21',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. chim én','22',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. chim ruồi','22',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. chim hải âu','22',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. chim sẻ','22',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Cá Piranha','23',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Cá chép','23',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Cá nóc','23',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Cá trê','23',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Vây cá','24',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Não cá','24',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Lưỡi cá','24',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Mắt cá','24',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Đầu','25',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Bụng','25',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Râu','25',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Chân','25',1);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Ong','26',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Ếch','26',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Bạch tuộc','26',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Cá heo','26',1);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Chim cánh cụt','27',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Gấu Bắc Cực','27',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Rắn hổ mang','27',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Gấu xám','27',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. 1','28',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. 2','28',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. 3','28',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. 4','28',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Mật ong','29',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Vỏ ốc','29',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Tơ nhện','29',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Tơ tằm','29',0);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. Con gà','30',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. Con bò','30',0);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. Con vịt','30',1);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. Con dê','30',0);
-- Đời sống --
insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','31',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','31',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','31',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','31',);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','32',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','32',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','32',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','32',);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','33',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','33',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','33',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','33',);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','34',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','34',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','34',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','34',);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','35',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','35',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','35',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','35',);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','36',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','36',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','36',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','36',);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','37',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','37',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','37',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','37',);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','38',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','38',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','38',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','38',);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','39',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','39',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','39',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','39',);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','40',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','40',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','40',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','40',);
-- Tổng hợp -- 
insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','41',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','41',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','41',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','41',);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','42',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','42',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','42',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','42',);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','43',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','43',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','43',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','43',);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','44',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','44',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','44',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','44',);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','45',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','45',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','45',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','45',);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','46',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','46',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','46',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','46',);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','47',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','47',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','47',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','47',);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','48',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','48',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','48',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','48',);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','49',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','49',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','49',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','49',);

insert into DapAn(NDDA,MaCH,DungSai) values ('A. ','50',);
insert into DapAn(NDDA,MaCH,DungSai) values ('B. ','50',);
insert into DapAn(NDDA,MaCH,DungSai) values ('C. ','50',);
insert into DapAn(NDDA,MaCH,DungSai) values ('D. ','50',);
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
