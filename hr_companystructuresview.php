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
$hr_companystructures_view = new hr_companystructures_view();

// Run the page
$hr_companystructures_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_companystructures_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_companystructures->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_companystructuresview = currentForm = new ew.Form("fhr_companystructuresview", "view");

// Form_CustomValidate event
fhr_companystructuresview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_companystructuresview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_companystructuresview.lists["x_type"] = <?php echo $hr_companystructures_view->type->Lookup->toClientList() ?>;
fhr_companystructuresview.lists["x_type"].options = <?php echo JsonEncode($hr_companystructures_view->type->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_companystructures->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_companystructures_view->ExportOptions->render("body") ?>
<?php $hr_companystructures_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_companystructures_view->showPageHeader(); ?>
<?php
$hr_companystructures_view->showMessage();
?>
<form name="fhr_companystructuresview" id="fhr_companystructuresview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_companystructures_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_companystructures_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_companystructures">
<input type="hidden" name="modal" value="<?php echo (int)$hr_companystructures_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_companystructures->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_companystructures_view->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_id"><?php echo $hr_companystructures->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_companystructures->id->cellAttributes() ?>>
<span id="el_hr_companystructures_id">
<span<?php echo $hr_companystructures->id->viewAttributes() ?>>
<?php echo $hr_companystructures->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_companystructures->title->Visible) { // title ?>
	<tr id="r_title">
		<td class="<?php echo $hr_companystructures_view->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_title"><?php echo $hr_companystructures->title->caption() ?></span></td>
		<td data-name="title"<?php echo $hr_companystructures->title->cellAttributes() ?>>
<span id="el_hr_companystructures_title">
<span<?php echo $hr_companystructures->title->viewAttributes() ?>>
<?php echo $hr_companystructures->title->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_companystructures->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $hr_companystructures_view->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_description"><?php echo $hr_companystructures->description->caption() ?></span></td>
		<td data-name="description"<?php echo $hr_companystructures->description->cellAttributes() ?>>
<span id="el_hr_companystructures_description">
<span<?php echo $hr_companystructures->description->viewAttributes() ?>>
<?php echo $hr_companystructures->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_companystructures->address->Visible) { // address ?>
	<tr id="r_address">
		<td class="<?php echo $hr_companystructures_view->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_address"><?php echo $hr_companystructures->address->caption() ?></span></td>
		<td data-name="address"<?php echo $hr_companystructures->address->cellAttributes() ?>>
<span id="el_hr_companystructures_address">
<span<?php echo $hr_companystructures->address->viewAttributes() ?>>
<?php echo $hr_companystructures->address->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_companystructures->type->Visible) { // type ?>
	<tr id="r_type">
		<td class="<?php echo $hr_companystructures_view->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_type"><?php echo $hr_companystructures->type->caption() ?></span></td>
		<td data-name="type"<?php echo $hr_companystructures->type->cellAttributes() ?>>
<span id="el_hr_companystructures_type">
<span<?php echo $hr_companystructures->type->viewAttributes() ?>>
<?php echo $hr_companystructures->type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_companystructures->country->Visible) { // country ?>
	<tr id="r_country">
		<td class="<?php echo $hr_companystructures_view->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_country"><?php echo $hr_companystructures->country->caption() ?></span></td>
		<td data-name="country"<?php echo $hr_companystructures->country->cellAttributes() ?>>
<span id="el_hr_companystructures_country">
<span<?php echo $hr_companystructures->country->viewAttributes() ?>>
<?php echo $hr_companystructures->country->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_companystructures->parent->Visible) { // parent ?>
	<tr id="r_parent">
		<td class="<?php echo $hr_companystructures_view->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_parent"><?php echo $hr_companystructures->parent->caption() ?></span></td>
		<td data-name="parent"<?php echo $hr_companystructures->parent->cellAttributes() ?>>
<span id="el_hr_companystructures_parent">
<span<?php echo $hr_companystructures->parent->viewAttributes() ?>>
<?php echo $hr_companystructures->parent->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_companystructures->timezone->Visible) { // timezone ?>
	<tr id="r_timezone">
		<td class="<?php echo $hr_companystructures_view->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_timezone"><?php echo $hr_companystructures->timezone->caption() ?></span></td>
		<td data-name="timezone"<?php echo $hr_companystructures->timezone->cellAttributes() ?>>
<span id="el_hr_companystructures_timezone">
<span<?php echo $hr_companystructures->timezone->viewAttributes() ?>>
<?php echo $hr_companystructures->timezone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_companystructures->heads->Visible) { // heads ?>
	<tr id="r_heads">
		<td class="<?php echo $hr_companystructures_view->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_heads"><?php echo $hr_companystructures->heads->caption() ?></span></td>
		<td data-name="heads"<?php echo $hr_companystructures->heads->cellAttributes() ?>>
<span id="el_hr_companystructures_heads">
<span<?php echo $hr_companystructures->heads->viewAttributes() ?>>
<?php echo $hr_companystructures->heads->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_companystructures->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_companystructures_view->TableLeftColumnClass ?>"><span id="elh_hr_companystructures_HospID"><?php echo $hr_companystructures->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_companystructures->HospID->cellAttributes() ?>>
<span id="el_hr_companystructures_HospID">
<span<?php echo $hr_companystructures->HospID->viewAttributes() ?>>
<?php echo $hr_companystructures->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_companystructures_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_companystructures->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_companystructures_view->terminate();
?>