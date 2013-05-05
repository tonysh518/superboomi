<?php

/**
 * Implements hook_views_data().
 */
function bm_services_views_data_alter(&$data) {
    // publish
    $data['node']['publish'] = array(
        'title' => t('Publish Link'),
        'help' => t('Publish node.'),
        'field' => array(
            'handler' => 'views_handler_field_node_link_publish',
        )
    );

    // unpublish
    $data['node']['unpublish'] = array(
        'title' => t('Unpublish Link'),
        'help' => t('Unpublish node.'),
        'field' => array(
            'handler' => 'views_handler_field_node_link_unpublish',
        )
    );
}