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
$pharmacy_master_genericgrp_view = new pharmacy_master_genericgrp_view();

// Run the page
$pharmacy_master_genericgrp_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_genericgrp_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_master_genericgrp->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_master_genericgrpview = currentForm = new ew.Form("fpharmacy_master_genericgrpview", "view");

// Form_CustomValidate event
fpharmacy_master_genericgrpview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_master_genericgrpview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_master_genericgrp->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_master_genericgrp_view->ExportOptions->render("body") ?>
<?php $pharmacy_master_genericgrp_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_master_genericgrp_view->showPageHeader(); ?>
<?php
$pharmacy_master_genericgrp_view->showMessage();
?>
<form name="fpharmacy_master_genericgrpview" id="fpharmacy_master_genericgrpview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_master_genericgrp_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_master_genericgrp_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_genericgrp">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_master_genericgrp_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_master_genericgrp->GENNAME->Visible) { // GENNAME ?>
	<tr id="r_GENNAME">
		<td class="<?php echo $pharmacy_master_genericgrp_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_genericgrp_GENNAME"><?php echo $pharmacy_master_genericgrp->GENNAME->caption() ?></span></td>
		<td data-name="GENNAME"<?php echo $pharmacy_master_genericgrp->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_master_genericgrp_GENNAME">
<span<?php echo $pharmacy_master_genericgrp->GENNAME->viewAttributes() ?>>
<?php echo $pharmacy_master_genericgrp->GENNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_master_genericgrp->CODE->Visible) { // CODE ?>
	<tr id="r_CODE">
		<td class="<?php echo $pharmacy_master_genericgrp_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_genericgrp_CODE"><?php echo $pharmacy_master_genericgrp->CODE->caption() ?></span></td>
		<td data-name="CODE"<?php echo $pharmacy_master_genericgrp->CODE->cellAttributes() ?>>
<span id="el_pharmacy_master_genericgrp_CODE">
<span<?php echo $pharmacy_master_genericgrp->CODE->viewAttributes() ?>>
<?php echo $pharmacy_master_genericgrp->CODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_master_genericgrp->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_master_genericgrp_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_genericgrp_id"><?php echo $pharmacy_master_genericgrp->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pharmacy_master_genericgrp->id->cellAttributes() ?>>
<span id="el_pharmacy_master_genericgrp_id">
<span<?php echo $pharmacy_master_genericgrp->id->viewAttributes() ?>>
<?php echo $pharmacy_master_genericgrp->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_master_genericgrp_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_master_genericgrp->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_master_genericgrp_view->terminate();
?>