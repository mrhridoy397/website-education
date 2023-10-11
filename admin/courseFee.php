<?php 
include_once('./controller/StudentController.php');
if($_REQUEST['id'] != ""){
    $student = new Student();
    $data = $student->courseFee($_REQUEST['id']);
    if(!empty($data)){
        echo json_encode($data);
    }
    else{
        json_encode(array('data'=>"Fail"));
    }
    
}
?>