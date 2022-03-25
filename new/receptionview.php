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
<?php include_once "header.php"; ?>
<?php if (!$reception_view->isExport()) { ?>
<script>
var freceptionview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	freceptionview = currentForm = new ew.Form("freceptionview", "view");
	loadjs.done("freceptionview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$reception_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="reception">
<input type="hidden" name="modal" value="<?php echo (int)$reception_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($reception_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_id"><?php echo $reception_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $reception_view->id->cellAttributes() ?>>
<span id="el_reception_id">
<span<?php echo $reception_view->id->viewAttributes() ?>><?php echo $reception_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception_view->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_PatientID"><?php echo $reception_view->PatientID->caption() ?></span></td>
		<td data-name="PatientID" <?php echo $reception_view->PatientID->cellAttributes() ?>>
<span id="el_reception_PatientID">
<span<?php echo $reception_view->PatientID->viewAttributes() ?>><?php echo $reception_view->PatientID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_PatientName"><?php echo $reception_view->PatientName->caption() ?></span></td>
		<td data-name="PatientName" <?php echo $reception_view->PatientName->cellAttributes() ?>>
<span id="el_reception_PatientName">
<span<?php echo $reception_view->PatientName->viewAttributes() ?>><?php echo $reception_view->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception_view->OorN->Visible) { // OorN ?>
	<tr id="r_OorN">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_OorN"><?php echo $reception_view->OorN->caption() ?></span></td>
		<td data-name="OorN" <?php echo $reception_view->OorN->cellAttributes() ?>>
<span id="el_reception_OorN">
<span<?php echo $reception_view->OorN->viewAttributes() ?>><?php echo $reception_view->OorN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception_view->PRIMARY_CONSULTANT->Visible) { // PRIMARY_CONSULTANT ?>
	<tr id="r_PRIMARY_CONSULTANT">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_PRIMARY_CONSULTANT"><?php echo $reception_view->PRIMARY_CONSULTANT->caption() ?></span></td>
		<td data-name="PRIMARY_CONSULTANT" <?php echo $reception_view->PRIMARY_CONSULTANT->cellAttributes() ?>>
<span id="el_reception_PRIMARY_CONSULTANT">
<span<?php echo $reception_view->PRIMARY_CONSULTANT->viewAttributes() ?>><?php echo $reception_view->PRIMARY_CONSULTANT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception_view->CATEGORY->Visible) { // CATEGORY ?>
	<tr id="r_CATEGORY">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_CATEGORY"><?php echo $reception_view->CATEGORY->caption() ?></span></td>
		<td data-name="CATEGORY" <?php echo $reception_view->CATEGORY->cellAttributes() ?>>
<span id="el_reception_CATEGORY">
<span<?php echo $reception_view->CATEGORY->viewAttributes() ?>><?php echo $reception_view->CATEGORY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception_view->PROCEDURE->Visible) { // PROCEDURE ?>
	<tr id="r_PROCEDURE">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_PROCEDURE"><?php echo $reception_view->PROCEDURE->caption() ?></span></td>
		<td data-name="PROCEDURE" <?php echo $reception_view->PROCEDURE->cellAttributes() ?>>
<span id="el_reception_PROCEDURE">
<span<?php echo $reception_view->PROCEDURE->viewAttributes() ?>><?php echo $reception_view->PROCEDURE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception_view->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_Amount"><?php echo $reception_view->Amount->caption() ?></span></td>
		<td data-name="Amount" <?php echo $reception_view->Amount->cellAttributes() ?>>
<span id="el_reception_Amount">
<span<?php echo $reception_view->Amount->viewAttributes() ?>><?php echo $reception_view->Amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception_view->MODE_OF_PAYMENT->Visible) { // MODE OF PAYMENT ?>
	<tr id="r_MODE_OF_PAYMENT">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_MODE_OF_PAYMENT"><?php echo $reception_view->MODE_OF_PAYMENT->caption() ?></span></td>
		<td data-name="MODE_OF_PAYMENT" <?php echo $reception_view->MODE_OF_PAYMENT->cellAttributes() ?>>
<span id="el_reception_MODE_OF_PAYMENT">
<span<?php echo $reception_view->MODE_OF_PAYMENT->viewAttributes() ?>><?php echo $reception_view->MODE_OF_PAYMENT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception_view->NEXT_REVIEW_DATE->Visible) { // NEXT REVIEW DATE ?>
	<tr id="r_NEXT_REVIEW_DATE">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_NEXT_REVIEW_DATE"><?php echo $reception_view->NEXT_REVIEW_DATE->caption() ?></span></td>
		<td data-name="NEXT_REVIEW_DATE" <?php echo $reception_view->NEXT_REVIEW_DATE->cellAttributes() ?>>
<span id="el_reception_NEXT_REVIEW_DATE">
<span<?php echo $reception_view->NEXT_REVIEW_DATE->viewAttributes() ?>><?php echo $reception_view->NEXT_REVIEW_DATE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($reception_view->REMARKS->Visible) { // REMARKS ?>
	<tr id="r_REMARKS">
		<td class="<?php echo $reception_view->TableLeftColumnClass ?>"><span id="elh_reception_REMARKS"><?php echo $reception_view->REMARKS->caption() ?></span></td>
		<td data-name="REMARKS" <?php echo $reception_view->REMARKS->cellAttributes() ?>>
<span id="el_reception_REMARKS">
<span<?php echo $reception_view->REMARKS->viewAttributes() ?>><?php echo $reception_view->REMARKS->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$reception_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$reception_view->isExport()) { ?>
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
$reception_view->terminate();
?>