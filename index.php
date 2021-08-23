<?php 

require_once 'vendor/autoload.php';

$client_id = '46135731691-snd9r5ts8o06dmtc65uagu7h8q2sr9la.apps.googleusercontent.com'; 
$client_secret = 'rBmBYKbHVkReXCag4u9dm_i4';
$redirect_uri = 'http://localhost/login_google';
 
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

$service = new Google_Service_Oauth2($client);
 

if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    $user = $service->userinfo->get(); 
     
    echo '<pre>';
    print_r($user);
    die;
}
 

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
} else { 
    $authUrl = $client->createAuthUrl();
}
 

echo '<div style="margin:20px">';
if (isset($authUrl)){ 
    echo '<div align="center">';
    echo '<h3>Login with Google -- Demo</h3>';
    echo '<div>Please click login button to connect to Google.</div>';
    echo '<a class="login" href="' . $authUrl . '">LOGIN</a>';
    echo '</div>';
     
} 
echo '</div>';

?>