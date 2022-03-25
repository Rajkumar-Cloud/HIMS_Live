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
$employee_edit = new employee_edit();

// Run the page
$employee_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var femployeeedit = currentForm = new ew.Form("femployeeedit", "edit");

// Validate form
femployeeedit.validate = function() {
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
		<?php if ($employee_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->id->caption(), $employee->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->employee_id->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->employee_id->caption(), $employee->employee_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->first_name->Required) { ?>
			elm = this.getElements("x" + infix + "_first_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->first_name->caption(), $employee->first_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->middle_name->Required) { ?>
			elm = this.getElements("x" + infix + "_middle_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->middle_name->caption(), $employee->middle_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->last_name->Required) { ?>
			elm = this.getElements("x" + infix + "_last_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->last_name->caption(), $employee->last_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->gender->Required) { ?>
			elm = this.getElements("x" + infix + "_gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->gender->caption(), $employee->gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->nationality->Required) { ?>
			elm = this.getElements("x" + infix + "_nationality");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->nationality->caption(), $employee->nationality->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->birthday->Required) { ?>
			elm = this.getElements("x" + infix + "_birthday");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->birthday->caption(), $employee->birthday->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_birthday");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee->birthday->errorMessage()) ?>");
		<?php if ($employee_edit->marital_status->Required) { ?>
			elm = this.getElements("x" + infix + "_marital_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->marital_status->caption(), $employee->marital_status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->ssn_num->Required) { ?>
			elm = this.getElements("x" + infix + "_ssn_num");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->ssn_num->caption(), $employee->ssn_num->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->nic_num->Required) { ?>
			elm = this.getElements("x" + infix + "_nic_num");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->nic_num->caption(), $employee->nic_num->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->other_id->Required) { ?>
			elm = this.getElements("x" + infix + "_other_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->other_id->caption(), $employee->other_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->driving_license->Required) { ?>
			elm = this.getElements("x" + infix + "_driving_license");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->driving_license->caption(), $employee->driving_license->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->driving_license_exp_date->Required) { ?>
			elm = this.getElements("x" + infix + "_driving_license_exp_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->driving_license_exp_date->caption(), $employee->driving_license_exp_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_driving_license_exp_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee->driving_license_exp_date->errorMessage()) ?>");
		<?php if ($employee_edit->employment_status->Required) { ?>
			elm = this.getElements("x" + infix + "_employment_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->employment_status->caption(), $employee->employment_status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employment_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee->employment_status->errorMessage()) ?>");
		<?php if ($employee_edit->job_title->Required) { ?>
			elm = this.getElements("x" + infix + "_job_title");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->job_title->caption(), $employee->job_title->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_job_title");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee->job_title->errorMessage()) ?>");
		<?php if ($employee_edit->pay_grade->Required) { ?>
			elm = this.getElements("x" + infix + "_pay_grade");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->pay_grade->caption(), $employee->pay_grade->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_pay_grade");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee->pay_grade->errorMessage()) ?>");
		<?php if ($employee_edit->work_station_id->Required) { ?>
			elm = this.getElements("x" + infix + "_work_station_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->work_station_id->caption(), $employee->work_station_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->address1->Required) { ?>
			elm = this.getElements("x" + infix + "_address1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->address1->caption(), $employee->address1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->address2->Required) { ?>
			elm = this.getElements("x" + infix + "_address2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->address2->caption(), $employee->address2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->city->Required) { ?>
			elm = this.getElements("x" + infix + "_city");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->city->caption(), $employee->city->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->country->Required) { ?>
			elm = this.getElements("x" + infix + "_country");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->country->caption(), $employee->country->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->province->Required) { ?>
			elm = this.getElements("x" + infix + "_province");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->province->caption(), $employee->province->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_province");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee->province->errorMessage()) ?>");
		<?php if ($employee_edit->postal_code->Required) { ?>
			elm = this.getElements("x" + infix + "_postal_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->postal_code->caption(), $employee->postal_code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->home_phone->Required) { ?>
			elm = this.getElements("x" + infix + "_home_phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->home_phone->caption(), $employee->home_phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->mobile_phone->Required) { ?>
			elm = this.getElements("x" + infix + "_mobile_phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->mobile_phone->caption(), $employee->mobile_phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->work_phone->Required) { ?>
			elm = this.getElements("x" + infix + "_work_phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->work_phone->caption(), $employee->work_phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->work_email->Required) { ?>
			elm = this.getElements("x" + infix + "_work_email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->work_email->caption(), $employee->work_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->private_email->Required) { ?>
			elm = this.getElements("x" + infix + "_private_email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->private_email->caption(), $employee->private_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->joined_date->Required) { ?>
			elm = this.getElements("x" + infix + "_joined_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->joined_date->caption(), $employee->joined_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_joined_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee->joined_date->errorMessage()) ?>");
		<?php if ($employee_edit->confirmation_date->Required) { ?>
			elm = this.getElements("x" + infix + "_confirmation_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->confirmation_date->caption(), $employee->confirmation_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_confirmation_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee->confirmation_date->errorMessage()) ?>");
		<?php if ($employee_edit->supervisor->Required) { ?>
			elm = this.getElements("x" + infix + "_supervisor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->supervisor->caption(), $employee->supervisor->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_supervisor");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee->supervisor->errorMessage()) ?>");
		<?php if ($employee_edit->indirect_supervisors->Required) { ?>
			elm = this.getElements("x" + infix + "_indirect_supervisors");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->indirect_supervisors->caption(), $employee->indirect_supervisors->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->department->Required) { ?>
			elm = this.getElements("x" + infix + "_department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->department->caption(), $employee->department->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_department");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee->department->errorMessage()) ?>");
		<?php if ($employee_edit->custom1->Required) { ?>
			elm = this.getElements("x" + infix + "_custom1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->custom1->caption(), $employee->custom1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->custom2->Required) { ?>
			elm = this.getElements("x" + infix + "_custom2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->custom2->caption(), $employee->custom2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->custom3->Required) { ?>
			elm = this.getElements("x" + infix + "_custom3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->custom3->caption(), $employee->custom3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->custom4->Required) { ?>
			elm = this.getElements("x" + infix + "_custom4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->custom4->caption(), $employee->custom4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->custom5->Required) { ?>
			elm = this.getElements("x" + infix + "_custom5");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->custom5->caption(), $employee->custom5->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->custom6->Required) { ?>
			elm = this.getElements("x" + infix + "_custom6");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->custom6->caption(), $employee->custom6->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->custom7->Required) { ?>
			elm = this.getElements("x" + infix + "_custom7");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->custom7->caption(), $employee->custom7->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->custom8->Required) { ?>
			elm = this.getElements("x" + infix + "_custom8");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->custom8->caption(), $employee->custom8->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->custom9->Required) { ?>
			elm = this.getElements("x" + infix + "_custom9");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->custom9->caption(), $employee->custom9->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->custom10->Required) { ?>
			elm = this.getElements("x" + infix + "_custom10");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->custom10->caption(), $employee->custom10->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->termination_date->Required) { ?>
			elm = this.getElements("x" + infix + "_termination_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->termination_date->caption(), $employee->termination_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_termination_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee->termination_date->errorMessage()) ?>");
		<?php if ($employee_edit->notes->Required) { ?>
			elm = this.getElements("x" + infix + "_notes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->notes->caption(), $employee->notes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->ethnicity->Required) { ?>
			elm = this.getElements("x" + infix + "_ethnicity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->ethnicity->caption(), $employee->ethnicity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ethnicity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee->ethnicity->errorMessage()) ?>");
		<?php if ($employee_edit->immigration_status->Required) { ?>
			elm = this.getElements("x" + infix + "_immigration_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->immigration_status->caption(), $employee->immigration_status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_immigration_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee->immigration_status->errorMessage()) ?>");
		<?php if ($employee_edit->approver1->Required) { ?>
			elm = this.getElements("x" + infix + "_approver1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->approver1->caption(), $employee->approver1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->approver2->Required) { ?>
			elm = this.getElements("x" + infix + "_approver2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->approver2->caption(), $employee->approver2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->approver3->Required) { ?>
			elm = this.getElements("x" + infix + "_approver3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->approver3->caption(), $employee->approver3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->status->caption(), $employee->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee->HospID->caption(), $employee->HospID->RequiredErrorMessage)) ?>");
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
femployeeedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployeeedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Multi-Page
femployeeedit.multiPage = new ew.MultiPage("femployeeedit");

// Dynamic selection lists
femployeeedit.lists["x_gender"] = <?php echo $employee_edit->gender->Lookup->toClientList() ?>;
femployeeedit.lists["x_gender"].options = <?php echo JsonEncode($employee_edit->gender->lookupOptions()) ?>;
femployeeedit.lists["x_nationality"] = <?php echo $employee_edit->nationality->Lookup->toClientList() ?>;
femployeeedit.lists["x_nationality"].options = <?php echo JsonEncode($employee_edit->nationality->lookupOptions()) ?>;
femployeeedit.lists["x_marital_status"] = <?php echo $employee_edit->marital_status->Lookup->toClientList() ?>;
femployeeedit.lists["x_marital_status"].options = <?php echo JsonEncode($employee_edit->marital_status->options(FALSE, TRUE)) ?>;
femployeeedit.lists["x_approver1"] = <?php echo $employee_edit->approver1->Lookup->toClientList() ?>;
femployeeedit.lists["x_approver1"].options = <?php echo JsonEncode($employee_edit->approver1->lookupOptions()) ?>;
femployeeedit.lists["x_approver2"] = <?php echo $employee_edit->approver2->Lookup->toClientList() ?>;
femployeeedit.lists["x_approver2"].options = <?php echo JsonEncode($employee_edit->approver2->lookupOptions()) ?>;
femployeeedit.lists["x_approver3"] = <?php echo $employee_edit->approver3->Lookup->toClientList() ?>;
femployeeedit.lists["x_approver3"].options = <?php echo JsonEncode($employee_edit->approver3->lookupOptions()) ?>;
femployeeedit.lists["x_status"] = <?php echo $employee_edit->status->Lookup->toClientList() ?>;
femployeeedit.lists["x_status"].options = <?php echo JsonEncode($employee_edit->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_edit->showPageHeader(); ?>
<?php
$employee_edit->showMessage();
?>
<form name="femployeeedit" id="femployeeedit" class="<?php echo $employee_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$employee_edit->IsModal ?>">
<?php if ($employee_edit->MultiPages->Items[0]->Visible) { ?>
<div class="ew-edit-div"><!-- page0 -->
<?php if ($employee->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_employee_id" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->id->caption() ?><?php echo ($employee->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->id->cellAttributes() ?>>
<span id="el_employee_id">
<span<?php echo $employee->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee" data-field="x_id" data-page="0" name="x_id" id="x_id" value="<?php echo HtmlEncode($employee->id->CurrentValue) ?>">
<?php echo $employee->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->employee_id->Visible) { // employee_id ?>
	<div id="r_employee_id" class="form-group row">
		<label id="elh_employee_employee_id" for="x_employee_id" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->employee_id->caption() ?><?php echo ($employee->employee_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->employee_id->cellAttributes() ?>>
<span id="el_employee_employee_id">
<input type="text" data-table="employee" data-field="x_employee_id" data-page="0" name="x_employee_id" id="x_employee_id" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee->employee_id->EditValue ?>"<?php echo $employee->employee_id->editAttributes() ?>>
</span>
<?php echo $employee->employee_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->first_name->Visible) { // first_name ?>
	<div id="r_first_name" class="form-group row">
		<label id="elh_employee_first_name" for="x_first_name" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->first_name->caption() ?><?php echo ($employee->first_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->first_name->cellAttributes() ?>>
<span id="el_employee_first_name">
<input type="text" data-table="employee" data-field="x_first_name" data-page="0" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee->first_name->getPlaceHolder()) ?>" value="<?php echo $employee->first_name->EditValue ?>"<?php echo $employee->first_name->editAttributes() ?>>
</span>
<?php echo $employee->first_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->middle_name->Visible) { // middle_name ?>
	<div id="r_middle_name" class="form-group row">
		<label id="elh_employee_middle_name" for="x_middle_name" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->middle_name->caption() ?><?php echo ($employee->middle_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->middle_name->cellAttributes() ?>>
<span id="el_employee_middle_name">
<input type="text" data-table="employee" data-field="x_middle_name" data-page="0" name="x_middle_name" id="x_middle_name" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($employee->middle_name->getPlaceHolder()) ?>" value="<?php echo $employee->middle_name->EditValue ?>"<?php echo $employee->middle_name->editAttributes() ?>>
</span>
<?php echo $employee->middle_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->last_name->Visible) { // last_name ?>
	<div id="r_last_name" class="form-group row">
		<label id="elh_employee_last_name" for="x_last_name" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->last_name->caption() ?><?php echo ($employee->last_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->last_name->cellAttributes() ?>>
<span id="el_employee_last_name">
<input type="text" data-table="employee" data-field="x_last_name" data-page="0" name="x_last_name" id="x_last_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee->last_name->getPlaceHolder()) ?>" value="<?php echo $employee->last_name->EditValue ?>"<?php echo $employee->last_name->editAttributes() ?>>
</span>
<?php echo $employee->last_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label id="elh_employee_gender" for="x_gender" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->gender->caption() ?><?php echo ($employee->gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->gender->cellAttributes() ?>>
<span id="el_employee_gender">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_gender" data-page="0" data-value-separator="<?php echo $employee->gender->displayValueSeparatorAttribute() ?>" id="x_gender" name="x_gender"<?php echo $employee->gender->editAttributes() ?>>
		<?php echo $employee->gender->selectOptionListHtml("x_gender") ?>
	</select>
</div>
<?php echo $employee->gender->Lookup->getParamTag("p_x_gender") ?>
</span>
<?php echo $employee->gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->nationality->Visible) { // nationality ?>
	<div id="r_nationality" class="form-group row">
		<label id="elh_employee_nationality" for="x_nationality" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->nationality->caption() ?><?php echo ($employee->nationality->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->nationality->cellAttributes() ?>>
<span id="el_employee_nationality">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_nationality"><?php echo strval($employee->nationality->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($employee->nationality->ViewValue) : $employee->nationality->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($employee->nationality->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($employee->nationality->ReadOnly || $employee->nationality->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_nationality',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $employee->nationality->Lookup->getParamTag("p_x_nationality") ?>
<input type="hidden" data-table="employee" data-field="x_nationality" data-page="0" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $employee->nationality->displayValueSeparatorAttribute() ?>" name="x_nationality" id="x_nationality" value="<?php echo $employee->nationality->CurrentValue ?>"<?php echo $employee->nationality->editAttributes() ?>>
</span>
<?php echo $employee->nationality->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->birthday->Visible) { // birthday ?>
	<div id="r_birthday" class="form-group row">
		<label id="elh_employee_birthday" for="x_birthday" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->birthday->caption() ?><?php echo ($employee->birthday->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->birthday->cellAttributes() ?>>
<span id="el_employee_birthday">
<input type="text" data-table="employee" data-field="x_birthday" data-page="0" name="x_birthday" id="x_birthday" placeholder="<?php echo HtmlEncode($employee->birthday->getPlaceHolder()) ?>" value="<?php echo $employee->birthday->EditValue ?>"<?php echo $employee->birthday->editAttributes() ?>>
<?php if (!$employee->birthday->ReadOnly && !$employee->birthday->Disabled && !isset($employee->birthday->EditAttrs["readonly"]) && !isset($employee->birthday->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployeeedit", "x_birthday", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee->birthday->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->marital_status->Visible) { // marital_status ?>
	<div id="r_marital_status" class="form-group row">
		<label id="elh_employee_marital_status" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->marital_status->caption() ?><?php echo ($employee->marital_status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->marital_status->cellAttributes() ?>>
<span id="el_employee_marital_status">
<div id="tp_x_marital_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee" data-field="x_marital_status" data-page="0" data-value-separator="<?php echo $employee->marital_status->displayValueSeparatorAttribute() ?>" name="x_marital_status" id="x_marital_status" value="{value}"<?php echo $employee->marital_status->editAttributes() ?>></div>
<div id="dsl_x_marital_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee->marital_status->radioButtonListHtml(FALSE, "x_marital_status", 0) ?>
</div></div>
</span>
<?php echo $employee->marital_status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page0 -->
<?php } ?>
<div class="ew-multi-page"><!-- multi-page -->
<div class="ew-nav-tabs" id="employee_edit"><!-- multi-page tabs -->
	<ul class="<?php echo $employee_edit->MultiPages->navStyle() ?>">
		<li class="nav-item"><a class="nav-link<?php echo $employee_edit->MultiPages->pageStyle("1") ?>" href="#tab_employee1" data-toggle="tab"><?php echo $employee->pageCaption(1) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $employee_edit->MultiPages->pageStyle("2") ?>" href="#tab_employee2" data-toggle="tab"><?php echo $employee->pageCaption(2) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $employee_edit->MultiPages->pageStyle("3") ?>" href="#tab_employee3" data-toggle="tab"><?php echo $employee->pageCaption(3) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $employee_edit->MultiPages->pageStyle("4") ?>" href="#tab_employee4" data-toggle="tab"><?php echo $employee->pageCaption(4) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $employee_edit->MultiPages->pageStyle("5") ?>" href="#tab_employee5" data-toggle="tab"><?php echo $employee->pageCaption(5) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $employee_edit->MultiPages->pageStyle("6") ?>" href="#tab_employee6" data-toggle="tab"><?php echo $employee->pageCaption(6) ?></a></li>
	</ul>
	<div class="tab-content"><!-- multi-page tabs .tab-content -->
		<div class="tab-pane<?php echo $employee_edit->MultiPages->pageStyle("1") ?>" id="tab_employee1"><!-- multi-page .tab-pane -->
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee->employment_status->Visible) { // employment_status ?>
	<div id="r_employment_status" class="form-group row">
		<label id="elh_employee_employment_status" for="x_employment_status" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->employment_status->caption() ?><?php echo ($employee->employment_status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->employment_status->cellAttributes() ?>>
<span id="el_employee_employment_status">
<input type="text" data-table="employee" data-field="x_employment_status" data-page="1" name="x_employment_status" id="x_employment_status" size="30" placeholder="<?php echo HtmlEncode($employee->employment_status->getPlaceHolder()) ?>" value="<?php echo $employee->employment_status->EditValue ?>"<?php echo $employee->employment_status->editAttributes() ?>>
</span>
<?php echo $employee->employment_status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->job_title->Visible) { // job_title ?>
	<div id="r_job_title" class="form-group row">
		<label id="elh_employee_job_title" for="x_job_title" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->job_title->caption() ?><?php echo ($employee->job_title->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->job_title->cellAttributes() ?>>
<span id="el_employee_job_title">
<input type="text" data-table="employee" data-field="x_job_title" data-page="1" name="x_job_title" id="x_job_title" size="30" placeholder="<?php echo HtmlEncode($employee->job_title->getPlaceHolder()) ?>" value="<?php echo $employee->job_title->EditValue ?>"<?php echo $employee->job_title->editAttributes() ?>>
</span>
<?php echo $employee->job_title->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->pay_grade->Visible) { // pay_grade ?>
	<div id="r_pay_grade" class="form-group row">
		<label id="elh_employee_pay_grade" for="x_pay_grade" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->pay_grade->caption() ?><?php echo ($employee->pay_grade->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->pay_grade->cellAttributes() ?>>
<span id="el_employee_pay_grade">
<input type="text" data-table="employee" data-field="x_pay_grade" data-page="1" name="x_pay_grade" id="x_pay_grade" size="30" placeholder="<?php echo HtmlEncode($employee->pay_grade->getPlaceHolder()) ?>" value="<?php echo $employee->pay_grade->EditValue ?>"<?php echo $employee->pay_grade->editAttributes() ?>>
</span>
<?php echo $employee->pay_grade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->work_station_id->Visible) { // work_station_id ?>
	<div id="r_work_station_id" class="form-group row">
		<label id="elh_employee_work_station_id" for="x_work_station_id" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->work_station_id->caption() ?><?php echo ($employee->work_station_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->work_station_id->cellAttributes() ?>>
<span id="el_employee_work_station_id">
<input type="text" data-table="employee" data-field="x_work_station_id" data-page="1" name="x_work_station_id" id="x_work_station_id" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee->work_station_id->getPlaceHolder()) ?>" value="<?php echo $employee->work_station_id->EditValue ?>"<?php echo $employee->work_station_id->editAttributes() ?>>
</span>
<?php echo $employee->work_station_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->joined_date->Visible) { // joined_date ?>
	<div id="r_joined_date" class="form-group row">
		<label id="elh_employee_joined_date" for="x_joined_date" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->joined_date->caption() ?><?php echo ($employee->joined_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->joined_date->cellAttributes() ?>>
<span id="el_employee_joined_date">
<input type="text" data-table="employee" data-field="x_joined_date" data-page="1" name="x_joined_date" id="x_joined_date" placeholder="<?php echo HtmlEncode($employee->joined_date->getPlaceHolder()) ?>" value="<?php echo $employee->joined_date->EditValue ?>"<?php echo $employee->joined_date->editAttributes() ?>>
<?php if (!$employee->joined_date->ReadOnly && !$employee->joined_date->Disabled && !isset($employee->joined_date->EditAttrs["readonly"]) && !isset($employee->joined_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployeeedit", "x_joined_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee->joined_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->confirmation_date->Visible) { // confirmation_date ?>
	<div id="r_confirmation_date" class="form-group row">
		<label id="elh_employee_confirmation_date" for="x_confirmation_date" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->confirmation_date->caption() ?><?php echo ($employee->confirmation_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->confirmation_date->cellAttributes() ?>>
<span id="el_employee_confirmation_date">
<input type="text" data-table="employee" data-field="x_confirmation_date" data-page="1" name="x_confirmation_date" id="x_confirmation_date" placeholder="<?php echo HtmlEncode($employee->confirmation_date->getPlaceHolder()) ?>" value="<?php echo $employee->confirmation_date->EditValue ?>"<?php echo $employee->confirmation_date->editAttributes() ?>>
<?php if (!$employee->confirmation_date->ReadOnly && !$employee->confirmation_date->Disabled && !isset($employee->confirmation_date->EditAttrs["readonly"]) && !isset($employee->confirmation_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployeeedit", "x_confirmation_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee->confirmation_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->supervisor->Visible) { // supervisor ?>
	<div id="r_supervisor" class="form-group row">
		<label id="elh_employee_supervisor" for="x_supervisor" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->supervisor->caption() ?><?php echo ($employee->supervisor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->supervisor->cellAttributes() ?>>
<span id="el_employee_supervisor">
<input type="text" data-table="employee" data-field="x_supervisor" data-page="1" name="x_supervisor" id="x_supervisor" size="30" placeholder="<?php echo HtmlEncode($employee->supervisor->getPlaceHolder()) ?>" value="<?php echo $employee->supervisor->EditValue ?>"<?php echo $employee->supervisor->editAttributes() ?>>
</span>
<?php echo $employee->supervisor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->indirect_supervisors->Visible) { // indirect_supervisors ?>
	<div id="r_indirect_supervisors" class="form-group row">
		<label id="elh_employee_indirect_supervisors" for="x_indirect_supervisors" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->indirect_supervisors->caption() ?><?php echo ($employee->indirect_supervisors->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->indirect_supervisors->cellAttributes() ?>>
<span id="el_employee_indirect_supervisors">
<input type="text" data-table="employee" data-field="x_indirect_supervisors" data-page="1" name="x_indirect_supervisors" id="x_indirect_supervisors" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($employee->indirect_supervisors->getPlaceHolder()) ?>" value="<?php echo $employee->indirect_supervisors->EditValue ?>"<?php echo $employee->indirect_supervisors->editAttributes() ?>>
</span>
<?php echo $employee->indirect_supervisors->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->department->Visible) { // department ?>
	<div id="r_department" class="form-group row">
		<label id="elh_employee_department" for="x_department" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->department->caption() ?><?php echo ($employee->department->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->department->cellAttributes() ?>>
<span id="el_employee_department">
<input type="text" data-table="employee" data-field="x_department" data-page="1" name="x_department" id="x_department" size="30" placeholder="<?php echo HtmlEncode($employee->department->getPlaceHolder()) ?>" value="<?php echo $employee->department->EditValue ?>"<?php echo $employee->department->editAttributes() ?>>
</span>
<?php echo $employee->department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->termination_date->Visible) { // termination_date ?>
	<div id="r_termination_date" class="form-group row">
		<label id="elh_employee_termination_date" for="x_termination_date" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->termination_date->caption() ?><?php echo ($employee->termination_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->termination_date->cellAttributes() ?>>
<span id="el_employee_termination_date">
<input type="text" data-table="employee" data-field="x_termination_date" data-page="1" name="x_termination_date" id="x_termination_date" placeholder="<?php echo HtmlEncode($employee->termination_date->getPlaceHolder()) ?>" value="<?php echo $employee->termination_date->EditValue ?>"<?php echo $employee->termination_date->editAttributes() ?>>
<?php if (!$employee->termination_date->ReadOnly && !$employee->termination_date->Disabled && !isset($employee->termination_date->EditAttrs["readonly"]) && !isset($employee->termination_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployeeedit", "x_termination_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee->termination_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->ethnicity->Visible) { // ethnicity ?>
	<div id="r_ethnicity" class="form-group row">
		<label id="elh_employee_ethnicity" for="x_ethnicity" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->ethnicity->caption() ?><?php echo ($employee->ethnicity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->ethnicity->cellAttributes() ?>>
<span id="el_employee_ethnicity">
<input type="text" data-table="employee" data-field="x_ethnicity" data-page="1" name="x_ethnicity" id="x_ethnicity" size="30" placeholder="<?php echo HtmlEncode($employee->ethnicity->getPlaceHolder()) ?>" value="<?php echo $employee->ethnicity->EditValue ?>"<?php echo $employee->ethnicity->editAttributes() ?>>
</span>
<?php echo $employee->ethnicity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->immigration_status->Visible) { // immigration_status ?>
	<div id="r_immigration_status" class="form-group row">
		<label id="elh_employee_immigration_status" for="x_immigration_status" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->immigration_status->caption() ?><?php echo ($employee->immigration_status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->immigration_status->cellAttributes() ?>>
<span id="el_employee_immigration_status">
<input type="text" data-table="employee" data-field="x_immigration_status" data-page="1" name="x_immigration_status" id="x_immigration_status" size="30" placeholder="<?php echo HtmlEncode($employee->immigration_status->getPlaceHolder()) ?>" value="<?php echo $employee->immigration_status->EditValue ?>"<?php echo $employee->immigration_status->editAttributes() ?>>
</span>
<?php echo $employee->immigration_status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
		<div class="tab-pane<?php echo $employee_edit->MultiPages->pageStyle("2") ?>" id="tab_employee2"><!-- multi-page .tab-pane -->
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee->ssn_num->Visible) { // ssn_num ?>
	<div id="r_ssn_num" class="form-group row">
		<label id="elh_employee_ssn_num" for="x_ssn_num" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->ssn_num->caption() ?><?php echo ($employee->ssn_num->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->ssn_num->cellAttributes() ?>>
<span id="el_employee_ssn_num">
<input type="text" data-table="employee" data-field="x_ssn_num" data-page="2" name="x_ssn_num" id="x_ssn_num" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee->ssn_num->getPlaceHolder()) ?>" value="<?php echo $employee->ssn_num->EditValue ?>"<?php echo $employee->ssn_num->editAttributes() ?>>
</span>
<?php echo $employee->ssn_num->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->nic_num->Visible) { // nic_num ?>
	<div id="r_nic_num" class="form-group row">
		<label id="elh_employee_nic_num" for="x_nic_num" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->nic_num->caption() ?><?php echo ($employee->nic_num->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->nic_num->cellAttributes() ?>>
<span id="el_employee_nic_num">
<input type="text" data-table="employee" data-field="x_nic_num" data-page="2" name="x_nic_num" id="x_nic_num" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee->nic_num->getPlaceHolder()) ?>" value="<?php echo $employee->nic_num->EditValue ?>"<?php echo $employee->nic_num->editAttributes() ?>>
</span>
<?php echo $employee->nic_num->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->other_id->Visible) { // other_id ?>
	<div id="r_other_id" class="form-group row">
		<label id="elh_employee_other_id" for="x_other_id" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->other_id->caption() ?><?php echo ($employee->other_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->other_id->cellAttributes() ?>>
<span id="el_employee_other_id">
<input type="text" data-table="employee" data-field="x_other_id" data-page="2" name="x_other_id" id="x_other_id" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee->other_id->getPlaceHolder()) ?>" value="<?php echo $employee->other_id->EditValue ?>"<?php echo $employee->other_id->editAttributes() ?>>
</span>
<?php echo $employee->other_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->driving_license->Visible) { // driving_license ?>
	<div id="r_driving_license" class="form-group row">
		<label id="elh_employee_driving_license" for="x_driving_license" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->driving_license->caption() ?><?php echo ($employee->driving_license->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->driving_license->cellAttributes() ?>>
<span id="el_employee_driving_license">
<input type="text" data-table="employee" data-field="x_driving_license" data-page="2" name="x_driving_license" id="x_driving_license" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee->driving_license->getPlaceHolder()) ?>" value="<?php echo $employee->driving_license->EditValue ?>"<?php echo $employee->driving_license->editAttributes() ?>>
</span>
<?php echo $employee->driving_license->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->driving_license_exp_date->Visible) { // driving_license_exp_date ?>
	<div id="r_driving_license_exp_date" class="form-group row">
		<label id="elh_employee_driving_license_exp_date" for="x_driving_license_exp_date" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->driving_license_exp_date->caption() ?><?php echo ($employee->driving_license_exp_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->driving_license_exp_date->cellAttributes() ?>>
<span id="el_employee_driving_license_exp_date">
<input type="text" data-table="employee" data-field="x_driving_license_exp_date" data-page="2" name="x_driving_license_exp_date" id="x_driving_license_exp_date" placeholder="<?php echo HtmlEncode($employee->driving_license_exp_date->getPlaceHolder()) ?>" value="<?php echo $employee->driving_license_exp_date->EditValue ?>"<?php echo $employee->driving_license_exp_date->editAttributes() ?>>
<?php if (!$employee->driving_license_exp_date->ReadOnly && !$employee->driving_license_exp_date->Disabled && !isset($employee->driving_license_exp_date->EditAttrs["readonly"]) && !isset($employee->driving_license_exp_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployeeedit", "x_driving_license_exp_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $employee->driving_license_exp_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
		<div class="tab-pane<?php echo $employee_edit->MultiPages->pageStyle("3") ?>" id="tab_employee3"><!-- multi-page .tab-pane -->
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee->address1->Visible) { // address1 ?>
	<div id="r_address1" class="form-group row">
		<label id="elh_employee_address1" for="x_address1" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->address1->caption() ?><?php echo ($employee->address1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->address1->cellAttributes() ?>>
<span id="el_employee_address1">
<input type="text" data-table="employee" data-field="x_address1" data-page="3" name="x_address1" id="x_address1" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee->address1->getPlaceHolder()) ?>" value="<?php echo $employee->address1->EditValue ?>"<?php echo $employee->address1->editAttributes() ?>>
</span>
<?php echo $employee->address1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->address2->Visible) { // address2 ?>
	<div id="r_address2" class="form-group row">
		<label id="elh_employee_address2" for="x_address2" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->address2->caption() ?><?php echo ($employee->address2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->address2->cellAttributes() ?>>
<span id="el_employee_address2">
<input type="text" data-table="employee" data-field="x_address2" data-page="3" name="x_address2" id="x_address2" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee->address2->getPlaceHolder()) ?>" value="<?php echo $employee->address2->EditValue ?>"<?php echo $employee->address2->editAttributes() ?>>
</span>
<?php echo $employee->address2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->city->Visible) { // city ?>
	<div id="r_city" class="form-group row">
		<label id="elh_employee_city" for="x_city" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->city->caption() ?><?php echo ($employee->city->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->city->cellAttributes() ?>>
<span id="el_employee_city">
<input type="text" data-table="employee" data-field="x_city" data-page="3" name="x_city" id="x_city" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($employee->city->getPlaceHolder()) ?>" value="<?php echo $employee->city->EditValue ?>"<?php echo $employee->city->editAttributes() ?>>
</span>
<?php echo $employee->city->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->country->Visible) { // country ?>
	<div id="r_country" class="form-group row">
		<label id="elh_employee_country" for="x_country" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->country->caption() ?><?php echo ($employee->country->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->country->cellAttributes() ?>>
<span id="el_employee_country">
<input type="text" data-table="employee" data-field="x_country" data-page="3" name="x_country" id="x_country" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($employee->country->getPlaceHolder()) ?>" value="<?php echo $employee->country->EditValue ?>"<?php echo $employee->country->editAttributes() ?>>
</span>
<?php echo $employee->country->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label id="elh_employee_province" for="x_province" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->province->caption() ?><?php echo ($employee->province->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->province->cellAttributes() ?>>
<span id="el_employee_province">
<input type="text" data-table="employee" data-field="x_province" data-page="3" name="x_province" id="x_province" size="30" placeholder="<?php echo HtmlEncode($employee->province->getPlaceHolder()) ?>" value="<?php echo $employee->province->EditValue ?>"<?php echo $employee->province->editAttributes() ?>>
</span>
<?php echo $employee->province->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label id="elh_employee_postal_code" for="x_postal_code" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->postal_code->caption() ?><?php echo ($employee->postal_code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->postal_code->cellAttributes() ?>>
<span id="el_employee_postal_code">
<input type="text" data-table="employee" data-field="x_postal_code" data-page="3" name="x_postal_code" id="x_postal_code" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($employee->postal_code->getPlaceHolder()) ?>" value="<?php echo $employee->postal_code->EditValue ?>"<?php echo $employee->postal_code->editAttributes() ?>>
</span>
<?php echo $employee->postal_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->home_phone->Visible) { // home_phone ?>
	<div id="r_home_phone" class="form-group row">
		<label id="elh_employee_home_phone" for="x_home_phone" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->home_phone->caption() ?><?php echo ($employee->home_phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->home_phone->cellAttributes() ?>>
<span id="el_employee_home_phone">
<input type="text" data-table="employee" data-field="x_home_phone" data-page="3" name="x_home_phone" id="x_home_phone" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee->home_phone->getPlaceHolder()) ?>" value="<?php echo $employee->home_phone->EditValue ?>"<?php echo $employee->home_phone->editAttributes() ?>>
</span>
<?php echo $employee->home_phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->mobile_phone->Visible) { // mobile_phone ?>
	<div id="r_mobile_phone" class="form-group row">
		<label id="elh_employee_mobile_phone" for="x_mobile_phone" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->mobile_phone->caption() ?><?php echo ($employee->mobile_phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->mobile_phone->cellAttributes() ?>>
<span id="el_employee_mobile_phone">
<input type="text" data-table="employee" data-field="x_mobile_phone" data-page="3" name="x_mobile_phone" id="x_mobile_phone" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee->mobile_phone->getPlaceHolder()) ?>" value="<?php echo $employee->mobile_phone->EditValue ?>"<?php echo $employee->mobile_phone->editAttributes() ?>>
</span>
<?php echo $employee->mobile_phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->work_phone->Visible) { // work_phone ?>
	<div id="r_work_phone" class="form-group row">
		<label id="elh_employee_work_phone" for="x_work_phone" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->work_phone->caption() ?><?php echo ($employee->work_phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->work_phone->cellAttributes() ?>>
<span id="el_employee_work_phone">
<input type="text" data-table="employee" data-field="x_work_phone" data-page="3" name="x_work_phone" id="x_work_phone" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee->work_phone->getPlaceHolder()) ?>" value="<?php echo $employee->work_phone->EditValue ?>"<?php echo $employee->work_phone->editAttributes() ?>>
</span>
<?php echo $employee->work_phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->work_email->Visible) { // work_email ?>
	<div id="r_work_email" class="form-group row">
		<label id="elh_employee_work_email" for="x_work_email" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->work_email->caption() ?><?php echo ($employee->work_email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->work_email->cellAttributes() ?>>
<span id="el_employee_work_email">
<input type="text" data-table="employee" data-field="x_work_email" data-page="3" name="x_work_email" id="x_work_email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee->work_email->getPlaceHolder()) ?>" value="<?php echo $employee->work_email->EditValue ?>"<?php echo $employee->work_email->editAttributes() ?>>
</span>
<?php echo $employee->work_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->private_email->Visible) { // private_email ?>
	<div id="r_private_email" class="form-group row">
		<label id="elh_employee_private_email" for="x_private_email" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->private_email->caption() ?><?php echo ($employee->private_email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->private_email->cellAttributes() ?>>
<span id="el_employee_private_email">
<input type="text" data-table="employee" data-field="x_private_email" data-page="3" name="x_private_email" id="x_private_email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee->private_email->getPlaceHolder()) ?>" value="<?php echo $employee->private_email->EditValue ?>"<?php echo $employee->private_email->editAttributes() ?>>
</span>
<?php echo $employee->private_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
		<div class="tab-pane<?php echo $employee_edit->MultiPages->pageStyle("4") ?>" id="tab_employee4"><!-- multi-page .tab-pane -->
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee->custom1->Visible) { // custom1 ?>
	<div id="r_custom1" class="form-group row">
		<label id="elh_employee_custom1" for="x_custom1" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->custom1->caption() ?><?php echo ($employee->custom1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->custom1->cellAttributes() ?>>
<span id="el_employee_custom1">
<input type="text" data-table="employee" data-field="x_custom1" data-page="4" name="x_custom1" id="x_custom1" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($employee->custom1->getPlaceHolder()) ?>" value="<?php echo $employee->custom1->EditValue ?>"<?php echo $employee->custom1->editAttributes() ?>>
</span>
<?php echo $employee->custom1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->custom2->Visible) { // custom2 ?>
	<div id="r_custom2" class="form-group row">
		<label id="elh_employee_custom2" for="x_custom2" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->custom2->caption() ?><?php echo ($employee->custom2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->custom2->cellAttributes() ?>>
<span id="el_employee_custom2">
<input type="text" data-table="employee" data-field="x_custom2" data-page="4" name="x_custom2" id="x_custom2" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($employee->custom2->getPlaceHolder()) ?>" value="<?php echo $employee->custom2->EditValue ?>"<?php echo $employee->custom2->editAttributes() ?>>
</span>
<?php echo $employee->custom2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->custom3->Visible) { // custom3 ?>
	<div id="r_custom3" class="form-group row">
		<label id="elh_employee_custom3" for="x_custom3" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->custom3->caption() ?><?php echo ($employee->custom3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->custom3->cellAttributes() ?>>
<span id="el_employee_custom3">
<input type="text" data-table="employee" data-field="x_custom3" data-page="4" name="x_custom3" id="x_custom3" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($employee->custom3->getPlaceHolder()) ?>" value="<?php echo $employee->custom3->EditValue ?>"<?php echo $employee->custom3->editAttributes() ?>>
</span>
<?php echo $employee->custom3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->custom4->Visible) { // custom4 ?>
	<div id="r_custom4" class="form-group row">
		<label id="elh_employee_custom4" for="x_custom4" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->custom4->caption() ?><?php echo ($employee->custom4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->custom4->cellAttributes() ?>>
<span id="el_employee_custom4">
<input type="text" data-table="employee" data-field="x_custom4" data-page="4" name="x_custom4" id="x_custom4" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($employee->custom4->getPlaceHolder()) ?>" value="<?php echo $employee->custom4->EditValue ?>"<?php echo $employee->custom4->editAttributes() ?>>
</span>
<?php echo $employee->custom4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->custom5->Visible) { // custom5 ?>
	<div id="r_custom5" class="form-group row">
		<label id="elh_employee_custom5" for="x_custom5" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->custom5->caption() ?><?php echo ($employee->custom5->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->custom5->cellAttributes() ?>>
<span id="el_employee_custom5">
<input type="text" data-table="employee" data-field="x_custom5" data-page="4" name="x_custom5" id="x_custom5" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($employee->custom5->getPlaceHolder()) ?>" value="<?php echo $employee->custom5->EditValue ?>"<?php echo $employee->custom5->editAttributes() ?>>
</span>
<?php echo $employee->custom5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->custom6->Visible) { // custom6 ?>
	<div id="r_custom6" class="form-group row">
		<label id="elh_employee_custom6" for="x_custom6" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->custom6->caption() ?><?php echo ($employee->custom6->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->custom6->cellAttributes() ?>>
<span id="el_employee_custom6">
<input type="text" data-table="employee" data-field="x_custom6" data-page="4" name="x_custom6" id="x_custom6" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($employee->custom6->getPlaceHolder()) ?>" value="<?php echo $employee->custom6->EditValue ?>"<?php echo $employee->custom6->editAttributes() ?>>
</span>
<?php echo $employee->custom6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->custom7->Visible) { // custom7 ?>
	<div id="r_custom7" class="form-group row">
		<label id="elh_employee_custom7" for="x_custom7" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->custom7->caption() ?><?php echo ($employee->custom7->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->custom7->cellAttributes() ?>>
<span id="el_employee_custom7">
<input type="text" data-table="employee" data-field="x_custom7" data-page="4" name="x_custom7" id="x_custom7" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($employee->custom7->getPlaceHolder()) ?>" value="<?php echo $employee->custom7->EditValue ?>"<?php echo $employee->custom7->editAttributes() ?>>
</span>
<?php echo $employee->custom7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->custom8->Visible) { // custom8 ?>
	<div id="r_custom8" class="form-group row">
		<label id="elh_employee_custom8" for="x_custom8" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->custom8->caption() ?><?php echo ($employee->custom8->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->custom8->cellAttributes() ?>>
<span id="el_employee_custom8">
<input type="text" data-table="employee" data-field="x_custom8" data-page="4" name="x_custom8" id="x_custom8" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($employee->custom8->getPlaceHolder()) ?>" value="<?php echo $employee->custom8->EditValue ?>"<?php echo $employee->custom8->editAttributes() ?>>
</span>
<?php echo $employee->custom8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->custom9->Visible) { // custom9 ?>
	<div id="r_custom9" class="form-group row">
		<label id="elh_employee_custom9" for="x_custom9" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->custom9->caption() ?><?php echo ($employee->custom9->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->custom9->cellAttributes() ?>>
<span id="el_employee_custom9">
<input type="text" data-table="employee" data-field="x_custom9" data-page="4" name="x_custom9" id="x_custom9" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($employee->custom9->getPlaceHolder()) ?>" value="<?php echo $employee->custom9->EditValue ?>"<?php echo $employee->custom9->editAttributes() ?>>
</span>
<?php echo $employee->custom9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->custom10->Visible) { // custom10 ?>
	<div id="r_custom10" class="form-group row">
		<label id="elh_employee_custom10" for="x_custom10" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->custom10->caption() ?><?php echo ($employee->custom10->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->custom10->cellAttributes() ?>>
<span id="el_employee_custom10">
<input type="text" data-table="employee" data-field="x_custom10" data-page="4" name="x_custom10" id="x_custom10" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($employee->custom10->getPlaceHolder()) ?>" value="<?php echo $employee->custom10->EditValue ?>"<?php echo $employee->custom10->editAttributes() ?>>
</span>
<?php echo $employee->custom10->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
		<div class="tab-pane<?php echo $employee_edit->MultiPages->pageStyle("5") ?>" id="tab_employee5"><!-- multi-page .tab-pane -->
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee->notes->Visible) { // notes ?>
	<div id="r_notes" class="form-group row">
		<label id="elh_employee_notes" for="x_notes" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->notes->caption() ?><?php echo ($employee->notes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->notes->cellAttributes() ?>>
<span id="el_employee_notes">
<textarea data-table="employee" data-field="x_notes" data-page="5" name="x_notes" id="x_notes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($employee->notes->getPlaceHolder()) ?>"<?php echo $employee->notes->editAttributes() ?>><?php echo $employee->notes->EditValue ?></textarea>
</span>
<?php echo $employee->notes->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
		<div class="tab-pane<?php echo $employee_edit->MultiPages->pageStyle("6") ?>" id="tab_employee6"><!-- multi-page .tab-pane -->
<div class="ew-edit-div"><!-- page* -->
<?php if ($employee->approver1->Visible) { // approver1 ?>
	<div id="r_approver1" class="form-group row">
		<label id="elh_employee_approver1" for="x_approver1" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->approver1->caption() ?><?php echo ($employee->approver1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->approver1->cellAttributes() ?>>
<span id="el_employee_approver1">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_approver1"><?php echo strval($employee->approver1->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($employee->approver1->ViewValue) : $employee->approver1->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($employee->approver1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($employee->approver1->ReadOnly || $employee->approver1->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_approver1',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $employee->approver1->Lookup->getParamTag("p_x_approver1") ?>
<input type="hidden" data-table="employee" data-field="x_approver1" data-page="6" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $employee->approver1->displayValueSeparatorAttribute() ?>" name="x_approver1" id="x_approver1" value="<?php echo $employee->approver1->CurrentValue ?>"<?php echo $employee->approver1->editAttributes() ?>>
</span>
<?php echo $employee->approver1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->approver2->Visible) { // approver2 ?>
	<div id="r_approver2" class="form-group row">
		<label id="elh_employee_approver2" for="x_approver2" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->approver2->caption() ?><?php echo ($employee->approver2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->approver2->cellAttributes() ?>>
<span id="el_employee_approver2">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_approver2"><?php echo strval($employee->approver2->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($employee->approver2->ViewValue) : $employee->approver2->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($employee->approver2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($employee->approver2->ReadOnly || $employee->approver2->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_approver2',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $employee->approver2->Lookup->getParamTag("p_x_approver2") ?>
<input type="hidden" data-table="employee" data-field="x_approver2" data-page="6" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $employee->approver2->displayValueSeparatorAttribute() ?>" name="x_approver2" id="x_approver2" value="<?php echo $employee->approver2->CurrentValue ?>"<?php echo $employee->approver2->editAttributes() ?>>
</span>
<?php echo $employee->approver2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee->approver3->Visible) { // approver3 ?>
	<div id="r_approver3" class="form-group row">
		<label id="elh_employee_approver3" for="x_approver3" class="<?php echo $employee_edit->LeftColumnClass ?>"><?php echo $employee->approver3->caption() ?><?php echo ($employee->approver3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_edit->RightColumnClass ?>"><div<?php echo $employee->approver3->cellAttributes() ?>>
<span id="el_employee_approver3">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_approver3"><?php echo strval($employee->approver3->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($employee->approver3->ViewValue) : $employee->approver3->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($employee->approver3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($employee->approver3->ReadOnly || $employee->approver3->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_approver3',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $employee->approver3->Lookup->getParamTag("p_x_approver3") ?>
<input type="hidden" data-table="employee" data-field="x_approver3" data-page="6" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $employee->approver3->displayValueSeparatorAttribute() ?>" name="x_approver3" id="x_approver3" value="<?php echo $employee->approver3->CurrentValue ?>"<?php echo $employee->approver3->editAttributes() ?>>
</span>
<?php echo $employee->approver3->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
	</div><!-- /multi-page tabs .tab-content -->
</div><!-- /multi-page tabs -->
</div><!-- /multi-page -->
<?php
	if (in_array("employee_address", explode(",", $employee->getCurrentDetailTable())) && $employee_address->DetailEdit) {
?>
<?php if ($employee->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("employee_address", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_addressgrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_telephone", explode(",", $employee->getCurrentDetailTable())) && $employee_telephone->DetailEdit) {
?>
<?php if ($employee->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("employee_telephone", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_telephonegrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_email", explode(",", $employee->getCurrentDetailTable())) && $employee_email->DetailEdit) {
?>
<?php if ($employee->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("employee_email", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_emailgrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_has_degree", explode(",", $employee->getCurrentDetailTable())) && $employee_has_degree->DetailEdit) {
?>
<?php if ($employee->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("employee_has_degree", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_has_degreegrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_has_experience", explode(",", $employee->getCurrentDetailTable())) && $employee_has_experience->DetailEdit) {
?>
<?php if ($employee->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("employee_has_experience", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_has_experiencegrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_document", explode(",", $employee->getCurrentDetailTable())) && $employee_document->DetailEdit) {
?>
<?php if ($employee->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("employee_document", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_documentgrid.php" ?>
<?php } ?>
<?php if (!$employee_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_edit->terminate();
?>