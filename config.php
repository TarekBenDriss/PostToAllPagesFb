<?php
include_once("inc/facebook.php"); //include facebook SDK
 
######### edit details ##########
$appId = 'XXXXXXXXXXXXXXXXXX'; //Facebook App ID
$appSecret = 'XXXXXXXXXXXXXXXXXX'; // Facebook App Secret
$return_url = 'http://yourdomain/post/process.php';  //return url (url to script)
$homeurl = 'http://yourdomain/post/';  //return to home
$fbPermissions = 'publish_stream,manage_pages';  //Required facebook permissions
##################################

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));

$fbuser = $facebook->getUser();
?>
