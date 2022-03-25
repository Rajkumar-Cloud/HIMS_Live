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
$employee_address_view = new employee_address_view();

// Run the page
$employee_address_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_address_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_address->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_addressview = currentForm = new ew.Form("femployee_addressview", "view");

// Form_CustomValidate event
femployee_addressview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_addressview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_addressview.lists["x_address_type"] = <?php echo $employee_address_view->address_type->Lookup->toClientList() ?>;
femployee_addressview.lists["x_address_type"].options = <?php echo JsonEncode($employee_address_view->address_type->lookupOptions()) ?>;
femployee_addressview.lists["x_status"] = <?php echo $employee_address_view->status->Lookup->toClientList() ?>;
femployee_addressview.lists["x_status"].options = <?php echo JsonEncode($employee_address_view->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_address->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_address_view->ExportOptions->render("body") ?>
<?php $employee_address_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_address_view->showPageHeader(); ?>
<?php
$employee_address_view->showMessage();
?>
<form name="femployee_addressview" id="femployee_addressview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_address_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_address_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_address">
<input type="hidden" name="modal" value="<?php echo (int)$employee_address_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_address->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_id"><?php echo $employee_address->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_address->id->cellAttributes() ?>>
<span id="el_employee_address_id">
<span<?php echo $employee_address->id->viewAttributes() ?>>
<?php echo $employee_address->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address->employee_id->Visible) { // employee_id ?>
	<tr id="r_employee_id">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_employee_id"><?php echo $employee_address->employee_id->caption() ?></span></td>
		<td data-name="employee_id"<?php echo $employee_address->employee_id->cellAttributes() ?>>
<span id="el_employee_address_employee_id">
<span<?php echo $employee_address->employee_id->viewAttributes() ?>>
<?php echo $employee_address->employee_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address->contact_persion->Visible) { // contact_persion ?>
	<tr id="r_contact_persion">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_contact_persion"><?php echo $employee_address->contact_persion->caption() ?></span></td>
		<td data-name="contact_persion"<?php echo $employee_address->contact_persion->cellAttributes() ?>>
<span id="el_employee_address_contact_persion">
<span<?php echo $employee_address->contact_persion->viewAttributes() ?>>
<?php echo $employee_address->contact_persion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address->street->Visible) { // street ?>
	<tr id="r_street">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_street"><?php echo $employee_address->street->caption() ?></span></td>
		<td data-name="street"<?php echo $employee_address->street->cellAttributes() ?>>
<span id="el_employee_address_street">
<span<?php echo $employee_address->street->viewAttributes() ?>>
<?php echo $employee_address->street->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address->town->Visible) { // town ?>
	<tr id="r_town">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_town"><?php echo $employee_address->town->caption() ?></span></td>
		<td data-name="town"<?php echo $employee_address->town->cellAttributes() ?>>
<span id="el_employee_address_town">
<span<?php echo $employee_address->town->viewAttributes() ?>>
<?php echo $employee_address->town->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address->province->Visible) { // province ?>
	<tr id="r_province">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_province"><?php echo $employee_address->province->caption() ?></span></td>
		<td data-name="province"<?php echo $employee_address->province->cellAttributes() ?>>
<span id="el_employee_address_province">
<span<?php echo $employee_address->province->viewAttributes() ?>>
<?php echo $employee_address->province->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address->postal_code->Visible) { // postal_code ?>
	<tr id="r_postal_code">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_postal_code"><?php echo $employee_address->postal_code->caption() ?></span></td>
		<td data-name="postal_code"<?php echo $employee_address->postal_code->cellAttributes() ?>>
<span id="el_employee_address_postal_code">
<span<?php echo $employee_address->postal_code->viewAttributes() ?>>
<?php echo $employee_address->postal_code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address->address_type->Visible) { // address_type ?>
	<tr id="r_address_type">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_address_type"><?php echo $employee_address->address_type->caption() ?></span></td>
		<td data-name="address_type"<?php echo $employee_address->address_type->cellAttributes() ?>>
<span id="el_employee_address_address_type">
<span<?php echo $employee_address->address_type->viewAttributes() ?>>
<?php echo $employee_address->address_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_status"><?php echo $employee_address->status->caption() ?></span></td>
		<td data-name="status"<?php echo $employee_address->status->cellAttributes() ?>>
<span id="el_employee_address_status">
<span<?php echo $employee_address->status->viewAttributes() ?>>
<?php echo $employee_address->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_createdby"><?php echo $employee_address->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $employee_address->createdby->cellAttributes() ?>>
<span id="el_employee_address_createdby">
<span<?php echo $employee_address->createdby->viewAttributes() ?>>
<?php echo $employee_address->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_createddatetime"><?php echo $employee_address->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $employee_address->createddatetime->cellAttributes() ?>>
<span id="el_employee_address_createddatetime">
<span<?php echo $employee_address->createddatetime->viewAttributes() ?>>
<?php echo $employee_address->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_modifiedby"><?php echo $employee_address->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $employee_address->modifiedby->cellAttributes() ?>>
<span id="el_employee_address_modifiedby">
<span<?php echo $employee_address->modifiedby->viewAttributes() ?>>
<?php echo $employee_address->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_modifieddatetime"><?php echo $employee_address->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $employee_address->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_address_modifieddatetime">
<span<?php echo $employee_address->modifieddatetime->viewAttributes() ?>>
<?php echo $employee_address->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_address->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $employee_address_view->TableLeftColumnClass ?>"><span id="elh_employee_address_HospID"><?php echo $employee_address->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $employee_address->HospID->cellAttributes() ?>>
<span id="el_employee_address_HospID">
<span<?php echo $employee_address->HospID->viewAttributes() ?>>
<?php echo $employee_address->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_address_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_address->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_address_view->terminate();
?>