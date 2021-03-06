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
 * Generated from xml/schema/CRM/Financial/PaymentProcessor.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_Financial_DAO_PaymentProcessor extends CRM_Core_DAO
{
  /**
   * static instance to hold the table name
   *
   * @var string
   */
  static $_tableName = 'civicrm_payment_processor';
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
   * Payment Processor ID
   *
   * @var int unsigned
   */
  public $id;
  /**
   * Which Domain is this match entry for
   *
   * @var int unsigned
   */
  public $domain_id;
  /**
   * Payment Processor Name.
   *
   * @var string
   */
  public $name;
  /**
   * Payment Processor Description.
   *
   * @var string
   */
  public $description;
  /**
   *
   * @var int unsigned
   */
  public $payment_processor_type_id;
  /**
   * Is this processor active?
   *
   * @var boolean
   */
  public $is_active;
  /**
   * Is this processor the default?
   *
   * @var boolean
   */
  public $is_default;
  /**
   * Is this processor for a test site?
   *
   * @var boolean
   */
  public $is_test;
  /**
   *
   * @var string
   */
  public $user_name;
  /**
   *
   * @var string
   */
  public $password;
  /**
   *
   * @var text
   */
  public $signature;
  /**
   *
   * @var string
   */
  public $url_site;
  /**
   *
   * @var string
   */
  public $url_api;
  /**
   *
   * @var string
   */
  public $url_recur;
  /**
   *
   * @var string
   */
  public $url_button;
  /**
   *
   * @var string
   */
  public $subject;
  /**
   *
   * @var string
   */
  public $class_name;
  /**
   * Billing Mode (deprecated)
   *
   * @var int unsigned
   */
  public $billing_mode;
  /**
   * Can process recurring contributions
   *
   * @var boolean
   */
  public $is_recur;
  /**
   * Payment Type: Credit or Debit (deprecated)
   *
   * @var int unsigned
   */
  public $payment_type;
  /**
   * Payment Instrument ID
   *
   * @var int unsigned
   */
  public $payment_instrument_id;
  /**
   * class constructor
   *
   * @return civicrm_payment_processor
   */
  function __construct()
  {
    $this->__table = 'civicrm_payment_processor';
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
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'domain_id', 'civicrm_domain', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'payment_processor_type_id', 'civicrm_payment_processor_type', 'id');
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
          'title' => ts('Payment Processor ID') ,
          'description' => 'Payment Processor ID',
          'required' => true,
        ) ,
        'domain_id' => array(
          'name' => 'domain_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Payment Processor Domain') ,
          'description' => 'Which Domain is this match entry for',
          'required' => true,
          'FKClassName' => 'CRM_Core_DAO_Domain',
          'pseudoconstant' => array(
            'table' => 'civicrm_domain',
            'keyColumn' => 'id',
            'labelColumn' => 'name',
          )
        ) ,
        'name' => array(
          'name' => 'name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Payment Processor') ,
          'description' => 'Payment Processor Name.',
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
        ) ,
        'description' => array(
          'name' => 'description',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Processor Description') ,
          'description' => 'Payment Processor Description.',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'payment_processor_type_id' => array(
          'name' => 'payment_processor_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Payment Processor Type ID') ,
          'FKClassName' => 'CRM_Financial_DAO_PaymentProcessorType',
          'pseudoconstant' => array(
            'table' => 'civicrm_payment_processor_type',
            'keyColumn' => 'id',
            'labelColumn' => 'title',
          )
        ) ,
        'is_active' => array(
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Processor is Active?') ,
          'description' => 'Is this processor active?',
        ) ,
        'is_default' => array(
          'name' => 'is_default',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Processor Is Default?') ,
          'description' => 'Is this processor the default?',
        ) ,
        'is_test' => array(
          'name' => 'is_test',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Is Test Processor?') ,
          'description' => 'Is this processor for a test site?',
        ) ,
        'user_name' => array(
          'name' => 'user_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('User Name') ,
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'password' => array(
          'name' => 'password',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Password') ,
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'signature' => array(
          'name' => 'signature',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Signature') ,
        ) ,
        'url_site' => array(
          'name' => 'url_site',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Site URL') ,
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'url_api' => array(
          'name' => 'url_api',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('API URL') ,
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'url_recur' => array(
          'name' => 'url_recur',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Recurring Payments URL') ,
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'url_button' => array(
          'name' => 'url_button',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Button URL') ,
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'subject' => array(
          'name' => 'subject',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Subject') ,
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'class_name' => array(
          'name' => 'class_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Suffix for PHP class name implementation') ,
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'billing_mode' => array(
          'name' => 'billing_mode',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Processor Billing Mode') ,
          'description' => 'Billing Mode (deprecated)',
          'required' => true,
        ) ,
        'is_recur' => array(
          'name' => 'is_recur',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Processor Supports Recurring?') ,
          'description' => 'Can process recurring contributions',
        ) ,
        'payment_type' => array(
          'name' => 'payment_type',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Payment Type') ,
          'description' => 'Payment Type: Credit or Debit (deprecated)',
          'default' => '1',
        ) ,
        'payment_instrument_id' => array(
          'name' => 'payment_instrument_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Payment Method') ,
          'description' => 'Payment Instrument ID',
          'default' => '1',
          'pseudoconstant' => array(
            'optionGroupName' => 'payment_instrument',
            'optionEditPath' => 'civicrm/admin/options/payment_instrument',
          )
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
        'domain_id' => 'domain_id',
        'name' => 'name',
        'description' => 'description',
        'payment_processor_type_id' => 'payment_processor_type_id',
        'is_active' => 'is_active',
        'is_default' => 'is_default',
        'is_test' => 'is_test',
        'user_name' => 'user_name',
        'password' => 'password',
        'signature' => 'signature',
        'url_site' => 'url_site',
        'url_api' => 'url_api',
        'url_recur' => 'url_recur',
        'url_button' => 'url_button',
        'subject' => 'subject',
        'class_name' => 'class_name',
        'billing_mode' => 'billing_mode',
        'is_recur' => 'is_recur',
        'payment_type' => 'payment_type',
        'payment_instrument_id' => 'payment_instrument_id',
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
            self::$_import['payment_processor'] = & $fields[$name];
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
            self::$_export['payment_processor'] = & $fields[$name];
          } else {
            self::$_export[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_export;
  }
}
