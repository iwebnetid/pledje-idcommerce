<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class disbursements extends BaseResource {
  protected $resourceName = "disbursements";
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
  public $entity;

  /**
   * @string
   */
  public $account;

  /**
   * @string
   */
  public $payout;

  /**
   * @string
   */
  public $funding;

  /**
   * @string
   */
  public $description;

  /**
   * @integer
   */
  public $amount;

  /**
   * @integer
   */
  public $status;

  /**
   * @string
   */
  public $processed;

  /**
   * @string
   */
  public $currency;

  /**
   * @string
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

