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
$vitals_edit = new vitals_edit();

// Run the page
$vitals_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vitals_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fvitalsedit = currentForm = new ew.Form("fvitalsedit", "edit");

// Validate form
fvitalsedit.validate = function() {
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
		<?php if ($vitals_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vitals->id->caption(), $vitals->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($vitals_edit->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vitals->Reception->caption(), $vitals->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($vitals->Reception->errorMessage()) ?>");
		<?php if ($vitals_edit->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vitals->PatientId->caption(), $vitals->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($vitals_edit->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vitals->PatientName->caption(), $vitals->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($vitals_edit->HT->Required) { ?>
			elm = this.getElements("x" + infix + "_HT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vitals->HT->caption(), $vitals->HT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($vitals_edit->WT->Required) { ?>
			elm = this.getElements("x" + infix + "_WT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vitals->WT->caption(), $vitals->WT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($vitals_edit->BP->Required) { ?>
			elm = this.getElements("x" + infix + "_BP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vitals->BP->caption(), $vitals->BP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($vitals_edit->PULSE->Required) { ?>
			elm = this.getElements("x" + infix + "_PULSE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vitals->PULSE->caption(), $vitals->PULSE->RequiredErrorMessage)) ?>");
		<?php } ?>

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
fvitalsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fvitalsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $vitals_edit->showPageHeader(); ?>
<?php
$vitals_edit->showMessage();
?>
<form name="fvitalsedit" id="fvitalsedit" class="<?php echo $vitals_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($vitals_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $vitals_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vitals">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$vitals_edit->IsModal ?>">
<?php if ($vitals->getCurrentMasterTable() == "reception") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="reception">
<input type="hidden" name="fk_PatientName" value="<?php echo $vitals->PatientName->getSessionValue() ?>">
<input type="hidden" name="fk_PatientID" value="<?php echo $vitals->PatientId->getSessionValue() ?>">
<input type="hidden" name="fk_id" value="<?php echo $vitals->Reception->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($vitals->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_vitals_id" class="<?php echo $vitals_edit->LeftColumnClass ?>"><?php echo $vitals->id->caption() ?><?php echo ($vitals->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vitals_edit->RightColumnClass ?>"><div<?php echo $vitals->id->cellAttributes() ?>>
<span id="el_vitals_id">
<span<?php echo $vitals->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="vitals" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($vitals->id->CurrentValue) ?>">
<?php echo $vitals->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vitals->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_vitals_Reception" for="x_Reception" class="<?php echo $vitals_edit->LeftColumnClass ?>"><?php echo $vitals->Reception->caption() ?><?php echo ($vitals->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vitals_edit->RightColumnClass ?>"><div<?php echo $vitals->Reception->cellAttributes() ?>>
<?php if ($vitals->Reception->getSessionValue() <> "") { ?>
<span id="el_vitals_Reception">
<span<?php echo $vitals->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?php echo HtmlEncode($vitals->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el_vitals_Reception">
<input type="text" data-table="vitals" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($vitals->Reception->getPlaceHolder()) ?>" value="<?php echo $vitals->Reception->EditValue ?>"<?php echo $vitals->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $vitals->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vitals->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_vitals_PatientId" for="x_PatientId" class="<?php echo $vitals_edit->LeftColumnClass ?>"><?php echo $vitals->PatientId->caption() ?><?php echo ($vitals->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vitals_edit->RightColumnClass ?>"><div<?php echo $vitals->PatientId->cellAttributes() ?>>
<?php if ($vitals->PatientId->getSessionValue() <> "") { ?>
<span id="el_vitals_PatientId">
<span<?php echo $vitals->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_PatientId" name="x_PatientId" value="<?php echo HtmlEncode($vitals->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el_vitals_PatientId">
<input type="text" data-table="vitals" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->PatientId->getPlaceHolder()) ?>" value="<?php echo $vitals->PatientId->EditValue ?>"<?php echo $vitals->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $vitals->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vitals->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_vitals_PatientName" for="x_PatientName" class="<?php echo $vitals_edit->LeftColumnClass ?>"><?php echo $vitals->PatientName->caption() ?><?php echo ($vitals->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vitals_edit->RightColumnClass ?>"><div<?php echo $vitals->PatientName->cellAttributes() ?>>
<?php if ($vitals->PatientName->getSessionValue() <> "") { ?>
<span id="el_vitals_PatientName">
<span<?php echo $vitals->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_PatientName" name="x_PatientName" value="<?php echo HtmlEncode($vitals->PatientName->CurrentValue) ?>">
<?php } else { ?>
<span id="el_vitals_PatientName">
<input type="text" data-table="vitals" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->PatientName->getPlaceHolder()) ?>" value="<?php echo $vitals->PatientName->EditValue ?>"<?php echo $vitals->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $vitals->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vitals->HT->Visible) { // HT ?>
	<div id="r_HT" class="form-group row">
		<label id="elh_vitals_HT" for="x_HT" class="<?php echo $vitals_edit->LeftColumnClass ?>"><?php echo $vitals->HT->caption() ?><?php echo ($vitals->HT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vitals_edit->RightColumnClass ?>"><div<?php echo $vitals->HT->cellAttributes() ?>>
<span id="el_vitals_HT">
<input type="text" data-table="vitals" data-field="x_HT" name="x_HT" id="x_HT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->HT->getPlaceHolder()) ?>" value="<?php echo $vitals->HT->EditValue ?>"<?php echo $vitals->HT->editAttributes() ?>>
</span>
<?php echo $vitals->HT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vitals->WT->Visible) { // WT ?>
	<div id="r_WT" class="form-group row">
		<label id="elh_vitals_WT" for="x_WT" class="<?php echo $vitals_edit->LeftColumnClass ?>"><?php echo $vitals->WT->caption() ?><?php echo ($vitals->WT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vitals_edit->RightColumnClass ?>"><div<?php echo $vitals->WT->cellAttributes() ?>>
<span id="el_vitals_WT">
<input type="text" data-table="vitals" data-field="x_WT" name="x_WT" id="x_WT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->WT->getPlaceHolder()) ?>" value="<?php echo $vitals->WT->EditValue ?>"<?php echo $vitals->WT->editAttributes() ?>>
</span>
<?php echo $vitals->WT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vitals->BP->Visible) { // BP ?>
	<div id="r_BP" class="form-group row">
		<label id="elh_vitals_BP" for="x_BP" class="<?php echo $vitals_edit->LeftColumnClass ?>"><?php echo $vitals->BP->caption() ?><?php echo ($vitals->BP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vitals_edit->RightColumnClass ?>"><div<?php echo $vitals->BP->cellAttributes() ?>>
<span id="el_vitals_BP">
<input type="text" data-table="vitals" data-field="x_BP" name="x_BP" id="x_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->BP->getPlaceHolder()) ?>" value="<?php echo $vitals->BP->EditValue ?>"<?php echo $vitals->BP->editAttributes() ?>>
</span>
<?php echo $vitals->BP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($vitals->PULSE->Visible) { // PULSE ?>
	<div id="r_PULSE" class="form-group row">
		<label id="elh_vitals_PULSE" for="x_PULSE" class="<?php echo $vitals_edit->LeftColumnClass ?>"><?php echo $vitals->PULSE->caption() ?><?php echo ($vitals->PULSE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $vitals_edit->RightColumnClass ?>"><div<?php echo $vitals->PULSE->cellAttributes() ?>>
<span id="el_vitals_PULSE">
<input type="text" data-table="vitals" data-field="x_PULSE" name="x_PULSE" id="x_PULSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->PULSE->getPlaceHolder()) ?>" value="<?php echo $vitals->PULSE->EditValue ?>"<?php echo $vitals->PULSE->editAttributes() ?>>
</span>
<?php echo $vitals->PULSE->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$vitals_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $vitals_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $vitals_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$vitals_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$vitals_edit->terminate();
?>