<?php
require "../dbBroker.php";
require "../model/dogadjaj.php";

if(isset($_POST['id'])){
    $dogadjaj = new Dogadjaj($_POST['id']);
    $status = $dogadjaj->delete($conn);

    if($status){
        echo 'Success';
    }else{
        echo "Failed";
    }
}
?>



