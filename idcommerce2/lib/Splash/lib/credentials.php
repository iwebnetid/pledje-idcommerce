<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class credentials extends BaseResource {
  protected $resourceName = "credentials";
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
   * The identifier of the Entity that this Credential resource belongs to.
   */
  public $entity;

  /**
   * @string
   * The name of this Credential resource. 
   * This field is stored as a text string and must be between 1 and 100 characters long.
   */
  public $name;

  /**
   * @string
   * A description of this Credential resource. 
   * This field is stored as a text string and must be between 1 and 100 characters long.
   */
  public $description;

  /**
   * @string
   * The username to use when authenticating to the integration associated with this Credential resource. 
   * This field is stored as a text string and must be between 1 and 50 characters long.
   */
  public $username;

  /**
   * @string
   * The password to use when authenticating to the integration associated with this Credential resource. 
   * This field is stored as a text string and must be between 1 and 50 characters long.
   */
  public $password;

  /**
   * @string
   * The username to use when connecting to the integration associated with this Credential resource. 
   * This field is stored as a text string and must be between 1 and 50 characters long. 
   * This field is only necessary when it is required by the integration.
   */
  public $connectUsername;

  /**
   * @string
   * The password to use when connecting to the integration associated with this Credential resource. 
   * This field is stored as a text string and must be between 1 and 50 characters long. 
   * This field is only necessary when it is required by the integration.
   */
  public $connectPassword;

  /**
   * @string
   */
  public $integration;

  /**
   * @integer
   * The type of action that this Credential is authorized to perform. 
   * Valid values are: 
   * '1': Transaction - this Credential can be used to send Transactions to the processor. 
   * '2': Batch - this Credential can be used to send Batches to the processor for settlement. 
   * '3': Boarding - this Credential can be used to board a Merchant with the processor. 
   * '4': Payout - this Credential can be used to send out a Payout instruction. 
   * '5': Chargeback - this Credential can be used to retrieve or update a Chargeback with the processor. 
   * '6': Report - this Credential can be used to receive reports from the processor. 
   * '7': Account - this Credential can be used to verify a bank account when you use it with a bank account verification Integration. 
   * '8': Verification - this Credential can be used to verify data about a Merchant when you use it with a merchant verification integration.
   */
  public $type;

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

