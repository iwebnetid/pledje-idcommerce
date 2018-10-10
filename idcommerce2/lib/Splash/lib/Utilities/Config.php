<?php 
namespace SplashPayments\Utilities;

class Config {
  // The base url for requests
  private static $url = 'https://test-api.splashpayments.com';

  // Whether to trhow exceptions or not
  private static $exceptions = true;

  // apiKey to make the requests
  private static $apiKey;

  // sessionKey to make the requests
  private static $sessionKey;

  // Retrieve the current apiKey
  public static function getApiKey() {
    return self::$apiKey;
  }

  // Set the apiKey
  public static function setApiKey($newApiKey) {
    self::$apiKey = $newApiKey;
  }

  // Retrieve the current sessionKey
  public static function getSessionKey() {
    return self::$sessionKey;
  }

  // Set the sessionKey
  public static function setSessionKey($newSessionKey) {
    self::$sessionKey = $newSessionKey;
  }

  // Set the global $exceptions property
  public static function throwExceptions($exceptions) {
    self::$exceptions = is_bool($exceptions) && $exceptions;
  }

  // Get the global $exceptions property
  public static function exceptionsEnabled() {
    return self::$exceptions;
  }

  // Get the global url
  public static function getUrl() {
    return self::$url;
  }

  /**
   * Prepend or remove 'test-' prefix on url for requests
   * depending on bool $test parameter
   */
  public static function setTestMode($test) {
    $host = parse_url(self::$url, PHP_URL_HOST);
    if ($test) {
      // Check if $host doesn't start with 'test-'
      if (!(strpos($host, 'test-') === 0)) {
        // Add 'test-' prefix
        self::$url = 'https://test-' . $host;
      }
    }
    else {
      // Check if $host starts with 'test-'
      if (strpos($host, 'test-') === 0) {
        // Remove 'test-' prefix
        self::$url = 'https://' . substr($host, 5);
      }
    }
  }
}
