<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class chargebacks extends BaseResource {
  protected $resourceName = "chargebacks";
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
  public $merchant;

  /**
   * @string
   */
  public $txn;

  /**
   * @string
   */
  public $mid;

  /**
   * @string
   */
  public $description;

  /**
   * @integer
   */
  public $total;

  /**
   * @integer
   */
  public $representedTotal;

  /**
   * @integer
   */
  public $cycle;

  /**
   * @string
   */
  public $currency;

  /**
   * @string
   */
  public $ref;

  /**
   * @string
   */
  public $reason;

  /**
   * @string
   */
  public $reasonCode;

  /**
   * @integer
   */
  public $issued;

  /**
   * @integer
   */
  public $received;

  /**
   * @integer
   */
  public $reply;

  /**
   * @string
   */
  public $bankRef;

  /**
   * @string
   */
  public $chargebackRef;

  /**
   * @integer
   */
  public $status;

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


  public function delete($params = array()) {
      throw new \SplashPayments\Exceptions\InvalidRequest('Invalid Action');
  }

  public function create($params = array()) {
      throw new \SplashPayments\Exceptions\InvalidRequest('Invalid Action');
  }

}

