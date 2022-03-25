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
<?php include_once "header.php" ?>
<?php if (!$hospital->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhospitalview = currentForm = new ew.Form("fhospitalview", "view");

// Form_CustomValidate event
fhospitalview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhospitalview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhospitalview.lists["x_status"] = <?php echo $hospital_view->status->Lookup->toClientList() ?>;
fhospitalview.lists["x_status"].options = <?php echo JsonEncode($hospital_view->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hospital->isExport()) { ?>
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
<?php if ($hospital_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hospital_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital">
<input type="hidden" name="modal" value="<?php echo (int)$hospital_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hospital->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_id"><?php echo $hospital->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hospital->id->cellAttributes() ?>>
<span id="el_hospital_id">
<span<?php echo $hospital->id->viewAttributes() ?>>
<?php echo $hospital->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital->logo->Visible) { // logo ?>
	<tr id="r_logo">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_logo"><?php echo $hospital->logo->caption() ?></span></td>
		<td data-name="logo"<?php echo $hospital->logo->cellAttributes() ?>>
<span id="el_hospital_logo">
<span>
<?php echo GetFileViewTag($hospital->logo, $hospital->logo->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital->hospital->Visible) { // hospital ?>
	<tr id="r_hospital">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_hospital"><?php echo $hospital->hospital->caption() ?></span></td>
		<td data-name="hospital"<?php echo $hospital->hospital->cellAttributes() ?>>
<span id="el_hospital_hospital">
<span<?php echo $hospital->hospital->viewAttributes() ?>>
<?php echo $hospital->hospital->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital->street->Visible) { // street ?>
	<tr id="r_street">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_street"><?php echo $hospital->street->caption() ?></span></td>
		<td data-name="street"<?php echo $hospital->street->cellAttributes() ?>>
<span id="el_hospital_street">
<span<?php echo $hospital->street->viewAttributes() ?>>
<?php echo $hospital->street->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital->area->Visible) { // area ?>
	<tr id="r_area">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_area"><?php echo $hospital->area->caption() ?></span></td>
		<td data-name="area"<?php echo $hospital->area->cellAttributes() ?>>
<span id="el_hospital_area">
<span<?php echo $hospital->area->viewAttributes() ?>>
<?php echo $hospital->area->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital->town->Visible) { // town ?>
	<tr id="r_town">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_town"><?php echo $hospital->town->caption() ?></span></td>
		<td data-name="town"<?php echo $hospital->town->cellAttributes() ?>>
<span id="el_hospital_town">
<span<?php echo $hospital->town->viewAttributes() ?>>
<?php echo $hospital->town->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital->province->Visible) { // province ?>
	<tr id="r_province">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_province"><?php echo $hospital->province->caption() ?></span></td>
		<td data-name="province"<?php echo $hospital->province->cellAttributes() ?>>
<span id="el_hospital_province">
<span<?php echo $hospital->province->viewAttributes() ?>>
<?php echo $hospital->province->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital->postal_code->Visible) { // postal_code ?>
	<tr id="r_postal_code">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_postal_code"><?php echo $hospital->postal_code->caption() ?></span></td>
		<td data-name="postal_code"<?php echo $hospital->postal_code->cellAttributes() ?>>
<span id="el_hospital_postal_code">
<span<?php echo $hospital->postal_code->viewAttributes() ?>>
<?php echo $hospital->postal_code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital->phone_no->Visible) { // phone_no ?>
	<tr id="r_phone_no">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_phone_no"><?php echo $hospital->phone_no->caption() ?></span></td>
		<td data-name="phone_no"<?php echo $hospital->phone_no->cellAttributes() ?>>
<span id="el_hospital_phone_no">
<span<?php echo $hospital->phone_no->viewAttributes() ?>>
<?php echo $hospital->phone_no->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_status"><?php echo $hospital->status->caption() ?></span></td>
		<td data-name="status"<?php echo $hospital->status->cellAttributes() ?>>
<span id="el_hospital_status">
<span<?php echo $hospital->status->viewAttributes() ?>>
<?php echo $hospital->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital->PreFixCode->Visible) { // PreFixCode ?>
	<tr id="r_PreFixCode">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_PreFixCode"><?php echo $hospital->PreFixCode->caption() ?></span></td>
		<td data-name="PreFixCode"<?php echo $hospital->PreFixCode->cellAttributes() ?>>
<span id="el_hospital_PreFixCode">
<span<?php echo $hospital->PreFixCode->viewAttributes() ?>>
<?php echo $hospital->PreFixCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital->BillingGST->Visible) { // BillingGST ?>
	<tr id="r_BillingGST">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_BillingGST"><?php echo $hospital->BillingGST->caption() ?></span></td>
		<td data-name="BillingGST"<?php echo $hospital->BillingGST->cellAttributes() ?>>
<span id="el_hospital_BillingGST">
<span<?php echo $hospital->BillingGST->viewAttributes() ?>>
<?php echo $hospital->BillingGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital->pharmacyGST->Visible) { // pharmacyGST ?>
	<tr id="r_pharmacyGST">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacyGST"><?php echo $hospital->pharmacyGST->caption() ?></span></td>
		<td data-name="pharmacyGST"<?php echo $hospital->pharmacyGST->cellAttributes() ?>>
<span id="el_hospital_pharmacyGST">
<span<?php echo $hospital->pharmacyGST->viewAttributes() ?>>
<?php echo $hospital->pharmacyGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospital->Country->Visible) { // Country ?>
	<tr id="r_Country">
		<td class="<?php echo $hospital_view->TableLeftColumnClass ?>"><span id="elh_hospital_Country"><?php echo $hospital->Country->caption() ?></span></td>
		<td data-name="Country"<?php echo $hospital->Country->cellAttributes() ?>>
<span id="el_hospital_Country">
<span<?php echo $hospital->Country->viewAttributes() ?>>
<?php echo $hospital->Country->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hospital_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hospital->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hospital_view->terminate();
?>