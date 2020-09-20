<?php

if(isset($_POST['Insert'])) {
        saveFunc();
    }
    if(isset($_POST['Get'])) {
        getFunc();
    }
    if(isset($_POST['Reset'])) {
        clearFunc();
    }
    if(isset($_POST['Delete'])) {
        removeFunc();
    }

    function saveFunc(){
        $name=$_POST['jname'];
        $latlng=$_POST['latilng'];
        if(!empty($name)&&!empty($latlng)){
          $xmlfile=$_POST['xmlfile'];
          $myfile= fopen('JourneyData/'.$name.".xml", "w") or die("unable to open file");
          fwrite($myfile, $xmlfile);
          fclose($myfile);
          include 'homePage.php';
          echo '<script>alert("Journey is saved")</script>';
      }
      elseif(empty($name)){
         echo '<script>alert("Journey Name is empty.")</script>';
        include 'homePage.php';
      }
      else{
        echo '<script>alert("Journey is not marked in map.")</script>';
        include 'homePage.php';
      }
         
    }


    function getFunc(){
        $name=$_POST['jname'];
        if(!empty($name))
        {
          $file='JourneyData/'.$name.".xml";
          if(file_exists($file)){
            $xml=file_get_contents($file);

            echo '<!DOCTYPE html>
                <html>
                <head>
                 <title>easyJet Airways</title>
                  <link rel="stylesheet" type="text/css" href="easyjetcss.css">
                  <script type="text/javascript" src="getjourneyjs.js"></script>
                </head>
                <body>
                <center><h1 style="font-size: 70px; color: brown;">easyJet Plan Journey</h1></center>
                <h2 style="color:blue;">About Trip:</h2><p id="descript"></p>
                <div id="map"></div> <!--A seperate Division to show the map-->
                <div style="background: burlywood;">

                   <form action="microservice.php" method="POST" onsubmit="return savejourney()">
                   <label style="size:50px;"><b>Enter Journey Name: </b></label>
                    <input type="text" id="jname" name="jname" required/>
                    <br>
                    <label style="size: 50px;"><b>Short Description: </b></label><br>
                    <textarea id="des" name="description"></textarea>
                    <input type="hidden" name="xmlfile" id="xmlfile" value="'.$xml.'">
                    <input type="hidden" name="name" id="name" value="'.$name.'">
                      <br>
                      <input type="submit" name="Insert" value="Save Journey" class="button">
                        <input type="submit" name="Get" value="Get ourney" class="button">
                        <input type="submit" name="Reset" value="Clear Map" class="button">
                        <input type="submit" name="Delete" value="Remove Journey" class="button">
                   
                 </form>
                </div>

                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO3hE4bE7WV7mGuXL4kn9caoWI44tD8Ic&callback=initializeMap"
                              async defer></script>
                </body>
              </html>';
          }
          else{
            echo '<script>alert(" No Journey exists with Name: '.$name.'")</script>';
            include 'homePage.php';
          }
        }
        else{
          echo '<script>alert("Journey Name is empty.")</script>';
          include 'homePage.php';
        }



       /* echo '<script>var name="'.$out.'";'.'alert(name)</script>';*/
    }


function clearFunc(){
    include 'homePage.php';
  }

function removeFunc(){
  $name=$_POST['jname'];
  if(!empty($name))
  {
    $file='JourneyData/'.$name.".xml";
    if(file_exists($file)){
      unlink($file);
      echo '<script>alert("Journey is removed.")</script>';
      include 'homePage.php';
    }
    else{
      echo '<script>alert(" No Journey exists with Name: '.$name.'")</script>';
      include 'homePage.php';
    }
  }
  else{
    echo '<script>alert("Journey Name is empty.")</script>';
    include 'homePage.php';
  }

}
?>