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
     * Import a generic profile from a JSON object. (User.ImportGeneric)
     *
     * @param $postBody the {@link }
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string format You can select between json, xml, csv, php and serialized response formats.
     * @return ImportResponse
     */
    public function ImportGeneric($postBody, $optParams = array()) {
      $params = array('postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('ImportGeneric', array($params));
      if ($this->useObjects()) {
        return new ImportResponse($data);
      } else {
        return $data;
      }
    }
    /**
     * Import a facebook uid and oauth_token combination to allow Whit.li to populate profile, post and
     * interest information automatically at a predetermined schedule. (User.ImportToken)
     *
     * @param string $oauth_token Facebook oauth token
     * @param int $uid The ID of the user.
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string format You can select between json, xml, csv, php and serialized response formats.
     * @return ImportResponse
     */
    public function ImportToken($oauth_token, $uid, $optParams = array()) {
      $params = array('oauth_token' => $oauth_token, 'uid' => $uid);
      $params = array_merge($params, $optParams);
      $data = $this->__call('ImportToken', array($params));
      if ($this->useObjects()) {
        return new ImportResponse($data);
      } else {
        return $data;
      }
    }
    /**
     * Request Whit.li to refresh data associated with a given uid and oauth_token pair. (User.Populate)
     *
     * @param int $uid The ID of the user.
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string format You can select between json, xml, csv, php and serialized response formats.
     * @return PopulateResponse
     */
    public function Populate($uid, $optParams = array()) {
      $params = array('uid' => $uid);
      $params = array_merge($params, $optParams);
      $data = $this->__call('Populate', array($params));
      if ($this->useObjects()) {
        return new PopulateResponse($data);
      } else {
        return $data;
      }
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
     * @return CompareResponse
     */
    public function Compare($context_id, $uid2, $uid1, $optParams = array()) {
      $params = array('context_id' => $context_id, 'uid2' => $uid2, 'uid1' => $uid1);
      $params = array_merge($params, $optParams);
      $data = $this->__call('Compare', array($params));
      if ($this->useObjects()) {
        return new CompareResponse($data);
      } else {
        return $data;
      }
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
     * @return KeyResponse
     */
    public function Get($key_id, $uid, $optParams = array()) {
      $params = array('key_id' => $key_id, 'uid' => $uid);
      $params = array_merge($params, $optParams);
      $data = $this->__call('Get', array($params));
      if ($this->useObjects()) {
        return new KeyResponse($data);
      } else {
        return $data;
      }
    }
  }



/**
 * Service definition for Whitliapi (1.0).
 *
 * <p>
 * 
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
    $this->User = new UserServiceResource($this, $this->serviceName, 'User', json_decode('{"methods": {"ImportGeneric": {"parameters": {"format": {"required": false, "default": "json", "enum": ["json", "xml", "csv", "php"], "location": "query", "type": "string"}}, "request": {"type": "string"}, "id": "User.importGeneric", "httpMethod": "PUT", "path": "user/importGeneric", "response": {"$ref": "importResponse"}}, "ImportToken": {"parameters": {"oauth_token": {"default": "", "required": true, "type": "string", "location": "query"}, "uid": {"default": "", "required": true, "type": "integer", "location": "query"}, "format": {"required": false, "default": "json", "enum": ["json", "xml", "csv", "php"], "location": "query", "type": "string"}}, "response": {"$ref": "importResponse"}, "httpMethod": "POST", "path": "user/importToken", "id": "User.ImportToken"}, "Populate": {"parameters": {"uid": {"default": "", "required": true, "type": "integer", "location": "query"}, "format": {"required": false, "default": "json", "enum": ["json", "xml", "csv", "php"], "location": "query", "type": "string"}}, "response": {"$ref": "populateResponse"}, "httpMethod": "GET", "path": "user/populate", "id": "User.Populate"}}}', true));
    $this->Key = new KeyServiceResource($this, $this->serviceName, 'Key', json_decode('{"methods": {"Compare": {"parameters": {"context_id": {"default": "100", "required": true, "type": "integer", "location": "query"}, "schema": {"default": "fb", "required": false, "type": "string", "location": "query"}, "uid2": {"default": "", "required": true, "type": "integer", "location": "query"}, "uid1": {"default": "", "required": true, "type": "integer", "location": "query"}, "format": {"required": false, "default": "json", "enum": ["json", "xml", "csv", "php"], "location": "query", "type": "string"}}, "response": {"$ref": "compareResponse"}, "httpMethod": "GET", "path": "key/compare", "id": "Key.Compare"}, "Get": {"parameters": {"key_id": {"default": "1", "required": true, "type": "integer", "location": "query"}, "schema": {"default": "fb", "required": false, "type": "string", "location": "query"}, "uid": {"default": "", "required": true, "type": "integer", "location": "query"}, "format": {"required": false, "default": "json", "enum": ["json", "xml", "csv", "php"], "location": "query", "type": "string"}}, "response": {"$ref": "keyResponse"}, "httpMethod": "GET", "path": "key/get", "id": "Key.Get"}}}', true));
  }
}

class CommonLikesObject extends apiModel {
  public $commonality;
  public $type;
  public $id;
  public $name;
  public function setCommonality($commonality) {
    $this->commonality = $commonality;
  }
  public function getCommonality() {
    return $this->commonality;
  }
  public function setType($type) {
    $this->type = $type;
  }
  public function getType() {
    return $this->type;
  }
  public function setId($id) {
    $this->id = $id;
  }
  public function getId() {
    return $this->id;
  }
  public function setName($name) {
    $this->name = $name;
  }
  public function getName() {
    return $this->name;
  }
}

class CompareResponse extends apiModel {
  public $status;
  protected $__bodyType = 'CompareResponseBody';
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
  public function setBody(CompareResponseBody $body) {
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

class CompareResponseBody extends apiModel {
  public $code;
  public $score;
  protected $__common_likesType = 'CommonLikesObject';
  protected $__common_likesDataType = 'array';
  public $common_likes;
  public function setCode($code) {
    $this->code = $code;
  }
  public function getCode() {
    return $this->code;
  }
  public function setScore($score) {
    $this->score = $score;
  }
  public function getScore() {
    return $this->score;
  }
  public function setCommon_likes(/* array(CommonLikesObject) */ $common_likes) {
    $this->assertIsArray($common_likes, CommonLikesObject, __METHOD__);
    $this->common_likes = $common_likes;
  }
  public function getCommon_likes() {
    return $this->common_likes;
  }
}

