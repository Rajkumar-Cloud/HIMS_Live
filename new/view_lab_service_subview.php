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
$view_lab_service_sub_view = new view_lab_service_sub_view();

// Run the page
$view_lab_service_sub_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_service_sub_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_lab_service_sub_view->isExport()) { ?>
<script>
var fview_lab_service_subview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fview_lab_service_subview = currentForm = new ew.Form("fview_lab_service_subview", "view");
	loadjs.done("fview_lab_service_subview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_lab_service_sub_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_lab_service_sub_view->ExportOptions->render("body") ?>
<?php $view_lab_service_sub_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_lab_service_sub_view->showPageHeader(); ?>
<?php
$view_lab_service_sub_view->showMessage();
?>
<form name="fview_lab_service_subview" id="fview_lab_service_subview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_service_sub">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_service_sub_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_lab_service_sub_view->Id->Visible) { // Id ?>
	<tr id="r_Id">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Id"><?php echo $view_lab_service_sub_view->Id->caption() ?></span></td>
		<td data-name="Id" <?php echo $view_lab_service_sub_view->Id->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Id">
<span<?php echo $view_lab_service_sub_view->Id->viewAttributes() ?>><?php echo $view_lab_service_sub_view->Id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->CODE->Visible) { // CODE ?>
	<tr id="r_CODE">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_CODE"><?php echo $view_lab_service_sub_view->CODE->caption() ?></span></td>
		<td data-name="CODE" <?php echo $view_lab_service_sub_view->CODE->cellAttributes() ?>>
<span id="el_view_lab_service_sub_CODE">
<span<?php echo $view_lab_service_sub_view->CODE->viewAttributes() ?>><?php echo $view_lab_service_sub_view->CODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->SERVICE->Visible) { // SERVICE ?>
	<tr id="r_SERVICE">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_SERVICE"><?php echo $view_lab_service_sub_view->SERVICE->caption() ?></span></td>
		<td data-name="SERVICE" <?php echo $view_lab_service_sub_view->SERVICE->cellAttributes() ?>>
<span id="el_view_lab_service_sub_SERVICE">
<span<?php echo $view_lab_service_sub_view->SERVICE->viewAttributes() ?>><?php echo $view_lab_service_sub_view->SERVICE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->UNITS->Visible) { // UNITS ?>
	<tr id="r_UNITS">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_UNITS"><?php echo $view_lab_service_sub_view->UNITS->caption() ?></span></td>
		<td data-name="UNITS" <?php echo $view_lab_service_sub_view->UNITS->cellAttributes() ?>>
<span id="el_view_lab_service_sub_UNITS">
<span<?php echo $view_lab_service_sub_view->UNITS->viewAttributes() ?>><?php echo $view_lab_service_sub_view->UNITS->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->AMOUNT->Visible) { // AMOUNT ?>
	<tr id="r_AMOUNT">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_AMOUNT"><?php echo $view_lab_service_sub_view->AMOUNT->caption() ?></span></td>
		<td data-name="AMOUNT" <?php echo $view_lab_service_sub_view->AMOUNT->cellAttributes() ?>>
<span id="el_view_lab_service_sub_AMOUNT">
<span<?php echo $view_lab_service_sub_view->AMOUNT->viewAttributes() ?>><?php echo $view_lab_service_sub_view->AMOUNT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<tr id="r_SERVICE_TYPE">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_SERVICE_TYPE"><?php echo $view_lab_service_sub_view->SERVICE_TYPE->caption() ?></span></td>
		<td data-name="SERVICE_TYPE" <?php echo $view_lab_service_sub_view->SERVICE_TYPE->cellAttributes() ?>>
<span id="el_view_lab_service_sub_SERVICE_TYPE">
<span<?php echo $view_lab_service_sub_view->SERVICE_TYPE->viewAttributes() ?>><?php echo $view_lab_service_sub_view->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<tr id="r_DEPARTMENT">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_DEPARTMENT"><?php echo $view_lab_service_sub_view->DEPARTMENT->caption() ?></span></td>
		<td data-name="DEPARTMENT" <?php echo $view_lab_service_sub_view->DEPARTMENT->cellAttributes() ?>>
<span id="el_view_lab_service_sub_DEPARTMENT">
<span<?php echo $view_lab_service_sub_view->DEPARTMENT->viewAttributes() ?>><?php echo $view_lab_service_sub_view->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->Created->Visible) { // Created ?>
	<tr id="r_Created">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Created"><?php echo $view_lab_service_sub_view->Created->caption() ?></span></td>
		<td data-name="Created" <?php echo $view_lab_service_sub_view->Created->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Created">
<span<?php echo $view_lab_service_sub_view->Created->viewAttributes() ?>><?php echo $view_lab_service_sub_view->Created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_CreatedDateTime"><?php echo $view_lab_service_sub_view->CreatedDateTime->caption() ?></span></td>
		<td data-name="CreatedDateTime" <?php echo $view_lab_service_sub_view->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_lab_service_sub_CreatedDateTime">
<span<?php echo $view_lab_service_sub_view->CreatedDateTime->viewAttributes() ?>><?php echo $view_lab_service_sub_view->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->Modified->Visible) { // Modified ?>
	<tr id="r_Modified">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Modified"><?php echo $view_lab_service_sub_view->Modified->caption() ?></span></td>
		<td data-name="Modified" <?php echo $view_lab_service_sub_view->Modified->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Modified">
<span<?php echo $view_lab_service_sub_view->Modified->viewAttributes() ?>><?php echo $view_lab_service_sub_view->Modified->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_ModifiedDateTime"><?php echo $view_lab_service_sub_view->ModifiedDateTime->caption() ?></span></td>
		<td data-name="ModifiedDateTime" <?php echo $view_lab_service_sub_view->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ModifiedDateTime">
<span<?php echo $view_lab_service_sub_view->ModifiedDateTime->viewAttributes() ?>><?php echo $view_lab_service_sub_view->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<tr id="r_mas_services_billingcol">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_mas_services_billingcol"><?php echo $view_lab_service_sub_view->mas_services_billingcol->caption() ?></span></td>
		<td data-name="mas_services_billingcol" <?php echo $view_lab_service_sub_view->mas_services_billingcol->cellAttributes() ?>>
<span id="el_view_lab_service_sub_mas_services_billingcol">
<span<?php echo $view_lab_service_sub_view->mas_services_billingcol->viewAttributes() ?>><?php echo $view_lab_service_sub_view->mas_services_billingcol->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->DrShareAmount->Visible) { // DrShareAmount ?>
	<tr id="r_DrShareAmount">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_DrShareAmount"><?php echo $view_lab_service_sub_view->DrShareAmount->caption() ?></span></td>
		<td data-name="DrShareAmount" <?php echo $view_lab_service_sub_view->DrShareAmount->cellAttributes() ?>>
<span id="el_view_lab_service_sub_DrShareAmount">
<span<?php echo $view_lab_service_sub_view->DrShareAmount->viewAttributes() ?>><?php echo $view_lab_service_sub_view->DrShareAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->HospShareAmount->Visible) { // HospShareAmount ?>
	<tr id="r_HospShareAmount">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_HospShareAmount"><?php echo $view_lab_service_sub_view->HospShareAmount->caption() ?></span></td>
		<td data-name="HospShareAmount" <?php echo $view_lab_service_sub_view->HospShareAmount->cellAttributes() ?>>
<span id="el_view_lab_service_sub_HospShareAmount">
<span<?php echo $view_lab_service_sub_view->HospShareAmount->viewAttributes() ?>><?php echo $view_lab_service_sub_view->HospShareAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->DrSharePer->Visible) { // DrSharePer ?>
	<tr id="r_DrSharePer">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_DrSharePer"><?php echo $view_lab_service_sub_view->DrSharePer->caption() ?></span></td>
		<td data-name="DrSharePer" <?php echo $view_lab_service_sub_view->DrSharePer->cellAttributes() ?>>
<span id="el_view_lab_service_sub_DrSharePer">
<span<?php echo $view_lab_service_sub_view->DrSharePer->viewAttributes() ?>><?php echo $view_lab_service_sub_view->DrSharePer->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->HospSharePer->Visible) { // HospSharePer ?>
	<tr id="r_HospSharePer">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_HospSharePer"><?php echo $view_lab_service_sub_view->HospSharePer->caption() ?></span></td>
		<td data-name="HospSharePer" <?php echo $view_lab_service_sub_view->HospSharePer->cellAttributes() ?>>
<span id="el_view_lab_service_sub_HospSharePer">
<span<?php echo $view_lab_service_sub_view->HospSharePer->viewAttributes() ?>><?php echo $view_lab_service_sub_view->HospSharePer->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_HospID"><?php echo $view_lab_service_sub_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $view_lab_service_sub_view->HospID->cellAttributes() ?>>
<span id="el_view_lab_service_sub_HospID">
<span<?php echo $view_lab_service_sub_view->HospID->viewAttributes() ?>><?php echo $view_lab_service_sub_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->TestSubCd->Visible) { // TestSubCd ?>
	<tr id="r_TestSubCd">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_TestSubCd"><?php echo $view_lab_service_sub_view->TestSubCd->caption() ?></span></td>
		<td data-name="TestSubCd" <?php echo $view_lab_service_sub_view->TestSubCd->cellAttributes() ?>>
<span id="el_view_lab_service_sub_TestSubCd">
<span<?php echo $view_lab_service_sub_view->TestSubCd->viewAttributes() ?>><?php echo $view_lab_service_sub_view->TestSubCd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->Method->Visible) { // Method ?>
	<tr id="r_Method">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Method"><?php echo $view_lab_service_sub_view->Method->caption() ?></span></td>
		<td data-name="Method" <?php echo $view_lab_service_sub_view->Method->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Method">
<span<?php echo $view_lab_service_sub_view->Method->viewAttributes() ?>><?php echo $view_lab_service_sub_view->Method->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->Order->Visible) { // Order ?>
	<tr id="r_Order">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Order"><?php echo $view_lab_service_sub_view->Order->caption() ?></span></td>
		<td data-name="Order" <?php echo $view_lab_service_sub_view->Order->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Order">
<span<?php echo $view_lab_service_sub_view->Order->viewAttributes() ?>><?php echo $view_lab_service_sub_view->Order->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->Form->Visible) { // Form ?>
	<tr id="r_Form">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Form"><?php echo $view_lab_service_sub_view->Form->caption() ?></span></td>
		<td data-name="Form" <?php echo $view_lab_service_sub_view->Form->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Form">
<span<?php echo $view_lab_service_sub_view->Form->viewAttributes() ?>><?php echo $view_lab_service_sub_view->Form->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->ResType->Visible) { // ResType ?>
	<tr id="r_ResType">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_ResType"><?php echo $view_lab_service_sub_view->ResType->caption() ?></span></td>
		<td data-name="ResType" <?php echo $view_lab_service_sub_view->ResType->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ResType">
<span<?php echo $view_lab_service_sub_view->ResType->viewAttributes() ?>><?php echo $view_lab_service_sub_view->ResType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->UnitCD->Visible) { // UnitCD ?>
	<tr id="r_UnitCD">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_UnitCD"><?php echo $view_lab_service_sub_view->UnitCD->caption() ?></span></td>
		<td data-name="UnitCD" <?php echo $view_lab_service_sub_view->UnitCD->cellAttributes() ?>>
<span id="el_view_lab_service_sub_UnitCD">
<span<?php echo $view_lab_service_sub_view->UnitCD->viewAttributes() ?>><?php echo $view_lab_service_sub_view->UnitCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->RefValue->Visible) { // RefValue ?>
	<tr id="r_RefValue">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_RefValue"><?php echo $view_lab_service_sub_view->RefValue->caption() ?></span></td>
		<td data-name="RefValue" <?php echo $view_lab_service_sub_view->RefValue->cellAttributes() ?>>
<span id="el_view_lab_service_sub_RefValue">
<span<?php echo $view_lab_service_sub_view->RefValue->viewAttributes() ?>><?php echo $view_lab_service_sub_view->RefValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->Sample->Visible) { // Sample ?>
	<tr id="r_Sample">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Sample"><?php echo $view_lab_service_sub_view->Sample->caption() ?></span></td>
		<td data-name="Sample" <?php echo $view_lab_service_sub_view->Sample->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Sample">
<span<?php echo $view_lab_service_sub_view->Sample->viewAttributes() ?>><?php echo $view_lab_service_sub_view->Sample->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->NoD->Visible) { // NoD ?>
	<tr id="r_NoD">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_NoD"><?php echo $view_lab_service_sub_view->NoD->caption() ?></span></td>
		<td data-name="NoD" <?php echo $view_lab_service_sub_view->NoD->cellAttributes() ?>>
<span id="el_view_lab_service_sub_NoD">
<span<?php echo $view_lab_service_sub_view->NoD->viewAttributes() ?>><?php echo $view_lab_service_sub_view->NoD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->BillOrder->Visible) { // BillOrder ?>
	<tr id="r_BillOrder">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_BillOrder"><?php echo $view_lab_service_sub_view->BillOrder->caption() ?></span></td>
		<td data-name="BillOrder" <?php echo $view_lab_service_sub_view->BillOrder->cellAttributes() ?>>
<span id="el_view_lab_service_sub_BillOrder">
<span<?php echo $view_lab_service_sub_view->BillOrder->viewAttributes() ?>><?php echo $view_lab_service_sub_view->BillOrder->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->Formula->Visible) { // Formula ?>
	<tr id="r_Formula">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Formula"><?php echo $view_lab_service_sub_view->Formula->caption() ?></span></td>
		<td data-name="Formula" <?php echo $view_lab_service_sub_view->Formula->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Formula">
<span<?php echo $view_lab_service_sub_view->Formula->viewAttributes() ?>><?php echo $view_lab_service_sub_view->Formula->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->Inactive->Visible) { // Inactive ?>
	<tr id="r_Inactive">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Inactive"><?php echo $view_lab_service_sub_view->Inactive->caption() ?></span></td>
		<td data-name="Inactive" <?php echo $view_lab_service_sub_view->Inactive->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Inactive">
<span<?php echo $view_lab_service_sub_view->Inactive->viewAttributes() ?>><?php echo $view_lab_service_sub_view->Inactive->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->Outsource->Visible) { // Outsource ?>
	<tr id="r_Outsource">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Outsource"><?php echo $view_lab_service_sub_view->Outsource->caption() ?></span></td>
		<td data-name="Outsource" <?php echo $view_lab_service_sub_view->Outsource->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Outsource">
<span<?php echo $view_lab_service_sub_view->Outsource->viewAttributes() ?>><?php echo $view_lab_service_sub_view->Outsource->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->CollSample->Visible) { // CollSample ?>
	<tr id="r_CollSample">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_CollSample"><?php echo $view_lab_service_sub_view->CollSample->caption() ?></span></td>
		<td data-name="CollSample" <?php echo $view_lab_service_sub_view->CollSample->cellAttributes() ?>>
<span id="el_view_lab_service_sub_CollSample">
<span<?php echo $view_lab_service_sub_view->CollSample->viewAttributes() ?>><?php echo $view_lab_service_sub_view->CollSample->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->TestType->Visible) { // TestType ?>
	<tr id="r_TestType">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_TestType"><?php echo $view_lab_service_sub_view->TestType->caption() ?></span></td>
		<td data-name="TestType" <?php echo $view_lab_service_sub_view->TestType->cellAttributes() ?>>
<span id="el_view_lab_service_sub_TestType">
<span<?php echo $view_lab_service_sub_view->TestType->viewAttributes() ?>><?php echo $view_lab_service_sub_view->TestType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->NoHeading->Visible) { // NoHeading ?>
	<tr id="r_NoHeading">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_NoHeading"><?php echo $view_lab_service_sub_view->NoHeading->caption() ?></span></td>
		<td data-name="NoHeading" <?php echo $view_lab_service_sub_view->NoHeading->cellAttributes() ?>>
<span id="el_view_lab_service_sub_NoHeading">
<span<?php echo $view_lab_service_sub_view->NoHeading->viewAttributes() ?>><?php echo $view_lab_service_sub_view->NoHeading->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->ChemicalCode->Visible) { // ChemicalCode ?>
	<tr id="r_ChemicalCode">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_ChemicalCode"><?php echo $view_lab_service_sub_view->ChemicalCode->caption() ?></span></td>
		<td data-name="ChemicalCode" <?php echo $view_lab_service_sub_view->ChemicalCode->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ChemicalCode">
<span<?php echo $view_lab_service_sub_view->ChemicalCode->viewAttributes() ?>><?php echo $view_lab_service_sub_view->ChemicalCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->ChemicalName->Visible) { // ChemicalName ?>
	<tr id="r_ChemicalName">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_ChemicalName"><?php echo $view_lab_service_sub_view->ChemicalName->caption() ?></span></td>
		<td data-name="ChemicalName" <?php echo $view_lab_service_sub_view->ChemicalName->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ChemicalName">
<span<?php echo $view_lab_service_sub_view->ChemicalName->viewAttributes() ?>><?php echo $view_lab_service_sub_view->ChemicalName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->Utilaization->Visible) { // Utilaization ?>
	<tr id="r_Utilaization">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Utilaization"><?php echo $view_lab_service_sub_view->Utilaization->caption() ?></span></td>
		<td data-name="Utilaization" <?php echo $view_lab_service_sub_view->Utilaization->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Utilaization">
<span<?php echo $view_lab_service_sub_view->Utilaization->viewAttributes() ?>><?php echo $view_lab_service_sub_view->Utilaization->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub_view->Interpretation->Visible) { // Interpretation ?>
	<tr id="r_Interpretation">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Interpretation"><?php echo $view_lab_service_sub_view->Interpretation->caption() ?></span></td>
		<td data-name="Interpretation" <?php echo $view_lab_service_sub_view->Interpretation->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Interpretation">
<span<?php echo $view_lab_service_sub_view->Interpretation->viewAttributes() ?>><?php echo $view_lab_service_sub_view->Interpretation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_lab_service_sub_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_lab_service_sub_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_lab_service_sub_view->terminate();
?>