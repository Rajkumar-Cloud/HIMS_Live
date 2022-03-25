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
$pharmacy_combination_view = new pharmacy_combination_view();

// Run the page
$pharmacy_combination_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_combination_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_combination->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_combinationview = currentForm = new ew.Form("fpharmacy_combinationview", "view");

// Form_CustomValidate event
fpharmacy_combinationview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_combinationview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_combinationview.lists["x_GENCODE"] = <?php echo $pharmacy_combination_view->GENCODE->Lookup->toClientList() ?>;
fpharmacy_combinationview.lists["x_GENCODE"].options = <?php echo JsonEncode($pharmacy_combination_view->GENCODE->lookupOptions()) ?>;
fpharmacy_combinationview.lists["x_COMBCODE"] = <?php echo $pharmacy_combination_view->COMBCODE->Lookup->toClientList() ?>;
fpharmacy_combinationview.lists["x_COMBCODE"].options = <?php echo JsonEncode($pharmacy_combination_view->COMBCODE->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_combination->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_combination_view->ExportOptions->render("body") ?>
<?php $pharmacy_combination_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_combination_view->showPageHeader(); ?>
<?php
$pharmacy_combination_view->showMessage();
?>
<form name="fpharmacy_combinationview" id="fpharmacy_combinationview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_combination_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_combination_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_combination">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_combination_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_combination->GENCODE->Visible) { // GENCODE ?>
	<tr id="r_GENCODE">
		<td class="<?php echo $pharmacy_combination_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_combination_GENCODE"><?php echo $pharmacy_combination->GENCODE->caption() ?></span></td>
		<td data-name="GENCODE"<?php echo $pharmacy_combination->GENCODE->cellAttributes() ?>>
<span id="el_pharmacy_combination_GENCODE">
<span<?php echo $pharmacy_combination->GENCODE->viewAttributes() ?>>
<?php echo $pharmacy_combination->GENCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_combination->COMBCODE->Visible) { // COMBCODE ?>
	<tr id="r_COMBCODE">
		<td class="<?php echo $pharmacy_combination_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_combination_COMBCODE"><?php echo $pharmacy_combination->COMBCODE->caption() ?></span></td>
		<td data-name="COMBCODE"<?php echo $pharmacy_combination->COMBCODE->cellAttributes() ?>>
<span id="el_pharmacy_combination_COMBCODE">
<span<?php echo $pharmacy_combination->COMBCODE->viewAttributes() ?>>
<?php echo $pharmacy_combination->COMBCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_combination->STRENGTH->Visible) { // STRENGTH ?>
	<tr id="r_STRENGTH">
		<td class="<?php echo $pharmacy_combination_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_combination_STRENGTH"><?php echo $pharmacy_combination->STRENGTH->caption() ?></span></td>
		<td data-name="STRENGTH"<?php echo $pharmacy_combination->STRENGTH->cellAttributes() ?>>
<span id="el_pharmacy_combination_STRENGTH">
<span<?php echo $pharmacy_combination->STRENGTH->viewAttributes() ?>>
<?php echo $pharmacy_combination->STRENGTH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_combination->SLNO->Visible) { // SLNO ?>
	<tr id="r_SLNO">
		<td class="<?php echo $pharmacy_combination_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_combination_SLNO"><?php echo $pharmacy_combination->SLNO->caption() ?></span></td>
		<td data-name="SLNO"<?php echo $pharmacy_combination->SLNO->cellAttributes() ?>>
<span id="el_pharmacy_combination_SLNO">
<span<?php echo $pharmacy_combination->SLNO->viewAttributes() ?>>
<?php echo $pharmacy_combination->SLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_combination->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_combination_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_combination_id"><?php echo $pharmacy_combination->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pharmacy_combination->id->cellAttributes() ?>>
<span id="el_pharmacy_combination_id">
<span<?php echo $pharmacy_combination->id->viewAttributes() ?>>
<?php echo $pharmacy_combination->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_combination_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_combination->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_combination_view->terminate();
?>