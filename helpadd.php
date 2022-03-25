<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$help_add = new help_add();

// Run the page
$help_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$help_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fhelpadd = currentForm = new ew.Form("fhelpadd", "add");

// Validate form
fhelpadd.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($help_add->Tittle->Required) { ?>
			elm = this.getElements("x" + infix + "_Tittle");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $help->Tittle->caption(), $help->Tittle->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($help_add->Description->Required) { ?>
			elm = this.getElements("x" + infix + "_Description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $help->Description->caption(), $help->Description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($help_add->orderid->Required) { ?>
			elm = this.getElements("x" + infix + "_orderid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $help->orderid->caption(), $help->orderid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_orderid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($help->orderid->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
fhelpadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhelpadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $help_add->showPageHeader(); ?>
<?php
$help_add->showMessage();
?>
<form name="fhelpadd" id="fhelpadd" class="<?php echo $help_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($help_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $help_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="help">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$help_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($help->Tittle->Visible) { // Tittle ?>
	<div id="r_Tittle" class="form-group row">
		<label id="elh_help_Tittle" for="x_Tittle" class="<?php echo $help_add->LeftColumnClass ?>"><script id="tpc_help_Tittle" class="helpadd" type="text/html"><span><?php echo $help->Tittle->caption() ?><?php echo ($help->Tittle->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $help_add->RightColumnClass ?>"><div<?php echo $help->Tittle->cellAttributes() ?>>
<script id="tpx_help_Tittle" class="helpadd" type="text/html">
<span id="el_help_Tittle">
<input type="text" data-table="help" data-field="x_Tittle" name="x_Tittle" id="x_Tittle" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($help->Tittle->getPlaceHolder()) ?>" value="<?php echo $help->Tittle->EditValue ?>"<?php echo $help->Tittle->editAttributes() ?>>
</span>
</script>
<?php echo $help->Tittle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($help->Description->Visible) { // Description ?>
	<div id="r_Description" class="form-group row">
		<label id="elh_help_Description" class="<?php echo $help_add->LeftColumnClass ?>"><script id="tpc_help_Description" class="helpadd" type="text/html"><span><?php echo $help->Description->caption() ?><?php echo ($help->Description->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $help_add->RightColumnClass ?>"><div<?php echo $help->Description->cellAttributes() ?>>
<script id="tpx_help_Description" class="helpadd" type="text/html">
<span id="el_help_Description">
<?php AppendClass($help->Description->EditAttrs["class"], "editor"); ?>
<textarea data-table="help" data-field="x_Description" name="x_Description" id="x_Description" cols="35" rows="400" placeholder="<?php echo HtmlEncode($help->Description->getPlaceHolder()) ?>"<?php echo $help->Description->editAttributes() ?>><?php echo $help->Description->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="helpadd_js">
ew.createEditor("fhelpadd", "x_Description", 35, 400, <?php echo ($help->Description->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $help->Description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($help->orderid->Visible) { // orderid ?>
	<div id="r_orderid" class="form-group row">
		<label id="elh_help_orderid" for="x_orderid" class="<?php echo $help_add->LeftColumnClass ?>"><script id="tpc_help_orderid" class="helpadd" type="text/html"><span><?php echo $help->orderid->caption() ?><?php echo ($help->orderid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $help_add->RightColumnClass ?>"><div<?php echo $help->orderid->cellAttributes() ?>>
<script id="tpx_help_orderid" class="helpadd" type="text/html">
<span id="el_help_orderid">
<input type="text" data-table="help" data-field="x_orderid" name="x_orderid" id="x_orderid" size="30" placeholder="<?php echo HtmlEncode($help->orderid->getPlaceHolder()) ?>" value="<?php echo $help->orderid->EditValue ?>"<?php echo $help->orderid->editAttributes() ?>>
</span>
</script>
<?php echo $help->orderid->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_helpadd" class="ew-custom-template"></div>
<script id="tpm_helpadd" type="text/html">
<div id="ct_help_add">
<style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
{{include tmpl="#tpc_help_Tittle"/}}&nbsp;{{include tmpl="#tpx_help_Tittle"/}}
<br>
{{include tmpl="#tpc_help_Description"/}}&nbsp;{{include tmpl="#tpx_help_Description"/}}
</div>
</script>
<?php if (!$help_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $help_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $help_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($help->Rows) ?> };
ew.applyTemplate("tpd_helpadd", "tpm_helpadd", "helpadd", "<?php echo $help->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.helpadd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$help_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$help_add->terminate();
?>