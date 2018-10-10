<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class logins extends BaseResource {
  protected $resourceName = "logins";
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
   * The identifier of the Login.
   */
  public $login;

  /**
   * @string
   * The timestamp when this Login last logged in to the API.
   */
  public $lastLogin;

  /**
   * @string
   * The username associated with this Login. 
   * This field is stored as a text string and must be between 0 and 50 characters long.
   */
  public $username;

  /**
   * @string
   * The password associated with this Login. 
   * This field is stored as a text string and must be between 0 and 100 characters long.
   */
  public $password;

  /**
   * @string
   * The first name associated with this Login.
   */
  public $first;

  /**
   * @string
   * The middle name associated with this Login.
   */
  public $middle;

  /**
   * @string
   * The last name associated with this Login.
   */
  public $last;

  /**
   * @string
   * The email address associated with this Login.
   */
  public $email;

  /**
   * @string
   * The fax number associated with this Login. 
   * This field is stored as a text string and must be between 10 and 15 characters long.
   */
  public $fax;

  /**
   * @string
   * The phone number associated with this Login. 
   * This field is stored as a text string and must be between 10 and 15 characters long.
   */
  public $phone;

  /**
   * @string
   * The country associated with this Customer. 
   * Valid values for this field is the 3-letter ISO code for the country.
   */
  public $country;

  /**
   * @string
   * The ZIP code in the address associated with this Login. 
   * This field is stored as a text string and must be between 1 and 20 characters long.
   */
  public $zip;

  /**
   * @string
   * The state associated with this Login. 
   * If in the U.S. this is specified as the 2 character postal abbreviation for the state, if outside of the U.S. the full state name. 
   * This field is stored as a text string and must be between 2 and 100 characters long.
   */
  public $state;

  /**
   * @string
   * The name of the city in the address associated with this Login. 
   * This field is stored as a text string and must be between 1 and 20 characters long.
   */
  public $city;

  /**
   * @string
   * The second line of the address associated with this Login. 
   * This field is stored as a text string and must be between 1 and 20 characters long.
   */
  public $address2;

  /**
   * @string
   * The first line of the address associated with this Login. 
   * This field is stored as a text string and must be between 1 and 100 characters long.
   */
  public $address1;

  /**
   * @integer
   * Whether the email associated with this Login was confirmed. 
   * This field is stored as an integer and will be set to '1' when the email is confirmed.
   */
  public $confirmed;

  /**
   * @integer
   * The roles associated with this Login, specified as an integer.
   */
  public $roles;

  /**
   * @integer
   * Whether this Login is marked as inactive. 
   * A value of '1' means inactive and a value of '0' means active.
   */
  public $inactive;

  /**
   * @integer
   * Whether this Login should be marked as frozen. 
   * A value of '1' means frozen and a value of '0' means not frozen.
   */
  public $frozen;

  /**
   * @integer
   */
  public $effectiveRoles;


}

