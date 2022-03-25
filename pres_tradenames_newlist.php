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
$pres_tradenames_new_list = new pres_tradenames_new_list();

// Run the page
$pres_tradenames_new_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_tradenames_new_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_tradenames_new->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpres_tradenames_newlist = currentForm = new ew.Form("fpres_tradenames_newlist", "list");
fpres_tradenames_newlist.formKeyCountName = '<?php echo $pres_tradenames_new_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpres_tradenames_newlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_tradenames_newlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpres_tradenames_newlist.lists["x_Generic_Name"] = <?php echo $pres_tradenames_new_list->Generic_Name->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_Generic_Name"].options = <?php echo JsonEncode($pres_tradenames_new_list->Generic_Name->lookupOptions()) ?>;
fpres_tradenames_newlist.lists["x_Form"] = <?php echo $pres_tradenames_new_list->Form->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_Form"].options = <?php echo JsonEncode($pres_tradenames_new_list->Form->lookupOptions()) ?>;
fpres_tradenames_newlist.lists["x_Unit"] = <?php echo $pres_tradenames_new_list->Unit->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_Unit"].options = <?php echo JsonEncode($pres_tradenames_new_list->Unit->lookupOptions()) ?>;
fpres_tradenames_newlist.lists["x_TypeOfDrug"] = <?php echo $pres_tradenames_new_list->TypeOfDrug->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_TypeOfDrug"].options = <?php echo JsonEncode($pres_tradenames_new_list->TypeOfDrug->options(FALSE, TRUE)) ?>;
fpres_tradenames_newlist.lists["x_ProductType"] = <?php echo $pres_tradenames_new_list->ProductType->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_ProductType"].options = <?php echo JsonEncode($pres_tradenames_new_list->ProductType->options(FALSE, TRUE)) ?>;
fpres_tradenames_newlist.lists["x_Generic_Name1"] = <?php echo $pres_tradenames_new_list->Generic_Name1->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_Generic_Name1"].options = <?php echo JsonEncode($pres_tradenames_new_list->Generic_Name1->lookupOptions()) ?>;
fpres_tradenames_newlist.lists["x_Unit1"] = <?php echo $pres_tradenames_new_list->Unit1->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_Unit1"].options = <?php echo JsonEncode($pres_tradenames_new_list->Unit1->lookupOptions()) ?>;
fpres_tradenames_newlist.lists["x_Generic_Name2"] = <?php echo $pres_tradenames_new_list->Generic_Name2->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_Generic_Name2"].options = <?php echo JsonEncode($pres_tradenames_new_list->Generic_Name2->lookupOptions()) ?>;
fpres_tradenames_newlist.lists["x_Unit2"] = <?php echo $pres_tradenames_new_list->Unit2->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_Unit2"].options = <?php echo JsonEncode($pres_tradenames_new_list->Unit2->lookupOptions()) ?>;
fpres_tradenames_newlist.lists["x_Generic_Name3"] = <?php echo $pres_tradenames_new_list->Generic_Name3->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_Generic_Name3"].options = <?php echo JsonEncode($pres_tradenames_new_list->Generic_Name3->lookupOptions()) ?>;
fpres_tradenames_newlist.lists["x_Unit3"] = <?php echo $pres_tradenames_new_list->Unit3->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_Unit3"].options = <?php echo JsonEncode($pres_tradenames_new_list->Unit3->lookupOptions()) ?>;
fpres_tradenames_newlist.lists["x_Generic_Name4"] = <?php echo $pres_tradenames_new_list->Generic_Name4->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_Generic_Name4"].options = <?php echo JsonEncode($pres_tradenames_new_list->Generic_Name4->lookupOptions()) ?>;
fpres_tradenames_newlist.lists["x_Generic_Name5"] = <?php echo $pres_tradenames_new_list->Generic_Name5->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_Generic_Name5"].options = <?php echo JsonEncode($pres_tradenames_new_list->Generic_Name5->lookupOptions()) ?>;
fpres_tradenames_newlist.lists["x_Unit4"] = <?php echo $pres_tradenames_new_list->Unit4->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_Unit4"].options = <?php echo JsonEncode($pres_tradenames_new_list->Unit4->lookupOptions()) ?>;
fpres_tradenames_newlist.lists["x_Unit5"] = <?php echo $pres_tradenames_new_list->Unit5->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_Unit5"].options = <?php echo JsonEncode($pres_tradenames_new_list->Unit5->lookupOptions()) ?>;
fpres_tradenames_newlist.lists["x_AlterNative1"] = <?php echo $pres_tradenames_new_list->AlterNative1->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_AlterNative1"].options = <?php echo JsonEncode($pres_tradenames_new_list->AlterNative1->lookupOptions()) ?>;
fpres_tradenames_newlist.lists["x_AlterNative2"] = <?php echo $pres_tradenames_new_list->AlterNative2->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_AlterNative2"].options = <?php echo JsonEncode($pres_tradenames_new_list->AlterNative2->lookupOptions()) ?>;
fpres_tradenames_newlist.lists["x_AlterNative3"] = <?php echo $pres_tradenames_new_list->AlterNative3->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_AlterNative3"].options = <?php echo JsonEncode($pres_tradenames_new_list->AlterNative3->lookupOptions()) ?>;
fpres_tradenames_newlist.lists["x_AlterNative4"] = <?php echo $pres_tradenames_new_list->AlterNative4->Lookup->toClientList() ?>;
fpres_tradenames_newlist.lists["x_AlterNative4"].options = <?php echo JsonEncode($pres_tradenames_new_list->AlterNative4->lookupOptions()) ?>;

