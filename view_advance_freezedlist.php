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
$view_advance_freezed_list = new view_advance_freezed_list();

// Run the page
$view_advance_freezed_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_advance_freezed_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_advance_freezed->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_advance_freezedlist = currentForm = new ew.Form("fview_advance_freezedlist", "list");
fview_advance_freezedlist.formKeyCountName = '<?php echo $view_advance_freezed_list->FormKeyCountName ?>';

// Validate form
fview_advance_freezedlist.validate = function() {
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
		<?php if ($view_advance_freezed_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->id->caption(), $view_advance_freezed->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->freezed->Required) { ?>
			elm = this.getElements("x" + infix + "_freezed");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->freezed->caption(), $view_advance_freezed->freezed->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->PatientID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->PatientID->caption(), $view_advance_freezed->PatientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->PatientName->caption(), $view_advance_freezed->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Mobile->caption(), $view_advance_freezed->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->voucher_type->Required) { ?>
			elm = this.getElements("x" + infix + "_voucher_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->voucher_type->caption(), $view_advance_freezed->voucher_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->Details->Required) { ?>
			elm = this.getElements("x" + infix + "_Details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Details->caption(), $view_advance_freezed->Details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->ModeofPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeofPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->ModeofPayment->caption(), $view_advance_freezed->ModeofPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Amount->caption(), $view_advance_freezed->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->createdby->caption(), $view_advance_freezed->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->createddatetime->caption(), $view_advance_freezed->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->modifiedby->caption(), $view_advance_freezed->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->modifieddatetime->caption(), $view_advance_freezed->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->PatID->caption(), $view_advance_freezed->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->VisiteType->Required) { ?>
			elm = this.getElements("x" + infix + "_VisiteType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->VisiteType->caption(), $view_advance_freezed->VisiteType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->VisitDate->Required) { ?>
			elm = this.getElements("x" + infix + "_VisitDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->VisitDate->caption(), $view_advance_freezed->VisitDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->AdvanceNo->Required) { ?>
			elm = this.getElements("x" + infix + "_AdvanceNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->AdvanceNo->caption(), $view_advance_freezed->AdvanceNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->Status->Required) { ?>
			elm = this.getElements("x" + infix + "_Status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Status->caption(), $view_advance_freezed->Status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Date->caption(), $view_advance_freezed->Date->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->AdvanceValidityDate->Required) { ?>
			elm = this.getElements("x" + infix + "_AdvanceValidityDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->AdvanceValidityDate->caption(), $view_advance_freezed->AdvanceValidityDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->TotalRemainingAdvance->Required) { ?>
			elm = this.getElements("x" + infix + "_TotalRemainingAdvance");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->TotalRemainingAdvance->caption(), $view_advance_freezed->TotalRemainingAdvance->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->SeectPaymentMode->Required) { ?>
			elm = this.getElements("x" + infix + "_SeectPaymentMode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->SeectPaymentMode->caption(), $view_advance_freezed->SeectPaymentMode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->PaidAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_PaidAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->PaidAmount->caption(), $view_advance_freezed->PaidAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->Currency->Required) { ?>
			elm = this.getElements("x" + infix + "_Currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Currency->caption(), $view_advance_freezed->Currency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->CardNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CardNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->CardNumber->caption(), $view_advance_freezed->CardNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->BankName->Required) { ?>
			elm = this.getElements("x" + infix + "_BankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->BankName->caption(), $view_advance_freezed->BankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->HospID->caption(), $view_advance_freezed->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Reception->caption(), $view_advance_freezed->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->mrnno->caption(), $view_advance_freezed->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->GetUserName->Required) { ?>
			elm = this.getElements("x" + infix + "_GetUserName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->GetUserName->caption(), $view_advance_freezed->GetUserName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->AdjustmentwithAdvance->Required) { ?>
			elm = this.getElements("x" + infix + "_AdjustmentwithAdvance");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->AdjustmentwithAdvance->caption(), $view_advance_freezed->AdjustmentwithAdvance->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->AdjustmentBillNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_AdjustmentBillNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->AdjustmentBillNumber->caption(), $view_advance_freezed->AdjustmentBillNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->CancelAdvance->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelAdvance");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->CancelAdvance->caption(), $view_advance_freezed->CancelAdvance->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->CancelBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->CancelBy->caption(), $view_advance_freezed->CancelBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->CancelDate->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->CancelDate->caption(), $view_advance_freezed->CancelDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->CancelDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->CancelDateTime->caption(), $view_advance_freezed->CancelDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->CanceledBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CanceledBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->CanceledBy->caption(), $view_advance_freezed->CanceledBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->CancelStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->CancelStatus->caption(), $view_advance_freezed->CancelStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->Cash->Required) { ?>
			elm = this.getElements("x" + infix + "_Cash");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Cash->caption(), $view_advance_freezed->Cash->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_advance_freezed_list->Card->Required) { ?>
			elm = this.getElements("x" + infix + "_Card");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_advance_freezed->Card->caption(), $view_advance_freezed->Card->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fview_advance_freezedlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_advance_freezedlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_advance_freezedlist.lists["x_freezed"] = <?php echo $view_advance_freezed_list->freezed->Lookup->toClientList() ?>;
fview_advance_freezedlist.lists["x_freezed"].options = <?php echo JsonEncode($view_advance_freezed_list->freezed->options(FALSE, TRUE)) ?>;

// Form object for search
var fview_advance_freezedlistsrch = currentSearchForm = new ew.Form("fview_advance_freezedlistsrch");

// Validate function for search
fview_advance_freezedlistsrch.validate = function(fobj) {
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
fview_advance_freezedlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_advance_freezedlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_advance_freezedlistsrch.filterList = <?php echo $view_advance_freezed_list->getFilterList() ?>;
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
<?php if (!$view_advance_freezed->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_advance_freezed_list->TotalRecs > 0 && $view_advance_freezed_list->ExportOptions->visible()) { ?>
<?php $view_advance_freezed_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_advance_freezed_list->ImportOptions->visible()) { ?>
<?php $view_advance_freezed_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_advance_freezed_list->SearchOptions->visible()) { ?>
<?php $view_advance_freezed_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_advance_freezed_list->FilterOptions->visible()) { ?>
<?php $view_advance_freezed_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_advance_freezed_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_advance_freezed->isExport() && !$view_advance_freezed->CurrentAction) { ?>
<form name="fview_advance_freezedlistsrch" id="fview_advance_freezedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_advance_freezed_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_advance_freezedlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_advance_freezed">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_advance_freezed_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_advance_freezed->RowType = ROWTYPE_SEARCH;

// Render row
$view_advance_freezed->resetAttributes();
$view_advance_freezed_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_advance_freezed->Mobile->Visible) { // Mobile ?>
	<div id="xsc_Mobile" class="ew-cell form-group">
		<label for="x_Mobile" class="ew-search-caption ew-label"><?php echo $view_advance_freezed->Mobile->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_advance_freezed" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Mobile->EditValue ?>"<?php echo $view_advance_freezed->Mobile->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_advance_freezed_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_advance_freezed_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_advance_freezed_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_advance_freezed_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_advance_freezed_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_advance_freezed_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_advance_freezed_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_advance_freezed_list->showPageHeader(); ?>
<?php
$view_advance_freezed_list->showMessage();
?>
<?php if ($view_advance_freezed_list->TotalRecs > 0 || $view_advance_freezed->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_advance_freezed_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_advance_freezed">
<?php if (!$view_advance_freezed->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_advance_freezed->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_advance_freezed_list->Pager)) $view_advance_freezed_list->Pager = new NumericPager($view_advance_freezed_list->StartRec, $view_advance_freezed_list->DisplayRecs, $view_advance_freezed_list->TotalRecs, $view_advance_freezed_list->RecRange, $view_advance_freezed_list->AutoHidePager) ?>
<?php if ($view_advance_freezed_list->Pager->RecordCount > 0 && $view_advance_freezed_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_advance_freezed_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_advance_freezed_list->pageUrl() ?>start=<?php echo $view_advance_freezed_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_advance_freezed_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_advance_freezed_list->pageUrl() ?>start=<?php echo $view_advance_freezed_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_advance_freezed_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_advance_freezed_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_advance_freezed_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_advance_freezed_list->pageUrl() ?>start=<?php echo $view_advance_freezed_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_advance_freezed_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_advance_freezed_list->pageUrl() ?>start=<?php echo $view_advance_freezed_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_advance_freezed_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_advance_freezed_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_advance_freezed_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_advance_freezed_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_advance_freezed_list->TotalRecs > 0 && (!$view_advance_freezed_list->AutoHidePageSizeSelector || $view_advance_freezed_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_advance_freezed">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_advance_freezed_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_advance_freezed_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_advance_freezed_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_advance_freezed_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_advance_freezed_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_advance_freezed_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_advance_freezed->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_advance_freezed_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_advance_freezedlist" id="fview_advance_freezedlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_advance_freezed_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_advance_freezed_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_advance_freezed">
<div id="gmp_view_advance_freezed" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_advance_freezed_list->TotalRecs > 0 || $view_advance_freezed->isGridEdit()) { ?>
<table id="tbl_view_advance_freezedlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_advance_freezed_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_advance_freezed_list->renderListOptions();

// Render list options (header, left)
$view_advance_freezed_list->ListOptions->render("header", "left");
?>
<?php if ($view_advance_freezed->id->Visible) { // id ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_advance_freezed->id->headerCellClass() ?>"><div id="elh_view_advance_freezed_id" class="view_advance_freezed_id"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_advance_freezed->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->id) ?>',1);"><div id="elh_view_advance_freezed_id" class="view_advance_freezed_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->freezed->Visible) { // freezed ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->freezed) == "") { ?>
		<th data-name="freezed" class="<?php echo $view_advance_freezed->freezed->headerCellClass() ?>"><div id="elh_view_advance_freezed_freezed" class="view_advance_freezed_freezed"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->freezed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="freezed" class="<?php echo $view_advance_freezed->freezed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->freezed) ?>',1);"><div id="elh_view_advance_freezed_freezed" class="view_advance_freezed_freezed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->freezed->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->freezed->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->freezed->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->PatientID->Visible) { // PatientID ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_advance_freezed->PatientID->headerCellClass() ?>"><div id="elh_view_advance_freezed_PatientID" class="view_advance_freezed_PatientID"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_advance_freezed->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->PatientID) ?>',1);"><div id="elh_view_advance_freezed_PatientID" class="view_advance_freezed_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->PatientName->Visible) { // PatientName ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_advance_freezed->PatientName->headerCellClass() ?>"><div id="elh_view_advance_freezed_PatientName" class="view_advance_freezed_PatientName"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_advance_freezed->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->PatientName) ?>',1);"><div id="elh_view_advance_freezed_PatientName" class="view_advance_freezed_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->Mobile->Visible) { // Mobile ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_advance_freezed->Mobile->headerCellClass() ?>"><div id="elh_view_advance_freezed_Mobile" class="view_advance_freezed_Mobile"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_advance_freezed->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->Mobile) ?>',1);"><div id="elh_view_advance_freezed_Mobile" class="view_advance_freezed_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $view_advance_freezed->voucher_type->headerCellClass() ?>"><div id="elh_view_advance_freezed_voucher_type" class="view_advance_freezed_voucher_type"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $view_advance_freezed->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->voucher_type) ?>',1);"><div id="elh_view_advance_freezed_voucher_type" class="view_advance_freezed_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->voucher_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->voucher_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->Details->Visible) { // Details ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $view_advance_freezed->Details->headerCellClass() ?>"><div id="elh_view_advance_freezed_Details" class="view_advance_freezed_Details"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $view_advance_freezed->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->Details) ?>',1);"><div id="elh_view_advance_freezed_Details" class="view_advance_freezed_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->Details->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->Details->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_advance_freezed->ModeofPayment->headerCellClass() ?>"><div id="elh_view_advance_freezed_ModeofPayment" class="view_advance_freezed_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_advance_freezed->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->ModeofPayment) ?>',1);"><div id="elh_view_advance_freezed_ModeofPayment" class="view_advance_freezed_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->Amount->Visible) { // Amount ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_advance_freezed->Amount->headerCellClass() ?>"><div id="elh_view_advance_freezed_Amount" class="view_advance_freezed_Amount"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_advance_freezed->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->Amount) ?>',1);"><div id="elh_view_advance_freezed_Amount" class="view_advance_freezed_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->createdby->Visible) { // createdby ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_advance_freezed->createdby->headerCellClass() ?>"><div id="elh_view_advance_freezed_createdby" class="view_advance_freezed_createdby"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_advance_freezed->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->createdby) ?>',1);"><div id="elh_view_advance_freezed_createdby" class="view_advance_freezed_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_advance_freezed->createddatetime->headerCellClass() ?>"><div id="elh_view_advance_freezed_createddatetime" class="view_advance_freezed_createddatetime"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_advance_freezed->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->createddatetime) ?>',1);"><div id="elh_view_advance_freezed_createddatetime" class="view_advance_freezed_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_advance_freezed->modifiedby->headerCellClass() ?>"><div id="elh_view_advance_freezed_modifiedby" class="view_advance_freezed_modifiedby"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_advance_freezed->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->modifiedby) ?>',1);"><div id="elh_view_advance_freezed_modifiedby" class="view_advance_freezed_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_advance_freezed->modifieddatetime->headerCellClass() ?>"><div id="elh_view_advance_freezed_modifieddatetime" class="view_advance_freezed_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_advance_freezed->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->modifieddatetime) ?>',1);"><div id="elh_view_advance_freezed_modifieddatetime" class="view_advance_freezed_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->PatID->Visible) { // PatID ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $view_advance_freezed->PatID->headerCellClass() ?>"><div id="elh_view_advance_freezed_PatID" class="view_advance_freezed_PatID"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $view_advance_freezed->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->PatID) ?>',1);"><div id="elh_view_advance_freezed_PatID" class="view_advance_freezed_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->VisiteType->Visible) { // VisiteType ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->VisiteType) == "") { ?>
		<th data-name="VisiteType" class="<?php echo $view_advance_freezed->VisiteType->headerCellClass() ?>"><div id="elh_view_advance_freezed_VisiteType" class="view_advance_freezed_VisiteType"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->VisiteType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VisiteType" class="<?php echo $view_advance_freezed->VisiteType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->VisiteType) ?>',1);"><div id="elh_view_advance_freezed_VisiteType" class="view_advance_freezed_VisiteType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->VisiteType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->VisiteType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->VisiteType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->VisitDate->Visible) { // VisitDate ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->VisitDate) == "") { ?>
		<th data-name="VisitDate" class="<?php echo $view_advance_freezed->VisitDate->headerCellClass() ?>"><div id="elh_view_advance_freezed_VisitDate" class="view_advance_freezed_VisitDate"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->VisitDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VisitDate" class="<?php echo $view_advance_freezed->VisitDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->VisitDate) ?>',1);"><div id="elh_view_advance_freezed_VisitDate" class="view_advance_freezed_VisitDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->VisitDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->VisitDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->VisitDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->AdvanceNo->Visible) { // AdvanceNo ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->AdvanceNo) == "") { ?>
		<th data-name="AdvanceNo" class="<?php echo $view_advance_freezed->AdvanceNo->headerCellClass() ?>"><div id="elh_view_advance_freezed_AdvanceNo" class="view_advance_freezed_AdvanceNo"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->AdvanceNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdvanceNo" class="<?php echo $view_advance_freezed->AdvanceNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->AdvanceNo) ?>',1);"><div id="elh_view_advance_freezed_AdvanceNo" class="view_advance_freezed_AdvanceNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->AdvanceNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->AdvanceNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->AdvanceNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->Status->Visible) { // Status ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $view_advance_freezed->Status->headerCellClass() ?>"><div id="elh_view_advance_freezed_Status" class="view_advance_freezed_Status"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $view_advance_freezed->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->Status) ?>',1);"><div id="elh_view_advance_freezed_Status" class="view_advance_freezed_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->Status->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->Status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->Status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->Date->Visible) { // Date ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->Date) == "") { ?>
		<th data-name="Date" class="<?php echo $view_advance_freezed->Date->headerCellClass() ?>"><div id="elh_view_advance_freezed_Date" class="view_advance_freezed_Date"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Date" class="<?php echo $view_advance_freezed->Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->Date) ?>',1);"><div id="elh_view_advance_freezed_Date" class="view_advance_freezed_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->AdvanceValidityDate) == "") { ?>
		<th data-name="AdvanceValidityDate" class="<?php echo $view_advance_freezed->AdvanceValidityDate->headerCellClass() ?>"><div id="elh_view_advance_freezed_AdvanceValidityDate" class="view_advance_freezed_AdvanceValidityDate"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->AdvanceValidityDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdvanceValidityDate" class="<?php echo $view_advance_freezed->AdvanceValidityDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->AdvanceValidityDate) ?>',1);"><div id="elh_view_advance_freezed_AdvanceValidityDate" class="view_advance_freezed_AdvanceValidityDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->AdvanceValidityDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->AdvanceValidityDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->AdvanceValidityDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->TotalRemainingAdvance) == "") { ?>
		<th data-name="TotalRemainingAdvance" class="<?php echo $view_advance_freezed->TotalRemainingAdvance->headerCellClass() ?>"><div id="elh_view_advance_freezed_TotalRemainingAdvance" class="view_advance_freezed_TotalRemainingAdvance"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->TotalRemainingAdvance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalRemainingAdvance" class="<?php echo $view_advance_freezed->TotalRemainingAdvance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->TotalRemainingAdvance) ?>',1);"><div id="elh_view_advance_freezed_TotalRemainingAdvance" class="view_advance_freezed_TotalRemainingAdvance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->TotalRemainingAdvance->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->TotalRemainingAdvance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->TotalRemainingAdvance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->SeectPaymentMode) == "") { ?>
		<th data-name="SeectPaymentMode" class="<?php echo $view_advance_freezed->SeectPaymentMode->headerCellClass() ?>"><div id="elh_view_advance_freezed_SeectPaymentMode" class="view_advance_freezed_SeectPaymentMode"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->SeectPaymentMode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SeectPaymentMode" class="<?php echo $view_advance_freezed->SeectPaymentMode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->SeectPaymentMode) ?>',1);"><div id="elh_view_advance_freezed_SeectPaymentMode" class="view_advance_freezed_SeectPaymentMode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->SeectPaymentMode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->SeectPaymentMode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->SeectPaymentMode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->PaidAmount) == "") { ?>
		<th data-name="PaidAmount" class="<?php echo $view_advance_freezed->PaidAmount->headerCellClass() ?>"><div id="elh_view_advance_freezed_PaidAmount" class="view_advance_freezed_PaidAmount"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->PaidAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaidAmount" class="<?php echo $view_advance_freezed->PaidAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->PaidAmount) ?>',1);"><div id="elh_view_advance_freezed_PaidAmount" class="view_advance_freezed_PaidAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->PaidAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->PaidAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->PaidAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->Currency->Visible) { // Currency ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->Currency) == "") { ?>
		<th data-name="Currency" class="<?php echo $view_advance_freezed->Currency->headerCellClass() ?>"><div id="elh_view_advance_freezed_Currency" class="view_advance_freezed_Currency"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->Currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Currency" class="<?php echo $view_advance_freezed->Currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->Currency) ?>',1);"><div id="elh_view_advance_freezed_Currency" class="view_advance_freezed_Currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->Currency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->Currency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->Currency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->CardNumber->Visible) { // CardNumber ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $view_advance_freezed->CardNumber->headerCellClass() ?>"><div id="elh_view_advance_freezed_CardNumber" class="view_advance_freezed_CardNumber"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $view_advance_freezed->CardNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->CardNumber) ?>',1);"><div id="elh_view_advance_freezed_CardNumber" class="view_advance_freezed_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->CardNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->CardNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->CardNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->BankName->Visible) { // BankName ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $view_advance_freezed->BankName->headerCellClass() ?>"><div id="elh_view_advance_freezed_BankName" class="view_advance_freezed_BankName"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $view_advance_freezed->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->BankName) ?>',1);"><div id="elh_view_advance_freezed_BankName" class="view_advance_freezed_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->BankName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->BankName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->HospID->Visible) { // HospID ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_advance_freezed->HospID->headerCellClass() ?>"><div id="elh_view_advance_freezed_HospID" class="view_advance_freezed_HospID"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_advance_freezed->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->HospID) ?>',1);"><div id="elh_view_advance_freezed_HospID" class="view_advance_freezed_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->Reception->Visible) { // Reception ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_advance_freezed->Reception->headerCellClass() ?>"><div id="elh_view_advance_freezed_Reception" class="view_advance_freezed_Reception"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_advance_freezed->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->Reception) ?>',1);"><div id="elh_view_advance_freezed_Reception" class="view_advance_freezed_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->mrnno->Visible) { // mrnno ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_advance_freezed->mrnno->headerCellClass() ?>"><div id="elh_view_advance_freezed_mrnno" class="view_advance_freezed_mrnno"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_advance_freezed->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->mrnno) ?>',1);"><div id="elh_view_advance_freezed_mrnno" class="view_advance_freezed_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->GetUserName->Visible) { // GetUserName ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->GetUserName) == "") { ?>
		<th data-name="GetUserName" class="<?php echo $view_advance_freezed->GetUserName->headerCellClass() ?>"><div id="elh_view_advance_freezed_GetUserName" class="view_advance_freezed_GetUserName"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->GetUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GetUserName" class="<?php echo $view_advance_freezed->GetUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->GetUserName) ?>',1);"><div id="elh_view_advance_freezed_GetUserName" class="view_advance_freezed_GetUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->GetUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->GetUserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->GetUserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->AdjustmentwithAdvance->Visible) { // AdjustmentwithAdvance ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->AdjustmentwithAdvance) == "") { ?>
		<th data-name="AdjustmentwithAdvance" class="<?php echo $view_advance_freezed->AdjustmentwithAdvance->headerCellClass() ?>"><div id="elh_view_advance_freezed_AdjustmentwithAdvance" class="view_advance_freezed_AdjustmentwithAdvance"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->AdjustmentwithAdvance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdjustmentwithAdvance" class="<?php echo $view_advance_freezed->AdjustmentwithAdvance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->AdjustmentwithAdvance) ?>',1);"><div id="elh_view_advance_freezed_AdjustmentwithAdvance" class="view_advance_freezed_AdjustmentwithAdvance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->AdjustmentwithAdvance->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->AdjustmentwithAdvance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->AdjustmentwithAdvance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->AdjustmentBillNumber->Visible) { // AdjustmentBillNumber ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->AdjustmentBillNumber) == "") { ?>
		<th data-name="AdjustmentBillNumber" class="<?php echo $view_advance_freezed->AdjustmentBillNumber->headerCellClass() ?>"><div id="elh_view_advance_freezed_AdjustmentBillNumber" class="view_advance_freezed_AdjustmentBillNumber"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->AdjustmentBillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdjustmentBillNumber" class="<?php echo $view_advance_freezed->AdjustmentBillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->AdjustmentBillNumber) ?>',1);"><div id="elh_view_advance_freezed_AdjustmentBillNumber" class="view_advance_freezed_AdjustmentBillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->AdjustmentBillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->AdjustmentBillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->AdjustmentBillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->CancelAdvance->Visible) { // CancelAdvance ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->CancelAdvance) == "") { ?>
		<th data-name="CancelAdvance" class="<?php echo $view_advance_freezed->CancelAdvance->headerCellClass() ?>"><div id="elh_view_advance_freezed_CancelAdvance" class="view_advance_freezed_CancelAdvance"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->CancelAdvance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelAdvance" class="<?php echo $view_advance_freezed->CancelAdvance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->CancelAdvance) ?>',1);"><div id="elh_view_advance_freezed_CancelAdvance" class="view_advance_freezed_CancelAdvance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->CancelAdvance->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->CancelAdvance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->CancelAdvance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->CancelBy->Visible) { // CancelBy ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->CancelBy) == "") { ?>
		<th data-name="CancelBy" class="<?php echo $view_advance_freezed->CancelBy->headerCellClass() ?>"><div id="elh_view_advance_freezed_CancelBy" class="view_advance_freezed_CancelBy"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->CancelBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelBy" class="<?php echo $view_advance_freezed->CancelBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->CancelBy) ?>',1);"><div id="elh_view_advance_freezed_CancelBy" class="view_advance_freezed_CancelBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->CancelBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->CancelBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->CancelBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->CancelDate->Visible) { // CancelDate ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->CancelDate) == "") { ?>
		<th data-name="CancelDate" class="<?php echo $view_advance_freezed->CancelDate->headerCellClass() ?>"><div id="elh_view_advance_freezed_CancelDate" class="view_advance_freezed_CancelDate"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->CancelDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelDate" class="<?php echo $view_advance_freezed->CancelDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->CancelDate) ?>',1);"><div id="elh_view_advance_freezed_CancelDate" class="view_advance_freezed_CancelDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->CancelDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->CancelDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->CancelDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->CancelDateTime->Visible) { // CancelDateTime ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->CancelDateTime) == "") { ?>
		<th data-name="CancelDateTime" class="<?php echo $view_advance_freezed->CancelDateTime->headerCellClass() ?>"><div id="elh_view_advance_freezed_CancelDateTime" class="view_advance_freezed_CancelDateTime"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->CancelDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelDateTime" class="<?php echo $view_advance_freezed->CancelDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->CancelDateTime) ?>',1);"><div id="elh_view_advance_freezed_CancelDateTime" class="view_advance_freezed_CancelDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->CancelDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->CancelDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->CancelDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->CanceledBy->Visible) { // CanceledBy ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->CanceledBy) == "") { ?>
		<th data-name="CanceledBy" class="<?php echo $view_advance_freezed->CanceledBy->headerCellClass() ?>"><div id="elh_view_advance_freezed_CanceledBy" class="view_advance_freezed_CanceledBy"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->CanceledBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CanceledBy" class="<?php echo $view_advance_freezed->CanceledBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->CanceledBy) ?>',1);"><div id="elh_view_advance_freezed_CanceledBy" class="view_advance_freezed_CanceledBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->CanceledBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->CanceledBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->CanceledBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->CancelStatus->Visible) { // CancelStatus ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->CancelStatus) == "") { ?>
		<th data-name="CancelStatus" class="<?php echo $view_advance_freezed->CancelStatus->headerCellClass() ?>"><div id="elh_view_advance_freezed_CancelStatus" class="view_advance_freezed_CancelStatus"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->CancelStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelStatus" class="<?php echo $view_advance_freezed->CancelStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->CancelStatus) ?>',1);"><div id="elh_view_advance_freezed_CancelStatus" class="view_advance_freezed_CancelStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->CancelStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->CancelStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->CancelStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->Cash->Visible) { // Cash ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->Cash) == "") { ?>
		<th data-name="Cash" class="<?php echo $view_advance_freezed->Cash->headerCellClass() ?>"><div id="elh_view_advance_freezed_Cash" class="view_advance_freezed_Cash"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->Cash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cash" class="<?php echo $view_advance_freezed->Cash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->Cash) ?>',1);"><div id="elh_view_advance_freezed_Cash" class="view_advance_freezed_Cash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->Cash->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->Cash->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->Cash->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_freezed->Card->Visible) { // Card ?>
	<?php if ($view_advance_freezed->sortUrl($view_advance_freezed->Card) == "") { ?>
		<th data-name="Card" class="<?php echo $view_advance_freezed->Card->headerCellClass() ?>"><div id="elh_view_advance_freezed_Card" class="view_advance_freezed_Card"><div class="ew-table-header-caption"><?php echo $view_advance_freezed->Card->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Card" class="<?php echo $view_advance_freezed->Card->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_freezed->SortUrl($view_advance_freezed->Card) ?>',1);"><div id="elh_view_advance_freezed_Card" class="view_advance_freezed_Card">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_freezed->Card->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_freezed->Card->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_freezed->Card->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_advance_freezed_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_advance_freezed->ExportAll && $view_advance_freezed->isExport()) {
	$view_advance_freezed_list->StopRec = $view_advance_freezed_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_advance_freezed_list->TotalRecs > $view_advance_freezed_list->StartRec + $view_advance_freezed_list->DisplayRecs - 1)
		$view_advance_freezed_list->StopRec = $view_advance_freezed_list->StartRec + $view_advance_freezed_list->DisplayRecs - 1;
	else
		$view_advance_freezed_list->StopRec = $view_advance_freezed_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $view_advance_freezed_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_advance_freezed_list->FormKeyCountName) && ($view_advance_freezed->isGridAdd() || $view_advance_freezed->isGridEdit() || $view_advance_freezed->isConfirm())) {
		$view_advance_freezed_list->KeyCount = $CurrentForm->getValue($view_advance_freezed_list->FormKeyCountName);
		$view_advance_freezed_list->StopRec = $view_advance_freezed_list->StartRec + $view_advance_freezed_list->KeyCount - 1;
	}
}
$view_advance_freezed_list->RecCnt = $view_advance_freezed_list->StartRec - 1;
if ($view_advance_freezed_list->Recordset && !$view_advance_freezed_list->Recordset->EOF) {
	$view_advance_freezed_list->Recordset->moveFirst();
	$selectLimit = $view_advance_freezed_list->UseSelectLimit;
	if (!$selectLimit && $view_advance_freezed_list->StartRec > 1)
		$view_advance_freezed_list->Recordset->move($view_advance_freezed_list->StartRec - 1);
} elseif (!$view_advance_freezed->AllowAddDeleteRow && $view_advance_freezed_list->StopRec == 0) {
	$view_advance_freezed_list->StopRec = $view_advance_freezed->GridAddRowCount;
}

