<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class orgUsers extends BaseResource {
  protected $resourceName = "orgUsers";
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
   * The identifier of the Login resource that should be marked as part of the Org identified in the 'org' field.
   */
  public $forlogin;

  /**
   * @string
   * The identifier of the Org resource that the Login identified in the 'forlogin' field should be marked as part of.
   */
  public $org;


}

