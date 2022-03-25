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
$mas_category_view = new mas_category_view();

// Run the page
$mas_category_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_category_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_category->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_categoryview = currentForm = new ew.Form("fmas_categoryview", "view");

// Form_CustomValidate event
fmas_categoryview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_categoryview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_category->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_category_view->ExportOptions->render("body") ?>
<?php $mas_category_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_category_view->showPageHeader(); ?>
<?php
$mas_category_view->showMessage();
?>
<form name="fmas_categoryview" id="fmas_categoryview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_category_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_category_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_category">
<input type="hidden" name="modal" value="<?php echo (int)$mas_category_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_category->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_category_view->TableLeftColumnClass ?>"><span id="elh_mas_category_id"><?php echo $mas_category->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_category->id->cellAttributes() ?>>
<span id="el_mas_category_id">
<span<?php echo $mas_category->id->viewAttributes() ?>>
<?php echo $mas_category->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_category->CATEGORY->Visible) { // CATEGORY ?>
	<tr id="r_CATEGORY">
		<td class="<?php echo $mas_category_view->TableLeftColumnClass ?>"><span id="elh_mas_category_CATEGORY"><?php echo $mas_category->CATEGORY->caption() ?></span></td>
		<td data-name="CATEGORY"<?php echo $mas_category->CATEGORY->cellAttributes() ?>>
<span id="el_mas_category_CATEGORY">
<span<?php echo $mas_category->CATEGORY->viewAttributes() ?>>
<?php echo $mas_category->CATEGORY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_category_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_category->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_category_view->terminate();
?>