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
$ivf_stimulation_hmg_view = new ivf_stimulation_hmg_view();

// Run the page
$ivf_stimulation_hmg_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_stimulation_hmg_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_stimulation_hmg->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fivf_stimulation_hmgview = currentForm = new ew.Form("fivf_stimulation_hmgview", "view");

// Form_CustomValidate event
fivf_stimulation_hmgview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_stimulation_hmgview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_stimulation_hmg->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_stimulation_hmg_view->ExportOptions->render("body") ?>
<?php $ivf_stimulation_hmg_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_stimulation_hmg_view->showPageHeader(); ?>
<?php
$ivf_stimulation_hmg_view->showMessage();
?>
<form name="fivf_stimulation_hmgview" id="fivf_stimulation_hmgview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_stimulation_hmg_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_stimulation_hmg_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_hmg">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_stimulation_hmg_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_stimulation_hmg->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_stimulation_hmg_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_hmg_id"><?php echo $ivf_stimulation_hmg->id->caption() ?></span></td>
		<td data-name="id"<?php echo $ivf_stimulation_hmg->id->cellAttributes() ?>>
<span id="el_ivf_stimulation_hmg_id">
<span<?php echo $ivf_stimulation_hmg->id->viewAttributes() ?>>
<?php echo $ivf_stimulation_hmg->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_hmg->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_stimulation_hmg_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_hmg_Name"><?php echo $ivf_stimulation_hmg->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $ivf_stimulation_hmg->Name->cellAttributes() ?>>
<span id="el_ivf_stimulation_hmg_Name">
<span<?php echo $ivf_stimulation_hmg->Name->viewAttributes() ?>>
<?php echo $ivf_stimulation_hmg->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_stimulation_hmg_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_stimulation_hmg->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_stimulation_hmg_view->terminate();
?>