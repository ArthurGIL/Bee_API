    <?php
        //Page avec MDP de connexion
        include ('connection.php');

        //requete avec valeurs
        $sql_insert_lum = "INSERT INTO luminosite (luminosite) VALUES ('".$_GET["luminosite"]."');";
        $sql_insert_temp = "INSERT INTO temperature (temperature) VALUES ('".$_GET["temperature"]."');";

        //insertion Lumiere
        if(mysqli_query($con,$sql_insert_lum)){
            echo "Insertion LUM reussie.<br><br>";
        }
        else{
            echo "Erreur LUM : ".mysqli_error($con );
        }
        //insertion Temperature
        if(mysqli_query($con,$sql_insert_temp)){
            echo "Insertion TEMP reussie.<br><br>";
        }
        else{
            echo "Erreur TEMP : ".mysqli_error($con );
        }

        mysqli_close($con);
    ?>