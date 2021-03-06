<?php

use CRM_Civildap_ExtensionUtil as E;

/**
 * Ldap.Update API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 *
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_ldap_Update_spec(&$spec)
{
    $spec['magicword']['api.required'] = 1;
}

/**
 * Ldap.Update API
 *
 * @param array $params
 *
 * @return array API result descriptor
 * @throws API_Exception
 * @see civicrm_api3_create_error
 * @see civicrm_api3_create_success
 */
function civicrm_api3_ldap_Update($params)
{
    if (array_key_exists('magicword', $params) && $params['magicword'] == 'sesame') {
        $returnValues = [
            // OK, return several data rows
            12 => ['id' => 12, 'name' => 'Twelve'],
            34 => ['id' => 34, 'name' => 'Thirty four'],
            56 => ['id' => 56, 'name' => 'Fifty six'],
        ];
        // ALTERNATIVE: $returnValues = array(); // OK, success
        // ALTERNATIVE: $returnValues = array("Some value"); // OK, return a single value

        // Spec: civicrm_api3_create_success($values = 1, $params = array(), $entity = NULL, $action = NULL)
        return civicrm_api3_create_success($returnValues, $params, 'NewEntity', 'NewAction');
    } else {
        throw new API_Exception(/*errorMessage*/ 'Everyone knows that the magicword is "sesame"', /*errorCode*/ 1234);
    }
}
