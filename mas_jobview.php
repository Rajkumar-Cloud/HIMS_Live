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
$mas_job_view = new mas_job_view();

// Run the page
$mas_job_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_job_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_job->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_jobview = currentForm = new ew.Form("fmas_jobview", "view");

// Form_CustomValidate event
fmas_jobview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_jobview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_job->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_job_view->ExportOptions->render("body") ?>
<?php $mas_job_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_job_view->showPageHeader(); ?>
<?php
$mas_job_view->showMessage();
?>
<form name="fmas_jobview" id="fmas_jobview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_job_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_job_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_job">
<input type="hidden" name="modal" value="<?php echo (int)$mas_job_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_job->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_job_view->TableLeftColumnClass ?>"><span id="elh_mas_job_id"><?php echo $mas_job->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_job->id->cellAttributes() ?>>
<span id="el_mas_job_id">
<span<?php echo $mas_job->id->viewAttributes() ?>>
<?php echo $mas_job->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_job->Job->Visible) { // Job ?>
	<tr id="r_Job">
		<td class="<?php echo $mas_job_view->TableLeftColumnClass ?>"><span id="elh_mas_job_Job"><?php echo $mas_job->Job->caption() ?></span></td>
		<td data-name="Job"<?php echo $mas_job->Job->cellAttributes() ?>>
<span id="el_mas_job_Job">
<span<?php echo $mas_job->Job->viewAttributes() ?>>
<?php echo $mas_job->Job->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_job_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_job->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_job_view->terminate();
?>