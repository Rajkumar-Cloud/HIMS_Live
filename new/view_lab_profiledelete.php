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
<?php include_once "header.php"; ?>
<script>
var fview_lab_profiledelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fview_lab_profiledelete = currentForm = new ew.Form("fview_lab_profiledelete", "delete");
	loadjs.done("fview_lab_profiledelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_lab_profile_delete->showPageHeader(); ?>
<?php
$view_lab_profile_delete->showMessage();
?>
<form name="fview_lab_profiledelete" id="fview_lab_profiledelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_profile">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_lab_profile_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_lab_profile_delete->Id->Visible) { // Id ?>
		<th class="<?php echo $view_lab_profile_delete->Id->headerCellClass() ?>"><span id="elh_view_lab_profile_Id" class="view_lab_profile_Id"><?php echo $view_lab_profile_delete->Id->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->CODE->Visible) { // CODE ?>
		<th class="<?php echo $view_lab_profile_delete->CODE->headerCellClass() ?>"><span id="elh_view_lab_profile_CODE" class="view_lab_profile_CODE"><?php echo $view_lab_profile_delete->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->SERVICE->Visible) { // SERVICE ?>
		<th class="<?php echo $view_lab_profile_delete->SERVICE->headerCellClass() ?>"><span id="elh_view_lab_profile_SERVICE" class="view_lab_profile_SERVICE"><?php echo $view_lab_profile_delete->SERVICE->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->UNITS->Visible) { // UNITS ?>
		<th class="<?php echo $view_lab_profile_delete->UNITS->headerCellClass() ?>"><span id="elh_view_lab_profile_UNITS" class="view_lab_profile_UNITS"><?php echo $view_lab_profile_delete->UNITS->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->AMOUNT->Visible) { // AMOUNT ?>
		<th class="<?php echo $view_lab_profile_delete->AMOUNT->headerCellClass() ?>"><span id="elh_view_lab_profile_AMOUNT" class="view_lab_profile_AMOUNT"><?php echo $view_lab_profile_delete->AMOUNT->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<th class="<?php echo $view_lab_profile_delete->SERVICE_TYPE->headerCellClass() ?>"><span id="elh_view_lab_profile_SERVICE_TYPE" class="view_lab_profile_SERVICE_TYPE"><?php echo $view_lab_profile_delete->SERVICE_TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<th class="<?php echo $view_lab_profile_delete->DEPARTMENT->headerCellClass() ?>"><span id="elh_view_lab_profile_DEPARTMENT" class="view_lab_profile_DEPARTMENT"><?php echo $view_lab_profile_delete->DEPARTMENT->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<th class="<?php echo $view_lab_profile_delete->mas_services_billingcol->headerCellClass() ?>"><span id="elh_view_lab_profile_mas_services_billingcol" class="view_lab_profile_mas_services_billingcol"><?php echo $view_lab_profile_delete->mas_services_billingcol->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->DrShareAmount->Visible) { // DrShareAmount ?>
		<th class="<?php echo $view_lab_profile_delete->DrShareAmount->headerCellClass() ?>"><span id="elh_view_lab_profile_DrShareAmount" class="view_lab_profile_DrShareAmount"><?php echo $view_lab_profile_delete->DrShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->HospShareAmount->Visible) { // HospShareAmount ?>
		<th class="<?php echo $view_lab_profile_delete->HospShareAmount->headerCellClass() ?>"><span id="elh_view_lab_profile_HospShareAmount" class="view_lab_profile_HospShareAmount"><?php echo $view_lab_profile_delete->HospShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->DrSharePer->Visible) { // DrSharePer ?>
		<th class="<?php echo $view_lab_profile_delete->DrSharePer->headerCellClass() ?>"><span id="elh_view_lab_profile_DrSharePer" class="view_lab_profile_DrSharePer"><?php echo $view_lab_profile_delete->DrSharePer->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->HospSharePer->Visible) { // HospSharePer ?>
		<th class="<?php echo $view_lab_profile_delete->HospSharePer->headerCellClass() ?>"><span id="elh_view_lab_profile_HospSharePer" class="view_lab_profile_HospSharePer"><?php echo $view_lab_profile_delete->HospSharePer->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $view_lab_profile_delete->HospID->headerCellClass() ?>"><span id="elh_view_lab_profile_HospID" class="view_lab_profile_HospID"><?php echo $view_lab_profile_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->TestSubCd->Visible) { // TestSubCd ?>
		<th class="<?php echo $view_lab_profile_delete->TestSubCd->headerCellClass() ?>"><span id="elh_view_lab_profile_TestSubCd" class="view_lab_profile_TestSubCd"><?php echo $view_lab_profile_delete->TestSubCd->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->Method->Visible) { // Method ?>
		<th class="<?php echo $view_lab_profile_delete->Method->headerCellClass() ?>"><span id="elh_view_lab_profile_Method" class="view_lab_profile_Method"><?php echo $view_lab_profile_delete->Method->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->Order->Visible) { // Order ?>
		<th class="<?php echo $view_lab_profile_delete->Order->headerCellClass() ?>"><span id="elh_view_lab_profile_Order" class="view_lab_profile_Order"><?php echo $view_lab_profile_delete->Order->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->ResType->Visible) { // ResType ?>
		<th class="<?php echo $view_lab_profile_delete->ResType->headerCellClass() ?>"><span id="elh_view_lab_profile_ResType" class="view_lab_profile_ResType"><?php echo $view_lab_profile_delete->ResType->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->UnitCD->Visible) { // UnitCD ?>
		<th class="<?php echo $view_lab_profile_delete->UnitCD->headerCellClass() ?>"><span id="elh_view_lab_profile_UnitCD" class="view_lab_profile_UnitCD"><?php echo $view_lab_profile_delete->UnitCD->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->Sample->Visible) { // Sample ?>
		<th class="<?php echo $view_lab_profile_delete->Sample->headerCellClass() ?>"><span id="elh_view_lab_profile_Sample" class="view_lab_profile_Sample"><?php echo $view_lab_profile_delete->Sample->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->NoD->Visible) { // NoD ?>
		<th class="<?php echo $view_lab_profile_delete->NoD->headerCellClass() ?>"><span id="elh_view_lab_profile_NoD" class="view_lab_profile_NoD"><?php echo $view_lab_profile_delete->NoD->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->BillOrder->Visible) { // BillOrder ?>
		<th class="<?php echo $view_lab_profile_delete->BillOrder->headerCellClass() ?>"><span id="elh_view_lab_profile_BillOrder" class="view_lab_profile_BillOrder"><?php echo $view_lab_profile_delete->BillOrder->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->Inactive->Visible) { // Inactive ?>
		<th class="<?php echo $view_lab_profile_delete->Inactive->headerCellClass() ?>"><span id="elh_view_lab_profile_Inactive" class="view_lab_profile_Inactive"><?php echo $view_lab_profile_delete->Inactive->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->Outsource->Visible) { // Outsource ?>
		<th class="<?php echo $view_lab_profile_delete->Outsource->headerCellClass() ?>"><span id="elh_view_lab_profile_Outsource" class="view_lab_profile_Outsource"><?php echo $view_lab_profile_delete->Outsource->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->CollSample->Visible) { // CollSample ?>
		<th class="<?php echo $view_lab_profile_delete->CollSample->headerCellClass() ?>"><span id="elh_view_lab_profile_CollSample" class="view_lab_profile_CollSample"><?php echo $view_lab_profile_delete->CollSample->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->TestType->Visible) { // TestType ?>
		<th class="<?php echo $view_lab_profile_delete->TestType->headerCellClass() ?>"><span id="elh_view_lab_profile_TestType" class="view_lab_profile_TestType"><?php echo $view_lab_profile_delete->TestType->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->NoHeading->Visible) { // NoHeading ?>
		<th class="<?php echo $view_lab_profile_delete->NoHeading->headerCellClass() ?>"><span id="elh_view_lab_profile_NoHeading" class="view_lab_profile_NoHeading"><?php echo $view_lab_profile_delete->NoHeading->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->ChemicalCode->Visible) { // ChemicalCode ?>
		<th class="<?php echo $view_lab_profile_delete->ChemicalCode->headerCellClass() ?>"><span id="elh_view_lab_profile_ChemicalCode" class="view_lab_profile_ChemicalCode"><?php echo $view_lab_profile_delete->ChemicalCode->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->ChemicalName->Visible) { // ChemicalName ?>
		<th class="<?php echo $view_lab_profile_delete->ChemicalName->headerCellClass() ?>"><span id="elh_view_lab_profile_ChemicalName" class="view_lab_profile_ChemicalName"><?php echo $view_lab_profile_delete->ChemicalName->caption() ?></span></th>
<?php } ?>
<?php if ($view_lab_profile_delete->Utilaization->Visible) { // Utilaization ?>
		<th class="<?php echo $view_lab_profile_delete->Utilaization->headerCellClass() ?>"><span id="elh_view_lab_profile_Utilaization" class="view_lab_profile_Utilaization"><?php echo $view_lab_profile_delete->Utilaization->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_lab_profile_delete->RecordCount = 0;
$i = 0;
while (!$view_lab_profile_delete->Recordset->EOF) {
	$view_lab_profile_delete->RecordCount++;
	$view_lab_profile_delete->RowCount++;

	// Set row properties
	$view_lab_profile->resetAttributes();
	$view_lab_profile->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_lab_profile_delete->loadRowValues($view_lab_profile_delete->Recordset);

	// Render row
	$view_lab_profile_delete->renderRow();
?>
	<tr <?php echo $view_lab_profile->rowAttributes() ?>>
<?php if ($view_lab_profile_delete->Id->Visible) { // Id ?>
		<td <?php echo $view_lab_profile_delete->Id->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_Id" class="view_lab_profile_Id">
<span<?php echo $view_lab_profile_delete->Id->viewAttributes() ?>><?php echo $view_lab_profile_delete->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->CODE->Visible) { // CODE ?>
		<td <?php echo $view_lab_profile_delete->CODE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_CODE" class="view_lab_profile_CODE">
<span<?php echo $view_lab_profile_delete->CODE->viewAttributes() ?>><?php echo $view_lab_profile_delete->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->SERVICE->Visible) { // SERVICE ?>
		<td <?php echo $view_lab_profile_delete->SERVICE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_SERVICE" class="view_lab_profile_SERVICE">
<span<?php echo $view_lab_profile_delete->SERVICE->viewAttributes() ?>><?php echo $view_lab_profile_delete->SERVICE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->UNITS->Visible) { // UNITS ?>
		<td <?php echo $view_lab_profile_delete->UNITS->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_UNITS" class="view_lab_profile_UNITS">
<span<?php echo $view_lab_profile_delete->UNITS->viewAttributes() ?>><?php echo $view_lab_profile_delete->UNITS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->AMOUNT->Visible) { // AMOUNT ?>
		<td <?php echo $view_lab_profile_delete->AMOUNT->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_AMOUNT" class="view_lab_profile_AMOUNT">
<span<?php echo $view_lab_profile_delete->AMOUNT->viewAttributes() ?>><?php echo $view_lab_profile_delete->AMOUNT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td <?php echo $view_lab_profile_delete->SERVICE_TYPE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_SERVICE_TYPE" class="view_lab_profile_SERVICE_TYPE">
<span<?php echo $view_lab_profile_delete->SERVICE_TYPE->viewAttributes() ?>><?php echo $view_lab_profile_delete->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td <?php echo $view_lab_profile_delete->DEPARTMENT->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_DEPARTMENT" class="view_lab_profile_DEPARTMENT">
<span<?php echo $view_lab_profile_delete->DEPARTMENT->viewAttributes() ?>><?php echo $view_lab_profile_delete->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
		<td <?php echo $view_lab_profile_delete->mas_services_billingcol->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_mas_services_billingcol" class="view_lab_profile_mas_services_billingcol">
<span<?php echo $view_lab_profile_delete->mas_services_billingcol->viewAttributes() ?>><?php echo $view_lab_profile_delete->mas_services_billingcol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->DrShareAmount->Visible) { // DrShareAmount ?>
		<td <?php echo $view_lab_profile_delete->DrShareAmount->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_DrShareAmount" class="view_lab_profile_DrShareAmount">
<span<?php echo $view_lab_profile_delete->DrShareAmount->viewAttributes() ?>><?php echo $view_lab_profile_delete->DrShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->HospShareAmount->Visible) { // HospShareAmount ?>
		<td <?php echo $view_lab_profile_delete->HospShareAmount->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_HospShareAmount" class="view_lab_profile_HospShareAmount">
<span<?php echo $view_lab_profile_delete->HospShareAmount->viewAttributes() ?>><?php echo $view_lab_profile_delete->HospShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->DrSharePer->Visible) { // DrSharePer ?>
		<td <?php echo $view_lab_profile_delete->DrSharePer->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_DrSharePer" class="view_lab_profile_DrSharePer">
<span<?php echo $view_lab_profile_delete->DrSharePer->viewAttributes() ?>><?php echo $view_lab_profile_delete->DrSharePer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->HospSharePer->Visible) { // HospSharePer ?>
		<td <?php echo $view_lab_profile_delete->HospSharePer->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_HospSharePer" class="view_lab_profile_HospSharePer">
<span<?php echo $view_lab_profile_delete->HospSharePer->viewAttributes() ?>><?php echo $view_lab_profile_delete->HospSharePer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $view_lab_profile_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_HospID" class="view_lab_profile_HospID">
<span<?php echo $view_lab_profile_delete->HospID->viewAttributes() ?>><?php echo $view_lab_profile_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->TestSubCd->Visible) { // TestSubCd ?>
		<td <?php echo $view_lab_profile_delete->TestSubCd->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_TestSubCd" class="view_lab_profile_TestSubCd">
<span<?php echo $view_lab_profile_delete->TestSubCd->viewAttributes() ?>><?php echo $view_lab_profile_delete->TestSubCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->Method->Visible) { // Method ?>
		<td <?php echo $view_lab_profile_delete->Method->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_Method" class="view_lab_profile_Method">
<span<?php echo $view_lab_profile_delete->Method->viewAttributes() ?>><?php echo $view_lab_profile_delete->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->Order->Visible) { // Order ?>
		<td <?php echo $view_lab_profile_delete->Order->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_Order" class="view_lab_profile_Order">
<span<?php echo $view_lab_profile_delete->Order->viewAttributes() ?>><?php echo $view_lab_profile_delete->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->ResType->Visible) { // ResType ?>
		<td <?php echo $view_lab_profile_delete->ResType->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_ResType" class="view_lab_profile_ResType">
<span<?php echo $view_lab_profile_delete->ResType->viewAttributes() ?>><?php echo $view_lab_profile_delete->ResType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->UnitCD->Visible) { // UnitCD ?>
		<td <?php echo $view_lab_profile_delete->UnitCD->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_UnitCD" class="view_lab_profile_UnitCD">
<span<?php echo $view_lab_profile_delete->UnitCD->viewAttributes() ?>><?php echo $view_lab_profile_delete->UnitCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->Sample->Visible) { // Sample ?>
		<td <?php echo $view_lab_profile_delete->Sample->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_Sample" class="view_lab_profile_Sample">
<span<?php echo $view_lab_profile_delete->Sample->viewAttributes() ?>><?php echo $view_lab_profile_delete->Sample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->NoD->Visible) { // NoD ?>
		<td <?php echo $view_lab_profile_delete->NoD->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_NoD" class="view_lab_profile_NoD">
<span<?php echo $view_lab_profile_delete->NoD->viewAttributes() ?>><?php echo $view_lab_profile_delete->NoD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->BillOrder->Visible) { // BillOrder ?>
		<td <?php echo $view_lab_profile_delete->BillOrder->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_BillOrder" class="view_lab_profile_BillOrder">
<span<?php echo $view_lab_profile_delete->BillOrder->viewAttributes() ?>><?php echo $view_lab_profile_delete->BillOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->Inactive->Visible) { // Inactive ?>
		<td <?php echo $view_lab_profile_delete->Inactive->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_Inactive" class="view_lab_profile_Inactive">
<span<?php echo $view_lab_profile_delete->Inactive->viewAttributes() ?>><?php echo $view_lab_profile_delete->Inactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->Outsource->Visible) { // Outsource ?>
		<td <?php echo $view_lab_profile_delete->Outsource->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_Outsource" class="view_lab_profile_Outsource">
<span<?php echo $view_lab_profile_delete->Outsource->viewAttributes() ?>><?php echo $view_lab_profile_delete->Outsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->CollSample->Visible) { // CollSample ?>
		<td <?php echo $view_lab_profile_delete->CollSample->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_CollSample" class="view_lab_profile_CollSample">
<span<?php echo $view_lab_profile_delete->CollSample->viewAttributes() ?>><?php echo $view_lab_profile_delete->CollSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->TestType->Visible) { // TestType ?>
		<td <?php echo $view_lab_profile_delete->TestType->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_TestType" class="view_lab_profile_TestType">
<span<?php echo $view_lab_profile_delete->TestType->viewAttributes() ?>><?php echo $view_lab_profile_delete->TestType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->NoHeading->Visible) { // NoHeading ?>
		<td <?php echo $view_lab_profile_delete->NoHeading->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_NoHeading" class="view_lab_profile_NoHeading">
<span<?php echo $view_lab_profile_delete->NoHeading->viewAttributes() ?>><?php echo $view_lab_profile_delete->NoHeading->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->ChemicalCode->Visible) { // ChemicalCode ?>
		<td <?php echo $view_lab_profile_delete->ChemicalCode->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_ChemicalCode" class="view_lab_profile_ChemicalCode">
<span<?php echo $view_lab_profile_delete->ChemicalCode->viewAttributes() ?>><?php echo $view_lab_profile_delete->ChemicalCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->ChemicalName->Visible) { // ChemicalName ?>
		<td <?php echo $view_lab_profile_delete->ChemicalName->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_ChemicalName" class="view_lab_profile_ChemicalName">
<span<?php echo $view_lab_profile_delete->ChemicalName->viewAttributes() ?>><?php echo $view_lab_profile_delete->ChemicalName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_lab_profile_delete->Utilaization->Visible) { // Utilaization ?>
		<td <?php echo $view_lab_profile_delete->Utilaization->cellAttributes() ?>>
<span id="el<?php echo $view_lab_profile_delete->RowCount ?>_view_lab_profile_Utilaization" class="view_lab_profile_Utilaization">
<span<?php echo $view_lab_profile_delete->Utilaization->viewAttributes() ?>><?php echo $view_lab_profile_delete->Utilaization->getViewValue() ?></span>
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
$view_lab_profile_delete->terminate();
?>