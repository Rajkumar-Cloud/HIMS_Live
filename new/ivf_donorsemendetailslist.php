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
$ivf_donorsemendetails_list = new ivf_donorsemendetails_list();

// Run the page
$ivf_donorsemendetails_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_donorsemendetails_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_donorsemendetails_list->isExport()) { ?>
<script>
var fivf_donorsemendetailslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fivf_donorsemendetailslist = currentForm = new ew.Form("fivf_donorsemendetailslist", "list");
	fivf_donorsemendetailslist.formKeyCountName = '<?php echo $ivf_donorsemendetails_list->FormKeyCountName ?>';

	// Validate form
	fivf_donorsemendetailslist.validate = function() {
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
			<?php if ($ivf_donorsemendetails_list->DonorNo->Required) { ?>
				elm = this.getElements("x" + infix + "_DonorNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_list->DonorNo->caption(), $ivf_donorsemendetails_list->DonorNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_list->BatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_BatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_list->BatchNo->caption(), $ivf_donorsemendetails_list->BatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_list->BloodGroup->Required) { ?>
				elm = this.getElements("x" + infix + "_BloodGroup");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_list->BloodGroup->caption(), $ivf_donorsemendetails_list->BloodGroup->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_list->Height->Required) { ?>
				elm = this.getElements("x" + infix + "_Height");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_list->Height->caption(), $ivf_donorsemendetails_list->Height->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_list->SkinColor->Required) { ?>
				elm = this.getElements("x" + infix + "_SkinColor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_list->SkinColor->caption(), $ivf_donorsemendetails_list->SkinColor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_list->EyeColor->Required) { ?>
				elm = this.getElements("x" + infix + "_EyeColor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_list->EyeColor->caption(), $ivf_donorsemendetails_list->EyeColor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_list->HairColor->Required) { ?>
				elm = this.getElements("x" + infix + "_HairColor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_list->HairColor->caption(), $ivf_donorsemendetails_list->HairColor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_list->NoOfVials->Required) { ?>
				elm = this.getElements("x" + infix + "_NoOfVials");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_list->NoOfVials->caption(), $ivf_donorsemendetails_list->NoOfVials->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_list->Tank->Required) { ?>
				elm = this.getElements("x" + infix + "_Tank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_list->Tank->caption(), $ivf_donorsemendetails_list->Tank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_list->Canister->Required) { ?>
				elm = this.getElements("x" + infix + "_Canister");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_list->Canister->caption(), $ivf_donorsemendetails_list->Canister->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_donorsemendetails_list->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_donorsemendetails_list->Remarks->caption(), $ivf_donorsemendetails_list->Remarks->RequiredErrorMessage)) ?>");
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
	fivf_donorsemendetailslist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "DonorNo", false)) return false;
		if (ew.valueChanged(fobj, infix, "BatchNo", false)) return false;
		if (ew.valueChanged(fobj, infix, "BloodGroup", false)) return false;
		if (ew.valueChanged(fobj, infix, "Height", false)) return false;
		if (ew.valueChanged(fobj, infix, "SkinColor", false)) return false;
		if (ew.valueChanged(fobj, infix, "EyeColor", false)) return false;
		if (ew.valueChanged(fobj, infix, "HairColor", false)) return false;
		if (ew.valueChanged(fobj, infix, "NoOfVials", false)) return false;
		if (ew.valueChanged(fobj, infix, "Tank", false)) return false;
		if (ew.valueChanged(fobj, infix, "Canister", false)) return false;
		if (ew.valueChanged(fobj, infix, "Remarks", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fivf_donorsemendetailslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_donorsemendetailslist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_donorsemendetailslist.lists["x_BloodGroup"] = <?php echo $ivf_donorsemendetails_list->BloodGroup->Lookup->toClientList($ivf_donorsemendetails_list) ?>;
	fivf_donorsemendetailslist.lists["x_BloodGroup"].options = <?php echo JsonEncode($ivf_donorsemendetails_list->BloodGroup->lookupOptions()) ?>;
	fivf_donorsemendetailslist.lists["x_SkinColor"] = <?php echo $ivf_donorsemendetails_list->SkinColor->Lookup->toClientList($ivf_donorsemendetails_list) ?>;
	fivf_donorsemendetailslist.lists["x_SkinColor"].options = <?php echo JsonEncode($ivf_donorsemendetails_list->SkinColor->options(FALSE, TRUE)) ?>;
	fivf_donorsemendetailslist.lists["x_EyeColor"] = <?php echo $ivf_donorsemendetails_list->EyeColor->Lookup->toClientList($ivf_donorsemendetails_list) ?>;
	fivf_donorsemendetailslist.lists["x_EyeColor"].options = <?php echo JsonEncode($ivf_donorsemendetails_list->EyeColor->options(FALSE, TRUE)) ?>;
	fivf_donorsemendetailslist.lists["x_HairColor"] = <?php echo $ivf_donorsemendetails_list->HairColor->Lookup->toClientList($ivf_donorsemendetails_list) ?>;
	fivf_donorsemendetailslist.lists["x_HairColor"].options = <?php echo JsonEncode($ivf_donorsemendetails_list->HairColor->options(FALSE, TRUE)) ?>;
	loadjs.done("fivf_donorsemendetailslist");
});
var fivf_donorsemendetailslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fivf_donorsemendetailslistsrch = currentSearchForm = new ew.Form("fivf_donorsemendetailslistsrch");

	// Dynamic selection lists
	// Filters

	fivf_donorsemendetailslistsrch.filterList = <?php echo $ivf_donorsemendetails_list->getFilterList() ?>;
	loadjs.done("fivf_donorsemendetailslistsrch");
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

	</script>
	<?php
	$dbhelper = &DbHelper();
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_agency;";
	$results = $dbhelper->ExecuteRows($sql);
	$AgencyName = '<div class="row"><div class="col-sm-4"><div class="form-group"><label>Agency   :  </label><select class="form-control">';
	$length = count($results);
	for ($i = 0; $i < $length; $i++) {
	   $AgencyName .=  '<option>'. $results[$i]["Name"]. '</option>';
	}
	   $AgencyName .= '</select></div></div>';
		 $AgencyName .=  '  <div class="col-sm-4">          <div class="form-group row"><label for="inputEmail3" class="col-sm-2 col-form-label">Received By</label><div class="col-sm-10"><input type="email" class="form-control" id="inputEmail3" placeholder="Received By"></div></div>          </div>';
		 $AgencyName .='<div class="col-sm-4"><div class="form-group row"><label>Date :</label><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div><input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false"></div> </div></div></div>';
	?>
	<script>
});
</script>
<?php } ?>
<?php if (!$ivf_donorsemendetails_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_donorsemendetails_list->TotalRecords > 0 && $ivf_donorsemendetails_list->ExportOptions->visible()) { ?>
<?php $ivf_donorsemendetails_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_donorsemendetails_list->ImportOptions->visible()) { ?>
<?php $ivf_donorsemendetails_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_donorsemendetails_list->SearchOptions->visible()) { ?>
<?php $ivf_donorsemendetails_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_donorsemendetails_list->FilterOptions->visible()) { ?>
<?php $ivf_donorsemendetails_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_donorsemendetails_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_donorsemendetails_list->isExport() && !$ivf_donorsemendetails->CurrentAction) { ?>
<form name="fivf_donorsemendetailslistsrch" id="fivf_donorsemendetailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fivf_donorsemendetailslistsrch-search-panel" class="<?php echo $ivf_donorsemendetails_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_donorsemendetails">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ivf_donorsemendetails_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_donorsemendetails_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_donorsemendetails_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_donorsemendetails_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_donorsemendetails_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_donorsemendetails_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ivf_donorsemendetails_list->showPageHeader(); ?>
<?php
$ivf_donorsemendetails_list->showMessage();
?>
<?php if ($ivf_donorsemendetails_list->TotalRecords > 0 || $ivf_donorsemendetails->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_donorsemendetails_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_donorsemendetails">
<?php if (!$ivf_donorsemendetails_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_donorsemendetails_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_donorsemendetails_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_donorsemendetails_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_donorsemendetailslist" id="fivf_donorsemendetailslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_donorsemendetails">
<div id="gmp_ivf_donorsemendetails" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ivf_donorsemendetails_list->TotalRecords > 0 || $ivf_donorsemendetails_list->isGridEdit()) { ?>
<table id="tbl_ivf_donorsemendetailslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_donorsemendetails->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_donorsemendetails_list->renderListOptions();

// Render list options (header, left)
$ivf_donorsemendetails_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_donorsemendetails_list->DonorNo->Visible) { // DonorNo ?>
	<?php if ($ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->DonorNo) == "") { ?>
		<th data-name="DonorNo" class="<?php echo $ivf_donorsemendetails_list->DonorNo->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_DonorNo" class="ivf_donorsemendetails_DonorNo"><div class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->DonorNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DonorNo" class="<?php echo $ivf_donorsemendetails_list->DonorNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->DonorNo) ?>', 1);"><div id="elh_ivf_donorsemendetails_DonorNo" class="ivf_donorsemendetails_DonorNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->DonorNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_donorsemendetails_list->DonorNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_donorsemendetails_list->DonorNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_donorsemendetails_list->BatchNo->Visible) { // BatchNo ?>
	<?php if ($ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $ivf_donorsemendetails_list->BatchNo->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_BatchNo" class="ivf_donorsemendetails_BatchNo"><div class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $ivf_donorsemendetails_list->BatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->BatchNo) ?>', 1);"><div id="elh_ivf_donorsemendetails_BatchNo" class="ivf_donorsemendetails_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->BatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_donorsemendetails_list->BatchNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_donorsemendetails_list->BatchNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_donorsemendetails_list->BloodGroup->Visible) { // BloodGroup ?>
	<?php if ($ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->BloodGroup) == "") { ?>
		<th data-name="BloodGroup" class="<?php echo $ivf_donorsemendetails_list->BloodGroup->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_BloodGroup" class="ivf_donorsemendetails_BloodGroup"><div class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->BloodGroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BloodGroup" class="<?php echo $ivf_donorsemendetails_list->BloodGroup->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->BloodGroup) ?>', 1);"><div id="elh_ivf_donorsemendetails_BloodGroup" class="ivf_donorsemendetails_BloodGroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->BloodGroup->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_donorsemendetails_list->BloodGroup->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_donorsemendetails_list->BloodGroup->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_donorsemendetails_list->Height->Visible) { // Height ?>
	<?php if ($ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->Height) == "") { ?>
		<th data-name="Height" class="<?php echo $ivf_donorsemendetails_list->Height->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_Height" class="ivf_donorsemendetails_Height"><div class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->Height->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Height" class="<?php echo $ivf_donorsemendetails_list->Height->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->Height) ?>', 1);"><div id="elh_ivf_donorsemendetails_Height" class="ivf_donorsemendetails_Height">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->Height->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_donorsemendetails_list->Height->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_donorsemendetails_list->Height->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_donorsemendetails_list->SkinColor->Visible) { // SkinColor ?>
	<?php if ($ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->SkinColor) == "") { ?>
		<th data-name="SkinColor" class="<?php echo $ivf_donorsemendetails_list->SkinColor->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_SkinColor" class="ivf_donorsemendetails_SkinColor"><div class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->SkinColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SkinColor" class="<?php echo $ivf_donorsemendetails_list->SkinColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->SkinColor) ?>', 1);"><div id="elh_ivf_donorsemendetails_SkinColor" class="ivf_donorsemendetails_SkinColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->SkinColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_donorsemendetails_list->SkinColor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_donorsemendetails_list->SkinColor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_donorsemendetails_list->EyeColor->Visible) { // EyeColor ?>
	<?php if ($ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->EyeColor) == "") { ?>
		<th data-name="EyeColor" class="<?php echo $ivf_donorsemendetails_list->EyeColor->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_EyeColor" class="ivf_donorsemendetails_EyeColor"><div class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->EyeColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EyeColor" class="<?php echo $ivf_donorsemendetails_list->EyeColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->EyeColor) ?>', 1);"><div id="elh_ivf_donorsemendetails_EyeColor" class="ivf_donorsemendetails_EyeColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->EyeColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_donorsemendetails_list->EyeColor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_donorsemendetails_list->EyeColor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_donorsemendetails_list->HairColor->Visible) { // HairColor ?>
	<?php if ($ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->HairColor) == "") { ?>
		<th data-name="HairColor" class="<?php echo $ivf_donorsemendetails_list->HairColor->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_HairColor" class="ivf_donorsemendetails_HairColor"><div class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->HairColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HairColor" class="<?php echo $ivf_donorsemendetails_list->HairColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->HairColor) ?>', 1);"><div id="elh_ivf_donorsemendetails_HairColor" class="ivf_donorsemendetails_HairColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->HairColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_donorsemendetails_list->HairColor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_donorsemendetails_list->HairColor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_donorsemendetails_list->NoOfVials->Visible) { // NoOfVials ?>
	<?php if ($ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->NoOfVials) == "") { ?>
		<th data-name="NoOfVials" class="<?php echo $ivf_donorsemendetails_list->NoOfVials->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_NoOfVials" class="ivf_donorsemendetails_NoOfVials"><div class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->NoOfVials->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfVials" class="<?php echo $ivf_donorsemendetails_list->NoOfVials->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->NoOfVials) ?>', 1);"><div id="elh_ivf_donorsemendetails_NoOfVials" class="ivf_donorsemendetails_NoOfVials">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->NoOfVials->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_donorsemendetails_list->NoOfVials->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_donorsemendetails_list->NoOfVials->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_donorsemendetails_list->Tank->Visible) { // Tank ?>
	<?php if ($ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->Tank) == "") { ?>
		<th data-name="Tank" class="<?php echo $ivf_donorsemendetails_list->Tank->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_Tank" class="ivf_donorsemendetails_Tank"><div class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->Tank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tank" class="<?php echo $ivf_donorsemendetails_list->Tank->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->Tank) ?>', 1);"><div id="elh_ivf_donorsemendetails_Tank" class="ivf_donorsemendetails_Tank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->Tank->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_donorsemendetails_list->Tank->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_donorsemendetails_list->Tank->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_donorsemendetails_list->Canister->Visible) { // Canister ?>
	<?php if ($ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->Canister) == "") { ?>
		<th data-name="Canister" class="<?php echo $ivf_donorsemendetails_list->Canister->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_Canister" class="ivf_donorsemendetails_Canister"><div class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->Canister->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Canister" class="<?php echo $ivf_donorsemendetails_list->Canister->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->Canister) ?>', 1);"><div id="elh_ivf_donorsemendetails_Canister" class="ivf_donorsemendetails_Canister">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->Canister->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_donorsemendetails_list->Canister->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_donorsemendetails_list->Canister->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_donorsemendetails_list->Remarks->Visible) { // Remarks ?>
	<?php if ($ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $ivf_donorsemendetails_list->Remarks->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_Remarks" class="ivf_donorsemendetails_Remarks"><div class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $ivf_donorsemendetails_list->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_donorsemendetails_list->SortUrl($ivf_donorsemendetails_list->Remarks) ?>', 1);"><div id="elh_ivf_donorsemendetails_Remarks" class="ivf_donorsemendetails_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_donorsemendetails_list->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_donorsemendetails_list->Remarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_donorsemendetails_list->Remarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_donorsemendetails_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_donorsemendetails_list->ExportAll && $ivf_donorsemendetails_list->isExport()) {
	$ivf_donorsemendetails_list->StopRecord = $ivf_donorsemendetails_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ivf_donorsemendetails_list->TotalRecords > $ivf_donorsemendetails_list->StartRecord + $ivf_donorsemendetails_list->DisplayRecords - 1)
		$ivf_donorsemendetails_list->StopRecord = $ivf_donorsemendetails_list->StartRecord + $ivf_donorsemendetails_list->DisplayRecords - 1;
	else
		$ivf_donorsemendetails_list->StopRecord = $ivf_donorsemendetails_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($ivf_donorsemendetails->isConfirm() || $ivf_donorsemendetails_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_donorsemendetails_list->FormKeyCountName) && ($ivf_donorsemendetails_list->isGridAdd() || $ivf_donorsemendetails_list->isGridEdit() || $ivf_donorsemendetails->isConfirm())) {
		$ivf_donorsemendetails_list->KeyCount = $CurrentForm->getValue($ivf_donorsemendetails_list->FormKeyCountName);
		$ivf_donorsemendetails_list->StopRecord = $ivf_donorsemendetails_list->StartRecord + $ivf_donorsemendetails_list->KeyCount - 1;
	}
}
$ivf_donorsemendetails_list->RecordCount = $ivf_donorsemendetails_list->StartRecord - 1;
if ($ivf_donorsemendetails_list->Recordset && !$ivf_donorsemendetails_list->Recordset->EOF) {
	$ivf_donorsemendetails_list->Recordset->moveFirst();
	$selectLimit = $ivf_donorsemendetails_list->UseSelectLimit;
	if (!$selectLimit && $ivf_donorsemendetails_list->StartRecord > 1)
		$ivf_donorsemendetails_list->Recordset->move($ivf_donorsemendetails_list->StartRecord - 1);
} elseif (!$ivf_donorsemendetails->AllowAddDeleteRow && $ivf_donorsemendetails_list->StopRecord == 0) {
	$ivf_donorsemendetails_list->StopRecord = $ivf_donorsemendetails->GridAddRowCount;
}

