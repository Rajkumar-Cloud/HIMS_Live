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
$view_appointment_scheduler_new_search = new view_appointment_scheduler_new_search();

// Run the page
$view_appointment_scheduler_new_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_appointment_scheduler_new_search->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($view_appointment_scheduler_new_search->IsModal) { ?>
var fview_appointment_scheduler_newsearch = currentAdvancedSearchForm = new ew.Form("fview_appointment_scheduler_newsearch", "search");
<?php } else { ?>
var fview_appointment_scheduler_newsearch = currentForm = new ew.Form("fview_appointment_scheduler_newsearch", "search");
<?php } ?>

// Form_CustomValidate event
fview_appointment_scheduler_newsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_appointment_scheduler_newsearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_appointment_scheduler_newsearch.lists["x_Referal"] = <?php echo $view_appointment_scheduler_new_search->Referal->Lookup->toClientList() ?>;
fview_appointment_scheduler_newsearch.lists["x_Referal"].options = <?php echo JsonEncode($view_appointment_scheduler_new_search->Referal->lookupOptions()) ?>;
fview_appointment_scheduler_newsearch.autoSuggests["x_Referal"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_appointment_scheduler_newsearch.lists["x_DoctorName"] = <?php echo $view_appointment_scheduler_new_search->DoctorName->Lookup->toClientList() ?>;
fview_appointment_scheduler_newsearch.lists["x_DoctorName"].options = <?php echo JsonEncode($view_appointment_scheduler_new_search->DoctorName->lookupOptions()) ?>;

// Form object for search
// Validate function for search

fview_appointment_scheduler_newsearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_start_time");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new->start_time->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_start_date");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new->start_date->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_HospID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new->HospID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new->Id->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_appointment_scheduler_new_search->showPageHeader(); ?>
<?php
$view_appointment_scheduler_new_search->showMessage();
?>
<form name="fview_appointment_scheduler_newsearch" id="fview_appointment_scheduler_newsearch" class="<?php echo $view_appointment_scheduler_new_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_appointment_scheduler_new_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_appointment_scheduler_new_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler_new">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_appointment_scheduler_new_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_appointment_scheduler_new->patientID->Visible) { // patientID ?>
	<div id="r_patientID" class="form-group row">
		<label for="x_patientID" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_patientID"><?php echo $view_appointment_scheduler_new->patientID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_patientID" id="z_patientID" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->patientID->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_patientID">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patientID" name="x_patientID" id="x_patientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->patientID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->patientID->EditValue ?>"<?php echo $view_appointment_scheduler_new->patientID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->patientName->Visible) { // patientName ?>
	<div id="r_patientName" class="form-group row">
		<label for="x_patientName" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_patientName"><?php echo $view_appointment_scheduler_new->patientName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_patientName" id="z_patientName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->patientName->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_patientName">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->patientName->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->patientName->EditValue ?>"<?php echo $view_appointment_scheduler_new->patientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label for="x_MobileNumber" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_MobileNumber"><?php echo $view_appointment_scheduler_new->MobileNumber->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->MobileNumber->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_MobileNumber">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->MobileNumber->EditValue ?>"<?php echo $view_appointment_scheduler_new->MobileNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->start_time->Visible) { // start_time ?>
	<div id="r_start_time" class="form-group row">
		<label for="x_start_time" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_start_time"><?php echo $view_appointment_scheduler_new->start_time->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("<=") ?><input type="hidden" name="z_start_time" id="z_start_time" value="<="></span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->start_time->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_start_time">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_time" data-format="3" name="x_start_time" id="x_start_time" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->start_time->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->start_time->EditValue ?>"<?php echo $view_appointment_scheduler_new->start_time->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new->start_time->ReadOnly && !$view_appointment_scheduler_new->start_time->Disabled && !isset($view_appointment_scheduler_new->start_time->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new->start_time->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_appointment_scheduler_newsearch", "x_start_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if (!$view_appointment_scheduler_new->start_time->ReadOnly && !$view_appointment_scheduler_new->start_time->Disabled && !isset($view_appointment_scheduler_new->start_time->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new->start_time->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fview_appointment_scheduler_newsearch", "x_start_time", {"timeFormat":"h:i A","step":15});</script><?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Purpose->Visible) { // Purpose ?>
	<div id="r_Purpose" class="form-group row">
		<label for="x_Purpose" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Purpose"><?php echo $view_appointment_scheduler_new->Purpose->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Purpose" id="z_Purpose" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->Purpose->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_Purpose">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->Purpose->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->Purpose->EditValue ?>"<?php echo $view_appointment_scheduler_new->Purpose->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->patienttype->Visible) { // patienttype ?>
	<div id="r_patienttype" class="form-group row">
		<label for="x_patienttype" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_patienttype"><?php echo $view_appointment_scheduler_new->patienttype->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_patienttype" id="z_patienttype" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->patienttype->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_patienttype">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patienttype" name="x_patienttype" id="x_patienttype" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->patienttype->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->patienttype->EditValue ?>"<?php echo $view_appointment_scheduler_new->patienttype->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Referal->Visible) { // Referal ?>
	<div id="r_Referal" class="form-group row">
		<label class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Referal"><?php echo $view_appointment_scheduler_new->Referal->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Referal" id="z_Referal" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->Referal->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_Referal">
<?php
$wrkonchange = "" . trim(@$view_appointment_scheduler_new->Referal->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_appointment_scheduler_new->Referal->EditAttrs["onchange"] = "";
?>
<span id="as_x_Referal" class="text-nowrap" style="z-index: 8930">
	<input type="text" class="form-control" name="sv_x_Referal" id="sv_x_Referal" value="<?php echo RemoveHtml($view_appointment_scheduler_new->Referal->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->Referal->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->Referal->getPlaceHolder()) ?>"<?php echo $view_appointment_scheduler_new->Referal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Referal" data-value-separator="<?php echo $view_appointment_scheduler_new->Referal->displayValueSeparatorAttribute() ?>" name="x_Referal" id="x_Referal" value="<?php echo HtmlEncode($view_appointment_scheduler_new->Referal->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_appointment_scheduler_newsearch.createAutoSuggest({"id":"x_Referal","forceSelect":false});
</script>
<?php echo $view_appointment_scheduler_new->Referal->Lookup->getParamTag("p_x_Referal") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->start_date->Visible) { // start_date ?>
	<div id="r_start_date" class="form-group row">
		<label for="x_start_date" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_start_date"><?php echo $view_appointment_scheduler_new->start_date->caption() ?></span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->start_date->cellAttributes() ?>>
		<span class="ew-search-operator"><select name="z_start_date" id="z_start_date" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_appointment_scheduler_new->start_date->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_appointment_scheduler_new->start_date->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_appointment_scheduler_new->start_date->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_appointment_scheduler_new->start_date->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_appointment_scheduler_new->start_date->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_appointment_scheduler_new->start_date->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_appointment_scheduler_new->start_date->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_appointment_scheduler_new->start_date->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_appointment_scheduler_new->start_date->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
			<span id="el_view_appointment_scheduler_new_start_date">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->start_date->EditValue ?>"<?php echo $view_appointment_scheduler_new->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new->start_date->ReadOnly && !$view_appointment_scheduler_new->start_date->Disabled && !isset($view_appointment_scheduler_new->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_appointment_scheduler_newsearch", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
			<span class="ew-search-cond btw1_start_date d-none"><label><?php echo $Language->Phrase("AND") ?></label></span>
			<span id="e2_view_appointment_scheduler_new_start_date" class="btw1_start_date d-none">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="y_start_date" id="y_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->start_date->EditValue2 ?>"<?php echo $view_appointment_scheduler_new->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new->start_date->ReadOnly && !$view_appointment_scheduler_new->start_date->Disabled && !isset($view_appointment_scheduler_new->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_appointment_scheduler_newsearch", "y_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->DoctorName->Visible) { // DoctorName ?>
	<div id="r_DoctorName" class="form-group row">
		<label for="x_DoctorName" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_DoctorName"><?php echo $view_appointment_scheduler_new->DoctorName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DoctorName" id="z_DoctorName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->DoctorName->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_DoctorName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_appointment_scheduler_new" data-field="x_DoctorName" data-value-separator="<?php echo $view_appointment_scheduler_new->DoctorName->displayValueSeparatorAttribute() ?>" id="x_DoctorName" name="x_DoctorName"<?php echo $view_appointment_scheduler_new->DoctorName->editAttributes() ?>>
		<?php echo $view_appointment_scheduler_new->DoctorName->selectOptionListHtml("x_DoctorName") ?>
	</select>
</div>
<?php echo $view_appointment_scheduler_new->DoctorName->Lookup->getParamTag("p_x_DoctorName") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_HospID"><?php echo $view_appointment_scheduler_new->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->HospID->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_HospID">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->HospID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->HospID->EditValue ?>"<?php echo $view_appointment_scheduler_new->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Id->Visible) { // Id ?>
	<div id="r_Id" class="form-group row">
		<label for="x_Id" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Id"><?php echo $view_appointment_scheduler_new->Id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Id" id="z_Id" value="="></span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->Id->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_Id">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_Id" name="x_Id" id="x_Id" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->Id->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->Id->EditValue ?>"<?php echo $view_appointment_scheduler_new->Id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->PatientTypee->Visible) { // PatientTypee ?>
	<div id="r_PatientTypee" class="form-group row">
		<label for="x_PatientTypee" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_PatientTypee"><?php echo $view_appointment_scheduler_new->PatientTypee->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientTypee" id="z_PatientTypee" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->PatientTypee->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_PatientTypee">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_PatientTypee" name="x_PatientTypee" id="x_PatientTypee" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->PatientTypee->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->PatientTypee->EditValue ?>"<?php echo $view_appointment_scheduler_new->PatientTypee->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Notes->Visible) { // Notes ?>
	<div id="r_Notes" class="form-group row">
		<label for="x_Notes" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Notes"><?php echo $view_appointment_scheduler_new->Notes->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Notes" id="z_Notes" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler_new->Notes->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_Notes">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_Notes" name="x_Notes" id="x_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->Notes->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->Notes->EditValue ?>"<?php echo $view_appointment_scheduler_new->Notes->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_appointment_scheduler_new_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_appointment_scheduler_new_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_appointment_scheduler_new_search->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_appointment_scheduler_new_search->terminate();
?>