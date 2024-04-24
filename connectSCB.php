<?php
    function scbAuth(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api-sandbox.partners.scb/partners/sandbox/v1/oauth/token',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "applicationKey" : "l7adc86fcbb04d46d295b5fd526baed16c",
            "applicationSecret" : "d5d557cf04d74c4088e47ea64261b729"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'resourceOwnerId: l7adc86fcbb04d46d295b5fd526baed16c',
            'requestUId: dd6b995f-9fe3-492e-b57c-4d44b6191ba1',
            'accept-language: EN',
            'Cookie: TS01e7ba6b=01e76b033cfb6831b291c19a858709272ffe70aeb758e86cc52cd741cd2d8a06045b676a7c8b2423eb09b8e56af9bb691fea30e71d'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response,true);
    }

    function genSCBDeeplink($amount,$refCode)
    {
        $datas = [];
        $datas['transactionType'] = "PURCHASE";
        $datas['transactionSubType'] = ["BP", "CCFA", "CCIPP"];
        $datas['sessionValidityPeriod'] = 60;
        $datas['sessionValidUntil'] = "";

        $datas['billPayment']['paymentAmount'] = $amount;
        $datas['billPayment']['accountTo'] = "<Biller ID>";
        $datas['billPayment']['ref1'] = $refCode;
        $datas['billPayment']['ref2'] = "01";
        $datas['billPayment']['ref3'] = "SCB";

        $datas['creditCardFullAmount']['merchantId'] = "<Credit Card Merchant ID>";
        $datas['creditCardFullAmount']['terminalId'] = "<Credit Card Terminal ID>";
        $datas['creditCardFullAmount']['orderReference'] = $refCode;
        $datas['creditCardFullAmount']['paymentAmount'] = $amount;

        $datas['installmentPaymentPlan']['merchantId'] = "<Credit Card Merchant ID>";
        $datas['installmentPaymentPlan']['terminalId'] = "<Credit Card Terminal ID>";
        $datas['installmentPaymentPlan']['orderReference'] = $refCode;
        $datas['installmentPaymentPlan']['paymentAmount'] = $amount;
        $datas['installmentPaymentPlan']['tenor'] = "12";
        $datas['installmentPaymentPlan']['ippType'] = "3";
        $datas['installmentPaymentPlan']['prodCode'] = "1001";

        $datas['merchantMetaData']['callbackUrl'] = "<Redirect After Payment>";
        $datas['merchantMetaData']['merchantInfo']['name'] = "<Shop Name>";
        $datas['merchantMetaData']['extraData'] = "";
        $datas['merchantMetaData']['paymentInfo'][0]['type'] = "TEXT_WITH_IMAGE";
        $datas['merchantMetaData']['paymentInfo'][0]['title'] = "";
        $datas['merchantMetaData']['paymentInfo'][0]['header'] = "";
        $datas['merchantMetaData']['paymentInfo'][0]['description'] = "";
        $datas['merchantMetaData']['paymentInfo'][0]['imageUrl'] = "";

        $datas['merchantMetaData']['paymentInfo'][1]['type'] = "TEXT_WITH_IMAGE";
        $datas['merchantMetaData']['paymentInfo'][1]['title'] = "";
        $datas['merchantMetaData']['paymentInfo'][1]['header'] = "";
        $datas['merchantMetaData']['paymentInfo'][1]['description'] = "";

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api-sandbox.partners.scb/partners/sandbox/v3/deeplink/transactions',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($datas),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'authorization: Bearer <accessToken>',
            'resourceOwnerId: <API Key>',
            'requestUId: dd6b995f-9fe3-492e-b57c-4d44b6191ba1',
            'channel: scbeasy',
            'accept-language: EN',
            'Cookie: TS01e7ba6b=01a990b48e9743982bf33136414fecc4291ebe2dbca4c6a78368e1b35460a233bfa3dbb3853d79a41fbd33c38b84a95fc3ef577cb3'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response,true);
    }

    function genSCBQR($token,$amount,$refCode,$refCode2,$refCode3)
    {
      $datas = [];
      $datas['qrType'] = "PP";
      $datas['ppType'] = "BILLERID";
      $datas['ppId'] = "594459661573050"; //BillerID
      $datas['amount'] = $amount;
      $datas['ref1'] = $refCode;
      $datas['ref2'] = $refCode2;
      $datas['ref3'] = $refCode3;
      
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api-sandbox.partners.scb/partners/sandbox/v1/payment/qrcode/create',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($datas),
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'authorization: Bearer '.$token,
          'resourceOwnerId: l7adc86fcbb04d46d295b5fd526baed16c',
          'requestUId: 4a90b028-82fe-4316-8bc0-58da08bcbd2b',
          'accept-language: EN',
          'Cookie: TS01e7ba6b=01a990b48e74dedc108c0d26580e1045e38ad50c996bfc228039526e3a069809f421ad18da86df3ad62bfaf155151a1e19a3f0035b'
        ),
      ));
      
      $response = curl_exec($curl);

      curl_close($curl);
      
      return json_decode($response,true);
    }