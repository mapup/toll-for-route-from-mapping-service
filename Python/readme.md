# complete-polyline-from-mapping-service
Use this service when you are already using a mapping service for your routing and you are able to send the complete route from the mapping service in the request. You will need to get the complete route from the mapping service (and not just origin, destination and some stops on the route) to receive accurate toll information. 

* Specify whether you want to send route polyline (encoded using Google encoded polyline algorithm or shape (latitude and longitude pairs)
* Specify vehicle type. For example, you can receive tolls for vehicles based on axle counts for cars, SUV, pick-up, trucks (up to 9-axles), motorcycle, bus, motorhome, RV, limousine.
* Specify truck parameters such as weight, height, axle counts and receive tolls based on weight, height, etc.
* Specify the source of route polyline such as Google, Bing, MapBox, Apple Map, HERE, TomTom, Waze, ESRI, MapQuest, JawgMaps, Trimble, PTV, MapmyIndia, Yandex, Michelin, Baidu, Gaode or your custom source (“custom”)
* Since you specify the exact route, you will receive tolls for the route. You will not receive tolls for alternate routes between origin and destination.
