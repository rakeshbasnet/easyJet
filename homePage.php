<!DOCTYPE html>
<html>
<head>
 <title>easyJet Airways</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="easyjetcss.css">
    <script type="text/javascript" src="easyScript.js"></script>
 </head>

<!--HTML codes for defining the Text field, Buttons, and map-->
<!-- <body onload="clearmap()"> -->
<body>
<center><h1 style="font-size: 70px; color: brown;">easyJet Plan Journey</h1></center>
<div id="map"></div> <!--A seperate Division to show the map-->
<div style="background: burlywood;">

   <form action="microservice.php" method="POST" onsubmit="return savejourney()">
   <label style="size:50px;"><b>Enter Journey Name: </b></label>
    <input type="text" id="jname" name="jname" required />
    <br>
    <label style="size: 50px;"><b>Short Description: </b></label><br>
    <textarea id="des" name="description"></textarea>
    <input type="hidden" name="xmlfile" id="xmlfile">
    <input type="hidden" name="latilng" id="latilng">
      <br>
    <input type="submit" name="Insert" value="Save Journey" class="button">
	<input type="submit" name="Get" value="Get Journey" class="button">
    <input type="submit" name="Reset" value="Clear Map" class="button">
    <input type="submit" name="Delete" value="Remove Journey" class="button">

   
 </form>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO3hE4bE7WV7mGuXL4kn9caoWI44tD8Ic&callback=initializeMap"
              async defer></script>  <!--The script to initialize the map in the website Using provided Google Map API Key-->
</body>
</html>