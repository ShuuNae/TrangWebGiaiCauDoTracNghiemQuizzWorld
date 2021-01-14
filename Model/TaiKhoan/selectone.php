
<?php
include 'Connect.php';
$obj=new taikhoan();
$taikhoan_data=$obj->view_taikhoan_id($_GET['Username']);
echo json_encode($taikhoan_data);


?>
