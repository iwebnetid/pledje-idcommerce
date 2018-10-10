<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class entries extends BaseResource {
  protected $resourceName = "entries";
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
   * The identifier of the Entity that this Entry refers to.
   */
  public $entity;

  /**
   * @string
   * If the activity that this Entry refers to involves two parties in the system with one paying a charge of any kind, then this field stores the identifier of the Entity that the charge or other activity is for.
   */
  public $fromentity;

  /**
   * @string
   * The identifier of the Fund that this Entry refers to.
   */
  public $fund;

  /**
   * @string
   * If the activity that this Entry refers to is the charging of a Fee, then this field stores the identifier of the corresponding Fee resource.
   */
  public $fee;

  /**
   * @string
   * If the activity that this Entry refers to is the charging of a Disbursement, then this field stores the identifier of the corresponding Disbursement resource.
   */
  public $disbursement;

  /**
   * @string
   * If the activity that this Entry refers to is the paying of a Refund, then this field stores the identifier of the corresponding Refund resource.
   */
  public $refund;

  /**
   * @string
   * If the activity that this Entry refers to is a Transaction, then this field stores the identifier of the corresponding Transaction resource.
   */
  public $txn;

  /**
   * @string
   * If the activity that this Entry refers to is a Chargeback, then this field stores the identifier of the corresponding Chargeback resource.
   */
  public $chargeback;

  /**
   * @string
   */
  public $adjustment;

  /**
   * @integer
   * The type of event that triggered this Entry resource. 
   * Valid values are: 
   * '1': Daily - the Entry triggers every day. 
   * '2': Weekly - the Entry triggers every week. 
   * '3': Monthly - the Entry triggers every month. 
   * '4': Annually - the Entry triggers every year. 
   * '5': Single - the Entry is a one-off event. 
   * '6': Auth - the Entry triggers at the time of authorization of a transaction. 
   * '7': Capture - the Entry triggers at the capture time of a Transaction. 
   * '8': Refund - the Entry triggers when a refund transaction is processed. 
   * '9': Board - the Entry triggers when the Merchant is boarded. 
   * '10': Payout - the Entry triggers when a payout is processed. 
   * '11': Chargeback - the Entry triggers when a card chargeback occurs. 
   * '12': Overdraft - the Entry triggers when an overdraft usage charge from a bank is levied. 
   * '13': Interchange - the Entry triggers when interchange Fees are assessed for the Transactions of this Merchant. 
   * '14': Processor - the Entry triggers when the Transactions of this Merchant are processed by a payment processor. 
   * '15': ACH failure - the Entry triggers when an automated clearing house failure occurs. 
   * '16': Account - the Entry triggers when a bank account is verified.
   */
  public $event;

  /**
   * @string
   * The identifier of the record that is associated with this Entry.
   */
  public $eventId;

  /**
   * @string
   * A description of this Entry.
   */
  public $description;

  /**
   * @integer
   * The amount involved in this Entry. It refers to the amount charged, transferred, or disbursed. 
   * This field is specified as an integer in cents.
   */
  public $amount;

  /**
   * @integer
   */
  public $unsourced;

  /**
   * @integer
   */
  public $pending;


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

