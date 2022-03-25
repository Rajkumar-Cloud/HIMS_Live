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
$pres_trade_combination_names_new_view = new pres_trade_combination_names_new_view();

// Run the page
$pres_trade_combination_names_new_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_trade_combination_names_new_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_trade_combination_names_new->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpres_trade_combination_names_newview = currentForm = new ew.Form("fpres_trade_combination_names_newview", "view");

// Form_CustomValidate event
fpres_trade_combination_names_newview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_trade_combination_names_newview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpres_trade_combination_names_newview.lists["x_Generic_Name"] = <?php echo $pres_trade_combination_names_new_view->Generic_Name->Lookup->toClientList() ?>;
fpres_trade_combination_names_newview.lists["x_Generic_Name"].options = <?php echo JsonEncode($pres_trade_combination_names_new_view->Generic_Name->lookupOptions()) ?>;
fpres_trade_combination_names_newview.lists["x_Form"] = <?php echo $pres_trade_combination_names_new_view->Form->Lookup->toClientList() ?>;
fpres_trade_combination_names_newview.lists["x_Form"].options = <?php echo JsonEncode($pres_trade_combination_names_new_view->Form->lookupOptions()) ?>;
fpres_trade_combination_names_newview.lists["x_Unit"] = <?php echo $pres_trade_combination_names_new_view->Unit->Lookup->toClientList() ?>;
fpres_trade_combination_names_newview.lists["x_Unit"].options = <?php echo JsonEncode($pres_trade_combination_names_new_view->Unit->lookupOptions()) ?>;
fpres_trade_combination_names_newview.lists["x_TypeOfDrug"] = <?php echo $pres_trade_combination_names_new_view->TypeOfDrug->Lookup->toClientList() ?>;
fpres_trade_combination_names_newview.lists["x_TypeOfDrug"].options = <?php echo JsonEncode($pres_trade_combination_names_new_view->TypeOfDrug->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pres_trade_combination_names_new->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_trade_combination_names_new_view->ExportOptions->render("body") ?>
<?php $pres_trade_combination_names_new_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_trade_combination_names_new_view->showPageHeader(); ?>
<?php
$pres_trade_combination_names_new_view->showMessage();
?>
<form name="fpres_trade_combination_names_newview" id="fpres_trade_combination_names_newview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_trade_combination_names_new_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_trade_combination_names_new_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_trade_combination_names_new">
<input type="hidden" name="modal" value="<?php echo (int)$pres_trade_combination_names_new_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_trade_combination_names_new->ID->Visible) { // ID ?>
	<tr id="r_ID">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_ID"><?php echo $pres_trade_combination_names_new->ID->caption() ?></span></td>
		<td data-name="ID"<?php echo $pres_trade_combination_names_new->ID->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_ID">
<span<?php echo $pres_trade_combination_names_new->ID->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->ID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new->tradenames_id->Visible) { // tradenames_id ?>
	<tr id="r_tradenames_id">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_tradenames_id"><?php echo $pres_trade_combination_names_new->tradenames_id->caption() ?></span></td>
		<td data-name="tradenames_id"<?php echo $pres_trade_combination_names_new->tradenames_id->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_tradenames_id">
<span<?php echo $pres_trade_combination_names_new->tradenames_id->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->tradenames_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new->Drug_Name->Visible) { // Drug_Name ?>
	<tr id="r_Drug_Name">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_Drug_Name"><?php echo $pres_trade_combination_names_new->Drug_Name->caption() ?></span></td>
		<td data-name="Drug_Name"<?php echo $pres_trade_combination_names_new->Drug_Name->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Drug_Name">
<span<?php echo $pres_trade_combination_names_new->Drug_Name->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->Drug_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new->Generic_Name->Visible) { // Generic_Name ?>
	<tr id="r_Generic_Name">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_Generic_Name"><?php echo $pres_trade_combination_names_new->Generic_Name->caption() ?></span></td>
		<td data-name="Generic_Name"<?php echo $pres_trade_combination_names_new->Generic_Name->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Generic_Name">
<span<?php echo $pres_trade_combination_names_new->Generic_Name->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->Generic_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new->Trade_Name->Visible) { // Trade_Name ?>
	<tr id="r_Trade_Name">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_Trade_Name"><?php echo $pres_trade_combination_names_new->Trade_Name->caption() ?></span></td>
		<td data-name="Trade_Name"<?php echo $pres_trade_combination_names_new->Trade_Name->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Trade_Name">
<span<?php echo $pres_trade_combination_names_new->Trade_Name->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->Trade_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new->PR_CODE->Visible) { // PR_CODE ?>
	<tr id="r_PR_CODE">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_PR_CODE"><?php echo $pres_trade_combination_names_new->PR_CODE->caption() ?></span></td>
		<td data-name="PR_CODE"<?php echo $pres_trade_combination_names_new->PR_CODE->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_PR_CODE">
<span<?php echo $pres_trade_combination_names_new->PR_CODE->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->PR_CODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new->Form->Visible) { // Form ?>
	<tr id="r_Form">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_Form"><?php echo $pres_trade_combination_names_new->Form->caption() ?></span></td>
		<td data-name="Form"<?php echo $pres_trade_combination_names_new->Form->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Form">
<span<?php echo $pres_trade_combination_names_new->Form->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->Form->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new->Strength->Visible) { // Strength ?>
	<tr id="r_Strength">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_Strength"><?php echo $pres_trade_combination_names_new->Strength->caption() ?></span></td>
		<td data-name="Strength"<?php echo $pres_trade_combination_names_new->Strength->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Strength">
<span<?php echo $pres_trade_combination_names_new->Strength->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->Strength->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new->Unit->Visible) { // Unit ?>
	<tr id="r_Unit">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_Unit"><?php echo $pres_trade_combination_names_new->Unit->caption() ?></span></td>
		<td data-name="Unit"<?php echo $pres_trade_combination_names_new->Unit->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Unit">
<span<?php echo $pres_trade_combination_names_new->Unit->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->Unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
	<tr id="r_CONTAINER_TYPE">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_CONTAINER_TYPE"><?php echo $pres_trade_combination_names_new->CONTAINER_TYPE->caption() ?></span></td>
		<td data-name="CONTAINER_TYPE"<?php echo $pres_trade_combination_names_new->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_CONTAINER_TYPE">
<span<?php echo $pres_trade_combination_names_new->CONTAINER_TYPE->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
	<tr id="r_CONTAINER_STRENGTH">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_CONTAINER_STRENGTH"><?php echo $pres_trade_combination_names_new->CONTAINER_STRENGTH->caption() ?></span></td>
		<td data-name="CONTAINER_STRENGTH"<?php echo $pres_trade_combination_names_new->CONTAINER_STRENGTH->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_CONTAINER_STRENGTH">
<span<?php echo $pres_trade_combination_names_new->CONTAINER_STRENGTH->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->CONTAINER_STRENGTH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new->TypeOfDrug->Visible) { // TypeOfDrug ?>
	<tr id="r_TypeOfDrug">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_TypeOfDrug"><?php echo $pres_trade_combination_names_new->TypeOfDrug->caption() ?></span></td>
		<td data-name="TypeOfDrug"<?php echo $pres_trade_combination_names_new->TypeOfDrug->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_TypeOfDrug">
<span<?php echo $pres_trade_combination_names_new->TypeOfDrug->viewAttributes() ?>>
<?php echo $pres_trade_combination_names_new->TypeOfDrug->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_trade_combination_names_new_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_trade_combination_names_new->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_trade_combination_names_new_view->terminate();
?>