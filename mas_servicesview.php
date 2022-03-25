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
$mas_services_view = new mas_services_view();

// Run the page
$mas_services_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_services_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_services->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_servicesview = currentForm = new ew.Form("fmas_servicesview", "view");

// Form_CustomValidate event
fmas_servicesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_servicesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_servicesview.lists["x_status"] = <?php echo $mas_services_view->status->Lookup->toClientList() ?>;
fmas_servicesview.lists["x_status"].options = <?php echo JsonEncode($mas_services_view->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_services->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_services_view->ExportOptions->render("body") ?>
<?php $mas_services_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_services_view->showPageHeader(); ?>
<?php
$mas_services_view->showMessage();
?>
<form name="fmas_servicesview" id="fmas_servicesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_services_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_services_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_services">
<input type="hidden" name="modal" value="<?php echo (int)$mas_services_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_services->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_services_view->TableLeftColumnClass ?>"><span id="elh_mas_services_id"><?php echo $mas_services->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_services->id->cellAttributes() ?>>
<span id="el_mas_services_id">
<span<?php echo $mas_services->id->viewAttributes() ?>>
<?php echo $mas_services->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $mas_services_view->TableLeftColumnClass ?>"><span id="elh_mas_services_name"><?php echo $mas_services->name->caption() ?></span></td>
		<td data-name="name"<?php echo $mas_services->name->cellAttributes() ?>>
<span id="el_mas_services_name">
<span<?php echo $mas_services->name->viewAttributes() ?>>
<?php echo $mas_services->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services->amount->Visible) { // amount ?>
	<tr id="r_amount">
		<td class="<?php echo $mas_services_view->TableLeftColumnClass ?>"><span id="elh_mas_services_amount"><?php echo $mas_services->amount->caption() ?></span></td>
		<td data-name="amount"<?php echo $mas_services->amount->cellAttributes() ?>>
<span id="el_mas_services_amount">
<span<?php echo $mas_services->amount->viewAttributes() ?>>
<?php echo $mas_services->amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $mas_services_view->TableLeftColumnClass ?>"><span id="elh_mas_services_description"><?php echo $mas_services->description->caption() ?></span></td>
		<td data-name="description"<?php echo $mas_services->description->cellAttributes() ?>>
<span id="el_mas_services_description">
<span<?php echo $mas_services->description->viewAttributes() ?>>
<?php echo $mas_services->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services->charged_date->Visible) { // charged_date ?>
	<tr id="r_charged_date">
		<td class="<?php echo $mas_services_view->TableLeftColumnClass ?>"><span id="elh_mas_services_charged_date"><?php echo $mas_services->charged_date->caption() ?></span></td>
		<td data-name="charged_date"<?php echo $mas_services->charged_date->cellAttributes() ?>>
<span id="el_mas_services_charged_date">
<span<?php echo $mas_services->charged_date->viewAttributes() ?>>
<?php echo $mas_services->charged_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $mas_services_view->TableLeftColumnClass ?>"><span id="elh_mas_services_status"><?php echo $mas_services->status->caption() ?></span></td>
		<td data-name="status"<?php echo $mas_services->status->cellAttributes() ?>>
<span id="el_mas_services_status">
<span<?php echo $mas_services->status->viewAttributes() ?>>
<?php echo $mas_services->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $mas_services_view->TableLeftColumnClass ?>"><span id="elh_mas_services_createdby"><?php echo $mas_services->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $mas_services->createdby->cellAttributes() ?>>
<span id="el_mas_services_createdby">
<span<?php echo $mas_services->createdby->viewAttributes() ?>>
<?php echo $mas_services->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $mas_services_view->TableLeftColumnClass ?>"><span id="elh_mas_services_createddatetime"><?php echo $mas_services->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $mas_services->createddatetime->cellAttributes() ?>>
<span id="el_mas_services_createddatetime">
<span<?php echo $mas_services->createddatetime->viewAttributes() ?>>
<?php echo $mas_services->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $mas_services_view->TableLeftColumnClass ?>"><span id="elh_mas_services_modifiedby"><?php echo $mas_services->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $mas_services->modifiedby->cellAttributes() ?>>
<span id="el_mas_services_modifiedby">
<span<?php echo $mas_services->modifiedby->viewAttributes() ?>>
<?php echo $mas_services->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $mas_services_view->TableLeftColumnClass ?>"><span id="elh_mas_services_modifieddatetime"><?php echo $mas_services->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $mas_services->modifieddatetime->cellAttributes() ?>>
<span id="el_mas_services_modifieddatetime">
<span<?php echo $mas_services->modifieddatetime->viewAttributes() ?>>
<?php echo $mas_services->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_services_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_services->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_services_view->terminate();
?>