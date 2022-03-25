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
$lab_drug_mast_view = new lab_drug_mast_view();

// Run the page
$lab_drug_mast_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_drug_mast_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lab_drug_mast_view->isExport()) { ?>
<script>
var flab_drug_mastview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	flab_drug_mastview = currentForm = new ew.Form("flab_drug_mastview", "view");
	loadjs.done("flab_drug_mastview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$lab_drug_mast_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lab_drug_mast_view->ExportOptions->render("body") ?>
<?php $lab_drug_mast_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lab_drug_mast_view->showPageHeader(); ?>
<?php
$lab_drug_mast_view->showMessage();
?>
<form name="flab_drug_mastview" id="flab_drug_mastview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_drug_mast">
<input type="hidden" name="modal" value="<?php echo (int)$lab_drug_mast_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lab_drug_mast_view->DrugName->Visible) { // DrugName ?>
	<tr id="r_DrugName">
		<td class="<?php echo $lab_drug_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_DrugName"><?php echo $lab_drug_mast_view->DrugName->caption() ?></span></td>
		<td data-name="DrugName" <?php echo $lab_drug_mast_view->DrugName->cellAttributes() ?>>
<span id="el_lab_drug_mast_DrugName">
<span<?php echo $lab_drug_mast_view->DrugName->viewAttributes() ?>><?php echo $lab_drug_mast_view->DrugName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_drug_mast_view->Positive->Visible) { // Positive ?>
	<tr id="r_Positive">
		<td class="<?php echo $lab_drug_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_Positive"><?php echo $lab_drug_mast_view->Positive->caption() ?></span></td>
		<td data-name="Positive" <?php echo $lab_drug_mast_view->Positive->cellAttributes() ?>>
<span id="el_lab_drug_mast_Positive">
<span<?php echo $lab_drug_mast_view->Positive->viewAttributes() ?>><?php echo $lab_drug_mast_view->Positive->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_drug_mast_view->Negative->Visible) { // Negative ?>
	<tr id="r_Negative">
		<td class="<?php echo $lab_drug_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_Negative"><?php echo $lab_drug_mast_view->Negative->caption() ?></span></td>
		<td data-name="Negative" <?php echo $lab_drug_mast_view->Negative->cellAttributes() ?>>
<span id="el_lab_drug_mast_Negative">
<span<?php echo $lab_drug_mast_view->Negative->viewAttributes() ?>><?php echo $lab_drug_mast_view->Negative->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_drug_mast_view->ShortName->Visible) { // ShortName ?>
	<tr id="r_ShortName">
		<td class="<?php echo $lab_drug_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_ShortName"><?php echo $lab_drug_mast_view->ShortName->caption() ?></span></td>
		<td data-name="ShortName" <?php echo $lab_drug_mast_view->ShortName->cellAttributes() ?>>
<span id="el_lab_drug_mast_ShortName">
<span<?php echo $lab_drug_mast_view->ShortName->viewAttributes() ?>><?php echo $lab_drug_mast_view->ShortName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_drug_mast_view->GroupCD->Visible) { // GroupCD ?>
	<tr id="r_GroupCD">
		<td class="<?php echo $lab_drug_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_GroupCD"><?php echo $lab_drug_mast_view->GroupCD->caption() ?></span></td>
		<td data-name="GroupCD" <?php echo $lab_drug_mast_view->GroupCD->cellAttributes() ?>>
<span id="el_lab_drug_mast_GroupCD">
<span<?php echo $lab_drug_mast_view->GroupCD->viewAttributes() ?>><?php echo $lab_drug_mast_view->GroupCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_drug_mast_view->Content->Visible) { // Content ?>
	<tr id="r_Content">
		<td class="<?php echo $lab_drug_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_Content"><?php echo $lab_drug_mast_view->Content->caption() ?></span></td>
		<td data-name="Content" <?php echo $lab_drug_mast_view->Content->cellAttributes() ?>>
<span id="el_lab_drug_mast_Content">
<span<?php echo $lab_drug_mast_view->Content->viewAttributes() ?>><?php echo $lab_drug_mast_view->Content->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_drug_mast_view->Order->Visible) { // Order ?>
	<tr id="r_Order">
		<td class="<?php echo $lab_drug_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_Order"><?php echo $lab_drug_mast_view->Order->caption() ?></span></td>
		<td data-name="Order" <?php echo $lab_drug_mast_view->Order->cellAttributes() ?>>
<span id="el_lab_drug_mast_Order">
<span<?php echo $lab_drug_mast_view->Order->viewAttributes() ?>><?php echo $lab_drug_mast_view->Order->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_drug_mast_view->DrugCD->Visible) { // DrugCD ?>
	<tr id="r_DrugCD">
		<td class="<?php echo $lab_drug_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_DrugCD"><?php echo $lab_drug_mast_view->DrugCD->caption() ?></span></td>
		<td data-name="DrugCD" <?php echo $lab_drug_mast_view->DrugCD->cellAttributes() ?>>
<span id="el_lab_drug_mast_DrugCD">
<span<?php echo $lab_drug_mast_view->DrugCD->viewAttributes() ?>><?php echo $lab_drug_mast_view->DrugCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_drug_mast_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $lab_drug_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_id"><?php echo $lab_drug_mast_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $lab_drug_mast_view->id->cellAttributes() ?>>
<span id="el_lab_drug_mast_id">
<span<?php echo $lab_drug_mast_view->id->viewAttributes() ?>><?php echo $lab_drug_mast_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lab_drug_mast_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lab_drug_mast_view->isExport()) { ?>
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
$lab_drug_mast_view->terminate();
?>