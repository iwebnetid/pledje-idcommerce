<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class alerts extends BaseResource {
  protected $resourceName = "alerts";
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
   * The identifier of the Login that this Alert relates to. 
   * The Alert is triggered based on the activity of this Login.
   */
  public $forlogin;

  /**
   * @string
   * The identifier of the Org that this Alert relates to. 
   * The Alert is triggered based on the activity of this Org.
   */
  public $fororg;

  /**
   * @string
   * The name of this Alert. 
   * This field is stored as a text string and must be between 1 and 100 characters long.
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

