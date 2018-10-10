<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class entities extends BaseResource {
  protected $resourceName = "entities";
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
   * The incoming ip address from which this Entity was created.
   */
  public $ipCreated;

  /**
   * @string
   * The incoming ip address from which this Entity was last modified.
   */
  public $ipModified;

  /**
   * @string
   * The client ip address from which the Entity was created. 
   * Valid values are any Ipv4 or Ipv6 address.
   */
  public $clientIp;

  /**
   * @string
   * The Login that owns this resource.
   */
  public $login;

  /**
   * @string
   * The parameter associated with this Entity.
   */
  public $parameter;

  /**
   * @integer
   * The type of Entity. 
   * This field is specified as an integer. 
   * Valid values are '0' (sole proprietor), '1' (corporation), '2' (limited liability company), '3' (partnership), '4' (association), '5' (non-profit organization) and '6' (government organization).
   */
  public $type;

  /**
   * @string
   * The name of this Entity. 
   * This field is stored as a text string and must be between 1 and 100 characters long.
   */
  public $name;

  /**
   * @string
   * The first line of the address associated with this Entity. 
   * This field is stored as a text string and must be between 1 and 100 characters long.
   */
  public $address1;

  /**
   * @string
   * The second line of the address associated with this Entity. 
   * This field is stored as a text string and must be between 1 and 20 characters long.
   */
  public $address2;

  /**
   * @string
   * The name of the city in the address associated with this Entity. 
   * This field is stored as a text string and must be between 1 and 20 characters long.
   */
  public $city;

  /**
   * @string
   * The U.S. state associated with this Entity. 
   * Valid values are any U.S. state's 2 character postal abbreviation.
   */
  public $state;

  /**
   * @string
   * The ZIP code in the address associated with this Entity. 
   * This field is stored as a text string and must be between 1 and 20 characters long.
   */
  public $zip;

  /**
   * @string
   * The country in the address associated with the Entity. Currently, this field only accepts the value 'USA'.
   */
  public $country;

  /**
   * @string
   * The phone number associated with this Entity. 
   * This field is stored as a text string and must be between 10 and 15 characters long.
   */
  public $phone;

  /**
   * @string
   * The fax number associated with this Entity. 
   * This field is stored as a text string and must be between 10 and 15 characters long.
   */
  public $fax;

  /**
   * @string
   * The email address associated with this Entity. 
   * This field is stored as a text string and must be between 1 and 100 characters long.
   */
  public $email;

  /**
   * @string
   * The web site URL associated with this Entity. 
   * This field is stored as a text string and must be between 0 and 50 characters long.
   */
  public $website;

  /**
   * @string
   * The IRS Employer ID (EID) number for the Entity.
   */
  public $ein;

  /**
   * @string
   * The currency of this Entity. 
   * Currently, this field only accepts the value 'USD'.
   */
  public $currency;

  /**
   * @string
   * Custom, free-form field for client-supplied text.
   */
  public $custom;

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

