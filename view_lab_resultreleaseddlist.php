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
$view_lab_resultreleasedd_list = new view_lab_resultreleasedd_list();

// Run the page
$view_lab_resultreleasedd_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_resultreleasedd_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_lab_resultreleasedd->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_lab_resultreleaseddlist = currentForm = new ew.Form("fview_lab_resultreleaseddlist", "list");
fview_lab_resultreleaseddlist.formKeyCountName = '<?php echo $view_lab_resultreleasedd_list->FormKeyCountName ?>';

// Validate form
fview_lab_resultreleaseddlist.validate = function() {
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
		<?php if ($view_lab_resultreleasedd_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->id->caption(), $view_lab_resultreleasedd->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->PatID->caption(), $view_lab_resultreleasedd->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd->PatID->errorMessage()) ?>");
		<?php if ($view_lab_resultreleasedd_list->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->PatientName->caption(), $view_lab_resultreleasedd->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Age->caption(), $view_lab_resultreleasedd->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Gender->caption(), $view_lab_resultreleasedd->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->sid->Required) { ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->sid->caption(), $view_lab_resultreleasedd->sid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd->sid->errorMessage()) ?>");
		<?php if ($view_lab_resultreleasedd_list->ItemCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->ItemCode->caption(), $view_lab_resultreleasedd->ItemCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->DEptCd->Required) { ?>
			elm = this.getElements("x" + infix + "_DEptCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->DEptCd->caption(), $view_lab_resultreleasedd->DEptCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->Resulted->Required) { ?>
			elm = this.getElements("x" + infix + "_Resulted[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Resulted->caption(), $view_lab_resultreleasedd->Resulted->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->Services->Required) { ?>
			elm = this.getElements("x" + infix + "_Services");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Services->caption(), $view_lab_resultreleasedd->Services->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->LabReport->Required) { ?>
			elm = this.getElements("x" + infix + "_LabReport");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->LabReport->caption(), $view_lab_resultreleasedd->LabReport->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->Pic1->Required) { ?>
			felm = this.getElements("x" + infix + "_Pic1");
			elm = this.getElements("fn_x" + infix + "_Pic1");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Pic1->caption(), $view_lab_resultreleasedd->Pic1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->Pic2->Required) { ?>
			felm = this.getElements("x" + infix + "_Pic2");
			elm = this.getElements("fn_x" + infix + "_Pic2");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Pic2->caption(), $view_lab_resultreleasedd->Pic2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->TestUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_TestUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->TestUnit->caption(), $view_lab_resultreleasedd->TestUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->RefValue->Required) { ?>
			elm = this.getElements("x" + infix + "_RefValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->RefValue->caption(), $view_lab_resultreleasedd->RefValue->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Order->caption(), $view_lab_resultreleasedd->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd->Order->errorMessage()) ?>");
		<?php if ($view_lab_resultreleasedd_list->Repeated->Required) { ?>
			elm = this.getElements("x" + infix + "_Repeated[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Repeated->caption(), $view_lab_resultreleasedd->Repeated->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->Vid->Required) { ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Vid->caption(), $view_lab_resultreleasedd->Vid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd->Vid->errorMessage()) ?>");
		<?php if ($view_lab_resultreleasedd_list->invoiceId->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->invoiceId->caption(), $view_lab_resultreleasedd->invoiceId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd->invoiceId->errorMessage()) ?>");
		<?php if ($view_lab_resultreleasedd_list->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->DrID->caption(), $view_lab_resultreleasedd->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd->DrID->errorMessage()) ?>");
		<?php if ($view_lab_resultreleasedd_list->DrCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_DrCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->DrCODE->caption(), $view_lab_resultreleasedd->DrCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->DrName->Required) { ?>
			elm = this.getElements("x" + infix + "_DrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->DrName->caption(), $view_lab_resultreleasedd->DrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->Department->caption(), $view_lab_resultreleasedd->Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->createddatetime->caption(), $view_lab_resultreleasedd->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd->createddatetime->errorMessage()) ?>");
		<?php if ($view_lab_resultreleasedd_list->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->status->caption(), $view_lab_resultreleasedd->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd->status->errorMessage()) ?>");
		<?php if ($view_lab_resultreleasedd_list->TestType->Required) { ?>
			elm = this.getElements("x" + infix + "_TestType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->TestType->caption(), $view_lab_resultreleasedd->TestType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->ResultDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->ResultDate->caption(), $view_lab_resultreleasedd->ResultDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->ResultedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->ResultedBy->caption(), $view_lab_resultreleasedd->ResultedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleasedd_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd->HospID->caption(), $view_lab_resultreleasedd->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd->HospID->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fview_lab_resultreleaseddlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_resultreleaseddlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_resultreleaseddlist.lists["x_Resulted[]"] = <?php echo $view_lab_resultreleasedd_list->Resulted->Lookup->toClientList() ?>;
fview_lab_resultreleaseddlist.lists["x_Resulted[]"].options = <?php echo JsonEncode($view_lab_resultreleasedd_list->Resulted->options(FALSE, TRUE)) ?>;
fview_lab_resultreleaseddlist.lists["x_TestUnit"] = <?php echo $view_lab_resultreleasedd_list->TestUnit->Lookup->toClientList() ?>;
fview_lab_resultreleaseddlist.lists["x_TestUnit"].options = <?php echo JsonEncode($view_lab_resultreleasedd_list->TestUnit->lookupOptions()) ?>;
fview_lab_resultreleaseddlist.autoSuggests["x_TestUnit"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_lab_resultreleaseddlist.lists["x_Repeated[]"] = <?php echo $view_lab_resultreleasedd_list->Repeated->Lookup->toClientList() ?>;
fview_lab_resultreleaseddlist.lists["x_Repeated[]"].options = <?php echo JsonEncode($view_lab_resultreleasedd_list->Repeated->options(FALSE, TRUE)) ?>;

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
<?php if (!$view_lab_resultreleasedd->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_lab_resultreleasedd_list->TotalRecs > 0 && $view_lab_resultreleasedd_list->ExportOptions->visible()) { ?>
<?php $view_lab_resultreleasedd_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->ImportOptions->visible()) { ?>
<?php $view_lab_resultreleasedd_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_lab_resultreleasedd->isExport() || EXPORT_MASTER_RECORD && $view_lab_resultreleasedd->isExport("print")) { ?>
<?php
if ($view_lab_resultreleasedd_list->DbMasterFilter <> "" && $view_lab_resultreleasedd->getCurrentMasterTable() == "view_lab_servicess") {
	if ($view_lab_resultreleasedd_list->MasterRecordExists) {
		include_once "view_lab_servicessmaster.php";
	}
}
?>
<?php } ?>
<?php
$view_lab_resultreleasedd_list->renderOtherOptions();
?>
<?php $view_lab_resultreleasedd_list->showPageHeader(); ?>
<?php
$view_lab_resultreleasedd_list->showMessage();
?>
<?php if ($view_lab_resultreleasedd_list->TotalRecs > 0 || $view_lab_resultreleasedd->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_lab_resultreleasedd_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_resultreleasedd">
<?php if (!$view_lab_resultreleasedd->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_lab_resultreleasedd->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_lab_resultreleasedd_list->Pager)) $view_lab_resultreleasedd_list->Pager = new NumericPager($view_lab_resultreleasedd_list->StartRec, $view_lab_resultreleasedd_list->DisplayRecs, $view_lab_resultreleasedd_list->TotalRecs, $view_lab_resultreleasedd_list->RecRange, $view_lab_resultreleasedd_list->AutoHidePager) ?>
<?php if ($view_lab_resultreleasedd_list->Pager->RecordCount > 0 && $view_lab_resultreleasedd_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_lab_resultreleasedd_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_resultreleasedd_list->pageUrl() ?>start=<?php echo $view_lab_resultreleasedd_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_resultreleasedd_list->pageUrl() ?>start=<?php echo $view_lab_resultreleasedd_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_lab_resultreleasedd_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_lab_resultreleasedd_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_resultreleasedd_list->pageUrl() ?>start=<?php echo $view_lab_resultreleasedd_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_resultreleasedd_list->pageUrl() ?>start=<?php echo $view_lab_resultreleasedd_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_lab_resultreleasedd_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_lab_resultreleasedd_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_lab_resultreleasedd_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->TotalRecs > 0 && (!$view_lab_resultreleasedd_list->AutoHidePageSizeSelector || $view_lab_resultreleasedd_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_lab_resultreleasedd">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_lab_resultreleasedd_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_lab_resultreleasedd_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_lab_resultreleasedd_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_lab_resultreleasedd_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_lab_resultreleasedd_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_lab_resultreleasedd_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="2000"<?php if ($view_lab_resultreleasedd_list->DisplayRecs == 2000) { ?> selected<?php } ?>>2000</option>
<option value="ALL"<?php if ($view_lab_resultreleasedd->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_resultreleasedd_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_lab_resultreleaseddlist" id="fview_lab_resultreleaseddlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_resultreleasedd_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_resultreleasedd_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_resultreleasedd">
<?php if ($view_lab_resultreleasedd->getCurrentMasterTable() == "view_lab_servicess" && $view_lab_resultreleasedd->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_lab_servicess">
<input type="hidden" name="fk_id" value="<?php echo $view_lab_resultreleasedd->Vid->getSessionValue() ?>">
<?php } ?>
<div id="gmp_view_lab_resultreleasedd" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_lab_resultreleasedd_list->TotalRecs > 0 || $view_lab_resultreleasedd->isGridEdit()) { ?>
<table id="tbl_view_lab_resultreleaseddlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_lab_resultreleasedd_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_lab_resultreleasedd_list->renderListOptions();

// Render list options (header, left)
$view_lab_resultreleasedd_list->ListOptions->render("header", "left");
?>
<?php if ($view_lab_resultreleasedd->id->Visible) { // id ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_lab_resultreleasedd->id->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_id" class="view_lab_resultreleasedd_id"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_lab_resultreleasedd->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->id) ?>',1);"><div id="elh_view_lab_resultreleasedd_id" class="view_lab_resultreleasedd_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->PatID->Visible) { // PatID ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $view_lab_resultreleasedd->PatID->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_PatID" class="view_lab_resultreleasedd_PatID"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $view_lab_resultreleasedd->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->PatID) ?>',1);"><div id="elh_view_lab_resultreleasedd_PatID" class="view_lab_resultreleasedd_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->PatientName->Visible) { // PatientName ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_resultreleasedd->PatientName->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_PatientName" class="view_lab_resultreleasedd_PatientName"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_resultreleasedd->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->PatientName) ?>',1);"><div id="elh_view_lab_resultreleasedd_PatientName" class="view_lab_resultreleasedd_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Age->Visible) { // Age ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_lab_resultreleasedd->Age->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Age" class="view_lab_resultreleasedd_Age"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_lab_resultreleasedd->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Age) ?>',1);"><div id="elh_view_lab_resultreleasedd_Age" class="view_lab_resultreleasedd_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Gender->Visible) { // Gender ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_lab_resultreleasedd->Gender->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Gender" class="view_lab_resultreleasedd_Gender"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_lab_resultreleasedd->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Gender) ?>',1);"><div id="elh_view_lab_resultreleasedd_Gender" class="view_lab_resultreleasedd_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->sid->Visible) { // sid ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $view_lab_resultreleasedd->sid->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_sid" class="view_lab_resultreleasedd_sid"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $view_lab_resultreleasedd->sid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->sid) ?>',1);"><div id="elh_view_lab_resultreleasedd_sid" class="view_lab_resultreleasedd_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->sid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->sid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $view_lab_resultreleasedd->ItemCode->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_ItemCode" class="view_lab_resultreleasedd_ItemCode"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $view_lab_resultreleasedd->ItemCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->ItemCode) ?>',1);"><div id="elh_view_lab_resultreleasedd_ItemCode" class="view_lab_resultreleasedd_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->ItemCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->ItemCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->ItemCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $view_lab_resultreleasedd->DEptCd->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_DEptCd" class="view_lab_resultreleasedd_DEptCd"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $view_lab_resultreleasedd->DEptCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->DEptCd) ?>',1);"><div id="elh_view_lab_resultreleasedd_DEptCd" class="view_lab_resultreleasedd_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DEptCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->DEptCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->DEptCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Resulted->Visible) { // Resulted ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Resulted) == "") { ?>
		<th data-name="Resulted" class="<?php echo $view_lab_resultreleasedd->Resulted->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Resulted" class="view_lab_resultreleasedd_Resulted"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Resulted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resulted" class="<?php echo $view_lab_resultreleasedd->Resulted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Resulted) ?>',1);"><div id="elh_view_lab_resultreleasedd_Resulted" class="view_lab_resultreleasedd_Resulted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Resulted->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Resulted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Resulted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Services->Visible) { // Services ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $view_lab_resultreleasedd->Services->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Services" class="view_lab_resultreleasedd_Services"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $view_lab_resultreleasedd->Services->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Services) ?>',1);"><div id="elh_view_lab_resultreleasedd_Services" class="view_lab_resultreleasedd_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Services->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Services->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Services->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->LabReport->Visible) { // LabReport ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->LabReport) == "") { ?>
		<th data-name="LabReport" class="<?php echo $view_lab_resultreleasedd->LabReport->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_LabReport" class="view_lab_resultreleasedd_LabReport"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->LabReport->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabReport" class="<?php echo $view_lab_resultreleasedd->LabReport->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->LabReport) ?>',1);"><div id="elh_view_lab_resultreleasedd_LabReport" class="view_lab_resultreleasedd_LabReport">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->LabReport->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->LabReport->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->LabReport->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $view_lab_resultreleasedd->Pic1->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Pic1" class="view_lab_resultreleasedd_Pic1"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Pic1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $view_lab_resultreleasedd->Pic1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Pic1) ?>',1);"><div id="elh_view_lab_resultreleasedd_Pic1" class="view_lab_resultreleasedd_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Pic1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Pic1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Pic1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $view_lab_resultreleasedd->Pic2->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Pic2" class="view_lab_resultreleasedd_Pic2"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Pic2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $view_lab_resultreleasedd->Pic2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Pic2) ?>',1);"><div id="elh_view_lab_resultreleasedd_Pic2" class="view_lab_resultreleasedd_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Pic2->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Pic2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Pic2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->TestUnit) == "") { ?>
		<th data-name="TestUnit" class="<?php echo $view_lab_resultreleasedd->TestUnit->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_TestUnit" class="view_lab_resultreleasedd_TestUnit"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->TestUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestUnit" class="<?php echo $view_lab_resultreleasedd->TestUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->TestUnit) ?>',1);"><div id="elh_view_lab_resultreleasedd_TestUnit" class="view_lab_resultreleasedd_TestUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->TestUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->TestUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->TestUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RefValue->Visible) { // RefValue ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->RefValue) == "") { ?>
		<th data-name="RefValue" class="<?php echo $view_lab_resultreleasedd->RefValue->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_RefValue" class="view_lab_resultreleasedd_RefValue"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->RefValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefValue" class="<?php echo $view_lab_resultreleasedd->RefValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->RefValue) ?>',1);"><div id="elh_view_lab_resultreleasedd_RefValue" class="view_lab_resultreleasedd_RefValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->RefValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->RefValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->RefValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Order->Visible) { // Order ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_lab_resultreleasedd->Order->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Order" class="view_lab_resultreleasedd_Order"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_lab_resultreleasedd->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Order) ?>',1);"><div id="elh_view_lab_resultreleasedd_Order" class="view_lab_resultreleasedd_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Order->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Order->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Repeated->Visible) { // Repeated ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Repeated) == "") { ?>
		<th data-name="Repeated" class="<?php echo $view_lab_resultreleasedd->Repeated->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Repeated" class="view_lab_resultreleasedd_Repeated"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Repeated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Repeated" class="<?php echo $view_lab_resultreleasedd->Repeated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Repeated) ?>',1);"><div id="elh_view_lab_resultreleasedd_Repeated" class="view_lab_resultreleasedd_Repeated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Repeated->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Repeated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Repeated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Vid->Visible) { // Vid ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $view_lab_resultreleasedd->Vid->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Vid" class="view_lab_resultreleasedd_Vid"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $view_lab_resultreleasedd->Vid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Vid) ?>',1);"><div id="elh_view_lab_resultreleasedd_Vid" class="view_lab_resultreleasedd_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Vid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Vid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $view_lab_resultreleasedd->invoiceId->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_invoiceId" class="view_lab_resultreleasedd_invoiceId"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->invoiceId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $view_lab_resultreleasedd->invoiceId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->invoiceId) ?>',1);"><div id="elh_view_lab_resultreleasedd_invoiceId" class="view_lab_resultreleasedd_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->invoiceId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->invoiceId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->DrID->Visible) { // DrID ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_lab_resultreleasedd->DrID->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_DrID" class="view_lab_resultreleasedd_DrID"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_lab_resultreleasedd->DrID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->DrID) ?>',1);"><div id="elh_view_lab_resultreleasedd_DrID" class="view_lab_resultreleasedd_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->DrID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->DrID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->DrCODE) == "") { ?>
		<th data-name="DrCODE" class="<?php echo $view_lab_resultreleasedd->DrCODE->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_DrCODE" class="view_lab_resultreleasedd_DrCODE"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DrCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrCODE" class="<?php echo $view_lab_resultreleasedd->DrCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->DrCODE) ?>',1);"><div id="elh_view_lab_resultreleasedd_DrCODE" class="view_lab_resultreleasedd_DrCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DrCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->DrCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->DrCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->DrName->Visible) { // DrName ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $view_lab_resultreleasedd->DrName->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_DrName" class="view_lab_resultreleasedd_DrName"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $view_lab_resultreleasedd->DrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->DrName) ?>',1);"><div id="elh_view_lab_resultreleasedd_DrName" class="view_lab_resultreleasedd_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->DrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->DrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->Department->Visible) { // Department ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $view_lab_resultreleasedd->Department->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Department" class="view_lab_resultreleasedd_Department"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $view_lab_resultreleasedd->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->Department) ?>',1);"><div id="elh_view_lab_resultreleasedd_Department" class="view_lab_resultreleasedd_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_lab_resultreleasedd->createddatetime->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_createddatetime" class="view_lab_resultreleasedd_createddatetime"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_lab_resultreleasedd->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->createddatetime) ?>',1);"><div id="elh_view_lab_resultreleasedd_createddatetime" class="view_lab_resultreleasedd_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->status->Visible) { // status ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_lab_resultreleasedd->status->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_status" class="view_lab_resultreleasedd_status"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_lab_resultreleasedd->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->status) ?>',1);"><div id="elh_view_lab_resultreleasedd_status" class="view_lab_resultreleasedd_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->TestType->Visible) { // TestType ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $view_lab_resultreleasedd->TestType->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_TestType" class="view_lab_resultreleasedd_TestType"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $view_lab_resultreleasedd->TestType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->TestType) ?>',1);"><div id="elh_view_lab_resultreleasedd_TestType" class="view_lab_resultreleasedd_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->TestType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->TestType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->TestType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $view_lab_resultreleasedd->ResultDate->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_ResultDate" class="view_lab_resultreleasedd_ResultDate"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $view_lab_resultreleasedd->ResultDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->ResultDate) ?>',1);"><div id="elh_view_lab_resultreleasedd_ResultDate" class="view_lab_resultreleasedd_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->ResultDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->ResultDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $view_lab_resultreleasedd->ResultedBy->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_ResultedBy" class="view_lab_resultreleasedd_ResultedBy"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->ResultedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $view_lab_resultreleasedd->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->ResultedBy) ?>',1);"><div id="elh_view_lab_resultreleasedd_ResultedBy" class="view_lab_resultreleasedd_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->ResultedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->ResultedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->ResultedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_resultreleasedd->sortUrl($view_lab_resultreleasedd->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_lab_resultreleasedd->HospID->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_HospID" class="view_lab_resultreleasedd_HospID"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_lab_resultreleasedd->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_resultreleasedd->SortUrl($view_lab_resultreleasedd->HospID) ?>',1);"><div id="elh_view_lab_resultreleasedd_HospID" class="view_lab_resultreleasedd_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_resultreleasedd_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_lab_resultreleasedd->ExportAll && $view_lab_resultreleasedd->isExport()) {
	$view_lab_resultreleasedd_list->StopRec = $view_lab_resultreleasedd_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_lab_resultreleasedd_list->TotalRecs > $view_lab_resultreleasedd_list->StartRec + $view_lab_resultreleasedd_list->DisplayRecs - 1)
		$view_lab_resultreleasedd_list->StopRec = $view_lab_resultreleasedd_list->StartRec + $view_lab_resultreleasedd_list->DisplayRecs - 1;
	else
		$view_lab_resultreleasedd_list->StopRec = $view_lab_resultreleasedd_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $view_lab_resultreleasedd_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_lab_resultreleasedd_list->FormKeyCountName) && ($view_lab_resultreleasedd->isGridAdd() || $view_lab_resultreleasedd->isGridEdit() || $view_lab_resultreleasedd->isConfirm())) {
		$view_lab_resultreleasedd_list->KeyCount = $CurrentForm->getValue($view_lab_resultreleasedd_list->FormKeyCountName);
		$view_lab_resultreleasedd_list->StopRec = $view_lab_resultreleasedd_list->StartRec + $view_lab_resultreleasedd_list->KeyCount - 1;
	}
}
$view_lab_resultreleasedd_list->RecCnt = $view_lab_resultreleasedd_list->StartRec - 1;
if ($view_lab_resultreleasedd_list->Recordset && !$view_lab_resultreleasedd_list->Recordset->EOF) {
	$view_lab_resultreleasedd_list->Recordset->moveFirst();
	$selectLimit = $view_lab_resultreleasedd_list->UseSelectLimit;
	if (!$selectLimit && $view_lab_resultreleasedd_list->StartRec > 1)
		$view_lab_resultreleasedd_list->Recordset->move($view_lab_resultreleasedd_list->StartRec - 1);
} elseif (!$view_lab_resultreleasedd->AllowAddDeleteRow && $view_lab_resultreleasedd_list->StopRec == 0) {
	$view_lab_resultreleasedd_list->StopRec = $view_lab_resultreleasedd->GridAddRowCount;
}

