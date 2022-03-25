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
$view_appointment_scheduler_list = new view_appointment_scheduler_list();

// Run the page
$view_appointment_scheduler_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_appointment_scheduler_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_appointment_scheduler->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_appointment_schedulerlist = currentForm = new ew.Form("fview_appointment_schedulerlist", "list");
fview_appointment_schedulerlist.formKeyCountName = '<?php echo $view_appointment_scheduler_list->FormKeyCountName ?>';

// Validate form
fview_appointment_schedulerlist.validate = function() {
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
		<?php if ($view_appointment_scheduler_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->id->caption(), $view_appointment_scheduler->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->patientID->Required) { ?>
			elm = this.getElements("x" + infix + "_patientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->patientID->caption(), $view_appointment_scheduler->patientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->patientName->Required) { ?>
			elm = this.getElements("x" + infix + "_patientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->patientName->caption(), $view_appointment_scheduler->patientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->MobileNumber->caption(), $view_appointment_scheduler->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->Purpose->Required) { ?>
			elm = this.getElements("x" + infix + "_Purpose");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->Purpose->caption(), $view_appointment_scheduler->Purpose->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->PatientType->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->PatientType->caption(), $view_appointment_scheduler->PatientType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->Referal->Required) { ?>
			elm = this.getElements("x" + infix + "_Referal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->Referal->caption(), $view_appointment_scheduler->Referal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->start_date->Required) { ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->start_date->caption(), $view_appointment_scheduler->start_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler->start_date->errorMessage()) ?>");
		<?php if ($view_appointment_scheduler_list->DoctorName->Required) { ?>
			elm = this.getElements("x" + infix + "_DoctorName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->DoctorName->caption(), $view_appointment_scheduler->DoctorName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->HospID->caption(), $view_appointment_scheduler->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->end_date->Required) { ?>
			elm = this.getElements("x" + infix + "_end_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->end_date->caption(), $view_appointment_scheduler->end_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_end_date");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler->end_date->errorMessage()) ?>");
		<?php if ($view_appointment_scheduler_list->DoctorID->Required) { ?>
			elm = this.getElements("x" + infix + "_DoctorID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->DoctorID->caption(), $view_appointment_scheduler->DoctorID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->DoctorCode->Required) { ?>
			elm = this.getElements("x" + infix + "_DoctorCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->DoctorCode->caption(), $view_appointment_scheduler->DoctorCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->Department->caption(), $view_appointment_scheduler->Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->AppointmentStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_AppointmentStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->AppointmentStatus->caption(), $view_appointment_scheduler->AppointmentStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->status->caption(), $view_appointment_scheduler->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->scheduler_id->Required) { ?>
			elm = this.getElements("x" + infix + "_scheduler_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->scheduler_id->caption(), $view_appointment_scheduler->scheduler_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->text->Required) { ?>
			elm = this.getElements("x" + infix + "_text");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->text->caption(), $view_appointment_scheduler->text->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->appointment_status->Required) { ?>
			elm = this.getElements("x" + infix + "_appointment_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->appointment_status->caption(), $view_appointment_scheduler->appointment_status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->PId->Required) { ?>
			elm = this.getElements("x" + infix + "_PId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->PId->caption(), $view_appointment_scheduler->PId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler->PId->errorMessage()) ?>");
		<?php if ($view_appointment_scheduler_list->SchEmail->Required) { ?>
			elm = this.getElements("x" + infix + "_SchEmail");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->SchEmail->caption(), $view_appointment_scheduler->SchEmail->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->appointment_type->Required) { ?>
			elm = this.getElements("x" + infix + "_appointment_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->appointment_type->caption(), $view_appointment_scheduler->appointment_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->Notified->Required) { ?>
			elm = this.getElements("x" + infix + "_Notified[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->Notified->caption(), $view_appointment_scheduler->Notified->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->Notes->Required) { ?>
			elm = this.getElements("x" + infix + "_Notes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->Notes->caption(), $view_appointment_scheduler->Notes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->paymentType->Required) { ?>
			elm = this.getElements("x" + infix + "_paymentType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->paymentType->caption(), $view_appointment_scheduler->paymentType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->WhereDidYouHear->Required) { ?>
			elm = this.getElements("x" + infix + "_WhereDidYouHear[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->WhereDidYouHear->caption(), $view_appointment_scheduler->WhereDidYouHear->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->createdBy->Required) { ?>
			elm = this.getElements("x" + infix + "_createdBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->createdBy->caption(), $view_appointment_scheduler->createdBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->createdDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_createdDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->createdDateTime->caption(), $view_appointment_scheduler->createdDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_list->PatientTypee->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientTypee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->PatientTypee->caption(), $view_appointment_scheduler->PatientTypee->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fview_appointment_schedulerlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_appointment_schedulerlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_appointment_schedulerlist.lists["x_patientID"] = <?php echo $view_appointment_scheduler_list->patientID->Lookup->toClientList() ?>;
fview_appointment_schedulerlist.lists["x_patientID"].options = <?php echo JsonEncode($view_appointment_scheduler_list->patientID->lookupOptions()) ?>;
fview_appointment_schedulerlist.lists["x_PatientType"] = <?php echo $view_appointment_scheduler_list->PatientType->Lookup->toClientList() ?>;
fview_appointment_schedulerlist.lists["x_PatientType"].options = <?php echo JsonEncode($view_appointment_scheduler_list->PatientType->options(FALSE, TRUE)) ?>;
fview_appointment_schedulerlist.lists["x_Referal"] = <?php echo $view_appointment_scheduler_list->Referal->Lookup->toClientList() ?>;
fview_appointment_schedulerlist.lists["x_Referal"].options = <?php echo JsonEncode($view_appointment_scheduler_list->Referal->lookupOptions()) ?>;
fview_appointment_schedulerlist.lists["x_DoctorName"] = <?php echo $view_appointment_scheduler_list->DoctorName->Lookup->toClientList() ?>;
fview_appointment_schedulerlist.lists["x_DoctorName"].options = <?php echo JsonEncode($view_appointment_scheduler_list->DoctorName->lookupOptions()) ?>;
fview_appointment_schedulerlist.lists["x_status[]"] = <?php echo $view_appointment_scheduler_list->status->Lookup->toClientList() ?>;
fview_appointment_schedulerlist.lists["x_status[]"].options = <?php echo JsonEncode($view_appointment_scheduler_list->status->options(FALSE, TRUE)) ?>;
fview_appointment_schedulerlist.lists["x_appointment_type"] = <?php echo $view_appointment_scheduler_list->appointment_type->Lookup->toClientList() ?>;
fview_appointment_schedulerlist.lists["x_appointment_type"].options = <?php echo JsonEncode($view_appointment_scheduler_list->appointment_type->options(FALSE, TRUE)) ?>;
fview_appointment_schedulerlist.lists["x_Notified[]"] = <?php echo $view_appointment_scheduler_list->Notified->Lookup->toClientList() ?>;
fview_appointment_schedulerlist.lists["x_Notified[]"].options = <?php echo JsonEncode($view_appointment_scheduler_list->Notified->options(FALSE, TRUE)) ?>;
fview_appointment_schedulerlist.lists["x_WhereDidYouHear[]"] = <?php echo $view_appointment_scheduler_list->WhereDidYouHear->Lookup->toClientList() ?>;
fview_appointment_schedulerlist.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($view_appointment_scheduler_list->WhereDidYouHear->lookupOptions()) ?>;
fview_appointment_schedulerlist.lists["x_PatientTypee"] = <?php echo $view_appointment_scheduler_list->PatientTypee->Lookup->toClientList() ?>;
fview_appointment_schedulerlist.lists["x_PatientTypee"].options = <?php echo JsonEncode($view_appointment_scheduler_list->PatientTypee->lookupOptions()) ?>;

// Form object for search
var fview_appointment_schedulerlistsrch = currentSearchForm = new ew.Form("fview_appointment_schedulerlistsrch");

// Filters
fview_appointment_schedulerlistsrch.filterList = <?php echo $view_appointment_scheduler_list->getFilterList() ?>;
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
<?php if (!$view_appointment_scheduler->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_appointment_scheduler_list->TotalRecs > 0 && $view_appointment_scheduler_list->ExportOptions->visible()) { ?>
<?php $view_appointment_scheduler_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_appointment_scheduler_list->ImportOptions->visible()) { ?>
<?php $view_appointment_scheduler_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_appointment_scheduler_list->SearchOptions->visible()) { ?>
<?php $view_appointment_scheduler_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_appointment_scheduler_list->FilterOptions->visible()) { ?>
<?php $view_appointment_scheduler_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_appointment_scheduler_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_appointment_scheduler->isExport() && !$view_appointment_scheduler->CurrentAction) { ?>
<form name="fview_appointment_schedulerlistsrch" id="fview_appointment_schedulerlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_appointment_scheduler_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_appointment_schedulerlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_appointment_scheduler">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_appointment_scheduler_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_appointment_scheduler_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_appointment_scheduler_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_appointment_scheduler_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_appointment_scheduler_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_appointment_scheduler_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_appointment_scheduler_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_appointment_scheduler_list->showPageHeader(); ?>
<?php
$view_appointment_scheduler_list->showMessage();
?>
<?php if ($view_appointment_scheduler_list->TotalRecs > 0 || $view_appointment_scheduler->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_appointment_scheduler_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_appointment_scheduler">
<?php if (!$view_appointment_scheduler->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_appointment_scheduler->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_appointment_scheduler_list->Pager)) $view_appointment_scheduler_list->Pager = new NumericPager($view_appointment_scheduler_list->StartRec, $view_appointment_scheduler_list->DisplayRecs, $view_appointment_scheduler_list->TotalRecs, $view_appointment_scheduler_list->RecRange, $view_appointment_scheduler_list->AutoHidePager) ?>
<?php if ($view_appointment_scheduler_list->Pager->RecordCount > 0 && $view_appointment_scheduler_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_appointment_scheduler_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_scheduler_list->pageUrl() ?>start=<?php echo $view_appointment_scheduler_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_appointment_scheduler_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_scheduler_list->pageUrl() ?>start=<?php echo $view_appointment_scheduler_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_appointment_scheduler_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_appointment_scheduler_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_appointment_scheduler_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_scheduler_list->pageUrl() ?>start=<?php echo $view_appointment_scheduler_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_appointment_scheduler_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_scheduler_list->pageUrl() ?>start=<?php echo $view_appointment_scheduler_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_appointment_scheduler_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_appointment_scheduler_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_appointment_scheduler_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_appointment_scheduler_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_appointment_scheduler_list->TotalRecs > 0 && (!$view_appointment_scheduler_list->AutoHidePageSizeSelector || $view_appointment_scheduler_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_appointment_scheduler">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_appointment_scheduler_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_appointment_scheduler_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_appointment_scheduler_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_appointment_scheduler_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_appointment_scheduler_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_appointment_scheduler_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_appointment_scheduler->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_appointment_scheduler_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_appointment_schedulerlist" id="fview_appointment_schedulerlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_appointment_scheduler_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_appointment_scheduler_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler">
<div id="gmp_view_appointment_scheduler" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_appointment_scheduler_list->TotalRecs > 0 || $view_appointment_scheduler->isAdd() || $view_appointment_scheduler->isCopy() || $view_appointment_scheduler->isGridEdit()) { ?>
<table id="tbl_view_appointment_schedulerlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_appointment_scheduler_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_appointment_scheduler_list->renderListOptions();

// Render list options (header, left)
$view_appointment_scheduler_list->ListOptions->render("header", "left");
?>
<?php if ($view_appointment_scheduler->id->Visible) { // id ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_appointment_scheduler->id->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_id" class="view_appointment_scheduler_id"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_appointment_scheduler->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->id) ?>',1);"><div id="elh_view_appointment_scheduler_id" class="view_appointment_scheduler_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->patientID->Visible) { // patientID ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->patientID) == "") { ?>
		<th data-name="patientID" class="<?php echo $view_appointment_scheduler->patientID->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_patientID" class="view_appointment_scheduler_patientID"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->patientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientID" class="<?php echo $view_appointment_scheduler->patientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->patientID) ?>',1);"><div id="elh_view_appointment_scheduler_patientID" class="view_appointment_scheduler_patientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->patientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->patientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->patientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->patientName->Visible) { // patientName ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->patientName) == "") { ?>
		<th data-name="patientName" class="<?php echo $view_appointment_scheduler->patientName->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_patientName" class="view_appointment_scheduler_patientName"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->patientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientName" class="<?php echo $view_appointment_scheduler->patientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->patientName) ?>',1);"><div id="elh_view_appointment_scheduler_patientName" class="view_appointment_scheduler_patientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->patientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->patientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->patientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $view_appointment_scheduler->MobileNumber->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_MobileNumber" class="view_appointment_scheduler_MobileNumber"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $view_appointment_scheduler->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->MobileNumber) ?>',1);"><div id="elh_view_appointment_scheduler_MobileNumber" class="view_appointment_scheduler_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->MobileNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->MobileNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->Purpose->Visible) { // Purpose ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->Purpose) == "") { ?>
		<th data-name="Purpose" class="<?php echo $view_appointment_scheduler->Purpose->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_Purpose" class="view_appointment_scheduler_Purpose"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->Purpose->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Purpose" class="<?php echo $view_appointment_scheduler->Purpose->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->Purpose) ?>',1);"><div id="elh_view_appointment_scheduler_Purpose" class="view_appointment_scheduler_Purpose">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->Purpose->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->Purpose->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->Purpose->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->PatientType->Visible) { // PatientType ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->PatientType) == "") { ?>
		<th data-name="PatientType" class="<?php echo $view_appointment_scheduler->PatientType->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_PatientType" class="view_appointment_scheduler_PatientType"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->PatientType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientType" class="<?php echo $view_appointment_scheduler->PatientType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->PatientType) ?>',1);"><div id="elh_view_appointment_scheduler_PatientType" class="view_appointment_scheduler_PatientType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->PatientType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->PatientType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->PatientType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->Referal->Visible) { // Referal ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->Referal) == "") { ?>
		<th data-name="Referal" class="<?php echo $view_appointment_scheduler->Referal->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_Referal" class="view_appointment_scheduler_Referal"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->Referal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Referal" class="<?php echo $view_appointment_scheduler->Referal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->Referal) ?>',1);"><div id="elh_view_appointment_scheduler_Referal" class="view_appointment_scheduler_Referal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->Referal->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->Referal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->Referal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->start_date->Visible) { // start_date ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->start_date) == "") { ?>
		<th data-name="start_date" class="<?php echo $view_appointment_scheduler->start_date->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_start_date" class="view_appointment_scheduler_start_date"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->start_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_date" class="<?php echo $view_appointment_scheduler->start_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->start_date) ?>',1);"><div id="elh_view_appointment_scheduler_start_date" class="view_appointment_scheduler_start_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->start_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->start_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->start_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->DoctorName) == "") { ?>
		<th data-name="DoctorName" class="<?php echo $view_appointment_scheduler->DoctorName->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_DoctorName" class="view_appointment_scheduler_DoctorName"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->DoctorName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorName" class="<?php echo $view_appointment_scheduler->DoctorName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->DoctorName) ?>',1);"><div id="elh_view_appointment_scheduler_DoctorName" class="view_appointment_scheduler_DoctorName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->DoctorName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->DoctorName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->DoctorName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->HospID->Visible) { // HospID ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_appointment_scheduler->HospID->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_HospID" class="view_appointment_scheduler_HospID"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_appointment_scheduler->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->HospID) ?>',1);"><div id="elh_view_appointment_scheduler_HospID" class="view_appointment_scheduler_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->end_date->Visible) { // end_date ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->end_date) == "") { ?>
		<th data-name="end_date" class="<?php echo $view_appointment_scheduler->end_date->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_end_date" class="view_appointment_scheduler_end_date"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->end_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="end_date" class="<?php echo $view_appointment_scheduler->end_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->end_date) ?>',1);"><div id="elh_view_appointment_scheduler_end_date" class="view_appointment_scheduler_end_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->end_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->end_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->end_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->DoctorID->Visible) { // DoctorID ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->DoctorID) == "") { ?>
		<th data-name="DoctorID" class="<?php echo $view_appointment_scheduler->DoctorID->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_DoctorID" class="view_appointment_scheduler_DoctorID"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->DoctorID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorID" class="<?php echo $view_appointment_scheduler->DoctorID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->DoctorID) ?>',1);"><div id="elh_view_appointment_scheduler_DoctorID" class="view_appointment_scheduler_DoctorID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->DoctorID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->DoctorID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->DoctorID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->DoctorCode->Visible) { // DoctorCode ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->DoctorCode) == "") { ?>
		<th data-name="DoctorCode" class="<?php echo $view_appointment_scheduler->DoctorCode->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_DoctorCode" class="view_appointment_scheduler_DoctorCode"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->DoctorCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorCode" class="<?php echo $view_appointment_scheduler->DoctorCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->DoctorCode) ?>',1);"><div id="elh_view_appointment_scheduler_DoctorCode" class="view_appointment_scheduler_DoctorCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->DoctorCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->DoctorCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->DoctorCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->Department->Visible) { // Department ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $view_appointment_scheduler->Department->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_Department" class="view_appointment_scheduler_Department"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $view_appointment_scheduler->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->Department) ?>',1);"><div id="elh_view_appointment_scheduler_Department" class="view_appointment_scheduler_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->AppointmentStatus->Visible) { // AppointmentStatus ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->AppointmentStatus) == "") { ?>
		<th data-name="AppointmentStatus" class="<?php echo $view_appointment_scheduler->AppointmentStatus->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_AppointmentStatus" class="view_appointment_scheduler_AppointmentStatus"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->AppointmentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AppointmentStatus" class="<?php echo $view_appointment_scheduler->AppointmentStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->AppointmentStatus) ?>',1);"><div id="elh_view_appointment_scheduler_AppointmentStatus" class="view_appointment_scheduler_AppointmentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->AppointmentStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->AppointmentStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->AppointmentStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->status->Visible) { // status ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_appointment_scheduler->status->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_status" class="view_appointment_scheduler_status"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_appointment_scheduler->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->status) ?>',1);"><div id="elh_view_appointment_scheduler_status" class="view_appointment_scheduler_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->scheduler_id->Visible) { // scheduler_id ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->scheduler_id) == "") { ?>
		<th data-name="scheduler_id" class="<?php echo $view_appointment_scheduler->scheduler_id->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_scheduler_id" class="view_appointment_scheduler_scheduler_id"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->scheduler_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="scheduler_id" class="<?php echo $view_appointment_scheduler->scheduler_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->scheduler_id) ?>',1);"><div id="elh_view_appointment_scheduler_scheduler_id" class="view_appointment_scheduler_scheduler_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->scheduler_id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->scheduler_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->scheduler_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->text->Visible) { // text ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->text) == "") { ?>
		<th data-name="text" class="<?php echo $view_appointment_scheduler->text->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_text" class="view_appointment_scheduler_text"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->text->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="text" class="<?php echo $view_appointment_scheduler->text->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->text) ?>',1);"><div id="elh_view_appointment_scheduler_text" class="view_appointment_scheduler_text">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->text->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->text->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->text->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->appointment_status->Visible) { // appointment_status ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->appointment_status) == "") { ?>
		<th data-name="appointment_status" class="<?php echo $view_appointment_scheduler->appointment_status->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_appointment_status" class="view_appointment_scheduler_appointment_status"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->appointment_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="appointment_status" class="<?php echo $view_appointment_scheduler->appointment_status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->appointment_status) ?>',1);"><div id="elh_view_appointment_scheduler_appointment_status" class="view_appointment_scheduler_appointment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->appointment_status->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->appointment_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->appointment_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->PId->Visible) { // PId ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->PId) == "") { ?>
		<th data-name="PId" class="<?php echo $view_appointment_scheduler->PId->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_PId" class="view_appointment_scheduler_PId"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->PId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PId" class="<?php echo $view_appointment_scheduler->PId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->PId) ?>',1);"><div id="elh_view_appointment_scheduler_PId" class="view_appointment_scheduler_PId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->PId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->PId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->PId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->SchEmail->Visible) { // SchEmail ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->SchEmail) == "") { ?>
		<th data-name="SchEmail" class="<?php echo $view_appointment_scheduler->SchEmail->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_SchEmail" class="view_appointment_scheduler_SchEmail"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->SchEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SchEmail" class="<?php echo $view_appointment_scheduler->SchEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->SchEmail) ?>',1);"><div id="elh_view_appointment_scheduler_SchEmail" class="view_appointment_scheduler_SchEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->SchEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->SchEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->SchEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->appointment_type->Visible) { // appointment_type ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->appointment_type) == "") { ?>
		<th data-name="appointment_type" class="<?php echo $view_appointment_scheduler->appointment_type->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_appointment_type" class="view_appointment_scheduler_appointment_type"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->appointment_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="appointment_type" class="<?php echo $view_appointment_scheduler->appointment_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->appointment_type) ?>',1);"><div id="elh_view_appointment_scheduler_appointment_type" class="view_appointment_scheduler_appointment_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->appointment_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->appointment_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->appointment_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->Notified->Visible) { // Notified ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->Notified) == "") { ?>
		<th data-name="Notified" class="<?php echo $view_appointment_scheduler->Notified->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_Notified" class="view_appointment_scheduler_Notified"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->Notified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Notified" class="<?php echo $view_appointment_scheduler->Notified->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->Notified) ?>',1);"><div id="elh_view_appointment_scheduler_Notified" class="view_appointment_scheduler_Notified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->Notified->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->Notified->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->Notified->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->Notes->Visible) { // Notes ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->Notes) == "") { ?>
		<th data-name="Notes" class="<?php echo $view_appointment_scheduler->Notes->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_Notes" class="view_appointment_scheduler_Notes"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->Notes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Notes" class="<?php echo $view_appointment_scheduler->Notes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->Notes) ?>',1);"><div id="elh_view_appointment_scheduler_Notes" class="view_appointment_scheduler_Notes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->Notes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->Notes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->Notes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->paymentType->Visible) { // paymentType ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->paymentType) == "") { ?>
		<th data-name="paymentType" class="<?php echo $view_appointment_scheduler->paymentType->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_paymentType" class="view_appointment_scheduler_paymentType"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->paymentType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="paymentType" class="<?php echo $view_appointment_scheduler->paymentType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->paymentType) ?>',1);"><div id="elh_view_appointment_scheduler_paymentType" class="view_appointment_scheduler_paymentType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->paymentType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->paymentType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->paymentType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->WhereDidYouHear) == "") { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $view_appointment_scheduler->WhereDidYouHear->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_WhereDidYouHear" class="view_appointment_scheduler_WhereDidYouHear"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->WhereDidYouHear->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $view_appointment_scheduler->WhereDidYouHear->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->WhereDidYouHear) ?>',1);"><div id="elh_view_appointment_scheduler_WhereDidYouHear" class="view_appointment_scheduler_WhereDidYouHear">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->WhereDidYouHear->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->WhereDidYouHear->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->WhereDidYouHear->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->createdBy->Visible) { // createdBy ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->createdBy) == "") { ?>
		<th data-name="createdBy" class="<?php echo $view_appointment_scheduler->createdBy->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_createdBy" class="view_appointment_scheduler_createdBy"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->createdBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdBy" class="<?php echo $view_appointment_scheduler->createdBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->createdBy) ?>',1);"><div id="elh_view_appointment_scheduler_createdBy" class="view_appointment_scheduler_createdBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->createdBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->createdBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->createdBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->createdDateTime->Visible) { // createdDateTime ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->createdDateTime) == "") { ?>
		<th data-name="createdDateTime" class="<?php echo $view_appointment_scheduler->createdDateTime->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_createdDateTime" class="view_appointment_scheduler_createdDateTime"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->createdDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDateTime" class="<?php echo $view_appointment_scheduler->createdDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->createdDateTime) ?>',1);"><div id="elh_view_appointment_scheduler_createdDateTime" class="view_appointment_scheduler_createdDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->createdDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->createdDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->createdDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler->PatientTypee->Visible) { // PatientTypee ?>
	<?php if ($view_appointment_scheduler->sortUrl($view_appointment_scheduler->PatientTypee) == "") { ?>
		<th data-name="PatientTypee" class="<?php echo $view_appointment_scheduler->PatientTypee->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_PatientTypee" class="view_appointment_scheduler_PatientTypee"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler->PatientTypee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientTypee" class="<?php echo $view_appointment_scheduler->PatientTypee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler->SortUrl($view_appointment_scheduler->PatientTypee) ?>',1);"><div id="elh_view_appointment_scheduler_PatientTypee" class="view_appointment_scheduler_PatientTypee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler->PatientTypee->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler->PatientTypee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler->PatientTypee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_appointment_scheduler_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($view_appointment_scheduler->isAdd() || $view_appointment_scheduler->isCopy()) {
		$view_appointment_scheduler_list->RowIndex = 0;
		$view_appointment_scheduler_list->KeyCount = $view_appointment_scheduler_list->RowIndex;
		if ($view_appointment_scheduler->isCopy() && !$view_appointment_scheduler_list->loadRow())
			$view_appointment_scheduler->CurrentAction = "add";
		if ($view_appointment_scheduler->isAdd())
			$view_appointment_scheduler_list->loadRowValues();
		if ($view_appointment_scheduler->EventCancelled) // Insert failed
			$view_appointment_scheduler_list->restoreFormValues(); // Restore form values

		// Set row properties
		$view_appointment_scheduler->resetAttributes();
		$view_appointment_scheduler->RowAttrs = array_merge($view_appointment_scheduler->RowAttrs, array('data-rowindex'=>0, 'id'=>'r0_view_appointment_scheduler', 'data-rowtype'=>ROWTYPE_ADD));
		$view_appointment_scheduler->RowType = ROWTYPE_ADD;

		// Render row
		$view_appointment_scheduler_list->renderRow();

		// Render list options
		$view_appointment_scheduler_list->renderListOptions();
		$view_appointment_scheduler_list->StartRowCnt = 0;
?>
	<tr<?php echo $view_appointment_scheduler->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_appointment_scheduler_list->ListOptions->render("body", "left", $view_appointment_scheduler_list->RowCnt);
?>
	<?php if ($view_appointment_scheduler->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_id" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_id" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_appointment_scheduler->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->patientID->Visible) { // patientID ?>
		<td data-name="patientID">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_patientID" class="form-group view_appointment_scheduler_patientID">
<?php $view_appointment_scheduler->patientID->EditAttrs["onchange"] = "ew.autoFill(this);" . @$view_appointment_scheduler->patientID->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_appointment_scheduler_list->RowIndex ?>_patientID"><?php echo strval($view_appointment_scheduler->patientID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_appointment_scheduler->patientID->ViewValue) : $view_appointment_scheduler->patientID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_appointment_scheduler->patientID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_appointment_scheduler->patientID->ReadOnly || $view_appointment_scheduler->patientID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_appointment_scheduler_list->RowIndex ?>_patientID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_appointment_scheduler->patientID->Lookup->getParamTag("p_x" . $view_appointment_scheduler_list->RowIndex . "_patientID") ?>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_patientID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_appointment_scheduler->patientID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_patientID" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_patientID" value="<?php echo $view_appointment_scheduler->patientID->CurrentValue ?>"<?php echo $view_appointment_scheduler->patientID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_patientID" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_patientID" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_patientID" value="<?php echo HtmlEncode($view_appointment_scheduler->patientID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->patientName->Visible) { // patientName ?>
		<td data-name="patientName">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_patientName" class="form-group view_appointment_scheduler_patientName">
<input type="text" data-table="view_appointment_scheduler" data-field="x_patientName" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_patientName" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->patientName->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->patientName->EditValue ?>"<?php echo $view_appointment_scheduler->patientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_patientName" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_patientName" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_patientName" value="<?php echo HtmlEncode($view_appointment_scheduler->patientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_MobileNumber" class="form-group view_appointment_scheduler_MobileNumber">
<input type="text" data-table="view_appointment_scheduler" data-field="x_MobileNumber" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_MobileNumber" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->MobileNumber->EditValue ?>"<?php echo $view_appointment_scheduler->MobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_MobileNumber" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_MobileNumber" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($view_appointment_scheduler->MobileNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->Purpose->Visible) { // Purpose ?>
		<td data-name="Purpose">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_Purpose" class="form-group view_appointment_scheduler_Purpose">
<input type="text" data-table="view_appointment_scheduler" data-field="x_Purpose" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_Purpose" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->Purpose->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->Purpose->EditValue ?>"<?php echo $view_appointment_scheduler->Purpose->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_Purpose" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_Purpose" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_Purpose" value="<?php echo HtmlEncode($view_appointment_scheduler->Purpose->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->PatientType->Visible) { // PatientType ?>
		<td data-name="PatientType">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_PatientType" class="form-group view_appointment_scheduler_PatientType">
<?php $view_appointment_scheduler->PatientType->EditAttrs["onclick"] = "ew.updateOptions.call(this); " . @$view_appointment_scheduler->PatientType->EditAttrs["onclick"]; ?>
<div id="tp_x<?php echo $view_appointment_scheduler_list->RowIndex ?>_PatientType" class="ew-template"><input type="radio" class="form-check-input" data-table="view_appointment_scheduler" data-field="x_PatientType" data-value-separator="<?php echo $view_appointment_scheduler->PatientType->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_PatientType" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_PatientType" value="{value}"<?php echo $view_appointment_scheduler->PatientType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_appointment_scheduler_list->RowIndex ?>_PatientType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler->PatientType->radioButtonListHtml(FALSE, "x{$view_appointment_scheduler_list->RowIndex}_PatientType") ?>
</div></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_PatientType" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_PatientType" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_PatientType" value="<?php echo HtmlEncode($view_appointment_scheduler->PatientType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->Referal->Visible) { // Referal ?>
		<td data-name="Referal">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_Referal" class="form-group view_appointment_scheduler_Referal">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_appointment_scheduler_list->RowIndex ?>_Referal"><?php echo strval($view_appointment_scheduler->Referal->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_appointment_scheduler->Referal->ViewValue) : $view_appointment_scheduler->Referal->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_appointment_scheduler->Referal->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_appointment_scheduler->Referal->ReadOnly || $view_appointment_scheduler->Referal->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_appointment_scheduler_list->RowIndex ?>_Referal',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$view_appointment_scheduler->Referal->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_appointment_scheduler_list->RowIndex ?>_Referal" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_appointment_scheduler->Referal->caption() ?>" data-title="<?php echo $view_appointment_scheduler->Referal->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_appointment_scheduler_list->RowIndex ?>_Referal',url:'mas_reference_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $view_appointment_scheduler->Referal->Lookup->getParamTag("p_x" . $view_appointment_scheduler_list->RowIndex . "_Referal") ?>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_Referal" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_appointment_scheduler->Referal->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_Referal" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_Referal" value="<?php echo $view_appointment_scheduler->Referal->CurrentValue ?>"<?php echo $view_appointment_scheduler->Referal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_Referal" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_Referal" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_Referal" value="<?php echo HtmlEncode($view_appointment_scheduler->Referal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->start_date->Visible) { // start_date ?>
		<td data-name="start_date">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_start_date" class="form-group view_appointment_scheduler_start_date">
<input type="text" data-table="view_appointment_scheduler" data-field="x_start_date" data-format="11" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_start_date" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->start_date->EditValue ?>"<?php echo $view_appointment_scheduler->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler->start_date->ReadOnly && !$view_appointment_scheduler->start_date->Disabled && !isset($view_appointment_scheduler->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_appointment_schedulerlist", "x<?php echo $view_appointment_scheduler_list->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_start_date" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_start_date" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_start_date" value="<?php echo HtmlEncode($view_appointment_scheduler->start_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
		<td data-name="DoctorName">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_DoctorName" class="form-group view_appointment_scheduler_DoctorName">
<?php $view_appointment_scheduler->DoctorName->EditAttrs["onchange"] = "ew.autoFill(this);" . @$view_appointment_scheduler->DoctorName->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_appointment_scheduler_list->RowIndex ?>_DoctorName"><?php echo strval($view_appointment_scheduler->DoctorName->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_appointment_scheduler->DoctorName->ViewValue) : $view_appointment_scheduler->DoctorName->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_appointment_scheduler->DoctorName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_appointment_scheduler->DoctorName->ReadOnly || $view_appointment_scheduler->DoctorName->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_appointment_scheduler_list->RowIndex ?>_DoctorName',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_appointment_scheduler->DoctorName->Lookup->getParamTag("p_x" . $view_appointment_scheduler_list->RowIndex . "_DoctorName") ?>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_DoctorName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_appointment_scheduler->DoctorName->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_DoctorName" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_DoctorName" value="<?php echo $view_appointment_scheduler->DoctorName->CurrentValue ?>"<?php echo $view_appointment_scheduler->DoctorName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_DoctorName" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_DoctorName" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_DoctorName" value="<?php echo HtmlEncode($view_appointment_scheduler->DoctorName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_HospID" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_HospID" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_appointment_scheduler->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->end_date->Visible) { // end_date ?>
		<td data-name="end_date">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_end_date" class="form-group view_appointment_scheduler_end_date">
<input type="text" data-table="view_appointment_scheduler" data-field="x_end_date" data-format="11" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_end_date" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->end_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->end_date->EditValue ?>"<?php echo $view_appointment_scheduler->end_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler->end_date->ReadOnly && !$view_appointment_scheduler->end_date->Disabled && !isset($view_appointment_scheduler->end_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler->end_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_appointment_schedulerlist", "x<?php echo $view_appointment_scheduler_list->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_end_date" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_end_date" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_end_date" value="<?php echo HtmlEncode($view_appointment_scheduler->end_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->DoctorID->Visible) { // DoctorID ?>
		<td data-name="DoctorID">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_DoctorID" class="form-group view_appointment_scheduler_DoctorID">
<input type="text" data-table="view_appointment_scheduler" data-field="x_DoctorID" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_DoctorID" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_DoctorID" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->DoctorID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->DoctorID->EditValue ?>"<?php echo $view_appointment_scheduler->DoctorID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_DoctorID" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_DoctorID" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($view_appointment_scheduler->DoctorID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->DoctorCode->Visible) { // DoctorCode ?>
		<td data-name="DoctorCode">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_DoctorCode" class="form-group view_appointment_scheduler_DoctorCode">
<input type="text" data-table="view_appointment_scheduler" data-field="x_DoctorCode" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_DoctorCode" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_DoctorCode" size="5" maxlength="7" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->DoctorCode->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->DoctorCode->EditValue ?>"<?php echo $view_appointment_scheduler->DoctorCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_DoctorCode" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_DoctorCode" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_DoctorCode" value="<?php echo HtmlEncode($view_appointment_scheduler->DoctorCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->Department->Visible) { // Department ?>
		<td data-name="Department">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_Department" class="form-group view_appointment_scheduler_Department">
<input type="text" data-table="view_appointment_scheduler" data-field="x_Department" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_Department" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_Department" size="8" maxlength="15" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->Department->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->Department->EditValue ?>"<?php echo $view_appointment_scheduler->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_Department" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_Department" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_appointment_scheduler->Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->AppointmentStatus->Visible) { // AppointmentStatus ?>
		<td data-name="AppointmentStatus">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_AppointmentStatus" class="form-group view_appointment_scheduler_AppointmentStatus">
<input type="text" data-table="view_appointment_scheduler" data-field="x_AppointmentStatus" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_AppointmentStatus" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_AppointmentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->AppointmentStatus->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->AppointmentStatus->EditValue ?>"<?php echo $view_appointment_scheduler->AppointmentStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_AppointmentStatus" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_AppointmentStatus" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_AppointmentStatus" value="<?php echo HtmlEncode($view_appointment_scheduler->AppointmentStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->status->Visible) { // status ?>
		<td data-name="status">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_status" class="form-group view_appointment_scheduler_status">
<div id="tp_x<?php echo $view_appointment_scheduler_list->RowIndex ?>_status" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_appointment_scheduler" data-field="x_status" data-value-separator="<?php echo $view_appointment_scheduler->status->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_status[]" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_status[]" value="{value}"<?php echo $view_appointment_scheduler->status->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_appointment_scheduler_list->RowIndex ?>_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler->status->checkBoxListHtml(FALSE, "x{$view_appointment_scheduler_list->RowIndex}_status[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_status" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_status[]" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_status[]" value="<?php echo HtmlEncode($view_appointment_scheduler->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->scheduler_id->Visible) { // scheduler_id ?>
		<td data-name="scheduler_id">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_scheduler_id" class="form-group view_appointment_scheduler_scheduler_id">
<input type="text" data-table="view_appointment_scheduler" data-field="x_scheduler_id" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_scheduler_id" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_scheduler_id" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->scheduler_id->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->scheduler_id->EditValue ?>"<?php echo $view_appointment_scheduler->scheduler_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_scheduler_id" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_scheduler_id" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_scheduler_id" value="<?php echo HtmlEncode($view_appointment_scheduler->scheduler_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->text->Visible) { // text ?>
		<td data-name="text">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_text" class="form-group view_appointment_scheduler_text">
<input type="text" data-table="view_appointment_scheduler" data-field="x_text" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_text" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_text" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->text->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->text->EditValue ?>"<?php echo $view_appointment_scheduler->text->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_text" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_text" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_text" value="<?php echo HtmlEncode($view_appointment_scheduler->text->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->appointment_status->Visible) { // appointment_status ?>
		<td data-name="appointment_status">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_appointment_status" class="form-group view_appointment_scheduler_appointment_status">
<input type="text" data-table="view_appointment_scheduler" data-field="x_appointment_status" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_appointment_status" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_appointment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->appointment_status->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->appointment_status->EditValue ?>"<?php echo $view_appointment_scheduler->appointment_status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_appointment_status" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_appointment_status" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_appointment_status" value="<?php echo HtmlEncode($view_appointment_scheduler->appointment_status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->PId->Visible) { // PId ?>
		<td data-name="PId">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_PId" class="form-group view_appointment_scheduler_PId">
<input type="text" data-table="view_appointment_scheduler" data-field="x_PId" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_PId" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_PId" size="30" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->PId->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->PId->EditValue ?>"<?php echo $view_appointment_scheduler->PId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_PId" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_PId" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_PId" value="<?php echo HtmlEncode($view_appointment_scheduler->PId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->SchEmail->Visible) { // SchEmail ?>
		<td data-name="SchEmail">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_SchEmail" class="form-group view_appointment_scheduler_SchEmail">
<input type="text" data-table="view_appointment_scheduler" data-field="x_SchEmail" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_SchEmail" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_SchEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->SchEmail->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->SchEmail->EditValue ?>"<?php echo $view_appointment_scheduler->SchEmail->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_SchEmail" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_SchEmail" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_SchEmail" value="<?php echo HtmlEncode($view_appointment_scheduler->SchEmail->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->appointment_type->Visible) { // appointment_type ?>
		<td data-name="appointment_type">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_appointment_type" class="form-group view_appointment_scheduler_appointment_type">
<div id="tp_x<?php echo $view_appointment_scheduler_list->RowIndex ?>_appointment_type" class="ew-template"><input type="radio" class="form-check-input" data-table="view_appointment_scheduler" data-field="x_appointment_type" data-value-separator="<?php echo $view_appointment_scheduler->appointment_type->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_appointment_type" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_appointment_type" value="{value}"<?php echo $view_appointment_scheduler->appointment_type->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_appointment_scheduler_list->RowIndex ?>_appointment_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler->appointment_type->radioButtonListHtml(FALSE, "x{$view_appointment_scheduler_list->RowIndex}_appointment_type") ?>
</div></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_appointment_type" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_appointment_type" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_appointment_type" value="<?php echo HtmlEncode($view_appointment_scheduler->appointment_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->Notified->Visible) { // Notified ?>
		<td data-name="Notified">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_Notified" class="form-group view_appointment_scheduler_Notified">
<div id="tp_x<?php echo $view_appointment_scheduler_list->RowIndex ?>_Notified" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_appointment_scheduler" data-field="x_Notified" data-value-separator="<?php echo $view_appointment_scheduler->Notified->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_Notified[]" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_Notified[]" value="{value}"<?php echo $view_appointment_scheduler->Notified->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_appointment_scheduler_list->RowIndex ?>_Notified" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler->Notified->checkBoxListHtml(FALSE, "x{$view_appointment_scheduler_list->RowIndex}_Notified[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_Notified" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_Notified[]" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_Notified[]" value="<?php echo HtmlEncode($view_appointment_scheduler->Notified->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->Notes->Visible) { // Notes ?>
		<td data-name="Notes">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_Notes" class="form-group view_appointment_scheduler_Notes">
<input type="text" data-table="view_appointment_scheduler" data-field="x_Notes" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_Notes" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->Notes->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->Notes->EditValue ?>"<?php echo $view_appointment_scheduler->Notes->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_Notes" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_Notes" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_Notes" value="<?php echo HtmlEncode($view_appointment_scheduler->Notes->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->paymentType->Visible) { // paymentType ?>
		<td data-name="paymentType">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_paymentType" class="form-group view_appointment_scheduler_paymentType">
<input type="text" data-table="view_appointment_scheduler" data-field="x_paymentType" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_paymentType" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_paymentType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->paymentType->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->paymentType->EditValue ?>"<?php echo $view_appointment_scheduler->paymentType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_paymentType" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_paymentType" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_paymentType" value="<?php echo HtmlEncode($view_appointment_scheduler->paymentType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_WhereDidYouHear" class="form-group view_appointment_scheduler_WhereDidYouHear">
<div id="tp_x<?php echo $view_appointment_scheduler_list->RowIndex ?>_WhereDidYouHear" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_appointment_scheduler" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $view_appointment_scheduler->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_WhereDidYouHear[]" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_WhereDidYouHear[]" value="{value}"<?php echo $view_appointment_scheduler->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_appointment_scheduler_list->RowIndex ?>_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler->WhereDidYouHear->checkBoxListHtml(FALSE, "x{$view_appointment_scheduler_list->RowIndex}_WhereDidYouHear[]") ?>
</div></div>
<?php echo $view_appointment_scheduler->WhereDidYouHear->Lookup->getParamTag("p_x" . $view_appointment_scheduler_list->RowIndex . "_WhereDidYouHear") ?>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_WhereDidYouHear" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_WhereDidYouHear[]" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_WhereDidYouHear[]" value="<?php echo HtmlEncode($view_appointment_scheduler->WhereDidYouHear->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->createdBy->Visible) { // createdBy ?>
		<td data-name="createdBy">
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_createdBy" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_createdBy" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_createdBy" value="<?php echo HtmlEncode($view_appointment_scheduler->createdBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->createdDateTime->Visible) { // createdDateTime ?>
		<td data-name="createdDateTime">
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_createdDateTime" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_createdDateTime" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_createdDateTime" value="<?php echo HtmlEncode($view_appointment_scheduler->createdDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->PatientTypee->Visible) { // PatientTypee ?>
		<td data-name="PatientTypee">
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_PatientTypee" class="form-group view_appointment_scheduler_PatientTypee">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_appointment_scheduler" data-field="x_PatientTypee" data-value-separator="<?php echo $view_appointment_scheduler->PatientTypee->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_PatientTypee" name="x<?php echo $view_appointment_scheduler_list->RowIndex ?>_PatientTypee"<?php echo $view_appointment_scheduler->PatientTypee->editAttributes() ?>>
		<?php echo $view_appointment_scheduler->PatientTypee->selectOptionListHtml("x<?php echo $view_appointment_scheduler_list->RowIndex ?>_PatientTypee") ?>
	</select>
</div>
<?php echo $view_appointment_scheduler->PatientTypee->Lookup->getParamTag("p_x" . $view_appointment_scheduler_list->RowIndex . "_PatientTypee") ?>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_PatientTypee" name="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_PatientTypee" id="o<?php echo $view_appointment_scheduler_list->RowIndex ?>_PatientTypee" value="<?php echo HtmlEncode($view_appointment_scheduler->PatientTypee->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_appointment_scheduler_list->ListOptions->render("body", "right", $view_appointment_scheduler_list->RowCnt);
?>
<script>
fview_appointment_schedulerlist.updateLists(<?php echo $view_appointment_scheduler_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
<?php
if ($view_appointment_scheduler->ExportAll && $view_appointment_scheduler->isExport()) {
	$view_appointment_scheduler_list->StopRec = $view_appointment_scheduler_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_appointment_scheduler_list->TotalRecs > $view_appointment_scheduler_list->StartRec + $view_appointment_scheduler_list->DisplayRecs - 1)
		$view_appointment_scheduler_list->StopRec = $view_appointment_scheduler_list->StartRec + $view_appointment_scheduler_list->DisplayRecs - 1;
	else
		$view_appointment_scheduler_list->StopRec = $view_appointment_scheduler_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $view_appointment_scheduler_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_appointment_scheduler_list->FormKeyCountName) && ($view_appointment_scheduler->isGridAdd() || $view_appointment_scheduler->isGridEdit() || $view_appointment_scheduler->isConfirm())) {
		$view_appointment_scheduler_list->KeyCount = $CurrentForm->getValue($view_appointment_scheduler_list->FormKeyCountName);
		$view_appointment_scheduler_list->StopRec = $view_appointment_scheduler_list->StartRec + $view_appointment_scheduler_list->KeyCount - 1;
	}
}
$view_appointment_scheduler_list->RecCnt = $view_appointment_scheduler_list->StartRec - 1;
if ($view_appointment_scheduler_list->Recordset && !$view_appointment_scheduler_list->Recordset->EOF) {
	$view_appointment_scheduler_list->Recordset->moveFirst();
	$selectLimit = $view_appointment_scheduler_list->UseSelectLimit;
	if (!$selectLimit && $view_appointment_scheduler_list->StartRec > 1)
		$view_appointment_scheduler_list->Recordset->move($view_appointment_scheduler_list->StartRec - 1);
} elseif (!$view_appointment_scheduler->AllowAddDeleteRow && $view_appointment_scheduler_list->StopRec == 0) {
	$view_appointment_scheduler_list->StopRec = $view_appointment_scheduler->GridAddRowCount;
}

// Initialize aggregate
$view_appointment_scheduler->RowType = ROWTYPE_AGGREGATEINIT;
$view_appointment_scheduler->resetAttributes();
$view_appointment_scheduler_list->renderRow();
while ($view_appointment_scheduler_list->RecCnt < $view_appointment_scheduler_list->StopRec) {
	$view_appointment_scheduler_list->RecCnt++;
	if ($view_appointment_scheduler_list->RecCnt >= $view_appointment_scheduler_list->StartRec) {
		$view_appointment_scheduler_list->RowCnt++;

		// Set up key count
		$view_appointment_scheduler_list->KeyCount = $view_appointment_scheduler_list->RowIndex;

		// Init row class and style
		$view_appointment_scheduler->resetAttributes();
		$view_appointment_scheduler->CssClass = "";
		if ($view_appointment_scheduler->isGridAdd()) {
			$view_appointment_scheduler_list->loadRowValues(); // Load default values
		} else {
			$view_appointment_scheduler_list->loadRowValues($view_appointment_scheduler_list->Recordset); // Load row values
		}
		$view_appointment_scheduler->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_appointment_scheduler->RowAttrs = array_merge($view_appointment_scheduler->RowAttrs, array('data-rowindex'=>$view_appointment_scheduler_list->RowCnt, 'id'=>'r' . $view_appointment_scheduler_list->RowCnt . '_view_appointment_scheduler', 'data-rowtype'=>$view_appointment_scheduler->RowType));

		// Render row
		$view_appointment_scheduler_list->renderRow();

		// Render list options
		$view_appointment_scheduler_list->renderListOptions();
?>
	<tr<?php echo $view_appointment_scheduler->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_appointment_scheduler_list->ListOptions->render("body", "left", $view_appointment_scheduler_list->RowCnt);
?>
	<?php if ($view_appointment_scheduler->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_appointment_scheduler->id->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_id" class="view_appointment_scheduler_id">
<span<?php echo $view_appointment_scheduler->id->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->patientID->Visible) { // patientID ?>
		<td data-name="patientID"<?php echo $view_appointment_scheduler->patientID->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_patientID" class="view_appointment_scheduler_patientID">
<span<?php echo $view_appointment_scheduler->patientID->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->patientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->patientName->Visible) { // patientName ?>
		<td data-name="patientName"<?php echo $view_appointment_scheduler->patientName->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_patientName" class="view_appointment_scheduler_patientName">
<span<?php echo $view_appointment_scheduler->patientName->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->patientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber"<?php echo $view_appointment_scheduler->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_MobileNumber" class="view_appointment_scheduler_MobileNumber">
<span<?php echo $view_appointment_scheduler->MobileNumber->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->Purpose->Visible) { // Purpose ?>
		<td data-name="Purpose"<?php echo $view_appointment_scheduler->Purpose->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_Purpose" class="view_appointment_scheduler_Purpose">
<span<?php echo $view_appointment_scheduler->Purpose->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->Purpose->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->PatientType->Visible) { // PatientType ?>
		<td data-name="PatientType"<?php echo $view_appointment_scheduler->PatientType->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_PatientType" class="view_appointment_scheduler_PatientType">
<span<?php echo $view_appointment_scheduler->PatientType->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->PatientType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->Referal->Visible) { // Referal ?>
		<td data-name="Referal"<?php echo $view_appointment_scheduler->Referal->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_Referal" class="view_appointment_scheduler_Referal">
<span<?php echo $view_appointment_scheduler->Referal->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->Referal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->start_date->Visible) { // start_date ?>
		<td data-name="start_date"<?php echo $view_appointment_scheduler->start_date->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_start_date" class="view_appointment_scheduler_start_date">
<span<?php echo $view_appointment_scheduler->start_date->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->start_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
		<td data-name="DoctorName"<?php echo $view_appointment_scheduler->DoctorName->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_DoctorName" class="view_appointment_scheduler_DoctorName">
<span<?php echo $view_appointment_scheduler->DoctorName->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->DoctorName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_appointment_scheduler->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_HospID" class="view_appointment_scheduler_HospID">
<span<?php echo $view_appointment_scheduler->HospID->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->end_date->Visible) { // end_date ?>
		<td data-name="end_date"<?php echo $view_appointment_scheduler->end_date->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_end_date" class="view_appointment_scheduler_end_date">
<span<?php echo $view_appointment_scheduler->end_date->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->end_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->DoctorID->Visible) { // DoctorID ?>
		<td data-name="DoctorID"<?php echo $view_appointment_scheduler->DoctorID->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_DoctorID" class="view_appointment_scheduler_DoctorID">
<span<?php echo $view_appointment_scheduler->DoctorID->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->DoctorID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->DoctorCode->Visible) { // DoctorCode ?>
		<td data-name="DoctorCode"<?php echo $view_appointment_scheduler->DoctorCode->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_DoctorCode" class="view_appointment_scheduler_DoctorCode">
<span<?php echo $view_appointment_scheduler->DoctorCode->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->DoctorCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->Department->Visible) { // Department ?>
		<td data-name="Department"<?php echo $view_appointment_scheduler->Department->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_Department" class="view_appointment_scheduler_Department">
<span<?php echo $view_appointment_scheduler->Department->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->Department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->AppointmentStatus->Visible) { // AppointmentStatus ?>
		<td data-name="AppointmentStatus"<?php echo $view_appointment_scheduler->AppointmentStatus->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_AppointmentStatus" class="view_appointment_scheduler_AppointmentStatus">
<span<?php echo $view_appointment_scheduler->AppointmentStatus->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->AppointmentStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_appointment_scheduler->status->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_status" class="view_appointment_scheduler_status">
<span<?php echo $view_appointment_scheduler->status->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->scheduler_id->Visible) { // scheduler_id ?>
		<td data-name="scheduler_id"<?php echo $view_appointment_scheduler->scheduler_id->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_scheduler_id" class="view_appointment_scheduler_scheduler_id">
<span<?php echo $view_appointment_scheduler->scheduler_id->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->scheduler_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->text->Visible) { // text ?>
		<td data-name="text"<?php echo $view_appointment_scheduler->text->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_text" class="view_appointment_scheduler_text">
<span<?php echo $view_appointment_scheduler->text->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->text->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->appointment_status->Visible) { // appointment_status ?>
		<td data-name="appointment_status"<?php echo $view_appointment_scheduler->appointment_status->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_appointment_status" class="view_appointment_scheduler_appointment_status">
<span<?php echo $view_appointment_scheduler->appointment_status->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->appointment_status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->PId->Visible) { // PId ?>
		<td data-name="PId"<?php echo $view_appointment_scheduler->PId->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_PId" class="view_appointment_scheduler_PId">
<span<?php echo $view_appointment_scheduler->PId->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->PId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->SchEmail->Visible) { // SchEmail ?>
		<td data-name="SchEmail"<?php echo $view_appointment_scheduler->SchEmail->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_SchEmail" class="view_appointment_scheduler_SchEmail">
<span<?php echo $view_appointment_scheduler->SchEmail->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->SchEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->appointment_type->Visible) { // appointment_type ?>
		<td data-name="appointment_type"<?php echo $view_appointment_scheduler->appointment_type->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_appointment_type" class="view_appointment_scheduler_appointment_type">
<span<?php echo $view_appointment_scheduler->appointment_type->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->appointment_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->Notified->Visible) { // Notified ?>
		<td data-name="Notified"<?php echo $view_appointment_scheduler->Notified->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_Notified" class="view_appointment_scheduler_Notified">
<span<?php echo $view_appointment_scheduler->Notified->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->Notified->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->Notes->Visible) { // Notes ?>
		<td data-name="Notes"<?php echo $view_appointment_scheduler->Notes->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_Notes" class="view_appointment_scheduler_Notes">
<span<?php echo $view_appointment_scheduler->Notes->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->Notes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->paymentType->Visible) { // paymentType ?>
		<td data-name="paymentType"<?php echo $view_appointment_scheduler->paymentType->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_paymentType" class="view_appointment_scheduler_paymentType">
<span<?php echo $view_appointment_scheduler->paymentType->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->paymentType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear"<?php echo $view_appointment_scheduler->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_WhereDidYouHear" class="view_appointment_scheduler_WhereDidYouHear">
<span<?php echo $view_appointment_scheduler->WhereDidYouHear->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->createdBy->Visible) { // createdBy ?>
		<td data-name="createdBy"<?php echo $view_appointment_scheduler->createdBy->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_createdBy" class="view_appointment_scheduler_createdBy">
<span<?php echo $view_appointment_scheduler->createdBy->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->createdBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->createdDateTime->Visible) { // createdDateTime ?>
		<td data-name="createdDateTime"<?php echo $view_appointment_scheduler->createdDateTime->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_createdDateTime" class="view_appointment_scheduler_createdDateTime">
<span<?php echo $view_appointment_scheduler->createdDateTime->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->createdDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler->PatientTypee->Visible) { // PatientTypee ?>
		<td data-name="PatientTypee"<?php echo $view_appointment_scheduler->PatientTypee->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_list->RowCnt ?>_view_appointment_scheduler_PatientTypee" class="view_appointment_scheduler_PatientTypee">
<span<?php echo $view_appointment_scheduler->PatientTypee->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->PatientTypee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_appointment_scheduler_list->ListOptions->render("body", "right", $view_appointment_scheduler_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_appointment_scheduler->isGridAdd())
		$view_appointment_scheduler_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($view_appointment_scheduler->isAdd() || $view_appointment_scheduler->isCopy()) { ?>
<input type="hidden" name="<?php echo $view_appointment_scheduler_list->FormKeyCountName ?>" id="<?php echo $view_appointment_scheduler_list->FormKeyCountName ?>" value="<?php echo $view_appointment_scheduler_list->KeyCount ?>">
<?php } ?>
<?php if (!$view_appointment_scheduler->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_appointment_scheduler_list->Recordset)
	$view_appointment_scheduler_list->Recordset->Close();
?>
<?php if (!$view_appointment_scheduler->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_appointment_scheduler->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_appointment_scheduler_list->Pager)) $view_appointment_scheduler_list->Pager = new NumericPager($view_appointment_scheduler_list->StartRec, $view_appointment_scheduler_list->DisplayRecs, $view_appointment_scheduler_list->TotalRecs, $view_appointment_scheduler_list->RecRange, $view_appointment_scheduler_list->AutoHidePager) ?>
<?php if ($view_appointment_scheduler_list->Pager->RecordCount > 0 && $view_appointment_scheduler_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_appointment_scheduler_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_scheduler_list->pageUrl() ?>start=<?php echo $view_appointment_scheduler_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_appointment_scheduler_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_scheduler_list->pageUrl() ?>start=<?php echo $view_appointment_scheduler_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_appointment_scheduler_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_appointment_scheduler_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_appointment_scheduler_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_scheduler_list->pageUrl() ?>start=<?php echo $view_appointment_scheduler_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_appointment_scheduler_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_scheduler_list->pageUrl() ?>start=<?php echo $view_appointment_scheduler_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_appointment_scheduler_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_appointment_scheduler_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_appointment_scheduler_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_appointment_scheduler_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_appointment_scheduler_list->TotalRecs > 0 && (!$view_appointment_scheduler_list->AutoHidePageSizeSelector || $view_appointment_scheduler_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_appointment_scheduler">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_appointment_scheduler_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_appointment_scheduler_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_appointment_scheduler_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_appointment_scheduler_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_appointment_scheduler_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_appointment_scheduler_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_appointment_scheduler->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_appointment_scheduler_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_appointment_scheduler_list->TotalRecs == 0 && !$view_appointment_scheduler->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_appointment_scheduler_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_appointment_scheduler_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_appointment_scheduler->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_appointment_scheduler->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_appointment_scheduler", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_appointment_scheduler_list->terminate();
?>