class ImportResponse extends apiModel {
  public $status;
  protected $__bodyType = 'ImportResponseBody';
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
  public function setBody(ImportResponseBody $body) {
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

class ImportResponseBody extends apiModel {
  public $postsCount;
  public $userFields;
  public $likesCount;
  public function setPostsCount($postsCount) {
    $this->postsCount = $postsCount;
  }
  public function getPostsCount() {
    return $this->postsCount;
  }
  public function setUserFields($userFields) {
    $this->userFields = $userFields;
  }
  public function getUserFields() {
    return $this->userFields;
  }
  public function setLikesCount($likesCount) {
    $this->likesCount = $likesCount;
  }
  public function getLikesCount() {
    return $this->likesCount;
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

class PopulateResponse extends apiModel {
  public $status;
  protected $__bodyType = 'PopulateResponseBody';
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
  public function setBody(PopulateResponseBody $body) {
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

class PopulateResponseBody extends apiModel {
  public $errorString;
  public $uid;
  public $oauthtoken;
  public function setErrorString($errorString) {
    $this->errorString = $errorString;
  }
  public function getErrorString() {
    return $this->errorString;
  }
  public function setUid($uid) {
    $this->uid = $uid;
  }
  public function getUid() {
    return $this->uid;
  }
  public function setOauthtoken($oauthtoken) {
    $this->oauthtoken = $oauthtoken;
  }
  public function getOauthtoken() {
    return $this->oauthtoken;
  }
}
