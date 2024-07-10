<?php
if (!file_exists("TheN")){
echo "لا يمكن استخدام هذا الملف بشكل يدوي";
exit;
}
if (!file_exists("TheN")){
echo "لا يمكن استخدام هذا الملف بشكل يدوي";
exit;
}
date_default_timezone_set("Asia/Baghdad");
if (file_exists('madeline.php')){
    require_once 'madeline.php';
}
define('MADELINE_BRANCH', 'deprecated');
$token = file_get_contents("token");

function bot($method, $datas = []) {
global $token;
$url = "https://api.telegram.org/bot$token/" . $method;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$res = curl_exec($ch);
curl_close($ch);
return json_decode($res, true);
}
$settings = (new \danog\MadelineProto\Settings\AppInfo) ->setApiId(13167118) ->setApiHash('6927e2eb3bfcd393358f0996811441fd');
if(file_get_contents("TheN")){
$dd = file_get_contents("TheN");
}else{
$dd = "TheN";
}
$MadelineProto = new \danog\MadelineProto\API(''.$dd.'.madeline', $settings);  
require("conf.php");
$TT = file_get_contents("token");
$tg = new Telegram("$TT");
$lastupdid = 1; 
while(true){ 
$upd = $tg->vtcor("getUpdates", ["offset" => $lastupdid]); 
if(isset($upd['result'][0])){ 
$text = $upd['result'][0]['message']['text']; 
$chat_id = $upd['result'][0]['message']['chat']['id']; 
$from_id = $upd['result'][0]['message']['from']['id']; 
$sudo = file_get_contents("ID");;
if($from_id == $sudo){
try{
if(file_get_contents("step") == "2"){
if (!preg_match('/Login\d+/',$text)){
$MadelineProto->phonelogin($text);
$tg->vtcor('sendmessage',['chat_id'=>$chat_id, 'text'=>"• حسناً . الان ارسل كود التحقق المكون من ٥ ارقام مثال  \n63796"]);
file_put_contents("step","3");
}
}elseif(file_get_contents("step") == "3"){
if($text){
$authorization = $MadelineProto->completephonelogin($text);
if ($authorization['_'] === 'account.password') {
$tg->vtcor('sendmessage',['chat_id'=>$chat_id, 'text'=>"• حسناً . الان ارسل رمز التحقق مثال \samer"]);
file_put_contents("step","4");
}else{
$tg->vtcor('sendmessage',['chat_id'=>$chat_id, 'text'=>"• تشيكر رقم ".file_get_contents("TheN") ."\n• تم تسجيل الدخول✅"]);
unlink("step");
unlink("TheN");
exit;
}
}
}elseif(file_get_contents("step") == "4"){
if($text){
$authorization = $MadelineProto->complete2falogin($text);
$tg->vtcor('sendmessage',['chat_id'=>$chat_id, 'text'=>"• تشيكر رقم ".file_get_contents("TheN") ."\n• تم تسجيل الدخول✅"]);
unlink("step");
unlink("TheN");
exit;
}
}
}catch(Exception $e) {
$tg->vtcor('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- حصل خطأ .",
]);
exit;
}
}
$lastupdid = $upd['result'][0]['update_id'] + 1;
}
}