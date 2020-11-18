<?php
  $weather = "";
  $error = "";
  if ($_GET['city']) {
    $urlContents = 
    file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city'])."&appid=3e41ac038f5ee3839172760f9f031250");
    $weatherArray = json_decode($urlContents, true);
    if ($weatherArray['cod'] == 200) {
    $weather = "The weather in ".$_GET['city']." is currently 
    '".$weatherArray['weather'][0]['description']."'. ";
    $tempInCelcius = intval($weatherArray['main']['temp'] *9/5 - 459.67);
    $weather .= " The temperature is ".$tempInCelcius."&deg;F";
  } else {
    $error = "Could not Find City, Please Try again";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Weather</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <link href="dist/toolkit.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
  <style type="text/css">
  html { 
          background: url("https://images.unsplash.com/photo-1504608524841-42fe6f032b4b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=60") no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
          }
        
          body {
              
              background: none;
              
          }
.card {
  background-color: rgba(126, 123, 215, 0.2);
}

.md-form label {
  color: #ffffff;
}
  </style>
  <body>
    <div class="bg">
      <div class="card wow fadeInRight" data-wow-delay="0.3s" style="margin-top: 60px;">
        <div class="card-body" style="margin-top: 150px;">
            <div class="text-center">
              <h3 class="white-text" style="margin-top: -40px;">Find Out The Weather In Any City World Wide</h3>
              <h3 class="white-text">
              <i class="fas fa-city white-text"></i> Enter Your City Below</h3>
              <div class="md-form">
              <i class="fas fa- prefix white-text active"></i>
              <form>
                  <input type="text" class="white-text form-control" id="city" name="city" style="width: 15rem;
                  margin: 0 auto;" value = 
                  "<?php echo $_GET['city']; ?>">
                <button class="btn btn-indigo" style="margin-top: 15px;">Submit</button>
              </form>
           </div>
          </div>
        </div>
      </div>
      <div id="weather" style="width: 25rem; margin: 0 auto;"><?php 
        if ($weather) {
          echo '<div class="alert alert-success" role="alert">
          '.$weather.'
          </div>';
        } else if ($error) {
        echo '<div class="alert alert-danger" role="alert">
        '.$error.'
      </div>';
      }?>
      </div>
    </div>
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="dist/toolkit.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript">
  </script>

</body>
</html>
