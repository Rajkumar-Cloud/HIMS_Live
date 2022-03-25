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
$mas_lab_services_type_view = new mas_lab_services_type_view();

// Run the page
$mas_lab_services_type_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_lab_services_type_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_lab_services_type->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_lab_services_typeview = currentForm = new ew.Form("fmas_lab_services_typeview", "view");

// Form_CustomValidate event
fmas_lab_services_typeview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_lab_services_typeview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_lab_services_type->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_lab_services_type_view->ExportOptions->render("body") ?>
<?php $mas_lab_services_type_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_lab_services_type_view->showPageHeader(); ?>
<?php
$mas_lab_services_type_view->showMessage();
?>
<form name="fmas_lab_services_typeview" id="fmas_lab_services_typeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_lab_services_type_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_lab_services_type_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_lab_services_type">
<input type="hidden" name="modal" value="<?php echo (int)$mas_lab_services_type_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_lab_services_type->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_lab_services_type_view->TableLeftColumnClass ?>"><span id="elh_mas_lab_services_type_id"><?php echo $mas_lab_services_type->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_lab_services_type->id->cellAttributes() ?>>
<span id="el_mas_lab_services_type_id">
<span<?php echo $mas_lab_services_type->id->viewAttributes() ?>>
<?php echo $mas_lab_services_type->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_lab_services_type->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $mas_lab_services_type_view->TableLeftColumnClass ?>"><span id="elh_mas_lab_services_type_name"><?php echo $mas_lab_services_type->name->caption() ?></span></td>
		<td data-name="name"<?php echo $mas_lab_services_type->name->cellAttributes() ?>>
<span id="el_mas_lab_services_type_name">
<span<?php echo $mas_lab_services_type->name->viewAttributes() ?>>
<?php echo $mas_lab_services_type->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_lab_services_type_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_lab_services_type->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_lab_services_type_view->terminate();
?>