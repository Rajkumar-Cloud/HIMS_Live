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
$pharmacy_list = new pharmacy_list();

// Run the page
$pharmacy_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_list->isExport()) { ?>
<script>
var fpharmacylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacylist = currentForm = new ew.Form("fpharmacylist", "list");
	fpharmacylist.formKeyCountName = '<?php echo $pharmacy_list->FormKeyCountName ?>';
	loadjs.done("fpharmacylist");
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
<?php if (!$pharmacy_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_list->TotalRecords > 0 && $pharmacy_list->ExportOptions->visible()) { ?>
<?php $pharmacy_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_list->ImportOptions->visible()) { ?>
<?php $pharmacy_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_list->renderOtherOptions();
?>
<?php $pharmacy_list->showPageHeader(); ?>
<?php
$pharmacy_list->showMessage();
?>
<?php if ($pharmacy_list->TotalRecords > 0 || $pharmacy->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy">
<?php if (!$pharmacy_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacylist" id="fpharmacylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy">
<div id="gmp_pharmacy" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_list->TotalRecords > 0 || $pharmacy_list->isGridEdit()) { ?>
<table id="tbl_pharmacylist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_list->renderListOptions();

// Render list options (header, left)
$pharmacy_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_list->id->Visible) { // id ?>
	<?php if ($pharmacy_list->SortUrl($pharmacy_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_list->id->headerCellClass() ?>"><div id="elh_pharmacy_id" class="pharmacy_id"><div class="ew-table-header-caption"><?php echo $pharmacy_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_list->SortUrl($pharmacy_list->id) ?>', 1);"><div id="elh_pharmacy_id" class="pharmacy_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_list->op_id->Visible) { // op_id ?>
	<?php if ($pharmacy_list->SortUrl($pharmacy_list->op_id) == "") { ?>
		<th data-name="op_id" class="<?php echo $pharmacy_list->op_id->headerCellClass() ?>"><div id="elh_pharmacy_op_id" class="pharmacy_op_id"><div class="ew-table-header-caption"><?php echo $pharmacy_list->op_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="op_id" class="<?php echo $pharmacy_list->op_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_list->SortUrl($pharmacy_list->op_id) ?>', 1);"><div id="elh_pharmacy_op_id" class="pharmacy_op_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_list->op_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_list->op_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_list->op_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_list->ip_id->Visible) { // ip_id ?>
	<?php if ($pharmacy_list->SortUrl($pharmacy_list->ip_id) == "") { ?>
		<th data-name="ip_id" class="<?php echo $pharmacy_list->ip_id->headerCellClass() ?>"><div id="elh_pharmacy_ip_id" class="pharmacy_ip_id"><div class="ew-table-header-caption"><?php echo $pharmacy_list->ip_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ip_id" class="<?php echo $pharmacy_list->ip_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_list->SortUrl($pharmacy_list->ip_id) ?>', 1);"><div id="elh_pharmacy_ip_id" class="pharmacy_ip_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_list->ip_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_list->ip_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_list->ip_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_list->patient_id->Visible) { // patient_id ?>
	<?php if ($pharmacy_list->SortUrl($pharmacy_list->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $pharmacy_list->patient_id->headerCellClass() ?>"><div id="elh_pharmacy_patient_id" class="pharmacy_patient_id"><div class="ew-table-header-caption"><?php echo $pharmacy_list->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $pharmacy_list->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_list->SortUrl($pharmacy_list->patient_id) ?>', 1);"><div id="elh_pharmacy_patient_id" class="pharmacy_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_list->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_list->patient_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_list->patient_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_list->charged_date->Visible) { // charged_date ?>
	<?php if ($pharmacy_list->SortUrl($pharmacy_list->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $pharmacy_list->charged_date->headerCellClass() ?>"><div id="elh_pharmacy_charged_date" class="pharmacy_charged_date"><div class="ew-table-header-caption"><?php echo $pharmacy_list->charged_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $pharmacy_list->charged_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_list->SortUrl($pharmacy_list->charged_date) ?>', 1);"><div id="elh_pharmacy_charged_date" class="pharmacy_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_list->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_list->charged_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_list->charged_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_list->status->Visible) { // status ?>
	<?php if ($pharmacy_list->SortUrl($pharmacy_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $pharmacy_list->status->headerCellClass() ?>"><div id="elh_pharmacy_status" class="pharmacy_status"><div class="ew-table-header-caption"><?php echo $pharmacy_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $pharmacy_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_list->SortUrl($pharmacy_list->status) ?>', 1);"><div id="elh_pharmacy_status" class="pharmacy_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_list->ExportAll && $pharmacy_list->isExport()) {
	$pharmacy_list->StopRecord = $pharmacy_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_list->TotalRecords > $pharmacy_list->StartRecord + $pharmacy_list->DisplayRecords - 1)
		$pharmacy_list->StopRecord = $pharmacy_list->StartRecord + $pharmacy_list->DisplayRecords - 1;
	else
		$pharmacy_list->StopRecord = $pharmacy_list->TotalRecords;
}
$pharmacy_list->RecordCount = $pharmacy_list->StartRecord - 1;
if ($pharmacy_list->Recordset && !$pharmacy_list->Recordset->EOF) {
	$pharmacy_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_list->StartRecord > 1)
		$pharmacy_list->Recordset->move($pharmacy_list->StartRecord - 1);
} elseif (!$pharmacy->AllowAddDeleteRow && $pharmacy_list->StopRecord == 0) {
	$pharmacy_list->StopRecord = $pharmacy->GridAddRowCount;
}

// Initialize aggregate
$pharmacy->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy->resetAttributes();
$pharmacy_list->renderRow();
while ($pharmacy_list->RecordCount < $pharmacy_list->StopRecord) {
	$pharmacy_list->RecordCount++;
	if ($pharmacy_list->RecordCount >= $pharmacy_list->StartRecord) {
		$pharmacy_list->RowCount++;

		// Set up key count
		$pharmacy_list->KeyCount = $pharmacy_list->RowIndex;

		// Init row class and style
		$pharmacy->resetAttributes();
		$pharmacy->CssClass = "";
		if ($pharmacy_list->isGridAdd()) {
		} else {
			$pharmacy_list->loadRowValues($pharmacy_list->Recordset); // Load row values
		}
		$pharmacy->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy->RowAttrs->merge(["data-rowindex" => $pharmacy_list->RowCount, "id" => "r" . $pharmacy_list->RowCount . "_pharmacy", "data-rowtype" => $pharmacy->RowType]);

		// Render row
		$pharmacy_list->renderRow();

		// Render list options
		$pharmacy_list->renderListOptions();
?>
	<tr <?php echo $pharmacy->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_list->ListOptions->render("body", "left", $pharmacy_list->RowCount);
?>
	<?php if ($pharmacy_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_list->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_list->RowCount ?>_pharmacy_id">
<span<?php echo $pharmacy_list->id->viewAttributes() ?>><?php echo $pharmacy_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_list->op_id->Visible) { // op_id ?>
		<td data-name="op_id" <?php echo $pharmacy_list->op_id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_list->RowCount ?>_pharmacy_op_id">
<span<?php echo $pharmacy_list->op_id->viewAttributes() ?>><?php echo $pharmacy_list->op_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_list->ip_id->Visible) { // ip_id ?>
		<td data-name="ip_id" <?php echo $pharmacy_list->ip_id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_list->RowCount ?>_pharmacy_ip_id">
<span<?php echo $pharmacy_list->ip_id->viewAttributes() ?>><?php echo $pharmacy_list->ip_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_list->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id" <?php echo $pharmacy_list->patient_id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_list->RowCount ?>_pharmacy_patient_id">
<span<?php echo $pharmacy_list->patient_id->viewAttributes() ?>><?php echo $pharmacy_list->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_list->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date" <?php echo $pharmacy_list->charged_date->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_list->RowCount ?>_pharmacy_charged_date">
<span<?php echo $pharmacy_list->charged_date->viewAttributes() ?>><?php echo $pharmacy_list->charged_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $pharmacy_list->status->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_list->RowCount ?>_pharmacy_status">
<span<?php echo $pharmacy_list->status->viewAttributes() ?>><?php echo $pharmacy_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_list->ListOptions->render("body", "right", $pharmacy_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pharmacy_list->isGridAdd())
		$pharmacy_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pharmacy->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_list->Recordset)
	$pharmacy_list->Recordset->Close();
?>
<?php if (!$pharmacy_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_list->TotalRecords == 0 && !$pharmacy->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pharmacy->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_list->terminate();
?>