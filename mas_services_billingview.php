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
$mas_services_billing_view = new mas_services_billing_view();

// Run the page
$mas_services_billing_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_services_billing_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_services_billing->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_services_billingview = currentForm = new ew.Form("fmas_services_billingview", "view");

// Form_CustomValidate event
fmas_services_billingview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_services_billingview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_services_billingview.lists["x_SERVICE_TYPE"] = <?php echo $mas_services_billing_view->SERVICE_TYPE->Lookup->toClientList() ?>;
fmas_services_billingview.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($mas_services_billing_view->SERVICE_TYPE->lookupOptions()) ?>;
fmas_services_billingview.lists["x_DEPARTMENT"] = <?php echo $mas_services_billing_view->DEPARTMENT->Lookup->toClientList() ?>;
fmas_services_billingview.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($mas_services_billing_view->DEPARTMENT->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_services_billing->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_services_billing_view->ExportOptions->render("body") ?>
<?php $mas_services_billing_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_services_billing_view->showPageHeader(); ?>
<?php
$mas_services_billing_view->showMessage();
?>
<form name="fmas_services_billingview" id="fmas_services_billingview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_services_billing_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_services_billing_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_services_billing">
<input type="hidden" name="modal" value="<?php echo (int)$mas_services_billing_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($mas_services_billing->Id->Visible) { // Id ?>
	<tr id="r_Id">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Id"><script id="tpc_mas_services_billing_Id" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->Id->caption() ?></span></script></span></td>
		<td data-name="Id"<?php echo $mas_services_billing->Id->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Id" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_Id">
<span<?php echo $mas_services_billing->Id->viewAttributes() ?>>
<?php echo $mas_services_billing->Id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->CODE->Visible) { // CODE ?>
	<tr id="r_CODE">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_CODE"><script id="tpc_mas_services_billing_CODE" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->CODE->caption() ?></span></script></span></td>
		<td data-name="CODE"<?php echo $mas_services_billing->CODE->cellAttributes() ?>>
<script id="tpx_mas_services_billing_CODE" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_CODE">
<span<?php echo $mas_services_billing->CODE->viewAttributes() ?>>
<?php echo $mas_services_billing->CODE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->SERVICE->Visible) { // SERVICE ?>
	<tr id="r_SERVICE">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_SERVICE"><script id="tpc_mas_services_billing_SERVICE" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->SERVICE->caption() ?></span></script></span></td>
		<td data-name="SERVICE"<?php echo $mas_services_billing->SERVICE->cellAttributes() ?>>
<script id="tpx_mas_services_billing_SERVICE" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_SERVICE">
<span<?php echo $mas_services_billing->SERVICE->viewAttributes() ?>>
<?php echo $mas_services_billing->SERVICE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->UNITS->Visible) { // UNITS ?>
	<tr id="r_UNITS">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_UNITS"><script id="tpc_mas_services_billing_UNITS" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->UNITS->caption() ?></span></script></span></td>
		<td data-name="UNITS"<?php echo $mas_services_billing->UNITS->cellAttributes() ?>>
<script id="tpx_mas_services_billing_UNITS" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_UNITS">
<span<?php echo $mas_services_billing->UNITS->viewAttributes() ?>>
<?php echo $mas_services_billing->UNITS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->AMOUNT->Visible) { // AMOUNT ?>
	<tr id="r_AMOUNT">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_AMOUNT"><script id="tpc_mas_services_billing_AMOUNT" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->AMOUNT->caption() ?></span></script></span></td>
		<td data-name="AMOUNT"<?php echo $mas_services_billing->AMOUNT->cellAttributes() ?>>
<script id="tpx_mas_services_billing_AMOUNT" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_AMOUNT">
<span<?php echo $mas_services_billing->AMOUNT->viewAttributes() ?>>
<?php echo $mas_services_billing->AMOUNT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<tr id="r_SERVICE_TYPE">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_SERVICE_TYPE"><script id="tpc_mas_services_billing_SERVICE_TYPE" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->SERVICE_TYPE->caption() ?></span></script></span></td>
		<td data-name="SERVICE_TYPE"<?php echo $mas_services_billing->SERVICE_TYPE->cellAttributes() ?>>
<script id="tpx_mas_services_billing_SERVICE_TYPE" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_SERVICE_TYPE">
<span<?php echo $mas_services_billing->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $mas_services_billing->SERVICE_TYPE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<tr id="r_DEPARTMENT">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_DEPARTMENT"><script id="tpc_mas_services_billing_DEPARTMENT" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->DEPARTMENT->caption() ?></span></script></span></td>
		<td data-name="DEPARTMENT"<?php echo $mas_services_billing->DEPARTMENT->cellAttributes() ?>>
<script id="tpx_mas_services_billing_DEPARTMENT" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_DEPARTMENT">
<span<?php echo $mas_services_billing->DEPARTMENT->viewAttributes() ?>>
<?php echo $mas_services_billing->DEPARTMENT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->Created->Visible) { // Created ?>
	<tr id="r_Created">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Created"><script id="tpc_mas_services_billing_Created" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->Created->caption() ?></span></script></span></td>
		<td data-name="Created"<?php echo $mas_services_billing->Created->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Created" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_Created">
<span<?php echo $mas_services_billing->Created->viewAttributes() ?>>
<?php echo $mas_services_billing->Created->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_CreatedDateTime"><script id="tpc_mas_services_billing_CreatedDateTime" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->CreatedDateTime->caption() ?></span></script></span></td>
		<td data-name="CreatedDateTime"<?php echo $mas_services_billing->CreatedDateTime->cellAttributes() ?>>
<script id="tpx_mas_services_billing_CreatedDateTime" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_CreatedDateTime">
<span<?php echo $mas_services_billing->CreatedDateTime->viewAttributes() ?>>
<?php echo $mas_services_billing->CreatedDateTime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->Modified->Visible) { // Modified ?>
	<tr id="r_Modified">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Modified"><script id="tpc_mas_services_billing_Modified" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->Modified->caption() ?></span></script></span></td>
		<td data-name="Modified"<?php echo $mas_services_billing->Modified->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Modified" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_Modified">
<span<?php echo $mas_services_billing->Modified->viewAttributes() ?>>
<?php echo $mas_services_billing->Modified->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_ModifiedDateTime"><script id="tpc_mas_services_billing_ModifiedDateTime" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->ModifiedDateTime->caption() ?></span></script></span></td>
		<td data-name="ModifiedDateTime"<?php echo $mas_services_billing->ModifiedDateTime->cellAttributes() ?>>
<script id="tpx_mas_services_billing_ModifiedDateTime" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_ModifiedDateTime">
<span<?php echo $mas_services_billing->ModifiedDateTime->viewAttributes() ?>>
<?php echo $mas_services_billing->ModifiedDateTime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<tr id="r_mas_services_billingcol">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_mas_services_billingcol"><script id="tpc_mas_services_billing_mas_services_billingcol" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->mas_services_billingcol->caption() ?></span></script></span></td>
		<td data-name="mas_services_billingcol"<?php echo $mas_services_billing->mas_services_billingcol->cellAttributes() ?>>
<script id="tpx_mas_services_billing_mas_services_billingcol" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_mas_services_billingcol">
<span<?php echo $mas_services_billing->mas_services_billingcol->viewAttributes() ?>>
<?php echo $mas_services_billing->mas_services_billingcol->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->DrShareAmount->Visible) { // DrShareAmount ?>
	<tr id="r_DrShareAmount">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_DrShareAmount"><script id="tpc_mas_services_billing_DrShareAmount" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->DrShareAmount->caption() ?></span></script></span></td>
		<td data-name="DrShareAmount"<?php echo $mas_services_billing->DrShareAmount->cellAttributes() ?>>
<script id="tpx_mas_services_billing_DrShareAmount" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_DrShareAmount">
<span<?php echo $mas_services_billing->DrShareAmount->viewAttributes() ?>>
<?php echo $mas_services_billing->DrShareAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->HospShareAmount->Visible) { // HospShareAmount ?>
	<tr id="r_HospShareAmount">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_HospShareAmount"><script id="tpc_mas_services_billing_HospShareAmount" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->HospShareAmount->caption() ?></span></script></span></td>
		<td data-name="HospShareAmount"<?php echo $mas_services_billing->HospShareAmount->cellAttributes() ?>>
<script id="tpx_mas_services_billing_HospShareAmount" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_HospShareAmount">
<span<?php echo $mas_services_billing->HospShareAmount->viewAttributes() ?>>
<?php echo $mas_services_billing->HospShareAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->DrSharePer->Visible) { // DrSharePer ?>
	<tr id="r_DrSharePer">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_DrSharePer"><script id="tpc_mas_services_billing_DrSharePer" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->DrSharePer->caption() ?></span></script></span></td>
		<td data-name="DrSharePer"<?php echo $mas_services_billing->DrSharePer->cellAttributes() ?>>
<script id="tpx_mas_services_billing_DrSharePer" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_DrSharePer">
<span<?php echo $mas_services_billing->DrSharePer->viewAttributes() ?>>
<?php echo $mas_services_billing->DrSharePer->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->HospSharePer->Visible) { // HospSharePer ?>
	<tr id="r_HospSharePer">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_HospSharePer"><script id="tpc_mas_services_billing_HospSharePer" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->HospSharePer->caption() ?></span></script></span></td>
		<td data-name="HospSharePer"<?php echo $mas_services_billing->HospSharePer->cellAttributes() ?>>
<script id="tpx_mas_services_billing_HospSharePer" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_HospSharePer">
<span<?php echo $mas_services_billing->HospSharePer->viewAttributes() ?>>
<?php echo $mas_services_billing->HospSharePer->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_HospID"><script id="tpc_mas_services_billing_HospID" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $mas_services_billing->HospID->cellAttributes() ?>>
<script id="tpx_mas_services_billing_HospID" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_HospID">
<span<?php echo $mas_services_billing->HospID->viewAttributes() ?>>
<?php echo $mas_services_billing->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->TestSubCd->Visible) { // TestSubCd ?>
	<tr id="r_TestSubCd">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_TestSubCd"><script id="tpc_mas_services_billing_TestSubCd" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->TestSubCd->caption() ?></span></script></span></td>
		<td data-name="TestSubCd"<?php echo $mas_services_billing->TestSubCd->cellAttributes() ?>>
<script id="tpx_mas_services_billing_TestSubCd" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_TestSubCd">
<span<?php echo $mas_services_billing->TestSubCd->viewAttributes() ?>>
<?php echo $mas_services_billing->TestSubCd->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->Method->Visible) { // Method ?>
	<tr id="r_Method">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Method"><script id="tpc_mas_services_billing_Method" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->Method->caption() ?></span></script></span></td>
		<td data-name="Method"<?php echo $mas_services_billing->Method->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Method" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_Method">
<span<?php echo $mas_services_billing->Method->viewAttributes() ?>>
<?php echo $mas_services_billing->Method->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->Order->Visible) { // Order ?>
	<tr id="r_Order">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Order"><script id="tpc_mas_services_billing_Order" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->Order->caption() ?></span></script></span></td>
		<td data-name="Order"<?php echo $mas_services_billing->Order->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Order" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_Order">
<span<?php echo $mas_services_billing->Order->viewAttributes() ?>>
<?php echo $mas_services_billing->Order->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->Form->Visible) { // Form ?>
	<tr id="r_Form">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Form"><script id="tpc_mas_services_billing_Form" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->Form->caption() ?></span></script></span></td>
		<td data-name="Form"<?php echo $mas_services_billing->Form->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Form" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_Form">
<span<?php echo $mas_services_billing->Form->viewAttributes() ?>>
<?php echo $mas_services_billing->Form->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->ResType->Visible) { // ResType ?>
	<tr id="r_ResType">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_ResType"><script id="tpc_mas_services_billing_ResType" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->ResType->caption() ?></span></script></span></td>
		<td data-name="ResType"<?php echo $mas_services_billing->ResType->cellAttributes() ?>>
<script id="tpx_mas_services_billing_ResType" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_ResType">
<span<?php echo $mas_services_billing->ResType->viewAttributes() ?>>
<?php echo $mas_services_billing->ResType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->UnitCD->Visible) { // UnitCD ?>
	<tr id="r_UnitCD">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_UnitCD"><script id="tpc_mas_services_billing_UnitCD" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->UnitCD->caption() ?></span></script></span></td>
		<td data-name="UnitCD"<?php echo $mas_services_billing->UnitCD->cellAttributes() ?>>
<script id="tpx_mas_services_billing_UnitCD" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_UnitCD">
<span<?php echo $mas_services_billing->UnitCD->viewAttributes() ?>>
<?php echo $mas_services_billing->UnitCD->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->RefValue->Visible) { // RefValue ?>
	<tr id="r_RefValue">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_RefValue"><script id="tpc_mas_services_billing_RefValue" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->RefValue->caption() ?></span></script></span></td>
		<td data-name="RefValue"<?php echo $mas_services_billing->RefValue->cellAttributes() ?>>
<script id="tpx_mas_services_billing_RefValue" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_RefValue">
<span<?php echo $mas_services_billing->RefValue->viewAttributes() ?>>
<?php echo $mas_services_billing->RefValue->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->Sample->Visible) { // Sample ?>
	<tr id="r_Sample">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Sample"><script id="tpc_mas_services_billing_Sample" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->Sample->caption() ?></span></script></span></td>
		<td data-name="Sample"<?php echo $mas_services_billing->Sample->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Sample" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_Sample">
<span<?php echo $mas_services_billing->Sample->viewAttributes() ?>>
<?php echo $mas_services_billing->Sample->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->NoD->Visible) { // NoD ?>
	<tr id="r_NoD">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_NoD"><script id="tpc_mas_services_billing_NoD" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->NoD->caption() ?></span></script></span></td>
		<td data-name="NoD"<?php echo $mas_services_billing->NoD->cellAttributes() ?>>
<script id="tpx_mas_services_billing_NoD" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_NoD">
<span<?php echo $mas_services_billing->NoD->viewAttributes() ?>>
<?php echo $mas_services_billing->NoD->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->BillOrder->Visible) { // BillOrder ?>
	<tr id="r_BillOrder">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_BillOrder"><script id="tpc_mas_services_billing_BillOrder" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->BillOrder->caption() ?></span></script></span></td>
		<td data-name="BillOrder"<?php echo $mas_services_billing->BillOrder->cellAttributes() ?>>
<script id="tpx_mas_services_billing_BillOrder" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_BillOrder">
<span<?php echo $mas_services_billing->BillOrder->viewAttributes() ?>>
<?php echo $mas_services_billing->BillOrder->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->Formula->Visible) { // Formula ?>
	<tr id="r_Formula">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Formula"><script id="tpc_mas_services_billing_Formula" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->Formula->caption() ?></span></script></span></td>
		<td data-name="Formula"<?php echo $mas_services_billing->Formula->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Formula" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_Formula">
<span<?php echo $mas_services_billing->Formula->viewAttributes() ?>>
<?php echo $mas_services_billing->Formula->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->Inactive->Visible) { // Inactive ?>
	<tr id="r_Inactive">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Inactive"><script id="tpc_mas_services_billing_Inactive" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->Inactive->caption() ?></span></script></span></td>
		<td data-name="Inactive"<?php echo $mas_services_billing->Inactive->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Inactive" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_Inactive">
<span<?php echo $mas_services_billing->Inactive->viewAttributes() ?>>
<?php echo $mas_services_billing->Inactive->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->Outsource->Visible) { // Outsource ?>
	<tr id="r_Outsource">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Outsource"><script id="tpc_mas_services_billing_Outsource" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->Outsource->caption() ?></span></script></span></td>
		<td data-name="Outsource"<?php echo $mas_services_billing->Outsource->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Outsource" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_Outsource">
<span<?php echo $mas_services_billing->Outsource->viewAttributes() ?>>
<?php echo $mas_services_billing->Outsource->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->CollSample->Visible) { // CollSample ?>
	<tr id="r_CollSample">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_CollSample"><script id="tpc_mas_services_billing_CollSample" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->CollSample->caption() ?></span></script></span></td>
		<td data-name="CollSample"<?php echo $mas_services_billing->CollSample->cellAttributes() ?>>
<script id="tpx_mas_services_billing_CollSample" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_CollSample">
<span<?php echo $mas_services_billing->CollSample->viewAttributes() ?>>
<?php echo $mas_services_billing->CollSample->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->TestType->Visible) { // TestType ?>
	<tr id="r_TestType">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_TestType"><script id="tpc_mas_services_billing_TestType" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->TestType->caption() ?></span></script></span></td>
		<td data-name="TestType"<?php echo $mas_services_billing->TestType->cellAttributes() ?>>
<script id="tpx_mas_services_billing_TestType" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_TestType">
<span<?php echo $mas_services_billing->TestType->viewAttributes() ?>>
<?php echo $mas_services_billing->TestType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->NoHeading->Visible) { // NoHeading ?>
	<tr id="r_NoHeading">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_NoHeading"><script id="tpc_mas_services_billing_NoHeading" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->NoHeading->caption() ?></span></script></span></td>
		<td data-name="NoHeading"<?php echo $mas_services_billing->NoHeading->cellAttributes() ?>>
<script id="tpx_mas_services_billing_NoHeading" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_NoHeading">
<span<?php echo $mas_services_billing->NoHeading->viewAttributes() ?>>
<?php echo $mas_services_billing->NoHeading->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->ChemicalCode->Visible) { // ChemicalCode ?>
	<tr id="r_ChemicalCode">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_ChemicalCode"><script id="tpc_mas_services_billing_ChemicalCode" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->ChemicalCode->caption() ?></span></script></span></td>
		<td data-name="ChemicalCode"<?php echo $mas_services_billing->ChemicalCode->cellAttributes() ?>>
<script id="tpx_mas_services_billing_ChemicalCode" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_ChemicalCode">
<span<?php echo $mas_services_billing->ChemicalCode->viewAttributes() ?>>
<?php echo $mas_services_billing->ChemicalCode->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->ChemicalName->Visible) { // ChemicalName ?>
	<tr id="r_ChemicalName">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_ChemicalName"><script id="tpc_mas_services_billing_ChemicalName" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->ChemicalName->caption() ?></span></script></span></td>
		<td data-name="ChemicalName"<?php echo $mas_services_billing->ChemicalName->cellAttributes() ?>>
<script id="tpx_mas_services_billing_ChemicalName" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_ChemicalName">
<span<?php echo $mas_services_billing->ChemicalName->viewAttributes() ?>>
<?php echo $mas_services_billing->ChemicalName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->Utilaization->Visible) { // Utilaization ?>
	<tr id="r_Utilaization">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Utilaization"><script id="tpc_mas_services_billing_Utilaization" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->Utilaization->caption() ?></span></script></span></td>
		<td data-name="Utilaization"<?php echo $mas_services_billing->Utilaization->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Utilaization" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_Utilaization">
<span<?php echo $mas_services_billing->Utilaization->viewAttributes() ?>>
<?php echo $mas_services_billing->Utilaization->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing->Interpretation->Visible) { // Interpretation ?>
	<tr id="r_Interpretation">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Interpretation"><script id="tpc_mas_services_billing_Interpretation" class="mas_services_billingview" type="text/html"><span><?php echo $mas_services_billing->Interpretation->caption() ?></span></script></span></td>
		<td data-name="Interpretation"<?php echo $mas_services_billing->Interpretation->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Interpretation" class="mas_services_billingview" type="text/html">
<span id="el_mas_services_billing_Interpretation">
<span<?php echo $mas_services_billing->Interpretation->viewAttributes() ?>>
<?php echo $mas_services_billing->Interpretation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_mas_services_billingview" class="ew-custom-template"></div>
<script id="tpm_mas_services_billingview" type="text/html">
<div id="ct_mas_services_billing_view"><style>
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
</style>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Service Details</h3>
			</div>
			<div class="card-body">			
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_CODE"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_CODE"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_SERVICE"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_SERVICE"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_UNITS"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_UNITS"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_AMOUNT"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_AMOUNT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_SERVICE_TYPE"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_SERVICE_TYPE"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_DEPARTMENT"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_DEPARTMENT"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_mas_services_billingcol"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_mas_services_billingcol"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_DrShareAmount"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_DrShareAmount"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_HospShareAmount"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_HospShareAmount"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_DrSharePer"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_DrSharePer"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_HospSharePer"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_HospSharePer"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_TestSubCd"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_TestSubCd"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Method"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_Method"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Order"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_Order"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Form"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_Form"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_ResType"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_ResType"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_UnitCD"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_UnitCD"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Inactive"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_Inactive"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Outsource"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_Outsource"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_CollSample"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_CollSample"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_RefValue"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_RefValue"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Sample"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_Sample"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_NoD"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_NoD"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_BillOrder"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_BillOrder"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Formula"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_Formula"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_TestType"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_TestType"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_NoHeading"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_NoHeading"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_ChemicalCode"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_ChemicalCode"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_ChemicalName"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_ChemicalName"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Utilaization"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_Utilaization"/}}</span>
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
{{include tmpl="#tpc_mas_services_billing_Interpretation"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_Interpretation"/}}
</div>
</div>
</script>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($mas_services_billing->Rows) ?> };
ew.applyTemplate("tpd_mas_services_billingview", "tpm_mas_services_billingview", "mas_services_billingview", "<?php echo $mas_services_billing->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.mas_services_billingview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$mas_services_billing_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_services_billing->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_services_billing_view->terminate();
?>