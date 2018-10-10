<?php 
namespace SplashPayments\Http;

use \SplashPayments\Exceptions\InvalidResponse;
use \SplashPayments\Exceptions\Base;
use \SplashPayments\Exceptions\InvalidRequest;
use \SplashPayments\Exceptions\Connection;

class Request {
  private static $instance;

  public static function getInstance() {
    if (isset(self::$instance)) {
      return self::$instance;
    }
    return self::$instance = new self();
  }

  public function sendHttp($method,
                           $url,
                           $request = '',
                           $headers = array(),
                           $connectTimeout = 50,
                           $options = array()) {
    $ret = array(false, 0);
    $options = array(
       CURLOPT_RETURNTRANSFER => true,
       CURLOPT_HEADER         => false,
       CURLOPT_FOLLOWLOCATION => true,
       CURLOPT_AUTOREFERER    => true,
       CURLOPT_CONNECTTIMEOUT => $connectTimeout,
       CURLOPT_TIMEOUT        => $connectTimeout,
       CURLOPT_MAXREDIRS      => 10,
       CURLOPT_SSL_VERIFYPEER => false,
       CURLOPT_SSL_VERIFYHOST => false,
       CURLOPT_HTTPHEADER     => $headers
    );
    // Init curl session
    $ch = curl_init($url);
    // Setup the request method and (optional) data
    switch ($method) {
      case 'PUT':
        $options[CURLOPT_POSTFIELDS] = json_encode($request);
        $options[CURLOPT_CUSTOMREQUEST] = 'PUT';
      break;
      case 'POST':
        $options[CURLOPT_POSTFIELDS] = json_encode($request);
        $options[CURLOPT_CUSTOMREQUEST] = 'POST';
      break;
      case 'DELETE':
        $options[CURLOPT_CUSTOMREQUEST] = 'DELETE';
    }

    // Set Options
    curl_setopt_array($ch, $options);

    // Get response
    $body = curl_exec($ch);
	//$log='===Request====\n\r';
	//$log.=print_R($request,1);
	//$log.='===Request ENDS HERE====\n\r';
	$log='===RESPONSE====\n\r';
	$log.=print_R($body,1);
	$log.='===RESPONSE ends here====\n\r';
$myfile = file_put_contents('/home/fundadmin/public_html/logs/'.date('y-m-d').'.txt', $log.PHP_EOL , FILE_APPEND | LOCK_EX);
	
	error_log($body);
    $message = curl_error($ch);
    if ($body === false) {
      // Close curl session
      curl_close($ch);
      self::connectionError($message);
    }
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // Close curl session
    curl_close($ch);
    $ret = self::validateResponse($body, $code, $message);
    return array($ret, $code);
  }

  public static function validateResponse($json, $code, $message) {
    if ($code < 200 || $code > 299) {
      self::handleStatusCodeError($message, $code);
    }
    $body = json_decode($json, true);
    if (json_last_error() !== JSON_ERROR_NONE && Config::exceptionsEnabled()) {
      throw new \SplashPayments\Exceptions\InvalidResponse("Invalid Response Object");
    }
    return $body;
  }

  public static function connectionError($message) {
    throw new \SplashPayments\Exceptions\Connection($message);
  }

  public static function handleStatusCodeError($message, $code) {
    if ($code === 400 || $code === 404) {
      throw new \SplashPayments\Exceptions\InvalidRequest("Invalid Request, Status Code {$code}");
    }
    throw new \SplashPayments\Exceptions\Base($message);
  }
}
