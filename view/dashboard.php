<?php
session_start();
 // $url_a='../login-action.php';
 // $data=file_get_contents($url_a);
     $url = 'http://35.240.192.212:8997/InventFoodCulinary/service/getprovince';
 // $data = array("");

 // $postdata = json_encode($data);

 $ch = curl_init($url);
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($ch, CURLOPT_POST, 1);
 //curl_setopt($ch, CURLOPT_POSTFIELDS, '');
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
 $result = curl_exec($ch);
 //$hasil = json_decode($result,true);
 $hasil = (array) json_decode($result,true);
 //var_dump($hasil);
 // echo $hasil[0]["ProvinceID"]; 
 curl_close($ch);
 //---------------------------------------------------------------------------------------
?>
<html>
<head>
<title>User Login</title>
<link href="./view/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div>
        <div class="dashboard">
            <div class="dashboard" id=>Welcome <b></b>, You have successfully logged in!<br>
                <form action="#" method="post">
             <?php if($hasil["StatusCode"] == "01"){
    echo "<select name =\"ProvinceID\"> 
      <option value=\"selected\">Choose one</option>";

   // start loop
   foreach($hasil['Value']as $section) {
     echo "<option>";

         echo $section ['ProvinceID'];

            
     echo "</option>";
    }
     $selected = $_POST['ProvinceID'];
    // close select
    echo "</select>";
    ?>
    <input type="submit" name="submit" value="Get Selected Values" />
    <?php
        $url2 = 'http://35.240.192.212:8997/InventFoodCulinary/service/getcity';
    $data = array("ProvinceID" => $selected);
    $postProvince = json_encode($data);
  $ch2 = curl_init($url2);
 curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 0);
 curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($ch2, CURLOPT_POST, 1);
 curl_setopt($ch2, CURLOPT_POSTFIELDS, $postProvince);
 curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
 curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
 $result2 = curl_exec($ch2);
 //$hasil = json_decode($result,true);
 $hasil2 = (array) json_decode($result2,true);
 //var_dump($hasil);
 // echo $hasil[0]["ProvinceID"]; 
 curl_close($ch2);
    echo "<select city =\"cityID\"> 
      <option selected=\"selected\">Choose one</option>";

   // start loop
   foreach($hasil2['Value']as $section2) {
     echo "<option>";

         echo $section2 ['CityID'];
            
     echo "</option>";
    }
    // close select
    echo "</select>";
                                                        
                                                    };

             ?>
                Click to <a href="../logout.php" class="logout-button" id="logout-button">Logout</a>
            </div>
        </div>
    </div>
    <script>
var ProvinID;
function setProvinID(){
  ProvinID = document.getElementById('ProvinceID').value;
  alert(ProvinID);
}

</script>
</body>
</html>