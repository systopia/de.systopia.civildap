<?php

use CRM_Civildap_ExtensionUtil as E;

/**
 * Ldap.Delete API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 *
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_ldap_delete_spec(&$spec)
{
    $spec['ldap_id']['api.required'] = 1;
}

/**
 * Ldap.Delete API
 *
 * @param array $params
 *
 * @return array API result descriptor
 * @throws API_Exception
 * @see civicrm_api3_create_error
 * @see civicrm_api3_create_success
 */
function civicrm_api3_ldap_delete($params)
{
    try {
        $ldap_connector = new CRM_Civildap_LdapConnector();
        $ldap_connector->delete($params['ldap_id']);
        return civicrm_api3_create_success("Deleted Entry for Ldap ID {$params['ldap_id']}");
    } catch (Exception $e) {
        throw new API_Exception('LDAP.delete Error occured. Error Message: ' . $e->getMessage());
    }
}
