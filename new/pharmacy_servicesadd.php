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
$pharmacy_services_add = new pharmacy_services_add();

// Run the page
$pharmacy_services_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_services_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_servicesadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpharmacy_servicesadd = currentForm = new ew.Form("fpharmacy_servicesadd", "add");

	// Validate form
	fpharmacy_servicesadd.validate = function() {
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
			<?php if ($pharmacy_services_add->pharmacy_id->Required) { ?>
				elm = this.getElements("x" + infix + "_pharmacy_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_add->pharmacy_id->caption(), $pharmacy_services_add->pharmacy_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_services_add->patient_id->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_add->patient_id->caption(), $pharmacy_services_add->patient_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_services_add->patient_id->errorMessage()) ?>");
			<?php if ($pharmacy_services_add->name->Required) { ?>
				elm = this.getElements("x" + infix + "_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_add->name->caption(), $pharmacy_services_add->name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_services_add->amount->Required) { ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_add->amount->caption(), $pharmacy_services_add->amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_services_add->amount->errorMessage()) ?>");
			<?php if ($pharmacy_services_add->description->Required) { ?>
				elm = this.getElements("x" + infix + "_description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_add->description->caption(), $pharmacy_services_add->description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_services_add->charged_date->Required) { ?>
				elm = this.getElements("x" + infix + "_charged_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_add->charged_date->caption(), $pharmacy_services_add->charged_date->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_services_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_add->status->caption(), $pharmacy_services_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_services_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_add->createdby->caption(), $pharmacy_services_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_services_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services_add->createddatetime->caption(), $pharmacy_services_add->createddatetime->RequiredErrorMessage)) ?>");
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
	fpharmacy_servicesadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_servicesadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_servicesadd.lists["x_pharmacy_id"] = <?php echo $pharmacy_services_add->pharmacy_id->Lookup->toClientList($pharmacy_services_add) ?>;
	fpharmacy_servicesadd.lists["x_pharmacy_id"].options = <?php echo JsonEncode($pharmacy_services_add->pharmacy_id->lookupOptions()) ?>;
	fpharmacy_servicesadd.lists["x_name"] = <?php echo $pharmacy_services_add->name->Lookup->toClientList($pharmacy_services_add) ?>;
	fpharmacy_servicesadd.lists["x_name"].options = <?php echo JsonEncode($pharmacy_services_add->name->lookupOptions()) ?>;
	fpharmacy_servicesadd.lists["x_status"] = <?php echo $pharmacy_services_add->status->Lookup->toClientList($pharmacy_services_add) ?>;
	fpharmacy_servicesadd.lists["x_status"].options = <?php echo JsonEncode($pharmacy_services_add->status->lookupOptions()) ?>;
	loadjs.done("fpharmacy_servicesadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_services_add->showPageHeader(); ?>
<?php
$pharmacy_services_add->showMessage();
?>
<form name="fpharmacy_servicesadd" id="fpharmacy_servicesadd" class="<?php echo $pharmacy_services_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_services">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_services_add->IsModal ?>">
<?php if ($pharmacy_services->getCurrentMasterTable() == "pharmacy") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($pharmacy_services_add->pharmacy_id->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($pharmacy_services_add->patient_id->getSessionValue()) ?>">
<?php } ?>
<?php if ($pharmacy_services->getCurrentMasterTable() == "mas_pharmacy") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="mas_pharmacy">
<input type="hidden" name="fk_name" value="<?php echo HtmlEncode($pharmacy_services_add->name->getSessionValue()) ?>">
<input type="hidden" name="fk_amount" value="<?php echo HtmlEncode($pharmacy_services_add->amount->getSessionValue()) ?>">
<input type="hidden" name="fk_description" value="<?php echo HtmlEncode($pharmacy_services_add->description->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($pharmacy_services_add->pharmacy_id->Visible) { // pharmacy_id ?>
	<div id="r_pharmacy_id" class="form-group row">
		<label id="elh_pharmacy_services_pharmacy_id" for="x_pharmacy_id" class="<?php echo $pharmacy_services_add->LeftColumnClass ?>"><?php echo $pharmacy_services_add->pharmacy_id->caption() ?><?php echo $pharmacy_services_add->pharmacy_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_add->RightColumnClass ?>"><div <?php echo $pharmacy_services_add->pharmacy_id->cellAttributes() ?>>
<?php if ($pharmacy_services_add->pharmacy_id->getSessionValue() != "") { ?>
<span id="el_pharmacy_services_pharmacy_id">
<span<?php echo $pharmacy_services_add->pharmacy_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_services_add->pharmacy_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_pharmacy_id" name="x_pharmacy_id" value="<?php echo HtmlEncode($pharmacy_services_add->pharmacy_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_services_pharmacy_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_services" data-field="x_pharmacy_id" data-value-separator="<?php echo $pharmacy_services_add->pharmacy_id->displayValueSeparatorAttribute() ?>" id="x_pharmacy_id" name="x_pharmacy_id"<?php echo $pharmacy_services_add->pharmacy_id->editAttributes() ?>>
			<?php echo $pharmacy_services_add->pharmacy_id->selectOptionListHtml("x_pharmacy_id") ?>
		</select>
</div>
<?php echo $pharmacy_services_add->pharmacy_id->Lookup->getParamTag($pharmacy_services_add, "p_x_pharmacy_id") ?>
</span>
<?php } ?>
<?php echo $pharmacy_services_add->pharmacy_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_services_add->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_pharmacy_services_patient_id" for="x_patient_id" class="<?php echo $pharmacy_services_add->LeftColumnClass ?>"><?php echo $pharmacy_services_add->patient_id->caption() ?><?php echo $pharmacy_services_add->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_add->RightColumnClass ?>"><div <?php echo $pharmacy_services_add->patient_id->cellAttributes() ?>>
<?php if ($pharmacy_services_add->patient_id->getSessionValue() != "") { ?>
<span id="el_pharmacy_services_patient_id">
<span<?php echo $pharmacy_services_add->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_services_add->patient_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_patient_id" name="x_patient_id" value="<?php echo HtmlEncode($pharmacy_services_add->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_services_patient_id">
<input type="text" data-table="pharmacy_services" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($pharmacy_services_add->patient_id->getPlaceHolder()) ?>" value="<?php echo $pharmacy_services_add->patient_id->EditValue ?>"<?php echo $pharmacy_services_add->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_services_add->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_services_add->name->Visible) { // name ?>
	<div id="r_name" class="form-group row">
		<label id="elh_pharmacy_services_name" for="x_name" class="<?php echo $pharmacy_services_add->LeftColumnClass ?>"><?php echo $pharmacy_services_add->name->caption() ?><?php echo $pharmacy_services_add->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_add->RightColumnClass ?>"><div <?php echo $pharmacy_services_add->name->cellAttributes() ?>>
<?php if ($pharmacy_services_add->name->getSessionValue() != "") { ?>
<span id="el_pharmacy_services_name">
<span<?php echo $pharmacy_services_add->name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_services_add->name->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_name" name="x_name" value="<?php echo HtmlEncode($pharmacy_services_add->name->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_services_name">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_name"><?php echo EmptyValue(strval($pharmacy_services_add->name->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_services_add->name->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_services_add->name->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_services_add->name->ReadOnly || $pharmacy_services_add->name->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_name',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_services_add->name->Lookup->getParamTag($pharmacy_services_add, "p_x_name") ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_name" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_services_add->name->displayValueSeparatorAttribute() ?>" name="x_name" id="x_name" value="<?php echo $pharmacy_services_add->name->CurrentValue ?>"<?php echo $pharmacy_services_add->name->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_services_add->name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_services_add->amount->Visible) { // amount ?>
	<div id="r_amount" class="form-group row">
		<label id="elh_pharmacy_services_amount" for="x_amount" class="<?php echo $pharmacy_services_add->LeftColumnClass ?>"><?php echo $pharmacy_services_add->amount->caption() ?><?php echo $pharmacy_services_add->amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_add->RightColumnClass ?>"><div <?php echo $pharmacy_services_add->amount->cellAttributes() ?>>
<?php if ($pharmacy_services_add->amount->getSessionValue() != "") { ?>
<span id="el_pharmacy_services_amount">
<span<?php echo $pharmacy_services_add->amount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_services_add->amount->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_amount" name="x_amount" value="<?php echo HtmlEncode($pharmacy_services_add->amount->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_services_amount">
<input type="text" data-table="pharmacy_services" data-field="x_amount" name="x_amount" id="x_amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_services_add->amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_services_add->amount->EditValue ?>"<?php echo $pharmacy_services_add->amount->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_services_add->amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_services_add->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_pharmacy_services_description" for="x_description" class="<?php echo $pharmacy_services_add->LeftColumnClass ?>"><?php echo $pharmacy_services_add->description->caption() ?><?php echo $pharmacy_services_add->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_add->RightColumnClass ?>"><div <?php echo $pharmacy_services_add->description->cellAttributes() ?>>
<?php if ($pharmacy_services_add->description->getSessionValue() != "") { ?>
<span id="el_pharmacy_services_description">
<span<?php echo $pharmacy_services_add->description->viewAttributes() ?>><?php echo $pharmacy_services_add->description->ViewValue ?></span>
</span>
<input type="hidden" id="x_description" name="x_description" value="<?php echo HtmlEncode($pharmacy_services_add->description->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_services_description">
<textarea data-table="pharmacy_services" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_services_add->description->getPlaceHolder()) ?>"<?php echo $pharmacy_services_add->description->editAttributes() ?>><?php echo $pharmacy_services_add->description->EditValue ?></textarea>
</span>
<?php } ?>
<?php echo $pharmacy_services_add->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_services_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_pharmacy_services_status" for="x_status" class="<?php echo $pharmacy_services_add->LeftColumnClass ?>"><?php echo $pharmacy_services_add->status->caption() ?><?php echo $pharmacy_services_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_services_add->RightColumnClass ?>"><div <?php echo $pharmacy_services_add->status->cellAttributes() ?>>
<span id="el_pharmacy_services_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_services" data-field="x_status" data-value-separator="<?php echo $pharmacy_services_add->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $pharmacy_services_add->status->editAttributes() ?>>
			<?php echo $pharmacy_services_add->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $pharmacy_services_add->status->Lookup->getParamTag($pharmacy_services_add, "p_x_status") ?>
</span>
<?php echo $pharmacy_services_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_services_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_services_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_services_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_services_add->showPageFooter();
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
$pharmacy_services_add->terminate();
?>