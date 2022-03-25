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
<?php include_once "header.php"; ?>
<?php if (!$mas_services_billing_view->isExport()) { ?>
<script>
var fmas_services_billingview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmas_services_billingview = currentForm = new ew.Form("fmas_services_billingview", "view");
	loadjs.done("fmas_services_billingview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$mas_services_billing_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_services_billing">
<input type="hidden" name="modal" value="<?php echo (int)$mas_services_billing_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($mas_services_billing_view->Id->Visible) { // Id ?>
	<tr id="r_Id">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Id"><script id="tpc_mas_services_billing_Id" type="text/html"><?php echo $mas_services_billing_view->Id->caption() ?></script></span></td>
		<td data-name="Id" <?php echo $mas_services_billing_view->Id->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Id" type="text/html"><span id="el_mas_services_billing_Id">
<span<?php echo $mas_services_billing_view->Id->viewAttributes() ?>><?php echo $mas_services_billing_view->Id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->CODE->Visible) { // CODE ?>
	<tr id="r_CODE">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_CODE"><script id="tpc_mas_services_billing_CODE" type="text/html"><?php echo $mas_services_billing_view->CODE->caption() ?></script></span></td>
		<td data-name="CODE" <?php echo $mas_services_billing_view->CODE->cellAttributes() ?>>
<script id="tpx_mas_services_billing_CODE" type="text/html"><span id="el_mas_services_billing_CODE">
<span<?php echo $mas_services_billing_view->CODE->viewAttributes() ?>><?php echo $mas_services_billing_view->CODE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->SERVICE->Visible) { // SERVICE ?>
	<tr id="r_SERVICE">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_SERVICE"><script id="tpc_mas_services_billing_SERVICE" type="text/html"><?php echo $mas_services_billing_view->SERVICE->caption() ?></script></span></td>
		<td data-name="SERVICE" <?php echo $mas_services_billing_view->SERVICE->cellAttributes() ?>>
<script id="tpx_mas_services_billing_SERVICE" type="text/html"><span id="el_mas_services_billing_SERVICE">
<span<?php echo $mas_services_billing_view->SERVICE->viewAttributes() ?>><?php echo $mas_services_billing_view->SERVICE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->UNITS->Visible) { // UNITS ?>
	<tr id="r_UNITS">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_UNITS"><script id="tpc_mas_services_billing_UNITS" type="text/html"><?php echo $mas_services_billing_view->UNITS->caption() ?></script></span></td>
		<td data-name="UNITS" <?php echo $mas_services_billing_view->UNITS->cellAttributes() ?>>
<script id="tpx_mas_services_billing_UNITS" type="text/html"><span id="el_mas_services_billing_UNITS">
<span<?php echo $mas_services_billing_view->UNITS->viewAttributes() ?>><?php echo $mas_services_billing_view->UNITS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->AMOUNT->Visible) { // AMOUNT ?>
	<tr id="r_AMOUNT">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_AMOUNT"><script id="tpc_mas_services_billing_AMOUNT" type="text/html"><?php echo $mas_services_billing_view->AMOUNT->caption() ?></script></span></td>
		<td data-name="AMOUNT" <?php echo $mas_services_billing_view->AMOUNT->cellAttributes() ?>>
<script id="tpx_mas_services_billing_AMOUNT" type="text/html"><span id="el_mas_services_billing_AMOUNT">
<span<?php echo $mas_services_billing_view->AMOUNT->viewAttributes() ?>><?php echo $mas_services_billing_view->AMOUNT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<tr id="r_SERVICE_TYPE">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_SERVICE_TYPE"><script id="tpc_mas_services_billing_SERVICE_TYPE" type="text/html"><?php echo $mas_services_billing_view->SERVICE_TYPE->caption() ?></script></span></td>
		<td data-name="SERVICE_TYPE" <?php echo $mas_services_billing_view->SERVICE_TYPE->cellAttributes() ?>>
<script id="tpx_mas_services_billing_SERVICE_TYPE" type="text/html"><span id="el_mas_services_billing_SERVICE_TYPE">
<span<?php echo $mas_services_billing_view->SERVICE_TYPE->viewAttributes() ?>><?php echo $mas_services_billing_view->SERVICE_TYPE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<tr id="r_DEPARTMENT">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_DEPARTMENT"><script id="tpc_mas_services_billing_DEPARTMENT" type="text/html"><?php echo $mas_services_billing_view->DEPARTMENT->caption() ?></script></span></td>
		<td data-name="DEPARTMENT" <?php echo $mas_services_billing_view->DEPARTMENT->cellAttributes() ?>>
<script id="tpx_mas_services_billing_DEPARTMENT" type="text/html"><span id="el_mas_services_billing_DEPARTMENT">
<span<?php echo $mas_services_billing_view->DEPARTMENT->viewAttributes() ?>><?php echo $mas_services_billing_view->DEPARTMENT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->Created->Visible) { // Created ?>
	<tr id="r_Created">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Created"><script id="tpc_mas_services_billing_Created" type="text/html"><?php echo $mas_services_billing_view->Created->caption() ?></script></span></td>
		<td data-name="Created" <?php echo $mas_services_billing_view->Created->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Created" type="text/html"><span id="el_mas_services_billing_Created">
<span<?php echo $mas_services_billing_view->Created->viewAttributes() ?>><?php echo $mas_services_billing_view->Created->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_CreatedDateTime"><script id="tpc_mas_services_billing_CreatedDateTime" type="text/html"><?php echo $mas_services_billing_view->CreatedDateTime->caption() ?></script></span></td>
		<td data-name="CreatedDateTime" <?php echo $mas_services_billing_view->CreatedDateTime->cellAttributes() ?>>
<script id="tpx_mas_services_billing_CreatedDateTime" type="text/html"><span id="el_mas_services_billing_CreatedDateTime">
<span<?php echo $mas_services_billing_view->CreatedDateTime->viewAttributes() ?>><?php echo $mas_services_billing_view->CreatedDateTime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->Modified->Visible) { // Modified ?>
	<tr id="r_Modified">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Modified"><script id="tpc_mas_services_billing_Modified" type="text/html"><?php echo $mas_services_billing_view->Modified->caption() ?></script></span></td>
		<td data-name="Modified" <?php echo $mas_services_billing_view->Modified->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Modified" type="text/html"><span id="el_mas_services_billing_Modified">
<span<?php echo $mas_services_billing_view->Modified->viewAttributes() ?>><?php echo $mas_services_billing_view->Modified->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_ModifiedDateTime"><script id="tpc_mas_services_billing_ModifiedDateTime" type="text/html"><?php echo $mas_services_billing_view->ModifiedDateTime->caption() ?></script></span></td>
		<td data-name="ModifiedDateTime" <?php echo $mas_services_billing_view->ModifiedDateTime->cellAttributes() ?>>
<script id="tpx_mas_services_billing_ModifiedDateTime" type="text/html"><span id="el_mas_services_billing_ModifiedDateTime">
<span<?php echo $mas_services_billing_view->ModifiedDateTime->viewAttributes() ?>><?php echo $mas_services_billing_view->ModifiedDateTime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<tr id="r_mas_services_billingcol">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_mas_services_billingcol"><script id="tpc_mas_services_billing_mas_services_billingcol" type="text/html"><?php echo $mas_services_billing_view->mas_services_billingcol->caption() ?></script></span></td>
		<td data-name="mas_services_billingcol" <?php echo $mas_services_billing_view->mas_services_billingcol->cellAttributes() ?>>
<script id="tpx_mas_services_billing_mas_services_billingcol" type="text/html"><span id="el_mas_services_billing_mas_services_billingcol">
<span<?php echo $mas_services_billing_view->mas_services_billingcol->viewAttributes() ?>><?php echo $mas_services_billing_view->mas_services_billingcol->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->DrShareAmount->Visible) { // DrShareAmount ?>
	<tr id="r_DrShareAmount">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_DrShareAmount"><script id="tpc_mas_services_billing_DrShareAmount" type="text/html"><?php echo $mas_services_billing_view->DrShareAmount->caption() ?></script></span></td>
		<td data-name="DrShareAmount" <?php echo $mas_services_billing_view->DrShareAmount->cellAttributes() ?>>
<script id="tpx_mas_services_billing_DrShareAmount" type="text/html"><span id="el_mas_services_billing_DrShareAmount">
<span<?php echo $mas_services_billing_view->DrShareAmount->viewAttributes() ?>><?php echo $mas_services_billing_view->DrShareAmount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->HospShareAmount->Visible) { // HospShareAmount ?>
	<tr id="r_HospShareAmount">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_HospShareAmount"><script id="tpc_mas_services_billing_HospShareAmount" type="text/html"><?php echo $mas_services_billing_view->HospShareAmount->caption() ?></script></span></td>
		<td data-name="HospShareAmount" <?php echo $mas_services_billing_view->HospShareAmount->cellAttributes() ?>>
<script id="tpx_mas_services_billing_HospShareAmount" type="text/html"><span id="el_mas_services_billing_HospShareAmount">
<span<?php echo $mas_services_billing_view->HospShareAmount->viewAttributes() ?>><?php echo $mas_services_billing_view->HospShareAmount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->DrSharePer->Visible) { // DrSharePer ?>
	<tr id="r_DrSharePer">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_DrSharePer"><script id="tpc_mas_services_billing_DrSharePer" type="text/html"><?php echo $mas_services_billing_view->DrSharePer->caption() ?></script></span></td>
		<td data-name="DrSharePer" <?php echo $mas_services_billing_view->DrSharePer->cellAttributes() ?>>
<script id="tpx_mas_services_billing_DrSharePer" type="text/html"><span id="el_mas_services_billing_DrSharePer">
<span<?php echo $mas_services_billing_view->DrSharePer->viewAttributes() ?>><?php echo $mas_services_billing_view->DrSharePer->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->HospSharePer->Visible) { // HospSharePer ?>
	<tr id="r_HospSharePer">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_HospSharePer"><script id="tpc_mas_services_billing_HospSharePer" type="text/html"><?php echo $mas_services_billing_view->HospSharePer->caption() ?></script></span></td>
		<td data-name="HospSharePer" <?php echo $mas_services_billing_view->HospSharePer->cellAttributes() ?>>
<script id="tpx_mas_services_billing_HospSharePer" type="text/html"><span id="el_mas_services_billing_HospSharePer">
<span<?php echo $mas_services_billing_view->HospSharePer->viewAttributes() ?>><?php echo $mas_services_billing_view->HospSharePer->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_HospID"><script id="tpc_mas_services_billing_HospID" type="text/html"><?php echo $mas_services_billing_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $mas_services_billing_view->HospID->cellAttributes() ?>>
<script id="tpx_mas_services_billing_HospID" type="text/html"><span id="el_mas_services_billing_HospID">
<span<?php echo $mas_services_billing_view->HospID->viewAttributes() ?>><?php echo $mas_services_billing_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->TestSubCd->Visible) { // TestSubCd ?>
	<tr id="r_TestSubCd">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_TestSubCd"><script id="tpc_mas_services_billing_TestSubCd" type="text/html"><?php echo $mas_services_billing_view->TestSubCd->caption() ?></script></span></td>
		<td data-name="TestSubCd" <?php echo $mas_services_billing_view->TestSubCd->cellAttributes() ?>>
<script id="tpx_mas_services_billing_TestSubCd" type="text/html"><span id="el_mas_services_billing_TestSubCd">
<span<?php echo $mas_services_billing_view->TestSubCd->viewAttributes() ?>><?php echo $mas_services_billing_view->TestSubCd->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->Method->Visible) { // Method ?>
	<tr id="r_Method">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Method"><script id="tpc_mas_services_billing_Method" type="text/html"><?php echo $mas_services_billing_view->Method->caption() ?></script></span></td>
		<td data-name="Method" <?php echo $mas_services_billing_view->Method->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Method" type="text/html"><span id="el_mas_services_billing_Method">
<span<?php echo $mas_services_billing_view->Method->viewAttributes() ?>><?php echo $mas_services_billing_view->Method->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->Order->Visible) { // Order ?>
	<tr id="r_Order">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Order"><script id="tpc_mas_services_billing_Order" type="text/html"><?php echo $mas_services_billing_view->Order->caption() ?></script></span></td>
		<td data-name="Order" <?php echo $mas_services_billing_view->Order->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Order" type="text/html"><span id="el_mas_services_billing_Order">
<span<?php echo $mas_services_billing_view->Order->viewAttributes() ?>><?php echo $mas_services_billing_view->Order->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->Form->Visible) { // Form ?>
	<tr id="r_Form">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Form"><script id="tpc_mas_services_billing_Form" type="text/html"><?php echo $mas_services_billing_view->Form->caption() ?></script></span></td>
		<td data-name="Form" <?php echo $mas_services_billing_view->Form->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Form" type="text/html"><span id="el_mas_services_billing_Form">
<span<?php echo $mas_services_billing_view->Form->viewAttributes() ?>><?php echo $mas_services_billing_view->Form->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->ResType->Visible) { // ResType ?>
	<tr id="r_ResType">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_ResType"><script id="tpc_mas_services_billing_ResType" type="text/html"><?php echo $mas_services_billing_view->ResType->caption() ?></script></span></td>
		<td data-name="ResType" <?php echo $mas_services_billing_view->ResType->cellAttributes() ?>>
<script id="tpx_mas_services_billing_ResType" type="text/html"><span id="el_mas_services_billing_ResType">
<span<?php echo $mas_services_billing_view->ResType->viewAttributes() ?>><?php echo $mas_services_billing_view->ResType->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->UnitCD->Visible) { // UnitCD ?>
	<tr id="r_UnitCD">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_UnitCD"><script id="tpc_mas_services_billing_UnitCD" type="text/html"><?php echo $mas_services_billing_view->UnitCD->caption() ?></script></span></td>
		<td data-name="UnitCD" <?php echo $mas_services_billing_view->UnitCD->cellAttributes() ?>>
<script id="tpx_mas_services_billing_UnitCD" type="text/html"><span id="el_mas_services_billing_UnitCD">
<span<?php echo $mas_services_billing_view->UnitCD->viewAttributes() ?>><?php echo $mas_services_billing_view->UnitCD->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->RefValue->Visible) { // RefValue ?>
	<tr id="r_RefValue">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_RefValue"><script id="tpc_mas_services_billing_RefValue" type="text/html"><?php echo $mas_services_billing_view->RefValue->caption() ?></script></span></td>
		<td data-name="RefValue" <?php echo $mas_services_billing_view->RefValue->cellAttributes() ?>>
<script id="tpx_mas_services_billing_RefValue" type="text/html"><span id="el_mas_services_billing_RefValue">
<span<?php echo $mas_services_billing_view->RefValue->viewAttributes() ?>><?php echo $mas_services_billing_view->RefValue->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->Sample->Visible) { // Sample ?>
	<tr id="r_Sample">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Sample"><script id="tpc_mas_services_billing_Sample" type="text/html"><?php echo $mas_services_billing_view->Sample->caption() ?></script></span></td>
		<td data-name="Sample" <?php echo $mas_services_billing_view->Sample->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Sample" type="text/html"><span id="el_mas_services_billing_Sample">
<span<?php echo $mas_services_billing_view->Sample->viewAttributes() ?>><?php echo $mas_services_billing_view->Sample->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->NoD->Visible) { // NoD ?>
	<tr id="r_NoD">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_NoD"><script id="tpc_mas_services_billing_NoD" type="text/html"><?php echo $mas_services_billing_view->NoD->caption() ?></script></span></td>
		<td data-name="NoD" <?php echo $mas_services_billing_view->NoD->cellAttributes() ?>>
<script id="tpx_mas_services_billing_NoD" type="text/html"><span id="el_mas_services_billing_NoD">
<span<?php echo $mas_services_billing_view->NoD->viewAttributes() ?>><?php echo $mas_services_billing_view->NoD->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->BillOrder->Visible) { // BillOrder ?>
	<tr id="r_BillOrder">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_BillOrder"><script id="tpc_mas_services_billing_BillOrder" type="text/html"><?php echo $mas_services_billing_view->BillOrder->caption() ?></script></span></td>
		<td data-name="BillOrder" <?php echo $mas_services_billing_view->BillOrder->cellAttributes() ?>>
<script id="tpx_mas_services_billing_BillOrder" type="text/html"><span id="el_mas_services_billing_BillOrder">
<span<?php echo $mas_services_billing_view->BillOrder->viewAttributes() ?>><?php echo $mas_services_billing_view->BillOrder->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->Formula->Visible) { // Formula ?>
	<tr id="r_Formula">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Formula"><script id="tpc_mas_services_billing_Formula" type="text/html"><?php echo $mas_services_billing_view->Formula->caption() ?></script></span></td>
		<td data-name="Formula" <?php echo $mas_services_billing_view->Formula->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Formula" type="text/html"><span id="el_mas_services_billing_Formula">
<span<?php echo $mas_services_billing_view->Formula->viewAttributes() ?>><?php echo $mas_services_billing_view->Formula->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->Inactive->Visible) { // Inactive ?>
	<tr id="r_Inactive">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Inactive"><script id="tpc_mas_services_billing_Inactive" type="text/html"><?php echo $mas_services_billing_view->Inactive->caption() ?></script></span></td>
		<td data-name="Inactive" <?php echo $mas_services_billing_view->Inactive->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Inactive" type="text/html"><span id="el_mas_services_billing_Inactive">
<span<?php echo $mas_services_billing_view->Inactive->viewAttributes() ?>><?php echo $mas_services_billing_view->Inactive->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->Outsource->Visible) { // Outsource ?>
	<tr id="r_Outsource">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Outsource"><script id="tpc_mas_services_billing_Outsource" type="text/html"><?php echo $mas_services_billing_view->Outsource->caption() ?></script></span></td>
		<td data-name="Outsource" <?php echo $mas_services_billing_view->Outsource->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Outsource" type="text/html"><span id="el_mas_services_billing_Outsource">
<span<?php echo $mas_services_billing_view->Outsource->viewAttributes() ?>><?php echo $mas_services_billing_view->Outsource->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->CollSample->Visible) { // CollSample ?>
	<tr id="r_CollSample">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_CollSample"><script id="tpc_mas_services_billing_CollSample" type="text/html"><?php echo $mas_services_billing_view->CollSample->caption() ?></script></span></td>
		<td data-name="CollSample" <?php echo $mas_services_billing_view->CollSample->cellAttributes() ?>>
<script id="tpx_mas_services_billing_CollSample" type="text/html"><span id="el_mas_services_billing_CollSample">
<span<?php echo $mas_services_billing_view->CollSample->viewAttributes() ?>><?php echo $mas_services_billing_view->CollSample->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->TestType->Visible) { // TestType ?>
	<tr id="r_TestType">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_TestType"><script id="tpc_mas_services_billing_TestType" type="text/html"><?php echo $mas_services_billing_view->TestType->caption() ?></script></span></td>
		<td data-name="TestType" <?php echo $mas_services_billing_view->TestType->cellAttributes() ?>>
<script id="tpx_mas_services_billing_TestType" type="text/html"><span id="el_mas_services_billing_TestType">
<span<?php echo $mas_services_billing_view->TestType->viewAttributes() ?>><?php echo $mas_services_billing_view->TestType->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->NoHeading->Visible) { // NoHeading ?>
	<tr id="r_NoHeading">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_NoHeading"><script id="tpc_mas_services_billing_NoHeading" type="text/html"><?php echo $mas_services_billing_view->NoHeading->caption() ?></script></span></td>
		<td data-name="NoHeading" <?php echo $mas_services_billing_view->NoHeading->cellAttributes() ?>>
<script id="tpx_mas_services_billing_NoHeading" type="text/html"><span id="el_mas_services_billing_NoHeading">
<span<?php echo $mas_services_billing_view->NoHeading->viewAttributes() ?>><?php echo $mas_services_billing_view->NoHeading->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->ChemicalCode->Visible) { // ChemicalCode ?>
	<tr id="r_ChemicalCode">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_ChemicalCode"><script id="tpc_mas_services_billing_ChemicalCode" type="text/html"><?php echo $mas_services_billing_view->ChemicalCode->caption() ?></script></span></td>
		<td data-name="ChemicalCode" <?php echo $mas_services_billing_view->ChemicalCode->cellAttributes() ?>>
<script id="tpx_mas_services_billing_ChemicalCode" type="text/html"><span id="el_mas_services_billing_ChemicalCode">
<span<?php echo $mas_services_billing_view->ChemicalCode->viewAttributes() ?>><?php echo $mas_services_billing_view->ChemicalCode->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->ChemicalName->Visible) { // ChemicalName ?>
	<tr id="r_ChemicalName">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_ChemicalName"><script id="tpc_mas_services_billing_ChemicalName" type="text/html"><?php echo $mas_services_billing_view->ChemicalName->caption() ?></script></span></td>
		<td data-name="ChemicalName" <?php echo $mas_services_billing_view->ChemicalName->cellAttributes() ?>>
<script id="tpx_mas_services_billing_ChemicalName" type="text/html"><span id="el_mas_services_billing_ChemicalName">
<span<?php echo $mas_services_billing_view->ChemicalName->viewAttributes() ?>><?php echo $mas_services_billing_view->ChemicalName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->Utilaization->Visible) { // Utilaization ?>
	<tr id="r_Utilaization">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Utilaization"><script id="tpc_mas_services_billing_Utilaization" type="text/html"><?php echo $mas_services_billing_view->Utilaization->caption() ?></script></span></td>
		<td data-name="Utilaization" <?php echo $mas_services_billing_view->Utilaization->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Utilaization" type="text/html"><span id="el_mas_services_billing_Utilaization">
<span<?php echo $mas_services_billing_view->Utilaization->viewAttributes() ?>><?php echo $mas_services_billing_view->Utilaization->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_billing_view->Interpretation->Visible) { // Interpretation ?>
	<tr id="r_Interpretation">
		<td class="<?php echo $mas_services_billing_view->TableLeftColumnClass ?>"><span id="elh_mas_services_billing_Interpretation"><script id="tpc_mas_services_billing_Interpretation" type="text/html"><?php echo $mas_services_billing_view->Interpretation->caption() ?></script></span></td>
		<td data-name="Interpretation" <?php echo $mas_services_billing_view->Interpretation->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Interpretation" type="text/html"><span id="el_mas_services_billing_Interpretation">
<span<?php echo $mas_services_billing_view->Interpretation->viewAttributes() ?>><?php echo $mas_services_billing_view->Interpretation->getViewValue() ?></span>
</span></script>
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
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_CODE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_CODE")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_SERVICE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_SERVICE")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_UNITS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_UNITS")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_AMOUNT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_AMOUNT")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_SERVICE_TYPE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_SERVICE_TYPE")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_DEPARTMENT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_DEPARTMENT")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_mas_services_billingcol"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_mas_services_billingcol")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_DrShareAmount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_DrShareAmount")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_HospShareAmount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_HospShareAmount")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_DrSharePer"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_DrSharePer")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_HospSharePer"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_HospSharePer")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_TestSubCd"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_TestSubCd")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Method"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_Method")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Order"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_Order")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Form"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_Form")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_ResType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_ResType")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_UnitCD"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_UnitCD")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Inactive"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_Inactive")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Outsource"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_Outsource")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_CollSample"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_CollSample")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_RefValue"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_RefValue")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Sample"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_Sample")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_NoD"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_NoD")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_BillOrder"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_BillOrder")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Formula"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_Formula")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_TestType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_TestType")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_NoHeading"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_NoHeading")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_ChemicalCode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_ChemicalCode")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_ChemicalName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_ChemicalName")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Utilaization"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_Utilaization")/}}</span>
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
{{include tmpl="#tpc_mas_services_billing_Interpretation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_mas_services_billing_Interpretation")/}}
</div>
</div>
</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($mas_services_billing->Rows) ?> };
	ew.applyTemplate("tpd_mas_services_billingview", "tpm_mas_services_billingview", "mas_services_billingview", "<?php echo $mas_services_billing->CustomExport ?>", ew.templateData.rows[0]);
	$("script.mas_services_billingview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$mas_services_billing_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_services_billing_view->isExport()) { ?>
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
$mas_services_billing_view->terminate();
?>