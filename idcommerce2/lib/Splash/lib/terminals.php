<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class terminals extends BaseResource {
  protected $resourceName = "terminals";
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
   * The identifier of the Merchant that owns this terminals resource.
   */
  public $merchant;

  /**
   * @integer
   * The type of terminal. 
   * This field is stored as an integer and must be between 1 and 417.
   */
  public $type;

  /**
   * @integer
   * How is the terminal employed. 
   * Valid values are: 
   * '1': Retail. 
   * '2': Retail with tips. 
   * '3': Restaurant. 
   * '4': Lodging. 
   * '5': Bar. 
   * '6': Cash Advance. 
   * '7': Mail/Telephone Order. 
   * '8': Pay At The Pump. 
   * '9': Service Rest. 
   * '10': E-commerce. 
   * '11': Direct Marketing. 
   * '12': Fine Dining. 
   * '13': Gift Card Only.
   */
  public $environment;

  /**
   * @integer
   * If the terminal should be manually or automatically closed for the day. 
   * Valid values are: 
   * '0': Automatic. 
   * '1': Manual.
   */
  public $autoClose;

  /**
   * @integer
   * The time when the terminal should be automatically closed for the day. This field is only required when AutoClose is set to automatic. 
   * The format should be HHMM (1145, 2200, etc).
   */
  public $autoCloseTime;

  /**
   * @string
   * The name of this Terminal. 
   * This field is stored as a text string and must be between 1 and 100 characters long.
   */
  public $name;

  /**
   * @string
   * A description of the Terminal. 
   * This field is stored as a text string and must be between 1 and 100 characters long.
   */
  public $description;

  /**
   * @string
   * The first line of the address associated with this Terminal's location. 
   * This field is stored as a text string and must be between 1 and 100 characters long.
   */
  public $address1;

  /**
   * @string
   * The second line of the address associated with this Terminal's location. 
   * This field is stored as a text string and must be between 1 and 20 characters long.
   */
  public $address2;

  /**
   * @string
   * The name of the city in the address associated with this Terminal's location. 
   * This field is stored as a text string and must be between 1 and 20 characters long.
   */
  public $city;

  /**
   * @string
   * The U.S. state in the address associated with this Terminal's location. Valid values are: AL, AK, AZ, AR, CA, CO, CT, DE, DC, FL, GA, HI, ID, IL, IN, IA, KS, KY, LA, ME, MD, MA, MI, MN, MS, MO, MT, NE, NV, NH, NJ, NM, NY, NC, ND, OH, OK, OR, PA, RI, SC, SD, TN, TX, UT, VT, VA, WA, WV, WI and WY.
   */
  public $state;

  /**
   * @string
   * The ZIP code in the address associated with this Terminal's location. 
   * This field is stored as a text string and must be between 1 and 20 characters long.
   */
  public $zip;

  /**
   * @string
   * The country in the address associated with the Terminal's location. Currently, this field only accepts the value 'USA'.
   */
  public $country;

  /**
   * @integer
   * The current status of the terminal. 
   * Valid values are: 
   * '0': Inactive. 
   * '1': Active. 
   * This field is optional and is set to Active by default.
   */
  public $status;


}

