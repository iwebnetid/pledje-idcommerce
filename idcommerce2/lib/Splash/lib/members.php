<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class members extends BaseResource {
  protected $resourceName = "members";
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
   * The identifier of the Merchant associated with this Member.
   */
  public $merchant;

  /**
   * @string
   * The title that this Member holds in relation to the associated Merchant. 
   * For example, 'CEO', 'Owner' or 'Director of Finance'.
   */
  public $title;

  /**
   * @string
   * The first name associated with this Member.
   */
  public $first;

  /**
   * @string
   * The middle name associated with this Member.
   */
  public $middle;

  /**
   * @string
   * The last name associated with this Member.
   */
  public $last;

  /**
   * @string
   * The social security number of this Member. This field is required if the Merchant associated with the Member is a sole trader.
   */
  public $ssn;

  /**
   * @integer
   * The date of birth of this Member.  The date is specified as an eight digit string in YYYYMMDD format, for example, '20160120' for January 20, 2016.
   */
  public $dob;

  /**
   * @string
   * The driver's license number of this Member.
   */
  public $dl;

  /**
   * @string
   * The U.S. state where the driver's license of this Member was issued. 
   * Valid values are any U.S. state's 2 character postal abbreviation.
   */
  public $dlstate;

  /**
   * @integer
   * The share of the Member's ownership of the associated Merchant, expressed in basis points. 
   * For example, 25.3% is expressed as '2530'.
   */
  public $ownership;

  /**
   * @string
   * The email address of this Member.
   */
  public $email;

  /**
   * @string
   * The fax number associated with this Member. 
   * This field is stored as a text string and must be between 10 and 15 characters long.
   */
  public $fax;

  /**
   * @string
   * The phone number associated with this Member. 
   * This field is stored as a text string and must be between 10 and 15 characters long.
   */
  public $phone;

  /**
   * @string
   * The country in the address associated with the Member. Currently, this field only accepts the value 'USA'.
   */
  public $country;

  /**
   * @string
   * The ZIP code in the address associated with this Member. 
   * This field is stored as a text string and must be between 1 and 20 characters long.
   */
  public $zip;

  /**
   * @string
   * The U.S. state associated with this Member. 
   * Valid values are any U.S. state's 2 character postal abbreviation.
   */
  public $state;

  /**
   * @string
   * The name of the city in the address associated with this Member. 
   * This field is stored as a text string and must be between 1 and 20 characters long.
   */
  public $city;

  /**
   * @string
   * The second line of the address associated with this Member. 
   * This field is stored as a text string and must be between 1 and 20 characters long.
   */
  public $address2;

  /**
   * @string
   * The first line of the address associated with this Member. 
   * This field is stored as a text string and must be between 1 and 100 characters long.
   */
  public $address1;

  /**
   * @integer
   * Indicates whether the Member is the 'primary' contact for the associated Merchant. Only one Member associated with each Merchant can be the 'primary' Member. 
   * A value of '1' means primary and a value of '0' means not primary.
   */
  public $primary;

  /**
   * @integer
   * Whether this Member is marked as inactive. A value of '1' means inactive and a value of '0' means active.
   */
  public $inactive;

  /**
   * @integer
   * Whether this Member should be marked as frozen. A value of '1' means frozen and a value of '0' means not frozen.
   */
  public $frozen;


}

