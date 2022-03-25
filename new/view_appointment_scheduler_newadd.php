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
$view_appointment_scheduler_new_add = new view_appointment_scheduler_new_add();

// Run the page
$view_appointment_scheduler_new_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_appointment_scheduler_new_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_appointment_scheduler_newadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fview_appointment_scheduler_newadd = currentForm = new ew.Form("fview_appointment_scheduler_newadd", "add");

	// Validate form
	fview_appointment_scheduler_newadd.validate = function() {
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
			<?php if ($view_appointment_scheduler_new_add->patientID->Required) { ?>
				elm = this.getElements("x" + infix + "_patientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_add->patientID->caption(), $view_appointment_scheduler_new_add->patientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_appointment_scheduler_new_add->patientName->Required) { ?>
				elm = this.getElements("x" + infix + "_patientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_add->patientName->caption(), $view_appointment_scheduler_new_add->patientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_appointment_scheduler_new_add->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_add->MobileNumber->caption(), $view_appointment_scheduler_new_add->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_appointment_scheduler_new_add->start_time->Required) { ?>
				elm = this.getElements("x" + infix + "_start_time");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_add->start_time->caption(), $view_appointment_scheduler_new_add->start_time->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_start_time");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new_add->start_time->errorMessage()) ?>");
			<?php if ($view_appointment_scheduler_new_add->Purpose->Required) { ?>
				elm = this.getElements("x" + infix + "_Purpose");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_add->Purpose->caption(), $view_appointment_scheduler_new_add->Purpose->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_appointment_scheduler_new_add->patienttype->Required) { ?>
				elm = this.getElements("x" + infix + "_patienttype");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_add->patienttype->caption(), $view_appointment_scheduler_new_add->patienttype->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_appointment_scheduler_new_add->Referal->Required) { ?>
				elm = this.getElements("x" + infix + "_Referal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_add->Referal->caption(), $view_appointment_scheduler_new_add->Referal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_appointment_scheduler_new_add->start_date->Required) { ?>
				elm = this.getElements("x" + infix + "_start_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_add->start_date->caption(), $view_appointment_scheduler_new_add->start_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_start_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new_add->start_date->errorMessage()) ?>");
			<?php if ($view_appointment_scheduler_new_add->DoctorName->Required) { ?>
				elm = this.getElements("x" + infix + "_DoctorName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_add->DoctorName->caption(), $view_appointment_scheduler_new_add->DoctorName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_appointment_scheduler_new_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_add->HospID->caption(), $view_appointment_scheduler_new_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new_add->HospID->errorMessage()) ?>");
			<?php if ($view_appointment_scheduler_new_add->PatientTypee->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientTypee");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_add->PatientTypee->caption(), $view_appointment_scheduler_new_add->PatientTypee->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_appointment_scheduler_new_add->Notes->Required) { ?>
				elm = this.getElements("x" + infix + "_Notes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_add->Notes->caption(), $view_appointment_scheduler_new_add->Notes->RequiredErrorMessage)) ?>");
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
	fview_appointment_scheduler_newadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_appointment_scheduler_newadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_appointment_scheduler_newadd.lists["x_Referal"] = <?php echo $view_appointment_scheduler_new_add->Referal->Lookup->toClientList($view_appointment_scheduler_new_add) ?>;
	fview_appointment_scheduler_newadd.lists["x_Referal"].options = <?php echo JsonEncode($view_appointment_scheduler_new_add->Referal->lookupOptions()) ?>;
	fview_appointment_scheduler_newadd.autoSuggests["x_Referal"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fview_appointment_scheduler_newadd.lists["x_DoctorName"] = <?php echo $view_appointment_scheduler_new_add->DoctorName->Lookup->toClientList($view_appointment_scheduler_new_add) ?>;
	fview_appointment_scheduler_newadd.lists["x_DoctorName"].options = <?php echo JsonEncode($view_appointment_scheduler_new_add->DoctorName->lookupOptions()) ?>;
	loadjs.done("fview_appointment_scheduler_newadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_appointment_scheduler_new_add->showPageHeader(); ?>
<?php
$view_appointment_scheduler_new_add->showMessage();
?>
<form name="fview_appointment_scheduler_newadd" id="fview_appointment_scheduler_newadd" class="<?php echo $view_appointment_scheduler_new_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler_new">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$view_appointment_scheduler_new_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($view_appointment_scheduler_new_add->patientID->Visible) { // patientID ?>
	<div id="r_patientID" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_patientID" for="x_patientID" class="<?php echo $view_appointment_scheduler_new_add->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new_add->patientID->caption() ?><?php echo $view_appointment_scheduler_new_add->patientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_add->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_add->patientID->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_patientID">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patientID" name="x_patientID" id="x_patientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_add->patientID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_add->patientID->EditValue ?>"<?php echo $view_appointment_scheduler_new_add->patientID->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler_new_add->patientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_add->patientName->Visible) { // patientName ?>
	<div id="r_patientName" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_patientName" for="x_patientName" class="<?php echo $view_appointment_scheduler_new_add->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new_add->patientName->caption() ?><?php echo $view_appointment_scheduler_new_add->patientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_add->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_add->patientName->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_patientName">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_add->patientName->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_add->patientName->EditValue ?>"<?php echo $view_appointment_scheduler_new_add->patientName->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler_new_add->patientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_add->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_MobileNumber" for="x_MobileNumber" class="<?php echo $view_appointment_scheduler_new_add->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new_add->MobileNumber->caption() ?><?php echo $view_appointment_scheduler_new_add->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_add->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_add->MobileNumber->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_MobileNumber">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_add->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_add->MobileNumber->EditValue ?>"<?php echo $view_appointment_scheduler_new_add->MobileNumber->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler_new_add->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_add->start_time->Visible) { // start_time ?>
	<div id="r_start_time" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_start_time" for="x_start_time" class="<?php echo $view_appointment_scheduler_new_add->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new_add->start_time->caption() ?><?php echo $view_appointment_scheduler_new_add->start_time->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_add->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_add->start_time->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_start_time">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_time" data-format="3" name="x_start_time" id="x_start_time" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_add->start_time->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_add->start_time->EditValue ?>"<?php echo $view_appointment_scheduler_new_add->start_time->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new_add->start_time->ReadOnly && !$view_appointment_scheduler_new_add->start_time->Disabled && !isset($view_appointment_scheduler_new_add->start_time->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new_add->start_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_appointment_scheduler_newadd", "x_start_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if (!$view_appointment_scheduler_new_add->start_time->ReadOnly && !$view_appointment_scheduler_new_add->start_time->Disabled && !isset($view_appointment_scheduler_new_add->start_time->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new_add->start_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newadd", "timepicker"], function() {
	ew.createTimePicker("fview_appointment_scheduler_newadd", "x_start_time", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<?php echo $view_appointment_scheduler_new_add->start_time->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_add->Purpose->Visible) { // Purpose ?>
	<div id="r_Purpose" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_Purpose" for="x_Purpose" class="<?php echo $view_appointment_scheduler_new_add->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new_add->Purpose->caption() ?><?php echo $view_appointment_scheduler_new_add->Purpose->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_add->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_add->Purpose->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Purpose">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_add->Purpose->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_add->Purpose->EditValue ?>"<?php echo $view_appointment_scheduler_new_add->Purpose->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler_new_add->Purpose->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_add->patienttype->Visible) { // patienttype ?>
	<div id="r_patienttype" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_patienttype" for="x_patienttype" class="<?php echo $view_appointment_scheduler_new_add->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new_add->patienttype->caption() ?><?php echo $view_appointment_scheduler_new_add->patienttype->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_add->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_add->patienttype->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_patienttype">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patienttype" name="x_patienttype" id="x_patienttype" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_add->patienttype->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_add->patienttype->EditValue ?>"<?php echo $view_appointment_scheduler_new_add->patienttype->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler_new_add->patienttype->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_add->Referal->Visible) { // Referal ?>
	<div id="r_Referal" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_Referal" class="<?php echo $view_appointment_scheduler_new_add->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new_add->Referal->caption() ?><?php echo $view_appointment_scheduler_new_add->Referal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_add->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_add->Referal->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Referal">
<?php
$onchange = $view_appointment_scheduler_new_add->Referal->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_appointment_scheduler_new_add->Referal->EditAttrs["onchange"] = "";
?>
<span id="as_x_Referal">
	<input type="text" class="form-control" name="sv_x_Referal" id="sv_x_Referal" value="<?php echo RemoveHtml($view_appointment_scheduler_new_add->Referal->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_add->Referal->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_add->Referal->getPlaceHolder()) ?>"<?php echo $view_appointment_scheduler_new_add->Referal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Referal" data-value-separator="<?php echo $view_appointment_scheduler_new_add->Referal->displayValueSeparatorAttribute() ?>" name="x_Referal" id="x_Referal" value="<?php echo HtmlEncode($view_appointment_scheduler_new_add->Referal->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_appointment_scheduler_newadd"], function() {
	fview_appointment_scheduler_newadd.createAutoSuggest({"id":"x_Referal","forceSelect":false});
});
</script>
<?php echo $view_appointment_scheduler_new_add->Referal->Lookup->getParamTag($view_appointment_scheduler_new_add, "p_x_Referal") ?>
</span>
<?php echo $view_appointment_scheduler_new_add->Referal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_add->start_date->Visible) { // start_date ?>
	<div id="r_start_date" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_start_date" for="x_start_date" class="<?php echo $view_appointment_scheduler_new_add->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new_add->start_date->caption() ?><?php echo $view_appointment_scheduler_new_add->start_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_add->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_add->start_date->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_start_date">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_add->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_add->start_date->EditValue ?>"<?php echo $view_appointment_scheduler_new_add->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new_add->start_date->ReadOnly && !$view_appointment_scheduler_new_add->start_date->Disabled && !isset($view_appointment_scheduler_new_add->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new_add->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_appointment_scheduler_newadd", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php echo $view_appointment_scheduler_new_add->start_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_add->DoctorName->Visible) { // DoctorName ?>
	<div id="r_DoctorName" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_DoctorName" for="x_DoctorName" class="<?php echo $view_appointment_scheduler_new_add->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new_add->DoctorName->caption() ?><?php echo $view_appointment_scheduler_new_add->DoctorName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_add->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_add->DoctorName->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_DoctorName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_appointment_scheduler_new" data-field="x_DoctorName" data-value-separator="<?php echo $view_appointment_scheduler_new_add->DoctorName->displayValueSeparatorAttribute() ?>" id="x_DoctorName" name="x_DoctorName"<?php echo $view_appointment_scheduler_new_add->DoctorName->editAttributes() ?>>
			<?php echo $view_appointment_scheduler_new_add->DoctorName->selectOptionListHtml("x_DoctorName") ?>
		</select>
</div>
<?php echo $view_appointment_scheduler_new_add->DoctorName->Lookup->getParamTag($view_appointment_scheduler_new_add, "p_x_DoctorName") ?>
</span>
<?php echo $view_appointment_scheduler_new_add->DoctorName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_add->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_HospID" for="x_HospID" class="<?php echo $view_appointment_scheduler_new_add->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new_add->HospID->caption() ?><?php echo $view_appointment_scheduler_new_add->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_add->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_add->HospID->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_HospID">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_add->HospID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_add->HospID->EditValue ?>"<?php echo $view_appointment_scheduler_new_add->HospID->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler_new_add->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_add->PatientTypee->Visible) { // PatientTypee ?>
	<div id="r_PatientTypee" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_PatientTypee" for="x_PatientTypee" class="<?php echo $view_appointment_scheduler_new_add->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new_add->PatientTypee->caption() ?><?php echo $view_appointment_scheduler_new_add->PatientTypee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_add->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_add->PatientTypee->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_PatientTypee">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_PatientTypee" name="x_PatientTypee" id="x_PatientTypee" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_add->PatientTypee->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_add->PatientTypee->EditValue ?>"<?php echo $view_appointment_scheduler_new_add->PatientTypee->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler_new_add->PatientTypee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_add->Notes->Visible) { // Notes ?>
	<div id="r_Notes" class="form-group row">
		<label id="elh_view_appointment_scheduler_new_Notes" for="x_Notes" class="<?php echo $view_appointment_scheduler_new_add->LeftColumnClass ?>"><?php echo $view_appointment_scheduler_new_add->Notes->caption() ?><?php echo $view_appointment_scheduler_new_add->Notes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_appointment_scheduler_new_add->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_add->Notes->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Notes">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_Notes" name="x_Notes" id="x_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_add->Notes->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_add->Notes->EditValue ?>"<?php echo $view_appointment_scheduler_new_add->Notes->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler_new_add->Notes->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_appointment_scheduler_new_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_appointment_scheduler_new_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_appointment_scheduler_new_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_appointment_scheduler_new_add->showPageFooter();
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
$view_appointment_scheduler_new_add->terminate();
?>