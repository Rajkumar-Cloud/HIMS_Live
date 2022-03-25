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
$employee_document_list = new employee_document_list();

// Run the page
$employee_document_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_document_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$employee_document_list->isExport()) { ?>
<script>
var femployee_documentlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	femployee_documentlist = currentForm = new ew.Form("femployee_documentlist", "list");
	femployee_documentlist.formKeyCountName = '<?php echo $employee_document_list->FormKeyCountName ?>';

	// Validate form
	femployee_documentlist.validate = function() {
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
			<?php if ($employee_document_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document_list->id->caption(), $employee_document_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_document_list->employee_id->Required) { ?>
				elm = this.getElements("x" + infix + "_employee_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document_list->employee_id->caption(), $employee_document_list->employee_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_employee_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_document_list->employee_id->errorMessage()) ?>");
			<?php if ($employee_document_list->DocumentName->Required) { ?>
				elm = this.getElements("x" + infix + "_DocumentName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document_list->DocumentName->caption(), $employee_document_list->DocumentName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_document_list->DocumentNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_DocumentNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document_list->DocumentNumber->caption(), $employee_document_list->DocumentNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_document_list->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document_list->status->caption(), $employee_document_list->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_document_list->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document_list->createdby->caption(), $employee_document_list->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_document_list->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document_list->createddatetime->caption(), $employee_document_list->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_document_list->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document_list->modifiedby->caption(), $employee_document_list->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_document_list->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document_list->modifieddatetime->caption(), $employee_document_list->modifieddatetime->RequiredErrorMessage)) ?>");
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
	femployee_documentlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "employee_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "DocumentName", false)) return false;
		if (ew.valueChanged(fobj, infix, "DocumentNumber", false)) return false;
		if (ew.valueChanged(fobj, infix, "status", false)) return false;
		return true;
	}

	// Form_CustomValidate
	femployee_documentlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	femployee_documentlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	femployee_documentlist.lists["x_DocumentName"] = <?php echo $employee_document_list->DocumentName->Lookup->toClientList($employee_document_list) ?>;
	femployee_documentlist.lists["x_DocumentName"].options = <?php echo JsonEncode($employee_document_list->DocumentName->lookupOptions()) ?>;
	femployee_documentlist.lists["x_status"] = <?php echo $employee_document_list->status->Lookup->toClientList($employee_document_list) ?>;
	femployee_documentlist.lists["x_status"].options = <?php echo JsonEncode($employee_document_list->status->lookupOptions()) ?>;
	loadjs.done("femployee_documentlist");
});
var femployee_documentlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	femployee_documentlistsrch = currentSearchForm = new ew.Form("femployee_documentlistsrch");

	// Dynamic selection lists
	// Filters

	femployee_documentlistsrch.filterList = <?php echo $employee_document_list->getFilterList() ?>;
	loadjs.done("femployee_documentlistsrch");
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
<?php if (!$employee_document_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_document_list->TotalRecords > 0 && $employee_document_list->ExportOptions->visible()) { ?>
<?php $employee_document_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_document_list->ImportOptions->visible()) { ?>
<?php $employee_document_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_document_list->SearchOptions->visible()) { ?>
<?php $employee_document_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_document_list->FilterOptions->visible()) { ?>
<?php $employee_document_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$employee_document_list->isExport() || Config("EXPORT_MASTER_RECORD") && $employee_document_list->isExport("print")) { ?>
<?php
if ($employee_document_list->DbMasterFilter != "" && $employee_document->getCurrentMasterTable() == "employee") {
	if ($employee_document_list->MasterRecordExists) {
		include_once "employeemaster.php";
	}
}
?>
<?php } ?>
<?php
$employee_document_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_document_list->isExport() && !$employee_document->CurrentAction) { ?>
<form name="femployee_documentlistsrch" id="femployee_documentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="femployee_documentlistsrch-search-panel" class="<?php echo $employee_document_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_document">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $employee_document_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($employee_document_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($employee_document_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_document_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_document_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_document_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_document_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_document_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $employee_document_list->showPageHeader(); ?>
<?php
$employee_document_list->showMessage();
?>
<?php if ($employee_document_list->TotalRecords > 0 || $employee_document->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_document_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_document">
<?php if (!$employee_document_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_document_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $employee_document_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_document_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_documentlist" id="femployee_documentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_document">
<?php if ($employee_document->getCurrentMasterTable() == "employee" && $employee_document->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($employee_document_list->employee_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_employee_document" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($employee_document_list->TotalRecords > 0 || $employee_document_list->isGridEdit()) { ?>
<table id="tbl_employee_documentlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_document->RowType = ROWTYPE_HEADER;

// Render list options
$employee_document_list->renderListOptions();

// Render list options (header, left)
$employee_document_list->ListOptions->render("header", "left");
?>
<?php if ($employee_document_list->id->Visible) { // id ?>
	<?php if ($employee_document_list->SortUrl($employee_document_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_document_list->id->headerCellClass() ?>"><div id="elh_employee_document_id" class="employee_document_id"><div class="ew-table-header-caption"><?php echo $employee_document_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_document_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_document_list->SortUrl($employee_document_list->id) ?>', 1);"><div id="elh_employee_document_id" class="employee_document_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_list->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_document_list->SortUrl($employee_document_list->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employee_document_list->employee_id->headerCellClass() ?>"><div id="elh_employee_document_employee_id" class="employee_document_employee_id"><div class="ew-table-header-caption"><?php echo $employee_document_list->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employee_document_list->employee_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_document_list->SortUrl($employee_document_list->employee_id) ?>', 1);"><div id="elh_employee_document_employee_id" class="employee_document_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_list->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_list->employee_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_list->employee_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_list->DocumentName->Visible) { // DocumentName ?>
	<?php if ($employee_document_list->SortUrl($employee_document_list->DocumentName) == "") { ?>
		<th data-name="DocumentName" class="<?php echo $employee_document_list->DocumentName->headerCellClass() ?>"><div id="elh_employee_document_DocumentName" class="employee_document_DocumentName"><div class="ew-table-header-caption"><?php echo $employee_document_list->DocumentName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DocumentName" class="<?php echo $employee_document_list->DocumentName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_document_list->SortUrl($employee_document_list->DocumentName) ?>', 1);"><div id="elh_employee_document_DocumentName" class="employee_document_DocumentName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_list->DocumentName->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_list->DocumentName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_list->DocumentName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_list->DocumentNumber->Visible) { // DocumentNumber ?>
	<?php if ($employee_document_list->SortUrl($employee_document_list->DocumentNumber) == "") { ?>
		<th data-name="DocumentNumber" class="<?php echo $employee_document_list->DocumentNumber->headerCellClass() ?>"><div id="elh_employee_document_DocumentNumber" class="employee_document_DocumentNumber"><div class="ew-table-header-caption"><?php echo $employee_document_list->DocumentNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DocumentNumber" class="<?php echo $employee_document_list->DocumentNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_document_list->SortUrl($employee_document_list->DocumentNumber) ?>', 1);"><div id="elh_employee_document_DocumentNumber" class="employee_document_DocumentNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_list->DocumentNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_document_list->DocumentNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_list->DocumentNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_list->status->Visible) { // status ?>
	<?php if ($employee_document_list->SortUrl($employee_document_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_document_list->status->headerCellClass() ?>"><div id="elh_employee_document_status" class="employee_document_status"><div class="ew-table-header-caption"><?php echo $employee_document_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_document_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_document_list->SortUrl($employee_document_list->status) ?>', 1);"><div id="elh_employee_document_status" class="employee_document_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_list->createdby->Visible) { // createdby ?>
	<?php if ($employee_document_list->SortUrl($employee_document_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $employee_document_list->createdby->headerCellClass() ?>"><div id="elh_employee_document_createdby" class="employee_document_createdby"><div class="ew-table-header-caption"><?php echo $employee_document_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $employee_document_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_document_list->SortUrl($employee_document_list->createdby) ?>', 1);"><div id="elh_employee_document_createdby" class="employee_document_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($employee_document_list->SortUrl($employee_document_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $employee_document_list->createddatetime->headerCellClass() ?>"><div id="elh_employee_document_createddatetime" class="employee_document_createddatetime"><div class="ew-table-header-caption"><?php echo $employee_document_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $employee_document_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_document_list->SortUrl($employee_document_list->createddatetime) ?>', 1);"><div id="elh_employee_document_createddatetime" class="employee_document_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($employee_document_list->SortUrl($employee_document_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $employee_document_list->modifiedby->headerCellClass() ?>"><div id="elh_employee_document_modifiedby" class="employee_document_modifiedby"><div class="ew-table-header-caption"><?php echo $employee_document_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $employee_document_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_document_list->SortUrl($employee_document_list->modifiedby) ?>', 1);"><div id="elh_employee_document_modifiedby" class="employee_document_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($employee_document_list->SortUrl($employee_document_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $employee_document_list->modifieddatetime->headerCellClass() ?>"><div id="elh_employee_document_modifieddatetime" class="employee_document_modifieddatetime"><div class="ew-table-header-caption"><?php echo $employee_document_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $employee_document_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_document_list->SortUrl($employee_document_list->modifieddatetime) ?>', 1);"><div id="elh_employee_document_modifieddatetime" class="employee_document_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_document_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_document_list->ExportAll && $employee_document_list->isExport()) {
	$employee_document_list->StopRecord = $employee_document_list->TotalRecords;
} else {

	// Set the last record to display
	if ($employee_document_list->TotalRecords > $employee_document_list->StartRecord + $employee_document_list->DisplayRecords - 1)
		$employee_document_list->StopRecord = $employee_document_list->StartRecord + $employee_document_list->DisplayRecords - 1;
	else
		$employee_document_list->StopRecord = $employee_document_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($employee_document->isConfirm() || $employee_document_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($employee_document_list->FormKeyCountName) && ($employee_document_list->isGridAdd() || $employee_document_list->isGridEdit() || $employee_document->isConfirm())) {
		$employee_document_list->KeyCount = $CurrentForm->getValue($employee_document_list->FormKeyCountName);
		$employee_document_list->StopRecord = $employee_document_list->StartRecord + $employee_document_list->KeyCount - 1;
	}
}
$employee_document_list->RecordCount = $employee_document_list->StartRecord - 1;
if ($employee_document_list->Recordset && !$employee_document_list->Recordset->EOF) {
	$employee_document_list->Recordset->moveFirst();
	$selectLimit = $employee_document_list->UseSelectLimit;
	if (!$selectLimit && $employee_document_list->StartRecord > 1)
		$employee_document_list->Recordset->move($employee_document_list->StartRecord - 1);
} elseif (!$employee_document->AllowAddDeleteRow && $employee_document_list->StopRecord == 0) {
	$employee_document_list->StopRecord = $employee_document->GridAddRowCount;
}

// Initialize aggregate
$employee_document->RowType = ROWTYPE_AGGREGATEINIT;
$employee_document->resetAttributes();
$employee_document_list->renderRow();
if ($employee_document_list->isGridAdd())
	$employee_document_list->RowIndex = 0;
if ($employee_document_list->isGridEdit())
	$employee_document_list->RowIndex = 0;
while ($employee_document_list->RecordCount < $employee_document_list->StopRecord) {
	$employee_document_list->RecordCount++;
	if ($employee_document_list->RecordCount >= $employee_document_list->StartRecord) {
		$employee_document_list->RowCount++;
		if ($employee_document_list->isGridAdd() || $employee_document_list->isGridEdit() || $employee_document->isConfirm()) {
			$employee_document_list->RowIndex++;
			$CurrentForm->Index = $employee_document_list->RowIndex;
			if ($CurrentForm->hasValue($employee_document_list->FormActionName) && ($employee_document->isConfirm() || $employee_document_list->EventCancelled))
				$employee_document_list->RowAction = strval($CurrentForm->getValue($employee_document_list->FormActionName));
			elseif ($employee_document_list->isGridAdd())
				$employee_document_list->RowAction = "insert";
			else
				$employee_document_list->RowAction = "";
		}

		// Set up key count
		$employee_document_list->KeyCount = $employee_document_list->RowIndex;

		// Init row class and style
		$employee_document->resetAttributes();
		$employee_document->CssClass = "";
		if ($employee_document_list->isGridAdd()) {
			$employee_document_list->loadRowValues(); // Load default values
		} else {
			$employee_document_list->loadRowValues($employee_document_list->Recordset); // Load row values
		}
		$employee_document->RowType = ROWTYPE_VIEW; // Render view
		if ($employee_document_list->isGridAdd()) // Grid add
			$employee_document->RowType = ROWTYPE_ADD; // Render add
		if ($employee_document_list->isGridAdd() && $employee_document->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$employee_document_list->restoreCurrentRowFormValues($employee_document_list->RowIndex); // Restore form values
		if ($employee_document_list->isGridEdit()) { // Grid edit
			if ($employee_document->EventCancelled)
				$employee_document_list->restoreCurrentRowFormValues($employee_document_list->RowIndex); // Restore form values
			if ($employee_document_list->RowAction == "insert")
				$employee_document->RowType = ROWTYPE_ADD; // Render add
			else
				$employee_document->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($employee_document_list->isGridEdit() && ($employee_document->RowType == ROWTYPE_EDIT || $employee_document->RowType == ROWTYPE_ADD) && $employee_document->EventCancelled) // Update failed
			$employee_document_list->restoreCurrentRowFormValues($employee_document_list->RowIndex); // Restore form values
		if ($employee_document->RowType == ROWTYPE_EDIT) // Edit row
			$employee_document_list->EditRowCount++;

		// Set up row id / data-rowindex
		$employee_document->RowAttrs->merge(["data-rowindex" => $employee_document_list->RowCount, "id" => "r" . $employee_document_list->RowCount . "_employee_document", "data-rowtype" => $employee_document->RowType]);

		// Render row
		$employee_document_list->renderRow();

		// Render list options
		$employee_document_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($employee_document_list->RowAction != "delete" && $employee_document_list->RowAction != "insertdelete" && !($employee_document_list->RowAction == "insert" && $employee_document->isConfirm() && $employee_document_list->emptyRow())) {
?>
	<tr <?php echo $employee_document->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_document_list->ListOptions->render("body", "left", $employee_document_list->RowCount);
?>
	<?php if ($employee_document_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $employee_document_list->id->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_id" class="form-group"></span>
<input type="hidden" data-table="employee_document" data-field="x_id" name="o<?php echo $employee_document_list->RowIndex ?>_id" id="o<?php echo $employee_document_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document_list->id->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_id" class="form-group">
<span<?php echo $employee_document_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_document_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_id" name="x<?php echo $employee_document_list->RowIndex ?>_id" id="x<?php echo $employee_document_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_id">
<span<?php echo $employee_document_list->id->viewAttributes() ?>><?php echo $employee_document_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document_list->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id" <?php echo $employee_document_list->employee_id->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($employee_document_list->employee_id->getSessionValue() != "") { ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_employee_id" class="form-group">
<span<?php echo $employee_document_list->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_document_list->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_document_list->RowIndex ?>_employee_id" name="x<?php echo $employee_document_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document_list->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_employee_id" class="form-group">
<input type="text" data-table="employee_document" data-field="x_employee_id" name="x<?php echo $employee_document_list->RowIndex ?>_employee_id" id="x<?php echo $employee_document_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_document_list->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_document_list->employee_id->EditValue ?>"<?php echo $employee_document_list->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_employee_id" name="o<?php echo $employee_document_list->RowIndex ?>_employee_id" id="o<?php echo $employee_document_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document_list->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($employee_document_list->employee_id->getSessionValue() != "") { ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_employee_id" class="form-group">
<span<?php echo $employee_document_list->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_document_list->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_document_list->RowIndex ?>_employee_id" name="x<?php echo $employee_document_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document_list->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_employee_id" class="form-group">
<input type="text" data-table="employee_document" data-field="x_employee_id" name="x<?php echo $employee_document_list->RowIndex ?>_employee_id" id="x<?php echo $employee_document_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_document_list->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_document_list->employee_id->EditValue ?>"<?php echo $employee_document_list->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_employee_id">
<span<?php echo $employee_document_list->employee_id->viewAttributes() ?>><?php echo $employee_document_list->employee_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document_list->DocumentName->Visible) { // DocumentName ?>
		<td data-name="DocumentName" <?php echo $employee_document_list->DocumentName->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_DocumentName" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_DocumentName" data-value-separator="<?php echo $employee_document_list->DocumentName->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_list->RowIndex ?>_DocumentName" name="x<?php echo $employee_document_list->RowIndex ?>_DocumentName"<?php echo $employee_document_list->DocumentName->editAttributes() ?>>
			<?php echo $employee_document_list->DocumentName->selectOptionListHtml("x{$employee_document_list->RowIndex}_DocumentName") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$employee_document_list->DocumentName->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_document_list->RowIndex ?>_DocumentName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_document_list->DocumentName->caption() ?>" data-title="<?php echo $employee_document_list->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_document_list->RowIndex ?>_DocumentName',url:'mas_documentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_document_list->DocumentName->Lookup->getParamTag($employee_document_list, "p_x" . $employee_document_list->RowIndex . "_DocumentName") ?>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" name="o<?php echo $employee_document_list->RowIndex ?>_DocumentName" id="o<?php echo $employee_document_list->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($employee_document_list->DocumentName->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_DocumentName" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_DocumentName" data-value-separator="<?php echo $employee_document_list->DocumentName->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_list->RowIndex ?>_DocumentName" name="x<?php echo $employee_document_list->RowIndex ?>_DocumentName"<?php echo $employee_document_list->DocumentName->editAttributes() ?>>
			<?php echo $employee_document_list->DocumentName->selectOptionListHtml("x{$employee_document_list->RowIndex}_DocumentName") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$employee_document_list->DocumentName->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_document_list->RowIndex ?>_DocumentName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_document_list->DocumentName->caption() ?>" data-title="<?php echo $employee_document_list->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_document_list->RowIndex ?>_DocumentName',url:'mas_documentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_document_list->DocumentName->Lookup->getParamTag($employee_document_list, "p_x" . $employee_document_list->RowIndex . "_DocumentName") ?>
</span>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_DocumentName">
<span<?php echo $employee_document_list->DocumentName->viewAttributes() ?>><?php echo $employee_document_list->DocumentName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document_list->DocumentNumber->Visible) { // DocumentNumber ?>
		<td data-name="DocumentNumber" <?php echo $employee_document_list->DocumentNumber->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_DocumentNumber" class="form-group">
<input type="text" data-table="employee_document" data-field="x_DocumentNumber" name="x<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" id="x<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($employee_document_list->DocumentNumber->getPlaceHolder()) ?>" value="<?php echo $employee_document_list->DocumentNumber->EditValue ?>"<?php echo $employee_document_list->DocumentNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" name="o<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" id="o<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($employee_document_list->DocumentNumber->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_DocumentNumber" class="form-group">
<input type="text" data-table="employee_document" data-field="x_DocumentNumber" name="x<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" id="x<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($employee_document_list->DocumentNumber->getPlaceHolder()) ?>" value="<?php echo $employee_document_list->DocumentNumber->EditValue ?>"<?php echo $employee_document_list->DocumentNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_DocumentNumber">
<span<?php echo $employee_document_list->DocumentNumber->viewAttributes() ?>><?php echo $employee_document_list->DocumentNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $employee_document_list->status->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_status" data-value-separator="<?php echo $employee_document_list->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_list->RowIndex ?>_status" name="x<?php echo $employee_document_list->RowIndex ?>_status"<?php echo $employee_document_list->status->editAttributes() ?>>
			<?php echo $employee_document_list->status->selectOptionListHtml("x{$employee_document_list->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_document_list->status->Lookup->getParamTag($employee_document_list, "p_x" . $employee_document_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_document" data-field="x_status" name="o<?php echo $employee_document_list->RowIndex ?>_status" id="o<?php echo $employee_document_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_document_list->status->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_status" data-value-separator="<?php echo $employee_document_list->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_list->RowIndex ?>_status" name="x<?php echo $employee_document_list->RowIndex ?>_status"<?php echo $employee_document_list->status->editAttributes() ?>>
			<?php echo $employee_document_list->status->selectOptionListHtml("x{$employee_document_list->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_document_list->status->Lookup->getParamTag($employee_document_list, "p_x" . $employee_document_list->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_status">
<span<?php echo $employee_document_list->status->viewAttributes() ?>><?php echo $employee_document_list->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $employee_document_list->createdby->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_createdby" name="o<?php echo $employee_document_list->RowIndex ?>_createdby" id="o<?php echo $employee_document_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($employee_document_list->createdby->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_createdby">
<span<?php echo $employee_document_list->createdby->viewAttributes() ?>><?php echo $employee_document_list->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $employee_document_list->createddatetime->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" name="o<?php echo $employee_document_list->RowIndex ?>_createddatetime" id="o<?php echo $employee_document_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($employee_document_list->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_createddatetime">
<span<?php echo $employee_document_list->createddatetime->viewAttributes() ?>><?php echo $employee_document_list->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $employee_document_list->modifiedby->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" name="o<?php echo $employee_document_list->RowIndex ?>_modifiedby" id="o<?php echo $employee_document_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($employee_document_list->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_modifiedby">
<span<?php echo $employee_document_list->modifiedby->viewAttributes() ?>><?php echo $employee_document_list->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $employee_document_list->modifieddatetime->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" name="o<?php echo $employee_document_list->RowIndex ?>_modifieddatetime" id="o<?php echo $employee_document_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($employee_document_list->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCount ?>_employee_document_modifieddatetime">
<span<?php echo $employee_document_list->modifieddatetime->viewAttributes() ?>><?php echo $employee_document_list->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_document_list->ListOptions->render("body", "right", $employee_document_list->RowCount);
?>
	</tr>
<?php if ($employee_document->RowType == ROWTYPE_ADD || $employee_document->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["femployee_documentlist", "load"], function() {
	femployee_documentlist.updateLists(<?php echo $employee_document_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$employee_document_list->isGridAdd())
		if (!$employee_document_list->Recordset->EOF)
			$employee_document_list->Recordset->moveNext();
}
?>
<?php
	if ($employee_document_list->isGridAdd() || $employee_document_list->isGridEdit()) {
		$employee_document_list->RowIndex = '$rowindex$';
		$employee_document_list->loadRowValues();

		// Set row properties
		$employee_document->resetAttributes();
		$employee_document->RowAttrs->merge(["data-rowindex" => $employee_document_list->RowIndex, "id" => "r0_employee_document", "data-rowtype" => ROWTYPE_ADD]);
		$employee_document->RowAttrs->appendClass("ew-template");
		$employee_document->RowType = ROWTYPE_ADD;

		// Render row
		$employee_document_list->renderRow();

		// Render list options
		$employee_document_list->renderListOptions();
		$employee_document_list->StartRowCount = 0;
?>
	<tr <?php echo $employee_document->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_document_list->ListOptions->render("body", "left", $employee_document_list->RowIndex);
?>
	<?php if ($employee_document_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_employee_document_id" class="form-group employee_document_id"></span>
<input type="hidden" data-table="employee_document" data-field="x_id" name="o<?php echo $employee_document_list->RowIndex ?>_id" id="o<?php echo $employee_document_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document_list->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id">
<?php if ($employee_document_list->employee_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_employee_document_employee_id" class="form-group employee_document_employee_id">
<span<?php echo $employee_document_list->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_document_list->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_document_list->RowIndex ?>_employee_id" name="x<?php echo $employee_document_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document_list->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_employee_document_employee_id" class="form-group employee_document_employee_id">
<input type="text" data-table="employee_document" data-field="x_employee_id" name="x<?php echo $employee_document_list->RowIndex ?>_employee_id" id="x<?php echo $employee_document_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_document_list->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_document_list->employee_id->EditValue ?>"<?php echo $employee_document_list->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_employee_id" name="o<?php echo $employee_document_list->RowIndex ?>_employee_id" id="o<?php echo $employee_document_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document_list->employee_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document_list->DocumentName->Visible) { // DocumentName ?>
		<td data-name="DocumentName">
<span id="el$rowindex$_employee_document_DocumentName" class="form-group employee_document_DocumentName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_DocumentName" data-value-separator="<?php echo $employee_document_list->DocumentName->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_list->RowIndex ?>_DocumentName" name="x<?php echo $employee_document_list->RowIndex ?>_DocumentName"<?php echo $employee_document_list->DocumentName->editAttributes() ?>>
			<?php echo $employee_document_list->DocumentName->selectOptionListHtml("x{$employee_document_list->RowIndex}_DocumentName") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$employee_document_list->DocumentName->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_document_list->RowIndex ?>_DocumentName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_document_list->DocumentName->caption() ?>" data-title="<?php echo $employee_document_list->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_document_list->RowIndex ?>_DocumentName',url:'mas_documentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_document_list->DocumentName->Lookup->getParamTag($employee_document_list, "p_x" . $employee_document_list->RowIndex . "_DocumentName") ?>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" name="o<?php echo $employee_document_list->RowIndex ?>_DocumentName" id="o<?php echo $employee_document_list->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($employee_document_list->DocumentName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document_list->DocumentNumber->Visible) { // DocumentNumber ?>
		<td data-name="DocumentNumber">
<span id="el$rowindex$_employee_document_DocumentNumber" class="form-group employee_document_DocumentNumber">
<input type="text" data-table="employee_document" data-field="x_DocumentNumber" name="x<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" id="x<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($employee_document_list->DocumentNumber->getPlaceHolder()) ?>" value="<?php echo $employee_document_list->DocumentNumber->EditValue ?>"<?php echo $employee_document_list->DocumentNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" name="o<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" id="o<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($employee_document_list->DocumentNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document_list->status->Visible) { // status ?>
		<td data-name="status">
<span id="el$rowindex$_employee_document_status" class="form-group employee_document_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_status" data-value-separator="<?php echo $employee_document_list->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_list->RowIndex ?>_status" name="x<?php echo $employee_document_list->RowIndex ?>_status"<?php echo $employee_document_list->status->editAttributes() ?>>
			<?php echo $employee_document_list->status->selectOptionListHtml("x{$employee_document_list->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_document_list->status->Lookup->getParamTag($employee_document_list, "p_x" . $employee_document_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_document" data-field="x_status" name="o<?php echo $employee_document_list->RowIndex ?>_status" id="o<?php echo $employee_document_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_document_list->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<input type="hidden" data-table="employee_document" data-field="x_createdby" name="o<?php echo $employee_document_list->RowIndex ?>_createdby" id="o<?php echo $employee_document_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($employee_document_list->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" name="o<?php echo $employee_document_list->RowIndex ?>_createddatetime" id="o<?php echo $employee_document_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($employee_document_list->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" name="o<?php echo $employee_document_list->RowIndex ?>_modifiedby" id="o<?php echo $employee_document_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($employee_document_list->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" name="o<?php echo $employee_document_list->RowIndex ?>_modifieddatetime" id="o<?php echo $employee_document_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($employee_document_list->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_document_list->ListOptions->render("body", "right", $employee_document_list->RowIndex);
?>
<script>
loadjs.ready(["femployee_documentlist", "load"], function() {
	femployee_documentlist.updateLists(<?php echo $employee_document_list->RowIndex ?>);
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
<?php if ($employee_document_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $employee_document_list->FormKeyCountName ?>" id="<?php echo $employee_document_list->FormKeyCountName ?>" value="<?php echo $employee_document_list->KeyCount ?>">
<?php echo $employee_document_list->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_document_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $employee_document_list->FormKeyCountName ?>" id="<?php echo $employee_document_list->FormKeyCountName ?>" value="<?php echo $employee_document_list->KeyCount ?>">
<?php echo $employee_document_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$employee_document->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_document_list->Recordset)
	$employee_document_list->Recordset->Close();
?>
<?php if (!$employee_document_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_document_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $employee_document_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_document_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_document_list->TotalRecords == 0 && !$employee_document->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_document_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_document_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$employee_document_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$employee_document->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_employee_document",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$employee_document_list->terminate();
?>