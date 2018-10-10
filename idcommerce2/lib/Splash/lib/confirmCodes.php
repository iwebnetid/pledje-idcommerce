<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class confirmCodes extends BaseResource {
  protected $resourceName = "confirmCodes";
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
   * The identifier of the Login resource that this confirmation code relates to.
   */
  public $login;

  /**
   * @integer
   * The type of this confirmCode. 
   * Valid values are: 
   * '1': A confirmation code related to a 'forgotten password' request. 
   * '2': A confirmation code related to an email address verification request
   */
  public $type;

  /**
   * @string
   * If the 'type' of this confirmation code is '2' (email), then this field represents the email address that requires verification.
   */
  public $email;

  /**
   * @integer
   * Whether this resource is marked as inactive. A value of '1' means inactive and a value of '0' means active.
   */
  public $inactive;

  /**
   * @integer
   * Whether this resource is marked as frozen. A value of '1' means frozen and a value of '0' means not frozen.
   */
  public $frozen;


  public function update($params = array()) {
      throw new \SplashPayments\Exceptions\InvalidRequest('Invalid Action');
  }

}

