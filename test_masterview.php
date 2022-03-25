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
$test_master_view = new test_master_view();

// Run the page
$test_master_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$test_master_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$test_master->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ftest_masterview = currentForm = new ew.Form("ftest_masterview", "view");

// Form_CustomValidate event
ftest_masterview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftest_masterview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$test_master->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $test_master_view->ExportOptions->render("body") ?>
<?php $test_master_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $test_master_view->showPageHeader(); ?>
<?php
$test_master_view->showMessage();
?>
<form name="ftest_masterview" id="ftest_masterview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($test_master_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $test_master_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="test_master">
<input type="hidden" name="modal" value="<?php echo (int)$test_master_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($test_master->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_id"><?php echo $test_master->id->caption() ?></span></td>
		<td data-name="id"<?php echo $test_master->id->cellAttributes() ?>>
<span id="el_test_master_id">
<span<?php echo $test_master->id->viewAttributes() ?>>
<?php echo $test_master->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->MainDeptCd->Visible) { // MainDeptCd ?>
	<tr id="r_MainDeptCd">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_MainDeptCd"><?php echo $test_master->MainDeptCd->caption() ?></span></td>
		<td data-name="MainDeptCd"<?php echo $test_master->MainDeptCd->cellAttributes() ?>>
<span id="el_test_master_MainDeptCd">
<span<?php echo $test_master->MainDeptCd->viewAttributes() ?>>
<?php echo $test_master->MainDeptCd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->DeptCd->Visible) { // DeptCd ?>
	<tr id="r_DeptCd">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_DeptCd"><?php echo $test_master->DeptCd->caption() ?></span></td>
		<td data-name="DeptCd"<?php echo $test_master->DeptCd->cellAttributes() ?>>
<span id="el_test_master_DeptCd">
<span<?php echo $test_master->DeptCd->viewAttributes() ?>>
<?php echo $test_master->DeptCd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->TestCd->Visible) { // TestCd ?>
	<tr id="r_TestCd">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_TestCd"><?php echo $test_master->TestCd->caption() ?></span></td>
		<td data-name="TestCd"<?php echo $test_master->TestCd->cellAttributes() ?>>
<span id="el_test_master_TestCd">
<span<?php echo $test_master->TestCd->viewAttributes() ?>>
<?php echo $test_master->TestCd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->TestSubCd->Visible) { // TestSubCd ?>
	<tr id="r_TestSubCd">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_TestSubCd"><?php echo $test_master->TestSubCd->caption() ?></span></td>
		<td data-name="TestSubCd"<?php echo $test_master->TestSubCd->cellAttributes() ?>>
<span id="el_test_master_TestSubCd">
<span<?php echo $test_master->TestSubCd->viewAttributes() ?>>
<?php echo $test_master->TestSubCd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->TestName->Visible) { // TestName ?>
	<tr id="r_TestName">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_TestName"><?php echo $test_master->TestName->caption() ?></span></td>
		<td data-name="TestName"<?php echo $test_master->TestName->cellAttributes() ?>>
<span id="el_test_master_TestName">
<span<?php echo $test_master->TestName->viewAttributes() ?>>
<?php echo $test_master->TestName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->XrayPart->Visible) { // XrayPart ?>
	<tr id="r_XrayPart">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_XrayPart"><?php echo $test_master->XrayPart->caption() ?></span></td>
		<td data-name="XrayPart"<?php echo $test_master->XrayPart->cellAttributes() ?>>
<span id="el_test_master_XrayPart">
<span<?php echo $test_master->XrayPart->viewAttributes() ?>>
<?php echo $test_master->XrayPart->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Method->Visible) { // Method ?>
	<tr id="r_Method">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Method"><?php echo $test_master->Method->caption() ?></span></td>
		<td data-name="Method"<?php echo $test_master->Method->cellAttributes() ?>>
<span id="el_test_master_Method">
<span<?php echo $test_master->Method->viewAttributes() ?>>
<?php echo $test_master->Method->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Order->Visible) { // Order ?>
	<tr id="r_Order">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Order"><?php echo $test_master->Order->caption() ?></span></td>
		<td data-name="Order"<?php echo $test_master->Order->cellAttributes() ?>>
<span id="el_test_master_Order">
<span<?php echo $test_master->Order->viewAttributes() ?>>
<?php echo $test_master->Order->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Form->Visible) { // Form ?>
	<tr id="r_Form">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Form"><?php echo $test_master->Form->caption() ?></span></td>
		<td data-name="Form"<?php echo $test_master->Form->cellAttributes() ?>>
<span id="el_test_master_Form">
<span<?php echo $test_master->Form->viewAttributes() ?>>
<?php echo $test_master->Form->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Amt->Visible) { // Amt ?>
	<tr id="r_Amt">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Amt"><?php echo $test_master->Amt->caption() ?></span></td>
		<td data-name="Amt"<?php echo $test_master->Amt->cellAttributes() ?>>
<span id="el_test_master_Amt">
<span<?php echo $test_master->Amt->viewAttributes() ?>>
<?php echo $test_master->Amt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->SplAmt->Visible) { // SplAmt ?>
	<tr id="r_SplAmt">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_SplAmt"><?php echo $test_master->SplAmt->caption() ?></span></td>
		<td data-name="SplAmt"<?php echo $test_master->SplAmt->cellAttributes() ?>>
<span id="el_test_master_SplAmt">
<span<?php echo $test_master->SplAmt->viewAttributes() ?>>
<?php echo $test_master->SplAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->ResType->Visible) { // ResType ?>
	<tr id="r_ResType">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_ResType"><?php echo $test_master->ResType->caption() ?></span></td>
		<td data-name="ResType"<?php echo $test_master->ResType->cellAttributes() ?>>
<span id="el_test_master_ResType">
<span<?php echo $test_master->ResType->viewAttributes() ?>>
<?php echo $test_master->ResType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->UnitCD->Visible) { // UnitCD ?>
	<tr id="r_UnitCD">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_UnitCD"><?php echo $test_master->UnitCD->caption() ?></span></td>
		<td data-name="UnitCD"<?php echo $test_master->UnitCD->cellAttributes() ?>>
<span id="el_test_master_UnitCD">
<span<?php echo $test_master->UnitCD->viewAttributes() ?>>
<?php echo $test_master->UnitCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->RefValue->Visible) { // RefValue ?>
	<tr id="r_RefValue">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_RefValue"><?php echo $test_master->RefValue->caption() ?></span></td>
		<td data-name="RefValue"<?php echo $test_master->RefValue->cellAttributes() ?>>
<span id="el_test_master_RefValue">
<span<?php echo $test_master->RefValue->viewAttributes() ?>>
<?php echo $test_master->RefValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Sample->Visible) { // Sample ?>
	<tr id="r_Sample">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Sample"><?php echo $test_master->Sample->caption() ?></span></td>
		<td data-name="Sample"<?php echo $test_master->Sample->cellAttributes() ?>>
<span id="el_test_master_Sample">
<span<?php echo $test_master->Sample->viewAttributes() ?>>
<?php echo $test_master->Sample->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->NoD->Visible) { // NoD ?>
	<tr id="r_NoD">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_NoD"><?php echo $test_master->NoD->caption() ?></span></td>
		<td data-name="NoD"<?php echo $test_master->NoD->cellAttributes() ?>>
<span id="el_test_master_NoD">
<span<?php echo $test_master->NoD->viewAttributes() ?>>
<?php echo $test_master->NoD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->BillOrder->Visible) { // BillOrder ?>
	<tr id="r_BillOrder">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_BillOrder"><?php echo $test_master->BillOrder->caption() ?></span></td>
		<td data-name="BillOrder"<?php echo $test_master->BillOrder->cellAttributes() ?>>
<span id="el_test_master_BillOrder">
<span<?php echo $test_master->BillOrder->viewAttributes() ?>>
<?php echo $test_master->BillOrder->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Formula->Visible) { // Formula ?>
	<tr id="r_Formula">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Formula"><?php echo $test_master->Formula->caption() ?></span></td>
		<td data-name="Formula"<?php echo $test_master->Formula->cellAttributes() ?>>
<span id="el_test_master_Formula">
<span<?php echo $test_master->Formula->viewAttributes() ?>>
<?php echo $test_master->Formula->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Inactive->Visible) { // Inactive ?>
	<tr id="r_Inactive">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Inactive"><?php echo $test_master->Inactive->caption() ?></span></td>
		<td data-name="Inactive"<?php echo $test_master->Inactive->cellAttributes() ?>>
<span id="el_test_master_Inactive">
<span<?php echo $test_master->Inactive->viewAttributes() ?>>
<?php echo $test_master->Inactive->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->ReagentAmt->Visible) { // ReagentAmt ?>
	<tr id="r_ReagentAmt">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_ReagentAmt"><?php echo $test_master->ReagentAmt->caption() ?></span></td>
		<td data-name="ReagentAmt"<?php echo $test_master->ReagentAmt->cellAttributes() ?>>
<span id="el_test_master_ReagentAmt">
<span<?php echo $test_master->ReagentAmt->viewAttributes() ?>>
<?php echo $test_master->ReagentAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->LabAmt->Visible) { // LabAmt ?>
	<tr id="r_LabAmt">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_LabAmt"><?php echo $test_master->LabAmt->caption() ?></span></td>
		<td data-name="LabAmt"<?php echo $test_master->LabAmt->cellAttributes() ?>>
<span id="el_test_master_LabAmt">
<span<?php echo $test_master->LabAmt->viewAttributes() ?>>
<?php echo $test_master->LabAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->RefAmt->Visible) { // RefAmt ?>
	<tr id="r_RefAmt">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_RefAmt"><?php echo $test_master->RefAmt->caption() ?></span></td>
		<td data-name="RefAmt"<?php echo $test_master->RefAmt->cellAttributes() ?>>
<span id="el_test_master_RefAmt">
<span<?php echo $test_master->RefAmt->viewAttributes() ?>>
<?php echo $test_master->RefAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->CreFrom->Visible) { // CreFrom ?>
	<tr id="r_CreFrom">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_CreFrom"><?php echo $test_master->CreFrom->caption() ?></span></td>
		<td data-name="CreFrom"<?php echo $test_master->CreFrom->cellAttributes() ?>>
<span id="el_test_master_CreFrom">
<span<?php echo $test_master->CreFrom->viewAttributes() ?>>
<?php echo $test_master->CreFrom->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->CreTo->Visible) { // CreTo ?>
	<tr id="r_CreTo">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_CreTo"><?php echo $test_master->CreTo->caption() ?></span></td>
		<td data-name="CreTo"<?php echo $test_master->CreTo->cellAttributes() ?>>
<span id="el_test_master_CreTo">
<span<?php echo $test_master->CreTo->viewAttributes() ?>>
<?php echo $test_master->CreTo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Note->Visible) { // Note ?>
	<tr id="r_Note">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Note"><?php echo $test_master->Note->caption() ?></span></td>
		<td data-name="Note"<?php echo $test_master->Note->cellAttributes() ?>>
<span id="el_test_master_Note">
<span<?php echo $test_master->Note->viewAttributes() ?>>
<?php echo $test_master->Note->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Sun->Visible) { // Sun ?>
	<tr id="r_Sun">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Sun"><?php echo $test_master->Sun->caption() ?></span></td>
		<td data-name="Sun"<?php echo $test_master->Sun->cellAttributes() ?>>
<span id="el_test_master_Sun">
<span<?php echo $test_master->Sun->viewAttributes() ?>>
<?php echo $test_master->Sun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Mon->Visible) { // Mon ?>
	<tr id="r_Mon">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Mon"><?php echo $test_master->Mon->caption() ?></span></td>
		<td data-name="Mon"<?php echo $test_master->Mon->cellAttributes() ?>>
<span id="el_test_master_Mon">
<span<?php echo $test_master->Mon->viewAttributes() ?>>
<?php echo $test_master->Mon->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Tue->Visible) { // Tue ?>
	<tr id="r_Tue">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Tue"><?php echo $test_master->Tue->caption() ?></span></td>
		<td data-name="Tue"<?php echo $test_master->Tue->cellAttributes() ?>>
<span id="el_test_master_Tue">
<span<?php echo $test_master->Tue->viewAttributes() ?>>
<?php echo $test_master->Tue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Wed->Visible) { // Wed ?>
	<tr id="r_Wed">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Wed"><?php echo $test_master->Wed->caption() ?></span></td>
		<td data-name="Wed"<?php echo $test_master->Wed->cellAttributes() ?>>
<span id="el_test_master_Wed">
<span<?php echo $test_master->Wed->viewAttributes() ?>>
<?php echo $test_master->Wed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Thi->Visible) { // Thi ?>
	<tr id="r_Thi">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Thi"><?php echo $test_master->Thi->caption() ?></span></td>
		<td data-name="Thi"<?php echo $test_master->Thi->cellAttributes() ?>>
<span id="el_test_master_Thi">
<span<?php echo $test_master->Thi->viewAttributes() ?>>
<?php echo $test_master->Thi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Fri->Visible) { // Fri ?>
	<tr id="r_Fri">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Fri"><?php echo $test_master->Fri->caption() ?></span></td>
		<td data-name="Fri"<?php echo $test_master->Fri->cellAttributes() ?>>
<span id="el_test_master_Fri">
<span<?php echo $test_master->Fri->viewAttributes() ?>>
<?php echo $test_master->Fri->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Sat->Visible) { // Sat ?>
	<tr id="r_Sat">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Sat"><?php echo $test_master->Sat->caption() ?></span></td>
		<td data-name="Sat"<?php echo $test_master->Sat->cellAttributes() ?>>
<span id="el_test_master_Sat">
<span<?php echo $test_master->Sat->viewAttributes() ?>>
<?php echo $test_master->Sat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Days->Visible) { // Days ?>
	<tr id="r_Days">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Days"><?php echo $test_master->Days->caption() ?></span></td>
		<td data-name="Days"<?php echo $test_master->Days->cellAttributes() ?>>
<span id="el_test_master_Days">
<span<?php echo $test_master->Days->viewAttributes() ?>>
<?php echo $test_master->Days->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Cutoff->Visible) { // Cutoff ?>
	<tr id="r_Cutoff">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Cutoff"><?php echo $test_master->Cutoff->caption() ?></span></td>
		<td data-name="Cutoff"<?php echo $test_master->Cutoff->cellAttributes() ?>>
<span id="el_test_master_Cutoff">
<span<?php echo $test_master->Cutoff->viewAttributes() ?>>
<?php echo $test_master->Cutoff->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->FontBold->Visible) { // FontBold ?>
	<tr id="r_FontBold">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_FontBold"><?php echo $test_master->FontBold->caption() ?></span></td>
		<td data-name="FontBold"<?php echo $test_master->FontBold->cellAttributes() ?>>
<span id="el_test_master_FontBold">
<span<?php echo $test_master->FontBold->viewAttributes() ?>>
<?php echo $test_master->FontBold->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->TestHeading->Visible) { // TestHeading ?>
	<tr id="r_TestHeading">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_TestHeading"><?php echo $test_master->TestHeading->caption() ?></span></td>
		<td data-name="TestHeading"<?php echo $test_master->TestHeading->cellAttributes() ?>>
<span id="el_test_master_TestHeading">
<span<?php echo $test_master->TestHeading->viewAttributes() ?>>
<?php echo $test_master->TestHeading->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Outsource->Visible) { // Outsource ?>
	<tr id="r_Outsource">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Outsource"><?php echo $test_master->Outsource->caption() ?></span></td>
		<td data-name="Outsource"<?php echo $test_master->Outsource->cellAttributes() ?>>
<span id="el_test_master_Outsource">
<span<?php echo $test_master->Outsource->viewAttributes() ?>>
<?php echo $test_master->Outsource->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->NoResult->Visible) { // NoResult ?>
	<tr id="r_NoResult">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_NoResult"><?php echo $test_master->NoResult->caption() ?></span></td>
		<td data-name="NoResult"<?php echo $test_master->NoResult->cellAttributes() ?>>
<span id="el_test_master_NoResult">
<span<?php echo $test_master->NoResult->viewAttributes() ?>>
<?php echo $test_master->NoResult->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->GraphLow->Visible) { // GraphLow ?>
	<tr id="r_GraphLow">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_GraphLow"><?php echo $test_master->GraphLow->caption() ?></span></td>
		<td data-name="GraphLow"<?php echo $test_master->GraphLow->cellAttributes() ?>>
<span id="el_test_master_GraphLow">
<span<?php echo $test_master->GraphLow->viewAttributes() ?>>
<?php echo $test_master->GraphLow->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->GraphHigh->Visible) { // GraphHigh ?>
	<tr id="r_GraphHigh">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_GraphHigh"><?php echo $test_master->GraphHigh->caption() ?></span></td>
		<td data-name="GraphHigh"<?php echo $test_master->GraphHigh->cellAttributes() ?>>
<span id="el_test_master_GraphHigh">
<span<?php echo $test_master->GraphHigh->viewAttributes() ?>>
<?php echo $test_master->GraphHigh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->CollSample->Visible) { // CollSample ?>
	<tr id="r_CollSample">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_CollSample"><?php echo $test_master->CollSample->caption() ?></span></td>
		<td data-name="CollSample"<?php echo $test_master->CollSample->cellAttributes() ?>>
<span id="el_test_master_CollSample">
<span<?php echo $test_master->CollSample->viewAttributes() ?>>
<?php echo $test_master->CollSample->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->ProcessTime->Visible) { // ProcessTime ?>
	<tr id="r_ProcessTime">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_ProcessTime"><?php echo $test_master->ProcessTime->caption() ?></span></td>
		<td data-name="ProcessTime"<?php echo $test_master->ProcessTime->cellAttributes() ?>>
<span id="el_test_master_ProcessTime">
<span<?php echo $test_master->ProcessTime->viewAttributes() ?>>
<?php echo $test_master->ProcessTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->TamilName->Visible) { // TamilName ?>
	<tr id="r_TamilName">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_TamilName"><?php echo $test_master->TamilName->caption() ?></span></td>
		<td data-name="TamilName"<?php echo $test_master->TamilName->cellAttributes() ?>>
<span id="el_test_master_TamilName">
<span<?php echo $test_master->TamilName->viewAttributes() ?>>
<?php echo $test_master->TamilName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->ShortName->Visible) { // ShortName ?>
	<tr id="r_ShortName">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_ShortName"><?php echo $test_master->ShortName->caption() ?></span></td>
		<td data-name="ShortName"<?php echo $test_master->ShortName->cellAttributes() ?>>
<span id="el_test_master_ShortName">
<span<?php echo $test_master->ShortName->viewAttributes() ?>>
<?php echo $test_master->ShortName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Individual->Visible) { // Individual ?>
	<tr id="r_Individual">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Individual"><?php echo $test_master->Individual->caption() ?></span></td>
		<td data-name="Individual"<?php echo $test_master->Individual->cellAttributes() ?>>
<span id="el_test_master_Individual">
<span<?php echo $test_master->Individual->viewAttributes() ?>>
<?php echo $test_master->Individual->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->PrevAmt->Visible) { // PrevAmt ?>
	<tr id="r_PrevAmt">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_PrevAmt"><?php echo $test_master->PrevAmt->caption() ?></span></td>
		<td data-name="PrevAmt"<?php echo $test_master->PrevAmt->cellAttributes() ?>>
<span id="el_test_master_PrevAmt">
<span<?php echo $test_master->PrevAmt->viewAttributes() ?>>
<?php echo $test_master->PrevAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->PrevSplAmt->Visible) { // PrevSplAmt ?>
	<tr id="r_PrevSplAmt">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_PrevSplAmt"><?php echo $test_master->PrevSplAmt->caption() ?></span></td>
		<td data-name="PrevSplAmt"<?php echo $test_master->PrevSplAmt->cellAttributes() ?>>
<span id="el_test_master_PrevSplAmt">
<span<?php echo $test_master->PrevSplAmt->viewAttributes() ?>>
<?php echo $test_master->PrevSplAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Remarks"><?php echo $test_master->Remarks->caption() ?></span></td>
		<td data-name="Remarks"<?php echo $test_master->Remarks->cellAttributes() ?>>
<span id="el_test_master_Remarks">
<span<?php echo $test_master->Remarks->viewAttributes() ?>>
<?php echo $test_master->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->EditDate->Visible) { // EditDate ?>
	<tr id="r_EditDate">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_EditDate"><?php echo $test_master->EditDate->caption() ?></span></td>
		<td data-name="EditDate"<?php echo $test_master->EditDate->cellAttributes() ?>>
<span id="el_test_master_EditDate">
<span<?php echo $test_master->EditDate->viewAttributes() ?>>
<?php echo $test_master->EditDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->BillName->Visible) { // BillName ?>
	<tr id="r_BillName">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_BillName"><?php echo $test_master->BillName->caption() ?></span></td>
		<td data-name="BillName"<?php echo $test_master->BillName->cellAttributes() ?>>
<span id="el_test_master_BillName">
<span<?php echo $test_master->BillName->viewAttributes() ?>>
<?php echo $test_master->BillName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->ActualAmt->Visible) { // ActualAmt ?>
	<tr id="r_ActualAmt">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_ActualAmt"><?php echo $test_master->ActualAmt->caption() ?></span></td>
		<td data-name="ActualAmt"<?php echo $test_master->ActualAmt->cellAttributes() ?>>
<span id="el_test_master_ActualAmt">
<span<?php echo $test_master->ActualAmt->viewAttributes() ?>>
<?php echo $test_master->ActualAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->HISCD->Visible) { // HISCD ?>
	<tr id="r_HISCD">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_HISCD"><?php echo $test_master->HISCD->caption() ?></span></td>
		<td data-name="HISCD"<?php echo $test_master->HISCD->cellAttributes() ?>>
<span id="el_test_master_HISCD">
<span<?php echo $test_master->HISCD->viewAttributes() ?>>
<?php echo $test_master->HISCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->PriceList->Visible) { // PriceList ?>
	<tr id="r_PriceList">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_PriceList"><?php echo $test_master->PriceList->caption() ?></span></td>
		<td data-name="PriceList"<?php echo $test_master->PriceList->cellAttributes() ?>>
<span id="el_test_master_PriceList">
<span<?php echo $test_master->PriceList->viewAttributes() ?>>
<?php echo $test_master->PriceList->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->IPAmt->Visible) { // IPAmt ?>
	<tr id="r_IPAmt">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_IPAmt"><?php echo $test_master->IPAmt->caption() ?></span></td>
		<td data-name="IPAmt"<?php echo $test_master->IPAmt->cellAttributes() ?>>
<span id="el_test_master_IPAmt">
<span<?php echo $test_master->IPAmt->viewAttributes() ?>>
<?php echo $test_master->IPAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->InsAmt->Visible) { // InsAmt ?>
	<tr id="r_InsAmt">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_InsAmt"><?php echo $test_master->InsAmt->caption() ?></span></td>
		<td data-name="InsAmt"<?php echo $test_master->InsAmt->cellAttributes() ?>>
<span id="el_test_master_InsAmt">
<span<?php echo $test_master->InsAmt->viewAttributes() ?>>
<?php echo $test_master->InsAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->ManualCD->Visible) { // ManualCD ?>
	<tr id="r_ManualCD">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_ManualCD"><?php echo $test_master->ManualCD->caption() ?></span></td>
		<td data-name="ManualCD"<?php echo $test_master->ManualCD->cellAttributes() ?>>
<span id="el_test_master_ManualCD">
<span<?php echo $test_master->ManualCD->viewAttributes() ?>>
<?php echo $test_master->ManualCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Free->Visible) { // Free ?>
	<tr id="r_Free">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Free"><?php echo $test_master->Free->caption() ?></span></td>
		<td data-name="Free"<?php echo $test_master->Free->cellAttributes() ?>>
<span id="el_test_master_Free">
<span<?php echo $test_master->Free->viewAttributes() ?>>
<?php echo $test_master->Free->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->AutoAuth->Visible) { // AutoAuth ?>
	<tr id="r_AutoAuth">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_AutoAuth"><?php echo $test_master->AutoAuth->caption() ?></span></td>
		<td data-name="AutoAuth"<?php echo $test_master->AutoAuth->cellAttributes() ?>>
<span id="el_test_master_AutoAuth">
<span<?php echo $test_master->AutoAuth->viewAttributes() ?>>
<?php echo $test_master->AutoAuth->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->ProductCD->Visible) { // ProductCD ?>
	<tr id="r_ProductCD">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_ProductCD"><?php echo $test_master->ProductCD->caption() ?></span></td>
		<td data-name="ProductCD"<?php echo $test_master->ProductCD->cellAttributes() ?>>
<span id="el_test_master_ProductCD">
<span<?php echo $test_master->ProductCD->viewAttributes() ?>>
<?php echo $test_master->ProductCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Inventory->Visible) { // Inventory ?>
	<tr id="r_Inventory">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Inventory"><?php echo $test_master->Inventory->caption() ?></span></td>
		<td data-name="Inventory"<?php echo $test_master->Inventory->cellAttributes() ?>>
<span id="el_test_master_Inventory">
<span<?php echo $test_master->Inventory->viewAttributes() ?>>
<?php echo $test_master->Inventory->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->IntimateTest->Visible) { // IntimateTest ?>
	<tr id="r_IntimateTest">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_IntimateTest"><?php echo $test_master->IntimateTest->caption() ?></span></td>
		<td data-name="IntimateTest"<?php echo $test_master->IntimateTest->cellAttributes() ?>>
<span id="el_test_master_IntimateTest">
<span<?php echo $test_master->IntimateTest->viewAttributes() ?>>
<?php echo $test_master->IntimateTest->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($test_master->Manual->Visible) { // Manual ?>
	<tr id="r_Manual">
		<td class="<?php echo $test_master_view->TableLeftColumnClass ?>"><span id="elh_test_master_Manual"><?php echo $test_master->Manual->caption() ?></span></td>
		<td data-name="Manual"<?php echo $test_master->Manual->cellAttributes() ?>>
<span id="el_test_master_Manual">
<span<?php echo $test_master->Manual->viewAttributes() ?>>
<?php echo $test_master->Manual->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$test_master_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$test_master->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$test_master_view->terminate();
?>