<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class txnVerifications extends BaseResource {
  protected $resourceName = "txnVerifications";
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
   * The Login that owns this resource.
   */
  public $login;

  /**
   * @string
   * The identifier of Transaction associated with this check.
   */
  public $txn;

  /**
   * @string
   */
  public $txnCheck;

  /**
   * @integer
   * The type of check to perform. 
   * This field is specified as an integer. 
   * Valid values are: n'1': Exceeded the maximum number of allowed failed authorizations. 
   * '2': Exceeded the maximum allowed sale total value. 
   * '3': Exceeded the maximum allowed refund total value. 
   * '4': Exceeded the allowed maximum payment size (individual transaction amount). 
   * '5': Exceeded the maximum allowed ratio of refunds to sales. 
   * '6': Exceeded the maximum allowed number of successful authorizations. 
   * '7': Exceeded the maximum allowed number of failed authorizations for a particular IP address. 
   * '8': Exceeded the maximum allowed ratio of failed authorizations for a particular IP address. 
   * '9': The Merchant is not active. 
   * '10': Exceeded the maximum allowed number of failed transactions. 
   * '11': Exceeded the maximum allowed number of transactions without authorizations. 
   * '12': Refund transaction does not have an associated sale transaction. 
   * '13': Exceeded the maximum number of refund transactions that do not have associated sale Transactions. 
   * '14': Exceeded the maximum authorized value for Transactions with failed authorizations.
   */
  public $type;

  /**
   * @integer
   * The score for this Transaction against the specific type of check. 
   * This field is specified as an integer between 0 and 65535.
   */
  public $score;


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

