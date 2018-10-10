<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class alertActions extends BaseResource {
  protected $resourceName = "alertActions";
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
   * The medium to use to deliver this Alert. 
   * Valid values are: 
   * 'email': Deliver the Alert to an email address. 
   * 'web': Deliver the Alert through a web site notification. 
   * 'app': Deliver the Alert through a mobile application notification. 
   * 'sms': Deliver the Alert through an SMS message to a mobile device.
   */
  public $type;

  /**
   * @string
   * When the 'type' field of this resource is set to 'web', this field determines the format that the Alert data should be sent in. 
   *  Valid values are: 
   * 'JSON': JSON document serialization. 
   * 'XML': XML document serialization. 
   * 'SOAP': SOAP XML document serialization. 
   * 'FORM':HTML form data serialization.
   */
  public $options;

  /**
   * @string
   */
  public $value;

  /**
   * @string
   * The identifier of the Alert resource that defines this alertAction.
   */
  public $alert;


}

