<?php
$base = "http://mobile.icctoro.com:80";
$d['header'] = "Content-Type: application/x-www-form-urlencoded
Host: wigo.wifi.id
Accept-Encoding: gzip, deflate
User-Agent: okhttp/3.10.0";
//$sc = "180.253.14.89:80";
//$d['sock'] = $sc;
//$data['sock'] = $sc;
$var = fopen("../modul/cookie.txt", "w");
fwrite($var, "");
fclose($var);
echo "|ICCTOROBOT |";
echo"\nKode Reff Jumlahnya 6 Digit";
echo "\n\nMasukanKode Reff : "
$reff = trim(fgets(STDIN));



function email($act = "", $pram = "")
{

    $file = "../modul/cookie.txt";
    $xfile  = file_get_contents($file);
    preg_match('/PHPSESSID\s+(.*)/', $xfile, $m);
    $ses = "Cookie: PHPSESSID=" . $m['1'];

    $d['header'] = "Host: api.guerrillamail.com
User-Agent: Guerrilla Mail API (www.guerrillamail.com)
Content-Type: application/x-www-form-urlencoded
" . $ses;


    $d['cookie'] = 1;
    include_once('../modul/modul.php');
    if ($act == "check_email") {
        $d['url'] = "http://api.guerrillamail.com/ajax.php?f=check_email&ip=127.0.0.1&agent=Mozilla_foo_bar&seq=2";
    }
    if ($act == "set_email_user") {
        $d['url'] = "http://api.guerrillamail.com/ajax.php?f=set_email_user&ip=127.0.0.1&agent=Mozilla_foo_bar&email_user=" . $pram;
    }
    if ($act == "fetch_email") {
        $d['url'] = "http://api.guerrillamail.com/ajax.php?f=fetch_email&ip=127.0.0.1&agent=Mozilla_foo_bar&email_id=" . $pram;
    }
    return json_decode(curl($d)['result'], true);
}



function get_email()
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://ninjaname.horseridersupply.com/indonesian_name.php");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $ex = curl_exec($ch);
    preg_match_all('~(&bull; (.*?)<br/>&bull; )~', $ex, $name);
    $nama = $name[2][mt_rand(0, 14)];
    return str_replace(" ", "", $nama) . mt_rand(100, 999);
}

function get_nama()
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://ninjaname.horseridersupply.com/indonesian_name.php");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $ex = curl_exec($ch);
    preg_match_all('~(&bull; (.*?)<br/>&bull; )~', $ex, $name);
    $nama = $name[2][mt_rand(0, 14)];
    return $nama;
}






function otp($email){
    include_once('../modul/modul.php');
    global $base, $d;
    $d['url'] = $base . "/api/user/send/email";
    $d['data'] = "email=".urlencode($email)."&templateCode=user_3";
    $d['header'] = "Authorization: 
Content-Language: en-us
Source-Site: android.xasq
Content-Type: application/x-www-form-urlencoded
Content-Length: ".strlen($d['data'])."
Host: mobile.icctoro.com
Connection: close
Accept-Encoding: gzip, deflate
User-Agent: okhttp/3.10.0";
    return json_decode(curl($d)['result'], true);
    
}

function regis($email,$otp){
    include_once('../modul/modul.php');
    global $base, $d;
    $d['url'] = $base . "/api/user/register/standard";
    $d['data'] = "deviceId=".rand(1111,8888)."".rand(1111,9999)."".rand(1111,9999)."&password=098f45bc46b7e290c55c94515db6d676&userType=0&validCode=$otp&email=$email&resolution=720*1280&userName=$email&deviceName=HUAWEI&validCodeType=email&softwareVersion=5.1.1&deviceVersion=HUAWEI%20RIO-CL00";
    $d['header'] = "Authorization: 
Content-Language: en-us
Source-Site: android.xasq
Content-Type: application/x-www-form-urlencoded
Content-Length: ".strlen($d['data'])."
Host: mobile.icctoro.com
Connection: close
Accept-Encoding: gzip, deflate
User-Agent: okhttp/3.10.0";
    return json_decode(curl($d)['result'], true);
    
}

function login($email){
    include_once('../modul/modul.php');
    global $base, $d;
    $d['url'] = $base . "/api/user/login/email";
    $d['data'] = "loginName=$email&resolution=720*1280&deviceId=864394020282077&password=098f45bc46b7e290c55c94515db6d676&deviceName=HUAWEI&softwareVersion=5.1.1&deviceVersion=HUAWEI%20RIO-CL00";
    $d['header'] = "Authorization: 
Content-Language: en-us
Source-Site: android.xasq
Content-Type: application/x-www-form-urlencoded
Content-Length: ".strlen($d['data'])."
Host: mobile.icctoro.com
Connection: close
Accept-Encoding: gzip, deflate
User-Agent: okhttp/3.10.0";
    return json_decode(curl($d)['result'], true);
    
}

function getref($token,$reff){
    include_once('../modul/modul.php');
    global $base, $d;
    $d['url'] = $base . "/api/user/invite/bind?bindType=0&inviteCode=".$reff;
    $d['data'] = " ";
    $d['header'] = "Authorization: ".$token."
Content-Language: en-us
Source-Site: android.xasq
Content-Type: application/x-www-form-urlencoded
Content-Length: ".strlen($d['data'])."
Host: mobile.icctoro.com
Connection: close
Accept-Encoding: gzip, deflate
User-Agent: okhttp/3.10.0";
    return json_decode(curl($d)['result'], true);
    
}

$gen_m = get_email();
$nama = strtolower(get_nama());
$email = $gen_m;
$mail = $gen_m ;
$pass = get_email() . rand(111, 999);


$ret = otp("$gen_m@grr.la");

if ($ret['code']!=200) {
    echo "Gagal Mendaftar : " . $ret['msg'] . "\n\r";
    echo $email . "\n";
    print_r($ret);
    sleep(1);
    die();
} else {
    echo "Sukses Kirim OTP !!!\n";
   // $data = $email . '||' . $pass . "\n";
    file_put_contents('nuyul.txt', $data . $ex, FILE_APPEND);




if ($mail != null) {
    echo "->Email  :" . $email . "\n";
    $cek['count'] = 0;
    echo "->Mengambil Kode Aktivasi : ";
    sleep(50); // Perhitungan email diterima server 50 detik
    while ($cek['count'] < 1) {
        $s = email("set_email_user", $mail);
        $cek = email("check_email");
        echo ".";
        if ($cek['count'] >= 1) {
            
                $mail_id = $cek['list'][0]['mail_id'];
            
        } else {
            sleep(3);
        }
    }


    echo "\n->Mencoba Aktivasi : $mail_id - ";

    $s = email("set_email_user", $mail);
    $get_verif = email("fetch_email", $mail_id)['mail_body'];
    preg_match_all('/Verification code：(.*?)<br>/', $get_verif, $link_verif);
    $aktivasi = $link_verif['1']['0'];
    
    $ret = regis("$gen_m@grr.la",$aktivasi);
    if($ret['code']==200){
        echo "Sukses";
        echo "\n->Mencoba Login : ";
        $ret = login("$gen_m@grr.la",$aktivasi);
        if($ret['code']==200){
            echo "Sukses";
            echo "\n->Suntik Reff : ";
            $token = $ret['data']['accessToken'];
            $ret = getref($token,$reff);
            if($ret['code']==200){
                echo "Sukses";
            }else{
                print_r($ret);
            }
        } else{
            print_r($ret);
        }
    }else{
        print_r($ret);
    }

    }
}
