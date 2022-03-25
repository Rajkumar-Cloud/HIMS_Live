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
<?php include_once "header.php"; ?>
<script>
var fview_donor_ivfdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fview_donor_ivfdelete = currentForm = new ew.Form("fview_donor_ivfdelete", "delete");
	loadjs.done("fview_donor_ivfdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_donor_ivf_delete->showPageHeader(); ?>
<?php
$view_donor_ivf_delete->showMessage();
?>
<form name="fview_donor_ivfdelete" id="fview_donor_ivfdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_donor_ivf">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_donor_ivf_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_donor_ivf_delete->id->Visible) { // id ?>
		<th class="<?php echo $view_donor_ivf_delete->id->headerCellClass() ?>"><span id="elh_view_donor_ivf_id" class="view_donor_ivf_id"><?php echo $view_donor_ivf_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->Male->Visible) { // Male ?>
		<th class="<?php echo $view_donor_ivf_delete->Male->headerCellClass() ?>"><span id="elh_view_donor_ivf_Male" class="view_donor_ivf_Male"><?php echo $view_donor_ivf_delete->Male->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->Female->Visible) { // Female ?>
		<th class="<?php echo $view_donor_ivf_delete->Female->headerCellClass() ?>"><span id="elh_view_donor_ivf_Female" class="view_donor_ivf_Female"><?php echo $view_donor_ivf_delete->Female->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->status->Visible) { // status ?>
		<th class="<?php echo $view_donor_ivf_delete->status->headerCellClass() ?>"><span id="elh_view_donor_ivf_status" class="view_donor_ivf_status"><?php echo $view_donor_ivf_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $view_donor_ivf_delete->createdby->headerCellClass() ?>"><span id="elh_view_donor_ivf_createdby" class="view_donor_ivf_createdby"><?php echo $view_donor_ivf_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $view_donor_ivf_delete->createddatetime->headerCellClass() ?>"><span id="elh_view_donor_ivf_createddatetime" class="view_donor_ivf_createddatetime"><?php echo $view_donor_ivf_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $view_donor_ivf_delete->modifiedby->headerCellClass() ?>"><span id="elh_view_donor_ivf_modifiedby" class="view_donor_ivf_modifiedby"><?php echo $view_donor_ivf_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $view_donor_ivf_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_view_donor_ivf_modifieddatetime" class="view_donor_ivf_modifieddatetime"><?php echo $view_donor_ivf_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->malepropic->Visible) { // malepropic ?>
		<th class="<?php echo $view_donor_ivf_delete->malepropic->headerCellClass() ?>"><span id="elh_view_donor_ivf_malepropic" class="view_donor_ivf_malepropic"><?php echo $view_donor_ivf_delete->malepropic->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->femalepropic->Visible) { // femalepropic ?>
		<th class="<?php echo $view_donor_ivf_delete->femalepropic->headerCellClass() ?>"><span id="elh_view_donor_ivf_femalepropic" class="view_donor_ivf_femalepropic"><?php echo $view_donor_ivf_delete->femalepropic->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->HusbandEducation->Visible) { // HusbandEducation ?>
		<th class="<?php echo $view_donor_ivf_delete->HusbandEducation->headerCellClass() ?>"><span id="elh_view_donor_ivf_HusbandEducation" class="view_donor_ivf_HusbandEducation"><?php echo $view_donor_ivf_delete->HusbandEducation->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->WifeEducation->Visible) { // WifeEducation ?>
		<th class="<?php echo $view_donor_ivf_delete->WifeEducation->headerCellClass() ?>"><span id="elh_view_donor_ivf_WifeEducation" class="view_donor_ivf_WifeEducation"><?php echo $view_donor_ivf_delete->WifeEducation->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
		<th class="<?php echo $view_donor_ivf_delete->HusbandWorkHours->headerCellClass() ?>"><span id="elh_view_donor_ivf_HusbandWorkHours" class="view_donor_ivf_HusbandWorkHours"><?php echo $view_donor_ivf_delete->HusbandWorkHours->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->WifeWorkHours->Visible) { // WifeWorkHours ?>
		<th class="<?php echo $view_donor_ivf_delete->WifeWorkHours->headerCellClass() ?>"><span id="elh_view_donor_ivf_WifeWorkHours" class="view_donor_ivf_WifeWorkHours"><?php echo $view_donor_ivf_delete->WifeWorkHours->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->PatientLanguage->Visible) { // PatientLanguage ?>
		<th class="<?php echo $view_donor_ivf_delete->PatientLanguage->headerCellClass() ?>"><span id="elh_view_donor_ivf_PatientLanguage" class="view_donor_ivf_PatientLanguage"><?php echo $view_donor_ivf_delete->PatientLanguage->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->ReferedBy->Visible) { // ReferedBy ?>
		<th class="<?php echo $view_donor_ivf_delete->ReferedBy->headerCellClass() ?>"><span id="elh_view_donor_ivf_ReferedBy" class="view_donor_ivf_ReferedBy"><?php echo $view_donor_ivf_delete->ReferedBy->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->ReferPhNo->Visible) { // ReferPhNo ?>
		<th class="<?php echo $view_donor_ivf_delete->ReferPhNo->headerCellClass() ?>"><span id="elh_view_donor_ivf_ReferPhNo" class="view_donor_ivf_ReferPhNo"><?php echo $view_donor_ivf_delete->ReferPhNo->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->WifeCell->Visible) { // WifeCell ?>
		<th class="<?php echo $view_donor_ivf_delete->WifeCell->headerCellClass() ?>"><span id="elh_view_donor_ivf_WifeCell" class="view_donor_ivf_WifeCell"><?php echo $view_donor_ivf_delete->WifeCell->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->HusbandCell->Visible) { // HusbandCell ?>
		<th class="<?php echo $view_donor_ivf_delete->HusbandCell->headerCellClass() ?>"><span id="elh_view_donor_ivf_HusbandCell" class="view_donor_ivf_HusbandCell"><?php echo $view_donor_ivf_delete->HusbandCell->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->WifeEmail->Visible) { // WifeEmail ?>
		<th class="<?php echo $view_donor_ivf_delete->WifeEmail->headerCellClass() ?>"><span id="elh_view_donor_ivf_WifeEmail" class="view_donor_ivf_WifeEmail"><?php echo $view_donor_ivf_delete->WifeEmail->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->HusbandEmail->Visible) { // HusbandEmail ?>
		<th class="<?php echo $view_donor_ivf_delete->HusbandEmail->headerCellClass() ?>"><span id="elh_view_donor_ivf_HusbandEmail" class="view_donor_ivf_HusbandEmail"><?php echo $view_donor_ivf_delete->HusbandEmail->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<th class="<?php echo $view_donor_ivf_delete->ARTCYCLE->headerCellClass() ?>"><span id="elh_view_donor_ivf_ARTCYCLE" class="view_donor_ivf_ARTCYCLE"><?php echo $view_donor_ivf_delete->ARTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->RESULT->Visible) { // RESULT ?>
		<th class="<?php echo $view_donor_ivf_delete->RESULT->headerCellClass() ?>"><span id="elh_view_donor_ivf_RESULT" class="view_donor_ivf_RESULT"><?php echo $view_donor_ivf_delete->RESULT->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->CoupleID->Visible) { // CoupleID ?>
		<th class="<?php echo $view_donor_ivf_delete->CoupleID->headerCellClass() ?>"><span id="elh_view_donor_ivf_CoupleID" class="view_donor_ivf_CoupleID"><?php echo $view_donor_ivf_delete->CoupleID->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $view_donor_ivf_delete->HospID->headerCellClass() ?>"><span id="elh_view_donor_ivf_HospID" class="view_donor_ivf_HospID"><?php echo $view_donor_ivf_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $view_donor_ivf_delete->PatientName->headerCellClass() ?>"><span id="elh_view_donor_ivf_PatientName" class="view_donor_ivf_PatientName"><?php echo $view_donor_ivf_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $view_donor_ivf_delete->PatientID->headerCellClass() ?>"><span id="elh_view_donor_ivf_PatientID" class="view_donor_ivf_PatientID"><?php echo $view_donor_ivf_delete->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $view_donor_ivf_delete->PartnerName->headerCellClass() ?>"><span id="elh_view_donor_ivf_PartnerName" class="view_donor_ivf_PartnerName"><?php echo $view_donor_ivf_delete->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->PartnerID->Visible) { // PartnerID ?>
		<th class="<?php echo $view_donor_ivf_delete->PartnerID->headerCellClass() ?>"><span id="elh_view_donor_ivf_PartnerID" class="view_donor_ivf_PartnerID"><?php echo $view_donor_ivf_delete->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->DrID->Visible) { // DrID ?>
		<th class="<?php echo $view_donor_ivf_delete->DrID->headerCellClass() ?>"><span id="elh_view_donor_ivf_DrID" class="view_donor_ivf_DrID"><?php echo $view_donor_ivf_delete->DrID->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->DrDepartment->Visible) { // DrDepartment ?>
		<th class="<?php echo $view_donor_ivf_delete->DrDepartment->headerCellClass() ?>"><span id="elh_view_donor_ivf_DrDepartment" class="view_donor_ivf_DrDepartment"><?php echo $view_donor_ivf_delete->DrDepartment->caption() ?></span></th>
<?php } ?>
<?php if ($view_donor_ivf_delete->Doctor->Visible) { // Doctor ?>
		<th class="<?php echo $view_donor_ivf_delete->Doctor->headerCellClass() ?>"><span id="elh_view_donor_ivf_Doctor" class="view_donor_ivf_Doctor"><?php echo $view_donor_ivf_delete->Doctor->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_donor_ivf_delete->RecordCount = 0;
$i = 0;
while (!$view_donor_ivf_delete->Recordset->EOF) {
	$view_donor_ivf_delete->RecordCount++;
	$view_donor_ivf_delete->RowCount++;

	// Set row properties
	$view_donor_ivf->resetAttributes();
	$view_donor_ivf->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_donor_ivf_delete->loadRowValues($view_donor_ivf_delete->Recordset);

	// Render row
	$view_donor_ivf_delete->renderRow();
?>
	<tr <?php echo $view_donor_ivf->rowAttributes() ?>>
<?php if ($view_donor_ivf_delete->id->Visible) { // id ?>
		<td <?php echo $view_donor_ivf_delete->id->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_id" class="view_donor_ivf_id">
<span<?php echo $view_donor_ivf_delete->id->viewAttributes() ?>><?php echo $view_donor_ivf_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->Male->Visible) { // Male ?>
		<td <?php echo $view_donor_ivf_delete->Male->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_Male" class="view_donor_ivf_Male">
<span<?php echo $view_donor_ivf_delete->Male->viewAttributes() ?>><?php echo $view_donor_ivf_delete->Male->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->Female->Visible) { // Female ?>
		<td <?php echo $view_donor_ivf_delete->Female->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_Female" class="view_donor_ivf_Female">
<span<?php echo $view_donor_ivf_delete->Female->viewAttributes() ?>><?php echo $view_donor_ivf_delete->Female->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->status->Visible) { // status ?>
		<td <?php echo $view_donor_ivf_delete->status->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_status" class="view_donor_ivf_status">
<span<?php echo $view_donor_ivf_delete->status->viewAttributes() ?>><?php echo $view_donor_ivf_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $view_donor_ivf_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_createdby" class="view_donor_ivf_createdby">
<span<?php echo $view_donor_ivf_delete->createdby->viewAttributes() ?>><?php echo $view_donor_ivf_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $view_donor_ivf_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_createddatetime" class="view_donor_ivf_createddatetime">
<span<?php echo $view_donor_ivf_delete->createddatetime->viewAttributes() ?>><?php echo $view_donor_ivf_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $view_donor_ivf_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_modifiedby" class="view_donor_ivf_modifiedby">
<span<?php echo $view_donor_ivf_delete->modifiedby->viewAttributes() ?>><?php echo $view_donor_ivf_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $view_donor_ivf_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_modifieddatetime" class="view_donor_ivf_modifieddatetime">
<span<?php echo $view_donor_ivf_delete->modifieddatetime->viewAttributes() ?>><?php echo $view_donor_ivf_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->malepropic->Visible) { // malepropic ?>
		<td <?php echo $view_donor_ivf_delete->malepropic->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_malepropic" class="view_donor_ivf_malepropic">
<span><?php echo GetFileViewTag($view_donor_ivf_delete->malepropic, $view_donor_ivf_delete->malepropic->getViewValue(), FALSE) ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->femalepropic->Visible) { // femalepropic ?>
		<td <?php echo $view_donor_ivf_delete->femalepropic->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_femalepropic" class="view_donor_ivf_femalepropic">
<span><?php echo GetFileViewTag($view_donor_ivf_delete->femalepropic, $view_donor_ivf_delete->femalepropic->getViewValue(), FALSE) ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->HusbandEducation->Visible) { // HusbandEducation ?>
		<td <?php echo $view_donor_ivf_delete->HusbandEducation->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_HusbandEducation" class="view_donor_ivf_HusbandEducation">
<span<?php echo $view_donor_ivf_delete->HusbandEducation->viewAttributes() ?>><?php echo $view_donor_ivf_delete->HusbandEducation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->WifeEducation->Visible) { // WifeEducation ?>
		<td <?php echo $view_donor_ivf_delete->WifeEducation->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_WifeEducation" class="view_donor_ivf_WifeEducation">
<span<?php echo $view_donor_ivf_delete->WifeEducation->viewAttributes() ?>><?php echo $view_donor_ivf_delete->WifeEducation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
		<td <?php echo $view_donor_ivf_delete->HusbandWorkHours->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_HusbandWorkHours" class="view_donor_ivf_HusbandWorkHours">
<span<?php echo $view_donor_ivf_delete->HusbandWorkHours->viewAttributes() ?>><?php echo $view_donor_ivf_delete->HusbandWorkHours->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->WifeWorkHours->Visible) { // WifeWorkHours ?>
		<td <?php echo $view_donor_ivf_delete->WifeWorkHours->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_WifeWorkHours" class="view_donor_ivf_WifeWorkHours">
<span<?php echo $view_donor_ivf_delete->WifeWorkHours->viewAttributes() ?>><?php echo $view_donor_ivf_delete->WifeWorkHours->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->PatientLanguage->Visible) { // PatientLanguage ?>
		<td <?php echo $view_donor_ivf_delete->PatientLanguage->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_PatientLanguage" class="view_donor_ivf_PatientLanguage">
<span<?php echo $view_donor_ivf_delete->PatientLanguage->viewAttributes() ?>><?php echo $view_donor_ivf_delete->PatientLanguage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->ReferedBy->Visible) { // ReferedBy ?>
		<td <?php echo $view_donor_ivf_delete->ReferedBy->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_ReferedBy" class="view_donor_ivf_ReferedBy">
<span<?php echo $view_donor_ivf_delete->ReferedBy->viewAttributes() ?>><?php echo $view_donor_ivf_delete->ReferedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->ReferPhNo->Visible) { // ReferPhNo ?>
		<td <?php echo $view_donor_ivf_delete->ReferPhNo->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_ReferPhNo" class="view_donor_ivf_ReferPhNo">
<span<?php echo $view_donor_ivf_delete->ReferPhNo->viewAttributes() ?>><?php echo $view_donor_ivf_delete->ReferPhNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->WifeCell->Visible) { // WifeCell ?>
		<td <?php echo $view_donor_ivf_delete->WifeCell->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_WifeCell" class="view_donor_ivf_WifeCell">
<span<?php echo $view_donor_ivf_delete->WifeCell->viewAttributes() ?>><?php echo $view_donor_ivf_delete->WifeCell->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->HusbandCell->Visible) { // HusbandCell ?>
		<td <?php echo $view_donor_ivf_delete->HusbandCell->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_HusbandCell" class="view_donor_ivf_HusbandCell">
<span<?php echo $view_donor_ivf_delete->HusbandCell->viewAttributes() ?>><?php echo $view_donor_ivf_delete->HusbandCell->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->WifeEmail->Visible) { // WifeEmail ?>
		<td <?php echo $view_donor_ivf_delete->WifeEmail->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_WifeEmail" class="view_donor_ivf_WifeEmail">
<span<?php echo $view_donor_ivf_delete->WifeEmail->viewAttributes() ?>><?php echo $view_donor_ivf_delete->WifeEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->HusbandEmail->Visible) { // HusbandEmail ?>
		<td <?php echo $view_donor_ivf_delete->HusbandEmail->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_HusbandEmail" class="view_donor_ivf_HusbandEmail">
<span<?php echo $view_donor_ivf_delete->HusbandEmail->viewAttributes() ?>><?php echo $view_donor_ivf_delete->HusbandEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td <?php echo $view_donor_ivf_delete->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_ARTCYCLE" class="view_donor_ivf_ARTCYCLE">
<span<?php echo $view_donor_ivf_delete->ARTCYCLE->viewAttributes() ?>><?php echo $view_donor_ivf_delete->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->RESULT->Visible) { // RESULT ?>
		<td <?php echo $view_donor_ivf_delete->RESULT->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_RESULT" class="view_donor_ivf_RESULT">
<span<?php echo $view_donor_ivf_delete->RESULT->viewAttributes() ?>><?php echo $view_donor_ivf_delete->RESULT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->CoupleID->Visible) { // CoupleID ?>
		<td <?php echo $view_donor_ivf_delete->CoupleID->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_CoupleID" class="view_donor_ivf_CoupleID">
<span<?php echo $view_donor_ivf_delete->CoupleID->viewAttributes() ?>><?php echo $view_donor_ivf_delete->CoupleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $view_donor_ivf_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_HospID" class="view_donor_ivf_HospID">
<span<?php echo $view_donor_ivf_delete->HospID->viewAttributes() ?>><?php echo $view_donor_ivf_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $view_donor_ivf_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_PatientName" class="view_donor_ivf_PatientName">
<span<?php echo $view_donor_ivf_delete->PatientName->viewAttributes() ?>><?php echo $view_donor_ivf_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->PatientID->Visible) { // PatientID ?>
		<td <?php echo $view_donor_ivf_delete->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_PatientID" class="view_donor_ivf_PatientID">
<span<?php echo $view_donor_ivf_delete->PatientID->viewAttributes() ?>><?php echo $view_donor_ivf_delete->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->PartnerName->Visible) { // PartnerName ?>
		<td <?php echo $view_donor_ivf_delete->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_PartnerName" class="view_donor_ivf_PartnerName">
<span<?php echo $view_donor_ivf_delete->PartnerName->viewAttributes() ?>><?php echo $view_donor_ivf_delete->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->PartnerID->Visible) { // PartnerID ?>
		<td <?php echo $view_donor_ivf_delete->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_PartnerID" class="view_donor_ivf_PartnerID">
<span<?php echo $view_donor_ivf_delete->PartnerID->viewAttributes() ?>><?php echo $view_donor_ivf_delete->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->DrID->Visible) { // DrID ?>
		<td <?php echo $view_donor_ivf_delete->DrID->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_DrID" class="view_donor_ivf_DrID">
<span<?php echo $view_donor_ivf_delete->DrID->viewAttributes() ?>><?php echo $view_donor_ivf_delete->DrID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->DrDepartment->Visible) { // DrDepartment ?>
		<td <?php echo $view_donor_ivf_delete->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_DrDepartment" class="view_donor_ivf_DrDepartment">
<span<?php echo $view_donor_ivf_delete->DrDepartment->viewAttributes() ?>><?php echo $view_donor_ivf_delete->DrDepartment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_donor_ivf_delete->Doctor->Visible) { // Doctor ?>
		<td <?php echo $view_donor_ivf_delete->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_donor_ivf_delete->RowCount ?>_view_donor_ivf_Doctor" class="view_donor_ivf_Doctor">
<span<?php echo $view_donor_ivf_delete->Doctor->viewAttributes() ?>><?php echo $view_donor_ivf_delete->Doctor->getViewValue() ?></span>
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
$view_donor_ivf_delete->terminate();
?>