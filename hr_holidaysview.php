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
$hr_holidays_view = new hr_holidays_view();

// Run the page
$hr_holidays_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_holidays_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_holidays->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_holidaysview = currentForm = new ew.Form("fhr_holidaysview", "view");

// Form_CustomValidate event
fhr_holidaysview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_holidaysview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_holidaysview.lists["x_status"] = <?php echo $hr_holidays_view->status->Lookup->toClientList() ?>;
fhr_holidaysview.lists["x_status"].options = <?php echo JsonEncode($hr_holidays_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_holidays->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_holidays_view->ExportOptions->render("body") ?>
<?php $hr_holidays_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_holidays_view->showPageHeader(); ?>
<?php
$hr_holidays_view->showMessage();
?>
<form name="fhr_holidaysview" id="fhr_holidaysview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_holidays_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_holidays_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_holidays">
<input type="hidden" name="modal" value="<?php echo (int)$hr_holidays_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_holidays->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_holidays_view->TableLeftColumnClass ?>"><span id="elh_hr_holidays_id"><?php echo $hr_holidays->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_holidays->id->cellAttributes() ?>>
<span id="el_hr_holidays_id">
<span<?php echo $hr_holidays->id->viewAttributes() ?>>
<?php echo $hr_holidays->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_holidays->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_holidays_view->TableLeftColumnClass ?>"><span id="elh_hr_holidays_name"><?php echo $hr_holidays->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_holidays->name->cellAttributes() ?>>
<span id="el_hr_holidays_name">
<span<?php echo $hr_holidays->name->viewAttributes() ?>>
<?php echo $hr_holidays->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_holidays->dateh->Visible) { // dateh ?>
	<tr id="r_dateh">
		<td class="<?php echo $hr_holidays_view->TableLeftColumnClass ?>"><span id="elh_hr_holidays_dateh"><?php echo $hr_holidays->dateh->caption() ?></span></td>
		<td data-name="dateh"<?php echo $hr_holidays->dateh->cellAttributes() ?>>
<span id="el_hr_holidays_dateh">
<span<?php echo $hr_holidays->dateh->viewAttributes() ?>>
<?php echo $hr_holidays->dateh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_holidays->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $hr_holidays_view->TableLeftColumnClass ?>"><span id="elh_hr_holidays_status"><?php echo $hr_holidays->status->caption() ?></span></td>
		<td data-name="status"<?php echo $hr_holidays->status->cellAttributes() ?>>
<span id="el_hr_holidays_status">
<span<?php echo $hr_holidays->status->viewAttributes() ?>>
<?php echo $hr_holidays->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_holidays->country->Visible) { // country ?>
	<tr id="r_country">
		<td class="<?php echo $hr_holidays_view->TableLeftColumnClass ?>"><span id="elh_hr_holidays_country"><?php echo $hr_holidays->country->caption() ?></span></td>
		<td data-name="country"<?php echo $hr_holidays->country->cellAttributes() ?>>
<span id="el_hr_holidays_country">
<span<?php echo $hr_holidays->country->viewAttributes() ?>>
<?php echo $hr_holidays->country->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_holidays->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_holidays_view->TableLeftColumnClass ?>"><span id="elh_hr_holidays_HospID"><?php echo $hr_holidays->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_holidays->HospID->cellAttributes() ?>>
<span id="el_hr_holidays_HospID">
<span<?php echo $hr_holidays->HospID->viewAttributes() ?>>
<?php echo $hr_holidays->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_holidays_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_holidays->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_holidays_view->terminate();
?>