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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fview_lab_service_subdelete = currentForm = new ew.Form("fview_lab_service_subdelete", "delete");

// Form_CustomValidate event
fview_lab_service_subdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_service_subdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_service_subdelete.lists["x_UNITS"] = <?php echo $view_lab_service_sub_delete->UNITS->Lookup->toClientList() ?>;
fview_lab_service_subdelete.lists["x_UNITS"].options = <?php echo JsonEncode($view_lab_service_sub_delete->UNITS->lookupOptions()) ?>;
fview_lab_service_subdelete.lists["x_Inactive[]"] = <?php echo $view_lab_service_sub_delete->Inactive->Lookup->toClientList() ?>;
fview_lab_service_subdelete.lists["x_Inactive[]"].options = <?php echo JsonEncode($view_lab_service_sub_delete->Inactive->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_lab_service_sub_delete->showPageHeader(); ?>
<?php
$view_lab_service_sub_delete->showMessage();
?>
<form name="fview_lab_service_subdelete" id="fview_lab_service_subdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_service_sub_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_service_sub_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_service_sub">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_lab_service_sub_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_lab_service_sub->Id->Visible) { // Id ?>
		<th class="<?php echo $view_lab_service_sub->Id->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Id" class="view_lab_service_sub_Id"><?php echo $view_lab_service_sub->Id->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub->CODE->Visible) { // CODE ?>
		<th class="<?php echo $view_lab_service_sub->CODE->headerCellClass() ?>"><span id="elh_view_lab_service_sub_CODE" class="view_lab_service_sub_CODE"><?php echo $view_lab_service_sub->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub->SERVICE->Visible) { // SERVICE ?>
		<th class="<?php echo $view_lab_service_sub->SERVICE->headerCellClass() ?>"><span id="elh_view_lab_service_sub_SERVICE" class="view_lab_service_sub_SERVICE"><?php echo $view_lab_service_sub->SERVICE->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub->UNITS->Visible) { // UNITS ?>
		<th class="<?php echo $view_lab_service_sub->UNITS->headerCellClass() ?>"><span id="elh_view_lab_service_sub_UNITS" class="view_lab_service_sub_UNITS"><?php echo $view_lab_service_sub->UNITS->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub->HospID->Visible) { // HospID ?>
		<th class="<?php echo $view_lab_service_sub->HospID->headerCellClass() ?>"><span id="elh_view_lab_service_sub_HospID" class="view_lab_service_sub_HospID"><?php echo $view_lab_service_sub->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub->TestSubCd->Visible) { // TestSubCd ?>
		<th class="<?php echo $view_lab_service_sub->TestSubCd->headerCellClass() ?>"><span id="elh_view_lab_service_sub_TestSubCd" class="view_lab_service_sub_TestSubCd"><?php echo $view_lab_service_sub->TestSubCd->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub->Method->Visible) { // Method ?>
		<th class="<?php echo $view_lab_service_sub->Method->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Method" class="view_lab_service_sub_Method"><?php echo $view_lab_service_sub->Method->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub->Order->Visible) { // Order ?>
		<th class="<?php echo $view_lab_service_sub->Order->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Order" class="view_lab_service_sub_Order"><?php echo $view_lab_service_sub->Order->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub->ResType->Visible) { // ResType ?>
		<th class="<?php echo $view_lab_service_sub->ResType->headerCellClass() ?>"><span id="elh_view_lab_service_sub_ResType" class="view_lab_service_sub_ResType"><?php echo $view_lab_service_sub->ResType->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub->UnitCD->Visible) { // UnitCD ?>
		<th class="<?php echo $view_lab_service_sub->UnitCD->headerCellClass() ?>"><span id="elh_view_lab_service_sub_UnitCD" class="view_lab_service_sub_UnitCD"><?php echo $view_lab_service_sub->UnitCD->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub->Sample->Visible) { // Sample ?>
		<th class="<?php echo $view_lab_service_sub->Sample->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Sample" class="view_lab_service_sub_Sample"><?php echo $view_lab_service_sub->Sample->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub->NoD->Visible) { // NoD ?>
		<th class="<?php echo $view_lab_service_sub->NoD->headerCellClass() ?>"><span id="elh_view_lab_service_sub_NoD" class="view_lab_service_sub_NoD"><?php echo $view_lab_service_sub->NoD->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub->BillOrder->Visible) { // BillOrder ?>
		<th class="<?php echo $view_lab_service_sub->BillOrder->headerCellClass() ?>"><span id="elh_view_lab_service_sub_BillOrder" class="view_lab_service_sub_BillOrder"><?php echo $view_lab_service_sub->BillOrder->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub->Formula->Visible) { // Formula ?>
		<th class="<?php echo $view_lab_service_sub->Formula->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Formula" class="view_lab_service_sub_Formula"><?php echo $view_lab_service_sub->Formula->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub->Inactive->Visible) { // Inactive ?>
		<th class="<?php echo $view_lab_service_sub->Inactive->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Inactive" class="view_lab_service_sub_Inactive"><?php echo $view_lab_service_sub->Inactive->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub->Outsource->Visible) { // Outsource ?>
		<th class="<?php echo $view_lab_service_sub->Outsource->headerCellClass() ?>"><span id="elh_view_lab_service_sub_Outsource" class="view_lab_service_sub_Outsource"><?php echo $view_lab_service_sub->Outsource->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_sub->CollSample->Visible) { // CollSample ?>
		<th class="<?php echo $view_lab_service_sub->CollSample->headerCellClass() ?>"><span id="elh_view_lab_service_sub_CollSample" class="view_lab_service_sub_CollSample"><?php echo $view_lab_service_sub->CollSample->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_lab_service_sub_delete->RecCnt = 0;
$i = 0;
while (!$view_lab_service_sub_delete->Recordset->EOF) {
	$view_lab_service_sub_delete->RecCnt++;
	$view_lab_service_sub_delete->RowCnt++;

	// Set row properties
	$view_lab_service_sub->resetAttributes();
	$view_lab_service_sub->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_lab_service_sub_delete->loadRowValues($view_lab_service_sub_delete->Recordset);

	// Render row
	$view_lab_service_sub_delete->renderRow();
?>
	<tr<?php echo $view_lab_service_sub->rowAttributes() ?>>
<?php if ($view_lab_service_sub->Id->Visible) { // Id ?>
		<td<?php echo $view_lab_service_sub->Id->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCnt ?>_view_lab_service_sub_Id" class="view_lab_service_sub_Id">
<span<?php echo $view_lab_service_sub->Id->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->CODE->Visible) { // CODE ?>
		<td<?php echo $view_lab_service_sub->CODE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCnt ?>_view_lab_service_sub_CODE" class="view_lab_service_sub_CODE">
<span<?php echo $view_lab_service_sub->CODE->viewAttributes() ?>>
<?php echo $view_lab_service_sub->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->SERVICE->Visible) { // SERVICE ?>
		<td<?php echo $view_lab_service_sub->SERVICE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCnt ?>_view_lab_service_sub_SERVICE" class="view_lab_service_sub_SERVICE">
<span<?php echo $view_lab_service_sub->SERVICE->viewAttributes() ?>>
<?php echo $view_lab_service_sub->SERVICE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->UNITS->Visible) { // UNITS ?>
		<td<?php echo $view_lab_service_sub->UNITS->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCnt ?>_view_lab_service_sub_UNITS" class="view_lab_service_sub_UNITS">
<span<?php echo $view_lab_service_sub->UNITS->viewAttributes() ?>>
<?php echo $view_lab_service_sub->UNITS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->HospID->Visible) { // HospID ?>
		<td<?php echo $view_lab_service_sub->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCnt ?>_view_lab_service_sub_HospID" class="view_lab_service_sub_HospID">
<span<?php echo $view_lab_service_sub->HospID->viewAttributes() ?>>
<?php echo $view_lab_service_sub->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->TestSubCd->Visible) { // TestSubCd ?>
		<td<?php echo $view_lab_service_sub->TestSubCd->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCnt ?>_view_lab_service_sub_TestSubCd" class="view_lab_service_sub_TestSubCd">
<span<?php echo $view_lab_service_sub->TestSubCd->viewAttributes() ?>>
<?php echo $view_lab_service_sub->TestSubCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->Method->Visible) { // Method ?>
		<td<?php echo $view_lab_service_sub->Method->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCnt ?>_view_lab_service_sub_Method" class="view_lab_service_sub_Method">
<span<?php echo $view_lab_service_sub->Method->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->Order->Visible) { // Order ?>
		<td<?php echo $view_lab_service_sub->Order->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCnt ?>_view_lab_service_sub_Order" class="view_lab_service_sub_Order">
<span<?php echo $view_lab_service_sub->Order->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->ResType->Visible) { // ResType ?>
		<td<?php echo $view_lab_service_sub->ResType->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCnt ?>_view_lab_service_sub_ResType" class="view_lab_service_sub_ResType">
<span<?php echo $view_lab_service_sub->ResType->viewAttributes() ?>>
<?php echo $view_lab_service_sub->ResType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->UnitCD->Visible) { // UnitCD ?>
		<td<?php echo $view_lab_service_sub->UnitCD->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCnt ?>_view_lab_service_sub_UnitCD" class="view_lab_service_sub_UnitCD">
<span<?php echo $view_lab_service_sub->UnitCD->viewAttributes() ?>>
<?php echo $view_lab_service_sub->UnitCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->Sample->Visible) { // Sample ?>
		<td<?php echo $view_lab_service_sub->Sample->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCnt ?>_view_lab_service_sub_Sample" class="view_lab_service_sub_Sample">
<span<?php echo $view_lab_service_sub->Sample->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Sample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->NoD->Visible) { // NoD ?>
		<td<?php echo $view_lab_service_sub->NoD->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCnt ?>_view_lab_service_sub_NoD" class="view_lab_service_sub_NoD">
<span<?php echo $view_lab_service_sub->NoD->viewAttributes() ?>>
<?php echo $view_lab_service_sub->NoD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->BillOrder->Visible) { // BillOrder ?>
		<td<?php echo $view_lab_service_sub->BillOrder->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCnt ?>_view_lab_service_sub_BillOrder" class="view_lab_service_sub_BillOrder">
<span<?php echo $view_lab_service_sub->BillOrder->viewAttributes() ?>>
<?php echo $view_lab_service_sub->BillOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->Formula->Visible) { // Formula ?>
		<td<?php echo $view_lab_service_sub->Formula->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCnt ?>_view_lab_service_sub_Formula" class="view_lab_service_sub_Formula">
<span<?php echo $view_lab_service_sub->Formula->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Formula->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->Inactive->Visible) { // Inactive ?>
		<td<?php echo $view_lab_service_sub->Inactive->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCnt ?>_view_lab_service_sub_Inactive" class="view_lab_service_sub_Inactive">
<span<?php echo $view_lab_service_sub->Inactive->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Inactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->Outsource->Visible) { // Outsource ?>
		<td<?php echo $view_lab_service_sub->Outsource->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCnt ?>_view_lab_service_sub_Outsource" class="view_lab_service_sub_Outsource">
<span<?php echo $view_lab_service_sub->Outsource->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Outsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_sub->CollSample->Visible) { // CollSample ?>
		<td<?php echo $view_lab_service_sub->CollSample->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_delete->RowCnt ?>_view_lab_service_sub_CollSample" class="view_lab_service_sub_CollSample">
<span<?php echo $view_lab_service_sub->CollSample->viewAttributes() ?>>
<?php echo $view_lab_service_sub->CollSample->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_lab_service_sub_delete->terminate();
?>