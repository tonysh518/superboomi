<?php
/**
 * @file
 * features_people.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function features_people_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "services" && $api == "services") {
    return array("version" => "3");
  }
}

/**
 * Implements hook_default_pet().
 */
function features_people_default_pet() {
  $items = array();
  $items['notify_admin_when_new_picture'] = entity_import('pet', '{
    "name" : "notify_admin_when_new_picture",
    "title" : "notify_admin_when_new_picture",
    "subject" : "New Picture Posted",
    "mail_body" : "Hi [user:name],\\r\\n\\r\\n New Picture posted at [current-date:short]. Please  click [node:url] to check and push.",
    "mail_body_plain" : null,
    "send_plain" : "0",
    "from_override" : "",
    "cc_default" : "",
    "bcc_default" : "",
    "recipient_callback" : "",
    "rdf_mapping" : []
  }');
  $items['notify_admin_when_picture_publish'] = entity_import('pet', '{
    "name" : "notify_admin_when_picture_publish",
    "title" : "notify_admin_when_picture_publish",
    "subject" : "Your Picture [node:title] Was Published Just Now",
    "mail_body" : "Hi [user:name],\\r\\n  Congratulations, You picture named [node:title] is published on [site:name].\\r\\n\\r\\nCheers.",
    "mail_body_plain" : null,
    "send_plain" : "0",
    "from_override" : "",
    "cc_default" : "",
    "bcc_default" : "",
    "recipient_callback" : "",
    "rdf_mapping" : []
  }');
  return $items;
}
