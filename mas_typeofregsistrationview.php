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
$mas_typeofregsistration_view = new mas_typeofregsistration_view();

// Run the page
$mas_typeofregsistration_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_typeofregsistration_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_typeofregsistration->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_typeofregsistrationview = currentForm = new ew.Form("fmas_typeofregsistrationview", "view");

// Form_CustomValidate event
fmas_typeofregsistrationview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_typeofregsistrationview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_typeofregsistration->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_typeofregsistration_view->ExportOptions->render("body") ?>
<?php $mas_typeofregsistration_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_typeofregsistration_view->showPageHeader(); ?>
<?php
$mas_typeofregsistration_view->showMessage();
?>
<form name="fmas_typeofregsistrationview" id="fmas_typeofregsistrationview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_typeofregsistration_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_typeofregsistration_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_typeofregsistration">
<input type="hidden" name="modal" value="<?php echo (int)$mas_typeofregsistration_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_typeofregsistration->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_typeofregsistration_view->TableLeftColumnClass ?>"><span id="elh_mas_typeofregsistration_id"><?php echo $mas_typeofregsistration->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_typeofregsistration->id->cellAttributes() ?>>
<span id="el_mas_typeofregsistration_id">
<span<?php echo $mas_typeofregsistration->id->viewAttributes() ?>>
<?php echo $mas_typeofregsistration->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_typeofregsistration->RegsistrationType->Visible) { // RegsistrationType ?>
	<tr id="r_RegsistrationType">
		<td class="<?php echo $mas_typeofregsistration_view->TableLeftColumnClass ?>"><span id="elh_mas_typeofregsistration_RegsistrationType"><?php echo $mas_typeofregsistration->RegsistrationType->caption() ?></span></td>
		<td data-name="RegsistrationType"<?php echo $mas_typeofregsistration->RegsistrationType->cellAttributes() ?>>
<span id="el_mas_typeofregsistration_RegsistrationType">
<span<?php echo $mas_typeofregsistration->RegsistrationType->viewAttributes() ?>>
<?php echo $mas_typeofregsistration->RegsistrationType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_typeofregsistration_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_typeofregsistration->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_typeofregsistration_view->terminate();
?>