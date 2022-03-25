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
$ivf_agency_view = new ivf_agency_view();

// Run the page
$ivf_agency_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_agency_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_agency->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fivf_agencyview = currentForm = new ew.Form("fivf_agencyview", "view");

// Form_CustomValidate event
fivf_agencyview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_agencyview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_agency->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_agency_view->ExportOptions->render("body") ?>
<?php $ivf_agency_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_agency_view->showPageHeader(); ?>
<?php
$ivf_agency_view->showMessage();
?>
<form name="fivf_agencyview" id="fivf_agencyview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_agency_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_agency_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_agency">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_agency_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_agency->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_agency_view->TableLeftColumnClass ?>"><span id="elh_ivf_agency_id"><?php echo $ivf_agency->id->caption() ?></span></td>
		<td data-name="id"<?php echo $ivf_agency->id->cellAttributes() ?>>
<span id="el_ivf_agency_id">
<span<?php echo $ivf_agency->id->viewAttributes() ?>>
<?php echo $ivf_agency->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_agency->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_agency_view->TableLeftColumnClass ?>"><span id="elh_ivf_agency_Name"><?php echo $ivf_agency->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $ivf_agency->Name->cellAttributes() ?>>
<span id="el_ivf_agency_Name">
<span<?php echo $ivf_agency->Name->viewAttributes() ?>>
<?php echo $ivf_agency->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_agency->Street->Visible) { // Street ?>
	<tr id="r_Street">
		<td class="<?php echo $ivf_agency_view->TableLeftColumnClass ?>"><span id="elh_ivf_agency_Street"><?php echo $ivf_agency->Street->caption() ?></span></td>
		<td data-name="Street"<?php echo $ivf_agency->Street->cellAttributes() ?>>
<span id="el_ivf_agency_Street">
<span<?php echo $ivf_agency->Street->viewAttributes() ?>>
<?php echo $ivf_agency->Street->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_agency->Town->Visible) { // Town ?>
	<tr id="r_Town">
		<td class="<?php echo $ivf_agency_view->TableLeftColumnClass ?>"><span id="elh_ivf_agency_Town"><?php echo $ivf_agency->Town->caption() ?></span></td>
		<td data-name="Town"<?php echo $ivf_agency->Town->cellAttributes() ?>>
<span id="el_ivf_agency_Town">
<span<?php echo $ivf_agency->Town->viewAttributes() ?>>
<?php echo $ivf_agency->Town->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_agency->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $ivf_agency_view->TableLeftColumnClass ?>"><span id="elh_ivf_agency_State"><?php echo $ivf_agency->State->caption() ?></span></td>
		<td data-name="State"<?php echo $ivf_agency->State->cellAttributes() ?>>
<span id="el_ivf_agency_State">
<span<?php echo $ivf_agency->State->viewAttributes() ?>>
<?php echo $ivf_agency->State->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_agency->Pin->Visible) { // Pin ?>
	<tr id="r_Pin">
		<td class="<?php echo $ivf_agency_view->TableLeftColumnClass ?>"><span id="elh_ivf_agency_Pin"><?php echo $ivf_agency->Pin->caption() ?></span></td>
		<td data-name="Pin"<?php echo $ivf_agency->Pin->cellAttributes() ?>>
<span id="el_ivf_agency_Pin">
<span<?php echo $ivf_agency->Pin->viewAttributes() ?>>
<?php echo $ivf_agency->Pin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_agency_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_agency->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_agency_view->terminate();
?>