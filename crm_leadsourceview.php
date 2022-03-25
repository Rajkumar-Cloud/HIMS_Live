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
$crm_leadsource_view = new crm_leadsource_view();

// Run the page
$crm_leadsource_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leadsource_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$crm_leadsource->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fcrm_leadsourceview = currentForm = new ew.Form("fcrm_leadsourceview", "view");

// Form_CustomValidate event
fcrm_leadsourceview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leadsourceview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$crm_leadsource->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $crm_leadsource_view->ExportOptions->render("body") ?>
<?php $crm_leadsource_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $crm_leadsource_view->showPageHeader(); ?>
<?php
$crm_leadsource_view->showMessage();
?>
<form name="fcrm_leadsourceview" id="fcrm_leadsourceview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leadsource_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leadsource_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leadsource">
<input type="hidden" name="modal" value="<?php echo (int)$crm_leadsource_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($crm_leadsource->leadsourceid->Visible) { // leadsourceid ?>
	<tr id="r_leadsourceid">
		<td class="<?php echo $crm_leadsource_view->TableLeftColumnClass ?>"><span id="elh_crm_leadsource_leadsourceid"><?php echo $crm_leadsource->leadsourceid->caption() ?></span></td>
		<td data-name="leadsourceid"<?php echo $crm_leadsource->leadsourceid->cellAttributes() ?>>
<span id="el_crm_leadsource_leadsourceid">
<span<?php echo $crm_leadsource->leadsourceid->viewAttributes() ?>>
<?php echo $crm_leadsource->leadsourceid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadsource->leadsource->Visible) { // leadsource ?>
	<tr id="r_leadsource">
		<td class="<?php echo $crm_leadsource_view->TableLeftColumnClass ?>"><span id="elh_crm_leadsource_leadsource"><?php echo $crm_leadsource->leadsource->caption() ?></span></td>
		<td data-name="leadsource"<?php echo $crm_leadsource->leadsource->cellAttributes() ?>>
<span id="el_crm_leadsource_leadsource">
<span<?php echo $crm_leadsource->leadsource->viewAttributes() ?>>
<?php echo $crm_leadsource->leadsource->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadsource->presence->Visible) { // presence ?>
	<tr id="r_presence">
		<td class="<?php echo $crm_leadsource_view->TableLeftColumnClass ?>"><span id="elh_crm_leadsource_presence"><?php echo $crm_leadsource->presence->caption() ?></span></td>
		<td data-name="presence"<?php echo $crm_leadsource->presence->cellAttributes() ?>>
<span id="el_crm_leadsource_presence">
<span<?php echo $crm_leadsource->presence->viewAttributes() ?>>
<?php echo $crm_leadsource->presence->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadsource->picklist_valueid->Visible) { // picklist_valueid ?>
	<tr id="r_picklist_valueid">
		<td class="<?php echo $crm_leadsource_view->TableLeftColumnClass ?>"><span id="elh_crm_leadsource_picklist_valueid"><?php echo $crm_leadsource->picklist_valueid->caption() ?></span></td>
		<td data-name="picklist_valueid"<?php echo $crm_leadsource->picklist_valueid->cellAttributes() ?>>
<span id="el_crm_leadsource_picklist_valueid">
<span<?php echo $crm_leadsource->picklist_valueid->viewAttributes() ?>>
<?php echo $crm_leadsource->picklist_valueid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadsource->sortorderid->Visible) { // sortorderid ?>
	<tr id="r_sortorderid">
		<td class="<?php echo $crm_leadsource_view->TableLeftColumnClass ?>"><span id="elh_crm_leadsource_sortorderid"><?php echo $crm_leadsource->sortorderid->caption() ?></span></td>
		<td data-name="sortorderid"<?php echo $crm_leadsource->sortorderid->cellAttributes() ?>>
<span id="el_crm_leadsource_sortorderid">
<span<?php echo $crm_leadsource->sortorderid->viewAttributes() ?>>
<?php echo $crm_leadsource->sortorderid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$crm_leadsource_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$crm_leadsource->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$crm_leadsource_view->terminate();
?>