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
$pres_trade_combination_names_view = new pres_trade_combination_names_view();

// Run the page
$pres_trade_combination_names_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_trade_combination_names_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_trade_combination_names->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpres_trade_combination_namesview = currentForm = new ew.Form("fpres_trade_combination_namesview", "view");

// Form_CustomValidate event
fpres_trade_combination_namesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_trade_combination_namesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pres_trade_combination_names->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_trade_combination_names_view->ExportOptions->render("body") ?>
<?php $pres_trade_combination_names_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_trade_combination_names_view->showPageHeader(); ?>
<?php
$pres_trade_combination_names_view->showMessage();
?>
<form name="fpres_trade_combination_namesview" id="fpres_trade_combination_namesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_trade_combination_names_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_trade_combination_names_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_trade_combination_names">
<input type="hidden" name="modal" value="<?php echo (int)$pres_trade_combination_names_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_trade_combination_names->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_trade_combination_names_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_id"><?php echo $pres_trade_combination_names->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pres_trade_combination_names->id->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_id">
<span<?php echo $pres_trade_combination_names->id->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names->tradenames_id->Visible) { // tradenames_id ?>
	<tr id="r_tradenames_id">
		<td class="<?php echo $pres_trade_combination_names_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_tradenames_id"><?php echo $pres_trade_combination_names->tradenames_id->caption() ?></span></td>
		<td data-name="tradenames_id"<?php echo $pres_trade_combination_names->tradenames_id->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_tradenames_id">
<span<?php echo $pres_trade_combination_names->tradenames_id->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->tradenames_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names->GENERIC_NAMES->Visible) { // GENERIC_NAMES ?>
	<tr id="r_GENERIC_NAMES">
		<td class="<?php echo $pres_trade_combination_names_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_GENERIC_NAMES"><?php echo $pres_trade_combination_names->GENERIC_NAMES->caption() ?></span></td>
		<td data-name="GENERIC_NAMES"<?php echo $pres_trade_combination_names->GENERIC_NAMES->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_GENERIC_NAMES">
<span<?php echo $pres_trade_combination_names->GENERIC_NAMES->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->GENERIC_NAMES->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names->TRADE_NAME->Visible) { // TRADE_NAME ?>
	<tr id="r_TRADE_NAME">
		<td class="<?php echo $pres_trade_combination_names_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_TRADE_NAME"><?php echo $pres_trade_combination_names->TRADE_NAME->caption() ?></span></td>
		<td data-name="TRADE_NAME"<?php echo $pres_trade_combination_names->TRADE_NAME->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_TRADE_NAME">
<span<?php echo $pres_trade_combination_names->TRADE_NAME->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->TRADE_NAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names->Drug_Name->Visible) { // Drug_Name ?>
	<tr id="r_Drug_Name">
		<td class="<?php echo $pres_trade_combination_names_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_Drug_Name"><?php echo $pres_trade_combination_names->Drug_Name->caption() ?></span></td>
		<td data-name="Drug_Name"<?php echo $pres_trade_combination_names->Drug_Name->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_Drug_Name">
<span<?php echo $pres_trade_combination_names->Drug_Name->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->Drug_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names->PR_CODE->Visible) { // PR_CODE ?>
	<tr id="r_PR_CODE">
		<td class="<?php echo $pres_trade_combination_names_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_PR_CODE"><?php echo $pres_trade_combination_names->PR_CODE->caption() ?></span></td>
		<td data-name="PR_CODE"<?php echo $pres_trade_combination_names->PR_CODE->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_PR_CODE">
<span<?php echo $pres_trade_combination_names->PR_CODE->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->PR_CODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names->GenericNames_symbols->Visible) { // GenericNames_symbols ?>
	<tr id="r_GenericNames_symbols">
		<td class="<?php echo $pres_trade_combination_names_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_GenericNames_symbols"><?php echo $pres_trade_combination_names->GenericNames_symbols->caption() ?></span></td>
		<td data-name="GenericNames_symbols"<?php echo $pres_trade_combination_names->GenericNames_symbols->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_GenericNames_symbols">
<span<?php echo $pres_trade_combination_names->GenericNames_symbols->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->GenericNames_symbols->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
	<tr id="r_CONTAINER_TYPE">
		<td class="<?php echo $pres_trade_combination_names_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_CONTAINER_TYPE"><?php echo $pres_trade_combination_names->CONTAINER_TYPE->caption() ?></span></td>
		<td data-name="CONTAINER_TYPE"<?php echo $pres_trade_combination_names->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_CONTAINER_TYPE">
<span<?php echo $pres_trade_combination_names->CONTAINER_TYPE->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names->STRENGTH->Visible) { // STRENGTH ?>
	<tr id="r_STRENGTH">
		<td class="<?php echo $pres_trade_combination_names_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_STRENGTH"><?php echo $pres_trade_combination_names->STRENGTH->caption() ?></span></td>
		<td data-name="STRENGTH"<?php echo $pres_trade_combination_names->STRENGTH->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_STRENGTH">
<span<?php echo $pres_trade_combination_names->STRENGTH->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->STRENGTH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_trade_combination_names_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_trade_combination_names->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_trade_combination_names_view->terminate();
?>