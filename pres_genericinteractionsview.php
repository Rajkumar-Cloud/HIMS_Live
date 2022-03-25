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
$pres_genericinteractions_view = new pres_genericinteractions_view();

// Run the page
$pres_genericinteractions_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_genericinteractions_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_genericinteractions->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpres_genericinteractionsview = currentForm = new ew.Form("fpres_genericinteractionsview", "view");

// Form_CustomValidate event
fpres_genericinteractionsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_genericinteractionsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pres_genericinteractions->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_genericinteractions_view->ExportOptions->render("body") ?>
<?php $pres_genericinteractions_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_genericinteractions_view->showPageHeader(); ?>
<?php
$pres_genericinteractions_view->showMessage();
?>
<form name="fpres_genericinteractionsview" id="fpres_genericinteractionsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_genericinteractions_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_genericinteractions_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_genericinteractions">
<input type="hidden" name="modal" value="<?php echo (int)$pres_genericinteractions_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_genericinteractions->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_id"><?php echo $pres_genericinteractions->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pres_genericinteractions->id->cellAttributes() ?>>
<span id="el_pres_genericinteractions_id">
<span<?php echo $pres_genericinteractions->id->viewAttributes() ?>>
<?php echo $pres_genericinteractions->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_genericinteractions->Genericname->Visible) { // Genericname ?>
	<tr id="r_Genericname">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Genericname"><?php echo $pres_genericinteractions->Genericname->caption() ?></span></td>
		<td data-name="Genericname"<?php echo $pres_genericinteractions->Genericname->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Genericname">
<span<?php echo $pres_genericinteractions->Genericname->viewAttributes() ?>>
<?php echo $pres_genericinteractions->Genericname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_genericinteractions->Catid->Visible) { // Catid ?>
	<tr id="r_Catid">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Catid"><?php echo $pres_genericinteractions->Catid->caption() ?></span></td>
		<td data-name="Catid"<?php echo $pres_genericinteractions->Catid->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Catid">
<span<?php echo $pres_genericinteractions->Catid->viewAttributes() ?>>
<?php echo $pres_genericinteractions->Catid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_genericinteractions->Interactions->Visible) { // Interactions ?>
	<tr id="r_Interactions">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Interactions"><?php echo $pres_genericinteractions->Interactions->caption() ?></span></td>
		<td data-name="Interactions"<?php echo $pres_genericinteractions->Interactions->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Interactions">
<span<?php echo $pres_genericinteractions->Interactions->viewAttributes() ?>>
<?php echo $pres_genericinteractions->Interactions->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_genericinteractions->Intid->Visible) { // Intid ?>
	<tr id="r_Intid">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Intid"><?php echo $pres_genericinteractions->Intid->caption() ?></span></td>
		<td data-name="Intid"<?php echo $pres_genericinteractions->Intid->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Intid">
<span<?php echo $pres_genericinteractions->Intid->viewAttributes() ?>>
<?php echo $pres_genericinteractions->Intid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_genericinteractions->Createddt->Visible) { // Createddt ?>
	<tr id="r_Createddt">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Createddt"><?php echo $pres_genericinteractions->Createddt->caption() ?></span></td>
		<td data-name="Createddt"<?php echo $pres_genericinteractions->Createddt->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Createddt">
<span<?php echo $pres_genericinteractions->Createddt->viewAttributes() ?>>
<?php echo $pres_genericinteractions->Createddt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_genericinteractions->Createdtm->Visible) { // Createdtm ?>
	<tr id="r_Createdtm">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Createdtm"><?php echo $pres_genericinteractions->Createdtm->caption() ?></span></td>
		<td data-name="Createdtm"<?php echo $pres_genericinteractions->Createdtm->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Createdtm">
<span<?php echo $pres_genericinteractions->Createdtm->viewAttributes() ?>>
<?php echo $pres_genericinteractions->Createdtm->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_genericinteractions->Statusbit->Visible) { // Statusbit ?>
	<tr id="r_Statusbit">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Statusbit"><?php echo $pres_genericinteractions->Statusbit->caption() ?></span></td>
		<td data-name="Statusbit"<?php echo $pres_genericinteractions->Statusbit->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Statusbit">
<span<?php echo $pres_genericinteractions->Statusbit->viewAttributes() ?>>
<?php echo $pres_genericinteractions->Statusbit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_genericinteractions->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Remarks"><?php echo $pres_genericinteractions->Remarks->caption() ?></span></td>
		<td data-name="Remarks"<?php echo $pres_genericinteractions->Remarks->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Remarks">
<span<?php echo $pres_genericinteractions->Remarks->viewAttributes() ?>>
<?php echo $pres_genericinteractions->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_genericinteractions->Username->Visible) { // Username ?>
	<tr id="r_Username">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Username"><?php echo $pres_genericinteractions->Username->caption() ?></span></td>
		<td data-name="Username"<?php echo $pres_genericinteractions->Username->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Username">
<span<?php echo $pres_genericinteractions->Username->viewAttributes() ?>>
<?php echo $pres_genericinteractions->Username->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_genericinteractions_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_genericinteractions->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_genericinteractions_view->terminate();
?>