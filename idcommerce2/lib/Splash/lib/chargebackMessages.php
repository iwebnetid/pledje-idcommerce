<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class chargebackMessages extends BaseResource {
  protected $resourceName = "chargebackMessages";
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
   * The identifier of the Chargeback resource that this chargebackMessage relates to.
   */
  public $chargeback;

  /**
   * @integer
   * The date of this chargebackMessage. 
   * The date is specified as an eight digit string in YYYYMMDD format, for example, '20160120' for January 20, 2016.
   */
  public $date;

  /**
   * @integer
   * The type of this chargebackMessage.  
   * Valid values are: 
   * '1': Assign. Request to assign the Chargeback to another party. 
   * '2': Notate. 
   * '3': Accept liability. The Merchant accepts liability for this Chargeback. 
   * '4': Represent. The Merchant wishes to dispute the Chargeback and request a representment. 
   * '5': Respond. The Merchant requests a response from the other party. 
   * '6': Request Arbitration. The Merchant wishes to enter arbitration to determine the outcome of the Chargeback
   */
  public $type;

  /**
   * @string
   */
  public $fromQueue;

  /**
   * @string
   */
  public $toQueue;

  /**
   * @string
   * The identifier of the Contact for this chargebackMessage.
   */
  public $contact;

  /**
   * @integer
   * The amount that this chargebackMessage corresponds to. 
   * For example, if the 'type' is set to '3' (Accept Liability), then this amount indicates that the liability should be for this amount. 
   * This field is specified as an integer in cents.
   */
  public $amount;

  /**
   * @string
   * The currency of the amount in this chargebackMessage. 
   * Currently, this field only accepts the value 'USD'.
   */
  public $currency;

  /**
   * @string
   * A free-text note relating to this chargebackMessage.
   */
  public $note;

  /**
   * @integer
   * The current status of the Chargeback. 
   * Valid values are: 
   * '1': Requested. The Chargeback has been requested from the processor. 
   * '2': Processing. The Chargeback is being processed by the card processor. 
   * '3': Failed. The Chargeback has failed because of a technical problem. 
   * '4': Denied. The issuer has denied the Chargeback. 
   * '5': Processed. The Chargeback has been accepted and processed.
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


  public function update($params = array()) {
      throw new \SplashPayments\Exceptions\InvalidRequest('Invalid Action');
  }

  public function delete($params = array()) {
      throw new \SplashPayments\Exceptions\InvalidRequest('Invalid Action');
  }

}

