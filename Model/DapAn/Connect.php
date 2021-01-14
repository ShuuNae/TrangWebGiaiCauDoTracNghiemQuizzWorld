<?php
class dapan
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


    
    public function Danhsach_sinhvien(){
      //  $perpage=5;
      //  $page=($page-1)*$perpage;
       
       $search='';
      //  if($search_input!=''){
      //    $search="WHERE ( hovaten LIKE '%$search_input%' OR email like '%$search_input%' OR diachi like '%$search_input%' OR gioitinh like '$search_input%' OR Quocgia like '%$search_input%' )";  
      //  }
      
     
       $sql = "SELECT * FROM DapAn $search ORDER BY MaDA desc";
     
       $query=  $this->conn->query($sql);
       $dapan=array();
       if ($query->num_rows > 0) {
       while ($row = $query->fetch_assoc()) {
          $dapan['dapan_data'][]= $row;
       }
       }       
       
    $count_sql = "SELECT COUNT(*) FROM DapAn $search";
    $query=  $this->conn->query($count_sql);
    $total = mysqli_fetch_row($query);
    $dapan['total'][]= $total;       
       
    return $dapan;  
    }
    
    public function Tao_thongtin_dapan($post_data=array()){
         
    
       $MaDA='';
       if(isset($post_data->MaDA)){
       $MaDA= mysqli_real_escape_string($this->conn,trim($post_data->MaDA));
       }

       $NDDA='';
       if(isset($post_data->NDDA)){
       $NDDA= mysqli_real_escape_string($this->conn,trim($post_data->NDDA));
       }
       
        $MaCH='';
       if(isset($post_data->MaCH)){
       $MaCH= mysqli_real_escape_string($this->conn,trim($post_data->MaCH));
       }
       
       $DungSai='';
       if(isset($post_data->DungSai)){
       $DungSai= mysqli_real_escape_string($this->conn,trim($post_data->DungSai));
       }
       
      
     
       $sql="INSERT INTO DapAn( NDDA, MaCH,DungSai) VALUES ('$NDDA', $MaCH, $DungSai)";
        
        $result=  $this->conn->query($sql);
        
        if($result){
          return 'Đã thêm được 1 sinh viên';     
        }else{
           return 'Kiểm tra thông tin để nhập vào, lỗi';     
        }
          
       
       
       
        
    }
    
    public function view_dapan_id($id){
       if(isset($id)){
       $MaDA= mysqli_real_escape_string($this->conn,trim($id));
       //echo $SV_id1;
       $sql="Select * from DapAn where MaDA=$MaDA";
        
       $result=  $this->conn->query($sql);
     
        return $result->fetch_assoc(); 
    
       }  
    }
    
    
    public function update_thongtin_dapan($post_data=array()){
       if(isset($post_data->MaDA)){
       $MaDA= mysqli_real_escape_string($this->conn,trim($post_data->MaDA));
       

       $NDDA='';
       if(isset($post_data->NDDA)){
       $NDDA= mysqli_real_escape_string($this->conn,trim($post_data->NDDA));
       }
       
        $MaCH='';
       if(isset($post_data->MaCH)){
       $MaCH= mysqli_real_escape_string($this->conn,trim($post_data->MaCH));
       }
       
       $DungSai='';
       if(isset($post_data->DungSai)){
       $DungSai= mysqli_real_escape_string($this->conn,trim($post_data->DungSai));
       }
       

       $sql="UPDATE DapAn SET NDDA='$NDDA',MaCH=$MaCH,DungSai=$DungSai WHERE MaDA =$MaDA";
     
        $result=  $this->conn->query($sql);
        
         
         unset($post_data->MaDA); 
        if($result){
          return 'Đã cập nhật thành công';     
        }else{
         return 'Kiểm tra, lỗi cập nhật thông tin  ';     
        }
          
      }
           
      
         
    }
    
    public function delete_thongtin_dapan($id){
        
       if(isset($id)){
       $MaDA= mysqli_real_escape_string($this->conn,trim($id));

       $sql="DELETE FROM  DapAn  WHERE MaDA =$MaDA";
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