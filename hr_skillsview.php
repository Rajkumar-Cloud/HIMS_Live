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
$hr_skills_view = new hr_skills_view();

// Run the page
$hr_skills_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_skills_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_skills->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_skillsview = currentForm = new ew.Form("fhr_skillsview", "view");

// Form_CustomValidate event
fhr_skillsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_skillsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_skills->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_skills_view->ExportOptions->render("body") ?>
<?php $hr_skills_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_skills_view->showPageHeader(); ?>
<?php
$hr_skills_view->showMessage();
?>
<form name="fhr_skillsview" id="fhr_skillsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_skills_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_skills_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_skills">
<input type="hidden" name="modal" value="<?php echo (int)$hr_skills_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_skills->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_skills_view->TableLeftColumnClass ?>"><span id="elh_hr_skills_id"><?php echo $hr_skills->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_skills->id->cellAttributes() ?>>
<span id="el_hr_skills_id">
<span<?php echo $hr_skills->id->viewAttributes() ?>>
<?php echo $hr_skills->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_skills->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_skills_view->TableLeftColumnClass ?>"><span id="elh_hr_skills_name"><?php echo $hr_skills->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_skills->name->cellAttributes() ?>>
<span id="el_hr_skills_name">
<span<?php echo $hr_skills->name->viewAttributes() ?>>
<?php echo $hr_skills->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_skills->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $hr_skills_view->TableLeftColumnClass ?>"><span id="elh_hr_skills_description"><?php echo $hr_skills->description->caption() ?></span></td>
		<td data-name="description"<?php echo $hr_skills->description->cellAttributes() ?>>
<span id="el_hr_skills_description">
<span<?php echo $hr_skills->description->viewAttributes() ?>>
<?php echo $hr_skills->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_skills->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_skills_view->TableLeftColumnClass ?>"><span id="elh_hr_skills_HospID"><?php echo $hr_skills->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_skills->HospID->cellAttributes() ?>>
<span id="el_hr_skills_HospID">
<span<?php echo $hr_skills->HospID->viewAttributes() ?>>
<?php echo $hr_skills->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_skills_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_skills->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_skills_view->terminate();
?>