<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class orgs extends BaseResource {
  protected $resourceName = "orgs";
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
   * The Login that owns this Org.
   */
  public $login;

  /**
   * @string
   * The name of this Org. 
   * This field is stored as a text string and must be between 0 and 100 characters long.
   */
  public $name;

  /**
   * @string
   * A description of this Org.  
   * This field is stored as a text string and must be between 0 and 100 characters long.
   */
  public $description;


}

