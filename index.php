<?php
        session_start();
        if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
        {
                header('Location: panel.php');
                exit();
        }
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Domowy system alarmowy</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
        <style type="text/css">
                body {
                background: #445566;
                }
        </style>

</head>
<body>
<div id="bg">
        <div class="naglowek"<h3><font color="silver"> Twój domowy system alarmowy </font></h3></div>
        <div class="module">
                <form class="form" action="zaloguj.php" method="post">
                        <input type="text" placeholder="Podaj swój login" class="textbox" name="login"/>
                        <br/><input type="password" placeholder="Podaj swoje hasło" class="textbox" name="haslo"/><br/>
                        <br/><input type="submit" value="Zaloguj się" class="button" />
                </form>
        </div> </div>
<?php
        if(isset($_SESSION['blad']))
        echo $_SESSION['blad'];
?>

</body>
</html>
