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
$hospital_view = new hospital_view();

// Run the page
$hospital_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$hospital_view->isExport()) { ?>
<script>
var fhospitalview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fhospitalview = currentForm = new ew.Form("fhospitalview", "view");
	loadjs.done("fhospitalview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$hospital_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hospital_view->ExportOptions->render("body") ?>
<?php $hospital_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hospital_view->showPageHeader(); ?>
<?php
$hospital_view->showMessage();
?>
<form name="fhospitalview" id="fhospitalview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital">
<input type="hidden" name="modal" value="<?php echo (int)$hospital_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hospital_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_id"><?php echo $hospital_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $hospital_view->id->cellAttributes() ?>>
<span id="el_hospital_id">
<span<?php echo $hospital_view->id->viewAttributes() ?>><?php echo $hospital_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_view->logo->Visible) { // logo ?>
	<tr id="r_logo">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_logo"><?php echo $hospital_view->logo->caption() ?></span></td>
		<td data-name="logo" <?php echo $hospital_view->logo->cellAttributes() ?>>
<span id="el_hospital_logo">
<span><?php echo GetFileViewTag($hospital_view->logo, $hospital_view->logo->getViewValue(), FALSE) ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_view->hospital->Visible) { // hospital ?>
	<tr id="r_hospital">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_hospital"><?php echo $hospital_view->hospital->caption() ?></span></td>
		<td data-name="hospital" <?php echo $hospital_view->hospital->cellAttributes() ?>>
<span id="el_hospital_hospital">
<span<?php echo $hospital_view->hospital->viewAttributes() ?>><?php echo $hospital_view->hospital->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_view->street->Visible) { // street ?>
	<tr id="r_street">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_street"><?php echo $hospital_view->street->caption() ?></span></td>
		<td data-name="street" <?php echo $hospital_view->street->cellAttributes() ?>>
<span id="el_hospital_street">
<span<?php echo $hospital_view->street->viewAttributes() ?>><?php echo $hospital_view->street->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_view->area->Visible) { // area ?>
	<tr id="r_area">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_area"><?php echo $hospital_view->area->caption() ?></span></td>
		<td data-name="area" <?php echo $hospital_view->area->cellAttributes() ?>>
<span id="el_hospital_area">
<span<?php echo $hospital_view->area->viewAttributes() ?>><?php echo $hospital_view->area->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_view->town->Visible) { // town ?>
	<tr id="r_town">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_town"><?php echo $hospital_view->town->caption() ?></span></td>
		<td data-name="town" <?php echo $hospital_view->town->cellAttributes() ?>>
<span id="el_hospital_town">
<span<?php echo $hospital_view->town->viewAttributes() ?>><?php echo $hospital_view->town->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_view->province->Visible) { // province ?>
	<tr id="r_province">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_province"><?php echo $hospital_view->province->caption() ?></span></td>
		<td data-name="province" <?php echo $hospital_view->province->cellAttributes() ?>>
<span id="el_hospital_province">
<span<?php echo $hospital_view->province->viewAttributes() ?>><?php echo $hospital_view->province->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_view->postal_code->Visible) { // postal_code ?>
	<tr id="r_postal_code">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_postal_code"><?php echo $hospital_view->postal_code->caption() ?></span></td>
		<td data-name="postal_code" <?php echo $hospital_view->postal_code->cellAttributes() ?>>
<span id="el_hospital_postal_code">
<span<?php echo $hospital_view->postal_code->viewAttributes() ?>><?php echo $hospital_view->postal_code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_view->phone_no->Visible) { // phone_no ?>
	<tr id="r_phone_no">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_phone_no"><?php echo $hospital_view->phone_no->caption() ?></span></td>
		<td data-name="phone_no" <?php echo $hospital_view->phone_no->cellAttributes() ?>>
<span id="el_hospital_phone_no">
<span<?php echo $hospital_view->phone_no->viewAttributes() ?>><?php echo $hospital_view->phone_no->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_status"><?php echo $hospital_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $hospital_view->status->cellAttributes() ?>>
<span id="el_hospital_status">
<span<?php echo $hospital_view->status->viewAttributes() ?>><?php echo $hospital_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_view->PreFixCode->Visible) { // PreFixCode ?>
	<tr id="r_PreFixCode">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_PreFixCode"><?php echo $hospital_view->PreFixCode->caption() ?></span></td>
		<td data-name="PreFixCode" <?php echo $hospital_view->PreFixCode->cellAttributes() ?>>
<span id="el_hospital_PreFixCode">
<span<?php echo $hospital_view->PreFixCode->viewAttributes() ?>><?php echo $hospital_view->PreFixCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_view->BillingGST->Visible) { // BillingGST ?>
	<tr id="r_BillingGST">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_BillingGST"><?php echo $hospital_view->BillingGST->caption() ?></span></td>
		<td data-name="BillingGST" <?php echo $hospital_view->BillingGST->cellAttributes() ?>>
<span id="el_hospital_BillingGST">
<span<?php echo $hospital_view->BillingGST->viewAttributes() ?>><?php echo $hospital_view->BillingGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_view->pharmacyGST->Visible) { // pharmacyGST ?>
	<tr id="r_pharmacyGST">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacyGST"><?php echo $hospital_view->pharmacyGST->caption() ?></span></td>
		<td data-name="pharmacyGST" <?php echo $hospital_view->pharmacyGST->cellAttributes() ?>>
<span id="el_hospital_pharmacyGST">
<span<?php echo $hospital_view->pharmacyGST->viewAttributes() ?>><?php echo $hospital_view->pharmacyGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hospital_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$hospital_view->isExport()) { ?>
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
$hospital_view->terminate();
?>