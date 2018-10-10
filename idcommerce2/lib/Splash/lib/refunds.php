<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class refunds extends BaseResource {
  protected $resourceName = "refunds";
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
   * The identifier of the Entries resource that is being refunded.
   */
  public $entry;

  /**
   * @string
   * A description of this Refund.  
   * This field is stored as a text string and must be between 0 and 100 characters long.
   */
  public $description;

  /**
   * @integer
   * The amount of this Refund. 
   * This field is specified as an integer in cents. 
   * This field is optional. If it is not set, then the API uses the amount that is specified in the related Entry resource.
   */
  public $amount;


  public function update($params = array()) {
      throw new \SplashPayments\Exceptions\InvalidRequest('Invalid Action');
  }

  public function delete($params = array()) {
      throw new \SplashPayments\Exceptions\InvalidRequest('Invalid Action');
  }

}

