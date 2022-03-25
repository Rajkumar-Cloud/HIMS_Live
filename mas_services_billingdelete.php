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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fmas_services_billingdelete = currentForm = new ew.Form("fmas_services_billingdelete", "delete");

// Form_CustomValidate event
fmas_services_billingdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_services_billingdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_services_billingdelete.lists["x_SERVICE_TYPE"] = <?php echo $mas_services_billing_delete->SERVICE_TYPE->Lookup->toClientList() ?>;
fmas_services_billingdelete.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($mas_services_billing_delete->SERVICE_TYPE->lookupOptions()) ?>;
fmas_services_billingdelete.lists["x_DEPARTMENT"] = <?php echo $mas_services_billing_delete->DEPARTMENT->Lookup->toClientList() ?>;
fmas_services_billingdelete.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($mas_services_billing_delete->DEPARTMENT->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_services_billing_delete->showPageHeader(); ?>
<?php
$mas_services_billing_delete->showMessage();
?>
<form name="fmas_services_billingdelete" id="fmas_services_billingdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_services_billing_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_services_billing_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_services_billing">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_services_billing_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_services_billing->Id->Visible) { // Id ?>
		<th class="<?php echo $mas_services_billing->Id->headerCellClass() ?>"><span id="elh_mas_services_billing_Id" class="mas_services_billing_Id"><?php echo $mas_services_billing->Id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->CODE->Visible) { // CODE ?>
		<th class="<?php echo $mas_services_billing->CODE->headerCellClass() ?>"><span id="elh_mas_services_billing_CODE" class="mas_services_billing_CODE"><?php echo $mas_services_billing->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->SERVICE->Visible) { // SERVICE ?>
		<th class="<?php echo $mas_services_billing->SERVICE->headerCellClass() ?>"><span id="elh_mas_services_billing_SERVICE" class="mas_services_billing_SERVICE"><?php echo $mas_services_billing->SERVICE->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->UNITS->Visible) { // UNITS ?>
		<th class="<?php echo $mas_services_billing->UNITS->headerCellClass() ?>"><span id="elh_mas_services_billing_UNITS" class="mas_services_billing_UNITS"><?php echo $mas_services_billing->UNITS->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->AMOUNT->Visible) { // AMOUNT ?>
		<th class="<?php echo $mas_services_billing->AMOUNT->headerCellClass() ?>"><span id="elh_mas_services_billing_AMOUNT" class="mas_services_billing_AMOUNT"><?php echo $mas_services_billing->AMOUNT->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<th class="<?php echo $mas_services_billing->SERVICE_TYPE->headerCellClass() ?>"><span id="elh_mas_services_billing_SERVICE_TYPE" class="mas_services_billing_SERVICE_TYPE"><?php echo $mas_services_billing->SERVICE_TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<th class="<?php echo $mas_services_billing->DEPARTMENT->headerCellClass() ?>"><span id="elh_mas_services_billing_DEPARTMENT" class="mas_services_billing_DEPARTMENT"><?php echo $mas_services_billing->DEPARTMENT->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<th class="<?php echo $mas_services_billing->mas_services_billingcol->headerCellClass() ?>"><span id="elh_mas_services_billing_mas_services_billingcol" class="mas_services_billing_mas_services_billingcol"><?php echo $mas_services_billing->mas_services_billingcol->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->DrShareAmount->Visible) { // DrShareAmount ?>
		<th class="<?php echo $mas_services_billing->DrShareAmount->headerCellClass() ?>"><span id="elh_mas_services_billing_DrShareAmount" class="mas_services_billing_DrShareAmount"><?php echo $mas_services_billing->DrShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->HospShareAmount->Visible) { // HospShareAmount ?>
		<th class="<?php echo $mas_services_billing->HospShareAmount->headerCellClass() ?>"><span id="elh_mas_services_billing_HospShareAmount" class="mas_services_billing_HospShareAmount"><?php echo $mas_services_billing->HospShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->DrSharePer->Visible) { // DrSharePer ?>
		<th class="<?php echo $mas_services_billing->DrSharePer->headerCellClass() ?>"><span id="elh_mas_services_billing_DrSharePer" class="mas_services_billing_DrSharePer"><?php echo $mas_services_billing->DrSharePer->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->HospSharePer->Visible) { // HospSharePer ?>
		<th class="<?php echo $mas_services_billing->HospSharePer->headerCellClass() ?>"><span id="elh_mas_services_billing_HospSharePer" class="mas_services_billing_HospSharePer"><?php echo $mas_services_billing->HospSharePer->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->HospID->Visible) { // HospID ?>
		<th class="<?php echo $mas_services_billing->HospID->headerCellClass() ?>"><span id="elh_mas_services_billing_HospID" class="mas_services_billing_HospID"><?php echo $mas_services_billing->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->TestSubCd->Visible) { // TestSubCd ?>
		<th class="<?php echo $mas_services_billing->TestSubCd->headerCellClass() ?>"><span id="elh_mas_services_billing_TestSubCd" class="mas_services_billing_TestSubCd"><?php echo $mas_services_billing->TestSubCd->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->Method->Visible) { // Method ?>
		<th class="<?php echo $mas_services_billing->Method->headerCellClass() ?>"><span id="elh_mas_services_billing_Method" class="mas_services_billing_Method"><?php echo $mas_services_billing->Method->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->Order->Visible) { // Order ?>
		<th class="<?php echo $mas_services_billing->Order->headerCellClass() ?>"><span id="elh_mas_services_billing_Order" class="mas_services_billing_Order"><?php echo $mas_services_billing->Order->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->ResType->Visible) { // ResType ?>
		<th class="<?php echo $mas_services_billing->ResType->headerCellClass() ?>"><span id="elh_mas_services_billing_ResType" class="mas_services_billing_ResType"><?php echo $mas_services_billing->ResType->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->UnitCD->Visible) { // UnitCD ?>
		<th class="<?php echo $mas_services_billing->UnitCD->headerCellClass() ?>"><span id="elh_mas_services_billing_UnitCD" class="mas_services_billing_UnitCD"><?php echo $mas_services_billing->UnitCD->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->Sample->Visible) { // Sample ?>
		<th class="<?php echo $mas_services_billing->Sample->headerCellClass() ?>"><span id="elh_mas_services_billing_Sample" class="mas_services_billing_Sample"><?php echo $mas_services_billing->Sample->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->NoD->Visible) { // NoD ?>
		<th class="<?php echo $mas_services_billing->NoD->headerCellClass() ?>"><span id="elh_mas_services_billing_NoD" class="mas_services_billing_NoD"><?php echo $mas_services_billing->NoD->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->BillOrder->Visible) { // BillOrder ?>
		<th class="<?php echo $mas_services_billing->BillOrder->headerCellClass() ?>"><span id="elh_mas_services_billing_BillOrder" class="mas_services_billing_BillOrder"><?php echo $mas_services_billing->BillOrder->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->Inactive->Visible) { // Inactive ?>
		<th class="<?php echo $mas_services_billing->Inactive->headerCellClass() ?>"><span id="elh_mas_services_billing_Inactive" class="mas_services_billing_Inactive"><?php echo $mas_services_billing->Inactive->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->Outsource->Visible) { // Outsource ?>
		<th class="<?php echo $mas_services_billing->Outsource->headerCellClass() ?>"><span id="elh_mas_services_billing_Outsource" class="mas_services_billing_Outsource"><?php echo $mas_services_billing->Outsource->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->CollSample->Visible) { // CollSample ?>
		<th class="<?php echo $mas_services_billing->CollSample->headerCellClass() ?>"><span id="elh_mas_services_billing_CollSample" class="mas_services_billing_CollSample"><?php echo $mas_services_billing->CollSample->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->TestType->Visible) { // TestType ?>
		<th class="<?php echo $mas_services_billing->TestType->headerCellClass() ?>"><span id="elh_mas_services_billing_TestType" class="mas_services_billing_TestType"><?php echo $mas_services_billing->TestType->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->NoHeading->Visible) { // NoHeading ?>
		<th class="<?php echo $mas_services_billing->NoHeading->headerCellClass() ?>"><span id="elh_mas_services_billing_NoHeading" class="mas_services_billing_NoHeading"><?php echo $mas_services_billing->NoHeading->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->ChemicalCode->Visible) { // ChemicalCode ?>
		<th class="<?php echo $mas_services_billing->ChemicalCode->headerCellClass() ?>"><span id="elh_mas_services_billing_ChemicalCode" class="mas_services_billing_ChemicalCode"><?php echo $mas_services_billing->ChemicalCode->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->ChemicalName->Visible) { // ChemicalName ?>
		<th class="<?php echo $mas_services_billing->ChemicalName->headerCellClass() ?>"><span id="elh_mas_services_billing_ChemicalName" class="mas_services_billing_ChemicalName"><?php echo $mas_services_billing->ChemicalName->caption() ?></span></th>
<?php } ?>
<?php if ($mas_services_billing->Utilaization->Visible) { // Utilaization ?>
		<th class="<?php echo $mas_services_billing->Utilaization->headerCellClass() ?>"><span id="elh_mas_services_billing_Utilaization" class="mas_services_billing_Utilaization"><?php echo $mas_services_billing->Utilaization->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_services_billing_delete->RecCnt = 0;
$i = 0;
while (!$mas_services_billing_delete->Recordset->EOF) {
	$mas_services_billing_delete->RecCnt++;
	$mas_services_billing_delete->RowCnt++;

	// Set row properties
	$mas_services_billing->resetAttributes();
	$mas_services_billing->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_services_billing_delete->loadRowValues($mas_services_billing_delete->Recordset);

	// Render row
	$mas_services_billing_delete->renderRow();
?>
	<tr<?php echo $mas_services_billing->rowAttributes() ?>>
<?php if ($mas_services_billing->Id->Visible) { // Id ?>
		<td<?php echo $mas_services_billing->Id->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_Id" class="mas_services_billing_Id">
<span<?php echo $mas_services_billing->Id->viewAttributes() ?>>
<?php echo $mas_services_billing->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->CODE->Visible) { // CODE ?>
		<td<?php echo $mas_services_billing->CODE->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_CODE" class="mas_services_billing_CODE">
<span<?php echo $mas_services_billing->CODE->viewAttributes() ?>>
<?php echo $mas_services_billing->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->SERVICE->Visible) { // SERVICE ?>
		<td<?php echo $mas_services_billing->SERVICE->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_SERVICE" class="mas_services_billing_SERVICE">
<span<?php echo $mas_services_billing->SERVICE->viewAttributes() ?>>
<?php echo $mas_services_billing->SERVICE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->UNITS->Visible) { // UNITS ?>
		<td<?php echo $mas_services_billing->UNITS->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_UNITS" class="mas_services_billing_UNITS">
<span<?php echo $mas_services_billing->UNITS->viewAttributes() ?>>
<?php echo $mas_services_billing->UNITS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->AMOUNT->Visible) { // AMOUNT ?>
		<td<?php echo $mas_services_billing->AMOUNT->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_AMOUNT" class="mas_services_billing_AMOUNT">
<span<?php echo $mas_services_billing->AMOUNT->viewAttributes() ?>>
<?php echo $mas_services_billing->AMOUNT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td<?php echo $mas_services_billing->SERVICE_TYPE->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_SERVICE_TYPE" class="mas_services_billing_SERVICE_TYPE">
<span<?php echo $mas_services_billing->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $mas_services_billing->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td<?php echo $mas_services_billing->DEPARTMENT->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_DEPARTMENT" class="mas_services_billing_DEPARTMENT">
<span<?php echo $mas_services_billing->DEPARTMENT->viewAttributes() ?>>
<?php echo $mas_services_billing->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<td<?php echo $mas_services_billing->mas_services_billingcol->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_mas_services_billingcol" class="mas_services_billing_mas_services_billingcol">
<span<?php echo $mas_services_billing->mas_services_billingcol->viewAttributes() ?>>
<?php echo $mas_services_billing->mas_services_billingcol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->DrShareAmount->Visible) { // DrShareAmount ?>
		<td<?php echo $mas_services_billing->DrShareAmount->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_DrShareAmount" class="mas_services_billing_DrShareAmount">
<span<?php echo $mas_services_billing->DrShareAmount->viewAttributes() ?>>
<?php echo $mas_services_billing->DrShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->HospShareAmount->Visible) { // HospShareAmount ?>
		<td<?php echo $mas_services_billing->HospShareAmount->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_HospShareAmount" class="mas_services_billing_HospShareAmount">
<span<?php echo $mas_services_billing->HospShareAmount->viewAttributes() ?>>
<?php echo $mas_services_billing->HospShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->DrSharePer->Visible) { // DrSharePer ?>
		<td<?php echo $mas_services_billing->DrSharePer->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_DrSharePer" class="mas_services_billing_DrSharePer">
<span<?php echo $mas_services_billing->DrSharePer->viewAttributes() ?>>
<?php echo $mas_services_billing->DrSharePer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->HospSharePer->Visible) { // HospSharePer ?>
		<td<?php echo $mas_services_billing->HospSharePer->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_HospSharePer" class="mas_services_billing_HospSharePer">
<span<?php echo $mas_services_billing->HospSharePer->viewAttributes() ?>>
<?php echo $mas_services_billing->HospSharePer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->HospID->Visible) { // HospID ?>
		<td<?php echo $mas_services_billing->HospID->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_HospID" class="mas_services_billing_HospID">
<span<?php echo $mas_services_billing->HospID->viewAttributes() ?>>
<?php echo $mas_services_billing->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->TestSubCd->Visible) { // TestSubCd ?>
		<td<?php echo $mas_services_billing->TestSubCd->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_TestSubCd" class="mas_services_billing_TestSubCd">
<span<?php echo $mas_services_billing->TestSubCd->viewAttributes() ?>>
<?php echo $mas_services_billing->TestSubCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->Method->Visible) { // Method ?>
		<td<?php echo $mas_services_billing->Method->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_Method" class="mas_services_billing_Method">
<span<?php echo $mas_services_billing->Method->viewAttributes() ?>>
<?php echo $mas_services_billing->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->Order->Visible) { // Order ?>
		<td<?php echo $mas_services_billing->Order->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_Order" class="mas_services_billing_Order">
<span<?php echo $mas_services_billing->Order->viewAttributes() ?>>
<?php echo $mas_services_billing->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->ResType->Visible) { // ResType ?>
		<td<?php echo $mas_services_billing->ResType->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_ResType" class="mas_services_billing_ResType">
<span<?php echo $mas_services_billing->ResType->viewAttributes() ?>>
<?php echo $mas_services_billing->ResType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->UnitCD->Visible) { // UnitCD ?>
		<td<?php echo $mas_services_billing->UnitCD->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_UnitCD" class="mas_services_billing_UnitCD">
<span<?php echo $mas_services_billing->UnitCD->viewAttributes() ?>>
<?php echo $mas_services_billing->UnitCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->Sample->Visible) { // Sample ?>
		<td<?php echo $mas_services_billing->Sample->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_Sample" class="mas_services_billing_Sample">
<span<?php echo $mas_services_billing->Sample->viewAttributes() ?>>
<?php echo $mas_services_billing->Sample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->NoD->Visible) { // NoD ?>
		<td<?php echo $mas_services_billing->NoD->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_NoD" class="mas_services_billing_NoD">
<span<?php echo $mas_services_billing->NoD->viewAttributes() ?>>
<?php echo $mas_services_billing->NoD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->BillOrder->Visible) { // BillOrder ?>
		<td<?php echo $mas_services_billing->BillOrder->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_BillOrder" class="mas_services_billing_BillOrder">
<span<?php echo $mas_services_billing->BillOrder->viewAttributes() ?>>
<?php echo $mas_services_billing->BillOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->Inactive->Visible) { // Inactive ?>
		<td<?php echo $mas_services_billing->Inactive->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_Inactive" class="mas_services_billing_Inactive">
<span<?php echo $mas_services_billing->Inactive->viewAttributes() ?>>
<?php echo $mas_services_billing->Inactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->Outsource->Visible) { // Outsource ?>
		<td<?php echo $mas_services_billing->Outsource->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_Outsource" class="mas_services_billing_Outsource">
<span<?php echo $mas_services_billing->Outsource->viewAttributes() ?>>
<?php echo $mas_services_billing->Outsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->CollSample->Visible) { // CollSample ?>
		<td<?php echo $mas_services_billing->CollSample->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_CollSample" class="mas_services_billing_CollSample">
<span<?php echo $mas_services_billing->CollSample->viewAttributes() ?>>
<?php echo $mas_services_billing->CollSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->TestType->Visible) { // TestType ?>
		<td<?php echo $mas_services_billing->TestType->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_TestType" class="mas_services_billing_TestType">
<span<?php echo $mas_services_billing->TestType->viewAttributes() ?>>
<?php echo $mas_services_billing->TestType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->NoHeading->Visible) { // NoHeading ?>
		<td<?php echo $mas_services_billing->NoHeading->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_NoHeading" class="mas_services_billing_NoHeading">
<span<?php echo $mas_services_billing->NoHeading->viewAttributes() ?>>
<?php echo $mas_services_billing->NoHeading->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->ChemicalCode->Visible) { // ChemicalCode ?>
		<td<?php echo $mas_services_billing->ChemicalCode->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_ChemicalCode" class="mas_services_billing_ChemicalCode">
<span<?php echo $mas_services_billing->ChemicalCode->viewAttributes() ?>>
<?php echo $mas_services_billing->ChemicalCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->ChemicalName->Visible) { // ChemicalName ?>
		<td<?php echo $mas_services_billing->ChemicalName->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_ChemicalName" class="mas_services_billing_ChemicalName">
<span<?php echo $mas_services_billing->ChemicalName->viewAttributes() ?>>
<?php echo $mas_services_billing->ChemicalName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_services_billing->Utilaization->Visible) { // Utilaization ?>
		<td<?php echo $mas_services_billing->Utilaization->cellAttributes() ?>>
<span id="el<?php echo $mas_services_billing_delete->RowCnt ?>_mas_services_billing_Utilaization" class="mas_services_billing_Utilaization">
<span<?php echo $mas_services_billing->Utilaization->viewAttributes() ?>>
<?php echo $mas_services_billing->Utilaization->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_services_billing_delete->terminate();
?>