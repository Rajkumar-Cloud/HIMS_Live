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
$reception_delete = new reception_delete();

// Run the page
$reception_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$reception_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var freceptiondelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	freceptiondelete = currentForm = new ew.Form("freceptiondelete", "delete");
	loadjs.done("freceptiondelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $reception_delete->showPageHeader(); ?>
<?php
$reception_delete->showMessage();
?>
<form name="freceptiondelete" id="freceptiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="reception">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($reception_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($reception_delete->id->Visible) { // id ?>
		<th class="<?php echo $reception_delete->id->headerCellClass() ?>"><span id="elh_reception_id" class="reception_id"><?php echo $reception_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($reception_delete->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $reception_delete->PatientID->headerCellClass() ?>"><span id="elh_reception_PatientID" class="reception_PatientID"><?php echo $reception_delete->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($reception_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $reception_delete->PatientName->headerCellClass() ?>"><span id="elh_reception_PatientName" class="reception_PatientName"><?php echo $reception_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($reception_delete->OorN->Visible) { // OorN ?>
		<th class="<?php echo $reception_delete->OorN->headerCellClass() ?>"><span id="elh_reception_OorN" class="reception_OorN"><?php echo $reception_delete->OorN->caption() ?></span></th>
<?php } ?>
<?php if ($reception_delete->PRIMARY_CONSULTANT->Visible) { // PRIMARY_CONSULTANT ?>
		<th class="<?php echo $reception_delete->PRIMARY_CONSULTANT->headerCellClass() ?>"><span id="elh_reception_PRIMARY_CONSULTANT" class="reception_PRIMARY_CONSULTANT"><?php echo $reception_delete->PRIMARY_CONSULTANT->caption() ?></span></th>
<?php } ?>
<?php if ($reception_delete->CATEGORY->Visible) { // CATEGORY ?>
		<th class="<?php echo $reception_delete->CATEGORY->headerCellClass() ?>"><span id="elh_reception_CATEGORY" class="reception_CATEGORY"><?php echo $reception_delete->CATEGORY->caption() ?></span></th>
<?php } ?>
<?php if ($reception_delete->PROCEDURE->Visible) { // PROCEDURE ?>
		<th class="<?php echo $reception_delete->PROCEDURE->headerCellClass() ?>"><span id="elh_reception_PROCEDURE" class="reception_PROCEDURE"><?php echo $reception_delete->PROCEDURE->caption() ?></span></th>
<?php } ?>
<?php if ($reception_delete->Amount->Visible) { // Amount ?>
		<th class="<?php echo $reception_delete->Amount->headerCellClass() ?>"><span id="elh_reception_Amount" class="reception_Amount"><?php echo $reception_delete->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($reception_delete->MODE_OF_PAYMENT->Visible) { // MODE OF PAYMENT ?>
		<th class="<?php echo $reception_delete->MODE_OF_PAYMENT->headerCellClass() ?>"><span id="elh_reception_MODE_OF_PAYMENT" class="reception_MODE_OF_PAYMENT"><?php echo $reception_delete->MODE_OF_PAYMENT->caption() ?></span></th>
<?php } ?>
<?php if ($reception_delete->NEXT_REVIEW_DATE->Visible) { // NEXT REVIEW DATE ?>
		<th class="<?php echo $reception_delete->NEXT_REVIEW_DATE->headerCellClass() ?>"><span id="elh_reception_NEXT_REVIEW_DATE" class="reception_NEXT_REVIEW_DATE"><?php echo $reception_delete->NEXT_REVIEW_DATE->caption() ?></span></th>
<?php } ?>
<?php if ($reception_delete->REMARKS->Visible) { // REMARKS ?>
		<th class="<?php echo $reception_delete->REMARKS->headerCellClass() ?>"><span id="elh_reception_REMARKS" class="reception_REMARKS"><?php echo $reception_delete->REMARKS->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$reception_delete->RecordCount = 0;
$i = 0;
while (!$reception_delete->Recordset->EOF) {
	$reception_delete->RecordCount++;
	$reception_delete->RowCount++;

	// Set row properties
	$reception->resetAttributes();
	$reception->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$reception_delete->loadRowValues($reception_delete->Recordset);

	// Render row
	$reception_delete->renderRow();
?>
	<tr <?php echo $reception->rowAttributes() ?>>
<?php if ($reception_delete->id->Visible) { // id ?>
		<td <?php echo $reception_delete->id->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCount ?>_reception_id" class="reception_id">
<span<?php echo $reception_delete->id->viewAttributes() ?>><?php echo $reception_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception_delete->PatientID->Visible) { // PatientID ?>
		<td <?php echo $reception_delete->PatientID->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCount ?>_reception_PatientID" class="reception_PatientID">
<span<?php echo $reception_delete->PatientID->viewAttributes() ?>><?php echo $reception_delete->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $reception_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCount ?>_reception_PatientName" class="reception_PatientName">
<span<?php echo $reception_delete->PatientName->viewAttributes() ?>><?php echo $reception_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception_delete->OorN->Visible) { // OorN ?>
		<td <?php echo $reception_delete->OorN->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCount ?>_reception_OorN" class="reception_OorN">
<span<?php echo $reception_delete->OorN->viewAttributes() ?>><?php echo $reception_delete->OorN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception_delete->PRIMARY_CONSULTANT->Visible) { // PRIMARY_CONSULTANT ?>
		<td <?php echo $reception_delete->PRIMARY_CONSULTANT->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCount ?>_reception_PRIMARY_CONSULTANT" class="reception_PRIMARY_CONSULTANT">
<span<?php echo $reception_delete->PRIMARY_CONSULTANT->viewAttributes() ?>><?php echo $reception_delete->PRIMARY_CONSULTANT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception_delete->CATEGORY->Visible) { // CATEGORY ?>
		<td <?php echo $reception_delete->CATEGORY->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCount ?>_reception_CATEGORY" class="reception_CATEGORY">
<span<?php echo $reception_delete->CATEGORY->viewAttributes() ?>><?php echo $reception_delete->CATEGORY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception_delete->PROCEDURE->Visible) { // PROCEDURE ?>
		<td <?php echo $reception_delete->PROCEDURE->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCount ?>_reception_PROCEDURE" class="reception_PROCEDURE">
<span<?php echo $reception_delete->PROCEDURE->viewAttributes() ?>><?php echo $reception_delete->PROCEDURE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception_delete->Amount->Visible) { // Amount ?>
		<td <?php echo $reception_delete->Amount->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCount ?>_reception_Amount" class="reception_Amount">
<span<?php echo $reception_delete->Amount->viewAttributes() ?>><?php echo $reception_delete->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception_delete->MODE_OF_PAYMENT->Visible) { // MODE OF PAYMENT ?>
		<td <?php echo $reception_delete->MODE_OF_PAYMENT->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCount ?>_reception_MODE_OF_PAYMENT" class="reception_MODE_OF_PAYMENT">
<span<?php echo $reception_delete->MODE_OF_PAYMENT->viewAttributes() ?>><?php echo $reception_delete->MODE_OF_PAYMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception_delete->NEXT_REVIEW_DATE->Visible) { // NEXT REVIEW DATE ?>
		<td <?php echo $reception_delete->NEXT_REVIEW_DATE->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCount ?>_reception_NEXT_REVIEW_DATE" class="reception_NEXT_REVIEW_DATE">
<span<?php echo $reception_delete->NEXT_REVIEW_DATE->viewAttributes() ?>><?php echo $reception_delete->NEXT_REVIEW_DATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception_delete->REMARKS->Visible) { // REMARKS ?>
		<td <?php echo $reception_delete->REMARKS->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCount ?>_reception_REMARKS" class="reception_REMARKS">
<span<?php echo $reception_delete->REMARKS->viewAttributes() ?>><?php echo $reception_delete->REMARKS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$reception_delete->Recordset->moveNext();
}
$reception_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $reception_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$reception_delete->showPageFooter();
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
$reception_delete->terminate();
?>