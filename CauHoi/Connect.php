<?php
class sinhvien
{
    private $conn;
    function __construct() //sinhvien()
    {
      session_start();
      $servername = "localhost";
      $dbname = "bt_ap";
      $username = "root";
      $password = ""; 
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
         if ($conn->connect_error) {
         die("Lỗi kết nối: " . $conn->connect_error);
         }else{
         $this->conn=$conn;  
         }
    }


    
    public function Danhsach_sinhvien($page=1,$search_input=''){
       $perpage=5;
       $page=($page-1)*$perpage;
       
       $search='';
       if($search_input!=''){
         $search="WHERE ( hovaten LIKE '%$search_input%' OR email like '%$search_input%' OR diachi like '%$search_input%' OR gioitinh like '$search_input%' OR Quocgia like '%$search_input%' )";  
       }
      
     
       $sql = "SELECT * FROM sinhviens $search ORDER BY SV_id desc LIMIT $page,$perpage";
     
       $query=  $this->conn->query($sql);
       $sinhvien=array();
       if ($query->num_rows > 0) {
       while ($row = $query->fetch_assoc()) {
          $sinhvien['sinhvien_data'][]= $row;
       }
       }       
       
    $count_sql = "SELECT COUNT(*) FROM sinhviens $search";
    $query=  $this->conn->query($count_sql);
    $total = mysqli_fetch_row($query);
    $sinhvien['total'][]= $total;       
       
    return $sinhvien;  
    }
    
    public function Tao_thongtin_sinhvien($post_data=array()){
         
    
       $hovaten='';
       if(isset($post_data->hovaten)){
       $hovaten= mysqli_real_escape_string($this->conn,trim($post_data->hovaten));
       }
       $email='';
       if(isset($post_data->email)){
       $email= mysqli_real_escape_string($this->conn,trim($post_data->email));
       }
       
        $gioitinh='';
       if(isset($post_data->gioitinh)){
       $gioitinh= mysqli_real_escape_string($this->conn,trim($post_data->gioitinh));
       }
       
       
       $diachi='';
       if(isset($post_data->diachi)){
       $diachi= mysqli_real_escape_string($this->conn,trim($post_data->Diachi));
       }
       
       $Quocgia='';
       if(isset($post_data->Quocgia)){
       $Quocgia= mysqli_real_escape_string($this->conn,trim($post_data->Quocgia));
       }
       
      
     
       $sql="INSERT INTO sinhviens(hovaten, email, Diachi,Quocgia,gioitinh) VALUES ('$hovaten', '$email', '$diachi','$Quocgia','$gioitinh')";
        
        $result=  $this->conn->query($sql);
        
        if($result){
          return 'Đã thêm được 1 sinh viên';     
        }else{
           return 'Kiểm tra thông tin để nhập vào, lỗi';     
        }
          
       
       
       
        
    }
    
    public function view_sinhvien_id($id){
       if(isset($id)){
       $SV_id1= mysqli_real_escape_string($this->conn,trim($id));
       //echo $SV_id1;
       $sql="Select * from sinhviens where SV_id=$SV_id1";
        
       $result=  $this->conn->query($sql);
     
        return $result->fetch_assoc(); 
    
       }  
    }
    
    
    public function update_thongtin_sinhvien($post_data=array()){
       if( isset($post_data->SV_id)){
       $SV_id=mysqli_real_escape_string($this->conn,trim($post_data->SV_id));
           
       $hovaten='';
       if(isset($post_data->hovaten)){
       $hovaten= mysqli_real_escape_string($this->conn,trim($post_data->hovaten));
       }
       $email='';
       if(isset($post_data->email)){
       $email= mysqli_real_escape_string($this->conn,trim($post_data->email));
       }
       
        $gioitinh='';
       if(isset($post_data->gioitinh)){
       $gioitinh= mysqli_real_escape_string($this->conn,trim($post_data->gioitinh));
       }
       
       
       $diachi='';
       if(isset($post_data->Diachi)){
       $diachi= mysqli_real_escape_string($this->conn,trim($post_data->Diachi));
       }
        $Quocgia='';
       if(isset($post_data->Quocgia)){
       $Quocgia= mysqli_real_escape_string($this->conn,trim($post_data->Quocgia));
       }
       

       $sql="UPDATE sinhviens SET hovaten='$hovaten',email='$email',Diachi='$diachi',Quocgia='$Quocgia',gioitinh='$gioitinh' WHERE SV_id =$SV_id";
     
        $result=  $this->conn->query($sql);
        
         
         unset($post_data->SV_id); 
        if($result){
          return 'Đã cập nhật thành công';     
        }else{
         return 'Kiểm tra, lỗi cập nhật thông tin  ';     
        }
          
           
           
      
       }   
    }
    
    public function delete_thongtin_sinhvien($id){
        
       if(isset($id)){
       $SV_id1= mysqli_real_escape_string($this->conn,trim($id));

       $sql="DELETE FROM  sinhviens  WHERE SV_id =$SV_id1";
        $result=  $this->conn->query($sql);
        
        if($result){
          return 'Xóa thành công';     
        }else{
         return 'Kiểm tra, lỗi xóa';     
        }         
        
           
       }
        
    }
    function __destruct() {
    mysqli_close($this->conn);  
    }
    
}

?>