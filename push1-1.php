<!DOCTYPE html>
<html>

<head>
  <title></title>
  <style>
    body {
      background: #ccc;
    }

    input[type=text] {
      width: 218px;
    }

    input[type=submit] {
      background: #000;
      color: #fff;
    }

    input[type=submit],
    input[type=text] {
      padding: 9px;
      font-size: 18px;
      line-height: 18px;
      float: left;
      border: 0;
      display: block;
      margin: 0;
    }
  </style>
</head>

<body>
  <br>
  <table align="center">
    <tr align="center">
      <td align="center">
        <form action="" method="post" align="center">
          <input type="text" name="msg"><br><br>
          <input type="submit" name="SubmitButton">
        </form>
      </td>
    </tr>

  </table>
</body>

</html>
<?php
error_reporting(0);
$id = $_REQUEST[‘uid’];
if(isset($_POST[‘SubmitButton’])){
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
"authorization: Bearer Not-in-Intent",
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
echo $response;
}
}
?>