<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class payoutFlows extends BaseResource {
  protected $resourceName = "payoutFlows";
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
   * The Login that will own the Payout resource. When set to null, the Payout resource will be owned by the triggerring Entity.
   */
  public $payoutLogin;

  /**
   * @string
   * The identifier of the Org that this payoutFlows resource applies to. 
   * If you set this field, then the payoutFlow applies to all Entities in the Org.
   */
  public $org;

  /**
   * @string
   * The identifier of the Entity that this payoutFlow applies to.
   */
  public $entity;

  /**
   * @integer
   * The event on the Org or Entity that should trigger the creation of an associated Payout resource. 
   * Valid values are: 
   * '1': Trigger the creation of the Payout when the primary bank account is associated. 
   * '2': Trigger the creation of the Payout when the Merchant is boarded.
   */
  public $trigger;

  /**
   * @integer
   * The schedule that determines when the Payout resource that is created should be triggered to be paid. 
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
   * This affects the Payout resource that is created by this payoutFlow. 
   * This field is specified as an integer and its value determines how the interval is multiplied. 
   * For example, if 'schedule' is set to '1' (meaning 'daily'), then a 'scheduleFactor' value of '2' would cause the Payout to trigger every two days.
   */
  public $scheduleFactor;

  /**
   * @integer
   * The unit of measure for the Payout resource that is created. 
   * Valid values are: 
   * '1': Percentage - the Payout is a percentage of the current available funds for this Entity that should be paid to their Account, specified in the 'amount' field in basis points.
   * '2': Actual - the Payout is a fixed amount, specified in the 'amount' field as an integer in cents. 
   * '3': Negative percentage - the Payout is a percentage of the balance, specified in the 'amount' field as a negative integer in basis points. The direction of the Payout payment is reversed. For example, if the Entity has a negative balance of $10 and the amount is set to 10000 (100%), then $10 will be drawn from their account to fully replenish the balance to $0.
   */
  public $um;

  /**
   * @integer
   */
  public $amount;

  /**
   * @integer
   */
  public $minimum;

  /**
   * @integer
   * Whether the Payout resource will be marked as inactive. A value of '1' means inactive and a value of '0' means active.
   */
  public $payoutInactive;

  /**
   * @integer
   * Whether the Payout resource will be marked to skip the creation of disbursements on holidays and weekends. A value of '1' means skip and a value of '0' means do not skip.
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

