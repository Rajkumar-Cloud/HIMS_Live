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
$hr_salarycomponenttype_view = new hr_salarycomponenttype_view();

// Run the page
$hr_salarycomponenttype_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_salarycomponenttype_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_salarycomponenttype->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_salarycomponenttypeview = currentForm = new ew.Form("fhr_salarycomponenttypeview", "view");

// Form_CustomValidate event
fhr_salarycomponenttypeview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_salarycomponenttypeview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_salarycomponenttype->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_salarycomponenttype_view->ExportOptions->render("body") ?>
<?php $hr_salarycomponenttype_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_salarycomponenttype_view->showPageHeader(); ?>
<?php
$hr_salarycomponenttype_view->showMessage();
?>
<form name="fhr_salarycomponenttypeview" id="fhr_salarycomponenttypeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_salarycomponenttype_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_salarycomponenttype_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_salarycomponenttype">
<input type="hidden" name="modal" value="<?php echo (int)$hr_salarycomponenttype_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_salarycomponenttype->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_salarycomponenttype_view->TableLeftColumnClass ?>"><span id="elh_hr_salarycomponenttype_id"><?php echo $hr_salarycomponenttype->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_salarycomponenttype->id->cellAttributes() ?>>
<span id="el_hr_salarycomponenttype_id">
<span<?php echo $hr_salarycomponenttype->id->viewAttributes() ?>>
<?php echo $hr_salarycomponenttype->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_salarycomponenttype->code->Visible) { // code ?>
	<tr id="r_code">
		<td class="<?php echo $hr_salarycomponenttype_view->TableLeftColumnClass ?>"><span id="elh_hr_salarycomponenttype_code"><?php echo $hr_salarycomponenttype->code->caption() ?></span></td>
		<td data-name="code"<?php echo $hr_salarycomponenttype->code->cellAttributes() ?>>
<span id="el_hr_salarycomponenttype_code">
<span<?php echo $hr_salarycomponenttype->code->viewAttributes() ?>>
<?php echo $hr_salarycomponenttype->code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_salarycomponenttype->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_salarycomponenttype_view->TableLeftColumnClass ?>"><span id="elh_hr_salarycomponenttype_name"><?php echo $hr_salarycomponenttype->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_salarycomponenttype->name->cellAttributes() ?>>
<span id="el_hr_salarycomponenttype_name">
<span<?php echo $hr_salarycomponenttype->name->viewAttributes() ?>>
<?php echo $hr_salarycomponenttype->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_salarycomponenttype->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_salarycomponenttype_view->TableLeftColumnClass ?>"><span id="elh_hr_salarycomponenttype_HospID"><?php echo $hr_salarycomponenttype->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_salarycomponenttype->HospID->cellAttributes() ?>>
<span id="el_hr_salarycomponenttype_HospID">
<span<?php echo $hr_salarycomponenttype->HospID->viewAttributes() ?>>
<?php echo $hr_salarycomponenttype->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_salarycomponenttype_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_salarycomponenttype->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_salarycomponenttype_view->terminate();
?>