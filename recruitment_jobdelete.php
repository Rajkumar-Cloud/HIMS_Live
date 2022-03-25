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
$recruitment_job_delete = new recruitment_job_delete();

// Run the page
$recruitment_job_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_job_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var frecruitment_jobdelete = currentForm = new ew.Form("frecruitment_jobdelete", "delete");

// Form_CustomValidate event
frecruitment_jobdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_jobdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
frecruitment_jobdelete.lists["x_showSalary"] = <?php echo $recruitment_job_delete->showSalary->Lookup->toClientList() ?>;
frecruitment_jobdelete.lists["x_showSalary"].options = <?php echo JsonEncode($recruitment_job_delete->showSalary->options(FALSE, TRUE)) ?>;
frecruitment_jobdelete.lists["x_status"] = <?php echo $recruitment_job_delete->status->Lookup->toClientList() ?>;
frecruitment_jobdelete.lists["x_status"].options = <?php echo JsonEncode($recruitment_job_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $recruitment_job_delete->showPageHeader(); ?>
<?php
$recruitment_job_delete->showMessage();
?>
<form name="frecruitment_jobdelete" id="frecruitment_jobdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_job_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_job_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_job">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($recruitment_job_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($recruitment_job->id->Visible) { // id ?>
		<th class="<?php echo $recruitment_job->id->headerCellClass() ?>"><span id="elh_recruitment_job_id" class="recruitment_job_id"><?php echo $recruitment_job->id->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->title->Visible) { // title ?>
		<th class="<?php echo $recruitment_job->title->headerCellClass() ?>"><span id="elh_recruitment_job_title" class="recruitment_job_title"><?php echo $recruitment_job->title->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->country->Visible) { // country ?>
		<th class="<?php echo $recruitment_job->country->headerCellClass() ?>"><span id="elh_recruitment_job_country" class="recruitment_job_country"><?php echo $recruitment_job->country->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->company->Visible) { // company ?>
		<th class="<?php echo $recruitment_job->company->headerCellClass() ?>"><span id="elh_recruitment_job_company" class="recruitment_job_company"><?php echo $recruitment_job->company->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->department->Visible) { // department ?>
		<th class="<?php echo $recruitment_job->department->headerCellClass() ?>"><span id="elh_recruitment_job_department" class="recruitment_job_department"><?php echo $recruitment_job->department->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->code->Visible) { // code ?>
		<th class="<?php echo $recruitment_job->code->headerCellClass() ?>"><span id="elh_recruitment_job_code" class="recruitment_job_code"><?php echo $recruitment_job->code->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->employementType->Visible) { // employementType ?>
		<th class="<?php echo $recruitment_job->employementType->headerCellClass() ?>"><span id="elh_recruitment_job_employementType" class="recruitment_job_employementType"><?php echo $recruitment_job->employementType->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->industry->Visible) { // industry ?>
		<th class="<?php echo $recruitment_job->industry->headerCellClass() ?>"><span id="elh_recruitment_job_industry" class="recruitment_job_industry"><?php echo $recruitment_job->industry->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->experienceLevel->Visible) { // experienceLevel ?>
		<th class="<?php echo $recruitment_job->experienceLevel->headerCellClass() ?>"><span id="elh_recruitment_job_experienceLevel" class="recruitment_job_experienceLevel"><?php echo $recruitment_job->experienceLevel->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->jobFunction->Visible) { // jobFunction ?>
		<th class="<?php echo $recruitment_job->jobFunction->headerCellClass() ?>"><span id="elh_recruitment_job_jobFunction" class="recruitment_job_jobFunction"><?php echo $recruitment_job->jobFunction->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->educationLevel->Visible) { // educationLevel ?>
		<th class="<?php echo $recruitment_job->educationLevel->headerCellClass() ?>"><span id="elh_recruitment_job_educationLevel" class="recruitment_job_educationLevel"><?php echo $recruitment_job->educationLevel->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->currency->Visible) { // currency ?>
		<th class="<?php echo $recruitment_job->currency->headerCellClass() ?>"><span id="elh_recruitment_job_currency" class="recruitment_job_currency"><?php echo $recruitment_job->currency->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->showSalary->Visible) { // showSalary ?>
		<th class="<?php echo $recruitment_job->showSalary->headerCellClass() ?>"><span id="elh_recruitment_job_showSalary" class="recruitment_job_showSalary"><?php echo $recruitment_job->showSalary->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->salaryMin->Visible) { // salaryMin ?>
		<th class="<?php echo $recruitment_job->salaryMin->headerCellClass() ?>"><span id="elh_recruitment_job_salaryMin" class="recruitment_job_salaryMin"><?php echo $recruitment_job->salaryMin->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->salaryMax->Visible) { // salaryMax ?>
		<th class="<?php echo $recruitment_job->salaryMax->headerCellClass() ?>"><span id="elh_recruitment_job_salaryMax" class="recruitment_job_salaryMax"><?php echo $recruitment_job->salaryMax->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->status->Visible) { // status ?>
		<th class="<?php echo $recruitment_job->status->headerCellClass() ?>"><span id="elh_recruitment_job_status" class="recruitment_job_status"><?php echo $recruitment_job->status->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->closingDate->Visible) { // closingDate ?>
		<th class="<?php echo $recruitment_job->closingDate->headerCellClass() ?>"><span id="elh_recruitment_job_closingDate" class="recruitment_job_closingDate"><?php echo $recruitment_job->closingDate->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->attachment->Visible) { // attachment ?>
		<th class="<?php echo $recruitment_job->attachment->headerCellClass() ?>"><span id="elh_recruitment_job_attachment" class="recruitment_job_attachment"><?php echo $recruitment_job->attachment->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->display->Visible) { // display ?>
		<th class="<?php echo $recruitment_job->display->headerCellClass() ?>"><span id="elh_recruitment_job_display" class="recruitment_job_display"><?php echo $recruitment_job->display->caption() ?></span></th>
<?php } ?>
<?php if ($recruitment_job->postedBy->Visible) { // postedBy ?>
		<th class="<?php echo $recruitment_job->postedBy->headerCellClass() ?>"><span id="elh_recruitment_job_postedBy" class="recruitment_job_postedBy"><?php echo $recruitment_job->postedBy->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$recruitment_job_delete->RecCnt = 0;
$i = 0;
while (!$recruitment_job_delete->Recordset->EOF) {
	$recruitment_job_delete->RecCnt++;
	$recruitment_job_delete->RowCnt++;

	// Set row properties
	$recruitment_job->resetAttributes();
	$recruitment_job->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$recruitment_job_delete->loadRowValues($recruitment_job_delete->Recordset);

	// Render row
	$recruitment_job_delete->renderRow();
?>
	<tr<?php echo $recruitment_job->rowAttributes() ?>>
<?php if ($recruitment_job->id->Visible) { // id ?>
		<td<?php echo $recruitment_job->id->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_id" class="recruitment_job_id">
<span<?php echo $recruitment_job->id->viewAttributes() ?>>
<?php echo $recruitment_job->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->title->Visible) { // title ?>
		<td<?php echo $recruitment_job->title->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_title" class="recruitment_job_title">
<span<?php echo $recruitment_job->title->viewAttributes() ?>>
<?php echo $recruitment_job->title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->country->Visible) { // country ?>
		<td<?php echo $recruitment_job->country->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_country" class="recruitment_job_country">
<span<?php echo $recruitment_job->country->viewAttributes() ?>>
<?php echo $recruitment_job->country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->company->Visible) { // company ?>
		<td<?php echo $recruitment_job->company->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_company" class="recruitment_job_company">
<span<?php echo $recruitment_job->company->viewAttributes() ?>>
<?php echo $recruitment_job->company->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->department->Visible) { // department ?>
		<td<?php echo $recruitment_job->department->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_department" class="recruitment_job_department">
<span<?php echo $recruitment_job->department->viewAttributes() ?>>
<?php echo $recruitment_job->department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->code->Visible) { // code ?>
		<td<?php echo $recruitment_job->code->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_code" class="recruitment_job_code">
<span<?php echo $recruitment_job->code->viewAttributes() ?>>
<?php echo $recruitment_job->code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->employementType->Visible) { // employementType ?>
		<td<?php echo $recruitment_job->employementType->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_employementType" class="recruitment_job_employementType">
<span<?php echo $recruitment_job->employementType->viewAttributes() ?>>
<?php echo $recruitment_job->employementType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->industry->Visible) { // industry ?>
		<td<?php echo $recruitment_job->industry->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_industry" class="recruitment_job_industry">
<span<?php echo $recruitment_job->industry->viewAttributes() ?>>
<?php echo $recruitment_job->industry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->experienceLevel->Visible) { // experienceLevel ?>
		<td<?php echo $recruitment_job->experienceLevel->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_experienceLevel" class="recruitment_job_experienceLevel">
<span<?php echo $recruitment_job->experienceLevel->viewAttributes() ?>>
<?php echo $recruitment_job->experienceLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->jobFunction->Visible) { // jobFunction ?>
		<td<?php echo $recruitment_job->jobFunction->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_jobFunction" class="recruitment_job_jobFunction">
<span<?php echo $recruitment_job->jobFunction->viewAttributes() ?>>
<?php echo $recruitment_job->jobFunction->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->educationLevel->Visible) { // educationLevel ?>
		<td<?php echo $recruitment_job->educationLevel->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_educationLevel" class="recruitment_job_educationLevel">
<span<?php echo $recruitment_job->educationLevel->viewAttributes() ?>>
<?php echo $recruitment_job->educationLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->currency->Visible) { // currency ?>
		<td<?php echo $recruitment_job->currency->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_currency" class="recruitment_job_currency">
<span<?php echo $recruitment_job->currency->viewAttributes() ?>>
<?php echo $recruitment_job->currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->showSalary->Visible) { // showSalary ?>
		<td<?php echo $recruitment_job->showSalary->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_showSalary" class="recruitment_job_showSalary">
<span<?php echo $recruitment_job->showSalary->viewAttributes() ?>>
<?php echo $recruitment_job->showSalary->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->salaryMin->Visible) { // salaryMin ?>
		<td<?php echo $recruitment_job->salaryMin->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_salaryMin" class="recruitment_job_salaryMin">
<span<?php echo $recruitment_job->salaryMin->viewAttributes() ?>>
<?php echo $recruitment_job->salaryMin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->salaryMax->Visible) { // salaryMax ?>
		<td<?php echo $recruitment_job->salaryMax->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_salaryMax" class="recruitment_job_salaryMax">
<span<?php echo $recruitment_job->salaryMax->viewAttributes() ?>>
<?php echo $recruitment_job->salaryMax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->status->Visible) { // status ?>
		<td<?php echo $recruitment_job->status->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_status" class="recruitment_job_status">
<span<?php echo $recruitment_job->status->viewAttributes() ?>>
<?php echo $recruitment_job->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->closingDate->Visible) { // closingDate ?>
		<td<?php echo $recruitment_job->closingDate->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_closingDate" class="recruitment_job_closingDate">
<span<?php echo $recruitment_job->closingDate->viewAttributes() ?>>
<?php echo $recruitment_job->closingDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->attachment->Visible) { // attachment ?>
		<td<?php echo $recruitment_job->attachment->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_attachment" class="recruitment_job_attachment">
<span<?php echo $recruitment_job->attachment->viewAttributes() ?>>
<?php echo $recruitment_job->attachment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->display->Visible) { // display ?>
		<td<?php echo $recruitment_job->display->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_display" class="recruitment_job_display">
<span<?php echo $recruitment_job->display->viewAttributes() ?>>
<?php echo $recruitment_job->display->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recruitment_job->postedBy->Visible) { // postedBy ?>
		<td<?php echo $recruitment_job->postedBy->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_delete->RowCnt ?>_recruitment_job_postedBy" class="recruitment_job_postedBy">
<span<?php echo $recruitment_job->postedBy->viewAttributes() ?>>
<?php echo $recruitment_job->postedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$recruitment_job_delete->Recordset->moveNext();
}
$recruitment_job_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $recruitment_job_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$recruitment_job_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$recruitment_job_delete->terminate();
?>