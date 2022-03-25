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
$employeetrainingsessions_view = new employeetrainingsessions_view();

// Run the page
$employeetrainingsessions_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employeetrainingsessions_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employeetrainingsessions->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployeetrainingsessionsview = currentForm = new ew.Form("femployeetrainingsessionsview", "view");

// Form_CustomValidate event
femployeetrainingsessionsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployeetrainingsessionsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployeetrainingsessionsview.lists["x_status"] = <?php echo $employeetrainingsessions_view->status->Lookup->toClientList() ?>;
femployeetrainingsessionsview.lists["x_status"].options = <?php echo JsonEncode($employeetrainingsessions_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employeetrainingsessions->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employeetrainingsessions_view->ExportOptions->render("body") ?>
<?php $employeetrainingsessions_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employeetrainingsessions_view->showPageHeader(); ?>
<?php
$employeetrainingsessions_view->showMessage();
?>
<form name="femployeetrainingsessionsview" id="femployeetrainingsessionsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employeetrainingsessions_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employeetrainingsessions_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employeetrainingsessions">
<input type="hidden" name="modal" value="<?php echo (int)$employeetrainingsessions_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employeetrainingsessions->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employeetrainingsessions_view->TableLeftColumnClass ?>"><span id="elh_employeetrainingsessions_id"><?php echo $employeetrainingsessions->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employeetrainingsessions->id->cellAttributes() ?>>
<span id="el_employeetrainingsessions_id">
<span<?php echo $employeetrainingsessions->id->viewAttributes() ?>>
<?php echo $employeetrainingsessions->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employeetrainingsessions->employee->Visible) { // employee ?>
	<tr id="r_employee">
		<td class="<?php echo $employeetrainingsessions_view->TableLeftColumnClass ?>"><span id="elh_employeetrainingsessions_employee"><?php echo $employeetrainingsessions->employee->caption() ?></span></td>
		<td data-name="employee"<?php echo $employeetrainingsessions->employee->cellAttributes() ?>>
<span id="el_employeetrainingsessions_employee">
<span<?php echo $employeetrainingsessions->employee->viewAttributes() ?>>
<?php echo $employeetrainingsessions->employee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employeetrainingsessions->trainingSession->Visible) { // trainingSession ?>
	<tr id="r_trainingSession">
		<td class="<?php echo $employeetrainingsessions_view->TableLeftColumnClass ?>"><span id="elh_employeetrainingsessions_trainingSession"><?php echo $employeetrainingsessions->trainingSession->caption() ?></span></td>
		<td data-name="trainingSession"<?php echo $employeetrainingsessions->trainingSession->cellAttributes() ?>>
<span id="el_employeetrainingsessions_trainingSession">
<span<?php echo $employeetrainingsessions->trainingSession->viewAttributes() ?>>
<?php echo $employeetrainingsessions->trainingSession->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employeetrainingsessions->feedBack->Visible) { // feedBack ?>
	<tr id="r_feedBack">
		<td class="<?php echo $employeetrainingsessions_view->TableLeftColumnClass ?>"><span id="elh_employeetrainingsessions_feedBack"><?php echo $employeetrainingsessions->feedBack->caption() ?></span></td>
		<td data-name="feedBack"<?php echo $employeetrainingsessions->feedBack->cellAttributes() ?>>
<span id="el_employeetrainingsessions_feedBack">
<span<?php echo $employeetrainingsessions->feedBack->viewAttributes() ?>>
<?php echo $employeetrainingsessions->feedBack->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employeetrainingsessions->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employeetrainingsessions_view->TableLeftColumnClass ?>"><span id="elh_employeetrainingsessions_status"><?php echo $employeetrainingsessions->status->caption() ?></span></td>
		<td data-name="status"<?php echo $employeetrainingsessions->status->cellAttributes() ?>>
<span id="el_employeetrainingsessions_status">
<span<?php echo $employeetrainingsessions->status->viewAttributes() ?>>
<?php echo $employeetrainingsessions->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employeetrainingsessions->proof->Visible) { // proof ?>
	<tr id="r_proof">
		<td class="<?php echo $employeetrainingsessions_view->TableLeftColumnClass ?>"><span id="elh_employeetrainingsessions_proof"><?php echo $employeetrainingsessions->proof->caption() ?></span></td>
		<td data-name="proof"<?php echo $employeetrainingsessions->proof->cellAttributes() ?>>
<span id="el_employeetrainingsessions_proof">
<span<?php echo $employeetrainingsessions->proof->viewAttributes() ?>>
<?php echo $employeetrainingsessions->proof->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employeetrainingsessions_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employeetrainingsessions->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employeetrainingsessions_view->terminate();
?>