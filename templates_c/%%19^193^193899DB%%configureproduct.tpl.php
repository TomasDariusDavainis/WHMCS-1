<?php /* Smarty version 2.6.27, created on 2013-04-11 21:53:18
         compiled from /var/www/html/portal-whmcs/templates/orderforms/comparison/configureproduct.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strtolower', '/var/www/html/portal-whmcs/templates/orderforms/comparison/configureproduct.tpl', 20, false),)), $this); ?>
<script type="text/javascript" src="includes/jscript/jqueryui.js"></script>
<script type="text/javascript" src="templates/orderforms/<?php echo $this->_tpl_vars['carttpl']; ?>
/js/main.js"></script>
<link rel="stylesheet" type="text/css" href="templates/orderforms/<?php echo $this->_tpl_vars['carttpl']; ?>
/style.css" />
<link rel="stylesheet" type="text/css" href="templates/orderforms/<?php echo $this->_tpl_vars['carttpl']; ?>
/uistyle.css" />

<div id="order-comparison">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "orderforms/comparison/comparisonsteps.tpl", 'smarty_include_vars' => array('step' => 2)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="cartcontainer">

<form method="post" action="cart.php?a=confproduct" id="orderfrm">
<input type="hidden" name="configure" value="true" />
<input type="hidden" name="i" value="<?php echo $this->_tpl_vars['i']; ?>
" />

<?php if ($this->_tpl_vars['errormessage']): ?><div class="errorbox"><?php echo $this->_tpl_vars['errormessage']; ?>
</div><br /><?php endif; ?>

<input type="hidden" name="previousbillingcycle" value="<?php echo $this->_tpl_vars['billingcycle']; ?>
" />
<?php if ($this->_tpl_vars['pricing']['type'] == 'recurring'): ?>
<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['cartchoosecycle'])) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)); ?>
</h2>
<div class="billingcycle">
<table width="100%" cellspacing="0" cellpadding="0" class="configtable">
<?php if ($this->_tpl_vars['pricing']['monthly']): ?><tr><td class="radiofield"><input type="radio" name="billingcycle" id="cycle1" value="monthly"<?php if ($this->_tpl_vars['billingcycle'] == 'monthly'): ?> checked<?php endif; ?> onclick="submit()" /></td><td class="fieldarea"><label for="cycle1"><?php echo $this->_tpl_vars['pricing']['monthly']; ?>
</label></td></tr><?php endif; ?>
<?php if ($this->_tpl_vars['pricing']['quarterly']): ?><tr><td class="radiofield"><input type="radio" name="billingcycle" id="cycle2" value="quarterly"<?php if ($this->_tpl_vars['billingcycle'] == 'quarterly'): ?> checked<?php endif; ?> onclick="submit()" /></td><td class="fieldarea"><label for="cycle2"><?php echo $this->_tpl_vars['pricing']['quarterly']; ?>
</label></td></tr><?php endif; ?>
 <?php if ($this->_tpl_vars['pricing']['semiannually']): ?><tr><td class="radiofield"><input type="radio" name="billingcycle" id="cycle3" value="semiannually"<?php if ($this->_tpl_vars['billingcycle'] == 'semiannually'): ?> checked<?php endif; ?> onclick="submit()" /></td><td class="fieldarea"><label for="cycle3"><?php echo $this->_tpl_vars['pricing']['semiannually']; ?>
</label></td></tr><?php endif; ?>
<?php if ($this->_tpl_vars['pricing']['annually']): ?><tr><td class="radiofield"><input type="radio" name="billingcycle" id="cycle4" value="annually"<?php if ($this->_tpl_vars['billingcycle'] == 'annually'): ?> checked<?php endif; ?> onclick="submit()" /></td><td class="fieldarea"><label for="cycle4"><?php echo $this->_tpl_vars['pricing']['annually']; ?>
</label></td></tr><?php endif; ?>
 <?php if ($this->_tpl_vars['pricing']['biennially']): ?><tr><td class="radiofield"><input type="radio" name="billingcycle" id="cycle5" value="biennially"<?php if ($this->_tpl_vars['billingcycle'] == 'biennially'): ?> checked<?php endif; ?> onclick="submit()" /></td><td class="fieldarea"><label for="cycle5"><?php echo $this->_tpl_vars['pricing']['biennially']; ?>
</label></td></tr><?php endif; ?>
<?php if ($this->_tpl_vars['pricing']['triennially']): ?><tr><td class="radiofield"><input type="radio" name="billingcycle" id="cycle6" value="triennially"<?php if ($this->_tpl_vars['billingcycle'] == 'triennially'): ?> checked<?php endif; ?> onclick="submit()" /></td><td class="fieldarea"><label for="cycle6"><?php echo $this->_tpl_vars['pricing']['triennially']; ?>
</label></td></tr><?php endif; ?>
</table>
</div>
<?php else: ?>
<input type="hidden" name="billingcycle" value="<?php echo $this->_tpl_vars['billingcycle']; ?>
" />
<?php endif; ?>

<?php if ($this->_tpl_vars['productinfo']['type'] == 'server'): ?>
<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['cartconfigserver'])) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)); ?>
</h2>
<div class="serverconfig">
<table width="100%" cellspacing="0" cellpadding="0" class="configtable">
<tr><td class="fieldlabel"><?php echo $this->_tpl_vars['LANG']['serverhostname']; ?>
:</td><td class="fieldarea"><input type="text" name="hostname" size="15" value="<?php echo $this->_tpl_vars['server']['hostname']; ?>
" /> eg. server1(.yourdomain.com)</td></tr>
<tr><td class="fieldlabel"><?php echo $this->_tpl_vars['LANG']['serverns1prefix']; ?>
:</td><td class="fieldarea"><input type="text" name="ns1prefix" size="10" value="<?php echo $this->_tpl_vars['server']['ns1prefix']; ?>
" /> eg. ns1(.yourdomain.com)</td></tr>
<tr><td class="fieldlabel"><?php echo $this->_tpl_vars['LANG']['serverns2prefix']; ?>
:</td><td class="fieldarea"><input type="text" name="ns2prefix" size="10" value="<?php echo $this->_tpl_vars['server']['ns2prefix']; ?>
" /> eg. ns2(.yourdomain.com)</td></tr>
<tr><td class="fieldlabel"><?php echo $this->_tpl_vars['LANG']['serverrootpw']; ?>
:</td><td class="fieldarea"><input type="password" name="rootpw" size="20" value="<?php echo $this->_tpl_vars['server']['rootpw']; ?>
" /></td></tr>
</table>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['configurableoptions']): ?>
<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['orderconfigpackage'])) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)); ?>
</h2>
<div class="configoptions">
<table width="100%" cellspacing="0" cellpadding="0" class="configtable">
<?php $_from = $this->_tpl_vars['configurableoptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['configoption']):
?>
<tr><td class="fieldlabel"><?php echo $this->_tpl_vars['configoption']['optionname']; ?>
:</td><td class="fieldarea">
<?php if ($this->_tpl_vars['configoption']['optiontype'] == 1): ?>
<select name="configoption[<?php echo $this->_tpl_vars['configoption']['id']; ?>
]" onchange="recalctotals()">
<?php $_from = $this->_tpl_vars['configoption']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num2'] => $this->_tpl_vars['options']):
?>
<option value="<?php echo $this->_tpl_vars['options']['id']; ?>
"<?php if ($this->_tpl_vars['configoption']['selectedvalue'] == $this->_tpl_vars['options']['id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['options']['name']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>
<?php elseif ($this->_tpl_vars['configoption']['optiontype'] == 2): ?>
<?php $_from = $this->_tpl_vars['configoption']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num2'] => $this->_tpl_vars['options']):
?>
<label><input type="radio" name="configoption[<?php echo $this->_tpl_vars['configoption']['id']; ?>
]" id="co<?php echo $this->_tpl_vars['options']['id']; ?>
" value="<?php echo $this->_tpl_vars['options']['id']; ?>
"<?php if ($this->_tpl_vars['configoption']['selectedvalue'] == $this->_tpl_vars['options']['id']): ?> checked="checked"<?php endif; ?> onclick="recalctotals()" /> <?php echo $this->_tpl_vars['options']['name']; ?>
</label><br />
<?php endforeach; endif; unset($_from); ?>
<?php elseif ($this->_tpl_vars['configoption']['optiontype'] == 3): ?>
<label><input type="checkbox" name="configoption[<?php echo $this->_tpl_vars['configoption']['id']; ?>
]" id="co<?php echo $this->_tpl_vars['configoption']['options']['0']['id']; ?>
" value="1"<?php if ($this->_tpl_vars['configoption']['selectedqty']): ?> checked<?php endif; ?> onclick="recalctotals()" /> <?php echo $this->_tpl_vars['configoption']['options']['0']['name']; ?>
</label>
<?php elseif ($this->_tpl_vars['configoption']['optiontype'] == 4): ?>
<?php if ($this->_tpl_vars['configoption']['qtymaximum']): ?>
<?php echo '
	<script>
	jQuery(function() {
	    '; ?>

	    var configid = '<?php echo $this->_tpl_vars['configoption']['id']; ?>
';
	    var configmin = <?php echo $this->_tpl_vars['configoption']['qtyminimum']; ?>
;
	    var configmax = <?php echo $this->_tpl_vars['configoption']['qtymaximum']; ?>
;
	    var configval = <?php if ($this->_tpl_vars['configoption']['selectedqty']): ?><?php echo $this->_tpl_vars['configoption']['selectedqty']; ?>
<?php else: ?><?php echo $this->_tpl_vars['configoption']['qtyminimum']; ?>
<?php endif; ?>;
        <?php echo '
		jQuery( "#slider"+configid ).slider({
            min: configmin,
            max: configmax,
            value: configval,
            range: "min",
            slide: function( event, ui ) {
				jQuery( "#confop"+configid ).val( ui.value );
				jQuery( "#confoplabel"+configid ).html( ui.value );
                recalctotals();
			}
        });
	});
	</script>
'; ?>

<table width="90%"><tr><td width="30" id="confoplabel<?php echo $this->_tpl_vars['configoption']['id']; ?>
" class="configoplabel"><?php if ($this->_tpl_vars['configoption']['selectedqty']): ?><?php echo $this->_tpl_vars['configoption']['selectedqty']; ?>
<?php else: ?><?php echo $this->_tpl_vars['configoption']['qtyminimum']; ?>
<?php endif; ?></td><td><div id="slider<?php echo $this->_tpl_vars['configoption']['id']; ?>
"></div></td></tr></table>
<input type="hidden" name="configoption[<?php echo $this->_tpl_vars['configoption']['id']; ?>
]" id="confop<?php echo $this->_tpl_vars['configoption']['id']; ?>
" value="<?php if ($this->_tpl_vars['configoption']['selectedqty']): ?><?php echo $this->_tpl_vars['configoption']['selectedqty']; ?>
<?php else: ?><?php echo $this->_tpl_vars['configoption']['qtyminimum']; ?>
<?php endif; ?>" />
<?php else: ?>
<input type="text" name="configoption[<?php echo $this->_tpl_vars['configoption']['id']; ?>
]" value="<?php echo $this->_tpl_vars['configoption']['selectedqty']; ?>
" size="5" onkeyup="recalctotals()" /> x <?php echo $this->_tpl_vars['configoption']['options']['0']['name']; ?>

<?php endif; ?>
<?php endif; ?>
</td></tr>
<?php endforeach; endif; unset($_from); ?>
</table>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['addons']): ?>
<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['cartavailableaddons'])) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)); ?>
</h2>
<div class="addons">
<table width="100%" cellspacing="0" cellpadding="0" class="configtable">
<?php $_from = $this->_tpl_vars['addons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['addon']):
?>
<tr><td class="radiofield"><input type="checkbox" name="addons[<?php echo $this->_tpl_vars['addon']['id']; ?>
]" id="a<?php echo $this->_tpl_vars['addon']['id']; ?>
"<?php if ($this->_tpl_vars['addon']['status']): ?> checked<?php endif; ?> onclick="recalctotals()" /></td><td class="fieldarea"><label for="a<?php echo $this->_tpl_vars['addon']['id']; ?>
"><strong><?php echo $this->_tpl_vars['addon']['name']; ?>
</strong> - <?php echo $this->_tpl_vars['addon']['description']; ?>
 (<?php echo $this->_tpl_vars['addon']['pricing']; ?>
)</label></td></tr>
<?php endforeach; endif; unset($_from); ?>
</table>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['customfields']): ?>
<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['orderadditionalrequiredinfo'])) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)); ?>
</h2>
<div class="customfields">
<table width="100%" cellspacing="0" cellpadding="0" class="configtable">
<?php $_from = $this->_tpl_vars['customfields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['customfield']):
?>
<tr><td class="fieldlabel"><?php echo $this->_tpl_vars['customfield']['name']; ?>
:</td><td class="fieldarea"><?php echo $this->_tpl_vars['customfield']['input']; ?>
 <?php echo $this->_tpl_vars['customfield']['description']; ?>
</td></tr>
<?php endforeach; endif; unset($_from); ?>
</table>
</div>
<?php endif; ?>

<div class="ordersummary" id="producttotal"></div>

<div class="checkoutbuttonsleft"><input type="button" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['cartchooseanotherproduct'])) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)); ?>
" onclick="window.location='cart.php'" class="cartbutton" /> <input type="button" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['viewcart'])) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)); ?>
" onclick="window.location='cart.php?a=view'" class="cartbutton" /></div>
<div class="checkoutbuttonsright"><input type="submit" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['cartaddandcheckout'])) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)); ?>
 &raquo;" class="cartbutton green" /></div>
<div class="clear"></div>

</form>

</div>

</div>

<script language="javascript">recalctotals();</script>