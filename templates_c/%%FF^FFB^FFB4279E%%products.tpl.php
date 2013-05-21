<?php /* Smarty version 2.6.27, created on 2013-04-11 21:53:17
         compiled from /var/www/html/portal-whmcs/templates/orderforms/comparison/products.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', '/var/www/html/portal-whmcs/templates/orderforms/comparison/products.tpl', 60, false),)), $this); ?>
<script type="text/javascript" src="includes/jscript/jqueryui.js"></script>
<script type="text/javascript" src="templates/orderforms/<?php echo $this->_tpl_vars['carttpl']; ?>
/js/main.js"></script>
<link rel="stylesheet" type="text/css" href="templates/orderforms/<?php echo $this->_tpl_vars['carttpl']; ?>
/style.css" />
<link rel="stylesheet" type="text/css" href="templates/orderforms/<?php echo $this->_tpl_vars['carttpl']; ?>
/uistyle.css" />

<div id="order-comparison">

<h1><?php echo $this->_tpl_vars['LANG']['cartbrowse']; ?>
</h1>

<div class="cartcats">
<?php $_from = $this->_tpl_vars['productgroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['productgroup']):
?>
<?php if ($this->_tpl_vars['gid'] == $this->_tpl_vars['productgroup']['gid']): ?>
<?php echo $this->_tpl_vars['productgroup']['name']; ?>
 |
<?php else: ?>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?gid=<?php echo $this->_tpl_vars['productgroup']['gid']; ?>
"><?php echo $this->_tpl_vars['productgroup']['name']; ?>
</a> |
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['loggedin']): ?>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?gid=addons"><?php echo $this->_tpl_vars['LANG']['cartproductaddons']; ?>
</a> |
<?php if ($this->_tpl_vars['renewalsenabled']): ?><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?gid=renewals"><?php echo $this->_tpl_vars['LANG']['domainrenewals']; ?>
</a> | <?php endif; ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['registerdomainenabled']): ?><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?a=add&domain=register"><?php echo $this->_tpl_vars['LANG']['registerdomain']; ?>
</a> | <?php endif; ?>
<?php if ($this->_tpl_vars['transferdomainenabled']): ?><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?a=add&domain=transfer"><?php echo $this->_tpl_vars['LANG']['transferdomain']; ?>
</a> | <?php endif; ?>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?a=view"><?php echo $this->_tpl_vars['LANG']['viewcart']; ?>
</a>
</div>

<?php if (! $this->_tpl_vars['loggedin'] && $this->_tpl_vars['currencies']): ?>
<div class="currencychooser">
<?php $_from = $this->_tpl_vars['currencies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr']):
?>
<a href="cart.php?gid=<?php echo $this->_tpl_vars['gid']; ?>
&currency=<?php echo $this->_tpl_vars['curr']['id']; ?>
"><img src="images/flags/<?php if ($this->_tpl_vars['curr']['code'] == 'AUD'): ?>au<?php elseif ($this->_tpl_vars['curr']['code'] == 'CAD'): ?>ca<?php elseif ($this->_tpl_vars['curr']['code'] == 'EUR'): ?>eu<?php elseif ($this->_tpl_vars['curr']['code'] == 'GBP'): ?>gb<?php elseif ($this->_tpl_vars['curr']['code'] == 'INR'): ?>in<?php elseif ($this->_tpl_vars['curr']['code'] == 'JPY'): ?>jp<?php elseif ($this->_tpl_vars['curr']['code'] == 'USD'): ?>us<?php elseif ($this->_tpl_vars['curr']['code'] == 'ZAR'): ?>za<?php else: ?>na<?php endif; ?>.png" border="0" alt="" /> <?php echo $this->_tpl_vars['curr']['code']; ?>
</a>
<?php endforeach; endif; unset($_from); ?>
</div>
<div class="clear"></div>
<?php endif; ?>

<?php if (count ( $this->_tpl_vars['products']['0']['features'] )): ?>
<div class="prodtablecol">
<div class="featureheader"></div>
<?php $_from = $this->_tpl_vars['products']['0']['features']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['feature'] => $this->_tpl_vars['value']):
?>
<div class="feature"><?php echo $this->_tpl_vars['feature']; ?>
</div>
<?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>

<?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['product']):
?>
<div class="prodtablecol">
<div class="<?php if ($this->_tpl_vars['num'] % 2 == 0): ?>a<?php else: ?>b<?php endif; ?>header<?php if (! count ( $this->_tpl_vars['products']['0']['features'] )): ?>expandable<?php endif; ?>">
<span class="title"><?php echo $this->_tpl_vars['product']['name']; ?>
</span><br />
<?php if ($this->_tpl_vars['product']['bid']): ?>
<?php echo $this->_tpl_vars['LANG']['bundledeal']; ?>
<?php if ($this->_tpl_vars['product']['displayprice']): ?> <?php echo $this->_tpl_vars['product']['displayprice']; ?>
<?php endif; ?>
<?php elseif ($this->_tpl_vars['product']['paytype'] == 'free'): ?>
<?php echo $this->_tpl_vars['LANG']['orderfree']; ?>

<?php elseif ($this->_tpl_vars['product']['paytype'] == 'onetime'): ?>
<?php echo $this->_tpl_vars['product']['pricing']['onetime']; ?>
 <?php echo $this->_tpl_vars['LANG']['orderpaymenttermonetime']; ?>

<?php else: ?>
<?php echo $this->_tpl_vars['product']['pricing']['monthly']; ?>

<?php endif; ?><br />
</div>
<?php $_from = $this->_tpl_vars['product']['features']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['feature'] => $this->_tpl_vars['value']):
?>
<div class="<?php if ($this->_tpl_vars['num'] % 2 == 0): ?>a<?php else: ?>b<?php endif; ?>feature<?php echo smarty_function_cycle(array('name' => $this->_tpl_vars['product']['pid'],'values' => "1,2"), $this);?>
"><?php echo $this->_tpl_vars['value']; ?>
</div>
<?php endforeach; else: ?>
<div class="<?php if ($this->_tpl_vars['num'] % 2 == 0): ?>a<?php else: ?>b<?php endif; ?>featuredesc<?php echo smarty_function_cycle(array('name' => $this->_tpl_vars['product']['pid'],'values' => "1,2"), $this);?>
"><?php echo $this->_tpl_vars['product']['description']; ?>
</div>
<?php endif; unset($_from); ?>
<div class="<?php if ($this->_tpl_vars['num'] % 2 == 0): ?>a<?php else: ?>b<?php endif; ?>feature<?php echo smarty_function_cycle(array('name' => $this->_tpl_vars['product']['pid'],'values' => "1,2"), $this);?>
">
<br />
<input type="button" value="<?php echo $this->_tpl_vars['LANG']['ordernowbutton']; ?>
 &raquo;"<?php if ($this->_tpl_vars['product']['qty'] == '0'): ?> disabled<?php endif; ?> onclick="window.location='<?php echo $_SERVER['PHP_SELF']; ?>
?a=add&<?php if ($this->_tpl_vars['product']['bid']): ?>bid=<?php echo $this->_tpl_vars['product']['bid']; ?>
<?php else: ?>pid=<?php echo $this->_tpl_vars['product']['pid']; ?>
<?php endif; ?>'" class="cartbutton" />
<br /><br />
</div>
</div>
<?php if (! count ( $this->_tpl_vars['products']['0']['features'] ) && ( $this->_tpl_vars['num']+1 ) % 5 == 0): ?><div class="clear"></div>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<div class="clear"></div>

</div>