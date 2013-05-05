<?php
/**
 * @file
 * features_template.features.inc
 */

/**
 * Implements hook_default_pet().
 */
function features_template_default_pet() {
  $items = array();
  $items['notify_admin_when_new_picture'] = entity_import('pet', '{
    "name" : "notify_admin_when_new_picture",
    "title" : "notify_admin_when_new_picture",
    "subject" : "New Picture Posted",
    "mail_body" : "Hi [user:name],\\u000D\\u000A    New Picture posted at [current-date:short]. \\u000D\\u000A\\u000D\\u000A    Please  click [node:url] to check and push.\\u000D\\u000A\\u000D\\u000ACheers",
    "mail_body_plain" : null,
    "send_plain" : "0",
    "from_override" : "",
    "cc_default" : "",
    "bcc_default" : "",
    "recipient_callback" : "",
    "rdf_mapping" : [  ]
  }');
  $items['notify_admin_when_picture_publish'] = entity_import('pet', '{
    "name" : "notify_admin_when_picture_publish",
    "title" : "notify_admin_when_picture_publish",
    "subject" : "Your Picture [node:title] Was Published Just Now",
    "mail_body" : "Hi [user:name],\\u000D\\u000A    Congratulations, \\u000D\\u000A\\u000D\\u000A    You picture named [node:title] is published on [site:name].\\u000D\\u000A\\u000D\\u000A    Cheers",
    "mail_body_plain" : null,
    "send_plain" : "0",
    "from_override" : "",
    "cc_default" : "",
    "bcc_default" : "",
    "recipient_callback" : "",
    "rdf_mapping" : [  ]
  }');
  $items['notify_user_when_picture_be_liked'] = entity_import('pet', '{
    "name" : "notify_user_when_picture_be_liked",
    "title" : "notify_user_when_picture_be_liked",
    "subject" : "Your Picture [node:title] Be Liked",
    "mail_body" : "Hi ,\\u000D\\u000A\\u000D\\u000A Picture be liked.",
    "mail_body_plain" : null,
    "send_plain" : "0",
    "from_override" : "",
    "cc_default" : "",
    "bcc_default" : "",
    "recipient_callback" : "",
    "rdf_mapping" : [  ]
  }');
  return $items;
}
