<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.7                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2015                                |
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
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2015
 *
 * Generated from xml/schema/CRM/Mailing/MailingAB.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_Mailing_DAO_MailingAB extends CRM_Core_DAO
{
  /**
   * static instance to hold the table name
   *
   * @var string
   */
  static $_tableName = 'civicrm_mailing_abtest';
  /**
   * static instance to hold the field values
   *
   * @var array
   */
  static $_fields = null;
  /**
   * static instance to hold the keys used in $_fields for each field.
   *
   * @var array
   */
  static $_fieldKeys = null;
  /**
   * static instance to hold the FK relationships
   *
   * @var string
   */
  static $_links = null;
  /**
   * static instance to hold the values that can
   * be imported
   *
   * @var array
   */
  static $_import = null;
  /**
   * static instance to hold the values that can
   * be exported
   *
   * @var array
   */
  static $_export = null;
  /**
   * static value to see if we should log any modifications to
   * this table in the civicrm_log table
   *
   * @var boolean
   */
  static $_log = false;
  /**
   *
   * @var int unsigned
   */
  public $id;
  /**
   * Name of the A/B test
   *
   * @var string
   */
  public $name;
  /**
   * Status
   *
   * @var string
   */
  public $status;
  /**
   * The first experimental mailing ("A" condition)
   *
   * @var int unsigned
   */
  public $mailing_id_a;
  /**
   * The second experimental mailing ("B" condition)
   *
   * @var int unsigned
   */
  public $mailing_id_b;
  /**
   * The final, general mailing (derived from A or B)
   *
   * @var int unsigned
   */
  public $mailing_id_c;
  /**
   * Which site is this mailing for
   *
   * @var int unsigned
   */
  public $domain_id;
  /**
   *
   * @var string
   */
  public $testing_criteria;
  /**
   *
   * @var string
   */
  public $winner_criteria;
  /**
   * What specific url to track
   *
   * @var string
   */
  public $specific_url;
  /**
   * In how much time to declare winner
   *
   * @var datetime
   */
  public $declare_winning_time;
  /**
   *
   * @var int unsigned
   */
  public $group_percentage;
  /**
   * FK to Contact ID
   *
   * @var int unsigned
   */
  public $created_id;
  /**
   * When was this item created
   *
   * @var datetime
   */
  public $created_date;
  /**
   * class constructor
   *
   * @return civicrm_mailing_abtest
   */
  function __construct()
  {
    $this->__table = 'civicrm_mailing_abtest';
    parent::__construct();
  }
  /**
   * Returns foreign keys and entity references
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  static function getReferenceColumns()
  {
    if (!self::$_links) {
      self::$_links = static ::createReferenceColumns(__CLASS__);
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'created_id', 'civicrm_contact', 'id');
    }
    return self::$_links;
  }
  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  static function &fields()
  {
    if (!(self::$_fields)) {
      self::$_fields = array(
        'id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('MailingAB ID') ,
          'required' => true,
        ) ,
        'name' => array(
          'name' => 'name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Name') ,
          'description' => 'Name of the A/B test',
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'status' => array(
          'name' => 'status',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Status') ,
          'description' => 'Status',
          'maxlength' => 32,
          'size' => CRM_Utils_Type::MEDIUM,
          'pseudoconstant' => array(
            'callback' => 'CRM_Mailing_PseudoConstant::abStatus',
          )
        ) ,
        'mailing_id_a' => array(
          'name' => 'mailing_id_a',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Mailing ID (A)') ,
          'description' => 'The first experimental mailing ("A" condition)',
        ) ,
        'mailing_id_b' => array(
          'name' => 'mailing_id_b',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Mailing ID (B)') ,
          'description' => 'The second experimental mailing ("B" condition)',
        ) ,
        'mailing_id_c' => array(
          'name' => 'mailing_id_c',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Mailing ID (C)') ,
          'description' => 'The final, general mailing (derived from A or B)',
        ) ,
        'domain_id' => array(
          'name' => 'domain_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Domain ID') ,
          'description' => 'Which site is this mailing for',
        ) ,
        'testing_criteria' => array(
          'name' => 'testing_criteria',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Testing Criteria') ,
          'maxlength' => 32,
          'size' => CRM_Utils_Type::MEDIUM,
          'pseudoconstant' => array(
            'callback' => 'CRM_Mailing_PseudoConstant::abTestCriteria',
          )
        ) ,
        'winner_criteria' => array(
          'name' => 'winner_criteria',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Winner Criteria') ,
          'maxlength' => 32,
          'size' => CRM_Utils_Type::MEDIUM,
          'pseudoconstant' => array(
            'callback' => 'CRM_Mailing_PseudoConstant::abWinnerCriteria',
          )
        ) ,
        'specific_url' => array(
          'name' => 'specific_url',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('URL for Winner Criteria') ,
          'description' => 'What specific url to track',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'declare_winning_time' => array(
          'name' => 'declare_winning_time',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Declaration Time') ,
          'description' => 'In how much time to declare winner',
        ) ,
        'group_percentage' => array(
          'name' => 'group_percentage',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Group Percentage') ,
        ) ,
        'created_id' => array(
          'name' => 'created_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('AB Test Created By') ,
          'description' => 'FK to Contact ID',
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ) ,
        'created_date' => array(
          'name' => 'created_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('AB Test Created Date') ,
          'description' => 'When was this item created',
          'html' => array(
            'type' => 'Select Date',
          ) ,
        ) ,
      );
    }
    return self::$_fields;
  }
  /**
   * Returns an array containing, for each field, the arary key used for that
   * field in self::$_fields.
   *
   * @return array
   */
  static function &fieldKeys()
  {
    if (!(self::$_fieldKeys)) {
      self::$_fieldKeys = array(
        'id' => 'id',
        'name' => 'name',
        'status' => 'status',
        'mailing_id_a' => 'mailing_id_a',
        'mailing_id_b' => 'mailing_id_b',
        'mailing_id_c' => 'mailing_id_c',
        'domain_id' => 'domain_id',
        'testing_criteria' => 'testing_criteria',
        'winner_criteria' => 'winner_criteria',
        'specific_url' => 'specific_url',
        'declare_winning_time' => 'declare_winning_time',
        'group_percentage' => 'group_percentage',
        'created_id' => 'created_id',
        'created_date' => 'created_date',
      );
    }
    return self::$_fieldKeys;
  }
  /**
   * Returns the names of this table
   *
   * @return string
   */
  static function getTableName()
  {
    return self::$_tableName;
  }
  /**
   * Returns if this table needs to be logged
   *
   * @return boolean
   */
  function getLog()
  {
    return self::$_log;
  }
  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &import($prefix = false)
  {
    if (!(self::$_import)) {
      self::$_import = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('import', $field)) {
          if ($prefix) {
            self::$_import['mailing_abtest'] = & $fields[$name];
          } else {
            self::$_import[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_import;
  }
  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &export($prefix = false)
  {
    if (!(self::$_export)) {
      self::$_export = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('export', $field)) {
          if ($prefix) {
            self::$_export['mailing_abtest'] = & $fields[$name];
          } else {
            self::$_export[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_export;
  }
}
