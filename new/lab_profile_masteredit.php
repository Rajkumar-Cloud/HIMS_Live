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
$lab_profile_master_edit = new lab_profile_master_edit();

// Run the page
$lab_profile_master_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_profile_master_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flab_profile_masteredit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	flab_profile_masteredit = currentForm = new ew.Form("flab_profile_masteredit", "edit");

	// Validate form
	flab_profile_masteredit.validate = function() {
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
			<?php if ($lab_profile_master_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->id->caption(), $lab_profile_master_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_master_edit->ProfileCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ProfileCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->ProfileCode->caption(), $lab_profile_master_edit->ProfileCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_master_edit->ProfileName->Required) { ?>
				elm = this.getElements("x" + infix + "_ProfileName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->ProfileName->caption(), $lab_profile_master_edit->ProfileName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_master_edit->ProfileAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_ProfileAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->ProfileAmount->caption(), $lab_profile_master_edit->ProfileAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProfileAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_profile_master_edit->ProfileAmount->errorMessage()) ?>");
			<?php if ($lab_profile_master_edit->ProfileSpecialAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_ProfileSpecialAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->ProfileSpecialAmount->caption(), $lab_profile_master_edit->ProfileSpecialAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProfileSpecialAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_profile_master_edit->ProfileSpecialAmount->errorMessage()) ?>");
			<?php if ($lab_profile_master_edit->ProfileMasterInactive->Required) { ?>
				elm = this.getElements("x" + infix + "_ProfileMasterInactive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->ProfileMasterInactive->caption(), $lab_profile_master_edit->ProfileMasterInactive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_master_edit->ReagentAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_ReagentAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->ReagentAmt->caption(), $lab_profile_master_edit->ReagentAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReagentAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_profile_master_edit->ReagentAmt->errorMessage()) ?>");
			<?php if ($lab_profile_master_edit->LabAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_LabAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->LabAmt->caption(), $lab_profile_master_edit->LabAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LabAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_profile_master_edit->LabAmt->errorMessage()) ?>");
			<?php if ($lab_profile_master_edit->RefAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_RefAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->RefAmt->caption(), $lab_profile_master_edit->RefAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RefAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_profile_master_edit->RefAmt->errorMessage()) ?>");
			<?php if ($lab_profile_master_edit->MainDeptCD->Required) { ?>
				elm = this.getElements("x" + infix + "_MainDeptCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->MainDeptCD->caption(), $lab_profile_master_edit->MainDeptCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_master_edit->Individual->Required) { ?>
				elm = this.getElements("x" + infix + "_Individual");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->Individual->caption(), $lab_profile_master_edit->Individual->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_master_edit->ShortName->Required) { ?>
				elm = this.getElements("x" + infix + "_ShortName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->ShortName->caption(), $lab_profile_master_edit->ShortName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_master_edit->Note->Required) { ?>
				elm = this.getElements("x" + infix + "_Note");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->Note->caption(), $lab_profile_master_edit->Note->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_master_edit->PrevAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_PrevAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->PrevAmt->caption(), $lab_profile_master_edit->PrevAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PrevAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_profile_master_edit->PrevAmt->errorMessage()) ?>");
			<?php if ($lab_profile_master_edit->BillName->Required) { ?>
				elm = this.getElements("x" + infix + "_BillName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->BillName->caption(), $lab_profile_master_edit->BillName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_master_edit->ActualAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_ActualAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->ActualAmt->caption(), $lab_profile_master_edit->ActualAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ActualAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_profile_master_edit->ActualAmt->errorMessage()) ?>");
			<?php if ($lab_profile_master_edit->NoHeading->Required) { ?>
				elm = this.getElements("x" + infix + "_NoHeading");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->NoHeading->caption(), $lab_profile_master_edit->NoHeading->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_master_edit->EditDate->Required) { ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->EditDate->caption(), $lab_profile_master_edit->EditDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_profile_master_edit->EditDate->errorMessage()) ?>");
			<?php if ($lab_profile_master_edit->EditUser->Required) { ?>
				elm = this.getElements("x" + infix + "_EditUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->EditUser->caption(), $lab_profile_master_edit->EditUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_master_edit->HISCD->Required) { ?>
				elm = this.getElements("x" + infix + "_HISCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->HISCD->caption(), $lab_profile_master_edit->HISCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_master_edit->PriceList->Required) { ?>
				elm = this.getElements("x" + infix + "_PriceList");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->PriceList->caption(), $lab_profile_master_edit->PriceList->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_master_edit->IPAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_IPAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->IPAmt->caption(), $lab_profile_master_edit->IPAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IPAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_profile_master_edit->IPAmt->errorMessage()) ?>");
			<?php if ($lab_profile_master_edit->IInsAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_IInsAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->IInsAmt->caption(), $lab_profile_master_edit->IInsAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IInsAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_profile_master_edit->IInsAmt->errorMessage()) ?>");
			<?php if ($lab_profile_master_edit->ManualCD->Required) { ?>
				elm = this.getElements("x" + infix + "_ManualCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->ManualCD->caption(), $lab_profile_master_edit->ManualCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_master_edit->Free->Required) { ?>
				elm = this.getElements("x" + infix + "_Free");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->Free->caption(), $lab_profile_master_edit->Free->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_master_edit->IIpAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_IIpAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->IIpAmt->caption(), $lab_profile_master_edit->IIpAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IIpAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_profile_master_edit->IIpAmt->errorMessage()) ?>");
			<?php if ($lab_profile_master_edit->InsAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_InsAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->InsAmt->caption(), $lab_profile_master_edit->InsAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_InsAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_profile_master_edit->InsAmt->errorMessage()) ?>");
			<?php if ($lab_profile_master_edit->OutSource->Required) { ?>
				elm = this.getElements("x" + infix + "_OutSource");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_master_edit->OutSource->caption(), $lab_profile_master_edit->OutSource->RequiredErrorMessage)) ?>");
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
	flab_profile_masteredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flab_profile_masteredit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("flab_profile_masteredit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lab_profile_master_edit->showPageHeader(); ?>
<?php
$lab_profile_master_edit->showMessage();
?>
<form name="flab_profile_masteredit" id="flab_profile_masteredit" class="<?php echo $lab_profile_master_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_profile_master">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$lab_profile_master_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($lab_profile_master_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_lab_profile_master_id" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->id->caption() ?><?php echo $lab_profile_master_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->id->cellAttributes() ?>>
<span id="el_lab_profile_master_id">
<span<?php echo $lab_profile_master_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($lab_profile_master_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_master" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($lab_profile_master_edit->id->CurrentValue) ?>">
<?php echo $lab_profile_master_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->ProfileCode->Visible) { // ProfileCode ?>
	<div id="r_ProfileCode" class="form-group row">
		<label id="elh_lab_profile_master_ProfileCode" for="x_ProfileCode" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->ProfileCode->caption() ?><?php echo $lab_profile_master_edit->ProfileCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->ProfileCode->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileCode">
<input type="text" data-table="lab_profile_master" data-field="x_ProfileCode" name="x_ProfileCode" id="x_ProfileCode" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->ProfileCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->ProfileCode->EditValue ?>"<?php echo $lab_profile_master_edit->ProfileCode->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->ProfileCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->ProfileName->Visible) { // ProfileName ?>
	<div id="r_ProfileName" class="form-group row">
		<label id="elh_lab_profile_master_ProfileName" for="x_ProfileName" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->ProfileName->caption() ?><?php echo $lab_profile_master_edit->ProfileName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->ProfileName->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileName">
<input type="text" data-table="lab_profile_master" data-field="x_ProfileName" name="x_ProfileName" id="x_ProfileName" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->ProfileName->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->ProfileName->EditValue ?>"<?php echo $lab_profile_master_edit->ProfileName->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->ProfileName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->ProfileAmount->Visible) { // ProfileAmount ?>
	<div id="r_ProfileAmount" class="form-group row">
		<label id="elh_lab_profile_master_ProfileAmount" for="x_ProfileAmount" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->ProfileAmount->caption() ?><?php echo $lab_profile_master_edit->ProfileAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->ProfileAmount->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileAmount">
<input type="text" data-table="lab_profile_master" data-field="x_ProfileAmount" name="x_ProfileAmount" id="x_ProfileAmount" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->ProfileAmount->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->ProfileAmount->EditValue ?>"<?php echo $lab_profile_master_edit->ProfileAmount->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->ProfileAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->ProfileSpecialAmount->Visible) { // ProfileSpecialAmount ?>
	<div id="r_ProfileSpecialAmount" class="form-group row">
		<label id="elh_lab_profile_master_ProfileSpecialAmount" for="x_ProfileSpecialAmount" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->ProfileSpecialAmount->caption() ?><?php echo $lab_profile_master_edit->ProfileSpecialAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->ProfileSpecialAmount->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileSpecialAmount">
<input type="text" data-table="lab_profile_master" data-field="x_ProfileSpecialAmount" name="x_ProfileSpecialAmount" id="x_ProfileSpecialAmount" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->ProfileSpecialAmount->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->ProfileSpecialAmount->EditValue ?>"<?php echo $lab_profile_master_edit->ProfileSpecialAmount->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->ProfileSpecialAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->ProfileMasterInactive->Visible) { // ProfileMasterInactive ?>
	<div id="r_ProfileMasterInactive" class="form-group row">
		<label id="elh_lab_profile_master_ProfileMasterInactive" for="x_ProfileMasterInactive" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->ProfileMasterInactive->caption() ?><?php echo $lab_profile_master_edit->ProfileMasterInactive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->ProfileMasterInactive->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileMasterInactive">
<input type="text" data-table="lab_profile_master" data-field="x_ProfileMasterInactive" name="x_ProfileMasterInactive" id="x_ProfileMasterInactive" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->ProfileMasterInactive->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->ProfileMasterInactive->EditValue ?>"<?php echo $lab_profile_master_edit->ProfileMasterInactive->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->ProfileMasterInactive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->ReagentAmt->Visible) { // ReagentAmt ?>
	<div id="r_ReagentAmt" class="form-group row">
		<label id="elh_lab_profile_master_ReagentAmt" for="x_ReagentAmt" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->ReagentAmt->caption() ?><?php echo $lab_profile_master_edit->ReagentAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->ReagentAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_ReagentAmt">
<input type="text" data-table="lab_profile_master" data-field="x_ReagentAmt" name="x_ReagentAmt" id="x_ReagentAmt" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->ReagentAmt->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->ReagentAmt->EditValue ?>"<?php echo $lab_profile_master_edit->ReagentAmt->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->ReagentAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->LabAmt->Visible) { // LabAmt ?>
	<div id="r_LabAmt" class="form-group row">
		<label id="elh_lab_profile_master_LabAmt" for="x_LabAmt" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->LabAmt->caption() ?><?php echo $lab_profile_master_edit->LabAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->LabAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_LabAmt">
<input type="text" data-table="lab_profile_master" data-field="x_LabAmt" name="x_LabAmt" id="x_LabAmt" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->LabAmt->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->LabAmt->EditValue ?>"<?php echo $lab_profile_master_edit->LabAmt->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->LabAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->RefAmt->Visible) { // RefAmt ?>
	<div id="r_RefAmt" class="form-group row">
		<label id="elh_lab_profile_master_RefAmt" for="x_RefAmt" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->RefAmt->caption() ?><?php echo $lab_profile_master_edit->RefAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->RefAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_RefAmt">
<input type="text" data-table="lab_profile_master" data-field="x_RefAmt" name="x_RefAmt" id="x_RefAmt" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->RefAmt->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->RefAmt->EditValue ?>"<?php echo $lab_profile_master_edit->RefAmt->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->RefAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->MainDeptCD->Visible) { // MainDeptCD ?>
	<div id="r_MainDeptCD" class="form-group row">
		<label id="elh_lab_profile_master_MainDeptCD" for="x_MainDeptCD" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->MainDeptCD->caption() ?><?php echo $lab_profile_master_edit->MainDeptCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->MainDeptCD->cellAttributes() ?>>
<span id="el_lab_profile_master_MainDeptCD">
<input type="text" data-table="lab_profile_master" data-field="x_MainDeptCD" name="x_MainDeptCD" id="x_MainDeptCD" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->MainDeptCD->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->MainDeptCD->EditValue ?>"<?php echo $lab_profile_master_edit->MainDeptCD->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->MainDeptCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->Individual->Visible) { // Individual ?>
	<div id="r_Individual" class="form-group row">
		<label id="elh_lab_profile_master_Individual" for="x_Individual" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->Individual->caption() ?><?php echo $lab_profile_master_edit->Individual->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->Individual->cellAttributes() ?>>
<span id="el_lab_profile_master_Individual">
<input type="text" data-table="lab_profile_master" data-field="x_Individual" name="x_Individual" id="x_Individual" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->Individual->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->Individual->EditValue ?>"<?php echo $lab_profile_master_edit->Individual->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->Individual->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->ShortName->Visible) { // ShortName ?>
	<div id="r_ShortName" class="form-group row">
		<label id="elh_lab_profile_master_ShortName" for="x_ShortName" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->ShortName->caption() ?><?php echo $lab_profile_master_edit->ShortName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->ShortName->cellAttributes() ?>>
<span id="el_lab_profile_master_ShortName">
<input type="text" data-table="lab_profile_master" data-field="x_ShortName" name="x_ShortName" id="x_ShortName" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->ShortName->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->ShortName->EditValue ?>"<?php echo $lab_profile_master_edit->ShortName->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->ShortName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->Note->Visible) { // Note ?>
	<div id="r_Note" class="form-group row">
		<label id="elh_lab_profile_master_Note" for="x_Note" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->Note->caption() ?><?php echo $lab_profile_master_edit->Note->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->Note->cellAttributes() ?>>
<span id="el_lab_profile_master_Note">
<textarea data-table="lab_profile_master" data-field="x_Note" name="x_Note" id="x_Note" cols="35" rows="4" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->Note->getPlaceHolder()) ?>"<?php echo $lab_profile_master_edit->Note->editAttributes() ?>><?php echo $lab_profile_master_edit->Note->EditValue ?></textarea>
</span>
<?php echo $lab_profile_master_edit->Note->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->PrevAmt->Visible) { // PrevAmt ?>
	<div id="r_PrevAmt" class="form-group row">
		<label id="elh_lab_profile_master_PrevAmt" for="x_PrevAmt" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->PrevAmt->caption() ?><?php echo $lab_profile_master_edit->PrevAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->PrevAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_PrevAmt">
<input type="text" data-table="lab_profile_master" data-field="x_PrevAmt" name="x_PrevAmt" id="x_PrevAmt" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->PrevAmt->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->PrevAmt->EditValue ?>"<?php echo $lab_profile_master_edit->PrevAmt->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->PrevAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->BillName->Visible) { // BillName ?>
	<div id="r_BillName" class="form-group row">
		<label id="elh_lab_profile_master_BillName" for="x_BillName" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->BillName->caption() ?><?php echo $lab_profile_master_edit->BillName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->BillName->cellAttributes() ?>>
<span id="el_lab_profile_master_BillName">
<input type="text" data-table="lab_profile_master" data-field="x_BillName" name="x_BillName" id="x_BillName" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->BillName->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->BillName->EditValue ?>"<?php echo $lab_profile_master_edit->BillName->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->BillName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->ActualAmt->Visible) { // ActualAmt ?>
	<div id="r_ActualAmt" class="form-group row">
		<label id="elh_lab_profile_master_ActualAmt" for="x_ActualAmt" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->ActualAmt->caption() ?><?php echo $lab_profile_master_edit->ActualAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->ActualAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_ActualAmt">
<input type="text" data-table="lab_profile_master" data-field="x_ActualAmt" name="x_ActualAmt" id="x_ActualAmt" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->ActualAmt->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->ActualAmt->EditValue ?>"<?php echo $lab_profile_master_edit->ActualAmt->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->ActualAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->NoHeading->Visible) { // NoHeading ?>
	<div id="r_NoHeading" class="form-group row">
		<label id="elh_lab_profile_master_NoHeading" for="x_NoHeading" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->NoHeading->caption() ?><?php echo $lab_profile_master_edit->NoHeading->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->NoHeading->cellAttributes() ?>>
<span id="el_lab_profile_master_NoHeading">
<input type="text" data-table="lab_profile_master" data-field="x_NoHeading" name="x_NoHeading" id="x_NoHeading" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->NoHeading->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->NoHeading->EditValue ?>"<?php echo $lab_profile_master_edit->NoHeading->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->NoHeading->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->EditDate->Visible) { // EditDate ?>
	<div id="r_EditDate" class="form-group row">
		<label id="elh_lab_profile_master_EditDate" for="x_EditDate" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->EditDate->caption() ?><?php echo $lab_profile_master_edit->EditDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->EditDate->cellAttributes() ?>>
<span id="el_lab_profile_master_EditDate">
<input type="text" data-table="lab_profile_master" data-field="x_EditDate" name="x_EditDate" id="x_EditDate" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->EditDate->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->EditDate->EditValue ?>"<?php echo $lab_profile_master_edit->EditDate->editAttributes() ?>>
<?php if (!$lab_profile_master_edit->EditDate->ReadOnly && !$lab_profile_master_edit->EditDate->Disabled && !isset($lab_profile_master_edit->EditDate->EditAttrs["readonly"]) && !isset($lab_profile_master_edit->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_profile_masteredit", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_profile_masteredit", "x_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $lab_profile_master_edit->EditDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->EditUser->Visible) { // EditUser ?>
	<div id="r_EditUser" class="form-group row">
		<label id="elh_lab_profile_master_EditUser" for="x_EditUser" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->EditUser->caption() ?><?php echo $lab_profile_master_edit->EditUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->EditUser->cellAttributes() ?>>
<span id="el_lab_profile_master_EditUser">
<input type="text" data-table="lab_profile_master" data-field="x_EditUser" name="x_EditUser" id="x_EditUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->EditUser->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->EditUser->EditValue ?>"<?php echo $lab_profile_master_edit->EditUser->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->EditUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->HISCD->Visible) { // HISCD ?>
	<div id="r_HISCD" class="form-group row">
		<label id="elh_lab_profile_master_HISCD" for="x_HISCD" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->HISCD->caption() ?><?php echo $lab_profile_master_edit->HISCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->HISCD->cellAttributes() ?>>
<span id="el_lab_profile_master_HISCD">
<input type="text" data-table="lab_profile_master" data-field="x_HISCD" name="x_HISCD" id="x_HISCD" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->HISCD->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->HISCD->EditValue ?>"<?php echo $lab_profile_master_edit->HISCD->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->HISCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->PriceList->Visible) { // PriceList ?>
	<div id="r_PriceList" class="form-group row">
		<label id="elh_lab_profile_master_PriceList" for="x_PriceList" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->PriceList->caption() ?><?php echo $lab_profile_master_edit->PriceList->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->PriceList->cellAttributes() ?>>
<span id="el_lab_profile_master_PriceList">
<input type="text" data-table="lab_profile_master" data-field="x_PriceList" name="x_PriceList" id="x_PriceList" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->PriceList->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->PriceList->EditValue ?>"<?php echo $lab_profile_master_edit->PriceList->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->PriceList->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->IPAmt->Visible) { // IPAmt ?>
	<div id="r_IPAmt" class="form-group row">
		<label id="elh_lab_profile_master_IPAmt" for="x_IPAmt" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->IPAmt->caption() ?><?php echo $lab_profile_master_edit->IPAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->IPAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_IPAmt">
<input type="text" data-table="lab_profile_master" data-field="x_IPAmt" name="x_IPAmt" id="x_IPAmt" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->IPAmt->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->IPAmt->EditValue ?>"<?php echo $lab_profile_master_edit->IPAmt->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->IPAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->IInsAmt->Visible) { // IInsAmt ?>
	<div id="r_IInsAmt" class="form-group row">
		<label id="elh_lab_profile_master_IInsAmt" for="x_IInsAmt" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->IInsAmt->caption() ?><?php echo $lab_profile_master_edit->IInsAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->IInsAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_IInsAmt">
<input type="text" data-table="lab_profile_master" data-field="x_IInsAmt" name="x_IInsAmt" id="x_IInsAmt" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->IInsAmt->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->IInsAmt->EditValue ?>"<?php echo $lab_profile_master_edit->IInsAmt->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->IInsAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->ManualCD->Visible) { // ManualCD ?>
	<div id="r_ManualCD" class="form-group row">
		<label id="elh_lab_profile_master_ManualCD" for="x_ManualCD" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->ManualCD->caption() ?><?php echo $lab_profile_master_edit->ManualCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->ManualCD->cellAttributes() ?>>
<span id="el_lab_profile_master_ManualCD">
<input type="text" data-table="lab_profile_master" data-field="x_ManualCD" name="x_ManualCD" id="x_ManualCD" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->ManualCD->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->ManualCD->EditValue ?>"<?php echo $lab_profile_master_edit->ManualCD->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->ManualCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->Free->Visible) { // Free ?>
	<div id="r_Free" class="form-group row">
		<label id="elh_lab_profile_master_Free" for="x_Free" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->Free->caption() ?><?php echo $lab_profile_master_edit->Free->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->Free->cellAttributes() ?>>
<span id="el_lab_profile_master_Free">
<input type="text" data-table="lab_profile_master" data-field="x_Free" name="x_Free" id="x_Free" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->Free->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->Free->EditValue ?>"<?php echo $lab_profile_master_edit->Free->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->Free->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->IIpAmt->Visible) { // IIpAmt ?>
	<div id="r_IIpAmt" class="form-group row">
		<label id="elh_lab_profile_master_IIpAmt" for="x_IIpAmt" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->IIpAmt->caption() ?><?php echo $lab_profile_master_edit->IIpAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->IIpAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_IIpAmt">
<input type="text" data-table="lab_profile_master" data-field="x_IIpAmt" name="x_IIpAmt" id="x_IIpAmt" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->IIpAmt->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->IIpAmt->EditValue ?>"<?php echo $lab_profile_master_edit->IIpAmt->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->IIpAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->InsAmt->Visible) { // InsAmt ?>
	<div id="r_InsAmt" class="form-group row">
		<label id="elh_lab_profile_master_InsAmt" for="x_InsAmt" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->InsAmt->caption() ?><?php echo $lab_profile_master_edit->InsAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->InsAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_InsAmt">
<input type="text" data-table="lab_profile_master" data-field="x_InsAmt" name="x_InsAmt" id="x_InsAmt" size="30" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->InsAmt->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->InsAmt->EditValue ?>"<?php echo $lab_profile_master_edit->InsAmt->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->InsAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_master_edit->OutSource->Visible) { // OutSource ?>
	<div id="r_OutSource" class="form-group row">
		<label id="elh_lab_profile_master_OutSource" for="x_OutSource" class="<?php echo $lab_profile_master_edit->LeftColumnClass ?>"><?php echo $lab_profile_master_edit->OutSource->caption() ?><?php echo $lab_profile_master_edit->OutSource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_master_edit->RightColumnClass ?>"><div <?php echo $lab_profile_master_edit->OutSource->cellAttributes() ?>>
<span id="el_lab_profile_master_OutSource">
<input type="text" data-table="lab_profile_master" data-field="x_OutSource" name="x_OutSource" id="x_OutSource" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_profile_master_edit->OutSource->getPlaceHolder()) ?>" value="<?php echo $lab_profile_master_edit->OutSource->EditValue ?>"<?php echo $lab_profile_master_edit->OutSource->editAttributes() ?>>
</span>
<?php echo $lab_profile_master_edit->OutSource->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_profile_master_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_profile_master_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_profile_master_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_profile_master_edit->showPageFooter();
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
$lab_profile_master_edit->terminate();
?>