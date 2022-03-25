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
$view_billing_voucher_print_list = new view_billing_voucher_print_list();

// Run the page
$view_billing_voucher_print_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_billing_voucher_print_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_billing_voucher_print->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_billing_voucher_printlist = currentForm = new ew.Form("fview_billing_voucher_printlist", "list");
fview_billing_voucher_printlist.formKeyCountName = '<?php echo $view_billing_voucher_print_list->FormKeyCountName ?>';

// Validate form
fview_billing_voucher_printlist.validate = function() {
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
		<?php if ($view_billing_voucher_print_list->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->PatientId->caption(), $view_billing_voucher_print->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_list->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->PatientName->caption(), $view_billing_voucher_print->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_list->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->Mobile->caption(), $view_billing_voucher_print->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_list->Doctor->Required) { ?>
			elm = this.getElements("x" + infix + "_Doctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->Doctor->caption(), $view_billing_voucher_print->Doctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_list->ModeofPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeofPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->ModeofPayment->caption(), $view_billing_voucher_print->ModeofPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_list->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->Amount->caption(), $view_billing_voucher_print->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_list->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->createddatetime->caption(), $view_billing_voucher_print->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_list->BillNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_BillNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->BillNumber->caption(), $view_billing_voucher_print->BillNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_list->BankName->Required) { ?>
			elm = this.getElements("x" + infix + "_BankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->BankName->caption(), $view_billing_voucher_print->BankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_list->UserName->Required) { ?>
			elm = this.getElements("x" + infix + "_UserName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->UserName->caption(), $view_billing_voucher_print->UserName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_list->BillType->Required) { ?>
			elm = this.getElements("x" + infix + "_BillType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->BillType->caption(), $view_billing_voucher_print->BillType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_list->CancelModeOfPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelModeOfPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->CancelModeOfPayment->caption(), $view_billing_voucher_print->CancelModeOfPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_list->CancelAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->CancelAmount->caption(), $view_billing_voucher_print->CancelAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_list->CancelBankName->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelBankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->CancelBankName->caption(), $view_billing_voucher_print->CancelBankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_list->CancelTransactionNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelTransactionNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->CancelTransactionNumber->caption(), $view_billing_voucher_print->CancelTransactionNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_list->LabTest->Required) { ?>
			elm = this.getElements("x" + infix + "_LabTest");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->LabTest->caption(), $view_billing_voucher_print->LabTest->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_print_list->sid->Required) { ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->sid->caption(), $view_billing_voucher_print->sid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_print->sid->errorMessage()) ?>");
		<?php if ($view_billing_voucher_print_list->SidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_SidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_print->SidNo->caption(), $view_billing_voucher_print->SidNo->RequiredErrorMessage)) ?>");
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
fview_billing_voucher_printlist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Mobile", false)) return false;
	if (ew.valueChanged(fobj, infix, "Doctor", false)) return false;
	if (ew.valueChanged(fobj, infix, "ModeofPayment", false)) return false;
	if (ew.valueChanged(fobj, infix, "Amount", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillNumber", false)) return false;
	if (ew.valueChanged(fobj, infix, "BankName", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillType", false)) return false;
	if (ew.valueChanged(fobj, infix, "CancelModeOfPayment", false)) return false;
	if (ew.valueChanged(fobj, infix, "CancelAmount", false)) return false;
	if (ew.valueChanged(fobj, infix, "CancelBankName", false)) return false;
	if (ew.valueChanged(fobj, infix, "CancelTransactionNumber", false)) return false;
	if (ew.valueChanged(fobj, infix, "LabTest", false)) return false;
	if (ew.valueChanged(fobj, infix, "sid", false)) return false;
	if (ew.valueChanged(fobj, infix, "SidNo", false)) return false;
	return true;
}

// Form_CustomValidate event
fview_billing_voucher_printlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_billing_voucher_printlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_billing_voucher_printlist.lists["x_ModeofPayment"] = <?php echo $view_billing_voucher_print_list->ModeofPayment->Lookup->toClientList() ?>;
fview_billing_voucher_printlist.lists["x_ModeofPayment"].options = <?php echo JsonEncode($view_billing_voucher_print_list->ModeofPayment->lookupOptions()) ?>;

// Form object for search
var fview_billing_voucher_printlistsrch = currentSearchForm = new ew.Form("fview_billing_voucher_printlistsrch");

// Validate function for search
fview_billing_voucher_printlistsrch.validate = function(fobj) {
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
fview_billing_voucher_printlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_billing_voucher_printlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_billing_voucher_printlistsrch.filterList = <?php echo $view_billing_voucher_print_list->getFilterList() ?>;
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
<?php if (!$view_billing_voucher_print->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_billing_voucher_print_list->TotalRecs > 0 && $view_billing_voucher_print_list->ExportOptions->visible()) { ?>
<?php $view_billing_voucher_print_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_billing_voucher_print_list->ImportOptions->visible()) { ?>
<?php $view_billing_voucher_print_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_billing_voucher_print_list->SearchOptions->visible()) { ?>
<?php $view_billing_voucher_print_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_billing_voucher_print_list->FilterOptions->visible()) { ?>
<?php $view_billing_voucher_print_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_billing_voucher_print_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_billing_voucher_print->isExport() && !$view_billing_voucher_print->CurrentAction) { ?>
<form name="fview_billing_voucher_printlistsrch" id="fview_billing_voucher_printlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_billing_voucher_print_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_billing_voucher_printlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_billing_voucher_print">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_billing_voucher_print_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_billing_voucher_print->RowType = ROWTYPE_SEARCH;

// Render row
$view_billing_voucher_print->resetAttributes();
$view_billing_voucher_print_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_billing_voucher_print->PatientId->Visible) { // PatientId ?>
	<div id="xsc_PatientId" class="ew-cell form-group">
		<label for="x_PatientId" class="ew-search-caption ew-label"><?php echo $view_billing_voucher_print->PatientId->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="="></span>
		<span class="ew-search-field">
<input type="text" data-table="view_billing_voucher_print" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->PatientId->EditValue ?>"<?php echo $view_billing_voucher_print->PatientId->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_billing_voucher_print->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_billing_voucher_print" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->PatientName->EditValue ?>"<?php echo $view_billing_voucher_print->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_billing_voucher_print->Mobile->Visible) { // Mobile ?>
	<div id="xsc_Mobile" class="ew-cell form-group">
		<label for="x_Mobile" class="ew-search-caption ew-label"><?php echo $view_billing_voucher_print->Mobile->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_billing_voucher_print" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->Mobile->EditValue ?>"<?php echo $view_billing_voucher_print->Mobile->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_print->BillNumber->Visible) { // BillNumber ?>
	<div id="xsc_BillNumber" class="ew-cell form-group">
		<label for="x_BillNumber" class="ew-search-caption ew-label"><?php echo $view_billing_voucher_print->BillNumber->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_billing_voucher_print" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->BillNumber->EditValue ?>"<?php echo $view_billing_voucher_print->BillNumber->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_billing_voucher_print_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_billing_voucher_print_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_billing_voucher_print_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_billing_voucher_print_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_billing_voucher_print_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_billing_voucher_print_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_billing_voucher_print_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_billing_voucher_print_list->showPageHeader(); ?>
<?php
$view_billing_voucher_print_list->showMessage();
?>
<?php if ($view_billing_voucher_print_list->TotalRecs > 0 || $view_billing_voucher_print->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_billing_voucher_print_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_billing_voucher_print">
<?php if (!$view_billing_voucher_print->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_billing_voucher_print->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_billing_voucher_print_list->Pager)) $view_billing_voucher_print_list->Pager = new NumericPager($view_billing_voucher_print_list->StartRec, $view_billing_voucher_print_list->DisplayRecs, $view_billing_voucher_print_list->TotalRecs, $view_billing_voucher_print_list->RecRange, $view_billing_voucher_print_list->AutoHidePager) ?>
<?php if ($view_billing_voucher_print_list->Pager->RecordCount > 0 && $view_billing_voucher_print_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_billing_voucher_print_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_voucher_print_list->pageUrl() ?>start=<?php echo $view_billing_voucher_print_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_billing_voucher_print_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_voucher_print_list->pageUrl() ?>start=<?php echo $view_billing_voucher_print_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_billing_voucher_print_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_billing_voucher_print_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_billing_voucher_print_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_voucher_print_list->pageUrl() ?>start=<?php echo $view_billing_voucher_print_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_billing_voucher_print_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_voucher_print_list->pageUrl() ?>start=<?php echo $view_billing_voucher_print_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_billing_voucher_print_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_billing_voucher_print_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_billing_voucher_print_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_billing_voucher_print_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_billing_voucher_print_list->TotalRecs > 0 && (!$view_billing_voucher_print_list->AutoHidePageSizeSelector || $view_billing_voucher_print_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_billing_voucher_print">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_billing_voucher_print_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_billing_voucher_print_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_billing_voucher_print_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_billing_voucher_print_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_billing_voucher_print_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_billing_voucher_print_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_billing_voucher_print->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_billing_voucher_print_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_billing_voucher_printlist" id="fview_billing_voucher_printlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_billing_voucher_print_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_billing_voucher_print_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher_print">
<div id="gmp_view_billing_voucher_print" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_billing_voucher_print_list->TotalRecs > 0 || $view_billing_voucher_print->isGridEdit()) { ?>
<table id="tbl_view_billing_voucher_printlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_billing_voucher_print_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_billing_voucher_print_list->renderListOptions();

// Render list options (header, left)
$view_billing_voucher_print_list->ListOptions->render("header", "left");
?>
<?php if ($view_billing_voucher_print->PatientId->Visible) { // PatientId ?>
	<?php if ($view_billing_voucher_print->sortUrl($view_billing_voucher_print->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_billing_voucher_print->PatientId->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_PatientId" class="view_billing_voucher_print_PatientId"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_print->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_billing_voucher_print->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher_print->SortUrl($view_billing_voucher_print->PatientId) ?>',1);"><div id="elh_view_billing_voucher_print_PatientId" class="view_billing_voucher_print_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_print->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_print->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher_print->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_print->PatientName->Visible) { // PatientName ?>
	<?php if ($view_billing_voucher_print->sortUrl($view_billing_voucher_print->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_billing_voucher_print->PatientName->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_PatientName" class="view_billing_voucher_print_PatientName"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_print->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_billing_voucher_print->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher_print->SortUrl($view_billing_voucher_print->PatientName) ?>',1);"><div id="elh_view_billing_voucher_print_PatientName" class="view_billing_voucher_print_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_print->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_print->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher_print->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_print->Mobile->Visible) { // Mobile ?>
	<?php if ($view_billing_voucher_print->sortUrl($view_billing_voucher_print->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_billing_voucher_print->Mobile->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_Mobile" class="view_billing_voucher_print_Mobile"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_print->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_billing_voucher_print->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher_print->SortUrl($view_billing_voucher_print->Mobile) ?>',1);"><div id="elh_view_billing_voucher_print_Mobile" class="view_billing_voucher_print_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_print->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_print->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher_print->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_print->Doctor->Visible) { // Doctor ?>
	<?php if ($view_billing_voucher_print->sortUrl($view_billing_voucher_print->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_billing_voucher_print->Doctor->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_Doctor" class="view_billing_voucher_print_Doctor"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_print->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_billing_voucher_print->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher_print->SortUrl($view_billing_voucher_print->Doctor) ?>',1);"><div id="elh_view_billing_voucher_print_Doctor" class="view_billing_voucher_print_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_print->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_print->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher_print->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_print->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_billing_voucher_print->sortUrl($view_billing_voucher_print->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_billing_voucher_print->ModeofPayment->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_ModeofPayment" class="view_billing_voucher_print_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_print->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_billing_voucher_print->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher_print->SortUrl($view_billing_voucher_print->ModeofPayment) ?>',1);"><div id="elh_view_billing_voucher_print_ModeofPayment" class="view_billing_voucher_print_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_print->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_print->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher_print->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_print->Amount->Visible) { // Amount ?>
	<?php if ($view_billing_voucher_print->sortUrl($view_billing_voucher_print->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_billing_voucher_print->Amount->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_Amount" class="view_billing_voucher_print_Amount"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_print->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_billing_voucher_print->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher_print->SortUrl($view_billing_voucher_print->Amount) ?>',1);"><div id="elh_view_billing_voucher_print_Amount" class="view_billing_voucher_print_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_print->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_print->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher_print->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_print->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_billing_voucher_print->sortUrl($view_billing_voucher_print->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_billing_voucher_print->createddatetime->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_createddatetime" class="view_billing_voucher_print_createddatetime"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_print->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_billing_voucher_print->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher_print->SortUrl($view_billing_voucher_print->createddatetime) ?>',1);"><div id="elh_view_billing_voucher_print_createddatetime" class="view_billing_voucher_print_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_print->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_print->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher_print->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_print->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_billing_voucher_print->sortUrl($view_billing_voucher_print->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_billing_voucher_print->BillNumber->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_BillNumber" class="view_billing_voucher_print_BillNumber"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_print->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_billing_voucher_print->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher_print->SortUrl($view_billing_voucher_print->BillNumber) ?>',1);"><div id="elh_view_billing_voucher_print_BillNumber" class="view_billing_voucher_print_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_print->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_print->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher_print->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_print->BankName->Visible) { // BankName ?>
	<?php if ($view_billing_voucher_print->sortUrl($view_billing_voucher_print->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $view_billing_voucher_print->BankName->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_BankName" class="view_billing_voucher_print_BankName"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_print->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $view_billing_voucher_print->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher_print->SortUrl($view_billing_voucher_print->BankName) ?>',1);"><div id="elh_view_billing_voucher_print_BankName" class="view_billing_voucher_print_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_print->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_print->BankName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher_print->BankName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_print->UserName->Visible) { // UserName ?>
	<?php if ($view_billing_voucher_print->sortUrl($view_billing_voucher_print->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $view_billing_voucher_print->UserName->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_UserName" class="view_billing_voucher_print_UserName"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_print->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $view_billing_voucher_print->UserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher_print->SortUrl($view_billing_voucher_print->UserName) ?>',1);"><div id="elh_view_billing_voucher_print_UserName" class="view_billing_voucher_print_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_print->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_print->UserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher_print->UserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_print->BillType->Visible) { // BillType ?>
	<?php if ($view_billing_voucher_print->sortUrl($view_billing_voucher_print->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $view_billing_voucher_print->BillType->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_BillType" class="view_billing_voucher_print_BillType"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_print->BillType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $view_billing_voucher_print->BillType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher_print->SortUrl($view_billing_voucher_print->BillType) ?>',1);"><div id="elh_view_billing_voucher_print_BillType" class="view_billing_voucher_print_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_print->BillType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_print->BillType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher_print->BillType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
	<?php if ($view_billing_voucher_print->sortUrl($view_billing_voucher_print->CancelModeOfPayment) == "") { ?>
		<th data-name="CancelModeOfPayment" class="<?php echo $view_billing_voucher_print->CancelModeOfPayment->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_CancelModeOfPayment" class="view_billing_voucher_print_CancelModeOfPayment"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_print->CancelModeOfPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelModeOfPayment" class="<?php echo $view_billing_voucher_print->CancelModeOfPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher_print->SortUrl($view_billing_voucher_print->CancelModeOfPayment) ?>',1);"><div id="elh_view_billing_voucher_print_CancelModeOfPayment" class="view_billing_voucher_print_CancelModeOfPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_print->CancelModeOfPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_print->CancelModeOfPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher_print->CancelModeOfPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelAmount->Visible) { // CancelAmount ?>
	<?php if ($view_billing_voucher_print->sortUrl($view_billing_voucher_print->CancelAmount) == "") { ?>
		<th data-name="CancelAmount" class="<?php echo $view_billing_voucher_print->CancelAmount->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_CancelAmount" class="view_billing_voucher_print_CancelAmount"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_print->CancelAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelAmount" class="<?php echo $view_billing_voucher_print->CancelAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher_print->SortUrl($view_billing_voucher_print->CancelAmount) ?>',1);"><div id="elh_view_billing_voucher_print_CancelAmount" class="view_billing_voucher_print_CancelAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_print->CancelAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_print->CancelAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher_print->CancelAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelBankName->Visible) { // CancelBankName ?>
	<?php if ($view_billing_voucher_print->sortUrl($view_billing_voucher_print->CancelBankName) == "") { ?>
		<th data-name="CancelBankName" class="<?php echo $view_billing_voucher_print->CancelBankName->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_CancelBankName" class="view_billing_voucher_print_CancelBankName"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_print->CancelBankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelBankName" class="<?php echo $view_billing_voucher_print->CancelBankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher_print->SortUrl($view_billing_voucher_print->CancelBankName) ?>',1);"><div id="elh_view_billing_voucher_print_CancelBankName" class="view_billing_voucher_print_CancelBankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_print->CancelBankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_print->CancelBankName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher_print->CancelBankName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
	<?php if ($view_billing_voucher_print->sortUrl($view_billing_voucher_print->CancelTransactionNumber) == "") { ?>
		<th data-name="CancelTransactionNumber" class="<?php echo $view_billing_voucher_print->CancelTransactionNumber->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_CancelTransactionNumber" class="view_billing_voucher_print_CancelTransactionNumber"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_print->CancelTransactionNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelTransactionNumber" class="<?php echo $view_billing_voucher_print->CancelTransactionNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher_print->SortUrl($view_billing_voucher_print->CancelTransactionNumber) ?>',1);"><div id="elh_view_billing_voucher_print_CancelTransactionNumber" class="view_billing_voucher_print_CancelTransactionNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_print->CancelTransactionNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_print->CancelTransactionNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher_print->CancelTransactionNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_print->LabTest->Visible) { // LabTest ?>
	<?php if ($view_billing_voucher_print->sortUrl($view_billing_voucher_print->LabTest) == "") { ?>
		<th data-name="LabTest" class="<?php echo $view_billing_voucher_print->LabTest->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_LabTest" class="view_billing_voucher_print_LabTest"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_print->LabTest->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabTest" class="<?php echo $view_billing_voucher_print->LabTest->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher_print->SortUrl($view_billing_voucher_print->LabTest) ?>',1);"><div id="elh_view_billing_voucher_print_LabTest" class="view_billing_voucher_print_LabTest">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_print->LabTest->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_print->LabTest->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher_print->LabTest->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_print->sid->Visible) { // sid ?>
	<?php if ($view_billing_voucher_print->sortUrl($view_billing_voucher_print->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $view_billing_voucher_print->sid->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_sid" class="view_billing_voucher_print_sid"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_print->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $view_billing_voucher_print->sid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher_print->SortUrl($view_billing_voucher_print->sid) ?>',1);"><div id="elh_view_billing_voucher_print_sid" class="view_billing_voucher_print_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_print->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_print->sid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher_print->sid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_print->SidNo->Visible) { // SidNo ?>
	<?php if ($view_billing_voucher_print->sortUrl($view_billing_voucher_print->SidNo) == "") { ?>
		<th data-name="SidNo" class="<?php echo $view_billing_voucher_print->SidNo->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_SidNo" class="view_billing_voucher_print_SidNo"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_print->SidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SidNo" class="<?php echo $view_billing_voucher_print->SidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher_print->SortUrl($view_billing_voucher_print->SidNo) ?>',1);"><div id="elh_view_billing_voucher_print_SidNo" class="view_billing_voucher_print_SidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_print->SidNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_print->SidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher_print->SidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_billing_voucher_print_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_billing_voucher_print->ExportAll && $view_billing_voucher_print->isExport()) {
	$view_billing_voucher_print_list->StopRec = $view_billing_voucher_print_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_billing_voucher_print_list->TotalRecs > $view_billing_voucher_print_list->StartRec + $view_billing_voucher_print_list->DisplayRecs - 1)
		$view_billing_voucher_print_list->StopRec = $view_billing_voucher_print_list->StartRec + $view_billing_voucher_print_list->DisplayRecs - 1;
	else
		$view_billing_voucher_print_list->StopRec = $view_billing_voucher_print_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $view_billing_voucher_print_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_billing_voucher_print_list->FormKeyCountName) && ($view_billing_voucher_print->isGridAdd() || $view_billing_voucher_print->isGridEdit() || $view_billing_voucher_print->isConfirm())) {
		$view_billing_voucher_print_list->KeyCount = $CurrentForm->getValue($view_billing_voucher_print_list->FormKeyCountName);
		$view_billing_voucher_print_list->StopRec = $view_billing_voucher_print_list->StartRec + $view_billing_voucher_print_list->KeyCount - 1;
	}
}
$view_billing_voucher_print_list->RecCnt = $view_billing_voucher_print_list->StartRec - 1;
if ($view_billing_voucher_print_list->Recordset && !$view_billing_voucher_print_list->Recordset->EOF) {
	$view_billing_voucher_print_list->Recordset->moveFirst();
	$selectLimit = $view_billing_voucher_print_list->UseSelectLimit;
	if (!$selectLimit && $view_billing_voucher_print_list->StartRec > 1)
		$view_billing_voucher_print_list->Recordset->move($view_billing_voucher_print_list->StartRec - 1);
} elseif (!$view_billing_voucher_print->AllowAddDeleteRow && $view_billing_voucher_print_list->StopRec == 0) {
	$view_billing_voucher_print_list->StopRec = $view_billing_voucher_print->GridAddRowCount;
}

// Initialize aggregate
$view_billing_voucher_print->RowType = ROWTYPE_AGGREGATEINIT;
$view_billing_voucher_print->resetAttributes();
$view_billing_voucher_print_list->renderRow();
if ($view_billing_voucher_print->isGridAdd())
	$view_billing_voucher_print_list->RowIndex = 0;
if ($view_billing_voucher_print->isGridEdit())
	$view_billing_voucher_print_list->RowIndex = 0;
while ($view_billing_voucher_print_list->RecCnt < $view_billing_voucher_print_list->StopRec) {
	$view_billing_voucher_print_list->RecCnt++;
	if ($view_billing_voucher_print_list->RecCnt >= $view_billing_voucher_print_list->StartRec) {
		$view_billing_voucher_print_list->RowCnt++;
		if ($view_billing_voucher_print->isGridAdd() || $view_billing_voucher_print->isGridEdit() || $view_billing_voucher_print->isConfirm()) {
			$view_billing_voucher_print_list->RowIndex++;
			$CurrentForm->Index = $view_billing_voucher_print_list->RowIndex;
			if ($CurrentForm->hasValue($view_billing_voucher_print_list->FormActionName) && $view_billing_voucher_print_list->EventCancelled)
				$view_billing_voucher_print_list->RowAction = strval($CurrentForm->getValue($view_billing_voucher_print_list->FormActionName));
			elseif ($view_billing_voucher_print->isGridAdd())
				$view_billing_voucher_print_list->RowAction = "insert";
			else
				$view_billing_voucher_print_list->RowAction = "";
		}

		// Set up key count
		$view_billing_voucher_print_list->KeyCount = $view_billing_voucher_print_list->RowIndex;

		// Init row class and style
		$view_billing_voucher_print->resetAttributes();
		$view_billing_voucher_print->CssClass = "";
		if ($view_billing_voucher_print->isGridAdd()) {
			$view_billing_voucher_print_list->loadRowValues(); // Load default values
		} else {
			$view_billing_voucher_print_list->loadRowValues($view_billing_voucher_print_list->Recordset); // Load row values
		}
		$view_billing_voucher_print->RowType = ROWTYPE_VIEW; // Render view
		if ($view_billing_voucher_print->isGridAdd()) // Grid add
			$view_billing_voucher_print->RowType = ROWTYPE_ADD; // Render add
		if ($view_billing_voucher_print->isGridAdd() && $view_billing_voucher_print->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_billing_voucher_print_list->restoreCurrentRowFormValues($view_billing_voucher_print_list->RowIndex); // Restore form values
		if ($view_billing_voucher_print->isGridEdit()) { // Grid edit
			if ($view_billing_voucher_print->EventCancelled)
				$view_billing_voucher_print_list->restoreCurrentRowFormValues($view_billing_voucher_print_list->RowIndex); // Restore form values
			if ($view_billing_voucher_print_list->RowAction == "insert")
				$view_billing_voucher_print->RowType = ROWTYPE_ADD; // Render add
			else
				$view_billing_voucher_print->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_billing_voucher_print->isGridEdit() && ($view_billing_voucher_print->RowType == ROWTYPE_EDIT || $view_billing_voucher_print->RowType == ROWTYPE_ADD) && $view_billing_voucher_print->EventCancelled) // Update failed
			$view_billing_voucher_print_list->restoreCurrentRowFormValues($view_billing_voucher_print_list->RowIndex); // Restore form values
		if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) // Edit row
			$view_billing_voucher_print_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$view_billing_voucher_print->RowAttrs = array_merge($view_billing_voucher_print->RowAttrs, array('data-rowindex'=>$view_billing_voucher_print_list->RowCnt, 'id'=>'r' . $view_billing_voucher_print_list->RowCnt . '_view_billing_voucher_print', 'data-rowtype'=>$view_billing_voucher_print->RowType));

		// Render row
		$view_billing_voucher_print_list->renderRow();

		// Render list options
		$view_billing_voucher_print_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_billing_voucher_print_list->RowAction <> "delete" && $view_billing_voucher_print_list->RowAction <> "insertdelete" && !($view_billing_voucher_print_list->RowAction == "insert" && $view_billing_voucher_print->isConfirm() && $view_billing_voucher_print_list->emptyRow())) {
?>
	<tr<?php echo $view_billing_voucher_print->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_billing_voucher_print_list->ListOptions->render("body", "left", $view_billing_voucher_print_list->RowCnt);
?>
	<?php if ($view_billing_voucher_print->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_billing_voucher_print->PatientId->cellAttributes() ?>>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_PatientId" class="form-group view_billing_voucher_print_PatientId">
<input type="text" data-table="view_billing_voucher_print" data-field="x_PatientId" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientId" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->PatientId->EditValue ?>"<?php echo $view_billing_voucher_print->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatientId" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientId" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_billing_voucher_print->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_PatientId" class="form-group view_billing_voucher_print_PatientId">
<span<?php echo $view_billing_voucher_print->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->PatientId->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatientId" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientId" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_billing_voucher_print->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_PatientId" class="view_billing_voucher_print_PatientId">
<span<?php echo $view_billing_voucher_print->PatientId->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->PatientId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_id" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_id" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_billing_voucher_print->id->CurrentValue) ?>">
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_id" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_id" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_billing_voucher_print->id->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT || $view_billing_voucher_print->CurrentMode == "edit") { ?>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_id" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_id" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_billing_voucher_print->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($view_billing_voucher_print->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_billing_voucher_print->PatientName->cellAttributes() ?>>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_PatientName" class="form-group view_billing_voucher_print_PatientName">
<input type="text" data-table="view_billing_voucher_print" data-field="x_PatientName" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientName" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->PatientName->EditValue ?>"<?php echo $view_billing_voucher_print->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatientName" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientName" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_billing_voucher_print->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_PatientName" class="form-group view_billing_voucher_print_PatientName">
<span<?php echo $view_billing_voucher_print->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->PatientName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatientName" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientName" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_billing_voucher_print->PatientName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_PatientName" class="view_billing_voucher_print_PatientName">
<span<?php echo $view_billing_voucher_print->PatientName->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $view_billing_voucher_print->Mobile->cellAttributes() ?>>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_Mobile" class="form-group view_billing_voucher_print_Mobile">
<input type="text" data-table="view_billing_voucher_print" data-field="x_Mobile" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_Mobile" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->Mobile->EditValue ?>"<?php echo $view_billing_voucher_print->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Mobile" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_Mobile" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_billing_voucher_print->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_Mobile" class="form-group view_billing_voucher_print_Mobile">
<span<?php echo $view_billing_voucher_print->Mobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->Mobile->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Mobile" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_Mobile" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_billing_voucher_print->Mobile->CurrentValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_Mobile" class="view_billing_voucher_print_Mobile">
<span<?php echo $view_billing_voucher_print->Mobile->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->Mobile->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $view_billing_voucher_print->Doctor->cellAttributes() ?>>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_Doctor" class="form-group view_billing_voucher_print_Doctor">
<input type="text" data-table="view_billing_voucher_print" data-field="x_Doctor" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_Doctor" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->Doctor->EditValue ?>"<?php echo $view_billing_voucher_print->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Doctor" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_Doctor" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($view_billing_voucher_print->Doctor->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_Doctor" class="form-group view_billing_voucher_print_Doctor">
<span<?php echo $view_billing_voucher_print->Doctor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->Doctor->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Doctor" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_Doctor" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($view_billing_voucher_print->Doctor->CurrentValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_Doctor" class="view_billing_voucher_print_Doctor">
<span<?php echo $view_billing_voucher_print->Doctor->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->Doctor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $view_billing_voucher_print->ModeofPayment->cellAttributes() ?>>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_ModeofPayment" class="form-group view_billing_voucher_print_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher_print" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_billing_voucher_print->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_ModeofPayment" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_ModeofPayment"<?php echo $view_billing_voucher_print->ModeofPayment->editAttributes() ?>>
		<?php echo $view_billing_voucher_print->ModeofPayment->selectOptionListHtml("x<?php echo $view_billing_voucher_print_list->RowIndex ?>_ModeofPayment") ?>
	</select>
</div>
<?php echo $view_billing_voucher_print->ModeofPayment->Lookup->getParamTag("p_x" . $view_billing_voucher_print_list->RowIndex . "_ModeofPayment") ?>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_ModeofPayment" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_ModeofPayment" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_billing_voucher_print->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_ModeofPayment" class="form-group view_billing_voucher_print_ModeofPayment">
<span<?php echo $view_billing_voucher_print->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->ModeofPayment->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_ModeofPayment" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_ModeofPayment" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_billing_voucher_print->ModeofPayment->CurrentValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_ModeofPayment" class="view_billing_voucher_print_ModeofPayment">
<span<?php echo $view_billing_voucher_print->ModeofPayment->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->ModeofPayment->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_billing_voucher_print->Amount->cellAttributes() ?>>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_Amount" class="form-group view_billing_voucher_print_Amount">
<input type="text" data-table="view_billing_voucher_print" data-field="x_Amount" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_Amount" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->Amount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->Amount->EditValue ?>"<?php echo $view_billing_voucher_print->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Amount" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_Amount" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_billing_voucher_print->Amount->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_Amount" class="form-group view_billing_voucher_print_Amount">
<span<?php echo $view_billing_voucher_print->Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->Amount->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Amount" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_Amount" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_billing_voucher_print->Amount->CurrentValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_Amount" class="view_billing_voucher_print_Amount">
<span<?php echo $view_billing_voucher_print->Amount->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->Amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_billing_voucher_print->createddatetime->cellAttributes() ?>>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_createddatetime" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_createddatetime" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_billing_voucher_print->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_createddatetime" class="view_billing_voucher_print_createddatetime">
<span<?php echo $view_billing_voucher_print->createddatetime->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_billing_voucher_print->BillNumber->cellAttributes() ?>>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_BillNumber" class="form-group view_billing_voucher_print_BillNumber">
<input type="text" data-table="view_billing_voucher_print" data-field="x_BillNumber" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillNumber" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->BillNumber->EditValue ?>"<?php echo $view_billing_voucher_print->BillNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BillNumber" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillNumber" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($view_billing_voucher_print->BillNumber->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_BillNumber" class="form-group view_billing_voucher_print_BillNumber">
<span<?php echo $view_billing_voucher_print->BillNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->BillNumber->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BillNumber" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillNumber" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($view_billing_voucher_print->BillNumber->CurrentValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_BillNumber" class="view_billing_voucher_print_BillNumber">
<span<?php echo $view_billing_voucher_print->BillNumber->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->BillNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->BankName->Visible) { // BankName ?>
		<td data-name="BankName"<?php echo $view_billing_voucher_print->BankName->cellAttributes() ?>>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_BankName" class="form-group view_billing_voucher_print_BankName">
<input type="text" data-table="view_billing_voucher_print" data-field="x_BankName" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_BankName" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->BankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->BankName->EditValue ?>"<?php echo $view_billing_voucher_print->BankName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BankName" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_BankName" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_billing_voucher_print->BankName->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_BankName" class="form-group view_billing_voucher_print_BankName">
<span<?php echo $view_billing_voucher_print->BankName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->BankName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BankName" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_BankName" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_billing_voucher_print->BankName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_BankName" class="view_billing_voucher_print_BankName">
<span<?php echo $view_billing_voucher_print->BankName->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->BankName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->UserName->Visible) { // UserName ?>
		<td data-name="UserName"<?php echo $view_billing_voucher_print->UserName->cellAttributes() ?>>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_UserName" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_UserName" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_billing_voucher_print->UserName->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_UserName" class="view_billing_voucher_print_UserName">
<span<?php echo $view_billing_voucher_print->UserName->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->UserName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->BillType->Visible) { // BillType ?>
		<td data-name="BillType"<?php echo $view_billing_voucher_print->BillType->cellAttributes() ?>>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_BillType" class="form-group view_billing_voucher_print_BillType">
<input type="text" data-table="view_billing_voucher_print" data-field="x_BillType" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillType" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->BillType->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->BillType->EditValue ?>"<?php echo $view_billing_voucher_print->BillType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BillType" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillType" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_billing_voucher_print->BillType->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_BillType" class="form-group view_billing_voucher_print_BillType">
<span<?php echo $view_billing_voucher_print->BillType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher_print->BillType->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BillType" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillType" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_billing_voucher_print->BillType->CurrentValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_BillType" class="view_billing_voucher_print_BillType">
<span<?php echo $view_billing_voucher_print->BillType->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->BillType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
		<td data-name="CancelModeOfPayment"<?php echo $view_billing_voucher_print->CancelModeOfPayment->cellAttributes() ?>>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_CancelModeOfPayment" class="form-group view_billing_voucher_print_CancelModeOfPayment">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelModeOfPayment" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelModeOfPayment" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelModeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->CancelModeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->CancelModeOfPayment->EditValue ?>"<?php echo $view_billing_voucher_print->CancelModeOfPayment->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CancelModeOfPayment" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelModeOfPayment" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelModeOfPayment" value="<?php echo HtmlEncode($view_billing_voucher_print->CancelModeOfPayment->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_CancelModeOfPayment" class="form-group view_billing_voucher_print_CancelModeOfPayment">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelModeOfPayment" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelModeOfPayment" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelModeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->CancelModeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->CancelModeOfPayment->EditValue ?>"<?php echo $view_billing_voucher_print->CancelModeOfPayment->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_CancelModeOfPayment" class="view_billing_voucher_print_CancelModeOfPayment">
<span<?php echo $view_billing_voucher_print->CancelModeOfPayment->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->CancelModeOfPayment->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->CancelAmount->Visible) { // CancelAmount ?>
		<td data-name="CancelAmount"<?php echo $view_billing_voucher_print->CancelAmount->cellAttributes() ?>>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_CancelAmount" class="form-group view_billing_voucher_print_CancelAmount">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelAmount" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelAmount" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->CancelAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->CancelAmount->EditValue ?>"<?php echo $view_billing_voucher_print->CancelAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CancelAmount" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelAmount" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelAmount" value="<?php echo HtmlEncode($view_billing_voucher_print->CancelAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_CancelAmount" class="form-group view_billing_voucher_print_CancelAmount">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelAmount" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelAmount" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->CancelAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->CancelAmount->EditValue ?>"<?php echo $view_billing_voucher_print->CancelAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_CancelAmount" class="view_billing_voucher_print_CancelAmount">
<span<?php echo $view_billing_voucher_print->CancelAmount->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->CancelAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->CancelBankName->Visible) { // CancelBankName ?>
		<td data-name="CancelBankName"<?php echo $view_billing_voucher_print->CancelBankName->cellAttributes() ?>>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_CancelBankName" class="form-group view_billing_voucher_print_CancelBankName">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelBankName" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelBankName" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelBankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->CancelBankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->CancelBankName->EditValue ?>"<?php echo $view_billing_voucher_print->CancelBankName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CancelBankName" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelBankName" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelBankName" value="<?php echo HtmlEncode($view_billing_voucher_print->CancelBankName->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_CancelBankName" class="form-group view_billing_voucher_print_CancelBankName">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelBankName" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelBankName" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelBankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->CancelBankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->CancelBankName->EditValue ?>"<?php echo $view_billing_voucher_print->CancelBankName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_CancelBankName" class="view_billing_voucher_print_CancelBankName">
<span<?php echo $view_billing_voucher_print->CancelBankName->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->CancelBankName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
		<td data-name="CancelTransactionNumber"<?php echo $view_billing_voucher_print->CancelTransactionNumber->cellAttributes() ?>>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_CancelTransactionNumber" class="form-group view_billing_voucher_print_CancelTransactionNumber">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelTransactionNumber" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelTransactionNumber" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelTransactionNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->CancelTransactionNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->CancelTransactionNumber->EditValue ?>"<?php echo $view_billing_voucher_print->CancelTransactionNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CancelTransactionNumber" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelTransactionNumber" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelTransactionNumber" value="<?php echo HtmlEncode($view_billing_voucher_print->CancelTransactionNumber->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_CancelTransactionNumber" class="form-group view_billing_voucher_print_CancelTransactionNumber">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelTransactionNumber" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelTransactionNumber" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelTransactionNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->CancelTransactionNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->CancelTransactionNumber->EditValue ?>"<?php echo $view_billing_voucher_print->CancelTransactionNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_CancelTransactionNumber" class="view_billing_voucher_print_CancelTransactionNumber">
<span<?php echo $view_billing_voucher_print->CancelTransactionNumber->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->CancelTransactionNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->LabTest->Visible) { // LabTest ?>
		<td data-name="LabTest"<?php echo $view_billing_voucher_print->LabTest->cellAttributes() ?>>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_LabTest" class="form-group view_billing_voucher_print_LabTest">
<input type="text" data-table="view_billing_voucher_print" data-field="x_LabTest" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_LabTest" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_LabTest" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->LabTest->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->LabTest->EditValue ?>"<?php echo $view_billing_voucher_print->LabTest->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_LabTest" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_LabTest" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_LabTest" value="<?php echo HtmlEncode($view_billing_voucher_print->LabTest->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_LabTest" class="form-group view_billing_voucher_print_LabTest">
<input type="text" data-table="view_billing_voucher_print" data-field="x_LabTest" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_LabTest" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_LabTest" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->LabTest->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->LabTest->EditValue ?>"<?php echo $view_billing_voucher_print->LabTest->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_LabTest" class="view_billing_voucher_print_LabTest">
<span<?php echo $view_billing_voucher_print->LabTest->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->LabTest->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->sid->Visible) { // sid ?>
		<td data-name="sid"<?php echo $view_billing_voucher_print->sid->cellAttributes() ?>>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_sid" class="form-group view_billing_voucher_print_sid">
<input type="text" data-table="view_billing_voucher_print" data-field="x_sid" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_sid" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->sid->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->sid->EditValue ?>"<?php echo $view_billing_voucher_print->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_sid" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_sid" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_billing_voucher_print->sid->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_sid" class="form-group view_billing_voucher_print_sid">
<input type="text" data-table="view_billing_voucher_print" data-field="x_sid" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_sid" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->sid->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->sid->EditValue ?>"<?php echo $view_billing_voucher_print->sid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_sid" class="view_billing_voucher_print_sid">
<span<?php echo $view_billing_voucher_print->sid->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->sid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->SidNo->Visible) { // SidNo ?>
		<td data-name="SidNo"<?php echo $view_billing_voucher_print->SidNo->cellAttributes() ?>>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_SidNo" class="form-group view_billing_voucher_print_SidNo">
<input type="text" data-table="view_billing_voucher_print" data-field="x_SidNo" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_SidNo" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_SidNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->SidNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->SidNo->EditValue ?>"<?php echo $view_billing_voucher_print->SidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_SidNo" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_SidNo" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_SidNo" value="<?php echo HtmlEncode($view_billing_voucher_print->SidNo->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_SidNo" class="form-group view_billing_voucher_print_SidNo">
<input type="text" data-table="view_billing_voucher_print" data-field="x_SidNo" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_SidNo" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_SidNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->SidNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->SidNo->EditValue ?>"<?php echo $view_billing_voucher_print->SidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_print_list->RowCnt ?>_view_billing_voucher_print_SidNo" class="view_billing_voucher_print_SidNo">
<span<?php echo $view_billing_voucher_print->SidNo->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->SidNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_billing_voucher_print_list->ListOptions->render("body", "right", $view_billing_voucher_print_list->RowCnt);
?>
	</tr>
<?php if ($view_billing_voucher_print->RowType == ROWTYPE_ADD || $view_billing_voucher_print->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_billing_voucher_printlist.updateLists(<?php echo $view_billing_voucher_print_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_billing_voucher_print->isGridAdd())
		if (!$view_billing_voucher_print_list->Recordset->EOF)
			$view_billing_voucher_print_list->Recordset->moveNext();
}
?>
<?php
	if ($view_billing_voucher_print->isGridAdd() || $view_billing_voucher_print->isGridEdit()) {
		$view_billing_voucher_print_list->RowIndex = '$rowindex$';
		$view_billing_voucher_print_list->loadRowValues();

		// Set row properties
		$view_billing_voucher_print->resetAttributes();
		$view_billing_voucher_print->RowAttrs = array_merge($view_billing_voucher_print->RowAttrs, array('data-rowindex'=>$view_billing_voucher_print_list->RowIndex, 'id'=>'r0_view_billing_voucher_print', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_billing_voucher_print->RowAttrs["class"], "ew-template");
		$view_billing_voucher_print->RowType = ROWTYPE_ADD;

		// Render row
		$view_billing_voucher_print_list->renderRow();

		// Render list options
		$view_billing_voucher_print_list->renderListOptions();
		$view_billing_voucher_print_list->StartRowCnt = 0;
?>
	<tr<?php echo $view_billing_voucher_print->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_billing_voucher_print_list->ListOptions->render("body", "left", $view_billing_voucher_print_list->RowIndex);
?>
	<?php if ($view_billing_voucher_print->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<span id="el$rowindex$_view_billing_voucher_print_PatientId" class="form-group view_billing_voucher_print_PatientId">
<input type="text" data-table="view_billing_voucher_print" data-field="x_PatientId" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientId" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->PatientId->EditValue ?>"<?php echo $view_billing_voucher_print->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatientId" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientId" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_billing_voucher_print->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<span id="el$rowindex$_view_billing_voucher_print_PatientName" class="form-group view_billing_voucher_print_PatientName">
<input type="text" data-table="view_billing_voucher_print" data-field="x_PatientName" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientName" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->PatientName->EditValue ?>"<?php echo $view_billing_voucher_print->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatientName" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientName" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_billing_voucher_print->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile">
<span id="el$rowindex$_view_billing_voucher_print_Mobile" class="form-group view_billing_voucher_print_Mobile">
<input type="text" data-table="view_billing_voucher_print" data-field="x_Mobile" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_Mobile" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->Mobile->EditValue ?>"<?php echo $view_billing_voucher_print->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Mobile" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_Mobile" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_billing_voucher_print->Mobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor">
<span id="el$rowindex$_view_billing_voucher_print_Doctor" class="form-group view_billing_voucher_print_Doctor">
<input type="text" data-table="view_billing_voucher_print" data-field="x_Doctor" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_Doctor" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->Doctor->EditValue ?>"<?php echo $view_billing_voucher_print->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Doctor" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_Doctor" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($view_billing_voucher_print->Doctor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment">
<span id="el$rowindex$_view_billing_voucher_print_ModeofPayment" class="form-group view_billing_voucher_print_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher_print" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_billing_voucher_print->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_ModeofPayment" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_ModeofPayment"<?php echo $view_billing_voucher_print->ModeofPayment->editAttributes() ?>>
		<?php echo $view_billing_voucher_print->ModeofPayment->selectOptionListHtml("x<?php echo $view_billing_voucher_print_list->RowIndex ?>_ModeofPayment") ?>
	</select>
</div>
<?php echo $view_billing_voucher_print->ModeofPayment->Lookup->getParamTag("p_x" . $view_billing_voucher_print_list->RowIndex . "_ModeofPayment") ?>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_ModeofPayment" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_ModeofPayment" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_billing_voucher_print->ModeofPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<span id="el$rowindex$_view_billing_voucher_print_Amount" class="form-group view_billing_voucher_print_Amount">
<input type="text" data-table="view_billing_voucher_print" data-field="x_Amount" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_Amount" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->Amount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->Amount->EditValue ?>"<?php echo $view_billing_voucher_print->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Amount" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_Amount" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_billing_voucher_print->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_createddatetime" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_createddatetime" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_billing_voucher_print->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber">
<span id="el$rowindex$_view_billing_voucher_print_BillNumber" class="form-group view_billing_voucher_print_BillNumber">
<input type="text" data-table="view_billing_voucher_print" data-field="x_BillNumber" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillNumber" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->BillNumber->EditValue ?>"<?php echo $view_billing_voucher_print->BillNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BillNumber" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillNumber" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($view_billing_voucher_print->BillNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->BankName->Visible) { // BankName ?>
		<td data-name="BankName">
<span id="el$rowindex$_view_billing_voucher_print_BankName" class="form-group view_billing_voucher_print_BankName">
<input type="text" data-table="view_billing_voucher_print" data-field="x_BankName" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_BankName" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->BankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->BankName->EditValue ?>"<?php echo $view_billing_voucher_print->BankName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BankName" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_BankName" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_billing_voucher_print->BankName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->UserName->Visible) { // UserName ?>
		<td data-name="UserName">
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_UserName" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_UserName" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_billing_voucher_print->UserName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->BillType->Visible) { // BillType ?>
		<td data-name="BillType">
<span id="el$rowindex$_view_billing_voucher_print_BillType" class="form-group view_billing_voucher_print_BillType">
<input type="text" data-table="view_billing_voucher_print" data-field="x_BillType" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillType" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->BillType->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->BillType->EditValue ?>"<?php echo $view_billing_voucher_print->BillType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BillType" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillType" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_billing_voucher_print->BillType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
		<td data-name="CancelModeOfPayment">
<span id="el$rowindex$_view_billing_voucher_print_CancelModeOfPayment" class="form-group view_billing_voucher_print_CancelModeOfPayment">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelModeOfPayment" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelModeOfPayment" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelModeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->CancelModeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->CancelModeOfPayment->EditValue ?>"<?php echo $view_billing_voucher_print->CancelModeOfPayment->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CancelModeOfPayment" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelModeOfPayment" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelModeOfPayment" value="<?php echo HtmlEncode($view_billing_voucher_print->CancelModeOfPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->CancelAmount->Visible) { // CancelAmount ?>
		<td data-name="CancelAmount">
<span id="el$rowindex$_view_billing_voucher_print_CancelAmount" class="form-group view_billing_voucher_print_CancelAmount">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelAmount" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelAmount" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->CancelAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->CancelAmount->EditValue ?>"<?php echo $view_billing_voucher_print->CancelAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CancelAmount" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelAmount" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelAmount" value="<?php echo HtmlEncode($view_billing_voucher_print->CancelAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->CancelBankName->Visible) { // CancelBankName ?>
		<td data-name="CancelBankName">
<span id="el$rowindex$_view_billing_voucher_print_CancelBankName" class="form-group view_billing_voucher_print_CancelBankName">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelBankName" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelBankName" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelBankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->CancelBankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->CancelBankName->EditValue ?>"<?php echo $view_billing_voucher_print->CancelBankName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CancelBankName" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelBankName" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelBankName" value="<?php echo HtmlEncode($view_billing_voucher_print->CancelBankName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
		<td data-name="CancelTransactionNumber">
<span id="el$rowindex$_view_billing_voucher_print_CancelTransactionNumber" class="form-group view_billing_voucher_print_CancelTransactionNumber">
<input type="text" data-table="view_billing_voucher_print" data-field="x_CancelTransactionNumber" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelTransactionNumber" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelTransactionNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->CancelTransactionNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->CancelTransactionNumber->EditValue ?>"<?php echo $view_billing_voucher_print->CancelTransactionNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CancelTransactionNumber" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelTransactionNumber" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_CancelTransactionNumber" value="<?php echo HtmlEncode($view_billing_voucher_print->CancelTransactionNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->LabTest->Visible) { // LabTest ?>
		<td data-name="LabTest">
<span id="el$rowindex$_view_billing_voucher_print_LabTest" class="form-group view_billing_voucher_print_LabTest">
<input type="text" data-table="view_billing_voucher_print" data-field="x_LabTest" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_LabTest" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_LabTest" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->LabTest->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->LabTest->EditValue ?>"<?php echo $view_billing_voucher_print->LabTest->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_LabTest" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_LabTest" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_LabTest" value="<?php echo HtmlEncode($view_billing_voucher_print->LabTest->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->sid->Visible) { // sid ?>
		<td data-name="sid">
<span id="el$rowindex$_view_billing_voucher_print_sid" class="form-group view_billing_voucher_print_sid">
<input type="text" data-table="view_billing_voucher_print" data-field="x_sid" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_sid" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->sid->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->sid->EditValue ?>"<?php echo $view_billing_voucher_print->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_sid" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_sid" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_billing_voucher_print->sid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_print->SidNo->Visible) { // SidNo ?>
		<td data-name="SidNo">
<span id="el$rowindex$_view_billing_voucher_print_SidNo" class="form-group view_billing_voucher_print_SidNo">
<input type="text" data-table="view_billing_voucher_print" data-field="x_SidNo" name="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_SidNo" id="x<?php echo $view_billing_voucher_print_list->RowIndex ?>_SidNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_print->SidNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_print->SidNo->EditValue ?>"<?php echo $view_billing_voucher_print->SidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_SidNo" name="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_SidNo" id="o<?php echo $view_billing_voucher_print_list->RowIndex ?>_SidNo" value="<?php echo HtmlEncode($view_billing_voucher_print->SidNo->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_billing_voucher_print_list->ListOptions->render("body", "right", $view_billing_voucher_print_list->RowIndex);
?>
<script>
fview_billing_voucher_printlist.updateLists(<?php echo $view_billing_voucher_print_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($view_billing_voucher_print->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $view_billing_voucher_print_list->FormKeyCountName ?>" id="<?php echo $view_billing_voucher_print_list->FormKeyCountName ?>" value="<?php echo $view_billing_voucher_print_list->KeyCount ?>">
<?php echo $view_billing_voucher_print_list->MultiSelectKey ?>
<?php } ?>
<?php if ($view_billing_voucher_print->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_billing_voucher_print_list->FormKeyCountName ?>" id="<?php echo $view_billing_voucher_print_list->FormKeyCountName ?>" value="<?php echo $view_billing_voucher_print_list->KeyCount ?>">
<?php echo $view_billing_voucher_print_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_billing_voucher_print->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_billing_voucher_print_list->Recordset)
	$view_billing_voucher_print_list->Recordset->Close();
?>
<?php if (!$view_billing_voucher_print->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_billing_voucher_print->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_billing_voucher_print_list->Pager)) $view_billing_voucher_print_list->Pager = new NumericPager($view_billing_voucher_print_list->StartRec, $view_billing_voucher_print_list->DisplayRecs, $view_billing_voucher_print_list->TotalRecs, $view_billing_voucher_print_list->RecRange, $view_billing_voucher_print_list->AutoHidePager) ?>
<?php if ($view_billing_voucher_print_list->Pager->RecordCount > 0 && $view_billing_voucher_print_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_billing_voucher_print_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_voucher_print_list->pageUrl() ?>start=<?php echo $view_billing_voucher_print_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_billing_voucher_print_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_voucher_print_list->pageUrl() ?>start=<?php echo $view_billing_voucher_print_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_billing_voucher_print_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_billing_voucher_print_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_billing_voucher_print_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_voucher_print_list->pageUrl() ?>start=<?php echo $view_billing_voucher_print_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_billing_voucher_print_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_voucher_print_list->pageUrl() ?>start=<?php echo $view_billing_voucher_print_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_billing_voucher_print_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_billing_voucher_print_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_billing_voucher_print_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_billing_voucher_print_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_billing_voucher_print_list->TotalRecs > 0 && (!$view_billing_voucher_print_list->AutoHidePageSizeSelector || $view_billing_voucher_print_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_billing_voucher_print">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_billing_voucher_print_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_billing_voucher_print_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_billing_voucher_print_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_billing_voucher_print_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_billing_voucher_print_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_billing_voucher_print_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_billing_voucher_print->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_billing_voucher_print_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_billing_voucher_print_list->TotalRecs == 0 && !$view_billing_voucher_print->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_billing_voucher_print_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_billing_voucher_print_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_billing_voucher_print->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_billing_voucher_print->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_billing_voucher_print", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_billing_voucher_print_list->terminate();
?>