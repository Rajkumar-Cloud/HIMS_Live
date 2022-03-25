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
$mas_services_billing_delete = new mas_services_billing_delete();

// Run the page
$mas_services_billing_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_services_billing_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_services_billingdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmas_services_billingdelete = currentForm = new ew.Form("fmas_services_billingdelete", "delete");
	loadjs.done("fmas_services_billingdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_services_billing_delete->showPageHeader(); ?>
<?php
$mas_services_billing_delete->showMessage();
?>
<form name="fmas_services_billingdelete" id="fmas_services_billingdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_services_billing">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_services_billing_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_services_billing_delete->Id->Visible) { // Id ?>
		<th class="<?php echo $mas_services_billing_delete->Id->headerCellClass() ?>"><span id="elh_mas_services_billing_Id" class="mas_services_billing_Id"><?php echo $mas_services_billing_delete->Id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->CODE->Visible) { // CODE ?>
		<th class="<?php echo $mas_services_billing_delete->CODE->headerCellClass() ?>"><span id="elh_mas_services_billing_CODE" class="mas_services_billing_CODE"><?php echo $mas_services_billing_delete->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->SERVICE->Visible) { // SERVICE ?>
		<th class="<?php echo $mas_services_billing_delete->SERVICE->headerCellClass() ?>"><span id="elh_mas_services_billing_SERVICE" class="mas_services_billing_SERVICE"><?php echo $mas_services_billing_delete->SERVICE->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->UNITS->Visible) { // UNITS ?>
		<th class="<?php echo $mas_services_billing_delete->UNITS->headerCellClass() ?>"><span id="elh_mas_services_billing_UNITS" class="mas_services_billing_UNITS"><?php echo $mas_services_billing_delete->UNITS->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->AMOUNT->Visible) { // AMOUNT ?>
		<th class="<?php echo $mas_services_billing_delete->AMOUNT->headerCellClass() ?>"><span id="elh_mas_services_billing_AMOUNT" class="mas_services_billing_AMOUNT"><?php echo $mas_services_billing_delete->AMOUNT->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<th class="<?php echo $mas_services_billing_delete->SERVICE_TYPE->headerCellClass() ?>"><span id="elh_mas_services_billing_SERVICE_TYPE" class="mas_services_billing_SERVICE_TYPE"><?php echo $mas_services_billing_delete->SERVICE_TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<th class="<?php echo $mas_services_billing_delete->DEPARTMENT->headerCellClass() ?>"><span id="elh_mas_services_billing_DEPARTMENT" class="mas_services_billing_DEPARTMENT"><?php echo $mas_services_billing_delete->DEPARTMENT->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<th class="<?php echo $mas_services_billing_delete->mas_services_billingcol->headerCellClass() ?>"><span id="elh_mas_services_billing_mas_services_billingcol" class="mas_services_billing_mas_services_billingcol"><?php echo $mas_services_billing_delete->mas_services_billingcol->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->DrShareAmount->Visible) { // DrShareAmount ?>
		<th class="<?php echo $mas_services_billing_delete->DrShareAmount->headerCellClass() ?>"><span id="elh_mas_services_billing_DrShareAmount" class="mas_services_billing_DrShareAmount"><?php echo $mas_services_billing_delete->DrShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->HospShareAmount->Visible) { // HospShareAmount ?>
		<th class="<?php echo $mas_services_billing_delete->HospShareAmount->headerCellClass() ?>"><span id="elh_mas_services_billing_HospShareAmount" class="mas_services_billing_HospShareAmount"><?php echo $mas_services_billing_delete->HospShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->DrSharePer->Visible) { // DrSharePer ?>
		<th class="<?php echo $mas_services_billing_delete->DrSharePer->headerCellClass() ?>"><span id="elh_mas_services_billing_DrSharePer" class="mas_services_billing_DrSharePer"><?php echo $mas_services_billing_delete->DrSharePer->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->HospSharePer->Visible) { // HospSharePer ?>
		<th class="<?php echo $mas_services_billing_delete->HospSharePer->headerCellClass() ?>"><span id="elh_mas_services_billing_HospSharePer" class="mas_services_billing_HospSharePer"><?php echo $mas_services_billing_delete->HospSharePer->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $mas_services_billing_delete->HospID->headerCellClass() ?>"><span id="elh_mas_services_billing_HospID" class="mas_services_billing_HospID"><?php echo $mas_services_billing_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->TestSubCd->Visible) { // TestSubCd ?>
		<th class="<?php echo $mas_services_billing_delete->TestSubCd->headerCellClass() ?>"><span id="elh_mas_services_billing_TestSubCd" class="mas_services_billing_TestSubCd"><?php echo $mas_services_billing_delete->TestSubCd->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->Method->Visible) { // Method ?>
		<th class="<?php echo $mas_services_billing_delete->Method->headerCellClass() ?>"><span id="elh_mas_services_billing_Method" class="mas_services_billing_Method"><?php echo $mas_services_billing_delete->Method->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->Order->Visible) { // Order ?>
		<th class="<?php echo $mas_services_billing_delete->Order->headerCellClass() ?>"><span id="elh_mas_services_billing_Order" class="mas_services_billing_Order"><?php echo $mas_services_billing_delete->Order->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->ResType->Visible) { // ResType ?>
		<th class="<?php echo $mas_services_billing_delete->ResType->headerCellClass() ?>"><span id="elh_mas_services_billing_ResType" class="mas_services_billing_ResType"><?php echo $mas_services_billing_delete->ResType->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->UnitCD->Visible) { // UnitCD ?>
		<th class="<?php echo $mas_services_billing_delete->UnitCD->headerCellClass() ?>"><span id="elh_mas_services_billing_UnitCD" class="mas_services_billing_UnitCD"><?php echo $mas_services_billing_delete->UnitCD->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->Sample->Visible) { // Sample ?>
		<th class="<?php echo $mas_services_billing_delete->Sample->headerCellClass() ?>"><span id="elh_mas_services_billing_Sample" class="mas_services_billing_Sample"><?php echo $mas_services_billing_delete->Sample->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->NoD->Visible) { // NoD ?>
		<th class="<?php echo $mas_services_billing_delete->NoD->headerCellClass() ?>"><span id="elh_mas_services_billing_NoD" class="mas_services_billing_NoD"><?php echo $mas_services_billing_delete->NoD->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->BillOrder->Visible) { // BillOrder ?>
		<th class="<?php echo $mas_services_billing_delete->BillOrder->headerCellClass() ?>"><span id="elh_mas_services_billing_BillOrder" class="mas_services_billing_BillOrder"><?php echo $mas_services_billing_delete->BillOrder->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->Inactive->Visible) { // Inactive ?>
		<th class="<?php echo $mas_services_billing_delete->Inactive->headerCellClass() ?>"><span id="elh_mas_services_billing_Inactive" class="mas_services_billing_Inactive"><?php echo $mas_services_billing_delete->Inactive->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->Outsource->Visible) { // Outsource ?>
		<th class="<?php echo $mas_services_billing_delete->Outsource->headerCellClass() ?>"><span id="elh_mas_services_billing_Outsource" class="mas_services_billing_Outsource"><?php echo $mas_services_billing_delete->Outsource->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->CollSample->Visible) { // CollSample ?>
		<th class="<?php echo $mas_services_billing_delete->CollSample->headerCellClass() ?>"><span id="elh_mas_services_billing_CollSample" class="mas_services_billing_CollSample"><?php echo $mas_services_billing_delete->CollSample->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->TestType->Visible) { // TestType ?>
		<th class="<?php echo $mas_services_billing_delete->TestType->headerCellClass() ?>"><span id="elh_mas_services_billing_TestType" class="mas_services_billing_TestType"><?php echo $mas_services_billing_delete->TestType->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->NoHeading->Visible) { // NoHeading ?>
		<th class="<?php echo $mas_services_billing_delete->NoHeading->headerCellClass() ?>"><span id="elh_mas_services_billing_NoHeading" class="mas_services_billing_NoHeading"><?php echo $mas_services_billing_delete->NoHeading->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->ChemicalCode->Visible) { // ChemicalCode ?>
		<th class="<?php echo $mas_services_billing_delete->ChemicalCode->headerCellClass() ?>"><span id="elh_mas_services_billing_ChemicalCode" class="mas_services_billing_ChemicalCode"><?php echo $mas_services_billing_delete->ChemicalCode->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->ChemicalName->Visible) { // ChemicalName ?>
		<th class="<?php echo $mas_services_billing_delete->ChemicalName->headerCellClass() ?>"><span id="elh_mas_services_billing_ChemicalName" class="mas_services_billing_ChemicalName"><?php echo $mas_services_billing_delete->ChemicalName->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing_delete->Utilaization->Visible) { // Utilaization ?>
		<th class="<?php echo $mas_services_billing_delete->Utilaization->headerCellClass() ?>"><span id="elh_mas_services_billing_Utilaization" class="mas_services_billing_Utilaization"><?php echo $mas_services_billing_delete->Utilaization->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_services_billing_delete->RecordCount = 0;
$i = 0;
while (!$mas_services_billing_delete->Recordset->EOF) {
	$mas_services_billing_delete->RecordCount++;
	$mas_services_billing_delete->RowCount++;

	// Set row properties
	$mas_services_billing->resetAttributes();
	$mas_services_billing->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_services_billing_delete->loadRowValues($mas_services_billing_delete->Recordset);

	// Render row
	$mas_services_billing_delete->renderRow();
?>
	<tr <?php echo $mas_services_billing->rowAttributes() ?>>
<?php if ($mas_services_billing_delete->Id->Visible) { // Id ?>
		<td <?php echo $mas_services_billing_delete->Id->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_Id" class="mas_services_billing_Id">
<span<?php echo $mas_services_billing_delete->Id->viewAttributes() ?>><?php echo $mas_services_billing_delete->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->CODE->Visible) { // CODE ?>
		<td <?php echo $mas_services_billing_delete->CODE->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_CODE" class="mas_services_billing_CODE">
<span<?php echo $mas_services_billing_delete->CODE->viewAttributes() ?>><?php echo $mas_services_billing_delete->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->SERVICE->Visible) { // SERVICE ?>
		<td <?php echo $mas_services_billing_delete->SERVICE->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_SERVICE" class="mas_services_billing_SERVICE">
<span<?php echo $mas_services_billing_delete->SERVICE->viewAttributes() ?>><?php echo $mas_services_billing_delete->SERVICE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->UNITS->Visible) { // UNITS ?>
		<td <?php echo $mas_services_billing_delete->UNITS->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_UNITS" class="mas_services_billing_UNITS">
<span<?php echo $mas_services_billing_delete->UNITS->viewAttributes() ?>><?php echo $mas_services_billing_delete->UNITS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->AMOUNT->Visible) { // AMOUNT ?>
		<td <?php echo $mas_services_billing_delete->AMOUNT->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_AMOUNT" class="mas_services_billing_AMOUNT">
<span<?php echo $mas_services_billing_delete->AMOUNT->viewAttributes() ?>><?php echo $mas_services_billing_delete->AMOUNT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td <?php echo $mas_services_billing_delete->SERVICE_TYPE->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_SERVICE_TYPE" class="mas_services_billing_SERVICE_TYPE">
<span<?php echo $mas_services_billing_delete->SERVICE_TYPE->viewAttributes() ?>><?php echo $mas_services_billing_delete->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td <?php echo $mas_services_billing_delete->DEPARTMENT->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_DEPARTMENT" class="mas_services_billing_DEPARTMENT">
<span<?php echo $mas_services_billing_delete->DEPARTMENT->viewAttributes() ?>><?php echo $mas_services_billing_delete->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<td <?php echo $mas_services_billing_delete->mas_services_billingcol->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_mas_services_billingcol" class="mas_services_billing_mas_services_billingcol">
<span<?php echo $mas_services_billing_delete->mas_services_billingcol->viewAttributes() ?>><?php echo $mas_services_billing_delete->mas_services_billingcol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->DrShareAmount->Visible) { // DrShareAmount ?>
		<td <?php echo $mas_services_billing_delete->DrShareAmount->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_DrShareAmount" class="mas_services_billing_DrShareAmount">
<span<?php echo $mas_services_billing_delete->DrShareAmount->viewAttributes() ?>><?php echo $mas_services_billing_delete->DrShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->HospShareAmount->Visible) { // HospShareAmount ?>
		<td <?php echo $mas_services_billing_delete->HospShareAmount->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_HospShareAmount" class="mas_services_billing_HospShareAmount">
<span<?php echo $mas_services_billing_delete->HospShareAmount->viewAttributes() ?>><?php echo $mas_services_billing_delete->HospShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->DrSharePer->Visible) { // DrSharePer ?>
		<td <?php echo $mas_services_billing_delete->DrSharePer->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_DrSharePer" class="mas_services_billing_DrSharePer">
<span<?php echo $mas_services_billing_delete->DrSharePer->viewAttributes() ?>><?php echo $mas_services_billing_delete->DrSharePer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->HospSharePer->Visible) { // HospSharePer ?>
		<td <?php echo $mas_services_billing_delete->HospSharePer->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_HospSharePer" class="mas_services_billing_HospSharePer">
<span<?php echo $mas_services_billing_delete->HospSharePer->viewAttributes() ?>><?php echo $mas_services_billing_delete->HospSharePer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $mas_services_billing_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_HospID" class="mas_services_billing_HospID">
<span<?php echo $mas_services_billing_delete->HospID->viewAttributes() ?>><?php echo $mas_services_billing_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->TestSubCd->Visible) { // TestSubCd ?>
		<td <?php echo $mas_services_billing_delete->TestSubCd->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_TestSubCd" class="mas_services_billing_TestSubCd">
<span<?php echo $mas_services_billing_delete->TestSubCd->viewAttributes() ?>><?php echo $mas_services_billing_delete->TestSubCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->Method->Visible) { // Method ?>
		<td <?php echo $mas_services_billing_delete->Method->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_Method" class="mas_services_billing_Method">
<span<?php echo $mas_services_billing_delete->Method->viewAttributes() ?>><?php echo $mas_services_billing_delete->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->Order->Visible) { // Order ?>
		<td <?php echo $mas_services_billing_delete->Order->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_Order" class="mas_services_billing_Order">
<span<?php echo $mas_services_billing_delete->Order->viewAttributes() ?>><?php echo $mas_services_billing_delete->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->ResType->Visible) { // ResType ?>
		<td <?php echo $mas_services_billing_delete->ResType->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_ResType" class="mas_services_billing_ResType">
<span<?php echo $mas_services_billing_delete->ResType->viewAttributes() ?>><?php echo $mas_services_billing_delete->ResType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->UnitCD->Visible) { // UnitCD ?>
		<td <?php echo $mas_services_billing_delete->UnitCD->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_UnitCD" class="mas_services_billing_UnitCD">
<span<?php echo $mas_services_billing_delete->UnitCD->viewAttributes() ?>><?php echo $mas_services_billing_delete->UnitCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->Sample->Visible) { // Sample ?>
		<td <?php echo $mas_services_billing_delete->Sample->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_Sample" class="mas_services_billing_Sample">
<span<?php echo $mas_services_billing_delete->Sample->viewAttributes() ?>><?php echo $mas_services_billing_delete->Sample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->NoD->Visible) { // NoD ?>
		<td <?php echo $mas_services_billing_delete->NoD->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_NoD" class="mas_services_billing_NoD">
<span<?php echo $mas_services_billing_delete->NoD->viewAttributes() ?>><?php echo $mas_services_billing_delete->NoD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->BillOrder->Visible) { // BillOrder ?>
		<td <?php echo $mas_services_billing_delete->BillOrder->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_BillOrder" class="mas_services_billing_BillOrder">
<span<?php echo $mas_services_billing_delete->BillOrder->viewAttributes() ?>><?php echo $mas_services_billing_delete->BillOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->Inactive->Visible) { // Inactive ?>
		<td <?php echo $mas_services_billing_delete->Inactive->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_Inactive" class="mas_services_billing_Inactive">
<span<?php echo $mas_services_billing_delete->Inactive->viewAttributes() ?>><?php echo $mas_services_billing_delete->Inactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->Outsource->Visible) { // Outsource ?>
		<td <?php echo $mas_services_billing_delete->Outsource->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_Outsource" class="mas_services_billing_Outsource">
<span<?php echo $mas_services_billing_delete->Outsource->viewAttributes() ?>><?php echo $mas_services_billing_delete->Outsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->CollSample->Visible) { // CollSample ?>
		<td <?php echo $mas_services_billing_delete->CollSample->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_CollSample" class="mas_services_billing_CollSample">
<span<?php echo $mas_services_billing_delete->CollSample->viewAttributes() ?>><?php echo $mas_services_billing_delete->CollSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->TestType->Visible) { // TestType ?>
		<td <?php echo $mas_services_billing_delete->TestType->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_TestType" class="mas_services_billing_TestType">
<span<?php echo $mas_services_billing_delete->TestType->viewAttributes() ?>><?php echo $mas_services_billing_delete->TestType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->NoHeading->Visible) { // NoHeading ?>
		<td <?php echo $mas_services_billing_delete->NoHeading->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_NoHeading" class="mas_services_billing_NoHeading">
<span<?php echo $mas_services_billing_delete->NoHeading->viewAttributes() ?>><?php echo $mas_services_billing_delete->NoHeading->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->ChemicalCode->Visible) { // ChemicalCode ?>
		<td <?php echo $mas_services_billing_delete->ChemicalCode->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_ChemicalCode" class="mas_services_billing_ChemicalCode">
<span<?php echo $mas_services_billing_delete->ChemicalCode->viewAttributes() ?>><?php echo $mas_services_billing_delete->ChemicalCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->ChemicalName->Visible) { // ChemicalName ?>
		<td <?php echo $mas_services_billing_delete->ChemicalName->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_ChemicalName" class="mas_services_billing_ChemicalName">
<span<?php echo $mas_services_billing_delete->ChemicalName->viewAttributes() ?>><?php echo $mas_services_billing_delete->ChemicalName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing_delete->Utilaization->Visible) { // Utilaization ?>
		<td <?php echo $mas_services_billing_delete->Utilaization->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCount ?>_mas_services_billing_Utilaization" class="mas_services_billing_Utilaization">
<span<?php echo $mas_services_billing_delete->Utilaization->viewAttributes() ?>><?php echo $mas_services_billing_delete->Utilaization->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_services_billing_delete->Recordset->moveNext();
}
$mas_services_billing_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_services_billing_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_services_billing_delete->showPageFooter();
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
$mas_services_billing_delete->terminate();
?>