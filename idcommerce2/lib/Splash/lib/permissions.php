<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class permissions extends BaseResource {
  protected $resourceName = "permissions";
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
   * The identifier of the Login resource that owns this Permission.
   */
  public $login;

  /**
   * @string
   * If you are delegating Permissions from a Login that you own, then this field stores the identifier of the Login resource whose access you want to delegate.
   */
  public $fromlogin;

  /**
   * @string
   * If you are delegating Permissions to a Login, then this field stores the identifier of the Login resource that should be granted the Permission.
   */
  public $tologin;

  /**
   * @string
   * If you are delegating Permissions from an Org that you own, then this field stores the identifier of the Org resource whose access you want to delegate.
   */
  public $fromorg;

  /**
   * @string
   * If you are delegating Permissions to an Org, then this field stores the identifier of the Org resource that should be granted the Permission.
   */
  public $toorg;

  /**
   * @integer
   */
  public $resource;

  /**
   * @integer
   * The level of access to delegate to the target Login or Org to view resources of this type. 
   * Valid values are: 
   * '0': No delegation. Do not modify the privileges of the target Entity or Org. 
   * '1': Allow. Grant this level of access.  
   * '2': Deny. Prevent this level of access.
   */
  public $view;

  /**
   * @integer
   * The level of access to delegate to the target Login or Org to add resources of this type. 
   * Valid values are: 
   * '0': No delegation. Do not modify the privileges of the target Entity or Org. 
   * '1': Allow. Grant this level of access.  
   * '2': Deny. Prevent this level of access.
   */
  public $add;

  /**
   * @integer
   * The level of access to delegate to the target Login or Org to edit resources of this type. 
   * Valid values are: 
   * '0': No delegation. Do not modify the privileges of the target Entity or Org. 
   * '1': Allow. Grant this level of access.  
   * '2': Deny. Prevent this level of access.
   */
  public $edit;

  /**
   * @integer
   * The level of access to delegate to the target Login or Org to delete resources of this type. 
   * Valid values are: 
   * '0': No delegation. Do not modify the privileges of the target Entity or Org. 
   * '1': Allow. Grant this level of access.  
   * '2': Deny. Prevent this level of access.
   */
  public $destroy;

  /**
   * @integer
   * The level of access to delegate to the target Login or Org to reference resources of this type in other resources. 
   * Valid values are: 
   * '0': No delegation. Do not modify the privileges of the target Entity or Org. 
   * '1': Allow. Grant this level of access.  
   * '2': Deny. Prevent this level of access.
   */
  public $reference;

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

