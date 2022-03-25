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
$ivf_edit = new ivf_edit();

// Run the page
$ivf_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivfedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fivfedit = currentForm = new ew.Form("fivfedit", "edit");

	// Validate form
	fivfedit.validate = function() {
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
			<?php if ($ivf_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->id->caption(), $ivf_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->Male->Required) { ?>
				elm = this.getElements("x" + infix + "_Male");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->Male->caption(), $ivf_edit->Male->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->Female->Required) { ?>
				elm = this.getElements("x" + infix + "_Female");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->Female->caption(), $ivf_edit->Female->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->status->caption(), $ivf_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->modifiedby->caption(), $ivf_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->modifieddatetime->caption(), $ivf_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->malepropic->Required) { ?>
				felm = this.getElements("x" + infix + "_malepropic");
				elm = this.getElements("fn_x" + infix + "_malepropic");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->malepropic->caption(), $ivf_edit->malepropic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->femalepropic->Required) { ?>
				felm = this.getElements("x" + infix + "_femalepropic");
				elm = this.getElements("fn_x" + infix + "_femalepropic");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->femalepropic->caption(), $ivf_edit->femalepropic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->HusbandEducation->Required) { ?>
				elm = this.getElements("x" + infix + "_HusbandEducation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->HusbandEducation->caption(), $ivf_edit->HusbandEducation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->WifeEducation->Required) { ?>
				elm = this.getElements("x" + infix + "_WifeEducation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->WifeEducation->caption(), $ivf_edit->WifeEducation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->HusbandWorkHours->Required) { ?>
				elm = this.getElements("x" + infix + "_HusbandWorkHours");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->HusbandWorkHours->caption(), $ivf_edit->HusbandWorkHours->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->WifeWorkHours->Required) { ?>
				elm = this.getElements("x" + infix + "_WifeWorkHours");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->WifeWorkHours->caption(), $ivf_edit->WifeWorkHours->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->PatientLanguage->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientLanguage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->PatientLanguage->caption(), $ivf_edit->PatientLanguage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->ReferedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->ReferedBy->caption(), $ivf_edit->ReferedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->ReferPhNo->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferPhNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->ReferPhNo->caption(), $ivf_edit->ReferPhNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->WifeCell->Required) { ?>
				elm = this.getElements("x" + infix + "_WifeCell");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->WifeCell->caption(), $ivf_edit->WifeCell->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->HusbandCell->Required) { ?>
				elm = this.getElements("x" + infix + "_HusbandCell");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->HusbandCell->caption(), $ivf_edit->HusbandCell->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->WifeEmail->Required) { ?>
				elm = this.getElements("x" + infix + "_WifeEmail");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->WifeEmail->caption(), $ivf_edit->WifeEmail->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->HusbandEmail->Required) { ?>
				elm = this.getElements("x" + infix + "_HusbandEmail");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->HusbandEmail->caption(), $ivf_edit->HusbandEmail->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->ARTCYCLE->Required) { ?>
				elm = this.getElements("x" + infix + "_ARTCYCLE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->ARTCYCLE->caption(), $ivf_edit->ARTCYCLE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->RESULT->Required) { ?>
				elm = this.getElements("x" + infix + "_RESULT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->RESULT->caption(), $ivf_edit->RESULT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->malepic->Required) { ?>
				elm = this.getElements("x" + infix + "_malepic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->malepic->caption(), $ivf_edit->malepic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->femalepic->Required) { ?>
				elm = this.getElements("x" + infix + "_femalepic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->femalepic->caption(), $ivf_edit->femalepic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->Mgendar->Required) { ?>
				elm = this.getElements("x" + infix + "_Mgendar");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->Mgendar->caption(), $ivf_edit->Mgendar->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->Fgendar->Required) { ?>
				elm = this.getElements("x" + infix + "_Fgendar");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->Fgendar->caption(), $ivf_edit->Fgendar->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->CoupleID->Required) { ?>
				elm = this.getElements("x" + infix + "_CoupleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->CoupleID->caption(), $ivf_edit->CoupleID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->HospID->caption(), $ivf_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->PatientName->caption(), $ivf_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->PatientID->caption(), $ivf_edit->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->PartnerName->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->PartnerName->caption(), $ivf_edit->PartnerName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->PartnerID->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->PartnerID->caption(), $ivf_edit->PartnerID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->DrID->Required) { ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->DrID->caption(), $ivf_edit->DrID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->DrDepartment->Required) { ?>
				elm = this.getElements("x" + infix + "_DrDepartment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->DrDepartment->caption(), $ivf_edit->DrDepartment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_edit->Doctor->Required) { ?>
				elm = this.getElements("x" + infix + "_Doctor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_edit->Doctor->caption(), $ivf_edit->Doctor->RequiredErrorMessage)) ?>");
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
	fivfedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivfedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivfedit.lists["x_Male"] = <?php echo $ivf_edit->Male->Lookup->toClientList($ivf_edit) ?>;
	fivfedit.lists["x_Male"].options = <?php echo JsonEncode($ivf_edit->Male->lookupOptions()) ?>;
	fivfedit.lists["x_Female"] = <?php echo $ivf_edit->Female->Lookup->toClientList($ivf_edit) ?>;
	fivfedit.lists["x_Female"].options = <?php echo JsonEncode($ivf_edit->Female->lookupOptions()) ?>;
	fivfedit.lists["x_status"] = <?php echo $ivf_edit->status->Lookup->toClientList($ivf_edit) ?>;
	fivfedit.lists["x_status"].options = <?php echo JsonEncode($ivf_edit->status->lookupOptions()) ?>;
	fivfedit.lists["x_ReferedBy"] = <?php echo $ivf_edit->ReferedBy->Lookup->toClientList($ivf_edit) ?>;
	fivfedit.lists["x_ReferedBy"].options = <?php echo JsonEncode($ivf_edit->ReferedBy->lookupOptions()) ?>;
	fivfedit.lists["x_ARTCYCLE"] = <?php echo $ivf_edit->ARTCYCLE->Lookup->toClientList($ivf_edit) ?>;
	fivfedit.lists["x_ARTCYCLE"].options = <?php echo JsonEncode($ivf_edit->ARTCYCLE->options(FALSE, TRUE)) ?>;
	fivfedit.lists["x_RESULT"] = <?php echo $ivf_edit->RESULT->Lookup->toClientList($ivf_edit) ?>;
	fivfedit.lists["x_RESULT"].options = <?php echo JsonEncode($ivf_edit->RESULT->options(FALSE, TRUE)) ?>;
	fivfedit.lists["x_DrID"] = <?php echo $ivf_edit->DrID->Lookup->toClientList($ivf_edit) ?>;
	fivfedit.lists["x_DrID"].options = <?php echo JsonEncode($ivf_edit->DrID->lookupOptions()) ?>;
	loadjs.done("fivfedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_edit->showPageHeader(); ?>
<?php
$ivf_edit->showMessage();
?>
<form name="fivfedit" id="fivfedit" class="<?php echo $ivf_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($ivf_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_id" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_id" type="text/html"><?php echo $ivf_edit->id->caption() ?><?php echo $ivf_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->id->cellAttributes() ?>>
<script id="tpx_ivf_id" type="text/html"><span id="el_ivf_id">
<span<?php echo $ivf_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="ivf" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_edit->id->CurrentValue) ?>">
<?php echo $ivf_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->Male->Visible) { // Male ?>
	<div id="r_Male" class="form-group row">
		<label id="elh_ivf_Male" for="x_Male" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_Male" type="text/html"><?php echo $ivf_edit->Male->caption() ?><?php echo $ivf_edit->Male->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->Male->cellAttributes() ?>>
<script id="tpx_ivf_Male" type="text/html"><span id="el_ivf_Male">
<?php $ivf_edit->Male->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Male"><?php echo EmptyValue(strval($ivf_edit->Male->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_edit->Male->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_edit->Male->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_edit->Male->ReadOnly || $ivf_edit->Male->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Male',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_edit->Male->Lookup->getParamTag($ivf_edit, "p_x_Male") ?>
<input type="hidden" data-table="ivf" data-field="x_Male" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_edit->Male->displayValueSeparatorAttribute() ?>" name="x_Male" id="x_Male" value="<?php echo $ivf_edit->Male->CurrentValue ?>"<?php echo $ivf_edit->Male->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->Male->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->Female->Visible) { // Female ?>
	<div id="r_Female" class="form-group row">
		<label id="elh_ivf_Female" for="x_Female" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_Female" type="text/html"><?php echo $ivf_edit->Female->caption() ?><?php echo $ivf_edit->Female->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->Female->cellAttributes() ?>>
<script id="tpx_ivf_Female" type="text/html"><span id="el_ivf_Female">
<?php $ivf_edit->Female->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Female"><?php echo EmptyValue(strval($ivf_edit->Female->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_edit->Female->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_edit->Female->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_edit->Female->ReadOnly || $ivf_edit->Female->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Female',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_edit->Female->Lookup->getParamTag($ivf_edit, "p_x_Female") ?>
<input type="hidden" data-table="ivf" data-field="x_Female" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_edit->Female->displayValueSeparatorAttribute() ?>" name="x_Female" id="x_Female" value="<?php echo $ivf_edit->Female->CurrentValue ?>"<?php echo $ivf_edit->Female->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->Female->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_ivf_status" for="x_status" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_status" type="text/html"><?php echo $ivf_edit->status->caption() ?><?php echo $ivf_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->status->cellAttributes() ?>>
<script id="tpx_ivf_status" type="text/html"><span id="el_ivf_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf" data-field="x_status" data-value-separator="<?php echo $ivf_edit->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $ivf_edit->status->editAttributes() ?>>
			<?php echo $ivf_edit->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $ivf_edit->status->Lookup->getParamTag($ivf_edit, "p_x_status") ?>
</span></script>
<?php echo $ivf_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->malepropic->Visible) { // malepropic ?>
	<div id="r_malepropic" class="form-group row">
		<label id="elh_ivf_malepropic" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_malepropic" type="text/html"><?php echo $ivf_edit->malepropic->caption() ?><?php echo $ivf_edit->malepropic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->malepropic->cellAttributes() ?>>
<script id="tpx_ivf_malepropic" type="text/html"><span id="el_ivf_malepropic">
<div id="fd_x_malepropic">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $ivf_edit->malepropic->title() ?>" data-table="ivf" data-field="x_malepropic" name="x_malepropic" id="x_malepropic" lang="<?php echo CurrentLanguageID() ?>"<?php echo $ivf_edit->malepropic->editAttributes() ?><?php if ($ivf_edit->malepropic->ReadOnly || $ivf_edit->malepropic->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_malepropic"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_malepropic" id= "fn_x_malepropic" value="<?php echo $ivf_edit->malepropic->Upload->FileName ?>">
<input type="hidden" name="fa_x_malepropic" id= "fa_x_malepropic" value="<?php echo (Post("fa_x_malepropic") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_malepropic" id= "fs_x_malepropic" value="450">
<input type="hidden" name="fx_x_malepropic" id= "fx_x_malepropic" value="<?php echo $ivf_edit->malepropic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_malepropic" id= "fm_x_malepropic" value="<?php echo $ivf_edit->malepropic->UploadMaxFileSize ?>">
</div>
<table id="ft_x_malepropic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span></script>
<?php echo $ivf_edit->malepropic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->femalepropic->Visible) { // femalepropic ?>
	<div id="r_femalepropic" class="form-group row">
		<label id="elh_ivf_femalepropic" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_femalepropic" type="text/html"><?php echo $ivf_edit->femalepropic->caption() ?><?php echo $ivf_edit->femalepropic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->femalepropic->cellAttributes() ?>>
<script id="tpx_ivf_femalepropic" type="text/html"><span id="el_ivf_femalepropic">
<div id="fd_x_femalepropic">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $ivf_edit->femalepropic->title() ?>" data-table="ivf" data-field="x_femalepropic" name="x_femalepropic" id="x_femalepropic" lang="<?php echo CurrentLanguageID() ?>"<?php echo $ivf_edit->femalepropic->editAttributes() ?><?php if ($ivf_edit->femalepropic->ReadOnly || $ivf_edit->femalepropic->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_femalepropic"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_femalepropic" id= "fn_x_femalepropic" value="<?php echo $ivf_edit->femalepropic->Upload->FileName ?>">
<input type="hidden" name="fa_x_femalepropic" id= "fa_x_femalepropic" value="<?php echo (Post("fa_x_femalepropic") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_femalepropic" id= "fs_x_femalepropic" value="450">
<input type="hidden" name="fx_x_femalepropic" id= "fx_x_femalepropic" value="<?php echo $ivf_edit->femalepropic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_femalepropic" id= "fm_x_femalepropic" value="<?php echo $ivf_edit->femalepropic->UploadMaxFileSize ?>">
</div>
<table id="ft_x_femalepropic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span></script>
<?php echo $ivf_edit->femalepropic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->HusbandEducation->Visible) { // HusbandEducation ?>
	<div id="r_HusbandEducation" class="form-group row">
		<label id="elh_ivf_HusbandEducation" for="x_HusbandEducation" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_HusbandEducation" type="text/html"><?php echo $ivf_edit->HusbandEducation->caption() ?><?php echo $ivf_edit->HusbandEducation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->HusbandEducation->cellAttributes() ?>>
<script id="tpx_ivf_HusbandEducation" type="text/html"><span id="el_ivf_HusbandEducation">
<input type="text" data-table="ivf" data-field="x_HusbandEducation" name="x_HusbandEducation" id="x_HusbandEducation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_edit->HusbandEducation->getPlaceHolder()) ?>" value="<?php echo $ivf_edit->HusbandEducation->EditValue ?>"<?php echo $ivf_edit->HusbandEducation->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->HusbandEducation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->WifeEducation->Visible) { // WifeEducation ?>
	<div id="r_WifeEducation" class="form-group row">
		<label id="elh_ivf_WifeEducation" for="x_WifeEducation" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_WifeEducation" type="text/html"><?php echo $ivf_edit->WifeEducation->caption() ?><?php echo $ivf_edit->WifeEducation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->WifeEducation->cellAttributes() ?>>
<script id="tpx_ivf_WifeEducation" type="text/html"><span id="el_ivf_WifeEducation">
<input type="text" data-table="ivf" data-field="x_WifeEducation" name="x_WifeEducation" id="x_WifeEducation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_edit->WifeEducation->getPlaceHolder()) ?>" value="<?php echo $ivf_edit->WifeEducation->EditValue ?>"<?php echo $ivf_edit->WifeEducation->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->WifeEducation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
	<div id="r_HusbandWorkHours" class="form-group row">
		<label id="elh_ivf_HusbandWorkHours" for="x_HusbandWorkHours" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_HusbandWorkHours" type="text/html"><?php echo $ivf_edit->HusbandWorkHours->caption() ?><?php echo $ivf_edit->HusbandWorkHours->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->HusbandWorkHours->cellAttributes() ?>>
<script id="tpx_ivf_HusbandWorkHours" type="text/html"><span id="el_ivf_HusbandWorkHours">
<input type="text" data-table="ivf" data-field="x_HusbandWorkHours" name="x_HusbandWorkHours" id="x_HusbandWorkHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_edit->HusbandWorkHours->getPlaceHolder()) ?>" value="<?php echo $ivf_edit->HusbandWorkHours->EditValue ?>"<?php echo $ivf_edit->HusbandWorkHours->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->HusbandWorkHours->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->WifeWorkHours->Visible) { // WifeWorkHours ?>
	<div id="r_WifeWorkHours" class="form-group row">
		<label id="elh_ivf_WifeWorkHours" for="x_WifeWorkHours" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_WifeWorkHours" type="text/html"><?php echo $ivf_edit->WifeWorkHours->caption() ?><?php echo $ivf_edit->WifeWorkHours->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->WifeWorkHours->cellAttributes() ?>>
<script id="tpx_ivf_WifeWorkHours" type="text/html"><span id="el_ivf_WifeWorkHours">
<input type="text" data-table="ivf" data-field="x_WifeWorkHours" name="x_WifeWorkHours" id="x_WifeWorkHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_edit->WifeWorkHours->getPlaceHolder()) ?>" value="<?php echo $ivf_edit->WifeWorkHours->EditValue ?>"<?php echo $ivf_edit->WifeWorkHours->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->WifeWorkHours->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->PatientLanguage->Visible) { // PatientLanguage ?>
	<div id="r_PatientLanguage" class="form-group row">
		<label id="elh_ivf_PatientLanguage" for="x_PatientLanguage" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_PatientLanguage" type="text/html"><?php echo $ivf_edit->PatientLanguage->caption() ?><?php echo $ivf_edit->PatientLanguage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->PatientLanguage->cellAttributes() ?>>
<script id="tpx_ivf_PatientLanguage" type="text/html"><span id="el_ivf_PatientLanguage">
<input type="text" data-table="ivf" data-field="x_PatientLanguage" name="x_PatientLanguage" id="x_PatientLanguage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_edit->PatientLanguage->getPlaceHolder()) ?>" value="<?php echo $ivf_edit->PatientLanguage->EditValue ?>"<?php echo $ivf_edit->PatientLanguage->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->PatientLanguage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->ReferedBy->Visible) { // ReferedBy ?>
	<div id="r_ReferedBy" class="form-group row">
		<label id="elh_ivf_ReferedBy" for="x_ReferedBy" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_ReferedBy" type="text/html"><?php echo $ivf_edit->ReferedBy->caption() ?><?php echo $ivf_edit->ReferedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->ReferedBy->cellAttributes() ?>>
<script id="tpx_ivf_ReferedBy" type="text/html"><span id="el_ivf_ReferedBy">
<?php $ivf_edit->ReferedBy->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferedBy"><?php echo EmptyValue(strval($ivf_edit->ReferedBy->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_edit->ReferedBy->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_edit->ReferedBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_edit->ReferedBy->ReadOnly || $ivf_edit->ReferedBy->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferedBy',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$ivf_edit->ReferedBy->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ReferedBy" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_edit->ReferedBy->caption() ?>" data-title="<?php echo $ivf_edit->ReferedBy->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ReferedBy',url:'mas_reference_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $ivf_edit->ReferedBy->Lookup->getParamTag($ivf_edit, "p_x_ReferedBy") ?>
<input type="hidden" data-table="ivf" data-field="x_ReferedBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_edit->ReferedBy->displayValueSeparatorAttribute() ?>" name="x_ReferedBy" id="x_ReferedBy" value="<?php echo $ivf_edit->ReferedBy->CurrentValue ?>"<?php echo $ivf_edit->ReferedBy->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->ReferedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->ReferPhNo->Visible) { // ReferPhNo ?>
	<div id="r_ReferPhNo" class="form-group row">
		<label id="elh_ivf_ReferPhNo" for="x_ReferPhNo" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_ReferPhNo" type="text/html"><?php echo $ivf_edit->ReferPhNo->caption() ?><?php echo $ivf_edit->ReferPhNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->ReferPhNo->cellAttributes() ?>>
<script id="tpx_ivf_ReferPhNo" type="text/html"><span id="el_ivf_ReferPhNo">
<input type="text" data-table="ivf" data-field="x_ReferPhNo" name="x_ReferPhNo" id="x_ReferPhNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_edit->ReferPhNo->getPlaceHolder()) ?>" value="<?php echo $ivf_edit->ReferPhNo->EditValue ?>"<?php echo $ivf_edit->ReferPhNo->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->ReferPhNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->WifeCell->Visible) { // WifeCell ?>
	<div id="r_WifeCell" class="form-group row">
		<label id="elh_ivf_WifeCell" for="x_WifeCell" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_WifeCell" type="text/html"><?php echo $ivf_edit->WifeCell->caption() ?><?php echo $ivf_edit->WifeCell->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->WifeCell->cellAttributes() ?>>
<script id="tpx_ivf_WifeCell" type="text/html"><span id="el_ivf_WifeCell">
<input type="text" data-table="ivf" data-field="x_WifeCell" name="x_WifeCell" id="x_WifeCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_edit->WifeCell->getPlaceHolder()) ?>" value="<?php echo $ivf_edit->WifeCell->EditValue ?>"<?php echo $ivf_edit->WifeCell->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->WifeCell->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->HusbandCell->Visible) { // HusbandCell ?>
	<div id="r_HusbandCell" class="form-group row">
		<label id="elh_ivf_HusbandCell" for="x_HusbandCell" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_HusbandCell" type="text/html"><?php echo $ivf_edit->HusbandCell->caption() ?><?php echo $ivf_edit->HusbandCell->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->HusbandCell->cellAttributes() ?>>
<script id="tpx_ivf_HusbandCell" type="text/html"><span id="el_ivf_HusbandCell">
<input type="text" data-table="ivf" data-field="x_HusbandCell" name="x_HusbandCell" id="x_HusbandCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_edit->HusbandCell->getPlaceHolder()) ?>" value="<?php echo $ivf_edit->HusbandCell->EditValue ?>"<?php echo $ivf_edit->HusbandCell->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->HusbandCell->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->WifeEmail->Visible) { // WifeEmail ?>
	<div id="r_WifeEmail" class="form-group row">
		<label id="elh_ivf_WifeEmail" for="x_WifeEmail" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_WifeEmail" type="text/html"><?php echo $ivf_edit->WifeEmail->caption() ?><?php echo $ivf_edit->WifeEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->WifeEmail->cellAttributes() ?>>
<script id="tpx_ivf_WifeEmail" type="text/html"><span id="el_ivf_WifeEmail">
<input type="text" data-table="ivf" data-field="x_WifeEmail" name="x_WifeEmail" id="x_WifeEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_edit->WifeEmail->getPlaceHolder()) ?>" value="<?php echo $ivf_edit->WifeEmail->EditValue ?>"<?php echo $ivf_edit->WifeEmail->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->WifeEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->HusbandEmail->Visible) { // HusbandEmail ?>
	<div id="r_HusbandEmail" class="form-group row">
		<label id="elh_ivf_HusbandEmail" for="x_HusbandEmail" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_HusbandEmail" type="text/html"><?php echo $ivf_edit->HusbandEmail->caption() ?><?php echo $ivf_edit->HusbandEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->HusbandEmail->cellAttributes() ?>>
<script id="tpx_ivf_HusbandEmail" type="text/html"><span id="el_ivf_HusbandEmail">
<input type="text" data-table="ivf" data-field="x_HusbandEmail" name="x_HusbandEmail" id="x_HusbandEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_edit->HusbandEmail->getPlaceHolder()) ?>" value="<?php echo $ivf_edit->HusbandEmail->EditValue ?>"<?php echo $ivf_edit->HusbandEmail->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->HusbandEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<div id="r_ARTCYCLE" class="form-group row">
		<label id="elh_ivf_ARTCYCLE" for="x_ARTCYCLE" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_ARTCYCLE" type="text/html"><?php echo $ivf_edit->ARTCYCLE->caption() ?><?php echo $ivf_edit->ARTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_ARTCYCLE" type="text/html"><span id="el_ivf_ARTCYCLE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf" data-field="x_ARTCYCLE" data-value-separator="<?php echo $ivf_edit->ARTCYCLE->displayValueSeparatorAttribute() ?>" id="x_ARTCYCLE" name="x_ARTCYCLE"<?php echo $ivf_edit->ARTCYCLE->editAttributes() ?>>
			<?php echo $ivf_edit->ARTCYCLE->selectOptionListHtml("x_ARTCYCLE") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_edit->ARTCYCLE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->RESULT->Visible) { // RESULT ?>
	<div id="r_RESULT" class="form-group row">
		<label id="elh_ivf_RESULT" for="x_RESULT" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_RESULT" type="text/html"><?php echo $ivf_edit->RESULT->caption() ?><?php echo $ivf_edit->RESULT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->RESULT->cellAttributes() ?>>
<script id="tpx_ivf_RESULT" type="text/html"><span id="el_ivf_RESULT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf" data-field="x_RESULT" data-value-separator="<?php echo $ivf_edit->RESULT->displayValueSeparatorAttribute() ?>" id="x_RESULT" name="x_RESULT"<?php echo $ivf_edit->RESULT->editAttributes() ?>>
			<?php echo $ivf_edit->RESULT->selectOptionListHtml("x_RESULT") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_edit->RESULT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->malepic->Visible) { // malepic ?>
	<div id="r_malepic" class="form-group row">
		<label id="elh_ivf_malepic" for="x_malepic" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_malepic" type="text/html"><?php echo $ivf_edit->malepic->caption() ?><?php echo $ivf_edit->malepic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->malepic->cellAttributes() ?>>
<script id="tpx_ivf_malepic" type="text/html"><span id="el_ivf_malepic">
<textarea data-table="ivf" data-field="x_malepic" name="x_malepic" id="x_malepic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_edit->malepic->getPlaceHolder()) ?>"<?php echo $ivf_edit->malepic->editAttributes() ?>><?php echo $ivf_edit->malepic->EditValue ?></textarea>
</span></script>
<?php echo $ivf_edit->malepic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->femalepic->Visible) { // femalepic ?>
	<div id="r_femalepic" class="form-group row">
		<label id="elh_ivf_femalepic" for="x_femalepic" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_femalepic" type="text/html"><?php echo $ivf_edit->femalepic->caption() ?><?php echo $ivf_edit->femalepic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->femalepic->cellAttributes() ?>>
<script id="tpx_ivf_femalepic" type="text/html"><span id="el_ivf_femalepic">
<textarea data-table="ivf" data-field="x_femalepic" name="x_femalepic" id="x_femalepic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_edit->femalepic->getPlaceHolder()) ?>"<?php echo $ivf_edit->femalepic->editAttributes() ?>><?php echo $ivf_edit->femalepic->EditValue ?></textarea>
</span></script>
<?php echo $ivf_edit->femalepic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->Mgendar->Visible) { // Mgendar ?>
	<div id="r_Mgendar" class="form-group row">
		<label id="elh_ivf_Mgendar" for="x_Mgendar" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_Mgendar" type="text/html"><?php echo $ivf_edit->Mgendar->caption() ?><?php echo $ivf_edit->Mgendar->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->Mgendar->cellAttributes() ?>>
<script id="tpx_ivf_Mgendar" type="text/html"><span id="el_ivf_Mgendar">
<textarea data-table="ivf" data-field="x_Mgendar" name="x_Mgendar" id="x_Mgendar" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_edit->Mgendar->getPlaceHolder()) ?>"<?php echo $ivf_edit->Mgendar->editAttributes() ?>><?php echo $ivf_edit->Mgendar->EditValue ?></textarea>
</span></script>
<?php echo $ivf_edit->Mgendar->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->Fgendar->Visible) { // Fgendar ?>
	<div id="r_Fgendar" class="form-group row">
		<label id="elh_ivf_Fgendar" for="x_Fgendar" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_Fgendar" type="text/html"><?php echo $ivf_edit->Fgendar->caption() ?><?php echo $ivf_edit->Fgendar->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->Fgendar->cellAttributes() ?>>
<script id="tpx_ivf_Fgendar" type="text/html"><span id="el_ivf_Fgendar">
<textarea data-table="ivf" data-field="x_Fgendar" name="x_Fgendar" id="x_Fgendar" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_edit->Fgendar->getPlaceHolder()) ?>"<?php echo $ivf_edit->Fgendar->editAttributes() ?>><?php echo $ivf_edit->Fgendar->EditValue ?></textarea>
</span></script>
<?php echo $ivf_edit->Fgendar->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->CoupleID->Visible) { // CoupleID ?>
	<div id="r_CoupleID" class="form-group row">
		<label id="elh_ivf_CoupleID" for="x_CoupleID" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_CoupleID" type="text/html"><?php echo $ivf_edit->CoupleID->caption() ?><?php echo $ivf_edit->CoupleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->CoupleID->cellAttributes() ?>>
<script id="tpx_ivf_CoupleID" type="text/html"><span id="el_ivf_CoupleID">
<span<?php echo $ivf_edit->CoupleID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_edit->CoupleID->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="ivf" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" value="<?php echo HtmlEncode($ivf_edit->CoupleID->CurrentValue) ?>">
<?php echo $ivf_edit->CoupleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_ivf_PatientName" for="x_PatientName" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_PatientName" type="text/html"><?php echo $ivf_edit->PatientName->caption() ?><?php echo $ivf_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->PatientName->cellAttributes() ?>>
<script id="tpx_ivf_PatientName" type="text/html"><span id="el_ivf_PatientName">
<input type="text" data-table="ivf" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_edit->PatientName->getPlaceHolder()) ?>" value="<?php echo $ivf_edit->PatientName->EditValue ?>"<?php echo $ivf_edit->PatientName->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_ivf_PatientID" for="x_PatientID" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_PatientID" type="text/html"><?php echo $ivf_edit->PatientID->caption() ?><?php echo $ivf_edit->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->PatientID->cellAttributes() ?>>
<script id="tpx_ivf_PatientID" type="text/html"><span id="el_ivf_PatientID">
<input type="text" data-table="ivf" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_edit->PatientID->getPlaceHolder()) ?>" value="<?php echo $ivf_edit->PatientID->EditValue ?>"<?php echo $ivf_edit->PatientID->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_ivf_PartnerName" for="x_PartnerName" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_PartnerName" type="text/html"><?php echo $ivf_edit->PartnerName->caption() ?><?php echo $ivf_edit->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->PartnerName->cellAttributes() ?>>
<script id="tpx_ivf_PartnerName" type="text/html"><span id="el_ivf_PartnerName">
<input type="text" data-table="ivf" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_edit->PartnerName->getPlaceHolder()) ?>" value="<?php echo $ivf_edit->PartnerName->EditValue ?>"<?php echo $ivf_edit->PartnerName->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label id="elh_ivf_PartnerID" for="x_PartnerID" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_PartnerID" type="text/html"><?php echo $ivf_edit->PartnerID->caption() ?><?php echo $ivf_edit->PartnerID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->PartnerID->cellAttributes() ?>>
<script id="tpx_ivf_PartnerID" type="text/html"><span id="el_ivf_PartnerID">
<input type="text" data-table="ivf" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_edit->PartnerID->getPlaceHolder()) ?>" value="<?php echo $ivf_edit->PartnerID->EditValue ?>"<?php echo $ivf_edit->PartnerID->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->PartnerID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_ivf_DrID" for="x_DrID" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_DrID" type="text/html"><?php echo $ivf_edit->DrID->caption() ?><?php echo $ivf_edit->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->DrID->cellAttributes() ?>>
<script id="tpx_ivf_DrID" type="text/html"><span id="el_ivf_DrID">
<?php $ivf_edit->DrID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?php echo EmptyValue(strval($ivf_edit->DrID->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_edit->DrID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_edit->DrID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_edit->DrID->ReadOnly || $ivf_edit->DrID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_edit->DrID->Lookup->getParamTag($ivf_edit, "p_x_DrID") ?>
<input type="hidden" data-table="ivf" data-field="x_DrID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_edit->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?php echo $ivf_edit->DrID->CurrentValue ?>"<?php echo $ivf_edit->DrID->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label id="elh_ivf_DrDepartment" for="x_DrDepartment" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_DrDepartment" type="text/html"><?php echo $ivf_edit->DrDepartment->caption() ?><?php echo $ivf_edit->DrDepartment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->DrDepartment->cellAttributes() ?>>
<script id="tpx_ivf_DrDepartment" type="text/html"><span id="el_ivf_DrDepartment">
<input type="text" data-table="ivf" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_edit->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $ivf_edit->DrDepartment->EditValue ?>"<?php echo $ivf_edit->DrDepartment->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->DrDepartment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_edit->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_ivf_Doctor" for="x_Doctor" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_Doctor" type="text/html"><?php echo $ivf_edit->Doctor->caption() ?><?php echo $ivf_edit->Doctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div <?php echo $ivf_edit->Doctor->cellAttributes() ?>>
<script id="tpx_ivf_Doctor" type="text/html"><span id="el_ivf_Doctor">
<input type="text" data-table="ivf" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_edit->Doctor->getPlaceHolder()) ?>" value="<?php echo $ivf_edit->Doctor->EditValue ?>"<?php echo $ivf_edit->Doctor->editAttributes() ?>>
</span></script>
<?php echo $ivf_edit->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivfedit" class="ew-custom-template"></div>
<script id="tpm_ivfedit" type="text/html">
<div id="ct_ivf_edit"><style>
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
<?php
$IVFid = $_GET["id"] ;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
?>	
				   <div class="ew-row" style="display: none;">
				   {{include tmpl="#tpc_ivf_malepic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_malepic")/}}
				   {{include tmpl="#tpc_ivf_Mgendar"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_Mgendar")/}}
				   {{include tmpl="#tpc_ivf_PartnerName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_PartnerName")/}}
				   {{include tmpl="#tpc_ivf_PartnerID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_PartnerID")/}}
				   {{include tmpl="#tpc_ivf_WifeCell"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_WifeCell")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_malepropic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_malepropic")/}}</span>
				  </div>
				   <div class="ew-row" style="display: none;">
				   {{include tmpl="#tpc_ivf_femalepic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_femalepic")/}}
				   {{include tmpl="#tpc_ivf_Fgendar"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_Fgendar")/}}
				   {{include tmpl="#tpc_ivf_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_PatientName")/}}
				   {{include tmpl="#tpc_ivf_PatientID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_PatientID")/}}
				   {{include tmpl="#tpc_ivf_HusbandCell"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_HusbandCell")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_femalepropic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_femalepropic")/}}</span>
				  </div>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body card-widget widget-user">
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_Female"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_Female")/}}</span>
				  </div>
			<div class="widget-user-image">
			   		<img id="femaleprofilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results2[0]["profilePic"]; ?>'  alt="User Avatar"> 
			  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_WifeEducation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_WifeEducation")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_WifeWorkHours"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_WifeWorkHours")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_WifeCell"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_WifeCell")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_WifeEmail"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_WifeEmail")/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body card-widget widget-user">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_Male"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_Male")/}}</span>
				  </div>
			<div class="widget-user-image">
			   		<img id="maleprofilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results1[0]["profilePic"]; ?>' alt="User Avatar"> 
			  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_HusbandEducation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_HusbandEducation")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_HusbandWorkHours"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_HusbandWorkHours")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_HusbandCell"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_HusbandCell")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_HusbandEmail"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_HusbandEmail")/}}</span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<table class="ew-table">
	 <tbody>
		 <tr>
		 	<td>{{include tmpl="#tpc_ivf_DrID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_DrID")/}}</td>
			<td>{{include tmpl="#tpc_ivf_Doctor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_Doctor")/}}</td>
			<td>{{include tmpl="#tpc_ivf_DrDepartment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_DrDepartment")/}}</td>
		</tr>
	  </tbody>
</table>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Refered By</h3>
			</div>
			<div class="card-body">
 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_PatientLanguage"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_PatientLanguage")/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ReferedBy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ReferedBy")/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ReferPhNo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ReferPhNo")/}}</span>
</div>
	</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"></h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_status"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_status")/}}</span>
				  </div>
	</div>
		</div>				
	</div>
</div>
</div>
</script>
<script type="text/html" class="ivfedit_js">

	document.getElementById("x_malepic").value = '<?php echo $results1[0]["profilePic"]; ?>';
	document.getElementById("x_femalepic").value = '<?php echo $results2[0]["profilePic"]; ?>';

</script>

<?php
	if (in_array("ivf_treatment_plan", explode(",", $ivf->getCurrentDetailTable())) && $ivf_treatment_plan->DetailEdit) {
?>
<?php if ($ivf->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("ivf_treatment_plan", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ivf_treatment_plangrid.php" ?>
<?php } ?>
<?php if (!$ivf_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf->Rows) ?> };
	ew.applyTemplate("tpd_ivfedit", "tpm_ivfedit", "ivfedit", "<?php echo $ivf->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivfedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_edit->showPageFooter();
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
$ivf_edit->terminate();
?>