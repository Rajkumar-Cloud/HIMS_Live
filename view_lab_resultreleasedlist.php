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
$view_lab_resultreleased_list = new view_lab_resultreleased_list();

// Run the page
$view_lab_resultreleased_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_resultreleased_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_lab_resultreleased->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_lab_resultreleasedlist = currentForm = new ew.Form("fview_lab_resultreleasedlist", "list");
fview_lab_resultreleasedlist.formKeyCountName = '<?php echo $view_lab_resultreleased_list->FormKeyCountName ?>';

// Validate form
fview_lab_resultreleasedlist.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($view_lab_resultreleased_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->id->caption(), $view_lab_resultreleased->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->PatID->caption(), $view_lab_resultreleased->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased->PatID->errorMessage()) ?>");
		<?php if ($view_lab_resultreleased_list->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->PatientName->caption(), $view_lab_resultreleased->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Age->caption(), $view_lab_resultreleased->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Gender->caption(), $view_lab_resultreleased->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->sid->Required) { ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->sid->caption(), $view_lab_resultreleased->sid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased->sid->errorMessage()) ?>");
		<?php if ($view_lab_resultreleased_list->ItemCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->ItemCode->caption(), $view_lab_resultreleased->ItemCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->DEptCd->Required) { ?>
			elm = this.getElements("x" + infix + "_DEptCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->DEptCd->caption(), $view_lab_resultreleased->DEptCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->Resulted->Required) { ?>
			elm = this.getElements("x" + infix + "_Resulted[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Resulted->caption(), $view_lab_resultreleased->Resulted->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->Services->Required) { ?>
			elm = this.getElements("x" + infix + "_Services");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Services->caption(), $view_lab_resultreleased->Services->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->LabReport->Required) { ?>
			elm = this.getElements("x" + infix + "_LabReport");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->LabReport->caption(), $view_lab_resultreleased->LabReport->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->Pic1->Required) { ?>
			felm = this.getElements("x" + infix + "_Pic1");
			elm = this.getElements("fn_x" + infix + "_Pic1");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Pic1->caption(), $view_lab_resultreleased->Pic1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->Pic2->Required) { ?>
			felm = this.getElements("x" + infix + "_Pic2");
			elm = this.getElements("fn_x" + infix + "_Pic2");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Pic2->caption(), $view_lab_resultreleased->Pic2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->TestUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_TestUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->TestUnit->caption(), $view_lab_resultreleased->TestUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->RefValue->Required) { ?>
			elm = this.getElements("x" + infix + "_RefValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->RefValue->caption(), $view_lab_resultreleased->RefValue->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Order->caption(), $view_lab_resultreleased->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased->Order->errorMessage()) ?>");
		<?php if ($view_lab_resultreleased_list->Repeated->Required) { ?>
			elm = this.getElements("x" + infix + "_Repeated[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Repeated->caption(), $view_lab_resultreleased->Repeated->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->Vid->Required) { ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Vid->caption(), $view_lab_resultreleased->Vid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased->Vid->errorMessage()) ?>");
		<?php if ($view_lab_resultreleased_list->invoiceId->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->invoiceId->caption(), $view_lab_resultreleased->invoiceId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased->invoiceId->errorMessage()) ?>");
		<?php if ($view_lab_resultreleased_list->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->DrID->caption(), $view_lab_resultreleased->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased->DrID->errorMessage()) ?>");
		<?php if ($view_lab_resultreleased_list->DrCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_DrCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->DrCODE->caption(), $view_lab_resultreleased->DrCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->DrName->Required) { ?>
			elm = this.getElements("x" + infix + "_DrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->DrName->caption(), $view_lab_resultreleased->DrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Department->caption(), $view_lab_resultreleased->Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->createddatetime->caption(), $view_lab_resultreleased->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased->createddatetime->errorMessage()) ?>");
		<?php if ($view_lab_resultreleased_list->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->status->caption(), $view_lab_resultreleased->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased->status->errorMessage()) ?>");
		<?php if ($view_lab_resultreleased_list->TestType->Required) { ?>
			elm = this.getElements("x" + infix + "_TestType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->TestType->caption(), $view_lab_resultreleased->TestType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->ResultDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->ResultDate->caption(), $view_lab_resultreleased->ResultDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->ResultedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->ResultedBy->caption(), $view_lab_resultreleased->ResultedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->HospID->caption(), $view_lab_resultreleased->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased->HospID->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fview_lab_resultreleasedlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_resultreleasedlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_resultreleasedlist.lists["x_Resulted[]"] = <?php echo $view_lab_resultreleased_list->Resulted->Lookup->toClientList() ?>;
fview_lab_resultreleasedlist.lists["x_Resulted[]"].options = <?php echo JsonEncode($view_lab_resultreleased_list->Resulted->options(FALSE, TRUE)) ?>;
fview_lab_resultreleasedlist.lists["x_TestUnit"] = <?php echo $view_lab_resultreleased_list->TestUnit->Lookup->toClientList() ?>;
fview_lab_resultreleasedlist.lists["x_TestUnit"].options = <?php echo JsonEncode($view_lab_resultreleased_list->TestUnit->lookupOptions()) ?>;
fview_lab_resultreleasedlist.autoSuggests["x_TestUnit"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_lab_resultreleasedlist.lists["x_Repeated[]"] = <?php echo $view_lab_resultreleased_list->Repeated->Lookup->toClientList() ?>;
fview_lab_resultreleasedlist.lists["x_Repeated[]"].options = <?php echo JsonEncode($view_lab_resultreleased_list->Repeated->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
	display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
	<div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
		<ul class="nav nav-tabs"></ul>
		<div class="tab-content"><!-- .tab-content -->
			<div class="tab-pane fade active show"></div>
		</div><!-- /.tab-content -->
	</div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_lab_resultreleased->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_lab_resultreleased_list->TotalRecs > 0 && $view_lab_resultreleased_list->ExportOptions->visible()) { ?>
<?php $view_lab_resultreleased_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_resultreleased_list->ImportOptions->visible()) { ?>
<?php $view_lab_resultreleased_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_lab_resultreleased->isExport() || EXPORT_MASTER_RECORD && $view_lab_resultreleased->isExport("print")) { ?>
<?php
if ($view_lab_resultreleased_list->DbMasterFilter <> "" && $view_lab_resultreleased->getCurrentMasterTable() == "view_lab_services") {
	if ($view_lab_resultreleased_list->MasterRecordExists) {
		include_once "view_lab_servicesmaster.php";
	}
}
?>
<?php
if ($view_lab_resultreleased_list->DbMasterFilter <> "" && $view_lab_resultreleased->getCurrentMasterTable() == "view_labreport_print") {
	if ($view_lab_resultreleased_list->MasterRecordExists) {
		include_once "view_labreport_printmaster.php";
	}
}
?>
<?php } ?>
<?php
$view_lab_resultreleased_list->renderOtherOptions();
?>
<?php $view_lab_resultreleased_list->showPageHeader(); ?>
<?php
$view_lab_resultreleased_list->showMessage();
?>
<?php if ($view_lab_resultreleased_list->TotalRecs > 0 || $view_lab_resultreleased->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_lab_resultreleased_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_resultreleased">
<?php if (!$view_lab_resultreleased->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_lab_resultreleased->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_lab_resultreleased_list->Pager)) $view_lab_resultreleased_list->Pager = new NumericPager($view_lab_resultreleased_list->StartRec, $view_lab_resultreleased_list->DisplayRecs, $view_lab_resultreleased_list->TotalRecs, $view_lab_resultreleased_list->RecRange, $view_lab_resultreleased_list->AutoHidePager) ?>
<?php if ($view_lab_resultreleased_list->Pager->RecordCount > 0 && $view_lab_resultreleased_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_lab_resultreleased_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_resultreleased_list->pageUrl() ?>start=<?php echo $view_lab_resultreleased_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_resultreleased_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_resultreleased_list->pageUrl() ?>start=<?php echo $view_lab_resultreleased_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_lab_resultreleased_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_lab_resultreleased_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_lab_resultreleased_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_resultreleased_list->pageUrl() ?>start=<?php echo $view_lab_resultreleased_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_resultreleased_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_resultreleased_list->pageUrl() ?>start=<?php echo $view_lab_resultreleased_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_lab_resultreleased_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_lab_resultreleased_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_lab_resultreleased_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_lab_resultreleased_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_lab_resultreleased_list->TotalRecs > 0 && (!$view_lab_resultreleased_list->AutoHidePageSizeSelector || $view_lab_resultreleased_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_lab_resultreleased">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_lab_resultreleased_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_lab_resultreleased_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_lab_resultreleased_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_lab_resultreleased_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_lab_resultreleased_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_lab_resultreleased_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="2000"<?php if ($view_lab_resultreleased_list->DisplayRecs == 2000) { ?> selected<?php } ?>>2000</option>
<option value="ALL"<?php if ($view_lab_resultreleased->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_resultreleased_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_lab_resultreleasedlist" id="fview_lab_resultreleasedlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_resultreleased_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_resultreleased_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_resultreleased">
<?php if ($view_lab_resultreleased->getCurrentMasterTable() == "view_lab_services" && $view_lab_resultreleased->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_lab_services">
<input type="hidden" name="fk_id" value="<?php echo $view_lab_resultreleased->Vid->getSessionValue() ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->getCurrentMasterTable() == "view_labreport_print" && $view_lab_resultreleased->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_labreport_print">
<input type="hidden" name="fk_id" value="<?php echo $view_lab_resultreleased->Vid->getSessionValue() ?>">
<?php } ?>
<div id="gmp_view_lab_resultreleased" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_lab_resultreleased_list->TotalRecs > 0 || $view_lab_resultreleased->isGridEdit()) { ?>
<table id="tbl_view_lab_resultreleasedlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_lab_resultreleased_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_lab_resultreleased_list->renderListOptions();

// Render list options (header, left)
$view_lab_resultreleased_list->ListOptions->render("header", "left");
?>
<?php if ($view_lab_resultreleased->id->Visible) { // id ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_lab_resultreleased->id->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_id" class="view_lab_resultreleased_id"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_lab_resultreleased->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->id) ?>',1);"><div id="elh_view_lab_resultreleased_id" class="view_lab_resultreleased_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->PatID->Visible) { // PatID ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $view_lab_resultreleased->PatID->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_PatID" class="view_lab_resultreleased_PatID"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $view_lab_resultreleased->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->PatID) ?>',1);"><div id="elh_view_lab_resultreleased_PatID" class="view_lab_resultreleased_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->PatientName->Visible) { // PatientName ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_resultreleased->PatientName->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_PatientName" class="view_lab_resultreleased_PatientName"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_resultreleased->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->PatientName) ?>',1);"><div id="elh_view_lab_resultreleased_PatientName" class="view_lab_resultreleased_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Age->Visible) { // Age ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_lab_resultreleased->Age->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Age" class="view_lab_resultreleased_Age"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_lab_resultreleased->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->Age) ?>',1);"><div id="elh_view_lab_resultreleased_Age" class="view_lab_resultreleased_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Gender->Visible) { // Gender ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_lab_resultreleased->Gender->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Gender" class="view_lab_resultreleased_Gender"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_lab_resultreleased->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->Gender) ?>',1);"><div id="elh_view_lab_resultreleased_Gender" class="view_lab_resultreleased_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->sid->Visible) { // sid ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $view_lab_resultreleased->sid->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_sid" class="view_lab_resultreleased_sid"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $view_lab_resultreleased->sid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->sid) ?>',1);"><div id="elh_view_lab_resultreleased_sid" class="view_lab_resultreleased_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->sid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->sid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $view_lab_resultreleased->ItemCode->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_ItemCode" class="view_lab_resultreleased_ItemCode"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $view_lab_resultreleased->ItemCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->ItemCode) ?>',1);"><div id="elh_view_lab_resultreleased_ItemCode" class="view_lab_resultreleased_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->ItemCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->ItemCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->ItemCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $view_lab_resultreleased->DEptCd->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_DEptCd" class="view_lab_resultreleased_DEptCd"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $view_lab_resultreleased->DEptCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->DEptCd) ?>',1);"><div id="elh_view_lab_resultreleased_DEptCd" class="view_lab_resultreleased_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->DEptCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->DEptCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->DEptCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Resulted->Visible) { // Resulted ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->Resulted) == "") { ?>
		<th data-name="Resulted" class="<?php echo $view_lab_resultreleased->Resulted->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Resulted" class="view_lab_resultreleased_Resulted"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Resulted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resulted" class="<?php echo $view_lab_resultreleased->Resulted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->Resulted) ?>',1);"><div id="elh_view_lab_resultreleased_Resulted" class="view_lab_resultreleased_Resulted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Resulted->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->Resulted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->Resulted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Services->Visible) { // Services ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $view_lab_resultreleased->Services->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Services" class="view_lab_resultreleased_Services"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $view_lab_resultreleased->Services->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->Services) ?>',1);"><div id="elh_view_lab_resultreleased_Services" class="view_lab_resultreleased_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Services->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->Services->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->Services->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->LabReport->Visible) { // LabReport ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->LabReport) == "") { ?>
		<th data-name="LabReport" class="<?php echo $view_lab_resultreleased->LabReport->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_LabReport" class="view_lab_resultreleased_LabReport"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->LabReport->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabReport" class="<?php echo $view_lab_resultreleased->LabReport->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->LabReport) ?>',1);"><div id="elh_view_lab_resultreleased_LabReport" class="view_lab_resultreleased_LabReport">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->LabReport->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->LabReport->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->LabReport->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $view_lab_resultreleased->Pic1->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Pic1" class="view_lab_resultreleased_Pic1"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Pic1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $view_lab_resultreleased->Pic1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->Pic1) ?>',1);"><div id="elh_view_lab_resultreleased_Pic1" class="view_lab_resultreleased_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Pic1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->Pic1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->Pic1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $view_lab_resultreleased->Pic2->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Pic2" class="view_lab_resultreleased_Pic2"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Pic2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $view_lab_resultreleased->Pic2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->Pic2) ?>',1);"><div id="elh_view_lab_resultreleased_Pic2" class="view_lab_resultreleased_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Pic2->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->Pic2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->Pic2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->TestUnit) == "") { ?>
		<th data-name="TestUnit" class="<?php echo $view_lab_resultreleased->TestUnit->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_TestUnit" class="view_lab_resultreleased_TestUnit"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->TestUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestUnit" class="<?php echo $view_lab_resultreleased->TestUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->TestUnit) ?>',1);"><div id="elh_view_lab_resultreleased_TestUnit" class="view_lab_resultreleased_TestUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->TestUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->TestUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->TestUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->RefValue->Visible) { // RefValue ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->RefValue) == "") { ?>
		<th data-name="RefValue" class="<?php echo $view_lab_resultreleased->RefValue->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_RefValue" class="view_lab_resultreleased_RefValue"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->RefValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefValue" class="<?php echo $view_lab_resultreleased->RefValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->RefValue) ?>',1);"><div id="elh_view_lab_resultreleased_RefValue" class="view_lab_resultreleased_RefValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->RefValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->RefValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->RefValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Order->Visible) { // Order ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_lab_resultreleased->Order->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Order" class="view_lab_resultreleased_Order"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_lab_resultreleased->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->Order) ?>',1);"><div id="elh_view_lab_resultreleased_Order" class="view_lab_resultreleased_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->Order->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->Order->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Repeated->Visible) { // Repeated ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->Repeated) == "") { ?>
		<th data-name="Repeated" class="<?php echo $view_lab_resultreleased->Repeated->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Repeated" class="view_lab_resultreleased_Repeated"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Repeated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Repeated" class="<?php echo $view_lab_resultreleased->Repeated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->Repeated) ?>',1);"><div id="elh_view_lab_resultreleased_Repeated" class="view_lab_resultreleased_Repeated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Repeated->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->Repeated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->Repeated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Vid->Visible) { // Vid ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $view_lab_resultreleased->Vid->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Vid" class="view_lab_resultreleased_Vid"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $view_lab_resultreleased->Vid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->Vid) ?>',1);"><div id="elh_view_lab_resultreleased_Vid" class="view_lab_resultreleased_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->Vid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->Vid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $view_lab_resultreleased->invoiceId->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_invoiceId" class="view_lab_resultreleased_invoiceId"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->invoiceId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $view_lab_resultreleased->invoiceId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->invoiceId) ?>',1);"><div id="elh_view_lab_resultreleased_invoiceId" class="view_lab_resultreleased_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->invoiceId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->invoiceId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->DrID->Visible) { // DrID ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_lab_resultreleased->DrID->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_DrID" class="view_lab_resultreleased_DrID"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_lab_resultreleased->DrID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->DrID) ?>',1);"><div id="elh_view_lab_resultreleased_DrID" class="view_lab_resultreleased_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->DrID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->DrID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->DrCODE) == "") { ?>
		<th data-name="DrCODE" class="<?php echo $view_lab_resultreleased->DrCODE->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_DrCODE" class="view_lab_resultreleased_DrCODE"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->DrCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrCODE" class="<?php echo $view_lab_resultreleased->DrCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->DrCODE) ?>',1);"><div id="elh_view_lab_resultreleased_DrCODE" class="view_lab_resultreleased_DrCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->DrCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->DrCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->DrCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->DrName->Visible) { // DrName ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $view_lab_resultreleased->DrName->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_DrName" class="view_lab_resultreleased_DrName"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $view_lab_resultreleased->DrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->DrName) ?>',1);"><div id="elh_view_lab_resultreleased_DrName" class="view_lab_resultreleased_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->DrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->DrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->Department->Visible) { // Department ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $view_lab_resultreleased->Department->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Department" class="view_lab_resultreleased_Department"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $view_lab_resultreleased->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->Department) ?>',1);"><div id="elh_view_lab_resultreleased_Department" class="view_lab_resultreleased_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_lab_resultreleased->createddatetime->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_createddatetime" class="view_lab_resultreleased_createddatetime"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_lab_resultreleased->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->createddatetime) ?>',1);"><div id="elh_view_lab_resultreleased_createddatetime" class="view_lab_resultreleased_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->status->Visible) { // status ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_lab_resultreleased->status->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_status" class="view_lab_resultreleased_status"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_lab_resultreleased->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->status) ?>',1);"><div id="elh_view_lab_resultreleased_status" class="view_lab_resultreleased_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->TestType->Visible) { // TestType ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $view_lab_resultreleased->TestType->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_TestType" class="view_lab_resultreleased_TestType"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $view_lab_resultreleased->TestType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->TestType) ?>',1);"><div id="elh_view_lab_resultreleased_TestType" class="view_lab_resultreleased_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->TestType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->TestType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->TestType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $view_lab_resultreleased->ResultDate->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_ResultDate" class="view_lab_resultreleased_ResultDate"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $view_lab_resultreleased->ResultDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->ResultDate) ?>',1);"><div id="elh_view_lab_resultreleased_ResultDate" class="view_lab_resultreleased_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->ResultDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->ResultDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $view_lab_resultreleased->ResultedBy->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_ResultedBy" class="view_lab_resultreleased_ResultedBy"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->ResultedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $view_lab_resultreleased->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->ResultedBy) ?>',1);"><div id="elh_view_lab_resultreleased_ResultedBy" class="view_lab_resultreleased_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->ResultedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->ResultedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->ResultedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_resultreleased->sortUrl($view_lab_resultreleased->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_lab_resultreleased->HospID->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_HospID" class="view_lab_resultreleased_HospID"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleased->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_lab_resultreleased->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleased->SortUrl($view_lab_resultreleased->HospID) ?>',1);"><div id="elh_view_lab_resultreleased_HospID" class="view_lab_resultreleased_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleased->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_resultreleased_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_lab_resultreleased->ExportAll && $view_lab_resultreleased->isExport()) {
	$view_lab_resultreleased_list->StopRec = $view_lab_resultreleased_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_lab_resultreleased_list->TotalRecs > $view_lab_resultreleased_list->StartRec + $view_lab_resultreleased_list->DisplayRecs - 1)
		$view_lab_resultreleased_list->StopRec = $view_lab_resultreleased_list->StartRec + $view_lab_resultreleased_list->DisplayRecs - 1;
	else
		$view_lab_resultreleased_list->StopRec = $view_lab_resultreleased_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $view_lab_resultreleased_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_lab_resultreleased_list->FormKeyCountName) && ($view_lab_resultreleased->isGridAdd() || $view_lab_resultreleased->isGridEdit() || $view_lab_resultreleased->isConfirm())) {
		$view_lab_resultreleased_list->KeyCount = $CurrentForm->getValue($view_lab_resultreleased_list->FormKeyCountName);
		$view_lab_resultreleased_list->StopRec = $view_lab_resultreleased_list->StartRec + $view_lab_resultreleased_list->KeyCount - 1;
	}
}
$view_lab_resultreleased_list->RecCnt = $view_lab_resultreleased_list->StartRec - 1;
if ($view_lab_resultreleased_list->Recordset && !$view_lab_resultreleased_list->Recordset->EOF) {
	$view_lab_resultreleased_list->Recordset->moveFirst();
	$selectLimit = $view_lab_resultreleased_list->UseSelectLimit;
	if (!$selectLimit && $view_lab_resultreleased_list->StartRec > 1)
		$view_lab_resultreleased_list->Recordset->move($view_lab_resultreleased_list->StartRec - 1);
} elseif (!$view_lab_resultreleased->AllowAddDeleteRow && $view_lab_resultreleased_list->StopRec == 0) {
	$view_lab_resultreleased_list->StopRec = $view_lab_resultreleased->GridAddRowCount;
}

