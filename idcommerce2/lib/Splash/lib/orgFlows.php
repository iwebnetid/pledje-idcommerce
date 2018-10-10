<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class orgFlows extends BaseResource {
  protected $resourceName = "orgFlows";
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
   * The Login that owns this resource.
   */
  public $login;

  /**
   * @string
   * The identifier of the Login resource for which this orgFlows resource is triggered.
   */
  public $forlogin;

  /**
   * @integer
   * Whether this resource should affect logins recursively - in other words, affect this Login and all its child Logins. 
   * Valid values are: 
   * '0': Not recursive. The orgFlow only affects the Login identified in the 'forLogin' field. 
   * '1': Recursive. The orgFlow affects the Login identified in the 'forLogin' field and all its child Logins.
   */
  public $recursive;

  /**
   * @integer
   * This field sets the trigger that determines when this orgFlow runs.  
   * Valid values are: 
   * '1': Trigger at Merchant creation time. 
   * '2': Trigger when a Merchant check returns a low score. 
   * '3': Trigger when a Merchant check returns a high score. 
   * '4': Trigger at Merchant boarding time.
   */
  public $trigger;


}

