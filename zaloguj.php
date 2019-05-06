<?php
        session_start();
        if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
        {
                header('Location: index.php');
                exit();
        }
        require_once "connect.php";

        $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

        if ($polaczenie->connect_errno!=0)
        {
                echo "Error:".$polaczenie->connect_errno;
        }
        else
        {
                $loginnowy = $_POST['login'];
                $haslonowy = $_POST['haslo'];

                $sql = "SELECT * FROM uzytkownicy WHERE user='$loginnowy' AND pass='$haslonowy'";
                if($rezultat = @$polaczenie->query($sql))
                {
                        $ilu_userow = $rezultat->num_rows;
                        if($ilu_userow>0)
                        {
                                $_SESSION['zalogowany'] = true;
                                $wiersz = $rezultat->fetch_assoc();
                                $_SESSION['idu'] = $wiersz['idu'];
                                $_SESSION['imie'] = $wiersz['imie'];
                                $_SESSION['nazwisko'] = $wiersz['nazwisko'];
                                $_SESSION['email'] = $wiersz['email'];
                                $_SESSION['nr_urzadzenia'] = $wiersz['nr_urzadzenia'];
                                unset($_SESSION['blad']);
                                $rezultat->free_result();
                                header('Location: panel.php');
                        }
                        else
                        {
                                $_SESSION['blad']='<div class="srodek"<h3>Nieprawidłowy login lub hasło!</h3></div>';
                                header('Location: index.php');
                        }
                }

                $polaczenie->close();
        }

?>