// Form object for search
var fpres_tradenames_newlistsrch = currentSearchForm = new ew.Form("fpres_tradenames_newlistsrch");

// Validate function for search
fpres_tradenames_newlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fpres_tradenames_newlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_tradenames_newlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpres_tradenames_newlistsrch.lists["x_Generic_Name"] = <?php echo $pres_tradenames_new_list->Generic_Name->Lookup->toClientList() ?>;
fpres_tradenames_newlistsrch.lists["x_Generic_Name"].options = <?php echo JsonEncode($pres_tradenames_new_list->Generic_Name->lookupOptions()) ?>;
fpres_tradenames_newlistsrch.lists["x_TypeOfDrug"] = <?php echo $pres_tradenames_new_list->TypeOfDrug->Lookup->toClientList() ?>;
fpres_tradenames_newlistsrch.lists["x_TypeOfDrug"].options = <?php echo JsonEncode($pres_tradenames_new_list->TypeOfDrug->options(FALSE, TRUE)) ?>;

// Filters
fpres_tradenames_newlistsrch.filterList = <?php echo $pres_tradenames_new_list->getFilterList() ?>;
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
<?php if (!$pres_tradenames_new->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_tradenames_new_list->TotalRecs > 0 && $pres_tradenames_new_list->ExportOptions->visible()) { ?>
<?php $pres_tradenames_new_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->ImportOptions->visible()) { ?>
<?php $pres_tradenames_new_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->SearchOptions->visible()) { ?>
<?php $pres_tradenames_new_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->FilterOptions->visible()) { ?>
<?php $pres_tradenames_new_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_tradenames_new_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_tradenames_new->isExport() && !$pres_tradenames_new->CurrentAction) { ?>
<form name="fpres_tradenames_newlistsrch" id="fpres_tradenames_newlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pres_tradenames_new_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpres_tradenames_newlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_tradenames_new">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$pres_tradenames_new_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$pres_tradenames_new->RowType = ROWTYPE_SEARCH;

// Render row
$pres_tradenames_new->resetAttributes();
$pres_tradenames_new_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($pres_tradenames_new->Drug_Name->Visible) { // Drug_Name ?>
	<div id="xsc_Drug_Name" class="ew-cell form-group">
		<label for="x_Drug_Name" class="ew-search-caption ew-label"><?php echo $pres_tradenames_new->Drug_Name->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Drug_Name" id="z_Drug_Name" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="pres_tradenames_new" data-field="x_Drug_Name" name="x_Drug_Name" id="x_Drug_Name" placeholder="<?php echo HtmlEncode($pres_tradenames_new->Drug_Name->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->Drug_Name->EditValue ?>"<?php echo $pres_tradenames_new->Drug_Name->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name->Visible) { // Generic_Name ?>
	<div id="xsc_Generic_Name" class="ew-cell form-group">
		<label for="x_Generic_Name" class="ew-search-caption ew-label"><?php echo $pres_tradenames_new->Generic_Name->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Generic_Name" id="z_Generic_Name" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name"><?php echo strval($pres_tradenames_new->Generic_Name->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->Generic_Name->AdvancedSearch->ViewValue) : $pres_tradenames_new->Generic_Name->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->Generic_Name->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->Generic_Name->ReadOnly || $pres_tradenames_new->Generic_Name->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->Generic_Name->Lookup->getParamTag("p_x_Generic_Name") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_Generic_Name" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->Generic_Name->displayValueSeparatorAttribute() ?>" name="x_Generic_Name" id="x_Generic_Name" value="<?php echo $pres_tradenames_new->Generic_Name->AdvancedSearch->SearchValue ?>"<?php echo $pres_tradenames_new->Generic_Name->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($pres_tradenames_new->Trade_Name->Visible) { // Trade_Name ?>
	<div id="xsc_Trade_Name" class="ew-cell form-group">
		<label for="x_Trade_Name" class="ew-search-caption ew-label"><?php echo $pres_tradenames_new->Trade_Name->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Trade_Name" id="z_Trade_Name" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="pres_tradenames_new" data-field="x_Trade_Name" name="x_Trade_Name" id="x_Trade_Name" placeholder="<?php echo HtmlEncode($pres_tradenames_new->Trade_Name->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->Trade_Name->EditValue ?>"<?php echo $pres_tradenames_new->Trade_Name->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->TypeOfDrug->Visible) { // TypeOfDrug ?>
	<div id="xsc_TypeOfDrug" class="ew-cell form-group">
		<label for="x_TypeOfDrug" class="ew-search-caption ew-label"><?php echo $pres_tradenames_new->TypeOfDrug->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TypeOfDrug" id="z_TypeOfDrug" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_TypeOfDrug" data-value-separator="<?php echo $pres_tradenames_new->TypeOfDrug->displayValueSeparatorAttribute() ?>" id="x_TypeOfDrug" name="x_TypeOfDrug"<?php echo $pres_tradenames_new->TypeOfDrug->editAttributes() ?>>
		<?php echo $pres_tradenames_new->TypeOfDrug->selectOptionListHtml("x_TypeOfDrug") ?>
	</select>
</div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pres_tradenames_new_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pres_tradenames_new_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_tradenames_new_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_tradenames_new_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_tradenames_new_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_tradenames_new_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_tradenames_new_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pres_tradenames_new_list->showPageHeader(); ?>
<?php
$pres_tradenames_new_list->showMessage();
?>
<?php if ($pres_tradenames_new_list->TotalRecs > 0 || $pres_tradenames_new->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_tradenames_new_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_tradenames_new">
<?php if (!$pres_tradenames_new->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_tradenames_new->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_tradenames_new_list->Pager)) $pres_tradenames_new_list->Pager = new NumericPager($pres_tradenames_new_list->StartRec, $pres_tradenames_new_list->DisplayRecs, $pres_tradenames_new_list->TotalRecs, $pres_tradenames_new_list->RecRange, $pres_tradenames_new_list->AutoHidePager) ?>
<?php if ($pres_tradenames_new_list->Pager->RecordCount > 0 && $pres_tradenames_new_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_tradenames_new_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_tradenames_new_list->pageUrl() ?>start=<?php echo $pres_tradenames_new_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_tradenames_new_list->pageUrl() ?>start=<?php echo $pres_tradenames_new_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_tradenames_new_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_tradenames_new_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_tradenames_new_list->pageUrl() ?>start=<?php echo $pres_tradenames_new_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_tradenames_new_list->pageUrl() ?>start=<?php echo $pres_tradenames_new_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_tradenames_new_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_tradenames_new_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_tradenames_new_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_tradenames_new_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_tradenames_new_list->TotalRecs > 0 && (!$pres_tradenames_new_list->AutoHidePageSizeSelector || $pres_tradenames_new_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_tradenames_new">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_tradenames_new_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_tradenames_new_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_tradenames_new_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_tradenames_new_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_tradenames_new_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_tradenames_new_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_tradenames_new->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_tradenames_new_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_tradenames_newlist" id="fpres_tradenames_newlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_tradenames_new_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_tradenames_new_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames_new">
<div id="gmp_pres_tradenames_new" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pres_tradenames_new_list->TotalRecs > 0 || $pres_tradenames_new->isGridEdit()) { ?>
<table id="tbl_pres_tradenames_newlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_tradenames_new_list->RowType = ROWTYPE_HEADER;

// Render list options
$pres_tradenames_new_list->renderListOptions();

// Render list options (header, left)
$pres_tradenames_new_list->ListOptions->render("header", "left");
?>
<?php if ($pres_tradenames_new->ID->Visible) { // ID ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->ID) == "") { ?>
		<th data-name="ID" class="<?php echo $pres_tradenames_new->ID->headerCellClass() ?>"><div id="elh_pres_tradenames_new_ID" class="pres_tradenames_new_ID"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->ID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ID" class="<?php echo $pres_tradenames_new->ID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->ID) ?>',1);"><div id="elh_pres_tradenames_new_ID" class="pres_tradenames_new_ID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->ID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->ID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->ID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Drug_Name->Visible) { // Drug_Name ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Drug_Name) == "") { ?>
		<th data-name="Drug_Name" class="<?php echo $pres_tradenames_new->Drug_Name->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Drug_Name" class="pres_tradenames_new_Drug_Name"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Drug_Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Drug_Name" class="<?php echo $pres_tradenames_new->Drug_Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Drug_Name) ?>',1);"><div id="elh_pres_tradenames_new_Drug_Name" class="pres_tradenames_new_Drug_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Drug_Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Drug_Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Drug_Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name->Visible) { // Generic_Name ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Generic_Name) == "") { ?>
		<th data-name="Generic_Name" class="<?php echo $pres_tradenames_new->Generic_Name->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name" class="pres_tradenames_new_Generic_Name"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Generic_Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generic_Name" class="<?php echo $pres_tradenames_new->Generic_Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Generic_Name) ?>',1);"><div id="elh_pres_tradenames_new_Generic_Name" class="pres_tradenames_new_Generic_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Generic_Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Generic_Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Generic_Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Trade_Name->Visible) { // Trade_Name ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Trade_Name) == "") { ?>
		<th data-name="Trade_Name" class="<?php echo $pres_tradenames_new->Trade_Name->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Trade_Name" class="pres_tradenames_new_Trade_Name"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Trade_Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Trade_Name" class="<?php echo $pres_tradenames_new->Trade_Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Trade_Name) ?>',1);"><div id="elh_pres_tradenames_new_Trade_Name" class="pres_tradenames_new_Trade_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Trade_Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Trade_Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Trade_Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->PR_CODE->Visible) { // PR_CODE ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->PR_CODE) == "") { ?>
		<th data-name="PR_CODE" class="<?php echo $pres_tradenames_new->PR_CODE->headerCellClass() ?>"><div id="elh_pres_tradenames_new_PR_CODE" class="pres_tradenames_new_PR_CODE"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->PR_CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PR_CODE" class="<?php echo $pres_tradenames_new->PR_CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->PR_CODE) ?>',1);"><div id="elh_pres_tradenames_new_PR_CODE" class="pres_tradenames_new_PR_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->PR_CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->PR_CODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->PR_CODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Form->Visible) { // Form ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Form) == "") { ?>
		<th data-name="Form" class="<?php echo $pres_tradenames_new->Form->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Form" class="pres_tradenames_new_Form"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Form->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Form" class="<?php echo $pres_tradenames_new->Form->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Form) ?>',1);"><div id="elh_pres_tradenames_new_Form" class="pres_tradenames_new_Form">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Form->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Form->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Form->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Strength->Visible) { // Strength ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Strength) == "") { ?>
		<th data-name="Strength" class="<?php echo $pres_tradenames_new->Strength->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength" class="pres_tradenames_new_Strength"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Strength->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength" class="<?php echo $pres_tradenames_new->Strength->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Strength) ?>',1);"><div id="elh_pres_tradenames_new_Strength" class="pres_tradenames_new_Strength">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Strength->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Strength->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Strength->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Unit->Visible) { // Unit ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Unit) == "") { ?>
		<th data-name="Unit" class="<?php echo $pres_tradenames_new->Unit->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit" class="pres_tradenames_new_Unit"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit" class="<?php echo $pres_tradenames_new->Unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Unit) ?>',1);"><div id="elh_pres_tradenames_new_Unit" class="pres_tradenames_new_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Unit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Unit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->TypeOfDrug->Visible) { // TypeOfDrug ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->TypeOfDrug) == "") { ?>
		<th data-name="TypeOfDrug" class="<?php echo $pres_tradenames_new->TypeOfDrug->headerCellClass() ?>"><div id="elh_pres_tradenames_new_TypeOfDrug" class="pres_tradenames_new_TypeOfDrug"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->TypeOfDrug->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypeOfDrug" class="<?php echo $pres_tradenames_new->TypeOfDrug->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->TypeOfDrug) ?>',1);"><div id="elh_pres_tradenames_new_TypeOfDrug" class="pres_tradenames_new_TypeOfDrug">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->TypeOfDrug->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->TypeOfDrug->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->TypeOfDrug->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->ProductType->Visible) { // ProductType ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->ProductType) == "") { ?>
		<th data-name="ProductType" class="<?php echo $pres_tradenames_new->ProductType->headerCellClass() ?>"><div id="elh_pres_tradenames_new_ProductType" class="pres_tradenames_new_ProductType"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->ProductType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductType" class="<?php echo $pres_tradenames_new->ProductType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->ProductType) ?>',1);"><div id="elh_pres_tradenames_new_ProductType" class="pres_tradenames_new_ProductType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->ProductType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->ProductType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->ProductType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name1->Visible) { // Generic_Name1 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Generic_Name1) == "") { ?>
		<th data-name="Generic_Name1" class="<?php echo $pres_tradenames_new->Generic_Name1->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name1" class="pres_tradenames_new_Generic_Name1"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Generic_Name1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generic_Name1" class="<?php echo $pres_tradenames_new->Generic_Name1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Generic_Name1) ?>',1);"><div id="elh_pres_tradenames_new_Generic_Name1" class="pres_tradenames_new_Generic_Name1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Generic_Name1->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Generic_Name1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Generic_Name1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Strength1->Visible) { // Strength1 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Strength1) == "") { ?>
		<th data-name="Strength1" class="<?php echo $pres_tradenames_new->Strength1->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength1" class="pres_tradenames_new_Strength1"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Strength1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength1" class="<?php echo $pres_tradenames_new->Strength1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Strength1) ?>',1);"><div id="elh_pres_tradenames_new_Strength1" class="pres_tradenames_new_Strength1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Strength1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Strength1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Strength1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Unit1->Visible) { // Unit1 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Unit1) == "") { ?>
		<th data-name="Unit1" class="<?php echo $pres_tradenames_new->Unit1->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit1" class="pres_tradenames_new_Unit1"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Unit1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit1" class="<?php echo $pres_tradenames_new->Unit1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Unit1) ?>',1);"><div id="elh_pres_tradenames_new_Unit1" class="pres_tradenames_new_Unit1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Unit1->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Unit1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Unit1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name2->Visible) { // Generic_Name2 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Generic_Name2) == "") { ?>
		<th data-name="Generic_Name2" class="<?php echo $pres_tradenames_new->Generic_Name2->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name2" class="pres_tradenames_new_Generic_Name2"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Generic_Name2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generic_Name2" class="<?php echo $pres_tradenames_new->Generic_Name2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Generic_Name2) ?>',1);"><div id="elh_pres_tradenames_new_Generic_Name2" class="pres_tradenames_new_Generic_Name2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Generic_Name2->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Generic_Name2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Generic_Name2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Strength2->Visible) { // Strength2 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Strength2) == "") { ?>
		<th data-name="Strength2" class="<?php echo $pres_tradenames_new->Strength2->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength2" class="pres_tradenames_new_Strength2"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Strength2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength2" class="<?php echo $pres_tradenames_new->Strength2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Strength2) ?>',1);"><div id="elh_pres_tradenames_new_Strength2" class="pres_tradenames_new_Strength2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Strength2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Strength2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Strength2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Unit2->Visible) { // Unit2 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Unit2) == "") { ?>
		<th data-name="Unit2" class="<?php echo $pres_tradenames_new->Unit2->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit2" class="pres_tradenames_new_Unit2"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Unit2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit2" class="<?php echo $pres_tradenames_new->Unit2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Unit2) ?>',1);"><div id="elh_pres_tradenames_new_Unit2" class="pres_tradenames_new_Unit2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Unit2->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Unit2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Unit2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name3->Visible) { // Generic_Name3 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Generic_Name3) == "") { ?>
		<th data-name="Generic_Name3" class="<?php echo $pres_tradenames_new->Generic_Name3->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name3" class="pres_tradenames_new_Generic_Name3"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Generic_Name3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generic_Name3" class="<?php echo $pres_tradenames_new->Generic_Name3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Generic_Name3) ?>',1);"><div id="elh_pres_tradenames_new_Generic_Name3" class="pres_tradenames_new_Generic_Name3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Generic_Name3->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Generic_Name3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Generic_Name3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Strength3->Visible) { // Strength3 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Strength3) == "") { ?>
		<th data-name="Strength3" class="<?php echo $pres_tradenames_new->Strength3->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength3" class="pres_tradenames_new_Strength3"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Strength3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength3" class="<?php echo $pres_tradenames_new->Strength3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Strength3) ?>',1);"><div id="elh_pres_tradenames_new_Strength3" class="pres_tradenames_new_Strength3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Strength3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Strength3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Strength3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Unit3->Visible) { // Unit3 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Unit3) == "") { ?>
		<th data-name="Unit3" class="<?php echo $pres_tradenames_new->Unit3->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit3" class="pres_tradenames_new_Unit3"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Unit3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit3" class="<?php echo $pres_tradenames_new->Unit3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Unit3) ?>',1);"><div id="elh_pres_tradenames_new_Unit3" class="pres_tradenames_new_Unit3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Unit3->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Unit3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Unit3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name4->Visible) { // Generic_Name4 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Generic_Name4) == "") { ?>
		<th data-name="Generic_Name4" class="<?php echo $pres_tradenames_new->Generic_Name4->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name4" class="pres_tradenames_new_Generic_Name4"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Generic_Name4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generic_Name4" class="<?php echo $pres_tradenames_new->Generic_Name4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Generic_Name4) ?>',1);"><div id="elh_pres_tradenames_new_Generic_Name4" class="pres_tradenames_new_Generic_Name4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Generic_Name4->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Generic_Name4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Generic_Name4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name5->Visible) { // Generic_Name5 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Generic_Name5) == "") { ?>
		<th data-name="Generic_Name5" class="<?php echo $pres_tradenames_new->Generic_Name5->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name5" class="pres_tradenames_new_Generic_Name5"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Generic_Name5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generic_Name5" class="<?php echo $pres_tradenames_new->Generic_Name5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Generic_Name5) ?>',1);"><div id="elh_pres_tradenames_new_Generic_Name5" class="pres_tradenames_new_Generic_Name5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Generic_Name5->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Generic_Name5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Generic_Name5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Strength4->Visible) { // Strength4 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Strength4) == "") { ?>
		<th data-name="Strength4" class="<?php echo $pres_tradenames_new->Strength4->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength4" class="pres_tradenames_new_Strength4"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Strength4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength4" class="<?php echo $pres_tradenames_new->Strength4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Strength4) ?>',1);"><div id="elh_pres_tradenames_new_Strength4" class="pres_tradenames_new_Strength4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Strength4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Strength4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Strength4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Strength5->Visible) { // Strength5 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Strength5) == "") { ?>
		<th data-name="Strength5" class="<?php echo $pres_tradenames_new->Strength5->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength5" class="pres_tradenames_new_Strength5"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Strength5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength5" class="<?php echo $pres_tradenames_new->Strength5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Strength5) ?>',1);"><div id="elh_pres_tradenames_new_Strength5" class="pres_tradenames_new_Strength5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Strength5->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Strength5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Strength5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Unit4->Visible) { // Unit4 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Unit4) == "") { ?>
		<th data-name="Unit4" class="<?php echo $pres_tradenames_new->Unit4->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit4" class="pres_tradenames_new_Unit4"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Unit4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit4" class="<?php echo $pres_tradenames_new->Unit4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Unit4) ?>',1);"><div id="elh_pres_tradenames_new_Unit4" class="pres_tradenames_new_Unit4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Unit4->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Unit4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Unit4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->Unit5->Visible) { // Unit5 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->Unit5) == "") { ?>
		<th data-name="Unit5" class="<?php echo $pres_tradenames_new->Unit5->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit5" class="pres_tradenames_new_Unit5"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->Unit5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit5" class="<?php echo $pres_tradenames_new->Unit5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->Unit5) ?>',1);"><div id="elh_pres_tradenames_new_Unit5" class="pres_tradenames_new_Unit5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->Unit5->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->Unit5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->Unit5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative1->Visible) { // AlterNative1 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->AlterNative1) == "") { ?>
		<th data-name="AlterNative1" class="<?php echo $pres_tradenames_new->AlterNative1->headerCellClass() ?>"><div id="elh_pres_tradenames_new_AlterNative1" class="pres_tradenames_new_AlterNative1"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->AlterNative1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AlterNative1" class="<?php echo $pres_tradenames_new->AlterNative1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->AlterNative1) ?>',1);"><div id="elh_pres_tradenames_new_AlterNative1" class="pres_tradenames_new_AlterNative1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->AlterNative1->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->AlterNative1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->AlterNative1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative2->Visible) { // AlterNative2 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->AlterNative2) == "") { ?>
		<th data-name="AlterNative2" class="<?php echo $pres_tradenames_new->AlterNative2->headerCellClass() ?>"><div id="elh_pres_tradenames_new_AlterNative2" class="pres_tradenames_new_AlterNative2"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->AlterNative2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AlterNative2" class="<?php echo $pres_tradenames_new->AlterNative2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->AlterNative2) ?>',1);"><div id="elh_pres_tradenames_new_AlterNative2" class="pres_tradenames_new_AlterNative2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->AlterNative2->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->AlterNative2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->AlterNative2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative3->Visible) { // AlterNative3 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->AlterNative3) == "") { ?>
		<th data-name="AlterNative3" class="<?php echo $pres_tradenames_new->AlterNative3->headerCellClass() ?>"><div id="elh_pres_tradenames_new_AlterNative3" class="pres_tradenames_new_AlterNative3"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->AlterNative3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AlterNative3" class="<?php echo $pres_tradenames_new->AlterNative3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->AlterNative3) ?>',1);"><div id="elh_pres_tradenames_new_AlterNative3" class="pres_tradenames_new_AlterNative3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->AlterNative3->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->AlterNative3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->AlterNative3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative4->Visible) { // AlterNative4 ?>
	<?php if ($pres_tradenames_new->sortUrl($pres_tradenames_new->AlterNative4) == "") { ?>
		<th data-name="AlterNative4" class="<?php echo $pres_tradenames_new->AlterNative4->headerCellClass() ?>"><div id="elh_pres_tradenames_new_AlterNative4" class="pres_tradenames_new_AlterNative4"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new->AlterNative4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AlterNative4" class="<?php echo $pres_tradenames_new->AlterNative4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames_new->SortUrl($pres_tradenames_new->AlterNative4) ?>',1);"><div id="elh_pres_tradenames_new_AlterNative4" class="pres_tradenames_new_AlterNative4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new->AlterNative4->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new->AlterNative4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames_new->AlterNative4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_tradenames_new_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_tradenames_new->ExportAll && $pres_tradenames_new->isExport()) {
	$pres_tradenames_new_list->StopRec = $pres_tradenames_new_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pres_tradenames_new_list->TotalRecs > $pres_tradenames_new_list->StartRec + $pres_tradenames_new_list->DisplayRecs - 1)
		$pres_tradenames_new_list->StopRec = $pres_tradenames_new_list->StartRec + $pres_tradenames_new_list->DisplayRecs - 1;
	else
		$pres_tradenames_new_list->StopRec = $pres_tradenames_new_list->TotalRecs;
}
$pres_tradenames_new_list->RecCnt = $pres_tradenames_new_list->StartRec - 1;
if ($pres_tradenames_new_list->Recordset && !$pres_tradenames_new_list->Recordset->EOF) {
	$pres_tradenames_new_list->Recordset->moveFirst();
	$selectLimit = $pres_tradenames_new_list->UseSelectLimit;
	if (!$selectLimit && $pres_tradenames_new_list->StartRec > 1)
		$pres_tradenames_new_list->Recordset->move($pres_tradenames_new_list->StartRec - 1);
} elseif (!$pres_tradenames_new->AllowAddDeleteRow && $pres_tradenames_new_list->StopRec == 0) {
	$pres_tradenames_new_list->StopRec = $pres_tradenames_new->GridAddRowCount;
}

