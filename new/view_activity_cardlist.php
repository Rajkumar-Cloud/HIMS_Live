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
$view_activity_card_list = new view_activity_card_list();

// Run the page
$view_activity_card_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_activity_card_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_activity_card_list->isExport()) { ?>
<script>
var fview_activity_cardlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_activity_cardlist = currentForm = new ew.Form("fview_activity_cardlist", "list");
	fview_activity_cardlist.formKeyCountName = '<?php echo $view_activity_card_list->FormKeyCountName ?>';

	// Validate form
	fview_activity_cardlist.validate = function() {
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
			<?php if ($view_activity_card_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_activity_card_list->id->caption(), $view_activity_card_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_activity_card_list->Activity->Required) { ?>
				elm = this.getElements("x" + infix + "_Activity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_activity_card_list->Activity->caption(), $view_activity_card_list->Activity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_activity_card_list->Type->Required) { ?>
				elm = this.getElements("x" + infix + "_Type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_activity_card_list->Type->caption(), $view_activity_card_list->Type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_activity_card_list->Selected->Required) { ?>
				elm = this.getElements("x" + infix + "_Selected[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_activity_card_list->Selected->caption(), $view_activity_card_list->Selected->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_activity_card_list->Units->Required) { ?>
				elm = this.getElements("x" + infix + "_Units");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_activity_card_list->Units->caption(), $view_activity_card_list->Units->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_activity_card_list->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_activity_card_list->Amount->caption(), $view_activity_card_list->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_activity_card_list->Amount->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fview_activity_cardlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_activity_cardlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_activity_cardlist.lists["x_Type"] = <?php echo $view_activity_card_list->Type->Lookup->toClientList($view_activity_card_list) ?>;
	fview_activity_cardlist.lists["x_Type"].options = <?php echo JsonEncode($view_activity_card_list->Type->options(FALSE, TRUE)) ?>;
	fview_activity_cardlist.lists["x_Selected[]"] = <?php echo $view_activity_card_list->Selected->Lookup->toClientList($view_activity_card_list) ?>;
	fview_activity_cardlist.lists["x_Selected[]"].options = <?php echo JsonEncode($view_activity_card_list->Selected->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_activity_cardlist");
});
var fview_activity_cardlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_activity_cardlistsrch = currentSearchForm = new ew.Form("fview_activity_cardlistsrch");

	// Validate function for search
	fview_activity_cardlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_activity_cardlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_activity_cardlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_activity_cardlistsrch.lists["x_Type"] = <?php echo $view_activity_card_list->Type->Lookup->toClientList($view_activity_card_list) ?>;
	fview_activity_cardlistsrch.lists["x_Type"].options = <?php echo JsonEncode($view_activity_card_list->Type->options(FALSE, TRUE)) ?>;

	// Filters
	fview_activity_cardlistsrch.filterList = <?php echo $view_activity_card_list->getFilterList() ?>;
	loadjs.done("fview_activity_cardlistsrch");
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
<?php if (!$view_activity_card_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_activity_card_list->TotalRecords > 0 && $view_activity_card_list->ExportOptions->visible()) { ?>
<?php $view_activity_card_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_activity_card_list->ImportOptions->visible()) { ?>
<?php $view_activity_card_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_activity_card_list->SearchOptions->visible()) { ?>
<?php $view_activity_card_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_activity_card_list->FilterOptions->visible()) { ?>
<?php $view_activity_card_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_activity_card_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_activity_card_list->isExport() && !$view_activity_card->CurrentAction) { ?>
<form name="fview_activity_cardlistsrch" id="fview_activity_cardlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_activity_cardlistsrch-search-panel" class="<?php echo $view_activity_card_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_activity_card">
	<div class="ew-extended-search">
<?php

// Render search row
$view_activity_card->RowType = ROWTYPE_SEARCH;
$view_activity_card->resetAttributes();
$view_activity_card_list->renderRow();
?>
<?php if ($view_activity_card_list->Type->Visible) { // Type ?>
	<?php
		$view_activity_card_list->SearchColumnCount++;
		if (($view_activity_card_list->SearchColumnCount - 1) % $view_activity_card_list->SearchFieldsPerRow == 0) {
			$view_activity_card_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_activity_card_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Type" class="ew-cell form-group">
		<label for="x_Type" class="ew-search-caption ew-label"><?php echo $view_activity_card_list->Type->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Type" id="z_Type" value="LIKE">
</span>
		<span id="el_view_activity_card_Type" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_activity_card" data-field="x_Type" data-value-separator="<?php echo $view_activity_card_list->Type->displayValueSeparatorAttribute() ?>" id="x_Type" name="x_Type"<?php echo $view_activity_card_list->Type->editAttributes() ?>>
			<?php echo $view_activity_card_list->Type->selectOptionListHtml("x_Type") ?>
		</select>
</div>
</span>
	</div>
	<?php if ($view_activity_card_list->SearchColumnCount % $view_activity_card_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_activity_card_list->SearchColumnCount % $view_activity_card_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_activity_card_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_activity_card_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_activity_card_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_activity_card_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_activity_card_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_activity_card_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_activity_card_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_activity_card_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_activity_card_list->showPageHeader(); ?>
<?php
$view_activity_card_list->showMessage();
?>
<?php if ($view_activity_card_list->TotalRecords > 0 || $view_activity_card->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_activity_card_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_activity_card">
<?php if (!$view_activity_card_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_activity_card_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_activity_card_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_activity_card_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_activity_cardlist" id="fview_activity_cardlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_activity_card">
<div id="gmp_view_activity_card" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_activity_card_list->TotalRecords > 0 || $view_activity_card_list->isGridEdit()) { ?>
<table id="tbl_view_activity_cardlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_activity_card->RowType = ROWTYPE_HEADER;

// Render list options
$view_activity_card_list->renderListOptions();

// Render list options (header, left)
$view_activity_card_list->ListOptions->render("header", "left");
?>
<?php if ($view_activity_card_list->id->Visible) { // id ?>
	<?php if ($view_activity_card_list->SortUrl($view_activity_card_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_activity_card_list->id->headerCellClass() ?>"><div id="elh_view_activity_card_id" class="view_activity_card_id"><div class="ew-table-header-caption"><?php echo $view_activity_card_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_activity_card_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_activity_card_list->SortUrl($view_activity_card_list->id) ?>', 1);"><div id="elh_view_activity_card_id" class="view_activity_card_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_activity_card_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_activity_card_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_activity_card_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_activity_card_list->Activity->Visible) { // Activity ?>
	<?php if ($view_activity_card_list->SortUrl($view_activity_card_list->Activity) == "") { ?>
		<th data-name="Activity" class="<?php echo $view_activity_card_list->Activity->headerCellClass() ?>"><div id="elh_view_activity_card_Activity" class="view_activity_card_Activity"><div class="ew-table-header-caption"><?php echo $view_activity_card_list->Activity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Activity" class="<?php echo $view_activity_card_list->Activity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_activity_card_list->SortUrl($view_activity_card_list->Activity) ?>', 1);"><div id="elh_view_activity_card_Activity" class="view_activity_card_Activity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_activity_card_list->Activity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_activity_card_list->Activity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_activity_card_list->Activity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_activity_card_list->Type->Visible) { // Type ?>
	<?php if ($view_activity_card_list->SortUrl($view_activity_card_list->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $view_activity_card_list->Type->headerCellClass() ?>"><div id="elh_view_activity_card_Type" class="view_activity_card_Type"><div class="ew-table-header-caption"><?php echo $view_activity_card_list->Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $view_activity_card_list->Type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_activity_card_list->SortUrl($view_activity_card_list->Type) ?>', 1);"><div id="elh_view_activity_card_Type" class="view_activity_card_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_activity_card_list->Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_activity_card_list->Type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_activity_card_list->Type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_activity_card_list->Selected->Visible) { // Selected ?>
	<?php if ($view_activity_card_list->SortUrl($view_activity_card_list->Selected) == "") { ?>
		<th data-name="Selected" class="<?php echo $view_activity_card_list->Selected->headerCellClass() ?>"><div id="elh_view_activity_card_Selected" class="view_activity_card_Selected"><div class="ew-table-header-caption"><?php echo $view_activity_card_list->Selected->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Selected" class="<?php echo $view_activity_card_list->Selected->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_activity_card_list->SortUrl($view_activity_card_list->Selected) ?>', 1);"><div id="elh_view_activity_card_Selected" class="view_activity_card_Selected">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_activity_card_list->Selected->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_activity_card_list->Selected->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_activity_card_list->Selected->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_activity_card_list->Units->Visible) { // Units ?>
	<?php if ($view_activity_card_list->SortUrl($view_activity_card_list->Units) == "") { ?>
		<th data-name="Units" class="<?php echo $view_activity_card_list->Units->headerCellClass() ?>"><div id="elh_view_activity_card_Units" class="view_activity_card_Units"><div class="ew-table-header-caption"><?php echo $view_activity_card_list->Units->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Units" class="<?php echo $view_activity_card_list->Units->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_activity_card_list->SortUrl($view_activity_card_list->Units) ?>', 1);"><div id="elh_view_activity_card_Units" class="view_activity_card_Units">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_activity_card_list->Units->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_activity_card_list->Units->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_activity_card_list->Units->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_activity_card_list->Amount->Visible) { // Amount ?>
	<?php if ($view_activity_card_list->SortUrl($view_activity_card_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_activity_card_list->Amount->headerCellClass() ?>"><div id="elh_view_activity_card_Amount" class="view_activity_card_Amount"><div class="ew-table-header-caption"><?php echo $view_activity_card_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_activity_card_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_activity_card_list->SortUrl($view_activity_card_list->Amount) ?>', 1);"><div id="elh_view_activity_card_Amount" class="view_activity_card_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_activity_card_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_activity_card_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_activity_card_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_activity_card_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_activity_card_list->ExportAll && $view_activity_card_list->isExport()) {
	$view_activity_card_list->StopRecord = $view_activity_card_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_activity_card_list->TotalRecords > $view_activity_card_list->StartRecord + $view_activity_card_list->DisplayRecords - 1)
		$view_activity_card_list->StopRecord = $view_activity_card_list->StartRecord + $view_activity_card_list->DisplayRecords - 1;
	else
		$view_activity_card_list->StopRecord = $view_activity_card_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($view_activity_card->isConfirm() || $view_activity_card_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_activity_card_list->FormKeyCountName) && ($view_activity_card_list->isGridAdd() || $view_activity_card_list->isGridEdit() || $view_activity_card->isConfirm())) {
		$view_activity_card_list->KeyCount = $CurrentForm->getValue($view_activity_card_list->FormKeyCountName);
		$view_activity_card_list->StopRecord = $view_activity_card_list->StartRecord + $view_activity_card_list->KeyCount - 1;
	}
}
$view_activity_card_list->RecordCount = $view_activity_card_list->StartRecord - 1;
if ($view_activity_card_list->Recordset && !$view_activity_card_list->Recordset->EOF) {
	$view_activity_card_list->Recordset->moveFirst();
	$selectLimit = $view_activity_card_list->UseSelectLimit;
	if (!$selectLimit && $view_activity_card_list->StartRecord > 1)
		$view_activity_card_list->Recordset->move($view_activity_card_list->StartRecord - 1);
} elseif (!$view_activity_card->AllowAddDeleteRow && $view_activity_card_list->StopRecord == 0) {
	$view_activity_card_list->StopRecord = $view_activity_card->GridAddRowCount;
}

// Initialize aggregate
$view_activity_card->RowType = ROWTYPE_AGGREGATEINIT;
$view_activity_card->resetAttributes();
$view_activity_card_list->renderRow();
$view_activity_card_list->EditRowCount = 0;
if ($view_activity_card_list->isEdit())
	$view_activity_card_list->RowIndex = 1;
if ($view_activity_card_list->isGridEdit())
	$view_activity_card_list->RowIndex = 0;
while ($view_activity_card_list->RecordCount < $view_activity_card_list->StopRecord) {
	$view_activity_card_list->RecordCount++;
	if ($view_activity_card_list->RecordCount >= $view_activity_card_list->StartRecord) {
		$view_activity_card_list->RowCount++;
		if ($view_activity_card_list->isGridAdd() || $view_activity_card_list->isGridEdit() || $view_activity_card->isConfirm()) {
			$view_activity_card_list->RowIndex++;
			$CurrentForm->Index = $view_activity_card_list->RowIndex;
			if ($CurrentForm->hasValue($view_activity_card_list->FormActionName) && ($view_activity_card->isConfirm() || $view_activity_card_list->EventCancelled))
				$view_activity_card_list->RowAction = strval($CurrentForm->getValue($view_activity_card_list->FormActionName));
			elseif ($view_activity_card_list->isGridAdd())
				$view_activity_card_list->RowAction = "insert";
			else
				$view_activity_card_list->RowAction = "";
		}

		// Set up key count
		$view_activity_card_list->KeyCount = $view_activity_card_list->RowIndex;

		// Init row class and style
		$view_activity_card->resetAttributes();
		$view_activity_card->CssClass = "";
		if ($view_activity_card_list->isGridAdd()) {
			$view_activity_card_list->loadRowValues(); // Load default values
		} else {
			$view_activity_card_list->loadRowValues($view_activity_card_list->Recordset); // Load row values
		}
		$view_activity_card->RowType = ROWTYPE_VIEW; // Render view
		if ($view_activity_card_list->isEdit()) {
			if ($view_activity_card_list->checkInlineEditKey() && $view_activity_card_list->EditRowCount == 0) { // Inline edit
				$view_activity_card->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($view_activity_card_list->isGridEdit()) { // Grid edit
			if ($view_activity_card->EventCancelled)
				$view_activity_card_list->restoreCurrentRowFormValues($view_activity_card_list->RowIndex); // Restore form values
			if ($view_activity_card_list->RowAction == "insert")
				$view_activity_card->RowType = ROWTYPE_ADD; // Render add
			else
				$view_activity_card->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_activity_card_list->isEdit() && $view_activity_card->RowType == ROWTYPE_EDIT && $view_activity_card->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$view_activity_card_list->restoreFormValues(); // Restore form values
		}
		if ($view_activity_card_list->isGridEdit() && ($view_activity_card->RowType == ROWTYPE_EDIT || $view_activity_card->RowType == ROWTYPE_ADD) && $view_activity_card->EventCancelled) // Update failed
			$view_activity_card_list->restoreCurrentRowFormValues($view_activity_card_list->RowIndex); // Restore form values
		if ($view_activity_card->RowType == ROWTYPE_EDIT) // Edit row
			$view_activity_card_list->EditRowCount++;

		// Set up row id / data-rowindex
		$view_activity_card->RowAttrs->merge(["data-rowindex" => $view_activity_card_list->RowCount, "id" => "r" . $view_activity_card_list->RowCount . "_view_activity_card", "data-rowtype" => $view_activity_card->RowType]);

		// Render row
		$view_activity_card_list->renderRow();

		// Render list options
		$view_activity_card_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_activity_card_list->RowAction != "delete" && $view_activity_card_list->RowAction != "insertdelete" && !($view_activity_card_list->RowAction == "insert" && $view_activity_card->isConfirm() && $view_activity_card_list->emptyRow())) {
?>
	<tr <?php echo $view_activity_card->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_activity_card_list->ListOptions->render("body", "left", $view_activity_card_list->RowCount);
?>
	<?php if ($view_activity_card_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_activity_card_list->id->cellAttributes() ?>>
<?php if ($view_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_activity_card_list->RowCount ?>_view_activity_card_id" class="form-group"></span>
<input type="hidden" data-table="view_activity_card" data-field="x_id" name="o<?php echo $view_activity_card_list->RowIndex ?>_id" id="o<?php echo $view_activity_card_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_activity_card_list->id->OldValue) ?>">
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_activity_card_list->RowCount ?>_view_activity_card_id" class="form-group">
<span<?php echo $view_activity_card_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_activity_card_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_id" name="x<?php echo $view_activity_card_list->RowIndex ?>_id" id="x<?php echo $view_activity_card_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_activity_card_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_activity_card_list->RowCount ?>_view_activity_card_id">
<span<?php echo $view_activity_card_list->id->viewAttributes() ?>><?php echo $view_activity_card_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_activity_card_list->Activity->Visible) { // Activity ?>
		<td data-name="Activity" <?php echo $view_activity_card_list->Activity->cellAttributes() ?>>
<?php if ($view_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_activity_card_list->RowCount ?>_view_activity_card_Activity" class="form-group">
<input type="text" data-table="view_activity_card" data-field="x_Activity" name="x<?php echo $view_activity_card_list->RowIndex ?>_Activity" id="x<?php echo $view_activity_card_list->RowIndex ?>_Activity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_activity_card_list->Activity->getPlaceHolder()) ?>" value="<?php echo $view_activity_card_list->Activity->EditValue ?>"<?php echo $view_activity_card_list->Activity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Activity" name="o<?php echo $view_activity_card_list->RowIndex ?>_Activity" id="o<?php echo $view_activity_card_list->RowIndex ?>_Activity" value="<?php echo HtmlEncode($view_activity_card_list->Activity->OldValue) ?>">
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_activity_card_list->RowCount ?>_view_activity_card_Activity" class="form-group">
<input type="text" data-table="view_activity_card" data-field="x_Activity" name="x<?php echo $view_activity_card_list->RowIndex ?>_Activity" id="x<?php echo $view_activity_card_list->RowIndex ?>_Activity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_activity_card_list->Activity->getPlaceHolder()) ?>" value="<?php echo $view_activity_card_list->Activity->EditValue ?>"<?php echo $view_activity_card_list->Activity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_activity_card_list->RowCount ?>_view_activity_card_Activity">
<span<?php echo $view_activity_card_list->Activity->viewAttributes() ?>><?php echo $view_activity_card_list->Activity->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_activity_card_list->Type->Visible) { // Type ?>
		<td data-name="Type" <?php echo $view_activity_card_list->Type->cellAttributes() ?>>
<?php if ($view_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_activity_card_list->RowCount ?>_view_activity_card_Type" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_activity_card" data-field="x_Type" data-value-separator="<?php echo $view_activity_card_list->Type->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_activity_card_list->RowIndex ?>_Type" name="x<?php echo $view_activity_card_list->RowIndex ?>_Type"<?php echo $view_activity_card_list->Type->editAttributes() ?>>
			<?php echo $view_activity_card_list->Type->selectOptionListHtml("x{$view_activity_card_list->RowIndex}_Type") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Type" name="o<?php echo $view_activity_card_list->RowIndex ?>_Type" id="o<?php echo $view_activity_card_list->RowIndex ?>_Type" value="<?php echo HtmlEncode($view_activity_card_list->Type->OldValue) ?>">
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_activity_card_list->RowCount ?>_view_activity_card_Type" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_activity_card" data-field="x_Type" data-value-separator="<?php echo $view_activity_card_list->Type->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_activity_card_list->RowIndex ?>_Type" name="x<?php echo $view_activity_card_list->RowIndex ?>_Type"<?php echo $view_activity_card_list->Type->editAttributes() ?>>
			<?php echo $view_activity_card_list->Type->selectOptionListHtml("x{$view_activity_card_list->RowIndex}_Type") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_activity_card_list->RowCount ?>_view_activity_card_Type">
<span<?php echo $view_activity_card_list->Type->viewAttributes() ?>><?php echo $view_activity_card_list->Type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_activity_card_list->Selected->Visible) { // Selected ?>
		<td data-name="Selected" <?php echo $view_activity_card_list->Selected->cellAttributes() ?>>
<?php if ($view_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_activity_card_list->RowCount ?>_view_activity_card_Selected" class="form-group">
<div id="tp_x<?php echo $view_activity_card_list->RowIndex ?>_Selected" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_activity_card" data-field="x_Selected" data-value-separator="<?php echo $view_activity_card_list->Selected->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" id="x<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" value="{value}"<?php echo $view_activity_card_list->Selected->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_activity_card_list->RowIndex ?>_Selected" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_activity_card_list->Selected->checkBoxListHtml(FALSE, "x{$view_activity_card_list->RowIndex}_Selected[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Selected" name="o<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" id="o<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" value="<?php echo HtmlEncode($view_activity_card_list->Selected->OldValue) ?>">
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_activity_card_list->RowCount ?>_view_activity_card_Selected" class="form-group">
<div id="tp_x<?php echo $view_activity_card_list->RowIndex ?>_Selected" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_activity_card" data-field="x_Selected" data-value-separator="<?php echo $view_activity_card_list->Selected->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" id="x<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" value="{value}"<?php echo $view_activity_card_list->Selected->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_activity_card_list->RowIndex ?>_Selected" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_activity_card_list->Selected->checkBoxListHtml(FALSE, "x{$view_activity_card_list->RowIndex}_Selected[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_activity_card_list->RowCount ?>_view_activity_card_Selected">
<span<?php echo $view_activity_card_list->Selected->viewAttributes() ?>><?php echo $view_activity_card_list->Selected->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_activity_card_list->Units->Visible) { // Units ?>
		<td data-name="Units" <?php echo $view_activity_card_list->Units->cellAttributes() ?>>
<?php if ($view_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_activity_card_list->RowCount ?>_view_activity_card_Units" class="form-group">
<input type="text" data-table="view_activity_card" data-field="x_Units" name="x<?php echo $view_activity_card_list->RowIndex ?>_Units" id="x<?php echo $view_activity_card_list->RowIndex ?>_Units" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_activity_card_list->Units->getPlaceHolder()) ?>" value="<?php echo $view_activity_card_list->Units->EditValue ?>"<?php echo $view_activity_card_list->Units->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Units" name="o<?php echo $view_activity_card_list->RowIndex ?>_Units" id="o<?php echo $view_activity_card_list->RowIndex ?>_Units" value="<?php echo HtmlEncode($view_activity_card_list->Units->OldValue) ?>">
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_activity_card_list->RowCount ?>_view_activity_card_Units" class="form-group">
<input type="text" data-table="view_activity_card" data-field="x_Units" name="x<?php echo $view_activity_card_list->RowIndex ?>_Units" id="x<?php echo $view_activity_card_list->RowIndex ?>_Units" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_activity_card_list->Units->getPlaceHolder()) ?>" value="<?php echo $view_activity_card_list->Units->EditValue ?>"<?php echo $view_activity_card_list->Units->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_activity_card_list->RowCount ?>_view_activity_card_Units">
<span<?php echo $view_activity_card_list->Units->viewAttributes() ?>><?php echo $view_activity_card_list->Units->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_activity_card_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $view_activity_card_list->Amount->cellAttributes() ?>>
<?php if ($view_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_activity_card_list->RowCount ?>_view_activity_card_Amount" class="form-group">
<input type="text" data-table="view_activity_card" data-field="x_Amount" name="x<?php echo $view_activity_card_list->RowIndex ?>_Amount" id="x<?php echo $view_activity_card_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_activity_card_list->Amount->getPlaceHolder()) ?>" value="<?php echo $view_activity_card_list->Amount->EditValue ?>"<?php echo $view_activity_card_list->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Amount" name="o<?php echo $view_activity_card_list->RowIndex ?>_Amount" id="o<?php echo $view_activity_card_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_activity_card_list->Amount->OldValue) ?>">
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_activity_card_list->RowCount ?>_view_activity_card_Amount" class="form-group">
<input type="text" data-table="view_activity_card" data-field="x_Amount" name="x<?php echo $view_activity_card_list->RowIndex ?>_Amount" id="x<?php echo $view_activity_card_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_activity_card_list->Amount->getPlaceHolder()) ?>" value="<?php echo $view_activity_card_list->Amount->EditValue ?>"<?php echo $view_activity_card_list->Amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_activity_card_list->RowCount ?>_view_activity_card_Amount">
<span<?php echo $view_activity_card_list->Amount->viewAttributes() ?>><?php echo $view_activity_card_list->Amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_activity_card_list->ListOptions->render("body", "right", $view_activity_card_list->RowCount);
?>
	</tr>
<?php if ($view_activity_card->RowType == ROWTYPE_ADD || $view_activity_card->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_activity_cardlist", "load"], function() {
	fview_activity_cardlist.updateLists(<?php echo $view_activity_card_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_activity_card_list->isGridAdd())
		if (!$view_activity_card_list->Recordset->EOF)
			$view_activity_card_list->Recordset->moveNext();
}
?>
<?php
	if ($view_activity_card_list->isGridAdd() || $view_activity_card_list->isGridEdit()) {
		$view_activity_card_list->RowIndex = '$rowindex$';
		$view_activity_card_list->loadRowValues();

		// Set row properties
		$view_activity_card->resetAttributes();
		$view_activity_card->RowAttrs->merge(["data-rowindex" => $view_activity_card_list->RowIndex, "id" => "r0_view_activity_card", "data-rowtype" => ROWTYPE_ADD]);
		$view_activity_card->RowAttrs->appendClass("ew-template");
		$view_activity_card->RowType = ROWTYPE_ADD;

		// Render row
		$view_activity_card_list->renderRow();

		// Render list options
		$view_activity_card_list->renderListOptions();
		$view_activity_card_list->StartRowCount = 0;
?>
	<tr <?php echo $view_activity_card->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_activity_card_list->ListOptions->render("body", "left", $view_activity_card_list->RowIndex);
?>
	<?php if ($view_activity_card_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_view_activity_card_id" class="form-group view_activity_card_id"></span>
<input type="hidden" data-table="view_activity_card" data-field="x_id" name="o<?php echo $view_activity_card_list->RowIndex ?>_id" id="o<?php echo $view_activity_card_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_activity_card_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_activity_card_list->Activity->Visible) { // Activity ?>
		<td data-name="Activity">
<span id="el$rowindex$_view_activity_card_Activity" class="form-group view_activity_card_Activity">
<input type="text" data-table="view_activity_card" data-field="x_Activity" name="x<?php echo $view_activity_card_list->RowIndex ?>_Activity" id="x<?php echo $view_activity_card_list->RowIndex ?>_Activity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_activity_card_list->Activity->getPlaceHolder()) ?>" value="<?php echo $view_activity_card_list->Activity->EditValue ?>"<?php echo $view_activity_card_list->Activity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Activity" name="o<?php echo $view_activity_card_list->RowIndex ?>_Activity" id="o<?php echo $view_activity_card_list->RowIndex ?>_Activity" value="<?php echo HtmlEncode($view_activity_card_list->Activity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_activity_card_list->Type->Visible) { // Type ?>
		<td data-name="Type">
<span id="el$rowindex$_view_activity_card_Type" class="form-group view_activity_card_Type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_activity_card" data-field="x_Type" data-value-separator="<?php echo $view_activity_card_list->Type->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_activity_card_list->RowIndex ?>_Type" name="x<?php echo $view_activity_card_list->RowIndex ?>_Type"<?php echo $view_activity_card_list->Type->editAttributes() ?>>
			<?php echo $view_activity_card_list->Type->selectOptionListHtml("x{$view_activity_card_list->RowIndex}_Type") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Type" name="o<?php echo $view_activity_card_list->RowIndex ?>_Type" id="o<?php echo $view_activity_card_list->RowIndex ?>_Type" value="<?php echo HtmlEncode($view_activity_card_list->Type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_activity_card_list->Selected->Visible) { // Selected ?>
		<td data-name="Selected">
<span id="el$rowindex$_view_activity_card_Selected" class="form-group view_activity_card_Selected">
<div id="tp_x<?php echo $view_activity_card_list->RowIndex ?>_Selected" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_activity_card" data-field="x_Selected" data-value-separator="<?php echo $view_activity_card_list->Selected->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" id="x<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" value="{value}"<?php echo $view_activity_card_list->Selected->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_activity_card_list->RowIndex ?>_Selected" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_activity_card_list->Selected->checkBoxListHtml(FALSE, "x{$view_activity_card_list->RowIndex}_Selected[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Selected" name="o<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" id="o<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" value="<?php echo HtmlEncode($view_activity_card_list->Selected->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_activity_card_list->Units->Visible) { // Units ?>
		<td data-name="Units">
<span id="el$rowindex$_view_activity_card_Units" class="form-group view_activity_card_Units">
<input type="text" data-table="view_activity_card" data-field="x_Units" name="x<?php echo $view_activity_card_list->RowIndex ?>_Units" id="x<?php echo $view_activity_card_list->RowIndex ?>_Units" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_activity_card_list->Units->getPlaceHolder()) ?>" value="<?php echo $view_activity_card_list->Units->EditValue ?>"<?php echo $view_activity_card_list->Units->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Units" name="o<?php echo $view_activity_card_list->RowIndex ?>_Units" id="o<?php echo $view_activity_card_list->RowIndex ?>_Units" value="<?php echo HtmlEncode($view_activity_card_list->Units->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_activity_card_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<span id="el$rowindex$_view_activity_card_Amount" class="form-group view_activity_card_Amount">
<input type="text" data-table="view_activity_card" data-field="x_Amount" name="x<?php echo $view_activity_card_list->RowIndex ?>_Amount" id="x<?php echo $view_activity_card_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_activity_card_list->Amount->getPlaceHolder()) ?>" value="<?php echo $view_activity_card_list->Amount->EditValue ?>"<?php echo $view_activity_card_list->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Amount" name="o<?php echo $view_activity_card_list->RowIndex ?>_Amount" id="o<?php echo $view_activity_card_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_activity_card_list->Amount->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_activity_card_list->ListOptions->render("body", "right", $view_activity_card_list->RowIndex);
?>
<script>
loadjs.ready(["fview_activity_cardlist", "load"], function() {
	fview_activity_cardlist.updateLists(<?php echo $view_activity_card_list->RowIndex ?>);
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
<?php if ($view_activity_card_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $view_activity_card_list->FormKeyCountName ?>" id="<?php echo $view_activity_card_list->FormKeyCountName ?>" value="<?php echo $view_activity_card_list->KeyCount ?>">
<?php } ?>
<?php if ($view_activity_card_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_activity_card_list->FormKeyCountName ?>" id="<?php echo $view_activity_card_list->FormKeyCountName ?>" value="<?php echo $view_activity_card_list->KeyCount ?>">
<?php echo $view_activity_card_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_activity_card->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_activity_card_list->Recordset)
	$view_activity_card_list->Recordset->Close();
?>
<?php if (!$view_activity_card_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_activity_card_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_activity_card_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_activity_card_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_activity_card_list->TotalRecords == 0 && !$view_activity_card->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_activity_card_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_activity_card_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_activity_card_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_activity_card->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_activity_card",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_activity_card_list->terminate();
?>