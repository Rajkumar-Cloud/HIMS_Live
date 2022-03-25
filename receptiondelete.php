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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var freceptiondelete = currentForm = new ew.Form("freceptiondelete", "delete");

// Form_CustomValidate event
freceptiondelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
freceptiondelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
freceptiondelete.lists["x_CATEGORY"] = <?php echo $reception_delete->CATEGORY->Lookup->toClientList() ?>;
freceptiondelete.lists["x_CATEGORY"].options = <?php echo JsonEncode($reception_delete->CATEGORY->lookupOptions()) ?>;
freceptiondelete.lists["x_PROCEDURE"] = <?php echo $reception_delete->PROCEDURE->Lookup->toClientList() ?>;
freceptiondelete.lists["x_PROCEDURE"].options = <?php echo JsonEncode($reception_delete->PROCEDURE->lookupOptions()) ?>;
freceptiondelete.lists["x_MODE_OF_PAYMENT"] = <?php echo $reception_delete->MODE_OF_PAYMENT->Lookup->toClientList() ?>;
freceptiondelete.lists["x_MODE_OF_PAYMENT"].options = <?php echo JsonEncode($reception_delete->MODE_OF_PAYMENT->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $reception_delete->showPageHeader(); ?>
<?php
$reception_delete->showMessage();
?>
<form name="freceptiondelete" id="freceptiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($reception_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $reception_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="reception">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($reception_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($reception->id->Visible) { // id ?>
		<th class="<?php echo $reception->id->headerCellClass() ?>"><span id="elh_reception_id" class="reception_id"><?php echo $reception->id->caption() ?></span></th>
<?php } ?>
<?php if ($reception->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $reception->PatientID->headerCellClass() ?>"><span id="elh_reception_PatientID" class="reception_PatientID"><?php echo $reception->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($reception->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $reception->PatientName->headerCellClass() ?>"><span id="elh_reception_PatientName" class="reception_PatientName"><?php echo $reception->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($reception->OorN->Visible) { // OorN ?>
		<th class="<?php echo $reception->OorN->headerCellClass() ?>"><span id="elh_reception_OorN" class="reception_OorN"><?php echo $reception->OorN->caption() ?></span></th>
<?php } ?>
<?php if ($reception->PRIMARY_CONSULTANT->Visible) { // PRIMARY_CONSULTANT ?>
		<th class="<?php echo $reception->PRIMARY_CONSULTANT->headerCellClass() ?>"><span id="elh_reception_PRIMARY_CONSULTANT" class="reception_PRIMARY_CONSULTANT"><?php echo $reception->PRIMARY_CONSULTANT->caption() ?></span></th>
<?php } ?>
<?php if ($reception->CATEGORY->Visible) { // CATEGORY ?>
		<th class="<?php echo $reception->CATEGORY->headerCellClass() ?>"><span id="elh_reception_CATEGORY" class="reception_CATEGORY"><?php echo $reception->CATEGORY->caption() ?></span></th>
<?php } ?>
<?php if ($reception->PROCEDURE->Visible) { // PROCEDURE ?>
		<th class="<?php echo $reception->PROCEDURE->headerCellClass() ?>"><span id="elh_reception_PROCEDURE" class="reception_PROCEDURE"><?php echo $reception->PROCEDURE->caption() ?></span></th>
<?php } ?>
<?php if ($reception->Amount->Visible) { // Amount ?>
		<th class="<?php echo $reception->Amount->headerCellClass() ?>"><span id="elh_reception_Amount" class="reception_Amount"><?php echo $reception->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($reception->MODE_OF_PAYMENT->Visible) { // MODE OF PAYMENT ?>
		<th class="<?php echo $reception->MODE_OF_PAYMENT->headerCellClass() ?>"><span id="elh_reception_MODE_OF_PAYMENT" class="reception_MODE_OF_PAYMENT"><?php echo $reception->MODE_OF_PAYMENT->caption() ?></span></th>
<?php } ?>
<?php if ($reception->NEXT_REVIEW_DATE->Visible) { // NEXT REVIEW DATE ?>
		<th class="<?php echo $reception->NEXT_REVIEW_DATE->headerCellClass() ?>"><span id="elh_reception_NEXT_REVIEW_DATE" class="reception_NEXT_REVIEW_DATE"><?php echo $reception->NEXT_REVIEW_DATE->caption() ?></span></th>
<?php } ?>
<?php if ($reception->REMARKS->Visible) { // REMARKS ?>
		<th class="<?php echo $reception->REMARKS->headerCellClass() ?>"><span id="elh_reception_REMARKS" class="reception_REMARKS"><?php echo $reception->REMARKS->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$reception_delete->RecCnt = 0;
$i = 0;
while (!$reception_delete->Recordset->EOF) {
	$reception_delete->RecCnt++;
	$reception_delete->RowCnt++;

	// Set row properties
	$reception->resetAttributes();
	$reception->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$reception_delete->loadRowValues($reception_delete->Recordset);

	// Render row
	$reception_delete->renderRow();
?>
	<tr<?php echo $reception->rowAttributes() ?>>
<?php if ($reception->id->Visible) { // id ?>
		<td<?php echo $reception->id->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCnt ?>_reception_id" class="reception_id">
<span<?php echo $reception->id->viewAttributes() ?>>
<?php echo $reception->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception->PatientID->Visible) { // PatientID ?>
		<td<?php echo $reception->PatientID->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCnt ?>_reception_PatientID" class="reception_PatientID">
<span<?php echo $reception->PatientID->viewAttributes() ?>>
<?php echo $reception->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception->PatientName->Visible) { // PatientName ?>
		<td<?php echo $reception->PatientName->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCnt ?>_reception_PatientName" class="reception_PatientName">
<span<?php echo $reception->PatientName->viewAttributes() ?>>
<?php echo $reception->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception->OorN->Visible) { // OorN ?>
		<td<?php echo $reception->OorN->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCnt ?>_reception_OorN" class="reception_OorN">
<span<?php echo $reception->OorN->viewAttributes() ?>>
<?php echo $reception->OorN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception->PRIMARY_CONSULTANT->Visible) { // PRIMARY_CONSULTANT ?>
		<td<?php echo $reception->PRIMARY_CONSULTANT->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCnt ?>_reception_PRIMARY_CONSULTANT" class="reception_PRIMARY_CONSULTANT">
<span<?php echo $reception->PRIMARY_CONSULTANT->viewAttributes() ?>>
<?php echo $reception->PRIMARY_CONSULTANT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception->CATEGORY->Visible) { // CATEGORY ?>
		<td<?php echo $reception->CATEGORY->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCnt ?>_reception_CATEGORY" class="reception_CATEGORY">
<span<?php echo $reception->CATEGORY->viewAttributes() ?>>
<?php echo $reception->CATEGORY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception->PROCEDURE->Visible) { // PROCEDURE ?>
		<td<?php echo $reception->PROCEDURE->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCnt ?>_reception_PROCEDURE" class="reception_PROCEDURE">
<span<?php echo $reception->PROCEDURE->viewAttributes() ?>>
<?php echo $reception->PROCEDURE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception->Amount->Visible) { // Amount ?>
		<td<?php echo $reception->Amount->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCnt ?>_reception_Amount" class="reception_Amount">
<span<?php echo $reception->Amount->viewAttributes() ?>>
<?php echo $reception->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception->MODE_OF_PAYMENT->Visible) { // MODE OF PAYMENT ?>
		<td<?php echo $reception->MODE_OF_PAYMENT->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCnt ?>_reception_MODE_OF_PAYMENT" class="reception_MODE_OF_PAYMENT">
<span<?php echo $reception->MODE_OF_PAYMENT->viewAttributes() ?>>
<?php echo $reception->MODE_OF_PAYMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception->NEXT_REVIEW_DATE->Visible) { // NEXT REVIEW DATE ?>
		<td<?php echo $reception->NEXT_REVIEW_DATE->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCnt ?>_reception_NEXT_REVIEW_DATE" class="reception_NEXT_REVIEW_DATE">
<span<?php echo $reception->NEXT_REVIEW_DATE->viewAttributes() ?>>
<?php echo $reception->NEXT_REVIEW_DATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($reception->REMARKS->Visible) { // REMARKS ?>
		<td<?php echo $reception->REMARKS->cellAttributes() ?>>
<span id="el<?php echo $reception_delete->RowCnt ?>_reception_REMARKS" class="reception_REMARKS">
<span<?php echo $reception->REMARKS->viewAttributes() ?>>
<?php echo $reception->REMARKS->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$reception_delete->terminate();
?>