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
$lab_sepcimen_mast_view = new lab_sepcimen_mast_view();

// Run the page
$lab_sepcimen_mast_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_sepcimen_mast_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_sepcimen_mast->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var flab_sepcimen_mastview = currentForm = new ew.Form("flab_sepcimen_mastview", "view");

// Form_CustomValidate event
flab_sepcimen_mastview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_sepcimen_mastview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$lab_sepcimen_mast->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lab_sepcimen_mast_view->ExportOptions->render("body") ?>
<?php $lab_sepcimen_mast_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lab_sepcimen_mast_view->showPageHeader(); ?>
<?php
$lab_sepcimen_mast_view->showMessage();
?>
<form name="flab_sepcimen_mastview" id="flab_sepcimen_mastview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_sepcimen_mast_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_sepcimen_mast_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_sepcimen_mast">
<input type="hidden" name="modal" value="<?php echo (int)$lab_sepcimen_mast_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lab_sepcimen_mast->SpecimenCD->Visible) { // SpecimenCD ?>
	<tr id="r_SpecimenCD">
		<td class="<?php echo $lab_sepcimen_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_sepcimen_mast_SpecimenCD"><?php echo $lab_sepcimen_mast->SpecimenCD->caption() ?></span></td>
		<td data-name="SpecimenCD"<?php echo $lab_sepcimen_mast->SpecimenCD->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_SpecimenCD">
<span<?php echo $lab_sepcimen_mast->SpecimenCD->viewAttributes() ?>>
<?php echo $lab_sepcimen_mast->SpecimenCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_sepcimen_mast->SpecimenDesc->Visible) { // SpecimenDesc ?>
	<tr id="r_SpecimenDesc">
		<td class="<?php echo $lab_sepcimen_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_sepcimen_mast_SpecimenDesc"><?php echo $lab_sepcimen_mast->SpecimenDesc->caption() ?></span></td>
		<td data-name="SpecimenDesc"<?php echo $lab_sepcimen_mast->SpecimenDesc->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_SpecimenDesc">
<span<?php echo $lab_sepcimen_mast->SpecimenDesc->viewAttributes() ?>>
<?php echo $lab_sepcimen_mast->SpecimenDesc->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_sepcimen_mast->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $lab_sepcimen_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_sepcimen_mast_id"><?php echo $lab_sepcimen_mast->id->caption() ?></span></td>
		<td data-name="id"<?php echo $lab_sepcimen_mast->id->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_id">
<span<?php echo $lab_sepcimen_mast->id->viewAttributes() ?>>
<?php echo $lab_sepcimen_mast->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lab_sepcimen_mast_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_sepcimen_mast->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_sepcimen_mast_view->terminate();
?>