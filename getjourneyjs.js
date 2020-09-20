                        var txt = [];
                        var j=0;
                        var linearray=[];
                        var x, i;
                      function initializeMap(){ 
                               map = new google.maps.Map(document.getElementById("map"), {
                              zoom: 6,
                              center: { lat: -25.363882, lng: 131.044922 },
                              mapTypeId: google.maps.MapTypeId.ROADMAP
                          });
                           var parser = new DOMParser();
                                var xmlfile=document.getElementById('xmlfile').value;
                                var xmlDoc = parser.parseFromString(xmlfile, "application/xml");
                                x = xmlDoc.getElementsByTagName("latlng");
                                y=xmlDoc.getElementsByTagName("des");
                                for (i = 0; i < x.length; i++) {
                                    var location=x[i].childNodes[0].nodeValue;
                                     var latlang = location.split(",");
                                        lat=parseFloat(latlang[0]);
                                         lang=parseFloat(latlang[1]);
                                        linearray.push(new google.maps.LatLng(lat, lang));
                                }
                                var descript=y[0].childNodes[0].nodeValue;
                                document.getElementById("descript").innerHTML=descript;
                                var name=document.getElementById('name').value;
                                document.getElementById("jname").value=name;

                                 var map = new google.maps.Map(document.getElementById("map"), {
                                     zoom: 6,
                                    center: new google.maps.LatLng(lat, lang),
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                });

                                for (i = 0; i < linearray.length; i++) {
                                    var marker = new google.maps.Marker({
                                        position: linearray[i],
                                        map: map
                                    });
                                   // map.panTo(linearray[i]);
                                }
                                polylineplot(linearray,map);
                                function polylineplot(linearray,map)
                                 {
                                    var flightPath = new google.maps.Polyline({
                                        map: map,
                                        path: linearray,
                                        strokeColor: "#FF0000",
                                        strokeOpacity: 1.0,
                                        strokeWeight: 2
                                        });
                                    flightLines.setMap(map);
                                }
                        }