// Initialize aggregate
$pres_tradenames_new->RowType = ROWTYPE_AGGREGATEINIT;
$pres_tradenames_new->resetAttributes();
$pres_tradenames_new_list->renderRow();
while ($pres_tradenames_new_list->RecCnt < $pres_tradenames_new_list->StopRec) {
	$pres_tradenames_new_list->RecCnt++;
	if ($pres_tradenames_new_list->RecCnt >= $pres_tradenames_new_list->StartRec) {
		$pres_tradenames_new_list->RowCnt++;

		// Set up key count
		$pres_tradenames_new_list->KeyCount = $pres_tradenames_new_list->RowIndex;

		// Init row class and style
		$pres_tradenames_new->resetAttributes();
		$pres_tradenames_new->CssClass = "";
		if ($pres_tradenames_new->isGridAdd()) {
		} else {
			$pres_tradenames_new_list->loadRowValues($pres_tradenames_new_list->Recordset); // Load row values
		}
		$pres_tradenames_new->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_tradenames_new->RowAttrs = array_merge($pres_tradenames_new->RowAttrs, array('data-rowindex'=>$pres_tradenames_new_list->RowCnt, 'id'=>'r' . $pres_tradenames_new_list->RowCnt . '_pres_tradenames_new', 'data-rowtype'=>$pres_tradenames_new->RowType));

		// Render row
		$pres_tradenames_new_list->renderRow();

		// Render list options
		$pres_tradenames_new_list->renderListOptions();
?>
	<tr<?php echo $pres_tradenames_new->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_tradenames_new_list->ListOptions->render("body", "left", $pres_tradenames_new_list->RowCnt);
?>
	<?php if ($pres_tradenames_new->ID->Visible) { // ID ?>
		<td data-name="ID"<?php echo $pres_tradenames_new->ID->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_ID" class="pres_tradenames_new_ID">
<span<?php echo $pres_tradenames_new->ID->viewAttributes() ?>>
<?php echo $pres_tradenames_new->ID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Drug_Name->Visible) { // Drug_Name ?>
		<td data-name="Drug_Name"<?php echo $pres_tradenames_new->Drug_Name->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Drug_Name" class="pres_tradenames_new_Drug_Name">
<span<?php echo $pres_tradenames_new->Drug_Name->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Drug_Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Generic_Name->Visible) { // Generic_Name ?>
		<td data-name="Generic_Name"<?php echo $pres_tradenames_new->Generic_Name->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Generic_Name" class="pres_tradenames_new_Generic_Name">
<span<?php echo $pres_tradenames_new->Generic_Name->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Trade_Name->Visible) { // Trade_Name ?>
		<td data-name="Trade_Name"<?php echo $pres_tradenames_new->Trade_Name->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Trade_Name" class="pres_tradenames_new_Trade_Name">
<span<?php echo $pres_tradenames_new->Trade_Name->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Trade_Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->PR_CODE->Visible) { // PR_CODE ?>
		<td data-name="PR_CODE"<?php echo $pres_tradenames_new->PR_CODE->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_PR_CODE" class="pres_tradenames_new_PR_CODE">
<span<?php echo $pres_tradenames_new->PR_CODE->viewAttributes() ?>>
<?php echo $pres_tradenames_new->PR_CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Form->Visible) { // Form ?>
		<td data-name="Form"<?php echo $pres_tradenames_new->Form->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Form" class="pres_tradenames_new_Form">
<span<?php echo $pres_tradenames_new->Form->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Form->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Strength->Visible) { // Strength ?>
		<td data-name="Strength"<?php echo $pres_tradenames_new->Strength->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Strength" class="pres_tradenames_new_Strength">
<span<?php echo $pres_tradenames_new->Strength->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Strength->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Unit->Visible) { // Unit ?>
		<td data-name="Unit"<?php echo $pres_tradenames_new->Unit->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Unit" class="pres_tradenames_new_Unit">
<span<?php echo $pres_tradenames_new->Unit->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Unit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->TypeOfDrug->Visible) { // TypeOfDrug ?>
		<td data-name="TypeOfDrug"<?php echo $pres_tradenames_new->TypeOfDrug->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_TypeOfDrug" class="pres_tradenames_new_TypeOfDrug">
<span<?php echo $pres_tradenames_new->TypeOfDrug->viewAttributes() ?>>
<?php echo $pres_tradenames_new->TypeOfDrug->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->ProductType->Visible) { // ProductType ?>
		<td data-name="ProductType"<?php echo $pres_tradenames_new->ProductType->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_ProductType" class="pres_tradenames_new_ProductType">
<span<?php echo $pres_tradenames_new->ProductType->viewAttributes() ?>>
<?php echo $pres_tradenames_new->ProductType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Generic_Name1->Visible) { // Generic_Name1 ?>
		<td data-name="Generic_Name1"<?php echo $pres_tradenames_new->Generic_Name1->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Generic_Name1" class="pres_tradenames_new_Generic_Name1">
<span<?php echo $pres_tradenames_new->Generic_Name1->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Strength1->Visible) { // Strength1 ?>
		<td data-name="Strength1"<?php echo $pres_tradenames_new->Strength1->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Strength1" class="pres_tradenames_new_Strength1">
<span<?php echo $pres_tradenames_new->Strength1->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Strength1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Unit1->Visible) { // Unit1 ?>
		<td data-name="Unit1"<?php echo $pres_tradenames_new->Unit1->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Unit1" class="pres_tradenames_new_Unit1">
<span<?php echo $pres_tradenames_new->Unit1->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Unit1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Generic_Name2->Visible) { // Generic_Name2 ?>
		<td data-name="Generic_Name2"<?php echo $pres_tradenames_new->Generic_Name2->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Generic_Name2" class="pres_tradenames_new_Generic_Name2">
<span<?php echo $pres_tradenames_new->Generic_Name2->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Strength2->Visible) { // Strength2 ?>
		<td data-name="Strength2"<?php echo $pres_tradenames_new->Strength2->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Strength2" class="pres_tradenames_new_Strength2">
<span<?php echo $pres_tradenames_new->Strength2->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Strength2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Unit2->Visible) { // Unit2 ?>
		<td data-name="Unit2"<?php echo $pres_tradenames_new->Unit2->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Unit2" class="pres_tradenames_new_Unit2">
<span<?php echo $pres_tradenames_new->Unit2->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Unit2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Generic_Name3->Visible) { // Generic_Name3 ?>
		<td data-name="Generic_Name3"<?php echo $pres_tradenames_new->Generic_Name3->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Generic_Name3" class="pres_tradenames_new_Generic_Name3">
<span<?php echo $pres_tradenames_new->Generic_Name3->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Strength3->Visible) { // Strength3 ?>
		<td data-name="Strength3"<?php echo $pres_tradenames_new->Strength3->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Strength3" class="pres_tradenames_new_Strength3">
<span<?php echo $pres_tradenames_new->Strength3->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Strength3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Unit3->Visible) { // Unit3 ?>
		<td data-name="Unit3"<?php echo $pres_tradenames_new->Unit3->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Unit3" class="pres_tradenames_new_Unit3">
<span<?php echo $pres_tradenames_new->Unit3->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Unit3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Generic_Name4->Visible) { // Generic_Name4 ?>
		<td data-name="Generic_Name4"<?php echo $pres_tradenames_new->Generic_Name4->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Generic_Name4" class="pres_tradenames_new_Generic_Name4">
<span<?php echo $pres_tradenames_new->Generic_Name4->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Generic_Name5->Visible) { // Generic_Name5 ?>
		<td data-name="Generic_Name5"<?php echo $pres_tradenames_new->Generic_Name5->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Generic_Name5" class="pres_tradenames_new_Generic_Name5">
<span<?php echo $pres_tradenames_new->Generic_Name5->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Strength4->Visible) { // Strength4 ?>
		<td data-name="Strength4"<?php echo $pres_tradenames_new->Strength4->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Strength4" class="pres_tradenames_new_Strength4">
<span<?php echo $pres_tradenames_new->Strength4->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Strength4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Strength5->Visible) { // Strength5 ?>
		<td data-name="Strength5"<?php echo $pres_tradenames_new->Strength5->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Strength5" class="pres_tradenames_new_Strength5">
<span<?php echo $pres_tradenames_new->Strength5->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Strength5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Unit4->Visible) { // Unit4 ?>
		<td data-name="Unit4"<?php echo $pres_tradenames_new->Unit4->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Unit4" class="pres_tradenames_new_Unit4">
<span<?php echo $pres_tradenames_new->Unit4->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Unit4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->Unit5->Visible) { // Unit5 ?>
		<td data-name="Unit5"<?php echo $pres_tradenames_new->Unit5->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_Unit5" class="pres_tradenames_new_Unit5">
<span<?php echo $pres_tradenames_new->Unit5->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Unit5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->AlterNative1->Visible) { // AlterNative1 ?>
		<td data-name="AlterNative1"<?php echo $pres_tradenames_new->AlterNative1->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_AlterNative1" class="pres_tradenames_new_AlterNative1">
<span<?php echo $pres_tradenames_new->AlterNative1->viewAttributes() ?>>
<?php echo $pres_tradenames_new->AlterNative1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->AlterNative2->Visible) { // AlterNative2 ?>
		<td data-name="AlterNative2"<?php echo $pres_tradenames_new->AlterNative2->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_AlterNative2" class="pres_tradenames_new_AlterNative2">
<span<?php echo $pres_tradenames_new->AlterNative2->viewAttributes() ?>>
<?php echo $pres_tradenames_new->AlterNative2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->AlterNative3->Visible) { // AlterNative3 ?>
		<td data-name="AlterNative3"<?php echo $pres_tradenames_new->AlterNative3->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_AlterNative3" class="pres_tradenames_new_AlterNative3">
<span<?php echo $pres_tradenames_new->AlterNative3->viewAttributes() ?>>
<?php echo $pres_tradenames_new->AlterNative3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new->AlterNative4->Visible) { // AlterNative4 ?>
		<td data-name="AlterNative4"<?php echo $pres_tradenames_new->AlterNative4->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCnt ?>_pres_tradenames_new_AlterNative4" class="pres_tradenames_new_AlterNative4">
<span<?php echo $pres_tradenames_new->AlterNative4->viewAttributes() ?>>
<?php echo $pres_tradenames_new->AlterNative4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_tradenames_new_list->ListOptions->render("body", "right", $pres_tradenames_new_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pres_tradenames_new->isGridAdd())
		$pres_tradenames_new_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pres_tradenames_new->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_tradenames_new_list->Recordset)
	$pres_tradenames_new_list->Recordset->Close();
?>
<?php if (!$pres_tradenames_new->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_tradenames_new->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_tradenames_new_list->Pager)) $pres_tradenames_new_list->Pager = new NumericPager($pres_tradenames_new_list->StartRec, $pres_tradenames_new_list->DisplayRecs, $pres_tradenames_new_list->TotalRecs, $pres_tradenames_new_list->RecRange, $pres_tradenames_new_list->AutoHidePager) ?>
<?php if ($pres_tradenames_new_list->Pager->RecordCount > 0 && $pres_tradenames_new_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_tradenames_new_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_tradenames_new_list->pageUrl() ?>start=<?php echo $pres_tradenames_new_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_tradenames_new_list->pageUrl() ?>start=<?php echo $pres_tradenames_new_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_tradenames_new_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_tradenames_new_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_tradenames_new_list->pageUrl() ?>start=<?php echo $pres_tradenames_new_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_tradenames_new_list->pageUrl() ?>start=<?php echo $pres_tradenames_new_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_tradenames_new_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_tradenames_new_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_tradenames_new_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_tradenames_new_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_tradenames_new_list->TotalRecs > 0 && (!$pres_tradenames_new_list->AutoHidePageSizeSelector || $pres_tradenames_new_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_tradenames_new">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_tradenames_new_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_tradenames_new_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_tradenames_new_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_tradenames_new_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_tradenames_new_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_tradenames_new_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_tradenames_new->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_tradenames_new_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_tradenames_new_list->TotalRecs == 0 && !$pres_tradenames_new->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_tradenames_new_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_tradenames_new_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_tradenames_new->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pres_tradenames_new->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pres_tradenames_new", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_tradenames_new_list->terminate();
?>