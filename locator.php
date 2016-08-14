<?php
error_reporting(-1);

$latitude = "51.756435";
$longitude = "-1.246042";

echo latlong_to_locator($latitude, $longitude);

function latlong_to_locator ($latitude, $longitude) {

  /* 
    Converts WGS84 coordinates into the corresponding Maidenhead Locator

    Inputs:-

      $latitude
      $longitude
  */

  if ($longitude >= 180 || $longitude <= -180) {
    return "Longitude Value Incorrect";
  }

  if ($latitude >= 90 || $latitude <= -90) {
    return "Latitude Value Incorrect";
  }

  $longitude += 180;
  $latitude += 90;


  $letterA = ord('A');
  $numberZero = ord('0');

  $locator = chr($letterA + intval($longitude / 20));
  $locator .= chr($letterA + intval($latitude / 10));
  $locator .= chr($numberZero + intval(($longitude % 20) / 2));
  $locator .= chr($numberZero + intval($latitude % 10));
  $locator .= chr($letterA + intval(($longitude - intval($longitude / 2) * 2) / (2 / 24)));
  $locator .= chr($letterA + intval(($latitude - intval($latitude / 1) * 1 ) / (1 / 24)));

  return $locator;

}

//echo $locator;

 ?>
