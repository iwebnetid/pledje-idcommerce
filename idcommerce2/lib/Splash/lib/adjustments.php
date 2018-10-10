<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class adjustments extends BaseResource {
  protected $resourceName = "adjustments";
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
   * The Login that owns this Adjustment.
   */
  public $login;

  /**
   * @string
   * The Entity that will receive the set amount.
   */
  public $entity;

  /**
   * @string
   * The Entity that will pay for the adjustment. 
   * This is an optional field and should only be used when the amount is being transfered from the fromentity to the entity.
   */
  public $fromentity;

  /**
   * @string
   * A description of the Adjustment.
   */
  public $description;

  /**
   * @integer
   * The amount of the Adjustment.
   */
  public $amount;

  /**
   * @string
   * The currency of the amount. 
   * Currently, this field only accepts the value 'USD'.
   */
  public $currency;

  /**
   * @string
   * The platform used for the adjustment. 
   * This field is required if the adjustment is not between entities.
   */
  public $platform;


  public function update($params = array()) {
      throw new \SplashPayments\Exceptions\InvalidRequest('Invalid Action');
  }

  public function delete($params = array()) {
      throw new \SplashPayments\Exceptions\InvalidRequest('Invalid Action');
  }

  public function create($params = array()) {
      throw new \SplashPayments\Exceptions\InvalidRequest('Invalid Action');
  }

}

