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
$view_lab_profile_view = new view_lab_profile_view();

// Run the page
$view_lab_profile_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_profile_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_lab_profile->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_lab_profileview = currentForm = new ew.Form("fview_lab_profileview", "view");

// Form_CustomValidate event
fview_lab_profileview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_profileview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_profileview.lists["x_SERVICE_TYPE"] = <?php echo $view_lab_profile_view->SERVICE_TYPE->Lookup->toClientList() ?>;
fview_lab_profileview.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($view_lab_profile_view->SERVICE_TYPE->lookupOptions()) ?>;
fview_lab_profileview.lists["x_DEPARTMENT"] = <?php echo $view_lab_profile_view->DEPARTMENT->Lookup->toClientList() ?>;
fview_lab_profileview.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($view_lab_profile_view->DEPARTMENT->lookupOptions()) ?>;
fview_lab_profileview.lists["x_TestType"] = <?php echo $view_lab_profile_view->TestType->Lookup->toClientList() ?>;
fview_lab_profileview.lists["x_TestType"].options = <?php echo JsonEncode($view_lab_profile_view->TestType->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_lab_profile->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_lab_profile_view->ExportOptions->render("body") ?>
<?php $view_lab_profile_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_lab_profile_view->showPageHeader(); ?>
<?php
$view_lab_profile_view->showMessage();
?>
<form name="fview_lab_profileview" id="fview_lab_profileview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_profile_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_profile_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_profile">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_profile_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_lab_profile->Id->Visible) { // Id ?>
	<tr id="r_Id">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Id"><script id="tpc_view_lab_profile_Id" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->Id->caption() ?></span></script></span></td>
		<td data-name="Id"<?php echo $view_lab_profile->Id->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Id" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_Id">
<span<?php echo $view_lab_profile->Id->viewAttributes() ?>>
<?php echo $view_lab_profile->Id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->CODE->Visible) { // CODE ?>
	<tr id="r_CODE">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_CODE"><script id="tpc_view_lab_profile_CODE" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->CODE->caption() ?></span></script></span></td>
		<td data-name="CODE"<?php echo $view_lab_profile->CODE->cellAttributes() ?>>
<script id="tpx_view_lab_profile_CODE" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_CODE">
<span<?php echo $view_lab_profile->CODE->viewAttributes() ?>>
<?php echo $view_lab_profile->CODE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->SERVICE->Visible) { // SERVICE ?>
	<tr id="r_SERVICE">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_SERVICE"><script id="tpc_view_lab_profile_SERVICE" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->SERVICE->caption() ?></span></script></span></td>
		<td data-name="SERVICE"<?php echo $view_lab_profile->SERVICE->cellAttributes() ?>>
<script id="tpx_view_lab_profile_SERVICE" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_SERVICE">
<span<?php echo $view_lab_profile->SERVICE->viewAttributes() ?>>
<?php echo $view_lab_profile->SERVICE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->UNITS->Visible) { // UNITS ?>
	<tr id="r_UNITS">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_UNITS"><script id="tpc_view_lab_profile_UNITS" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->UNITS->caption() ?></span></script></span></td>
		<td data-name="UNITS"<?php echo $view_lab_profile->UNITS->cellAttributes() ?>>
<script id="tpx_view_lab_profile_UNITS" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_UNITS">
<span<?php echo $view_lab_profile->UNITS->viewAttributes() ?>>
<?php echo $view_lab_profile->UNITS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->AMOUNT->Visible) { // AMOUNT ?>
	<tr id="r_AMOUNT">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_AMOUNT"><script id="tpc_view_lab_profile_AMOUNT" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->AMOUNT->caption() ?></span></script></span></td>
		<td data-name="AMOUNT"<?php echo $view_lab_profile->AMOUNT->cellAttributes() ?>>
<script id="tpx_view_lab_profile_AMOUNT" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_AMOUNT">
<span<?php echo $view_lab_profile->AMOUNT->viewAttributes() ?>>
<?php echo $view_lab_profile->AMOUNT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<tr id="r_SERVICE_TYPE">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_SERVICE_TYPE"><script id="tpc_view_lab_profile_SERVICE_TYPE" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->SERVICE_TYPE->caption() ?></span></script></span></td>
		<td data-name="SERVICE_TYPE"<?php echo $view_lab_profile->SERVICE_TYPE->cellAttributes() ?>>
<script id="tpx_view_lab_profile_SERVICE_TYPE" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_SERVICE_TYPE">
<span<?php echo $view_lab_profile->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $view_lab_profile->SERVICE_TYPE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<tr id="r_DEPARTMENT">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_DEPARTMENT"><script id="tpc_view_lab_profile_DEPARTMENT" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->DEPARTMENT->caption() ?></span></script></span></td>
		<td data-name="DEPARTMENT"<?php echo $view_lab_profile->DEPARTMENT->cellAttributes() ?>>
<script id="tpx_view_lab_profile_DEPARTMENT" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_DEPARTMENT">
<span<?php echo $view_lab_profile->DEPARTMENT->viewAttributes() ?>>
<?php echo $view_lab_profile->DEPARTMENT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->Created->Visible) { // Created ?>
	<tr id="r_Created">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Created"><script id="tpc_view_lab_profile_Created" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->Created->caption() ?></span></script></span></td>
		<td data-name="Created"<?php echo $view_lab_profile->Created->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Created" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_Created">
<span<?php echo $view_lab_profile->Created->viewAttributes() ?>>
<?php echo $view_lab_profile->Created->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_CreatedDateTime"><script id="tpc_view_lab_profile_CreatedDateTime" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->CreatedDateTime->caption() ?></span></script></span></td>
		<td data-name="CreatedDateTime"<?php echo $view_lab_profile->CreatedDateTime->cellAttributes() ?>>
<script id="tpx_view_lab_profile_CreatedDateTime" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_CreatedDateTime">
<span<?php echo $view_lab_profile->CreatedDateTime->viewAttributes() ?>>
<?php echo $view_lab_profile->CreatedDateTime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->Modified->Visible) { // Modified ?>
	<tr id="r_Modified">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Modified"><script id="tpc_view_lab_profile_Modified" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->Modified->caption() ?></span></script></span></td>
		<td data-name="Modified"<?php echo $view_lab_profile->Modified->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Modified" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_Modified">
<span<?php echo $view_lab_profile->Modified->viewAttributes() ?>>
<?php echo $view_lab_profile->Modified->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_ModifiedDateTime"><script id="tpc_view_lab_profile_ModifiedDateTime" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->ModifiedDateTime->caption() ?></span></script></span></td>
		<td data-name="ModifiedDateTime"<?php echo $view_lab_profile->ModifiedDateTime->cellAttributes() ?>>
<script id="tpx_view_lab_profile_ModifiedDateTime" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_ModifiedDateTime">
<span<?php echo $view_lab_profile->ModifiedDateTime->viewAttributes() ?>>
<?php echo $view_lab_profile->ModifiedDateTime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<tr id="r_mas_services_billingcol">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_mas_services_billingcol"><script id="tpc_view_lab_profile_mas_services_billingcol" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->mas_services_billingcol->caption() ?></span></script></span></td>
		<td data-name="mas_services_billingcol"<?php echo $view_lab_profile->mas_services_billingcol->cellAttributes() ?>>
<script id="tpx_view_lab_profile_mas_services_billingcol" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_mas_services_billingcol">
<span<?php echo $view_lab_profile->mas_services_billingcol->viewAttributes() ?>>
<?php echo $view_lab_profile->mas_services_billingcol->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->DrShareAmount->Visible) { // DrShareAmount ?>
	<tr id="r_DrShareAmount">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_DrShareAmount"><script id="tpc_view_lab_profile_DrShareAmount" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->DrShareAmount->caption() ?></span></script></span></td>
		<td data-name="DrShareAmount"<?php echo $view_lab_profile->DrShareAmount->cellAttributes() ?>>
<script id="tpx_view_lab_profile_DrShareAmount" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_DrShareAmount">
<span<?php echo $view_lab_profile->DrShareAmount->viewAttributes() ?>>
<?php echo $view_lab_profile->DrShareAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->HospShareAmount->Visible) { // HospShareAmount ?>
	<tr id="r_HospShareAmount">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_HospShareAmount"><script id="tpc_view_lab_profile_HospShareAmount" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->HospShareAmount->caption() ?></span></script></span></td>
		<td data-name="HospShareAmount"<?php echo $view_lab_profile->HospShareAmount->cellAttributes() ?>>
<script id="tpx_view_lab_profile_HospShareAmount" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_HospShareAmount">
<span<?php echo $view_lab_profile->HospShareAmount->viewAttributes() ?>>
<?php echo $view_lab_profile->HospShareAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->DrSharePer->Visible) { // DrSharePer ?>
	<tr id="r_DrSharePer">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_DrSharePer"><script id="tpc_view_lab_profile_DrSharePer" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->DrSharePer->caption() ?></span></script></span></td>
		<td data-name="DrSharePer"<?php echo $view_lab_profile->DrSharePer->cellAttributes() ?>>
<script id="tpx_view_lab_profile_DrSharePer" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_DrSharePer">
<span<?php echo $view_lab_profile->DrSharePer->viewAttributes() ?>>
<?php echo $view_lab_profile->DrSharePer->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->HospSharePer->Visible) { // HospSharePer ?>
	<tr id="r_HospSharePer">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_HospSharePer"><script id="tpc_view_lab_profile_HospSharePer" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->HospSharePer->caption() ?></span></script></span></td>
		<td data-name="HospSharePer"<?php echo $view_lab_profile->HospSharePer->cellAttributes() ?>>
<script id="tpx_view_lab_profile_HospSharePer" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_HospSharePer">
<span<?php echo $view_lab_profile->HospSharePer->viewAttributes() ?>>
<?php echo $view_lab_profile->HospSharePer->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_HospID"><script id="tpc_view_lab_profile_HospID" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $view_lab_profile->HospID->cellAttributes() ?>>
<script id="tpx_view_lab_profile_HospID" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_HospID">
<span<?php echo $view_lab_profile->HospID->viewAttributes() ?>>
<?php echo $view_lab_profile->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->TestSubCd->Visible) { // TestSubCd ?>
	<tr id="r_TestSubCd">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_TestSubCd"><script id="tpc_view_lab_profile_TestSubCd" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->TestSubCd->caption() ?></span></script></span></td>
		<td data-name="TestSubCd"<?php echo $view_lab_profile->TestSubCd->cellAttributes() ?>>
<script id="tpx_view_lab_profile_TestSubCd" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_TestSubCd">
<span<?php echo $view_lab_profile->TestSubCd->viewAttributes() ?>>
<?php echo $view_lab_profile->TestSubCd->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->Method->Visible) { // Method ?>
	<tr id="r_Method">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Method"><script id="tpc_view_lab_profile_Method" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->Method->caption() ?></span></script></span></td>
		<td data-name="Method"<?php echo $view_lab_profile->Method->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Method" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_Method">
<span<?php echo $view_lab_profile->Method->viewAttributes() ?>>
<?php echo $view_lab_profile->Method->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->Order->Visible) { // Order ?>
	<tr id="r_Order">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Order"><script id="tpc_view_lab_profile_Order" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->Order->caption() ?></span></script></span></td>
		<td data-name="Order"<?php echo $view_lab_profile->Order->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Order" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_Order">
<span<?php echo $view_lab_profile->Order->viewAttributes() ?>>
<?php echo $view_lab_profile->Order->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->Form->Visible) { // Form ?>
	<tr id="r_Form">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Form"><script id="tpc_view_lab_profile_Form" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->Form->caption() ?></span></script></span></td>
		<td data-name="Form"<?php echo $view_lab_profile->Form->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Form" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_Form">
<span<?php echo $view_lab_profile->Form->viewAttributes() ?>>
<?php echo $view_lab_profile->Form->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->ResType->Visible) { // ResType ?>
	<tr id="r_ResType">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_ResType"><script id="tpc_view_lab_profile_ResType" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->ResType->caption() ?></span></script></span></td>
		<td data-name="ResType"<?php echo $view_lab_profile->ResType->cellAttributes() ?>>
<script id="tpx_view_lab_profile_ResType" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_ResType">
<span<?php echo $view_lab_profile->ResType->viewAttributes() ?>>
<?php echo $view_lab_profile->ResType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->UnitCD->Visible) { // UnitCD ?>
	<tr id="r_UnitCD">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_UnitCD"><script id="tpc_view_lab_profile_UnitCD" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->UnitCD->caption() ?></span></script></span></td>
		<td data-name="UnitCD"<?php echo $view_lab_profile->UnitCD->cellAttributes() ?>>
<script id="tpx_view_lab_profile_UnitCD" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_UnitCD">
<span<?php echo $view_lab_profile->UnitCD->viewAttributes() ?>>
<?php echo $view_lab_profile->UnitCD->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->RefValue->Visible) { // RefValue ?>
	<tr id="r_RefValue">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_RefValue"><script id="tpc_view_lab_profile_RefValue" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->RefValue->caption() ?></span></script></span></td>
		<td data-name="RefValue"<?php echo $view_lab_profile->RefValue->cellAttributes() ?>>
<script id="tpx_view_lab_profile_RefValue" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_RefValue">
<span<?php echo $view_lab_profile->RefValue->viewAttributes() ?>>
<?php echo $view_lab_profile->RefValue->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->Sample->Visible) { // Sample ?>
	<tr id="r_Sample">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Sample"><script id="tpc_view_lab_profile_Sample" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->Sample->caption() ?></span></script></span></td>
		<td data-name="Sample"<?php echo $view_lab_profile->Sample->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Sample" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_Sample">
<span<?php echo $view_lab_profile->Sample->viewAttributes() ?>>
<?php echo $view_lab_profile->Sample->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->NoD->Visible) { // NoD ?>
	<tr id="r_NoD">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_NoD"><script id="tpc_view_lab_profile_NoD" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->NoD->caption() ?></span></script></span></td>
		<td data-name="NoD"<?php echo $view_lab_profile->NoD->cellAttributes() ?>>
<script id="tpx_view_lab_profile_NoD" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_NoD">
<span<?php echo $view_lab_profile->NoD->viewAttributes() ?>>
<?php echo $view_lab_profile->NoD->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->BillOrder->Visible) { // BillOrder ?>
	<tr id="r_BillOrder">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_BillOrder"><script id="tpc_view_lab_profile_BillOrder" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->BillOrder->caption() ?></span></script></span></td>
		<td data-name="BillOrder"<?php echo $view_lab_profile->BillOrder->cellAttributes() ?>>
<script id="tpx_view_lab_profile_BillOrder" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_BillOrder">
<span<?php echo $view_lab_profile->BillOrder->viewAttributes() ?>>
<?php echo $view_lab_profile->BillOrder->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->Formula->Visible) { // Formula ?>
	<tr id="r_Formula">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Formula"><script id="tpc_view_lab_profile_Formula" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->Formula->caption() ?></span></script></span></td>
		<td data-name="Formula"<?php echo $view_lab_profile->Formula->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Formula" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_Formula">
<span<?php echo $view_lab_profile->Formula->viewAttributes() ?>>
<?php echo $view_lab_profile->Formula->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->Inactive->Visible) { // Inactive ?>
	<tr id="r_Inactive">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Inactive"><script id="tpc_view_lab_profile_Inactive" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->Inactive->caption() ?></span></script></span></td>
		<td data-name="Inactive"<?php echo $view_lab_profile->Inactive->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Inactive" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_Inactive">
<span<?php echo $view_lab_profile->Inactive->viewAttributes() ?>>
<?php echo $view_lab_profile->Inactive->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->Outsource->Visible) { // Outsource ?>
	<tr id="r_Outsource">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Outsource"><script id="tpc_view_lab_profile_Outsource" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->Outsource->caption() ?></span></script></span></td>
		<td data-name="Outsource"<?php echo $view_lab_profile->Outsource->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Outsource" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_Outsource">
<span<?php echo $view_lab_profile->Outsource->viewAttributes() ?>>
<?php echo $view_lab_profile->Outsource->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->CollSample->Visible) { // CollSample ?>
	<tr id="r_CollSample">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_CollSample"><script id="tpc_view_lab_profile_CollSample" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->CollSample->caption() ?></span></script></span></td>
		<td data-name="CollSample"<?php echo $view_lab_profile->CollSample->cellAttributes() ?>>
<script id="tpx_view_lab_profile_CollSample" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_CollSample">
<span<?php echo $view_lab_profile->CollSample->viewAttributes() ?>>
<?php echo $view_lab_profile->CollSample->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->TestType->Visible) { // TestType ?>
	<tr id="r_TestType">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_TestType"><script id="tpc_view_lab_profile_TestType" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->TestType->caption() ?></span></script></span></td>
		<td data-name="TestType"<?php echo $view_lab_profile->TestType->cellAttributes() ?>>
<script id="tpx_view_lab_profile_TestType" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_TestType">
<span<?php echo $view_lab_profile->TestType->viewAttributes() ?>>
<?php echo $view_lab_profile->TestType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->NoHeading->Visible) { // NoHeading ?>
	<tr id="r_NoHeading">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_NoHeading"><script id="tpc_view_lab_profile_NoHeading" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->NoHeading->caption() ?></span></script></span></td>
		<td data-name="NoHeading"<?php echo $view_lab_profile->NoHeading->cellAttributes() ?>>
<script id="tpx_view_lab_profile_NoHeading" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_NoHeading">
<span<?php echo $view_lab_profile->NoHeading->viewAttributes() ?>>
<?php echo $view_lab_profile->NoHeading->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->ChemicalCode->Visible) { // ChemicalCode ?>
	<tr id="r_ChemicalCode">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_ChemicalCode"><script id="tpc_view_lab_profile_ChemicalCode" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->ChemicalCode->caption() ?></span></script></span></td>
		<td data-name="ChemicalCode"<?php echo $view_lab_profile->ChemicalCode->cellAttributes() ?>>
<script id="tpx_view_lab_profile_ChemicalCode" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_ChemicalCode">
<span<?php echo $view_lab_profile->ChemicalCode->viewAttributes() ?>>
<?php echo $view_lab_profile->ChemicalCode->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->ChemicalName->Visible) { // ChemicalName ?>
	<tr id="r_ChemicalName">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_ChemicalName"><script id="tpc_view_lab_profile_ChemicalName" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->ChemicalName->caption() ?></span></script></span></td>
		<td data-name="ChemicalName"<?php echo $view_lab_profile->ChemicalName->cellAttributes() ?>>
<script id="tpx_view_lab_profile_ChemicalName" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_ChemicalName">
<span<?php echo $view_lab_profile->ChemicalName->viewAttributes() ?>>
<?php echo $view_lab_profile->ChemicalName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->Utilaization->Visible) { // Utilaization ?>
	<tr id="r_Utilaization">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Utilaization"><script id="tpc_view_lab_profile_Utilaization" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->Utilaization->caption() ?></span></script></span></td>
		<td data-name="Utilaization"<?php echo $view_lab_profile->Utilaization->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Utilaization" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_Utilaization">
<span<?php echo $view_lab_profile->Utilaization->viewAttributes() ?>>
<?php echo $view_lab_profile->Utilaization->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile->Interpretation->Visible) { // Interpretation ?>
	<tr id="r_Interpretation">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Interpretation"><script id="tpc_view_lab_profile_Interpretation" class="view_lab_profileview" type="text/html"><span><?php echo $view_lab_profile->Interpretation->caption() ?></span></script></span></td>
		<td data-name="Interpretation"<?php echo $view_lab_profile->Interpretation->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Interpretation" class="view_lab_profileview" type="text/html">
<span id="el_view_lab_profile_Interpretation">
<span<?php echo $view_lab_profile->Interpretation->viewAttributes() ?>>
<?php echo $view_lab_profile->Interpretation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_lab_profileview" class="ew-custom-template"></div>
<script id="tpm_view_lab_profileview" type="text/html">
<div id="ct_view_lab_profile_view"><style>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_CODE"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_CODE"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_SERVICE"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_SERVICE"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_UNITS"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_UNITS"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_AMOUNT"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_AMOUNT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_SERVICE_TYPE"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_SERVICE_TYPE"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_DEPARTMENT"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_DEPARTMENT"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_mas_services_billingcol"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_mas_services_billingcol"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_DrShareAmount"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_DrShareAmount"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_HospShareAmount"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_HospShareAmount"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_DrSharePer"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_DrSharePer"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_HospSharePer"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_HospSharePer"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_TestSubCd"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_TestSubCd"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Method"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_Method"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Order"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_Order"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Form"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_Form"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_ResType"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_ResType"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_UnitCD"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_UnitCD"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Inactive"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_Inactive"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Outsource"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_Outsource"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_CollSample"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_CollSample"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_RefValue"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_RefValue"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Sample"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_Sample"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_NoD"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_NoD"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_BillOrder"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_BillOrder"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Formula"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_Formula"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_TestType"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_TestType"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_NoHeading"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_NoHeading"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_ChemicalCode"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_ChemicalCode"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_ChemicalName"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_ChemicalName"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Utilaization"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_Utilaization"/}}</span>
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
{{include tmpl="#tpc_view_lab_profile_Interpretation"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_Interpretation"/}}
</div>
</div>
</script>
<?php
	if (in_array("lab_profile_details", explode(",", $view_lab_profile->getCurrentDetailTable())) && $lab_profile_details->DetailView) {
?>
<?php if ($view_lab_profile->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("lab_profile_details", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "lab_profile_detailsgrid.php" ?>
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_lab_profile->Rows) ?> };
ew.applyTemplate("tpd_view_lab_profileview", "tpm_view_lab_profileview", "view_lab_profileview", "<?php echo $view_lab_profile->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_lab_profileview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_lab_profile_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_lab_profile->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_lab_profile_view->terminate();
?>