<?php
	require 'connectSCB.php';

	$scbAuthDatas = scbAuth();
	$scbAccessToken = $scbAuthDatas['data']['accessToken'];
	$amount = 100;
	$refCode = "REFCODE1001";
	$refCode2 = "REFCODE2001";
	$refCode3 = "REFCODE3001";
	$scbQRCode = genSCBQR($scbAccessToken,$amount,$refCode,$refCode2,$refCode3);
  // var_dump($scbQRCode);
  // exit;
  $qrImage = $scbQRCode['data']['qrImage'];

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    html,body,.container {
     height: 100%;
    }
    .container {
     display: table;
    }
    .row
    {
     height: 100%;
     display: table-row;
    }
    .vertical-center
    {
     display: table-cell;
     float: none;
     vertical-align: middle;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>กรุณาสแกนเพื่อทำการชำระเงิน</h2>
  <div class="container">
   <div class="row">
    <div class="col-sm-6 vertical-center text-center">
     <img src="https://miro.medium.com/v2/resize:fit:1400/format:webp/1*nueyBV0RNEpETYMKpsYWhA.png" class="" alt="QR Payment" width="300" height="150">
     <img src="data:image/png;base64, <?php echo $qrImage; ?>" class="img-rounded" alt="QR Payment" width="400" height="400"> 
    </div>
   </div>
  </div>
  
  
  
</div>

</body>
</html>

<script>
  
	// $( document ).ready(function() {
	// 	console.log("<?php echo $refCode; ?>");
	// });

  setTimeout(function() { 
      // window.location.href='/paymentSuccess.php';
    $.ajax({
      method: "POST",
      url: "https://cubic-florentine-lemonade.glitch.me/apiBackend.php",
      data: {}
    })
      .done(function( resp ) {
        var obj = JSON.parse(resp)
        if(obj.status == 'success'){
          window.location.href='/paymentSuccess.php';
        }
        // console.log(obj);
    });
  }, 5000);
</script>

<!-- <script>
  callSCBGenPayment();
  function callSCBGenPayment(){
    $.ajax({
      method: "POST",
      url: "https://cubic-florentine-lemonade.glitch.me/apiConnectSCB.php",
      data: { name: "John", location: "Boston" }
    })
      .done(function( msg ) {
        console.log(msg);
    });
  }
</script> -->