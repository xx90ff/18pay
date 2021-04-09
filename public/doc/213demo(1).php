<?php
//余额查询
function balance()
    {
        $data = [
            'merchant_sn' => "2000000213",//商户号
            'channel_code' => "1001",//通道号
        ];
        $data['sign'] = makeSign($data, "");//商户 secret
        $result = postData('https://域名地址/api/settle/balance', $data);
        return $result;
    }

//代付
function settle()
{

    $params = [
        'notify_url' => 'http://127.0.0.1', 'merchant_sn' => '2000000213',
        'channel_code' => '1008', 'secret_key' => '1b5126c1229176c2d1796a8e1e2b5d56',//商户 secret
        'amount' => 100, 'bank_account' => '1', 'bank_cardno' => '1', 'bank_code' => 'test','idno'=>'1','mobile'=>'1','branch_name'=>'1','area'=>1,
        'pub_pem' => '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDWpwcMLGjjT0+nZK6/MiHIwLR1
ZiM/G4GHYCr4z7vhYfmuy/+KBGtx6+4DcY7CikUORvweX8UbNaOZcd5Gj3HtzcZ0
36+sGZbh8vCE7pLDACfeWzmxg47B6lzTsSHGwRquwRc8wgVP0I0wPEjEjwhcHP+B
S36cQfapZn/B3lXydQIDAQAB
-----END PUBLIC KEY-----'
    ];

    $data = [
        'channel_code' => $params['channel_code'],
        'notify_url' => $params['notify_url'],
        'down_sn' => 'test123456',
        'amount' => $params['amount'],
        'bank_account' => $params['bank_account'],
        'bank_cardno' => $params['bank_cardno'],
        'bank_code' => $params['bank_code'],
        'area' => $params['area'],
        'branch_name' => $params['branch_name'],
        'mobile' => $params['mobile'],
        'idno' => $params['idno']
    ];
    $host = 'http://newboatpay.cc';
    var_dump('加密前参数和签名');
    var_dump($data);
    $data['sign'] = makeSign($data, $params['secret_key']);
    
    //die;
    //平台公钥加密
    $cipher_data = rsaEncode($data, $params['pub_pem']);
    
    var_dump('提交url');
    var_dump($host . '/api/settle/pay');
    var_dump('RSA后提交报文');
    var_dump([
        'merchant_sn' => $params['merchant_sn'],
        'cipher_data' => $cipher_data,
    ]);
    die;
    $json = postData($host . '/api/settle/pay', [
        'merchant_sn' => $params['merchant_sn'],
        'cipher_data' => $cipher_data,
    ]);
    $res = json_decode($json, true);
    var_dump($res);
    //return $res;
}


function settlequery()
{

    $params = [
        'merchant_sn' => '2000000213',
        'down_sn' => '123', 'secret_key' => '1',
    ];

    $data = [
        'merchant_sn' => $params['merchant_sn'],
        'down_sn' => $params['down_sn']
    ];
    $host = 'http://newboatpay.cc';
    
    
    $data['sign'] = makeSign($data, $params['secret_key']);
    var_dump('参数和签名');
    var_dump($data);
    $json = postData($host . '/api/settle/query', $data);
    var_dump('api 请求地址');
    var_dump($host . '/api/settle/query');
   $res = json_decode($json, true);
   var_dump('接口返回');
    var_dump($res);
    //return $res;
}
//交易回调返回
function notifyTrans()
    {
        $post = input('post.');
        trace($post, 'diy');//做日志
        return 'success';
    }
//代付回调返回
function notifySettle()
  {
    $post = input('post.');
    trace($post, 'diy');//做日志
    return 'success';
  }
  
//签名

function makeSign($post, $secret)
{

    ksort($post);
    $data = '';
    foreach ($post as $key => $val) {
        if (!in_array($key, ['sign', 'code', 'msg']) && $val !== '') {
            $data .= $key . '=' . $val . '&';
        }
    }

    $data .= 'key=' . $secret;
    var_dump("签名开始：");
     var_dump("字符串拼接");
     var_dump($data);
    $sign = strtolower(md5($data));
     var_dump("md5签名");
     var_dump($sign);
     var_dump("签名结束");
    return $sign;
}

/**
 * 生成随机字符串
 *
 * @param int    $length 长度
 * @param string $chars  包含的字符
 *
 * @return string
 */
function random($length, $chars = '123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ')
{

    $hash = '';
    $max = strlen($chars) - 1;
    for ($i = 0; $i < $length; $i++) {
        $hash .= $chars[mt_rand(0, $max)];
    }
    return $hash;
}

/**
 * RSA公钥加密
 *
 * @param array  $params 参数
 * @param string $pubKey 公钥
 *
 * @return string
 */
function rsaEncode($params, $pubKey)
{

    $originalData = json_encode($params);
    var_dump('未加密参数先json');
    var_dump($originalData);
    $crypto = '';
    $encryptData = '';
    foreach (str_split($originalData, 117) as $chunk) {
        openssl_public_encrypt($chunk, $encryptData, $pubKey);
        $crypto .= $encryptData;
    }
    var_dump('对Json--RSA后的值');
    var_dump($crypto);
    var_dump('对RSA内容base64后的值');
    var_dump(base64_encode($crypto));
    return base64_encode($crypto);
}


function postData($url, $data)
{


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "content-type: application/x-www-form-urlencoded; charset=UTF-8"
    ]);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 24);
    curl_setopt($ch, CURLOPT_TIMEOUT, 24);
    //如果被重定向
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    //跳过SSL验证
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
    $handles = curl_exec($ch);

    curl_close($ch);

    return $handles;
}

settle();
die;