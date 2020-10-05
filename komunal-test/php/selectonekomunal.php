
<?php
include 'komunal.php';
$obj=new Komunal();
$komunal_data=$obj->view_komunal_by_komunal_id($_GET['id']);
echo json_encode($komunal_data);


?>
