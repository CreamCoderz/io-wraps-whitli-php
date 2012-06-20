<?php
/*
 * Copyright (c) 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

require_once 'service/apiModel.php';
require_once 'service/apiService.php';
require_once 'service/apiServiceRequest.php';


  /**
   * The "User" collection of methods.
   * Typical usage is:
   *  <code>
   *   $whitliapiService = new apiWhitliapiService(...);
   *   $User = $whitliapiService->User;
   *  </code>
   */
  class UserServiceResource extends apiServiceResource {


    /**
     * Import a facebook uid and oauth_token combination to allow Whit.li to populate profile, post and
     * interest information automatically at a predetermined schedule. (User.ImportToken)
     *
     * @param string $oauth_token Facebook oauth token
     * @param int $uid The ID of the user.
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string format You can select between json, xml, csv, php and serialized response formats.
     */
    public function ImportToken($oauth_token, $uid, $optParams = array()) {
      $params = array('oauth_token' => $oauth_token, 'uid' => $uid);
      $params = array_merge($params, $optParams);
      $data = $this->__call('ImportToken', array($params));
      return $data;
    }
    /**
     * Request Whit.li to refresh data associated with a given uid and oauth_token pair. (User.Populate)
     *
     * @param int $uid The ID of the user.
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string format You can select between json, xml, csv, php and serialized response formats.
     */
    public function Populate($uid, $optParams = array()) {
      $params = array('uid' => $uid);
      $params = array_merge($params, $optParams);
      $data = $this->__call('Populate', array($params));
      return $data;
    }
  }

  /**
   * The "Key" collection of methods.
   * Typical usage is:
   *  <code>
   *   $whitliapiService = new apiWhitliapiService(...);
   *   $Key = $whitliapiService->Key;
   *  </code>
   */
  class KeyServiceResource extends apiServiceResource {


    /**
     * Compare two users based on a given context associated with key vectors and components.
     * (Key.Compare)
     *
     * @param int $context_id The ID of a given context_id to match against. Options are 100 for Work, 101 for Shopping, 102 for Travel, 103 for Roommates, 104 for Friends
     * @param int $uid2 The ID of the second user to compare.
     * @param int $uid1 The ID of the first user to compare.
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string format You can select between json, xml, csv, php and serialized response formats.
     * @opt_param string schema You can select between fb and generic schemas
     */
    public function Compare($context_id, $uid2, $uid1, $optParams = array()) {
      $params = array('context_id' => $context_id, 'uid2' => $uid2, 'uid1' => $uid1);
      $params = array_merge($params, $optParams);
      $data = $this->__call('Compare', array($params));
      return $data;
    }
    /**
     * Get a Whit.li key.  A Whit.li key contains information that describes the various traits of a
     * person.   Each Whit.li key contains multiple vectors that have detailed information about an
     * individual based on the individuals psycho-social profile. (Key.Get)
     *
     * @param int $key_id The ID of the key.
     * @param int $uid The ID of the user.
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string format You can select between json, xml, csv, php and serialized response formats.
     * @opt_param string schema You can select between fb and generic schemas
     */
    public function Get($key_id, $uid, $optParams = array()) {
      $params = array('key_id' => $key_id, 'uid' => $uid);
      $params = array_merge($params, $optParams);
      $data = $this->__call('Get', array($params));
      return $data;
    }
  }



/**
 * Service definition for Whitliapi (1.0).
 *
 * <p>
 * Let's take a quick exploratory dive into the API and see this thing in action. To start out on your journey, simply register for a Whit.li API key.  We currently support responses in JSON and XML.
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class apiWhitliapiService extends apiService {
  public $User;
  public $Key;
  /**
   * Constructs the internal representation of the Whitliapi service.
   *
   * @param apiClient apiClient
   */
  public function __construct(apiClient $apiClient) {
    $this->rpcPath = '/rpc';
    $this->restBasePath = '/';
    $this->version = '1.0';
    $this->serviceName = 'whitliapi';
    $this->io = $apiClient->getIo();

    $apiClient->addService($this->serviceName, $this->version);
    $this->User = new UserServiceResource($this, $this->serviceName, 'User', json_decode('{"methods": {"ImportToken": {"path": "user/importToken", "httpMethod": "POST", "id": "User.ImportToken", "parameters": {"oauth_token": {"default": "", "required": true, "type": "string", "location": "query"}, "uid": {"default": "", "required": true, "type": "integer", "location": "query"}, "format": {"default": "json", "required": false, "type": "string", "location": "query"}}}, "Populate": {"path": "user/populate", "httpMethod": "GET", "id": "User.Populate", "parameters": {"uid": {"default": "", "required": true, "type": "integer", "location": "query"}, "format": {"default": "json", "required": false, "type": "string", "location": "query"}}}}}', true));
    $this->Key = new KeyServiceResource($this, $this->serviceName, 'Key', json_decode('{"methods": {"Compare": {"path": "key/compare", "httpMethod": "GET", "id": "Key.Compare", "parameters": {"context_id": {"default": "100", "required": true, "type": "integer", "location": "query"}, "schema": {"default": "fb", "required": false, "type": "string", "location": "query"}, "uid2": {"default": "", "required": true, "type": "integer", "location": "query"}, "uid1": {"default": "", "required": true, "type": "integer", "location": "query"}, "format": {"default": "json", "required": false, "type": "string", "location": "query"}}}, "Get": {"path": "key/get", "httpMethod": "GET", "id": "Key.Get", "parameters": {"key_id": {"default": "1", "required": true, "type": "integer", "location": "query"}, "schema": {"default": "fb", "required": false, "type": "string", "location": "query"}, "uid": {"default": "", "required": true, "type": "integer", "location": "query"}, "format": {"default": "json", "required": false, "type": "string", "location": "query"}}}}}', true));
  }
}

class KeyResponse extends apiModel {
  public $status;
  protected $__bodyType = 'KeyResponseBody';
  protected $__bodyDataType = '';
  public $body;
  public $message;
  public $timestamp;
  public function setStatus($status) {
    $this->status = $status;
  }
  public function getStatus() {
    return $this->status;
  }
  public function setBody(KeyResponseBody $body) {
    $this->body = $body;
  }
  public function getBody() {
    return $this->body;
  }
  public function setMessage($message) {
    $this->message = $message;
  }
  public function getMessage() {
    return $this->message;
  }
  public function setTimestamp($timestamp) {
    $this->timestamp = $timestamp;
  }
  public function getTimestamp() {
    return $this->timestamp;
  }
}

class KeyResponseBody extends apiModel {
  public $key;
  public function setKey($key) {
    $this->key = $key;
  }
  public function getKey() {
    return $this->key;
  }
}
