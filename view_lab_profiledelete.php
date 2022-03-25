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
$view_lab_profile_delete = new view_lab_profile_delete();

// Run the page
$view_lab_profile_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_profile_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fview_lab_profiledelete = currentForm = new ew.Form("fview_lab_profiledelete", "delete");

// Form_CustomValidate event
fview_lab_profiledelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_profiledelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_profiledelete.lists["x_SERVICE_TYPE"] = <?php echo $view_lab_profile_delete->SERVICE_TYPE->Lookup->toClientList() ?>;
fview_lab_profiledelete.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($view_lab_profile_delete->SERVICE_TYPE->lookupOptions()) ?>;
fview_lab_profiledelete.lists["x_DEPARTMENT"] = <?php echo $view_lab_profile_delete->DEPARTMENT->Lookup->toClientList() ?>;
fview_lab_profiledelete.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($view_lab_profile_delete->DEPARTMENT->lookupOptions()) ?>;
fview_lab_profiledelete.lists["x_TestType"] = <?php echo $view_lab_profile_delete->TestType->Lookup->toClientList() ?>;
fview_lab_profiledelete.lists["x_TestType"].options = <?php echo JsonEncode($view_lab_profile_delete->TestType->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_lab_profile_delete->showPageHeader(); ?>
<?php
$view_lab_profile_delete->showMessage();
?>
<form name="fview_lab_profiledelete" id="fview_lab_profiledelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_profile_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_profile_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_profile">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_lab_profile_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_lab_profile->Id->Visible) { // Id ?>
		<th class="<?php echo $view_lab_profile->Id->headerCellClass() ?>"><span id="elh_view_lab_profile_Id" class="view_lab_profile_Id"><?php echo $view_lab_profile->Id->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->CODE->Visible) { // CODE ?>
		<th class="<?php echo $view_lab_profile->CODE->headerCellClass() ?>"><span id="elh_view_lab_profile_CODE" class="view_lab_profile_CODE"><?php echo $view_lab_profile->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->SERVICE->Visible) { // SERVICE ?>
		<th class="<?php echo $view_lab_profile->SERVICE->headerCellClass() ?>"><span id="elh_view_lab_profile_SERVICE" class="view_lab_profile_SERVICE"><?php echo $view_lab_profile->SERVICE->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->UNITS->Visible) { // UNITS ?>
		<th class="<?php echo $view_lab_profile->UNITS->headerCellClass() ?>"><span id="elh_view_lab_profile_UNITS" class="view_lab_profile_UNITS"><?php echo $view_lab_profile->UNITS->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->AMOUNT->Visible) { // AMOUNT ?>
		<th class="<?php echo $view_lab_profile->AMOUNT->headerCellClass() ?>"><span id="elh_view_lab_profile_AMOUNT" class="view_lab_profile_AMOUNT"><?php echo $view_lab_profile->AMOUNT->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<th class="<?php echo $view_lab_profile->SERVICE_TYPE->headerCellClass() ?>"><span id="elh_view_lab_profile_SERVICE_TYPE" class="view_lab_profile_SERVICE_TYPE"><?php echo $view_lab_profile->SERVICE_TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<th class="<?php echo $view_lab_profile->DEPARTMENT->headerCellClass() ?>"><span id="elh_view_lab_profile_DEPARTMENT" class="view_lab_profile_DEPARTMENT"><?php echo $view_lab_profile->DEPARTMENT->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<th class="<?php echo $view_lab_profile->mas_services_billingcol->headerCellClass() ?>"><span id="elh_view_lab_profile_mas_services_billingcol" class="view_lab_profile_mas_services_billingcol"><?php echo $view_lab_profile->mas_services_billingcol->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->DrShareAmount->Visible) { // DrShareAmount ?>
		<th class="<?php echo $view_lab_profile->DrShareAmount->headerCellClass() ?>"><span id="elh_view_lab_profile_DrShareAmount" class="view_lab_profile_DrShareAmount"><?php echo $view_lab_profile->DrShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->HospShareAmount->Visible) { // HospShareAmount ?>
		<th class="<?php echo $view_lab_profile->HospShareAmount->headerCellClass() ?>"><span id="elh_view_lab_profile_HospShareAmount" class="view_lab_profile_HospShareAmount"><?php echo $view_lab_profile->HospShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->DrSharePer->Visible) { // DrSharePer ?>
		<th class="<?php echo $view_lab_profile->DrSharePer->headerCellClass() ?>"><span id="elh_view_lab_profile_DrSharePer" class="view_lab_profile_DrSharePer"><?php echo $view_lab_profile->DrSharePer->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->HospSharePer->Visible) { // HospSharePer ?>
		<th class="<?php echo $view_lab_profile->HospSharePer->headerCellClass() ?>"><span id="elh_view_lab_profile_HospSharePer" class="view_lab_profile_HospSharePer"><?php echo $view_lab_profile->HospSharePer->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->HospID->Visible) { // HospID ?>
		<th class="<?php echo $view_lab_profile->HospID->headerCellClass() ?>"><span id="elh_view_lab_profile_HospID" class="view_lab_profile_HospID"><?php echo $view_lab_profile->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->TestSubCd->Visible) { // TestSubCd ?>
		<th class="<?php echo $view_lab_profile->TestSubCd->headerCellClass() ?>"><span id="elh_view_lab_profile_TestSubCd" class="view_lab_profile_TestSubCd"><?php echo $view_lab_profile->TestSubCd->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->Method->Visible) { // Method ?>
		<th class="<?php echo $view_lab_profile->Method->headerCellClass() ?>"><span id="elh_view_lab_profile_Method" class="view_lab_profile_Method"><?php echo $view_lab_profile->Method->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->Order->Visible) { // Order ?>
		<th class="<?php echo $view_lab_profile->Order->headerCellClass() ?>"><span id="elh_view_lab_profile_Order" class="view_lab_profile_Order"><?php echo $view_lab_profile->Order->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->ResType->Visible) { // ResType ?>
		<th class="<?php echo $view_lab_profile->ResType->headerCellClass() ?>"><span id="elh_view_lab_profile_ResType" class="view_lab_profile_ResType"><?php echo $view_lab_profile->ResType->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->UnitCD->Visible) { // UnitCD ?>
		<th class="<?php echo $view_lab_profile->UnitCD->headerCellClass() ?>"><span id="elh_view_lab_profile_UnitCD" class="view_lab_profile_UnitCD"><?php echo $view_lab_profile->UnitCD->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->Sample->Visible) { // Sample ?>
		<th class="<?php echo $view_lab_profile->Sample->headerCellClass() ?>"><span id="elh_view_lab_profile_Sample" class="view_lab_profile_Sample"><?php echo $view_lab_profile->Sample->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->NoD->Visible) { // NoD ?>
		<th class="<?php echo $view_lab_profile->NoD->headerCellClass() ?>"><span id="elh_view_lab_profile_NoD" class="view_lab_profile_NoD"><?php echo $view_lab_profile->NoD->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->BillOrder->Visible) { // BillOrder ?>
		<th class="<?php echo $view_lab_profile->BillOrder->headerCellClass() ?>"><span id="elh_view_lab_profile_BillOrder" class="view_lab_profile_BillOrder"><?php echo $view_lab_profile->BillOrder->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->Inactive->Visible) { // Inactive ?>
		<th class="<?php echo $view_lab_profile->Inactive->headerCellClass() ?>"><span id="elh_view_lab_profile_Inactive" class="view_lab_profile_Inactive"><?php echo $view_lab_profile->Inactive->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->Outsource->Visible) { // Outsource ?>
		<th class="<?php echo $view_lab_profile->Outsource->headerCellClass() ?>"><span id="elh_view_lab_profile_Outsource" class="view_lab_profile_Outsource"><?php echo $view_lab_profile->Outsource->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->CollSample->Visible) { // CollSample ?>
		<th class="<?php echo $view_lab_profile->CollSample->headerCellClass() ?>"><span id="elh_view_lab_profile_CollSample" class="view_lab_profile_CollSample"><?php echo $view_lab_profile->CollSample->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->TestType->Visible) { // TestType ?>
		<th class="<?php echo $view_lab_profile->TestType->headerCellClass() ?>"><span id="elh_view_lab_profile_TestType" class="view_lab_profile_TestType"><?php echo $view_lab_profile->TestType->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->NoHeading->Visible) { // NoHeading ?>
		<th class="<?php echo $view_lab_profile->NoHeading->headerCellClass() ?>"><span id="elh_view_lab_profile_NoHeading" class="view_lab_profile_NoHeading"><?php echo $view_lab_profile->NoHeading->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->ChemicalCode->Visible) { // ChemicalCode ?>
		<th class="<?php echo $view_lab_profile->ChemicalCode->headerCellClass() ?>"><span id="elh_view_lab_profile_ChemicalCode" class="view_lab_profile_ChemicalCode"><?php echo $view_lab_profile->ChemicalCode->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->ChemicalName->Visible) { // ChemicalName ?>
		<th class="<?php echo $view_lab_profile->ChemicalName->headerCellClass() ?>"><span id="elh_view_lab_profile_ChemicalName" class="view_lab_profile_ChemicalName"><?php echo $view_lab_profile->ChemicalName->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile->Utilaization->Visible) { // Utilaization ?>
		<th class="<?php echo $view_lab_profile->Utilaization->headerCellClass() ?>"><span id="elh_view_lab_profile_Utilaization" class="view_lab_profile_Utilaization"><?php echo $view_lab_profile->Utilaization->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_lab_profile_delete->RecCnt = 0;
$i = 0;
while (!$view_lab_profile_delete->Recordset->EOF) {
	$view_lab_profile_delete->RecCnt++;
	$view_lab_profile_delete->RowCnt++;

	// Set row properties
	$view_lab_profile->resetAttributes();
	$view_lab_profile->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_lab_profile_delete->loadRowValues($view_lab_profile_delete->Recordset);

	// Render row
	$view_lab_profile_delete->renderRow();
?>
	<tr<?php echo $view_lab_profile->rowAttributes() ?>>
<?php if ($view_lab_profile->Id->Visible) { // Id ?>
		<td<?php echo $view_lab_profile->Id->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_Id" class="view_lab_profile_Id">
<span<?php echo $view_lab_profile->Id->viewAttributes() ?>>
<?php echo $view_lab_profile->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->CODE->Visible) { // CODE ?>
		<td<?php echo $view_lab_profile->CODE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_CODE" class="view_lab_profile_CODE">
<span<?php echo $view_lab_profile->CODE->viewAttributes() ?>>
<?php echo $view_lab_profile->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->SERVICE->Visible) { // SERVICE ?>
		<td<?php echo $view_lab_profile->SERVICE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_SERVICE" class="view_lab_profile_SERVICE">
<span<?php echo $view_lab_profile->SERVICE->viewAttributes() ?>>
<?php echo $view_lab_profile->SERVICE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->UNITS->Visible) { // UNITS ?>
		<td<?php echo $view_lab_profile->UNITS->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_UNITS" class="view_lab_profile_UNITS">
<span<?php echo $view_lab_profile->UNITS->viewAttributes() ?>>
<?php echo $view_lab_profile->UNITS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->AMOUNT->Visible) { // AMOUNT ?>
		<td<?php echo $view_lab_profile->AMOUNT->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_AMOUNT" class="view_lab_profile_AMOUNT">
<span<?php echo $view_lab_profile->AMOUNT->viewAttributes() ?>>
<?php echo $view_lab_profile->AMOUNT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td<?php echo $view_lab_profile->SERVICE_TYPE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_SERVICE_TYPE" class="view_lab_profile_SERVICE_TYPE">
<span<?php echo $view_lab_profile->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $view_lab_profile->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td<?php echo $view_lab_profile->DEPARTMENT->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_DEPARTMENT" class="view_lab_profile_DEPARTMENT">
<span<?php echo $view_lab_profile->DEPARTMENT->viewAttributes() ?>>
<?php echo $view_lab_profile->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<td<?php echo $view_lab_profile->mas_services_billingcol->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_mas_services_billingcol" class="view_lab_profile_mas_services_billingcol">
<span<?php echo $view_lab_profile->mas_services_billingcol->viewAttributes() ?>>
<?php echo $view_lab_profile->mas_services_billingcol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->DrShareAmount->Visible) { // DrShareAmount ?>
		<td<?php echo $view_lab_profile->DrShareAmount->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_DrShareAmount" class="view_lab_profile_DrShareAmount">
<span<?php echo $view_lab_profile->DrShareAmount->viewAttributes() ?>>
<?php echo $view_lab_profile->DrShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->HospShareAmount->Visible) { // HospShareAmount ?>
		<td<?php echo $view_lab_profile->HospShareAmount->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_HospShareAmount" class="view_lab_profile_HospShareAmount">
<span<?php echo $view_lab_profile->HospShareAmount->viewAttributes() ?>>
<?php echo $view_lab_profile->HospShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->DrSharePer->Visible) { // DrSharePer ?>
		<td<?php echo $view_lab_profile->DrSharePer->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_DrSharePer" class="view_lab_profile_DrSharePer">
<span<?php echo $view_lab_profile->DrSharePer->viewAttributes() ?>>
<?php echo $view_lab_profile->DrSharePer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->HospSharePer->Visible) { // HospSharePer ?>
		<td<?php echo $view_lab_profile->HospSharePer->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_HospSharePer" class="view_lab_profile_HospSharePer">
<span<?php echo $view_lab_profile->HospSharePer->viewAttributes() ?>>
<?php echo $view_lab_profile->HospSharePer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->HospID->Visible) { // HospID ?>
		<td<?php echo $view_lab_profile->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_HospID" class="view_lab_profile_HospID">
<span<?php echo $view_lab_profile->HospID->viewAttributes() ?>>
<?php echo $view_lab_profile->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->TestSubCd->Visible) { // TestSubCd ?>
		<td<?php echo $view_lab_profile->TestSubCd->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_TestSubCd" class="view_lab_profile_TestSubCd">
<span<?php echo $view_lab_profile->TestSubCd->viewAttributes() ?>>
<?php echo $view_lab_profile->TestSubCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->Method->Visible) { // Method ?>
		<td<?php echo $view_lab_profile->Method->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_Method" class="view_lab_profile_Method">
<span<?php echo $view_lab_profile->Method->viewAttributes() ?>>
<?php echo $view_lab_profile->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->Order->Visible) { // Order ?>
		<td<?php echo $view_lab_profile->Order->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_Order" class="view_lab_profile_Order">
<span<?php echo $view_lab_profile->Order->viewAttributes() ?>>
<?php echo $view_lab_profile->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->ResType->Visible) { // ResType ?>
		<td<?php echo $view_lab_profile->ResType->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_ResType" class="view_lab_profile_ResType">
<span<?php echo $view_lab_profile->ResType->viewAttributes() ?>>
<?php echo $view_lab_profile->ResType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->UnitCD->Visible) { // UnitCD ?>
		<td<?php echo $view_lab_profile->UnitCD->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_UnitCD" class="view_lab_profile_UnitCD">
<span<?php echo $view_lab_profile->UnitCD->viewAttributes() ?>>
<?php echo $view_lab_profile->UnitCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->Sample->Visible) { // Sample ?>
		<td<?php echo $view_lab_profile->Sample->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_Sample" class="view_lab_profile_Sample">
<span<?php echo $view_lab_profile->Sample->viewAttributes() ?>>
<?php echo $view_lab_profile->Sample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->NoD->Visible) { // NoD ?>
		<td<?php echo $view_lab_profile->NoD->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_NoD" class="view_lab_profile_NoD">
<span<?php echo $view_lab_profile->NoD->viewAttributes() ?>>
<?php echo $view_lab_profile->NoD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->BillOrder->Visible) { // BillOrder ?>
		<td<?php echo $view_lab_profile->BillOrder->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_BillOrder" class="view_lab_profile_BillOrder">
<span<?php echo $view_lab_profile->BillOrder->viewAttributes() ?>>
<?php echo $view_lab_profile->BillOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->Inactive->Visible) { // Inactive ?>
		<td<?php echo $view_lab_profile->Inactive->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_Inactive" class="view_lab_profile_Inactive">
<span<?php echo $view_lab_profile->Inactive->viewAttributes() ?>>
<?php echo $view_lab_profile->Inactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->Outsource->Visible) { // Outsource ?>
		<td<?php echo $view_lab_profile->Outsource->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_Outsource" class="view_lab_profile_Outsource">
<span<?php echo $view_lab_profile->Outsource->viewAttributes() ?>>
<?php echo $view_lab_profile->Outsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->CollSample->Visible) { // CollSample ?>
		<td<?php echo $view_lab_profile->CollSample->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_CollSample" class="view_lab_profile_CollSample">
<span<?php echo $view_lab_profile->CollSample->viewAttributes() ?>>
<?php echo $view_lab_profile->CollSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->TestType->Visible) { // TestType ?>
		<td<?php echo $view_lab_profile->TestType->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_TestType" class="view_lab_profile_TestType">
<span<?php echo $view_lab_profile->TestType->viewAttributes() ?>>
<?php echo $view_lab_profile->TestType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->NoHeading->Visible) { // NoHeading ?>
		<td<?php echo $view_lab_profile->NoHeading->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_NoHeading" class="view_lab_profile_NoHeading">
<span<?php echo $view_lab_profile->NoHeading->viewAttributes() ?>>
<?php echo $view_lab_profile->NoHeading->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->ChemicalCode->Visible) { // ChemicalCode ?>
		<td<?php echo $view_lab_profile->ChemicalCode->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_ChemicalCode" class="view_lab_profile_ChemicalCode">
<span<?php echo $view_lab_profile->ChemicalCode->viewAttributes() ?>>
<?php echo $view_lab_profile->ChemicalCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->ChemicalName->Visible) { // ChemicalName ?>
		<td<?php echo $view_lab_profile->ChemicalName->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_ChemicalName" class="view_lab_profile_ChemicalName">
<span<?php echo $view_lab_profile->ChemicalName->viewAttributes() ?>>
<?php echo $view_lab_profile->ChemicalName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile->Utilaization->Visible) { // Utilaization ?>
		<td<?php echo $view_lab_profile->Utilaization->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCnt ?>_view_lab_profile_Utilaization" class="view_lab_profile_Utilaization">
<span<?php echo $view_lab_profile->Utilaization->viewAttributes() ?>>
<?php echo $view_lab_profile->Utilaization->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_lab_profile_delete->Recordset->moveNext();
}
$view_lab_profile_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_lab_profile_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_lab_profile_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_lab_profile_delete->terminate();
?>