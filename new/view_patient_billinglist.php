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
$view_patient_billing_list = new view_patient_billing_list();

// Run the page
$view_patient_billing_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_patient_billing_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_patient_billing_list->isExport()) { ?>
<script>
var fview_patient_billinglist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_patient_billinglist = currentForm = new ew.Form("fview_patient_billinglist", "list");
	fview_patient_billinglist.formKeyCountName = '<?php echo $view_patient_billing_list->FormKeyCountName ?>';
	loadjs.done("fview_patient_billinglist");
});
var fview_patient_billinglistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_patient_billinglistsrch = currentSearchForm = new ew.Form("fview_patient_billinglistsrch");

	// Dynamic selection lists
	// Filters

	fview_patient_billinglistsrch.filterList = <?php echo $view_patient_billing_list->getFilterList() ?>;
	loadjs.done("fview_patient_billinglistsrch");
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
<?php if (!$view_patient_billing_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_patient_billing_list->TotalRecords > 0 && $view_patient_billing_list->ExportOptions->visible()) { ?>
<?php $view_patient_billing_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_billing_list->ImportOptions->visible()) { ?>
<?php $view_patient_billing_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_billing_list->SearchOptions->visible()) { ?>
<?php $view_patient_billing_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_billing_list->FilterOptions->visible()) { ?>
<?php $view_patient_billing_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_patient_billing_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_patient_billing_list->isExport() && !$view_patient_billing->CurrentAction) { ?>
<form name="fview_patient_billinglistsrch" id="fview_patient_billinglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_patient_billinglistsrch-search-panel" class="<?php echo $view_patient_billing_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_patient_billing">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_patient_billing_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_patient_billing_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_patient_billing_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_patient_billing_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_patient_billing_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_patient_billing_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_patient_billing_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_patient_billing_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_patient_billing_list->showPageHeader(); ?>
<?php
$view_patient_billing_list->showMessage();
?>
<?php if ($view_patient_billing_list->TotalRecords > 0 || $view_patient_billing->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_patient_billing_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_patient_billing">
<?php if (!$view_patient_billing_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_patient_billing_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_patient_billing_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_patient_billing_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_patient_billinglist" id="fview_patient_billinglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_patient_billing">
<div id="gmp_view_patient_billing" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_patient_billing_list->TotalRecords > 0 || $view_patient_billing_list->isGridEdit()) { ?>
<table id="tbl_view_patient_billinglist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_patient_billing->RowType = ROWTYPE_HEADER;

// Render list options
$view_patient_billing_list->renderListOptions();

// Render list options (header, left)
$view_patient_billing_list->ListOptions->render("header", "left");
?>
<?php if ($view_patient_billing_list->id->Visible) { // id ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_patient_billing_list->id->headerCellClass() ?>"><div id="elh_view_patient_billing_id" class="view_patient_billing_id"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_patient_billing_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->id) ?>', 1);"><div id="elh_view_patient_billing_id" class="view_patient_billing_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->mrnno->Visible) { // mrnno ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_patient_billing_list->mrnno->headerCellClass() ?>"><div id="elh_view_patient_billing_mrnno" class="view_patient_billing_mrnno"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_patient_billing_list->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->mrnno) ?>', 1);"><div id="elh_view_patient_billing_mrnno" class="view_patient_billing_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->Gender->Visible) { // Gender ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_patient_billing_list->Gender->headerCellClass() ?>"><div id="elh_view_patient_billing_Gender" class="view_patient_billing_Gender"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_patient_billing_list->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->Gender) ?>', 1);"><div id="elh_view_patient_billing_Gender" class="view_patient_billing_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->Age->Visible) { // Age ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_patient_billing_list->Age->headerCellClass() ?>"><div id="elh_view_patient_billing_Age" class="view_patient_billing_Age"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_patient_billing_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->Age) ?>', 1);"><div id="elh_view_patient_billing_Age" class="view_patient_billing_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->createdby->Visible) { // createdby ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_patient_billing_list->createdby->headerCellClass() ?>"><div id="elh_view_patient_billing_createdby" class="view_patient_billing_createdby"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_patient_billing_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->createdby) ?>', 1);"><div id="elh_view_patient_billing_createdby" class="view_patient_billing_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_patient_billing_list->createddatetime->headerCellClass() ?>"><div id="elh_view_patient_billing_createddatetime" class="view_patient_billing_createddatetime"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_patient_billing_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->createddatetime) ?>', 1);"><div id="elh_view_patient_billing_createddatetime" class="view_patient_billing_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_patient_billing_list->modifiedby->headerCellClass() ?>"><div id="elh_view_patient_billing_modifiedby" class="view_patient_billing_modifiedby"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_patient_billing_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->modifiedby) ?>', 1);"><div id="elh_view_patient_billing_modifiedby" class="view_patient_billing_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_patient_billing_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_patient_billing_modifieddatetime" class="view_patient_billing_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_patient_billing_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->modifieddatetime) ?>', 1);"><div id="elh_view_patient_billing_modifieddatetime" class="view_patient_billing_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->PatientId->Visible) { // PatientId ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_patient_billing_list->PatientId->headerCellClass() ?>"><div id="elh_view_patient_billing_PatientId" class="view_patient_billing_PatientId"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_patient_billing_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->PatientId) ?>', 1);"><div id="elh_view_patient_billing_PatientId" class="view_patient_billing_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->HospID->Visible) { // HospID ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_patient_billing_list->HospID->headerCellClass() ?>"><div id="elh_view_patient_billing_HospID" class="view_patient_billing_HospID"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_patient_billing_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->HospID) ?>', 1);"><div id="elh_view_patient_billing_HospID" class="view_patient_billing_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->Reception->Visible) { // Reception ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_patient_billing_list->Reception->headerCellClass() ?>"><div id="elh_view_patient_billing_Reception" class="view_patient_billing_Reception"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_patient_billing_list->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->Reception) ?>', 1);"><div id="elh_view_patient_billing_Reception" class="view_patient_billing_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_patient_billing_list->PatientName->headerCellClass() ?>"><div id="elh_view_patient_billing_PatientName" class="view_patient_billing_PatientName"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_patient_billing_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->PatientName) ?>', 1);"><div id="elh_view_patient_billing_PatientName" class="view_patient_billing_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->Mobile->Visible) { // Mobile ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_patient_billing_list->Mobile->headerCellClass() ?>"><div id="elh_view_patient_billing_Mobile" class="view_patient_billing_Mobile"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_patient_billing_list->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->Mobile) ?>', 1);"><div id="elh_view_patient_billing_Mobile" class="view_patient_billing_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->IP_OP->Visible) { // IP_OP ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->IP_OP) == "") { ?>
		<th data-name="IP_OP" class="<?php echo $view_patient_billing_list->IP_OP->headerCellClass() ?>"><div id="elh_view_patient_billing_IP_OP" class="view_patient_billing_IP_OP"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->IP_OP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_OP" class="<?php echo $view_patient_billing_list->IP_OP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->IP_OP) ?>', 1);"><div id="elh_view_patient_billing_IP_OP" class="view_patient_billing_IP_OP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->IP_OP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->IP_OP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->IP_OP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->Doctor->Visible) { // Doctor ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_patient_billing_list->Doctor->headerCellClass() ?>"><div id="elh_view_patient_billing_Doctor" class="view_patient_billing_Doctor"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_patient_billing_list->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->Doctor) ?>', 1);"><div id="elh_view_patient_billing_Doctor" class="view_patient_billing_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->Doctor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->Doctor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $view_patient_billing_list->voucher_type->headerCellClass() ?>"><div id="elh_view_patient_billing_voucher_type" class="view_patient_billing_voucher_type"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $view_patient_billing_list->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->voucher_type) ?>', 1);"><div id="elh_view_patient_billing_voucher_type" class="view_patient_billing_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->voucher_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->voucher_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->Details->Visible) { // Details ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $view_patient_billing_list->Details->headerCellClass() ?>"><div id="elh_view_patient_billing_Details" class="view_patient_billing_Details"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $view_patient_billing_list->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->Details) ?>', 1);"><div id="elh_view_patient_billing_Details" class="view_patient_billing_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->Details->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->Details->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_patient_billing_list->ModeofPayment->headerCellClass() ?>"><div id="elh_view_patient_billing_ModeofPayment" class="view_patient_billing_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_patient_billing_list->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->ModeofPayment) ?>', 1);"><div id="elh_view_patient_billing_ModeofPayment" class="view_patient_billing_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->ModeofPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->ModeofPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->Amount->Visible) { // Amount ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_patient_billing_list->Amount->headerCellClass() ?>"><div id="elh_view_patient_billing_Amount" class="view_patient_billing_Amount"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_patient_billing_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->Amount) ?>', 1);"><div id="elh_view_patient_billing_Amount" class="view_patient_billing_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $view_patient_billing_list->AnyDues->headerCellClass() ?>"><div id="elh_view_patient_billing_AnyDues" class="view_patient_billing_AnyDues"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $view_patient_billing_list->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->AnyDues) ?>', 1);"><div id="elh_view_patient_billing_AnyDues" class="view_patient_billing_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->AnyDues->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->AnyDues->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->RealizationAmount->Visible) { // RealizationAmount ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->RealizationAmount) == "") { ?>
		<th data-name="RealizationAmount" class="<?php echo $view_patient_billing_list->RealizationAmount->headerCellClass() ?>"><div id="elh_view_patient_billing_RealizationAmount" class="view_patient_billing_RealizationAmount"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->RealizationAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationAmount" class="<?php echo $view_patient_billing_list->RealizationAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->RealizationAmount) ?>', 1);"><div id="elh_view_patient_billing_RealizationAmount" class="view_patient_billing_RealizationAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->RealizationAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->RealizationAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->RealizationAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->RealizationStatus->Visible) { // RealizationStatus ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->RealizationStatus) == "") { ?>
		<th data-name="RealizationStatus" class="<?php echo $view_patient_billing_list->RealizationStatus->headerCellClass() ?>"><div id="elh_view_patient_billing_RealizationStatus" class="view_patient_billing_RealizationStatus"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->RealizationStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationStatus" class="<?php echo $view_patient_billing_list->RealizationStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->RealizationStatus) ?>', 1);"><div id="elh_view_patient_billing_RealizationStatus" class="view_patient_billing_RealizationStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->RealizationStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->RealizationStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->RealizationStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->RealizationRemarks) == "") { ?>
		<th data-name="RealizationRemarks" class="<?php echo $view_patient_billing_list->RealizationRemarks->headerCellClass() ?>"><div id="elh_view_patient_billing_RealizationRemarks" class="view_patient_billing_RealizationRemarks"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->RealizationRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationRemarks" class="<?php echo $view_patient_billing_list->RealizationRemarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->RealizationRemarks) ?>', 1);"><div id="elh_view_patient_billing_RealizationRemarks" class="view_patient_billing_RealizationRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->RealizationRemarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->RealizationRemarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->RealizationRemarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->RealizationBatchNo) == "") { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $view_patient_billing_list->RealizationBatchNo->headerCellClass() ?>"><div id="elh_view_patient_billing_RealizationBatchNo" class="view_patient_billing_RealizationBatchNo"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->RealizationBatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $view_patient_billing_list->RealizationBatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->RealizationBatchNo) ?>', 1);"><div id="elh_view_patient_billing_RealizationBatchNo" class="view_patient_billing_RealizationBatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->RealizationBatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->RealizationBatchNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->RealizationBatchNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->RealizationDate->Visible) { // RealizationDate ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->RealizationDate) == "") { ?>
		<th data-name="RealizationDate" class="<?php echo $view_patient_billing_list->RealizationDate->headerCellClass() ?>"><div id="elh_view_patient_billing_RealizationDate" class="view_patient_billing_RealizationDate"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->RealizationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationDate" class="<?php echo $view_patient_billing_list->RealizationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->RealizationDate) ?>', 1);"><div id="elh_view_patient_billing_RealizationDate" class="view_patient_billing_RealizationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->RealizationDate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->RealizationDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->RealizationDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_patient_billing_list->RIDNO->headerCellClass() ?>"><div id="elh_view_patient_billing_RIDNO" class="view_patient_billing_RIDNO"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_patient_billing_list->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->RIDNO) ?>', 1);"><div id="elh_view_patient_billing_RIDNO" class="view_patient_billing_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->TidNo->Visible) { // TidNo ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $view_patient_billing_list->TidNo->headerCellClass() ?>"><div id="elh_view_patient_billing_TidNo" class="view_patient_billing_TidNo"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $view_patient_billing_list->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->TidNo) ?>', 1);"><div id="elh_view_patient_billing_TidNo" class="view_patient_billing_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->CId->Visible) { // CId ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $view_patient_billing_list->CId->headerCellClass() ?>"><div id="elh_view_patient_billing_CId" class="view_patient_billing_CId"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $view_patient_billing_list->CId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->CId) ?>', 1);"><div id="elh_view_patient_billing_CId" class="view_patient_billing_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->CId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->CId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_patient_billing_list->PartnerName->headerCellClass() ?>"><div id="elh_view_patient_billing_PartnerName" class="view_patient_billing_PartnerName"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_patient_billing_list->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->PartnerName) ?>', 1);"><div id="elh_view_patient_billing_PartnerName" class="view_patient_billing_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->PartnerName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->PartnerName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->PayerType->Visible) { // PayerType ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->PayerType) == "") { ?>
		<th data-name="PayerType" class="<?php echo $view_patient_billing_list->PayerType->headerCellClass() ?>"><div id="elh_view_patient_billing_PayerType" class="view_patient_billing_PayerType"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->PayerType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PayerType" class="<?php echo $view_patient_billing_list->PayerType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->PayerType) ?>', 1);"><div id="elh_view_patient_billing_PayerType" class="view_patient_billing_PayerType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->PayerType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->PayerType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->PayerType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->Dob->Visible) { // Dob ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->Dob) == "") { ?>
		<th data-name="Dob" class="<?php echo $view_patient_billing_list->Dob->headerCellClass() ?>"><div id="elh_view_patient_billing_Dob" class="view_patient_billing_Dob"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->Dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dob" class="<?php echo $view_patient_billing_list->Dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->Dob) ?>', 1);"><div id="elh_view_patient_billing_Dob" class="view_patient_billing_Dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->Dob->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->Dob->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->Dob->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->Currency->Visible) { // Currency ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->Currency) == "") { ?>
		<th data-name="Currency" class="<?php echo $view_patient_billing_list->Currency->headerCellClass() ?>"><div id="elh_view_patient_billing_Currency" class="view_patient_billing_Currency"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->Currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Currency" class="<?php echo $view_patient_billing_list->Currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->Currency) ?>', 1);"><div id="elh_view_patient_billing_Currency" class="view_patient_billing_Currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->Currency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->Currency->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->Currency->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->DiscountRemarks) == "") { ?>
		<th data-name="DiscountRemarks" class="<?php echo $view_patient_billing_list->DiscountRemarks->headerCellClass() ?>"><div id="elh_view_patient_billing_DiscountRemarks" class="view_patient_billing_DiscountRemarks"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->DiscountRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountRemarks" class="<?php echo $view_patient_billing_list->DiscountRemarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->DiscountRemarks) ?>', 1);"><div id="elh_view_patient_billing_DiscountRemarks" class="view_patient_billing_DiscountRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->DiscountRemarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->DiscountRemarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->DiscountRemarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->Remarks->Visible) { // Remarks ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $view_patient_billing_list->Remarks->headerCellClass() ?>"><div id="elh_view_patient_billing_Remarks" class="view_patient_billing_Remarks"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $view_patient_billing_list->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->Remarks) ?>', 1);"><div id="elh_view_patient_billing_Remarks" class="view_patient_billing_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->Remarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->Remarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing_list->PatId->Visible) { // PatId ?>
	<?php if ($view_patient_billing_list->SortUrl($view_patient_billing_list->PatId) == "") { ?>
		<th data-name="PatId" class="<?php echo $view_patient_billing_list->PatId->headerCellClass() ?>"><div id="elh_view_patient_billing_PatId" class="view_patient_billing_PatId"><div class="ew-table-header-caption"><?php echo $view_patient_billing_list->PatId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatId" class="<?php echo $view_patient_billing_list->PatId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_billing_list->SortUrl($view_patient_billing_list->PatId) ?>', 1);"><div id="elh_view_patient_billing_PatId" class="view_patient_billing_PatId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing_list->PatId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing_list->PatId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_billing_list->PatId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_patient_billing_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_patient_billing_list->ExportAll && $view_patient_billing_list->isExport()) {
	$view_patient_billing_list->StopRecord = $view_patient_billing_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_patient_billing_list->TotalRecords > $view_patient_billing_list->StartRecord + $view_patient_billing_list->DisplayRecords - 1)
		$view_patient_billing_list->StopRecord = $view_patient_billing_list->StartRecord + $view_patient_billing_list->DisplayRecords - 1;
	else
		$view_patient_billing_list->StopRecord = $view_patient_billing_list->TotalRecords;
}
$view_patient_billing_list->RecordCount = $view_patient_billing_list->StartRecord - 1;
if ($view_patient_billing_list->Recordset && !$view_patient_billing_list->Recordset->EOF) {
	$view_patient_billing_list->Recordset->moveFirst();
	$selectLimit = $view_patient_billing_list->UseSelectLimit;
	if (!$selectLimit && $view_patient_billing_list->StartRecord > 1)
		$view_patient_billing_list->Recordset->move($view_patient_billing_list->StartRecord - 1);
} elseif (!$view_patient_billing->AllowAddDeleteRow && $view_patient_billing_list->StopRecord == 0) {
	$view_patient_billing_list->StopRecord = $view_patient_billing->GridAddRowCount;
}

