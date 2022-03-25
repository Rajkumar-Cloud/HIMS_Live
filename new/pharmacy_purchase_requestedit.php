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
$pharmacy_purchase_request_edit = new pharmacy_purchase_request_edit();

// Run the page
$pharmacy_purchase_request_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchase_request_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_purchase_requestedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpharmacy_purchase_requestedit = currentForm = new ew.Form("fpharmacy_purchase_requestedit", "edit");

	// Validate form
	fpharmacy_purchase_requestedit.validate = function() {
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
			<?php if ($pharmacy_purchase_request_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_edit->id->caption(), $pharmacy_purchase_request_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_edit->DT->Required) { ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_edit->DT->caption(), $pharmacy_purchase_request_edit->DT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchase_request_edit->DT->errorMessage()) ?>");
			<?php if ($pharmacy_purchase_request_edit->EmployeeName->Required) { ?>
				elm = this.getElements("x" + infix + "_EmployeeName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_edit->EmployeeName->caption(), $pharmacy_purchase_request_edit->EmployeeName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_edit->Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_edit->Department->caption(), $pharmacy_purchase_request_edit->Department->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_edit->HospID->caption(), $pharmacy_purchase_request_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_edit->modifiedby->caption(), $pharmacy_purchase_request_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_edit->modifieddatetime->caption(), $pharmacy_purchase_request_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_edit->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_edit->BRCODE->caption(), $pharmacy_purchase_request_edit->BRCODE->RequiredErrorMessage)) ?>");
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
	fpharmacy_purchase_requestedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_purchase_requestedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpharmacy_purchase_requestedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_purchase_request_edit->showPageHeader(); ?>
<?php
$pharmacy_purchase_request_edit->showMessage();
?>
<form name="fpharmacy_purchase_requestedit" id="fpharmacy_purchase_requestedit" class="<?php echo $pharmacy_purchase_request_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_purchase_request_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_purchase_request_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_purchase_request_id" class="<?php echo $pharmacy_purchase_request_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchase_request_edit->id->caption() ?><?php echo $pharmacy_purchase_request_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchase_request_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchase_request_edit->id->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_id">
<span<?php echo $pharmacy_purchase_request_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_edit->id->CurrentValue) ?>">
<?php echo $pharmacy_purchase_request_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_edit->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_pharmacy_purchase_request_DT" for="x_DT" class="<?php echo $pharmacy_purchase_request_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchase_request_edit->DT->caption() ?><?php echo $pharmacy_purchase_request_edit->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchase_request_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchase_request_edit->DT->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_DT">
<input type="text" data-table="pharmacy_purchase_request" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_edit->DT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_edit->DT->EditValue ?>"<?php echo $pharmacy_purchase_request_edit->DT->editAttributes() ?>>
<?php if (!$pharmacy_purchase_request_edit->DT->ReadOnly && !$pharmacy_purchase_request_edit->DT->Disabled && !isset($pharmacy_purchase_request_edit->DT->EditAttrs["readonly"]) && !isset($pharmacy_purchase_request_edit->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchase_requestedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_purchase_requestedit", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_purchase_request_edit->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_edit->EmployeeName->Visible) { // EmployeeName ?>
	<div id="r_EmployeeName" class="form-group row">
		<label id="elh_pharmacy_purchase_request_EmployeeName" for="x_EmployeeName" class="<?php echo $pharmacy_purchase_request_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchase_request_edit->EmployeeName->caption() ?><?php echo $pharmacy_purchase_request_edit->EmployeeName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchase_request_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchase_request_edit->EmployeeName->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_EmployeeName">
<input type="text" data-table="pharmacy_purchase_request" data-field="x_EmployeeName" name="x_EmployeeName" id="x_EmployeeName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_edit->EmployeeName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_edit->EmployeeName->EditValue ?>"<?php echo $pharmacy_purchase_request_edit->EmployeeName->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchase_request_edit->EmployeeName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_edit->Department->Visible) { // Department ?>
	<div id="r_Department" class="form-group row">
		<label id="elh_pharmacy_purchase_request_Department" for="x_Department" class="<?php echo $pharmacy_purchase_request_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchase_request_edit->Department->caption() ?><?php echo $pharmacy_purchase_request_edit->Department->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchase_request_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchase_request_edit->Department->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_Department">
<input type="text" data-table="pharmacy_purchase_request" data-field="x_Department" name="x_Department" id="x_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_edit->Department->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_edit->Department->EditValue ?>"<?php echo $pharmacy_purchase_request_edit->Department->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchase_request_edit->Department->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("pharmacy_purchase_request_items", explode(",", $pharmacy_purchase_request->getCurrentDetailTable())) && $pharmacy_purchase_request_items->DetailEdit) {
?>
<?php if ($pharmacy_purchase_request->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("pharmacy_purchase_request_items", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_purchase_request_itemsgrid.php" ?>
<?php } ?>
<?php if (!$pharmacy_purchase_request_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_purchase_request_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_purchase_request_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_purchase_request_edit->showPageFooter();
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
$pharmacy_purchase_request_edit->terminate();
?>