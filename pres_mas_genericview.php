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
$pres_mas_generic_view = new pres_mas_generic_view();

// Run the page
$pres_mas_generic_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_generic_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_mas_generic->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpres_mas_genericview = currentForm = new ew.Form("fpres_mas_genericview", "view");

// Form_CustomValidate event
fpres_mas_genericview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_mas_genericview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pres_mas_generic->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_mas_generic_view->ExportOptions->render("body") ?>
<?php $pres_mas_generic_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_mas_generic_view->showPageHeader(); ?>
<?php
$pres_mas_generic_view->showMessage();
?>
<form name="fpres_mas_genericview" id="fpres_mas_genericview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_mas_generic_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_mas_generic_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_mas_generic">
<input type="hidden" name="modal" value="<?php echo (int)$pres_mas_generic_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_mas_generic->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_mas_generic_view->TableLeftColumnClass ?>"><span id="elh_pres_mas_generic_id"><?php echo $pres_mas_generic->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pres_mas_generic->id->cellAttributes() ?>>
<span id="el_pres_mas_generic_id">
<span<?php echo $pres_mas_generic->id->viewAttributes() ?>>
<?php echo $pres_mas_generic->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_mas_generic->Generic->Visible) { // Generic ?>
	<tr id="r_Generic">
		<td class="<?php echo $pres_mas_generic_view->TableLeftColumnClass ?>"><span id="elh_pres_mas_generic_Generic"><?php echo $pres_mas_generic->Generic->caption() ?></span></td>
		<td data-name="Generic"<?php echo $pres_mas_generic->Generic->cellAttributes() ?>>
<span id="el_pres_mas_generic_Generic">
<span<?php echo $pres_mas_generic->Generic->viewAttributes() ?>>
<?php echo $pres_mas_generic->Generic->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_mas_generic_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_mas_generic->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_mas_generic_view->terminate();
?>