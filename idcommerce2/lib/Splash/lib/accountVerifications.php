<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class accountVerifications extends BaseResource {
  protected $resourceName = "accountVerifications";
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
   * The identifier of the Account that you want to verify.
   */
  public $account;

  /**
   * @integer
   * The type of account verification you want to perform. 
   * Valid values are: 
   * '1': Debit amount verification 
   * '2': Credential verification.
   */
  public $type;


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

