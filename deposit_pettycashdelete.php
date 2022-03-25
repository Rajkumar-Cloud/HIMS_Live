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
$deposit_pettycash_delete = new deposit_pettycash_delete();

// Run the page
$deposit_pettycash_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$deposit_pettycash_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fdeposit_pettycashdelete = currentForm = new ew.Form("fdeposit_pettycashdelete", "delete");

// Form_CustomValidate event
fdeposit_pettycashdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdeposit_pettycashdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fdeposit_pettycashdelete.lists["x_TransType"] = <?php echo $deposit_pettycash_delete->TransType->Lookup->toClientList() ?>;
fdeposit_pettycashdelete.lists["x_TransType"].options = <?php echo JsonEncode($deposit_pettycash_delete->TransType->options(FALSE, TRUE)) ?>;
fdeposit_pettycashdelete.lists["x_TerminalNumber"] = <?php echo $deposit_pettycash_delete->TerminalNumber->Lookup->toClientList() ?>;
fdeposit_pettycashdelete.lists["x_TerminalNumber"].options = <?php echo JsonEncode($deposit_pettycash_delete->TerminalNumber->options(FALSE, TRUE)) ?>;
fdeposit_pettycashdelete.lists["x_AccoundHead"] = <?php echo $deposit_pettycash_delete->AccoundHead->Lookup->toClientList() ?>;
fdeposit_pettycashdelete.lists["x_AccoundHead"].options = <?php echo JsonEncode($deposit_pettycash_delete->AccoundHead->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $deposit_pettycash_delete->showPageHeader(); ?>
<?php
$deposit_pettycash_delete->showMessage();
?>
<form name="fdeposit_pettycashdelete" id="fdeposit_pettycashdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($deposit_pettycash_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $deposit_pettycash_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="deposit_pettycash">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($deposit_pettycash_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($deposit_pettycash->id->Visible) { // id ?>
		<th class="<?php echo $deposit_pettycash->id->headerCellClass() ?>"><span id="elh_deposit_pettycash_id" class="deposit_pettycash_id"><?php echo $deposit_pettycash->id->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash->TransType->Visible) { // TransType ?>
		<th class="<?php echo $deposit_pettycash->TransType->headerCellClass() ?>"><span id="elh_deposit_pettycash_TransType" class="deposit_pettycash_TransType"><?php echo $deposit_pettycash->TransType->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash->ShiftNumber->Visible) { // ShiftNumber ?>
		<th class="<?php echo $deposit_pettycash->ShiftNumber->headerCellClass() ?>"><span id="elh_deposit_pettycash_ShiftNumber" class="deposit_pettycash_ShiftNumber"><?php echo $deposit_pettycash->ShiftNumber->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash->TerminalNumber->Visible) { // TerminalNumber ?>
		<th class="<?php echo $deposit_pettycash->TerminalNumber->headerCellClass() ?>"><span id="elh_deposit_pettycash_TerminalNumber" class="deposit_pettycash_TerminalNumber"><?php echo $deposit_pettycash->TerminalNumber->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash->User->Visible) { // User ?>
		<th class="<?php echo $deposit_pettycash->User->headerCellClass() ?>"><span id="elh_deposit_pettycash_User" class="deposit_pettycash_User"><?php echo $deposit_pettycash->User->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash->OpenedDateTime->Visible) { // OpenedDateTime ?>
		<th class="<?php echo $deposit_pettycash->OpenedDateTime->headerCellClass() ?>"><span id="elh_deposit_pettycash_OpenedDateTime" class="deposit_pettycash_OpenedDateTime"><?php echo $deposit_pettycash->OpenedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash->AccoundHead->Visible) { // AccoundHead ?>
		<th class="<?php echo $deposit_pettycash->AccoundHead->headerCellClass() ?>"><span id="elh_deposit_pettycash_AccoundHead" class="deposit_pettycash_AccoundHead"><?php echo $deposit_pettycash->AccoundHead->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash->Amount->Visible) { // Amount ?>
		<th class="<?php echo $deposit_pettycash->Amount->headerCellClass() ?>"><span id="elh_deposit_pettycash_Amount" class="deposit_pettycash_Amount"><?php echo $deposit_pettycash->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash->CreatedBy->Visible) { // CreatedBy ?>
		<th class="<?php echo $deposit_pettycash->CreatedBy->headerCellClass() ?>"><span id="elh_deposit_pettycash_CreatedBy" class="deposit_pettycash_CreatedBy"><?php echo $deposit_pettycash->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<th class="<?php echo $deposit_pettycash->CreatedDateTime->headerCellClass() ?>"><span id="elh_deposit_pettycash_CreatedDateTime" class="deposit_pettycash_CreatedDateTime"><?php echo $deposit_pettycash->CreatedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash->ModifiedBy->Visible) { // ModifiedBy ?>
		<th class="<?php echo $deposit_pettycash->ModifiedBy->headerCellClass() ?>"><span id="elh_deposit_pettycash_ModifiedBy" class="deposit_pettycash_ModifiedBy"><?php echo $deposit_pettycash->ModifiedBy->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<th class="<?php echo $deposit_pettycash->ModifiedDateTime->headerCellClass() ?>"><span id="elh_deposit_pettycash_ModifiedDateTime" class="deposit_pettycash_ModifiedDateTime"><?php echo $deposit_pettycash->ModifiedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash->HospID->Visible) { // HospID ?>
		<th class="<?php echo $deposit_pettycash->HospID->headerCellClass() ?>"><span id="elh_deposit_pettycash_HospID" class="deposit_pettycash_HospID"><?php echo $deposit_pettycash->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$deposit_pettycash_delete->RecCnt = 0;
$i = 0;
while (!$deposit_pettycash_delete->Recordset->EOF) {
	$deposit_pettycash_delete->RecCnt++;
	$deposit_pettycash_delete->RowCnt++;

	// Set row properties
	$deposit_pettycash->resetAttributes();
	$deposit_pettycash->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$deposit_pettycash_delete->loadRowValues($deposit_pettycash_delete->Recordset);

	// Render row
	$deposit_pettycash_delete->renderRow();
?>
	<tr<?php echo $deposit_pettycash->rowAttributes() ?>>
<?php if ($deposit_pettycash->id->Visible) { // id ?>
		<td<?php echo $deposit_pettycash->id->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCnt ?>_deposit_pettycash_id" class="deposit_pettycash_id">
<span<?php echo $deposit_pettycash->id->viewAttributes() ?>>
<?php echo $deposit_pettycash->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash->TransType->Visible) { // TransType ?>
		<td<?php echo $deposit_pettycash->TransType->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCnt ?>_deposit_pettycash_TransType" class="deposit_pettycash_TransType">
<span<?php echo $deposit_pettycash->TransType->viewAttributes() ?>>
<?php echo $deposit_pettycash->TransType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash->ShiftNumber->Visible) { // ShiftNumber ?>
		<td<?php echo $deposit_pettycash->ShiftNumber->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCnt ?>_deposit_pettycash_ShiftNumber" class="deposit_pettycash_ShiftNumber">
<span<?php echo $deposit_pettycash->ShiftNumber->viewAttributes() ?>>
<?php echo $deposit_pettycash->ShiftNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash->TerminalNumber->Visible) { // TerminalNumber ?>
		<td<?php echo $deposit_pettycash->TerminalNumber->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCnt ?>_deposit_pettycash_TerminalNumber" class="deposit_pettycash_TerminalNumber">
<span<?php echo $deposit_pettycash->TerminalNumber->viewAttributes() ?>>
<?php echo $deposit_pettycash->TerminalNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash->User->Visible) { // User ?>
		<td<?php echo $deposit_pettycash->User->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCnt ?>_deposit_pettycash_User" class="deposit_pettycash_User">
<span<?php echo $deposit_pettycash->User->viewAttributes() ?>>
<?php echo $deposit_pettycash->User->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash->OpenedDateTime->Visible) { // OpenedDateTime ?>
		<td<?php echo $deposit_pettycash->OpenedDateTime->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCnt ?>_deposit_pettycash_OpenedDateTime" class="deposit_pettycash_OpenedDateTime">
<span<?php echo $deposit_pettycash->OpenedDateTime->viewAttributes() ?>>
<?php echo $deposit_pettycash->OpenedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash->AccoundHead->Visible) { // AccoundHead ?>
		<td<?php echo $deposit_pettycash->AccoundHead->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCnt ?>_deposit_pettycash_AccoundHead" class="deposit_pettycash_AccoundHead">
<span<?php echo $deposit_pettycash->AccoundHead->viewAttributes() ?>>
<?php echo $deposit_pettycash->AccoundHead->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash->Amount->Visible) { // Amount ?>
		<td<?php echo $deposit_pettycash->Amount->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCnt ?>_deposit_pettycash_Amount" class="deposit_pettycash_Amount">
<span<?php echo $deposit_pettycash->Amount->viewAttributes() ?>>
<?php echo $deposit_pettycash->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash->CreatedBy->Visible) { // CreatedBy ?>
		<td<?php echo $deposit_pettycash->CreatedBy->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCnt ?>_deposit_pettycash_CreatedBy" class="deposit_pettycash_CreatedBy">
<span<?php echo $deposit_pettycash->CreatedBy->viewAttributes() ?>>
<?php echo $deposit_pettycash->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td<?php echo $deposit_pettycash->CreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCnt ?>_deposit_pettycash_CreatedDateTime" class="deposit_pettycash_CreatedDateTime">
<span<?php echo $deposit_pettycash->CreatedDateTime->viewAttributes() ?>>
<?php echo $deposit_pettycash->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash->ModifiedBy->Visible) { // ModifiedBy ?>
		<td<?php echo $deposit_pettycash->ModifiedBy->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCnt ?>_deposit_pettycash_ModifiedBy" class="deposit_pettycash_ModifiedBy">
<span<?php echo $deposit_pettycash->ModifiedBy->viewAttributes() ?>>
<?php echo $deposit_pettycash->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td<?php echo $deposit_pettycash->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCnt ?>_deposit_pettycash_ModifiedDateTime" class="deposit_pettycash_ModifiedDateTime">
<span<?php echo $deposit_pettycash->ModifiedDateTime->viewAttributes() ?>>
<?php echo $deposit_pettycash->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash->HospID->Visible) { // HospID ?>
		<td<?php echo $deposit_pettycash->HospID->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCnt ?>_deposit_pettycash_HospID" class="deposit_pettycash_HospID">
<span<?php echo $deposit_pettycash->HospID->viewAttributes() ?>>
<?php echo $deposit_pettycash->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$deposit_pettycash_delete->Recordset->moveNext();
}
$deposit_pettycash_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $deposit_pettycash_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$deposit_pettycash_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$deposit_pettycash_delete->terminate();
?>