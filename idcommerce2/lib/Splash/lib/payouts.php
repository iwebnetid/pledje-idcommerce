<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class payouts extends BaseResource {
  protected $resourceName = "payouts";
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
   * The identifier of the Account that this Payout is associated with. 
   * This account will either receive the funds or be debited for the funds every time a Disbursement occurs, depending on the direction of the Disbursement.
   */
  public $account;

  /**
   * @string
   * The identifier of the Entity that this Payout is associated with.
   */
  public $entity;

  /**
   * @string
   * The identifier of the PayoutFlow associated with this Payout.
   */
  public $payoutFlow;

  /**
   * @string
   * The name of this Payout. 
   * This field is stored as a text string and must be between 0 and 100 characters long.
   */
  public $name;

  /**
   * @string
   * A description of this Payout.  
   * This field is stored as a text string and must be between 0 and 100 characters long.
   */
  public $description;

  /**
   * @integer
   * The schedule that determines when this Payout is triggered to be paid. 
   * Valid values are: 
   * '1': Daily - the Payout is paid every day. 
   * '2': Weekly - the Payout is paid every week. 
   * '3': Monthly - the Payout is paid every month. 
   * '4': Annually - the Payout is paid every year. 
   * '5': Single - the Payout is a one-off payment.
   */
  public $schedule;

  /**
   * @integer
   * A multiplier that you can use to adjust the schedule set in the 'schedule' field, if it is set to a duration-based trigger, such as daily, weekly, monthly, or annually. 
   * This field is specified as an integer and its value determines how the interval is multiplied. 
   * For example, if 'schedule' is set to '1' (meaning 'daily'), then a 'scheduleFactor' value of '2' would cause the Payout to trigger every two days.
   */
  public $scheduleFactor;

  /**
   * @integer
   * The date on which payment of the Payout should start. 
   * The date is specified as an eight digit string in YYYYMMDD format, for example, '20160120' for January 20, 2016. 
   * The value of this field must represent a date in the future, or the present date.
   */
  public $start;

  /**
   * @string
   * The currency of the amount in this Payout. 
   * This field is only required when Um is set to ACTUAL.
   * If this field is not set we will process disbursements for all currencies. 
   * Currently, this field only accepts the value 'USD'.
   */
  public $currency;

  /**
   * @integer
   * The unit of measure for this Payout. 
   * Valid values are: 
   * '1': Percentage - the Payout is a percentage of the current available funds for this Entity that should be paid to their Account, specified in the 'amount' field in basis points.
   * '2': Actual - the Payout is a fixed amount, specified in the 'amount' field as an integer in cents. 
   * '3': Negative percentage - the Payout is a percentage of the balance, specified in the 'amount' field as a negative integer in basis points. The direction of the Payout payment is reversed. For example, if the Entity has a negative balance of $10 and the amount is set to 10000 (100%), then $10 will be drawn from their account to fully replenish the balance to $0.
   */
  public $um;

  /**
   * @integer
   * The total amount of the Payout resource that is created. 
   * This field is specified as an integer. 
   * The units used in this field are determined by the value of the 'um' field on the Payout. If the 'um' field is set to '1' or '3', then this field specifies the Payout percentage to levy in basis points. If the 'um' field is set to '2', then this field specifies the Payout in cents.
   */
  public $amount;

  /**
   * @integer
   */
  public $minimum;

  /**
   * @integer
   * An optional field indicating the minimum balance you want to maintain, despite any Payouts occurring. If the Payout would reduce the balance to below this value, then it is not processed. 
   * This field is specified as an integer in cents. 
   * For example, a float value of 1000 would ensure that a balance of 10 USD is maintained at all times.
   */
  public $float;

  /**
   * @integer
   * Whether to skip the creation of disbursements on holidays and weekends. A value of '1' means skip and a value of '0' means do not skip.
   */
  public $skipOffDays;

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


}

