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
<?php include_once "header.php"; ?>
<?php if (!$view_lab_profile_view->isExport()) { ?>
<script>
var fview_lab_profileview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fview_lab_profileview = currentForm = new ew.Form("fview_lab_profileview", "view");
	loadjs.done("fview_lab_profileview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_lab_profile_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_profile">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_profile_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_lab_profile_view->Id->Visible) { // Id ?>
	<tr id="r_Id">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Id"><script id="tpc_view_lab_profile_Id" type="text/html"><?php echo $view_lab_profile_view->Id->caption() ?></script></span></td>
		<td data-name="Id" <?php echo $view_lab_profile_view->Id->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Id" type="text/html"><span id="el_view_lab_profile_Id">
<span<?php echo $view_lab_profile_view->Id->viewAttributes() ?>><?php echo $view_lab_profile_view->Id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->CODE->Visible) { // CODE ?>
	<tr id="r_CODE">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_CODE"><script id="tpc_view_lab_profile_CODE" type="text/html"><?php echo $view_lab_profile_view->CODE->caption() ?></script></span></td>
		<td data-name="CODE" <?php echo $view_lab_profile_view->CODE->cellAttributes() ?>>
<script id="tpx_view_lab_profile_CODE" type="text/html"><span id="el_view_lab_profile_CODE">
<span<?php echo $view_lab_profile_view->CODE->viewAttributes() ?>><?php echo $view_lab_profile_view->CODE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->SERVICE->Visible) { // SERVICE ?>
	<tr id="r_SERVICE">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_SERVICE"><script id="tpc_view_lab_profile_SERVICE" type="text/html"><?php echo $view_lab_profile_view->SERVICE->caption() ?></script></span></td>
		<td data-name="SERVICE" <?php echo $view_lab_profile_view->SERVICE->cellAttributes() ?>>
<script id="tpx_view_lab_profile_SERVICE" type="text/html"><span id="el_view_lab_profile_SERVICE">
<span<?php echo $view_lab_profile_view->SERVICE->viewAttributes() ?>><?php echo $view_lab_profile_view->SERVICE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->UNITS->Visible) { // UNITS ?>
	<tr id="r_UNITS">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_UNITS"><script id="tpc_view_lab_profile_UNITS" type="text/html"><?php echo $view_lab_profile_view->UNITS->caption() ?></script></span></td>
		<td data-name="UNITS" <?php echo $view_lab_profile_view->UNITS->cellAttributes() ?>>
<script id="tpx_view_lab_profile_UNITS" type="text/html"><span id="el_view_lab_profile_UNITS">
<span<?php echo $view_lab_profile_view->UNITS->viewAttributes() ?>><?php echo $view_lab_profile_view->UNITS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->AMOUNT->Visible) { // AMOUNT ?>
	<tr id="r_AMOUNT">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_AMOUNT"><script id="tpc_view_lab_profile_AMOUNT" type="text/html"><?php echo $view_lab_profile_view->AMOUNT->caption() ?></script></span></td>
		<td data-name="AMOUNT" <?php echo $view_lab_profile_view->AMOUNT->cellAttributes() ?>>
<script id="tpx_view_lab_profile_AMOUNT" type="text/html"><span id="el_view_lab_profile_AMOUNT">
<span<?php echo $view_lab_profile_view->AMOUNT->viewAttributes() ?>><?php echo $view_lab_profile_view->AMOUNT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<tr id="r_SERVICE_TYPE">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_SERVICE_TYPE"><script id="tpc_view_lab_profile_SERVICE_TYPE" type="text/html"><?php echo $view_lab_profile_view->SERVICE_TYPE->caption() ?></script></span></td>
		<td data-name="SERVICE_TYPE" <?php echo $view_lab_profile_view->SERVICE_TYPE->cellAttributes() ?>>
<script id="tpx_view_lab_profile_SERVICE_TYPE" type="text/html"><span id="el_view_lab_profile_SERVICE_TYPE">
<span<?php echo $view_lab_profile_view->SERVICE_TYPE->viewAttributes() ?>><?php echo $view_lab_profile_view->SERVICE_TYPE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<tr id="r_DEPARTMENT">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_DEPARTMENT"><script id="tpc_view_lab_profile_DEPARTMENT" type="text/html"><?php echo $view_lab_profile_view->DEPARTMENT->caption() ?></script></span></td>
		<td data-name="DEPARTMENT" <?php echo $view_lab_profile_view->DEPARTMENT->cellAttributes() ?>>
<script id="tpx_view_lab_profile_DEPARTMENT" type="text/html"><span id="el_view_lab_profile_DEPARTMENT">
<span<?php echo $view_lab_profile_view->DEPARTMENT->viewAttributes() ?>><?php echo $view_lab_profile_view->DEPARTMENT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->Created->Visible) { // Created ?>
	<tr id="r_Created">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Created"><script id="tpc_view_lab_profile_Created" type="text/html"><?php echo $view_lab_profile_view->Created->caption() ?></script></span></td>
		<td data-name="Created" <?php echo $view_lab_profile_view->Created->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Created" type="text/html"><span id="el_view_lab_profile_Created">
<span<?php echo $view_lab_profile_view->Created->viewAttributes() ?>><?php echo $view_lab_profile_view->Created->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_CreatedDateTime"><script id="tpc_view_lab_profile_CreatedDateTime" type="text/html"><?php echo $view_lab_profile_view->CreatedDateTime->caption() ?></script></span></td>
		<td data-name="CreatedDateTime" <?php echo $view_lab_profile_view->CreatedDateTime->cellAttributes() ?>>
<script id="tpx_view_lab_profile_CreatedDateTime" type="text/html"><span id="el_view_lab_profile_CreatedDateTime">
<span<?php echo $view_lab_profile_view->CreatedDateTime->viewAttributes() ?>><?php echo $view_lab_profile_view->CreatedDateTime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->Modified->Visible) { // Modified ?>
	<tr id="r_Modified">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Modified"><script id="tpc_view_lab_profile_Modified" type="text/html"><?php echo $view_lab_profile_view->Modified->caption() ?></script></span></td>
		<td data-name="Modified" <?php echo $view_lab_profile_view->Modified->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Modified" type="text/html"><span id="el_view_lab_profile_Modified">
<span<?php echo $view_lab_profile_view->Modified->viewAttributes() ?>><?php echo $view_lab_profile_view->Modified->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_ModifiedDateTime"><script id="tpc_view_lab_profile_ModifiedDateTime" type="text/html"><?php echo $view_lab_profile_view->ModifiedDateTime->caption() ?></script></span></td>
		<td data-name="ModifiedDateTime" <?php echo $view_lab_profile_view->ModifiedDateTime->cellAttributes() ?>>
<script id="tpx_view_lab_profile_ModifiedDateTime" type="text/html"><span id="el_view_lab_profile_ModifiedDateTime">
<span<?php echo $view_lab_profile_view->ModifiedDateTime->viewAttributes() ?>><?php echo $view_lab_profile_view->ModifiedDateTime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<tr id="r_mas_services_billingcol">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_mas_services_billingcol"><script id="tpc_view_lab_profile_mas_services_billingcol" type="text/html"><?php echo $view_lab_profile_view->mas_services_billingcol->caption() ?></script></span></td>
		<td data-name="mas_services_billingcol" <?php echo $view_lab_profile_view->mas_services_billingcol->cellAttributes() ?>>
<script id="tpx_view_lab_profile_mas_services_billingcol" type="text/html"><span id="el_view_lab_profile_mas_services_billingcol">
<span<?php echo $view_lab_profile_view->mas_services_billingcol->viewAttributes() ?>><?php echo $view_lab_profile_view->mas_services_billingcol->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->DrShareAmount->Visible) { // DrShareAmount ?>
	<tr id="r_DrShareAmount">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_DrShareAmount"><script id="tpc_view_lab_profile_DrShareAmount" type="text/html"><?php echo $view_lab_profile_view->DrShareAmount->caption() ?></script></span></td>
		<td data-name="DrShareAmount" <?php echo $view_lab_profile_view->DrShareAmount->cellAttributes() ?>>
<script id="tpx_view_lab_profile_DrShareAmount" type="text/html"><span id="el_view_lab_profile_DrShareAmount">
<span<?php echo $view_lab_profile_view->DrShareAmount->viewAttributes() ?>><?php echo $view_lab_profile_view->DrShareAmount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->HospShareAmount->Visible) { // HospShareAmount ?>
	<tr id="r_HospShareAmount">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_HospShareAmount"><script id="tpc_view_lab_profile_HospShareAmount" type="text/html"><?php echo $view_lab_profile_view->HospShareAmount->caption() ?></script></span></td>
		<td data-name="HospShareAmount" <?php echo $view_lab_profile_view->HospShareAmount->cellAttributes() ?>>
<script id="tpx_view_lab_profile_HospShareAmount" type="text/html"><span id="el_view_lab_profile_HospShareAmount">
<span<?php echo $view_lab_profile_view->HospShareAmount->viewAttributes() ?>><?php echo $view_lab_profile_view->HospShareAmount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->DrSharePer->Visible) { // DrSharePer ?>
	<tr id="r_DrSharePer">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_DrSharePer"><script id="tpc_view_lab_profile_DrSharePer" type="text/html"><?php echo $view_lab_profile_view->DrSharePer->caption() ?></script></span></td>
		<td data-name="DrSharePer" <?php echo $view_lab_profile_view->DrSharePer->cellAttributes() ?>>
<script id="tpx_view_lab_profile_DrSharePer" type="text/html"><span id="el_view_lab_profile_DrSharePer">
<span<?php echo $view_lab_profile_view->DrSharePer->viewAttributes() ?>><?php echo $view_lab_profile_view->DrSharePer->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->HospSharePer->Visible) { // HospSharePer ?>
	<tr id="r_HospSharePer">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_HospSharePer"><script id="tpc_view_lab_profile_HospSharePer" type="text/html"><?php echo $view_lab_profile_view->HospSharePer->caption() ?></script></span></td>
		<td data-name="HospSharePer" <?php echo $view_lab_profile_view->HospSharePer->cellAttributes() ?>>
<script id="tpx_view_lab_profile_HospSharePer" type="text/html"><span id="el_view_lab_profile_HospSharePer">
<span<?php echo $view_lab_profile_view->HospSharePer->viewAttributes() ?>><?php echo $view_lab_profile_view->HospSharePer->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_HospID"><script id="tpc_view_lab_profile_HospID" type="text/html"><?php echo $view_lab_profile_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $view_lab_profile_view->HospID->cellAttributes() ?>>
<script id="tpx_view_lab_profile_HospID" type="text/html"><span id="el_view_lab_profile_HospID">
<span<?php echo $view_lab_profile_view->HospID->viewAttributes() ?>><?php echo $view_lab_profile_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->TestSubCd->Visible) { // TestSubCd ?>
	<tr id="r_TestSubCd">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_TestSubCd"><script id="tpc_view_lab_profile_TestSubCd" type="text/html"><?php echo $view_lab_profile_view->TestSubCd->caption() ?></script></span></td>
		<td data-name="TestSubCd" <?php echo $view_lab_profile_view->TestSubCd->cellAttributes() ?>>
<script id="tpx_view_lab_profile_TestSubCd" type="text/html"><span id="el_view_lab_profile_TestSubCd">
<span<?php echo $view_lab_profile_view->TestSubCd->viewAttributes() ?>><?php echo $view_lab_profile_view->TestSubCd->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->Method->Visible) { // Method ?>
	<tr id="r_Method">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Method"><script id="tpc_view_lab_profile_Method" type="text/html"><?php echo $view_lab_profile_view->Method->caption() ?></script></span></td>
		<td data-name="Method" <?php echo $view_lab_profile_view->Method->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Method" type="text/html"><span id="el_view_lab_profile_Method">
<span<?php echo $view_lab_profile_view->Method->viewAttributes() ?>><?php echo $view_lab_profile_view->Method->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->Order->Visible) { // Order ?>
	<tr id="r_Order">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Order"><script id="tpc_view_lab_profile_Order" type="text/html"><?php echo $view_lab_profile_view->Order->caption() ?></script></span></td>
		<td data-name="Order" <?php echo $view_lab_profile_view->Order->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Order" type="text/html"><span id="el_view_lab_profile_Order">
<span<?php echo $view_lab_profile_view->Order->viewAttributes() ?>><?php echo $view_lab_profile_view->Order->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->Form->Visible) { // Form ?>
	<tr id="r_Form">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Form"><script id="tpc_view_lab_profile_Form" type="text/html"><?php echo $view_lab_profile_view->Form->caption() ?></script></span></td>
		<td data-name="Form" <?php echo $view_lab_profile_view->Form->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Form" type="text/html"><span id="el_view_lab_profile_Form">
<span<?php echo $view_lab_profile_view->Form->viewAttributes() ?>><?php echo $view_lab_profile_view->Form->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->ResType->Visible) { // ResType ?>
	<tr id="r_ResType">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_ResType"><script id="tpc_view_lab_profile_ResType" type="text/html"><?php echo $view_lab_profile_view->ResType->caption() ?></script></span></td>
		<td data-name="ResType" <?php echo $view_lab_profile_view->ResType->cellAttributes() ?>>
<script id="tpx_view_lab_profile_ResType" type="text/html"><span id="el_view_lab_profile_ResType">
<span<?php echo $view_lab_profile_view->ResType->viewAttributes() ?>><?php echo $view_lab_profile_view->ResType->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->UnitCD->Visible) { // UnitCD ?>
	<tr id="r_UnitCD">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_UnitCD"><script id="tpc_view_lab_profile_UnitCD" type="text/html"><?php echo $view_lab_profile_view->UnitCD->caption() ?></script></span></td>
		<td data-name="UnitCD" <?php echo $view_lab_profile_view->UnitCD->cellAttributes() ?>>
<script id="tpx_view_lab_profile_UnitCD" type="text/html"><span id="el_view_lab_profile_UnitCD">
<span<?php echo $view_lab_profile_view->UnitCD->viewAttributes() ?>><?php echo $view_lab_profile_view->UnitCD->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->RefValue->Visible) { // RefValue ?>
	<tr id="r_RefValue">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_RefValue"><script id="tpc_view_lab_profile_RefValue" type="text/html"><?php echo $view_lab_profile_view->RefValue->caption() ?></script></span></td>
		<td data-name="RefValue" <?php echo $view_lab_profile_view->RefValue->cellAttributes() ?>>
<script id="tpx_view_lab_profile_RefValue" type="text/html"><span id="el_view_lab_profile_RefValue">
<span<?php echo $view_lab_profile_view->RefValue->viewAttributes() ?>><?php echo $view_lab_profile_view->RefValue->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->Sample->Visible) { // Sample ?>
	<tr id="r_Sample">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Sample"><script id="tpc_view_lab_profile_Sample" type="text/html"><?php echo $view_lab_profile_view->Sample->caption() ?></script></span></td>
		<td data-name="Sample" <?php echo $view_lab_profile_view->Sample->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Sample" type="text/html"><span id="el_view_lab_profile_Sample">
<span<?php echo $view_lab_profile_view->Sample->viewAttributes() ?>><?php echo $view_lab_profile_view->Sample->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->NoD->Visible) { // NoD ?>
	<tr id="r_NoD">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_NoD"><script id="tpc_view_lab_profile_NoD" type="text/html"><?php echo $view_lab_profile_view->NoD->caption() ?></script></span></td>
		<td data-name="NoD" <?php echo $view_lab_profile_view->NoD->cellAttributes() ?>>
<script id="tpx_view_lab_profile_NoD" type="text/html"><span id="el_view_lab_profile_NoD">
<span<?php echo $view_lab_profile_view->NoD->viewAttributes() ?>><?php echo $view_lab_profile_view->NoD->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->BillOrder->Visible) { // BillOrder ?>
	<tr id="r_BillOrder">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_BillOrder"><script id="tpc_view_lab_profile_BillOrder" type="text/html"><?php echo $view_lab_profile_view->BillOrder->caption() ?></script></span></td>
		<td data-name="BillOrder" <?php echo $view_lab_profile_view->BillOrder->cellAttributes() ?>>
<script id="tpx_view_lab_profile_BillOrder" type="text/html"><span id="el_view_lab_profile_BillOrder">
<span<?php echo $view_lab_profile_view->BillOrder->viewAttributes() ?>><?php echo $view_lab_profile_view->BillOrder->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->Formula->Visible) { // Formula ?>
	<tr id="r_Formula">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Formula"><script id="tpc_view_lab_profile_Formula" type="text/html"><?php echo $view_lab_profile_view->Formula->caption() ?></script></span></td>
		<td data-name="Formula" <?php echo $view_lab_profile_view->Formula->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Formula" type="text/html"><span id="el_view_lab_profile_Formula">
<span<?php echo $view_lab_profile_view->Formula->viewAttributes() ?>><?php echo $view_lab_profile_view->Formula->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->Inactive->Visible) { // Inactive ?>
	<tr id="r_Inactive">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Inactive"><script id="tpc_view_lab_profile_Inactive" type="text/html"><?php echo $view_lab_profile_view->Inactive->caption() ?></script></span></td>
		<td data-name="Inactive" <?php echo $view_lab_profile_view->Inactive->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Inactive" type="text/html"><span id="el_view_lab_profile_Inactive">
<span<?php echo $view_lab_profile_view->Inactive->viewAttributes() ?>><?php echo $view_lab_profile_view->Inactive->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->Outsource->Visible) { // Outsource ?>
	<tr id="r_Outsource">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Outsource"><script id="tpc_view_lab_profile_Outsource" type="text/html"><?php echo $view_lab_profile_view->Outsource->caption() ?></script></span></td>
		<td data-name="Outsource" <?php echo $view_lab_profile_view->Outsource->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Outsource" type="text/html"><span id="el_view_lab_profile_Outsource">
<span<?php echo $view_lab_profile_view->Outsource->viewAttributes() ?>><?php echo $view_lab_profile_view->Outsource->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->CollSample->Visible) { // CollSample ?>
	<tr id="r_CollSample">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_CollSample"><script id="tpc_view_lab_profile_CollSample" type="text/html"><?php echo $view_lab_profile_view->CollSample->caption() ?></script></span></td>
		<td data-name="CollSample" <?php echo $view_lab_profile_view->CollSample->cellAttributes() ?>>
<script id="tpx_view_lab_profile_CollSample" type="text/html"><span id="el_view_lab_profile_CollSample">
<span<?php echo $view_lab_profile_view->CollSample->viewAttributes() ?>><?php echo $view_lab_profile_view->CollSample->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->TestType->Visible) { // TestType ?>
	<tr id="r_TestType">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_TestType"><script id="tpc_view_lab_profile_TestType" type="text/html"><?php echo $view_lab_profile_view->TestType->caption() ?></script></span></td>
		<td data-name="TestType" <?php echo $view_lab_profile_view->TestType->cellAttributes() ?>>
<script id="tpx_view_lab_profile_TestType" type="text/html"><span id="el_view_lab_profile_TestType">
<span<?php echo $view_lab_profile_view->TestType->viewAttributes() ?>><?php echo $view_lab_profile_view->TestType->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->NoHeading->Visible) { // NoHeading ?>
	<tr id="r_NoHeading">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_NoHeading"><script id="tpc_view_lab_profile_NoHeading" type="text/html"><?php echo $view_lab_profile_view->NoHeading->caption() ?></script></span></td>
		<td data-name="NoHeading" <?php echo $view_lab_profile_view->NoHeading->cellAttributes() ?>>
<script id="tpx_view_lab_profile_NoHeading" type="text/html"><span id="el_view_lab_profile_NoHeading">
<span<?php echo $view_lab_profile_view->NoHeading->viewAttributes() ?>><?php echo $view_lab_profile_view->NoHeading->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->ChemicalCode->Visible) { // ChemicalCode ?>
	<tr id="r_ChemicalCode">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_ChemicalCode"><script id="tpc_view_lab_profile_ChemicalCode" type="text/html"><?php echo $view_lab_profile_view->ChemicalCode->caption() ?></script></span></td>
		<td data-name="ChemicalCode" <?php echo $view_lab_profile_view->ChemicalCode->cellAttributes() ?>>
<script id="tpx_view_lab_profile_ChemicalCode" type="text/html"><span id="el_view_lab_profile_ChemicalCode">
<span<?php echo $view_lab_profile_view->ChemicalCode->viewAttributes() ?>><?php echo $view_lab_profile_view->ChemicalCode->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->ChemicalName->Visible) { // ChemicalName ?>
	<tr id="r_ChemicalName">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_ChemicalName"><script id="tpc_view_lab_profile_ChemicalName" type="text/html"><?php echo $view_lab_profile_view->ChemicalName->caption() ?></script></span></td>
		<td data-name="ChemicalName" <?php echo $view_lab_profile_view->ChemicalName->cellAttributes() ?>>
<script id="tpx_view_lab_profile_ChemicalName" type="text/html"><span id="el_view_lab_profile_ChemicalName">
<span<?php echo $view_lab_profile_view->ChemicalName->viewAttributes() ?>><?php echo $view_lab_profile_view->ChemicalName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->Utilaization->Visible) { // Utilaization ?>
	<tr id="r_Utilaization">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Utilaization"><script id="tpc_view_lab_profile_Utilaization" type="text/html"><?php echo $view_lab_profile_view->Utilaization->caption() ?></script></span></td>
		<td data-name="Utilaization" <?php echo $view_lab_profile_view->Utilaization->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Utilaization" type="text/html"><span id="el_view_lab_profile_Utilaization">
<span<?php echo $view_lab_profile_view->Utilaization->viewAttributes() ?>><?php echo $view_lab_profile_view->Utilaization->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_profile_view->Interpretation->Visible) { // Interpretation ?>
	<tr id="r_Interpretation">
		<td class="<?php echo $view_lab_profile_view->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Interpretation"><script id="tpc_view_lab_profile_Interpretation" type="text/html"><?php echo $view_lab_profile_view->Interpretation->caption() ?></script></span></td>
		<td data-name="Interpretation" <?php echo $view_lab_profile_view->Interpretation->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Interpretation" type="text/html"><span id="el_view_lab_profile_Interpretation">
<span<?php echo $view_lab_profile_view->Interpretation->viewAttributes() ?>><?php echo $view_lab_profile_view->Interpretation->getViewValue() ?></span>
</span></script>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_CODE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_CODE")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_SERVICE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_SERVICE")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_UNITS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_UNITS")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_AMOUNT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_AMOUNT")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_SERVICE_TYPE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_SERVICE_TYPE")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_DEPARTMENT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_DEPARTMENT")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_mas_services_billingcol"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_mas_services_billingcol")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_DrShareAmount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_DrShareAmount")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_HospShareAmount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_HospShareAmount")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_DrSharePer"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_DrSharePer")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_HospSharePer"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_HospSharePer")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_TestSubCd"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_TestSubCd")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Method"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_Method")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Order"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_Order")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Form"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_Form")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_ResType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_ResType")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_UnitCD"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_UnitCD")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Inactive"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_Inactive")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Outsource"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_Outsource")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_CollSample"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_CollSample")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_RefValue"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_RefValue")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Sample"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_Sample")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_NoD"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_NoD")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_BillOrder"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_BillOrder")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Formula"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_Formula")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_TestType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_TestType")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_NoHeading"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_NoHeading")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_ChemicalCode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_ChemicalCode")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_ChemicalName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_ChemicalName")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Utilaization"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_Utilaization")/}}</span>
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
{{include tmpl="#tpc_view_lab_profile_Interpretation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_Interpretation")/}}
</div>
</div>
</script>

<?php
	if (in_array("lab_profile_details", explode(",", $view_lab_profile->getCurrentDetailTable())) && $lab_profile_details->DetailView) {
?>
<?php if ($view_lab_profile->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("lab_profile_details", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "lab_profile_detailsgrid.php" ?>
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_lab_profile->Rows) ?> };
	ew.applyTemplate("tpd_view_lab_profileview", "tpm_view_lab_profileview", "view_lab_profileview", "<?php echo $view_lab_profile->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_lab_profileview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_lab_profile_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_lab_profile_view->isExport()) { ?>
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
$view_lab_profile_view->terminate();
?>