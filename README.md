# TrangWebGiaiCauDoTracNghiemQuizzWrold
Đồ án môn học lập trình mã nguồn mở . Sử dụng ngôn ngữ lập trình PHP. Nhóm An, Đạt, Nhung.
## Giới thiệu đề tài
#### Phân công nhiệm vụ:
 + An: Controller.
 + Đạt: Model + Database.
 + Nhung: Frontend. 
 
#### Mô tả bài toán:
  - Trang web cung cấp các câu hỏi trắc nghiệm.
      + Người dùng sẽ trả lời các câu hỏi, sau khi nộp bài, đưa ra kết quả cho người dùng.
  - Hệ thống website sẽ được phân ra làm 2 nhóm sử dụng chính:
     + Nhóm thứ nhất là người sử dụng : nhóm này là những người dùng thông thường, các chức năng mà nhóm này có quyền: thứ nhất chức năng chính của web là trả lời câu đố, ngoài ra nhóm này còn được xem kết quả mà mình đã thi và kết quả mà các người dùng khác đã làm .
     + Nhóm thứ hai là người quản trị: nhóm này có quyền cao nhất hệ thống, có tất cả các quyền,có quyền tạo đề thi, thêm thành viên, tạo chuyên mục…
  - Hệ thống website tạo bảng xếp hạng với các người dùng trả lời nhiều câu hỏi và nhanh nhất.  
  - Người dùng phải tạo tài khoản để có thể tham gia trả lời.
  ## Nguồn tham khảo
  - Model: BT_AP, giảng viên, ths NGUYỄN VĂN HOÀN
  - Controller: 
  - View: 
  ## Thông tin liên hệ
  - Hoàng Phước An (Nhóm trưởng)
  - Văn Thị Nhung
  - Nguyễn Duy Đạt (0969323274 + nguyenduydatdhcn4b@gmail.com)
  ## Công nghệ sử dụng
  - PHP
  - MySQL
  - HTML - CSS - JavaScript - JQuery
  - Bootstrap
  - Angular
  
 ## Hướng dẫn cài đặt
Trước tiên, ta vào trang web https://www.apachefriends.org/download.html chọn **Download (64 bit)** phiên bản mới nhất cho Windows (Ở đây là phiên bản **8.0.1**)
<p align="center">
  <img alt="Download XAMPP" src="/imgs/download-xampp.jpg">
</p>

Sau khi tải xuống hoàn tất, ta chạy tệp vừa tải lên, sau đó nhấn nút **Next >** cho đến khi cài đặt hoàn tất.
Lúc này, **XAMPP Control Panel** sẽ được bật lên. Ta sẽ chọn **Start** vào 2 dịch vụ quan trọng là **Apache** và **MySQL**.
<p align="center">
  <img alt="XAMPP Control Panel" src="/imgs/xampp-control-panel.jpg">
</p>

### Cài đặt cơ sở dữ liệu
Ta chọn vào nút **Admin** của dịch vụ **MySQL** để vào được trang **phpMyAdmin**, sau đó nhấn vào tab **SQL** bên phải tab **Databases**.
<p align="center">
  <img alt="PHP MyAdmin" src="/imgs/phpmyadmin.jpg">
</p>

Lúc này ta mở tệp **database.sql** bằng **Notepad**, ta **copy hết tất cả** và **patse** vào ô **SQL query** trong **phpMyAdmin**.
<p align="center">
  <img alt="SQL Copy Patse" src="/imgs/sql-copy-patse.jpg">
</p>

Sau khi copy patse hoàn tất, ta nhấn vào nút **Go** để thực thi các câu lệnh SQL. Sau khi thực thi hoàn tất, màn hình hiển thị **"# MySQL returned an empty result set (i.e. zero rows)"** là ta đã cài đặt cơ sở dữ liệu hoàn tất.
  
  Bước 1: Vào thư mục dist 
  
  
  
   
 
