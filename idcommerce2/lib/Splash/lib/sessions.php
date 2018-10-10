<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class sessions extends BaseResource {
  protected $resourceName = "sessions";
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
   */
  public $key;

  /**
   * @integer
   * Whether this Session should have access to only public resources. 
   * A value of '1' means that the Session can only access public resources and a value of '0' means that the Session can also access private resources. 
   * Public resources include Transactions, Tokens, Customers and Items. All other resources are private.
   */
  public $public;

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

