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
<?php include_once "header.php" ?>
<?php if (!$ivf_semenan_medication->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fivf_semenan_medicationview = currentForm = new ew.Form("fivf_semenan_medicationview", "view");

// Form_CustomValidate event
fivf_semenan_medicationview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_semenan_medicationview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_semenan_medication->isExport()) { ?>
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
<?php if ($ivf_semenan_medication_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_semenan_medication_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_semenan_medication">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_semenan_medication_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_semenan_medication->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_semenan_medication_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenan_medication_id"><?php echo $ivf_semenan_medication->id->caption() ?></span></td>
		<td data-name="id"<?php echo $ivf_semenan_medication->id->cellAttributes() ?>>
<span id="el_ivf_semenan_medication_id">
<span<?php echo $ivf_semenan_medication->id->viewAttributes() ?>>
<?php echo $ivf_semenan_medication->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_semenan_medication->Medication->Visible) { // Medication ?>
	<tr id="r_Medication">
		<td class="<?php echo $ivf_semenan_medication_view->TableLeftColumnClass ?>"><span id="elh_ivf_semenan_medication_Medication"><?php echo $ivf_semenan_medication->Medication->caption() ?></span></td>
		<td data-name="Medication"<?php echo $ivf_semenan_medication->Medication->cellAttributes() ?>>
<span id="el_ivf_semenan_medication_Medication">
<span<?php echo $ivf_semenan_medication->Medication->viewAttributes() ?>>
<?php echo $ivf_semenan_medication->Medication->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_semenan_medication_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_semenan_medication->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_semenan_medication_view->terminate();
?>