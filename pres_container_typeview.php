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
$pres_container_type_view = new pres_container_type_view();

// Run the page
$pres_container_type_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_container_type_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_container_type->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpres_container_typeview = currentForm = new ew.Form("fpres_container_typeview", "view");

// Form_CustomValidate event
fpres_container_typeview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_container_typeview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pres_container_type->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_container_type_view->ExportOptions->render("body") ?>
<?php $pres_container_type_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_container_type_view->showPageHeader(); ?>
<?php
$pres_container_type_view->showMessage();
?>
<form name="fpres_container_typeview" id="fpres_container_typeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_container_type_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_container_type_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_container_type">
<input type="hidden" name="modal" value="<?php echo (int)$pres_container_type_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_container_type->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_container_type_view->TableLeftColumnClass ?>"><span id="elh_pres_container_type_id"><?php echo $pres_container_type->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pres_container_type->id->cellAttributes() ?>>
<span id="el_pres_container_type_id">
<span<?php echo $pres_container_type->id->viewAttributes() ?>>
<?php echo $pres_container_type->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_container_type->Container->Visible) { // Container ?>
	<tr id="r_Container">
		<td class="<?php echo $pres_container_type_view->TableLeftColumnClass ?>"><span id="elh_pres_container_type_Container"><?php echo $pres_container_type->Container->caption() ?></span></td>
		<td data-name="Container"<?php echo $pres_container_type->Container->cellAttributes() ?>>
<span id="el_pres_container_type_Container">
<span<?php echo $pres_container_type->Container->viewAttributes() ?>>
<?php echo $pres_container_type->Container->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_container_type_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_container_type->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_container_type_view->terminate();
?>