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
$employee_telephone_view = new employee_telephone_view();

// Run the page
$employee_telephone_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_telephone_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_telephone->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_telephoneview = currentForm = new ew.Form("femployee_telephoneview", "view");

// Form_CustomValidate event
femployee_telephoneview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_telephoneview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_telephoneview.lists["x_tele_type"] = <?php echo $employee_telephone_view->tele_type->Lookup->toClientList() ?>;
femployee_telephoneview.lists["x_tele_type"].options = <?php echo JsonEncode($employee_telephone_view->tele_type->lookupOptions()) ?>;
femployee_telephoneview.lists["x_telephone_type"] = <?php echo $employee_telephone_view->telephone_type->Lookup->toClientList() ?>;
femployee_telephoneview.lists["x_telephone_type"].options = <?php echo JsonEncode($employee_telephone_view->telephone_type->lookupOptions()) ?>;
femployee_telephoneview.lists["x_status"] = <?php echo $employee_telephone_view->status->Lookup->toClientList() ?>;
femployee_telephoneview.lists["x_status"].options = <?php echo JsonEncode($employee_telephone_view->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_telephone->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_telephone_view->ExportOptions->render("body") ?>
<?php $employee_telephone_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_telephone_view->showPageHeader(); ?>
<?php
$employee_telephone_view->showMessage();
?>
<form name="femployee_telephoneview" id="femployee_telephoneview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_telephone_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_telephone_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_telephone">
<input type="hidden" name="modal" value="<?php echo (int)$employee_telephone_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_telephone->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_id"><?php echo $employee_telephone->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_telephone->id->cellAttributes() ?>>
<span id="el_employee_telephone_id">
<span<?php echo $employee_telephone->id->viewAttributes() ?>>
<?php echo $employee_telephone->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone->employee_id->Visible) { // employee_id ?>
	<tr id="r_employee_id">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_employee_id"><?php echo $employee_telephone->employee_id->caption() ?></span></td>
		<td data-name="employee_id"<?php echo $employee_telephone->employee_id->cellAttributes() ?>>
<span id="el_employee_telephone_employee_id">
<span<?php echo $employee_telephone->employee_id->viewAttributes() ?>>
<?php echo $employee_telephone->employee_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone->tele_type->Visible) { // tele_type ?>
	<tr id="r_tele_type">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_tele_type"><?php echo $employee_telephone->tele_type->caption() ?></span></td>
		<td data-name="tele_type"<?php echo $employee_telephone->tele_type->cellAttributes() ?>>
<span id="el_employee_telephone_tele_type">
<span<?php echo $employee_telephone->tele_type->viewAttributes() ?>>
<?php echo $employee_telephone->tele_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone->telephone->Visible) { // telephone ?>
	<tr id="r_telephone">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_telephone"><?php echo $employee_telephone->telephone->caption() ?></span></td>
		<td data-name="telephone"<?php echo $employee_telephone->telephone->cellAttributes() ?>>
<span id="el_employee_telephone_telephone">
<span<?php echo $employee_telephone->telephone->viewAttributes() ?>>
<?php echo $employee_telephone->telephone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone->telephone_type->Visible) { // telephone_type ?>
	<tr id="r_telephone_type">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_telephone_type"><?php echo $employee_telephone->telephone_type->caption() ?></span></td>
		<td data-name="telephone_type"<?php echo $employee_telephone->telephone_type->cellAttributes() ?>>
<span id="el_employee_telephone_telephone_type">
<span<?php echo $employee_telephone->telephone_type->viewAttributes() ?>>
<?php echo $employee_telephone->telephone_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_status"><?php echo $employee_telephone->status->caption() ?></span></td>
		<td data-name="status"<?php echo $employee_telephone->status->cellAttributes() ?>>
<span id="el_employee_telephone_status">
<span<?php echo $employee_telephone->status->viewAttributes() ?>>
<?php echo $employee_telephone->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_createdby"><?php echo $employee_telephone->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $employee_telephone->createdby->cellAttributes() ?>>
<span id="el_employee_telephone_createdby">
<span<?php echo $employee_telephone->createdby->viewAttributes() ?>>
<?php echo $employee_telephone->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_createddatetime"><?php echo $employee_telephone->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $employee_telephone->createddatetime->cellAttributes() ?>>
<span id="el_employee_telephone_createddatetime">
<span<?php echo $employee_telephone->createddatetime->viewAttributes() ?>>
<?php echo $employee_telephone->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_modifiedby"><?php echo $employee_telephone->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $employee_telephone->modifiedby->cellAttributes() ?>>
<span id="el_employee_telephone_modifiedby">
<span<?php echo $employee_telephone->modifiedby->viewAttributes() ?>>
<?php echo $employee_telephone->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_modifieddatetime"><?php echo $employee_telephone->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $employee_telephone->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_telephone_modifieddatetime">
<span<?php echo $employee_telephone->modifieddatetime->viewAttributes() ?>>
<?php echo $employee_telephone->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_telephone->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $employee_telephone_view->TableLeftColumnClass ?>"><span id="elh_employee_telephone_HospID"><?php echo $employee_telephone->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $employee_telephone->HospID->cellAttributes() ?>>
<span id="el_employee_telephone_HospID">
<span<?php echo $employee_telephone->HospID->viewAttributes() ?>>
<?php echo $employee_telephone->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_telephone_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_telephone->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_telephone_view->terminate();
?>