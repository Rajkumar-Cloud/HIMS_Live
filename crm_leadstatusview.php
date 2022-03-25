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
$crm_leadstatus_view = new crm_leadstatus_view();

// Run the page
$crm_leadstatus_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leadstatus_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$crm_leadstatus->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fcrm_leadstatusview = currentForm = new ew.Form("fcrm_leadstatusview", "view");

// Form_CustomValidate event
fcrm_leadstatusview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leadstatusview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$crm_leadstatus->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $crm_leadstatus_view->ExportOptions->render("body") ?>
<?php $crm_leadstatus_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $crm_leadstatus_view->showPageHeader(); ?>
<?php
$crm_leadstatus_view->showMessage();
?>
<form name="fcrm_leadstatusview" id="fcrm_leadstatusview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leadstatus_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leadstatus_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leadstatus">
<input type="hidden" name="modal" value="<?php echo (int)$crm_leadstatus_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($crm_leadstatus->leadstatusid->Visible) { // leadstatusid ?>
	<tr id="r_leadstatusid">
		<td class="<?php echo $crm_leadstatus_view->TableLeftColumnClass ?>"><span id="elh_crm_leadstatus_leadstatusid"><?php echo $crm_leadstatus->leadstatusid->caption() ?></span></td>
		<td data-name="leadstatusid"<?php echo $crm_leadstatus->leadstatusid->cellAttributes() ?>>
<span id="el_crm_leadstatus_leadstatusid">
<span<?php echo $crm_leadstatus->leadstatusid->viewAttributes() ?>>
<?php echo $crm_leadstatus->leadstatusid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadstatus->leadstatus->Visible) { // leadstatus ?>
	<tr id="r_leadstatus">
		<td class="<?php echo $crm_leadstatus_view->TableLeftColumnClass ?>"><span id="elh_crm_leadstatus_leadstatus"><?php echo $crm_leadstatus->leadstatus->caption() ?></span></td>
		<td data-name="leadstatus"<?php echo $crm_leadstatus->leadstatus->cellAttributes() ?>>
<span id="el_crm_leadstatus_leadstatus">
<span<?php echo $crm_leadstatus->leadstatus->viewAttributes() ?>>
<?php echo $crm_leadstatus->leadstatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadstatus->presence->Visible) { // presence ?>
	<tr id="r_presence">
		<td class="<?php echo $crm_leadstatus_view->TableLeftColumnClass ?>"><span id="elh_crm_leadstatus_presence"><?php echo $crm_leadstatus->presence->caption() ?></span></td>
		<td data-name="presence"<?php echo $crm_leadstatus->presence->cellAttributes() ?>>
<span id="el_crm_leadstatus_presence">
<span<?php echo $crm_leadstatus->presence->viewAttributes() ?>>
<?php echo $crm_leadstatus->presence->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadstatus->picklist_valueid->Visible) { // picklist_valueid ?>
	<tr id="r_picklist_valueid">
		<td class="<?php echo $crm_leadstatus_view->TableLeftColumnClass ?>"><span id="elh_crm_leadstatus_picklist_valueid"><?php echo $crm_leadstatus->picklist_valueid->caption() ?></span></td>
		<td data-name="picklist_valueid"<?php echo $crm_leadstatus->picklist_valueid->cellAttributes() ?>>
<span id="el_crm_leadstatus_picklist_valueid">
<span<?php echo $crm_leadstatus->picklist_valueid->viewAttributes() ?>>
<?php echo $crm_leadstatus->picklist_valueid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadstatus->sortorderid->Visible) { // sortorderid ?>
	<tr id="r_sortorderid">
		<td class="<?php echo $crm_leadstatus_view->TableLeftColumnClass ?>"><span id="elh_crm_leadstatus_sortorderid"><?php echo $crm_leadstatus->sortorderid->caption() ?></span></td>
		<td data-name="sortorderid"<?php echo $crm_leadstatus->sortorderid->cellAttributes() ?>>
<span id="el_crm_leadstatus_sortorderid">
<span<?php echo $crm_leadstatus->sortorderid->viewAttributes() ?>>
<?php echo $crm_leadstatus->sortorderid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadstatus->color->Visible) { // color ?>
	<tr id="r_color">
		<td class="<?php echo $crm_leadstatus_view->TableLeftColumnClass ?>"><span id="elh_crm_leadstatus_color"><?php echo $crm_leadstatus->color->caption() ?></span></td>
		<td data-name="color"<?php echo $crm_leadstatus->color->cellAttributes() ?>>
<span id="el_crm_leadstatus_color">
<span<?php echo $crm_leadstatus->color->viewAttributes() ?>>
<?php echo $crm_leadstatus->color->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$crm_leadstatus_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$crm_leadstatus->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$crm_leadstatus_view->terminate();
?>