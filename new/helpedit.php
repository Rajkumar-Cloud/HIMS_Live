<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$help_edit = new help_edit();

// Run the page
$help_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$help_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fhelpedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fhelpedit = currentForm = new ew.Form("fhelpedit", "edit");

	// Validate form
	fhelpedit.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($help_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $help_edit->id->caption(), $help_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($help_edit->Tittle->Required) { ?>
				elm = this.getElements("x" + infix + "_Tittle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $help_edit->Tittle->caption(), $help_edit->Tittle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($help_edit->Description->Required) { ?>
				elm = this.getElements("x" + infix + "_Description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $help_edit->Description->caption(), $help_edit->Description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($help_edit->orderid->Required) { ?>
				elm = this.getElements("x" + infix + "_orderid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $help_edit->orderid->caption(), $help_edit->orderid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_orderid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($help_edit->orderid->errorMessage()) ?>");

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fhelpedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fhelpedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fhelpedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $help_edit->showPageHeader(); ?>
<?php
$help_edit->showMessage();
?>
<form name="fhelpedit" id="fhelpedit" class="<?php echo $help_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="help">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$help_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($help_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_help_id" class="<?php echo $help_edit->LeftColumnClass ?>"><script id="tpc_help_id" type="text/html"><?php echo $help_edit->id->caption() ?><?php echo $help_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $help_edit->RightColumnClass ?>"><div <?php echo $help_edit->id->cellAttributes() ?>>
<script id="tpx_help_id" type="text/html"><span id="el_help_id">
<span<?php echo $help_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($help_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="help" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($help_edit->id->CurrentValue) ?>">
<?php echo $help_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($help_edit->Tittle->Visible) { // Tittle ?>
	<div id="r_Tittle" class="form-group row">
		<label id="elh_help_Tittle" for="x_Tittle" class="<?php echo $help_edit->LeftColumnClass ?>"><script id="tpc_help_Tittle" type="text/html"><?php echo $help_edit->Tittle->caption() ?><?php echo $help_edit->Tittle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $help_edit->RightColumnClass ?>"><div <?php echo $help_edit->Tittle->cellAttributes() ?>>
<script id="tpx_help_Tittle" type="text/html"><span id="el_help_Tittle">
<input type="text" data-table="help" data-field="x_Tittle" name="x_Tittle" id="x_Tittle" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($help_edit->Tittle->getPlaceHolder()) ?>" value="<?php echo $help_edit->Tittle->EditValue ?>"<?php echo $help_edit->Tittle->editAttributes() ?>>
</span></script>
<?php echo $help_edit->Tittle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($help_edit->Description->Visible) { // Description ?>
	<div id="r_Description" class="form-group row">
		<label id="elh_help_Description" class="<?php echo $help_edit->LeftColumnClass ?>"><script id="tpc_help_Description" type="text/html"><?php echo $help_edit->Description->caption() ?><?php echo $help_edit->Description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $help_edit->RightColumnClass ?>"><div <?php echo $help_edit->Description->cellAttributes() ?>>
<script id="tpx_help_Description" type="text/html"><span id="el_help_Description">
<?php $help_edit->Description->EditAttrs->appendClass("editor"); ?>
<textarea data-table="help" data-field="x_Description" name="x_Description" id="x_Description" cols="35" rows="400" placeholder="<?php echo HtmlEncode($help_edit->Description->getPlaceHolder()) ?>"<?php echo $help_edit->Description->editAttributes() ?>><?php echo $help_edit->Description->EditValue ?></textarea>
</span></script>
<script type="text/html" class="helpedit_js">
loadjs.ready(["fhelpedit", "editor"], function() {
	ew.createEditor("fhelpedit", "x_Description", 35, 400, <?php echo $help_edit->Description->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $help_edit->Description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($help_edit->orderid->Visible) { // orderid ?>
	<div id="r_orderid" class="form-group row">
		<label id="elh_help_orderid" for="x_orderid" class="<?php echo $help_edit->LeftColumnClass ?>"><script id="tpc_help_orderid" type="text/html"><?php echo $help_edit->orderid->caption() ?><?php echo $help_edit->orderid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $help_edit->RightColumnClass ?>"><div <?php echo $help_edit->orderid->cellAttributes() ?>>
<script id="tpx_help_orderid" type="text/html"><span id="el_help_orderid">
<input type="text" data-table="help" data-field="x_orderid" name="x_orderid" id="x_orderid" size="30" placeholder="<?php echo HtmlEncode($help_edit->orderid->getPlaceHolder()) ?>" value="<?php echo $help_edit->orderid->EditValue ?>"<?php echo $help_edit->orderid->editAttributes() ?>>
</span></script>
<?php echo $help_edit->orderid->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_helpedit" class="ew-custom-template"></div>
<script id="tpm_helpedit" type="text/html">
<div id="ct_help_edit">
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
{{include tmpl="#tpc_help_Tittle"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_help_Tittle")/}}
<br>
{{include tmpl="#tpc_help_Description"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_help_Description")/}}
</div>
</script>

<?php if (!$help_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $help_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $help_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($help->Rows) ?> };
	ew.applyTemplate("tpd_helpedit", "tpm_helpedit", "helpedit", "<?php echo $help->CustomExport ?>", ew.templateData.rows[0]);
	$("script.helpedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$help_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$help_edit->terminate();
?>