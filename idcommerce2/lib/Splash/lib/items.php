<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class items extends BaseResource {
  protected $resourceName = "items";
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
   */
  public $txn;

  /**
   * @string
   */
  public $item;

  /**
   * @string
   * A description of this Item.  
   * This field is stored as a text string and must be between 0 and 100 characters long.
   */
  public $description;

  /**
   * @string
   * A custom identifier for this line Item, such as a stock number or order code.
   */
  public $custom;

  /**
   * @integer
   * The quantity of this Item included in the Transaction. 
   * This field is specified as an integer.
   */
  public $quantity;

  /**
   * @integer
   * The amount charged for this Item. 
   * This field is specified as an integer in cents.
   */
  public $price;

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

