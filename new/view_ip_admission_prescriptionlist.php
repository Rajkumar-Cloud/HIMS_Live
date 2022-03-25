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
$view_ip_admission_prescription_list = new view_ip_admission_prescription_list();

// Run the page
$view_ip_admission_prescription_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_admission_prescription_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_ip_admission_prescription_list->isExport()) { ?>
<script>
var fview_ip_admission_prescriptionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_ip_admission_prescriptionlist = currentForm = new ew.Form("fview_ip_admission_prescriptionlist", "list");
	fview_ip_admission_prescriptionlist.formKeyCountName = '<?php echo $view_ip_admission_prescription_list->FormKeyCountName ?>';
	loadjs.done("fview_ip_admission_prescriptionlist");
});
var fview_ip_admission_prescriptionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_ip_admission_prescriptionlistsrch = currentSearchForm = new ew.Form("fview_ip_admission_prescriptionlistsrch");

	// Dynamic selection lists
	// Filters

	fview_ip_admission_prescriptionlistsrch.filterList = <?php echo $view_ip_admission_prescription_list->getFilterList() ?>;
	loadjs.done("fview_ip_admission_prescriptionlistsrch");
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
<?php if (!$view_ip_admission_prescription_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ip_admission_prescription_list->TotalRecords > 0 && $view_ip_admission_prescription_list->ExportOptions->visible()) { ?>
<?php $view_ip_admission_prescription_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->ImportOptions->visible()) { ?>
<?php $view_ip_admission_prescription_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->SearchOptions->visible()) { ?>
<?php $view_ip_admission_prescription_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->FilterOptions->visible()) { ?>
<?php $view_ip_admission_prescription_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ip_admission_prescription_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ip_admission_prescription_list->isExport() && !$view_ip_admission_prescription->CurrentAction) { ?>
<form name="fview_ip_admission_prescriptionlistsrch" id="fview_ip_admission_prescriptionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_ip_admission_prescriptionlistsrch-search-panel" class="<?php echo $view_ip_admission_prescription_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ip_admission_prescription">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_ip_admission_prescription_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_ip_admission_prescription_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_ip_admission_prescription_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ip_admission_prescription_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ip_admission_prescription_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_prescription_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_prescription_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_prescription_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_ip_admission_prescription_list->showPageHeader(); ?>
<?php
$view_ip_admission_prescription_list->showMessage();
?>
<?php if ($view_ip_admission_prescription_list->TotalRecords > 0 || $view_ip_admission_prescription->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ip_admission_prescription_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_admission_prescription">
<?php if (!$view_ip_admission_prescription_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ip_admission_prescription_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_ip_admission_prescription_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_prescription_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ip_admission_prescriptionlist" id="fview_ip_admission_prescriptionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_admission_prescription">
<div id="gmp_view_ip_admission_prescription" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_ip_admission_prescription_list->TotalRecords > 0 || $view_ip_admission_prescription_list->isGridEdit()) { ?>
<table id="tbl_view_ip_admission_prescriptionlist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ip_admission_prescription->RowType = ROWTYPE_HEADER;

// Render list options
$view_ip_admission_prescription_list->renderListOptions();

// Render list options (header, left)
$view_ip_admission_prescription_list->ListOptions->render("header", "left", "", "block", $view_ip_admission_prescription->TableVar, "view_ip_admission_prescriptionlist");
?>
<?php if ($view_ip_admission_prescription_list->id->Visible) { // id ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ip_admission_prescription_list->id->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_id" class="view_ip_admission_prescription_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_id" type="text/html"><?php echo $view_ip_admission_prescription_list->id->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ip_admission_prescription_list->id->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_id" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->id) ?>', 1);"><div id="elh_view_ip_admission_prescription_id" class="view_ip_admission_prescription_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->mrnNo->Visible) { // mrnNo ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->mrnNo) == "") { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_admission_prescription_list->mrnNo->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_mrnNo" class="view_ip_admission_prescription_mrnNo"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_mrnNo" type="text/html"><?php echo $view_ip_admission_prescription_list->mrnNo->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_admission_prescription_list->mrnNo->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_mrnNo" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->mrnNo) ?>', 1);"><div id="elh_view_ip_admission_prescription_mrnNo" class="view_ip_admission_prescription_mrnNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->mrnNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->mrnNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->mrnNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->patient_id->Visible) { // patient_id ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $view_ip_admission_prescription_list->patient_id->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_patient_id" class="view_ip_admission_prescription_patient_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_patient_id" type="text/html"><?php echo $view_ip_admission_prescription_list->patient_id->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $view_ip_admission_prescription_list->patient_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_patient_id" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->patient_id) ?>', 1);"><div id="elh_view_ip_admission_prescription_patient_id" class="view_ip_admission_prescription_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->patient_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->patient_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->patient_name->Visible) { // patient_name ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->patient_name) == "") { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_admission_prescription_list->patient_name->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_patient_name" class="view_ip_admission_prescription_patient_name"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_patient_name" type="text/html"><?php echo $view_ip_admission_prescription_list->patient_name->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_admission_prescription_list->patient_name->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_patient_name" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->patient_name) ?>', 1);"><div id="elh_view_ip_admission_prescription_patient_name" class="view_ip_admission_prescription_patient_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->patient_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->patient_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->patient_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->gender->Visible) { // gender ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $view_ip_admission_prescription_list->gender->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_gender" class="view_ip_admission_prescription_gender"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_gender" type="text/html"><?php echo $view_ip_admission_prescription_list->gender->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $view_ip_admission_prescription_list->gender->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_gender" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->gender) ?>', 1);"><div id="elh_view_ip_admission_prescription_gender" class="view_ip_admission_prescription_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->age->Visible) { // age ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->age) == "") { ?>
		<th data-name="age" class="<?php echo $view_ip_admission_prescription_list->age->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_age" class="view_ip_admission_prescription_age"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_age" type="text/html"><?php echo $view_ip_admission_prescription_list->age->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="age" class="<?php echo $view_ip_admission_prescription_list->age->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_age" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->age) ?>', 1);"><div id="elh_view_ip_admission_prescription_age" class="view_ip_admission_prescription_age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->physician_id->Visible) { // physician_id ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->physician_id) == "") { ?>
		<th data-name="physician_id" class="<?php echo $view_ip_admission_prescription_list->physician_id->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_physician_id" class="view_ip_admission_prescription_physician_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_physician_id" type="text/html"><?php echo $view_ip_admission_prescription_list->physician_id->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="physician_id" class="<?php echo $view_ip_admission_prescription_list->physician_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_physician_id" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->physician_id) ?>', 1);"><div id="elh_view_ip_admission_prescription_physician_id" class="view_ip_admission_prescription_physician_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->physician_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->physician_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->physician_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->typeRegsisteration) == "") { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_ip_admission_prescription_list->typeRegsisteration->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_typeRegsisteration" class="view_ip_admission_prescription_typeRegsisteration"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_typeRegsisteration" type="text/html"><?php echo $view_ip_admission_prescription_list->typeRegsisteration->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_ip_admission_prescription_list->typeRegsisteration->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_typeRegsisteration" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->typeRegsisteration) ?>', 1);"><div id="elh_view_ip_admission_prescription_typeRegsisteration" class="view_ip_admission_prescription_typeRegsisteration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->typeRegsisteration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->typeRegsisteration->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->typeRegsisteration->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->PaymentCategory->Visible) { // PaymentCategory ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->PaymentCategory) == "") { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_ip_admission_prescription_list->PaymentCategory->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_PaymentCategory" class="view_ip_admission_prescription_PaymentCategory"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_PaymentCategory" type="text/html"><?php echo $view_ip_admission_prescription_list->PaymentCategory->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_ip_admission_prescription_list->PaymentCategory->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_PaymentCategory" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->PaymentCategory) ?>', 1);"><div id="elh_view_ip_admission_prescription_PaymentCategory" class="view_ip_admission_prescription_PaymentCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->PaymentCategory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->PaymentCategory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->PaymentCategory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->admission_consultant_id) == "") { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_ip_admission_prescription_list->admission_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_admission_consultant_id" class="view_ip_admission_prescription_admission_consultant_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_admission_consultant_id" type="text/html"><?php echo $view_ip_admission_prescription_list->admission_consultant_id->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_ip_admission_prescription_list->admission_consultant_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_admission_consultant_id" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->admission_consultant_id) ?>', 1);"><div id="elh_view_ip_admission_prescription_admission_consultant_id" class="view_ip_admission_prescription_admission_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->admission_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->admission_consultant_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->admission_consultant_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->leading_consultant_id) == "") { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_ip_admission_prescription_list->leading_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_leading_consultant_id" class="view_ip_admission_prescription_leading_consultant_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_leading_consultant_id" type="text/html"><?php echo $view_ip_admission_prescription_list->leading_consultant_id->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_ip_admission_prescription_list->leading_consultant_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_leading_consultant_id" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->leading_consultant_id) ?>', 1);"><div id="elh_view_ip_admission_prescription_leading_consultant_id" class="view_ip_admission_prescription_leading_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->leading_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->leading_consultant_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->leading_consultant_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->admission_date->Visible) { // admission_date ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->admission_date) == "") { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_admission_prescription_list->admission_date->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_admission_date" class="view_ip_admission_prescription_admission_date"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_admission_date" type="text/html"><?php echo $view_ip_admission_prescription_list->admission_date->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_admission_prescription_list->admission_date->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_admission_date" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->admission_date) ?>', 1);"><div id="elh_view_ip_admission_prescription_admission_date" class="view_ip_admission_prescription_admission_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->admission_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->admission_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->admission_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->release_date->Visible) { // release_date ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->release_date) == "") { ?>
		<th data-name="release_date" class="<?php echo $view_ip_admission_prescription_list->release_date->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_release_date" class="view_ip_admission_prescription_release_date"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_release_date" type="text/html"><?php echo $view_ip_admission_prescription_list->release_date->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="release_date" class="<?php echo $view_ip_admission_prescription_list->release_date->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_release_date" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->release_date) ?>', 1);"><div id="elh_view_ip_admission_prescription_release_date" class="view_ip_admission_prescription_release_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->release_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->release_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->release_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_admission_prescription_list->PaymentStatus->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_PaymentStatus" class="view_ip_admission_prescription_PaymentStatus"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_PaymentStatus" type="text/html"><?php echo $view_ip_admission_prescription_list->PaymentStatus->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_admission_prescription_list->PaymentStatus->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_PaymentStatus" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->PaymentStatus) ?>', 1);"><div id="elh_view_ip_admission_prescription_PaymentStatus" class="view_ip_admission_prescription_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->PaymentStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->PaymentStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->status->Visible) { // status ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_ip_admission_prescription_list->status->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_status" class="view_ip_admission_prescription_status"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_status" type="text/html"><?php echo $view_ip_admission_prescription_list->status->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_ip_admission_prescription_list->status->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_status" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->status) ?>', 1);"><div id="elh_view_ip_admission_prescription_status" class="view_ip_admission_prescription_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->createdby->Visible) { // createdby ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_ip_admission_prescription_list->createdby->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_createdby" class="view_ip_admission_prescription_createdby"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_createdby" type="text/html"><?php echo $view_ip_admission_prescription_list->createdby->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_ip_admission_prescription_list->createdby->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_createdby" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->createdby) ?>', 1);"><div id="elh_view_ip_admission_prescription_createdby" class="view_ip_admission_prescription_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_admission_prescription_list->createddatetime->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_createddatetime" class="view_ip_admission_prescription_createddatetime"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_createddatetime" type="text/html"><?php echo $view_ip_admission_prescription_list->createddatetime->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_admission_prescription_list->createddatetime->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_createddatetime" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->createddatetime) ?>', 1);"><div id="elh_view_ip_admission_prescription_createddatetime" class="view_ip_admission_prescription_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_admission_prescription_list->modifiedby->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_modifiedby" class="view_ip_admission_prescription_modifiedby"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_modifiedby" type="text/html"><?php echo $view_ip_admission_prescription_list->modifiedby->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_admission_prescription_list->modifiedby->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_modifiedby" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->modifiedby) ?>', 1);"><div id="elh_view_ip_admission_prescription_modifiedby" class="view_ip_admission_prescription_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_admission_prescription_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_modifieddatetime" class="view_ip_admission_prescription_modifieddatetime"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_modifieddatetime" type="text/html"><?php echo $view_ip_admission_prescription_list->modifieddatetime->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_admission_prescription_list->modifieddatetime->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_modifieddatetime" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->modifieddatetime) ?>', 1);"><div id="elh_view_ip_admission_prescription_modifieddatetime" class="view_ip_admission_prescription_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_admission_prescription_list->PatientID->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_PatientID" class="view_ip_admission_prescription_PatientID"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_PatientID" type="text/html"><?php echo $view_ip_admission_prescription_list->PatientID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_admission_prescription_list->PatientID->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_PatientID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->PatientID) ?>', 1);"><div id="elh_view_ip_admission_prescription_PatientID" class="view_ip_admission_prescription_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->HospID->Visible) { // HospID ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ip_admission_prescription_list->HospID->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_HospID" class="view_ip_admission_prescription_HospID"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_HospID" type="text/html"><?php echo $view_ip_admission_prescription_list->HospID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ip_admission_prescription_list->HospID->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_HospID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->HospID) ?>', 1);"><div id="elh_view_ip_admission_prescription_HospID" class="view_ip_admission_prescription_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_admission_prescription_list->ReferedByDr->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ReferedByDr" class="view_ip_admission_prescription_ReferedByDr"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_ReferedByDr" type="text/html"><?php echo $view_ip_admission_prescription_list->ReferedByDr->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_admission_prescription_list->ReferedByDr->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_ReferedByDr" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->ReferedByDr) ?>', 1);"><div id="elh_view_ip_admission_prescription_ReferedByDr" class="view_ip_admission_prescription_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->ReferedByDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->ReferedByDr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->ReferedByDr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ip_admission_prescription_list->ReferClinicname->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ReferClinicname" class="view_ip_admission_prescription_ReferClinicname"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_ReferClinicname" type="text/html"><?php echo $view_ip_admission_prescription_list->ReferClinicname->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ip_admission_prescription_list->ReferClinicname->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_ReferClinicname" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->ReferClinicname) ?>', 1);"><div id="elh_view_ip_admission_prescription_ReferClinicname" class="view_ip_admission_prescription_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->ReferClinicname->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->ReferClinicname->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->ReferCity->Visible) { // ReferCity ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $view_ip_admission_prescription_list->ReferCity->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ReferCity" class="view_ip_admission_prescription_ReferCity"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_ReferCity" type="text/html"><?php echo $view_ip_admission_prescription_list->ReferCity->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $view_ip_admission_prescription_list->ReferCity->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_ReferCity" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->ReferCity) ?>', 1);"><div id="elh_view_ip_admission_prescription_ReferCity" class="view_ip_admission_prescription_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->ReferCity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->ReferCity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ip_admission_prescription_list->ReferMobileNo->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ReferMobileNo" class="view_ip_admission_prescription_ReferMobileNo"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_ReferMobileNo" type="text/html"><?php echo $view_ip_admission_prescription_list->ReferMobileNo->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ip_admission_prescription_list->ReferMobileNo->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_ReferMobileNo" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->ReferMobileNo) ?>', 1);"><div id="elh_view_ip_admission_prescription_ReferMobileNo" class="view_ip_admission_prescription_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->ReferMobileNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->ReferMobileNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ip_admission_prescription_list->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ReferA4TreatingConsultant" class="view_ip_admission_prescription_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_ReferA4TreatingConsultant" type="text/html"><?php echo $view_ip_admission_prescription_list->ReferA4TreatingConsultant->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ip_admission_prescription_list->ReferA4TreatingConsultant->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_ReferA4TreatingConsultant" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->ReferA4TreatingConsultant) ?>', 1);"><div id="elh_view_ip_admission_prescription_ReferA4TreatingConsultant" class="view_ip_admission_prescription_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->ReferA4TreatingConsultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->PurposreReferredfor) == "") { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ip_admission_prescription_list->PurposreReferredfor->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_PurposreReferredfor" class="view_ip_admission_prescription_PurposreReferredfor"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_PurposreReferredfor" type="text/html"><?php echo $view_ip_admission_prescription_list->PurposreReferredfor->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ip_admission_prescription_list->PurposreReferredfor->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_PurposreReferredfor" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->PurposreReferredfor) ?>', 1);"><div id="elh_view_ip_admission_prescription_PurposreReferredfor" class="view_ip_admission_prescription_PurposreReferredfor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->PurposreReferredfor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->PurposreReferredfor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->PurposreReferredfor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->mobileno->Visible) { // mobileno ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->mobileno) == "") { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_admission_prescription_list->mobileno->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_mobileno" class="view_ip_admission_prescription_mobileno"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_mobileno" type="text/html"><?php echo $view_ip_admission_prescription_list->mobileno->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_admission_prescription_list->mobileno->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_mobileno" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->mobileno) ?>', 1);"><div id="elh_view_ip_admission_prescription_mobileno" class="view_ip_admission_prescription_mobileno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->mobileno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->mobileno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->mobileno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->BillClosing->Visible) { // BillClosing ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->BillClosing) == "") { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_admission_prescription_list->BillClosing->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_BillClosing" class="view_ip_admission_prescription_BillClosing"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_BillClosing" type="text/html"><?php echo $view_ip_admission_prescription_list->BillClosing->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_admission_prescription_list->BillClosing->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_BillClosing" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->BillClosing) ?>', 1);"><div id="elh_view_ip_admission_prescription_BillClosing" class="view_ip_admission_prescription_BillClosing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->BillClosing->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->BillClosing->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->BillClosing->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->BillClosingDate->Visible) { // BillClosingDate ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->BillClosingDate) == "") { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_admission_prescription_list->BillClosingDate->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_BillClosingDate" class="view_ip_admission_prescription_BillClosingDate"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_BillClosingDate" type="text/html"><?php echo $view_ip_admission_prescription_list->BillClosingDate->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_admission_prescription_list->BillClosingDate->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_BillClosingDate" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->BillClosingDate) ?>', 1);"><div id="elh_view_ip_admission_prescription_BillClosingDate" class="view_ip_admission_prescription_BillClosingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->BillClosingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->BillClosingDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->BillClosingDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_admission_prescription_list->BillNumber->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_BillNumber" class="view_ip_admission_prescription_BillNumber"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_BillNumber" type="text/html"><?php echo $view_ip_admission_prescription_list->BillNumber->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_admission_prescription_list->BillNumber->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_BillNumber" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->BillNumber) ?>', 1);"><div id="elh_view_ip_admission_prescription_BillNumber" class="view_ip_admission_prescription_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->BillNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->BillNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->ClosingAmount->Visible) { // ClosingAmount ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->ClosingAmount) == "") { ?>
		<th data-name="ClosingAmount" class="<?php echo $view_ip_admission_prescription_list->ClosingAmount->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ClosingAmount" class="view_ip_admission_prescription_ClosingAmount"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_ClosingAmount" type="text/html"><?php echo $view_ip_admission_prescription_list->ClosingAmount->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingAmount" class="<?php echo $view_ip_admission_prescription_list->ClosingAmount->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_ClosingAmount" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->ClosingAmount) ?>', 1);"><div id="elh_view_ip_admission_prescription_ClosingAmount" class="view_ip_admission_prescription_ClosingAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->ClosingAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->ClosingAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->ClosingAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->ClosingType->Visible) { // ClosingType ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->ClosingType) == "") { ?>
		<th data-name="ClosingType" class="<?php echo $view_ip_admission_prescription_list->ClosingType->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ClosingType" class="view_ip_admission_prescription_ClosingType"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_ClosingType" type="text/html"><?php echo $view_ip_admission_prescription_list->ClosingType->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingType" class="<?php echo $view_ip_admission_prescription_list->ClosingType->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_ClosingType" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->ClosingType) ?>', 1);"><div id="elh_view_ip_admission_prescription_ClosingType" class="view_ip_admission_prescription_ClosingType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->ClosingType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->ClosingType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->ClosingType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->BillAmount->Visible) { // BillAmount ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->BillAmount) == "") { ?>
		<th data-name="BillAmount" class="<?php echo $view_ip_admission_prescription_list->BillAmount->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_BillAmount" class="view_ip_admission_prescription_BillAmount"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_BillAmount" type="text/html"><?php echo $view_ip_admission_prescription_list->BillAmount->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillAmount" class="<?php echo $view_ip_admission_prescription_list->BillAmount->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_BillAmount" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->BillAmount) ?>', 1);"><div id="elh_view_ip_admission_prescription_BillAmount" class="view_ip_admission_prescription_BillAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->BillAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->BillAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->BillAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->billclosedBy->Visible) { // billclosedBy ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->billclosedBy) == "") { ?>
		<th data-name="billclosedBy" class="<?php echo $view_ip_admission_prescription_list->billclosedBy->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_billclosedBy" class="view_ip_admission_prescription_billclosedBy"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_billclosedBy" type="text/html"><?php echo $view_ip_admission_prescription_list->billclosedBy->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="billclosedBy" class="<?php echo $view_ip_admission_prescription_list->billclosedBy->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_billclosedBy" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->billclosedBy) ?>', 1);"><div id="elh_view_ip_admission_prescription_billclosedBy" class="view_ip_admission_prescription_billclosedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->billclosedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->billclosedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->billclosedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->bllcloseByDate) == "") { ?>
		<th data-name="bllcloseByDate" class="<?php echo $view_ip_admission_prescription_list->bllcloseByDate->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_bllcloseByDate" class="view_ip_admission_prescription_bllcloseByDate"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_bllcloseByDate" type="text/html"><?php echo $view_ip_admission_prescription_list->bllcloseByDate->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="bllcloseByDate" class="<?php echo $view_ip_admission_prescription_list->bllcloseByDate->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_bllcloseByDate" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->bllcloseByDate) ?>', 1);"><div id="elh_view_ip_admission_prescription_bllcloseByDate" class="view_ip_admission_prescription_bllcloseByDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->bllcloseByDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->bllcloseByDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->bllcloseByDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_admission_prescription_list->ReportHeader->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ReportHeader" class="view_ip_admission_prescription_ReportHeader"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_ReportHeader" type="text/html"><?php echo $view_ip_admission_prescription_list->ReportHeader->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_admission_prescription_list->ReportHeader->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_ReportHeader" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->ReportHeader) ?>', 1);"><div id="elh_view_ip_admission_prescription_ReportHeader" class="view_ip_admission_prescription_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->ReportHeader->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->ReportHeader->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->ReportHeader->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->Procedure->Visible) { // Procedure ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->Procedure) == "") { ?>
		<th data-name="Procedure" class="<?php echo $view_ip_admission_prescription_list->Procedure->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_Procedure" class="view_ip_admission_prescription_Procedure"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_Procedure" type="text/html"><?php echo $view_ip_admission_prescription_list->Procedure->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Procedure" class="<?php echo $view_ip_admission_prescription_list->Procedure->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_Procedure" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->Procedure) ?>', 1);"><div id="elh_view_ip_admission_prescription_Procedure" class="view_ip_admission_prescription_Procedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->Procedure->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->Procedure->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->Procedure->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->Consultant->Visible) { // Consultant ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $view_ip_admission_prescription_list->Consultant->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_Consultant" class="view_ip_admission_prescription_Consultant"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_Consultant" type="text/html"><?php echo $view_ip_admission_prescription_list->Consultant->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $view_ip_admission_prescription_list->Consultant->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_Consultant" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->Consultant) ?>', 1);"><div id="elh_view_ip_admission_prescription_Consultant" class="view_ip_admission_prescription_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->Consultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->Consultant->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->Consultant->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->Anesthetist->Visible) { // Anesthetist ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->Anesthetist) == "") { ?>
		<th data-name="Anesthetist" class="<?php echo $view_ip_admission_prescription_list->Anesthetist->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_Anesthetist" class="view_ip_admission_prescription_Anesthetist"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_Anesthetist" type="text/html"><?php echo $view_ip_admission_prescription_list->Anesthetist->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Anesthetist" class="<?php echo $view_ip_admission_prescription_list->Anesthetist->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_Anesthetist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->Anesthetist) ?>', 1);"><div id="elh_view_ip_admission_prescription_Anesthetist" class="view_ip_admission_prescription_Anesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->Anesthetist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->Anesthetist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->Anesthetist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->Amound->Visible) { // Amound ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->Amound) == "") { ?>
		<th data-name="Amound" class="<?php echo $view_ip_admission_prescription_list->Amound->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_Amound" class="view_ip_admission_prescription_Amound"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_Amound" type="text/html"><?php echo $view_ip_admission_prescription_list->Amound->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Amound" class="<?php echo $view_ip_admission_prescription_list->Amound->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_Amound" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->Amound) ?>', 1);"><div id="elh_view_ip_admission_prescription_Amound" class="view_ip_admission_prescription_Amound">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->Amound->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->Amound->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->Amound->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->Package->Visible) { // Package ?>
	<?php if ($view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->Package) == "") { ?>
		<th data-name="Package" class="<?php echo $view_ip_admission_prescription_list->Package->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_Package" class="view_ip_admission_prescription_Package"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_Package" type="text/html"><?php echo $view_ip_admission_prescription_list->Package->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Package" class="<?php echo $view_ip_admission_prescription_list->Package->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_Package" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_admission_prescription_list->SortUrl($view_ip_admission_prescription_list->Package) ?>', 1);"><div id="elh_view_ip_admission_prescription_Package" class="view_ip_admission_prescription_Package">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription_list->Package->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription_list->Package->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription_list->Package->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ip_admission_prescription_list->ListOptions->render("header", "right", "", "block", $view_ip_admission_prescription->TableVar, "view_ip_admission_prescriptionlist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ip_admission_prescription_list->ExportAll && $view_ip_admission_prescription_list->isExport()) {
	$view_ip_admission_prescription_list->StopRecord = $view_ip_admission_prescription_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_ip_admission_prescription_list->TotalRecords > $view_ip_admission_prescription_list->StartRecord + $view_ip_admission_prescription_list->DisplayRecords - 1)
		$view_ip_admission_prescription_list->StopRecord = $view_ip_admission_prescription_list->StartRecord + $view_ip_admission_prescription_list->DisplayRecords - 1;
	else
		$view_ip_admission_prescription_list->StopRecord = $view_ip_admission_prescription_list->TotalRecords;
}
$view_ip_admission_prescription_list->RecordCount = $view_ip_admission_prescription_list->StartRecord - 1;
if ($view_ip_admission_prescription_list->Recordset && !$view_ip_admission_prescription_list->Recordset->EOF) {
	$view_ip_admission_prescription_list->Recordset->moveFirst();
	$selectLimit = $view_ip_admission_prescription_list->UseSelectLimit;
	if (!$selectLimit && $view_ip_admission_prescription_list->StartRecord > 1)
		$view_ip_admission_prescription_list->Recordset->move($view_ip_admission_prescription_list->StartRecord - 1);
} elseif (!$view_ip_admission_prescription->AllowAddDeleteRow && $view_ip_admission_prescription_list->StopRecord == 0) {
	$view_ip_admission_prescription_list->StopRecord = $view_ip_admission_prescription->GridAddRowCount;
}

