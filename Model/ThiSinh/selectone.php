
<?php
include 'Connect.php';
$obj=new thisinh();
$thisinh_data=$obj->view_thisinh_id($_GET['MaTS']);
echo json_encode($thisinh_data);
//echo $thisinh_data;
?>
