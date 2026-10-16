<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
function rewrite_urls($change){
  $match = [
    '/userdetails.php\?id=([0-9]+)/',
    '/userdetails.php/',



    '/statistics.php\?id=([0-9]+)&t=([A-Za-z0-9_-]+)/',

    '/quizzes.php\?request=my/',

    '/quizzes.php\?id=([0-9]+)&t=([A-Za-z0-9_-]+)&request=results&r=([0-9]+)/',
    '/quizzes.php\?id=([0-9]+)&t=([A-Za-z0-9_-]+)&request=results/',
    '/quizzes.php\?id=([0-9]+)&t=([A-Za-z0-9_-]+)/',
    '/quizzes.php\?c=([0-9]+)\&t=([A-Za-z0-9_-]+)\&page=([0-9]+)/',
    '/quizzes.php\?c=([0-9]+)\&t=([A-Za-z0-9_-]+)/',
    '/quizzes.php\?page=([0-9]+)/',
    '/quizzes.php/',

    '/pages.php\?id=([0-9]+)&t=(.*)/',
  ];
  $replace = [

    'mydetails/$1',
    'mydetails',


    'statistics/$1/$2/',

    'myquizzes',

    'quiz/$1/$2/results/$3',
    'quiz/$1/$2/results',
    'quiz/$1/$2',
    'quizzes/$1/$2/page/$3',
    'quizzes/$1/$2',
    'quizzes/page/$1',
    'quizzes',

    'pages/$1/$2',
  ];

  $change = preg_replace($match, $replace, $change);

	return $change;
}
ob_start("rewrite_urls");


# Language
$lang = [];
if(isset($_COOKIE['lang']) && file_exists(__DIR__.'/lang/'.$_COOKIE['lang'].'.php')){
	include __DIR__.'/lang/'.$_COOKIE['lang'].'.php';
} else {
	include __DIR__.'/lang/en.php';
}

