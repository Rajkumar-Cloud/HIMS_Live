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
$view_ip_advance_list = new view_ip_advance_list();

// Run the page
$view_ip_advance_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_advance_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_ip_advance_list->isExport()) { ?>
<script>
var fview_ip_advancelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_ip_advancelist = currentForm = new ew.Form("fview_ip_advancelist", "list");
	fview_ip_advancelist.formKeyCountName = '<?php echo $view_ip_advance_list->FormKeyCountName ?>';
	loadjs.done("fview_ip_advancelist");
});
var fview_ip_advancelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_ip_advancelistsrch = currentSearchForm = new ew.Form("fview_ip_advancelistsrch");

	// Dynamic selection lists
	// Filters

	fview_ip_advancelistsrch.filterList = <?php echo $view_ip_advance_list->getFilterList() ?>;
	loadjs.done("fview_ip_advancelistsrch");
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
<?php if (!$view_ip_advance_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ip_advance_list->TotalRecords > 0 && $view_ip_advance_list->ExportOptions->visible()) { ?>
<?php $view_ip_advance_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_advance_list->ImportOptions->visible()) { ?>
<?php $view_ip_advance_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_advance_list->SearchOptions->visible()) { ?>
<?php $view_ip_advance_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_advance_list->FilterOptions->visible()) { ?>
<?php $view_ip_advance_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_ip_advance_list->isExport() || Config("EXPORT_MASTER_RECORD") && $view_ip_advance_list->isExport("print")) { ?>
<?php
if ($view_ip_advance_list->DbMasterFilter != "" && $view_ip_advance->getCurrentMasterTable() == "ip_admission") {
	if ($view_ip_advance_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$view_ip_advance_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ip_advance_list->isExport() && !$view_ip_advance->CurrentAction) { ?>
<form name="fview_ip_advancelistsrch" id="fview_ip_advancelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_ip_advancelistsrch-search-panel" class="<?php echo $view_ip_advance_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ip_advance">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_ip_advance_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_ip_advance_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_ip_advance_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ip_advance_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ip_advance_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ip_advance_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ip_advance_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ip_advance_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_ip_advance_list->showPageHeader(); ?>
<?php
$view_ip_advance_list->showMessage();
?>
<?php if ($view_ip_advance_list->TotalRecords > 0 || $view_ip_advance->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ip_advance_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_advance">
<?php if (!$view_ip_advance_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ip_advance_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_ip_advance_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_advance_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ip_advancelist" id="fview_ip_advancelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_advance">
<?php if ($view_ip_advance->getCurrentMasterTable() == "ip_admission" && $view_ip_advance->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($view_ip_advance_list->mrnno->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($view_ip_advance_list->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($view_ip_advance_list->PatID->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_ip_advance" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_ip_advance_list->TotalRecords > 0 || $view_ip_advance_list->isGridEdit()) { ?>
<table id="tbl_view_ip_advancelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ip_advance->RowType = ROWTYPE_HEADER;

// Render list options
$view_ip_advance_list->renderListOptions();

// Render list options (header, left)
$view_ip_advance_list->ListOptions->render("header", "left");
?>
<?php if ($view_ip_advance_list->id->Visible) { // id ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ip_advance_list->id->headerCellClass() ?>"><div id="elh_view_ip_advance_id" class="view_ip_advance_id"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ip_advance_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->id) ?>', 1);"><div id="elh_view_ip_advance_id" class="view_ip_advance_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->Name->Visible) { // Name ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $view_ip_advance_list->Name->headerCellClass() ?>"><div id="elh_view_ip_advance_Name" class="view_ip_advance_Name"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $view_ip_advance_list->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->Name) ?>', 1);"><div id="elh_view_ip_advance_Name" class="view_ip_advance_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->Mobile->Visible) { // Mobile ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_ip_advance_list->Mobile->headerCellClass() ?>"><div id="elh_view_ip_advance_Mobile" class="view_ip_advance_Mobile"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_ip_advance_list->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->Mobile) ?>', 1);"><div id="elh_view_ip_advance_Mobile" class="view_ip_advance_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $view_ip_advance_list->voucher_type->headerCellClass() ?>"><div id="elh_view_ip_advance_voucher_type" class="view_ip_advance_voucher_type"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $view_ip_advance_list->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->voucher_type) ?>', 1);"><div id="elh_view_ip_advance_voucher_type" class="view_ip_advance_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->voucher_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->voucher_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->Details->Visible) { // Details ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $view_ip_advance_list->Details->headerCellClass() ?>"><div id="elh_view_ip_advance_Details" class="view_ip_advance_Details"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $view_ip_advance_list->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->Details) ?>', 1);"><div id="elh_view_ip_advance_Details" class="view_ip_advance_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->Details->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->Details->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_ip_advance_list->ModeofPayment->headerCellClass() ?>"><div id="elh_view_ip_advance_ModeofPayment" class="view_ip_advance_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_ip_advance_list->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->ModeofPayment) ?>', 1);"><div id="elh_view_ip_advance_ModeofPayment" class="view_ip_advance_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->ModeofPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->ModeofPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->Amount->Visible) { // Amount ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_ip_advance_list->Amount->headerCellClass() ?>"><div id="elh_view_ip_advance_Amount" class="view_ip_advance_Amount"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_ip_advance_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->Amount) ?>', 1);"><div id="elh_view_ip_advance_Amount" class="view_ip_advance_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $view_ip_advance_list->AnyDues->headerCellClass() ?>"><div id="elh_view_ip_advance_AnyDues" class="view_ip_advance_AnyDues"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $view_ip_advance_list->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->AnyDues) ?>', 1);"><div id="elh_view_ip_advance_AnyDues" class="view_ip_advance_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->AnyDues->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->AnyDues->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->createdby->Visible) { // createdby ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_ip_advance_list->createdby->headerCellClass() ?>"><div id="elh_view_ip_advance_createdby" class="view_ip_advance_createdby"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_ip_advance_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->createdby) ?>', 1);"><div id="elh_view_ip_advance_createdby" class="view_ip_advance_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_advance_list->createddatetime->headerCellClass() ?>"><div id="elh_view_ip_advance_createddatetime" class="view_ip_advance_createddatetime"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_advance_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->createddatetime) ?>', 1);"><div id="elh_view_ip_advance_createddatetime" class="view_ip_advance_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_advance_list->modifiedby->headerCellClass() ?>"><div id="elh_view_ip_advance_modifiedby" class="view_ip_advance_modifiedby"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_advance_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->modifiedby) ?>', 1);"><div id="elh_view_ip_advance_modifiedby" class="view_ip_advance_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_advance_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ip_advance_modifieddatetime" class="view_ip_advance_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_advance_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->modifieddatetime) ?>', 1);"><div id="elh_view_ip_advance_modifieddatetime" class="view_ip_advance_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->PatID->Visible) { // PatID ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $view_ip_advance_list->PatID->headerCellClass() ?>"><div id="elh_view_ip_advance_PatID" class="view_ip_advance_PatID"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $view_ip_advance_list->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->PatID) ?>', 1);"><div id="elh_view_ip_advance_PatID" class="view_ip_advance_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_advance_list->PatientID->headerCellClass() ?>"><div id="elh_view_ip_advance_PatientID" class="view_ip_advance_PatientID"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_advance_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->PatientID) ?>', 1);"><div id="elh_view_ip_advance_PatientID" class="view_ip_advance_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_ip_advance_list->PatientName->headerCellClass() ?>"><div id="elh_view_ip_advance_PatientName" class="view_ip_advance_PatientName"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_ip_advance_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->PatientName) ?>', 1);"><div id="elh_view_ip_advance_PatientName" class="view_ip_advance_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->VisiteType->Visible) { // VisiteType ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->VisiteType) == "") { ?>
		<th data-name="VisiteType" class="<?php echo $view_ip_advance_list->VisiteType->headerCellClass() ?>"><div id="elh_view_ip_advance_VisiteType" class="view_ip_advance_VisiteType"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->VisiteType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VisiteType" class="<?php echo $view_ip_advance_list->VisiteType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->VisiteType) ?>', 1);"><div id="elh_view_ip_advance_VisiteType" class="view_ip_advance_VisiteType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->VisiteType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->VisiteType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->VisiteType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->VisitDate->Visible) { // VisitDate ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->VisitDate) == "") { ?>
		<th data-name="VisitDate" class="<?php echo $view_ip_advance_list->VisitDate->headerCellClass() ?>"><div id="elh_view_ip_advance_VisitDate" class="view_ip_advance_VisitDate"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->VisitDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VisitDate" class="<?php echo $view_ip_advance_list->VisitDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->VisitDate) ?>', 1);"><div id="elh_view_ip_advance_VisitDate" class="view_ip_advance_VisitDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->VisitDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->VisitDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->VisitDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->AdvanceNo->Visible) { // AdvanceNo ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->AdvanceNo) == "") { ?>
		<th data-name="AdvanceNo" class="<?php echo $view_ip_advance_list->AdvanceNo->headerCellClass() ?>"><div id="elh_view_ip_advance_AdvanceNo" class="view_ip_advance_AdvanceNo"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->AdvanceNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdvanceNo" class="<?php echo $view_ip_advance_list->AdvanceNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->AdvanceNo) ?>', 1);"><div id="elh_view_ip_advance_AdvanceNo" class="view_ip_advance_AdvanceNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->AdvanceNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->AdvanceNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->AdvanceNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->Status->Visible) { // Status ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $view_ip_advance_list->Status->headerCellClass() ?>"><div id="elh_view_ip_advance_Status" class="view_ip_advance_Status"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $view_ip_advance_list->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->Status) ?>', 1);"><div id="elh_view_ip_advance_Status" class="view_ip_advance_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->Status->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->Date->Visible) { // Date ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->Date) == "") { ?>
		<th data-name="Date" class="<?php echo $view_ip_advance_list->Date->headerCellClass() ?>"><div id="elh_view_ip_advance_Date" class="view_ip_advance_Date"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Date" class="<?php echo $view_ip_advance_list->Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->Date) ?>', 1);"><div id="elh_view_ip_advance_Date" class="view_ip_advance_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->Date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->Date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->AdvanceValidityDate) == "") { ?>
		<th data-name="AdvanceValidityDate" class="<?php echo $view_ip_advance_list->AdvanceValidityDate->headerCellClass() ?>"><div id="elh_view_ip_advance_AdvanceValidityDate" class="view_ip_advance_AdvanceValidityDate"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->AdvanceValidityDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdvanceValidityDate" class="<?php echo $view_ip_advance_list->AdvanceValidityDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->AdvanceValidityDate) ?>', 1);"><div id="elh_view_ip_advance_AdvanceValidityDate" class="view_ip_advance_AdvanceValidityDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->AdvanceValidityDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->AdvanceValidityDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->AdvanceValidityDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->TotalRemainingAdvance) == "") { ?>
		<th data-name="TotalRemainingAdvance" class="<?php echo $view_ip_advance_list->TotalRemainingAdvance->headerCellClass() ?>"><div id="elh_view_ip_advance_TotalRemainingAdvance" class="view_ip_advance_TotalRemainingAdvance"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->TotalRemainingAdvance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalRemainingAdvance" class="<?php echo $view_ip_advance_list->TotalRemainingAdvance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->TotalRemainingAdvance) ?>', 1);"><div id="elh_view_ip_advance_TotalRemainingAdvance" class="view_ip_advance_TotalRemainingAdvance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->TotalRemainingAdvance->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->TotalRemainingAdvance->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->TotalRemainingAdvance->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->Remarks->Visible) { // Remarks ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $view_ip_advance_list->Remarks->headerCellClass() ?>"><div id="elh_view_ip_advance_Remarks" class="view_ip_advance_Remarks"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $view_ip_advance_list->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->Remarks) ?>', 1);"><div id="elh_view_ip_advance_Remarks" class="view_ip_advance_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->Remarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->Remarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->SeectPaymentMode) == "") { ?>
		<th data-name="SeectPaymentMode" class="<?php echo $view_ip_advance_list->SeectPaymentMode->headerCellClass() ?>"><div id="elh_view_ip_advance_SeectPaymentMode" class="view_ip_advance_SeectPaymentMode"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->SeectPaymentMode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SeectPaymentMode" class="<?php echo $view_ip_advance_list->SeectPaymentMode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->SeectPaymentMode) ?>', 1);"><div id="elh_view_ip_advance_SeectPaymentMode" class="view_ip_advance_SeectPaymentMode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->SeectPaymentMode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->SeectPaymentMode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->SeectPaymentMode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->PaidAmount) == "") { ?>
		<th data-name="PaidAmount" class="<?php echo $view_ip_advance_list->PaidAmount->headerCellClass() ?>"><div id="elh_view_ip_advance_PaidAmount" class="view_ip_advance_PaidAmount"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->PaidAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaidAmount" class="<?php echo $view_ip_advance_list->PaidAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->PaidAmount) ?>', 1);"><div id="elh_view_ip_advance_PaidAmount" class="view_ip_advance_PaidAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->PaidAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->PaidAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->PaidAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->Currency->Visible) { // Currency ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->Currency) == "") { ?>
		<th data-name="Currency" class="<?php echo $view_ip_advance_list->Currency->headerCellClass() ?>"><div id="elh_view_ip_advance_Currency" class="view_ip_advance_Currency"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->Currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Currency" class="<?php echo $view_ip_advance_list->Currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->Currency) ?>', 1);"><div id="elh_view_ip_advance_Currency" class="view_ip_advance_Currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->Currency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->Currency->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->Currency->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->CardNumber->Visible) { // CardNumber ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $view_ip_advance_list->CardNumber->headerCellClass() ?>"><div id="elh_view_ip_advance_CardNumber" class="view_ip_advance_CardNumber"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $view_ip_advance_list->CardNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->CardNumber) ?>', 1);"><div id="elh_view_ip_advance_CardNumber" class="view_ip_advance_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->CardNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->CardNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->CardNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->BankName->Visible) { // BankName ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $view_ip_advance_list->BankName->headerCellClass() ?>"><div id="elh_view_ip_advance_BankName" class="view_ip_advance_BankName"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $view_ip_advance_list->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->BankName) ?>', 1);"><div id="elh_view_ip_advance_BankName" class="view_ip_advance_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->BankName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->BankName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->HospID->Visible) { // HospID ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ip_advance_list->HospID->headerCellClass() ?>"><div id="elh_view_ip_advance_HospID" class="view_ip_advance_HospID"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ip_advance_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->HospID) ?>', 1);"><div id="elh_view_ip_advance_HospID" class="view_ip_advance_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->Reception->Visible) { // Reception ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_ip_advance_list->Reception->headerCellClass() ?>"><div id="elh_view_ip_advance_Reception" class="view_ip_advance_Reception"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_ip_advance_list->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->Reception) ?>', 1);"><div id="elh_view_ip_advance_Reception" class="view_ip_advance_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_list->mrnno->Visible) { // mrnno ?>
	<?php if ($view_ip_advance_list->SortUrl($view_ip_advance_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_ip_advance_list->mrnno->headerCellClass() ?>"><div id="elh_view_ip_advance_mrnno" class="view_ip_advance_mrnno"><div class="ew-table-header-caption"><?php echo $view_ip_advance_list->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_ip_advance_list->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_advance_list->SortUrl($view_ip_advance_list->mrnno) ?>', 1);"><div id="elh_view_ip_advance_mrnno" class="view_ip_advance_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ip_advance_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ip_advance_list->ExportAll && $view_ip_advance_list->isExport()) {
	$view_ip_advance_list->StopRecord = $view_ip_advance_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_ip_advance_list->TotalRecords > $view_ip_advance_list->StartRecord + $view_ip_advance_list->DisplayRecords - 1)
		$view_ip_advance_list->StopRecord = $view_ip_advance_list->StartRecord + $view_ip_advance_list->DisplayRecords - 1;
	else
		$view_ip_advance_list->StopRecord = $view_ip_advance_list->TotalRecords;
}
$view_ip_advance_list->RecordCount = $view_ip_advance_list->StartRecord - 1;
if ($view_ip_advance_list->Recordset && !$view_ip_advance_list->Recordset->EOF) {
	$view_ip_advance_list->Recordset->moveFirst();
	$selectLimit = $view_ip_advance_list->UseSelectLimit;
	if (!$selectLimit && $view_ip_advance_list->StartRecord > 1)
		$view_ip_advance_list->Recordset->move($view_ip_advance_list->StartRecord - 1);
} elseif (!$view_ip_advance->AllowAddDeleteRow && $view_ip_advance_list->StopRecord == 0) {
	$view_ip_advance_list->StopRecord = $view_ip_advance->GridAddRowCount;
}

// Initialize aggregate
$view_ip_advance->RowType = ROWTYPE_AGGREGATEINIT;
$view_ip_advance->resetAttributes();
$view_ip_advance_list->renderRow();
while ($view_ip_advance_list->RecordCount < $view_ip_advance_list->StopRecord) {
	$view_ip_advance_list->RecordCount++;
	if ($view_ip_advance_list->RecordCount >= $view_ip_advance_list->StartRecord) {
		$view_ip_advance_list->RowCount++;

		// Set up key count
		$view_ip_advance_list->KeyCount = $view_ip_advance_list->RowIndex;

		// Init row class and style
		$view_ip_advance->resetAttributes();
		$view_ip_advance->CssClass = "";
		if ($view_ip_advance_list->isGridAdd()) {
		} else {
			$view_ip_advance_list->loadRowValues($view_ip_advance_list->Recordset); // Load row values
		}
		$view_ip_advance->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ip_advance->RowAttrs->merge(["data-rowindex" => $view_ip_advance_list->RowCount, "id" => "r" . $view_ip_advance_list->RowCount . "_view_ip_advance", "data-rowtype" => $view_ip_advance->RowType]);

		// Render row
		$view_ip_advance_list->renderRow();

		// Render list options
		$view_ip_advance_list->renderListOptions();
?>
	<tr <?php echo $view_ip_advance->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_advance_list->ListOptions->render("body", "left", $view_ip_advance_list->RowCount);
?>
	<?php if ($view_ip_advance_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_ip_advance_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_id">
<span<?php echo $view_ip_advance_list->id->viewAttributes() ?>><?php echo $view_ip_advance_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $view_ip_advance_list->Name->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_Name">
<span<?php echo $view_ip_advance_list->Name->viewAttributes() ?>><?php echo $view_ip_advance_list->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $view_ip_advance_list->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_Mobile">
<span<?php echo $view_ip_advance_list->Mobile->viewAttributes() ?>><?php echo $view_ip_advance_list->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type" <?php echo $view_ip_advance_list->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_voucher_type">
<span<?php echo $view_ip_advance_list->voucher_type->viewAttributes() ?>><?php echo $view_ip_advance_list->voucher_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->Details->Visible) { // Details ?>
		<td data-name="Details" <?php echo $view_ip_advance_list->Details->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_Details">
<span<?php echo $view_ip_advance_list->Details->viewAttributes() ?>><?php echo $view_ip_advance_list->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" <?php echo $view_ip_advance_list->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_ModeofPayment">
<span<?php echo $view_ip_advance_list->ModeofPayment->viewAttributes() ?>><?php echo $view_ip_advance_list->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $view_ip_advance_list->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_Amount">
<span<?php echo $view_ip_advance_list->Amount->viewAttributes() ?>><?php echo $view_ip_advance_list->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues" <?php echo $view_ip_advance_list->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_AnyDues">
<span<?php echo $view_ip_advance_list->AnyDues->viewAttributes() ?>><?php echo $view_ip_advance_list->AnyDues->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_ip_advance_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_createdby">
<span<?php echo $view_ip_advance_list->createdby->viewAttributes() ?>><?php echo $view_ip_advance_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_ip_advance_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_createddatetime">
<span<?php echo $view_ip_advance_list->createddatetime->viewAttributes() ?>><?php echo $view_ip_advance_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_ip_advance_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_modifiedby">
<span<?php echo $view_ip_advance_list->modifiedby->viewAttributes() ?>><?php echo $view_ip_advance_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_ip_advance_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_modifieddatetime">
<span<?php echo $view_ip_advance_list->modifieddatetime->viewAttributes() ?>><?php echo $view_ip_advance_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $view_ip_advance_list->PatID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_PatID">
<span<?php echo $view_ip_advance_list->PatID->viewAttributes() ?>><?php echo $view_ip_advance_list->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_ip_advance_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_PatientID">
<span<?php echo $view_ip_advance_list->PatientID->viewAttributes() ?>><?php echo $view_ip_advance_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_ip_advance_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_PatientName">
<span<?php echo $view_ip_advance_list->PatientName->viewAttributes() ?>><?php echo $view_ip_advance_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->VisiteType->Visible) { // VisiteType ?>
		<td data-name="VisiteType" <?php echo $view_ip_advance_list->VisiteType->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_VisiteType">
<span<?php echo $view_ip_advance_list->VisiteType->viewAttributes() ?>><?php echo $view_ip_advance_list->VisiteType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->VisitDate->Visible) { // VisitDate ?>
		<td data-name="VisitDate" <?php echo $view_ip_advance_list->VisitDate->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_VisitDate">
<span<?php echo $view_ip_advance_list->VisitDate->viewAttributes() ?>><?php echo $view_ip_advance_list->VisitDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->AdvanceNo->Visible) { // AdvanceNo ?>
		<td data-name="AdvanceNo" <?php echo $view_ip_advance_list->AdvanceNo->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_AdvanceNo">
<span<?php echo $view_ip_advance_list->AdvanceNo->viewAttributes() ?>><?php echo $view_ip_advance_list->AdvanceNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $view_ip_advance_list->Status->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_Status">
<span<?php echo $view_ip_advance_list->Status->viewAttributes() ?>><?php echo $view_ip_advance_list->Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->Date->Visible) { // Date ?>
		<td data-name="Date" <?php echo $view_ip_advance_list->Date->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_Date">
<span<?php echo $view_ip_advance_list->Date->viewAttributes() ?>><?php echo $view_ip_advance_list->Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
		<td data-name="AdvanceValidityDate" <?php echo $view_ip_advance_list->AdvanceValidityDate->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_AdvanceValidityDate">
<span<?php echo $view_ip_advance_list->AdvanceValidityDate->viewAttributes() ?>><?php echo $view_ip_advance_list->AdvanceValidityDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
		<td data-name="TotalRemainingAdvance" <?php echo $view_ip_advance_list->TotalRemainingAdvance->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_TotalRemainingAdvance">
<span<?php echo $view_ip_advance_list->TotalRemainingAdvance->viewAttributes() ?>><?php echo $view_ip_advance_list->TotalRemainingAdvance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks" <?php echo $view_ip_advance_list->Remarks->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_Remarks">
<span<?php echo $view_ip_advance_list->Remarks->viewAttributes() ?>><?php echo $view_ip_advance_list->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<td data-name="SeectPaymentMode" <?php echo $view_ip_advance_list->SeectPaymentMode->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_SeectPaymentMode">
<span<?php echo $view_ip_advance_list->SeectPaymentMode->viewAttributes() ?>><?php echo $view_ip_advance_list->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount" <?php echo $view_ip_advance_list->PaidAmount->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_PaidAmount">
<span<?php echo $view_ip_advance_list->PaidAmount->viewAttributes() ?>><?php echo $view_ip_advance_list->PaidAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->Currency->Visible) { // Currency ?>
		<td data-name="Currency" <?php echo $view_ip_advance_list->Currency->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_Currency">
<span<?php echo $view_ip_advance_list->Currency->viewAttributes() ?>><?php echo $view_ip_advance_list->Currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber" <?php echo $view_ip_advance_list->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_CardNumber">
<span<?php echo $view_ip_advance_list->CardNumber->viewAttributes() ?>><?php echo $view_ip_advance_list->CardNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->BankName->Visible) { // BankName ?>
		<td data-name="BankName" <?php echo $view_ip_advance_list->BankName->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_BankName">
<span<?php echo $view_ip_advance_list->BankName->viewAttributes() ?>><?php echo $view_ip_advance_list->BankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_ip_advance_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_HospID">
<span<?php echo $view_ip_advance_list->HospID->viewAttributes() ?>><?php echo $view_ip_advance_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $view_ip_advance_list->Reception->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_Reception">
<span<?php echo $view_ip_advance_list->Reception->viewAttributes() ?>><?php echo $view_ip_advance_list->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $view_ip_advance_list->mrnno->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCount ?>_view_ip_advance_mrnno">
<span<?php echo $view_ip_advance_list->mrnno->viewAttributes() ?>><?php echo $view_ip_advance_list->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ip_advance_list->ListOptions->render("body", "right", $view_ip_advance_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_ip_advance_list->isGridAdd())
		$view_ip_advance_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_ip_advance->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ip_advance_list->Recordset)
	$view_ip_advance_list->Recordset->Close();
?>
<?php if (!$view_ip_advance_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ip_advance_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_ip_advance_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_advance_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ip_advance_list->TotalRecords == 0 && !$view_ip_advance->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ip_advance_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_ip_advance_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_ip_advance_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_ip_advance->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_ip_advance",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_ip_advance_list->terminate();
?>