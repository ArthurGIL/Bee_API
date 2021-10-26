<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width" />
	<title>API - La ruche</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<header>
		<div class="container">
			<img class="pull-left" src="picture/logo.png">
			<h1>Vos abeilles vont bien !</h1>
		</div>
	</header>
	<div class="container">
      <div class="card-deck mb-3 text-center">
      	<!-- carte 1 -->
        <div class="card mb-4 shadow-sm offset-sm-1">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Dernier relevé</h4>
          </div>
          <div class="card-body">
            <h2 id="day0-forecast-main" class="card-title">Horaire</h2>
            <div>
              <p id="day0-forecast-more-info">BBB</p>
              <div id="day0-icon-weather-container">CCC</div>
              <h3 id="day0-forecast-temp">DDD</h3>
            </div>
          </div>
        </div>
        <!-- carte 2 -->
        <div class="card mb-4 shadow-sm offset-sm-1">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Il y a quelque minutes</h4>
          </div>
          <div class="card-body">
            <h2 id="day1-forecast-main" class="card-title"></h2>
            <div>
              <p id="day1-forecast-more-info"></p>
              <div id="day1-icon-weather-container" ></div>
              <h3 id="day1-forecast-temp"></h3>
            </div>
          </div>
        </div>
        <!-- carte 3 -->
        <div class="card mb-4 shadow-sm offset-sm-1">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Il y a quelque heures</h4>
          </div>
          <div class="card-body">
            <h2 id="day2-forecast-main" class="card-title"></h2>
            <div>
              <p id="day2-forecast-more-info"></p>
              <div id="day2-icon-weather-container"></div>
              <h3 id="day2-forecast-temp"></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>