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
$pharmacy_services_list = new pharmacy_services_list();

// Run the page
$pharmacy_services_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_services_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_services_list->isExport()) { ?>
<script>
var fpharmacy_serviceslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_serviceslist = currentForm = new ew.Form("fpharmacy_serviceslist", "list");
	fpharmacy_serviceslist.formKeyCountName = '<?php echo $pharmacy_services_list->FormKeyCountName ?>';
	loadjs.done("fpharmacy_serviceslist");
});
var fpharmacy_serviceslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_serviceslistsrch = currentSearchForm = new ew.Form("fpharmacy_serviceslistsrch");

	// Dynamic selection lists
	// Filters

	fpharmacy_serviceslistsrch.filterList = <?php echo $pharmacy_services_list->getFilterList() ?>;
	loadjs.done("fpharmacy_serviceslistsrch");
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
<?php if (!$pharmacy_services_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_services_list->TotalRecords > 0 && $pharmacy_services_list->ExportOptions->visible()) { ?>
<?php $pharmacy_services_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_services_list->ImportOptions->visible()) { ?>
<?php $pharmacy_services_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_services_list->SearchOptions->visible()) { ?>
<?php $pharmacy_services_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_services_list->FilterOptions->visible()) { ?>
<?php $pharmacy_services_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$pharmacy_services_list->isExport() || Config("EXPORT_MASTER_RECORD") && $pharmacy_services_list->isExport("print")) { ?>
<?php
if ($pharmacy_services_list->DbMasterFilter != "" && $pharmacy_services->getCurrentMasterTable() == "pharmacy") {
	if ($pharmacy_services_list->MasterRecordExists) {
		include_once "pharmacymaster.php";
	}
}
?>
<?php
if ($pharmacy_services_list->DbMasterFilter != "" && $pharmacy_services->getCurrentMasterTable() == "mas_pharmacy") {
	if ($pharmacy_services_list->MasterRecordExists) {
		include_once "mas_pharmacymaster.php";
	}
}
?>
<?php } ?>
<?php
$pharmacy_services_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_services_list->isExport() && !$pharmacy_services->CurrentAction) { ?>
<form name="fpharmacy_serviceslistsrch" id="fpharmacy_serviceslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_serviceslistsrch-search-panel" class="<?php echo $pharmacy_services_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_services">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pharmacy_services_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_services_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_services_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_services_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_services_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_services_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_services_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_services_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_services_list->showPageHeader(); ?>
<?php
$pharmacy_services_list->showMessage();
?>
<?php if ($pharmacy_services_list->TotalRecords > 0 || $pharmacy_services->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_services_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_services">
<?php if (!$pharmacy_services_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_services_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_services_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_serviceslist" id="fpharmacy_serviceslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_services">
<?php if ($pharmacy_services->getCurrentMasterTable() == "pharmacy" && $pharmacy_services->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($pharmacy_services_list->pharmacy_id->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($pharmacy_services_list->patient_id->getSessionValue()) ?>">
<?php } ?>
<?php if ($pharmacy_services->getCurrentMasterTable() == "mas_pharmacy" && $pharmacy_services->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="mas_pharmacy">
<input type="hidden" name="fk_name" value="<?php echo HtmlEncode($pharmacy_services_list->name->getSessionValue()) ?>">
<input type="hidden" name="fk_amount" value="<?php echo HtmlEncode($pharmacy_services_list->amount->getSessionValue()) ?>">
<input type="hidden" name="fk_description" value="<?php echo HtmlEncode($pharmacy_services_list->description->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_pharmacy_services" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_services_list->TotalRecords > 0 || $pharmacy_services_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_serviceslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_services->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_services_list->renderListOptions();

// Render list options (header, left)
$pharmacy_services_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_services_list->id->Visible) { // id ?>
	<?php if ($pharmacy_services_list->SortUrl($pharmacy_services_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_services_list->id->headerCellClass() ?>"><div id="elh_pharmacy_services_id" class="pharmacy_services_id"><div class="ew-table-header-caption"><?php echo $pharmacy_services_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_services_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_services_list->SortUrl($pharmacy_services_list->id) ?>', 1);"><div id="elh_pharmacy_services_id" class="pharmacy_services_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_services_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services_list->pharmacy_id->Visible) { // pharmacy_id ?>
	<?php if ($pharmacy_services_list->SortUrl($pharmacy_services_list->pharmacy_id) == "") { ?>
		<th data-name="pharmacy_id" class="<?php echo $pharmacy_services_list->pharmacy_id->headerCellClass() ?>"><div id="elh_pharmacy_services_pharmacy_id" class="pharmacy_services_pharmacy_id"><div class="ew-table-header-caption"><?php echo $pharmacy_services_list->pharmacy_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacy_id" class="<?php echo $pharmacy_services_list->pharmacy_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_services_list->SortUrl($pharmacy_services_list->pharmacy_id) ?>', 1);"><div id="elh_pharmacy_services_pharmacy_id" class="pharmacy_services_pharmacy_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services_list->pharmacy_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services_list->pharmacy_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_services_list->pharmacy_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services_list->patient_id->Visible) { // patient_id ?>
	<?php if ($pharmacy_services_list->SortUrl($pharmacy_services_list->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $pharmacy_services_list->patient_id->headerCellClass() ?>"><div id="elh_pharmacy_services_patient_id" class="pharmacy_services_patient_id"><div class="ew-table-header-caption"><?php echo $pharmacy_services_list->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $pharmacy_services_list->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_services_list->SortUrl($pharmacy_services_list->patient_id) ?>', 1);"><div id="elh_pharmacy_services_patient_id" class="pharmacy_services_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services_list->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services_list->patient_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_services_list->patient_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services_list->name->Visible) { // name ?>
	<?php if ($pharmacy_services_list->SortUrl($pharmacy_services_list->name) == "") { ?>
		<th data-name="name" class="<?php echo $pharmacy_services_list->name->headerCellClass() ?>"><div id="elh_pharmacy_services_name" class="pharmacy_services_name"><div class="ew-table-header-caption"><?php echo $pharmacy_services_list->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $pharmacy_services_list->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_services_list->SortUrl($pharmacy_services_list->name) ?>', 1);"><div id="elh_pharmacy_services_name" class="pharmacy_services_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services_list->name->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services_list->name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_services_list->name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services_list->amount->Visible) { // amount ?>
	<?php if ($pharmacy_services_list->SortUrl($pharmacy_services_list->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $pharmacy_services_list->amount->headerCellClass() ?>"><div id="elh_pharmacy_services_amount" class="pharmacy_services_amount"><div class="ew-table-header-caption"><?php echo $pharmacy_services_list->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $pharmacy_services_list->amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_services_list->SortUrl($pharmacy_services_list->amount) ?>', 1);"><div id="elh_pharmacy_services_amount" class="pharmacy_services_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services_list->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services_list->amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_services_list->amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services_list->charged_date->Visible) { // charged_date ?>
	<?php if ($pharmacy_services_list->SortUrl($pharmacy_services_list->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $pharmacy_services_list->charged_date->headerCellClass() ?>"><div id="elh_pharmacy_services_charged_date" class="pharmacy_services_charged_date"><div class="ew-table-header-caption"><?php echo $pharmacy_services_list->charged_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $pharmacy_services_list->charged_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_services_list->SortUrl($pharmacy_services_list->charged_date) ?>', 1);"><div id="elh_pharmacy_services_charged_date" class="pharmacy_services_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services_list->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services_list->charged_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_services_list->charged_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services_list->status->Visible) { // status ?>
	<?php if ($pharmacy_services_list->SortUrl($pharmacy_services_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $pharmacy_services_list->status->headerCellClass() ?>"><div id="elh_pharmacy_services_status" class="pharmacy_services_status"><div class="ew-table-header-caption"><?php echo $pharmacy_services_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $pharmacy_services_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_services_list->SortUrl($pharmacy_services_list->status) ?>', 1);"><div id="elh_pharmacy_services_status" class="pharmacy_services_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_services_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_services_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_services_list->ExportAll && $pharmacy_services_list->isExport()) {
	$pharmacy_services_list->StopRecord = $pharmacy_services_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_services_list->TotalRecords > $pharmacy_services_list->StartRecord + $pharmacy_services_list->DisplayRecords - 1)
		$pharmacy_services_list->StopRecord = $pharmacy_services_list->StartRecord + $pharmacy_services_list->DisplayRecords - 1;
	else
		$pharmacy_services_list->StopRecord = $pharmacy_services_list->TotalRecords;
}
$pharmacy_services_list->RecordCount = $pharmacy_services_list->StartRecord - 1;
if ($pharmacy_services_list->Recordset && !$pharmacy_services_list->Recordset->EOF) {
	$pharmacy_services_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_services_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_services_list->StartRecord > 1)
		$pharmacy_services_list->Recordset->move($pharmacy_services_list->StartRecord - 1);
} elseif (!$pharmacy_services->AllowAddDeleteRow && $pharmacy_services_list->StopRecord == 0) {
	$pharmacy_services_list->StopRecord = $pharmacy_services->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_services->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_services->resetAttributes();
$pharmacy_services_list->renderRow();
while ($pharmacy_services_list->RecordCount < $pharmacy_services_list->StopRecord) {
	$pharmacy_services_list->RecordCount++;
	if ($pharmacy_services_list->RecordCount >= $pharmacy_services_list->StartRecord) {
		$pharmacy_services_list->RowCount++;

		// Set up key count
		$pharmacy_services_list->KeyCount = $pharmacy_services_list->RowIndex;

		// Init row class and style
		$pharmacy_services->resetAttributes();
		$pharmacy_services->CssClass = "";
		if ($pharmacy_services_list->isGridAdd()) {
		} else {
			$pharmacy_services_list->loadRowValues($pharmacy_services_list->Recordset); // Load row values
		}
		$pharmacy_services->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_services->RowAttrs->merge(["data-rowindex" => $pharmacy_services_list->RowCount, "id" => "r" . $pharmacy_services_list->RowCount . "_pharmacy_services", "data-rowtype" => $pharmacy_services->RowType]);

		// Render row
		$pharmacy_services_list->renderRow();

		// Render list options
		$pharmacy_services_list->renderListOptions();
?>
	<tr <?php echo $pharmacy_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_services_list->ListOptions->render("body", "left", $pharmacy_services_list->RowCount);
?>
	<?php if ($pharmacy_services_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_services_list->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_list->RowCount ?>_pharmacy_services_id">
<span<?php echo $pharmacy_services_list->id->viewAttributes() ?>><?php echo $pharmacy_services_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_services_list->pharmacy_id->Visible) { // pharmacy_id ?>
		<td data-name="pharmacy_id" <?php echo $pharmacy_services_list->pharmacy_id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_list->RowCount ?>_pharmacy_services_pharmacy_id">
<span<?php echo $pharmacy_services_list->pharmacy_id->viewAttributes() ?>><?php echo $pharmacy_services_list->pharmacy_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_services_list->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id" <?php echo $pharmacy_services_list->patient_id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_list->RowCount ?>_pharmacy_services_patient_id">
<span<?php echo $pharmacy_services_list->patient_id->viewAttributes() ?>><?php echo $pharmacy_services_list->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_services_list->name->Visible) { // name ?>
		<td data-name="name" <?php echo $pharmacy_services_list->name->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_list->RowCount ?>_pharmacy_services_name">
<span<?php echo $pharmacy_services_list->name->viewAttributes() ?>><?php echo $pharmacy_services_list->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_services_list->amount->Visible) { // amount ?>
		<td data-name="amount" <?php echo $pharmacy_services_list->amount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_list->RowCount ?>_pharmacy_services_amount">
<span<?php echo $pharmacy_services_list->amount->viewAttributes() ?>><?php echo $pharmacy_services_list->amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_services_list->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date" <?php echo $pharmacy_services_list->charged_date->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_list->RowCount ?>_pharmacy_services_charged_date">
<span<?php echo $pharmacy_services_list->charged_date->viewAttributes() ?>><?php echo $pharmacy_services_list->charged_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_services_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $pharmacy_services_list->status->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_list->RowCount ?>_pharmacy_services_status">
<span<?php echo $pharmacy_services_list->status->viewAttributes() ?>><?php echo $pharmacy_services_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_services_list->ListOptions->render("body", "right", $pharmacy_services_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pharmacy_services_list->isGridAdd())
		$pharmacy_services_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pharmacy_services->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_services_list->Recordset)
	$pharmacy_services_list->Recordset->Close();
?>
<?php if (!$pharmacy_services_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_services_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_services_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_services_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_services_list->TotalRecords == 0 && !$pharmacy_services->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_services_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_services_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pharmacy_services->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_services",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_services_list->terminate();
?>