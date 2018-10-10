<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class orgEntities extends BaseResource {
  protected $resourceName = "orgEntities";
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
   * The identifier of the Org that this orgEntity is associated with.
   */
  public $org;

  /**
   * @string
   * The identifier of the Entity that this orgEntity is associated with.
   */
  public $entity;


}

