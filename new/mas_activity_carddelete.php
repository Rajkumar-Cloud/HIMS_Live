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
$mas_activity_card_delete = new mas_activity_card_delete();

// Run the page
$mas_activity_card_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_activity_card_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_activity_carddelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmas_activity_carddelete = currentForm = new ew.Form("fmas_activity_carddelete", "delete");
	loadjs.done("fmas_activity_carddelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_activity_card_delete->showPageHeader(); ?>
<?php
$mas_activity_card_delete->showMessage();
?>
<form name="fmas_activity_carddelete" id="fmas_activity_carddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_activity_card">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_activity_card_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_activity_card_delete->id->Visible) { // id ?>
		<th class="<?php echo $mas_activity_card_delete->id->headerCellClass() ?>"><span id="elh_mas_activity_card_id" class="mas_activity_card_id"><?php echo $mas_activity_card_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_activity_card_delete->Activity->Visible) { // Activity ?>
		<th class="<?php echo $mas_activity_card_delete->Activity->headerCellClass() ?>"><span id="elh_mas_activity_card_Activity" class="mas_activity_card_Activity"><?php echo $mas_activity_card_delete->Activity->caption() ?></span></th>
<?php } ?>
<?php if ($mas_activity_card_delete->Type->Visible) { // Type ?>
		<th class="<?php echo $mas_activity_card_delete->Type->headerCellClass() ?>"><span id="elh_mas_activity_card_Type" class="mas_activity_card_Type"><?php echo $mas_activity_card_delete->Type->caption() ?></span></th>
<?php } ?>
<?php if ($mas_activity_card_delete->Units->Visible) { // Units ?>
		<th class="<?php echo $mas_activity_card_delete->Units->headerCellClass() ?>"><span id="elh_mas_activity_card_Units" class="mas_activity_card_Units"><?php echo $mas_activity_card_delete->Units->caption() ?></span></th>
<?php } ?>
<?php if ($mas_activity_card_delete->Amount->Visible) { // Amount ?>
		<th class="<?php echo $mas_activity_card_delete->Amount->headerCellClass() ?>"><span id="elh_mas_activity_card_Amount" class="mas_activity_card_Amount"><?php echo $mas_activity_card_delete->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($mas_activity_card_delete->Selected->Visible) { // Selected ?>
		<th class="<?php echo $mas_activity_card_delete->Selected->headerCellClass() ?>"><span id="elh_mas_activity_card_Selected" class="mas_activity_card_Selected"><?php echo $mas_activity_card_delete->Selected->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_activity_card_delete->RecordCount = 0;
$i = 0;
while (!$mas_activity_card_delete->Recordset->EOF) {
	$mas_activity_card_delete->RecordCount++;
	$mas_activity_card_delete->RowCount++;

	// Set row properties
	$mas_activity_card->resetAttributes();
	$mas_activity_card->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_activity_card_delete->loadRowValues($mas_activity_card_delete->Recordset);

	// Render row
	$mas_activity_card_delete->renderRow();
?>
	<tr <?php echo $mas_activity_card->rowAttributes() ?>>
<?php if ($mas_activity_card_delete->id->Visible) { // id ?>
		<td <?php echo $mas_activity_card_delete->id->cellAttributes() ?>>
<span id="el<?php echo $mas_activity_card_delete->RowCount ?>_mas_activity_card_id" class="mas_activity_card_id">
<span<?php echo $mas_activity_card_delete->id->viewAttributes() ?>><?php echo $mas_activity_card_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_activity_card_delete->Activity->Visible) { // Activity ?>
		<td <?php echo $mas_activity_card_delete->Activity->cellAttributes() ?>>
<span id="el<?php echo $mas_activity_card_delete->RowCount ?>_mas_activity_card_Activity" class="mas_activity_card_Activity">
<span<?php echo $mas_activity_card_delete->Activity->viewAttributes() ?>><?php echo $mas_activity_card_delete->Activity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_activity_card_delete->Type->Visible) { // Type ?>
		<td <?php echo $mas_activity_card_delete->Type->cellAttributes() ?>>
<span id="el<?php echo $mas_activity_card_delete->RowCount ?>_mas_activity_card_Type" class="mas_activity_card_Type">
<span<?php echo $mas_activity_card_delete->Type->viewAttributes() ?>><?php echo $mas_activity_card_delete->Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_activity_card_delete->Units->Visible) { // Units ?>
		<td <?php echo $mas_activity_card_delete->Units->cellAttributes() ?>>
<span id="el<?php echo $mas_activity_card_delete->RowCount ?>_mas_activity_card_Units" class="mas_activity_card_Units">
<span<?php echo $mas_activity_card_delete->Units->viewAttributes() ?>><?php echo $mas_activity_card_delete->Units->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_activity_card_delete->Amount->Visible) { // Amount ?>
		<td <?php echo $mas_activity_card_delete->Amount->cellAttributes() ?>>
<span id="el<?php echo $mas_activity_card_delete->RowCount ?>_mas_activity_card_Amount" class="mas_activity_card_Amount">
<span<?php echo $mas_activity_card_delete->Amount->viewAttributes() ?>><?php echo $mas_activity_card_delete->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_activity_card_delete->Selected->Visible) { // Selected ?>
		<td <?php echo $mas_activity_card_delete->Selected->cellAttributes() ?>>
<span id="el<?php echo $mas_activity_card_delete->RowCount ?>_mas_activity_card_Selected" class="mas_activity_card_Selected">
<span<?php echo $mas_activity_card_delete->Selected->viewAttributes() ?>><?php echo $mas_activity_card_delete->Selected->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_activity_card_delete->Recordset->moveNext();
}
$mas_activity_card_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_activity_card_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_activity_card_delete->showPageFooter();
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
$mas_activity_card_delete->terminate();
?>