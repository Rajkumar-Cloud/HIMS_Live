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
$employee_view = new employee_view();

// Run the page
$employee_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployeeview = currentForm = new ew.Form("femployeeview", "view");

// Form_CustomValidate event
femployeeview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployeeview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Multi-Page
femployeeview.multiPage = new ew.MultiPage("femployeeview");

// Dynamic selection lists
femployeeview.lists["x_gender"] = <?php echo $employee_view->gender->Lookup->toClientList() ?>;
femployeeview.lists["x_gender"].options = <?php echo JsonEncode($employee_view->gender->lookupOptions()) ?>;
femployeeview.lists["x_nationality"] = <?php echo $employee_view->nationality->Lookup->toClientList() ?>;
femployeeview.lists["x_nationality"].options = <?php echo JsonEncode($employee_view->nationality->lookupOptions()) ?>;
femployeeview.lists["x_marital_status"] = <?php echo $employee_view->marital_status->Lookup->toClientList() ?>;
femployeeview.lists["x_marital_status"].options = <?php echo JsonEncode($employee_view->marital_status->options(FALSE, TRUE)) ?>;
femployeeview.lists["x_approver1"] = <?php echo $employee_view->approver1->Lookup->toClientList() ?>;
femployeeview.lists["x_approver1"].options = <?php echo JsonEncode($employee_view->approver1->lookupOptions()) ?>;
femployeeview.lists["x_approver2"] = <?php echo $employee_view->approver2->Lookup->toClientList() ?>;
femployeeview.lists["x_approver2"].options = <?php echo JsonEncode($employee_view->approver2->lookupOptions()) ?>;
femployeeview.lists["x_approver3"] = <?php echo $employee_view->approver3->Lookup->toClientList() ?>;
femployeeview.lists["x_approver3"].options = <?php echo JsonEncode($employee_view->approver3->lookupOptions()) ?>;
femployeeview.lists["x_status"] = <?php echo $employee_view->status->Lookup->toClientList() ?>;
femployeeview.lists["x_status"].options = <?php echo JsonEncode($employee_view->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_view->ExportOptions->render("body") ?>
<?php $employee_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_view->showPageHeader(); ?>
<?php
$employee_view->showMessage();
?>
<form name="femployeeview" id="femployeeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee">
<input type="hidden" name="modal" value="<?php echo (int)$employee_view->IsModal ?>">
<?php if ($employee_view->MultiPages->Items[0]->Visible) { ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_id"><?php echo $employee->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee->id->cellAttributes() ?>>
<span id="el_employee_id" data-page="0">
<span<?php echo $employee->id->viewAttributes() ?>>
<?php echo $employee->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->employee_id->Visible) { // employee_id ?>
	<tr id="r_employee_id">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_employee_id"><?php echo $employee->employee_id->caption() ?></span></td>
		<td data-name="employee_id"<?php echo $employee->employee_id->cellAttributes() ?>>
<span id="el_employee_employee_id" data-page="0">
<span<?php echo $employee->employee_id->viewAttributes() ?>>
<?php echo $employee->employee_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->first_name->Visible) { // first_name ?>
	<tr id="r_first_name">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_first_name"><?php echo $employee->first_name->caption() ?></span></td>
		<td data-name="first_name"<?php echo $employee->first_name->cellAttributes() ?>>
<span id="el_employee_first_name" data-page="0">
<span<?php echo $employee->first_name->viewAttributes() ?>>
<?php echo $employee->first_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->middle_name->Visible) { // middle_name ?>
	<tr id="r_middle_name">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_middle_name"><?php echo $employee->middle_name->caption() ?></span></td>
		<td data-name="middle_name"<?php echo $employee->middle_name->cellAttributes() ?>>
<span id="el_employee_middle_name" data-page="0">
<span<?php echo $employee->middle_name->viewAttributes() ?>>
<?php echo $employee->middle_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->last_name->Visible) { // last_name ?>
	<tr id="r_last_name">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_last_name"><?php echo $employee->last_name->caption() ?></span></td>
		<td data-name="last_name"<?php echo $employee->last_name->cellAttributes() ?>>
<span id="el_employee_last_name" data-page="0">
<span<?php echo $employee->last_name->viewAttributes() ?>>
<?php echo $employee->last_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->gender->Visible) { // gender ?>
	<tr id="r_gender">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_gender"><?php echo $employee->gender->caption() ?></span></td>
		<td data-name="gender"<?php echo $employee->gender->cellAttributes() ?>>
<span id="el_employee_gender" data-page="0">
<span<?php echo $employee->gender->viewAttributes() ?>>
<?php echo $employee->gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->nationality->Visible) { // nationality ?>
	<tr id="r_nationality">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_nationality"><?php echo $employee->nationality->caption() ?></span></td>
		<td data-name="nationality"<?php echo $employee->nationality->cellAttributes() ?>>
<span id="el_employee_nationality" data-page="0">
<span<?php echo $employee->nationality->viewAttributes() ?>>
<?php echo $employee->nationality->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->birthday->Visible) { // birthday ?>
	<tr id="r_birthday">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_birthday"><?php echo $employee->birthday->caption() ?></span></td>
		<td data-name="birthday"<?php echo $employee->birthday->cellAttributes() ?>>
<span id="el_employee_birthday" data-page="0">
<span<?php echo $employee->birthday->viewAttributes() ?>>
<?php echo $employee->birthday->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->marital_status->Visible) { // marital_status ?>
	<tr id="r_marital_status">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_marital_status"><?php echo $employee->marital_status->caption() ?></span></td>
		<td data-name="marital_status"<?php echo $employee->marital_status->cellAttributes() ?>>
<span id="el_employee_marital_status" data-page="0">
<span<?php echo $employee->marital_status->viewAttributes() ?>>
<?php echo $employee->marital_status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php } ?>
<?php if (!$employee->isExport()) { ?>
<div class="ew-multi-page">
<div class="ew-nav-tabs" id="employee_view"><!-- multi-page tabs -->
	<ul class="<?php echo $employee_view->MultiPages->navStyle() ?>">
		<li class="nav-item"><a class="nav-link<?php echo $employee_view->MultiPages->pageStyle("1") ?>" href="#tab_employee1" data-toggle="tab"><?php echo $employee->pageCaption(1) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $employee_view->MultiPages->pageStyle("2") ?>" href="#tab_employee2" data-toggle="tab"><?php echo $employee->pageCaption(2) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $employee_view->MultiPages->pageStyle("3") ?>" href="#tab_employee3" data-toggle="tab"><?php echo $employee->pageCaption(3) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $employee_view->MultiPages->pageStyle("4") ?>" href="#tab_employee4" data-toggle="tab"><?php echo $employee->pageCaption(4) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $employee_view->MultiPages->pageStyle("5") ?>" href="#tab_employee5" data-toggle="tab"><?php echo $employee->pageCaption(5) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $employee_view->MultiPages->pageStyle("6") ?>" href="#tab_employee6" data-toggle="tab"><?php echo $employee->pageCaption(6) ?></a></li>
	</ul>
	<div class="tab-content">
<?php } ?>
<?php if (!$employee->isExport()) { ?>
		<div class="tab-pane<?php echo $employee_view->MultiPages->pageStyle("1") ?>" id="tab_employee1"><!-- multi-page .tab-pane -->
<?php } ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee->employment_status->Visible) { // employment_status ?>
	<tr id="r_employment_status">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_employment_status"><?php echo $employee->employment_status->caption() ?></span></td>
		<td data-name="employment_status"<?php echo $employee->employment_status->cellAttributes() ?>>
<span id="el_employee_employment_status" data-page="1">
<span<?php echo $employee->employment_status->viewAttributes() ?>>
<?php echo $employee->employment_status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->job_title->Visible) { // job_title ?>
	<tr id="r_job_title">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_job_title"><?php echo $employee->job_title->caption() ?></span></td>
		<td data-name="job_title"<?php echo $employee->job_title->cellAttributes() ?>>
<span id="el_employee_job_title" data-page="1">
<span<?php echo $employee->job_title->viewAttributes() ?>>
<?php echo $employee->job_title->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->pay_grade->Visible) { // pay_grade ?>
	<tr id="r_pay_grade">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_pay_grade"><?php echo $employee->pay_grade->caption() ?></span></td>
		<td data-name="pay_grade"<?php echo $employee->pay_grade->cellAttributes() ?>>
<span id="el_employee_pay_grade" data-page="1">
<span<?php echo $employee->pay_grade->viewAttributes() ?>>
<?php echo $employee->pay_grade->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->work_station_id->Visible) { // work_station_id ?>
	<tr id="r_work_station_id">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_work_station_id"><?php echo $employee->work_station_id->caption() ?></span></td>
		<td data-name="work_station_id"<?php echo $employee->work_station_id->cellAttributes() ?>>
<span id="el_employee_work_station_id" data-page="1">
<span<?php echo $employee->work_station_id->viewAttributes() ?>>
<?php echo $employee->work_station_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->joined_date->Visible) { // joined_date ?>
	<tr id="r_joined_date">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_joined_date"><?php echo $employee->joined_date->caption() ?></span></td>
		<td data-name="joined_date"<?php echo $employee->joined_date->cellAttributes() ?>>
<span id="el_employee_joined_date" data-page="1">
<span<?php echo $employee->joined_date->viewAttributes() ?>>
<?php echo $employee->joined_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->confirmation_date->Visible) { // confirmation_date ?>
	<tr id="r_confirmation_date">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_confirmation_date"><?php echo $employee->confirmation_date->caption() ?></span></td>
		<td data-name="confirmation_date"<?php echo $employee->confirmation_date->cellAttributes() ?>>
<span id="el_employee_confirmation_date" data-page="1">
<span<?php echo $employee->confirmation_date->viewAttributes() ?>>
<?php echo $employee->confirmation_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->supervisor->Visible) { // supervisor ?>
	<tr id="r_supervisor">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_supervisor"><?php echo $employee->supervisor->caption() ?></span></td>
		<td data-name="supervisor"<?php echo $employee->supervisor->cellAttributes() ?>>
<span id="el_employee_supervisor" data-page="1">
<span<?php echo $employee->supervisor->viewAttributes() ?>>
<?php echo $employee->supervisor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->indirect_supervisors->Visible) { // indirect_supervisors ?>
	<tr id="r_indirect_supervisors">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_indirect_supervisors"><?php echo $employee->indirect_supervisors->caption() ?></span></td>
		<td data-name="indirect_supervisors"<?php echo $employee->indirect_supervisors->cellAttributes() ?>>
<span id="el_employee_indirect_supervisors" data-page="1">
<span<?php echo $employee->indirect_supervisors->viewAttributes() ?>>
<?php echo $employee->indirect_supervisors->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->department->Visible) { // department ?>
	<tr id="r_department">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_department"><?php echo $employee->department->caption() ?></span></td>
		<td data-name="department"<?php echo $employee->department->cellAttributes() ?>>
<span id="el_employee_department" data-page="1">
<span<?php echo $employee->department->viewAttributes() ?>>
<?php echo $employee->department->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->termination_date->Visible) { // termination_date ?>
	<tr id="r_termination_date">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_termination_date"><?php echo $employee->termination_date->caption() ?></span></td>
		<td data-name="termination_date"<?php echo $employee->termination_date->cellAttributes() ?>>
<span id="el_employee_termination_date" data-page="1">
<span<?php echo $employee->termination_date->viewAttributes() ?>>
<?php echo $employee->termination_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->ethnicity->Visible) { // ethnicity ?>
	<tr id="r_ethnicity">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_ethnicity"><?php echo $employee->ethnicity->caption() ?></span></td>
		<td data-name="ethnicity"<?php echo $employee->ethnicity->cellAttributes() ?>>
<span id="el_employee_ethnicity" data-page="1">
<span<?php echo $employee->ethnicity->viewAttributes() ?>>
<?php echo $employee->ethnicity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->immigration_status->Visible) { // immigration_status ?>
	<tr id="r_immigration_status">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_immigration_status"><?php echo $employee->immigration_status->caption() ?></span></td>
		<td data-name="immigration_status"<?php echo $employee->immigration_status->cellAttributes() ?>>
<span id="el_employee_immigration_status" data-page="1">
<span<?php echo $employee->immigration_status->viewAttributes() ?>>
<?php echo $employee->immigration_status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_status"><?php echo $employee->status->caption() ?></span></td>
		<td data-name="status"<?php echo $employee->status->cellAttributes() ?>>
<span id="el_employee_status" data-page="1">
<span<?php echo $employee->status->viewAttributes() ?>>
<?php echo $employee->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_HospID"><?php echo $employee->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $employee->HospID->cellAttributes() ?>>
<span id="el_employee_HospID" data-page="1">
<span<?php echo $employee->HospID->viewAttributes() ?>>
<?php echo $employee->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$employee->isExport()) { ?>
		</div>
<?php } ?>
<?php if (!$employee->isExport()) { ?>
		<div class="tab-pane<?php echo $employee_view->MultiPages->pageStyle("2") ?>" id="tab_employee2"><!-- multi-page .tab-pane -->
<?php } ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee->ssn_num->Visible) { // ssn_num ?>
	<tr id="r_ssn_num">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_ssn_num"><?php echo $employee->ssn_num->caption() ?></span></td>
		<td data-name="ssn_num"<?php echo $employee->ssn_num->cellAttributes() ?>>
<span id="el_employee_ssn_num" data-page="2">
<span<?php echo $employee->ssn_num->viewAttributes() ?>>
<?php echo $employee->ssn_num->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->nic_num->Visible) { // nic_num ?>
	<tr id="r_nic_num">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_nic_num"><?php echo $employee->nic_num->caption() ?></span></td>
		<td data-name="nic_num"<?php echo $employee->nic_num->cellAttributes() ?>>
<span id="el_employee_nic_num" data-page="2">
<span<?php echo $employee->nic_num->viewAttributes() ?>>
<?php echo $employee->nic_num->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->other_id->Visible) { // other_id ?>
	<tr id="r_other_id">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_other_id"><?php echo $employee->other_id->caption() ?></span></td>
		<td data-name="other_id"<?php echo $employee->other_id->cellAttributes() ?>>
<span id="el_employee_other_id" data-page="2">
<span<?php echo $employee->other_id->viewAttributes() ?>>
<?php echo $employee->other_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->driving_license->Visible) { // driving_license ?>
	<tr id="r_driving_license">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_driving_license"><?php echo $employee->driving_license->caption() ?></span></td>
		<td data-name="driving_license"<?php echo $employee->driving_license->cellAttributes() ?>>
<span id="el_employee_driving_license" data-page="2">
<span<?php echo $employee->driving_license->viewAttributes() ?>>
<?php echo $employee->driving_license->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->driving_license_exp_date->Visible) { // driving_license_exp_date ?>
	<tr id="r_driving_license_exp_date">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_driving_license_exp_date"><?php echo $employee->driving_license_exp_date->caption() ?></span></td>
		<td data-name="driving_license_exp_date"<?php echo $employee->driving_license_exp_date->cellAttributes() ?>>
<span id="el_employee_driving_license_exp_date" data-page="2">
<span<?php echo $employee->driving_license_exp_date->viewAttributes() ?>>
<?php echo $employee->driving_license_exp_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$employee->isExport()) { ?>
		</div>
<?php } ?>
<?php if (!$employee->isExport()) { ?>
		<div class="tab-pane<?php echo $employee_view->MultiPages->pageStyle("3") ?>" id="tab_employee3"><!-- multi-page .tab-pane -->
<?php } ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee->address1->Visible) { // address1 ?>
	<tr id="r_address1">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_address1"><?php echo $employee->address1->caption() ?></span></td>
		<td data-name="address1"<?php echo $employee->address1->cellAttributes() ?>>
<span id="el_employee_address1" data-page="3">
<span<?php echo $employee->address1->viewAttributes() ?>>
<?php echo $employee->address1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->address2->Visible) { // address2 ?>
	<tr id="r_address2">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_address2"><?php echo $employee->address2->caption() ?></span></td>
		<td data-name="address2"<?php echo $employee->address2->cellAttributes() ?>>
<span id="el_employee_address2" data-page="3">
<span<?php echo $employee->address2->viewAttributes() ?>>
<?php echo $employee->address2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->city->Visible) { // city ?>
	<tr id="r_city">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_city"><?php echo $employee->city->caption() ?></span></td>
		<td data-name="city"<?php echo $employee->city->cellAttributes() ?>>
<span id="el_employee_city" data-page="3">
<span<?php echo $employee->city->viewAttributes() ?>>
<?php echo $employee->city->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->country->Visible) { // country ?>
	<tr id="r_country">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_country"><?php echo $employee->country->caption() ?></span></td>
		<td data-name="country"<?php echo $employee->country->cellAttributes() ?>>
<span id="el_employee_country" data-page="3">
<span<?php echo $employee->country->viewAttributes() ?>>
<?php echo $employee->country->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->province->Visible) { // province ?>
	<tr id="r_province">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_province"><?php echo $employee->province->caption() ?></span></td>
		<td data-name="province"<?php echo $employee->province->cellAttributes() ?>>
<span id="el_employee_province" data-page="3">
<span<?php echo $employee->province->viewAttributes() ?>>
<?php echo $employee->province->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->postal_code->Visible) { // postal_code ?>
	<tr id="r_postal_code">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_postal_code"><?php echo $employee->postal_code->caption() ?></span></td>
		<td data-name="postal_code"<?php echo $employee->postal_code->cellAttributes() ?>>
<span id="el_employee_postal_code" data-page="3">
<span<?php echo $employee->postal_code->viewAttributes() ?>>
<?php echo $employee->postal_code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->home_phone->Visible) { // home_phone ?>
	<tr id="r_home_phone">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_home_phone"><?php echo $employee->home_phone->caption() ?></span></td>
		<td data-name="home_phone"<?php echo $employee->home_phone->cellAttributes() ?>>
<span id="el_employee_home_phone" data-page="3">
<span<?php echo $employee->home_phone->viewAttributes() ?>>
<?php echo $employee->home_phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->mobile_phone->Visible) { // mobile_phone ?>
	<tr id="r_mobile_phone">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_mobile_phone"><?php echo $employee->mobile_phone->caption() ?></span></td>
		<td data-name="mobile_phone"<?php echo $employee->mobile_phone->cellAttributes() ?>>
<span id="el_employee_mobile_phone" data-page="3">
<span<?php echo $employee->mobile_phone->viewAttributes() ?>>
<?php echo $employee->mobile_phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->work_phone->Visible) { // work_phone ?>
	<tr id="r_work_phone">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_work_phone"><?php echo $employee->work_phone->caption() ?></span></td>
		<td data-name="work_phone"<?php echo $employee->work_phone->cellAttributes() ?>>
<span id="el_employee_work_phone" data-page="3">
<span<?php echo $employee->work_phone->viewAttributes() ?>>
<?php echo $employee->work_phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->work_email->Visible) { // work_email ?>
	<tr id="r_work_email">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_work_email"><?php echo $employee->work_email->caption() ?></span></td>
		<td data-name="work_email"<?php echo $employee->work_email->cellAttributes() ?>>
<span id="el_employee_work_email" data-page="3">
<span<?php echo $employee->work_email->viewAttributes() ?>>
<?php echo $employee->work_email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->private_email->Visible) { // private_email ?>
	<tr id="r_private_email">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_private_email"><?php echo $employee->private_email->caption() ?></span></td>
		<td data-name="private_email"<?php echo $employee->private_email->cellAttributes() ?>>
<span id="el_employee_private_email" data-page="3">
<span<?php echo $employee->private_email->viewAttributes() ?>>
<?php echo $employee->private_email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$employee->isExport()) { ?>
		</div>
<?php } ?>
<?php if (!$employee->isExport()) { ?>
		<div class="tab-pane<?php echo $employee_view->MultiPages->pageStyle("4") ?>" id="tab_employee4"><!-- multi-page .tab-pane -->
<?php } ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee->custom1->Visible) { // custom1 ?>
	<tr id="r_custom1">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_custom1"><?php echo $employee->custom1->caption() ?></span></td>
		<td data-name="custom1"<?php echo $employee->custom1->cellAttributes() ?>>
<span id="el_employee_custom1" data-page="4">
<span<?php echo $employee->custom1->viewAttributes() ?>>
<?php echo $employee->custom1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->custom2->Visible) { // custom2 ?>
	<tr id="r_custom2">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_custom2"><?php echo $employee->custom2->caption() ?></span></td>
		<td data-name="custom2"<?php echo $employee->custom2->cellAttributes() ?>>
<span id="el_employee_custom2" data-page="4">
<span<?php echo $employee->custom2->viewAttributes() ?>>
<?php echo $employee->custom2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->custom3->Visible) { // custom3 ?>
	<tr id="r_custom3">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_custom3"><?php echo $employee->custom3->caption() ?></span></td>
		<td data-name="custom3"<?php echo $employee->custom3->cellAttributes() ?>>
<span id="el_employee_custom3" data-page="4">
<span<?php echo $employee->custom3->viewAttributes() ?>>
<?php echo $employee->custom3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->custom4->Visible) { // custom4 ?>
	<tr id="r_custom4">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_custom4"><?php echo $employee->custom4->caption() ?></span></td>
		<td data-name="custom4"<?php echo $employee->custom4->cellAttributes() ?>>
<span id="el_employee_custom4" data-page="4">
<span<?php echo $employee->custom4->viewAttributes() ?>>
<?php echo $employee->custom4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->custom5->Visible) { // custom5 ?>
	<tr id="r_custom5">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_custom5"><?php echo $employee->custom5->caption() ?></span></td>
		<td data-name="custom5"<?php echo $employee->custom5->cellAttributes() ?>>
<span id="el_employee_custom5" data-page="4">
<span<?php echo $employee->custom5->viewAttributes() ?>>
<?php echo $employee->custom5->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->custom6->Visible) { // custom6 ?>
	<tr id="r_custom6">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_custom6"><?php echo $employee->custom6->caption() ?></span></td>
		<td data-name="custom6"<?php echo $employee->custom6->cellAttributes() ?>>
<span id="el_employee_custom6" data-page="4">
<span<?php echo $employee->custom6->viewAttributes() ?>>
<?php echo $employee->custom6->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->custom7->Visible) { // custom7 ?>
	<tr id="r_custom7">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_custom7"><?php echo $employee->custom7->caption() ?></span></td>
		<td data-name="custom7"<?php echo $employee->custom7->cellAttributes() ?>>
<span id="el_employee_custom7" data-page="4">
<span<?php echo $employee->custom7->viewAttributes() ?>>
<?php echo $employee->custom7->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->custom8->Visible) { // custom8 ?>
	<tr id="r_custom8">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_custom8"><?php echo $employee->custom8->caption() ?></span></td>
		<td data-name="custom8"<?php echo $employee->custom8->cellAttributes() ?>>
<span id="el_employee_custom8" data-page="4">
<span<?php echo $employee->custom8->viewAttributes() ?>>
<?php echo $employee->custom8->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->custom9->Visible) { // custom9 ?>
	<tr id="r_custom9">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_custom9"><?php echo $employee->custom9->caption() ?></span></td>
		<td data-name="custom9"<?php echo $employee->custom9->cellAttributes() ?>>
<span id="el_employee_custom9" data-page="4">
<span<?php echo $employee->custom9->viewAttributes() ?>>
<?php echo $employee->custom9->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->custom10->Visible) { // custom10 ?>
	<tr id="r_custom10">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_custom10"><?php echo $employee->custom10->caption() ?></span></td>
		<td data-name="custom10"<?php echo $employee->custom10->cellAttributes() ?>>
<span id="el_employee_custom10" data-page="4">
<span<?php echo $employee->custom10->viewAttributes() ?>>
<?php echo $employee->custom10->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$employee->isExport()) { ?>
		</div>
<?php } ?>
<?php if (!$employee->isExport()) { ?>
		<div class="tab-pane<?php echo $employee_view->MultiPages->pageStyle("5") ?>" id="tab_employee5"><!-- multi-page .tab-pane -->
<?php } ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee->notes->Visible) { // notes ?>
	<tr id="r_notes">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_notes"><?php echo $employee->notes->caption() ?></span></td>
		<td data-name="notes"<?php echo $employee->notes->cellAttributes() ?>>
<span id="el_employee_notes" data-page="5">
<span<?php echo $employee->notes->viewAttributes() ?>>
<?php echo $employee->notes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$employee->isExport()) { ?>
		</div>
<?php } ?>
<?php if (!$employee->isExport()) { ?>
		<div class="tab-pane<?php echo $employee_view->MultiPages->pageStyle("6") ?>" id="tab_employee6"><!-- multi-page .tab-pane -->
<?php } ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee->approver1->Visible) { // approver1 ?>
	<tr id="r_approver1">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_approver1"><?php echo $employee->approver1->caption() ?></span></td>
		<td data-name="approver1"<?php echo $employee->approver1->cellAttributes() ?>>
<span id="el_employee_approver1" data-page="6">
<span<?php echo $employee->approver1->viewAttributes() ?>>
<?php echo $employee->approver1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->approver2->Visible) { // approver2 ?>
	<tr id="r_approver2">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_approver2"><?php echo $employee->approver2->caption() ?></span></td>
		<td data-name="approver2"<?php echo $employee->approver2->cellAttributes() ?>>
<span id="el_employee_approver2" data-page="6">
<span<?php echo $employee->approver2->viewAttributes() ?>>
<?php echo $employee->approver2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee->approver3->Visible) { // approver3 ?>
	<tr id="r_approver3">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_approver3"><?php echo $employee->approver3->caption() ?></span></td>
		<td data-name="approver3"<?php echo $employee->approver3->cellAttributes() ?>>
<span id="el_employee_approver3" data-page="6">
<span<?php echo $employee->approver3->viewAttributes() ?>>
<?php echo $employee->approver3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$employee->isExport()) { ?>
		</div>
<?php } ?>
<?php if (!$employee->isExport()) { ?>
	</div>
</div>
</div>
<?php } ?>
<?php
	if (in_array("employee_address", explode(",", $employee->getCurrentDetailTable())) && $employee_address->DetailView) {
?>
<?php if ($employee->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("employee_address", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_addressgrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_telephone", explode(",", $employee->getCurrentDetailTable())) && $employee_telephone->DetailView) {
?>
<?php if ($employee->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("employee_telephone", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_telephonegrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_email", explode(",", $employee->getCurrentDetailTable())) && $employee_email->DetailView) {
?>
<?php if ($employee->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("employee_email", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_emailgrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_has_degree", explode(",", $employee->getCurrentDetailTable())) && $employee_has_degree->DetailView) {
?>
<?php if ($employee->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("employee_has_degree", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_has_degreegrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_has_experience", explode(",", $employee->getCurrentDetailTable())) && $employee_has_experience->DetailView) {
?>
<?php if ($employee->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("employee_has_experience", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_has_experiencegrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_document", explode(",", $employee->getCurrentDetailTable())) && $employee_document->DetailView) {
?>
<?php if ($employee->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("employee_document", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_documentgrid.php" ?>
<?php } ?>
</form>
<?php
$employee_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_view->terminate();
?>