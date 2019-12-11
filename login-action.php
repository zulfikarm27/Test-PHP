<?php
//if (! empty($_POST["login"])) {
    session_start();
    $username = $_POST["user_name"];
    $password = $_POST["password"];
     $url = 'http://35.240.192.212:8997/InventFoodCulinary/service/login';
    //}
$data = array("User_name" => $username,"Password" => $password,"Token"=>"1234567890","OsType"=>"ANDROID","Role"=>"Customer" );

$postdata = json_encode($data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$result = curl_exec($ch);
$hasil = (array) json_decode($result,true);
curl_close($ch);
    if ($username == "Budi" && $password == "123456"){
    header("Location: ./view/dashboard.php");
	}
else //session_destroy();
header("Location: ./index.php");

//}
//else //session_destroy();
//header("Location: ../index.php");
//$_POST["user_name"] == "Budi" && $_POST["password"] == "123456"