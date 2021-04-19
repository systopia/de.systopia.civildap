<?php

use CRM_Civildap_ExtensionUtil as E;

/**
 * Ldap.Read API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 *
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_ldap_read_spec(&$spec)
{
    $spec['lookuppath']['api.required'] = 1;
}

/**
 * Ldap.Read API
 *
 * @param array $params
 *
 * @return array API result descriptor
 * @throws API_Exception
 * @see civicrm_api3_create_error
 * @see civicrm_api3_create_success
 */
function civicrm_api3_ldap_read($params)
{
    try {
        $ldap_connector = new CRM_Civildap_LdapConnector();
        $entry = $ldap_connector->read($params['lookuppath']);
        return civicrm_api3_create_success($entry->toArray(), $params, 'LDAP', 'read');
    } catch (Exception $e) {
        throw new API_Exception('Error occured. Error Message: ' . $e->getMessage());
    }
}
