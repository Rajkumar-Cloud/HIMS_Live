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
$pres_genericinteractions_edit = new pres_genericinteractions_edit();

// Run the page
$pres_genericinteractions_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_genericinteractions_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_genericinteractionsedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpres_genericinteractionsedit = currentForm = new ew.Form("fpres_genericinteractionsedit", "edit");

	// Validate form
	fpres_genericinteractionsedit.validate = function() {
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
			<?php if ($pres_genericinteractions_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_edit->id->caption(), $pres_genericinteractions_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_genericinteractions_edit->Genericname->Required) { ?>
				elm = this.getElements("x" + infix + "_Genericname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_edit->Genericname->caption(), $pres_genericinteractions_edit->Genericname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_genericinteractions_edit->Catid->Required) { ?>
				elm = this.getElements("x" + infix + "_Catid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_edit->Catid->caption(), $pres_genericinteractions_edit->Catid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Catid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_genericinteractions_edit->Catid->errorMessage()) ?>");
			<?php if ($pres_genericinteractions_edit->Interactions->Required) { ?>
				elm = this.getElements("x" + infix + "_Interactions");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_edit->Interactions->caption(), $pres_genericinteractions_edit->Interactions->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_genericinteractions_edit->Intid->Required) { ?>
				elm = this.getElements("x" + infix + "_Intid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_edit->Intid->caption(), $pres_genericinteractions_edit->Intid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Intid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_genericinteractions_edit->Intid->errorMessage()) ?>");
			<?php if ($pres_genericinteractions_edit->Createddt->Required) { ?>
				elm = this.getElements("x" + infix + "_Createddt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_edit->Createddt->caption(), $pres_genericinteractions_edit->Createddt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Createddt");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_genericinteractions_edit->Createddt->errorMessage()) ?>");
			<?php if ($pres_genericinteractions_edit->Createdtm->Required) { ?>
				elm = this.getElements("x" + infix + "_Createdtm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_edit->Createdtm->caption(), $pres_genericinteractions_edit->Createdtm->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Createdtm");
				if (elm && !ew.checkTime(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_genericinteractions_edit->Createdtm->errorMessage()) ?>");
			<?php if ($pres_genericinteractions_edit->Statusbit->Required) { ?>
				elm = this.getElements("x" + infix + "_Statusbit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_edit->Statusbit->caption(), $pres_genericinteractions_edit->Statusbit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Statusbit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_genericinteractions_edit->Statusbit->errorMessage()) ?>");
			<?php if ($pres_genericinteractions_edit->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_edit->Remarks->caption(), $pres_genericinteractions_edit->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_genericinteractions_edit->Username->Required) { ?>
				elm = this.getElements("x" + infix + "_Username");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_edit->Username->caption(), $pres_genericinteractions_edit->Username->RequiredErrorMessage)) ?>");
			<?php } ?>

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
	fpres_genericinteractionsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_genericinteractionsedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpres_genericinteractionsedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_genericinteractions_edit->showPageHeader(); ?>
<?php
$pres_genericinteractions_edit->showMessage();
?>
<form name="fpres_genericinteractionsedit" id="fpres_genericinteractionsedit" class="<?php echo $pres_genericinteractions_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_genericinteractions">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pres_genericinteractions_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pres_genericinteractions_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pres_genericinteractions_id" class="<?php echo $pres_genericinteractions_edit->LeftColumnClass ?>"><?php echo $pres_genericinteractions_edit->id->caption() ?><?php echo $pres_genericinteractions_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_edit->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_edit->id->cellAttributes() ?>>
<span id="el_pres_genericinteractions_id">
<span<?php echo $pres_genericinteractions_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_genericinteractions_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_genericinteractions" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pres_genericinteractions_edit->id->CurrentValue) ?>">
<?php echo $pres_genericinteractions_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_genericinteractions_edit->Genericname->Visible) { // Genericname ?>
	<div id="r_Genericname" class="form-group row">
		<label id="elh_pres_genericinteractions_Genericname" for="x_Genericname" class="<?php echo $pres_genericinteractions_edit->LeftColumnClass ?>"><?php echo $pres_genericinteractions_edit->Genericname->caption() ?><?php echo $pres_genericinteractions_edit->Genericname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_edit->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_edit->Genericname->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Genericname">
<input type="text" data-table="pres_genericinteractions" data-field="x_Genericname" name="x_Genericname" id="x_Genericname" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_genericinteractions_edit->Genericname->getPlaceHolder()) ?>" value="<?php echo $pres_genericinteractions_edit->Genericname->EditValue ?>"<?php echo $pres_genericinteractions_edit->Genericname->editAttributes() ?>>
</span>
<?php echo $pres_genericinteractions_edit->Genericname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_genericinteractions_edit->Catid->Visible) { // Catid ?>
	<div id="r_Catid" class="form-group row">
		<label id="elh_pres_genericinteractions_Catid" for="x_Catid" class="<?php echo $pres_genericinteractions_edit->LeftColumnClass ?>"><?php echo $pres_genericinteractions_edit->Catid->caption() ?><?php echo $pres_genericinteractions_edit->Catid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_edit->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_edit->Catid->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Catid">
<input type="text" data-table="pres_genericinteractions" data-field="x_Catid" name="x_Catid" id="x_Catid" size="30" placeholder="<?php echo HtmlEncode($pres_genericinteractions_edit->Catid->getPlaceHolder()) ?>" value="<?php echo $pres_genericinteractions_edit->Catid->EditValue ?>"<?php echo $pres_genericinteractions_edit->Catid->editAttributes() ?>>
</span>
<?php echo $pres_genericinteractions_edit->Catid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_genericinteractions_edit->Interactions->Visible) { // Interactions ?>
	<div id="r_Interactions" class="form-group row">
		<label id="elh_pres_genericinteractions_Interactions" for="x_Interactions" class="<?php echo $pres_genericinteractions_edit->LeftColumnClass ?>"><?php echo $pres_genericinteractions_edit->Interactions->caption() ?><?php echo $pres_genericinteractions_edit->Interactions->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_edit->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_edit->Interactions->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Interactions">
<input type="text" data-table="pres_genericinteractions" data-field="x_Interactions" name="x_Interactions" id="x_Interactions" placeholder="<?php echo HtmlEncode($pres_genericinteractions_edit->Interactions->getPlaceHolder()) ?>" value="<?php echo $pres_genericinteractions_edit->Interactions->EditValue ?>"<?php echo $pres_genericinteractions_edit->Interactions->editAttributes() ?>>
</span>
<?php echo $pres_genericinteractions_edit->Interactions->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_genericinteractions_edit->Intid->Visible) { // Intid ?>
	<div id="r_Intid" class="form-group row">
		<label id="elh_pres_genericinteractions_Intid" for="x_Intid" class="<?php echo $pres_genericinteractions_edit->LeftColumnClass ?>"><?php echo $pres_genericinteractions_edit->Intid->caption() ?><?php echo $pres_genericinteractions_edit->Intid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_edit->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_edit->Intid->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Intid">
<input type="text" data-table="pres_genericinteractions" data-field="x_Intid" name="x_Intid" id="x_Intid" size="30" placeholder="<?php echo HtmlEncode($pres_genericinteractions_edit->Intid->getPlaceHolder()) ?>" value="<?php echo $pres_genericinteractions_edit->Intid->EditValue ?>"<?php echo $pres_genericinteractions_edit->Intid->editAttributes() ?>>
</span>
<?php echo $pres_genericinteractions_edit->Intid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_genericinteractions_edit->Createddt->Visible) { // Createddt ?>
	<div id="r_Createddt" class="form-group row">
		<label id="elh_pres_genericinteractions_Createddt" for="x_Createddt" class="<?php echo $pres_genericinteractions_edit->LeftColumnClass ?>"><?php echo $pres_genericinteractions_edit->Createddt->caption() ?><?php echo $pres_genericinteractions_edit->Createddt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_edit->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_edit->Createddt->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Createddt">
<input type="text" data-table="pres_genericinteractions" data-field="x_Createddt" name="x_Createddt" id="x_Createddt" placeholder="<?php echo HtmlEncode($pres_genericinteractions_edit->Createddt->getPlaceHolder()) ?>" value="<?php echo $pres_genericinteractions_edit->Createddt->EditValue ?>"<?php echo $pres_genericinteractions_edit->Createddt->editAttributes() ?>>
<?php if (!$pres_genericinteractions_edit->Createddt->ReadOnly && !$pres_genericinteractions_edit->Createddt->Disabled && !isset($pres_genericinteractions_edit->Createddt->EditAttrs["readonly"]) && !isset($pres_genericinteractions_edit->Createddt->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpres_genericinteractionsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpres_genericinteractionsedit", "x_Createddt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pres_genericinteractions_edit->Createddt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_genericinteractions_edit->Createdtm->Visible) { // Createdtm ?>
	<div id="r_Createdtm" class="form-group row">
		<label id="elh_pres_genericinteractions_Createdtm" for="x_Createdtm" class="<?php echo $pres_genericinteractions_edit->LeftColumnClass ?>"><?php echo $pres_genericinteractions_edit->Createdtm->caption() ?><?php echo $pres_genericinteractions_edit->Createdtm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_edit->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_edit->Createdtm->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Createdtm">
<input type="text" data-table="pres_genericinteractions" data-field="x_Createdtm" name="x_Createdtm" id="x_Createdtm" placeholder="<?php echo HtmlEncode($pres_genericinteractions_edit->Createdtm->getPlaceHolder()) ?>" value="<?php echo $pres_genericinteractions_edit->Createdtm->EditValue ?>"<?php echo $pres_genericinteractions_edit->Createdtm->editAttributes() ?>>
<?php if (!$pres_genericinteractions_edit->Createdtm->ReadOnly && !$pres_genericinteractions_edit->Createdtm->Disabled && !isset($pres_genericinteractions_edit->Createdtm->EditAttrs["readonly"]) && !isset($pres_genericinteractions_edit->Createdtm->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpres_genericinteractionsedit", "timepicker"], function() {
	ew.createTimePicker("fpres_genericinteractionsedit", "x_Createdtm", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
<?php echo $pres_genericinteractions_edit->Createdtm->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_genericinteractions_edit->Statusbit->Visible) { // Statusbit ?>
	<div id="r_Statusbit" class="form-group row">
		<label id="elh_pres_genericinteractions_Statusbit" for="x_Statusbit" class="<?php echo $pres_genericinteractions_edit->LeftColumnClass ?>"><?php echo $pres_genericinteractions_edit->Statusbit->caption() ?><?php echo $pres_genericinteractions_edit->Statusbit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_edit->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_edit->Statusbit->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Statusbit">
<input type="text" data-table="pres_genericinteractions" data-field="x_Statusbit" name="x_Statusbit" id="x_Statusbit" size="30" placeholder="<?php echo HtmlEncode($pres_genericinteractions_edit->Statusbit->getPlaceHolder()) ?>" value="<?php echo $pres_genericinteractions_edit->Statusbit->EditValue ?>"<?php echo $pres_genericinteractions_edit->Statusbit->editAttributes() ?>>
</span>
<?php echo $pres_genericinteractions_edit->Statusbit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_genericinteractions_edit->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_pres_genericinteractions_Remarks" for="x_Remarks" class="<?php echo $pres_genericinteractions_edit->LeftColumnClass ?>"><?php echo $pres_genericinteractions_edit->Remarks->caption() ?><?php echo $pres_genericinteractions_edit->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_edit->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_edit->Remarks->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Remarks">
<input type="text" data-table="pres_genericinteractions" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" placeholder="<?php echo HtmlEncode($pres_genericinteractions_edit->Remarks->getPlaceHolder()) ?>" value="<?php echo $pres_genericinteractions_edit->Remarks->EditValue ?>"<?php echo $pres_genericinteractions_edit->Remarks->editAttributes() ?>>
</span>
<?php echo $pres_genericinteractions_edit->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_genericinteractions_edit->Username->Visible) { // Username ?>
	<div id="r_Username" class="form-group row">
		<label id="elh_pres_genericinteractions_Username" for="x_Username" class="<?php echo $pres_genericinteractions_edit->LeftColumnClass ?>"><?php echo $pres_genericinteractions_edit->Username->caption() ?><?php echo $pres_genericinteractions_edit->Username->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_edit->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_edit->Username->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Username">
<input type="text" data-table="pres_genericinteractions" data-field="x_Username" name="x_Username" id="x_Username" placeholder="<?php echo HtmlEncode($pres_genericinteractions_edit->Username->getPlaceHolder()) ?>" value="<?php echo $pres_genericinteractions_edit->Username->EditValue ?>"<?php echo $pres_genericinteractions_edit->Username->editAttributes() ?>>
</span>
<?php echo $pres_genericinteractions_edit->Username->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_genericinteractions_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_genericinteractions_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_genericinteractions_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_genericinteractions_edit->showPageFooter();
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
$pres_genericinteractions_edit->terminate();
?>