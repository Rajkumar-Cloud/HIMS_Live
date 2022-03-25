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
$mas_marital_status_view = new mas_marital_status_view();

// Run the page
$mas_marital_status_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_marital_status_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_marital_status->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_marital_statusview = currentForm = new ew.Form("fmas_marital_statusview", "view");

// Form_CustomValidate event
fmas_marital_statusview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_marital_statusview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_marital_status->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_marital_status_view->ExportOptions->render("body") ?>
<?php $mas_marital_status_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_marital_status_view->showPageHeader(); ?>
<?php
$mas_marital_status_view->showMessage();
?>
<form name="fmas_marital_statusview" id="fmas_marital_statusview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_marital_status_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_marital_status_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_marital_status">
<input type="hidden" name="modal" value="<?php echo (int)$mas_marital_status_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_marital_status->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_marital_status_view->TableLeftColumnClass ?>"><span id="elh_mas_marital_status_id"><?php echo $mas_marital_status->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_marital_status->id->cellAttributes() ?>>
<span id="el_mas_marital_status_id">
<span<?php echo $mas_marital_status->id->viewAttributes() ?>>
<?php echo $mas_marital_status->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_marital_status->MaritalStatus->Visible) { // MaritalStatus ?>
	<tr id="r_MaritalStatus">
		<td class="<?php echo $mas_marital_status_view->TableLeftColumnClass ?>"><span id="elh_mas_marital_status_MaritalStatus"><?php echo $mas_marital_status->MaritalStatus->caption() ?></span></td>
		<td data-name="MaritalStatus"<?php echo $mas_marital_status->MaritalStatus->cellAttributes() ?>>
<span id="el_mas_marital_status_MaritalStatus">
<span<?php echo $mas_marital_status->MaritalStatus->viewAttributes() ?>>
<?php echo $mas_marital_status->MaritalStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_marital_status_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_marital_status->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_marital_status_view->terminate();
?>