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
$pharmacy_master_product_similar_view = new pharmacy_master_product_similar_view();

// Run the page
$pharmacy_master_product_similar_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_product_similar_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_master_product_similar->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_master_product_similarview = currentForm = new ew.Form("fpharmacy_master_product_similarview", "view");

// Form_CustomValidate event
fpharmacy_master_product_similarview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_master_product_similarview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_master_product_similar->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_master_product_similar_view->ExportOptions->render("body") ?>
<?php $pharmacy_master_product_similar_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_master_product_similar_view->showPageHeader(); ?>
<?php
$pharmacy_master_product_similar_view->showMessage();
?>
<form name="fpharmacy_master_product_similarview" id="fpharmacy_master_product_similarview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_master_product_similar_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_master_product_similar_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_product_similar">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_master_product_similar_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_master_product_similar->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $pharmacy_master_product_similar_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_product_similar_PRC"><?php echo $pharmacy_master_product_similar->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $pharmacy_master_product_similar->PRC->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_PRC">
<span<?php echo $pharmacy_master_product_similar->PRC->viewAttributes() ?>>
<?php echo $pharmacy_master_product_similar->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_master_product_similar->MAINPRC->Visible) { // MAINPRC ?>
	<tr id="r_MAINPRC">
		<td class="<?php echo $pharmacy_master_product_similar_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_product_similar_MAINPRC"><?php echo $pharmacy_master_product_similar->MAINPRC->caption() ?></span></td>
		<td data-name="MAINPRC"<?php echo $pharmacy_master_product_similar->MAINPRC->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_MAINPRC">
<span<?php echo $pharmacy_master_product_similar->MAINPRC->viewAttributes() ?>>
<?php echo $pharmacy_master_product_similar->MAINPRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_master_product_similar->PRTYPE->Visible) { // PRTYPE ?>
	<tr id="r_PRTYPE">
		<td class="<?php echo $pharmacy_master_product_similar_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_product_similar_PRTYPE"><?php echo $pharmacy_master_product_similar->PRTYPE->caption() ?></span></td>
		<td data-name="PRTYPE"<?php echo $pharmacy_master_product_similar->PRTYPE->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_PRTYPE">
<span<?php echo $pharmacy_master_product_similar->PRTYPE->viewAttributes() ?>>
<?php echo $pharmacy_master_product_similar->PRTYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_master_product_similar->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_master_product_similar_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_product_similar_id"><?php echo $pharmacy_master_product_similar->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pharmacy_master_product_similar->id->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_id">
<span<?php echo $pharmacy_master_product_similar->id->viewAttributes() ?>>
<?php echo $pharmacy_master_product_similar->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_master_product_similar_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_master_product_similar->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_master_product_similar_view->terminate();
?>