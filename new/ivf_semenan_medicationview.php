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
$ivf_semenan_medication_view = new ivf_semenan_medication_view();

// Run the page
$ivf_semenan_medication_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_semenan_medication_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_semenan_medication_view->isExport()) { ?>
<script>
var fivf_semenan_medicationview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_semenan_medicationview = currentForm = new ew.Form("fivf_semenan_medicationview", "view");
	loadjs.done("fivf_semenan_medicationview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_semenan_medication_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_semenan_medication_view->ExportOptions->render("body") ?>
<?php $ivf_semenan_medication_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_semenan_medication_view->showPageHeader(); ?>
<?php
$ivf_semenan_medication_view->showMessage();
?>
<form name="fivf_semenan_medicationview" id="fivf_semenan_medicationview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_semenan_medication">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_semenan_medication_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_semenan_medication_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_semenan_medication_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenan_medication_id"><?php echo $ivf_semenan_medication_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $ivf_semenan_medication_view->id->cellAttributes() ?>>
<span id="el_ivf_semenan_medication_id">
<span<?php echo $ivf_semenan_medication_view->id->viewAttributes() ?>><?php echo $ivf_semenan_medication_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenan_medication_view->Medication->Visible) { // Medication ?>
	<tr id="r_Medication">
		<td class="<?php echo $ivf_semenan_medication_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenan_medication_Medication"><?php echo $ivf_semenan_medication_view->Medication->caption() ?></span></td>
		<td data-name="Medication" <?php echo $ivf_semenan_medication_view->Medication->cellAttributes() ?>>
<span id="el_ivf_semenan_medication_Medication">
<span<?php echo $ivf_semenan_medication_view->Medication->viewAttributes() ?>><?php echo $ivf_semenan_medication_view->Medication->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_semenan_medication_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_semenan_medication_view->isExport()) { ?>
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
$ivf_semenan_medication_view->terminate();
?>