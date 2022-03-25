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
$hr_payfrequency_view = new hr_payfrequency_view();

// Run the page
$hr_payfrequency_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_payfrequency_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_payfrequency->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_payfrequencyview = currentForm = new ew.Form("fhr_payfrequencyview", "view");

// Form_CustomValidate event
fhr_payfrequencyview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_payfrequencyview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_payfrequency->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_payfrequency_view->ExportOptions->render("body") ?>
<?php $hr_payfrequency_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_payfrequency_view->showPageHeader(); ?>
<?php
$hr_payfrequency_view->showMessage();
?>
<form name="fhr_payfrequencyview" id="fhr_payfrequencyview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_payfrequency_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_payfrequency_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_payfrequency">
<input type="hidden" name="modal" value="<?php echo (int)$hr_payfrequency_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_payfrequency->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_payfrequency_view->TableLeftColumnClass ?>"><span id="elh_hr_payfrequency_id"><?php echo $hr_payfrequency->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_payfrequency->id->cellAttributes() ?>>
<span id="el_hr_payfrequency_id">
<span<?php echo $hr_payfrequency->id->viewAttributes() ?>>
<?php echo $hr_payfrequency->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_payfrequency->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_payfrequency_view->TableLeftColumnClass ?>"><span id="elh_hr_payfrequency_name"><?php echo $hr_payfrequency->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_payfrequency->name->cellAttributes() ?>>
<span id="el_hr_payfrequency_name">
<span<?php echo $hr_payfrequency->name->viewAttributes() ?>>
<?php echo $hr_payfrequency->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_payfrequency->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_payfrequency_view->TableLeftColumnClass ?>"><span id="elh_hr_payfrequency_HospID"><?php echo $hr_payfrequency->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_payfrequency->HospID->cellAttributes() ?>>
<span id="el_hr_payfrequency_HospID">
<span<?php echo $hr_payfrequency->HospID->viewAttributes() ?>>
<?php echo $hr_payfrequency->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_payfrequency_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_payfrequency->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_payfrequency_view->terminate();
?>