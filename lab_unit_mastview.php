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
$lab_unit_mast_view = new lab_unit_mast_view();

// Run the page
$lab_unit_mast_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_unit_mast_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_unit_mast->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var flab_unit_mastview = currentForm = new ew.Form("flab_unit_mastview", "view");

// Form_CustomValidate event
flab_unit_mastview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_unit_mastview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$lab_unit_mast->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lab_unit_mast_view->ExportOptions->render("body") ?>
<?php $lab_unit_mast_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lab_unit_mast_view->showPageHeader(); ?>
<?php
$lab_unit_mast_view->showMessage();
?>
<form name="flab_unit_mastview" id="flab_unit_mastview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_unit_mast_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_unit_mast_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_unit_mast">
<input type="hidden" name="modal" value="<?php echo (int)$lab_unit_mast_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lab_unit_mast->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $lab_unit_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_unit_mast_id"><?php echo $lab_unit_mast->id->caption() ?></span></td>
		<td data-name="id"<?php echo $lab_unit_mast->id->cellAttributes() ?>>
<span id="el_lab_unit_mast_id">
<span<?php echo $lab_unit_mast->id->viewAttributes() ?>>
<?php echo $lab_unit_mast->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_unit_mast->Code->Visible) { // Code ?>
	<tr id="r_Code">
		<td class="<?php echo $lab_unit_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_unit_mast_Code"><?php echo $lab_unit_mast->Code->caption() ?></span></td>
		<td data-name="Code"<?php echo $lab_unit_mast->Code->cellAttributes() ?>>
<span id="el_lab_unit_mast_Code">
<span<?php echo $lab_unit_mast->Code->viewAttributes() ?>>
<?php echo $lab_unit_mast->Code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_unit_mast->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $lab_unit_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_unit_mast_Name"><?php echo $lab_unit_mast->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $lab_unit_mast->Name->cellAttributes() ?>>
<span id="el_lab_unit_mast_Name">
<span<?php echo $lab_unit_mast->Name->viewAttributes() ?>>
<?php echo $lab_unit_mast->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lab_unit_mast_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_unit_mast->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_unit_mast_view->terminate();
?>