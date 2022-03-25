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
$hr_companyloans_view = new hr_companyloans_view();

// Run the page
$hr_companyloans_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_companyloans_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_companyloans->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_companyloansview = currentForm = new ew.Form("fhr_companyloansview", "view");

// Form_CustomValidate event
fhr_companyloansview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_companyloansview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_companyloans->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_companyloans_view->ExportOptions->render("body") ?>
<?php $hr_companyloans_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_companyloans_view->showPageHeader(); ?>
<?php
$hr_companyloans_view->showMessage();
?>
<form name="fhr_companyloansview" id="fhr_companyloansview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_companyloans_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_companyloans_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_companyloans">
<input type="hidden" name="modal" value="<?php echo (int)$hr_companyloans_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_companyloans->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_companyloans_view->TableLeftColumnClass ?>"><span id="elh_hr_companyloans_id"><?php echo $hr_companyloans->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_companyloans->id->cellAttributes() ?>>
<span id="el_hr_companyloans_id">
<span<?php echo $hr_companyloans->id->viewAttributes() ?>>
<?php echo $hr_companyloans->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_companyloans->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_companyloans_view->TableLeftColumnClass ?>"><span id="elh_hr_companyloans_name"><?php echo $hr_companyloans->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_companyloans->name->cellAttributes() ?>>
<span id="el_hr_companyloans_name">
<span<?php echo $hr_companyloans->name->viewAttributes() ?>>
<?php echo $hr_companyloans->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_companyloans->details->Visible) { // details ?>
	<tr id="r_details">
		<td class="<?php echo $hr_companyloans_view->TableLeftColumnClass ?>"><span id="elh_hr_companyloans_details"><?php echo $hr_companyloans->details->caption() ?></span></td>
		<td data-name="details"<?php echo $hr_companyloans->details->cellAttributes() ?>>
<span id="el_hr_companyloans_details">
<span<?php echo $hr_companyloans->details->viewAttributes() ?>>
<?php echo $hr_companyloans->details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_companyloans->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_companyloans_view->TableLeftColumnClass ?>"><span id="elh_hr_companyloans_HospID"><?php echo $hr_companyloans->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_companyloans->HospID->cellAttributes() ?>>
<span id="el_hr_companyloans_HospID">
<span<?php echo $hr_companyloans->HospID->viewAttributes() ?>>
<?php echo $hr_companyloans->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_companyloans_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_companyloans->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_companyloans_view->terminate();
?>