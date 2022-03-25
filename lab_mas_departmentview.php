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
$lab_mas_department_view = new lab_mas_department_view();

// Run the page
$lab_mas_department_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_mas_department_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_mas_department->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var flab_mas_departmentview = currentForm = new ew.Form("flab_mas_departmentview", "view");

// Form_CustomValidate event
flab_mas_departmentview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_mas_departmentview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$lab_mas_department->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lab_mas_department_view->ExportOptions->render("body") ?>
<?php $lab_mas_department_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lab_mas_department_view->showPageHeader(); ?>
<?php
$lab_mas_department_view->showMessage();
?>
<form name="flab_mas_departmentview" id="flab_mas_departmentview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_mas_department_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_mas_department_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_mas_department">
<input type="hidden" name="modal" value="<?php echo (int)$lab_mas_department_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lab_mas_department->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $lab_mas_department_view->TableLeftColumnClass ?>"><span id="elh_lab_mas_department_id"><?php echo $lab_mas_department->id->caption() ?></span></td>
		<td data-name="id"<?php echo $lab_mas_department->id->cellAttributes() ?>>
<span id="el_lab_mas_department_id">
<span<?php echo $lab_mas_department->id->viewAttributes() ?>>
<?php echo $lab_mas_department->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_mas_department->Department->Visible) { // Department ?>
	<tr id="r_Department">
		<td class="<?php echo $lab_mas_department_view->TableLeftColumnClass ?>"><span id="elh_lab_mas_department_Department"><?php echo $lab_mas_department->Department->caption() ?></span></td>
		<td data-name="Department"<?php echo $lab_mas_department->Department->cellAttributes() ?>>
<span id="el_lab_mas_department_Department">
<span<?php echo $lab_mas_department->Department->viewAttributes() ?>>
<?php echo $lab_mas_department->Department->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lab_mas_department_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_mas_department->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_mas_department_view->terminate();
?>