<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" />

    <title>API - La ruche</title>

    <link rel="stylesheet" href="styles.css" type="text/css"/>

    <link rel="stylesheet" href="css/reset.css"/>
		<link rel="stylesheet" media="screen" href="css/global.css"/>

    <!-- bootstrap -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <!-- Axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  </head>

  <body>
    <?php
      // varibales
      $luminosite_now = "???";
      $humidite_now = "???";
      $temperature_now = "???";

      // etablir connection
      include 'connection.php';
            
        // requette SQL
        $requete = "SELECT luminosite,`humidite`,`temperature` FROM data WHERE event=(SELECT max(event) FROM data);";
      $result = $con -> query($requete);
      
      //sauvegarder data
      while ($row = $result->fetch_assoc()){
        $luminosite_now = $row['luminosite'];
        $humidite_now = $row['humidite'];
        $temperature_now = $row['temperature'];
      }

      // fermer connection
      $con->close();

      // echo "luminosite_now = ".$luminosite_now."<br>";
      // echo "humidite_now = ".$humidite_now."<br>";
      // echo "temperature_now = ".$temperature_now;
    ?>

    <header>
      <div class="container section">
        <div class="wrapper">
          <div class="row justify-content-center">
            <div class="col-10"><img class="beeAPI" src="picture/logo.png"></div>
            <div class="col-auto">
              <div class="section">
                <?php
                  if($luminosite_now >= 5) {
                    <img id="image" class="section" src="picture/soleil.png"><br>
                    <h4 class="font-weight-normal">Jour</h4>
                  }
                  else {
                    <img id="image" class="section" src="picture/moon.png"><br>
                    <h4 class="font-weight-normal">Nuit</h4>
                  }
                ?>
              </div>
            </div>
          </div>
          <h3>Et vos abeilles vont bien !</h3>
        </div>
      </div>
    </header>

    <br><br><br>

    <div class="container">
      <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm offset-sm-1">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Luminosité</h4>
          </div>
          <div class="card-body">
            <img id="image" src="picture/luminosite.png">
            <h2 id="0d-forecast-main" class="card-title">
              <?php $luminosite_now ?> Lux
            </h2>
          </div>
        </div>
        <div class="card mb-4 shadow-sm offset-sm-1">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Température</h4>
          </div>
          <div class="card-body">
            <img id="image" src="picture/temperature.png">
            <h2 id="1d-forecast-main" class="card-title">
              <?php $temperature_now ?> °C
            </h2>
          </div>
        </div>
        <div class="card mb-4 shadow-sm offset-sm-1">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Humidité</h4>
          </div>
          <div class="card-body">
            <img id="image" src="picture/humidite.png">
            <h2 id="2d-forecast-main" class="card-title">
              <?php $humidite_now ?> %
            </h2>
          </div>
        </div>
      </div>
    </div>

    <br><br>

    <footer>
      <div class="bouton">
        <button id="city-input-button" class="btn btn-success" type="submit" onclick="window.location.reload();">Actualiser</button>
      </div>
    </footer>
  </body>
</html>