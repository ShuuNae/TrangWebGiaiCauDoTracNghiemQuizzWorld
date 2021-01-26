
<?php
include 'Connect.php';
$obj=new ketqua();
$taikhoan_data=$obj->view_ketqua_id($_GET['MaTS']);
echo json_encode($taikhoan_data);


?>
