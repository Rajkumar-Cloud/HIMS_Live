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
$patient_insurance_list = new patient_insurance_list();

// Run the page
$patient_insurance_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_insurance_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_insurance_list->isExport()) { ?>
<script>
var fpatient_insurancelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpatient_insurancelist = currentForm = new ew.Form("fpatient_insurancelist", "list");
	fpatient_insurancelist.formKeyCountName = '<?php echo $patient_insurance_list->FormKeyCountName ?>';
	loadjs.done("fpatient_insurancelist");
});
var fpatient_insurancelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpatient_insurancelistsrch = currentSearchForm = new ew.Form("fpatient_insurancelistsrch");

	// Dynamic selection lists
	// Filters

	fpatient_insurancelistsrch.filterList = <?php echo $patient_insurance_list->getFilterList() ?>;
	loadjs.done("fpatient_insurancelistsrch");
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
<?php if (!$patient_insurance_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_insurance_list->TotalRecords > 0 && $patient_insurance_list->ExportOptions->visible()) { ?>
<?php $patient_insurance_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_insurance_list->ImportOptions->visible()) { ?>
<?php $patient_insurance_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_insurance_list->SearchOptions->visible()) { ?>
<?php $patient_insurance_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_insurance_list->FilterOptions->visible()) { ?>
<?php $patient_insurance_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_insurance_list->isExport() || Config("EXPORT_MASTER_RECORD") && $patient_insurance_list->isExport("print")) { ?>
<?php
if ($patient_insurance_list->DbMasterFilter != "" && $patient_insurance->getCurrentMasterTable() == "ip_admission") {
	if ($patient_insurance_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_insurance_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_insurance_list->isExport() && !$patient_insurance->CurrentAction) { ?>
<form name="fpatient_insurancelistsrch" id="fpatient_insurancelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpatient_insurancelistsrch-search-panel" class="<?php echo $patient_insurance_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_insurance">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $patient_insurance_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($patient_insurance_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($patient_insurance_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_insurance_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_insurance_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_insurance_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_insurance_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_insurance_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $patient_insurance_list->showPageHeader(); ?>
<?php
$patient_insurance_list->showMessage();
?>
<?php if ($patient_insurance_list->TotalRecords > 0 || $patient_insurance->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_insurance_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_insurance">
<?php if (!$patient_insurance_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_insurance_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_insurance_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_insurance_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_insurancelist" id="fpatient_insurancelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_insurance">
<?php if ($patient_insurance->getCurrentMasterTable() == "ip_admission" && $patient_insurance->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_insurance_list->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_insurance_list->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_insurance_list->mrnno->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_insurance" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($patient_insurance_list->TotalRecords > 0 || $patient_insurance_list->isGridEdit()) { ?>
<table id="tbl_patient_insurancelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_insurance->RowType = ROWTYPE_HEADER;

// Render list options
$patient_insurance_list->renderListOptions();

// Render list options (header, left)
$patient_insurance_list->ListOptions->render("header", "left");
?>
<?php if ($patient_insurance_list->id->Visible) { // id ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_insurance_list->id->headerCellClass() ?>"><div id="elh_patient_insurance_id" class="patient_insurance_id"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_insurance_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->id) ?>', 1);"><div id="elh_patient_insurance_id" class="patient_insurance_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->Reception->Visible) { // Reception ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_insurance_list->Reception->headerCellClass() ?>"><div id="elh_patient_insurance_Reception" class="patient_insurance_Reception"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_insurance_list->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->Reception) ?>', 1);"><div id="elh_patient_insurance_Reception" class="patient_insurance_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_insurance_list->PatientId->headerCellClass() ?>"><div id="elh_patient_insurance_PatientId" class="patient_insurance_PatientId"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_insurance_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->PatientId) ?>', 1);"><div id="elh_patient_insurance_PatientId" class="patient_insurance_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_insurance_list->PatientName->headerCellClass() ?>"><div id="elh_patient_insurance_PatientName" class="patient_insurance_PatientName"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_insurance_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->PatientName) ?>', 1);"><div id="elh_patient_insurance_PatientName" class="patient_insurance_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->Company->Visible) { // Company ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->Company) == "") { ?>
		<th data-name="Company" class="<?php echo $patient_insurance_list->Company->headerCellClass() ?>"><div id="elh_patient_insurance_Company" class="patient_insurance_Company"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->Company->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Company" class="<?php echo $patient_insurance_list->Company->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->Company) ?>', 1);"><div id="elh_patient_insurance_Company" class="patient_insurance_Company">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->Company->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->Company->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->Company->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->AddressInsuranceCarierName) == "") { ?>
		<th data-name="AddressInsuranceCarierName" class="<?php echo $patient_insurance_list->AddressInsuranceCarierName->headerCellClass() ?>"><div id="elh_patient_insurance_AddressInsuranceCarierName" class="patient_insurance_AddressInsuranceCarierName"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->AddressInsuranceCarierName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AddressInsuranceCarierName" class="<?php echo $patient_insurance_list->AddressInsuranceCarierName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->AddressInsuranceCarierName) ?>', 1);"><div id="elh_patient_insurance_AddressInsuranceCarierName" class="patient_insurance_AddressInsuranceCarierName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->AddressInsuranceCarierName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->AddressInsuranceCarierName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->AddressInsuranceCarierName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->ContactName->Visible) { // ContactName ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->ContactName) == "") { ?>
		<th data-name="ContactName" class="<?php echo $patient_insurance_list->ContactName->headerCellClass() ?>"><div id="elh_patient_insurance_ContactName" class="patient_insurance_ContactName"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->ContactName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ContactName" class="<?php echo $patient_insurance_list->ContactName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->ContactName) ?>', 1);"><div id="elh_patient_insurance_ContactName" class="patient_insurance_ContactName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->ContactName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->ContactName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->ContactName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->ContactMobile->Visible) { // ContactMobile ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->ContactMobile) == "") { ?>
		<th data-name="ContactMobile" class="<?php echo $patient_insurance_list->ContactMobile->headerCellClass() ?>"><div id="elh_patient_insurance_ContactMobile" class="patient_insurance_ContactMobile"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->ContactMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ContactMobile" class="<?php echo $patient_insurance_list->ContactMobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->ContactMobile) ?>', 1);"><div id="elh_patient_insurance_ContactMobile" class="patient_insurance_ContactMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->ContactMobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->ContactMobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->ContactMobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->PolicyType->Visible) { // PolicyType ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->PolicyType) == "") { ?>
		<th data-name="PolicyType" class="<?php echo $patient_insurance_list->PolicyType->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyType" class="patient_insurance_PolicyType"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->PolicyType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PolicyType" class="<?php echo $patient_insurance_list->PolicyType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->PolicyType) ?>', 1);"><div id="elh_patient_insurance_PolicyType" class="patient_insurance_PolicyType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->PolicyType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->PolicyType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->PolicyType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->PolicyName->Visible) { // PolicyName ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->PolicyName) == "") { ?>
		<th data-name="PolicyName" class="<?php echo $patient_insurance_list->PolicyName->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyName" class="patient_insurance_PolicyName"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->PolicyName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PolicyName" class="<?php echo $patient_insurance_list->PolicyName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->PolicyName) ?>', 1);"><div id="elh_patient_insurance_PolicyName" class="patient_insurance_PolicyName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->PolicyName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->PolicyName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->PolicyName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->PolicyNo->Visible) { // PolicyNo ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->PolicyNo) == "") { ?>
		<th data-name="PolicyNo" class="<?php echo $patient_insurance_list->PolicyNo->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyNo" class="patient_insurance_PolicyNo"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->PolicyNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PolicyNo" class="<?php echo $patient_insurance_list->PolicyNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->PolicyNo) ?>', 1);"><div id="elh_patient_insurance_PolicyNo" class="patient_insurance_PolicyNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->PolicyNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->PolicyNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->PolicyNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->PolicyAmount->Visible) { // PolicyAmount ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->PolicyAmount) == "") { ?>
		<th data-name="PolicyAmount" class="<?php echo $patient_insurance_list->PolicyAmount->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyAmount" class="patient_insurance_PolicyAmount"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->PolicyAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PolicyAmount" class="<?php echo $patient_insurance_list->PolicyAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->PolicyAmount) ?>', 1);"><div id="elh_patient_insurance_PolicyAmount" class="patient_insurance_PolicyAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->PolicyAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->PolicyAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->PolicyAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->RefLetterNo->Visible) { // RefLetterNo ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->RefLetterNo) == "") { ?>
		<th data-name="RefLetterNo" class="<?php echo $patient_insurance_list->RefLetterNo->headerCellClass() ?>"><div id="elh_patient_insurance_RefLetterNo" class="patient_insurance_RefLetterNo"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->RefLetterNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefLetterNo" class="<?php echo $patient_insurance_list->RefLetterNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->RefLetterNo) ?>', 1);"><div id="elh_patient_insurance_RefLetterNo" class="patient_insurance_RefLetterNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->RefLetterNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->RefLetterNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->RefLetterNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->ReferenceBy->Visible) { // ReferenceBy ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->ReferenceBy) == "") { ?>
		<th data-name="ReferenceBy" class="<?php echo $patient_insurance_list->ReferenceBy->headerCellClass() ?>"><div id="elh_patient_insurance_ReferenceBy" class="patient_insurance_ReferenceBy"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->ReferenceBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferenceBy" class="<?php echo $patient_insurance_list->ReferenceBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->ReferenceBy) ?>', 1);"><div id="elh_patient_insurance_ReferenceBy" class="patient_insurance_ReferenceBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->ReferenceBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->ReferenceBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->ReferenceBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->ReferenceDate->Visible) { // ReferenceDate ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->ReferenceDate) == "") { ?>
		<th data-name="ReferenceDate" class="<?php echo $patient_insurance_list->ReferenceDate->headerCellClass() ?>"><div id="elh_patient_insurance_ReferenceDate" class="patient_insurance_ReferenceDate"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->ReferenceDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferenceDate" class="<?php echo $patient_insurance_list->ReferenceDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->ReferenceDate) ?>', 1);"><div id="elh_patient_insurance_ReferenceDate" class="patient_insurance_ReferenceDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->ReferenceDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->ReferenceDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->ReferenceDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->createdby->Visible) { // createdby ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_insurance_list->createdby->headerCellClass() ?>"><div id="elh_patient_insurance_createdby" class="patient_insurance_createdby"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_insurance_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->createdby) ?>', 1);"><div id="elh_patient_insurance_createdby" class="patient_insurance_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_insurance_list->createddatetime->headerCellClass() ?>"><div id="elh_patient_insurance_createddatetime" class="patient_insurance_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_insurance_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->createddatetime) ?>', 1);"><div id="elh_patient_insurance_createddatetime" class="patient_insurance_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_insurance_list->modifiedby->headerCellClass() ?>"><div id="elh_patient_insurance_modifiedby" class="patient_insurance_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_insurance_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->modifiedby) ?>', 1);"><div id="elh_patient_insurance_modifiedby" class="patient_insurance_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_insurance_list->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_insurance_modifieddatetime" class="patient_insurance_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_insurance_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->modifieddatetime) ?>', 1);"><div id="elh_patient_insurance_modifieddatetime" class="patient_insurance_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_list->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_insurance_list->SortUrl($patient_insurance_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_insurance_list->mrnno->headerCellClass() ?>"><div id="elh_patient_insurance_mrnno" class="patient_insurance_mrnno"><div class="ew-table-header-caption"><?php echo $patient_insurance_list->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_insurance_list->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_insurance_list->SortUrl($patient_insurance_list->mrnno) ?>', 1);"><div id="elh_patient_insurance_mrnno" class="patient_insurance_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_insurance_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_insurance_list->ExportAll && $patient_insurance_list->isExport()) {
	$patient_insurance_list->StopRecord = $patient_insurance_list->TotalRecords;
} else {

	// Set the last record to display
	if ($patient_insurance_list->TotalRecords > $patient_insurance_list->StartRecord + $patient_insurance_list->DisplayRecords - 1)
		$patient_insurance_list->StopRecord = $patient_insurance_list->StartRecord + $patient_insurance_list->DisplayRecords - 1;
	else
		$patient_insurance_list->StopRecord = $patient_insurance_list->TotalRecords;
}
$patient_insurance_list->RecordCount = $patient_insurance_list->StartRecord - 1;
if ($patient_insurance_list->Recordset && !$patient_insurance_list->Recordset->EOF) {
	$patient_insurance_list->Recordset->moveFirst();
	$selectLimit = $patient_insurance_list->UseSelectLimit;
	if (!$selectLimit && $patient_insurance_list->StartRecord > 1)
		$patient_insurance_list->Recordset->move($patient_insurance_list->StartRecord - 1);
} elseif (!$patient_insurance->AllowAddDeleteRow && $patient_insurance_list->StopRecord == 0) {
	$patient_insurance_list->StopRecord = $patient_insurance->GridAddRowCount;
}

