<?php
include_once("config.php");

if($_POST)
{
	//Post variables we received from user
	
	$userMessage 	= $_POST["message"];
	$userlink 	= $_POST["link"];
	$userpic  = $_POST["picture"];
	$nbr = $_POST["nbr"];
	
	if(strlen($userMessage)<1) 
	{
		//message is empty
		$userMessage = '';
	}
	
for ($j=1; $j <= $nbr; $j++)
{    $ch= "k".$j;  
     $userPageId = $_POST[$ch];


		//HTTP POST request to PAGE_ID/feed with the publish_stream
		$post_url = '/'.$userPageId.'/links';

		/*
		// posts message on page feed
		$msg_body = array(
			'message' => $userMessage,
			'name' => '',
			'caption' => "",
			'link' => '',
			'description' => '',
			'picture' => ''
			'actions' => array(
								array(
									'name' => 'Saaraan',
									'link' => 'http://www.saaraan.com'
								)
							)
		);
		*/
	
		//posts message on page statues 
		$msg_body = array(
			
		'link' => $userlink,
		'message' => $userMessage,
        'picture' => $userpic,
        
		);
	
	if ($fbuser) {
	  try {
			$postResult = $facebook->api($post_url, 'post', $msg_body );
		} catch (FacebookApiException $e) {
		echo $e->getMessage();
	  }
	}else{
	 $loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$homeurl,'scope'=>$fbPermissions));
	 header('Location: ' . $loginUrl);
	}
}	echo $nbr ;
echo $userPageId;
	//Show sucess message
	if($postResult)
	 {   
	 	 echo $nbr.'<br>';
		 echo '<html><head><title>Message Posted</title><link href="style.css" rel="stylesheet" type="text/css" /></head><body>';
		 echo '<div id="fbpageform" class="pageform" align="center">';
		 echo '<h1>Your message is posted on your facebook wall.</h1>';
		 echo '<a class="button" href="'.$homeurl.'">Back to Main Page</a> <a target="_blank" class="button" href="http://www.facebook.com/'.$userPageId.'">Visit Your Page</a>';
		 echo '</div>';
		 echo '</body></html>';
	 }
}
 
?>

