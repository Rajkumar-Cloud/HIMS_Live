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
$view_patient_clinical_summary_list = new view_patient_clinical_summary_list();

// Run the page
$view_patient_clinical_summary_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_patient_clinical_summary_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_patient_clinical_summary_list->isExport()) { ?>
<script>
var fview_patient_clinical_summarylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_patient_clinical_summarylist = currentForm = new ew.Form("fview_patient_clinical_summarylist", "list");
	fview_patient_clinical_summarylist.formKeyCountName = '<?php echo $view_patient_clinical_summary_list->FormKeyCountName ?>';
	loadjs.done("fview_patient_clinical_summarylist");
});
var fview_patient_clinical_summarylistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_patient_clinical_summarylistsrch = currentSearchForm = new ew.Form("fview_patient_clinical_summarylistsrch");

	// Dynamic selection lists
	// Filters

	fview_patient_clinical_summarylistsrch.filterList = <?php echo $view_patient_clinical_summary_list->getFilterList() ?>;
	loadjs.done("fview_patient_clinical_summarylistsrch");
});
</script>
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
<script>
loadjs.ready("head", function() {
	ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
	ew.PREVIEW_SINGLE_ROW = false;
	ew.PREVIEW_OVERLAY = false;
	loadjs("js/ewpreview.js", "preview");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_patient_clinical_summary_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_patient_clinical_summary_list->TotalRecords > 0 && $view_patient_clinical_summary_list->ExportOptions->visible()) { ?>
<?php $view_patient_clinical_summary_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->ImportOptions->visible()) { ?>
<?php $view_patient_clinical_summary_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->SearchOptions->visible()) { ?>
<?php $view_patient_clinical_summary_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->FilterOptions->visible()) { ?>
<?php $view_patient_clinical_summary_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_patient_clinical_summary_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_patient_clinical_summary_list->isExport() && !$view_patient_clinical_summary->CurrentAction) { ?>
<form name="fview_patient_clinical_summarylistsrch" id="fview_patient_clinical_summarylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_patient_clinical_summarylistsrch-search-panel" class="<?php echo $view_patient_clinical_summary_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_patient_clinical_summary">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_patient_clinical_summary_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_patient_clinical_summary_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_patient_clinical_summary_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_patient_clinical_summary_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_patient_clinical_summary_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_patient_clinical_summary_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_patient_clinical_summary_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_patient_clinical_summary_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_patient_clinical_summary_list->showPageHeader(); ?>
<?php
$view_patient_clinical_summary_list->showMessage();
?>
<?php if ($view_patient_clinical_summary_list->TotalRecords > 0 || $view_patient_clinical_summary->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_patient_clinical_summary_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_patient_clinical_summary">
<?php if (!$view_patient_clinical_summary_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_patient_clinical_summary_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_patient_clinical_summary_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_patient_clinical_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_patient_clinical_summarylist" id="fview_patient_clinical_summarylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_patient_clinical_summary">
<div id="gmp_view_patient_clinical_summary" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_patient_clinical_summary_list->TotalRecords > 0 || $view_patient_clinical_summary_list->isGridEdit()) { ?>
<table id="tbl_view_patient_clinical_summarylist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_patient_clinical_summary->RowType = ROWTYPE_HEADER;

// Render list options
$view_patient_clinical_summary_list->renderListOptions();

// Render list options (header, left)
$view_patient_clinical_summary_list->ListOptions->render("header", "left");
?>
<?php if ($view_patient_clinical_summary_list->id->Visible) { // id ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_patient_clinical_summary_list->id->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_id" class="view_patient_clinical_summary_id"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_patient_clinical_summary_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->id) ?>', 1);"><div id="elh_view_patient_clinical_summary_id" class="view_patient_clinical_summary_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->PatientID->Visible) { // PatientID ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_patient_clinical_summary_list->PatientID->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_PatientID" class="view_patient_clinical_summary_PatientID"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_patient_clinical_summary_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->PatientID) ?>', 1);"><div id="elh_view_patient_clinical_summary_PatientID" class="view_patient_clinical_summary_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->HospID->Visible) { // HospID ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_patient_clinical_summary_list->HospID->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_HospID" class="view_patient_clinical_summary_HospID"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_patient_clinical_summary_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->HospID) ?>', 1);"><div id="elh_view_patient_clinical_summary_HospID" class="view_patient_clinical_summary_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->mrnNo->Visible) { // mrnNo ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->mrnNo) == "") { ?>
		<th data-name="mrnNo" class="<?php echo $view_patient_clinical_summary_list->mrnNo->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_mrnNo" class="view_patient_clinical_summary_mrnNo"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->mrnNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnNo" class="<?php echo $view_patient_clinical_summary_list->mrnNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->mrnNo) ?>', 1);"><div id="elh_view_patient_clinical_summary_mrnNo" class="view_patient_clinical_summary_mrnNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->mrnNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->mrnNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->mrnNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->patient_id->Visible) { // patient_id ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $view_patient_clinical_summary_list->patient_id->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_patient_id" class="view_patient_clinical_summary_patient_id"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $view_patient_clinical_summary_list->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->patient_id) ?>', 1);"><div id="elh_view_patient_clinical_summary_patient_id" class="view_patient_clinical_summary_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->patient_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->patient_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->patient_name->Visible) { // patient_name ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->patient_name) == "") { ?>
		<th data-name="patient_name" class="<?php echo $view_patient_clinical_summary_list->patient_name->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_patient_name" class="view_patient_clinical_summary_patient_name"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->patient_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_name" class="<?php echo $view_patient_clinical_summary_list->patient_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->patient_name) ?>', 1);"><div id="elh_view_patient_clinical_summary_patient_name" class="view_patient_clinical_summary_patient_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->patient_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->patient_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->patient_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->gender->Visible) { // gender ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $view_patient_clinical_summary_list->gender->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_gender" class="view_patient_clinical_summary_gender"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $view_patient_clinical_summary_list->gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->gender) ?>', 1);"><div id="elh_view_patient_clinical_summary_gender" class="view_patient_clinical_summary_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->age->Visible) { // age ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->age) == "") { ?>
		<th data-name="age" class="<?php echo $view_patient_clinical_summary_list->age->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_age" class="view_patient_clinical_summary_age"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="age" class="<?php echo $view_patient_clinical_summary_list->age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->age) ?>', 1);"><div id="elh_view_patient_clinical_summary_age" class="view_patient_clinical_summary_age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->physician_id->Visible) { // physician_id ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->physician_id) == "") { ?>
		<th data-name="physician_id" class="<?php echo $view_patient_clinical_summary_list->physician_id->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_physician_id" class="view_patient_clinical_summary_physician_id"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->physician_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="physician_id" class="<?php echo $view_patient_clinical_summary_list->physician_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->physician_id) ?>', 1);"><div id="elh_view_patient_clinical_summary_physician_id" class="view_patient_clinical_summary_physician_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->physician_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->physician_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->physician_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->typeRegsisteration) == "") { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_patient_clinical_summary_list->typeRegsisteration->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_typeRegsisteration" class="view_patient_clinical_summary_typeRegsisteration"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->typeRegsisteration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_patient_clinical_summary_list->typeRegsisteration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->typeRegsisteration) ?>', 1);"><div id="elh_view_patient_clinical_summary_typeRegsisteration" class="view_patient_clinical_summary_typeRegsisteration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->typeRegsisteration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->typeRegsisteration->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->typeRegsisteration->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->PaymentCategory->Visible) { // PaymentCategory ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->PaymentCategory) == "") { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_patient_clinical_summary_list->PaymentCategory->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_PaymentCategory" class="view_patient_clinical_summary_PaymentCategory"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->PaymentCategory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_patient_clinical_summary_list->PaymentCategory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->PaymentCategory) ?>', 1);"><div id="elh_view_patient_clinical_summary_PaymentCategory" class="view_patient_clinical_summary_PaymentCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->PaymentCategory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->PaymentCategory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->PaymentCategory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->admission_consultant_id) == "") { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_patient_clinical_summary_list->admission_consultant_id->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_admission_consultant_id" class="view_patient_clinical_summary_admission_consultant_id"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->admission_consultant_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_patient_clinical_summary_list->admission_consultant_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->admission_consultant_id) ?>', 1);"><div id="elh_view_patient_clinical_summary_admission_consultant_id" class="view_patient_clinical_summary_admission_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->admission_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->admission_consultant_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->admission_consultant_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->leading_consultant_id) == "") { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_patient_clinical_summary_list->leading_consultant_id->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_leading_consultant_id" class="view_patient_clinical_summary_leading_consultant_id"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->leading_consultant_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_patient_clinical_summary_list->leading_consultant_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->leading_consultant_id) ?>', 1);"><div id="elh_view_patient_clinical_summary_leading_consultant_id" class="view_patient_clinical_summary_leading_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->leading_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->leading_consultant_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->leading_consultant_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->admission_date->Visible) { // admission_date ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->admission_date) == "") { ?>
		<th data-name="admission_date" class="<?php echo $view_patient_clinical_summary_list->admission_date->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_admission_date" class="view_patient_clinical_summary_admission_date"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->admission_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="admission_date" class="<?php echo $view_patient_clinical_summary_list->admission_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->admission_date) ?>', 1);"><div id="elh_view_patient_clinical_summary_admission_date" class="view_patient_clinical_summary_admission_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->admission_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->admission_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->admission_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->release_date->Visible) { // release_date ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->release_date) == "") { ?>
		<th data-name="release_date" class="<?php echo $view_patient_clinical_summary_list->release_date->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_release_date" class="view_patient_clinical_summary_release_date"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->release_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="release_date" class="<?php echo $view_patient_clinical_summary_list->release_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->release_date) ?>', 1);"><div id="elh_view_patient_clinical_summary_release_date" class="view_patient_clinical_summary_release_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->release_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->release_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->release_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_patient_clinical_summary_list->PaymentStatus->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_PaymentStatus" class="view_patient_clinical_summary_PaymentStatus"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->PaymentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_patient_clinical_summary_list->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->PaymentStatus) ?>', 1);"><div id="elh_view_patient_clinical_summary_PaymentStatus" class="view_patient_clinical_summary_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->PaymentStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->PaymentStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->status->Visible) { // status ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_patient_clinical_summary_list->status->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_status" class="view_patient_clinical_summary_status"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_patient_clinical_summary_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->status) ?>', 1);"><div id="elh_view_patient_clinical_summary_status" class="view_patient_clinical_summary_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->createdby->Visible) { // createdby ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_patient_clinical_summary_list->createdby->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_createdby" class="view_patient_clinical_summary_createdby"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_patient_clinical_summary_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->createdby) ?>', 1);"><div id="elh_view_patient_clinical_summary_createdby" class="view_patient_clinical_summary_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_patient_clinical_summary_list->createddatetime->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_createddatetime" class="view_patient_clinical_summary_createddatetime"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_patient_clinical_summary_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->createddatetime) ?>', 1);"><div id="elh_view_patient_clinical_summary_createddatetime" class="view_patient_clinical_summary_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_patient_clinical_summary_list->modifiedby->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_modifiedby" class="view_patient_clinical_summary_modifiedby"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_patient_clinical_summary_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->modifiedby) ?>', 1);"><div id="elh_view_patient_clinical_summary_modifiedby" class="view_patient_clinical_summary_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_patient_clinical_summary_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_modifieddatetime" class="view_patient_clinical_summary_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_patient_clinical_summary_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->modifieddatetime) ?>', 1);"><div id="elh_view_patient_clinical_summary_modifieddatetime" class="view_patient_clinical_summary_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->BP->Visible) { // BP ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->BP) == "") { ?>
		<th data-name="BP" class="<?php echo $view_patient_clinical_summary_list->BP->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_BP" class="view_patient_clinical_summary_BP"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->BP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BP" class="<?php echo $view_patient_clinical_summary_list->BP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->BP) ?>', 1);"><div id="elh_view_patient_clinical_summary_BP" class="view_patient_clinical_summary_BP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->BP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->BP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->BP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->Pulse->Visible) { // Pulse ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->Pulse) == "") { ?>
		<th data-name="Pulse" class="<?php echo $view_patient_clinical_summary_list->Pulse->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_Pulse" class="view_patient_clinical_summary_Pulse"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->Pulse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pulse" class="<?php echo $view_patient_clinical_summary_list->Pulse->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->Pulse) ?>', 1);"><div id="elh_view_patient_clinical_summary_Pulse" class="view_patient_clinical_summary_Pulse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->Pulse->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->Pulse->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->Pulse->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->Resp->Visible) { // Resp ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->Resp) == "") { ?>
		<th data-name="Resp" class="<?php echo $view_patient_clinical_summary_list->Resp->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_Resp" class="view_patient_clinical_summary_Resp"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->Resp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resp" class="<?php echo $view_patient_clinical_summary_list->Resp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->Resp) ?>', 1);"><div id="elh_view_patient_clinical_summary_Resp" class="view_patient_clinical_summary_Resp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->Resp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->Resp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->Resp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->SPO2->Visible) { // SPO2 ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->SPO2) == "") { ?>
		<th data-name="SPO2" class="<?php echo $view_patient_clinical_summary_list->SPO2->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_SPO2" class="view_patient_clinical_summary_SPO2"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->SPO2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SPO2" class="<?php echo $view_patient_clinical_summary_list->SPO2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->SPO2) ?>', 1);"><div id="elh_view_patient_clinical_summary_SPO2" class="view_patient_clinical_summary_SPO2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->SPO2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->SPO2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->SPO2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_clinical_summary_list->NextReviewDate->Visible) { // NextReviewDate ?>
	<?php if ($view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->NextReviewDate) == "") { ?>
		<th data-name="NextReviewDate" class="<?php echo $view_patient_clinical_summary_list->NextReviewDate->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_NextReviewDate" class="view_patient_clinical_summary_NextReviewDate"><div class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->NextReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NextReviewDate" class="<?php echo $view_patient_clinical_summary_list->NextReviewDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_clinical_summary_list->SortUrl($view_patient_clinical_summary_list->NextReviewDate) ?>', 1);"><div id="elh_view_patient_clinical_summary_NextReviewDate" class="view_patient_clinical_summary_NextReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_clinical_summary_list->NextReviewDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_clinical_summary_list->NextReviewDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_clinical_summary_list->NextReviewDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_patient_clinical_summary_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_patient_clinical_summary_list->ExportAll && $view_patient_clinical_summary_list->isExport()) {
	$view_patient_clinical_summary_list->StopRecord = $view_patient_clinical_summary_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_patient_clinical_summary_list->TotalRecords > $view_patient_clinical_summary_list->StartRecord + $view_patient_clinical_summary_list->DisplayRecords - 1)
		$view_patient_clinical_summary_list->StopRecord = $view_patient_clinical_summary_list->StartRecord + $view_patient_clinical_summary_list->DisplayRecords - 1;
	else
		$view_patient_clinical_summary_list->StopRecord = $view_patient_clinical_summary_list->TotalRecords;
}
$view_patient_clinical_summary_list->RecordCount = $view_patient_clinical_summary_list->StartRecord - 1;
if ($view_patient_clinical_summary_list->Recordset && !$view_patient_clinical_summary_list->Recordset->EOF) {
	$view_patient_clinical_summary_list->Recordset->moveFirst();
	$selectLimit = $view_patient_clinical_summary_list->UseSelectLimit;
	if (!$selectLimit && $view_patient_clinical_summary_list->StartRecord > 1)
		$view_patient_clinical_summary_list->Recordset->move($view_patient_clinical_summary_list->StartRecord - 1);
} elseif (!$view_patient_clinical_summary->AllowAddDeleteRow && $view_patient_clinical_summary_list->StopRecord == 0) {
	$view_patient_clinical_summary_list->StopRecord = $view_patient_clinical_summary->GridAddRowCount;
}

