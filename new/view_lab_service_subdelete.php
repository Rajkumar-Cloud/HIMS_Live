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
$view_lab_service_sub_delete = new view_lab_service_sub_delete();

// Run the page
$view_lab_service_sub_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_service_sub_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_lab_service_subdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fview_lab_service_subdelete = currentForm = new ew.Form("fview_lab_service_subdelete", "delete");
	loadjs.done("fview_lab_service_subdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_lab_service_sub_delete->showPageHeader(); ?>
<?php
$view_lab_service_sub_delete->showMessage();
?>
<form name="fview_lab_service_subdelete" id="fview_lab_service_subdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_service_sub">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_lab_service_sub_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_lab_service_sub_delete->Id->Visible) { // Id ?>
		<th class="<?php echo $view_lab_service_sub_delete->Id->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Id" class="view_lab_service_sub_Id"><?php echo $view_lab_service_sub_delete->Id->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub_delete->CODE->Visible) { // CODE ?>
		<th class="<?php echo $view_lab_service_sub_delete->CODE->headerCellClass() ?>"><span id="elh_view_lab_service_sub_CODE" class="view_lab_service_sub_CODE"><?php echo $view_lab_service_sub_delete->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub_delete->SERVICE->Visible) { // SERVICE ?>
		<th class="<?php echo $view_lab_service_sub_delete->SERVICE->headerCellClass() ?>"><span id="elh_view_lab_service_sub_SERVICE" class="view_lab_service_sub_SERVICE"><?php echo $view_lab_service_sub_delete->SERVICE->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub_delete->UNITS->Visible) { // UNITS ?>
		<th class="<?php echo $view_lab_service_sub_delete->UNITS->headerCellClass() ?>"><span id="elh_view_lab_service_sub_UNITS" class="view_lab_service_sub_UNITS"><?php echo $view_lab_service_sub_delete->UNITS->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $view_lab_service_sub_delete->HospID->headerCellClass() ?>"><span id="elh_view_lab_service_sub_HospID" class="view_lab_service_sub_HospID"><?php echo $view_lab_service_sub_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub_delete->TestSubCd->Visible) { // TestSubCd ?>
		<th class="<?php echo $view_lab_service_sub_delete->TestSubCd->headerCellClass() ?>"><span id="elh_view_lab_service_sub_TestSubCd" class="view_lab_service_sub_TestSubCd"><?php echo $view_lab_service_sub_delete->TestSubCd->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub_delete->Method->Visible) { // Method ?>
		<th class="<?php echo $view_lab_service_sub_delete->Method->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Method" class="view_lab_service_sub_Method"><?php echo $view_lab_service_sub_delete->Method->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub_delete->Order->Visible) { // Order ?>
		<th class="<?php echo $view_lab_service_sub_delete->Order->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Order" class="view_lab_service_sub_Order"><?php echo $view_lab_service_sub_delete->Order->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub_delete->ResType->Visible) { // ResType ?>
		<th class="<?php echo $view_lab_service_sub_delete->ResType->headerCellClass() ?>"><span id="elh_view_lab_service_sub_ResType" class="view_lab_service_sub_ResType"><?php echo $view_lab_service_sub_delete->ResType->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub_delete->UnitCD->Visible) { // UnitCD ?>
		<th class="<?php echo $view_lab_service_sub_delete->UnitCD->headerCellClass() ?>"><span id="elh_view_lab_service_sub_UnitCD" class="view_lab_service_sub_UnitCD"><?php echo $view_lab_service_sub_delete->UnitCD->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub_delete->Sample->Visible) { // Sample ?>
		<th class="<?php echo $view_lab_service_sub_delete->Sample->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Sample" class="view_lab_service_sub_Sample"><?php echo $view_lab_service_sub_delete->Sample->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub_delete->NoD->Visible) { // NoD ?>
		<th class="<?php echo $view_lab_service_sub_delete->NoD->headerCellClass() ?>"><span id="elh_view_lab_service_sub_NoD" class="view_lab_service_sub_NoD"><?php echo $view_lab_service_sub_delete->NoD->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub_delete->BillOrder->Visible) { // BillOrder ?>
		<th class="<?php echo $view_lab_service_sub_delete->BillOrder->headerCellClass() ?>"><span id="elh_view_lab_service_sub_BillOrder" class="view_lab_service_sub_BillOrder"><?php echo $view_lab_service_sub_delete->BillOrder->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub_delete->Formula->Visible) { // Formula ?>
		<th class="<?php echo $view_lab_service_sub_delete->Formula->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Formula" class="view_lab_service_sub_Formula"><?php echo $view_lab_service_sub_delete->Formula->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub_delete->Inactive->Visible) { // Inactive ?>
		<th class="<?php echo $view_lab_service_sub_delete->Inactive->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Inactive" class="view_lab_service_sub_Inactive"><?php echo $view_lab_service_sub_delete->Inactive->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub_delete->Outsource->Visible) { // Outsource ?>
		<th class="<?php echo $view_lab_service_sub_delete->Outsource->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Outsource" class="view_lab_service_sub_Outsource"><?php echo $view_lab_service_sub_delete->Outsource->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub_delete->CollSample->Visible) { // CollSample ?>
		<th class="<?php echo $view_lab_service_sub_delete->CollSample->headerCellClass() ?>"><span id="elh_view_lab_service_sub_CollSample" class="view_lab_service_sub_CollSample"><?php echo $view_lab_service_sub_delete->CollSample->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_lab_service_sub_delete->RecordCount = 0;
$i = 0;
while (!$view_lab_service_sub_delete->Recordset->EOF) {
	$view_lab_service_sub_delete->RecordCount++;
	$view_lab_service_sub_delete->RowCount++;

	// Set row properties
	$view_lab_service_sub->resetAttributes();
	$view_lab_service_sub->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_lab_service_sub_delete->loadRowValues($view_lab_service_sub_delete->Recordset);

	// Render row
	$view_lab_service_sub_delete->renderRow();
?>
	<tr <?php echo $view_lab_service_sub->rowAttributes() ?>>
<?php if ($view_lab_service_sub_delete->Id->Visible) { // Id ?>
		<td <?php echo $view_lab_service_sub_delete->Id->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCount ?>_view_lab_service_sub_Id" class="view_lab_service_sub_Id">
<span<?php echo $view_lab_service_sub_delete->Id->viewAttributes() ?>><?php echo $view_lab_service_sub_delete->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_delete->CODE->Visible) { // CODE ?>
		<td <?php echo $view_lab_service_sub_delete->CODE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCount ?>_view_lab_service_sub_CODE" class="view_lab_service_sub_CODE">
<span<?php echo $view_lab_service_sub_delete->CODE->viewAttributes() ?>><?php echo $view_lab_service_sub_delete->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_delete->SERVICE->Visible) { // SERVICE ?>
		<td <?php echo $view_lab_service_sub_delete->SERVICE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCount ?>_view_lab_service_sub_SERVICE" class="view_lab_service_sub_SERVICE">
<span<?php echo $view_lab_service_sub_delete->SERVICE->viewAttributes() ?>><?php echo $view_lab_service_sub_delete->SERVICE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_delete->UNITS->Visible) { // UNITS ?>
		<td <?php echo $view_lab_service_sub_delete->UNITS->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCount ?>_view_lab_service_sub_UNITS" class="view_lab_service_sub_UNITS">
<span<?php echo $view_lab_service_sub_delete->UNITS->viewAttributes() ?>><?php echo $view_lab_service_sub_delete->UNITS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $view_lab_service_sub_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCount ?>_view_lab_service_sub_HospID" class="view_lab_service_sub_HospID">
<span<?php echo $view_lab_service_sub_delete->HospID->viewAttributes() ?>><?php echo $view_lab_service_sub_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_delete->TestSubCd->Visible) { // TestSubCd ?>
		<td <?php echo $view_lab_service_sub_delete->TestSubCd->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCount ?>_view_lab_service_sub_TestSubCd" class="view_lab_service_sub_TestSubCd">
<span<?php echo $view_lab_service_sub_delete->TestSubCd->viewAttributes() ?>><?php echo $view_lab_service_sub_delete->TestSubCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_delete->Method->Visible) { // Method ?>
		<td <?php echo $view_lab_service_sub_delete->Method->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCount ?>_view_lab_service_sub_Method" class="view_lab_service_sub_Method">
<span<?php echo $view_lab_service_sub_delete->Method->viewAttributes() ?>><?php echo $view_lab_service_sub_delete->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_delete->Order->Visible) { // Order ?>
		<td <?php echo $view_lab_service_sub_delete->Order->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCount ?>_view_lab_service_sub_Order" class="view_lab_service_sub_Order">
<span<?php echo $view_lab_service_sub_delete->Order->viewAttributes() ?>><?php echo $view_lab_service_sub_delete->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_delete->ResType->Visible) { // ResType ?>
		<td <?php echo $view_lab_service_sub_delete->ResType->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCount ?>_view_lab_service_sub_ResType" class="view_lab_service_sub_ResType">
<span<?php echo $view_lab_service_sub_delete->ResType->viewAttributes() ?>><?php echo $view_lab_service_sub_delete->ResType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_delete->UnitCD->Visible) { // UnitCD ?>
		<td <?php echo $view_lab_service_sub_delete->UnitCD->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCount ?>_view_lab_service_sub_UnitCD" class="view_lab_service_sub_UnitCD">
<span<?php echo $view_lab_service_sub_delete->UnitCD->viewAttributes() ?>><?php echo $view_lab_service_sub_delete->UnitCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_delete->Sample->Visible) { // Sample ?>
		<td <?php echo $view_lab_service_sub_delete->Sample->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCount ?>_view_lab_service_sub_Sample" class="view_lab_service_sub_Sample">
<span<?php echo $view_lab_service_sub_delete->Sample->viewAttributes() ?>><?php echo $view_lab_service_sub_delete->Sample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_delete->NoD->Visible) { // NoD ?>
		<td <?php echo $view_lab_service_sub_delete->NoD->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCount ?>_view_lab_service_sub_NoD" class="view_lab_service_sub_NoD">
<span<?php echo $view_lab_service_sub_delete->NoD->viewAttributes() ?>><?php echo $view_lab_service_sub_delete->NoD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_delete->BillOrder->Visible) { // BillOrder ?>
		<td <?php echo $view_lab_service_sub_delete->BillOrder->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCount ?>_view_lab_service_sub_BillOrder" class="view_lab_service_sub_BillOrder">
<span<?php echo $view_lab_service_sub_delete->BillOrder->viewAttributes() ?>><?php echo $view_lab_service_sub_delete->BillOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_delete->Formula->Visible) { // Formula ?>
		<td <?php echo $view_lab_service_sub_delete->Formula->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCount ?>_view_lab_service_sub_Formula" class="view_lab_service_sub_Formula">
<span<?php echo $view_lab_service_sub_delete->Formula->viewAttributes() ?>><?php echo $view_lab_service_sub_delete->Formula->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_delete->Inactive->Visible) { // Inactive ?>
		<td <?php echo $view_lab_service_sub_delete->Inactive->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCount ?>_view_lab_service_sub_Inactive" class="view_lab_service_sub_Inactive">
<span<?php echo $view_lab_service_sub_delete->Inactive->viewAttributes() ?>><?php echo $view_lab_service_sub_delete->Inactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_delete->Outsource->Visible) { // Outsource ?>
		<td <?php echo $view_lab_service_sub_delete->Outsource->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCount ?>_view_lab_service_sub_Outsource" class="view_lab_service_sub_Outsource">
<span<?php echo $view_lab_service_sub_delete->Outsource->viewAttributes() ?>><?php echo $view_lab_service_sub_delete->Outsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub_delete->CollSample->Visible) { // CollSample ?>
		<td <?php echo $view_lab_service_sub_delete->CollSample->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCount ?>_view_lab_service_sub_CollSample" class="view_lab_service_sub_CollSample">
<span<?php echo $view_lab_service_sub_delete->CollSample->viewAttributes() ?>><?php echo $view_lab_service_sub_delete->CollSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_lab_service_sub_delete->Recordset->moveNext();
}
$view_lab_service_sub_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_lab_service_sub_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_lab_service_sub_delete->showPageFooter();
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
$view_lab_service_sub_delete->terminate();
?>