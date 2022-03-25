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
$hr_leavetypes_list = new hr_leavetypes_list();

// Run the page
$hr_leavetypes_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_leavetypes_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_leavetypes->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhr_leavetypeslist = currentForm = new ew.Form("fhr_leavetypeslist", "list");
fhr_leavetypeslist.formKeyCountName = '<?php echo $hr_leavetypes_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhr_leavetypeslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_leavetypeslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_leavetypeslist.lists["x_supervisor_leave_assign"] = <?php echo $hr_leavetypes_list->supervisor_leave_assign->Lookup->toClientList() ?>;
fhr_leavetypeslist.lists["x_supervisor_leave_assign"].options = <?php echo JsonEncode($hr_leavetypes_list->supervisor_leave_assign->options(FALSE, TRUE)) ?>;
fhr_leavetypeslist.lists["x_employee_can_apply"] = <?php echo $hr_leavetypes_list->employee_can_apply->Lookup->toClientList() ?>;
fhr_leavetypeslist.lists["x_employee_can_apply"].options = <?php echo JsonEncode($hr_leavetypes_list->employee_can_apply->options(FALSE, TRUE)) ?>;
fhr_leavetypeslist.lists["x_apply_beyond_current"] = <?php echo $hr_leavetypes_list->apply_beyond_current->Lookup->toClientList() ?>;
fhr_leavetypeslist.lists["x_apply_beyond_current"].options = <?php echo JsonEncode($hr_leavetypes_list->apply_beyond_current->options(FALSE, TRUE)) ?>;
fhr_leavetypeslist.lists["x_leave_accrue"] = <?php echo $hr_leavetypes_list->leave_accrue->Lookup->toClientList() ?>;
fhr_leavetypeslist.lists["x_leave_accrue"].options = <?php echo JsonEncode($hr_leavetypes_list->leave_accrue->options(FALSE, TRUE)) ?>;
fhr_leavetypeslist.lists["x_carried_forward"] = <?php echo $hr_leavetypes_list->carried_forward->Lookup->toClientList() ?>;
fhr_leavetypeslist.lists["x_carried_forward"].options = <?php echo JsonEncode($hr_leavetypes_list->carried_forward->options(FALSE, TRUE)) ?>;
fhr_leavetypeslist.lists["x_propotionate_on_joined_date"] = <?php echo $hr_leavetypes_list->propotionate_on_joined_date->Lookup->toClientList() ?>;
fhr_leavetypeslist.lists["x_propotionate_on_joined_date"].options = <?php echo JsonEncode($hr_leavetypes_list->propotionate_on_joined_date->options(FALSE, TRUE)) ?>;
fhr_leavetypeslist.lists["x_send_notification_emails"] = <?php echo $hr_leavetypes_list->send_notification_emails->Lookup->toClientList() ?>;
fhr_leavetypeslist.lists["x_send_notification_emails"].options = <?php echo JsonEncode($hr_leavetypes_list->send_notification_emails->options(FALSE, TRUE)) ?>;

// Form object for search
var fhr_leavetypeslistsrch = currentSearchForm = new ew.Form("fhr_leavetypeslistsrch");

// Validate function for search
fhr_leavetypeslistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fhr_leavetypeslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_leavetypeslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_leavetypeslistsrch.lists["x_supervisor_leave_assign"] = <?php echo $hr_leavetypes_list->supervisor_leave_assign->Lookup->toClientList() ?>;
fhr_leavetypeslistsrch.lists["x_supervisor_leave_assign"].options = <?php echo JsonEncode($hr_leavetypes_list->supervisor_leave_assign->options(FALSE, TRUE)) ?>;
fhr_leavetypeslistsrch.lists["x_employee_can_apply"] = <?php echo $hr_leavetypes_list->employee_can_apply->Lookup->toClientList() ?>;
fhr_leavetypeslistsrch.lists["x_employee_can_apply"].options = <?php echo JsonEncode($hr_leavetypes_list->employee_can_apply->options(FALSE, TRUE)) ?>;
fhr_leavetypeslistsrch.lists["x_apply_beyond_current"] = <?php echo $hr_leavetypes_list->apply_beyond_current->Lookup->toClientList() ?>;
fhr_leavetypeslistsrch.lists["x_apply_beyond_current"].options = <?php echo JsonEncode($hr_leavetypes_list->apply_beyond_current->options(FALSE, TRUE)) ?>;
fhr_leavetypeslistsrch.lists["x_leave_accrue"] = <?php echo $hr_leavetypes_list->leave_accrue->Lookup->toClientList() ?>;
fhr_leavetypeslistsrch.lists["x_leave_accrue"].options = <?php echo JsonEncode($hr_leavetypes_list->leave_accrue->options(FALSE, TRUE)) ?>;
fhr_leavetypeslistsrch.lists["x_carried_forward"] = <?php echo $hr_leavetypes_list->carried_forward->Lookup->toClientList() ?>;
fhr_leavetypeslistsrch.lists["x_carried_forward"].options = <?php echo JsonEncode($hr_leavetypes_list->carried_forward->options(FALSE, TRUE)) ?>;
fhr_leavetypeslistsrch.lists["x_propotionate_on_joined_date"] = <?php echo $hr_leavetypes_list->propotionate_on_joined_date->Lookup->toClientList() ?>;
fhr_leavetypeslistsrch.lists["x_propotionate_on_joined_date"].options = <?php echo JsonEncode($hr_leavetypes_list->propotionate_on_joined_date->options(FALSE, TRUE)) ?>;
fhr_leavetypeslistsrch.lists["x_send_notification_emails"] = <?php echo $hr_leavetypes_list->send_notification_emails->Lookup->toClientList() ?>;
fhr_leavetypeslistsrch.lists["x_send_notification_emails"].options = <?php echo JsonEncode($hr_leavetypes_list->send_notification_emails->options(FALSE, TRUE)) ?>;

