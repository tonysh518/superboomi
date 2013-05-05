<?php
/**
 * @file
 * features_picture.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function features_picture_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'user_pictures';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'user_pictures';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'user_pictures';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '5';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Field: Content: boomi_image */
  $handler->display->display_options['fields']['field_boomi_image']['id'] = 'field_boomi_image';
  $handler->display->display_options['fields']['field_boomi_image']['table'] = 'field_data_field_boomi_image';
  $handler->display->display_options['fields']['field_boomi_image']['field'] = 'field_boomi_image';
  $handler->display->display_options['fields']['field_boomi_image']['label'] = '';
  $handler->display->display_options['fields']['field_boomi_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_boomi_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_boomi_image']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = '1';
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'picture' => 'picture',
  );

  /* Display: services_block */
  $handler = $view->new_display('block', 'services_block', 'block');
  $handler->display->display_options['display_description'] = '在services API 会调用到';
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;

  /* Display: User's pictures */
  $handler = $view->new_display('page', 'User\'s pictures', 'page_1');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Field: Content: boomi_image */
  $handler->display->display_options['fields']['field_boomi_image']['id'] = 'field_boomi_image';
  $handler->display->display_options['fields']['field_boomi_image']['table'] = 'field_data_field_boomi_image';
  $handler->display->display_options['fields']['field_boomi_image']['field'] = 'field_boomi_image';
  $handler->display->display_options['fields']['field_boomi_image']['label'] = '';
  $handler->display->display_options['fields']['field_boomi_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_boomi_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_boomi_image']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Field: Content: Unpublish Link */
  $handler->display->display_options['fields']['unpublish']['id'] = 'unpublish';
  $handler->display->display_options['fields']['unpublish']['table'] = 'node';
  $handler->display->display_options['fields']['unpublish']['field'] = 'unpublish';
  $handler->display->display_options['fields']['unpublish']['label'] = '';
  $handler->display->display_options['fields']['unpublish']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['unpublish']['text'] = 'Delete';
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: Content: Author uid */
  $handler->display->display_options['arguments']['uid']['id'] = 'uid';
  $handler->display->display_options['arguments']['uid']['table'] = 'node';
  $handler->display->display_options['arguments']['uid']['field'] = 'uid';
  $handler->display->display_options['arguments']['uid']['default_action'] = 'default';
  $handler->display->display_options['arguments']['uid']['default_argument_type'] = 'user';
  $handler->display->display_options['arguments']['uid']['default_argument_options']['user'] = FALSE;
  $handler->display->display_options['arguments']['uid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['uid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['uid']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = '1';
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'picture' => 'picture',
  );
  $handler->display->display_options['path'] = 'user/%/pictures';
  $export['user_pictures'] = $view;

  return $export;
}
