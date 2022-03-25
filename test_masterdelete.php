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
$test_master_delete = new test_master_delete();

// Run the page
$test_master_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$test_master_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ftest_masterdelete = currentForm = new ew.Form("ftest_masterdelete", "delete");

// Form_CustomValidate event
ftest_masterdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftest_masterdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $test_master_delete->showPageHeader(); ?>
<?php
$test_master_delete->showMessage();
?>
<form name="ftest_masterdelete" id="ftest_masterdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($test_master_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $test_master_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="test_master">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($test_master_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($test_master->id->Visible) { // id ?>
		<th class="<?php echo $test_master->id->headerCellClass() ?>"><span id="elh_test_master_id" class="test_master_id"><?php echo $test_master->id->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->MainDeptCd->Visible) { // MainDeptCd ?>
		<th class="<?php echo $test_master->MainDeptCd->headerCellClass() ?>"><span id="elh_test_master_MainDeptCd" class="test_master_MainDeptCd"><?php echo $test_master->MainDeptCd->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->DeptCd->Visible) { // DeptCd ?>
		<th class="<?php echo $test_master->DeptCd->headerCellClass() ?>"><span id="elh_test_master_DeptCd" class="test_master_DeptCd"><?php echo $test_master->DeptCd->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->TestCd->Visible) { // TestCd ?>
		<th class="<?php echo $test_master->TestCd->headerCellClass() ?>"><span id="elh_test_master_TestCd" class="test_master_TestCd"><?php echo $test_master->TestCd->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->TestSubCd->Visible) { // TestSubCd ?>
		<th class="<?php echo $test_master->TestSubCd->headerCellClass() ?>"><span id="elh_test_master_TestSubCd" class="test_master_TestSubCd"><?php echo $test_master->TestSubCd->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->TestName->Visible) { // TestName ?>
		<th class="<?php echo $test_master->TestName->headerCellClass() ?>"><span id="elh_test_master_TestName" class="test_master_TestName"><?php echo $test_master->TestName->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->XrayPart->Visible) { // XrayPart ?>
		<th class="<?php echo $test_master->XrayPart->headerCellClass() ?>"><span id="elh_test_master_XrayPart" class="test_master_XrayPart"><?php echo $test_master->XrayPart->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Method->Visible) { // Method ?>
		<th class="<?php echo $test_master->Method->headerCellClass() ?>"><span id="elh_test_master_Method" class="test_master_Method"><?php echo $test_master->Method->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Order->Visible) { // Order ?>
		<th class="<?php echo $test_master->Order->headerCellClass() ?>"><span id="elh_test_master_Order" class="test_master_Order"><?php echo $test_master->Order->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Form->Visible) { // Form ?>
		<th class="<?php echo $test_master->Form->headerCellClass() ?>"><span id="elh_test_master_Form" class="test_master_Form"><?php echo $test_master->Form->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Amt->Visible) { // Amt ?>
		<th class="<?php echo $test_master->Amt->headerCellClass() ?>"><span id="elh_test_master_Amt" class="test_master_Amt"><?php echo $test_master->Amt->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->SplAmt->Visible) { // SplAmt ?>
		<th class="<?php echo $test_master->SplAmt->headerCellClass() ?>"><span id="elh_test_master_SplAmt" class="test_master_SplAmt"><?php echo $test_master->SplAmt->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->ResType->Visible) { // ResType ?>
		<th class="<?php echo $test_master->ResType->headerCellClass() ?>"><span id="elh_test_master_ResType" class="test_master_ResType"><?php echo $test_master->ResType->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->UnitCD->Visible) { // UnitCD ?>
		<th class="<?php echo $test_master->UnitCD->headerCellClass() ?>"><span id="elh_test_master_UnitCD" class="test_master_UnitCD"><?php echo $test_master->UnitCD->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Sample->Visible) { // Sample ?>
		<th class="<?php echo $test_master->Sample->headerCellClass() ?>"><span id="elh_test_master_Sample" class="test_master_Sample"><?php echo $test_master->Sample->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->NoD->Visible) { // NoD ?>
		<th class="<?php echo $test_master->NoD->headerCellClass() ?>"><span id="elh_test_master_NoD" class="test_master_NoD"><?php echo $test_master->NoD->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->BillOrder->Visible) { // BillOrder ?>
		<th class="<?php echo $test_master->BillOrder->headerCellClass() ?>"><span id="elh_test_master_BillOrder" class="test_master_BillOrder"><?php echo $test_master->BillOrder->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Inactive->Visible) { // Inactive ?>
		<th class="<?php echo $test_master->Inactive->headerCellClass() ?>"><span id="elh_test_master_Inactive" class="test_master_Inactive"><?php echo $test_master->Inactive->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->ReagentAmt->Visible) { // ReagentAmt ?>
		<th class="<?php echo $test_master->ReagentAmt->headerCellClass() ?>"><span id="elh_test_master_ReagentAmt" class="test_master_ReagentAmt"><?php echo $test_master->ReagentAmt->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->LabAmt->Visible) { // LabAmt ?>
		<th class="<?php echo $test_master->LabAmt->headerCellClass() ?>"><span id="elh_test_master_LabAmt" class="test_master_LabAmt"><?php echo $test_master->LabAmt->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->RefAmt->Visible) { // RefAmt ?>
		<th class="<?php echo $test_master->RefAmt->headerCellClass() ?>"><span id="elh_test_master_RefAmt" class="test_master_RefAmt"><?php echo $test_master->RefAmt->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->CreFrom->Visible) { // CreFrom ?>
		<th class="<?php echo $test_master->CreFrom->headerCellClass() ?>"><span id="elh_test_master_CreFrom" class="test_master_CreFrom"><?php echo $test_master->CreFrom->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->CreTo->Visible) { // CreTo ?>
		<th class="<?php echo $test_master->CreTo->headerCellClass() ?>"><span id="elh_test_master_CreTo" class="test_master_CreTo"><?php echo $test_master->CreTo->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Sun->Visible) { // Sun ?>
		<th class="<?php echo $test_master->Sun->headerCellClass() ?>"><span id="elh_test_master_Sun" class="test_master_Sun"><?php echo $test_master->Sun->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Mon->Visible) { // Mon ?>
		<th class="<?php echo $test_master->Mon->headerCellClass() ?>"><span id="elh_test_master_Mon" class="test_master_Mon"><?php echo $test_master->Mon->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Tue->Visible) { // Tue ?>
		<th class="<?php echo $test_master->Tue->headerCellClass() ?>"><span id="elh_test_master_Tue" class="test_master_Tue"><?php echo $test_master->Tue->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Wed->Visible) { // Wed ?>
		<th class="<?php echo $test_master->Wed->headerCellClass() ?>"><span id="elh_test_master_Wed" class="test_master_Wed"><?php echo $test_master->Wed->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Thi->Visible) { // Thi ?>
		<th class="<?php echo $test_master->Thi->headerCellClass() ?>"><span id="elh_test_master_Thi" class="test_master_Thi"><?php echo $test_master->Thi->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Fri->Visible) { // Fri ?>
		<th class="<?php echo $test_master->Fri->headerCellClass() ?>"><span id="elh_test_master_Fri" class="test_master_Fri"><?php echo $test_master->Fri->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Sat->Visible) { // Sat ?>
		<th class="<?php echo $test_master->Sat->headerCellClass() ?>"><span id="elh_test_master_Sat" class="test_master_Sat"><?php echo $test_master->Sat->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Days->Visible) { // Days ?>
		<th class="<?php echo $test_master->Days->headerCellClass() ?>"><span id="elh_test_master_Days" class="test_master_Days"><?php echo $test_master->Days->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Cutoff->Visible) { // Cutoff ?>
		<th class="<?php echo $test_master->Cutoff->headerCellClass() ?>"><span id="elh_test_master_Cutoff" class="test_master_Cutoff"><?php echo $test_master->Cutoff->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->FontBold->Visible) { // FontBold ?>
		<th class="<?php echo $test_master->FontBold->headerCellClass() ?>"><span id="elh_test_master_FontBold" class="test_master_FontBold"><?php echo $test_master->FontBold->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->TestHeading->Visible) { // TestHeading ?>
		<th class="<?php echo $test_master->TestHeading->headerCellClass() ?>"><span id="elh_test_master_TestHeading" class="test_master_TestHeading"><?php echo $test_master->TestHeading->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Outsource->Visible) { // Outsource ?>
		<th class="<?php echo $test_master->Outsource->headerCellClass() ?>"><span id="elh_test_master_Outsource" class="test_master_Outsource"><?php echo $test_master->Outsource->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->NoResult->Visible) { // NoResult ?>
		<th class="<?php echo $test_master->NoResult->headerCellClass() ?>"><span id="elh_test_master_NoResult" class="test_master_NoResult"><?php echo $test_master->NoResult->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->GraphLow->Visible) { // GraphLow ?>
		<th class="<?php echo $test_master->GraphLow->headerCellClass() ?>"><span id="elh_test_master_GraphLow" class="test_master_GraphLow"><?php echo $test_master->GraphLow->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->GraphHigh->Visible) { // GraphHigh ?>
		<th class="<?php echo $test_master->GraphHigh->headerCellClass() ?>"><span id="elh_test_master_GraphHigh" class="test_master_GraphHigh"><?php echo $test_master->GraphHigh->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->CollSample->Visible) { // CollSample ?>
		<th class="<?php echo $test_master->CollSample->headerCellClass() ?>"><span id="elh_test_master_CollSample" class="test_master_CollSample"><?php echo $test_master->CollSample->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->ProcessTime->Visible) { // ProcessTime ?>
		<th class="<?php echo $test_master->ProcessTime->headerCellClass() ?>"><span id="elh_test_master_ProcessTime" class="test_master_ProcessTime"><?php echo $test_master->ProcessTime->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->TamilName->Visible) { // TamilName ?>
		<th class="<?php echo $test_master->TamilName->headerCellClass() ?>"><span id="elh_test_master_TamilName" class="test_master_TamilName"><?php echo $test_master->TamilName->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->ShortName->Visible) { // ShortName ?>
		<th class="<?php echo $test_master->ShortName->headerCellClass() ?>"><span id="elh_test_master_ShortName" class="test_master_ShortName"><?php echo $test_master->ShortName->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Individual->Visible) { // Individual ?>
		<th class="<?php echo $test_master->Individual->headerCellClass() ?>"><span id="elh_test_master_Individual" class="test_master_Individual"><?php echo $test_master->Individual->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->PrevAmt->Visible) { // PrevAmt ?>
		<th class="<?php echo $test_master->PrevAmt->headerCellClass() ?>"><span id="elh_test_master_PrevAmt" class="test_master_PrevAmt"><?php echo $test_master->PrevAmt->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->PrevSplAmt->Visible) { // PrevSplAmt ?>
		<th class="<?php echo $test_master->PrevSplAmt->headerCellClass() ?>"><span id="elh_test_master_PrevSplAmt" class="test_master_PrevSplAmt"><?php echo $test_master->PrevSplAmt->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->EditDate->Visible) { // EditDate ?>
		<th class="<?php echo $test_master->EditDate->headerCellClass() ?>"><span id="elh_test_master_EditDate" class="test_master_EditDate"><?php echo $test_master->EditDate->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->BillName->Visible) { // BillName ?>
		<th class="<?php echo $test_master->BillName->headerCellClass() ?>"><span id="elh_test_master_BillName" class="test_master_BillName"><?php echo $test_master->BillName->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->ActualAmt->Visible) { // ActualAmt ?>
		<th class="<?php echo $test_master->ActualAmt->headerCellClass() ?>"><span id="elh_test_master_ActualAmt" class="test_master_ActualAmt"><?php echo $test_master->ActualAmt->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->HISCD->Visible) { // HISCD ?>
		<th class="<?php echo $test_master->HISCD->headerCellClass() ?>"><span id="elh_test_master_HISCD" class="test_master_HISCD"><?php echo $test_master->HISCD->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->PriceList->Visible) { // PriceList ?>
		<th class="<?php echo $test_master->PriceList->headerCellClass() ?>"><span id="elh_test_master_PriceList" class="test_master_PriceList"><?php echo $test_master->PriceList->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->IPAmt->Visible) { // IPAmt ?>
		<th class="<?php echo $test_master->IPAmt->headerCellClass() ?>"><span id="elh_test_master_IPAmt" class="test_master_IPAmt"><?php echo $test_master->IPAmt->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->InsAmt->Visible) { // InsAmt ?>
		<th class="<?php echo $test_master->InsAmt->headerCellClass() ?>"><span id="elh_test_master_InsAmt" class="test_master_InsAmt"><?php echo $test_master->InsAmt->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->ManualCD->Visible) { // ManualCD ?>
		<th class="<?php echo $test_master->ManualCD->headerCellClass() ?>"><span id="elh_test_master_ManualCD" class="test_master_ManualCD"><?php echo $test_master->ManualCD->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Free->Visible) { // Free ?>
		<th class="<?php echo $test_master->Free->headerCellClass() ?>"><span id="elh_test_master_Free" class="test_master_Free"><?php echo $test_master->Free->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->AutoAuth->Visible) { // AutoAuth ?>
		<th class="<?php echo $test_master->AutoAuth->headerCellClass() ?>"><span id="elh_test_master_AutoAuth" class="test_master_AutoAuth"><?php echo $test_master->AutoAuth->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->ProductCD->Visible) { // ProductCD ?>
		<th class="<?php echo $test_master->ProductCD->headerCellClass() ?>"><span id="elh_test_master_ProductCD" class="test_master_ProductCD"><?php echo $test_master->ProductCD->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Inventory->Visible) { // Inventory ?>
		<th class="<?php echo $test_master->Inventory->headerCellClass() ?>"><span id="elh_test_master_Inventory" class="test_master_Inventory"><?php echo $test_master->Inventory->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->IntimateTest->Visible) { // IntimateTest ?>
		<th class="<?php echo $test_master->IntimateTest->headerCellClass() ?>"><span id="elh_test_master_IntimateTest" class="test_master_IntimateTest"><?php echo $test_master->IntimateTest->caption() ?></span></th>
<?php } ?>
<?php if ($test_master->Manual->Visible) { // Manual ?>
		<th class="<?php echo $test_master->Manual->headerCellClass() ?>"><span id="elh_test_master_Manual" class="test_master_Manual"><?php echo $test_master->Manual->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$test_master_delete->RecCnt = 0;
$i = 0;
while (!$test_master_delete->Recordset->EOF) {
	$test_master_delete->RecCnt++;
	$test_master_delete->RowCnt++;

	// Set row properties
	$test_master->resetAttributes();
	$test_master->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$test_master_delete->loadRowValues($test_master_delete->Recordset);

	// Render row
	$test_master_delete->renderRow();
?>
	<tr<?php echo $test_master->rowAttributes() ?>>
<?php if ($test_master->id->Visible) { // id ?>
		<td<?php echo $test_master->id->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_id" class="test_master_id">
<span<?php echo $test_master->id->viewAttributes() ?>>
<?php echo $test_master->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->MainDeptCd->Visible) { // MainDeptCd ?>
		<td<?php echo $test_master->MainDeptCd->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_MainDeptCd" class="test_master_MainDeptCd">
<span<?php echo $test_master->MainDeptCd->viewAttributes() ?>>
<?php echo $test_master->MainDeptCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->DeptCd->Visible) { // DeptCd ?>
		<td<?php echo $test_master->DeptCd->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_DeptCd" class="test_master_DeptCd">
<span<?php echo $test_master->DeptCd->viewAttributes() ?>>
<?php echo $test_master->DeptCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->TestCd->Visible) { // TestCd ?>
		<td<?php echo $test_master->TestCd->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_TestCd" class="test_master_TestCd">
<span<?php echo $test_master->TestCd->viewAttributes() ?>>
<?php echo $test_master->TestCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->TestSubCd->Visible) { // TestSubCd ?>
		<td<?php echo $test_master->TestSubCd->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_TestSubCd" class="test_master_TestSubCd">
<span<?php echo $test_master->TestSubCd->viewAttributes() ?>>
<?php echo $test_master->TestSubCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->TestName->Visible) { // TestName ?>
		<td<?php echo $test_master->TestName->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_TestName" class="test_master_TestName">
<span<?php echo $test_master->TestName->viewAttributes() ?>>
<?php echo $test_master->TestName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->XrayPart->Visible) { // XrayPart ?>
		<td<?php echo $test_master->XrayPart->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_XrayPart" class="test_master_XrayPart">
<span<?php echo $test_master->XrayPart->viewAttributes() ?>>
<?php echo $test_master->XrayPart->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Method->Visible) { // Method ?>
		<td<?php echo $test_master->Method->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Method" class="test_master_Method">
<span<?php echo $test_master->Method->viewAttributes() ?>>
<?php echo $test_master->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Order->Visible) { // Order ?>
		<td<?php echo $test_master->Order->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Order" class="test_master_Order">
<span<?php echo $test_master->Order->viewAttributes() ?>>
<?php echo $test_master->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Form->Visible) { // Form ?>
		<td<?php echo $test_master->Form->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Form" class="test_master_Form">
<span<?php echo $test_master->Form->viewAttributes() ?>>
<?php echo $test_master->Form->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Amt->Visible) { // Amt ?>
		<td<?php echo $test_master->Amt->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Amt" class="test_master_Amt">
<span<?php echo $test_master->Amt->viewAttributes() ?>>
<?php echo $test_master->Amt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->SplAmt->Visible) { // SplAmt ?>
		<td<?php echo $test_master->SplAmt->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_SplAmt" class="test_master_SplAmt">
<span<?php echo $test_master->SplAmt->viewAttributes() ?>>
<?php echo $test_master->SplAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->ResType->Visible) { // ResType ?>
		<td<?php echo $test_master->ResType->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_ResType" class="test_master_ResType">
<span<?php echo $test_master->ResType->viewAttributes() ?>>
<?php echo $test_master->ResType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->UnitCD->Visible) { // UnitCD ?>
		<td<?php echo $test_master->UnitCD->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_UnitCD" class="test_master_UnitCD">
<span<?php echo $test_master->UnitCD->viewAttributes() ?>>
<?php echo $test_master->UnitCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Sample->Visible) { // Sample ?>
		<td<?php echo $test_master->Sample->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Sample" class="test_master_Sample">
<span<?php echo $test_master->Sample->viewAttributes() ?>>
<?php echo $test_master->Sample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->NoD->Visible) { // NoD ?>
		<td<?php echo $test_master->NoD->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_NoD" class="test_master_NoD">
<span<?php echo $test_master->NoD->viewAttributes() ?>>
<?php echo $test_master->NoD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->BillOrder->Visible) { // BillOrder ?>
		<td<?php echo $test_master->BillOrder->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_BillOrder" class="test_master_BillOrder">
<span<?php echo $test_master->BillOrder->viewAttributes() ?>>
<?php echo $test_master->BillOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Inactive->Visible) { // Inactive ?>
		<td<?php echo $test_master->Inactive->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Inactive" class="test_master_Inactive">
<span<?php echo $test_master->Inactive->viewAttributes() ?>>
<?php echo $test_master->Inactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->ReagentAmt->Visible) { // ReagentAmt ?>
		<td<?php echo $test_master->ReagentAmt->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_ReagentAmt" class="test_master_ReagentAmt">
<span<?php echo $test_master->ReagentAmt->viewAttributes() ?>>
<?php echo $test_master->ReagentAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->LabAmt->Visible) { // LabAmt ?>
		<td<?php echo $test_master->LabAmt->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_LabAmt" class="test_master_LabAmt">
<span<?php echo $test_master->LabAmt->viewAttributes() ?>>
<?php echo $test_master->LabAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->RefAmt->Visible) { // RefAmt ?>
		<td<?php echo $test_master->RefAmt->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_RefAmt" class="test_master_RefAmt">
<span<?php echo $test_master->RefAmt->viewAttributes() ?>>
<?php echo $test_master->RefAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->CreFrom->Visible) { // CreFrom ?>
		<td<?php echo $test_master->CreFrom->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_CreFrom" class="test_master_CreFrom">
<span<?php echo $test_master->CreFrom->viewAttributes() ?>>
<?php echo $test_master->CreFrom->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->CreTo->Visible) { // CreTo ?>
		<td<?php echo $test_master->CreTo->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_CreTo" class="test_master_CreTo">
<span<?php echo $test_master->CreTo->viewAttributes() ?>>
<?php echo $test_master->CreTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Sun->Visible) { // Sun ?>
		<td<?php echo $test_master->Sun->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Sun" class="test_master_Sun">
<span<?php echo $test_master->Sun->viewAttributes() ?>>
<?php echo $test_master->Sun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Mon->Visible) { // Mon ?>
		<td<?php echo $test_master->Mon->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Mon" class="test_master_Mon">
<span<?php echo $test_master->Mon->viewAttributes() ?>>
<?php echo $test_master->Mon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Tue->Visible) { // Tue ?>
		<td<?php echo $test_master->Tue->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Tue" class="test_master_Tue">
<span<?php echo $test_master->Tue->viewAttributes() ?>>
<?php echo $test_master->Tue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Wed->Visible) { // Wed ?>
		<td<?php echo $test_master->Wed->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Wed" class="test_master_Wed">
<span<?php echo $test_master->Wed->viewAttributes() ?>>
<?php echo $test_master->Wed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Thi->Visible) { // Thi ?>
		<td<?php echo $test_master->Thi->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Thi" class="test_master_Thi">
<span<?php echo $test_master->Thi->viewAttributes() ?>>
<?php echo $test_master->Thi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Fri->Visible) { // Fri ?>
		<td<?php echo $test_master->Fri->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Fri" class="test_master_Fri">
<span<?php echo $test_master->Fri->viewAttributes() ?>>
<?php echo $test_master->Fri->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Sat->Visible) { // Sat ?>
		<td<?php echo $test_master->Sat->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Sat" class="test_master_Sat">
<span<?php echo $test_master->Sat->viewAttributes() ?>>
<?php echo $test_master->Sat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Days->Visible) { // Days ?>
		<td<?php echo $test_master->Days->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Days" class="test_master_Days">
<span<?php echo $test_master->Days->viewAttributes() ?>>
<?php echo $test_master->Days->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Cutoff->Visible) { // Cutoff ?>
		<td<?php echo $test_master->Cutoff->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Cutoff" class="test_master_Cutoff">
<span<?php echo $test_master->Cutoff->viewAttributes() ?>>
<?php echo $test_master->Cutoff->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->FontBold->Visible) { // FontBold ?>
		<td<?php echo $test_master->FontBold->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_FontBold" class="test_master_FontBold">
<span<?php echo $test_master->FontBold->viewAttributes() ?>>
<?php echo $test_master->FontBold->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->TestHeading->Visible) { // TestHeading ?>
		<td<?php echo $test_master->TestHeading->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_TestHeading" class="test_master_TestHeading">
<span<?php echo $test_master->TestHeading->viewAttributes() ?>>
<?php echo $test_master->TestHeading->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Outsource->Visible) { // Outsource ?>
		<td<?php echo $test_master->Outsource->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Outsource" class="test_master_Outsource">
<span<?php echo $test_master->Outsource->viewAttributes() ?>>
<?php echo $test_master->Outsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->NoResult->Visible) { // NoResult ?>
		<td<?php echo $test_master->NoResult->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_NoResult" class="test_master_NoResult">
<span<?php echo $test_master->NoResult->viewAttributes() ?>>
<?php echo $test_master->NoResult->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->GraphLow->Visible) { // GraphLow ?>
		<td<?php echo $test_master->GraphLow->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_GraphLow" class="test_master_GraphLow">
<span<?php echo $test_master->GraphLow->viewAttributes() ?>>
<?php echo $test_master->GraphLow->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->GraphHigh->Visible) { // GraphHigh ?>
		<td<?php echo $test_master->GraphHigh->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_GraphHigh" class="test_master_GraphHigh">
<span<?php echo $test_master->GraphHigh->viewAttributes() ?>>
<?php echo $test_master->GraphHigh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->CollSample->Visible) { // CollSample ?>
		<td<?php echo $test_master->CollSample->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_CollSample" class="test_master_CollSample">
<span<?php echo $test_master->CollSample->viewAttributes() ?>>
<?php echo $test_master->CollSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->ProcessTime->Visible) { // ProcessTime ?>
		<td<?php echo $test_master->ProcessTime->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_ProcessTime" class="test_master_ProcessTime">
<span<?php echo $test_master->ProcessTime->viewAttributes() ?>>
<?php echo $test_master->ProcessTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->TamilName->Visible) { // TamilName ?>
		<td<?php echo $test_master->TamilName->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_TamilName" class="test_master_TamilName">
<span<?php echo $test_master->TamilName->viewAttributes() ?>>
<?php echo $test_master->TamilName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->ShortName->Visible) { // ShortName ?>
		<td<?php echo $test_master->ShortName->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_ShortName" class="test_master_ShortName">
<span<?php echo $test_master->ShortName->viewAttributes() ?>>
<?php echo $test_master->ShortName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Individual->Visible) { // Individual ?>
		<td<?php echo $test_master->Individual->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Individual" class="test_master_Individual">
<span<?php echo $test_master->Individual->viewAttributes() ?>>
<?php echo $test_master->Individual->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->PrevAmt->Visible) { // PrevAmt ?>
		<td<?php echo $test_master->PrevAmt->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_PrevAmt" class="test_master_PrevAmt">
<span<?php echo $test_master->PrevAmt->viewAttributes() ?>>
<?php echo $test_master->PrevAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->PrevSplAmt->Visible) { // PrevSplAmt ?>
		<td<?php echo $test_master->PrevSplAmt->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_PrevSplAmt" class="test_master_PrevSplAmt">
<span<?php echo $test_master->PrevSplAmt->viewAttributes() ?>>
<?php echo $test_master->PrevSplAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->EditDate->Visible) { // EditDate ?>
		<td<?php echo $test_master->EditDate->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_EditDate" class="test_master_EditDate">
<span<?php echo $test_master->EditDate->viewAttributes() ?>>
<?php echo $test_master->EditDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->BillName->Visible) { // BillName ?>
		<td<?php echo $test_master->BillName->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_BillName" class="test_master_BillName">
<span<?php echo $test_master->BillName->viewAttributes() ?>>
<?php echo $test_master->BillName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->ActualAmt->Visible) { // ActualAmt ?>
		<td<?php echo $test_master->ActualAmt->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_ActualAmt" class="test_master_ActualAmt">
<span<?php echo $test_master->ActualAmt->viewAttributes() ?>>
<?php echo $test_master->ActualAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->HISCD->Visible) { // HISCD ?>
		<td<?php echo $test_master->HISCD->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_HISCD" class="test_master_HISCD">
<span<?php echo $test_master->HISCD->viewAttributes() ?>>
<?php echo $test_master->HISCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->PriceList->Visible) { // PriceList ?>
		<td<?php echo $test_master->PriceList->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_PriceList" class="test_master_PriceList">
<span<?php echo $test_master->PriceList->viewAttributes() ?>>
<?php echo $test_master->PriceList->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->IPAmt->Visible) { // IPAmt ?>
		<td<?php echo $test_master->IPAmt->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_IPAmt" class="test_master_IPAmt">
<span<?php echo $test_master->IPAmt->viewAttributes() ?>>
<?php echo $test_master->IPAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->InsAmt->Visible) { // InsAmt ?>
		<td<?php echo $test_master->InsAmt->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_InsAmt" class="test_master_InsAmt">
<span<?php echo $test_master->InsAmt->viewAttributes() ?>>
<?php echo $test_master->InsAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->ManualCD->Visible) { // ManualCD ?>
		<td<?php echo $test_master->ManualCD->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_ManualCD" class="test_master_ManualCD">
<span<?php echo $test_master->ManualCD->viewAttributes() ?>>
<?php echo $test_master->ManualCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Free->Visible) { // Free ?>
		<td<?php echo $test_master->Free->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Free" class="test_master_Free">
<span<?php echo $test_master->Free->viewAttributes() ?>>
<?php echo $test_master->Free->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->AutoAuth->Visible) { // AutoAuth ?>
		<td<?php echo $test_master->AutoAuth->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_AutoAuth" class="test_master_AutoAuth">
<span<?php echo $test_master->AutoAuth->viewAttributes() ?>>
<?php echo $test_master->AutoAuth->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->ProductCD->Visible) { // ProductCD ?>
		<td<?php echo $test_master->ProductCD->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_ProductCD" class="test_master_ProductCD">
<span<?php echo $test_master->ProductCD->viewAttributes() ?>>
<?php echo $test_master->ProductCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Inventory->Visible) { // Inventory ?>
		<td<?php echo $test_master->Inventory->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Inventory" class="test_master_Inventory">
<span<?php echo $test_master->Inventory->viewAttributes() ?>>
<?php echo $test_master->Inventory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->IntimateTest->Visible) { // IntimateTest ?>
		<td<?php echo $test_master->IntimateTest->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_IntimateTest" class="test_master_IntimateTest">
<span<?php echo $test_master->IntimateTest->viewAttributes() ?>>
<?php echo $test_master->IntimateTest->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($test_master->Manual->Visible) { // Manual ?>
		<td<?php echo $test_master->Manual->cellAttributes() ?>>
<span id="el<?php echo $test_master_delete->RowCnt ?>_test_master_Manual" class="test_master_Manual">
<span<?php echo $test_master->Manual->viewAttributes() ?>>
<?php echo $test_master->Manual->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$test_master_delete->Recordset->moveNext();
}
$test_master_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $test_master_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$test_master_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$test_master_delete->terminate();
?>