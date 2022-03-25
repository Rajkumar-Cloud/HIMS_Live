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
$mas_bloodgroup_view = new mas_bloodgroup_view();

// Run the page
$mas_bloodgroup_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_bloodgroup_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_bloodgroup->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_bloodgroupview = currentForm = new ew.Form("fmas_bloodgroupview", "view");

// Form_CustomValidate event
fmas_bloodgroupview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_bloodgroupview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_bloodgroup->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_bloodgroup_view->ExportOptions->render("body") ?>
<?php $mas_bloodgroup_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_bloodgroup_view->showPageHeader(); ?>
<?php
$mas_bloodgroup_view->showMessage();
?>
<form name="fmas_bloodgroupview" id="fmas_bloodgroupview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_bloodgroup_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_bloodgroup_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_bloodgroup">
<input type="hidden" name="modal" value="<?php echo (int)$mas_bloodgroup_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_bloodgroup->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_bloodgroup_view->TableLeftColumnClass ?>"><span id="elh_mas_bloodgroup_id"><?php echo $mas_bloodgroup->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_bloodgroup->id->cellAttributes() ?>>
<span id="el_mas_bloodgroup_id">
<span<?php echo $mas_bloodgroup->id->viewAttributes() ?>>
<?php echo $mas_bloodgroup->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_bloodgroup->BloodGroup->Visible) { // BloodGroup ?>
	<tr id="r_BloodGroup">
		<td class="<?php echo $mas_bloodgroup_view->TableLeftColumnClass ?>"><span id="elh_mas_bloodgroup_BloodGroup"><?php echo $mas_bloodgroup->BloodGroup->caption() ?></span></td>
		<td data-name="BloodGroup"<?php echo $mas_bloodgroup->BloodGroup->cellAttributes() ?>>
<span id="el_mas_bloodgroup_BloodGroup">
<span<?php echo $mas_bloodgroup->BloodGroup->viewAttributes() ?>>
<?php echo $mas_bloodgroup->BloodGroup->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_bloodgroup_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_bloodgroup->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_bloodgroup_view->terminate();
?>