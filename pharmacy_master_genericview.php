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
$pharmacy_master_generic_view = new pharmacy_master_generic_view();

// Run the page
$pharmacy_master_generic_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_generic_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_master_generic->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_master_genericview = currentForm = new ew.Form("fpharmacy_master_genericview", "view");

// Form_CustomValidate event
fpharmacy_master_genericview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_master_genericview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_master_genericview.lists["x_GRPCODE"] = <?php echo $pharmacy_master_generic_view->GRPCODE->Lookup->toClientList() ?>;
fpharmacy_master_genericview.lists["x_GRPCODE"].options = <?php echo JsonEncode($pharmacy_master_generic_view->GRPCODE->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_master_generic->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_master_generic_view->ExportOptions->render("body") ?>
<?php $pharmacy_master_generic_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_master_generic_view->showPageHeader(); ?>
<?php
$pharmacy_master_generic_view->showMessage();
?>
<form name="fpharmacy_master_genericview" id="fpharmacy_master_genericview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_master_generic_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_master_generic_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_generic">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_master_generic_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_master_generic->GENNAME->Visible) { // GENNAME ?>
	<tr id="r_GENNAME">
		<td class="<?php echo $pharmacy_master_generic_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_generic_GENNAME"><?php echo $pharmacy_master_generic->GENNAME->caption() ?></span></td>
		<td data-name="GENNAME"<?php echo $pharmacy_master_generic->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_master_generic_GENNAME">
<span<?php echo $pharmacy_master_generic->GENNAME->viewAttributes() ?>>
<?php echo $pharmacy_master_generic->GENNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_master_generic->CODE->Visible) { // CODE ?>
	<tr id="r_CODE">
		<td class="<?php echo $pharmacy_master_generic_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_generic_CODE"><?php echo $pharmacy_master_generic->CODE->caption() ?></span></td>
		<td data-name="CODE"<?php echo $pharmacy_master_generic->CODE->cellAttributes() ?>>
<span id="el_pharmacy_master_generic_CODE">
<span<?php echo $pharmacy_master_generic->CODE->viewAttributes() ?>>
<?php echo $pharmacy_master_generic->CODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_master_generic->GRPCODE->Visible) { // GRPCODE ?>
	<tr id="r_GRPCODE">
		<td class="<?php echo $pharmacy_master_generic_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_generic_GRPCODE"><?php echo $pharmacy_master_generic->GRPCODE->caption() ?></span></td>
		<td data-name="GRPCODE"<?php echo $pharmacy_master_generic->GRPCODE->cellAttributes() ?>>
<span id="el_pharmacy_master_generic_GRPCODE">
<span<?php echo $pharmacy_master_generic->GRPCODE->viewAttributes() ?>>
<?php echo $pharmacy_master_generic->GRPCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_master_generic->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_master_generic_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_generic_id"><?php echo $pharmacy_master_generic->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pharmacy_master_generic->id->cellAttributes() ?>>
<span id="el_pharmacy_master_generic_id">
<span<?php echo $pharmacy_master_generic->id->viewAttributes() ?>>
<?php echo $pharmacy_master_generic->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_master_generic_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_master_generic->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_master_generic_view->terminate();
?>