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
$mas_activity_card_list = new mas_activity_card_list();

// Run the page
$mas_activity_card_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_activity_card_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_activity_card_list->isExport()) { ?>
<script>
var fmas_activity_cardlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmas_activity_cardlist = currentForm = new ew.Form("fmas_activity_cardlist", "list");
	fmas_activity_cardlist.formKeyCountName = '<?php echo $mas_activity_card_list->FormKeyCountName ?>';

	// Validate form
	fmas_activity_cardlist.validate = function() {
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
			<?php if ($mas_activity_card_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card_list->id->caption(), $mas_activity_card_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_activity_card_list->Activity->Required) { ?>
				elm = this.getElements("x" + infix + "_Activity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card_list->Activity->caption(), $mas_activity_card_list->Activity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_activity_card_list->Type->Required) { ?>
				elm = this.getElements("x" + infix + "_Type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card_list->Type->caption(), $mas_activity_card_list->Type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_activity_card_list->Units->Required) { ?>
				elm = this.getElements("x" + infix + "_Units");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card_list->Units->caption(), $mas_activity_card_list->Units->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_activity_card_list->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card_list->Amount->caption(), $mas_activity_card_list->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_activity_card_list->Amount->errorMessage()) ?>");
			<?php if ($mas_activity_card_list->Selected->Required) { ?>
				elm = this.getElements("x" + infix + "_Selected[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card_list->Selected->caption(), $mas_activity_card_list->Selected->RequiredErrorMessage)) ?>");
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
	fmas_activity_cardlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Activity", false)) return false;
		if (ew.valueChanged(fobj, infix, "Type", false)) return false;
		if (ew.valueChanged(fobj, infix, "Units", false)) return false;
		if (ew.valueChanged(fobj, infix, "Amount", false)) return false;
		if (ew.valueChanged(fobj, infix, "Selected[]", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fmas_activity_cardlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_activity_cardlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmas_activity_cardlist.lists["x_Selected[]"] = <?php echo $mas_activity_card_list->Selected->Lookup->toClientList($mas_activity_card_list) ?>;
	fmas_activity_cardlist.lists["x_Selected[]"].options = <?php echo JsonEncode($mas_activity_card_list->Selected->options(FALSE, TRUE)) ?>;
	loadjs.done("fmas_activity_cardlist");
});
var fmas_activity_cardlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmas_activity_cardlistsrch = currentSearchForm = new ew.Form("fmas_activity_cardlistsrch");

	// Dynamic selection lists
	// Filters

	fmas_activity_cardlistsrch.filterList = <?php echo $mas_activity_card_list->getFilterList() ?>;
	loadjs.done("fmas_activity_cardlistsrch");
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
<?php if (!$mas_activity_card_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_activity_card_list->TotalRecords > 0 && $mas_activity_card_list->ExportOptions->visible()) { ?>
<?php $mas_activity_card_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_activity_card_list->ImportOptions->visible()) { ?>
<?php $mas_activity_card_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_activity_card_list->SearchOptions->visible()) { ?>
<?php $mas_activity_card_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_activity_card_list->FilterOptions->visible()) { ?>
<?php $mas_activity_card_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_activity_card_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_activity_card_list->isExport() && !$mas_activity_card->CurrentAction) { ?>
<form name="fmas_activity_cardlistsrch" id="fmas_activity_cardlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmas_activity_cardlistsrch-search-panel" class="<?php echo $mas_activity_card_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_activity_card">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $mas_activity_card_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($mas_activity_card_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($mas_activity_card_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_activity_card_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_activity_card_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_activity_card_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_activity_card_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_activity_card_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $mas_activity_card_list->showPageHeader(); ?>
<?php
$mas_activity_card_list->showMessage();
?>
<?php if ($mas_activity_card_list->TotalRecords > 0 || $mas_activity_card->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_activity_card_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_activity_card">
<?php if (!$mas_activity_card_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_activity_card_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_activity_card_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_activity_card_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_activity_cardlist" id="fmas_activity_cardlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_activity_card">
<div id="gmp_mas_activity_card" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($mas_activity_card_list->TotalRecords > 0 || $mas_activity_card_list->isAdd() || $mas_activity_card_list->isCopy() || $mas_activity_card_list->isGridEdit()) { ?>
<table id="tbl_mas_activity_cardlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_activity_card->RowType = ROWTYPE_HEADER;

// Render list options
$mas_activity_card_list->renderListOptions();

// Render list options (header, left)
$mas_activity_card_list->ListOptions->render("header", "left");
?>
<?php if ($mas_activity_card_list->id->Visible) { // id ?>
	<?php if ($mas_activity_card_list->SortUrl($mas_activity_card_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_activity_card_list->id->headerCellClass() ?>"><div id="elh_mas_activity_card_id" class="mas_activity_card_id"><div class="ew-table-header-caption"><?php echo $mas_activity_card_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_activity_card_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_activity_card_list->SortUrl($mas_activity_card_list->id) ?>', 1);"><div id="elh_mas_activity_card_id" class="mas_activity_card_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_activity_card_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_activity_card_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_activity_card_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_activity_card_list->Activity->Visible) { // Activity ?>
	<?php if ($mas_activity_card_list->SortUrl($mas_activity_card_list->Activity) == "") { ?>
		<th data-name="Activity" class="<?php echo $mas_activity_card_list->Activity->headerCellClass() ?>"><div id="elh_mas_activity_card_Activity" class="mas_activity_card_Activity"><div class="ew-table-header-caption"><?php echo $mas_activity_card_list->Activity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Activity" class="<?php echo $mas_activity_card_list->Activity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_activity_card_list->SortUrl($mas_activity_card_list->Activity) ?>', 1);"><div id="elh_mas_activity_card_Activity" class="mas_activity_card_Activity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_activity_card_list->Activity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_activity_card_list->Activity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_activity_card_list->Activity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_activity_card_list->Type->Visible) { // Type ?>
	<?php if ($mas_activity_card_list->SortUrl($mas_activity_card_list->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $mas_activity_card_list->Type->headerCellClass() ?>"><div id="elh_mas_activity_card_Type" class="mas_activity_card_Type"><div class="ew-table-header-caption"><?php echo $mas_activity_card_list->Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $mas_activity_card_list->Type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_activity_card_list->SortUrl($mas_activity_card_list->Type) ?>', 1);"><div id="elh_mas_activity_card_Type" class="mas_activity_card_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_activity_card_list->Type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_activity_card_list->Type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_activity_card_list->Type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_activity_card_list->Units->Visible) { // Units ?>
	<?php if ($mas_activity_card_list->SortUrl($mas_activity_card_list->Units) == "") { ?>
		<th data-name="Units" class="<?php echo $mas_activity_card_list->Units->headerCellClass() ?>"><div id="elh_mas_activity_card_Units" class="mas_activity_card_Units"><div class="ew-table-header-caption"><?php echo $mas_activity_card_list->Units->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Units" class="<?php echo $mas_activity_card_list->Units->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_activity_card_list->SortUrl($mas_activity_card_list->Units) ?>', 1);"><div id="elh_mas_activity_card_Units" class="mas_activity_card_Units">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_activity_card_list->Units->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_activity_card_list->Units->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_activity_card_list->Units->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_activity_card_list->Amount->Visible) { // Amount ?>
	<?php if ($mas_activity_card_list->SortUrl($mas_activity_card_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $mas_activity_card_list->Amount->headerCellClass() ?>"><div id="elh_mas_activity_card_Amount" class="mas_activity_card_Amount"><div class="ew-table-header-caption"><?php echo $mas_activity_card_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $mas_activity_card_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_activity_card_list->SortUrl($mas_activity_card_list->Amount) ?>', 1);"><div id="elh_mas_activity_card_Amount" class="mas_activity_card_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_activity_card_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_activity_card_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_activity_card_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_activity_card_list->Selected->Visible) { // Selected ?>
	<?php if ($mas_activity_card_list->SortUrl($mas_activity_card_list->Selected) == "") { ?>
		<th data-name="Selected" class="<?php echo $mas_activity_card_list->Selected->headerCellClass() ?>"><div id="elh_mas_activity_card_Selected" class="mas_activity_card_Selected"><div class="ew-table-header-caption"><?php echo $mas_activity_card_list->Selected->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Selected" class="<?php echo $mas_activity_card_list->Selected->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_activity_card_list->SortUrl($mas_activity_card_list->Selected) ?>', 1);"><div id="elh_mas_activity_card_Selected" class="mas_activity_card_Selected">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_activity_card_list->Selected->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_activity_card_list->Selected->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_activity_card_list->Selected->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_activity_card_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($mas_activity_card_list->isAdd() || $mas_activity_card_list->isCopy()) {
		$mas_activity_card_list->RowIndex = 0;
		$mas_activity_card_list->KeyCount = $mas_activity_card_list->RowIndex;
		if ($mas_activity_card_list->isCopy() && !$mas_activity_card_list->loadRow())
			$mas_activity_card->CurrentAction = "add";
		if ($mas_activity_card_list->isAdd())
			$mas_activity_card_list->loadRowValues();
		if ($mas_activity_card->EventCancelled) // Insert failed
			$mas_activity_card_list->restoreFormValues(); // Restore form values

		// Set row properties
		$mas_activity_card->resetAttributes();
		$mas_activity_card->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_mas_activity_card", "data-rowtype" => ROWTYPE_ADD]);
		$mas_activity_card->RowType = ROWTYPE_ADD;

		// Render row
		$mas_activity_card_list->renderRow();

		// Render list options
		$mas_activity_card_list->renderListOptions();
		$mas_activity_card_list->StartRowCount = 0;
?>
	<tr <?php echo $mas_activity_card->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_activity_card_list->ListOptions->render("body", "left", $mas_activity_card_list->RowCount);
?>
	<?php if ($mas_activity_card_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_id" class="form-group mas_activity_card_id"></span>
<input type="hidden" data-table="mas_activity_card" data-field="x_id" name="o<?php echo $mas_activity_card_list->RowIndex ?>_id" id="o<?php echo $mas_activity_card_list->RowIndex ?>_id" value="<?php echo HtmlEncode($mas_activity_card_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card_list->Activity->Visible) { // Activity ?>
		<td data-name="Activity">
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Activity" class="form-group mas_activity_card_Activity">
<input type="text" data-table="mas_activity_card" data-field="x_Activity" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Activity" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Activity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card_list->Activity->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_list->Activity->EditValue ?>"<?php echo $mas_activity_card_list->Activity->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Activity" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Activity" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Activity" value="<?php echo HtmlEncode($mas_activity_card_list->Activity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card_list->Type->Visible) { // Type ?>
		<td data-name="Type">
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Type" class="form-group mas_activity_card_Type">
<input type="text" data-table="mas_activity_card" data-field="x_Type" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Type" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card_list->Type->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_list->Type->EditValue ?>"<?php echo $mas_activity_card_list->Type->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Type" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Type" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Type" value="<?php echo HtmlEncode($mas_activity_card_list->Type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card_list->Units->Visible) { // Units ?>
		<td data-name="Units">
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Units" class="form-group mas_activity_card_Units">
<input type="text" data-table="mas_activity_card" data-field="x_Units" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Units" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Units" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card_list->Units->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_list->Units->EditValue ?>"<?php echo $mas_activity_card_list->Units->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Units" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Units" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Units" value="<?php echo HtmlEncode($mas_activity_card_list->Units->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Amount" class="form-group mas_activity_card_Amount">
<input type="text" data-table="mas_activity_card" data-field="x_Amount" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Amount" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($mas_activity_card_list->Amount->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_list->Amount->EditValue ?>"<?php echo $mas_activity_card_list->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Amount" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Amount" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($mas_activity_card_list->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card_list->Selected->Visible) { // Selected ?>
		<td data-name="Selected">
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Selected" class="form-group mas_activity_card_Selected">
<div id="tp_x<?php echo $mas_activity_card_list->RowIndex ?>_Selected" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="mas_activity_card" data-field="x_Selected" data-value-separator="<?php echo $mas_activity_card_list->Selected->displayValueSeparatorAttribute() ?>" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" value="{value}"<?php echo $mas_activity_card_list->Selected->editAttributes() ?>></div>
<div id="dsl_x<?php echo $mas_activity_card_list->RowIndex ?>_Selected" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $mas_activity_card_list->Selected->checkBoxListHtml(FALSE, "x{$mas_activity_card_list->RowIndex}_Selected[]") ?>
</div></div>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Selected" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" value="<?php echo HtmlEncode($mas_activity_card_list->Selected->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_activity_card_list->ListOptions->render("body", "right", $mas_activity_card_list->RowCount);
?>
<script>
loadjs.ready(["fmas_activity_cardlist", "load"], function() {
	fmas_activity_cardlist.updateLists(<?php echo $mas_activity_card_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
<?php
if ($mas_activity_card_list->ExportAll && $mas_activity_card_list->isExport()) {
	$mas_activity_card_list->StopRecord = $mas_activity_card_list->TotalRecords;
} else {

	// Set the last record to display
	if ($mas_activity_card_list->TotalRecords > $mas_activity_card_list->StartRecord + $mas_activity_card_list->DisplayRecords - 1)
		$mas_activity_card_list->StopRecord = $mas_activity_card_list->StartRecord + $mas_activity_card_list->DisplayRecords - 1;
	else
		$mas_activity_card_list->StopRecord = $mas_activity_card_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($mas_activity_card->isConfirm() || $mas_activity_card_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($mas_activity_card_list->FormKeyCountName) && ($mas_activity_card_list->isGridAdd() || $mas_activity_card_list->isGridEdit() || $mas_activity_card->isConfirm())) {
		$mas_activity_card_list->KeyCount = $CurrentForm->getValue($mas_activity_card_list->FormKeyCountName);
		$mas_activity_card_list->StopRecord = $mas_activity_card_list->StartRecord + $mas_activity_card_list->KeyCount - 1;
	}
}
$mas_activity_card_list->RecordCount = $mas_activity_card_list->StartRecord - 1;
if ($mas_activity_card_list->Recordset && !$mas_activity_card_list->Recordset->EOF) {
	$mas_activity_card_list->Recordset->moveFirst();
	$selectLimit = $mas_activity_card_list->UseSelectLimit;
	if (!$selectLimit && $mas_activity_card_list->StartRecord > 1)
		$mas_activity_card_list->Recordset->move($mas_activity_card_list->StartRecord - 1);
} elseif (!$mas_activity_card->AllowAddDeleteRow && $mas_activity_card_list->StopRecord == 0) {
	$mas_activity_card_list->StopRecord = $mas_activity_card->GridAddRowCount;
}

// Initialize aggregate
$mas_activity_card->RowType = ROWTYPE_AGGREGATEINIT;
$mas_activity_card->resetAttributes();
$mas_activity_card_list->renderRow();
if ($mas_activity_card_list->isGridAdd())
	$mas_activity_card_list->RowIndex = 0;
if ($mas_activity_card_list->isGridEdit())
	$mas_activity_card_list->RowIndex = 0;
while ($mas_activity_card_list->RecordCount < $mas_activity_card_list->StopRecord) {
	$mas_activity_card_list->RecordCount++;
	if ($mas_activity_card_list->RecordCount >= $mas_activity_card_list->StartRecord) {
		$mas_activity_card_list->RowCount++;
		if ($mas_activity_card_list->isGridAdd() || $mas_activity_card_list->isGridEdit() || $mas_activity_card->isConfirm()) {
			$mas_activity_card_list->RowIndex++;
			$CurrentForm->Index = $mas_activity_card_list->RowIndex;
			if ($CurrentForm->hasValue($mas_activity_card_list->FormActionName) && ($mas_activity_card->isConfirm() || $mas_activity_card_list->EventCancelled))
				$mas_activity_card_list->RowAction = strval($CurrentForm->getValue($mas_activity_card_list->FormActionName));
			elseif ($mas_activity_card_list->isGridAdd())
				$mas_activity_card_list->RowAction = "insert";
			else
				$mas_activity_card_list->RowAction = "";
		}

		// Set up key count
		$mas_activity_card_list->KeyCount = $mas_activity_card_list->RowIndex;

		// Init row class and style
		$mas_activity_card->resetAttributes();
		$mas_activity_card->CssClass = "";
		if ($mas_activity_card_list->isGridAdd()) {
			$mas_activity_card_list->loadRowValues(); // Load default values
		} else {
			$mas_activity_card_list->loadRowValues($mas_activity_card_list->Recordset); // Load row values
		}
		$mas_activity_card->RowType = ROWTYPE_VIEW; // Render view
		if ($mas_activity_card_list->isGridAdd()) // Grid add
			$mas_activity_card->RowType = ROWTYPE_ADD; // Render add
		if ($mas_activity_card_list->isGridAdd() && $mas_activity_card->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$mas_activity_card_list->restoreCurrentRowFormValues($mas_activity_card_list->RowIndex); // Restore form values
		if ($mas_activity_card_list->isGridEdit()) { // Grid edit
			if ($mas_activity_card->EventCancelled)
				$mas_activity_card_list->restoreCurrentRowFormValues($mas_activity_card_list->RowIndex); // Restore form values
			if ($mas_activity_card_list->RowAction == "insert")
				$mas_activity_card->RowType = ROWTYPE_ADD; // Render add
			else
				$mas_activity_card->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($mas_activity_card_list->isGridEdit() && ($mas_activity_card->RowType == ROWTYPE_EDIT || $mas_activity_card->RowType == ROWTYPE_ADD) && $mas_activity_card->EventCancelled) // Update failed
			$mas_activity_card_list->restoreCurrentRowFormValues($mas_activity_card_list->RowIndex); // Restore form values
		if ($mas_activity_card->RowType == ROWTYPE_EDIT) // Edit row
			$mas_activity_card_list->EditRowCount++;

		// Set up row id / data-rowindex
		$mas_activity_card->RowAttrs->merge(["data-rowindex" => $mas_activity_card_list->RowCount, "id" => "r" . $mas_activity_card_list->RowCount . "_mas_activity_card", "data-rowtype" => $mas_activity_card->RowType]);

		// Render row
		$mas_activity_card_list->renderRow();

		// Render list options
		$mas_activity_card_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($mas_activity_card_list->RowAction != "delete" && $mas_activity_card_list->RowAction != "insertdelete" && !($mas_activity_card_list->RowAction == "insert" && $mas_activity_card->isConfirm() && $mas_activity_card_list->emptyRow())) {
?>
	<tr <?php echo $mas_activity_card->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_activity_card_list->ListOptions->render("body", "left", $mas_activity_card_list->RowCount);
?>
	<?php if ($mas_activity_card_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $mas_activity_card_list->id->cellAttributes() ?>>
<?php if ($mas_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_id" class="form-group"></span>
<input type="hidden" data-table="mas_activity_card" data-field="x_id" name="o<?php echo $mas_activity_card_list->RowIndex ?>_id" id="o<?php echo $mas_activity_card_list->RowIndex ?>_id" value="<?php echo HtmlEncode($mas_activity_card_list->id->OldValue) ?>">
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_id" class="form-group">
<span<?php echo $mas_activity_card_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mas_activity_card_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_id" name="x<?php echo $mas_activity_card_list->RowIndex ?>_id" id="x<?php echo $mas_activity_card_list->RowIndex ?>_id" value="<?php echo HtmlEncode($mas_activity_card_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_id">
<span<?php echo $mas_activity_card_list->id->viewAttributes() ?>><?php echo $mas_activity_card_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_activity_card_list->Activity->Visible) { // Activity ?>
		<td data-name="Activity" <?php echo $mas_activity_card_list->Activity->cellAttributes() ?>>
<?php if ($mas_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Activity" class="form-group">
<input type="text" data-table="mas_activity_card" data-field="x_Activity" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Activity" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Activity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card_list->Activity->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_list->Activity->EditValue ?>"<?php echo $mas_activity_card_list->Activity->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Activity" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Activity" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Activity" value="<?php echo HtmlEncode($mas_activity_card_list->Activity->OldValue) ?>">
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Activity" class="form-group">
<input type="text" data-table="mas_activity_card" data-field="x_Activity" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Activity" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Activity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card_list->Activity->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_list->Activity->EditValue ?>"<?php echo $mas_activity_card_list->Activity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Activity">
<span<?php echo $mas_activity_card_list->Activity->viewAttributes() ?>><?php echo $mas_activity_card_list->Activity->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_activity_card_list->Type->Visible) { // Type ?>
		<td data-name="Type" <?php echo $mas_activity_card_list->Type->cellAttributes() ?>>
<?php if ($mas_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Type" class="form-group">
<input type="text" data-table="mas_activity_card" data-field="x_Type" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Type" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card_list->Type->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_list->Type->EditValue ?>"<?php echo $mas_activity_card_list->Type->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Type" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Type" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Type" value="<?php echo HtmlEncode($mas_activity_card_list->Type->OldValue) ?>">
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Type" class="form-group">
<input type="text" data-table="mas_activity_card" data-field="x_Type" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Type" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card_list->Type->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_list->Type->EditValue ?>"<?php echo $mas_activity_card_list->Type->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Type">
<span<?php echo $mas_activity_card_list->Type->viewAttributes() ?>><?php echo $mas_activity_card_list->Type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_activity_card_list->Units->Visible) { // Units ?>
		<td data-name="Units" <?php echo $mas_activity_card_list->Units->cellAttributes() ?>>
<?php if ($mas_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Units" class="form-group">
<input type="text" data-table="mas_activity_card" data-field="x_Units" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Units" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Units" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card_list->Units->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_list->Units->EditValue ?>"<?php echo $mas_activity_card_list->Units->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Units" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Units" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Units" value="<?php echo HtmlEncode($mas_activity_card_list->Units->OldValue) ?>">
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Units" class="form-group">
<input type="text" data-table="mas_activity_card" data-field="x_Units" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Units" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Units" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card_list->Units->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_list->Units->EditValue ?>"<?php echo $mas_activity_card_list->Units->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Units">
<span<?php echo $mas_activity_card_list->Units->viewAttributes() ?>><?php echo $mas_activity_card_list->Units->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_activity_card_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $mas_activity_card_list->Amount->cellAttributes() ?>>
<?php if ($mas_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Amount" class="form-group">
<input type="text" data-table="mas_activity_card" data-field="x_Amount" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Amount" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($mas_activity_card_list->Amount->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_list->Amount->EditValue ?>"<?php echo $mas_activity_card_list->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Amount" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Amount" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($mas_activity_card_list->Amount->OldValue) ?>">
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Amount" class="form-group">
<input type="text" data-table="mas_activity_card" data-field="x_Amount" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Amount" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($mas_activity_card_list->Amount->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_list->Amount->EditValue ?>"<?php echo $mas_activity_card_list->Amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Amount">
<span<?php echo $mas_activity_card_list->Amount->viewAttributes() ?>><?php echo $mas_activity_card_list->Amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_activity_card_list->Selected->Visible) { // Selected ?>
		<td data-name="Selected" <?php echo $mas_activity_card_list->Selected->cellAttributes() ?>>
<?php if ($mas_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Selected" class="form-group">
<div id="tp_x<?php echo $mas_activity_card_list->RowIndex ?>_Selected" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="mas_activity_card" data-field="x_Selected" data-value-separator="<?php echo $mas_activity_card_list->Selected->displayValueSeparatorAttribute() ?>" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" value="{value}"<?php echo $mas_activity_card_list->Selected->editAttributes() ?>></div>
<div id="dsl_x<?php echo $mas_activity_card_list->RowIndex ?>_Selected" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $mas_activity_card_list->Selected->checkBoxListHtml(FALSE, "x{$mas_activity_card_list->RowIndex}_Selected[]") ?>
</div></div>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Selected" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" value="<?php echo HtmlEncode($mas_activity_card_list->Selected->OldValue) ?>">
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Selected" class="form-group">
<div id="tp_x<?php echo $mas_activity_card_list->RowIndex ?>_Selected" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="mas_activity_card" data-field="x_Selected" data-value-separator="<?php echo $mas_activity_card_list->Selected->displayValueSeparatorAttribute() ?>" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" value="{value}"<?php echo $mas_activity_card_list->Selected->editAttributes() ?>></div>
<div id="dsl_x<?php echo $mas_activity_card_list->RowIndex ?>_Selected" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $mas_activity_card_list->Selected->checkBoxListHtml(FALSE, "x{$mas_activity_card_list->RowIndex}_Selected[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_activity_card_list->RowCount ?>_mas_activity_card_Selected">
<span<?php echo $mas_activity_card_list->Selected->viewAttributes() ?>><?php echo $mas_activity_card_list->Selected->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_activity_card_list->ListOptions->render("body", "right", $mas_activity_card_list->RowCount);
?>
	</tr>
<?php if ($mas_activity_card->RowType == ROWTYPE_ADD || $mas_activity_card->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fmas_activity_cardlist", "load"], function() {
	fmas_activity_cardlist.updateLists(<?php echo $mas_activity_card_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$mas_activity_card_list->isGridAdd())
		if (!$mas_activity_card_list->Recordset->EOF)
			$mas_activity_card_list->Recordset->moveNext();
}
?>
<?php
	if ($mas_activity_card_list->isGridAdd() || $mas_activity_card_list->isGridEdit()) {
		$mas_activity_card_list->RowIndex = '$rowindex$';
		$mas_activity_card_list->loadRowValues();

		// Set row properties
		$mas_activity_card->resetAttributes();
		$mas_activity_card->RowAttrs->merge(["data-rowindex" => $mas_activity_card_list->RowIndex, "id" => "r0_mas_activity_card", "data-rowtype" => ROWTYPE_ADD]);
		$mas_activity_card->RowAttrs->appendClass("ew-template");
		$mas_activity_card->RowType = ROWTYPE_ADD;

		// Render row
		$mas_activity_card_list->renderRow();

		// Render list options
		$mas_activity_card_list->renderListOptions();
		$mas_activity_card_list->StartRowCount = 0;
?>
	<tr <?php echo $mas_activity_card->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_activity_card_list->ListOptions->render("body", "left", $mas_activity_card_list->RowIndex);
?>
	<?php if ($mas_activity_card_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_mas_activity_card_id" class="form-group mas_activity_card_id"></span>
<input type="hidden" data-table="mas_activity_card" data-field="x_id" name="o<?php echo $mas_activity_card_list->RowIndex ?>_id" id="o<?php echo $mas_activity_card_list->RowIndex ?>_id" value="<?php echo HtmlEncode($mas_activity_card_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card_list->Activity->Visible) { // Activity ?>
		<td data-name="Activity">
<span id="el$rowindex$_mas_activity_card_Activity" class="form-group mas_activity_card_Activity">
<input type="text" data-table="mas_activity_card" data-field="x_Activity" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Activity" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Activity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card_list->Activity->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_list->Activity->EditValue ?>"<?php echo $mas_activity_card_list->Activity->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Activity" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Activity" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Activity" value="<?php echo HtmlEncode($mas_activity_card_list->Activity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card_list->Type->Visible) { // Type ?>
		<td data-name="Type">
<span id="el$rowindex$_mas_activity_card_Type" class="form-group mas_activity_card_Type">
<input type="text" data-table="mas_activity_card" data-field="x_Type" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Type" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card_list->Type->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_list->Type->EditValue ?>"<?php echo $mas_activity_card_list->Type->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Type" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Type" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Type" value="<?php echo HtmlEncode($mas_activity_card_list->Type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card_list->Units->Visible) { // Units ?>
		<td data-name="Units">
<span id="el$rowindex$_mas_activity_card_Units" class="form-group mas_activity_card_Units">
<input type="text" data-table="mas_activity_card" data-field="x_Units" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Units" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Units" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card_list->Units->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_list->Units->EditValue ?>"<?php echo $mas_activity_card_list->Units->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Units" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Units" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Units" value="<?php echo HtmlEncode($mas_activity_card_list->Units->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<span id="el$rowindex$_mas_activity_card_Amount" class="form-group mas_activity_card_Amount">
<input type="text" data-table="mas_activity_card" data-field="x_Amount" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Amount" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($mas_activity_card_list->Amount->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_list->Amount->EditValue ?>"<?php echo $mas_activity_card_list->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Amount" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Amount" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($mas_activity_card_list->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card_list->Selected->Visible) { // Selected ?>
		<td data-name="Selected">
<span id="el$rowindex$_mas_activity_card_Selected" class="form-group mas_activity_card_Selected">
<div id="tp_x<?php echo $mas_activity_card_list->RowIndex ?>_Selected" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="mas_activity_card" data-field="x_Selected" data-value-separator="<?php echo $mas_activity_card_list->Selected->displayValueSeparatorAttribute() ?>" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" value="{value}"<?php echo $mas_activity_card_list->Selected->editAttributes() ?>></div>
<div id="dsl_x<?php echo $mas_activity_card_list->RowIndex ?>_Selected" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $mas_activity_card_list->Selected->checkBoxListHtml(FALSE, "x{$mas_activity_card_list->RowIndex}_Selected[]") ?>
</div></div>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Selected" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" value="<?php echo HtmlEncode($mas_activity_card_list->Selected->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_activity_card_list->ListOptions->render("body", "right", $mas_activity_card_list->RowIndex);
?>
<script>
loadjs.ready(["fmas_activity_cardlist", "load"], function() {
	fmas_activity_cardlist.updateLists(<?php echo $mas_activity_card_list->RowIndex ?>);
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
<?php if ($mas_activity_card_list->isAdd() || $mas_activity_card_list->isCopy()) { ?>
<input type="hidden" name="<?php echo $mas_activity_card_list->FormKeyCountName ?>" id="<?php echo $mas_activity_card_list->FormKeyCountName ?>" value="<?php echo $mas_activity_card_list->KeyCount ?>">
<?php } ?>
<?php if ($mas_activity_card_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $mas_activity_card_list->FormKeyCountName ?>" id="<?php echo $mas_activity_card_list->FormKeyCountName ?>" value="<?php echo $mas_activity_card_list->KeyCount ?>">
<?php echo $mas_activity_card_list->MultiSelectKey ?>
<?php } ?>
<?php if ($mas_activity_card_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $mas_activity_card_list->FormKeyCountName ?>" id="<?php echo $mas_activity_card_list->FormKeyCountName ?>" value="<?php echo $mas_activity_card_list->KeyCount ?>">
<?php echo $mas_activity_card_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$mas_activity_card->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_activity_card_list->Recordset)
	$mas_activity_card_list->Recordset->Close();
?>
<?php if (!$mas_activity_card_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_activity_card_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_activity_card_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_activity_card_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_activity_card_list->TotalRecords == 0 && !$mas_activity_card->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_activity_card_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_activity_card_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_activity_card_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$mas_activity_card->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_mas_activity_card",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$mas_activity_card_list->terminate();
?>