// Initialize aggregate
$ivf_donorsemendetails->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_donorsemendetails->resetAttributes();
$ivf_donorsemendetails_list->renderRow();
if ($ivf_donorsemendetails_list->isGridAdd())
	$ivf_donorsemendetails_list->RowIndex = 0;
if ($ivf_donorsemendetails_list->isGridEdit())
	$ivf_donorsemendetails_list->RowIndex = 0;
while ($ivf_donorsemendetails_list->RecordCount < $ivf_donorsemendetails_list->StopRecord) {
	$ivf_donorsemendetails_list->RecordCount++;
	if ($ivf_donorsemendetails_list->RecordCount >= $ivf_donorsemendetails_list->StartRecord) {
		$ivf_donorsemendetails_list->RowCount++;
		if ($ivf_donorsemendetails_list->isGridAdd() || $ivf_donorsemendetails_list->isGridEdit() || $ivf_donorsemendetails->isConfirm()) {
			$ivf_donorsemendetails_list->RowIndex++;
			$CurrentForm->Index = $ivf_donorsemendetails_list->RowIndex;
			if ($CurrentForm->hasValue($ivf_donorsemendetails_list->FormActionName) && ($ivf_donorsemendetails->isConfirm() || $ivf_donorsemendetails_list->EventCancelled))
				$ivf_donorsemendetails_list->RowAction = strval($CurrentForm->getValue($ivf_donorsemendetails_list->FormActionName));
			elseif ($ivf_donorsemendetails_list->isGridAdd())
				$ivf_donorsemendetails_list->RowAction = "insert";
			else
				$ivf_donorsemendetails_list->RowAction = "";
		}

		// Set up key count
		$ivf_donorsemendetails_list->KeyCount = $ivf_donorsemendetails_list->RowIndex;

		// Init row class and style
		$ivf_donorsemendetails->resetAttributes();
		$ivf_donorsemendetails->CssClass = "";
		if ($ivf_donorsemendetails_list->isGridAdd()) {
			$ivf_donorsemendetails_list->loadRowValues(); // Load default values
		} else {
			$ivf_donorsemendetails_list->loadRowValues($ivf_donorsemendetails_list->Recordset); // Load row values
		}
		$ivf_donorsemendetails->RowType = ROWTYPE_VIEW; // Render view
		if ($ivf_donorsemendetails_list->isGridAdd()) // Grid add
			$ivf_donorsemendetails->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_donorsemendetails_list->isGridAdd() && $ivf_donorsemendetails->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_donorsemendetails_list->restoreCurrentRowFormValues($ivf_donorsemendetails_list->RowIndex); // Restore form values
		if ($ivf_donorsemendetails_list->isGridEdit()) { // Grid edit
			if ($ivf_donorsemendetails->EventCancelled)
				$ivf_donorsemendetails_list->restoreCurrentRowFormValues($ivf_donorsemendetails_list->RowIndex); // Restore form values
			if ($ivf_donorsemendetails_list->RowAction == "insert")
				$ivf_donorsemendetails->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_donorsemendetails->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_donorsemendetails_list->isGridEdit() && ($ivf_donorsemendetails->RowType == ROWTYPE_EDIT || $ivf_donorsemendetails->RowType == ROWTYPE_ADD) && $ivf_donorsemendetails->EventCancelled) // Update failed
			$ivf_donorsemendetails_list->restoreCurrentRowFormValues($ivf_donorsemendetails_list->RowIndex); // Restore form values
		if ($ivf_donorsemendetails->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_donorsemendetails_list->EditRowCount++;

		// Set up row id / data-rowindex
		$ivf_donorsemendetails->RowAttrs->merge(["data-rowindex" => $ivf_donorsemendetails_list->RowCount, "id" => "r" . $ivf_donorsemendetails_list->RowCount . "_ivf_donorsemendetails", "data-rowtype" => $ivf_donorsemendetails->RowType]);

		// Render row
		$ivf_donorsemendetails_list->renderRow();

		// Render list options
		$ivf_donorsemendetails_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_donorsemendetails_list->RowAction != "delete" && $ivf_donorsemendetails_list->RowAction != "insertdelete" && !($ivf_donorsemendetails_list->RowAction == "insert" && $ivf_donorsemendetails->isConfirm() && $ivf_donorsemendetails_list->emptyRow())) {
?>
	<tr <?php echo $ivf_donorsemendetails->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_donorsemendetails_list->ListOptions->render("body", "left", $ivf_donorsemendetails_list->RowCount);
?>
	<?php if ($ivf_donorsemendetails_list->DonorNo->Visible) { // DonorNo ?>
		<td data-name="DonorNo" <?php echo $ivf_donorsemendetails_list->DonorNo->cellAttributes() ?>>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_DonorNo" class="form-group">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_DonorNo" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_DonorNo" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_DonorNo" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->DonorNo->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->DonorNo->EditValue ?>"<?php echo $ivf_donorsemendetails_list->DonorNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_DonorNo" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_DonorNo" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_DonorNo" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->DonorNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_DonorNo" class="form-group">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_DonorNo" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_DonorNo" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_DonorNo" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->DonorNo->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->DonorNo->EditValue ?>"<?php echo $ivf_donorsemendetails_list->DonorNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_DonorNo">
<span<?php echo $ivf_donorsemendetails_list->DonorNo->viewAttributes() ?>><?php echo $ivf_donorsemendetails_list->DonorNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_id" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_id" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->id->CurrentValue) ?>">
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_id" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_id" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_EDIT || $ivf_donorsemendetails->CurrentMode == "edit") { ?>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_id" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_id" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($ivf_donorsemendetails_list->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo" <?php echo $ivf_donorsemendetails_list->BatchNo->cellAttributes() ?>>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_BatchNo" class="form-group">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_BatchNo" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BatchNo" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BatchNo" size="6" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->BatchNo->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->BatchNo->EditValue ?>"<?php echo $ivf_donorsemendetails_list->BatchNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_BatchNo" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BatchNo" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->BatchNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_BatchNo" class="form-group">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_BatchNo" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BatchNo" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BatchNo" size="6" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->BatchNo->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->BatchNo->EditValue ?>"<?php echo $ivf_donorsemendetails_list->BatchNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_BatchNo">
<span<?php echo $ivf_donorsemendetails_list->BatchNo->viewAttributes() ?>><?php echo $ivf_donorsemendetails_list->BatchNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->BloodGroup->Visible) { // BloodGroup ?>
		<td data-name="BloodGroup" <?php echo $ivf_donorsemendetails_list->BloodGroup->cellAttributes() ?>>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_BloodGroup" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_BloodGroup" data-value-separator="<?php echo $ivf_donorsemendetails_list->BloodGroup->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BloodGroup" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BloodGroup"<?php echo $ivf_donorsemendetails_list->BloodGroup->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_list->BloodGroup->selectOptionListHtml("x{$ivf_donorsemendetails_list->RowIndex}_BloodGroup") ?>
		</select>
</div>
<?php echo $ivf_donorsemendetails_list->BloodGroup->Lookup->getParamTag($ivf_donorsemendetails_list, "p_x" . $ivf_donorsemendetails_list->RowIndex . "_BloodGroup") ?>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_BloodGroup" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BloodGroup" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BloodGroup" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->BloodGroup->OldValue) ?>">
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_BloodGroup" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_BloodGroup" data-value-separator="<?php echo $ivf_donorsemendetails_list->BloodGroup->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BloodGroup" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BloodGroup"<?php echo $ivf_donorsemendetails_list->BloodGroup->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_list->BloodGroup->selectOptionListHtml("x{$ivf_donorsemendetails_list->RowIndex}_BloodGroup") ?>
		</select>
</div>
<?php echo $ivf_donorsemendetails_list->BloodGroup->Lookup->getParamTag($ivf_donorsemendetails_list, "p_x" . $ivf_donorsemendetails_list->RowIndex . "_BloodGroup") ?>
</span>
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_BloodGroup">
<span<?php echo $ivf_donorsemendetails_list->BloodGroup->viewAttributes() ?>><?php echo $ivf_donorsemendetails_list->BloodGroup->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->Height->Visible) { // Height ?>
		<td data-name="Height" <?php echo $ivf_donorsemendetails_list->Height->cellAttributes() ?>>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_Height" class="form-group">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Height" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Height" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Height" size="4" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->Height->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->Height->EditValue ?>"<?php echo $ivf_donorsemendetails_list->Height->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_Height" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Height" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Height" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->Height->OldValue) ?>">
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_Height" class="form-group">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Height" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Height" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Height" size="4" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->Height->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->Height->EditValue ?>"<?php echo $ivf_donorsemendetails_list->Height->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_Height">
<span<?php echo $ivf_donorsemendetails_list->Height->viewAttributes() ?>><?php echo $ivf_donorsemendetails_list->Height->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->SkinColor->Visible) { // SkinColor ?>
		<td data-name="SkinColor" <?php echo $ivf_donorsemendetails_list->SkinColor->cellAttributes() ?>>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_SkinColor" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_SkinColor" data-value-separator="<?php echo $ivf_donorsemendetails_list->SkinColor->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_SkinColor" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_SkinColor"<?php echo $ivf_donorsemendetails_list->SkinColor->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_list->SkinColor->selectOptionListHtml("x{$ivf_donorsemendetails_list->RowIndex}_SkinColor") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_SkinColor" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_SkinColor" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_SkinColor" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->SkinColor->OldValue) ?>">
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_SkinColor" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_SkinColor" data-value-separator="<?php echo $ivf_donorsemendetails_list->SkinColor->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_SkinColor" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_SkinColor"<?php echo $ivf_donorsemendetails_list->SkinColor->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_list->SkinColor->selectOptionListHtml("x{$ivf_donorsemendetails_list->RowIndex}_SkinColor") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_SkinColor">
<span<?php echo $ivf_donorsemendetails_list->SkinColor->viewAttributes() ?>><?php echo $ivf_donorsemendetails_list->SkinColor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->EyeColor->Visible) { // EyeColor ?>
		<td data-name="EyeColor" <?php echo $ivf_donorsemendetails_list->EyeColor->cellAttributes() ?>>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_EyeColor" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_EyeColor" data-value-separator="<?php echo $ivf_donorsemendetails_list->EyeColor->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_EyeColor" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_EyeColor"<?php echo $ivf_donorsemendetails_list->EyeColor->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_list->EyeColor->selectOptionListHtml("x{$ivf_donorsemendetails_list->RowIndex}_EyeColor") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_EyeColor" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_EyeColor" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_EyeColor" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->EyeColor->OldValue) ?>">
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_EyeColor" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_EyeColor" data-value-separator="<?php echo $ivf_donorsemendetails_list->EyeColor->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_EyeColor" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_EyeColor"<?php echo $ivf_donorsemendetails_list->EyeColor->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_list->EyeColor->selectOptionListHtml("x{$ivf_donorsemendetails_list->RowIndex}_EyeColor") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_EyeColor">
<span<?php echo $ivf_donorsemendetails_list->EyeColor->viewAttributes() ?>><?php echo $ivf_donorsemendetails_list->EyeColor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->HairColor->Visible) { // HairColor ?>
		<td data-name="HairColor" <?php echo $ivf_donorsemendetails_list->HairColor->cellAttributes() ?>>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_HairColor" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_HairColor" data-value-separator="<?php echo $ivf_donorsemendetails_list->HairColor->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_HairColor" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_HairColor"<?php echo $ivf_donorsemendetails_list->HairColor->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_list->HairColor->selectOptionListHtml("x{$ivf_donorsemendetails_list->RowIndex}_HairColor") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_HairColor" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_HairColor" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_HairColor" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->HairColor->OldValue) ?>">
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_HairColor" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_HairColor" data-value-separator="<?php echo $ivf_donorsemendetails_list->HairColor->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_HairColor" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_HairColor"<?php echo $ivf_donorsemendetails_list->HairColor->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_list->HairColor->selectOptionListHtml("x{$ivf_donorsemendetails_list->RowIndex}_HairColor") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_HairColor">
<span<?php echo $ivf_donorsemendetails_list->HairColor->viewAttributes() ?>><?php echo $ivf_donorsemendetails_list->HairColor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->NoOfVials->Visible) { // NoOfVials ?>
		<td data-name="NoOfVials" <?php echo $ivf_donorsemendetails_list->NoOfVials->cellAttributes() ?>>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_NoOfVials" class="form-group">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_NoOfVials" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_NoOfVials" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_NoOfVials" size="2" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->NoOfVials->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->NoOfVials->EditValue ?>"<?php echo $ivf_donorsemendetails_list->NoOfVials->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_NoOfVials" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_NoOfVials" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_NoOfVials" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->NoOfVials->OldValue) ?>">
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_NoOfVials" class="form-group">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_NoOfVials" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_NoOfVials" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_NoOfVials" size="2" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->NoOfVials->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->NoOfVials->EditValue ?>"<?php echo $ivf_donorsemendetails_list->NoOfVials->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_NoOfVials">
<span<?php echo $ivf_donorsemendetails_list->NoOfVials->viewAttributes() ?>><?php echo $ivf_donorsemendetails_list->NoOfVials->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->Tank->Visible) { // Tank ?>
		<td data-name="Tank" <?php echo $ivf_donorsemendetails_list->Tank->cellAttributes() ?>>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_Tank" class="form-group">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Tank" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Tank" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Tank" size="4" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->Tank->EditValue ?>"<?php echo $ivf_donorsemendetails_list->Tank->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_Tank" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Tank" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->Tank->OldValue) ?>">
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_Tank" class="form-group">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Tank" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Tank" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Tank" size="4" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->Tank->EditValue ?>"<?php echo $ivf_donorsemendetails_list->Tank->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_Tank">
<span<?php echo $ivf_donorsemendetails_list->Tank->viewAttributes() ?>><?php echo $ivf_donorsemendetails_list->Tank->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->Canister->Visible) { // Canister ?>
		<td data-name="Canister" <?php echo $ivf_donorsemendetails_list->Canister->cellAttributes() ?>>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_Canister" class="form-group">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Canister" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Canister" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Canister" size="8" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->Canister->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->Canister->EditValue ?>"<?php echo $ivf_donorsemendetails_list->Canister->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_Canister" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Canister" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Canister" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->Canister->OldValue) ?>">
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_Canister" class="form-group">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Canister" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Canister" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Canister" size="8" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->Canister->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->Canister->EditValue ?>"<?php echo $ivf_donorsemendetails_list->Canister->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_Canister">
<span<?php echo $ivf_donorsemendetails_list->Canister->viewAttributes() ?>><?php echo $ivf_donorsemendetails_list->Canister->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks" <?php echo $ivf_donorsemendetails_list->Remarks->cellAttributes() ?>>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_Remarks" class="form-group">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Remarks" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Remarks" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Remarks" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->Remarks->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->Remarks->EditValue ?>"<?php echo $ivf_donorsemendetails_list->Remarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_Remarks" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Remarks" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->Remarks->OldValue) ?>">
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_Remarks" class="form-group">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Remarks" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Remarks" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Remarks" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->Remarks->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->Remarks->EditValue ?>"<?php echo $ivf_donorsemendetails_list->Remarks->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_donorsemendetails_list->RowCount ?>_ivf_donorsemendetails_Remarks">
<span<?php echo $ivf_donorsemendetails_list->Remarks->viewAttributes() ?>><?php echo $ivf_donorsemendetails_list->Remarks->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_donorsemendetails_list->ListOptions->render("body", "right", $ivf_donorsemendetails_list->RowCount);
?>
	</tr>
