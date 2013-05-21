<?php /* Smarty version 2.6.27, created on 2013-04-11 20:41:33
         compiled from /var/www/html/portal-whmcs/templates/default/clientareacancelrequest.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'sprintf2', '/var/www/html/portal-whmcs/templates/default/clientareacancelrequest.tpl', 68, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['template'])."/pageheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['LANG']['clientareacancelrequest'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['invalid']): ?>

<div class="alert alert-warning">
    <p><?php echo $this->_tpl_vars['LANG']['clientareacancelinvalid']; ?>
</p>
</div>

<div class="textcenter">
    <input type="button" value="<?php echo $this->_tpl_vars['LANG']['clientareabacklink']; ?>
" class="btn" onclick="window.location='clientarea.php?action=productdetails&id=<?php echo $this->_tpl_vars['id']; ?>
'" />
</div>

<br /><br /><br />

<?php elseif ($this->_tpl_vars['requested']): ?>

<div class="alert alert-success">
    <p><?php echo $this->_tpl_vars['LANG']['clientareacancelconfirmation']; ?>
</p>
</div>

<div class="textcenter">
    <input type="button" value="<?php echo $this->_tpl_vars['LANG']['clientareabacklink']; ?>
" class="btn" onclick="window.location='clientarea.php?action=productdetails&id=<?php echo $this->_tpl_vars['id']; ?>
'" />
</div>

<br /><br /><br />

<?php else: ?>

<?php if ($this->_tpl_vars['error']): ?>
<div class="alert alert-error">
    <p class="bold"><?php echo $this->_tpl_vars['LANG']['clientareaerrors']; ?>
</p>
    <ul>
        <li><?php echo $this->_tpl_vars['LANG']['clientareacancelreasonrequired']; ?>
</li>
    </ul>
</div>
<?php endif; ?>

<div class="alert alert-block alert-info">
    <p><?php echo $this->_tpl_vars['LANG']['clientareacancelproduct']; ?>
: <strong><?php echo $this->_tpl_vars['groupname']; ?>
 - <?php echo $this->_tpl_vars['productname']; ?>
</strong><?php if ($this->_tpl_vars['domain']): ?> (<?php echo $this->_tpl_vars['domain']; ?>
)<?php endif; ?></p>
</div>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
?action=cancel&amp;id=<?php echo $this->_tpl_vars['id']; ?>
" class="form-stacked">
<input type="hidden" name="sub" value="submit" />

    <fieldset class="control-group">

        <div class="control-group">
            <label class="control-label" for="cancellationreason"><?php echo $this->_tpl_vars['LANG']['clientareacancelreason']; ?>
</label>
        	<div class="controls">
        	    <textarea name="cancellationreason" id="cancellationreason" rows="6" class="fullwidth"></textarea>
        	</div>
        </div>

        <div class="control-group">
            <label class="control-label" for="type"><?php echo $this->_tpl_vars['LANG']['clientareacancellationtype']; ?>
</label>
        	<div class="controls">
        	    <select name="type" id="type">
                <option value="Immediate"><?php echo $this->_tpl_vars['LANG']['clientareacancellationimmediate']; ?>
</option>
                <option value="End of Billing Period"><?php echo $this->_tpl_vars['LANG']['clientareacancellationendofbillingperiod']; ?>
</option>
                </select>
        	</div>
        </div>

        <?php if ($this->_tpl_vars['domainid']): ?>
        <br />
        <div class="alert alert-block alert-warn textcenter">
        <p><strong><?php echo $this->_tpl_vars['LANG']['cancelrequestdomain']; ?>
</strong></p>
        <p><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['cancelrequestdomaindesc'])) ? $this->_run_mod_handler('sprintf2', true, $_tmp, $this->_tpl_vars['domainnextduedate'], $this->_tpl_vars['domainprice'], $this->_tpl_vars['domainregperiod']) : smarty_modifier_sprintf2($_tmp, $this->_tpl_vars['domainnextduedate'], $this->_tpl_vars['domainprice'], $this->_tpl_vars['domainregperiod'])); ?>
</p>
        <div align="center"><label class="control-label"><input type="checkbox" name="canceldomain" id="canceldomain" /> <?php echo $this->_tpl_vars['LANG']['cancelrequestdomainconfirm']; ?>
</label></div>
        </div>
        <?php endif; ?>

        <div class="form-actions">
            <input type="submit" value="<?php echo $this->_tpl_vars['LANG']['clientareacancelrequestbutton']; ?>
" class="btn btn-danger" />
            <input type="button" value="<?php echo $this->_tpl_vars['LANG']['cancel']; ?>
" class="btn" onclick="window.location='clientarea.php?action=productdetails&id=<?php echo $this->_tpl_vars['id']; ?>
'" />
        </div>

    </fieldset>

</form>

<?php endif; ?>