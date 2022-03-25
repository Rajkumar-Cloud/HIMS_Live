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
<?php include_once "header.php" ?>
<?php if (!$view_lab_service_sub->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_lab_service_subview = currentForm = new ew.Form("fview_lab_service_subview", "view");

// Form_CustomValidate event
fview_lab_service_subview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_service_subview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_service_subview.lists["x_UNITS"] = <?php echo $view_lab_service_sub_view->UNITS->Lookup->toClientList() ?>;
fview_lab_service_subview.lists["x_UNITS"].options = <?php echo JsonEncode($view_lab_service_sub_view->UNITS->lookupOptions()) ?>;
fview_lab_service_subview.lists["x_SERVICE_TYPE"] = <?php echo $view_lab_service_sub_view->SERVICE_TYPE->Lookup->toClientList() ?>;
fview_lab_service_subview.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($view_lab_service_sub_view->SERVICE_TYPE->lookupOptions()) ?>;
fview_lab_service_subview.lists["x_DEPARTMENT"] = <?php echo $view_lab_service_sub_view->DEPARTMENT->Lookup->toClientList() ?>;
fview_lab_service_subview.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($view_lab_service_sub_view->DEPARTMENT->options(FALSE, TRUE)) ?>;
fview_lab_service_subview.lists["x_Inactive[]"] = <?php echo $view_lab_service_sub_view->Inactive->Lookup->toClientList() ?>;
fview_lab_service_subview.lists["x_Inactive[]"].options = <?php echo JsonEncode($view_lab_service_sub_view->Inactive->options(FALSE, TRUE)) ?>;
fview_lab_service_subview.lists["x_TestType"] = <?php echo $view_lab_service_sub_view->TestType->Lookup->toClientList() ?>;
fview_lab_service_subview.lists["x_TestType"].options = <?php echo JsonEncode($view_lab_service_sub_view->TestType->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_lab_service_sub->isExport()) { ?>
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
<?php if ($view_lab_service_sub_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_service_sub_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_service_sub">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_service_sub_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_lab_service_sub->Id->Visible) { // Id ?>
	<tr id="r_Id">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Id"><?php echo $view_lab_service_sub->Id->caption() ?></span></td>
		<td data-name="Id"<?php echo $view_lab_service_sub->Id->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Id">
<span<?php echo $view_lab_service_sub->Id->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->CODE->Visible) { // CODE ?>
	<tr id="r_CODE">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_CODE"><?php echo $view_lab_service_sub->CODE->caption() ?></span></td>
		<td data-name="CODE"<?php echo $view_lab_service_sub->CODE->cellAttributes() ?>>
<span id="el_view_lab_service_sub_CODE">
<span<?php echo $view_lab_service_sub->CODE->viewAttributes() ?>>
<?php echo $view_lab_service_sub->CODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->SERVICE->Visible) { // SERVICE ?>
	<tr id="r_SERVICE">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_SERVICE"><?php echo $view_lab_service_sub->SERVICE->caption() ?></span></td>
		<td data-name="SERVICE"<?php echo $view_lab_service_sub->SERVICE->cellAttributes() ?>>
<span id="el_view_lab_service_sub_SERVICE">
<span<?php echo $view_lab_service_sub->SERVICE->viewAttributes() ?>>
<?php echo $view_lab_service_sub->SERVICE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->UNITS->Visible) { // UNITS ?>
	<tr id="r_UNITS">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_UNITS"><?php echo $view_lab_service_sub->UNITS->caption() ?></span></td>
		<td data-name="UNITS"<?php echo $view_lab_service_sub->UNITS->cellAttributes() ?>>
<span id="el_view_lab_service_sub_UNITS">
<span<?php echo $view_lab_service_sub->UNITS->viewAttributes() ?>>
<?php echo $view_lab_service_sub->UNITS->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->AMOUNT->Visible) { // AMOUNT ?>
	<tr id="r_AMOUNT">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_AMOUNT"><?php echo $view_lab_service_sub->AMOUNT->caption() ?></span></td>
		<td data-name="AMOUNT"<?php echo $view_lab_service_sub->AMOUNT->cellAttributes() ?>>
<span id="el_view_lab_service_sub_AMOUNT">
<span<?php echo $view_lab_service_sub->AMOUNT->viewAttributes() ?>>
<?php echo $view_lab_service_sub->AMOUNT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<tr id="r_SERVICE_TYPE">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_SERVICE_TYPE"><?php echo $view_lab_service_sub->SERVICE_TYPE->caption() ?></span></td>
		<td data-name="SERVICE_TYPE"<?php echo $view_lab_service_sub->SERVICE_TYPE->cellAttributes() ?>>
<span id="el_view_lab_service_sub_SERVICE_TYPE">
<span<?php echo $view_lab_service_sub->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $view_lab_service_sub->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<tr id="r_DEPARTMENT">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_DEPARTMENT"><?php echo $view_lab_service_sub->DEPARTMENT->caption() ?></span></td>
		<td data-name="DEPARTMENT"<?php echo $view_lab_service_sub->DEPARTMENT->cellAttributes() ?>>
<span id="el_view_lab_service_sub_DEPARTMENT">
<span<?php echo $view_lab_service_sub->DEPARTMENT->viewAttributes() ?>>
<?php echo $view_lab_service_sub->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->Created->Visible) { // Created ?>
	<tr id="r_Created">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Created"><?php echo $view_lab_service_sub->Created->caption() ?></span></td>
		<td data-name="Created"<?php echo $view_lab_service_sub->Created->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Created">
<span<?php echo $view_lab_service_sub->Created->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_CreatedDateTime"><?php echo $view_lab_service_sub->CreatedDateTime->caption() ?></span></td>
		<td data-name="CreatedDateTime"<?php echo $view_lab_service_sub->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_lab_service_sub_CreatedDateTime">
<span<?php echo $view_lab_service_sub->CreatedDateTime->viewAttributes() ?>>
<?php echo $view_lab_service_sub->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->Modified->Visible) { // Modified ?>
	<tr id="r_Modified">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Modified"><?php echo $view_lab_service_sub->Modified->caption() ?></span></td>
		<td data-name="Modified"<?php echo $view_lab_service_sub->Modified->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Modified">
<span<?php echo $view_lab_service_sub->Modified->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Modified->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_ModifiedDateTime"><?php echo $view_lab_service_sub->ModifiedDateTime->caption() ?></span></td>
		<td data-name="ModifiedDateTime"<?php echo $view_lab_service_sub->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ModifiedDateTime">
<span<?php echo $view_lab_service_sub->ModifiedDateTime->viewAttributes() ?>>
<?php echo $view_lab_service_sub->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<tr id="r_mas_services_billingcol">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_mas_services_billingcol"><?php echo $view_lab_service_sub->mas_services_billingcol->caption() ?></span></td>
		<td data-name="mas_services_billingcol"<?php echo $view_lab_service_sub->mas_services_billingcol->cellAttributes() ?>>
<span id="el_view_lab_service_sub_mas_services_billingcol">
<span<?php echo $view_lab_service_sub->mas_services_billingcol->viewAttributes() ?>>
<?php echo $view_lab_service_sub->mas_services_billingcol->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->DrShareAmount->Visible) { // DrShareAmount ?>
	<tr id="r_DrShareAmount">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_DrShareAmount"><?php echo $view_lab_service_sub->DrShareAmount->caption() ?></span></td>
		<td data-name="DrShareAmount"<?php echo $view_lab_service_sub->DrShareAmount->cellAttributes() ?>>
<span id="el_view_lab_service_sub_DrShareAmount">
<span<?php echo $view_lab_service_sub->DrShareAmount->viewAttributes() ?>>
<?php echo $view_lab_service_sub->DrShareAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->HospShareAmount->Visible) { // HospShareAmount ?>
	<tr id="r_HospShareAmount">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_HospShareAmount"><?php echo $view_lab_service_sub->HospShareAmount->caption() ?></span></td>
		<td data-name="HospShareAmount"<?php echo $view_lab_service_sub->HospShareAmount->cellAttributes() ?>>
<span id="el_view_lab_service_sub_HospShareAmount">
<span<?php echo $view_lab_service_sub->HospShareAmount->viewAttributes() ?>>
<?php echo $view_lab_service_sub->HospShareAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->DrSharePer->Visible) { // DrSharePer ?>
	<tr id="r_DrSharePer">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_DrSharePer"><?php echo $view_lab_service_sub->DrSharePer->caption() ?></span></td>
		<td data-name="DrSharePer"<?php echo $view_lab_service_sub->DrSharePer->cellAttributes() ?>>
<span id="el_view_lab_service_sub_DrSharePer">
<span<?php echo $view_lab_service_sub->DrSharePer->viewAttributes() ?>>
<?php echo $view_lab_service_sub->DrSharePer->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->HospSharePer->Visible) { // HospSharePer ?>
	<tr id="r_HospSharePer">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_HospSharePer"><?php echo $view_lab_service_sub->HospSharePer->caption() ?></span></td>
		<td data-name="HospSharePer"<?php echo $view_lab_service_sub->HospSharePer->cellAttributes() ?>>
<span id="el_view_lab_service_sub_HospSharePer">
<span<?php echo $view_lab_service_sub->HospSharePer->viewAttributes() ?>>
<?php echo $view_lab_service_sub->HospSharePer->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_HospID"><?php echo $view_lab_service_sub->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $view_lab_service_sub->HospID->cellAttributes() ?>>
<span id="el_view_lab_service_sub_HospID">
<span<?php echo $view_lab_service_sub->HospID->viewAttributes() ?>>
<?php echo $view_lab_service_sub->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->TestSubCd->Visible) { // TestSubCd ?>
	<tr id="r_TestSubCd">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_TestSubCd"><?php echo $view_lab_service_sub->TestSubCd->caption() ?></span></td>
		<td data-name="TestSubCd"<?php echo $view_lab_service_sub->TestSubCd->cellAttributes() ?>>
<span id="el_view_lab_service_sub_TestSubCd">
<span<?php echo $view_lab_service_sub->TestSubCd->viewAttributes() ?>>
<?php echo $view_lab_service_sub->TestSubCd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->Method->Visible) { // Method ?>
	<tr id="r_Method">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Method"><?php echo $view_lab_service_sub->Method->caption() ?></span></td>
		<td data-name="Method"<?php echo $view_lab_service_sub->Method->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Method">
<span<?php echo $view_lab_service_sub->Method->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Method->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->Order->Visible) { // Order ?>
	<tr id="r_Order">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Order"><?php echo $view_lab_service_sub->Order->caption() ?></span></td>
		<td data-name="Order"<?php echo $view_lab_service_sub->Order->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Order">
<span<?php echo $view_lab_service_sub->Order->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Order->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->Form->Visible) { // Form ?>
	<tr id="r_Form">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Form"><?php echo $view_lab_service_sub->Form->caption() ?></span></td>
		<td data-name="Form"<?php echo $view_lab_service_sub->Form->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Form">
<span<?php echo $view_lab_service_sub->Form->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Form->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->ResType->Visible) { // ResType ?>
	<tr id="r_ResType">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_ResType"><?php echo $view_lab_service_sub->ResType->caption() ?></span></td>
		<td data-name="ResType"<?php echo $view_lab_service_sub->ResType->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ResType">
<span<?php echo $view_lab_service_sub->ResType->viewAttributes() ?>>
<?php echo $view_lab_service_sub->ResType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->UnitCD->Visible) { // UnitCD ?>
	<tr id="r_UnitCD">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_UnitCD"><?php echo $view_lab_service_sub->UnitCD->caption() ?></span></td>
		<td data-name="UnitCD"<?php echo $view_lab_service_sub->UnitCD->cellAttributes() ?>>
<span id="el_view_lab_service_sub_UnitCD">
<span<?php echo $view_lab_service_sub->UnitCD->viewAttributes() ?>>
<?php echo $view_lab_service_sub->UnitCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->RefValue->Visible) { // RefValue ?>
	<tr id="r_RefValue">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_RefValue"><?php echo $view_lab_service_sub->RefValue->caption() ?></span></td>
		<td data-name="RefValue"<?php echo $view_lab_service_sub->RefValue->cellAttributes() ?>>
<span id="el_view_lab_service_sub_RefValue">
<span<?php echo $view_lab_service_sub->RefValue->viewAttributes() ?>>
<?php echo $view_lab_service_sub->RefValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->Sample->Visible) { // Sample ?>
	<tr id="r_Sample">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Sample"><?php echo $view_lab_service_sub->Sample->caption() ?></span></td>
		<td data-name="Sample"<?php echo $view_lab_service_sub->Sample->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Sample">
<span<?php echo $view_lab_service_sub->Sample->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Sample->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->NoD->Visible) { // NoD ?>
	<tr id="r_NoD">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_NoD"><?php echo $view_lab_service_sub->NoD->caption() ?></span></td>
		<td data-name="NoD"<?php echo $view_lab_service_sub->NoD->cellAttributes() ?>>
<span id="el_view_lab_service_sub_NoD">
<span<?php echo $view_lab_service_sub->NoD->viewAttributes() ?>>
<?php echo $view_lab_service_sub->NoD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->BillOrder->Visible) { // BillOrder ?>
	<tr id="r_BillOrder">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_BillOrder"><?php echo $view_lab_service_sub->BillOrder->caption() ?></span></td>
		<td data-name="BillOrder"<?php echo $view_lab_service_sub->BillOrder->cellAttributes() ?>>
<span id="el_view_lab_service_sub_BillOrder">
<span<?php echo $view_lab_service_sub->BillOrder->viewAttributes() ?>>
<?php echo $view_lab_service_sub->BillOrder->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->Formula->Visible) { // Formula ?>
	<tr id="r_Formula">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Formula"><?php echo $view_lab_service_sub->Formula->caption() ?></span></td>
		<td data-name="Formula"<?php echo $view_lab_service_sub->Formula->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Formula">
<span<?php echo $view_lab_service_sub->Formula->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Formula->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->Inactive->Visible) { // Inactive ?>
	<tr id="r_Inactive">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Inactive"><?php echo $view_lab_service_sub->Inactive->caption() ?></span></td>
		<td data-name="Inactive"<?php echo $view_lab_service_sub->Inactive->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Inactive">
<span<?php echo $view_lab_service_sub->Inactive->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Inactive->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->Outsource->Visible) { // Outsource ?>
	<tr id="r_Outsource">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Outsource"><?php echo $view_lab_service_sub->Outsource->caption() ?></span></td>
		<td data-name="Outsource"<?php echo $view_lab_service_sub->Outsource->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Outsource">
<span<?php echo $view_lab_service_sub->Outsource->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Outsource->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->CollSample->Visible) { // CollSample ?>
	<tr id="r_CollSample">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_CollSample"><?php echo $view_lab_service_sub->CollSample->caption() ?></span></td>
		<td data-name="CollSample"<?php echo $view_lab_service_sub->CollSample->cellAttributes() ?>>
<span id="el_view_lab_service_sub_CollSample">
<span<?php echo $view_lab_service_sub->CollSample->viewAttributes() ?>>
<?php echo $view_lab_service_sub->CollSample->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->TestType->Visible) { // TestType ?>
	<tr id="r_TestType">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_TestType"><?php echo $view_lab_service_sub->TestType->caption() ?></span></td>
		<td data-name="TestType"<?php echo $view_lab_service_sub->TestType->cellAttributes() ?>>
<span id="el_view_lab_service_sub_TestType">
<span<?php echo $view_lab_service_sub->TestType->viewAttributes() ?>>
<?php echo $view_lab_service_sub->TestType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->NoHeading->Visible) { // NoHeading ?>
	<tr id="r_NoHeading">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_NoHeading"><?php echo $view_lab_service_sub->NoHeading->caption() ?></span></td>
		<td data-name="NoHeading"<?php echo $view_lab_service_sub->NoHeading->cellAttributes() ?>>
<span id="el_view_lab_service_sub_NoHeading">
<span<?php echo $view_lab_service_sub->NoHeading->viewAttributes() ?>>
<?php echo $view_lab_service_sub->NoHeading->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->ChemicalCode->Visible) { // ChemicalCode ?>
	<tr id="r_ChemicalCode">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_ChemicalCode"><?php echo $view_lab_service_sub->ChemicalCode->caption() ?></span></td>
		<td data-name="ChemicalCode"<?php echo $view_lab_service_sub->ChemicalCode->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ChemicalCode">
<span<?php echo $view_lab_service_sub->ChemicalCode->viewAttributes() ?>>
<?php echo $view_lab_service_sub->ChemicalCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->ChemicalName->Visible) { // ChemicalName ?>
	<tr id="r_ChemicalName">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_ChemicalName"><?php echo $view_lab_service_sub->ChemicalName->caption() ?></span></td>
		<td data-name="ChemicalName"<?php echo $view_lab_service_sub->ChemicalName->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ChemicalName">
<span<?php echo $view_lab_service_sub->ChemicalName->viewAttributes() ?>>
<?php echo $view_lab_service_sub->ChemicalName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->Utilaization->Visible) { // Utilaization ?>
	<tr id="r_Utilaization">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Utilaization"><?php echo $view_lab_service_sub->Utilaization->caption() ?></span></td>
		<td data-name="Utilaization"<?php echo $view_lab_service_sub->Utilaization->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Utilaization">
<span<?php echo $view_lab_service_sub->Utilaization->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Utilaization->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service_sub->Interpretation->Visible) { // Interpretation ?>
	<tr id="r_Interpretation">
		<td class="<?php echo $view_lab_service_sub_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Interpretation"><?php echo $view_lab_service_sub->Interpretation->caption() ?></span></td>
		<td data-name="Interpretation"<?php echo $view_lab_service_sub->Interpretation->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Interpretation">
<span<?php echo $view_lab_service_sub->Interpretation->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Interpretation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_lab_service_sub_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_lab_service_sub->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_lab_service_sub_view->terminate();
?>