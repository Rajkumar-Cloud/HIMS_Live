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
$view_pharmacy_purchase_request_items_approved_list = new view_pharmacy_purchase_request_items_approved_list();

// Run the page
$view_pharmacy_purchase_request_items_approved_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_items_approved_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_pharmacy_purchase_request_items_approved_list->isExport()) { ?>
<script>
var fview_pharmacy_purchase_request_items_approvedlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_pharmacy_purchase_request_items_approvedlist = currentForm = new ew.Form("fview_pharmacy_purchase_request_items_approvedlist", "list");
	fview_pharmacy_purchase_request_items_approvedlist.formKeyCountName = '<?php echo $view_pharmacy_purchase_request_items_approved_list->FormKeyCountName ?>';

	// Validate form
	fview_pharmacy_purchase_request_items_approvedlist.validate = function() {
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
			<?php if ($view_pharmacy_purchase_request_items_approved_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_approved_list->id->caption(), $view_pharmacy_purchase_request_items_approved_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_purchase_request_items_approved_list->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_approved_list->PRC->caption(), $view_pharmacy_purchase_request_items_approved_list->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_purchase_request_items_approved_list->PrName->Required) { ?>
				elm = this.getElements("x" + infix + "_PrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_approved_list->PrName->caption(), $view_pharmacy_purchase_request_items_approved_list->PrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_purchase_request_items_approved_list->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_approved_list->Quantity->caption(), $view_pharmacy_purchase_request_items_approved_list->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_purchase_request_items_approved_list->Quantity->errorMessage()) ?>");
			<?php if ($view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_ApprovedStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->caption(), $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fview_pharmacy_purchase_request_items_approvedlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacy_purchase_request_items_approvedlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_pharmacy_purchase_request_items_approvedlist.lists["x_ApprovedStatus"] = <?php echo $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->Lookup->toClientList($view_pharmacy_purchase_request_items_approved_list) ?>;
	fview_pharmacy_purchase_request_items_approvedlist.lists["x_ApprovedStatus"].options = <?php echo JsonEncode($view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_pharmacy_purchase_request_items_approvedlist");
});
var fview_pharmacy_purchase_request_items_approvedlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_pharmacy_purchase_request_items_approvedlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_purchase_request_items_approvedlistsrch");

	// Dynamic selection lists
	// Filters

	fview_pharmacy_purchase_request_items_approvedlistsrch.filterList = <?php echo $view_pharmacy_purchase_request_items_approved_list->getFilterList() ?>;
	loadjs.done("fview_pharmacy_purchase_request_items_approvedlistsrch");
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
<?php if (!$view_pharmacy_purchase_request_items_approved_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_purchase_request_items_approved_list->TotalRecords > 0 && $view_pharmacy_purchase_request_items_approved_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_items_approved_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_items_approved_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_items_approved_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_items_approved_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_pharmacy_purchase_request_items_approved_list->isExport() || Config("EXPORT_MASTER_RECORD") && $view_pharmacy_purchase_request_items_approved_list->isExport("print")) { ?>
<?php
if ($view_pharmacy_purchase_request_items_approved_list->DbMasterFilter != "" && $view_pharmacy_purchase_request_items_approved->getCurrentMasterTable() == "view_pharmacy_purchase_request_approved") {
	if ($view_pharmacy_purchase_request_items_approved_list->MasterRecordExists) {
		include_once "view_pharmacy_purchase_request_approvedmaster.php";
	}
}
?>
<?php } ?>
<?php
$view_pharmacy_purchase_request_items_approved_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_purchase_request_items_approved_list->isExport() && !$view_pharmacy_purchase_request_items_approved->CurrentAction) { ?>
<form name="fview_pharmacy_purchase_request_items_approvedlistsrch" id="fview_pharmacy_purchase_request_items_approvedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_pharmacy_purchase_request_items_approvedlistsrch-search-panel" class="<?php echo $view_pharmacy_purchase_request_items_approved_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_approved">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_pharmacy_purchase_request_items_approved_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_purchase_request_items_approved_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_items_approved_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_items_approved_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_items_approved_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_items_approved_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_purchase_request_items_approved_list->showPageHeader(); ?>
<?php
$view_pharmacy_purchase_request_items_approved_list->showMessage();
?>
<?php if ($view_pharmacy_purchase_request_items_approved_list->TotalRecords > 0 || $view_pharmacy_purchase_request_items_approved->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_purchase_request_items_approved_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_purchase_request_items_approved">
<?php if (!$view_pharmacy_purchase_request_items_approved_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_purchase_request_items_approved_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacy_purchase_request_items_approved_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_purchase_request_items_approved_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_purchase_request_items_approvedlist" id="fview_pharmacy_purchase_request_items_approvedlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_approved">
<?php if ($view_pharmacy_purchase_request_items_approved->getCurrentMasterTable() == "view_pharmacy_purchase_request_approved" && $view_pharmacy_purchase_request_items_approved->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_pharmacy_purchase_request_approved">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->prid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_pharmacy_purchase_request_items_approved" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_purchase_request_items_approved_list->TotalRecords > 0 || $view_pharmacy_purchase_request_items_approved_list->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_purchase_request_items_approvedlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_purchase_request_items_approved->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_purchase_request_items_approved_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_purchase_request_items_approved_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_purchase_request_items_approved_list->id->Visible) { // id ?>
	<?php if ($view_pharmacy_purchase_request_items_approved_list->SortUrl($view_pharmacy_purchase_request_items_approved_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_purchase_request_items_approved_list->id->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_approved_id" class="view_pharmacy_purchase_request_items_approved_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_purchase_request_items_approved_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_purchase_request_items_approved_list->SortUrl($view_pharmacy_purchase_request_items_approved_list->id) ?>', 1);"><div id="elh_view_pharmacy_purchase_request_items_approved_id" class="view_pharmacy_purchase_request_items_approved_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_approved_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_list->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_purchase_request_items_approved_list->SortUrl($view_pharmacy_purchase_request_items_approved_list->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_purchase_request_items_approved_list->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_approved_PRC" class="view_pharmacy_purchase_request_items_approved_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved_list->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_purchase_request_items_approved_list->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_purchase_request_items_approved_list->SortUrl($view_pharmacy_purchase_request_items_approved_list->PRC) ?>', 1);"><div id="elh_view_pharmacy_purchase_request_items_approved_PRC" class="view_pharmacy_purchase_request_items_approved_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved_list->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved_list->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_approved_list->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_list->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_purchase_request_items_approved_list->SortUrl($view_pharmacy_purchase_request_items_approved_list->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_purchase_request_items_approved_list->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_approved_PrName" class="view_pharmacy_purchase_request_items_approved_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved_list->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_purchase_request_items_approved_list->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_purchase_request_items_approved_list->SortUrl($view_pharmacy_purchase_request_items_approved_list->PrName) ?>', 1);"><div id="elh_view_pharmacy_purchase_request_items_approved_PrName" class="view_pharmacy_purchase_request_items_approved_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved_list->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved_list->PrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_approved_list->PrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_list->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacy_purchase_request_items_approved_list->SortUrl($view_pharmacy_purchase_request_items_approved_list->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacy_purchase_request_items_approved_list->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_approved_Quantity" class="view_pharmacy_purchase_request_items_approved_Quantity"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved_list->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacy_purchase_request_items_approved_list->Quantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_purchase_request_items_approved_list->SortUrl($view_pharmacy_purchase_request_items_approved_list->Quantity) ?>', 1);"><div id="elh_view_pharmacy_purchase_request_items_approved_Quantity" class="view_pharmacy_purchase_request_items_approved_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved_list->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved_list->Quantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_approved_list->Quantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<?php if ($view_pharmacy_purchase_request_items_approved_list->SortUrl($view_pharmacy_purchase_request_items_approved_list->ApprovedStatus) == "") { ?>
		<th data-name="ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="view_pharmacy_purchase_request_items_approved_ApprovedStatus"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_purchase_request_items_approved_list->SortUrl($view_pharmacy_purchase_request_items_approved_list->ApprovedStatus) ?>', 1);"><div id="elh_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="view_pharmacy_purchase_request_items_approved_ApprovedStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_purchase_request_items_approved_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_purchase_request_items_approved_list->ExportAll && $view_pharmacy_purchase_request_items_approved_list->isExport()) {
	$view_pharmacy_purchase_request_items_approved_list->StopRecord = $view_pharmacy_purchase_request_items_approved_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_pharmacy_purchase_request_items_approved_list->TotalRecords > $view_pharmacy_purchase_request_items_approved_list->StartRecord + $view_pharmacy_purchase_request_items_approved_list->DisplayRecords - 1)
		$view_pharmacy_purchase_request_items_approved_list->StopRecord = $view_pharmacy_purchase_request_items_approved_list->StartRecord + $view_pharmacy_purchase_request_items_approved_list->DisplayRecords - 1;
	else
		$view_pharmacy_purchase_request_items_approved_list->StopRecord = $view_pharmacy_purchase_request_items_approved_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($view_pharmacy_purchase_request_items_approved->isConfirm() || $view_pharmacy_purchase_request_items_approved_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_pharmacy_purchase_request_items_approved_list->FormKeyCountName) && ($view_pharmacy_purchase_request_items_approved_list->isGridAdd() || $view_pharmacy_purchase_request_items_approved_list->isGridEdit() || $view_pharmacy_purchase_request_items_approved->isConfirm())) {
		$view_pharmacy_purchase_request_items_approved_list->KeyCount = $CurrentForm->getValue($view_pharmacy_purchase_request_items_approved_list->FormKeyCountName);
		$view_pharmacy_purchase_request_items_approved_list->StopRecord = $view_pharmacy_purchase_request_items_approved_list->StartRecord + $view_pharmacy_purchase_request_items_approved_list->KeyCount - 1;
	}
}
$view_pharmacy_purchase_request_items_approved_list->RecordCount = $view_pharmacy_purchase_request_items_approved_list->StartRecord - 1;
if ($view_pharmacy_purchase_request_items_approved_list->Recordset && !$view_pharmacy_purchase_request_items_approved_list->Recordset->EOF) {
	$view_pharmacy_purchase_request_items_approved_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_purchase_request_items_approved_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_purchase_request_items_approved_list->StartRecord > 1)
		$view_pharmacy_purchase_request_items_approved_list->Recordset->move($view_pharmacy_purchase_request_items_approved_list->StartRecord - 1);
} elseif (!$view_pharmacy_purchase_request_items_approved->AllowAddDeleteRow && $view_pharmacy_purchase_request_items_approved_list->StopRecord == 0) {
	$view_pharmacy_purchase_request_items_approved_list->StopRecord = $view_pharmacy_purchase_request_items_approved->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_purchase_request_items_approved->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_purchase_request_items_approved->resetAttributes();
$view_pharmacy_purchase_request_items_approved_list->renderRow();
if ($view_pharmacy_purchase_request_items_approved_list->isGridEdit())
	$view_pharmacy_purchase_request_items_approved_list->RowIndex = 0;
while ($view_pharmacy_purchase_request_items_approved_list->RecordCount < $view_pharmacy_purchase_request_items_approved_list->StopRecord) {
	$view_pharmacy_purchase_request_items_approved_list->RecordCount++;
	if ($view_pharmacy_purchase_request_items_approved_list->RecordCount >= $view_pharmacy_purchase_request_items_approved_list->StartRecord) {
		$view_pharmacy_purchase_request_items_approved_list->RowCount++;
		if ($view_pharmacy_purchase_request_items_approved_list->isGridAdd() || $view_pharmacy_purchase_request_items_approved_list->isGridEdit() || $view_pharmacy_purchase_request_items_approved->isConfirm()) {
			$view_pharmacy_purchase_request_items_approved_list->RowIndex++;
			$CurrentForm->Index = $view_pharmacy_purchase_request_items_approved_list->RowIndex;
			if ($CurrentForm->hasValue($view_pharmacy_purchase_request_items_approved_list->FormActionName) && ($view_pharmacy_purchase_request_items_approved->isConfirm() || $view_pharmacy_purchase_request_items_approved_list->EventCancelled))
				$view_pharmacy_purchase_request_items_approved_list->RowAction = strval($CurrentForm->getValue($view_pharmacy_purchase_request_items_approved_list->FormActionName));
			elseif ($view_pharmacy_purchase_request_items_approved_list->isGridAdd())
				$view_pharmacy_purchase_request_items_approved_list->RowAction = "insert";
			else
				$view_pharmacy_purchase_request_items_approved_list->RowAction = "";
		}

		// Set up key count
		$view_pharmacy_purchase_request_items_approved_list->KeyCount = $view_pharmacy_purchase_request_items_approved_list->RowIndex;

		// Init row class and style
		$view_pharmacy_purchase_request_items_approved->resetAttributes();
		$view_pharmacy_purchase_request_items_approved->CssClass = "";
		if ($view_pharmacy_purchase_request_items_approved_list->isGridAdd()) {
			$view_pharmacy_purchase_request_items_approved_list->loadRowValues(); // Load default values
		} else {
			$view_pharmacy_purchase_request_items_approved_list->loadRowValues($view_pharmacy_purchase_request_items_approved_list->Recordset); // Load row values
		}
		$view_pharmacy_purchase_request_items_approved->RowType = ROWTYPE_VIEW; // Render view
		if ($view_pharmacy_purchase_request_items_approved_list->isGridEdit()) { // Grid edit
			if ($view_pharmacy_purchase_request_items_approved->EventCancelled)
				$view_pharmacy_purchase_request_items_approved_list->restoreCurrentRowFormValues($view_pharmacy_purchase_request_items_approved_list->RowIndex); // Restore form values
			if ($view_pharmacy_purchase_request_items_approved_list->RowAction == "insert")
				$view_pharmacy_purchase_request_items_approved->RowType = ROWTYPE_ADD; // Render add
			else
				$view_pharmacy_purchase_request_items_approved->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_pharmacy_purchase_request_items_approved_list->isGridEdit() && ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_EDIT || $view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_ADD) && $view_pharmacy_purchase_request_items_approved->EventCancelled) // Update failed
			$view_pharmacy_purchase_request_items_approved_list->restoreCurrentRowFormValues($view_pharmacy_purchase_request_items_approved_list->RowIndex); // Restore form values
		if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_EDIT) // Edit row
			$view_pharmacy_purchase_request_items_approved_list->EditRowCount++;

		// Set up row id / data-rowindex
		$view_pharmacy_purchase_request_items_approved->RowAttrs->merge(["data-rowindex" => $view_pharmacy_purchase_request_items_approved_list->RowCount, "id" => "r" . $view_pharmacy_purchase_request_items_approved_list->RowCount . "_view_pharmacy_purchase_request_items_approved", "data-rowtype" => $view_pharmacy_purchase_request_items_approved->RowType]);

		// Render row
		$view_pharmacy_purchase_request_items_approved_list->renderRow();

		// Render list options
		$view_pharmacy_purchase_request_items_approved_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_pharmacy_purchase_request_items_approved_list->RowAction != "delete" && $view_pharmacy_purchase_request_items_approved_list->RowAction != "insertdelete" && !($view_pharmacy_purchase_request_items_approved_list->RowAction == "insert" && $view_pharmacy_purchase_request_items_approved->isConfirm() && $view_pharmacy_purchase_request_items_approved_list->emptyRow())) {
?>
	<tr <?php echo $view_pharmacy_purchase_request_items_approved->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_purchase_request_items_approved_list->ListOptions->render("body", "left", $view_pharmacy_purchase_request_items_approved_list->RowCount);
?>
	<?php if ($view_pharmacy_purchase_request_items_approved_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_pharmacy_purchase_request_items_approved_list->id->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_list->RowCount ?>_view_pharmacy_purchase_request_items_approved_id" class="form-group"></span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_id" name="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_id" id="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->id->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_list->RowCount ?>_view_pharmacy_purchase_request_items_approved_id" class="form-group">
<span<?php echo $view_pharmacy_purchase_request_items_approved_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_approved_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_id" name="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_id" id="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_list->RowCount ?>_view_pharmacy_purchase_request_items_approved_id">
<span<?php echo $view_pharmacy_purchase_request_items_approved_list->id->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_approved_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $view_pharmacy_purchase_request_items_approved_list->PRC->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_list->RowCount ?>_view_pharmacy_purchase_request_items_approved_PRC" class="form-group">
<input type="text" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_approved_list->PRC->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_approved_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" name="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->PRC->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_list->RowCount ?>_view_pharmacy_purchase_request_items_approved_PRC" class="form-group">
<span<?php echo $view_pharmacy_purchase_request_items_approved_list->PRC->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_approved_list->PRC->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->PRC->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_list->RowCount ?>_view_pharmacy_purchase_request_items_approved_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_approved_list->PRC->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_list->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_approved_list->PrName->Visible) { // PrName ?>
		<td data-name="PrName" <?php echo $view_pharmacy_purchase_request_items_approved_list->PrName->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_list->RowCount ?>_view_pharmacy_purchase_request_items_approved_PrName" class="form-group">
<input type="text" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PrName" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_approved_list->PrName->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_approved_list->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" name="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->PrName->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_list->RowCount ?>_view_pharmacy_purchase_request_items_approved_PrName" class="form-group">
<span<?php echo $view_pharmacy_purchase_request_items_approved_list->PrName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_approved_list->PrName->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->PrName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_list->RowCount ?>_view_pharmacy_purchase_request_items_approved_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_approved_list->PrName->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_list->PrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_approved_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" <?php echo $view_pharmacy_purchase_request_items_approved_list->Quantity->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_list->RowCount ?>_view_pharmacy_purchase_request_items_approved_Quantity" class="form-group">
<input type="text" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_approved_list->Quantity->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_approved_list->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" name="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_list->RowCount ?>_view_pharmacy_purchase_request_items_approved_Quantity" class="form-group">
<input type="text" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_approved_list->Quantity->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_approved_list->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_list->RowCount ?>_view_pharmacy_purchase_request_items_approved_Quantity">
<span<?php echo $view_pharmacy_purchase_request_items_approved_list->Quantity->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_list->Quantity->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td data-name="ApprovedStatus" <?php echo $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_list->RowCount ?>_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_ApprovedStatus" data-value-separator="<?php echo $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_ApprovedStatus"<?php echo $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->editAttributes() ?>>
			<?php echo $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->selectOptionListHtml("x{$view_pharmacy_purchase_request_items_approved_list->RowIndex}_ApprovedStatus") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_ApprovedStatus" name="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_ApprovedStatus" id="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_list->RowCount ?>_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_ApprovedStatus" data-value-separator="<?php echo $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_ApprovedStatus"<?php echo $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->editAttributes() ?>>
			<?php echo $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->selectOptionListHtml("x{$view_pharmacy_purchase_request_items_approved_list->RowIndex}_ApprovedStatus") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_list->RowCount ?>_view_pharmacy_purchase_request_items_approved_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_purchase_request_items_approved_list->ListOptions->render("body", "right", $view_pharmacy_purchase_request_items_approved_list->RowCount);
?>
	</tr>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_ADD || $view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_pharmacy_purchase_request_items_approvedlist", "load"], function() {
	fview_pharmacy_purchase_request_items_approvedlist.updateLists(<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_pharmacy_purchase_request_items_approved_list->isGridAdd())
		if (!$view_pharmacy_purchase_request_items_approved_list->Recordset->EOF)
			$view_pharmacy_purchase_request_items_approved_list->Recordset->moveNext();
}
?>
<?php
	if ($view_pharmacy_purchase_request_items_approved_list->isGridAdd() || $view_pharmacy_purchase_request_items_approved_list->isGridEdit()) {
		$view_pharmacy_purchase_request_items_approved_list->RowIndex = '$rowindex$';
		$view_pharmacy_purchase_request_items_approved_list->loadRowValues();

		// Set row properties
		$view_pharmacy_purchase_request_items_approved->resetAttributes();
		$view_pharmacy_purchase_request_items_approved->RowAttrs->merge(["data-rowindex" => $view_pharmacy_purchase_request_items_approved_list->RowIndex, "id" => "r0_view_pharmacy_purchase_request_items_approved", "data-rowtype" => ROWTYPE_ADD]);
		$view_pharmacy_purchase_request_items_approved->RowAttrs->appendClass("ew-template");
		$view_pharmacy_purchase_request_items_approved->RowType = ROWTYPE_ADD;

		// Render row
		$view_pharmacy_purchase_request_items_approved_list->renderRow();

		// Render list options
		$view_pharmacy_purchase_request_items_approved_list->renderListOptions();
		$view_pharmacy_purchase_request_items_approved_list->StartRowCount = 0;
?>
	<tr <?php echo $view_pharmacy_purchase_request_items_approved->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_purchase_request_items_approved_list->ListOptions->render("body", "left", $view_pharmacy_purchase_request_items_approved_list->RowIndex);
?>
	<?php if ($view_pharmacy_purchase_request_items_approved_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_id" class="form-group view_pharmacy_purchase_request_items_approved_id"></span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_id" name="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_id" id="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_approved_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_PRC" class="form-group view_pharmacy_purchase_request_items_approved_PRC">
<input type="text" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_approved_list->PRC->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_approved_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" name="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_approved_list->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_PrName" class="form-group view_pharmacy_purchase_request_items_approved_PrName">
<input type="text" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PrName" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_approved_list->PrName->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_approved_list->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" name="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_approved_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_Quantity" class="form-group view_pharmacy_purchase_request_items_approved_Quantity">
<input type="text" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_approved_list->Quantity->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_approved_list->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" name="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td data-name="ApprovedStatus">
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="form-group view_pharmacy_purchase_request_items_approved_ApprovedStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_ApprovedStatus" data-value-separator="<?php echo $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_ApprovedStatus"<?php echo $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->editAttributes() ?>>
			<?php echo $view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->selectOptionListHtml("x{$view_pharmacy_purchase_request_items_approved_list->RowIndex}_ApprovedStatus") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_ApprovedStatus" name="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_ApprovedStatus" id="o<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved_list->ApprovedStatus->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_purchase_request_items_approved_list->ListOptions->render("body", "right", $view_pharmacy_purchase_request_items_approved_list->RowIndex);
?>
<script>
loadjs.ready(["fview_pharmacy_purchase_request_items_approvedlist", "load"], function() {
	fview_pharmacy_purchase_request_items_approvedlist.updateLists(<?php echo $view_pharmacy_purchase_request_items_approved_list->RowIndex ?>);
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
<?php if ($view_pharmacy_purchase_request_items_approved_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_pharmacy_purchase_request_items_approved_list->FormKeyCountName ?>" id="<?php echo $view_pharmacy_purchase_request_items_approved_list->FormKeyCountName ?>" value="<?php echo $view_pharmacy_purchase_request_items_approved_list->KeyCount ?>">
<?php echo $view_pharmacy_purchase_request_items_approved_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_pharmacy_purchase_request_items_approved->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_purchase_request_items_approved_list->Recordset)
	$view_pharmacy_purchase_request_items_approved_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_purchase_request_items_approved_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_purchase_request_items_approved_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacy_purchase_request_items_approved_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_purchase_request_items_approved_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_list->TotalRecords == 0 && !$view_pharmacy_purchase_request_items_approved->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_purchase_request_items_approved_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_purchase_request_items_approved_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_purchase_request_items_approved_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_pharmacy_purchase_request_items_approved->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_pharmacy_purchase_request_items_approved",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_pharmacy_purchase_request_items_approved_list->terminate();
?>