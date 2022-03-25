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
$patient_room_list = new patient_room_list();

// Run the page
$patient_room_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_room_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_room_list->isExport()) { ?>
<script>
var fpatient_roomlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpatient_roomlist = currentForm = new ew.Form("fpatient_roomlist", "list");
	fpatient_roomlist.formKeyCountName = '<?php echo $patient_room_list->FormKeyCountName ?>';
	loadjs.done("fpatient_roomlist");
});
var fpatient_roomlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpatient_roomlistsrch = currentSearchForm = new ew.Form("fpatient_roomlistsrch");

	// Dynamic selection lists
	// Filters

	fpatient_roomlistsrch.filterList = <?php echo $patient_room_list->getFilterList() ?>;
	loadjs.done("fpatient_roomlistsrch");
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
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$patient_room_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_room_list->TotalRecords > 0 && $patient_room_list->ExportOptions->visible()) { ?>
<?php $patient_room_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_room_list->ImportOptions->visible()) { ?>
<?php $patient_room_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_room_list->SearchOptions->visible()) { ?>
<?php $patient_room_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_room_list->FilterOptions->visible()) { ?>
<?php $patient_room_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_room_list->isExport() || Config("EXPORT_MASTER_RECORD") && $patient_room_list->isExport("print")) { ?>
<?php
if ($patient_room_list->DbMasterFilter != "" && $patient_room->getCurrentMasterTable() == "ip_admission") {
	if ($patient_room_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_room_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_room_list->isExport() && !$patient_room->CurrentAction) { ?>
<form name="fpatient_roomlistsrch" id="fpatient_roomlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpatient_roomlistsrch-search-panel" class="<?php echo $patient_room_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_room">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $patient_room_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($patient_room_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($patient_room_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_room_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_room_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_room_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_room_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_room_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $patient_room_list->showPageHeader(); ?>
<?php
$patient_room_list->showMessage();
?>
<?php if ($patient_room_list->TotalRecords > 0 || $patient_room->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_room_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_room">
<?php if (!$patient_room_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_room_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_room_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_room_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_roomlist" id="fpatient_roomlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_room">
<?php if ($patient_room->getCurrentMasterTable() == "ip_admission" && $patient_room->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_room_list->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_room_list->mrnno->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_room_list->PatID->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_room" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($patient_room_list->TotalRecords > 0 || $patient_room_list->isGridEdit()) { ?>
<table id="tbl_patient_roomlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_room->RowType = ROWTYPE_HEADER;

// Render list options
$patient_room_list->renderListOptions();

// Render list options (header, left)
$patient_room_list->ListOptions->render("header", "left");
?>
<?php if ($patient_room_list->id->Visible) { // id ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_room_list->id->headerCellClass() ?>"><div id="elh_patient_room_id" class="patient_room_id"><div class="ew-table-header-caption"><?php echo $patient_room_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_room_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->id) ?>', 1);"><div id="elh_patient_room_id" class="patient_room_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->Reception->Visible) { // Reception ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_room_list->Reception->headerCellClass() ?>"><div id="elh_patient_room_Reception" class="patient_room_Reception"><div class="ew-table-header-caption"><?php echo $patient_room_list->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_room_list->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->Reception) ?>', 1);"><div id="elh_patient_room_Reception" class="patient_room_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_room_list->PatientId->headerCellClass() ?>"><div id="elh_patient_room_PatientId" class="patient_room_PatientId"><div class="ew-table-header-caption"><?php echo $patient_room_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_room_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->PatientId) ?>', 1);"><div id="elh_patient_room_PatientId" class="patient_room_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_room_list->mrnno->headerCellClass() ?>"><div id="elh_patient_room_mrnno" class="patient_room_mrnno"><div class="ew-table-header-caption"><?php echo $patient_room_list->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_room_list->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->mrnno) ?>', 1);"><div id="elh_patient_room_mrnno" class="patient_room_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_room_list->PatientName->headerCellClass() ?>"><div id="elh_patient_room_PatientName" class="patient_room_PatientName"><div class="ew-table-header-caption"><?php echo $patient_room_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_room_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->PatientName) ?>', 1);"><div id="elh_patient_room_PatientName" class="patient_room_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->Gender->Visible) { // Gender ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_room_list->Gender->headerCellClass() ?>"><div id="elh_patient_room_Gender" class="patient_room_Gender"><div class="ew-table-header-caption"><?php echo $patient_room_list->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_room_list->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->Gender) ?>', 1);"><div id="elh_patient_room_Gender" class="patient_room_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->RoomID->Visible) { // RoomID ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->RoomID) == "") { ?>
		<th data-name="RoomID" class="<?php echo $patient_room_list->RoomID->headerCellClass() ?>"><div id="elh_patient_room_RoomID" class="patient_room_RoomID"><div class="ew-table-header-caption"><?php echo $patient_room_list->RoomID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoomID" class="<?php echo $patient_room_list->RoomID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->RoomID) ?>', 1);"><div id="elh_patient_room_RoomID" class="patient_room_RoomID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->RoomID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->RoomID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->RoomID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->RoomNo->Visible) { // RoomNo ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->RoomNo) == "") { ?>
		<th data-name="RoomNo" class="<?php echo $patient_room_list->RoomNo->headerCellClass() ?>"><div id="elh_patient_room_RoomNo" class="patient_room_RoomNo"><div class="ew-table-header-caption"><?php echo $patient_room_list->RoomNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoomNo" class="<?php echo $patient_room_list->RoomNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->RoomNo) ?>', 1);"><div id="elh_patient_room_RoomNo" class="patient_room_RoomNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->RoomNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->RoomNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->RoomNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->RoomType->Visible) { // RoomType ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->RoomType) == "") { ?>
		<th data-name="RoomType" class="<?php echo $patient_room_list->RoomType->headerCellClass() ?>"><div id="elh_patient_room_RoomType" class="patient_room_RoomType"><div class="ew-table-header-caption"><?php echo $patient_room_list->RoomType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoomType" class="<?php echo $patient_room_list->RoomType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->RoomType) ?>', 1);"><div id="elh_patient_room_RoomType" class="patient_room_RoomType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->RoomType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->RoomType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->RoomType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->SharingRoom->Visible) { // SharingRoom ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->SharingRoom) == "") { ?>
		<th data-name="SharingRoom" class="<?php echo $patient_room_list->SharingRoom->headerCellClass() ?>"><div id="elh_patient_room_SharingRoom" class="patient_room_SharingRoom"><div class="ew-table-header-caption"><?php echo $patient_room_list->SharingRoom->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SharingRoom" class="<?php echo $patient_room_list->SharingRoom->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->SharingRoom) ?>', 1);"><div id="elh_patient_room_SharingRoom" class="patient_room_SharingRoom">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->SharingRoom->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->SharingRoom->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->SharingRoom->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->Amount->Visible) { // Amount ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $patient_room_list->Amount->headerCellClass() ?>"><div id="elh_patient_room_Amount" class="patient_room_Amount"><div class="ew-table-header-caption"><?php echo $patient_room_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $patient_room_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->Amount) ?>', 1);"><div id="elh_patient_room_Amount" class="patient_room_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->Startdatetime->Visible) { // Startdatetime ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->Startdatetime) == "") { ?>
		<th data-name="Startdatetime" class="<?php echo $patient_room_list->Startdatetime->headerCellClass() ?>"><div id="elh_patient_room_Startdatetime" class="patient_room_Startdatetime"><div class="ew-table-header-caption"><?php echo $patient_room_list->Startdatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Startdatetime" class="<?php echo $patient_room_list->Startdatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->Startdatetime) ?>', 1);"><div id="elh_patient_room_Startdatetime" class="patient_room_Startdatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->Startdatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->Startdatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->Startdatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->Enddatetime->Visible) { // Enddatetime ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->Enddatetime) == "") { ?>
		<th data-name="Enddatetime" class="<?php echo $patient_room_list->Enddatetime->headerCellClass() ?>"><div id="elh_patient_room_Enddatetime" class="patient_room_Enddatetime"><div class="ew-table-header-caption"><?php echo $patient_room_list->Enddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Enddatetime" class="<?php echo $patient_room_list->Enddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->Enddatetime) ?>', 1);"><div id="elh_patient_room_Enddatetime" class="patient_room_Enddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->Enddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->Enddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->Enddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->DaysHours->Visible) { // DaysHours ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->DaysHours) == "") { ?>
		<th data-name="DaysHours" class="<?php echo $patient_room_list->DaysHours->headerCellClass() ?>"><div id="elh_patient_room_DaysHours" class="patient_room_DaysHours"><div class="ew-table-header-caption"><?php echo $patient_room_list->DaysHours->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DaysHours" class="<?php echo $patient_room_list->DaysHours->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->DaysHours) ?>', 1);"><div id="elh_patient_room_DaysHours" class="patient_room_DaysHours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->DaysHours->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->DaysHours->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->DaysHours->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->Days->Visible) { // Days ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->Days) == "") { ?>
		<th data-name="Days" class="<?php echo $patient_room_list->Days->headerCellClass() ?>"><div id="elh_patient_room_Days" class="patient_room_Days"><div class="ew-table-header-caption"><?php echo $patient_room_list->Days->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Days" class="<?php echo $patient_room_list->Days->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->Days) ?>', 1);"><div id="elh_patient_room_Days" class="patient_room_Days">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->Days->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->Days->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->Days->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->Hours->Visible) { // Hours ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->Hours) == "") { ?>
		<th data-name="Hours" class="<?php echo $patient_room_list->Hours->headerCellClass() ?>"><div id="elh_patient_room_Hours" class="patient_room_Hours"><div class="ew-table-header-caption"><?php echo $patient_room_list->Hours->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Hours" class="<?php echo $patient_room_list->Hours->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->Hours) ?>', 1);"><div id="elh_patient_room_Hours" class="patient_room_Hours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->Hours->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->Hours->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->Hours->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->TotalAmount->Visible) { // TotalAmount ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->TotalAmount) == "") { ?>
		<th data-name="TotalAmount" class="<?php echo $patient_room_list->TotalAmount->headerCellClass() ?>"><div id="elh_patient_room_TotalAmount" class="patient_room_TotalAmount"><div class="ew-table-header-caption"><?php echo $patient_room_list->TotalAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalAmount" class="<?php echo $patient_room_list->TotalAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->TotalAmount) ?>', 1);"><div id="elh_patient_room_TotalAmount" class="patient_room_TotalAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->TotalAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->TotalAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->TotalAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->PatID->Visible) { // PatID ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_room_list->PatID->headerCellClass() ?>"><div id="elh_patient_room_PatID" class="patient_room_PatID"><div class="ew-table-header-caption"><?php echo $patient_room_list->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_room_list->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->PatID) ?>', 1);"><div id="elh_patient_room_PatID" class="patient_room_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->PatID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_room_list->MobileNumber->headerCellClass() ?>"><div id="elh_patient_room_MobileNumber" class="patient_room_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_room_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_room_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->MobileNumber) ?>', 1);"><div id="elh_patient_room_MobileNumber" class="patient_room_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->HospID->Visible) { // HospID ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_room_list->HospID->headerCellClass() ?>"><div id="elh_patient_room_HospID" class="patient_room_HospID"><div class="ew-table-header-caption"><?php echo $patient_room_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_room_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->HospID) ?>', 1);"><div id="elh_patient_room_HospID" class="patient_room_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->status->Visible) { // status ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_room_list->status->headerCellClass() ?>"><div id="elh_patient_room_status" class="patient_room_status"><div class="ew-table-header-caption"><?php echo $patient_room_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_room_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->status) ?>', 1);"><div id="elh_patient_room_status" class="patient_room_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->createdby->Visible) { // createdby ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_room_list->createdby->headerCellClass() ?>"><div id="elh_patient_room_createdby" class="patient_room_createdby"><div class="ew-table-header-caption"><?php echo $patient_room_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_room_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->createdby) ?>', 1);"><div id="elh_patient_room_createdby" class="patient_room_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_room_list->createddatetime->headerCellClass() ?>"><div id="elh_patient_room_createddatetime" class="patient_room_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_room_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_room_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->createddatetime) ?>', 1);"><div id="elh_patient_room_createddatetime" class="patient_room_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_room_list->modifiedby->headerCellClass() ?>"><div id="elh_patient_room_modifiedby" class="patient_room_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_room_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_room_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->modifiedby) ?>', 1);"><div id="elh_patient_room_modifiedby" class="patient_room_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_room_list->SortUrl($patient_room_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_room_list->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_room_modifieddatetime" class="patient_room_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_room_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_room_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_room_list->SortUrl($patient_room_list->modifieddatetime) ?>', 1);"><div id="elh_patient_room_modifieddatetime" class="patient_room_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_room_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_room_list->ExportAll && $patient_room_list->isExport()) {
	$patient_room_list->StopRecord = $patient_room_list->TotalRecords;
} else {

	// Set the last record to display
	if ($patient_room_list->TotalRecords > $patient_room_list->StartRecord + $patient_room_list->DisplayRecords - 1)
		$patient_room_list->StopRecord = $patient_room_list->StartRecord + $patient_room_list->DisplayRecords - 1;
	else
		$patient_room_list->StopRecord = $patient_room_list->TotalRecords;
}
$patient_room_list->RecordCount = $patient_room_list->StartRecord - 1;
if ($patient_room_list->Recordset && !$patient_room_list->Recordset->EOF) {
	$patient_room_list->Recordset->moveFirst();
	$selectLimit = $patient_room_list->UseSelectLimit;
	if (!$selectLimit && $patient_room_list->StartRecord > 1)
		$patient_room_list->Recordset->move($patient_room_list->StartRecord - 1);
} elseif (!$patient_room->AllowAddDeleteRow && $patient_room_list->StopRecord == 0) {
	$patient_room_list->StopRecord = $patient_room->GridAddRowCount;
}

