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
$pharmacy_billing_return_delete = new pharmacy_billing_return_delete();

// Run the page
$pharmacy_billing_return_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_return_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_billing_returndelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpharmacy_billing_returndelete = currentForm = new ew.Form("fpharmacy_billing_returndelete", "delete");
	loadjs.done("fpharmacy_billing_returndelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_billing_return_delete->showPageHeader(); ?>
<?php
$pharmacy_billing_return_delete->showMessage();
?>
<form name="fpharmacy_billing_returndelete" id="fpharmacy_billing_returndelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_return">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_billing_return_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_billing_return_delete->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_billing_return_delete->id->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_id" class="pharmacy_billing_return_id"><?php echo $pharmacy_billing_return_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $pharmacy_billing_return_delete->PatientId->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_PatientId" class="pharmacy_billing_return_PatientId"><?php echo $pharmacy_billing_return_delete->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $pharmacy_billing_return_delete->mrnno->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_mrnno" class="pharmacy_billing_return_mrnno"><?php echo $pharmacy_billing_return_delete->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $pharmacy_billing_return_delete->PatientName->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_PatientName" class="pharmacy_billing_return_PatientName"><?php echo $pharmacy_billing_return_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->Mobile->Visible) { // Mobile ?>
		<th class="<?php echo $pharmacy_billing_return_delete->Mobile->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_Mobile" class="pharmacy_billing_return_Mobile"><?php echo $pharmacy_billing_return_delete->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->IP_OP->Visible) { // IP_OP ?>
		<th class="<?php echo $pharmacy_billing_return_delete->IP_OP->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_IP_OP" class="pharmacy_billing_return_IP_OP"><?php echo $pharmacy_billing_return_delete->IP_OP->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->Doctor->Visible) { // Doctor ?>
		<th class="<?php echo $pharmacy_billing_return_delete->Doctor->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_Doctor" class="pharmacy_billing_return_Doctor"><?php echo $pharmacy_billing_return_delete->Doctor->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->voucher_type->Visible) { // voucher_type ?>
		<th class="<?php echo $pharmacy_billing_return_delete->voucher_type->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_voucher_type" class="pharmacy_billing_return_voucher_type"><?php echo $pharmacy_billing_return_delete->voucher_type->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $pharmacy_billing_return_delete->ModeofPayment->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_ModeofPayment" class="pharmacy_billing_return_ModeofPayment"><?php echo $pharmacy_billing_return_delete->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->Amount->Visible) { // Amount ?>
		<th class="<?php echo $pharmacy_billing_return_delete->Amount->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_Amount" class="pharmacy_billing_return_Amount"><?php echo $pharmacy_billing_return_delete->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->AnyDues->Visible) { // AnyDues ?>
		<th class="<?php echo $pharmacy_billing_return_delete->AnyDues->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_AnyDues" class="pharmacy_billing_return_AnyDues"><?php echo $pharmacy_billing_return_delete->AnyDues->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $pharmacy_billing_return_delete->createdby->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_createdby" class="pharmacy_billing_return_createdby"><?php echo $pharmacy_billing_return_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $pharmacy_billing_return_delete->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_createddatetime" class="pharmacy_billing_return_createddatetime"><?php echo $pharmacy_billing_return_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $pharmacy_billing_return_delete->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_modifiedby" class="pharmacy_billing_return_modifiedby"><?php echo $pharmacy_billing_return_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $pharmacy_billing_return_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_modifieddatetime" class="pharmacy_billing_return_modifieddatetime"><?php echo $pharmacy_billing_return_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->RealizationAmount->Visible) { // RealizationAmount ?>
		<th class="<?php echo $pharmacy_billing_return_delete->RealizationAmount->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_RealizationAmount" class="pharmacy_billing_return_RealizationAmount"><?php echo $pharmacy_billing_return_delete->RealizationAmount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->CId->Visible) { // CId ?>
		<th class="<?php echo $pharmacy_billing_return_delete->CId->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_CId" class="pharmacy_billing_return_CId"><?php echo $pharmacy_billing_return_delete->CId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $pharmacy_billing_return_delete->PartnerName->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_PartnerName" class="pharmacy_billing_return_PartnerName"><?php echo $pharmacy_billing_return_delete->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->BillNumber->Visible) { // BillNumber ?>
		<th class="<?php echo $pharmacy_billing_return_delete->BillNumber->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_BillNumber" class="pharmacy_billing_return_BillNumber"><?php echo $pharmacy_billing_return_delete->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->CardNumber->Visible) { // CardNumber ?>
		<th class="<?php echo $pharmacy_billing_return_delete->CardNumber->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_CardNumber" class="pharmacy_billing_return_CardNumber"><?php echo $pharmacy_billing_return_delete->CardNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->BillStatus->Visible) { // BillStatus ?>
		<th class="<?php echo $pharmacy_billing_return_delete->BillStatus->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_BillStatus" class="pharmacy_billing_return_BillStatus"><?php echo $pharmacy_billing_return_delete->BillStatus->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->ReportHeader->Visible) { // ReportHeader ?>
		<th class="<?php echo $pharmacy_billing_return_delete->ReportHeader->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_ReportHeader" class="pharmacy_billing_return_ReportHeader"><?php echo $pharmacy_billing_return_delete->ReportHeader->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->PharID->Visible) { // PharID ?>
		<th class="<?php echo $pharmacy_billing_return_delete->PharID->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_PharID" class="pharmacy_billing_return_PharID"><?php echo $pharmacy_billing_return_delete->PharID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_billing_return_delete->RecordCount = 0;
$i = 0;
while (!$pharmacy_billing_return_delete->Recordset->EOF) {
	$pharmacy_billing_return_delete->RecordCount++;
	$pharmacy_billing_return_delete->RowCount++;

	// Set row properties
	$pharmacy_billing_return->resetAttributes();
	$pharmacy_billing_return->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_billing_return_delete->loadRowValues($pharmacy_billing_return_delete->Recordset);

	// Render row
	$pharmacy_billing_return_delete->renderRow();
?>
	<tr <?php echo $pharmacy_billing_return->rowAttributes() ?>>
<?php if ($pharmacy_billing_return_delete->id->Visible) { // id ?>
		<td <?php echo $pharmacy_billing_return_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_id" class="pharmacy_billing_return_id">
<span<?php echo $pharmacy_billing_return_delete->id->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->PatientId->Visible) { // PatientId ?>
		<td <?php echo $pharmacy_billing_return_delete->PatientId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_PatientId" class="pharmacy_billing_return_PatientId">
<span<?php echo $pharmacy_billing_return_delete->PatientId->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->mrnno->Visible) { // mrnno ?>
		<td <?php echo $pharmacy_billing_return_delete->mrnno->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_mrnno" class="pharmacy_billing_return_mrnno">
<span<?php echo $pharmacy_billing_return_delete->mrnno->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $pharmacy_billing_return_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_PatientName" class="pharmacy_billing_return_PatientName">
<span<?php echo $pharmacy_billing_return_delete->PatientName->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->Mobile->Visible) { // Mobile ?>
		<td <?php echo $pharmacy_billing_return_delete->Mobile->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_Mobile" class="pharmacy_billing_return_Mobile">
<span<?php echo $pharmacy_billing_return_delete->Mobile->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->IP_OP->Visible) { // IP_OP ?>
		<td <?php echo $pharmacy_billing_return_delete->IP_OP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_IP_OP" class="pharmacy_billing_return_IP_OP">
<span<?php echo $pharmacy_billing_return_delete->IP_OP->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->IP_OP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->Doctor->Visible) { // Doctor ?>
		<td <?php echo $pharmacy_billing_return_delete->Doctor->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_Doctor" class="pharmacy_billing_return_Doctor">
<span<?php echo $pharmacy_billing_return_delete->Doctor->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->voucher_type->Visible) { // voucher_type ?>
		<td <?php echo $pharmacy_billing_return_delete->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_voucher_type" class="pharmacy_billing_return_voucher_type">
<span<?php echo $pharmacy_billing_return_delete->voucher_type->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->voucher_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->ModeofPayment->Visible) { // ModeofPayment ?>
		<td <?php echo $pharmacy_billing_return_delete->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_ModeofPayment" class="pharmacy_billing_return_ModeofPayment">
<span<?php echo $pharmacy_billing_return_delete->ModeofPayment->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->Amount->Visible) { // Amount ?>
		<td <?php echo $pharmacy_billing_return_delete->Amount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_Amount" class="pharmacy_billing_return_Amount">
<span<?php echo $pharmacy_billing_return_delete->Amount->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->AnyDues->Visible) { // AnyDues ?>
		<td <?php echo $pharmacy_billing_return_delete->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_AnyDues" class="pharmacy_billing_return_AnyDues">
<span<?php echo $pharmacy_billing_return_delete->AnyDues->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->AnyDues->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $pharmacy_billing_return_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_createdby" class="pharmacy_billing_return_createdby">
<span<?php echo $pharmacy_billing_return_delete->createdby->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $pharmacy_billing_return_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_createddatetime" class="pharmacy_billing_return_createddatetime">
<span<?php echo $pharmacy_billing_return_delete->createddatetime->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $pharmacy_billing_return_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_modifiedby" class="pharmacy_billing_return_modifiedby">
<span<?php echo $pharmacy_billing_return_delete->modifiedby->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $pharmacy_billing_return_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_modifieddatetime" class="pharmacy_billing_return_modifieddatetime">
<span<?php echo $pharmacy_billing_return_delete->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->RealizationAmount->Visible) { // RealizationAmount ?>
		<td <?php echo $pharmacy_billing_return_delete->RealizationAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_RealizationAmount" class="pharmacy_billing_return_RealizationAmount">
<span<?php echo $pharmacy_billing_return_delete->RealizationAmount->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->RealizationAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->CId->Visible) { // CId ?>
		<td <?php echo $pharmacy_billing_return_delete->CId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_CId" class="pharmacy_billing_return_CId">
<span<?php echo $pharmacy_billing_return_delete->CId->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->CId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->PartnerName->Visible) { // PartnerName ?>
		<td <?php echo $pharmacy_billing_return_delete->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_PartnerName" class="pharmacy_billing_return_PartnerName">
<span<?php echo $pharmacy_billing_return_delete->PartnerName->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->BillNumber->Visible) { // BillNumber ?>
		<td <?php echo $pharmacy_billing_return_delete->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_BillNumber" class="pharmacy_billing_return_BillNumber">
<span<?php echo $pharmacy_billing_return_delete->BillNumber->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->CardNumber->Visible) { // CardNumber ?>
		<td <?php echo $pharmacy_billing_return_delete->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_CardNumber" class="pharmacy_billing_return_CardNumber">
<span<?php echo $pharmacy_billing_return_delete->CardNumber->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->CardNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->BillStatus->Visible) { // BillStatus ?>
		<td <?php echo $pharmacy_billing_return_delete->BillStatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_BillStatus" class="pharmacy_billing_return_BillStatus">
<span<?php echo $pharmacy_billing_return_delete->BillStatus->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->BillStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->ReportHeader->Visible) { // ReportHeader ?>
		<td <?php echo $pharmacy_billing_return_delete->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_ReportHeader" class="pharmacy_billing_return_ReportHeader">
<span<?php echo $pharmacy_billing_return_delete->ReportHeader->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->ReportHeader->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return_delete->PharID->Visible) { // PharID ?>
		<td <?php echo $pharmacy_billing_return_delete->PharID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCount ?>_pharmacy_billing_return_PharID" class="pharmacy_billing_return_PharID">
<span<?php echo $pharmacy_billing_return_delete->PharID->viewAttributes() ?>><?php echo $pharmacy_billing_return_delete->PharID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_billing_return_delete->Recordset->moveNext();
}
$pharmacy_billing_return_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_billing_return_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_billing_return_delete->showPageFooter();
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
$pharmacy_billing_return_delete->terminate();
?>