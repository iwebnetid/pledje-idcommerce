<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class subscriptionTokens extends BaseResource {
  protected $resourceName = "subscriptionTokens";
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
   * The identifier of the Subscription resource that this Subscription Token is associated with. 
   * This is the Subscription that the Token identified in the 'token' field of this resource is responsible for paying for.
   */
  public $subscription;

  /**
   * @string
   * The identifier of the Token resource that this Subscription Token is associated with. 
   * This resource identifies the means of payment for the Subscription identified in the 'subscription' field of this resource.
   */
  public $token;

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

