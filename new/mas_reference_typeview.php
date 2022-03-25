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
$mas_reference_type_view = new mas_reference_type_view();

// Run the page
$mas_reference_type_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_reference_type_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_reference_type_view->isExport()) { ?>
<script>
var fmas_reference_typeview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmas_reference_typeview = currentForm = new ew.Form("fmas_reference_typeview", "view");
	loadjs.done("fmas_reference_typeview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$mas_reference_type_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_reference_type_view->ExportOptions->render("body") ?>
<?php $mas_reference_type_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_reference_type_view->showPageHeader(); ?>
<?php
$mas_reference_type_view->showMessage();
?>
<form name="fmas_reference_typeview" id="fmas_reference_typeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_reference_type">
<input type="hidden" name="modal" value="<?php echo (int)$mas_reference_type_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_reference_type_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_reference_type_view->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_id"><?php echo $mas_reference_type_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $mas_reference_type_view->id->cellAttributes() ?>>
<span id="el_mas_reference_type_id">
<span<?php echo $mas_reference_type_view->id->viewAttributes() ?>><?php echo $mas_reference_type_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_reference_type_view->reference->Visible) { // reference ?>
	<tr id="r_reference">
		<td class="<?php echo $mas_reference_type_view->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_reference"><?php echo $mas_reference_type_view->reference->caption() ?></span></td>
		<td data-name="reference" <?php echo $mas_reference_type_view->reference->cellAttributes() ?>>
<span id="el_mas_reference_type_reference">
<span<?php echo $mas_reference_type_view->reference->viewAttributes() ?>><?php echo $mas_reference_type_view->reference->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_reference_type_view->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<tr id="r_ReferMobileNo">
		<td class="<?php echo $mas_reference_type_view->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_ReferMobileNo"><?php echo $mas_reference_type_view->ReferMobileNo->caption() ?></span></td>
		<td data-name="ReferMobileNo" <?php echo $mas_reference_type_view->ReferMobileNo->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferMobileNo">
<span<?php echo $mas_reference_type_view->ReferMobileNo->viewAttributes() ?>><?php echo $mas_reference_type_view->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_reference_type_view->ReferClinicname->Visible) { // ReferClinicname ?>
	<tr id="r_ReferClinicname">
		<td class="<?php echo $mas_reference_type_view->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_ReferClinicname"><?php echo $mas_reference_type_view->ReferClinicname->caption() ?></span></td>
		<td data-name="ReferClinicname" <?php echo $mas_reference_type_view->ReferClinicname->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferClinicname">
<span<?php echo $mas_reference_type_view->ReferClinicname->viewAttributes() ?>><?php echo $mas_reference_type_view->ReferClinicname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_reference_type_view->ReferCity->Visible) { // ReferCity ?>
	<tr id="r_ReferCity">
		<td class="<?php echo $mas_reference_type_view->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_ReferCity"><?php echo $mas_reference_type_view->ReferCity->caption() ?></span></td>
		<td data-name="ReferCity" <?php echo $mas_reference_type_view->ReferCity->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferCity">
<span<?php echo $mas_reference_type_view->ReferCity->viewAttributes() ?>><?php echo $mas_reference_type_view->ReferCity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_reference_type_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_reference_type_view->isExport()) { ?>
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
$mas_reference_type_view->terminate();
?>