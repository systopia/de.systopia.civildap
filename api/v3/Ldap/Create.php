<?php

use CRM_Civildap_ExtensionUtil as E;

/**
 * Ldap.Create API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 *
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_ldap_create_spec(&$spec)
{
    $spec['uri']['api.required'] = 1;
    $spec['values']['api.required'] = 1;

    $spec['values'] = [
        'name' => 'values',
        'api.required' => 1,
        'type' => CRM_Utils_Type::T_LONGTEXT,
        'title' => 'LDAP Values',
        'description' => 'Values to create in the given LDAP Path. JSON formatted',
    ];
}

/**
 * Ldap.Create API
 *
 * @param array $params
 *
 * @return array API result descriptor
 * @throws API_Exception
 * @see civicrm_api3_create_error
 * @see civicrm_api3_create_success
 */
function civicrm_api3_ldap_create($params)
{
    try {
        $ldap_connector = new CRM_Civildap_LdapConnector();
//        if (!CRM_Civildap_Utils::isJson($params['values'])) {
//            civicrm_api3_create_error("Malformed parameter 'values'. Please provide a json formatted array");
//            return;
//        }

        $ldap_connector->create($params['uri'], $params['values']);
        return civicrm_api3_create_success('Created LDAP Entry');
    } catch (Exception $e) {
        civicrm_api3_create_error('Error occured. Error Message: ' . $e->getMessage());
    }
}
