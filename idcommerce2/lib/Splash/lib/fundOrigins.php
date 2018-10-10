<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class fundOrigins extends BaseResource {
  protected $resourceName = "fundOrigins";
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
   */
  public $fund;

  /**
   * @string
   */
  public $txn;

  /**
   * @string
   */
  public $disbursement;

  /**
   * @string
   */
  public $adjustment;

  /**
   * @integer
   */
  public $amount;


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

