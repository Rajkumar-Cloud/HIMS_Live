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
$mas_pharmacy_edit = new mas_pharmacy_edit();

// Run the page
$mas_pharmacy_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_pharmacy_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_pharmacyedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fmas_pharmacyedit = currentForm = new ew.Form("fmas_pharmacyedit", "edit");

	// Validate form
	fmas_pharmacyedit.validate = function() {
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
			<?php if ($mas_pharmacy_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_pharmacy_edit->id->caption(), $mas_pharmacy_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_pharmacy_edit->name->Required) { ?>
				elm = this.getElements("x" + infix + "_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_pharmacy_edit->name->caption(), $mas_pharmacy_edit->name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_pharmacy_edit->amount->Required) { ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_pharmacy_edit->amount->caption(), $mas_pharmacy_edit->amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_pharmacy_edit->amount->errorMessage()) ?>");
			<?php if ($mas_pharmacy_edit->description->Required) { ?>
				elm = this.getElements("x" + infix + "_description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_pharmacy_edit->description->caption(), $mas_pharmacy_edit->description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_pharmacy_edit->charged_date->Required) { ?>
				elm = this.getElements("x" + infix + "_charged_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_pharmacy_edit->charged_date->caption(), $mas_pharmacy_edit->charged_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_charged_date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_pharmacy_edit->charged_date->errorMessage()) ?>");
			<?php if ($mas_pharmacy_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_pharmacy_edit->status->caption(), $mas_pharmacy_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_pharmacy_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_pharmacy_edit->modifiedby->caption(), $mas_pharmacy_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_pharmacy_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_pharmacy_edit->modifieddatetime->caption(), $mas_pharmacy_edit->modifieddatetime->RequiredErrorMessage)) ?>");
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
	fmas_pharmacyedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_pharmacyedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmas_pharmacyedit.lists["x_status"] = <?php echo $mas_pharmacy_edit->status->Lookup->toClientList($mas_pharmacy_edit) ?>;
	fmas_pharmacyedit.lists["x_status"].options = <?php echo JsonEncode($mas_pharmacy_edit->status->lookupOptions()) ?>;
	loadjs.done("fmas_pharmacyedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_pharmacy_edit->showPageHeader(); ?>
<?php
$mas_pharmacy_edit->showMessage();
?>
<form name="fmas_pharmacyedit" id="fmas_pharmacyedit" class="<?php echo $mas_pharmacy_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_pharmacy">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$mas_pharmacy_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($mas_pharmacy_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_mas_pharmacy_id" class="<?php echo $mas_pharmacy_edit->LeftColumnClass ?>"><?php echo $mas_pharmacy_edit->id->caption() ?><?php echo $mas_pharmacy_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_pharmacy_edit->RightColumnClass ?>"><div <?php echo $mas_pharmacy_edit->id->cellAttributes() ?>>
<span id="el_mas_pharmacy_id">
<span<?php echo $mas_pharmacy_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mas_pharmacy_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="mas_pharmacy" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($mas_pharmacy_edit->id->CurrentValue) ?>">
<?php echo $mas_pharmacy_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_pharmacy_edit->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_mas_pharmacy_name" for="x_name" class="<?php echo $mas_pharmacy_edit->LeftColumnClass ?>"><?php echo $mas_pharmacy_edit->name->caption() ?><?php echo $mas_pharmacy_edit->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_pharmacy_edit->RightColumnClass ?>"><div <?php echo $mas_pharmacy_edit->name->cellAttributes() ?>>
<span id="el_mas_pharmacy_name">
<input type="text" data-table="mas_pharmacy" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_pharmacy_edit->name->getPlaceHolder()) ?>" value="<?php echo $mas_pharmacy_edit->name->EditValue ?>"<?php echo $mas_pharmacy_edit->name->editAttributes() ?>>
</span>
<?php echo $mas_pharmacy_edit->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_pharmacy_edit->amount->Visible) { // amount ?>
	<div id="r_amount" class="form-group row">
		<label id="elh_mas_pharmacy_amount" for="x_amount" class="<?php echo $mas_pharmacy_edit->LeftColumnClass ?>"><?php echo $mas_pharmacy_edit->amount->caption() ?><?php echo $mas_pharmacy_edit->amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_pharmacy_edit->RightColumnClass ?>"><div <?php echo $mas_pharmacy_edit->amount->cellAttributes() ?>>
<span id="el_mas_pharmacy_amount">
<input type="text" data-table="mas_pharmacy" data-field="x_amount" name="x_amount" id="x_amount" size="30" placeholder="<?php echo HtmlEncode($mas_pharmacy_edit->amount->getPlaceHolder()) ?>" value="<?php echo $mas_pharmacy_edit->amount->EditValue ?>"<?php echo $mas_pharmacy_edit->amount->editAttributes() ?>>
</span>
<?php echo $mas_pharmacy_edit->amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_pharmacy_edit->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_mas_pharmacy_description" for="x_description" class="<?php echo $mas_pharmacy_edit->LeftColumnClass ?>"><?php echo $mas_pharmacy_edit->description->caption() ?><?php echo $mas_pharmacy_edit->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_pharmacy_edit->RightColumnClass ?>"><div <?php echo $mas_pharmacy_edit->description->cellAttributes() ?>>
<span id="el_mas_pharmacy_description">
<textarea data-table="mas_pharmacy" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($mas_pharmacy_edit->description->getPlaceHolder()) ?>"<?php echo $mas_pharmacy_edit->description->editAttributes() ?>><?php echo $mas_pharmacy_edit->description->EditValue ?></textarea>
</span>
<?php echo $mas_pharmacy_edit->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_pharmacy_edit->charged_date->Visible) { // charged_date ?>
	<div id="r_charged_date" class="form-group row">
		<label id="elh_mas_pharmacy_charged_date" for="x_charged_date" class="<?php echo $mas_pharmacy_edit->LeftColumnClass ?>"><?php echo $mas_pharmacy_edit->charged_date->caption() ?><?php echo $mas_pharmacy_edit->charged_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_pharmacy_edit->RightColumnClass ?>"><div <?php echo $mas_pharmacy_edit->charged_date->cellAttributes() ?>>
<span id="el_mas_pharmacy_charged_date">
<input type="text" data-table="mas_pharmacy" data-field="x_charged_date" name="x_charged_date" id="x_charged_date" placeholder="<?php echo HtmlEncode($mas_pharmacy_edit->charged_date->getPlaceHolder()) ?>" value="<?php echo $mas_pharmacy_edit->charged_date->EditValue ?>"<?php echo $mas_pharmacy_edit->charged_date->editAttributes() ?>>
<?php if (!$mas_pharmacy_edit->charged_date->ReadOnly && !$mas_pharmacy_edit->charged_date->Disabled && !isset($mas_pharmacy_edit->charged_date->EditAttrs["readonly"]) && !isset($mas_pharmacy_edit->charged_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmas_pharmacyedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fmas_pharmacyedit", "x_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $mas_pharmacy_edit->charged_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_pharmacy_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_mas_pharmacy_status" for="x_status" class="<?php echo $mas_pharmacy_edit->LeftColumnClass ?>"><?php echo $mas_pharmacy_edit->status->caption() ?><?php echo $mas_pharmacy_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_pharmacy_edit->RightColumnClass ?>"><div <?php echo $mas_pharmacy_edit->status->cellAttributes() ?>>
<span id="el_mas_pharmacy_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_pharmacy" data-field="x_status" data-value-separator="<?php echo $mas_pharmacy_edit->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $mas_pharmacy_edit->status->editAttributes() ?>>
			<?php echo $mas_pharmacy_edit->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $mas_pharmacy_edit->status->Lookup->getParamTag($mas_pharmacy_edit, "p_x_status") ?>
</span>
<?php echo $mas_pharmacy_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("pharmacy_services", explode(",", $mas_pharmacy->getCurrentDetailTable())) && $pharmacy_services->DetailEdit) {
?>
<?php if ($mas_pharmacy->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("pharmacy_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_servicesgrid.php" ?>
<?php } ?>
<?php if (!$mas_pharmacy_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_pharmacy_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_pharmacy_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_pharmacy_edit->showPageFooter();
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
$mas_pharmacy_edit->terminate();
?>