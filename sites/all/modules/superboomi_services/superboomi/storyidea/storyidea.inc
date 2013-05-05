<?php
// note_service.inc
/**
* Callback for creating note services.
*
* @param object $data
* @return object
*/
function _storyidea_create($_node) {
  if(!isset($_node) || empty($_node['body']))
  {
      return services_error('Missing content', 406);
  }
  global $user;
  global $language;
  $node = new stdClass(); 
  $node->title = "A story idea from " . $user->name;
  $node->uid = $user->uid;
  $node->type = "storyidea";
  $node->language = $language->language;
  $node->body[LANGUAGE_NONE][0]['value']   = $_node['body'];
  $node->body[LANGUAGE_NONE][0]['summary'] = text_summary($_node['body']);
  $node->body[LANGUAGE_NONE][0]['format']  = 'filtered_html';
  $node->status = 0;
  node_save($node);
  return (object)array(
    'nid' => $node->nid,
  );
}


/**
* Access callback for the note service.
*
* @param string $op
*  The operation that's going to be performed.
* @param array $args
*  The arguments that will be passed to the callback.
* @return bool
*  Whether access is given or not.
*/

function _storyidea_access($op, $args) {
  global $user;
  $access = FALSE;

  switch ($op) {
    
    case 'create':
      $access = user_access('story idea service create');
      user_access('story idea service create');
      break;
  }
  
  return $access;
}
?>