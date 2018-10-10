<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class subscriptions extends BaseResource {
  protected $resourceName = "subscriptions";
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
   * The identifier of the Plan that this Subscription is associated with. 
   * The Plan determines the frequency and amount of each payment.
   */
  public $plan;

  /**
   * @integer
   * The date on which the Subscription should start. 
   * The date is specified as an eight digit string in YYYYMMDD format, for example, '20160120' for January 20, 2016. 
   * The value of this field must represent a date in the future.
   */
  public $start;

  /**
   * @integer
   * The date on which the Subscription should finish. 
   * The date is specified as an eight digit string in YYYYMMDD format, for example, '20160120' for January 20, 2016. 
   * The value of this field must represent a date in the future.
   */
  public $finish;

  /**
   * @integer
   * The amount of the total sum of this Subscription that is made up of tax. 
   * This field is specified as an integer in cents.
   */
  public $tax;

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

