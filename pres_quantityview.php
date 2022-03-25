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
$pres_quantity_view = new pres_quantity_view();

// Run the page
$pres_quantity_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_quantity_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_quantity->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpres_quantityview = currentForm = new ew.Form("fpres_quantityview", "view");

// Form_CustomValidate event
fpres_quantityview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_quantityview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pres_quantity->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_quantity_view->ExportOptions->render("body") ?>
<?php $pres_quantity_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_quantity_view->showPageHeader(); ?>
<?php
$pres_quantity_view->showMessage();
?>
<form name="fpres_quantityview" id="fpres_quantityview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_quantity_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_quantity_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_quantity">
<input type="hidden" name="modal" value="<?php echo (int)$pres_quantity_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_quantity->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_quantity_view->TableLeftColumnClass ?>"><span id="elh_pres_quantity_id"><?php echo $pres_quantity->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pres_quantity->id->cellAttributes() ?>>
<span id="el_pres_quantity_id">
<span<?php echo $pres_quantity->id->viewAttributes() ?>>
<?php echo $pres_quantity->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_quantity->Quantity->Visible) { // Quantity ?>
	<tr id="r_Quantity">
		<td class="<?php echo $pres_quantity_view->TableLeftColumnClass ?>"><span id="elh_pres_quantity_Quantity"><?php echo $pres_quantity->Quantity->caption() ?></span></td>
		<td data-name="Quantity"<?php echo $pres_quantity->Quantity->cellAttributes() ?>>
<span id="el_pres_quantity_Quantity">
<span<?php echo $pres_quantity->Quantity->viewAttributes() ?>>
<?php echo $pres_quantity->Quantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_quantity->Value->Visible) { // Value ?>
	<tr id="r_Value">
		<td class="<?php echo $pres_quantity_view->TableLeftColumnClass ?>"><span id="elh_pres_quantity_Value"><?php echo $pres_quantity->Value->caption() ?></span></td>
		<td data-name="Value"<?php echo $pres_quantity->Value->cellAttributes() ?>>
<span id="el_pres_quantity_Value">
<span<?php echo $pres_quantity->Value->viewAttributes() ?>>
<?php echo $pres_quantity->Value->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_quantity_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_quantity->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_quantity_view->terminate();
?>