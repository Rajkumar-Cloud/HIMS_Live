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
<?php include_once "header.php"; ?>
<script>
var flab_profile_masterdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	flab_profile_masterdelete = currentForm = new ew.Form("flab_profile_masterdelete", "delete");
	loadjs.done("flab_profile_masterdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lab_profile_master_delete->showPageHeader(); ?>
<?php
$lab_profile_master_delete->showMessage();
?>
<form name="flab_profile_masterdelete" id="flab_profile_masterdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_profile_master">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lab_profile_master_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lab_profile_master_delete->id->Visible) { // id ?>
		<th class="<?php echo $lab_profile_master_delete->id->headerCellClass() ?>"><span id="elh_lab_profile_master_id" class="lab_profile_master_id"><?php echo $lab_profile_master_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->ProfileCode->Visible) { // ProfileCode ?>
		<th class="<?php echo $lab_profile_master_delete->ProfileCode->headerCellClass() ?>"><span id="elh_lab_profile_master_ProfileCode" class="lab_profile_master_ProfileCode"><?php echo $lab_profile_master_delete->ProfileCode->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->ProfileName->Visible) { // ProfileName ?>
		<th class="<?php echo $lab_profile_master_delete->ProfileName->headerCellClass() ?>"><span id="elh_lab_profile_master_ProfileName" class="lab_profile_master_ProfileName"><?php echo $lab_profile_master_delete->ProfileName->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->ProfileAmount->Visible) { // ProfileAmount ?>
		<th class="<?php echo $lab_profile_master_delete->ProfileAmount->headerCellClass() ?>"><span id="elh_lab_profile_master_ProfileAmount" class="lab_profile_master_ProfileAmount"><?php echo $lab_profile_master_delete->ProfileAmount->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->ProfileSpecialAmount->Visible) { // ProfileSpecialAmount ?>
		<th class="<?php echo $lab_profile_master_delete->ProfileSpecialAmount->headerCellClass() ?>"><span id="elh_lab_profile_master_ProfileSpecialAmount" class="lab_profile_master_ProfileSpecialAmount"><?php echo $lab_profile_master_delete->ProfileSpecialAmount->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->ProfileMasterInactive->Visible) { // ProfileMasterInactive ?>
		<th class="<?php echo $lab_profile_master_delete->ProfileMasterInactive->headerCellClass() ?>"><span id="elh_lab_profile_master_ProfileMasterInactive" class="lab_profile_master_ProfileMasterInactive"><?php echo $lab_profile_master_delete->ProfileMasterInactive->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->ReagentAmt->Visible) { // ReagentAmt ?>
		<th class="<?php echo $lab_profile_master_delete->ReagentAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_ReagentAmt" class="lab_profile_master_ReagentAmt"><?php echo $lab_profile_master_delete->ReagentAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->LabAmt->Visible) { // LabAmt ?>
		<th class="<?php echo $lab_profile_master_delete->LabAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_LabAmt" class="lab_profile_master_LabAmt"><?php echo $lab_profile_master_delete->LabAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->RefAmt->Visible) { // RefAmt ?>
		<th class="<?php echo $lab_profile_master_delete->RefAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_RefAmt" class="lab_profile_master_RefAmt"><?php echo $lab_profile_master_delete->RefAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->MainDeptCD->Visible) { // MainDeptCD ?>
		<th class="<?php echo $lab_profile_master_delete->MainDeptCD->headerCellClass() ?>"><span id="elh_lab_profile_master_MainDeptCD" class="lab_profile_master_MainDeptCD"><?php echo $lab_profile_master_delete->MainDeptCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->Individual->Visible) { // Individual ?>
		<th class="<?php echo $lab_profile_master_delete->Individual->headerCellClass() ?>"><span id="elh_lab_profile_master_Individual" class="lab_profile_master_Individual"><?php echo $lab_profile_master_delete->Individual->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->ShortName->Visible) { // ShortName ?>
		<th class="<?php echo $lab_profile_master_delete->ShortName->headerCellClass() ?>"><span id="elh_lab_profile_master_ShortName" class="lab_profile_master_ShortName"><?php echo $lab_profile_master_delete->ShortName->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->PrevAmt->Visible) { // PrevAmt ?>
		<th class="<?php echo $lab_profile_master_delete->PrevAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_PrevAmt" class="lab_profile_master_PrevAmt"><?php echo $lab_profile_master_delete->PrevAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->BillName->Visible) { // BillName ?>
		<th class="<?php echo $lab_profile_master_delete->BillName->headerCellClass() ?>"><span id="elh_lab_profile_master_BillName" class="lab_profile_master_BillName"><?php echo $lab_profile_master_delete->BillName->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->ActualAmt->Visible) { // ActualAmt ?>
		<th class="<?php echo $lab_profile_master_delete->ActualAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_ActualAmt" class="lab_profile_master_ActualAmt"><?php echo $lab_profile_master_delete->ActualAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->NoHeading->Visible) { // NoHeading ?>
		<th class="<?php echo $lab_profile_master_delete->NoHeading->headerCellClass() ?>"><span id="elh_lab_profile_master_NoHeading" class="lab_profile_master_NoHeading"><?php echo $lab_profile_master_delete->NoHeading->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->EditDate->Visible) { // EditDate ?>
		<th class="<?php echo $lab_profile_master_delete->EditDate->headerCellClass() ?>"><span id="elh_lab_profile_master_EditDate" class="lab_profile_master_EditDate"><?php echo $lab_profile_master_delete->EditDate->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->EditUser->Visible) { // EditUser ?>
		<th class="<?php echo $lab_profile_master_delete->EditUser->headerCellClass() ?>"><span id="elh_lab_profile_master_EditUser" class="lab_profile_master_EditUser"><?php echo $lab_profile_master_delete->EditUser->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->HISCD->Visible) { // HISCD ?>
		<th class="<?php echo $lab_profile_master_delete->HISCD->headerCellClass() ?>"><span id="elh_lab_profile_master_HISCD" class="lab_profile_master_HISCD"><?php echo $lab_profile_master_delete->HISCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->PriceList->Visible) { // PriceList ?>
		<th class="<?php echo $lab_profile_master_delete->PriceList->headerCellClass() ?>"><span id="elh_lab_profile_master_PriceList" class="lab_profile_master_PriceList"><?php echo $lab_profile_master_delete->PriceList->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->IPAmt->Visible) { // IPAmt ?>
		<th class="<?php echo $lab_profile_master_delete->IPAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_IPAmt" class="lab_profile_master_IPAmt"><?php echo $lab_profile_master_delete->IPAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->IInsAmt->Visible) { // IInsAmt ?>
		<th class="<?php echo $lab_profile_master_delete->IInsAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_IInsAmt" class="lab_profile_master_IInsAmt"><?php echo $lab_profile_master_delete->IInsAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->ManualCD->Visible) { // ManualCD ?>
		<th class="<?php echo $lab_profile_master_delete->ManualCD->headerCellClass() ?>"><span id="elh_lab_profile_master_ManualCD" class="lab_profile_master_ManualCD"><?php echo $lab_profile_master_delete->ManualCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->Free->Visible) { // Free ?>
		<th class="<?php echo $lab_profile_master_delete->Free->headerCellClass() ?>"><span id="elh_lab_profile_master_Free" class="lab_profile_master_Free"><?php echo $lab_profile_master_delete->Free->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->IIpAmt->Visible) { // IIpAmt ?>
		<th class="<?php echo $lab_profile_master_delete->IIpAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_IIpAmt" class="lab_profile_master_IIpAmt"><?php echo $lab_profile_master_delete->IIpAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->InsAmt->Visible) { // InsAmt ?>
		<th class="<?php echo $lab_profile_master_delete->InsAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_InsAmt" class="lab_profile_master_InsAmt"><?php echo $lab_profile_master_delete->InsAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_profile_master_delete->OutSource->Visible) { // OutSource ?>
		<th class="<?php echo $lab_profile_master_delete->OutSource->headerCellClass() ?>"><span id="elh_lab_profile_master_OutSource" class="lab_profile_master_OutSource"><?php echo $lab_profile_master_delete->OutSource->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lab_profile_master_delete->RecordCount = 0;
$i = 0;
while (!$lab_profile_master_delete->Recordset->EOF) {
	$lab_profile_master_delete->RecordCount++;
	$lab_profile_master_delete->RowCount++;

	// Set row properties
	$lab_profile_master->resetAttributes();
	$lab_profile_master->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lab_profile_master_delete->loadRowValues($lab_profile_master_delete->Recordset);

	// Render row
	$lab_profile_master_delete->renderRow();
?>
	<tr <?php echo $lab_profile_master->rowAttributes() ?>>
<?php if ($lab_profile_master_delete->id->Visible) { // id ?>
		<td <?php echo $lab_profile_master_delete->id->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_id" class="lab_profile_master_id">
<span<?php echo $lab_profile_master_delete->id->viewAttributes() ?>><?php echo $lab_profile_master_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->ProfileCode->Visible) { // ProfileCode ?>
		<td <?php echo $lab_profile_master_delete->ProfileCode->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_ProfileCode" class="lab_profile_master_ProfileCode">
<span<?php echo $lab_profile_master_delete->ProfileCode->viewAttributes() ?>><?php echo $lab_profile_master_delete->ProfileCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->ProfileName->Visible) { // ProfileName ?>
		<td <?php echo $lab_profile_master_delete->ProfileName->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_ProfileName" class="lab_profile_master_ProfileName">
<span<?php echo $lab_profile_master_delete->ProfileName->viewAttributes() ?>><?php echo $lab_profile_master_delete->ProfileName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->ProfileAmount->Visible) { // ProfileAmount ?>
		<td <?php echo $lab_profile_master_delete->ProfileAmount->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_ProfileAmount" class="lab_profile_master_ProfileAmount">
<span<?php echo $lab_profile_master_delete->ProfileAmount->viewAttributes() ?>><?php echo $lab_profile_master_delete->ProfileAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->ProfileSpecialAmount->Visible) { // ProfileSpecialAmount ?>
		<td <?php echo $lab_profile_master_delete->ProfileSpecialAmount->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_ProfileSpecialAmount" class="lab_profile_master_ProfileSpecialAmount">
<span<?php echo $lab_profile_master_delete->ProfileSpecialAmount->viewAttributes() ?>><?php echo $lab_profile_master_delete->ProfileSpecialAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->ProfileMasterInactive->Visible) { // ProfileMasterInactive ?>
		<td <?php echo $lab_profile_master_delete->ProfileMasterInactive->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_ProfileMasterInactive" class="lab_profile_master_ProfileMasterInactive">
<span<?php echo $lab_profile_master_delete->ProfileMasterInactive->viewAttributes() ?>><?php echo $lab_profile_master_delete->ProfileMasterInactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->ReagentAmt->Visible) { // ReagentAmt ?>
		<td <?php echo $lab_profile_master_delete->ReagentAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_ReagentAmt" class="lab_profile_master_ReagentAmt">
<span<?php echo $lab_profile_master_delete->ReagentAmt->viewAttributes() ?>><?php echo $lab_profile_master_delete->ReagentAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->LabAmt->Visible) { // LabAmt ?>
		<td <?php echo $lab_profile_master_delete->LabAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_LabAmt" class="lab_profile_master_LabAmt">
<span<?php echo $lab_profile_master_delete->LabAmt->viewAttributes() ?>><?php echo $lab_profile_master_delete->LabAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->RefAmt->Visible) { // RefAmt ?>
		<td <?php echo $lab_profile_master_delete->RefAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_RefAmt" class="lab_profile_master_RefAmt">
<span<?php echo $lab_profile_master_delete->RefAmt->viewAttributes() ?>><?php echo $lab_profile_master_delete->RefAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->MainDeptCD->Visible) { // MainDeptCD ?>
		<td <?php echo $lab_profile_master_delete->MainDeptCD->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_MainDeptCD" class="lab_profile_master_MainDeptCD">
<span<?php echo $lab_profile_master_delete->MainDeptCD->viewAttributes() ?>><?php echo $lab_profile_master_delete->MainDeptCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->Individual->Visible) { // Individual ?>
		<td <?php echo $lab_profile_master_delete->Individual->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_Individual" class="lab_profile_master_Individual">
<span<?php echo $lab_profile_master_delete->Individual->viewAttributes() ?>><?php echo $lab_profile_master_delete->Individual->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->ShortName->Visible) { // ShortName ?>
		<td <?php echo $lab_profile_master_delete->ShortName->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_ShortName" class="lab_profile_master_ShortName">
<span<?php echo $lab_profile_master_delete->ShortName->viewAttributes() ?>><?php echo $lab_profile_master_delete->ShortName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->PrevAmt->Visible) { // PrevAmt ?>
		<td <?php echo $lab_profile_master_delete->PrevAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_PrevAmt" class="lab_profile_master_PrevAmt">
<span<?php echo $lab_profile_master_delete->PrevAmt->viewAttributes() ?>><?php echo $lab_profile_master_delete->PrevAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->BillName->Visible) { // BillName ?>
		<td <?php echo $lab_profile_master_delete->BillName->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_BillName" class="lab_profile_master_BillName">
<span<?php echo $lab_profile_master_delete->BillName->viewAttributes() ?>><?php echo $lab_profile_master_delete->BillName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->ActualAmt->Visible) { // ActualAmt ?>
		<td <?php echo $lab_profile_master_delete->ActualAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_ActualAmt" class="lab_profile_master_ActualAmt">
<span<?php echo $lab_profile_master_delete->ActualAmt->viewAttributes() ?>><?php echo $lab_profile_master_delete->ActualAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->NoHeading->Visible) { // NoHeading ?>
		<td <?php echo $lab_profile_master_delete->NoHeading->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_NoHeading" class="lab_profile_master_NoHeading">
<span<?php echo $lab_profile_master_delete->NoHeading->viewAttributes() ?>><?php echo $lab_profile_master_delete->NoHeading->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->EditDate->Visible) { // EditDate ?>
		<td <?php echo $lab_profile_master_delete->EditDate->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_EditDate" class="lab_profile_master_EditDate">
<span<?php echo $lab_profile_master_delete->EditDate->viewAttributes() ?>><?php echo $lab_profile_master_delete->EditDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->EditUser->Visible) { // EditUser ?>
		<td <?php echo $lab_profile_master_delete->EditUser->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_EditUser" class="lab_profile_master_EditUser">
<span<?php echo $lab_profile_master_delete->EditUser->viewAttributes() ?>><?php echo $lab_profile_master_delete->EditUser->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->HISCD->Visible) { // HISCD ?>
		<td <?php echo $lab_profile_master_delete->HISCD->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_HISCD" class="lab_profile_master_HISCD">
<span<?php echo $lab_profile_master_delete->HISCD->viewAttributes() ?>><?php echo $lab_profile_master_delete->HISCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->PriceList->Visible) { // PriceList ?>
		<td <?php echo $lab_profile_master_delete->PriceList->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_PriceList" class="lab_profile_master_PriceList">
<span<?php echo $lab_profile_master_delete->PriceList->viewAttributes() ?>><?php echo $lab_profile_master_delete->PriceList->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->IPAmt->Visible) { // IPAmt ?>
		<td <?php echo $lab_profile_master_delete->IPAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_IPAmt" class="lab_profile_master_IPAmt">
<span<?php echo $lab_profile_master_delete->IPAmt->viewAttributes() ?>><?php echo $lab_profile_master_delete->IPAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->IInsAmt->Visible) { // IInsAmt ?>
		<td <?php echo $lab_profile_master_delete->IInsAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_IInsAmt" class="lab_profile_master_IInsAmt">
<span<?php echo $lab_profile_master_delete->IInsAmt->viewAttributes() ?>><?php echo $lab_profile_master_delete->IInsAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->ManualCD->Visible) { // ManualCD ?>
		<td <?php echo $lab_profile_master_delete->ManualCD->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_ManualCD" class="lab_profile_master_ManualCD">
<span<?php echo $lab_profile_master_delete->ManualCD->viewAttributes() ?>><?php echo $lab_profile_master_delete->ManualCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->Free->Visible) { // Free ?>
		<td <?php echo $lab_profile_master_delete->Free->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_Free" class="lab_profile_master_Free">
<span<?php echo $lab_profile_master_delete->Free->viewAttributes() ?>><?php echo $lab_profile_master_delete->Free->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->IIpAmt->Visible) { // IIpAmt ?>
		<td <?php echo $lab_profile_master_delete->IIpAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_IIpAmt" class="lab_profile_master_IIpAmt">
<span<?php echo $lab_profile_master_delete->IIpAmt->viewAttributes() ?>><?php echo $lab_profile_master_delete->IIpAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->InsAmt->Visible) { // InsAmt ?>
		<td <?php echo $lab_profile_master_delete->InsAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_InsAmt" class="lab_profile_master_InsAmt">
<span<?php echo $lab_profile_master_delete->InsAmt->viewAttributes() ?>><?php echo $lab_profile_master_delete->InsAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_profile_master_delete->OutSource->Visible) { // OutSource ?>
		<td <?php echo $lab_profile_master_delete->OutSource->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_delete->RowCount ?>_lab_profile_master_OutSource" class="lab_profile_master_OutSource">
<span<?php echo $lab_profile_master_delete->OutSource->viewAttributes() ?>><?php echo $lab_profile_master_delete->OutSource->getViewValue() ?></span>
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
$lab_profile_master_delete->terminate();
?>