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
<?php include_once "header.php" ?>
<?php if (!$hospital_store->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhospital_storeview = currentForm = new ew.Form("fhospital_storeview", "view");

// Form_CustomValidate event
fhospital_storeview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhospital_storeview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhospital_storeview.lists["x_status"] = <?php echo $hospital_store_view->status->Lookup->toClientList() ?>;
fhospital_storeview.lists["x_status"].options = <?php echo JsonEncode($hospital_store_view->status->lookupOptions()) ?>;
fhospital_storeview.lists["x_HospId"] = <?php echo $hospital_store_view->HospId->Lookup->toClientList() ?>;
fhospital_storeview.lists["x_HospId"].options = <?php echo JsonEncode($hospital_store_view->HospId->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hospital_store->isExport()) { ?>
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
<?php if ($hospital_store_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hospital_store_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital_store">
<input type="hidden" name="modal" value="<?php echo (int)$hospital_store_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hospital_store->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_id"><?php echo $hospital_store->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hospital_store->id->cellAttributes() ?>>
<span id="el_hospital_store_id">
<span<?php echo $hospital_store->id->viewAttributes() ?>>
<?php echo $hospital_store->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store->logo->Visible) { // logo ?>
	<tr id="r_logo">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_logo"><?php echo $hospital_store->logo->caption() ?></span></td>
		<td data-name="logo"<?php echo $hospital_store->logo->cellAttributes() ?>>
<span id="el_hospital_store_logo">
<span>
<?php echo GetFileViewTag($hospital_store->logo, $hospital_store->logo->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store->pharmacy->Visible) { // pharmacy ?>
	<tr id="r_pharmacy">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_pharmacy"><?php echo $hospital_store->pharmacy->caption() ?></span></td>
		<td data-name="pharmacy"<?php echo $hospital_store->pharmacy->cellAttributes() ?>>
<span id="el_hospital_store_pharmacy">
<span<?php echo $hospital_store->pharmacy->viewAttributes() ?>>
<?php echo $hospital_store->pharmacy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store->street->Visible) { // street ?>
	<tr id="r_street">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_street"><?php echo $hospital_store->street->caption() ?></span></td>
		<td data-name="street"<?php echo $hospital_store->street->cellAttributes() ?>>
<span id="el_hospital_store_street">
<span<?php echo $hospital_store->street->viewAttributes() ?>>
<?php echo $hospital_store->street->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store->area->Visible) { // area ?>
	<tr id="r_area">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_area"><?php echo $hospital_store->area->caption() ?></span></td>
		<td data-name="area"<?php echo $hospital_store->area->cellAttributes() ?>>
<span id="el_hospital_store_area">
<span<?php echo $hospital_store->area->viewAttributes() ?>>
<?php echo $hospital_store->area->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store->town->Visible) { // town ?>
	<tr id="r_town">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_town"><?php echo $hospital_store->town->caption() ?></span></td>
		<td data-name="town"<?php echo $hospital_store->town->cellAttributes() ?>>
<span id="el_hospital_store_town">
<span<?php echo $hospital_store->town->viewAttributes() ?>>
<?php echo $hospital_store->town->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store->province->Visible) { // province ?>
	<tr id="r_province">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_province"><?php echo $hospital_store->province->caption() ?></span></td>
		<td data-name="province"<?php echo $hospital_store->province->cellAttributes() ?>>
<span id="el_hospital_store_province">
<span<?php echo $hospital_store->province->viewAttributes() ?>>
<?php echo $hospital_store->province->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store->postal_code->Visible) { // postal_code ?>
	<tr id="r_postal_code">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_postal_code"><?php echo $hospital_store->postal_code->caption() ?></span></td>
		<td data-name="postal_code"<?php echo $hospital_store->postal_code->cellAttributes() ?>>
<span id="el_hospital_store_postal_code">
<span<?php echo $hospital_store->postal_code->viewAttributes() ?>>
<?php echo $hospital_store->postal_code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store->phone_no->Visible) { // phone_no ?>
	<tr id="r_phone_no">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_phone_no"><?php echo $hospital_store->phone_no->caption() ?></span></td>
		<td data-name="phone_no"<?php echo $hospital_store->phone_no->cellAttributes() ?>>
<span id="el_hospital_store_phone_no">
<span<?php echo $hospital_store->phone_no->viewAttributes() ?>>
<?php echo $hospital_store->phone_no->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store->PreFixCode->Visible) { // PreFixCode ?>
	<tr id="r_PreFixCode">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_PreFixCode"><?php echo $hospital_store->PreFixCode->caption() ?></span></td>
		<td data-name="PreFixCode"<?php echo $hospital_store->PreFixCode->cellAttributes() ?>>
<span id="el_hospital_store_PreFixCode">
<span<?php echo $hospital_store->PreFixCode->viewAttributes() ?>>
<?php echo $hospital_store->PreFixCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_status"><?php echo $hospital_store->status->caption() ?></span></td>
		<td data-name="status"<?php echo $hospital_store->status->cellAttributes() ?>>
<span id="el_hospital_store_status">
<span<?php echo $hospital_store->status->viewAttributes() ?>>
<?php echo $hospital_store->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_createdby"><?php echo $hospital_store->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $hospital_store->createdby->cellAttributes() ?>>
<span id="el_hospital_store_createdby">
<span<?php echo $hospital_store->createdby->viewAttributes() ?>>
<?php echo $hospital_store->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_createddatetime"><?php echo $hospital_store->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $hospital_store->createddatetime->cellAttributes() ?>>
<span id="el_hospital_store_createddatetime">
<span<?php echo $hospital_store->createddatetime->viewAttributes() ?>>
<?php echo $hospital_store->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_modifiedby"><?php echo $hospital_store->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $hospital_store->modifiedby->cellAttributes() ?>>
<span id="el_hospital_store_modifiedby">
<span<?php echo $hospital_store->modifiedby->viewAttributes() ?>>
<?php echo $hospital_store->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_modifieddatetime"><?php echo $hospital_store->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $hospital_store->modifieddatetime->cellAttributes() ?>>
<span id="el_hospital_store_modifieddatetime">
<span<?php echo $hospital_store->modifieddatetime->viewAttributes() ?>>
<?php echo $hospital_store->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store->pharmacyGST->Visible) { // pharmacyGST ?>
	<tr id="r_pharmacyGST">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_pharmacyGST"><?php echo $hospital_store->pharmacyGST->caption() ?></span></td>
		<td data-name="pharmacyGST"<?php echo $hospital_store->pharmacyGST->cellAttributes() ?>>
<span id="el_hospital_store_pharmacyGST">
<span<?php echo $hospital_store->pharmacyGST->viewAttributes() ?>>
<?php echo $hospital_store->pharmacyGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store->HospId->Visible) { // HospId ?>
	<tr id="r_HospId">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_HospId"><?php echo $hospital_store->HospId->caption() ?></span></td>
		<td data-name="HospId"<?php echo $hospital_store->HospId->cellAttributes() ?>>
<span id="el_hospital_store_HospId">
<span<?php echo $hospital_store->HospId->viewAttributes() ?>>
<?php echo $hospital_store->HospId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_store->BranchID->Visible) { // BranchID ?>
	<tr id="r_BranchID">
		<td class="<?php echo $hospital_store_view->TableLeftColumnClass ?>"><span id="elh_hospital_store_BranchID"><?php echo $hospital_store->BranchID->caption() ?></span></td>
		<td data-name="BranchID"<?php echo $hospital_store->BranchID->cellAttributes() ?>>
<span id="el_hospital_store_BranchID">
<span<?php echo $hospital_store->BranchID->viewAttributes() ?>>
<?php echo $hospital_store->BranchID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hospital_store_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hospital_store->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hospital_store_view->terminate();
?>