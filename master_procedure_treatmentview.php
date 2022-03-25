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
$master_procedure_treatment_view = new master_procedure_treatment_view();

// Run the page
$master_procedure_treatment_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_procedure_treatment_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$master_procedure_treatment->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmaster_procedure_treatmentview = currentForm = new ew.Form("fmaster_procedure_treatmentview", "view");

// Form_CustomValidate event
fmaster_procedure_treatmentview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmaster_procedure_treatmentview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$master_procedure_treatment->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $master_procedure_treatment_view->ExportOptions->render("body") ?>
<?php $master_procedure_treatment_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $master_procedure_treatment_view->showPageHeader(); ?>
<?php
$master_procedure_treatment_view->showMessage();
?>
<form name="fmaster_procedure_treatmentview" id="fmaster_procedure_treatmentview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($master_procedure_treatment_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $master_procedure_treatment_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_procedure_treatment">
<input type="hidden" name="modal" value="<?php echo (int)$master_procedure_treatment_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($master_procedure_treatment->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $master_procedure_treatment_view->TableLeftColumnClass ?>"><span id="elh_master_procedure_treatment_id"><?php echo $master_procedure_treatment->id->caption() ?></span></td>
		<td data-name="id"<?php echo $master_procedure_treatment->id->cellAttributes() ?>>
<span id="el_master_procedure_treatment_id">
<span<?php echo $master_procedure_treatment->id->viewAttributes() ?>>
<?php echo $master_procedure_treatment->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_procedure_treatment->Treatment->Visible) { // Treatment ?>
	<tr id="r_Treatment">
		<td class="<?php echo $master_procedure_treatment_view->TableLeftColumnClass ?>"><span id="elh_master_procedure_treatment_Treatment"><?php echo $master_procedure_treatment->Treatment->caption() ?></span></td>
		<td data-name="Treatment"<?php echo $master_procedure_treatment->Treatment->cellAttributes() ?>>
<span id="el_master_procedure_treatment_Treatment">
<span<?php echo $master_procedure_treatment->Treatment->viewAttributes() ?>>
<?php echo $master_procedure_treatment->Treatment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($master_procedure_treatment->Procedure->Visible) { // Procedure ?>
	<tr id="r_Procedure">
		<td class="<?php echo $master_procedure_treatment_view->TableLeftColumnClass ?>"><span id="elh_master_procedure_treatment_Procedure"><?php echo $master_procedure_treatment->Procedure->caption() ?></span></td>
		<td data-name="Procedure"<?php echo $master_procedure_treatment->Procedure->cellAttributes() ?>>
<span id="el_master_procedure_treatment_Procedure">
<span<?php echo $master_procedure_treatment->Procedure->viewAttributes() ?>>
<?php echo $master_procedure_treatment->Procedure->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$master_procedure_treatment_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$master_procedure_treatment->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$master_procedure_treatment_view->terminate();
?>