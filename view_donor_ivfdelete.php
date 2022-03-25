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
$view_donor_ivf_delete = new view_donor_ivf_delete();

// Run the page
$view_donor_ivf_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_donor_ivf_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fview_donor_ivfdelete = currentForm = new ew.Form("fview_donor_ivfdelete", "delete");

// Form_CustomValidate event
fview_donor_ivfdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_donor_ivfdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_donor_ivfdelete.lists["x_Female"] = <?php echo $view_donor_ivf_delete->Female->Lookup->toClientList() ?>;
fview_donor_ivfdelete.lists["x_Female"].options = <?php echo JsonEncode($view_donor_ivf_delete->Female->lookupOptions()) ?>;
fview_donor_ivfdelete.lists["x_status"] = <?php echo $view_donor_ivf_delete->status->Lookup->toClientList() ?>;
fview_donor_ivfdelete.lists["x_status"].options = <?php echo JsonEncode($view_donor_ivf_delete->status->lookupOptions()) ?>;
fview_donor_ivfdelete.lists["x_ReferedBy"] = <?php echo $view_donor_ivf_delete->ReferedBy->Lookup->toClientList() ?>;
fview_donor_ivfdelete.lists["x_ReferedBy"].options = <?php echo JsonEncode($view_donor_ivf_delete->ReferedBy->lookupOptions()) ?>;
fview_donor_ivfdelete.lists["x_DrID"] = <?php echo $view_donor_ivf_delete->DrID->Lookup->toClientList() ?>;
fview_donor_ivfdelete.lists["x_DrID"].options = <?php echo JsonEncode($view_donor_ivf_delete->DrID->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_donor_ivf_delete->showPageHeader(); ?>
<?php
$view_donor_ivf_delete->showMessage();
?>
<form name="fview_donor_ivfdelete" id="fview_donor_ivfdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_donor_ivf_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_donor_ivf_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_donor_ivf">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_donor_ivf_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_donor_ivf->id->Visible) { // id ?>
		<th class="<?php echo $view_donor_ivf->id->headerCellClass() ?>"><span id="elh_view_donor_ivf_id" class="view_donor_ivf_id"><?php echo $view_donor_ivf->id->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->Male->Visible) { // Male ?>
		<th class="<?php echo $view_donor_ivf->Male->headerCellClass() ?>"><span id="elh_view_donor_ivf_Male" class="view_donor_ivf_Male"><?php echo $view_donor_ivf->Male->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->Female->Visible) { // Female ?>
		<th class="<?php echo $view_donor_ivf->Female->headerCellClass() ?>"><span id="elh_view_donor_ivf_Female" class="view_donor_ivf_Female"><?php echo $view_donor_ivf->Female->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->status->Visible) { // status ?>
		<th class="<?php echo $view_donor_ivf->status->headerCellClass() ?>"><span id="elh_view_donor_ivf_status" class="view_donor_ivf_status"><?php echo $view_donor_ivf->status->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->createdby->Visible) { // createdby ?>
		<th class="<?php echo $view_donor_ivf->createdby->headerCellClass() ?>"><span id="elh_view_donor_ivf_createdby" class="view_donor_ivf_createdby"><?php echo $view_donor_ivf->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $view_donor_ivf->createddatetime->headerCellClass() ?>"><span id="elh_view_donor_ivf_createddatetime" class="view_donor_ivf_createddatetime"><?php echo $view_donor_ivf->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $view_donor_ivf->modifiedby->headerCellClass() ?>"><span id="elh_view_donor_ivf_modifiedby" class="view_donor_ivf_modifiedby"><?php echo $view_donor_ivf->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $view_donor_ivf->modifieddatetime->headerCellClass() ?>"><span id="elh_view_donor_ivf_modifieddatetime" class="view_donor_ivf_modifieddatetime"><?php echo $view_donor_ivf->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->malepropic->Visible) { // malepropic ?>
		<th class="<?php echo $view_donor_ivf->malepropic->headerCellClass() ?>"><span id="elh_view_donor_ivf_malepropic" class="view_donor_ivf_malepropic"><?php echo $view_donor_ivf->malepropic->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->femalepropic->Visible) { // femalepropic ?>
		<th class="<?php echo $view_donor_ivf->femalepropic->headerCellClass() ?>"><span id="elh_view_donor_ivf_femalepropic" class="view_donor_ivf_femalepropic"><?php echo $view_donor_ivf->femalepropic->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->HusbandEducation->Visible) { // HusbandEducation ?>
		<th class="<?php echo $view_donor_ivf->HusbandEducation->headerCellClass() ?>"><span id="elh_view_donor_ivf_HusbandEducation" class="view_donor_ivf_HusbandEducation"><?php echo $view_donor_ivf->HusbandEducation->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->WifeEducation->Visible) { // WifeEducation ?>
		<th class="<?php echo $view_donor_ivf->WifeEducation->headerCellClass() ?>"><span id="elh_view_donor_ivf_WifeEducation" class="view_donor_ivf_WifeEducation"><?php echo $view_donor_ivf->WifeEducation->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
		<th class="<?php echo $view_donor_ivf->HusbandWorkHours->headerCellClass() ?>"><span id="elh_view_donor_ivf_HusbandWorkHours" class="view_donor_ivf_HusbandWorkHours"><?php echo $view_donor_ivf->HusbandWorkHours->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->WifeWorkHours->Visible) { // WifeWorkHours ?>
		<th class="<?php echo $view_donor_ivf->WifeWorkHours->headerCellClass() ?>"><span id="elh_view_donor_ivf_WifeWorkHours" class="view_donor_ivf_WifeWorkHours"><?php echo $view_donor_ivf->WifeWorkHours->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->PatientLanguage->Visible) { // PatientLanguage ?>
		<th class="<?php echo $view_donor_ivf->PatientLanguage->headerCellClass() ?>"><span id="elh_view_donor_ivf_PatientLanguage" class="view_donor_ivf_PatientLanguage"><?php echo $view_donor_ivf->PatientLanguage->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->ReferedBy->Visible) { // ReferedBy ?>
		<th class="<?php echo $view_donor_ivf->ReferedBy->headerCellClass() ?>"><span id="elh_view_donor_ivf_ReferedBy" class="view_donor_ivf_ReferedBy"><?php echo $view_donor_ivf->ReferedBy->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->ReferPhNo->Visible) { // ReferPhNo ?>
		<th class="<?php echo $view_donor_ivf->ReferPhNo->headerCellClass() ?>"><span id="elh_view_donor_ivf_ReferPhNo" class="view_donor_ivf_ReferPhNo"><?php echo $view_donor_ivf->ReferPhNo->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->WifeCell->Visible) { // WifeCell ?>
		<th class="<?php echo $view_donor_ivf->WifeCell->headerCellClass() ?>"><span id="elh_view_donor_ivf_WifeCell" class="view_donor_ivf_WifeCell"><?php echo $view_donor_ivf->WifeCell->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->HusbandCell->Visible) { // HusbandCell ?>
		<th class="<?php echo $view_donor_ivf->HusbandCell->headerCellClass() ?>"><span id="elh_view_donor_ivf_HusbandCell" class="view_donor_ivf_HusbandCell"><?php echo $view_donor_ivf->HusbandCell->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->WifeEmail->Visible) { // WifeEmail ?>
		<th class="<?php echo $view_donor_ivf->WifeEmail->headerCellClass() ?>"><span id="elh_view_donor_ivf_WifeEmail" class="view_donor_ivf_WifeEmail"><?php echo $view_donor_ivf->WifeEmail->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->HusbandEmail->Visible) { // HusbandEmail ?>
		<th class="<?php echo $view_donor_ivf->HusbandEmail->headerCellClass() ?>"><span id="elh_view_donor_ivf_HusbandEmail" class="view_donor_ivf_HusbandEmail"><?php echo $view_donor_ivf->HusbandEmail->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<th class="<?php echo $view_donor_ivf->ARTCYCLE->headerCellClass() ?>"><span id="elh_view_donor_ivf_ARTCYCLE" class="view_donor_ivf_ARTCYCLE"><?php echo $view_donor_ivf->ARTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->RESULT->Visible) { // RESULT ?>
		<th class="<?php echo $view_donor_ivf->RESULT->headerCellClass() ?>"><span id="elh_view_donor_ivf_RESULT" class="view_donor_ivf_RESULT"><?php echo $view_donor_ivf->RESULT->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->CoupleID->Visible) { // CoupleID ?>
		<th class="<?php echo $view_donor_ivf->CoupleID->headerCellClass() ?>"><span id="elh_view_donor_ivf_CoupleID" class="view_donor_ivf_CoupleID"><?php echo $view_donor_ivf->CoupleID->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->HospID->Visible) { // HospID ?>
		<th class="<?php echo $view_donor_ivf->HospID->headerCellClass() ?>"><span id="elh_view_donor_ivf_HospID" class="view_donor_ivf_HospID"><?php echo $view_donor_ivf->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $view_donor_ivf->PatientName->headerCellClass() ?>"><span id="elh_view_donor_ivf_PatientName" class="view_donor_ivf_PatientName"><?php echo $view_donor_ivf->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $view_donor_ivf->PatientID->headerCellClass() ?>"><span id="elh_view_donor_ivf_PatientID" class="view_donor_ivf_PatientID"><?php echo $view_donor_ivf->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $view_donor_ivf->PartnerName->headerCellClass() ?>"><span id="elh_view_donor_ivf_PartnerName" class="view_donor_ivf_PartnerName"><?php echo $view_donor_ivf->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->PartnerID->Visible) { // PartnerID ?>
		<th class="<?php echo $view_donor_ivf->PartnerID->headerCellClass() ?>"><span id="elh_view_donor_ivf_PartnerID" class="view_donor_ivf_PartnerID"><?php echo $view_donor_ivf->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->DrID->Visible) { // DrID ?>
		<th class="<?php echo $view_donor_ivf->DrID->headerCellClass() ?>"><span id="elh_view_donor_ivf_DrID" class="view_donor_ivf_DrID"><?php echo $view_donor_ivf->DrID->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->DrDepartment->Visible) { // DrDepartment ?>
		<th class="<?php echo $view_donor_ivf->DrDepartment->headerCellClass() ?>"><span id="elh_view_donor_ivf_DrDepartment" class="view_donor_ivf_DrDepartment"><?php echo $view_donor_ivf->DrDepartment->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf->Doctor->Visible) { // Doctor ?>
		<th class="<?php echo $view_donor_ivf->Doctor->headerCellClass() ?>"><span id="elh_view_donor_ivf_Doctor" class="view_donor_ivf_Doctor"><?php echo $view_donor_ivf->Doctor->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_donor_ivf_delete->RecCnt = 0;
$i = 0;
while (!$view_donor_ivf_delete->Recordset->EOF) {
	$view_donor_ivf_delete->RecCnt++;
	$view_donor_ivf_delete->RowCnt++;

	// Set row properties
	$view_donor_ivf->resetAttributes();
	$view_donor_ivf->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_donor_ivf_delete->loadRowValues($view_donor_ivf_delete->Recordset);

	// Render row
	$view_donor_ivf_delete->renderRow();
?>
	<tr<?php echo $view_donor_ivf->rowAttributes() ?>>
<?php if ($view_donor_ivf->id->Visible) { // id ?>
		<td<?php echo $view_donor_ivf->id->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_id" class="view_donor_ivf_id">
<span<?php echo $view_donor_ivf->id->viewAttributes() ?>>
<?php echo $view_donor_ivf->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->Male->Visible) { // Male ?>
		<td<?php echo $view_donor_ivf->Male->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_Male" class="view_donor_ivf_Male">
<span<?php echo $view_donor_ivf->Male->viewAttributes() ?>>
<?php echo $view_donor_ivf->Male->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->Female->Visible) { // Female ?>
		<td<?php echo $view_donor_ivf->Female->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_Female" class="view_donor_ivf_Female">
<span<?php echo $view_donor_ivf->Female->viewAttributes() ?>>
<?php echo $view_donor_ivf->Female->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->status->Visible) { // status ?>
		<td<?php echo $view_donor_ivf->status->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_status" class="view_donor_ivf_status">
<span<?php echo $view_donor_ivf->status->viewAttributes() ?>>
<?php echo $view_donor_ivf->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->createdby->Visible) { // createdby ?>
		<td<?php echo $view_donor_ivf->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_createdby" class="view_donor_ivf_createdby">
<span<?php echo $view_donor_ivf->createdby->viewAttributes() ?>>
<?php echo $view_donor_ivf->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $view_donor_ivf->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_createddatetime" class="view_donor_ivf_createddatetime">
<span<?php echo $view_donor_ivf->createddatetime->viewAttributes() ?>>
<?php echo $view_donor_ivf->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $view_donor_ivf->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_modifiedby" class="view_donor_ivf_modifiedby">
<span<?php echo $view_donor_ivf->modifiedby->viewAttributes() ?>>
<?php echo $view_donor_ivf->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $view_donor_ivf->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_modifieddatetime" class="view_donor_ivf_modifieddatetime">
<span<?php echo $view_donor_ivf->modifieddatetime->viewAttributes() ?>>
<?php echo $view_donor_ivf->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->malepropic->Visible) { // malepropic ?>
		<td<?php echo $view_donor_ivf->malepropic->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_malepropic" class="view_donor_ivf_malepropic">
<span>
<?php echo GetFileViewTag($view_donor_ivf->malepropic, $view_donor_ivf->malepropic->getViewValue()) ?>
</span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->femalepropic->Visible) { // femalepropic ?>
		<td<?php echo $view_donor_ivf->femalepropic->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_femalepropic" class="view_donor_ivf_femalepropic">
<span>
<?php echo GetFileViewTag($view_donor_ivf->femalepropic, $view_donor_ivf->femalepropic->getViewValue()) ?>
</span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->HusbandEducation->Visible) { // HusbandEducation ?>
		<td<?php echo $view_donor_ivf->HusbandEducation->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_HusbandEducation" class="view_donor_ivf_HusbandEducation">
<span<?php echo $view_donor_ivf->HusbandEducation->viewAttributes() ?>>
<?php echo $view_donor_ivf->HusbandEducation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->WifeEducation->Visible) { // WifeEducation ?>
		<td<?php echo $view_donor_ivf->WifeEducation->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_WifeEducation" class="view_donor_ivf_WifeEducation">
<span<?php echo $view_donor_ivf->WifeEducation->viewAttributes() ?>>
<?php echo $view_donor_ivf->WifeEducation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
		<td<?php echo $view_donor_ivf->HusbandWorkHours->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_HusbandWorkHours" class="view_donor_ivf_HusbandWorkHours">
<span<?php echo $view_donor_ivf->HusbandWorkHours->viewAttributes() ?>>
<?php echo $view_donor_ivf->HusbandWorkHours->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->WifeWorkHours->Visible) { // WifeWorkHours ?>
		<td<?php echo $view_donor_ivf->WifeWorkHours->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_WifeWorkHours" class="view_donor_ivf_WifeWorkHours">
<span<?php echo $view_donor_ivf->WifeWorkHours->viewAttributes() ?>>
<?php echo $view_donor_ivf->WifeWorkHours->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->PatientLanguage->Visible) { // PatientLanguage ?>
		<td<?php echo $view_donor_ivf->PatientLanguage->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_PatientLanguage" class="view_donor_ivf_PatientLanguage">
<span<?php echo $view_donor_ivf->PatientLanguage->viewAttributes() ?>>
<?php echo $view_donor_ivf->PatientLanguage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->ReferedBy->Visible) { // ReferedBy ?>
		<td<?php echo $view_donor_ivf->ReferedBy->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_ReferedBy" class="view_donor_ivf_ReferedBy">
<span<?php echo $view_donor_ivf->ReferedBy->viewAttributes() ?>>
<?php echo $view_donor_ivf->ReferedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->ReferPhNo->Visible) { // ReferPhNo ?>
		<td<?php echo $view_donor_ivf->ReferPhNo->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_ReferPhNo" class="view_donor_ivf_ReferPhNo">
<span<?php echo $view_donor_ivf->ReferPhNo->viewAttributes() ?>>
<?php echo $view_donor_ivf->ReferPhNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->WifeCell->Visible) { // WifeCell ?>
		<td<?php echo $view_donor_ivf->WifeCell->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_WifeCell" class="view_donor_ivf_WifeCell">
<span<?php echo $view_donor_ivf->WifeCell->viewAttributes() ?>>
<?php echo $view_donor_ivf->WifeCell->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->HusbandCell->Visible) { // HusbandCell ?>
		<td<?php echo $view_donor_ivf->HusbandCell->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_HusbandCell" class="view_donor_ivf_HusbandCell">
<span<?php echo $view_donor_ivf->HusbandCell->viewAttributes() ?>>
<?php echo $view_donor_ivf->HusbandCell->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->WifeEmail->Visible) { // WifeEmail ?>
		<td<?php echo $view_donor_ivf->WifeEmail->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_WifeEmail" class="view_donor_ivf_WifeEmail">
<span<?php echo $view_donor_ivf->WifeEmail->viewAttributes() ?>>
<?php echo $view_donor_ivf->WifeEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->HusbandEmail->Visible) { // HusbandEmail ?>
		<td<?php echo $view_donor_ivf->HusbandEmail->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_HusbandEmail" class="view_donor_ivf_HusbandEmail">
<span<?php echo $view_donor_ivf->HusbandEmail->viewAttributes() ?>>
<?php echo $view_donor_ivf->HusbandEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td<?php echo $view_donor_ivf->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_ARTCYCLE" class="view_donor_ivf_ARTCYCLE">
<span<?php echo $view_donor_ivf->ARTCYCLE->viewAttributes() ?>>
<?php echo $view_donor_ivf->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->RESULT->Visible) { // RESULT ?>
		<td<?php echo $view_donor_ivf->RESULT->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_RESULT" class="view_donor_ivf_RESULT">
<span<?php echo $view_donor_ivf->RESULT->viewAttributes() ?>>
<?php echo $view_donor_ivf->RESULT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->CoupleID->Visible) { // CoupleID ?>
		<td<?php echo $view_donor_ivf->CoupleID->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_CoupleID" class="view_donor_ivf_CoupleID">
<span<?php echo $view_donor_ivf->CoupleID->viewAttributes() ?>>
<?php echo $view_donor_ivf->CoupleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->HospID->Visible) { // HospID ?>
		<td<?php echo $view_donor_ivf->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_HospID" class="view_donor_ivf_HospID">
<span<?php echo $view_donor_ivf->HospID->viewAttributes() ?>>
<?php echo $view_donor_ivf->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->PatientName->Visible) { // PatientName ?>
		<td<?php echo $view_donor_ivf->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_PatientName" class="view_donor_ivf_PatientName">
<span<?php echo $view_donor_ivf->PatientName->viewAttributes() ?>>
<?php echo $view_donor_ivf->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->PatientID->Visible) { // PatientID ?>
		<td<?php echo $view_donor_ivf->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_PatientID" class="view_donor_ivf_PatientID">
<span<?php echo $view_donor_ivf->PatientID->viewAttributes() ?>>
<?php echo $view_donor_ivf->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->PartnerName->Visible) { // PartnerName ?>
		<td<?php echo $view_donor_ivf->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_PartnerName" class="view_donor_ivf_PartnerName">
<span<?php echo $view_donor_ivf->PartnerName->viewAttributes() ?>>
<?php echo $view_donor_ivf->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->PartnerID->Visible) { // PartnerID ?>
		<td<?php echo $view_donor_ivf->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_PartnerID" class="view_donor_ivf_PartnerID">
<span<?php echo $view_donor_ivf->PartnerID->viewAttributes() ?>>
<?php echo $view_donor_ivf->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->DrID->Visible) { // DrID ?>
		<td<?php echo $view_donor_ivf->DrID->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_DrID" class="view_donor_ivf_DrID">
<span<?php echo $view_donor_ivf->DrID->viewAttributes() ?>>
<?php echo $view_donor_ivf->DrID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->DrDepartment->Visible) { // DrDepartment ?>
		<td<?php echo $view_donor_ivf->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_DrDepartment" class="view_donor_ivf_DrDepartment">
<span<?php echo $view_donor_ivf->DrDepartment->viewAttributes() ?>>
<?php echo $view_donor_ivf->DrDepartment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf->Doctor->Visible) { // Doctor ?>
		<td<?php echo $view_donor_ivf->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCnt ?>_view_donor_ivf_Doctor" class="view_donor_ivf_Doctor">
<span<?php echo $view_donor_ivf->Doctor->viewAttributes() ?>>
<?php echo $view_donor_ivf->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_donor_ivf_delete->Recordset->moveNext();
}
$view_donor_ivf_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_donor_ivf_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_donor_ivf_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_donor_ivf_delete->terminate();
?>