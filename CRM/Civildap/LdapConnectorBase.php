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

include __DIR__ . "/../../vendor/autoload.php";


use CRM_Civildap_ExtensionUtil as E;

use FreeDSx\Ldap\LdapClient;
use FreeDSx\Ldap\Operations;
use FreeDSx\Ldap\Search\Filters;
use FreeDSx\Ldap\Entry\Entry;
use FreeDSx\Ldap\Exception\OperationException;


abstract class CRM_Civildap_LdapConnectorBase
{

    protected $config;

    protected $ldap;

    /**
     * CRM_Civildap_LdapConnectorBase constructor.
     *
     * @param array $connection_details
     *
     * @throws Exception
     */
    public function __construct($connection_details = [])
    {
        if (!file_exists(__DIR__ . '/../../vendor/autoload.php')) {
            throw new Exception(
                "FreeDSx LDAP not available. Please 'composer install' in the base folder of this Extension"
            );
        }
        require __DIR__ . '/../../vendor/autoload.php';
        $this->config = new CRM_Civildap_Config();

        // connect to ldap sever
        $this->connect($connection_details);
    }

    abstract protected function connect($connection_details);

    abstract protected function read($path);

    abstract protected function update();

    abstract protected function create($path, $params);

    abstract protected function delete();

    abstract protected function search();
}

