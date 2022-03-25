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
$deposit_pettycash_list = new deposit_pettycash_list();

// Run the page
$deposit_pettycash_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$deposit_pettycash_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$deposit_pettycash_list->isExport()) { ?>
<script>
var fdeposit_pettycashlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fdeposit_pettycashlist = currentForm = new ew.Form("fdeposit_pettycashlist", "list");
	fdeposit_pettycashlist.formKeyCountName = '<?php echo $deposit_pettycash_list->FormKeyCountName ?>';
	loadjs.done("fdeposit_pettycashlist");
});
var fdeposit_pettycashlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fdeposit_pettycashlistsrch = currentSearchForm = new ew.Form("fdeposit_pettycashlistsrch");

	// Dynamic selection lists
	// Filters

	fdeposit_pettycashlistsrch.filterList = <?php echo $deposit_pettycash_list->getFilterList() ?>;
	loadjs.done("fdeposit_pettycashlistsrch");
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
<?php if (!$deposit_pettycash_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($deposit_pettycash_list->TotalRecords > 0 && $deposit_pettycash_list->ExportOptions->visible()) { ?>
<?php $deposit_pettycash_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($deposit_pettycash_list->ImportOptions->visible()) { ?>
<?php $deposit_pettycash_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($deposit_pettycash_list->SearchOptions->visible()) { ?>
<?php $deposit_pettycash_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($deposit_pettycash_list->FilterOptions->visible()) { ?>
<?php $deposit_pettycash_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$deposit_pettycash_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$deposit_pettycash_list->isExport() && !$deposit_pettycash->CurrentAction) { ?>
<form name="fdeposit_pettycashlistsrch" id="fdeposit_pettycashlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fdeposit_pettycashlistsrch-search-panel" class="<?php echo $deposit_pettycash_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="deposit_pettycash">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $deposit_pettycash_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($deposit_pettycash_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($deposit_pettycash_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $deposit_pettycash_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($deposit_pettycash_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($deposit_pettycash_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($deposit_pettycash_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($deposit_pettycash_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $deposit_pettycash_list->showPageHeader(); ?>
<?php
$deposit_pettycash_list->showMessage();
?>
<?php if ($deposit_pettycash_list->TotalRecords > 0 || $deposit_pettycash->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($deposit_pettycash_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> deposit_pettycash">
<?php if (!$deposit_pettycash_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$deposit_pettycash_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $deposit_pettycash_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $deposit_pettycash_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdeposit_pettycashlist" id="fdeposit_pettycashlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="deposit_pettycash">
<div id="gmp_deposit_pettycash" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($deposit_pettycash_list->TotalRecords > 0 || $deposit_pettycash_list->isGridEdit()) { ?>
<table id="tbl_deposit_pettycashlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$deposit_pettycash->RowType = ROWTYPE_HEADER;

// Render list options
$deposit_pettycash_list->renderListOptions();

// Render list options (header, left)
$deposit_pettycash_list->ListOptions->render("header", "left");
?>
<?php if ($deposit_pettycash_list->id->Visible) { // id ?>
	<?php if ($deposit_pettycash_list->SortUrl($deposit_pettycash_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $deposit_pettycash_list->id->headerCellClass() ?>"><div id="elh_deposit_pettycash_id" class="deposit_pettycash_id"><div class="ew-table-header-caption"><?php echo $deposit_pettycash_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $deposit_pettycash_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $deposit_pettycash_list->SortUrl($deposit_pettycash_list->id) ?>', 1);"><div id="elh_deposit_pettycash_id" class="deposit_pettycash_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($deposit_pettycash_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash_list->TransType->Visible) { // TransType ?>
	<?php if ($deposit_pettycash_list->SortUrl($deposit_pettycash_list->TransType) == "") { ?>
		<th data-name="TransType" class="<?php echo $deposit_pettycash_list->TransType->headerCellClass() ?>"><div id="elh_deposit_pettycash_TransType" class="deposit_pettycash_TransType"><div class="ew-table-header-caption"><?php echo $deposit_pettycash_list->TransType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransType" class="<?php echo $deposit_pettycash_list->TransType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $deposit_pettycash_list->SortUrl($deposit_pettycash_list->TransType) ?>', 1);"><div id="elh_deposit_pettycash_TransType" class="deposit_pettycash_TransType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash_list->TransType->caption() ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash_list->TransType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($deposit_pettycash_list->TransType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash_list->ShiftNumber->Visible) { // ShiftNumber ?>
	<?php if ($deposit_pettycash_list->SortUrl($deposit_pettycash_list->ShiftNumber) == "") { ?>
		<th data-name="ShiftNumber" class="<?php echo $deposit_pettycash_list->ShiftNumber->headerCellClass() ?>"><div id="elh_deposit_pettycash_ShiftNumber" class="deposit_pettycash_ShiftNumber"><div class="ew-table-header-caption"><?php echo $deposit_pettycash_list->ShiftNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ShiftNumber" class="<?php echo $deposit_pettycash_list->ShiftNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $deposit_pettycash_list->SortUrl($deposit_pettycash_list->ShiftNumber) ?>', 1);"><div id="elh_deposit_pettycash_ShiftNumber" class="deposit_pettycash_ShiftNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash_list->ShiftNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash_list->ShiftNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($deposit_pettycash_list->ShiftNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash_list->TerminalNumber->Visible) { // TerminalNumber ?>
	<?php if ($deposit_pettycash_list->SortUrl($deposit_pettycash_list->TerminalNumber) == "") { ?>
		<th data-name="TerminalNumber" class="<?php echo $deposit_pettycash_list->TerminalNumber->headerCellClass() ?>"><div id="elh_deposit_pettycash_TerminalNumber" class="deposit_pettycash_TerminalNumber"><div class="ew-table-header-caption"><?php echo $deposit_pettycash_list->TerminalNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TerminalNumber" class="<?php echo $deposit_pettycash_list->TerminalNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $deposit_pettycash_list->SortUrl($deposit_pettycash_list->TerminalNumber) ?>', 1);"><div id="elh_deposit_pettycash_TerminalNumber" class="deposit_pettycash_TerminalNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash_list->TerminalNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash_list->TerminalNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($deposit_pettycash_list->TerminalNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash_list->User->Visible) { // User ?>
	<?php if ($deposit_pettycash_list->SortUrl($deposit_pettycash_list->User) == "") { ?>
		<th data-name="User" class="<?php echo $deposit_pettycash_list->User->headerCellClass() ?>"><div id="elh_deposit_pettycash_User" class="deposit_pettycash_User"><div class="ew-table-header-caption"><?php echo $deposit_pettycash_list->User->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="User" class="<?php echo $deposit_pettycash_list->User->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $deposit_pettycash_list->SortUrl($deposit_pettycash_list->User) ?>', 1);"><div id="elh_deposit_pettycash_User" class="deposit_pettycash_User">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash_list->User->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash_list->User->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($deposit_pettycash_list->User->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash_list->OpenedDateTime->Visible) { // OpenedDateTime ?>
	<?php if ($deposit_pettycash_list->SortUrl($deposit_pettycash_list->OpenedDateTime) == "") { ?>
		<th data-name="OpenedDateTime" class="<?php echo $deposit_pettycash_list->OpenedDateTime->headerCellClass() ?>"><div id="elh_deposit_pettycash_OpenedDateTime" class="deposit_pettycash_OpenedDateTime"><div class="ew-table-header-caption"><?php echo $deposit_pettycash_list->OpenedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OpenedDateTime" class="<?php echo $deposit_pettycash_list->OpenedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $deposit_pettycash_list->SortUrl($deposit_pettycash_list->OpenedDateTime) ?>', 1);"><div id="elh_deposit_pettycash_OpenedDateTime" class="deposit_pettycash_OpenedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash_list->OpenedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash_list->OpenedDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($deposit_pettycash_list->OpenedDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash_list->AccoundHead->Visible) { // AccoundHead ?>
	<?php if ($deposit_pettycash_list->SortUrl($deposit_pettycash_list->AccoundHead) == "") { ?>
		<th data-name="AccoundHead" class="<?php echo $deposit_pettycash_list->AccoundHead->headerCellClass() ?>"><div id="elh_deposit_pettycash_AccoundHead" class="deposit_pettycash_AccoundHead"><div class="ew-table-header-caption"><?php echo $deposit_pettycash_list->AccoundHead->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AccoundHead" class="<?php echo $deposit_pettycash_list->AccoundHead->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $deposit_pettycash_list->SortUrl($deposit_pettycash_list->AccoundHead) ?>', 1);"><div id="elh_deposit_pettycash_AccoundHead" class="deposit_pettycash_AccoundHead">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash_list->AccoundHead->caption() ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash_list->AccoundHead->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($deposit_pettycash_list->AccoundHead->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash_list->Amount->Visible) { // Amount ?>
	<?php if ($deposit_pettycash_list->SortUrl($deposit_pettycash_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $deposit_pettycash_list->Amount->headerCellClass() ?>"><div id="elh_deposit_pettycash_Amount" class="deposit_pettycash_Amount"><div class="ew-table-header-caption"><?php echo $deposit_pettycash_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $deposit_pettycash_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $deposit_pettycash_list->SortUrl($deposit_pettycash_list->Amount) ?>', 1);"><div id="elh_deposit_pettycash_Amount" class="deposit_pettycash_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($deposit_pettycash_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash_list->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($deposit_pettycash_list->SortUrl($deposit_pettycash_list->CreatedBy) == "") { ?>
		<th data-name="CreatedBy" class="<?php echo $deposit_pettycash_list->CreatedBy->headerCellClass() ?>"><div id="elh_deposit_pettycash_CreatedBy" class="deposit_pettycash_CreatedBy"><div class="ew-table-header-caption"><?php echo $deposit_pettycash_list->CreatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedBy" class="<?php echo $deposit_pettycash_list->CreatedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $deposit_pettycash_list->SortUrl($deposit_pettycash_list->CreatedBy) ?>', 1);"><div id="elh_deposit_pettycash_CreatedBy" class="deposit_pettycash_CreatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash_list->CreatedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash_list->CreatedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($deposit_pettycash_list->CreatedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash_list->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<?php if ($deposit_pettycash_list->SortUrl($deposit_pettycash_list->CreatedDateTime) == "") { ?>
		<th data-name="CreatedDateTime" class="<?php echo $deposit_pettycash_list->CreatedDateTime->headerCellClass() ?>"><div id="elh_deposit_pettycash_CreatedDateTime" class="deposit_pettycash_CreatedDateTime"><div class="ew-table-header-caption"><?php echo $deposit_pettycash_list->CreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedDateTime" class="<?php echo $deposit_pettycash_list->CreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $deposit_pettycash_list->SortUrl($deposit_pettycash_list->CreatedDateTime) ?>', 1);"><div id="elh_deposit_pettycash_CreatedDateTime" class="deposit_pettycash_CreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash_list->CreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash_list->CreatedDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($deposit_pettycash_list->CreatedDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash_list->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($deposit_pettycash_list->SortUrl($deposit_pettycash_list->ModifiedBy) == "") { ?>
		<th data-name="ModifiedBy" class="<?php echo $deposit_pettycash_list->ModifiedBy->headerCellClass() ?>"><div id="elh_deposit_pettycash_ModifiedBy" class="deposit_pettycash_ModifiedBy"><div class="ew-table-header-caption"><?php echo $deposit_pettycash_list->ModifiedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedBy" class="<?php echo $deposit_pettycash_list->ModifiedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $deposit_pettycash_list->SortUrl($deposit_pettycash_list->ModifiedBy) ?>', 1);"><div id="elh_deposit_pettycash_ModifiedBy" class="deposit_pettycash_ModifiedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash_list->ModifiedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash_list->ModifiedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($deposit_pettycash_list->ModifiedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash_list->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<?php if ($deposit_pettycash_list->SortUrl($deposit_pettycash_list->ModifiedDateTime) == "") { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $deposit_pettycash_list->ModifiedDateTime->headerCellClass() ?>"><div id="elh_deposit_pettycash_ModifiedDateTime" class="deposit_pettycash_ModifiedDateTime"><div class="ew-table-header-caption"><?php echo $deposit_pettycash_list->ModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $deposit_pettycash_list->ModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $deposit_pettycash_list->SortUrl($deposit_pettycash_list->ModifiedDateTime) ?>', 1);"><div id="elh_deposit_pettycash_ModifiedDateTime" class="deposit_pettycash_ModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash_list->ModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash_list->ModifiedDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($deposit_pettycash_list->ModifiedDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$deposit_pettycash_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($deposit_pettycash_list->ExportAll && $deposit_pettycash_list->isExport()) {
	$deposit_pettycash_list->StopRecord = $deposit_pettycash_list->TotalRecords;
} else {

	// Set the last record to display
	if ($deposit_pettycash_list->TotalRecords > $deposit_pettycash_list->StartRecord + $deposit_pettycash_list->DisplayRecords - 1)
		$deposit_pettycash_list->StopRecord = $deposit_pettycash_list->StartRecord + $deposit_pettycash_list->DisplayRecords - 1;
	else
		$deposit_pettycash_list->StopRecord = $deposit_pettycash_list->TotalRecords;
}
$deposit_pettycash_list->RecordCount = $deposit_pettycash_list->StartRecord - 1;
if ($deposit_pettycash_list->Recordset && !$deposit_pettycash_list->Recordset->EOF) {
	$deposit_pettycash_list->Recordset->moveFirst();
	$selectLimit = $deposit_pettycash_list->UseSelectLimit;
	if (!$selectLimit && $deposit_pettycash_list->StartRecord > 1)
		$deposit_pettycash_list->Recordset->move($deposit_pettycash_list->StartRecord - 1);
} elseif (!$deposit_pettycash->AllowAddDeleteRow && $deposit_pettycash_list->StopRecord == 0) {
	$deposit_pettycash_list->StopRecord = $deposit_pettycash->GridAddRowCount;
}

// Initialize aggregate
$deposit_pettycash->RowType = ROWTYPE_AGGREGATEINIT;
$deposit_pettycash->resetAttributes();
$deposit_pettycash_list->renderRow();
while ($deposit_pettycash_list->RecordCount < $deposit_pettycash_list->StopRecord) {
	$deposit_pettycash_list->RecordCount++;
	if ($deposit_pettycash_list->RecordCount >= $deposit_pettycash_list->StartRecord) {
		$deposit_pettycash_list->RowCount++;

		// Set up key count
		$deposit_pettycash_list->KeyCount = $deposit_pettycash_list->RowIndex;

		// Init row class and style
		$deposit_pettycash->resetAttributes();
		$deposit_pettycash->CssClass = "";
		if ($deposit_pettycash_list->isGridAdd()) {
		} else {
			$deposit_pettycash_list->loadRowValues($deposit_pettycash_list->Recordset); // Load row values
		}
		$deposit_pettycash->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$deposit_pettycash->RowAttrs->merge(["data-rowindex" => $deposit_pettycash_list->RowCount, "id" => "r" . $deposit_pettycash_list->RowCount . "_deposit_pettycash", "data-rowtype" => $deposit_pettycash->RowType]);

		// Render row
		$deposit_pettycash_list->renderRow();

		// Render list options
		$deposit_pettycash_list->renderListOptions();
?>
	<tr <?php echo $deposit_pettycash->rowAttributes() ?>>
<?php

// Render list options (body, left)
$deposit_pettycash_list->ListOptions->render("body", "left", $deposit_pettycash_list->RowCount);
?>
	<?php if ($deposit_pettycash_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $deposit_pettycash_list->id->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCount ?>_deposit_pettycash_id">
<span<?php echo $deposit_pettycash_list->id->viewAttributes() ?>><?php echo $deposit_pettycash_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash_list->TransType->Visible) { // TransType ?>
		<td data-name="TransType" <?php echo $deposit_pettycash_list->TransType->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCount ?>_deposit_pettycash_TransType">
<span<?php echo $deposit_pettycash_list->TransType->viewAttributes() ?>><?php echo $deposit_pettycash_list->TransType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash_list->ShiftNumber->Visible) { // ShiftNumber ?>
		<td data-name="ShiftNumber" <?php echo $deposit_pettycash_list->ShiftNumber->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCount ?>_deposit_pettycash_ShiftNumber">
<span<?php echo $deposit_pettycash_list->ShiftNumber->viewAttributes() ?>><?php echo $deposit_pettycash_list->ShiftNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash_list->TerminalNumber->Visible) { // TerminalNumber ?>
		<td data-name="TerminalNumber" <?php echo $deposit_pettycash_list->TerminalNumber->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCount ?>_deposit_pettycash_TerminalNumber">
<span<?php echo $deposit_pettycash_list->TerminalNumber->viewAttributes() ?>><?php echo $deposit_pettycash_list->TerminalNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash_list->User->Visible) { // User ?>
		<td data-name="User" <?php echo $deposit_pettycash_list->User->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCount ?>_deposit_pettycash_User">
<span<?php echo $deposit_pettycash_list->User->viewAttributes() ?>><?php echo $deposit_pettycash_list->User->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash_list->OpenedDateTime->Visible) { // OpenedDateTime ?>
		<td data-name="OpenedDateTime" <?php echo $deposit_pettycash_list->OpenedDateTime->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCount ?>_deposit_pettycash_OpenedDateTime">
<span<?php echo $deposit_pettycash_list->OpenedDateTime->viewAttributes() ?>><?php echo $deposit_pettycash_list->OpenedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash_list->AccoundHead->Visible) { // AccoundHead ?>
		<td data-name="AccoundHead" <?php echo $deposit_pettycash_list->AccoundHead->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCount ?>_deposit_pettycash_AccoundHead">
<span<?php echo $deposit_pettycash_list->AccoundHead->viewAttributes() ?>><?php echo $deposit_pettycash_list->AccoundHead->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $deposit_pettycash_list->Amount->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCount ?>_deposit_pettycash_Amount">
<span<?php echo $deposit_pettycash_list->Amount->viewAttributes() ?>><?php echo $deposit_pettycash_list->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash_list->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy" <?php echo $deposit_pettycash_list->CreatedBy->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCount ?>_deposit_pettycash_CreatedBy">
<span<?php echo $deposit_pettycash_list->CreatedBy->viewAttributes() ?>><?php echo $deposit_pettycash_list->CreatedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash_list->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td data-name="CreatedDateTime" <?php echo $deposit_pettycash_list->CreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCount ?>_deposit_pettycash_CreatedDateTime">
<span<?php echo $deposit_pettycash_list->CreatedDateTime->viewAttributes() ?>><?php echo $deposit_pettycash_list->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash_list->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy" <?php echo $deposit_pettycash_list->ModifiedBy->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCount ?>_deposit_pettycash_ModifiedBy">
<span<?php echo $deposit_pettycash_list->ModifiedBy->viewAttributes() ?>><?php echo $deposit_pettycash_list->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash_list->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime" <?php echo $deposit_pettycash_list->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCount ?>_deposit_pettycash_ModifiedDateTime">
<span<?php echo $deposit_pettycash_list->ModifiedDateTime->viewAttributes() ?>><?php echo $deposit_pettycash_list->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$deposit_pettycash_list->ListOptions->render("body", "right", $deposit_pettycash_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$deposit_pettycash_list->isGridAdd())
		$deposit_pettycash_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$deposit_pettycash->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($deposit_pettycash_list->Recordset)
	$deposit_pettycash_list->Recordset->Close();
?>
<?php if (!$deposit_pettycash_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$deposit_pettycash_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $deposit_pettycash_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $deposit_pettycash_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($deposit_pettycash_list->TotalRecords == 0 && !$deposit_pettycash->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $deposit_pettycash_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$deposit_pettycash_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$deposit_pettycash_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$deposit_pettycash->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_deposit_pettycash",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$deposit_pettycash_list->terminate();
?>