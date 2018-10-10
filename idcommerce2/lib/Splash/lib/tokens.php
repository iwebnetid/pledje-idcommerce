<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class tokens extends BaseResource {
  protected $resourceName = "tokens";
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
   * The Customer that this Token is associated with.
   */
  public $customer;

  /**
   * @string
   * The payment method that is associated with this Token.
   */
  public $payment;

  /**
   * @string
   * The auto-generated token identifier.
   */
  public $token;

  /**
   * @string
   * The expiry month for the payment method associated with this Token.
   *  This field is stored as a text string in 'MMYY' format, where 'MM' is the number of a month and 'YY' is the last two digits of a year. For example, '0623' for June 2023. 
   * The value must reflect a future date.
   */
  public $expiration;

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


}

