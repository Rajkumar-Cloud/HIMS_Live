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
$view_lab_service_delete = new view_lab_service_delete();

// Run the page
$view_lab_service_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_service_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_lab_servicedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fview_lab_servicedelete = currentForm = new ew.Form("fview_lab_servicedelete", "delete");
	loadjs.done("fview_lab_servicedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_lab_service_delete->showPageHeader(); ?>
<?php
$view_lab_service_delete->showMessage();
?>
<form name="fview_lab_servicedelete" id="fview_lab_servicedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_service">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_lab_service_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_lab_service_delete->Id->Visible) { // Id ?>
		<th class="<?php echo $view_lab_service_delete->Id->headerCellClass() ?>"><span id="elh_view_lab_service_Id" class="view_lab_service_Id"><?php echo $view_lab_service_delete->Id->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->CODE->Visible) { // CODE ?>
		<th class="<?php echo $view_lab_service_delete->CODE->headerCellClass() ?>"><span id="elh_view_lab_service_CODE" class="view_lab_service_CODE"><?php echo $view_lab_service_delete->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->SERVICE->Visible) { // SERVICE ?>
		<th class="<?php echo $view_lab_service_delete->SERVICE->headerCellClass() ?>"><span id="elh_view_lab_service_SERVICE" class="view_lab_service_SERVICE"><?php echo $view_lab_service_delete->SERVICE->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->UNITS->Visible) { // UNITS ?>
		<th class="<?php echo $view_lab_service_delete->UNITS->headerCellClass() ?>"><span id="elh_view_lab_service_UNITS" class="view_lab_service_UNITS"><?php echo $view_lab_service_delete->UNITS->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->AMOUNT->Visible) { // AMOUNT ?>
		<th class="<?php echo $view_lab_service_delete->AMOUNT->headerCellClass() ?>"><span id="elh_view_lab_service_AMOUNT" class="view_lab_service_AMOUNT"><?php echo $view_lab_service_delete->AMOUNT->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<th class="<?php echo $view_lab_service_delete->SERVICE_TYPE->headerCellClass() ?>"><span id="elh_view_lab_service_SERVICE_TYPE" class="view_lab_service_SERVICE_TYPE"><?php echo $view_lab_service_delete->SERVICE_TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<th class="<?php echo $view_lab_service_delete->DEPARTMENT->headerCellClass() ?>"><span id="elh_view_lab_service_DEPARTMENT" class="view_lab_service_DEPARTMENT"><?php echo $view_lab_service_delete->DEPARTMENT->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<th class="<?php echo $view_lab_service_delete->mas_services_billingcol->headerCellClass() ?>"><span id="elh_view_lab_service_mas_services_billingcol" class="view_lab_service_mas_services_billingcol"><?php echo $view_lab_service_delete->mas_services_billingcol->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->DrShareAmount->Visible) { // DrShareAmount ?>
		<th class="<?php echo $view_lab_service_delete->DrShareAmount->headerCellClass() ?>"><span id="elh_view_lab_service_DrShareAmount" class="view_lab_service_DrShareAmount"><?php echo $view_lab_service_delete->DrShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->HospShareAmount->Visible) { // HospShareAmount ?>
		<th class="<?php echo $view_lab_service_delete->HospShareAmount->headerCellClass() ?>"><span id="elh_view_lab_service_HospShareAmount" class="view_lab_service_HospShareAmount"><?php echo $view_lab_service_delete->HospShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->DrSharePer->Visible) { // DrSharePer ?>
		<th class="<?php echo $view_lab_service_delete->DrSharePer->headerCellClass() ?>"><span id="elh_view_lab_service_DrSharePer" class="view_lab_service_DrSharePer"><?php echo $view_lab_service_delete->DrSharePer->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->HospSharePer->Visible) { // HospSharePer ?>
		<th class="<?php echo $view_lab_service_delete->HospSharePer->headerCellClass() ?>"><span id="elh_view_lab_service_HospSharePer" class="view_lab_service_HospSharePer"><?php echo $view_lab_service_delete->HospSharePer->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $view_lab_service_delete->HospID->headerCellClass() ?>"><span id="elh_view_lab_service_HospID" class="view_lab_service_HospID"><?php echo $view_lab_service_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->TestSubCd->Visible) { // TestSubCd ?>
		<th class="<?php echo $view_lab_service_delete->TestSubCd->headerCellClass() ?>"><span id="elh_view_lab_service_TestSubCd" class="view_lab_service_TestSubCd"><?php echo $view_lab_service_delete->TestSubCd->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->Method->Visible) { // Method ?>
		<th class="<?php echo $view_lab_service_delete->Method->headerCellClass() ?>"><span id="elh_view_lab_service_Method" class="view_lab_service_Method"><?php echo $view_lab_service_delete->Method->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->Order->Visible) { // Order ?>
		<th class="<?php echo $view_lab_service_delete->Order->headerCellClass() ?>"><span id="elh_view_lab_service_Order" class="view_lab_service_Order"><?php echo $view_lab_service_delete->Order->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->ResType->Visible) { // ResType ?>
		<th class="<?php echo $view_lab_service_delete->ResType->headerCellClass() ?>"><span id="elh_view_lab_service_ResType" class="view_lab_service_ResType"><?php echo $view_lab_service_delete->ResType->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->UnitCD->Visible) { // UnitCD ?>
		<th class="<?php echo $view_lab_service_delete->UnitCD->headerCellClass() ?>"><span id="elh_view_lab_service_UnitCD" class="view_lab_service_UnitCD"><?php echo $view_lab_service_delete->UnitCD->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->Sample->Visible) { // Sample ?>
		<th class="<?php echo $view_lab_service_delete->Sample->headerCellClass() ?>"><span id="elh_view_lab_service_Sample" class="view_lab_service_Sample"><?php echo $view_lab_service_delete->Sample->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->NoD->Visible) { // NoD ?>
		<th class="<?php echo $view_lab_service_delete->NoD->headerCellClass() ?>"><span id="elh_view_lab_service_NoD" class="view_lab_service_NoD"><?php echo $view_lab_service_delete->NoD->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->BillOrder->Visible) { // BillOrder ?>
		<th class="<?php echo $view_lab_service_delete->BillOrder->headerCellClass() ?>"><span id="elh_view_lab_service_BillOrder" class="view_lab_service_BillOrder"><?php echo $view_lab_service_delete->BillOrder->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->Inactive->Visible) { // Inactive ?>
		<th class="<?php echo $view_lab_service_delete->Inactive->headerCellClass() ?>"><span id="elh_view_lab_service_Inactive" class="view_lab_service_Inactive"><?php echo $view_lab_service_delete->Inactive->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->Outsource->Visible) { // Outsource ?>
		<th class="<?php echo $view_lab_service_delete->Outsource->headerCellClass() ?>"><span id="elh_view_lab_service_Outsource" class="view_lab_service_Outsource"><?php echo $view_lab_service_delete->Outsource->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->CollSample->Visible) { // CollSample ?>
		<th class="<?php echo $view_lab_service_delete->CollSample->headerCellClass() ?>"><span id="elh_view_lab_service_CollSample" class="view_lab_service_CollSample"><?php echo $view_lab_service_delete->CollSample->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->TestType->Visible) { // TestType ?>
		<th class="<?php echo $view_lab_service_delete->TestType->headerCellClass() ?>"><span id="elh_view_lab_service_TestType" class="view_lab_service_TestType"><?php echo $view_lab_service_delete->TestType->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->NoHeading->Visible) { // NoHeading ?>
		<th class="<?php echo $view_lab_service_delete->NoHeading->headerCellClass() ?>"><span id="elh_view_lab_service_NoHeading" class="view_lab_service_NoHeading"><?php echo $view_lab_service_delete->NoHeading->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->ChemicalCode->Visible) { // ChemicalCode ?>
		<th class="<?php echo $view_lab_service_delete->ChemicalCode->headerCellClass() ?>"><span id="elh_view_lab_service_ChemicalCode" class="view_lab_service_ChemicalCode"><?php echo $view_lab_service_delete->ChemicalCode->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->ChemicalName->Visible) { // ChemicalName ?>
		<th class="<?php echo $view_lab_service_delete->ChemicalName->headerCellClass() ?>"><span id="elh_view_lab_service_ChemicalName" class="view_lab_service_ChemicalName"><?php echo $view_lab_service_delete->ChemicalName->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service_delete->Utilaization->Visible) { // Utilaization ?>
		<th class="<?php echo $view_lab_service_delete->Utilaization->headerCellClass() ?>"><span id="elh_view_lab_service_Utilaization" class="view_lab_service_Utilaization"><?php echo $view_lab_service_delete->Utilaization->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_lab_service_delete->RecordCount = 0;
$i = 0;
while (!$view_lab_service_delete->Recordset->EOF) {
	$view_lab_service_delete->RecordCount++;
	$view_lab_service_delete->RowCount++;

	// Set row properties
	$view_lab_service->resetAttributes();
	$view_lab_service->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_lab_service_delete->loadRowValues($view_lab_service_delete->Recordset);

	// Render row
	$view_lab_service_delete->renderRow();
?>
	<tr <?php echo $view_lab_service->rowAttributes() ?>>
<?php if ($view_lab_service_delete->Id->Visible) { // Id ?>
		<td <?php echo $view_lab_service_delete->Id->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_Id" class="view_lab_service_Id">
<span<?php echo $view_lab_service_delete->Id->viewAttributes() ?>><?php echo $view_lab_service_delete->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->CODE->Visible) { // CODE ?>
		<td <?php echo $view_lab_service_delete->CODE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_CODE" class="view_lab_service_CODE">
<span<?php echo $view_lab_service_delete->CODE->viewAttributes() ?>><?php echo $view_lab_service_delete->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->SERVICE->Visible) { // SERVICE ?>
		<td <?php echo $view_lab_service_delete->SERVICE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_SERVICE" class="view_lab_service_SERVICE">
<span<?php echo $view_lab_service_delete->SERVICE->viewAttributes() ?>><?php echo $view_lab_service_delete->SERVICE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->UNITS->Visible) { // UNITS ?>
		<td <?php echo $view_lab_service_delete->UNITS->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_UNITS" class="view_lab_service_UNITS">
<span<?php echo $view_lab_service_delete->UNITS->viewAttributes() ?>><?php echo $view_lab_service_delete->UNITS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->AMOUNT->Visible) { // AMOUNT ?>
		<td <?php echo $view_lab_service_delete->AMOUNT->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_AMOUNT" class="view_lab_service_AMOUNT">
<span<?php echo $view_lab_service_delete->AMOUNT->viewAttributes() ?>><?php echo $view_lab_service_delete->AMOUNT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td <?php echo $view_lab_service_delete->SERVICE_TYPE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_SERVICE_TYPE" class="view_lab_service_SERVICE_TYPE">
<span<?php echo $view_lab_service_delete->SERVICE_TYPE->viewAttributes() ?>><?php echo $view_lab_service_delete->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td <?php echo $view_lab_service_delete->DEPARTMENT->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_DEPARTMENT" class="view_lab_service_DEPARTMENT">
<span<?php echo $view_lab_service_delete->DEPARTMENT->viewAttributes() ?>><?php echo $view_lab_service_delete->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<td <?php echo $view_lab_service_delete->mas_services_billingcol->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_mas_services_billingcol" class="view_lab_service_mas_services_billingcol">
<span<?php echo $view_lab_service_delete->mas_services_billingcol->viewAttributes() ?>><?php echo $view_lab_service_delete->mas_services_billingcol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->DrShareAmount->Visible) { // DrShareAmount ?>
		<td <?php echo $view_lab_service_delete->DrShareAmount->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_DrShareAmount" class="view_lab_service_DrShareAmount">
<span<?php echo $view_lab_service_delete->DrShareAmount->viewAttributes() ?>><?php echo $view_lab_service_delete->DrShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->HospShareAmount->Visible) { // HospShareAmount ?>
		<td <?php echo $view_lab_service_delete->HospShareAmount->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_HospShareAmount" class="view_lab_service_HospShareAmount">
<span<?php echo $view_lab_service_delete->HospShareAmount->viewAttributes() ?>><?php echo $view_lab_service_delete->HospShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->DrSharePer->Visible) { // DrSharePer ?>
		<td <?php echo $view_lab_service_delete->DrSharePer->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_DrSharePer" class="view_lab_service_DrSharePer">
<span<?php echo $view_lab_service_delete->DrSharePer->viewAttributes() ?>><?php echo $view_lab_service_delete->DrSharePer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->HospSharePer->Visible) { // HospSharePer ?>
		<td <?php echo $view_lab_service_delete->HospSharePer->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_HospSharePer" class="view_lab_service_HospSharePer">
<span<?php echo $view_lab_service_delete->HospSharePer->viewAttributes() ?>><?php echo $view_lab_service_delete->HospSharePer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $view_lab_service_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_HospID" class="view_lab_service_HospID">
<span<?php echo $view_lab_service_delete->HospID->viewAttributes() ?>><?php echo $view_lab_service_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->TestSubCd->Visible) { // TestSubCd ?>
		<td <?php echo $view_lab_service_delete->TestSubCd->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_TestSubCd" class="view_lab_service_TestSubCd">
<span<?php echo $view_lab_service_delete->TestSubCd->viewAttributes() ?>><?php echo $view_lab_service_delete->TestSubCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->Method->Visible) { // Method ?>
		<td <?php echo $view_lab_service_delete->Method->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_Method" class="view_lab_service_Method">
<span<?php echo $view_lab_service_delete->Method->viewAttributes() ?>><?php echo $view_lab_service_delete->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->Order->Visible) { // Order ?>
		<td <?php echo $view_lab_service_delete->Order->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_Order" class="view_lab_service_Order">
<span<?php echo $view_lab_service_delete->Order->viewAttributes() ?>><?php echo $view_lab_service_delete->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->ResType->Visible) { // ResType ?>
		<td <?php echo $view_lab_service_delete->ResType->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_ResType" class="view_lab_service_ResType">
<span<?php echo $view_lab_service_delete->ResType->viewAttributes() ?>><?php echo $view_lab_service_delete->ResType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->UnitCD->Visible) { // UnitCD ?>
		<td <?php echo $view_lab_service_delete->UnitCD->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_UnitCD" class="view_lab_service_UnitCD">
<span<?php echo $view_lab_service_delete->UnitCD->viewAttributes() ?>><?php echo $view_lab_service_delete->UnitCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->Sample->Visible) { // Sample ?>
		<td <?php echo $view_lab_service_delete->Sample->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_Sample" class="view_lab_service_Sample">
<span<?php echo $view_lab_service_delete->Sample->viewAttributes() ?>><?php echo $view_lab_service_delete->Sample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->NoD->Visible) { // NoD ?>
		<td <?php echo $view_lab_service_delete->NoD->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_NoD" class="view_lab_service_NoD">
<span<?php echo $view_lab_service_delete->NoD->viewAttributes() ?>><?php echo $view_lab_service_delete->NoD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->BillOrder->Visible) { // BillOrder ?>
		<td <?php echo $view_lab_service_delete->BillOrder->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_BillOrder" class="view_lab_service_BillOrder">
<span<?php echo $view_lab_service_delete->BillOrder->viewAttributes() ?>><?php echo $view_lab_service_delete->BillOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->Inactive->Visible) { // Inactive ?>
		<td <?php echo $view_lab_service_delete->Inactive->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_Inactive" class="view_lab_service_Inactive">
<span<?php echo $view_lab_service_delete->Inactive->viewAttributes() ?>><?php echo $view_lab_service_delete->Inactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->Outsource->Visible) { // Outsource ?>
		<td <?php echo $view_lab_service_delete->Outsource->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_Outsource" class="view_lab_service_Outsource">
<span<?php echo $view_lab_service_delete->Outsource->viewAttributes() ?>><?php echo $view_lab_service_delete->Outsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->CollSample->Visible) { // CollSample ?>
		<td <?php echo $view_lab_service_delete->CollSample->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_CollSample" class="view_lab_service_CollSample">
<span<?php echo $view_lab_service_delete->CollSample->viewAttributes() ?>><?php echo $view_lab_service_delete->CollSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->TestType->Visible) { // TestType ?>
		<td <?php echo $view_lab_service_delete->TestType->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_TestType" class="view_lab_service_TestType">
<span<?php echo $view_lab_service_delete->TestType->viewAttributes() ?>><?php echo $view_lab_service_delete->TestType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->NoHeading->Visible) { // NoHeading ?>
		<td <?php echo $view_lab_service_delete->NoHeading->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_NoHeading" class="view_lab_service_NoHeading">
<span<?php echo $view_lab_service_delete->NoHeading->viewAttributes() ?>><?php echo $view_lab_service_delete->NoHeading->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->ChemicalCode->Visible) { // ChemicalCode ?>
		<td <?php echo $view_lab_service_delete->ChemicalCode->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_ChemicalCode" class="view_lab_service_ChemicalCode">
<span<?php echo $view_lab_service_delete->ChemicalCode->viewAttributes() ?>><?php echo $view_lab_service_delete->ChemicalCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->ChemicalName->Visible) { // ChemicalName ?>
		<td <?php echo $view_lab_service_delete->ChemicalName->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_ChemicalName" class="view_lab_service_ChemicalName">
<span<?php echo $view_lab_service_delete->ChemicalName->viewAttributes() ?>><?php echo $view_lab_service_delete->ChemicalName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service_delete->Utilaization->Visible) { // Utilaization ?>
		<td <?php echo $view_lab_service_delete->Utilaization->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCount ?>_view_lab_service_Utilaization" class="view_lab_service_Utilaization">
<span<?php echo $view_lab_service_delete->Utilaization->viewAttributes() ?>><?php echo $view_lab_service_delete->Utilaization->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_lab_service_delete->Recordset->moveNext();
}
$view_lab_service_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_lab_service_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_lab_service_delete->showPageFooter();
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
$view_lab_service_delete->terminate();
?>