// Filters
fhr_leavetypeslistsrch.filterList = <?php echo $hr_leavetypes_list->getFilterList() ?>;
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
<?php if (!$hr_leavetypes->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hr_leavetypes_list->TotalRecs > 0 && $hr_leavetypes_list->ExportOptions->visible()) { ?>
<?php $hr_leavetypes_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_leavetypes_list->ImportOptions->visible()) { ?>
<?php $hr_leavetypes_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_leavetypes_list->SearchOptions->visible()) { ?>
<?php $hr_leavetypes_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hr_leavetypes_list->FilterOptions->visible()) { ?>
<?php $hr_leavetypes_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hr_leavetypes_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hr_leavetypes->isExport() && !$hr_leavetypes->CurrentAction) { ?>
<form name="fhr_leavetypeslistsrch" id="fhr_leavetypeslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($hr_leavetypes_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhr_leavetypeslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hr_leavetypes">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$hr_leavetypes_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$hr_leavetypes->RowType = ROWTYPE_SEARCH;

// Render row
$hr_leavetypes->resetAttributes();
$hr_leavetypes_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($hr_leavetypes->supervisor_leave_assign->Visible) { // supervisor_leave_assign ?>
	<div id="xsc_supervisor_leave_assign" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_leavetypes->supervisor_leave_assign->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_supervisor_leave_assign" id="z_supervisor_leave_assign" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_supervisor_leave_assign" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_leavetypes" data-field="x_supervisor_leave_assign" data-value-separator="<?php echo $hr_leavetypes->supervisor_leave_assign->displayValueSeparatorAttribute() ?>" name="x_supervisor_leave_assign" id="x_supervisor_leave_assign" value="{value}"<?php echo $hr_leavetypes->supervisor_leave_assign->editAttributes() ?>></div>
<div id="dsl_x_supervisor_leave_assign" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_leavetypes->supervisor_leave_assign->radioButtonListHtml(FALSE, "x_supervisor_leave_assign") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($hr_leavetypes->employee_can_apply->Visible) { // employee_can_apply ?>
	<div id="xsc_employee_can_apply" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_leavetypes->employee_can_apply->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_employee_can_apply" id="z_employee_can_apply" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_employee_can_apply" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_leavetypes" data-field="x_employee_can_apply" data-value-separator="<?php echo $hr_leavetypes->employee_can_apply->displayValueSeparatorAttribute() ?>" name="x_employee_can_apply" id="x_employee_can_apply" value="{value}"<?php echo $hr_leavetypes->employee_can_apply->editAttributes() ?>></div>
<div id="dsl_x_employee_can_apply" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_leavetypes->employee_can_apply->radioButtonListHtml(FALSE, "x_employee_can_apply") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($hr_leavetypes->apply_beyond_current->Visible) { // apply_beyond_current ?>
	<div id="xsc_apply_beyond_current" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_leavetypes->apply_beyond_current->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_apply_beyond_current" id="z_apply_beyond_current" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_apply_beyond_current" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_leavetypes" data-field="x_apply_beyond_current" data-value-separator="<?php echo $hr_leavetypes->apply_beyond_current->displayValueSeparatorAttribute() ?>" name="x_apply_beyond_current" id="x_apply_beyond_current" value="{value}"<?php echo $hr_leavetypes->apply_beyond_current->editAttributes() ?>></div>
<div id="dsl_x_apply_beyond_current" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_leavetypes->apply_beyond_current->radioButtonListHtml(FALSE, "x_apply_beyond_current") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
<?php if ($hr_leavetypes->leave_accrue->Visible) { // leave_accrue ?>
	<div id="xsc_leave_accrue" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_leavetypes->leave_accrue->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_leave_accrue" id="z_leave_accrue" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_leave_accrue" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_leavetypes" data-field="x_leave_accrue" data-value-separator="<?php echo $hr_leavetypes->leave_accrue->displayValueSeparatorAttribute() ?>" name="x_leave_accrue" id="x_leave_accrue" value="{value}"<?php echo $hr_leavetypes->leave_accrue->editAttributes() ?>></div>
<div id="dsl_x_leave_accrue" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_leavetypes->leave_accrue->radioButtonListHtml(FALSE, "x_leave_accrue") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_5" class="ew-row d-sm-flex">
<?php if ($hr_leavetypes->carried_forward->Visible) { // carried_forward ?>
	<div id="xsc_carried_forward" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_leavetypes->carried_forward->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_carried_forward" id="z_carried_forward" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_carried_forward" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_leavetypes" data-field="x_carried_forward" data-value-separator="<?php echo $hr_leavetypes->carried_forward->displayValueSeparatorAttribute() ?>" name="x_carried_forward" id="x_carried_forward" value="{value}"<?php echo $hr_leavetypes->carried_forward->editAttributes() ?>></div>
<div id="dsl_x_carried_forward" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_leavetypes->carried_forward->radioButtonListHtml(FALSE, "x_carried_forward") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_6" class="ew-row d-sm-flex">
<?php if ($hr_leavetypes->propotionate_on_joined_date->Visible) { // propotionate_on_joined_date ?>
	<div id="xsc_propotionate_on_joined_date" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_leavetypes->propotionate_on_joined_date->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_propotionate_on_joined_date" id="z_propotionate_on_joined_date" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_propotionate_on_joined_date" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_leavetypes" data-field="x_propotionate_on_joined_date" data-value-separator="<?php echo $hr_leavetypes->propotionate_on_joined_date->displayValueSeparatorAttribute() ?>" name="x_propotionate_on_joined_date" id="x_propotionate_on_joined_date" value="{value}"<?php echo $hr_leavetypes->propotionate_on_joined_date->editAttributes() ?>></div>
<div id="dsl_x_propotionate_on_joined_date" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_leavetypes->propotionate_on_joined_date->radioButtonListHtml(FALSE, "x_propotionate_on_joined_date") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_7" class="ew-row d-sm-flex">
<?php if ($hr_leavetypes->send_notification_emails->Visible) { // send_notification_emails ?>
	<div id="xsc_send_notification_emails" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_leavetypes->send_notification_emails->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_send_notification_emails" id="z_send_notification_emails" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_send_notification_emails" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_leavetypes" data-field="x_send_notification_emails" data-value-separator="<?php echo $hr_leavetypes->send_notification_emails->displayValueSeparatorAttribute() ?>" name="x_send_notification_emails" id="x_send_notification_emails" value="{value}"<?php echo $hr_leavetypes->send_notification_emails->editAttributes() ?>></div>
<div id="dsl_x_send_notification_emails" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_leavetypes->send_notification_emails->radioButtonListHtml(FALSE, "x_send_notification_emails") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_8" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($hr_leavetypes_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($hr_leavetypes_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hr_leavetypes_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hr_leavetypes_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hr_leavetypes_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hr_leavetypes_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hr_leavetypes_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $hr_leavetypes_list->showPageHeader(); ?>
<?php
$hr_leavetypes_list->showMessage();
?>
<?php if ($hr_leavetypes_list->TotalRecs > 0 || $hr_leavetypes->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hr_leavetypes_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hr_leavetypes">
<?php if (!$hr_leavetypes->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hr_leavetypes->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_leavetypes_list->Pager)) $hr_leavetypes_list->Pager = new NumericPager($hr_leavetypes_list->StartRec, $hr_leavetypes_list->DisplayRecs, $hr_leavetypes_list->TotalRecs, $hr_leavetypes_list->RecRange, $hr_leavetypes_list->AutoHidePager) ?>
<?php if ($hr_leavetypes_list->Pager->RecordCount > 0 && $hr_leavetypes_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_leavetypes_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_leavetypes_list->pageUrl() ?>start=<?php echo $hr_leavetypes_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_leavetypes_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_leavetypes_list->pageUrl() ?>start=<?php echo $hr_leavetypes_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_leavetypes_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_leavetypes_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_leavetypes_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_leavetypes_list->pageUrl() ?>start=<?php echo $hr_leavetypes_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_leavetypes_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_leavetypes_list->pageUrl() ?>start=<?php echo $hr_leavetypes_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_leavetypes_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_leavetypes_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_leavetypes_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_leavetypes_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_leavetypes_list->TotalRecs > 0 && (!$hr_leavetypes_list->AutoHidePageSizeSelector || $hr_leavetypes_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_leavetypes">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_leavetypes_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_leavetypes_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_leavetypes_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_leavetypes_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_leavetypes_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_leavetypes_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_leavetypes->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_leavetypes_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhr_leavetypeslist" id="fhr_leavetypeslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_leavetypes_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_leavetypes_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_leavetypes">
<div id="gmp_hr_leavetypes" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($hr_leavetypes_list->TotalRecs > 0 || $hr_leavetypes->isGridEdit()) { ?>
<table id="tbl_hr_leavetypeslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hr_leavetypes_list->RowType = ROWTYPE_HEADER;

// Render list options
$hr_leavetypes_list->renderListOptions();

// Render list options (header, left)
$hr_leavetypes_list->ListOptions->render("header", "left");
?>
<?php if ($hr_leavetypes->id->Visible) { // id ?>
	<?php if ($hr_leavetypes->sortUrl($hr_leavetypes->id) == "") { ?>
		<th data-name="id" class="<?php echo $hr_leavetypes->id->headerCellClass() ?>"><div id="elh_hr_leavetypes_id" class="hr_leavetypes_id"><div class="ew-table-header-caption"><?php echo $hr_leavetypes->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hr_leavetypes->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leavetypes->SortUrl($hr_leavetypes->id) ?>',1);"><div id="elh_hr_leavetypes_id" class="hr_leavetypes_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leavetypes->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leavetypes->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leavetypes->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leavetypes->name->Visible) { // name ?>
	<?php if ($hr_leavetypes->sortUrl($hr_leavetypes->name) == "") { ?>
		<th data-name="name" class="<?php echo $hr_leavetypes->name->headerCellClass() ?>"><div id="elh_hr_leavetypes_name" class="hr_leavetypes_name"><div class="ew-table-header-caption"><?php echo $hr_leavetypes->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $hr_leavetypes->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leavetypes->SortUrl($hr_leavetypes->name) ?>',1);"><div id="elh_hr_leavetypes_name" class="hr_leavetypes_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leavetypes->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_leavetypes->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leavetypes->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leavetypes->supervisor_leave_assign->Visible) { // supervisor_leave_assign ?>
	<?php if ($hr_leavetypes->sortUrl($hr_leavetypes->supervisor_leave_assign) == "") { ?>
		<th data-name="supervisor_leave_assign" class="<?php echo $hr_leavetypes->supervisor_leave_assign->headerCellClass() ?>"><div id="elh_hr_leavetypes_supervisor_leave_assign" class="hr_leavetypes_supervisor_leave_assign"><div class="ew-table-header-caption"><?php echo $hr_leavetypes->supervisor_leave_assign->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="supervisor_leave_assign" class="<?php echo $hr_leavetypes->supervisor_leave_assign->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leavetypes->SortUrl($hr_leavetypes->supervisor_leave_assign) ?>',1);"><div id="elh_hr_leavetypes_supervisor_leave_assign" class="hr_leavetypes_supervisor_leave_assign">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leavetypes->supervisor_leave_assign->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leavetypes->supervisor_leave_assign->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leavetypes->supervisor_leave_assign->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leavetypes->employee_can_apply->Visible) { // employee_can_apply ?>
	<?php if ($hr_leavetypes->sortUrl($hr_leavetypes->employee_can_apply) == "") { ?>
		<th data-name="employee_can_apply" class="<?php echo $hr_leavetypes->employee_can_apply->headerCellClass() ?>"><div id="elh_hr_leavetypes_employee_can_apply" class="hr_leavetypes_employee_can_apply"><div class="ew-table-header-caption"><?php echo $hr_leavetypes->employee_can_apply->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_can_apply" class="<?php echo $hr_leavetypes->employee_can_apply->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leavetypes->SortUrl($hr_leavetypes->employee_can_apply) ?>',1);"><div id="elh_hr_leavetypes_employee_can_apply" class="hr_leavetypes_employee_can_apply">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leavetypes->employee_can_apply->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leavetypes->employee_can_apply->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leavetypes->employee_can_apply->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leavetypes->apply_beyond_current->Visible) { // apply_beyond_current ?>
	<?php if ($hr_leavetypes->sortUrl($hr_leavetypes->apply_beyond_current) == "") { ?>
		<th data-name="apply_beyond_current" class="<?php echo $hr_leavetypes->apply_beyond_current->headerCellClass() ?>"><div id="elh_hr_leavetypes_apply_beyond_current" class="hr_leavetypes_apply_beyond_current"><div class="ew-table-header-caption"><?php echo $hr_leavetypes->apply_beyond_current->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="apply_beyond_current" class="<?php echo $hr_leavetypes->apply_beyond_current->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leavetypes->SortUrl($hr_leavetypes->apply_beyond_current) ?>',1);"><div id="elh_hr_leavetypes_apply_beyond_current" class="hr_leavetypes_apply_beyond_current">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leavetypes->apply_beyond_current->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leavetypes->apply_beyond_current->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leavetypes->apply_beyond_current->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leavetypes->leave_accrue->Visible) { // leave_accrue ?>
	<?php if ($hr_leavetypes->sortUrl($hr_leavetypes->leave_accrue) == "") { ?>
		<th data-name="leave_accrue" class="<?php echo $hr_leavetypes->leave_accrue->headerCellClass() ?>"><div id="elh_hr_leavetypes_leave_accrue" class="hr_leavetypes_leave_accrue"><div class="ew-table-header-caption"><?php echo $hr_leavetypes->leave_accrue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leave_accrue" class="<?php echo $hr_leavetypes->leave_accrue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leavetypes->SortUrl($hr_leavetypes->leave_accrue) ?>',1);"><div id="elh_hr_leavetypes_leave_accrue" class="hr_leavetypes_leave_accrue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leavetypes->leave_accrue->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leavetypes->leave_accrue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leavetypes->leave_accrue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leavetypes->carried_forward->Visible) { // carried_forward ?>
	<?php if ($hr_leavetypes->sortUrl($hr_leavetypes->carried_forward) == "") { ?>
		<th data-name="carried_forward" class="<?php echo $hr_leavetypes->carried_forward->headerCellClass() ?>"><div id="elh_hr_leavetypes_carried_forward" class="hr_leavetypes_carried_forward"><div class="ew-table-header-caption"><?php echo $hr_leavetypes->carried_forward->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="carried_forward" class="<?php echo $hr_leavetypes->carried_forward->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leavetypes->SortUrl($hr_leavetypes->carried_forward) ?>',1);"><div id="elh_hr_leavetypes_carried_forward" class="hr_leavetypes_carried_forward">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leavetypes->carried_forward->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leavetypes->carried_forward->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leavetypes->carried_forward->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leavetypes->default_per_year->Visible) { // default_per_year ?>
	<?php if ($hr_leavetypes->sortUrl($hr_leavetypes->default_per_year) == "") { ?>
		<th data-name="default_per_year" class="<?php echo $hr_leavetypes->default_per_year->headerCellClass() ?>"><div id="elh_hr_leavetypes_default_per_year" class="hr_leavetypes_default_per_year"><div class="ew-table-header-caption"><?php echo $hr_leavetypes->default_per_year->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="default_per_year" class="<?php echo $hr_leavetypes->default_per_year->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leavetypes->SortUrl($hr_leavetypes->default_per_year) ?>',1);"><div id="elh_hr_leavetypes_default_per_year" class="hr_leavetypes_default_per_year">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leavetypes->default_per_year->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leavetypes->default_per_year->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leavetypes->default_per_year->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leavetypes->carried_forward_percentage->Visible) { // carried_forward_percentage ?>
	<?php if ($hr_leavetypes->sortUrl($hr_leavetypes->carried_forward_percentage) == "") { ?>
		<th data-name="carried_forward_percentage" class="<?php echo $hr_leavetypes->carried_forward_percentage->headerCellClass() ?>"><div id="elh_hr_leavetypes_carried_forward_percentage" class="hr_leavetypes_carried_forward_percentage"><div class="ew-table-header-caption"><?php echo $hr_leavetypes->carried_forward_percentage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="carried_forward_percentage" class="<?php echo $hr_leavetypes->carried_forward_percentage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leavetypes->SortUrl($hr_leavetypes->carried_forward_percentage) ?>',1);"><div id="elh_hr_leavetypes_carried_forward_percentage" class="hr_leavetypes_carried_forward_percentage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leavetypes->carried_forward_percentage->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leavetypes->carried_forward_percentage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leavetypes->carried_forward_percentage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leavetypes->carried_forward_leave_availability->Visible) { // carried_forward_leave_availability ?>
	<?php if ($hr_leavetypes->sortUrl($hr_leavetypes->carried_forward_leave_availability) == "") { ?>
		<th data-name="carried_forward_leave_availability" class="<?php echo $hr_leavetypes->carried_forward_leave_availability->headerCellClass() ?>"><div id="elh_hr_leavetypes_carried_forward_leave_availability" class="hr_leavetypes_carried_forward_leave_availability"><div class="ew-table-header-caption"><?php echo $hr_leavetypes->carried_forward_leave_availability->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="carried_forward_leave_availability" class="<?php echo $hr_leavetypes->carried_forward_leave_availability->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leavetypes->SortUrl($hr_leavetypes->carried_forward_leave_availability) ?>',1);"><div id="elh_hr_leavetypes_carried_forward_leave_availability" class="hr_leavetypes_carried_forward_leave_availability">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leavetypes->carried_forward_leave_availability->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leavetypes->carried_forward_leave_availability->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leavetypes->carried_forward_leave_availability->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leavetypes->propotionate_on_joined_date->Visible) { // propotionate_on_joined_date ?>
	<?php if ($hr_leavetypes->sortUrl($hr_leavetypes->propotionate_on_joined_date) == "") { ?>
		<th data-name="propotionate_on_joined_date" class="<?php echo $hr_leavetypes->propotionate_on_joined_date->headerCellClass() ?>"><div id="elh_hr_leavetypes_propotionate_on_joined_date" class="hr_leavetypes_propotionate_on_joined_date"><div class="ew-table-header-caption"><?php echo $hr_leavetypes->propotionate_on_joined_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="propotionate_on_joined_date" class="<?php echo $hr_leavetypes->propotionate_on_joined_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leavetypes->SortUrl($hr_leavetypes->propotionate_on_joined_date) ?>',1);"><div id="elh_hr_leavetypes_propotionate_on_joined_date" class="hr_leavetypes_propotionate_on_joined_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leavetypes->propotionate_on_joined_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leavetypes->propotionate_on_joined_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leavetypes->propotionate_on_joined_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leavetypes->send_notification_emails->Visible) { // send_notification_emails ?>
	<?php if ($hr_leavetypes->sortUrl($hr_leavetypes->send_notification_emails) == "") { ?>
		<th data-name="send_notification_emails" class="<?php echo $hr_leavetypes->send_notification_emails->headerCellClass() ?>"><div id="elh_hr_leavetypes_send_notification_emails" class="hr_leavetypes_send_notification_emails"><div class="ew-table-header-caption"><?php echo $hr_leavetypes->send_notification_emails->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="send_notification_emails" class="<?php echo $hr_leavetypes->send_notification_emails->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leavetypes->SortUrl($hr_leavetypes->send_notification_emails) ?>',1);"><div id="elh_hr_leavetypes_send_notification_emails" class="hr_leavetypes_send_notification_emails">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leavetypes->send_notification_emails->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leavetypes->send_notification_emails->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leavetypes->send_notification_emails->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leavetypes->leave_group->Visible) { // leave_group ?>
	<?php if ($hr_leavetypes->sortUrl($hr_leavetypes->leave_group) == "") { ?>
		<th data-name="leave_group" class="<?php echo $hr_leavetypes->leave_group->headerCellClass() ?>"><div id="elh_hr_leavetypes_leave_group" class="hr_leavetypes_leave_group"><div class="ew-table-header-caption"><?php echo $hr_leavetypes->leave_group->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leave_group" class="<?php echo $hr_leavetypes->leave_group->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leavetypes->SortUrl($hr_leavetypes->leave_group) ?>',1);"><div id="elh_hr_leavetypes_leave_group" class="hr_leavetypes_leave_group">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leavetypes->leave_group->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leavetypes->leave_group->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leavetypes->leave_group->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leavetypes->leave_color->Visible) { // leave_color ?>
	<?php if ($hr_leavetypes->sortUrl($hr_leavetypes->leave_color) == "") { ?>
		<th data-name="leave_color" class="<?php echo $hr_leavetypes->leave_color->headerCellClass() ?>"><div id="elh_hr_leavetypes_leave_color" class="hr_leavetypes_leave_color"><div class="ew-table-header-caption"><?php echo $hr_leavetypes->leave_color->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leave_color" class="<?php echo $hr_leavetypes->leave_color->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leavetypes->SortUrl($hr_leavetypes->leave_color) ?>',1);"><div id="elh_hr_leavetypes_leave_color" class="hr_leavetypes_leave_color">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leavetypes->leave_color->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_leavetypes->leave_color->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leavetypes->leave_color->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leavetypes->max_carried_forward_amount->Visible) { // max_carried_forward_amount ?>
	<?php if ($hr_leavetypes->sortUrl($hr_leavetypes->max_carried_forward_amount) == "") { ?>
		<th data-name="max_carried_forward_amount" class="<?php echo $hr_leavetypes->max_carried_forward_amount->headerCellClass() ?>"><div id="elh_hr_leavetypes_max_carried_forward_amount" class="hr_leavetypes_max_carried_forward_amount"><div class="ew-table-header-caption"><?php echo $hr_leavetypes->max_carried_forward_amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="max_carried_forward_amount" class="<?php echo $hr_leavetypes->max_carried_forward_amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leavetypes->SortUrl($hr_leavetypes->max_carried_forward_amount) ?>',1);"><div id="elh_hr_leavetypes_max_carried_forward_amount" class="hr_leavetypes_max_carried_forward_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leavetypes->max_carried_forward_amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leavetypes->max_carried_forward_amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leavetypes->max_carried_forward_amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leavetypes->HospID->Visible) { // HospID ?>
	<?php if ($hr_leavetypes->sortUrl($hr_leavetypes->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $hr_leavetypes->HospID->headerCellClass() ?>"><div id="elh_hr_leavetypes_HospID" class="hr_leavetypes_HospID"><div class="ew-table-header-caption"><?php echo $hr_leavetypes->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $hr_leavetypes->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leavetypes->SortUrl($hr_leavetypes->HospID) ?>',1);"><div id="elh_hr_leavetypes_HospID" class="hr_leavetypes_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leavetypes->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leavetypes->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leavetypes->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hr_leavetypes_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hr_leavetypes->ExportAll && $hr_leavetypes->isExport()) {
	$hr_leavetypes_list->StopRec = $hr_leavetypes_list->TotalRecs;
} else {

	// Set the last record to display
	if ($hr_leavetypes_list->TotalRecs > $hr_leavetypes_list->StartRec + $hr_leavetypes_list->DisplayRecs - 1)
		$hr_leavetypes_list->StopRec = $hr_leavetypes_list->StartRec + $hr_leavetypes_list->DisplayRecs - 1;
	else
		$hr_leavetypes_list->StopRec = $hr_leavetypes_list->TotalRecs;
}
$hr_leavetypes_list->RecCnt = $hr_leavetypes_list->StartRec - 1;
if ($hr_leavetypes_list->Recordset && !$hr_leavetypes_list->Recordset->EOF) {
	$hr_leavetypes_list->Recordset->moveFirst();
	$selectLimit = $hr_leavetypes_list->UseSelectLimit;
	if (!$selectLimit && $hr_leavetypes_list->StartRec > 1)
		$hr_leavetypes_list->Recordset->move($hr_leavetypes_list->StartRec - 1);
} elseif (!$hr_leavetypes->AllowAddDeleteRow && $hr_leavetypes_list->StopRec == 0) {
	$hr_leavetypes_list->StopRec = $hr_leavetypes->GridAddRowCount;
}

// Initialize aggregate
$hr_leavetypes->RowType = ROWTYPE_AGGREGATEINIT;
$hr_leavetypes->resetAttributes();
$hr_leavetypes_list->renderRow();
while ($hr_leavetypes_list->RecCnt < $hr_leavetypes_list->StopRec) {
	$hr_leavetypes_list->RecCnt++;
	if ($hr_leavetypes_list->RecCnt >= $hr_leavetypes_list->StartRec) {
		$hr_leavetypes_list->RowCnt++;

		// Set up key count
		$hr_leavetypes_list->KeyCount = $hr_leavetypes_list->RowIndex;

		// Init row class and style
		$hr_leavetypes->resetAttributes();
		$hr_leavetypes->CssClass = "";
		if ($hr_leavetypes->isGridAdd()) {
		} else {
			$hr_leavetypes_list->loadRowValues($hr_leavetypes_list->Recordset); // Load row values
		}
		$hr_leavetypes->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hr_leavetypes->RowAttrs = array_merge($hr_leavetypes->RowAttrs, array('data-rowindex'=>$hr_leavetypes_list->RowCnt, 'id'=>'r' . $hr_leavetypes_list->RowCnt . '_hr_leavetypes', 'data-rowtype'=>$hr_leavetypes->RowType));

		// Render row
		$hr_leavetypes_list->renderRow();

		// Render list options
		$hr_leavetypes_list->renderListOptions();
?>
	<tr<?php echo $hr_leavetypes->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hr_leavetypes_list->ListOptions->render("body", "left", $hr_leavetypes_list->RowCnt);
?>
	<?php if ($hr_leavetypes->id->Visible) { // id ?>
		<td data-name="id"<?php echo $hr_leavetypes->id->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_list->RowCnt ?>_hr_leavetypes_id" class="hr_leavetypes_id">
<span<?php echo $hr_leavetypes->id->viewAttributes() ?>>
<?php echo $hr_leavetypes->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leavetypes->name->Visible) { // name ?>
		<td data-name="name"<?php echo $hr_leavetypes->name->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_list->RowCnt ?>_hr_leavetypes_name" class="hr_leavetypes_name">
<span<?php echo $hr_leavetypes->name->viewAttributes() ?>>
<?php echo $hr_leavetypes->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leavetypes->supervisor_leave_assign->Visible) { // supervisor_leave_assign ?>
		<td data-name="supervisor_leave_assign"<?php echo $hr_leavetypes->supervisor_leave_assign->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_list->RowCnt ?>_hr_leavetypes_supervisor_leave_assign" class="hr_leavetypes_supervisor_leave_assign">
<span<?php echo $hr_leavetypes->supervisor_leave_assign->viewAttributes() ?>>
<?php echo $hr_leavetypes->supervisor_leave_assign->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leavetypes->employee_can_apply->Visible) { // employee_can_apply ?>
		<td data-name="employee_can_apply"<?php echo $hr_leavetypes->employee_can_apply->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_list->RowCnt ?>_hr_leavetypes_employee_can_apply" class="hr_leavetypes_employee_can_apply">
<span<?php echo $hr_leavetypes->employee_can_apply->viewAttributes() ?>>
<?php echo $hr_leavetypes->employee_can_apply->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leavetypes->apply_beyond_current->Visible) { // apply_beyond_current ?>
		<td data-name="apply_beyond_current"<?php echo $hr_leavetypes->apply_beyond_current->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_list->RowCnt ?>_hr_leavetypes_apply_beyond_current" class="hr_leavetypes_apply_beyond_current">
<span<?php echo $hr_leavetypes->apply_beyond_current->viewAttributes() ?>>
<?php echo $hr_leavetypes->apply_beyond_current->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leavetypes->leave_accrue->Visible) { // leave_accrue ?>
		<td data-name="leave_accrue"<?php echo $hr_leavetypes->leave_accrue->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_list->RowCnt ?>_hr_leavetypes_leave_accrue" class="hr_leavetypes_leave_accrue">
<span<?php echo $hr_leavetypes->leave_accrue->viewAttributes() ?>>
<?php echo $hr_leavetypes->leave_accrue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leavetypes->carried_forward->Visible) { // carried_forward ?>
		<td data-name="carried_forward"<?php echo $hr_leavetypes->carried_forward->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_list->RowCnt ?>_hr_leavetypes_carried_forward" class="hr_leavetypes_carried_forward">
<span<?php echo $hr_leavetypes->carried_forward->viewAttributes() ?>>
<?php echo $hr_leavetypes->carried_forward->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leavetypes->default_per_year->Visible) { // default_per_year ?>
		<td data-name="default_per_year"<?php echo $hr_leavetypes->default_per_year->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_list->RowCnt ?>_hr_leavetypes_default_per_year" class="hr_leavetypes_default_per_year">
<span<?php echo $hr_leavetypes->default_per_year->viewAttributes() ?>>
<?php echo $hr_leavetypes->default_per_year->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leavetypes->carried_forward_percentage->Visible) { // carried_forward_percentage ?>
		<td data-name="carried_forward_percentage"<?php echo $hr_leavetypes->carried_forward_percentage->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_list->RowCnt ?>_hr_leavetypes_carried_forward_percentage" class="hr_leavetypes_carried_forward_percentage">
<span<?php echo $hr_leavetypes->carried_forward_percentage->viewAttributes() ?>>
<?php echo $hr_leavetypes->carried_forward_percentage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leavetypes->carried_forward_leave_availability->Visible) { // carried_forward_leave_availability ?>
		<td data-name="carried_forward_leave_availability"<?php echo $hr_leavetypes->carried_forward_leave_availability->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_list->RowCnt ?>_hr_leavetypes_carried_forward_leave_availability" class="hr_leavetypes_carried_forward_leave_availability">
<span<?php echo $hr_leavetypes->carried_forward_leave_availability->viewAttributes() ?>>
<?php echo $hr_leavetypes->carried_forward_leave_availability->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leavetypes->propotionate_on_joined_date->Visible) { // propotionate_on_joined_date ?>
		<td data-name="propotionate_on_joined_date"<?php echo $hr_leavetypes->propotionate_on_joined_date->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_list->RowCnt ?>_hr_leavetypes_propotionate_on_joined_date" class="hr_leavetypes_propotionate_on_joined_date">
<span<?php echo $hr_leavetypes->propotionate_on_joined_date->viewAttributes() ?>>
<?php echo $hr_leavetypes->propotionate_on_joined_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leavetypes->send_notification_emails->Visible) { // send_notification_emails ?>
		<td data-name="send_notification_emails"<?php echo $hr_leavetypes->send_notification_emails->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_list->RowCnt ?>_hr_leavetypes_send_notification_emails" class="hr_leavetypes_send_notification_emails">
<span<?php echo $hr_leavetypes->send_notification_emails->viewAttributes() ?>>
<?php echo $hr_leavetypes->send_notification_emails->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leavetypes->leave_group->Visible) { // leave_group ?>
		<td data-name="leave_group"<?php echo $hr_leavetypes->leave_group->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_list->RowCnt ?>_hr_leavetypes_leave_group" class="hr_leavetypes_leave_group">
<span<?php echo $hr_leavetypes->leave_group->viewAttributes() ?>>
<?php echo $hr_leavetypes->leave_group->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leavetypes->leave_color->Visible) { // leave_color ?>
		<td data-name="leave_color"<?php echo $hr_leavetypes->leave_color->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_list->RowCnt ?>_hr_leavetypes_leave_color" class="hr_leavetypes_leave_color">
<span<?php echo $hr_leavetypes->leave_color->viewAttributes() ?>>
<?php echo $hr_leavetypes->leave_color->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leavetypes->max_carried_forward_amount->Visible) { // max_carried_forward_amount ?>
		<td data-name="max_carried_forward_amount"<?php echo $hr_leavetypes->max_carried_forward_amount->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_list->RowCnt ?>_hr_leavetypes_max_carried_forward_amount" class="hr_leavetypes_max_carried_forward_amount">
<span<?php echo $hr_leavetypes->max_carried_forward_amount->viewAttributes() ?>>
<?php echo $hr_leavetypes->max_carried_forward_amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leavetypes->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $hr_leavetypes->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_list->RowCnt ?>_hr_leavetypes_HospID" class="hr_leavetypes_HospID">
<span<?php echo $hr_leavetypes->HospID->viewAttributes() ?>>
<?php echo $hr_leavetypes->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hr_leavetypes_list->ListOptions->render("body", "right", $hr_leavetypes_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$hr_leavetypes->isGridAdd())
		$hr_leavetypes_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$hr_leavetypes->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hr_leavetypes_list->Recordset)
	$hr_leavetypes_list->Recordset->Close();
?>
<?php if (!$hr_leavetypes->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hr_leavetypes->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_leavetypes_list->Pager)) $hr_leavetypes_list->Pager = new NumericPager($hr_leavetypes_list->StartRec, $hr_leavetypes_list->DisplayRecs, $hr_leavetypes_list->TotalRecs, $hr_leavetypes_list->RecRange, $hr_leavetypes_list->AutoHidePager) ?>
<?php if ($hr_leavetypes_list->Pager->RecordCount > 0 && $hr_leavetypes_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_leavetypes_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_leavetypes_list->pageUrl() ?>start=<?php echo $hr_leavetypes_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_leavetypes_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_leavetypes_list->pageUrl() ?>start=<?php echo $hr_leavetypes_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_leavetypes_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_leavetypes_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_leavetypes_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_leavetypes_list->pageUrl() ?>start=<?php echo $hr_leavetypes_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_leavetypes_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_leavetypes_list->pageUrl() ?>start=<?php echo $hr_leavetypes_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_leavetypes_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_leavetypes_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_leavetypes_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_leavetypes_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_leavetypes_list->TotalRecs > 0 && (!$hr_leavetypes_list->AutoHidePageSizeSelector || $hr_leavetypes_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_leavetypes">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_leavetypes_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_leavetypes_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_leavetypes_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_leavetypes_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_leavetypes_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_leavetypes_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_leavetypes->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_leavetypes_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hr_leavetypes_list->TotalRecs == 0 && !$hr_leavetypes->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hr_leavetypes_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hr_leavetypes_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_leavetypes->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$hr_leavetypes->isExport()) { ?>
<script>
ew.scrollableTable("gmp_hr_leavetypes", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_leavetypes_list->terminate();
?>