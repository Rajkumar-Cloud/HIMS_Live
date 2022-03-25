<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$pres_trade_combination_names_new_delete = new pres_trade_combination_names_new_delete();

// Run the page
$pres_trade_combination_names_new_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_trade_combination_names_new_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_trade_combination_names_newdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpres_trade_combination_names_newdelete = currentForm = new ew.Form("fpres_trade_combination_names_newdelete", "delete");
	loadjs.done("fpres_trade_combination_names_newdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_trade_combination_names_new_delete->showPageHeader(); ?>
<?php
$pres_trade_combination_names_new_delete->showMessage();
?>
<form name="fpres_trade_combination_names_newdelete" id="fpres_trade_combination_names_newdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_trade_combination_names_new">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_trade_combination_names_new_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_trade_combination_names_new_delete->ID->Visible) { // ID ?>
		<th class="<?php echo $pres_trade_combination_names_new_delete->ID->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_ID" class="pres_trade_combination_names_new_ID"><?php echo $pres_trade_combination_names_new_delete->ID->caption() ?></span></th>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->tradenames_id->Visible) { // tradenames_id ?>
		<th class="<?php echo $pres_trade_combination_names_new_delete->tradenames_id->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_tradenames_id" class="pres_trade_combination_names_new_tradenames_id"><?php echo $pres_trade_combination_names_new_delete->tradenames_id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->Drug_Name->Visible) { // Drug_Name ?>
		<th class="<?php echo $pres_trade_combination_names_new_delete->Drug_Name->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_Drug_Name" class="pres_trade_combination_names_new_Drug_Name"><?php echo $pres_trade_combination_names_new_delete->Drug_Name->caption() ?></span></th>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->Generic_Name->Visible) { // Generic_Name ?>
		<th class="<?php echo $pres_trade_combination_names_new_delete->Generic_Name->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_Generic_Name" class="pres_trade_combination_names_new_Generic_Name"><?php echo $pres_trade_combination_names_new_delete->Generic_Name->caption() ?></span></th>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->Trade_Name->Visible) { // Trade_Name ?>
		<th class="<?php echo $pres_trade_combination_names_new_delete->Trade_Name->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_Trade_Name" class="pres_trade_combination_names_new_Trade_Name"><?php echo $pres_trade_combination_names_new_delete->Trade_Name->caption() ?></span></th>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->PR_CODE->Visible) { // PR_CODE ?>
		<th class="<?php echo $pres_trade_combination_names_new_delete->PR_CODE->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_PR_CODE" class="pres_trade_combination_names_new_PR_CODE"><?php echo $pres_trade_combination_names_new_delete->PR_CODE->caption() ?></span></th>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->Form->Visible) { // Form ?>
		<th class="<?php echo $pres_trade_combination_names_new_delete->Form->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_Form" class="pres_trade_combination_names_new_Form"><?php echo $pres_trade_combination_names_new_delete->Form->caption() ?></span></th>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->Strength->Visible) { // Strength ?>
		<th class="<?php echo $pres_trade_combination_names_new_delete->Strength->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_Strength" class="pres_trade_combination_names_new_Strength"><?php echo $pres_trade_combination_names_new_delete->Strength->caption() ?></span></th>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->Unit->Visible) { // Unit ?>
		<th class="<?php echo $pres_trade_combination_names_new_delete->Unit->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_Unit" class="pres_trade_combination_names_new_Unit"><?php echo $pres_trade_combination_names_new_delete->Unit->caption() ?></span></th>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
		<th class="<?php echo $pres_trade_combination_names_new_delete->CONTAINER_TYPE->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_CONTAINER_TYPE" class="pres_trade_combination_names_new_CONTAINER_TYPE"><?php echo $pres_trade_combination_names_new_delete->CONTAINER_TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
		<th class="<?php echo $pres_trade_combination_names_new_delete->CONTAINER_STRENGTH->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="pres_trade_combination_names_new_CONTAINER_STRENGTH"><?php echo $pres_trade_combination_names_new_delete->CONTAINER_STRENGTH->caption() ?></span></th>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->TypeOfDrug->Visible) { // TypeOfDrug ?>
		<th class="<?php echo $pres_trade_combination_names_new_delete->TypeOfDrug->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_TypeOfDrug" class="pres_trade_combination_names_new_TypeOfDrug"><?php echo $pres_trade_combination_names_new_delete->TypeOfDrug->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_trade_combination_names_new_delete->RecordCount = 0;
$i = 0;
while (!$pres_trade_combination_names_new_delete->Recordset->EOF) {
	$pres_trade_combination_names_new_delete->RecordCount++;
	$pres_trade_combination_names_new_delete->RowCount++;

	// Set row properties
	$pres_trade_combination_names_new->resetAttributes();
	$pres_trade_combination_names_new->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_trade_combination_names_new_delete->loadRowValues($pres_trade_combination_names_new_delete->Recordset);

	// Render row
	$pres_trade_combination_names_new_delete->renderRow();
?>
	<tr <?php echo $pres_trade_combination_names_new->rowAttributes() ?>>
<?php if ($pres_trade_combination_names_new_delete->ID->Visible) { // ID ?>
		<td <?php echo $pres_trade_combination_names_new_delete->ID->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_new_delete->RowCount ?>_pres_trade_combination_names_new_ID" class="pres_trade_combination_names_new_ID">
<span<?php echo $pres_trade_combination_names_new_delete->ID->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_delete->ID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->tradenames_id->Visible) { // tradenames_id ?>
		<td <?php echo $pres_trade_combination_names_new_delete->tradenames_id->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_new_delete->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="pres_trade_combination_names_new_tradenames_id">
<span<?php echo $pres_trade_combination_names_new_delete->tradenames_id->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_delete->tradenames_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->Drug_Name->Visible) { // Drug_Name ?>
		<td <?php echo $pres_trade_combination_names_new_delete->Drug_Name->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_new_delete->RowCount ?>_pres_trade_combination_names_new_Drug_Name" class="pres_trade_combination_names_new_Drug_Name">
<span<?php echo $pres_trade_combination_names_new_delete->Drug_Name->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_delete->Drug_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->Generic_Name->Visible) { // Generic_Name ?>
		<td <?php echo $pres_trade_combination_names_new_delete->Generic_Name->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_new_delete->RowCount ?>_pres_trade_combination_names_new_Generic_Name" class="pres_trade_combination_names_new_Generic_Name">
<span<?php echo $pres_trade_combination_names_new_delete->Generic_Name->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_delete->Generic_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->Trade_Name->Visible) { // Trade_Name ?>
		<td <?php echo $pres_trade_combination_names_new_delete->Trade_Name->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_new_delete->RowCount ?>_pres_trade_combination_names_new_Trade_Name" class="pres_trade_combination_names_new_Trade_Name">
<span<?php echo $pres_trade_combination_names_new_delete->Trade_Name->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_delete->Trade_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->PR_CODE->Visible) { // PR_CODE ?>
		<td <?php echo $pres_trade_combination_names_new_delete->PR_CODE->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_new_delete->RowCount ?>_pres_trade_combination_names_new_PR_CODE" class="pres_trade_combination_names_new_PR_CODE">
<span<?php echo $pres_trade_combination_names_new_delete->PR_CODE->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_delete->PR_CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->Form->Visible) { // Form ?>
		<td <?php echo $pres_trade_combination_names_new_delete->Form->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_new_delete->RowCount ?>_pres_trade_combination_names_new_Form" class="pres_trade_combination_names_new_Form">
<span<?php echo $pres_trade_combination_names_new_delete->Form->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_delete->Form->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->Strength->Visible) { // Strength ?>
		<td <?php echo $pres_trade_combination_names_new_delete->Strength->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_new_delete->RowCount ?>_pres_trade_combination_names_new_Strength" class="pres_trade_combination_names_new_Strength">
<span<?php echo $pres_trade_combination_names_new_delete->Strength->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_delete->Strength->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->Unit->Visible) { // Unit ?>
		<td <?php echo $pres_trade_combination_names_new_delete->Unit->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_new_delete->RowCount ?>_pres_trade_combination_names_new_Unit" class="pres_trade_combination_names_new_Unit">
<span<?php echo $pres_trade_combination_names_new_delete->Unit->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_delete->Unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
		<td <?php echo $pres_trade_combination_names_new_delete->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_new_delete->RowCount ?>_pres_trade_combination_names_new_CONTAINER_TYPE" class="pres_trade_combination_names_new_CONTAINER_TYPE">
<span<?php echo $pres_trade_combination_names_new_delete->CONTAINER_TYPE->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_delete->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
		<td <?php echo $pres_trade_combination_names_new_delete->CONTAINER_STRENGTH->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_new_delete->RowCount ?>_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="pres_trade_combination_names_new_CONTAINER_STRENGTH">
<span<?php echo $pres_trade_combination_names_new_delete->CONTAINER_STRENGTH->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_delete->CONTAINER_STRENGTH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names_new_delete->TypeOfDrug->Visible) { // TypeOfDrug ?>
		<td <?php echo $pres_trade_combination_names_new_delete->TypeOfDrug->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_new_delete->RowCount ?>_pres_trade_combination_names_new_TypeOfDrug" class="pres_trade_combination_names_new_TypeOfDrug">
<span<?php echo $pres_trade_combination_names_new_delete->TypeOfDrug->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_delete->TypeOfDrug->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_trade_combination_names_new_delete->Recordset->moveNext();
}
$pres_trade_combination_names_new_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_trade_combination_names_new_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_trade_combination_names_new_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$pres_trade_combination_names_new_delete->terminate();
?>