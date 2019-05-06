<?php
        session_start();
        if(!isset($_SESSION['zalogowany']))
        {
                header('Location: index.php');
                exit();
        }
        require_once "connect.php";
        $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Domowy system alarmowy</title>
        <link rel="stylesheet" href="tabakt.css" type="text/css" />
        <style type="text/css">
                body {
                background: #445566;
                }
        </style>

</head>
<body>

<?php
         echo '<p><center>  <a href="panel.php"><img src="prz2.png" alt="Powrót do panelu"/></a></center></p>';
?>
<div class="historian">
                <h2 class="historian-header">Wszystkie stany</h2>
                <form action="stanydata.php" method="post" class="historian-container">
                        &nbsp;&nbsp;&nbsp;&nbsp;Data początkowa:
                        <p><input type="text" name="datacz" placeholder="RRRR-MM-DD"></p>
                        <br/>&nbsp;&nbsp;&nbsp;&nbsp;Data końcowa:
                        <p><input type="text" name="dataczk" placeholder="RRRR-MM-DD"></p>
                        <p><input type="submit" value="Sprawdź"></p>
                </form>
        </div>

<div class="historian">
                <h2 class="historian-header">Tylko stany wysokie</h2>
                <form action="stanywysokie.php" method="post" class="historian-container">
                        &nbsp;&nbsp;&nbsp;&nbsp;Data początkowa:
                        <p><input type="text" name="datawyspocz" placeholder="RRRR-MM-DD"></p>
                        <br/>&nbsp;&nbsp;&nbsp;&nbsp;Data końcowa:
                        <p><input type="text" name="datawyskon" placeholder="RRRR-MM-DD"></p>
                        <p><input type="submit" value="Sprawdź"></p>
                </form>
        </div>

 <?php
        //$polaczenie->close();
 ?>
 </body>
 </html>




