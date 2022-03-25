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
<?php include_once "header.php"; ?>
<?php if (!$user_login_list->isExport()) { ?>
<script>
var fuser_loginlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fuser_loginlist = currentForm = new ew.Form("fuser_loginlist", "list");
	fuser_loginlist.formKeyCountName = '<?php echo $user_login_list->FormKeyCountName ?>';
	loadjs.done("fuser_loginlist");
});
var fuser_loginlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fuser_loginlistsrch = currentSearchForm = new ew.Form("fuser_loginlistsrch");

	// Dynamic selection lists
	// Filters

	fuser_loginlistsrch.filterList = <?php echo $user_login_list->getFilterList() ?>;
	loadjs.done("fuser_loginlistsrch");
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
<?php if (!$user_login_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($user_login_list->TotalRecords > 0 && $user_login_list->ExportOptions->visible()) { ?>
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
<?php if (!$user_login_list->isExport() && !$user_login->CurrentAction) { ?>
<form name="fuser_loginlistsrch" id="fuser_loginlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fuser_loginlistsrch-search-panel" class="<?php echo $user_login_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="user_login">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $user_login_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($user_login_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($user_login_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $user_login_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($user_login_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($user_login_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($user_login_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($user_login_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $user_login_list->showPageHeader(); ?>
<?php
$user_login_list->showMessage();
?>
<?php if ($user_login_list->TotalRecords > 0 || $user_login->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($user_login_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> user_login">
<?php if (!$user_login_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$user_login_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $user_login_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $user_login_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fuser_loginlist" id="fuser_loginlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="user_login">
<div id="gmp_user_login" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($user_login_list->TotalRecords > 0 || $user_login_list->isGridEdit()) { ?>
<table id="tbl_user_loginlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$user_login->RowType = ROWTYPE_HEADER;

// Render list options
$user_login_list->renderListOptions();

// Render list options (header, left)
$user_login_list->ListOptions->render("header", "left");
?>
<?php if ($user_login_list->id->Visible) { // id ?>
	<?php if ($user_login_list->SortUrl($user_login_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $user_login_list->id->headerCellClass() ?>"><div id="elh_user_login_id" class="user_login_id"><div class="ew-table-header-caption"><?php echo $user_login_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $user_login_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $user_login_list->SortUrl($user_login_list->id) ?>', 1);"><div id="elh_user_login_id" class="user_login_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($user_login_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login_list->User_Name->Visible) { // User_Name ?>
	<?php if ($user_login_list->SortUrl($user_login_list->User_Name) == "") { ?>
		<th data-name="User_Name" class="<?php echo $user_login_list->User_Name->headerCellClass() ?>"><div id="elh_user_login_User_Name" class="user_login_User_Name"><div class="ew-table-header-caption"><?php echo $user_login_list->User_Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="User_Name" class="<?php echo $user_login_list->User_Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $user_login_list->SortUrl($user_login_list->User_Name) ?>', 1);"><div id="elh_user_login_User_Name" class="user_login_User_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login_list->User_Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($user_login_list->User_Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($user_login_list->User_Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login_list->mail_id->Visible) { // mail_id ?>
	<?php if ($user_login_list->SortUrl($user_login_list->mail_id) == "") { ?>
		<th data-name="mail_id" class="<?php echo $user_login_list->mail_id->headerCellClass() ?>"><div id="elh_user_login_mail_id" class="user_login_mail_id"><div class="ew-table-header-caption"><?php echo $user_login_list->mail_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mail_id" class="<?php echo $user_login_list->mail_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $user_login_list->SortUrl($user_login_list->mail_id) ?>', 1);"><div id="elh_user_login_mail_id" class="user_login_mail_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login_list->mail_id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($user_login_list->mail_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($user_login_list->mail_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login_list->mobile_no->Visible) { // mobile_no ?>
	<?php if ($user_login_list->SortUrl($user_login_list->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $user_login_list->mobile_no->headerCellClass() ?>"><div id="elh_user_login_mobile_no" class="user_login_mobile_no"><div class="ew-table-header-caption"><?php echo $user_login_list->mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $user_login_list->mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $user_login_list->SortUrl($user_login_list->mobile_no) ?>', 1);"><div id="elh_user_login_mobile_no" class="user_login_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login_list->mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($user_login_list->mobile_no->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($user_login_list->mobile_no->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login_list->password->Visible) { // password ?>
	<?php if ($user_login_list->SortUrl($user_login_list->password) == "") { ?>
		<th data-name="password" class="<?php echo $user_login_list->password->headerCellClass() ?>"><div id="elh_user_login_password" class="user_login_password"><div class="ew-table-header-caption"><?php echo $user_login_list->password->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="password" class="<?php echo $user_login_list->password->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $user_login_list->SortUrl($user_login_list->password) ?>', 1);"><div id="elh_user_login_password" class="user_login_password">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login_list->password->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login_list->password->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($user_login_list->password->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login_list->email_verified->Visible) { // email_verified ?>
	<?php if ($user_login_list->SortUrl($user_login_list->email_verified) == "") { ?>
		<th data-name="email_verified" class="<?php echo $user_login_list->email_verified->headerCellClass() ?>"><div id="elh_user_login_email_verified" class="user_login_email_verified"><div class="ew-table-header-caption"><?php echo $user_login_list->email_verified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="email_verified" class="<?php echo $user_login_list->email_verified->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $user_login_list->SortUrl($user_login_list->email_verified) ?>', 1);"><div id="elh_user_login_email_verified" class="user_login_email_verified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login_list->email_verified->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login_list->email_verified->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($user_login_list->email_verified->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login_list->ReportTo->Visible) { // ReportTo ?>
	<?php if ($user_login_list->SortUrl($user_login_list->ReportTo) == "") { ?>
		<th data-name="ReportTo" class="<?php echo $user_login_list->ReportTo->headerCellClass() ?>"><div id="elh_user_login_ReportTo" class="user_login_ReportTo"><div class="ew-table-header-caption"><?php echo $user_login_list->ReportTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportTo" class="<?php echo $user_login_list->ReportTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $user_login_list->SortUrl($user_login_list->ReportTo) ?>', 1);"><div id="elh_user_login_ReportTo" class="user_login_ReportTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login_list->ReportTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login_list->ReportTo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($user_login_list->ReportTo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login_list->_UserLevel->Visible) { // UserLevel ?>
	<?php if ($user_login_list->SortUrl($user_login_list->_UserLevel) == "") { ?>
		<th data-name="_UserLevel" class="<?php echo $user_login_list->_UserLevel->headerCellClass() ?>"><div id="elh_user_login__UserLevel" class="user_login__UserLevel"><div class="ew-table-header-caption"><?php echo $user_login_list->_UserLevel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_UserLevel" class="<?php echo $user_login_list->_UserLevel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $user_login_list->SortUrl($user_login_list->_UserLevel) ?>', 1);"><div id="elh_user_login__UserLevel" class="user_login__UserLevel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login_list->_UserLevel->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login_list->_UserLevel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($user_login_list->_UserLevel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login_list->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<?php if ($user_login_list->SortUrl($user_login_list->CreatedDateTime) == "") { ?>
		<th data-name="CreatedDateTime" class="<?php echo $user_login_list->CreatedDateTime->headerCellClass() ?>"><div id="elh_user_login_CreatedDateTime" class="user_login_CreatedDateTime"><div class="ew-table-header-caption"><?php echo $user_login_list->CreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedDateTime" class="<?php echo $user_login_list->CreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $user_login_list->SortUrl($user_login_list->CreatedDateTime) ?>', 1);"><div id="elh_user_login_CreatedDateTime" class="user_login_CreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login_list->CreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login_list->CreatedDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($user_login_list->CreatedDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login_list->profilefield->Visible) { // profilefield ?>
	<?php if ($user_login_list->SortUrl($user_login_list->profilefield) == "") { ?>
		<th data-name="profilefield" class="<?php echo $user_login_list->profilefield->headerCellClass() ?>"><div id="elh_user_login_profilefield" class="user_login_profilefield"><div class="ew-table-header-caption"><?php echo $user_login_list->profilefield->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="profilefield" class="<?php echo $user_login_list->profilefield->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $user_login_list->SortUrl($user_login_list->profilefield) ?>', 1);"><div id="elh_user_login_profilefield" class="user_login_profilefield">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login_list->profilefield->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($user_login_list->profilefield->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($user_login_list->profilefield->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login_list->_UserID->Visible) { // UserID ?>
	<?php if ($user_login_list->SortUrl($user_login_list->_UserID) == "") { ?>
		<th data-name="_UserID" class="<?php echo $user_login_list->_UserID->headerCellClass() ?>"><div id="elh_user_login__UserID" class="user_login__UserID"><div class="ew-table-header-caption"><?php echo $user_login_list->_UserID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_UserID" class="<?php echo $user_login_list->_UserID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $user_login_list->SortUrl($user_login_list->_UserID) ?>', 1);"><div id="elh_user_login__UserID" class="user_login__UserID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login_list->_UserID->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login_list->_UserID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($user_login_list->_UserID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login_list->GroupID->Visible) { // GroupID ?>
	<?php if ($user_login_list->SortUrl($user_login_list->GroupID) == "") { ?>
		<th data-name="GroupID" class="<?php echo $user_login_list->GroupID->headerCellClass() ?>"><div id="elh_user_login_GroupID" class="user_login_GroupID"><div class="ew-table-header-caption"><?php echo $user_login_list->GroupID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GroupID" class="<?php echo $user_login_list->GroupID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $user_login_list->SortUrl($user_login_list->GroupID) ?>', 1);"><div id="elh_user_login_GroupID" class="user_login_GroupID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login_list->GroupID->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login_list->GroupID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($user_login_list->GroupID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login_list->HospID->Visible) { // HospID ?>
	<?php if ($user_login_list->SortUrl($user_login_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $user_login_list->HospID->headerCellClass() ?>"><div id="elh_user_login_HospID" class="user_login_HospID"><div class="ew-table-header-caption"><?php echo $user_login_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $user_login_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $user_login_list->SortUrl($user_login_list->HospID) ?>', 1);"><div id="elh_user_login_HospID" class="user_login_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($user_login_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login_list->PharID->Visible) { // PharID ?>
	<?php if ($user_login_list->SortUrl($user_login_list->PharID) == "") { ?>
		<th data-name="PharID" class="<?php echo $user_login_list->PharID->headerCellClass() ?>"><div id="elh_user_login_PharID" class="user_login_PharID"><div class="ew-table-header-caption"><?php echo $user_login_list->PharID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PharID" class="<?php echo $user_login_list->PharID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $user_login_list->SortUrl($user_login_list->PharID) ?>', 1);"><div id="elh_user_login_PharID" class="user_login_PharID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login_list->PharID->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login_list->PharID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($user_login_list->PharID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($user_login_list->StoreID->Visible) { // StoreID ?>
	<?php if ($user_login_list->SortUrl($user_login_list->StoreID) == "") { ?>
		<th data-name="StoreID" class="<?php echo $user_login_list->StoreID->headerCellClass() ?>"><div id="elh_user_login_StoreID" class="user_login_StoreID"><div class="ew-table-header-caption"><?php echo $user_login_list->StoreID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StoreID" class="<?php echo $user_login_list->StoreID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $user_login_list->SortUrl($user_login_list->StoreID) ?>', 1);"><div id="elh_user_login_StoreID" class="user_login_StoreID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $user_login_list->StoreID->caption() ?></span><span class="ew-table-header-sort"><?php if ($user_login_list->StoreID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($user_login_list->StoreID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
if ($user_login_list->ExportAll && $user_login_list->isExport()) {
	$user_login_list->StopRecord = $user_login_list->TotalRecords;
} else {

	// Set the last record to display
	if ($user_login_list->TotalRecords > $user_login_list->StartRecord + $user_login_list->DisplayRecords - 1)
		$user_login_list->StopRecord = $user_login_list->StartRecord + $user_login_list->DisplayRecords - 1;
	else
		$user_login_list->StopRecord = $user_login_list->TotalRecords;
}
$user_login_list->RecordCount = $user_login_list->StartRecord - 1;
if ($user_login_list->Recordset && !$user_login_list->Recordset->EOF) {
	$user_login_list->Recordset->moveFirst();
	$selectLimit = $user_login_list->UseSelectLimit;
	if (!$selectLimit && $user_login_list->StartRecord > 1)
		$user_login_list->Recordset->move($user_login_list->StartRecord - 1);
} elseif (!$user_login->AllowAddDeleteRow && $user_login_list->StopRecord == 0) {
	$user_login_list->StopRecord = $user_login->GridAddRowCount;
}

// Initialize aggregate
$user_login->RowType = ROWTYPE_AGGREGATEINIT;
$user_login->resetAttributes();
$user_login_list->renderRow();
while ($user_login_list->RecordCount < $user_login_list->StopRecord) {
	$user_login_list->RecordCount++;
	if ($user_login_list->RecordCount >= $user_login_list->StartRecord) {
		$user_login_list->RowCount++;

		// Set up key count
		$user_login_list->KeyCount = $user_login_list->RowIndex;

		// Init row class and style
		$user_login->resetAttributes();
		$user_login->CssClass = "";
		if ($user_login_list->isGridAdd()) {
		} else {
			$user_login_list->loadRowValues($user_login_list->Recordset); // Load row values
		}
		$user_login->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$user_login->RowAttrs->merge(["data-rowindex" => $user_login_list->RowCount, "id" => "r" . $user_login_list->RowCount . "_user_login", "data-rowtype" => $user_login->RowType]);

		// Render row
		$user_login_list->renderRow();

		// Render list options
		$user_login_list->renderListOptions();
?>
	<tr <?php echo $user_login->rowAttributes() ?>>
<?php

// Render list options (body, left)
$user_login_list->ListOptions->render("body", "left", $user_login_list->RowCount);
?>
	<?php if ($user_login_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $user_login_list->id->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCount ?>_user_login_id">
<span<?php echo $user_login_list->id->viewAttributes() ?>><?php echo $user_login_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login_list->User_Name->Visible) { // User_Name ?>
		<td data-name="User_Name" <?php echo $user_login_list->User_Name->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCount ?>_user_login_User_Name">
<span<?php echo $user_login_list->User_Name->viewAttributes() ?>><?php echo $user_login_list->User_Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login_list->mail_id->Visible) { // mail_id ?>
		<td data-name="mail_id" <?php echo $user_login_list->mail_id->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCount ?>_user_login_mail_id">
<span<?php echo $user_login_list->mail_id->viewAttributes() ?>><?php echo $user_login_list->mail_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login_list->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no" <?php echo $user_login_list->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCount ?>_user_login_mobile_no">
<span<?php echo $user_login_list->mobile_no->viewAttributes() ?>><?php echo $user_login_list->mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login_list->password->Visible) { // password ?>
		<td data-name="password" <?php echo $user_login_list->password->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCount ?>_user_login_password">
<span<?php echo $user_login_list->password->viewAttributes() ?>><?php echo $user_login_list->password->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login_list->email_verified->Visible) { // email_verified ?>
		<td data-name="email_verified" <?php echo $user_login_list->email_verified->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCount ?>_user_login_email_verified">
<span<?php echo $user_login_list->email_verified->viewAttributes() ?>><?php echo $user_login_list->email_verified->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login_list->ReportTo->Visible) { // ReportTo ?>
		<td data-name="ReportTo" <?php echo $user_login_list->ReportTo->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCount ?>_user_login_ReportTo">
<span<?php echo $user_login_list->ReportTo->viewAttributes() ?>><?php echo $user_login_list->ReportTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login_list->_UserLevel->Visible) { // UserLevel ?>
		<td data-name="_UserLevel" <?php echo $user_login_list->_UserLevel->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCount ?>_user_login__UserLevel">
<span<?php echo $user_login_list->_UserLevel->viewAttributes() ?>><?php echo $user_login_list->_UserLevel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login_list->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td data-name="CreatedDateTime" <?php echo $user_login_list->CreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCount ?>_user_login_CreatedDateTime">
<span<?php echo $user_login_list->CreatedDateTime->viewAttributes() ?>><?php echo $user_login_list->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login_list->profilefield->Visible) { // profilefield ?>
		<td data-name="profilefield" <?php echo $user_login_list->profilefield->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCount ?>_user_login_profilefield">
<span<?php echo $user_login_list->profilefield->viewAttributes() ?>><?php echo $user_login_list->profilefield->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login_list->_UserID->Visible) { // UserID ?>
		<td data-name="_UserID" <?php echo $user_login_list->_UserID->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCount ?>_user_login__UserID">
<span<?php echo $user_login_list->_UserID->viewAttributes() ?>><?php echo $user_login_list->_UserID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login_list->GroupID->Visible) { // GroupID ?>
		<td data-name="GroupID" <?php echo $user_login_list->GroupID->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCount ?>_user_login_GroupID">
<span<?php echo $user_login_list->GroupID->viewAttributes() ?>><?php echo $user_login_list->GroupID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $user_login_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCount ?>_user_login_HospID">
<span<?php echo $user_login_list->HospID->viewAttributes() ?>><?php echo $user_login_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login_list->PharID->Visible) { // PharID ?>
		<td data-name="PharID" <?php echo $user_login_list->PharID->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCount ?>_user_login_PharID">
<span<?php echo $user_login_list->PharID->viewAttributes() ?>><?php echo $user_login_list->PharID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($user_login_list->StoreID->Visible) { // StoreID ?>
		<td data-name="StoreID" <?php echo $user_login_list->StoreID->cellAttributes() ?>>
<span id="el<?php echo $user_login_list->RowCount ?>_user_login_StoreID">
<span<?php echo $user_login_list->StoreID->viewAttributes() ?>><?php echo $user_login_list->StoreID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$user_login_list->ListOptions->render("body", "right", $user_login_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$user_login_list->isGridAdd())
		$user_login_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$user_login->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($user_login_list->Recordset)
	$user_login_list->Recordset->Close();
?>
<?php if (!$user_login_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$user_login_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $user_login_list->Pager->render() ?>
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
<?php if ($user_login_list->TotalRecords == 0 && !$user_login->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $user_login_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$user_login_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$user_login_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$user_login->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_user_login",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$user_login_list->terminate();
?>