<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class plans extends BaseResource {
  protected $resourceName = "plans";
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
   * The identifier of the Merchant associated with this Plan.
   */
  public $merchant;

  /**
   * @string
   * The name of this Plan. 
   * This field is stored as a text string and must be between 0 and 100 characters long.
   */
  public $name;

  /**
   * @string
   * A description of this Plan.  
   * This field is stored as a text string and must be between 0 and 100 characters long.
   */
  public $description;

  /**
   * @integer
   */
  public $schedule;

  /**
   * @integer
   */
  public $scheduleFactor;

  /**
   * @integer
   * The amount to charge with each payment under this Plan. 
   * This field is specified as an integer in cents.
   */
  public $amount;

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

