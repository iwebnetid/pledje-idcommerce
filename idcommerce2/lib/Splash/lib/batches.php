<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class batches extends BaseResource {
  protected $resourceName = "batches";
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
   * The identifier of the Merchant that is associated with this Batch.
   */
  public $merchant;

  /**
   * @string
   */
  public $date;

  /**
   * @integer
   * The current status of this Batch. 
   * Valid values are: 
   * '0': Open - This Batch can accept more Transactions. 
   * '1': Closed - this Batch is closed to new Transactions and is ready to be sent to the processor. 
   * '2': Processing - this Batch is being processed for settlement. 
   * '3': Processed - this Batch has been processed.
   */
  public $status;

  /**
   * @string
   * The merchant's reference code of the batch. 
   * This field is stored as a text string and must be between 0 and 50 characters long.
   */
  public $clientRef;

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


  public function delete($params = array()) {
      throw new \SplashPayments\Exceptions\InvalidRequest('Invalid Action');
  }

}

