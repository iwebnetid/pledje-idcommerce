<?php 
namespace SplashPayments;

use SplashPayments\Exceptions\InvalidRequest;

class mappings extends BaseResource {
  protected $resourceName = "mappings";
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
   */
  public $name;

  /**
   * @string
   * A description of this Mapping.
   */
  public $description;

  /**
   * @string
   * A JSON document that describes the input fields that should be mapped. 
   * This field is stored as a text string and must be between 1 and 5000 characters long.
   */
  public $input;

  /**
   * @string
   * A JSON document that describes the fields that should appear in the output, after the input fields have been mapped. 
   * This field is stored as a text string and must be between 1 and 5000 characters long.
   */
  public $output;

  /**
   * @string
   * A valid URL that represents the XML namespace of the input and output documents. 
   * This field is stored as a text string and must be between 1 and 100 characters long.
   */
  public $namespace;


}

