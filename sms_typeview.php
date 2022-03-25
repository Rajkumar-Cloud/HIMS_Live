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
$sms_type_view = new sms_type_view();

// Run the page
$sms_type_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sms_type_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sms_type->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsms_typeview = currentForm = new ew.Form("fsms_typeview", "view");

// Form_CustomValidate event
fsms_typeview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsms_typeview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$sms_type->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sms_type_view->ExportOptions->render("body") ?>
<?php $sms_type_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sms_type_view->showPageHeader(); ?>
<?php
$sms_type_view->showMessage();
?>
<form name="fsms_typeview" id="fsms_typeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sms_type_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sms_type_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sms_type">
<input type="hidden" name="modal" value="<?php echo (int)$sms_type_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sms_type->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $sms_type_view->TableLeftColumnClass ?>"><span id="elh_sms_type_id"><?php echo $sms_type->id->caption() ?></span></td>
		<td data-name="id"<?php echo $sms_type->id->cellAttributes() ?>>
<span id="el_sms_type_id">
<span<?php echo $sms_type->id->viewAttributes() ?>>
<?php echo $sms_type->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sms_type->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $sms_type_view->TableLeftColumnClass ?>"><span id="elh_sms_type_Name"><?php echo $sms_type->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $sms_type->Name->cellAttributes() ?>>
<span id="el_sms_type_Name">
<span<?php echo $sms_type->Name->viewAttributes() ?>>
<?php echo $sms_type->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sms_type_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sms_type->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sms_type_view->terminate();
?>