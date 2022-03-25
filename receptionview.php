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
$reception_view = new reception_view();

// Run the page
$reception_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$reception_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$reception->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var freceptionview = currentForm = new ew.Form("freceptionview", "view");

// Form_CustomValidate event
freceptionview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
freceptionview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
freceptionview.lists["x_CATEGORY"] = <?php echo $reception_view->CATEGORY->Lookup->toClientList() ?>;
freceptionview.lists["x_CATEGORY"].options = <?php echo JsonEncode($reception_view->CATEGORY->lookupOptions()) ?>;
freceptionview.lists["x_PROCEDURE"] = <?php echo $reception_view->PROCEDURE->Lookup->toClientList() ?>;
freceptionview.lists["x_PROCEDURE"].options = <?php echo JsonEncode($reception_view->PROCEDURE->lookupOptions()) ?>;
freceptionview.lists["x_MODE_OF_PAYMENT"] = <?php echo $reception_view->MODE_OF_PAYMENT->Lookup->toClientList() ?>;
freceptionview.lists["x_MODE_OF_PAYMENT"].options = <?php echo JsonEncode($reception_view->MODE_OF_PAYMENT->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$reception->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $reception_view->ExportOptions->render("body") ?>
<?php $reception_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $reception_view->showPageHeader(); ?>
<?php
$reception_view->showMessage();
?>
<form name="freceptionview" id="freceptionview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($reception_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $reception_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="reception">
<input type="hidden" name="modal" value="<?php echo (int)$reception_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($reception->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_id"><?php echo $reception->id->caption() ?></span></td>
		<td data-name="id"<?php echo $reception->id->cellAttributes() ?>>
<span id="el_reception_id">
<span<?php echo $reception->id->viewAttributes() ?>>
<?php echo $reception->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_PatientID"><?php echo $reception->PatientID->caption() ?></span></td>
		<td data-name="PatientID"<?php echo $reception->PatientID->cellAttributes() ?>>
<span id="el_reception_PatientID">
<span<?php echo $reception->PatientID->viewAttributes() ?>>
<?php echo $reception->PatientID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_PatientName"><?php echo $reception->PatientName->caption() ?></span></td>
		<td data-name="PatientName"<?php echo $reception->PatientName->cellAttributes() ?>>
<span id="el_reception_PatientName">
<span<?php echo $reception->PatientName->viewAttributes() ?>>
<?php echo $reception->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception->OorN->Visible) { // OorN ?>
	<tr id="r_OorN">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_OorN"><?php echo $reception->OorN->caption() ?></span></td>
		<td data-name="OorN"<?php echo $reception->OorN->cellAttributes() ?>>
<span id="el_reception_OorN">
<span<?php echo $reception->OorN->viewAttributes() ?>>
<?php echo $reception->OorN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception->PRIMARY_CONSULTANT->Visible) { // PRIMARY_CONSULTANT ?>
	<tr id="r_PRIMARY_CONSULTANT">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_PRIMARY_CONSULTANT"><?php echo $reception->PRIMARY_CONSULTANT->caption() ?></span></td>
		<td data-name="PRIMARY_CONSULTANT"<?php echo $reception->PRIMARY_CONSULTANT->cellAttributes() ?>>
<span id="el_reception_PRIMARY_CONSULTANT">
<span<?php echo $reception->PRIMARY_CONSULTANT->viewAttributes() ?>>
<?php echo $reception->PRIMARY_CONSULTANT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception->CATEGORY->Visible) { // CATEGORY ?>
	<tr id="r_CATEGORY">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_CATEGORY"><?php echo $reception->CATEGORY->caption() ?></span></td>
		<td data-name="CATEGORY"<?php echo $reception->CATEGORY->cellAttributes() ?>>
<span id="el_reception_CATEGORY">
<span<?php echo $reception->CATEGORY->viewAttributes() ?>>
<?php echo $reception->CATEGORY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception->PROCEDURE->Visible) { // PROCEDURE ?>
	<tr id="r_PROCEDURE">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_PROCEDURE"><?php echo $reception->PROCEDURE->caption() ?></span></td>
		<td data-name="PROCEDURE"<?php echo $reception->PROCEDURE->cellAttributes() ?>>
<span id="el_reception_PROCEDURE">
<span<?php echo $reception->PROCEDURE->viewAttributes() ?>>
<?php echo $reception->PROCEDURE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_Amount"><?php echo $reception->Amount->caption() ?></span></td>
		<td data-name="Amount"<?php echo $reception->Amount->cellAttributes() ?>>
<span id="el_reception_Amount">
<span<?php echo $reception->Amount->viewAttributes() ?>>
<?php echo $reception->Amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception->MODE_OF_PAYMENT->Visible) { // MODE OF PAYMENT ?>
	<tr id="r_MODE_OF_PAYMENT">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_MODE_OF_PAYMENT"><?php echo $reception->MODE_OF_PAYMENT->caption() ?></span></td>
		<td data-name="MODE_OF_PAYMENT"<?php echo $reception->MODE_OF_PAYMENT->cellAttributes() ?>>
<span id="el_reception_MODE_OF_PAYMENT">
<span<?php echo $reception->MODE_OF_PAYMENT->viewAttributes() ?>>
<?php echo $reception->MODE_OF_PAYMENT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception->NEXT_REVIEW_DATE->Visible) { // NEXT REVIEW DATE ?>
	<tr id="r_NEXT_REVIEW_DATE">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_NEXT_REVIEW_DATE"><?php echo $reception->NEXT_REVIEW_DATE->caption() ?></span></td>
		<td data-name="NEXT_REVIEW_DATE"<?php echo $reception->NEXT_REVIEW_DATE->cellAttributes() ?>>
<span id="el_reception_NEXT_REVIEW_DATE">
<span<?php echo $reception->NEXT_REVIEW_DATE->viewAttributes() ?>>
<?php echo $reception->NEXT_REVIEW_DATE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception->REMARKS->Visible) { // REMARKS ?>
	<tr id="r_REMARKS">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_REMARKS"><?php echo $reception->REMARKS->caption() ?></span></td>
		<td data-name="REMARKS"<?php echo $reception->REMARKS->cellAttributes() ?>>
<span id="el_reception_REMARKS">
<span<?php echo $reception->REMARKS->viewAttributes() ?>>
<?php echo $reception->REMARKS->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$reception_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$reception->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$reception_view->terminate();
?>