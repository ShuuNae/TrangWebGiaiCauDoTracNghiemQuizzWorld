
<?php
include 'Connect.php';
$obj=new cauhoi();
$cauhoi_data=$obj->view_cauhoi_id($_GET['MaCH']);
echo json_encode($cauhoi_data);
//echo $sinhvien_data;


?>
