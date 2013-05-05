<?php
/**
 * @file
 * features_people.services.inc
 */

/**
 * Implements hook_default_services_endpoint().
 */
function features_people_default_services_endpoint() {
  $export = array();

  $endpoint = new stdClass();
  $endpoint->disabled = FALSE; /* Edit this to true to make a default endpoint disabled initially */
  $endpoint->api_version = 3;
  $endpoint->name = 'superboomi_service';
  $endpoint->server = 'rest_server';
  $endpoint->path = 'superboomi_service';
  $endpoint->authentication = array();
  $endpoint->server_settings = array(
    'formatters' => array(
      'json' => TRUE,
      'bencode' => FALSE,
      'jsonp' => FALSE,
      'php' => FALSE,
      'rss' => FALSE,
      'xml' => FALSE,
    ),
    'parsers' => array(
      'application/json' => TRUE,
      'application/x-www-form-urlencoded' => TRUE,
      'multipart/form-data' => TRUE,
      'application/vnd.php.serialized' => FALSE,
      'application/xml' => FALSE,
      'text/xml' => FALSE,
    ),
  );
  $endpoint->resources = array(
    'user' => array(
      'actions' => array(
        'simple_register' => array(
          'enabled' => '1',
        ),
      ),
    ),
    'node' => array(
      'actions' => array(
        'simple_create' => array(
          'enabled' => '1',
        ),
        'simple_retrieve' => array(
          'enabled' => '1',
        ),
      ),
    ),
  );
  $endpoint->debug = 0;
  $export['superboomi_service'] = $endpoint;

  return $export;
}
