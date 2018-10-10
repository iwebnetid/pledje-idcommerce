<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class txnHolds extends BaseResource {
  protected $resourceName = "txnHolds";
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
   * The identifier of the Login that owns this txnHolds resource.
   */
  public $login;

  /**
   * @string
   * The identifier of the Txn that is being held with this txnHold.
   */
  public $txn;

  /**
   * @string
   * If this txnHold resource was triggered through a txnVerification, then this field stores the identifier of the TxnVerification.
   */
  public $txnVerification;

  /**
   * @integer
   * The action taken on the referenced Txn. 
   * This field is specified as an integer. 
   * Valid values are: 
   * '1': Block. Block the Transaction from proceeding. This returns an error. 
   * '2': Reserved for future use. 
   * '3': Hold. Hold the Transaction. It will not be captured until it is manually released. 
   * '4': Reserve. Reserve the Transaction. The funds for the transaction will not be released until the Transaction is manually reviewed.
   */
  public $action;

  /**
   * @string
   * If this txnHold was released, this will contain the timestamp for when it was released.
   */
  public $released;

  /**
   * @string
   * If this txnHold was reviewed, this will contain the timestamp for when it was reviewed.
   */
  public $reviewed;

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


  public function update($params = array()) {
      throw new \SplashPayments\Exceptions\InvalidRequest('Invalid Action');
  }

  public function delete($params = array()) {
      throw new \SplashPayments\Exceptions\InvalidRequest('Invalid Action');
  }

}

