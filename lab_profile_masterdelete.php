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
$lab_profile_master_delete = new lab_profile_master_delete();

// Run the page
$lab_profile_master_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_profile_master_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var flab_profile_masterdelete = currentForm = new ew.Form("flab_profile_masterdelete", "delete");

// Form_CustomValidate event
flab_profile_masterdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_profile_masterdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_profile_master_delete->showPageHeader(); ?>
<?php
$lab_profile_master_delete->showMessage();
?>
<form name="flab_profile_masterdelete" id="flab_profile_masterdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_profile_master_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_profile_master_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_profile_master">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lab_profile_master_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lab_profile_master->id->Visible) { // id ?>
		<th class="<?php echo $lab_profile_master->id->headerCellClass() ?>"><span id="elh_lab_profile_master_id" class="lab_profile_master_id"><?php echo $lab_profile_master->id->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->ProfileCode->Visible) { // ProfileCode ?>
		<th class="<?php echo $lab_profile_master->ProfileCode->headerCellClass() ?>"><span id="elh_lab_profile_master_ProfileCode" class="lab_profile_master_ProfileCode"><?php echo $lab_profile_master->ProfileCode->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->ProfileName->Visible) { // ProfileName ?>
		<th class="<?php echo $lab_profile_master->ProfileName->headerCellClass() ?>"><span id="elh_lab_profile_master_ProfileName" class="lab_profile_master_ProfileName"><?php echo $lab_profile_master->ProfileName->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->ProfileAmount->Visible) { // ProfileAmount ?>
		<th class="<?php echo $lab_profile_master->ProfileAmount->headerCellClass() ?>"><span id="elh_lab_profile_master_ProfileAmount" class="lab_profile_master_ProfileAmount"><?php echo $lab_profile_master->ProfileAmount->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->ProfileSpecialAmount->Visible) { // ProfileSpecialAmount ?>
		<th class="<?php echo $lab_profile_master->ProfileSpecialAmount->headerCellClass() ?>"><span id="elh_lab_profile_master_ProfileSpecialAmount" class="lab_profile_master_ProfileSpecialAmount"><?php echo $lab_profile_master->ProfileSpecialAmount->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->ProfileMasterInactive->Visible) { // ProfileMasterInactive ?>
		<th class="<?php echo $lab_profile_master->ProfileMasterInactive->headerCellClass() ?>"><span id="elh_lab_profile_master_ProfileMasterInactive" class="lab_profile_master_ProfileMasterInactive"><?php echo $lab_profile_master->ProfileMasterInactive->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->ReagentAmt->Visible) { // ReagentAmt ?>
		<th class="<?php echo $lab_profile_master->ReagentAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_ReagentAmt" class="lab_profile_master_ReagentAmt"><?php echo $lab_profile_master->ReagentAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->LabAmt->Visible) { // LabAmt ?>
		<th class="<?php echo $lab_profile_master->LabAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_LabAmt" class="lab_profile_master_LabAmt"><?php echo $lab_profile_master->LabAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->RefAmt->Visible) { // RefAmt ?>
		<th class="<?php echo $lab_profile_master->RefAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_RefAmt" class="lab_profile_master_RefAmt"><?php echo $lab_profile_master->RefAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->MainDeptCD->Visible) { // MainDeptCD ?>
		<th class="<?php echo $lab_profile_master->MainDeptCD->headerCellClass() ?>"><span id="elh_lab_profile_master_MainDeptCD" class="lab_profile_master_MainDeptCD"><?php echo $lab_profile_master->MainDeptCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->Individual->Visible) { // Individual ?>
		<th class="<?php echo $lab_profile_master->Individual->headerCellClass() ?>"><span id="elh_lab_profile_master_Individual" class="lab_profile_master_Individual"><?php echo $lab_profile_master->Individual->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->ShortName->Visible) { // ShortName ?>
		<th class="<?php echo $lab_profile_master->ShortName->headerCellClass() ?>"><span id="elh_lab_profile_master_ShortName" class="lab_profile_master_ShortName"><?php echo $lab_profile_master->ShortName->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->PrevAmt->Visible) { // PrevAmt ?>
		<th class="<?php echo $lab_profile_master->PrevAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_PrevAmt" class="lab_profile_master_PrevAmt"><?php echo $lab_profile_master->PrevAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->BillName->Visible) { // BillName ?>
		<th class="<?php echo $lab_profile_master->BillName->headerCellClass() ?>"><span id="elh_lab_profile_master_BillName" class="lab_profile_master_BillName"><?php echo $lab_profile_master->BillName->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->ActualAmt->Visible) { // ActualAmt ?>
		<th class="<?php echo $lab_profile_master->ActualAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_ActualAmt" class="lab_profile_master_ActualAmt"><?php echo $lab_profile_master->ActualAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->NoHeading->Visible) { // NoHeading ?>
		<th class="<?php echo $lab_profile_master->NoHeading->headerCellClass() ?>"><span id="elh_lab_profile_master_NoHeading" class="lab_profile_master_NoHeading"><?php echo $lab_profile_master->NoHeading->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->EditDate->Visible) { // EditDate ?>
		<th class="<?php echo $lab_profile_master->EditDate->headerCellClass() ?>"><span id="elh_lab_profile_master_EditDate" class="lab_profile_master_EditDate"><?php echo $lab_profile_master->EditDate->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->EditUser->Visible) { // EditUser ?>
		<th class="<?php echo $lab_profile_master->EditUser->headerCellClass() ?>"><span id="elh_lab_profile_master_EditUser" class="lab_profile_master_EditUser"><?php echo $lab_profile_master->EditUser->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->HISCD->Visible) { // HISCD ?>
		<th class="<?php echo $lab_profile_master->HISCD->headerCellClass() ?>"><span id="elh_lab_profile_master_HISCD" class="lab_profile_master_HISCD"><?php echo $lab_profile_master->HISCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->PriceList->Visible) { // PriceList ?>
		<th class="<?php echo $lab_profile_master->PriceList->headerCellClass() ?>"><span id="elh_lab_profile_master_PriceList" class="lab_profile_master_PriceList"><?php echo $lab_profile_master->PriceList->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->IPAmt->Visible) { // IPAmt ?>
		<th class="<?php echo $lab_profile_master->IPAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_IPAmt" class="lab_profile_master_IPAmt"><?php echo $lab_profile_master->IPAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->IInsAmt->Visible) { // IInsAmt ?>
		<th class="<?php echo $lab_profile_master->IInsAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_IInsAmt" class="lab_profile_master_IInsAmt"><?php echo $lab_profile_master->IInsAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->ManualCD->Visible) { // ManualCD ?>
		<th class="<?php echo $lab_profile_master->ManualCD->headerCellClass() ?>"><span id="elh_lab_profile_master_ManualCD" class="lab_profile_master_ManualCD"><?php echo $lab_profile_master->ManualCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->Free->Visible) { // Free ?>
		<th class="<?php echo $lab_profile_master->Free->headerCellClass() ?>"><span id="elh_lab_profile_master_Free" class="lab_profile_master_Free"><?php echo $lab_profile_master->Free->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->IIpAmt->Visible) { // IIpAmt ?>
		<th class="<?php echo $lab_profile_master->IIpAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_IIpAmt" class="lab_profile_master_IIpAmt"><?php echo $lab_profile_master->IIpAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->InsAmt->Visible) { // InsAmt ?>
		<th class="<?php echo $lab_profile_master->InsAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_InsAmt" class="lab_profile_master_InsAmt"><?php echo $lab_profile_master->InsAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master->OutSource->Visible) { // OutSource ?>
		<th class="<?php echo $lab_profile_master->OutSource->headerCellClass() ?>"><span id="elh_lab_profile_master_OutSource" class="lab_profile_master_OutSource"><?php echo $lab_profile_master->OutSource->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lab_profile_master_delete->RecCnt = 0;
$i = 0;
while (!$lab_profile_master_delete->Recordset->EOF) {
	$lab_profile_master_delete->RecCnt++;
	$lab_profile_master_delete->RowCnt++;

	// Set row properties
	$lab_profile_master->resetAttributes();
	$lab_profile_master->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lab_profile_master_delete->loadRowValues($lab_profile_master_delete->Recordset);

	// Render row
	$lab_profile_master_delete->renderRow();
?>
	<tr<?php echo $lab_profile_master->rowAttributes() ?>>
<?php if ($lab_profile_master->id->Visible) { // id ?>
		<td<?php echo $lab_profile_master->id->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_id" class="lab_profile_master_id">
<span<?php echo $lab_profile_master->id->viewAttributes() ?>>
<?php echo $lab_profile_master->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->ProfileCode->Visible) { // ProfileCode ?>
		<td<?php echo $lab_profile_master->ProfileCode->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_ProfileCode" class="lab_profile_master_ProfileCode">
<span<?php echo $lab_profile_master->ProfileCode->viewAttributes() ?>>
<?php echo $lab_profile_master->ProfileCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->ProfileName->Visible) { // ProfileName ?>
		<td<?php echo $lab_profile_master->ProfileName->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_ProfileName" class="lab_profile_master_ProfileName">
<span<?php echo $lab_profile_master->ProfileName->viewAttributes() ?>>
<?php echo $lab_profile_master->ProfileName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->ProfileAmount->Visible) { // ProfileAmount ?>
		<td<?php echo $lab_profile_master->ProfileAmount->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_ProfileAmount" class="lab_profile_master_ProfileAmount">
<span<?php echo $lab_profile_master->ProfileAmount->viewAttributes() ?>>
<?php echo $lab_profile_master->ProfileAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->ProfileSpecialAmount->Visible) { // ProfileSpecialAmount ?>
		<td<?php echo $lab_profile_master->ProfileSpecialAmount->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_ProfileSpecialAmount" class="lab_profile_master_ProfileSpecialAmount">
<span<?php echo $lab_profile_master->ProfileSpecialAmount->viewAttributes() ?>>
<?php echo $lab_profile_master->ProfileSpecialAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->ProfileMasterInactive->Visible) { // ProfileMasterInactive ?>
		<td<?php echo $lab_profile_master->ProfileMasterInactive->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_ProfileMasterInactive" class="lab_profile_master_ProfileMasterInactive">
<span<?php echo $lab_profile_master->ProfileMasterInactive->viewAttributes() ?>>
<?php echo $lab_profile_master->ProfileMasterInactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->ReagentAmt->Visible) { // ReagentAmt ?>
		<td<?php echo $lab_profile_master->ReagentAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_ReagentAmt" class="lab_profile_master_ReagentAmt">
<span<?php echo $lab_profile_master->ReagentAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->ReagentAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->LabAmt->Visible) { // LabAmt ?>
		<td<?php echo $lab_profile_master->LabAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_LabAmt" class="lab_profile_master_LabAmt">
<span<?php echo $lab_profile_master->LabAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->LabAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->RefAmt->Visible) { // RefAmt ?>
		<td<?php echo $lab_profile_master->RefAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_RefAmt" class="lab_profile_master_RefAmt">
<span<?php echo $lab_profile_master->RefAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->RefAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->MainDeptCD->Visible) { // MainDeptCD ?>
		<td<?php echo $lab_profile_master->MainDeptCD->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_MainDeptCD" class="lab_profile_master_MainDeptCD">
<span<?php echo $lab_profile_master->MainDeptCD->viewAttributes() ?>>
<?php echo $lab_profile_master->MainDeptCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->Individual->Visible) { // Individual ?>
		<td<?php echo $lab_profile_master->Individual->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_Individual" class="lab_profile_master_Individual">
<span<?php echo $lab_profile_master->Individual->viewAttributes() ?>>
<?php echo $lab_profile_master->Individual->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->ShortName->Visible) { // ShortName ?>
		<td<?php echo $lab_profile_master->ShortName->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_ShortName" class="lab_profile_master_ShortName">
<span<?php echo $lab_profile_master->ShortName->viewAttributes() ?>>
<?php echo $lab_profile_master->ShortName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->PrevAmt->Visible) { // PrevAmt ?>
		<td<?php echo $lab_profile_master->PrevAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_PrevAmt" class="lab_profile_master_PrevAmt">
<span<?php echo $lab_profile_master->PrevAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->PrevAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->BillName->Visible) { // BillName ?>
		<td<?php echo $lab_profile_master->BillName->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_BillName" class="lab_profile_master_BillName">
<span<?php echo $lab_profile_master->BillName->viewAttributes() ?>>
<?php echo $lab_profile_master->BillName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->ActualAmt->Visible) { // ActualAmt ?>
		<td<?php echo $lab_profile_master->ActualAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_ActualAmt" class="lab_profile_master_ActualAmt">
<span<?php echo $lab_profile_master->ActualAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->ActualAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->NoHeading->Visible) { // NoHeading ?>
		<td<?php echo $lab_profile_master->NoHeading->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_NoHeading" class="lab_profile_master_NoHeading">
<span<?php echo $lab_profile_master->NoHeading->viewAttributes() ?>>
<?php echo $lab_profile_master->NoHeading->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->EditDate->Visible) { // EditDate ?>
		<td<?php echo $lab_profile_master->EditDate->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_EditDate" class="lab_profile_master_EditDate">
<span<?php echo $lab_profile_master->EditDate->viewAttributes() ?>>
<?php echo $lab_profile_master->EditDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->EditUser->Visible) { // EditUser ?>
		<td<?php echo $lab_profile_master->EditUser->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_EditUser" class="lab_profile_master_EditUser">
<span<?php echo $lab_profile_master->EditUser->viewAttributes() ?>>
<?php echo $lab_profile_master->EditUser->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->HISCD->Visible) { // HISCD ?>
		<td<?php echo $lab_profile_master->HISCD->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_HISCD" class="lab_profile_master_HISCD">
<span<?php echo $lab_profile_master->HISCD->viewAttributes() ?>>
<?php echo $lab_profile_master->HISCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->PriceList->Visible) { // PriceList ?>
		<td<?php echo $lab_profile_master->PriceList->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_PriceList" class="lab_profile_master_PriceList">
<span<?php echo $lab_profile_master->PriceList->viewAttributes() ?>>
<?php echo $lab_profile_master->PriceList->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->IPAmt->Visible) { // IPAmt ?>
		<td<?php echo $lab_profile_master->IPAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_IPAmt" class="lab_profile_master_IPAmt">
<span<?php echo $lab_profile_master->IPAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->IPAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->IInsAmt->Visible) { // IInsAmt ?>
		<td<?php echo $lab_profile_master->IInsAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_IInsAmt" class="lab_profile_master_IInsAmt">
<span<?php echo $lab_profile_master->IInsAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->IInsAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->ManualCD->Visible) { // ManualCD ?>
		<td<?php echo $lab_profile_master->ManualCD->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_ManualCD" class="lab_profile_master_ManualCD">
<span<?php echo $lab_profile_master->ManualCD->viewAttributes() ?>>
<?php echo $lab_profile_master->ManualCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->Free->Visible) { // Free ?>
		<td<?php echo $lab_profile_master->Free->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_Free" class="lab_profile_master_Free">
<span<?php echo $lab_profile_master->Free->viewAttributes() ?>>
<?php echo $lab_profile_master->Free->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->IIpAmt->Visible) { // IIpAmt ?>
		<td<?php echo $lab_profile_master->IIpAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_IIpAmt" class="lab_profile_master_IIpAmt">
<span<?php echo $lab_profile_master->IIpAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->IIpAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->InsAmt->Visible) { // InsAmt ?>
		<td<?php echo $lab_profile_master->InsAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_InsAmt" class="lab_profile_master_InsAmt">
<span<?php echo $lab_profile_master->InsAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->InsAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master->OutSource->Visible) { // OutSource ?>
		<td<?php echo $lab_profile_master->OutSource->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCnt ?>_lab_profile_master_OutSource" class="lab_profile_master_OutSource">
<span<?php echo $lab_profile_master->OutSource->viewAttributes() ?>>
<?php echo $lab_profile_master->OutSource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lab_profile_master_delete->Recordset->moveNext();
}
$lab_profile_master_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_profile_master_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lab_profile_master_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_profile_master_delete->terminate();
?>