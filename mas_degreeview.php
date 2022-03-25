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
$mas_degree_view = new mas_degree_view();

// Run the page
$mas_degree_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_degree_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_degree->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_degreeview = currentForm = new ew.Form("fmas_degreeview", "view");

// Form_CustomValidate event
fmas_degreeview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_degreeview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_degree->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_degree_view->ExportOptions->render("body") ?>
<?php $mas_degree_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_degree_view->showPageHeader(); ?>
<?php
$mas_degree_view->showMessage();
?>
<form name="fmas_degreeview" id="fmas_degreeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_degree_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_degree_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_degree">
<input type="hidden" name="modal" value="<?php echo (int)$mas_degree_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_degree->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_degree_view->TableLeftColumnClass ?>"><span id="elh_mas_degree_id"><?php echo $mas_degree->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_degree->id->cellAttributes() ?>>
<span id="el_mas_degree_id">
<span<?php echo $mas_degree->id->viewAttributes() ?>>
<?php echo $mas_degree->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_degree->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $mas_degree_view->TableLeftColumnClass ?>"><span id="elh_mas_degree_Name"><?php echo $mas_degree->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $mas_degree->Name->cellAttributes() ?>>
<span id="el_mas_degree_Name">
<span<?php echo $mas_degree->Name->viewAttributes() ?>>
<?php echo $mas_degree->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_degree_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_degree->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_degree_view->terminate();
?>