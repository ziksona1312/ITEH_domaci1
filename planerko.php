<?php
require "dbBroker.php";
require "model/dogadjaj.php";

session_start();

$data = Dogadjaj::getAll($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Planerko</title>
</head>
<body>
    <div id="form-bg" class="form-bg ">
        <div id="form-prikaz" class="container form pt-0" style="ba">
            <form id="form" action="">
                <div class="flex-wrapper">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
                        <input name = "id" id="form-id" type="hidden">
                        <div style="flex:1">
                            <label for="naslov">Naslov:</label>
                            <input id="form-naslov" class="form-control" name="naslov" type="text">
                        </div>
                        <div style="flex:1">
                            <label for="opis">Opis:</label>
                            <textarea id="form-opis" class="form-control" name="opis" rows="4" cols="50"></textarea>
                        </div>
                    </div>
                   <div class="p-5 pb-1" style="flex:1">
                        <div style="flex:1">
                            <label for="lokacija">Lokacija:</label>
                            <input id="form-lokacija" class="form-control" name="lokacija" type="text">
                        </div>
                        <div style="flex:1">
                            <label for="vremeod">Vreme od:</label>
                            <input id="form-vremeod" class="form-control" name="vremeod" type="datetime-local">
                        </div>
                        <div style="flex:1">
                            <label for="vremedo">Vreme do:</label>
                            <input id="form-vremedo" class="form-control" name="vremedo" type="datetime-local">
                        </div>
                    </div>
                    <div class="break"></div>
                    <div style="flex:1"><input type="submit" class="btn btn-primary mb-4" style="margin-left:3rem" value="Potvrdi"></div>
                    <div style="flex:1"><input type="reset" class="btn btn-primary mb-4" style="margin-left:3rem" value="Ponisti" onclick="ponisti();"></div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <h2 class="text-center text-white mt-5">Planerko</h2>
        <div id="task-container">
            <div class="taks-wrapper p-3 flex-wrapper">
                <div style="flex:2">
                    <button class="btn btn-primary" onclick="prikazi();">Dodaj novi dogadjaj</button>
                </div>
                <div style="flex:1">
                    <form action="">
                        <label style="margin-right:10px" for="pretraga">Pretraga</label>
                        <input id="pretraga" oninput="pretrazi();" class="ml-1" name="pretraga" type="text">
                    </form>
                </div>
            </div>
            <div class="task-wrapper flex-wrapper border-top text-center" style="font-weight: bold;">
                <div style="flex:1">Naslov</div>
                <div style="flex:2; padding-left:10px; padding-right:10px;">Opis</div>
                <div style="flex:1">Lokacija</div>
                <div style="flex:1">Vreme od/do</div>
                <div onclick="sortirajPoKorisniku();" style="flex:1; cursor: pointer;">Kreirao ⇅</div>
                <div style="flex:1">Uredi/Obrisi</div>
            </div>
            <div id="data">
                <?php
                    foreach(array_reverse($data) as $row):
                ?>
                <div class="task-wrapper flex-wrapper align-items-center">
                    <div id="naslov" class="text-center" style="flex:1; font-weight:bolder; color:royalblue"><?php echo $row['naslov'] ?></div>
                    <div id="opis" class="opis" style="flex:2; padding-left:10px; padding-right:10px;"><?php echo $row['opis'] ?></div>
                    <div id="lokacija" class="text-center" style="flex:1"><?php echo $row['lokacija'] ?></div>
                    <div class="text-center" style="flex:1">
                        <div class="flex-row">
                            <div id="vremeod" class="pb-3"><?php echo $row['vremeod'] ?></div>
                            <div id="vremedo"><?php echo $row['vremedo'] ?></div>
                        </div>
                    </div>
                    <div class="text-center" style="flex:1"><?php echo $row['username'] ?></div>
                    <div class="text-center" style="flex:1">
                        <div>
                            <button class="btn btn-primary" 
                            onclick="uredi(<?php echo $row['id'] ?>, '<?php echo $row['naslov'] ?>', '<?php echo $row['opis'] ?>', '<?php echo $row['lokacija'] ?>', '<?php echo $row['vremeod'] ?>', '<?php echo $row['vremedo'] ?>');">Uredi</button>
                            <div class="break"></div>
                            <button class="btn btn-danger" onclick="obrisi(<?php echo $row['id'] ?>);">Obrisi</button>
                        </div>
                    </div>
                </div>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>