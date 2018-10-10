<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class iplists extends BaseResource {
  protected $resourceName = "iplists";
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
   * @integer
   * Whether this IP List contains IPv4 addresses (for example, 198.51.100.113) or IPv6 addresses (for example, 2001:0db8:85a3:0000:0000:8a2e:0370:7334). 
   * You can only use one type in each IP List resource.
   */
  public $version;

  /**
   * @integer
   * The type of this IP List. 
   * This field is specified as an integer. 
   * Valid values are: 
   * '0': Blacklisted IP address range 
   * '1': Whitelisted IP address range
   */
  public $type;

  /**
   * @string
   * The lowest IP address that should be included in this IP List. 
   * The valid data type for this field depends on whether the IP list is set to be an IPv4 or IPv6 list in the 'type' field. 
   * For an IPv4 list, only IPv4 addresses such as 198.51.100.113 are permitted. For an IPv6 list, only IPv6 addresses such as 2001:0db8:85a3:0000:0000:8a2e:0370:7334 are permitted.
   */
  public $start;

  /**
   * @string
   * The highest IP address that should be included in this IP List. 
   * The valid values for this field depend on whether the IP list is set to be an IPv4 or IPv6 list in the 'type' field. 
   * For an IPv4 list, only IPv4 addresses, such as '198.51.100.113', are permitted. For an IPv6 list, only IPv6 addresses, such as '2001:0db8:85a3:0000:0000:8a2e:0370:7334' are permitted.
   */
  public $finish;

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

