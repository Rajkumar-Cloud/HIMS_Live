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
$hospital_store_view = new hospital_store_view();

// Run the page
$hospital_store_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_store_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$hospital_store_view->isExport()) { ?>
<script>
var fhospital_storeview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fhospital_storeview = currentForm = new ew.Form("fhospital_storeview", "view");
	loadjs.done("fhospital_storeview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$hospital_store_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hospital_store_view->ExportOptions->render("body") ?>
<?php $hospital_store_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hospital_store_view->showPageHeader(); ?>
<?php
$hospital_store_view->showMessage();
?>
<form name="fhospital_storeview" id="fhospital_storeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital_store">
<input type="hidden" name="modal" value="<?php echo (int)$hospital_store_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hospital_store_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_id"><?php echo $hospital_store_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $hospital_store_view->id->cellAttributes() ?>>
<span id="el_hospital_store_id">
<span<?php echo $hospital_store_view->id->viewAttributes() ?>><?php echo $hospital_store_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store_view->logo->Visible) { // logo ?>
	<tr id="r_logo">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_logo"><?php echo $hospital_store_view->logo->caption() ?></span></td>
		<td data-name="logo" <?php echo $hospital_store_view->logo->cellAttributes() ?>>
<span id="el_hospital_store_logo">
<span><?php echo GetFileViewTag($hospital_store_view->logo, $hospital_store_view->logo->getViewValue(), FALSE) ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store_view->pharmacy->Visible) { // pharmacy ?>
	<tr id="r_pharmacy">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_pharmacy"><?php echo $hospital_store_view->pharmacy->caption() ?></span></td>
		<td data-name="pharmacy" <?php echo $hospital_store_view->pharmacy->cellAttributes() ?>>
<span id="el_hospital_store_pharmacy">
<span<?php echo $hospital_store_view->pharmacy->viewAttributes() ?>><?php echo $hospital_store_view->pharmacy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store_view->street->Visible) { // street ?>
	<tr id="r_street">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_street"><?php echo $hospital_store_view->street->caption() ?></span></td>
		<td data-name="street" <?php echo $hospital_store_view->street->cellAttributes() ?>>
<span id="el_hospital_store_street">
<span<?php echo $hospital_store_view->street->viewAttributes() ?>><?php echo $hospital_store_view->street->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store_view->area->Visible) { // area ?>
	<tr id="r_area">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_area"><?php echo $hospital_store_view->area->caption() ?></span></td>
		<td data-name="area" <?php echo $hospital_store_view->area->cellAttributes() ?>>
<span id="el_hospital_store_area">
<span<?php echo $hospital_store_view->area->viewAttributes() ?>><?php echo $hospital_store_view->area->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store_view->town->Visible) { // town ?>
	<tr id="r_town">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_town"><?php echo $hospital_store_view->town->caption() ?></span></td>
		<td data-name="town" <?php echo $hospital_store_view->town->cellAttributes() ?>>
<span id="el_hospital_store_town">
<span<?php echo $hospital_store_view->town->viewAttributes() ?>><?php echo $hospital_store_view->town->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store_view->province->Visible) { // province ?>
	<tr id="r_province">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_province"><?php echo $hospital_store_view->province->caption() ?></span></td>
		<td data-name="province" <?php echo $hospital_store_view->province->cellAttributes() ?>>
<span id="el_hospital_store_province">
<span<?php echo $hospital_store_view->province->viewAttributes() ?>><?php echo $hospital_store_view->province->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store_view->postal_code->Visible) { // postal_code ?>
	<tr id="r_postal_code">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_postal_code"><?php echo $hospital_store_view->postal_code->caption() ?></span></td>
		<td data-name="postal_code" <?php echo $hospital_store_view->postal_code->cellAttributes() ?>>
<span id="el_hospital_store_postal_code">
<span<?php echo $hospital_store_view->postal_code->viewAttributes() ?>><?php echo $hospital_store_view->postal_code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store_view->phone_no->Visible) { // phone_no ?>
	<tr id="r_phone_no">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_phone_no"><?php echo $hospital_store_view->phone_no->caption() ?></span></td>
		<td data-name="phone_no" <?php echo $hospital_store_view->phone_no->cellAttributes() ?>>
<span id="el_hospital_store_phone_no">
<span<?php echo $hospital_store_view->phone_no->viewAttributes() ?>><?php echo $hospital_store_view->phone_no->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store_view->PreFixCode->Visible) { // PreFixCode ?>
	<tr id="r_PreFixCode">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_PreFixCode"><?php echo $hospital_store_view->PreFixCode->caption() ?></span></td>
		<td data-name="PreFixCode" <?php echo $hospital_store_view->PreFixCode->cellAttributes() ?>>
<span id="el_hospital_store_PreFixCode">
<span<?php echo $hospital_store_view->PreFixCode->viewAttributes() ?>><?php echo $hospital_store_view->PreFixCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_status"><?php echo $hospital_store_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $hospital_store_view->status->cellAttributes() ?>>
<span id="el_hospital_store_status">
<span<?php echo $hospital_store_view->status->viewAttributes() ?>><?php echo $hospital_store_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_createdby"><?php echo $hospital_store_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $hospital_store_view->createdby->cellAttributes() ?>>
<span id="el_hospital_store_createdby">
<span<?php echo $hospital_store_view->createdby->viewAttributes() ?>><?php echo $hospital_store_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_createddatetime"><?php echo $hospital_store_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $hospital_store_view->createddatetime->cellAttributes() ?>>
<span id="el_hospital_store_createddatetime">
<span<?php echo $hospital_store_view->createddatetime->viewAttributes() ?>><?php echo $hospital_store_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_modifiedby"><?php echo $hospital_store_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $hospital_store_view->modifiedby->cellAttributes() ?>>
<span id="el_hospital_store_modifiedby">
<span<?php echo $hospital_store_view->modifiedby->viewAttributes() ?>><?php echo $hospital_store_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_modifieddatetime"><?php echo $hospital_store_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $hospital_store_view->modifieddatetime->cellAttributes() ?>>
<span id="el_hospital_store_modifieddatetime">
<span<?php echo $hospital_store_view->modifieddatetime->viewAttributes() ?>><?php echo $hospital_store_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store_view->pharmacyGST->Visible) { // pharmacyGST ?>
	<tr id="r_pharmacyGST">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_pharmacyGST"><?php echo $hospital_store_view->pharmacyGST->caption() ?></span></td>
		<td data-name="pharmacyGST" <?php echo $hospital_store_view->pharmacyGST->cellAttributes() ?>>
<span id="el_hospital_store_pharmacyGST">
<span<?php echo $hospital_store_view->pharmacyGST->viewAttributes() ?>><?php echo $hospital_store_view->pharmacyGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store_view->HospId->Visible) { // HospId ?>
	<tr id="r_HospId">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_HospId"><?php echo $hospital_store_view->HospId->caption() ?></span></td>
		<td data-name="HospId" <?php echo $hospital_store_view->HospId->cellAttributes() ?>>
<span id="el_hospital_store_HospId">
<span<?php echo $hospital_store_view->HospId->viewAttributes() ?>><?php echo $hospital_store_view->HospId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hospital_store_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$hospital_store_view->isExport()) { ?>
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
$hospital_store_view->terminate();
?>