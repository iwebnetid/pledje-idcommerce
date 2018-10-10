<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class merchantChecks extends BaseResource {
  protected $resourceName = "merchantChecks";
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
   * The identifier of the Login that owns this merchantChecks resource.
   */
  public $login;

  /**
   * @string
   * If this merchantChecks resource relates to an Org, then this field stores the identifier of the Org.
   */
  public $org;

  /**
   * @string
   * If this merchantChecks resource relates to an Entity, then this field stores the identifier of the Entity.
   */
  public $entity;

  /**
   * @integer
   * The type of check to perform on the Merchant.  
   * This field is specified as an integer. 
   * Valid values are: 
   * '1': OFAC. Check the Merchant against the Specially Designated Nationals (SDN) list operated by the Office of Foreign Assets Control at the U.S. Department of the Treasury. 
   * '2': Check that the data held on the Entity that is associated with this Merchant matches the data retrieved from external data sources. 
   * '3': Check that the data held on the Owner (primary Member) that is associated with this Merchant matches the data retrieved from external data sources. 
   * '4': Check that the Member and Entity associated with this account are have a genuine association, as determined by consulting external data sources.
   */
  public $type;

  /**
   * @integer
   * The event that triggers this txnCheck on the Merchant. 
   * This field is specified as an integer. 
   * Valid values are: 
   * '1': Preboard. Check the Merchant before they are boarded. 
   * '2': Check the Merchant after they are boarded. 
   * '3': Check the Merchant when they process a Transaction. 
   * '4': Check the Merchant when their transaction volume hits a certain amount. 
   * '5': Check the Merchant when a Payout occurs. 
   * '6': Check the Merchant when the volume of Payouts to the Merchant hits a certain amount.
   */
  public $trigger;

  /**
   * @integer
   * A lower cut-off value for the score in this Merchant check. 
   * The check fails if the score is equal to or below this value.
   */
  public $low;

  /**
   * @integer
   * An upper cut-off value for the score in this Merchant check. 
   * The check fails if the score is equal to or above this value.
   */
  public $high;

  /**
   * @integer
   * The minimum value that the Transaction must be to trigger this Merchant check. 
   * The unit of measure is determined by the type of check.
   */
  public $amount;

  /**
   * @integer
   * The action to take when the check fails. 
   * This field is specified as an integer. 
   * Valid values are: 
   * '1': Manual. The Merchant is sent to the manual review queue. 
   * '2': Mark the funds in the Merchant account as reserved. 
   * '3': Limit the Merchant account by blocking transactions which are over the limit set in this check.
   */
  public $action;

  /**
   * @integer
   * The options for the Verification. 
   * This field is specified as a sum of the desired options. 
   * Valid values are: 
   * '0': NONE. No options are set. 
   * '1': KYC. KYC verification will be enabled. 
   * '2': WATCHLIST_STANDARD. Primary member will be checked agains standard watchlists. 
   * '4': WATCHLIST_PLUS. Primary member will be checked against additional watchlists. 
   * '8': WATCHLIST_PREMIER. Primary member will be checked against uncommon lists like PEP, Associated family members, etc.
   */
  public $options;

  /**
   * @integer
   * A sequence number to use when applying multiple linked checks. 
   * When two or more checks are linked, the checks with lower 'sequence' numbers are applied first. 
   * This field is specified as an integer.
   */
  public $sequence;

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

