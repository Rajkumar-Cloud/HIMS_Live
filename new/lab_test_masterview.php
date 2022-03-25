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
$lab_test_master_view = new lab_test_master_view();

// Run the page
$lab_test_master_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_test_master_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lab_test_master_view->isExport()) { ?>
<script>
var flab_test_masterview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	flab_test_masterview = currentForm = new ew.Form("flab_test_masterview", "view");
	loadjs.done("flab_test_masterview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$lab_test_master_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lab_test_master_view->ExportOptions->render("body") ?>
<?php $lab_test_master_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lab_test_master_view->showPageHeader(); ?>
<?php
$lab_test_master_view->showMessage();
?>
<form name="flab_test_masterview" id="flab_test_masterview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_test_master">
<input type="hidden" name="modal" value="<?php echo (int)$lab_test_master_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lab_test_master_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_id"><?php echo $lab_test_master_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $lab_test_master_view->id->cellAttributes() ?>>
<span id="el_lab_test_master_id">
<span<?php echo $lab_test_master_view->id->viewAttributes() ?>><?php echo $lab_test_master_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->MainDeptCd->Visible) { // MainDeptCd ?>
	<tr id="r_MainDeptCd">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_MainDeptCd"><?php echo $lab_test_master_view->MainDeptCd->caption() ?></span></td>
		<td data-name="MainDeptCd" <?php echo $lab_test_master_view->MainDeptCd->cellAttributes() ?>>
<span id="el_lab_test_master_MainDeptCd">
<span<?php echo $lab_test_master_view->MainDeptCd->viewAttributes() ?>><?php echo $lab_test_master_view->MainDeptCd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->DeptCd->Visible) { // DeptCd ?>
	<tr id="r_DeptCd">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_DeptCd"><?php echo $lab_test_master_view->DeptCd->caption() ?></span></td>
		<td data-name="DeptCd" <?php echo $lab_test_master_view->DeptCd->cellAttributes() ?>>
<span id="el_lab_test_master_DeptCd">
<span<?php echo $lab_test_master_view->DeptCd->viewAttributes() ?>><?php echo $lab_test_master_view->DeptCd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->TestCd->Visible) { // TestCd ?>
	<tr id="r_TestCd">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_TestCd"><?php echo $lab_test_master_view->TestCd->caption() ?></span></td>
		<td data-name="TestCd" <?php echo $lab_test_master_view->TestCd->cellAttributes() ?>>
<span id="el_lab_test_master_TestCd">
<span<?php echo $lab_test_master_view->TestCd->viewAttributes() ?>><?php echo $lab_test_master_view->TestCd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->TestSubCd->Visible) { // TestSubCd ?>
	<tr id="r_TestSubCd">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_TestSubCd"><?php echo $lab_test_master_view->TestSubCd->caption() ?></span></td>
		<td data-name="TestSubCd" <?php echo $lab_test_master_view->TestSubCd->cellAttributes() ?>>
<span id="el_lab_test_master_TestSubCd">
<span<?php echo $lab_test_master_view->TestSubCd->viewAttributes() ?>><?php echo $lab_test_master_view->TestSubCd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->TestName->Visible) { // TestName ?>
	<tr id="r_TestName">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_TestName"><?php echo $lab_test_master_view->TestName->caption() ?></span></td>
		<td data-name="TestName" <?php echo $lab_test_master_view->TestName->cellAttributes() ?>>
<span id="el_lab_test_master_TestName">
<span<?php echo $lab_test_master_view->TestName->viewAttributes() ?>><?php echo $lab_test_master_view->TestName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->XrayPart->Visible) { // XrayPart ?>
	<tr id="r_XrayPart">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_XrayPart"><?php echo $lab_test_master_view->XrayPart->caption() ?></span></td>
		<td data-name="XrayPart" <?php echo $lab_test_master_view->XrayPart->cellAttributes() ?>>
<span id="el_lab_test_master_XrayPart">
<span<?php echo $lab_test_master_view->XrayPart->viewAttributes() ?>><?php echo $lab_test_master_view->XrayPart->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Method->Visible) { // Method ?>
	<tr id="r_Method">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Method"><?php echo $lab_test_master_view->Method->caption() ?></span></td>
		<td data-name="Method" <?php echo $lab_test_master_view->Method->cellAttributes() ?>>
<span id="el_lab_test_master_Method">
<span<?php echo $lab_test_master_view->Method->viewAttributes() ?>><?php echo $lab_test_master_view->Method->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Order->Visible) { // Order ?>
	<tr id="r_Order">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Order"><?php echo $lab_test_master_view->Order->caption() ?></span></td>
		<td data-name="Order" <?php echo $lab_test_master_view->Order->cellAttributes() ?>>
<span id="el_lab_test_master_Order">
<span<?php echo $lab_test_master_view->Order->viewAttributes() ?>><?php echo $lab_test_master_view->Order->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Form->Visible) { // Form ?>
	<tr id="r_Form">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Form"><?php echo $lab_test_master_view->Form->caption() ?></span></td>
		<td data-name="Form" <?php echo $lab_test_master_view->Form->cellAttributes() ?>>
<span id="el_lab_test_master_Form">
<span<?php echo $lab_test_master_view->Form->viewAttributes() ?>><?php echo $lab_test_master_view->Form->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Amt->Visible) { // Amt ?>
	<tr id="r_Amt">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Amt"><?php echo $lab_test_master_view->Amt->caption() ?></span></td>
		<td data-name="Amt" <?php echo $lab_test_master_view->Amt->cellAttributes() ?>>
<span id="el_lab_test_master_Amt">
<span<?php echo $lab_test_master_view->Amt->viewAttributes() ?>><?php echo $lab_test_master_view->Amt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->SplAmt->Visible) { // SplAmt ?>
	<tr id="r_SplAmt">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_SplAmt"><?php echo $lab_test_master_view->SplAmt->caption() ?></span></td>
		<td data-name="SplAmt" <?php echo $lab_test_master_view->SplAmt->cellAttributes() ?>>
<span id="el_lab_test_master_SplAmt">
<span<?php echo $lab_test_master_view->SplAmt->viewAttributes() ?>><?php echo $lab_test_master_view->SplAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->ResType->Visible) { // ResType ?>
	<tr id="r_ResType">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_ResType"><?php echo $lab_test_master_view->ResType->caption() ?></span></td>
		<td data-name="ResType" <?php echo $lab_test_master_view->ResType->cellAttributes() ?>>
<span id="el_lab_test_master_ResType">
<span<?php echo $lab_test_master_view->ResType->viewAttributes() ?>><?php echo $lab_test_master_view->ResType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->UnitCD->Visible) { // UnitCD ?>
	<tr id="r_UnitCD">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_UnitCD"><?php echo $lab_test_master_view->UnitCD->caption() ?></span></td>
		<td data-name="UnitCD" <?php echo $lab_test_master_view->UnitCD->cellAttributes() ?>>
<span id="el_lab_test_master_UnitCD">
<span<?php echo $lab_test_master_view->UnitCD->viewAttributes() ?>><?php echo $lab_test_master_view->UnitCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->RefValue->Visible) { // RefValue ?>
	<tr id="r_RefValue">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_RefValue"><?php echo $lab_test_master_view->RefValue->caption() ?></span></td>
		<td data-name="RefValue" <?php echo $lab_test_master_view->RefValue->cellAttributes() ?>>
<span id="el_lab_test_master_RefValue">
<span<?php echo $lab_test_master_view->RefValue->viewAttributes() ?>><?php echo $lab_test_master_view->RefValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Sample->Visible) { // Sample ?>
	<tr id="r_Sample">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Sample"><?php echo $lab_test_master_view->Sample->caption() ?></span></td>
		<td data-name="Sample" <?php echo $lab_test_master_view->Sample->cellAttributes() ?>>
<span id="el_lab_test_master_Sample">
<span<?php echo $lab_test_master_view->Sample->viewAttributes() ?>><?php echo $lab_test_master_view->Sample->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->NoD->Visible) { // NoD ?>
	<tr id="r_NoD">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_NoD"><?php echo $lab_test_master_view->NoD->caption() ?></span></td>
		<td data-name="NoD" <?php echo $lab_test_master_view->NoD->cellAttributes() ?>>
<span id="el_lab_test_master_NoD">
<span<?php echo $lab_test_master_view->NoD->viewAttributes() ?>><?php echo $lab_test_master_view->NoD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->BillOrder->Visible) { // BillOrder ?>
	<tr id="r_BillOrder">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_BillOrder"><?php echo $lab_test_master_view->BillOrder->caption() ?></span></td>
		<td data-name="BillOrder" <?php echo $lab_test_master_view->BillOrder->cellAttributes() ?>>
<span id="el_lab_test_master_BillOrder">
<span<?php echo $lab_test_master_view->BillOrder->viewAttributes() ?>><?php echo $lab_test_master_view->BillOrder->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Formula->Visible) { // Formula ?>
	<tr id="r_Formula">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Formula"><?php echo $lab_test_master_view->Formula->caption() ?></span></td>
		<td data-name="Formula" <?php echo $lab_test_master_view->Formula->cellAttributes() ?>>
<span id="el_lab_test_master_Formula">
<span<?php echo $lab_test_master_view->Formula->viewAttributes() ?>><?php echo $lab_test_master_view->Formula->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Inactive->Visible) { // Inactive ?>
	<tr id="r_Inactive">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Inactive"><?php echo $lab_test_master_view->Inactive->caption() ?></span></td>
		<td data-name="Inactive" <?php echo $lab_test_master_view->Inactive->cellAttributes() ?>>
<span id="el_lab_test_master_Inactive">
<span<?php echo $lab_test_master_view->Inactive->viewAttributes() ?>><?php echo $lab_test_master_view->Inactive->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->ReagentAmt->Visible) { // ReagentAmt ?>
	<tr id="r_ReagentAmt">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_ReagentAmt"><?php echo $lab_test_master_view->ReagentAmt->caption() ?></span></td>
		<td data-name="ReagentAmt" <?php echo $lab_test_master_view->ReagentAmt->cellAttributes() ?>>
<span id="el_lab_test_master_ReagentAmt">
<span<?php echo $lab_test_master_view->ReagentAmt->viewAttributes() ?>><?php echo $lab_test_master_view->ReagentAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->LabAmt->Visible) { // LabAmt ?>
	<tr id="r_LabAmt">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_LabAmt"><?php echo $lab_test_master_view->LabAmt->caption() ?></span></td>
		<td data-name="LabAmt" <?php echo $lab_test_master_view->LabAmt->cellAttributes() ?>>
<span id="el_lab_test_master_LabAmt">
<span<?php echo $lab_test_master_view->LabAmt->viewAttributes() ?>><?php echo $lab_test_master_view->LabAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->RefAmt->Visible) { // RefAmt ?>
	<tr id="r_RefAmt">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_RefAmt"><?php echo $lab_test_master_view->RefAmt->caption() ?></span></td>
		<td data-name="RefAmt" <?php echo $lab_test_master_view->RefAmt->cellAttributes() ?>>
<span id="el_lab_test_master_RefAmt">
<span<?php echo $lab_test_master_view->RefAmt->viewAttributes() ?>><?php echo $lab_test_master_view->RefAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->CreFrom->Visible) { // CreFrom ?>
	<tr id="r_CreFrom">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_CreFrom"><?php echo $lab_test_master_view->CreFrom->caption() ?></span></td>
		<td data-name="CreFrom" <?php echo $lab_test_master_view->CreFrom->cellAttributes() ?>>
<span id="el_lab_test_master_CreFrom">
<span<?php echo $lab_test_master_view->CreFrom->viewAttributes() ?>><?php echo $lab_test_master_view->CreFrom->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->CreTo->Visible) { // CreTo ?>
	<tr id="r_CreTo">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_CreTo"><?php echo $lab_test_master_view->CreTo->caption() ?></span></td>
		<td data-name="CreTo" <?php echo $lab_test_master_view->CreTo->cellAttributes() ?>>
<span id="el_lab_test_master_CreTo">
<span<?php echo $lab_test_master_view->CreTo->viewAttributes() ?>><?php echo $lab_test_master_view->CreTo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Note->Visible) { // Note ?>
	<tr id="r_Note">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Note"><?php echo $lab_test_master_view->Note->caption() ?></span></td>
		<td data-name="Note" <?php echo $lab_test_master_view->Note->cellAttributes() ?>>
<span id="el_lab_test_master_Note">
<span<?php echo $lab_test_master_view->Note->viewAttributes() ?>><?php echo $lab_test_master_view->Note->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Sun->Visible) { // Sun ?>
	<tr id="r_Sun">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Sun"><?php echo $lab_test_master_view->Sun->caption() ?></span></td>
		<td data-name="Sun" <?php echo $lab_test_master_view->Sun->cellAttributes() ?>>
<span id="el_lab_test_master_Sun">
<span<?php echo $lab_test_master_view->Sun->viewAttributes() ?>><?php echo $lab_test_master_view->Sun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Mon->Visible) { // Mon ?>
	<tr id="r_Mon">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Mon"><?php echo $lab_test_master_view->Mon->caption() ?></span></td>
		<td data-name="Mon" <?php echo $lab_test_master_view->Mon->cellAttributes() ?>>
<span id="el_lab_test_master_Mon">
<span<?php echo $lab_test_master_view->Mon->viewAttributes() ?>><?php echo $lab_test_master_view->Mon->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Tue->Visible) { // Tue ?>
	<tr id="r_Tue">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Tue"><?php echo $lab_test_master_view->Tue->caption() ?></span></td>
		<td data-name="Tue" <?php echo $lab_test_master_view->Tue->cellAttributes() ?>>
<span id="el_lab_test_master_Tue">
<span<?php echo $lab_test_master_view->Tue->viewAttributes() ?>><?php echo $lab_test_master_view->Tue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Wed->Visible) { // Wed ?>
	<tr id="r_Wed">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Wed"><?php echo $lab_test_master_view->Wed->caption() ?></span></td>
		<td data-name="Wed" <?php echo $lab_test_master_view->Wed->cellAttributes() ?>>
<span id="el_lab_test_master_Wed">
<span<?php echo $lab_test_master_view->Wed->viewAttributes() ?>><?php echo $lab_test_master_view->Wed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Thi->Visible) { // Thi ?>
	<tr id="r_Thi">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Thi"><?php echo $lab_test_master_view->Thi->caption() ?></span></td>
		<td data-name="Thi" <?php echo $lab_test_master_view->Thi->cellAttributes() ?>>
<span id="el_lab_test_master_Thi">
<span<?php echo $lab_test_master_view->Thi->viewAttributes() ?>><?php echo $lab_test_master_view->Thi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Fri->Visible) { // Fri ?>
	<tr id="r_Fri">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Fri"><?php echo $lab_test_master_view->Fri->caption() ?></span></td>
		<td data-name="Fri" <?php echo $lab_test_master_view->Fri->cellAttributes() ?>>
<span id="el_lab_test_master_Fri">
<span<?php echo $lab_test_master_view->Fri->viewAttributes() ?>><?php echo $lab_test_master_view->Fri->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Sat->Visible) { // Sat ?>
	<tr id="r_Sat">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Sat"><?php echo $lab_test_master_view->Sat->caption() ?></span></td>
		<td data-name="Sat" <?php echo $lab_test_master_view->Sat->cellAttributes() ?>>
<span id="el_lab_test_master_Sat">
<span<?php echo $lab_test_master_view->Sat->viewAttributes() ?>><?php echo $lab_test_master_view->Sat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Days->Visible) { // Days ?>
	<tr id="r_Days">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Days"><?php echo $lab_test_master_view->Days->caption() ?></span></td>
		<td data-name="Days" <?php echo $lab_test_master_view->Days->cellAttributes() ?>>
<span id="el_lab_test_master_Days">
<span<?php echo $lab_test_master_view->Days->viewAttributes() ?>><?php echo $lab_test_master_view->Days->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Cutoff->Visible) { // Cutoff ?>
	<tr id="r_Cutoff">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Cutoff"><?php echo $lab_test_master_view->Cutoff->caption() ?></span></td>
		<td data-name="Cutoff" <?php echo $lab_test_master_view->Cutoff->cellAttributes() ?>>
<span id="el_lab_test_master_Cutoff">
<span<?php echo $lab_test_master_view->Cutoff->viewAttributes() ?>><?php echo $lab_test_master_view->Cutoff->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->FontBold->Visible) { // FontBold ?>
	<tr id="r_FontBold">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_FontBold"><?php echo $lab_test_master_view->FontBold->caption() ?></span></td>
		<td data-name="FontBold" <?php echo $lab_test_master_view->FontBold->cellAttributes() ?>>
<span id="el_lab_test_master_FontBold">
<span<?php echo $lab_test_master_view->FontBold->viewAttributes() ?>><?php echo $lab_test_master_view->FontBold->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->TestHeading->Visible) { // TestHeading ?>
	<tr id="r_TestHeading">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_TestHeading"><?php echo $lab_test_master_view->TestHeading->caption() ?></span></td>
		<td data-name="TestHeading" <?php echo $lab_test_master_view->TestHeading->cellAttributes() ?>>
<span id="el_lab_test_master_TestHeading">
<span<?php echo $lab_test_master_view->TestHeading->viewAttributes() ?>><?php echo $lab_test_master_view->TestHeading->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Outsource->Visible) { // Outsource ?>
	<tr id="r_Outsource">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Outsource"><?php echo $lab_test_master_view->Outsource->caption() ?></span></td>
		<td data-name="Outsource" <?php echo $lab_test_master_view->Outsource->cellAttributes() ?>>
<span id="el_lab_test_master_Outsource">
<span<?php echo $lab_test_master_view->Outsource->viewAttributes() ?>><?php echo $lab_test_master_view->Outsource->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->NoResult->Visible) { // NoResult ?>
	<tr id="r_NoResult">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_NoResult"><?php echo $lab_test_master_view->NoResult->caption() ?></span></td>
		<td data-name="NoResult" <?php echo $lab_test_master_view->NoResult->cellAttributes() ?>>
<span id="el_lab_test_master_NoResult">
<span<?php echo $lab_test_master_view->NoResult->viewAttributes() ?>><?php echo $lab_test_master_view->NoResult->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->GraphLow->Visible) { // GraphLow ?>
	<tr id="r_GraphLow">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_GraphLow"><?php echo $lab_test_master_view->GraphLow->caption() ?></span></td>
		<td data-name="GraphLow" <?php echo $lab_test_master_view->GraphLow->cellAttributes() ?>>
<span id="el_lab_test_master_GraphLow">
<span<?php echo $lab_test_master_view->GraphLow->viewAttributes() ?>><?php echo $lab_test_master_view->GraphLow->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->GraphHigh->Visible) { // GraphHigh ?>
	<tr id="r_GraphHigh">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_GraphHigh"><?php echo $lab_test_master_view->GraphHigh->caption() ?></span></td>
		<td data-name="GraphHigh" <?php echo $lab_test_master_view->GraphHigh->cellAttributes() ?>>
<span id="el_lab_test_master_GraphHigh">
<span<?php echo $lab_test_master_view->GraphHigh->viewAttributes() ?>><?php echo $lab_test_master_view->GraphHigh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->CollSample->Visible) { // CollSample ?>
	<tr id="r_CollSample">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_CollSample"><?php echo $lab_test_master_view->CollSample->caption() ?></span></td>
		<td data-name="CollSample" <?php echo $lab_test_master_view->CollSample->cellAttributes() ?>>
<span id="el_lab_test_master_CollSample">
<span<?php echo $lab_test_master_view->CollSample->viewAttributes() ?>><?php echo $lab_test_master_view->CollSample->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->ProcessTime->Visible) { // ProcessTime ?>
	<tr id="r_ProcessTime">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_ProcessTime"><?php echo $lab_test_master_view->ProcessTime->caption() ?></span></td>
		<td data-name="ProcessTime" <?php echo $lab_test_master_view->ProcessTime->cellAttributes() ?>>
<span id="el_lab_test_master_ProcessTime">
<span<?php echo $lab_test_master_view->ProcessTime->viewAttributes() ?>><?php echo $lab_test_master_view->ProcessTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->TamilName->Visible) { // TamilName ?>
	<tr id="r_TamilName">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_TamilName"><?php echo $lab_test_master_view->TamilName->caption() ?></span></td>
		<td data-name="TamilName" <?php echo $lab_test_master_view->TamilName->cellAttributes() ?>>
<span id="el_lab_test_master_TamilName">
<span<?php echo $lab_test_master_view->TamilName->viewAttributes() ?>><?php echo $lab_test_master_view->TamilName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->ShortName->Visible) { // ShortName ?>
	<tr id="r_ShortName">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_ShortName"><?php echo $lab_test_master_view->ShortName->caption() ?></span></td>
		<td data-name="ShortName" <?php echo $lab_test_master_view->ShortName->cellAttributes() ?>>
<span id="el_lab_test_master_ShortName">
<span<?php echo $lab_test_master_view->ShortName->viewAttributes() ?>><?php echo $lab_test_master_view->ShortName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Individual->Visible) { // Individual ?>
	<tr id="r_Individual">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Individual"><?php echo $lab_test_master_view->Individual->caption() ?></span></td>
		<td data-name="Individual" <?php echo $lab_test_master_view->Individual->cellAttributes() ?>>
<span id="el_lab_test_master_Individual">
<span<?php echo $lab_test_master_view->Individual->viewAttributes() ?>><?php echo $lab_test_master_view->Individual->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->PrevAmt->Visible) { // PrevAmt ?>
	<tr id="r_PrevAmt">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_PrevAmt"><?php echo $lab_test_master_view->PrevAmt->caption() ?></span></td>
		<td data-name="PrevAmt" <?php echo $lab_test_master_view->PrevAmt->cellAttributes() ?>>
<span id="el_lab_test_master_PrevAmt">
<span<?php echo $lab_test_master_view->PrevAmt->viewAttributes() ?>><?php echo $lab_test_master_view->PrevAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->PrevSplAmt->Visible) { // PrevSplAmt ?>
	<tr id="r_PrevSplAmt">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_PrevSplAmt"><?php echo $lab_test_master_view->PrevSplAmt->caption() ?></span></td>
		<td data-name="PrevSplAmt" <?php echo $lab_test_master_view->PrevSplAmt->cellAttributes() ?>>
<span id="el_lab_test_master_PrevSplAmt">
<span<?php echo $lab_test_master_view->PrevSplAmt->viewAttributes() ?>><?php echo $lab_test_master_view->PrevSplAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Remarks"><?php echo $lab_test_master_view->Remarks->caption() ?></span></td>
		<td data-name="Remarks" <?php echo $lab_test_master_view->Remarks->cellAttributes() ?>>
<span id="el_lab_test_master_Remarks">
<span<?php echo $lab_test_master_view->Remarks->viewAttributes() ?>><?php echo $lab_test_master_view->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->EditDate->Visible) { // EditDate ?>
	<tr id="r_EditDate">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_EditDate"><?php echo $lab_test_master_view->EditDate->caption() ?></span></td>
		<td data-name="EditDate" <?php echo $lab_test_master_view->EditDate->cellAttributes() ?>>
<span id="el_lab_test_master_EditDate">
<span<?php echo $lab_test_master_view->EditDate->viewAttributes() ?>><?php echo $lab_test_master_view->EditDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->BillName->Visible) { // BillName ?>
	<tr id="r_BillName">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_BillName"><?php echo $lab_test_master_view->BillName->caption() ?></span></td>
		<td data-name="BillName" <?php echo $lab_test_master_view->BillName->cellAttributes() ?>>
<span id="el_lab_test_master_BillName">
<span<?php echo $lab_test_master_view->BillName->viewAttributes() ?>><?php echo $lab_test_master_view->BillName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->ActualAmt->Visible) { // ActualAmt ?>
	<tr id="r_ActualAmt">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_ActualAmt"><?php echo $lab_test_master_view->ActualAmt->caption() ?></span></td>
		<td data-name="ActualAmt" <?php echo $lab_test_master_view->ActualAmt->cellAttributes() ?>>
<span id="el_lab_test_master_ActualAmt">
<span<?php echo $lab_test_master_view->ActualAmt->viewAttributes() ?>><?php echo $lab_test_master_view->ActualAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->HISCD->Visible) { // HISCD ?>
	<tr id="r_HISCD">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_HISCD"><?php echo $lab_test_master_view->HISCD->caption() ?></span></td>
		<td data-name="HISCD" <?php echo $lab_test_master_view->HISCD->cellAttributes() ?>>
<span id="el_lab_test_master_HISCD">
<span<?php echo $lab_test_master_view->HISCD->viewAttributes() ?>><?php echo $lab_test_master_view->HISCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->PriceList->Visible) { // PriceList ?>
	<tr id="r_PriceList">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_PriceList"><?php echo $lab_test_master_view->PriceList->caption() ?></span></td>
		<td data-name="PriceList" <?php echo $lab_test_master_view->PriceList->cellAttributes() ?>>
<span id="el_lab_test_master_PriceList">
<span<?php echo $lab_test_master_view->PriceList->viewAttributes() ?>><?php echo $lab_test_master_view->PriceList->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->IPAmt->Visible) { // IPAmt ?>
	<tr id="r_IPAmt">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_IPAmt"><?php echo $lab_test_master_view->IPAmt->caption() ?></span></td>
		<td data-name="IPAmt" <?php echo $lab_test_master_view->IPAmt->cellAttributes() ?>>
<span id="el_lab_test_master_IPAmt">
<span<?php echo $lab_test_master_view->IPAmt->viewAttributes() ?>><?php echo $lab_test_master_view->IPAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->InsAmt->Visible) { // InsAmt ?>
	<tr id="r_InsAmt">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_InsAmt"><?php echo $lab_test_master_view->InsAmt->caption() ?></span></td>
		<td data-name="InsAmt" <?php echo $lab_test_master_view->InsAmt->cellAttributes() ?>>
<span id="el_lab_test_master_InsAmt">
<span<?php echo $lab_test_master_view->InsAmt->viewAttributes() ?>><?php echo $lab_test_master_view->InsAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->ManualCD->Visible) { // ManualCD ?>
	<tr id="r_ManualCD">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_ManualCD"><?php echo $lab_test_master_view->ManualCD->caption() ?></span></td>
		<td data-name="ManualCD" <?php echo $lab_test_master_view->ManualCD->cellAttributes() ?>>
<span id="el_lab_test_master_ManualCD">
<span<?php echo $lab_test_master_view->ManualCD->viewAttributes() ?>><?php echo $lab_test_master_view->ManualCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Free->Visible) { // Free ?>
	<tr id="r_Free">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Free"><?php echo $lab_test_master_view->Free->caption() ?></span></td>
		<td data-name="Free" <?php echo $lab_test_master_view->Free->cellAttributes() ?>>
<span id="el_lab_test_master_Free">
<span<?php echo $lab_test_master_view->Free->viewAttributes() ?>><?php echo $lab_test_master_view->Free->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->AutoAuth->Visible) { // AutoAuth ?>
	<tr id="r_AutoAuth">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_AutoAuth"><?php echo $lab_test_master_view->AutoAuth->caption() ?></span></td>
		<td data-name="AutoAuth" <?php echo $lab_test_master_view->AutoAuth->cellAttributes() ?>>
<span id="el_lab_test_master_AutoAuth">
<span<?php echo $lab_test_master_view->AutoAuth->viewAttributes() ?>><?php echo $lab_test_master_view->AutoAuth->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->ProductCD->Visible) { // ProductCD ?>
	<tr id="r_ProductCD">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_ProductCD"><?php echo $lab_test_master_view->ProductCD->caption() ?></span></td>
		<td data-name="ProductCD" <?php echo $lab_test_master_view->ProductCD->cellAttributes() ?>>
<span id="el_lab_test_master_ProductCD">
<span<?php echo $lab_test_master_view->ProductCD->viewAttributes() ?>><?php echo $lab_test_master_view->ProductCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Inventory->Visible) { // Inventory ?>
	<tr id="r_Inventory">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Inventory"><?php echo $lab_test_master_view->Inventory->caption() ?></span></td>
		<td data-name="Inventory" <?php echo $lab_test_master_view->Inventory->cellAttributes() ?>>
<span id="el_lab_test_master_Inventory">
<span<?php echo $lab_test_master_view->Inventory->viewAttributes() ?>><?php echo $lab_test_master_view->Inventory->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->IntimateTest->Visible) { // IntimateTest ?>
	<tr id="r_IntimateTest">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_IntimateTest"><?php echo $lab_test_master_view->IntimateTest->caption() ?></span></td>
		<td data-name="IntimateTest" <?php echo $lab_test_master_view->IntimateTest->cellAttributes() ?>>
<span id="el_lab_test_master_IntimateTest">
<span<?php echo $lab_test_master_view->IntimateTest->viewAttributes() ?>><?php echo $lab_test_master_view->IntimateTest->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_test_master_view->Manual->Visible) { // Manual ?>
	<tr id="r_Manual">
		<td class="<?php echo $lab_test_master_view->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Manual"><?php echo $lab_test_master_view->Manual->caption() ?></span></td>
		<td data-name="Manual" <?php echo $lab_test_master_view->Manual->cellAttributes() ?>>
<span id="el_lab_test_master_Manual">
<span<?php echo $lab_test_master_view->Manual->viewAttributes() ?>><?php echo $lab_test_master_view->Manual->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lab_test_master_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lab_test_master_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$lab_test_master_view->terminate();
?>