// Initialize aggregate
$patient_insurance->RowType = ROWTYPE_AGGREGATEINIT;
$patient_insurance->resetAttributes();
$patient_insurance_list->renderRow();
while ($patient_insurance_list->RecordCount < $patient_insurance_list->StopRecord) {
	$patient_insurance_list->RecordCount++;
	if ($patient_insurance_list->RecordCount >= $patient_insurance_list->StartRecord) {
		$patient_insurance_list->RowCount++;

		// Set up key count
		$patient_insurance_list->KeyCount = $patient_insurance_list->RowIndex;

		// Init row class and style
		$patient_insurance->resetAttributes();
		$patient_insurance->CssClass = "";
		if ($patient_insurance_list->isGridAdd()) {
		} else {
			$patient_insurance_list->loadRowValues($patient_insurance_list->Recordset); // Load row values
		}
		$patient_insurance->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_insurance->RowAttrs->merge(["data-rowindex" => $patient_insurance_list->RowCount, "id" => "r" . $patient_insurance_list->RowCount . "_patient_insurance", "data-rowtype" => $patient_insurance->RowType]);

		// Render row
		$patient_insurance_list->renderRow();

		// Render list options
		$patient_insurance_list->renderListOptions();
?>
	<tr <?php echo $patient_insurance->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_insurance_list->ListOptions->render("body", "left", $patient_insurance_list->RowCount);
?>
	<?php if ($patient_insurance_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_insurance_list->id->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_id">
<span<?php echo $patient_insurance_list->id->viewAttributes() ?>><?php echo $patient_insurance_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $patient_insurance_list->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_Reception">
<span<?php echo $patient_insurance_list->Reception->viewAttributes() ?>><?php echo $patient_insurance_list->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $patient_insurance_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_PatientId">
<span<?php echo $patient_insurance_list->PatientId->viewAttributes() ?>><?php echo $patient_insurance_list->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $patient_insurance_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_PatientName">
<span<?php echo $patient_insurance_list->PatientName->viewAttributes() ?>><?php echo $patient_insurance_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->Company->Visible) { // Company ?>
		<td data-name="Company" <?php echo $patient_insurance_list->Company->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_Company">
<span<?php echo $patient_insurance_list->Company->viewAttributes() ?>><?php echo $patient_insurance_list->Company->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
		<td data-name="AddressInsuranceCarierName" <?php echo $patient_insurance_list->AddressInsuranceCarierName->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_AddressInsuranceCarierName">
<span<?php echo $patient_insurance_list->AddressInsuranceCarierName->viewAttributes() ?>><?php echo $patient_insurance_list->AddressInsuranceCarierName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->ContactName->Visible) { // ContactName ?>
		<td data-name="ContactName" <?php echo $patient_insurance_list->ContactName->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_ContactName">
<span<?php echo $patient_insurance_list->ContactName->viewAttributes() ?>><?php echo $patient_insurance_list->ContactName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->ContactMobile->Visible) { // ContactMobile ?>
		<td data-name="ContactMobile" <?php echo $patient_insurance_list->ContactMobile->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_ContactMobile">
<span<?php echo $patient_insurance_list->ContactMobile->viewAttributes() ?>><?php echo $patient_insurance_list->ContactMobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->PolicyType->Visible) { // PolicyType ?>
		<td data-name="PolicyType" <?php echo $patient_insurance_list->PolicyType->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_PolicyType">
<span<?php echo $patient_insurance_list->PolicyType->viewAttributes() ?>><?php echo $patient_insurance_list->PolicyType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->PolicyName->Visible) { // PolicyName ?>
		<td data-name="PolicyName" <?php echo $patient_insurance_list->PolicyName->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_PolicyName">
<span<?php echo $patient_insurance_list->PolicyName->viewAttributes() ?>><?php echo $patient_insurance_list->PolicyName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->PolicyNo->Visible) { // PolicyNo ?>
		<td data-name="PolicyNo" <?php echo $patient_insurance_list->PolicyNo->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_PolicyNo">
<span<?php echo $patient_insurance_list->PolicyNo->viewAttributes() ?>><?php echo $patient_insurance_list->PolicyNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->PolicyAmount->Visible) { // PolicyAmount ?>
		<td data-name="PolicyAmount" <?php echo $patient_insurance_list->PolicyAmount->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_PolicyAmount">
<span<?php echo $patient_insurance_list->PolicyAmount->viewAttributes() ?>><?php echo $patient_insurance_list->PolicyAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->RefLetterNo->Visible) { // RefLetterNo ?>
		<td data-name="RefLetterNo" <?php echo $patient_insurance_list->RefLetterNo->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_RefLetterNo">
<span<?php echo $patient_insurance_list->RefLetterNo->viewAttributes() ?>><?php echo $patient_insurance_list->RefLetterNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->ReferenceBy->Visible) { // ReferenceBy ?>
		<td data-name="ReferenceBy" <?php echo $patient_insurance_list->ReferenceBy->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_ReferenceBy">
<span<?php echo $patient_insurance_list->ReferenceBy->viewAttributes() ?>><?php echo $patient_insurance_list->ReferenceBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->ReferenceDate->Visible) { // ReferenceDate ?>
		<td data-name="ReferenceDate" <?php echo $patient_insurance_list->ReferenceDate->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_ReferenceDate">
<span<?php echo $patient_insurance_list->ReferenceDate->viewAttributes() ?>><?php echo $patient_insurance_list->ReferenceDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $patient_insurance_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_createdby">
<span<?php echo $patient_insurance_list->createdby->viewAttributes() ?>><?php echo $patient_insurance_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $patient_insurance_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_createddatetime">
<span<?php echo $patient_insurance_list->createddatetime->viewAttributes() ?>><?php echo $patient_insurance_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $patient_insurance_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_modifiedby">
<span<?php echo $patient_insurance_list->modifiedby->viewAttributes() ?>><?php echo $patient_insurance_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $patient_insurance_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_modifieddatetime">
<span<?php echo $patient_insurance_list->modifieddatetime->viewAttributes() ?>><?php echo $patient_insurance_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_insurance_list->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCount ?>_patient_insurance_mrnno">
<span<?php echo $patient_insurance_list->mrnno->viewAttributes() ?>><?php echo $patient_insurance_list->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_insurance_list->ListOptions->render("body", "right", $patient_insurance_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$patient_insurance_list->isGridAdd())
		$patient_insurance_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$patient_insurance->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_insurance_list->Recordset)
	$patient_insurance_list->Recordset->Close();
?>
<?php if (!$patient_insurance_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_insurance_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_insurance_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_insurance_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_insurance_list->TotalRecords == 0 && !$patient_insurance->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_insurance_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_insurance_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_insurance_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_insurance->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_insurance",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_insurance_list->terminate();
?>