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
$mas_where_didyou_hear_view = new mas_where_didyou_hear_view();

// Run the page
$mas_where_didyou_hear_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_where_didyou_hear_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_where_didyou_hear->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_where_didyou_hearview = currentForm = new ew.Form("fmas_where_didyou_hearview", "view");

// Form_CustomValidate event
fmas_where_didyou_hearview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_where_didyou_hearview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_where_didyou_hear->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_where_didyou_hear_view->ExportOptions->render("body") ?>
<?php $mas_where_didyou_hear_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_where_didyou_hear_view->showPageHeader(); ?>
<?php
$mas_where_didyou_hear_view->showMessage();
?>
<form name="fmas_where_didyou_hearview" id="fmas_where_didyou_hearview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_where_didyou_hear_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_where_didyou_hear_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_where_didyou_hear">
<input type="hidden" name="modal" value="<?php echo (int)$mas_where_didyou_hear_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_where_didyou_hear->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_where_didyou_hear_view->TableLeftColumnClass ?>"><span id="elh_mas_where_didyou_hear_id"><?php echo $mas_where_didyou_hear->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_where_didyou_hear->id->cellAttributes() ?>>
<span id="el_mas_where_didyou_hear_id">
<span<?php echo $mas_where_didyou_hear->id->viewAttributes() ?>>
<?php echo $mas_where_didyou_hear->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_where_didyou_hear->Job->Visible) { // Job ?>
	<tr id="r_Job">
		<td class="<?php echo $mas_where_didyou_hear_view->TableLeftColumnClass ?>"><span id="elh_mas_where_didyou_hear_Job"><?php echo $mas_where_didyou_hear->Job->caption() ?></span></td>
		<td data-name="Job"<?php echo $mas_where_didyou_hear->Job->cellAttributes() ?>>
<span id="el_mas_where_didyou_hear_Job">
<span<?php echo $mas_where_didyou_hear->Job->viewAttributes() ?>>
<?php echo $mas_where_didyou_hear->Job->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_where_didyou_hear_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_where_didyou_hear->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_where_didyou_hear_view->terminate();
?>