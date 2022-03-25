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
$view_treatment_culture_list = new view_treatment_culture_list();

// Run the page
$view_treatment_culture_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_treatment_culture_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_treatment_culture_list->isExport()) { ?>
<script>
var fview_treatment_culturelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_treatment_culturelist = currentForm = new ew.Form("fview_treatment_culturelist", "list");
	fview_treatment_culturelist.formKeyCountName = '<?php echo $view_treatment_culture_list->FormKeyCountName ?>';
	loadjs.done("fview_treatment_culturelist");
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
<?php if (!$view_treatment_culture_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_treatment_culture_list->TotalRecords > 0 && $view_treatment_culture_list->ExportOptions->visible()) { ?>
<?php $view_treatment_culture_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_treatment_culture_list->ImportOptions->visible()) { ?>
<?php $view_treatment_culture_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_treatment_culture_list->renderOtherOptions();
?>
<?php $view_treatment_culture_list->showPageHeader(); ?>
<?php
$view_treatment_culture_list->showMessage();
?>
<?php if ($view_treatment_culture_list->TotalRecords > 0 || $view_treatment_culture->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_treatment_culture_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_treatment_culture">
<?php if (!$view_treatment_culture_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_treatment_culture_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_treatment_culture_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_treatment_culture_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_treatment_culturelist" id="fview_treatment_culturelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_treatment_culture">
<div id="gmp_view_treatment_culture" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_treatment_culture_list->TotalRecords > 0 || $view_treatment_culture_list->isGridEdit()) { ?>
<table id="tbl_view_treatment_culturelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_treatment_culture->RowType = ROWTYPE_HEADER;

// Render list options
$view_treatment_culture_list->renderListOptions();

// Render list options (header, left)
$view_treatment_culture_list->ListOptions->render("header", "left");
?>
<?php if ($view_treatment_culture_list->TidNo->Visible) { // TidNo ?>
	<?php if ($view_treatment_culture_list->SortUrl($view_treatment_culture_list->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $view_treatment_culture_list->TidNo->headerCellClass() ?>"><div id="elh_view_treatment_culture_TidNo" class="view_treatment_culture_TidNo"><div class="ew-table-header-caption"><?php echo $view_treatment_culture_list->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $view_treatment_culture_list->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_treatment_culture_list->SortUrl($view_treatment_culture_list->TidNo) ?>', 1);"><div id="elh_view_treatment_culture_TidNo" class="view_treatment_culture_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture_list->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture_list->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_treatment_culture_list->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatment_culture_list->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
	<?php if ($view_treatment_culture_list->SortUrl($view_treatment_culture_list->Day0OocyteStage) == "") { ?>
		<th data-name="Day0OocyteStage" class="<?php echo $view_treatment_culture_list->Day0OocyteStage->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day0OocyteStage" class="view_treatment_culture_Day0OocyteStage"><div class="ew-table-header-caption"><?php echo $view_treatment_culture_list->Day0OocyteStage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day0OocyteStage" class="<?php echo $view_treatment_culture_list->Day0OocyteStage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_treatment_culture_list->SortUrl($view_treatment_culture_list->Day0OocyteStage) ?>', 1);"><div id="elh_view_treatment_culture_Day0OocyteStage" class="view_treatment_culture_Day0OocyteStage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture_list->Day0OocyteStage->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture_list->Day0OocyteStage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_treatment_culture_list->Day0OocyteStage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatment_culture_list->Day1->Visible) { // Day1 ?>
	<?php if ($view_treatment_culture_list->SortUrl($view_treatment_culture_list->Day1) == "") { ?>
		<th data-name="Day1" class="<?php echo $view_treatment_culture_list->Day1->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day1" class="view_treatment_culture_Day1"><div class="ew-table-header-caption"><?php echo $view_treatment_culture_list->Day1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day1" class="<?php echo $view_treatment_culture_list->Day1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_treatment_culture_list->SortUrl($view_treatment_culture_list->Day1) ?>', 1);"><div id="elh_view_treatment_culture_Day1" class="view_treatment_culture_Day1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture_list->Day1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture_list->Day1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_treatment_culture_list->Day1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatment_culture_list->Day2->Visible) { // Day2 ?>
	<?php if ($view_treatment_culture_list->SortUrl($view_treatment_culture_list->Day2) == "") { ?>
		<th data-name="Day2" class="<?php echo $view_treatment_culture_list->Day2->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day2" class="view_treatment_culture_Day2"><div class="ew-table-header-caption"><?php echo $view_treatment_culture_list->Day2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day2" class="<?php echo $view_treatment_culture_list->Day2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_treatment_culture_list->SortUrl($view_treatment_culture_list->Day2) ?>', 1);"><div id="elh_view_treatment_culture_Day2" class="view_treatment_culture_Day2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture_list->Day2->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture_list->Day2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_treatment_culture_list->Day2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatment_culture_list->Day3->Visible) { // Day3 ?>
	<?php if ($view_treatment_culture_list->SortUrl($view_treatment_culture_list->Day3) == "") { ?>
		<th data-name="Day3" class="<?php echo $view_treatment_culture_list->Day3->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day3" class="view_treatment_culture_Day3"><div class="ew-table-header-caption"><?php echo $view_treatment_culture_list->Day3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day3" class="<?php echo $view_treatment_culture_list->Day3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_treatment_culture_list->SortUrl($view_treatment_culture_list->Day3) ?>', 1);"><div id="elh_view_treatment_culture_Day3" class="view_treatment_culture_Day3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture_list->Day3->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture_list->Day3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_treatment_culture_list->Day3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatment_culture_list->Day4->Visible) { // Day4 ?>
	<?php if ($view_treatment_culture_list->SortUrl($view_treatment_culture_list->Day4) == "") { ?>
		<th data-name="Day4" class="<?php echo $view_treatment_culture_list->Day4->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day4" class="view_treatment_culture_Day4"><div class="ew-table-header-caption"><?php echo $view_treatment_culture_list->Day4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day4" class="<?php echo $view_treatment_culture_list->Day4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_treatment_culture_list->SortUrl($view_treatment_culture_list->Day4) ?>', 1);"><div id="elh_view_treatment_culture_Day4" class="view_treatment_culture_Day4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture_list->Day4->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture_list->Day4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_treatment_culture_list->Day4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatment_culture_list->Day5->Visible) { // Day5 ?>
	<?php if ($view_treatment_culture_list->SortUrl($view_treatment_culture_list->Day5) == "") { ?>
		<th data-name="Day5" class="<?php echo $view_treatment_culture_list->Day5->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day5" class="view_treatment_culture_Day5"><div class="ew-table-header-caption"><?php echo $view_treatment_culture_list->Day5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day5" class="<?php echo $view_treatment_culture_list->Day5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_treatment_culture_list->SortUrl($view_treatment_culture_list->Day5) ?>', 1);"><div id="elh_view_treatment_culture_Day5" class="view_treatment_culture_Day5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture_list->Day5->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture_list->Day5->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_treatment_culture_list->Day5->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatment_culture_list->Day6->Visible) { // Day6 ?>
	<?php if ($view_treatment_culture_list->SortUrl($view_treatment_culture_list->Day6) == "") { ?>
		<th data-name="Day6" class="<?php echo $view_treatment_culture_list->Day6->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day6" class="view_treatment_culture_Day6"><div class="ew-table-header-caption"><?php echo $view_treatment_culture_list->Day6->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day6" class="<?php echo $view_treatment_culture_list->Day6->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_treatment_culture_list->SortUrl($view_treatment_culture_list->Day6) ?>', 1);"><div id="elh_view_treatment_culture_Day6" class="view_treatment_culture_Day6">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture_list->Day6->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture_list->Day6->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_treatment_culture_list->Day6->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatment_culture_list->ET->Visible) { // ET ?>
	<?php if ($view_treatment_culture_list->SortUrl($view_treatment_culture_list->ET) == "") { ?>
		<th data-name="ET" class="<?php echo $view_treatment_culture_list->ET->headerCellClass() ?>"><div id="elh_view_treatment_culture_ET" class="view_treatment_culture_ET"><div class="ew-table-header-caption"><?php echo $view_treatment_culture_list->ET->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ET" class="<?php echo $view_treatment_culture_list->ET->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_treatment_culture_list->SortUrl($view_treatment_culture_list->ET) ?>', 1);"><div id="elh_view_treatment_culture_ET" class="view_treatment_culture_ET">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture_list->ET->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture_list->ET->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_treatment_culture_list->ET->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatment_culture_list->ETDate->Visible) { // ETDate ?>
	<?php if ($view_treatment_culture_list->SortUrl($view_treatment_culture_list->ETDate) == "") { ?>
		<th data-name="ETDate" class="<?php echo $view_treatment_culture_list->ETDate->headerCellClass() ?>"><div id="elh_view_treatment_culture_ETDate" class="view_treatment_culture_ETDate"><div class="ew-table-header-caption"><?php echo $view_treatment_culture_list->ETDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ETDate" class="<?php echo $view_treatment_culture_list->ETDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_treatment_culture_list->SortUrl($view_treatment_culture_list->ETDate) ?>', 1);"><div id="elh_view_treatment_culture_ETDate" class="view_treatment_culture_ETDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture_list->ETDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture_list->ETDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_treatment_culture_list->ETDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_treatment_culture_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_treatment_culture_list->ExportAll && $view_treatment_culture_list->isExport()) {
	$view_treatment_culture_list->StopRecord = $view_treatment_culture_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_treatment_culture_list->TotalRecords > $view_treatment_culture_list->StartRecord + $view_treatment_culture_list->DisplayRecords - 1)
		$view_treatment_culture_list->StopRecord = $view_treatment_culture_list->StartRecord + $view_treatment_culture_list->DisplayRecords - 1;
	else
		$view_treatment_culture_list->StopRecord = $view_treatment_culture_list->TotalRecords;
}
$view_treatment_culture_list->RecordCount = $view_treatment_culture_list->StartRecord - 1;
if ($view_treatment_culture_list->Recordset && !$view_treatment_culture_list->Recordset->EOF) {
	$view_treatment_culture_list->Recordset->moveFirst();
	$selectLimit = $view_treatment_culture_list->UseSelectLimit;
	if (!$selectLimit && $view_treatment_culture_list->StartRecord > 1)
		$view_treatment_culture_list->Recordset->move($view_treatment_culture_list->StartRecord - 1);
} elseif (!$view_treatment_culture->AllowAddDeleteRow && $view_treatment_culture_list->StopRecord == 0) {
	$view_treatment_culture_list->StopRecord = $view_treatment_culture->GridAddRowCount;
}

// Initialize aggregate
$view_treatment_culture->RowType = ROWTYPE_AGGREGATEINIT;
$view_treatment_culture->resetAttributes();
$view_treatment_culture_list->renderRow();
while ($view_treatment_culture_list->RecordCount < $view_treatment_culture_list->StopRecord) {
	$view_treatment_culture_list->RecordCount++;
	if ($view_treatment_culture_list->RecordCount >= $view_treatment_culture_list->StartRecord) {
		$view_treatment_culture_list->RowCount++;

		// Set up key count
		$view_treatment_culture_list->KeyCount = $view_treatment_culture_list->RowIndex;

		// Init row class and style
		$view_treatment_culture->resetAttributes();
		$view_treatment_culture->CssClass = "";
		if ($view_treatment_culture_list->isGridAdd()) {
		} else {
			$view_treatment_culture_list->loadRowValues($view_treatment_culture_list->Recordset); // Load row values
		}
		$view_treatment_culture->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_treatment_culture->RowAttrs->merge(["data-rowindex" => $view_treatment_culture_list->RowCount, "id" => "r" . $view_treatment_culture_list->RowCount . "_view_treatment_culture", "data-rowtype" => $view_treatment_culture->RowType]);

		// Render row
		$view_treatment_culture_list->renderRow();

		// Render list options
		$view_treatment_culture_list->renderListOptions();
?>
	<tr <?php echo $view_treatment_culture->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_treatment_culture_list->ListOptions->render("body", "left", $view_treatment_culture_list->RowCount);
?>
	<?php if ($view_treatment_culture_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $view_treatment_culture_list->TidNo->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCount ?>_view_treatment_culture_TidNo">
<span<?php echo $view_treatment_culture_list->TidNo->viewAttributes() ?>><?php echo $view_treatment_culture_list->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatment_culture_list->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
		<td data-name="Day0OocyteStage" <?php echo $view_treatment_culture_list->Day0OocyteStage->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCount ?>_view_treatment_culture_Day0OocyteStage">
<span<?php echo $view_treatment_culture_list->Day0OocyteStage->viewAttributes() ?>><?php echo $view_treatment_culture_list->Day0OocyteStage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatment_culture_list->Day1->Visible) { // Day1 ?>
		<td data-name="Day1" <?php echo $view_treatment_culture_list->Day1->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCount ?>_view_treatment_culture_Day1">
<span<?php echo $view_treatment_culture_list->Day1->viewAttributes() ?>><?php echo $view_treatment_culture_list->Day1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatment_culture_list->Day2->Visible) { // Day2 ?>
		<td data-name="Day2" <?php echo $view_treatment_culture_list->Day2->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCount ?>_view_treatment_culture_Day2">
<span<?php echo $view_treatment_culture_list->Day2->viewAttributes() ?>><?php echo $view_treatment_culture_list->Day2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatment_culture_list->Day3->Visible) { // Day3 ?>
		<td data-name="Day3" <?php echo $view_treatment_culture_list->Day3->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCount ?>_view_treatment_culture_Day3">
<span<?php echo $view_treatment_culture_list->Day3->viewAttributes() ?>><?php echo $view_treatment_culture_list->Day3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatment_culture_list->Day4->Visible) { // Day4 ?>
		<td data-name="Day4" <?php echo $view_treatment_culture_list->Day4->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCount ?>_view_treatment_culture_Day4">
<span<?php echo $view_treatment_culture_list->Day4->viewAttributes() ?>><?php echo $view_treatment_culture_list->Day4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatment_culture_list->Day5->Visible) { // Day5 ?>
		<td data-name="Day5" <?php echo $view_treatment_culture_list->Day5->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCount ?>_view_treatment_culture_Day5">
<span<?php echo $view_treatment_culture_list->Day5->viewAttributes() ?>><?php echo $view_treatment_culture_list->Day5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatment_culture_list->Day6->Visible) { // Day6 ?>
		<td data-name="Day6" <?php echo $view_treatment_culture_list->Day6->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCount ?>_view_treatment_culture_Day6">
<span<?php echo $view_treatment_culture_list->Day6->viewAttributes() ?>><?php echo $view_treatment_culture_list->Day6->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatment_culture_list->ET->Visible) { // ET ?>
		<td data-name="ET" <?php echo $view_treatment_culture_list->ET->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCount ?>_view_treatment_culture_ET">
<span<?php echo $view_treatment_culture_list->ET->viewAttributes() ?>><?php echo $view_treatment_culture_list->ET->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatment_culture_list->ETDate->Visible) { // ETDate ?>
		<td data-name="ETDate" <?php echo $view_treatment_culture_list->ETDate->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCount ?>_view_treatment_culture_ETDate">
<span<?php echo $view_treatment_culture_list->ETDate->viewAttributes() ?>><?php echo $view_treatment_culture_list->ETDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_treatment_culture_list->ListOptions->render("body", "right", $view_treatment_culture_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_treatment_culture_list->isGridAdd())
		$view_treatment_culture_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_treatment_culture->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_treatment_culture_list->Recordset)
	$view_treatment_culture_list->Recordset->Close();
?>
<?php if (!$view_treatment_culture_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_treatment_culture_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_treatment_culture_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_treatment_culture_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_treatment_culture_list->TotalRecords == 0 && !$view_treatment_culture->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_treatment_culture_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_treatment_culture_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_treatment_culture_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_treatment_culture->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_treatment_culture",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_treatment_culture_list->terminate();
?>