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
$hr_leaveperiods_view = new hr_leaveperiods_view();

// Run the page
$hr_leaveperiods_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_leaveperiods_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_leaveperiods->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_leaveperiodsview = currentForm = new ew.Form("fhr_leaveperiodsview", "view");

// Form_CustomValidate event
fhr_leaveperiodsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_leaveperiodsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_leaveperiodsview.lists["x_status"] = <?php echo $hr_leaveperiods_view->status->Lookup->toClientList() ?>;
fhr_leaveperiodsview.lists["x_status"].options = <?php echo JsonEncode($hr_leaveperiods_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_leaveperiods->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_leaveperiods_view->ExportOptions->render("body") ?>
<?php $hr_leaveperiods_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_leaveperiods_view->showPageHeader(); ?>
<?php
$hr_leaveperiods_view->showMessage();
?>
<form name="fhr_leaveperiodsview" id="fhr_leaveperiodsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_leaveperiods_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_leaveperiods_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_leaveperiods">
<input type="hidden" name="modal" value="<?php echo (int)$hr_leaveperiods_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_leaveperiods->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_leaveperiods_view->TableLeftColumnClass ?>"><span id="elh_hr_leaveperiods_id"><?php echo $hr_leaveperiods->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_leaveperiods->id->cellAttributes() ?>>
<span id="el_hr_leaveperiods_id">
<span<?php echo $hr_leaveperiods->id->viewAttributes() ?>>
<?php echo $hr_leaveperiods->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leaveperiods->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_leaveperiods_view->TableLeftColumnClass ?>"><span id="elh_hr_leaveperiods_name"><?php echo $hr_leaveperiods->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_leaveperiods->name->cellAttributes() ?>>
<span id="el_hr_leaveperiods_name">
<span<?php echo $hr_leaveperiods->name->viewAttributes() ?>>
<?php echo $hr_leaveperiods->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leaveperiods->date_start->Visible) { // date_start ?>
	<tr id="r_date_start">
		<td class="<?php echo $hr_leaveperiods_view->TableLeftColumnClass ?>"><span id="elh_hr_leaveperiods_date_start"><?php echo $hr_leaveperiods->date_start->caption() ?></span></td>
		<td data-name="date_start"<?php echo $hr_leaveperiods->date_start->cellAttributes() ?>>
<span id="el_hr_leaveperiods_date_start">
<span<?php echo $hr_leaveperiods->date_start->viewAttributes() ?>>
<?php echo $hr_leaveperiods->date_start->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leaveperiods->date_end->Visible) { // date_end ?>
	<tr id="r_date_end">
		<td class="<?php echo $hr_leaveperiods_view->TableLeftColumnClass ?>"><span id="elh_hr_leaveperiods_date_end"><?php echo $hr_leaveperiods->date_end->caption() ?></span></td>
		<td data-name="date_end"<?php echo $hr_leaveperiods->date_end->cellAttributes() ?>>
<span id="el_hr_leaveperiods_date_end">
<span<?php echo $hr_leaveperiods->date_end->viewAttributes() ?>>
<?php echo $hr_leaveperiods->date_end->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leaveperiods->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $hr_leaveperiods_view->TableLeftColumnClass ?>"><span id="elh_hr_leaveperiods_status"><?php echo $hr_leaveperiods->status->caption() ?></span></td>
		<td data-name="status"<?php echo $hr_leaveperiods->status->cellAttributes() ?>>
<span id="el_hr_leaveperiods_status">
<span<?php echo $hr_leaveperiods->status->viewAttributes() ?>>
<?php echo $hr_leaveperiods->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leaveperiods->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_leaveperiods_view->TableLeftColumnClass ?>"><span id="elh_hr_leaveperiods_HospID"><?php echo $hr_leaveperiods->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_leaveperiods->HospID->cellAttributes() ?>>
<span id="el_hr_leaveperiods_HospID">
<span<?php echo $hr_leaveperiods->HospID->viewAttributes() ?>>
<?php echo $hr_leaveperiods->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_leaveperiods_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_leaveperiods->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_leaveperiods_view->terminate();
?>