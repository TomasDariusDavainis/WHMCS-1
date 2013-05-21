<?php /* Smarty version 2.6.27, created on 2013-04-11 20:41:43
         compiled from emailtpl:emailmessage */ ?>
<p>A new cancellation request has been submitted.</p><p>Client ID: <?php echo $this->_tpl_vars['client_id']; ?>
<br>Client Name: <?php echo $this->_tpl_vars['clientname']; ?>
<br>Service ID: <?php echo $this->_tpl_vars['service_id']; ?>
<br>Product Name: <?php echo $this->_tpl_vars['product_name']; ?>
<br>Cancellation Type: <?php echo $this->_tpl_vars['service_cancellation_type']; ?>
<br>Cancellation Reason: <?php echo $this->_tpl_vars['service_cancellation_reason']; ?>
</p><p><?php echo $this->_tpl_vars['whmcs_admin_link']; ?>
</p>