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
$recruitment_candidates_delete = new recruitment_candidates_delete();

// Run the page
$recruitment_candidates_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_candidates_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var frecruitment_candidatesdelete = currentForm = new ew.Form("frecruitment_candidatesdelete", "delete");

// Form_CustomValidate event
frecruitment_candidatesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_candidatesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
frecruitment_candidatesdelete.lists["x_gender"] = <?php echo $recruitment_candidates_delete->gender->Lookup->toClientList() ?>;
frecruitment_candidatesdelete.lists["x_gender"].options = <?php echo JsonEncode($recruitment_candidates_delete->gender->options(FALSE, TRUE)) ?>;
frecruitment_candidatesdelete.lists["x_marital_status"] = <?php echo $recruitment_candidates_delete->marital_status->Lookup->toClientList() ?>;
frecruitment_candidatesdelete.lists["x_marital_status"].options = <?php echo JsonEncode($recruitment_candidates_delete->marital_status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $recruitment_candidates_delete->showPageHeader(); ?>
<?php
$recruitment_candidates_delete->showMessage();
?>
<form name="frecruitment_candidatesdelete" id="frecruitment_candidatesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_candidates_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_candidates_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_candidates">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($recruitment_candidates_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($recruitment_candidates->id->Visible) { // id ?>
		<th class="<?php echo $recruitment_candidates->id->headerCellClass() ?>"><span id="elh_recruitment_candidates_id" class="recruitment_candidates_id"><?php echo $recruitment_candidates->id->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->first_name->Visible) { // first_name ?>
		<th class="<?php echo $recruitment_candidates->first_name->headerCellClass() ?>"><span id="elh_recruitment_candidates_first_name" class="recruitment_candidates_first_name"><?php echo $recruitment_candidates->first_name->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->last_name->Visible) { // last_name ?>
		<th class="<?php echo $recruitment_candidates->last_name->headerCellClass() ?>"><span id="elh_recruitment_candidates_last_name" class="recruitment_candidates_last_name"><?php echo $recruitment_candidates->last_name->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->nationality->Visible) { // nationality ?>
		<th class="<?php echo $recruitment_candidates->nationality->headerCellClass() ?>"><span id="elh_recruitment_candidates_nationality" class="recruitment_candidates_nationality"><?php echo $recruitment_candidates->nationality->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->birthday->Visible) { // birthday ?>
		<th class="<?php echo $recruitment_candidates->birthday->headerCellClass() ?>"><span id="elh_recruitment_candidates_birthday" class="recruitment_candidates_birthday"><?php echo $recruitment_candidates->birthday->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->gender->Visible) { // gender ?>
		<th class="<?php echo $recruitment_candidates->gender->headerCellClass() ?>"><span id="elh_recruitment_candidates_gender" class="recruitment_candidates_gender"><?php echo $recruitment_candidates->gender->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->marital_status->Visible) { // marital_status ?>
		<th class="<?php echo $recruitment_candidates->marital_status->headerCellClass() ?>"><span id="elh_recruitment_candidates_marital_status" class="recruitment_candidates_marital_status"><?php echo $recruitment_candidates->marital_status->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->address1->Visible) { // address1 ?>
		<th class="<?php echo $recruitment_candidates->address1->headerCellClass() ?>"><span id="elh_recruitment_candidates_address1" class="recruitment_candidates_address1"><?php echo $recruitment_candidates->address1->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->address2->Visible) { // address2 ?>
		<th class="<?php echo $recruitment_candidates->address2->headerCellClass() ?>"><span id="elh_recruitment_candidates_address2" class="recruitment_candidates_address2"><?php echo $recruitment_candidates->address2->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->city->Visible) { // city ?>
		<th class="<?php echo $recruitment_candidates->city->headerCellClass() ?>"><span id="elh_recruitment_candidates_city" class="recruitment_candidates_city"><?php echo $recruitment_candidates->city->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->country->Visible) { // country ?>
		<th class="<?php echo $recruitment_candidates->country->headerCellClass() ?>"><span id="elh_recruitment_candidates_country" class="recruitment_candidates_country"><?php echo $recruitment_candidates->country->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->province->Visible) { // province ?>
		<th class="<?php echo $recruitment_candidates->province->headerCellClass() ?>"><span id="elh_recruitment_candidates_province" class="recruitment_candidates_province"><?php echo $recruitment_candidates->province->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->postal_code->Visible) { // postal_code ?>
		<th class="<?php echo $recruitment_candidates->postal_code->headerCellClass() ?>"><span id="elh_recruitment_candidates_postal_code" class="recruitment_candidates_postal_code"><?php echo $recruitment_candidates->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->_email->Visible) { // email ?>
		<th class="<?php echo $recruitment_candidates->_email->headerCellClass() ?>"><span id="elh_recruitment_candidates__email" class="recruitment_candidates__email"><?php echo $recruitment_candidates->_email->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->home_phone->Visible) { // home_phone ?>
		<th class="<?php echo $recruitment_candidates->home_phone->headerCellClass() ?>"><span id="elh_recruitment_candidates_home_phone" class="recruitment_candidates_home_phone"><?php echo $recruitment_candidates->home_phone->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->mobile_phone->Visible) { // mobile_phone ?>
		<th class="<?php echo $recruitment_candidates->mobile_phone->headerCellClass() ?>"><span id="elh_recruitment_candidates_mobile_phone" class="recruitment_candidates_mobile_phone"><?php echo $recruitment_candidates->mobile_phone->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->cv_title->Visible) { // cv_title ?>
		<th class="<?php echo $recruitment_candidates->cv_title->headerCellClass() ?>"><span id="elh_recruitment_candidates_cv_title" class="recruitment_candidates_cv_title"><?php echo $recruitment_candidates->cv_title->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->cv->Visible) { // cv ?>
		<th class="<?php echo $recruitment_candidates->cv->headerCellClass() ?>"><span id="elh_recruitment_candidates_cv" class="recruitment_candidates_cv"><?php echo $recruitment_candidates->cv->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->profileImage->Visible) { // profileImage ?>
		<th class="<?php echo $recruitment_candidates->profileImage->headerCellClass() ?>"><span id="elh_recruitment_candidates_profileImage" class="recruitment_candidates_profileImage"><?php echo $recruitment_candidates->profileImage->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->totalYearsOfExperience->Visible) { // totalYearsOfExperience ?>
		<th class="<?php echo $recruitment_candidates->totalYearsOfExperience->headerCellClass() ?>"><span id="elh_recruitment_candidates_totalYearsOfExperience" class="recruitment_candidates_totalYearsOfExperience"><?php echo $recruitment_candidates->totalYearsOfExperience->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->totalMonthsOfExperience->Visible) { // totalMonthsOfExperience ?>
		<th class="<?php echo $recruitment_candidates->totalMonthsOfExperience->headerCellClass() ?>"><span id="elh_recruitment_candidates_totalMonthsOfExperience" class="recruitment_candidates_totalMonthsOfExperience"><?php echo $recruitment_candidates->totalMonthsOfExperience->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->generatedCVFile->Visible) { // generatedCVFile ?>
		<th class="<?php echo $recruitment_candidates->generatedCVFile->headerCellClass() ?>"><span id="elh_recruitment_candidates_generatedCVFile" class="recruitment_candidates_generatedCVFile"><?php echo $recruitment_candidates->generatedCVFile->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->created->Visible) { // created ?>
		<th class="<?php echo $recruitment_candidates->created->headerCellClass() ?>"><span id="elh_recruitment_candidates_created" class="recruitment_candidates_created"><?php echo $recruitment_candidates->created->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->updated->Visible) { // updated ?>
		<th class="<?php echo $recruitment_candidates->updated->headerCellClass() ?>"><span id="elh_recruitment_candidates_updated" class="recruitment_candidates_updated"><?php echo $recruitment_candidates->updated->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->expectedSalary->Visible) { // expectedSalary ?>
		<th class="<?php echo $recruitment_candidates->expectedSalary->headerCellClass() ?>"><span id="elh_recruitment_candidates_expectedSalary" class="recruitment_candidates_expectedSalary"><?php echo $recruitment_candidates->expectedSalary->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->preferedJobtype->Visible) { // preferedJobtype ?>
		<th class="<?php echo $recruitment_candidates->preferedJobtype->headerCellClass() ?>"><span id="elh_recruitment_candidates_preferedJobtype" class="recruitment_candidates_preferedJobtype"><?php echo $recruitment_candidates->preferedJobtype->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->age->Visible) { // age ?>
		<th class="<?php echo $recruitment_candidates->age->headerCellClass() ?>"><span id="elh_recruitment_candidates_age" class="recruitment_candidates_age"><?php echo $recruitment_candidates->age->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->hash->Visible) { // hash ?>
		<th class="<?php echo $recruitment_candidates->hash->headerCellClass() ?>"><span id="elh_recruitment_candidates_hash" class="recruitment_candidates_hash"><?php echo $recruitment_candidates->hash->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->linkedInProfileLink->Visible) { // linkedInProfileLink ?>
		<th class="<?php echo $recruitment_candidates->linkedInProfileLink->headerCellClass() ?>"><span id="elh_recruitment_candidates_linkedInProfileLink" class="recruitment_candidates_linkedInProfileLink"><?php echo $recruitment_candidates->linkedInProfileLink->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->linkedInProfileId->Visible) { // linkedInProfileId ?>
		<th class="<?php echo $recruitment_candidates->linkedInProfileId->headerCellClass() ?>"><span id="elh_recruitment_candidates_linkedInProfileId" class="recruitment_candidates_linkedInProfileId"><?php echo $recruitment_candidates->linkedInProfileId->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->facebookProfileLink->Visible) { // facebookProfileLink ?>
		<th class="<?php echo $recruitment_candidates->facebookProfileLink->headerCellClass() ?>"><span id="elh_recruitment_candidates_facebookProfileLink" class="recruitment_candidates_facebookProfileLink"><?php echo $recruitment_candidates->facebookProfileLink->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->facebookProfileId->Visible) { // facebookProfileId ?>
		<th class="<?php echo $recruitment_candidates->facebookProfileId->headerCellClass() ?>"><span id="elh_recruitment_candidates_facebookProfileId" class="recruitment_candidates_facebookProfileId"><?php echo $recruitment_candidates->facebookProfileId->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->twitterProfileLink->Visible) { // twitterProfileLink ?>
		<th class="<?php echo $recruitment_candidates->twitterProfileLink->headerCellClass() ?>"><span id="elh_recruitment_candidates_twitterProfileLink" class="recruitment_candidates_twitterProfileLink"><?php echo $recruitment_candidates->twitterProfileLink->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->twitterProfileId->Visible) { // twitterProfileId ?>
		<th class="<?php echo $recruitment_candidates->twitterProfileId->headerCellClass() ?>"><span id="elh_recruitment_candidates_twitterProfileId" class="recruitment_candidates_twitterProfileId"><?php echo $recruitment_candidates->twitterProfileId->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->googleProfileLink->Visible) { // googleProfileLink ?>
		<th class="<?php echo $recruitment_candidates->googleProfileLink->headerCellClass() ?>"><span id="elh_recruitment_candidates_googleProfileLink" class="recruitment_candidates_googleProfileLink"><?php echo $recruitment_candidates->googleProfileLink->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_candidates->googleProfileId->Visible) { // googleProfileId ?>
		<th class="<?php echo $recruitment_candidates->googleProfileId->headerCellClass() ?>"><span id="elh_recruitment_candidates_googleProfileId" class="recruitment_candidates_googleProfileId"><?php echo $recruitment_candidates->googleProfileId->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$recruitment_candidates_delete->RecCnt = 0;
$i = 0;
while (!$recruitment_candidates_delete->Recordset->EOF) {
	$recruitment_candidates_delete->RecCnt++;
	$recruitment_candidates_delete->RowCnt++;

	// Set row properties
	$recruitment_candidates->resetAttributes();
	$recruitment_candidates->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$recruitment_candidates_delete->loadRowValues($recruitment_candidates_delete->Recordset);

	// Render row
	$recruitment_candidates_delete->renderRow();
?>
	<tr<?php echo $recruitment_candidates->rowAttributes() ?>>
<?php if ($recruitment_candidates->id->Visible) { // id ?>
		<td<?php echo $recruitment_candidates->id->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_id" class="recruitment_candidates_id">
<span<?php echo $recruitment_candidates->id->viewAttributes() ?>>
<?php echo $recruitment_candidates->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->first_name->Visible) { // first_name ?>
		<td<?php echo $recruitment_candidates->first_name->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_first_name" class="recruitment_candidates_first_name">
<span<?php echo $recruitment_candidates->first_name->viewAttributes() ?>>
<?php echo $recruitment_candidates->first_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->last_name->Visible) { // last_name ?>
		<td<?php echo $recruitment_candidates->last_name->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_last_name" class="recruitment_candidates_last_name">
<span<?php echo $recruitment_candidates->last_name->viewAttributes() ?>>
<?php echo $recruitment_candidates->last_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->nationality->Visible) { // nationality ?>
		<td<?php echo $recruitment_candidates->nationality->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_nationality" class="recruitment_candidates_nationality">
<span<?php echo $recruitment_candidates->nationality->viewAttributes() ?>>
<?php echo $recruitment_candidates->nationality->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->birthday->Visible) { // birthday ?>
		<td<?php echo $recruitment_candidates->birthday->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_birthday" class="recruitment_candidates_birthday">
<span<?php echo $recruitment_candidates->birthday->viewAttributes() ?>>
<?php echo $recruitment_candidates->birthday->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->gender->Visible) { // gender ?>
		<td<?php echo $recruitment_candidates->gender->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_gender" class="recruitment_candidates_gender">
<span<?php echo $recruitment_candidates->gender->viewAttributes() ?>>
<?php echo $recruitment_candidates->gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->marital_status->Visible) { // marital_status ?>
		<td<?php echo $recruitment_candidates->marital_status->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_marital_status" class="recruitment_candidates_marital_status">
<span<?php echo $recruitment_candidates->marital_status->viewAttributes() ?>>
<?php echo $recruitment_candidates->marital_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->address1->Visible) { // address1 ?>
		<td<?php echo $recruitment_candidates->address1->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_address1" class="recruitment_candidates_address1">
<span<?php echo $recruitment_candidates->address1->viewAttributes() ?>>
<?php echo $recruitment_candidates->address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->address2->Visible) { // address2 ?>
		<td<?php echo $recruitment_candidates->address2->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_address2" class="recruitment_candidates_address2">
<span<?php echo $recruitment_candidates->address2->viewAttributes() ?>>
<?php echo $recruitment_candidates->address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->city->Visible) { // city ?>
		<td<?php echo $recruitment_candidates->city->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_city" class="recruitment_candidates_city">
<span<?php echo $recruitment_candidates->city->viewAttributes() ?>>
<?php echo $recruitment_candidates->city->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->country->Visible) { // country ?>
		<td<?php echo $recruitment_candidates->country->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_country" class="recruitment_candidates_country">
<span<?php echo $recruitment_candidates->country->viewAttributes() ?>>
<?php echo $recruitment_candidates->country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->province->Visible) { // province ?>
		<td<?php echo $recruitment_candidates->province->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_province" class="recruitment_candidates_province">
<span<?php echo $recruitment_candidates->province->viewAttributes() ?>>
<?php echo $recruitment_candidates->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->postal_code->Visible) { // postal_code ?>
		<td<?php echo $recruitment_candidates->postal_code->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_postal_code" class="recruitment_candidates_postal_code">
<span<?php echo $recruitment_candidates->postal_code->viewAttributes() ?>>
<?php echo $recruitment_candidates->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->_email->Visible) { // email ?>
		<td<?php echo $recruitment_candidates->_email->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates__email" class="recruitment_candidates__email">
<span<?php echo $recruitment_candidates->_email->viewAttributes() ?>>
<?php echo $recruitment_candidates->_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->home_phone->Visible) { // home_phone ?>
		<td<?php echo $recruitment_candidates->home_phone->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_home_phone" class="recruitment_candidates_home_phone">
<span<?php echo $recruitment_candidates->home_phone->viewAttributes() ?>>
<?php echo $recruitment_candidates->home_phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->mobile_phone->Visible) { // mobile_phone ?>
		<td<?php echo $recruitment_candidates->mobile_phone->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_mobile_phone" class="recruitment_candidates_mobile_phone">
<span<?php echo $recruitment_candidates->mobile_phone->viewAttributes() ?>>
<?php echo $recruitment_candidates->mobile_phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->cv_title->Visible) { // cv_title ?>
		<td<?php echo $recruitment_candidates->cv_title->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_cv_title" class="recruitment_candidates_cv_title">
<span<?php echo $recruitment_candidates->cv_title->viewAttributes() ?>>
<?php echo $recruitment_candidates->cv_title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->cv->Visible) { // cv ?>
		<td<?php echo $recruitment_candidates->cv->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_cv" class="recruitment_candidates_cv">
<span<?php echo $recruitment_candidates->cv->viewAttributes() ?>>
<?php echo $recruitment_candidates->cv->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->profileImage->Visible) { // profileImage ?>
		<td<?php echo $recruitment_candidates->profileImage->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_profileImage" class="recruitment_candidates_profileImage">
<span<?php echo $recruitment_candidates->profileImage->viewAttributes() ?>>
<?php echo $recruitment_candidates->profileImage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->totalYearsOfExperience->Visible) { // totalYearsOfExperience ?>
		<td<?php echo $recruitment_candidates->totalYearsOfExperience->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_totalYearsOfExperience" class="recruitment_candidates_totalYearsOfExperience">
<span<?php echo $recruitment_candidates->totalYearsOfExperience->viewAttributes() ?>>
<?php echo $recruitment_candidates->totalYearsOfExperience->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->totalMonthsOfExperience->Visible) { // totalMonthsOfExperience ?>
		<td<?php echo $recruitment_candidates->totalMonthsOfExperience->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_totalMonthsOfExperience" class="recruitment_candidates_totalMonthsOfExperience">
<span<?php echo $recruitment_candidates->totalMonthsOfExperience->viewAttributes() ?>>
<?php echo $recruitment_candidates->totalMonthsOfExperience->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->generatedCVFile->Visible) { // generatedCVFile ?>
		<td<?php echo $recruitment_candidates->generatedCVFile->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_generatedCVFile" class="recruitment_candidates_generatedCVFile">
<span<?php echo $recruitment_candidates->generatedCVFile->viewAttributes() ?>>
<?php echo $recruitment_candidates->generatedCVFile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->created->Visible) { // created ?>
		<td<?php echo $recruitment_candidates->created->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_created" class="recruitment_candidates_created">
<span<?php echo $recruitment_candidates->created->viewAttributes() ?>>
<?php echo $recruitment_candidates->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->updated->Visible) { // updated ?>
		<td<?php echo $recruitment_candidates->updated->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_updated" class="recruitment_candidates_updated">
<span<?php echo $recruitment_candidates->updated->viewAttributes() ?>>
<?php echo $recruitment_candidates->updated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->expectedSalary->Visible) { // expectedSalary ?>
		<td<?php echo $recruitment_candidates->expectedSalary->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_expectedSalary" class="recruitment_candidates_expectedSalary">
<span<?php echo $recruitment_candidates->expectedSalary->viewAttributes() ?>>
<?php echo $recruitment_candidates->expectedSalary->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->preferedJobtype->Visible) { // preferedJobtype ?>
		<td<?php echo $recruitment_candidates->preferedJobtype->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_preferedJobtype" class="recruitment_candidates_preferedJobtype">
<span<?php echo $recruitment_candidates->preferedJobtype->viewAttributes() ?>>
<?php echo $recruitment_candidates->preferedJobtype->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->age->Visible) { // age ?>
		<td<?php echo $recruitment_candidates->age->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_age" class="recruitment_candidates_age">
<span<?php echo $recruitment_candidates->age->viewAttributes() ?>>
<?php echo $recruitment_candidates->age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->hash->Visible) { // hash ?>
		<td<?php echo $recruitment_candidates->hash->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_hash" class="recruitment_candidates_hash">
<span<?php echo $recruitment_candidates->hash->viewAttributes() ?>>
<?php echo $recruitment_candidates->hash->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->linkedInProfileLink->Visible) { // linkedInProfileLink ?>
		<td<?php echo $recruitment_candidates->linkedInProfileLink->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_linkedInProfileLink" class="recruitment_candidates_linkedInProfileLink">
<span<?php echo $recruitment_candidates->linkedInProfileLink->viewAttributes() ?>>
<?php echo $recruitment_candidates->linkedInProfileLink->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->linkedInProfileId->Visible) { // linkedInProfileId ?>
		<td<?php echo $recruitment_candidates->linkedInProfileId->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_linkedInProfileId" class="recruitment_candidates_linkedInProfileId">
<span<?php echo $recruitment_candidates->linkedInProfileId->viewAttributes() ?>>
<?php echo $recruitment_candidates->linkedInProfileId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->facebookProfileLink->Visible) { // facebookProfileLink ?>
		<td<?php echo $recruitment_candidates->facebookProfileLink->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_facebookProfileLink" class="recruitment_candidates_facebookProfileLink">
<span<?php echo $recruitment_candidates->facebookProfileLink->viewAttributes() ?>>
<?php echo $recruitment_candidates->facebookProfileLink->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->facebookProfileId->Visible) { // facebookProfileId ?>
		<td<?php echo $recruitment_candidates->facebookProfileId->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_facebookProfileId" class="recruitment_candidates_facebookProfileId">
<span<?php echo $recruitment_candidates->facebookProfileId->viewAttributes() ?>>
<?php echo $recruitment_candidates->facebookProfileId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->twitterProfileLink->Visible) { // twitterProfileLink ?>
		<td<?php echo $recruitment_candidates->twitterProfileLink->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_twitterProfileLink" class="recruitment_candidates_twitterProfileLink">
<span<?php echo $recruitment_candidates->twitterProfileLink->viewAttributes() ?>>
<?php echo $recruitment_candidates->twitterProfileLink->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->twitterProfileId->Visible) { // twitterProfileId ?>
		<td<?php echo $recruitment_candidates->twitterProfileId->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_twitterProfileId" class="recruitment_candidates_twitterProfileId">
<span<?php echo $recruitment_candidates->twitterProfileId->viewAttributes() ?>>
<?php echo $recruitment_candidates->twitterProfileId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->googleProfileLink->Visible) { // googleProfileLink ?>
		<td<?php echo $recruitment_candidates->googleProfileLink->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_googleProfileLink" class="recruitment_candidates_googleProfileLink">
<span<?php echo $recruitment_candidates->googleProfileLink->viewAttributes() ?>>
<?php echo $recruitment_candidates->googleProfileLink->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_candidates->googleProfileId->Visible) { // googleProfileId ?>
		<td<?php echo $recruitment_candidates->googleProfileId->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_delete->RowCnt ?>_recruitment_candidates_googleProfileId" class="recruitment_candidates_googleProfileId">
<span<?php echo $recruitment_candidates->googleProfileId->viewAttributes() ?>>
<?php echo $recruitment_candidates->googleProfileId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$recruitment_candidates_delete->Recordset->moveNext();
}
$recruitment_candidates_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $recruitment_candidates_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$recruitment_candidates_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$recruitment_candidates_delete->terminate();
?>