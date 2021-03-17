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

class CRM_Civildap_Config {

  private static $singleton = NULL;
  private static $settings  = NULL;

  /**
   * get the config instance
   */
  public static function singleton() {
    if (self::$singleton === NULL) {
      self::$singleton = new CRM_Civildap_Config();
    }
    return self::$singleton;
  }

  /**
   * Get a single setting
   *
   * @param $name          string setting name
   * @param $default_value mixed  default value
   * @return mixed setting
   */
  public function getSetting($name, $default_value = NULL) {
    $settings = self::getSettings();
    return CRM_Utils_Array::value($name, $settings, $default_value);
  }

  /**
   * get CiviLDAP settings
   *
   * @return array
   */
  public function getSettings() {
    if (self::$settings === NULL) {
      self::$settings = Civi::settings()->get('de.systopia.civildap');
    }

    return self::$settings;
  }

  /**
   * set CiviLDAP settings
   *
   * @param $settings array
   */
  public function setSettings($settings) {
    self::$settings = $settings;
    Civi::settings()->set('de.systopia.civildap', $settings);
  }


}
