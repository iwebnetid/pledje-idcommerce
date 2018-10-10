<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class reserves extends BaseResource {
  protected $resourceName = "reserves";
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
   * The identifier of the Org that this Reserves resource applies to. 
   * If you set this field, then the Reserve applies to all Entities in the Org.
   */
  public $org;

  /**
   * @string
   * The identifier of the Entity that this Reserve applies to.
   */
  public $entity;

  /**
   * @string
   * The name of this Reserve. 
   * This field is stored as a text string and must be between 1 and 100 characters long.
   */
  public $name;

  /**
   * @string
   * A description of this Reserve.  
   * This field is stored as a text string and must be between 0 and 100 characters long.
   */
  public $description;

  /**
   * @integer
   * The percentage of funds to reserve, expressed in basis points. 
   * For example, 25.3% is expressed as '2530'.
   */
  public $percent;

  /**
   * @integer
   * The schedule that determines when the funds in this Reserve should be released. 
   * Valid values are: 
   * '1': Daily - the funds are released every day. 
   * '2': Weekly - the funds are released every week. 
   * '3': Monthly - the funds are released every month. 
   * '4': Annually - the funds are released every year.
   */
  public $release;

  /**
   * @integer
   * A multiplier that you can use to adjust the schedule set in the 'release' field. 
   * This field is specified as an integer and its value determines how the schedule is multiplied. 
   * For example, if 'release' is set to '1' (meaning 'daily'), then a 'releaseFactor' value of '2' would cause the funds to be released from this Reserve every two days.
   */
  public $releaseFactor;

  /**
   * @integer
   * The date on which this Reserve resource should stop reserving funds from the Entity or Org. 
   * The date is specified as an eight digit string in YYYYMMDD format, for example, '20160120' for January 20, 2016.
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

