<?php
  $user_id = $_REQUEST['uid'];
  $name = substr($user_id, 38);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Reply Chat-Bot</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Mitr&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">   
  <style>
    body{
      font-family: 'Mitr', sans-serif;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="http://shemagazine.net/wp-content/uploads/2018/02/line-logo.png" width="30" height="30" alt="">
    </a>
  </nav>
  <div class="container">
    <div class="row mt-4">
      <div class="col-md-12">
        <div class="card">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTvmO-2H6gB0Z1sarIOyw-aJoS3C1_yNklvnbIz0FFHIOnYsnoP" class="card-img-top" alt="line-cover">
          <div class="card-header">
            <h6>ตอบกลับ <span class="badge badge-success"><?php echo $name;?></span></h6>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <input class="form-control" type="text" name="msg">
              </div>
              <div class="text-right">
                <input class="btn btn-success btn-sm" type="submit" name="SubmitButton" value="ส่ง">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?php
error_reporting(0);
$user_id = $_REQUEST['uid'];
$id = substr($user_id, 0, 33);
if(isset($_POST['SubmitButton'])){
$msg = $_POST["msg"];

//$msg = utf8_encode_deep($msg1);

$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.line.me/v2/bot/message/push",
// CURLOPT_SSL_VERIFYPEER => false,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "{\r\n\r\n \"to\": \"$id\",\r\n\r\n \"messages\": [{\r\n\r\n \"type\": \"text\",\r\n\r\n \"text\": \"$msg\"\r\n\r\n }]\r\n\r\n}",
CURLOPT_HTTPHEADER => array(
"authorization: Bearer yyothAtmfA9lxKR7cWJucLYFjMZad7KHzvShpmORiqHrgP2uXgG16ATaWB3pv32F8lZYQqli1LpAWjUqgPQUAFvUGx7uCzUVWrwzFgWmF6ZwxLX8aPBDrybTc86xnFF9MsowYDvtxDc1ErBnriP4AgdB04t89/1O/w1cDnyilFU=",
"cache-control: no-cache",
"content-type: application/json",
"postman-token: 99e1d5c3-fd7a-8163-c413–687e5cb8e3c8"
),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
echo "cURL Error #:" . $err;
} else {
echo '<script> alert("สำเร็จ");</script>';
}
}
?>