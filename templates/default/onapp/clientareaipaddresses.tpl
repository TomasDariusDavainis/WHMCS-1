<link href="modules/servers/onapp/includes/onapp.css" rel="stylesheet" type="text/css">
<div class="contentbox">
    <a title="{$LANG.onappoverview}" href="{$smarty.const.ONAPP_FILE_NAME}?page=productdetails&id={$id}">{$LANG.onappoverview}</a>
    | <a title="{$LANG.onappcpuusage}" href="{$smarty.const.ONAPP_FILE_NAME}?page=cpuusage&id={$id}">{$LANG.onappcpuusage}</a>
    | <strong>{$LANG.onappipaddresses}</strong>
    | <a title="{$LANG.onappdisks}" href="{$smarty.const.ONAPP_FILE_NAME}?page=disks&id={$id}">{$LANG.onappdisks}</a>
    | <a title="{$LANG.onappbackups}" href="{$smarty.const.ONAPP_FILE_NAME}?page=backups&id={$id}">{$LANG.onappbackups}</a>
{if $configoptionsupgrade eq 'on'}  
    | <a title="{$LANG.onappupgradedowngrade}" href="{$smarty.const.ONAPP_FILE_NAME}?page=upgrade&id={$id}">{$LANG.onappupgradedowngrade}</a>
{/if}
    | <a title="{$LANG.onappfirewallrules}" href="{$smarty.const.ONAPP_FILE_NAME}?page=firewallrules&id={$id}">{$LANG.onappfirewall}</a>
</div>
{if isset($error)}
<div class="errorbox">
    {$error}
</div>
{/if}

<p>{$LANG.onappipaddressestitle}</p>
<h2 class="heading2">{$LANG.onappvmipaddresses}</h2>
<table cellspacing="0" cellpadding="10" border="0" width="100%" class="data">
  <tr>
    <th width="10%">{$LANG.onappid} #</th>
    <th width="30%">{$LANG.onappipaddress}</th>
    <th width="30%">{$LANG.onappnetmask}</th>
    <th width="30%">{$LANG.onappgateway}</th>
    <th>&nbsp;</th>
  </tr>
{foreach item=base_ip key=ID from=$base_ips}
  <tr>
    <td>{$base_ip->_id}</td>
    <td>{$base_ip->_address|ipv6_short}</td>
    <td>{$base_ip->_netmask}</td>
    <td>{$base_ip->_gateway|ipv6_short}</td>
    <td>&nbsp;</td>
  </tr>
{/foreach}
{section name = mySection start = 0 loop = $not_resloved_base step = 1}
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><b><font color='red'>{$LANG.onappnotassigned}</font></b></td>
    <td>
{if count($not_resolved_ips) > 0}
      &nbsp;
{else}
      <a href="{$smarty.const.ONAPP_FILE_NAME}?page=ipaddresses&id={$id}&ipid={$notresolved_ip->_id}&action=assignbase">{$LANG.onappassign}</a>
{/if}
    </td>
  </tr>
{/section}
</table>
<br>

{if $not_resloved_additional > 0 || count($additional_ips) > 0}
<h2 class="heading2">{$LANG.onappvmipaddressesadditional}</h2>
<table cellspacing="0" cellpadding="10" border="0" width="100%" class="data">
  <tr>
    <th width="10%">{$LANG.onappid} #</th>
    <th width="30%">{$LANG.onappipaddress}</th>
    <th width="30%">{$LANG.onappnetmask}</th>
    <th width="30%">{$LANG.onappgateway}</th>
    <th>&nbsp;</th>
  </tr>
{foreach item=additional_ip key=ID from=$additional_ips}
  <tr>
    <td>{$additional_ip->_id}</td>
    <td>{$additional_ip->_address|ipv6_short}</td>
    <td>{$additional_ip->_netmask}</td>
    <td>{$additional_ip->_gateway|ipv6_short}</td>
    <td>&nbsp;</td>
  </tr>
{/foreach}


{section name = mySection start = 0 loop = $not_resloved_additional step = 1}
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><b><font color='red'>{$LANG.onappnotassigned}</font></b></td>
    <td>
{if count($not_resolved_ips) > 0 }
      &nbsp;
{else}
      <a href="{$smarty.const.ONAPP_FILE_NAME}?page=ipaddresses&id={$id}&action=assignadditional">{$LANG.onappassign}</a>
{/if}
    </td>
  </tr>
{/section}

</table>
<br>
{/if}

