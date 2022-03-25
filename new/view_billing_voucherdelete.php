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
$view_billing_voucher_delete = new view_billing_voucher_delete();

// Run the page
$view_billing_voucher_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_billing_voucher_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_billing_voucherdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fview_billing_voucherdelete = currentForm = new ew.Form("fview_billing_voucherdelete", "delete");
	loadjs.done("fview_billing_voucherdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_billing_voucher_delete->showPageHeader(); ?>
<?php
$view_billing_voucher_delete->showMessage();
?>
<form name="fview_billing_voucherdelete" id="fview_billing_voucherdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_billing_voucher_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_billing_voucher_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $view_billing_voucher_delete->createddatetime->headerCellClass() ?>"><span id="elh_view_billing_voucher_createddatetime" class="view_billing_voucher_createddatetime"><?php echo $view_billing_voucher_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_delete->BillNumber->Visible) { // BillNumber ?>
		<th class="<?php echo $view_billing_voucher_delete->BillNumber->headerCellClass() ?>"><span id="elh_view_billing_voucher_BillNumber" class="view_billing_voucher_BillNumber"><?php echo $view_billing_voucher_delete->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_delete->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $view_billing_voucher_delete->PatientId->headerCellClass() ?>"><span id="elh_view_billing_voucher_PatientId" class="view_billing_voucher_PatientId"><?php echo $view_billing_voucher_delete->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $view_billing_voucher_delete->PatientName->headerCellClass() ?>"><span id="elh_view_billing_voucher_PatientName" class="view_billing_voucher_PatientName"><?php echo $view_billing_voucher_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_delete->Mobile->Visible) { // Mobile ?>
		<th class="<?php echo $view_billing_voucher_delete->Mobile->headerCellClass() ?>"><span id="elh_view_billing_voucher_Mobile" class="view_billing_voucher_Mobile"><?php echo $view_billing_voucher_delete->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_delete->Doctor->Visible) { // Doctor ?>
		<th class="<?php echo $view_billing_voucher_delete->Doctor->headerCellClass() ?>"><span id="elh_view_billing_voucher_Doctor" class="view_billing_voucher_Doctor"><?php echo $view_billing_voucher_delete->Doctor->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_delete->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $view_billing_voucher_delete->ModeofPayment->headerCellClass() ?>"><span id="elh_view_billing_voucher_ModeofPayment" class="view_billing_voucher_ModeofPayment"><?php echo $view_billing_voucher_delete->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_delete->Amount->Visible) { // Amount ?>
		<th class="<?php echo $view_billing_voucher_delete->Amount->headerCellClass() ?>"><span id="elh_view_billing_voucher_Amount" class="view_billing_voucher_Amount"><?php echo $view_billing_voucher_delete->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_delete->BankName->Visible) { // BankName ?>
		<th class="<?php echo $view_billing_voucher_delete->BankName->headerCellClass() ?>"><span id="elh_view_billing_voucher_BankName" class="view_billing_voucher_BankName"><?php echo $view_billing_voucher_delete->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_delete->UserName->Visible) { // UserName ?>
		<th class="<?php echo $view_billing_voucher_delete->UserName->headerCellClass() ?>"><span id="elh_view_billing_voucher_UserName" class="view_billing_voucher_UserName"><?php echo $view_billing_voucher_delete->UserName->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_delete->BillType->Visible) { // BillType ?>
		<th class="<?php echo $view_billing_voucher_delete->BillType->headerCellClass() ?>"><span id="elh_view_billing_voucher_BillType" class="view_billing_voucher_BillType"><?php echo $view_billing_voucher_delete->BillType->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_delete->CancelBill->Visible) { // CancelBill ?>
		<th class="<?php echo $view_billing_voucher_delete->CancelBill->headerCellClass() ?>"><span id="elh_view_billing_voucher_CancelBill" class="view_billing_voucher_CancelBill"><?php echo $view_billing_voucher_delete->CancelBill->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_delete->LabTest->Visible) { // LabTest ?>
		<th class="<?php echo $view_billing_voucher_delete->LabTest->headerCellClass() ?>"><span id="elh_view_billing_voucher_LabTest" class="view_billing_voucher_LabTest"><?php echo $view_billing_voucher_delete->LabTest->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_delete->sid->Visible) { // sid ?>
		<th class="<?php echo $view_billing_voucher_delete->sid->headerCellClass() ?>"><span id="elh_view_billing_voucher_sid" class="view_billing_voucher_sid"><?php echo $view_billing_voucher_delete->sid->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_delete->SidNo->Visible) { // SidNo ?>
		<th class="<?php echo $view_billing_voucher_delete->SidNo->headerCellClass() ?>"><span id="elh_view_billing_voucher_SidNo" class="view_billing_voucher_SidNo"><?php echo $view_billing_voucher_delete->SidNo->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_delete->createdDatettime->Visible) { // createdDatettime ?>
		<th class="<?php echo $view_billing_voucher_delete->createdDatettime->headerCellClass() ?>"><span id="elh_view_billing_voucher_createdDatettime" class="view_billing_voucher_createdDatettime"><?php echo $view_billing_voucher_delete->createdDatettime->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_delete->GoogleReviewID->Visible) { // GoogleReviewID ?>
		<th class="<?php echo $view_billing_voucher_delete->GoogleReviewID->headerCellClass() ?>"><span id="elh_view_billing_voucher_GoogleReviewID" class="view_billing_voucher_GoogleReviewID"><?php echo $view_billing_voucher_delete->GoogleReviewID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_billing_voucher_delete->RecordCount = 0;
$i = 0;
while (!$view_billing_voucher_delete->Recordset->EOF) {
	$view_billing_voucher_delete->RecordCount++;
	$view_billing_voucher_delete->RowCount++;

	// Set row properties
	$view_billing_voucher->resetAttributes();
	$view_billing_voucher->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_billing_voucher_delete->loadRowValues($view_billing_voucher_delete->Recordset);

	// Render row
	$view_billing_voucher_delete->renderRow();
?>
	<tr <?php echo $view_billing_voucher->rowAttributes() ?>>
<?php if ($view_billing_voucher_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $view_billing_voucher_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCount ?>_view_billing_voucher_createddatetime" class="view_billing_voucher_createddatetime">
<span<?php echo $view_billing_voucher_delete->createddatetime->viewAttributes() ?>><?php echo $view_billing_voucher_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_delete->BillNumber->Visible) { // BillNumber ?>
		<td <?php echo $view_billing_voucher_delete->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCount ?>_view_billing_voucher_BillNumber" class="view_billing_voucher_BillNumber">
<span<?php echo $view_billing_voucher_delete->BillNumber->viewAttributes() ?>><?php echo $view_billing_voucher_delete->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_delete->PatientId->Visible) { // PatientId ?>
		<td <?php echo $view_billing_voucher_delete->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCount ?>_view_billing_voucher_PatientId" class="view_billing_voucher_PatientId">
<span<?php echo $view_billing_voucher_delete->PatientId->viewAttributes() ?>><?php echo $view_billing_voucher_delete->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $view_billing_voucher_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCount ?>_view_billing_voucher_PatientName" class="view_billing_voucher_PatientName">
<span<?php echo $view_billing_voucher_delete->PatientName->viewAttributes() ?>><?php echo $view_billing_voucher_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_delete->Mobile->Visible) { // Mobile ?>
		<td <?php echo $view_billing_voucher_delete->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCount ?>_view_billing_voucher_Mobile" class="view_billing_voucher_Mobile">
<span<?php echo $view_billing_voucher_delete->Mobile->viewAttributes() ?>><?php echo $view_billing_voucher_delete->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_delete->Doctor->Visible) { // Doctor ?>
		<td <?php echo $view_billing_voucher_delete->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCount ?>_view_billing_voucher_Doctor" class="view_billing_voucher_Doctor">
<span<?php echo $view_billing_voucher_delete->Doctor->viewAttributes() ?>><?php echo $view_billing_voucher_delete->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_delete->ModeofPayment->Visible) { // ModeofPayment ?>
		<td <?php echo $view_billing_voucher_delete->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCount ?>_view_billing_voucher_ModeofPayment" class="view_billing_voucher_ModeofPayment">
<span<?php echo $view_billing_voucher_delete->ModeofPayment->viewAttributes() ?>><?php echo $view_billing_voucher_delete->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_delete->Amount->Visible) { // Amount ?>
		<td <?php echo $view_billing_voucher_delete->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCount ?>_view_billing_voucher_Amount" class="view_billing_voucher_Amount">
<span<?php echo $view_billing_voucher_delete->Amount->viewAttributes() ?>><?php echo $view_billing_voucher_delete->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_delete->BankName->Visible) { // BankName ?>
		<td <?php echo $view_billing_voucher_delete->BankName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCount ?>_view_billing_voucher_BankName" class="view_billing_voucher_BankName">
<span<?php echo $view_billing_voucher_delete->BankName->viewAttributes() ?>><?php echo $view_billing_voucher_delete->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_delete->UserName->Visible) { // UserName ?>
		<td <?php echo $view_billing_voucher_delete->UserName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCount ?>_view_billing_voucher_UserName" class="view_billing_voucher_UserName">
<span<?php echo $view_billing_voucher_delete->UserName->viewAttributes() ?>><?php echo $view_billing_voucher_delete->UserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_delete->BillType->Visible) { // BillType ?>
		<td <?php echo $view_billing_voucher_delete->BillType->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCount ?>_view_billing_voucher_BillType" class="view_billing_voucher_BillType">
<span<?php echo $view_billing_voucher_delete->BillType->viewAttributes() ?>><?php echo $view_billing_voucher_delete->BillType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_delete->CancelBill->Visible) { // CancelBill ?>
		<td <?php echo $view_billing_voucher_delete->CancelBill->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCount ?>_view_billing_voucher_CancelBill" class="view_billing_voucher_CancelBill">
<span<?php echo $view_billing_voucher_delete->CancelBill->viewAttributes() ?>><?php echo $view_billing_voucher_delete->CancelBill->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_delete->LabTest->Visible) { // LabTest ?>
		<td <?php echo $view_billing_voucher_delete->LabTest->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCount ?>_view_billing_voucher_LabTest" class="view_billing_voucher_LabTest">
<span<?php echo $view_billing_voucher_delete->LabTest->viewAttributes() ?>><?php echo $view_billing_voucher_delete->LabTest->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_delete->sid->Visible) { // sid ?>
		<td <?php echo $view_billing_voucher_delete->sid->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCount ?>_view_billing_voucher_sid" class="view_billing_voucher_sid">
<span<?php echo $view_billing_voucher_delete->sid->viewAttributes() ?>><?php echo $view_billing_voucher_delete->sid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_delete->SidNo->Visible) { // SidNo ?>
		<td <?php echo $view_billing_voucher_delete->SidNo->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCount ?>_view_billing_voucher_SidNo" class="view_billing_voucher_SidNo">
<span<?php echo $view_billing_voucher_delete->SidNo->viewAttributes() ?>><?php echo $view_billing_voucher_delete->SidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_delete->createdDatettime->Visible) { // createdDatettime ?>
		<td <?php echo $view_billing_voucher_delete->createdDatettime->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCount ?>_view_billing_voucher_createdDatettime" class="view_billing_voucher_createdDatettime">
<span<?php echo $view_billing_voucher_delete->createdDatettime->viewAttributes() ?>><?php echo $view_billing_voucher_delete->createdDatettime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_delete->GoogleReviewID->Visible) { // GoogleReviewID ?>
		<td <?php echo $view_billing_voucher_delete->GoogleReviewID->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCount ?>_view_billing_voucher_GoogleReviewID" class="view_billing_voucher_GoogleReviewID">
<span<?php echo $view_billing_voucher_delete->GoogleReviewID->viewAttributes() ?>><?php echo $view_billing_voucher_delete->GoogleReviewID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_billing_voucher_delete->Recordset->moveNext();
}
$view_billing_voucher_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_billing_voucher_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_billing_voucher_delete->showPageFooter();
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
$view_billing_voucher_delete->terminate();
?>