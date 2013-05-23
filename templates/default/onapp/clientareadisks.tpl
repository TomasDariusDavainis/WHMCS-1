<link href="modules/servers/onapp/includes/onapp.css" rel="stylesheet" type="text/css">
{if isset($error)}
<div class="errorbox">
    {$error}
</div>
{/if}
<div class="contentbox">
    <a title="{$LANG.onappoverview}" href="{$smarty.const.ONAPP_FILE_NAME}?page=productdetails&id={$id}">{$LANG.onappoverview}</a>
    | <a title="{$LANG.onappcpuusage}" href="{$smarty.const.ONAPP_FILE_NAME}?page=cpuusage&id={$id}">{$LANG.onappcpuusage}</a>
    | <a title="{$LANG.onappipaddresses}" href="{$smarty.const.ONAPP_FILE_NAME}?page=ipaddresses&id={$id}">{$LANG.onappipaddresses}</a>
    | <strong>{$LANG.onappdisks}</strong>
    | <a title="{$LANG.onappbackups}" href="{$smarty.const.ONAPP_FILE_NAME}?page=backups&id={$id}">{$LANG.onappbackups}</a>
    {if $configoptionsupgrade eq 'on'}  | <a title="{$LANG.onappupgradedowngrade}" href="{$smarty.const.ONAPP_FILE_NAME}?page=upgrade&id={$id}">{$LANG.onappupgradedowngrade}</a> {/if}
    | <a title="{$LANG.onappfirewallrules}" href="{$smarty.const.ONAPP_FILE_NAME}?page=firewallrules&id={$id}">{$LANG.onappfirewall}</a>
</div>
<p>{$LANG.onappdiskstitle}</p>
<h2 class="heading2">{$LANG.onappdiskssettings}</h2>
<table cellspacing="0" cellpadding="10" border="0" width="100%" class="data">
<tr>
    <th>{$LANG.onappid} #</th>
    <th>{$LANG.onappisize}</th>
    <th>{$LANG.onapptype}</th>
    <th>{$LANG.onappbuilt}</th>
    <th>{$LANG.onappautobackup}</th>
    <th>&nbsp;</th>
</tr>
{foreach item=disk from=$disks}
<tr>
    <td>{$disk->_id}</td>
    <td align="right">{$disk->_disk_size} GB</td>
    <td>
{if $disk->_primary == true}
        Standard (primary)
{elseif $disk->_is_swap == true}
        Swap
{else}
        Standard
{/if}
    </td>
    <td>
{if $disk->_built == true}
        YES
{else}
        NO
{/if}
    </td>&nbsp;<td>
{if $disk->_is_swap eq false }
{if $disk->_has_autobackups == true}
        <a class="power off-inactive" rel="nofollow" href="{$smarty.server.PHP_SELF}?page=disks&id={$id}&diskid={$disk->_id}&action=autobackup&mode=false">NO</a>
        <a class="power on-active">YES</a>
{else}
        <a class="power off-active">NO</a>
        <a class="power on-inactive" rel="nofollow" href="{$smarty.server.PHP_SELF}?page=disks&id={$id}&diskid={$disk->_id}&action=autobackup&mode=true">YES</a>
{/if}
{else}
    &nbsp;
{/if}
    </td>
    <td>
{if $disk->_is_swap != true && $vm->_locked != true}
      <a title="Backups" href="{$smarty.server.PHP_SELF}?page=backups&id={$id}&diskid={$disk->_id}&action=add">
        <img title="" src="modules/servers/onapp/includes/backup.png" alt=""/>
      </a>
{/if}
    </td>
</tr>
{foreachelse}
  <tr>
    <td colspan="6">{$LANG.norecordsfound}</td>
  </tr>
{/foreach}
</table>
