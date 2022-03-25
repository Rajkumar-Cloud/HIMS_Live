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
$recruitment_candidates_view = new recruitment_candidates_view();

// Run the page
$recruitment_candidates_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_candidates_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$recruitment_candidates->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var frecruitment_candidatesview = currentForm = new ew.Form("frecruitment_candidatesview", "view");

// Form_CustomValidate event
frecruitment_candidatesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_candidatesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
frecruitment_candidatesview.lists["x_gender"] = <?php echo $recruitment_candidates_view->gender->Lookup->toClientList() ?>;
frecruitment_candidatesview.lists["x_gender"].options = <?php echo JsonEncode($recruitment_candidates_view->gender->options(FALSE, TRUE)) ?>;
frecruitment_candidatesview.lists["x_marital_status"] = <?php echo $recruitment_candidates_view->marital_status->Lookup->toClientList() ?>;
frecruitment_candidatesview.lists["x_marital_status"].options = <?php echo JsonEncode($recruitment_candidates_view->marital_status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$recruitment_candidates->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $recruitment_candidates_view->ExportOptions->render("body") ?>
<?php $recruitment_candidates_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $recruitment_candidates_view->showPageHeader(); ?>
<?php
$recruitment_candidates_view->showMessage();
?>
<form name="frecruitment_candidatesview" id="frecruitment_candidatesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_candidates_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_candidates_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_candidates">
<input type="hidden" name="modal" value="<?php echo (int)$recruitment_candidates_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($recruitment_candidates->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_id"><?php echo $recruitment_candidates->id->caption() ?></span></td>
		<td data-name="id"<?php echo $recruitment_candidates->id->cellAttributes() ?>>
<span id="el_recruitment_candidates_id">
<span<?php echo $recruitment_candidates->id->viewAttributes() ?>>
<?php echo $recruitment_candidates->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->first_name->Visible) { // first_name ?>
	<tr id="r_first_name">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_first_name"><?php echo $recruitment_candidates->first_name->caption() ?></span></td>
		<td data-name="first_name"<?php echo $recruitment_candidates->first_name->cellAttributes() ?>>
<span id="el_recruitment_candidates_first_name">
<span<?php echo $recruitment_candidates->first_name->viewAttributes() ?>>
<?php echo $recruitment_candidates->first_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->last_name->Visible) { // last_name ?>
	<tr id="r_last_name">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_last_name"><?php echo $recruitment_candidates->last_name->caption() ?></span></td>
		<td data-name="last_name"<?php echo $recruitment_candidates->last_name->cellAttributes() ?>>
<span id="el_recruitment_candidates_last_name">
<span<?php echo $recruitment_candidates->last_name->viewAttributes() ?>>
<?php echo $recruitment_candidates->last_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->nationality->Visible) { // nationality ?>
	<tr id="r_nationality">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_nationality"><?php echo $recruitment_candidates->nationality->caption() ?></span></td>
		<td data-name="nationality"<?php echo $recruitment_candidates->nationality->cellAttributes() ?>>
<span id="el_recruitment_candidates_nationality">
<span<?php echo $recruitment_candidates->nationality->viewAttributes() ?>>
<?php echo $recruitment_candidates->nationality->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->birthday->Visible) { // birthday ?>
	<tr id="r_birthday">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_birthday"><?php echo $recruitment_candidates->birthday->caption() ?></span></td>
		<td data-name="birthday"<?php echo $recruitment_candidates->birthday->cellAttributes() ?>>
<span id="el_recruitment_candidates_birthday">
<span<?php echo $recruitment_candidates->birthday->viewAttributes() ?>>
<?php echo $recruitment_candidates->birthday->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->gender->Visible) { // gender ?>
	<tr id="r_gender">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_gender"><?php echo $recruitment_candidates->gender->caption() ?></span></td>
		<td data-name="gender"<?php echo $recruitment_candidates->gender->cellAttributes() ?>>
<span id="el_recruitment_candidates_gender">
<span<?php echo $recruitment_candidates->gender->viewAttributes() ?>>
<?php echo $recruitment_candidates->gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->marital_status->Visible) { // marital_status ?>
	<tr id="r_marital_status">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_marital_status"><?php echo $recruitment_candidates->marital_status->caption() ?></span></td>
		<td data-name="marital_status"<?php echo $recruitment_candidates->marital_status->cellAttributes() ?>>
<span id="el_recruitment_candidates_marital_status">
<span<?php echo $recruitment_candidates->marital_status->viewAttributes() ?>>
<?php echo $recruitment_candidates->marital_status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->address1->Visible) { // address1 ?>
	<tr id="r_address1">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_address1"><?php echo $recruitment_candidates->address1->caption() ?></span></td>
		<td data-name="address1"<?php echo $recruitment_candidates->address1->cellAttributes() ?>>
<span id="el_recruitment_candidates_address1">
<span<?php echo $recruitment_candidates->address1->viewAttributes() ?>>
<?php echo $recruitment_candidates->address1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->address2->Visible) { // address2 ?>
	<tr id="r_address2">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_address2"><?php echo $recruitment_candidates->address2->caption() ?></span></td>
		<td data-name="address2"<?php echo $recruitment_candidates->address2->cellAttributes() ?>>
<span id="el_recruitment_candidates_address2">
<span<?php echo $recruitment_candidates->address2->viewAttributes() ?>>
<?php echo $recruitment_candidates->address2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->city->Visible) { // city ?>
	<tr id="r_city">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_city"><?php echo $recruitment_candidates->city->caption() ?></span></td>
		<td data-name="city"<?php echo $recruitment_candidates->city->cellAttributes() ?>>
<span id="el_recruitment_candidates_city">
<span<?php echo $recruitment_candidates->city->viewAttributes() ?>>
<?php echo $recruitment_candidates->city->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->country->Visible) { // country ?>
	<tr id="r_country">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_country"><?php echo $recruitment_candidates->country->caption() ?></span></td>
		<td data-name="country"<?php echo $recruitment_candidates->country->cellAttributes() ?>>
<span id="el_recruitment_candidates_country">
<span<?php echo $recruitment_candidates->country->viewAttributes() ?>>
<?php echo $recruitment_candidates->country->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->province->Visible) { // province ?>
	<tr id="r_province">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_province"><?php echo $recruitment_candidates->province->caption() ?></span></td>
		<td data-name="province"<?php echo $recruitment_candidates->province->cellAttributes() ?>>
<span id="el_recruitment_candidates_province">
<span<?php echo $recruitment_candidates->province->viewAttributes() ?>>
<?php echo $recruitment_candidates->province->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->postal_code->Visible) { // postal_code ?>
	<tr id="r_postal_code">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_postal_code"><?php echo $recruitment_candidates->postal_code->caption() ?></span></td>
		<td data-name="postal_code"<?php echo $recruitment_candidates->postal_code->cellAttributes() ?>>
<span id="el_recruitment_candidates_postal_code">
<span<?php echo $recruitment_candidates->postal_code->viewAttributes() ?>>
<?php echo $recruitment_candidates->postal_code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->_email->Visible) { // email ?>
	<tr id="r__email">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates__email"><?php echo $recruitment_candidates->_email->caption() ?></span></td>
		<td data-name="_email"<?php echo $recruitment_candidates->_email->cellAttributes() ?>>
<span id="el_recruitment_candidates__email">
<span<?php echo $recruitment_candidates->_email->viewAttributes() ?>>
<?php echo $recruitment_candidates->_email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->home_phone->Visible) { // home_phone ?>
	<tr id="r_home_phone">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_home_phone"><?php echo $recruitment_candidates->home_phone->caption() ?></span></td>
		<td data-name="home_phone"<?php echo $recruitment_candidates->home_phone->cellAttributes() ?>>
<span id="el_recruitment_candidates_home_phone">
<span<?php echo $recruitment_candidates->home_phone->viewAttributes() ?>>
<?php echo $recruitment_candidates->home_phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->mobile_phone->Visible) { // mobile_phone ?>
	<tr id="r_mobile_phone">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_mobile_phone"><?php echo $recruitment_candidates->mobile_phone->caption() ?></span></td>
		<td data-name="mobile_phone"<?php echo $recruitment_candidates->mobile_phone->cellAttributes() ?>>
<span id="el_recruitment_candidates_mobile_phone">
<span<?php echo $recruitment_candidates->mobile_phone->viewAttributes() ?>>
<?php echo $recruitment_candidates->mobile_phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->cv_title->Visible) { // cv_title ?>
	<tr id="r_cv_title">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_cv_title"><?php echo $recruitment_candidates->cv_title->caption() ?></span></td>
		<td data-name="cv_title"<?php echo $recruitment_candidates->cv_title->cellAttributes() ?>>
<span id="el_recruitment_candidates_cv_title">
<span<?php echo $recruitment_candidates->cv_title->viewAttributes() ?>>
<?php echo $recruitment_candidates->cv_title->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->cv->Visible) { // cv ?>
	<tr id="r_cv">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_cv"><?php echo $recruitment_candidates->cv->caption() ?></span></td>
		<td data-name="cv"<?php echo $recruitment_candidates->cv->cellAttributes() ?>>
<span id="el_recruitment_candidates_cv">
<span<?php echo $recruitment_candidates->cv->viewAttributes() ?>>
<?php echo $recruitment_candidates->cv->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->cvtext->Visible) { // cvtext ?>
	<tr id="r_cvtext">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_cvtext"><?php echo $recruitment_candidates->cvtext->caption() ?></span></td>
		<td data-name="cvtext"<?php echo $recruitment_candidates->cvtext->cellAttributes() ?>>
<span id="el_recruitment_candidates_cvtext">
<span<?php echo $recruitment_candidates->cvtext->viewAttributes() ?>>
<?php echo $recruitment_candidates->cvtext->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->industry->Visible) { // industry ?>
	<tr id="r_industry">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_industry"><?php echo $recruitment_candidates->industry->caption() ?></span></td>
		<td data-name="industry"<?php echo $recruitment_candidates->industry->cellAttributes() ?>>
<span id="el_recruitment_candidates_industry">
<span<?php echo $recruitment_candidates->industry->viewAttributes() ?>>
<?php echo $recruitment_candidates->industry->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->profileImage->Visible) { // profileImage ?>
	<tr id="r_profileImage">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_profileImage"><?php echo $recruitment_candidates->profileImage->caption() ?></span></td>
		<td data-name="profileImage"<?php echo $recruitment_candidates->profileImage->cellAttributes() ?>>
<span id="el_recruitment_candidates_profileImage">
<span<?php echo $recruitment_candidates->profileImage->viewAttributes() ?>>
<?php echo $recruitment_candidates->profileImage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->head_line->Visible) { // head_line ?>
	<tr id="r_head_line">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_head_line"><?php echo $recruitment_candidates->head_line->caption() ?></span></td>
		<td data-name="head_line"<?php echo $recruitment_candidates->head_line->cellAttributes() ?>>
<span id="el_recruitment_candidates_head_line">
<span<?php echo $recruitment_candidates->head_line->viewAttributes() ?>>
<?php echo $recruitment_candidates->head_line->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->objective->Visible) { // objective ?>
	<tr id="r_objective">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_objective"><?php echo $recruitment_candidates->objective->caption() ?></span></td>
		<td data-name="objective"<?php echo $recruitment_candidates->objective->cellAttributes() ?>>
<span id="el_recruitment_candidates_objective">
<span<?php echo $recruitment_candidates->objective->viewAttributes() ?>>
<?php echo $recruitment_candidates->objective->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->work_history->Visible) { // work_history ?>
	<tr id="r_work_history">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_work_history"><?php echo $recruitment_candidates->work_history->caption() ?></span></td>
		<td data-name="work_history"<?php echo $recruitment_candidates->work_history->cellAttributes() ?>>
<span id="el_recruitment_candidates_work_history">
<span<?php echo $recruitment_candidates->work_history->viewAttributes() ?>>
<?php echo $recruitment_candidates->work_history->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->education->Visible) { // education ?>
	<tr id="r_education">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_education"><?php echo $recruitment_candidates->education->caption() ?></span></td>
		<td data-name="education"<?php echo $recruitment_candidates->education->cellAttributes() ?>>
<span id="el_recruitment_candidates_education">
<span<?php echo $recruitment_candidates->education->viewAttributes() ?>>
<?php echo $recruitment_candidates->education->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->skills->Visible) { // skills ?>
	<tr id="r_skills">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_skills"><?php echo $recruitment_candidates->skills->caption() ?></span></td>
		<td data-name="skills"<?php echo $recruitment_candidates->skills->cellAttributes() ?>>
<span id="el_recruitment_candidates_skills">
<span<?php echo $recruitment_candidates->skills->viewAttributes() ?>>
<?php echo $recruitment_candidates->skills->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->referees->Visible) { // referees ?>
	<tr id="r_referees">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_referees"><?php echo $recruitment_candidates->referees->caption() ?></span></td>
		<td data-name="referees"<?php echo $recruitment_candidates->referees->cellAttributes() ?>>
<span id="el_recruitment_candidates_referees">
<span<?php echo $recruitment_candidates->referees->viewAttributes() ?>>
<?php echo $recruitment_candidates->referees->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->linkedInUrl->Visible) { // linkedInUrl ?>
	<tr id="r_linkedInUrl">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_linkedInUrl"><?php echo $recruitment_candidates->linkedInUrl->caption() ?></span></td>
		<td data-name="linkedInUrl"<?php echo $recruitment_candidates->linkedInUrl->cellAttributes() ?>>
<span id="el_recruitment_candidates_linkedInUrl">
<span<?php echo $recruitment_candidates->linkedInUrl->viewAttributes() ?>>
<?php echo $recruitment_candidates->linkedInUrl->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->linkedInData->Visible) { // linkedInData ?>
	<tr id="r_linkedInData">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_linkedInData"><?php echo $recruitment_candidates->linkedInData->caption() ?></span></td>
		<td data-name="linkedInData"<?php echo $recruitment_candidates->linkedInData->cellAttributes() ?>>
<span id="el_recruitment_candidates_linkedInData">
<span<?php echo $recruitment_candidates->linkedInData->viewAttributes() ?>>
<?php echo $recruitment_candidates->linkedInData->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->totalYearsOfExperience->Visible) { // totalYearsOfExperience ?>
	<tr id="r_totalYearsOfExperience">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_totalYearsOfExperience"><?php echo $recruitment_candidates->totalYearsOfExperience->caption() ?></span></td>
		<td data-name="totalYearsOfExperience"<?php echo $recruitment_candidates->totalYearsOfExperience->cellAttributes() ?>>
<span id="el_recruitment_candidates_totalYearsOfExperience">
<span<?php echo $recruitment_candidates->totalYearsOfExperience->viewAttributes() ?>>
<?php echo $recruitment_candidates->totalYearsOfExperience->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->totalMonthsOfExperience->Visible) { // totalMonthsOfExperience ?>
	<tr id="r_totalMonthsOfExperience">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_totalMonthsOfExperience"><?php echo $recruitment_candidates->totalMonthsOfExperience->caption() ?></span></td>
		<td data-name="totalMonthsOfExperience"<?php echo $recruitment_candidates->totalMonthsOfExperience->cellAttributes() ?>>
<span id="el_recruitment_candidates_totalMonthsOfExperience">
<span<?php echo $recruitment_candidates->totalMonthsOfExperience->viewAttributes() ?>>
<?php echo $recruitment_candidates->totalMonthsOfExperience->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->htmlCVData->Visible) { // htmlCVData ?>
	<tr id="r_htmlCVData">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_htmlCVData"><?php echo $recruitment_candidates->htmlCVData->caption() ?></span></td>
		<td data-name="htmlCVData"<?php echo $recruitment_candidates->htmlCVData->cellAttributes() ?>>
<span id="el_recruitment_candidates_htmlCVData">
<span<?php echo $recruitment_candidates->htmlCVData->viewAttributes() ?>>
<?php echo $recruitment_candidates->htmlCVData->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->generatedCVFile->Visible) { // generatedCVFile ?>
	<tr id="r_generatedCVFile">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_generatedCVFile"><?php echo $recruitment_candidates->generatedCVFile->caption() ?></span></td>
		<td data-name="generatedCVFile"<?php echo $recruitment_candidates->generatedCVFile->cellAttributes() ?>>
<span id="el_recruitment_candidates_generatedCVFile">
<span<?php echo $recruitment_candidates->generatedCVFile->viewAttributes() ?>>
<?php echo $recruitment_candidates->generatedCVFile->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->created->Visible) { // created ?>
	<tr id="r_created">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_created"><?php echo $recruitment_candidates->created->caption() ?></span></td>
		<td data-name="created"<?php echo $recruitment_candidates->created->cellAttributes() ?>>
<span id="el_recruitment_candidates_created">
<span<?php echo $recruitment_candidates->created->viewAttributes() ?>>
<?php echo $recruitment_candidates->created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->updated->Visible) { // updated ?>
	<tr id="r_updated">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_updated"><?php echo $recruitment_candidates->updated->caption() ?></span></td>
		<td data-name="updated"<?php echo $recruitment_candidates->updated->cellAttributes() ?>>
<span id="el_recruitment_candidates_updated">
<span<?php echo $recruitment_candidates->updated->viewAttributes() ?>>
<?php echo $recruitment_candidates->updated->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->expectedSalary->Visible) { // expectedSalary ?>
	<tr id="r_expectedSalary">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_expectedSalary"><?php echo $recruitment_candidates->expectedSalary->caption() ?></span></td>
		<td data-name="expectedSalary"<?php echo $recruitment_candidates->expectedSalary->cellAttributes() ?>>
<span id="el_recruitment_candidates_expectedSalary">
<span<?php echo $recruitment_candidates->expectedSalary->viewAttributes() ?>>
<?php echo $recruitment_candidates->expectedSalary->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->preferedPositions->Visible) { // preferedPositions ?>
	<tr id="r_preferedPositions">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_preferedPositions"><?php echo $recruitment_candidates->preferedPositions->caption() ?></span></td>
		<td data-name="preferedPositions"<?php echo $recruitment_candidates->preferedPositions->cellAttributes() ?>>
<span id="el_recruitment_candidates_preferedPositions">
<span<?php echo $recruitment_candidates->preferedPositions->viewAttributes() ?>>
<?php echo $recruitment_candidates->preferedPositions->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->preferedJobtype->Visible) { // preferedJobtype ?>
	<tr id="r_preferedJobtype">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_preferedJobtype"><?php echo $recruitment_candidates->preferedJobtype->caption() ?></span></td>
		<td data-name="preferedJobtype"<?php echo $recruitment_candidates->preferedJobtype->cellAttributes() ?>>
<span id="el_recruitment_candidates_preferedJobtype">
<span<?php echo $recruitment_candidates->preferedJobtype->viewAttributes() ?>>
<?php echo $recruitment_candidates->preferedJobtype->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->preferedCountries->Visible) { // preferedCountries ?>
	<tr id="r_preferedCountries">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_preferedCountries"><?php echo $recruitment_candidates->preferedCountries->caption() ?></span></td>
		<td data-name="preferedCountries"<?php echo $recruitment_candidates->preferedCountries->cellAttributes() ?>>
<span id="el_recruitment_candidates_preferedCountries">
<span<?php echo $recruitment_candidates->preferedCountries->viewAttributes() ?>>
<?php echo $recruitment_candidates->preferedCountries->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->tags->Visible) { // tags ?>
	<tr id="r_tags">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_tags"><?php echo $recruitment_candidates->tags->caption() ?></span></td>
		<td data-name="tags"<?php echo $recruitment_candidates->tags->cellAttributes() ?>>
<span id="el_recruitment_candidates_tags">
<span<?php echo $recruitment_candidates->tags->viewAttributes() ?>>
<?php echo $recruitment_candidates->tags->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->notes->Visible) { // notes ?>
	<tr id="r_notes">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_notes"><?php echo $recruitment_candidates->notes->caption() ?></span></td>
		<td data-name="notes"<?php echo $recruitment_candidates->notes->cellAttributes() ?>>
<span id="el_recruitment_candidates_notes">
<span<?php echo $recruitment_candidates->notes->viewAttributes() ?>>
<?php echo $recruitment_candidates->notes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->calls->Visible) { // calls ?>
	<tr id="r_calls">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_calls"><?php echo $recruitment_candidates->calls->caption() ?></span></td>
		<td data-name="calls"<?php echo $recruitment_candidates->calls->cellAttributes() ?>>
<span id="el_recruitment_candidates_calls">
<span<?php echo $recruitment_candidates->calls->viewAttributes() ?>>
<?php echo $recruitment_candidates->calls->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->age->Visible) { // age ?>
	<tr id="r_age">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_age"><?php echo $recruitment_candidates->age->caption() ?></span></td>
		<td data-name="age"<?php echo $recruitment_candidates->age->cellAttributes() ?>>
<span id="el_recruitment_candidates_age">
<span<?php echo $recruitment_candidates->age->viewAttributes() ?>>
<?php echo $recruitment_candidates->age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->hash->Visible) { // hash ?>
	<tr id="r_hash">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_hash"><?php echo $recruitment_candidates->hash->caption() ?></span></td>
		<td data-name="hash"<?php echo $recruitment_candidates->hash->cellAttributes() ?>>
<span id="el_recruitment_candidates_hash">
<span<?php echo $recruitment_candidates->hash->viewAttributes() ?>>
<?php echo $recruitment_candidates->hash->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->linkedInProfileLink->Visible) { // linkedInProfileLink ?>
	<tr id="r_linkedInProfileLink">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_linkedInProfileLink"><?php echo $recruitment_candidates->linkedInProfileLink->caption() ?></span></td>
		<td data-name="linkedInProfileLink"<?php echo $recruitment_candidates->linkedInProfileLink->cellAttributes() ?>>
<span id="el_recruitment_candidates_linkedInProfileLink">
<span<?php echo $recruitment_candidates->linkedInProfileLink->viewAttributes() ?>>
<?php echo $recruitment_candidates->linkedInProfileLink->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->linkedInProfileId->Visible) { // linkedInProfileId ?>
	<tr id="r_linkedInProfileId">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_linkedInProfileId"><?php echo $recruitment_candidates->linkedInProfileId->caption() ?></span></td>
		<td data-name="linkedInProfileId"<?php echo $recruitment_candidates->linkedInProfileId->cellAttributes() ?>>
<span id="el_recruitment_candidates_linkedInProfileId">
<span<?php echo $recruitment_candidates->linkedInProfileId->viewAttributes() ?>>
<?php echo $recruitment_candidates->linkedInProfileId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->facebookProfileLink->Visible) { // facebookProfileLink ?>
	<tr id="r_facebookProfileLink">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_facebookProfileLink"><?php echo $recruitment_candidates->facebookProfileLink->caption() ?></span></td>
		<td data-name="facebookProfileLink"<?php echo $recruitment_candidates->facebookProfileLink->cellAttributes() ?>>
<span id="el_recruitment_candidates_facebookProfileLink">
<span<?php echo $recruitment_candidates->facebookProfileLink->viewAttributes() ?>>
<?php echo $recruitment_candidates->facebookProfileLink->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->facebookProfileId->Visible) { // facebookProfileId ?>
	<tr id="r_facebookProfileId">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_facebookProfileId"><?php echo $recruitment_candidates->facebookProfileId->caption() ?></span></td>
		<td data-name="facebookProfileId"<?php echo $recruitment_candidates->facebookProfileId->cellAttributes() ?>>
<span id="el_recruitment_candidates_facebookProfileId">
<span<?php echo $recruitment_candidates->facebookProfileId->viewAttributes() ?>>
<?php echo $recruitment_candidates->facebookProfileId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->twitterProfileLink->Visible) { // twitterProfileLink ?>
	<tr id="r_twitterProfileLink">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_twitterProfileLink"><?php echo $recruitment_candidates->twitterProfileLink->caption() ?></span></td>
		<td data-name="twitterProfileLink"<?php echo $recruitment_candidates->twitterProfileLink->cellAttributes() ?>>
<span id="el_recruitment_candidates_twitterProfileLink">
<span<?php echo $recruitment_candidates->twitterProfileLink->viewAttributes() ?>>
<?php echo $recruitment_candidates->twitterProfileLink->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->twitterProfileId->Visible) { // twitterProfileId ?>
	<tr id="r_twitterProfileId">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_twitterProfileId"><?php echo $recruitment_candidates->twitterProfileId->caption() ?></span></td>
		<td data-name="twitterProfileId"<?php echo $recruitment_candidates->twitterProfileId->cellAttributes() ?>>
<span id="el_recruitment_candidates_twitterProfileId">
<span<?php echo $recruitment_candidates->twitterProfileId->viewAttributes() ?>>
<?php echo $recruitment_candidates->twitterProfileId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->googleProfileLink->Visible) { // googleProfileLink ?>
	<tr id="r_googleProfileLink">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_googleProfileLink"><?php echo $recruitment_candidates->googleProfileLink->caption() ?></span></td>
		<td data-name="googleProfileLink"<?php echo $recruitment_candidates->googleProfileLink->cellAttributes() ?>>
<span id="el_recruitment_candidates_googleProfileLink">
<span<?php echo $recruitment_candidates->googleProfileLink->viewAttributes() ?>>
<?php echo $recruitment_candidates->googleProfileLink->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_candidates->googleProfileId->Visible) { // googleProfileId ?>
	<tr id="r_googleProfileId">
		<td class="<?php echo $recruitment_candidates_view->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_googleProfileId"><?php echo $recruitment_candidates->googleProfileId->caption() ?></span></td>
		<td data-name="googleProfileId"<?php echo $recruitment_candidates->googleProfileId->cellAttributes() ?>>
<span id="el_recruitment_candidates_googleProfileId">
<span<?php echo $recruitment_candidates->googleProfileId->viewAttributes() ?>>
<?php echo $recruitment_candidates->googleProfileId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$recruitment_candidates_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$recruitment_candidates->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$recruitment_candidates_view->terminate();
?>