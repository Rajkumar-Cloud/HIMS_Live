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
$pres_frequencies_view = new pres_frequencies_view();

// Run the page
$pres_frequencies_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_frequencies_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_frequencies->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpres_frequenciesview = currentForm = new ew.Form("fpres_frequenciesview", "view");

// Form_CustomValidate event
fpres_frequenciesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_frequenciesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pres_frequencies->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_frequencies_view->ExportOptions->render("body") ?>
<?php $pres_frequencies_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_frequencies_view->showPageHeader(); ?>
<?php
$pres_frequencies_view->showMessage();
?>
<form name="fpres_frequenciesview" id="fpres_frequenciesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_frequencies_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_frequencies_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_frequencies">
<input type="hidden" name="modal" value="<?php echo (int)$pres_frequencies_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_frequencies->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_frequencies_view->TableLeftColumnClass ?>"><span id="elh_pres_frequencies_id"><?php echo $pres_frequencies->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pres_frequencies->id->cellAttributes() ?>>
<span id="el_pres_frequencies_id">
<span<?php echo $pres_frequencies->id->viewAttributes() ?>>
<?php echo $pres_frequencies->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_frequencies->Frequency->Visible) { // Frequency ?>
	<tr id="r_Frequency">
		<td class="<?php echo $pres_frequencies_view->TableLeftColumnClass ?>"><span id="elh_pres_frequencies_Frequency"><?php echo $pres_frequencies->Frequency->caption() ?></span></td>
		<td data-name="Frequency"<?php echo $pres_frequencies->Frequency->cellAttributes() ?>>
<span id="el_pres_frequencies_Frequency">
<span<?php echo $pres_frequencies->Frequency->viewAttributes() ?>>
<?php echo $pres_frequencies->Frequency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_frequencies->Freq_Exp->Visible) { // Freq_Exp ?>
	<tr id="r_Freq_Exp">
		<td class="<?php echo $pres_frequencies_view->TableLeftColumnClass ?>"><span id="elh_pres_frequencies_Freq_Exp"><?php echo $pres_frequencies->Freq_Exp->caption() ?></span></td>
		<td data-name="Freq_Exp"<?php echo $pres_frequencies->Freq_Exp->cellAttributes() ?>>
<span id="el_pres_frequencies_Freq_Exp">
<span<?php echo $pres_frequencies->Freq_Exp->viewAttributes() ?>>
<?php echo $pres_frequencies->Freq_Exp->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_frequencies->Freq_Count->Visible) { // Freq_Count ?>
	<tr id="r_Freq_Count">
		<td class="<?php echo $pres_frequencies_view->TableLeftColumnClass ?>"><span id="elh_pres_frequencies_Freq_Count"><?php echo $pres_frequencies->Freq_Count->caption() ?></span></td>
		<td data-name="Freq_Count"<?php echo $pres_frequencies->Freq_Count->cellAttributes() ?>>
<span id="el_pres_frequencies_Freq_Count">
<span<?php echo $pres_frequencies->Freq_Count->viewAttributes() ?>>
<?php echo $pres_frequencies->Freq_Count->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_frequencies_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_frequencies->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_frequencies_view->terminate();
?>