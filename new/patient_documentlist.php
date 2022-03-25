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
$patient_document_list = new patient_document_list();

// Run the page
$patient_document_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_document_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_document_list->isExport()) { ?>
<script>
var fpatient_documentlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpatient_documentlist = currentForm = new ew.Form("fpatient_documentlist", "list");
	fpatient_documentlist.formKeyCountName = '<?php echo $patient_document_list->FormKeyCountName ?>';
	loadjs.done("fpatient_documentlist");
});
var fpatient_documentlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpatient_documentlistsrch = currentSearchForm = new ew.Form("fpatient_documentlistsrch");

	// Dynamic selection lists
	// Filters

	fpatient_documentlistsrch.filterList = <?php echo $patient_document_list->getFilterList() ?>;
	loadjs.done("fpatient_documentlistsrch");
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
<?php if (!$patient_document_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_document_list->TotalRecords > 0 && $patient_document_list->ExportOptions->visible()) { ?>
<?php $patient_document_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_document_list->ImportOptions->visible()) { ?>
<?php $patient_document_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_document_list->SearchOptions->visible()) { ?>
<?php $patient_document_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_document_list->FilterOptions->visible()) { ?>
<?php $patient_document_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_document_list->isExport() || Config("EXPORT_MASTER_RECORD") && $patient_document_list->isExport("print")) { ?>
<?php
if ($patient_document_list->DbMasterFilter != "" && $patient_document->getCurrentMasterTable() == "patient") {
	if ($patient_document_list->MasterRecordExists) {
		include_once "patientmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_document_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_document_list->isExport() && !$patient_document->CurrentAction) { ?>
<form name="fpatient_documentlistsrch" id="fpatient_documentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpatient_documentlistsrch-search-panel" class="<?php echo $patient_document_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_document">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $patient_document_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($patient_document_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($patient_document_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_document_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_document_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_document_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_document_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_document_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $patient_document_list->showPageHeader(); ?>
<?php
$patient_document_list->showMessage();
?>
<?php if ($patient_document_list->TotalRecords > 0 || $patient_document->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_document_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_document">
<?php if (!$patient_document_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_document_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_document_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_document_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_documentlist" id="fpatient_documentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_document">
<?php if ($patient_document->getCurrentMasterTable() == "patient" && $patient_document->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_document_list->patient_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_document" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($patient_document_list->TotalRecords > 0 || $patient_document_list->isGridEdit()) { ?>
<table id="tbl_patient_documentlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_document->RowType = ROWTYPE_HEADER;

// Render list options
$patient_document_list->renderListOptions();

// Render list options (header, left)
$patient_document_list->ListOptions->render("header", "left");
?>
<?php if ($patient_document_list->id->Visible) { // id ?>
	<?php if ($patient_document_list->SortUrl($patient_document_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_document_list->id->headerCellClass() ?>"><div id="elh_patient_document_id" class="patient_document_id"><div class="ew-table-header-caption"><?php echo $patient_document_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_document_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_document_list->SortUrl($patient_document_list->id) ?>', 1);"><div id="elh_patient_document_id" class="patient_document_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_document_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document_list->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_document_list->SortUrl($patient_document_list->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $patient_document_list->patient_id->headerCellClass() ?>"><div id="elh_patient_document_patient_id" class="patient_document_patient_id"><div class="ew-table-header-caption"><?php echo $patient_document_list->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $patient_document_list->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_document_list->SortUrl($patient_document_list->patient_id) ?>', 1);"><div id="elh_patient_document_patient_id" class="patient_document_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document_list->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document_list->patient_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_document_list->patient_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document_list->DocumentName->Visible) { // DocumentName ?>
	<?php if ($patient_document_list->SortUrl($patient_document_list->DocumentName) == "") { ?>
		<th data-name="DocumentName" class="<?php echo $patient_document_list->DocumentName->headerCellClass() ?>"><div id="elh_patient_document_DocumentName" class="patient_document_DocumentName"><div class="ew-table-header-caption"><?php echo $patient_document_list->DocumentName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DocumentName" class="<?php echo $patient_document_list->DocumentName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_document_list->SortUrl($patient_document_list->DocumentName) ?>', 1);"><div id="elh_patient_document_DocumentName" class="patient_document_DocumentName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document_list->DocumentName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document_list->DocumentName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_document_list->DocumentName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document_list->status->Visible) { // status ?>
	<?php if ($patient_document_list->SortUrl($patient_document_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_document_list->status->headerCellClass() ?>"><div id="elh_patient_document_status" class="patient_document_status"><div class="ew-table-header-caption"><?php echo $patient_document_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_document_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_document_list->SortUrl($patient_document_list->status) ?>', 1);"><div id="elh_patient_document_status" class="patient_document_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_document_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document_list->createdby->Visible) { // createdby ?>
	<?php if ($patient_document_list->SortUrl($patient_document_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_document_list->createdby->headerCellClass() ?>"><div id="elh_patient_document_createdby" class="patient_document_createdby"><div class="ew-table-header-caption"><?php echo $patient_document_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_document_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_document_list->SortUrl($patient_document_list->createdby) ?>', 1);"><div id="elh_patient_document_createdby" class="patient_document_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_document_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_document_list->SortUrl($patient_document_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_document_list->createddatetime->headerCellClass() ?>"><div id="elh_patient_document_createddatetime" class="patient_document_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_document_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_document_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_document_list->SortUrl($patient_document_list->createddatetime) ?>', 1);"><div id="elh_patient_document_createddatetime" class="patient_document_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_document_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_document_list->SortUrl($patient_document_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_document_list->modifiedby->headerCellClass() ?>"><div id="elh_patient_document_modifiedby" class="patient_document_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_document_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_document_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_document_list->SortUrl($patient_document_list->modifiedby) ?>', 1);"><div id="elh_patient_document_modifiedby" class="patient_document_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_document_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_document_list->SortUrl($patient_document_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_document_list->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_document_modifieddatetime" class="patient_document_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_document_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_document_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_document_list->SortUrl($patient_document_list->modifieddatetime) ?>', 1);"><div id="elh_patient_document_modifieddatetime" class="patient_document_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_document_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document_list->DocumentNumber->Visible) { // DocumentNumber ?>
	<?php if ($patient_document_list->SortUrl($patient_document_list->DocumentNumber) == "") { ?>
		<th data-name="DocumentNumber" class="<?php echo $patient_document_list->DocumentNumber->headerCellClass() ?>"><div id="elh_patient_document_DocumentNumber" class="patient_document_DocumentNumber"><div class="ew-table-header-caption"><?php echo $patient_document_list->DocumentNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DocumentNumber" class="<?php echo $patient_document_list->DocumentNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_document_list->SortUrl($patient_document_list->DocumentNumber) ?>', 1);"><div id="elh_patient_document_DocumentNumber" class="patient_document_DocumentNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document_list->DocumentNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_document_list->DocumentNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_document_list->DocumentNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_document_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_document_list->ExportAll && $patient_document_list->isExport()) {
	$patient_document_list->StopRecord = $patient_document_list->TotalRecords;
} else {

	// Set the last record to display
	if ($patient_document_list->TotalRecords > $patient_document_list->StartRecord + $patient_document_list->DisplayRecords - 1)
		$patient_document_list->StopRecord = $patient_document_list->StartRecord + $patient_document_list->DisplayRecords - 1;
	else
		$patient_document_list->StopRecord = $patient_document_list->TotalRecords;
}
$patient_document_list->RecordCount = $patient_document_list->StartRecord - 1;
if ($patient_document_list->Recordset && !$patient_document_list->Recordset->EOF) {
	$patient_document_list->Recordset->moveFirst();
	$selectLimit = $patient_document_list->UseSelectLimit;
	if (!$selectLimit && $patient_document_list->StartRecord > 1)
		$patient_document_list->Recordset->move($patient_document_list->StartRecord - 1);
} elseif (!$patient_document->AllowAddDeleteRow && $patient_document_list->StopRecord == 0) {
	$patient_document_list->StopRecord = $patient_document->GridAddRowCount;
}

// Initialize aggregate
$patient_document->RowType = ROWTYPE_AGGREGATEINIT;
$patient_document->resetAttributes();
$patient_document_list->renderRow();
while ($patient_document_list->RecordCount < $patient_document_list->StopRecord) {
	$patient_document_list->RecordCount++;
	if ($patient_document_list->RecordCount >= $patient_document_list->StartRecord) {
		$patient_document_list->RowCount++;

		// Set up key count
		$patient_document_list->KeyCount = $patient_document_list->RowIndex;

		// Init row class and style
		$patient_document->resetAttributes();
		$patient_document->CssClass = "";
		if ($patient_document_list->isGridAdd()) {
		} else {
			$patient_document_list->loadRowValues($patient_document_list->Recordset); // Load row values
		}
		$patient_document->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_document->RowAttrs->merge(["data-rowindex" => $patient_document_list->RowCount, "id" => "r" . $patient_document_list->RowCount . "_patient_document", "data-rowtype" => $patient_document->RowType]);

		// Render row
		$patient_document_list->renderRow();

		// Render list options
		$patient_document_list->renderListOptions();
?>
	<tr <?php echo $patient_document->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_document_list->ListOptions->render("body", "left", $patient_document_list->RowCount);
?>
	<?php if ($patient_document_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_document_list->id->cellAttributes() ?>>
<span id="el<?php echo $patient_document_list->RowCount ?>_patient_document_id">
<span<?php echo $patient_document_list->id->viewAttributes() ?>><?php echo $patient_document_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_document_list->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id" <?php echo $patient_document_list->patient_id->cellAttributes() ?>>
<span id="el<?php echo $patient_document_list->RowCount ?>_patient_document_patient_id">
<span<?php echo $patient_document_list->patient_id->viewAttributes() ?>><?php echo $patient_document_list->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_document_list->DocumentName->Visible) { // DocumentName ?>
		<td data-name="DocumentName" <?php echo $patient_document_list->DocumentName->cellAttributes() ?>>
<span id="el<?php echo $patient_document_list->RowCount ?>_patient_document_DocumentName">
<span<?php echo $patient_document_list->DocumentName->viewAttributes() ?>><?php echo $patient_document_list->DocumentName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_document_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $patient_document_list->status->cellAttributes() ?>>
<span id="el<?php echo $patient_document_list->RowCount ?>_patient_document_status">
<span<?php echo $patient_document_list->status->viewAttributes() ?>><?php echo $patient_document_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_document_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $patient_document_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_document_list->RowCount ?>_patient_document_createdby">
<span<?php echo $patient_document_list->createdby->viewAttributes() ?>><?php echo $patient_document_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_document_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $patient_document_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_document_list->RowCount ?>_patient_document_createddatetime">
<span<?php echo $patient_document_list->createddatetime->viewAttributes() ?>><?php echo $patient_document_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_document_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $patient_document_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_document_list->RowCount ?>_patient_document_modifiedby">
<span<?php echo $patient_document_list->modifiedby->viewAttributes() ?>><?php echo $patient_document_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_document_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $patient_document_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_document_list->RowCount ?>_patient_document_modifieddatetime">
<span<?php echo $patient_document_list->modifieddatetime->viewAttributes() ?>><?php echo $patient_document_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_document_list->DocumentNumber->Visible) { // DocumentNumber ?>
		<td data-name="DocumentNumber" <?php echo $patient_document_list->DocumentNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_document_list->RowCount ?>_patient_document_DocumentNumber">
<span<?php echo $patient_document_list->DocumentNumber->viewAttributes() ?>><?php echo $patient_document_list->DocumentNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_document_list->ListOptions->render("body", "right", $patient_document_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$patient_document_list->isGridAdd())
		$patient_document_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$patient_document->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_document_list->Recordset)
	$patient_document_list->Recordset->Close();
?>
<?php if (!$patient_document_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_document_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_document_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_document_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_document_list->TotalRecords == 0 && !$patient_document->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_document_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_document_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_document_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_document->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_document",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_document_list->terminate();
?>