// Initialize aggregate
$view_lab_resultreleased->RowType = ROWTYPE_AGGREGATEINIT;
$view_lab_resultreleased->resetAttributes();
$view_lab_resultreleased_list->renderRow();
if ($view_lab_resultreleased->isGridEdit())
	$view_lab_resultreleased_list->RowIndex = 0;
while ($view_lab_resultreleased_list->RecCnt < $view_lab_resultreleased_list->StopRec) {
	$view_lab_resultreleased_list->RecCnt++;
	if ($view_lab_resultreleased_list->RecCnt >= $view_lab_resultreleased_list->StartRec) {
		$view_lab_resultreleased_list->RowCnt++;
		if ($view_lab_resultreleased->isGridAdd() || $view_lab_resultreleased->isGridEdit() || $view_lab_resultreleased->isConfirm()) {
			$view_lab_resultreleased_list->RowIndex++;
			$CurrentForm->Index = $view_lab_resultreleased_list->RowIndex;
			if ($CurrentForm->hasValue($view_lab_resultreleased_list->FormActionName) && $view_lab_resultreleased_list->EventCancelled)
				$view_lab_resultreleased_list->RowAction = strval($CurrentForm->getValue($view_lab_resultreleased_list->FormActionName));
			elseif ($view_lab_resultreleased->isGridAdd())
				$view_lab_resultreleased_list->RowAction = "insert";
			else
				$view_lab_resultreleased_list->RowAction = "";
		}

		// Set up key count
		$view_lab_resultreleased_list->KeyCount = $view_lab_resultreleased_list->RowIndex;

		// Init row class and style
		$view_lab_resultreleased->resetAttributes();
		$view_lab_resultreleased->CssClass = "";
		if ($view_lab_resultreleased->isGridAdd()) {
			$view_lab_resultreleased_list->loadRowValues(); // Load default values
		} else {
			$view_lab_resultreleased_list->loadRowValues($view_lab_resultreleased_list->Recordset); // Load row values
		}
		$view_lab_resultreleased->RowType = ROWTYPE_VIEW; // Render view
		if ($view_lab_resultreleased->isGridEdit()) { // Grid edit
			if ($view_lab_resultreleased->EventCancelled)
				$view_lab_resultreleased_list->restoreCurrentRowFormValues($view_lab_resultreleased_list->RowIndex); // Restore form values
			if ($view_lab_resultreleased_list->RowAction == "insert")
				$view_lab_resultreleased->RowType = ROWTYPE_ADD; // Render add
			else
				$view_lab_resultreleased->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_lab_resultreleased->isGridEdit() && ($view_lab_resultreleased->RowType == ROWTYPE_EDIT || $view_lab_resultreleased->RowType == ROWTYPE_ADD) && $view_lab_resultreleased->EventCancelled) // Update failed
			$view_lab_resultreleased_list->restoreCurrentRowFormValues($view_lab_resultreleased_list->RowIndex); // Restore form values
		if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) // Edit row
			$view_lab_resultreleased_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$view_lab_resultreleased->RowAttrs = array_merge($view_lab_resultreleased->RowAttrs, array('data-rowindex'=>$view_lab_resultreleased_list->RowCnt, 'id'=>'r' . $view_lab_resultreleased_list->RowCnt . '_view_lab_resultreleased', 'data-rowtype'=>$view_lab_resultreleased->RowType));

		// Render row
		$view_lab_resultreleased_list->renderRow();

		// Render list options
		$view_lab_resultreleased_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_lab_resultreleased_list->RowAction <> "delete" && $view_lab_resultreleased_list->RowAction <> "insertdelete" && !($view_lab_resultreleased_list->RowAction == "insert" && $view_lab_resultreleased->isConfirm() && $view_lab_resultreleased_list->emptyRow())) {
?>
	<tr<?php echo $view_lab_resultreleased->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_resultreleased_list->ListOptions->render("body", "left", $view_lab_resultreleased_list->RowCnt);
?>
	<?php if ($view_lab_resultreleased->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_lab_resultreleased->id->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_id" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_id" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleased->id->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_id" class="form-group view_lab_resultreleased_id">
<span<?php echo $view_lab_resultreleased->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleased->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_id" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_id" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleased->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_id" class="view_lab_resultreleased_id">
<span<?php echo $view_lab_resultreleased->id->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $view_lab_resultreleased->PatID->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_PatID" class="form-group view_lab_resultreleased_PatID">
<input type="text" data-table="view_lab_resultreleased" data-field="x_PatID" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->PatID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->PatID->EditValue ?>"<?php echo $view_lab_resultreleased->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_PatID" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatID" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleased->PatID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_PatID" class="form-group view_lab_resultreleased_PatID">
<input type="text" data-table="view_lab_resultreleased" data-field="x_PatID" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->PatID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->PatID->EditValue ?>"<?php echo $view_lab_resultreleased->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_PatID" class="view_lab_resultreleased_PatID">
<span<?php echo $view_lab_resultreleased->PatID->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->PatID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_lab_resultreleased->PatientName->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_PatientName" class="form-group view_lab_resultreleased_PatientName">
<input type="text" data-table="view_lab_resultreleased" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->PatientName->EditValue ?>"<?php echo $view_lab_resultreleased->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_PatientName" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatientName" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleased->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_PatientName" class="form-group view_lab_resultreleased_PatientName">
<input type="text" data-table="view_lab_resultreleased" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->PatientName->EditValue ?>"<?php echo $view_lab_resultreleased->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_PatientName" class="view_lab_resultreleased_PatientName">
<span<?php echo $view_lab_resultreleased->PatientName->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_lab_resultreleased->Age->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Age" class="form-group view_lab_resultreleased_Age">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Age" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Age->EditValue ?>"<?php echo $view_lab_resultreleased->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Age" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Age" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleased->Age->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Age" class="form-group view_lab_resultreleased_Age">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Age" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Age->EditValue ?>"<?php echo $view_lab_resultreleased->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Age" class="view_lab_resultreleased_Age">
<span<?php echo $view_lab_resultreleased->Age->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Age->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $view_lab_resultreleased->Gender->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Gender" class="form-group view_lab_resultreleased_Gender">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Gender" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Gender->EditValue ?>"<?php echo $view_lab_resultreleased->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Gender" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Gender" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleased->Gender->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Gender" class="form-group view_lab_resultreleased_Gender">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Gender" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Gender->EditValue ?>"<?php echo $view_lab_resultreleased->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Gender" class="view_lab_resultreleased_Gender">
<span<?php echo $view_lab_resultreleased->Gender->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Gender->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->sid->Visible) { // sid ?>
		<td data-name="sid"<?php echo $view_lab_resultreleased->sid->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_sid" class="form-group view_lab_resultreleased_sid">
<input type="text" data-table="view_lab_resultreleased" data-field="x_sid" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->sid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->sid->EditValue ?>"<?php echo $view_lab_resultreleased->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_sid" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_sid" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleased->sid->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_sid" class="form-group view_lab_resultreleased_sid">
<input type="text" data-table="view_lab_resultreleased" data-field="x_sid" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->sid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->sid->EditValue ?>"<?php echo $view_lab_resultreleased->sid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_sid" class="view_lab_resultreleased_sid">
<span<?php echo $view_lab_resultreleased->sid->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->sid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode"<?php echo $view_lab_resultreleased->ItemCode->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_ItemCode" class="form-group view_lab_resultreleased_ItemCode">
<input type="text" data-table="view_lab_resultreleased" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->ItemCode->EditValue ?>"<?php echo $view_lab_resultreleased->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ItemCode" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_ItemCode" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleased->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_ItemCode" class="form-group view_lab_resultreleased_ItemCode">
<input type="text" data-table="view_lab_resultreleased" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->ItemCode->EditValue ?>"<?php echo $view_lab_resultreleased->ItemCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_ItemCode" class="view_lab_resultreleased_ItemCode">
<span<?php echo $view_lab_resultreleased->ItemCode->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->ItemCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd"<?php echo $view_lab_resultreleased->DEptCd->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_DEptCd" class="form-group view_lab_resultreleased_DEptCd">
<input type="text" data-table="view_lab_resultreleased" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->DEptCd->EditValue ?>"<?php echo $view_lab_resultreleased->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DEptCd" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_DEptCd" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleased->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_DEptCd" class="form-group view_lab_resultreleased_DEptCd">
<input type="text" data-table="view_lab_resultreleased" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->DEptCd->EditValue ?>"<?php echo $view_lab_resultreleased->DEptCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_DEptCd" class="view_lab_resultreleased_DEptCd">
<span<?php echo $view_lab_resultreleased->DEptCd->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->DEptCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted"<?php echo $view_lab_resultreleased->Resulted->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Resulted" class="form-group view_lab_resultreleased_Resulted">
<div id="tp_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Resulted" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_resultreleased" data-field="x_Resulted" data-value-separator="<?php echo $view_lab_resultreleased->Resulted->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Resulted[]" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Resulted[]" value="{value}"<?php echo $view_lab_resultreleased->Resulted->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Resulted" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleased->Resulted->checkBoxListHtml(FALSE, "x{$view_lab_resultreleased_list->RowIndex}_Resulted[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Resulted" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Resulted[]" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Resulted[]" value="<?php echo HtmlEncode($view_lab_resultreleased->Resulted->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Resulted" class="form-group view_lab_resultreleased_Resulted">
<div id="tp_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Resulted" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_resultreleased" data-field="x_Resulted" data-value-separator="<?php echo $view_lab_resultreleased->Resulted->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Resulted[]" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Resulted[]" value="{value}"<?php echo $view_lab_resultreleased->Resulted->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Resulted" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleased->Resulted->checkBoxListHtml(FALSE, "x{$view_lab_resultreleased_list->RowIndex}_Resulted[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Resulted" class="view_lab_resultreleased_Resulted">
<span<?php echo $view_lab_resultreleased->Resulted->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Resulted->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Services->Visible) { // Services ?>
		<td data-name="Services"<?php echo $view_lab_resultreleased->Services->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Services" class="form-group view_lab_resultreleased_Services">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Services" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Services->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Services->EditValue ?>"<?php echo $view_lab_resultreleased->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Services" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Services" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleased->Services->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Services" class="form-group view_lab_resultreleased_Services">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Services" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Services->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Services->EditValue ?>"<?php echo $view_lab_resultreleased->Services->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Services" class="view_lab_resultreleased_Services">
<span<?php echo $view_lab_resultreleased->Services->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Services->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->LabReport->Visible) { // LabReport ?>
		<td data-name="LabReport"<?php echo $view_lab_resultreleased->LabReport->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_LabReport" class="form-group view_lab_resultreleased_LabReport">
<textarea data-table="view_lab_resultreleased" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->LabReport->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased->LabReport->editAttributes() ?>><?php echo $view_lab_resultreleased->LabReport->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_LabReport" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_LabReport" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleased->LabReport->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_LabReport" class="form-group view_lab_resultreleased_LabReport">
<textarea data-table="view_lab_resultreleased" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->LabReport->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased->LabReport->editAttributes() ?>><?php echo $view_lab_resultreleased->LabReport->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_LabReport" class="view_lab_resultreleased_LabReport">
<span<?php echo $view_lab_resultreleased->LabReport->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->LabReport->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1"<?php echo $view_lab_resultreleased->Pic1->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Pic1" class="form-group view_lab_resultreleased_Pic1">
<div id="fd_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1">
<span title="<?php echo $view_lab_resultreleased->Pic1->title() ? $view_lab_resultreleased->Pic1->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($view_lab_resultreleased->Pic1->ReadOnly || $view_lab_resultreleased->Pic1->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="view_lab_resultreleased" data-field="x_Pic1" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1"<?php echo $view_lab_resultreleased->Pic1->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id= "fn_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleased->Pic1->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id= "fa_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id= "fs_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id= "fx_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleased->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id= "fm_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleased->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Pic1" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_lab_resultreleased->Pic1->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Pic1" class="form-group view_lab_resultreleased_Pic1">
<div id="fd_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1">
<span title="<?php echo $view_lab_resultreleased->Pic1->title() ? $view_lab_resultreleased->Pic1->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($view_lab_resultreleased->Pic1->ReadOnly || $view_lab_resultreleased->Pic1->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="view_lab_resultreleased" data-field="x_Pic1" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1"<?php echo $view_lab_resultreleased->Pic1->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id= "fn_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleased->Pic1->Upload->FileName ?>">
<?php if (Post("fa_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1") == "0") { ?>
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id= "fa_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id= "fa_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" value="1">
<?php } ?>
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id= "fs_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id= "fx_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleased->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id= "fm_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleased->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Pic1" class="view_lab_resultreleased_Pic1">
<span<?php echo $view_lab_resultreleased->Pic1->viewAttributes() ?>>
<?php echo GetFileViewTag($view_lab_resultreleased->Pic1, $view_lab_resultreleased->Pic1->getViewValue()) ?>
</span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2"<?php echo $view_lab_resultreleased->Pic2->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Pic2" class="form-group view_lab_resultreleased_Pic2">
<div id="fd_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2">
<span title="<?php echo $view_lab_resultreleased->Pic2->title() ? $view_lab_resultreleased->Pic2->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($view_lab_resultreleased->Pic2->ReadOnly || $view_lab_resultreleased->Pic2->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="view_lab_resultreleased" data-field="x_Pic2" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2"<?php echo $view_lab_resultreleased->Pic2->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id= "fn_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleased->Pic2->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id= "fa_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id= "fs_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id= "fx_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleased->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id= "fm_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleased->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Pic2" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_lab_resultreleased->Pic2->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Pic2" class="form-group view_lab_resultreleased_Pic2">
<div id="fd_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2">
<span title="<?php echo $view_lab_resultreleased->Pic2->title() ? $view_lab_resultreleased->Pic2->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($view_lab_resultreleased->Pic2->ReadOnly || $view_lab_resultreleased->Pic2->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="view_lab_resultreleased" data-field="x_Pic2" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2"<?php echo $view_lab_resultreleased->Pic2->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id= "fn_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleased->Pic2->Upload->FileName ?>">
<?php if (Post("fa_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2") == "0") { ?>
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id= "fa_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id= "fa_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" value="1">
<?php } ?>
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id= "fs_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id= "fx_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleased->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id= "fm_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleased->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Pic2" class="view_lab_resultreleased_Pic2">
<span<?php echo $view_lab_resultreleased->Pic2->viewAttributes() ?>>
<?php echo GetFileViewTag($view_lab_resultreleased->Pic2, $view_lab_resultreleased->Pic2->getViewValue()) ?>
</span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit"<?php echo $view_lab_resultreleased->TestUnit->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_TestUnit" class="form-group view_lab_resultreleased_TestUnit">
<?php
$wrkonchange = "" . trim(@$view_lab_resultreleased->TestUnit->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_lab_resultreleased->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" class="text-nowrap" style="z-index: <?php echo (9000 - $view_lab_resultreleased_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" id="sv_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" value="<?php echo RemoveHtml($view_lab_resultreleased->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_lab_resultreleased->TestUnit->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_TestUnit" data-value-separator="<?php echo $view_lab_resultreleased->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleased->TestUnit->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_lab_resultreleasedlist.createAutoSuggest({"id":"x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit","forceSelect":false});
</script>
<?php echo $view_lab_resultreleased->TestUnit->Lookup->getParamTag("p_x" . $view_lab_resultreleased_list->RowIndex . "_TestUnit") ?>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_TestUnit" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleased->TestUnit->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_TestUnit" class="form-group view_lab_resultreleased_TestUnit">
<?php
$wrkonchange = "" . trim(@$view_lab_resultreleased->TestUnit->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_lab_resultreleased->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" class="text-nowrap" style="z-index: <?php echo (9000 - $view_lab_resultreleased_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" id="sv_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" value="<?php echo RemoveHtml($view_lab_resultreleased->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_lab_resultreleased->TestUnit->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_TestUnit" data-value-separator="<?php echo $view_lab_resultreleased->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleased->TestUnit->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_lab_resultreleasedlist.createAutoSuggest({"id":"x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit","forceSelect":false});
</script>
<?php echo $view_lab_resultreleased->TestUnit->Lookup->getParamTag("p_x" . $view_lab_resultreleased_list->RowIndex . "_TestUnit") ?>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_TestUnit" class="view_lab_resultreleased_TestUnit">
<span<?php echo $view_lab_resultreleased->TestUnit->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->TestUnit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->RefValue->Visible) { // RefValue ?>
		<td data-name="RefValue"<?php echo $view_lab_resultreleased->RefValue->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_RefValue" class="form-group view_lab_resultreleased_RefValue">
<textarea data-table="view_lab_resultreleased" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased->RefValue->editAttributes() ?>><?php echo $view_lab_resultreleased->RefValue->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_RefValue" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_RefValue" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleased->RefValue->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_RefValue" class="form-group view_lab_resultreleased_RefValue">
<textarea data-table="view_lab_resultreleased" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased->RefValue->editAttributes() ?>><?php echo $view_lab_resultreleased->RefValue->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_RefValue" class="view_lab_resultreleased_RefValue">
<span<?php echo $view_lab_resultreleased->RefValue->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->RefValue->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Order->Visible) { // Order ?>
		<td data-name="Order"<?php echo $view_lab_resultreleased->Order->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Order" class="form-group view_lab_resultreleased_Order">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Order" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Order->EditValue ?>"<?php echo $view_lab_resultreleased->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Order" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Order" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleased->Order->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Order" class="form-group view_lab_resultreleased_Order">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Order" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Order->EditValue ?>"<?php echo $view_lab_resultreleased->Order->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Order" class="view_lab_resultreleased_Order">
<span<?php echo $view_lab_resultreleased->Order->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Order->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated"<?php echo $view_lab_resultreleased->Repeated->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Repeated" class="form-group view_lab_resultreleased_Repeated">
<div id="tp_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Repeated" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_resultreleased" data-field="x_Repeated" data-value-separator="<?php echo $view_lab_resultreleased->Repeated->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Repeated[]" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Repeated[]" value="{value}"<?php echo $view_lab_resultreleased->Repeated->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Repeated" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleased->Repeated->checkBoxListHtml(FALSE, "x{$view_lab_resultreleased_list->RowIndex}_Repeated[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Repeated" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Repeated[]" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Repeated[]" value="<?php echo HtmlEncode($view_lab_resultreleased->Repeated->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Repeated" class="form-group view_lab_resultreleased_Repeated">
<div id="tp_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Repeated" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_resultreleased" data-field="x_Repeated" data-value-separator="<?php echo $view_lab_resultreleased->Repeated->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Repeated[]" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Repeated[]" value="{value}"<?php echo $view_lab_resultreleased->Repeated->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Repeated" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleased->Repeated->checkBoxListHtml(FALSE, "x{$view_lab_resultreleased_list->RowIndex}_Repeated[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Repeated" class="view_lab_resultreleased_Repeated">
<span<?php echo $view_lab_resultreleased->Repeated->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Repeated->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Vid->Visible) { // Vid ?>
		<td data-name="Vid"<?php echo $view_lab_resultreleased->Vid->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_lab_resultreleased->Vid->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Vid" class="form-group view_lab_resultreleased_Vid">
<span<?php echo $view_lab_resultreleased->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleased->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Vid" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleased->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Vid" class="form-group view_lab_resultreleased_Vid">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Vid" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Vid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Vid->EditValue ?>"<?php echo $view_lab_resultreleased->Vid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Vid" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Vid" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleased->Vid->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_lab_resultreleased->Vid->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Vid" class="form-group view_lab_resultreleased_Vid">
<span<?php echo $view_lab_resultreleased->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleased->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Vid" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleased->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Vid" class="form-group view_lab_resultreleased_Vid">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Vid" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Vid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Vid->EditValue ?>"<?php echo $view_lab_resultreleased->Vid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Vid" class="view_lab_resultreleased_Vid">
<span<?php echo $view_lab_resultreleased->Vid->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Vid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId"<?php echo $view_lab_resultreleased->invoiceId->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_invoiceId" class="form-group view_lab_resultreleased_invoiceId">
<input type="text" data-table="view_lab_resultreleased" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->invoiceId->EditValue ?>"<?php echo $view_lab_resultreleased->invoiceId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_invoiceId" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_invoiceId" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleased->invoiceId->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_invoiceId" class="form-group view_lab_resultreleased_invoiceId">
<input type="text" data-table="view_lab_resultreleased" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->invoiceId->EditValue ?>"<?php echo $view_lab_resultreleased->invoiceId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_invoiceId" class="view_lab_resultreleased_invoiceId">
<span<?php echo $view_lab_resultreleased->invoiceId->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->invoiceId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->DrID->Visible) { // DrID ?>
		<td data-name="DrID"<?php echo $view_lab_resultreleased->DrID->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_DrID" class="form-group view_lab_resultreleased_DrID">
<input type="text" data-table="view_lab_resultreleased" data-field="x_DrID" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->DrID->EditValue ?>"<?php echo $view_lab_resultreleased->DrID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrID" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrID" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleased->DrID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_DrID" class="form-group view_lab_resultreleased_DrID">
<input type="text" data-table="view_lab_resultreleased" data-field="x_DrID" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->DrID->EditValue ?>"<?php echo $view_lab_resultreleased->DrID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_DrID" class="view_lab_resultreleased_DrID">
<span<?php echo $view_lab_resultreleased->DrID->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->DrID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE"<?php echo $view_lab_resultreleased->DrCODE->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_DrCODE" class="form-group view_lab_resultreleased_DrCODE">
<input type="text" data-table="view_lab_resultreleased" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->DrCODE->EditValue ?>"<?php echo $view_lab_resultreleased->DrCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrCODE" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrCODE" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleased->DrCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_DrCODE" class="form-group view_lab_resultreleased_DrCODE">
<input type="text" data-table="view_lab_resultreleased" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->DrCODE->EditValue ?>"<?php echo $view_lab_resultreleased->DrCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_DrCODE" class="view_lab_resultreleased_DrCODE">
<span<?php echo $view_lab_resultreleased->DrCODE->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->DrCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->DrName->Visible) { // DrName ?>
		<td data-name="DrName"<?php echo $view_lab_resultreleased->DrName->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_DrName" class="form-group view_lab_resultreleased_DrName">
<input type="text" data-table="view_lab_resultreleased" data-field="x_DrName" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->DrName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->DrName->EditValue ?>"<?php echo $view_lab_resultreleased->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrName" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrName" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleased->DrName->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_DrName" class="form-group view_lab_resultreleased_DrName">
<input type="text" data-table="view_lab_resultreleased" data-field="x_DrName" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->DrName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->DrName->EditValue ?>"<?php echo $view_lab_resultreleased->DrName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_DrName" class="view_lab_resultreleased_DrName">
<span<?php echo $view_lab_resultreleased->DrName->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->DrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Department->Visible) { // Department ?>
		<td data-name="Department"<?php echo $view_lab_resultreleased->Department->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Department" class="form-group view_lab_resultreleased_Department">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Department" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Department->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Department->EditValue ?>"<?php echo $view_lab_resultreleased->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Department" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Department" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleased->Department->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Department" class="form-group view_lab_resultreleased_Department">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Department" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Department->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Department->EditValue ?>"<?php echo $view_lab_resultreleased->Department->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_Department" class="view_lab_resultreleased_Department">
<span<?php echo $view_lab_resultreleased->Department->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->Department->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_lab_resultreleased->createddatetime->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_createddatetime" class="form-group view_lab_resultreleased_createddatetime">
<input type="text" data-table="view_lab_resultreleased" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->createddatetime->EditValue ?>"<?php echo $view_lab_resultreleased->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_resultreleased->createddatetime->ReadOnly && !$view_lab_resultreleased->createddatetime->Disabled && !isset($view_lab_resultreleased->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_resultreleased->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_lab_resultreleasedlist", "x<?php echo $view_lab_resultreleased_list->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_createddatetime" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_createddatetime" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleased->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_createddatetime" class="form-group view_lab_resultreleased_createddatetime">
<input type="text" data-table="view_lab_resultreleased" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->createddatetime->EditValue ?>"<?php echo $view_lab_resultreleased->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_resultreleased->createddatetime->ReadOnly && !$view_lab_resultreleased->createddatetime->Disabled && !isset($view_lab_resultreleased->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_resultreleased->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_lab_resultreleasedlist", "x<?php echo $view_lab_resultreleased_list->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_createddatetime" class="view_lab_resultreleased_createddatetime">
<span<?php echo $view_lab_resultreleased->createddatetime->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_lab_resultreleased->status->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_status" class="form-group view_lab_resultreleased_status">
<input type="text" data-table="view_lab_resultreleased" data-field="x_status" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->status->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->status->EditValue ?>"<?php echo $view_lab_resultreleased->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_status" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_status" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleased->status->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_status" class="form-group view_lab_resultreleased_status">
<input type="text" data-table="view_lab_resultreleased" data-field="x_status" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->status->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->status->EditValue ?>"<?php echo $view_lab_resultreleased->status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_status" class="view_lab_resultreleased_status">
<span<?php echo $view_lab_resultreleased->status->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->TestType->Visible) { // TestType ?>
		<td data-name="TestType"<?php echo $view_lab_resultreleased->TestType->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_TestType" class="form-group view_lab_resultreleased_TestType">
<input type="text" data-table="view_lab_resultreleased" data-field="x_TestType" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->TestType->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->TestType->EditValue ?>"<?php echo $view_lab_resultreleased->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_TestType" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestType" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleased->TestType->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_TestType" class="form-group view_lab_resultreleased_TestType">
<input type="text" data-table="view_lab_resultreleased" data-field="x_TestType" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->TestType->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->TestType->EditValue ?>"<?php echo $view_lab_resultreleased->TestType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_TestType" class="view_lab_resultreleased_TestType">
<span<?php echo $view_lab_resultreleased->TestType->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->TestType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate"<?php echo $view_lab_resultreleased->ResultDate->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ResultDate" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_ResultDate" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleased->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_ResultDate" class="view_lab_resultreleased_ResultDate">
<span<?php echo $view_lab_resultreleased->ResultDate->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->ResultDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy"<?php echo $view_lab_resultreleased->ResultedBy->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ResultedBy" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_ResultedBy" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleased->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_ResultedBy" class="view_lab_resultreleased_ResultedBy">
<span<?php echo $view_lab_resultreleased->ResultedBy->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->ResultedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_lab_resultreleased->HospID->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_HospID" class="form-group view_lab_resultreleased_HospID">
<input type="text" data-table="view_lab_resultreleased" data-field="x_HospID" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->HospID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->HospID->EditValue ?>"<?php echo $view_lab_resultreleased->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_HospID" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_HospID" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleased->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_HospID" class="form-group view_lab_resultreleased_HospID">
<input type="text" data-table="view_lab_resultreleased" data-field="x_HospID" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->HospID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->HospID->EditValue ?>"<?php echo $view_lab_resultreleased->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleased_list->RowCnt ?>_view_lab_resultreleased_HospID" class="view_lab_resultreleased_HospID">
<span<?php echo $view_lab_resultreleased->HospID->viewAttributes() ?>>
<?php echo $view_lab_resultreleased->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_resultreleased_list->ListOptions->render("body", "right", $view_lab_resultreleased_list->RowCnt);
?>
	</tr>
<?php if ($view_lab_resultreleased->RowType == ROWTYPE_ADD || $view_lab_resultreleased->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_lab_resultreleasedlist.updateLists(<?php echo $view_lab_resultreleased_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_lab_resultreleased->isGridAdd())
		if (!$view_lab_resultreleased_list->Recordset->EOF)
			$view_lab_resultreleased_list->Recordset->moveNext();
}
?>
<?php
	if ($view_lab_resultreleased->isGridAdd() || $view_lab_resultreleased->isGridEdit()) {
		$view_lab_resultreleased_list->RowIndex = '$rowindex$';
		$view_lab_resultreleased_list->loadRowValues();

		// Set row properties
		$view_lab_resultreleased->resetAttributes();
		$view_lab_resultreleased->RowAttrs = array_merge($view_lab_resultreleased->RowAttrs, array('data-rowindex'=>$view_lab_resultreleased_list->RowIndex, 'id'=>'r0_view_lab_resultreleased', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_lab_resultreleased->RowAttrs["class"], "ew-template");
		$view_lab_resultreleased->RowType = ROWTYPE_ADD;

		// Render row
		$view_lab_resultreleased_list->renderRow();

		// Render list options
		$view_lab_resultreleased_list->renderListOptions();
		$view_lab_resultreleased_list->StartRowCnt = 0;
?>
	<tr<?php echo $view_lab_resultreleased->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_resultreleased_list->ListOptions->render("body", "left", $view_lab_resultreleased_list->RowIndex);
?>
	<?php if ($view_lab_resultreleased->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_id" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_id" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleased->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<span id="el$rowindex$_view_lab_resultreleased_PatID" class="form-group view_lab_resultreleased_PatID">
<input type="text" data-table="view_lab_resultreleased" data-field="x_PatID" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->PatID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->PatID->EditValue ?>"<?php echo $view_lab_resultreleased->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_PatID" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatID" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleased->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<span id="el$rowindex$_view_lab_resultreleased_PatientName" class="form-group view_lab_resultreleased_PatientName">
<input type="text" data-table="view_lab_resultreleased" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->PatientName->EditValue ?>"<?php echo $view_lab_resultreleased->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_PatientName" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatientName" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleased->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Age->Visible) { // Age ?>
		<td data-name="Age">
<span id="el$rowindex$_view_lab_resultreleased_Age" class="form-group view_lab_resultreleased_Age">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Age" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Age->EditValue ?>"<?php echo $view_lab_resultreleased->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Age" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Age" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleased->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<span id="el$rowindex$_view_lab_resultreleased_Gender" class="form-group view_lab_resultreleased_Gender">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Gender" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Gender->EditValue ?>"<?php echo $view_lab_resultreleased->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Gender" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Gender" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleased->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->sid->Visible) { // sid ?>
		<td data-name="sid">
<span id="el$rowindex$_view_lab_resultreleased_sid" class="form-group view_lab_resultreleased_sid">
<input type="text" data-table="view_lab_resultreleased" data-field="x_sid" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->sid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->sid->EditValue ?>"<?php echo $view_lab_resultreleased->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_sid" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_sid" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleased->sid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode">
<span id="el$rowindex$_view_lab_resultreleased_ItemCode" class="form-group view_lab_resultreleased_ItemCode">
<input type="text" data-table="view_lab_resultreleased" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->ItemCode->EditValue ?>"<?php echo $view_lab_resultreleased->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ItemCode" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_ItemCode" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleased->ItemCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd">
<span id="el$rowindex$_view_lab_resultreleased_DEptCd" class="form-group view_lab_resultreleased_DEptCd">
<input type="text" data-table="view_lab_resultreleased" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->DEptCd->EditValue ?>"<?php echo $view_lab_resultreleased->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DEptCd" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_DEptCd" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleased->DEptCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted">
<span id="el$rowindex$_view_lab_resultreleased_Resulted" class="form-group view_lab_resultreleased_Resulted">
<div id="tp_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Resulted" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_resultreleased" data-field="x_Resulted" data-value-separator="<?php echo $view_lab_resultreleased->Resulted->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Resulted[]" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Resulted[]" value="{value}"<?php echo $view_lab_resultreleased->Resulted->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Resulted" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleased->Resulted->checkBoxListHtml(FALSE, "x{$view_lab_resultreleased_list->RowIndex}_Resulted[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Resulted" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Resulted[]" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Resulted[]" value="<?php echo HtmlEncode($view_lab_resultreleased->Resulted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Services->Visible) { // Services ?>
		<td data-name="Services">
<span id="el$rowindex$_view_lab_resultreleased_Services" class="form-group view_lab_resultreleased_Services">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Services" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Services->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Services->EditValue ?>"<?php echo $view_lab_resultreleased->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Services" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Services" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleased->Services->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->LabReport->Visible) { // LabReport ?>
		<td data-name="LabReport">
<span id="el$rowindex$_view_lab_resultreleased_LabReport" class="form-group view_lab_resultreleased_LabReport">
<textarea data-table="view_lab_resultreleased" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->LabReport->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased->LabReport->editAttributes() ?>><?php echo $view_lab_resultreleased->LabReport->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_LabReport" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_LabReport" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleased->LabReport->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1">
<span id="el$rowindex$_view_lab_resultreleased_Pic1" class="form-group view_lab_resultreleased_Pic1">
<div id="fd_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1">
<span title="<?php echo $view_lab_resultreleased->Pic1->title() ? $view_lab_resultreleased->Pic1->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($view_lab_resultreleased->Pic1->ReadOnly || $view_lab_resultreleased->Pic1->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="view_lab_resultreleased" data-field="x_Pic1" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1"<?php echo $view_lab_resultreleased->Pic1->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id= "fn_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleased->Pic1->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id= "fa_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id= "fs_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id= "fx_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleased->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id= "fm_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleased->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Pic1" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_lab_resultreleased->Pic1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2">
<span id="el$rowindex$_view_lab_resultreleased_Pic2" class="form-group view_lab_resultreleased_Pic2">
<div id="fd_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2">
<span title="<?php echo $view_lab_resultreleased->Pic2->title() ? $view_lab_resultreleased->Pic2->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($view_lab_resultreleased->Pic2->ReadOnly || $view_lab_resultreleased->Pic2->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="view_lab_resultreleased" data-field="x_Pic2" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2"<?php echo $view_lab_resultreleased->Pic2->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id= "fn_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleased->Pic2->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id= "fa_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id= "fs_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id= "fx_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleased->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id= "fm_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleased->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Pic2" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_lab_resultreleased->Pic2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit">
<span id="el$rowindex$_view_lab_resultreleased_TestUnit" class="form-group view_lab_resultreleased_TestUnit">
<?php
$wrkonchange = "" . trim(@$view_lab_resultreleased->TestUnit->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_lab_resultreleased->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" class="text-nowrap" style="z-index: <?php echo (9000 - $view_lab_resultreleased_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" id="sv_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" value="<?php echo RemoveHtml($view_lab_resultreleased->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_lab_resultreleased->TestUnit->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_TestUnit" data-value-separator="<?php echo $view_lab_resultreleased->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleased->TestUnit->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_lab_resultreleasedlist.createAutoSuggest({"id":"x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit","forceSelect":false});
</script>
<?php echo $view_lab_resultreleased->TestUnit->Lookup->getParamTag("p_x" . $view_lab_resultreleased_list->RowIndex . "_TestUnit") ?>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_TestUnit" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleased->TestUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->RefValue->Visible) { // RefValue ?>
		<td data-name="RefValue">
<span id="el$rowindex$_view_lab_resultreleased_RefValue" class="form-group view_lab_resultreleased_RefValue">
<textarea data-table="view_lab_resultreleased" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased->RefValue->editAttributes() ?>><?php echo $view_lab_resultreleased->RefValue->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_RefValue" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_RefValue" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleased->RefValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Order->Visible) { // Order ?>
		<td data-name="Order">
<span id="el$rowindex$_view_lab_resultreleased_Order" class="form-group view_lab_resultreleased_Order">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Order" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Order->EditValue ?>"<?php echo $view_lab_resultreleased->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Order" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Order" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleased->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated">
<span id="el$rowindex$_view_lab_resultreleased_Repeated" class="form-group view_lab_resultreleased_Repeated">
<div id="tp_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Repeated" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_resultreleased" data-field="x_Repeated" data-value-separator="<?php echo $view_lab_resultreleased->Repeated->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Repeated[]" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Repeated[]" value="{value}"<?php echo $view_lab_resultreleased->Repeated->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Repeated" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleased->Repeated->checkBoxListHtml(FALSE, "x{$view_lab_resultreleased_list->RowIndex}_Repeated[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Repeated" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Repeated[]" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Repeated[]" value="<?php echo HtmlEncode($view_lab_resultreleased->Repeated->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Vid->Visible) { // Vid ?>
		<td data-name="Vid">
<?php if ($view_lab_resultreleased->Vid->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_lab_resultreleased_Vid" class="form-group view_lab_resultreleased_Vid">
<span<?php echo $view_lab_resultreleased->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleased->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Vid" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleased->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_Vid" class="form-group view_lab_resultreleased_Vid">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Vid" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Vid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Vid->EditValue ?>"<?php echo $view_lab_resultreleased->Vid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Vid" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Vid" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleased->Vid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId">
<span id="el$rowindex$_view_lab_resultreleased_invoiceId" class="form-group view_lab_resultreleased_invoiceId">
<input type="text" data-table="view_lab_resultreleased" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->invoiceId->EditValue ?>"<?php echo $view_lab_resultreleased->invoiceId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_invoiceId" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_invoiceId" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleased->invoiceId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->DrID->Visible) { // DrID ?>
		<td data-name="DrID">
<span id="el$rowindex$_view_lab_resultreleased_DrID" class="form-group view_lab_resultreleased_DrID">
<input type="text" data-table="view_lab_resultreleased" data-field="x_DrID" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->DrID->EditValue ?>"<?php echo $view_lab_resultreleased->DrID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrID" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrID" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleased->DrID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE">
<span id="el$rowindex$_view_lab_resultreleased_DrCODE" class="form-group view_lab_resultreleased_DrCODE">
<input type="text" data-table="view_lab_resultreleased" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->DrCODE->EditValue ?>"<?php echo $view_lab_resultreleased->DrCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrCODE" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrCODE" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleased->DrCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->DrName->Visible) { // DrName ?>
		<td data-name="DrName">
<span id="el$rowindex$_view_lab_resultreleased_DrName" class="form-group view_lab_resultreleased_DrName">
<input type="text" data-table="view_lab_resultreleased" data-field="x_DrName" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->DrName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->DrName->EditValue ?>"<?php echo $view_lab_resultreleased->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrName" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrName" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleased->DrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->Department->Visible) { // Department ?>
		<td data-name="Department">
<span id="el$rowindex$_view_lab_resultreleased_Department" class="form-group view_lab_resultreleased_Department">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Department" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Department->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Department->EditValue ?>"<?php echo $view_lab_resultreleased->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Department" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Department" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleased->Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<span id="el$rowindex$_view_lab_resultreleased_createddatetime" class="form-group view_lab_resultreleased_createddatetime">
<input type="text" data-table="view_lab_resultreleased" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->createddatetime->EditValue ?>"<?php echo $view_lab_resultreleased->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_resultreleased->createddatetime->ReadOnly && !$view_lab_resultreleased->createddatetime->Disabled && !isset($view_lab_resultreleased->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_resultreleased->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_lab_resultreleasedlist", "x<?php echo $view_lab_resultreleased_list->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_createddatetime" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_createddatetime" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleased->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->status->Visible) { // status ?>
		<td data-name="status">
<span id="el$rowindex$_view_lab_resultreleased_status" class="form-group view_lab_resultreleased_status">
<input type="text" data-table="view_lab_resultreleased" data-field="x_status" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->status->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->status->EditValue ?>"<?php echo $view_lab_resultreleased->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_status" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_status" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleased->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<span id="el$rowindex$_view_lab_resultreleased_TestType" class="form-group view_lab_resultreleased_TestType">
<input type="text" data-table="view_lab_resultreleased" data-field="x_TestType" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->TestType->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->TestType->EditValue ?>"<?php echo $view_lab_resultreleased->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_TestType" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestType" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleased->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ResultDate" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_ResultDate" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleased->ResultDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ResultedBy" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_ResultedBy" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleased->ResultedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleased->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<span id="el$rowindex$_view_lab_resultreleased_HospID" class="form-group view_lab_resultreleased_HospID">
<input type="text" data-table="view_lab_resultreleased" data-field="x_HospID" name="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleased_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->HospID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->HospID->EditValue ?>"<?php echo $view_lab_resultreleased->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_HospID" name="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_HospID" id="o<?php echo $view_lab_resultreleased_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleased->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_resultreleased_list->ListOptions->render("body", "right", $view_lab_resultreleased_list->RowIndex);
?>
<script>
fview_lab_resultreleasedlist.updateLists(<?php echo $view_lab_resultreleased_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($view_lab_resultreleased->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_lab_resultreleased_list->FormKeyCountName ?>" id="<?php echo $view_lab_resultreleased_list->FormKeyCountName ?>" value="<?php echo $view_lab_resultreleased_list->KeyCount ?>">
<?php echo $view_lab_resultreleased_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_lab_resultreleased->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_lab_resultreleased_list->Recordset)
	$view_lab_resultreleased_list->Recordset->Close();
?>
<?php if (!$view_lab_resultreleased->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_lab_resultreleased->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_lab_resultreleased_list->Pager)) $view_lab_resultreleased_list->Pager = new NumericPager($view_lab_resultreleased_list->StartRec, $view_lab_resultreleased_list->DisplayRecs, $view_lab_resultreleased_list->TotalRecs, $view_lab_resultreleased_list->RecRange, $view_lab_resultreleased_list->AutoHidePager) ?>
<?php if ($view_lab_resultreleased_list->Pager->RecordCount > 0 && $view_lab_resultreleased_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_lab_resultreleased_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_resultreleased_list->pageUrl() ?>start=<?php echo $view_lab_resultreleased_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_resultreleased_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_resultreleased_list->pageUrl() ?>start=<?php echo $view_lab_resultreleased_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_lab_resultreleased_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_lab_resultreleased_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_lab_resultreleased_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_resultreleased_list->pageUrl() ?>start=<?php echo $view_lab_resultreleased_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_resultreleased_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_resultreleased_list->pageUrl() ?>start=<?php echo $view_lab_resultreleased_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_lab_resultreleased_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_lab_resultreleased_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_lab_resultreleased_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_lab_resultreleased_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_lab_resultreleased_list->TotalRecs > 0 && (!$view_lab_resultreleased_list->AutoHidePageSizeSelector || $view_lab_resultreleased_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_lab_resultreleased">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_lab_resultreleased_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_lab_resultreleased_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_lab_resultreleased_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_lab_resultreleased_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_lab_resultreleased_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_lab_resultreleased_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="2000"<?php if ($view_lab_resultreleased_list->DisplayRecs == 2000) { ?> selected<?php } ?>>2000</option>
<option value="ALL"<?php if ($view_lab_resultreleased->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_resultreleased_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_lab_resultreleased_list->TotalRecs == 0 && !$view_lab_resultreleased->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_lab_resultreleased_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_lab_resultreleased_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_lab_resultreleased->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_lab_resultreleased->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_lab_resultreleased", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_lab_resultreleased_list->terminate();
?>