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
$vitals_view = new vitals_view();

// Run the page
$vitals_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vitals_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$vitals->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fvitalsview = currentForm = new ew.Form("fvitalsview", "view");

// Form_CustomValidate event
fvitalsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fvitalsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$vitals->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $vitals_view->ExportOptions->render("body") ?>
<?php $vitals_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $vitals_view->showPageHeader(); ?>
<?php
$vitals_view->showMessage();
?>
<form name="fvitalsview" id="fvitalsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($vitals_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $vitals_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vitals">
<input type="hidden" name="modal" value="<?php echo (int)$vitals_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($vitals->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $vitals_view->TableLeftColumnClass ?>"><span id="elh_vitals_id"><?php echo $vitals->id->caption() ?></span></td>
		<td data-name="id"<?php echo $vitals->id->cellAttributes() ?>>
<span id="el_vitals_id">
<span<?php echo $vitals->id->viewAttributes() ?>>
<?php echo $vitals->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($vitals->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $vitals_view->TableLeftColumnClass ?>"><span id="elh_vitals_Reception"><?php echo $vitals->Reception->caption() ?></span></td>
		<td data-name="Reception"<?php echo $vitals->Reception->cellAttributes() ?>>
<span id="el_vitals_Reception">
<span<?php echo $vitals->Reception->viewAttributes() ?>>
<?php echo $vitals->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($vitals->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $vitals_view->TableLeftColumnClass ?>"><span id="elh_vitals_PatientId"><?php echo $vitals->PatientId->caption() ?></span></td>
		<td data-name="PatientId"<?php echo $vitals->PatientId->cellAttributes() ?>>
<span id="el_vitals_PatientId">
<span<?php echo $vitals->PatientId->viewAttributes() ?>>
<?php echo $vitals->PatientId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($vitals->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $vitals_view->TableLeftColumnClass ?>"><span id="elh_vitals_PatientName"><?php echo $vitals->PatientName->caption() ?></span></td>
		<td data-name="PatientName"<?php echo $vitals->PatientName->cellAttributes() ?>>
<span id="el_vitals_PatientName">
<span<?php echo $vitals->PatientName->viewAttributes() ?>>
<?php echo $vitals->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($vitals->HT->Visible) { // HT ?>
	<tr id="r_HT">
		<td class="<?php echo $vitals_view->TableLeftColumnClass ?>"><span id="elh_vitals_HT"><?php echo $vitals->HT->caption() ?></span></td>
		<td data-name="HT"<?php echo $vitals->HT->cellAttributes() ?>>
<span id="el_vitals_HT">
<span<?php echo $vitals->HT->viewAttributes() ?>>
<?php echo $vitals->HT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($vitals->WT->Visible) { // WT ?>
	<tr id="r_WT">
		<td class="<?php echo $vitals_view->TableLeftColumnClass ?>"><span id="elh_vitals_WT"><?php echo $vitals->WT->caption() ?></span></td>
		<td data-name="WT"<?php echo $vitals->WT->cellAttributes() ?>>
<span id="el_vitals_WT">
<span<?php echo $vitals->WT->viewAttributes() ?>>
<?php echo $vitals->WT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($vitals->BP->Visible) { // BP ?>
	<tr id="r_BP">
		<td class="<?php echo $vitals_view->TableLeftColumnClass ?>"><span id="elh_vitals_BP"><?php echo $vitals->BP->caption() ?></span></td>
		<td data-name="BP"<?php echo $vitals->BP->cellAttributes() ?>>
<span id="el_vitals_BP">
<span<?php echo $vitals->BP->viewAttributes() ?>>
<?php echo $vitals->BP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($vitals->PULSE->Visible) { // PULSE ?>
	<tr id="r_PULSE">
		<td class="<?php echo $vitals_view->TableLeftColumnClass ?>"><span id="elh_vitals_PULSE"><?php echo $vitals->PULSE->caption() ?></span></td>
		<td data-name="PULSE"<?php echo $vitals->PULSE->cellAttributes() ?>>
<span id="el_vitals_PULSE">
<span<?php echo $vitals->PULSE->viewAttributes() ?>>
<?php echo $vitals->PULSE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$vitals_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$vitals->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$vitals_view->terminate();
?>