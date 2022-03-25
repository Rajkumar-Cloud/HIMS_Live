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
$hr_educations_view = new hr_educations_view();

// Run the page
$hr_educations_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_educations_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_educations->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_educationsview = currentForm = new ew.Form("fhr_educationsview", "view");

// Form_CustomValidate event
fhr_educationsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_educationsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_educations->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_educations_view->ExportOptions->render("body") ?>
<?php $hr_educations_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_educations_view->showPageHeader(); ?>
<?php
$hr_educations_view->showMessage();
?>
<form name="fhr_educationsview" id="fhr_educationsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_educations_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_educations_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_educations">
<input type="hidden" name="modal" value="<?php echo (int)$hr_educations_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_educations->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_educations_view->TableLeftColumnClass ?>"><span id="elh_hr_educations_id"><?php echo $hr_educations->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_educations->id->cellAttributes() ?>>
<span id="el_hr_educations_id">
<span<?php echo $hr_educations->id->viewAttributes() ?>>
<?php echo $hr_educations->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_educations->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_educations_view->TableLeftColumnClass ?>"><span id="elh_hr_educations_name"><?php echo $hr_educations->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_educations->name->cellAttributes() ?>>
<span id="el_hr_educations_name">
<span<?php echo $hr_educations->name->viewAttributes() ?>>
<?php echo $hr_educations->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_educations->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $hr_educations_view->TableLeftColumnClass ?>"><span id="elh_hr_educations_description"><?php echo $hr_educations->description->caption() ?></span></td>
		<td data-name="description"<?php echo $hr_educations->description->cellAttributes() ?>>
<span id="el_hr_educations_description">
<span<?php echo $hr_educations->description->viewAttributes() ?>>
<?php echo $hr_educations->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_educations->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_educations_view->TableLeftColumnClass ?>"><span id="elh_hr_educations_HospID"><?php echo $hr_educations->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_educations->HospID->cellAttributes() ?>>
<span id="el_hr_educations_HospID">
<span<?php echo $hr_educations->HospID->viewAttributes() ?>>
<?php echo $hr_educations->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_educations_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_educations->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_educations_view->terminate();
?>