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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fview_lab_servicedelete = currentForm = new ew.Form("fview_lab_servicedelete", "delete");

// Form_CustomValidate event
fview_lab_servicedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_servicedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_servicedelete.lists["x_UNITS"] = <?php echo $view_lab_service_delete->UNITS->Lookup->toClientList() ?>;
fview_lab_servicedelete.lists["x_UNITS"].options = <?php echo JsonEncode($view_lab_service_delete->UNITS->lookupOptions()) ?>;
fview_lab_servicedelete.lists["x_SERVICE_TYPE"] = <?php echo $view_lab_service_delete->SERVICE_TYPE->Lookup->toClientList() ?>;
fview_lab_servicedelete.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($view_lab_service_delete->SERVICE_TYPE->lookupOptions()) ?>;
fview_lab_servicedelete.lists["x_DEPARTMENT"] = <?php echo $view_lab_service_delete->DEPARTMENT->Lookup->toClientList() ?>;
fview_lab_servicedelete.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($view_lab_service_delete->DEPARTMENT->options(FALSE, TRUE)) ?>;
fview_lab_servicedelete.lists["x_Inactive[]"] = <?php echo $view_lab_service_delete->Inactive->Lookup->toClientList() ?>;
fview_lab_servicedelete.lists["x_Inactive[]"].options = <?php echo JsonEncode($view_lab_service_delete->Inactive->options(FALSE, TRUE)) ?>;
fview_lab_servicedelete.lists["x_TestType"] = <?php echo $view_lab_service_delete->TestType->Lookup->toClientList() ?>;
fview_lab_servicedelete.lists["x_TestType"].options = <?php echo JsonEncode($view_lab_service_delete->TestType->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_lab_service_delete->showPageHeader(); ?>
<?php
$view_lab_service_delete->showMessage();
?>
<form name="fview_lab_servicedelete" id="fview_lab_servicedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_service_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_service_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_service">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_lab_service_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_lab_service->Id->Visible) { // Id ?>
		<th class="<?php echo $view_lab_service->Id->headerCellClass() ?>"><span id="elh_view_lab_service_Id" class="view_lab_service_Id"><?php echo $view_lab_service->Id->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->CODE->Visible) { // CODE ?>
		<th class="<?php echo $view_lab_service->CODE->headerCellClass() ?>"><span id="elh_view_lab_service_CODE" class="view_lab_service_CODE"><?php echo $view_lab_service->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->SERVICE->Visible) { // SERVICE ?>
		<th class="<?php echo $view_lab_service->SERVICE->headerCellClass() ?>"><span id="elh_view_lab_service_SERVICE" class="view_lab_service_SERVICE"><?php echo $view_lab_service->SERVICE->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->UNITS->Visible) { // UNITS ?>
		<th class="<?php echo $view_lab_service->UNITS->headerCellClass() ?>"><span id="elh_view_lab_service_UNITS" class="view_lab_service_UNITS"><?php echo $view_lab_service->UNITS->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->AMOUNT->Visible) { // AMOUNT ?>
		<th class="<?php echo $view_lab_service->AMOUNT->headerCellClass() ?>"><span id="elh_view_lab_service_AMOUNT" class="view_lab_service_AMOUNT"><?php echo $view_lab_service->AMOUNT->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<th class="<?php echo $view_lab_service->SERVICE_TYPE->headerCellClass() ?>"><span id="elh_view_lab_service_SERVICE_TYPE" class="view_lab_service_SERVICE_TYPE"><?php echo $view_lab_service->SERVICE_TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<th class="<?php echo $view_lab_service->DEPARTMENT->headerCellClass() ?>"><span id="elh_view_lab_service_DEPARTMENT" class="view_lab_service_DEPARTMENT"><?php echo $view_lab_service->DEPARTMENT->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<th class="<?php echo $view_lab_service->mas_services_billingcol->headerCellClass() ?>"><span id="elh_view_lab_service_mas_services_billingcol" class="view_lab_service_mas_services_billingcol"><?php echo $view_lab_service->mas_services_billingcol->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->DrShareAmount->Visible) { // DrShareAmount ?>
		<th class="<?php echo $view_lab_service->DrShareAmount->headerCellClass() ?>"><span id="elh_view_lab_service_DrShareAmount" class="view_lab_service_DrShareAmount"><?php echo $view_lab_service->DrShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->HospShareAmount->Visible) { // HospShareAmount ?>
		<th class="<?php echo $view_lab_service->HospShareAmount->headerCellClass() ?>"><span id="elh_view_lab_service_HospShareAmount" class="view_lab_service_HospShareAmount"><?php echo $view_lab_service->HospShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->DrSharePer->Visible) { // DrSharePer ?>
		<th class="<?php echo $view_lab_service->DrSharePer->headerCellClass() ?>"><span id="elh_view_lab_service_DrSharePer" class="view_lab_service_DrSharePer"><?php echo $view_lab_service->DrSharePer->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->HospSharePer->Visible) { // HospSharePer ?>
		<th class="<?php echo $view_lab_service->HospSharePer->headerCellClass() ?>"><span id="elh_view_lab_service_HospSharePer" class="view_lab_service_HospSharePer"><?php echo $view_lab_service->HospSharePer->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->HospID->Visible) { // HospID ?>
		<th class="<?php echo $view_lab_service->HospID->headerCellClass() ?>"><span id="elh_view_lab_service_HospID" class="view_lab_service_HospID"><?php echo $view_lab_service->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->TestSubCd->Visible) { // TestSubCd ?>
		<th class="<?php echo $view_lab_service->TestSubCd->headerCellClass() ?>"><span id="elh_view_lab_service_TestSubCd" class="view_lab_service_TestSubCd"><?php echo $view_lab_service->TestSubCd->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->Method->Visible) { // Method ?>
		<th class="<?php echo $view_lab_service->Method->headerCellClass() ?>"><span id="elh_view_lab_service_Method" class="view_lab_service_Method"><?php echo $view_lab_service->Method->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->Order->Visible) { // Order ?>
		<th class="<?php echo $view_lab_service->Order->headerCellClass() ?>"><span id="elh_view_lab_service_Order" class="view_lab_service_Order"><?php echo $view_lab_service->Order->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->ResType->Visible) { // ResType ?>
		<th class="<?php echo $view_lab_service->ResType->headerCellClass() ?>"><span id="elh_view_lab_service_ResType" class="view_lab_service_ResType"><?php echo $view_lab_service->ResType->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->UnitCD->Visible) { // UnitCD ?>
		<th class="<?php echo $view_lab_service->UnitCD->headerCellClass() ?>"><span id="elh_view_lab_service_UnitCD" class="view_lab_service_UnitCD"><?php echo $view_lab_service->UnitCD->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->Sample->Visible) { // Sample ?>
		<th class="<?php echo $view_lab_service->Sample->headerCellClass() ?>"><span id="elh_view_lab_service_Sample" class="view_lab_service_Sample"><?php echo $view_lab_service->Sample->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->NoD->Visible) { // NoD ?>
		<th class="<?php echo $view_lab_service->NoD->headerCellClass() ?>"><span id="elh_view_lab_service_NoD" class="view_lab_service_NoD"><?php echo $view_lab_service->NoD->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->BillOrder->Visible) { // BillOrder ?>
		<th class="<?php echo $view_lab_service->BillOrder->headerCellClass() ?>"><span id="elh_view_lab_service_BillOrder" class="view_lab_service_BillOrder"><?php echo $view_lab_service->BillOrder->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->Inactive->Visible) { // Inactive ?>
		<th class="<?php echo $view_lab_service->Inactive->headerCellClass() ?>"><span id="elh_view_lab_service_Inactive" class="view_lab_service_Inactive"><?php echo $view_lab_service->Inactive->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->Outsource->Visible) { // Outsource ?>
		<th class="<?php echo $view_lab_service->Outsource->headerCellClass() ?>"><span id="elh_view_lab_service_Outsource" class="view_lab_service_Outsource"><?php echo $view_lab_service->Outsource->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->CollSample->Visible) { // CollSample ?>
		<th class="<?php echo $view_lab_service->CollSample->headerCellClass() ?>"><span id="elh_view_lab_service_CollSample" class="view_lab_service_CollSample"><?php echo $view_lab_service->CollSample->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->TestType->Visible) { // TestType ?>
		<th class="<?php echo $view_lab_service->TestType->headerCellClass() ?>"><span id="elh_view_lab_service_TestType" class="view_lab_service_TestType"><?php echo $view_lab_service->TestType->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->NoHeading->Visible) { // NoHeading ?>
		<th class="<?php echo $view_lab_service->NoHeading->headerCellClass() ?>"><span id="elh_view_lab_service_NoHeading" class="view_lab_service_NoHeading"><?php echo $view_lab_service->NoHeading->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->ChemicalCode->Visible) { // ChemicalCode ?>
		<th class="<?php echo $view_lab_service->ChemicalCode->headerCellClass() ?>"><span id="elh_view_lab_service_ChemicalCode" class="view_lab_service_ChemicalCode"><?php echo $view_lab_service->ChemicalCode->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->ChemicalName->Visible) { // ChemicalName ?>
		<th class="<?php echo $view_lab_service->ChemicalName->headerCellClass() ?>"><span id="elh_view_lab_service_ChemicalName" class="view_lab_service_ChemicalName"><?php echo $view_lab_service->ChemicalName->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_service->Utilaization->Visible) { // Utilaization ?>
		<th class="<?php echo $view_lab_service->Utilaization->headerCellClass() ?>"><span id="elh_view_lab_service_Utilaization" class="view_lab_service_Utilaization"><?php echo $view_lab_service->Utilaization->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_lab_service_delete->RecCnt = 0;
$i = 0;
while (!$view_lab_service_delete->Recordset->EOF) {
	$view_lab_service_delete->RecCnt++;
	$view_lab_service_delete->RowCnt++;

	// Set row properties
	$view_lab_service->resetAttributes();
	$view_lab_service->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_lab_service_delete->loadRowValues($view_lab_service_delete->Recordset);

	// Render row
	$view_lab_service_delete->renderRow();
?>
	<tr<?php echo $view_lab_service->rowAttributes() ?>>
<?php if ($view_lab_service->Id->Visible) { // Id ?>
		<td<?php echo $view_lab_service->Id->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_Id" class="view_lab_service_Id">
<span<?php echo $view_lab_service->Id->viewAttributes() ?>>
<?php echo $view_lab_service->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->CODE->Visible) { // CODE ?>
		<td<?php echo $view_lab_service->CODE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_CODE" class="view_lab_service_CODE">
<span<?php echo $view_lab_service->CODE->viewAttributes() ?>>
<?php echo $view_lab_service->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->SERVICE->Visible) { // SERVICE ?>
		<td<?php echo $view_lab_service->SERVICE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_SERVICE" class="view_lab_service_SERVICE">
<span<?php echo $view_lab_service->SERVICE->viewAttributes() ?>>
<?php echo $view_lab_service->SERVICE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->UNITS->Visible) { // UNITS ?>
		<td<?php echo $view_lab_service->UNITS->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_UNITS" class="view_lab_service_UNITS">
<span<?php echo $view_lab_service->UNITS->viewAttributes() ?>>
<?php echo $view_lab_service->UNITS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->AMOUNT->Visible) { // AMOUNT ?>
		<td<?php echo $view_lab_service->AMOUNT->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_AMOUNT" class="view_lab_service_AMOUNT">
<span<?php echo $view_lab_service->AMOUNT->viewAttributes() ?>>
<?php echo $view_lab_service->AMOUNT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td<?php echo $view_lab_service->SERVICE_TYPE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_SERVICE_TYPE" class="view_lab_service_SERVICE_TYPE">
<span<?php echo $view_lab_service->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $view_lab_service->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td<?php echo $view_lab_service->DEPARTMENT->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_DEPARTMENT" class="view_lab_service_DEPARTMENT">
<span<?php echo $view_lab_service->DEPARTMENT->viewAttributes() ?>>
<?php echo $view_lab_service->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<td<?php echo $view_lab_service->mas_services_billingcol->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_mas_services_billingcol" class="view_lab_service_mas_services_billingcol">
<span<?php echo $view_lab_service->mas_services_billingcol->viewAttributes() ?>>
<?php echo $view_lab_service->mas_services_billingcol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->DrShareAmount->Visible) { // DrShareAmount ?>
		<td<?php echo $view_lab_service->DrShareAmount->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_DrShareAmount" class="view_lab_service_DrShareAmount">
<span<?php echo $view_lab_service->DrShareAmount->viewAttributes() ?>>
<?php echo $view_lab_service->DrShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->HospShareAmount->Visible) { // HospShareAmount ?>
		<td<?php echo $view_lab_service->HospShareAmount->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_HospShareAmount" class="view_lab_service_HospShareAmount">
<span<?php echo $view_lab_service->HospShareAmount->viewAttributes() ?>>
<?php echo $view_lab_service->HospShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->DrSharePer->Visible) { // DrSharePer ?>
		<td<?php echo $view_lab_service->DrSharePer->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_DrSharePer" class="view_lab_service_DrSharePer">
<span<?php echo $view_lab_service->DrSharePer->viewAttributes() ?>>
<?php echo $view_lab_service->DrSharePer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->HospSharePer->Visible) { // HospSharePer ?>
		<td<?php echo $view_lab_service->HospSharePer->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_HospSharePer" class="view_lab_service_HospSharePer">
<span<?php echo $view_lab_service->HospSharePer->viewAttributes() ?>>
<?php echo $view_lab_service->HospSharePer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->HospID->Visible) { // HospID ?>
		<td<?php echo $view_lab_service->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_HospID" class="view_lab_service_HospID">
<span<?php echo $view_lab_service->HospID->viewAttributes() ?>>
<?php echo $view_lab_service->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->TestSubCd->Visible) { // TestSubCd ?>
		<td<?php echo $view_lab_service->TestSubCd->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_TestSubCd" class="view_lab_service_TestSubCd">
<span<?php echo $view_lab_service->TestSubCd->viewAttributes() ?>>
<?php echo $view_lab_service->TestSubCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->Method->Visible) { // Method ?>
		<td<?php echo $view_lab_service->Method->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_Method" class="view_lab_service_Method">
<span<?php echo $view_lab_service->Method->viewAttributes() ?>>
<?php echo $view_lab_service->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->Order->Visible) { // Order ?>
		<td<?php echo $view_lab_service->Order->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_Order" class="view_lab_service_Order">
<span<?php echo $view_lab_service->Order->viewAttributes() ?>>
<?php echo $view_lab_service->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->ResType->Visible) { // ResType ?>
		<td<?php echo $view_lab_service->ResType->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_ResType" class="view_lab_service_ResType">
<span<?php echo $view_lab_service->ResType->viewAttributes() ?>>
<?php echo $view_lab_service->ResType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->UnitCD->Visible) { // UnitCD ?>
		<td<?php echo $view_lab_service->UnitCD->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_UnitCD" class="view_lab_service_UnitCD">
<span<?php echo $view_lab_service->UnitCD->viewAttributes() ?>>
<?php echo $view_lab_service->UnitCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->Sample->Visible) { // Sample ?>
		<td<?php echo $view_lab_service->Sample->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_Sample" class="view_lab_service_Sample">
<span<?php echo $view_lab_service->Sample->viewAttributes() ?>>
<?php echo $view_lab_service->Sample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->NoD->Visible) { // NoD ?>
		<td<?php echo $view_lab_service->NoD->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_NoD" class="view_lab_service_NoD">
<span<?php echo $view_lab_service->NoD->viewAttributes() ?>>
<?php echo $view_lab_service->NoD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->BillOrder->Visible) { // BillOrder ?>
		<td<?php echo $view_lab_service->BillOrder->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_BillOrder" class="view_lab_service_BillOrder">
<span<?php echo $view_lab_service->BillOrder->viewAttributes() ?>>
<?php echo $view_lab_service->BillOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->Inactive->Visible) { // Inactive ?>
		<td<?php echo $view_lab_service->Inactive->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_Inactive" class="view_lab_service_Inactive">
<span<?php echo $view_lab_service->Inactive->viewAttributes() ?>>
<?php echo $view_lab_service->Inactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->Outsource->Visible) { // Outsource ?>
		<td<?php echo $view_lab_service->Outsource->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_Outsource" class="view_lab_service_Outsource">
<span<?php echo $view_lab_service->Outsource->viewAttributes() ?>>
<?php echo $view_lab_service->Outsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->CollSample->Visible) { // CollSample ?>
		<td<?php echo $view_lab_service->CollSample->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_CollSample" class="view_lab_service_CollSample">
<span<?php echo $view_lab_service->CollSample->viewAttributes() ?>>
<?php echo $view_lab_service->CollSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->TestType->Visible) { // TestType ?>
		<td<?php echo $view_lab_service->TestType->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_TestType" class="view_lab_service_TestType">
<span<?php echo $view_lab_service->TestType->viewAttributes() ?>>
<?php echo $view_lab_service->TestType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->NoHeading->Visible) { // NoHeading ?>
		<td<?php echo $view_lab_service->NoHeading->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_NoHeading" class="view_lab_service_NoHeading">
<span<?php echo $view_lab_service->NoHeading->viewAttributes() ?>>
<?php echo $view_lab_service->NoHeading->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->ChemicalCode->Visible) { // ChemicalCode ?>
		<td<?php echo $view_lab_service->ChemicalCode->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_ChemicalCode" class="view_lab_service_ChemicalCode">
<span<?php echo $view_lab_service->ChemicalCode->viewAttributes() ?>>
<?php echo $view_lab_service->ChemicalCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->ChemicalName->Visible) { // ChemicalName ?>
		<td<?php echo $view_lab_service->ChemicalName->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_ChemicalName" class="view_lab_service_ChemicalName">
<span<?php echo $view_lab_service->ChemicalName->viewAttributes() ?>>
<?php echo $view_lab_service->ChemicalName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_service->Utilaization->Visible) { // Utilaization ?>
		<td<?php echo $view_lab_service->Utilaization->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_delete->RowCnt ?>_view_lab_service_Utilaization" class="view_lab_service_Utilaization">
<span<?php echo $view_lab_service->Utilaization->viewAttributes() ?>>
<?php echo $view_lab_service->Utilaization->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_lab_service_delete->terminate();
?>