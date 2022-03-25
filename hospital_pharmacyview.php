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
<?php include_once "header.php" ?>
<?php if (!$hospital_pharmacy->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhospital_pharmacyview = currentForm = new ew.Form("fhospital_pharmacyview", "view");

// Form_CustomValidate event
fhospital_pharmacyview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhospital_pharmacyview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhospital_pharmacyview.lists["x_status"] = <?php echo $hospital_pharmacy_view->status->Lookup->toClientList() ?>;
fhospital_pharmacyview.lists["x_status"].options = <?php echo JsonEncode($hospital_pharmacy_view->status->lookupOptions()) ?>;
fhospital_pharmacyview.lists["x_HospId"] = <?php echo $hospital_pharmacy_view->HospId->Lookup->toClientList() ?>;
fhospital_pharmacyview.lists["x_HospId"].options = <?php echo JsonEncode($hospital_pharmacy_view->HospId->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hospital_pharmacy->isExport()) { ?>
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
<?php if ($hospital_pharmacy_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hospital_pharmacy_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital_pharmacy">
<input type="hidden" name="modal" value="<?php echo (int)$hospital_pharmacy_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hospital_pharmacy->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_id"><?php echo $hospital_pharmacy->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hospital_pharmacy->id->cellAttributes() ?>>
<span id="el_hospital_pharmacy_id">
<span<?php echo $hospital_pharmacy->id->viewAttributes() ?>>
<?php echo $hospital_pharmacy->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy->logo->Visible) { // logo ?>
	<tr id="r_logo">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_logo"><?php echo $hospital_pharmacy->logo->caption() ?></span></td>
		<td data-name="logo"<?php echo $hospital_pharmacy->logo->cellAttributes() ?>>
<span id="el_hospital_pharmacy_logo">
<span>
<?php echo GetFileViewTag($hospital_pharmacy->logo, $hospital_pharmacy->logo->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy->pharmacy->Visible) { // pharmacy ?>
	<tr id="r_pharmacy">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_pharmacy"><?php echo $hospital_pharmacy->pharmacy->caption() ?></span></td>
		<td data-name="pharmacy"<?php echo $hospital_pharmacy->pharmacy->cellAttributes() ?>>
<span id="el_hospital_pharmacy_pharmacy">
<span<?php echo $hospital_pharmacy->pharmacy->viewAttributes() ?>>
<?php echo $hospital_pharmacy->pharmacy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy->street->Visible) { // street ?>
	<tr id="r_street">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_street"><?php echo $hospital_pharmacy->street->caption() ?></span></td>
		<td data-name="street"<?php echo $hospital_pharmacy->street->cellAttributes() ?>>
<span id="el_hospital_pharmacy_street">
<span<?php echo $hospital_pharmacy->street->viewAttributes() ?>>
<?php echo $hospital_pharmacy->street->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy->area->Visible) { // area ?>
	<tr id="r_area">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_area"><?php echo $hospital_pharmacy->area->caption() ?></span></td>
		<td data-name="area"<?php echo $hospital_pharmacy->area->cellAttributes() ?>>
<span id="el_hospital_pharmacy_area">
<span<?php echo $hospital_pharmacy->area->viewAttributes() ?>>
<?php echo $hospital_pharmacy->area->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy->town->Visible) { // town ?>
	<tr id="r_town">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_town"><?php echo $hospital_pharmacy->town->caption() ?></span></td>
		<td data-name="town"<?php echo $hospital_pharmacy->town->cellAttributes() ?>>
<span id="el_hospital_pharmacy_town">
<span<?php echo $hospital_pharmacy->town->viewAttributes() ?>>
<?php echo $hospital_pharmacy->town->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy->province->Visible) { // province ?>
	<tr id="r_province">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_province"><?php echo $hospital_pharmacy->province->caption() ?></span></td>
		<td data-name="province"<?php echo $hospital_pharmacy->province->cellAttributes() ?>>
<span id="el_hospital_pharmacy_province">
<span<?php echo $hospital_pharmacy->province->viewAttributes() ?>>
<?php echo $hospital_pharmacy->province->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy->postal_code->Visible) { // postal_code ?>
	<tr id="r_postal_code">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_postal_code"><?php echo $hospital_pharmacy->postal_code->caption() ?></span></td>
		<td data-name="postal_code"<?php echo $hospital_pharmacy->postal_code->cellAttributes() ?>>
<span id="el_hospital_pharmacy_postal_code">
<span<?php echo $hospital_pharmacy->postal_code->viewAttributes() ?>>
<?php echo $hospital_pharmacy->postal_code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy->phone_no->Visible) { // phone_no ?>
	<tr id="r_phone_no">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_phone_no"><?php echo $hospital_pharmacy->phone_no->caption() ?></span></td>
		<td data-name="phone_no"<?php echo $hospital_pharmacy->phone_no->cellAttributes() ?>>
<span id="el_hospital_pharmacy_phone_no">
<span<?php echo $hospital_pharmacy->phone_no->viewAttributes() ?>>
<?php echo $hospital_pharmacy->phone_no->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy->PreFixCode->Visible) { // PreFixCode ?>
	<tr id="r_PreFixCode">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_PreFixCode"><?php echo $hospital_pharmacy->PreFixCode->caption() ?></span></td>
		<td data-name="PreFixCode"<?php echo $hospital_pharmacy->PreFixCode->cellAttributes() ?>>
<span id="el_hospital_pharmacy_PreFixCode">
<span<?php echo $hospital_pharmacy->PreFixCode->viewAttributes() ?>>
<?php echo $hospital_pharmacy->PreFixCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_status"><?php echo $hospital_pharmacy->status->caption() ?></span></td>
		<td data-name="status"<?php echo $hospital_pharmacy->status->cellAttributes() ?>>
<span id="el_hospital_pharmacy_status">
<span<?php echo $hospital_pharmacy->status->viewAttributes() ?>>
<?php echo $hospital_pharmacy->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_createdby"><?php echo $hospital_pharmacy->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $hospital_pharmacy->createdby->cellAttributes() ?>>
<span id="el_hospital_pharmacy_createdby">
<span<?php echo $hospital_pharmacy->createdby->viewAttributes() ?>>
<?php echo $hospital_pharmacy->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_createddatetime"><?php echo $hospital_pharmacy->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $hospital_pharmacy->createddatetime->cellAttributes() ?>>
<span id="el_hospital_pharmacy_createddatetime">
<span<?php echo $hospital_pharmacy->createddatetime->viewAttributes() ?>>
<?php echo $hospital_pharmacy->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_modifiedby"><?php echo $hospital_pharmacy->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $hospital_pharmacy->modifiedby->cellAttributes() ?>>
<span id="el_hospital_pharmacy_modifiedby">
<span<?php echo $hospital_pharmacy->modifiedby->viewAttributes() ?>>
<?php echo $hospital_pharmacy->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_modifieddatetime"><?php echo $hospital_pharmacy->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $hospital_pharmacy->modifieddatetime->cellAttributes() ?>>
<span id="el_hospital_pharmacy_modifieddatetime">
<span<?php echo $hospital_pharmacy->modifieddatetime->viewAttributes() ?>>
<?php echo $hospital_pharmacy->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy->pharmacyGST->Visible) { // pharmacyGST ?>
	<tr id="r_pharmacyGST">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_pharmacyGST"><?php echo $hospital_pharmacy->pharmacyGST->caption() ?></span></td>
		<td data-name="pharmacyGST"<?php echo $hospital_pharmacy->pharmacyGST->cellAttributes() ?>>
<span id="el_hospital_pharmacy_pharmacyGST">
<span<?php echo $hospital_pharmacy->pharmacyGST->viewAttributes() ?>>
<?php echo $hospital_pharmacy->pharmacyGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy->HospId->Visible) { // HospId ?>
	<tr id="r_HospId">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_HospId"><?php echo $hospital_pharmacy->HospId->caption() ?></span></td>
		<td data-name="HospId"<?php echo $hospital_pharmacy->HospId->cellAttributes() ?>>
<span id="el_hospital_pharmacy_HospId">
<span<?php echo $hospital_pharmacy->HospId->viewAttributes() ?>>
<?php echo $hospital_pharmacy->HospId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital_pharmacy->BranchID->Visible) { // BranchID ?>
	<tr id="r_BranchID">
		<td class="<?php echo $hospital_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacy_BranchID"><?php echo $hospital_pharmacy->BranchID->caption() ?></span></td>
		<td data-name="BranchID"<?php echo $hospital_pharmacy->BranchID->cellAttributes() ?>>
<span id="el_hospital_pharmacy_BranchID">
<span<?php echo $hospital_pharmacy->BranchID->viewAttributes() ?>>
<?php echo $hospital_pharmacy->BranchID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hospital_pharmacy_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hospital_pharmacy->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hospital_pharmacy_view->terminate();
?>