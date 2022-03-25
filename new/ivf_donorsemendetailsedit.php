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
<?php include_once "header.php"; ?>
<script>
var fivf_donorsemendetailsedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fivf_donorsemendetailsedit = currentForm = new ew.Form("fivf_donorsemendetailsedit", "edit");

	// Validate form
	fivf_donorsemendetailsedit.validate = function() {
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
			<?php if ($ivf_donorsemendetails_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->id->caption(), $ivf_donorsemendetails_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_edit->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->RIDNo->caption(), $ivf_donorsemendetails_edit->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails_edit->RIDNo->errorMessage()) ?>");
			<?php if ($ivf_donorsemendetails_edit->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->TidNo->caption(), $ivf_donorsemendetails_edit->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails_edit->TidNo->errorMessage()) ?>");
			<?php if ($ivf_donorsemendetails_edit->Agency->Required) { ?>
				elm = this.getElements("x" + infix + "_Agency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->Agency->caption(), $ivf_donorsemendetails_edit->Agency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_edit->ReceivedOn->Required) { ?>
				elm = this.getElements("x" + infix + "_ReceivedOn");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->ReceivedOn->caption(), $ivf_donorsemendetails_edit->ReceivedOn->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReceivedOn");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails_edit->ReceivedOn->errorMessage()) ?>");
			<?php if ($ivf_donorsemendetails_edit->ReceivedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ReceivedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->ReceivedBy->caption(), $ivf_donorsemendetails_edit->ReceivedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_edit->DonorNo->Required) { ?>
				elm = this.getElements("x" + infix + "_DonorNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->DonorNo->caption(), $ivf_donorsemendetails_edit->DonorNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_edit->BatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_BatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->BatchNo->caption(), $ivf_donorsemendetails_edit->BatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_edit->BloodGroup->Required) { ?>
				elm = this.getElements("x" + infix + "_BloodGroup");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->BloodGroup->caption(), $ivf_donorsemendetails_edit->BloodGroup->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_edit->Height->Required) { ?>
				elm = this.getElements("x" + infix + "_Height");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->Height->caption(), $ivf_donorsemendetails_edit->Height->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_edit->SkinColor->Required) { ?>
				elm = this.getElements("x" + infix + "_SkinColor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->SkinColor->caption(), $ivf_donorsemendetails_edit->SkinColor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_edit->EyeColor->Required) { ?>
				elm = this.getElements("x" + infix + "_EyeColor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->EyeColor->caption(), $ivf_donorsemendetails_edit->EyeColor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_edit->HairColor->Required) { ?>
				elm = this.getElements("x" + infix + "_HairColor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->HairColor->caption(), $ivf_donorsemendetails_edit->HairColor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_edit->NoOfVials->Required) { ?>
				elm = this.getElements("x" + infix + "_NoOfVials");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->NoOfVials->caption(), $ivf_donorsemendetails_edit->NoOfVials->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_edit->Tank->Required) { ?>
				elm = this.getElements("x" + infix + "_Tank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->Tank->caption(), $ivf_donorsemendetails_edit->Tank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_edit->Canister->Required) { ?>
				elm = this.getElements("x" + infix + "_Canister");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->Canister->caption(), $ivf_donorsemendetails_edit->Canister->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_edit->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->Remarks->caption(), $ivf_donorsemendetails_edit->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_edit->patientid->Required) { ?>
				elm = this.getElements("x" + infix + "_patientid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->patientid->caption(), $ivf_donorsemendetails_edit->patientid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_patientid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails_edit->patientid->errorMessage()) ?>");
			<?php if ($ivf_donorsemendetails_edit->coupleid->Required) { ?>
				elm = this.getElements("x" + infix + "_coupleid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->coupleid->caption(), $ivf_donorsemendetails_edit->coupleid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_coupleid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails_edit->coupleid->errorMessage()) ?>");
			<?php if ($ivf_donorsemendetails_edit->Usedstatus->Required) { ?>
				elm = this.getElements("x" + infix + "_Usedstatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->Usedstatus->caption(), $ivf_donorsemendetails_edit->Usedstatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Usedstatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails_edit->Usedstatus->errorMessage()) ?>");
			<?php if ($ivf_donorsemendetails_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->status->caption(), $ivf_donorsemendetails_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails_edit->status->errorMessage()) ?>");
			<?php if ($ivf_donorsemendetails_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->modifiedby->caption(), $ivf_donorsemendetails_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->modifieddatetime->caption(), $ivf_donorsemendetails_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_edit->Lagency->Required) { ?>
				elm = this.getElements("x" + infix + "_Lagency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_edit->Lagency->caption(), $ivf_donorsemendetails_edit->Lagency->RequiredErrorMessage)) ?>");
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
	fivf_donorsemendetailsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_donorsemendetailsedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_donorsemendetailsedit.lists["x_BloodGroup"] = <?php echo $ivf_donorsemendetails_edit->BloodGroup->Lookup->toClientList($ivf_donorsemendetails_edit) ?>;
	fivf_donorsemendetailsedit.lists["x_BloodGroup"].options = <?php echo JsonEncode($ivf_donorsemendetails_edit->BloodGroup->lookupOptions()) ?>;
	fivf_donorsemendetailsedit.lists["x_SkinColor"] = <?php echo $ivf_donorsemendetails_edit->SkinColor->Lookup->toClientList($ivf_donorsemendetails_edit) ?>;
	fivf_donorsemendetailsedit.lists["x_SkinColor"].options = <?php echo JsonEncode($ivf_donorsemendetails_edit->SkinColor->options(FALSE, TRUE)) ?>;
	fivf_donorsemendetailsedit.lists["x_EyeColor"] = <?php echo $ivf_donorsemendetails_edit->EyeColor->Lookup->toClientList($ivf_donorsemendetails_edit) ?>;
	fivf_donorsemendetailsedit.lists["x_EyeColor"].options = <?php echo JsonEncode($ivf_donorsemendetails_edit->EyeColor->options(FALSE, TRUE)) ?>;
	fivf_donorsemendetailsedit.lists["x_HairColor"] = <?php echo $ivf_donorsemendetails_edit->HairColor->Lookup->toClientList($ivf_donorsemendetails_edit) ?>;
	fivf_donorsemendetailsedit.lists["x_HairColor"].options = <?php echo JsonEncode($ivf_donorsemendetails_edit->HairColor->options(FALSE, TRUE)) ?>;
	fivf_donorsemendetailsedit.lists["x_Lagency"] = <?php echo $ivf_donorsemendetails_edit->Lagency->Lookup->toClientList($ivf_donorsemendetails_edit) ?>;
	fivf_donorsemendetailsedit.lists["x_Lagency"].options = <?php echo JsonEncode($ivf_donorsemendetails_edit->Lagency->lookupOptions()) ?>;
	loadjs.done("fivf_donorsemendetailsedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_donorsemendetails_edit->showPageHeader(); ?>
<?php
$ivf_donorsemendetails_edit->showMessage();
?>
<form name="fivf_donorsemendetailsedit" id="fivf_donorsemendetailsedit" class="<?php echo $ivf_donorsemendetails_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_donorsemendetails">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_donorsemendetails_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($ivf_donorsemendetails_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_donorsemendetails_id" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->id->caption() ?><?php echo $ivf_donorsemendetails_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->id->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_id">
<span<?php echo $ivf_donorsemendetails_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_donorsemendetails_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_donorsemendetails_edit->id->CurrentValue) ?>">
<?php echo $ivf_donorsemendetails_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_donorsemendetails_RIDNo" for="x_RIDNo" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->RIDNo->caption() ?><?php echo $ivf_donorsemendetails_edit->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->RIDNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_RIDNo">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_edit->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_edit->RIDNo->EditValue ?>"<?php echo $ivf_donorsemendetails_edit->RIDNo->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_edit->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_donorsemendetails_TidNo" for="x_TidNo" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->TidNo->caption() ?><?php echo $ivf_donorsemendetails_edit->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->TidNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_TidNo">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_edit->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_edit->TidNo->EditValue ?>"<?php echo $ivf_donorsemendetails_edit->TidNo->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_edit->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->Agency->Visible) { // Agency ?>
	<div id="r_Agency" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Agency" for="x_Agency" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->Agency->caption() ?><?php echo $ivf_donorsemendetails_edit->Agency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->Agency->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Agency">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Agency" name="x_Agency" id="x_Agency" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_edit->Agency->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_edit->Agency->EditValue ?>"<?php echo $ivf_donorsemendetails_edit->Agency->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_edit->Agency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->ReceivedOn->Visible) { // ReceivedOn ?>
	<div id="r_ReceivedOn" class="form-group row">
		<label id="elh_ivf_donorsemendetails_ReceivedOn" for="x_ReceivedOn" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->ReceivedOn->caption() ?><?php echo $ivf_donorsemendetails_edit->ReceivedOn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->ReceivedOn->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_ReceivedOn">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_ReceivedOn" name="x_ReceivedOn" id="x_ReceivedOn" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_edit->ReceivedOn->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_edit->ReceivedOn->EditValue ?>"<?php echo $ivf_donorsemendetails_edit->ReceivedOn->editAttributes() ?>>
<?php if (!$ivf_donorsemendetails_edit->ReceivedOn->ReadOnly && !$ivf_donorsemendetails_edit->ReceivedOn->Disabled && !isset($ivf_donorsemendetails_edit->ReceivedOn->EditAttrs["readonly"]) && !isset($ivf_donorsemendetails_edit->ReceivedOn->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_donorsemendetailsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_donorsemendetailsedit", "x_ReceivedOn", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $ivf_donorsemendetails_edit->ReceivedOn->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->ReceivedBy->Visible) { // ReceivedBy ?>
	<div id="r_ReceivedBy" class="form-group row">
		<label id="elh_ivf_donorsemendetails_ReceivedBy" for="x_ReceivedBy" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->ReceivedBy->caption() ?><?php echo $ivf_donorsemendetails_edit->ReceivedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->ReceivedBy->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_ReceivedBy">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_ReceivedBy" name="x_ReceivedBy" id="x_ReceivedBy" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_edit->ReceivedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_edit->ReceivedBy->EditValue ?>"<?php echo $ivf_donorsemendetails_edit->ReceivedBy->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_edit->ReceivedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->DonorNo->Visible) { // DonorNo ?>
	<div id="r_DonorNo" class="form-group row">
		<label id="elh_ivf_donorsemendetails_DonorNo" for="x_DonorNo" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->DonorNo->caption() ?><?php echo $ivf_donorsemendetails_edit->DonorNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->DonorNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_DonorNo">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_DonorNo" name="x_DonorNo" id="x_DonorNo" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_edit->DonorNo->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_edit->DonorNo->EditValue ?>"<?php echo $ivf_donorsemendetails_edit->DonorNo->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_edit->DonorNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->BatchNo->Visible) { // BatchNo ?>
	<div id="r_BatchNo" class="form-group row">
		<label id="elh_ivf_donorsemendetails_BatchNo" for="x_BatchNo" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->BatchNo->caption() ?><?php echo $ivf_donorsemendetails_edit->BatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->BatchNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_BatchNo">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="6" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_edit->BatchNo->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_edit->BatchNo->EditValue ?>"<?php echo $ivf_donorsemendetails_edit->BatchNo->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_edit->BatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->BloodGroup->Visible) { // BloodGroup ?>
	<div id="r_BloodGroup" class="form-group row">
		<label id="elh_ivf_donorsemendetails_BloodGroup" for="x_BloodGroup" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->BloodGroup->caption() ?><?php echo $ivf_donorsemendetails_edit->BloodGroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->BloodGroup->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_BloodGroup">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_BloodGroup" data-value-separator="<?php echo $ivf_donorsemendetails_edit->BloodGroup->displayValueSeparatorAttribute() ?>" id="x_BloodGroup" name="x_BloodGroup"<?php echo $ivf_donorsemendetails_edit->BloodGroup->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_edit->BloodGroup->selectOptionListHtml("x_BloodGroup") ?>
		</select>
</div>
<?php echo $ivf_donorsemendetails_edit->BloodGroup->Lookup->getParamTag($ivf_donorsemendetails_edit, "p_x_BloodGroup") ?>
</span>
<?php echo $ivf_donorsemendetails_edit->BloodGroup->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->Height->Visible) { // Height ?>
	<div id="r_Height" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Height" for="x_Height" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->Height->caption() ?><?php echo $ivf_donorsemendetails_edit->Height->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->Height->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Height">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Height" name="x_Height" id="x_Height" size="4" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_edit->Height->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_edit->Height->EditValue ?>"<?php echo $ivf_donorsemendetails_edit->Height->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_edit->Height->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->SkinColor->Visible) { // SkinColor ?>
	<div id="r_SkinColor" class="form-group row">
		<label id="elh_ivf_donorsemendetails_SkinColor" for="x_SkinColor" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->SkinColor->caption() ?><?php echo $ivf_donorsemendetails_edit->SkinColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->SkinColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_SkinColor">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_SkinColor" data-value-separator="<?php echo $ivf_donorsemendetails_edit->SkinColor->displayValueSeparatorAttribute() ?>" id="x_SkinColor" name="x_SkinColor"<?php echo $ivf_donorsemendetails_edit->SkinColor->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_edit->SkinColor->selectOptionListHtml("x_SkinColor") ?>
		</select>
</div>
</span>
<?php echo $ivf_donorsemendetails_edit->SkinColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->EyeColor->Visible) { // EyeColor ?>
	<div id="r_EyeColor" class="form-group row">
		<label id="elh_ivf_donorsemendetails_EyeColor" for="x_EyeColor" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->EyeColor->caption() ?><?php echo $ivf_donorsemendetails_edit->EyeColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->EyeColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_EyeColor">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_EyeColor" data-value-separator="<?php echo $ivf_donorsemendetails_edit->EyeColor->displayValueSeparatorAttribute() ?>" id="x_EyeColor" name="x_EyeColor"<?php echo $ivf_donorsemendetails_edit->EyeColor->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_edit->EyeColor->selectOptionListHtml("x_EyeColor") ?>
		</select>
</div>
</span>
<?php echo $ivf_donorsemendetails_edit->EyeColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->HairColor->Visible) { // HairColor ?>
	<div id="r_HairColor" class="form-group row">
		<label id="elh_ivf_donorsemendetails_HairColor" for="x_HairColor" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->HairColor->caption() ?><?php echo $ivf_donorsemendetails_edit->HairColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->HairColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_HairColor">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_HairColor" data-value-separator="<?php echo $ivf_donorsemendetails_edit->HairColor->displayValueSeparatorAttribute() ?>" id="x_HairColor" name="x_HairColor"<?php echo $ivf_donorsemendetails_edit->HairColor->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_edit->HairColor->selectOptionListHtml("x_HairColor") ?>
		</select>
</div>
</span>
<?php echo $ivf_donorsemendetails_edit->HairColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->NoOfVials->Visible) { // NoOfVials ?>
	<div id="r_NoOfVials" class="form-group row">
		<label id="elh_ivf_donorsemendetails_NoOfVials" for="x_NoOfVials" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->NoOfVials->caption() ?><?php echo $ivf_donorsemendetails_edit->NoOfVials->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->NoOfVials->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_NoOfVials">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_NoOfVials" name="x_NoOfVials" id="x_NoOfVials" size="2" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_edit->NoOfVials->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_edit->NoOfVials->EditValue ?>"<?php echo $ivf_donorsemendetails_edit->NoOfVials->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_edit->NoOfVials->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->Tank->Visible) { // Tank ?>
	<div id="r_Tank" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Tank" for="x_Tank" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->Tank->caption() ?><?php echo $ivf_donorsemendetails_edit->Tank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->Tank->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Tank">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Tank" name="x_Tank" id="x_Tank" size="4" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_edit->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_edit->Tank->EditValue ?>"<?php echo $ivf_donorsemendetails_edit->Tank->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_edit->Tank->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->Canister->Visible) { // Canister ?>
	<div id="r_Canister" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Canister" for="x_Canister" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->Canister->caption() ?><?php echo $ivf_donorsemendetails_edit->Canister->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->Canister->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Canister">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Canister" name="x_Canister" id="x_Canister" size="8" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_edit->Canister->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_edit->Canister->EditValue ?>"<?php echo $ivf_donorsemendetails_edit->Canister->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_edit->Canister->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Remarks" for="x_Remarks" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->Remarks->caption() ?><?php echo $ivf_donorsemendetails_edit->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->Remarks->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Remarks">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_edit->Remarks->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_edit->Remarks->EditValue ?>"<?php echo $ivf_donorsemendetails_edit->Remarks->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_edit->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->patientid->Visible) { // patientid ?>
	<div id="r_patientid" class="form-group row">
		<label id="elh_ivf_donorsemendetails_patientid" for="x_patientid" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->patientid->caption() ?><?php echo $ivf_donorsemendetails_edit->patientid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->patientid->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_patientid">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_patientid" name="x_patientid" id="x_patientid" size="30" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_edit->patientid->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_edit->patientid->EditValue ?>"<?php echo $ivf_donorsemendetails_edit->patientid->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_edit->patientid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->coupleid->Visible) { // coupleid ?>
	<div id="r_coupleid" class="form-group row">
		<label id="elh_ivf_donorsemendetails_coupleid" for="x_coupleid" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->coupleid->caption() ?><?php echo $ivf_donorsemendetails_edit->coupleid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->coupleid->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_coupleid">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_coupleid" name="x_coupleid" id="x_coupleid" size="30" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_edit->coupleid->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_edit->coupleid->EditValue ?>"<?php echo $ivf_donorsemendetails_edit->coupleid->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_edit->coupleid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->Usedstatus->Visible) { // Usedstatus ?>
	<div id="r_Usedstatus" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Usedstatus" for="x_Usedstatus" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->Usedstatus->caption() ?><?php echo $ivf_donorsemendetails_edit->Usedstatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->Usedstatus->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Usedstatus">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Usedstatus" name="x_Usedstatus" id="x_Usedstatus" size="30" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_edit->Usedstatus->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_edit->Usedstatus->EditValue ?>"<?php echo $ivf_donorsemendetails_edit->Usedstatus->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_edit->Usedstatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_ivf_donorsemendetails_status" for="x_status" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->status->caption() ?><?php echo $ivf_donorsemendetails_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->status->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_status">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_edit->status->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_edit->status->EditValue ?>"<?php echo $ivf_donorsemendetails_edit->status->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_edit->Lagency->Visible) { // Lagency ?>
	<div id="r_Lagency" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Lagency" for="x_Lagency" class="<?php echo $ivf_donorsemendetails_edit->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_edit->Lagency->caption() ?><?php echo $ivf_donorsemendetails_edit->Lagency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_edit->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_edit->Lagency->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Lagency">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_Lagency" data-value-separator="<?php echo $ivf_donorsemendetails_edit->Lagency->displayValueSeparatorAttribute() ?>" id="x_Lagency" name="x_Lagency"<?php echo $ivf_donorsemendetails_edit->Lagency->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_edit->Lagency->selectOptionListHtml("x_Lagency") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_agency") && !$ivf_donorsemendetails_edit->Lagency->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Lagency" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_donorsemendetails_edit->Lagency->caption() ?>" data-title="<?php echo $ivf_donorsemendetails_edit->Lagency->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Lagency',url:'ivf_agencyaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_donorsemendetails_edit->Lagency->Lookup->getParamTag($ivf_donorsemendetails_edit, "p_x_Lagency") ?>
</span>
<?php echo $ivf_donorsemendetails_edit->Lagency->CustomMsg ?></div></div>
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
$ivf_donorsemendetails_edit->terminate();
?>