// Initialize aggregate
$view_advance_freezed->RowType = ROWTYPE_AGGREGATEINIT;
$view_advance_freezed->resetAttributes();
$view_advance_freezed_list->renderRow();
$view_advance_freezed_list->EditRowCnt = 0;
if ($view_advance_freezed->isEdit())
	$view_advance_freezed_list->RowIndex = 1;
if ($view_advance_freezed->isGridEdit())
	$view_advance_freezed_list->RowIndex = 0;
while ($view_advance_freezed_list->RecCnt < $view_advance_freezed_list->StopRec) {
	$view_advance_freezed_list->RecCnt++;
	if ($view_advance_freezed_list->RecCnt >= $view_advance_freezed_list->StartRec) {
		$view_advance_freezed_list->RowCnt++;
		if ($view_advance_freezed->isGridAdd() || $view_advance_freezed->isGridEdit() || $view_advance_freezed->isConfirm()) {
			$view_advance_freezed_list->RowIndex++;
			$CurrentForm->Index = $view_advance_freezed_list->RowIndex;
			if ($CurrentForm->hasValue($view_advance_freezed_list->FormActionName) && $view_advance_freezed_list->EventCancelled)
				$view_advance_freezed_list->RowAction = strval($CurrentForm->getValue($view_advance_freezed_list->FormActionName));
			elseif ($view_advance_freezed->isGridAdd())
				$view_advance_freezed_list->RowAction = "insert";
			else
				$view_advance_freezed_list->RowAction = "";
		}

		// Set up key count
		$view_advance_freezed_list->KeyCount = $view_advance_freezed_list->RowIndex;

		// Init row class and style
		$view_advance_freezed->resetAttributes();
		$view_advance_freezed->CssClass = "";
		if ($view_advance_freezed->isGridAdd()) {
			$view_advance_freezed_list->loadRowValues(); // Load default values
		} else {
			$view_advance_freezed_list->loadRowValues($view_advance_freezed_list->Recordset); // Load row values
		}
		$view_advance_freezed->RowType = ROWTYPE_VIEW; // Render view
		if ($view_advance_freezed->isEdit()) {
			if ($view_advance_freezed_list->checkInlineEditKey() && $view_advance_freezed_list->EditRowCnt == 0) { // Inline edit
				$view_advance_freezed->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($view_advance_freezed->isGridEdit()) { // Grid edit
			if ($view_advance_freezed->EventCancelled)
				$view_advance_freezed_list->restoreCurrentRowFormValues($view_advance_freezed_list->RowIndex); // Restore form values
			if ($view_advance_freezed_list->RowAction == "insert")
				$view_advance_freezed->RowType = ROWTYPE_ADD; // Render add
			else
				$view_advance_freezed->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_advance_freezed->isEdit() && $view_advance_freezed->RowType == ROWTYPE_EDIT && $view_advance_freezed->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$view_advance_freezed_list->restoreFormValues(); // Restore form values
		}
		if ($view_advance_freezed->isGridEdit() && ($view_advance_freezed->RowType == ROWTYPE_EDIT || $view_advance_freezed->RowType == ROWTYPE_ADD) && $view_advance_freezed->EventCancelled) // Update failed
			$view_advance_freezed_list->restoreCurrentRowFormValues($view_advance_freezed_list->RowIndex); // Restore form values
		if ($view_advance_freezed->RowType == ROWTYPE_EDIT) // Edit row
			$view_advance_freezed_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$view_advance_freezed->RowAttrs = array_merge($view_advance_freezed->RowAttrs, array('data-rowindex'=>$view_advance_freezed_list->RowCnt, 'id'=>'r' . $view_advance_freezed_list->RowCnt . '_view_advance_freezed', 'data-rowtype'=>$view_advance_freezed->RowType));

		// Render row
		$view_advance_freezed_list->renderRow();

		// Render list options
		$view_advance_freezed_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_advance_freezed_list->RowAction <> "delete" && $view_advance_freezed_list->RowAction <> "insertdelete" && !($view_advance_freezed_list->RowAction == "insert" && $view_advance_freezed->isConfirm() && $view_advance_freezed_list->emptyRow())) {
?>
	<tr<?php echo $view_advance_freezed->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_advance_freezed_list->ListOptions->render("body", "left", $view_advance_freezed_list->RowCnt);
?>
	<?php if ($view_advance_freezed->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_advance_freezed->id->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_advance_freezed" data-field="x_id" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_id" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_advance_freezed->id->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_id" class="form-group view_advance_freezed_id">
<span<?php echo $view_advance_freezed->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_id" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_id" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_advance_freezed->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_id" class="view_advance_freezed_id">
<span<?php echo $view_advance_freezed->id->viewAttributes() ?>>
<?php echo $view_advance_freezed->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->freezed->Visible) { // freezed ?>
		<td data-name="freezed"<?php echo $view_advance_freezed->freezed->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_freezed" class="form-group view_advance_freezed_freezed">
<div id="tp_x<?php echo $view_advance_freezed_list->RowIndex ?>_freezed" class="ew-template"><input type="radio" class="form-check-input" data-table="view_advance_freezed" data-field="x_freezed" data-value-separator="<?php echo $view_advance_freezed->freezed->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_freezed" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_freezed" value="{value}"<?php echo $view_advance_freezed->freezed->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_advance_freezed_list->RowIndex ?>_freezed" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_advance_freezed->freezed->radioButtonListHtml(FALSE, "x{$view_advance_freezed_list->RowIndex}_freezed") ?>
</div></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_freezed" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_freezed" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_freezed" value="<?php echo HtmlEncode($view_advance_freezed->freezed->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_freezed" class="form-group view_advance_freezed_freezed">
<div id="tp_x<?php echo $view_advance_freezed_list->RowIndex ?>_freezed" class="ew-template"><input type="radio" class="form-check-input" data-table="view_advance_freezed" data-field="x_freezed" data-value-separator="<?php echo $view_advance_freezed->freezed->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_freezed" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_freezed" value="{value}"<?php echo $view_advance_freezed->freezed->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_advance_freezed_list->RowIndex ?>_freezed" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_advance_freezed->freezed->radioButtonListHtml(FALSE, "x{$view_advance_freezed_list->RowIndex}_freezed") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_freezed" class="view_advance_freezed_freezed">
<span<?php echo $view_advance_freezed->freezed->viewAttributes() ?>>
<?php echo $view_advance_freezed->freezed->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_advance_freezed->PatientID->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_PatientID" class="form-group view_advance_freezed_PatientID">
<input type="text" data-table="view_advance_freezed" data-field="x_PatientID" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_PatientID" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->PatientID->EditValue ?>"<?php echo $view_advance_freezed->PatientID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatientID" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_PatientID" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_advance_freezed->PatientID->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_PatientID" class="form-group view_advance_freezed_PatientID">
<span<?php echo $view_advance_freezed->PatientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->PatientID->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatientID" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_PatientID" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_advance_freezed->PatientID->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_PatientID" class="view_advance_freezed_PatientID">
<span<?php echo $view_advance_freezed->PatientID->viewAttributes() ?>>
<?php echo $view_advance_freezed->PatientID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_advance_freezed->PatientName->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_PatientName" class="form-group view_advance_freezed_PatientName">
<input type="text" data-table="view_advance_freezed" data-field="x_PatientName" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_PatientName" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->PatientName->EditValue ?>"<?php echo $view_advance_freezed->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatientName" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_PatientName" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_advance_freezed->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_PatientName" class="form-group view_advance_freezed_PatientName">
<span<?php echo $view_advance_freezed->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->PatientName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatientName" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_PatientName" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_advance_freezed->PatientName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_PatientName" class="view_advance_freezed_PatientName">
<span<?php echo $view_advance_freezed->PatientName->viewAttributes() ?>>
<?php echo $view_advance_freezed->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $view_advance_freezed->Mobile->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Mobile" class="form-group view_advance_freezed_Mobile">
<input type="text" data-table="view_advance_freezed" data-field="x_Mobile" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Mobile" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Mobile->EditValue ?>"<?php echo $view_advance_freezed->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Mobile" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_Mobile" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_advance_freezed->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Mobile" class="form-group view_advance_freezed_Mobile">
<span<?php echo $view_advance_freezed->Mobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Mobile->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Mobile" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Mobile" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_advance_freezed->Mobile->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Mobile" class="view_advance_freezed_Mobile">
<span<?php echo $view_advance_freezed->Mobile->viewAttributes() ?>>
<?php echo $view_advance_freezed->Mobile->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type"<?php echo $view_advance_freezed->voucher_type->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_voucher_type" class="form-group view_advance_freezed_voucher_type">
<input type="text" data-table="view_advance_freezed" data-field="x_voucher_type" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_voucher_type" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->voucher_type->EditValue ?>"<?php echo $view_advance_freezed->voucher_type->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_voucher_type" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_voucher_type" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_advance_freezed->voucher_type->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_voucher_type" class="form-group view_advance_freezed_voucher_type">
<span<?php echo $view_advance_freezed->voucher_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->voucher_type->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_voucher_type" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_voucher_type" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_advance_freezed->voucher_type->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_voucher_type" class="view_advance_freezed_voucher_type">
<span<?php echo $view_advance_freezed->voucher_type->viewAttributes() ?>>
<?php echo $view_advance_freezed->voucher_type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->Details->Visible) { // Details ?>
		<td data-name="Details"<?php echo $view_advance_freezed->Details->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Details" class="form-group view_advance_freezed_Details">
<input type="text" data-table="view_advance_freezed" data-field="x_Details" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Details" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->Details->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Details->EditValue ?>"<?php echo $view_advance_freezed->Details->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Details" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_Details" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_advance_freezed->Details->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Details" class="form-group view_advance_freezed_Details">
<span<?php echo $view_advance_freezed->Details->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Details->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Details" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Details" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_advance_freezed->Details->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Details" class="view_advance_freezed_Details">
<span<?php echo $view_advance_freezed->Details->viewAttributes() ?>>
<?php echo $view_advance_freezed->Details->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $view_advance_freezed->ModeofPayment->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_ModeofPayment" class="form-group view_advance_freezed_ModeofPayment">
<input type="text" data-table="view_advance_freezed" data-field="x_ModeofPayment" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_ModeofPayment" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_ModeofPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->ModeofPayment->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->ModeofPayment->EditValue ?>"<?php echo $view_advance_freezed->ModeofPayment->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_ModeofPayment" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_ModeofPayment" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_advance_freezed->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_ModeofPayment" class="form-group view_advance_freezed_ModeofPayment">
<span<?php echo $view_advance_freezed->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->ModeofPayment->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_ModeofPayment" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_ModeofPayment" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_advance_freezed->ModeofPayment->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_ModeofPayment" class="view_advance_freezed_ModeofPayment">
<span<?php echo $view_advance_freezed->ModeofPayment->viewAttributes() ?>>
<?php echo $view_advance_freezed->ModeofPayment->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_advance_freezed->Amount->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Amount" class="form-group view_advance_freezed_Amount">
<input type="text" data-table="view_advance_freezed" data-field="x_Amount" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Amount" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_advance_freezed->Amount->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Amount->EditValue ?>"<?php echo $view_advance_freezed->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Amount" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_Amount" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_advance_freezed->Amount->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Amount" class="form-group view_advance_freezed_Amount">
<span<?php echo $view_advance_freezed->Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Amount->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Amount" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Amount" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_advance_freezed->Amount->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Amount" class="view_advance_freezed_Amount">
<span<?php echo $view_advance_freezed->Amount->viewAttributes() ?>>
<?php echo $view_advance_freezed->Amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_advance_freezed->createdby->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_createdby" class="form-group view_advance_freezed_createdby">
<input type="text" data-table="view_advance_freezed" data-field="x_createdby" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_createdby" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->createdby->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->createdby->EditValue ?>"<?php echo $view_advance_freezed->createdby->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_createdby" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_createdby" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_advance_freezed->createdby->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_createdby" class="form-group view_advance_freezed_createdby">
<span<?php echo $view_advance_freezed->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->createdby->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_createdby" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_createdby" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_advance_freezed->createdby->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_createdby" class="view_advance_freezed_createdby">
<span<?php echo $view_advance_freezed->createdby->viewAttributes() ?>>
<?php echo $view_advance_freezed->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_advance_freezed->createddatetime->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_createddatetime" class="form-group view_advance_freezed_createddatetime">
<input type="text" data-table="view_advance_freezed" data-field="x_createddatetime" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_createddatetime" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_advance_freezed->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->createddatetime->EditValue ?>"<?php echo $view_advance_freezed->createddatetime->editAttributes() ?>>
<?php if (!$view_advance_freezed->createddatetime->ReadOnly && !$view_advance_freezed->createddatetime->Disabled && !isset($view_advance_freezed->createddatetime->EditAttrs["readonly"]) && !isset($view_advance_freezed->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_advance_freezedlist", "x<?php echo $view_advance_freezed_list->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_createddatetime" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_createddatetime" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_advance_freezed->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_createddatetime" class="form-group view_advance_freezed_createddatetime">
<span<?php echo $view_advance_freezed->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->createddatetime->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_createddatetime" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_createddatetime" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_advance_freezed->createddatetime->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_createddatetime" class="view_advance_freezed_createddatetime">
<span<?php echo $view_advance_freezed->createddatetime->viewAttributes() ?>>
<?php echo $view_advance_freezed->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_advance_freezed->modifiedby->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_modifiedby" class="form-group view_advance_freezed_modifiedby">
<input type="text" data-table="view_advance_freezed" data-field="x_modifiedby" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_modifiedby" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->modifiedby->EditValue ?>"<?php echo $view_advance_freezed->modifiedby->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_modifiedby" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_modifiedby" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_advance_freezed->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_modifiedby" class="form-group view_advance_freezed_modifiedby">
<span<?php echo $view_advance_freezed->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->modifiedby->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_modifiedby" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_modifiedby" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_advance_freezed->modifiedby->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_modifiedby" class="view_advance_freezed_modifiedby">
<span<?php echo $view_advance_freezed->modifiedby->viewAttributes() ?>>
<?php echo $view_advance_freezed->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_advance_freezed->modifieddatetime->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_modifieddatetime" class="form-group view_advance_freezed_modifieddatetime">
<input type="text" data-table="view_advance_freezed" data-field="x_modifieddatetime" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_modifieddatetime" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($view_advance_freezed->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->modifieddatetime->EditValue ?>"<?php echo $view_advance_freezed->modifieddatetime->editAttributes() ?>>
<?php if (!$view_advance_freezed->modifieddatetime->ReadOnly && !$view_advance_freezed->modifieddatetime->Disabled && !isset($view_advance_freezed->modifieddatetime->EditAttrs["readonly"]) && !isset($view_advance_freezed->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_advance_freezedlist", "x<?php echo $view_advance_freezed_list->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_modifieddatetime" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_modifieddatetime" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_advance_freezed->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_modifieddatetime" class="form-group view_advance_freezed_modifieddatetime">
<span<?php echo $view_advance_freezed->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->modifieddatetime->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_modifieddatetime" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_modifieddatetime" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_advance_freezed->modifieddatetime->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_modifieddatetime" class="view_advance_freezed_modifieddatetime">
<span<?php echo $view_advance_freezed->modifieddatetime->viewAttributes() ?>>
<?php echo $view_advance_freezed->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $view_advance_freezed->PatID->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_PatID" class="form-group view_advance_freezed_PatID">
<input type="text" data-table="view_advance_freezed" data-field="x_PatID" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_PatID" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_advance_freezed->PatID->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->PatID->EditValue ?>"<?php echo $view_advance_freezed->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatID" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_PatID" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_advance_freezed->PatID->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_PatID" class="form-group view_advance_freezed_PatID">
<span<?php echo $view_advance_freezed->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->PatID->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatID" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_PatID" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_advance_freezed->PatID->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_PatID" class="view_advance_freezed_PatID">
<span<?php echo $view_advance_freezed->PatID->viewAttributes() ?>>
<?php echo $view_advance_freezed->PatID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->VisiteType->Visible) { // VisiteType ?>
		<td data-name="VisiteType"<?php echo $view_advance_freezed->VisiteType->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_VisiteType" class="form-group view_advance_freezed_VisiteType">
<input type="text" data-table="view_advance_freezed" data-field="x_VisiteType" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_VisiteType" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_VisiteType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->VisiteType->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->VisiteType->EditValue ?>"<?php echo $view_advance_freezed->VisiteType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_VisiteType" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_VisiteType" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_VisiteType" value="<?php echo HtmlEncode($view_advance_freezed->VisiteType->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_VisiteType" class="form-group view_advance_freezed_VisiteType">
<span<?php echo $view_advance_freezed->VisiteType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->VisiteType->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_VisiteType" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_VisiteType" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_VisiteType" value="<?php echo HtmlEncode($view_advance_freezed->VisiteType->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_VisiteType" class="view_advance_freezed_VisiteType">
<span<?php echo $view_advance_freezed->VisiteType->viewAttributes() ?>>
<?php echo $view_advance_freezed->VisiteType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->VisitDate->Visible) { // VisitDate ?>
		<td data-name="VisitDate"<?php echo $view_advance_freezed->VisitDate->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_VisitDate" class="form-group view_advance_freezed_VisitDate">
<input type="text" data-table="view_advance_freezed" data-field="x_VisitDate" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_VisitDate" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_VisitDate" placeholder="<?php echo HtmlEncode($view_advance_freezed->VisitDate->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->VisitDate->EditValue ?>"<?php echo $view_advance_freezed->VisitDate->editAttributes() ?>>
<?php if (!$view_advance_freezed->VisitDate->ReadOnly && !$view_advance_freezed->VisitDate->Disabled && !isset($view_advance_freezed->VisitDate->EditAttrs["readonly"]) && !isset($view_advance_freezed->VisitDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_advance_freezedlist", "x<?php echo $view_advance_freezed_list->RowIndex ?>_VisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_VisitDate" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_VisitDate" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_VisitDate" value="<?php echo HtmlEncode($view_advance_freezed->VisitDate->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_VisitDate" class="form-group view_advance_freezed_VisitDate">
<span<?php echo $view_advance_freezed->VisitDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->VisitDate->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_VisitDate" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_VisitDate" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_VisitDate" value="<?php echo HtmlEncode($view_advance_freezed->VisitDate->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_VisitDate" class="view_advance_freezed_VisitDate">
<span<?php echo $view_advance_freezed->VisitDate->viewAttributes() ?>>
<?php echo $view_advance_freezed->VisitDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->AdvanceNo->Visible) { // AdvanceNo ?>
		<td data-name="AdvanceNo"<?php echo $view_advance_freezed->AdvanceNo->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_AdvanceNo" class="form-group view_advance_freezed_AdvanceNo">
<input type="text" data-table="view_advance_freezed" data-field="x_AdvanceNo" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceNo" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->AdvanceNo->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->AdvanceNo->EditValue ?>"<?php echo $view_advance_freezed->AdvanceNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdvanceNo" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceNo" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceNo" value="<?php echo HtmlEncode($view_advance_freezed->AdvanceNo->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_AdvanceNo" class="form-group view_advance_freezed_AdvanceNo">
<span<?php echo $view_advance_freezed->AdvanceNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->AdvanceNo->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdvanceNo" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceNo" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceNo" value="<?php echo HtmlEncode($view_advance_freezed->AdvanceNo->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_AdvanceNo" class="view_advance_freezed_AdvanceNo">
<span<?php echo $view_advance_freezed->AdvanceNo->viewAttributes() ?>>
<?php echo $view_advance_freezed->AdvanceNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->Status->Visible) { // Status ?>
		<td data-name="Status"<?php echo $view_advance_freezed->Status->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Status" class="form-group view_advance_freezed_Status">
<input type="text" data-table="view_advance_freezed" data-field="x_Status" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Status" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->Status->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Status->EditValue ?>"<?php echo $view_advance_freezed->Status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Status" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_Status" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_Status" value="<?php echo HtmlEncode($view_advance_freezed->Status->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Status" class="form-group view_advance_freezed_Status">
<span<?php echo $view_advance_freezed->Status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Status->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Status" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Status" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Status" value="<?php echo HtmlEncode($view_advance_freezed->Status->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Status" class="view_advance_freezed_Status">
<span<?php echo $view_advance_freezed->Status->viewAttributes() ?>>
<?php echo $view_advance_freezed->Status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->Date->Visible) { // Date ?>
		<td data-name="Date"<?php echo $view_advance_freezed->Date->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Date" class="form-group view_advance_freezed_Date">
<input type="text" data-table="view_advance_freezed" data-field="x_Date" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Date" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Date" placeholder="<?php echo HtmlEncode($view_advance_freezed->Date->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Date->EditValue ?>"<?php echo $view_advance_freezed->Date->editAttributes() ?>>
<?php if (!$view_advance_freezed->Date->ReadOnly && !$view_advance_freezed->Date->Disabled && !isset($view_advance_freezed->Date->EditAttrs["readonly"]) && !isset($view_advance_freezed->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_advance_freezedlist", "x<?php echo $view_advance_freezed_list->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Date" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_Date" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_Date" value="<?php echo HtmlEncode($view_advance_freezed->Date->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Date" class="form-group view_advance_freezed_Date">
<span<?php echo $view_advance_freezed->Date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Date->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Date" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Date" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Date" value="<?php echo HtmlEncode($view_advance_freezed->Date->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Date" class="view_advance_freezed_Date">
<span<?php echo $view_advance_freezed->Date->viewAttributes() ?>>
<?php echo $view_advance_freezed->Date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
		<td data-name="AdvanceValidityDate"<?php echo $view_advance_freezed->AdvanceValidityDate->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_AdvanceValidityDate" class="form-group view_advance_freezed_AdvanceValidityDate">
<input type="text" data-table="view_advance_freezed" data-field="x_AdvanceValidityDate" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceValidityDate" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceValidityDate" placeholder="<?php echo HtmlEncode($view_advance_freezed->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->AdvanceValidityDate->EditValue ?>"<?php echo $view_advance_freezed->AdvanceValidityDate->editAttributes() ?>>
<?php if (!$view_advance_freezed->AdvanceValidityDate->ReadOnly && !$view_advance_freezed->AdvanceValidityDate->Disabled && !isset($view_advance_freezed->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($view_advance_freezed->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_advance_freezedlist", "x<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdvanceValidityDate" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceValidityDate" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceValidityDate" value="<?php echo HtmlEncode($view_advance_freezed->AdvanceValidityDate->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_AdvanceValidityDate" class="form-group view_advance_freezed_AdvanceValidityDate">
<span<?php echo $view_advance_freezed->AdvanceValidityDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->AdvanceValidityDate->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdvanceValidityDate" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceValidityDate" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceValidityDate" value="<?php echo HtmlEncode($view_advance_freezed->AdvanceValidityDate->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_AdvanceValidityDate" class="view_advance_freezed_AdvanceValidityDate">
<span<?php echo $view_advance_freezed->AdvanceValidityDate->viewAttributes() ?>>
<?php echo $view_advance_freezed->AdvanceValidityDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
		<td data-name="TotalRemainingAdvance"<?php echo $view_advance_freezed->TotalRemainingAdvance->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_TotalRemainingAdvance" class="form-group view_advance_freezed_TotalRemainingAdvance">
<input type="text" data-table="view_advance_freezed" data-field="x_TotalRemainingAdvance" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_TotalRemainingAdvance" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->TotalRemainingAdvance->EditValue ?>"<?php echo $view_advance_freezed->TotalRemainingAdvance->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_TotalRemainingAdvance" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_TotalRemainingAdvance" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_TotalRemainingAdvance" value="<?php echo HtmlEncode($view_advance_freezed->TotalRemainingAdvance->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_TotalRemainingAdvance" class="form-group view_advance_freezed_TotalRemainingAdvance">
<span<?php echo $view_advance_freezed->TotalRemainingAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->TotalRemainingAdvance->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_TotalRemainingAdvance" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_TotalRemainingAdvance" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_TotalRemainingAdvance" value="<?php echo HtmlEncode($view_advance_freezed->TotalRemainingAdvance->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_TotalRemainingAdvance" class="view_advance_freezed_TotalRemainingAdvance">
<span<?php echo $view_advance_freezed->TotalRemainingAdvance->viewAttributes() ?>>
<?php echo $view_advance_freezed->TotalRemainingAdvance->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<td data-name="SeectPaymentMode"<?php echo $view_advance_freezed->SeectPaymentMode->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_SeectPaymentMode" class="form-group view_advance_freezed_SeectPaymentMode">
<input type="text" data-table="view_advance_freezed" data-field="x_SeectPaymentMode" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_SeectPaymentMode" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_SeectPaymentMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->SeectPaymentMode->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->SeectPaymentMode->EditValue ?>"<?php echo $view_advance_freezed->SeectPaymentMode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_SeectPaymentMode" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_SeectPaymentMode" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_SeectPaymentMode" value="<?php echo HtmlEncode($view_advance_freezed->SeectPaymentMode->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_SeectPaymentMode" class="form-group view_advance_freezed_SeectPaymentMode">
<span<?php echo $view_advance_freezed->SeectPaymentMode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->SeectPaymentMode->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_SeectPaymentMode" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_SeectPaymentMode" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_SeectPaymentMode" value="<?php echo HtmlEncode($view_advance_freezed->SeectPaymentMode->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_SeectPaymentMode" class="view_advance_freezed_SeectPaymentMode">
<span<?php echo $view_advance_freezed->SeectPaymentMode->viewAttributes() ?>>
<?php echo $view_advance_freezed->SeectPaymentMode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount"<?php echo $view_advance_freezed->PaidAmount->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_PaidAmount" class="form-group view_advance_freezed_PaidAmount">
<input type="text" data-table="view_advance_freezed" data-field="x_PaidAmount" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_PaidAmount" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_PaidAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->PaidAmount->EditValue ?>"<?php echo $view_advance_freezed->PaidAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PaidAmount" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_PaidAmount" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($view_advance_freezed->PaidAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_PaidAmount" class="form-group view_advance_freezed_PaidAmount">
<span<?php echo $view_advance_freezed->PaidAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->PaidAmount->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PaidAmount" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_PaidAmount" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($view_advance_freezed->PaidAmount->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_PaidAmount" class="view_advance_freezed_PaidAmount">
<span<?php echo $view_advance_freezed->PaidAmount->viewAttributes() ?>>
<?php echo $view_advance_freezed->PaidAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->Currency->Visible) { // Currency ?>
		<td data-name="Currency"<?php echo $view_advance_freezed->Currency->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Currency" class="form-group view_advance_freezed_Currency">
<input type="text" data-table="view_advance_freezed" data-field="x_Currency" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Currency" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->Currency->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Currency->EditValue ?>"<?php echo $view_advance_freezed->Currency->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Currency" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_Currency" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_Currency" value="<?php echo HtmlEncode($view_advance_freezed->Currency->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Currency" class="form-group view_advance_freezed_Currency">
<span<?php echo $view_advance_freezed->Currency->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Currency->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Currency" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Currency" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Currency" value="<?php echo HtmlEncode($view_advance_freezed->Currency->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Currency" class="view_advance_freezed_Currency">
<span<?php echo $view_advance_freezed->Currency->viewAttributes() ?>>
<?php echo $view_advance_freezed->Currency->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber"<?php echo $view_advance_freezed->CardNumber->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CardNumber" class="form-group view_advance_freezed_CardNumber">
<input type="text" data-table="view_advance_freezed" data-field="x_CardNumber" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CardNumber" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->CardNumber->EditValue ?>"<?php echo $view_advance_freezed->CardNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CardNumber" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_CardNumber" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($view_advance_freezed->CardNumber->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CardNumber" class="form-group view_advance_freezed_CardNumber">
<span<?php echo $view_advance_freezed->CardNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->CardNumber->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CardNumber" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CardNumber" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($view_advance_freezed->CardNumber->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CardNumber" class="view_advance_freezed_CardNumber">
<span<?php echo $view_advance_freezed->CardNumber->viewAttributes() ?>>
<?php echo $view_advance_freezed->CardNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->BankName->Visible) { // BankName ?>
		<td data-name="BankName"<?php echo $view_advance_freezed->BankName->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_BankName" class="form-group view_advance_freezed_BankName">
<input type="text" data-table="view_advance_freezed" data-field="x_BankName" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_BankName" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->BankName->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->BankName->EditValue ?>"<?php echo $view_advance_freezed->BankName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_BankName" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_BankName" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_advance_freezed->BankName->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_BankName" class="form-group view_advance_freezed_BankName">
<span<?php echo $view_advance_freezed->BankName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->BankName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_BankName" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_BankName" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_advance_freezed->BankName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_BankName" class="view_advance_freezed_BankName">
<span<?php echo $view_advance_freezed->BankName->viewAttributes() ?>>
<?php echo $view_advance_freezed->BankName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_advance_freezed->HospID->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_HospID" class="form-group view_advance_freezed_HospID">
<input type="text" data-table="view_advance_freezed" data-field="x_HospID" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_HospID" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_advance_freezed->HospID->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->HospID->EditValue ?>"<?php echo $view_advance_freezed->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_HospID" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_HospID" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_advance_freezed->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_HospID" class="form-group view_advance_freezed_HospID">
<span<?php echo $view_advance_freezed->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->HospID->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_HospID" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_HospID" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_advance_freezed->HospID->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_HospID" class="view_advance_freezed_HospID">
<span<?php echo $view_advance_freezed->HospID->viewAttributes() ?>>
<?php echo $view_advance_freezed->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $view_advance_freezed->Reception->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Reception" class="form-group view_advance_freezed_Reception">
<input type="text" data-table="view_advance_freezed" data-field="x_Reception" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Reception" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($view_advance_freezed->Reception->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Reception->EditValue ?>"<?php echo $view_advance_freezed->Reception->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Reception" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_Reception" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_advance_freezed->Reception->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Reception" class="form-group view_advance_freezed_Reception">
<span<?php echo $view_advance_freezed->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Reception->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Reception" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Reception" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_advance_freezed->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Reception" class="view_advance_freezed_Reception">
<span<?php echo $view_advance_freezed->Reception->viewAttributes() ?>>
<?php echo $view_advance_freezed->Reception->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $view_advance_freezed->mrnno->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_mrnno" class="form-group view_advance_freezed_mrnno">
<input type="text" data-table="view_advance_freezed" data-field="x_mrnno" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_mrnno" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->mrnno->EditValue ?>"<?php echo $view_advance_freezed->mrnno->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_mrnno" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_mrnno" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_advance_freezed->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_mrnno" class="form-group view_advance_freezed_mrnno">
<span<?php echo $view_advance_freezed->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->mrnno->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_mrnno" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_mrnno" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_advance_freezed->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_mrnno" class="view_advance_freezed_mrnno">
<span<?php echo $view_advance_freezed->mrnno->viewAttributes() ?>>
<?php echo $view_advance_freezed->mrnno->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->GetUserName->Visible) { // GetUserName ?>
		<td data-name="GetUserName"<?php echo $view_advance_freezed->GetUserName->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_GetUserName" class="form-group view_advance_freezed_GetUserName">
<input type="text" data-table="view_advance_freezed" data-field="x_GetUserName" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_GetUserName" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_GetUserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->GetUserName->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->GetUserName->EditValue ?>"<?php echo $view_advance_freezed->GetUserName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_GetUserName" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_GetUserName" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_GetUserName" value="<?php echo HtmlEncode($view_advance_freezed->GetUserName->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_GetUserName" class="form-group view_advance_freezed_GetUserName">
<span<?php echo $view_advance_freezed->GetUserName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->GetUserName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_GetUserName" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_GetUserName" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_GetUserName" value="<?php echo HtmlEncode($view_advance_freezed->GetUserName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_GetUserName" class="view_advance_freezed_GetUserName">
<span<?php echo $view_advance_freezed->GetUserName->viewAttributes() ?>>
<?php echo $view_advance_freezed->GetUserName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->AdjustmentwithAdvance->Visible) { // AdjustmentwithAdvance ?>
		<td data-name="AdjustmentwithAdvance"<?php echo $view_advance_freezed->AdjustmentwithAdvance->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_AdjustmentwithAdvance" class="form-group view_advance_freezed_AdjustmentwithAdvance">
<input type="text" data-table="view_advance_freezed" data-field="x_AdjustmentwithAdvance" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentwithAdvance" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentwithAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->AdjustmentwithAdvance->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->AdjustmentwithAdvance->EditValue ?>"<?php echo $view_advance_freezed->AdjustmentwithAdvance->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdjustmentwithAdvance" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentwithAdvance" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentwithAdvance" value="<?php echo HtmlEncode($view_advance_freezed->AdjustmentwithAdvance->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_AdjustmentwithAdvance" class="form-group view_advance_freezed_AdjustmentwithAdvance">
<span<?php echo $view_advance_freezed->AdjustmentwithAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->AdjustmentwithAdvance->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdjustmentwithAdvance" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentwithAdvance" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentwithAdvance" value="<?php echo HtmlEncode($view_advance_freezed->AdjustmentwithAdvance->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_AdjustmentwithAdvance" class="view_advance_freezed_AdjustmentwithAdvance">
<span<?php echo $view_advance_freezed->AdjustmentwithAdvance->viewAttributes() ?>>
<?php echo $view_advance_freezed->AdjustmentwithAdvance->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->AdjustmentBillNumber->Visible) { // AdjustmentBillNumber ?>
		<td data-name="AdjustmentBillNumber"<?php echo $view_advance_freezed->AdjustmentBillNumber->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_AdjustmentBillNumber" class="form-group view_advance_freezed_AdjustmentBillNumber">
<input type="text" data-table="view_advance_freezed" data-field="x_AdjustmentBillNumber" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentBillNumber" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentBillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->AdjustmentBillNumber->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->AdjustmentBillNumber->EditValue ?>"<?php echo $view_advance_freezed->AdjustmentBillNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdjustmentBillNumber" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentBillNumber" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentBillNumber" value="<?php echo HtmlEncode($view_advance_freezed->AdjustmentBillNumber->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_AdjustmentBillNumber" class="form-group view_advance_freezed_AdjustmentBillNumber">
<span<?php echo $view_advance_freezed->AdjustmentBillNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->AdjustmentBillNumber->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdjustmentBillNumber" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentBillNumber" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentBillNumber" value="<?php echo HtmlEncode($view_advance_freezed->AdjustmentBillNumber->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_AdjustmentBillNumber" class="view_advance_freezed_AdjustmentBillNumber">
<span<?php echo $view_advance_freezed->AdjustmentBillNumber->viewAttributes() ?>>
<?php echo $view_advance_freezed->AdjustmentBillNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->CancelAdvance->Visible) { // CancelAdvance ?>
		<td data-name="CancelAdvance"<?php echo $view_advance_freezed->CancelAdvance->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CancelAdvance" class="form-group view_advance_freezed_CancelAdvance">
<input type="text" data-table="view_advance_freezed" data-field="x_CancelAdvance" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelAdvance" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->CancelAdvance->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->CancelAdvance->EditValue ?>"<?php echo $view_advance_freezed->CancelAdvance->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelAdvance" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelAdvance" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelAdvance" value="<?php echo HtmlEncode($view_advance_freezed->CancelAdvance->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CancelAdvance" class="form-group view_advance_freezed_CancelAdvance">
<span<?php echo $view_advance_freezed->CancelAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->CancelAdvance->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelAdvance" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelAdvance" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelAdvance" value="<?php echo HtmlEncode($view_advance_freezed->CancelAdvance->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CancelAdvance" class="view_advance_freezed_CancelAdvance">
<span<?php echo $view_advance_freezed->CancelAdvance->viewAttributes() ?>>
<?php echo $view_advance_freezed->CancelAdvance->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->CancelBy->Visible) { // CancelBy ?>
		<td data-name="CancelBy"<?php echo $view_advance_freezed->CancelBy->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CancelBy" class="form-group view_advance_freezed_CancelBy">
<input type="text" data-table="view_advance_freezed" data-field="x_CancelBy" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelBy" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->CancelBy->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->CancelBy->EditValue ?>"<?php echo $view_advance_freezed->CancelBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelBy" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelBy" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelBy" value="<?php echo HtmlEncode($view_advance_freezed->CancelBy->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CancelBy" class="form-group view_advance_freezed_CancelBy">
<span<?php echo $view_advance_freezed->CancelBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->CancelBy->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelBy" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelBy" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelBy" value="<?php echo HtmlEncode($view_advance_freezed->CancelBy->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CancelBy" class="view_advance_freezed_CancelBy">
<span<?php echo $view_advance_freezed->CancelBy->viewAttributes() ?>>
<?php echo $view_advance_freezed->CancelBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->CancelDate->Visible) { // CancelDate ?>
		<td data-name="CancelDate"<?php echo $view_advance_freezed->CancelDate->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CancelDate" class="form-group view_advance_freezed_CancelDate">
<input type="text" data-table="view_advance_freezed" data-field="x_CancelDate" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDate" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDate" placeholder="<?php echo HtmlEncode($view_advance_freezed->CancelDate->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->CancelDate->EditValue ?>"<?php echo $view_advance_freezed->CancelDate->editAttributes() ?>>
<?php if (!$view_advance_freezed->CancelDate->ReadOnly && !$view_advance_freezed->CancelDate->Disabled && !isset($view_advance_freezed->CancelDate->EditAttrs["readonly"]) && !isset($view_advance_freezed->CancelDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_advance_freezedlist", "x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelDate" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDate" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDate" value="<?php echo HtmlEncode($view_advance_freezed->CancelDate->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CancelDate" class="form-group view_advance_freezed_CancelDate">
<span<?php echo $view_advance_freezed->CancelDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->CancelDate->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelDate" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDate" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDate" value="<?php echo HtmlEncode($view_advance_freezed->CancelDate->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CancelDate" class="view_advance_freezed_CancelDate">
<span<?php echo $view_advance_freezed->CancelDate->viewAttributes() ?>>
<?php echo $view_advance_freezed->CancelDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->CancelDateTime->Visible) { // CancelDateTime ?>
		<td data-name="CancelDateTime"<?php echo $view_advance_freezed->CancelDateTime->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CancelDateTime" class="form-group view_advance_freezed_CancelDateTime">
<input type="text" data-table="view_advance_freezed" data-field="x_CancelDateTime" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDateTime" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDateTime" placeholder="<?php echo HtmlEncode($view_advance_freezed->CancelDateTime->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->CancelDateTime->EditValue ?>"<?php echo $view_advance_freezed->CancelDateTime->editAttributes() ?>>
<?php if (!$view_advance_freezed->CancelDateTime->ReadOnly && !$view_advance_freezed->CancelDateTime->Disabled && !isset($view_advance_freezed->CancelDateTime->EditAttrs["readonly"]) && !isset($view_advance_freezed->CancelDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_advance_freezedlist", "x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelDateTime" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDateTime" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDateTime" value="<?php echo HtmlEncode($view_advance_freezed->CancelDateTime->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CancelDateTime" class="form-group view_advance_freezed_CancelDateTime">
<span<?php echo $view_advance_freezed->CancelDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->CancelDateTime->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelDateTime" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDateTime" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDateTime" value="<?php echo HtmlEncode($view_advance_freezed->CancelDateTime->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CancelDateTime" class="view_advance_freezed_CancelDateTime">
<span<?php echo $view_advance_freezed->CancelDateTime->viewAttributes() ?>>
<?php echo $view_advance_freezed->CancelDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->CanceledBy->Visible) { // CanceledBy ?>
		<td data-name="CanceledBy"<?php echo $view_advance_freezed->CanceledBy->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CanceledBy" class="form-group view_advance_freezed_CanceledBy">
<input type="text" data-table="view_advance_freezed" data-field="x_CanceledBy" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CanceledBy" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CanceledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->CanceledBy->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->CanceledBy->EditValue ?>"<?php echo $view_advance_freezed->CanceledBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CanceledBy" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_CanceledBy" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_CanceledBy" value="<?php echo HtmlEncode($view_advance_freezed->CanceledBy->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CanceledBy" class="form-group view_advance_freezed_CanceledBy">
<span<?php echo $view_advance_freezed->CanceledBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->CanceledBy->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CanceledBy" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CanceledBy" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CanceledBy" value="<?php echo HtmlEncode($view_advance_freezed->CanceledBy->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CanceledBy" class="view_advance_freezed_CanceledBy">
<span<?php echo $view_advance_freezed->CanceledBy->viewAttributes() ?>>
<?php echo $view_advance_freezed->CanceledBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->CancelStatus->Visible) { // CancelStatus ?>
		<td data-name="CancelStatus"<?php echo $view_advance_freezed->CancelStatus->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CancelStatus" class="form-group view_advance_freezed_CancelStatus">
<input type="text" data-table="view_advance_freezed" data-field="x_CancelStatus" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelStatus" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->CancelStatus->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->CancelStatus->EditValue ?>"<?php echo $view_advance_freezed->CancelStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelStatus" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelStatus" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelStatus" value="<?php echo HtmlEncode($view_advance_freezed->CancelStatus->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CancelStatus" class="form-group view_advance_freezed_CancelStatus">
<span<?php echo $view_advance_freezed->CancelStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->CancelStatus->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelStatus" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelStatus" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelStatus" value="<?php echo HtmlEncode($view_advance_freezed->CancelStatus->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_CancelStatus" class="view_advance_freezed_CancelStatus">
<span<?php echo $view_advance_freezed->CancelStatus->viewAttributes() ?>>
<?php echo $view_advance_freezed->CancelStatus->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->Cash->Visible) { // Cash ?>
		<td data-name="Cash"<?php echo $view_advance_freezed->Cash->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Cash" class="form-group view_advance_freezed_Cash">
<input type="text" data-table="view_advance_freezed" data-field="x_Cash" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Cash" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Cash" size="30" placeholder="<?php echo HtmlEncode($view_advance_freezed->Cash->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Cash->EditValue ?>"<?php echo $view_advance_freezed->Cash->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Cash" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_Cash" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_Cash" value="<?php echo HtmlEncode($view_advance_freezed->Cash->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Cash" class="form-group view_advance_freezed_Cash">
<span<?php echo $view_advance_freezed->Cash->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Cash->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Cash" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Cash" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Cash" value="<?php echo HtmlEncode($view_advance_freezed->Cash->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Cash" class="view_advance_freezed_Cash">
<span<?php echo $view_advance_freezed->Cash->viewAttributes() ?>>
<?php echo $view_advance_freezed->Cash->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->Card->Visible) { // Card ?>
		<td data-name="Card"<?php echo $view_advance_freezed->Card->cellAttributes() ?>>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Card" class="form-group view_advance_freezed_Card">
<input type="text" data-table="view_advance_freezed" data-field="x_Card" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Card" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Card" size="30" placeholder="<?php echo HtmlEncode($view_advance_freezed->Card->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Card->EditValue ?>"<?php echo $view_advance_freezed->Card->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Card" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_Card" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_Card" value="<?php echo HtmlEncode($view_advance_freezed->Card->OldValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Card" class="form-group view_advance_freezed_Card">
<span<?php echo $view_advance_freezed->Card->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_advance_freezed->Card->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Card" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Card" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Card" value="<?php echo HtmlEncode($view_advance_freezed->Card->CurrentValue) ?>">
<?php } ?>
<?php if ($view_advance_freezed->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_advance_freezed_list->RowCnt ?>_view_advance_freezed_Card" class="view_advance_freezed_Card">
<span<?php echo $view_advance_freezed->Card->viewAttributes() ?>>
<?php echo $view_advance_freezed->Card->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_advance_freezed_list->ListOptions->render("body", "right", $view_advance_freezed_list->RowCnt);
?>
	</tr>
<?php if ($view_advance_freezed->RowType == ROWTYPE_ADD || $view_advance_freezed->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_advance_freezedlist.updateLists(<?php echo $view_advance_freezed_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_advance_freezed->isGridAdd())
		if (!$view_advance_freezed_list->Recordset->EOF)
			$view_advance_freezed_list->Recordset->moveNext();
}
?>
<?php
	if ($view_advance_freezed->isGridAdd() || $view_advance_freezed->isGridEdit()) {
		$view_advance_freezed_list->RowIndex = '$rowindex$';
		$view_advance_freezed_list->loadRowValues();

		// Set row properties
		$view_advance_freezed->resetAttributes();
		$view_advance_freezed->RowAttrs = array_merge($view_advance_freezed->RowAttrs, array('data-rowindex'=>$view_advance_freezed_list->RowIndex, 'id'=>'r0_view_advance_freezed', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_advance_freezed->RowAttrs["class"], "ew-template");
		$view_advance_freezed->RowType = ROWTYPE_ADD;

		// Render row
		$view_advance_freezed_list->renderRow();

		// Render list options
		$view_advance_freezed_list->renderListOptions();
		$view_advance_freezed_list->StartRowCnt = 0;
?>
	<tr<?php echo $view_advance_freezed->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_advance_freezed_list->ListOptions->render("body", "left", $view_advance_freezed_list->RowIndex);
?>
	<?php if ($view_advance_freezed->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="view_advance_freezed" data-field="x_id" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_id" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_advance_freezed->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->freezed->Visible) { // freezed ?>
		<td data-name="freezed">
<span id="el$rowindex$_view_advance_freezed_freezed" class="form-group view_advance_freezed_freezed">
<div id="tp_x<?php echo $view_advance_freezed_list->RowIndex ?>_freezed" class="ew-template"><input type="radio" class="form-check-input" data-table="view_advance_freezed" data-field="x_freezed" data-value-separator="<?php echo $view_advance_freezed->freezed->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_freezed" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_freezed" value="{value}"<?php echo $view_advance_freezed->freezed->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_advance_freezed_list->RowIndex ?>_freezed" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_advance_freezed->freezed->radioButtonListHtml(FALSE, "x{$view_advance_freezed_list->RowIndex}_freezed") ?>
</div></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_freezed" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_freezed" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_freezed" value="<?php echo HtmlEncode($view_advance_freezed->freezed->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID">
<span id="el$rowindex$_view_advance_freezed_PatientID" class="form-group view_advance_freezed_PatientID">
<input type="text" data-table="view_advance_freezed" data-field="x_PatientID" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_PatientID" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->PatientID->EditValue ?>"<?php echo $view_advance_freezed->PatientID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatientID" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_PatientID" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_advance_freezed->PatientID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<span id="el$rowindex$_view_advance_freezed_PatientName" class="form-group view_advance_freezed_PatientName">
<input type="text" data-table="view_advance_freezed" data-field="x_PatientName" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_PatientName" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->PatientName->EditValue ?>"<?php echo $view_advance_freezed->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatientName" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_PatientName" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_advance_freezed->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile">
<span id="el$rowindex$_view_advance_freezed_Mobile" class="form-group view_advance_freezed_Mobile">
<input type="text" data-table="view_advance_freezed" data-field="x_Mobile" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Mobile" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Mobile->EditValue ?>"<?php echo $view_advance_freezed->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Mobile" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_Mobile" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_advance_freezed->Mobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type">
<span id="el$rowindex$_view_advance_freezed_voucher_type" class="form-group view_advance_freezed_voucher_type">
<input type="text" data-table="view_advance_freezed" data-field="x_voucher_type" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_voucher_type" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->voucher_type->EditValue ?>"<?php echo $view_advance_freezed->voucher_type->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_voucher_type" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_voucher_type" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_advance_freezed->voucher_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->Details->Visible) { // Details ?>
		<td data-name="Details">
<span id="el$rowindex$_view_advance_freezed_Details" class="form-group view_advance_freezed_Details">
<input type="text" data-table="view_advance_freezed" data-field="x_Details" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Details" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->Details->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Details->EditValue ?>"<?php echo $view_advance_freezed->Details->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Details" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_Details" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_advance_freezed->Details->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment">
<span id="el$rowindex$_view_advance_freezed_ModeofPayment" class="form-group view_advance_freezed_ModeofPayment">
<input type="text" data-table="view_advance_freezed" data-field="x_ModeofPayment" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_ModeofPayment" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_ModeofPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->ModeofPayment->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->ModeofPayment->EditValue ?>"<?php echo $view_advance_freezed->ModeofPayment->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_ModeofPayment" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_ModeofPayment" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_advance_freezed->ModeofPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<span id="el$rowindex$_view_advance_freezed_Amount" class="form-group view_advance_freezed_Amount">
<input type="text" data-table="view_advance_freezed" data-field="x_Amount" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Amount" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_advance_freezed->Amount->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Amount->EditValue ?>"<?php echo $view_advance_freezed->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Amount" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_Amount" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_advance_freezed->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<span id="el$rowindex$_view_advance_freezed_createdby" class="form-group view_advance_freezed_createdby">
<input type="text" data-table="view_advance_freezed" data-field="x_createdby" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_createdby" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->createdby->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->createdby->EditValue ?>"<?php echo $view_advance_freezed->createdby->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_createdby" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_createdby" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_advance_freezed->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<span id="el$rowindex$_view_advance_freezed_createddatetime" class="form-group view_advance_freezed_createddatetime">
<input type="text" data-table="view_advance_freezed" data-field="x_createddatetime" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_createddatetime" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_advance_freezed->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->createddatetime->EditValue ?>"<?php echo $view_advance_freezed->createddatetime->editAttributes() ?>>
<?php if (!$view_advance_freezed->createddatetime->ReadOnly && !$view_advance_freezed->createddatetime->Disabled && !isset($view_advance_freezed->createddatetime->EditAttrs["readonly"]) && !isset($view_advance_freezed->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_advance_freezedlist", "x<?php echo $view_advance_freezed_list->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_createddatetime" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_createddatetime" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_advance_freezed->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<span id="el$rowindex$_view_advance_freezed_modifiedby" class="form-group view_advance_freezed_modifiedby">
<input type="text" data-table="view_advance_freezed" data-field="x_modifiedby" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_modifiedby" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->modifiedby->EditValue ?>"<?php echo $view_advance_freezed->modifiedby->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_modifiedby" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_modifiedby" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_advance_freezed->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<span id="el$rowindex$_view_advance_freezed_modifieddatetime" class="form-group view_advance_freezed_modifieddatetime">
<input type="text" data-table="view_advance_freezed" data-field="x_modifieddatetime" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_modifieddatetime" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($view_advance_freezed->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->modifieddatetime->EditValue ?>"<?php echo $view_advance_freezed->modifieddatetime->editAttributes() ?>>
<?php if (!$view_advance_freezed->modifieddatetime->ReadOnly && !$view_advance_freezed->modifieddatetime->Disabled && !isset($view_advance_freezed->modifieddatetime->EditAttrs["readonly"]) && !isset($view_advance_freezed->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_advance_freezedlist", "x<?php echo $view_advance_freezed_list->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_modifieddatetime" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_modifieddatetime" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_advance_freezed->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<span id="el$rowindex$_view_advance_freezed_PatID" class="form-group view_advance_freezed_PatID">
<input type="text" data-table="view_advance_freezed" data-field="x_PatID" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_PatID" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_advance_freezed->PatID->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->PatID->EditValue ?>"<?php echo $view_advance_freezed->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatID" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_PatID" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_advance_freezed->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->VisiteType->Visible) { // VisiteType ?>
		<td data-name="VisiteType">
<span id="el$rowindex$_view_advance_freezed_VisiteType" class="form-group view_advance_freezed_VisiteType">
<input type="text" data-table="view_advance_freezed" data-field="x_VisiteType" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_VisiteType" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_VisiteType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->VisiteType->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->VisiteType->EditValue ?>"<?php echo $view_advance_freezed->VisiteType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_VisiteType" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_VisiteType" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_VisiteType" value="<?php echo HtmlEncode($view_advance_freezed->VisiteType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->VisitDate->Visible) { // VisitDate ?>
		<td data-name="VisitDate">
<span id="el$rowindex$_view_advance_freezed_VisitDate" class="form-group view_advance_freezed_VisitDate">
<input type="text" data-table="view_advance_freezed" data-field="x_VisitDate" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_VisitDate" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_VisitDate" placeholder="<?php echo HtmlEncode($view_advance_freezed->VisitDate->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->VisitDate->EditValue ?>"<?php echo $view_advance_freezed->VisitDate->editAttributes() ?>>
<?php if (!$view_advance_freezed->VisitDate->ReadOnly && !$view_advance_freezed->VisitDate->Disabled && !isset($view_advance_freezed->VisitDate->EditAttrs["readonly"]) && !isset($view_advance_freezed->VisitDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_advance_freezedlist", "x<?php echo $view_advance_freezed_list->RowIndex ?>_VisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_VisitDate" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_VisitDate" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_VisitDate" value="<?php echo HtmlEncode($view_advance_freezed->VisitDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->AdvanceNo->Visible) { // AdvanceNo ?>
		<td data-name="AdvanceNo">
<span id="el$rowindex$_view_advance_freezed_AdvanceNo" class="form-group view_advance_freezed_AdvanceNo">
<input type="text" data-table="view_advance_freezed" data-field="x_AdvanceNo" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceNo" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->AdvanceNo->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->AdvanceNo->EditValue ?>"<?php echo $view_advance_freezed->AdvanceNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdvanceNo" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceNo" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceNo" value="<?php echo HtmlEncode($view_advance_freezed->AdvanceNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->Status->Visible) { // Status ?>
		<td data-name="Status">
<span id="el$rowindex$_view_advance_freezed_Status" class="form-group view_advance_freezed_Status">
<input type="text" data-table="view_advance_freezed" data-field="x_Status" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Status" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->Status->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Status->EditValue ?>"<?php echo $view_advance_freezed->Status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Status" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_Status" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_Status" value="<?php echo HtmlEncode($view_advance_freezed->Status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->Date->Visible) { // Date ?>
		<td data-name="Date">
<span id="el$rowindex$_view_advance_freezed_Date" class="form-group view_advance_freezed_Date">
<input type="text" data-table="view_advance_freezed" data-field="x_Date" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Date" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Date" placeholder="<?php echo HtmlEncode($view_advance_freezed->Date->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Date->EditValue ?>"<?php echo $view_advance_freezed->Date->editAttributes() ?>>
<?php if (!$view_advance_freezed->Date->ReadOnly && !$view_advance_freezed->Date->Disabled && !isset($view_advance_freezed->Date->EditAttrs["readonly"]) && !isset($view_advance_freezed->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_advance_freezedlist", "x<?php echo $view_advance_freezed_list->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Date" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_Date" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_Date" value="<?php echo HtmlEncode($view_advance_freezed->Date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
		<td data-name="AdvanceValidityDate">
<span id="el$rowindex$_view_advance_freezed_AdvanceValidityDate" class="form-group view_advance_freezed_AdvanceValidityDate">
<input type="text" data-table="view_advance_freezed" data-field="x_AdvanceValidityDate" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceValidityDate" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceValidityDate" placeholder="<?php echo HtmlEncode($view_advance_freezed->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->AdvanceValidityDate->EditValue ?>"<?php echo $view_advance_freezed->AdvanceValidityDate->editAttributes() ?>>
<?php if (!$view_advance_freezed->AdvanceValidityDate->ReadOnly && !$view_advance_freezed->AdvanceValidityDate->Disabled && !isset($view_advance_freezed->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($view_advance_freezed->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_advance_freezedlist", "x<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdvanceValidityDate" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceValidityDate" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_AdvanceValidityDate" value="<?php echo HtmlEncode($view_advance_freezed->AdvanceValidityDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
		<td data-name="TotalRemainingAdvance">
<span id="el$rowindex$_view_advance_freezed_TotalRemainingAdvance" class="form-group view_advance_freezed_TotalRemainingAdvance">
<input type="text" data-table="view_advance_freezed" data-field="x_TotalRemainingAdvance" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_TotalRemainingAdvance" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->TotalRemainingAdvance->EditValue ?>"<?php echo $view_advance_freezed->TotalRemainingAdvance->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_TotalRemainingAdvance" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_TotalRemainingAdvance" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_TotalRemainingAdvance" value="<?php echo HtmlEncode($view_advance_freezed->TotalRemainingAdvance->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<td data-name="SeectPaymentMode">
<span id="el$rowindex$_view_advance_freezed_SeectPaymentMode" class="form-group view_advance_freezed_SeectPaymentMode">
<input type="text" data-table="view_advance_freezed" data-field="x_SeectPaymentMode" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_SeectPaymentMode" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_SeectPaymentMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->SeectPaymentMode->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->SeectPaymentMode->EditValue ?>"<?php echo $view_advance_freezed->SeectPaymentMode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_SeectPaymentMode" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_SeectPaymentMode" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_SeectPaymentMode" value="<?php echo HtmlEncode($view_advance_freezed->SeectPaymentMode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount">
<span id="el$rowindex$_view_advance_freezed_PaidAmount" class="form-group view_advance_freezed_PaidAmount">
<input type="text" data-table="view_advance_freezed" data-field="x_PaidAmount" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_PaidAmount" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_PaidAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->PaidAmount->EditValue ?>"<?php echo $view_advance_freezed->PaidAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PaidAmount" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_PaidAmount" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($view_advance_freezed->PaidAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->Currency->Visible) { // Currency ?>
		<td data-name="Currency">
<span id="el$rowindex$_view_advance_freezed_Currency" class="form-group view_advance_freezed_Currency">
<input type="text" data-table="view_advance_freezed" data-field="x_Currency" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Currency" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->Currency->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Currency->EditValue ?>"<?php echo $view_advance_freezed->Currency->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Currency" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_Currency" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_Currency" value="<?php echo HtmlEncode($view_advance_freezed->Currency->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber">
<span id="el$rowindex$_view_advance_freezed_CardNumber" class="form-group view_advance_freezed_CardNumber">
<input type="text" data-table="view_advance_freezed" data-field="x_CardNumber" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CardNumber" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->CardNumber->EditValue ?>"<?php echo $view_advance_freezed->CardNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CardNumber" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_CardNumber" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($view_advance_freezed->CardNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->BankName->Visible) { // BankName ?>
		<td data-name="BankName">
<span id="el$rowindex$_view_advance_freezed_BankName" class="form-group view_advance_freezed_BankName">
<input type="text" data-table="view_advance_freezed" data-field="x_BankName" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_BankName" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->BankName->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->BankName->EditValue ?>"<?php echo $view_advance_freezed->BankName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_BankName" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_BankName" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_advance_freezed->BankName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<span id="el$rowindex$_view_advance_freezed_HospID" class="form-group view_advance_freezed_HospID">
<input type="text" data-table="view_advance_freezed" data-field="x_HospID" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_HospID" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_advance_freezed->HospID->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->HospID->EditValue ?>"<?php echo $view_advance_freezed->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_HospID" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_HospID" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_advance_freezed->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<span id="el$rowindex$_view_advance_freezed_Reception" class="form-group view_advance_freezed_Reception">
<input type="text" data-table="view_advance_freezed" data-field="x_Reception" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Reception" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($view_advance_freezed->Reception->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Reception->EditValue ?>"<?php echo $view_advance_freezed->Reception->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Reception" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_Reception" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_advance_freezed->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<span id="el$rowindex$_view_advance_freezed_mrnno" class="form-group view_advance_freezed_mrnno">
<input type="text" data-table="view_advance_freezed" data-field="x_mrnno" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_mrnno" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->mrnno->EditValue ?>"<?php echo $view_advance_freezed->mrnno->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_mrnno" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_mrnno" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_advance_freezed->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->GetUserName->Visible) { // GetUserName ?>
		<td data-name="GetUserName">
<span id="el$rowindex$_view_advance_freezed_GetUserName" class="form-group view_advance_freezed_GetUserName">
<input type="text" data-table="view_advance_freezed" data-field="x_GetUserName" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_GetUserName" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_GetUserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->GetUserName->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->GetUserName->EditValue ?>"<?php echo $view_advance_freezed->GetUserName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_GetUserName" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_GetUserName" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_GetUserName" value="<?php echo HtmlEncode($view_advance_freezed->GetUserName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->AdjustmentwithAdvance->Visible) { // AdjustmentwithAdvance ?>
		<td data-name="AdjustmentwithAdvance">
<span id="el$rowindex$_view_advance_freezed_AdjustmentwithAdvance" class="form-group view_advance_freezed_AdjustmentwithAdvance">
<input type="text" data-table="view_advance_freezed" data-field="x_AdjustmentwithAdvance" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentwithAdvance" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentwithAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->AdjustmentwithAdvance->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->AdjustmentwithAdvance->EditValue ?>"<?php echo $view_advance_freezed->AdjustmentwithAdvance->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdjustmentwithAdvance" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentwithAdvance" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentwithAdvance" value="<?php echo HtmlEncode($view_advance_freezed->AdjustmentwithAdvance->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->AdjustmentBillNumber->Visible) { // AdjustmentBillNumber ?>
		<td data-name="AdjustmentBillNumber">
<span id="el$rowindex$_view_advance_freezed_AdjustmentBillNumber" class="form-group view_advance_freezed_AdjustmentBillNumber">
<input type="text" data-table="view_advance_freezed" data-field="x_AdjustmentBillNumber" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentBillNumber" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentBillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->AdjustmentBillNumber->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->AdjustmentBillNumber->EditValue ?>"<?php echo $view_advance_freezed->AdjustmentBillNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdjustmentBillNumber" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentBillNumber" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_AdjustmentBillNumber" value="<?php echo HtmlEncode($view_advance_freezed->AdjustmentBillNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->CancelAdvance->Visible) { // CancelAdvance ?>
		<td data-name="CancelAdvance">
<span id="el$rowindex$_view_advance_freezed_CancelAdvance" class="form-group view_advance_freezed_CancelAdvance">
<input type="text" data-table="view_advance_freezed" data-field="x_CancelAdvance" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelAdvance" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->CancelAdvance->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->CancelAdvance->EditValue ?>"<?php echo $view_advance_freezed->CancelAdvance->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelAdvance" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelAdvance" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelAdvance" value="<?php echo HtmlEncode($view_advance_freezed->CancelAdvance->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->CancelBy->Visible) { // CancelBy ?>
		<td data-name="CancelBy">
<span id="el$rowindex$_view_advance_freezed_CancelBy" class="form-group view_advance_freezed_CancelBy">
<input type="text" data-table="view_advance_freezed" data-field="x_CancelBy" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelBy" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->CancelBy->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->CancelBy->EditValue ?>"<?php echo $view_advance_freezed->CancelBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelBy" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelBy" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelBy" value="<?php echo HtmlEncode($view_advance_freezed->CancelBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->CancelDate->Visible) { // CancelDate ?>
		<td data-name="CancelDate">
<span id="el$rowindex$_view_advance_freezed_CancelDate" class="form-group view_advance_freezed_CancelDate">
<input type="text" data-table="view_advance_freezed" data-field="x_CancelDate" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDate" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDate" placeholder="<?php echo HtmlEncode($view_advance_freezed->CancelDate->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->CancelDate->EditValue ?>"<?php echo $view_advance_freezed->CancelDate->editAttributes() ?>>
<?php if (!$view_advance_freezed->CancelDate->ReadOnly && !$view_advance_freezed->CancelDate->Disabled && !isset($view_advance_freezed->CancelDate->EditAttrs["readonly"]) && !isset($view_advance_freezed->CancelDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_advance_freezedlist", "x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelDate" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDate" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDate" value="<?php echo HtmlEncode($view_advance_freezed->CancelDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->CancelDateTime->Visible) { // CancelDateTime ?>
		<td data-name="CancelDateTime">
<span id="el$rowindex$_view_advance_freezed_CancelDateTime" class="form-group view_advance_freezed_CancelDateTime">
<input type="text" data-table="view_advance_freezed" data-field="x_CancelDateTime" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDateTime" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDateTime" placeholder="<?php echo HtmlEncode($view_advance_freezed->CancelDateTime->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->CancelDateTime->EditValue ?>"<?php echo $view_advance_freezed->CancelDateTime->editAttributes() ?>>
<?php if (!$view_advance_freezed->CancelDateTime->ReadOnly && !$view_advance_freezed->CancelDateTime->Disabled && !isset($view_advance_freezed->CancelDateTime->EditAttrs["readonly"]) && !isset($view_advance_freezed->CancelDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_advance_freezedlist", "x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelDateTime" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDateTime" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelDateTime" value="<?php echo HtmlEncode($view_advance_freezed->CancelDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->CanceledBy->Visible) { // CanceledBy ?>
		<td data-name="CanceledBy">
<span id="el$rowindex$_view_advance_freezed_CanceledBy" class="form-group view_advance_freezed_CanceledBy">
<input type="text" data-table="view_advance_freezed" data-field="x_CanceledBy" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CanceledBy" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CanceledBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->CanceledBy->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->CanceledBy->EditValue ?>"<?php echo $view_advance_freezed->CanceledBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CanceledBy" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_CanceledBy" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_CanceledBy" value="<?php echo HtmlEncode($view_advance_freezed->CanceledBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->CancelStatus->Visible) { // CancelStatus ?>
		<td data-name="CancelStatus">
<span id="el$rowindex$_view_advance_freezed_CancelStatus" class="form-group view_advance_freezed_CancelStatus">
<input type="text" data-table="view_advance_freezed" data-field="x_CancelStatus" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelStatus" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_CancelStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_freezed->CancelStatus->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->CancelStatus->EditValue ?>"<?php echo $view_advance_freezed->CancelStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelStatus" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelStatus" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_CancelStatus" value="<?php echo HtmlEncode($view_advance_freezed->CancelStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->Cash->Visible) { // Cash ?>
		<td data-name="Cash">
<span id="el$rowindex$_view_advance_freezed_Cash" class="form-group view_advance_freezed_Cash">
<input type="text" data-table="view_advance_freezed" data-field="x_Cash" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Cash" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Cash" size="30" placeholder="<?php echo HtmlEncode($view_advance_freezed->Cash->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Cash->EditValue ?>"<?php echo $view_advance_freezed->Cash->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Cash" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_Cash" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_Cash" value="<?php echo HtmlEncode($view_advance_freezed->Cash->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_advance_freezed->Card->Visible) { // Card ?>
		<td data-name="Card">
<span id="el$rowindex$_view_advance_freezed_Card" class="form-group view_advance_freezed_Card">
<input type="text" data-table="view_advance_freezed" data-field="x_Card" name="x<?php echo $view_advance_freezed_list->RowIndex ?>_Card" id="x<?php echo $view_advance_freezed_list->RowIndex ?>_Card" size="30" placeholder="<?php echo HtmlEncode($view_advance_freezed->Card->getPlaceHolder()) ?>" value="<?php echo $view_advance_freezed->Card->EditValue ?>"<?php echo $view_advance_freezed->Card->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Card" name="o<?php echo $view_advance_freezed_list->RowIndex ?>_Card" id="o<?php echo $view_advance_freezed_list->RowIndex ?>_Card" value="<?php echo HtmlEncode($view_advance_freezed->Card->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_advance_freezed_list->ListOptions->render("body", "right", $view_advance_freezed_list->RowIndex);
?>
<script>
fview_advance_freezedlist.updateLists(<?php echo $view_advance_freezed_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($view_advance_freezed->isEdit()) { ?>
<input type="hidden" name="<?php echo $view_advance_freezed_list->FormKeyCountName ?>" id="<?php echo $view_advance_freezed_list->FormKeyCountName ?>" value="<?php echo $view_advance_freezed_list->KeyCount ?>">
<?php } ?>
<?php if ($view_advance_freezed->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_advance_freezed_list->FormKeyCountName ?>" id="<?php echo $view_advance_freezed_list->FormKeyCountName ?>" value="<?php echo $view_advance_freezed_list->KeyCount ?>">
<?php echo $view_advance_freezed_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_advance_freezed->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_advance_freezed_list->Recordset)
	$view_advance_freezed_list->Recordset->Close();
?>
<?php if (!$view_advance_freezed->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_advance_freezed->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_advance_freezed_list->Pager)) $view_advance_freezed_list->Pager = new NumericPager($view_advance_freezed_list->StartRec, $view_advance_freezed_list->DisplayRecs, $view_advance_freezed_list->TotalRecs, $view_advance_freezed_list->RecRange, $view_advance_freezed_list->AutoHidePager) ?>
<?php if ($view_advance_freezed_list->Pager->RecordCount > 0 && $view_advance_freezed_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_advance_freezed_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_advance_freezed_list->pageUrl() ?>start=<?php echo $view_advance_freezed_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_advance_freezed_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_advance_freezed_list->pageUrl() ?>start=<?php echo $view_advance_freezed_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_advance_freezed_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_advance_freezed_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_advance_freezed_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_advance_freezed_list->pageUrl() ?>start=<?php echo $view_advance_freezed_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_advance_freezed_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_advance_freezed_list->pageUrl() ?>start=<?php echo $view_advance_freezed_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_advance_freezed_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_advance_freezed_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_advance_freezed_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_advance_freezed_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_advance_freezed_list->TotalRecs > 0 && (!$view_advance_freezed_list->AutoHidePageSizeSelector || $view_advance_freezed_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_advance_freezed">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_advance_freezed_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_advance_freezed_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_advance_freezed_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_advance_freezed_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_advance_freezed_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_advance_freezed_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_advance_freezed->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_advance_freezed_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_advance_freezed_list->TotalRecs == 0 && !$view_advance_freezed->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_advance_freezed_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_advance_freezed_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_advance_freezed->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_advance_freezed->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_advance_freezed", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_advance_freezed_list->terminate();
?>