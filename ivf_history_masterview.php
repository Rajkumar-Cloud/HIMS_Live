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
$ivf_history_master_view = new ivf_history_master_view();

// Run the page
$ivf_history_master_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_history_master_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_history_master->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fivf_history_masterview = currentForm = new ew.Form("fivf_history_masterview", "view");

// Form_CustomValidate event
fivf_history_masterview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_history_masterview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_history_master->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_history_master_view->ExportOptions->render("body") ?>
<?php $ivf_history_master_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_history_master_view->showPageHeader(); ?>
<?php
$ivf_history_master_view->showMessage();
?>
<form name="fivf_history_masterview" id="fivf_history_masterview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_history_master_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_history_master_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_history_master">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_history_master_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_history_master->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_history_master_view->TableLeftColumnClass ?>"><span id="elh_ivf_history_master_id"><?php echo $ivf_history_master->id->caption() ?></span></td>
		<td data-name="id"<?php echo $ivf_history_master->id->cellAttributes() ?>>
<span id="el_ivf_history_master_id">
<span<?php echo $ivf_history_master->id->viewAttributes() ?>>
<?php echo $ivf_history_master->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_history_master->History->Visible) { // History ?>
	<tr id="r_History">
		<td class="<?php echo $ivf_history_master_view->TableLeftColumnClass ?>"><span id="elh_ivf_history_master_History"><?php echo $ivf_history_master->History->caption() ?></span></td>
		<td data-name="History"<?php echo $ivf_history_master->History->cellAttributes() ?>>
<span id="el_ivf_history_master_History">
<span<?php echo $ivf_history_master->History->viewAttributes() ?>>
<?php echo $ivf_history_master->History->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_history_master->HistoryType->Visible) { // HistoryType ?>
	<tr id="r_HistoryType">
		<td class="<?php echo $ivf_history_master_view->TableLeftColumnClass ?>"><span id="elh_ivf_history_master_HistoryType"><?php echo $ivf_history_master->HistoryType->caption() ?></span></td>
		<td data-name="HistoryType"<?php echo $ivf_history_master->HistoryType->cellAttributes() ?>>
<span id="el_ivf_history_master_HistoryType">
<span<?php echo $ivf_history_master->HistoryType->viewAttributes() ?>>
<?php echo $ivf_history_master->HistoryType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_history_master_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_history_master->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_history_master_view->terminate();
?>