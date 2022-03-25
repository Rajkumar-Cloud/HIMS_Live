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
$recruitment_job_view = new recruitment_job_view();

// Run the page
$recruitment_job_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_job_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$recruitment_job->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var frecruitment_jobview = currentForm = new ew.Form("frecruitment_jobview", "view");

// Form_CustomValidate event
frecruitment_jobview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_jobview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
frecruitment_jobview.lists["x_showSalary"] = <?php echo $recruitment_job_view->showSalary->Lookup->toClientList() ?>;
frecruitment_jobview.lists["x_showSalary"].options = <?php echo JsonEncode($recruitment_job_view->showSalary->options(FALSE, TRUE)) ?>;
frecruitment_jobview.lists["x_status"] = <?php echo $recruitment_job_view->status->Lookup->toClientList() ?>;
frecruitment_jobview.lists["x_status"].options = <?php echo JsonEncode($recruitment_job_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$recruitment_job->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $recruitment_job_view->ExportOptions->render("body") ?>
<?php $recruitment_job_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $recruitment_job_view->showPageHeader(); ?>
<?php
$recruitment_job_view->showMessage();
?>
<form name="frecruitment_jobview" id="frecruitment_jobview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_job_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_job_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_job">
<input type="hidden" name="modal" value="<?php echo (int)$recruitment_job_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($recruitment_job->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_id"><?php echo $recruitment_job->id->caption() ?></span></td>
		<td data-name="id"<?php echo $recruitment_job->id->cellAttributes() ?>>
<span id="el_recruitment_job_id">
<span<?php echo $recruitment_job->id->viewAttributes() ?>>
<?php echo $recruitment_job->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->title->Visible) { // title ?>
	<tr id="r_title">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_title"><?php echo $recruitment_job->title->caption() ?></span></td>
		<td data-name="title"<?php echo $recruitment_job->title->cellAttributes() ?>>
<span id="el_recruitment_job_title">
<span<?php echo $recruitment_job->title->viewAttributes() ?>>
<?php echo $recruitment_job->title->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->shortDescription->Visible) { // shortDescription ?>
	<tr id="r_shortDescription">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_shortDescription"><?php echo $recruitment_job->shortDescription->caption() ?></span></td>
		<td data-name="shortDescription"<?php echo $recruitment_job->shortDescription->cellAttributes() ?>>
<span id="el_recruitment_job_shortDescription">
<span<?php echo $recruitment_job->shortDescription->viewAttributes() ?>>
<?php echo $recruitment_job->shortDescription->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_description"><?php echo $recruitment_job->description->caption() ?></span></td>
		<td data-name="description"<?php echo $recruitment_job->description->cellAttributes() ?>>
<span id="el_recruitment_job_description">
<span<?php echo $recruitment_job->description->viewAttributes() ?>>
<?php echo $recruitment_job->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->requirements->Visible) { // requirements ?>
	<tr id="r_requirements">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_requirements"><?php echo $recruitment_job->requirements->caption() ?></span></td>
		<td data-name="requirements"<?php echo $recruitment_job->requirements->cellAttributes() ?>>
<span id="el_recruitment_job_requirements">
<span<?php echo $recruitment_job->requirements->viewAttributes() ?>>
<?php echo $recruitment_job->requirements->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->benefits->Visible) { // benefits ?>
	<tr id="r_benefits">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_benefits"><?php echo $recruitment_job->benefits->caption() ?></span></td>
		<td data-name="benefits"<?php echo $recruitment_job->benefits->cellAttributes() ?>>
<span id="el_recruitment_job_benefits">
<span<?php echo $recruitment_job->benefits->viewAttributes() ?>>
<?php echo $recruitment_job->benefits->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->country->Visible) { // country ?>
	<tr id="r_country">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_country"><?php echo $recruitment_job->country->caption() ?></span></td>
		<td data-name="country"<?php echo $recruitment_job->country->cellAttributes() ?>>
<span id="el_recruitment_job_country">
<span<?php echo $recruitment_job->country->viewAttributes() ?>>
<?php echo $recruitment_job->country->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->company->Visible) { // company ?>
	<tr id="r_company">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_company"><?php echo $recruitment_job->company->caption() ?></span></td>
		<td data-name="company"<?php echo $recruitment_job->company->cellAttributes() ?>>
<span id="el_recruitment_job_company">
<span<?php echo $recruitment_job->company->viewAttributes() ?>>
<?php echo $recruitment_job->company->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->department->Visible) { // department ?>
	<tr id="r_department">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_department"><?php echo $recruitment_job->department->caption() ?></span></td>
		<td data-name="department"<?php echo $recruitment_job->department->cellAttributes() ?>>
<span id="el_recruitment_job_department">
<span<?php echo $recruitment_job->department->viewAttributes() ?>>
<?php echo $recruitment_job->department->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->code->Visible) { // code ?>
	<tr id="r_code">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_code"><?php echo $recruitment_job->code->caption() ?></span></td>
		<td data-name="code"<?php echo $recruitment_job->code->cellAttributes() ?>>
<span id="el_recruitment_job_code">
<span<?php echo $recruitment_job->code->viewAttributes() ?>>
<?php echo $recruitment_job->code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->employementType->Visible) { // employementType ?>
	<tr id="r_employementType">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_employementType"><?php echo $recruitment_job->employementType->caption() ?></span></td>
		<td data-name="employementType"<?php echo $recruitment_job->employementType->cellAttributes() ?>>
<span id="el_recruitment_job_employementType">
<span<?php echo $recruitment_job->employementType->viewAttributes() ?>>
<?php echo $recruitment_job->employementType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->industry->Visible) { // industry ?>
	<tr id="r_industry">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_industry"><?php echo $recruitment_job->industry->caption() ?></span></td>
		<td data-name="industry"<?php echo $recruitment_job->industry->cellAttributes() ?>>
<span id="el_recruitment_job_industry">
<span<?php echo $recruitment_job->industry->viewAttributes() ?>>
<?php echo $recruitment_job->industry->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->experienceLevel->Visible) { // experienceLevel ?>
	<tr id="r_experienceLevel">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_experienceLevel"><?php echo $recruitment_job->experienceLevel->caption() ?></span></td>
		<td data-name="experienceLevel"<?php echo $recruitment_job->experienceLevel->cellAttributes() ?>>
<span id="el_recruitment_job_experienceLevel">
<span<?php echo $recruitment_job->experienceLevel->viewAttributes() ?>>
<?php echo $recruitment_job->experienceLevel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->jobFunction->Visible) { // jobFunction ?>
	<tr id="r_jobFunction">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_jobFunction"><?php echo $recruitment_job->jobFunction->caption() ?></span></td>
		<td data-name="jobFunction"<?php echo $recruitment_job->jobFunction->cellAttributes() ?>>
<span id="el_recruitment_job_jobFunction">
<span<?php echo $recruitment_job->jobFunction->viewAttributes() ?>>
<?php echo $recruitment_job->jobFunction->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->educationLevel->Visible) { // educationLevel ?>
	<tr id="r_educationLevel">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_educationLevel"><?php echo $recruitment_job->educationLevel->caption() ?></span></td>
		<td data-name="educationLevel"<?php echo $recruitment_job->educationLevel->cellAttributes() ?>>
<span id="el_recruitment_job_educationLevel">
<span<?php echo $recruitment_job->educationLevel->viewAttributes() ?>>
<?php echo $recruitment_job->educationLevel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->currency->Visible) { // currency ?>
	<tr id="r_currency">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_currency"><?php echo $recruitment_job->currency->caption() ?></span></td>
		<td data-name="currency"<?php echo $recruitment_job->currency->cellAttributes() ?>>
<span id="el_recruitment_job_currency">
<span<?php echo $recruitment_job->currency->viewAttributes() ?>>
<?php echo $recruitment_job->currency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->showSalary->Visible) { // showSalary ?>
	<tr id="r_showSalary">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_showSalary"><?php echo $recruitment_job->showSalary->caption() ?></span></td>
		<td data-name="showSalary"<?php echo $recruitment_job->showSalary->cellAttributes() ?>>
<span id="el_recruitment_job_showSalary">
<span<?php echo $recruitment_job->showSalary->viewAttributes() ?>>
<?php echo $recruitment_job->showSalary->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->salaryMin->Visible) { // salaryMin ?>
	<tr id="r_salaryMin">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_salaryMin"><?php echo $recruitment_job->salaryMin->caption() ?></span></td>
		<td data-name="salaryMin"<?php echo $recruitment_job->salaryMin->cellAttributes() ?>>
<span id="el_recruitment_job_salaryMin">
<span<?php echo $recruitment_job->salaryMin->viewAttributes() ?>>
<?php echo $recruitment_job->salaryMin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->salaryMax->Visible) { // salaryMax ?>
	<tr id="r_salaryMax">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_salaryMax"><?php echo $recruitment_job->salaryMax->caption() ?></span></td>
		<td data-name="salaryMax"<?php echo $recruitment_job->salaryMax->cellAttributes() ?>>
<span id="el_recruitment_job_salaryMax">
<span<?php echo $recruitment_job->salaryMax->viewAttributes() ?>>
<?php echo $recruitment_job->salaryMax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->keywords->Visible) { // keywords ?>
	<tr id="r_keywords">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_keywords"><?php echo $recruitment_job->keywords->caption() ?></span></td>
		<td data-name="keywords"<?php echo $recruitment_job->keywords->cellAttributes() ?>>
<span id="el_recruitment_job_keywords">
<span<?php echo $recruitment_job->keywords->viewAttributes() ?>>
<?php echo $recruitment_job->keywords->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_status"><?php echo $recruitment_job->status->caption() ?></span></td>
		<td data-name="status"<?php echo $recruitment_job->status->cellAttributes() ?>>
<span id="el_recruitment_job_status">
<span<?php echo $recruitment_job->status->viewAttributes() ?>>
<?php echo $recruitment_job->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->closingDate->Visible) { // closingDate ?>
	<tr id="r_closingDate">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_closingDate"><?php echo $recruitment_job->closingDate->caption() ?></span></td>
		<td data-name="closingDate"<?php echo $recruitment_job->closingDate->cellAttributes() ?>>
<span id="el_recruitment_job_closingDate">
<span<?php echo $recruitment_job->closingDate->viewAttributes() ?>>
<?php echo $recruitment_job->closingDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->attachment->Visible) { // attachment ?>
	<tr id="r_attachment">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_attachment"><?php echo $recruitment_job->attachment->caption() ?></span></td>
		<td data-name="attachment"<?php echo $recruitment_job->attachment->cellAttributes() ?>>
<span id="el_recruitment_job_attachment">
<span<?php echo $recruitment_job->attachment->viewAttributes() ?>>
<?php echo $recruitment_job->attachment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->display->Visible) { // display ?>
	<tr id="r_display">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_display"><?php echo $recruitment_job->display->caption() ?></span></td>
		<td data-name="display"<?php echo $recruitment_job->display->cellAttributes() ?>>
<span id="el_recruitment_job_display">
<span<?php echo $recruitment_job->display->viewAttributes() ?>>
<?php echo $recruitment_job->display->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recruitment_job->postedBy->Visible) { // postedBy ?>
	<tr id="r_postedBy">
		<td class="<?php echo $recruitment_job_view->TableLeftColumnClass ?>"><span id="elh_recruitment_job_postedBy"><?php echo $recruitment_job->postedBy->caption() ?></span></td>
		<td data-name="postedBy"<?php echo $recruitment_job->postedBy->cellAttributes() ?>>
<span id="el_recruitment_job_postedBy">
<span<?php echo $recruitment_job->postedBy->viewAttributes() ?>>
<?php echo $recruitment_job->postedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$recruitment_job_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$recruitment_job->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$recruitment_job_view->terminate();
?>