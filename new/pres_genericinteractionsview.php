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
<?php include_once "header.php"; ?>
<?php if (!$pres_genericinteractions_view->isExport()) { ?>
<script>
var fpres_genericinteractionsview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpres_genericinteractionsview = currentForm = new ew.Form("fpres_genericinteractionsview", "view");
	loadjs.done("fpres_genericinteractionsview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pres_genericinteractions_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_genericinteractions">
<input type="hidden" name="modal" value="<?php echo (int)$pres_genericinteractions_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_genericinteractions_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_id"><?php echo $pres_genericinteractions_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pres_genericinteractions_view->id->cellAttributes() ?>>
<span id="el_pres_genericinteractions_id">
<span<?php echo $pres_genericinteractions_view->id->viewAttributes() ?>><?php echo $pres_genericinteractions_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_genericinteractions_view->Genericname->Visible) { // Genericname ?>
	<tr id="r_Genericname">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Genericname"><?php echo $pres_genericinteractions_view->Genericname->caption() ?></span></td>
		<td data-name="Genericname" <?php echo $pres_genericinteractions_view->Genericname->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Genericname">
<span<?php echo $pres_genericinteractions_view->Genericname->viewAttributes() ?>><?php echo $pres_genericinteractions_view->Genericname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_genericinteractions_view->Catid->Visible) { // Catid ?>
	<tr id="r_Catid">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Catid"><?php echo $pres_genericinteractions_view->Catid->caption() ?></span></td>
		<td data-name="Catid" <?php echo $pres_genericinteractions_view->Catid->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Catid">
<span<?php echo $pres_genericinteractions_view->Catid->viewAttributes() ?>><?php echo $pres_genericinteractions_view->Catid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_genericinteractions_view->Interactions->Visible) { // Interactions ?>
	<tr id="r_Interactions">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Interactions"><?php echo $pres_genericinteractions_view->Interactions->caption() ?></span></td>
		<td data-name="Interactions" <?php echo $pres_genericinteractions_view->Interactions->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Interactions">
<span<?php echo $pres_genericinteractions_view->Interactions->viewAttributes() ?>><?php echo $pres_genericinteractions_view->Interactions->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_genericinteractions_view->Intid->Visible) { // Intid ?>
	<tr id="r_Intid">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Intid"><?php echo $pres_genericinteractions_view->Intid->caption() ?></span></td>
		<td data-name="Intid" <?php echo $pres_genericinteractions_view->Intid->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Intid">
<span<?php echo $pres_genericinteractions_view->Intid->viewAttributes() ?>><?php echo $pres_genericinteractions_view->Intid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_genericinteractions_view->Createddt->Visible) { // Createddt ?>
	<tr id="r_Createddt">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Createddt"><?php echo $pres_genericinteractions_view->Createddt->caption() ?></span></td>
		<td data-name="Createddt" <?php echo $pres_genericinteractions_view->Createddt->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Createddt">
<span<?php echo $pres_genericinteractions_view->Createddt->viewAttributes() ?>><?php echo $pres_genericinteractions_view->Createddt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_genericinteractions_view->Createdtm->Visible) { // Createdtm ?>
	<tr id="r_Createdtm">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Createdtm"><?php echo $pres_genericinteractions_view->Createdtm->caption() ?></span></td>
		<td data-name="Createdtm" <?php echo $pres_genericinteractions_view->Createdtm->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Createdtm">
<span<?php echo $pres_genericinteractions_view->Createdtm->viewAttributes() ?>><?php echo $pres_genericinteractions_view->Createdtm->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_genericinteractions_view->Statusbit->Visible) { // Statusbit ?>
	<tr id="r_Statusbit">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Statusbit"><?php echo $pres_genericinteractions_view->Statusbit->caption() ?></span></td>
		<td data-name="Statusbit" <?php echo $pres_genericinteractions_view->Statusbit->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Statusbit">
<span<?php echo $pres_genericinteractions_view->Statusbit->viewAttributes() ?>><?php echo $pres_genericinteractions_view->Statusbit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_genericinteractions_view->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Remarks"><?php echo $pres_genericinteractions_view->Remarks->caption() ?></span></td>
		<td data-name="Remarks" <?php echo $pres_genericinteractions_view->Remarks->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Remarks">
<span<?php echo $pres_genericinteractions_view->Remarks->viewAttributes() ?>><?php echo $pres_genericinteractions_view->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_genericinteractions_view->Username->Visible) { // Username ?>
	<tr id="r_Username">
		<td class="<?php echo $pres_genericinteractions_view->TableLeftColumnClass ?>"><span id="elh_pres_genericinteractions_Username"><?php echo $pres_genericinteractions_view->Username->caption() ?></span></td>
		<td data-name="Username" <?php echo $pres_genericinteractions_view->Username->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Username">
<span<?php echo $pres_genericinteractions_view->Username->viewAttributes() ?>><?php echo $pres_genericinteractions_view->Username->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_genericinteractions_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_genericinteractions_view->isExport()) { ?>
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
$pres_genericinteractions_view->terminate();
?>