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
$view_ip_admission_bill_summary_list = new view_ip_admission_bill_summary_list();

// Run the page
$view_ip_admission_bill_summary_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_admission_bill_summary_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_ip_admission_bill_summary_list->isExport()) { ?>
<script>
var fview_ip_admission_bill_summarylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_ip_admission_bill_summarylist = currentForm = new ew.Form("fview_ip_admission_bill_summarylist", "list");
	fview_ip_admission_bill_summarylist.formKeyCountName = '<?php echo $view_ip_admission_bill_summary_list->FormKeyCountName ?>';
	loadjs.done("fview_ip_admission_bill_summarylist");
});
var fview_ip_admission_bill_summarylistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_ip_admission_bill_summarylistsrch = currentSearchForm = new ew.Form("fview_ip_admission_bill_summarylistsrch");

	// Dynamic selection lists
	// Filters

	fview_ip_admission_bill_summarylistsrch.filterList = <?php echo $view_ip_admission_bill_summary_list->getFilterList() ?>;
	loadjs.done("fview_ip_admission_bill_summarylistsrch");
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
<?php if (!$view_ip_admission_bill_summary_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ip_admission_bill_summary_list->TotalRecords > 0 && $view_ip_admission_bill_summary_list->ExportOptions->visible()) { ?>
<?php $view_ip_admission_bill_summary_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->ImportOptions->visible()) { ?>
<?php $view_ip_admission_bill_summary_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->SearchOptions->visible()) { ?>
<?php $view_ip_admission_bill_summary_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->FilterOptions->visible()) { ?>
<?php $view_ip_admission_bill_summary_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ip_admission_bill_summary_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ip_admission_bill_summary_list->isExport() && !$view_ip_admission_bill_summary->CurrentAction) { ?>
<form name="fview_ip_admission_bill_summarylistsrch" id="fview_ip_admission_bill_summarylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_ip_admission_bill_summarylistsrch-search-panel" class="<?php echo $view_ip_admission_bill_summary_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ip_admission_bill_summary">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_ip_admission_bill_summary_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ip_admission_bill_summary_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ip_admission_bill_summary_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_bill_summary_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_bill_summary_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_bill_summary_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_ip_admission_bill_summary_list->showPageHeader(); ?>
<?php
$view_ip_admission_bill_summary_list->showMessage();
?>
<?php if ($view_ip_admission_bill_summary_list->TotalRecords > 0 || $view_ip_admission_bill_summary->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ip_admission_bill_summary_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_admission_bill_summary">
<?php if (!$view_ip_admission_bill_summary_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ip_admission_bill_summary_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_ip_admission_bill_summary_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_bill_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ip_admission_bill_summarylist" id="fview_ip_admission_bill_summarylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_admission_bill_summary">
<div id="gmp_view_ip_admission_bill_summary" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_ip_admission_bill_summary_list->TotalRecords > 0 || $view_ip_admission_bill_summary_list->isGridEdit()) { ?>
<table id="tbl_view_ip_admission_bill_summarylist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ip_admission_bill_summary->RowType = ROWTYPE_HEADER;

// Render list options
$view_ip_admission_bill_summary_list->renderListOptions();

// Render list options (header, left)
$view_ip_admission_bill_summary_list->ListOptions->render("header", "left");
?>
<?php if ($view_ip_admission_bill_summary_list->id->Visible) { // id ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ip_admission_bill_summary_list->id->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_id" class="view_ip_admission_bill_summary_id"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ip_admission_bill_summary_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->id) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_id" class="view_ip_admission_bill_summary_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->mrnNo->Visible) { // mrnNo ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->mrnNo) == "") { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_admission_bill_summary_list->mrnNo->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_mrnNo" class="view_ip_admission_bill_summary_mrnNo"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->mrnNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_admission_bill_summary_list->mrnNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->mrnNo) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_mrnNo" class="view_ip_admission_bill_summary_mrnNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->mrnNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->mrnNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->mrnNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_admission_bill_summary_list->PatientID->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_PatientID" class="view_ip_admission_bill_summary_PatientID"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_admission_bill_summary_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->PatientID) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_PatientID" class="view_ip_admission_bill_summary_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->patient_name->Visible) { // patient_name ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->patient_name) == "") { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_admission_bill_summary_list->patient_name->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_patient_name" class="view_ip_admission_bill_summary_patient_name"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->patient_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_admission_bill_summary_list->patient_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->patient_name) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_patient_name" class="view_ip_admission_bill_summary_patient_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->patient_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->patient_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->patient_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->mobileno->Visible) { // mobileno ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->mobileno) == "") { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_admission_bill_summary_list->mobileno->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_mobileno" class="view_ip_admission_bill_summary_mobileno"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->mobileno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_admission_bill_summary_list->mobileno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->mobileno) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_mobileno" class="view_ip_admission_bill_summary_mobileno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->mobileno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->mobileno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->mobileno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->gender->Visible) { // gender ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $view_ip_admission_bill_summary_list->gender->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_gender" class="view_ip_admission_bill_summary_gender"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $view_ip_admission_bill_summary_list->gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->gender) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_gender" class="view_ip_admission_bill_summary_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->physician_id->Visible) { // physician_id ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->physician_id) == "") { ?>
		<th data-name="physician_id" class="<?php echo $view_ip_admission_bill_summary_list->physician_id->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_physician_id" class="view_ip_admission_bill_summary_physician_id"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->physician_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="physician_id" class="<?php echo $view_ip_admission_bill_summary_list->physician_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->physician_id) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_physician_id" class="view_ip_admission_bill_summary_physician_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->physician_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->physician_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->physician_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->typeRegsisteration) == "") { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_ip_admission_bill_summary_list->typeRegsisteration->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_typeRegsisteration" class="view_ip_admission_bill_summary_typeRegsisteration"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->typeRegsisteration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_ip_admission_bill_summary_list->typeRegsisteration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->typeRegsisteration) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_typeRegsisteration" class="view_ip_admission_bill_summary_typeRegsisteration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->typeRegsisteration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->typeRegsisteration->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->typeRegsisteration->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->PaymentCategory->Visible) { // PaymentCategory ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->PaymentCategory) == "") { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_ip_admission_bill_summary_list->PaymentCategory->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_PaymentCategory" class="view_ip_admission_bill_summary_PaymentCategory"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->PaymentCategory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_ip_admission_bill_summary_list->PaymentCategory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->PaymentCategory) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_PaymentCategory" class="view_ip_admission_bill_summary_PaymentCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->PaymentCategory->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->PaymentCategory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->PaymentCategory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->admission_consultant_id) == "") { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_ip_admission_bill_summary_list->admission_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_admission_consultant_id" class="view_ip_admission_bill_summary_admission_consultant_id"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->admission_consultant_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_ip_admission_bill_summary_list->admission_consultant_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->admission_consultant_id) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_admission_consultant_id" class="view_ip_admission_bill_summary_admission_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->admission_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->admission_consultant_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->admission_consultant_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->leading_consultant_id) == "") { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_ip_admission_bill_summary_list->leading_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_leading_consultant_id" class="view_ip_admission_bill_summary_leading_consultant_id"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->leading_consultant_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_ip_admission_bill_summary_list->leading_consultant_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->leading_consultant_id) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_leading_consultant_id" class="view_ip_admission_bill_summary_leading_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->leading_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->leading_consultant_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->leading_consultant_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->admission_date->Visible) { // admission_date ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->admission_date) == "") { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_admission_bill_summary_list->admission_date->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_admission_date" class="view_ip_admission_bill_summary_admission_date"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->admission_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_admission_bill_summary_list->admission_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->admission_date) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_admission_date" class="view_ip_admission_bill_summary_admission_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->admission_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->admission_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->admission_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->release_date->Visible) { // release_date ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->release_date) == "") { ?>
		<th data-name="release_date" class="<?php echo $view_ip_admission_bill_summary_list->release_date->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_release_date" class="view_ip_admission_bill_summary_release_date"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->release_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="release_date" class="<?php echo $view_ip_admission_bill_summary_list->release_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->release_date) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_release_date" class="view_ip_admission_bill_summary_release_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->release_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->release_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->release_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_admission_bill_summary_list->PaymentStatus->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_PaymentStatus" class="view_ip_admission_bill_summary_PaymentStatus"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->PaymentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_admission_bill_summary_list->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->PaymentStatus) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_PaymentStatus" class="view_ip_admission_bill_summary_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->PaymentStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->PaymentStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->status->Visible) { // status ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_ip_admission_bill_summary_list->status->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_status" class="view_ip_admission_bill_summary_status"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_ip_admission_bill_summary_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->status) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_status" class="view_ip_admission_bill_summary_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->createdby->Visible) { // createdby ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_ip_admission_bill_summary_list->createdby->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_createdby" class="view_ip_admission_bill_summary_createdby"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_ip_admission_bill_summary_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->createdby) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_createdby" class="view_ip_admission_bill_summary_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_admission_bill_summary_list->createddatetime->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_createddatetime" class="view_ip_admission_bill_summary_createddatetime"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_admission_bill_summary_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->createddatetime) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_createddatetime" class="view_ip_admission_bill_summary_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_admission_bill_summary_list->modifiedby->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_modifiedby" class="view_ip_admission_bill_summary_modifiedby"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_admission_bill_summary_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->modifiedby) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_modifiedby" class="view_ip_admission_bill_summary_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_admission_bill_summary_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_modifieddatetime" class="view_ip_admission_bill_summary_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_admission_bill_summary_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->modifieddatetime) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_modifieddatetime" class="view_ip_admission_bill_summary_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->HospID->Visible) { // HospID ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ip_admission_bill_summary_list->HospID->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_HospID" class="view_ip_admission_bill_summary_HospID"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ip_admission_bill_summary_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->HospID) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_HospID" class="view_ip_admission_bill_summary_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_admission_bill_summary_list->ReferedByDr->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_ReferedByDr" class="view_ip_admission_bill_summary_ReferedByDr"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->ReferedByDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_admission_bill_summary_list->ReferedByDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->ReferedByDr) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_ReferedByDr" class="view_ip_admission_bill_summary_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->ReferedByDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->ReferedByDr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->ReferedByDr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ip_admission_bill_summary_list->ReferClinicname->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_ReferClinicname" class="view_ip_admission_bill_summary_ReferClinicname"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->ReferClinicname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ip_admission_bill_summary_list->ReferClinicname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->ReferClinicname) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_ReferClinicname" class="view_ip_admission_bill_summary_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->ReferClinicname->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->ReferClinicname->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->ReferCity->Visible) { // ReferCity ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $view_ip_admission_bill_summary_list->ReferCity->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_ReferCity" class="view_ip_admission_bill_summary_ReferCity"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->ReferCity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $view_ip_admission_bill_summary_list->ReferCity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->ReferCity) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_ReferCity" class="view_ip_admission_bill_summary_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->ReferCity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->ReferCity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ip_admission_bill_summary_list->ReferMobileNo->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_ReferMobileNo" class="view_ip_admission_bill_summary_ReferMobileNo"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->ReferMobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ip_admission_bill_summary_list->ReferMobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->ReferMobileNo) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_ReferMobileNo" class="view_ip_admission_bill_summary_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->ReferMobileNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->ReferMobileNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ip_admission_bill_summary_list->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_ReferA4TreatingConsultant" class="view_ip_admission_bill_summary_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->ReferA4TreatingConsultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ip_admission_bill_summary_list->ReferA4TreatingConsultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->ReferA4TreatingConsultant) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_ReferA4TreatingConsultant" class="view_ip_admission_bill_summary_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->ReferA4TreatingConsultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->PurposreReferredfor) == "") { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ip_admission_bill_summary_list->PurposreReferredfor->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_PurposreReferredfor" class="view_ip_admission_bill_summary_PurposreReferredfor"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->PurposreReferredfor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ip_admission_bill_summary_list->PurposreReferredfor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->PurposreReferredfor) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_PurposreReferredfor" class="view_ip_admission_bill_summary_PurposreReferredfor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->PurposreReferredfor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->PurposreReferredfor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->PurposreReferredfor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->BillClosing->Visible) { // BillClosing ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->BillClosing) == "") { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_admission_bill_summary_list->BillClosing->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_BillClosing" class="view_ip_admission_bill_summary_BillClosing"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->BillClosing->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_admission_bill_summary_list->BillClosing->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->BillClosing) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_BillClosing" class="view_ip_admission_bill_summary_BillClosing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->BillClosing->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->BillClosing->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->BillClosing->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->BillClosingDate->Visible) { // BillClosingDate ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->BillClosingDate) == "") { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_admission_bill_summary_list->BillClosingDate->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_BillClosingDate" class="view_ip_admission_bill_summary_BillClosingDate"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->BillClosingDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_admission_bill_summary_list->BillClosingDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->BillClosingDate) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_BillClosingDate" class="view_ip_admission_bill_summary_BillClosingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->BillClosingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->BillClosingDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->BillClosingDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_admission_bill_summary_list->BillNumber->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_BillNumber" class="view_ip_admission_bill_summary_BillNumber"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_admission_bill_summary_list->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->BillNumber) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_BillNumber" class="view_ip_admission_bill_summary_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->BillNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->BillNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->ClosingAmount->Visible) { // ClosingAmount ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->ClosingAmount) == "") { ?>
		<th data-name="ClosingAmount" class="<?php echo $view_ip_admission_bill_summary_list->ClosingAmount->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_ClosingAmount" class="view_ip_admission_bill_summary_ClosingAmount"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->ClosingAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingAmount" class="<?php echo $view_ip_admission_bill_summary_list->ClosingAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->ClosingAmount) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_ClosingAmount" class="view_ip_admission_bill_summary_ClosingAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->ClosingAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->ClosingAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->ClosingAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->ClosingType->Visible) { // ClosingType ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->ClosingType) == "") { ?>
		<th data-name="ClosingType" class="<?php echo $view_ip_admission_bill_summary_list->ClosingType->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_ClosingType" class="view_ip_admission_bill_summary_ClosingType"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->ClosingType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingType" class="<?php echo $view_ip_admission_bill_summary_list->ClosingType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->ClosingType) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_ClosingType" class="view_ip_admission_bill_summary_ClosingType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->ClosingType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->ClosingType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->ClosingType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->BillAmount->Visible) { // BillAmount ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->BillAmount) == "") { ?>
		<th data-name="BillAmount" class="<?php echo $view_ip_admission_bill_summary_list->BillAmount->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_BillAmount" class="view_ip_admission_bill_summary_BillAmount"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->BillAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillAmount" class="<?php echo $view_ip_admission_bill_summary_list->BillAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->BillAmount) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_BillAmount" class="view_ip_admission_bill_summary_BillAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->BillAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->BillAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->BillAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->billclosedBy->Visible) { // billclosedBy ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->billclosedBy) == "") { ?>
		<th data-name="billclosedBy" class="<?php echo $view_ip_admission_bill_summary_list->billclosedBy->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_billclosedBy" class="view_ip_admission_bill_summary_billclosedBy"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->billclosedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="billclosedBy" class="<?php echo $view_ip_admission_bill_summary_list->billclosedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->billclosedBy) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_billclosedBy" class="view_ip_admission_bill_summary_billclosedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->billclosedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->billclosedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->billclosedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->bllcloseByDate) == "") { ?>
		<th data-name="bllcloseByDate" class="<?php echo $view_ip_admission_bill_summary_list->bllcloseByDate->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_bllcloseByDate" class="view_ip_admission_bill_summary_bllcloseByDate"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->bllcloseByDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bllcloseByDate" class="<?php echo $view_ip_admission_bill_summary_list->bllcloseByDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->bllcloseByDate) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_bllcloseByDate" class="view_ip_admission_bill_summary_bllcloseByDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->bllcloseByDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->bllcloseByDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->bllcloseByDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_admission_bill_summary_list->ReportHeader->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_ReportHeader" class="view_ip_admission_bill_summary_ReportHeader"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->ReportHeader->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_admission_bill_summary_list->ReportHeader->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->ReportHeader) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_ReportHeader" class="view_ip_admission_bill_summary_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->ReportHeader->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->ReportHeader->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->ReportHeader->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->Procedure->Visible) { // Procedure ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->Procedure) == "") { ?>
		<th data-name="Procedure" class="<?php echo $view_ip_admission_bill_summary_list->Procedure->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_Procedure" class="view_ip_admission_bill_summary_Procedure"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->Procedure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Procedure" class="<?php echo $view_ip_admission_bill_summary_list->Procedure->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->Procedure) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_Procedure" class="view_ip_admission_bill_summary_Procedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->Procedure->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->Procedure->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->Procedure->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->Consultant->Visible) { // Consultant ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $view_ip_admission_bill_summary_list->Consultant->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_Consultant" class="view_ip_admission_bill_summary_Consultant"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->Consultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $view_ip_admission_bill_summary_list->Consultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->Consultant) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_Consultant" class="view_ip_admission_bill_summary_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->Consultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->Consultant->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->Consultant->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->Anesthetist->Visible) { // Anesthetist ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->Anesthetist) == "") { ?>
		<th data-name="Anesthetist" class="<?php echo $view_ip_admission_bill_summary_list->Anesthetist->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_Anesthetist" class="view_ip_admission_bill_summary_Anesthetist"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->Anesthetist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anesthetist" class="<?php echo $view_ip_admission_bill_summary_list->Anesthetist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->Anesthetist) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_Anesthetist" class="view_ip_admission_bill_summary_Anesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->Anesthetist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->Anesthetist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->Anesthetist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->Amound->Visible) { // Amound ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->Amound) == "") { ?>
		<th data-name="Amound" class="<?php echo $view_ip_admission_bill_summary_list->Amound->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_Amound" class="view_ip_admission_bill_summary_Amound"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->Amound->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amound" class="<?php echo $view_ip_admission_bill_summary_list->Amound->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->Amound) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_Amound" class="view_ip_admission_bill_summary_Amound">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->Amound->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->Amound->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->Amound->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->patient_id->Visible) { // patient_id ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $view_ip_admission_bill_summary_list->patient_id->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_patient_id" class="view_ip_admission_bill_summary_patient_id"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $view_ip_admission_bill_summary_list->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->patient_id) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_patient_id" class="view_ip_admission_bill_summary_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->patient_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->patient_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->Package->Visible) { // Package ?>
	<?php if ($view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->Package) == "") { ?>
		<th data-name="Package" class="<?php echo $view_ip_admission_bill_summary_list->Package->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_Package" class="view_ip_admission_bill_summary_Package"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->Package->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Package" class="<?php echo $view_ip_admission_bill_summary_list->Package->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_bill_summary_list->SortUrl($view_ip_admission_bill_summary_list->Package) ?>', 1);"><div id="elh_view_ip_admission_bill_summary_Package" class="view_ip_admission_bill_summary_Package">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary_list->Package->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary_list->Package->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary_list->Package->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ip_admission_bill_summary_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ip_admission_bill_summary_list->ExportAll && $view_ip_admission_bill_summary_list->isExport()) {
	$view_ip_admission_bill_summary_list->StopRecord = $view_ip_admission_bill_summary_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_ip_admission_bill_summary_list->TotalRecords > $view_ip_admission_bill_summary_list->StartRecord + $view_ip_admission_bill_summary_list->DisplayRecords - 1)
		$view_ip_admission_bill_summary_list->StopRecord = $view_ip_admission_bill_summary_list->StartRecord + $view_ip_admission_bill_summary_list->DisplayRecords - 1;
	else
		$view_ip_admission_bill_summary_list->StopRecord = $view_ip_admission_bill_summary_list->TotalRecords;
}
$view_ip_admission_bill_summary_list->RecordCount = $view_ip_admission_bill_summary_list->StartRecord - 1;
if ($view_ip_admission_bill_summary_list->Recordset && !$view_ip_admission_bill_summary_list->Recordset->EOF) {
	$view_ip_admission_bill_summary_list->Recordset->moveFirst();
	$selectLimit = $view_ip_admission_bill_summary_list->UseSelectLimit;
	if (!$selectLimit && $view_ip_admission_bill_summary_list->StartRecord > 1)
		$view_ip_admission_bill_summary_list->Recordset->move($view_ip_admission_bill_summary_list->StartRecord - 1);
} elseif (!$view_ip_admission_bill_summary->AllowAddDeleteRow && $view_ip_admission_bill_summary_list->StopRecord == 0) {
	$view_ip_admission_bill_summary_list->StopRecord = $view_ip_admission_bill_summary->GridAddRowCount;
}

