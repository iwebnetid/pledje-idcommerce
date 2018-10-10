<?php 
namespace SplashPayments\Http;

class RequestParams {
  // Sort parameter to be included in the SEARCH header
  // only for GET requests
  private $sort;
  // Query parameters to be used in GET requests
  private $expand = array();
  // Page to request
  private $page;

  // Class constructor
  public function __construct($sort = "", $expand = array(), $page = 1) {
    if (is_array($sort) && count($sort) == 2) {
      $this->sort = "{$sort[0]}[sort]={$sort[1]}";
    }
    else {
      $this->sort = $sort;
    }
    if (is_array($expand)) {
      $this->expand = $expand;
    }
    $this->page = $page;
  }

  // Get the sort parameters
  public function getSort() {
    return $this->sort;
  }

  // Set the sort parameter to be used in the GET requests
  public function sort($field, $value) {
    if (is_string($field) && is_string($value)) {
      $this->sort = "{$field}[sort]={$value}";
    }
  }

  // Retrive the query parameters
  public function getExpand() {
    $expand = "";
    foreach ($this->expand as $string) {
      $fields = explode(", ", $string);
      $expand .= "expand";
      foreach ($fields as $field) {
        $expand .= "[{$field}]";
      }
      $expand .= "[]&";
    }
    return rtrim($expand, "&");
  }

  // Set the query parameters to be used in the GET requests
  public function expand($expand = array()) {
    if (is_array($expand)) {
      $this->expand = $expand;
    }
  }

  // Set the page to request
  public function page($page) {
    $this->page = $page;
  }
  // Get the page
  public function getPage() {
    if ($this->page) {
      return "page[number]=" . $this->page;
    }
    return "";
  }

  // Increment page
  public function goNextPage() {
    if ($this->page) {
      $this->page = $this->page + 1;
    }
    else {
      $this->page = 1;
    }
  }
}
