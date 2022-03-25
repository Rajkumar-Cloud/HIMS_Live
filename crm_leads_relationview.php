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
$crm_leads_relation_view = new crm_leads_relation_view();

// Run the page
$crm_leads_relation_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leads_relation_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$crm_leads_relation->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fcrm_leads_relationview = currentForm = new ew.Form("fcrm_leads_relationview", "view");

// Form_CustomValidate event
fcrm_leads_relationview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leads_relationview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$crm_leads_relation->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $crm_leads_relation_view->ExportOptions->render("body") ?>
<?php $crm_leads_relation_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $crm_leads_relation_view->showPageHeader(); ?>
<?php
$crm_leads_relation_view->showMessage();
?>
<form name="fcrm_leads_relationview" id="fcrm_leads_relationview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leads_relation_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leads_relation_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leads_relation">
<input type="hidden" name="modal" value="<?php echo (int)$crm_leads_relation_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($crm_leads_relation->leads_relationid->Visible) { // leads_relationid ?>
	<tr id="r_leads_relationid">
		<td class="<?php echo $crm_leads_relation_view->TableLeftColumnClass ?>"><span id="elh_crm_leads_relation_leads_relationid"><?php echo $crm_leads_relation->leads_relationid->caption() ?></span></td>
		<td data-name="leads_relationid"<?php echo $crm_leads_relation->leads_relationid->cellAttributes() ?>>
<span id="el_crm_leads_relation_leads_relationid">
<span<?php echo $crm_leads_relation->leads_relationid->viewAttributes() ?>>
<?php echo $crm_leads_relation->leads_relationid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leads_relation->leads_relation->Visible) { // leads_relation ?>
	<tr id="r_leads_relation">
		<td class="<?php echo $crm_leads_relation_view->TableLeftColumnClass ?>"><span id="elh_crm_leads_relation_leads_relation"><?php echo $crm_leads_relation->leads_relation->caption() ?></span></td>
		<td data-name="leads_relation"<?php echo $crm_leads_relation->leads_relation->cellAttributes() ?>>
<span id="el_crm_leads_relation_leads_relation">
<span<?php echo $crm_leads_relation->leads_relation->viewAttributes() ?>>
<?php echo $crm_leads_relation->leads_relation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leads_relation->sortorderid->Visible) { // sortorderid ?>
	<tr id="r_sortorderid">
		<td class="<?php echo $crm_leads_relation_view->TableLeftColumnClass ?>"><span id="elh_crm_leads_relation_sortorderid"><?php echo $crm_leads_relation->sortorderid->caption() ?></span></td>
		<td data-name="sortorderid"<?php echo $crm_leads_relation->sortorderid->cellAttributes() ?>>
<span id="el_crm_leads_relation_sortorderid">
<span<?php echo $crm_leads_relation->sortorderid->viewAttributes() ?>>
<?php echo $crm_leads_relation->sortorderid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leads_relation->presence->Visible) { // presence ?>
	<tr id="r_presence">
		<td class="<?php echo $crm_leads_relation_view->TableLeftColumnClass ?>"><span id="elh_crm_leads_relation_presence"><?php echo $crm_leads_relation->presence->caption() ?></span></td>
		<td data-name="presence"<?php echo $crm_leads_relation->presence->cellAttributes() ?>>
<span id="el_crm_leads_relation_presence">
<span<?php echo $crm_leads_relation->presence->viewAttributes() ?>>
<?php echo $crm_leads_relation->presence->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$crm_leads_relation_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$crm_leads_relation->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$crm_leads_relation_view->terminate();
?>