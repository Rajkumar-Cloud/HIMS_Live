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
$deposit_account_head_view = new deposit_account_head_view();

// Run the page
$deposit_account_head_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$deposit_account_head_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$deposit_account_head->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fdeposit_account_headview = currentForm = new ew.Form("fdeposit_account_headview", "view");

// Form_CustomValidate event
fdeposit_account_headview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdeposit_account_headview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$deposit_account_head->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $deposit_account_head_view->ExportOptions->render("body") ?>
<?php $deposit_account_head_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $deposit_account_head_view->showPageHeader(); ?>
<?php
$deposit_account_head_view->showMessage();
?>
<form name="fdeposit_account_headview" id="fdeposit_account_headview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($deposit_account_head_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $deposit_account_head_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="deposit_account_head">
<input type="hidden" name="modal" value="<?php echo (int)$deposit_account_head_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($deposit_account_head->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $deposit_account_head_view->TableLeftColumnClass ?>"><span id="elh_deposit_account_head_id"><?php echo $deposit_account_head->id->caption() ?></span></td>
		<td data-name="id"<?php echo $deposit_account_head->id->cellAttributes() ?>>
<span id="el_deposit_account_head_id">
<span<?php echo $deposit_account_head->id->viewAttributes() ?>>
<?php echo $deposit_account_head->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_account_head->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $deposit_account_head_view->TableLeftColumnClass ?>"><span id="elh_deposit_account_head_Name"><?php echo $deposit_account_head->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $deposit_account_head->Name->cellAttributes() ?>>
<span id="el_deposit_account_head_Name">
<span<?php echo $deposit_account_head->Name->viewAttributes() ?>>
<?php echo $deposit_account_head->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$deposit_account_head_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$deposit_account_head->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$deposit_account_head_view->terminate();
?>