<?php 
namespace SplashPayments\Http;

class Response {
   protected $response;
   protected $status;

   protected $class;

   public function __construct($response = "", $status = "", $class = "") {
     $this->response = $response;
     $this->status = $status;
     $this->class = $class;
   }

   // Return the response as an array
   public function getResponse() {
     $data = array();
     // Get the data
     if (isset($this->response["response"]["data"])) {
       foreach ($this->response["response"]["data"] as $key => $value) {
         $obj = new $this->class($value);
         $data[] = $obj;
       }
     }
     return $data;
   }

   // Get the status code of the request
   public function getStatus() {
     return $this->status;
   }

   // Whether the response has error or not
   public function hasErrors() {
     // Get the errors
     if (isset($this->response["response"]["errors"]["0"]) ||
         isset($this->response["errors"]["0"])) {
       return true;
     }
     return false;
   }

   public function getDetails() {
     $details = array();
     // Get the details
     if (isset($this->response["response"]["details"])) {
       $details = $this->response["response"]["details"];
     }
     return $details;
   }

   // Return the response as an array
   public function getErrors() {
     // Get the errors
     if (isset($this->response["errors"]["0"])) {
       return $this->response["errors"];
     }
     if (isset($this->response["response"]["errors"]["0"])) {
       return $this->response["response"]["errors"];
     }
     return false;
   }

   // Return true if there are more resources to retrieve
   public function hasMore() {

     if (isset($this->response["response"]["details"]["page"])) {
       return ($this->response["response"]["details"]["page"]["current"] <
               $this->response["response"]["details"]["page"]["last"]);
     }
     return true;
   }
}
