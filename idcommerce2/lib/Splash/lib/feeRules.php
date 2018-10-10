<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class feeRules extends BaseResource {
  protected $resourceName = "feeRules";
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
   * The identifier of the Fee that this Fee Rule applies.
   */
  public $fee;

  /**
   * @string
   * The name of this Fee Rule. 
   * This field is stored as a text string and must be between 0 and 100 characters long.
   */
  public $name;

  /**
   * @string
   */
  public $description;

  /**
   * @integer
   * The type of logic to apply with this Fee Rule. 
   * This field is specified as an integer. 
   * Valid values are: 
   * '1': Less than - the Fee applies only if the triggered amount is lower than the amount set in the 'value' field of the Fee Rule, 
   * '2': Equal to - the Fee applies only if the transaction amount is exactly the same as the amount set in the 'value' field of the Fee Rule, 
   * '3': Not equal to - the Fee applies only if the transaction amount is not exactly equal to the amount set in the 'value' field of the Fee Rule, 
   * '4': Greater than - the Fee applies only if the transaction amount is higher than the amount set in the 'value' field of the Fee Rule and 
   * '5': Swiped - the Fee applies based on a determination of whether the cardholder was present during the transaction.
   */
  public $type;

  /**
   * @integer
   * The value to compare against when evaluating this Fee Rule. 
   * When the 'type' field is set to one of the comparison operators ('1 - Less than', '2 - Equal to', '3 - Not equal to', or '4 - Greater than'), this field represents the comparator value in cents. 
   * When the 'type' field is set to '5' (Swiped), this field represents the cardholder presence state to check the Transaction against. A value of '1' means that the card was swiped and the cardholder was present, while a value of '0' means that the card was not swiped and the cardholder was not present.
   */
  public $value;

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

