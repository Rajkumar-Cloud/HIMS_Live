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
$hr_benifits_view = new hr_benifits_view();

// Run the page
$hr_benifits_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_benifits_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_benifits->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_benifitsview = currentForm = new ew.Form("fhr_benifitsview", "view");

// Form_CustomValidate event
fhr_benifitsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_benifitsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_benifits->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_benifits_view->ExportOptions->render("body") ?>
<?php $hr_benifits_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_benifits_view->showPageHeader(); ?>
<?php
$hr_benifits_view->showMessage();
?>
<form name="fhr_benifitsview" id="fhr_benifitsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_benifits_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_benifits_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_benifits">
<input type="hidden" name="modal" value="<?php echo (int)$hr_benifits_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_benifits->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_benifits_view->TableLeftColumnClass ?>"><span id="elh_hr_benifits_id"><?php echo $hr_benifits->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_benifits->id->cellAttributes() ?>>
<span id="el_hr_benifits_id">
<span<?php echo $hr_benifits->id->viewAttributes() ?>>
<?php echo $hr_benifits->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_benifits->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_benifits_view->TableLeftColumnClass ?>"><span id="elh_hr_benifits_name"><?php echo $hr_benifits->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_benifits->name->cellAttributes() ?>>
<span id="el_hr_benifits_name">
<span<?php echo $hr_benifits->name->viewAttributes() ?>>
<?php echo $hr_benifits->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_benifits->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_benifits_view->TableLeftColumnClass ?>"><span id="elh_hr_benifits_HospID"><?php echo $hr_benifits->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_benifits->HospID->cellAttributes() ?>>
<span id="el_hr_benifits_HospID">
<span<?php echo $hr_benifits->HospID->viewAttributes() ?>>
<?php echo $hr_benifits->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_benifits_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_benifits->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_benifits_view->terminate();
?>