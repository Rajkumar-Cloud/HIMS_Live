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
$ivf_donorsemendetails_add = new ivf_donorsemendetails_add();

// Run the page
$ivf_donorsemendetails_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_donorsemendetails_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_donorsemendetailsadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fivf_donorsemendetailsadd = currentForm = new ew.Form("fivf_donorsemendetailsadd", "add");

	// Validate form
	fivf_donorsemendetailsadd.validate = function() {
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
			<?php if ($ivf_donorsemendetails_add->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->RIDNo->caption(), $ivf_donorsemendetails_add->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails_add->RIDNo->errorMessage()) ?>");
			<?php if ($ivf_donorsemendetails_add->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->TidNo->caption(), $ivf_donorsemendetails_add->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails_add->TidNo->errorMessage()) ?>");
			<?php if ($ivf_donorsemendetails_add->Agency->Required) { ?>
				elm = this.getElements("x" + infix + "_Agency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->Agency->caption(), $ivf_donorsemendetails_add->Agency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_add->ReceivedOn->Required) { ?>
				elm = this.getElements("x" + infix + "_ReceivedOn");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->ReceivedOn->caption(), $ivf_donorsemendetails_add->ReceivedOn->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReceivedOn");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails_add->ReceivedOn->errorMessage()) ?>");
			<?php if ($ivf_donorsemendetails_add->ReceivedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ReceivedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->ReceivedBy->caption(), $ivf_donorsemendetails_add->ReceivedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_add->DonorNo->Required) { ?>
				elm = this.getElements("x" + infix + "_DonorNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->DonorNo->caption(), $ivf_donorsemendetails_add->DonorNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_add->BatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_BatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->BatchNo->caption(), $ivf_donorsemendetails_add->BatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_add->BloodGroup->Required) { ?>
				elm = this.getElements("x" + infix + "_BloodGroup");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->BloodGroup->caption(), $ivf_donorsemendetails_add->BloodGroup->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_add->Height->Required) { ?>
				elm = this.getElements("x" + infix + "_Height");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->Height->caption(), $ivf_donorsemendetails_add->Height->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_add->SkinColor->Required) { ?>
				elm = this.getElements("x" + infix + "_SkinColor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->SkinColor->caption(), $ivf_donorsemendetails_add->SkinColor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_add->EyeColor->Required) { ?>
				elm = this.getElements("x" + infix + "_EyeColor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->EyeColor->caption(), $ivf_donorsemendetails_add->EyeColor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_add->HairColor->Required) { ?>
				elm = this.getElements("x" + infix + "_HairColor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->HairColor->caption(), $ivf_donorsemendetails_add->HairColor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_add->NoOfVials->Required) { ?>
				elm = this.getElements("x" + infix + "_NoOfVials");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->NoOfVials->caption(), $ivf_donorsemendetails_add->NoOfVials->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_add->Tank->Required) { ?>
				elm = this.getElements("x" + infix + "_Tank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->Tank->caption(), $ivf_donorsemendetails_add->Tank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_add->Canister->Required) { ?>
				elm = this.getElements("x" + infix + "_Canister");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->Canister->caption(), $ivf_donorsemendetails_add->Canister->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_add->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->Remarks->caption(), $ivf_donorsemendetails_add->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_add->patientid->Required) { ?>
				elm = this.getElements("x" + infix + "_patientid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->patientid->caption(), $ivf_donorsemendetails_add->patientid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_patientid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails_add->patientid->errorMessage()) ?>");
			<?php if ($ivf_donorsemendetails_add->coupleid->Required) { ?>
				elm = this.getElements("x" + infix + "_coupleid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->coupleid->caption(), $ivf_donorsemendetails_add->coupleid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_coupleid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails_add->coupleid->errorMessage()) ?>");
			<?php if ($ivf_donorsemendetails_add->Usedstatus->Required) { ?>
				elm = this.getElements("x" + infix + "_Usedstatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->Usedstatus->caption(), $ivf_donorsemendetails_add->Usedstatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Usedstatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails_add->Usedstatus->errorMessage()) ?>");
			<?php if ($ivf_donorsemendetails_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->status->caption(), $ivf_donorsemendetails_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_donorsemendetails_add->status->errorMessage()) ?>");
			<?php if ($ivf_donorsemendetails_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->createdby->caption(), $ivf_donorsemendetails_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->createddatetime->caption(), $ivf_donorsemendetails_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_add->Lagency->Required) { ?>
				elm = this.getElements("x" + infix + "_Lagency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_add->Lagency->caption(), $ivf_donorsemendetails_add->Lagency->RequiredErrorMessage)) ?>");
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
	fivf_donorsemendetailsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_donorsemendetailsadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_donorsemendetailsadd.lists["x_BloodGroup"] = <?php echo $ivf_donorsemendetails_add->BloodGroup->Lookup->toClientList($ivf_donorsemendetails_add) ?>;
	fivf_donorsemendetailsadd.lists["x_BloodGroup"].options = <?php echo JsonEncode($ivf_donorsemendetails_add->BloodGroup->lookupOptions()) ?>;
	fivf_donorsemendetailsadd.lists["x_SkinColor"] = <?php echo $ivf_donorsemendetails_add->SkinColor->Lookup->toClientList($ivf_donorsemendetails_add) ?>;
	fivf_donorsemendetailsadd.lists["x_SkinColor"].options = <?php echo JsonEncode($ivf_donorsemendetails_add->SkinColor->options(FALSE, TRUE)) ?>;
	fivf_donorsemendetailsadd.lists["x_EyeColor"] = <?php echo $ivf_donorsemendetails_add->EyeColor->Lookup->toClientList($ivf_donorsemendetails_add) ?>;
	fivf_donorsemendetailsadd.lists["x_EyeColor"].options = <?php echo JsonEncode($ivf_donorsemendetails_add->EyeColor->options(FALSE, TRUE)) ?>;
	fivf_donorsemendetailsadd.lists["x_HairColor"] = <?php echo $ivf_donorsemendetails_add->HairColor->Lookup->toClientList($ivf_donorsemendetails_add) ?>;
	fivf_donorsemendetailsadd.lists["x_HairColor"].options = <?php echo JsonEncode($ivf_donorsemendetails_add->HairColor->options(FALSE, TRUE)) ?>;
	fivf_donorsemendetailsadd.lists["x_Lagency"] = <?php echo $ivf_donorsemendetails_add->Lagency->Lookup->toClientList($ivf_donorsemendetails_add) ?>;
	fivf_donorsemendetailsadd.lists["x_Lagency"].options = <?php echo JsonEncode($ivf_donorsemendetails_add->Lagency->lookupOptions()) ?>;
	loadjs.done("fivf_donorsemendetailsadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_donorsemendetails_add->showPageHeader(); ?>
<?php
$ivf_donorsemendetails_add->showMessage();
?>
<form name="fivf_donorsemendetailsadd" id="fivf_donorsemendetailsadd" class="<?php echo $ivf_donorsemendetails_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_donorsemendetails">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_donorsemendetails_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($ivf_donorsemendetails_add->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_donorsemendetails_RIDNo" for="x_RIDNo" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->RIDNo->caption() ?><?php echo $ivf_donorsemendetails_add->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->RIDNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_RIDNo">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_add->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_add->RIDNo->EditValue ?>"<?php echo $ivf_donorsemendetails_add->RIDNo->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_add->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_donorsemendetails_TidNo" for="x_TidNo" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->TidNo->caption() ?><?php echo $ivf_donorsemendetails_add->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->TidNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_TidNo">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_add->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_add->TidNo->EditValue ?>"<?php echo $ivf_donorsemendetails_add->TidNo->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_add->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->Agency->Visible) { // Agency ?>
	<div id="r_Agency" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Agency" for="x_Agency" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->Agency->caption() ?><?php echo $ivf_donorsemendetails_add->Agency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->Agency->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Agency">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Agency" name="x_Agency" id="x_Agency" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_add->Agency->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_add->Agency->EditValue ?>"<?php echo $ivf_donorsemendetails_add->Agency->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_add->Agency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->ReceivedOn->Visible) { // ReceivedOn ?>
	<div id="r_ReceivedOn" class="form-group row">
		<label id="elh_ivf_donorsemendetails_ReceivedOn" for="x_ReceivedOn" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->ReceivedOn->caption() ?><?php echo $ivf_donorsemendetails_add->ReceivedOn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->ReceivedOn->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_ReceivedOn">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_ReceivedOn" name="x_ReceivedOn" id="x_ReceivedOn" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_add->ReceivedOn->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_add->ReceivedOn->EditValue ?>"<?php echo $ivf_donorsemendetails_add->ReceivedOn->editAttributes() ?>>
<?php if (!$ivf_donorsemendetails_add->ReceivedOn->ReadOnly && !$ivf_donorsemendetails_add->ReceivedOn->Disabled && !isset($ivf_donorsemendetails_add->ReceivedOn->EditAttrs["readonly"]) && !isset($ivf_donorsemendetails_add->ReceivedOn->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_donorsemendetailsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_donorsemendetailsadd", "x_ReceivedOn", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $ivf_donorsemendetails_add->ReceivedOn->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->ReceivedBy->Visible) { // ReceivedBy ?>
	<div id="r_ReceivedBy" class="form-group row">
		<label id="elh_ivf_donorsemendetails_ReceivedBy" for="x_ReceivedBy" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->ReceivedBy->caption() ?><?php echo $ivf_donorsemendetails_add->ReceivedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->ReceivedBy->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_ReceivedBy">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_ReceivedBy" name="x_ReceivedBy" id="x_ReceivedBy" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_add->ReceivedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_add->ReceivedBy->EditValue ?>"<?php echo $ivf_donorsemendetails_add->ReceivedBy->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_add->ReceivedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->DonorNo->Visible) { // DonorNo ?>
	<div id="r_DonorNo" class="form-group row">
		<label id="elh_ivf_donorsemendetails_DonorNo" for="x_DonorNo" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->DonorNo->caption() ?><?php echo $ivf_donorsemendetails_add->DonorNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->DonorNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_DonorNo">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_DonorNo" name="x_DonorNo" id="x_DonorNo" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_add->DonorNo->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_add->DonorNo->EditValue ?>"<?php echo $ivf_donorsemendetails_add->DonorNo->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_add->DonorNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->BatchNo->Visible) { // BatchNo ?>
	<div id="r_BatchNo" class="form-group row">
		<label id="elh_ivf_donorsemendetails_BatchNo" for="x_BatchNo" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->BatchNo->caption() ?><?php echo $ivf_donorsemendetails_add->BatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->BatchNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_BatchNo">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="6" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_add->BatchNo->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_add->BatchNo->EditValue ?>"<?php echo $ivf_donorsemendetails_add->BatchNo->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_add->BatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->BloodGroup->Visible) { // BloodGroup ?>
	<div id="r_BloodGroup" class="form-group row">
		<label id="elh_ivf_donorsemendetails_BloodGroup" for="x_BloodGroup" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->BloodGroup->caption() ?><?php echo $ivf_donorsemendetails_add->BloodGroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->BloodGroup->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_BloodGroup">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_BloodGroup" data-value-separator="<?php echo $ivf_donorsemendetails_add->BloodGroup->displayValueSeparatorAttribute() ?>" id="x_BloodGroup" name="x_BloodGroup"<?php echo $ivf_donorsemendetails_add->BloodGroup->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_add->BloodGroup->selectOptionListHtml("x_BloodGroup") ?>
		</select>
</div>
<?php echo $ivf_donorsemendetails_add->BloodGroup->Lookup->getParamTag($ivf_donorsemendetails_add, "p_x_BloodGroup") ?>
</span>
<?php echo $ivf_donorsemendetails_add->BloodGroup->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->Height->Visible) { // Height ?>
	<div id="r_Height" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Height" for="x_Height" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->Height->caption() ?><?php echo $ivf_donorsemendetails_add->Height->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->Height->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Height">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Height" name="x_Height" id="x_Height" size="4" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_add->Height->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_add->Height->EditValue ?>"<?php echo $ivf_donorsemendetails_add->Height->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_add->Height->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->SkinColor->Visible) { // SkinColor ?>
	<div id="r_SkinColor" class="form-group row">
		<label id="elh_ivf_donorsemendetails_SkinColor" for="x_SkinColor" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->SkinColor->caption() ?><?php echo $ivf_donorsemendetails_add->SkinColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->SkinColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_SkinColor">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_SkinColor" data-value-separator="<?php echo $ivf_donorsemendetails_add->SkinColor->displayValueSeparatorAttribute() ?>" id="x_SkinColor" name="x_SkinColor"<?php echo $ivf_donorsemendetails_add->SkinColor->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_add->SkinColor->selectOptionListHtml("x_SkinColor") ?>
		</select>
</div>
</span>
<?php echo $ivf_donorsemendetails_add->SkinColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->EyeColor->Visible) { // EyeColor ?>
	<div id="r_EyeColor" class="form-group row">
		<label id="elh_ivf_donorsemendetails_EyeColor" for="x_EyeColor" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->EyeColor->caption() ?><?php echo $ivf_donorsemendetails_add->EyeColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->EyeColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_EyeColor">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_EyeColor" data-value-separator="<?php echo $ivf_donorsemendetails_add->EyeColor->displayValueSeparatorAttribute() ?>" id="x_EyeColor" name="x_EyeColor"<?php echo $ivf_donorsemendetails_add->EyeColor->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_add->EyeColor->selectOptionListHtml("x_EyeColor") ?>
		</select>
</div>
</span>
<?php echo $ivf_donorsemendetails_add->EyeColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->HairColor->Visible) { // HairColor ?>
	<div id="r_HairColor" class="form-group row">
		<label id="elh_ivf_donorsemendetails_HairColor" for="x_HairColor" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->HairColor->caption() ?><?php echo $ivf_donorsemendetails_add->HairColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->HairColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_HairColor">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_HairColor" data-value-separator="<?php echo $ivf_donorsemendetails_add->HairColor->displayValueSeparatorAttribute() ?>" id="x_HairColor" name="x_HairColor"<?php echo $ivf_donorsemendetails_add->HairColor->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_add->HairColor->selectOptionListHtml("x_HairColor") ?>
		</select>
</div>
</span>
<?php echo $ivf_donorsemendetails_add->HairColor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->NoOfVials->Visible) { // NoOfVials ?>
	<div id="r_NoOfVials" class="form-group row">
		<label id="elh_ivf_donorsemendetails_NoOfVials" for="x_NoOfVials" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->NoOfVials->caption() ?><?php echo $ivf_donorsemendetails_add->NoOfVials->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->NoOfVials->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_NoOfVials">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_NoOfVials" name="x_NoOfVials" id="x_NoOfVials" size="2" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_add->NoOfVials->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_add->NoOfVials->EditValue ?>"<?php echo $ivf_donorsemendetails_add->NoOfVials->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_add->NoOfVials->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->Tank->Visible) { // Tank ?>
	<div id="r_Tank" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Tank" for="x_Tank" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->Tank->caption() ?><?php echo $ivf_donorsemendetails_add->Tank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->Tank->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Tank">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Tank" name="x_Tank" id="x_Tank" size="4" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_add->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_add->Tank->EditValue ?>"<?php echo $ivf_donorsemendetails_add->Tank->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_add->Tank->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->Canister->Visible) { // Canister ?>
	<div id="r_Canister" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Canister" for="x_Canister" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->Canister->caption() ?><?php echo $ivf_donorsemendetails_add->Canister->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->Canister->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Canister">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Canister" name="x_Canister" id="x_Canister" size="8" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_add->Canister->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_add->Canister->EditValue ?>"<?php echo $ivf_donorsemendetails_add->Canister->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_add->Canister->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Remarks" for="x_Remarks" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->Remarks->caption() ?><?php echo $ivf_donorsemendetails_add->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->Remarks->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Remarks">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_add->Remarks->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_add->Remarks->EditValue ?>"<?php echo $ivf_donorsemendetails_add->Remarks->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_add->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->patientid->Visible) { // patientid ?>
	<div id="r_patientid" class="form-group row">
		<label id="elh_ivf_donorsemendetails_patientid" for="x_patientid" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->patientid->caption() ?><?php echo $ivf_donorsemendetails_add->patientid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->patientid->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_patientid">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_patientid" name="x_patientid" id="x_patientid" size="30" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_add->patientid->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_add->patientid->EditValue ?>"<?php echo $ivf_donorsemendetails_add->patientid->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_add->patientid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->coupleid->Visible) { // coupleid ?>
	<div id="r_coupleid" class="form-group row">
		<label id="elh_ivf_donorsemendetails_coupleid" for="x_coupleid" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->coupleid->caption() ?><?php echo $ivf_donorsemendetails_add->coupleid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->coupleid->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_coupleid">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_coupleid" name="x_coupleid" id="x_coupleid" size="30" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_add->coupleid->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_add->coupleid->EditValue ?>"<?php echo $ivf_donorsemendetails_add->coupleid->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_add->coupleid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->Usedstatus->Visible) { // Usedstatus ?>
	<div id="r_Usedstatus" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Usedstatus" for="x_Usedstatus" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->Usedstatus->caption() ?><?php echo $ivf_donorsemendetails_add->Usedstatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->Usedstatus->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Usedstatus">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Usedstatus" name="x_Usedstatus" id="x_Usedstatus" size="30" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_add->Usedstatus->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_add->Usedstatus->EditValue ?>"<?php echo $ivf_donorsemendetails_add->Usedstatus->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_add->Usedstatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_ivf_donorsemendetails_status" for="x_status" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->status->caption() ?><?php echo $ivf_donorsemendetails_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->status->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_status">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_add->status->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_add->status->EditValue ?>"<?php echo $ivf_donorsemendetails_add->status->editAttributes() ?>>
</span>
<?php echo $ivf_donorsemendetails_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_donorsemendetails_add->Lagency->Visible) { // Lagency ?>
	<div id="r_Lagency" class="form-group row">
		<label id="elh_ivf_donorsemendetails_Lagency" for="x_Lagency" class="<?php echo $ivf_donorsemendetails_add->LeftColumnClass ?>"><?php echo $ivf_donorsemendetails_add->Lagency->caption() ?><?php echo $ivf_donorsemendetails_add->Lagency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_donorsemendetails_add->RightColumnClass ?>"><div <?php echo $ivf_donorsemendetails_add->Lagency->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Lagency">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_Lagency" data-value-separator="<?php echo $ivf_donorsemendetails_add->Lagency->displayValueSeparatorAttribute() ?>" id="x_Lagency" name="x_Lagency"<?php echo $ivf_donorsemendetails_add->Lagency->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_add->Lagency->selectOptionListHtml("x_Lagency") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_agency") && !$ivf_donorsemendetails_add->Lagency->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Lagency" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_donorsemendetails_add->Lagency->caption() ?>" data-title="<?php echo $ivf_donorsemendetails_add->Lagency->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Lagency',url:'ivf_agencyaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_donorsemendetails_add->Lagency->Lookup->getParamTag($ivf_donorsemendetails_add, "p_x_Lagency") ?>
</span>
<?php echo $ivf_donorsemendetails_add->Lagency->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ivf_donorsemendetails_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_donorsemendetails_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_donorsemendetails_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ivf_donorsemendetails_add->showPageFooter();
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
$ivf_donorsemendetails_add->terminate();
?>