function getBaseUrl(){
  $protocol = 'http';
  if ($_SERVER['SERVER_PORT'] == 443 || (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on')) {
    $protocol .= 's';
  }
  $host = $_SERVER['HTTP_HOST'];
  $request = $_SERVER['PHP_SELF'];
  return dirname($protocol . '://' . $host . $request);
}

# Your website path
define("path", getBaseUrl());

include __DIR__."/configs/connection.php";
include __DIR__."/configs/defines.php";
include __DIR__."/configs/countries.php";
include __DIR__."/configs/phone.php";
include __DIR__."/configs/functions.php";
include __DIR__."/configs/pagination.php";
include __DIR__."/configs/class.upload.php";


# Site Details
db_global();

# User Details
db_login_details();

if(in_array(page, ['configs', 'login'])){
  header("HTTP/1.0 404 Not Found");
}

# User Client Info
include __DIR__."/configs/info.class.php";

define("get_ip",           UserInfo::get_ip() );
define("get_os",           UserInfo::get_os() );
define("get_browser",      UserInfo::get_browser() );
define("get_device",       UserInfo::get_device() );



#PHPMailer
use PHPMailer\PHPMailer\PHPMailer;

require __DIR__.'/configs/phpmailer/Exception.php';
require __DIR__.'/configs/phpmailer/PHPMailer.php';
require __DIR__.'/configs/phpmailer/SMTP.php';

$mail = new PHPMailer();

if(defined("site_smtp") && site_smtp == 1)
	$mail->isSMTP();

$mail->Host       = (defined("site_smtp_host") && site_smtp_host != '' ? site_smtp_host : '');
$mail->SMTPAuth   = (defined("site_smtp_port") && site_smtp_port == '1' ? true : false);
$mail->Username   = (defined("site_smtp_username") && site_smtp_username != '' ? site_smtp_username : '');
$mail->Password   = (defined("site_smtp_password") && site_smtp_password != '' ? site_smtp_password : '');
$mail->SMTPSecure = (defined("site_smtp_encryption") && site_smtp_encryption != 'none' ? site_smtp_encryption : false);
$mail->Port       = (defined("site_smtp_port") && site_smtp_port != '' ? site_smtp_port : '');

$mail->setFrom((defined("site_noreply") && site_noreply != '' ? site_noreply : ''), site_title);


# Facebook Login App
define("fbAppId",      login_fbAppId);
define("fbAppSecret",  login_fbAppSecret);
define("fbAppVersion", login_fbAppVersion);

$facebookLoginUrl = '#';
if(fbAppId != '' && fbAppSecret != '' && fbAppVersion != ''){
	require __DIR__.'/configs/src/Facebook/autoload.php';
	$fb = new Facebook\Facebook([
		'app_id'                => fbAppId,
		'app_secret'            => fbAppSecret,
		'default_graph_version' => fbAppVersion,
	]);
	$helper      = $fb->getRedirectLoginHelper();
	$permissions = ['email'];
	$facebookLoginUrl    = $helper->getLoginUrl(path."/login-facebook.php", $permissions);
}

# Twitter Login App
define('twConKey',        login_twConKey);
define('twConSecret',     login_twConSecret);
define('twOauthCallback', path."/login-twitter.php");

if(twConKey != '' && twConSecret != ''){
	require_once(__DIR__."/configs/src/Twitter/twitteroauth.php");
	$twitterLoginUrl = path."/login-twitter.php";
}

# Google Login App
define('ggClientId',      login_ggClientId);
define('ggClientSecret',  login_ggClientSecret);
define('ggOauthCallback', path."/login-google.php");
define('ggAppName',       site_title);

if(ggClientId != '' && ggClientSecret != ''){
	require_once(__DIR__."/configs/src/Google/Google_Client.php");
	require_once(__DIR__."/configs/src/Google/contrib/Google_Oauth2Service.php");

	$gClient = new Google_Client();
	$gClient->setApplicationName(ggAppName);
	$gClient->setClientId(ggClientId);
	$gClient->setClientSecret(ggClientSecret);
	$gClient->setRedirectUri(ggOauthCallback);

	$google_oauthV2 = new Google_Oauth2Service($gClient);
	$googleLoginUrl = $gClient->createAuthUrl();
}

# GET Defined vars
$request = (isset($_GET['request']) ? sc_sec($_GET['request']) : '');
$pg      = (isset($_GET['pg']) ? sc_sec($_GET['pg'])           : '');
$token   = (isset($_GET['token']) ? sc_sec($_GET['token'])     : '');
$t       = (isset($_GET['t']) ? sc_sec($_GET['t'])             : '');
$id      = (isset($_GET['id']) ? (int)($_GET['id'])            : '');
$c       = (isset($_GET['c']) ? (int)($_GET['c'])            : '');
$s       = (isset($_GET['s']) ? (int)($_GET['s'])              : '');
$mi      = (isset($_GET['mi']) ? (int)($_GET['mi'])            : '');
$ri      = (isset($_GET['ri']) ? (int)($_GET['ri'])            : '');
$r       = (isset($_GET['r']) ? (int)($_GET['r'])            : '');

$qid    = (isset($_GET['qid']) ? (int)($_GET['qid'])            : '');
$aid    = (isset($_GET['aid']) ? (int)($_GET['aid'])            : '');

# Pagination
$page = (int) (!isset($_GET["page"]) || !$_GET["page"] ? 1 : sc_sec($_GET["page"]));
$limit = 12;
$startpoint = ($page * $limit) - $limit;



# Currency
define("dollar_sign", site_currency_symbol);
define("dollar_name", site_currency_name);


# Paypal Payement Gateway configuration
define('PAYPAL_CLIENT_ID', (defined("site_paypal_client_id") && site_paypal_client_id != '' ? site_paypal_client_id : ''));
define('PAYPAL_CLIENT_SECRET', (defined("site_paypal_client_secret") && site_paypal_client_secret != '' ? site_paypal_client_secret : ''));
define('PAYPAL_ID', (defined("site_paypal_id") && site_paypal_id != '' ? site_paypal_id : ''));
define('PAYPAL_SANDBOX', (defined("site_paypal_live") && site_paypal_live == 1 ? false : true)); //TRUE (testing) or FALSE (live)

define('PAYPAL_RETURN_URL', path.'/payment-success.php');
define('PAYPAL_CANCEL_URL', path.'/index.php');
define('PAYPAL_NOTIFY_URL', path.'/ipn.php');
define('PAYPAL_CURRENCY', (defined("site_currency_name") && site_currency_name != '' ? site_currency_name : ''));

define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");


use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require 'vendor/autoload.php';

$paypalConfig = [
  'client_id'       => PAYPAL_CLIENT_ID,
  'client_secret'   => PAYPAL_CLIENT_SECRET,
  'return_url'      => path.'/response.php',
  'cancel_url'      => path.'/index.php',
	'sandbox'         => PAYPAL_SANDBOX
];

$apiContext = new ApiContext( new OAuthTokenCredential($paypalConfig['client_id'], $paypalConfig['client_secret']) );
$apiContext->setConfig([ 'mode' => $paypalConfig['sandbox'] ? 'sandbox' : 'live' ]);



use ipinfo\ipinfo\IPinfo;

if( !empty(ipinfo) ):
if( !isset($_COOKIE['ipall']) ){
$access_token = ipinfo;
$client       = new IPinfo($access_token);
$details      = $client->getDetails();
setcookie("ipall", json_encode($details->all), time()+3600*24*30);
}
endif;
$ipall = isset($_COOKIE['ipall']) ? json_decode(sc_cookie($_COOKIE['ipall']), true) : '';


define("get_ipp", ( isset($ipall['ip']) ? $ipall['ip'] : "") );
define("get_country_name", ( isset($ipall['country_name']) ? $ipall['country_name'] : "") );
define("get_country_code", ( isset($ipall['country']) ? $ipall['country'] : "") );
define("get_state",        ( isset($ipall['region']) ? $ipall['region'] : "") );
define("get_city_name",    ( isset($ipall['city']) ? $ipall['city'] : "") );

# Plans Options
define("quizzes",   us_plan ? db_get("plans", "quizzes", us_plan) : '');
define("takers",    us_plan ? db_get("plans", "takers", us_plan) : '');
define("questions", us_plan ? db_get("plans", "questions", us_plan) : '');

define("export_statistics", us_plan ? db_get("plans", "export_statistics", us_plan) : '');
define("backgound",         us_plan ? db_get("plans", "backgound", us_plan) : '');
define("statistics",        us_plan ? db_get("plans", "statistics", us_plan) : '');
define("integrations",      us_plan ? db_get("plans", "integrations", us_plan) : '');
define("show_ads",          us_plan ? db_get("plans", "show_ads", us_plan) : '');
define("support",           us_plan ? db_get("plans", "support", us_plan) : '');

$arrara = ["quizzes" => quizzes, "takers" => takers, "questions" => questions, "export_statistics" => export_statistics, "backgound" => backgound, "statistics" => statistics, "integrations" => integrations, "show_ads" => show_ads, "support" => support];
