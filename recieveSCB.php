<?php
  $datas = file_get_contents('php://input');
  
  $deCode = json_decode($datas,true);

  $payerName = $deCode['$payerName'];
  $transactionId = $deCode['transactionId'];
  $transactionDateandTime = $deCode['transactionDateandTime'];
  $billPaymentRef1 = $deCode['billPaymentRef1'];
  $billPaymentRef2 = $deCode['billPaymentRef2'];
  $billPaymentRef3 = $deCode['billPaymentRef3'];

  // file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);
?>