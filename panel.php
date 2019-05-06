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
        $sql2 = "SELECT * FROM czujniki2 WHERE  nr_urzadzenia={$_SESSION['nr_urzadzenia']} ORDER BY data DESC LIMIT 1";
                                if($rezultat2 = @$polaczenie->query($sql2))
                                {
                                        $ile = $rezultat2->num_rows;
                                        if($ile > 0)
                                        {

                                                echo '<p><center><font color="white"><font size="5">Witaj '.$_SESSION['imie']." ".$_SESSION['nazwisko'].'!  <a href="logout.php"><img src="prz1.png" alt="Wyloguj się!"/></a></font></font></center></p>';

                                                echo '<p><center><font color="white"><font size="5"><b>Twój e-mail</b>: '.$_SESSION['email'].'</font></font></center>';
                                                echo '<p><center><font color="white"><font size="5"><b>Twój nr_urzadzenia</b>: '.$_SESSION['nr_urzadzenia'].'</font></font></center>';
?>

        <div class="historia">
        <form class="historia-conteiner" action="historian.php" method="post">
                <center><p><input type="submit" value="Historia stanów czujników"/></p></center>
        </form>
        </div>

        <div class="historia">
        <form class="historia-conteiner" action="aktualnewartosci.php" method="post">
                <center><p><input type="submit" value="Aktualne wartości czujników"/></p></center>
        </form>

        <div class="historia">
        <form class="historia-conteiner" action="http://192.168.43.235:8000/czwarty.html" >
                <center><p><input type="submit" value="Uzbrojenie alarmu"/></p></center>
        </form>

        <div class="historia">
        <form class="historia-conteiner" action="http://192.168.43.235:8000/czwarty.html" >
                <center><p><input type="submit" value="Sterowanie"/></p></center><br/>
        </form>

 <?php
                                        }
                                }
        $rezultat2->free_result();
        //$polaczenie->close();
 ?>
 </body>
 </html>
