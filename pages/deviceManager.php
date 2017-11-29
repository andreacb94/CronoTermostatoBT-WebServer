<?php
/**
 * Created by PhpStorm.
 * User: Andrea
 * Date: 22/11/17
 * Time: 17:28
 */

    //Campi dell'array POST
    $POST_fields = ['id', 'action'];
    $id = "";
    $action = "";

    //Controllo se $_POST sia vuoto
    if (!empty($_POST)) {

        //Acquisisco i valori della richiesta POST da parte del Client
        $id = $_POST[$POST_fields[0]];
        $action = $_POST[$POST_fields[1]];
        $actionFile = "";

        //Se l'utente è autorizzato
        if($id === "admin"){

            //Controllo l'azione da eseguire
            switch ($action){

                //Invio il segnale di spegnimento alla caldaia
                case "0":

                    echo "<p>";
                        echo "Spento\n";
                    echo "</p>";
                    $actionFile = "sudo python ../commands/off.py";
                    break;

                //Invio il segnale di accenzione alla caldaia
                case "1":

                    echo "<p>";
                        echo "Acceso\n";
                    echo "</p>";
                    $actionFile = "sudo python ../commands/on.py";
                    break;

            }

            //Esegue il codice python
            $res=exec($actionFile,$out,$status);
            echo "<pre>";
                echo "out=";
                print_r($out);
                echo "res=".$res.PHP_EOL;
                echo "status=".$status.PHP_EOL;
            echo "</pre>";

        }

        else{

            echo "<p>";
                echo "Utente non autorizzato\n";
            echo "</p>";

        }

    }
    else{

        echo "<p>";
            echo "Nessuna richiesta inviata";
        echo "</p>";

    }
?>
