<?php
  $name = $_REQUEST['name'];
?>
<!DOCTYPE html>
<html>

<head>
  <title>Reply Chat-Bot</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <div>
      <span> answer to <?php echo $name?> </span>
    </div>
    <div class="text-center">
      <form action="" method="post">
        <div class="form-group">
          <input type="text" name="msg"><br><br>
          <input class="btn btn-primary" type="submit" name="SubmitButton">
        </div>
      </form>
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
$id = $_REQUEST['uid'];
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