// Initialize aggregate
$view_ip_admission_prescription->RowType = ROWTYPE_AGGREGATEINIT;
$view_ip_admission_prescription->resetAttributes();
$view_ip_admission_prescription_list->renderRow();
while ($view_ip_admission_prescription_list->RecordCount < $view_ip_admission_prescription_list->StopRecord) {
	$view_ip_admission_prescription_list->RecordCount++;
	if ($view_ip_admission_prescription_list->RecordCount >= $view_ip_admission_prescription_list->StartRecord) {
		$view_ip_admission_prescription_list->RowCount++;

		// Set up key count
		$view_ip_admission_prescription_list->KeyCount = $view_ip_admission_prescription_list->RowIndex;

		// Init row class and style
		$view_ip_admission_prescription->resetAttributes();
		$view_ip_admission_prescription->CssClass = "";
		if ($view_ip_admission_prescription_list->isGridAdd()) {
		} else {
			$view_ip_admission_prescription_list->loadRowValues($view_ip_admission_prescription_list->Recordset); // Load row values
		}
		$view_ip_admission_prescription->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ip_admission_prescription->RowAttrs->merge(["data-rowindex" => $view_ip_admission_prescription_list->RowCount, "id" => "r" . $view_ip_admission_prescription_list->RowCount . "_view_ip_admission_prescription", "data-rowtype" => $view_ip_admission_prescription->RowType]);

		// Render row
		$view_ip_admission_prescription_list->renderRow();

		// Render list options
		$view_ip_admission_prescription_list->renderListOptions();

		// Save row and cell attributes
		$view_ip_admission_prescription_list->Attrs[$view_ip_admission_prescription_list->RowCount] = ["row_attrs" => $view_ip_admission_prescription->rowAttributes(), "cell_attrs" => []];
		$view_ip_admission_prescription_list->Attrs[$view_ip_admission_prescription_list->RowCount]["cell_attrs"] = $view_ip_admission_prescription->fieldCellAttributes();
?>
	<tr <?php echo $view_ip_admission_prescription->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_admission_prescription_list->ListOptions->render("body", "left", $view_ip_admission_prescription_list->RowCount, "block", $view_ip_admission_prescription->TableVar, "view_ip_admission_prescriptionlist");
?>
	<?php if ($view_ip_admission_prescription_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_ip_admission_prescription_list->id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_id" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_id">
<span<?php echo $view_ip_admission_prescription_list->id->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->id->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->mrnNo->Visible) { // mrnNo ?>
		<td data-name="mrnNo" <?php echo $view_ip_admission_prescription_list->mrnNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_mrnNo" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_mrnNo">
<span<?php echo $view_ip_admission_prescription_list->mrnNo->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->mrnNo->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id" <?php echo $view_ip_admission_prescription_list->patient_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_patient_id" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_patient_id">
<span<?php echo $view_ip_admission_prescription_list->patient_id->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->patient_id->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->patient_name->Visible) { // patient_name ?>
		<td data-name="patient_name" <?php echo $view_ip_admission_prescription_list->patient_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_patient_name" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_patient_name">
<span<?php echo $view_ip_admission_prescription_list->patient_name->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->patient_name->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->gender->Visible) { // gender ?>
		<td data-name="gender" <?php echo $view_ip_admission_prescription_list->gender->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_gender" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_gender">
<span<?php echo $view_ip_admission_prescription_list->gender->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->gender->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->age->Visible) { // age ?>
		<td data-name="age" <?php echo $view_ip_admission_prescription_list->age->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_age" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_age">
<span<?php echo $view_ip_admission_prescription_list->age->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->age->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->physician_id->Visible) { // physician_id ?>
		<td data-name="physician_id" <?php echo $view_ip_admission_prescription_list->physician_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_physician_id" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_physician_id">
<span<?php echo $view_ip_admission_prescription_list->physician_id->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->physician_id->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<td data-name="typeRegsisteration" <?php echo $view_ip_admission_prescription_list->typeRegsisteration->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_typeRegsisteration" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_typeRegsisteration">
<span<?php echo $view_ip_admission_prescription_list->typeRegsisteration->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->typeRegsisteration->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->PaymentCategory->Visible) { // PaymentCategory ?>
		<td data-name="PaymentCategory" <?php echo $view_ip_admission_prescription_list->PaymentCategory->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_PaymentCategory" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_PaymentCategory">
<span<?php echo $view_ip_admission_prescription_list->PaymentCategory->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->PaymentCategory->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->admission_consultant_id->Visible) { // admission_consultant_id ?>
		<td data-name="admission_consultant_id" <?php echo $view_ip_admission_prescription_list->admission_consultant_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_admission_consultant_id" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_admission_consultant_id">
<span<?php echo $view_ip_admission_prescription_list->admission_consultant_id->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->admission_consultant_id->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->leading_consultant_id->Visible) { // leading_consultant_id ?>
		<td data-name="leading_consultant_id" <?php echo $view_ip_admission_prescription_list->leading_consultant_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_leading_consultant_id" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_leading_consultant_id">
<span<?php echo $view_ip_admission_prescription_list->leading_consultant_id->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->leading_consultant_id->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->admission_date->Visible) { // admission_date ?>
		<td data-name="admission_date" <?php echo $view_ip_admission_prescription_list->admission_date->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_admission_date" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_admission_date">
<span<?php echo $view_ip_admission_prescription_list->admission_date->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->admission_date->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->release_date->Visible) { // release_date ?>
		<td data-name="release_date" <?php echo $view_ip_admission_prescription_list->release_date->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_release_date" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_release_date">
<span<?php echo $view_ip_admission_prescription_list->release_date->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->release_date->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus" <?php echo $view_ip_admission_prescription_list->PaymentStatus->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_PaymentStatus" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_PaymentStatus">
<span<?php echo $view_ip_admission_prescription_list->PaymentStatus->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->PaymentStatus->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $view_ip_admission_prescription_list->status->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_status" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_status">
<span<?php echo $view_ip_admission_prescription_list->status->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->status->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_ip_admission_prescription_list->createdby->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_createdby" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_createdby">
<span<?php echo $view_ip_admission_prescription_list->createdby->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->createdby->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_ip_admission_prescription_list->createddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_createddatetime" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_createddatetime">
<span<?php echo $view_ip_admission_prescription_list->createddatetime->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_ip_admission_prescription_list->modifiedby->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_modifiedby" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_modifiedby">
<span<?php echo $view_ip_admission_prescription_list->modifiedby->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_ip_admission_prescription_list->modifieddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_modifieddatetime" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_modifieddatetime">
<span<?php echo $view_ip_admission_prescription_list->modifieddatetime->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_ip_admission_prescription_list->PatientID->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_PatientID" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_PatientID">
<span<?php echo $view_ip_admission_prescription_list->PatientID->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->PatientID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_ip_admission_prescription_list->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_HospID" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_HospID">
<span<?php echo $view_ip_admission_prescription_list->HospID->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->HospID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr" <?php echo $view_ip_admission_prescription_list->ReferedByDr->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_ReferedByDr" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_ReferedByDr">
<span<?php echo $view_ip_admission_prescription_list->ReferedByDr->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->ReferedByDr->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname" <?php echo $view_ip_admission_prescription_list->ReferClinicname->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_ReferClinicname" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_ReferClinicname">
<span<?php echo $view_ip_admission_prescription_list->ReferClinicname->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->ReferClinicname->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity" <?php echo $view_ip_admission_prescription_list->ReferCity->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_ReferCity" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_ReferCity">
<span<?php echo $view_ip_admission_prescription_list->ReferCity->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->ReferCity->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo" <?php echo $view_ip_admission_prescription_list->ReferMobileNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_ReferMobileNo" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_ReferMobileNo">
<span<?php echo $view_ip_admission_prescription_list->ReferMobileNo->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->ReferMobileNo->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant" <?php echo $view_ip_admission_prescription_list->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_ReferA4TreatingConsultant" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_ReferA4TreatingConsultant">
<span<?php echo $view_ip_admission_prescription_list->ReferA4TreatingConsultant->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->ReferA4TreatingConsultant->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td data-name="PurposreReferredfor" <?php echo $view_ip_admission_prescription_list->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_PurposreReferredfor" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_PurposreReferredfor">
<span<?php echo $view_ip_admission_prescription_list->PurposreReferredfor->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->PurposreReferredfor->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->mobileno->Visible) { // mobileno ?>
		<td data-name="mobileno" <?php echo $view_ip_admission_prescription_list->mobileno->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_mobileno" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_mobileno">
<span<?php echo $view_ip_admission_prescription_list->mobileno->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->mobileno->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->BillClosing->Visible) { // BillClosing ?>
		<td data-name="BillClosing" <?php echo $view_ip_admission_prescription_list->BillClosing->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_BillClosing" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_BillClosing">
<span<?php echo $view_ip_admission_prescription_list->BillClosing->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->BillClosing->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->BillClosingDate->Visible) { // BillClosingDate ?>
		<td data-name="BillClosingDate" <?php echo $view_ip_admission_prescription_list->BillClosingDate->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_BillClosingDate" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_BillClosingDate">
<span<?php echo $view_ip_admission_prescription_list->BillClosingDate->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->BillClosingDate->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" <?php echo $view_ip_admission_prescription_list->BillNumber->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_BillNumber" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_BillNumber">
<span<?php echo $view_ip_admission_prescription_list->BillNumber->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->BillNumber->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->ClosingAmount->Visible) { // ClosingAmount ?>
		<td data-name="ClosingAmount" <?php echo $view_ip_admission_prescription_list->ClosingAmount->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_ClosingAmount" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_ClosingAmount">
<span<?php echo $view_ip_admission_prescription_list->ClosingAmount->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->ClosingAmount->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->ClosingType->Visible) { // ClosingType ?>
		<td data-name="ClosingType" <?php echo $view_ip_admission_prescription_list->ClosingType->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_ClosingType" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_ClosingType">
<span<?php echo $view_ip_admission_prescription_list->ClosingType->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->ClosingType->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->BillAmount->Visible) { // BillAmount ?>
		<td data-name="BillAmount" <?php echo $view_ip_admission_prescription_list->BillAmount->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_BillAmount" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_BillAmount">
<span<?php echo $view_ip_admission_prescription_list->BillAmount->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->BillAmount->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->billclosedBy->Visible) { // billclosedBy ?>
		<td data-name="billclosedBy" <?php echo $view_ip_admission_prescription_list->billclosedBy->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_billclosedBy" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_billclosedBy">
<span<?php echo $view_ip_admission_prescription_list->billclosedBy->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->billclosedBy->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->bllcloseByDate->Visible) { // bllcloseByDate ?>
		<td data-name="bllcloseByDate" <?php echo $view_ip_admission_prescription_list->bllcloseByDate->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_bllcloseByDate" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_bllcloseByDate">
<span<?php echo $view_ip_admission_prescription_list->bllcloseByDate->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->bllcloseByDate->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader" <?php echo $view_ip_admission_prescription_list->ReportHeader->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_ReportHeader" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_ReportHeader">
<span<?php echo $view_ip_admission_prescription_list->ReportHeader->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->ReportHeader->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->Procedure->Visible) { // Procedure ?>
		<td data-name="Procedure" <?php echo $view_ip_admission_prescription_list->Procedure->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_Procedure" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_Procedure">
<span<?php echo $view_ip_admission_prescription_list->Procedure->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->Procedure->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant" <?php echo $view_ip_admission_prescription_list->Consultant->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_Consultant" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_Consultant">
<span<?php echo $view_ip_admission_prescription_list->Consultant->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->Consultant->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->Anesthetist->Visible) { // Anesthetist ?>
		<td data-name="Anesthetist" <?php echo $view_ip_admission_prescription_list->Anesthetist->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_Anesthetist" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_Anesthetist">
<span<?php echo $view_ip_admission_prescription_list->Anesthetist->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->Anesthetist->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->Amound->Visible) { // Amound ?>
		<td data-name="Amound" <?php echo $view_ip_admission_prescription_list->Amound->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_Amound" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_Amound">
<span<?php echo $view_ip_admission_prescription_list->Amound->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->Amound->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->Package->Visible) { // Package ?>
		<td data-name="Package" <?php echo $view_ip_admission_prescription_list->Package->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_Package" type="text/html"><span id="el<?php echo $view_ip_admission_prescription_list->RowCount ?>_view_ip_admission_prescription_Package">
<span<?php echo $view_ip_admission_prescription_list->Package->viewAttributes() ?>><?php echo $view_ip_admission_prescription_list->Package->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ip_admission_prescription_list->ListOptions->render("body", "right", $view_ip_admission_prescription_list->RowCount, "block", $view_ip_admission_prescription->TableVar, "view_ip_admission_prescriptionlist");
?>
	</tr>
<?php
	}
	if (!$view_ip_admission_prescription_list->isGridAdd())
		$view_ip_admission_prescription_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<div id="tpd_view_ip_admission_prescriptionlist" class="ew-custom-template"></div>
<script id="tpm_view_ip_admission_prescriptionlist" type="text/html">
<div id="ct_view_ip_admission_prescription_list"><?php if ($view_ip_admission_prescription_list->RowCount > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
		<tr class="ew-table-header">
		<td></td>
			<td>{{include tmpl=~getTemplate("#tpc_view_ip_admission_prescription_PatientID")/}}</td><td>{{include tmpl=~getTemplate("#tpc_view_ip_admission_prescription_patient_name")/}}</td>
			<td>{{include tmpl=~getTemplate("#tpc_view_ip_admission_prescription_mrnNo")/}}</td><td>{{include tmpl=~getTemplate("#tpc_view_ip_admission_prescription_mobileno")/}}</td>
		</tr> 
	</thead>
	<tbody> 
<?php for ($i = $view_ip_admission_prescription_list->StartRowCount; $i <= $view_ip_admission_prescription_list->RowCount; $i++) { ?>
 <tr<?php echo @$view_ip_admission_prescription_list->Attrs[$i]['row_attrs'] ?>>
<td>
<div class="btn-group btn-group-sm ew-btn-group">
<a class="btn btn-default ew-row-link ew-view" title="" data-caption="View"  href='patient_prescriptionlist.php?showmaster=ip_admission&id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_patient_id={{: ~root.rows[<?php echo $i - 1 ?>].patient_id }}&fk_mrnNo={{: ~root.rows[<?php echo $i - 1 ?>].mrnNo }}' data-original-title="View">
<i data-phrase="ViewLink" class="icon-view ew-icon" data-caption="View"></i>
</a>
<a class="btn btn-default ew-row-link ew-edit" title="" data-caption="Edit" href='patient_prescriptionlist.php?action=gridadd&showmaster=ip_admission&id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_patient_id={{: ~root.rows[<?php echo $i - 1 ?>].patient_id }}&fk_mrnNo={{: ~root.rows[<?php echo $i - 1 ?>].mrnNo }}'  data-original-title="Edit">
<i data-phrase="EditLink" class="icon-edit ew-icon" data-caption="Edit"></i>
</a>
</div>
</td>
	 <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_ip_admission_prescription_PatientID")/}}</td><td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_ip_admission_prescription_patient_name")/}}</td>
	 	 <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_ip_admission_prescription_mrnNo")/}}</td><td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_ip_admission_prescription_mobileno")/}}</td>
 </tr> 

