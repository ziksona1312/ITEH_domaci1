<?php
require "../dbBroker.php";
require "../model/dogadjaj.php";

if(isset($_POST['naslov']) && isset($_POST['opis']) && isset($_POST['lokacija']) && isset($_POST['vremeod']) && isset($_POST['vremedo'])){

    $dogadjaj = new Dogadjaj($_POST['id'], $_POST['naslov'], $_POST['opis'], $_POST['lokacija'], $_POST['vremeod'], $_POST['vremedo'], $_POST['user_id']);
    $status = $dogadjaj->update($conn);

    if($status){
        echo 'Success';
    }else{
        echo "Failed";
    }
}
?>


