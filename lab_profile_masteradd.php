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
$lab_profile_master_add = new lab_profile_master_add();

// Run the page
$lab_profile_master_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_profile_master_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var flab_profile_masteradd = currentForm = new ew.Form("flab_profile_masteradd", "add");

// Validate form
flab_profile_masteradd.validate = function() {
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
		<?php if ($lab_profile_master_add->ProfileCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfileCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->ProfileCode->caption(), $lab_profile_master->ProfileCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_master_add->ProfileName->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfileName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->ProfileName->caption(), $lab_profile_master->ProfileName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_master_add->ProfileAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfileAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->ProfileAmount->caption(), $lab_profile_master->ProfileAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ProfileAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_profile_master->ProfileAmount->errorMessage()) ?>");
		<?php if ($lab_profile_master_add->ProfileSpecialAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfileSpecialAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->ProfileSpecialAmount->caption(), $lab_profile_master->ProfileSpecialAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ProfileSpecialAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_profile_master->ProfileSpecialAmount->errorMessage()) ?>");
		<?php if ($lab_profile_master_add->ProfileMasterInactive->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfileMasterInactive");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->ProfileMasterInactive->caption(), $lab_profile_master->ProfileMasterInactive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_master_add->ReagentAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_ReagentAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->ReagentAmt->caption(), $lab_profile_master->ReagentAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReagentAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_profile_master->ReagentAmt->errorMessage()) ?>");
		<?php if ($lab_profile_master_add->LabAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_LabAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->LabAmt->caption(), $lab_profile_master->LabAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LabAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_profile_master->LabAmt->errorMessage()) ?>");
		<?php if ($lab_profile_master_add->RefAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_RefAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->RefAmt->caption(), $lab_profile_master->RefAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RefAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_profile_master->RefAmt->errorMessage()) ?>");
		<?php if ($lab_profile_master_add->MainDeptCD->Required) { ?>
			elm = this.getElements("x" + infix + "_MainDeptCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->MainDeptCD->caption(), $lab_profile_master->MainDeptCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_master_add->Individual->Required) { ?>
			elm = this.getElements("x" + infix + "_Individual");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->Individual->caption(), $lab_profile_master->Individual->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_master_add->ShortName->Required) { ?>
			elm = this.getElements("x" + infix + "_ShortName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->ShortName->caption(), $lab_profile_master->ShortName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_master_add->Note->Required) { ?>
			elm = this.getElements("x" + infix + "_Note");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->Note->caption(), $lab_profile_master->Note->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_master_add->PrevAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_PrevAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->PrevAmt->caption(), $lab_profile_master->PrevAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PrevAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_profile_master->PrevAmt->errorMessage()) ?>");
		<?php if ($lab_profile_master_add->BillName->Required) { ?>
			elm = this.getElements("x" + infix + "_BillName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->BillName->caption(), $lab_profile_master->BillName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_master_add->ActualAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_ActualAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->ActualAmt->caption(), $lab_profile_master->ActualAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ActualAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_profile_master->ActualAmt->errorMessage()) ?>");
		<?php if ($lab_profile_master_add->NoHeading->Required) { ?>
			elm = this.getElements("x" + infix + "_NoHeading");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->NoHeading->caption(), $lab_profile_master->NoHeading->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_master_add->EditDate->Required) { ?>
			elm = this.getElements("x" + infix + "_EditDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->EditDate->caption(), $lab_profile_master->EditDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EditDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_profile_master->EditDate->errorMessage()) ?>");
		<?php if ($lab_profile_master_add->EditUser->Required) { ?>
			elm = this.getElements("x" + infix + "_EditUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->EditUser->caption(), $lab_profile_master->EditUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_master_add->HISCD->Required) { ?>
			elm = this.getElements("x" + infix + "_HISCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->HISCD->caption(), $lab_profile_master->HISCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_master_add->PriceList->Required) { ?>
			elm = this.getElements("x" + infix + "_PriceList");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->PriceList->caption(), $lab_profile_master->PriceList->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_master_add->IPAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_IPAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->IPAmt->caption(), $lab_profile_master->IPAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IPAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_profile_master->IPAmt->errorMessage()) ?>");
		<?php if ($lab_profile_master_add->IInsAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_IInsAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->IInsAmt->caption(), $lab_profile_master->IInsAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IInsAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_profile_master->IInsAmt->errorMessage()) ?>");
		<?php if ($lab_profile_master_add->ManualCD->Required) { ?>
			elm = this.getElements("x" + infix + "_ManualCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->ManualCD->caption(), $lab_profile_master->ManualCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_master_add->Free->Required) { ?>
			elm = this.getElements("x" + infix + "_Free");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->Free->caption(), $lab_profile_master->Free->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_master_add->IIpAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_IIpAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->IIpAmt->caption(), $lab_profile_master->IIpAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IIpAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_profile_master->IIpAmt->errorMessage()) ?>");
		<?php if ($lab_profile_master_add->InsAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_InsAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->InsAmt->caption(), $lab_profile_master->InsAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_InsAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_profile_master->InsAmt->errorMessage()) ?>");
		<?php if ($lab_profile_master_add->OutSource->Required) { ?>
			elm = this.getElements("x" + infix + "_OutSource");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master->OutSource->caption(), $lab_profile_master->OutSource->RequiredErrorMessage)) ?>");
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
flab_profile_masteradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_profile_masteradd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_profile_master_add->showPageHeader(); ?>
<?php
$lab_profile_master_add->showMessage();
?>
<form name="flab_profile_masteradd" id="flab_profile_masteradd" class="<?php echo $lab_profile_master_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_profile_master_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_profile_master_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_profile_master">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$lab_profile_master_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($lab_profile_master->ProfileCode->Visible) { // ProfileCode ?>
	<div id="r_ProfileCode" class="form-group row">
		<label id="elh_lab_profile_master_ProfileCode" for="x_ProfileCode" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->ProfileCode->caption() ?><?php echo ($lab_profile_master->ProfileCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->ProfileCode->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileCode">
<input type="text" data-table="lab_profile_master" data-field="x_ProfileCode" name="x_ProfileCode" id="x_ProfileCode" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_profile_master->ProfileCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->ProfileCode->EditValue ?>"<?php echo $lab_profile_master->ProfileCode->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->ProfileCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->ProfileName->Visible) { // ProfileName ?>
	<div id="r_ProfileName" class="form-group row">
		<label id="elh_lab_profile_master_ProfileName" for="x_ProfileName" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->ProfileName->caption() ?><?php echo ($lab_profile_master->ProfileName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->ProfileName->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileName">
<input type="text" data-table="lab_profile_master" data-field="x_ProfileName" name="x_ProfileName" id="x_ProfileName" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_profile_master->ProfileName->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->ProfileName->EditValue ?>"<?php echo $lab_profile_master->ProfileName->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->ProfileName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->ProfileAmount->Visible) { // ProfileAmount ?>
	<div id="r_ProfileAmount" class="form-group row">
		<label id="elh_lab_profile_master_ProfileAmount" for="x_ProfileAmount" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->ProfileAmount->caption() ?><?php echo ($lab_profile_master->ProfileAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->ProfileAmount->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileAmount">
<input type="text" data-table="lab_profile_master" data-field="x_ProfileAmount" name="x_ProfileAmount" id="x_ProfileAmount" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master->ProfileAmount->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->ProfileAmount->EditValue ?>"<?php echo $lab_profile_master->ProfileAmount->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->ProfileAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->ProfileSpecialAmount->Visible) { // ProfileSpecialAmount ?>
	<div id="r_ProfileSpecialAmount" class="form-group row">
		<label id="elh_lab_profile_master_ProfileSpecialAmount" for="x_ProfileSpecialAmount" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->ProfileSpecialAmount->caption() ?><?php echo ($lab_profile_master->ProfileSpecialAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->ProfileSpecialAmount->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileSpecialAmount">
<input type="text" data-table="lab_profile_master" data-field="x_ProfileSpecialAmount" name="x_ProfileSpecialAmount" id="x_ProfileSpecialAmount" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master->ProfileSpecialAmount->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->ProfileSpecialAmount->EditValue ?>"<?php echo $lab_profile_master->ProfileSpecialAmount->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->ProfileSpecialAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->ProfileMasterInactive->Visible) { // ProfileMasterInactive ?>
	<div id="r_ProfileMasterInactive" class="form-group row">
		<label id="elh_lab_profile_master_ProfileMasterInactive" for="x_ProfileMasterInactive" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->ProfileMasterInactive->caption() ?><?php echo ($lab_profile_master->ProfileMasterInactive->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->ProfileMasterInactive->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileMasterInactive">
<input type="text" data-table="lab_profile_master" data-field="x_ProfileMasterInactive" name="x_ProfileMasterInactive" id="x_ProfileMasterInactive" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_profile_master->ProfileMasterInactive->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->ProfileMasterInactive->EditValue ?>"<?php echo $lab_profile_master->ProfileMasterInactive->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->ProfileMasterInactive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->ReagentAmt->Visible) { // ReagentAmt ?>
	<div id="r_ReagentAmt" class="form-group row">
		<label id="elh_lab_profile_master_ReagentAmt" for="x_ReagentAmt" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->ReagentAmt->caption() ?><?php echo ($lab_profile_master->ReagentAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->ReagentAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_ReagentAmt">
<input type="text" data-table="lab_profile_master" data-field="x_ReagentAmt" name="x_ReagentAmt" id="x_ReagentAmt" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master->ReagentAmt->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->ReagentAmt->EditValue ?>"<?php echo $lab_profile_master->ReagentAmt->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->ReagentAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->LabAmt->Visible) { // LabAmt ?>
	<div id="r_LabAmt" class="form-group row">
		<label id="elh_lab_profile_master_LabAmt" for="x_LabAmt" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->LabAmt->caption() ?><?php echo ($lab_profile_master->LabAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->LabAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_LabAmt">
<input type="text" data-table="lab_profile_master" data-field="x_LabAmt" name="x_LabAmt" id="x_LabAmt" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master->LabAmt->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->LabAmt->EditValue ?>"<?php echo $lab_profile_master->LabAmt->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->LabAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->RefAmt->Visible) { // RefAmt ?>
	<div id="r_RefAmt" class="form-group row">
		<label id="elh_lab_profile_master_RefAmt" for="x_RefAmt" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->RefAmt->caption() ?><?php echo ($lab_profile_master->RefAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->RefAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_RefAmt">
<input type="text" data-table="lab_profile_master" data-field="x_RefAmt" name="x_RefAmt" id="x_RefAmt" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master->RefAmt->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->RefAmt->EditValue ?>"<?php echo $lab_profile_master->RefAmt->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->RefAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->MainDeptCD->Visible) { // MainDeptCD ?>
	<div id="r_MainDeptCD" class="form-group row">
		<label id="elh_lab_profile_master_MainDeptCD" for="x_MainDeptCD" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->MainDeptCD->caption() ?><?php echo ($lab_profile_master->MainDeptCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->MainDeptCD->cellAttributes() ?>>
<span id="el_lab_profile_master_MainDeptCD">
<input type="text" data-table="lab_profile_master" data-field="x_MainDeptCD" name="x_MainDeptCD" id="x_MainDeptCD" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_profile_master->MainDeptCD->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->MainDeptCD->EditValue ?>"<?php echo $lab_profile_master->MainDeptCD->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->MainDeptCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->Individual->Visible) { // Individual ?>
	<div id="r_Individual" class="form-group row">
		<label id="elh_lab_profile_master_Individual" for="x_Individual" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->Individual->caption() ?><?php echo ($lab_profile_master->Individual->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->Individual->cellAttributes() ?>>
<span id="el_lab_profile_master_Individual">
<input type="text" data-table="lab_profile_master" data-field="x_Individual" name="x_Individual" id="x_Individual" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_profile_master->Individual->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->Individual->EditValue ?>"<?php echo $lab_profile_master->Individual->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->Individual->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->ShortName->Visible) { // ShortName ?>
	<div id="r_ShortName" class="form-group row">
		<label id="elh_lab_profile_master_ShortName" for="x_ShortName" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->ShortName->caption() ?><?php echo ($lab_profile_master->ShortName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->ShortName->cellAttributes() ?>>
<span id="el_lab_profile_master_ShortName">
<input type="text" data-table="lab_profile_master" data-field="x_ShortName" name="x_ShortName" id="x_ShortName" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($lab_profile_master->ShortName->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->ShortName->EditValue ?>"<?php echo $lab_profile_master->ShortName->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->ShortName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->Note->Visible) { // Note ?>
	<div id="r_Note" class="form-group row">
		<label id="elh_lab_profile_master_Note" for="x_Note" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->Note->caption() ?><?php echo ($lab_profile_master->Note->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->Note->cellAttributes() ?>>
<span id="el_lab_profile_master_Note">
<textarea data-table="lab_profile_master" data-field="x_Note" name="x_Note" id="x_Note" cols="35" rows="4" placeholder="<?php echo HtmlEncode($lab_profile_master->Note->getPlaceHolder()) ?>"<?php echo $lab_profile_master->Note->editAttributes() ?>><?php echo $lab_profile_master->Note->EditValue ?></textarea>
</span>
<?php echo $lab_profile_master->Note->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->PrevAmt->Visible) { // PrevAmt ?>
	<div id="r_PrevAmt" class="form-group row">
		<label id="elh_lab_profile_master_PrevAmt" for="x_PrevAmt" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->PrevAmt->caption() ?><?php echo ($lab_profile_master->PrevAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->PrevAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_PrevAmt">
<input type="text" data-table="lab_profile_master" data-field="x_PrevAmt" name="x_PrevAmt" id="x_PrevAmt" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master->PrevAmt->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->PrevAmt->EditValue ?>"<?php echo $lab_profile_master->PrevAmt->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->PrevAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->BillName->Visible) { // BillName ?>
	<div id="r_BillName" class="form-group row">
		<label id="elh_lab_profile_master_BillName" for="x_BillName" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->BillName->caption() ?><?php echo ($lab_profile_master->BillName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->BillName->cellAttributes() ?>>
<span id="el_lab_profile_master_BillName">
<input type="text" data-table="lab_profile_master" data-field="x_BillName" name="x_BillName" id="x_BillName" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_profile_master->BillName->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->BillName->EditValue ?>"<?php echo $lab_profile_master->BillName->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->BillName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->ActualAmt->Visible) { // ActualAmt ?>
	<div id="r_ActualAmt" class="form-group row">
		<label id="elh_lab_profile_master_ActualAmt" for="x_ActualAmt" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->ActualAmt->caption() ?><?php echo ($lab_profile_master->ActualAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->ActualAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_ActualAmt">
<input type="text" data-table="lab_profile_master" data-field="x_ActualAmt" name="x_ActualAmt" id="x_ActualAmt" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master->ActualAmt->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->ActualAmt->EditValue ?>"<?php echo $lab_profile_master->ActualAmt->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->ActualAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->NoHeading->Visible) { // NoHeading ?>
	<div id="r_NoHeading" class="form-group row">
		<label id="elh_lab_profile_master_NoHeading" for="x_NoHeading" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->NoHeading->caption() ?><?php echo ($lab_profile_master->NoHeading->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->NoHeading->cellAttributes() ?>>
<span id="el_lab_profile_master_NoHeading">
<input type="text" data-table="lab_profile_master" data-field="x_NoHeading" name="x_NoHeading" id="x_NoHeading" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_profile_master->NoHeading->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->NoHeading->EditValue ?>"<?php echo $lab_profile_master->NoHeading->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->NoHeading->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->EditDate->Visible) { // EditDate ?>
	<div id="r_EditDate" class="form-group row">
		<label id="elh_lab_profile_master_EditDate" for="x_EditDate" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->EditDate->caption() ?><?php echo ($lab_profile_master->EditDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->EditDate->cellAttributes() ?>>
<span id="el_lab_profile_master_EditDate">
<input type="text" data-table="lab_profile_master" data-field="x_EditDate" name="x_EditDate" id="x_EditDate" placeholder="<?php echo HtmlEncode($lab_profile_master->EditDate->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->EditDate->EditValue ?>"<?php echo $lab_profile_master->EditDate->editAttributes() ?>>
<?php if (!$lab_profile_master->EditDate->ReadOnly && !$lab_profile_master->EditDate->Disabled && !isset($lab_profile_master->EditDate->EditAttrs["readonly"]) && !isset($lab_profile_master->EditDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_profile_masteradd", "x_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $lab_profile_master->EditDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->EditUser->Visible) { // EditUser ?>
	<div id="r_EditUser" class="form-group row">
		<label id="elh_lab_profile_master_EditUser" for="x_EditUser" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->EditUser->caption() ?><?php echo ($lab_profile_master->EditUser->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->EditUser->cellAttributes() ?>>
<span id="el_lab_profile_master_EditUser">
<input type="text" data-table="lab_profile_master" data-field="x_EditUser" name="x_EditUser" id="x_EditUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_profile_master->EditUser->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->EditUser->EditValue ?>"<?php echo $lab_profile_master->EditUser->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->EditUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->HISCD->Visible) { // HISCD ?>
	<div id="r_HISCD" class="form-group row">
		<label id="elh_lab_profile_master_HISCD" for="x_HISCD" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->HISCD->caption() ?><?php echo ($lab_profile_master->HISCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->HISCD->cellAttributes() ?>>
<span id="el_lab_profile_master_HISCD">
<input type="text" data-table="lab_profile_master" data-field="x_HISCD" name="x_HISCD" id="x_HISCD" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_profile_master->HISCD->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->HISCD->EditValue ?>"<?php echo $lab_profile_master->HISCD->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->HISCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->PriceList->Visible) { // PriceList ?>
	<div id="r_PriceList" class="form-group row">
		<label id="elh_lab_profile_master_PriceList" for="x_PriceList" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->PriceList->caption() ?><?php echo ($lab_profile_master->PriceList->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->PriceList->cellAttributes() ?>>
<span id="el_lab_profile_master_PriceList">
<input type="text" data-table="lab_profile_master" data-field="x_PriceList" name="x_PriceList" id="x_PriceList" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_profile_master->PriceList->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->PriceList->EditValue ?>"<?php echo $lab_profile_master->PriceList->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->PriceList->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->IPAmt->Visible) { // IPAmt ?>
	<div id="r_IPAmt" class="form-group row">
		<label id="elh_lab_profile_master_IPAmt" for="x_IPAmt" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->IPAmt->caption() ?><?php echo ($lab_profile_master->IPAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->IPAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_IPAmt">
<input type="text" data-table="lab_profile_master" data-field="x_IPAmt" name="x_IPAmt" id="x_IPAmt" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master->IPAmt->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->IPAmt->EditValue ?>"<?php echo $lab_profile_master->IPAmt->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->IPAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->IInsAmt->Visible) { // IInsAmt ?>
	<div id="r_IInsAmt" class="form-group row">
		<label id="elh_lab_profile_master_IInsAmt" for="x_IInsAmt" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->IInsAmt->caption() ?><?php echo ($lab_profile_master->IInsAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->IInsAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_IInsAmt">
<input type="text" data-table="lab_profile_master" data-field="x_IInsAmt" name="x_IInsAmt" id="x_IInsAmt" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master->IInsAmt->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->IInsAmt->EditValue ?>"<?php echo $lab_profile_master->IInsAmt->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->IInsAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->ManualCD->Visible) { // ManualCD ?>
	<div id="r_ManualCD" class="form-group row">
		<label id="elh_lab_profile_master_ManualCD" for="x_ManualCD" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->ManualCD->caption() ?><?php echo ($lab_profile_master->ManualCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->ManualCD->cellAttributes() ?>>
<span id="el_lab_profile_master_ManualCD">
<input type="text" data-table="lab_profile_master" data-field="x_ManualCD" name="x_ManualCD" id="x_ManualCD" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_profile_master->ManualCD->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->ManualCD->EditValue ?>"<?php echo $lab_profile_master->ManualCD->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->ManualCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->Free->Visible) { // Free ?>
	<div id="r_Free" class="form-group row">
		<label id="elh_lab_profile_master_Free" for="x_Free" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->Free->caption() ?><?php echo ($lab_profile_master->Free->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->Free->cellAttributes() ?>>
<span id="el_lab_profile_master_Free">
<input type="text" data-table="lab_profile_master" data-field="x_Free" name="x_Free" id="x_Free" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_profile_master->Free->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->Free->EditValue ?>"<?php echo $lab_profile_master->Free->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->Free->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->IIpAmt->Visible) { // IIpAmt ?>
	<div id="r_IIpAmt" class="form-group row">
		<label id="elh_lab_profile_master_IIpAmt" for="x_IIpAmt" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->IIpAmt->caption() ?><?php echo ($lab_profile_master->IIpAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->IIpAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_IIpAmt">
<input type="text" data-table="lab_profile_master" data-field="x_IIpAmt" name="x_IIpAmt" id="x_IIpAmt" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master->IIpAmt->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->IIpAmt->EditValue ?>"<?php echo $lab_profile_master->IIpAmt->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->IIpAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->InsAmt->Visible) { // InsAmt ?>
	<div id="r_InsAmt" class="form-group row">
		<label id="elh_lab_profile_master_InsAmt" for="x_InsAmt" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->InsAmt->caption() ?><?php echo ($lab_profile_master->InsAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->InsAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_InsAmt">
<input type="text" data-table="lab_profile_master" data-field="x_InsAmt" name="x_InsAmt" id="x_InsAmt" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master->InsAmt->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->InsAmt->EditValue ?>"<?php echo $lab_profile_master->InsAmt->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->InsAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master->OutSource->Visible) { // OutSource ?>
	<div id="r_OutSource" class="form-group row">
		<label id="elh_lab_profile_master_OutSource" for="x_OutSource" class="<?php echo $lab_profile_master_add->LeftColumnClass ?>"><?php echo $lab_profile_master->OutSource->caption() ?><?php echo ($lab_profile_master->OutSource->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_add->RightColumnClass ?>"><div<?php echo $lab_profile_master->OutSource->cellAttributes() ?>>
<span id="el_lab_profile_master_OutSource">
<input type="text" data-table="lab_profile_master" data-field="x_OutSource" name="x_OutSource" id="x_OutSource" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_profile_master->OutSource->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master->OutSource->EditValue ?>"<?php echo $lab_profile_master->OutSource->editAttributes() ?>>
</span>
<?php echo $lab_profile_master->OutSource->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_profile_master_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_profile_master_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_profile_master_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_profile_master_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_profile_master_add->terminate();
?>