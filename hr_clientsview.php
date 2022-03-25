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
$hr_clients_view = new hr_clients_view();

// Run the page
$hr_clients_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_clients_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_clients->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_clientsview = currentForm = new ew.Form("fhr_clientsview", "view");

// Form_CustomValidate event
fhr_clientsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_clientsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_clientsview.lists["x_status"] = <?php echo $hr_clients_view->status->Lookup->toClientList() ?>;
fhr_clientsview.lists["x_status"].options = <?php echo JsonEncode($hr_clients_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_clients->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_clients_view->ExportOptions->render("body") ?>
<?php $hr_clients_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_clients_view->showPageHeader(); ?>
<?php
$hr_clients_view->showMessage();
?>
<form name="fhr_clientsview" id="fhr_clientsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_clients_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_clients_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_clients">
<input type="hidden" name="modal" value="<?php echo (int)$hr_clients_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_clients->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_clients_view->TableLeftColumnClass ?>"><span id="elh_hr_clients_id"><?php echo $hr_clients->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_clients->id->cellAttributes() ?>>
<span id="el_hr_clients_id">
<span<?php echo $hr_clients->id->viewAttributes() ?>>
<?php echo $hr_clients->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_clients->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_clients_view->TableLeftColumnClass ?>"><span id="elh_hr_clients_name"><?php echo $hr_clients->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_clients->name->cellAttributes() ?>>
<span id="el_hr_clients_name">
<span<?php echo $hr_clients->name->viewAttributes() ?>>
<?php echo $hr_clients->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_clients->details->Visible) { // details ?>
	<tr id="r_details">
		<td class="<?php echo $hr_clients_view->TableLeftColumnClass ?>"><span id="elh_hr_clients_details"><?php echo $hr_clients->details->caption() ?></span></td>
		<td data-name="details"<?php echo $hr_clients->details->cellAttributes() ?>>
<span id="el_hr_clients_details">
<span<?php echo $hr_clients->details->viewAttributes() ?>>
<?php echo $hr_clients->details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_clients->first_contact_date->Visible) { // first_contact_date ?>
	<tr id="r_first_contact_date">
		<td class="<?php echo $hr_clients_view->TableLeftColumnClass ?>"><span id="elh_hr_clients_first_contact_date"><?php echo $hr_clients->first_contact_date->caption() ?></span></td>
		<td data-name="first_contact_date"<?php echo $hr_clients->first_contact_date->cellAttributes() ?>>
<span id="el_hr_clients_first_contact_date">
<span<?php echo $hr_clients->first_contact_date->viewAttributes() ?>>
<?php echo $hr_clients->first_contact_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_clients->created->Visible) { // created ?>
	<tr id="r_created">
		<td class="<?php echo $hr_clients_view->TableLeftColumnClass ?>"><span id="elh_hr_clients_created"><?php echo $hr_clients->created->caption() ?></span></td>
		<td data-name="created"<?php echo $hr_clients->created->cellAttributes() ?>>
<span id="el_hr_clients_created">
<span<?php echo $hr_clients->created->viewAttributes() ?>>
<?php echo $hr_clients->created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_clients->address->Visible) { // address ?>
	<tr id="r_address">
		<td class="<?php echo $hr_clients_view->TableLeftColumnClass ?>"><span id="elh_hr_clients_address"><?php echo $hr_clients->address->caption() ?></span></td>
		<td data-name="address"<?php echo $hr_clients->address->cellAttributes() ?>>
<span id="el_hr_clients_address">
<span<?php echo $hr_clients->address->viewAttributes() ?>>
<?php echo $hr_clients->address->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_clients->contact_number->Visible) { // contact_number ?>
	<tr id="r_contact_number">
		<td class="<?php echo $hr_clients_view->TableLeftColumnClass ?>"><span id="elh_hr_clients_contact_number"><?php echo $hr_clients->contact_number->caption() ?></span></td>
		<td data-name="contact_number"<?php echo $hr_clients->contact_number->cellAttributes() ?>>
<span id="el_hr_clients_contact_number">
<span<?php echo $hr_clients->contact_number->viewAttributes() ?>>
<?php echo $hr_clients->contact_number->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_clients->contact_email->Visible) { // contact_email ?>
	<tr id="r_contact_email">
		<td class="<?php echo $hr_clients_view->TableLeftColumnClass ?>"><span id="elh_hr_clients_contact_email"><?php echo $hr_clients->contact_email->caption() ?></span></td>
		<td data-name="contact_email"<?php echo $hr_clients->contact_email->cellAttributes() ?>>
<span id="el_hr_clients_contact_email">
<span<?php echo $hr_clients->contact_email->viewAttributes() ?>>
<?php echo $hr_clients->contact_email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_clients->company_url->Visible) { // company_url ?>
	<tr id="r_company_url">
		<td class="<?php echo $hr_clients_view->TableLeftColumnClass ?>"><span id="elh_hr_clients_company_url"><?php echo $hr_clients->company_url->caption() ?></span></td>
		<td data-name="company_url"<?php echo $hr_clients->company_url->cellAttributes() ?>>
<span id="el_hr_clients_company_url">
<span<?php echo $hr_clients->company_url->viewAttributes() ?>>
<?php echo $hr_clients->company_url->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_clients->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $hr_clients_view->TableLeftColumnClass ?>"><span id="elh_hr_clients_status"><?php echo $hr_clients->status->caption() ?></span></td>
		<td data-name="status"<?php echo $hr_clients->status->cellAttributes() ?>>
<span id="el_hr_clients_status">
<span<?php echo $hr_clients->status->viewAttributes() ?>>
<?php echo $hr_clients->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_clients->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_clients_view->TableLeftColumnClass ?>"><span id="elh_hr_clients_HospID"><?php echo $hr_clients->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_clients->HospID->cellAttributes() ?>>
<span id="el_hr_clients_HospID">
<span<?php echo $hr_clients->HospID->viewAttributes() ?>>
<?php echo $hr_clients->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_clients_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_clients->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_clients_view->terminate();
?>