// Initialize aggregate
$view_patient_billing->RowType = ROWTYPE_AGGREGATEINIT;
$view_patient_billing->resetAttributes();
$view_patient_billing_list->renderRow();
while ($view_patient_billing_list->RecordCount < $view_patient_billing_list->StopRecord) {
	$view_patient_billing_list->RecordCount++;
	if ($view_patient_billing_list->RecordCount >= $view_patient_billing_list->StartRecord) {
		$view_patient_billing_list->RowCount++;

		// Set up key count
		$view_patient_billing_list->KeyCount = $view_patient_billing_list->RowIndex;

		// Init row class and style
		$view_patient_billing->resetAttributes();
		$view_patient_billing->CssClass = "";
		if ($view_patient_billing_list->isGridAdd()) {
		} else {
			$view_patient_billing_list->loadRowValues($view_patient_billing_list->Recordset); // Load row values
		}
		$view_patient_billing->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_patient_billing->RowAttrs->merge(["data-rowindex" => $view_patient_billing_list->RowCount, "id" => "r" . $view_patient_billing_list->RowCount . "_view_patient_billing", "data-rowtype" => $view_patient_billing->RowType]);

		// Render row
		$view_patient_billing_list->renderRow();

		// Render list options
		$view_patient_billing_list->renderListOptions();
?>
	<tr <?php echo $view_patient_billing->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_patient_billing_list->ListOptions->render("body", "left", $view_patient_billing_list->RowCount);
?>
	<?php if ($view_patient_billing_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_patient_billing_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_id">
<span<?php echo $view_patient_billing_list->id->viewAttributes() ?>><?php echo $view_patient_billing_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $view_patient_billing_list->mrnno->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_mrnno">
<span<?php echo $view_patient_billing_list->mrnno->viewAttributes() ?>><?php echo $view_patient_billing_list->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $view_patient_billing_list->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_Gender">
<span<?php echo $view_patient_billing_list->Gender->viewAttributes() ?>><?php echo $view_patient_billing_list->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $view_patient_billing_list->Age->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_Age">
<span<?php echo $view_patient_billing_list->Age->viewAttributes() ?>><?php echo $view_patient_billing_list->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_patient_billing_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_createdby">
<span<?php echo $view_patient_billing_list->createdby->viewAttributes() ?>><?php echo $view_patient_billing_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_patient_billing_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_createddatetime">
<span<?php echo $view_patient_billing_list->createddatetime->viewAttributes() ?>><?php echo $view_patient_billing_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_patient_billing_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_modifiedby">
<span<?php echo $view_patient_billing_list->modifiedby->viewAttributes() ?>><?php echo $view_patient_billing_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_patient_billing_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_modifieddatetime">
<span<?php echo $view_patient_billing_list->modifieddatetime->viewAttributes() ?>><?php echo $view_patient_billing_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $view_patient_billing_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_PatientId">
<span<?php echo $view_patient_billing_list->PatientId->viewAttributes() ?>><?php echo $view_patient_billing_list->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_patient_billing_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_HospID">
<span<?php echo $view_patient_billing_list->HospID->viewAttributes() ?>><?php echo $view_patient_billing_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $view_patient_billing_list->Reception->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_Reception">
<span<?php echo $view_patient_billing_list->Reception->viewAttributes() ?>><?php echo $view_patient_billing_list->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_patient_billing_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_PatientName">
<span<?php echo $view_patient_billing_list->PatientName->viewAttributes() ?>><?php echo $view_patient_billing_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $view_patient_billing_list->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_Mobile">
<span<?php echo $view_patient_billing_list->Mobile->viewAttributes() ?>><?php echo $view_patient_billing_list->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP" <?php echo $view_patient_billing_list->IP_OP->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_IP_OP">
<span<?php echo $view_patient_billing_list->IP_OP->viewAttributes() ?>><?php echo $view_patient_billing_list->IP_OP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor" <?php echo $view_patient_billing_list->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_Doctor">
<span<?php echo $view_patient_billing_list->Doctor->viewAttributes() ?>><?php echo $view_patient_billing_list->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type" <?php echo $view_patient_billing_list->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_voucher_type">
<span<?php echo $view_patient_billing_list->voucher_type->viewAttributes() ?>><?php echo $view_patient_billing_list->voucher_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->Details->Visible) { // Details ?>
		<td data-name="Details" <?php echo $view_patient_billing_list->Details->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_Details">
<span<?php echo $view_patient_billing_list->Details->viewAttributes() ?>><?php echo $view_patient_billing_list->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" <?php echo $view_patient_billing_list->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_ModeofPayment">
<span<?php echo $view_patient_billing_list->ModeofPayment->viewAttributes() ?>><?php echo $view_patient_billing_list->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $view_patient_billing_list->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_Amount">
<span<?php echo $view_patient_billing_list->Amount->viewAttributes() ?>><?php echo $view_patient_billing_list->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues" <?php echo $view_patient_billing_list->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_AnyDues">
<span<?php echo $view_patient_billing_list->AnyDues->viewAttributes() ?>><?php echo $view_patient_billing_list->AnyDues->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->RealizationAmount->Visible) { // RealizationAmount ?>
		<td data-name="RealizationAmount" <?php echo $view_patient_billing_list->RealizationAmount->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_RealizationAmount">
<span<?php echo $view_patient_billing_list->RealizationAmount->viewAttributes() ?>><?php echo $view_patient_billing_list->RealizationAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->RealizationStatus->Visible) { // RealizationStatus ?>
		<td data-name="RealizationStatus" <?php echo $view_patient_billing_list->RealizationStatus->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_RealizationStatus">
<span<?php echo $view_patient_billing_list->RealizationStatus->viewAttributes() ?>><?php echo $view_patient_billing_list->RealizationStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<td data-name="RealizationRemarks" <?php echo $view_patient_billing_list->RealizationRemarks->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_RealizationRemarks">
<span<?php echo $view_patient_billing_list->RealizationRemarks->viewAttributes() ?>><?php echo $view_patient_billing_list->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<td data-name="RealizationBatchNo" <?php echo $view_patient_billing_list->RealizationBatchNo->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_RealizationBatchNo">
<span<?php echo $view_patient_billing_list->RealizationBatchNo->viewAttributes() ?>><?php echo $view_patient_billing_list->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->RealizationDate->Visible) { // RealizationDate ?>
		<td data-name="RealizationDate" <?php echo $view_patient_billing_list->RealizationDate->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_RealizationDate">
<span<?php echo $view_patient_billing_list->RealizationDate->viewAttributes() ?>><?php echo $view_patient_billing_list->RealizationDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $view_patient_billing_list->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_RIDNO">
<span<?php echo $view_patient_billing_list->RIDNO->viewAttributes() ?>><?php echo $view_patient_billing_list->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $view_patient_billing_list->TidNo->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_TidNo">
<span<?php echo $view_patient_billing_list->TidNo->viewAttributes() ?>><?php echo $view_patient_billing_list->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->CId->Visible) { // CId ?>
		<td data-name="CId" <?php echo $view_patient_billing_list->CId->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_CId">
<span<?php echo $view_patient_billing_list->CId->viewAttributes() ?>><?php echo $view_patient_billing_list->CId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName" <?php echo $view_patient_billing_list->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_PartnerName">
<span<?php echo $view_patient_billing_list->PartnerName->viewAttributes() ?>><?php echo $view_patient_billing_list->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->PayerType->Visible) { // PayerType ?>
		<td data-name="PayerType" <?php echo $view_patient_billing_list->PayerType->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_PayerType">
<span<?php echo $view_patient_billing_list->PayerType->viewAttributes() ?>><?php echo $view_patient_billing_list->PayerType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->Dob->Visible) { // Dob ?>
		<td data-name="Dob" <?php echo $view_patient_billing_list->Dob->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_Dob">
<span<?php echo $view_patient_billing_list->Dob->viewAttributes() ?>><?php echo $view_patient_billing_list->Dob->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->Currency->Visible) { // Currency ?>
		<td data-name="Currency" <?php echo $view_patient_billing_list->Currency->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_Currency">
<span<?php echo $view_patient_billing_list->Currency->viewAttributes() ?>><?php echo $view_patient_billing_list->Currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->DiscountRemarks->Visible) { // DiscountRemarks ?>
		<td data-name="DiscountRemarks" <?php echo $view_patient_billing_list->DiscountRemarks->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_DiscountRemarks">
<span<?php echo $view_patient_billing_list->DiscountRemarks->viewAttributes() ?>><?php echo $view_patient_billing_list->DiscountRemarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks" <?php echo $view_patient_billing_list->Remarks->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_Remarks">
<span<?php echo $view_patient_billing_list->Remarks->viewAttributes() ?>><?php echo $view_patient_billing_list->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing_list->PatId->Visible) { // PatId ?>
		<td data-name="PatId" <?php echo $view_patient_billing_list->PatId->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCount ?>_view_patient_billing_PatId">
<span<?php echo $view_patient_billing_list->PatId->viewAttributes() ?>><?php echo $view_patient_billing_list->PatId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_patient_billing_list->ListOptions->render("body", "right", $view_patient_billing_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_patient_billing_list->isGridAdd())
		$view_patient_billing_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_patient_billing->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_patient_billing_list->Recordset)
	$view_patient_billing_list->Recordset->Close();
?>
<?php if (!$view_patient_billing_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_patient_billing_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_patient_billing_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_patient_billing_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_patient_billing_list->TotalRecords == 0 && !$view_patient_billing->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_patient_billing_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_patient_billing_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_patient_billing_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_patient_billing->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_patient_billing",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_patient_billing_list->terminate();
?>