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
 * Generated from xml/schema/CRM/Financial/FinancialTrxn.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_Financial_DAO_FinancialTrxn extends CRM_Core_DAO
{
  /**
   * static instance to hold the table name
   *
   * @var string
   */
  static $_tableName = 'civicrm_financial_trxn';
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
  static $_log = true;
  /**
   *
   * @var int unsigned
   */
  public $id;
  /**
   * FK to financial_account table.
   *
   * @var int unsigned
   */
  public $from_financial_account_id;
  /**
   * FK to financial_financial_account table.
   *
   * @var int unsigned
   */
  public $to_financial_account_id;
  /**
   * date transaction occurred
   *
   * @var datetime
   */
  public $trxn_date;
  /**
   * amount of transaction
   *
   * @var float
   */
  public $total_amount;
  /**
   * actual processor fee if known - may be 0.
   *
   * @var float
   */
  public $fee_amount;
  /**
   * actual funds transfer amount. total less fees. if processor does not report actual fee during transaction, this is set to total_amount.
   *
   * @var float
   */
  public $net_amount;
  /**
   * 3 character string, value from config setting or input via user.
   *
   * @var string
   */
  public $currency;
  /**
   * Is this entry either a payment or a reversal of a payment?
   *
   * @var boolean
   */
  public $is_payment;
  /**
   * Transaction id supplied by external processor. This may not be unique.
   *
   * @var string
   */
  public $trxn_id;
  /**
   * processor result code
   *
   * @var string
   */
  public $trxn_result_code;
  /**
   * pseudo FK to civicrm_option_value of contribution_status_id option_group
   *
   * @var int unsigned
   */
  public $status_id;
  /**
   * Payment Processor for this financial transaction
   *
   * @var int unsigned
   */
  public $payment_processor_id;
  /**
   * FK to payment_instrument option group values
   *
   * @var int unsigned
   */
  public $payment_instrument_id;
  /**
   * Check number
   *
   * @var string
   */
  public $check_number;
  /**
   * class constructor
   *
   * @return civicrm_financial_trxn
   */
  function __construct()
  {
    $this->__table = 'civicrm_financial_trxn';
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
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'from_financial_account_id', 'civicrm_financial_account', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'to_financial_account_id', 'civicrm_financial_account', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'payment_processor_id', 'civicrm_payment_processor', 'id');
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
          'title' => ts('Financial Transaction ID') ,
          'required' => true,
        ) ,
        'from_financial_account_id' => array(
          'name' => 'from_financial_account_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Financial Transaction From Account') ,
          'description' => 'FK to financial_account table.',
          'FKClassName' => 'CRM_Financial_DAO_FinancialAccount',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'table' => 'civicrm_financial_account',
            'keyColumn' => 'id',
            'labelColumn' => 'name',
          )
        ) ,
        'to_financial_account_id' => array(
          'name' => 'to_financial_account_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Financial Transaction To Account') ,
          'description' => 'FK to financial_financial_account table.',
          'FKClassName' => 'CRM_Financial_DAO_FinancialAccount',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'table' => 'civicrm_financial_account',
            'keyColumn' => 'id',
            'labelColumn' => 'name',
          )
        ) ,
        'trxn_date' => array(
          'name' => 'trxn_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Financial Transaction Date') ,
          'description' => 'date transaction occurred',
          'default' => 'NULL',
        ) ,
        'total_amount' => array(
          'name' => 'total_amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Financial Total Amount') ,
          'description' => 'amount of transaction',
          'required' => true,
          'precision' => array(
            20,
            2
          ) ,
        ) ,
        'fee_amount' => array(
          'name' => 'fee_amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Financial Fee Amount') ,
          'description' => 'actual processor fee if known - may be 0.',
          'precision' => array(
            20,
            2
          ) ,
        ) ,
        'net_amount' => array(
          'name' => 'net_amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Financial Net Amount') ,
          'description' => 'actual funds transfer amount. total less fees. if processor does not report actual fee during transaction, this is set to total_amount.',
          'precision' => array(
            20,
            2
          ) ,
        ) ,
        'currency' => array(
          'name' => 'currency',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Financial Currency') ,
          'description' => '3 character string, value from config setting or input via user.',
          'maxlength' => 3,
          'size' => CRM_Utils_Type::FOUR,
          'import' => true,
          'where' => 'civicrm_financial_trxn.currency',
          'headerPattern' => '/cur(rency)?/i',
          'dataPattern' => '/^[A-Z]{3}$/',
          'export' => true,
          'default' => 'NULL',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'table' => 'civicrm_currency',
            'keyColumn' => 'name',
            'labelColumn' => 'full_name',
            'nameColumn' => 'numeric_code',
          )
        ) ,
        'is_payment' => array(
          'name' => 'is_payment',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Is Payment?') ,
          'description' => 'Is this entry either a payment or a reversal of a payment?',
          'import' => true,
          'where' => 'civicrm_financial_trxn.is_payment',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'trxn_id' => array(
          'name' => 'trxn_id',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Transaction ID') ,
          'description' => 'Transaction id supplied by external processor. This may not be unique.',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'trxn_result_code' => array(
          'name' => 'trxn_result_code',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Transaction result Code') ,
          'description' => 'processor result code',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'status_id' => array(
          'name' => 'status_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Financial Transaction Status Id') ,
          'description' => 'pseudo FK to civicrm_option_value of contribution_status_id option_group',
          'import' => true,
          'where' => 'civicrm_financial_trxn.status_id',
          'headerPattern' => '/status/i',
          'dataPattern' => '',
          'export' => true,
          'pseudoconstant' => array(
            'optionGroupName' => 'contribution_status',
            'optionEditPath' => 'civicrm/admin/options/contribution_status',
          )
        ) ,
        'payment_processor_id' => array(
          'name' => 'payment_processor_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Payment Processor') ,
          'description' => 'Payment Processor for this financial transaction',
          'FKClassName' => 'CRM_Financial_DAO_PaymentProcessor',
        ) ,
        'financial_trxn_payment_instrument_id' => array(
          'name' => 'payment_instrument_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Payment Method') ,
          'description' => 'FK to payment_instrument option group values',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'optionGroupName' => 'payment_instrument',
            'optionEditPath' => 'civicrm/admin/options/payment_instrument',
          )
        ) ,
        'financial_trxn_check_number' => array(
          'name' => 'check_number',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Check Number') ,
          'description' => 'Check number',
          'maxlength' => 255,
          'size' => 6,
          'html' => array(
            'type' => 'Text',
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
        'from_financial_account_id' => 'from_financial_account_id',
        'to_financial_account_id' => 'to_financial_account_id',
        'trxn_date' => 'trxn_date',
        'total_amount' => 'total_amount',
        'fee_amount' => 'fee_amount',
        'net_amount' => 'net_amount',
        'currency' => 'currency',
        'is_payment' => 'is_payment',
        'trxn_id' => 'trxn_id',
        'trxn_result_code' => 'trxn_result_code',
        'status_id' => 'status_id',
        'payment_processor_id' => 'payment_processor_id',
        'payment_instrument_id' => 'financial_trxn_payment_instrument_id',
        'check_number' => 'financial_trxn_check_number',
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
            self::$_import['financial_trxn'] = & $fields[$name];
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
            self::$_export['financial_trxn'] = & $fields[$name];
          } else {
            self::$_export[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_export;
  }
}