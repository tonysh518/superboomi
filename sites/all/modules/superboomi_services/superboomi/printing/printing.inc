<?php
// note_service.inc
/**
* Callback for creating printing services.
*
* @param object $data
* @return object
*/
function _printing_create($_node) {
    if (!isset($_FILES['field_image']) && FALSE) {
        return bm_services_error(t('Image should not empty'), 406);
    }
    else {
            list($files, $file_objs) = _node_resource_simple_file_save_upload("printing", "field_image");
    }
    global $user;
    $file = $files[0];
    $node = new stdClass(); 
    $node->title = "A printing from " . $user->name;
    $node->uid = $user->uid;
    $node->type = "printing";
    $node->language = LANGUAGE_NONE;
    $node->field_image[LANGUAGE_NONE][0] = $file;
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

function _printing_access($op, $args) {
  global $user;
  $access = FALSE;

  switch ($op) {
    
    case 'create':
      $access = user_access('printing service create');
      user_access('printing service create');
      break;
  }
  
  return $access;
}
?>