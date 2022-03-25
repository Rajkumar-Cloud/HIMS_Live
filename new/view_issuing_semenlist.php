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
$view_issuing_semen_list = new view_issuing_semen_list();

// Run the page
$view_issuing_semen_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_issuing_semen_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_issuing_semen_list->isExport()) { ?>
<script>
var fview_issuing_semenlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_issuing_semenlist = currentForm = new ew.Form("fview_issuing_semenlist", "list");
	fview_issuing_semenlist.formKeyCountName = '<?php echo $view_issuing_semen_list->FormKeyCountName ?>';

	// Validate form
	fview_issuing_semenlist.validate = function() {
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
			<?php if ($view_issuing_semen_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen_list->id->caption(), $view_issuing_semen_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_issuing_semen_list->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen_list->RIDNo->caption(), $view_issuing_semen_list->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_issuing_semen_list->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen_list->PatientName->caption(), $view_issuing_semen_list->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_issuing_semen_list->HusbandName->Required) { ?>
				elm = this.getElements("x" + infix + "_HusbandName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen_list->HusbandName->caption(), $view_issuing_semen_list->HusbandName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_issuing_semen_list->RequestDr->Required) { ?>
				elm = this.getElements("x" + infix + "_RequestDr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen_list->RequestDr->caption(), $view_issuing_semen_list->RequestDr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_issuing_semen_list->CollectionDate->Required) { ?>
				elm = this.getElements("x" + infix + "_CollectionDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen_list->CollectionDate->caption(), $view_issuing_semen_list->CollectionDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_issuing_semen_list->Tank->Required) { ?>
				elm = this.getElements("x" + infix + "_Tank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen_list->Tank->caption(), $view_issuing_semen_list->Tank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_issuing_semen_list->Location->Required) { ?>
				elm = this.getElements("x" + infix + "_Location");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen_list->Location->caption(), $view_issuing_semen_list->Location->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_issuing_semen_list->IssuedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_IssuedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen_list->IssuedBy->caption(), $view_issuing_semen_list->IssuedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_issuing_semen_list->IssuedTo->Required) { ?>
				elm = this.getElements("x" + infix + "_IssuedTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen_list->IssuedTo->caption(), $view_issuing_semen_list->IssuedTo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_issuing_semen_list->RequestSample->Required) { ?>
				elm = this.getElements("x" + infix + "_RequestSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen_list->RequestSample->caption(), $view_issuing_semen_list->RequestSample->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fview_issuing_semenlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_issuing_semenlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_issuing_semenlist.lists["x_PatientName"] = <?php echo $view_issuing_semen_list->PatientName->Lookup->toClientList($view_issuing_semen_list) ?>;
	fview_issuing_semenlist.lists["x_PatientName"].options = <?php echo JsonEncode($view_issuing_semen_list->PatientName->lookupOptions()) ?>;
	fview_issuing_semenlist.lists["x_HusbandName"] = <?php echo $view_issuing_semen_list->HusbandName->Lookup->toClientList($view_issuing_semen_list) ?>;
	fview_issuing_semenlist.lists["x_HusbandName"].options = <?php echo JsonEncode($view_issuing_semen_list->HusbandName->lookupOptions()) ?>;
	fview_issuing_semenlist.lists["x_IssuedTo"] = <?php echo $view_issuing_semen_list->IssuedTo->Lookup->toClientList($view_issuing_semen_list) ?>;
	fview_issuing_semenlist.lists["x_IssuedTo"].options = <?php echo JsonEncode($view_issuing_semen_list->IssuedTo->options(FALSE, TRUE)) ?>;
	fview_issuing_semenlist.lists["x_RequestSample"] = <?php echo $view_issuing_semen_list->RequestSample->Lookup->toClientList($view_issuing_semen_list) ?>;
	fview_issuing_semenlist.lists["x_RequestSample"].options = <?php echo JsonEncode($view_issuing_semen_list->RequestSample->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_issuing_semenlist");
});
var fview_issuing_semenlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_issuing_semenlistsrch = currentSearchForm = new ew.Form("fview_issuing_semenlistsrch");

	// Validate function for search
	fview_issuing_semenlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_RIDNo");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_issuing_semen_list->RIDNo->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_issuing_semenlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_issuing_semenlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_issuing_semenlistsrch.lists["x_PatientName"] = <?php echo $view_issuing_semen_list->PatientName->Lookup->toClientList($view_issuing_semen_list) ?>;
	fview_issuing_semenlistsrch.lists["x_PatientName"].options = <?php echo JsonEncode($view_issuing_semen_list->PatientName->lookupOptions()) ?>;
	fview_issuing_semenlistsrch.lists["x_HusbandName"] = <?php echo $view_issuing_semen_list->HusbandName->Lookup->toClientList($view_issuing_semen_list) ?>;
	fview_issuing_semenlistsrch.lists["x_HusbandName"].options = <?php echo JsonEncode($view_issuing_semen_list->HusbandName->lookupOptions()) ?>;

	// Filters
	fview_issuing_semenlistsrch.filterList = <?php echo $view_issuing_semen_list->getFilterList() ?>;
	loadjs.done("fview_issuing_semenlistsrch");
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
<?php if (!$view_issuing_semen_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_issuing_semen_list->TotalRecords > 0 && $view_issuing_semen_list->ExportOptions->visible()) { ?>
<?php $view_issuing_semen_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_issuing_semen_list->ImportOptions->visible()) { ?>
<?php $view_issuing_semen_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_issuing_semen_list->SearchOptions->visible()) { ?>
<?php $view_issuing_semen_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_issuing_semen_list->FilterOptions->visible()) { ?>
<?php $view_issuing_semen_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_issuing_semen_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_issuing_semen_list->isExport() && !$view_issuing_semen->CurrentAction) { ?>
<form name="fview_issuing_semenlistsrch" id="fview_issuing_semenlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_issuing_semenlistsrch-search-panel" class="<?php echo $view_issuing_semen_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_issuing_semen">
	<div class="ew-extended-search">
<?php

// Render search row
$view_issuing_semen->RowType = ROWTYPE_SEARCH;
$view_issuing_semen->resetAttributes();
$view_issuing_semen_list->renderRow();
?>
<?php if ($view_issuing_semen_list->RIDNo->Visible) { // RIDNo ?>
	<?php
		$view_issuing_semen_list->SearchColumnCount++;
		if (($view_issuing_semen_list->SearchColumnCount - 1) % $view_issuing_semen_list->SearchFieldsPerRow == 0) {
			$view_issuing_semen_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_issuing_semen_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_RIDNo" class="ew-cell form-group">
		<label for="x_RIDNo" class="ew-search-caption ew-label"><?php echo $view_issuing_semen_list->RIDNo->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_RIDNo" id="z_RIDNo" value="=">
</span>
		<span id="el_view_issuing_semen_RIDNo" class="ew-search-field">
<input type="text" data-table="view_issuing_semen" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($view_issuing_semen_list->RIDNo->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen_list->RIDNo->EditValue ?>"<?php echo $view_issuing_semen_list->RIDNo->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_issuing_semen_list->SearchColumnCount % $view_issuing_semen_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen_list->PatientName->Visible) { // PatientName ?>
	<?php
		$view_issuing_semen_list->SearchColumnCount++;
		if (($view_issuing_semen_list->SearchColumnCount - 1) % $view_issuing_semen_list->SearchFieldsPerRow == 0) {
			$view_issuing_semen_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_issuing_semen_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_issuing_semen_list->PatientName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		<span id="el_view_issuing_semen_PatientName" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_PatientName" data-value-separator="<?php echo $view_issuing_semen_list->PatientName->displayValueSeparatorAttribute() ?>" id="x_PatientName" name="x_PatientName"<?php echo $view_issuing_semen_list->PatientName->editAttributes() ?>>
			<?php echo $view_issuing_semen_list->PatientName->selectOptionListHtml("x_PatientName") ?>
		</select>
</div>
<?php echo $view_issuing_semen_list->PatientName->Lookup->getParamTag($view_issuing_semen_list, "p_x_PatientName") ?>
</span>
	</div>
	<?php if ($view_issuing_semen_list->SearchColumnCount % $view_issuing_semen_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen_list->HusbandName->Visible) { // HusbandName ?>
	<?php
		$view_issuing_semen_list->SearchColumnCount++;
		if (($view_issuing_semen_list->SearchColumnCount - 1) % $view_issuing_semen_list->SearchFieldsPerRow == 0) {
			$view_issuing_semen_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_issuing_semen_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_HusbandName" class="ew-cell form-group">
		<label for="x_HusbandName" class="ew-search-caption ew-label"><?php echo $view_issuing_semen_list->HusbandName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HusbandName" id="z_HusbandName" value="LIKE">
</span>
		<span id="el_view_issuing_semen_HusbandName" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_HusbandName" data-value-separator="<?php echo $view_issuing_semen_list->HusbandName->displayValueSeparatorAttribute() ?>" id="x_HusbandName" name="x_HusbandName"<?php echo $view_issuing_semen_list->HusbandName->editAttributes() ?>>
			<?php echo $view_issuing_semen_list->HusbandName->selectOptionListHtml("x_HusbandName") ?>
		</select>
</div>
<?php echo $view_issuing_semen_list->HusbandName->Lookup->getParamTag($view_issuing_semen_list, "p_x_HusbandName") ?>
</span>
	</div>
	<?php if ($view_issuing_semen_list->SearchColumnCount % $view_issuing_semen_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen_list->RequestDr->Visible) { // RequestDr ?>
	<?php
		$view_issuing_semen_list->SearchColumnCount++;
		if (($view_issuing_semen_list->SearchColumnCount - 1) % $view_issuing_semen_list->SearchFieldsPerRow == 0) {
			$view_issuing_semen_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_issuing_semen_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_RequestDr" class="ew-cell form-group">
		<label for="x_RequestDr" class="ew-search-caption ew-label"><?php echo $view_issuing_semen_list->RequestDr->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RequestDr" id="z_RequestDr" value="LIKE">
</span>
		<span id="el_view_issuing_semen_RequestDr" class="ew-search-field">
<input type="text" data-table="view_issuing_semen" data-field="x_RequestDr" name="x_RequestDr" id="x_RequestDr" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen_list->RequestDr->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen_list->RequestDr->EditValue ?>"<?php echo $view_issuing_semen_list->RequestDr->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_issuing_semen_list->SearchColumnCount % $view_issuing_semen_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_issuing_semen_list->SearchColumnCount % $view_issuing_semen_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_issuing_semen_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_issuing_semen_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_issuing_semen_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_issuing_semen_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_issuing_semen_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_issuing_semen_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_issuing_semen_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_issuing_semen_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_issuing_semen_list->showPageHeader(); ?>
<?php
$view_issuing_semen_list->showMessage();
?>
<?php if ($view_issuing_semen_list->TotalRecords > 0 || $view_issuing_semen->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_issuing_semen_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_issuing_semen">
<?php if (!$view_issuing_semen_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_issuing_semen_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_issuing_semen_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_issuing_semen_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_issuing_semenlist" id="fview_issuing_semenlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_issuing_semen">
<div id="gmp_view_issuing_semen" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_issuing_semen_list->TotalRecords > 0 || $view_issuing_semen_list->isGridEdit()) { ?>
<table id="tbl_view_issuing_semenlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_issuing_semen->RowType = ROWTYPE_HEADER;

// Render list options
$view_issuing_semen_list->renderListOptions();

// Render list options (header, left)
$view_issuing_semen_list->ListOptions->render("header", "left");
?>
<?php if ($view_issuing_semen_list->id->Visible) { // id ?>
	<?php if ($view_issuing_semen_list->SortUrl($view_issuing_semen_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_issuing_semen_list->id->headerCellClass() ?>"><div id="elh_view_issuing_semen_id" class="view_issuing_semen_id"><div class="ew-table-header-caption"><?php echo $view_issuing_semen_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_issuing_semen_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_issuing_semen_list->SortUrl($view_issuing_semen_list->id) ?>', 1);"><div id="elh_view_issuing_semen_id" class="view_issuing_semen_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_issuing_semen_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen_list->RIDNo->Visible) { // RIDNo ?>
	<?php if ($view_issuing_semen_list->SortUrl($view_issuing_semen_list->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $view_issuing_semen_list->RIDNo->headerCellClass() ?>"><div id="elh_view_issuing_semen_RIDNo" class="view_issuing_semen_RIDNo"><div class="ew-table-header-caption"><?php echo $view_issuing_semen_list->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $view_issuing_semen_list->RIDNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_issuing_semen_list->SortUrl($view_issuing_semen_list->RIDNo) ?>', 1);"><div id="elh_view_issuing_semen_RIDNo" class="view_issuing_semen_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen_list->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen_list->RIDNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_issuing_semen_list->RIDNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_issuing_semen_list->SortUrl($view_issuing_semen_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_issuing_semen_list->PatientName->headerCellClass() ?>"><div id="elh_view_issuing_semen_PatientName" class="view_issuing_semen_PatientName"><div class="ew-table-header-caption"><?php echo $view_issuing_semen_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_issuing_semen_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_issuing_semen_list->SortUrl($view_issuing_semen_list->PatientName) ?>', 1);"><div id="elh_view_issuing_semen_PatientName" class="view_issuing_semen_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen_list->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_issuing_semen_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen_list->HusbandName->Visible) { // HusbandName ?>
	<?php if ($view_issuing_semen_list->SortUrl($view_issuing_semen_list->HusbandName) == "") { ?>
		<th data-name="HusbandName" class="<?php echo $view_issuing_semen_list->HusbandName->headerCellClass() ?>"><div id="elh_view_issuing_semen_HusbandName" class="view_issuing_semen_HusbandName"><div class="ew-table-header-caption"><?php echo $view_issuing_semen_list->HusbandName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandName" class="<?php echo $view_issuing_semen_list->HusbandName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_issuing_semen_list->SortUrl($view_issuing_semen_list->HusbandName) ?>', 1);"><div id="elh_view_issuing_semen_HusbandName" class="view_issuing_semen_HusbandName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen_list->HusbandName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen_list->HusbandName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_issuing_semen_list->HusbandName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen_list->RequestDr->Visible) { // RequestDr ?>
	<?php if ($view_issuing_semen_list->SortUrl($view_issuing_semen_list->RequestDr) == "") { ?>
		<th data-name="RequestDr" class="<?php echo $view_issuing_semen_list->RequestDr->headerCellClass() ?>"><div id="elh_view_issuing_semen_RequestDr" class="view_issuing_semen_RequestDr"><div class="ew-table-header-caption"><?php echo $view_issuing_semen_list->RequestDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestDr" class="<?php echo $view_issuing_semen_list->RequestDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_issuing_semen_list->SortUrl($view_issuing_semen_list->RequestDr) ?>', 1);"><div id="elh_view_issuing_semen_RequestDr" class="view_issuing_semen_RequestDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen_list->RequestDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen_list->RequestDr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_issuing_semen_list->RequestDr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen_list->CollectionDate->Visible) { // CollectionDate ?>
	<?php if ($view_issuing_semen_list->SortUrl($view_issuing_semen_list->CollectionDate) == "") { ?>
		<th data-name="CollectionDate" class="<?php echo $view_issuing_semen_list->CollectionDate->headerCellClass() ?>"><div id="elh_view_issuing_semen_CollectionDate" class="view_issuing_semen_CollectionDate"><div class="ew-table-header-caption"><?php echo $view_issuing_semen_list->CollectionDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollectionDate" class="<?php echo $view_issuing_semen_list->CollectionDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_issuing_semen_list->SortUrl($view_issuing_semen_list->CollectionDate) ?>', 1);"><div id="elh_view_issuing_semen_CollectionDate" class="view_issuing_semen_CollectionDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen_list->CollectionDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen_list->CollectionDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_issuing_semen_list->CollectionDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen_list->Tank->Visible) { // Tank ?>
	<?php if ($view_issuing_semen_list->SortUrl($view_issuing_semen_list->Tank) == "") { ?>
		<th data-name="Tank" class="<?php echo $view_issuing_semen_list->Tank->headerCellClass() ?>"><div id="elh_view_issuing_semen_Tank" class="view_issuing_semen_Tank"><div class="ew-table-header-caption"><?php echo $view_issuing_semen_list->Tank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tank" class="<?php echo $view_issuing_semen_list->Tank->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_issuing_semen_list->SortUrl($view_issuing_semen_list->Tank) ?>', 1);"><div id="elh_view_issuing_semen_Tank" class="view_issuing_semen_Tank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen_list->Tank->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen_list->Tank->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_issuing_semen_list->Tank->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen_list->Location->Visible) { // Location ?>
	<?php if ($view_issuing_semen_list->SortUrl($view_issuing_semen_list->Location) == "") { ?>
		<th data-name="Location" class="<?php echo $view_issuing_semen_list->Location->headerCellClass() ?>"><div id="elh_view_issuing_semen_Location" class="view_issuing_semen_Location"><div class="ew-table-header-caption"><?php echo $view_issuing_semen_list->Location->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Location" class="<?php echo $view_issuing_semen_list->Location->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_issuing_semen_list->SortUrl($view_issuing_semen_list->Location) ?>', 1);"><div id="elh_view_issuing_semen_Location" class="view_issuing_semen_Location">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen_list->Location->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen_list->Location->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_issuing_semen_list->Location->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen_list->IssuedBy->Visible) { // IssuedBy ?>
	<?php if ($view_issuing_semen_list->SortUrl($view_issuing_semen_list->IssuedBy) == "") { ?>
		<th data-name="IssuedBy" class="<?php echo $view_issuing_semen_list->IssuedBy->headerCellClass() ?>"><div id="elh_view_issuing_semen_IssuedBy" class="view_issuing_semen_IssuedBy"><div class="ew-table-header-caption"><?php echo $view_issuing_semen_list->IssuedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IssuedBy" class="<?php echo $view_issuing_semen_list->IssuedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_issuing_semen_list->SortUrl($view_issuing_semen_list->IssuedBy) ?>', 1);"><div id="elh_view_issuing_semen_IssuedBy" class="view_issuing_semen_IssuedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen_list->IssuedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen_list->IssuedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_issuing_semen_list->IssuedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen_list->IssuedTo->Visible) { // IssuedTo ?>
	<?php if ($view_issuing_semen_list->SortUrl($view_issuing_semen_list->IssuedTo) == "") { ?>
		<th data-name="IssuedTo" class="<?php echo $view_issuing_semen_list->IssuedTo->headerCellClass() ?>"><div id="elh_view_issuing_semen_IssuedTo" class="view_issuing_semen_IssuedTo"><div class="ew-table-header-caption"><?php echo $view_issuing_semen_list->IssuedTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IssuedTo" class="<?php echo $view_issuing_semen_list->IssuedTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_issuing_semen_list->SortUrl($view_issuing_semen_list->IssuedTo) ?>', 1);"><div id="elh_view_issuing_semen_IssuedTo" class="view_issuing_semen_IssuedTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen_list->IssuedTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen_list->IssuedTo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_issuing_semen_list->IssuedTo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen_list->RequestSample->Visible) { // RequestSample ?>
	<?php if ($view_issuing_semen_list->SortUrl($view_issuing_semen_list->RequestSample) == "") { ?>
		<th data-name="RequestSample" class="<?php echo $view_issuing_semen_list->RequestSample->headerCellClass() ?>"><div id="elh_view_issuing_semen_RequestSample" class="view_issuing_semen_RequestSample"><div class="ew-table-header-caption"><?php echo $view_issuing_semen_list->RequestSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestSample" class="<?php echo $view_issuing_semen_list->RequestSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_issuing_semen_list->SortUrl($view_issuing_semen_list->RequestSample) ?>', 1);"><div id="elh_view_issuing_semen_RequestSample" class="view_issuing_semen_RequestSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen_list->RequestSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen_list->RequestSample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_issuing_semen_list->RequestSample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_issuing_semen_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_issuing_semen_list->ExportAll && $view_issuing_semen_list->isExport()) {
	$view_issuing_semen_list->StopRecord = $view_issuing_semen_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_issuing_semen_list->TotalRecords > $view_issuing_semen_list->StartRecord + $view_issuing_semen_list->DisplayRecords - 1)
		$view_issuing_semen_list->StopRecord = $view_issuing_semen_list->StartRecord + $view_issuing_semen_list->DisplayRecords - 1;
	else
		$view_issuing_semen_list->StopRecord = $view_issuing_semen_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($view_issuing_semen->isConfirm() || $view_issuing_semen_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_issuing_semen_list->FormKeyCountName) && ($view_issuing_semen_list->isGridAdd() || $view_issuing_semen_list->isGridEdit() || $view_issuing_semen->isConfirm())) {
		$view_issuing_semen_list->KeyCount = $CurrentForm->getValue($view_issuing_semen_list->FormKeyCountName);
		$view_issuing_semen_list->StopRecord = $view_issuing_semen_list->StartRecord + $view_issuing_semen_list->KeyCount - 1;
	}
}
$view_issuing_semen_list->RecordCount = $view_issuing_semen_list->StartRecord - 1;
if ($view_issuing_semen_list->Recordset && !$view_issuing_semen_list->Recordset->EOF) {
	$view_issuing_semen_list->Recordset->moveFirst();
	$selectLimit = $view_issuing_semen_list->UseSelectLimit;
	if (!$selectLimit && $view_issuing_semen_list->StartRecord > 1)
		$view_issuing_semen_list->Recordset->move($view_issuing_semen_list->StartRecord - 1);
} elseif (!$view_issuing_semen->AllowAddDeleteRow && $view_issuing_semen_list->StopRecord == 0) {
	$view_issuing_semen_list->StopRecord = $view_issuing_semen->GridAddRowCount;
}

// Initialize aggregate
$view_issuing_semen->RowType = ROWTYPE_AGGREGATEINIT;
$view_issuing_semen->resetAttributes();
$view_issuing_semen_list->renderRow();
$view_issuing_semen_list->EditRowCount = 0;
if ($view_issuing_semen_list->isEdit())
	$view_issuing_semen_list->RowIndex = 1;
if ($view_issuing_semen_list->isGridEdit())
	$view_issuing_semen_list->RowIndex = 0;
while ($view_issuing_semen_list->RecordCount < $view_issuing_semen_list->StopRecord) {
	$view_issuing_semen_list->RecordCount++;
	if ($view_issuing_semen_list->RecordCount >= $view_issuing_semen_list->StartRecord) {
		$view_issuing_semen_list->RowCount++;
		if ($view_issuing_semen_list->isGridAdd() || $view_issuing_semen_list->isGridEdit() || $view_issuing_semen->isConfirm()) {
			$view_issuing_semen_list->RowIndex++;
			$CurrentForm->Index = $view_issuing_semen_list->RowIndex;
			if ($CurrentForm->hasValue($view_issuing_semen_list->FormActionName) && ($view_issuing_semen->isConfirm() || $view_issuing_semen_list->EventCancelled))
				$view_issuing_semen_list->RowAction = strval($CurrentForm->getValue($view_issuing_semen_list->FormActionName));
			elseif ($view_issuing_semen_list->isGridAdd())
				$view_issuing_semen_list->RowAction = "insert";
			else
				$view_issuing_semen_list->RowAction = "";
		}

		// Set up key count
		$view_issuing_semen_list->KeyCount = $view_issuing_semen_list->RowIndex;

		// Init row class and style
		$view_issuing_semen->resetAttributes();
		$view_issuing_semen->CssClass = "";
		if ($view_issuing_semen_list->isGridAdd()) {
			$view_issuing_semen_list->loadRowValues(); // Load default values
		} else {
			$view_issuing_semen_list->loadRowValues($view_issuing_semen_list->Recordset); // Load row values
		}
		$view_issuing_semen->RowType = ROWTYPE_VIEW; // Render view
		if ($view_issuing_semen_list->isEdit()) {
			if ($view_issuing_semen_list->checkInlineEditKey() && $view_issuing_semen_list->EditRowCount == 0) { // Inline edit
				$view_issuing_semen->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($view_issuing_semen_list->isGridEdit()) { // Grid edit
			if ($view_issuing_semen->EventCancelled)
				$view_issuing_semen_list->restoreCurrentRowFormValues($view_issuing_semen_list->RowIndex); // Restore form values
			if ($view_issuing_semen_list->RowAction == "insert")
				$view_issuing_semen->RowType = ROWTYPE_ADD; // Render add
			else
				$view_issuing_semen->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_issuing_semen_list->isEdit() && $view_issuing_semen->RowType == ROWTYPE_EDIT && $view_issuing_semen->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$view_issuing_semen_list->restoreFormValues(); // Restore form values
		}
		if ($view_issuing_semen_list->isGridEdit() && ($view_issuing_semen->RowType == ROWTYPE_EDIT || $view_issuing_semen->RowType == ROWTYPE_ADD) && $view_issuing_semen->EventCancelled) // Update failed
			$view_issuing_semen_list->restoreCurrentRowFormValues($view_issuing_semen_list->RowIndex); // Restore form values
		if ($view_issuing_semen->RowType == ROWTYPE_EDIT) // Edit row
			$view_issuing_semen_list->EditRowCount++;

		// Set up row id / data-rowindex
		$view_issuing_semen->RowAttrs->merge(["data-rowindex" => $view_issuing_semen_list->RowCount, "id" => "r" . $view_issuing_semen_list->RowCount . "_view_issuing_semen", "data-rowtype" => $view_issuing_semen->RowType]);

		// Render row
		$view_issuing_semen_list->renderRow();

		// Render list options
		$view_issuing_semen_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_issuing_semen_list->RowAction != "delete" && $view_issuing_semen_list->RowAction != "insertdelete" && !($view_issuing_semen_list->RowAction == "insert" && $view_issuing_semen->isConfirm() && $view_issuing_semen_list->emptyRow())) {
?>
	<tr <?php echo $view_issuing_semen->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_issuing_semen_list->ListOptions->render("body", "left", $view_issuing_semen_list->RowCount);
?>
	<?php if ($view_issuing_semen_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_issuing_semen_list->id->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_id" class="form-group"></span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_id" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_id" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_issuing_semen_list->id->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_id" class="form-group">
<span<?php echo $view_issuing_semen_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_issuing_semen_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_id" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_id" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_issuing_semen_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_id">
<span<?php echo $view_issuing_semen_list->id->viewAttributes() ?>><?php echo $view_issuing_semen_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo" <?php echo $view_issuing_semen_list->RIDNo->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_RIDNo" class="form-group">
<input type="text" data-table="view_issuing_semen" data-field="x_RIDNo" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($view_issuing_semen_list->RIDNo->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen_list->RIDNo->EditValue ?>"<?php echo $view_issuing_semen_list->RIDNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RIDNo" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($view_issuing_semen_list->RIDNo->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_RIDNo" class="form-group">
<span<?php echo $view_issuing_semen_list->RIDNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_issuing_semen_list->RIDNo->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RIDNo" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($view_issuing_semen_list->RIDNo->CurrentValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_RIDNo">
<span<?php echo $view_issuing_semen_list->RIDNo->viewAttributes() ?>><?php echo $view_issuing_semen_list->RIDNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_issuing_semen_list->PatientName->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_PatientName" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_PatientName" data-value-separator="<?php echo $view_issuing_semen_list->PatientName->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName"<?php echo $view_issuing_semen_list->PatientName->editAttributes() ?>>
			<?php echo $view_issuing_semen_list->PatientName->selectOptionListHtml("x{$view_issuing_semen_list->RowIndex}_PatientName") ?>
		</select>
</div>
<?php echo $view_issuing_semen_list->PatientName->Lookup->getParamTag($view_issuing_semen_list, "p_x" . $view_issuing_semen_list->RowIndex . "_PatientName") ?>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_PatientName" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_issuing_semen_list->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_PatientName" class="form-group">
<span<?php echo $view_issuing_semen_list->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_issuing_semen_list->PatientName->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_PatientName" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_issuing_semen_list->PatientName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_PatientName">
<span<?php echo $view_issuing_semen_list->PatientName->viewAttributes() ?>><?php echo $view_issuing_semen_list->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->HusbandName->Visible) { // HusbandName ?>
		<td data-name="HusbandName" <?php echo $view_issuing_semen_list->HusbandName->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_HusbandName" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_HusbandName" data-value-separator="<?php echo $view_issuing_semen_list->HusbandName->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName"<?php echo $view_issuing_semen_list->HusbandName->editAttributes() ?>>
			<?php echo $view_issuing_semen_list->HusbandName->selectOptionListHtml("x{$view_issuing_semen_list->RowIndex}_HusbandName") ?>
		</select>
</div>
<?php echo $view_issuing_semen_list->HusbandName->Lookup->getParamTag($view_issuing_semen_list, "p_x" . $view_issuing_semen_list->RowIndex . "_HusbandName") ?>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_HusbandName" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($view_issuing_semen_list->HusbandName->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_HusbandName" class="form-group">
<span<?php echo $view_issuing_semen_list->HusbandName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_issuing_semen_list->HusbandName->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_HusbandName" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($view_issuing_semen_list->HusbandName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_HusbandName">
<span<?php echo $view_issuing_semen_list->HusbandName->viewAttributes() ?>><?php echo $view_issuing_semen_list->HusbandName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->RequestDr->Visible) { // RequestDr ?>
		<td data-name="RequestDr" <?php echo $view_issuing_semen_list->RequestDr->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_RequestDr" class="form-group">
<input type="text" data-table="view_issuing_semen" data-field="x_RequestDr" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen_list->RequestDr->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen_list->RequestDr->EditValue ?>"<?php echo $view_issuing_semen_list->RequestDr->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RequestDr" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($view_issuing_semen_list->RequestDr->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_RequestDr" class="form-group">
<span<?php echo $view_issuing_semen_list->RequestDr->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_issuing_semen_list->RequestDr->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RequestDr" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($view_issuing_semen_list->RequestDr->CurrentValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_RequestDr">
<span<?php echo $view_issuing_semen_list->RequestDr->viewAttributes() ?>><?php echo $view_issuing_semen_list->RequestDr->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->CollectionDate->Visible) { // CollectionDate ?>
		<td data-name="CollectionDate" <?php echo $view_issuing_semen_list->CollectionDate->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_CollectionDate" class="form-group">
<input type="text" data-table="view_issuing_semen" data-field="x_CollectionDate" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" placeholder="<?php echo HtmlEncode($view_issuing_semen_list->CollectionDate->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen_list->CollectionDate->EditValue ?>"<?php echo $view_issuing_semen_list->CollectionDate->editAttributes() ?>>
<?php if (!$view_issuing_semen_list->CollectionDate->ReadOnly && !$view_issuing_semen_list->CollectionDate->Disabled && !isset($view_issuing_semen_list->CollectionDate->EditAttrs["readonly"]) && !isset($view_issuing_semen_list->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_issuing_semenlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_issuing_semenlist", "x<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_CollectionDate" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($view_issuing_semen_list->CollectionDate->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_CollectionDate" class="form-group">
<span<?php echo $view_issuing_semen_list->CollectionDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_issuing_semen_list->CollectionDate->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_CollectionDate" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($view_issuing_semen_list->CollectionDate->CurrentValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_CollectionDate">
<span<?php echo $view_issuing_semen_list->CollectionDate->viewAttributes() ?>><?php echo $view_issuing_semen_list->CollectionDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->Tank->Visible) { // Tank ?>
		<td data-name="Tank" <?php echo $view_issuing_semen_list->Tank->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_Tank" class="form-group">
<input type="text" data-table="view_issuing_semen" data-field="x_Tank" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen_list->Tank->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen_list->Tank->EditValue ?>"<?php echo $view_issuing_semen_list->Tank->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_Tank" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" value="<?php echo HtmlEncode($view_issuing_semen_list->Tank->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_Tank" class="form-group">
<span<?php echo $view_issuing_semen_list->Tank->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_issuing_semen_list->Tank->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_Tank" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" value="<?php echo HtmlEncode($view_issuing_semen_list->Tank->CurrentValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_Tank">
<span<?php echo $view_issuing_semen_list->Tank->viewAttributes() ?>><?php echo $view_issuing_semen_list->Tank->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->Location->Visible) { // Location ?>
		<td data-name="Location" <?php echo $view_issuing_semen_list->Location->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_Location" class="form-group">
<input type="text" data-table="view_issuing_semen" data-field="x_Location" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_Location" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_Location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen_list->Location->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen_list->Location->EditValue ?>"<?php echo $view_issuing_semen_list->Location->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_Location" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_Location" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_Location" value="<?php echo HtmlEncode($view_issuing_semen_list->Location->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_Location" class="form-group">
<span<?php echo $view_issuing_semen_list->Location->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_issuing_semen_list->Location->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_Location" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_Location" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_Location" value="<?php echo HtmlEncode($view_issuing_semen_list->Location->CurrentValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_Location">
<span<?php echo $view_issuing_semen_list->Location->viewAttributes() ?>><?php echo $view_issuing_semen_list->Location->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->IssuedBy->Visible) { // IssuedBy ?>
		<td data-name="IssuedBy" <?php echo $view_issuing_semen_list->IssuedBy->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_IssuedBy" class="form-group">
<input type="text" data-table="view_issuing_semen" data-field="x_IssuedBy" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen_list->IssuedBy->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen_list->IssuedBy->EditValue ?>"<?php echo $view_issuing_semen_list->IssuedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_IssuedBy" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" value="<?php echo HtmlEncode($view_issuing_semen_list->IssuedBy->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_IssuedBy" class="form-group">
<input type="text" data-table="view_issuing_semen" data-field="x_IssuedBy" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen_list->IssuedBy->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen_list->IssuedBy->EditValue ?>"<?php echo $view_issuing_semen_list->IssuedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_IssuedBy">
<span<?php echo $view_issuing_semen_list->IssuedBy->viewAttributes() ?>><?php echo $view_issuing_semen_list->IssuedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->IssuedTo->Visible) { // IssuedTo ?>
		<td data-name="IssuedTo" <?php echo $view_issuing_semen_list->IssuedTo->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_IssuedTo" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_IssuedTo" data-value-separator="<?php echo $view_issuing_semen_list->IssuedTo->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo"<?php echo $view_issuing_semen_list->IssuedTo->editAttributes() ?>>
			<?php echo $view_issuing_semen_list->IssuedTo->selectOptionListHtml("x{$view_issuing_semen_list->RowIndex}_IssuedTo") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_IssuedTo" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo" value="<?php echo HtmlEncode($view_issuing_semen_list->IssuedTo->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_IssuedTo" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_IssuedTo" data-value-separator="<?php echo $view_issuing_semen_list->IssuedTo->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo"<?php echo $view_issuing_semen_list->IssuedTo->editAttributes() ?>>
			<?php echo $view_issuing_semen_list->IssuedTo->selectOptionListHtml("x{$view_issuing_semen_list->RowIndex}_IssuedTo") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_IssuedTo">
<span<?php echo $view_issuing_semen_list->IssuedTo->viewAttributes() ?>><?php echo $view_issuing_semen_list->IssuedTo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->RequestSample->Visible) { // RequestSample ?>
		<td data-name="RequestSample" <?php echo $view_issuing_semen_list->RequestSample->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_RequestSample" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_RequestSample" data-value-separator="<?php echo $view_issuing_semen_list->RequestSample->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample"<?php echo $view_issuing_semen_list->RequestSample->editAttributes() ?>>
			<?php echo $view_issuing_semen_list->RequestSample->selectOptionListHtml("x{$view_issuing_semen_list->RowIndex}_RequestSample") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RequestSample" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($view_issuing_semen_list->RequestSample->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_RequestSample" class="form-group">
<span<?php echo $view_issuing_semen_list->RequestSample->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_issuing_semen_list->RequestSample->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RequestSample" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($view_issuing_semen_list->RequestSample->CurrentValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCount ?>_view_issuing_semen_RequestSample">
<span<?php echo $view_issuing_semen_list->RequestSample->viewAttributes() ?>><?php echo $view_issuing_semen_list->RequestSample->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_issuing_semen_list->ListOptions->render("body", "right", $view_issuing_semen_list->RowCount);
?>
	</tr>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD || $view_issuing_semen->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_issuing_semenlist", "load"], function() {
	fview_issuing_semenlist.updateLists(<?php echo $view_issuing_semen_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_issuing_semen_list->isGridAdd())
		if (!$view_issuing_semen_list->Recordset->EOF)
			$view_issuing_semen_list->Recordset->moveNext();
}
?>
<?php
	if ($view_issuing_semen_list->isGridAdd() || $view_issuing_semen_list->isGridEdit()) {
		$view_issuing_semen_list->RowIndex = '$rowindex$';
		$view_issuing_semen_list->loadRowValues();

		// Set row properties
		$view_issuing_semen->resetAttributes();
		$view_issuing_semen->RowAttrs->merge(["data-rowindex" => $view_issuing_semen_list->RowIndex, "id" => "r0_view_issuing_semen", "data-rowtype" => ROWTYPE_ADD]);
		$view_issuing_semen->RowAttrs->appendClass("ew-template");
		$view_issuing_semen->RowType = ROWTYPE_ADD;

		// Render row
		$view_issuing_semen_list->renderRow();

		// Render list options
		$view_issuing_semen_list->renderListOptions();
		$view_issuing_semen_list->StartRowCount = 0;
?>
	<tr <?php echo $view_issuing_semen->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_issuing_semen_list->ListOptions->render("body", "left", $view_issuing_semen_list->RowIndex);
?>
	<?php if ($view_issuing_semen_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_view_issuing_semen_id" class="form-group view_issuing_semen_id"></span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_id" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_id" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_issuing_semen_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo">
<span id="el$rowindex$_view_issuing_semen_RIDNo" class="form-group view_issuing_semen_RIDNo">
<input type="text" data-table="view_issuing_semen" data-field="x_RIDNo" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($view_issuing_semen_list->RIDNo->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen_list->RIDNo->EditValue ?>"<?php echo $view_issuing_semen_list->RIDNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RIDNo" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($view_issuing_semen_list->RIDNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<span id="el$rowindex$_view_issuing_semen_PatientName" class="form-group view_issuing_semen_PatientName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_PatientName" data-value-separator="<?php echo $view_issuing_semen_list->PatientName->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName"<?php echo $view_issuing_semen_list->PatientName->editAttributes() ?>>
			<?php echo $view_issuing_semen_list->PatientName->selectOptionListHtml("x{$view_issuing_semen_list->RowIndex}_PatientName") ?>
		</select>
</div>
<?php echo $view_issuing_semen_list->PatientName->Lookup->getParamTag($view_issuing_semen_list, "p_x" . $view_issuing_semen_list->RowIndex . "_PatientName") ?>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_PatientName" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_issuing_semen_list->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->HusbandName->Visible) { // HusbandName ?>
		<td data-name="HusbandName">
<span id="el$rowindex$_view_issuing_semen_HusbandName" class="form-group view_issuing_semen_HusbandName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_HusbandName" data-value-separator="<?php echo $view_issuing_semen_list->HusbandName->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName"<?php echo $view_issuing_semen_list->HusbandName->editAttributes() ?>>
			<?php echo $view_issuing_semen_list->HusbandName->selectOptionListHtml("x{$view_issuing_semen_list->RowIndex}_HusbandName") ?>
		</select>
</div>
<?php echo $view_issuing_semen_list->HusbandName->Lookup->getParamTag($view_issuing_semen_list, "p_x" . $view_issuing_semen_list->RowIndex . "_HusbandName") ?>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_HusbandName" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($view_issuing_semen_list->HusbandName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->RequestDr->Visible) { // RequestDr ?>
		<td data-name="RequestDr">
<span id="el$rowindex$_view_issuing_semen_RequestDr" class="form-group view_issuing_semen_RequestDr">
<input type="text" data-table="view_issuing_semen" data-field="x_RequestDr" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen_list->RequestDr->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen_list->RequestDr->EditValue ?>"<?php echo $view_issuing_semen_list->RequestDr->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RequestDr" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($view_issuing_semen_list->RequestDr->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->CollectionDate->Visible) { // CollectionDate ?>
		<td data-name="CollectionDate">
<span id="el$rowindex$_view_issuing_semen_CollectionDate" class="form-group view_issuing_semen_CollectionDate">
<input type="text" data-table="view_issuing_semen" data-field="x_CollectionDate" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" placeholder="<?php echo HtmlEncode($view_issuing_semen_list->CollectionDate->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen_list->CollectionDate->EditValue ?>"<?php echo $view_issuing_semen_list->CollectionDate->editAttributes() ?>>
<?php if (!$view_issuing_semen_list->CollectionDate->ReadOnly && !$view_issuing_semen_list->CollectionDate->Disabled && !isset($view_issuing_semen_list->CollectionDate->EditAttrs["readonly"]) && !isset($view_issuing_semen_list->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_issuing_semenlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_issuing_semenlist", "x<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_CollectionDate" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($view_issuing_semen_list->CollectionDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->Tank->Visible) { // Tank ?>
		<td data-name="Tank">
<span id="el$rowindex$_view_issuing_semen_Tank" class="form-group view_issuing_semen_Tank">
<input type="text" data-table="view_issuing_semen" data-field="x_Tank" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen_list->Tank->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen_list->Tank->EditValue ?>"<?php echo $view_issuing_semen_list->Tank->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_Tank" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" value="<?php echo HtmlEncode($view_issuing_semen_list->Tank->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->Location->Visible) { // Location ?>
		<td data-name="Location">
<span id="el$rowindex$_view_issuing_semen_Location" class="form-group view_issuing_semen_Location">
<input type="text" data-table="view_issuing_semen" data-field="x_Location" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_Location" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_Location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen_list->Location->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen_list->Location->EditValue ?>"<?php echo $view_issuing_semen_list->Location->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_Location" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_Location" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_Location" value="<?php echo HtmlEncode($view_issuing_semen_list->Location->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->IssuedBy->Visible) { // IssuedBy ?>
		<td data-name="IssuedBy">
<span id="el$rowindex$_view_issuing_semen_IssuedBy" class="form-group view_issuing_semen_IssuedBy">
<input type="text" data-table="view_issuing_semen" data-field="x_IssuedBy" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen_list->IssuedBy->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen_list->IssuedBy->EditValue ?>"<?php echo $view_issuing_semen_list->IssuedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_IssuedBy" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" value="<?php echo HtmlEncode($view_issuing_semen_list->IssuedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->IssuedTo->Visible) { // IssuedTo ?>
		<td data-name="IssuedTo">
<span id="el$rowindex$_view_issuing_semen_IssuedTo" class="form-group view_issuing_semen_IssuedTo">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_IssuedTo" data-value-separator="<?php echo $view_issuing_semen_list->IssuedTo->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo"<?php echo $view_issuing_semen_list->IssuedTo->editAttributes() ?>>
			<?php echo $view_issuing_semen_list->IssuedTo->selectOptionListHtml("x{$view_issuing_semen_list->RowIndex}_IssuedTo") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_IssuedTo" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo" value="<?php echo HtmlEncode($view_issuing_semen_list->IssuedTo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen_list->RequestSample->Visible) { // RequestSample ?>
		<td data-name="RequestSample">
<span id="el$rowindex$_view_issuing_semen_RequestSample" class="form-group view_issuing_semen_RequestSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_RequestSample" data-value-separator="<?php echo $view_issuing_semen_list->RequestSample->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample"<?php echo $view_issuing_semen_list->RequestSample->editAttributes() ?>>
			<?php echo $view_issuing_semen_list->RequestSample->selectOptionListHtml("x{$view_issuing_semen_list->RowIndex}_RequestSample") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RequestSample" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($view_issuing_semen_list->RequestSample->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_issuing_semen_list->ListOptions->render("body", "right", $view_issuing_semen_list->RowIndex);
?>
<script>
loadjs.ready(["fview_issuing_semenlist", "load"], function() {
	fview_issuing_semenlist.updateLists(<?php echo $view_issuing_semen_list->RowIndex ?>);
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
<?php if ($view_issuing_semen_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $view_issuing_semen_list->FormKeyCountName ?>" id="<?php echo $view_issuing_semen_list->FormKeyCountName ?>" value="<?php echo $view_issuing_semen_list->KeyCount ?>">
<?php } ?>
<?php if ($view_issuing_semen_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_issuing_semen_list->FormKeyCountName ?>" id="<?php echo $view_issuing_semen_list->FormKeyCountName ?>" value="<?php echo $view_issuing_semen_list->KeyCount ?>">
<?php echo $view_issuing_semen_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_issuing_semen->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_issuing_semen_list->Recordset)
	$view_issuing_semen_list->Recordset->Close();
?>
<?php if (!$view_issuing_semen_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_issuing_semen_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_issuing_semen_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_issuing_semen_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_issuing_semen_list->TotalRecords == 0 && !$view_issuing_semen->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_issuing_semen_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_issuing_semen_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_issuing_semen_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_issuing_semen->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_issuing_semen",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_issuing_semen_list->terminate();
?>