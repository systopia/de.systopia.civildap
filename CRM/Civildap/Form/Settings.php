<?php

/*-------------------------------------------------------+
| SYSTOPIA CiviLdap Extension                            |
| Copyright (C) 2021 SYSTOPIA                            |
| Author: P. Batroff (batroff@systopia.de)               |
+--------------------------------------------------------+
| This program is released as free software under the    |
| Affero GPL license. You can redistribute it and/or     |
| modify it under the terms of this license which you    |
| can read by viewing the included agpl.txt or online    |
| at www.gnu.org/licenses/agpl.html. Removal of this     |
| copyright header is strictly prohibited without        |
| written permission from the original author(s).        |
+--------------------------------------------------------*/

use CRM_Civildap_ExtensionUtil as E;

/**
 * Form controller class
 *
 * @see https://wiki.civicrm.org/confluence/display/CRMDOC/QuickForm+Reference
 */
class CRM_Civildap_Form_Settings extends CRM_Core_Form
{
    public function buildQuickForm()
    {
        $config = CRM_Civildap_Config::singleton();
        $current_values = $config->getSettings();

        // add form elements
        $this->add(
            'text',
            'ldap_server_url',
            E::ts('LDAP Server URL'),
            ["class" => "huge"],
            false
        );
        $this->add(
            'text',
            'ldap_user',
            E::ts('LDAP Username'),
            ["class" => "huge"],
            false
        );
        $this->add(
            'password',
            'ldap_password',
            E::ts('LDAP Password'),
            ["class" => "huge"],
            false
        );

        $this->add(
            'text',
            'ldap_base_dn',
            E::ts('LDAP Base DN'),
            ["class" => "huge"],
            false
        );

        // set default values
        $this->setDefaults($current_values);

        $this->addButtons(
            [
                [
                    'type' => 'submit',
                    'name' => E::ts('Submit'),
                    'isDefault' => true,
                ],
            ]
        );

        parent::buildQuickForm();
    }

    /**
     * Override validation for custom tokens
     *
     * @return bool|void
     */
    public function validate()
    {
        parent::validate();

        $this->_submitValues;
        $url = $this->_submitValues['ldap_server_url'];

        //    if (!preg_match("/\b(?:https:\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
        //      $this->_errors["ldap_server_url"] = "Please enter a valid LDA URl! Domain needs https://domain.com - no trailing / in the end";
        //    }
        //    if (preg_match("/.*\/$/", $url)) {
        //      $this->_errors["ldap_server_url"] = "Please don't use a trailing / for the url";
        //    }

        return count($this->_errors) == 0;
    }

    public function postProcess()
    {
        $config = CRM_Civildap_Config::singleton();
        $values = $this->exportValues();
        $settings = $config->getSettings();
        $settings_in_form = $this->getSettingsInForm();
        foreach ($settings_in_form as $name) {
            $settings[$name] = CRM_Utils_Array::value($name, $values, null);
        }
        $config->setSettings($settings);
        parent::postProcess();
    }

    /**
     * get the elements of the form
     * used as a filter for the values array from post Process
     *
     * @return array
     */
    protected function getSettingsInForm()
    {
        return [
            'ldap_server_url',
            'ldap_user',
            'ldap_password',
            'ldap_base_dn',
        ];
    }

}
