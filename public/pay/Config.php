<?php

    $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';

    $config = [

    'appid' => '20211540019782', // 商户应用id
    'appsecret' => 'SCTjZsSMnGQ88ctPBrfEfYQnGBr7Ckpt', // 商户MD5签名密钥
    'gateway_url' => 'http://www.18pay.com/api/pay/submit ', // 创建订单接口
    'paytype'=>'18pay'
    ];

    ?>