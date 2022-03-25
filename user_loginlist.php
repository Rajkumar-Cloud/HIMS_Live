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
$user_login_list = new user_login_list();

// Run the page
$user_login_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$user_login_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$user_login->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fuser_loginlist = currentForm = new ew.Form("fuser_loginlist", "list");
fuser_loginlist.formKeyCountName = '<?php echo $user_login_list->FormKeyCountName ?>';

// Form_CustomValidate event
fuser_loginlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fuser_loginlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fuser_loginlist.lists["x_User_Name"] = <?php echo $user_login_list->User_Name->Lookup->toClientList() ?>;
fuser_loginlist.lists["x_User_Name"].options = <?php echo JsonEncode($user_login_list->User_Name->lookupOptions()) ?>;
fuser_loginlist.autoSuggests["x_User_Name"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fuser_loginlist.lists["x_email_verified"] = <?php echo $user_login_list->email_verified->Lookup->toClientList() ?>;
fuser_loginlist.lists["x_email_verified"].options = <?php echo JsonEncode($user_login_list->email_verified->options(FALSE, TRUE)) ?>;
fuser_loginlist.lists["x_UserLevel"] = <?php echo $user_login_list->UserLevel->Lookup->toClientList() ?>;
fuser_loginlist.lists["x_UserLevel"].options = <?php echo JsonEncode($user_login_list->UserLevel->lookupOptions()) ?>;
fuser_loginlist.lists["x_HospID"] = <?php echo $user_login_list->HospID->Lookup->toClientList() ?>;
fuser_loginlist.lists["x_HospID"].options = <?php echo JsonEncode($user_login_list->HospID->lookupOptions()) ?>;
fuser_loginlist.lists["x_PharID[]"] = <?php echo $user_login_list->PharID->Lookup->toClientList() ?>;
fuser_loginlist.lists["x_PharID[]"].options = <?php echo JsonEncode($user_login_list->PharID->lookupOptions()) ?>;
fuser_loginlist.lists["x_StoreID[]"] = <?php echo $user_login_list->StoreID->Lookup->toClientList() ?>;
fuser_loginlist.lists["x_StoreID[]"].options = <?php echo JsonEncode($user_login_list->StoreID->lookupOptions()) ?>;

// Form object for search
var fuser_loginlistsrch = currentSearchForm = new ew.Form("fuser_loginlistsrch");

// Filters
fuser_loginlistsrch.filterList = <?php echo $user_login_list->getFilterList() ?>;
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
<?php if (!$user_login->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($user_login_list->TotalRecs > 0 && $user_login_list->ExportOptions->visible()) { ?>
<?php $user_login_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($user_login_list->ImportOptions->visible()) { ?>
<?php $user_login_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($user_login_list->SearchOptions->visible()) { ?>
<?php $user_login_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($user_login_list->FilterOptions->visible()) { ?>
<?php $user_login_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$user_login_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$user_login->isExport() && !$user_login->CurrentAction) { ?>
<form name="fuser_loginlistsrch" id="fuser_loginlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($user_login_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fuser_loginlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="user_login">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($user_login_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($user_login_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $user_login_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($user_login_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($user_login_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($user_login_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($user_login_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $user_login_list->showPageHeader(); ?>
<?php
$user_login_list->showMessage();
?>
<?php if ($user_login_list->TotalRecs > 0 || $user_login->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($user_login_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> user_login">
<?php if (!$user_login->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$user_login->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($user_login_list->Pager)) $user_login_list->Pager = new NumericPager($user_login_list->StartRec, $user_login_list->DisplayRecs, $user_login_list->TotalRecs, $user_login_list->RecRange, $user_login_list->AutoHidePager) ?>
<?php if ($user_login_list->Pager->RecordCount > 0 && $user_login_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($user_login_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $user_login_list->pageUrl() ?>start=<?php echo $user_login_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($user_login_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $user_login_list->pageUrl() ?>start=<?php echo $user_login_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($user_login_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $user_login_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($user_login_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $user_login_list->pageUrl() ?>start=<?php echo $user_login_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($user_login_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $user_login_list->pageUrl() ?>start=<?php echo $user_login_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($user_login_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $user_login_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $user_login_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $user_login_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($user_login_list->TotalRecs > 0 && (!$user_login_list->AutoHidePageSizeSelector || $user_login_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="user_login">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($user_login_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($user_login_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($user_login_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($user_login_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($user_login_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($user_login_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($user_login->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $user_login_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fuser_loginlist" id="fuser_loginlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($user_login_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $user_login_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="user_login">
<div id="gmp_user_login" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($user_login_list->TotalRecs > 0 || $user_login->isGridEdit()) { ?>
<table id="tbl_user_loginlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$user_login_list->RowType = ROWTYPE_HEADER;

// Render list options
$user_login_list->renderListOptions();

// Render list options (header, left)
$user_login_list->ListOptions->render("header", "left");
?>
<?php if ($user_login->id->Visible) { // id ?>
	<?php if ($user_login->sortUrl($user_login->id) == "") { ?>
		<th data-name="id" class="<?php echo $user_login->id->headerCellClass() ?>"><div id="elh_user_login_id" class="user_login_id"><div class="ew-table-header-caption"><?php echo $user_login->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $user_login->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $user_login->SortUrl($user_login->id) ?>',1);"><div id="elh_user_login_id" class="user_login_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($user_login->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login->User_Name->Visible) { // User_Name ?>
	<?php if ($user_login->sortUrl($user_login->User_Name) == "") { ?>
		<th data-name="User_Name" class="<?php echo $user_login->User_Name->headerCellClass() ?>"><div id="elh_user_login_User_Name" class="user_login_User_Name"><div class="ew-table-header-caption"><?php echo $user_login->User_Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="User_Name" class="<?php echo $user_login->User_Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $user_login->SortUrl($user_login->User_Name) ?>',1);"><div id="elh_user_login_User_Name" class="user_login_User_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login->User_Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($user_login->User_Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($user_login->User_Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login->mail_id->Visible) { // mail_id ?>
	<?php if ($user_login->sortUrl($user_login->mail_id) == "") { ?>
		<th data-name="mail_id" class="<?php echo $user_login->mail_id->headerCellClass() ?>"><div id="elh_user_login_mail_id" class="user_login_mail_id"><div class="ew-table-header-caption"><?php echo $user_login->mail_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mail_id" class="<?php echo $user_login->mail_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $user_login->SortUrl($user_login->mail_id) ?>',1);"><div id="elh_user_login_mail_id" class="user_login_mail_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login->mail_id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($user_login->mail_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($user_login->mail_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login->mobile_no->Visible) { // mobile_no ?>
	<?php if ($user_login->sortUrl($user_login->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $user_login->mobile_no->headerCellClass() ?>"><div id="elh_user_login_mobile_no" class="user_login_mobile_no"><div class="ew-table-header-caption"><?php echo $user_login->mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $user_login->mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $user_login->SortUrl($user_login->mobile_no) ?>',1);"><div id="elh_user_login_mobile_no" class="user_login_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login->mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($user_login->mobile_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($user_login->mobile_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login->password->Visible) { // password ?>
	<?php if ($user_login->sortUrl($user_login->password) == "") { ?>
		<th data-name="password" class="<?php echo $user_login->password->headerCellClass() ?>"><div id="elh_user_login_password" class="user_login_password"><div class="ew-table-header-caption"><?php echo $user_login->password->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="password" class="<?php echo $user_login->password->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $user_login->SortUrl($user_login->password) ?>',1);"><div id="elh_user_login_password" class="user_login_password">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login->password->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login->password->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($user_login->password->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login->email_verified->Visible) { // email_verified ?>
	<?php if ($user_login->sortUrl($user_login->email_verified) == "") { ?>
		<th data-name="email_verified" class="<?php echo $user_login->email_verified->headerCellClass() ?>"><div id="elh_user_login_email_verified" class="user_login_email_verified"><div class="ew-table-header-caption"><?php echo $user_login->email_verified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="email_verified" class="<?php echo $user_login->email_verified->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $user_login->SortUrl($user_login->email_verified) ?>',1);"><div id="elh_user_login_email_verified" class="user_login_email_verified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login->email_verified->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login->email_verified->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($user_login->email_verified->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login->ReportTo->Visible) { // ReportTo ?>
	<?php if ($user_login->sortUrl($user_login->ReportTo) == "") { ?>
		<th data-name="ReportTo" class="<?php echo $user_login->ReportTo->headerCellClass() ?>"><div id="elh_user_login_ReportTo" class="user_login_ReportTo"><div class="ew-table-header-caption"><?php echo $user_login->ReportTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportTo" class="<?php echo $user_login->ReportTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $user_login->SortUrl($user_login->ReportTo) ?>',1);"><div id="elh_user_login_ReportTo" class="user_login_ReportTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login->ReportTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login->ReportTo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($user_login->ReportTo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login->UserLevel->Visible) { // UserLevel ?>
	<?php if ($user_login->sortUrl($user_login->UserLevel) == "") { ?>
		<th data-name="UserLevel" class="<?php echo $user_login->UserLevel->headerCellClass() ?>"><div id="elh_user_login_UserLevel" class="user_login_UserLevel"><div class="ew-table-header-caption"><?php echo $user_login->UserLevel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserLevel" class="<?php echo $user_login->UserLevel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $user_login->SortUrl($user_login->UserLevel) ?>',1);"><div id="elh_user_login_UserLevel" class="user_login_UserLevel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login->UserLevel->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login->UserLevel->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($user_login->UserLevel->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<?php if ($user_login->sortUrl($user_login->CreatedDateTime) == "") { ?>
		<th data-name="CreatedDateTime" class="<?php echo $user_login->CreatedDateTime->headerCellClass() ?>"><div id="elh_user_login_CreatedDateTime" class="user_login_CreatedDateTime"><div class="ew-table-header-caption"><?php echo $user_login->CreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedDateTime" class="<?php echo $user_login->CreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $user_login->SortUrl($user_login->CreatedDateTime) ?>',1);"><div id="elh_user_login_CreatedDateTime" class="user_login_CreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login->CreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login->CreatedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($user_login->CreatedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login->profilefield->Visible) { // profilefield ?>
	<?php if ($user_login->sortUrl($user_login->profilefield) == "") { ?>
		<th data-name="profilefield" class="<?php echo $user_login->profilefield->headerCellClass() ?>"><div id="elh_user_login_profilefield" class="user_login_profilefield"><div class="ew-table-header-caption"><?php echo $user_login->profilefield->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="profilefield" class="<?php echo $user_login->profilefield->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $user_login->SortUrl($user_login->profilefield) ?>',1);"><div id="elh_user_login_profilefield" class="user_login_profilefield">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login->profilefield->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($user_login->profilefield->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($user_login->profilefield->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login->_UserID->Visible) { // UserID ?>
	<?php if ($user_login->sortUrl($user_login->_UserID) == "") { ?>
		<th data-name="_UserID" class="<?php echo $user_login->_UserID->headerCellClass() ?>"><div id="elh_user_login__UserID" class="user_login__UserID"><div class="ew-table-header-caption"><?php echo $user_login->_UserID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_UserID" class="<?php echo $user_login->_UserID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $user_login->SortUrl($user_login->_UserID) ?>',1);"><div id="elh_user_login__UserID" class="user_login__UserID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login->_UserID->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login->_UserID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($user_login->_UserID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login->GroupID->Visible) { // GroupID ?>
	<?php if ($user_login->sortUrl($user_login->GroupID) == "") { ?>
		<th data-name="GroupID" class="<?php echo $user_login->GroupID->headerCellClass() ?>"><div id="elh_user_login_GroupID" class="user_login_GroupID"><div class="ew-table-header-caption"><?php echo $user_login->GroupID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GroupID" class="<?php echo $user_login->GroupID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $user_login->SortUrl($user_login->GroupID) ?>',1);"><div id="elh_user_login_GroupID" class="user_login_GroupID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login->GroupID->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login->GroupID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($user_login->GroupID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login->HospID->Visible) { // HospID ?>
	<?php if ($user_login->sortUrl($user_login->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $user_login->HospID->headerCellClass() ?>"><div id="elh_user_login_HospID" class="user_login_HospID"><div class="ew-table-header-caption"><?php echo $user_login->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $user_login->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $user_login->SortUrl($user_login->HospID) ?>',1);"><div id="elh_user_login_HospID" class="user_login_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($user_login->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login->PharID->Visible) { // PharID ?>
	<?php if ($user_login->sortUrl($user_login->PharID) == "") { ?>
		<th data-name="PharID" class="<?php echo $user_login->PharID->headerCellClass() ?>"><div id="elh_user_login_PharID" class="user_login_PharID"><div class="ew-table-header-caption"><?php echo $user_login->PharID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PharID" class="<?php echo $user_login->PharID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $user_login->SortUrl($user_login->PharID) ?>',1);"><div id="elh_user_login_PharID" class="user_login_PharID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login->PharID->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login->PharID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($user_login->PharID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login->StoreID->Visible) { // StoreID ?>
	<?php if ($user_login->sortUrl($user_login->StoreID) == "") { ?>
		<th data-name="StoreID" class="<?php echo $user_login->StoreID->headerCellClass() ?>"><div id="elh_user_login_StoreID" class="user_login_StoreID"><div class="ew-table-header-caption"><?php echo $user_login->StoreID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StoreID" class="<?php echo $user_login->StoreID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $user_login->SortUrl($user_login->StoreID) ?>',1);"><div id="elh_user_login_StoreID" class="user_login_StoreID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login->StoreID->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login->StoreID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($user_login->StoreID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login->OTP->Visible) { // OTP ?>
	<?php if ($user_login->sortUrl($user_login->OTP) == "") { ?>
		<th data-name="OTP" class="<?php echo $user_login->OTP->headerCellClass() ?>"><div id="elh_user_login_OTP" class="user_login_OTP"><div class="ew-table-header-caption"><?php echo $user_login->OTP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OTP" class="<?php echo $user_login->OTP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $user_login->SortUrl($user_login->OTP) ?>',1);"><div id="elh_user_login_OTP" class="user_login_OTP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login->OTP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($user_login->OTP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($user_login->OTP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login->LoginType->Visible) { // LoginType ?>
	<?php if ($user_login->sortUrl($user_login->LoginType) == "") { ?>
		<th data-name="LoginType" class="<?php echo $user_login->LoginType->headerCellClass() ?>"><div id="elh_user_login_LoginType" class="user_login_LoginType"><div class="ew-table-header-caption"><?php echo $user_login->LoginType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LoginType" class="<?php echo $user_login->LoginType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $user_login->SortUrl($user_login->LoginType) ?>',1);"><div id="elh_user_login_LoginType" class="user_login_LoginType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login->LoginType->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login->LoginType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($user_login->LoginType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login->BranchId->Visible) { // BranchId ?>
	<?php if ($user_login->sortUrl($user_login->BranchId) == "") { ?>
		<th data-name="BranchId" class="<?php echo $user_login->BranchId->headerCellClass() ?>"><div id="elh_user_login_BranchId" class="user_login_BranchId"><div class="ew-table-header-caption"><?php echo $user_login->BranchId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BranchId" class="<?php echo $user_login->BranchId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $user_login->SortUrl($user_login->BranchId) ?>',1);"><div id="elh_user_login_BranchId" class="user_login_BranchId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login->BranchId->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login->BranchId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($user_login->BranchId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$user_login_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($user_login->ExportAll && $user_login->isExport()) {
	$user_login_list->StopRec = $user_login_list->TotalRecs;
} else {

	// Set the last record to display
	if ($user_login_list->TotalRecs > $user_login_list->StartRec + $user_login_list->DisplayRecs - 1)
		$user_login_list->StopRec = $user_login_list->StartRec + $user_login_list->DisplayRecs - 1;
	else
		$user_login_list->StopRec = $user_login_list->TotalRecs;
}
$user_login_list->RecCnt = $user_login_list->StartRec - 1;
if ($user_login_list->Recordset && !$user_login_list->Recordset->EOF) {
	$user_login_list->Recordset->moveFirst();
	$selectLimit = $user_login_list->UseSelectLimit;
	if (!$selectLimit && $user_login_list->StartRec > 1)
		$user_login_list->Recordset->move($user_login_list->StartRec - 1);
} elseif (!$user_login->AllowAddDeleteRow && $user_login_list->StopRec == 0) {
	$user_login_list->StopRec = $user_login->GridAddRowCount;
}

// Initialize aggregate
$user_login->RowType = ROWTYPE_AGGREGATEINIT;
$user_login->resetAttributes();
$user_login_list->renderRow();
while ($user_login_list->RecCnt < $user_login_list->StopRec) {
	$user_login_list->RecCnt++;
	if ($user_login_list->RecCnt >= $user_login_list->StartRec) {
		$user_login_list->RowCnt++;

		// Set up key count
		$user_login_list->KeyCount = $user_login_list->RowIndex;

		// Init row class and style
		$user_login->resetAttributes();
		$user_login->CssClass = "";
		if ($user_login->isGridAdd()) {
		} else {
			$user_login_list->loadRowValues($user_login_list->Recordset); // Load row values
		}
		$user_login->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$user_login->RowAttrs = array_merge($user_login->RowAttrs, array('data-rowindex'=>$user_login_list->RowCnt, 'id'=>'r' . $user_login_list->RowCnt . '_user_login', 'data-rowtype'=>$user_login->RowType));

		// Render row
		$user_login_list->renderRow();

		// Render list options
		$user_login_list->renderListOptions();
?>
	<tr<?php echo $user_login->rowAttributes() ?>>
<?php

// Render list options (body, left)
$user_login_list->ListOptions->render("body", "left", $user_login_list->RowCnt);
?>
	<?php if ($user_login->id->Visible) { // id ?>
		<td data-name="id"<?php echo $user_login->id->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCnt ?>_user_login_id" class="user_login_id">
<span<?php echo $user_login->id->viewAttributes() ?>>
<?php echo $user_login->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login->User_Name->Visible) { // User_Name ?>
		<td data-name="User_Name"<?php echo $user_login->User_Name->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCnt ?>_user_login_User_Name" class="user_login_User_Name">
<span<?php echo $user_login->User_Name->viewAttributes() ?>>
<?php echo $user_login->User_Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login->mail_id->Visible) { // mail_id ?>
		<td data-name="mail_id"<?php echo $user_login->mail_id->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCnt ?>_user_login_mail_id" class="user_login_mail_id">
<span<?php echo $user_login->mail_id->viewAttributes() ?>>
<?php echo $user_login->mail_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no"<?php echo $user_login->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCnt ?>_user_login_mobile_no" class="user_login_mobile_no">
<span<?php echo $user_login->mobile_no->viewAttributes() ?>>
<?php echo $user_login->mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login->password->Visible) { // password ?>
		<td data-name="password"<?php echo $user_login->password->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCnt ?>_user_login_password" class="user_login_password">
<span<?php echo $user_login->password->viewAttributes() ?>>
<?php echo $user_login->password->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login->email_verified->Visible) { // email_verified ?>
		<td data-name="email_verified"<?php echo $user_login->email_verified->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCnt ?>_user_login_email_verified" class="user_login_email_verified">
<span<?php echo $user_login->email_verified->viewAttributes() ?>>
<?php echo $user_login->email_verified->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login->ReportTo->Visible) { // ReportTo ?>
		<td data-name="ReportTo"<?php echo $user_login->ReportTo->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCnt ?>_user_login_ReportTo" class="user_login_ReportTo">
<span<?php echo $user_login->ReportTo->viewAttributes() ?>>
<?php echo $user_login->ReportTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login->UserLevel->Visible) { // UserLevel ?>
		<td data-name="UserLevel"<?php echo $user_login->UserLevel->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCnt ?>_user_login_UserLevel" class="user_login_UserLevel">
<span<?php echo $user_login->UserLevel->viewAttributes() ?>>
<?php echo $user_login->UserLevel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td data-name="CreatedDateTime"<?php echo $user_login->CreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCnt ?>_user_login_CreatedDateTime" class="user_login_CreatedDateTime">
<span<?php echo $user_login->CreatedDateTime->viewAttributes() ?>>
<?php echo $user_login->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login->profilefield->Visible) { // profilefield ?>
		<td data-name="profilefield"<?php echo $user_login->profilefield->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCnt ?>_user_login_profilefield" class="user_login_profilefield">
<span<?php echo $user_login->profilefield->viewAttributes() ?>>
<?php echo $user_login->profilefield->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login->_UserID->Visible) { // UserID ?>
		<td data-name="_UserID"<?php echo $user_login->_UserID->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCnt ?>_user_login__UserID" class="user_login__UserID">
<span<?php echo $user_login->_UserID->viewAttributes() ?>>
<?php echo $user_login->_UserID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login->GroupID->Visible) { // GroupID ?>
		<td data-name="GroupID"<?php echo $user_login->GroupID->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCnt ?>_user_login_GroupID" class="user_login_GroupID">
<span<?php echo $user_login->GroupID->viewAttributes() ?>>
<?php echo $user_login->GroupID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $user_login->HospID->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCnt ?>_user_login_HospID" class="user_login_HospID">
<span<?php echo $user_login->HospID->viewAttributes() ?>>
<?php echo $user_login->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login->PharID->Visible) { // PharID ?>
		<td data-name="PharID"<?php echo $user_login->PharID->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCnt ?>_user_login_PharID" class="user_login_PharID">
<span<?php echo $user_login->PharID->viewAttributes() ?>>
<?php echo $user_login->PharID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login->StoreID->Visible) { // StoreID ?>
		<td data-name="StoreID"<?php echo $user_login->StoreID->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCnt ?>_user_login_StoreID" class="user_login_StoreID">
<span<?php echo $user_login->StoreID->viewAttributes() ?>>
<?php echo $user_login->StoreID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login->OTP->Visible) { // OTP ?>
		<td data-name="OTP"<?php echo $user_login->OTP->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCnt ?>_user_login_OTP" class="user_login_OTP">
<span<?php echo $user_login->OTP->viewAttributes() ?>>
<?php echo $user_login->OTP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login->LoginType->Visible) { // LoginType ?>
		<td data-name="LoginType"<?php echo $user_login->LoginType->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCnt ?>_user_login_LoginType" class="user_login_LoginType">
<span<?php echo $user_login->LoginType->viewAttributes() ?>>
<?php echo $user_login->LoginType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login->BranchId->Visible) { // BranchId ?>
		<td data-name="BranchId"<?php echo $user_login->BranchId->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCnt ?>_user_login_BranchId" class="user_login_BranchId">
<span<?php echo $user_login->BranchId->viewAttributes() ?>>
<?php echo $user_login->BranchId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$user_login_list->ListOptions->render("body", "right", $user_login_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$user_login->isGridAdd())
		$user_login_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$user_login->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($user_login_list->Recordset)
	$user_login_list->Recordset->Close();
?>
<?php if (!$user_login->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$user_login->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($user_login_list->Pager)) $user_login_list->Pager = new NumericPager($user_login_list->StartRec, $user_login_list->DisplayRecs, $user_login_list->TotalRecs, $user_login_list->RecRange, $user_login_list->AutoHidePager) ?>
<?php if ($user_login_list->Pager->RecordCount > 0 && $user_login_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($user_login_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $user_login_list->pageUrl() ?>start=<?php echo $user_login_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($user_login_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $user_login_list->pageUrl() ?>start=<?php echo $user_login_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($user_login_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $user_login_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($user_login_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $user_login_list->pageUrl() ?>start=<?php echo $user_login_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($user_login_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $user_login_list->pageUrl() ?>start=<?php echo $user_login_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($user_login_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $user_login_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $user_login_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $user_login_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($user_login_list->TotalRecs > 0 && (!$user_login_list->AutoHidePageSizeSelector || $user_login_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="user_login">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($user_login_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($user_login_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($user_login_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($user_login_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($user_login_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($user_login_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($user_login->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $user_login_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($user_login_list->TotalRecs == 0 && !$user_login->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $user_login_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$user_login_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$user_login->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$user_login->isExport()) { ?>
<script>
ew.scrollableTable("gmp_user_login", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$user_login_list->terminate();
?>