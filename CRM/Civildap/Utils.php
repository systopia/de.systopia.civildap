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

class CRM_Civildap_Utils
{


    /**
     * Helper function to check if string is Json
     *
     * @param $string
     *
     * @return bool
     */
    public static function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}