<?php if ($ivf_donorsemendetails->RowType == ROWTYPE_ADD || $ivf_donorsemendetails->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fivf_donorsemendetailslist", "load"], function() {
	fivf_donorsemendetailslist.updateLists(<?php echo $ivf_donorsemendetails_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_donorsemendetails_list->isGridAdd())
		if (!$ivf_donorsemendetails_list->Recordset->EOF)
			$ivf_donorsemendetails_list->Recordset->moveNext();
}
?>
<?php
	if ($ivf_donorsemendetails_list->isGridAdd() || $ivf_donorsemendetails_list->isGridEdit()) {
		$ivf_donorsemendetails_list->RowIndex = '$rowindex$';
		$ivf_donorsemendetails_list->loadRowValues();

		// Set row properties
		$ivf_donorsemendetails->resetAttributes();
		$ivf_donorsemendetails->RowAttrs->merge(["data-rowindex" => $ivf_donorsemendetails_list->RowIndex, "id" => "r0_ivf_donorsemendetails", "data-rowtype" => ROWTYPE_ADD]);
		$ivf_donorsemendetails->RowAttrs->appendClass("ew-template");
		$ivf_donorsemendetails->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_donorsemendetails_list->renderRow();

		// Render list options
		$ivf_donorsemendetails_list->renderListOptions();
		$ivf_donorsemendetails_list->StartRowCount = 0;
?>
	<tr <?php echo $ivf_donorsemendetails->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_donorsemendetails_list->ListOptions->render("body", "left", $ivf_donorsemendetails_list->RowIndex);
?>
	<?php if ($ivf_donorsemendetails_list->DonorNo->Visible) { // DonorNo ?>
		<td data-name="DonorNo">
<span id="el$rowindex$_ivf_donorsemendetails_DonorNo" class="form-group ivf_donorsemendetails_DonorNo">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_DonorNo" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_DonorNo" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_DonorNo" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->DonorNo->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->DonorNo->EditValue ?>"<?php echo $ivf_donorsemendetails_list->DonorNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_DonorNo" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_DonorNo" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_DonorNo" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->DonorNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo">
<span id="el$rowindex$_ivf_donorsemendetails_BatchNo" class="form-group ivf_donorsemendetails_BatchNo">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_BatchNo" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BatchNo" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BatchNo" size="6" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->BatchNo->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->BatchNo->EditValue ?>"<?php echo $ivf_donorsemendetails_list->BatchNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_BatchNo" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BatchNo" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->BatchNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->BloodGroup->Visible) { // BloodGroup ?>
		<td data-name="BloodGroup">
<span id="el$rowindex$_ivf_donorsemendetails_BloodGroup" class="form-group ivf_donorsemendetails_BloodGroup">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_BloodGroup" data-value-separator="<?php echo $ivf_donorsemendetails_list->BloodGroup->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BloodGroup" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BloodGroup"<?php echo $ivf_donorsemendetails_list->BloodGroup->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_list->BloodGroup->selectOptionListHtml("x{$ivf_donorsemendetails_list->RowIndex}_BloodGroup") ?>
		</select>
</div>
<?php echo $ivf_donorsemendetails_list->BloodGroup->Lookup->getParamTag($ivf_donorsemendetails_list, "p_x" . $ivf_donorsemendetails_list->RowIndex . "_BloodGroup") ?>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_BloodGroup" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BloodGroup" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_BloodGroup" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->BloodGroup->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->Height->Visible) { // Height ?>
		<td data-name="Height">
<span id="el$rowindex$_ivf_donorsemendetails_Height" class="form-group ivf_donorsemendetails_Height">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Height" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Height" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Height" size="4" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->Height->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->Height->EditValue ?>"<?php echo $ivf_donorsemendetails_list->Height->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_Height" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Height" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Height" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->Height->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->SkinColor->Visible) { // SkinColor ?>
		<td data-name="SkinColor">
<span id="el$rowindex$_ivf_donorsemendetails_SkinColor" class="form-group ivf_donorsemendetails_SkinColor">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_SkinColor" data-value-separator="<?php echo $ivf_donorsemendetails_list->SkinColor->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_SkinColor" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_SkinColor"<?php echo $ivf_donorsemendetails_list->SkinColor->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_list->SkinColor->selectOptionListHtml("x{$ivf_donorsemendetails_list->RowIndex}_SkinColor") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_SkinColor" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_SkinColor" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_SkinColor" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->SkinColor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->EyeColor->Visible) { // EyeColor ?>
		<td data-name="EyeColor">
<span id="el$rowindex$_ivf_donorsemendetails_EyeColor" class="form-group ivf_donorsemendetails_EyeColor">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_EyeColor" data-value-separator="<?php echo $ivf_donorsemendetails_list->EyeColor->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_EyeColor" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_EyeColor"<?php echo $ivf_donorsemendetails_list->EyeColor->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_list->EyeColor->selectOptionListHtml("x{$ivf_donorsemendetails_list->RowIndex}_EyeColor") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_EyeColor" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_EyeColor" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_EyeColor" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->EyeColor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->HairColor->Visible) { // HairColor ?>
		<td data-name="HairColor">
<span id="el$rowindex$_ivf_donorsemendetails_HairColor" class="form-group ivf_donorsemendetails_HairColor">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_donorsemendetails" data-field="x_HairColor" data-value-separator="<?php echo $ivf_donorsemendetails_list->HairColor->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_HairColor" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_HairColor"<?php echo $ivf_donorsemendetails_list->HairColor->editAttributes() ?>>
			<?php echo $ivf_donorsemendetails_list->HairColor->selectOptionListHtml("x{$ivf_donorsemendetails_list->RowIndex}_HairColor") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_HairColor" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_HairColor" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_HairColor" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->HairColor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->NoOfVials->Visible) { // NoOfVials ?>
		<td data-name="NoOfVials">
<span id="el$rowindex$_ivf_donorsemendetails_NoOfVials" class="form-group ivf_donorsemendetails_NoOfVials">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_NoOfVials" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_NoOfVials" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_NoOfVials" size="2" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->NoOfVials->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->NoOfVials->EditValue ?>"<?php echo $ivf_donorsemendetails_list->NoOfVials->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_NoOfVials" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_NoOfVials" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_NoOfVials" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->NoOfVials->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->Tank->Visible) { // Tank ?>
		<td data-name="Tank">
<span id="el$rowindex$_ivf_donorsemendetails_Tank" class="form-group ivf_donorsemendetails_Tank">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Tank" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Tank" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Tank" size="4" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->Tank->EditValue ?>"<?php echo $ivf_donorsemendetails_list->Tank->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_Tank" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Tank" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->Tank->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->Canister->Visible) { // Canister ?>
		<td data-name="Canister">
<span id="el$rowindex$_ivf_donorsemendetails_Canister" class="form-group ivf_donorsemendetails_Canister">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Canister" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Canister" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Canister" size="8" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->Canister->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->Canister->EditValue ?>"<?php echo $ivf_donorsemendetails_list->Canister->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_Canister" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Canister" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Canister" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->Canister->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_donorsemendetails_list->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks">
<span id="el$rowindex$_ivf_donorsemendetails_Remarks" class="form-group ivf_donorsemendetails_Remarks">
<input type="text" data-table="ivf_donorsemendetails" data-field="x_Remarks" name="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Remarks" id="x<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Remarks" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_donorsemendetails_list->Remarks->getPlaceHolder()) ?>" value="<?php echo $ivf_donorsemendetails_list->Remarks->EditValue ?>"<?php echo $ivf_donorsemendetails_list->Remarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_donorsemendetails" data-field="x_Remarks" name="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Remarks" id="o<?php echo $ivf_donorsemendetails_list->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($ivf_donorsemendetails_list->Remarks->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_donorsemendetails_list->ListOptions->render("body", "right", $ivf_donorsemendetails_list->RowIndex);
?>
<script>
loadjs.ready(["fivf_donorsemendetailslist", "load"], function() {
	fivf_donorsemendetailslist.updateLists(<?php echo $ivf_donorsemendetails_list->RowIndex ?>);
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
<?php if ($ivf_donorsemendetails_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $ivf_donorsemendetails_list->FormKeyCountName ?>" id="<?php echo $ivf_donorsemendetails_list->FormKeyCountName ?>" value="<?php echo $ivf_donorsemendetails_list->KeyCount ?>">
<?php echo $ivf_donorsemendetails_list->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_donorsemendetails_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $ivf_donorsemendetails_list->FormKeyCountName ?>" id="<?php echo $ivf_donorsemendetails_list->FormKeyCountName ?>" value="<?php echo $ivf_donorsemendetails_list->KeyCount ?>">
<?php echo $ivf_donorsemendetails_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$ivf_donorsemendetails->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_donorsemendetails_list->Recordset)
	$ivf_donorsemendetails_list->Recordset->Close();
?>
<?php if (!$ivf_donorsemendetails_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_donorsemendetails_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_donorsemendetails_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_donorsemendetails_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_donorsemendetails_list->TotalRecords == 0 && !$ivf_donorsemendetails->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_donorsemendetails_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_donorsemendetails_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_donorsemendetails_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	jQuery("#tpd_ivf_donorsemendetailslist th.ew-list-option-header").each(function(){this.rowSpan=1}),jQuery("#tpd_ivf_donorsemendetailslist td.ew-list-option-body").each(function(){this.rowSpan=1}),jQuery("script.ivf_donorsemendetailslist_js").each(function(){ew.addScript(this.text)});var idelement=document.getElementById("gmp_ivf_donorsemendetails"),node=document.createElement("div");node.innerHTML="<?php echo $AgencyName; ?>",idelement.appendChild(node);
});
</script>
<?php if (!$ivf_donorsemendetails->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_donorsemendetails",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_donorsemendetails_list->terminate();
?>