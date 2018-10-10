<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class txnResults extends BaseResource {
  protected $resourceName = "txnResults";
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
   * The identifier of the Transaction associated with this txnResults resource.
   */
  public $txn;

  /**
   * @integer
   * The type of this txnResult. 
   * This field is specified as an integer. 
   * Valid values are: 
   * '1': A general type of result. 
   * '2': Fraud prevention alert 
   * '3': Processor error.
   */
  public $type;

  /**
   * @string
   * A message that accompanies and describes this Transaction result.
   */
  public $message;

  /**
   * @integer
   * The result code that is associated with this txnResult. 
   * This field is specified as an integer. 
   * Valid values are: 
   * '0': Transaction approved. 
   * '1': Partially approved. The processor has only approved a portion of the total transaction amount. 
   * '2': Declined. The processor has declined the Transaction. 
   * '3': The supplied CVV code matches. 
   * '4': The supplied CVV code does not match. 
   * '5': The ZIP code in the Transaction data does not match the customer details held by the card issuer. 
   * '6': The address in the Transaction data does not match the customer details held by the card issuer. 
   * '7': The name in the Transaction data does not match the customer details held by the card issuer. 
   * '8': The name and phone number in the Transaction data do not match the details held by the card issuer. 
   * '9': The name and email address in the Transaction data do not match the customer details held by the card issuer. 
   * '10': The phone number in the Transaction data does not match the customer details held by the card issuer. 
   * '11': The phone number and email address in the Transaction data do not match the customer details held by the card issuer. 
   * '12': The email address in the Transaction data does not match the customer details held by the card issuer. 
   * '13': The customer name could not be found in the Transaction data. 
   * '14': The customer name and phone number were not found in the Transaction data. 
   * '15': The customer name and email address were not found in the Transaction data. 
   * '16': The customer phone number was not found in the Transaction data. 
   * '17': The customer phone number and email address were not found in the Transaction data. 
   * '18': The customer email address was not found in the Transaction data. 
   * '19': Information about the customer was not found in the Transaction data. 
   * '20': Non-sufficient funds. The customer did not have sufficient credit or balance to cover the Transaction. 
   * '21': The account in the Transaction data is not valid.
   */
  public $code;


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

