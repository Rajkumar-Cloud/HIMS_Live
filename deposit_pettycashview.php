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
<?php include_once "header.php" ?>
<?php if (!$deposit_pettycash->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fdeposit_pettycashview = currentForm = new ew.Form("fdeposit_pettycashview", "view");

// Form_CustomValidate event
fdeposit_pettycashview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdeposit_pettycashview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fdeposit_pettycashview.lists["x_TransType"] = <?php echo $deposit_pettycash_view->TransType->Lookup->toClientList() ?>;
fdeposit_pettycashview.lists["x_TransType"].options = <?php echo JsonEncode($deposit_pettycash_view->TransType->options(FALSE, TRUE)) ?>;
fdeposit_pettycashview.lists["x_TerminalNumber"] = <?php echo $deposit_pettycash_view->TerminalNumber->Lookup->toClientList() ?>;
fdeposit_pettycashview.lists["x_TerminalNumber"].options = <?php echo JsonEncode($deposit_pettycash_view->TerminalNumber->options(FALSE, TRUE)) ?>;
fdeposit_pettycashview.lists["x_AccoundHead"] = <?php echo $deposit_pettycash_view->AccoundHead->Lookup->toClientList() ?>;
fdeposit_pettycashview.lists["x_AccoundHead"].options = <?php echo JsonEncode($deposit_pettycash_view->AccoundHead->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$deposit_pettycash->isExport()) { ?>
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
<?php if ($deposit_pettycash_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $deposit_pettycash_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="deposit_pettycash">
<input type="hidden" name="modal" value="<?php echo (int)$deposit_pettycash_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($deposit_pettycash->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_id"><?php echo $deposit_pettycash->id->caption() ?></span></td>
		<td data-name="id"<?php echo $deposit_pettycash->id->cellAttributes() ?>>
<span id="el_deposit_pettycash_id">
<span<?php echo $deposit_pettycash->id->viewAttributes() ?>>
<?php echo $deposit_pettycash->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash->TransType->Visible) { // TransType ?>
	<tr id="r_TransType">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_TransType"><?php echo $deposit_pettycash->TransType->caption() ?></span></td>
		<td data-name="TransType"<?php echo $deposit_pettycash->TransType->cellAttributes() ?>>
<span id="el_deposit_pettycash_TransType">
<span<?php echo $deposit_pettycash->TransType->viewAttributes() ?>>
<?php echo $deposit_pettycash->TransType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash->ShiftNumber->Visible) { // ShiftNumber ?>
	<tr id="r_ShiftNumber">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_ShiftNumber"><?php echo $deposit_pettycash->ShiftNumber->caption() ?></span></td>
		<td data-name="ShiftNumber"<?php echo $deposit_pettycash->ShiftNumber->cellAttributes() ?>>
<span id="el_deposit_pettycash_ShiftNumber">
<span<?php echo $deposit_pettycash->ShiftNumber->viewAttributes() ?>>
<?php echo $deposit_pettycash->ShiftNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash->TerminalNumber->Visible) { // TerminalNumber ?>
	<tr id="r_TerminalNumber">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_TerminalNumber"><?php echo $deposit_pettycash->TerminalNumber->caption() ?></span></td>
		<td data-name="TerminalNumber"<?php echo $deposit_pettycash->TerminalNumber->cellAttributes() ?>>
<span id="el_deposit_pettycash_TerminalNumber">
<span<?php echo $deposit_pettycash->TerminalNumber->viewAttributes() ?>>
<?php echo $deposit_pettycash->TerminalNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash->User->Visible) { // User ?>
	<tr id="r_User">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_User"><?php echo $deposit_pettycash->User->caption() ?></span></td>
		<td data-name="User"<?php echo $deposit_pettycash->User->cellAttributes() ?>>
<span id="el_deposit_pettycash_User">
<span<?php echo $deposit_pettycash->User->viewAttributes() ?>>
<?php echo $deposit_pettycash->User->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash->OpenedDateTime->Visible) { // OpenedDateTime ?>
	<tr id="r_OpenedDateTime">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_OpenedDateTime"><?php echo $deposit_pettycash->OpenedDateTime->caption() ?></span></td>
		<td data-name="OpenedDateTime"<?php echo $deposit_pettycash->OpenedDateTime->cellAttributes() ?>>
<span id="el_deposit_pettycash_OpenedDateTime">
<span<?php echo $deposit_pettycash->OpenedDateTime->viewAttributes() ?>>
<?php echo $deposit_pettycash->OpenedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash->AccoundHead->Visible) { // AccoundHead ?>
	<tr id="r_AccoundHead">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_AccoundHead"><?php echo $deposit_pettycash->AccoundHead->caption() ?></span></td>
		<td data-name="AccoundHead"<?php echo $deposit_pettycash->AccoundHead->cellAttributes() ?>>
<span id="el_deposit_pettycash_AccoundHead">
<span<?php echo $deposit_pettycash->AccoundHead->viewAttributes() ?>>
<?php echo $deposit_pettycash->AccoundHead->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_Amount"><?php echo $deposit_pettycash->Amount->caption() ?></span></td>
		<td data-name="Amount"<?php echo $deposit_pettycash->Amount->cellAttributes() ?>>
<span id="el_deposit_pettycash_Amount">
<span<?php echo $deposit_pettycash->Amount->viewAttributes() ?>>
<?php echo $deposit_pettycash->Amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash->Narration->Visible) { // Narration ?>
	<tr id="r_Narration">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_Narration"><?php echo $deposit_pettycash->Narration->caption() ?></span></td>
		<td data-name="Narration"<?php echo $deposit_pettycash->Narration->cellAttributes() ?>>
<span id="el_deposit_pettycash_Narration">
<span<?php echo $deposit_pettycash->Narration->viewAttributes() ?>>
<?php echo $deposit_pettycash->Narration->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_CreatedBy"><?php echo $deposit_pettycash->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy"<?php echo $deposit_pettycash->CreatedBy->cellAttributes() ?>>
<span id="el_deposit_pettycash_CreatedBy">
<span<?php echo $deposit_pettycash->CreatedBy->viewAttributes() ?>>
<?php echo $deposit_pettycash->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_CreatedDateTime"><?php echo $deposit_pettycash->CreatedDateTime->caption() ?></span></td>
		<td data-name="CreatedDateTime"<?php echo $deposit_pettycash->CreatedDateTime->cellAttributes() ?>>
<span id="el_deposit_pettycash_CreatedDateTime">
<span<?php echo $deposit_pettycash->CreatedDateTime->viewAttributes() ?>>
<?php echo $deposit_pettycash->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_ModifiedBy"><?php echo $deposit_pettycash->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy"<?php echo $deposit_pettycash->ModifiedBy->cellAttributes() ?>>
<span id="el_deposit_pettycash_ModifiedBy">
<span<?php echo $deposit_pettycash->ModifiedBy->viewAttributes() ?>>
<?php echo $deposit_pettycash->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_ModifiedDateTime"><?php echo $deposit_pettycash->ModifiedDateTime->caption() ?></span></td>
		<td data-name="ModifiedDateTime"<?php echo $deposit_pettycash->ModifiedDateTime->cellAttributes() ?>>
<span id="el_deposit_pettycash_ModifiedDateTime">
<span<?php echo $deposit_pettycash->ModifiedDateTime->viewAttributes() ?>>
<?php echo $deposit_pettycash->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_pettycash->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $deposit_pettycash_view->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_HospID"><?php echo $deposit_pettycash->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $deposit_pettycash->HospID->cellAttributes() ?>>
<span id="el_deposit_pettycash_HospID">
<span<?php echo $deposit_pettycash->HospID->viewAttributes() ?>>
<?php echo $deposit_pettycash->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$deposit_pettycash_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$deposit_pettycash->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$deposit_pettycash_view->terminate();
?>