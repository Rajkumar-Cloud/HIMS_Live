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
$pharmacy_billing_issue_delete = new pharmacy_billing_issue_delete();

// Run the page
$pharmacy_billing_issue_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_issue_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_billing_issuedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpharmacy_billing_issuedelete = currentForm = new ew.Form("fpharmacy_billing_issuedelete", "delete");
	loadjs.done("fpharmacy_billing_issuedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_billing_issue_delete->showPageHeader(); ?>
<?php
$pharmacy_billing_issue_delete->showMessage();
?>
<form name="fpharmacy_billing_issuedelete" id="fpharmacy_billing_issuedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_issue">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_billing_issue_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_billing_issue_delete->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->id->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_id" class="pharmacy_billing_issue_id"><?php echo $pharmacy_billing_issue_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->PatientId->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_PatientId" class="pharmacy_billing_issue_PatientId"><?php echo $pharmacy_billing_issue_delete->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->mrnno->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_mrnno" class="pharmacy_billing_issue_mrnno"><?php echo $pharmacy_billing_issue_delete->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->PatientName->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_PatientName" class="pharmacy_billing_issue_PatientName"><?php echo $pharmacy_billing_issue_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->Mobile->Visible) { // Mobile ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->Mobile->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_Mobile" class="pharmacy_billing_issue_Mobile"><?php echo $pharmacy_billing_issue_delete->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->IP_OP->Visible) { // IP_OP ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->IP_OP->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_IP_OP" class="pharmacy_billing_issue_IP_OP"><?php echo $pharmacy_billing_issue_delete->IP_OP->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->Doctor->Visible) { // Doctor ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->Doctor->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_Doctor" class="pharmacy_billing_issue_Doctor"><?php echo $pharmacy_billing_issue_delete->Doctor->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->voucher_type->Visible) { // voucher_type ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->voucher_type->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_voucher_type" class="pharmacy_billing_issue_voucher_type"><?php echo $pharmacy_billing_issue_delete->voucher_type->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->ModeofPayment->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_ModeofPayment" class="pharmacy_billing_issue_ModeofPayment"><?php echo $pharmacy_billing_issue_delete->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->Amount->Visible) { // Amount ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->Amount->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_Amount" class="pharmacy_billing_issue_Amount"><?php echo $pharmacy_billing_issue_delete->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->AnyDues->Visible) { // AnyDues ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->AnyDues->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_AnyDues" class="pharmacy_billing_issue_AnyDues"><?php echo $pharmacy_billing_issue_delete->AnyDues->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->createdby->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_createdby" class="pharmacy_billing_issue_createdby"><?php echo $pharmacy_billing_issue_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_createddatetime" class="pharmacy_billing_issue_createddatetime"><?php echo $pharmacy_billing_issue_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_modifiedby" class="pharmacy_billing_issue_modifiedby"><?php echo $pharmacy_billing_issue_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_modifieddatetime" class="pharmacy_billing_issue_modifieddatetime"><?php echo $pharmacy_billing_issue_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->RealizationAmount->Visible) { // RealizationAmount ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->RealizationAmount->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_RealizationAmount" class="pharmacy_billing_issue_RealizationAmount"><?php echo $pharmacy_billing_issue_delete->RealizationAmount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->CId->Visible) { // CId ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->CId->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_CId" class="pharmacy_billing_issue_CId"><?php echo $pharmacy_billing_issue_delete->CId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->PartnerName->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_PartnerName" class="pharmacy_billing_issue_PartnerName"><?php echo $pharmacy_billing_issue_delete->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->BillNumber->Visible) { // BillNumber ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->BillNumber->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_BillNumber" class="pharmacy_billing_issue_BillNumber"><?php echo $pharmacy_billing_issue_delete->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->CardNumber->Visible) { // CardNumber ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->CardNumber->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_CardNumber" class="pharmacy_billing_issue_CardNumber"><?php echo $pharmacy_billing_issue_delete->CardNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->BillStatus->Visible) { // BillStatus ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->BillStatus->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_BillStatus" class="pharmacy_billing_issue_BillStatus"><?php echo $pharmacy_billing_issue_delete->BillStatus->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->ReportHeader->Visible) { // ReportHeader ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->ReportHeader->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_ReportHeader" class="pharmacy_billing_issue_ReportHeader"><?php echo $pharmacy_billing_issue_delete->ReportHeader->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->PharID->Visible) { // PharID ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->PharID->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_PharID" class="pharmacy_billing_issue_PharID"><?php echo $pharmacy_billing_issue_delete->PharID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->UserName->Visible) { // UserName ?>
		<th class="<?php echo $pharmacy_billing_issue_delete->UserName->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_UserName" class="pharmacy_billing_issue_UserName"><?php echo $pharmacy_billing_issue_delete->UserName->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_billing_issue_delete->RecordCount = 0;
$i = 0;
while (!$pharmacy_billing_issue_delete->Recordset->EOF) {
	$pharmacy_billing_issue_delete->RecordCount++;
	$pharmacy_billing_issue_delete->RowCount++;

	// Set row properties
	$pharmacy_billing_issue->resetAttributes();
	$pharmacy_billing_issue->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_billing_issue_delete->loadRowValues($pharmacy_billing_issue_delete->Recordset);

	// Render row
	$pharmacy_billing_issue_delete->renderRow();
?>
	<tr <?php echo $pharmacy_billing_issue->rowAttributes() ?>>
<?php if ($pharmacy_billing_issue_delete->id->Visible) { // id ?>
		<td <?php echo $pharmacy_billing_issue_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_id" class="pharmacy_billing_issue_id">
<span<?php echo $pharmacy_billing_issue_delete->id->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->PatientId->Visible) { // PatientId ?>
		<td <?php echo $pharmacy_billing_issue_delete->PatientId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_PatientId" class="pharmacy_billing_issue_PatientId">
<span<?php echo $pharmacy_billing_issue_delete->PatientId->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->mrnno->Visible) { // mrnno ?>
		<td <?php echo $pharmacy_billing_issue_delete->mrnno->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_mrnno" class="pharmacy_billing_issue_mrnno">
<span<?php echo $pharmacy_billing_issue_delete->mrnno->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $pharmacy_billing_issue_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_PatientName" class="pharmacy_billing_issue_PatientName">
<span<?php echo $pharmacy_billing_issue_delete->PatientName->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->Mobile->Visible) { // Mobile ?>
		<td <?php echo $pharmacy_billing_issue_delete->Mobile->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_Mobile" class="pharmacy_billing_issue_Mobile">
<span<?php echo $pharmacy_billing_issue_delete->Mobile->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->IP_OP->Visible) { // IP_OP ?>
		<td <?php echo $pharmacy_billing_issue_delete->IP_OP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_IP_OP" class="pharmacy_billing_issue_IP_OP">
<span<?php echo $pharmacy_billing_issue_delete->IP_OP->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->IP_OP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->Doctor->Visible) { // Doctor ?>
		<td <?php echo $pharmacy_billing_issue_delete->Doctor->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_Doctor" class="pharmacy_billing_issue_Doctor">
<span<?php echo $pharmacy_billing_issue_delete->Doctor->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->voucher_type->Visible) { // voucher_type ?>
		<td <?php echo $pharmacy_billing_issue_delete->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_voucher_type" class="pharmacy_billing_issue_voucher_type">
<span<?php echo $pharmacy_billing_issue_delete->voucher_type->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->voucher_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->ModeofPayment->Visible) { // ModeofPayment ?>
		<td <?php echo $pharmacy_billing_issue_delete->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_ModeofPayment" class="pharmacy_billing_issue_ModeofPayment">
<span<?php echo $pharmacy_billing_issue_delete->ModeofPayment->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->Amount->Visible) { // Amount ?>
		<td <?php echo $pharmacy_billing_issue_delete->Amount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_Amount" class="pharmacy_billing_issue_Amount">
<span<?php echo $pharmacy_billing_issue_delete->Amount->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->AnyDues->Visible) { // AnyDues ?>
		<td <?php echo $pharmacy_billing_issue_delete->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_AnyDues" class="pharmacy_billing_issue_AnyDues">
<span<?php echo $pharmacy_billing_issue_delete->AnyDues->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->AnyDues->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $pharmacy_billing_issue_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_createdby" class="pharmacy_billing_issue_createdby">
<span<?php echo $pharmacy_billing_issue_delete->createdby->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $pharmacy_billing_issue_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_createddatetime" class="pharmacy_billing_issue_createddatetime">
<span<?php echo $pharmacy_billing_issue_delete->createddatetime->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $pharmacy_billing_issue_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_modifiedby" class="pharmacy_billing_issue_modifiedby">
<span<?php echo $pharmacy_billing_issue_delete->modifiedby->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $pharmacy_billing_issue_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_modifieddatetime" class="pharmacy_billing_issue_modifieddatetime">
<span<?php echo $pharmacy_billing_issue_delete->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->RealizationAmount->Visible) { // RealizationAmount ?>
		<td <?php echo $pharmacy_billing_issue_delete->RealizationAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_RealizationAmount" class="pharmacy_billing_issue_RealizationAmount">
<span<?php echo $pharmacy_billing_issue_delete->RealizationAmount->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->RealizationAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->CId->Visible) { // CId ?>
		<td <?php echo $pharmacy_billing_issue_delete->CId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_CId" class="pharmacy_billing_issue_CId">
<span<?php echo $pharmacy_billing_issue_delete->CId->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->CId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->PartnerName->Visible) { // PartnerName ?>
		<td <?php echo $pharmacy_billing_issue_delete->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_PartnerName" class="pharmacy_billing_issue_PartnerName">
<span<?php echo $pharmacy_billing_issue_delete->PartnerName->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->BillNumber->Visible) { // BillNumber ?>
		<td <?php echo $pharmacy_billing_issue_delete->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_BillNumber" class="pharmacy_billing_issue_BillNumber">
<span<?php echo $pharmacy_billing_issue_delete->BillNumber->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->CardNumber->Visible) { // CardNumber ?>
		<td <?php echo $pharmacy_billing_issue_delete->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_CardNumber" class="pharmacy_billing_issue_CardNumber">
<span<?php echo $pharmacy_billing_issue_delete->CardNumber->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->CardNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->BillStatus->Visible) { // BillStatus ?>
		<td <?php echo $pharmacy_billing_issue_delete->BillStatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_BillStatus" class="pharmacy_billing_issue_BillStatus">
<span<?php echo $pharmacy_billing_issue_delete->BillStatus->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->BillStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->ReportHeader->Visible) { // ReportHeader ?>
		<td <?php echo $pharmacy_billing_issue_delete->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_ReportHeader" class="pharmacy_billing_issue_ReportHeader">
<span<?php echo $pharmacy_billing_issue_delete->ReportHeader->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->ReportHeader->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->PharID->Visible) { // PharID ?>
		<td <?php echo $pharmacy_billing_issue_delete->PharID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_PharID" class="pharmacy_billing_issue_PharID">
<span<?php echo $pharmacy_billing_issue_delete->PharID->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->PharID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue_delete->UserName->Visible) { // UserName ?>
		<td <?php echo $pharmacy_billing_issue_delete->UserName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCount ?>_pharmacy_billing_issue_UserName" class="pharmacy_billing_issue_UserName">
<span<?php echo $pharmacy_billing_issue_delete->UserName->viewAttributes() ?>><?php echo $pharmacy_billing_issue_delete->UserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_billing_issue_delete->Recordset->moveNext();
}
$pharmacy_billing_issue_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_billing_issue_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_billing_issue_delete->showPageFooter();
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
$pharmacy_billing_issue_delete->terminate();
?>