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
$hr_paygrades_view = new hr_paygrades_view();

// Run the page
$hr_paygrades_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_paygrades_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_paygrades->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_paygradesview = currentForm = new ew.Form("fhr_paygradesview", "view");

// Form_CustomValidate event
fhr_paygradesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_paygradesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_paygrades->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_paygrades_view->ExportOptions->render("body") ?>
<?php $hr_paygrades_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_paygrades_view->showPageHeader(); ?>
<?php
$hr_paygrades_view->showMessage();
?>
<form name="fhr_paygradesview" id="fhr_paygradesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_paygrades_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_paygrades_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_paygrades">
<input type="hidden" name="modal" value="<?php echo (int)$hr_paygrades_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_paygrades->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_paygrades_view->TableLeftColumnClass ?>"><span id="elh_hr_paygrades_id"><?php echo $hr_paygrades->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_paygrades->id->cellAttributes() ?>>
<span id="el_hr_paygrades_id">
<span<?php echo $hr_paygrades->id->viewAttributes() ?>>
<?php echo $hr_paygrades->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_paygrades->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_paygrades_view->TableLeftColumnClass ?>"><span id="elh_hr_paygrades_name"><?php echo $hr_paygrades->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_paygrades->name->cellAttributes() ?>>
<span id="el_hr_paygrades_name">
<span<?php echo $hr_paygrades->name->viewAttributes() ?>>
<?php echo $hr_paygrades->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_paygrades->currency->Visible) { // currency ?>
	<tr id="r_currency">
		<td class="<?php echo $hr_paygrades_view->TableLeftColumnClass ?>"><span id="elh_hr_paygrades_currency"><?php echo $hr_paygrades->currency->caption() ?></span></td>
		<td data-name="currency"<?php echo $hr_paygrades->currency->cellAttributes() ?>>
<span id="el_hr_paygrades_currency">
<span<?php echo $hr_paygrades->currency->viewAttributes() ?>>
<?php echo $hr_paygrades->currency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_paygrades->min_salary->Visible) { // min_salary ?>
	<tr id="r_min_salary">
		<td class="<?php echo $hr_paygrades_view->TableLeftColumnClass ?>"><span id="elh_hr_paygrades_min_salary"><?php echo $hr_paygrades->min_salary->caption() ?></span></td>
		<td data-name="min_salary"<?php echo $hr_paygrades->min_salary->cellAttributes() ?>>
<span id="el_hr_paygrades_min_salary">
<span<?php echo $hr_paygrades->min_salary->viewAttributes() ?>>
<?php echo $hr_paygrades->min_salary->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_paygrades->max_salary->Visible) { // max_salary ?>
	<tr id="r_max_salary">
		<td class="<?php echo $hr_paygrades_view->TableLeftColumnClass ?>"><span id="elh_hr_paygrades_max_salary"><?php echo $hr_paygrades->max_salary->caption() ?></span></td>
		<td data-name="max_salary"<?php echo $hr_paygrades->max_salary->cellAttributes() ?>>
<span id="el_hr_paygrades_max_salary">
<span<?php echo $hr_paygrades->max_salary->viewAttributes() ?>>
<?php echo $hr_paygrades->max_salary->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_paygrades->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_paygrades_view->TableLeftColumnClass ?>"><span id="elh_hr_paygrades_HospID"><?php echo $hr_paygrades->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_paygrades->HospID->cellAttributes() ?>>
<span id="el_hr_paygrades_HospID">
<span<?php echo $hr_paygrades->HospID->viewAttributes() ?>>
<?php echo $hr_paygrades->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_paygrades_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_paygrades->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_paygrades_view->terminate();
?>