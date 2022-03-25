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
$deposit_pettycash_view = new deposit_pettycash_view();

// Run the page
$deposit_pettycash_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$deposit_pettycash_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$deposit_pettycash_view->isExport()) { ?>
<script>
var fdeposit_pettycashview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fdeposit_pettycashview = currentForm = new ew.Form("fdeposit_pettycashview", "view");
	loadjs.done("fdeposit_pettycashview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$deposit_pettycash_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $deposit_pettycash_view->ExportOptions->render("body") ?>
<?php $deposit_pettycash_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $deposit_pettycash_view->showPageHeader(); ?>
<?php
$deposit_pettycash_view->showMessage();
?>
<form name="fdeposit_pettycashview" id="fdeposit_pettycashview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="deposit_pettycash">
<input type="hidden" name="modal" value="<?php echo (int)$deposit_pettycash_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($deposit_pettycash_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_id"><?php echo $deposit_pettycash_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $deposit_pettycash_view->id->cellAttributes() ?>>
<span id="el_deposit_pettycash_id">
<span<?php echo $deposit_pettycash_view->id->viewAttributes() ?>><?php echo $deposit_pettycash_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash_view->TransType->Visible) { // TransType ?>
	<tr id="r_TransType">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_TransType"><?php echo $deposit_pettycash_view->TransType->caption() ?></span></td>
		<td data-name="TransType" <?php echo $deposit_pettycash_view->TransType->cellAttributes() ?>>
<span id="el_deposit_pettycash_TransType">
<span<?php echo $deposit_pettycash_view->TransType->viewAttributes() ?>><?php echo $deposit_pettycash_view->TransType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash_view->ShiftNumber->Visible) { // ShiftNumber ?>
	<tr id="r_ShiftNumber">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_ShiftNumber"><?php echo $deposit_pettycash_view->ShiftNumber->caption() ?></span></td>
		<td data-name="ShiftNumber" <?php echo $deposit_pettycash_view->ShiftNumber->cellAttributes() ?>>
<span id="el_deposit_pettycash_ShiftNumber">
<span<?php echo $deposit_pettycash_view->ShiftNumber->viewAttributes() ?>><?php echo $deposit_pettycash_view->ShiftNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash_view->TerminalNumber->Visible) { // TerminalNumber ?>
	<tr id="r_TerminalNumber">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_TerminalNumber"><?php echo $deposit_pettycash_view->TerminalNumber->caption() ?></span></td>
		<td data-name="TerminalNumber" <?php echo $deposit_pettycash_view->TerminalNumber->cellAttributes() ?>>
<span id="el_deposit_pettycash_TerminalNumber">
<span<?php echo $deposit_pettycash_view->TerminalNumber->viewAttributes() ?>><?php echo $deposit_pettycash_view->TerminalNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash_view->User->Visible) { // User ?>
	<tr id="r_User">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_User"><?php echo $deposit_pettycash_view->User->caption() ?></span></td>
		<td data-name="User" <?php echo $deposit_pettycash_view->User->cellAttributes() ?>>
<span id="el_deposit_pettycash_User">
<span<?php echo $deposit_pettycash_view->User->viewAttributes() ?>><?php echo $deposit_pettycash_view->User->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash_view->OpenedDateTime->Visible) { // OpenedDateTime ?>
	<tr id="r_OpenedDateTime">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_OpenedDateTime"><?php echo $deposit_pettycash_view->OpenedDateTime->caption() ?></span></td>
		<td data-name="OpenedDateTime" <?php echo $deposit_pettycash_view->OpenedDateTime->cellAttributes() ?>>
<span id="el_deposit_pettycash_OpenedDateTime">
<span<?php echo $deposit_pettycash_view->OpenedDateTime->viewAttributes() ?>><?php echo $deposit_pettycash_view->OpenedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash_view->AccoundHead->Visible) { // AccoundHead ?>
	<tr id="r_AccoundHead">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_AccoundHead"><?php echo $deposit_pettycash_view->AccoundHead->caption() ?></span></td>
		<td data-name="AccoundHead" <?php echo $deposit_pettycash_view->AccoundHead->cellAttributes() ?>>
<span id="el_deposit_pettycash_AccoundHead">
<span<?php echo $deposit_pettycash_view->AccoundHead->viewAttributes() ?>><?php echo $deposit_pettycash_view->AccoundHead->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash_view->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_Amount"><?php echo $deposit_pettycash_view->Amount->caption() ?></span></td>
		<td data-name="Amount" <?php echo $deposit_pettycash_view->Amount->cellAttributes() ?>>
<span id="el_deposit_pettycash_Amount">
<span<?php echo $deposit_pettycash_view->Amount->viewAttributes() ?>><?php echo $deposit_pettycash_view->Amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash_view->Narration->Visible) { // Narration ?>
	<tr id="r_Narration">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_Narration"><?php echo $deposit_pettycash_view->Narration->caption() ?></span></td>
		<td data-name="Narration" <?php echo $deposit_pettycash_view->Narration->cellAttributes() ?>>
<span id="el_deposit_pettycash_Narration">
<span<?php echo $deposit_pettycash_view->Narration->viewAttributes() ?>><?php echo $deposit_pettycash_view->Narration->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash_view->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_CreatedBy"><?php echo $deposit_pettycash_view->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy" <?php echo $deposit_pettycash_view->CreatedBy->cellAttributes() ?>>
<span id="el_deposit_pettycash_CreatedBy">
<span<?php echo $deposit_pettycash_view->CreatedBy->viewAttributes() ?>><?php echo $deposit_pettycash_view->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash_view->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_CreatedDateTime"><?php echo $deposit_pettycash_view->CreatedDateTime->caption() ?></span></td>
		<td data-name="CreatedDateTime" <?php echo $deposit_pettycash_view->CreatedDateTime->cellAttributes() ?>>
<span id="el_deposit_pettycash_CreatedDateTime">
<span<?php echo $deposit_pettycash_view->CreatedDateTime->viewAttributes() ?>><?php echo $deposit_pettycash_view->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash_view->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_ModifiedBy"><?php echo $deposit_pettycash_view->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy" <?php echo $deposit_pettycash_view->ModifiedBy->cellAttributes() ?>>
<span id="el_deposit_pettycash_ModifiedBy">
<span<?php echo $deposit_pettycash_view->ModifiedBy->viewAttributes() ?>><?php echo $deposit_pettycash_view->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash_view->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_ModifiedDateTime"><?php echo $deposit_pettycash_view->ModifiedDateTime->caption() ?></span></td>
		<td data-name="ModifiedDateTime" <?php echo $deposit_pettycash_view->ModifiedDateTime->cellAttributes() ?>>
<span id="el_deposit_pettycash_ModifiedDateTime">
<span<?php echo $deposit_pettycash_view->ModifiedDateTime->viewAttributes() ?>><?php echo $deposit_pettycash_view->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$deposit_pettycash_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$deposit_pettycash_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$deposit_pettycash_view->terminate();
?>