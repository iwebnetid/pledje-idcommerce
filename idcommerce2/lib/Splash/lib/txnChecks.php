<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class txnChecks extends BaseResource {
  protected $resourceName = "txnChecks";
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
   * The identifier of the Login that owns this txnChecks resource.
   */
  public $login;

  /**
   * @string
   * If this txnCheck resource relates to an Org, then this field stores the identifier of the Org.
   */
  public $org;

  /**
   * @string
   * If this txnCheck resource relates to an Entity, then this field stores the identifier of the Entity.
   */
  public $entity;

  /**
   * @string
   * The identifier of a linked txnCheck resource that acts in coordination with this txnCheck. When you define a txnCheck attribute here, the referenced txnCheck becomes the 'parent' resource. The action field set on the 'parent' resource determines the action that occurs if all of the linked txnChecks fail.
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
   * @string
   * The transaction stage that this txnCheck should apply at.  
   * Valid values are: 
   * 'AUTH': Apply this txnCheck during transaction authorization. 
   * 'CAPTURE': Apply this txnCheck during transaction capture. 
   * 'REFUND': Apply this txnCheck when processing a refund.
   */
  public $stage;

  /**
   * @integer
   * The action to take when this check fails. 
   * This field is specified as an integer. 
   * Valid values are: 
   * '1': Block. Block the Transaction from proceeding. This returns an error. 
   * '2': No capture. Prevent the Transaction from being captured. 
   * '3': Hold. Hold the Transaction. It will not be captured until it is manually released. 
   * '4': Reserve. Reserve the Transaction. The funds for the transaction will not be released until the Transaction is manually reviewed.
   */
  public $action;

  /**
   * @integer
   * A sequence number to use when applying multiple linked txnChecks. 
   * When two or more txnChecks are linked using their 'txnCheck' fields, the checks with lower 'sequence' numbers are applied first. 
   * This field is specified as an integer.
   */
  public $sequence;

  /**
   * @integer
   * The minimum value that the Transaction must be to trigger this txnCheck. 
   * The unit of measure is determined by the type of check.
   */
  public $amount;

  /**
   * @integer
   * The amount that the associated Transaction should be compared against. The units for this field depend on the type of check. 
   * For checks that are based on a ratio, specify the amount as a percentage in basis points. 
   * For checks that are based on a dollar amount, specify the amount in cents. 
   * For checks that are based on a count, specify the exact value as an integer.
   */
  public $value;

  /**
   * @integer
   * A date indicator that determines how far back in time time-based checks should be checked. This field works in conjunction with the 'periodFactor' field, which multiplies this basic period. 
   * For example, maximum transaction volume within the last three weeks would use a 'period' value of '2' for 'weeks' and a 'periodSchedule' of '3', to indicate three weeks. 
   * Valid values are: 
   * '1': Days - the basic value for the date range is set in days. 
   * '2': Weeks - the basic value for the date range is set in weeks. 
   * '3': Months - the basic value for the date range is set in months. 
   * '4': Years - the basic value for the date range is set in days.
   */
  public $period;

  /**
   * @integer
   */
  public $periodFactor;

  /**
   * @integer
   * A lower cut-off value for the score in this txnCheck. 
   * The check fails if the score is equal to or below this value.
   */
  public $low;

  /**
   * @integer
   * An upper cut-off value for the score in this txnCheck. 
   * The check fails if the score is equal to or above this value.
   */
  public $high;

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

