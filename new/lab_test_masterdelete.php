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
$lab_test_master_delete = new lab_test_master_delete();

// Run the page
$lab_test_master_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_test_master_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flab_test_masterdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	flab_test_masterdelete = currentForm = new ew.Form("flab_test_masterdelete", "delete");
	loadjs.done("flab_test_masterdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lab_test_master_delete->showPageHeader(); ?>
<?php
$lab_test_master_delete->showMessage();
?>
<form name="flab_test_masterdelete" id="flab_test_masterdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_test_master">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lab_test_master_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lab_test_master_delete->id->Visible) { // id ?>
		<th class="<?php echo $lab_test_master_delete->id->headerCellClass() ?>"><span id="elh_lab_test_master_id" class="lab_test_master_id"><?php echo $lab_test_master_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->MainDeptCd->Visible) { // MainDeptCd ?>
		<th class="<?php echo $lab_test_master_delete->MainDeptCd->headerCellClass() ?>"><span id="elh_lab_test_master_MainDeptCd" class="lab_test_master_MainDeptCd"><?php echo $lab_test_master_delete->MainDeptCd->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->DeptCd->Visible) { // DeptCd ?>
		<th class="<?php echo $lab_test_master_delete->DeptCd->headerCellClass() ?>"><span id="elh_lab_test_master_DeptCd" class="lab_test_master_DeptCd"><?php echo $lab_test_master_delete->DeptCd->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->TestCd->Visible) { // TestCd ?>
		<th class="<?php echo $lab_test_master_delete->TestCd->headerCellClass() ?>"><span id="elh_lab_test_master_TestCd" class="lab_test_master_TestCd"><?php echo $lab_test_master_delete->TestCd->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->TestSubCd->Visible) { // TestSubCd ?>
		<th class="<?php echo $lab_test_master_delete->TestSubCd->headerCellClass() ?>"><span id="elh_lab_test_master_TestSubCd" class="lab_test_master_TestSubCd"><?php echo $lab_test_master_delete->TestSubCd->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->TestName->Visible) { // TestName ?>
		<th class="<?php echo $lab_test_master_delete->TestName->headerCellClass() ?>"><span id="elh_lab_test_master_TestName" class="lab_test_master_TestName"><?php echo $lab_test_master_delete->TestName->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->XrayPart->Visible) { // XrayPart ?>
		<th class="<?php echo $lab_test_master_delete->XrayPart->headerCellClass() ?>"><span id="elh_lab_test_master_XrayPart" class="lab_test_master_XrayPart"><?php echo $lab_test_master_delete->XrayPart->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Method->Visible) { // Method ?>
		<th class="<?php echo $lab_test_master_delete->Method->headerCellClass() ?>"><span id="elh_lab_test_master_Method" class="lab_test_master_Method"><?php echo $lab_test_master_delete->Method->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Order->Visible) { // Order ?>
		<th class="<?php echo $lab_test_master_delete->Order->headerCellClass() ?>"><span id="elh_lab_test_master_Order" class="lab_test_master_Order"><?php echo $lab_test_master_delete->Order->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Form->Visible) { // Form ?>
		<th class="<?php echo $lab_test_master_delete->Form->headerCellClass() ?>"><span id="elh_lab_test_master_Form" class="lab_test_master_Form"><?php echo $lab_test_master_delete->Form->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Amt->Visible) { // Amt ?>
		<th class="<?php echo $lab_test_master_delete->Amt->headerCellClass() ?>"><span id="elh_lab_test_master_Amt" class="lab_test_master_Amt"><?php echo $lab_test_master_delete->Amt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->SplAmt->Visible) { // SplAmt ?>
		<th class="<?php echo $lab_test_master_delete->SplAmt->headerCellClass() ?>"><span id="elh_lab_test_master_SplAmt" class="lab_test_master_SplAmt"><?php echo $lab_test_master_delete->SplAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->ResType->Visible) { // ResType ?>
		<th class="<?php echo $lab_test_master_delete->ResType->headerCellClass() ?>"><span id="elh_lab_test_master_ResType" class="lab_test_master_ResType"><?php echo $lab_test_master_delete->ResType->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->UnitCD->Visible) { // UnitCD ?>
		<th class="<?php echo $lab_test_master_delete->UnitCD->headerCellClass() ?>"><span id="elh_lab_test_master_UnitCD" class="lab_test_master_UnitCD"><?php echo $lab_test_master_delete->UnitCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Sample->Visible) { // Sample ?>
		<th class="<?php echo $lab_test_master_delete->Sample->headerCellClass() ?>"><span id="elh_lab_test_master_Sample" class="lab_test_master_Sample"><?php echo $lab_test_master_delete->Sample->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->NoD->Visible) { // NoD ?>
		<th class="<?php echo $lab_test_master_delete->NoD->headerCellClass() ?>"><span id="elh_lab_test_master_NoD" class="lab_test_master_NoD"><?php echo $lab_test_master_delete->NoD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->BillOrder->Visible) { // BillOrder ?>
		<th class="<?php echo $lab_test_master_delete->BillOrder->headerCellClass() ?>"><span id="elh_lab_test_master_BillOrder" class="lab_test_master_BillOrder"><?php echo $lab_test_master_delete->BillOrder->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Inactive->Visible) { // Inactive ?>
		<th class="<?php echo $lab_test_master_delete->Inactive->headerCellClass() ?>"><span id="elh_lab_test_master_Inactive" class="lab_test_master_Inactive"><?php echo $lab_test_master_delete->Inactive->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->ReagentAmt->Visible) { // ReagentAmt ?>
		<th class="<?php echo $lab_test_master_delete->ReagentAmt->headerCellClass() ?>"><span id="elh_lab_test_master_ReagentAmt" class="lab_test_master_ReagentAmt"><?php echo $lab_test_master_delete->ReagentAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->LabAmt->Visible) { // LabAmt ?>
		<th class="<?php echo $lab_test_master_delete->LabAmt->headerCellClass() ?>"><span id="elh_lab_test_master_LabAmt" class="lab_test_master_LabAmt"><?php echo $lab_test_master_delete->LabAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->RefAmt->Visible) { // RefAmt ?>
		<th class="<?php echo $lab_test_master_delete->RefAmt->headerCellClass() ?>"><span id="elh_lab_test_master_RefAmt" class="lab_test_master_RefAmt"><?php echo $lab_test_master_delete->RefAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->CreFrom->Visible) { // CreFrom ?>
		<th class="<?php echo $lab_test_master_delete->CreFrom->headerCellClass() ?>"><span id="elh_lab_test_master_CreFrom" class="lab_test_master_CreFrom"><?php echo $lab_test_master_delete->CreFrom->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->CreTo->Visible) { // CreTo ?>
		<th class="<?php echo $lab_test_master_delete->CreTo->headerCellClass() ?>"><span id="elh_lab_test_master_CreTo" class="lab_test_master_CreTo"><?php echo $lab_test_master_delete->CreTo->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Sun->Visible) { // Sun ?>
		<th class="<?php echo $lab_test_master_delete->Sun->headerCellClass() ?>"><span id="elh_lab_test_master_Sun" class="lab_test_master_Sun"><?php echo $lab_test_master_delete->Sun->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Mon->Visible) { // Mon ?>
		<th class="<?php echo $lab_test_master_delete->Mon->headerCellClass() ?>"><span id="elh_lab_test_master_Mon" class="lab_test_master_Mon"><?php echo $lab_test_master_delete->Mon->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Tue->Visible) { // Tue ?>
		<th class="<?php echo $lab_test_master_delete->Tue->headerCellClass() ?>"><span id="elh_lab_test_master_Tue" class="lab_test_master_Tue"><?php echo $lab_test_master_delete->Tue->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Wed->Visible) { // Wed ?>
		<th class="<?php echo $lab_test_master_delete->Wed->headerCellClass() ?>"><span id="elh_lab_test_master_Wed" class="lab_test_master_Wed"><?php echo $lab_test_master_delete->Wed->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Thi->Visible) { // Thi ?>
		<th class="<?php echo $lab_test_master_delete->Thi->headerCellClass() ?>"><span id="elh_lab_test_master_Thi" class="lab_test_master_Thi"><?php echo $lab_test_master_delete->Thi->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Fri->Visible) { // Fri ?>
		<th class="<?php echo $lab_test_master_delete->Fri->headerCellClass() ?>"><span id="elh_lab_test_master_Fri" class="lab_test_master_Fri"><?php echo $lab_test_master_delete->Fri->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Sat->Visible) { // Sat ?>
		<th class="<?php echo $lab_test_master_delete->Sat->headerCellClass() ?>"><span id="elh_lab_test_master_Sat" class="lab_test_master_Sat"><?php echo $lab_test_master_delete->Sat->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Days->Visible) { // Days ?>
		<th class="<?php echo $lab_test_master_delete->Days->headerCellClass() ?>"><span id="elh_lab_test_master_Days" class="lab_test_master_Days"><?php echo $lab_test_master_delete->Days->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Cutoff->Visible) { // Cutoff ?>
		<th class="<?php echo $lab_test_master_delete->Cutoff->headerCellClass() ?>"><span id="elh_lab_test_master_Cutoff" class="lab_test_master_Cutoff"><?php echo $lab_test_master_delete->Cutoff->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->FontBold->Visible) { // FontBold ?>
		<th class="<?php echo $lab_test_master_delete->FontBold->headerCellClass() ?>"><span id="elh_lab_test_master_FontBold" class="lab_test_master_FontBold"><?php echo $lab_test_master_delete->FontBold->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->TestHeading->Visible) { // TestHeading ?>
		<th class="<?php echo $lab_test_master_delete->TestHeading->headerCellClass() ?>"><span id="elh_lab_test_master_TestHeading" class="lab_test_master_TestHeading"><?php echo $lab_test_master_delete->TestHeading->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Outsource->Visible) { // Outsource ?>
		<th class="<?php echo $lab_test_master_delete->Outsource->headerCellClass() ?>"><span id="elh_lab_test_master_Outsource" class="lab_test_master_Outsource"><?php echo $lab_test_master_delete->Outsource->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->NoResult->Visible) { // NoResult ?>
		<th class="<?php echo $lab_test_master_delete->NoResult->headerCellClass() ?>"><span id="elh_lab_test_master_NoResult" class="lab_test_master_NoResult"><?php echo $lab_test_master_delete->NoResult->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->GraphLow->Visible) { // GraphLow ?>
		<th class="<?php echo $lab_test_master_delete->GraphLow->headerCellClass() ?>"><span id="elh_lab_test_master_GraphLow" class="lab_test_master_GraphLow"><?php echo $lab_test_master_delete->GraphLow->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->GraphHigh->Visible) { // GraphHigh ?>
		<th class="<?php echo $lab_test_master_delete->GraphHigh->headerCellClass() ?>"><span id="elh_lab_test_master_GraphHigh" class="lab_test_master_GraphHigh"><?php echo $lab_test_master_delete->GraphHigh->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->CollSample->Visible) { // CollSample ?>
		<th class="<?php echo $lab_test_master_delete->CollSample->headerCellClass() ?>"><span id="elh_lab_test_master_CollSample" class="lab_test_master_CollSample"><?php echo $lab_test_master_delete->CollSample->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->ProcessTime->Visible) { // ProcessTime ?>
		<th class="<?php echo $lab_test_master_delete->ProcessTime->headerCellClass() ?>"><span id="elh_lab_test_master_ProcessTime" class="lab_test_master_ProcessTime"><?php echo $lab_test_master_delete->ProcessTime->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->TamilName->Visible) { // TamilName ?>
		<th class="<?php echo $lab_test_master_delete->TamilName->headerCellClass() ?>"><span id="elh_lab_test_master_TamilName" class="lab_test_master_TamilName"><?php echo $lab_test_master_delete->TamilName->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->ShortName->Visible) { // ShortName ?>
		<th class="<?php echo $lab_test_master_delete->ShortName->headerCellClass() ?>"><span id="elh_lab_test_master_ShortName" class="lab_test_master_ShortName"><?php echo $lab_test_master_delete->ShortName->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Individual->Visible) { // Individual ?>
		<th class="<?php echo $lab_test_master_delete->Individual->headerCellClass() ?>"><span id="elh_lab_test_master_Individual" class="lab_test_master_Individual"><?php echo $lab_test_master_delete->Individual->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->PrevAmt->Visible) { // PrevAmt ?>
		<th class="<?php echo $lab_test_master_delete->PrevAmt->headerCellClass() ?>"><span id="elh_lab_test_master_PrevAmt" class="lab_test_master_PrevAmt"><?php echo $lab_test_master_delete->PrevAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->PrevSplAmt->Visible) { // PrevSplAmt ?>
		<th class="<?php echo $lab_test_master_delete->PrevSplAmt->headerCellClass() ?>"><span id="elh_lab_test_master_PrevSplAmt" class="lab_test_master_PrevSplAmt"><?php echo $lab_test_master_delete->PrevSplAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->EditDate->Visible) { // EditDate ?>
		<th class="<?php echo $lab_test_master_delete->EditDate->headerCellClass() ?>"><span id="elh_lab_test_master_EditDate" class="lab_test_master_EditDate"><?php echo $lab_test_master_delete->EditDate->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->BillName->Visible) { // BillName ?>
		<th class="<?php echo $lab_test_master_delete->BillName->headerCellClass() ?>"><span id="elh_lab_test_master_BillName" class="lab_test_master_BillName"><?php echo $lab_test_master_delete->BillName->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->ActualAmt->Visible) { // ActualAmt ?>
		<th class="<?php echo $lab_test_master_delete->ActualAmt->headerCellClass() ?>"><span id="elh_lab_test_master_ActualAmt" class="lab_test_master_ActualAmt"><?php echo $lab_test_master_delete->ActualAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->HISCD->Visible) { // HISCD ?>
		<th class="<?php echo $lab_test_master_delete->HISCD->headerCellClass() ?>"><span id="elh_lab_test_master_HISCD" class="lab_test_master_HISCD"><?php echo $lab_test_master_delete->HISCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->PriceList->Visible) { // PriceList ?>
		<th class="<?php echo $lab_test_master_delete->PriceList->headerCellClass() ?>"><span id="elh_lab_test_master_PriceList" class="lab_test_master_PriceList"><?php echo $lab_test_master_delete->PriceList->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->IPAmt->Visible) { // IPAmt ?>
		<th class="<?php echo $lab_test_master_delete->IPAmt->headerCellClass() ?>"><span id="elh_lab_test_master_IPAmt" class="lab_test_master_IPAmt"><?php echo $lab_test_master_delete->IPAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->InsAmt->Visible) { // InsAmt ?>
		<th class="<?php echo $lab_test_master_delete->InsAmt->headerCellClass() ?>"><span id="elh_lab_test_master_InsAmt" class="lab_test_master_InsAmt"><?php echo $lab_test_master_delete->InsAmt->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->ManualCD->Visible) { // ManualCD ?>
		<th class="<?php echo $lab_test_master_delete->ManualCD->headerCellClass() ?>"><span id="elh_lab_test_master_ManualCD" class="lab_test_master_ManualCD"><?php echo $lab_test_master_delete->ManualCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Free->Visible) { // Free ?>
		<th class="<?php echo $lab_test_master_delete->Free->headerCellClass() ?>"><span id="elh_lab_test_master_Free" class="lab_test_master_Free"><?php echo $lab_test_master_delete->Free->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->AutoAuth->Visible) { // AutoAuth ?>
		<th class="<?php echo $lab_test_master_delete->AutoAuth->headerCellClass() ?>"><span id="elh_lab_test_master_AutoAuth" class="lab_test_master_AutoAuth"><?php echo $lab_test_master_delete->AutoAuth->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->ProductCD->Visible) { // ProductCD ?>
		<th class="<?php echo $lab_test_master_delete->ProductCD->headerCellClass() ?>"><span id="elh_lab_test_master_ProductCD" class="lab_test_master_ProductCD"><?php echo $lab_test_master_delete->ProductCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Inventory->Visible) { // Inventory ?>
		<th class="<?php echo $lab_test_master_delete->Inventory->headerCellClass() ?>"><span id="elh_lab_test_master_Inventory" class="lab_test_master_Inventory"><?php echo $lab_test_master_delete->Inventory->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->IntimateTest->Visible) { // IntimateTest ?>
		<th class="<?php echo $lab_test_master_delete->IntimateTest->headerCellClass() ?>"><span id="elh_lab_test_master_IntimateTest" class="lab_test_master_IntimateTest"><?php echo $lab_test_master_delete->IntimateTest->caption() ?></span></th>
<?php } ?>
<?php if ($lab_test_master_delete->Manual->Visible) { // Manual ?>
		<th class="<?php echo $lab_test_master_delete->Manual->headerCellClass() ?>"><span id="elh_lab_test_master_Manual" class="lab_test_master_Manual"><?php echo $lab_test_master_delete->Manual->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lab_test_master_delete->RecordCount = 0;
$i = 0;
while (!$lab_test_master_delete->Recordset->EOF) {
	$lab_test_master_delete->RecordCount++;
	$lab_test_master_delete->RowCount++;

	// Set row properties
	$lab_test_master->resetAttributes();
	$lab_test_master->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lab_test_master_delete->loadRowValues($lab_test_master_delete->Recordset);

	// Render row
	$lab_test_master_delete->renderRow();
?>
	<tr <?php echo $lab_test_master->rowAttributes() ?>>
<?php if ($lab_test_master_delete->id->Visible) { // id ?>
		<td <?php echo $lab_test_master_delete->id->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_id" class="lab_test_master_id">
<span<?php echo $lab_test_master_delete->id->viewAttributes() ?>><?php echo $lab_test_master_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->MainDeptCd->Visible) { // MainDeptCd ?>
		<td <?php echo $lab_test_master_delete->MainDeptCd->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_MainDeptCd" class="lab_test_master_MainDeptCd">
<span<?php echo $lab_test_master_delete->MainDeptCd->viewAttributes() ?>><?php echo $lab_test_master_delete->MainDeptCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->DeptCd->Visible) { // DeptCd ?>
		<td <?php echo $lab_test_master_delete->DeptCd->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_DeptCd" class="lab_test_master_DeptCd">
<span<?php echo $lab_test_master_delete->DeptCd->viewAttributes() ?>><?php echo $lab_test_master_delete->DeptCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->TestCd->Visible) { // TestCd ?>
		<td <?php echo $lab_test_master_delete->TestCd->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_TestCd" class="lab_test_master_TestCd">
<span<?php echo $lab_test_master_delete->TestCd->viewAttributes() ?>><?php echo $lab_test_master_delete->TestCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->TestSubCd->Visible) { // TestSubCd ?>
		<td <?php echo $lab_test_master_delete->TestSubCd->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_TestSubCd" class="lab_test_master_TestSubCd">
<span<?php echo $lab_test_master_delete->TestSubCd->viewAttributes() ?>><?php echo $lab_test_master_delete->TestSubCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->TestName->Visible) { // TestName ?>
		<td <?php echo $lab_test_master_delete->TestName->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_TestName" class="lab_test_master_TestName">
<span<?php echo $lab_test_master_delete->TestName->viewAttributes() ?>><?php echo $lab_test_master_delete->TestName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->XrayPart->Visible) { // XrayPart ?>
		<td <?php echo $lab_test_master_delete->XrayPart->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_XrayPart" class="lab_test_master_XrayPart">
<span<?php echo $lab_test_master_delete->XrayPart->viewAttributes() ?>><?php echo $lab_test_master_delete->XrayPart->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Method->Visible) { // Method ?>
		<td <?php echo $lab_test_master_delete->Method->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Method" class="lab_test_master_Method">
<span<?php echo $lab_test_master_delete->Method->viewAttributes() ?>><?php echo $lab_test_master_delete->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Order->Visible) { // Order ?>
		<td <?php echo $lab_test_master_delete->Order->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Order" class="lab_test_master_Order">
<span<?php echo $lab_test_master_delete->Order->viewAttributes() ?>><?php echo $lab_test_master_delete->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Form->Visible) { // Form ?>
		<td <?php echo $lab_test_master_delete->Form->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Form" class="lab_test_master_Form">
<span<?php echo $lab_test_master_delete->Form->viewAttributes() ?>><?php echo $lab_test_master_delete->Form->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Amt->Visible) { // Amt ?>
		<td <?php echo $lab_test_master_delete->Amt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Amt" class="lab_test_master_Amt">
<span<?php echo $lab_test_master_delete->Amt->viewAttributes() ?>><?php echo $lab_test_master_delete->Amt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->SplAmt->Visible) { // SplAmt ?>
		<td <?php echo $lab_test_master_delete->SplAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_SplAmt" class="lab_test_master_SplAmt">
<span<?php echo $lab_test_master_delete->SplAmt->viewAttributes() ?>><?php echo $lab_test_master_delete->SplAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->ResType->Visible) { // ResType ?>
		<td <?php echo $lab_test_master_delete->ResType->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_ResType" class="lab_test_master_ResType">
<span<?php echo $lab_test_master_delete->ResType->viewAttributes() ?>><?php echo $lab_test_master_delete->ResType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->UnitCD->Visible) { // UnitCD ?>
		<td <?php echo $lab_test_master_delete->UnitCD->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_UnitCD" class="lab_test_master_UnitCD">
<span<?php echo $lab_test_master_delete->UnitCD->viewAttributes() ?>><?php echo $lab_test_master_delete->UnitCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Sample->Visible) { // Sample ?>
		<td <?php echo $lab_test_master_delete->Sample->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Sample" class="lab_test_master_Sample">
<span<?php echo $lab_test_master_delete->Sample->viewAttributes() ?>><?php echo $lab_test_master_delete->Sample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->NoD->Visible) { // NoD ?>
		<td <?php echo $lab_test_master_delete->NoD->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_NoD" class="lab_test_master_NoD">
<span<?php echo $lab_test_master_delete->NoD->viewAttributes() ?>><?php echo $lab_test_master_delete->NoD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->BillOrder->Visible) { // BillOrder ?>
		<td <?php echo $lab_test_master_delete->BillOrder->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_BillOrder" class="lab_test_master_BillOrder">
<span<?php echo $lab_test_master_delete->BillOrder->viewAttributes() ?>><?php echo $lab_test_master_delete->BillOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Inactive->Visible) { // Inactive ?>
		<td <?php echo $lab_test_master_delete->Inactive->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Inactive" class="lab_test_master_Inactive">
<span<?php echo $lab_test_master_delete->Inactive->viewAttributes() ?>><?php echo $lab_test_master_delete->Inactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->ReagentAmt->Visible) { // ReagentAmt ?>
		<td <?php echo $lab_test_master_delete->ReagentAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_ReagentAmt" class="lab_test_master_ReagentAmt">
<span<?php echo $lab_test_master_delete->ReagentAmt->viewAttributes() ?>><?php echo $lab_test_master_delete->ReagentAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->LabAmt->Visible) { // LabAmt ?>
		<td <?php echo $lab_test_master_delete->LabAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_LabAmt" class="lab_test_master_LabAmt">
<span<?php echo $lab_test_master_delete->LabAmt->viewAttributes() ?>><?php echo $lab_test_master_delete->LabAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->RefAmt->Visible) { // RefAmt ?>
		<td <?php echo $lab_test_master_delete->RefAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_RefAmt" class="lab_test_master_RefAmt">
<span<?php echo $lab_test_master_delete->RefAmt->viewAttributes() ?>><?php echo $lab_test_master_delete->RefAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->CreFrom->Visible) { // CreFrom ?>
		<td <?php echo $lab_test_master_delete->CreFrom->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_CreFrom" class="lab_test_master_CreFrom">
<span<?php echo $lab_test_master_delete->CreFrom->viewAttributes() ?>><?php echo $lab_test_master_delete->CreFrom->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->CreTo->Visible) { // CreTo ?>
		<td <?php echo $lab_test_master_delete->CreTo->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_CreTo" class="lab_test_master_CreTo">
<span<?php echo $lab_test_master_delete->CreTo->viewAttributes() ?>><?php echo $lab_test_master_delete->CreTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Sun->Visible) { // Sun ?>
		<td <?php echo $lab_test_master_delete->Sun->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Sun" class="lab_test_master_Sun">
<span<?php echo $lab_test_master_delete->Sun->viewAttributes() ?>><?php echo $lab_test_master_delete->Sun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Mon->Visible) { // Mon ?>
		<td <?php echo $lab_test_master_delete->Mon->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Mon" class="lab_test_master_Mon">
<span<?php echo $lab_test_master_delete->Mon->viewAttributes() ?>><?php echo $lab_test_master_delete->Mon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Tue->Visible) { // Tue ?>
		<td <?php echo $lab_test_master_delete->Tue->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Tue" class="lab_test_master_Tue">
<span<?php echo $lab_test_master_delete->Tue->viewAttributes() ?>><?php echo $lab_test_master_delete->Tue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Wed->Visible) { // Wed ?>
		<td <?php echo $lab_test_master_delete->Wed->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Wed" class="lab_test_master_Wed">
<span<?php echo $lab_test_master_delete->Wed->viewAttributes() ?>><?php echo $lab_test_master_delete->Wed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Thi->Visible) { // Thi ?>
		<td <?php echo $lab_test_master_delete->Thi->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Thi" class="lab_test_master_Thi">
<span<?php echo $lab_test_master_delete->Thi->viewAttributes() ?>><?php echo $lab_test_master_delete->Thi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Fri->Visible) { // Fri ?>
		<td <?php echo $lab_test_master_delete->Fri->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Fri" class="lab_test_master_Fri">
<span<?php echo $lab_test_master_delete->Fri->viewAttributes() ?>><?php echo $lab_test_master_delete->Fri->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Sat->Visible) { // Sat ?>
		<td <?php echo $lab_test_master_delete->Sat->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Sat" class="lab_test_master_Sat">
<span<?php echo $lab_test_master_delete->Sat->viewAttributes() ?>><?php echo $lab_test_master_delete->Sat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Days->Visible) { // Days ?>
		<td <?php echo $lab_test_master_delete->Days->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Days" class="lab_test_master_Days">
<span<?php echo $lab_test_master_delete->Days->viewAttributes() ?>><?php echo $lab_test_master_delete->Days->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Cutoff->Visible) { // Cutoff ?>
		<td <?php echo $lab_test_master_delete->Cutoff->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Cutoff" class="lab_test_master_Cutoff">
<span<?php echo $lab_test_master_delete->Cutoff->viewAttributes() ?>><?php echo $lab_test_master_delete->Cutoff->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->FontBold->Visible) { // FontBold ?>
		<td <?php echo $lab_test_master_delete->FontBold->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_FontBold" class="lab_test_master_FontBold">
<span<?php echo $lab_test_master_delete->FontBold->viewAttributes() ?>><?php echo $lab_test_master_delete->FontBold->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->TestHeading->Visible) { // TestHeading ?>
		<td <?php echo $lab_test_master_delete->TestHeading->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_TestHeading" class="lab_test_master_TestHeading">
<span<?php echo $lab_test_master_delete->TestHeading->viewAttributes() ?>><?php echo $lab_test_master_delete->TestHeading->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Outsource->Visible) { // Outsource ?>
		<td <?php echo $lab_test_master_delete->Outsource->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Outsource" class="lab_test_master_Outsource">
<span<?php echo $lab_test_master_delete->Outsource->viewAttributes() ?>><?php echo $lab_test_master_delete->Outsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->NoResult->Visible) { // NoResult ?>
		<td <?php echo $lab_test_master_delete->NoResult->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_NoResult" class="lab_test_master_NoResult">
<span<?php echo $lab_test_master_delete->NoResult->viewAttributes() ?>><?php echo $lab_test_master_delete->NoResult->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->GraphLow->Visible) { // GraphLow ?>
		<td <?php echo $lab_test_master_delete->GraphLow->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_GraphLow" class="lab_test_master_GraphLow">
<span<?php echo $lab_test_master_delete->GraphLow->viewAttributes() ?>><?php echo $lab_test_master_delete->GraphLow->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->GraphHigh->Visible) { // GraphHigh ?>
		<td <?php echo $lab_test_master_delete->GraphHigh->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_GraphHigh" class="lab_test_master_GraphHigh">
<span<?php echo $lab_test_master_delete->GraphHigh->viewAttributes() ?>><?php echo $lab_test_master_delete->GraphHigh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->CollSample->Visible) { // CollSample ?>
		<td <?php echo $lab_test_master_delete->CollSample->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_CollSample" class="lab_test_master_CollSample">
<span<?php echo $lab_test_master_delete->CollSample->viewAttributes() ?>><?php echo $lab_test_master_delete->CollSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->ProcessTime->Visible) { // ProcessTime ?>
		<td <?php echo $lab_test_master_delete->ProcessTime->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_ProcessTime" class="lab_test_master_ProcessTime">
<span<?php echo $lab_test_master_delete->ProcessTime->viewAttributes() ?>><?php echo $lab_test_master_delete->ProcessTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->TamilName->Visible) { // TamilName ?>
		<td <?php echo $lab_test_master_delete->TamilName->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_TamilName" class="lab_test_master_TamilName">
<span<?php echo $lab_test_master_delete->TamilName->viewAttributes() ?>><?php echo $lab_test_master_delete->TamilName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->ShortName->Visible) { // ShortName ?>
		<td <?php echo $lab_test_master_delete->ShortName->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_ShortName" class="lab_test_master_ShortName">
<span<?php echo $lab_test_master_delete->ShortName->viewAttributes() ?>><?php echo $lab_test_master_delete->ShortName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Individual->Visible) { // Individual ?>
		<td <?php echo $lab_test_master_delete->Individual->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Individual" class="lab_test_master_Individual">
<span<?php echo $lab_test_master_delete->Individual->viewAttributes() ?>><?php echo $lab_test_master_delete->Individual->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->PrevAmt->Visible) { // PrevAmt ?>
		<td <?php echo $lab_test_master_delete->PrevAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_PrevAmt" class="lab_test_master_PrevAmt">
<span<?php echo $lab_test_master_delete->PrevAmt->viewAttributes() ?>><?php echo $lab_test_master_delete->PrevAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->PrevSplAmt->Visible) { // PrevSplAmt ?>
		<td <?php echo $lab_test_master_delete->PrevSplAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_PrevSplAmt" class="lab_test_master_PrevSplAmt">
<span<?php echo $lab_test_master_delete->PrevSplAmt->viewAttributes() ?>><?php echo $lab_test_master_delete->PrevSplAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->EditDate->Visible) { // EditDate ?>
		<td <?php echo $lab_test_master_delete->EditDate->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_EditDate" class="lab_test_master_EditDate">
<span<?php echo $lab_test_master_delete->EditDate->viewAttributes() ?>><?php echo $lab_test_master_delete->EditDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->BillName->Visible) { // BillName ?>
		<td <?php echo $lab_test_master_delete->BillName->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_BillName" class="lab_test_master_BillName">
<span<?php echo $lab_test_master_delete->BillName->viewAttributes() ?>><?php echo $lab_test_master_delete->BillName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->ActualAmt->Visible) { // ActualAmt ?>
		<td <?php echo $lab_test_master_delete->ActualAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_ActualAmt" class="lab_test_master_ActualAmt">
<span<?php echo $lab_test_master_delete->ActualAmt->viewAttributes() ?>><?php echo $lab_test_master_delete->ActualAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->HISCD->Visible) { // HISCD ?>
		<td <?php echo $lab_test_master_delete->HISCD->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_HISCD" class="lab_test_master_HISCD">
<span<?php echo $lab_test_master_delete->HISCD->viewAttributes() ?>><?php echo $lab_test_master_delete->HISCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->PriceList->Visible) { // PriceList ?>
		<td <?php echo $lab_test_master_delete->PriceList->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_PriceList" class="lab_test_master_PriceList">
<span<?php echo $lab_test_master_delete->PriceList->viewAttributes() ?>><?php echo $lab_test_master_delete->PriceList->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->IPAmt->Visible) { // IPAmt ?>
		<td <?php echo $lab_test_master_delete->IPAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_IPAmt" class="lab_test_master_IPAmt">
<span<?php echo $lab_test_master_delete->IPAmt->viewAttributes() ?>><?php echo $lab_test_master_delete->IPAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->InsAmt->Visible) { // InsAmt ?>
		<td <?php echo $lab_test_master_delete->InsAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_InsAmt" class="lab_test_master_InsAmt">
<span<?php echo $lab_test_master_delete->InsAmt->viewAttributes() ?>><?php echo $lab_test_master_delete->InsAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->ManualCD->Visible) { // ManualCD ?>
		<td <?php echo $lab_test_master_delete->ManualCD->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_ManualCD" class="lab_test_master_ManualCD">
<span<?php echo $lab_test_master_delete->ManualCD->viewAttributes() ?>><?php echo $lab_test_master_delete->ManualCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Free->Visible) { // Free ?>
		<td <?php echo $lab_test_master_delete->Free->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Free" class="lab_test_master_Free">
<span<?php echo $lab_test_master_delete->Free->viewAttributes() ?>><?php echo $lab_test_master_delete->Free->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->AutoAuth->Visible) { // AutoAuth ?>
		<td <?php echo $lab_test_master_delete->AutoAuth->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_AutoAuth" class="lab_test_master_AutoAuth">
<span<?php echo $lab_test_master_delete->AutoAuth->viewAttributes() ?>><?php echo $lab_test_master_delete->AutoAuth->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->ProductCD->Visible) { // ProductCD ?>
		<td <?php echo $lab_test_master_delete->ProductCD->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_ProductCD" class="lab_test_master_ProductCD">
<span<?php echo $lab_test_master_delete->ProductCD->viewAttributes() ?>><?php echo $lab_test_master_delete->ProductCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Inventory->Visible) { // Inventory ?>
		<td <?php echo $lab_test_master_delete->Inventory->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Inventory" class="lab_test_master_Inventory">
<span<?php echo $lab_test_master_delete->Inventory->viewAttributes() ?>><?php echo $lab_test_master_delete->Inventory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->IntimateTest->Visible) { // IntimateTest ?>
		<td <?php echo $lab_test_master_delete->IntimateTest->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_IntimateTest" class="lab_test_master_IntimateTest">
<span<?php echo $lab_test_master_delete->IntimateTest->viewAttributes() ?>><?php echo $lab_test_master_delete->IntimateTest->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_test_master_delete->Manual->Visible) { // Manual ?>
		<td <?php echo $lab_test_master_delete->Manual->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_delete->RowCount ?>_lab_test_master_Manual" class="lab_test_master_Manual">
<span<?php echo $lab_test_master_delete->Manual->viewAttributes() ?>><?php echo $lab_test_master_delete->Manual->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lab_test_master_delete->Recordset->moveNext();
}
$lab_test_master_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_test_master_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lab_test_master_delete->showPageFooter();
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
$lab_test_master_delete->terminate();
?>