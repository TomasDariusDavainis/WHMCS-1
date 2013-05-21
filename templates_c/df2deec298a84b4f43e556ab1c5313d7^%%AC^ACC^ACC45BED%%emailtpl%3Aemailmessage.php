<?php /* Smarty version 2.6.27, created on 2013-04-11 20:41:43
         compiled from emailtpl:emailmessage */ ?>
<p><a href="<?php echo $this->_tpl_vars['company_domain']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['company_logo_url']; ?>
" alt="<?php echo $this->_tpl_vars['company_name']; ?>
" border="0" /></a></p>
<p>Dear <?php echo $this->_tpl_vars['client_name']; ?>
,</p><p>This email is to confirm that we have received your cancellation request for the service listed below.</p><p>Product/Service: <?php echo $this->_tpl_vars['service_product_name']; ?>
<br />Domain: <?php echo $this->_tpl_vars['service_domain']; ?>
</p><p><?php if ($this->_tpl_vars['service_cancellation_type'] == 'Immediate'): ?>The service will be terminated within the next 24 hours.<?php else: ?>The service will be cancelled at the end of your current billing period on <?php echo $this->_tpl_vars['service_next_due_date']; ?>
.<?php endif; ?></p><p>Thank you for using <?php echo $this->_tpl_vars['company_name']; ?>
 and we hope to see you again in the future.</p><p><?php echo $this->_tpl_vars['signature']; ?>
</p>