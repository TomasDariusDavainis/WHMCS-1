<?php /* Smarty version 2.6.27, created on 2013-04-11 20:38:59
         compiled from /var/www/html/portal-whmcs/templates/default/onapp/clientareaoverview.tpl */ ?>
<link href="modules/servers/onapp/includes/onapp.css" rel="stylesheet" type="text/css">
<?php echo '
<script>
function showconsole(id) {
    window.open("modules/servers/onapp/console.php?id="+id,"popup","width=820,height=640,scrollbars=0,resizable=0,toolbar=0,directories=0,location=0,menubar=0,status=0,left=50,top=50");
}

function rebuildvm(id) {
      if( confirm("'; ?>
<?php echo $this->_tpl_vars['LANG']['onappconfirmrebuildvm']; ?>
<?php echo '") ) {
        window.location="'; ?>
<?php echo @ONAPP_FILE_NAME; ?>
<?php echo '?page=productdetails&id='; ?>
<?php echo $this->_tpl_vars['id']; ?>
<?php echo '&action=rebuild";
    };
}

function deletevm(id) {
    if ( confirm("'; ?>
<?php echo $this->_tpl_vars['LANG']['onappconfirmdeletevm']; ?>
<?php echo '") ) {
        window.location="'; ?>
<?php echo @ONAPP_FILE_NAME; ?>
<?php echo '?page=productdetails&id='; ?>
<?php echo $this->_tpl_vars['id']; ?>
<?php echo '&action=delete";
    };
}

function stopvm(id) {
    if ( confirm("'; ?>
<?php echo $this->_tpl_vars['LANG']['onappconfirmstopvm']; ?>
<?php echo '") ) {
        window.location="'; ?>
<?php echo @ONAPP_FILE_NAME; ?>
<?php echo '?page=productdetails&id='; ?>
<?php echo $this->_tpl_vars['id']; ?>
<?php echo '&action=stop";
    }
}

function show_logs( id, logid, date, action, status, type ) { 
                    
    jQuery.ajax( {
        url: document.location.href,
        data: \'transactionid=\' + id + \'&type=\' + type,
        success: function( data ) {
            
        data = JSON.parse( data )
        jQuery(\'.log_details\').remove()
        var html = \'<h4>'; ?>
<?php echo $this->_tpl_vars['LANG']['onapploginfo']; ?>
<?php echo '</h4>\'+
            \'<div class="log_info"><pre>\' + \'\\n\' +
                \'Log ID:\\t\' + logid       + \'\\n\' +
                \'Type:\\t\'   + type        + \'\\n\' +    
                \'Date:\\t\'   + date        + \'\\n\' +
                \'Action:\\t\' + action      + \'\\n\' +
                \'Status:\\t\' + status      + \'\\n\' +                                     
            \'</pre></div>\'                + \'\\n\' +
                \'<h4>'; ?>
<?php echo $this->_tpl_vars['LANG']['onappoutput']; ?>
<?php echo '</h4>\'+        
            \'<div class="log_details"><pre>\' + \'\\n\' +
                 data.output                 + \'\\n\' +
            \'</div>\'
                                
            jQuery(\'#vm_logs\').html(html)
        }
     });
                        
}
</script>
'; ?>

<div class="contentbox">
    <strong><?php echo $this->_tpl_vars['LANG']['onappoverview']; ?>
</strong>
    | <a title="<?php echo $this->_tpl_vars['LANG']['onappcpuusage']; ?>
" href="<?php echo @ONAPP_FILE_NAME; ?>
?page=cpuusage&id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['LANG']['onappcpuusage']; ?>
</a>
    | <a title="<?php echo $this->_tpl_vars['LANG']['onappipaddresses']; ?>
" href="<?php echo @ONAPP_FILE_NAME; ?>
?page=ipaddresses&id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['LANG']['onappipaddresses']; ?>
</a>
    | <a title="<?php echo $this->_tpl_vars['LANG']['onappdisks']; ?>
" href="<?php echo @ONAPP_FILE_NAME; ?>
?page=disks&id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['LANG']['onappdisks']; ?>
</a>
    | <a title="<?php echo $this->_tpl_vars['LANG']['onappbackups']; ?>
" href="<?php echo @ONAPP_FILE_NAME; ?>
?page=backups&id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['LANG']['onappbackups']; ?>
</a>
    <?php if ($this->_tpl_vars['configoptionsupgrade'] == 'on'): ?>  | <a title="<?php echo $this->_tpl_vars['LANG']['onappupgradedowngrade']; ?>
" href="<?php echo @ONAPP_FILE_NAME; ?>
?page=upgrade&id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['LANG']['onappupgradedowngrade']; ?>
</a> <?php endif; ?>
    | <a title="<?php echo $this->_tpl_vars['LANG']['onappfirewallrules']; ?>
" href="<?php echo @ONAPP_FILE_NAME; ?>
?page=firewallrules&id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['LANG']['onappfirewall']; ?>
</a>
    | <a title="<?php echo $this->_tpl_vars['LANG']['onappbacktoservicedetails']; ?>
" href="clientarea.php?action=productdetails&id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['LANG']['onappbacktoservicedetails']; ?>
</a>
</div>
<?php if (isset ( $this->_tpl_vars['error'] )): ?>
<div class="errorbox">
    <?php echo $this->_tpl_vars['error']; ?>

</div>
<?php endif; ?>
<p><?php echo $this->_tpl_vars['LANG']['onappoverviewtitle']; ?>
</p>
<h2 class="heading2"><?php echo $this->_tpl_vars['LANG']['onappvmdetails']; ?>
</h2>
<table cellspacing="0" cellpadding="10" border="0" align="center" width="100%">
  <tbody>
    <tr class="vm-overview">
      <td rowspan="2">
<?php if ($this->_tpl_vars['virtualmachine']->_operating_system == 'linux'): ?>
          <img src="modules/servers/onapp/includes/linux-48x48.png"   alt="Linux" height="48" width="48" />
<?php elseif ($this->_tpl_vars['virtualmachine']->_operating_system == 'windows'): ?>
          <img src="modules/servers/onapp/includes/windows-48x48.png" alt="Windows" height="48" width="48" />
<?php endif; ?>
      </td>
      <td><div class="hostname"><strong><?php echo $this->_tpl_vars['LANG']['onapphostname']; ?>
</strong></div></td>
      <td>
          <?php echo $this->_tpl_vars['virtualmachine']->_hostname; ?>

      </td>
      <td>&nbsp;</td>
      <td><div class="status"><strong><?php echo $this->_tpl_vars['LANG']['onappstatus']; ?>
</strong></div></td>
      <td>
    <?php if ($this->_tpl_vars['virtualmachine']->_locked == true || $this->_tpl_vars['virtualmachine']->_built == false): ?>
        <a class="power pending">Pending</a>
    <?php elseif ($this->_tpl_vars['virtualmachine']->_booted == true): ?>
        <a rel="nofollow" class="power off-inactive" href="#" onclick="stopvm();; return false;">OFF</a>
        <a class="power on-active">ON</a>
    <?php elseif ($this->_tpl_vars['virtualmachine']->_booted == false): ?>
        <a class="power off-active">OFF</a>
        <a rel="nofollow" class="power on-inactive" href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=productdetails&id=<?php echo $this->_tpl_vars['id']; ?>
&action=start">ON</a>
    <?php else: ?>
      &nbsp;
    <?php endif; ?>
      </td>
    </tr>
    <tr class="vm-overview">
      <td><div class="login"><strong><?php echo $this->_tpl_vars['LANG']['onapplogin']; ?>
</strong></div></td>
      <td>
        <code><?php if ($this->_tpl_vars['virtualmachine']->_operating_system == 'windows'): ?>Administrator<?php else: ?>root<?php endif; ?></code>
        /
        <a onclick="$('#root_password').show(); $(this).hide();; return false;" href="#" id="root_password_href"><?php echo $this->_tpl_vars['LANG']['onapppassword']; ?>
</a>
        <a onclick="$('#root_password_href').show(); $(this).hide();; return false;" href="#"  style="display: none;" id="root_password"><?php echo $this->_tpl_vars['virtualmachine']->_initial_root_password; ?>
</a>
      </td>
      <td>&nbsp;</td>
      <td><div class="template"><strong><?php echo $this->_tpl_vars['LANG']['onapptemplate']; ?>
</strong></div></td>
      <td>
<?php if ($this->_tpl_vars['virtualmachine']->_built == true): ?>
        <?php echo $this->_tpl_vars['virtualmachine']->_template_label; ?>

<?php else: ?>
        Not built yet...
<?php endif; ?>
      </td>
    </tr>
    <tr><td colspan="6"></td></tr>
  </tbody>
</table>
<h2 class="heading2"><?php echo $this->_tpl_vars['LANG']['onappvmsettings']; ?>
</h2>
<form id="product_details_form" method="post" action="clientarea.php?action=productdetails">
        <input type="hidden" name="id" value=<?php echo $this->_tpl_vars['id']; ?>
]">
</form>
<table cellspacing="0" cellpadding="10" border="0" align="center" width="100%">
  <tbody>
    <tr>
      <td>&nbsp;</td>
      <td><strong><?php echo $this->_tpl_vars['LANG']['onappmem']; ?>
</strong></td>
      <td><?php echo $this->_tpl_vars['virtualmachine']->_memory; ?>
 MB</td>
      <td>&nbsp;</td>
      <td><strong><?php echo $this->_tpl_vars['LANG']['onappcpus']; ?>
</strong></td>
      <td><?php echo $this->_tpl_vars['virtualmachine']->_cpus; ?>
 CPU(s)</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong><?php echo $this->_tpl_vars['LANG']['onappcpupriority']; ?>
</strong></td>
      <td><?php echo $this->_tpl_vars['virtualmachine']->_cpu_shares; ?>
 %</td>
      <td>&nbsp;</td>

      <td><strong><?php echo $this->_tpl_vars['LANG']['onappportspeed']; ?>
</strong></td>
      <td>
        <?php if ($this->_tpl_vars['rate_limit'] != 0): ?>
           <?php echo $this->_tpl_vars['rate_limit']; ?>
 Mbps
        <?php else: ?>
           <?php echo $this->_tpl_vars['LANG']['onappunlimited']; ?>

        <?php endif; ?>
      </td>
    </tr>
  </tbody>
</table>

<h2 class="heading2"><?php echo $this->_tpl_vars['LANG']['onappactions']; ?>
</h2>

    <?php if ($this->_tpl_vars['virtualmachine']->_locked == true): ?>
<table cellspacing="10" cellpadding="10" border="0" width="100%">
  <tbody>
    <tr>
      <td align="center">
<?php echo '
        <script type="text/JavaScript">
        <!--
          window.onload = function(){
            setTimeout("location.reload(true);", 10000);
          };
        //   -->
        </script>

'; ?>

        <p align="center"><b><?php echo $this->_tpl_vars['LANG']['onappvmlocked']; ?>
</b></p>
      </td>
    </tr>
  </tbody>
</table>
    <?php elseif ($this->_tpl_vars['virtualmachine']->_built == false): ?>
<table cellspacing="10" cellpadding="10" border="0" width="100%">
  <tbody>
    <tr>
      <td width="33%">
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=productdetails&id=<?php echo $this->_tpl_vars['id']; ?>
&action=build"><?php echo $this->_tpl_vars['LANG']['onappvmbuild']; ?>
</a>
      </td>
      <td width="33%">
        <a  href="#" onclick="deletevm();; return false;"><?php echo $this->_tpl_vars['LANG']['onappvmdel']; ?>
</a>
      </td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
    
    <?php elseif ($this->_tpl_vars['virtualmachine']->_booted == true): ?>
    
<table cellspacing="10" cellpadding="10" border="0" width="100%">
  <tbody>
    <tr>
      <td width="33%">
        <a  href="#" onclick="stopvm();; return false;"><?php echo $this->_tpl_vars['LANG']['onappvmstop']; ?>
</a>
      </td>
      <td width="33%">
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=productdetails&id=<?php echo $this->_tpl_vars['id']; ?>
&action=reboot"><?php echo $this->_tpl_vars['LANG']['onappvmreboot']; ?>
</a>
      </td>
      <td>
        <a href="#" onclick="rebuildvm();; return false;"><?php echo $this->_tpl_vars['LANG']['onappvmrebuild']; ?>
</a>
      </td>
    </tr>
    <tr>
      <td>
        <a href="#" onclick="showconsole('<?php echo $this->_tpl_vars['virtualmachine']->_id; ?>
'); return false;"><?php echo $this->_tpl_vars['LANG']['onappvmconsole']; ?>
</a>
      </td>
      <td>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=disks&id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['LANG']['onappvmmanagedisks']; ?>
</a>
      </td>
      <td>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=ipaddresses&id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['LANG']['onappvmmanageips']; ?>
</a>
      </td>
    </tr>
    <tr>
      <td>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=productdetails&id=<?php echo $this->_tpl_vars['id']; ?>
&action=reset_pass"><?php echo $this->_tpl_vars['LANG']['onappvmresetpassword']; ?>
</a>
      </td>
      <td>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=productdetails&id=<?php echo $this->_tpl_vars['id']; ?>
&action=rebuild_network"><?php echo $this->_tpl_vars['LANG']['onappvmrebuildnetwork']; ?>
</a>
      </td>
      <?php if ($this->_tpl_vars['overagesenabled'] != 0): ?>
      <td>
        <a href="#" onclick="$('form#product_details_form').submit(); return false;"> <?php echo $this->_tpl_vars['LANG']['onappbwusage']; ?>
</a>
      </td>
      <?php endif; ?>     
    </tr>
  </tbody>
</table>
    <?php elseif ($this->_tpl_vars['virtualmachine']->_booted == false): ?>
<table cellspacing="10" cellpadding="10" border="0" width="100%">
  <tbody>
    <tr>
      <td width="33%">
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=productdetails&id=<?php echo $this->_tpl_vars['id']; ?>
&action=start"><?php echo $this->_tpl_vars['LANG']['onappvmstart']; ?>
</a>
      </td>
      <td width="33%">
        <a href="#" onclick="rebuildvm();; return false;"><?php echo $this->_tpl_vars['LANG']['onappvmrebuild']; ?>
</a>
      </td>
      <td>
        <a  href="#" onclick="deletevm();; return false;"><?php echo $this->_tpl_vars['LANG']['onappvmdel']; ?>
</a>
      </td>
    </tr>
    <tr>
      <td>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=disks&id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['LANG']['onappvmmanagedisks']; ?>
</a>
      </td>
      <td>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=ipaddresses&id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['LANG']['onappvmmanageips']; ?>
</a>
      </td>
      <td>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=productdetails&id=<?php echo $this->_tpl_vars['id']; ?>
&action=reset_pass"><?php echo $this->_tpl_vars['LANG']['onappvmresetpassword']; ?>
</a>
      </td>
    </tr>
    <tr> 
      <?php if ($this->_tpl_vars['overagesenabled'] != 0): ?>
      <td>
        <a href="#" onclick="$('form#product_details_form').submit(); return false;"> <?php echo $this->_tpl_vars['LANG']['onappbwusage']; ?>
 </a>
      </td>
      <?php endif; ?> 
    </tr>
  </tbody>
</table>
    <?php endif; ?>
    <h2 class="heading2"><?php echo $this->_tpl_vars['LANG']['onappvmactivitylog']; ?>
</h2>
    <h5><?php echo $this->_tpl_vars['LANG']['onappvmactivityloginfo']; ?>
</h5> 
<table class="data" cellspacing="0" cellpadding="10" border="0" width="100%">
    <tr>
        <th><?php echo $this->_tpl_vars['LANG']['onappref']; ?>
</th>
        <th><?php echo $this->_tpl_vars['LANG']['onappdate']; ?>
</th>
        <th><?php echo $this->_tpl_vars['LANG']['onappaction']; ?>
</th>
        <th><?php echo $this->_tpl_vars['LANG']['onappstatus']; ?>
</th>
    </tr>    
<?php if ($this->_tpl_vars['vm_logs'] == false): ?>
    <tr><td>No logs found.</td></tr>
<?php else: ?>
<?php $_from = $this->_tpl_vars['vm_logs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['log']):
?>
    <tr>
        <td>
            <a class="logdetailslink" onclick="show_logs(<?php echo $this->_tpl_vars['log']['target_id']; ?>
, <?php echo $this->_tpl_vars['id']; ?>
, '<?php echo $this->_tpl_vars['log']['created_at']; ?>
', '<?php echo $this->_tpl_vars['log']['action']; ?>
', '<?php echo $this->_tpl_vars['log']['status']; ?>
', '<?php echo $this->_tpl_vars['log']['target_type']; ?>
'); return false;" href="#output"  >
                <?php echo $this->_tpl_vars['id']; ?>

            </a>
        </td>
        <td><?php echo $this->_tpl_vars['log']['created_at']; ?>
</td>
        <td><?php echo $this->_tpl_vars['log']['action']; ?>
</td>
        <td><?php echo $this->_tpl_vars['log']['status']; ?>
</td>
    </tr>
<?php endforeach; endif; unset($_from); ?>
          
<?php endif; ?>
       
</table> 

<div id="vm_logs"></div>
<a name="output"> </a>
<br/>