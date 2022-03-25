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
$view_et_list = new view_et_list();

// Run the page
$view_et_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_et_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_et_list->isExport()) { ?>
<script>
var fview_etlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_etlist = currentForm = new ew.Form("fview_etlist", "list");
	fview_etlist.formKeyCountName = '<?php echo $view_et_list->FormKeyCountName ?>';

	// Validate form
	fview_etlist.validate = function() {
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
			<?php if ($view_et_list->EmbryoNo->Required) { ?>
				elm = this.getElements("x" + infix + "_EmbryoNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_list->EmbryoNo->caption(), $view_et_list->EmbryoNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_et_list->Stage->Required) { ?>
				elm = this.getElements("x" + infix + "_Stage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_list->Stage->caption(), $view_et_list->Stage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_et_list->FertilisationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_FertilisationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_list->FertilisationDate->caption(), $view_et_list->FertilisationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_et_list->Day->Required) { ?>
				elm = this.getElements("x" + infix + "_Day");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_list->Day->caption(), $view_et_list->Day->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_et_list->Grade->Required) { ?>
				elm = this.getElements("x" + infix + "_Grade");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_list->Grade->caption(), $view_et_list->Grade->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_et_list->Incubator->Required) { ?>
				elm = this.getElements("x" + infix + "_Incubator");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_list->Incubator->caption(), $view_et_list->Incubator->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_et_list->Catheter->Required) { ?>
				elm = this.getElements("x" + infix + "_Catheter");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_list->Catheter->caption(), $view_et_list->Catheter->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_et_list->Difficulty->Required) { ?>
				elm = this.getElements("x" + infix + "_Difficulty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_list->Difficulty->caption(), $view_et_list->Difficulty->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_et_list->Easy->Required) { ?>
				elm = this.getElements("x" + infix + "_Easy[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_list->Easy->caption(), $view_et_list->Easy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_et_list->Comments->Required) { ?>
				elm = this.getElements("x" + infix + "_Comments");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_list->Comments->caption(), $view_et_list->Comments->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_et_list->Doctor->Required) { ?>
				elm = this.getElements("x" + infix + "_Doctor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_list->Doctor->caption(), $view_et_list->Doctor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_et_list->Embryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_Embryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_list->Embryologist->caption(), $view_et_list->Embryologist->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fview_etlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_etlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_etlist.lists["x_Day"] = <?php echo $view_et_list->Day->Lookup->toClientList($view_et_list) ?>;
	fview_etlist.lists["x_Day"].options = <?php echo JsonEncode($view_et_list->Day->options(FALSE, TRUE)) ?>;
	fview_etlist.lists["x_Grade"] = <?php echo $view_et_list->Grade->Lookup->toClientList($view_et_list) ?>;
	fview_etlist.lists["x_Grade"].options = <?php echo JsonEncode($view_et_list->Grade->options(FALSE, TRUE)) ?>;
	fview_etlist.lists["x_Difficulty"] = <?php echo $view_et_list->Difficulty->Lookup->toClientList($view_et_list) ?>;
	fview_etlist.lists["x_Difficulty"].options = <?php echo JsonEncode($view_et_list->Difficulty->options(FALSE, TRUE)) ?>;
	fview_etlist.lists["x_Easy[]"] = <?php echo $view_et_list->Easy->Lookup->toClientList($view_et_list) ?>;
	fview_etlist.lists["x_Easy[]"].options = <?php echo JsonEncode($view_et_list->Easy->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_etlist");
});
var fview_etlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_etlistsrch = currentSearchForm = new ew.Form("fview_etlistsrch");

	// Dynamic selection lists
	// Filters

	fview_etlistsrch.filterList = <?php echo $view_et_list->getFilterList() ?>;
	loadjs.done("fview_etlistsrch");
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
<?php if (!$view_et_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_et_list->TotalRecords > 0 && $view_et_list->ExportOptions->visible()) { ?>
<?php $view_et_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_et_list->ImportOptions->visible()) { ?>
<?php $view_et_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_et_list->SearchOptions->visible()) { ?>
<?php $view_et_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_et_list->FilterOptions->visible()) { ?>
<?php $view_et_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_et_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_et_list->isExport() && !$view_et->CurrentAction) { ?>
<form name="fview_etlistsrch" id="fview_etlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_etlistsrch-search-panel" class="<?php echo $view_et_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_et">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_et_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_et_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_et_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_et_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_et_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_et_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_et_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_et_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_et_list->showPageHeader(); ?>
<?php
$view_et_list->showMessage();
?>
<?php if ($view_et_list->TotalRecords > 0 || $view_et->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_et_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_et">
<?php if (!$view_et_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_et_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_et_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_et_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_etlist" id="fview_etlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_et">
<div id="gmp_view_et" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_et_list->TotalRecords > 0 || $view_et_list->isGridEdit()) { ?>
<table id="tbl_view_etlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_et->RowType = ROWTYPE_HEADER;

// Render list options
$view_et_list->renderListOptions();

// Render list options (header, left)
$view_et_list->ListOptions->render("header", "left");
?>
<?php if ($view_et_list->EmbryoNo->Visible) { // EmbryoNo ?>
	<?php if ($view_et_list->SortUrl($view_et_list->EmbryoNo) == "") { ?>
		<th data-name="EmbryoNo" class="<?php echo $view_et_list->EmbryoNo->headerCellClass() ?>"><div id="elh_view_et_EmbryoNo" class="view_et_EmbryoNo"><div class="ew-table-header-caption"><?php echo $view_et_list->EmbryoNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryoNo" class="<?php echo $view_et_list->EmbryoNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_et_list->SortUrl($view_et_list->EmbryoNo) ?>', 1);"><div id="elh_view_et_EmbryoNo" class="view_et_EmbryoNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et_list->EmbryoNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_et_list->EmbryoNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_et_list->EmbryoNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et_list->Stage->Visible) { // Stage ?>
	<?php if ($view_et_list->SortUrl($view_et_list->Stage) == "") { ?>
		<th data-name="Stage" class="<?php echo $view_et_list->Stage->headerCellClass() ?>"><div id="elh_view_et_Stage" class="view_et_Stage"><div class="ew-table-header-caption"><?php echo $view_et_list->Stage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stage" class="<?php echo $view_et_list->Stage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_et_list->SortUrl($view_et_list->Stage) ?>', 1);"><div id="elh_view_et_Stage" class="view_et_Stage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et_list->Stage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_et_list->Stage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_et_list->Stage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et_list->FertilisationDate->Visible) { // FertilisationDate ?>
	<?php if ($view_et_list->SortUrl($view_et_list->FertilisationDate) == "") { ?>
		<th data-name="FertilisationDate" class="<?php echo $view_et_list->FertilisationDate->headerCellClass() ?>"><div id="elh_view_et_FertilisationDate" class="view_et_FertilisationDate"><div class="ew-table-header-caption"><?php echo $view_et_list->FertilisationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FertilisationDate" class="<?php echo $view_et_list->FertilisationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_et_list->SortUrl($view_et_list->FertilisationDate) ?>', 1);"><div id="elh_view_et_FertilisationDate" class="view_et_FertilisationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et_list->FertilisationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_et_list->FertilisationDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_et_list->FertilisationDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et_list->Day->Visible) { // Day ?>
	<?php if ($view_et_list->SortUrl($view_et_list->Day) == "") { ?>
		<th data-name="Day" class="<?php echo $view_et_list->Day->headerCellClass() ?>"><div id="elh_view_et_Day" class="view_et_Day"><div class="ew-table-header-caption"><?php echo $view_et_list->Day->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day" class="<?php echo $view_et_list->Day->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_et_list->SortUrl($view_et_list->Day) ?>', 1);"><div id="elh_view_et_Day" class="view_et_Day">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et_list->Day->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_et_list->Day->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_et_list->Day->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et_list->Grade->Visible) { // Grade ?>
	<?php if ($view_et_list->SortUrl($view_et_list->Grade) == "") { ?>
		<th data-name="Grade" class="<?php echo $view_et_list->Grade->headerCellClass() ?>"><div id="elh_view_et_Grade" class="view_et_Grade"><div class="ew-table-header-caption"><?php echo $view_et_list->Grade->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade" class="<?php echo $view_et_list->Grade->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_et_list->SortUrl($view_et_list->Grade) ?>', 1);"><div id="elh_view_et_Grade" class="view_et_Grade">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et_list->Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_et_list->Grade->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_et_list->Grade->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et_list->Incubator->Visible) { // Incubator ?>
	<?php if ($view_et_list->SortUrl($view_et_list->Incubator) == "") { ?>
		<th data-name="Incubator" class="<?php echo $view_et_list->Incubator->headerCellClass() ?>"><div id="elh_view_et_Incubator" class="view_et_Incubator"><div class="ew-table-header-caption"><?php echo $view_et_list->Incubator->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Incubator" class="<?php echo $view_et_list->Incubator->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_et_list->SortUrl($view_et_list->Incubator) ?>', 1);"><div id="elh_view_et_Incubator" class="view_et_Incubator">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et_list->Incubator->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_et_list->Incubator->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_et_list->Incubator->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et_list->Catheter->Visible) { // Catheter ?>
	<?php if ($view_et_list->SortUrl($view_et_list->Catheter) == "") { ?>
		<th data-name="Catheter" class="<?php echo $view_et_list->Catheter->headerCellClass() ?>"><div id="elh_view_et_Catheter" class="view_et_Catheter"><div class="ew-table-header-caption"><?php echo $view_et_list->Catheter->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Catheter" class="<?php echo $view_et_list->Catheter->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_et_list->SortUrl($view_et_list->Catheter) ?>', 1);"><div id="elh_view_et_Catheter" class="view_et_Catheter">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et_list->Catheter->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_et_list->Catheter->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_et_list->Catheter->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et_list->Difficulty->Visible) { // Difficulty ?>
	<?php if ($view_et_list->SortUrl($view_et_list->Difficulty) == "") { ?>
		<th data-name="Difficulty" class="<?php echo $view_et_list->Difficulty->headerCellClass() ?>"><div id="elh_view_et_Difficulty" class="view_et_Difficulty"><div class="ew-table-header-caption"><?php echo $view_et_list->Difficulty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Difficulty" class="<?php echo $view_et_list->Difficulty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_et_list->SortUrl($view_et_list->Difficulty) ?>', 1);"><div id="elh_view_et_Difficulty" class="view_et_Difficulty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et_list->Difficulty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_et_list->Difficulty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_et_list->Difficulty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et_list->Easy->Visible) { // Easy ?>
	<?php if ($view_et_list->SortUrl($view_et_list->Easy) == "") { ?>
		<th data-name="Easy" class="<?php echo $view_et_list->Easy->headerCellClass() ?>"><div id="elh_view_et_Easy" class="view_et_Easy"><div class="ew-table-header-caption"><?php echo $view_et_list->Easy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Easy" class="<?php echo $view_et_list->Easy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_et_list->SortUrl($view_et_list->Easy) ?>', 1);"><div id="elh_view_et_Easy" class="view_et_Easy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et_list->Easy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_et_list->Easy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_et_list->Easy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et_list->Comments->Visible) { // Comments ?>
	<?php if ($view_et_list->SortUrl($view_et_list->Comments) == "") { ?>
		<th data-name="Comments" class="<?php echo $view_et_list->Comments->headerCellClass() ?>"><div id="elh_view_et_Comments" class="view_et_Comments"><div class="ew-table-header-caption"><?php echo $view_et_list->Comments->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Comments" class="<?php echo $view_et_list->Comments->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_et_list->SortUrl($view_et_list->Comments) ?>', 1);"><div id="elh_view_et_Comments" class="view_et_Comments">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et_list->Comments->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_et_list->Comments->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_et_list->Comments->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et_list->Doctor->Visible) { // Doctor ?>
	<?php if ($view_et_list->SortUrl($view_et_list->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_et_list->Doctor->headerCellClass() ?>"><div id="elh_view_et_Doctor" class="view_et_Doctor"><div class="ew-table-header-caption"><?php echo $view_et_list->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_et_list->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_et_list->SortUrl($view_et_list->Doctor) ?>', 1);"><div id="elh_view_et_Doctor" class="view_et_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et_list->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_et_list->Doctor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_et_list->Doctor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et_list->Embryologist->Visible) { // Embryologist ?>
	<?php if ($view_et_list->SortUrl($view_et_list->Embryologist) == "") { ?>
		<th data-name="Embryologist" class="<?php echo $view_et_list->Embryologist->headerCellClass() ?>"><div id="elh_view_et_Embryologist" class="view_et_Embryologist"><div class="ew-table-header-caption"><?php echo $view_et_list->Embryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Embryologist" class="<?php echo $view_et_list->Embryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_et_list->SortUrl($view_et_list->Embryologist) ?>', 1);"><div id="elh_view_et_Embryologist" class="view_et_Embryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et_list->Embryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_et_list->Embryologist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_et_list->Embryologist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_et_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_et_list->ExportAll && $view_et_list->isExport()) {
	$view_et_list->StopRecord = $view_et_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_et_list->TotalRecords > $view_et_list->StartRecord + $view_et_list->DisplayRecords - 1)
		$view_et_list->StopRecord = $view_et_list->StartRecord + $view_et_list->DisplayRecords - 1;
	else
		$view_et_list->StopRecord = $view_et_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($view_et->isConfirm() || $view_et_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_et_list->FormKeyCountName) && ($view_et_list->isGridAdd() || $view_et_list->isGridEdit() || $view_et->isConfirm())) {
		$view_et_list->KeyCount = $CurrentForm->getValue($view_et_list->FormKeyCountName);
		$view_et_list->StopRecord = $view_et_list->StartRecord + $view_et_list->KeyCount - 1;
	}
}
$view_et_list->RecordCount = $view_et_list->StartRecord - 1;
if ($view_et_list->Recordset && !$view_et_list->Recordset->EOF) {
	$view_et_list->Recordset->moveFirst();
	$selectLimit = $view_et_list->UseSelectLimit;
	if (!$selectLimit && $view_et_list->StartRecord > 1)
		$view_et_list->Recordset->move($view_et_list->StartRecord - 1);
} elseif (!$view_et->AllowAddDeleteRow && $view_et_list->StopRecord == 0) {
	$view_et_list->StopRecord = $view_et->GridAddRowCount;
}

// Initialize aggregate
$view_et->RowType = ROWTYPE_AGGREGATEINIT;
$view_et->resetAttributes();
$view_et_list->renderRow();
$view_et_list->EditRowCount = 0;
if ($view_et_list->isEdit())
	$view_et_list->RowIndex = 1;
if ($view_et_list->isGridEdit())
	$view_et_list->RowIndex = 0;
while ($view_et_list->RecordCount < $view_et_list->StopRecord) {
	$view_et_list->RecordCount++;
	if ($view_et_list->RecordCount >= $view_et_list->StartRecord) {
		$view_et_list->RowCount++;
		if ($view_et_list->isGridAdd() || $view_et_list->isGridEdit() || $view_et->isConfirm()) {
			$view_et_list->RowIndex++;
			$CurrentForm->Index = $view_et_list->RowIndex;
			if ($CurrentForm->hasValue($view_et_list->FormActionName) && ($view_et->isConfirm() || $view_et_list->EventCancelled))
				$view_et_list->RowAction = strval($CurrentForm->getValue($view_et_list->FormActionName));
			elseif ($view_et_list->isGridAdd())
				$view_et_list->RowAction = "insert";
			else
				$view_et_list->RowAction = "";
		}

		// Set up key count
		$view_et_list->KeyCount = $view_et_list->RowIndex;

		// Init row class and style
		$view_et->resetAttributes();
		$view_et->CssClass = "";
		if ($view_et_list->isGridAdd()) {
			$view_et_list->loadRowValues(); // Load default values
		} else {
			$view_et_list->loadRowValues($view_et_list->Recordset); // Load row values
		}
		$view_et->RowType = ROWTYPE_VIEW; // Render view
		if ($view_et_list->isEdit()) {
			if ($view_et_list->checkInlineEditKey() && $view_et_list->EditRowCount == 0) { // Inline edit
				$view_et->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($view_et_list->isGridEdit()) { // Grid edit
			if ($view_et->EventCancelled)
				$view_et_list->restoreCurrentRowFormValues($view_et_list->RowIndex); // Restore form values
			if ($view_et_list->RowAction == "insert")
				$view_et->RowType = ROWTYPE_ADD; // Render add
			else
				$view_et->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_et_list->isEdit() && $view_et->RowType == ROWTYPE_EDIT && $view_et->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$view_et_list->restoreFormValues(); // Restore form values
		}
		if ($view_et_list->isGridEdit() && ($view_et->RowType == ROWTYPE_EDIT || $view_et->RowType == ROWTYPE_ADD) && $view_et->EventCancelled) // Update failed
			$view_et_list->restoreCurrentRowFormValues($view_et_list->RowIndex); // Restore form values
		if ($view_et->RowType == ROWTYPE_EDIT) // Edit row
			$view_et_list->EditRowCount++;

		// Set up row id / data-rowindex
		$view_et->RowAttrs->merge(["data-rowindex" => $view_et_list->RowCount, "id" => "r" . $view_et_list->RowCount . "_view_et", "data-rowtype" => $view_et->RowType]);

		// Render row
		$view_et_list->renderRow();

		// Render list options
		$view_et_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_et_list->RowAction != "delete" && $view_et_list->RowAction != "insertdelete" && !($view_et_list->RowAction == "insert" && $view_et->isConfirm() && $view_et_list->emptyRow())) {
?>
	<tr <?php echo $view_et->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_et_list->ListOptions->render("body", "left", $view_et_list->RowCount);
?>
	<?php if ($view_et_list->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo" <?php echo $view_et_list->EmbryoNo->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_EmbryoNo" class="form-group">
<input type="text" data-table="view_et" data-field="x_EmbryoNo" name="x<?php echo $view_et_list->RowIndex ?>_EmbryoNo" id="x<?php echo $view_et_list->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_list->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $view_et_list->EmbryoNo->EditValue ?>"<?php echo $view_et_list->EmbryoNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_EmbryoNo" name="o<?php echo $view_et_list->RowIndex ?>_EmbryoNo" id="o<?php echo $view_et_list->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($view_et_list->EmbryoNo->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_EmbryoNo" class="form-group">
<span<?php echo $view_et_list->EmbryoNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_et_list->EmbryoNo->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_et" data-field="x_EmbryoNo" name="x<?php echo $view_et_list->RowIndex ?>_EmbryoNo" id="x<?php echo $view_et_list->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($view_et_list->EmbryoNo->CurrentValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_EmbryoNo">
<span<?php echo $view_et_list->EmbryoNo->viewAttributes() ?>><?php echo $view_et_list->EmbryoNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_et" data-field="x_id" name="x<?php echo $view_et_list->RowIndex ?>_id" id="x<?php echo $view_et_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_et_list->id->CurrentValue) ?>">
<input type="hidden" data-table="view_et" data-field="x_id" name="o<?php echo $view_et_list->RowIndex ?>_id" id="o<?php echo $view_et_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_et_list->id->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT || $view_et->CurrentMode == "edit") { ?>
<input type="hidden" data-table="view_et" data-field="x_id" name="x<?php echo $view_et_list->RowIndex ?>_id" id="x<?php echo $view_et_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_et_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($view_et_list->Stage->Visible) { // Stage ?>
		<td data-name="Stage" <?php echo $view_et_list->Stage->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Stage" class="form-group">
<input type="text" data-table="view_et" data-field="x_Stage" name="x<?php echo $view_et_list->RowIndex ?>_Stage" id="x<?php echo $view_et_list->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_list->Stage->getPlaceHolder()) ?>" value="<?php echo $view_et_list->Stage->EditValue ?>"<?php echo $view_et_list->Stage->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Stage" name="o<?php echo $view_et_list->RowIndex ?>_Stage" id="o<?php echo $view_et_list->RowIndex ?>_Stage" value="<?php echo HtmlEncode($view_et_list->Stage->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Stage" class="form-group">
<span<?php echo $view_et_list->Stage->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_et_list->Stage->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_et" data-field="x_Stage" name="x<?php echo $view_et_list->RowIndex ?>_Stage" id="x<?php echo $view_et_list->RowIndex ?>_Stage" value="<?php echo HtmlEncode($view_et_list->Stage->CurrentValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Stage">
<span<?php echo $view_et_list->Stage->viewAttributes() ?>><?php echo $view_et_list->Stage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et_list->FertilisationDate->Visible) { // FertilisationDate ?>
		<td data-name="FertilisationDate" <?php echo $view_et_list->FertilisationDate->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_FertilisationDate" class="form-group">
<input type="text" data-table="view_et" data-field="x_FertilisationDate" name="x<?php echo $view_et_list->RowIndex ?>_FertilisationDate" id="x<?php echo $view_et_list->RowIndex ?>_FertilisationDate" placeholder="<?php echo HtmlEncode($view_et_list->FertilisationDate->getPlaceHolder()) ?>" value="<?php echo $view_et_list->FertilisationDate->EditValue ?>"<?php echo $view_et_list->FertilisationDate->editAttributes() ?>>
<?php if (!$view_et_list->FertilisationDate->ReadOnly && !$view_et_list->FertilisationDate->Disabled && !isset($view_et_list->FertilisationDate->EditAttrs["readonly"]) && !isset($view_et_list->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_etlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_etlist", "x<?php echo $view_et_list->RowIndex ?>_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_et" data-field="x_FertilisationDate" name="o<?php echo $view_et_list->RowIndex ?>_FertilisationDate" id="o<?php echo $view_et_list->RowIndex ?>_FertilisationDate" value="<?php echo HtmlEncode($view_et_list->FertilisationDate->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_FertilisationDate" class="form-group">
<span<?php echo $view_et_list->FertilisationDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_et_list->FertilisationDate->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_et" data-field="x_FertilisationDate" name="x<?php echo $view_et_list->RowIndex ?>_FertilisationDate" id="x<?php echo $view_et_list->RowIndex ?>_FertilisationDate" value="<?php echo HtmlEncode($view_et_list->FertilisationDate->CurrentValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_FertilisationDate">
<span<?php echo $view_et_list->FertilisationDate->viewAttributes() ?>><?php echo $view_et_list->FertilisationDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et_list->Day->Visible) { // Day ?>
		<td data-name="Day" <?php echo $view_et_list->Day->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Day" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_et" data-field="x_Day" data-value-separator="<?php echo $view_et_list->Day->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_et_list->RowIndex ?>_Day" name="x<?php echo $view_et_list->RowIndex ?>_Day"<?php echo $view_et_list->Day->editAttributes() ?>>
			<?php echo $view_et_list->Day->selectOptionListHtml("x{$view_et_list->RowIndex}_Day") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Day" name="o<?php echo $view_et_list->RowIndex ?>_Day" id="o<?php echo $view_et_list->RowIndex ?>_Day" value="<?php echo HtmlEncode($view_et_list->Day->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Day" class="form-group">
<span<?php echo $view_et_list->Day->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_et_list->Day->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_et" data-field="x_Day" name="x<?php echo $view_et_list->RowIndex ?>_Day" id="x<?php echo $view_et_list->RowIndex ?>_Day" value="<?php echo HtmlEncode($view_et_list->Day->CurrentValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Day">
<span<?php echo $view_et_list->Day->viewAttributes() ?>><?php echo $view_et_list->Day->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et_list->Grade->Visible) { // Grade ?>
		<td data-name="Grade" <?php echo $view_et_list->Grade->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Grade" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_et" data-field="x_Grade" data-value-separator="<?php echo $view_et_list->Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_et_list->RowIndex ?>_Grade" name="x<?php echo $view_et_list->RowIndex ?>_Grade"<?php echo $view_et_list->Grade->editAttributes() ?>>
			<?php echo $view_et_list->Grade->selectOptionListHtml("x{$view_et_list->RowIndex}_Grade") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Grade" name="o<?php echo $view_et_list->RowIndex ?>_Grade" id="o<?php echo $view_et_list->RowIndex ?>_Grade" value="<?php echo HtmlEncode($view_et_list->Grade->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Grade" class="form-group">
<span<?php echo $view_et_list->Grade->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_et_list->Grade->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_et" data-field="x_Grade" name="x<?php echo $view_et_list->RowIndex ?>_Grade" id="x<?php echo $view_et_list->RowIndex ?>_Grade" value="<?php echo HtmlEncode($view_et_list->Grade->CurrentValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Grade">
<span<?php echo $view_et_list->Grade->viewAttributes() ?>><?php echo $view_et_list->Grade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et_list->Incubator->Visible) { // Incubator ?>
		<td data-name="Incubator" <?php echo $view_et_list->Incubator->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Incubator" class="form-group">
<input type="text" data-table="view_et" data-field="x_Incubator" name="x<?php echo $view_et_list->RowIndex ?>_Incubator" id="x<?php echo $view_et_list->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_list->Incubator->getPlaceHolder()) ?>" value="<?php echo $view_et_list->Incubator->EditValue ?>"<?php echo $view_et_list->Incubator->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Incubator" name="o<?php echo $view_et_list->RowIndex ?>_Incubator" id="o<?php echo $view_et_list->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($view_et_list->Incubator->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Incubator" class="form-group">
<span<?php echo $view_et_list->Incubator->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_et_list->Incubator->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_et" data-field="x_Incubator" name="x<?php echo $view_et_list->RowIndex ?>_Incubator" id="x<?php echo $view_et_list->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($view_et_list->Incubator->CurrentValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Incubator">
<span<?php echo $view_et_list->Incubator->viewAttributes() ?>><?php echo $view_et_list->Incubator->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et_list->Catheter->Visible) { // Catheter ?>
		<td data-name="Catheter" <?php echo $view_et_list->Catheter->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Catheter" class="form-group">
<input type="text" data-table="view_et" data-field="x_Catheter" name="x<?php echo $view_et_list->RowIndex ?>_Catheter" id="x<?php echo $view_et_list->RowIndex ?>_Catheter" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_list->Catheter->getPlaceHolder()) ?>" value="<?php echo $view_et_list->Catheter->EditValue ?>"<?php echo $view_et_list->Catheter->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Catheter" name="o<?php echo $view_et_list->RowIndex ?>_Catheter" id="o<?php echo $view_et_list->RowIndex ?>_Catheter" value="<?php echo HtmlEncode($view_et_list->Catheter->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Catheter" class="form-group">
<input type="text" data-table="view_et" data-field="x_Catheter" name="x<?php echo $view_et_list->RowIndex ?>_Catheter" id="x<?php echo $view_et_list->RowIndex ?>_Catheter" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_list->Catheter->getPlaceHolder()) ?>" value="<?php echo $view_et_list->Catheter->EditValue ?>"<?php echo $view_et_list->Catheter->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Catheter">
<span<?php echo $view_et_list->Catheter->viewAttributes() ?>><?php echo $view_et_list->Catheter->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et_list->Difficulty->Visible) { // Difficulty ?>
		<td data-name="Difficulty" <?php echo $view_et_list->Difficulty->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Difficulty" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_et" data-field="x_Difficulty" data-value-separator="<?php echo $view_et_list->Difficulty->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_et_list->RowIndex ?>_Difficulty" name="x<?php echo $view_et_list->RowIndex ?>_Difficulty"<?php echo $view_et_list->Difficulty->editAttributes() ?>>
			<?php echo $view_et_list->Difficulty->selectOptionListHtml("x{$view_et_list->RowIndex}_Difficulty") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Difficulty" name="o<?php echo $view_et_list->RowIndex ?>_Difficulty" id="o<?php echo $view_et_list->RowIndex ?>_Difficulty" value="<?php echo HtmlEncode($view_et_list->Difficulty->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Difficulty" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_et" data-field="x_Difficulty" data-value-separator="<?php echo $view_et_list->Difficulty->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_et_list->RowIndex ?>_Difficulty" name="x<?php echo $view_et_list->RowIndex ?>_Difficulty"<?php echo $view_et_list->Difficulty->editAttributes() ?>>
			<?php echo $view_et_list->Difficulty->selectOptionListHtml("x{$view_et_list->RowIndex}_Difficulty") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Difficulty">
<span<?php echo $view_et_list->Difficulty->viewAttributes() ?>><?php echo $view_et_list->Difficulty->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et_list->Easy->Visible) { // Easy ?>
		<td data-name="Easy" <?php echo $view_et_list->Easy->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Easy" class="form-group">
<div id="tp_x<?php echo $view_et_list->RowIndex ?>_Easy" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_et" data-field="x_Easy" data-value-separator="<?php echo $view_et_list->Easy->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_et_list->RowIndex ?>_Easy[]" id="x<?php echo $view_et_list->RowIndex ?>_Easy[]" value="{value}"<?php echo $view_et_list->Easy->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_et_list->RowIndex ?>_Easy" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_et_list->Easy->checkBoxListHtml(FALSE, "x{$view_et_list->RowIndex}_Easy[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Easy" name="o<?php echo $view_et_list->RowIndex ?>_Easy[]" id="o<?php echo $view_et_list->RowIndex ?>_Easy[]" value="<?php echo HtmlEncode($view_et_list->Easy->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Easy" class="form-group">
<div id="tp_x<?php echo $view_et_list->RowIndex ?>_Easy" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_et" data-field="x_Easy" data-value-separator="<?php echo $view_et_list->Easy->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_et_list->RowIndex ?>_Easy[]" id="x<?php echo $view_et_list->RowIndex ?>_Easy[]" value="{value}"<?php echo $view_et_list->Easy->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_et_list->RowIndex ?>_Easy" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_et_list->Easy->checkBoxListHtml(FALSE, "x{$view_et_list->RowIndex}_Easy[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Easy">
<span<?php echo $view_et_list->Easy->viewAttributes() ?>><?php echo $view_et_list->Easy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et_list->Comments->Visible) { // Comments ?>
		<td data-name="Comments" <?php echo $view_et_list->Comments->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Comments" class="form-group">
<input type="text" data-table="view_et" data-field="x_Comments" name="x<?php echo $view_et_list->RowIndex ?>_Comments" id="x<?php echo $view_et_list->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_list->Comments->getPlaceHolder()) ?>" value="<?php echo $view_et_list->Comments->EditValue ?>"<?php echo $view_et_list->Comments->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Comments" name="o<?php echo $view_et_list->RowIndex ?>_Comments" id="o<?php echo $view_et_list->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_et_list->Comments->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Comments" class="form-group">
<input type="text" data-table="view_et" data-field="x_Comments" name="x<?php echo $view_et_list->RowIndex ?>_Comments" id="x<?php echo $view_et_list->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_list->Comments->getPlaceHolder()) ?>" value="<?php echo $view_et_list->Comments->EditValue ?>"<?php echo $view_et_list->Comments->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Comments">
<span<?php echo $view_et_list->Comments->viewAttributes() ?>><?php echo $view_et_list->Comments->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et_list->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor" <?php echo $view_et_list->Doctor->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Doctor" class="form-group">
<input type="text" data-table="view_et" data-field="x_Doctor" name="x<?php echo $view_et_list->RowIndex ?>_Doctor" id="x<?php echo $view_et_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_list->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_et_list->Doctor->EditValue ?>"<?php echo $view_et_list->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Doctor" name="o<?php echo $view_et_list->RowIndex ?>_Doctor" id="o<?php echo $view_et_list->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($view_et_list->Doctor->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Doctor" class="form-group">
<input type="text" data-table="view_et" data-field="x_Doctor" name="x<?php echo $view_et_list->RowIndex ?>_Doctor" id="x<?php echo $view_et_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_list->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_et_list->Doctor->EditValue ?>"<?php echo $view_et_list->Doctor->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Doctor">
<span<?php echo $view_et_list->Doctor->viewAttributes() ?>><?php echo $view_et_list->Doctor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et_list->Embryologist->Visible) { // Embryologist ?>
		<td data-name="Embryologist" <?php echo $view_et_list->Embryologist->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Embryologist" class="form-group">
<input type="text" data-table="view_et" data-field="x_Embryologist" name="x<?php echo $view_et_list->RowIndex ?>_Embryologist" id="x<?php echo $view_et_list->RowIndex ?>_Embryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_list->Embryologist->getPlaceHolder()) ?>" value="<?php echo $view_et_list->Embryologist->EditValue ?>"<?php echo $view_et_list->Embryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Embryologist" name="o<?php echo $view_et_list->RowIndex ?>_Embryologist" id="o<?php echo $view_et_list->RowIndex ?>_Embryologist" value="<?php echo HtmlEncode($view_et_list->Embryologist->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Embryologist" class="form-group">
<input type="text" data-table="view_et" data-field="x_Embryologist" name="x<?php echo $view_et_list->RowIndex ?>_Embryologist" id="x<?php echo $view_et_list->RowIndex ?>_Embryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_list->Embryologist->getPlaceHolder()) ?>" value="<?php echo $view_et_list->Embryologist->EditValue ?>"<?php echo $view_et_list->Embryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCount ?>_view_et_Embryologist">
<span<?php echo $view_et_list->Embryologist->viewAttributes() ?>><?php echo $view_et_list->Embryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_et_list->ListOptions->render("body", "right", $view_et_list->RowCount);
?>
	</tr>
<?php if ($view_et->RowType == ROWTYPE_ADD || $view_et->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_etlist", "load"], function() {
	fview_etlist.updateLists(<?php echo $view_et_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_et_list->isGridAdd())
		if (!$view_et_list->Recordset->EOF)
			$view_et_list->Recordset->moveNext();
}
?>
<?php
	if ($view_et_list->isGridAdd() || $view_et_list->isGridEdit()) {
		$view_et_list->RowIndex = '$rowindex$';
		$view_et_list->loadRowValues();

		// Set row properties
		$view_et->resetAttributes();
		$view_et->RowAttrs->merge(["data-rowindex" => $view_et_list->RowIndex, "id" => "r0_view_et", "data-rowtype" => ROWTYPE_ADD]);
		$view_et->RowAttrs->appendClass("ew-template");
		$view_et->RowType = ROWTYPE_ADD;

		// Render row
		$view_et_list->renderRow();

		// Render list options
		$view_et_list->renderListOptions();
		$view_et_list->StartRowCount = 0;
?>
	<tr <?php echo $view_et->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_et_list->ListOptions->render("body", "left", $view_et_list->RowIndex);
?>
	<?php if ($view_et_list->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo">
<span id="el$rowindex$_view_et_EmbryoNo" class="form-group view_et_EmbryoNo">
<input type="text" data-table="view_et" data-field="x_EmbryoNo" name="x<?php echo $view_et_list->RowIndex ?>_EmbryoNo" id="x<?php echo $view_et_list->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_list->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $view_et_list->EmbryoNo->EditValue ?>"<?php echo $view_et_list->EmbryoNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_EmbryoNo" name="o<?php echo $view_et_list->RowIndex ?>_EmbryoNo" id="o<?php echo $view_et_list->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($view_et_list->EmbryoNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et_list->Stage->Visible) { // Stage ?>
		<td data-name="Stage">
<span id="el$rowindex$_view_et_Stage" class="form-group view_et_Stage">
<input type="text" data-table="view_et" data-field="x_Stage" name="x<?php echo $view_et_list->RowIndex ?>_Stage" id="x<?php echo $view_et_list->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_list->Stage->getPlaceHolder()) ?>" value="<?php echo $view_et_list->Stage->EditValue ?>"<?php echo $view_et_list->Stage->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Stage" name="o<?php echo $view_et_list->RowIndex ?>_Stage" id="o<?php echo $view_et_list->RowIndex ?>_Stage" value="<?php echo HtmlEncode($view_et_list->Stage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et_list->FertilisationDate->Visible) { // FertilisationDate ?>
		<td data-name="FertilisationDate">
<span id="el$rowindex$_view_et_FertilisationDate" class="form-group view_et_FertilisationDate">
<input type="text" data-table="view_et" data-field="x_FertilisationDate" name="x<?php echo $view_et_list->RowIndex ?>_FertilisationDate" id="x<?php echo $view_et_list->RowIndex ?>_FertilisationDate" placeholder="<?php echo HtmlEncode($view_et_list->FertilisationDate->getPlaceHolder()) ?>" value="<?php echo $view_et_list->FertilisationDate->EditValue ?>"<?php echo $view_et_list->FertilisationDate->editAttributes() ?>>
<?php if (!$view_et_list->FertilisationDate->ReadOnly && !$view_et_list->FertilisationDate->Disabled && !isset($view_et_list->FertilisationDate->EditAttrs["readonly"]) && !isset($view_et_list->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_etlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_etlist", "x<?php echo $view_et_list->RowIndex ?>_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_et" data-field="x_FertilisationDate" name="o<?php echo $view_et_list->RowIndex ?>_FertilisationDate" id="o<?php echo $view_et_list->RowIndex ?>_FertilisationDate" value="<?php echo HtmlEncode($view_et_list->FertilisationDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et_list->Day->Visible) { // Day ?>
		<td data-name="Day">
<span id="el$rowindex$_view_et_Day" class="form-group view_et_Day">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_et" data-field="x_Day" data-value-separator="<?php echo $view_et_list->Day->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_et_list->RowIndex ?>_Day" name="x<?php echo $view_et_list->RowIndex ?>_Day"<?php echo $view_et_list->Day->editAttributes() ?>>
			<?php echo $view_et_list->Day->selectOptionListHtml("x{$view_et_list->RowIndex}_Day") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Day" name="o<?php echo $view_et_list->RowIndex ?>_Day" id="o<?php echo $view_et_list->RowIndex ?>_Day" value="<?php echo HtmlEncode($view_et_list->Day->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et_list->Grade->Visible) { // Grade ?>
		<td data-name="Grade">
<span id="el$rowindex$_view_et_Grade" class="form-group view_et_Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_et" data-field="x_Grade" data-value-separator="<?php echo $view_et_list->Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_et_list->RowIndex ?>_Grade" name="x<?php echo $view_et_list->RowIndex ?>_Grade"<?php echo $view_et_list->Grade->editAttributes() ?>>
			<?php echo $view_et_list->Grade->selectOptionListHtml("x{$view_et_list->RowIndex}_Grade") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Grade" name="o<?php echo $view_et_list->RowIndex ?>_Grade" id="o<?php echo $view_et_list->RowIndex ?>_Grade" value="<?php echo HtmlEncode($view_et_list->Grade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et_list->Incubator->Visible) { // Incubator ?>
		<td data-name="Incubator">
<span id="el$rowindex$_view_et_Incubator" class="form-group view_et_Incubator">
<input type="text" data-table="view_et" data-field="x_Incubator" name="x<?php echo $view_et_list->RowIndex ?>_Incubator" id="x<?php echo $view_et_list->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_list->Incubator->getPlaceHolder()) ?>" value="<?php echo $view_et_list->Incubator->EditValue ?>"<?php echo $view_et_list->Incubator->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Incubator" name="o<?php echo $view_et_list->RowIndex ?>_Incubator" id="o<?php echo $view_et_list->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($view_et_list->Incubator->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et_list->Catheter->Visible) { // Catheter ?>
		<td data-name="Catheter">
<span id="el$rowindex$_view_et_Catheter" class="form-group view_et_Catheter">
<input type="text" data-table="view_et" data-field="x_Catheter" name="x<?php echo $view_et_list->RowIndex ?>_Catheter" id="x<?php echo $view_et_list->RowIndex ?>_Catheter" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_list->Catheter->getPlaceHolder()) ?>" value="<?php echo $view_et_list->Catheter->EditValue ?>"<?php echo $view_et_list->Catheter->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Catheter" name="o<?php echo $view_et_list->RowIndex ?>_Catheter" id="o<?php echo $view_et_list->RowIndex ?>_Catheter" value="<?php echo HtmlEncode($view_et_list->Catheter->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et_list->Difficulty->Visible) { // Difficulty ?>
		<td data-name="Difficulty">
<span id="el$rowindex$_view_et_Difficulty" class="form-group view_et_Difficulty">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_et" data-field="x_Difficulty" data-value-separator="<?php echo $view_et_list->Difficulty->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_et_list->RowIndex ?>_Difficulty" name="x<?php echo $view_et_list->RowIndex ?>_Difficulty"<?php echo $view_et_list->Difficulty->editAttributes() ?>>
			<?php echo $view_et_list->Difficulty->selectOptionListHtml("x{$view_et_list->RowIndex}_Difficulty") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Difficulty" name="o<?php echo $view_et_list->RowIndex ?>_Difficulty" id="o<?php echo $view_et_list->RowIndex ?>_Difficulty" value="<?php echo HtmlEncode($view_et_list->Difficulty->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et_list->Easy->Visible) { // Easy ?>
		<td data-name="Easy">
<span id="el$rowindex$_view_et_Easy" class="form-group view_et_Easy">
<div id="tp_x<?php echo $view_et_list->RowIndex ?>_Easy" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_et" data-field="x_Easy" data-value-separator="<?php echo $view_et_list->Easy->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_et_list->RowIndex ?>_Easy[]" id="x<?php echo $view_et_list->RowIndex ?>_Easy[]" value="{value}"<?php echo $view_et_list->Easy->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_et_list->RowIndex ?>_Easy" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_et_list->Easy->checkBoxListHtml(FALSE, "x{$view_et_list->RowIndex}_Easy[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Easy" name="o<?php echo $view_et_list->RowIndex ?>_Easy[]" id="o<?php echo $view_et_list->RowIndex ?>_Easy[]" value="<?php echo HtmlEncode($view_et_list->Easy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et_list->Comments->Visible) { // Comments ?>
		<td data-name="Comments">
<span id="el$rowindex$_view_et_Comments" class="form-group view_et_Comments">
<input type="text" data-table="view_et" data-field="x_Comments" name="x<?php echo $view_et_list->RowIndex ?>_Comments" id="x<?php echo $view_et_list->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_list->Comments->getPlaceHolder()) ?>" value="<?php echo $view_et_list->Comments->EditValue ?>"<?php echo $view_et_list->Comments->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Comments" name="o<?php echo $view_et_list->RowIndex ?>_Comments" id="o<?php echo $view_et_list->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_et_list->Comments->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et_list->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor">
<span id="el$rowindex$_view_et_Doctor" class="form-group view_et_Doctor">
<input type="text" data-table="view_et" data-field="x_Doctor" name="x<?php echo $view_et_list->RowIndex ?>_Doctor" id="x<?php echo $view_et_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_list->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_et_list->Doctor->EditValue ?>"<?php echo $view_et_list->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Doctor" name="o<?php echo $view_et_list->RowIndex ?>_Doctor" id="o<?php echo $view_et_list->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($view_et_list->Doctor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et_list->Embryologist->Visible) { // Embryologist ?>
		<td data-name="Embryologist">
<span id="el$rowindex$_view_et_Embryologist" class="form-group view_et_Embryologist">
<input type="text" data-table="view_et" data-field="x_Embryologist" name="x<?php echo $view_et_list->RowIndex ?>_Embryologist" id="x<?php echo $view_et_list->RowIndex ?>_Embryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_list->Embryologist->getPlaceHolder()) ?>" value="<?php echo $view_et_list->Embryologist->EditValue ?>"<?php echo $view_et_list->Embryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Embryologist" name="o<?php echo $view_et_list->RowIndex ?>_Embryologist" id="o<?php echo $view_et_list->RowIndex ?>_Embryologist" value="<?php echo HtmlEncode($view_et_list->Embryologist->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_et_list->ListOptions->render("body", "right", $view_et_list->RowIndex);
?>
<script>
loadjs.ready(["fview_etlist", "load"], function() {
	fview_etlist.updateLists(<?php echo $view_et_list->RowIndex ?>);
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
<?php if ($view_et_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $view_et_list->FormKeyCountName ?>" id="<?php echo $view_et_list->FormKeyCountName ?>" value="<?php echo $view_et_list->KeyCount ?>">
<?php } ?>
<?php if ($view_et_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_et_list->FormKeyCountName ?>" id="<?php echo $view_et_list->FormKeyCountName ?>" value="<?php echo $view_et_list->KeyCount ?>">
<?php echo $view_et_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_et->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_et_list->Recordset)
	$view_et_list->Recordset->Close();
?>
<?php if (!$view_et_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_et_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_et_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_et_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_et_list->TotalRecords == 0 && !$view_et->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_et_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_et_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_et_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_et->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_et",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_et_list->terminate();
?>