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
$mas_modepayment_view = new mas_modepayment_view();

// Run the page
$mas_modepayment_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_modepayment_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_modepayment->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_modepaymentview = currentForm = new ew.Form("fmas_modepaymentview", "view");

// Form_CustomValidate event
fmas_modepaymentview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_modepaymentview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_modepaymentview.lists["x_BankingDatails"] = <?php echo $mas_modepayment_view->BankingDatails->Lookup->toClientList() ?>;
fmas_modepaymentview.lists["x_BankingDatails"].options = <?php echo JsonEncode($mas_modepayment_view->BankingDatails->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_modepayment->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_modepayment_view->ExportOptions->render("body") ?>
<?php $mas_modepayment_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_modepayment_view->showPageHeader(); ?>
<?php
$mas_modepayment_view->showMessage();
?>
<form name="fmas_modepaymentview" id="fmas_modepaymentview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_modepayment_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_modepayment_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_modepayment">
<input type="hidden" name="modal" value="<?php echo (int)$mas_modepayment_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_modepayment->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_modepayment_view->TableLeftColumnClass ?>"><span id="elh_mas_modepayment_id"><?php echo $mas_modepayment->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_modepayment->id->cellAttributes() ?>>
<span id="el_mas_modepayment_id">
<span<?php echo $mas_modepayment->id->viewAttributes() ?>>
<?php echo $mas_modepayment->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_modepayment->Mode->Visible) { // Mode ?>
	<tr id="r_Mode">
		<td class="<?php echo $mas_modepayment_view->TableLeftColumnClass ?>"><span id="elh_mas_modepayment_Mode"><?php echo $mas_modepayment->Mode->caption() ?></span></td>
		<td data-name="Mode"<?php echo $mas_modepayment->Mode->cellAttributes() ?>>
<span id="el_mas_modepayment_Mode">
<span<?php echo $mas_modepayment->Mode->viewAttributes() ?>>
<?php echo $mas_modepayment->Mode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_modepayment->BankingDatails->Visible) { // BankingDatails ?>
	<tr id="r_BankingDatails">
		<td class="<?php echo $mas_modepayment_view->TableLeftColumnClass ?>"><span id="elh_mas_modepayment_BankingDatails"><?php echo $mas_modepayment->BankingDatails->caption() ?></span></td>
		<td data-name="BankingDatails"<?php echo $mas_modepayment->BankingDatails->cellAttributes() ?>>
<span id="el_mas_modepayment_BankingDatails">
<span<?php echo $mas_modepayment->BankingDatails->viewAttributes() ?>>
<?php echo $mas_modepayment->BankingDatails->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_modepayment_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_modepayment->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_modepayment_view->terminate();
?>