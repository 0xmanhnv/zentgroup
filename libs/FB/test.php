<?php 
	require_once 'vendor/autoload.php';
	// use Facebook\FacebookRequest;
	// use Facebook\FacebookRequestException;
	// use Facebook\GraphUser;

	session_start();
 
	 
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;


	// init app with app id (APPID) and secret (SECRET)
	FacebookSession::setDefaultApplication('116644735712600','c568b9cbac486e0f8cad6d22719c3bcd');
	 
	// login helper with redirect_uri
	$helper = new FacebookRedirectLoginHelper( 'http://localhost/zentgroup/libs/FB/callback.php' );
	 
	try {
	  $session = $helper->getSessionFromRedirect();
	} catch( FacebookRequestException $ex ) {
	  // When Facebook returns an error
	} catch( Exception $ex ) {
	  // When validation fails or other local issues
	}
	 
	// see if we have a session
	if ( isset( $session ) ) {
	  // graph api request for user data
	  $request = new FacebookRequest( $session, 'GET', '/me' );
	  $response = $request->execute();
	  // get response
	  $graphObject = $response->getGraphObject();
	   
	  // print data
	  echo  print_r( $graphObject, 1 );
	} else {
	  // show login url
	  echo '<a href="' . $helper->getLoginUrl() . '">Login</a>';
}
 
?>