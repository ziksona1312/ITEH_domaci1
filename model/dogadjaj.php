<?php

date_default_timezone_set("Europe/Belgrade");

class Dogadjaj{
    public $id;
    public $naslov;
    public $opis;
    public $lokacija;
    public $vremeod;
    public $vremedo;
    public $user_id;


    public function __construct($id=null, $naslov=null, $opis=null, $lokacija=null, $vremeod=null, $vremedo=null, $user_id=null){
        $this->id = $id;
        $this->naslov = $naslov;
        $this->opis = $opis;
        $this->lokacija = $lokacija;
        $this->vremeod = $vremeod;
        $this->vremedo = $vremedo;
        $this->user_id = $user_id;
    }

    public static function add(Dogadjaj $dogadjaj, mysqli $conn){
        $query = "INSERT INTO dogadjaj(naslov, opis, lokacija, vremeod, vremedo, user_id) 
        VALUES('$dogadjaj->naslov','$dogadjaj->opis','$dogadjaj->lokacija','$dogadjaj->vremeod','$dogadjaj->vremedo','$dogadjaj->user_id')";
        
        return $conn->query($query);
    }

    public static function getAll(mysqli $conn){
        $query = "
        SELECT d.id,d.naslov,d.opis,d.lokacija,d.vremeod,d.vremedo,u.username 
        FROM dogadjaj d 
        INNER JOIN user u on d.user_id=u.id
        ";

        $myArray = array();
        $result = $conn->query($query);

        if($result){
            while($row = $result->fetch_array()){
                $myArray[] = $row;
            }
        }
        return $myArray;
    }

    public function update(mysqli $conn){
        $query = "UPDATE dogadjaj SET naslov ='$this->naslov', opis ='$this->opis', lokacija ='$this->lokacija', vremeod='$this->vremeod', vremedo='$this->vremedo', user_id='$this->user_id' 
        WHERE id='$this->id'";
       
        return $conn->query($query);
    }

    public function delete(mysqli $conn){
        $query = "DELETE FROM dogadjaj WHERE id=$this->id";
        return $conn->query($query);
    }
}
?>

