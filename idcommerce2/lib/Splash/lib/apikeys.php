<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class apikeys extends BaseResource {
  protected $resourceName = "apikeys";
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
   * The login under which to perform this action. If you do not supply a login in this field, then the API defaults to the login that is currently authenticated.
   */
  public $login;

  /**
   * @string
   */
  public $key;

  /**
   * @string
   */
  public $name;

  /**
   * @string
   */
  public $description;

  /**
   * @integer
   * Whether this API key should have access to only public resources. 
   * A value of '1' means that the key can only access public resources and a value of '0' means that the key can also access private resources. 
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


}

