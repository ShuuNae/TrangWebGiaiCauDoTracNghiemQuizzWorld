<?php
class ketqua
{
    private $conn;
    function __construct() //sinhvien()
    {
      session_start();
      $servername = "localhost";
      $dbname = "quizzworld";
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


    
    public function Danhsach_ketqua(){
      //  $perpage=5;
      //  $page=($page-1)*$perpage;
       
       $search='';
      //  if($search_input!=''){
      //    $search="WHERE ( hovaten LIKE '%$search_input%' OR email like '%$search_input%' OR diachi like '%$search_input%' OR gioitinh like '$search_input%' OR Quocgia like '%$search_input%' )";  
      //  }
      
     
       $sql = "SELECT * FROM KetQua $search ";
     
       $query=  $this->conn->query($sql);
       $ketqua=array();
       if ($query->num_rows > 0) {
       while ($row = $query->fetch_assoc()) {
          $ketqua['ketqua_data'][]= $row;
       }
       }       
       
    $count_sql = "SELECT COUNT(*) FROM KetQua $search";
    $query=  $this->conn->query($count_sql);
    $total = mysqli_fetch_row($query);
    $ketqua['total'][]= $total;       
       
    return $ketqua;  
    }
    
    public function Tao_thongtin_ketqua($post_data=array()){
         
    
       $MaTS ='';
       if(isset($post_data->MaTS )){
       $MaTS = mysqli_real_escape_string($this->conn,trim($post_data->MaTS ));
       }

       $MaPhan ='';
       if(isset($post_data->MaPhan )){
       $MaPhan = mysqli_real_escape_string($this->conn,trim($post_data->MaPhan ));
       }
       
        $ThoiGian ='';
       if(isset($post_data->ThoiGian )){
       $ThoiGian = mysqli_real_escape_string($this->conn,trim($post_data->ThoiGian ));
       }
       
       $KetQua ='';
       if(isset($post_data->KetQua )){
       $KetQua = mysqli_real_escape_string($this->conn,trim($post_data->KetQua ));
       }
       
      
     
       $sql="INSERT INTO KetQua( MaTS, MaPhan,ThoiGian,KetQua) VALUES ('$MaTS', '$MaPhan', '$ThoiGian', $KetQua)";
        
        $result=  $this->conn->query($sql);
        
        if($result){
          return 'Đã thêm được 1 kết quả';     
        }else{
           return 'Kiểm tra thông tin để nhập vào, lỗi';     
        }
          
       
       
       
        
    }
    
    public function view_ketqua_id($id){
       if(isset($id)){
       $MaTS = mysqli_real_escape_string($this->conn,trim($id));
       //echo $SV_id1;
       $sql="Select * from ketqua where MaTS =$MaTS ";
        
       $result=  $this->conn->query($sql);
     
        return $result->fetch_assoc(); 
    
       }  
    }
    
    
    public function update_thongtin_ketqua($post_data=array()){
        if(isset($post_data->MaTS )){
        $MaTS = mysqli_real_escape_string($this->conn,trim($post_data->MaTS ));
        
 
        $MaPhan ='';
        if(isset($post_data->MaPhan )){
        $MaPhan = mysqli_real_escape_string($this->conn,trim($post_data->MaPhan ));
        }
        
         $ThoiGian ='';
        if(isset($post_data->ThoiGian )){
        $ThoiGian = mysqli_real_escape_string($this->conn,trim($post_data->ThoiGian ));
        }
        
        $KetQua ='';
        if(isset($post_data->KetQua )){
        $KetQua = mysqli_real_escape_string($this->conn,trim($post_data->KetQua ));
        }
       

       $sql="UPDATE ketqua SET ThoiGian='$ThoiGian',KetQua=$KetQua WHERE MaTS =$MaTS";
     
        $result=  $this->conn->query($sql);
        
         
         unset($post_data->MaTS); 
        if($result){
          return 'Đã cập nhật thành công';     
        }else{
         return 'Kiểm tra, lỗi cập nhật thông tin  ';     
        }
          
      }
           
      
         
    }
    
    public function delete_thongtin_ketqua($id){
        
       if(isset($id)){
       $MaTS= mysqli_real_escape_string($this->conn,trim($id));

       $sql="DELETE FROM  ketqua  WHERE MaTS =$MaTS";
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