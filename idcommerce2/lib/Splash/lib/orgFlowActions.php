<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class orgFlowActions extends BaseResource {
  protected $resourceName = "orgFlowActions";
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
   * The identifier of the orgFlow resource that this orgFlowActions resource is associated with.
   */
  public $orgFlow;

  /**
   * @string
   */
  public $org;

  /**
   * @integer
   * The action to take in relation to the Entity being processed.  
   * Valid values are: 
   * '1': Add the referenced Entity to the referenced Org. 
   * '2': Remove the referenced Entity from the referenced Org.
   */
  public $action;


}

