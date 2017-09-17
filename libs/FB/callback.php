<?php
  require_once 'app.php';
  use Facebook\FacebookRequest;
  use Facebook\GraphObject;
  use Facebook\GraphUser;
  
   
  $helper = $fb->getRedirectLoginHelper();

  try {
    // lay token
    $accessToken = $helper->getAccessToken();
    // day token va id vao session
    $_SESSION['login_fb']['token'] = (string) $accessToken;
    // OAuth 2.0 client handler
    $oAuth2Client = $fb->getOAuth2Client();
   
    /*Exchanges a short-lived access token for a long-lived one
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
    echo "Access Token: " . $accessToken; */

    // Lấy thong tin user facebook qua token
    $response = $fb->get('/me', $_SESSION['login_fb']['token']);
    // lấy thông tin về user
    $me = $response->getGraphUser();
    // $graphObject = $response->getGraphObject();

    $fb->setDefaultAccessToken((string) $accessToken);
    $_SESSION['login_fb']['id'] = $me['id'];
    $_SESSION['login_fb']['id'] = $me['id'];
    $_SESSION['login_fb']['name'] = $me['name'];

    // dang nhap xong chuyen huong ve trang admin
    header("location: ../../admin");

  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
?>