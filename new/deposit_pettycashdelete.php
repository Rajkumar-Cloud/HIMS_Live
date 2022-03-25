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
<?php include_once "header.php"; ?>
<script>
var fdeposit_pettycashdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fdeposit_pettycashdelete = currentForm = new ew.Form("fdeposit_pettycashdelete", "delete");
	loadjs.done("fdeposit_pettycashdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $deposit_pettycash_delete->showPageHeader(); ?>
<?php
$deposit_pettycash_delete->showMessage();
?>
<form name="fdeposit_pettycashdelete" id="fdeposit_pettycashdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="deposit_pettycash">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($deposit_pettycash_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($deposit_pettycash_delete->id->Visible) { // id ?>
		<th class="<?php echo $deposit_pettycash_delete->id->headerCellClass() ?>"><span id="elh_deposit_pettycash_id" class="deposit_pettycash_id"><?php echo $deposit_pettycash_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash_delete->TransType->Visible) { // TransType ?>
		<th class="<?php echo $deposit_pettycash_delete->TransType->headerCellClass() ?>"><span id="elh_deposit_pettycash_TransType" class="deposit_pettycash_TransType"><?php echo $deposit_pettycash_delete->TransType->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash_delete->ShiftNumber->Visible) { // ShiftNumber ?>
		<th class="<?php echo $deposit_pettycash_delete->ShiftNumber->headerCellClass() ?>"><span id="elh_deposit_pettycash_ShiftNumber" class="deposit_pettycash_ShiftNumber"><?php echo $deposit_pettycash_delete->ShiftNumber->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash_delete->TerminalNumber->Visible) { // TerminalNumber ?>
		<th class="<?php echo $deposit_pettycash_delete->TerminalNumber->headerCellClass() ?>"><span id="elh_deposit_pettycash_TerminalNumber" class="deposit_pettycash_TerminalNumber"><?php echo $deposit_pettycash_delete->TerminalNumber->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash_delete->User->Visible) { // User ?>
		<th class="<?php echo $deposit_pettycash_delete->User->headerCellClass() ?>"><span id="elh_deposit_pettycash_User" class="deposit_pettycash_User"><?php echo $deposit_pettycash_delete->User->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash_delete->OpenedDateTime->Visible) { // OpenedDateTime ?>
		<th class="<?php echo $deposit_pettycash_delete->OpenedDateTime->headerCellClass() ?>"><span id="elh_deposit_pettycash_OpenedDateTime" class="deposit_pettycash_OpenedDateTime"><?php echo $deposit_pettycash_delete->OpenedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash_delete->AccoundHead->Visible) { // AccoundHead ?>
		<th class="<?php echo $deposit_pettycash_delete->AccoundHead->headerCellClass() ?>"><span id="elh_deposit_pettycash_AccoundHead" class="deposit_pettycash_AccoundHead"><?php echo $deposit_pettycash_delete->AccoundHead->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash_delete->Amount->Visible) { // Amount ?>
		<th class="<?php echo $deposit_pettycash_delete->Amount->headerCellClass() ?>"><span id="elh_deposit_pettycash_Amount" class="deposit_pettycash_Amount"><?php echo $deposit_pettycash_delete->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash_delete->CreatedBy->Visible) { // CreatedBy ?>
		<th class="<?php echo $deposit_pettycash_delete->CreatedBy->headerCellClass() ?>"><span id="elh_deposit_pettycash_CreatedBy" class="deposit_pettycash_CreatedBy"><?php echo $deposit_pettycash_delete->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash_delete->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<th class="<?php echo $deposit_pettycash_delete->CreatedDateTime->headerCellClass() ?>"><span id="elh_deposit_pettycash_CreatedDateTime" class="deposit_pettycash_CreatedDateTime"><?php echo $deposit_pettycash_delete->CreatedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash_delete->ModifiedBy->Visible) { // ModifiedBy ?>
		<th class="<?php echo $deposit_pettycash_delete->ModifiedBy->headerCellClass() ?>"><span id="elh_deposit_pettycash_ModifiedBy" class="deposit_pettycash_ModifiedBy"><?php echo $deposit_pettycash_delete->ModifiedBy->caption() ?></span></th>
<?php } ?>
<?php if ($deposit_pettycash_delete->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<th class="<?php echo $deposit_pettycash_delete->ModifiedDateTime->headerCellClass() ?>"><span id="elh_deposit_pettycash_ModifiedDateTime" class="deposit_pettycash_ModifiedDateTime"><?php echo $deposit_pettycash_delete->ModifiedDateTime->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$deposit_pettycash_delete->RecordCount = 0;
$i = 0;
while (!$deposit_pettycash_delete->Recordset->EOF) {
	$deposit_pettycash_delete->RecordCount++;
	$deposit_pettycash_delete->RowCount++;

	// Set row properties
	$deposit_pettycash->resetAttributes();
	$deposit_pettycash->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$deposit_pettycash_delete->loadRowValues($deposit_pettycash_delete->Recordset);

	// Render row
	$deposit_pettycash_delete->renderRow();
?>
	<tr <?php echo $deposit_pettycash->rowAttributes() ?>>
<?php if ($deposit_pettycash_delete->id->Visible) { // id ?>
		<td <?php echo $deposit_pettycash_delete->id->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCount ?>_deposit_pettycash_id" class="deposit_pettycash_id">
<span<?php echo $deposit_pettycash_delete->id->viewAttributes() ?>><?php echo $deposit_pettycash_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash_delete->TransType->Visible) { // TransType ?>
		<td <?php echo $deposit_pettycash_delete->TransType->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCount ?>_deposit_pettycash_TransType" class="deposit_pettycash_TransType">
<span<?php echo $deposit_pettycash_delete->TransType->viewAttributes() ?>><?php echo $deposit_pettycash_delete->TransType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash_delete->ShiftNumber->Visible) { // ShiftNumber ?>
		<td <?php echo $deposit_pettycash_delete->ShiftNumber->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCount ?>_deposit_pettycash_ShiftNumber" class="deposit_pettycash_ShiftNumber">
<span<?php echo $deposit_pettycash_delete->ShiftNumber->viewAttributes() ?>><?php echo $deposit_pettycash_delete->ShiftNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash_delete->TerminalNumber->Visible) { // TerminalNumber ?>
		<td <?php echo $deposit_pettycash_delete->TerminalNumber->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCount ?>_deposit_pettycash_TerminalNumber" class="deposit_pettycash_TerminalNumber">
<span<?php echo $deposit_pettycash_delete->TerminalNumber->viewAttributes() ?>><?php echo $deposit_pettycash_delete->TerminalNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash_delete->User->Visible) { // User ?>
		<td <?php echo $deposit_pettycash_delete->User->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCount ?>_deposit_pettycash_User" class="deposit_pettycash_User">
<span<?php echo $deposit_pettycash_delete->User->viewAttributes() ?>><?php echo $deposit_pettycash_delete->User->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash_delete->OpenedDateTime->Visible) { // OpenedDateTime ?>
		<td <?php echo $deposit_pettycash_delete->OpenedDateTime->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCount ?>_deposit_pettycash_OpenedDateTime" class="deposit_pettycash_OpenedDateTime">
<span<?php echo $deposit_pettycash_delete->OpenedDateTime->viewAttributes() ?>><?php echo $deposit_pettycash_delete->OpenedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash_delete->AccoundHead->Visible) { // AccoundHead ?>
		<td <?php echo $deposit_pettycash_delete->AccoundHead->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCount ?>_deposit_pettycash_AccoundHead" class="deposit_pettycash_AccoundHead">
<span<?php echo $deposit_pettycash_delete->AccoundHead->viewAttributes() ?>><?php echo $deposit_pettycash_delete->AccoundHead->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash_delete->Amount->Visible) { // Amount ?>
		<td <?php echo $deposit_pettycash_delete->Amount->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCount ?>_deposit_pettycash_Amount" class="deposit_pettycash_Amount">
<span<?php echo $deposit_pettycash_delete->Amount->viewAttributes() ?>><?php echo $deposit_pettycash_delete->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash_delete->CreatedBy->Visible) { // CreatedBy ?>
		<td <?php echo $deposit_pettycash_delete->CreatedBy->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCount ?>_deposit_pettycash_CreatedBy" class="deposit_pettycash_CreatedBy">
<span<?php echo $deposit_pettycash_delete->CreatedBy->viewAttributes() ?>><?php echo $deposit_pettycash_delete->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash_delete->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td <?php echo $deposit_pettycash_delete->CreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCount ?>_deposit_pettycash_CreatedDateTime" class="deposit_pettycash_CreatedDateTime">
<span<?php echo $deposit_pettycash_delete->CreatedDateTime->viewAttributes() ?>><?php echo $deposit_pettycash_delete->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash_delete->ModifiedBy->Visible) { // ModifiedBy ?>
		<td <?php echo $deposit_pettycash_delete->ModifiedBy->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCount ?>_deposit_pettycash_ModifiedBy" class="deposit_pettycash_ModifiedBy">
<span<?php echo $deposit_pettycash_delete->ModifiedBy->viewAttributes() ?>><?php echo $deposit_pettycash_delete->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($deposit_pettycash_delete->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td <?php echo $deposit_pettycash_delete->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_delete->RowCount ?>_deposit_pettycash_ModifiedDateTime" class="deposit_pettycash_ModifiedDateTime">
<span<?php echo $deposit_pettycash_delete->ModifiedDateTime->viewAttributes() ?>><?php echo $deposit_pettycash_delete->ModifiedDateTime->getViewValue() ?></span>
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
$deposit_pettycash_delete->terminate();
?>