<?php } ?>
</tbody></table>
<?php } ?>
</div>
</script>

</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_ip_admission_prescription->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ip_admission_prescription_list->Recordset)
	$view_ip_admission_prescription_list->Recordset->Close();
?>
<?php if (!$view_ip_admission_prescription_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ip_admission_prescription_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_ip_admission_prescription_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_prescription_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ip_admission_prescription_list->TotalRecords == 0 && !$view_ip_admission_prescription->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_prescription_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_ip_admission_prescription->Rows) ?> };
	ew.applyTemplate("tpd_view_ip_admission_prescriptionlist", "tpm_view_ip_admission_prescriptionlist", "view_ip_admission_prescriptionlist", "<?php echo $view_ip_admission_prescription->CustomExport ?>", ew.templateData);
	$("#tpd_view_ip_admission_prescriptionlist th.ew-list-option-header").each(function() {
		this.rowSpan = 2;
	});
	$("#tpd_view_ip_admission_prescriptionlist td.ew-list-option-body").each(function() {
		this.rowSpan = 2;
	});
	$("script.view_ip_admission_prescriptionlist_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_ip_admission_prescription_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_ip_admission_prescription_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_ip_admission_prescription->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_ip_admission_prescription",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_ip_admission_prescription_list->terminate();
?>