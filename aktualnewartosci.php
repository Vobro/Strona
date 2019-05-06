<?php
        session_start();
        if(!isset($_SESSION['zalogowany']))
        {
                header('Location: index.php');
                exit();
        }
        require_once "connect.php";
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="refresh" content="2">
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
        
        $sql2 = "SELECT * FROM czujniki2 WHERE  nr_urzadzenia={$_SESSION['nr_urzadzenia']} ORDER BY data DESC, numer_czujnika ASC LIMIT 4";
                                if($rezultat2 = $polaczenie->query($sql2))
                                {
                                        $ile = $rezultat2->num_rows;
                                        if($ile > 0)
                                        {
                                                echo '<p><center>  <a href="panel.php"><img src="prz2.png" alt="Powrót do panelu"/></a></center></p>';
                                                echo'<table align="center" class="greenTable">';
                                                echo'<thead>';
                                                echo'<tr>';
                                                echo'<th>Data</th>';
                                                echo'<th>Numer czujnika</th>';
                                                echo'<th>Stan</th>';
                                                echo'</tr>';
                                                echo'</thead>';
                                                echo'<tbody>';
                                                for($i=0; $i<$ile; $i++)
                                                {
                                                        $wiersz2 = $rezultat2->fetch_assoc();
                                                        echo "<tr>";
                                                        echo "<td>".$wiersz2['data']."</td>";
                                                        echo "<td>".$wiersz2['numer_czujnika']."</td>";
                                                        echo "<td>".$wiersz2['stan']."</td>";
                                                        echo "</tbody>";
                                                        echo"</tr>";
                                                }
                                        echo"</table>";
                                        }
                                }
        $rezultat2->free_result();
        //$polaczenie->close();
 ?>
 </body>
 </html>
