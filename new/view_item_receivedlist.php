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
$view_item_received_list = new view_item_received_list();

// Run the page
$view_item_received_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_item_received_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_item_received_list->isExport()) { ?>
<script>
var fview_item_receivedlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_item_receivedlist = currentForm = new ew.Form("fview_item_receivedlist", "list");
	fview_item_receivedlist.formKeyCountName = '<?php echo $view_item_received_list->FormKeyCountName ?>';

	// Validate form
	fview_item_receivedlist.validate = function() {
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
			<?php if ($view_item_received_list->ORDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_ORDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received_list->ORDNO->caption(), $view_item_received_list->ORDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_item_received_list->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received_list->BRCODE->caption(), $view_item_received_list->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_item_received_list->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received_list->PRC->caption(), $view_item_received_list->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_item_received_list->PrName->Required) { ?>
				elm = this.getElements("x" + infix + "_PrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received_list->PrName->caption(), $view_item_received_list->PrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_item_received_list->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received_list->MFRCODE->caption(), $view_item_received_list->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_item_received_list->BatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_BatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received_list->BatchNo->caption(), $view_item_received_list->BatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_item_received_list->BillDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received_list->BillDate->caption(), $view_item_received_list->BillDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_item_received_list->ExpDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ExpDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received_list->ExpDate->caption(), $view_item_received_list->ExpDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_item_received_list->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received_list->Quantity->caption(), $view_item_received_list->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_item_received_list->FreeQty->Required) { ?>
				elm = this.getElements("x" + infix + "_FreeQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received_list->FreeQty->caption(), $view_item_received_list->FreeQty->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_item_received_list->ItemValue->Required) { ?>
				elm = this.getElements("x" + infix + "_ItemValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received_list->ItemValue->caption(), $view_item_received_list->ItemValue->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_item_received_list->Received->Required) { ?>
				elm = this.getElements("x" + infix + "_Received[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received_list->Received->caption(), $view_item_received_list->Received->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_item_received_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received_list->id->caption(), $view_item_received_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fview_item_receivedlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_item_receivedlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_item_receivedlist.lists["x_ORDNO"] = <?php echo $view_item_received_list->ORDNO->Lookup->toClientList($view_item_received_list) ?>;
	fview_item_receivedlist.lists["x_ORDNO"].options = <?php echo JsonEncode($view_item_received_list->ORDNO->lookupOptions()) ?>;
	fview_item_receivedlist.lists["x_BRCODE"] = <?php echo $view_item_received_list->BRCODE->Lookup->toClientList($view_item_received_list) ?>;
	fview_item_receivedlist.lists["x_BRCODE"].options = <?php echo JsonEncode($view_item_received_list->BRCODE->lookupOptions()) ?>;
	fview_item_receivedlist.lists["x_Received[]"] = <?php echo $view_item_received_list->Received->Lookup->toClientList($view_item_received_list) ?>;
	fview_item_receivedlist.lists["x_Received[]"].options = <?php echo JsonEncode($view_item_received_list->Received->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_item_receivedlist");
});
var fview_item_receivedlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_item_receivedlistsrch = currentSearchForm = new ew.Form("fview_item_receivedlistsrch");

	// Dynamic selection lists
	// Filters

	fview_item_receivedlistsrch.filterList = <?php echo $view_item_received_list->getFilterList() ?>;
	loadjs.done("fview_item_receivedlistsrch");
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
<?php if (!$view_item_received_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_item_received_list->TotalRecords > 0 && $view_item_received_list->ExportOptions->visible()) { ?>
<?php $view_item_received_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_item_received_list->ImportOptions->visible()) { ?>
<?php $view_item_received_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_item_received_list->SearchOptions->visible()) { ?>
<?php $view_item_received_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_item_received_list->FilterOptions->visible()) { ?>
<?php $view_item_received_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_item_received_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_item_received_list->isExport() && !$view_item_received->CurrentAction) { ?>
<form name="fview_item_receivedlistsrch" id="fview_item_receivedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_item_receivedlistsrch-search-panel" class="<?php echo $view_item_received_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_item_received">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_item_received_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_item_received_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_item_received_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_item_received_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_item_received_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_item_received_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_item_received_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_item_received_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_item_received_list->showPageHeader(); ?>
<?php
$view_item_received_list->showMessage();
?>
<?php if ($view_item_received_list->TotalRecords > 0 || $view_item_received->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_item_received_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_item_received">
<?php if (!$view_item_received_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_item_received_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_item_received_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_item_received_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_item_receivedlist" id="fview_item_receivedlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_item_received">
<div id="gmp_view_item_received" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_item_received_list->TotalRecords > 0 || $view_item_received_list->isGridEdit()) { ?>
<table id="tbl_view_item_receivedlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_item_received->RowType = ROWTYPE_HEADER;

// Render list options
$view_item_received_list->renderListOptions();

// Render list options (header, left)
$view_item_received_list->ListOptions->render("header", "left");
?>
<?php if ($view_item_received_list->ORDNO->Visible) { // ORDNO ?>
	<?php if ($view_item_received_list->SortUrl($view_item_received_list->ORDNO) == "") { ?>
		<th data-name="ORDNO" class="<?php echo $view_item_received_list->ORDNO->headerCellClass() ?>"><div id="elh_view_item_received_ORDNO" class="view_item_received_ORDNO"><div class="ew-table-header-caption"><?php echo $view_item_received_list->ORDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ORDNO" class="<?php echo $view_item_received_list->ORDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_item_received_list->SortUrl($view_item_received_list->ORDNO) ?>', 1);"><div id="elh_view_item_received_ORDNO" class="view_item_received_ORDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received_list->ORDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_item_received_list->ORDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_item_received_list->ORDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received_list->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_item_received_list->SortUrl($view_item_received_list->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_item_received_list->BRCODE->headerCellClass() ?>"><div id="elh_view_item_received_BRCODE" class="view_item_received_BRCODE"><div class="ew-table-header-caption"><?php echo $view_item_received_list->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_item_received_list->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_item_received_list->SortUrl($view_item_received_list->BRCODE) ?>', 1);"><div id="elh_view_item_received_BRCODE" class="view_item_received_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received_list->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_item_received_list->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_item_received_list->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received_list->PRC->Visible) { // PRC ?>
	<?php if ($view_item_received_list->SortUrl($view_item_received_list->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_item_received_list->PRC->headerCellClass() ?>"><div id="elh_view_item_received_PRC" class="view_item_received_PRC"><div class="ew-table-header-caption"><?php echo $view_item_received_list->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_item_received_list->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_item_received_list->SortUrl($view_item_received_list->PRC) ?>', 1);"><div id="elh_view_item_received_PRC" class="view_item_received_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received_list->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_item_received_list->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_item_received_list->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received_list->PrName->Visible) { // PrName ?>
	<?php if ($view_item_received_list->SortUrl($view_item_received_list->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_item_received_list->PrName->headerCellClass() ?>"><div id="elh_view_item_received_PrName" class="view_item_received_PrName"><div class="ew-table-header-caption"><?php echo $view_item_received_list->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_item_received_list->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_item_received_list->SortUrl($view_item_received_list->PrName) ?>', 1);"><div id="elh_view_item_received_PrName" class="view_item_received_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received_list->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_item_received_list->PrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_item_received_list->PrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received_list->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_item_received_list->SortUrl($view_item_received_list->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_item_received_list->MFRCODE->headerCellClass() ?>"><div id="elh_view_item_received_MFRCODE" class="view_item_received_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_item_received_list->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_item_received_list->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_item_received_list->SortUrl($view_item_received_list->MFRCODE) ?>', 1);"><div id="elh_view_item_received_MFRCODE" class="view_item_received_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received_list->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_item_received_list->MFRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_item_received_list->MFRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received_list->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_item_received_list->SortUrl($view_item_received_list->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $view_item_received_list->BatchNo->headerCellClass() ?>"><div id="elh_view_item_received_BatchNo" class="view_item_received_BatchNo"><div class="ew-table-header-caption"><?php echo $view_item_received_list->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $view_item_received_list->BatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_item_received_list->SortUrl($view_item_received_list->BatchNo) ?>', 1);"><div id="elh_view_item_received_BatchNo" class="view_item_received_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received_list->BatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_item_received_list->BatchNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_item_received_list->BatchNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received_list->BillDate->Visible) { // BillDate ?>
	<?php if ($view_item_received_list->SortUrl($view_item_received_list->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $view_item_received_list->BillDate->headerCellClass() ?>"><div id="elh_view_item_received_BillDate" class="view_item_received_BillDate"><div class="ew-table-header-caption"><?php echo $view_item_received_list->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $view_item_received_list->BillDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_item_received_list->SortUrl($view_item_received_list->BillDate) ?>', 1);"><div id="elh_view_item_received_BillDate" class="view_item_received_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received_list->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_item_received_list->BillDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_item_received_list->BillDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received_list->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_item_received_list->SortUrl($view_item_received_list->ExpDate) == "") { ?>
		<th data-name="ExpDate" class="<?php echo $view_item_received_list->ExpDate->headerCellClass() ?>"><div id="elh_view_item_received_ExpDate" class="view_item_received_ExpDate"><div class="ew-table-header-caption"><?php echo $view_item_received_list->ExpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpDate" class="<?php echo $view_item_received_list->ExpDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_item_received_list->SortUrl($view_item_received_list->ExpDate) ?>', 1);"><div id="elh_view_item_received_ExpDate" class="view_item_received_ExpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received_list->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_item_received_list->ExpDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_item_received_list->ExpDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received_list->Quantity->Visible) { // Quantity ?>
	<?php if ($view_item_received_list->SortUrl($view_item_received_list->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_item_received_list->Quantity->headerCellClass() ?>"><div id="elh_view_item_received_Quantity" class="view_item_received_Quantity"><div class="ew-table-header-caption"><?php echo $view_item_received_list->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_item_received_list->Quantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_item_received_list->SortUrl($view_item_received_list->Quantity) ?>', 1);"><div id="elh_view_item_received_Quantity" class="view_item_received_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received_list->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_item_received_list->Quantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_item_received_list->Quantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received_list->FreeQty->Visible) { // FreeQty ?>
	<?php if ($view_item_received_list->SortUrl($view_item_received_list->FreeQty) == "") { ?>
		<th data-name="FreeQty" class="<?php echo $view_item_received_list->FreeQty->headerCellClass() ?>"><div id="elh_view_item_received_FreeQty" class="view_item_received_FreeQty"><div class="ew-table-header-caption"><?php echo $view_item_received_list->FreeQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQty" class="<?php echo $view_item_received_list->FreeQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_item_received_list->SortUrl($view_item_received_list->FreeQty) ?>', 1);"><div id="elh_view_item_received_FreeQty" class="view_item_received_FreeQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received_list->FreeQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_item_received_list->FreeQty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_item_received_list->FreeQty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received_list->ItemValue->Visible) { // ItemValue ?>
	<?php if ($view_item_received_list->SortUrl($view_item_received_list->ItemValue) == "") { ?>
		<th data-name="ItemValue" class="<?php echo $view_item_received_list->ItemValue->headerCellClass() ?>"><div id="elh_view_item_received_ItemValue" class="view_item_received_ItemValue"><div class="ew-table-header-caption"><?php echo $view_item_received_list->ItemValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemValue" class="<?php echo $view_item_received_list->ItemValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_item_received_list->SortUrl($view_item_received_list->ItemValue) ?>', 1);"><div id="elh_view_item_received_ItemValue" class="view_item_received_ItemValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received_list->ItemValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_item_received_list->ItemValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_item_received_list->ItemValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received_list->Received->Visible) { // Received ?>
	<?php if ($view_item_received_list->SortUrl($view_item_received_list->Received) == "") { ?>
		<th data-name="Received" class="<?php echo $view_item_received_list->Received->headerCellClass() ?>"><div id="elh_view_item_received_Received" class="view_item_received_Received"><div class="ew-table-header-caption"><?php echo $view_item_received_list->Received->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Received" class="<?php echo $view_item_received_list->Received->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_item_received_list->SortUrl($view_item_received_list->Received) ?>', 1);"><div id="elh_view_item_received_Received" class="view_item_received_Received">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received_list->Received->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_item_received_list->Received->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_item_received_list->Received->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received_list->id->Visible) { // id ?>
	<?php if ($view_item_received_list->SortUrl($view_item_received_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_item_received_list->id->headerCellClass() ?>"><div id="elh_view_item_received_id" class="view_item_received_id"><div class="ew-table-header-caption"><?php echo $view_item_received_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_item_received_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_item_received_list->SortUrl($view_item_received_list->id) ?>', 1);"><div id="elh_view_item_received_id" class="view_item_received_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_item_received_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_item_received_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_item_received_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_item_received_list->ExportAll && $view_item_received_list->isExport()) {
	$view_item_received_list->StopRecord = $view_item_received_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_item_received_list->TotalRecords > $view_item_received_list->StartRecord + $view_item_received_list->DisplayRecords - 1)
		$view_item_received_list->StopRecord = $view_item_received_list->StartRecord + $view_item_received_list->DisplayRecords - 1;
	else
		$view_item_received_list->StopRecord = $view_item_received_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($view_item_received->isConfirm() || $view_item_received_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_item_received_list->FormKeyCountName) && ($view_item_received_list->isGridAdd() || $view_item_received_list->isGridEdit() || $view_item_received->isConfirm())) {
		$view_item_received_list->KeyCount = $CurrentForm->getValue($view_item_received_list->FormKeyCountName);
		$view_item_received_list->StopRecord = $view_item_received_list->StartRecord + $view_item_received_list->KeyCount - 1;
	}
}
$view_item_received_list->RecordCount = $view_item_received_list->StartRecord - 1;
if ($view_item_received_list->Recordset && !$view_item_received_list->Recordset->EOF) {
	$view_item_received_list->Recordset->moveFirst();
	$selectLimit = $view_item_received_list->UseSelectLimit;
	if (!$selectLimit && $view_item_received_list->StartRecord > 1)
		$view_item_received_list->Recordset->move($view_item_received_list->StartRecord - 1);
} elseif (!$view_item_received->AllowAddDeleteRow && $view_item_received_list->StopRecord == 0) {
	$view_item_received_list->StopRecord = $view_item_received->GridAddRowCount;
}

// Initialize aggregate
$view_item_received->RowType = ROWTYPE_AGGREGATEINIT;
$view_item_received->resetAttributes();
$view_item_received_list->renderRow();
if ($view_item_received_list->isGridEdit())
	$view_item_received_list->RowIndex = 0;
while ($view_item_received_list->RecordCount < $view_item_received_list->StopRecord) {
	$view_item_received_list->RecordCount++;
	if ($view_item_received_list->RecordCount >= $view_item_received_list->StartRecord) {
		$view_item_received_list->RowCount++;
		if ($view_item_received_list->isGridAdd() || $view_item_received_list->isGridEdit() || $view_item_received->isConfirm()) {
			$view_item_received_list->RowIndex++;
			$CurrentForm->Index = $view_item_received_list->RowIndex;
			if ($CurrentForm->hasValue($view_item_received_list->FormActionName) && ($view_item_received->isConfirm() || $view_item_received_list->EventCancelled))
				$view_item_received_list->RowAction = strval($CurrentForm->getValue($view_item_received_list->FormActionName));
			elseif ($view_item_received_list->isGridAdd())
				$view_item_received_list->RowAction = "insert";
			else
				$view_item_received_list->RowAction = "";
		}

		// Set up key count
		$view_item_received_list->KeyCount = $view_item_received_list->RowIndex;

		// Init row class and style
		$view_item_received->resetAttributes();
		$view_item_received->CssClass = "";
		if ($view_item_received_list->isGridAdd()) {
			$view_item_received_list->loadRowValues(); // Load default values
		} else {
			$view_item_received_list->loadRowValues($view_item_received_list->Recordset); // Load row values
		}
		$view_item_received->RowType = ROWTYPE_VIEW; // Render view
		if ($view_item_received_list->isGridEdit()) { // Grid edit
			if ($view_item_received->EventCancelled)
				$view_item_received_list->restoreCurrentRowFormValues($view_item_received_list->RowIndex); // Restore form values
			if ($view_item_received_list->RowAction == "insert")
				$view_item_received->RowType = ROWTYPE_ADD; // Render add
			else
				$view_item_received->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_item_received_list->isGridEdit() && ($view_item_received->RowType == ROWTYPE_EDIT || $view_item_received->RowType == ROWTYPE_ADD) && $view_item_received->EventCancelled) // Update failed
			$view_item_received_list->restoreCurrentRowFormValues($view_item_received_list->RowIndex); // Restore form values
		if ($view_item_received->RowType == ROWTYPE_EDIT) // Edit row
			$view_item_received_list->EditRowCount++;

		// Set up row id / data-rowindex
		$view_item_received->RowAttrs->merge(["data-rowindex" => $view_item_received_list->RowCount, "id" => "r" . $view_item_received_list->RowCount . "_view_item_received", "data-rowtype" => $view_item_received->RowType]);

		// Render row
		$view_item_received_list->renderRow();

		// Render list options
		$view_item_received_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_item_received_list->RowAction != "delete" && $view_item_received_list->RowAction != "insertdelete" && !($view_item_received_list->RowAction == "insert" && $view_item_received->isConfirm() && $view_item_received_list->emptyRow())) {
?>
	<tr <?php echo $view_item_received->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_item_received_list->ListOptions->render("body", "left", $view_item_received_list->RowCount);
?>
	<?php if ($view_item_received_list->ORDNO->Visible) { // ORDNO ?>
		<td data-name="ORDNO" <?php echo $view_item_received_list->ORDNO->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_ORDNO" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_item_received" data-field="x_ORDNO" data-value-separator="<?php echo $view_item_received_list->ORDNO->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_item_received_list->RowIndex ?>_ORDNO" name="x<?php echo $view_item_received_list->RowIndex ?>_ORDNO"<?php echo $view_item_received_list->ORDNO->editAttributes() ?>>
			<?php echo $view_item_received_list->ORDNO->selectOptionListHtml("x{$view_item_received_list->RowIndex}_ORDNO") ?>
		</select>
</div>
<?php echo $view_item_received_list->ORDNO->Lookup->getParamTag($view_item_received_list, "p_x" . $view_item_received_list->RowIndex . "_ORDNO") ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ORDNO" name="o<?php echo $view_item_received_list->RowIndex ?>_ORDNO" id="o<?php echo $view_item_received_list->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_item_received_list->ORDNO->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_ORDNO" class="form-group">
<span<?php echo $view_item_received_list->ORDNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_item_received_list->ORDNO->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ORDNO" name="x<?php echo $view_item_received_list->RowIndex ?>_ORDNO" id="x<?php echo $view_item_received_list->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_item_received_list->ORDNO->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_ORDNO">
<span<?php echo $view_item_received_list->ORDNO->viewAttributes() ?>><?php echo $view_item_received_list->ORDNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $view_item_received_list->BRCODE->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_BRCODE" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_item_received" data-field="x_BRCODE" data-value-separator="<?php echo $view_item_received_list->BRCODE->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_item_received_list->RowIndex ?>_BRCODE" name="x<?php echo $view_item_received_list->RowIndex ?>_BRCODE"<?php echo $view_item_received_list->BRCODE->editAttributes() ?>>
			<?php echo $view_item_received_list->BRCODE->selectOptionListHtml("x{$view_item_received_list->RowIndex}_BRCODE") ?>
		</select>
</div>
<?php echo $view_item_received_list->BRCODE->Lookup->getParamTag($view_item_received_list, "p_x" . $view_item_received_list->RowIndex . "_BRCODE") ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BRCODE" name="o<?php echo $view_item_received_list->RowIndex ?>_BRCODE" id="o<?php echo $view_item_received_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_item_received_list->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_BRCODE" class="form-group">
<span<?php echo $view_item_received_list->BRCODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_item_received_list->BRCODE->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BRCODE" name="x<?php echo $view_item_received_list->RowIndex ?>_BRCODE" id="x<?php echo $view_item_received_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_item_received_list->BRCODE->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_BRCODE">
<span<?php echo $view_item_received_list->BRCODE->viewAttributes() ?>><?php echo $view_item_received_list->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $view_item_received_list->PRC->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_PRC" class="form-group">
<input type="text" data-table="view_item_received" data-field="x_PRC" name="x<?php echo $view_item_received_list->RowIndex ?>_PRC" id="x<?php echo $view_item_received_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_item_received_list->PRC->getPlaceHolder()) ?>" value="<?php echo $view_item_received_list->PRC->EditValue ?>"<?php echo $view_item_received_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PRC" name="o<?php echo $view_item_received_list->RowIndex ?>_PRC" id="o<?php echo $view_item_received_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_item_received_list->PRC->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_PRC" class="form-group">
<span<?php echo $view_item_received_list->PRC->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_item_received_list->PRC->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PRC" name="x<?php echo $view_item_received_list->RowIndex ?>_PRC" id="x<?php echo $view_item_received_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_item_received_list->PRC->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_PRC">
<span<?php echo $view_item_received_list->PRC->viewAttributes() ?>><?php echo $view_item_received_list->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received_list->PrName->Visible) { // PrName ?>
		<td data-name="PrName" <?php echo $view_item_received_list->PrName->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_PrName" class="form-group">
<input type="text" data-table="view_item_received" data-field="x_PrName" name="x<?php echo $view_item_received_list->RowIndex ?>_PrName" id="x<?php echo $view_item_received_list->RowIndex ?>_PrName" size="200" maxlength="200" placeholder="<?php echo HtmlEncode($view_item_received_list->PrName->getPlaceHolder()) ?>" value="<?php echo $view_item_received_list->PrName->EditValue ?>"<?php echo $view_item_received_list->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PrName" name="o<?php echo $view_item_received_list->RowIndex ?>_PrName" id="o<?php echo $view_item_received_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_item_received_list->PrName->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_PrName" class="form-group">
<span<?php echo $view_item_received_list->PrName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_item_received_list->PrName->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PrName" name="x<?php echo $view_item_received_list->RowIndex ?>_PrName" id="x<?php echo $view_item_received_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_item_received_list->PrName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_PrName">
<span<?php echo $view_item_received_list->PrName->viewAttributes() ?>><?php echo $view_item_received_list->PrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received_list->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" <?php echo $view_item_received_list->MFRCODE->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_MFRCODE" class="form-group">
<input type="text" data-table="view_item_received" data-field="x_MFRCODE" name="x<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" id="x<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_item_received_list->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_item_received_list->MFRCODE->EditValue ?>"<?php echo $view_item_received_list->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_MFRCODE" name="o<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" id="o<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_item_received_list->MFRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_MFRCODE" class="form-group">
<span<?php echo $view_item_received_list->MFRCODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_item_received_list->MFRCODE->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_MFRCODE" name="x<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" id="x<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_item_received_list->MFRCODE->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_MFRCODE">
<span<?php echo $view_item_received_list->MFRCODE->viewAttributes() ?>><?php echo $view_item_received_list->MFRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received_list->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo" <?php echo $view_item_received_list->BatchNo->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_BatchNo" class="form-group">
<input type="text" data-table="view_item_received" data-field="x_BatchNo" name="x<?php echo $view_item_received_list->RowIndex ?>_BatchNo" id="x<?php echo $view_item_received_list->RowIndex ?>_BatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_item_received_list->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_item_received_list->BatchNo->EditValue ?>"<?php echo $view_item_received_list->BatchNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BatchNo" name="o<?php echo $view_item_received_list->RowIndex ?>_BatchNo" id="o<?php echo $view_item_received_list->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_item_received_list->BatchNo->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_BatchNo" class="form-group">
<span<?php echo $view_item_received_list->BatchNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_item_received_list->BatchNo->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BatchNo" name="x<?php echo $view_item_received_list->RowIndex ?>_BatchNo" id="x<?php echo $view_item_received_list->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_item_received_list->BatchNo->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_BatchNo">
<span<?php echo $view_item_received_list->BatchNo->viewAttributes() ?>><?php echo $view_item_received_list->BatchNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received_list->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate" <?php echo $view_item_received_list->BillDate->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_BillDate" class="form-group">
<input type="text" data-table="view_item_received" data-field="x_BillDate" data-format="7" name="x<?php echo $view_item_received_list->RowIndex ?>_BillDate" id="x<?php echo $view_item_received_list->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_item_received_list->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_item_received_list->BillDate->EditValue ?>"<?php echo $view_item_received_list->BillDate->editAttributes() ?>>
<?php if (!$view_item_received_list->BillDate->ReadOnly && !$view_item_received_list->BillDate->Disabled && !isset($view_item_received_list->BillDate->EditAttrs["readonly"]) && !isset($view_item_received_list->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_item_receivedlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_item_receivedlist", "x<?php echo $view_item_received_list->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BillDate" name="o<?php echo $view_item_received_list->RowIndex ?>_BillDate" id="o<?php echo $view_item_received_list->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_item_received_list->BillDate->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_BillDate" class="form-group">
<span<?php echo $view_item_received_list->BillDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_item_received_list->BillDate->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BillDate" name="x<?php echo $view_item_received_list->RowIndex ?>_BillDate" id="x<?php echo $view_item_received_list->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_item_received_list->BillDate->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_BillDate">
<span<?php echo $view_item_received_list->BillDate->viewAttributes() ?>><?php echo $view_item_received_list->BillDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received_list->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate" <?php echo $view_item_received_list->ExpDate->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_ExpDate" class="form-group">
<input type="text" data-table="view_item_received" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_item_received_list->RowIndex ?>_ExpDate" id="x<?php echo $view_item_received_list->RowIndex ?>_ExpDate" placeholder="<?php echo HtmlEncode($view_item_received_list->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_item_received_list->ExpDate->EditValue ?>"<?php echo $view_item_received_list->ExpDate->editAttributes() ?>>
<?php if (!$view_item_received_list->ExpDate->ReadOnly && !$view_item_received_list->ExpDate->Disabled && !isset($view_item_received_list->ExpDate->EditAttrs["readonly"]) && !isset($view_item_received_list->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_item_receivedlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_item_receivedlist", "x<?php echo $view_item_received_list->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ExpDate" name="o<?php echo $view_item_received_list->RowIndex ?>_ExpDate" id="o<?php echo $view_item_received_list->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_item_received_list->ExpDate->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_ExpDate" class="form-group">
<span<?php echo $view_item_received_list->ExpDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_item_received_list->ExpDate->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ExpDate" name="x<?php echo $view_item_received_list->RowIndex ?>_ExpDate" id="x<?php echo $view_item_received_list->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_item_received_list->ExpDate->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_ExpDate">
<span<?php echo $view_item_received_list->ExpDate->viewAttributes() ?>><?php echo $view_item_received_list->ExpDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" <?php echo $view_item_received_list->Quantity->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_Quantity" class="form-group">
<input type="text" data-table="view_item_received" data-field="x_Quantity" name="x<?php echo $view_item_received_list->RowIndex ?>_Quantity" id="x<?php echo $view_item_received_list->RowIndex ?>_Quantity" size="30" placeholder="<?php echo HtmlEncode($view_item_received_list->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_item_received_list->Quantity->EditValue ?>"<?php echo $view_item_received_list->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_Quantity" name="o<?php echo $view_item_received_list->RowIndex ?>_Quantity" id="o<?php echo $view_item_received_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_item_received_list->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_Quantity" class="form-group">
<span<?php echo $view_item_received_list->Quantity->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_item_received_list->Quantity->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_Quantity" name="x<?php echo $view_item_received_list->RowIndex ?>_Quantity" id="x<?php echo $view_item_received_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_item_received_list->Quantity->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_Quantity">
<span<?php echo $view_item_received_list->Quantity->viewAttributes() ?>><?php echo $view_item_received_list->Quantity->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received_list->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty" <?php echo $view_item_received_list->FreeQty->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_FreeQty" class="form-group">
<input type="text" data-table="view_item_received" data-field="x_FreeQty" name="x<?php echo $view_item_received_list->RowIndex ?>_FreeQty" id="x<?php echo $view_item_received_list->RowIndex ?>_FreeQty" size="30" placeholder="<?php echo HtmlEncode($view_item_received_list->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_item_received_list->FreeQty->EditValue ?>"<?php echo $view_item_received_list->FreeQty->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_FreeQty" name="o<?php echo $view_item_received_list->RowIndex ?>_FreeQty" id="o<?php echo $view_item_received_list->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_item_received_list->FreeQty->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_FreeQty" class="form-group">
<span<?php echo $view_item_received_list->FreeQty->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_item_received_list->FreeQty->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_FreeQty" name="x<?php echo $view_item_received_list->RowIndex ?>_FreeQty" id="x<?php echo $view_item_received_list->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_item_received_list->FreeQty->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_FreeQty">
<span<?php echo $view_item_received_list->FreeQty->viewAttributes() ?>><?php echo $view_item_received_list->FreeQty->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received_list->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue" <?php echo $view_item_received_list->ItemValue->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_ItemValue" class="form-group">
<input type="text" data-table="view_item_received" data-field="x_ItemValue" name="x<?php echo $view_item_received_list->RowIndex ?>_ItemValue" id="x<?php echo $view_item_received_list->RowIndex ?>_ItemValue" size="30" placeholder="<?php echo HtmlEncode($view_item_received_list->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_item_received_list->ItemValue->EditValue ?>"<?php echo $view_item_received_list->ItemValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ItemValue" name="o<?php echo $view_item_received_list->RowIndex ?>_ItemValue" id="o<?php echo $view_item_received_list->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_item_received_list->ItemValue->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_ItemValue" class="form-group">
<span<?php echo $view_item_received_list->ItemValue->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_item_received_list->ItemValue->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ItemValue" name="x<?php echo $view_item_received_list->RowIndex ?>_ItemValue" id="x<?php echo $view_item_received_list->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_item_received_list->ItemValue->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_ItemValue">
<span<?php echo $view_item_received_list->ItemValue->viewAttributes() ?>><?php echo $view_item_received_list->ItemValue->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received_list->Received->Visible) { // Received ?>
		<td data-name="Received" <?php echo $view_item_received_list->Received->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_Received" class="form-group">
<div id="tp_x<?php echo $view_item_received_list->RowIndex ?>_Received" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_item_received" data-field="x_Received" data-value-separator="<?php echo $view_item_received_list->Received->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_item_received_list->RowIndex ?>_Received[]" id="x<?php echo $view_item_received_list->RowIndex ?>_Received[]" value="{value}"<?php echo $view_item_received_list->Received->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_item_received_list->RowIndex ?>_Received" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_item_received_list->Received->checkBoxListHtml(FALSE, "x{$view_item_received_list->RowIndex}_Received[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_Received" name="o<?php echo $view_item_received_list->RowIndex ?>_Received[]" id="o<?php echo $view_item_received_list->RowIndex ?>_Received[]" value="<?php echo HtmlEncode($view_item_received_list->Received->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_Received" class="form-group">
<div id="tp_x<?php echo $view_item_received_list->RowIndex ?>_Received" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_item_received" data-field="x_Received" data-value-separator="<?php echo $view_item_received_list->Received->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_item_received_list->RowIndex ?>_Received[]" id="x<?php echo $view_item_received_list->RowIndex ?>_Received[]" value="{value}"<?php echo $view_item_received_list->Received->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_item_received_list->RowIndex ?>_Received" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_item_received_list->Received->checkBoxListHtml(FALSE, "x{$view_item_received_list->RowIndex}_Received[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_Received">
<span<?php echo $view_item_received_list->Received->viewAttributes() ?>><?php echo $view_item_received_list->Received->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_item_received_list->id->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_id" class="form-group"></span>
<input type="hidden" data-table="view_item_received" data-field="x_id" name="o<?php echo $view_item_received_list->RowIndex ?>_id" id="o<?php echo $view_item_received_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_item_received_list->id->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_id" class="form-group">
<span<?php echo $view_item_received_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_item_received_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_id" name="x<?php echo $view_item_received_list->RowIndex ?>_id" id="x<?php echo $view_item_received_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_item_received_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCount ?>_view_item_received_id">
<span<?php echo $view_item_received_list->id->viewAttributes() ?>><?php echo $view_item_received_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_item_received_list->ListOptions->render("body", "right", $view_item_received_list->RowCount);
?>
	</tr>
<?php if ($view_item_received->RowType == ROWTYPE_ADD || $view_item_received->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_item_receivedlist", "load"], function() {
	fview_item_receivedlist.updateLists(<?php echo $view_item_received_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_item_received_list->isGridAdd())
		if (!$view_item_received_list->Recordset->EOF)
			$view_item_received_list->Recordset->moveNext();
}
?>
<?php
	if ($view_item_received_list->isGridAdd() || $view_item_received_list->isGridEdit()) {
		$view_item_received_list->RowIndex = '$rowindex$';
		$view_item_received_list->loadRowValues();

		// Set row properties
		$view_item_received->resetAttributes();
		$view_item_received->RowAttrs->merge(["data-rowindex" => $view_item_received_list->RowIndex, "id" => "r0_view_item_received", "data-rowtype" => ROWTYPE_ADD]);
		$view_item_received->RowAttrs->appendClass("ew-template");
		$view_item_received->RowType = ROWTYPE_ADD;

		// Render row
		$view_item_received_list->renderRow();

		// Render list options
		$view_item_received_list->renderListOptions();
		$view_item_received_list->StartRowCount = 0;
?>
	<tr <?php echo $view_item_received->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_item_received_list->ListOptions->render("body", "left", $view_item_received_list->RowIndex);
?>
	<?php if ($view_item_received_list->ORDNO->Visible) { // ORDNO ?>
		<td data-name="ORDNO">
<span id="el$rowindex$_view_item_received_ORDNO" class="form-group view_item_received_ORDNO">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_item_received" data-field="x_ORDNO" data-value-separator="<?php echo $view_item_received_list->ORDNO->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_item_received_list->RowIndex ?>_ORDNO" name="x<?php echo $view_item_received_list->RowIndex ?>_ORDNO"<?php echo $view_item_received_list->ORDNO->editAttributes() ?>>
			<?php echo $view_item_received_list->ORDNO->selectOptionListHtml("x{$view_item_received_list->RowIndex}_ORDNO") ?>
		</select>
</div>
<?php echo $view_item_received_list->ORDNO->Lookup->getParamTag($view_item_received_list, "p_x" . $view_item_received_list->RowIndex . "_ORDNO") ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ORDNO" name="o<?php echo $view_item_received_list->RowIndex ?>_ORDNO" id="o<?php echo $view_item_received_list->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_item_received_list->ORDNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<span id="el$rowindex$_view_item_received_BRCODE" class="form-group view_item_received_BRCODE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_item_received" data-field="x_BRCODE" data-value-separator="<?php echo $view_item_received_list->BRCODE->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_item_received_list->RowIndex ?>_BRCODE" name="x<?php echo $view_item_received_list->RowIndex ?>_BRCODE"<?php echo $view_item_received_list->BRCODE->editAttributes() ?>>
			<?php echo $view_item_received_list->BRCODE->selectOptionListHtml("x{$view_item_received_list->RowIndex}_BRCODE") ?>
		</select>
</div>
<?php echo $view_item_received_list->BRCODE->Lookup->getParamTag($view_item_received_list, "p_x" . $view_item_received_list->RowIndex . "_BRCODE") ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BRCODE" name="o<?php echo $view_item_received_list->RowIndex ?>_BRCODE" id="o<?php echo $view_item_received_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_item_received_list->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<span id="el$rowindex$_view_item_received_PRC" class="form-group view_item_received_PRC">
<input type="text" data-table="view_item_received" data-field="x_PRC" name="x<?php echo $view_item_received_list->RowIndex ?>_PRC" id="x<?php echo $view_item_received_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_item_received_list->PRC->getPlaceHolder()) ?>" value="<?php echo $view_item_received_list->PRC->EditValue ?>"<?php echo $view_item_received_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PRC" name="o<?php echo $view_item_received_list->RowIndex ?>_PRC" id="o<?php echo $view_item_received_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_item_received_list->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received_list->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<span id="el$rowindex$_view_item_received_PrName" class="form-group view_item_received_PrName">
<input type="text" data-table="view_item_received" data-field="x_PrName" name="x<?php echo $view_item_received_list->RowIndex ?>_PrName" id="x<?php echo $view_item_received_list->RowIndex ?>_PrName" size="200" maxlength="200" placeholder="<?php echo HtmlEncode($view_item_received_list->PrName->getPlaceHolder()) ?>" value="<?php echo $view_item_received_list->PrName->EditValue ?>"<?php echo $view_item_received_list->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PrName" name="o<?php echo $view_item_received_list->RowIndex ?>_PrName" id="o<?php echo $view_item_received_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_item_received_list->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received_list->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE">
<span id="el$rowindex$_view_item_received_MFRCODE" class="form-group view_item_received_MFRCODE">
<input type="text" data-table="view_item_received" data-field="x_MFRCODE" name="x<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" id="x<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_item_received_list->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_item_received_list->MFRCODE->EditValue ?>"<?php echo $view_item_received_list->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_MFRCODE" name="o<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" id="o<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_item_received_list->MFRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received_list->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo">
<span id="el$rowindex$_view_item_received_BatchNo" class="form-group view_item_received_BatchNo">
<input type="text" data-table="view_item_received" data-field="x_BatchNo" name="x<?php echo $view_item_received_list->RowIndex ?>_BatchNo" id="x<?php echo $view_item_received_list->RowIndex ?>_BatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_item_received_list->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_item_received_list->BatchNo->EditValue ?>"<?php echo $view_item_received_list->BatchNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BatchNo" name="o<?php echo $view_item_received_list->RowIndex ?>_BatchNo" id="o<?php echo $view_item_received_list->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_item_received_list->BatchNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received_list->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate">
<span id="el$rowindex$_view_item_received_BillDate" class="form-group view_item_received_BillDate">
<input type="text" data-table="view_item_received" data-field="x_BillDate" data-format="7" name="x<?php echo $view_item_received_list->RowIndex ?>_BillDate" id="x<?php echo $view_item_received_list->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_item_received_list->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_item_received_list->BillDate->EditValue ?>"<?php echo $view_item_received_list->BillDate->editAttributes() ?>>
<?php if (!$view_item_received_list->BillDate->ReadOnly && !$view_item_received_list->BillDate->Disabled && !isset($view_item_received_list->BillDate->EditAttrs["readonly"]) && !isset($view_item_received_list->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_item_receivedlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_item_receivedlist", "x<?php echo $view_item_received_list->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BillDate" name="o<?php echo $view_item_received_list->RowIndex ?>_BillDate" id="o<?php echo $view_item_received_list->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_item_received_list->BillDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received_list->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate">
<span id="el$rowindex$_view_item_received_ExpDate" class="form-group view_item_received_ExpDate">
<input type="text" data-table="view_item_received" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_item_received_list->RowIndex ?>_ExpDate" id="x<?php echo $view_item_received_list->RowIndex ?>_ExpDate" placeholder="<?php echo HtmlEncode($view_item_received_list->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_item_received_list->ExpDate->EditValue ?>"<?php echo $view_item_received_list->ExpDate->editAttributes() ?>>
<?php if (!$view_item_received_list->ExpDate->ReadOnly && !$view_item_received_list->ExpDate->Disabled && !isset($view_item_received_list->ExpDate->EditAttrs["readonly"]) && !isset($view_item_received_list->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_item_receivedlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_item_receivedlist", "x<?php echo $view_item_received_list->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ExpDate" name="o<?php echo $view_item_received_list->RowIndex ?>_ExpDate" id="o<?php echo $view_item_received_list->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_item_received_list->ExpDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<span id="el$rowindex$_view_item_received_Quantity" class="form-group view_item_received_Quantity">
<input type="text" data-table="view_item_received" data-field="x_Quantity" name="x<?php echo $view_item_received_list->RowIndex ?>_Quantity" id="x<?php echo $view_item_received_list->RowIndex ?>_Quantity" size="30" placeholder="<?php echo HtmlEncode($view_item_received_list->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_item_received_list->Quantity->EditValue ?>"<?php echo $view_item_received_list->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_Quantity" name="o<?php echo $view_item_received_list->RowIndex ?>_Quantity" id="o<?php echo $view_item_received_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_item_received_list->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received_list->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty">
<span id="el$rowindex$_view_item_received_FreeQty" class="form-group view_item_received_FreeQty">
<input type="text" data-table="view_item_received" data-field="x_FreeQty" name="x<?php echo $view_item_received_list->RowIndex ?>_FreeQty" id="x<?php echo $view_item_received_list->RowIndex ?>_FreeQty" size="30" placeholder="<?php echo HtmlEncode($view_item_received_list->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_item_received_list->FreeQty->EditValue ?>"<?php echo $view_item_received_list->FreeQty->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_FreeQty" name="o<?php echo $view_item_received_list->RowIndex ?>_FreeQty" id="o<?php echo $view_item_received_list->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_item_received_list->FreeQty->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received_list->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue">
<span id="el$rowindex$_view_item_received_ItemValue" class="form-group view_item_received_ItemValue">
<input type="text" data-table="view_item_received" data-field="x_ItemValue" name="x<?php echo $view_item_received_list->RowIndex ?>_ItemValue" id="x<?php echo $view_item_received_list->RowIndex ?>_ItemValue" size="30" placeholder="<?php echo HtmlEncode($view_item_received_list->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_item_received_list->ItemValue->EditValue ?>"<?php echo $view_item_received_list->ItemValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ItemValue" name="o<?php echo $view_item_received_list->RowIndex ?>_ItemValue" id="o<?php echo $view_item_received_list->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_item_received_list->ItemValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received_list->Received->Visible) { // Received ?>
		<td data-name="Received">
<span id="el$rowindex$_view_item_received_Received" class="form-group view_item_received_Received">
<div id="tp_x<?php echo $view_item_received_list->RowIndex ?>_Received" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_item_received" data-field="x_Received" data-value-separator="<?php echo $view_item_received_list->Received->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_item_received_list->RowIndex ?>_Received[]" id="x<?php echo $view_item_received_list->RowIndex ?>_Received[]" value="{value}"<?php echo $view_item_received_list->Received->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_item_received_list->RowIndex ?>_Received" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_item_received_list->Received->checkBoxListHtml(FALSE, "x{$view_item_received_list->RowIndex}_Received[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_Received" name="o<?php echo $view_item_received_list->RowIndex ?>_Received[]" id="o<?php echo $view_item_received_list->RowIndex ?>_Received[]" value="<?php echo HtmlEncode($view_item_received_list->Received->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_view_item_received_id" class="form-group view_item_received_id"></span>
<input type="hidden" data-table="view_item_received" data-field="x_id" name="o<?php echo $view_item_received_list->RowIndex ?>_id" id="o<?php echo $view_item_received_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_item_received_list->id->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_item_received_list->ListOptions->render("body", "right", $view_item_received_list->RowIndex);
?>
<script>
loadjs.ready(["fview_item_receivedlist", "load"], function() {
	fview_item_receivedlist.updateLists(<?php echo $view_item_received_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
<?php

// Render aggregate row
$view_item_received->RowType = ROWTYPE_AGGREGATE;
$view_item_received->resetAttributes();
$view_item_received_list->renderRow();
?>
<?php if ($view_item_received_list->TotalRecords > 0 && !$view_item_received_list->isGridAdd() && !$view_item_received_list->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_item_received_list->renderListOptions();

// Render list options (footer, left)
$view_item_received_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_item_received_list->ORDNO->Visible) { // ORDNO ?>
		<td data-name="ORDNO" class="<?php echo $view_item_received_list->ORDNO->footerCellClass() ?>"><span id="elf_view_item_received_ORDNO" class="view_item_received_ORDNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" class="<?php echo $view_item_received_list->BRCODE->footerCellClass() ?>"><span id="elf_view_item_received_BRCODE" class="view_item_received_BRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" class="<?php echo $view_item_received_list->PRC->footerCellClass() ?>"><span id="elf_view_item_received_PRC" class="view_item_received_PRC">
		<span class="ew-aggregate"><?php echo $Language->phrase("COUNT") ?></span><span class="ew-aggregate-value">
		<?php echo $view_item_received_list->PRC->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_item_received_list->PrName->Visible) { // PrName ?>
		<td data-name="PrName" class="<?php echo $view_item_received_list->PrName->footerCellClass() ?>"><span id="elf_view_item_received_PrName" class="view_item_received_PrName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received_list->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" class="<?php echo $view_item_received_list->MFRCODE->footerCellClass() ?>"><span id="elf_view_item_received_MFRCODE" class="view_item_received_MFRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received_list->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo" class="<?php echo $view_item_received_list->BatchNo->footerCellClass() ?>"><span id="elf_view_item_received_BatchNo" class="view_item_received_BatchNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received_list->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate" class="<?php echo $view_item_received_list->BillDate->footerCellClass() ?>"><span id="elf_view_item_received_BillDate" class="view_item_received_BillDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received_list->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate" class="<?php echo $view_item_received_list->ExpDate->footerCellClass() ?>"><span id="elf_view_item_received_ExpDate" class="view_item_received_ExpDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" class="<?php echo $view_item_received_list->Quantity->footerCellClass() ?>"><span id="elf_view_item_received_Quantity" class="view_item_received_Quantity">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_item_received_list->Quantity->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_item_received_list->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty" class="<?php echo $view_item_received_list->FreeQty->footerCellClass() ?>"><span id="elf_view_item_received_FreeQty" class="view_item_received_FreeQty">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received_list->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue" class="<?php echo $view_item_received_list->ItemValue->footerCellClass() ?>"><span id="elf_view_item_received_ItemValue" class="view_item_received_ItemValue">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received_list->Received->Visible) { // Received ?>
		<td data-name="Received" class="<?php echo $view_item_received_list->Received->footerCellClass() ?>"><span id="elf_view_item_received_Received" class="view_item_received_Received">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received_list->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $view_item_received_list->id->footerCellClass() ?>"><span id="elf_view_item_received_id" class="view_item_received_id">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_item_received_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($view_item_received_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_item_received_list->FormKeyCountName ?>" id="<?php echo $view_item_received_list->FormKeyCountName ?>" value="<?php echo $view_item_received_list->KeyCount ?>">
<?php echo $view_item_received_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_item_received->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_item_received_list->Recordset)
	$view_item_received_list->Recordset->Close();
?>
<?php if (!$view_item_received_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_item_received_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_item_received_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_item_received_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_item_received_list->TotalRecords == 0 && !$view_item_received->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_item_received_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_item_received_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_item_received_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	$("[data-name='PRC']").width("100px"),$("[data-name='PrName']").width("400px"),$("[data-name='BatchNo']").width("100px"),$("[data-name='BillDate']").width("100px"),$("[data-name='ExpDate']").width("100px"),$("[data-name='Quantity']").width("100px"),$("[data-name='ItemValue']").width("100px");
});
</script>
<?php if (!$view_item_received->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_item_received",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_item_received_list->terminate();
?>