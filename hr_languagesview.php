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
$hr_languages_view = new hr_languages_view();

// Run the page
$hr_languages_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_languages_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_languages->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_languagesview = currentForm = new ew.Form("fhr_languagesview", "view");

// Form_CustomValidate event
fhr_languagesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_languagesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_languages->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_languages_view->ExportOptions->render("body") ?>
<?php $hr_languages_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_languages_view->showPageHeader(); ?>
<?php
$hr_languages_view->showMessage();
?>
<form name="fhr_languagesview" id="fhr_languagesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_languages_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_languages_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_languages">
<input type="hidden" name="modal" value="<?php echo (int)$hr_languages_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_languages->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_languages_view->TableLeftColumnClass ?>"><span id="elh_hr_languages_id"><?php echo $hr_languages->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_languages->id->cellAttributes() ?>>
<span id="el_hr_languages_id">
<span<?php echo $hr_languages->id->viewAttributes() ?>>
<?php echo $hr_languages->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_languages->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_languages_view->TableLeftColumnClass ?>"><span id="elh_hr_languages_name"><?php echo $hr_languages->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_languages->name->cellAttributes() ?>>
<span id="el_hr_languages_name">
<span<?php echo $hr_languages->name->viewAttributes() ?>>
<?php echo $hr_languages->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_languages->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $hr_languages_view->TableLeftColumnClass ?>"><span id="elh_hr_languages_description"><?php echo $hr_languages->description->caption() ?></span></td>
		<td data-name="description"<?php echo $hr_languages->description->cellAttributes() ?>>
<span id="el_hr_languages_description">
<span<?php echo $hr_languages->description->viewAttributes() ?>>
<?php echo $hr_languages->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_languages->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_languages_view->TableLeftColumnClass ?>"><span id="elh_hr_languages_HospID"><?php echo $hr_languages->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_languages->HospID->cellAttributes() ?>>
<span id="el_hr_languages_HospID">
<span<?php echo $hr_languages->HospID->viewAttributes() ?>>
<?php echo $hr_languages->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_languages_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_languages->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_languages_view->terminate();
?>