<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class messageThreads extends BaseResource {
  protected $resourceName = "messageThreads";
  /**
   * @string
   * The ID of this resource.
   */
  public $id;

  /**
   * @string
   * The date and time at which this resource was created.
   */
  public $created;

  /**
   * @string
   * The date and time at which this resource was modified.
   */
  public $modified;

  /**
   * @string
   * The identifier of the Login that created this resource.
   */
  public $creator;

  /**
   * @string
   * The identifier of the Login that last modified this resource.
   */
  public $modifier;

  /**
   * @string
   * The identifier of the Login that owns this messageThreads resource.
   */
  public $login;

  /**
   * @string
   * The identifier of the receiving Login of this messageThreads resource.
   */
  public $forlogin;

  /**
   * @string
   */
  public $opposingMessageThread;

  /**
   * @string
   * Free-form text. By default, a messageThread resource is set as 'default'.
   */
  public $folder;

  /**
   * @string
   * Free-form text that represents the name of the sender of a messageThread resource.
   */
  public $sender;

  /**
   * @string
   * Free-form text that represents the name of the recipient of a messageThread resource.
   */
  public $recipient;

  /**
   * @string
   * Free-form text for adding a subject to a messageThread resource.
   */
  public $subject;


  public function delete($params = array()) {
      throw new \SplashPayments\Exceptions\InvalidRequest('Invalid Action');
  }

  public function create($params = array()) {
      throw new \SplashPayments\Exceptions\InvalidRequest('Invalid Action');
  }

}