{if count($not_resolved_ips) > 0 }
<h2 class="heading2">{$LANG.onappvmipaddressesnotassigned}</h2>
<table cellspacing="0" cellpadding="10" border="0" width="100%" class="data">
  <tr>
    <th>{$LANG.onappid} #</th>
    <th>{$LANG.onappipaddress}</th>
    <th>{$LANG.onappnetmask}</th>
    <th>{$LANG.onappgateway}</th>
    <th>&nbsp;</th>
  </tr>
{foreach item=notresolved_ip key=ID from=$not_resolved_ips}
  <tr>
    <td>{$notresolved_ip->_id}</td>
    <td>{$notresolved_ip->_address|ipv6_short}</td>
    <td>{$notresolved_ip->_netmask}</td>
    <td>{$notresolved_ip->_gateway|ipv6_short}</td>
    <td>
      {if $not_resloved_base > 0 && $not_resloved_additional > 0}
        <a href="{$smarty.const.ONAPP_FILE_NAME}?page=ipaddresses&id={$id}&ipid={$notresolved_ip->_id}&action=setbase">{$LANG.onappsetasbase}</a> |
        <a href="{$smarty.const.ONAPP_FILE_NAME}?page=ipaddresses&id={$id}&ipid={$notresolved_ip->_id}&action=setadditional">{$LANG.onappsetasadditional}</a>
      {elseif $not_resloved_base > 0}
        <a href="{$smarty.const.ONAPP_FILE_NAME}?page=ipaddresses&id={$id}&ipid={$notresolved_ip->_id}&action=setbase">{$LANG.onappsetasbase}</a>
      {elseif $not_resloved_additional > 0}
        <a href="{$smarty.const.ONAPP_FILE_NAME}?page=ipaddresses&id={$id}&ipid={$notresolved_ip->_id}&action=setadditional">{$LANG.onappsetasadditional}</a>
      {else}
        <a href="{$smarty.const.ONAPP_FILE_NAME}?page=ipaddresses&id={$id}&ipid={$notresolved_ip->_id}&action=delete">{$LANG.onappdelete}</a>
      {/if}
    </td>
  </tr>
{/foreach}
</table>
{/if}

{if count($sec_net_base) > 0 || $sec_net_not_resloved_base > 0 }
<h2 class="heading2">{$LANG.onappvmsecondarynetworkbaseips}</h2>
<table cellspacing="0" cellpadding="10" border="0" width="100%" class="data">
  <tr>
    <th>{$LANG.onappid} #</th>
    <th>{$LANG.onappipaddress}</th>
    <th>{$LANG.onappnetmask}</th>
    <th>{$LANG.onappgateway}</th>
    <th>&nbsp;</th>
  </tr>
{foreach item=ip key=ID from=$sec_net_base}
  <tr>
    <td>{$ip->_id}</td>
    <td>{$ip->_address|ipv6_short}</td>
    <td>{$ip->_netmask}</td>
    <td>{$ip->_gateway|ipv6_short}</td>
    <td>
    &nbsp;
    </td>
  </tr>
{/foreach}

{section name = mySection start = 0 loop = $sec_net_not_resloved_base step = 1}
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><b><font color='red'>{$LANG.onappnotassigned}</font></b></td>
    <td>
{if count($not_resolved_ips) > 0 }
      &nbsp;
{else}
      <a href="{$smarty.const.ONAPP_FILE_NAME}?page=ipaddresses&id={$id}&action=sec_net_assignbase">{$LANG.onappassign}</a>
{/if}
    </td>
  </tr>
{/section}

</table>
{/if}

{if count($sec_net_additional) > 0 || $sec_net_not_resloved_additional > 0 }
<h2 class="heading2">{$LANG.onappvmsecondarynetworkadditionalips}</h2>
<table cellspacing="0" cellpadding="10" border="0" width="100%" class="data">
  <tr>
    <th>{$LANG.onappid} #</th>
    <th>{$LANG.onappipaddress}</th>
    <th>{$LANG.onappnetmask}</th>
    <th>{$LANG.onappgateway}</th>
    <th>&nbsp;</th>
  </tr>
{foreach item=ip key=ID from=$sec_net_additional}
  <tr>
    <td>{$ip->_id}</td>
    <td>{$ip->_address|ipv6_short}</td>
    <td>{$ip->_netmask}</td>
    <td>{$ip->_gateway|ipv6_short}</td>
    <td>
    &nbsp;
    </td>
  </tr>
{/foreach}

{section name = mySection start = 0 loop = $sec_net_not_resloved_additional step = 1}
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><b><font color='red'>{$LANG.onappnotassigned}</font></b></td>
    <td>
{if count($not_resolved_ips) > 0 }
      &nbsp;
{else}
      <a href="{$smarty.const.ONAPP_FILE_NAME}?page=ipaddresses&id={$id}&action=sec_net_assignadditional">{$LANG.onappassign}</a>
{/if}
    </td>
  </tr>
{/section}

</table>
{/if}

</br>