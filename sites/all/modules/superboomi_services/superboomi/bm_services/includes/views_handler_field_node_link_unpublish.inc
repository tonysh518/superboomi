<?php

/**
 * @file
 * Definition of views_handler_field_node_link_publish_unpublish.
 */

/**
 * Field handler to present a link to publish/unpublish a node.
 *
 * @ingroup bm_services_views_field_handlers
 */
class views_handler_field_node_link_unpublish extends views_handler_field_node_link {

  /**
   * Renders the link.
   */
  function render_link($node, $values) {
    // Ensure user has access to delete this node.
    if (!node_access('unpublish node', $node)) {
      //return;
    }

    $this->options['alter']['make_link'] = TRUE;
    $this->options['alter']['path'] = "node/$node->nid/unpublish";
    $this->options['alter']['query'] = drupal_get_destination();

    $text = !empty($this->options['text']) ? $this->options['text'] : t('unpublish');
    return $text;
  }
}
