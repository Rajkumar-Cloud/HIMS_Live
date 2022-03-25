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
$employee_has_experience_list = new employee_has_experience_list();

// Run the page
$employee_has_experience_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_has_experience_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$employee_has_experience_list->isExport()) { ?>
<script>
var femployee_has_experiencelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	femployee_has_experiencelist = currentForm = new ew.Form("femployee_has_experiencelist", "list");
	femployee_has_experiencelist.formKeyCountName = '<?php echo $employee_has_experience_list->FormKeyCountName ?>';

	// Validate form
	femployee_has_experiencelist.validate = function() {
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
			<?php if ($employee_has_experience_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_list->id->caption(), $employee_has_experience_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_experience_list->employee_id->Required) { ?>
				elm = this.getElements("x" + infix + "_employee_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_list->employee_id->caption(), $employee_has_experience_list->employee_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_employee_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_has_experience_list->employee_id->errorMessage()) ?>");
			<?php if ($employee_has_experience_list->working_at->Required) { ?>
				elm = this.getElements("x" + infix + "_working_at");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_list->working_at->caption(), $employee_has_experience_list->working_at->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_experience_list->job_description->Required) { ?>
				elm = this.getElements("x" + infix + "_job_description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_list->job_description->caption(), $employee_has_experience_list->job_description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_experience_list->role->Required) { ?>
				elm = this.getElements("x" + infix + "_role");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_list->role->caption(), $employee_has_experience_list->role->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_experience_list->start_date->Required) { ?>
				elm = this.getElements("x" + infix + "_start_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_list->start_date->caption(), $employee_has_experience_list->start_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_start_date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_has_experience_list->start_date->errorMessage()) ?>");
			<?php if ($employee_has_experience_list->end_date->Required) { ?>
				elm = this.getElements("x" + infix + "_end_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_list->end_date->caption(), $employee_has_experience_list->end_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_end_date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_has_experience_list->end_date->errorMessage()) ?>");
			<?php if ($employee_has_experience_list->total_experience->Required) { ?>
				elm = this.getElements("x" + infix + "_total_experience");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_list->total_experience->caption(), $employee_has_experience_list->total_experience->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_experience_list->certificates->Required) { ?>
				felm = this.getElements("x" + infix + "_certificates");
				elm = this.getElements("fn_x" + infix + "_certificates");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_list->certificates->caption(), $employee_has_experience_list->certificates->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_experience_list->others->Required) { ?>
				felm = this.getElements("x" + infix + "_others");
				elm = this.getElements("fn_x" + infix + "_others");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_list->others->caption(), $employee_has_experience_list->others->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_experience_list->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience_list->status->caption(), $employee_has_experience_list->status->RequiredErrorMessage)) ?>");
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
	femployee_has_experiencelist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "employee_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "working_at", false)) return false;
		if (ew.valueChanged(fobj, infix, "job_description", false)) return false;
		if (ew.valueChanged(fobj, infix, "role", false)) return false;
		if (ew.valueChanged(fobj, infix, "start_date", false)) return false;
		if (ew.valueChanged(fobj, infix, "end_date", false)) return false;
		if (ew.valueChanged(fobj, infix, "total_experience", false)) return false;
		if (ew.valueChanged(fobj, infix, "certificates", false)) return false;
		if (ew.valueChanged(fobj, infix, "others", false)) return false;
		if (ew.valueChanged(fobj, infix, "status", false)) return false;
		return true;
	}

	// Form_CustomValidate
	femployee_has_experiencelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	femployee_has_experiencelist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	femployee_has_experiencelist.lists["x_status"] = <?php echo $employee_has_experience_list->status->Lookup->toClientList($employee_has_experience_list) ?>;
	femployee_has_experiencelist.lists["x_status"].options = <?php echo JsonEncode($employee_has_experience_list->status->lookupOptions()) ?>;
	loadjs.done("femployee_has_experiencelist");
});
var femployee_has_experiencelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	femployee_has_experiencelistsrch = currentSearchForm = new ew.Form("femployee_has_experiencelistsrch");

	// Dynamic selection lists
	// Filters

	femployee_has_experiencelistsrch.filterList = <?php echo $employee_has_experience_list->getFilterList() ?>;
	loadjs.done("femployee_has_experiencelistsrch");
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
<?php if (!$employee_has_experience_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_has_experience_list->TotalRecords > 0 && $employee_has_experience_list->ExportOptions->visible()) { ?>
<?php $employee_has_experience_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_has_experience_list->ImportOptions->visible()) { ?>
<?php $employee_has_experience_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_has_experience_list->SearchOptions->visible()) { ?>
<?php $employee_has_experience_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_has_experience_list->FilterOptions->visible()) { ?>
<?php $employee_has_experience_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$employee_has_experience_list->isExport() || Config("EXPORT_MASTER_RECORD") && $employee_has_experience_list->isExport("print")) { ?>
<?php
if ($employee_has_experience_list->DbMasterFilter != "" && $employee_has_experience->getCurrentMasterTable() == "employee") {
	if ($employee_has_experience_list->MasterRecordExists) {
		include_once "employeemaster.php";
	}
}
?>
<?php } ?>
<?php
$employee_has_experience_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_has_experience_list->isExport() && !$employee_has_experience->CurrentAction) { ?>
<form name="femployee_has_experiencelistsrch" id="femployee_has_experiencelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="femployee_has_experiencelistsrch-search-panel" class="<?php echo $employee_has_experience_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_has_experience">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $employee_has_experience_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($employee_has_experience_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($employee_has_experience_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_has_experience_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_has_experience_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_has_experience_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_has_experience_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_has_experience_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $employee_has_experience_list->showPageHeader(); ?>
<?php
$employee_has_experience_list->showMessage();
?>
<?php if ($employee_has_experience_list->TotalRecords > 0 || $employee_has_experience->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_has_experience_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_has_experience">
<?php if (!$employee_has_experience_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_has_experience_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $employee_has_experience_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_has_experience_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_has_experiencelist" id="femployee_has_experiencelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_has_experience">
<?php if ($employee_has_experience->getCurrentMasterTable() == "employee" && $employee_has_experience->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($employee_has_experience_list->employee_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_employee_has_experience" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($employee_has_experience_list->TotalRecords > 0 || $employee_has_experience_list->isGridEdit()) { ?>
<table id="tbl_employee_has_experiencelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_has_experience->RowType = ROWTYPE_HEADER;

// Render list options
$employee_has_experience_list->renderListOptions();

// Render list options (header, left)
$employee_has_experience_list->ListOptions->render("header", "left");
?>
<?php if ($employee_has_experience_list->id->Visible) { // id ?>
	<?php if ($employee_has_experience_list->SortUrl($employee_has_experience_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_has_experience_list->id->headerCellClass() ?>"><div id="elh_employee_has_experience_id" class="employee_has_experience_id"><div class="ew-table-header-caption"><?php echo $employee_has_experience_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_has_experience_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_experience_list->SortUrl($employee_has_experience_list->id) ?>', 1);"><div id="elh_employee_has_experience_id" class="employee_has_experience_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_list->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_has_experience_list->SortUrl($employee_has_experience_list->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employee_has_experience_list->employee_id->headerCellClass() ?>"><div id="elh_employee_has_experience_employee_id" class="employee_has_experience_employee_id"><div class="ew-table-header-caption"><?php echo $employee_has_experience_list->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employee_has_experience_list->employee_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_experience_list->SortUrl($employee_has_experience_list->employee_id) ?>', 1);"><div id="elh_employee_has_experience_employee_id" class="employee_has_experience_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_list->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_list->employee_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_list->employee_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_list->working_at->Visible) { // working_at ?>
	<?php if ($employee_has_experience_list->SortUrl($employee_has_experience_list->working_at) == "") { ?>
		<th data-name="working_at" class="<?php echo $employee_has_experience_list->working_at->headerCellClass() ?>"><div id="elh_employee_has_experience_working_at" class="employee_has_experience_working_at"><div class="ew-table-header-caption"><?php echo $employee_has_experience_list->working_at->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="working_at" class="<?php echo $employee_has_experience_list->working_at->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_experience_list->SortUrl($employee_has_experience_list->working_at) ?>', 1);"><div id="elh_employee_has_experience_working_at" class="employee_has_experience_working_at">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_list->working_at->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_list->working_at->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_list->working_at->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_list->job_description->Visible) { // job description ?>
	<?php if ($employee_has_experience_list->SortUrl($employee_has_experience_list->job_description) == "") { ?>
		<th data-name="job_description" class="<?php echo $employee_has_experience_list->job_description->headerCellClass() ?>"><div id="elh_employee_has_experience_job_description" class="employee_has_experience_job_description"><div class="ew-table-header-caption"><?php echo $employee_has_experience_list->job_description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="job_description" class="<?php echo $employee_has_experience_list->job_description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_experience_list->SortUrl($employee_has_experience_list->job_description) ?>', 1);"><div id="elh_employee_has_experience_job_description" class="employee_has_experience_job_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_list->job_description->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_list->job_description->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_list->job_description->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_list->role->Visible) { // role ?>
	<?php if ($employee_has_experience_list->SortUrl($employee_has_experience_list->role) == "") { ?>
		<th data-name="role" class="<?php echo $employee_has_experience_list->role->headerCellClass() ?>"><div id="elh_employee_has_experience_role" class="employee_has_experience_role"><div class="ew-table-header-caption"><?php echo $employee_has_experience_list->role->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="role" class="<?php echo $employee_has_experience_list->role->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_experience_list->SortUrl($employee_has_experience_list->role) ?>', 1);"><div id="elh_employee_has_experience_role" class="employee_has_experience_role">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_list->role->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_list->role->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_list->role->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_list->start_date->Visible) { // start_date ?>
	<?php if ($employee_has_experience_list->SortUrl($employee_has_experience_list->start_date) == "") { ?>
		<th data-name="start_date" class="<?php echo $employee_has_experience_list->start_date->headerCellClass() ?>"><div id="elh_employee_has_experience_start_date" class="employee_has_experience_start_date"><div class="ew-table-header-caption"><?php echo $employee_has_experience_list->start_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_date" class="<?php echo $employee_has_experience_list->start_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_experience_list->SortUrl($employee_has_experience_list->start_date) ?>', 1);"><div id="elh_employee_has_experience_start_date" class="employee_has_experience_start_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_list->start_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_list->start_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_list->start_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_list->end_date->Visible) { // end_date ?>
	<?php if ($employee_has_experience_list->SortUrl($employee_has_experience_list->end_date) == "") { ?>
		<th data-name="end_date" class="<?php echo $employee_has_experience_list->end_date->headerCellClass() ?>"><div id="elh_employee_has_experience_end_date" class="employee_has_experience_end_date"><div class="ew-table-header-caption"><?php echo $employee_has_experience_list->end_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="end_date" class="<?php echo $employee_has_experience_list->end_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_experience_list->SortUrl($employee_has_experience_list->end_date) ?>', 1);"><div id="elh_employee_has_experience_end_date" class="employee_has_experience_end_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_list->end_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_list->end_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_list->end_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_list->total_experience->Visible) { // total_experience ?>
	<?php if ($employee_has_experience_list->SortUrl($employee_has_experience_list->total_experience) == "") { ?>
		<th data-name="total_experience" class="<?php echo $employee_has_experience_list->total_experience->headerCellClass() ?>"><div id="elh_employee_has_experience_total_experience" class="employee_has_experience_total_experience"><div class="ew-table-header-caption"><?php echo $employee_has_experience_list->total_experience->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total_experience" class="<?php echo $employee_has_experience_list->total_experience->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_experience_list->SortUrl($employee_has_experience_list->total_experience) ?>', 1);"><div id="elh_employee_has_experience_total_experience" class="employee_has_experience_total_experience">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_list->total_experience->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_list->total_experience->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_list->total_experience->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_list->certificates->Visible) { // certificates ?>
	<?php if ($employee_has_experience_list->SortUrl($employee_has_experience_list->certificates) == "") { ?>
		<th data-name="certificates" class="<?php echo $employee_has_experience_list->certificates->headerCellClass() ?>"><div id="elh_employee_has_experience_certificates" class="employee_has_experience_certificates"><div class="ew-table-header-caption"><?php echo $employee_has_experience_list->certificates->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="certificates" class="<?php echo $employee_has_experience_list->certificates->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_experience_list->SortUrl($employee_has_experience_list->certificates) ?>', 1);"><div id="elh_employee_has_experience_certificates" class="employee_has_experience_certificates">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_list->certificates->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_list->certificates->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_list->certificates->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_list->others->Visible) { // others ?>
	<?php if ($employee_has_experience_list->SortUrl($employee_has_experience_list->others) == "") { ?>
		<th data-name="others" class="<?php echo $employee_has_experience_list->others->headerCellClass() ?>"><div id="elh_employee_has_experience_others" class="employee_has_experience_others"><div class="ew-table-header-caption"><?php echo $employee_has_experience_list->others->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="others" class="<?php echo $employee_has_experience_list->others->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_experience_list->SortUrl($employee_has_experience_list->others) ?>', 1);"><div id="elh_employee_has_experience_others" class="employee_has_experience_others">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_list->others->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_list->others->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_list->others->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience_list->status->Visible) { // status ?>
	<?php if ($employee_has_experience_list->SortUrl($employee_has_experience_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_has_experience_list->status->headerCellClass() ?>"><div id="elh_employee_has_experience_status" class="employee_has_experience_status"><div class="ew-table-header-caption"><?php echo $employee_has_experience_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_has_experience_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_has_experience_list->SortUrl($employee_has_experience_list->status) ?>', 1);"><div id="elh_employee_has_experience_status" class="employee_has_experience_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_experience_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_has_experience_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_has_experience_list->ExportAll && $employee_has_experience_list->isExport()) {
	$employee_has_experience_list->StopRecord = $employee_has_experience_list->TotalRecords;
} else {

	// Set the last record to display
	if ($employee_has_experience_list->TotalRecords > $employee_has_experience_list->StartRecord + $employee_has_experience_list->DisplayRecords - 1)
		$employee_has_experience_list->StopRecord = $employee_has_experience_list->StartRecord + $employee_has_experience_list->DisplayRecords - 1;
	else
		$employee_has_experience_list->StopRecord = $employee_has_experience_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($employee_has_experience->isConfirm() || $employee_has_experience_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($employee_has_experience_list->FormKeyCountName) && ($employee_has_experience_list->isGridAdd() || $employee_has_experience_list->isGridEdit() || $employee_has_experience->isConfirm())) {
		$employee_has_experience_list->KeyCount = $CurrentForm->getValue($employee_has_experience_list->FormKeyCountName);
		$employee_has_experience_list->StopRecord = $employee_has_experience_list->StartRecord + $employee_has_experience_list->KeyCount - 1;
	}
}
$employee_has_experience_list->RecordCount = $employee_has_experience_list->StartRecord - 1;
if ($employee_has_experience_list->Recordset && !$employee_has_experience_list->Recordset->EOF) {
	$employee_has_experience_list->Recordset->moveFirst();
	$selectLimit = $employee_has_experience_list->UseSelectLimit;
	if (!$selectLimit && $employee_has_experience_list->StartRecord > 1)
		$employee_has_experience_list->Recordset->move($employee_has_experience_list->StartRecord - 1);
} elseif (!$employee_has_experience->AllowAddDeleteRow && $employee_has_experience_list->StopRecord == 0) {
	$employee_has_experience_list->StopRecord = $employee_has_experience->GridAddRowCount;
}

// Initialize aggregate
$employee_has_experience->RowType = ROWTYPE_AGGREGATEINIT;
$employee_has_experience->resetAttributes();
$employee_has_experience_list->renderRow();
if ($employee_has_experience_list->isGridAdd())
	$employee_has_experience_list->RowIndex = 0;
if ($employee_has_experience_list->isGridEdit())
	$employee_has_experience_list->RowIndex = 0;
while ($employee_has_experience_list->RecordCount < $employee_has_experience_list->StopRecord) {
	$employee_has_experience_list->RecordCount++;
	if ($employee_has_experience_list->RecordCount >= $employee_has_experience_list->StartRecord) {
		$employee_has_experience_list->RowCount++;
		if ($employee_has_experience_list->isGridAdd() || $employee_has_experience_list->isGridEdit() || $employee_has_experience->isConfirm()) {
			$employee_has_experience_list->RowIndex++;
			$CurrentForm->Index = $employee_has_experience_list->RowIndex;
			if ($CurrentForm->hasValue($employee_has_experience_list->FormActionName) && ($employee_has_experience->isConfirm() || $employee_has_experience_list->EventCancelled))
				$employee_has_experience_list->RowAction = strval($CurrentForm->getValue($employee_has_experience_list->FormActionName));
			elseif ($employee_has_experience_list->isGridAdd())
				$employee_has_experience_list->RowAction = "insert";
			else
				$employee_has_experience_list->RowAction = "";
		}

		// Set up key count
		$employee_has_experience_list->KeyCount = $employee_has_experience_list->RowIndex;

		// Init row class and style
		$employee_has_experience->resetAttributes();
		$employee_has_experience->CssClass = "";
		if ($employee_has_experience_list->isGridAdd()) {
			$employee_has_experience_list->loadRowValues(); // Load default values
		} else {
			$employee_has_experience_list->loadRowValues($employee_has_experience_list->Recordset); // Load row values
		}
		$employee_has_experience->RowType = ROWTYPE_VIEW; // Render view
		if ($employee_has_experience_list->isGridAdd()) // Grid add
			$employee_has_experience->RowType = ROWTYPE_ADD; // Render add
		if ($employee_has_experience_list->isGridAdd() && $employee_has_experience->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$employee_has_experience_list->restoreCurrentRowFormValues($employee_has_experience_list->RowIndex); // Restore form values
		if ($employee_has_experience_list->isGridEdit()) { // Grid edit
			if ($employee_has_experience->EventCancelled)
				$employee_has_experience_list->restoreCurrentRowFormValues($employee_has_experience_list->RowIndex); // Restore form values
			if ($employee_has_experience_list->RowAction == "insert")
				$employee_has_experience->RowType = ROWTYPE_ADD; // Render add
			else
				$employee_has_experience->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($employee_has_experience_list->isGridEdit() && ($employee_has_experience->RowType == ROWTYPE_EDIT || $employee_has_experience->RowType == ROWTYPE_ADD) && $employee_has_experience->EventCancelled) // Update failed
			$employee_has_experience_list->restoreCurrentRowFormValues($employee_has_experience_list->RowIndex); // Restore form values
		if ($employee_has_experience->RowType == ROWTYPE_EDIT) // Edit row
			$employee_has_experience_list->EditRowCount++;

		// Set up row id / data-rowindex
		$employee_has_experience->RowAttrs->merge(["data-rowindex" => $employee_has_experience_list->RowCount, "id" => "r" . $employee_has_experience_list->RowCount . "_employee_has_experience", "data-rowtype" => $employee_has_experience->RowType]);

		// Render row
		$employee_has_experience_list->renderRow();

		// Render list options
		$employee_has_experience_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($employee_has_experience_list->RowAction != "delete" && $employee_has_experience_list->RowAction != "insertdelete" && !($employee_has_experience_list->RowAction == "insert" && $employee_has_experience->isConfirm() && $employee_has_experience_list->emptyRow())) {
?>
	<tr <?php echo $employee_has_experience->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_has_experience_list->ListOptions->render("body", "left", $employee_has_experience_list->RowCount);
?>
	<?php if ($employee_has_experience_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $employee_has_experience_list->id->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_id" class="form-group"></span>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" name="o<?php echo $employee_has_experience_list->RowIndex ?>_id" id="o<?php echo $employee_has_experience_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_experience_list->id->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_id" class="form-group">
<span<?php echo $employee_has_experience_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_experience_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" name="x<?php echo $employee_has_experience_list->RowIndex ?>_id" id="x<?php echo $employee_has_experience_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_experience_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_id">
<span<?php echo $employee_has_experience_list->id->viewAttributes() ?>><?php echo $employee_has_experience_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id" <?php echo $employee_has_experience_list->employee_id->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($employee_has_experience_list->employee_id->getSessionValue() != "") { ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_employee_id" class="form-group">
<span<?php echo $employee_has_experience_list->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_experience_list->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" name="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience_list->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_employee_id" class="form-group">
<input type="text" data-table="employee_has_experience" data-field="x_employee_id" name="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" id="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_experience_list->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->employee_id->EditValue ?>"<?php echo $employee_has_experience_list->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_employee_id" name="o<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" id="o<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience_list->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($employee_has_experience_list->employee_id->getSessionValue() != "") { ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_employee_id" class="form-group">
<span<?php echo $employee_has_experience_list->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_experience_list->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" name="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience_list->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_employee_id" class="form-group">
<input type="text" data-table="employee_has_experience" data-field="x_employee_id" name="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" id="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_experience_list->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->employee_id->EditValue ?>"<?php echo $employee_has_experience_list->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_employee_id">
<span<?php echo $employee_has_experience_list->employee_id->viewAttributes() ?>><?php echo $employee_has_experience_list->employee_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->working_at->Visible) { // working_at ?>
		<td data-name="working_at" <?php echo $employee_has_experience_list->working_at->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_working_at" class="form-group">
<input type="text" data-table="employee_has_experience" data-field="x_working_at" name="x<?php echo $employee_has_experience_list->RowIndex ?>_working_at" id="x<?php echo $employee_has_experience_list->RowIndex ?>_working_at" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience_list->working_at->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->working_at->EditValue ?>"<?php echo $employee_has_experience_list->working_at->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_working_at" name="o<?php echo $employee_has_experience_list->RowIndex ?>_working_at" id="o<?php echo $employee_has_experience_list->RowIndex ?>_working_at" value="<?php echo HtmlEncode($employee_has_experience_list->working_at->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_working_at" class="form-group">
<input type="text" data-table="employee_has_experience" data-field="x_working_at" name="x<?php echo $employee_has_experience_list->RowIndex ?>_working_at" id="x<?php echo $employee_has_experience_list->RowIndex ?>_working_at" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience_list->working_at->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->working_at->EditValue ?>"<?php echo $employee_has_experience_list->working_at->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_working_at">
<span<?php echo $employee_has_experience_list->working_at->viewAttributes() ?>><?php echo $employee_has_experience_list->working_at->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->job_description->Visible) { // job description ?>
		<td data-name="job_description" <?php echo $employee_has_experience_list->job_description->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_job_description" class="form-group">
<input type="text" data-table="employee_has_experience" data-field="x_job_description" name="x<?php echo $employee_has_experience_list->RowIndex ?>_job_description" id="x<?php echo $employee_has_experience_list->RowIndex ?>_job_description" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience_list->job_description->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->job_description->EditValue ?>"<?php echo $employee_has_experience_list->job_description->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_job_description" name="o<?php echo $employee_has_experience_list->RowIndex ?>_job_description" id="o<?php echo $employee_has_experience_list->RowIndex ?>_job_description" value="<?php echo HtmlEncode($employee_has_experience_list->job_description->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_job_description" class="form-group">
<input type="text" data-table="employee_has_experience" data-field="x_job_description" name="x<?php echo $employee_has_experience_list->RowIndex ?>_job_description" id="x<?php echo $employee_has_experience_list->RowIndex ?>_job_description" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience_list->job_description->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->job_description->EditValue ?>"<?php echo $employee_has_experience_list->job_description->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_job_description">
<span<?php echo $employee_has_experience_list->job_description->viewAttributes() ?>><?php echo $employee_has_experience_list->job_description->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->role->Visible) { // role ?>
		<td data-name="role" <?php echo $employee_has_experience_list->role->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_role" class="form-group">
<input type="text" data-table="employee_has_experience" data-field="x_role" name="x<?php echo $employee_has_experience_list->RowIndex ?>_role" id="x<?php echo $employee_has_experience_list->RowIndex ?>_role" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience_list->role->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->role->EditValue ?>"<?php echo $employee_has_experience_list->role->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_role" name="o<?php echo $employee_has_experience_list->RowIndex ?>_role" id="o<?php echo $employee_has_experience_list->RowIndex ?>_role" value="<?php echo HtmlEncode($employee_has_experience_list->role->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_role" class="form-group">
<input type="text" data-table="employee_has_experience" data-field="x_role" name="x<?php echo $employee_has_experience_list->RowIndex ?>_role" id="x<?php echo $employee_has_experience_list->RowIndex ?>_role" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience_list->role->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->role->EditValue ?>"<?php echo $employee_has_experience_list->role->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_role">
<span<?php echo $employee_has_experience_list->role->viewAttributes() ?>><?php echo $employee_has_experience_list->role->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->start_date->Visible) { // start_date ?>
		<td data-name="start_date" <?php echo $employee_has_experience_list->start_date->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_start_date" class="form-group">
<input type="text" data-table="employee_has_experience" data-field="x_start_date" name="x<?php echo $employee_has_experience_list->RowIndex ?>_start_date" id="x<?php echo $employee_has_experience_list->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($employee_has_experience_list->start_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->start_date->EditValue ?>"<?php echo $employee_has_experience_list->start_date->editAttributes() ?>>
<?php if (!$employee_has_experience_list->start_date->ReadOnly && !$employee_has_experience_list->start_date->Disabled && !isset($employee_has_experience_list->start_date->EditAttrs["readonly"]) && !isset($employee_has_experience_list->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experiencelist", "datetimepicker"], function() {
	ew.createDateTimePicker("femployee_has_experiencelist", "x<?php echo $employee_has_experience_list->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_start_date" name="o<?php echo $employee_has_experience_list->RowIndex ?>_start_date" id="o<?php echo $employee_has_experience_list->RowIndex ?>_start_date" value="<?php echo HtmlEncode($employee_has_experience_list->start_date->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_start_date" class="form-group">
<input type="text" data-table="employee_has_experience" data-field="x_start_date" name="x<?php echo $employee_has_experience_list->RowIndex ?>_start_date" id="x<?php echo $employee_has_experience_list->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($employee_has_experience_list->start_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->start_date->EditValue ?>"<?php echo $employee_has_experience_list->start_date->editAttributes() ?>>
<?php if (!$employee_has_experience_list->start_date->ReadOnly && !$employee_has_experience_list->start_date->Disabled && !isset($employee_has_experience_list->start_date->EditAttrs["readonly"]) && !isset($employee_has_experience_list->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experiencelist", "datetimepicker"], function() {
	ew.createDateTimePicker("femployee_has_experiencelist", "x<?php echo $employee_has_experience_list->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_start_date">
<span<?php echo $employee_has_experience_list->start_date->viewAttributes() ?>><?php echo $employee_has_experience_list->start_date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->end_date->Visible) { // end_date ?>
		<td data-name="end_date" <?php echo $employee_has_experience_list->end_date->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_end_date" class="form-group">
<input type="text" data-table="employee_has_experience" data-field="x_end_date" name="x<?php echo $employee_has_experience_list->RowIndex ?>_end_date" id="x<?php echo $employee_has_experience_list->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($employee_has_experience_list->end_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->end_date->EditValue ?>"<?php echo $employee_has_experience_list->end_date->editAttributes() ?>>
<?php if (!$employee_has_experience_list->end_date->ReadOnly && !$employee_has_experience_list->end_date->Disabled && !isset($employee_has_experience_list->end_date->EditAttrs["readonly"]) && !isset($employee_has_experience_list->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experiencelist", "datetimepicker"], function() {
	ew.createDateTimePicker("femployee_has_experiencelist", "x<?php echo $employee_has_experience_list->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_end_date" name="o<?php echo $employee_has_experience_list->RowIndex ?>_end_date" id="o<?php echo $employee_has_experience_list->RowIndex ?>_end_date" value="<?php echo HtmlEncode($employee_has_experience_list->end_date->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_end_date" class="form-group">
<input type="text" data-table="employee_has_experience" data-field="x_end_date" name="x<?php echo $employee_has_experience_list->RowIndex ?>_end_date" id="x<?php echo $employee_has_experience_list->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($employee_has_experience_list->end_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->end_date->EditValue ?>"<?php echo $employee_has_experience_list->end_date->editAttributes() ?>>
<?php if (!$employee_has_experience_list->end_date->ReadOnly && !$employee_has_experience_list->end_date->Disabled && !isset($employee_has_experience_list->end_date->EditAttrs["readonly"]) && !isset($employee_has_experience_list->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experiencelist", "datetimepicker"], function() {
	ew.createDateTimePicker("femployee_has_experiencelist", "x<?php echo $employee_has_experience_list->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_end_date">
<span<?php echo $employee_has_experience_list->end_date->viewAttributes() ?>><?php echo $employee_has_experience_list->end_date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->total_experience->Visible) { // total_experience ?>
		<td data-name="total_experience" <?php echo $employee_has_experience_list->total_experience->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_total_experience" class="form-group">
<input type="text" data-table="employee_has_experience" data-field="x_total_experience" name="x<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" id="x<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience_list->total_experience->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->total_experience->EditValue ?>"<?php echo $employee_has_experience_list->total_experience->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_total_experience" name="o<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" id="o<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" value="<?php echo HtmlEncode($employee_has_experience_list->total_experience->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_total_experience" class="form-group">
<input type="text" data-table="employee_has_experience" data-field="x_total_experience" name="x<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" id="x<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience_list->total_experience->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->total_experience->EditValue ?>"<?php echo $employee_has_experience_list->total_experience->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_total_experience">
<span<?php echo $employee_has_experience_list->total_experience->viewAttributes() ?>><?php echo $employee_has_experience_list->total_experience->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->certificates->Visible) { // certificates ?>
		<td data-name="certificates" <?php echo $employee_has_experience_list->certificates->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_certificates" class="form-group">
<div id="fd_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_experience_list->certificates->title() ?>" data-table="employee_has_experience" data-field="x_certificates" name="x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id="x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_experience_list->certificates->editAttributes() ?><?php if ($employee_has_experience_list->certificates->ReadOnly || $employee_has_experience_list->certificates->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_has_experience_list->RowIndex ?>_certificates"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fn_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience_list->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fs_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fx_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience_list->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fm_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience_list->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fc_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience_list->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_certificates" name="o<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id="o<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo HtmlEncode($employee_has_experience_list->certificates->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_certificates" class="form-group">
<div id="fd_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_experience_list->certificates->title() ?>" data-table="employee_has_experience" data-field="x_certificates" name="x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id="x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_experience_list->certificates->editAttributes() ?><?php if ($employee_has_experience_list->certificates->ReadOnly || $employee_has_experience_list->certificates->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_has_experience_list->RowIndex ?>_certificates"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fn_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience_list->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo (Post("fa_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fs_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fx_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience_list->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fm_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience_list->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fc_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience_list->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_certificates">
<span><?php echo GetFileViewTag($employee_has_experience_list->certificates, $employee_has_experience_list->certificates->getViewValue(), FALSE) ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->others->Visible) { // others ?>
		<td data-name="others" <?php echo $employee_has_experience_list->others->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_others" class="form-group">
<div id="fd_x<?php echo $employee_has_experience_list->RowIndex ?>_others">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_experience_list->others->title() ?>" data-table="employee_has_experience" data-field="x_others" name="x<?php echo $employee_has_experience_list->RowIndex ?>_others" id="x<?php echo $employee_has_experience_list->RowIndex ?>_others" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_experience_list->others->editAttributes() ?><?php if ($employee_has_experience_list->others->ReadOnly || $employee_has_experience_list->others->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_has_experience_list->RowIndex ?>_others"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fn_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience_list->others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fs_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fx_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience_list->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fm_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience_list->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fc_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience_list->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_experience_list->RowIndex ?>_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_others" name="o<?php echo $employee_has_experience_list->RowIndex ?>_others" id="o<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo HtmlEncode($employee_has_experience_list->others->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_others" class="form-group">
<div id="fd_x<?php echo $employee_has_experience_list->RowIndex ?>_others">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_experience_list->others->title() ?>" data-table="employee_has_experience" data-field="x_others" name="x<?php echo $employee_has_experience_list->RowIndex ?>_others" id="x<?php echo $employee_has_experience_list->RowIndex ?>_others" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_experience_list->others->editAttributes() ?><?php if ($employee_has_experience_list->others->ReadOnly || $employee_has_experience_list->others->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_has_experience_list->RowIndex ?>_others"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fn_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience_list->others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo (Post("fa_x<?php echo $employee_has_experience_list->RowIndex ?>_others") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fs_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fx_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience_list->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fm_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience_list->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fc_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience_list->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_experience_list->RowIndex ?>_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_others">
<span<?php echo $employee_has_experience_list->others->viewAttributes() ?>><?php echo GetFileViewTag($employee_has_experience_list->others, $employee_has_experience_list->others->getViewValue(), FALSE) ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $employee_has_experience_list->status->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_experience" data-field="x_status" data-value-separator="<?php echo $employee_has_experience_list->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_experience_list->RowIndex ?>_status" name="x<?php echo $employee_has_experience_list->RowIndex ?>_status"<?php echo $employee_has_experience_list->status->editAttributes() ?>>
			<?php echo $employee_has_experience_list->status->selectOptionListHtml("x{$employee_has_experience_list->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_has_experience_list->status->Lookup->getParamTag($employee_has_experience_list, "p_x" . $employee_has_experience_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_status" name="o<?php echo $employee_has_experience_list->RowIndex ?>_status" id="o<?php echo $employee_has_experience_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_experience_list->status->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_experience" data-field="x_status" data-value-separator="<?php echo $employee_has_experience_list->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_experience_list->RowIndex ?>_status" name="x<?php echo $employee_has_experience_list->RowIndex ?>_status"<?php echo $employee_has_experience_list->status->editAttributes() ?>>
			<?php echo $employee_has_experience_list->status->selectOptionListHtml("x{$employee_has_experience_list->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_has_experience_list->status->Lookup->getParamTag($employee_has_experience_list, "p_x" . $employee_has_experience_list->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCount ?>_employee_has_experience_status">
<span<?php echo $employee_has_experience_list->status->viewAttributes() ?>><?php echo $employee_has_experience_list->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_has_experience_list->ListOptions->render("body", "right", $employee_has_experience_list->RowCount);
?>
	</tr>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD || $employee_has_experience->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["femployee_has_experiencelist", "load"], function() {
	femployee_has_experiencelist.updateLists(<?php echo $employee_has_experience_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$employee_has_experience_list->isGridAdd())
		if (!$employee_has_experience_list->Recordset->EOF)
			$employee_has_experience_list->Recordset->moveNext();
}
?>
<?php
	if ($employee_has_experience_list->isGridAdd() || $employee_has_experience_list->isGridEdit()) {
		$employee_has_experience_list->RowIndex = '$rowindex$';
		$employee_has_experience_list->loadRowValues();

		// Set row properties
		$employee_has_experience->resetAttributes();
		$employee_has_experience->RowAttrs->merge(["data-rowindex" => $employee_has_experience_list->RowIndex, "id" => "r0_employee_has_experience", "data-rowtype" => ROWTYPE_ADD]);
		$employee_has_experience->RowAttrs->appendClass("ew-template");
		$employee_has_experience->RowType = ROWTYPE_ADD;

		// Render row
		$employee_has_experience_list->renderRow();

		// Render list options
		$employee_has_experience_list->renderListOptions();
		$employee_has_experience_list->StartRowCount = 0;
?>
	<tr <?php echo $employee_has_experience->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_has_experience_list->ListOptions->render("body", "left", $employee_has_experience_list->RowIndex);
?>
	<?php if ($employee_has_experience_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_employee_has_experience_id" class="form-group employee_has_experience_id"></span>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" name="o<?php echo $employee_has_experience_list->RowIndex ?>_id" id="o<?php echo $employee_has_experience_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_experience_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id">
<?php if ($employee_has_experience_list->employee_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<span<?php echo $employee_has_experience_list->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_experience_list->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" name="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience_list->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<input type="text" data-table="employee_has_experience" data-field="x_employee_id" name="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" id="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_experience_list->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->employee_id->EditValue ?>"<?php echo $employee_has_experience_list->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_employee_id" name="o<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" id="o<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience_list->employee_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->working_at->Visible) { // working_at ?>
		<td data-name="working_at">
<span id="el$rowindex$_employee_has_experience_working_at" class="form-group employee_has_experience_working_at">
<input type="text" data-table="employee_has_experience" data-field="x_working_at" name="x<?php echo $employee_has_experience_list->RowIndex ?>_working_at" id="x<?php echo $employee_has_experience_list->RowIndex ?>_working_at" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience_list->working_at->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->working_at->EditValue ?>"<?php echo $employee_has_experience_list->working_at->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_working_at" name="o<?php echo $employee_has_experience_list->RowIndex ?>_working_at" id="o<?php echo $employee_has_experience_list->RowIndex ?>_working_at" value="<?php echo HtmlEncode($employee_has_experience_list->working_at->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->job_description->Visible) { // job description ?>
		<td data-name="job_description">
<span id="el$rowindex$_employee_has_experience_job_description" class="form-group employee_has_experience_job_description">
<input type="text" data-table="employee_has_experience" data-field="x_job_description" name="x<?php echo $employee_has_experience_list->RowIndex ?>_job_description" id="x<?php echo $employee_has_experience_list->RowIndex ?>_job_description" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience_list->job_description->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->job_description->EditValue ?>"<?php echo $employee_has_experience_list->job_description->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_job_description" name="o<?php echo $employee_has_experience_list->RowIndex ?>_job_description" id="o<?php echo $employee_has_experience_list->RowIndex ?>_job_description" value="<?php echo HtmlEncode($employee_has_experience_list->job_description->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->role->Visible) { // role ?>
		<td data-name="role">
<span id="el$rowindex$_employee_has_experience_role" class="form-group employee_has_experience_role">
<input type="text" data-table="employee_has_experience" data-field="x_role" name="x<?php echo $employee_has_experience_list->RowIndex ?>_role" id="x<?php echo $employee_has_experience_list->RowIndex ?>_role" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience_list->role->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->role->EditValue ?>"<?php echo $employee_has_experience_list->role->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_role" name="o<?php echo $employee_has_experience_list->RowIndex ?>_role" id="o<?php echo $employee_has_experience_list->RowIndex ?>_role" value="<?php echo HtmlEncode($employee_has_experience_list->role->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->start_date->Visible) { // start_date ?>
		<td data-name="start_date">
<span id="el$rowindex$_employee_has_experience_start_date" class="form-group employee_has_experience_start_date">
<input type="text" data-table="employee_has_experience" data-field="x_start_date" name="x<?php echo $employee_has_experience_list->RowIndex ?>_start_date" id="x<?php echo $employee_has_experience_list->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($employee_has_experience_list->start_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->start_date->EditValue ?>"<?php echo $employee_has_experience_list->start_date->editAttributes() ?>>
<?php if (!$employee_has_experience_list->start_date->ReadOnly && !$employee_has_experience_list->start_date->Disabled && !isset($employee_has_experience_list->start_date->EditAttrs["readonly"]) && !isset($employee_has_experience_list->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experiencelist", "datetimepicker"], function() {
	ew.createDateTimePicker("femployee_has_experiencelist", "x<?php echo $employee_has_experience_list->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_start_date" name="o<?php echo $employee_has_experience_list->RowIndex ?>_start_date" id="o<?php echo $employee_has_experience_list->RowIndex ?>_start_date" value="<?php echo HtmlEncode($employee_has_experience_list->start_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->end_date->Visible) { // end_date ?>
		<td data-name="end_date">
<span id="el$rowindex$_employee_has_experience_end_date" class="form-group employee_has_experience_end_date">
<input type="text" data-table="employee_has_experience" data-field="x_end_date" name="x<?php echo $employee_has_experience_list->RowIndex ?>_end_date" id="x<?php echo $employee_has_experience_list->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($employee_has_experience_list->end_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->end_date->EditValue ?>"<?php echo $employee_has_experience_list->end_date->editAttributes() ?>>
<?php if (!$employee_has_experience_list->end_date->ReadOnly && !$employee_has_experience_list->end_date->Disabled && !isset($employee_has_experience_list->end_date->EditAttrs["readonly"]) && !isset($employee_has_experience_list->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experiencelist", "datetimepicker"], function() {
	ew.createDateTimePicker("femployee_has_experiencelist", "x<?php echo $employee_has_experience_list->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_end_date" name="o<?php echo $employee_has_experience_list->RowIndex ?>_end_date" id="o<?php echo $employee_has_experience_list->RowIndex ?>_end_date" value="<?php echo HtmlEncode($employee_has_experience_list->end_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->total_experience->Visible) { // total_experience ?>
		<td data-name="total_experience">
<span id="el$rowindex$_employee_has_experience_total_experience" class="form-group employee_has_experience_total_experience">
<input type="text" data-table="employee_has_experience" data-field="x_total_experience" name="x<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" id="x<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience_list->total_experience->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience_list->total_experience->EditValue ?>"<?php echo $employee_has_experience_list->total_experience->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_total_experience" name="o<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" id="o<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" value="<?php echo HtmlEncode($employee_has_experience_list->total_experience->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->certificates->Visible) { // certificates ?>
		<td data-name="certificates">
<span id="el$rowindex$_employee_has_experience_certificates" class="form-group employee_has_experience_certificates">
<div id="fd_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_experience_list->certificates->title() ?>" data-table="employee_has_experience" data-field="x_certificates" name="x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id="x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_experience_list->certificates->editAttributes() ?><?php if ($employee_has_experience_list->certificates->ReadOnly || $employee_has_experience_list->certificates->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_has_experience_list->RowIndex ?>_certificates"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fn_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience_list->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fs_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fx_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience_list->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fm_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience_list->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fc_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience_list->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_certificates" name="o<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id="o<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo HtmlEncode($employee_has_experience_list->certificates->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->others->Visible) { // others ?>
		<td data-name="others">
<span id="el$rowindex$_employee_has_experience_others" class="form-group employee_has_experience_others">
<div id="fd_x<?php echo $employee_has_experience_list->RowIndex ?>_others">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_experience_list->others->title() ?>" data-table="employee_has_experience" data-field="x_others" name="x<?php echo $employee_has_experience_list->RowIndex ?>_others" id="x<?php echo $employee_has_experience_list->RowIndex ?>_others" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_experience_list->others->editAttributes() ?><?php if ($employee_has_experience_list->others->ReadOnly || $employee_has_experience_list->others->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_has_experience_list->RowIndex ?>_others"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fn_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience_list->others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fs_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fx_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience_list->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fm_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience_list->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fc_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience_list->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_experience_list->RowIndex ?>_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_others" name="o<?php echo $employee_has_experience_list->RowIndex ?>_others" id="o<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo HtmlEncode($employee_has_experience_list->others->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience_list->status->Visible) { // status ?>
		<td data-name="status">
<span id="el$rowindex$_employee_has_experience_status" class="form-group employee_has_experience_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_experience" data-field="x_status" data-value-separator="<?php echo $employee_has_experience_list->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_experience_list->RowIndex ?>_status" name="x<?php echo $employee_has_experience_list->RowIndex ?>_status"<?php echo $employee_has_experience_list->status->editAttributes() ?>>
			<?php echo $employee_has_experience_list->status->selectOptionListHtml("x{$employee_has_experience_list->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_has_experience_list->status->Lookup->getParamTag($employee_has_experience_list, "p_x" . $employee_has_experience_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_status" name="o<?php echo $employee_has_experience_list->RowIndex ?>_status" id="o<?php echo $employee_has_experience_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_experience_list->status->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_has_experience_list->ListOptions->render("body", "right", $employee_has_experience_list->RowIndex);
?>
<script>
loadjs.ready(["femployee_has_experiencelist", "load"], function() {
	femployee_has_experiencelist.updateLists(<?php echo $employee_has_experience_list->RowIndex ?>);
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
<?php if ($employee_has_experience_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $employee_has_experience_list->FormKeyCountName ?>" id="<?php echo $employee_has_experience_list->FormKeyCountName ?>" value="<?php echo $employee_has_experience_list->KeyCount ?>">
<?php echo $employee_has_experience_list->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_has_experience_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $employee_has_experience_list->FormKeyCountName ?>" id="<?php echo $employee_has_experience_list->FormKeyCountName ?>" value="<?php echo $employee_has_experience_list->KeyCount ?>">
<?php echo $employee_has_experience_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$employee_has_experience->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_has_experience_list->Recordset)
	$employee_has_experience_list->Recordset->Close();
?>
<?php if (!$employee_has_experience_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_has_experience_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $employee_has_experience_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_has_experience_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_has_experience_list->TotalRecords == 0 && !$employee_has_experience->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_has_experience_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_has_experience_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$employee_has_experience_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$employee_has_experience->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_employee_has_experience",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$employee_has_experience_list->terminate();
?>