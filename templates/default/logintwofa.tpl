<div class="halfwidthcontainer">

{include file="$template/pageheader.tpl" title=$LANG.twofactorauth}

{if $newbackupcode}
<div class="alert alert-success textcenter">
    <p>{$LANG.twofabackupcodereset}</p>
</div>
{elseif $incorrect}
<div class="alert alert-error textcenter">
    <p>{$LANG.twofa2ndfactorincorrect}</p>
</div>
{elseif $error}
<div class="alert alert-error textcenter">
    <p>{$error}</p>
</div>
{else}
<div class="alert alert-warning textcenter">
    <p>{$LANG.twofa2ndfactorreq}</p>
</div>
{/if}

<form method="post" action="{$systemsslurl}dologin.php" class="form-stacked" name="frmlogin">

<br />

{$challenge}

<br />

<div class="alert alert-block alert-info textcenter">
{$LANG.twofacantaccess2ndfactor} <a href="login.php?backupcode=1">{$LANG.twofaloginusingbackupcode}</a></p>
</div>

</form>

<br /><br /><br /><br />

</div>