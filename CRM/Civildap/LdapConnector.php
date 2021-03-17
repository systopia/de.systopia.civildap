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

include "/../../vendor/autoload.php";


use CRM_Civildap_ExtensionUtil as E;


class CRM_Civildap_LdapConnector extends CRM_Civildap_LdapConnectorBase{


  protected function connect($connection_details)
  {
    if (empty($connection_details)) {
      // use configured values
      $settings = $this->config->getSettings();
      $connection_details['ldap_server_url'] = $settings['ldap_server_url'];
      $connection_details['ldap_user'] = $settings['ldap_user'];
      $connection_details['ldap_password'] = $settings['ldap_password'];
      $connection_details['ldap_base_dn'] = $settings['ldap_base_dn'];
    }

    $this->ldap = new LdapClient([
      'servers' => [$connection_details['ldap_server_url']],
      'base_dn' => $connection_details['ldap_base_dn']
    ]);

    # Encrypt the connection prior to binding
    $this->ldap->startTls();

    # Bind to LDAP with a specific user.
    $this->ldap->bind($connection_details['ldap_user'], $connection_details['ldap_password']);

  }

  protected function read()
  {
    // TODO: Implement read() method.
  }

  protected function update()
  {
    // TODO: Implement update() method.
  }

  protected function create()
  {
    // TODO: Implement create() method.
  }

  protected function delete()
  {
    // TODO: Implement delete() method.
  }

  /**
   * @param int $paging_limit
   *
   * Example code, this doesn't do anything yet
   */
  protected function search($paging_limit = 100)
  {
    # Build up a LDAP filter using the helper methods
    $filter = Filters::and(
      Filters::equal('objectClass', 'user'),
      Filters::startsWith('cn', 'S'),
      # Add a filter object based off a raw string filter...
      Filters::raw('(telephoneNumber=*)')
    );

    # Create a search operation to be used based on the above filter
    $search = Operations::search($filter, 'cn');

    # Create a paged search, 100 results at a time
    $paging = $this->ldap->paging($search, 100);

    // TODO: This should always get just one result. If more then we did need to specify
    while ($paging->hasEntries()) {
      $entries = $paging->getEntries();
      var_dump(count($entries));

      foreach ($entries as $entry) {
        echo "Entry: ".$entry->getDn().PHP_EOL;
      }
    }
  }
}
