<?php

use CRM_Civildap_ExtensionUtil as E;

/**
 * Form controller class
 *
 * @see https://wiki.civicrm.org/confluence/display/CRMDOC/QuickForm+Reference
 */
class CRM_Civildap_Form_Settings extends CRM_Core_Form {
  public function buildQuickForm() {

    $config = CRM_Civildap_Config::singleton();
    $current_values = $config->getSettings();

    // add form elements
    $this->add(
      'text',
      'ldap_server_url',
      E::ts('LDAP Server URL'),
      array("class" => "huge"),
      FALSE
    );
    $this->add(
      'text',
      'ldap_user',
      E::ts('LDAP Username'),
      array("class" => "huge"),
      FALSE
    );
    $this->add(
      'password',
      'ldap_password',
      E::ts('LDAP Password'),
      array("class" => "huge"),
      FALSE
    );

    // set default values
    $this->setDefaults($current_values);

    $this->addButtons(array(
      array(
        'type' => 'submit',
        'name' => E::ts('Submit'),
        'isDefault' => TRUE,
      ),
    ));

    parent::buildQuickForm();
  }

  /**
   * Override validation for custom tokens
   * @return bool|void
   */
  public function validate() {
    parent::validate();

    $this->_submitValues;
    $url = $this->_submitValues['ldap_server_url'];

    if (!preg_match("/\b(?:https:\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
      $this->_errors["ldap_server_url"] = "Please enter a valid LDA URl! Domain needs https://domain.com - no trailing / in the end";
    }
    if (preg_match("/.*\/$/", $url)) {
      $this->_errors["ldap_server_url"] = "Please don't use a trailing / for the url";
    }

    return count($this->_errors) == 0;
  }

  public function postProcess() {
    $config = CRM_Civildap_Config::singleton();
    $values = $this->exportValues();
    $settings = $config->getSettings();
    $settings_in_form = $this->getSettingsInForm();
    foreach ($settings_in_form as $name) {
      $settings[$name] = CRM_Utils_Array::value($name, $values, NULL);
    }
    $config->setSettings($settings);
    parent::postProcess();
  }

  /**
   * get the elements of the form
   * used as a filter for the values array from post Process
   * @return array
   */
  protected function getSettingsInForm() {
    return array(
      'ldap_server_url',
      'ldap_user',
      'ldap_password',
    );
  }

}
