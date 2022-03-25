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
$hr_expensespaymentmethods_view = new hr_expensespaymentmethods_view();

// Run the page
$hr_expensespaymentmethods_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_expensespaymentmethods_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_expensespaymentmethods->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_expensespaymentmethodsview = currentForm = new ew.Form("fhr_expensespaymentmethodsview", "view");

// Form_CustomValidate event
fhr_expensespaymentmethodsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_expensespaymentmethodsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_expensespaymentmethods->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_expensespaymentmethods_view->ExportOptions->render("body") ?>
<?php $hr_expensespaymentmethods_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_expensespaymentmethods_view->showPageHeader(); ?>
<?php
$hr_expensespaymentmethods_view->showMessage();
?>
<form name="fhr_expensespaymentmethodsview" id="fhr_expensespaymentmethodsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_expensespaymentmethods_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_expensespaymentmethods_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_expensespaymentmethods">
<input type="hidden" name="modal" value="<?php echo (int)$hr_expensespaymentmethods_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_expensespaymentmethods->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_expensespaymentmethods_view->TableLeftColumnClass ?>"><span id="elh_hr_expensespaymentmethods_id"><?php echo $hr_expensespaymentmethods->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_expensespaymentmethods->id->cellAttributes() ?>>
<span id="el_hr_expensespaymentmethods_id">
<span<?php echo $hr_expensespaymentmethods->id->viewAttributes() ?>>
<?php echo $hr_expensespaymentmethods->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_expensespaymentmethods->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_expensespaymentmethods_view->TableLeftColumnClass ?>"><span id="elh_hr_expensespaymentmethods_name"><?php echo $hr_expensespaymentmethods->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_expensespaymentmethods->name->cellAttributes() ?>>
<span id="el_hr_expensespaymentmethods_name">
<span<?php echo $hr_expensespaymentmethods->name->viewAttributes() ?>>
<?php echo $hr_expensespaymentmethods->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_expensespaymentmethods->created->Visible) { // created ?>
	<tr id="r_created">
		<td class="<?php echo $hr_expensespaymentmethods_view->TableLeftColumnClass ?>"><span id="elh_hr_expensespaymentmethods_created"><?php echo $hr_expensespaymentmethods->created->caption() ?></span></td>
		<td data-name="created"<?php echo $hr_expensespaymentmethods->created->cellAttributes() ?>>
<span id="el_hr_expensespaymentmethods_created">
<span<?php echo $hr_expensespaymentmethods->created->viewAttributes() ?>>
<?php echo $hr_expensespaymentmethods->created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_expensespaymentmethods->updated->Visible) { // updated ?>
	<tr id="r_updated">
		<td class="<?php echo $hr_expensespaymentmethods_view->TableLeftColumnClass ?>"><span id="elh_hr_expensespaymentmethods_updated"><?php echo $hr_expensespaymentmethods->updated->caption() ?></span></td>
		<td data-name="updated"<?php echo $hr_expensespaymentmethods->updated->cellAttributes() ?>>
<span id="el_hr_expensespaymentmethods_updated">
<span<?php echo $hr_expensespaymentmethods->updated->viewAttributes() ?>>
<?php echo $hr_expensespaymentmethods->updated->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_expensespaymentmethods->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_expensespaymentmethods_view->TableLeftColumnClass ?>"><span id="elh_hr_expensespaymentmethods_HospID"><?php echo $hr_expensespaymentmethods->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_expensespaymentmethods->HospID->cellAttributes() ?>>
<span id="el_hr_expensespaymentmethods_HospID">
<span<?php echo $hr_expensespaymentmethods->HospID->viewAttributes() ?>>
<?php echo $hr_expensespaymentmethods->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_expensespaymentmethods_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_expensespaymentmethods->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_expensespaymentmethods_view->terminate();
?>