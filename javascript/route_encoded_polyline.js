const TOLLGURU_API_KEY = process.env.TOLLGURU_API_KEY;
const TOLLGURU_API_URL = "https://apis.tollguru.com/toll/v2";
const POLYLINE_ENDPOINT = "complete-polyline-from-mapping-service";

const polyline = "gib}FjbyeO...a@?c@?c@@g@"; // replace with your own polyline
const path = "43.64183,-79.38246|18.63085,-100.12845"; // replace with your own path

function routeEncodedPolyline() {
  const url = `${TOLLGURU_API_URL}/${POLYLINE_ENDPOINT}`;

  const payload = JSON.stringify({
    source: "here",
    polyline,

    // Optional parameters...
    vehicleType: "2AxlesTruck", // if not set, by default it will set vehicleType as 2AxlesAuto
    height: 10,
    weight: 30000,
    departure_time: 1609507347,
  });

  const headers = {
    "x-api-key": TOLLGURU_API_KEY,
    "Content-Type": "application/json",
  };

  return fetch(url, {
    method: "POST",
    headers: headers,
    body: payload,
  });
}

function routePathLatLng() {
  const url = `${TOLLGURU_API_URL}/${POLYLINE_ENDPOINT}`;

  const payload = JSON.stringify({
    source: "here",
    path,

    // Optional parameters...
    height: 10,
    weight: 30000,
    vehicleType: "2AxlesTruck", // if not set, by default it will set vehicleType as 2AxlesAuto
    departure_time: 1609507347,
  });

  const headers = {
    "x-api-key": TOLLGURU_API_KEY,
    "Content-Type": "application/json",
  };

  return fetch(url, {
    method: "POST",
    headers: headers,
    body: payload,
  });
}

// Example usage:
routeEncodedPolyline()
  .then((response) => response.json())
  .then((data) => console.log(data))
  .catch((error) => console.error("Error:", error));

// Uncomment the following lines to test routePathLatLng()
routePathLatLng()
  .then((response) => response.json())
  .then((data) => console.log(data))
  .catch((error) => console.error("Error:", error));
