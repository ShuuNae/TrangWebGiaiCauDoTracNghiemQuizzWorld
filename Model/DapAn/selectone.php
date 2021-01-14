
<?php
include 'Connect.php';
$obj=new dapan();
$dapan_data=$obj->view_dapan_id($_GET['MaDA']);
echo json_encode($dapan_data);
//echo $sinhvien_data;


?>
