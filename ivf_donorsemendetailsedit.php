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
$ivf_donorsemendetails_edit = new ivf_donorsemendetails_edit();

// Run the page
$ivf_donorsemendetails_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_donorsemendetails_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fivf_donorsemendetailsedit = currentForm = new ew.Form("fivf_donorsemendetailsedit", "edit");

// Validate form
fivf_donorsemendetailsedit.validate = function() {
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
		<?php if ($ivf_donorsemendetails_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->id->caption(), $ivf_donorsemendetails->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_donorsemendetails_edit->RIDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->RIDNo->caption(), $ivf_donorsemendetails->RIDNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails->RIDNo->errorMessage()) ?>");
		<?php if ($ivf_donorsemendetails_edit->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->TidNo->caption(), $ivf_donorsemendetails->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails->TidNo->errorMessage()) ?>");
		<?php if ($ivf_donorsemendetails_edit->Agency->Required) { ?>
			elm = this.getElements("x" + infix + "_Agency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->Agency->caption(), $ivf_donorsemendetails->Agency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_donorsemendetails_edit->ReceivedOn->Required) { ?>
			elm = this.getElements("x" + infix + "_ReceivedOn");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->ReceivedOn->caption(), $ivf_donorsemendetails->ReceivedOn->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReceivedOn");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails->ReceivedOn->errorMessage()) ?>");
		<?php if ($ivf_donorsemendetails_edit->ReceivedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ReceivedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->ReceivedBy->caption(), $ivf_donorsemendetails->ReceivedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_donorsemendetails_edit->DonorNo->Required) { ?>
			elm = this.getElements("x" + infix + "_DonorNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->DonorNo->caption(), $ivf_donorsemendetails->DonorNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_donorsemendetails_edit->BatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_BatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->BatchNo->caption(), $ivf_donorsemendetails->BatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_donorsemendetails_edit->BloodGroup->Required) { ?>
			elm = this.getElements("x" + infix + "_BloodGroup");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->BloodGroup->caption(), $ivf_donorsemendetails->BloodGroup->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_donorsemendetails_edit->Height->Required) { ?>
			elm = this.getElements("x" + infix + "_Height");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->Height->caption(), $ivf_donorsemendetails->Height->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_donorsemendetails_edit->SkinColor->Required) { ?>
			elm = this.getElements("x" + infix + "_SkinColor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->SkinColor->caption(), $ivf_donorsemendetails->SkinColor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_donorsemendetails_edit->EyeColor->Required) { ?>
			elm = this.getElements("x" + infix + "_EyeColor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->EyeColor->caption(), $ivf_donorsemendetails->EyeColor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_donorsemendetails_edit->HairColor->Required) { ?>
			elm = this.getElements("x" + infix + "_HairColor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->HairColor->caption(), $ivf_donorsemendetails->HairColor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_donorsemendetails_edit->NoOfVials->Required) { ?>
			elm = this.getElements("x" + infix + "_NoOfVials");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->NoOfVials->caption(), $ivf_donorsemendetails->NoOfVials->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_donorsemendetails_edit->Tank->Required) { ?>
			elm = this.getElements("x" + infix + "_Tank");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->Tank->caption(), $ivf_donorsemendetails->Tank->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_donorsemendetails_edit->Canister->Required) { ?>
			elm = this.getElements("x" + infix + "_Canister");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->Canister->caption(), $ivf_donorsemendetails->Canister->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_donorsemendetails_edit->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->Remarks->caption(), $ivf_donorsemendetails->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_donorsemendetails_edit->patientid->Required) { ?>
			elm = this.getElements("x" + infix + "_patientid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->patientid->caption(), $ivf_donorsemendetails->patientid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_patientid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails->patientid->errorMessage()) ?>");
		<?php if ($ivf_donorsemendetails_edit->coupleid->Required) { ?>
			elm = this.getElements("x" + infix + "_coupleid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->coupleid->caption(), $ivf_donorsemendetails->coupleid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_coupleid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails->coupleid->errorMessage()) ?>");
		<?php if ($ivf_donorsemendetails_edit->Usedstatus->Required) { ?>
			elm = this.getElements("x" + infix + "_Usedstatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->Usedstatus->caption(), $ivf_donorsemendetails->Usedstatus->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Usedstatus");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails->Usedstatus->errorMessage()) ?>");
		<?php if ($ivf_donorsemendetails_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->status->caption(), $ivf_donorsemendetails->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails->status->errorMessage()) ?>");
		<?php if ($ivf_donorsemendetails_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->modifiedby->caption(), $ivf_donorsemendetails->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_donorsemendetails_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->modifieddatetime->caption(), $ivf_donorsemendetails->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_donorsemendetails_edit->Lagency->Required) { ?>
			elm = this.getElements("x" + infix + "_Lagency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails->Lagency->caption(), $ivf_donorsemendetails->Lagency->RequiredErrorMessage)) ?>");
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
fivf_donorsemendetailsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_donorsemendetailsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_donorsemendetailsedit.lists["x_BloodGroup"] = <?php echo $ivf_donorsemendetails_edit->BloodGroup->Lookup->toClientList() ?>;
fivf_donorsemendetailsedit.lists["x_BloodGroup"].options = <?php echo JsonEncode($ivf_donorsemendetails_edit->BloodGroup->lookupOptions()) ?>;
fivf_donorsemendetailsedit.lists["x_SkinColor"] = <?php echo $ivf_donorsemendetails_edit->SkinColor->Lookup->toClientList() ?>;
fivf_donorsemendetailsedit.lists["x_SkinColor"].options = <?php echo JsonEncode($ivf_donorsemendetails_edit->SkinColor->options(FALSE, TRUE)) ?>;
fivf_donorsemendetailsedit.lists["x_EyeColor"] = <?php echo $ivf_donorsemendetails_edit->EyeColor->Lookup->toClientList() ?>;
fivf_donorsemendetailsedit.lists["x_EyeColor"].options = <?php echo JsonEncode($ivf_donorsemendetails_edit->EyeColor->options(FALSE, TRUE)) ?>;
fivf_donorsemendetailsedit.lists["x_HairColor"] = <?php echo $ivf_donorsemendetails_edit->HairColor->Lookup->toClientList() ?>;
fivf_donorsemendetailsedit.lists["x_HairColor"].options = <?php echo JsonEncode($ivf_donorsemendetails_edit->HairColor->options(FALSE, TRUE)) ?>;
fivf_donorsemendetailsedit.lists["x_Lagency"] = <?php echo $ivf_donorsemendetails_edit->Lagency->Lookup->toClientList() ?>;
fivf_donorsemendetailsedit.lists["x_Lagency"].options = <?php echo JsonEncode($ivf_donorsemendetails_edit->Lagency->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_donorsemendetails_edit->showPageHeader(); ?>
<?php
$ivf_donorsemendetails_edit->showMessage();
?>
<form name="fivf_donorsemendetailsedit" id="fivf_donorsemendetailsedit" class="<?php echo $ivf_donorsemendetails_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_donorsemendetails_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_donorsemendetails_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_donorsemendetails">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_donorsemendetails_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($ivf_donorsemendetails->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_donorsemendetails_id" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->id->caption() ?><?php echo ($ivf_donorsemendetails->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->id->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_id">
<span<?php echo $ivf_donorsemendetails->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_donorsemendetails->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_donorsemendetails->id->CurrentValue) ?>">
<?php echo $ivf_donorsemendetails->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_donorsemendetails_RIDNo" for="x_RIDNo" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->RIDNo->caption() ?><?php echo ($ivf_donorsemendetails->RIDNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->RIDNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_RIDNo">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails->RIDNo->EditValue ?>"<?php echo $ivf_donorsemendetails->RIDNo->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_donorsemendetails_TidNo" for="x_TidNo" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->TidNo->caption() ?><?php echo ($ivf_donorsemendetails->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->TidNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_TidNo">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails->TidNo->EditValue ?>"<?php echo $ivf_donorsemendetails->TidNo->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->Agency->Visible) { // Agency ?>
	<div id="r_Agency" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Agency" for="x_Agency" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->Agency->caption() ?><?php echo ($ivf_donorsemendetails->Agency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->Agency->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Agency">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Agency" name="x_Agency" id="x_Agency" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails->Agency->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails->Agency->EditValue ?>"<?php echo $ivf_donorsemendetails->Agency->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails->Agency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->ReceivedOn->Visible) { // ReceivedOn ?>
	<div id="r_ReceivedOn" class="form-group row">
		<label id="elh_ivf_donorsemendetails_ReceivedOn" for="x_ReceivedOn" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->ReceivedOn->caption() ?><?php echo ($ivf_donorsemendetails->ReceivedOn->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->ReceivedOn->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_ReceivedOn">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_ReceivedOn" name="x_ReceivedOn" id="x_ReceivedOn" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails->ReceivedOn->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails->ReceivedOn->EditValue ?>"<?php echo $ivf_donorsemendetails->ReceivedOn->editAttributes() ?>>
<?php if (!$ivf_donorsemendetails->ReceivedOn->ReadOnly && !$ivf_donorsemendetails->ReceivedOn->Disabled && !isset($ivf_donorsemendetails->ReceivedOn->EditAttrs["readonly"]) && !isset($ivf_donorsemendetails->ReceivedOn->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_donorsemendetailsedit", "x_ReceivedOn", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $ivf_donorsemendetails->ReceivedOn->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->ReceivedBy->Visible) { // ReceivedBy ?>
	<div id="r_ReceivedBy" class="form-group row">
		<label id="elh_ivf_donorsemendetails_ReceivedBy" for="x_ReceivedBy" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->ReceivedBy->caption() ?><?php echo ($ivf_donorsemendetails->ReceivedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->ReceivedBy->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_ReceivedBy">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_ReceivedBy" name="x_ReceivedBy" id="x_ReceivedBy" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails->ReceivedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails->ReceivedBy->EditValue ?>"<?php echo $ivf_donorsemendetails->ReceivedBy->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails->ReceivedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->DonorNo->Visible) { // DonorNo ?>
	<div id="r_DonorNo" class="form-group row">
		<label id="elh_ivf_donorsemendetails_DonorNo" for="x_DonorNo" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->DonorNo->caption() ?><?php echo ($ivf_donorsemendetails->DonorNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->DonorNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_DonorNo">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_DonorNo" name="x_DonorNo" id="x_DonorNo" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails->DonorNo->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails->DonorNo->EditValue ?>"<?php echo $ivf_donorsemendetails->DonorNo->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails->DonorNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->BatchNo->Visible) { // BatchNo ?>
	<div id="r_BatchNo" class="form-group row">
		<label id="elh_ivf_donorsemendetails_BatchNo" for="x_BatchNo" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->BatchNo->caption() ?><?php echo ($ivf_donorsemendetails->BatchNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->BatchNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_BatchNo">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="6" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails->BatchNo->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails->BatchNo->EditValue ?>"<?php echo $ivf_donorsemendetails->BatchNo->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails->BatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->BloodGroup->Visible) { // BloodGroup ?>
	<div id="r_BloodGroup" class="form-group row">
		<label id="elh_ivf_donorsemendetails_BloodGroup" for="x_BloodGroup" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->BloodGroup->caption() ?><?php echo ($ivf_donorsemendetails->BloodGroup->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->BloodGroup->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_BloodGroup">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_BloodGroup" data-value-separator="<?php echo $ivf_donorsemendetails->BloodGroup->displayValueSeparatorAttribute() ?>" id="x_BloodGroup" name="x_BloodGroup"<?php echo $ivf_donorsemendetails->BloodGroup->editAttributes() ?>>
		<?php echo $ivf_donorsemendetails->BloodGroup->selectOptionListHtml("x_BloodGroup") ?>
	</select>
</div>
<?php echo $ivf_donorsemendetails->BloodGroup->Lookup->getParamTag("p_x_BloodGroup") ?>
</span>
<?php echo $ivf_donorsemendetails->BloodGroup->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->Height->Visible) { // Height ?>
	<div id="r_Height" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Height" for="x_Height" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->Height->caption() ?><?php echo ($ivf_donorsemendetails->Height->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->Height->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Height">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Height" name="x_Height" id="x_Height" size="4" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails->Height->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails->Height->EditValue ?>"<?php echo $ivf_donorsemendetails->Height->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails->Height->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->SkinColor->Visible) { // SkinColor ?>
	<div id="r_SkinColor" class="form-group row">
		<label id="elh_ivf_donorsemendetails_SkinColor" for="x_SkinColor" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->SkinColor->caption() ?><?php echo ($ivf_donorsemendetails->SkinColor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->SkinColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_SkinColor">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_SkinColor" data-value-separator="<?php echo $ivf_donorsemendetails->SkinColor->displayValueSeparatorAttribute() ?>" id="x_SkinColor" name="x_SkinColor"<?php echo $ivf_donorsemendetails->SkinColor->editAttributes() ?>>
		<?php echo $ivf_donorsemendetails->SkinColor->selectOptionListHtml("x_SkinColor") ?>
	</select>
</div>
</span>
<?php echo $ivf_donorsemendetails->SkinColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->EyeColor->Visible) { // EyeColor ?>
	<div id="r_EyeColor" class="form-group row">
		<label id="elh_ivf_donorsemendetails_EyeColor" for="x_EyeColor" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->EyeColor->caption() ?><?php echo ($ivf_donorsemendetails->EyeColor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->EyeColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_EyeColor">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_EyeColor" data-value-separator="<?php echo $ivf_donorsemendetails->EyeColor->displayValueSeparatorAttribute() ?>" id="x_EyeColor" name="x_EyeColor"<?php echo $ivf_donorsemendetails->EyeColor->editAttributes() ?>>
		<?php echo $ivf_donorsemendetails->EyeColor->selectOptionListHtml("x_EyeColor") ?>
	</select>
</div>
</span>
<?php echo $ivf_donorsemendetails->EyeColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->HairColor->Visible) { // HairColor ?>
	<div id="r_HairColor" class="form-group row">
		<label id="elh_ivf_donorsemendetails_HairColor" for="x_HairColor" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->HairColor->caption() ?><?php echo ($ivf_donorsemendetails->HairColor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->HairColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_HairColor">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_HairColor" data-value-separator="<?php echo $ivf_donorsemendetails->HairColor->displayValueSeparatorAttribute() ?>" id="x_HairColor" name="x_HairColor"<?php echo $ivf_donorsemendetails->HairColor->editAttributes() ?>>
		<?php echo $ivf_donorsemendetails->HairColor->selectOptionListHtml("x_HairColor") ?>
	</select>
</div>
</span>
<?php echo $ivf_donorsemendetails->HairColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->NoOfVials->Visible) { // NoOfVials ?>
	<div id="r_NoOfVials" class="form-group row">
		<label id="elh_ivf_donorsemendetails_NoOfVials" for="x_NoOfVials" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->NoOfVials->caption() ?><?php echo ($ivf_donorsemendetails->NoOfVials->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->NoOfVials->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_NoOfVials">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_NoOfVials" name="x_NoOfVials" id="x_NoOfVials" size="2" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails->NoOfVials->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails->NoOfVials->EditValue ?>"<?php echo $ivf_donorsemendetails->NoOfVials->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails->NoOfVials->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->Tank->Visible) { // Tank ?>
	<div id="r_Tank" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Tank" for="x_Tank" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->Tank->caption() ?><?php echo ($ivf_donorsemendetails->Tank->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->Tank->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Tank">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Tank" name="x_Tank" id="x_Tank" size="4" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails->Tank->EditValue ?>"<?php echo $ivf_donorsemendetails->Tank->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails->Tank->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->Canister->Visible) { // Canister ?>
	<div id="r_Canister" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Canister" for="x_Canister" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->Canister->caption() ?><?php echo ($ivf_donorsemendetails->Canister->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->Canister->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Canister">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Canister" name="x_Canister" id="x_Canister" size="8" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails->Canister->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails->Canister->EditValue ?>"<?php echo $ivf_donorsemendetails->Canister->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails->Canister->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Remarks" for="x_Remarks" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->Remarks->caption() ?><?php echo ($ivf_donorsemendetails->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->Remarks->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Remarks">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails->Remarks->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails->Remarks->EditValue ?>"<?php echo $ivf_donorsemendetails->Remarks->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->patientid->Visible) { // patientid ?>
	<div id="r_patientid" class="form-group row">
		<label id="elh_ivf_donorsemendetails_patientid" for="x_patientid" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->patientid->caption() ?><?php echo ($ivf_donorsemendetails->patientid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->patientid->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_patientid">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_patientid" name="x_patientid" id="x_patientid" size="30" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails->patientid->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails->patientid->EditValue ?>"<?php echo $ivf_donorsemendetails->patientid->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails->patientid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->coupleid->Visible) { // coupleid ?>
	<div id="r_coupleid" class="form-group row">
		<label id="elh_ivf_donorsemendetails_coupleid" for="x_coupleid" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->coupleid->caption() ?><?php echo ($ivf_donorsemendetails->coupleid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->coupleid->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_coupleid">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_coupleid" name="x_coupleid" id="x_coupleid" size="30" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails->coupleid->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails->coupleid->EditValue ?>"<?php echo $ivf_donorsemendetails->coupleid->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails->coupleid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->Usedstatus->Visible) { // Usedstatus ?>
	<div id="r_Usedstatus" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Usedstatus" for="x_Usedstatus" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->Usedstatus->caption() ?><?php echo ($ivf_donorsemendetails->Usedstatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->Usedstatus->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Usedstatus">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Usedstatus" name="x_Usedstatus" id="x_Usedstatus" size="30" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails->Usedstatus->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails->Usedstatus->EditValue ?>"<?php echo $ivf_donorsemendetails->Usedstatus->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails->Usedstatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_ivf_donorsemendetails_status" for="x_status" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->status->caption() ?><?php echo ($ivf_donorsemendetails->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->status->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_status">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails->status->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails->status->EditValue ?>"<?php echo $ivf_donorsemendetails->status->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails->Lagency->Visible) { // Lagency ?>
	<div id="r_Lagency" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Lagency" for="x_Lagency" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails->Lagency->caption() ?><?php echo ($ivf_donorsemendetails->Lagency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div<?php echo $ivf_donorsemendetails->Lagency->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Lagency">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_Lagency" data-value-separator="<?php echo $ivf_donorsemendetails->Lagency->displayValueSeparatorAttribute() ?>" id="x_Lagency" name="x_Lagency"<?php echo $ivf_donorsemendetails->Lagency->editAttributes() ?>>
		<?php echo $ivf_donorsemendetails->Lagency->selectOptionListHtml("x_Lagency") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_agency") && !$ivf_donorsemendetails->Lagency->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Lagency" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_donorsemendetails->Lagency->caption() ?>" data-title="<?php echo $ivf_donorsemendetails->Lagency->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Lagency',url:'ivf_agencyaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_donorsemendetails->Lagency->Lookup->getParamTag("p_x_Lagency") ?>
</span>
<?php echo $ivf_donorsemendetails->Lagency->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ivf_donorsemendetails_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_donorsemendetails_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_donorsemendetails_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ivf_donorsemendetails_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_donorsemendetails_edit->terminate();
?>