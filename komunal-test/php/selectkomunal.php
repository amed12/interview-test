<?php
include 'komunal.php';



$obj=new Komunal();
$komunal_list=$obj->komunal_list($_GET['page'],$_GET['search_input']);


echo json_encode($komunal_list);


?>