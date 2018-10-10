<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class txnHoldNotes extends BaseResource {
  protected $resourceName = "txnHoldNotes";
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
   * The identifier of the TxnHold that owns this txnHoldNotes resource.
   */
  public $txnHold;

  /**
   * @string
   * Free-form text for adding a message along with the action.
   */
  public $note;

  /**
   * @integer
   * The desired action to take on the referenced TxnHold. 
   * This field is specified as an integer. 
   * Valid values are: 
   * '0': Note. Just add a note to the txnHold. '1': Release. Release the hold for this TxnHold.
   * '2': Hold. If the txnHold was released, this will allow resetting the hold.
   * '3': Review. Mark the txnHold as having been reviewed. 
   * '4': Re-Review. If the txnHold was marked as reviewed, this will allow resetting the review.
   */
  public $action;


  public function update($params = array()) {
      throw new \SplashPayments\Exceptions\InvalidRequest('Invalid Action');
  }

  public function delete($params = array()) {
      throw new \SplashPayments\Exceptions\InvalidRequest('Invalid Action');
  }

}

