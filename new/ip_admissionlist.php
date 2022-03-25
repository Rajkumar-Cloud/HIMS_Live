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
$ip_admission_list = new ip_admission_list();

// Run the page
$ip_admission_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ip_admission_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ip_admission_list->isExport()) { ?>
<script>
var fip_admissionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fip_admissionlist = currentForm = new ew.Form("fip_admissionlist", "list");
	fip_admissionlist.formKeyCountName = '<?php echo $ip_admission_list->FormKeyCountName ?>';
	loadjs.done("fip_admissionlist");
});
var fip_admissionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fip_admissionlistsrch = currentSearchForm = new ew.Form("fip_admissionlistsrch");

	// Validate function for search
	fip_admissionlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_createddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($ip_admission_list->createddatetime->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fip_admissionlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fip_admissionlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fip_admissionlistsrch.lists["x_typeRegsisteration"] = <?php echo $ip_admission_list->typeRegsisteration->Lookup->toClientList($ip_admission_list) ?>;
	fip_admissionlistsrch.lists["x_typeRegsisteration"].options = <?php echo JsonEncode($ip_admission_list->typeRegsisteration->lookupOptions()) ?>;
	fip_admissionlistsrch.lists["x_PaymentCategory"] = <?php echo $ip_admission_list->PaymentCategory->Lookup->toClientList($ip_admission_list) ?>;
	fip_admissionlistsrch.lists["x_PaymentCategory"].options = <?php echo JsonEncode($ip_admission_list->PaymentCategory->lookupOptions()) ?>;
	fip_admissionlistsrch.lists["x_physician_id"] = <?php echo $ip_admission_list->physician_id->Lookup->toClientList($ip_admission_list) ?>;
	fip_admissionlistsrch.lists["x_physician_id"].options = <?php echo JsonEncode($ip_admission_list->physician_id->lookupOptions()) ?>;
	fip_admissionlistsrch.lists["x_admission_consultant_id"] = <?php echo $ip_admission_list->admission_consultant_id->Lookup->toClientList($ip_admission_list) ?>;
	fip_admissionlistsrch.lists["x_admission_consultant_id"].options = <?php echo JsonEncode($ip_admission_list->admission_consultant_id->lookupOptions()) ?>;
	fip_admissionlistsrch.lists["x_patient_id"] = <?php echo $ip_admission_list->patient_id->Lookup->toClientList($ip_admission_list) ?>;
	fip_admissionlistsrch.lists["x_patient_id"].options = <?php echo JsonEncode($ip_admission_list->patient_id->lookupOptions()) ?>;

	// Filters
	fip_admissionlistsrch.filterList = <?php echo $ip_admission_list->getFilterList() ?>;
	loadjs.done("fip_admissionlistsrch");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #DCD110; /* preview row color */
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
	ew.PREVIEW_SINGLE_ROW = true;
	ew.PREVIEW_OVERLAY = true;
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
<?php if (!$ip_admission_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ip_admission_list->TotalRecords > 0 && $ip_admission_list->ExportOptions->visible()) { ?>
<?php $ip_admission_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ip_admission_list->ImportOptions->visible()) { ?>
<?php $ip_admission_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ip_admission_list->SearchOptions->visible()) { ?>
<?php $ip_admission_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ip_admission_list->FilterOptions->visible()) { ?>
<?php $ip_admission_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ip_admission_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ip_admission_list->isExport() && !$ip_admission->CurrentAction) { ?>
<form name="fip_admissionlistsrch" id="fip_admissionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fip_admissionlistsrch-search-panel" class="<?php echo $ip_admission_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ip_admission">
	<div class="ew-extended-search">
<?php

// Render search row
$ip_admission->RowType = ROWTYPE_SEARCH;
$ip_admission->resetAttributes();
$ip_admission_list->renderRow();
?>
<?php if ($ip_admission_list->mrnNo->Visible) { // mrnNo ?>
	<?php
		$ip_admission_list->SearchColumnCount++;
		if (($ip_admission_list->SearchColumnCount - 1) % $ip_admission_list->SearchFieldsPerRow == 0) {
			$ip_admission_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $ip_admission_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_mrnNo" class="ew-cell form-group">
		<label for="x_mrnNo" class="ew-search-caption ew-label"><?php echo $ip_admission_list->mrnNo->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnNo" id="z_mrnNo" value="LIKE">
</span>
		<span id="el_ip_admission_mrnNo" class="ew-search-field">
<input type="text" data-table="ip_admission" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_list->mrnNo->getPlaceHolder()) ?>" value="<?php echo $ip_admission_list->mrnNo->EditValue ?>"<?php echo $ip_admission_list->mrnNo->editAttributes() ?>>
</span>
	</div>
	<?php if ($ip_admission_list->SearchColumnCount % $ip_admission_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->patient_name->Visible) { // patient_name ?>
	<?php
		$ip_admission_list->SearchColumnCount++;
		if (($ip_admission_list->SearchColumnCount - 1) % $ip_admission_list->SearchFieldsPerRow == 0) {
			$ip_admission_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $ip_admission_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_patient_name" class="ew-cell form-group">
		<label for="x_patient_name" class="ew-search-caption ew-label"><?php echo $ip_admission_list->patient_name->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patient_name" id="z_patient_name" value="LIKE">
</span>
		<span id="el_ip_admission_patient_name" class="ew-search-field">
<input type="text" data-table="ip_admission" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission_list->patient_name->getPlaceHolder()) ?>" value="<?php echo $ip_admission_list->patient_name->EditValue ?>"<?php echo $ip_admission_list->patient_name->editAttributes() ?>>
</span>
	</div>
	<?php if ($ip_admission_list->SearchColumnCount % $ip_admission_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<?php
		$ip_admission_list->SearchColumnCount++;
		if (($ip_admission_list->SearchColumnCount - 1) % $ip_admission_list->SearchFieldsPerRow == 0) {
			$ip_admission_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $ip_admission_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_typeRegsisteration" class="ew-cell form-group">
		<label for="x_typeRegsisteration" class="ew-search-caption ew-label"><?php echo $ip_admission_list->typeRegsisteration->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_typeRegsisteration" id="z_typeRegsisteration" value="LIKE">
</span>
		<span id="el_ip_admission_typeRegsisteration" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_typeRegsisteration" data-value-separator="<?php echo $ip_admission_list->typeRegsisteration->displayValueSeparatorAttribute() ?>" id="x_typeRegsisteration" name="x_typeRegsisteration"<?php echo $ip_admission_list->typeRegsisteration->editAttributes() ?>>
			<?php echo $ip_admission_list->typeRegsisteration->selectOptionListHtml("x_typeRegsisteration") ?>
		</select>
</div>
<?php echo $ip_admission_list->typeRegsisteration->Lookup->getParamTag($ip_admission_list, "p_x_typeRegsisteration") ?>
</span>
	</div>
	<?php if ($ip_admission_list->SearchColumnCount % $ip_admission_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->PaymentCategory->Visible) { // PaymentCategory ?>
	<?php
		$ip_admission_list->SearchColumnCount++;
		if (($ip_admission_list->SearchColumnCount - 1) % $ip_admission_list->SearchFieldsPerRow == 0) {
			$ip_admission_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $ip_admission_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PaymentCategory" class="ew-cell form-group">
		<label for="x_PaymentCategory" class="ew-search-caption ew-label"><?php echo $ip_admission_list->PaymentCategory->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PaymentCategory" id="z_PaymentCategory" value="LIKE">
</span>
		<span id="el_ip_admission_PaymentCategory" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_PaymentCategory" data-value-separator="<?php echo $ip_admission_list->PaymentCategory->displayValueSeparatorAttribute() ?>" id="x_PaymentCategory" name="x_PaymentCategory"<?php echo $ip_admission_list->PaymentCategory->editAttributes() ?>>
			<?php echo $ip_admission_list->PaymentCategory->selectOptionListHtml("x_PaymentCategory") ?>
		</select>
</div>
<?php echo $ip_admission_list->PaymentCategory->Lookup->getParamTag($ip_admission_list, "p_x_PaymentCategory") ?>
</span>
	</div>
	<?php if ($ip_admission_list->SearchColumnCount % $ip_admission_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->physician_id->Visible) { // physician_id ?>
	<?php
		$ip_admission_list->SearchColumnCount++;
		if (($ip_admission_list->SearchColumnCount - 1) % $ip_admission_list->SearchFieldsPerRow == 0) {
			$ip_admission_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $ip_admission_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_physician_id" class="ew-cell form-group">
		<label for="x_physician_id" class="ew-search-caption ew-label"><?php echo $ip_admission_list->physician_id->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_physician_id" id="z_physician_id" value="=">
</span>
		<span id="el_ip_admission_physician_id" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_physician_id" data-value-separator="<?php echo $ip_admission_list->physician_id->displayValueSeparatorAttribute() ?>" id="x_physician_id" name="x_physician_id"<?php echo $ip_admission_list->physician_id->editAttributes() ?>>
			<?php echo $ip_admission_list->physician_id->selectOptionListHtml("x_physician_id") ?>
		</select>
</div>
<?php echo $ip_admission_list->physician_id->Lookup->getParamTag($ip_admission_list, "p_x_physician_id") ?>
</span>
	</div>
	<?php if ($ip_admission_list->SearchColumnCount % $ip_admission_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<?php
		$ip_admission_list->SearchColumnCount++;
		if (($ip_admission_list->SearchColumnCount - 1) % $ip_admission_list->SearchFieldsPerRow == 0) {
			$ip_admission_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $ip_admission_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_admission_consultant_id" class="ew-cell form-group">
		<label for="x_admission_consultant_id" class="ew-search-caption ew-label"><?php echo $ip_admission_list->admission_consultant_id->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_admission_consultant_id" id="z_admission_consultant_id" value="=">
</span>
		<span id="el_ip_admission_admission_consultant_id" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_admission_consultant_id" data-value-separator="<?php echo $ip_admission_list->admission_consultant_id->displayValueSeparatorAttribute() ?>" id="x_admission_consultant_id" name="x_admission_consultant_id"<?php echo $ip_admission_list->admission_consultant_id->editAttributes() ?>>
			<?php echo $ip_admission_list->admission_consultant_id->selectOptionListHtml("x_admission_consultant_id") ?>
		</select>
</div>
<?php echo $ip_admission_list->admission_consultant_id->Lookup->getParamTag($ip_admission_list, "p_x_admission_consultant_id") ?>
</span>
	</div>
	<?php if ($ip_admission_list->SearchColumnCount % $ip_admission_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->createddatetime->Visible) { // createddatetime ?>
	<?php
		$ip_admission_list->SearchColumnCount++;
		if (($ip_admission_list->SearchColumnCount - 1) % $ip_admission_list->SearchFieldsPerRow == 0) {
			$ip_admission_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $ip_admission_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_createddatetime" class="ew-cell form-group">
		<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $ip_admission_list->createddatetime->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
		<span id="el_ip_admission_createddatetime" class="ew-search-field">
<input type="text" data-table="ip_admission" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($ip_admission_list->createddatetime->getPlaceHolder()) ?>" value="<?php echo $ip_admission_list->createddatetime->EditValue ?>"<?php echo $ip_admission_list->createddatetime->editAttributes() ?>>
<?php if (!$ip_admission_list->createddatetime->ReadOnly && !$ip_admission_list->createddatetime->Disabled && !isset($ip_admission_list->createddatetime->EditAttrs["readonly"]) && !isset($ip_admission_list->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fip_admissionlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fip_admissionlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($ip_admission_list->SearchColumnCount % $ip_admission_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->patient_id->Visible) { // patient_id ?>
	<?php
		$ip_admission_list->SearchColumnCount++;
		if (($ip_admission_list->SearchColumnCount - 1) % $ip_admission_list->SearchFieldsPerRow == 0) {
			$ip_admission_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $ip_admission_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_patient_id" class="ew-cell form-group">
		<label for="x_patient_id" class="ew-search-caption ew-label"><?php echo $ip_admission_list->patient_id->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_patient_id" id="z_patient_id" value="=">
</span>
		<span id="el_ip_admission_patient_id" class="ew-search-field">
<input type="text" data-table="ip_admission" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($ip_admission_list->patient_id->getPlaceHolder()) ?>" value="<?php echo $ip_admission_list->patient_id->EditValue ?>"<?php echo $ip_admission_list->patient_id->editAttributes() ?>>
<?php echo $ip_admission_list->patient_id->Lookup->getParamTag($ip_admission_list, "p_x_patient_id") ?>
</span>
	</div>
	<?php if ($ip_admission_list->SearchColumnCount % $ip_admission_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($ip_admission_list->SearchColumnCount % $ip_admission_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $ip_admission_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ip_admission_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ip_admission_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ip_admission_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ip_admission_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ip_admission_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ip_admission_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ip_admission_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ip_admission_list->showPageHeader(); ?>
<?php
$ip_admission_list->showMessage();
?>
<?php if ($ip_admission_list->TotalRecords > 0 || $ip_admission->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ip_admission_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ip_admission">
<?php if (!$ip_admission_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ip_admission_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ip_admission_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ip_admission_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fip_admissionlist" id="fip_admissionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ip_admission">
<div id="gmp_ip_admission" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ip_admission_list->TotalRecords > 0 || $ip_admission_list->isGridEdit()) { ?>
<table id="tbl_ip_admissionlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ip_admission->RowType = ROWTYPE_HEADER;

// Render list options
$ip_admission_list->renderListOptions();

// Render list options (header, left)
$ip_admission_list->ListOptions->render("header", "left");
?>
<?php if ($ip_admission_list->id->Visible) { // id ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $ip_admission_list->id->headerCellClass() ?>"><div id="elh_ip_admission_id" class="ip_admission_id"><div class="ew-table-header-caption"><?php echo $ip_admission_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ip_admission_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->id) ?>', 1);"><div id="elh_ip_admission_id" class="ip_admission_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->mrnNo->Visible) { // mrnNo ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->mrnNo) == "") { ?>
		<th data-name="mrnNo" class="<?php echo $ip_admission_list->mrnNo->headerCellClass() ?>"><div id="elh_ip_admission_mrnNo" class="ip_admission_mrnNo"><div class="ew-table-header-caption"><?php echo $ip_admission_list->mrnNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnNo" class="<?php echo $ip_admission_list->mrnNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->mrnNo) ?>', 1);"><div id="elh_ip_admission_mrnNo" class="ip_admission_mrnNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->mrnNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->mrnNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->mrnNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->PatientID->Visible) { // PatientID ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $ip_admission_list->PatientID->headerCellClass() ?>"><div id="elh_ip_admission_PatientID" class="ip_admission_PatientID"><div class="ew-table-header-caption"><?php echo $ip_admission_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $ip_admission_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->PatientID) ?>', 1);"><div id="elh_ip_admission_PatientID" class="ip_admission_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->patient_name->Visible) { // patient_name ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->patient_name) == "") { ?>
		<th data-name="patient_name" class="<?php echo $ip_admission_list->patient_name->headerCellClass() ?>"><div id="elh_ip_admission_patient_name" class="ip_admission_patient_name"><div class="ew-table-header-caption"><?php echo $ip_admission_list->patient_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_name" class="<?php echo $ip_admission_list->patient_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->patient_name) ?>', 1);"><div id="elh_ip_admission_patient_name" class="ip_admission_patient_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->patient_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->patient_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->patient_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->mobileno->Visible) { // mobileno ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->mobileno) == "") { ?>
		<th data-name="mobileno" class="<?php echo $ip_admission_list->mobileno->headerCellClass() ?>"><div id="elh_ip_admission_mobileno" class="ip_admission_mobileno"><div class="ew-table-header-caption"><?php echo $ip_admission_list->mobileno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobileno" class="<?php echo $ip_admission_list->mobileno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->mobileno) ?>', 1);"><div id="elh_ip_admission_mobileno" class="ip_admission_mobileno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->mobileno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->mobileno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->mobileno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->gender->Visible) { // gender ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $ip_admission_list->gender->headerCellClass() ?>"><div id="elh_ip_admission_gender" class="ip_admission_gender"><div class="ew-table-header-caption"><?php echo $ip_admission_list->gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $ip_admission_list->gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->gender) ?>', 1);"><div id="elh_ip_admission_gender" class="ip_admission_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->age->Visible) { // age ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->age) == "") { ?>
		<th data-name="age" class="<?php echo $ip_admission_list->age->headerCellClass() ?>"><div id="elh_ip_admission_age" class="ip_admission_age"><div class="ew-table-header-caption"><?php echo $ip_admission_list->age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="age" class="<?php echo $ip_admission_list->age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->age) ?>', 1);"><div id="elh_ip_admission_age" class="ip_admission_age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->typeRegsisteration) == "") { ?>
		<th data-name="typeRegsisteration" class="<?php echo $ip_admission_list->typeRegsisteration->headerCellClass() ?>"><div id="elh_ip_admission_typeRegsisteration" class="ip_admission_typeRegsisteration"><div class="ew-table-header-caption"><?php echo $ip_admission_list->typeRegsisteration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="typeRegsisteration" class="<?php echo $ip_admission_list->typeRegsisteration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->typeRegsisteration) ?>', 1);"><div id="elh_ip_admission_typeRegsisteration" class="ip_admission_typeRegsisteration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->typeRegsisteration->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->typeRegsisteration->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->typeRegsisteration->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->PaymentCategory->Visible) { // PaymentCategory ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->PaymentCategory) == "") { ?>
		<th data-name="PaymentCategory" class="<?php echo $ip_admission_list->PaymentCategory->headerCellClass() ?>"><div id="elh_ip_admission_PaymentCategory" class="ip_admission_PaymentCategory"><div class="ew-table-header-caption"><?php echo $ip_admission_list->PaymentCategory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentCategory" class="<?php echo $ip_admission_list->PaymentCategory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->PaymentCategory) ?>', 1);"><div id="elh_ip_admission_PaymentCategory" class="ip_admission_PaymentCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->PaymentCategory->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->PaymentCategory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->PaymentCategory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->physician_id->Visible) { // physician_id ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->physician_id) == "") { ?>
		<th data-name="physician_id" class="<?php echo $ip_admission_list->physician_id->headerCellClass() ?>"><div id="elh_ip_admission_physician_id" class="ip_admission_physician_id"><div class="ew-table-header-caption"><?php echo $ip_admission_list->physician_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="physician_id" class="<?php echo $ip_admission_list->physician_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->physician_id) ?>', 1);"><div id="elh_ip_admission_physician_id" class="ip_admission_physician_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->physician_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->physician_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->physician_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->admission_consultant_id) == "") { ?>
		<th data-name="admission_consultant_id" class="<?php echo $ip_admission_list->admission_consultant_id->headerCellClass() ?>"><div id="elh_ip_admission_admission_consultant_id" class="ip_admission_admission_consultant_id"><div class="ew-table-header-caption"><?php echo $ip_admission_list->admission_consultant_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="admission_consultant_id" class="<?php echo $ip_admission_list->admission_consultant_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->admission_consultant_id) ?>', 1);"><div id="elh_ip_admission_admission_consultant_id" class="ip_admission_admission_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->admission_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->admission_consultant_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->admission_consultant_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->leading_consultant_id) == "") { ?>
		<th data-name="leading_consultant_id" class="<?php echo $ip_admission_list->leading_consultant_id->headerCellClass() ?>"><div id="elh_ip_admission_leading_consultant_id" class="ip_admission_leading_consultant_id"><div class="ew-table-header-caption"><?php echo $ip_admission_list->leading_consultant_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leading_consultant_id" class="<?php echo $ip_admission_list->leading_consultant_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->leading_consultant_id) ?>', 1);"><div id="elh_ip_admission_leading_consultant_id" class="ip_admission_leading_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->leading_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->leading_consultant_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->leading_consultant_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->admission_date->Visible) { // admission_date ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->admission_date) == "") { ?>
		<th data-name="admission_date" class="<?php echo $ip_admission_list->admission_date->headerCellClass() ?>"><div id="elh_ip_admission_admission_date" class="ip_admission_admission_date"><div class="ew-table-header-caption"><?php echo $ip_admission_list->admission_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="admission_date" class="<?php echo $ip_admission_list->admission_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->admission_date) ?>', 1);"><div id="elh_ip_admission_admission_date" class="ip_admission_admission_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->admission_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->admission_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->admission_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->release_date->Visible) { // release_date ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->release_date) == "") { ?>
		<th data-name="release_date" class="<?php echo $ip_admission_list->release_date->headerCellClass() ?>"><div id="elh_ip_admission_release_date" class="ip_admission_release_date"><div class="ew-table-header-caption"><?php echo $ip_admission_list->release_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="release_date" class="<?php echo $ip_admission_list->release_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->release_date) ?>', 1);"><div id="elh_ip_admission_release_date" class="ip_admission_release_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->release_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->release_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->release_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $ip_admission_list->PaymentStatus->headerCellClass() ?>"><div id="elh_ip_admission_PaymentStatus" class="ip_admission_PaymentStatus"><div class="ew-table-header-caption"><?php echo $ip_admission_list->PaymentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $ip_admission_list->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->PaymentStatus) ?>', 1);"><div id="elh_ip_admission_PaymentStatus" class="ip_admission_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->PaymentStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->PaymentStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $ip_admission_list->createddatetime->headerCellClass() ?>"><div id="elh_ip_admission_createddatetime" class="ip_admission_createddatetime"><div class="ew-table-header-caption"><?php echo $ip_admission_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $ip_admission_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->createddatetime) ?>', 1);"><div id="elh_ip_admission_createddatetime" class="ip_admission_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->createddatetime->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->profilePic->Visible) { // profilePic ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $ip_admission_list->profilePic->headerCellClass() ?>"><div id="elh_ip_admission_profilePic" class="ip_admission_profilePic"><div class="ew-table-header-caption"><?php echo $ip_admission_list->profilePic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $ip_admission_list->profilePic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->profilePic) ?>', 1);"><div id="elh_ip_admission_profilePic" class="ip_admission_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->profilePic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->profilePic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->profilePic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->HospID->Visible) { // HospID ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $ip_admission_list->HospID->headerCellClass() ?>"><div id="elh_ip_admission_HospID" class="ip_admission_HospID"><div class="ew-table-header-caption"><?php echo $ip_admission_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $ip_admission_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->HospID) ?>', 1);"><div id="elh_ip_admission_HospID" class="ip_admission_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $ip_admission_list->ReferedByDr->headerCellClass() ?>"><div id="elh_ip_admission_ReferedByDr" class="ip_admission_ReferedByDr"><div class="ew-table-header-caption"><?php echo $ip_admission_list->ReferedByDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $ip_admission_list->ReferedByDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->ReferedByDr) ?>', 1);"><div id="elh_ip_admission_ReferedByDr" class="ip_admission_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->ReferedByDr->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->ReferedByDr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->ReferedByDr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $ip_admission_list->ReferClinicname->headerCellClass() ?>"><div id="elh_ip_admission_ReferClinicname" class="ip_admission_ReferClinicname"><div class="ew-table-header-caption"><?php echo $ip_admission_list->ReferClinicname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $ip_admission_list->ReferClinicname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->ReferClinicname) ?>', 1);"><div id="elh_ip_admission_ReferClinicname" class="ip_admission_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->ReferClinicname->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->ReferClinicname->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->ReferCity->Visible) { // ReferCity ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $ip_admission_list->ReferCity->headerCellClass() ?>"><div id="elh_ip_admission_ReferCity" class="ip_admission_ReferCity"><div class="ew-table-header-caption"><?php echo $ip_admission_list->ReferCity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $ip_admission_list->ReferCity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->ReferCity) ?>', 1);"><div id="elh_ip_admission_ReferCity" class="ip_admission_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->ReferCity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->ReferCity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $ip_admission_list->ReferMobileNo->headerCellClass() ?>"><div id="elh_ip_admission_ReferMobileNo" class="ip_admission_ReferMobileNo"><div class="ew-table-header-caption"><?php echo $ip_admission_list->ReferMobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $ip_admission_list->ReferMobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->ReferMobileNo) ?>', 1);"><div id="elh_ip_admission_ReferMobileNo" class="ip_admission_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->ReferMobileNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->ReferMobileNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $ip_admission_list->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_ip_admission_ReferA4TreatingConsultant" class="ip_admission_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><?php echo $ip_admission_list->ReferA4TreatingConsultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $ip_admission_list->ReferA4TreatingConsultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->ReferA4TreatingConsultant) ?>', 1);"><div id="elh_ip_admission_ReferA4TreatingConsultant" class="ip_admission_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->ReferA4TreatingConsultant->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->PurposreReferredfor) == "") { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $ip_admission_list->PurposreReferredfor->headerCellClass() ?>"><div id="elh_ip_admission_PurposreReferredfor" class="ip_admission_PurposreReferredfor"><div class="ew-table-header-caption"><?php echo $ip_admission_list->PurposreReferredfor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $ip_admission_list->PurposreReferredfor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->PurposreReferredfor) ?>', 1);"><div id="elh_ip_admission_PurposreReferredfor" class="ip_admission_PurposreReferredfor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->PurposreReferredfor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->PurposreReferredfor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->PurposreReferredfor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->BillClosing->Visible) { // BillClosing ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->BillClosing) == "") { ?>
		<th data-name="BillClosing" class="<?php echo $ip_admission_list->BillClosing->headerCellClass() ?>"><div id="elh_ip_admission_BillClosing" class="ip_admission_BillClosing"><div class="ew-table-header-caption"><?php echo $ip_admission_list->BillClosing->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosing" class="<?php echo $ip_admission_list->BillClosing->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->BillClosing) ?>', 1);"><div id="elh_ip_admission_BillClosing" class="ip_admission_BillClosing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->BillClosing->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->BillClosing->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->BillClosing->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->BillClosingDate->Visible) { // BillClosingDate ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->BillClosingDate) == "") { ?>
		<th data-name="BillClosingDate" class="<?php echo $ip_admission_list->BillClosingDate->headerCellClass() ?>"><div id="elh_ip_admission_BillClosingDate" class="ip_admission_BillClosingDate"><div class="ew-table-header-caption"><?php echo $ip_admission_list->BillClosingDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosingDate" class="<?php echo $ip_admission_list->BillClosingDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->BillClosingDate) ?>', 1);"><div id="elh_ip_admission_BillClosingDate" class="ip_admission_BillClosingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->BillClosingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->BillClosingDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->BillClosingDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->BillNumber->Visible) { // BillNumber ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $ip_admission_list->BillNumber->headerCellClass() ?>"><div id="elh_ip_admission_BillNumber" class="ip_admission_BillNumber"><div class="ew-table-header-caption"><?php echo $ip_admission_list->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $ip_admission_list->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->BillNumber) ?>', 1);"><div id="elh_ip_admission_BillNumber" class="ip_admission_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->BillNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->BillNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->ClosingAmount->Visible) { // ClosingAmount ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->ClosingAmount) == "") { ?>
		<th data-name="ClosingAmount" class="<?php echo $ip_admission_list->ClosingAmount->headerCellClass() ?>"><div id="elh_ip_admission_ClosingAmount" class="ip_admission_ClosingAmount"><div class="ew-table-header-caption"><?php echo $ip_admission_list->ClosingAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingAmount" class="<?php echo $ip_admission_list->ClosingAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->ClosingAmount) ?>', 1);"><div id="elh_ip_admission_ClosingAmount" class="ip_admission_ClosingAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->ClosingAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->ClosingAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->ClosingAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->ClosingType->Visible) { // ClosingType ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->ClosingType) == "") { ?>
		<th data-name="ClosingType" class="<?php echo $ip_admission_list->ClosingType->headerCellClass() ?>"><div id="elh_ip_admission_ClosingType" class="ip_admission_ClosingType"><div class="ew-table-header-caption"><?php echo $ip_admission_list->ClosingType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingType" class="<?php echo $ip_admission_list->ClosingType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->ClosingType) ?>', 1);"><div id="elh_ip_admission_ClosingType" class="ip_admission_ClosingType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->ClosingType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->ClosingType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->ClosingType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->BillAmount->Visible) { // BillAmount ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->BillAmount) == "") { ?>
		<th data-name="BillAmount" class="<?php echo $ip_admission_list->BillAmount->headerCellClass() ?>"><div id="elh_ip_admission_BillAmount" class="ip_admission_BillAmount"><div class="ew-table-header-caption"><?php echo $ip_admission_list->BillAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillAmount" class="<?php echo $ip_admission_list->BillAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->BillAmount) ?>', 1);"><div id="elh_ip_admission_BillAmount" class="ip_admission_BillAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->BillAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->BillAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->BillAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->billclosedBy->Visible) { // billclosedBy ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->billclosedBy) == "") { ?>
		<th data-name="billclosedBy" class="<?php echo $ip_admission_list->billclosedBy->headerCellClass() ?>"><div id="elh_ip_admission_billclosedBy" class="ip_admission_billclosedBy"><div class="ew-table-header-caption"><?php echo $ip_admission_list->billclosedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="billclosedBy" class="<?php echo $ip_admission_list->billclosedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->billclosedBy) ?>', 1);"><div id="elh_ip_admission_billclosedBy" class="ip_admission_billclosedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->billclosedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->billclosedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->billclosedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->bllcloseByDate) == "") { ?>
		<th data-name="bllcloseByDate" class="<?php echo $ip_admission_list->bllcloseByDate->headerCellClass() ?>"><div id="elh_ip_admission_bllcloseByDate" class="ip_admission_bllcloseByDate"><div class="ew-table-header-caption"><?php echo $ip_admission_list->bllcloseByDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bllcloseByDate" class="<?php echo $ip_admission_list->bllcloseByDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->bllcloseByDate) ?>', 1);"><div id="elh_ip_admission_bllcloseByDate" class="ip_admission_bllcloseByDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->bllcloseByDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->bllcloseByDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->bllcloseByDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $ip_admission_list->ReportHeader->headerCellClass() ?>"><div id="elh_ip_admission_ReportHeader" class="ip_admission_ReportHeader"><div class="ew-table-header-caption"><?php echo $ip_admission_list->ReportHeader->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $ip_admission_list->ReportHeader->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->ReportHeader) ?>', 1);"><div id="elh_ip_admission_ReportHeader" class="ip_admission_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->ReportHeader->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->ReportHeader->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->ReportHeader->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->Procedure->Visible) { // Procedure ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->Procedure) == "") { ?>
		<th data-name="Procedure" class="<?php echo $ip_admission_list->Procedure->headerCellClass() ?>"><div id="elh_ip_admission_Procedure" class="ip_admission_Procedure"><div class="ew-table-header-caption"><?php echo $ip_admission_list->Procedure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Procedure" class="<?php echo $ip_admission_list->Procedure->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->Procedure) ?>', 1);"><div id="elh_ip_admission_Procedure" class="ip_admission_Procedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->Procedure->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->Procedure->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->Procedure->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->Consultant->Visible) { // Consultant ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $ip_admission_list->Consultant->headerCellClass() ?>"><div id="elh_ip_admission_Consultant" class="ip_admission_Consultant"><div class="ew-table-header-caption"><?php echo $ip_admission_list->Consultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $ip_admission_list->Consultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->Consultant) ?>', 1);"><div id="elh_ip_admission_Consultant" class="ip_admission_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->Consultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->Consultant->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->Consultant->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->Anesthetist->Visible) { // Anesthetist ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->Anesthetist) == "") { ?>
		<th data-name="Anesthetist" class="<?php echo $ip_admission_list->Anesthetist->headerCellClass() ?>"><div id="elh_ip_admission_Anesthetist" class="ip_admission_Anesthetist"><div class="ew-table-header-caption"><?php echo $ip_admission_list->Anesthetist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anesthetist" class="<?php echo $ip_admission_list->Anesthetist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->Anesthetist) ?>', 1);"><div id="elh_ip_admission_Anesthetist" class="ip_admission_Anesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->Anesthetist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->Anesthetist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->Anesthetist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->Amound->Visible) { // Amound ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->Amound) == "") { ?>
		<th data-name="Amound" class="<?php echo $ip_admission_list->Amound->headerCellClass() ?>"><div id="elh_ip_admission_Amound" class="ip_admission_Amound"><div class="ew-table-header-caption"><?php echo $ip_admission_list->Amound->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amound" class="<?php echo $ip_admission_list->Amound->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->Amound) ?>', 1);"><div id="elh_ip_admission_Amound" class="ip_admission_Amound">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->Amound->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->Amound->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->Amound->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->Package->Visible) { // Package ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->Package) == "") { ?>
		<th data-name="Package" class="<?php echo $ip_admission_list->Package->headerCellClass() ?>"><div id="elh_ip_admission_Package" class="ip_admission_Package"><div class="ew-table-header-caption"><?php echo $ip_admission_list->Package->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Package" class="<?php echo $ip_admission_list->Package->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->Package) ?>', 1);"><div id="elh_ip_admission_Package" class="ip_admission_Package">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->Package->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->Package->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->Package->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->patient_id->Visible) { // patient_id ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $ip_admission_list->patient_id->headerCellClass() ?>"><div id="elh_ip_admission_patient_id" class="ip_admission_patient_id"><div class="ew-table-header-caption"><?php echo $ip_admission_list->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $ip_admission_list->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->patient_id) ?>', 1);"><div id="elh_ip_admission_patient_id" class="ip_admission_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->patient_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->patient_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->PartnerID->Visible) { // PartnerID ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $ip_admission_list->PartnerID->headerCellClass() ?>"><div id="elh_ip_admission_PartnerID" class="ip_admission_PartnerID"><div class="ew-table-header-caption"><?php echo $ip_admission_list->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $ip_admission_list->PartnerID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->PartnerID) ?>', 1);"><div id="elh_ip_admission_PartnerID" class="ip_admission_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->PartnerID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->PartnerID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->PartnerName->Visible) { // PartnerName ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $ip_admission_list->PartnerName->headerCellClass() ?>"><div id="elh_ip_admission_PartnerName" class="ip_admission_PartnerName"><div class="ew-table-header-caption"><?php echo $ip_admission_list->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $ip_admission_list->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->PartnerName) ?>', 1);"><div id="elh_ip_admission_PartnerName" class="ip_admission_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->PartnerName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->PartnerName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->PartnerMobile->Visible) { // PartnerMobile ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->PartnerMobile) == "") { ?>
		<th data-name="PartnerMobile" class="<?php echo $ip_admission_list->PartnerMobile->headerCellClass() ?>"><div id="elh_ip_admission_PartnerMobile" class="ip_admission_PartnerMobile"><div class="ew-table-header-caption"><?php echo $ip_admission_list->PartnerMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerMobile" class="<?php echo $ip_admission_list->PartnerMobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->PartnerMobile) ?>', 1);"><div id="elh_ip_admission_PartnerMobile" class="ip_admission_PartnerMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->PartnerMobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->PartnerMobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->PartnerMobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->Cid->Visible) { // Cid ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->Cid) == "") { ?>
		<th data-name="Cid" class="<?php echo $ip_admission_list->Cid->headerCellClass() ?>"><div id="elh_ip_admission_Cid" class="ip_admission_Cid"><div class="ew-table-header-caption"><?php echo $ip_admission_list->Cid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cid" class="<?php echo $ip_admission_list->Cid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->Cid) ?>', 1);"><div id="elh_ip_admission_Cid" class="ip_admission_Cid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->Cid->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->Cid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->Cid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->PartId->Visible) { // PartId ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->PartId) == "") { ?>
		<th data-name="PartId" class="<?php echo $ip_admission_list->PartId->headerCellClass() ?>"><div id="elh_ip_admission_PartId" class="ip_admission_PartId"><div class="ew-table-header-caption"><?php echo $ip_admission_list->PartId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartId" class="<?php echo $ip_admission_list->PartId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->PartId) ?>', 1);"><div id="elh_ip_admission_PartId" class="ip_admission_PartId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->PartId->caption() ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->PartId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->PartId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->IDProof->Visible) { // IDProof ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->IDProof) == "") { ?>
		<th data-name="IDProof" class="<?php echo $ip_admission_list->IDProof->headerCellClass() ?>"><div id="elh_ip_admission_IDProof" class="ip_admission_IDProof"><div class="ew-table-header-caption"><?php echo $ip_admission_list->IDProof->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IDProof" class="<?php echo $ip_admission_list->IDProof->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->IDProof) ?>', 1);"><div id="elh_ip_admission_IDProof" class="ip_admission_IDProof">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->IDProof->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->IDProof->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->IDProof->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ip_admission_list->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
	<?php if ($ip_admission_list->SortUrl($ip_admission_list->AdviceToOtherHospital) == "") { ?>
		<th data-name="AdviceToOtherHospital" class="<?php echo $ip_admission_list->AdviceToOtherHospital->headerCellClass() ?>"><div id="elh_ip_admission_AdviceToOtherHospital" class="ip_admission_AdviceToOtherHospital"><div class="ew-table-header-caption"><?php echo $ip_admission_list->AdviceToOtherHospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdviceToOtherHospital" class="<?php echo $ip_admission_list->AdviceToOtherHospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ip_admission_list->SortUrl($ip_admission_list->AdviceToOtherHospital) ?>', 1);"><div id="elh_ip_admission_AdviceToOtherHospital" class="ip_admission_AdviceToOtherHospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ip_admission_list->AdviceToOtherHospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ip_admission_list->AdviceToOtherHospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ip_admission_list->AdviceToOtherHospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ip_admission_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ip_admission_list->ExportAll && $ip_admission_list->isExport()) {
	$ip_admission_list->StopRecord = $ip_admission_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ip_admission_list->TotalRecords > $ip_admission_list->StartRecord + $ip_admission_list->DisplayRecords - 1)
		$ip_admission_list->StopRecord = $ip_admission_list->StartRecord + $ip_admission_list->DisplayRecords - 1;
	else
		$ip_admission_list->StopRecord = $ip_admission_list->TotalRecords;
}
$ip_admission_list->RecordCount = $ip_admission_list->StartRecord - 1;
if ($ip_admission_list->Recordset && !$ip_admission_list->Recordset->EOF) {
	$ip_admission_list->Recordset->moveFirst();
	$selectLimit = $ip_admission_list->UseSelectLimit;
	if (!$selectLimit && $ip_admission_list->StartRecord > 1)
		$ip_admission_list->Recordset->move($ip_admission_list->StartRecord - 1);
} elseif (!$ip_admission->AllowAddDeleteRow && $ip_admission_list->StopRecord == 0) {
	$ip_admission_list->StopRecord = $ip_admission->GridAddRowCount;
}

