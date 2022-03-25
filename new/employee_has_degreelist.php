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
$employee_has_degree_list = new employee_has_degree_list();

// Run the page
$employee_has_degree_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_has_degree_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$employee_has_degree_list->isExport()) { ?>
<script>
var femployee_has_degreelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	femployee_has_degreelist = currentForm = new ew.Form("femployee_has_degreelist", "list");
	femployee_has_degreelist.formKeyCountName = '<?php echo $employee_has_degree_list->FormKeyCountName ?>';

	// Validate form
	femployee_has_degreelist.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
			if (checkrow) {
				addcnt++;
			<?php if ($employee_has_degree_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_list->id->caption(), $employee_has_degree_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_degree_list->employee_id->Required) { ?>
				elm = this.getElements("x" + infix + "_employee_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_list->employee_id->caption(), $employee_has_degree_list->employee_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_employee_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_has_degree_list->employee_id->errorMessage()) ?>");
			<?php if ($employee_has_degree_list->degree_id->Required) { ?>
				elm = this.getElements("x" + infix + "_degree_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_list->degree_id->caption(), $employee_has_degree_list->degree_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_degree_list->college_or_school->Required) { ?>
				elm = this.getElements("x" + infix + "_college_or_school");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_list->college_or_school->caption(), $employee_has_degree_list->college_or_school->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_degree_list->university_or_board->Required) { ?>
				elm = this.getElements("x" + infix + "_university_or_board");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_list->university_or_board->caption(), $employee_has_degree_list->university_or_board->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_degree_list->year_of_passing->Required) { ?>
				elm = this.getElements("x" + infix + "_year_of_passing");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_list->year_of_passing->caption(), $employee_has_degree_list->year_of_passing->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_degree_list->scoring_marks->Required) { ?>
				elm = this.getElements("x" + infix + "_scoring_marks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_list->scoring_marks->caption(), $employee_has_degree_list->scoring_marks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_degree_list->certificates->Required) { ?>
				felm = this.getElements("x" + infix + "_certificates");
				elm = this.getElements("fn_x" + infix + "_certificates");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_list->certificates->caption(), $employee_has_degree_list->certificates->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_degree_list->others->Required) { ?>
				felm = this.getElements("x" + infix + "_others");
				elm = this.getElements("fn_x" + infix + "_others");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_list->others->caption(), $employee_has_degree_list->others->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_degree_list->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_list->status->caption(), $employee_has_degree_list->status->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		if (gridinsert && addcnt == 0) { // No row added
			ew.alert(ew.language.phrase("NoAddRecord"));
			return false;
		}
		return true;
	}

	// Check empty row
	femployee_has_degreelist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "employee_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "degree_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "college_or_school", false)) return false;
		if (ew.valueChanged(fobj, infix, "university_or_board", false)) return false;
		if (ew.valueChanged(fobj, infix, "year_of_passing", false)) return false;
		if (ew.valueChanged(fobj, infix, "scoring_marks", false)) return false;
		if (ew.valueChanged(fobj, infix, "certificates", false)) return false;
		if (ew.valueChanged(fobj, infix, "others", false)) return false;
		if (ew.valueChanged(fobj, infix, "status", false)) return false;
		return true;
	}

	// Form_CustomValidate
	femployee_has_degreelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	femployee_has_degreelist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	femployee_has_degreelist.lists["x_degree_id"] = <?php echo $employee_has_degree_list->degree_id->Lookup->toClientList($employee_has_degree_list) ?>;
	femployee_has_degreelist.lists["x_degree_id"].options = <?php echo JsonEncode($employee_has_degree_list->degree_id->lookupOptions()) ?>;
	femployee_has_degreelist.lists["x_status"] = <?php echo $employee_has_degree_list->status->Lookup->toClientList($employee_has_degree_list) ?>;
	femployee_has_degreelist.lists["x_status"].options = <?php echo JsonEncode($employee_has_degree_list->status->lookupOptions()) ?>;
	loadjs.done("femployee_has_degreelist");
});
var femployee_has_degreelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	femployee_has_degreelistsrch = currentSearchForm = new ew.Form("femployee_has_degreelistsrch");

	// Dynamic selection lists
	// Filters

	femployee_has_degreelistsrch.filterList = <?php echo $employee_has_degree_list->getFilterList() ?>;
	loadjs.done("femployee_has_degreelistsrch");
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
<?php if (!$employee_has_degree_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_has_degree_list->TotalRecords > 0 && $employee_has_degree_list->ExportOptions->visible()) { ?>
<?php $employee_has_degree_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_has_degree_list->ImportOptions->visible()) { ?>
<?php $employee_has_degree_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_has_degree_list->SearchOptions->visible()) { ?>
<?php $employee_has_degree_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_has_degree_list->FilterOptions->visible()) { ?>
<?php $employee_has_degree_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$employee_has_degree_list->isExport() || Config("EXPORT_MASTER_RECORD") && $employee_has_degree_list->isExport("print")) { ?>
<?php
if ($employee_has_degree_list->DbMasterFilter != "" && $employee_has_degree->getCurrentMasterTable() == "employee") {
	if ($employee_has_degree_list->MasterRecordExists) {
		include_once "employeemaster.php";
	}
}
?>
<?php } ?>
<?php
$employee_has_degree_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_has_degree_list->isExport() && !$employee_has_degree->CurrentAction) { ?>
<form name="femployee_has_degreelistsrch" id="femployee_has_degreelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="femployee_has_degreelistsrch-search-panel" class="<?php echo $employee_has_degree_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_has_degree">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $employee_has_degree_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($employee_has_degree_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($employee_has_degree_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_has_degree_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_has_degree_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_has_degree_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_has_degree_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_has_degree_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $employee_has_degree_list->showPageHeader(); ?>
<?php
$employee_has_degree_list->showMessage();
?>
<?php if ($employee_has_degree_list->TotalRecords > 0 || $employee_has_degree->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_has_degree_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_has_degree">
<?php if (!$employee_has_degree_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_has_degree_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $employee_has_degree_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_has_degree_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_has_degreelist" id="femployee_has_degreelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_has_degree">
<?php if ($employee_has_degree->getCurrentMasterTable() == "employee" && $employee_has_degree->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($employee_has_degree_list->employee_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_employee_has_degree" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($employee_has_degree_list->TotalRecords > 0 || $employee_has_degree_list->isGridEdit()) { ?>
<table id="tbl_employee_has_degreelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_has_degree->RowType = ROWTYPE_HEADER;

// Render list options
$employee_has_degree_list->renderListOptions();

// Render list options (header, left)
$employee_has_degree_list->ListOptions->render("header", "left");
?>
<?php if ($employee_has_degree_list->id->Visible) { // id ?>
	<?php if ($employee_has_degree_list->SortUrl($employee_has_degree_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_has_degree_list->id->headerCellClass() ?>"><div id="elh_employee_has_degree_id" class="employee_has_degree_id"><div class="ew-table-header-caption"><?php echo $employee_has_degree_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_has_degree_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_degree_list->SortUrl($employee_has_degree_list->id) ?>', 1);"><div id="elh_employee_has_degree_id" class="employee_has_degree_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_list->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_has_degree_list->SortUrl($employee_has_degree_list->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employee_has_degree_list->employee_id->headerCellClass() ?>"><div id="elh_employee_has_degree_employee_id" class="employee_has_degree_employee_id"><div class="ew-table-header-caption"><?php echo $employee_has_degree_list->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employee_has_degree_list->employee_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_degree_list->SortUrl($employee_has_degree_list->employee_id) ?>', 1);"><div id="elh_employee_has_degree_employee_id" class="employee_has_degree_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_list->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_list->employee_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_list->employee_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_list->degree_id->Visible) { // degree_id ?>
	<?php if ($employee_has_degree_list->SortUrl($employee_has_degree_list->degree_id) == "") { ?>
		<th data-name="degree_id" class="<?php echo $employee_has_degree_list->degree_id->headerCellClass() ?>"><div id="elh_employee_has_degree_degree_id" class="employee_has_degree_degree_id"><div class="ew-table-header-caption"><?php echo $employee_has_degree_list->degree_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="degree_id" class="<?php echo $employee_has_degree_list->degree_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_degree_list->SortUrl($employee_has_degree_list->degree_id) ?>', 1);"><div id="elh_employee_has_degree_degree_id" class="employee_has_degree_degree_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_list->degree_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_list->degree_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_list->degree_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_list->college_or_school->Visible) { // college_or_school ?>
	<?php if ($employee_has_degree_list->SortUrl($employee_has_degree_list->college_or_school) == "") { ?>
		<th data-name="college_or_school" class="<?php echo $employee_has_degree_list->college_or_school->headerCellClass() ?>"><div id="elh_employee_has_degree_college_or_school" class="employee_has_degree_college_or_school"><div class="ew-table-header-caption"><?php echo $employee_has_degree_list->college_or_school->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="college_or_school" class="<?php echo $employee_has_degree_list->college_or_school->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_degree_list->SortUrl($employee_has_degree_list->college_or_school) ?>', 1);"><div id="elh_employee_has_degree_college_or_school" class="employee_has_degree_college_or_school">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_list->college_or_school->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_list->college_or_school->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_list->college_or_school->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_list->university_or_board->Visible) { // university_or_board ?>
	<?php if ($employee_has_degree_list->SortUrl($employee_has_degree_list->university_or_board) == "") { ?>
		<th data-name="university_or_board" class="<?php echo $employee_has_degree_list->university_or_board->headerCellClass() ?>"><div id="elh_employee_has_degree_university_or_board" class="employee_has_degree_university_or_board"><div class="ew-table-header-caption"><?php echo $employee_has_degree_list->university_or_board->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="university_or_board" class="<?php echo $employee_has_degree_list->university_or_board->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_degree_list->SortUrl($employee_has_degree_list->university_or_board) ?>', 1);"><div id="elh_employee_has_degree_university_or_board" class="employee_has_degree_university_or_board">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_list->university_or_board->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_list->university_or_board->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_list->university_or_board->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_list->year_of_passing->Visible) { // year_of_passing ?>
	<?php if ($employee_has_degree_list->SortUrl($employee_has_degree_list->year_of_passing) == "") { ?>
		<th data-name="year_of_passing" class="<?php echo $employee_has_degree_list->year_of_passing->headerCellClass() ?>"><div id="elh_employee_has_degree_year_of_passing" class="employee_has_degree_year_of_passing"><div class="ew-table-header-caption"><?php echo $employee_has_degree_list->year_of_passing->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="year_of_passing" class="<?php echo $employee_has_degree_list->year_of_passing->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_degree_list->SortUrl($employee_has_degree_list->year_of_passing) ?>', 1);"><div id="elh_employee_has_degree_year_of_passing" class="employee_has_degree_year_of_passing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_list->year_of_passing->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_list->year_of_passing->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_list->year_of_passing->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_list->scoring_marks->Visible) { // scoring_marks ?>
	<?php if ($employee_has_degree_list->SortUrl($employee_has_degree_list->scoring_marks) == "") { ?>
		<th data-name="scoring_marks" class="<?php echo $employee_has_degree_list->scoring_marks->headerCellClass() ?>"><div id="elh_employee_has_degree_scoring_marks" class="employee_has_degree_scoring_marks"><div class="ew-table-header-caption"><?php echo $employee_has_degree_list->scoring_marks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="scoring_marks" class="<?php echo $employee_has_degree_list->scoring_marks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_degree_list->SortUrl($employee_has_degree_list->scoring_marks) ?>', 1);"><div id="elh_employee_has_degree_scoring_marks" class="employee_has_degree_scoring_marks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_list->scoring_marks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_list->scoring_marks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_list->scoring_marks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_list->certificates->Visible) { // certificates ?>
	<?php if ($employee_has_degree_list->SortUrl($employee_has_degree_list->certificates) == "") { ?>
		<th data-name="certificates" class="<?php echo $employee_has_degree_list->certificates->headerCellClass() ?>"><div id="elh_employee_has_degree_certificates" class="employee_has_degree_certificates"><div class="ew-table-header-caption"><?php echo $employee_has_degree_list->certificates->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="certificates" class="<?php echo $employee_has_degree_list->certificates->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_degree_list->SortUrl($employee_has_degree_list->certificates) ?>', 1);"><div id="elh_employee_has_degree_certificates" class="employee_has_degree_certificates">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_list->certificates->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_list->certificates->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_list->certificates->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_list->others->Visible) { // others ?>
	<?php if ($employee_has_degree_list->SortUrl($employee_has_degree_list->others) == "") { ?>
		<th data-name="others" class="<?php echo $employee_has_degree_list->others->headerCellClass() ?>"><div id="elh_employee_has_degree_others" class="employee_has_degree_others"><div class="ew-table-header-caption"><?php echo $employee_has_degree_list->others->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="others" class="<?php echo $employee_has_degree_list->others->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_degree_list->SortUrl($employee_has_degree_list->others) ?>', 1);"><div id="elh_employee_has_degree_others" class="employee_has_degree_others">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_list->others->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_list->others->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_list->others->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_list->status->Visible) { // status ?>
	<?php if ($employee_has_degree_list->SortUrl($employee_has_degree_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_has_degree_list->status->headerCellClass() ?>"><div id="elh_employee_has_degree_status" class="employee_has_degree_status"><div class="ew-table-header-caption"><?php echo $employee_has_degree_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_has_degree_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_degree_list->SortUrl($employee_has_degree_list->status) ?>', 1);"><div id="elh_employee_has_degree_status" class="employee_has_degree_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_has_degree_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_has_degree_list->ExportAll && $employee_has_degree_list->isExport()) {
	$employee_has_degree_list->StopRecord = $employee_has_degree_list->TotalRecords;
} else {

	// Set the last record to display
	if ($employee_has_degree_list->TotalRecords > $employee_has_degree_list->StartRecord + $employee_has_degree_list->DisplayRecords - 1)
		$employee_has_degree_list->StopRecord = $employee_has_degree_list->StartRecord + $employee_has_degree_list->DisplayRecords - 1;
	else
		$employee_has_degree_list->StopRecord = $employee_has_degree_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($employee_has_degree->isConfirm() || $employee_has_degree_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($employee_has_degree_list->FormKeyCountName) && ($employee_has_degree_list->isGridAdd() || $employee_has_degree_list->isGridEdit() || $employee_has_degree->isConfirm())) {
		$employee_has_degree_list->KeyCount = $CurrentForm->getValue($employee_has_degree_list->FormKeyCountName);
		$employee_has_degree_list->StopRecord = $employee_has_degree_list->StartRecord + $employee_has_degree_list->KeyCount - 1;
	}
}
$employee_has_degree_list->RecordCount = $employee_has_degree_list->StartRecord - 1;
if ($employee_has_degree_list->Recordset && !$employee_has_degree_list->Recordset->EOF) {
	$employee_has_degree_list->Recordset->moveFirst();
	$selectLimit = $employee_has_degree_list->UseSelectLimit;
	if (!$selectLimit && $employee_has_degree_list->StartRecord > 1)
		$employee_has_degree_list->Recordset->move($employee_has_degree_list->StartRecord - 1);
} elseif (!$employee_has_degree->AllowAddDeleteRow && $employee_has_degree_list->StopRecord == 0) {
	$employee_has_degree_list->StopRecord = $employee_has_degree->GridAddRowCount;
}

// Initialize aggregate
$employee_has_degree->RowType = ROWTYPE_AGGREGATEINIT;
$employee_has_degree->resetAttributes();
$employee_has_degree_list->renderRow();
if ($employee_has_degree_list->isGridAdd())
	$employee_has_degree_list->RowIndex = 0;
if ($employee_has_degree_list->isGridEdit())
	$employee_has_degree_list->RowIndex = 0;
while ($employee_has_degree_list->RecordCount < $employee_has_degree_list->StopRecord) {
	$employee_has_degree_list->RecordCount++;
	if ($employee_has_degree_list->RecordCount >= $employee_has_degree_list->StartRecord) {
		$employee_has_degree_list->RowCount++;
		if ($employee_has_degree_list->isGridAdd() || $employee_has_degree_list->isGridEdit() || $employee_has_degree->isConfirm()) {
			$employee_has_degree_list->RowIndex++;
			$CurrentForm->Index = $employee_has_degree_list->RowIndex;
			if ($CurrentForm->hasValue($employee_has_degree_list->FormActionName) && ($employee_has_degree->isConfirm() || $employee_has_degree_list->EventCancelled))
				$employee_has_degree_list->RowAction = strval($CurrentForm->getValue($employee_has_degree_list->FormActionName));
			elseif ($employee_has_degree_list->isGridAdd())
				$employee_has_degree_list->RowAction = "insert";
			else
				$employee_has_degree_list->RowAction = "";
		}

		// Set up key count
		$employee_has_degree_list->KeyCount = $employee_has_degree_list->RowIndex;

		// Init row class and style
		$employee_has_degree->resetAttributes();
		$employee_has_degree->CssClass = "";
		if ($employee_has_degree_list->isGridAdd()) {
			$employee_has_degree_list->loadRowValues(); // Load default values
		} else {
			$employee_has_degree_list->loadRowValues($employee_has_degree_list->Recordset); // Load row values
		}
		$employee_has_degree->RowType = ROWTYPE_VIEW; // Render view
		if ($employee_has_degree_list->isGridAdd()) // Grid add
			$employee_has_degree->RowType = ROWTYPE_ADD; // Render add
		if ($employee_has_degree_list->isGridAdd() && $employee_has_degree->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$employee_has_degree_list->restoreCurrentRowFormValues($employee_has_degree_list->RowIndex); // Restore form values
		if ($employee_has_degree_list->isGridEdit()) { // Grid edit
			if ($employee_has_degree->EventCancelled)
				$employee_has_degree_list->restoreCurrentRowFormValues($employee_has_degree_list->RowIndex); // Restore form values
			if ($employee_has_degree_list->RowAction == "insert")
				$employee_has_degree->RowType = ROWTYPE_ADD; // Render add
			else
				$employee_has_degree->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($employee_has_degree_list->isGridEdit() && ($employee_has_degree->RowType == ROWTYPE_EDIT || $employee_has_degree->RowType == ROWTYPE_ADD) && $employee_has_degree->EventCancelled) // Update failed
			$employee_has_degree_list->restoreCurrentRowFormValues($employee_has_degree_list->RowIndex); // Restore form values
		if ($employee_has_degree->RowType == ROWTYPE_EDIT) // Edit row
			$employee_has_degree_list->EditRowCount++;

		// Set up row id / data-rowindex
		$employee_has_degree->RowAttrs->merge(["data-rowindex" => $employee_has_degree_list->RowCount, "id" => "r" . $employee_has_degree_list->RowCount . "_employee_has_degree", "data-rowtype" => $employee_has_degree->RowType]);

		// Render row
		$employee_has_degree_list->renderRow();

		// Render list options
		$employee_has_degree_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($employee_has_degree_list->RowAction != "delete" && $employee_has_degree_list->RowAction != "insertdelete" && !($employee_has_degree_list->RowAction == "insert" && $employee_has_degree->isConfirm() && $employee_has_degree_list->emptyRow())) {
?>
	<tr <?php echo $employee_has_degree->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_has_degree_list->ListOptions->render("body", "left", $employee_has_degree_list->RowCount);
?>
	<?php if ($employee_has_degree_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $employee_has_degree_list->id->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_id" class="form-group"></span>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" name="o<?php echo $employee_has_degree_list->RowIndex ?>_id" id="o<?php echo $employee_has_degree_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_degree_list->id->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_id" class="form-group">
<span<?php echo $employee_has_degree_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_degree_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_id" id="x<?php echo $employee_has_degree_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_degree_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_id">
<span<?php echo $employee_has_degree_list->id->viewAttributes() ?>><?php echo $employee_has_degree_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree_list->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id" <?php echo $employee_has_degree_list->employee_id->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($employee_has_degree_list->employee_id->getSessionValue() != "") { ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_employee_id" class="form-group">
<span<?php echo $employee_has_degree_list->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_degree_list->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree_list->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_employee_id" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_employee_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" id="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_degree_list->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_list->employee_id->EditValue ?>"<?php echo $employee_has_degree_list->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_employee_id" name="o<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" id="o<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree_list->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($employee_has_degree_list->employee_id->getSessionValue() != "") { ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_employee_id" class="form-group">
<span<?php echo $employee_has_degree_list->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_degree_list->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree_list->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_employee_id" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_employee_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" id="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_degree_list->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_list->employee_id->EditValue ?>"<?php echo $employee_has_degree_list->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_employee_id">
<span<?php echo $employee_has_degree_list->employee_id->viewAttributes() ?>><?php echo $employee_has_degree_list->employee_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree_list->degree_id->Visible) { // degree_id ?>
		<td data-name="degree_id" <?php echo $employee_has_degree_list->degree_id->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_degree_id" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_degree_id" data-value-separator="<?php echo $employee_has_degree_list->degree_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id"<?php echo $employee_has_degree_list->degree_id->editAttributes() ?>>
			<?php echo $employee_has_degree_list->degree_id->selectOptionListHtml("x{$employee_has_degree_list->RowIndex}_degree_id") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_degree") && !$employee_has_degree_list->degree_id->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_has_degree_list->degree_id->caption() ?>" data-title="<?php echo $employee_has_degree_list->degree_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id',url:'mas_degreeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_has_degree_list->degree_id->Lookup->getParamTag($employee_has_degree_list, "p_x" . $employee_has_degree_list->RowIndex . "_degree_id") ?>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_degree_id" name="o<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" id="o<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" value="<?php echo HtmlEncode($employee_has_degree_list->degree_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_degree_id" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_degree_id" data-value-separator="<?php echo $employee_has_degree_list->degree_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id"<?php echo $employee_has_degree_list->degree_id->editAttributes() ?>>
			<?php echo $employee_has_degree_list->degree_id->selectOptionListHtml("x{$employee_has_degree_list->RowIndex}_degree_id") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_degree") && !$employee_has_degree_list->degree_id->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_has_degree_list->degree_id->caption() ?>" data-title="<?php echo $employee_has_degree_list->degree_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id',url:'mas_degreeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_has_degree_list->degree_id->Lookup->getParamTag($employee_has_degree_list, "p_x" . $employee_has_degree_list->RowIndex . "_degree_id") ?>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_degree_id">
<span<?php echo $employee_has_degree_list->degree_id->viewAttributes() ?>><?php echo $employee_has_degree_list->degree_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree_list->college_or_school->Visible) { // college_or_school ?>
		<td data-name="college_or_school" <?php echo $employee_has_degree_list->college_or_school->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_college_or_school" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_college_or_school" name="x<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" id="x<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_list->college_or_school->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_list->college_or_school->EditValue ?>"<?php echo $employee_has_degree_list->college_or_school->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_college_or_school" name="o<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" id="o<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" value="<?php echo HtmlEncode($employee_has_degree_list->college_or_school->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_college_or_school" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_college_or_school" name="x<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" id="x<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_list->college_or_school->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_list->college_or_school->EditValue ?>"<?php echo $employee_has_degree_list->college_or_school->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_college_or_school">
<span<?php echo $employee_has_degree_list->college_or_school->viewAttributes() ?>><?php echo $employee_has_degree_list->college_or_school->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree_list->university_or_board->Visible) { // university_or_board ?>
		<td data-name="university_or_board" <?php echo $employee_has_degree_list->university_or_board->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_university_or_board" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_university_or_board" name="x<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" id="x<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_list->university_or_board->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_list->university_or_board->EditValue ?>"<?php echo $employee_has_degree_list->university_or_board->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_university_or_board" name="o<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" id="o<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" value="<?php echo HtmlEncode($employee_has_degree_list->university_or_board->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_university_or_board" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_university_or_board" name="x<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" id="x<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_list->university_or_board->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_list->university_or_board->EditValue ?>"<?php echo $employee_has_degree_list->university_or_board->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_university_or_board">
<span<?php echo $employee_has_degree_list->university_or_board->viewAttributes() ?>><?php echo $employee_has_degree_list->university_or_board->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree_list->year_of_passing->Visible) { // year_of_passing ?>
		<td data-name="year_of_passing" <?php echo $employee_has_degree_list->year_of_passing->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_year_of_passing" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_year_of_passing" name="x<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" id="x<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_list->year_of_passing->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_list->year_of_passing->EditValue ?>"<?php echo $employee_has_degree_list->year_of_passing->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_year_of_passing" name="o<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" id="o<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" value="<?php echo HtmlEncode($employee_has_degree_list->year_of_passing->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_year_of_passing" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_year_of_passing" name="x<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" id="x<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_list->year_of_passing->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_list->year_of_passing->EditValue ?>"<?php echo $employee_has_degree_list->year_of_passing->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_year_of_passing">
<span<?php echo $employee_has_degree_list->year_of_passing->viewAttributes() ?>><?php echo $employee_has_degree_list->year_of_passing->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree_list->scoring_marks->Visible) { // scoring_marks ?>
		<td data-name="scoring_marks" <?php echo $employee_has_degree_list->scoring_marks->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_scoring_marks" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_scoring_marks" name="x<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" id="x<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_list->scoring_marks->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_list->scoring_marks->EditValue ?>"<?php echo $employee_has_degree_list->scoring_marks->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_scoring_marks" name="o<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" id="o<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" value="<?php echo HtmlEncode($employee_has_degree_list->scoring_marks->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_scoring_marks" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_scoring_marks" name="x<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" id="x<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_list->scoring_marks->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_list->scoring_marks->EditValue ?>"<?php echo $employee_has_degree_list->scoring_marks->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_scoring_marks">
<span<?php echo $employee_has_degree_list->scoring_marks->viewAttributes() ?>><?php echo $employee_has_degree_list->scoring_marks->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree_list->certificates->Visible) { // certificates ?>
		<td data-name="certificates" <?php echo $employee_has_degree_list->certificates->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_certificates" class="form-group">
<div id="fd_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_degree_list->certificates->title() ?>" data-table="employee_has_degree" data-field="x_certificates" name="x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id="x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_degree_list->certificates->editAttributes() ?><?php if ($employee_has_degree_list->certificates->ReadOnly || $employee_has_degree_list->certificates->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_has_degree_list->RowIndex ?>_certificates"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fn_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_list->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fs_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fx_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_list->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fm_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_list->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fc_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_list->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_certificates" name="o<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id="o<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo HtmlEncode($employee_has_degree_list->certificates->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_certificates" class="form-group">
<div id="fd_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_degree_list->certificates->title() ?>" data-table="employee_has_degree" data-field="x_certificates" name="x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id="x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_degree_list->certificates->editAttributes() ?><?php if ($employee_has_degree_list->certificates->ReadOnly || $employee_has_degree_list->certificates->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_has_degree_list->RowIndex ?>_certificates"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fn_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_list->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo (Post("fa_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fs_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fx_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_list->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fm_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_list->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fc_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_list->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_certificates">
<span><?php echo GetFileViewTag($employee_has_degree_list->certificates, $employee_has_degree_list->certificates->getViewValue(), FALSE) ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree_list->others->Visible) { // others ?>
		<td data-name="others" <?php echo $employee_has_degree_list->others->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_others" class="form-group">
<div id="fd_x<?php echo $employee_has_degree_list->RowIndex ?>_others">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_degree_list->others->title() ?>" data-table="employee_has_degree" data-field="x_others" name="x<?php echo $employee_has_degree_list->RowIndex ?>_others" id="x<?php echo $employee_has_degree_list->RowIndex ?>_others" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_degree_list->others->editAttributes() ?><?php if ($employee_has_degree_list->others->ReadOnly || $employee_has_degree_list->others->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_has_degree_list->RowIndex ?>_others"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fn_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree_list->others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fs_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fx_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree_list->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fm_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree_list->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fc_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree_list->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_degree_list->RowIndex ?>_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_others" name="o<?php echo $employee_has_degree_list->RowIndex ?>_others" id="o<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo HtmlEncode($employee_has_degree_list->others->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_others" class="form-group">
<div id="fd_x<?php echo $employee_has_degree_list->RowIndex ?>_others">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_degree_list->others->title() ?>" data-table="employee_has_degree" data-field="x_others" name="x<?php echo $employee_has_degree_list->RowIndex ?>_others" id="x<?php echo $employee_has_degree_list->RowIndex ?>_others" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_degree_list->others->editAttributes() ?><?php if ($employee_has_degree_list->others->ReadOnly || $employee_has_degree_list->others->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_has_degree_list->RowIndex ?>_others"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fn_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree_list->others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo (Post("fa_x<?php echo $employee_has_degree_list->RowIndex ?>_others") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fs_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fx_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree_list->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fm_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree_list->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fc_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree_list->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_degree_list->RowIndex ?>_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_others">
<span<?php echo $employee_has_degree_list->others->viewAttributes() ?>><?php echo GetFileViewTag($employee_has_degree_list->others, $employee_has_degree_list->others->getViewValue(), FALSE) ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $employee_has_degree_list->status->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_status" data-value-separator="<?php echo $employee_has_degree_list->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_degree_list->RowIndex ?>_status" name="x<?php echo $employee_has_degree_list->RowIndex ?>_status"<?php echo $employee_has_degree_list->status->editAttributes() ?>>
			<?php echo $employee_has_degree_list->status->selectOptionListHtml("x{$employee_has_degree_list->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_has_degree_list->status->Lookup->getParamTag($employee_has_degree_list, "p_x" . $employee_has_degree_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_status" name="o<?php echo $employee_has_degree_list->RowIndex ?>_status" id="o<?php echo $employee_has_degree_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_degree_list->status->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_status" data-value-separator="<?php echo $employee_has_degree_list->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_degree_list->RowIndex ?>_status" name="x<?php echo $employee_has_degree_list->RowIndex ?>_status"<?php echo $employee_has_degree_list->status->editAttributes() ?>>
			<?php echo $employee_has_degree_list->status->selectOptionListHtml("x{$employee_has_degree_list->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_has_degree_list->status->Lookup->getParamTag($employee_has_degree_list, "p_x" . $employee_has_degree_list->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCount ?>_employee_has_degree_status">
<span<?php echo $employee_has_degree_list->status->viewAttributes() ?>><?php echo $employee_has_degree_list->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_has_degree_list->ListOptions->render("body", "right", $employee_has_degree_list->RowCount);
?>
	</tr>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD || $employee_has_degree->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["femployee_has_degreelist", "load"], function() {
	femployee_has_degreelist.updateLists(<?php echo $employee_has_degree_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$employee_has_degree_list->isGridAdd())
		if (!$employee_has_degree_list->Recordset->EOF)
			$employee_has_degree_list->Recordset->moveNext();
}
?>
<?php
	if ($employee_has_degree_list->isGridAdd() || $employee_has_degree_list->isGridEdit()) {
		$employee_has_degree_list->RowIndex = '$rowindex$';
		$employee_has_degree_list->loadRowValues();

		// Set row properties
		$employee_has_degree->resetAttributes();
		$employee_has_degree->RowAttrs->merge(["data-rowindex" => $employee_has_degree_list->RowIndex, "id" => "r0_employee_has_degree", "data-rowtype" => ROWTYPE_ADD]);
		$employee_has_degree->RowAttrs->appendClass("ew-template");
		$employee_has_degree->RowType = ROWTYPE_ADD;

		// Render row
		$employee_has_degree_list->renderRow();

		// Render list options
		$employee_has_degree_list->renderListOptions();
		$employee_has_degree_list->StartRowCount = 0;
?>
	<tr <?php echo $employee_has_degree->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_has_degree_list->ListOptions->render("body", "left", $employee_has_degree_list->RowIndex);
?>
	<?php if ($employee_has_degree_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_employee_has_degree_id" class="form-group employee_has_degree_id"></span>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" name="o<?php echo $employee_has_degree_list->RowIndex ?>_id" id="o<?php echo $employee_has_degree_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_degree_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree_list->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id">
<?php if ($employee_has_degree_list->employee_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_employee_has_degree_employee_id" class="form-group employee_has_degree_employee_id">
<span<?php echo $employee_has_degree_list->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_degree_list->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree_list->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_employee_id" class="form-group employee_has_degree_employee_id">
<input type="text" data-table="employee_has_degree" data-field="x_employee_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" id="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_degree_list->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_list->employee_id->EditValue ?>"<?php echo $employee_has_degree_list->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_employee_id" name="o<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" id="o<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree_list->employee_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree_list->degree_id->Visible) { // degree_id ?>
		<td data-name="degree_id">
<span id="el$rowindex$_employee_has_degree_degree_id" class="form-group employee_has_degree_degree_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_degree_id" data-value-separator="<?php echo $employee_has_degree_list->degree_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id"<?php echo $employee_has_degree_list->degree_id->editAttributes() ?>>
			<?php echo $employee_has_degree_list->degree_id->selectOptionListHtml("x{$employee_has_degree_list->RowIndex}_degree_id") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_degree") && !$employee_has_degree_list->degree_id->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_has_degree_list->degree_id->caption() ?>" data-title="<?php echo $employee_has_degree_list->degree_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id',url:'mas_degreeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_has_degree_list->degree_id->Lookup->getParamTag($employee_has_degree_list, "p_x" . $employee_has_degree_list->RowIndex . "_degree_id") ?>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_degree_id" name="o<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" id="o<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" value="<?php echo HtmlEncode($employee_has_degree_list->degree_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree_list->college_or_school->Visible) { // college_or_school ?>
		<td data-name="college_or_school">
<span id="el$rowindex$_employee_has_degree_college_or_school" class="form-group employee_has_degree_college_or_school">
<input type="text" data-table="employee_has_degree" data-field="x_college_or_school" name="x<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" id="x<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_list->college_or_school->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_list->college_or_school->EditValue ?>"<?php echo $employee_has_degree_list->college_or_school->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_college_or_school" name="o<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" id="o<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" value="<?php echo HtmlEncode($employee_has_degree_list->college_or_school->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree_list->university_or_board->Visible) { // university_or_board ?>
		<td data-name="university_or_board">
<span id="el$rowindex$_employee_has_degree_university_or_board" class="form-group employee_has_degree_university_or_board">
<input type="text" data-table="employee_has_degree" data-field="x_university_or_board" name="x<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" id="x<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_list->university_or_board->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_list->university_or_board->EditValue ?>"<?php echo $employee_has_degree_list->university_or_board->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_university_or_board" name="o<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" id="o<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" value="<?php echo HtmlEncode($employee_has_degree_list->university_or_board->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree_list->year_of_passing->Visible) { // year_of_passing ?>
		<td data-name="year_of_passing">
<span id="el$rowindex$_employee_has_degree_year_of_passing" class="form-group employee_has_degree_year_of_passing">
<input type="text" data-table="employee_has_degree" data-field="x_year_of_passing" name="x<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" id="x<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_list->year_of_passing->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_list->year_of_passing->EditValue ?>"<?php echo $employee_has_degree_list->year_of_passing->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_year_of_passing" name="o<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" id="o<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" value="<?php echo HtmlEncode($employee_has_degree_list->year_of_passing->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree_list->scoring_marks->Visible) { // scoring_marks ?>
		<td data-name="scoring_marks">
<span id="el$rowindex$_employee_has_degree_scoring_marks" class="form-group employee_has_degree_scoring_marks">
<input type="text" data-table="employee_has_degree" data-field="x_scoring_marks" name="x<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" id="x<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_list->scoring_marks->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_list->scoring_marks->EditValue ?>"<?php echo $employee_has_degree_list->scoring_marks->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_scoring_marks" name="o<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" id="o<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" value="<?php echo HtmlEncode($employee_has_degree_list->scoring_marks->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree_list->certificates->Visible) { // certificates ?>
		<td data-name="certificates">
<span id="el$rowindex$_employee_has_degree_certificates" class="form-group employee_has_degree_certificates">
<div id="fd_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_degree_list->certificates->title() ?>" data-table="employee_has_degree" data-field="x_certificates" name="x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id="x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_degree_list->certificates->editAttributes() ?><?php if ($employee_has_degree_list->certificates->ReadOnly || $employee_has_degree_list->certificates->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_has_degree_list->RowIndex ?>_certificates"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fn_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_list->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fs_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fx_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_list->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fm_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_list->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fc_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_list->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_certificates" name="o<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id="o<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo HtmlEncode($employee_has_degree_list->certificates->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree_list->others->Visible) { // others ?>
		<td data-name="others">
<span id="el$rowindex$_employee_has_degree_others" class="form-group employee_has_degree_others">
<div id="fd_x<?php echo $employee_has_degree_list->RowIndex ?>_others">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_degree_list->others->title() ?>" data-table="employee_has_degree" data-field="x_others" name="x<?php echo $employee_has_degree_list->RowIndex ?>_others" id="x<?php echo $employee_has_degree_list->RowIndex ?>_others" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_degree_list->others->editAttributes() ?><?php if ($employee_has_degree_list->others->ReadOnly || $employee_has_degree_list->others->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_has_degree_list->RowIndex ?>_others"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fn_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree_list->others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fs_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fx_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree_list->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fm_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree_list->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fc_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree_list->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_degree_list->RowIndex ?>_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_others" name="o<?php echo $employee_has_degree_list->RowIndex ?>_others" id="o<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo HtmlEncode($employee_has_degree_list->others->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree_list->status->Visible) { // status ?>
		<td data-name="status">
<span id="el$rowindex$_employee_has_degree_status" class="form-group employee_has_degree_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_status" data-value-separator="<?php echo $employee_has_degree_list->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_degree_list->RowIndex ?>_status" name="x<?php echo $employee_has_degree_list->RowIndex ?>_status"<?php echo $employee_has_degree_list->status->editAttributes() ?>>
			<?php echo $employee_has_degree_list->status->selectOptionListHtml("x{$employee_has_degree_list->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_has_degree_list->status->Lookup->getParamTag($employee_has_degree_list, "p_x" . $employee_has_degree_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_status" name="o<?php echo $employee_has_degree_list->RowIndex ?>_status" id="o<?php echo $employee_has_degree_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_degree_list->status->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_has_degree_list->ListOptions->render("body", "right", $employee_has_degree_list->RowIndex);
?>
<script>
loadjs.ready(["femployee_has_degreelist", "load"], function() {
	femployee_has_degreelist.updateLists(<?php echo $employee_has_degree_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($employee_has_degree_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $employee_has_degree_list->FormKeyCountName ?>" id="<?php echo $employee_has_degree_list->FormKeyCountName ?>" value="<?php echo $employee_has_degree_list->KeyCount ?>">
<?php echo $employee_has_degree_list->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_has_degree_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $employee_has_degree_list->FormKeyCountName ?>" id="<?php echo $employee_has_degree_list->FormKeyCountName ?>" value="<?php echo $employee_has_degree_list->KeyCount ?>">
<?php echo $employee_has_degree_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$employee_has_degree->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_has_degree_list->Recordset)
	$employee_has_degree_list->Recordset->Close();
?>
<?php if (!$employee_has_degree_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_has_degree_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $employee_has_degree_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_has_degree_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_has_degree_list->TotalRecords == 0 && !$employee_has_degree->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_has_degree_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_has_degree_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$employee_has_degree_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$employee_has_degree->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_employee_has_degree",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$employee_has_degree_list->terminate();
?>