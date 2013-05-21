<?php /* Smarty version 2.6.27, created on 2013-04-11 21:46:57
         compiled from /var/www/html/portal-whmcs/templates/default/serverstatus.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['template'])."/pageheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['LANG']['networkstatustitle'],'desc' => $this->_tpl_vars['LANG']['networkstatusintro'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="alert alert-block alert-warning">
<p class="textcenter fontsize3">
<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?view=open" class="networkissuesopen"><?php echo $this->_tpl_vars['opencount']; ?>
 <?php echo $this->_tpl_vars['LANG']['networkissuesstatusopen']; ?>
</a> &nbsp;&nbsp;&nbsp;&nbsp;
<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?view=scheduled" class="networkissuesscheduled"><?php echo $this->_tpl_vars['scheduledcount']; ?>
 <?php echo $this->_tpl_vars['LANG']['networkissuesstatusscheduled']; ?>
</a> &nbsp;&nbsp;&nbsp;&nbsp;
<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?view=resolved" class="networkissuesclosed"><?php echo $this->_tpl_vars['resolvedcount']; ?>
 <?php echo $this->_tpl_vars['LANG']['networkissuesstatusresolved']; ?>
</a>
</p>
</div>

<?php $_from = $this->_tpl_vars['issues']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['issue']):
?>

<?php if ($this->_tpl_vars['issue']['clientaffected']): ?><div class="alert-message block-message alert-warning"><?php endif; ?>

    <h3><?php echo $this->_tpl_vars['issue']['title']; ?>
 (<?php echo $this->_tpl_vars['issue']['status']; ?>
)</h3>
    <p><strong><?php echo $this->_tpl_vars['LANG']['networkissuesaffecting']; ?>
 <?php echo $this->_tpl_vars['issue']['type']; ?>
</strong> - <?php if ($this->_tpl_vars['issue']['type'] == $this->_tpl_vars['LANG']['networkissuestypeserver']): ?><?php echo $this->_tpl_vars['issue']['server']; ?>
<?php else: ?><?php echo $this->_tpl_vars['issue']['affecting']; ?>
<?php endif; ?> | <strong><?php echo $this->_tpl_vars['LANG']['networkissuespriority']; ?>
</strong> - <?php echo $this->_tpl_vars['issue']['priority']; ?>
</span></p>
    <br />
    <blockquote>
    <?php echo $this->_tpl_vars['issue']['description']; ?>

    </blockquote>
    <p><strong><?php echo $this->_tpl_vars['LANG']['networkissuesdate']; ?>
</strong> - <?php echo $this->_tpl_vars['issue']['startdate']; ?>
<?php if ($this->_tpl_vars['issue']['enddate']): ?> - <?php echo $this->_tpl_vars['issue']['enddate']; ?>
<?php endif; ?></p>
    <p><strong><?php echo $this->_tpl_vars['LANG']['networkissueslastupdated']; ?>
</strong> - <?php echo $this->_tpl_vars['issue']['lastupdate']; ?>
</p>

<?php if ($this->_tpl_vars['issue']['clientaffected']): ?></div><?php endif; ?>

<?php endforeach; else: ?>

<p class="textcenter"><strong><?php echo $this->_tpl_vars['noissuesmsg']; ?>
</strong></p>

<?php endif; unset($_from); ?>

<div class="pagination">
    <ul>
        <li class="prev<?php if (! $this->_tpl_vars['prevpage']): ?> disabled<?php endif; ?>"><a href="<?php if ($this->_tpl_vars['prevpage']): ?><?php echo $_SERVER['PHP_SELF']; ?>
?<?php if ($this->_tpl_vars['view']): ?>view=<?php echo $this->_tpl_vars['view']; ?>
&amp;<?php endif; ?>page=<?php echo $this->_tpl_vars['prevpage']; ?>
<?php else: ?>javascript:return false;<?php endif; ?>">&larr; <?php echo $this->_tpl_vars['LANG']['previouspage']; ?>
</a></li>
        <li class="next<?php if (! $this->_tpl_vars['nextpage']): ?> disabled<?php endif; ?>"><a href="<?php if ($this->_tpl_vars['nextpage']): ?><?php echo $_SERVER['PHP_SELF']; ?>
?<?php if ($this->_tpl_vars['view']): ?>view=<?php echo $this->_tpl_vars['view']; ?>
&amp;<?php endif; ?>page=<?php echo $this->_tpl_vars['nextpage']; ?>
<?php else: ?>javascript:return false;<?php endif; ?>"><?php echo $this->_tpl_vars['LANG']['nextpage']; ?>
 &rarr;</a></li>
    </ul>
</div>

<?php if ($this->_tpl_vars['servers']): ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['template'])."/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['LANG']['serverstatustitle'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<p><?php echo $this->_tpl_vars['LANG']['serverstatusheadingtext']; ?>
</p>

<br />

<?php echo '
<script>
function getStats(num) {
    jQuery.post(\'serverstatus.php\', \'getstats=1&num=\'+num, function(data) {
        jQuery("#load"+num).html(data.load);
        jQuery("#uptime"+num).html(data.uptime);
    },\'json\');
}
function checkPort(num,port) {
    jQuery.post(\'serverstatus.php\', \'ping=1&num=\'+num+\'&port=\'+port, function(data) {
        jQuery("#port"+port+"_"+num).html(data);
    });
}
</script>
'; ?>


<div class="center80">

<table class="table table-striped table-framed">
    <thead>
        <tr>
            <th><?php echo $this->_tpl_vars['LANG']['servername']; ?>
</th>
            <th class="textcenter">HTTP</th>
            <th class="textcenter">FTP</th>
            <th class="textcenter">POP3</th>
            <th class="textcenter"><?php echo $this->_tpl_vars['LANG']['serverstatusphpinfo']; ?>
</th>
            <th class="textcenter"><?php echo $this->_tpl_vars['LANG']['serverstatusserverload']; ?>
</th>
            <th class="textcenter"><?php echo $this->_tpl_vars['LANG']['serverstatusuptime']; ?>
</th>
        </tr>
    </thead>
    <tbody>
<?php $_from = $this->_tpl_vars['servers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['server']):
?>
        <tr>
            <td><?php echo $this->_tpl_vars['server']['name']; ?>
</td>
            <td class="textcenter" id="port80_<?php echo $this->_tpl_vars['num']; ?>
"><img src="images/loadingsml.gif" alt="<?php echo $this->_tpl_vars['LANG']['loading']; ?>
" /></td>
            <td class="textcenter" id="port21_<?php echo $this->_tpl_vars['num']; ?>
"><img src="images/loadingsml.gif" alt="<?php echo $this->_tpl_vars['LANG']['loading']; ?>
" /></td>
            <td class="textcenter" id="port110_<?php echo $this->_tpl_vars['num']; ?>
"><img src="images/loadingsml.gif" alt="<?php echo $this->_tpl_vars['LANG']['loading']; ?>
" /></td>
            <td class="textcenter"><a href="<?php echo $this->_tpl_vars['server']['phpinfourl']; ?>
" target="_blank"><?php echo $this->_tpl_vars['LANG']['serverstatusphpinfo']; ?>
</a></td>
            <td class="textcenter" id="load<?php echo $this->_tpl_vars['num']; ?>
"><img src="images/loadingsml.gif" alt="<?php echo $this->_tpl_vars['LANG']['loading']; ?>
" /></td>
            <td class="textcenter" id="uptime<?php echo $this->_tpl_vars['num']; ?>
"><img src="images/loadingsml.gif" alt="<?php echo $this->_tpl_vars['LANG']['loading']; ?>
" /><script> checkPort(<?php echo $this->_tpl_vars['num']; ?>
,80); checkPort(<?php echo $this->_tpl_vars['num']; ?>
,21); checkPort(<?php echo $this->_tpl_vars['num']; ?>
,110); getStats(<?php echo $this->_tpl_vars['num']; ?>
); </script></td>
        </tr>
<?php endforeach; else: ?>
        <tr>
            <td colspan="7"><?php echo $this->_tpl_vars['LANG']['serverstatusnoservers']; ?>
</td>
        </tr>
<?php endif; unset($_from); ?>
    </tbody>
</table>

</div>

<?php endif; ?>

<?php if ($this->_tpl_vars['loggedin']): ?><p><?php echo $this->_tpl_vars['LANG']['networkissuesaffectingyourservers']; ?>
</p><?php endif; ?>

<br />
<p align="right"><img src="images/rssfeed.gif" alt="RSS" align="absmiddle" /> <a href="networkissuesrss.php"><?php echo $this->_tpl_vars['LANG']['announcementsrss']; ?>
</a></p>
<br />