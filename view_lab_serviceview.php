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
$view_lab_service_view = new view_lab_service_view();

// Run the page
$view_lab_service_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_service_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_lab_service->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_lab_serviceview = currentForm = new ew.Form("fview_lab_serviceview", "view");

// Form_CustomValidate event
fview_lab_serviceview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_serviceview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_serviceview.lists["x_UNITS"] = <?php echo $view_lab_service_view->UNITS->Lookup->toClientList() ?>;
fview_lab_serviceview.lists["x_UNITS"].options = <?php echo JsonEncode($view_lab_service_view->UNITS->lookupOptions()) ?>;
fview_lab_serviceview.lists["x_SERVICE_TYPE"] = <?php echo $view_lab_service_view->SERVICE_TYPE->Lookup->toClientList() ?>;
fview_lab_serviceview.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($view_lab_service_view->SERVICE_TYPE->lookupOptions()) ?>;
fview_lab_serviceview.lists["x_DEPARTMENT"] = <?php echo $view_lab_service_view->DEPARTMENT->Lookup->toClientList() ?>;
fview_lab_serviceview.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($view_lab_service_view->DEPARTMENT->options(FALSE, TRUE)) ?>;
fview_lab_serviceview.lists["x_Inactive[]"] = <?php echo $view_lab_service_view->Inactive->Lookup->toClientList() ?>;
fview_lab_serviceview.lists["x_Inactive[]"].options = <?php echo JsonEncode($view_lab_service_view->Inactive->options(FALSE, TRUE)) ?>;
fview_lab_serviceview.lists["x_TestType"] = <?php echo $view_lab_service_view->TestType->Lookup->toClientList() ?>;
fview_lab_serviceview.lists["x_TestType"].options = <?php echo JsonEncode($view_lab_service_view->TestType->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_lab_service->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_lab_service_view->ExportOptions->render("body") ?>
<?php $view_lab_service_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_lab_service_view->showPageHeader(); ?>
<?php
$view_lab_service_view->showMessage();
?>
<form name="fview_lab_serviceview" id="fview_lab_serviceview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_service_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_service_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_service">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_service_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_lab_service->Id->Visible) { // Id ?>
	<tr id="r_Id">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_Id"><script id="tpc_view_lab_service_Id" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->Id->caption() ?></span></script></span></td>
		<td data-name="Id"<?php echo $view_lab_service->Id->cellAttributes() ?>>
<script id="tpx_view_lab_service_Id" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_Id">
<span<?php echo $view_lab_service->Id->viewAttributes() ?>>
<?php echo $view_lab_service->Id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->CODE->Visible) { // CODE ?>
	<tr id="r_CODE">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_CODE"><script id="tpc_view_lab_service_CODE" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->CODE->caption() ?></span></script></span></td>
		<td data-name="CODE"<?php echo $view_lab_service->CODE->cellAttributes() ?>>
<script id="tpx_view_lab_service_CODE" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_CODE">
<span<?php echo $view_lab_service->CODE->viewAttributes() ?>>
<?php echo $view_lab_service->CODE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->SERVICE->Visible) { // SERVICE ?>
	<tr id="r_SERVICE">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_SERVICE"><script id="tpc_view_lab_service_SERVICE" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->SERVICE->caption() ?></span></script></span></td>
		<td data-name="SERVICE"<?php echo $view_lab_service->SERVICE->cellAttributes() ?>>
<script id="tpx_view_lab_service_SERVICE" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_SERVICE">
<span<?php echo $view_lab_service->SERVICE->viewAttributes() ?>>
<?php echo $view_lab_service->SERVICE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->UNITS->Visible) { // UNITS ?>
	<tr id="r_UNITS">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_UNITS"><script id="tpc_view_lab_service_UNITS" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->UNITS->caption() ?></span></script></span></td>
		<td data-name="UNITS"<?php echo $view_lab_service->UNITS->cellAttributes() ?>>
<script id="tpx_view_lab_service_UNITS" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_UNITS">
<span<?php echo $view_lab_service->UNITS->viewAttributes() ?>>
<?php echo $view_lab_service->UNITS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->AMOUNT->Visible) { // AMOUNT ?>
	<tr id="r_AMOUNT">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_AMOUNT"><script id="tpc_view_lab_service_AMOUNT" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->AMOUNT->caption() ?></span></script></span></td>
		<td data-name="AMOUNT"<?php echo $view_lab_service->AMOUNT->cellAttributes() ?>>
<script id="tpx_view_lab_service_AMOUNT" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_AMOUNT">
<span<?php echo $view_lab_service->AMOUNT->viewAttributes() ?>>
<?php echo $view_lab_service->AMOUNT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<tr id="r_SERVICE_TYPE">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_SERVICE_TYPE"><script id="tpc_view_lab_service_SERVICE_TYPE" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->SERVICE_TYPE->caption() ?></span></script></span></td>
		<td data-name="SERVICE_TYPE"<?php echo $view_lab_service->SERVICE_TYPE->cellAttributes() ?>>
<script id="tpx_view_lab_service_SERVICE_TYPE" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_SERVICE_TYPE">
<span<?php echo $view_lab_service->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $view_lab_service->SERVICE_TYPE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<tr id="r_DEPARTMENT">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_DEPARTMENT"><script id="tpc_view_lab_service_DEPARTMENT" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->DEPARTMENT->caption() ?></span></script></span></td>
		<td data-name="DEPARTMENT"<?php echo $view_lab_service->DEPARTMENT->cellAttributes() ?>>
<script id="tpx_view_lab_service_DEPARTMENT" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_DEPARTMENT">
<span<?php echo $view_lab_service->DEPARTMENT->viewAttributes() ?>>
<?php echo $view_lab_service->DEPARTMENT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->Created->Visible) { // Created ?>
	<tr id="r_Created">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_Created"><script id="tpc_view_lab_service_Created" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->Created->caption() ?></span></script></span></td>
		<td data-name="Created"<?php echo $view_lab_service->Created->cellAttributes() ?>>
<script id="tpx_view_lab_service_Created" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_Created">
<span<?php echo $view_lab_service->Created->viewAttributes() ?>>
<?php echo $view_lab_service->Created->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_CreatedDateTime"><script id="tpc_view_lab_service_CreatedDateTime" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->CreatedDateTime->caption() ?></span></script></span></td>
		<td data-name="CreatedDateTime"<?php echo $view_lab_service->CreatedDateTime->cellAttributes() ?>>
<script id="tpx_view_lab_service_CreatedDateTime" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_CreatedDateTime">
<span<?php echo $view_lab_service->CreatedDateTime->viewAttributes() ?>>
<?php echo $view_lab_service->CreatedDateTime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->Modified->Visible) { // Modified ?>
	<tr id="r_Modified">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_Modified"><script id="tpc_view_lab_service_Modified" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->Modified->caption() ?></span></script></span></td>
		<td data-name="Modified"<?php echo $view_lab_service->Modified->cellAttributes() ?>>
<script id="tpx_view_lab_service_Modified" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_Modified">
<span<?php echo $view_lab_service->Modified->viewAttributes() ?>>
<?php echo $view_lab_service->Modified->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_ModifiedDateTime"><script id="tpc_view_lab_service_ModifiedDateTime" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->ModifiedDateTime->caption() ?></span></script></span></td>
		<td data-name="ModifiedDateTime"<?php echo $view_lab_service->ModifiedDateTime->cellAttributes() ?>>
<script id="tpx_view_lab_service_ModifiedDateTime" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_ModifiedDateTime">
<span<?php echo $view_lab_service->ModifiedDateTime->viewAttributes() ?>>
<?php echo $view_lab_service->ModifiedDateTime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<tr id="r_mas_services_billingcol">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_mas_services_billingcol"><script id="tpc_view_lab_service_mas_services_billingcol" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->mas_services_billingcol->caption() ?></span></script></span></td>
		<td data-name="mas_services_billingcol"<?php echo $view_lab_service->mas_services_billingcol->cellAttributes() ?>>
<script id="tpx_view_lab_service_mas_services_billingcol" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_mas_services_billingcol">
<span<?php echo $view_lab_service->mas_services_billingcol->viewAttributes() ?>>
<?php echo $view_lab_service->mas_services_billingcol->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->DrShareAmount->Visible) { // DrShareAmount ?>
	<tr id="r_DrShareAmount">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_DrShareAmount"><script id="tpc_view_lab_service_DrShareAmount" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->DrShareAmount->caption() ?></span></script></span></td>
		<td data-name="DrShareAmount"<?php echo $view_lab_service->DrShareAmount->cellAttributes() ?>>
<script id="tpx_view_lab_service_DrShareAmount" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_DrShareAmount">
<span<?php echo $view_lab_service->DrShareAmount->viewAttributes() ?>>
<?php echo $view_lab_service->DrShareAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->HospShareAmount->Visible) { // HospShareAmount ?>
	<tr id="r_HospShareAmount">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_HospShareAmount"><script id="tpc_view_lab_service_HospShareAmount" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->HospShareAmount->caption() ?></span></script></span></td>
		<td data-name="HospShareAmount"<?php echo $view_lab_service->HospShareAmount->cellAttributes() ?>>
<script id="tpx_view_lab_service_HospShareAmount" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_HospShareAmount">
<span<?php echo $view_lab_service->HospShareAmount->viewAttributes() ?>>
<?php echo $view_lab_service->HospShareAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->DrSharePer->Visible) { // DrSharePer ?>
	<tr id="r_DrSharePer">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_DrSharePer"><script id="tpc_view_lab_service_DrSharePer" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->DrSharePer->caption() ?></span></script></span></td>
		<td data-name="DrSharePer"<?php echo $view_lab_service->DrSharePer->cellAttributes() ?>>
<script id="tpx_view_lab_service_DrSharePer" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_DrSharePer">
<span<?php echo $view_lab_service->DrSharePer->viewAttributes() ?>>
<?php echo $view_lab_service->DrSharePer->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->HospSharePer->Visible) { // HospSharePer ?>
	<tr id="r_HospSharePer">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_HospSharePer"><script id="tpc_view_lab_service_HospSharePer" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->HospSharePer->caption() ?></span></script></span></td>
		<td data-name="HospSharePer"<?php echo $view_lab_service->HospSharePer->cellAttributes() ?>>
<script id="tpx_view_lab_service_HospSharePer" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_HospSharePer">
<span<?php echo $view_lab_service->HospSharePer->viewAttributes() ?>>
<?php echo $view_lab_service->HospSharePer->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_HospID"><script id="tpc_view_lab_service_HospID" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $view_lab_service->HospID->cellAttributes() ?>>
<script id="tpx_view_lab_service_HospID" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_HospID">
<span<?php echo $view_lab_service->HospID->viewAttributes() ?>>
<?php echo $view_lab_service->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->TestSubCd->Visible) { // TestSubCd ?>
	<tr id="r_TestSubCd">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_TestSubCd"><script id="tpc_view_lab_service_TestSubCd" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->TestSubCd->caption() ?></span></script></span></td>
		<td data-name="TestSubCd"<?php echo $view_lab_service->TestSubCd->cellAttributes() ?>>
<script id="tpx_view_lab_service_TestSubCd" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_TestSubCd">
<span<?php echo $view_lab_service->TestSubCd->viewAttributes() ?>>
<?php echo $view_lab_service->TestSubCd->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->Method->Visible) { // Method ?>
	<tr id="r_Method">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_Method"><script id="tpc_view_lab_service_Method" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->Method->caption() ?></span></script></span></td>
		<td data-name="Method"<?php echo $view_lab_service->Method->cellAttributes() ?>>
<script id="tpx_view_lab_service_Method" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_Method">
<span<?php echo $view_lab_service->Method->viewAttributes() ?>>
<?php echo $view_lab_service->Method->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->Order->Visible) { // Order ?>
	<tr id="r_Order">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_Order"><script id="tpc_view_lab_service_Order" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->Order->caption() ?></span></script></span></td>
		<td data-name="Order"<?php echo $view_lab_service->Order->cellAttributes() ?>>
<script id="tpx_view_lab_service_Order" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_Order">
<span<?php echo $view_lab_service->Order->viewAttributes() ?>>
<?php echo $view_lab_service->Order->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->Form->Visible) { // Form ?>
	<tr id="r_Form">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_Form"><script id="tpc_view_lab_service_Form" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->Form->caption() ?></span></script></span></td>
		<td data-name="Form"<?php echo $view_lab_service->Form->cellAttributes() ?>>
<script id="tpx_view_lab_service_Form" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_Form">
<span<?php echo $view_lab_service->Form->viewAttributes() ?>>
<?php echo $view_lab_service->Form->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->ResType->Visible) { // ResType ?>
	<tr id="r_ResType">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_ResType"><script id="tpc_view_lab_service_ResType" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->ResType->caption() ?></span></script></span></td>
		<td data-name="ResType"<?php echo $view_lab_service->ResType->cellAttributes() ?>>
<script id="tpx_view_lab_service_ResType" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_ResType">
<span<?php echo $view_lab_service->ResType->viewAttributes() ?>>
<?php echo $view_lab_service->ResType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->UnitCD->Visible) { // UnitCD ?>
	<tr id="r_UnitCD">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_UnitCD"><script id="tpc_view_lab_service_UnitCD" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->UnitCD->caption() ?></span></script></span></td>
		<td data-name="UnitCD"<?php echo $view_lab_service->UnitCD->cellAttributes() ?>>
<script id="tpx_view_lab_service_UnitCD" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_UnitCD">
<span<?php echo $view_lab_service->UnitCD->viewAttributes() ?>>
<?php echo $view_lab_service->UnitCD->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->RefValue->Visible) { // RefValue ?>
	<tr id="r_RefValue">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_RefValue"><script id="tpc_view_lab_service_RefValue" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->RefValue->caption() ?></span></script></span></td>
		<td data-name="RefValue"<?php echo $view_lab_service->RefValue->cellAttributes() ?>>
<script id="tpx_view_lab_service_RefValue" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_RefValue">
<span<?php echo $view_lab_service->RefValue->viewAttributes() ?>>
<?php echo $view_lab_service->RefValue->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->Sample->Visible) { // Sample ?>
	<tr id="r_Sample">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_Sample"><script id="tpc_view_lab_service_Sample" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->Sample->caption() ?></span></script></span></td>
		<td data-name="Sample"<?php echo $view_lab_service->Sample->cellAttributes() ?>>
<script id="tpx_view_lab_service_Sample" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_Sample">
<span<?php echo $view_lab_service->Sample->viewAttributes() ?>>
<?php echo $view_lab_service->Sample->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->NoD->Visible) { // NoD ?>
	<tr id="r_NoD">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_NoD"><script id="tpc_view_lab_service_NoD" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->NoD->caption() ?></span></script></span></td>
		<td data-name="NoD"<?php echo $view_lab_service->NoD->cellAttributes() ?>>
<script id="tpx_view_lab_service_NoD" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_NoD">
<span<?php echo $view_lab_service->NoD->viewAttributes() ?>>
<?php echo $view_lab_service->NoD->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->BillOrder->Visible) { // BillOrder ?>
	<tr id="r_BillOrder">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_BillOrder"><script id="tpc_view_lab_service_BillOrder" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->BillOrder->caption() ?></span></script></span></td>
		<td data-name="BillOrder"<?php echo $view_lab_service->BillOrder->cellAttributes() ?>>
<script id="tpx_view_lab_service_BillOrder" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_BillOrder">
<span<?php echo $view_lab_service->BillOrder->viewAttributes() ?>>
<?php echo $view_lab_service->BillOrder->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->Formula->Visible) { // Formula ?>
	<tr id="r_Formula">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_Formula"><script id="tpc_view_lab_service_Formula" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->Formula->caption() ?></span></script></span></td>
		<td data-name="Formula"<?php echo $view_lab_service->Formula->cellAttributes() ?>>
<script id="tpx_view_lab_service_Formula" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_Formula">
<span<?php echo $view_lab_service->Formula->viewAttributes() ?>>
<?php echo $view_lab_service->Formula->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->Inactive->Visible) { // Inactive ?>
	<tr id="r_Inactive">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_Inactive"><script id="tpc_view_lab_service_Inactive" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->Inactive->caption() ?></span></script></span></td>
		<td data-name="Inactive"<?php echo $view_lab_service->Inactive->cellAttributes() ?>>
<script id="tpx_view_lab_service_Inactive" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_Inactive">
<span<?php echo $view_lab_service->Inactive->viewAttributes() ?>>
<?php echo $view_lab_service->Inactive->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->Outsource->Visible) { // Outsource ?>
	<tr id="r_Outsource">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_Outsource"><script id="tpc_view_lab_service_Outsource" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->Outsource->caption() ?></span></script></span></td>
		<td data-name="Outsource"<?php echo $view_lab_service->Outsource->cellAttributes() ?>>
<script id="tpx_view_lab_service_Outsource" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_Outsource">
<span<?php echo $view_lab_service->Outsource->viewAttributes() ?>>
<?php echo $view_lab_service->Outsource->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->CollSample->Visible) { // CollSample ?>
	<tr id="r_CollSample">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_CollSample"><script id="tpc_view_lab_service_CollSample" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->CollSample->caption() ?></span></script></span></td>
		<td data-name="CollSample"<?php echo $view_lab_service->CollSample->cellAttributes() ?>>
<script id="tpx_view_lab_service_CollSample" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_CollSample">
<span<?php echo $view_lab_service->CollSample->viewAttributes() ?>>
<?php echo $view_lab_service->CollSample->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->TestType->Visible) { // TestType ?>
	<tr id="r_TestType">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_TestType"><script id="tpc_view_lab_service_TestType" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->TestType->caption() ?></span></script></span></td>
		<td data-name="TestType"<?php echo $view_lab_service->TestType->cellAttributes() ?>>
<script id="tpx_view_lab_service_TestType" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_TestType">
<span<?php echo $view_lab_service->TestType->viewAttributes() ?>>
<?php echo $view_lab_service->TestType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->NoHeading->Visible) { // NoHeading ?>
	<tr id="r_NoHeading">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_NoHeading"><script id="tpc_view_lab_service_NoHeading" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->NoHeading->caption() ?></span></script></span></td>
		<td data-name="NoHeading"<?php echo $view_lab_service->NoHeading->cellAttributes() ?>>
<script id="tpx_view_lab_service_NoHeading" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_NoHeading">
<span<?php echo $view_lab_service->NoHeading->viewAttributes() ?>>
<?php echo $view_lab_service->NoHeading->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->ChemicalCode->Visible) { // ChemicalCode ?>
	<tr id="r_ChemicalCode">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_ChemicalCode"><script id="tpc_view_lab_service_ChemicalCode" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->ChemicalCode->caption() ?></span></script></span></td>
		<td data-name="ChemicalCode"<?php echo $view_lab_service->ChemicalCode->cellAttributes() ?>>
<script id="tpx_view_lab_service_ChemicalCode" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_ChemicalCode">
<span<?php echo $view_lab_service->ChemicalCode->viewAttributes() ?>>
<?php echo $view_lab_service->ChemicalCode->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->ChemicalName->Visible) { // ChemicalName ?>
	<tr id="r_ChemicalName">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_ChemicalName"><script id="tpc_view_lab_service_ChemicalName" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->ChemicalName->caption() ?></span></script></span></td>
		<td data-name="ChemicalName"<?php echo $view_lab_service->ChemicalName->cellAttributes() ?>>
<script id="tpx_view_lab_service_ChemicalName" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_ChemicalName">
<span<?php echo $view_lab_service->ChemicalName->viewAttributes() ?>>
<?php echo $view_lab_service->ChemicalName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->Utilaization->Visible) { // Utilaization ?>
	<tr id="r_Utilaization">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_Utilaization"><script id="tpc_view_lab_service_Utilaization" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->Utilaization->caption() ?></span></script></span></td>
		<td data-name="Utilaization"<?php echo $view_lab_service->Utilaization->cellAttributes() ?>>
<script id="tpx_view_lab_service_Utilaization" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_Utilaization">
<span<?php echo $view_lab_service->Utilaization->viewAttributes() ?>>
<?php echo $view_lab_service->Utilaization->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_service->Interpretation->Visible) { // Interpretation ?>
	<tr id="r_Interpretation">
		<td class="<?php echo $view_lab_service_view->TableLeftColumnClass ?>"><span id="elh_view_lab_service_Interpretation"><script id="tpc_view_lab_service_Interpretation" class="view_lab_serviceview" type="text/html"><span><?php echo $view_lab_service->Interpretation->caption() ?></span></script></span></td>
		<td data-name="Interpretation"<?php echo $view_lab_service->Interpretation->cellAttributes() ?>>
<script id="tpx_view_lab_service_Interpretation" class="view_lab_serviceview" type="text/html">
<span id="el_view_lab_service_Interpretation">
<span<?php echo $view_lab_service->Interpretation->viewAttributes() ?>>
<?php echo $view_lab_service->Interpretation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_lab_serviceview" class="ew-custom-template"></div>
<script id="tpm_view_lab_serviceview" type="text/html">
<div id="ct_view_lab_service_view"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
.view_lab_service_sub_UNITS{
  position: initial; 
}
.input-group>.form-control.ew-lookup-text {
	 width: 8em; 
}
</style>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Service Details</h3>
			</div>
			<div class="card-body">			
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_CODE"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_CODE"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_SERVICE"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_SERVICE"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_UNITS"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_UNITS"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_AMOUNT"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_AMOUNT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_SERVICE_TYPE"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_SERVICE_TYPE"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_DEPARTMENT"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_DEPARTMENT"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Payment Details</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_mas_services_billingcol"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_mas_services_billingcol"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_DrShareAmount"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_DrShareAmount"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_HospShareAmount"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_HospShareAmount"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_DrSharePer"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_DrSharePer"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_HospSharePer"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_HospSharePer"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Lab Details</h3>
			</div>
			<div class="card-body">
			<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"></h3>
			</div>
			<div class="card-body">			
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_TestSubCd"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_TestSubCd"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_Method"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_Method"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_Order"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_Order"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_Form"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_Form"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_ResType"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_ResType"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_UnitCD"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_UnitCD"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_Inactive"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_Inactive"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_Outsource"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_Outsource"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_CollSample"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_CollSample"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"></h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_RefValue"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_RefValue"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_Sample"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_Sample"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_NoD"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_NoD"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_BillOrder"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_BillOrder"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_Formula"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_Formula"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_TestType"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_TestType"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_NoHeading"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_NoHeading"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_ChemicalCode"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_ChemicalCode"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_ChemicalName"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_ChemicalName"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_Utilaization"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_Utilaization"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
		</div>
		</div>
	</div>				
</div>
</div>
<div class="row">
{{include tmpl="#tpc_view_lab_service_Interpretation"/}}&nbsp;{{include tmpl="#tpx_view_lab_service_Interpretation"/}}
</div>
</div>
</script>
<?php
	if (in_array("view_lab_service_sub", explode(",", $view_lab_service->getCurrentDetailTable())) && $view_lab_service_sub->DetailView) {
?>
<?php if ($view_lab_service->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("view_lab_service_sub", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_lab_service_subgrid.php" ?>
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_lab_service->Rows) ?> };
ew.applyTemplate("tpd_view_lab_serviceview", "tpm_view_lab_serviceview", "view_lab_serviceview", "<?php echo $view_lab_service->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_lab_serviceview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_lab_service_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_lab_service->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_lab_service_view->terminate();
?>