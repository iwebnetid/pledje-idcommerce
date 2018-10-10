<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class merchants extends BaseResource {
  protected $resourceName = "merchants";
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
   * The date and time on which this Merchant last processed a Transaction.
   */
  public $lastActivity;

  /**
   * @string
   * The Entity associated with this Merchant.
   */
  public $entity;

  /**
   * @string
   * The name under which the Merchant is doing business, if applicable.
   */
  public $dba;

  /**
   * @integer
   * An indicator that specifies whether the Merchant is new to credit card processing. 
   * A value of '1' means new and a value of '0' means not new. By default, merchants are considered to be new.
   */
  public $new;

  /**
   * @integer
   * The date on which the Merchant was established. 
   * The date is specified as an eight digit string in YYYYMMDD format, for example, '20160120' for January 20, 2016.
   */
  public $established;

  /**
   * @integer
   * The value of the annual credit card sales of this Merchant. 
   * This field is specified as an integer in cents.
   */
  public $annualCCSales;

  /**
   * @integer
   */
  public $avgTicket;

  /**
   * @string
   * The American Express merchant identifier for this Merchant, if applicable.
   */
  public $amex;

  /**
   * @string
   * The Discover merchant identifier for this Merchant, if applicable.
   */
  public $discover;

  /**
   * @string
   * The Merchant Category Code (MCC) for this Merchant. This code is not required to create a Merchant, but it is required to successfully board a Merchant.
   */
  public $mcc;

  /**
   * @integer
   * The status of the Merchant. Valid values are '0' (not ready), '1' (ready), '2' (boarded), '3' (manual) and '4' (denied).
   */
  public $status;

  /**
   * @integer
   * The date and time on which this Merchant was successfully boarded.
   */
  public $boarded;

  /**
   * @integer
   * The Tax ID (TIN) status of the merchant. Valid values are '0' (pending), '1' (valid) and '2' (invalid).
   */
  public $tinStatus;

  /**
   * @integer
   * An indicator showing the version of the terms and conditions that this Merchant has accepted. The API indicates the version as an integer.
   */
  public $tcVersion;

  /**
   * @string
   * The date and time on which this Merchant accepted the terms and conditions version in tcVersion.
   */
  public $tcDate;

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

