<?php
$apiKey = "f7b64baf36c71c9703bca3a88ad21aa7"; //You will need to add in the 
$cityId = "5046997"; //5046997 Shakopee City Id
$units = "imperial";//metric-Celcius  imperial-Farhenheit
if ($units == 'imperials'){//Changes the $temp varaible to match 
    $temp = "F";
}
else {
    $temp = "F";
}
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=" . $units . "&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>

<?php
    if ($data->main-temp_max < "32") {
        $color='cornflowerblue';
    }
else {
    $color='lightyellow';
}
?>

<?php
if ($data->main->humidity > "10") {
    $bggif='https://cf-images.eu-west-1.prod.boltdns.net/v1/static/5067014667001/52cc9b73-44bc-4de4-a247-0f3e23264e5b/68700ed8-fe47-43fa-b416-ec09633c73fc/1280x720/match/image.jpg'
}

}

<!doctype html>
<html>

<head>
    <title>Forecast Weather using OpenWeatherMap with PHP</title>

    <style>
        body {
            background-image: url('Teletubbies.jpg');
        }

    </style>

    <style>
        body {
            font-family: cursive;
            font-size: 0.75em;
            color: #FF69B4;
        }

        .report-container {
            border: #E0E0E0 1px solid;
            padding: 20px 40px 40px 40px;
            border-radius: 2px;
            width: 550px;
            margin: 0 auto;
        }

        .weather-icon {
            vertical-align: middle;
            margin-right: 20px;
        }

        .weather-forecast {
            color: #0564F4;
            font-size: 1.2em;
            font-weight: bold;
            margin: 20px 0px;
        }

        span.min-temperature {
            margin-left: 30px;
            color: #929292;
        }

        .time {
            line-height: 25px;
        }

        .body {
            background-image: url('Teletubbies.jpg');
        }

    </style>

</head>

<body>


    <h1 style="background-color:<?php echo $color?>;">insert faulty advertisement here</h1>

    <div class="report-container">
        <h2><?php echo $data->name; ?> Weather Status</h2>
        <div class="time">
            <div><?php echo date("l g:i a", $currentTime); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($data->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
            <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="weather-icon" /> <?php echo $data->main->temp_max; ?>&deg;<?php echo $temp; ?><span class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;<?php echo $temp; ?></span>
        </div>
        <div class="time">
            <div>humidity: <?php echo $data->main->humidity; ?> %</div>
            <div>That force of air that hits you: <?php echo $data->wind->speed; ?> km/h</div>
        </div>
    </div>

    <div>

        <?php
$x = 100;  
$y = "100";

var_dump($x == $y); // returns true because values are equal
?>

    </div>


</body>

</html>
