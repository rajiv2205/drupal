<?php

/*
 +--------------------------------------------------------------------+
 | CiviCRM version 4.7                                                |
 +--------------------------------------------------------------------+
 | This file is a part of CiviCRM.                                    |
 |                                                                    |
 | CiviCRM is free software; you can copy, modify, and distribute it  |
 | under the terms of the GNU Affero General Public License           |
 | Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
 |                                                                    |
 | CiviCRM is distributed in the hope that it will be useful, but     |
 | WITHOUT ANY WARRANTY; without even the implied warranty of         |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
 | See the GNU Affero General Public License for more details.        |
 |                                                                    |
 | You should have received a copy of the GNU Affero General Public   |
 | License and the CiviCRM Licensing Exception along                  |
 | with this program; if not, contact CiviCRM LLC                     |
 | at info[AT]civicrm[DOT]org. If you have questions about the        |
 | GNU Affero General Public License or the licensing of CiviCRM,     |
 | see the CiviCRM license FAQ at http://civicrm.org/licensing        |
 +--------------------------------------------------------------------+
*/

/**
 * @file
 * Contains a plugin to extract CiviCRM IDs from the URL.
 */

class civicrm_plugin_argument_default_civicrm_id extends views_plugin_argument_default {

  /**
   * List the options relevant for this plugin.
   */
  function option_definition() {
    $options = parent::option_definition();
    $options['id_type'] = array('default' => 'Contact');
    return $options;
  }

  /**
   * Provide the default form for setting options.
   */
  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);
    $form['id_type'] = array(
      '#type' => 'select',
      '#title' => t('CiviCRM ID type'),
      '#description' => t('Select the entity type of the ID to extract from the URL'),
      '#options' => array(
        'Contact' => t('Contact'),
      ),
      '#default_value' => $this->options['id_type'],
      '#required' => TRUE,
    );
  }

  /**
   * Get the default argument.
   */
  function get_argument() {
    
    // Contact ID is set using the URL parameter 'cid'
    if ($this->options['id_type'] == 'Contact') {
      // Check that we are on a Contact entity
      if (!empty($_GET['cid']) ) {
        if (is_numeric($_GET['cid'])) {        
          return $_GET['cid'];
        }
      }  
    }

  }
  
}
