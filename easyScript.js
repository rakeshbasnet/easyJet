          var map;
          var markerpoint=[];
          pos=0;

          function initializeMap(){     //Function For Initializing Map
                   map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 6,
                  center: { lat: -25.363882, lng: 131.044922 },
                  mapTypeId: google.maps.MapTypeId.ROADMAP
              });
              addmarker(map);
            }

          function addmarker(map){        //Function for the marker on clicklistener in the map
             var flightPlanCoordinates=[];
             map.addListener('click', function (e) {
                  placeMarkerAndPanTo(e.latLng, map);
                  flightPlanCoordinates.push(e.latLng);
                  //objtostr(e.latLng);
                  var flightPath = new google.maps.Polyline({
                      path: flightPlanCoordinates,
                      strokeColor: "#FF0000",
                      strokeOpacity: 1.0,
                      strokeWeight: 2
                  });
                  flightPath.setMap(map);
              });
             markerpoint=flightPlanCoordinates;

          }
          function placeMarkerAndPanTo(latLng, map) {    //Function for changing the Map position along the marker in the Map
              var marker = new google.maps.Marker({
                  position: latLng,
                  map: map
              });
              map.panTo(latLng);
          }

          function savejourney(){      //Function for the Save journey action After clicking the Save Journey Button on client side.
                var name=document.getElementById("jname").value;
                var des=document.getElementById("des").value;
                if ( name!=''  && markerpoint.length!=0) {
                   var myxml= "<journey>";
                      myxml+="<des>"+des+"</des>";
                    for (var i = 0; i < markerpoint.length; i++) {
                        myxml += "<position>" + i + "</position>";
                        myxml += "<latlng>" + markerpoint[i].lat() + "," + markerpoint[i].lng() + "</latlng>";
                    }
                    myxml += "</journey>";
                	document.getElementById("xmlfile").value=myxml;
                }
                document.getElementById("latilng").value=markerpoint;

          }