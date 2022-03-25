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
$employee_delete = new employee_delete();

// Run the page
$employee_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployeedelete = currentForm = new ew.Form("femployeedelete", "delete");

// Form_CustomValidate event
femployeedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployeedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployeedelete.lists["x_gender"] = <?php echo $employee_delete->gender->Lookup->toClientList() ?>;
femployeedelete.lists["x_gender"].options = <?php echo JsonEncode($employee_delete->gender->lookupOptions()) ?>;
femployeedelete.lists["x_nationality"] = <?php echo $employee_delete->nationality->Lookup->toClientList() ?>;
femployeedelete.lists["x_nationality"].options = <?php echo JsonEncode($employee_delete->nationality->lookupOptions()) ?>;
femployeedelete.lists["x_marital_status"] = <?php echo $employee_delete->marital_status->Lookup->toClientList() ?>;
femployeedelete.lists["x_marital_status"].options = <?php echo JsonEncode($employee_delete->marital_status->options(FALSE, TRUE)) ?>;
femployeedelete.lists["x_approver1"] = <?php echo $employee_delete->approver1->Lookup->toClientList() ?>;
femployeedelete.lists["x_approver1"].options = <?php echo JsonEncode($employee_delete->approver1->lookupOptions()) ?>;
femployeedelete.lists["x_approver2"] = <?php echo $employee_delete->approver2->Lookup->toClientList() ?>;
femployeedelete.lists["x_approver2"].options = <?php echo JsonEncode($employee_delete->approver2->lookupOptions()) ?>;
femployeedelete.lists["x_approver3"] = <?php echo $employee_delete->approver3->Lookup->toClientList() ?>;
femployeedelete.lists["x_approver3"].options = <?php echo JsonEncode($employee_delete->approver3->lookupOptions()) ?>;
femployeedelete.lists["x_status"] = <?php echo $employee_delete->status->Lookup->toClientList() ?>;
femployeedelete.lists["x_status"].options = <?php echo JsonEncode($employee_delete->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_delete->showPageHeader(); ?>
<?php
$employee_delete->showMessage();
?>
<form name="femployeedelete" id="femployeedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee->id->Visible) { // id ?>
		<th class="<?php echo $employee->id->headerCellClass() ?>"><span id="elh_employee_id" class="employee_id"><?php echo $employee->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee->employee_id->Visible) { // employee_id ?>
		<th class="<?php echo $employee->employee_id->headerCellClass() ?>"><span id="elh_employee_employee_id" class="employee_employee_id"><?php echo $employee->employee_id->caption() ?></span></th>
<?php } ?>
<?php if ($employee->first_name->Visible) { // first_name ?>
		<th class="<?php echo $employee->first_name->headerCellClass() ?>"><span id="elh_employee_first_name" class="employee_first_name"><?php echo $employee->first_name->caption() ?></span></th>
<?php } ?>
<?php if ($employee->middle_name->Visible) { // middle_name ?>
		<th class="<?php echo $employee->middle_name->headerCellClass() ?>"><span id="elh_employee_middle_name" class="employee_middle_name"><?php echo $employee->middle_name->caption() ?></span></th>
<?php } ?>
<?php if ($employee->last_name->Visible) { // last_name ?>
		<th class="<?php echo $employee->last_name->headerCellClass() ?>"><span id="elh_employee_last_name" class="employee_last_name"><?php echo $employee->last_name->caption() ?></span></th>
<?php } ?>
<?php if ($employee->gender->Visible) { // gender ?>
		<th class="<?php echo $employee->gender->headerCellClass() ?>"><span id="elh_employee_gender" class="employee_gender"><?php echo $employee->gender->caption() ?></span></th>
<?php } ?>
<?php if ($employee->nationality->Visible) { // nationality ?>
		<th class="<?php echo $employee->nationality->headerCellClass() ?>"><span id="elh_employee_nationality" class="employee_nationality"><?php echo $employee->nationality->caption() ?></span></th>
<?php } ?>
<?php if ($employee->birthday->Visible) { // birthday ?>
		<th class="<?php echo $employee->birthday->headerCellClass() ?>"><span id="elh_employee_birthday" class="employee_birthday"><?php echo $employee->birthday->caption() ?></span></th>
<?php } ?>
<?php if ($employee->marital_status->Visible) { // marital_status ?>
		<th class="<?php echo $employee->marital_status->headerCellClass() ?>"><span id="elh_employee_marital_status" class="employee_marital_status"><?php echo $employee->marital_status->caption() ?></span></th>
<?php } ?>
<?php if ($employee->ssn_num->Visible) { // ssn_num ?>
		<th class="<?php echo $employee->ssn_num->headerCellClass() ?>"><span id="elh_employee_ssn_num" class="employee_ssn_num"><?php echo $employee->ssn_num->caption() ?></span></th>
<?php } ?>
<?php if ($employee->nic_num->Visible) { // nic_num ?>
		<th class="<?php echo $employee->nic_num->headerCellClass() ?>"><span id="elh_employee_nic_num" class="employee_nic_num"><?php echo $employee->nic_num->caption() ?></span></th>
<?php } ?>
<?php if ($employee->other_id->Visible) { // other_id ?>
		<th class="<?php echo $employee->other_id->headerCellClass() ?>"><span id="elh_employee_other_id" class="employee_other_id"><?php echo $employee->other_id->caption() ?></span></th>
<?php } ?>
<?php if ($employee->driving_license->Visible) { // driving_license ?>
		<th class="<?php echo $employee->driving_license->headerCellClass() ?>"><span id="elh_employee_driving_license" class="employee_driving_license"><?php echo $employee->driving_license->caption() ?></span></th>
<?php } ?>
<?php if ($employee->driving_license_exp_date->Visible) { // driving_license_exp_date ?>
		<th class="<?php echo $employee->driving_license_exp_date->headerCellClass() ?>"><span id="elh_employee_driving_license_exp_date" class="employee_driving_license_exp_date"><?php echo $employee->driving_license_exp_date->caption() ?></span></th>
<?php } ?>
<?php if ($employee->employment_status->Visible) { // employment_status ?>
		<th class="<?php echo $employee->employment_status->headerCellClass() ?>"><span id="elh_employee_employment_status" class="employee_employment_status"><?php echo $employee->employment_status->caption() ?></span></th>
<?php } ?>
<?php if ($employee->job_title->Visible) { // job_title ?>
		<th class="<?php echo $employee->job_title->headerCellClass() ?>"><span id="elh_employee_job_title" class="employee_job_title"><?php echo $employee->job_title->caption() ?></span></th>
<?php } ?>
<?php if ($employee->pay_grade->Visible) { // pay_grade ?>
		<th class="<?php echo $employee->pay_grade->headerCellClass() ?>"><span id="elh_employee_pay_grade" class="employee_pay_grade"><?php echo $employee->pay_grade->caption() ?></span></th>
<?php } ?>
<?php if ($employee->work_station_id->Visible) { // work_station_id ?>
		<th class="<?php echo $employee->work_station_id->headerCellClass() ?>"><span id="elh_employee_work_station_id" class="employee_work_station_id"><?php echo $employee->work_station_id->caption() ?></span></th>
<?php } ?>
<?php if ($employee->address1->Visible) { // address1 ?>
		<th class="<?php echo $employee->address1->headerCellClass() ?>"><span id="elh_employee_address1" class="employee_address1"><?php echo $employee->address1->caption() ?></span></th>
<?php } ?>
<?php if ($employee->address2->Visible) { // address2 ?>
		<th class="<?php echo $employee->address2->headerCellClass() ?>"><span id="elh_employee_address2" class="employee_address2"><?php echo $employee->address2->caption() ?></span></th>
<?php } ?>
<?php if ($employee->city->Visible) { // city ?>
		<th class="<?php echo $employee->city->headerCellClass() ?>"><span id="elh_employee_city" class="employee_city"><?php echo $employee->city->caption() ?></span></th>
<?php } ?>
<?php if ($employee->country->Visible) { // country ?>
		<th class="<?php echo $employee->country->headerCellClass() ?>"><span id="elh_employee_country" class="employee_country"><?php echo $employee->country->caption() ?></span></th>
<?php } ?>
<?php if ($employee->province->Visible) { // province ?>
		<th class="<?php echo $employee->province->headerCellClass() ?>"><span id="elh_employee_province" class="employee_province"><?php echo $employee->province->caption() ?></span></th>
<?php } ?>
<?php if ($employee->postal_code->Visible) { // postal_code ?>
		<th class="<?php echo $employee->postal_code->headerCellClass() ?>"><span id="elh_employee_postal_code" class="employee_postal_code"><?php echo $employee->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($employee->home_phone->Visible) { // home_phone ?>
		<th class="<?php echo $employee->home_phone->headerCellClass() ?>"><span id="elh_employee_home_phone" class="employee_home_phone"><?php echo $employee->home_phone->caption() ?></span></th>
<?php } ?>
<?php if ($employee->mobile_phone->Visible) { // mobile_phone ?>
		<th class="<?php echo $employee->mobile_phone->headerCellClass() ?>"><span id="elh_employee_mobile_phone" class="employee_mobile_phone"><?php echo $employee->mobile_phone->caption() ?></span></th>
<?php } ?>
<?php if ($employee->work_phone->Visible) { // work_phone ?>
		<th class="<?php echo $employee->work_phone->headerCellClass() ?>"><span id="elh_employee_work_phone" class="employee_work_phone"><?php echo $employee->work_phone->caption() ?></span></th>
<?php } ?>
<?php if ($employee->work_email->Visible) { // work_email ?>
		<th class="<?php echo $employee->work_email->headerCellClass() ?>"><span id="elh_employee_work_email" class="employee_work_email"><?php echo $employee->work_email->caption() ?></span></th>
<?php } ?>
<?php if ($employee->private_email->Visible) { // private_email ?>
		<th class="<?php echo $employee->private_email->headerCellClass() ?>"><span id="elh_employee_private_email" class="employee_private_email"><?php echo $employee->private_email->caption() ?></span></th>
<?php } ?>
<?php if ($employee->joined_date->Visible) { // joined_date ?>
		<th class="<?php echo $employee->joined_date->headerCellClass() ?>"><span id="elh_employee_joined_date" class="employee_joined_date"><?php echo $employee->joined_date->caption() ?></span></th>
<?php } ?>
<?php if ($employee->confirmation_date->Visible) { // confirmation_date ?>
		<th class="<?php echo $employee->confirmation_date->headerCellClass() ?>"><span id="elh_employee_confirmation_date" class="employee_confirmation_date"><?php echo $employee->confirmation_date->caption() ?></span></th>
<?php } ?>
<?php if ($employee->supervisor->Visible) { // supervisor ?>
		<th class="<?php echo $employee->supervisor->headerCellClass() ?>"><span id="elh_employee_supervisor" class="employee_supervisor"><?php echo $employee->supervisor->caption() ?></span></th>
<?php } ?>
<?php if ($employee->indirect_supervisors->Visible) { // indirect_supervisors ?>
		<th class="<?php echo $employee->indirect_supervisors->headerCellClass() ?>"><span id="elh_employee_indirect_supervisors" class="employee_indirect_supervisors"><?php echo $employee->indirect_supervisors->caption() ?></span></th>
<?php } ?>
<?php if ($employee->department->Visible) { // department ?>
		<th class="<?php echo $employee->department->headerCellClass() ?>"><span id="elh_employee_department" class="employee_department"><?php echo $employee->department->caption() ?></span></th>
<?php } ?>
<?php if ($employee->custom1->Visible) { // custom1 ?>
		<th class="<?php echo $employee->custom1->headerCellClass() ?>"><span id="elh_employee_custom1" class="employee_custom1"><?php echo $employee->custom1->caption() ?></span></th>
<?php } ?>
<?php if ($employee->custom2->Visible) { // custom2 ?>
		<th class="<?php echo $employee->custom2->headerCellClass() ?>"><span id="elh_employee_custom2" class="employee_custom2"><?php echo $employee->custom2->caption() ?></span></th>
<?php } ?>
<?php if ($employee->custom3->Visible) { // custom3 ?>
		<th class="<?php echo $employee->custom3->headerCellClass() ?>"><span id="elh_employee_custom3" class="employee_custom3"><?php echo $employee->custom3->caption() ?></span></th>
<?php } ?>
<?php if ($employee->custom4->Visible) { // custom4 ?>
		<th class="<?php echo $employee->custom4->headerCellClass() ?>"><span id="elh_employee_custom4" class="employee_custom4"><?php echo $employee->custom4->caption() ?></span></th>
<?php } ?>
<?php if ($employee->custom5->Visible) { // custom5 ?>
		<th class="<?php echo $employee->custom5->headerCellClass() ?>"><span id="elh_employee_custom5" class="employee_custom5"><?php echo $employee->custom5->caption() ?></span></th>
<?php } ?>
<?php if ($employee->custom6->Visible) { // custom6 ?>
		<th class="<?php echo $employee->custom6->headerCellClass() ?>"><span id="elh_employee_custom6" class="employee_custom6"><?php echo $employee->custom6->caption() ?></span></th>
<?php } ?>
<?php if ($employee->custom7->Visible) { // custom7 ?>
		<th class="<?php echo $employee->custom7->headerCellClass() ?>"><span id="elh_employee_custom7" class="employee_custom7"><?php echo $employee->custom7->caption() ?></span></th>
<?php } ?>
<?php if ($employee->custom8->Visible) { // custom8 ?>
		<th class="<?php echo $employee->custom8->headerCellClass() ?>"><span id="elh_employee_custom8" class="employee_custom8"><?php echo $employee->custom8->caption() ?></span></th>
<?php } ?>
<?php if ($employee->custom9->Visible) { // custom9 ?>
		<th class="<?php echo $employee->custom9->headerCellClass() ?>"><span id="elh_employee_custom9" class="employee_custom9"><?php echo $employee->custom9->caption() ?></span></th>
<?php } ?>
<?php if ($employee->custom10->Visible) { // custom10 ?>
		<th class="<?php echo $employee->custom10->headerCellClass() ?>"><span id="elh_employee_custom10" class="employee_custom10"><?php echo $employee->custom10->caption() ?></span></th>
<?php } ?>
<?php if ($employee->termination_date->Visible) { // termination_date ?>
		<th class="<?php echo $employee->termination_date->headerCellClass() ?>"><span id="elh_employee_termination_date" class="employee_termination_date"><?php echo $employee->termination_date->caption() ?></span></th>
<?php } ?>
<?php if ($employee->ethnicity->Visible) { // ethnicity ?>
		<th class="<?php echo $employee->ethnicity->headerCellClass() ?>"><span id="elh_employee_ethnicity" class="employee_ethnicity"><?php echo $employee->ethnicity->caption() ?></span></th>
<?php } ?>
<?php if ($employee->immigration_status->Visible) { // immigration_status ?>
		<th class="<?php echo $employee->immigration_status->headerCellClass() ?>"><span id="elh_employee_immigration_status" class="employee_immigration_status"><?php echo $employee->immigration_status->caption() ?></span></th>
<?php } ?>
<?php if ($employee->approver1->Visible) { // approver1 ?>
		<th class="<?php echo $employee->approver1->headerCellClass() ?>"><span id="elh_employee_approver1" class="employee_approver1"><?php echo $employee->approver1->caption() ?></span></th>
<?php } ?>
<?php if ($employee->approver2->Visible) { // approver2 ?>
		<th class="<?php echo $employee->approver2->headerCellClass() ?>"><span id="elh_employee_approver2" class="employee_approver2"><?php echo $employee->approver2->caption() ?></span></th>
<?php } ?>
<?php if ($employee->approver3->Visible) { // approver3 ?>
		<th class="<?php echo $employee->approver3->headerCellClass() ?>"><span id="elh_employee_approver3" class="employee_approver3"><?php echo $employee->approver3->caption() ?></span></th>
<?php } ?>
<?php if ($employee->status->Visible) { // status ?>
		<th class="<?php echo $employee->status->headerCellClass() ?>"><span id="elh_employee_status" class="employee_status"><?php echo $employee->status->caption() ?></span></th>
<?php } ?>
<?php if ($employee->HospID->Visible) { // HospID ?>
		<th class="<?php echo $employee->HospID->headerCellClass() ?>"><span id="elh_employee_HospID" class="employee_HospID"><?php echo $employee->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_delete->RecCnt = 0;
$i = 0;
while (!$employee_delete->Recordset->EOF) {
	$employee_delete->RecCnt++;
	$employee_delete->RowCnt++;

	// Set row properties
	$employee->resetAttributes();
	$employee->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_delete->loadRowValues($employee_delete->Recordset);

	// Render row
	$employee_delete->renderRow();
?>
	<tr<?php echo $employee->rowAttributes() ?>>
<?php if ($employee->id->Visible) { // id ?>
		<td<?php echo $employee->id->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_id" class="employee_id">
<span<?php echo $employee->id->viewAttributes() ?>>
<?php echo $employee->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->employee_id->Visible) { // employee_id ?>
		<td<?php echo $employee->employee_id->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_employee_id" class="employee_employee_id">
<span<?php echo $employee->employee_id->viewAttributes() ?>>
<?php echo $employee->employee_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->first_name->Visible) { // first_name ?>
		<td<?php echo $employee->first_name->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_first_name" class="employee_first_name">
<span<?php echo $employee->first_name->viewAttributes() ?>>
<?php echo $employee->first_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->middle_name->Visible) { // middle_name ?>
		<td<?php echo $employee->middle_name->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_middle_name" class="employee_middle_name">
<span<?php echo $employee->middle_name->viewAttributes() ?>>
<?php echo $employee->middle_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->last_name->Visible) { // last_name ?>
		<td<?php echo $employee->last_name->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_last_name" class="employee_last_name">
<span<?php echo $employee->last_name->viewAttributes() ?>>
<?php echo $employee->last_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->gender->Visible) { // gender ?>
		<td<?php echo $employee->gender->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_gender" class="employee_gender">
<span<?php echo $employee->gender->viewAttributes() ?>>
<?php echo $employee->gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->nationality->Visible) { // nationality ?>
		<td<?php echo $employee->nationality->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_nationality" class="employee_nationality">
<span<?php echo $employee->nationality->viewAttributes() ?>>
<?php echo $employee->nationality->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->birthday->Visible) { // birthday ?>
		<td<?php echo $employee->birthday->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_birthday" class="employee_birthday">
<span<?php echo $employee->birthday->viewAttributes() ?>>
<?php echo $employee->birthday->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->marital_status->Visible) { // marital_status ?>
		<td<?php echo $employee->marital_status->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_marital_status" class="employee_marital_status">
<span<?php echo $employee->marital_status->viewAttributes() ?>>
<?php echo $employee->marital_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->ssn_num->Visible) { // ssn_num ?>
		<td<?php echo $employee->ssn_num->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_ssn_num" class="employee_ssn_num">
<span<?php echo $employee->ssn_num->viewAttributes() ?>>
<?php echo $employee->ssn_num->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->nic_num->Visible) { // nic_num ?>
		<td<?php echo $employee->nic_num->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_nic_num" class="employee_nic_num">
<span<?php echo $employee->nic_num->viewAttributes() ?>>
<?php echo $employee->nic_num->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->other_id->Visible) { // other_id ?>
		<td<?php echo $employee->other_id->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_other_id" class="employee_other_id">
<span<?php echo $employee->other_id->viewAttributes() ?>>
<?php echo $employee->other_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->driving_license->Visible) { // driving_license ?>
		<td<?php echo $employee->driving_license->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_driving_license" class="employee_driving_license">
<span<?php echo $employee->driving_license->viewAttributes() ?>>
<?php echo $employee->driving_license->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->driving_license_exp_date->Visible) { // driving_license_exp_date ?>
		<td<?php echo $employee->driving_license_exp_date->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_driving_license_exp_date" class="employee_driving_license_exp_date">
<span<?php echo $employee->driving_license_exp_date->viewAttributes() ?>>
<?php echo $employee->driving_license_exp_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->employment_status->Visible) { // employment_status ?>
		<td<?php echo $employee->employment_status->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_employment_status" class="employee_employment_status">
<span<?php echo $employee->employment_status->viewAttributes() ?>>
<?php echo $employee->employment_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->job_title->Visible) { // job_title ?>
		<td<?php echo $employee->job_title->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_job_title" class="employee_job_title">
<span<?php echo $employee->job_title->viewAttributes() ?>>
<?php echo $employee->job_title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->pay_grade->Visible) { // pay_grade ?>
		<td<?php echo $employee->pay_grade->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_pay_grade" class="employee_pay_grade">
<span<?php echo $employee->pay_grade->viewAttributes() ?>>
<?php echo $employee->pay_grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->work_station_id->Visible) { // work_station_id ?>
		<td<?php echo $employee->work_station_id->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_work_station_id" class="employee_work_station_id">
<span<?php echo $employee->work_station_id->viewAttributes() ?>>
<?php echo $employee->work_station_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->address1->Visible) { // address1 ?>
		<td<?php echo $employee->address1->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_address1" class="employee_address1">
<span<?php echo $employee->address1->viewAttributes() ?>>
<?php echo $employee->address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->address2->Visible) { // address2 ?>
		<td<?php echo $employee->address2->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_address2" class="employee_address2">
<span<?php echo $employee->address2->viewAttributes() ?>>
<?php echo $employee->address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->city->Visible) { // city ?>
		<td<?php echo $employee->city->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_city" class="employee_city">
<span<?php echo $employee->city->viewAttributes() ?>>
<?php echo $employee->city->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->country->Visible) { // country ?>
		<td<?php echo $employee->country->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_country" class="employee_country">
<span<?php echo $employee->country->viewAttributes() ?>>
<?php echo $employee->country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->province->Visible) { // province ?>
		<td<?php echo $employee->province->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_province" class="employee_province">
<span<?php echo $employee->province->viewAttributes() ?>>
<?php echo $employee->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->postal_code->Visible) { // postal_code ?>
		<td<?php echo $employee->postal_code->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_postal_code" class="employee_postal_code">
<span<?php echo $employee->postal_code->viewAttributes() ?>>
<?php echo $employee->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->home_phone->Visible) { // home_phone ?>
		<td<?php echo $employee->home_phone->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_home_phone" class="employee_home_phone">
<span<?php echo $employee->home_phone->viewAttributes() ?>>
<?php echo $employee->home_phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->mobile_phone->Visible) { // mobile_phone ?>
		<td<?php echo $employee->mobile_phone->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_mobile_phone" class="employee_mobile_phone">
<span<?php echo $employee->mobile_phone->viewAttributes() ?>>
<?php echo $employee->mobile_phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->work_phone->Visible) { // work_phone ?>
		<td<?php echo $employee->work_phone->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_work_phone" class="employee_work_phone">
<span<?php echo $employee->work_phone->viewAttributes() ?>>
<?php echo $employee->work_phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->work_email->Visible) { // work_email ?>
		<td<?php echo $employee->work_email->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_work_email" class="employee_work_email">
<span<?php echo $employee->work_email->viewAttributes() ?>>
<?php echo $employee->work_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->private_email->Visible) { // private_email ?>
		<td<?php echo $employee->private_email->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_private_email" class="employee_private_email">
<span<?php echo $employee->private_email->viewAttributes() ?>>
<?php echo $employee->private_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->joined_date->Visible) { // joined_date ?>
		<td<?php echo $employee->joined_date->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_joined_date" class="employee_joined_date">
<span<?php echo $employee->joined_date->viewAttributes() ?>>
<?php echo $employee->joined_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->confirmation_date->Visible) { // confirmation_date ?>
		<td<?php echo $employee->confirmation_date->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_confirmation_date" class="employee_confirmation_date">
<span<?php echo $employee->confirmation_date->viewAttributes() ?>>
<?php echo $employee->confirmation_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->supervisor->Visible) { // supervisor ?>
		<td<?php echo $employee->supervisor->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_supervisor" class="employee_supervisor">
<span<?php echo $employee->supervisor->viewAttributes() ?>>
<?php echo $employee->supervisor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->indirect_supervisors->Visible) { // indirect_supervisors ?>
		<td<?php echo $employee->indirect_supervisors->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_indirect_supervisors" class="employee_indirect_supervisors">
<span<?php echo $employee->indirect_supervisors->viewAttributes() ?>>
<?php echo $employee->indirect_supervisors->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->department->Visible) { // department ?>
		<td<?php echo $employee->department->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_department" class="employee_department">
<span<?php echo $employee->department->viewAttributes() ?>>
<?php echo $employee->department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->custom1->Visible) { // custom1 ?>
		<td<?php echo $employee->custom1->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_custom1" class="employee_custom1">
<span<?php echo $employee->custom1->viewAttributes() ?>>
<?php echo $employee->custom1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->custom2->Visible) { // custom2 ?>
		<td<?php echo $employee->custom2->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_custom2" class="employee_custom2">
<span<?php echo $employee->custom2->viewAttributes() ?>>
<?php echo $employee->custom2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->custom3->Visible) { // custom3 ?>
		<td<?php echo $employee->custom3->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_custom3" class="employee_custom3">
<span<?php echo $employee->custom3->viewAttributes() ?>>
<?php echo $employee->custom3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->custom4->Visible) { // custom4 ?>
		<td<?php echo $employee->custom4->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_custom4" class="employee_custom4">
<span<?php echo $employee->custom4->viewAttributes() ?>>
<?php echo $employee->custom4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->custom5->Visible) { // custom5 ?>
		<td<?php echo $employee->custom5->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_custom5" class="employee_custom5">
<span<?php echo $employee->custom5->viewAttributes() ?>>
<?php echo $employee->custom5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->custom6->Visible) { // custom6 ?>
		<td<?php echo $employee->custom6->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_custom6" class="employee_custom6">
<span<?php echo $employee->custom6->viewAttributes() ?>>
<?php echo $employee->custom6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->custom7->Visible) { // custom7 ?>
		<td<?php echo $employee->custom7->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_custom7" class="employee_custom7">
<span<?php echo $employee->custom7->viewAttributes() ?>>
<?php echo $employee->custom7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->custom8->Visible) { // custom8 ?>
		<td<?php echo $employee->custom8->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_custom8" class="employee_custom8">
<span<?php echo $employee->custom8->viewAttributes() ?>>
<?php echo $employee->custom8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->custom9->Visible) { // custom9 ?>
		<td<?php echo $employee->custom9->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_custom9" class="employee_custom9">
<span<?php echo $employee->custom9->viewAttributes() ?>>
<?php echo $employee->custom9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->custom10->Visible) { // custom10 ?>
		<td<?php echo $employee->custom10->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_custom10" class="employee_custom10">
<span<?php echo $employee->custom10->viewAttributes() ?>>
<?php echo $employee->custom10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->termination_date->Visible) { // termination_date ?>
		<td<?php echo $employee->termination_date->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_termination_date" class="employee_termination_date">
<span<?php echo $employee->termination_date->viewAttributes() ?>>
<?php echo $employee->termination_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->ethnicity->Visible) { // ethnicity ?>
		<td<?php echo $employee->ethnicity->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_ethnicity" class="employee_ethnicity">
<span<?php echo $employee->ethnicity->viewAttributes() ?>>
<?php echo $employee->ethnicity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->immigration_status->Visible) { // immigration_status ?>
		<td<?php echo $employee->immigration_status->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_immigration_status" class="employee_immigration_status">
<span<?php echo $employee->immigration_status->viewAttributes() ?>>
<?php echo $employee->immigration_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->approver1->Visible) { // approver1 ?>
		<td<?php echo $employee->approver1->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_approver1" class="employee_approver1">
<span<?php echo $employee->approver1->viewAttributes() ?>>
<?php echo $employee->approver1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->approver2->Visible) { // approver2 ?>
		<td<?php echo $employee->approver2->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_approver2" class="employee_approver2">
<span<?php echo $employee->approver2->viewAttributes() ?>>
<?php echo $employee->approver2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->approver3->Visible) { // approver3 ?>
		<td<?php echo $employee->approver3->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_approver3" class="employee_approver3">
<span<?php echo $employee->approver3->viewAttributes() ?>>
<?php echo $employee->approver3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->status->Visible) { // status ?>
		<td<?php echo $employee->status->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_status" class="employee_status">
<span<?php echo $employee->status->viewAttributes() ?>>
<?php echo $employee->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee->HospID->Visible) { // HospID ?>
		<td<?php echo $employee->HospID->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCnt ?>_employee_HospID" class="employee_HospID">
<span<?php echo $employee->HospID->viewAttributes() ?>>
<?php echo $employee->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_delete->Recordset->moveNext();
}
$employee_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_delete->terminate();
?>