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
$report_revenue_view = new report_revenue_view();

// Run the page
$report_revenue_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$report_revenue_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$report_revenue->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var freport_revenueview = currentForm = new ew.Form("freport_revenueview", "view");

// Form_CustomValidate event
freport_revenueview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
freport_revenueview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$report_revenue->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $report_revenue_view->ExportOptions->render("body") ?>
<?php $report_revenue_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $report_revenue_view->showPageHeader(); ?>
<?php
$report_revenue_view->showMessage();
?>
<form name="freport_revenueview" id="freport_revenueview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($report_revenue_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $report_revenue_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="report_revenue">
<input type="hidden" name="modal" value="<?php echo (int)$report_revenue_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($report_revenue->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $report_revenue_view->TableLeftColumnClass ?>"><span id="elh_report_revenue_id"><?php echo $report_revenue->id->caption() ?></span></td>
		<td data-name="id"<?php echo $report_revenue->id->cellAttributes() ?>>
<span id="el_report_revenue_id">
<span<?php echo $report_revenue->id->viewAttributes() ?>>
<?php echo $report_revenue->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($report_revenue->Date->Visible) { // Date ?>
	<tr id="r_Date">
		<td class="<?php echo $report_revenue_view->TableLeftColumnClass ?>"><span id="elh_report_revenue_Date"><?php echo $report_revenue->Date->caption() ?></span></td>
		<td data-name="Date"<?php echo $report_revenue->Date->cellAttributes() ?>>
<span id="el_report_revenue_Date">
<span<?php echo $report_revenue->Date->viewAttributes() ?>>
<?php echo $report_revenue->Date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($report_revenue->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $report_revenue_view->TableLeftColumnClass ?>"><span id="elh_report_revenue_Amount"><?php echo $report_revenue->Amount->caption() ?></span></td>
		<td data-name="Amount"<?php echo $report_revenue->Amount->cellAttributes() ?>>
<span id="el_report_revenue_Amount">
<span<?php echo $report_revenue->Amount->viewAttributes() ?>>
<?php echo $report_revenue->Amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($report_revenue->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $report_revenue_view->TableLeftColumnClass ?>"><span id="elh_report_revenue_HospID"><?php echo $report_revenue->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $report_revenue->HospID->cellAttributes() ?>>
<span id="el_report_revenue_HospID">
<span<?php echo $report_revenue->HospID->viewAttributes() ?>>
<?php echo $report_revenue->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$report_revenue_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$report_revenue->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$report_revenue_view->terminate();
?>