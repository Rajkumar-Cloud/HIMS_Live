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
$pres_categoryallergy_view = new pres_categoryallergy_view();

// Run the page
$pres_categoryallergy_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_categoryallergy_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_categoryallergy->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpres_categoryallergyview = currentForm = new ew.Form("fpres_categoryallergyview", "view");

// Form_CustomValidate event
fpres_categoryallergyview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_categoryallergyview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pres_categoryallergy->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_categoryallergy_view->ExportOptions->render("body") ?>
<?php $pres_categoryallergy_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_categoryallergy_view->showPageHeader(); ?>
<?php
$pres_categoryallergy_view->showMessage();
?>
<form name="fpres_categoryallergyview" id="fpres_categoryallergyview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_categoryallergy_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_categoryallergy_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_categoryallergy">
<input type="hidden" name="modal" value="<?php echo (int)$pres_categoryallergy_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_categoryallergy->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_categoryallergy_view->TableLeftColumnClass ?>"><span id="elh_pres_categoryallergy_id"><?php echo $pres_categoryallergy->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pres_categoryallergy->id->cellAttributes() ?>>
<span id="el_pres_categoryallergy_id">
<span<?php echo $pres_categoryallergy->id->viewAttributes() ?>>
<?php echo $pres_categoryallergy->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_categoryallergy->Genericname->Visible) { // Genericname ?>
	<tr id="r_Genericname">
		<td class="<?php echo $pres_categoryallergy_view->TableLeftColumnClass ?>"><span id="elh_pres_categoryallergy_Genericname"><?php echo $pres_categoryallergy->Genericname->caption() ?></span></td>
		<td data-name="Genericname"<?php echo $pres_categoryallergy->Genericname->cellAttributes() ?>>
<span id="el_pres_categoryallergy_Genericname">
<span<?php echo $pres_categoryallergy->Genericname->viewAttributes() ?>>
<?php echo $pres_categoryallergy->Genericname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_categoryallergy->CategoryDrug->Visible) { // CategoryDrug ?>
	<tr id="r_CategoryDrug">
		<td class="<?php echo $pres_categoryallergy_view->TableLeftColumnClass ?>"><span id="elh_pres_categoryallergy_CategoryDrug"><?php echo $pres_categoryallergy->CategoryDrug->caption() ?></span></td>
		<td data-name="CategoryDrug"<?php echo $pres_categoryallergy->CategoryDrug->cellAttributes() ?>>
<span id="el_pres_categoryallergy_CategoryDrug">
<span<?php echo $pres_categoryallergy->CategoryDrug->viewAttributes() ?>>
<?php echo $pres_categoryallergy->CategoryDrug->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_categoryallergy_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_categoryallergy->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_categoryallergy_view->terminate();
?>