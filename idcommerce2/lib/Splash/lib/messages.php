<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class messages extends BaseResource {
  protected $resourceName = "messages";
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
   * The identifier of the messageThreads that owns this Messages resource.
   */
  public $messageThread;

  /**
   * @string
   */
  public $opposingMessage;

  /**
   * @integer
   * Whether this resource is incoming or outgoing. By default, an outgoing message is assigned a '2' and incoming messages is assigned a '1'.
   */
  public $type;

  /**
   * @integer
   * Whether this resource is marked as secure. A value of '1' means messages will protected in email notifications and a value of '0' means the message will display entirely.
   */
  public $secure;

  /**
   * @integer
   * Whether this resource is marked as read. A value of '1' means the message has been read and a value of '0' means the message has not been read yet
   */
  public $read;

  /**
   * @string
   * Free-form text for adding a message to a messageThread resource.
   */
  public $message;


  public function delete($params = array()) {
      throw new \SplashPayments\Exceptions\InvalidRequest('Invalid Action');
  }

}

