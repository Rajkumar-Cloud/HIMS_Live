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
$view_pharmacy_purchase_request_approved_delete = new view_pharmacy_purchase_request_approved_delete();

// Run the page
$view_pharmacy_purchase_request_approved_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_approved_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_pharmacy_purchase_request_approveddelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fview_pharmacy_purchase_request_approveddelete = currentForm = new ew.Form("fview_pharmacy_purchase_request_approveddelete", "delete");
	loadjs.done("fview_pharmacy_purchase_request_approveddelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_pharmacy_purchase_request_approved_delete->showPageHeader(); ?>
<?php
$view_pharmacy_purchase_request_approved_delete->showMessage();
?>
<form name="fview_pharmacy_purchase_request_approveddelete" id="fview_pharmacy_purchase_request_approveddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_approved">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_pharmacy_purchase_request_approved_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_pharmacy_purchase_request_approved_delete->id->Visible) { // id ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved_delete->id->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_id" class="view_pharmacy_purchase_request_approved_id"><?php echo $view_pharmacy_purchase_request_approved_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->DT->Visible) { // DT ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved_delete->DT->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_DT" class="view_pharmacy_purchase_request_approved_DT"><?php echo $view_pharmacy_purchase_request_approved_delete->DT->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->EmployeeName->Visible) { // EmployeeName ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved_delete->EmployeeName->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_EmployeeName" class="view_pharmacy_purchase_request_approved_EmployeeName"><?php echo $view_pharmacy_purchase_request_approved_delete->EmployeeName->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->Department->Visible) { // Department ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved_delete->Department->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_Department" class="view_pharmacy_purchase_request_approved_Department"><?php echo $view_pharmacy_purchase_request_approved_delete->Department->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved_delete->ApprovedStatus->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_ApprovedStatus" class="view_pharmacy_purchase_request_approved_ApprovedStatus"><?php echo $view_pharmacy_purchase_request_approved_delete->ApprovedStatus->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved_delete->PurchaseStatus->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_PurchaseStatus" class="view_pharmacy_purchase_request_approved_PurchaseStatus"><?php echo $view_pharmacy_purchase_request_approved_delete->PurchaseStatus->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved_delete->HospID->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_HospID" class="view_pharmacy_purchase_request_approved_HospID"><?php echo $view_pharmacy_purchase_request_approved_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved_delete->createdby->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_createdby" class="view_pharmacy_purchase_request_approved_createdby"><?php echo $view_pharmacy_purchase_request_approved_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved_delete->createddatetime->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_createddatetime" class="view_pharmacy_purchase_request_approved_createddatetime"><?php echo $view_pharmacy_purchase_request_approved_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved_delete->modifiedby->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_modifiedby" class="view_pharmacy_purchase_request_approved_modifiedby"><?php echo $view_pharmacy_purchase_request_approved_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_modifieddatetime" class="view_pharmacy_purchase_request_approved_modifieddatetime"><?php echo $view_pharmacy_purchase_request_approved_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved_delete->BRCODE->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_BRCODE" class="view_pharmacy_purchase_request_approved_BRCODE"><?php echo $view_pharmacy_purchase_request_approved_delete->BRCODE->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_pharmacy_purchase_request_approved_delete->RecordCount = 0;
$i = 0;
while (!$view_pharmacy_purchase_request_approved_delete->Recordset->EOF) {
	$view_pharmacy_purchase_request_approved_delete->RecordCount++;
	$view_pharmacy_purchase_request_approved_delete->RowCount++;

	// Set row properties
	$view_pharmacy_purchase_request_approved->resetAttributes();
	$view_pharmacy_purchase_request_approved->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_pharmacy_purchase_request_approved_delete->loadRowValues($view_pharmacy_purchase_request_approved_delete->Recordset);

	// Render row
	$view_pharmacy_purchase_request_approved_delete->renderRow();
?>
	<tr <?php echo $view_pharmacy_purchase_request_approved->rowAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_approved_delete->id->Visible) { // id ?>
		<td <?php echo $view_pharmacy_purchase_request_approved_delete->id->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCount ?>_view_pharmacy_purchase_request_approved_id" class="view_pharmacy_purchase_request_approved_id">
<span<?php echo $view_pharmacy_purchase_request_approved_delete->id->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->DT->Visible) { // DT ?>
		<td <?php echo $view_pharmacy_purchase_request_approved_delete->DT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCount ?>_view_pharmacy_purchase_request_approved_DT" class="view_pharmacy_purchase_request_approved_DT">
<span<?php echo $view_pharmacy_purchase_request_approved_delete->DT->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_delete->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->EmployeeName->Visible) { // EmployeeName ?>
		<td <?php echo $view_pharmacy_purchase_request_approved_delete->EmployeeName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCount ?>_view_pharmacy_purchase_request_approved_EmployeeName" class="view_pharmacy_purchase_request_approved_EmployeeName">
<span<?php echo $view_pharmacy_purchase_request_approved_delete->EmployeeName->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_delete->EmployeeName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->Department->Visible) { // Department ?>
		<td <?php echo $view_pharmacy_purchase_request_approved_delete->Department->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCount ?>_view_pharmacy_purchase_request_approved_Department" class="view_pharmacy_purchase_request_approved_Department">
<span<?php echo $view_pharmacy_purchase_request_approved_delete->Department->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_delete->Department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td <?php echo $view_pharmacy_purchase_request_approved_delete->ApprovedStatus->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCount ?>_view_pharmacy_purchase_request_approved_ApprovedStatus" class="view_pharmacy_purchase_request_approved_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_approved_delete->ApprovedStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_delete->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<td <?php echo $view_pharmacy_purchase_request_approved_delete->PurchaseStatus->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCount ?>_view_pharmacy_purchase_request_approved_PurchaseStatus" class="view_pharmacy_purchase_request_approved_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_approved_delete->PurchaseStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_delete->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $view_pharmacy_purchase_request_approved_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCount ?>_view_pharmacy_purchase_request_approved_HospID" class="view_pharmacy_purchase_request_approved_HospID">
<span<?php echo $view_pharmacy_purchase_request_approved_delete->HospID->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $view_pharmacy_purchase_request_approved_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCount ?>_view_pharmacy_purchase_request_approved_createdby" class="view_pharmacy_purchase_request_approved_createdby">
<span<?php echo $view_pharmacy_purchase_request_approved_delete->createdby->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $view_pharmacy_purchase_request_approved_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCount ?>_view_pharmacy_purchase_request_approved_createddatetime" class="view_pharmacy_purchase_request_approved_createddatetime">
<span<?php echo $view_pharmacy_purchase_request_approved_delete->createddatetime->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $view_pharmacy_purchase_request_approved_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCount ?>_view_pharmacy_purchase_request_approved_modifiedby" class="view_pharmacy_purchase_request_approved_modifiedby">
<span<?php echo $view_pharmacy_purchase_request_approved_delete->modifiedby->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $view_pharmacy_purchase_request_approved_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCount ?>_view_pharmacy_purchase_request_approved_modifieddatetime" class="view_pharmacy_purchase_request_approved_modifieddatetime">
<span<?php echo $view_pharmacy_purchase_request_approved_delete->modifieddatetime->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_delete->BRCODE->Visible) { // BRCODE ?>
		<td <?php echo $view_pharmacy_purchase_request_approved_delete->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCount ?>_view_pharmacy_purchase_request_approved_BRCODE" class="view_pharmacy_purchase_request_approved_BRCODE">
<span<?php echo $view_pharmacy_purchase_request_approved_delete->BRCODE->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_delete->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_pharmacy_purchase_request_approved_delete->Recordset->moveNext();
}
$view_pharmacy_purchase_request_approved_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_pharmacy_purchase_request_approved_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_pharmacy_purchase_request_approved_delete->showPageFooter();
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
$view_pharmacy_purchase_request_approved_delete->terminate();
?>