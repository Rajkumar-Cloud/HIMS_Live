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
<?php include_once "header.php" ?>
<?php if (!$employee_document->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_documentview = currentForm = new ew.Form("femployee_documentview", "view");

// Form_CustomValidate event
femployee_documentview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_documentview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_documentview.lists["x_DocumentName"] = <?php echo $employee_document_view->DocumentName->Lookup->toClientList() ?>;
femployee_documentview.lists["x_DocumentName"].options = <?php echo JsonEncode($employee_document_view->DocumentName->lookupOptions()) ?>;
femployee_documentview.lists["x_status"] = <?php echo $employee_document_view->status->Lookup->toClientList() ?>;
femployee_documentview.lists["x_status"].options = <?php echo JsonEncode($employee_document_view->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_document->isExport()) { ?>
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
<?php if ($employee_document_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_document_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_document">
<input type="hidden" name="modal" value="<?php echo (int)$employee_document_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_document->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_id"><?php echo $employee_document->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_document->id->cellAttributes() ?>>
<span id="el_employee_document_id">
<span<?php echo $employee_document->id->viewAttributes() ?>>
<?php echo $employee_document->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document->employee_id->Visible) { // employee_id ?>
	<tr id="r_employee_id">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_employee_id"><?php echo $employee_document->employee_id->caption() ?></span></td>
		<td data-name="employee_id"<?php echo $employee_document->employee_id->cellAttributes() ?>>
<span id="el_employee_document_employee_id">
<span<?php echo $employee_document->employee_id->viewAttributes() ?>>
<?php echo $employee_document->employee_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document->DocumentName->Visible) { // DocumentName ?>
	<tr id="r_DocumentName">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_DocumentName"><?php echo $employee_document->DocumentName->caption() ?></span></td>
		<td data-name="DocumentName"<?php echo $employee_document->DocumentName->cellAttributes() ?>>
<span id="el_employee_document_DocumentName">
<span<?php echo $employee_document->DocumentName->viewAttributes() ?>>
<?php echo $employee_document->DocumentName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document->DocumentNumber->Visible) { // DocumentNumber ?>
	<tr id="r_DocumentNumber">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_DocumentNumber"><?php echo $employee_document->DocumentNumber->caption() ?></span></td>
		<td data-name="DocumentNumber"<?php echo $employee_document->DocumentNumber->cellAttributes() ?>>
<span id="el_employee_document_DocumentNumber">
<span<?php echo $employee_document->DocumentNumber->viewAttributes() ?>>
<?php echo $employee_document->DocumentNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document->DocumentUpload->Visible) { // DocumentUpload ?>
	<tr id="r_DocumentUpload">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_DocumentUpload"><?php echo $employee_document->DocumentUpload->caption() ?></span></td>
		<td data-name="DocumentUpload"<?php echo $employee_document->DocumentUpload->cellAttributes() ?>>
<span id="el_employee_document_DocumentUpload">
<span>
<?php echo GetFileViewTag($employee_document->DocumentUpload, $employee_document->DocumentUpload->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_status"><?php echo $employee_document->status->caption() ?></span></td>
		<td data-name="status"<?php echo $employee_document->status->cellAttributes() ?>>
<span id="el_employee_document_status">
<span<?php echo $employee_document->status->viewAttributes() ?>>
<?php echo $employee_document->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_createdby"><?php echo $employee_document->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $employee_document->createdby->cellAttributes() ?>>
<span id="el_employee_document_createdby">
<span<?php echo $employee_document->createdby->viewAttributes() ?>>
<?php echo $employee_document->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_createddatetime"><?php echo $employee_document->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $employee_document->createddatetime->cellAttributes() ?>>
<span id="el_employee_document_createddatetime">
<span<?php echo $employee_document->createddatetime->viewAttributes() ?>>
<?php echo $employee_document->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_modifiedby"><?php echo $employee_document->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $employee_document->modifiedby->cellAttributes() ?>>
<span id="el_employee_document_modifiedby">
<span<?php echo $employee_document->modifiedby->viewAttributes() ?>>
<?php echo $employee_document->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_modifieddatetime"><?php echo $employee_document->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $employee_document->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_document_modifieddatetime">
<span<?php echo $employee_document->modifieddatetime->viewAttributes() ?>>
<?php echo $employee_document->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_document->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $employee_document_view->TableLeftColumnClass ?>"><span id="elh_employee_document_HospID"><?php echo $employee_document->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $employee_document->HospID->cellAttributes() ?>>
<span id="el_employee_document_HospID">
<span<?php echo $employee_document->HospID->viewAttributes() ?>>
<?php echo $employee_document->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_document_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_document->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_document_view->terminate();
?>