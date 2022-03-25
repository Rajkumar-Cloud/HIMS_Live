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
$ivf_delete = new ivf_delete();

// Run the page
$ivf_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivfdelete = currentForm = new ew.Form("fivfdelete", "delete");

// Form_CustomValidate event
fivfdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivfdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivfdelete.lists["x_Male"] = <?php echo $ivf_delete->Male->Lookup->toClientList() ?>;
fivfdelete.lists["x_Male"].options = <?php echo JsonEncode($ivf_delete->Male->lookupOptions()) ?>;
fivfdelete.lists["x_Female"] = <?php echo $ivf_delete->Female->Lookup->toClientList() ?>;
fivfdelete.lists["x_Female"].options = <?php echo JsonEncode($ivf_delete->Female->lookupOptions()) ?>;
fivfdelete.lists["x_status"] = <?php echo $ivf_delete->status->Lookup->toClientList() ?>;
fivfdelete.lists["x_status"].options = <?php echo JsonEncode($ivf_delete->status->lookupOptions()) ?>;
fivfdelete.lists["x_ReferedBy"] = <?php echo $ivf_delete->ReferedBy->Lookup->toClientList() ?>;
fivfdelete.lists["x_ReferedBy"].options = <?php echo JsonEncode($ivf_delete->ReferedBy->lookupOptions()) ?>;
fivfdelete.lists["x_ARTCYCLE"] = <?php echo $ivf_delete->ARTCYCLE->Lookup->toClientList() ?>;
fivfdelete.lists["x_ARTCYCLE"].options = <?php echo JsonEncode($ivf_delete->ARTCYCLE->options(FALSE, TRUE)) ?>;
fivfdelete.lists["x_RESULT"] = <?php echo $ivf_delete->RESULT->Lookup->toClientList() ?>;
fivfdelete.lists["x_RESULT"].options = <?php echo JsonEncode($ivf_delete->RESULT->options(FALSE, TRUE)) ?>;
fivfdelete.lists["x_DrID"] = <?php echo $ivf_delete->DrID->Lookup->toClientList() ?>;
fivfdelete.lists["x_DrID"].options = <?php echo JsonEncode($ivf_delete->DrID->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_delete->showPageHeader(); ?>
<?php
$ivf_delete->showMessage();
?>
<form name="fivfdelete" id="fivfdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf->id->Visible) { // id ?>
		<th class="<?php echo $ivf->id->headerCellClass() ?>"><span id="elh_ivf_id" class="ivf_id"><?php echo $ivf->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->Male->Visible) { // Male ?>
		<th class="<?php echo $ivf->Male->headerCellClass() ?>"><span id="elh_ivf_Male" class="ivf_Male"><?php echo $ivf->Male->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->Female->Visible) { // Female ?>
		<th class="<?php echo $ivf->Female->headerCellClass() ?>"><span id="elh_ivf_Female" class="ivf_Female"><?php echo $ivf->Female->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->status->Visible) { // status ?>
		<th class="<?php echo $ivf->status->headerCellClass() ?>"><span id="elh_ivf_status" class="ivf_status"><?php echo $ivf->status->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->malepropic->Visible) { // malepropic ?>
		<th class="<?php echo $ivf->malepropic->headerCellClass() ?>"><span id="elh_ivf_malepropic" class="ivf_malepropic"><?php echo $ivf->malepropic->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->femalepropic->Visible) { // femalepropic ?>
		<th class="<?php echo $ivf->femalepropic->headerCellClass() ?>"><span id="elh_ivf_femalepropic" class="ivf_femalepropic"><?php echo $ivf->femalepropic->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->HusbandEducation->Visible) { // HusbandEducation ?>
		<th class="<?php echo $ivf->HusbandEducation->headerCellClass() ?>"><span id="elh_ivf_HusbandEducation" class="ivf_HusbandEducation"><?php echo $ivf->HusbandEducation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->WifeEducation->Visible) { // WifeEducation ?>
		<th class="<?php echo $ivf->WifeEducation->headerCellClass() ?>"><span id="elh_ivf_WifeEducation" class="ivf_WifeEducation"><?php echo $ivf->WifeEducation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
		<th class="<?php echo $ivf->HusbandWorkHours->headerCellClass() ?>"><span id="elh_ivf_HusbandWorkHours" class="ivf_HusbandWorkHours"><?php echo $ivf->HusbandWorkHours->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->WifeWorkHours->Visible) { // WifeWorkHours ?>
		<th class="<?php echo $ivf->WifeWorkHours->headerCellClass() ?>"><span id="elh_ivf_WifeWorkHours" class="ivf_WifeWorkHours"><?php echo $ivf->WifeWorkHours->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->PatientLanguage->Visible) { // PatientLanguage ?>
		<th class="<?php echo $ivf->PatientLanguage->headerCellClass() ?>"><span id="elh_ivf_PatientLanguage" class="ivf_PatientLanguage"><?php echo $ivf->PatientLanguage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->ReferedBy->Visible) { // ReferedBy ?>
		<th class="<?php echo $ivf->ReferedBy->headerCellClass() ?>"><span id="elh_ivf_ReferedBy" class="ivf_ReferedBy"><?php echo $ivf->ReferedBy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->ReferPhNo->Visible) { // ReferPhNo ?>
		<th class="<?php echo $ivf->ReferPhNo->headerCellClass() ?>"><span id="elh_ivf_ReferPhNo" class="ivf_ReferPhNo"><?php echo $ivf->ReferPhNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->WifeCell->Visible) { // WifeCell ?>
		<th class="<?php echo $ivf->WifeCell->headerCellClass() ?>"><span id="elh_ivf_WifeCell" class="ivf_WifeCell"><?php echo $ivf->WifeCell->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->HusbandCell->Visible) { // HusbandCell ?>
		<th class="<?php echo $ivf->HusbandCell->headerCellClass() ?>"><span id="elh_ivf_HusbandCell" class="ivf_HusbandCell"><?php echo $ivf->HusbandCell->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->WifeEmail->Visible) { // WifeEmail ?>
		<th class="<?php echo $ivf->WifeEmail->headerCellClass() ?>"><span id="elh_ivf_WifeEmail" class="ivf_WifeEmail"><?php echo $ivf->WifeEmail->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->HusbandEmail->Visible) { // HusbandEmail ?>
		<th class="<?php echo $ivf->HusbandEmail->headerCellClass() ?>"><span id="elh_ivf_HusbandEmail" class="ivf_HusbandEmail"><?php echo $ivf->HusbandEmail->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<th class="<?php echo $ivf->ARTCYCLE->headerCellClass() ?>"><span id="elh_ivf_ARTCYCLE" class="ivf_ARTCYCLE"><?php echo $ivf->ARTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->RESULT->Visible) { // RESULT ?>
		<th class="<?php echo $ivf->RESULT->headerCellClass() ?>"><span id="elh_ivf_RESULT" class="ivf_RESULT"><?php echo $ivf->RESULT->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->CoupleID->Visible) { // CoupleID ?>
		<th class="<?php echo $ivf->CoupleID->headerCellClass() ?>"><span id="elh_ivf_CoupleID" class="ivf_CoupleID"><?php echo $ivf->CoupleID->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->HospID->Visible) { // HospID ?>
		<th class="<?php echo $ivf->HospID->headerCellClass() ?>"><span id="elh_ivf_HospID" class="ivf_HospID"><?php echo $ivf->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $ivf->PatientName->headerCellClass() ?>"><span id="elh_ivf_PatientName" class="ivf_PatientName"><?php echo $ivf->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $ivf->PatientID->headerCellClass() ?>"><span id="elh_ivf_PatientID" class="ivf_PatientID"><?php echo $ivf->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $ivf->PartnerName->headerCellClass() ?>"><span id="elh_ivf_PartnerName" class="ivf_PartnerName"><?php echo $ivf->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->PartnerID->Visible) { // PartnerID ?>
		<th class="<?php echo $ivf->PartnerID->headerCellClass() ?>"><span id="elh_ivf_PartnerID" class="ivf_PartnerID"><?php echo $ivf->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->DrID->Visible) { // DrID ?>
		<th class="<?php echo $ivf->DrID->headerCellClass() ?>"><span id="elh_ivf_DrID" class="ivf_DrID"><?php echo $ivf->DrID->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->DrDepartment->Visible) { // DrDepartment ?>
		<th class="<?php echo $ivf->DrDepartment->headerCellClass() ?>"><span id="elh_ivf_DrDepartment" class="ivf_DrDepartment"><?php echo $ivf->DrDepartment->caption() ?></span></th>
<?php } ?>
<?php if ($ivf->Doctor->Visible) { // Doctor ?>
		<th class="<?php echo $ivf->Doctor->headerCellClass() ?>"><span id="elh_ivf_Doctor" class="ivf_Doctor"><?php echo $ivf->Doctor->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_delete->RecCnt = 0;
$i = 0;
while (!$ivf_delete->Recordset->EOF) {
	$ivf_delete->RecCnt++;
	$ivf_delete->RowCnt++;

	// Set row properties
	$ivf->resetAttributes();
	$ivf->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_delete->loadRowValues($ivf_delete->Recordset);

	// Render row
	$ivf_delete->renderRow();
?>
	<tr<?php echo $ivf->rowAttributes() ?>>
<?php if ($ivf->id->Visible) { // id ?>
		<td<?php echo $ivf->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_id" class="ivf_id">
<span<?php echo $ivf->id->viewAttributes() ?>>
<?php echo $ivf->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->Male->Visible) { // Male ?>
		<td<?php echo $ivf->Male->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_Male" class="ivf_Male">
<span<?php echo $ivf->Male->viewAttributes() ?>>
<?php echo $ivf->Male->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->Female->Visible) { // Female ?>
		<td<?php echo $ivf->Female->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_Female" class="ivf_Female">
<span<?php echo $ivf->Female->viewAttributes() ?>>
<?php echo $ivf->Female->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->status->Visible) { // status ?>
		<td<?php echo $ivf->status->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_status" class="ivf_status">
<span<?php echo $ivf->status->viewAttributes() ?>>
<?php echo $ivf->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->malepropic->Visible) { // malepropic ?>
		<td<?php echo $ivf->malepropic->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_malepropic" class="ivf_malepropic">
<span>
<?php echo GetFileViewTag($ivf->malepropic, $ivf->malepropic->getViewValue()) ?>
</span>
</span>
</td>
<?php } ?>
<?php if ($ivf->femalepropic->Visible) { // femalepropic ?>
		<td<?php echo $ivf->femalepropic->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_femalepropic" class="ivf_femalepropic">
<span>
<?php echo GetFileViewTag($ivf->femalepropic, $ivf->femalepropic->getViewValue()) ?>
</span>
</span>
</td>
<?php } ?>
<?php if ($ivf->HusbandEducation->Visible) { // HusbandEducation ?>
		<td<?php echo $ivf->HusbandEducation->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_HusbandEducation" class="ivf_HusbandEducation">
<span<?php echo $ivf->HusbandEducation->viewAttributes() ?>>
<?php echo $ivf->HusbandEducation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->WifeEducation->Visible) { // WifeEducation ?>
		<td<?php echo $ivf->WifeEducation->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_WifeEducation" class="ivf_WifeEducation">
<span<?php echo $ivf->WifeEducation->viewAttributes() ?>>
<?php echo $ivf->WifeEducation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
		<td<?php echo $ivf->HusbandWorkHours->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_HusbandWorkHours" class="ivf_HusbandWorkHours">
<span<?php echo $ivf->HusbandWorkHours->viewAttributes() ?>>
<?php echo $ivf->HusbandWorkHours->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->WifeWorkHours->Visible) { // WifeWorkHours ?>
		<td<?php echo $ivf->WifeWorkHours->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_WifeWorkHours" class="ivf_WifeWorkHours">
<span<?php echo $ivf->WifeWorkHours->viewAttributes() ?>>
<?php echo $ivf->WifeWorkHours->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->PatientLanguage->Visible) { // PatientLanguage ?>
		<td<?php echo $ivf->PatientLanguage->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_PatientLanguage" class="ivf_PatientLanguage">
<span<?php echo $ivf->PatientLanguage->viewAttributes() ?>>
<?php echo $ivf->PatientLanguage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->ReferedBy->Visible) { // ReferedBy ?>
		<td<?php echo $ivf->ReferedBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_ReferedBy" class="ivf_ReferedBy">
<span<?php echo $ivf->ReferedBy->viewAttributes() ?>>
<?php echo $ivf->ReferedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->ReferPhNo->Visible) { // ReferPhNo ?>
		<td<?php echo $ivf->ReferPhNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_ReferPhNo" class="ivf_ReferPhNo">
<span<?php echo $ivf->ReferPhNo->viewAttributes() ?>>
<?php echo $ivf->ReferPhNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->WifeCell->Visible) { // WifeCell ?>
		<td<?php echo $ivf->WifeCell->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_WifeCell" class="ivf_WifeCell">
<span<?php echo $ivf->WifeCell->viewAttributes() ?>>
<?php echo $ivf->WifeCell->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->HusbandCell->Visible) { // HusbandCell ?>
		<td<?php echo $ivf->HusbandCell->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_HusbandCell" class="ivf_HusbandCell">
<span<?php echo $ivf->HusbandCell->viewAttributes() ?>>
<?php echo $ivf->HusbandCell->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->WifeEmail->Visible) { // WifeEmail ?>
		<td<?php echo $ivf->WifeEmail->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_WifeEmail" class="ivf_WifeEmail">
<span<?php echo $ivf->WifeEmail->viewAttributes() ?>>
<?php echo $ivf->WifeEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->HusbandEmail->Visible) { // HusbandEmail ?>
		<td<?php echo $ivf->HusbandEmail->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_HusbandEmail" class="ivf_HusbandEmail">
<span<?php echo $ivf->HusbandEmail->viewAttributes() ?>>
<?php echo $ivf->HusbandEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td<?php echo $ivf->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_ARTCYCLE" class="ivf_ARTCYCLE">
<span<?php echo $ivf->ARTCYCLE->viewAttributes() ?>>
<?php echo $ivf->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->RESULT->Visible) { // RESULT ?>
		<td<?php echo $ivf->RESULT->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_RESULT" class="ivf_RESULT">
<span<?php echo $ivf->RESULT->viewAttributes() ?>>
<?php echo $ivf->RESULT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->CoupleID->Visible) { // CoupleID ?>
		<td<?php echo $ivf->CoupleID->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_CoupleID" class="ivf_CoupleID">
<span<?php echo $ivf->CoupleID->viewAttributes() ?>>
<?php echo $ivf->CoupleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->HospID->Visible) { // HospID ?>
		<td<?php echo $ivf->HospID->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_HospID" class="ivf_HospID">
<span<?php echo $ivf->HospID->viewAttributes() ?>>
<?php echo $ivf->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->PatientName->Visible) { // PatientName ?>
		<td<?php echo $ivf->PatientName->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_PatientName" class="ivf_PatientName">
<span<?php echo $ivf->PatientName->viewAttributes() ?>>
<?php echo $ivf->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->PatientID->Visible) { // PatientID ?>
		<td<?php echo $ivf->PatientID->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_PatientID" class="ivf_PatientID">
<span<?php echo $ivf->PatientID->viewAttributes() ?>>
<?php echo $ivf->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->PartnerName->Visible) { // PartnerName ?>
		<td<?php echo $ivf->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_PartnerName" class="ivf_PartnerName">
<span<?php echo $ivf->PartnerName->viewAttributes() ?>>
<?php echo $ivf->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->PartnerID->Visible) { // PartnerID ?>
		<td<?php echo $ivf->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_PartnerID" class="ivf_PartnerID">
<span<?php echo $ivf->PartnerID->viewAttributes() ?>>
<?php echo $ivf->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->DrID->Visible) { // DrID ?>
		<td<?php echo $ivf->DrID->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_DrID" class="ivf_DrID">
<span<?php echo $ivf->DrID->viewAttributes() ?>>
<?php echo $ivf->DrID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->DrDepartment->Visible) { // DrDepartment ?>
		<td<?php echo $ivf->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_DrDepartment" class="ivf_DrDepartment">
<span<?php echo $ivf->DrDepartment->viewAttributes() ?>>
<?php echo $ivf->DrDepartment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf->Doctor->Visible) { // Doctor ?>
		<td<?php echo $ivf->Doctor->cellAttributes() ?>>
<span id="el<?php echo $ivf_delete->RowCnt ?>_ivf_Doctor" class="ivf_Doctor">
<span<?php echo $ivf->Doctor->viewAttributes() ?>>
<?php echo $ivf->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_delete->Recordset->moveNext();
}
$ivf_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_delete->terminate();
?>