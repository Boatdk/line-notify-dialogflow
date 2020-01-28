<?php
date_default_timezone_set("Asia/Bangkok");
$date = date("Y-m-d");
$time = date("H:i:s");
$json = file_get_contents('php://input');
$request = json_decode($json, true);
$queryText = $request["queryResult"]["queryText"];
$message = $queryText;
$action = $request["queryResult"]["action"];
$userId = $request['originalDetectIntentRequest']['payload']['data']['source']['userId'];
$opts = [
"http" =>[
"header" => "Content-Type: application/json\r\n".'Authorization: Bearer yyothAtmfA9lxKR7cWJucLYFjMZad7KHzvShpmORiqHrgP2uXgG16ATaWB3pv32F8lZYQqli1LpAWjUqgPQUAFvUGx7uCzUVWrwzFgWmF6ZwxLX8aPBDrybTc86xnFF9MsowYDvtxDc1ErBnriP4AgdB04t89/1O/w1cDnyilFU='
]
];
$context = stream_context_create($opts);
$profile_json = file_get_contents('https://api.line.me/v2/bot/profile/'.$userId,false,$context);
$profile_array = json_decode($profile_json,true);
$pic_ = $profile_array[pictureUrl];
$name_ = $profile_array[displayName];
//$message_all = "คุณ ".$name." ถามว่า ".$message;
$message_all = '[Line_mad] '.$name_.' ถามว่า '.$message.' '.'https://line-notify-none-intent.herokuapp.com/push1-1.php?uid='.$userId;

$date_ = date("Y-m-d");
$time_ = date("H:i:s");
$content = $date_.' '.$time_.' '.$name_.' '.$userId.' '.$pic_.' '.$message."\n";

/* $myfile = fopen("log_.txt", "a") or die("Unable to open file!");
fwrite($myfile,$content);
fclose($myfile);
*/
$chOne = curl_init();
curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
// SSL USE
curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
//POST
curl_setopt( $chOne, CURLOPT_POST, 1);
// Message
curl_setopt( $chOne, CURLOPT_POSTFIELDS, $message);
//ถ้าต้องการใส่รุป ให้ใส่ 2 parameter imageThumbnail และimageFullsize
curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$message_all&imageThumbnail=$pic_&imageFullsize=$pic_");
// follow redirects
curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
//ADD header array
$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer IznR59FVLcjvHwKlJdZQalRsni11ZGhd50VJ7biYuLG', );
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
//RETURN
curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec( $chOne );
//Check error
if(curl_error($chOne)) { echo 'error:' . curl_error($chOne); }
else { $result_ = json_decode($result, true);
//echo "status : ".$result_['status'];
//echo "message : ". $result_['message'];
}
//Close connect
curl_close( $chOne );
?>