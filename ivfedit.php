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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fivfedit = currentForm = new ew.Form("fivfedit", "edit");

// Validate form
fivfedit.validate = function() {
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
		<?php if ($ivf_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->id->caption(), $ivf->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->Male->Required) { ?>
			elm = this.getElements("x" + infix + "_Male");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->Male->caption(), $ivf->Male->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->Female->Required) { ?>
			elm = this.getElements("x" + infix + "_Female");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->Female->caption(), $ivf->Female->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->status->caption(), $ivf->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->modifiedby->caption(), $ivf->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->modifieddatetime->caption(), $ivf->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->malepropic->Required) { ?>
			felm = this.getElements("x" + infix + "_malepropic");
			elm = this.getElements("fn_x" + infix + "_malepropic");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $ivf->malepropic->caption(), $ivf->malepropic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->femalepropic->Required) { ?>
			felm = this.getElements("x" + infix + "_femalepropic");
			elm = this.getElements("fn_x" + infix + "_femalepropic");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $ivf->femalepropic->caption(), $ivf->femalepropic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->HusbandEducation->Required) { ?>
			elm = this.getElements("x" + infix + "_HusbandEducation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->HusbandEducation->caption(), $ivf->HusbandEducation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->WifeEducation->Required) { ?>
			elm = this.getElements("x" + infix + "_WifeEducation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->WifeEducation->caption(), $ivf->WifeEducation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->HusbandWorkHours->Required) { ?>
			elm = this.getElements("x" + infix + "_HusbandWorkHours");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->HusbandWorkHours->caption(), $ivf->HusbandWorkHours->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->WifeWorkHours->Required) { ?>
			elm = this.getElements("x" + infix + "_WifeWorkHours");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->WifeWorkHours->caption(), $ivf->WifeWorkHours->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->PatientLanguage->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientLanguage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->PatientLanguage->caption(), $ivf->PatientLanguage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->ReferedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->ReferedBy->caption(), $ivf->ReferedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->ReferPhNo->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferPhNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->ReferPhNo->caption(), $ivf->ReferPhNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->WifeCell->Required) { ?>
			elm = this.getElements("x" + infix + "_WifeCell");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->WifeCell->caption(), $ivf->WifeCell->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->HusbandCell->Required) { ?>
			elm = this.getElements("x" + infix + "_HusbandCell");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->HusbandCell->caption(), $ivf->HusbandCell->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->WifeEmail->Required) { ?>
			elm = this.getElements("x" + infix + "_WifeEmail");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->WifeEmail->caption(), $ivf->WifeEmail->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->HusbandEmail->Required) { ?>
			elm = this.getElements("x" + infix + "_HusbandEmail");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->HusbandEmail->caption(), $ivf->HusbandEmail->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->ARTCYCLE->Required) { ?>
			elm = this.getElements("x" + infix + "_ARTCYCLE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->ARTCYCLE->caption(), $ivf->ARTCYCLE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->RESULT->Required) { ?>
			elm = this.getElements("x" + infix + "_RESULT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->RESULT->caption(), $ivf->RESULT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->malepic->Required) { ?>
			elm = this.getElements("x" + infix + "_malepic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->malepic->caption(), $ivf->malepic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->femalepic->Required) { ?>
			elm = this.getElements("x" + infix + "_femalepic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->femalepic->caption(), $ivf->femalepic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->Mgendar->Required) { ?>
			elm = this.getElements("x" + infix + "_Mgendar");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->Mgendar->caption(), $ivf->Mgendar->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->Fgendar->Required) { ?>
			elm = this.getElements("x" + infix + "_Fgendar");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->Fgendar->caption(), $ivf->Fgendar->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->CoupleID->Required) { ?>
			elm = this.getElements("x" + infix + "_CoupleID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->CoupleID->caption(), $ivf->CoupleID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->HospID->caption(), $ivf->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->PatientName->caption(), $ivf->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->PatientID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->PatientID->caption(), $ivf->PatientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->PartnerName->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->PartnerName->caption(), $ivf->PartnerName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->PartnerID->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->PartnerID->caption(), $ivf->PartnerID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->DrID->caption(), $ivf->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->DrDepartment->Required) { ?>
			elm = this.getElements("x" + infix + "_DrDepartment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->DrDepartment->caption(), $ivf->DrDepartment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_edit->Doctor->Required) { ?>
			elm = this.getElements("x" + infix + "_Doctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf->Doctor->caption(), $ivf->Doctor->RequiredErrorMessage)) ?>");
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
fivfedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivfedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivfedit.lists["x_Male"] = <?php echo $ivf_edit->Male->Lookup->toClientList() ?>;
fivfedit.lists["x_Male"].options = <?php echo JsonEncode($ivf_edit->Male->lookupOptions()) ?>;
fivfedit.lists["x_Female"] = <?php echo $ivf_edit->Female->Lookup->toClientList() ?>;
fivfedit.lists["x_Female"].options = <?php echo JsonEncode($ivf_edit->Female->lookupOptions()) ?>;
fivfedit.lists["x_status"] = <?php echo $ivf_edit->status->Lookup->toClientList() ?>;
fivfedit.lists["x_status"].options = <?php echo JsonEncode($ivf_edit->status->lookupOptions()) ?>;
fivfedit.lists["x_ReferedBy"] = <?php echo $ivf_edit->ReferedBy->Lookup->toClientList() ?>;
fivfedit.lists["x_ReferedBy"].options = <?php echo JsonEncode($ivf_edit->ReferedBy->lookupOptions()) ?>;
fivfedit.lists["x_ARTCYCLE"] = <?php echo $ivf_edit->ARTCYCLE->Lookup->toClientList() ?>;
fivfedit.lists["x_ARTCYCLE"].options = <?php echo JsonEncode($ivf_edit->ARTCYCLE->options(FALSE, TRUE)) ?>;
fivfedit.lists["x_RESULT"] = <?php echo $ivf_edit->RESULT->Lookup->toClientList() ?>;
fivfedit.lists["x_RESULT"].options = <?php echo JsonEncode($ivf_edit->RESULT->options(FALSE, TRUE)) ?>;
fivfedit.lists["x_DrID"] = <?php echo $ivf_edit->DrID->Lookup->toClientList() ?>;
fivfedit.lists["x_DrID"].options = <?php echo JsonEncode($ivf_edit->DrID->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_edit->showPageHeader(); ?>
<?php
$ivf_edit->showMessage();
?>
<form name="fivfedit" id="fivfedit" class="<?php echo $ivf_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($ivf->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_id" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_id" class="ivfedit" type="text/html"><span><?php echo $ivf->id->caption() ?><?php echo ($ivf->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->id->cellAttributes() ?>>
<script id="tpx_ivf_id" class="ivfedit" type="text/html">
<span id="el_ivf_id">
<span<?php echo $ivf->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="ivf" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf->id->CurrentValue) ?>">
<?php echo $ivf->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->Male->Visible) { // Male ?>
	<div id="r_Male" class="form-group row">
		<label id="elh_ivf_Male" for="x_Male" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_Male" class="ivfedit" type="text/html"><span><?php echo $ivf->Male->caption() ?><?php echo ($ivf->Male->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->Male->cellAttributes() ?>>
<script id="tpx_ivf_Male" class="ivfedit" type="text/html">
<span id="el_ivf_Male">
<?php $ivf->Male->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf->Male->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Male"><?php echo strval($ivf->Male->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf->Male->ViewValue) : $ivf->Male->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf->Male->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf->Male->ReadOnly || $ivf->Male->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Male',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf->Male->Lookup->getParamTag("p_x_Male") ?>
<input type="hidden" data-table="ivf" data-field="x_Male" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf->Male->displayValueSeparatorAttribute() ?>" name="x_Male" id="x_Male" value="<?php echo $ivf->Male->CurrentValue ?>"<?php echo $ivf->Male->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->Male->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->Female->Visible) { // Female ?>
	<div id="r_Female" class="form-group row">
		<label id="elh_ivf_Female" for="x_Female" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_Female" class="ivfedit" type="text/html"><span><?php echo $ivf->Female->caption() ?><?php echo ($ivf->Female->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->Female->cellAttributes() ?>>
<script id="tpx_ivf_Female" class="ivfedit" type="text/html">
<span id="el_ivf_Female">
<?php $ivf->Female->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf->Female->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Female"><?php echo strval($ivf->Female->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf->Female->ViewValue) : $ivf->Female->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf->Female->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf->Female->ReadOnly || $ivf->Female->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Female',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf->Female->Lookup->getParamTag("p_x_Female") ?>
<input type="hidden" data-table="ivf" data-field="x_Female" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf->Female->displayValueSeparatorAttribute() ?>" name="x_Female" id="x_Female" value="<?php echo $ivf->Female->CurrentValue ?>"<?php echo $ivf->Female->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->Female->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_ivf_status" for="x_status" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_status" class="ivfedit" type="text/html"><span><?php echo $ivf->status->caption() ?><?php echo ($ivf->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->status->cellAttributes() ?>>
<script id="tpx_ivf_status" class="ivfedit" type="text/html">
<span id="el_ivf_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf" data-field="x_status" data-value-separator="<?php echo $ivf->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $ivf->status->editAttributes() ?>>
		<?php echo $ivf->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $ivf->status->Lookup->getParamTag("p_x_status") ?>
</span>
</script>
<?php echo $ivf->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->malepropic->Visible) { // malepropic ?>
	<div id="r_malepropic" class="form-group row">
		<label id="elh_ivf_malepropic" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_malepropic" class="ivfedit" type="text/html"><span><?php echo $ivf->malepropic->caption() ?><?php echo ($ivf->malepropic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->malepropic->cellAttributes() ?>>
<script id="tpx_ivf_malepropic" class="ivfedit" type="text/html">
<span id="el_ivf_malepropic">
<div id="fd_x_malepropic">
<span title="<?php echo $ivf->malepropic->title() ? $ivf->malepropic->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($ivf->malepropic->ReadOnly || $ivf->malepropic->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="ivf" data-field="x_malepropic" name="x_malepropic" id="x_malepropic"<?php echo $ivf->malepropic->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_malepropic" id= "fn_x_malepropic" value="<?php echo $ivf->malepropic->Upload->FileName ?>">
<?php if (Post("fa_x_malepropic") == "0") { ?>
<input type="hidden" name="fa_x_malepropic" id= "fa_x_malepropic" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x_malepropic" id= "fa_x_malepropic" value="1">
<?php } ?>
<input type="hidden" name="fs_x_malepropic" id= "fs_x_malepropic" value="450">
<input type="hidden" name="fx_x_malepropic" id= "fx_x_malepropic" value="<?php echo $ivf->malepropic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_malepropic" id= "fm_x_malepropic" value="<?php echo $ivf->malepropic->UploadMaxFileSize ?>">
</div>
<table id="ft_x_malepropic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
</script>
<?php echo $ivf->malepropic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->femalepropic->Visible) { // femalepropic ?>
	<div id="r_femalepropic" class="form-group row">
		<label id="elh_ivf_femalepropic" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_femalepropic" class="ivfedit" type="text/html"><span><?php echo $ivf->femalepropic->caption() ?><?php echo ($ivf->femalepropic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->femalepropic->cellAttributes() ?>>
<script id="tpx_ivf_femalepropic" class="ivfedit" type="text/html">
<span id="el_ivf_femalepropic">
<div id="fd_x_femalepropic">
<span title="<?php echo $ivf->femalepropic->title() ? $ivf->femalepropic->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($ivf->femalepropic->ReadOnly || $ivf->femalepropic->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="ivf" data-field="x_femalepropic" name="x_femalepropic" id="x_femalepropic"<?php echo $ivf->femalepropic->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_femalepropic" id= "fn_x_femalepropic" value="<?php echo $ivf->femalepropic->Upload->FileName ?>">
<?php if (Post("fa_x_femalepropic") == "0") { ?>
<input type="hidden" name="fa_x_femalepropic" id= "fa_x_femalepropic" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x_femalepropic" id= "fa_x_femalepropic" value="1">
<?php } ?>
<input type="hidden" name="fs_x_femalepropic" id= "fs_x_femalepropic" value="450">
<input type="hidden" name="fx_x_femalepropic" id= "fx_x_femalepropic" value="<?php echo $ivf->femalepropic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_femalepropic" id= "fm_x_femalepropic" value="<?php echo $ivf->femalepropic->UploadMaxFileSize ?>">
</div>
<table id="ft_x_femalepropic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
</script>
<?php echo $ivf->femalepropic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->HusbandEducation->Visible) { // HusbandEducation ?>
	<div id="r_HusbandEducation" class="form-group row">
		<label id="elh_ivf_HusbandEducation" for="x_HusbandEducation" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_HusbandEducation" class="ivfedit" type="text/html"><span><?php echo $ivf->HusbandEducation->caption() ?><?php echo ($ivf->HusbandEducation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->HusbandEducation->cellAttributes() ?>>
<script id="tpx_ivf_HusbandEducation" class="ivfedit" type="text/html">
<span id="el_ivf_HusbandEducation">
<input type="text" data-table="ivf" data-field="x_HusbandEducation" name="x_HusbandEducation" id="x_HusbandEducation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->HusbandEducation->getPlaceHolder()) ?>" value="<?php echo $ivf->HusbandEducation->EditValue ?>"<?php echo $ivf->HusbandEducation->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->HusbandEducation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->WifeEducation->Visible) { // WifeEducation ?>
	<div id="r_WifeEducation" class="form-group row">
		<label id="elh_ivf_WifeEducation" for="x_WifeEducation" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_WifeEducation" class="ivfedit" type="text/html"><span><?php echo $ivf->WifeEducation->caption() ?><?php echo ($ivf->WifeEducation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->WifeEducation->cellAttributes() ?>>
<script id="tpx_ivf_WifeEducation" class="ivfedit" type="text/html">
<span id="el_ivf_WifeEducation">
<input type="text" data-table="ivf" data-field="x_WifeEducation" name="x_WifeEducation" id="x_WifeEducation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->WifeEducation->getPlaceHolder()) ?>" value="<?php echo $ivf->WifeEducation->EditValue ?>"<?php echo $ivf->WifeEducation->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->WifeEducation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
	<div id="r_HusbandWorkHours" class="form-group row">
		<label id="elh_ivf_HusbandWorkHours" for="x_HusbandWorkHours" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_HusbandWorkHours" class="ivfedit" type="text/html"><span><?php echo $ivf->HusbandWorkHours->caption() ?><?php echo ($ivf->HusbandWorkHours->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->HusbandWorkHours->cellAttributes() ?>>
<script id="tpx_ivf_HusbandWorkHours" class="ivfedit" type="text/html">
<span id="el_ivf_HusbandWorkHours">
<input type="text" data-table="ivf" data-field="x_HusbandWorkHours" name="x_HusbandWorkHours" id="x_HusbandWorkHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->HusbandWorkHours->getPlaceHolder()) ?>" value="<?php echo $ivf->HusbandWorkHours->EditValue ?>"<?php echo $ivf->HusbandWorkHours->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->HusbandWorkHours->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->WifeWorkHours->Visible) { // WifeWorkHours ?>
	<div id="r_WifeWorkHours" class="form-group row">
		<label id="elh_ivf_WifeWorkHours" for="x_WifeWorkHours" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_WifeWorkHours" class="ivfedit" type="text/html"><span><?php echo $ivf->WifeWorkHours->caption() ?><?php echo ($ivf->WifeWorkHours->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->WifeWorkHours->cellAttributes() ?>>
<script id="tpx_ivf_WifeWorkHours" class="ivfedit" type="text/html">
<span id="el_ivf_WifeWorkHours">
<input type="text" data-table="ivf" data-field="x_WifeWorkHours" name="x_WifeWorkHours" id="x_WifeWorkHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->WifeWorkHours->getPlaceHolder()) ?>" value="<?php echo $ivf->WifeWorkHours->EditValue ?>"<?php echo $ivf->WifeWorkHours->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->WifeWorkHours->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->PatientLanguage->Visible) { // PatientLanguage ?>
	<div id="r_PatientLanguage" class="form-group row">
		<label id="elh_ivf_PatientLanguage" for="x_PatientLanguage" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_PatientLanguage" class="ivfedit" type="text/html"><span><?php echo $ivf->PatientLanguage->caption() ?><?php echo ($ivf->PatientLanguage->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->PatientLanguage->cellAttributes() ?>>
<script id="tpx_ivf_PatientLanguage" class="ivfedit" type="text/html">
<span id="el_ivf_PatientLanguage">
<input type="text" data-table="ivf" data-field="x_PatientLanguage" name="x_PatientLanguage" id="x_PatientLanguage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->PatientLanguage->getPlaceHolder()) ?>" value="<?php echo $ivf->PatientLanguage->EditValue ?>"<?php echo $ivf->PatientLanguage->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->PatientLanguage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->ReferedBy->Visible) { // ReferedBy ?>
	<div id="r_ReferedBy" class="form-group row">
		<label id="elh_ivf_ReferedBy" for="x_ReferedBy" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_ReferedBy" class="ivfedit" type="text/html"><span><?php echo $ivf->ReferedBy->caption() ?><?php echo ($ivf->ReferedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->ReferedBy->cellAttributes() ?>>
<script id="tpx_ivf_ReferedBy" class="ivfedit" type="text/html">
<span id="el_ivf_ReferedBy">
<?php $ivf->ReferedBy->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf->ReferedBy->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferedBy"><?php echo strval($ivf->ReferedBy->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf->ReferedBy->ViewValue) : $ivf->ReferedBy->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf->ReferedBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf->ReferedBy->ReadOnly || $ivf->ReferedBy->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferedBy',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$ivf->ReferedBy->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ReferedBy" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf->ReferedBy->caption() ?>" data-title="<?php echo $ivf->ReferedBy->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ReferedBy',url:'mas_reference_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $ivf->ReferedBy->Lookup->getParamTag("p_x_ReferedBy") ?>
<input type="hidden" data-table="ivf" data-field="x_ReferedBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf->ReferedBy->displayValueSeparatorAttribute() ?>" name="x_ReferedBy" id="x_ReferedBy" value="<?php echo $ivf->ReferedBy->CurrentValue ?>"<?php echo $ivf->ReferedBy->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->ReferedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->ReferPhNo->Visible) { // ReferPhNo ?>
	<div id="r_ReferPhNo" class="form-group row">
		<label id="elh_ivf_ReferPhNo" for="x_ReferPhNo" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_ReferPhNo" class="ivfedit" type="text/html"><span><?php echo $ivf->ReferPhNo->caption() ?><?php echo ($ivf->ReferPhNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->ReferPhNo->cellAttributes() ?>>
<script id="tpx_ivf_ReferPhNo" class="ivfedit" type="text/html">
<span id="el_ivf_ReferPhNo">
<input type="text" data-table="ivf" data-field="x_ReferPhNo" name="x_ReferPhNo" id="x_ReferPhNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->ReferPhNo->getPlaceHolder()) ?>" value="<?php echo $ivf->ReferPhNo->EditValue ?>"<?php echo $ivf->ReferPhNo->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->ReferPhNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->WifeCell->Visible) { // WifeCell ?>
	<div id="r_WifeCell" class="form-group row">
		<label id="elh_ivf_WifeCell" for="x_WifeCell" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_WifeCell" class="ivfedit" type="text/html"><span><?php echo $ivf->WifeCell->caption() ?><?php echo ($ivf->WifeCell->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->WifeCell->cellAttributes() ?>>
<script id="tpx_ivf_WifeCell" class="ivfedit" type="text/html">
<span id="el_ivf_WifeCell">
<input type="text" data-table="ivf" data-field="x_WifeCell" name="x_WifeCell" id="x_WifeCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->WifeCell->getPlaceHolder()) ?>" value="<?php echo $ivf->WifeCell->EditValue ?>"<?php echo $ivf->WifeCell->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->WifeCell->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->HusbandCell->Visible) { // HusbandCell ?>
	<div id="r_HusbandCell" class="form-group row">
		<label id="elh_ivf_HusbandCell" for="x_HusbandCell" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_HusbandCell" class="ivfedit" type="text/html"><span><?php echo $ivf->HusbandCell->caption() ?><?php echo ($ivf->HusbandCell->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->HusbandCell->cellAttributes() ?>>
<script id="tpx_ivf_HusbandCell" class="ivfedit" type="text/html">
<span id="el_ivf_HusbandCell">
<input type="text" data-table="ivf" data-field="x_HusbandCell" name="x_HusbandCell" id="x_HusbandCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->HusbandCell->getPlaceHolder()) ?>" value="<?php echo $ivf->HusbandCell->EditValue ?>"<?php echo $ivf->HusbandCell->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->HusbandCell->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->WifeEmail->Visible) { // WifeEmail ?>
	<div id="r_WifeEmail" class="form-group row">
		<label id="elh_ivf_WifeEmail" for="x_WifeEmail" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_WifeEmail" class="ivfedit" type="text/html"><span><?php echo $ivf->WifeEmail->caption() ?><?php echo ($ivf->WifeEmail->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->WifeEmail->cellAttributes() ?>>
<script id="tpx_ivf_WifeEmail" class="ivfedit" type="text/html">
<span id="el_ivf_WifeEmail">
<input type="text" data-table="ivf" data-field="x_WifeEmail" name="x_WifeEmail" id="x_WifeEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->WifeEmail->getPlaceHolder()) ?>" value="<?php echo $ivf->WifeEmail->EditValue ?>"<?php echo $ivf->WifeEmail->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->WifeEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->HusbandEmail->Visible) { // HusbandEmail ?>
	<div id="r_HusbandEmail" class="form-group row">
		<label id="elh_ivf_HusbandEmail" for="x_HusbandEmail" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_HusbandEmail" class="ivfedit" type="text/html"><span><?php echo $ivf->HusbandEmail->caption() ?><?php echo ($ivf->HusbandEmail->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->HusbandEmail->cellAttributes() ?>>
<script id="tpx_ivf_HusbandEmail" class="ivfedit" type="text/html">
<span id="el_ivf_HusbandEmail">
<input type="text" data-table="ivf" data-field="x_HusbandEmail" name="x_HusbandEmail" id="x_HusbandEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->HusbandEmail->getPlaceHolder()) ?>" value="<?php echo $ivf->HusbandEmail->EditValue ?>"<?php echo $ivf->HusbandEmail->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->HusbandEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<div id="r_ARTCYCLE" class="form-group row">
		<label id="elh_ivf_ARTCYCLE" for="x_ARTCYCLE" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_ARTCYCLE" class="ivfedit" type="text/html"><span><?php echo $ivf->ARTCYCLE->caption() ?><?php echo ($ivf->ARTCYCLE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_ARTCYCLE" class="ivfedit" type="text/html">
<span id="el_ivf_ARTCYCLE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf" data-field="x_ARTCYCLE" data-value-separator="<?php echo $ivf->ARTCYCLE->displayValueSeparatorAttribute() ?>" id="x_ARTCYCLE" name="x_ARTCYCLE"<?php echo $ivf->ARTCYCLE->editAttributes() ?>>
		<?php echo $ivf->ARTCYCLE->selectOptionListHtml("x_ARTCYCLE") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf->ARTCYCLE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->RESULT->Visible) { // RESULT ?>
	<div id="r_RESULT" class="form-group row">
		<label id="elh_ivf_RESULT" for="x_RESULT" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_RESULT" class="ivfedit" type="text/html"><span><?php echo $ivf->RESULT->caption() ?><?php echo ($ivf->RESULT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->RESULT->cellAttributes() ?>>
<script id="tpx_ivf_RESULT" class="ivfedit" type="text/html">
<span id="el_ivf_RESULT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf" data-field="x_RESULT" data-value-separator="<?php echo $ivf->RESULT->displayValueSeparatorAttribute() ?>" id="x_RESULT" name="x_RESULT"<?php echo $ivf->RESULT->editAttributes() ?>>
		<?php echo $ivf->RESULT->selectOptionListHtml("x_RESULT") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf->RESULT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->malepic->Visible) { // malepic ?>
	<div id="r_malepic" class="form-group row">
		<label id="elh_ivf_malepic" for="x_malepic" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_malepic" class="ivfedit" type="text/html"><span><?php echo $ivf->malepic->caption() ?><?php echo ($ivf->malepic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->malepic->cellAttributes() ?>>
<script id="tpx_ivf_malepic" class="ivfedit" type="text/html">
<span id="el_ivf_malepic">
<textarea data-table="ivf" data-field="x_malepic" name="x_malepic" id="x_malepic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf->malepic->getPlaceHolder()) ?>"<?php echo $ivf->malepic->editAttributes() ?>><?php echo $ivf->malepic->EditValue ?></textarea>
</span>
</script>
<?php echo $ivf->malepic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->femalepic->Visible) { // femalepic ?>
	<div id="r_femalepic" class="form-group row">
		<label id="elh_ivf_femalepic" for="x_femalepic" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_femalepic" class="ivfedit" type="text/html"><span><?php echo $ivf->femalepic->caption() ?><?php echo ($ivf->femalepic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->femalepic->cellAttributes() ?>>
<script id="tpx_ivf_femalepic" class="ivfedit" type="text/html">
<span id="el_ivf_femalepic">
<textarea data-table="ivf" data-field="x_femalepic" name="x_femalepic" id="x_femalepic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf->femalepic->getPlaceHolder()) ?>"<?php echo $ivf->femalepic->editAttributes() ?>><?php echo $ivf->femalepic->EditValue ?></textarea>
</span>
</script>
<?php echo $ivf->femalepic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->Mgendar->Visible) { // Mgendar ?>
	<div id="r_Mgendar" class="form-group row">
		<label id="elh_ivf_Mgendar" for="x_Mgendar" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_Mgendar" class="ivfedit" type="text/html"><span><?php echo $ivf->Mgendar->caption() ?><?php echo ($ivf->Mgendar->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->Mgendar->cellAttributes() ?>>
<script id="tpx_ivf_Mgendar" class="ivfedit" type="text/html">
<span id="el_ivf_Mgendar">
<textarea data-table="ivf" data-field="x_Mgendar" name="x_Mgendar" id="x_Mgendar" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf->Mgendar->getPlaceHolder()) ?>"<?php echo $ivf->Mgendar->editAttributes() ?>><?php echo $ivf->Mgendar->EditValue ?></textarea>
</span>
</script>
<?php echo $ivf->Mgendar->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->Fgendar->Visible) { // Fgendar ?>
	<div id="r_Fgendar" class="form-group row">
		<label id="elh_ivf_Fgendar" for="x_Fgendar" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_Fgendar" class="ivfedit" type="text/html"><span><?php echo $ivf->Fgendar->caption() ?><?php echo ($ivf->Fgendar->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->Fgendar->cellAttributes() ?>>
<script id="tpx_ivf_Fgendar" class="ivfedit" type="text/html">
<span id="el_ivf_Fgendar">
<textarea data-table="ivf" data-field="x_Fgendar" name="x_Fgendar" id="x_Fgendar" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf->Fgendar->getPlaceHolder()) ?>"<?php echo $ivf->Fgendar->editAttributes() ?>><?php echo $ivf->Fgendar->EditValue ?></textarea>
</span>
</script>
<?php echo $ivf->Fgendar->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->CoupleID->Visible) { // CoupleID ?>
	<div id="r_CoupleID" class="form-group row">
		<label id="elh_ivf_CoupleID" for="x_CoupleID" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_CoupleID" class="ivfedit" type="text/html"><span><?php echo $ivf->CoupleID->caption() ?><?php echo ($ivf->CoupleID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->CoupleID->cellAttributes() ?>>
<script id="tpx_ivf_CoupleID" class="ivfedit" type="text/html">
<span id="el_ivf_CoupleID">
<span<?php echo $ivf->CoupleID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf->CoupleID->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="ivf" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" value="<?php echo HtmlEncode($ivf->CoupleID->CurrentValue) ?>">
<?php echo $ivf->CoupleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_ivf_PatientName" for="x_PatientName" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_PatientName" class="ivfedit" type="text/html"><span><?php echo $ivf->PatientName->caption() ?><?php echo ($ivf->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->PatientName->cellAttributes() ?>>
<script id="tpx_ivf_PatientName" class="ivfedit" type="text/html">
<span id="el_ivf_PatientName">
<input type="text" data-table="ivf" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->PatientName->getPlaceHolder()) ?>" value="<?php echo $ivf->PatientName->EditValue ?>"<?php echo $ivf->PatientName->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_ivf_PatientID" for="x_PatientID" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_PatientID" class="ivfedit" type="text/html"><span><?php echo $ivf->PatientID->caption() ?><?php echo ($ivf->PatientID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->PatientID->cellAttributes() ?>>
<script id="tpx_ivf_PatientID" class="ivfedit" type="text/html">
<span id="el_ivf_PatientID">
<input type="text" data-table="ivf" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->PatientID->getPlaceHolder()) ?>" value="<?php echo $ivf->PatientID->EditValue ?>"<?php echo $ivf->PatientID->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_ivf_PartnerName" for="x_PartnerName" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_PartnerName" class="ivfedit" type="text/html"><span><?php echo $ivf->PartnerName->caption() ?><?php echo ($ivf->PartnerName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->PartnerName->cellAttributes() ?>>
<script id="tpx_ivf_PartnerName" class="ivfedit" type="text/html">
<span id="el_ivf_PartnerName">
<input type="text" data-table="ivf" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->PartnerName->getPlaceHolder()) ?>" value="<?php echo $ivf->PartnerName->EditValue ?>"<?php echo $ivf->PartnerName->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label id="elh_ivf_PartnerID" for="x_PartnerID" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_PartnerID" class="ivfedit" type="text/html"><span><?php echo $ivf->PartnerID->caption() ?><?php echo ($ivf->PartnerID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->PartnerID->cellAttributes() ?>>
<script id="tpx_ivf_PartnerID" class="ivfedit" type="text/html">
<span id="el_ivf_PartnerID">
<input type="text" data-table="ivf" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->PartnerID->getPlaceHolder()) ?>" value="<?php echo $ivf->PartnerID->EditValue ?>"<?php echo $ivf->PartnerID->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->PartnerID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_ivf_DrID" for="x_DrID" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_DrID" class="ivfedit" type="text/html"><span><?php echo $ivf->DrID->caption() ?><?php echo ($ivf->DrID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->DrID->cellAttributes() ?>>
<script id="tpx_ivf_DrID" class="ivfedit" type="text/html">
<span id="el_ivf_DrID">
<?php $ivf->DrID->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf->DrID->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?php echo strval($ivf->DrID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf->DrID->ViewValue) : $ivf->DrID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf->DrID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf->DrID->ReadOnly || $ivf->DrID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf->DrID->Lookup->getParamTag("p_x_DrID") ?>
<input type="hidden" data-table="ivf" data-field="x_DrID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?php echo $ivf->DrID->CurrentValue ?>"<?php echo $ivf->DrID->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label id="elh_ivf_DrDepartment" for="x_DrDepartment" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_DrDepartment" class="ivfedit" type="text/html"><span><?php echo $ivf->DrDepartment->caption() ?><?php echo ($ivf->DrDepartment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->DrDepartment->cellAttributes() ?>>
<script id="tpx_ivf_DrDepartment" class="ivfedit" type="text/html">
<span id="el_ivf_DrDepartment">
<input type="text" data-table="ivf" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $ivf->DrDepartment->EditValue ?>"<?php echo $ivf->DrDepartment->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->DrDepartment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_ivf_Doctor" for="x_Doctor" class="<?php echo $ivf_edit->LeftColumnClass ?>"><script id="tpc_ivf_Doctor" class="ivfedit" type="text/html"><span><?php echo $ivf->Doctor->caption() ?><?php echo ($ivf->Doctor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_edit->RightColumnClass ?>"><div<?php echo $ivf->Doctor->cellAttributes() ?>>
<script id="tpx_ivf_Doctor" class="ivfedit" type="text/html">
<span id="el_ivf_Doctor">
<input type="text" data-table="ivf" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->Doctor->getPlaceHolder()) ?>" value="<?php echo $ivf->Doctor->EditValue ?>"<?php echo $ivf->Doctor->editAttributes() ?>>
</span>
</script>
<?php echo $ivf->Doctor->CustomMsg ?></div></div>
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
				   {{include tmpl="#tpc_ivf_malepic"/}}&nbsp;{{include tmpl="#tpx_ivf_malepic"/}}
				   {{include tmpl="#tpc_ivf_Mgendar"/}}&nbsp;{{include tmpl="#tpx_ivf_Mgendar"/}}
				   {{include tmpl="#tpc_ivf_PartnerName"/}}&nbsp;{{include tmpl="#tpx_ivf_PartnerName"/}}
				   {{include tmpl="#tpc_ivf_PartnerID"/}}&nbsp;{{include tmpl="#tpx_ivf_PartnerID"/}}
				   {{include tmpl="#tpc_ivf_WifeCell"/}}&nbsp;{{include tmpl="#tpx_ivf_WifeCell"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_malepropic"/}}&nbsp;{{include tmpl="#tpx_ivf_malepropic"/}}</span>
				  </div>
				   <div class="ew-row" style="display: none;">
				   {{include tmpl="#tpc_ivf_femalepic"/}}&nbsp;{{include tmpl="#tpx_ivf_femalepic"/}}
				   {{include tmpl="#tpc_ivf_Fgendar"/}}&nbsp;{{include tmpl="#tpx_ivf_Fgendar"/}}
				   {{include tmpl="#tpc_ivf_PatientName"/}}&nbsp;{{include tmpl="#tpx_ivf_PatientName"/}}
				   {{include tmpl="#tpc_ivf_PatientID"/}}&nbsp;{{include tmpl="#tpx_ivf_PatientID"/}}
				   {{include tmpl="#tpc_ivf_HusbandCell"/}}&nbsp;{{include tmpl="#tpx_ivf_HusbandCell"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_femalepropic"/}}&nbsp;{{include tmpl="#tpx_ivf_femalepropic"/}}</span>
				  </div>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body card-widget widget-user">
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_Female"/}}&nbsp;{{include tmpl="#tpx_ivf_Female"/}}</span>
				  </div>
			<div class="widget-user-image">
			   		<img id="femaleprofilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results2[0]["profilePic"]; ?>'  alt="User Avatar"> 
			  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_WifeEducation"/}}&nbsp;{{include tmpl="#tpx_ivf_WifeEducation"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_WifeWorkHours"/}}&nbsp;{{include tmpl="#tpx_ivf_WifeWorkHours"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_WifeCell"/}}&nbsp;{{include tmpl="#tpx_ivf_WifeCell"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_WifeEmail"/}}&nbsp;{{include tmpl="#tpx_ivf_WifeEmail"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_ivf_Male"/}}&nbsp;{{include tmpl="#tpx_ivf_Male"/}}</span>
				  </div>
			<div class="widget-user-image">
			   		<img id="maleprofilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results1[0]["profilePic"]; ?>' alt="User Avatar"> 
			  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_HusbandEducation"/}}&nbsp;{{include tmpl="#tpx_ivf_HusbandEducation"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_HusbandWorkHours"/}}&nbsp;{{include tmpl="#tpx_ivf_HusbandWorkHours"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_HusbandCell"/}}&nbsp;{{include tmpl="#tpx_ivf_HusbandCell"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_HusbandEmail"/}}&nbsp;{{include tmpl="#tpx_ivf_HusbandEmail"/}}</span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<table class="ew-table">
	 <tbody>
		 <tr>
		 	<td>{{include tmpl="#tpc_ivf_DrID"/}}&nbsp;{{include tmpl="#tpx_ivf_DrID"/}}</td>
			<td>{{include tmpl="#tpc_ivf_Doctor"/}}&nbsp;{{include tmpl="#tpx_ivf_Doctor"/}}</td>
			<td>{{include tmpl="#tpc_ivf_DrDepartment"/}}&nbsp;{{include tmpl="#tpx_ivf_DrDepartment"/}}</td>
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
					<span class="ew-cell">{{include tmpl="#tpc_ivf_PatientLanguage"/}}&nbsp;{{include tmpl="#tpx_ivf_PatientLanguage"/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ReferedBy"/}}&nbsp;{{include tmpl="#tpx_ivf_ReferedBy"/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ReferPhNo"/}}&nbsp;{{include tmpl="#tpx_ivf_ReferPhNo"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_ivf_status"/}}&nbsp;{{include tmpl="#tpx_ivf_status"/}}</span>
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
<?php if ($ivf->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("ivf_treatment_plan", "TblCaption") ?></h4>
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
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf->Rows) ?> };
ew.applyTemplate("tpd_ivfedit", "tpm_ivfedit", "ivfedit", "<?php echo $ivf->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivfedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ivf_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_edit->terminate();
?>