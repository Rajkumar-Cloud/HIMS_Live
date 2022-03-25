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
$mas_paymentcategory_view = new mas_paymentcategory_view();

// Run the page
$mas_paymentcategory_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_paymentcategory_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_paymentcategory->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_paymentcategoryview = currentForm = new ew.Form("fmas_paymentcategoryview", "view");

// Form_CustomValidate event
fmas_paymentcategoryview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_paymentcategoryview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_paymentcategory->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_paymentcategory_view->ExportOptions->render("body") ?>
<?php $mas_paymentcategory_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_paymentcategory_view->showPageHeader(); ?>
<?php
$mas_paymentcategory_view->showMessage();
?>
<form name="fmas_paymentcategoryview" id="fmas_paymentcategoryview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_paymentcategory_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_paymentcategory_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_paymentcategory">
<input type="hidden" name="modal" value="<?php echo (int)$mas_paymentcategory_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_paymentcategory->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_paymentcategory_view->TableLeftColumnClass ?>"><span id="elh_mas_paymentcategory_id"><?php echo $mas_paymentcategory->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_paymentcategory->id->cellAttributes() ?>>
<span id="el_mas_paymentcategory_id">
<span<?php echo $mas_paymentcategory->id->viewAttributes() ?>>
<?php echo $mas_paymentcategory->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_paymentcategory->Category->Visible) { // Category ?>
	<tr id="r_Category">
		<td class="<?php echo $mas_paymentcategory_view->TableLeftColumnClass ?>"><span id="elh_mas_paymentcategory_Category"><?php echo $mas_paymentcategory->Category->caption() ?></span></td>
		<td data-name="Category"<?php echo $mas_paymentcategory->Category->cellAttributes() ?>>
<span id="el_mas_paymentcategory_Category">
<span<?php echo $mas_paymentcategory->Category->viewAttributes() ?>>
<?php echo $mas_paymentcategory->Category->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_paymentcategory_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_paymentcategory->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_paymentcategory_view->terminate();
?>