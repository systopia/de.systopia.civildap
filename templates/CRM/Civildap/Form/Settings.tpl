{*-------------------------------------------------------+
| SYSTOPIA Rocketchat API Extension                      |
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
+-------------------------------------------------------*}


<br/><h3>{ts domain='de.systopia.civildap'}Rocketchat Server Configuration{/ts}</h3><br/>


<div class="crm-section civildap civildap">
  <div class="crm-section">
    <div class="label">{$form.ldap_server_url.label} <a onclick='CRM.help("{ts domain='de.systopia.civildap'}LDAP Server URL{/ts}", {literal}{"id":"id-civildap-server-url","file":"CRM\/Civildap\/Form\/Settings"}{/literal}); return false;' href="#" title="{ts domain='de.systopia.civildap'}Help{/ts}" class="helpicon">&nbsp;</a></div>
    <div class="content">{$form.ldap_server_url.html}</div>
    <div class="clear"></div>
  </div>
  <div class="crm-section">
    <div class="label">{$form.ldap_user.label} <a onclick='CRM.help("{ts domain='de.systopia.civildap'}LDAP Username{/ts}", {literal}{"id":"id-civildap-server-username","file":"CRM\/Civildap\/Form\/Settings"}{/literal}); return false;' href="#" title="{ts domain='de.systopia.civildap'}Help{/ts}" class="helpicon">&nbsp;</a></div>
    <div class="content">{$form.ldap_user.html}</div>
    <div class="clear"></div>
  </div>
  <div class="crm-section">
    <div class="label">{$form.ldap_password.label} <a onclick='CRM.help("{ts domain='de.systopia.civildap'}LDAP User password{/ts}", {literal}{"id":"id-civildap-server-password","file":"CRM\/Civildap\/Form\/Settings"}{/literal}); return false;' href="#" title="{ts domain='de.systopia.civildap'}Help{/ts}" class="helpicon">&nbsp;</a></div>
    <div class="content">{$form.ldap_password.html}</div>
    <div class="clear"></div>
  </div>
  <div class="crm-section">
    <div class="label">{$form.ldap_base_dn.label} <a onclick='CRM.help("{ts domain='de.systopia.civildap'}LDAP Base DN{/ts}", {literal}{"id":"id-civildap-base_dn","file":"CRM\/Civildap\/Form\/Settings"}{/literal}); return false;' href="#" title="{ts domain='de.systopia.civildap'}Help{/ts}" class="helpicon">&nbsp;</a></div>
    <div class="content">{$form.ldap_base_dn.html}</div>
    <div class="clear"></div>
  </div>
</div>

<div class="crm-submit-buttons">
  {include file="CRM/common/formButtons.tpl" location="bottom"}
</div>