// Initialize aggregate
$view_lab_resultreleasedd->RowType = ROWTYPE_AGGREGATEINIT;
$view_lab_resultreleasedd->resetAttributes();
$view_lab_resultreleasedd_list->renderRow();
if ($view_lab_resultreleasedd->isGridEdit())
	$view_lab_resultreleasedd_list->RowIndex = 0;
while ($view_lab_resultreleasedd_list->RecCnt < $view_lab_resultreleasedd_list->StopRec) {
	$view_lab_resultreleasedd_list->RecCnt++;
	if ($view_lab_resultreleasedd_list->RecCnt >= $view_lab_resultreleasedd_list->StartRec) {
		$view_lab_resultreleasedd_list->RowCnt++;
		if ($view_lab_resultreleasedd->isGridAdd() || $view_lab_resultreleasedd->isGridEdit() || $view_lab_resultreleasedd->isConfirm()) {
			$view_lab_resultreleasedd_list->RowIndex++;
			$CurrentForm->Index = $view_lab_resultreleasedd_list->RowIndex;
			if ($CurrentForm->hasValue($view_lab_resultreleasedd_list->FormActionName) && $view_lab_resultreleasedd_list->EventCancelled)
				$view_lab_resultreleasedd_list->RowAction = strval($CurrentForm->getValue($view_lab_resultreleasedd_list->FormActionName));
			elseif ($view_lab_resultreleasedd->isGridAdd())
				$view_lab_resultreleasedd_list->RowAction = "insert";
			else
				$view_lab_resultreleasedd_list->RowAction = "";
		}

		// Set up key count
		$view_lab_resultreleasedd_list->KeyCount = $view_lab_resultreleasedd_list->RowIndex;

		// Init row class and style
		$view_lab_resultreleasedd->resetAttributes();
		$view_lab_resultreleasedd->CssClass = "";
		if ($view_lab_resultreleasedd->isGridAdd()) {
			$view_lab_resultreleasedd_list->loadRowValues(); // Load default values
		} else {
			$view_lab_resultreleasedd_list->loadRowValues($view_lab_resultreleasedd_list->Recordset); // Load row values
		}
		$view_lab_resultreleasedd->RowType = ROWTYPE_VIEW; // Render view
		if ($view_lab_resultreleasedd->isGridEdit()) { // Grid edit
			if ($view_lab_resultreleasedd->EventCancelled)
				$view_lab_resultreleasedd_list->restoreCurrentRowFormValues($view_lab_resultreleasedd_list->RowIndex); // Restore form values
			if ($view_lab_resultreleasedd_list->RowAction == "insert")
				$view_lab_resultreleasedd->RowType = ROWTYPE_ADD; // Render add
			else
				$view_lab_resultreleasedd->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_lab_resultreleasedd->isGridEdit() && ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT || $view_lab_resultreleasedd->RowType == ROWTYPE_ADD) && $view_lab_resultreleasedd->EventCancelled) // Update failed
			$view_lab_resultreleasedd_list->restoreCurrentRowFormValues($view_lab_resultreleasedd_list->RowIndex); // Restore form values
		if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) // Edit row
			$view_lab_resultreleasedd_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$view_lab_resultreleasedd->RowAttrs = array_merge($view_lab_resultreleasedd->RowAttrs, array('data-rowindex'=>$view_lab_resultreleasedd_list->RowCnt, 'id'=>'r' . $view_lab_resultreleasedd_list->RowCnt . '_view_lab_resultreleasedd', 'data-rowtype'=>$view_lab_resultreleasedd->RowType));

		// Render row
		$view_lab_resultreleasedd_list->renderRow();

		// Render list options
		$view_lab_resultreleasedd_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_lab_resultreleasedd_list->RowAction <> "delete" && $view_lab_resultreleasedd_list->RowAction <> "insertdelete" && !($view_lab_resultreleasedd_list->RowAction == "insert" && $view_lab_resultreleasedd->isConfirm() && $view_lab_resultreleasedd_list->emptyRow())) {
?>
	<tr<?php echo $view_lab_resultreleasedd->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_resultreleasedd_list->ListOptions->render("body", "left", $view_lab_resultreleasedd_list->RowCnt);
?>
	<?php if ($view_lab_resultreleasedd->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_lab_resultreleasedd->id->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_id" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_id" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleasedd->id->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_id" class="form-group view_lab_resultreleasedd_id">
<span<?php echo $view_lab_resultreleasedd->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_id" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_id" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleasedd->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_id" class="view_lab_resultreleasedd_id">
<span<?php echo $view_lab_resultreleasedd->id->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $view_lab_resultreleasedd->PatID->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_PatID" class="form-group view_lab_resultreleasedd_PatID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->PatID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->PatID->EditValue ?>"<?php echo $view_lab_resultreleasedd->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->PatID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_PatID" class="form-group view_lab_resultreleasedd_PatID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->PatID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->PatID->EditValue ?>"<?php echo $view_lab_resultreleasedd->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_PatID" class="view_lab_resultreleasedd_PatID">
<span<?php echo $view_lab_resultreleasedd->PatID->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->PatID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_lab_resultreleasedd->PatientName->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_PatientName" class="form-group view_lab_resultreleasedd_PatientName">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->PatientName->EditValue ?>"<?php echo $view_lab_resultreleasedd->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleasedd->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_PatientName" class="form-group view_lab_resultreleasedd_PatientName">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->PatientName->EditValue ?>"<?php echo $view_lab_resultreleasedd->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_PatientName" class="view_lab_resultreleasedd_PatientName">
<span<?php echo $view_lab_resultreleasedd->PatientName->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_lab_resultreleasedd->Age->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Age" class="form-group view_lab_resultreleasedd_Age">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Age" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Age->EditValue ?>"<?php echo $view_lab_resultreleasedd->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Age" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Age->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Age" class="form-group view_lab_resultreleasedd_Age">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Age" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Age->EditValue ?>"<?php echo $view_lab_resultreleasedd->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Age" class="view_lab_resultreleasedd_Age">
<span<?php echo $view_lab_resultreleasedd->Age->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Age->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $view_lab_resultreleasedd->Gender->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Gender" class="form-group view_lab_resultreleasedd_Gender">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Gender->EditValue ?>"<?php echo $view_lab_resultreleasedd->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Gender->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Gender" class="form-group view_lab_resultreleasedd_Gender">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Gender->EditValue ?>"<?php echo $view_lab_resultreleasedd->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Gender" class="view_lab_resultreleasedd_Gender">
<span<?php echo $view_lab_resultreleasedd->Gender->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Gender->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->sid->Visible) { // sid ?>
		<td data-name="sid"<?php echo $view_lab_resultreleasedd->sid->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_sid" class="form-group view_lab_resultreleasedd_sid">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_sid" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->sid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->sid->EditValue ?>"<?php echo $view_lab_resultreleasedd->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_sid" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->sid->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_sid" class="form-group view_lab_resultreleasedd_sid">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_sid" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->sid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->sid->EditValue ?>"<?php echo $view_lab_resultreleasedd->sid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_sid" class="view_lab_resultreleasedd_sid">
<span<?php echo $view_lab_resultreleasedd->sid->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->sid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode"<?php echo $view_lab_resultreleasedd->ItemCode->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_ItemCode" class="form-group view_lab_resultreleasedd_ItemCode">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->ItemCode->EditValue ?>"<?php echo $view_lab_resultreleasedd->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_ItemCode" class="form-group view_lab_resultreleasedd_ItemCode">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->ItemCode->EditValue ?>"<?php echo $view_lab_resultreleasedd->ItemCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_ItemCode" class="view_lab_resultreleasedd_ItemCode">
<span<?php echo $view_lab_resultreleasedd->ItemCode->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->ItemCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd"<?php echo $view_lab_resultreleasedd->DEptCd->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_DEptCd" class="form-group view_lab_resultreleasedd_DEptCd">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DEptCd->EditValue ?>"<?php echo $view_lab_resultreleasedd->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_DEptCd" class="form-group view_lab_resultreleasedd_DEptCd">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DEptCd->EditValue ?>"<?php echo $view_lab_resultreleasedd->DEptCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_DEptCd" class="view_lab_resultreleasedd_DEptCd">
<span<?php echo $view_lab_resultreleasedd->DEptCd->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->DEptCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted"<?php echo $view_lab_resultreleasedd->Resulted->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Resulted" class="form-group view_lab_resultreleasedd_Resulted">
<div id="tp_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_resultreleasedd" data-field="x_Resulted" data-value-separator="<?php echo $view_lab_resultreleasedd->Resulted->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" value="{value}"<?php echo $view_lab_resultreleasedd->Resulted->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleasedd->Resulted->checkBoxListHtml(FALSE, "x{$view_lab_resultreleasedd_list->RowIndex}_Resulted[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Resulted" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Resulted->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Resulted" class="form-group view_lab_resultreleasedd_Resulted">
<div id="tp_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_resultreleasedd" data-field="x_Resulted" data-value-separator="<?php echo $view_lab_resultreleasedd->Resulted->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" value="{value}"<?php echo $view_lab_resultreleasedd->Resulted->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleasedd->Resulted->checkBoxListHtml(FALSE, "x{$view_lab_resultreleasedd_list->RowIndex}_Resulted[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Resulted" class="view_lab_resultreleasedd_Resulted">
<span<?php echo $view_lab_resultreleasedd->Resulted->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Resulted->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Services->Visible) { // Services ?>
		<td data-name="Services"<?php echo $view_lab_resultreleasedd->Services->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Services" class="form-group view_lab_resultreleasedd_Services">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Services" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Services->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Services->EditValue ?>"<?php echo $view_lab_resultreleasedd->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Services" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Services->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Services" class="form-group view_lab_resultreleasedd_Services">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Services" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Services->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Services->EditValue ?>"<?php echo $view_lab_resultreleasedd->Services->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Services" class="view_lab_resultreleasedd_Services">
<span<?php echo $view_lab_resultreleasedd->Services->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Services->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->LabReport->Visible) { // LabReport ?>
		<td data-name="LabReport"<?php echo $view_lab_resultreleasedd->LabReport->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_LabReport" class="form-group view_lab_resultreleasedd_LabReport">
<textarea data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->LabReport->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd->LabReport->editAttributes() ?>><?php echo $view_lab_resultreleasedd->LabReport->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleasedd->LabReport->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_LabReport" class="form-group view_lab_resultreleasedd_LabReport">
<textarea data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->LabReport->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd->LabReport->editAttributes() ?>><?php echo $view_lab_resultreleasedd->LabReport->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_LabReport" class="view_lab_resultreleasedd_LabReport">
<span<?php echo $view_lab_resultreleasedd->LabReport->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->LabReport->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1"<?php echo $view_lab_resultreleasedd->Pic1->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Pic1" class="form-group view_lab_resultreleasedd_Pic1">
<div id="fd_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1">
<span title="<?php echo $view_lab_resultreleasedd->Pic1->title() ? $view_lab_resultreleasedd->Pic1->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($view_lab_resultreleasedd->Pic1->ReadOnly || $view_lab_resultreleasedd->Pic1->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="view_lab_resultreleasedd" data-field="x_Pic1" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1"<?php echo $view_lab_resultreleasedd->Pic1->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd->Pic1->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Pic1" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Pic1->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Pic1" class="form-group view_lab_resultreleasedd_Pic1">
<div id="fd_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1">
<span title="<?php echo $view_lab_resultreleasedd->Pic1->title() ? $view_lab_resultreleasedd->Pic1->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($view_lab_resultreleasedd->Pic1->ReadOnly || $view_lab_resultreleasedd->Pic1->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="view_lab_resultreleasedd" data-field="x_Pic1" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1"<?php echo $view_lab_resultreleasedd->Pic1->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd->Pic1->Upload->FileName ?>">
<?php if (Post("fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1") == "0") { ?>
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="1">
<?php } ?>
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Pic1" class="view_lab_resultreleasedd_Pic1">
<span<?php echo $view_lab_resultreleasedd->Pic1->viewAttributes() ?>>
<?php echo GetFileViewTag($view_lab_resultreleasedd->Pic1, $view_lab_resultreleasedd->Pic1->getViewValue()) ?>
</span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2"<?php echo $view_lab_resultreleasedd->Pic2->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Pic2" class="form-group view_lab_resultreleasedd_Pic2">
<div id="fd_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2">
<span title="<?php echo $view_lab_resultreleasedd->Pic2->title() ? $view_lab_resultreleasedd->Pic2->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($view_lab_resultreleasedd->Pic2->ReadOnly || $view_lab_resultreleasedd->Pic2->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="view_lab_resultreleasedd" data-field="x_Pic2" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2"<?php echo $view_lab_resultreleasedd->Pic2->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd->Pic2->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Pic2" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Pic2->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Pic2" class="form-group view_lab_resultreleasedd_Pic2">
<div id="fd_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2">
<span title="<?php echo $view_lab_resultreleasedd->Pic2->title() ? $view_lab_resultreleasedd->Pic2->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($view_lab_resultreleasedd->Pic2->ReadOnly || $view_lab_resultreleasedd->Pic2->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="view_lab_resultreleasedd" data-field="x_Pic2" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2"<?php echo $view_lab_resultreleasedd->Pic2->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd->Pic2->Upload->FileName ?>">
<?php if (Post("fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2") == "0") { ?>
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="1">
<?php } ?>
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Pic2" class="view_lab_resultreleasedd_Pic2">
<span<?php echo $view_lab_resultreleasedd->Pic2->viewAttributes() ?>>
<?php echo GetFileViewTag($view_lab_resultreleasedd->Pic2, $view_lab_resultreleasedd->Pic2->getViewValue()) ?>
</span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit"<?php echo $view_lab_resultreleasedd->TestUnit->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_TestUnit" class="form-group view_lab_resultreleasedd_TestUnit">
<?php
$wrkonchange = "" . trim(@$view_lab_resultreleasedd->TestUnit->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_lab_resultreleasedd->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" class="text-nowrap" style="z-index: <?php echo (9000 - $view_lab_resultreleasedd_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" id="sv_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" value="<?php echo RemoveHtml($view_lab_resultreleasedd->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" data-value-separator="<?php echo $view_lab_resultreleasedd->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_lab_resultreleaseddlist.createAutoSuggest({"id":"x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit","forceSelect":false});
</script>
<?php echo $view_lab_resultreleasedd->TestUnit->Lookup->getParamTag("p_x" . $view_lab_resultreleasedd_list->RowIndex . "_TestUnit") ?>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_TestUnit" class="form-group view_lab_resultreleasedd_TestUnit">
<?php
$wrkonchange = "" . trim(@$view_lab_resultreleasedd->TestUnit->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_lab_resultreleasedd->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" class="text-nowrap" style="z-index: <?php echo (9000 - $view_lab_resultreleasedd_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" id="sv_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" value="<?php echo RemoveHtml($view_lab_resultreleasedd->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" data-value-separator="<?php echo $view_lab_resultreleasedd->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_lab_resultreleaseddlist.createAutoSuggest({"id":"x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit","forceSelect":false});
</script>
<?php echo $view_lab_resultreleasedd->TestUnit->Lookup->getParamTag("p_x" . $view_lab_resultreleasedd_list->RowIndex . "_TestUnit") ?>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_TestUnit" class="view_lab_resultreleasedd_TestUnit">
<span<?php echo $view_lab_resultreleasedd->TestUnit->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->TestUnit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->RefValue->Visible) { // RefValue ?>
		<td data-name="RefValue"<?php echo $view_lab_resultreleasedd->RefValue->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_RefValue" class="form-group view_lab_resultreleasedd_RefValue">
<textarea data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd->RefValue->editAttributes() ?>><?php echo $view_lab_resultreleasedd->RefValue->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleasedd->RefValue->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_RefValue" class="form-group view_lab_resultreleasedd_RefValue">
<textarea data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd->RefValue->editAttributes() ?>><?php echo $view_lab_resultreleasedd->RefValue->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_RefValue" class="view_lab_resultreleasedd_RefValue">
<span<?php echo $view_lab_resultreleasedd->RefValue->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->RefValue->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Order->Visible) { // Order ?>
		<td data-name="Order"<?php echo $view_lab_resultreleasedd->Order->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Order" class="form-group view_lab_resultreleasedd_Order">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Order" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Order->EditValue ?>"<?php echo $view_lab_resultreleasedd->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Order" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Order->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Order" class="form-group view_lab_resultreleasedd_Order">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Order" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Order->EditValue ?>"<?php echo $view_lab_resultreleasedd->Order->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Order" class="view_lab_resultreleasedd_Order">
<span<?php echo $view_lab_resultreleasedd->Order->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Order->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated"<?php echo $view_lab_resultreleasedd->Repeated->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Repeated" class="form-group view_lab_resultreleasedd_Repeated">
<div id="tp_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_resultreleasedd" data-field="x_Repeated" data-value-separator="<?php echo $view_lab_resultreleasedd->Repeated->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" value="{value}"<?php echo $view_lab_resultreleasedd->Repeated->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleasedd->Repeated->checkBoxListHtml(FALSE, "x{$view_lab_resultreleasedd_list->RowIndex}_Repeated[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Repeated" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Repeated->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Repeated" class="form-group view_lab_resultreleasedd_Repeated">
<div id="tp_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_resultreleasedd" data-field="x_Repeated" data-value-separator="<?php echo $view_lab_resultreleasedd->Repeated->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" value="{value}"<?php echo $view_lab_resultreleasedd->Repeated->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleasedd->Repeated->checkBoxListHtml(FALSE, "x{$view_lab_resultreleasedd_list->RowIndex}_Repeated[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Repeated" class="view_lab_resultreleasedd_Repeated">
<span<?php echo $view_lab_resultreleasedd->Repeated->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Repeated->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Vid->Visible) { // Vid ?>
		<td data-name="Vid"<?php echo $view_lab_resultreleasedd->Vid->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_lab_resultreleasedd->Vid->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Vid" class="form-group view_lab_resultreleasedd_Vid">
<span<?php echo $view_lab_resultreleasedd->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Vid" class="form-group view_lab_resultreleasedd_Vid">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Vid->EditValue ?>"<?php echo $view_lab_resultreleasedd->Vid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_lab_resultreleasedd->Vid->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Vid" class="form-group view_lab_resultreleasedd_Vid">
<span<?php echo $view_lab_resultreleasedd->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Vid" class="form-group view_lab_resultreleasedd_Vid">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Vid->EditValue ?>"<?php echo $view_lab_resultreleasedd->Vid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Vid" class="view_lab_resultreleasedd_Vid">
<span<?php echo $view_lab_resultreleasedd->Vid->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Vid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId"<?php echo $view_lab_resultreleasedd->invoiceId->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_invoiceId" class="form-group view_lab_resultreleasedd_invoiceId">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->invoiceId->EditValue ?>"<?php echo $view_lab_resultreleasedd->invoiceId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleasedd->invoiceId->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_invoiceId" class="form-group view_lab_resultreleasedd_invoiceId">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->invoiceId->EditValue ?>"<?php echo $view_lab_resultreleasedd->invoiceId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_invoiceId" class="view_lab_resultreleasedd_invoiceId">
<span<?php echo $view_lab_resultreleasedd->invoiceId->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->invoiceId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->DrID->Visible) { // DrID ?>
		<td data-name="DrID"<?php echo $view_lab_resultreleasedd->DrID->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_DrID" class="form-group view_lab_resultreleasedd_DrID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DrID->EditValue ?>"<?php echo $view_lab_resultreleasedd->DrID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_DrID" class="form-group view_lab_resultreleasedd_DrID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DrID->EditValue ?>"<?php echo $view_lab_resultreleasedd->DrID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_DrID" class="view_lab_resultreleasedd_DrID">
<span<?php echo $view_lab_resultreleasedd->DrID->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->DrID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE"<?php echo $view_lab_resultreleasedd->DrCODE->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_DrCODE" class="form-group view_lab_resultreleasedd_DrCODE">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DrCODE->EditValue ?>"<?php echo $view_lab_resultreleasedd->DrCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_DrCODE" class="form-group view_lab_resultreleasedd_DrCODE">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DrCODE->EditValue ?>"<?php echo $view_lab_resultreleasedd->DrCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_DrCODE" class="view_lab_resultreleasedd_DrCODE">
<span<?php echo $view_lab_resultreleasedd->DrCODE->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->DrCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->DrName->Visible) { // DrName ?>
		<td data-name="DrName"<?php echo $view_lab_resultreleasedd->DrName->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_DrName" class="form-group view_lab_resultreleasedd_DrName">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DrName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DrName->EditValue ?>"<?php echo $view_lab_resultreleasedd->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrName->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_DrName" class="form-group view_lab_resultreleasedd_DrName">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DrName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DrName->EditValue ?>"<?php echo $view_lab_resultreleasedd->DrName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_DrName" class="view_lab_resultreleasedd_DrName">
<span<?php echo $view_lab_resultreleasedd->DrName->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->DrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Department->Visible) { // Department ?>
		<td data-name="Department"<?php echo $view_lab_resultreleasedd->Department->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Department" class="form-group view_lab_resultreleasedd_Department">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Department" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Department->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Department->EditValue ?>"<?php echo $view_lab_resultreleasedd->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Department" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Department->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Department" class="form-group view_lab_resultreleasedd_Department">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Department" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Department->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Department->EditValue ?>"<?php echo $view_lab_resultreleasedd->Department->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_Department" class="view_lab_resultreleasedd_Department">
<span<?php echo $view_lab_resultreleasedd->Department->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->Department->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_lab_resultreleasedd->createddatetime->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_createddatetime" class="form-group view_lab_resultreleasedd_createddatetime">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->createddatetime->EditValue ?>"<?php echo $view_lab_resultreleasedd->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_resultreleasedd->createddatetime->ReadOnly && !$view_lab_resultreleasedd->createddatetime->Disabled && !isset($view_lab_resultreleasedd->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_resultreleasedd->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_lab_resultreleaseddlist", "x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleasedd->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_createddatetime" class="form-group view_lab_resultreleasedd_createddatetime">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->createddatetime->EditValue ?>"<?php echo $view_lab_resultreleasedd->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_resultreleasedd->createddatetime->ReadOnly && !$view_lab_resultreleasedd->createddatetime->Disabled && !isset($view_lab_resultreleasedd->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_resultreleasedd->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_lab_resultreleaseddlist", "x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_createddatetime" class="view_lab_resultreleasedd_createddatetime">
<span<?php echo $view_lab_resultreleasedd->createddatetime->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_lab_resultreleasedd->status->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_status" class="form-group view_lab_resultreleasedd_status">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_status" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->status->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->status->EditValue ?>"<?php echo $view_lab_resultreleasedd->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_status" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleasedd->status->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_status" class="form-group view_lab_resultreleasedd_status">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_status" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->status->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->status->EditValue ?>"<?php echo $view_lab_resultreleasedd->status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_status" class="view_lab_resultreleasedd_status">
<span<?php echo $view_lab_resultreleasedd->status->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->TestType->Visible) { // TestType ?>
		<td data-name="TestType"<?php echo $view_lab_resultreleasedd->TestType->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_TestType" class="form-group view_lab_resultreleasedd_TestType">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->TestType->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->TestType->EditValue ?>"<?php echo $view_lab_resultreleasedd->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestType->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_TestType" class="form-group view_lab_resultreleasedd_TestType">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->TestType->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->TestType->EditValue ?>"<?php echo $view_lab_resultreleasedd->TestType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_TestType" class="view_lab_resultreleasedd_TestType">
<span<?php echo $view_lab_resultreleasedd->TestType->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->TestType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate"<?php echo $view_lab_resultreleasedd->ResultDate->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultDate" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ResultDate" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_ResultDate" class="view_lab_resultreleasedd_ResultDate">
<span<?php echo $view_lab_resultreleasedd->ResultDate->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->ResultDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy"<?php echo $view_lab_resultreleasedd->ResultedBy->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultedBy" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ResultedBy" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_ResultedBy" class="view_lab_resultreleasedd_ResultedBy">
<span<?php echo $view_lab_resultreleasedd->ResultedBy->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->ResultedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_lab_resultreleasedd->HospID->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_HospID" class="form-group view_lab_resultreleasedd_HospID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->HospID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->HospID->EditValue ?>"<?php echo $view_lab_resultreleasedd->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_HospID" class="form-group view_lab_resultreleasedd_HospID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->HospID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->HospID->EditValue ?>"<?php echo $view_lab_resultreleasedd->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCnt ?>_view_lab_resultreleasedd_HospID" class="view_lab_resultreleasedd_HospID">
<span<?php echo $view_lab_resultreleasedd->HospID->viewAttributes() ?>>
<?php echo $view_lab_resultreleasedd->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_resultreleasedd_list->ListOptions->render("body", "right", $view_lab_resultreleasedd_list->RowCnt);
?>
	</tr>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD || $view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_lab_resultreleaseddlist.updateLists(<?php echo $view_lab_resultreleasedd_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_lab_resultreleasedd->isGridAdd())
		if (!$view_lab_resultreleasedd_list->Recordset->EOF)
			$view_lab_resultreleasedd_list->Recordset->moveNext();
}
?>
<?php
	if ($view_lab_resultreleasedd->isGridAdd() || $view_lab_resultreleasedd->isGridEdit()) {
		$view_lab_resultreleasedd_list->RowIndex = '$rowindex$';
		$view_lab_resultreleasedd_list->loadRowValues();

		// Set row properties
		$view_lab_resultreleasedd->resetAttributes();
		$view_lab_resultreleasedd->RowAttrs = array_merge($view_lab_resultreleasedd->RowAttrs, array('data-rowindex'=>$view_lab_resultreleasedd_list->RowIndex, 'id'=>'r0_view_lab_resultreleasedd', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_lab_resultreleasedd->RowAttrs["class"], "ew-template");
		$view_lab_resultreleasedd->RowType = ROWTYPE_ADD;

		// Render row
		$view_lab_resultreleasedd_list->renderRow();

		// Render list options
		$view_lab_resultreleasedd_list->renderListOptions();
		$view_lab_resultreleasedd_list->StartRowCnt = 0;
?>
	<tr<?php echo $view_lab_resultreleasedd->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_resultreleasedd_list->ListOptions->render("body", "left", $view_lab_resultreleasedd_list->RowIndex);
?>
	<?php if ($view_lab_resultreleasedd->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_id" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_id" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleasedd->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<span id="el$rowindex$_view_lab_resultreleasedd_PatID" class="form-group view_lab_resultreleasedd_PatID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->PatID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->PatID->EditValue ?>"<?php echo $view_lab_resultreleasedd->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<span id="el$rowindex$_view_lab_resultreleasedd_PatientName" class="form-group view_lab_resultreleasedd_PatientName">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->PatientName->EditValue ?>"<?php echo $view_lab_resultreleasedd->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleasedd->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Age->Visible) { // Age ?>
		<td data-name="Age">
<span id="el$rowindex$_view_lab_resultreleasedd_Age" class="form-group view_lab_resultreleasedd_Age">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Age" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Age->EditValue ?>"<?php echo $view_lab_resultreleasedd->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Age" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<span id="el$rowindex$_view_lab_resultreleasedd_Gender" class="form-group view_lab_resultreleasedd_Gender">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Gender->EditValue ?>"<?php echo $view_lab_resultreleasedd->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->sid->Visible) { // sid ?>
		<td data-name="sid">
<span id="el$rowindex$_view_lab_resultreleasedd_sid" class="form-group view_lab_resultreleasedd_sid">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_sid" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->sid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->sid->EditValue ?>"<?php echo $view_lab_resultreleasedd->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_sid" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->sid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode">
<span id="el$rowindex$_view_lab_resultreleasedd_ItemCode" class="form-group view_lab_resultreleasedd_ItemCode">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->ItemCode->EditValue ?>"<?php echo $view_lab_resultreleasedd->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ItemCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd">
<span id="el$rowindex$_view_lab_resultreleasedd_DEptCd" class="form-group view_lab_resultreleasedd_DEptCd">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DEptCd->EditValue ?>"<?php echo $view_lab_resultreleasedd->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DEptCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted">
<span id="el$rowindex$_view_lab_resultreleasedd_Resulted" class="form-group view_lab_resultreleasedd_Resulted">
<div id="tp_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_resultreleasedd" data-field="x_Resulted" data-value-separator="<?php echo $view_lab_resultreleasedd->Resulted->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" value="{value}"<?php echo $view_lab_resultreleasedd->Resulted->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleasedd->Resulted->checkBoxListHtml(FALSE, "x{$view_lab_resultreleasedd_list->RowIndex}_Resulted[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Resulted" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Resulted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Services->Visible) { // Services ?>
		<td data-name="Services">
<span id="el$rowindex$_view_lab_resultreleasedd_Services" class="form-group view_lab_resultreleasedd_Services">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Services" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Services->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Services->EditValue ?>"<?php echo $view_lab_resultreleasedd->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Services" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Services->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->LabReport->Visible) { // LabReport ?>
		<td data-name="LabReport">
<span id="el$rowindex$_view_lab_resultreleasedd_LabReport" class="form-group view_lab_resultreleasedd_LabReport">
<textarea data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->LabReport->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd->LabReport->editAttributes() ?>><?php echo $view_lab_resultreleasedd->LabReport->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleasedd->LabReport->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1">
<span id="el$rowindex$_view_lab_resultreleasedd_Pic1" class="form-group view_lab_resultreleasedd_Pic1">
<div id="fd_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1">
<span title="<?php echo $view_lab_resultreleasedd->Pic1->title() ? $view_lab_resultreleasedd->Pic1->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($view_lab_resultreleasedd->Pic1->ReadOnly || $view_lab_resultreleasedd->Pic1->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="view_lab_resultreleasedd" data-field="x_Pic1" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1"<?php echo $view_lab_resultreleasedd->Pic1->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd->Pic1->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Pic1" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Pic1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2">
<span id="el$rowindex$_view_lab_resultreleasedd_Pic2" class="form-group view_lab_resultreleasedd_Pic2">
<div id="fd_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2">
<span title="<?php echo $view_lab_resultreleasedd->Pic2->title() ? $view_lab_resultreleasedd->Pic2->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($view_lab_resultreleasedd->Pic2->ReadOnly || $view_lab_resultreleasedd->Pic2->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="view_lab_resultreleasedd" data-field="x_Pic2" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2"<?php echo $view_lab_resultreleasedd->Pic2->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd->Pic2->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Pic2" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Pic2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit">
<span id="el$rowindex$_view_lab_resultreleasedd_TestUnit" class="form-group view_lab_resultreleasedd_TestUnit">
<?php
$wrkonchange = "" . trim(@$view_lab_resultreleasedd->TestUnit->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_lab_resultreleasedd->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" class="text-nowrap" style="z-index: <?php echo (9000 - $view_lab_resultreleasedd_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" id="sv_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" value="<?php echo RemoveHtml($view_lab_resultreleasedd->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" data-value-separator="<?php echo $view_lab_resultreleasedd->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_lab_resultreleaseddlist.createAutoSuggest({"id":"x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit","forceSelect":false});
</script>
<?php echo $view_lab_resultreleasedd->TestUnit->Lookup->getParamTag("p_x" . $view_lab_resultreleasedd_list->RowIndex . "_TestUnit") ?>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->RefValue->Visible) { // RefValue ?>
		<td data-name="RefValue">
<span id="el$rowindex$_view_lab_resultreleasedd_RefValue" class="form-group view_lab_resultreleasedd_RefValue">
<textarea data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd->RefValue->editAttributes() ?>><?php echo $view_lab_resultreleasedd->RefValue->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleasedd->RefValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Order->Visible) { // Order ?>
		<td data-name="Order">
<span id="el$rowindex$_view_lab_resultreleasedd_Order" class="form-group view_lab_resultreleasedd_Order">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Order" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Order->EditValue ?>"<?php echo $view_lab_resultreleasedd->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Order" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated">
<span id="el$rowindex$_view_lab_resultreleasedd_Repeated" class="form-group view_lab_resultreleasedd_Repeated">
<div id="tp_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_resultreleasedd" data-field="x_Repeated" data-value-separator="<?php echo $view_lab_resultreleasedd->Repeated->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" value="{value}"<?php echo $view_lab_resultreleasedd->Repeated->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleasedd->Repeated->checkBoxListHtml(FALSE, "x{$view_lab_resultreleasedd_list->RowIndex}_Repeated[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Repeated" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Repeated->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Vid->Visible) { // Vid ?>
		<td data-name="Vid">
<?php if ($view_lab_resultreleasedd->Vid->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Vid" class="form-group view_lab_resultreleasedd_Vid">
<span<?php echo $view_lab_resultreleasedd->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleasedd->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Vid" class="form-group view_lab_resultreleasedd_Vid">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Vid->EditValue ?>"<?php echo $view_lab_resultreleasedd->Vid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Vid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId">
<span id="el$rowindex$_view_lab_resultreleasedd_invoiceId" class="form-group view_lab_resultreleasedd_invoiceId">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->invoiceId->EditValue ?>"<?php echo $view_lab_resultreleasedd->invoiceId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleasedd->invoiceId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->DrID->Visible) { // DrID ?>
		<td data-name="DrID">
<span id="el$rowindex$_view_lab_resultreleasedd_DrID" class="form-group view_lab_resultreleasedd_DrID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DrID->EditValue ?>"<?php echo $view_lab_resultreleasedd->DrID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE">
<span id="el$rowindex$_view_lab_resultreleasedd_DrCODE" class="form-group view_lab_resultreleasedd_DrCODE">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DrCODE->EditValue ?>"<?php echo $view_lab_resultreleasedd->DrCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->DrName->Visible) { // DrName ?>
		<td data-name="DrName">
<span id="el$rowindex$_view_lab_resultreleasedd_DrName" class="form-group view_lab_resultreleasedd_DrName">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->DrName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->DrName->EditValue ?>"<?php echo $view_lab_resultreleasedd->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleasedd->DrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->Department->Visible) { // Department ?>
		<td data-name="Department">
<span id="el$rowindex$_view_lab_resultreleasedd_Department" class="form-group view_lab_resultreleasedd_Department">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Department" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->Department->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->Department->EditValue ?>"<?php echo $view_lab_resultreleasedd->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Department" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleasedd->Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<span id="el$rowindex$_view_lab_resultreleasedd_createddatetime" class="form-group view_lab_resultreleasedd_createddatetime">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->createddatetime->EditValue ?>"<?php echo $view_lab_resultreleasedd->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_resultreleasedd->createddatetime->ReadOnly && !$view_lab_resultreleasedd->createddatetime->Disabled && !isset($view_lab_resultreleasedd->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_resultreleasedd->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_lab_resultreleaseddlist", "x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleasedd->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->status->Visible) { // status ?>
		<td data-name="status">
<span id="el$rowindex$_view_lab_resultreleasedd_status" class="form-group view_lab_resultreleasedd_status">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_status" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->status->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->status->EditValue ?>"<?php echo $view_lab_resultreleasedd->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_status" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleasedd->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<span id="el$rowindex$_view_lab_resultreleasedd_TestType" class="form-group view_lab_resultreleasedd_TestType">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->TestType->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->TestType->EditValue ?>"<?php echo $view_lab_resultreleasedd->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleasedd->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultDate" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ResultDate" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ResultDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultedBy" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ResultedBy" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleasedd->ResultedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<span id="el$rowindex$_view_lab_resultreleasedd_HospID" class="form-group view_lab_resultreleasedd_HospID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd->HospID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd->HospID->EditValue ?>"<?php echo $view_lab_resultreleasedd->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleasedd->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_resultreleasedd_list->ListOptions->render("body", "right", $view_lab_resultreleasedd_list->RowIndex);
?>
<script>
fview_lab_resultreleaseddlist.updateLists(<?php echo $view_lab_resultreleasedd_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($view_lab_resultreleasedd->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_lab_resultreleasedd_list->FormKeyCountName ?>" id="<?php echo $view_lab_resultreleasedd_list->FormKeyCountName ?>" value="<?php echo $view_lab_resultreleasedd_list->KeyCount ?>">
<?php echo $view_lab_resultreleasedd_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_lab_resultreleasedd->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_lab_resultreleasedd_list->Recordset)
	$view_lab_resultreleasedd_list->Recordset->Close();
?>
<?php if (!$view_lab_resultreleasedd->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_lab_resultreleasedd->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_lab_resultreleasedd_list->Pager)) $view_lab_resultreleasedd_list->Pager = new NumericPager($view_lab_resultreleasedd_list->StartRec, $view_lab_resultreleasedd_list->DisplayRecs, $view_lab_resultreleasedd_list->TotalRecs, $view_lab_resultreleasedd_list->RecRange, $view_lab_resultreleasedd_list->AutoHidePager) ?>
<?php if ($view_lab_resultreleasedd_list->Pager->RecordCount > 0 && $view_lab_resultreleasedd_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_lab_resultreleasedd_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_resultreleasedd_list->pageUrl() ?>start=<?php echo $view_lab_resultreleasedd_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_resultreleasedd_list->pageUrl() ?>start=<?php echo $view_lab_resultreleasedd_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_lab_resultreleasedd_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_lab_resultreleasedd_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_resultreleasedd_list->pageUrl() ?>start=<?php echo $view_lab_resultreleasedd_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_resultreleasedd_list->pageUrl() ?>start=<?php echo $view_lab_resultreleasedd_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_lab_resultreleasedd_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_lab_resultreleasedd_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_lab_resultreleasedd_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->TotalRecs > 0 && (!$view_lab_resultreleasedd_list->AutoHidePageSizeSelector || $view_lab_resultreleasedd_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_lab_resultreleasedd">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_lab_resultreleasedd_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_lab_resultreleasedd_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_lab_resultreleasedd_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_lab_resultreleasedd_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_lab_resultreleasedd_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_lab_resultreleasedd_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="2000"<?php if ($view_lab_resultreleasedd_list->DisplayRecs == 2000) { ?> selected<?php } ?>>2000</option>
<option value="ALL"<?php if ($view_lab_resultreleasedd->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_resultreleasedd_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->TotalRecs == 0 && !$view_lab_resultreleasedd->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_lab_resultreleasedd_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_lab_resultreleasedd_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_lab_resultreleasedd->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_lab_resultreleasedd->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_lab_resultreleasedd", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_lab_resultreleasedd_list->terminate();
?>