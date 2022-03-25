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
$payroll_deductiongroup_view = new payroll_deductiongroup_view();

// Run the page
$payroll_deductiongroup_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$payroll_deductiongroup_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$payroll_deductiongroup->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpayroll_deductiongroupview = currentForm = new ew.Form("fpayroll_deductiongroupview", "view");

// Form_CustomValidate event
fpayroll_deductiongroupview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpayroll_deductiongroupview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$payroll_deductiongroup->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $payroll_deductiongroup_view->ExportOptions->render("body") ?>
<?php $payroll_deductiongroup_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $payroll_deductiongroup_view->showPageHeader(); ?>
<?php
$payroll_deductiongroup_view->showMessage();
?>
<form name="fpayroll_deductiongroupview" id="fpayroll_deductiongroupview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($payroll_deductiongroup_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $payroll_deductiongroup_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="payroll_deductiongroup">
<input type="hidden" name="modal" value="<?php echo (int)$payroll_deductiongroup_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($payroll_deductiongroup->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $payroll_deductiongroup_view->TableLeftColumnClass ?>"><span id="elh_payroll_deductiongroup_id"><?php echo $payroll_deductiongroup->id->caption() ?></span></td>
		<td data-name="id"<?php echo $payroll_deductiongroup->id->cellAttributes() ?>>
<span id="el_payroll_deductiongroup_id">
<span<?php echo $payroll_deductiongroup->id->viewAttributes() ?>>
<?php echo $payroll_deductiongroup->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($payroll_deductiongroup->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $payroll_deductiongroup_view->TableLeftColumnClass ?>"><span id="elh_payroll_deductiongroup_name"><?php echo $payroll_deductiongroup->name->caption() ?></span></td>
		<td data-name="name"<?php echo $payroll_deductiongroup->name->cellAttributes() ?>>
<span id="el_payroll_deductiongroup_name">
<span<?php echo $payroll_deductiongroup->name->viewAttributes() ?>>
<?php echo $payroll_deductiongroup->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($payroll_deductiongroup->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $payroll_deductiongroup_view->TableLeftColumnClass ?>"><span id="elh_payroll_deductiongroup_description"><?php echo $payroll_deductiongroup->description->caption() ?></span></td>
		<td data-name="description"<?php echo $payroll_deductiongroup->description->cellAttributes() ?>>
<span id="el_payroll_deductiongroup_description">
<span<?php echo $payroll_deductiongroup->description->viewAttributes() ?>>
<?php echo $payroll_deductiongroup->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$payroll_deductiongroup_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$payroll_deductiongroup->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$payroll_deductiongroup_view->terminate();
?>