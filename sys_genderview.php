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
$sys_gender_view = new sys_gender_view();

// Run the page
$sys_gender_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_gender_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sys_gender->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsys_genderview = currentForm = new ew.Form("fsys_genderview", "view");

// Form_CustomValidate event
fsys_genderview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_genderview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$sys_gender->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sys_gender_view->ExportOptions->render("body") ?>
<?php $sys_gender_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sys_gender_view->showPageHeader(); ?>
<?php
$sys_gender_view->showMessage();
?>
<form name="fsys_genderview" id="fsys_genderview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_gender_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_gender_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_gender">
<input type="hidden" name="modal" value="<?php echo (int)$sys_gender_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sys_gender->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $sys_gender_view->TableLeftColumnClass ?>"><span id="elh_sys_gender_id"><?php echo $sys_gender->id->caption() ?></span></td>
		<td data-name="id"<?php echo $sys_gender->id->cellAttributes() ?>>
<span id="el_sys_gender_id">
<span<?php echo $sys_gender->id->viewAttributes() ?>>
<?php echo $sys_gender->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_gender->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $sys_gender_view->TableLeftColumnClass ?>"><span id="elh_sys_gender_Name"><?php echo $sys_gender->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $sys_gender->Name->cellAttributes() ?>>
<span id="el_sys_gender_Name">
<span<?php echo $sys_gender->Name->viewAttributes() ?>>
<?php echo $sys_gender->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sys_gender_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sys_gender->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sys_gender_view->terminate();
?>