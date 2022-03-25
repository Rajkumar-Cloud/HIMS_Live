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
$hospital_pharmacy_view = new hospital_pharmacy_view();

// Run the page
$hospital_pharmacy_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_pharmacy_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$hospital_pharmacy_view->isExport()) { ?>
<script>
var fhospital_pharmacyview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fhospital_pharmacyview = currentForm = new ew.Form("fhospital_pharmacyview", "view");
	loadjs.done("fhospital_pharmacyview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$hospital_pharmacy_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hospital_pharmacy_view->ExportOptions->render("body") ?>
<?php $hospital_pharmacy_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hospital_pharmacy_view->showPageHeader(); ?>
<?php
$hospital_pharmacy_view->showMessage();
?>
<form name="fhospital_pharmacyview" id="fhospital_pharmacyview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital_pharmacy">
<input type="hidden" name="modal" value="<?php echo (int)$hospital_pharmacy_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hospital_pharmacy_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_id"><?php echo $hospital_pharmacy_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $hospital_pharmacy_view->id->cellAttributes() ?>>
<span id="el_hospital_pharmacy_id">
<span<?php echo $hospital_pharmacy_view->id->viewAttributes() ?>><?php echo $hospital_pharmacy_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy_view->logo->Visible) { // logo ?>
	<tr id="r_logo">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_logo"><?php echo $hospital_pharmacy_view->logo->caption() ?></span></td>
		<td data-name="logo" <?php echo $hospital_pharmacy_view->logo->cellAttributes() ?>>
<span id="el_hospital_pharmacy_logo">
<span><?php echo GetFileViewTag($hospital_pharmacy_view->logo, $hospital_pharmacy_view->logo->getViewValue(), FALSE) ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy_view->pharmacy->Visible) { // pharmacy ?>
	<tr id="r_pharmacy">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_pharmacy"><?php echo $hospital_pharmacy_view->pharmacy->caption() ?></span></td>
		<td data-name="pharmacy" <?php echo $hospital_pharmacy_view->pharmacy->cellAttributes() ?>>
<span id="el_hospital_pharmacy_pharmacy">
<span<?php echo $hospital_pharmacy_view->pharmacy->viewAttributes() ?>><?php echo $hospital_pharmacy_view->pharmacy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy_view->street->Visible) { // street ?>
	<tr id="r_street">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_street"><?php echo $hospital_pharmacy_view->street->caption() ?></span></td>
		<td data-name="street" <?php echo $hospital_pharmacy_view->street->cellAttributes() ?>>
<span id="el_hospital_pharmacy_street">
<span<?php echo $hospital_pharmacy_view->street->viewAttributes() ?>><?php echo $hospital_pharmacy_view->street->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy_view->area->Visible) { // area ?>
	<tr id="r_area">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_area"><?php echo $hospital_pharmacy_view->area->caption() ?></span></td>
		<td data-name="area" <?php echo $hospital_pharmacy_view->area->cellAttributes() ?>>
<span id="el_hospital_pharmacy_area">
<span<?php echo $hospital_pharmacy_view->area->viewAttributes() ?>><?php echo $hospital_pharmacy_view->area->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy_view->town->Visible) { // town ?>
	<tr id="r_town">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_town"><?php echo $hospital_pharmacy_view->town->caption() ?></span></td>
		<td data-name="town" <?php echo $hospital_pharmacy_view->town->cellAttributes() ?>>
<span id="el_hospital_pharmacy_town">
<span<?php echo $hospital_pharmacy_view->town->viewAttributes() ?>><?php echo $hospital_pharmacy_view->town->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy_view->province->Visible) { // province ?>
	<tr id="r_province">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_province"><?php echo $hospital_pharmacy_view->province->caption() ?></span></td>
		<td data-name="province" <?php echo $hospital_pharmacy_view->province->cellAttributes() ?>>
<span id="el_hospital_pharmacy_province">
<span<?php echo $hospital_pharmacy_view->province->viewAttributes() ?>><?php echo $hospital_pharmacy_view->province->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy_view->postal_code->Visible) { // postal_code ?>
	<tr id="r_postal_code">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_postal_code"><?php echo $hospital_pharmacy_view->postal_code->caption() ?></span></td>
		<td data-name="postal_code" <?php echo $hospital_pharmacy_view->postal_code->cellAttributes() ?>>
<span id="el_hospital_pharmacy_postal_code">
<span<?php echo $hospital_pharmacy_view->postal_code->viewAttributes() ?>><?php echo $hospital_pharmacy_view->postal_code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy_view->phone_no->Visible) { // phone_no ?>
	<tr id="r_phone_no">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_phone_no"><?php echo $hospital_pharmacy_view->phone_no->caption() ?></span></td>
		<td data-name="phone_no" <?php echo $hospital_pharmacy_view->phone_no->cellAttributes() ?>>
<span id="el_hospital_pharmacy_phone_no">
<span<?php echo $hospital_pharmacy_view->phone_no->viewAttributes() ?>><?php echo $hospital_pharmacy_view->phone_no->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy_view->PreFixCode->Visible) { // PreFixCode ?>
	<tr id="r_PreFixCode">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_PreFixCode"><?php echo $hospital_pharmacy_view->PreFixCode->caption() ?></span></td>
		<td data-name="PreFixCode" <?php echo $hospital_pharmacy_view->PreFixCode->cellAttributes() ?>>
<span id="el_hospital_pharmacy_PreFixCode">
<span<?php echo $hospital_pharmacy_view->PreFixCode->viewAttributes() ?>><?php echo $hospital_pharmacy_view->PreFixCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_status"><?php echo $hospital_pharmacy_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $hospital_pharmacy_view->status->cellAttributes() ?>>
<span id="el_hospital_pharmacy_status">
<span<?php echo $hospital_pharmacy_view->status->viewAttributes() ?>><?php echo $hospital_pharmacy_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_createdby"><?php echo $hospital_pharmacy_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $hospital_pharmacy_view->createdby->cellAttributes() ?>>
<span id="el_hospital_pharmacy_createdby">
<span<?php echo $hospital_pharmacy_view->createdby->viewAttributes() ?>><?php echo $hospital_pharmacy_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_createddatetime"><?php echo $hospital_pharmacy_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $hospital_pharmacy_view->createddatetime->cellAttributes() ?>>
<span id="el_hospital_pharmacy_createddatetime">
<span<?php echo $hospital_pharmacy_view->createddatetime->viewAttributes() ?>><?php echo $hospital_pharmacy_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_modifiedby"><?php echo $hospital_pharmacy_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $hospital_pharmacy_view->modifiedby->cellAttributes() ?>>
<span id="el_hospital_pharmacy_modifiedby">
<span<?php echo $hospital_pharmacy_view->modifiedby->viewAttributes() ?>><?php echo $hospital_pharmacy_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_modifieddatetime"><?php echo $hospital_pharmacy_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $hospital_pharmacy_view->modifieddatetime->cellAttributes() ?>>
<span id="el_hospital_pharmacy_modifieddatetime">
<span<?php echo $hospital_pharmacy_view->modifieddatetime->viewAttributes() ?>><?php echo $hospital_pharmacy_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy_view->pharmacyGST->Visible) { // pharmacyGST ?>
	<tr id="r_pharmacyGST">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_pharmacyGST"><?php echo $hospital_pharmacy_view->pharmacyGST->caption() ?></span></td>
		<td data-name="pharmacyGST" <?php echo $hospital_pharmacy_view->pharmacyGST->cellAttributes() ?>>
<span id="el_hospital_pharmacy_pharmacyGST">
<span<?php echo $hospital_pharmacy_view->pharmacyGST->viewAttributes() ?>><?php echo $hospital_pharmacy_view->pharmacyGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy_view->HospId->Visible) { // HospId ?>
	<tr id="r_HospId">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_HospId"><?php echo $hospital_pharmacy_view->HospId->caption() ?></span></td>
		<td data-name="HospId" <?php echo $hospital_pharmacy_view->HospId->cellAttributes() ?>>
<span id="el_hospital_pharmacy_HospId">
<span<?php echo $hospital_pharmacy_view->HospId->viewAttributes() ?>><?php echo $hospital_pharmacy_view->HospId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hospital_pharmacy_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$hospital_pharmacy_view->isExport()) { ?>
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
$hospital_pharmacy_view->terminate();
?>