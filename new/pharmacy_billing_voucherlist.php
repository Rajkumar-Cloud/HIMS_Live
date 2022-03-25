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
$pharmacy_billing_voucher_list = new pharmacy_billing_voucher_list();

// Run the page
$pharmacy_billing_voucher_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_voucher_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_billing_voucher_list->isExport()) { ?>
<script>
var fpharmacy_billing_voucherlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_billing_voucherlist = currentForm = new ew.Form("fpharmacy_billing_voucherlist", "list");
	fpharmacy_billing_voucherlist.formKeyCountName = '<?php echo $pharmacy_billing_voucher_list->FormKeyCountName ?>';

	// Validate form
	fpharmacy_billing_voucherlist.validate = function() {
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
			<?php if ($pharmacy_billing_voucher_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->id->caption(), $pharmacy_billing_voucher_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_list->BillNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_BillNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->BillNumber->caption(), $pharmacy_billing_voucher_list->BillNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_list->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->PatientId->caption(), $pharmacy_billing_voucher_list->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_list->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->PatientName->caption(), $pharmacy_billing_voucher_list->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_list->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->Mobile->caption(), $pharmacy_billing_voucher_list->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_list->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->mrnno->caption(), $pharmacy_billing_voucher_list->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_list->IP_OP->Required) { ?>
				elm = this.getElements("x" + infix + "_IP_OP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->IP_OP->caption(), $pharmacy_billing_voucher_list->IP_OP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_list->Doctor->Required) { ?>
				elm = this.getElements("x" + infix + "_Doctor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->Doctor->caption(), $pharmacy_billing_voucher_list->Doctor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_list->ModeofPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_ModeofPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->ModeofPayment->caption(), $pharmacy_billing_voucher_list->ModeofPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_list->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->Amount->caption(), $pharmacy_billing_voucher_list->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher_list->Amount->errorMessage()) ?>");
			<?php if ($pharmacy_billing_voucher_list->AnyDues->Required) { ?>
				elm = this.getElements("x" + infix + "_AnyDues");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->AnyDues->caption(), $pharmacy_billing_voucher_list->AnyDues->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_list->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->createdby->caption(), $pharmacy_billing_voucher_list->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_list->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->createddatetime->caption(), $pharmacy_billing_voucher_list->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_list->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->modifiedby->caption(), $pharmacy_billing_voucher_list->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_list->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->modifieddatetime->caption(), $pharmacy_billing_voucher_list->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_list->RealizationAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->RealizationAmount->caption(), $pharmacy_billing_voucher_list->RealizationAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RealizationAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher_list->RealizationAmount->errorMessage()) ?>");
			<?php if ($pharmacy_billing_voucher_list->CId->Required) { ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->CId->caption(), $pharmacy_billing_voucher_list->CId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_list->PartnerName->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->PartnerName->caption(), $pharmacy_billing_voucher_list->PartnerName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_list->CardNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_CardNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->CardNumber->caption(), $pharmacy_billing_voucher_list->CardNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_list->BillStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_BillStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->BillStatus->caption(), $pharmacy_billing_voucher_list->BillStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillStatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher_list->BillStatus->errorMessage()) ?>");
			<?php if ($pharmacy_billing_voucher_list->ReportHeader->Required) { ?>
				elm = this.getElements("x" + infix + "_ReportHeader[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->ReportHeader->caption(), $pharmacy_billing_voucher_list->ReportHeader->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_voucher_list->PharID->Required) { ?>
				elm = this.getElements("x" + infix + "_PharID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->PharID->caption(), $pharmacy_billing_voucher_list->PharID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PharID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher_list->PharID->errorMessage()) ?>");
			<?php if ($pharmacy_billing_voucher_list->UserName->Required) { ?>
				elm = this.getElements("x" + infix + "_UserName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher_list->UserName->caption(), $pharmacy_billing_voucher_list->UserName->RequiredErrorMessage)) ?>");
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
	fpharmacy_billing_voucherlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "BillNumber", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
		if (ew.valueChanged(fobj, infix, "Mobile", false)) return false;
		if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
		if (ew.valueChanged(fobj, infix, "IP_OP", false)) return false;
		if (ew.valueChanged(fobj, infix, "Doctor", false)) return false;
		if (ew.valueChanged(fobj, infix, "ModeofPayment", false)) return false;
		if (ew.valueChanged(fobj, infix, "Amount", false)) return false;
		if (ew.valueChanged(fobj, infix, "AnyDues", false)) return false;
		if (ew.valueChanged(fobj, infix, "RealizationAmount", false)) return false;
		if (ew.valueChanged(fobj, infix, "CId", false)) return false;
		if (ew.valueChanged(fobj, infix, "PartnerName", false)) return false;
		if (ew.valueChanged(fobj, infix, "CardNumber", false)) return false;
		if (ew.valueChanged(fobj, infix, "BillStatus", false)) return false;
		if (ew.valueChanged(fobj, infix, "ReportHeader[]", false)) return false;
		if (ew.valueChanged(fobj, infix, "PharID", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpharmacy_billing_voucherlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_billing_voucherlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_billing_voucherlist.lists["x_ModeofPayment"] = <?php echo $pharmacy_billing_voucher_list->ModeofPayment->Lookup->toClientList($pharmacy_billing_voucher_list) ?>;
	fpharmacy_billing_voucherlist.lists["x_ModeofPayment"].options = <?php echo JsonEncode($pharmacy_billing_voucher_list->ModeofPayment->lookupOptions()) ?>;
	fpharmacy_billing_voucherlist.lists["x_CId"] = <?php echo $pharmacy_billing_voucher_list->CId->Lookup->toClientList($pharmacy_billing_voucher_list) ?>;
	fpharmacy_billing_voucherlist.lists["x_CId"].options = <?php echo JsonEncode($pharmacy_billing_voucher_list->CId->lookupOptions()) ?>;
	fpharmacy_billing_voucherlist.lists["x_ReportHeader[]"] = <?php echo $pharmacy_billing_voucher_list->ReportHeader->Lookup->toClientList($pharmacy_billing_voucher_list) ?>;
	fpharmacy_billing_voucherlist.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($pharmacy_billing_voucher_list->ReportHeader->options(FALSE, TRUE)) ?>;
	loadjs.done("fpharmacy_billing_voucherlist");
});
var fpharmacy_billing_voucherlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_billing_voucherlistsrch = currentSearchForm = new ew.Form("fpharmacy_billing_voucherlistsrch");

	// Dynamic selection lists
	// Filters

	fpharmacy_billing_voucherlistsrch.filterList = <?php echo $pharmacy_billing_voucher_list->getFilterList() ?>;
	loadjs.done("fpharmacy_billing_voucherlistsrch");
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
<?php if (!$pharmacy_billing_voucher_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_billing_voucher_list->TotalRecords > 0 && $pharmacy_billing_voucher_list->ExportOptions->visible()) { ?>
<?php $pharmacy_billing_voucher_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->ImportOptions->visible()) { ?>
<?php $pharmacy_billing_voucher_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->SearchOptions->visible()) { ?>
<?php $pharmacy_billing_voucher_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->FilterOptions->visible()) { ?>
<?php $pharmacy_billing_voucher_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_billing_voucher_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_billing_voucher_list->isExport() && !$pharmacy_billing_voucher->CurrentAction) { ?>
<form name="fpharmacy_billing_voucherlistsrch" id="fpharmacy_billing_voucherlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_billing_voucherlistsrch-search-panel" class="<?php echo $pharmacy_billing_voucher_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_billing_voucher">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pharmacy_billing_voucher_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_billing_voucher_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_billing_voucher_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_billing_voucher_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_billing_voucher_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_billing_voucher_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_billing_voucher_list->showPageHeader(); ?>
<?php
$pharmacy_billing_voucher_list->showMessage();
?>
<?php if ($pharmacy_billing_voucher_list->TotalRecords > 0 || $pharmacy_billing_voucher->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_billing_voucher_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_billing_voucher">
<?php if (!$pharmacy_billing_voucher_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_billing_voucher_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_billing_voucher_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_billing_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_billing_voucherlist" id="fpharmacy_billing_voucherlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_voucher">
<div id="gmp_pharmacy_billing_voucher" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_billing_voucher_list->TotalRecords > 0 || $pharmacy_billing_voucher_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_billing_voucherlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_billing_voucher->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_billing_voucher_list->renderListOptions();

// Render list options (header, left)
$pharmacy_billing_voucher_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_billing_voucher_list->id->Visible) { // id ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_billing_voucher_list->id->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_id" class="pharmacy_billing_voucher_id"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_billing_voucher_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->id) ?>', 1);"><div id="elh_pharmacy_billing_voucher_id" class="pharmacy_billing_voucher_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->BillNumber->Visible) { // BillNumber ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $pharmacy_billing_voucher_list->BillNumber->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_BillNumber" class="pharmacy_billing_voucher_BillNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $pharmacy_billing_voucher_list->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->BillNumber) ?>', 1);"><div id="elh_pharmacy_billing_voucher_BillNumber" class="pharmacy_billing_voucher_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->BillNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->BillNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->PatientId->Visible) { // PatientId ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $pharmacy_billing_voucher_list->PatientId->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_PatientId" class="pharmacy_billing_voucher_PatientId"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $pharmacy_billing_voucher_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->PatientId) ?>', 1);"><div id="elh_pharmacy_billing_voucher_PatientId" class="pharmacy_billing_voucher_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->PatientName->Visible) { // PatientName ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $pharmacy_billing_voucher_list->PatientName->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_PatientName" class="pharmacy_billing_voucher_PatientName"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $pharmacy_billing_voucher_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->PatientName) ?>', 1);"><div id="elh_pharmacy_billing_voucher_PatientName" class="pharmacy_billing_voucher_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->Mobile->Visible) { // Mobile ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $pharmacy_billing_voucher_list->Mobile->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_Mobile" class="pharmacy_billing_voucher_Mobile"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $pharmacy_billing_voucher_list->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->Mobile) ?>', 1);"><div id="elh_pharmacy_billing_voucher_Mobile" class="pharmacy_billing_voucher_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->mrnno->Visible) { // mrnno ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $pharmacy_billing_voucher_list->mrnno->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_mrnno" class="pharmacy_billing_voucher_mrnno"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $pharmacy_billing_voucher_list->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->mrnno) ?>', 1);"><div id="elh_pharmacy_billing_voucher_mrnno" class="pharmacy_billing_voucher_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->IP_OP->Visible) { // IP_OP ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->IP_OP) == "") { ?>
		<th data-name="IP_OP" class="<?php echo $pharmacy_billing_voucher_list->IP_OP->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_IP_OP" class="pharmacy_billing_voucher_IP_OP"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->IP_OP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_OP" class="<?php echo $pharmacy_billing_voucher_list->IP_OP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->IP_OP) ?>', 1);"><div id="elh_pharmacy_billing_voucher_IP_OP" class="pharmacy_billing_voucher_IP_OP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->IP_OP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->IP_OP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->IP_OP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->Doctor->Visible) { // Doctor ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $pharmacy_billing_voucher_list->Doctor->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_Doctor" class="pharmacy_billing_voucher_Doctor"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $pharmacy_billing_voucher_list->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->Doctor) ?>', 1);"><div id="elh_pharmacy_billing_voucher_Doctor" class="pharmacy_billing_voucher_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->Doctor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->Doctor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $pharmacy_billing_voucher_list->ModeofPayment->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_ModeofPayment" class="pharmacy_billing_voucher_ModeofPayment"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $pharmacy_billing_voucher_list->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->ModeofPayment) ?>', 1);"><div id="elh_pharmacy_billing_voucher_ModeofPayment" class="pharmacy_billing_voucher_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->ModeofPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->ModeofPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->Amount->Visible) { // Amount ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $pharmacy_billing_voucher_list->Amount->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_Amount" class="pharmacy_billing_voucher_Amount"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $pharmacy_billing_voucher_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->Amount) ?>', 1);"><div id="elh_pharmacy_billing_voucher_Amount" class="pharmacy_billing_voucher_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->AnyDues->Visible) { // AnyDues ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $pharmacy_billing_voucher_list->AnyDues->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_AnyDues" class="pharmacy_billing_voucher_AnyDues"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $pharmacy_billing_voucher_list->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->AnyDues) ?>', 1);"><div id="elh_pharmacy_billing_voucher_AnyDues" class="pharmacy_billing_voucher_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->AnyDues->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->AnyDues->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_billing_voucher_list->createdby->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_createdby" class="pharmacy_billing_voucher_createdby"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_billing_voucher_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->createdby) ?>', 1);"><div id="elh_pharmacy_billing_voucher_createdby" class="pharmacy_billing_voucher_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_billing_voucher_list->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_createddatetime" class="pharmacy_billing_voucher_createddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_billing_voucher_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->createddatetime) ?>', 1);"><div id="elh_pharmacy_billing_voucher_createddatetime" class="pharmacy_billing_voucher_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_billing_voucher_list->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_modifiedby" class="pharmacy_billing_voucher_modifiedby"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_billing_voucher_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->modifiedby) ?>', 1);"><div id="elh_pharmacy_billing_voucher_modifiedby" class="pharmacy_billing_voucher_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_billing_voucher_list->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_modifieddatetime" class="pharmacy_billing_voucher_modifieddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_billing_voucher_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->modifieddatetime) ?>', 1);"><div id="elh_pharmacy_billing_voucher_modifieddatetime" class="pharmacy_billing_voucher_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->RealizationAmount->Visible) { // RealizationAmount ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->RealizationAmount) == "") { ?>
		<th data-name="RealizationAmount" class="<?php echo $pharmacy_billing_voucher_list->RealizationAmount->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_RealizationAmount" class="pharmacy_billing_voucher_RealizationAmount"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->RealizationAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationAmount" class="<?php echo $pharmacy_billing_voucher_list->RealizationAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->RealizationAmount) ?>', 1);"><div id="elh_pharmacy_billing_voucher_RealizationAmount" class="pharmacy_billing_voucher_RealizationAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->RealizationAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->RealizationAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->RealizationAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->CId->Visible) { // CId ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $pharmacy_billing_voucher_list->CId->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_CId" class="pharmacy_billing_voucher_CId"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $pharmacy_billing_voucher_list->CId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->CId) ?>', 1);"><div id="elh_pharmacy_billing_voucher_CId" class="pharmacy_billing_voucher_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->CId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->CId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->PartnerName->Visible) { // PartnerName ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $pharmacy_billing_voucher_list->PartnerName->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_PartnerName" class="pharmacy_billing_voucher_PartnerName"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $pharmacy_billing_voucher_list->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->PartnerName) ?>', 1);"><div id="elh_pharmacy_billing_voucher_PartnerName" class="pharmacy_billing_voucher_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->PartnerName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->PartnerName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->CardNumber->Visible) { // CardNumber ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $pharmacy_billing_voucher_list->CardNumber->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_CardNumber" class="pharmacy_billing_voucher_CardNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $pharmacy_billing_voucher_list->CardNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->CardNumber) ?>', 1);"><div id="elh_pharmacy_billing_voucher_CardNumber" class="pharmacy_billing_voucher_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->CardNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->CardNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->CardNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->BillStatus->Visible) { // BillStatus ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->BillStatus) == "") { ?>
		<th data-name="BillStatus" class="<?php echo $pharmacy_billing_voucher_list->BillStatus->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_BillStatus" class="pharmacy_billing_voucher_BillStatus"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->BillStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillStatus" class="<?php echo $pharmacy_billing_voucher_list->BillStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->BillStatus) ?>', 1);"><div id="elh_pharmacy_billing_voucher_BillStatus" class="pharmacy_billing_voucher_BillStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->BillStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->BillStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->BillStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $pharmacy_billing_voucher_list->ReportHeader->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_ReportHeader" class="pharmacy_billing_voucher_ReportHeader"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->ReportHeader->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $pharmacy_billing_voucher_list->ReportHeader->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->ReportHeader) ?>', 1);"><div id="elh_pharmacy_billing_voucher_ReportHeader" class="pharmacy_billing_voucher_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->ReportHeader->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->ReportHeader->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->ReportHeader->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->PharID->Visible) { // PharID ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->PharID) == "") { ?>
		<th data-name="PharID" class="<?php echo $pharmacy_billing_voucher_list->PharID->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_PharID" class="pharmacy_billing_voucher_PharID"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->PharID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PharID" class="<?php echo $pharmacy_billing_voucher_list->PharID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->PharID) ?>', 1);"><div id="elh_pharmacy_billing_voucher_PharID" class="pharmacy_billing_voucher_PharID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->PharID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->PharID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->PharID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->UserName->Visible) { // UserName ?>
	<?php if ($pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $pharmacy_billing_voucher_list->UserName->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_UserName" class="pharmacy_billing_voucher_UserName"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $pharmacy_billing_voucher_list->UserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_voucher_list->SortUrl($pharmacy_billing_voucher_list->UserName) ?>', 1);"><div id="elh_pharmacy_billing_voucher_UserName" class="pharmacy_billing_voucher_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher_list->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher_list->UserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher_list->UserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_billing_voucher_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_billing_voucher_list->ExportAll && $pharmacy_billing_voucher_list->isExport()) {
	$pharmacy_billing_voucher_list->StopRecord = $pharmacy_billing_voucher_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_billing_voucher_list->TotalRecords > $pharmacy_billing_voucher_list->StartRecord + $pharmacy_billing_voucher_list->DisplayRecords - 1)
		$pharmacy_billing_voucher_list->StopRecord = $pharmacy_billing_voucher_list->StartRecord + $pharmacy_billing_voucher_list->DisplayRecords - 1;
	else
		$pharmacy_billing_voucher_list->StopRecord = $pharmacy_billing_voucher_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($pharmacy_billing_voucher->isConfirm() || $pharmacy_billing_voucher_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_billing_voucher_list->FormKeyCountName) && ($pharmacy_billing_voucher_list->isGridAdd() || $pharmacy_billing_voucher_list->isGridEdit() || $pharmacy_billing_voucher->isConfirm())) {
		$pharmacy_billing_voucher_list->KeyCount = $CurrentForm->getValue($pharmacy_billing_voucher_list->FormKeyCountName);
		$pharmacy_billing_voucher_list->StopRecord = $pharmacy_billing_voucher_list->StartRecord + $pharmacy_billing_voucher_list->KeyCount - 1;
	}
}
$pharmacy_billing_voucher_list->RecordCount = $pharmacy_billing_voucher_list->StartRecord - 1;
if ($pharmacy_billing_voucher_list->Recordset && !$pharmacy_billing_voucher_list->Recordset->EOF) {
	$pharmacy_billing_voucher_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_billing_voucher_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_billing_voucher_list->StartRecord > 1)
		$pharmacy_billing_voucher_list->Recordset->move($pharmacy_billing_voucher_list->StartRecord - 1);
} elseif (!$pharmacy_billing_voucher->AllowAddDeleteRow && $pharmacy_billing_voucher_list->StopRecord == 0) {
	$pharmacy_billing_voucher_list->StopRecord = $pharmacy_billing_voucher->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_billing_voucher->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_billing_voucher->resetAttributes();
$pharmacy_billing_voucher_list->renderRow();
if ($pharmacy_billing_voucher_list->isGridAdd())
	$pharmacy_billing_voucher_list->RowIndex = 0;
if ($pharmacy_billing_voucher_list->isGridEdit())
	$pharmacy_billing_voucher_list->RowIndex = 0;
while ($pharmacy_billing_voucher_list->RecordCount < $pharmacy_billing_voucher_list->StopRecord) {
	$pharmacy_billing_voucher_list->RecordCount++;
	if ($pharmacy_billing_voucher_list->RecordCount >= $pharmacy_billing_voucher_list->StartRecord) {
		$pharmacy_billing_voucher_list->RowCount++;
		if ($pharmacy_billing_voucher_list->isGridAdd() || $pharmacy_billing_voucher_list->isGridEdit() || $pharmacy_billing_voucher->isConfirm()) {
			$pharmacy_billing_voucher_list->RowIndex++;
			$CurrentForm->Index = $pharmacy_billing_voucher_list->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_billing_voucher_list->FormActionName) && ($pharmacy_billing_voucher->isConfirm() || $pharmacy_billing_voucher_list->EventCancelled))
				$pharmacy_billing_voucher_list->RowAction = strval($CurrentForm->getValue($pharmacy_billing_voucher_list->FormActionName));
			elseif ($pharmacy_billing_voucher_list->isGridAdd())
				$pharmacy_billing_voucher_list->RowAction = "insert";
			else
				$pharmacy_billing_voucher_list->RowAction = "";
		}

		// Set up key count
		$pharmacy_billing_voucher_list->KeyCount = $pharmacy_billing_voucher_list->RowIndex;

		// Init row class and style
		$pharmacy_billing_voucher->resetAttributes();
		$pharmacy_billing_voucher->CssClass = "";
		if ($pharmacy_billing_voucher_list->isGridAdd()) {
			$pharmacy_billing_voucher_list->loadRowValues(); // Load default values
		} else {
			$pharmacy_billing_voucher_list->loadRowValues($pharmacy_billing_voucher_list->Recordset); // Load row values
		}
		$pharmacy_billing_voucher->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_billing_voucher_list->isGridAdd()) // Grid add
			$pharmacy_billing_voucher->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_billing_voucher_list->isGridAdd() && $pharmacy_billing_voucher->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_billing_voucher_list->restoreCurrentRowFormValues($pharmacy_billing_voucher_list->RowIndex); // Restore form values
		if ($pharmacy_billing_voucher_list->isGridEdit()) { // Grid edit
			if ($pharmacy_billing_voucher->EventCancelled)
				$pharmacy_billing_voucher_list->restoreCurrentRowFormValues($pharmacy_billing_voucher_list->RowIndex); // Restore form values
			if ($pharmacy_billing_voucher_list->RowAction == "insert")
				$pharmacy_billing_voucher->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_billing_voucher->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_billing_voucher_list->isGridEdit() && ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT || $pharmacy_billing_voucher->RowType == ROWTYPE_ADD) && $pharmacy_billing_voucher->EventCancelled) // Update failed
			$pharmacy_billing_voucher_list->restoreCurrentRowFormValues($pharmacy_billing_voucher_list->RowIndex); // Restore form values
		if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_billing_voucher_list->EditRowCount++;

		// Set up row id / data-rowindex
		$pharmacy_billing_voucher->RowAttrs->merge(["data-rowindex" => $pharmacy_billing_voucher_list->RowCount, "id" => "r" . $pharmacy_billing_voucher_list->RowCount . "_pharmacy_billing_voucher", "data-rowtype" => $pharmacy_billing_voucher->RowType]);

		// Render row
		$pharmacy_billing_voucher_list->renderRow();

		// Render list options
		$pharmacy_billing_voucher_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_billing_voucher_list->RowAction != "delete" && $pharmacy_billing_voucher_list->RowAction != "insertdelete" && !($pharmacy_billing_voucher_list->RowAction == "insert" && $pharmacy_billing_voucher->isConfirm() && $pharmacy_billing_voucher_list->emptyRow())) {
?>
	<tr <?php echo $pharmacy_billing_voucher->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_billing_voucher_list->ListOptions->render("body", "left", $pharmacy_billing_voucher_list->RowCount);
?>
	<?php if ($pharmacy_billing_voucher_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_billing_voucher_list->id->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_id" class="form-group"></span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_id" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_id" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_id" class="form-group">
<span<?php echo $pharmacy_billing_voucher_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_voucher_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_id" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_id" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_id">
<span<?php echo $pharmacy_billing_voucher_list->id->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" <?php echo $pharmacy_billing_voucher_list->BillNumber->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_BillNumber" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->BillNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->BillNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->BillNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->BillNumber->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_BillNumber" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->BillNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->BillNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->BillNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_BillNumber">
<span<?php echo $pharmacy_billing_voucher_list->BillNumber->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->BillNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $pharmacy_billing_voucher_list->PatientId->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_PatientId" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientId" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PatientId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->PatientId->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PatientId" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_PatientId" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientId" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PatientId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->PatientId->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_PatientId">
<span<?php echo $pharmacy_billing_voucher_list->PatientId->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->PatientId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $pharmacy_billing_voucher_list->PatientName->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_PatientName" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientName" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->PatientName->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PatientName" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_PatientName" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientName" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->PatientName->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_PatientName">
<span<?php echo $pharmacy_billing_voucher_list->PatientName->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $pharmacy_billing_voucher_list->Mobile->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_Mobile" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Mobile" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->Mobile->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->Mobile->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Mobile" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_Mobile" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Mobile" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->Mobile->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->Mobile->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->Mobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_Mobile">
<span<?php echo $pharmacy_billing_voucher_list->Mobile->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->Mobile->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $pharmacy_billing_voucher_list->mrnno->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_mrnno" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_mrnno" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->mrnno->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->mrnno->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->mrnno->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_mrnno" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_mrnno" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_mrnno" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->mrnno->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->mrnno->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_mrnno">
<span<?php echo $pharmacy_billing_voucher_list->mrnno->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->mrnno->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP" <?php echo $pharmacy_billing_voucher_list->IP_OP->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_IP_OP" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_IP_OP" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->IP_OP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->IP_OP->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->IP_OP->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_IP_OP" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->IP_OP->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_IP_OP" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_IP_OP" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->IP_OP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->IP_OP->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->IP_OP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_IP_OP">
<span<?php echo $pharmacy_billing_voucher_list->IP_OP->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->IP_OP->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor" <?php echo $pharmacy_billing_voucher_list->Doctor->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_Doctor" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Doctor" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->Doctor->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->Doctor->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Doctor" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->Doctor->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_Doctor" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Doctor" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->Doctor->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->Doctor->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->Doctor->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_Doctor">
<span<?php echo $pharmacy_billing_voucher_list->Doctor->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->Doctor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" <?php echo $pharmacy_billing_voucher_list->ModeofPayment->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_ModeofPayment" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $pharmacy_billing_voucher_list->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment"<?php echo $pharmacy_billing_voucher_list->ModeofPayment->editAttributes() ?>>
			<?php echo $pharmacy_billing_voucher_list->ModeofPayment->selectOptionListHtml("x{$pharmacy_billing_voucher_list->RowIndex}_ModeofPayment") ?>
		</select>
</div>
<?php echo $pharmacy_billing_voucher_list->ModeofPayment->Lookup->getParamTag($pharmacy_billing_voucher_list, "p_x" . $pharmacy_billing_voucher_list->RowIndex . "_ModeofPayment") ?>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_ModeofPayment" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_ModeofPayment" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $pharmacy_billing_voucher_list->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment"<?php echo $pharmacy_billing_voucher_list->ModeofPayment->editAttributes() ?>>
			<?php echo $pharmacy_billing_voucher_list->ModeofPayment->selectOptionListHtml("x{$pharmacy_billing_voucher_list->RowIndex}_ModeofPayment") ?>
		</select>
</div>
<?php echo $pharmacy_billing_voucher_list->ModeofPayment->Lookup->getParamTag($pharmacy_billing_voucher_list, "p_x" . $pharmacy_billing_voucher_list->RowIndex . "_ModeofPayment") ?>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_ModeofPayment">
<span<?php echo $pharmacy_billing_voucher_list->ModeofPayment->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->ModeofPayment->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $pharmacy_billing_voucher_list->Amount->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_Amount" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Amount" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->Amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->Amount->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Amount" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->Amount->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_Amount" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Amount" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->Amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->Amount->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->Amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_Amount">
<span<?php echo $pharmacy_billing_voucher_list->Amount->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->Amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues" <?php echo $pharmacy_billing_voucher_list->AnyDues->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_AnyDues" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_AnyDues" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->AnyDues->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->AnyDues->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->AnyDues->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_AnyDues" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->AnyDues->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_AnyDues" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_AnyDues" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->AnyDues->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->AnyDues->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->AnyDues->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_AnyDues">
<span<?php echo $pharmacy_billing_voucher_list->AnyDues->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->AnyDues->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $pharmacy_billing_voucher_list->createdby->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_createdby" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_createdby" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->createdby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_createdby">
<span<?php echo $pharmacy_billing_voucher_list->createdby->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $pharmacy_billing_voucher_list->createddatetime->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_createddatetime" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_createddatetime">
<span<?php echo $pharmacy_billing_voucher_list->createddatetime->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $pharmacy_billing_voucher_list->modifiedby->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_modifiedby" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_modifiedby">
<span<?php echo $pharmacy_billing_voucher_list->modifiedby->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $pharmacy_billing_voucher_list->modifieddatetime->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_modifieddatetime">
<span<?php echo $pharmacy_billing_voucher_list->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->RealizationAmount->Visible) { // RealizationAmount ?>
		<td data-name="RealizationAmount" <?php echo $pharmacy_billing_voucher_list->RealizationAmount->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_RealizationAmount" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_RealizationAmount" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->RealizationAmount->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->RealizationAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_RealizationAmount" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->RealizationAmount->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_RealizationAmount" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_RealizationAmount" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->RealizationAmount->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->RealizationAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_RealizationAmount">
<span<?php echo $pharmacy_billing_voucher_list->RealizationAmount->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->RealizationAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->CId->Visible) { // CId ?>
		<td data-name="CId" <?php echo $pharmacy_billing_voucher_list->CId->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_CId" class="form-group">
<?php $pharmacy_billing_voucher_list->CId->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId"><?php echo EmptyValue(strval($pharmacy_billing_voucher_list->CId->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_voucher_list->CId->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_voucher_list->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_voucher_list->CId->ReadOnly || $pharmacy_billing_voucher_list->CId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_voucher_list->CId->Lookup->getParamTag($pharmacy_billing_voucher_list, "p_x" . $pharmacy_billing_voucher_list->RowIndex . "_CId") ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_voucher_list->CId->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" value="<?php echo $pharmacy_billing_voucher_list->CId->CurrentValue ?>"<?php echo $pharmacy_billing_voucher_list->CId->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CId" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->CId->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_CId" class="form-group">
<?php $pharmacy_billing_voucher_list->CId->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId"><?php echo EmptyValue(strval($pharmacy_billing_voucher_list->CId->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_voucher_list->CId->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_voucher_list->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_voucher_list->CId->ReadOnly || $pharmacy_billing_voucher_list->CId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_voucher_list->CId->Lookup->getParamTag($pharmacy_billing_voucher_list, "p_x" . $pharmacy_billing_voucher_list->RowIndex . "_CId") ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_voucher_list->CId->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" value="<?php echo $pharmacy_billing_voucher_list->CId->CurrentValue ?>"<?php echo $pharmacy_billing_voucher_list->CId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_CId">
<span<?php echo $pharmacy_billing_voucher_list->CId->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->CId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName" <?php echo $pharmacy_billing_voucher_list->PartnerName->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_PartnerName" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PartnerName" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PartnerName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->PartnerName->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->PartnerName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PartnerName" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PartnerName->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_PartnerName" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PartnerName" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PartnerName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->PartnerName->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->PartnerName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_PartnerName">
<span<?php echo $pharmacy_billing_voucher_list->PartnerName->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->PartnerName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber" <?php echo $pharmacy_billing_voucher_list->CardNumber->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_CardNumber" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_CardNumber" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->CardNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->CardNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->CardNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CardNumber" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->CardNumber->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_CardNumber" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_CardNumber" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->CardNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->CardNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->CardNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_CardNumber">
<span<?php echo $pharmacy_billing_voucher_list->CardNumber->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->CardNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->BillStatus->Visible) { // BillStatus ?>
		<td data-name="BillStatus" <?php echo $pharmacy_billing_voucher_list->BillStatus->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_BillStatus" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_BillStatus" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->BillStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->BillStatus->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->BillStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillStatus" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->BillStatus->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_BillStatus" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_BillStatus" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->BillStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->BillStatus->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->BillStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_BillStatus">
<span<?php echo $pharmacy_billing_voucher_list->BillStatus->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->BillStatus->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader" <?php echo $pharmacy_billing_voucher_list->ReportHeader->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_ReportHeader" class="form-group">
<div id="tp_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_ReportHeader" data-value-separator="<?php echo $pharmacy_billing_voucher_list->ReportHeader->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" value="{value}"<?php echo $pharmacy_billing_voucher_list->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher_list->ReportHeader->checkBoxListHtml(FALSE, "x{$pharmacy_billing_voucher_list->RowIndex}_ReportHeader[]") ?>
</div></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_ReportHeader" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->ReportHeader->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_ReportHeader" class="form-group">
<div id="tp_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_ReportHeader" data-value-separator="<?php echo $pharmacy_billing_voucher_list->ReportHeader->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" value="{value}"<?php echo $pharmacy_billing_voucher_list->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher_list->ReportHeader->checkBoxListHtml(FALSE, "x{$pharmacy_billing_voucher_list->RowIndex}_ReportHeader[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_ReportHeader">
<span<?php echo $pharmacy_billing_voucher_list->ReportHeader->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->ReportHeader->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->PharID->Visible) { // PharID ?>
		<td data-name="PharID" <?php echo $pharmacy_billing_voucher_list->PharID->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_PharID" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PharID" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PharID" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PharID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PharID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->PharID->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->PharID->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PharID" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PharID" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PharID" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PharID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_PharID" class="form-group">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PharID" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PharID" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PharID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PharID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->PharID->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->PharID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_PharID">
<span<?php echo $pharmacy_billing_voucher_list->PharID->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->PharID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->UserName->Visible) { // UserName ?>
		<td data-name="UserName" <?php echo $pharmacy_billing_voucher_list->UserName->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_UserName" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_UserName" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_UserName" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->UserName->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCount ?>_pharmacy_billing_voucher_UserName">
<span<?php echo $pharmacy_billing_voucher_list->UserName->viewAttributes() ?>><?php echo $pharmacy_billing_voucher_list->UserName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_billing_voucher_list->ListOptions->render("body", "right", $pharmacy_billing_voucher_list->RowCount);
?>
	</tr>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD || $pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpharmacy_billing_voucherlist", "load"], function() {
	fpharmacy_billing_voucherlist.updateLists(<?php echo $pharmacy_billing_voucher_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_billing_voucher_list->isGridAdd())
		if (!$pharmacy_billing_voucher_list->Recordset->EOF)
			$pharmacy_billing_voucher_list->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_billing_voucher_list->isGridAdd() || $pharmacy_billing_voucher_list->isGridEdit()) {
		$pharmacy_billing_voucher_list->RowIndex = '$rowindex$';
		$pharmacy_billing_voucher_list->loadRowValues();

		// Set row properties
		$pharmacy_billing_voucher->resetAttributes();
		$pharmacy_billing_voucher->RowAttrs->merge(["data-rowindex" => $pharmacy_billing_voucher_list->RowIndex, "id" => "r0_pharmacy_billing_voucher", "data-rowtype" => ROWTYPE_ADD]);
		$pharmacy_billing_voucher->RowAttrs->appendClass("ew-template");
		$pharmacy_billing_voucher->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_billing_voucher_list->renderRow();

		// Render list options
		$pharmacy_billing_voucher_list->renderListOptions();
		$pharmacy_billing_voucher_list->StartRowCount = 0;
?>
	<tr <?php echo $pharmacy_billing_voucher->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_billing_voucher_list->ListOptions->render("body", "left", $pharmacy_billing_voucher_list->RowIndex);
?>
	<?php if ($pharmacy_billing_voucher_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_pharmacy_billing_voucher_id" class="form-group pharmacy_billing_voucher_id"></span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_id" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_id" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber">
<span id="el$rowindex$_pharmacy_billing_voucher_BillNumber" class="form-group pharmacy_billing_voucher_BillNumber">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->BillNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->BillNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->BillNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->BillNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<span id="el$rowindex$_pharmacy_billing_voucher_PatientId" class="form-group pharmacy_billing_voucher_PatientId">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientId" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PatientId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->PatientId->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PatientId" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<span id="el$rowindex$_pharmacy_billing_voucher_PatientName" class="form-group pharmacy_billing_voucher_PatientName">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientName" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->PatientName->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PatientName" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile">
<span id="el$rowindex$_pharmacy_billing_voucher_Mobile" class="form-group pharmacy_billing_voucher_Mobile">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Mobile" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->Mobile->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->Mobile->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Mobile" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->Mobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<span id="el$rowindex$_pharmacy_billing_voucher_mrnno" class="form-group pharmacy_billing_voucher_mrnno">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_mrnno" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->mrnno->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->mrnno->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->mrnno->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_mrnno" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP">
<span id="el$rowindex$_pharmacy_billing_voucher_IP_OP" class="form-group pharmacy_billing_voucher_IP_OP">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_IP_OP" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->IP_OP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->IP_OP->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->IP_OP->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_IP_OP" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->IP_OP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor">
<span id="el$rowindex$_pharmacy_billing_voucher_Doctor" class="form-group pharmacy_billing_voucher_Doctor">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Doctor" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->Doctor->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->Doctor->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Doctor" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->Doctor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment">
<span id="el$rowindex$_pharmacy_billing_voucher_ModeofPayment" class="form-group pharmacy_billing_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $pharmacy_billing_voucher_list->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment"<?php echo $pharmacy_billing_voucher_list->ModeofPayment->editAttributes() ?>>
			<?php echo $pharmacy_billing_voucher_list->ModeofPayment->selectOptionListHtml("x{$pharmacy_billing_voucher_list->RowIndex}_ModeofPayment") ?>
		</select>
</div>
<?php echo $pharmacy_billing_voucher_list->ModeofPayment->Lookup->getParamTag($pharmacy_billing_voucher_list, "p_x" . $pharmacy_billing_voucher_list->RowIndex . "_ModeofPayment") ?>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_ModeofPayment" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->ModeofPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<span id="el$rowindex$_pharmacy_billing_voucher_Amount" class="form-group pharmacy_billing_voucher_Amount">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Amount" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->Amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->Amount->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Amount" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues">
<span id="el$rowindex$_pharmacy_billing_voucher_AnyDues" class="form-group pharmacy_billing_voucher_AnyDues">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_AnyDues" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->AnyDues->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->AnyDues->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->AnyDues->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_AnyDues" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->AnyDues->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_createdby" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_createdby" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_createddatetime" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_modifiedby" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->RealizationAmount->Visible) { // RealizationAmount ?>
		<td data-name="RealizationAmount">
<span id="el$rowindex$_pharmacy_billing_voucher_RealizationAmount" class="form-group pharmacy_billing_voucher_RealizationAmount">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_RealizationAmount" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->RealizationAmount->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->RealizationAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_RealizationAmount" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->RealizationAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->CId->Visible) { // CId ?>
		<td data-name="CId">
<span id="el$rowindex$_pharmacy_billing_voucher_CId" class="form-group pharmacy_billing_voucher_CId">
<?php $pharmacy_billing_voucher_list->CId->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId"><?php echo EmptyValue(strval($pharmacy_billing_voucher_list->CId->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_billing_voucher_list->CId->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_voucher_list->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_billing_voucher_list->CId->ReadOnly || $pharmacy_billing_voucher_list->CId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_voucher_list->CId->Lookup->getParamTag($pharmacy_billing_voucher_list, "p_x" . $pharmacy_billing_voucher_list->RowIndex . "_CId") ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_voucher_list->CId->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" value="<?php echo $pharmacy_billing_voucher_list->CId->CurrentValue ?>"<?php echo $pharmacy_billing_voucher_list->CId->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CId" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->CId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName">
<span id="el$rowindex$_pharmacy_billing_voucher_PartnerName" class="form-group pharmacy_billing_voucher_PartnerName">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PartnerName" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PartnerName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->PartnerName->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->PartnerName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PartnerName" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PartnerName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber">
<span id="el$rowindex$_pharmacy_billing_voucher_CardNumber" class="form-group pharmacy_billing_voucher_CardNumber">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_CardNumber" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->CardNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->CardNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->CardNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CardNumber" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->CardNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->BillStatus->Visible) { // BillStatus ?>
		<td data-name="BillStatus">
<span id="el$rowindex$_pharmacy_billing_voucher_BillStatus" class="form-group pharmacy_billing_voucher_BillStatus">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_BillStatus" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->BillStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->BillStatus->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->BillStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillStatus" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->BillStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader">
<span id="el$rowindex$_pharmacy_billing_voucher_ReportHeader" class="form-group pharmacy_billing_voucher_ReportHeader">
<div id="tp_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_ReportHeader" data-value-separator="<?php echo $pharmacy_billing_voucher_list->ReportHeader->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" value="{value}"<?php echo $pharmacy_billing_voucher_list->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher_list->ReportHeader->checkBoxListHtml(FALSE, "x{$pharmacy_billing_voucher_list->RowIndex}_ReportHeader[]") ?>
</div></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_ReportHeader" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->ReportHeader->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->PharID->Visible) { // PharID ?>
		<td data-name="PharID">
<span id="el$rowindex$_pharmacy_billing_voucher_PharID" class="form-group pharmacy_billing_voucher_PharID">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PharID" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PharID" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PharID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PharID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher_list->PharID->EditValue ?>"<?php echo $pharmacy_billing_voucher_list->PharID->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PharID" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PharID" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PharID" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->PharID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->UserName->Visible) { // UserName ?>
		<td data-name="UserName">
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_UserName" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_UserName" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_UserName" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->UserName->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_billing_voucher_list->ListOptions->render("body", "right", $pharmacy_billing_voucher_list->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_billing_voucherlist", "load"], function() {
	fpharmacy_billing_voucherlist.updateLists(<?php echo $pharmacy_billing_voucher_list->RowIndex ?>);
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
<?php if ($pharmacy_billing_voucher_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $pharmacy_billing_voucher_list->FormKeyCountName ?>" id="<?php echo $pharmacy_billing_voucher_list->FormKeyCountName ?>" value="<?php echo $pharmacy_billing_voucher_list->KeyCount ?>">
<?php echo $pharmacy_billing_voucher_list->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $pharmacy_billing_voucher_list->FormKeyCountName ?>" id="<?php echo $pharmacy_billing_voucher_list->FormKeyCountName ?>" value="<?php echo $pharmacy_billing_voucher_list->KeyCount ?>">
<?php echo $pharmacy_billing_voucher_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$pharmacy_billing_voucher->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_billing_voucher_list->Recordset)
	$pharmacy_billing_voucher_list->Recordset->Close();
?>
<?php if (!$pharmacy_billing_voucher_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_billing_voucher_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_billing_voucher_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_billing_voucher_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->TotalRecords == 0 && !$pharmacy_billing_voucher->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_billing_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_billing_voucher_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_billing_voucher_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pharmacy_billing_voucher->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_billing_voucher",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_billing_voucher_list->terminate();
?>