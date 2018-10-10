<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class alertTriggers extends BaseResource {
  protected $resourceName = "alertTriggers";
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
   * The identifier of the Alert resource that you want to invoke with this trigger.
   */
  public $alert;

  /**
   * @string
   * The event type that triggers the associated Alert. 
   * Valid values are: 
   * 'create': Triggers when the associated  resource is created. 
   * 'update': Triggers when the associated resource is updated. 
   * 'delete': Triggers when the associated  resource is created. 
   * 'ownership': Triggers when the ownership of the associated resource changes. 
   * 'board': Triggers when a Merchant is boarded. 
   * 'txnhold': Triggers when a transaction is held for review. 
   * 'batch': Triggers when Transactions are captured in a batch. 
   * 'account': Triggers when the Account associated with a Merchant is updated. 
   * 'payout': Triggers when a Payout occurs. 
   * 'fee': Triggers when an Entity is charged a Fee. 
   */
  public $event;

  /**
   * @integer
   */
  public $resource;

  /**
   * @string
   * The name of this alertTrigger. 
   * This field is stored as a text string and must be between 0 and 100 characters long.
   */
  public $name;

  /**
   * @string
   */
  public $description;

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

