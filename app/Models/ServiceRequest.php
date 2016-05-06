<?php
namespace App\Models;

use Session;
use Illuminate\Support\Facades\Input;

class ServiceRequest {

  //-----------------------------------------------------
  // VARS & CONSTANTS
  //-----------------------------------------------------

  private $httpMethod;
  private $requestPath;
  private $httpHeader;
  private $postData;
  private $debug;
  private $timeout;
  private $userPass;
  private $verifyPeer = false;
  private $followLocation;
  private $returnTransfer;
  private $cookieFile;
  private $httpCode;
  private $response;



  //-----------------------------------------------------
  // GETTERS & SETTERS
  //-----------------------------------------------------

  public function getHttpMethod(){
    return $this->httpMethod;
  }

  public function setHttpMethod($httpMethod){
    $this->httpMethod = $httpMethod;
    return $this;
  }

  public function getRequestPath(){
    return $this->requestPath;
  }

  public function setRequestPath($requestPath){
    $this->requestPath = $requestPath;
    return $this;
  }

  public function getHttpHeader(){
    return $this->httpHeader;
  }

  public function setHttpHeader($httpHeader){
    $this->httpHeader = $httpHeader;
    return $this;
  }

  public function getPostData(){
    return $this->postData;
  }

  public function setPostData($postData, $encode = false){
    $this->postData = ($encode) ? json_encode($postData) : $postData;
    return $this;
  }

  public function getDebug(){
    return $this->debug;
  }

  public function setDebug($debug){
    $this->debug = $debug;
    return $this;
  }

  public function getTimeout(){
    return $this->timeout;
  }

  public function setTimeout($timeout){
    $this->timeout = $timeout;
    return $this;
  }

  public function getUserPass(){
    return $this->userPass;
  }

  public function setUserPass($userPass){
    $this->userPass = $userPass;
    return $this;
  }

  public function getVerifyPeer(){
    return $this->verifyPeer;
  }

  public function setVerifyPeer($verifyPeer){
    $this->verifyPeer = $verifyPeer;
    return $this;
  }

  public function getFollowLocation(){
    return $this->followLocation;
  }

  public function setFollowLocation($followLocation){
    $this->followLocation = $followLocation;
    return $this;
  }

  public function getReturnTransfer(){
    return $this->returnTransfer;
  }

  public function setReturnTransfer($returnTransfer){
    $this->returnTransfer = $returnTransfer;
    return $this;
  }

  public function getCookieFile(){
    return $this->cookieFile;
  }

  public function setCookieFile($cookieFile){
    $this->cookieFile = $cookieFile;
    return $this;
  }

  public function getHttpCode(){
    return $this->httpCode;
  }

  public function setHttpCode($httpCode){
    $this->httpCode = $httpCode;
    return $this;
  }

  public function getResponse(){
    return $this->response;
  }

  public function setResponse($response){
    $this->response = $response;
    return $this;
  }



  //-----------------------------------------------------
  // SETUP
  //-----------------------------------------------------

  function __construct() 
  {
    $this->setHttpMethod('GET');
    $this->setHttpHeader(array("Content-Type: application/json"));
    $this->setDebug(false);
    $this->setTimeout(false);
    $this->setUserPass(false);
    $this->setVerifyPeer(false);
    $this->setFollowLocation(true);
    $this->setReturnTransfer(true);
    $this->setCookieFile(\Config::get('constants.COOKIE_FILE'));
  }



  //-----------------------------------------------------
  // PUBLIC METHODS
  //-----------------------------------------------------
  /**
  * Execute Service Request
  * @access public
  * @return request
  */
  public function execute() 
  {
    return $this->curlRequest();
  }


  /**
  * Successful
  * @access public
  * @return Boolean success
  */
  public function success() 
  {
    if ($this->httpCode >= 200 && $this->httpCode < 300)
      return true;
    return false;
  }


  /**
  * Apply Riot Header
  * @access public
  * @param $contentType
  * @param $orgId
  * @return void
  */

  // public function applyRiotHeader($contentType = NULL, $user = false){

  //   $contentType = ($contentType) ? $contentType : "application/json";

  //   $this->setHttpHeader(array(
  //     "Content-Type: " . $contentType,
  //     "X-Comrse-Token: " . $_ENV['PUBLIC_API_TOKEN'],
  //     "X-Comrse-Version: 2015-02-01"
  //     ));
  //   return $this;
  // }

  /**
  * Set API Path
  * @access public
  * @param String requestPath
  */

  public function setApiRequestPath($requestPath) {
    $this->setRequestPath($_ENV['API_PATH'] . ltrim($requestPath, '/') . $_ENV['RIOT_DEV_KEY']);
    return $this;
  }

  /**
  * Get Encoded Response
  * @access public
  * @return Object response
  */
  public function getJsonResponse() {
    return json_encode($this->getResponse());
  }

  /**
  * Get Decoded Response
  * @access public
  * @return Object response
  */
  public function getObjectResponse() {
    return json_decode($this->getResponse());
  }

  //-----------------------------------------------------
  // PRIVATE METHODS
  //-----------------------------------------------------
  /**
  * Perform Curl Request
  */
  private function curlRequest() 
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->requestPath);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $this->httpHeader);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $this->followLocation);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, $this->returnTransfer);
    curl_setopt($ch, CURLOPT_HEADER, $this->debug);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->verifyPeer);
    curl_setopt($ch, CURLOPT_COOKIE, $this->cookieFile);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookieFile);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookieFile);

    if ($this->userPass)
    {
      curl_setopt($ch, CURLOPT_USERPWD, $this->userPass);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    }

    if ($this->timeout)
      curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);

    if ($this->postData != NULL && ($this->httpMethod == "POST" || $this->httpMethod == "PUT"))
      curl_setopt($ch, CURLOPT_POSTFIELDS, $this->postData);

    if ($this->postData == NULL || $this->httpMethod == "PUT")
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->httpMethod);

    $result = curl_exec($ch);

    $this->httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $this->response = $result;

    // log data for debugging
    \Log::info($this->requestPath);
    \Log::info($this->response);

    curl_close($ch);

    return $result;
  }


}