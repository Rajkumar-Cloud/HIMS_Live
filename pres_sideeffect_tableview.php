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
$pres_sideeffect_table_view = new pres_sideeffect_table_view();

// Run the page
$pres_sideeffect_table_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_sideeffect_table_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_sideeffect_table->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpres_sideeffect_tableview = currentForm = new ew.Form("fpres_sideeffect_tableview", "view");

// Form_CustomValidate event
fpres_sideeffect_tableview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_sideeffect_tableview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pres_sideeffect_table->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_sideeffect_table_view->ExportOptions->render("body") ?>
<?php $pres_sideeffect_table_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_sideeffect_table_view->showPageHeader(); ?>
<?php
$pres_sideeffect_table_view->showMessage();
?>
<form name="fpres_sideeffect_tableview" id="fpres_sideeffect_tableview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_sideeffect_table_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_sideeffect_table_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_sideeffect_table">
<input type="hidden" name="modal" value="<?php echo (int)$pres_sideeffect_table_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_sideeffect_table->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_sideeffect_table_view->TableLeftColumnClass ?>"><span id="elh_pres_sideeffect_table_id"><?php echo $pres_sideeffect_table->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pres_sideeffect_table->id->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_id">
<span<?php echo $pres_sideeffect_table->id->viewAttributes() ?>>
<?php echo $pres_sideeffect_table->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_sideeffect_table->Genericname->Visible) { // Genericname ?>
	<tr id="r_Genericname">
		<td class="<?php echo $pres_sideeffect_table_view->TableLeftColumnClass ?>"><span id="elh_pres_sideeffect_table_Genericname"><?php echo $pres_sideeffect_table->Genericname->caption() ?></span></td>
		<td data-name="Genericname"<?php echo $pres_sideeffect_table->Genericname->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_Genericname">
<span<?php echo $pres_sideeffect_table->Genericname->viewAttributes() ?>>
<?php echo $pres_sideeffect_table->Genericname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_sideeffect_table->SideEffects->Visible) { // SideEffects ?>
	<tr id="r_SideEffects">
		<td class="<?php echo $pres_sideeffect_table_view->TableLeftColumnClass ?>"><span id="elh_pres_sideeffect_table_SideEffects"><?php echo $pres_sideeffect_table->SideEffects->caption() ?></span></td>
		<td data-name="SideEffects"<?php echo $pres_sideeffect_table->SideEffects->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_SideEffects">
<span<?php echo $pres_sideeffect_table->SideEffects->viewAttributes() ?>>
<?php echo $pres_sideeffect_table->SideEffects->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_sideeffect_table->Contraindications->Visible) { // Contraindications ?>
	<tr id="r_Contraindications">
		<td class="<?php echo $pres_sideeffect_table_view->TableLeftColumnClass ?>"><span id="elh_pres_sideeffect_table_Contraindications"><?php echo $pres_sideeffect_table->Contraindications->caption() ?></span></td>
		<td data-name="Contraindications"<?php echo $pres_sideeffect_table->Contraindications->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_Contraindications">
<span<?php echo $pres_sideeffect_table->Contraindications->viewAttributes() ?>>
<?php echo $pres_sideeffect_table->Contraindications->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_sideeffect_table_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_sideeffect_table->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_sideeffect_table_view->terminate();
?>