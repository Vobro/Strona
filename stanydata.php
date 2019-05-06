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

        $datacznowy = $_POST['datacz'];
        $dataczknowy = $_POST['dataczk'];
        $sql3 = "SELECT * FROM czujniki2 WHERE data>='$datacznowy' AND data<='$dataczknowy' AND nr_urzadzenia={$_SESSION['nr_urzadzenia']} ";
        if($rezultat3 = @$polaczenie->query($sql3))
        {
                $ile3 = $rezultat3->num_rows;
                if($ile3>0)
                {
                                echo'<center><a href="historian.php"><img src="prz3.png" alt="Powrót do poprzedniego okienka"</a></center>';
                                echo'<table align="center" class="greenTable">';
                                echo'<thead>';
                                echo'<tr>';
                                echo'<th>Data</th>';
                                echo'<th>Numer czujnika</th>';
                                echo'<th>Stan</th>';
                                echo'</tr>';
                                echo'</thead>';
                                echo'<tbody>';
                                for($i=0; $i<$ile3; $i++)
                                {
                                        $wiersz2 = $rezultat3->fetch_assoc();
                                        echo "<tr>";
                                        echo "<td>".$wiersz2['data']."</td>";
                                        echo "<td>".$wiersz2['numer_czujnika']."</td>";
                                        echo "<td>".$wiersz2['stan']."</td>";
                                        echo "</tbody>";
                                        echo"</tr>";
                                }
                        echo"</table>";
                }
                else
                {
                        echo "Coś poszło nie tak. Wprowadziłeś zły format daty albo twoje urzadzenie nie ma pomiarow z tego okresu";
                }
        }
        $rezultat3->free_result();
        $polaczenie->close();

?>
</body>
</html>
