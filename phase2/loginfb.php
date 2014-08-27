<?php 
if (!isset($_SESSION)) {
  ob_start();
  @session_start();
}
 
// Facebook PHP SDK v4.0.8
 
// path of these files have changes
require_once('config/config.php');
require_once('config/function.php');
require_once('lib/functions.php');
require_once( 'Facebook/HttpClients/FacebookHttpable.php' );
require_once( 'Facebook/HttpClients/FacebookCurl.php' );
require_once( 'Facebook/HttpClients/FacebookCurlHttpClient.php' );
 
require_once( 'Facebook/Entities/AccessToken.php' );
require_once( 'Facebook/Entities/SignedRequest.php' );
 
// other files remain the same
require_once( 'Facebook/FacebookSession.php' );
require_once( 'Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'Facebook/FacebookRequest.php' );
require_once( 'Facebook/FacebookResponse.php' );
require_once( 'Facebook/FacebookSDKException.php' );
require_once( 'Facebook/FacebookRequestException.php' );
require_once( 'Facebook/FacebookOtherException.php' );
require_once( 'Facebook/FacebookAuthorizationException.php' );
require_once( 'Facebook/GraphObject.php' );
require_once( 'Facebook/GraphSessionInfo.php' );
 
// path of these files have changes
use Facebook\HttpClients\FacebookHttpable;
use Facebook\HttpClients\FacebookCurl;
use Facebook\HttpClients\FacebookCurlHttpClient;
 
use Facebook\Entities\AccessToken;
use Facebook\Entities\SignedRequest;
 
// other files remain the same
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookOtherException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphSessionInfo;
// init app with app id (APPID) and secret (SECRET)
FacebookSession::setDefaultApplication(APPID,SECRET);
// login helper with redirect_uri
$helper = new FacebookRedirectLoginHelper( SITEURL );
// see if a existing session exists
if ( isset( $_SESSION ) && isset( $_SESSION['fb_token'] ) ) {
  // create new session from saved access_token
  $session = new FacebookSession( $_SESSION['fb_token'] );
  
  // validate the access_token to make sure it's still valid
  try {
    if ( !$session->validate() ) {
      $session = null;
    }
  } catch ( Exception $e ) {
    // catch any exceptions
    $session = null;
  }
}  
 
if ( !isset( $session ) || $session === null ) {
  // no session exists
  
  try {
    $session = $helper->getSessionFromRedirect();
  } catch( FacebookRequestException $ex ) {
    // When Facebook returns an error
    // handle this better in production code
    print_r( $ex );
  } catch( Exception $ex ) {
    // When validation fails or other local issues
    // handle this better in production code
    print_r( $ex );
  }
  
}
// see if we have a session
if ( isset( $session ) ) {
  // save the session
  $_SESSION['fb_token'] = $session->getToken();
  // create a session using saved token or the new one we generated at login
  $session = new FacebookSession( $session->getToken() );
  //graph api request for user like page
    // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $user = $response->getGraphObject()->asArray();
  
  // print profile data
  $uid = $user['id'];
  $fb_url = $user['link'];
  $fb_avatar = "https://graph.facebook.com/$uid/picture?type=large";
  $fb_email = $user['email'];
  $fb_name = $user['name'];
  $_SESSION['fb_name'] = $fb_name;
  $_SESSION['fb_uid'] =$uid;
  $answer = $_SESSION['answer'];
  //insert_answer("",$answer,1,$uid,$fb_name,1);
  /**
   * you insert code save your data to database here
   */

  // print logout url using session and redirect_uri (logout.php page should destroy the session)
  $logoutUrl = $helper->getLogoutUrl( $session, SITEURL );
  
} else {
  // show login url
  $loginUrl = $helper->getLoginUrl( array( 'email', 'user_friends', 'public_profile' ));
  _redirect($loginUrl);  
}
if($_SESSION['fb_uid']){
  _redirect("http://ngansua.vn/uongsuachudong.php");
}