// Initialize aggregate
$patient_room->RowType = ROWTYPE_AGGREGATEINIT;
$patient_room->resetAttributes();
$patient_room_list->renderRow();
while ($patient_room_list->RecordCount < $patient_room_list->StopRecord) {
	$patient_room_list->RecordCount++;
	if ($patient_room_list->RecordCount >= $patient_room_list->StartRecord) {
		$patient_room_list->RowCount++;

		// Set up key count
		$patient_room_list->KeyCount = $patient_room_list->RowIndex;

		// Init row class and style
		$patient_room->resetAttributes();
		$patient_room->CssClass = "";
		if ($patient_room_list->isGridAdd()) {
		} else {
			$patient_room_list->loadRowValues($patient_room_list->Recordset); // Load row values
		}
		$patient_room->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_room->RowAttrs->merge(["data-rowindex" => $patient_room_list->RowCount, "id" => "r" . $patient_room_list->RowCount . "_patient_room", "data-rowtype" => $patient_room->RowType]);

		// Render row
		$patient_room_list->renderRow();

		// Render list options
		$patient_room_list->renderListOptions();
?>
	<tr <?php echo $patient_room->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_room_list->ListOptions->render("body", "left", $patient_room_list->RowCount);
?>
	<?php if ($patient_room_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_room_list->id->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_id">
<span<?php echo $patient_room_list->id->viewAttributes() ?>><?php echo $patient_room_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $patient_room_list->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_Reception">
<span<?php echo $patient_room_list->Reception->viewAttributes() ?>><?php echo $patient_room_list->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $patient_room_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_PatientId">
<span<?php echo $patient_room_list->PatientId->viewAttributes() ?>><?php echo $patient_room_list->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_room_list->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_mrnno">
<span<?php echo $patient_room_list->mrnno->viewAttributes() ?>><?php echo $patient_room_list->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $patient_room_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_PatientName">
<span<?php echo $patient_room_list->PatientName->viewAttributes() ?>><?php echo $patient_room_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $patient_room_list->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_Gender">
<span<?php echo $patient_room_list->Gender->viewAttributes() ?>><?php echo $patient_room_list->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->RoomID->Visible) { // RoomID ?>
		<td data-name="RoomID" <?php echo $patient_room_list->RoomID->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_RoomID">
<span<?php echo $patient_room_list->RoomID->viewAttributes() ?>><?php echo $patient_room_list->RoomID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->RoomNo->Visible) { // RoomNo ?>
		<td data-name="RoomNo" <?php echo $patient_room_list->RoomNo->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_RoomNo">
<span<?php echo $patient_room_list->RoomNo->viewAttributes() ?>><?php echo $patient_room_list->RoomNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->RoomType->Visible) { // RoomType ?>
		<td data-name="RoomType" <?php echo $patient_room_list->RoomType->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_RoomType">
<span<?php echo $patient_room_list->RoomType->viewAttributes() ?>><?php echo $patient_room_list->RoomType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->SharingRoom->Visible) { // SharingRoom ?>
		<td data-name="SharingRoom" <?php echo $patient_room_list->SharingRoom->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_SharingRoom">
<span<?php echo $patient_room_list->SharingRoom->viewAttributes() ?>><?php echo $patient_room_list->SharingRoom->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $patient_room_list->Amount->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_Amount">
<span<?php echo $patient_room_list->Amount->viewAttributes() ?>><?php echo $patient_room_list->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->Startdatetime->Visible) { // Startdatetime ?>
		<td data-name="Startdatetime" <?php echo $patient_room_list->Startdatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_Startdatetime">
<span<?php echo $patient_room_list->Startdatetime->viewAttributes() ?>><?php echo $patient_room_list->Startdatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->Enddatetime->Visible) { // Enddatetime ?>
		<td data-name="Enddatetime" <?php echo $patient_room_list->Enddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_Enddatetime">
<span<?php echo $patient_room_list->Enddatetime->viewAttributes() ?>><?php echo $patient_room_list->Enddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->DaysHours->Visible) { // DaysHours ?>
		<td data-name="DaysHours" <?php echo $patient_room_list->DaysHours->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_DaysHours">
<span<?php echo $patient_room_list->DaysHours->viewAttributes() ?>><?php echo $patient_room_list->DaysHours->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->Days->Visible) { // Days ?>
		<td data-name="Days" <?php echo $patient_room_list->Days->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_Days">
<span<?php echo $patient_room_list->Days->viewAttributes() ?>><?php echo $patient_room_list->Days->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->Hours->Visible) { // Hours ?>
		<td data-name="Hours" <?php echo $patient_room_list->Hours->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_Hours">
<span<?php echo $patient_room_list->Hours->viewAttributes() ?>><?php echo $patient_room_list->Hours->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->TotalAmount->Visible) { // TotalAmount ?>
		<td data-name="TotalAmount" <?php echo $patient_room_list->TotalAmount->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_TotalAmount">
<span<?php echo $patient_room_list->TotalAmount->viewAttributes() ?>><?php echo $patient_room_list->TotalAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $patient_room_list->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_PatID">
<span<?php echo $patient_room_list->PatID->viewAttributes() ?>><?php echo $patient_room_list->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $patient_room_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_MobileNumber">
<span<?php echo $patient_room_list->MobileNumber->viewAttributes() ?>><?php echo $patient_room_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $patient_room_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_HospID">
<span<?php echo $patient_room_list->HospID->viewAttributes() ?>><?php echo $patient_room_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $patient_room_list->status->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_status">
<span<?php echo $patient_room_list->status->viewAttributes() ?>><?php echo $patient_room_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $patient_room_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_createdby">
<span<?php echo $patient_room_list->createdby->viewAttributes() ?>><?php echo $patient_room_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $patient_room_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_createddatetime">
<span<?php echo $patient_room_list->createddatetime->viewAttributes() ?>><?php echo $patient_room_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $patient_room_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_modifiedby">
<span<?php echo $patient_room_list->modifiedby->viewAttributes() ?>><?php echo $patient_room_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $patient_room_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCount ?>_patient_room_modifieddatetime">
<span<?php echo $patient_room_list->modifieddatetime->viewAttributes() ?>><?php echo $patient_room_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_room_list->ListOptions->render("body", "right", $patient_room_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$patient_room_list->isGridAdd())
		$patient_room_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$patient_room->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_room_list->Recordset)
	$patient_room_list->Recordset->Close();
?>
<?php if (!$patient_room_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_room_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_room_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_room_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_room_list->TotalRecords == 0 && !$patient_room->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_room_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_room_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_room_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_room_list->terminate();
?>