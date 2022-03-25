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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fmas_activity_carddelete = currentForm = new ew.Form("fmas_activity_carddelete", "delete");

// Form_CustomValidate event
fmas_activity_carddelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_activity_carddelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_activity_carddelete.lists["x_Selected[]"] = <?php echo $mas_activity_card_delete->Selected->Lookup->toClientList() ?>;
fmas_activity_carddelete.lists["x_Selected[]"].options = <?php echo JsonEncode($mas_activity_card_delete->Selected->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_activity_card_delete->showPageHeader(); ?>
<?php
$mas_activity_card_delete->showMessage();
?>
<form name="fmas_activity_carddelete" id="fmas_activity_carddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_activity_card_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_activity_card_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_activity_card">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_activity_card_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_activity_card->id->Visible) { // id ?>
		<th class="<?php echo $mas_activity_card->id->headerCellClass() ?>"><span id="elh_mas_activity_card_id" class="mas_activity_card_id"><?php echo $mas_activity_card->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_activity_card->Activity->Visible) { // Activity ?>
		<th class="<?php echo $mas_activity_card->Activity->headerCellClass() ?>"><span id="elh_mas_activity_card_Activity" class="mas_activity_card_Activity"><?php echo $mas_activity_card->Activity->caption() ?></span></th>
<?php } ?>
<?php if ($mas_activity_card->Type->Visible) { // Type ?>
		<th class="<?php echo $mas_activity_card->Type->headerCellClass() ?>"><span id="elh_mas_activity_card_Type" class="mas_activity_card_Type"><?php echo $mas_activity_card->Type->caption() ?></span></th>
<?php } ?>
<?php if ($mas_activity_card->Units->Visible) { // Units ?>
		<th class="<?php echo $mas_activity_card->Units->headerCellClass() ?>"><span id="elh_mas_activity_card_Units" class="mas_activity_card_Units"><?php echo $mas_activity_card->Units->caption() ?></span></th>
<?php } ?>
<?php if ($mas_activity_card->Amount->Visible) { // Amount ?>
		<th class="<?php echo $mas_activity_card->Amount->headerCellClass() ?>"><span id="elh_mas_activity_card_Amount" class="mas_activity_card_Amount"><?php echo $mas_activity_card->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($mas_activity_card->Selected->Visible) { // Selected ?>
		<th class="<?php echo $mas_activity_card->Selected->headerCellClass() ?>"><span id="elh_mas_activity_card_Selected" class="mas_activity_card_Selected"><?php echo $mas_activity_card->Selected->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_activity_card_delete->RecCnt = 0;
$i = 0;
while (!$mas_activity_card_delete->Recordset->EOF) {
	$mas_activity_card_delete->RecCnt++;
	$mas_activity_card_delete->RowCnt++;

	// Set row properties
	$mas_activity_card->resetAttributes();
	$mas_activity_card->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_activity_card_delete->loadRowValues($mas_activity_card_delete->Recordset);

	// Render row
	$mas_activity_card_delete->renderRow();
?>
	<tr<?php echo $mas_activity_card->rowAttributes() ?>>
<?php if ($mas_activity_card->id->Visible) { // id ?>
		<td<?php echo $mas_activity_card->id->cellAttributes() ?>>
<span id="el<?php echo $mas_activity_card_delete->RowCnt ?>_mas_activity_card_id" class="mas_activity_card_id">
<span<?php echo $mas_activity_card->id->viewAttributes() ?>>
<?php echo $mas_activity_card->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_activity_card->Activity->Visible) { // Activity ?>
		<td<?php echo $mas_activity_card->Activity->cellAttributes() ?>>
<span id="el<?php echo $mas_activity_card_delete->RowCnt ?>_mas_activity_card_Activity" class="mas_activity_card_Activity">
<span<?php echo $mas_activity_card->Activity->viewAttributes() ?>>
<?php echo $mas_activity_card->Activity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_activity_card->Type->Visible) { // Type ?>
		<td<?php echo $mas_activity_card->Type->cellAttributes() ?>>
<span id="el<?php echo $mas_activity_card_delete->RowCnt ?>_mas_activity_card_Type" class="mas_activity_card_Type">
<span<?php echo $mas_activity_card->Type->viewAttributes() ?>>
<?php echo $mas_activity_card->Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_activity_card->Units->Visible) { // Units ?>
		<td<?php echo $mas_activity_card->Units->cellAttributes() ?>>
<span id="el<?php echo $mas_activity_card_delete->RowCnt ?>_mas_activity_card_Units" class="mas_activity_card_Units">
<span<?php echo $mas_activity_card->Units->viewAttributes() ?>>
<?php echo $mas_activity_card->Units->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_activity_card->Amount->Visible) { // Amount ?>
		<td<?php echo $mas_activity_card->Amount->cellAttributes() ?>>
<span id="el<?php echo $mas_activity_card_delete->RowCnt ?>_mas_activity_card_Amount" class="mas_activity_card_Amount">
<span<?php echo $mas_activity_card->Amount->viewAttributes() ?>>
<?php echo $mas_activity_card->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_activity_card->Selected->Visible) { // Selected ?>
		<td<?php echo $mas_activity_card->Selected->cellAttributes() ?>>
<span id="el<?php echo $mas_activity_card_delete->RowCnt ?>_mas_activity_card_Selected" class="mas_activity_card_Selected">
<span<?php echo $mas_activity_card->Selected->viewAttributes() ?>>
<?php echo $mas_activity_card->Selected->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_activity_card_delete->terminate();
?>