// Initialize aggregate
$ip_admission->RowType = ROWTYPE_AGGREGATEINIT;
$ip_admission->resetAttributes();
$ip_admission_list->renderRow();
while ($ip_admission_list->RecordCount < $ip_admission_list->StopRecord) {
	$ip_admission_list->RecordCount++;
	if ($ip_admission_list->RecordCount >= $ip_admission_list->StartRecord) {
		$ip_admission_list->RowCount++;

		// Set up key count
		$ip_admission_list->KeyCount = $ip_admission_list->RowIndex;

		// Init row class and style
		$ip_admission->resetAttributes();
		$ip_admission->CssClass = "";
		if ($ip_admission_list->isGridAdd()) {
		} else {
			$ip_admission_list->loadRowValues($ip_admission_list->Recordset); // Load row values
		}
		$ip_admission->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ip_admission->RowAttrs->merge(["data-rowindex" => $ip_admission_list->RowCount, "id" => "r" . $ip_admission_list->RowCount . "_ip_admission", "data-rowtype" => $ip_admission->RowType]);

		// Render row
		$ip_admission_list->renderRow();

		// Render list options
		$ip_admission_list->renderListOptions();
?>
	<tr <?php echo $ip_admission->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ip_admission_list->ListOptions->render("body", "left", $ip_admission_list->RowCount);
?>
	<?php if ($ip_admission_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ip_admission_list->id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_id">
<span<?php echo $ip_admission_list->id->viewAttributes() ?>><?php echo $ip_admission_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->mrnNo->Visible) { // mrnNo ?>
		<td data-name="mrnNo" <?php echo $ip_admission_list->mrnNo->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_mrnNo">
<span<?php echo $ip_admission_list->mrnNo->viewAttributes() ?>><?php echo $ip_admission_list->mrnNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $ip_admission_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_PatientID">
<span<?php echo $ip_admission_list->PatientID->viewAttributes() ?>><?php echo $ip_admission_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->patient_name->Visible) { // patient_name ?>
		<td data-name="patient_name" <?php echo $ip_admission_list->patient_name->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_patient_name">
<span<?php echo $ip_admission_list->patient_name->viewAttributes() ?>><?php echo $ip_admission_list->patient_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->mobileno->Visible) { // mobileno ?>
		<td data-name="mobileno" <?php echo $ip_admission_list->mobileno->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_mobileno">
<span<?php echo $ip_admission_list->mobileno->viewAttributes() ?>><?php echo $ip_admission_list->mobileno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->gender->Visible) { // gender ?>
		<td data-name="gender" <?php echo $ip_admission_list->gender->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_gender">
<span<?php echo $ip_admission_list->gender->viewAttributes() ?>><?php echo $ip_admission_list->gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->age->Visible) { // age ?>
		<td data-name="age" <?php echo $ip_admission_list->age->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_age">
<span<?php echo $ip_admission_list->age->viewAttributes() ?>><?php echo $ip_admission_list->age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<td data-name="typeRegsisteration" <?php echo $ip_admission_list->typeRegsisteration->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_typeRegsisteration">
<span<?php echo $ip_admission_list->typeRegsisteration->viewAttributes() ?>><?php echo $ip_admission_list->typeRegsisteration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->PaymentCategory->Visible) { // PaymentCategory ?>
		<td data-name="PaymentCategory" <?php echo $ip_admission_list->PaymentCategory->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_PaymentCategory">
<span<?php echo $ip_admission_list->PaymentCategory->viewAttributes() ?>><?php echo $ip_admission_list->PaymentCategory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->physician_id->Visible) { // physician_id ?>
		<td data-name="physician_id" <?php echo $ip_admission_list->physician_id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_physician_id">
<span<?php echo $ip_admission_list->physician_id->viewAttributes() ?>><?php echo $ip_admission_list->physician_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->admission_consultant_id->Visible) { // admission_consultant_id ?>
		<td data-name="admission_consultant_id" <?php echo $ip_admission_list->admission_consultant_id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_admission_consultant_id">
<span<?php echo $ip_admission_list->admission_consultant_id->viewAttributes() ?>><?php echo $ip_admission_list->admission_consultant_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->leading_consultant_id->Visible) { // leading_consultant_id ?>
		<td data-name="leading_consultant_id" <?php echo $ip_admission_list->leading_consultant_id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_leading_consultant_id">
<span<?php echo $ip_admission_list->leading_consultant_id->viewAttributes() ?>><?php echo $ip_admission_list->leading_consultant_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->admission_date->Visible) { // admission_date ?>
		<td data-name="admission_date" <?php echo $ip_admission_list->admission_date->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_admission_date">
<span<?php echo $ip_admission_list->admission_date->viewAttributes() ?>><?php echo $ip_admission_list->admission_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->release_date->Visible) { // release_date ?>
		<td data-name="release_date" <?php echo $ip_admission_list->release_date->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_release_date">
<span<?php echo $ip_admission_list->release_date->viewAttributes() ?>><?php echo $ip_admission_list->release_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus" <?php echo $ip_admission_list->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_PaymentStatus">
<span<?php echo $ip_admission_list->PaymentStatus->viewAttributes() ?>><?php echo $ip_admission_list->PaymentStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $ip_admission_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_createddatetime">
<span<?php echo $ip_admission_list->createddatetime->viewAttributes() ?>><?php echo $ip_admission_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic" <?php echo $ip_admission_list->profilePic->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_profilePic">
<span<?php echo $ip_admission_list->profilePic->viewAttributes() ?>><?php echo $ip_admission_list->profilePic->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $ip_admission_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_HospID">
<span<?php echo $ip_admission_list->HospID->viewAttributes() ?>><?php echo $ip_admission_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr" <?php echo $ip_admission_list->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_ReferedByDr">
<span<?php echo $ip_admission_list->ReferedByDr->viewAttributes() ?>><?php echo $ip_admission_list->ReferedByDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname" <?php echo $ip_admission_list->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_ReferClinicname">
<span<?php echo $ip_admission_list->ReferClinicname->viewAttributes() ?>><?php echo $ip_admission_list->ReferClinicname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity" <?php echo $ip_admission_list->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_ReferCity">
<span<?php echo $ip_admission_list->ReferCity->viewAttributes() ?>><?php echo $ip_admission_list->ReferCity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo" <?php echo $ip_admission_list->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_ReferMobileNo">
<span<?php echo $ip_admission_list->ReferMobileNo->viewAttributes() ?>><?php echo $ip_admission_list->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant" <?php echo $ip_admission_list->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_ReferA4TreatingConsultant">
<span<?php echo $ip_admission_list->ReferA4TreatingConsultant->viewAttributes() ?>><?php echo $ip_admission_list->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td data-name="PurposreReferredfor" <?php echo $ip_admission_list->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_PurposreReferredfor">
<span<?php echo $ip_admission_list->PurposreReferredfor->viewAttributes() ?>><?php echo $ip_admission_list->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->BillClosing->Visible) { // BillClosing ?>
		<td data-name="BillClosing" <?php echo $ip_admission_list->BillClosing->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_BillClosing">
<span<?php echo $ip_admission_list->BillClosing->viewAttributes() ?>><?php echo $ip_admission_list->BillClosing->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->BillClosingDate->Visible) { // BillClosingDate ?>
		<td data-name="BillClosingDate" <?php echo $ip_admission_list->BillClosingDate->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_BillClosingDate">
<span<?php echo $ip_admission_list->BillClosingDate->viewAttributes() ?>><?php echo $ip_admission_list->BillClosingDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" <?php echo $ip_admission_list->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_BillNumber">
<span<?php echo $ip_admission_list->BillNumber->viewAttributes() ?>><?php echo $ip_admission_list->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->ClosingAmount->Visible) { // ClosingAmount ?>
		<td data-name="ClosingAmount" <?php echo $ip_admission_list->ClosingAmount->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_ClosingAmount">
<span<?php echo $ip_admission_list->ClosingAmount->viewAttributes() ?>><?php echo $ip_admission_list->ClosingAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->ClosingType->Visible) { // ClosingType ?>
		<td data-name="ClosingType" <?php echo $ip_admission_list->ClosingType->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_ClosingType">
<span<?php echo $ip_admission_list->ClosingType->viewAttributes() ?>><?php echo $ip_admission_list->ClosingType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->BillAmount->Visible) { // BillAmount ?>
		<td data-name="BillAmount" <?php echo $ip_admission_list->BillAmount->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_BillAmount">
<span<?php echo $ip_admission_list->BillAmount->viewAttributes() ?>><?php echo $ip_admission_list->BillAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->billclosedBy->Visible) { // billclosedBy ?>
		<td data-name="billclosedBy" <?php echo $ip_admission_list->billclosedBy->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_billclosedBy">
<span<?php echo $ip_admission_list->billclosedBy->viewAttributes() ?>><?php echo $ip_admission_list->billclosedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->bllcloseByDate->Visible) { // bllcloseByDate ?>
		<td data-name="bllcloseByDate" <?php echo $ip_admission_list->bllcloseByDate->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_bllcloseByDate">
<span<?php echo $ip_admission_list->bllcloseByDate->viewAttributes() ?>><?php echo $ip_admission_list->bllcloseByDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader" <?php echo $ip_admission_list->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_ReportHeader">
<span<?php echo $ip_admission_list->ReportHeader->viewAttributes() ?>><?php echo $ip_admission_list->ReportHeader->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->Procedure->Visible) { // Procedure ?>
		<td data-name="Procedure" <?php echo $ip_admission_list->Procedure->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_Procedure">
<span<?php echo $ip_admission_list->Procedure->viewAttributes() ?>><?php echo $ip_admission_list->Procedure->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant" <?php echo $ip_admission_list->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_Consultant">
<span<?php echo $ip_admission_list->Consultant->viewAttributes() ?>><?php echo $ip_admission_list->Consultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->Anesthetist->Visible) { // Anesthetist ?>
		<td data-name="Anesthetist" <?php echo $ip_admission_list->Anesthetist->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_Anesthetist">
<span<?php echo $ip_admission_list->Anesthetist->viewAttributes() ?>><?php echo $ip_admission_list->Anesthetist->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->Amound->Visible) { // Amound ?>
		<td data-name="Amound" <?php echo $ip_admission_list->Amound->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_Amound">
<span<?php echo $ip_admission_list->Amound->viewAttributes() ?>><?php echo $ip_admission_list->Amound->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->Package->Visible) { // Package ?>
		<td data-name="Package" <?php echo $ip_admission_list->Package->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_Package">
<span<?php echo $ip_admission_list->Package->viewAttributes() ?>><?php echo $ip_admission_list->Package->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id" <?php echo $ip_admission_list->patient_id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_patient_id">
<span<?php echo $ip_admission_list->patient_id->viewAttributes() ?>><?php echo $ip_admission_list->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID" <?php echo $ip_admission_list->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_PartnerID">
<span<?php echo $ip_admission_list->PartnerID->viewAttributes() ?>><?php echo $ip_admission_list->PartnerID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName" <?php echo $ip_admission_list->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_PartnerName">
<span<?php echo $ip_admission_list->PartnerName->viewAttributes() ?>><?php echo $ip_admission_list->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->PartnerMobile->Visible) { // PartnerMobile ?>
		<td data-name="PartnerMobile" <?php echo $ip_admission_list->PartnerMobile->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_PartnerMobile">
<span<?php echo $ip_admission_list->PartnerMobile->viewAttributes() ?>><?php echo $ip_admission_list->PartnerMobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->Cid->Visible) { // Cid ?>
		<td data-name="Cid" <?php echo $ip_admission_list->Cid->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_Cid">
<span<?php echo $ip_admission_list->Cid->viewAttributes() ?>><?php echo $ip_admission_list->Cid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->PartId->Visible) { // PartId ?>
		<td data-name="PartId" <?php echo $ip_admission_list->PartId->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_PartId">
<span<?php echo $ip_admission_list->PartId->viewAttributes() ?>><?php echo $ip_admission_list->PartId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->IDProof->Visible) { // IDProof ?>
		<td data-name="IDProof" <?php echo $ip_admission_list->IDProof->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_IDProof">
<span<?php echo $ip_admission_list->IDProof->viewAttributes() ?>><?php echo $ip_admission_list->IDProof->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ip_admission_list->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
		<td data-name="AdviceToOtherHospital" <?php echo $ip_admission_list->AdviceToOtherHospital->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_list->RowCount ?>_ip_admission_AdviceToOtherHospital">
<span<?php echo $ip_admission_list->AdviceToOtherHospital->viewAttributes() ?>><?php echo $ip_admission_list->AdviceToOtherHospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ip_admission_list->ListOptions->render("body", "right", $ip_admission_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$ip_admission_list->isGridAdd())
		$ip_admission_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$ip_admission->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ip_admission_list->Recordset)
	$ip_admission_list->Recordset->Close();
?>
<?php if (!$ip_admission_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ip_admission_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ip_admission_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ip_admission_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ip_admission_list->TotalRecords == 0 && !$ip_admission->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ip_admission_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ip_admission_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ip_admission_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ip_admission->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ip_admission",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ip_admission_list->terminate();
?>