// Initialize aggregate
$view_ip_admission_bill_summary->RowType = ROWTYPE_AGGREGATEINIT;
$view_ip_admission_bill_summary->resetAttributes();
$view_ip_admission_bill_summary_list->renderRow();
while ($view_ip_admission_bill_summary_list->RecordCount < $view_ip_admission_bill_summary_list->StopRecord) {
	$view_ip_admission_bill_summary_list->RecordCount++;
	if ($view_ip_admission_bill_summary_list->RecordCount >= $view_ip_admission_bill_summary_list->StartRecord) {
		$view_ip_admission_bill_summary_list->RowCount++;

		// Set up key count
		$view_ip_admission_bill_summary_list->KeyCount = $view_ip_admission_bill_summary_list->RowIndex;

		// Init row class and style
		$view_ip_admission_bill_summary->resetAttributes();
		$view_ip_admission_bill_summary->CssClass = "";
		if ($view_ip_admission_bill_summary_list->isGridAdd()) {
		} else {
			$view_ip_admission_bill_summary_list->loadRowValues($view_ip_admission_bill_summary_list->Recordset); // Load row values
		}
		$view_ip_admission_bill_summary->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ip_admission_bill_summary->RowAttrs->merge(["data-rowindex" => $view_ip_admission_bill_summary_list->RowCount, "id" => "r" . $view_ip_admission_bill_summary_list->RowCount . "_view_ip_admission_bill_summary", "data-rowtype" => $view_ip_admission_bill_summary->RowType]);

		// Render row
		$view_ip_admission_bill_summary_list->renderRow();

		// Render list options
		$view_ip_admission_bill_summary_list->renderListOptions();
?>
	<tr <?php echo $view_ip_admission_bill_summary->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_admission_bill_summary_list->ListOptions->render("body", "left", $view_ip_admission_bill_summary_list->RowCount);
?>
	<?php if ($view_ip_admission_bill_summary_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_ip_admission_bill_summary_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_id">
<span<?php echo $view_ip_admission_bill_summary_list->id->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->mrnNo->Visible) { // mrnNo ?>
		<td data-name="mrnNo" <?php echo $view_ip_admission_bill_summary_list->mrnNo->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_mrnNo">
<span<?php echo $view_ip_admission_bill_summary_list->mrnNo->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->mrnNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_ip_admission_bill_summary_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_PatientID">
<span<?php echo $view_ip_admission_bill_summary_list->PatientID->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->patient_name->Visible) { // patient_name ?>
		<td data-name="patient_name" <?php echo $view_ip_admission_bill_summary_list->patient_name->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_patient_name">
<span<?php echo $view_ip_admission_bill_summary_list->patient_name->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->patient_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->mobileno->Visible) { // mobileno ?>
		<td data-name="mobileno" <?php echo $view_ip_admission_bill_summary_list->mobileno->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_mobileno">
<span<?php echo $view_ip_admission_bill_summary_list->mobileno->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->mobileno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->gender->Visible) { // gender ?>
		<td data-name="gender" <?php echo $view_ip_admission_bill_summary_list->gender->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_gender">
<span<?php echo $view_ip_admission_bill_summary_list->gender->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->physician_id->Visible) { // physician_id ?>
		<td data-name="physician_id" <?php echo $view_ip_admission_bill_summary_list->physician_id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_physician_id">
<span<?php echo $view_ip_admission_bill_summary_list->physician_id->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->physician_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<td data-name="typeRegsisteration" <?php echo $view_ip_admission_bill_summary_list->typeRegsisteration->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_typeRegsisteration">
<span<?php echo $view_ip_admission_bill_summary_list->typeRegsisteration->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->typeRegsisteration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->PaymentCategory->Visible) { // PaymentCategory ?>
		<td data-name="PaymentCategory" <?php echo $view_ip_admission_bill_summary_list->PaymentCategory->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_PaymentCategory">
<span<?php echo $view_ip_admission_bill_summary_list->PaymentCategory->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->PaymentCategory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->admission_consultant_id->Visible) { // admission_consultant_id ?>
		<td data-name="admission_consultant_id" <?php echo $view_ip_admission_bill_summary_list->admission_consultant_id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_admission_consultant_id">
<span<?php echo $view_ip_admission_bill_summary_list->admission_consultant_id->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->admission_consultant_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->leading_consultant_id->Visible) { // leading_consultant_id ?>
		<td data-name="leading_consultant_id" <?php echo $view_ip_admission_bill_summary_list->leading_consultant_id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_leading_consultant_id">
<span<?php echo $view_ip_admission_bill_summary_list->leading_consultant_id->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->leading_consultant_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->admission_date->Visible) { // admission_date ?>
		<td data-name="admission_date" <?php echo $view_ip_admission_bill_summary_list->admission_date->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_admission_date">
<span<?php echo $view_ip_admission_bill_summary_list->admission_date->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->admission_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->release_date->Visible) { // release_date ?>
		<td data-name="release_date" <?php echo $view_ip_admission_bill_summary_list->release_date->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_release_date">
<span<?php echo $view_ip_admission_bill_summary_list->release_date->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->release_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus" <?php echo $view_ip_admission_bill_summary_list->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_PaymentStatus">
<span<?php echo $view_ip_admission_bill_summary_list->PaymentStatus->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->PaymentStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $view_ip_admission_bill_summary_list->status->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_status">
<span<?php echo $view_ip_admission_bill_summary_list->status->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_ip_admission_bill_summary_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_createdby">
<span<?php echo $view_ip_admission_bill_summary_list->createdby->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_ip_admission_bill_summary_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_createddatetime">
<span<?php echo $view_ip_admission_bill_summary_list->createddatetime->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_ip_admission_bill_summary_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_modifiedby">
<span<?php echo $view_ip_admission_bill_summary_list->modifiedby->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_ip_admission_bill_summary_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_modifieddatetime">
<span<?php echo $view_ip_admission_bill_summary_list->modifieddatetime->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_ip_admission_bill_summary_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_HospID">
<span<?php echo $view_ip_admission_bill_summary_list->HospID->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr" <?php echo $view_ip_admission_bill_summary_list->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_ReferedByDr">
<span<?php echo $view_ip_admission_bill_summary_list->ReferedByDr->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->ReferedByDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname" <?php echo $view_ip_admission_bill_summary_list->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_ReferClinicname">
<span<?php echo $view_ip_admission_bill_summary_list->ReferClinicname->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->ReferClinicname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity" <?php echo $view_ip_admission_bill_summary_list->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_ReferCity">
<span<?php echo $view_ip_admission_bill_summary_list->ReferCity->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->ReferCity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo" <?php echo $view_ip_admission_bill_summary_list->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_ReferMobileNo">
<span<?php echo $view_ip_admission_bill_summary_list->ReferMobileNo->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant" <?php echo $view_ip_admission_bill_summary_list->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_ReferA4TreatingConsultant">
<span<?php echo $view_ip_admission_bill_summary_list->ReferA4TreatingConsultant->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td data-name="PurposreReferredfor" <?php echo $view_ip_admission_bill_summary_list->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_PurposreReferredfor">
<span<?php echo $view_ip_admission_bill_summary_list->PurposreReferredfor->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->BillClosing->Visible) { // BillClosing ?>
		<td data-name="BillClosing" <?php echo $view_ip_admission_bill_summary_list->BillClosing->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_BillClosing">
<span<?php echo $view_ip_admission_bill_summary_list->BillClosing->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->BillClosing->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->BillClosingDate->Visible) { // BillClosingDate ?>
		<td data-name="BillClosingDate" <?php echo $view_ip_admission_bill_summary_list->BillClosingDate->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_BillClosingDate">
<span<?php echo $view_ip_admission_bill_summary_list->BillClosingDate->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->BillClosingDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" <?php echo $view_ip_admission_bill_summary_list->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_BillNumber">
<span<?php echo $view_ip_admission_bill_summary_list->BillNumber->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->ClosingAmount->Visible) { // ClosingAmount ?>
		<td data-name="ClosingAmount" <?php echo $view_ip_admission_bill_summary_list->ClosingAmount->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_ClosingAmount">
<span<?php echo $view_ip_admission_bill_summary_list->ClosingAmount->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->ClosingAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->ClosingType->Visible) { // ClosingType ?>
		<td data-name="ClosingType" <?php echo $view_ip_admission_bill_summary_list->ClosingType->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_ClosingType">
<span<?php echo $view_ip_admission_bill_summary_list->ClosingType->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->ClosingType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->BillAmount->Visible) { // BillAmount ?>
		<td data-name="BillAmount" <?php echo $view_ip_admission_bill_summary_list->BillAmount->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_BillAmount">
<span<?php echo $view_ip_admission_bill_summary_list->BillAmount->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->BillAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->billclosedBy->Visible) { // billclosedBy ?>
		<td data-name="billclosedBy" <?php echo $view_ip_admission_bill_summary_list->billclosedBy->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_billclosedBy">
<span<?php echo $view_ip_admission_bill_summary_list->billclosedBy->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->billclosedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->bllcloseByDate->Visible) { // bllcloseByDate ?>
		<td data-name="bllcloseByDate" <?php echo $view_ip_admission_bill_summary_list->bllcloseByDate->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_bllcloseByDate">
<span<?php echo $view_ip_admission_bill_summary_list->bllcloseByDate->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->bllcloseByDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader" <?php echo $view_ip_admission_bill_summary_list->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_ReportHeader">
<span<?php echo $view_ip_admission_bill_summary_list->ReportHeader->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->ReportHeader->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->Procedure->Visible) { // Procedure ?>
		<td data-name="Procedure" <?php echo $view_ip_admission_bill_summary_list->Procedure->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_Procedure">
<span<?php echo $view_ip_admission_bill_summary_list->Procedure->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->Procedure->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant" <?php echo $view_ip_admission_bill_summary_list->Consultant->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_Consultant">
<span<?php echo $view_ip_admission_bill_summary_list->Consultant->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->Consultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->Anesthetist->Visible) { // Anesthetist ?>
		<td data-name="Anesthetist" <?php echo $view_ip_admission_bill_summary_list->Anesthetist->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_Anesthetist">
<span<?php echo $view_ip_admission_bill_summary_list->Anesthetist->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->Anesthetist->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->Amound->Visible) { // Amound ?>
		<td data-name="Amound" <?php echo $view_ip_admission_bill_summary_list->Amound->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_Amound">
<span<?php echo $view_ip_admission_bill_summary_list->Amound->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->Amound->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id" <?php echo $view_ip_admission_bill_summary_list->patient_id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_patient_id">
<span<?php echo $view_ip_admission_bill_summary_list->patient_id->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->Package->Visible) { // Package ?>
		<td data-name="Package" <?php echo $view_ip_admission_bill_summary_list->Package->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCount ?>_view_ip_admission_bill_summary_Package">
<span<?php echo $view_ip_admission_bill_summary_list->Package->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_list->Package->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ip_admission_bill_summary_list->ListOptions->render("body", "right", $view_ip_admission_bill_summary_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_ip_admission_bill_summary_list->isGridAdd())
		$view_ip_admission_bill_summary_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_ip_admission_bill_summary->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ip_admission_bill_summary_list->Recordset)
	$view_ip_admission_bill_summary_list->Recordset->Close();
?>
<?php if (!$view_ip_admission_bill_summary_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ip_admission_bill_summary_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_ip_admission_bill_summary_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_bill_summary_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->TotalRecords == 0 && !$view_ip_admission_bill_summary->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_bill_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_ip_admission_bill_summary_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_ip_admission_bill_summary_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_ip_admission_bill_summary->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_ip_admission_bill_summary",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_ip_admission_bill_summary_list->terminate();
?>