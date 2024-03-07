<?php

define('TOLLGURU_API_KEY', getenv('TOLLGURU_API_KEY'));
define('TOLLGURU_API_URL', 'https://apis.tollguru.com/toll/v2');
define('POLYLINE_ENDPOINT', 'complete-polyline-from-mapping-service');

$polyline = 'gib}FjbyeO...a@?c@?c@@g@'; // replace with your own polyline
$path = "43.64183,-79.38246|18.63085,-100.12845"; // replace with your own path

function routeEncodedPolyline() {
    global $polyline;

    $url = TOLLGURU_API_URL . '/' . POLYLINE_ENDPOINT;

    $payload = json_encode([
        'source' => 'here',
        'polyline' => $polyline,
        'height' => 10, // optional parameters
        'weight' => 30000, // optional parameters
        'vehicleType' => '2AxlesTruck', // if not set, by default it will set vehicleType as 2AxlesAuto
        'departure_time' => 1609507347, // optional parameters
    ]);

    $headers = [
        'x-api-key: ' . TOLLGURU_API_KEY,
        'Content-Type: application/json',
    ];

    $options = [
        'http' => [
            'method' => 'POST',
            'header' => implode("\r\n", $headers),
            'content' => $payload,
        ],
    ];

    $context = stream_context_create($options);
    return file_get_contents($url, false, $context);
}

function routePathLatLng() {
    global $path;

    $url = TOLLGURU_API_URL . '/' . POLYLINE_ENDPOINT;

    $payload = json_encode([
        'source' => 'here',
        'path' => $path, // replace with your own path
        'height' => 10, // optional parameters
        'weight' => 30000, // optional parameters
        'vehicleType' => '2AxlesTruck', // if not set, by default it will set vehicleType as 2AxlesAuto
        'departure_time' => 1609507347, // optional parameters
    ]);

    $headers = [
        'x-api-key: ' . TOLLGURU_API_KEY,
        'Content-Type: application/json',
    ];

    $options = [
        'http' => [
            'method' => 'POST',
            'header' => implode("\r\n", $headers),
            'content' => $payload,
        ],
    ];

    $context = stream_context_create($options);
    return file_get_contents($url, false, $context);
}

// Example usage:
$response1 = routeEncodedPolyline();
$data1 = json_decode($response1, true);
print_r($data1);

// Uncomment the following lines to test routePathLatLng()
$response2 = routePathLatLng();
$data2 = json_decode($response2, true);
print_r($data2);

?>
