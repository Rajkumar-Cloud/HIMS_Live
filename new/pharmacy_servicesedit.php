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
$pharmacy_services_edit = new pharmacy_services_edit();

// Run the page
$pharmacy_services_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_services_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_servicesedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpharmacy_servicesedit = currentForm = new ew.Form("fpharmacy_servicesedit", "edit");

	// Validate form
	fpharmacy_servicesedit.validate = function() {
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
			<?php if ($pharmacy_services_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_edit->id->caption(), $pharmacy_services_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_services_edit->pharmacy_id->Required) { ?>
				elm = this.getElements("x" + infix + "_pharmacy_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_edit->pharmacy_id->caption(), $pharmacy_services_edit->pharmacy_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_services_edit->patient_id->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_edit->patient_id->caption(), $pharmacy_services_edit->patient_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_services_edit->patient_id->errorMessage()) ?>");
			<?php if ($pharmacy_services_edit->name->Required) { ?>
				elm = this.getElements("x" + infix + "_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_edit->name->caption(), $pharmacy_services_edit->name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_services_edit->amount->Required) { ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_edit->amount->caption(), $pharmacy_services_edit->amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_services_edit->amount->errorMessage()) ?>");
			<?php if ($pharmacy_services_edit->description->Required) { ?>
				elm = this.getElements("x" + infix + "_description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_edit->description->caption(), $pharmacy_services_edit->description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_services_edit->charged_date->Required) { ?>
				elm = this.getElements("x" + infix + "_charged_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_edit->charged_date->caption(), $pharmacy_services_edit->charged_date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_services_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_edit->status->caption(), $pharmacy_services_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_services_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_edit->modifiedby->caption(), $pharmacy_services_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_services_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_edit->modifieddatetime->caption(), $pharmacy_services_edit->modifieddatetime->RequiredErrorMessage)) ?>");
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
	fpharmacy_servicesedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_servicesedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_servicesedit.lists["x_pharmacy_id"] = <?php echo $pharmacy_services_edit->pharmacy_id->Lookup->toClientList($pharmacy_services_edit) ?>;
	fpharmacy_servicesedit.lists["x_pharmacy_id"].options = <?php echo JsonEncode($pharmacy_services_edit->pharmacy_id->lookupOptions()) ?>;
	fpharmacy_servicesedit.lists["x_name"] = <?php echo $pharmacy_services_edit->name->Lookup->toClientList($pharmacy_services_edit) ?>;
	fpharmacy_servicesedit.lists["x_name"].options = <?php echo JsonEncode($pharmacy_services_edit->name->lookupOptions()) ?>;
	fpharmacy_servicesedit.lists["x_status"] = <?php echo $pharmacy_services_edit->status->Lookup->toClientList($pharmacy_services_edit) ?>;
	fpharmacy_servicesedit.lists["x_status"].options = <?php echo JsonEncode($pharmacy_services_edit->status->lookupOptions()) ?>;
	loadjs.done("fpharmacy_servicesedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_services_edit->showPageHeader(); ?>
<?php
$pharmacy_services_edit->showMessage();
?>
<form name="fpharmacy_servicesedit" id="fpharmacy_servicesedit" class="<?php echo $pharmacy_services_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_services">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_services_edit->IsModal ?>">
<?php if ($pharmacy_services->getCurrentMasterTable() == "pharmacy") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($pharmacy_services_edit->pharmacy_id->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($pharmacy_services_edit->patient_id->getSessionValue()) ?>">
<?php } ?>
<?php if ($pharmacy_services->getCurrentMasterTable() == "mas_pharmacy") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="mas_pharmacy">
<input type="hidden" name="fk_name" value="<?php echo HtmlEncode($pharmacy_services_edit->name->getSessionValue()) ?>">
<input type="hidden" name="fk_amount" value="<?php echo HtmlEncode($pharmacy_services_edit->amount->getSessionValue()) ?>">
<input type="hidden" name="fk_description" value="<?php echo HtmlEncode($pharmacy_services_edit->description->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_services_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_services_id" class="<?php echo $pharmacy_services_edit->LeftColumnClass ?>"><?php echo $pharmacy_services_edit->id->caption() ?><?php echo $pharmacy_services_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_edit->RightColumnClass ?>"><div <?php echo $pharmacy_services_edit->id->cellAttributes() ?>>
<span id="el_pharmacy_services_id">
<span<?php echo $pharmacy_services_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_services_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_services_edit->id->CurrentValue) ?>">
<?php echo $pharmacy_services_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_services_edit->pharmacy_id->Visible) { // pharmacy_id ?>
	<div id="r_pharmacy_id" class="form-group row">
		<label id="elh_pharmacy_services_pharmacy_id" for="x_pharmacy_id" class="<?php echo $pharmacy_services_edit->LeftColumnClass ?>"><?php echo $pharmacy_services_edit->pharmacy_id->caption() ?><?php echo $pharmacy_services_edit->pharmacy_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_edit->RightColumnClass ?>"><div <?php echo $pharmacy_services_edit->pharmacy_id->cellAttributes() ?>>
<?php if ($pharmacy_services_edit->pharmacy_id->getSessionValue() != "") { ?>
<span id="el_pharmacy_services_pharmacy_id">
<span<?php echo $pharmacy_services_edit->pharmacy_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_services_edit->pharmacy_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_pharmacy_id" name="x_pharmacy_id" value="<?php echo HtmlEncode($pharmacy_services_edit->pharmacy_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_services_pharmacy_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_services" data-field="x_pharmacy_id" data-value-separator="<?php echo $pharmacy_services_edit->pharmacy_id->displayValueSeparatorAttribute() ?>" id="x_pharmacy_id" name="x_pharmacy_id"<?php echo $pharmacy_services_edit->pharmacy_id->editAttributes() ?>>
			<?php echo $pharmacy_services_edit->pharmacy_id->selectOptionListHtml("x_pharmacy_id") ?>
		</select>
</div>
<?php echo $pharmacy_services_edit->pharmacy_id->Lookup->getParamTag($pharmacy_services_edit, "p_x_pharmacy_id") ?>
</span>
<?php } ?>
<?php echo $pharmacy_services_edit->pharmacy_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_services_edit->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_pharmacy_services_patient_id" for="x_patient_id" class="<?php echo $pharmacy_services_edit->LeftColumnClass ?>"><?php echo $pharmacy_services_edit->patient_id->caption() ?><?php echo $pharmacy_services_edit->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_edit->RightColumnClass ?>"><div <?php echo $pharmacy_services_edit->patient_id->cellAttributes() ?>>
<?php if ($pharmacy_services_edit->patient_id->getSessionValue() != "") { ?>
<span id="el_pharmacy_services_patient_id">
<span<?php echo $pharmacy_services_edit->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_services_edit->patient_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_patient_id" name="x_patient_id" value="<?php echo HtmlEncode($pharmacy_services_edit->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_services_patient_id">
<input type="text" data-table="pharmacy_services" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($pharmacy_services_edit->patient_id->getPlaceHolder()) ?>" value="<?php echo $pharmacy_services_edit->patient_id->EditValue ?>"<?php echo $pharmacy_services_edit->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_services_edit->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_services_edit->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_pharmacy_services_name" for="x_name" class="<?php echo $pharmacy_services_edit->LeftColumnClass ?>"><?php echo $pharmacy_services_edit->name->caption() ?><?php echo $pharmacy_services_edit->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_edit->RightColumnClass ?>"><div <?php echo $pharmacy_services_edit->name->cellAttributes() ?>>
<?php if ($pharmacy_services_edit->name->getSessionValue() != "") { ?>
<span id="el_pharmacy_services_name">
<span<?php echo $pharmacy_services_edit->name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_services_edit->name->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_name" name="x_name" value="<?php echo HtmlEncode($pharmacy_services_edit->name->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_services_name">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_name"><?php echo EmptyValue(strval($pharmacy_services_edit->name->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_services_edit->name->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_services_edit->name->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_services_edit->name->ReadOnly || $pharmacy_services_edit->name->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_name',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_services_edit->name->Lookup->getParamTag($pharmacy_services_edit, "p_x_name") ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_name" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_services_edit->name->displayValueSeparatorAttribute() ?>" name="x_name" id="x_name" value="<?php echo $pharmacy_services_edit->name->CurrentValue ?>"<?php echo $pharmacy_services_edit->name->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_services_edit->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_services_edit->amount->Visible) { // amount ?>
	<div id="r_amount" class="form-group row">
		<label id="elh_pharmacy_services_amount" for="x_amount" class="<?php echo $pharmacy_services_edit->LeftColumnClass ?>"><?php echo $pharmacy_services_edit->amount->caption() ?><?php echo $pharmacy_services_edit->amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_edit->RightColumnClass ?>"><div <?php echo $pharmacy_services_edit->amount->cellAttributes() ?>>
<?php if ($pharmacy_services_edit->amount->getSessionValue() != "") { ?>
<span id="el_pharmacy_services_amount">
<span<?php echo $pharmacy_services_edit->amount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_services_edit->amount->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_amount" name="x_amount" value="<?php echo HtmlEncode($pharmacy_services_edit->amount->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_services_amount">
<input type="text" data-table="pharmacy_services" data-field="x_amount" name="x_amount" id="x_amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_services_edit->amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_services_edit->amount->EditValue ?>"<?php echo $pharmacy_services_edit->amount->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_services_edit->amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_services_edit->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_pharmacy_services_description" for="x_description" class="<?php echo $pharmacy_services_edit->LeftColumnClass ?>"><?php echo $pharmacy_services_edit->description->caption() ?><?php echo $pharmacy_services_edit->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_edit->RightColumnClass ?>"><div <?php echo $pharmacy_services_edit->description->cellAttributes() ?>>
<?php if ($pharmacy_services_edit->description->getSessionValue() != "") { ?>
<span id="el_pharmacy_services_description">
<span<?php echo $pharmacy_services_edit->description->viewAttributes() ?>><?php echo $pharmacy_services_edit->description->ViewValue ?></span>
</span>
<input type="hidden" id="x_description" name="x_description" value="<?php echo HtmlEncode($pharmacy_services_edit->description->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_services_description">
<textarea data-table="pharmacy_services" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_services_edit->description->getPlaceHolder()) ?>"<?php echo $pharmacy_services_edit->description->editAttributes() ?>><?php echo $pharmacy_services_edit->description->EditValue ?></textarea>
</span>
<?php } ?>
<?php echo $pharmacy_services_edit->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_services_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_pharmacy_services_status" for="x_status" class="<?php echo $pharmacy_services_edit->LeftColumnClass ?>"><?php echo $pharmacy_services_edit->status->caption() ?><?php echo $pharmacy_services_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_edit->RightColumnClass ?>"><div <?php echo $pharmacy_services_edit->status->cellAttributes() ?>>
<span id="el_pharmacy_services_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_services" data-field="x_status" data-value-separator="<?php echo $pharmacy_services_edit->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $pharmacy_services_edit->status->editAttributes() ?>>
			<?php echo $pharmacy_services_edit->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $pharmacy_services_edit->status->Lookup->getParamTag($pharmacy_services_edit, "p_x_status") ?>
</span>
<?php echo $pharmacy_services_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_services_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_services_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_services_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_services_edit->showPageFooter();
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
$pharmacy_services_edit->terminate();
?>