// Initialize aggregate
$view_patient_clinical_summary->RowType = ROWTYPE_AGGREGATEINIT;
$view_patient_clinical_summary->resetAttributes();
$view_patient_clinical_summary_list->renderRow();
while ($view_patient_clinical_summary_list->RecordCount < $view_patient_clinical_summary_list->StopRecord) {
	$view_patient_clinical_summary_list->RecordCount++;
	if ($view_patient_clinical_summary_list->RecordCount >= $view_patient_clinical_summary_list->StartRecord) {
		$view_patient_clinical_summary_list->RowCount++;

		// Set up key count
		$view_patient_clinical_summary_list->KeyCount = $view_patient_clinical_summary_list->RowIndex;

		// Init row class and style
		$view_patient_clinical_summary->resetAttributes();
		$view_patient_clinical_summary->CssClass = "";
		if ($view_patient_clinical_summary_list->isGridAdd()) {
		} else {
			$view_patient_clinical_summary_list->loadRowValues($view_patient_clinical_summary_list->Recordset); // Load row values
		}
		$view_patient_clinical_summary->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_patient_clinical_summary->RowAttrs->merge(["data-rowindex" => $view_patient_clinical_summary_list->RowCount, "id" => "r" . $view_patient_clinical_summary_list->RowCount . "_view_patient_clinical_summary", "data-rowtype" => $view_patient_clinical_summary->RowType]);

		// Render row
		$view_patient_clinical_summary_list->renderRow();

		// Render list options
		$view_patient_clinical_summary_list->renderListOptions();
?>
	<tr <?php echo $view_patient_clinical_summary->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_patient_clinical_summary_list->ListOptions->render("body", "left", $view_patient_clinical_summary_list->RowCount);
?>
	<?php if ($view_patient_clinical_summary_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_patient_clinical_summary_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_id">
<span<?php echo $view_patient_clinical_summary_list->id->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_patient_clinical_summary_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_PatientID">
<span<?php echo $view_patient_clinical_summary_list->PatientID->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_patient_clinical_summary_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_HospID">
<span<?php echo $view_patient_clinical_summary_list->HospID->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->mrnNo->Visible) { // mrnNo ?>
		<td data-name="mrnNo" <?php echo $view_patient_clinical_summary_list->mrnNo->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_mrnNo">
<span<?php echo $view_patient_clinical_summary_list->mrnNo->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->mrnNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id" <?php echo $view_patient_clinical_summary_list->patient_id->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_patient_id">
<span<?php echo $view_patient_clinical_summary_list->patient_id->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->patient_name->Visible) { // patient_name ?>
		<td data-name="patient_name" <?php echo $view_patient_clinical_summary_list->patient_name->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_patient_name">
<span<?php echo $view_patient_clinical_summary_list->patient_name->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->patient_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->gender->Visible) { // gender ?>
		<td data-name="gender" <?php echo $view_patient_clinical_summary_list->gender->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_gender">
<span<?php echo $view_patient_clinical_summary_list->gender->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->age->Visible) { // age ?>
		<td data-name="age" <?php echo $view_patient_clinical_summary_list->age->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_age">
<span<?php echo $view_patient_clinical_summary_list->age->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->physician_id->Visible) { // physician_id ?>
		<td data-name="physician_id" <?php echo $view_patient_clinical_summary_list->physician_id->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_physician_id">
<span<?php echo $view_patient_clinical_summary_list->physician_id->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->physician_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<td data-name="typeRegsisteration" <?php echo $view_patient_clinical_summary_list->typeRegsisteration->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_typeRegsisteration">
<span<?php echo $view_patient_clinical_summary_list->typeRegsisteration->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->typeRegsisteration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->PaymentCategory->Visible) { // PaymentCategory ?>
		<td data-name="PaymentCategory" <?php echo $view_patient_clinical_summary_list->PaymentCategory->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_PaymentCategory">
<span<?php echo $view_patient_clinical_summary_list->PaymentCategory->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->PaymentCategory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->admission_consultant_id->Visible) { // admission_consultant_id ?>
		<td data-name="admission_consultant_id" <?php echo $view_patient_clinical_summary_list->admission_consultant_id->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_admission_consultant_id">
<span<?php echo $view_patient_clinical_summary_list->admission_consultant_id->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->admission_consultant_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->leading_consultant_id->Visible) { // leading_consultant_id ?>
		<td data-name="leading_consultant_id" <?php echo $view_patient_clinical_summary_list->leading_consultant_id->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_leading_consultant_id">
<span<?php echo $view_patient_clinical_summary_list->leading_consultant_id->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->leading_consultant_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->admission_date->Visible) { // admission_date ?>
		<td data-name="admission_date" <?php echo $view_patient_clinical_summary_list->admission_date->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_admission_date">
<span<?php echo $view_patient_clinical_summary_list->admission_date->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->admission_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->release_date->Visible) { // release_date ?>
		<td data-name="release_date" <?php echo $view_patient_clinical_summary_list->release_date->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_release_date">
<span<?php echo $view_patient_clinical_summary_list->release_date->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->release_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus" <?php echo $view_patient_clinical_summary_list->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_PaymentStatus">
<span<?php echo $view_patient_clinical_summary_list->PaymentStatus->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->PaymentStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $view_patient_clinical_summary_list->status->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_status">
<span<?php echo $view_patient_clinical_summary_list->status->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_patient_clinical_summary_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_createdby">
<span<?php echo $view_patient_clinical_summary_list->createdby->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_patient_clinical_summary_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_createddatetime">
<span<?php echo $view_patient_clinical_summary_list->createddatetime->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_patient_clinical_summary_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_modifiedby">
<span<?php echo $view_patient_clinical_summary_list->modifiedby->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_patient_clinical_summary_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_modifieddatetime">
<span<?php echo $view_patient_clinical_summary_list->modifieddatetime->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->BP->Visible) { // BP ?>
		<td data-name="BP" <?php echo $view_patient_clinical_summary_list->BP->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_BP">
<span<?php echo $view_patient_clinical_summary_list->BP->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->BP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->Pulse->Visible) { // Pulse ?>
		<td data-name="Pulse" <?php echo $view_patient_clinical_summary_list->Pulse->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_Pulse">
<span<?php echo $view_patient_clinical_summary_list->Pulse->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->Pulse->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->Resp->Visible) { // Resp ?>
		<td data-name="Resp" <?php echo $view_patient_clinical_summary_list->Resp->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_Resp">
<span<?php echo $view_patient_clinical_summary_list->Resp->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->Resp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->SPO2->Visible) { // SPO2 ?>
		<td data-name="SPO2" <?php echo $view_patient_clinical_summary_list->SPO2->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_SPO2">
<span<?php echo $view_patient_clinical_summary_list->SPO2->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->SPO2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_clinical_summary_list->NextReviewDate->Visible) { // NextReviewDate ?>
		<td data-name="NextReviewDate" <?php echo $view_patient_clinical_summary_list->NextReviewDate->cellAttributes() ?>>
<span id="el<?php echo $view_patient_clinical_summary_list->RowCount ?>_view_patient_clinical_summary_NextReviewDate">
<span<?php echo $view_patient_clinical_summary_list->NextReviewDate->viewAttributes() ?>><?php echo $view_patient_clinical_summary_list->NextReviewDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_patient_clinical_summary_list->ListOptions->render("body", "right", $view_patient_clinical_summary_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_patient_clinical_summary_list->isGridAdd())
		$view_patient_clinical_summary_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_patient_clinical_summary->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_patient_clinical_summary_list->Recordset)
	$view_patient_clinical_summary_list->Recordset->Close();
?>
<?php if (!$view_patient_clinical_summary_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_patient_clinical_summary_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_patient_clinical_summary_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_patient_clinical_summary_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_patient_clinical_summary_list->TotalRecords == 0 && !$view_patient_clinical_summary->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_patient_clinical_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_patient_clinical_summary_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_patient_clinical_summary_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_patient_clinical_summary->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_patient_clinical_summary",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_patient_clinical_summary_list->terminate();
?>