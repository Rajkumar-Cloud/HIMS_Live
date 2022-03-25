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
$sys_certifications_view = new sys_certifications_view();

// Run the page
$sys_certifications_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_certifications_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sys_certifications->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsys_certificationsview = currentForm = new ew.Form("fsys_certificationsview", "view");

// Form_CustomValidate event
fsys_certificationsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_certificationsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$sys_certifications->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sys_certifications_view->ExportOptions->render("body") ?>
<?php $sys_certifications_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sys_certifications_view->showPageHeader(); ?>
<?php
$sys_certifications_view->showMessage();
?>
<form name="fsys_certificationsview" id="fsys_certificationsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_certifications_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_certifications_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_certifications">
<input type="hidden" name="modal" value="<?php echo (int)$sys_certifications_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sys_certifications->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $sys_certifications_view->TableLeftColumnClass ?>"><span id="elh_sys_certifications_id"><?php echo $sys_certifications->id->caption() ?></span></td>
		<td data-name="id"<?php echo $sys_certifications->id->cellAttributes() ?>>
<span id="el_sys_certifications_id">
<span<?php echo $sys_certifications->id->viewAttributes() ?>>
<?php echo $sys_certifications->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_certifications->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $sys_certifications_view->TableLeftColumnClass ?>"><span id="elh_sys_certifications_name"><?php echo $sys_certifications->name->caption() ?></span></td>
		<td data-name="name"<?php echo $sys_certifications->name->cellAttributes() ?>>
<span id="el_sys_certifications_name">
<span<?php echo $sys_certifications->name->viewAttributes() ?>>
<?php echo $sys_certifications->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_certifications->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $sys_certifications_view->TableLeftColumnClass ?>"><span id="elh_sys_certifications_description"><?php echo $sys_certifications->description->caption() ?></span></td>
		<td data-name="description"<?php echo $sys_certifications->description->cellAttributes() ?>>
<span id="el_sys_certifications_description">
<span<?php echo $sys_certifications->description->viewAttributes() ?>>
<?php echo $sys_certifications->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_certifications->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $sys_certifications_view->TableLeftColumnClass ?>"><span id="elh_sys_certifications_HospID"><?php echo $sys_certifications->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $sys_certifications->HospID->cellAttributes() ?>>
<span id="el_sys_certifications_HospID">
<span<?php echo $sys_certifications->HospID->viewAttributes() ?>>
<?php echo $sys_certifications->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sys_certifications_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sys_certifications->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sys_certifications_view->terminate();
?>