
<?php
include 'sinhvien.php';
$obj=new sinhvien();
$sinhvien_data=$obj->Danhsach_sinhvien($_GET['SV_id']);
echo json_encode($sinhvien_data);
//echo $sinhvien_data;


?>
