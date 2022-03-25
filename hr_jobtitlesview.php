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
$hr_jobtitles_view = new hr_jobtitles_view();

// Run the page
$hr_jobtitles_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_jobtitles_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_jobtitles->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_jobtitlesview = currentForm = new ew.Form("fhr_jobtitlesview", "view");

// Form_CustomValidate event
fhr_jobtitlesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_jobtitlesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_jobtitles->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_jobtitles_view->ExportOptions->render("body") ?>
<?php $hr_jobtitles_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_jobtitles_view->showPageHeader(); ?>
<?php
$hr_jobtitles_view->showMessage();
?>
<form name="fhr_jobtitlesview" id="fhr_jobtitlesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_jobtitles_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_jobtitles_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_jobtitles">
<input type="hidden" name="modal" value="<?php echo (int)$hr_jobtitles_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_jobtitles->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_jobtitles_view->TableLeftColumnClass ?>"><span id="elh_hr_jobtitles_id"><?php echo $hr_jobtitles->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_jobtitles->id->cellAttributes() ?>>
<span id="el_hr_jobtitles_id">
<span<?php echo $hr_jobtitles->id->viewAttributes() ?>>
<?php echo $hr_jobtitles->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_jobtitles->code->Visible) { // code ?>
	<tr id="r_code">
		<td class="<?php echo $hr_jobtitles_view->TableLeftColumnClass ?>"><span id="elh_hr_jobtitles_code"><?php echo $hr_jobtitles->code->caption() ?></span></td>
		<td data-name="code"<?php echo $hr_jobtitles->code->cellAttributes() ?>>
<span id="el_hr_jobtitles_code">
<span<?php echo $hr_jobtitles->code->viewAttributes() ?>>
<?php echo $hr_jobtitles->code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_jobtitles->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_jobtitles_view->TableLeftColumnClass ?>"><span id="elh_hr_jobtitles_name"><?php echo $hr_jobtitles->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_jobtitles->name->cellAttributes() ?>>
<span id="el_hr_jobtitles_name">
<span<?php echo $hr_jobtitles->name->viewAttributes() ?>>
<?php echo $hr_jobtitles->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_jobtitles->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $hr_jobtitles_view->TableLeftColumnClass ?>"><span id="elh_hr_jobtitles_description"><?php echo $hr_jobtitles->description->caption() ?></span></td>
		<td data-name="description"<?php echo $hr_jobtitles->description->cellAttributes() ?>>
<span id="el_hr_jobtitles_description">
<span<?php echo $hr_jobtitles->description->viewAttributes() ?>>
<?php echo $hr_jobtitles->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_jobtitles->specification->Visible) { // specification ?>
	<tr id="r_specification">
		<td class="<?php echo $hr_jobtitles_view->TableLeftColumnClass ?>"><span id="elh_hr_jobtitles_specification"><?php echo $hr_jobtitles->specification->caption() ?></span></td>
		<td data-name="specification"<?php echo $hr_jobtitles->specification->cellAttributes() ?>>
<span id="el_hr_jobtitles_specification">
<span<?php echo $hr_jobtitles->specification->viewAttributes() ?>>
<?php echo $hr_jobtitles->specification->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_jobtitles->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_jobtitles_view->TableLeftColumnClass ?>"><span id="elh_hr_jobtitles_HospID"><?php echo $hr_jobtitles->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_jobtitles->HospID->cellAttributes() ?>>
<span id="el_hr_jobtitles_HospID">
<span<?php echo $hr_jobtitles->HospID->viewAttributes() ?>>
<?php echo $hr_jobtitles->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_jobtitles_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_jobtitles->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_jobtitles_view->terminate();
?>