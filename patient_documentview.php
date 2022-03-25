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
$patient_document_view = new patient_document_view();

// Run the page
$patient_document_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_document_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_document->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatient_documentview = currentForm = new ew.Form("fpatient_documentview", "view");

// Form_CustomValidate event
fpatient_documentview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_documentview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_documentview.lists["x_DocumentName"] = <?php echo $patient_document_view->DocumentName->Lookup->toClientList() ?>;
fpatient_documentview.lists["x_DocumentName"].options = <?php echo JsonEncode($patient_document_view->DocumentName->lookupOptions()) ?>;
fpatient_documentview.lists["x_status"] = <?php echo $patient_document_view->status->Lookup->toClientList() ?>;
fpatient_documentview.lists["x_status"].options = <?php echo JsonEncode($patient_document_view->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_document->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_document_view->ExportOptions->render("body") ?>
<?php $patient_document_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_document_view->showPageHeader(); ?>
<?php
$patient_document_view->showMessage();
?>
<form name="fpatient_documentview" id="fpatient_documentview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_document_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_document_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_document">
<input type="hidden" name="modal" value="<?php echo (int)$patient_document_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($patient_document->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_document_view->TableLeftColumnClass ?>"><span id="elh_patient_document_id"><?php echo $patient_document->id->caption() ?></span></td>
		<td data-name="id"<?php echo $patient_document->id->cellAttributes() ?>>
<span id="el_patient_document_id">
<span<?php echo $patient_document->id->viewAttributes() ?>>
<?php echo $patient_document->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_document->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $patient_document_view->TableLeftColumnClass ?>"><span id="elh_patient_document_patient_id"><?php echo $patient_document->patient_id->caption() ?></span></td>
		<td data-name="patient_id"<?php echo $patient_document->patient_id->cellAttributes() ?>>
<span id="el_patient_document_patient_id">
<span<?php echo $patient_document->patient_id->viewAttributes() ?>>
<?php echo $patient_document->patient_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_document->DocumentName->Visible) { // DocumentName ?>
	<tr id="r_DocumentName">
		<td class="<?php echo $patient_document_view->TableLeftColumnClass ?>"><span id="elh_patient_document_DocumentName"><?php echo $patient_document->DocumentName->caption() ?></span></td>
		<td data-name="DocumentName"<?php echo $patient_document->DocumentName->cellAttributes() ?>>
<span id="el_patient_document_DocumentName">
<span<?php echo $patient_document->DocumentName->viewAttributes() ?>>
<?php echo $patient_document->DocumentName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_document->DocumentUpload->Visible) { // DocumentUpload ?>
	<tr id="r_DocumentUpload">
		<td class="<?php echo $patient_document_view->TableLeftColumnClass ?>"><span id="elh_patient_document_DocumentUpload"><?php echo $patient_document->DocumentUpload->caption() ?></span></td>
		<td data-name="DocumentUpload"<?php echo $patient_document->DocumentUpload->cellAttributes() ?>>
<span id="el_patient_document_DocumentUpload">
<span<?php echo $patient_document->DocumentUpload->viewAttributes() ?>>
<?php echo GetFileViewTag($patient_document->DocumentUpload, $patient_document->DocumentUpload->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_document->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_document_view->TableLeftColumnClass ?>"><span id="elh_patient_document_status"><?php echo $patient_document->status->caption() ?></span></td>
		<td data-name="status"<?php echo $patient_document->status->cellAttributes() ?>>
<span id="el_patient_document_status">
<span<?php echo $patient_document->status->viewAttributes() ?>>
<?php echo $patient_document->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_document->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_document_view->TableLeftColumnClass ?>"><span id="elh_patient_document_createdby"><?php echo $patient_document->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $patient_document->createdby->cellAttributes() ?>>
<span id="el_patient_document_createdby">
<span<?php echo $patient_document->createdby->viewAttributes() ?>>
<?php echo $patient_document->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_document->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_document_view->TableLeftColumnClass ?>"><span id="elh_patient_document_createddatetime"><?php echo $patient_document->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $patient_document->createddatetime->cellAttributes() ?>>
<span id="el_patient_document_createddatetime">
<span<?php echo $patient_document->createddatetime->viewAttributes() ?>>
<?php echo $patient_document->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_document->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_document_view->TableLeftColumnClass ?>"><span id="elh_patient_document_modifiedby"><?php echo $patient_document->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $patient_document->modifiedby->cellAttributes() ?>>
<span id="el_patient_document_modifiedby">
<span<?php echo $patient_document->modifiedby->viewAttributes() ?>>
<?php echo $patient_document->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_document->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_document_view->TableLeftColumnClass ?>"><span id="elh_patient_document_modifieddatetime"><?php echo $patient_document->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $patient_document->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_document_modifieddatetime">
<span<?php echo $patient_document->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_document->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_document->DocumentNumber->Visible) { // DocumentNumber ?>
	<tr id="r_DocumentNumber">
		<td class="<?php echo $patient_document_view->TableLeftColumnClass ?>"><span id="elh_patient_document_DocumentNumber"><?php echo $patient_document->DocumentNumber->caption() ?></span></td>
		<td data-name="DocumentNumber"<?php echo $patient_document->DocumentNumber->cellAttributes() ?>>
<span id="el_patient_document_DocumentNumber">
<span<?php echo $patient_document->DocumentNumber->viewAttributes() ?>>
<?php echo $patient_document->DocumentNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$patient_document_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_document->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_document_view->terminate();
?>