import requests
import json

TOLLGURU_API_KEY = "YOUR_TOLLGURU_API_KEY"  # API key for Tollguru
TOLLGURU_API_URL = "https://apis.tollguru.com/toll/v2"  # Base URL for TollGuru Toll API
POLYLINE_ENDPOINT = "complete-polyline-from-mapping-service"

def route_encoded_polyline():
    url = f"{TOLLGURU_API_URL}/{POLYLINE_ENDPOINT}"

    payload = json.dumps(
        {
            "source": "here",
            "polyline": "gib}FjbyeO...a@?c@?c@@g@",  # this is an example polyline please repalce this with your own polyline.
            "height": 10,  # optional parameters
            "weight": 30000,  # optional parameters
            "vehicleType": "2AxlesTruck",  # if not set, by deafult it will set vehicleType as 2AxlesAuto
            "departure_time": 1609507347,  # optional parameters
        }
    )
    headers = {"x-api-key": TOLLGURU_API_KEY, "Content-Type": "application/json"}

    response = requests.request("POST", url, headers=headers, data=payload)

    return response


def route_path_lat_lng():
    url = f"{TOLLGURU_API_URL}/{POLYLINE_ENDPOINT}"

    payload = json.dumps(
        {
            "source": "here",
            "path": "43.64183,-79.38246|...|18.63085,-100.12845",  # this is an path please repalce this with your own path.
            "height": 10,  # optional parameters
            "weight": 30000,  # optional parameters
            "vehicleType": "2AxlesTruck",  # if not set, by deafult it will set vehicleType as 2AxlesAuto
            "departure_time": 1609507347,  # optional parameters
        }
    )
    headers = {"x-api-key": TOLLGURU_API_KEY, "Content-Type": "application/json"}

    response = requests.request("POST", url, headers=headers, data=payload)

    return response
