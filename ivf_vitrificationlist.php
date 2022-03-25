<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$ivf_vitrification_list = new ivf_vitrification_list();

// Run the page
$ivf_vitrification_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_vitrification_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_vitrification->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fivf_vitrificationlist = currentForm = new ew.Form("fivf_vitrificationlist", "list");
fivf_vitrificationlist.formKeyCountName = '<?php echo $ivf_vitrification_list->FormKeyCountName ?>';

// Validate form
fivf_vitrificationlist.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
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
		<?php if ($ivf_vitrification_list->vitrificationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_vitrificationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->vitrificationDate->caption(), $ivf_vitrification->vitrificationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_vitrificationDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_vitrification->vitrificationDate->errorMessage()) ?>");
		<?php if ($ivf_vitrification_list->PrimaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_PrimaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->PrimaryEmbryologist->caption(), $ivf_vitrification->PrimaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_list->SecondaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_SecondaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->SecondaryEmbryologist->caption(), $ivf_vitrification->SecondaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_list->EmbryoNo->Required) { ?>
			elm = this.getElements("x" + infix + "_EmbryoNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->EmbryoNo->caption(), $ivf_vitrification->EmbryoNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_list->FertilisationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_FertilisationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->FertilisationDate->caption(), $ivf_vitrification->FertilisationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FertilisationDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_vitrification->FertilisationDate->errorMessage()) ?>");
		<?php if ($ivf_vitrification_list->Day->Required) { ?>
			elm = this.getElements("x" + infix + "_Day");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Day->caption(), $ivf_vitrification->Day->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_list->Grade->Required) { ?>
			elm = this.getElements("x" + infix + "_Grade");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Grade->caption(), $ivf_vitrification->Grade->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_list->Incubator->Required) { ?>
			elm = this.getElements("x" + infix + "_Incubator");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Incubator->caption(), $ivf_vitrification->Incubator->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_list->Tank->Required) { ?>
			elm = this.getElements("x" + infix + "_Tank");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Tank->caption(), $ivf_vitrification->Tank->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_list->Canister->Required) { ?>
			elm = this.getElements("x" + infix + "_Canister");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Canister->caption(), $ivf_vitrification->Canister->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_list->Gobiet->Required) { ?>
			elm = this.getElements("x" + infix + "_Gobiet");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Gobiet->caption(), $ivf_vitrification->Gobiet->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_list->CryolockNo->Required) { ?>
			elm = this.getElements("x" + infix + "_CryolockNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->CryolockNo->caption(), $ivf_vitrification->CryolockNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_list->CryolockColour->Required) { ?>
			elm = this.getElements("x" + infix + "_CryolockColour");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->CryolockColour->caption(), $ivf_vitrification->CryolockColour->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_list->Stage->Required) { ?>
			elm = this.getElements("x" + infix + "_Stage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Stage->caption(), $ivf_vitrification->Stage->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
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
fivf_vitrificationlist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "vitrificationDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrimaryEmbryologist", false)) return false;
	if (ew.valueChanged(fobj, infix, "SecondaryEmbryologist", false)) return false;
	if (ew.valueChanged(fobj, infix, "EmbryoNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "FertilisationDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day", false)) return false;
	if (ew.valueChanged(fobj, infix, "Grade", false)) return false;
	if (ew.valueChanged(fobj, infix, "Incubator", false)) return false;
	if (ew.valueChanged(fobj, infix, "Tank", false)) return false;
	if (ew.valueChanged(fobj, infix, "Canister", false)) return false;
	if (ew.valueChanged(fobj, infix, "Gobiet", false)) return false;
	if (ew.valueChanged(fobj, infix, "CryolockNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "CryolockColour", false)) return false;
	if (ew.valueChanged(fobj, infix, "Stage", false)) return false;
	return true;
}

// Form_CustomValidate event
fivf_vitrificationlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_vitrificationlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_vitrificationlist.lists["x_Day"] = <?php echo $ivf_vitrification_list->Day->Lookup->toClientList() ?>;
fivf_vitrificationlist.lists["x_Day"].options = <?php echo JsonEncode($ivf_vitrification_list->Day->options(FALSE, TRUE)) ?>;
fivf_vitrificationlist.lists["x_Grade"] = <?php echo $ivf_vitrification_list->Grade->Lookup->toClientList() ?>;
fivf_vitrificationlist.lists["x_Grade"].options = <?php echo JsonEncode($ivf_vitrification_list->Grade->options(FALSE, TRUE)) ?>;

// Form object for search
var fivf_vitrificationlistsrch = currentSearchForm = new ew.Form("fivf_vitrificationlistsrch");

// Filters
fivf_vitrificationlistsrch.filterList = <?php echo $ivf_vitrification_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
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
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_vitrification->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_vitrification_list->TotalRecs > 0 && $ivf_vitrification_list->ExportOptions->visible()) { ?>
<?php $ivf_vitrification_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_vitrification_list->ImportOptions->visible()) { ?>
<?php $ivf_vitrification_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_vitrification_list->SearchOptions->visible()) { ?>
<?php $ivf_vitrification_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_vitrification_list->FilterOptions->visible()) { ?>
<?php $ivf_vitrification_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_vitrification_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_vitrification->isExport() && !$ivf_vitrification->CurrentAction) { ?>
<form name="fivf_vitrificationlistsrch" id="fivf_vitrificationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ivf_vitrification_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fivf_vitrificationlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_vitrification">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ivf_vitrification_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ivf_vitrification_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_vitrification_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_vitrification_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_vitrification_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_vitrification_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_vitrification_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ivf_vitrification_list->showPageHeader(); ?>
<?php
$ivf_vitrification_list->showMessage();
?>
<?php if ($ivf_vitrification_list->TotalRecs > 0 || $ivf_vitrification->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_vitrification_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_vitrification">
<?php if (!$ivf_vitrification->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_vitrification->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_vitrification_list->Pager)) $ivf_vitrification_list->Pager = new NumericPager($ivf_vitrification_list->StartRec, $ivf_vitrification_list->DisplayRecs, $ivf_vitrification_list->TotalRecs, $ivf_vitrification_list->RecRange, $ivf_vitrification_list->AutoHidePager) ?>
<?php if ($ivf_vitrification_list->Pager->RecordCount > 0 && $ivf_vitrification_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_vitrification_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_vitrification_list->pageUrl() ?>start=<?php echo $ivf_vitrification_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_vitrification_list->pageUrl() ?>start=<?php echo $ivf_vitrification_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_vitrification_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_vitrification_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_vitrification_list->pageUrl() ?>start=<?php echo $ivf_vitrification_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_vitrification_list->pageUrl() ?>start=<?php echo $ivf_vitrification_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_vitrification_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_vitrification_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_vitrification_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_vitrification_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_vitrification_list->TotalRecs > 0 && (!$ivf_vitrification_list->AutoHidePageSizeSelector || $ivf_vitrification_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_vitrification">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_vitrification_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_vitrification_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_vitrification_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_vitrification_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_vitrification_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_vitrification_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_vitrification->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_vitrification_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_vitrificationlist" id="fivf_vitrificationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_vitrification_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_vitrification_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_vitrification">
<div id="gmp_ivf_vitrification" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ivf_vitrification_list->TotalRecs > 0 || $ivf_vitrification->isGridEdit()) { ?>
<table id="tbl_ivf_vitrificationlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_vitrification_list->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_vitrification_list->renderListOptions();

// Render list options (header, left)
$ivf_vitrification_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_vitrification->vitrificationDate->Visible) { // vitrificationDate ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->vitrificationDate) == "") { ?>
		<th data-name="vitrificationDate" class="<?php echo $ivf_vitrification->vitrificationDate->headerCellClass() ?>"><div id="elh_ivf_vitrification_vitrificationDate" class="ivf_vitrification_vitrificationDate"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->vitrificationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitrificationDate" class="<?php echo $ivf_vitrification->vitrificationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_vitrification->SortUrl($ivf_vitrification->vitrificationDate) ?>',1);"><div id="elh_ivf_vitrification_vitrificationDate" class="ivf_vitrification_vitrificationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->vitrificationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->vitrificationDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->vitrificationDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->PrimaryEmbryologist) == "") { ?>
		<th data-name="PrimaryEmbryologist" class="<?php echo $ivf_vitrification->PrimaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_vitrification_PrimaryEmbryologist" class="ivf_vitrification_PrimaryEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->PrimaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrimaryEmbryologist" class="<?php echo $ivf_vitrification->PrimaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_vitrification->SortUrl($ivf_vitrification->PrimaryEmbryologist) ?>',1);"><div id="elh_ivf_vitrification_PrimaryEmbryologist" class="ivf_vitrification_PrimaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->PrimaryEmbryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->PrimaryEmbryologist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->PrimaryEmbryologist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->SecondaryEmbryologist) == "") { ?>
		<th data-name="SecondaryEmbryologist" class="<?php echo $ivf_vitrification->SecondaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_vitrification_SecondaryEmbryologist" class="ivf_vitrification_SecondaryEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->SecondaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SecondaryEmbryologist" class="<?php echo $ivf_vitrification->SecondaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_vitrification->SortUrl($ivf_vitrification->SecondaryEmbryologist) ?>',1);"><div id="elh_ivf_vitrification_SecondaryEmbryologist" class="ivf_vitrification_SecondaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->SecondaryEmbryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->SecondaryEmbryologist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->SecondaryEmbryologist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->EmbryoNo->Visible) { // EmbryoNo ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->EmbryoNo) == "") { ?>
		<th data-name="EmbryoNo" class="<?php echo $ivf_vitrification->EmbryoNo->headerCellClass() ?>"><div id="elh_ivf_vitrification_EmbryoNo" class="ivf_vitrification_EmbryoNo"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->EmbryoNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryoNo" class="<?php echo $ivf_vitrification->EmbryoNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_vitrification->SortUrl($ivf_vitrification->EmbryoNo) ?>',1);"><div id="elh_ivf_vitrification_EmbryoNo" class="ivf_vitrification_EmbryoNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->EmbryoNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->EmbryoNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->EmbryoNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->FertilisationDate->Visible) { // FertilisationDate ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->FertilisationDate) == "") { ?>
		<th data-name="FertilisationDate" class="<?php echo $ivf_vitrification->FertilisationDate->headerCellClass() ?>"><div id="elh_ivf_vitrification_FertilisationDate" class="ivf_vitrification_FertilisationDate"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->FertilisationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FertilisationDate" class="<?php echo $ivf_vitrification->FertilisationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_vitrification->SortUrl($ivf_vitrification->FertilisationDate) ?>',1);"><div id="elh_ivf_vitrification_FertilisationDate" class="ivf_vitrification_FertilisationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->FertilisationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->FertilisationDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->FertilisationDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Day->Visible) { // Day ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->Day) == "") { ?>
		<th data-name="Day" class="<?php echo $ivf_vitrification->Day->headerCellClass() ?>"><div id="elh_ivf_vitrification_Day" class="ivf_vitrification_Day"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->Day->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day" class="<?php echo $ivf_vitrification->Day->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_vitrification->SortUrl($ivf_vitrification->Day) ?>',1);"><div id="elh_ivf_vitrification_Day" class="ivf_vitrification_Day">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->Day->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->Day->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->Day->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Grade->Visible) { // Grade ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->Grade) == "") { ?>
		<th data-name="Grade" class="<?php echo $ivf_vitrification->Grade->headerCellClass() ?>"><div id="elh_ivf_vitrification_Grade" class="ivf_vitrification_Grade"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->Grade->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade" class="<?php echo $ivf_vitrification->Grade->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_vitrification->SortUrl($ivf_vitrification->Grade) ?>',1);"><div id="elh_ivf_vitrification_Grade" class="ivf_vitrification_Grade">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->Grade->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->Grade->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Incubator->Visible) { // Incubator ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->Incubator) == "") { ?>
		<th data-name="Incubator" class="<?php echo $ivf_vitrification->Incubator->headerCellClass() ?>"><div id="elh_ivf_vitrification_Incubator" class="ivf_vitrification_Incubator"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->Incubator->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Incubator" class="<?php echo $ivf_vitrification->Incubator->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_vitrification->SortUrl($ivf_vitrification->Incubator) ?>',1);"><div id="elh_ivf_vitrification_Incubator" class="ivf_vitrification_Incubator">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->Incubator->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->Incubator->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->Incubator->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Tank->Visible) { // Tank ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->Tank) == "") { ?>
		<th data-name="Tank" class="<?php echo $ivf_vitrification->Tank->headerCellClass() ?>"><div id="elh_ivf_vitrification_Tank" class="ivf_vitrification_Tank"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->Tank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tank" class="<?php echo $ivf_vitrification->Tank->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_vitrification->SortUrl($ivf_vitrification->Tank) ?>',1);"><div id="elh_ivf_vitrification_Tank" class="ivf_vitrification_Tank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->Tank->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->Tank->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->Tank->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Canister->Visible) { // Canister ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->Canister) == "") { ?>
		<th data-name="Canister" class="<?php echo $ivf_vitrification->Canister->headerCellClass() ?>"><div id="elh_ivf_vitrification_Canister" class="ivf_vitrification_Canister"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->Canister->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Canister" class="<?php echo $ivf_vitrification->Canister->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_vitrification->SortUrl($ivf_vitrification->Canister) ?>',1);"><div id="elh_ivf_vitrification_Canister" class="ivf_vitrification_Canister">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->Canister->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->Canister->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->Canister->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Gobiet->Visible) { // Gobiet ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->Gobiet) == "") { ?>
		<th data-name="Gobiet" class="<?php echo $ivf_vitrification->Gobiet->headerCellClass() ?>"><div id="elh_ivf_vitrification_Gobiet" class="ivf_vitrification_Gobiet"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->Gobiet->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gobiet" class="<?php echo $ivf_vitrification->Gobiet->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_vitrification->SortUrl($ivf_vitrification->Gobiet) ?>',1);"><div id="elh_ivf_vitrification_Gobiet" class="ivf_vitrification_Gobiet">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->Gobiet->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->Gobiet->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->Gobiet->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->CryolockNo->Visible) { // CryolockNo ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->CryolockNo) == "") { ?>
		<th data-name="CryolockNo" class="<?php echo $ivf_vitrification->CryolockNo->headerCellClass() ?>"><div id="elh_ivf_vitrification_CryolockNo" class="ivf_vitrification_CryolockNo"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->CryolockNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CryolockNo" class="<?php echo $ivf_vitrification->CryolockNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_vitrification->SortUrl($ivf_vitrification->CryolockNo) ?>',1);"><div id="elh_ivf_vitrification_CryolockNo" class="ivf_vitrification_CryolockNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->CryolockNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->CryolockNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->CryolockNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->CryolockColour->Visible) { // CryolockColour ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->CryolockColour) == "") { ?>
		<th data-name="CryolockColour" class="<?php echo $ivf_vitrification->CryolockColour->headerCellClass() ?>"><div id="elh_ivf_vitrification_CryolockColour" class="ivf_vitrification_CryolockColour"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->CryolockColour->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CryolockColour" class="<?php echo $ivf_vitrification->CryolockColour->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_vitrification->SortUrl($ivf_vitrification->CryolockColour) ?>',1);"><div id="elh_ivf_vitrification_CryolockColour" class="ivf_vitrification_CryolockColour">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->CryolockColour->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->CryolockColour->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->CryolockColour->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Stage->Visible) { // Stage ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->Stage) == "") { ?>
		<th data-name="Stage" class="<?php echo $ivf_vitrification->Stage->headerCellClass() ?>"><div id="elh_ivf_vitrification_Stage" class="ivf_vitrification_Stage"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->Stage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stage" class="<?php echo $ivf_vitrification->Stage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_vitrification->SortUrl($ivf_vitrification->Stage) ?>',1);"><div id="elh_ivf_vitrification_Stage" class="ivf_vitrification_Stage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->Stage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->Stage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->Stage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_vitrification_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_vitrification->ExportAll && $ivf_vitrification->isExport()) {
	$ivf_vitrification_list->StopRec = $ivf_vitrification_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ivf_vitrification_list->TotalRecs > $ivf_vitrification_list->StartRec + $ivf_vitrification_list->DisplayRecs - 1)
		$ivf_vitrification_list->StopRec = $ivf_vitrification_list->StartRec + $ivf_vitrification_list->DisplayRecs - 1;
	else
		$ivf_vitrification_list->StopRec = $ivf_vitrification_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $ivf_vitrification_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_vitrification_list->FormKeyCountName) && ($ivf_vitrification->isGridAdd() || $ivf_vitrification->isGridEdit() || $ivf_vitrification->isConfirm())) {
		$ivf_vitrification_list->KeyCount = $CurrentForm->getValue($ivf_vitrification_list->FormKeyCountName);
		$ivf_vitrification_list->StopRec = $ivf_vitrification_list->StartRec + $ivf_vitrification_list->KeyCount - 1;
	}
}
$ivf_vitrification_list->RecCnt = $ivf_vitrification_list->StartRec - 1;
if ($ivf_vitrification_list->Recordset && !$ivf_vitrification_list->Recordset->EOF) {
	$ivf_vitrification_list->Recordset->moveFirst();
	$selectLimit = $ivf_vitrification_list->UseSelectLimit;
	if (!$selectLimit && $ivf_vitrification_list->StartRec > 1)
		$ivf_vitrification_list->Recordset->move($ivf_vitrification_list->StartRec - 1);
} elseif (!$ivf_vitrification->AllowAddDeleteRow && $ivf_vitrification_list->StopRec == 0) {
	$ivf_vitrification_list->StopRec = $ivf_vitrification->GridAddRowCount;
}

// Initialize aggregate
$ivf_vitrification->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_vitrification->resetAttributes();
$ivf_vitrification_list->renderRow();
if ($ivf_vitrification->isGridAdd())
	$ivf_vitrification_list->RowIndex = 0;
if ($ivf_vitrification->isGridEdit())
	$ivf_vitrification_list->RowIndex = 0;
while ($ivf_vitrification_list->RecCnt < $ivf_vitrification_list->StopRec) {
	$ivf_vitrification_list->RecCnt++;
	if ($ivf_vitrification_list->RecCnt >= $ivf_vitrification_list->StartRec) {
		$ivf_vitrification_list->RowCnt++;
		if ($ivf_vitrification->isGridAdd() || $ivf_vitrification->isGridEdit() || $ivf_vitrification->isConfirm()) {
			$ivf_vitrification_list->RowIndex++;
			$CurrentForm->Index = $ivf_vitrification_list->RowIndex;
			if ($CurrentForm->hasValue($ivf_vitrification_list->FormActionName) && $ivf_vitrification_list->EventCancelled)
				$ivf_vitrification_list->RowAction = strval($CurrentForm->getValue($ivf_vitrification_list->FormActionName));
			elseif ($ivf_vitrification->isGridAdd())
				$ivf_vitrification_list->RowAction = "insert";
			else
				$ivf_vitrification_list->RowAction = "";
		}

		// Set up key count
		$ivf_vitrification_list->KeyCount = $ivf_vitrification_list->RowIndex;

		// Init row class and style
		$ivf_vitrification->resetAttributes();
		$ivf_vitrification->CssClass = "";
		if ($ivf_vitrification->isGridAdd()) {
			$ivf_vitrification_list->loadRowValues(); // Load default values
		} else {
			$ivf_vitrification_list->loadRowValues($ivf_vitrification_list->Recordset); // Load row values
		}
		$ivf_vitrification->RowType = ROWTYPE_VIEW; // Render view
		if ($ivf_vitrification->isGridAdd()) // Grid add
			$ivf_vitrification->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_vitrification->isGridAdd() && $ivf_vitrification->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_vitrification_list->restoreCurrentRowFormValues($ivf_vitrification_list->RowIndex); // Restore form values
		if ($ivf_vitrification->isGridEdit()) { // Grid edit
			if ($ivf_vitrification->EventCancelled)
				$ivf_vitrification_list->restoreCurrentRowFormValues($ivf_vitrification_list->RowIndex); // Restore form values
			if ($ivf_vitrification_list->RowAction == "insert")
				$ivf_vitrification->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_vitrification->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_vitrification->isGridEdit() && ($ivf_vitrification->RowType == ROWTYPE_EDIT || $ivf_vitrification->RowType == ROWTYPE_ADD) && $ivf_vitrification->EventCancelled) // Update failed
			$ivf_vitrification_list->restoreCurrentRowFormValues($ivf_vitrification_list->RowIndex); // Restore form values
		if ($ivf_vitrification->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_vitrification_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$ivf_vitrification->RowAttrs = array_merge($ivf_vitrification->RowAttrs, array('data-rowindex'=>$ivf_vitrification_list->RowCnt, 'id'=>'r' . $ivf_vitrification_list->RowCnt . '_ivf_vitrification', 'data-rowtype'=>$ivf_vitrification->RowType));

		// Render row
		$ivf_vitrification_list->renderRow();

		// Render list options
		$ivf_vitrification_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_vitrification_list->RowAction <> "delete" && $ivf_vitrification_list->RowAction <> "insertdelete" && !($ivf_vitrification_list->RowAction == "insert" && $ivf_vitrification->isConfirm() && $ivf_vitrification_list->emptyRow())) {
?>
	<tr<?php echo $ivf_vitrification->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_vitrification_list->ListOptions->render("body", "left", $ivf_vitrification_list->RowCnt);
?>
	<?php if ($ivf_vitrification->vitrificationDate->Visible) { // vitrificationDate ?>
		<td data-name="vitrificationDate"<?php echo $ivf_vitrification->vitrificationDate->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_vitrificationDate" class="form-group ivf_vitrification_vitrificationDate">
<input type="text" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->vitrificationDate->EditValue ?>"<?php echo $ivf_vitrification->vitrificationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification->vitrificationDate->ReadOnly && !$ivf_vitrification->vitrificationDate->Disabled && !isset($ivf_vitrification->vitrificationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_vitrificationlist", "x<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($ivf_vitrification->vitrificationDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_vitrificationDate" class="form-group ivf_vitrification_vitrificationDate">
<input type="text" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->vitrificationDate->EditValue ?>"<?php echo $ivf_vitrification->vitrificationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification->vitrificationDate->ReadOnly && !$ivf_vitrification->vitrificationDate->Disabled && !isset($ivf_vitrification->vitrificationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_vitrificationlist", "x<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_vitrificationDate" class="ivf_vitrification_vitrificationDate">
<span<?php echo $ivf_vitrification->vitrificationDate->viewAttributes() ?>>
<?php echo $ivf_vitrification->vitrificationDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_id" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_id" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_vitrification->id->CurrentValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_id" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_id" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_vitrification->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT || $ivf_vitrification->CurrentMode == "edit") { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_id" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_id" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_vitrification->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($ivf_vitrification->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<td data-name="PrimaryEmbryologist"<?php echo $ivf_vitrification->PrimaryEmbryologist->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_PrimaryEmbryologist" class="form-group ivf_vitrification_PrimaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification->PrimaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification->PrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_PrimaryEmbryologist" class="form-group ivf_vitrification_PrimaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification->PrimaryEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_PrimaryEmbryologist" class="ivf_vitrification_PrimaryEmbryologist">
<span<?php echo $ivf_vitrification->PrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_vitrification->PrimaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<td data-name="SecondaryEmbryologist"<?php echo $ivf_vitrification->SecondaryEmbryologist->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_SecondaryEmbryologist" class="form-group ivf_vitrification_SecondaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification->SecondaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification->SecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_SecondaryEmbryologist" class="form-group ivf_vitrification_SecondaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification->SecondaryEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_SecondaryEmbryologist" class="ivf_vitrification_SecondaryEmbryologist">
<span<?php echo $ivf_vitrification->SecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_vitrification->SecondaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo"<?php echo $ivf_vitrification->EmbryoNo->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_EmbryoNo" class="form-group ivf_vitrification_EmbryoNo">
<input type="text" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->EmbryoNo->EditValue ?>"<?php echo $ivf_vitrification->EmbryoNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_vitrification->EmbryoNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_EmbryoNo" class="form-group ivf_vitrification_EmbryoNo">
<input type="text" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->EmbryoNo->EditValue ?>"<?php echo $ivf_vitrification->EmbryoNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_EmbryoNo" class="ivf_vitrification_EmbryoNo">
<span<?php echo $ivf_vitrification->EmbryoNo->viewAttributes() ?>>
<?php echo $ivf_vitrification->EmbryoNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->FertilisationDate->Visible) { // FertilisationDate ?>
		<td data-name="FertilisationDate"<?php echo $ivf_vitrification->FertilisationDate->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_FertilisationDate" class="form-group ivf_vitrification_FertilisationDate">
<input type="text" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification->FertilisationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->FertilisationDate->EditValue ?>"<?php echo $ivf_vitrification->FertilisationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification->FertilisationDate->ReadOnly && !$ivf_vitrification->FertilisationDate->Disabled && !isset($ivf_vitrification->FertilisationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_vitrificationlist", "x<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" value="<?php echo HtmlEncode($ivf_vitrification->FertilisationDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_FertilisationDate" class="form-group ivf_vitrification_FertilisationDate">
<input type="text" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification->FertilisationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->FertilisationDate->EditValue ?>"<?php echo $ivf_vitrification->FertilisationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification->FertilisationDate->ReadOnly && !$ivf_vitrification->FertilisationDate->Disabled && !isset($ivf_vitrification->FertilisationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_vitrificationlist", "x<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_FertilisationDate" class="ivf_vitrification_FertilisationDate">
<span<?php echo $ivf_vitrification->FertilisationDate->viewAttributes() ?>>
<?php echo $ivf_vitrification->FertilisationDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Day->Visible) { // Day ?>
		<td data-name="Day"<?php echo $ivf_vitrification->Day->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Day" class="form-group ivf_vitrification_Day">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Day" data-value-separator="<?php echo $ivf_vitrification->Day->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Day" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Day"<?php echo $ivf_vitrification->Day->editAttributes() ?>>
		<?php echo $ivf_vitrification->Day->selectOptionListHtml("x<?php echo $ivf_vitrification_list->RowIndex ?>_Day") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Day" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Day" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Day" value="<?php echo HtmlEncode($ivf_vitrification->Day->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Day" class="form-group ivf_vitrification_Day">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Day" data-value-separator="<?php echo $ivf_vitrification->Day->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Day" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Day"<?php echo $ivf_vitrification->Day->editAttributes() ?>>
		<?php echo $ivf_vitrification->Day->selectOptionListHtml("x<?php echo $ivf_vitrification_list->RowIndex ?>_Day") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Day" class="ivf_vitrification_Day">
<span<?php echo $ivf_vitrification->Day->viewAttributes() ?>>
<?php echo $ivf_vitrification->Day->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Grade->Visible) { // Grade ?>
		<td data-name="Grade"<?php echo $ivf_vitrification->Grade->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Grade" class="form-group ivf_vitrification_Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Grade" data-value-separator="<?php echo $ivf_vitrification->Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Grade" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Grade"<?php echo $ivf_vitrification->Grade->editAttributes() ?>>
		<?php echo $ivf_vitrification->Grade->selectOptionListHtml("x<?php echo $ivf_vitrification_list->RowIndex ?>_Grade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Grade" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Grade" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Grade" value="<?php echo HtmlEncode($ivf_vitrification->Grade->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Grade" class="form-group ivf_vitrification_Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Grade" data-value-separator="<?php echo $ivf_vitrification->Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Grade" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Grade"<?php echo $ivf_vitrification->Grade->editAttributes() ?>>
		<?php echo $ivf_vitrification->Grade->selectOptionListHtml("x<?php echo $ivf_vitrification_list->RowIndex ?>_Grade") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Grade" class="ivf_vitrification_Grade">
<span<?php echo $ivf_vitrification->Grade->viewAttributes() ?>>
<?php echo $ivf_vitrification->Grade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Incubator->Visible) { // Incubator ?>
		<td data-name="Incubator"<?php echo $ivf_vitrification->Incubator->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Incubator" class="form-group ivf_vitrification_Incubator">
<input type="text" data-table="ivf_vitrification" data-field="x_Incubator" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Incubator->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Incubator->EditValue ?>"<?php echo $ivf_vitrification->Incubator->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Incubator" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($ivf_vitrification->Incubator->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Incubator" class="form-group ivf_vitrification_Incubator">
<input type="text" data-table="ivf_vitrification" data-field="x_Incubator" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Incubator->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Incubator->EditValue ?>"<?php echo $ivf_vitrification->Incubator->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Incubator" class="ivf_vitrification_Incubator">
<span<?php echo $ivf_vitrification->Incubator->viewAttributes() ?>>
<?php echo $ivf_vitrification->Incubator->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Tank->Visible) { // Tank ?>
		<td data-name="Tank"<?php echo $ivf_vitrification->Tank->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Tank" class="form-group ivf_vitrification_Tank">
<input type="text" data-table="ivf_vitrification" data-field="x_Tank" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Tank->EditValue ?>"<?php echo $ivf_vitrification->Tank->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Tank" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_vitrification->Tank->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Tank" class="form-group ivf_vitrification_Tank">
<input type="text" data-table="ivf_vitrification" data-field="x_Tank" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Tank->EditValue ?>"<?php echo $ivf_vitrification->Tank->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Tank" class="ivf_vitrification_Tank">
<span<?php echo $ivf_vitrification->Tank->viewAttributes() ?>>
<?php echo $ivf_vitrification->Tank->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Canister->Visible) { // Canister ?>
		<td data-name="Canister"<?php echo $ivf_vitrification->Canister->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Canister" class="form-group ivf_vitrification_Canister">
<input type="text" data-table="ivf_vitrification" data-field="x_Canister" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Canister->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Canister->EditValue ?>"<?php echo $ivf_vitrification->Canister->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Canister" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" value="<?php echo HtmlEncode($ivf_vitrification->Canister->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Canister" class="form-group ivf_vitrification_Canister">
<input type="text" data-table="ivf_vitrification" data-field="x_Canister" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Canister->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Canister->EditValue ?>"<?php echo $ivf_vitrification->Canister->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Canister" class="ivf_vitrification_Canister">
<span<?php echo $ivf_vitrification->Canister->viewAttributes() ?>>
<?php echo $ivf_vitrification->Canister->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Gobiet->Visible) { // Gobiet ?>
		<td data-name="Gobiet"<?php echo $ivf_vitrification->Gobiet->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Gobiet" class="form-group ivf_vitrification_Gobiet">
<input type="text" data-table="ivf_vitrification" data-field="x_Gobiet" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Gobiet->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Gobiet->EditValue ?>"<?php echo $ivf_vitrification->Gobiet->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Gobiet" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" value="<?php echo HtmlEncode($ivf_vitrification->Gobiet->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Gobiet" class="form-group ivf_vitrification_Gobiet">
<input type="text" data-table="ivf_vitrification" data-field="x_Gobiet" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Gobiet->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Gobiet->EditValue ?>"<?php echo $ivf_vitrification->Gobiet->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Gobiet" class="ivf_vitrification_Gobiet">
<span<?php echo $ivf_vitrification->Gobiet->viewAttributes() ?>>
<?php echo $ivf_vitrification->Gobiet->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->CryolockNo->Visible) { // CryolockNo ?>
		<td data-name="CryolockNo"<?php echo $ivf_vitrification->CryolockNo->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_CryolockNo" class="form-group ivf_vitrification_CryolockNo">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockNo" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->CryolockNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->CryolockNo->EditValue ?>"<?php echo $ivf_vitrification->CryolockNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockNo" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" value="<?php echo HtmlEncode($ivf_vitrification->CryolockNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_CryolockNo" class="form-group ivf_vitrification_CryolockNo">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockNo" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->CryolockNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->CryolockNo->EditValue ?>"<?php echo $ivf_vitrification->CryolockNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_CryolockNo" class="ivf_vitrification_CryolockNo">
<span<?php echo $ivf_vitrification->CryolockNo->viewAttributes() ?>>
<?php echo $ivf_vitrification->CryolockNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->CryolockColour->Visible) { // CryolockColour ?>
		<td data-name="CryolockColour"<?php echo $ivf_vitrification->CryolockColour->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_CryolockColour" class="form-group ivf_vitrification_CryolockColour">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockColour" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->CryolockColour->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->CryolockColour->EditValue ?>"<?php echo $ivf_vitrification->CryolockColour->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockColour" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" value="<?php echo HtmlEncode($ivf_vitrification->CryolockColour->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_CryolockColour" class="form-group ivf_vitrification_CryolockColour">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockColour" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->CryolockColour->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->CryolockColour->EditValue ?>"<?php echo $ivf_vitrification->CryolockColour->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_CryolockColour" class="ivf_vitrification_CryolockColour">
<span<?php echo $ivf_vitrification->CryolockColour->viewAttributes() ?>>
<?php echo $ivf_vitrification->CryolockColour->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Stage->Visible) { // Stage ?>
		<td data-name="Stage"<?php echo $ivf_vitrification->Stage->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Stage" class="form-group ivf_vitrification_Stage">
<input type="text" data-table="ivf_vitrification" data-field="x_Stage" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Stage->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Stage->EditValue ?>"<?php echo $ivf_vitrification->Stage->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Stage" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_vitrification->Stage->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Stage" class="form-group ivf_vitrification_Stage">
<input type="text" data-table="ivf_vitrification" data-field="x_Stage" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Stage->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Stage->EditValue ?>"<?php echo $ivf_vitrification->Stage->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCnt ?>_ivf_vitrification_Stage" class="ivf_vitrification_Stage">
<span<?php echo $ivf_vitrification->Stage->viewAttributes() ?>>
<?php echo $ivf_vitrification->Stage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_vitrification_list->ListOptions->render("body", "right", $ivf_vitrification_list->RowCnt);
?>
	</tr>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD || $ivf_vitrification->RowType == ROWTYPE_EDIT) { ?>
<script>
fivf_vitrificationlist.updateLists(<?php echo $ivf_vitrification_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_vitrification->isGridAdd())
		if (!$ivf_vitrification_list->Recordset->EOF)
			$ivf_vitrification_list->Recordset->moveNext();
}
?>
<?php
	if ($ivf_vitrification->isGridAdd() || $ivf_vitrification->isGridEdit()) {
		$ivf_vitrification_list->RowIndex = '$rowindex$';
		$ivf_vitrification_list->loadRowValues();

		// Set row properties
		$ivf_vitrification->resetAttributes();
		$ivf_vitrification->RowAttrs = array_merge($ivf_vitrification->RowAttrs, array('data-rowindex'=>$ivf_vitrification_list->RowIndex, 'id'=>'r0_ivf_vitrification', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($ivf_vitrification->RowAttrs["class"], "ew-template");
		$ivf_vitrification->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_vitrification_list->renderRow();

		// Render list options
		$ivf_vitrification_list->renderListOptions();
		$ivf_vitrification_list->StartRowCnt = 0;
?>
	<tr<?php echo $ivf_vitrification->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_vitrification_list->ListOptions->render("body", "left", $ivf_vitrification_list->RowIndex);
?>
	<?php if ($ivf_vitrification->vitrificationDate->Visible) { // vitrificationDate ?>
		<td data-name="vitrificationDate">
<span id="el$rowindex$_ivf_vitrification_vitrificationDate" class="form-group ivf_vitrification_vitrificationDate">
<input type="text" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->vitrificationDate->EditValue ?>"<?php echo $ivf_vitrification->vitrificationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification->vitrificationDate->ReadOnly && !$ivf_vitrification->vitrificationDate->Disabled && !isset($ivf_vitrification->vitrificationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_vitrificationlist", "x<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($ivf_vitrification->vitrificationDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<td data-name="PrimaryEmbryologist">
<span id="el$rowindex$_ivf_vitrification_PrimaryEmbryologist" class="form-group ivf_vitrification_PrimaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification->PrimaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification->PrimaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<td data-name="SecondaryEmbryologist">
<span id="el$rowindex$_ivf_vitrification_SecondaryEmbryologist" class="form-group ivf_vitrification_SecondaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification->SecondaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification->SecondaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo">
<span id="el$rowindex$_ivf_vitrification_EmbryoNo" class="form-group ivf_vitrification_EmbryoNo">
<input type="text" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->EmbryoNo->EditValue ?>"<?php echo $ivf_vitrification->EmbryoNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_vitrification->EmbryoNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->FertilisationDate->Visible) { // FertilisationDate ?>
		<td data-name="FertilisationDate">
<span id="el$rowindex$_ivf_vitrification_FertilisationDate" class="form-group ivf_vitrification_FertilisationDate">
<input type="text" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification->FertilisationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->FertilisationDate->EditValue ?>"<?php echo $ivf_vitrification->FertilisationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification->FertilisationDate->ReadOnly && !$ivf_vitrification->FertilisationDate->Disabled && !isset($ivf_vitrification->FertilisationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_vitrificationlist", "x<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" value="<?php echo HtmlEncode($ivf_vitrification->FertilisationDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Day->Visible) { // Day ?>
		<td data-name="Day">
<span id="el$rowindex$_ivf_vitrification_Day" class="form-group ivf_vitrification_Day">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Day" data-value-separator="<?php echo $ivf_vitrification->Day->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Day" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Day"<?php echo $ivf_vitrification->Day->editAttributes() ?>>
		<?php echo $ivf_vitrification->Day->selectOptionListHtml("x<?php echo $ivf_vitrification_list->RowIndex ?>_Day") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Day" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Day" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Day" value="<?php echo HtmlEncode($ivf_vitrification->Day->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Grade->Visible) { // Grade ?>
		<td data-name="Grade">
<span id="el$rowindex$_ivf_vitrification_Grade" class="form-group ivf_vitrification_Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Grade" data-value-separator="<?php echo $ivf_vitrification->Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Grade" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Grade"<?php echo $ivf_vitrification->Grade->editAttributes() ?>>
		<?php echo $ivf_vitrification->Grade->selectOptionListHtml("x<?php echo $ivf_vitrification_list->RowIndex ?>_Grade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Grade" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Grade" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Grade" value="<?php echo HtmlEncode($ivf_vitrification->Grade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Incubator->Visible) { // Incubator ?>
		<td data-name="Incubator">
<span id="el$rowindex$_ivf_vitrification_Incubator" class="form-group ivf_vitrification_Incubator">
<input type="text" data-table="ivf_vitrification" data-field="x_Incubator" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Incubator->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Incubator->EditValue ?>"<?php echo $ivf_vitrification->Incubator->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Incubator" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($ivf_vitrification->Incubator->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Tank->Visible) { // Tank ?>
		<td data-name="Tank">
<span id="el$rowindex$_ivf_vitrification_Tank" class="form-group ivf_vitrification_Tank">
<input type="text" data-table="ivf_vitrification" data-field="x_Tank" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Tank->EditValue ?>"<?php echo $ivf_vitrification->Tank->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Tank" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_vitrification->Tank->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Canister->Visible) { // Canister ?>
		<td data-name="Canister">
<span id="el$rowindex$_ivf_vitrification_Canister" class="form-group ivf_vitrification_Canister">
<input type="text" data-table="ivf_vitrification" data-field="x_Canister" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Canister->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Canister->EditValue ?>"<?php echo $ivf_vitrification->Canister->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Canister" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" value="<?php echo HtmlEncode($ivf_vitrification->Canister->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Gobiet->Visible) { // Gobiet ?>
		<td data-name="Gobiet">
<span id="el$rowindex$_ivf_vitrification_Gobiet" class="form-group ivf_vitrification_Gobiet">
<input type="text" data-table="ivf_vitrification" data-field="x_Gobiet" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Gobiet->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Gobiet->EditValue ?>"<?php echo $ivf_vitrification->Gobiet->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Gobiet" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" value="<?php echo HtmlEncode($ivf_vitrification->Gobiet->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->CryolockNo->Visible) { // CryolockNo ?>
		<td data-name="CryolockNo">
<span id="el$rowindex$_ivf_vitrification_CryolockNo" class="form-group ivf_vitrification_CryolockNo">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockNo" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->CryolockNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->CryolockNo->EditValue ?>"<?php echo $ivf_vitrification->CryolockNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockNo" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" value="<?php echo HtmlEncode($ivf_vitrification->CryolockNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->CryolockColour->Visible) { // CryolockColour ?>
		<td data-name="CryolockColour">
<span id="el$rowindex$_ivf_vitrification_CryolockColour" class="form-group ivf_vitrification_CryolockColour">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockColour" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->CryolockColour->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->CryolockColour->EditValue ?>"<?php echo $ivf_vitrification->CryolockColour->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockColour" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" value="<?php echo HtmlEncode($ivf_vitrification->CryolockColour->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Stage->Visible) { // Stage ?>
		<td data-name="Stage">
<span id="el$rowindex$_ivf_vitrification_Stage" class="form-group ivf_vitrification_Stage">
<input type="text" data-table="ivf_vitrification" data-field="x_Stage" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Stage->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Stage->EditValue ?>"<?php echo $ivf_vitrification->Stage->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Stage" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_vitrification->Stage->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_vitrification_list->ListOptions->render("body", "right", $ivf_vitrification_list->RowIndex);
?>
<script>
fivf_vitrificationlist.updateLists(<?php echo $ivf_vitrification_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($ivf_vitrification->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $ivf_vitrification_list->FormKeyCountName ?>" id="<?php echo $ivf_vitrification_list->FormKeyCountName ?>" value="<?php echo $ivf_vitrification_list->KeyCount ?>">
<?php echo $ivf_vitrification_list->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_vitrification->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $ivf_vitrification_list->FormKeyCountName ?>" id="<?php echo $ivf_vitrification_list->FormKeyCountName ?>" value="<?php echo $ivf_vitrification_list->KeyCount ?>">
<?php echo $ivf_vitrification_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$ivf_vitrification->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_vitrification_list->Recordset)
	$ivf_vitrification_list->Recordset->Close();
?>
<?php if (!$ivf_vitrification->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_vitrification->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_vitrification_list->Pager)) $ivf_vitrification_list->Pager = new NumericPager($ivf_vitrification_list->StartRec, $ivf_vitrification_list->DisplayRecs, $ivf_vitrification_list->TotalRecs, $ivf_vitrification_list->RecRange, $ivf_vitrification_list->AutoHidePager) ?>
<?php if ($ivf_vitrification_list->Pager->RecordCount > 0 && $ivf_vitrification_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_vitrification_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_vitrification_list->pageUrl() ?>start=<?php echo $ivf_vitrification_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_vitrification_list->pageUrl() ?>start=<?php echo $ivf_vitrification_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_vitrification_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_vitrification_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_vitrification_list->pageUrl() ?>start=<?php echo $ivf_vitrification_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_vitrification_list->pageUrl() ?>start=<?php echo $ivf_vitrification_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_vitrification_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_vitrification_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_vitrification_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_vitrification_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_vitrification_list->TotalRecs > 0 && (!$ivf_vitrification_list->AutoHidePageSizeSelector || $ivf_vitrification_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_vitrification">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_vitrification_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_vitrification_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_vitrification_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_vitrification_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_vitrification_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_vitrification_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_vitrification->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_vitrification_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_vitrification_list->TotalRecs == 0 && !$ivf_vitrification->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_vitrification_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_vitrification_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_vitrification->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$ivf_vitrification->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_vitrification", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_vitrification_list->terminate();
?>