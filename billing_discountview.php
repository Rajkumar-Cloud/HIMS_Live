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
$billing_discount_view = new billing_discount_view();

// Run the page
$billing_discount_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_discount_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$billing_discount->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fbilling_discountview = currentForm = new ew.Form("fbilling_discountview", "view");

// Form_CustomValidate event
fbilling_discountview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbilling_discountview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$billing_discount->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $billing_discount_view->ExportOptions->render("body") ?>
<?php $billing_discount_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $billing_discount_view->showPageHeader(); ?>
<?php
$billing_discount_view->showMessage();
?>
<form name="fbilling_discountview" id="fbilling_discountview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($billing_discount_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $billing_discount_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_discount">
<input type="hidden" name="modal" value="<?php echo (int)$billing_discount_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($billing_discount->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $billing_discount_view->TableLeftColumnClass ?>"><span id="elh_billing_discount_id"><?php echo $billing_discount->id->caption() ?></span></td>
		<td data-name="id"<?php echo $billing_discount->id->cellAttributes() ?>>
<span id="el_billing_discount_id">
<span<?php echo $billing_discount->id->viewAttributes() ?>>
<?php echo $billing_discount->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($billing_discount->Particulars->Visible) { // Particulars ?>
	<tr id="r_Particulars">
		<td class="<?php echo $billing_discount_view->TableLeftColumnClass ?>"><span id="elh_billing_discount_Particulars"><?php echo $billing_discount->Particulars->caption() ?></span></td>
		<td data-name="Particulars"<?php echo $billing_discount->Particulars->cellAttributes() ?>>
<span id="el_billing_discount_Particulars">
<span<?php echo $billing_discount->Particulars->viewAttributes() ?>>
<?php echo $billing_discount->Particulars->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($billing_discount->Procedure->Visible) { // Procedure ?>
	<tr id="r_Procedure">
		<td class="<?php echo $billing_discount_view->TableLeftColumnClass ?>"><span id="elh_billing_discount_Procedure"><?php echo $billing_discount->Procedure->caption() ?></span></td>
		<td data-name="Procedure"<?php echo $billing_discount->Procedure->cellAttributes() ?>>
<span id="el_billing_discount_Procedure">
<span<?php echo $billing_discount->Procedure->viewAttributes() ?>>
<?php echo $billing_discount->Procedure->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($billing_discount->Pharmacy->Visible) { // Pharmacy ?>
	<tr id="r_Pharmacy">
		<td class="<?php echo $billing_discount_view->TableLeftColumnClass ?>"><span id="elh_billing_discount_Pharmacy"><?php echo $billing_discount->Pharmacy->caption() ?></span></td>
		<td data-name="Pharmacy"<?php echo $billing_discount->Pharmacy->cellAttributes() ?>>
<span id="el_billing_discount_Pharmacy">
<span<?php echo $billing_discount->Pharmacy->viewAttributes() ?>>
<?php echo $billing_discount->Pharmacy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($billing_discount->Investication->Visible) { // Investication ?>
	<tr id="r_Investication">
		<td class="<?php echo $billing_discount_view->TableLeftColumnClass ?>"><span id="elh_billing_discount_Investication"><?php echo $billing_discount->Investication->caption() ?></span></td>
		<td data-name="Investication"<?php echo $billing_discount->Investication->cellAttributes() ?>>
<span id="el_billing_discount_Investication">
<span<?php echo $billing_discount->Investication->viewAttributes() ?>>
<?php echo $billing_discount->Investication->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$billing_discount_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$billing_discount->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$billing_discount_view->terminate();
?>