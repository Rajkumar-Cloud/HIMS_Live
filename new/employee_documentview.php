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
$employee_document_view = new employee_document_view();

// Run the page
$employee_document_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_document_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$employee_document_view->isExport()) { ?>
<script>
var femployee_documentview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	femployee_documentview = currentForm = new ew.Form("femployee_documentview", "view");
	loadjs.done("femployee_documentview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$employee_document_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_document_view->ExportOptions->render("body") ?>
<?php $employee_document_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_document_view->showPageHeader(); ?>
<?php
$employee_document_view->showMessage();
?>
<form name="femployee_documentview" id="femployee_documentview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_document">
<input type="hidden" name="modal" value="<?php echo (int)$employee_document_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_document_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_id"><?php echo $employee_document_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $employee_document_view->id->cellAttributes() ?>>
<span id="el_employee_document_id">
<span<?php echo $employee_document_view->id->viewAttributes() ?>><?php echo $employee_document_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document_view->employee_id->Visible) { // employee_id ?>
	<tr id="r_employee_id">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_employee_id"><?php echo $employee_document_view->employee_id->caption() ?></span></td>
		<td data-name="employee_id" <?php echo $employee_document_view->employee_id->cellAttributes() ?>>
<span id="el_employee_document_employee_id">
<span<?php echo $employee_document_view->employee_id->viewAttributes() ?>><?php echo $employee_document_view->employee_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document_view->DocumentName->Visible) { // DocumentName ?>
	<tr id="r_DocumentName">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_DocumentName"><?php echo $employee_document_view->DocumentName->caption() ?></span></td>
		<td data-name="DocumentName" <?php echo $employee_document_view->DocumentName->cellAttributes() ?>>
<span id="el_employee_document_DocumentName">
<span<?php echo $employee_document_view->DocumentName->viewAttributes() ?>><?php echo $employee_document_view->DocumentName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document_view->DocumentNumber->Visible) { // DocumentNumber ?>
	<tr id="r_DocumentNumber">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_DocumentNumber"><?php echo $employee_document_view->DocumentNumber->caption() ?></span></td>
		<td data-name="DocumentNumber" <?php echo $employee_document_view->DocumentNumber->cellAttributes() ?>>
<span id="el_employee_document_DocumentNumber">
<span<?php echo $employee_document_view->DocumentNumber->viewAttributes() ?>><?php echo $employee_document_view->DocumentNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document_view->DocumentUpload->Visible) { // DocumentUpload ?>
	<tr id="r_DocumentUpload">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_DocumentUpload"><?php echo $employee_document_view->DocumentUpload->caption() ?></span></td>
		<td data-name="DocumentUpload" <?php echo $employee_document_view->DocumentUpload->cellAttributes() ?>>
<span id="el_employee_document_DocumentUpload">
<span><?php echo GetFileViewTag($employee_document_view->DocumentUpload, $employee_document_view->DocumentUpload->getViewValue(), FALSE) ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_status"><?php echo $employee_document_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $employee_document_view->status->cellAttributes() ?>>
<span id="el_employee_document_status">
<span<?php echo $employee_document_view->status->viewAttributes() ?>><?php echo $employee_document_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_createdby"><?php echo $employee_document_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $employee_document_view->createdby->cellAttributes() ?>>
<span id="el_employee_document_createdby">
<span<?php echo $employee_document_view->createdby->viewAttributes() ?>><?php echo $employee_document_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_createddatetime"><?php echo $employee_document_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $employee_document_view->createddatetime->cellAttributes() ?>>
<span id="el_employee_document_createddatetime">
<span<?php echo $employee_document_view->createddatetime->viewAttributes() ?>><?php echo $employee_document_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_modifiedby"><?php echo $employee_document_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $employee_document_view->modifiedby->cellAttributes() ?>>
<span id="el_employee_document_modifiedby">
<span<?php echo $employee_document_view->modifiedby->viewAttributes() ?>><?php echo $employee_document_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_modifieddatetime"><?php echo $employee_document_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $employee_document_view->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_document_modifieddatetime">
<span<?php echo $employee_document_view->modifieddatetime->viewAttributes() ?>><?php echo $employee_document_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_document_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$employee_document_view->isExport()) { ?>
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
$employee_document_view->terminate();
?>