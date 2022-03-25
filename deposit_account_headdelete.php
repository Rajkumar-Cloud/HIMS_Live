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
$deposit_account_head_delete = new deposit_account_head_delete();

// Run the page
$deposit_account_head_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$deposit_account_head_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fdeposit_account_headdelete = currentForm = new ew.Form("fdeposit_account_headdelete", "delete");

// Form_CustomValidate event
fdeposit_account_headdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdeposit_account_headdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $deposit_account_head_delete->showPageHeader(); ?>
<?php
$deposit_account_head_delete->showMessage();
?>
<form name="fdeposit_account_headdelete" id="fdeposit_account_headdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($deposit_account_head_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $deposit_account_head_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="deposit_account_head">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($deposit_account_head_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($deposit_account_head->id->Visible) { // id ?>
		<th class="<?php echo $deposit_account_head->id->headerCellClass() ?>"><span id="elh_deposit_account_head_id" class="deposit_account_head_id"><?php echo $deposit_account_head->id->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_account_head->Name->Visible) { // Name ?>
		<th class="<?php echo $deposit_account_head->Name->headerCellClass() ?>"><span id="elh_deposit_account_head_Name" class="deposit_account_head_Name"><?php echo $deposit_account_head->Name->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$deposit_account_head_delete->RecCnt = 0;
$i = 0;
while (!$deposit_account_head_delete->Recordset->EOF) {
	$deposit_account_head_delete->RecCnt++;
	$deposit_account_head_delete->RowCnt++;

	// Set row properties
	$deposit_account_head->resetAttributes();
	$deposit_account_head->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$deposit_account_head_delete->loadRowValues($deposit_account_head_delete->Recordset);

	// Render row
	$deposit_account_head_delete->renderRow();
?>
	<tr<?php echo $deposit_account_head->rowAttributes() ?>>
<?php if ($deposit_account_head->id->Visible) { // id ?>
		<td<?php echo $deposit_account_head->id->cellAttributes() ?>>
<span id="el<?php echo $deposit_account_head_delete->RowCnt ?>_deposit_account_head_id" class="deposit_account_head_id">
<span<?php echo $deposit_account_head->id->viewAttributes() ?>>
<?php echo $deposit_account_head->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_account_head->Name->Visible) { // Name ?>
		<td<?php echo $deposit_account_head->Name->cellAttributes() ?>>
<span id="el<?php echo $deposit_account_head_delete->RowCnt ?>_deposit_account_head_Name" class="deposit_account_head_Name">
<span<?php echo $deposit_account_head->Name->viewAttributes() ?>>
<?php echo $deposit_account_head->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$deposit_account_head_delete->Recordset->moveNext();
}
$deposit_account_head_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $deposit_account_head_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$deposit_account_head_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$deposit_account_head_delete->terminate();
?>