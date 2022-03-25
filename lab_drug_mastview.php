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
<?php include_once "header.php" ?>
<?php if (!$lab_drug_mast->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var flab_drug_mastview = currentForm = new ew.Form("flab_drug_mastview", "view");

// Form_CustomValidate event
flab_drug_mastview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_drug_mastview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$lab_drug_mast->isExport()) { ?>
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
<?php if ($lab_drug_mast_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_drug_mast_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_drug_mast">
<input type="hidden" name="modal" value="<?php echo (int)$lab_drug_mast_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lab_drug_mast->DrugName->Visible) { // DrugName ?>
	<tr id="r_DrugName">
		<td class="<?php echo $lab_drug_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_DrugName"><?php echo $lab_drug_mast->DrugName->caption() ?></span></td>
		<td data-name="DrugName"<?php echo $lab_drug_mast->DrugName->cellAttributes() ?>>
<span id="el_lab_drug_mast_DrugName">
<span<?php echo $lab_drug_mast->DrugName->viewAttributes() ?>>
<?php echo $lab_drug_mast->DrugName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_drug_mast->Positive->Visible) { // Positive ?>
	<tr id="r_Positive">
		<td class="<?php echo $lab_drug_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_Positive"><?php echo $lab_drug_mast->Positive->caption() ?></span></td>
		<td data-name="Positive"<?php echo $lab_drug_mast->Positive->cellAttributes() ?>>
<span id="el_lab_drug_mast_Positive">
<span<?php echo $lab_drug_mast->Positive->viewAttributes() ?>>
<?php echo $lab_drug_mast->Positive->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_drug_mast->Negative->Visible) { // Negative ?>
	<tr id="r_Negative">
		<td class="<?php echo $lab_drug_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_Negative"><?php echo $lab_drug_mast->Negative->caption() ?></span></td>
		<td data-name="Negative"<?php echo $lab_drug_mast->Negative->cellAttributes() ?>>
<span id="el_lab_drug_mast_Negative">
<span<?php echo $lab_drug_mast->Negative->viewAttributes() ?>>
<?php echo $lab_drug_mast->Negative->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_drug_mast->ShortName->Visible) { // ShortName ?>
	<tr id="r_ShortName">
		<td class="<?php echo $lab_drug_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_ShortName"><?php echo $lab_drug_mast->ShortName->caption() ?></span></td>
		<td data-name="ShortName"<?php echo $lab_drug_mast->ShortName->cellAttributes() ?>>
<span id="el_lab_drug_mast_ShortName">
<span<?php echo $lab_drug_mast->ShortName->viewAttributes() ?>>
<?php echo $lab_drug_mast->ShortName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_drug_mast->GroupCD->Visible) { // GroupCD ?>
	<tr id="r_GroupCD">
		<td class="<?php echo $lab_drug_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_GroupCD"><?php echo $lab_drug_mast->GroupCD->caption() ?></span></td>
		<td data-name="GroupCD"<?php echo $lab_drug_mast->GroupCD->cellAttributes() ?>>
<span id="el_lab_drug_mast_GroupCD">
<span<?php echo $lab_drug_mast->GroupCD->viewAttributes() ?>>
<?php echo $lab_drug_mast->GroupCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_drug_mast->Content->Visible) { // Content ?>
	<tr id="r_Content">
		<td class="<?php echo $lab_drug_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_Content"><?php echo $lab_drug_mast->Content->caption() ?></span></td>
		<td data-name="Content"<?php echo $lab_drug_mast->Content->cellAttributes() ?>>
<span id="el_lab_drug_mast_Content">
<span<?php echo $lab_drug_mast->Content->viewAttributes() ?>>
<?php echo $lab_drug_mast->Content->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_drug_mast->Order->Visible) { // Order ?>
	<tr id="r_Order">
		<td class="<?php echo $lab_drug_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_Order"><?php echo $lab_drug_mast->Order->caption() ?></span></td>
		<td data-name="Order"<?php echo $lab_drug_mast->Order->cellAttributes() ?>>
<span id="el_lab_drug_mast_Order">
<span<?php echo $lab_drug_mast->Order->viewAttributes() ?>>
<?php echo $lab_drug_mast->Order->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_drug_mast->DrugCD->Visible) { // DrugCD ?>
	<tr id="r_DrugCD">
		<td class="<?php echo $lab_drug_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_DrugCD"><?php echo $lab_drug_mast->DrugCD->caption() ?></span></td>
		<td data-name="DrugCD"<?php echo $lab_drug_mast->DrugCD->cellAttributes() ?>>
<span id="el_lab_drug_mast_DrugCD">
<span<?php echo $lab_drug_mast->DrugCD->viewAttributes() ?>>
<?php echo $lab_drug_mast->DrugCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_drug_mast->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $lab_drug_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_drug_mast_id"><?php echo $lab_drug_mast->id->caption() ?></span></td>
		<td data-name="id"<?php echo $lab_drug_mast->id->cellAttributes() ?>>
<span id="el_lab_drug_mast_id">
<span<?php echo $lab_drug_mast->id->viewAttributes() ?>>
<?php echo $lab_drug_mast->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lab_drug_mast_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_drug_mast->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_drug_mast_view->terminate();
?>