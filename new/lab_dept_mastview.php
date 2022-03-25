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
$lab_dept_mast_view = new lab_dept_mast_view();

// Run the page
$lab_dept_mast_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_dept_mast_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lab_dept_mast_view->isExport()) { ?>
<script>
var flab_dept_mastview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	flab_dept_mastview = currentForm = new ew.Form("flab_dept_mastview", "view");
	loadjs.done("flab_dept_mastview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$lab_dept_mast_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lab_dept_mast_view->ExportOptions->render("body") ?>
<?php $lab_dept_mast_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lab_dept_mast_view->showPageHeader(); ?>
<?php
$lab_dept_mast_view->showMessage();
?>
<form name="flab_dept_mastview" id="flab_dept_mastview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_dept_mast">
<input type="hidden" name="modal" value="<?php echo (int)$lab_dept_mast_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lab_dept_mast_view->MainCD->Visible) { // MainCD ?>
	<tr id="r_MainCD">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_MainCD"><?php echo $lab_dept_mast_view->MainCD->caption() ?></span></td>
		<td data-name="MainCD" <?php echo $lab_dept_mast_view->MainCD->cellAttributes() ?>>
<span id="el_lab_dept_mast_MainCD">
<span<?php echo $lab_dept_mast_view->MainCD->viewAttributes() ?>><?php echo $lab_dept_mast_view->MainCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast_view->Code->Visible) { // Code ?>
	<tr id="r_Code">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_Code"><?php echo $lab_dept_mast_view->Code->caption() ?></span></td>
		<td data-name="Code" <?php echo $lab_dept_mast_view->Code->cellAttributes() ?>>
<span id="el_lab_dept_mast_Code">
<span<?php echo $lab_dept_mast_view->Code->viewAttributes() ?>><?php echo $lab_dept_mast_view->Code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_Name"><?php echo $lab_dept_mast_view->Name->caption() ?></span></td>
		<td data-name="Name" <?php echo $lab_dept_mast_view->Name->cellAttributes() ?>>
<span id="el_lab_dept_mast_Name">
<span<?php echo $lab_dept_mast_view->Name->viewAttributes() ?>><?php echo $lab_dept_mast_view->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast_view->Order->Visible) { // Order ?>
	<tr id="r_Order">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_Order"><?php echo $lab_dept_mast_view->Order->caption() ?></span></td>
		<td data-name="Order" <?php echo $lab_dept_mast_view->Order->cellAttributes() ?>>
<span id="el_lab_dept_mast_Order">
<span<?php echo $lab_dept_mast_view->Order->viewAttributes() ?>><?php echo $lab_dept_mast_view->Order->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast_view->SignCD->Visible) { // SignCD ?>
	<tr id="r_SignCD">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_SignCD"><?php echo $lab_dept_mast_view->SignCD->caption() ?></span></td>
		<td data-name="SignCD" <?php echo $lab_dept_mast_view->SignCD->cellAttributes() ?>>
<span id="el_lab_dept_mast_SignCD">
<span<?php echo $lab_dept_mast_view->SignCD->viewAttributes() ?>><?php echo $lab_dept_mast_view->SignCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast_view->Collection->Visible) { // Collection ?>
	<tr id="r_Collection">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_Collection"><?php echo $lab_dept_mast_view->Collection->caption() ?></span></td>
		<td data-name="Collection" <?php echo $lab_dept_mast_view->Collection->cellAttributes() ?>>
<span id="el_lab_dept_mast_Collection">
<span<?php echo $lab_dept_mast_view->Collection->viewAttributes() ?>><?php echo $lab_dept_mast_view->Collection->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast_view->EditDate->Visible) { // EditDate ?>
	<tr id="r_EditDate">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_EditDate"><?php echo $lab_dept_mast_view->EditDate->caption() ?></span></td>
		<td data-name="EditDate" <?php echo $lab_dept_mast_view->EditDate->cellAttributes() ?>>
<span id="el_lab_dept_mast_EditDate">
<span<?php echo $lab_dept_mast_view->EditDate->viewAttributes() ?>><?php echo $lab_dept_mast_view->EditDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast_view->SMS->Visible) { // SMS ?>
	<tr id="r_SMS">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_SMS"><?php echo $lab_dept_mast_view->SMS->caption() ?></span></td>
		<td data-name="SMS" <?php echo $lab_dept_mast_view->SMS->cellAttributes() ?>>
<span id="el_lab_dept_mast_SMS">
<span<?php echo $lab_dept_mast_view->SMS->viewAttributes() ?>><?php echo $lab_dept_mast_view->SMS->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast_view->Note->Visible) { // Note ?>
	<tr id="r_Note">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_Note"><?php echo $lab_dept_mast_view->Note->caption() ?></span></td>
		<td data-name="Note" <?php echo $lab_dept_mast_view->Note->cellAttributes() ?>>
<span id="el_lab_dept_mast_Note">
<span<?php echo $lab_dept_mast_view->Note->viewAttributes() ?>><?php echo $lab_dept_mast_view->Note->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast_view->WorkList->Visible) { // WorkList ?>
	<tr id="r_WorkList">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_WorkList"><?php echo $lab_dept_mast_view->WorkList->caption() ?></span></td>
		<td data-name="WorkList" <?php echo $lab_dept_mast_view->WorkList->cellAttributes() ?>>
<span id="el_lab_dept_mast_WorkList">
<span<?php echo $lab_dept_mast_view->WorkList->viewAttributes() ?>><?php echo $lab_dept_mast_view->WorkList->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast_view->_Page->Visible) { // Page ?>
	<tr id="r__Page">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast__Page"><?php echo $lab_dept_mast_view->_Page->caption() ?></span></td>
		<td data-name="_Page" <?php echo $lab_dept_mast_view->_Page->cellAttributes() ?>>
<span id="el_lab_dept_mast__Page">
<span<?php echo $lab_dept_mast_view->_Page->viewAttributes() ?>><?php echo $lab_dept_mast_view->_Page->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast_view->Incharge->Visible) { // Incharge ?>
	<tr id="r_Incharge">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_Incharge"><?php echo $lab_dept_mast_view->Incharge->caption() ?></span></td>
		<td data-name="Incharge" <?php echo $lab_dept_mast_view->Incharge->cellAttributes() ?>>
<span id="el_lab_dept_mast_Incharge">
<span<?php echo $lab_dept_mast_view->Incharge->viewAttributes() ?>><?php echo $lab_dept_mast_view->Incharge->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast_view->AutoNum->Visible) { // AutoNum ?>
	<tr id="r_AutoNum">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_AutoNum"><?php echo $lab_dept_mast_view->AutoNum->caption() ?></span></td>
		<td data-name="AutoNum" <?php echo $lab_dept_mast_view->AutoNum->cellAttributes() ?>>
<span id="el_lab_dept_mast_AutoNum">
<span<?php echo $lab_dept_mast_view->AutoNum->viewAttributes() ?>><?php echo $lab_dept_mast_view->AutoNum->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_id"><?php echo $lab_dept_mast_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $lab_dept_mast_view->id->cellAttributes() ?>>
<span id="el_lab_dept_mast_id">
<span<?php echo $lab_dept_mast_view->id->viewAttributes() ?>><?php echo $lab_dept_mast_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lab_dept_mast_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lab_dept_mast_view->isExport()) { ?>
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
$lab_dept_mast_view->terminate();
?>