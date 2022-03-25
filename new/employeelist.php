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
$employee_list = new employee_list();

// Run the page
$employee_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$employee_list->isExport()) { ?>
<script>
var femployeelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	femployeelist = currentForm = new ew.Form("femployeelist", "list");
	femployeelist.formKeyCountName = '<?php echo $employee_list->FormKeyCountName ?>';

	// Validate form
	femployeelist.validate = function() {
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
			<?php if ($employee_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_list->id->caption(), $employee_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_list->empNo->Required) { ?>
				elm = this.getElements("x" + infix + "_empNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_list->empNo->caption(), $employee_list->empNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_list->tittle->Required) { ?>
				elm = this.getElements("x" + infix + "_tittle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_list->tittle->caption(), $employee_list->tittle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_list->first_name->Required) { ?>
				elm = this.getElements("x" + infix + "_first_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_list->first_name->caption(), $employee_list->first_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_list->middle_name->Required) { ?>
				elm = this.getElements("x" + infix + "_middle_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_list->middle_name->caption(), $employee_list->middle_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_list->last_name->Required) { ?>
				elm = this.getElements("x" + infix + "_last_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_list->last_name->caption(), $employee_list->last_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_list->gender->Required) { ?>
				elm = this.getElements("x" + infix + "_gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_list->gender->caption(), $employee_list->gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_list->dob->Required) { ?>
				elm = this.getElements("x" + infix + "_dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_list->dob->caption(), $employee_list->dob->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dob");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_list->dob->errorMessage()) ?>");
			<?php if ($employee_list->start_date->Required) { ?>
				elm = this.getElements("x" + infix + "_start_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_list->start_date->caption(), $employee_list->start_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_start_date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_list->start_date->errorMessage()) ?>");
			<?php if ($employee_list->end_date->Required) { ?>
				elm = this.getElements("x" + infix + "_end_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_list->end_date->caption(), $employee_list->end_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_end_date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_list->end_date->errorMessage()) ?>");
			<?php if ($employee_list->employee_role_id->Required) { ?>
				elm = this.getElements("x" + infix + "_employee_role_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_list->employee_role_id->caption(), $employee_list->employee_role_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_list->default_shift_start->Required) { ?>
				elm = this.getElements("x" + infix + "_default_shift_start");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_list->default_shift_start->caption(), $employee_list->default_shift_start->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_default_shift_start");
				if (elm && !ew.checkTime(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_list->default_shift_start->errorMessage()) ?>");
			<?php if ($employee_list->default_shift_end->Required) { ?>
				elm = this.getElements("x" + infix + "_default_shift_end");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_list->default_shift_end->caption(), $employee_list->default_shift_end->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_default_shift_end");
				if (elm && !ew.checkTime(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_list->default_shift_end->errorMessage()) ?>");
			<?php if ($employee_list->working_days->Required) { ?>
				elm = this.getElements("x" + infix + "_working_days");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_list->working_days->caption(), $employee_list->working_days->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_list->working_location->Required) { ?>
				elm = this.getElements("x" + infix + "_working_location");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_list->working_location->caption(), $employee_list->working_location->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_list->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_list->status->caption(), $employee_list->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_list->profilePic->Required) { ?>
				felm = this.getElements("x" + infix + "_profilePic");
				elm = this.getElements("fn_x" + infix + "_profilePic");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_list->profilePic->caption(), $employee_list->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_list->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_list->HospID->caption(), $employee_list->HospID->RequiredErrorMessage)) ?>");
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
	femployeelist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "empNo", false)) return false;
		if (ew.valueChanged(fobj, infix, "tittle", false)) return false;
		if (ew.valueChanged(fobj, infix, "first_name", false)) return false;
		if (ew.valueChanged(fobj, infix, "middle_name", false)) return false;
		if (ew.valueChanged(fobj, infix, "last_name", false)) return false;
		if (ew.valueChanged(fobj, infix, "gender", false)) return false;
		if (ew.valueChanged(fobj, infix, "dob", false)) return false;
		if (ew.valueChanged(fobj, infix, "start_date", false)) return false;
		if (ew.valueChanged(fobj, infix, "end_date", false)) return false;
		if (ew.valueChanged(fobj, infix, "employee_role_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "default_shift_start", false)) return false;
		if (ew.valueChanged(fobj, infix, "default_shift_end", false)) return false;
		if (ew.valueChanged(fobj, infix, "working_days", false)) return false;
		if (ew.valueChanged(fobj, infix, "working_location", false)) return false;
		if (ew.valueChanged(fobj, infix, "status", false)) return false;
		if (ew.valueChanged(fobj, infix, "profilePic", false)) return false;
		return true;
	}

	// Form_CustomValidate
	femployeelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	femployeelist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	femployeelist.lists["x_tittle"] = <?php echo $employee_list->tittle->Lookup->toClientList($employee_list) ?>;
	femployeelist.lists["x_tittle"].options = <?php echo JsonEncode($employee_list->tittle->lookupOptions()) ?>;
	femployeelist.lists["x_gender"] = <?php echo $employee_list->gender->Lookup->toClientList($employee_list) ?>;
	femployeelist.lists["x_gender"].options = <?php echo JsonEncode($employee_list->gender->lookupOptions()) ?>;
	femployeelist.lists["x_employee_role_id"] = <?php echo $employee_list->employee_role_id->Lookup->toClientList($employee_list) ?>;
	femployeelist.lists["x_employee_role_id"].options = <?php echo JsonEncode($employee_list->employee_role_id->lookupOptions()) ?>;
	femployeelist.lists["x_working_location"] = <?php echo $employee_list->working_location->Lookup->toClientList($employee_list) ?>;
	femployeelist.lists["x_working_location"].options = <?php echo JsonEncode($employee_list->working_location->lookupOptions()) ?>;
	femployeelist.lists["x_status"] = <?php echo $employee_list->status->Lookup->toClientList($employee_list) ?>;
	femployeelist.lists["x_status"].options = <?php echo JsonEncode($employee_list->status->lookupOptions()) ?>;
	loadjs.done("femployeelist");
});
var femployeelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	femployeelistsrch = currentSearchForm = new ew.Form("femployeelistsrch");

	// Dynamic selection lists
	// Filters

	femployeelistsrch.filterList = <?php echo $employee_list->getFilterList() ?>;
	loadjs.done("femployeelistsrch");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #2997CB; /* preview row color */
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
	ew.PREVIEW_OVERLAY = true;
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
<?php if (!$employee_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_list->TotalRecords > 0 && $employee_list->ExportOptions->visible()) { ?>
<?php $employee_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_list->ImportOptions->visible()) { ?>
<?php $employee_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_list->SearchOptions->visible()) { ?>
<?php $employee_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_list->FilterOptions->visible()) { ?>
<?php $employee_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_list->isExport() && !$employee->CurrentAction) { ?>
<form name="femployeelistsrch" id="femployeelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="femployeelistsrch-search-panel" class="<?php echo $employee_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $employee_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($employee_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($employee_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $employee_list->showPageHeader(); ?>
<?php
$employee_list->showMessage();
?>
<?php if ($employee_list->TotalRecords > 0 || $employee->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee">
<?php if (!$employee_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $employee_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployeelist" id="femployeelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee">
<div id="gmp_employee" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($employee_list->TotalRecords > 0 || $employee_list->isAdd() || $employee_list->isCopy() || $employee_list->isGridEdit()) { ?>
<table id="tbl_employeelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee->RowType = ROWTYPE_HEADER;

// Render list options
$employee_list->renderListOptions();

// Render list options (header, left)
$employee_list->ListOptions->render("header", "left");
?>
<?php if ($employee_list->id->Visible) { // id ?>
	<?php if ($employee_list->SortUrl($employee_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_list->id->headerCellClass() ?>"><div id="elh_employee_id" class="employee_id"><div class="ew-table-header-caption"><?php echo $employee_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_list->SortUrl($employee_list->id) ?>', 1);"><div id="elh_employee_id" class="employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_list->empNo->Visible) { // empNo ?>
	<?php if ($employee_list->SortUrl($employee_list->empNo) == "") { ?>
		<th data-name="empNo" class="<?php echo $employee_list->empNo->headerCellClass() ?>"><div id="elh_employee_empNo" class="employee_empNo"><div class="ew-table-header-caption"><?php echo $employee_list->empNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="empNo" class="<?php echo $employee_list->empNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_list->SortUrl($employee_list->empNo) ?>', 1);"><div id="elh_employee_empNo" class="employee_empNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_list->empNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_list->empNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_list->empNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_list->tittle->Visible) { // tittle ?>
	<?php if ($employee_list->SortUrl($employee_list->tittle) == "") { ?>
		<th data-name="tittle" class="<?php echo $employee_list->tittle->headerCellClass() ?>"><div id="elh_employee_tittle" class="employee_tittle"><div class="ew-table-header-caption"><?php echo $employee_list->tittle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tittle" class="<?php echo $employee_list->tittle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_list->SortUrl($employee_list->tittle) ?>', 1);"><div id="elh_employee_tittle" class="employee_tittle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_list->tittle->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_list->tittle->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_list->tittle->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_list->first_name->Visible) { // first_name ?>
	<?php if ($employee_list->SortUrl($employee_list->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $employee_list->first_name->headerCellClass() ?>"><div id="elh_employee_first_name" class="employee_first_name"><div class="ew-table-header-caption"><?php echo $employee_list->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $employee_list->first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_list->SortUrl($employee_list->first_name) ?>', 1);"><div id="elh_employee_first_name" class="employee_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_list->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_list->first_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_list->first_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_list->middle_name->Visible) { // middle_name ?>
	<?php if ($employee_list->SortUrl($employee_list->middle_name) == "") { ?>
		<th data-name="middle_name" class="<?php echo $employee_list->middle_name->headerCellClass() ?>"><div id="elh_employee_middle_name" class="employee_middle_name"><div class="ew-table-header-caption"><?php echo $employee_list->middle_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="middle_name" class="<?php echo $employee_list->middle_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_list->SortUrl($employee_list->middle_name) ?>', 1);"><div id="elh_employee_middle_name" class="employee_middle_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_list->middle_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_list->middle_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_list->middle_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_list->last_name->Visible) { // last_name ?>
	<?php if ($employee_list->SortUrl($employee_list->last_name) == "") { ?>
		<th data-name="last_name" class="<?php echo $employee_list->last_name->headerCellClass() ?>"><div id="elh_employee_last_name" class="employee_last_name"><div class="ew-table-header-caption"><?php echo $employee_list->last_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="last_name" class="<?php echo $employee_list->last_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_list->SortUrl($employee_list->last_name) ?>', 1);"><div id="elh_employee_last_name" class="employee_last_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_list->last_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_list->last_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_list->last_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_list->gender->Visible) { // gender ?>
	<?php if ($employee_list->SortUrl($employee_list->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $employee_list->gender->headerCellClass() ?>"><div id="elh_employee_gender" class="employee_gender"><div class="ew-table-header-caption"><?php echo $employee_list->gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $employee_list->gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_list->SortUrl($employee_list->gender) ?>', 1);"><div id="elh_employee_gender" class="employee_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_list->gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_list->gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_list->gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_list->dob->Visible) { // dob ?>
	<?php if ($employee_list->SortUrl($employee_list->dob) == "") { ?>
		<th data-name="dob" class="<?php echo $employee_list->dob->headerCellClass() ?>"><div id="elh_employee_dob" class="employee_dob"><div class="ew-table-header-caption"><?php echo $employee_list->dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dob" class="<?php echo $employee_list->dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_list->SortUrl($employee_list->dob) ?>', 1);"><div id="elh_employee_dob" class="employee_dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_list->dob->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_list->dob->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_list->dob->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_list->start_date->Visible) { // start_date ?>
	<?php if ($employee_list->SortUrl($employee_list->start_date) == "") { ?>
		<th data-name="start_date" class="<?php echo $employee_list->start_date->headerCellClass() ?>"><div id="elh_employee_start_date" class="employee_start_date"><div class="ew-table-header-caption"><?php echo $employee_list->start_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_date" class="<?php echo $employee_list->start_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_list->SortUrl($employee_list->start_date) ?>', 1);"><div id="elh_employee_start_date" class="employee_start_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_list->start_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_list->start_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_list->start_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_list->end_date->Visible) { // end_date ?>
	<?php if ($employee_list->SortUrl($employee_list->end_date) == "") { ?>
		<th data-name="end_date" class="<?php echo $employee_list->end_date->headerCellClass() ?>"><div id="elh_employee_end_date" class="employee_end_date"><div class="ew-table-header-caption"><?php echo $employee_list->end_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="end_date" class="<?php echo $employee_list->end_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_list->SortUrl($employee_list->end_date) ?>', 1);"><div id="elh_employee_end_date" class="employee_end_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_list->end_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_list->end_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_list->end_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_list->employee_role_id->Visible) { // employee_role_id ?>
	<?php if ($employee_list->SortUrl($employee_list->employee_role_id) == "") { ?>
		<th data-name="employee_role_id" class="<?php echo $employee_list->employee_role_id->headerCellClass() ?>"><div id="elh_employee_employee_role_id" class="employee_employee_role_id"><div class="ew-table-header-caption"><?php echo $employee_list->employee_role_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_role_id" class="<?php echo $employee_list->employee_role_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_list->SortUrl($employee_list->employee_role_id) ?>', 1);"><div id="elh_employee_employee_role_id" class="employee_employee_role_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_list->employee_role_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_list->employee_role_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_list->employee_role_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_list->default_shift_start->Visible) { // default_shift_start ?>
	<?php if ($employee_list->SortUrl($employee_list->default_shift_start) == "") { ?>
		<th data-name="default_shift_start" class="<?php echo $employee_list->default_shift_start->headerCellClass() ?>"><div id="elh_employee_default_shift_start" class="employee_default_shift_start"><div class="ew-table-header-caption"><?php echo $employee_list->default_shift_start->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="default_shift_start" class="<?php echo $employee_list->default_shift_start->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_list->SortUrl($employee_list->default_shift_start) ?>', 1);"><div id="elh_employee_default_shift_start" class="employee_default_shift_start">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_list->default_shift_start->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_list->default_shift_start->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_list->default_shift_start->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_list->default_shift_end->Visible) { // default_shift_end ?>
	<?php if ($employee_list->SortUrl($employee_list->default_shift_end) == "") { ?>
		<th data-name="default_shift_end" class="<?php echo $employee_list->default_shift_end->headerCellClass() ?>"><div id="elh_employee_default_shift_end" class="employee_default_shift_end"><div class="ew-table-header-caption"><?php echo $employee_list->default_shift_end->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="default_shift_end" class="<?php echo $employee_list->default_shift_end->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_list->SortUrl($employee_list->default_shift_end) ?>', 1);"><div id="elh_employee_default_shift_end" class="employee_default_shift_end">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_list->default_shift_end->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_list->default_shift_end->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_list->default_shift_end->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_list->working_days->Visible) { // working_days ?>
	<?php if ($employee_list->SortUrl($employee_list->working_days) == "") { ?>
		<th data-name="working_days" class="<?php echo $employee_list->working_days->headerCellClass() ?>"><div id="elh_employee_working_days" class="employee_working_days"><div class="ew-table-header-caption"><?php echo $employee_list->working_days->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="working_days" class="<?php echo $employee_list->working_days->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_list->SortUrl($employee_list->working_days) ?>', 1);"><div id="elh_employee_working_days" class="employee_working_days">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_list->working_days->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_list->working_days->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_list->working_days->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_list->working_location->Visible) { // working_location ?>
	<?php if ($employee_list->SortUrl($employee_list->working_location) == "") { ?>
		<th data-name="working_location" class="<?php echo $employee_list->working_location->headerCellClass() ?>"><div id="elh_employee_working_location" class="employee_working_location"><div class="ew-table-header-caption"><?php echo $employee_list->working_location->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="working_location" class="<?php echo $employee_list->working_location->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_list->SortUrl($employee_list->working_location) ?>', 1);"><div id="elh_employee_working_location" class="employee_working_location">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_list->working_location->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_list->working_location->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_list->working_location->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_list->status->Visible) { // status ?>
	<?php if ($employee_list->SortUrl($employee_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_list->status->headerCellClass() ?>"><div id="elh_employee_status" class="employee_status"><div class="ew-table-header-caption"><?php echo $employee_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_list->SortUrl($employee_list->status) ?>', 1);"><div id="elh_employee_status" class="employee_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_list->profilePic->Visible) { // profilePic ?>
	<?php if ($employee_list->SortUrl($employee_list->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $employee_list->profilePic->headerCellClass() ?>"><div id="elh_employee_profilePic" class="employee_profilePic"><div class="ew-table-header-caption"><?php echo $employee_list->profilePic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $employee_list->profilePic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_list->SortUrl($employee_list->profilePic) ?>', 1);"><div id="elh_employee_profilePic" class="employee_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_list->profilePic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_list->profilePic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_list->profilePic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_list->HospID->Visible) { // HospID ?>
	<?php if ($employee_list->SortUrl($employee_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $employee_list->HospID->headerCellClass() ?>"><div id="elh_employee_HospID" class="employee_HospID"><div class="ew-table-header-caption"><?php echo $employee_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $employee_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_list->SortUrl($employee_list->HospID) ?>', 1);"><div id="elh_employee_HospID" class="employee_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($employee_list->isAdd() || $employee_list->isCopy()) {
		$employee_list->RowIndex = 0;
		$employee_list->KeyCount = $employee_list->RowIndex;
		if ($employee_list->isCopy() && !$employee_list->loadRow())
			$employee->CurrentAction = "add";
		if ($employee_list->isAdd())
			$employee_list->loadRowValues();
		if ($employee->EventCancelled) // Insert failed
			$employee_list->restoreFormValues(); // Restore form values

		// Set row properties
		$employee->resetAttributes();
		$employee->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_employee", "data-rowtype" => ROWTYPE_ADD]);
		$employee->RowType = ROWTYPE_ADD;

		// Render row
		$employee_list->renderRow();

		// Render list options
		$employee_list->renderListOptions();
		$employee_list->StartRowCount = 0;
?>
	<tr <?php echo $employee->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_list->ListOptions->render("body", "left", $employee_list->RowCount);
?>
	<?php if ($employee_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el<?php echo $employee_list->RowCount ?>_employee_id" class="form-group employee_id"></span>
<input type="hidden" data-table="employee" data-field="x_id" name="o<?php echo $employee_list->RowIndex ?>_id" id="o<?php echo $employee_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->empNo->Visible) { // empNo ?>
		<td data-name="empNo">
<span id="el<?php echo $employee_list->RowCount ?>_employee_empNo" class="form-group employee_empNo">
<input type="text" data-table="employee" data-field="x_empNo" name="x<?php echo $employee_list->RowIndex ?>_empNo" id="x<?php echo $employee_list->RowIndex ?>_empNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($employee_list->empNo->getPlaceHolder()) ?>" value="<?php echo $employee_list->empNo->EditValue ?>"<?php echo $employee_list->empNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee" data-field="x_empNo" name="o<?php echo $employee_list->RowIndex ?>_empNo" id="o<?php echo $employee_list->RowIndex ?>_empNo" value="<?php echo HtmlEncode($employee_list->empNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->tittle->Visible) { // tittle ?>
		<td data-name="tittle">
<span id="el<?php echo $employee_list->RowCount ?>_employee_tittle" class="form-group employee_tittle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_tittle" data-value-separator="<?php echo $employee_list->tittle->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_tittle" name="x<?php echo $employee_list->RowIndex ?>_tittle"<?php echo $employee_list->tittle->editAttributes() ?>>
			<?php echo $employee_list->tittle->selectOptionListHtml("x{$employee_list->RowIndex}_tittle") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_tittle") && !$employee_list->tittle->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_list->RowIndex ?>_tittle" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_list->tittle->caption() ?>" data-title="<?php echo $employee_list->tittle->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_list->RowIndex ?>_tittle',url:'sys_tittleaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_list->tittle->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_tittle") ?>
</span>
<input type="hidden" data-table="employee" data-field="x_tittle" name="o<?php echo $employee_list->RowIndex ?>_tittle" id="o<?php echo $employee_list->RowIndex ?>_tittle" value="<?php echo HtmlEncode($employee_list->tittle->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->first_name->Visible) { // first_name ?>
		<td data-name="first_name">
<span id="el<?php echo $employee_list->RowCount ?>_employee_first_name" class="form-group employee_first_name">
<input type="text" data-table="employee" data-field="x_first_name" name="x<?php echo $employee_list->RowIndex ?>_first_name" id="x<?php echo $employee_list->RowIndex ?>_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_list->first_name->getPlaceHolder()) ?>" value="<?php echo $employee_list->first_name->EditValue ?>"<?php echo $employee_list->first_name->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee" data-field="x_first_name" name="o<?php echo $employee_list->RowIndex ?>_first_name" id="o<?php echo $employee_list->RowIndex ?>_first_name" value="<?php echo HtmlEncode($employee_list->first_name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->middle_name->Visible) { // middle_name ?>
		<td data-name="middle_name">
<span id="el<?php echo $employee_list->RowCount ?>_employee_middle_name" class="form-group employee_middle_name">
<input type="text" data-table="employee" data-field="x_middle_name" name="x<?php echo $employee_list->RowIndex ?>_middle_name" id="x<?php echo $employee_list->RowIndex ?>_middle_name" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($employee_list->middle_name->getPlaceHolder()) ?>" value="<?php echo $employee_list->middle_name->EditValue ?>"<?php echo $employee_list->middle_name->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee" data-field="x_middle_name" name="o<?php echo $employee_list->RowIndex ?>_middle_name" id="o<?php echo $employee_list->RowIndex ?>_middle_name" value="<?php echo HtmlEncode($employee_list->middle_name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->last_name->Visible) { // last_name ?>
		<td data-name="last_name">
<span id="el<?php echo $employee_list->RowCount ?>_employee_last_name" class="form-group employee_last_name">
<input type="text" data-table="employee" data-field="x_last_name" name="x<?php echo $employee_list->RowIndex ?>_last_name" id="x<?php echo $employee_list->RowIndex ?>_last_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_list->last_name->getPlaceHolder()) ?>" value="<?php echo $employee_list->last_name->EditValue ?>"<?php echo $employee_list->last_name->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee" data-field="x_last_name" name="o<?php echo $employee_list->RowIndex ?>_last_name" id="o<?php echo $employee_list->RowIndex ?>_last_name" value="<?php echo HtmlEncode($employee_list->last_name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->gender->Visible) { // gender ?>
		<td data-name="gender">
<span id="el<?php echo $employee_list->RowCount ?>_employee_gender" class="form-group employee_gender">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_gender" data-value-separator="<?php echo $employee_list->gender->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_gender" name="x<?php echo $employee_list->RowIndex ?>_gender"<?php echo $employee_list->gender->editAttributes() ?>>
			<?php echo $employee_list->gender->selectOptionListHtml("x{$employee_list->RowIndex}_gender") ?>
		</select>
</div>
<?php echo $employee_list->gender->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_gender") ?>
</span>
<input type="hidden" data-table="employee" data-field="x_gender" name="o<?php echo $employee_list->RowIndex ?>_gender" id="o<?php echo $employee_list->RowIndex ?>_gender" value="<?php echo HtmlEncode($employee_list->gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->dob->Visible) { // dob ?>
		<td data-name="dob">
<span id="el<?php echo $employee_list->RowCount ?>_employee_dob" class="form-group employee_dob">
<input type="text" data-table="employee" data-field="x_dob" name="x<?php echo $employee_list->RowIndex ?>_dob" id="x<?php echo $employee_list->RowIndex ?>_dob" placeholder="<?php echo HtmlEncode($employee_list->dob->getPlaceHolder()) ?>" value="<?php echo $employee_list->dob->EditValue ?>"<?php echo $employee_list->dob->editAttributes() ?>>
<?php if (!$employee_list->dob->ReadOnly && !$employee_list->dob->Disabled && !isset($employee_list->dob->EditAttrs["readonly"]) && !isset($employee_list->dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "datetimepicker"], function() {
	ew.createDateTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_dob", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee" data-field="x_dob" name="o<?php echo $employee_list->RowIndex ?>_dob" id="o<?php echo $employee_list->RowIndex ?>_dob" value="<?php echo HtmlEncode($employee_list->dob->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->start_date->Visible) { // start_date ?>
		<td data-name="start_date">
<span id="el<?php echo $employee_list->RowCount ?>_employee_start_date" class="form-group employee_start_date">
<input type="text" data-table="employee" data-field="x_start_date" name="x<?php echo $employee_list->RowIndex ?>_start_date" id="x<?php echo $employee_list->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($employee_list->start_date->getPlaceHolder()) ?>" value="<?php echo $employee_list->start_date->EditValue ?>"<?php echo $employee_list->start_date->editAttributes() ?>>
<?php if (!$employee_list->start_date->ReadOnly && !$employee_list->start_date->Disabled && !isset($employee_list->start_date->EditAttrs["readonly"]) && !isset($employee_list->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "datetimepicker"], function() {
	ew.createDateTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee" data-field="x_start_date" name="o<?php echo $employee_list->RowIndex ?>_start_date" id="o<?php echo $employee_list->RowIndex ?>_start_date" value="<?php echo HtmlEncode($employee_list->start_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->end_date->Visible) { // end_date ?>
		<td data-name="end_date">
<span id="el<?php echo $employee_list->RowCount ?>_employee_end_date" class="form-group employee_end_date">
<input type="text" data-table="employee" data-field="x_end_date" name="x<?php echo $employee_list->RowIndex ?>_end_date" id="x<?php echo $employee_list->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($employee_list->end_date->getPlaceHolder()) ?>" value="<?php echo $employee_list->end_date->EditValue ?>"<?php echo $employee_list->end_date->editAttributes() ?>>
<?php if (!$employee_list->end_date->ReadOnly && !$employee_list->end_date->Disabled && !isset($employee_list->end_date->EditAttrs["readonly"]) && !isset($employee_list->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "datetimepicker"], function() {
	ew.createDateTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee" data-field="x_end_date" name="o<?php echo $employee_list->RowIndex ?>_end_date" id="o<?php echo $employee_list->RowIndex ?>_end_date" value="<?php echo HtmlEncode($employee_list->end_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->employee_role_id->Visible) { // employee_role_id ?>
		<td data-name="employee_role_id">
<span id="el<?php echo $employee_list->RowCount ?>_employee_employee_role_id" class="form-group employee_employee_role_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_employee_role_id" data-value-separator="<?php echo $employee_list->employee_role_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_employee_role_id" name="x<?php echo $employee_list->RowIndex ?>_employee_role_id"<?php echo $employee_list->employee_role_id->editAttributes() ?>>
			<?php echo $employee_list->employee_role_id->selectOptionListHtml("x{$employee_list->RowIndex}_employee_role_id") ?>
		</select>
</div>
<?php echo $employee_list->employee_role_id->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_employee_role_id") ?>
</span>
<input type="hidden" data-table="employee" data-field="x_employee_role_id" name="o<?php echo $employee_list->RowIndex ?>_employee_role_id" id="o<?php echo $employee_list->RowIndex ?>_employee_role_id" value="<?php echo HtmlEncode($employee_list->employee_role_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->default_shift_start->Visible) { // default_shift_start ?>
		<td data-name="default_shift_start">
<span id="el<?php echo $employee_list->RowCount ?>_employee_default_shift_start" class="form-group employee_default_shift_start">
<input type="text" data-table="employee" data-field="x_default_shift_start" name="x<?php echo $employee_list->RowIndex ?>_default_shift_start" id="x<?php echo $employee_list->RowIndex ?>_default_shift_start" placeholder="<?php echo HtmlEncode($employee_list->default_shift_start->getPlaceHolder()) ?>" value="<?php echo $employee_list->default_shift_start->EditValue ?>"<?php echo $employee_list->default_shift_start->editAttributes() ?>>
<?php if (!$employee_list->default_shift_start->ReadOnly && !$employee_list->default_shift_start->Disabled && !isset($employee_list->default_shift_start->EditAttrs["readonly"]) && !isset($employee_list->default_shift_start->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "timepicker"], function() {
	ew.createTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_default_shift_start", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee" data-field="x_default_shift_start" name="o<?php echo $employee_list->RowIndex ?>_default_shift_start" id="o<?php echo $employee_list->RowIndex ?>_default_shift_start" value="<?php echo HtmlEncode($employee_list->default_shift_start->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->default_shift_end->Visible) { // default_shift_end ?>
		<td data-name="default_shift_end">
<span id="el<?php echo $employee_list->RowCount ?>_employee_default_shift_end" class="form-group employee_default_shift_end">
<input type="text" data-table="employee" data-field="x_default_shift_end" name="x<?php echo $employee_list->RowIndex ?>_default_shift_end" id="x<?php echo $employee_list->RowIndex ?>_default_shift_end" placeholder="<?php echo HtmlEncode($employee_list->default_shift_end->getPlaceHolder()) ?>" value="<?php echo $employee_list->default_shift_end->EditValue ?>"<?php echo $employee_list->default_shift_end->editAttributes() ?>>
<?php if (!$employee_list->default_shift_end->ReadOnly && !$employee_list->default_shift_end->Disabled && !isset($employee_list->default_shift_end->EditAttrs["readonly"]) && !isset($employee_list->default_shift_end->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "timepicker"], function() {
	ew.createTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_default_shift_end", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee" data-field="x_default_shift_end" name="o<?php echo $employee_list->RowIndex ?>_default_shift_end" id="o<?php echo $employee_list->RowIndex ?>_default_shift_end" value="<?php echo HtmlEncode($employee_list->default_shift_end->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->working_days->Visible) { // working_days ?>
		<td data-name="working_days">
<span id="el<?php echo $employee_list->RowCount ?>_employee_working_days" class="form-group employee_working_days">
<input type="text" data-table="employee" data-field="x_working_days" name="x<?php echo $employee_list->RowIndex ?>_working_days" id="x<?php echo $employee_list->RowIndex ?>_working_days" size="30" maxlength="7" placeholder="<?php echo HtmlEncode($employee_list->working_days->getPlaceHolder()) ?>" value="<?php echo $employee_list->working_days->EditValue ?>"<?php echo $employee_list->working_days->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee" data-field="x_working_days" name="o<?php echo $employee_list->RowIndex ?>_working_days" id="o<?php echo $employee_list->RowIndex ?>_working_days" value="<?php echo HtmlEncode($employee_list->working_days->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->working_location->Visible) { // working_location ?>
		<td data-name="working_location">
<span id="el<?php echo $employee_list->RowCount ?>_employee_working_location" class="form-group employee_working_location">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_working_location" data-value-separator="<?php echo $employee_list->working_location->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_working_location" name="x<?php echo $employee_list->RowIndex ?>_working_location"<?php echo $employee_list->working_location->editAttributes() ?>>
			<?php echo $employee_list->working_location->selectOptionListHtml("x{$employee_list->RowIndex}_working_location") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "hospital") && !$employee_list->working_location->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_list->RowIndex ?>_working_location" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_list->working_location->caption() ?>" data-title="<?php echo $employee_list->working_location->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_list->RowIndex ?>_working_location',url:'hospitaladdopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_list->working_location->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_working_location") ?>
</span>
<input type="hidden" data-table="employee" data-field="x_working_location" name="o<?php echo $employee_list->RowIndex ?>_working_location" id="o<?php echo $employee_list->RowIndex ?>_working_location" value="<?php echo HtmlEncode($employee_list->working_location->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->status->Visible) { // status ?>
		<td data-name="status">
<span id="el<?php echo $employee_list->RowCount ?>_employee_status" class="form-group employee_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_status" data-value-separator="<?php echo $employee_list->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_status" name="x<?php echo $employee_list->RowIndex ?>_status"<?php echo $employee_list->status->editAttributes() ?>>
			<?php echo $employee_list->status->selectOptionListHtml("x{$employee_list->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_list->status->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee" data-field="x_status" name="o<?php echo $employee_list->RowIndex ?>_status" id="o<?php echo $employee_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_list->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic">
<span id="el<?php echo $employee_list->RowCount ?>_employee_profilePic" class="form-group employee_profilePic">
<div id="fd_x<?php echo $employee_list->RowIndex ?>_profilePic">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_list->profilePic->title() ?>" data-table="employee" data-field="x_profilePic" name="x<?php echo $employee_list->RowIndex ?>_profilePic" id="x<?php echo $employee_list->RowIndex ?>_profilePic" lang="<?php echo CurrentLanguageID() ?>"<?php echo $employee_list->profilePic->editAttributes() ?><?php if ($employee_list->profilePic->ReadOnly || $employee_list->profilePic->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_list->RowIndex ?>_profilePic"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fn_x<?php echo $employee_list->RowIndex ?>_profilePic" value="<?php echo $employee_list->profilePic->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fa_x<?php echo $employee_list->RowIndex ?>_profilePic" value="0">
<input type="hidden" name="fs_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fs_x<?php echo $employee_list->RowIndex ?>_profilePic" value="45">
<input type="hidden" name="fx_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fx_x<?php echo $employee_list->RowIndex ?>_profilePic" value="<?php echo $employee_list->profilePic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fm_x<?php echo $employee_list->RowIndex ?>_profilePic" value="<?php echo $employee_list->profilePic->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $employee_list->RowIndex ?>_profilePic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee" data-field="x_profilePic" name="o<?php echo $employee_list->RowIndex ?>_profilePic" id="o<?php echo $employee_list->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($employee_list->profilePic->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="employee" data-field="x_HospID" name="o<?php echo $employee_list->RowIndex ?>_HospID" id="o<?php echo $employee_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_list->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_list->ListOptions->render("body", "right", $employee_list->RowCount);
?>
<script>
loadjs.ready(["femployeelist", "load"], function() {
	femployeelist.updateLists(<?php echo $employee_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
<?php
if ($employee_list->ExportAll && $employee_list->isExport()) {
	$employee_list->StopRecord = $employee_list->TotalRecords;
} else {

	// Set the last record to display
	if ($employee_list->TotalRecords > $employee_list->StartRecord + $employee_list->DisplayRecords - 1)
		$employee_list->StopRecord = $employee_list->StartRecord + $employee_list->DisplayRecords - 1;
	else
		$employee_list->StopRecord = $employee_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($employee->isConfirm() || $employee_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($employee_list->FormKeyCountName) && ($employee_list->isGridAdd() || $employee_list->isGridEdit() || $employee->isConfirm())) {
		$employee_list->KeyCount = $CurrentForm->getValue($employee_list->FormKeyCountName);
		$employee_list->StopRecord = $employee_list->StartRecord + $employee_list->KeyCount - 1;
	}
}
$employee_list->RecordCount = $employee_list->StartRecord - 1;
if ($employee_list->Recordset && !$employee_list->Recordset->EOF) {
	$employee_list->Recordset->moveFirst();
	$selectLimit = $employee_list->UseSelectLimit;
	if (!$selectLimit && $employee_list->StartRecord > 1)
		$employee_list->Recordset->move($employee_list->StartRecord - 1);
} elseif (!$employee->AllowAddDeleteRow && $employee_list->StopRecord == 0) {
	$employee_list->StopRecord = $employee->GridAddRowCount;
}

// Initialize aggregate
$employee->RowType = ROWTYPE_AGGREGATEINIT;
$employee->resetAttributes();
$employee_list->renderRow();
$employee_list->EditRowCount = 0;
if ($employee_list->isEdit())
	$employee_list->RowIndex = 1;
if ($employee_list->isGridAdd())
	$employee_list->RowIndex = 0;
if ($employee_list->isGridEdit())
	$employee_list->RowIndex = 0;
while ($employee_list->RecordCount < $employee_list->StopRecord) {
	$employee_list->RecordCount++;
	if ($employee_list->RecordCount >= $employee_list->StartRecord) {
		$employee_list->RowCount++;
		if ($employee_list->isGridAdd() || $employee_list->isGridEdit() || $employee->isConfirm()) {
			$employee_list->RowIndex++;
			$CurrentForm->Index = $employee_list->RowIndex;
			if ($CurrentForm->hasValue($employee_list->FormActionName) && ($employee->isConfirm() || $employee_list->EventCancelled))
				$employee_list->RowAction = strval($CurrentForm->getValue($employee_list->FormActionName));
			elseif ($employee_list->isGridAdd())
				$employee_list->RowAction = "insert";
			else
				$employee_list->RowAction = "";
		}

		// Set up key count
		$employee_list->KeyCount = $employee_list->RowIndex;

		// Init row class and style
		$employee->resetAttributes();
		$employee->CssClass = "";
		if ($employee_list->isGridAdd()) {
			$employee_list->loadRowValues(); // Load default values
		} else {
			$employee_list->loadRowValues($employee_list->Recordset); // Load row values
		}
		$employee->RowType = ROWTYPE_VIEW; // Render view
		if ($employee_list->isGridAdd()) // Grid add
			$employee->RowType = ROWTYPE_ADD; // Render add
		if ($employee_list->isGridAdd() && $employee->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$employee_list->restoreCurrentRowFormValues($employee_list->RowIndex); // Restore form values
		if ($employee_list->isEdit()) {
			if ($employee_list->checkInlineEditKey() && $employee_list->EditRowCount == 0) { // Inline edit
				$employee->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($employee_list->isGridEdit()) { // Grid edit
			if ($employee->EventCancelled)
				$employee_list->restoreCurrentRowFormValues($employee_list->RowIndex); // Restore form values
			if ($employee_list->RowAction == "insert")
				$employee->RowType = ROWTYPE_ADD; // Render add
			else
				$employee->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($employee_list->isEdit() && $employee->RowType == ROWTYPE_EDIT && $employee->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$employee_list->restoreFormValues(); // Restore form values
		}
		if ($employee_list->isGridEdit() && ($employee->RowType == ROWTYPE_EDIT || $employee->RowType == ROWTYPE_ADD) && $employee->EventCancelled) // Update failed
			$employee_list->restoreCurrentRowFormValues($employee_list->RowIndex); // Restore form values
		if ($employee->RowType == ROWTYPE_EDIT) // Edit row
			$employee_list->EditRowCount++;

		// Set up row id / data-rowindex
		$employee->RowAttrs->merge(["data-rowindex" => $employee_list->RowCount, "id" => "r" . $employee_list->RowCount . "_employee", "data-rowtype" => $employee->RowType]);

		// Render row
		$employee_list->renderRow();

		// Render list options
		$employee_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($employee_list->RowAction != "delete" && $employee_list->RowAction != "insertdelete" && !($employee_list->RowAction == "insert" && $employee->isConfirm() && $employee_list->emptyRow())) {
?>
	<tr <?php echo $employee->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_list->ListOptions->render("body", "left", $employee_list->RowCount);
?>
	<?php if ($employee_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $employee_list->id->cellAttributes() ?>>
<?php if ($employee->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_id" class="form-group"></span>
<input type="hidden" data-table="employee" data-field="x_id" name="o<?php echo $employee_list->RowIndex ?>_id" id="o<?php echo $employee_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_list->id->OldValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_id" class="form-group">
<span<?php echo $employee_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee" data-field="x_id" name="x<?php echo $employee_list->RowIndex ?>_id" id="x<?php echo $employee_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_id">
<span<?php echo $employee_list->id->viewAttributes() ?>><?php echo $employee_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_list->empNo->Visible) { // empNo ?>
		<td data-name="empNo" <?php echo $employee_list->empNo->cellAttributes() ?>>
<?php if ($employee->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_empNo" class="form-group">
<input type="text" data-table="employee" data-field="x_empNo" name="x<?php echo $employee_list->RowIndex ?>_empNo" id="x<?php echo $employee_list->RowIndex ?>_empNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($employee_list->empNo->getPlaceHolder()) ?>" value="<?php echo $employee_list->empNo->EditValue ?>"<?php echo $employee_list->empNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee" data-field="x_empNo" name="o<?php echo $employee_list->RowIndex ?>_empNo" id="o<?php echo $employee_list->RowIndex ?>_empNo" value="<?php echo HtmlEncode($employee_list->empNo->OldValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_empNo" class="form-group">
<input type="text" data-table="employee" data-field="x_empNo" name="x<?php echo $employee_list->RowIndex ?>_empNo" id="x<?php echo $employee_list->RowIndex ?>_empNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($employee_list->empNo->getPlaceHolder()) ?>" value="<?php echo $employee_list->empNo->EditValue ?>"<?php echo $employee_list->empNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_empNo">
<span<?php echo $employee_list->empNo->viewAttributes() ?>><?php echo $employee_list->empNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_list->tittle->Visible) { // tittle ?>
		<td data-name="tittle" <?php echo $employee_list->tittle->cellAttributes() ?>>
<?php if ($employee->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_tittle" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_tittle" data-value-separator="<?php echo $employee_list->tittle->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_tittle" name="x<?php echo $employee_list->RowIndex ?>_tittle"<?php echo $employee_list->tittle->editAttributes() ?>>
			<?php echo $employee_list->tittle->selectOptionListHtml("x{$employee_list->RowIndex}_tittle") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_tittle") && !$employee_list->tittle->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_list->RowIndex ?>_tittle" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_list->tittle->caption() ?>" data-title="<?php echo $employee_list->tittle->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_list->RowIndex ?>_tittle',url:'sys_tittleaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_list->tittle->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_tittle") ?>
</span>
<input type="hidden" data-table="employee" data-field="x_tittle" name="o<?php echo $employee_list->RowIndex ?>_tittle" id="o<?php echo $employee_list->RowIndex ?>_tittle" value="<?php echo HtmlEncode($employee_list->tittle->OldValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_tittle" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_tittle" data-value-separator="<?php echo $employee_list->tittle->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_tittle" name="x<?php echo $employee_list->RowIndex ?>_tittle"<?php echo $employee_list->tittle->editAttributes() ?>>
			<?php echo $employee_list->tittle->selectOptionListHtml("x{$employee_list->RowIndex}_tittle") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_tittle") && !$employee_list->tittle->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_list->RowIndex ?>_tittle" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_list->tittle->caption() ?>" data-title="<?php echo $employee_list->tittle->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_list->RowIndex ?>_tittle',url:'sys_tittleaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_list->tittle->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_tittle") ?>
</span>
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_tittle">
<span<?php echo $employee_list->tittle->viewAttributes() ?>><?php echo $employee_list->tittle->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_list->first_name->Visible) { // first_name ?>
		<td data-name="first_name" <?php echo $employee_list->first_name->cellAttributes() ?>>
<?php if ($employee->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_first_name" class="form-group">
<input type="text" data-table="employee" data-field="x_first_name" name="x<?php echo $employee_list->RowIndex ?>_first_name" id="x<?php echo $employee_list->RowIndex ?>_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_list->first_name->getPlaceHolder()) ?>" value="<?php echo $employee_list->first_name->EditValue ?>"<?php echo $employee_list->first_name->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee" data-field="x_first_name" name="o<?php echo $employee_list->RowIndex ?>_first_name" id="o<?php echo $employee_list->RowIndex ?>_first_name" value="<?php echo HtmlEncode($employee_list->first_name->OldValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_first_name" class="form-group">
<input type="text" data-table="employee" data-field="x_first_name" name="x<?php echo $employee_list->RowIndex ?>_first_name" id="x<?php echo $employee_list->RowIndex ?>_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_list->first_name->getPlaceHolder()) ?>" value="<?php echo $employee_list->first_name->EditValue ?>"<?php echo $employee_list->first_name->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_first_name">
<span<?php echo $employee_list->first_name->viewAttributes() ?>><?php echo $employee_list->first_name->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_list->middle_name->Visible) { // middle_name ?>
		<td data-name="middle_name" <?php echo $employee_list->middle_name->cellAttributes() ?>>
<?php if ($employee->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_middle_name" class="form-group">
<input type="text" data-table="employee" data-field="x_middle_name" name="x<?php echo $employee_list->RowIndex ?>_middle_name" id="x<?php echo $employee_list->RowIndex ?>_middle_name" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($employee_list->middle_name->getPlaceHolder()) ?>" value="<?php echo $employee_list->middle_name->EditValue ?>"<?php echo $employee_list->middle_name->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee" data-field="x_middle_name" name="o<?php echo $employee_list->RowIndex ?>_middle_name" id="o<?php echo $employee_list->RowIndex ?>_middle_name" value="<?php echo HtmlEncode($employee_list->middle_name->OldValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_middle_name" class="form-group">
<input type="text" data-table="employee" data-field="x_middle_name" name="x<?php echo $employee_list->RowIndex ?>_middle_name" id="x<?php echo $employee_list->RowIndex ?>_middle_name" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($employee_list->middle_name->getPlaceHolder()) ?>" value="<?php echo $employee_list->middle_name->EditValue ?>"<?php echo $employee_list->middle_name->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_middle_name">
<span<?php echo $employee_list->middle_name->viewAttributes() ?>><?php echo $employee_list->middle_name->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_list->last_name->Visible) { // last_name ?>
		<td data-name="last_name" <?php echo $employee_list->last_name->cellAttributes() ?>>
<?php if ($employee->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_last_name" class="form-group">
<input type="text" data-table="employee" data-field="x_last_name" name="x<?php echo $employee_list->RowIndex ?>_last_name" id="x<?php echo $employee_list->RowIndex ?>_last_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_list->last_name->getPlaceHolder()) ?>" value="<?php echo $employee_list->last_name->EditValue ?>"<?php echo $employee_list->last_name->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee" data-field="x_last_name" name="o<?php echo $employee_list->RowIndex ?>_last_name" id="o<?php echo $employee_list->RowIndex ?>_last_name" value="<?php echo HtmlEncode($employee_list->last_name->OldValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_last_name" class="form-group">
<input type="text" data-table="employee" data-field="x_last_name" name="x<?php echo $employee_list->RowIndex ?>_last_name" id="x<?php echo $employee_list->RowIndex ?>_last_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_list->last_name->getPlaceHolder()) ?>" value="<?php echo $employee_list->last_name->EditValue ?>"<?php echo $employee_list->last_name->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_last_name">
<span<?php echo $employee_list->last_name->viewAttributes() ?>><?php echo $employee_list->last_name->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_list->gender->Visible) { // gender ?>
		<td data-name="gender" <?php echo $employee_list->gender->cellAttributes() ?>>
<?php if ($employee->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_gender" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_gender" data-value-separator="<?php echo $employee_list->gender->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_gender" name="x<?php echo $employee_list->RowIndex ?>_gender"<?php echo $employee_list->gender->editAttributes() ?>>
			<?php echo $employee_list->gender->selectOptionListHtml("x{$employee_list->RowIndex}_gender") ?>
		</select>
</div>
<?php echo $employee_list->gender->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_gender") ?>
</span>
<input type="hidden" data-table="employee" data-field="x_gender" name="o<?php echo $employee_list->RowIndex ?>_gender" id="o<?php echo $employee_list->RowIndex ?>_gender" value="<?php echo HtmlEncode($employee_list->gender->OldValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_gender" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_gender" data-value-separator="<?php echo $employee_list->gender->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_gender" name="x<?php echo $employee_list->RowIndex ?>_gender"<?php echo $employee_list->gender->editAttributes() ?>>
			<?php echo $employee_list->gender->selectOptionListHtml("x{$employee_list->RowIndex}_gender") ?>
		</select>
</div>
<?php echo $employee_list->gender->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_gender") ?>
</span>
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_gender">
<span<?php echo $employee_list->gender->viewAttributes() ?>><?php echo $employee_list->gender->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_list->dob->Visible) { // dob ?>
		<td data-name="dob" <?php echo $employee_list->dob->cellAttributes() ?>>
<?php if ($employee->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_dob" class="form-group">
<input type="text" data-table="employee" data-field="x_dob" name="x<?php echo $employee_list->RowIndex ?>_dob" id="x<?php echo $employee_list->RowIndex ?>_dob" placeholder="<?php echo HtmlEncode($employee_list->dob->getPlaceHolder()) ?>" value="<?php echo $employee_list->dob->EditValue ?>"<?php echo $employee_list->dob->editAttributes() ?>>
<?php if (!$employee_list->dob->ReadOnly && !$employee_list->dob->Disabled && !isset($employee_list->dob->EditAttrs["readonly"]) && !isset($employee_list->dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "datetimepicker"], function() {
	ew.createDateTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_dob", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee" data-field="x_dob" name="o<?php echo $employee_list->RowIndex ?>_dob" id="o<?php echo $employee_list->RowIndex ?>_dob" value="<?php echo HtmlEncode($employee_list->dob->OldValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_dob" class="form-group">
<input type="text" data-table="employee" data-field="x_dob" name="x<?php echo $employee_list->RowIndex ?>_dob" id="x<?php echo $employee_list->RowIndex ?>_dob" placeholder="<?php echo HtmlEncode($employee_list->dob->getPlaceHolder()) ?>" value="<?php echo $employee_list->dob->EditValue ?>"<?php echo $employee_list->dob->editAttributes() ?>>
<?php if (!$employee_list->dob->ReadOnly && !$employee_list->dob->Disabled && !isset($employee_list->dob->EditAttrs["readonly"]) && !isset($employee_list->dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "datetimepicker"], function() {
	ew.createDateTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_dob", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_dob">
<span<?php echo $employee_list->dob->viewAttributes() ?>><?php echo $employee_list->dob->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_list->start_date->Visible) { // start_date ?>
		<td data-name="start_date" <?php echo $employee_list->start_date->cellAttributes() ?>>
<?php if ($employee->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_start_date" class="form-group">
<input type="text" data-table="employee" data-field="x_start_date" name="x<?php echo $employee_list->RowIndex ?>_start_date" id="x<?php echo $employee_list->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($employee_list->start_date->getPlaceHolder()) ?>" value="<?php echo $employee_list->start_date->EditValue ?>"<?php echo $employee_list->start_date->editAttributes() ?>>
<?php if (!$employee_list->start_date->ReadOnly && !$employee_list->start_date->Disabled && !isset($employee_list->start_date->EditAttrs["readonly"]) && !isset($employee_list->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "datetimepicker"], function() {
	ew.createDateTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee" data-field="x_start_date" name="o<?php echo $employee_list->RowIndex ?>_start_date" id="o<?php echo $employee_list->RowIndex ?>_start_date" value="<?php echo HtmlEncode($employee_list->start_date->OldValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_start_date" class="form-group">
<input type="text" data-table="employee" data-field="x_start_date" name="x<?php echo $employee_list->RowIndex ?>_start_date" id="x<?php echo $employee_list->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($employee_list->start_date->getPlaceHolder()) ?>" value="<?php echo $employee_list->start_date->EditValue ?>"<?php echo $employee_list->start_date->editAttributes() ?>>
<?php if (!$employee_list->start_date->ReadOnly && !$employee_list->start_date->Disabled && !isset($employee_list->start_date->EditAttrs["readonly"]) && !isset($employee_list->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "datetimepicker"], function() {
	ew.createDateTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_start_date">
<span<?php echo $employee_list->start_date->viewAttributes() ?>><?php echo $employee_list->start_date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_list->end_date->Visible) { // end_date ?>
		<td data-name="end_date" <?php echo $employee_list->end_date->cellAttributes() ?>>
<?php if ($employee->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_end_date" class="form-group">
<input type="text" data-table="employee" data-field="x_end_date" name="x<?php echo $employee_list->RowIndex ?>_end_date" id="x<?php echo $employee_list->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($employee_list->end_date->getPlaceHolder()) ?>" value="<?php echo $employee_list->end_date->EditValue ?>"<?php echo $employee_list->end_date->editAttributes() ?>>
<?php if (!$employee_list->end_date->ReadOnly && !$employee_list->end_date->Disabled && !isset($employee_list->end_date->EditAttrs["readonly"]) && !isset($employee_list->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "datetimepicker"], function() {
	ew.createDateTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee" data-field="x_end_date" name="o<?php echo $employee_list->RowIndex ?>_end_date" id="o<?php echo $employee_list->RowIndex ?>_end_date" value="<?php echo HtmlEncode($employee_list->end_date->OldValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_end_date" class="form-group">
<input type="text" data-table="employee" data-field="x_end_date" name="x<?php echo $employee_list->RowIndex ?>_end_date" id="x<?php echo $employee_list->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($employee_list->end_date->getPlaceHolder()) ?>" value="<?php echo $employee_list->end_date->EditValue ?>"<?php echo $employee_list->end_date->editAttributes() ?>>
<?php if (!$employee_list->end_date->ReadOnly && !$employee_list->end_date->Disabled && !isset($employee_list->end_date->EditAttrs["readonly"]) && !isset($employee_list->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "datetimepicker"], function() {
	ew.createDateTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_end_date">
<span<?php echo $employee_list->end_date->viewAttributes() ?>><?php echo $employee_list->end_date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_list->employee_role_id->Visible) { // employee_role_id ?>
		<td data-name="employee_role_id" <?php echo $employee_list->employee_role_id->cellAttributes() ?>>
<?php if ($employee->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_employee_role_id" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_employee_role_id" data-value-separator="<?php echo $employee_list->employee_role_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_employee_role_id" name="x<?php echo $employee_list->RowIndex ?>_employee_role_id"<?php echo $employee_list->employee_role_id->editAttributes() ?>>
			<?php echo $employee_list->employee_role_id->selectOptionListHtml("x{$employee_list->RowIndex}_employee_role_id") ?>
		</select>
</div>
<?php echo $employee_list->employee_role_id->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_employee_role_id") ?>
</span>
<input type="hidden" data-table="employee" data-field="x_employee_role_id" name="o<?php echo $employee_list->RowIndex ?>_employee_role_id" id="o<?php echo $employee_list->RowIndex ?>_employee_role_id" value="<?php echo HtmlEncode($employee_list->employee_role_id->OldValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_employee_role_id" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_employee_role_id" data-value-separator="<?php echo $employee_list->employee_role_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_employee_role_id" name="x<?php echo $employee_list->RowIndex ?>_employee_role_id"<?php echo $employee_list->employee_role_id->editAttributes() ?>>
			<?php echo $employee_list->employee_role_id->selectOptionListHtml("x{$employee_list->RowIndex}_employee_role_id") ?>
		</select>
</div>
<?php echo $employee_list->employee_role_id->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_employee_role_id") ?>
</span>
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_employee_role_id">
<span<?php echo $employee_list->employee_role_id->viewAttributes() ?>><?php echo $employee_list->employee_role_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_list->default_shift_start->Visible) { // default_shift_start ?>
		<td data-name="default_shift_start" <?php echo $employee_list->default_shift_start->cellAttributes() ?>>
<?php if ($employee->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_default_shift_start" class="form-group">
<input type="text" data-table="employee" data-field="x_default_shift_start" name="x<?php echo $employee_list->RowIndex ?>_default_shift_start" id="x<?php echo $employee_list->RowIndex ?>_default_shift_start" placeholder="<?php echo HtmlEncode($employee_list->default_shift_start->getPlaceHolder()) ?>" value="<?php echo $employee_list->default_shift_start->EditValue ?>"<?php echo $employee_list->default_shift_start->editAttributes() ?>>
<?php if (!$employee_list->default_shift_start->ReadOnly && !$employee_list->default_shift_start->Disabled && !isset($employee_list->default_shift_start->EditAttrs["readonly"]) && !isset($employee_list->default_shift_start->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "timepicker"], function() {
	ew.createTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_default_shift_start", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee" data-field="x_default_shift_start" name="o<?php echo $employee_list->RowIndex ?>_default_shift_start" id="o<?php echo $employee_list->RowIndex ?>_default_shift_start" value="<?php echo HtmlEncode($employee_list->default_shift_start->OldValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_default_shift_start" class="form-group">
<input type="text" data-table="employee" data-field="x_default_shift_start" name="x<?php echo $employee_list->RowIndex ?>_default_shift_start" id="x<?php echo $employee_list->RowIndex ?>_default_shift_start" placeholder="<?php echo HtmlEncode($employee_list->default_shift_start->getPlaceHolder()) ?>" value="<?php echo $employee_list->default_shift_start->EditValue ?>"<?php echo $employee_list->default_shift_start->editAttributes() ?>>
<?php if (!$employee_list->default_shift_start->ReadOnly && !$employee_list->default_shift_start->Disabled && !isset($employee_list->default_shift_start->EditAttrs["readonly"]) && !isset($employee_list->default_shift_start->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "timepicker"], function() {
	ew.createTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_default_shift_start", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_default_shift_start">
<span<?php echo $employee_list->default_shift_start->viewAttributes() ?>><?php echo $employee_list->default_shift_start->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_list->default_shift_end->Visible) { // default_shift_end ?>
		<td data-name="default_shift_end" <?php echo $employee_list->default_shift_end->cellAttributes() ?>>
<?php if ($employee->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_default_shift_end" class="form-group">
<input type="text" data-table="employee" data-field="x_default_shift_end" name="x<?php echo $employee_list->RowIndex ?>_default_shift_end" id="x<?php echo $employee_list->RowIndex ?>_default_shift_end" placeholder="<?php echo HtmlEncode($employee_list->default_shift_end->getPlaceHolder()) ?>" value="<?php echo $employee_list->default_shift_end->EditValue ?>"<?php echo $employee_list->default_shift_end->editAttributes() ?>>
<?php if (!$employee_list->default_shift_end->ReadOnly && !$employee_list->default_shift_end->Disabled && !isset($employee_list->default_shift_end->EditAttrs["readonly"]) && !isset($employee_list->default_shift_end->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "timepicker"], function() {
	ew.createTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_default_shift_end", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee" data-field="x_default_shift_end" name="o<?php echo $employee_list->RowIndex ?>_default_shift_end" id="o<?php echo $employee_list->RowIndex ?>_default_shift_end" value="<?php echo HtmlEncode($employee_list->default_shift_end->OldValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_default_shift_end" class="form-group">
<input type="text" data-table="employee" data-field="x_default_shift_end" name="x<?php echo $employee_list->RowIndex ?>_default_shift_end" id="x<?php echo $employee_list->RowIndex ?>_default_shift_end" placeholder="<?php echo HtmlEncode($employee_list->default_shift_end->getPlaceHolder()) ?>" value="<?php echo $employee_list->default_shift_end->EditValue ?>"<?php echo $employee_list->default_shift_end->editAttributes() ?>>
<?php if (!$employee_list->default_shift_end->ReadOnly && !$employee_list->default_shift_end->Disabled && !isset($employee_list->default_shift_end->EditAttrs["readonly"]) && !isset($employee_list->default_shift_end->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "timepicker"], function() {
	ew.createTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_default_shift_end", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_default_shift_end">
<span<?php echo $employee_list->default_shift_end->viewAttributes() ?>><?php echo $employee_list->default_shift_end->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_list->working_days->Visible) { // working_days ?>
		<td data-name="working_days" <?php echo $employee_list->working_days->cellAttributes() ?>>
<?php if ($employee->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_working_days" class="form-group">
<input type="text" data-table="employee" data-field="x_working_days" name="x<?php echo $employee_list->RowIndex ?>_working_days" id="x<?php echo $employee_list->RowIndex ?>_working_days" size="30" maxlength="7" placeholder="<?php echo HtmlEncode($employee_list->working_days->getPlaceHolder()) ?>" value="<?php echo $employee_list->working_days->EditValue ?>"<?php echo $employee_list->working_days->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee" data-field="x_working_days" name="o<?php echo $employee_list->RowIndex ?>_working_days" id="o<?php echo $employee_list->RowIndex ?>_working_days" value="<?php echo HtmlEncode($employee_list->working_days->OldValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_working_days" class="form-group">
<input type="text" data-table="employee" data-field="x_working_days" name="x<?php echo $employee_list->RowIndex ?>_working_days" id="x<?php echo $employee_list->RowIndex ?>_working_days" size="30" maxlength="7" placeholder="<?php echo HtmlEncode($employee_list->working_days->getPlaceHolder()) ?>" value="<?php echo $employee_list->working_days->EditValue ?>"<?php echo $employee_list->working_days->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_working_days">
<span<?php echo $employee_list->working_days->viewAttributes() ?>><?php echo $employee_list->working_days->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_list->working_location->Visible) { // working_location ?>
		<td data-name="working_location" <?php echo $employee_list->working_location->cellAttributes() ?>>
<?php if ($employee->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_working_location" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_working_location" data-value-separator="<?php echo $employee_list->working_location->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_working_location" name="x<?php echo $employee_list->RowIndex ?>_working_location"<?php echo $employee_list->working_location->editAttributes() ?>>
			<?php echo $employee_list->working_location->selectOptionListHtml("x{$employee_list->RowIndex}_working_location") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "hospital") && !$employee_list->working_location->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_list->RowIndex ?>_working_location" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_list->working_location->caption() ?>" data-title="<?php echo $employee_list->working_location->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_list->RowIndex ?>_working_location',url:'hospitaladdopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_list->working_location->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_working_location") ?>
</span>
<input type="hidden" data-table="employee" data-field="x_working_location" name="o<?php echo $employee_list->RowIndex ?>_working_location" id="o<?php echo $employee_list->RowIndex ?>_working_location" value="<?php echo HtmlEncode($employee_list->working_location->OldValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_working_location" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_working_location" data-value-separator="<?php echo $employee_list->working_location->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_working_location" name="x<?php echo $employee_list->RowIndex ?>_working_location"<?php echo $employee_list->working_location->editAttributes() ?>>
			<?php echo $employee_list->working_location->selectOptionListHtml("x{$employee_list->RowIndex}_working_location") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "hospital") && !$employee_list->working_location->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_list->RowIndex ?>_working_location" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_list->working_location->caption() ?>" data-title="<?php echo $employee_list->working_location->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_list->RowIndex ?>_working_location',url:'hospitaladdopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_list->working_location->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_working_location") ?>
</span>
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_working_location">
<span<?php echo $employee_list->working_location->viewAttributes() ?>><?php echo $employee_list->working_location->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $employee_list->status->cellAttributes() ?>>
<?php if ($employee->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_status" data-value-separator="<?php echo $employee_list->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_status" name="x<?php echo $employee_list->RowIndex ?>_status"<?php echo $employee_list->status->editAttributes() ?>>
			<?php echo $employee_list->status->selectOptionListHtml("x{$employee_list->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_list->status->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee" data-field="x_status" name="o<?php echo $employee_list->RowIndex ?>_status" id="o<?php echo $employee_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_list->status->OldValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_status" data-value-separator="<?php echo $employee_list->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_status" name="x<?php echo $employee_list->RowIndex ?>_status"<?php echo $employee_list->status->editAttributes() ?>>
			<?php echo $employee_list->status->selectOptionListHtml("x{$employee_list->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_list->status->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_status">
<span<?php echo $employee_list->status->viewAttributes() ?>><?php echo $employee_list->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_list->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic" <?php echo $employee_list->profilePic->cellAttributes() ?>>
<?php if ($employee->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_profilePic" class="form-group">
<div id="fd_x<?php echo $employee_list->RowIndex ?>_profilePic">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_list->profilePic->title() ?>" data-table="employee" data-field="x_profilePic" name="x<?php echo $employee_list->RowIndex ?>_profilePic" id="x<?php echo $employee_list->RowIndex ?>_profilePic" lang="<?php echo CurrentLanguageID() ?>"<?php echo $employee_list->profilePic->editAttributes() ?><?php if ($employee_list->profilePic->ReadOnly || $employee_list->profilePic->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_list->RowIndex ?>_profilePic"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fn_x<?php echo $employee_list->RowIndex ?>_profilePic" value="<?php echo $employee_list->profilePic->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fa_x<?php echo $employee_list->RowIndex ?>_profilePic" value="0">
<input type="hidden" name="fs_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fs_x<?php echo $employee_list->RowIndex ?>_profilePic" value="45">
<input type="hidden" name="fx_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fx_x<?php echo $employee_list->RowIndex ?>_profilePic" value="<?php echo $employee_list->profilePic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fm_x<?php echo $employee_list->RowIndex ?>_profilePic" value="<?php echo $employee_list->profilePic->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $employee_list->RowIndex ?>_profilePic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee" data-field="x_profilePic" name="o<?php echo $employee_list->RowIndex ?>_profilePic" id="o<?php echo $employee_list->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($employee_list->profilePic->OldValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_profilePic" class="form-group">
<div id="fd_x<?php echo $employee_list->RowIndex ?>_profilePic">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_list->profilePic->title() ?>" data-table="employee" data-field="x_profilePic" name="x<?php echo $employee_list->RowIndex ?>_profilePic" id="x<?php echo $employee_list->RowIndex ?>_profilePic" lang="<?php echo CurrentLanguageID() ?>"<?php echo $employee_list->profilePic->editAttributes() ?><?php if ($employee_list->profilePic->ReadOnly || $employee_list->profilePic->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_list->RowIndex ?>_profilePic"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fn_x<?php echo $employee_list->RowIndex ?>_profilePic" value="<?php echo $employee_list->profilePic->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fa_x<?php echo $employee_list->RowIndex ?>_profilePic" value="<?php echo (Post("fa_x<?php echo $employee_list->RowIndex ?>_profilePic") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fs_x<?php echo $employee_list->RowIndex ?>_profilePic" value="45">
<input type="hidden" name="fx_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fx_x<?php echo $employee_list->RowIndex ?>_profilePic" value="<?php echo $employee_list->profilePic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fm_x<?php echo $employee_list->RowIndex ?>_profilePic" value="<?php echo $employee_list->profilePic->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $employee_list->RowIndex ?>_profilePic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_profilePic">
<span><?php echo GetFileViewTag($employee_list->profilePic, $employee_list->profilePic->getViewValue(), FALSE) ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $employee_list->HospID->cellAttributes() ?>>
<?php if ($employee->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee" data-field="x_HospID" name="o<?php echo $employee_list->RowIndex ?>_HospID" id="o<?php echo $employee_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_list->HospID->OldValue) ?>">
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($employee->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_list->RowCount ?>_employee_HospID">
<span<?php echo $employee_list->HospID->viewAttributes() ?>><?php echo $employee_list->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_list->ListOptions->render("body", "right", $employee_list->RowCount);
?>
	</tr>
<?php if ($employee->RowType == ROWTYPE_ADD || $employee->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["femployeelist", "load"], function() {
	femployeelist.updateLists(<?php echo $employee_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$employee_list->isGridAdd())
		if (!$employee_list->Recordset->EOF)
			$employee_list->Recordset->moveNext();
}
?>
<?php
	if ($employee_list->isGridAdd() || $employee_list->isGridEdit()) {
		$employee_list->RowIndex = '$rowindex$';
		$employee_list->loadRowValues();

		// Set row properties
		$employee->resetAttributes();
		$employee->RowAttrs->merge(["data-rowindex" => $employee_list->RowIndex, "id" => "r0_employee", "data-rowtype" => ROWTYPE_ADD]);
		$employee->RowAttrs->appendClass("ew-template");
		$employee->RowType = ROWTYPE_ADD;

		// Render row
		$employee_list->renderRow();

		// Render list options
		$employee_list->renderListOptions();
		$employee_list->StartRowCount = 0;
?>
	<tr <?php echo $employee->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_list->ListOptions->render("body", "left", $employee_list->RowIndex);
?>
	<?php if ($employee_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_employee_id" class="form-group employee_id"></span>
<input type="hidden" data-table="employee" data-field="x_id" name="o<?php echo $employee_list->RowIndex ?>_id" id="o<?php echo $employee_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->empNo->Visible) { // empNo ?>
		<td data-name="empNo">
<span id="el$rowindex$_employee_empNo" class="form-group employee_empNo">
<input type="text" data-table="employee" data-field="x_empNo" name="x<?php echo $employee_list->RowIndex ?>_empNo" id="x<?php echo $employee_list->RowIndex ?>_empNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($employee_list->empNo->getPlaceHolder()) ?>" value="<?php echo $employee_list->empNo->EditValue ?>"<?php echo $employee_list->empNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee" data-field="x_empNo" name="o<?php echo $employee_list->RowIndex ?>_empNo" id="o<?php echo $employee_list->RowIndex ?>_empNo" value="<?php echo HtmlEncode($employee_list->empNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->tittle->Visible) { // tittle ?>
		<td data-name="tittle">
<span id="el$rowindex$_employee_tittle" class="form-group employee_tittle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_tittle" data-value-separator="<?php echo $employee_list->tittle->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_tittle" name="x<?php echo $employee_list->RowIndex ?>_tittle"<?php echo $employee_list->tittle->editAttributes() ?>>
			<?php echo $employee_list->tittle->selectOptionListHtml("x{$employee_list->RowIndex}_tittle") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_tittle") && !$employee_list->tittle->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_list->RowIndex ?>_tittle" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_list->tittle->caption() ?>" data-title="<?php echo $employee_list->tittle->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_list->RowIndex ?>_tittle',url:'sys_tittleaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_list->tittle->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_tittle") ?>
</span>
<input type="hidden" data-table="employee" data-field="x_tittle" name="o<?php echo $employee_list->RowIndex ?>_tittle" id="o<?php echo $employee_list->RowIndex ?>_tittle" value="<?php echo HtmlEncode($employee_list->tittle->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->first_name->Visible) { // first_name ?>
		<td data-name="first_name">
<span id="el$rowindex$_employee_first_name" class="form-group employee_first_name">
<input type="text" data-table="employee" data-field="x_first_name" name="x<?php echo $employee_list->RowIndex ?>_first_name" id="x<?php echo $employee_list->RowIndex ?>_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_list->first_name->getPlaceHolder()) ?>" value="<?php echo $employee_list->first_name->EditValue ?>"<?php echo $employee_list->first_name->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee" data-field="x_first_name" name="o<?php echo $employee_list->RowIndex ?>_first_name" id="o<?php echo $employee_list->RowIndex ?>_first_name" value="<?php echo HtmlEncode($employee_list->first_name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->middle_name->Visible) { // middle_name ?>
		<td data-name="middle_name">
<span id="el$rowindex$_employee_middle_name" class="form-group employee_middle_name">
<input type="text" data-table="employee" data-field="x_middle_name" name="x<?php echo $employee_list->RowIndex ?>_middle_name" id="x<?php echo $employee_list->RowIndex ?>_middle_name" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($employee_list->middle_name->getPlaceHolder()) ?>" value="<?php echo $employee_list->middle_name->EditValue ?>"<?php echo $employee_list->middle_name->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee" data-field="x_middle_name" name="o<?php echo $employee_list->RowIndex ?>_middle_name" id="o<?php echo $employee_list->RowIndex ?>_middle_name" value="<?php echo HtmlEncode($employee_list->middle_name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->last_name->Visible) { // last_name ?>
		<td data-name="last_name">
<span id="el$rowindex$_employee_last_name" class="form-group employee_last_name">
<input type="text" data-table="employee" data-field="x_last_name" name="x<?php echo $employee_list->RowIndex ?>_last_name" id="x<?php echo $employee_list->RowIndex ?>_last_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_list->last_name->getPlaceHolder()) ?>" value="<?php echo $employee_list->last_name->EditValue ?>"<?php echo $employee_list->last_name->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee" data-field="x_last_name" name="o<?php echo $employee_list->RowIndex ?>_last_name" id="o<?php echo $employee_list->RowIndex ?>_last_name" value="<?php echo HtmlEncode($employee_list->last_name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->gender->Visible) { // gender ?>
		<td data-name="gender">
<span id="el$rowindex$_employee_gender" class="form-group employee_gender">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_gender" data-value-separator="<?php echo $employee_list->gender->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_gender" name="x<?php echo $employee_list->RowIndex ?>_gender"<?php echo $employee_list->gender->editAttributes() ?>>
			<?php echo $employee_list->gender->selectOptionListHtml("x{$employee_list->RowIndex}_gender") ?>
		</select>
</div>
<?php echo $employee_list->gender->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_gender") ?>
</span>
<input type="hidden" data-table="employee" data-field="x_gender" name="o<?php echo $employee_list->RowIndex ?>_gender" id="o<?php echo $employee_list->RowIndex ?>_gender" value="<?php echo HtmlEncode($employee_list->gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->dob->Visible) { // dob ?>
		<td data-name="dob">
<span id="el$rowindex$_employee_dob" class="form-group employee_dob">
<input type="text" data-table="employee" data-field="x_dob" name="x<?php echo $employee_list->RowIndex ?>_dob" id="x<?php echo $employee_list->RowIndex ?>_dob" placeholder="<?php echo HtmlEncode($employee_list->dob->getPlaceHolder()) ?>" value="<?php echo $employee_list->dob->EditValue ?>"<?php echo $employee_list->dob->editAttributes() ?>>
<?php if (!$employee_list->dob->ReadOnly && !$employee_list->dob->Disabled && !isset($employee_list->dob->EditAttrs["readonly"]) && !isset($employee_list->dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "datetimepicker"], function() {
	ew.createDateTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_dob", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee" data-field="x_dob" name="o<?php echo $employee_list->RowIndex ?>_dob" id="o<?php echo $employee_list->RowIndex ?>_dob" value="<?php echo HtmlEncode($employee_list->dob->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->start_date->Visible) { // start_date ?>
		<td data-name="start_date">
<span id="el$rowindex$_employee_start_date" class="form-group employee_start_date">
<input type="text" data-table="employee" data-field="x_start_date" name="x<?php echo $employee_list->RowIndex ?>_start_date" id="x<?php echo $employee_list->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($employee_list->start_date->getPlaceHolder()) ?>" value="<?php echo $employee_list->start_date->EditValue ?>"<?php echo $employee_list->start_date->editAttributes() ?>>
<?php if (!$employee_list->start_date->ReadOnly && !$employee_list->start_date->Disabled && !isset($employee_list->start_date->EditAttrs["readonly"]) && !isset($employee_list->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "datetimepicker"], function() {
	ew.createDateTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee" data-field="x_start_date" name="o<?php echo $employee_list->RowIndex ?>_start_date" id="o<?php echo $employee_list->RowIndex ?>_start_date" value="<?php echo HtmlEncode($employee_list->start_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->end_date->Visible) { // end_date ?>
		<td data-name="end_date">
<span id="el$rowindex$_employee_end_date" class="form-group employee_end_date">
<input type="text" data-table="employee" data-field="x_end_date" name="x<?php echo $employee_list->RowIndex ?>_end_date" id="x<?php echo $employee_list->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($employee_list->end_date->getPlaceHolder()) ?>" value="<?php echo $employee_list->end_date->EditValue ?>"<?php echo $employee_list->end_date->editAttributes() ?>>
<?php if (!$employee_list->end_date->ReadOnly && !$employee_list->end_date->Disabled && !isset($employee_list->end_date->EditAttrs["readonly"]) && !isset($employee_list->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "datetimepicker"], function() {
	ew.createDateTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee" data-field="x_end_date" name="o<?php echo $employee_list->RowIndex ?>_end_date" id="o<?php echo $employee_list->RowIndex ?>_end_date" value="<?php echo HtmlEncode($employee_list->end_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->employee_role_id->Visible) { // employee_role_id ?>
		<td data-name="employee_role_id">
<span id="el$rowindex$_employee_employee_role_id" class="form-group employee_employee_role_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_employee_role_id" data-value-separator="<?php echo $employee_list->employee_role_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_employee_role_id" name="x<?php echo $employee_list->RowIndex ?>_employee_role_id"<?php echo $employee_list->employee_role_id->editAttributes() ?>>
			<?php echo $employee_list->employee_role_id->selectOptionListHtml("x{$employee_list->RowIndex}_employee_role_id") ?>
		</select>
</div>
<?php echo $employee_list->employee_role_id->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_employee_role_id") ?>
</span>
<input type="hidden" data-table="employee" data-field="x_employee_role_id" name="o<?php echo $employee_list->RowIndex ?>_employee_role_id" id="o<?php echo $employee_list->RowIndex ?>_employee_role_id" value="<?php echo HtmlEncode($employee_list->employee_role_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->default_shift_start->Visible) { // default_shift_start ?>
		<td data-name="default_shift_start">
<span id="el$rowindex$_employee_default_shift_start" class="form-group employee_default_shift_start">
<input type="text" data-table="employee" data-field="x_default_shift_start" name="x<?php echo $employee_list->RowIndex ?>_default_shift_start" id="x<?php echo $employee_list->RowIndex ?>_default_shift_start" placeholder="<?php echo HtmlEncode($employee_list->default_shift_start->getPlaceHolder()) ?>" value="<?php echo $employee_list->default_shift_start->EditValue ?>"<?php echo $employee_list->default_shift_start->editAttributes() ?>>
<?php if (!$employee_list->default_shift_start->ReadOnly && !$employee_list->default_shift_start->Disabled && !isset($employee_list->default_shift_start->EditAttrs["readonly"]) && !isset($employee_list->default_shift_start->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "timepicker"], function() {
	ew.createTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_default_shift_start", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee" data-field="x_default_shift_start" name="o<?php echo $employee_list->RowIndex ?>_default_shift_start" id="o<?php echo $employee_list->RowIndex ?>_default_shift_start" value="<?php echo HtmlEncode($employee_list->default_shift_start->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->default_shift_end->Visible) { // default_shift_end ?>
		<td data-name="default_shift_end">
<span id="el$rowindex$_employee_default_shift_end" class="form-group employee_default_shift_end">
<input type="text" data-table="employee" data-field="x_default_shift_end" name="x<?php echo $employee_list->RowIndex ?>_default_shift_end" id="x<?php echo $employee_list->RowIndex ?>_default_shift_end" placeholder="<?php echo HtmlEncode($employee_list->default_shift_end->getPlaceHolder()) ?>" value="<?php echo $employee_list->default_shift_end->EditValue ?>"<?php echo $employee_list->default_shift_end->editAttributes() ?>>
<?php if (!$employee_list->default_shift_end->ReadOnly && !$employee_list->default_shift_end->Disabled && !isset($employee_list->default_shift_end->EditAttrs["readonly"]) && !isset($employee_list->default_shift_end->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeelist", "timepicker"], function() {
	ew.createTimePicker("femployeelist", "x<?php echo $employee_list->RowIndex ?>_default_shift_end", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee" data-field="x_default_shift_end" name="o<?php echo $employee_list->RowIndex ?>_default_shift_end" id="o<?php echo $employee_list->RowIndex ?>_default_shift_end" value="<?php echo HtmlEncode($employee_list->default_shift_end->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->working_days->Visible) { // working_days ?>
		<td data-name="working_days">
<span id="el$rowindex$_employee_working_days" class="form-group employee_working_days">
<input type="text" data-table="employee" data-field="x_working_days" name="x<?php echo $employee_list->RowIndex ?>_working_days" id="x<?php echo $employee_list->RowIndex ?>_working_days" size="30" maxlength="7" placeholder="<?php echo HtmlEncode($employee_list->working_days->getPlaceHolder()) ?>" value="<?php echo $employee_list->working_days->EditValue ?>"<?php echo $employee_list->working_days->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee" data-field="x_working_days" name="o<?php echo $employee_list->RowIndex ?>_working_days" id="o<?php echo $employee_list->RowIndex ?>_working_days" value="<?php echo HtmlEncode($employee_list->working_days->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->working_location->Visible) { // working_location ?>
		<td data-name="working_location">
<span id="el$rowindex$_employee_working_location" class="form-group employee_working_location">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_working_location" data-value-separator="<?php echo $employee_list->working_location->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_working_location" name="x<?php echo $employee_list->RowIndex ?>_working_location"<?php echo $employee_list->working_location->editAttributes() ?>>
			<?php echo $employee_list->working_location->selectOptionListHtml("x{$employee_list->RowIndex}_working_location") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "hospital") && !$employee_list->working_location->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_list->RowIndex ?>_working_location" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_list->working_location->caption() ?>" data-title="<?php echo $employee_list->working_location->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_list->RowIndex ?>_working_location',url:'hospitaladdopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_list->working_location->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_working_location") ?>
</span>
<input type="hidden" data-table="employee" data-field="x_working_location" name="o<?php echo $employee_list->RowIndex ?>_working_location" id="o<?php echo $employee_list->RowIndex ?>_working_location" value="<?php echo HtmlEncode($employee_list->working_location->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->status->Visible) { // status ?>
		<td data-name="status">
<span id="el$rowindex$_employee_status" class="form-group employee_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_status" data-value-separator="<?php echo $employee_list->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_list->RowIndex ?>_status" name="x<?php echo $employee_list->RowIndex ?>_status"<?php echo $employee_list->status->editAttributes() ?>>
			<?php echo $employee_list->status->selectOptionListHtml("x{$employee_list->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_list->status->Lookup->getParamTag($employee_list, "p_x" . $employee_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee" data-field="x_status" name="o<?php echo $employee_list->RowIndex ?>_status" id="o<?php echo $employee_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_list->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic">
<span id="el$rowindex$_employee_profilePic" class="form-group employee_profilePic">
<div id="fd_x<?php echo $employee_list->RowIndex ?>_profilePic">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_list->profilePic->title() ?>" data-table="employee" data-field="x_profilePic" name="x<?php echo $employee_list->RowIndex ?>_profilePic" id="x<?php echo $employee_list->RowIndex ?>_profilePic" lang="<?php echo CurrentLanguageID() ?>"<?php echo $employee_list->profilePic->editAttributes() ?><?php if ($employee_list->profilePic->ReadOnly || $employee_list->profilePic->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_list->RowIndex ?>_profilePic"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fn_x<?php echo $employee_list->RowIndex ?>_profilePic" value="<?php echo $employee_list->profilePic->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fa_x<?php echo $employee_list->RowIndex ?>_profilePic" value="0">
<input type="hidden" name="fs_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fs_x<?php echo $employee_list->RowIndex ?>_profilePic" value="45">
<input type="hidden" name="fx_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fx_x<?php echo $employee_list->RowIndex ?>_profilePic" value="<?php echo $employee_list->profilePic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_list->RowIndex ?>_profilePic" id= "fm_x<?php echo $employee_list->RowIndex ?>_profilePic" value="<?php echo $employee_list->profilePic->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $employee_list->RowIndex ?>_profilePic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee" data-field="x_profilePic" name="o<?php echo $employee_list->RowIndex ?>_profilePic" id="o<?php echo $employee_list->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($employee_list->profilePic->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="employee" data-field="x_HospID" name="o<?php echo $employee_list->RowIndex ?>_HospID" id="o<?php echo $employee_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_list->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_list->ListOptions->render("body", "right", $employee_list->RowIndex);
?>
<script>
loadjs.ready(["femployeelist", "load"], function() {
	femployeelist.updateLists(<?php echo $employee_list->RowIndex ?>);
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
<?php if ($employee_list->isAdd() || $employee_list->isCopy()) { ?>
<input type="hidden" name="<?php echo $employee_list->FormKeyCountName ?>" id="<?php echo $employee_list->FormKeyCountName ?>" value="<?php echo $employee_list->KeyCount ?>">
<?php } ?>
<?php if ($employee_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $employee_list->FormKeyCountName ?>" id="<?php echo $employee_list->FormKeyCountName ?>" value="<?php echo $employee_list->KeyCount ?>">
<?php echo $employee_list->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $employee_list->FormKeyCountName ?>" id="<?php echo $employee_list->FormKeyCountName ?>" value="<?php echo $employee_list->KeyCount ?>">
<?php } ?>
<?php if ($employee_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $employee_list->FormKeyCountName ?>" id="<?php echo $employee_list->FormKeyCountName ?>" value="<?php echo $employee_list->KeyCount ?>">
<?php echo $employee_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$employee->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_list->Recordset)
	$employee_list->Recordset->Close();
?>
<?php if (!$employee_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $employee_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_list->TotalRecords == 0 && !$employee->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$employee_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$employee->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_employee",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$employee_list->terminate();
?>