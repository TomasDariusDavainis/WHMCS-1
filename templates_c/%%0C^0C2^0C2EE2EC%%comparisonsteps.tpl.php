<?php /* Smarty version 2.6.27, created on 2013-05-22 21:47:11
         compiled from orderforms/comparison/comparisonsteps.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'sprintf2', 'orderforms/comparison/comparisonsteps.tpl', 3, false),)), $this); ?>
<div class="stepscontainer">
<div class="step<?php if ($this->_tpl_vars['step'] == 1): ?>active<?php endif; ?>">
<span class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['step'])) ? $this->_run_mod_handler('sprintf2', true, $_tmp, '1') : smarty_modifier_sprintf2($_tmp, '1')); ?>
</span>
<?php echo $this->_tpl_vars['LANG']['cartproductdomainchoose']; ?>

</div>
<div class="arrow<?php if ($this->_tpl_vars['step'] == 1): ?>activeright<?php elseif ($this->_tpl_vars['step'] == 2): ?>activeleft<?php endif; ?>"></div>
<div class="step<?php if ($this->_tpl_vars['step'] == 2): ?>active<?php endif; ?>">
<span class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['step'])) ? $this->_run_mod_handler('sprintf2', true, $_tmp, '2') : smarty_modifier_sprintf2($_tmp, '2')); ?>
</span>
<?php echo $this->_tpl_vars['LANG']['cartproductchooseoptions']; ?>

</div>
<div class="arrow<?php if ($this->_tpl_vars['step'] == 2): ?>activeright<?php elseif ($this->_tpl_vars['step'] == 3): ?>activeleft<?php endif; ?>"></div>
<div class="step<?php if ($this->_tpl_vars['step'] == 3): ?>active<?php endif; ?>">
<span class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['step'])) ? $this->_run_mod_handler('sprintf2', true, $_tmp, '3') : smarty_modifier_sprintf2($_tmp, '3')); ?>
</span>
<?php echo $this->_tpl_vars['LANG']['cartreviewcheckout']; ?>

</div>
<div class="clear"></div>
</div>