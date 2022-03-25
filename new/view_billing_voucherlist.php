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
$view_billing_voucher_list = new view_billing_voucher_list();

// Run the page
$view_billing_voucher_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_billing_voucher_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_billing_voucher_list->isExport()) { ?>
<script>
var fview_billing_voucherlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_billing_voucherlist = currentForm = new ew.Form("fview_billing_voucherlist", "list");
	fview_billing_voucherlist.formKeyCountName = '<?php echo $view_billing_voucher_list->FormKeyCountName ?>';

	// Validate form
	fview_billing_voucherlist.validate = function() {
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
			<?php if ($view_billing_voucher_list->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_list->createddatetime->caption(), $view_billing_voucher_list->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_list->createddatetime->errorMessage()) ?>");
			<?php if ($view_billing_voucher_list->BillNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_BillNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_list->BillNumber->caption(), $view_billing_voucher_list->BillNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_list->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_list->PatientId->caption(), $view_billing_voucher_list->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_list->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_list->PatientName->caption(), $view_billing_voucher_list->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_list->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_list->Mobile->caption(), $view_billing_voucher_list->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_list->Doctor->Required) { ?>
				elm = this.getElements("x" + infix + "_Doctor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_list->Doctor->caption(), $view_billing_voucher_list->Doctor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_list->ModeofPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_ModeofPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_list->ModeofPayment->caption(), $view_billing_voucher_list->ModeofPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_list->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_list->Amount->caption(), $view_billing_voucher_list->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_list->Amount->errorMessage()) ?>");
			<?php if ($view_billing_voucher_list->BankName->Required) { ?>
				elm = this.getElements("x" + infix + "_BankName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_list->BankName->caption(), $view_billing_voucher_list->BankName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_list->UserName->Required) { ?>
				elm = this.getElements("x" + infix + "_UserName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_list->UserName->caption(), $view_billing_voucher_list->UserName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_list->BillType->Required) { ?>
				elm = this.getElements("x" + infix + "_BillType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_list->BillType->caption(), $view_billing_voucher_list->BillType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_list->CancelBill->Required) { ?>
				elm = this.getElements("x" + infix + "_CancelBill");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_list->CancelBill->caption(), $view_billing_voucher_list->CancelBill->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_list->LabTest->Required) { ?>
				elm = this.getElements("x" + infix + "_LabTest");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_list->LabTest->caption(), $view_billing_voucher_list->LabTest->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_list->sid->Required) { ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_list->sid->caption(), $view_billing_voucher_list->sid->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_list->SidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_SidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_list->SidNo->caption(), $view_billing_voucher_list->SidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_list->createdDatettime->Required) { ?>
				elm = this.getElements("x" + infix + "_createdDatettime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_list->createdDatettime->caption(), $view_billing_voucher_list->createdDatettime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_billing_voucher_list->GoogleReviewID->Required) { ?>
				elm = this.getElements("x" + infix + "_GoogleReviewID[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher_list->GoogleReviewID->caption(), $view_billing_voucher_list->GoogleReviewID->RequiredErrorMessage)) ?>");
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
	fview_billing_voucherlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "createddatetime", false)) return false;
		if (ew.valueChanged(fobj, infix, "BillNumber", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
		if (ew.valueChanged(fobj, infix, "Mobile", false)) return false;
		if (ew.valueChanged(fobj, infix, "Doctor", false)) return false;
		if (ew.valueChanged(fobj, infix, "ModeofPayment", false)) return false;
		if (ew.valueChanged(fobj, infix, "Amount", false)) return false;
		if (ew.valueChanged(fobj, infix, "BankName", false)) return false;
		if (ew.valueChanged(fobj, infix, "BillType", false)) return false;
		if (ew.valueChanged(fobj, infix, "CancelBill", false)) return false;
		if (ew.valueChanged(fobj, infix, "LabTest", false)) return false;
		if (ew.valueChanged(fobj, infix, "sid", false)) return false;
		if (ew.valueChanged(fobj, infix, "SidNo", false)) return false;
		if (ew.valueChanged(fobj, infix, "GoogleReviewID[]", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fview_billing_voucherlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_billing_voucherlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_billing_voucherlist.lists["x_ModeofPayment"] = <?php echo $view_billing_voucher_list->ModeofPayment->Lookup->toClientList($view_billing_voucher_list) ?>;
	fview_billing_voucherlist.lists["x_ModeofPayment"].options = <?php echo JsonEncode($view_billing_voucher_list->ModeofPayment->lookupOptions()) ?>;
	fview_billing_voucherlist.lists["x_CancelBill"] = <?php echo $view_billing_voucher_list->CancelBill->Lookup->toClientList($view_billing_voucher_list) ?>;
	fview_billing_voucherlist.lists["x_CancelBill"].options = <?php echo JsonEncode($view_billing_voucher_list->CancelBill->options(FALSE, TRUE)) ?>;
	fview_billing_voucherlist.lists["x_GoogleReviewID[]"] = <?php echo $view_billing_voucher_list->GoogleReviewID->Lookup->toClientList($view_billing_voucher_list) ?>;
	fview_billing_voucherlist.lists["x_GoogleReviewID[]"].options = <?php echo JsonEncode($view_billing_voucher_list->GoogleReviewID->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_billing_voucherlist");
});
var fview_billing_voucherlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_billing_voucherlistsrch = currentSearchForm = new ew.Form("fview_billing_voucherlistsrch");

	// Validate function for search
	fview_billing_voucherlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_createddatetime");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_list->createddatetime->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_billing_voucherlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_billing_voucherlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_billing_voucherlistsrch.filterList = <?php echo $view_billing_voucher_list->getFilterList() ?>;
	loadjs.done("fview_billing_voucherlistsrch");
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
<?php if (!$view_billing_voucher_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_billing_voucher_list->TotalRecords > 0 && $view_billing_voucher_list->ExportOptions->visible()) { ?>
<?php $view_billing_voucher_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_billing_voucher_list->ImportOptions->visible()) { ?>
<?php $view_billing_voucher_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_billing_voucher_list->SearchOptions->visible()) { ?>
<?php $view_billing_voucher_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_billing_voucher_list->FilterOptions->visible()) { ?>
<?php $view_billing_voucher_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_billing_voucher_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_billing_voucher_list->isExport() && !$view_billing_voucher->CurrentAction) { ?>
<form name="fview_billing_voucherlistsrch" id="fview_billing_voucherlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_billing_voucherlistsrch-search-panel" class="<?php echo $view_billing_voucher_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_billing_voucher">
	<div class="ew-extended-search">
<?php

// Render search row
$view_billing_voucher->RowType = ROWTYPE_SEARCH;
$view_billing_voucher->resetAttributes();
$view_billing_voucher_list->renderRow();
?>
<?php if ($view_billing_voucher_list->createddatetime->Visible) { // createddatetime ?>
	<?php
		$view_billing_voucher_list->SearchColumnCount++;
		if (($view_billing_voucher_list->SearchColumnCount - 1) % $view_billing_voucher_list->SearchFieldsPerRow == 0) {
			$view_billing_voucher_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_billing_voucher_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_createddatetime" class="ew-cell form-group">
		<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $view_billing_voucher_list->createddatetime->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_createddatetime" id="z_createddatetime" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_billing_voucher_list->createddatetime->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_billing_voucher_list->createddatetime->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_billing_voucher_list->createddatetime->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_billing_voucher_list->createddatetime->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_billing_voucher_list->createddatetime->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_billing_voucher_list->createddatetime->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_billing_voucher_list->createddatetime->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_billing_voucher_list->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_billing_voucher_list->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_billing_voucher_createddatetime" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->createddatetime->EditValue ?>"<?php echo $view_billing_voucher_list->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_voucher_list->createddatetime->ReadOnly && !$view_billing_voucher_list->createddatetime->Disabled && !isset($view_billing_voucher_list->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_voucher_list->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_voucherlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_billing_voucherlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_billing_voucher_createddatetime" class="ew-search-field2 d-none">
<input type="text" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->createddatetime->EditValue2 ?>"<?php echo $view_billing_voucher_list->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_voucher_list->createddatetime->ReadOnly && !$view_billing_voucher_list->createddatetime->Disabled && !isset($view_billing_voucher_list->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_voucher_list->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_voucherlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_billing_voucherlistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_billing_voucher_list->SearchColumnCount % $view_billing_voucher_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->BillNumber->Visible) { // BillNumber ?>
	<?php
		$view_billing_voucher_list->SearchColumnCount++;
		if (($view_billing_voucher_list->SearchColumnCount - 1) % $view_billing_voucher_list->SearchFieldsPerRow == 0) {
			$view_billing_voucher_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_billing_voucher_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_BillNumber" class="ew-cell form-group">
		<label for="x_BillNumber" class="ew-search-caption ew-label"><?php echo $view_billing_voucher_list->BillNumber->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE">
</span>
		<span id="el_view_billing_voucher_BillNumber" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->BillNumber->EditValue ?>"<?php echo $view_billing_voucher_list->BillNumber->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_billing_voucher_list->SearchColumnCount % $view_billing_voucher_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->PatientId->Visible) { // PatientId ?>
	<?php
		$view_billing_voucher_list->SearchColumnCount++;
		if (($view_billing_voucher_list->SearchColumnCount - 1) % $view_billing_voucher_list->SearchFieldsPerRow == 0) {
			$view_billing_voucher_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_billing_voucher_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientId" class="ew-cell form-group">
		<label for="x_PatientId" class="ew-search-caption ew-label"><?php echo $view_billing_voucher_list->PatientId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE">
</span>
		<span id="el_view_billing_voucher_PatientId" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->PatientId->EditValue ?>"<?php echo $view_billing_voucher_list->PatientId->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_billing_voucher_list->SearchColumnCount % $view_billing_voucher_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->PatientName->Visible) { // PatientName ?>
	<?php
		$view_billing_voucher_list->SearchColumnCount++;
		if (($view_billing_voucher_list->SearchColumnCount - 1) % $view_billing_voucher_list->SearchFieldsPerRow == 0) {
			$view_billing_voucher_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_billing_voucher_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_billing_voucher_list->PatientName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		<span id="el_view_billing_voucher_PatientName" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->PatientName->EditValue ?>"<?php echo $view_billing_voucher_list->PatientName->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_billing_voucher_list->SearchColumnCount % $view_billing_voucher_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->Mobile->Visible) { // Mobile ?>
	<?php
		$view_billing_voucher_list->SearchColumnCount++;
		if (($view_billing_voucher_list->SearchColumnCount - 1) % $view_billing_voucher_list->SearchFieldsPerRow == 0) {
			$view_billing_voucher_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_billing_voucher_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Mobile" class="ew-cell form-group">
		<label for="x_Mobile" class="ew-search-caption ew-label"><?php echo $view_billing_voucher_list->Mobile->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE">
</span>
		<span id="el_view_billing_voucher_Mobile" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->Mobile->EditValue ?>"<?php echo $view_billing_voucher_list->Mobile->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_billing_voucher_list->SearchColumnCount % $view_billing_voucher_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_billing_voucher_list->SearchColumnCount % $view_billing_voucher_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_billing_voucher_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_billing_voucher_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_billing_voucher_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_billing_voucher_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_billing_voucher_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_billing_voucher_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_billing_voucher_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_billing_voucher_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_billing_voucher_list->showPageHeader(); ?>
<?php
$view_billing_voucher_list->showMessage();
?>
<?php if ($view_billing_voucher_list->TotalRecords > 0 || $view_billing_voucher->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_billing_voucher_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_billing_voucher">
<?php if (!$view_billing_voucher_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_billing_voucher_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_billing_voucher_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_billing_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_billing_voucherlist" id="fview_billing_voucherlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher">
<div id="gmp_view_billing_voucher" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_billing_voucher_list->TotalRecords > 0 || $view_billing_voucher_list->isGridEdit()) { ?>
<table id="tbl_view_billing_voucherlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_billing_voucher->RowType = ROWTYPE_HEADER;

// Render list options
$view_billing_voucher_list->renderListOptions();

// Render list options (header, left)
$view_billing_voucher_list->ListOptions->render("header", "left");
?>
<?php if ($view_billing_voucher_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_billing_voucher_list->SortUrl($view_billing_voucher_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_billing_voucher_list->createddatetime->headerCellClass() ?>"><div id="elh_view_billing_voucher_createddatetime" class="view_billing_voucher_createddatetime"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_billing_voucher_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_list->SortUrl($view_billing_voucher_list->createddatetime) ?>', 1);"><div id="elh_view_billing_voucher_createddatetime" class="view_billing_voucher_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_billing_voucher_list->SortUrl($view_billing_voucher_list->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_billing_voucher_list->BillNumber->headerCellClass() ?>"><div id="elh_view_billing_voucher_BillNumber" class="view_billing_voucher_BillNumber"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_list->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_billing_voucher_list->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_list->SortUrl($view_billing_voucher_list->BillNumber) ?>', 1);"><div id="elh_view_billing_voucher_BillNumber" class="view_billing_voucher_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_list->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_list->BillNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_list->BillNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->PatientId->Visible) { // PatientId ?>
	<?php if ($view_billing_voucher_list->SortUrl($view_billing_voucher_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_billing_voucher_list->PatientId->headerCellClass() ?>"><div id="elh_view_billing_voucher_PatientId" class="view_billing_voucher_PatientId"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_billing_voucher_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_list->SortUrl($view_billing_voucher_list->PatientId) ?>', 1);"><div id="elh_view_billing_voucher_PatientId" class="view_billing_voucher_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_list->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_billing_voucher_list->SortUrl($view_billing_voucher_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_billing_voucher_list->PatientName->headerCellClass() ?>"><div id="elh_view_billing_voucher_PatientName" class="view_billing_voucher_PatientName"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_billing_voucher_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_list->SortUrl($view_billing_voucher_list->PatientName) ?>', 1);"><div id="elh_view_billing_voucher_PatientName" class="view_billing_voucher_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->Mobile->Visible) { // Mobile ?>
	<?php if ($view_billing_voucher_list->SortUrl($view_billing_voucher_list->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_billing_voucher_list->Mobile->headerCellClass() ?>"><div id="elh_view_billing_voucher_Mobile" class="view_billing_voucher_Mobile"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_list->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_billing_voucher_list->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_list->SortUrl($view_billing_voucher_list->Mobile) ?>', 1);"><div id="elh_view_billing_voucher_Mobile" class="view_billing_voucher_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_list->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_list->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_list->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->Doctor->Visible) { // Doctor ?>
	<?php if ($view_billing_voucher_list->SortUrl($view_billing_voucher_list->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_billing_voucher_list->Doctor->headerCellClass() ?>"><div id="elh_view_billing_voucher_Doctor" class="view_billing_voucher_Doctor"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_list->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_billing_voucher_list->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_list->SortUrl($view_billing_voucher_list->Doctor) ?>', 1);"><div id="elh_view_billing_voucher_Doctor" class="view_billing_voucher_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_list->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_list->Doctor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_list->Doctor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_billing_voucher_list->SortUrl($view_billing_voucher_list->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_billing_voucher_list->ModeofPayment->headerCellClass() ?>"><div id="elh_view_billing_voucher_ModeofPayment" class="view_billing_voucher_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_list->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_billing_voucher_list->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_list->SortUrl($view_billing_voucher_list->ModeofPayment) ?>', 1);"><div id="elh_view_billing_voucher_ModeofPayment" class="view_billing_voucher_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_list->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_list->ModeofPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_list->ModeofPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->Amount->Visible) { // Amount ?>
	<?php if ($view_billing_voucher_list->SortUrl($view_billing_voucher_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_billing_voucher_list->Amount->headerCellClass() ?>"><div id="elh_view_billing_voucher_Amount" class="view_billing_voucher_Amount"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_billing_voucher_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_list->SortUrl($view_billing_voucher_list->Amount) ?>', 1);"><div id="elh_view_billing_voucher_Amount" class="view_billing_voucher_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->BankName->Visible) { // BankName ?>
	<?php if ($view_billing_voucher_list->SortUrl($view_billing_voucher_list->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $view_billing_voucher_list->BankName->headerCellClass() ?>"><div id="elh_view_billing_voucher_BankName" class="view_billing_voucher_BankName"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_list->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $view_billing_voucher_list->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_list->SortUrl($view_billing_voucher_list->BankName) ?>', 1);"><div id="elh_view_billing_voucher_BankName" class="view_billing_voucher_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_list->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_list->BankName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_list->BankName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->UserName->Visible) { // UserName ?>
	<?php if ($view_billing_voucher_list->SortUrl($view_billing_voucher_list->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $view_billing_voucher_list->UserName->headerCellClass() ?>"><div id="elh_view_billing_voucher_UserName" class="view_billing_voucher_UserName"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_list->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $view_billing_voucher_list->UserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_list->SortUrl($view_billing_voucher_list->UserName) ?>', 1);"><div id="elh_view_billing_voucher_UserName" class="view_billing_voucher_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_list->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_list->UserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_list->UserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->BillType->Visible) { // BillType ?>
	<?php if ($view_billing_voucher_list->SortUrl($view_billing_voucher_list->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $view_billing_voucher_list->BillType->headerCellClass() ?>"><div id="elh_view_billing_voucher_BillType" class="view_billing_voucher_BillType"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_list->BillType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $view_billing_voucher_list->BillType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_list->SortUrl($view_billing_voucher_list->BillType) ?>', 1);"><div id="elh_view_billing_voucher_BillType" class="view_billing_voucher_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_list->BillType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_list->BillType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_list->BillType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->CancelBill->Visible) { // CancelBill ?>
	<?php if ($view_billing_voucher_list->SortUrl($view_billing_voucher_list->CancelBill) == "") { ?>
		<th data-name="CancelBill" class="<?php echo $view_billing_voucher_list->CancelBill->headerCellClass() ?>"><div id="elh_view_billing_voucher_CancelBill" class="view_billing_voucher_CancelBill"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_list->CancelBill->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelBill" class="<?php echo $view_billing_voucher_list->CancelBill->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_list->SortUrl($view_billing_voucher_list->CancelBill) ?>', 1);"><div id="elh_view_billing_voucher_CancelBill" class="view_billing_voucher_CancelBill">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_list->CancelBill->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_list->CancelBill->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_list->CancelBill->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->LabTest->Visible) { // LabTest ?>
	<?php if ($view_billing_voucher_list->SortUrl($view_billing_voucher_list->LabTest) == "") { ?>
		<th data-name="LabTest" class="<?php echo $view_billing_voucher_list->LabTest->headerCellClass() ?>"><div id="elh_view_billing_voucher_LabTest" class="view_billing_voucher_LabTest"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_list->LabTest->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabTest" class="<?php echo $view_billing_voucher_list->LabTest->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_list->SortUrl($view_billing_voucher_list->LabTest) ?>', 1);"><div id="elh_view_billing_voucher_LabTest" class="view_billing_voucher_LabTest">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_list->LabTest->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_list->LabTest->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_list->LabTest->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->sid->Visible) { // sid ?>
	<?php if ($view_billing_voucher_list->SortUrl($view_billing_voucher_list->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $view_billing_voucher_list->sid->headerCellClass() ?>"><div id="elh_view_billing_voucher_sid" class="view_billing_voucher_sid"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_list->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $view_billing_voucher_list->sid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_list->SortUrl($view_billing_voucher_list->sid) ?>', 1);"><div id="elh_view_billing_voucher_sid" class="view_billing_voucher_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_list->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_list->sid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_list->sid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->SidNo->Visible) { // SidNo ?>
	<?php if ($view_billing_voucher_list->SortUrl($view_billing_voucher_list->SidNo) == "") { ?>
		<th data-name="SidNo" class="<?php echo $view_billing_voucher_list->SidNo->headerCellClass() ?>"><div id="elh_view_billing_voucher_SidNo" class="view_billing_voucher_SidNo"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_list->SidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SidNo" class="<?php echo $view_billing_voucher_list->SidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_list->SortUrl($view_billing_voucher_list->SidNo) ?>', 1);"><div id="elh_view_billing_voucher_SidNo" class="view_billing_voucher_SidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_list->SidNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_list->SidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_list->SidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->createdDatettime->Visible) { // createdDatettime ?>
	<?php if ($view_billing_voucher_list->SortUrl($view_billing_voucher_list->createdDatettime) == "") { ?>
		<th data-name="createdDatettime" class="<?php echo $view_billing_voucher_list->createdDatettime->headerCellClass() ?>"><div id="elh_view_billing_voucher_createdDatettime" class="view_billing_voucher_createdDatettime"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_list->createdDatettime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDatettime" class="<?php echo $view_billing_voucher_list->createdDatettime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_list->SortUrl($view_billing_voucher_list->createdDatettime) ?>', 1);"><div id="elh_view_billing_voucher_createdDatettime" class="view_billing_voucher_createdDatettime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_list->createdDatettime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_list->createdDatettime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_list->createdDatettime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_list->GoogleReviewID->Visible) { // GoogleReviewID ?>
	<?php if ($view_billing_voucher_list->SortUrl($view_billing_voucher_list->GoogleReviewID) == "") { ?>
		<th data-name="GoogleReviewID" class="<?php echo $view_billing_voucher_list->GoogleReviewID->headerCellClass() ?>"><div id="elh_view_billing_voucher_GoogleReviewID" class="view_billing_voucher_GoogleReviewID"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_list->GoogleReviewID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GoogleReviewID" class="<?php echo $view_billing_voucher_list->GoogleReviewID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_list->SortUrl($view_billing_voucher_list->GoogleReviewID) ?>', 1);"><div id="elh_view_billing_voucher_GoogleReviewID" class="view_billing_voucher_GoogleReviewID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_list->GoogleReviewID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_list->GoogleReviewID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_list->GoogleReviewID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_billing_voucher_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_billing_voucher_list->ExportAll && $view_billing_voucher_list->isExport()) {
	$view_billing_voucher_list->StopRecord = $view_billing_voucher_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_billing_voucher_list->TotalRecords > $view_billing_voucher_list->StartRecord + $view_billing_voucher_list->DisplayRecords - 1)
		$view_billing_voucher_list->StopRecord = $view_billing_voucher_list->StartRecord + $view_billing_voucher_list->DisplayRecords - 1;
	else
		$view_billing_voucher_list->StopRecord = $view_billing_voucher_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($view_billing_voucher->isConfirm() || $view_billing_voucher_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_billing_voucher_list->FormKeyCountName) && ($view_billing_voucher_list->isGridAdd() || $view_billing_voucher_list->isGridEdit() || $view_billing_voucher->isConfirm())) {
		$view_billing_voucher_list->KeyCount = $CurrentForm->getValue($view_billing_voucher_list->FormKeyCountName);
		$view_billing_voucher_list->StopRecord = $view_billing_voucher_list->StartRecord + $view_billing_voucher_list->KeyCount - 1;
	}
}
$view_billing_voucher_list->RecordCount = $view_billing_voucher_list->StartRecord - 1;
if ($view_billing_voucher_list->Recordset && !$view_billing_voucher_list->Recordset->EOF) {
	$view_billing_voucher_list->Recordset->moveFirst();
	$selectLimit = $view_billing_voucher_list->UseSelectLimit;
	if (!$selectLimit && $view_billing_voucher_list->StartRecord > 1)
		$view_billing_voucher_list->Recordset->move($view_billing_voucher_list->StartRecord - 1);
} elseif (!$view_billing_voucher->AllowAddDeleteRow && $view_billing_voucher_list->StopRecord == 0) {
	$view_billing_voucher_list->StopRecord = $view_billing_voucher->GridAddRowCount;
}

// Initialize aggregate
$view_billing_voucher->RowType = ROWTYPE_AGGREGATEINIT;
$view_billing_voucher->resetAttributes();
$view_billing_voucher_list->renderRow();
if ($view_billing_voucher_list->isGridAdd())
	$view_billing_voucher_list->RowIndex = 0;
if ($view_billing_voucher_list->isGridEdit())
	$view_billing_voucher_list->RowIndex = 0;
while ($view_billing_voucher_list->RecordCount < $view_billing_voucher_list->StopRecord) {
	$view_billing_voucher_list->RecordCount++;
	if ($view_billing_voucher_list->RecordCount >= $view_billing_voucher_list->StartRecord) {
		$view_billing_voucher_list->RowCount++;
		if ($view_billing_voucher_list->isGridAdd() || $view_billing_voucher_list->isGridEdit() || $view_billing_voucher->isConfirm()) {
			$view_billing_voucher_list->RowIndex++;
			$CurrentForm->Index = $view_billing_voucher_list->RowIndex;
			if ($CurrentForm->hasValue($view_billing_voucher_list->FormActionName) && ($view_billing_voucher->isConfirm() || $view_billing_voucher_list->EventCancelled))
				$view_billing_voucher_list->RowAction = strval($CurrentForm->getValue($view_billing_voucher_list->FormActionName));
			elseif ($view_billing_voucher_list->isGridAdd())
				$view_billing_voucher_list->RowAction = "insert";
			else
				$view_billing_voucher_list->RowAction = "";
		}

		// Set up key count
		$view_billing_voucher_list->KeyCount = $view_billing_voucher_list->RowIndex;

		// Init row class and style
		$view_billing_voucher->resetAttributes();
		$view_billing_voucher->CssClass = "";
		if ($view_billing_voucher_list->isGridAdd()) {
			$view_billing_voucher_list->loadRowValues(); // Load default values
		} else {
			$view_billing_voucher_list->loadRowValues($view_billing_voucher_list->Recordset); // Load row values
		}
		$view_billing_voucher->RowType = ROWTYPE_VIEW; // Render view
		if ($view_billing_voucher_list->isGridAdd()) // Grid add
			$view_billing_voucher->RowType = ROWTYPE_ADD; // Render add
		if ($view_billing_voucher_list->isGridAdd() && $view_billing_voucher->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_billing_voucher_list->restoreCurrentRowFormValues($view_billing_voucher_list->RowIndex); // Restore form values
		if ($view_billing_voucher_list->isGridEdit()) { // Grid edit
			if ($view_billing_voucher->EventCancelled)
				$view_billing_voucher_list->restoreCurrentRowFormValues($view_billing_voucher_list->RowIndex); // Restore form values
			if ($view_billing_voucher_list->RowAction == "insert")
				$view_billing_voucher->RowType = ROWTYPE_ADD; // Render add
			else
				$view_billing_voucher->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_billing_voucher_list->isGridEdit() && ($view_billing_voucher->RowType == ROWTYPE_EDIT || $view_billing_voucher->RowType == ROWTYPE_ADD) && $view_billing_voucher->EventCancelled) // Update failed
			$view_billing_voucher_list->restoreCurrentRowFormValues($view_billing_voucher_list->RowIndex); // Restore form values
		if ($view_billing_voucher->RowType == ROWTYPE_EDIT) // Edit row
			$view_billing_voucher_list->EditRowCount++;

		// Set up row id / data-rowindex
		$view_billing_voucher->RowAttrs->merge(["data-rowindex" => $view_billing_voucher_list->RowCount, "id" => "r" . $view_billing_voucher_list->RowCount . "_view_billing_voucher", "data-rowtype" => $view_billing_voucher->RowType]);

		// Render row
		$view_billing_voucher_list->renderRow();

		// Render list options
		$view_billing_voucher_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_billing_voucher_list->RowAction != "delete" && $view_billing_voucher_list->RowAction != "insertdelete" && !($view_billing_voucher_list->RowAction == "insert" && $view_billing_voucher->isConfirm() && $view_billing_voucher_list->emptyRow())) {
?>
	<tr <?php echo $view_billing_voucher->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_billing_voucher_list->ListOptions->render("body", "left", $view_billing_voucher_list->RowCount);
?>
	<?php if ($view_billing_voucher_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_billing_voucher_list->createddatetime->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_createddatetime" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->createddatetime->EditValue ?>"<?php echo $view_billing_voucher_list->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_voucher_list->createddatetime->ReadOnly && !$view_billing_voucher_list->createddatetime->Disabled && !isset($view_billing_voucher_list->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_voucher_list->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_voucherlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_billing_voucherlist", "x<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_createddatetime" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_billing_voucher_list->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_createddatetime" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->createddatetime->EditValue ?>"<?php echo $view_billing_voucher_list->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_voucher_list->createddatetime->ReadOnly && !$view_billing_voucher_list->createddatetime->Disabled && !isset($view_billing_voucher_list->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_voucher_list->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_voucherlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_billing_voucherlist", "x<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_createddatetime">
<span<?php echo $view_billing_voucher_list->createddatetime->viewAttributes() ?>><?php echo $view_billing_voucher_list->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_id" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_id" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_billing_voucher_list->id->CurrentValue) ?>">
<input type="hidden" data-table="view_billing_voucher" data-field="x_id" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_id" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_billing_voucher_list->id->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT || $view_billing_voucher->CurrentMode == "edit") { ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_id" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_id" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_billing_voucher_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($view_billing_voucher_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" <?php echo $view_billing_voucher_list->BillNumber->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_BillNumber" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_BillNumber" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->BillNumber->EditValue ?>"<?php echo $view_billing_voucher_list->BillNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BillNumber" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($view_billing_voucher_list->BillNumber->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_BillNumber" class="form-group">
<span<?php echo $view_billing_voucher_list->BillNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_billing_voucher_list->BillNumber->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BillNumber" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($view_billing_voucher_list->BillNumber->CurrentValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_BillNumber">
<span<?php echo $view_billing_voucher_list->BillNumber->viewAttributes() ?>><?php echo $view_billing_voucher_list->BillNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $view_billing_voucher_list->PatientId->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_PatientId" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientId" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->PatientId->EditValue ?>"<?php echo $view_billing_voucher_list->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PatientId" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_billing_voucher_list->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_PatientId" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientId" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->PatientId->EditValue ?>"<?php echo $view_billing_voucher_list->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_PatientId">
<span<?php echo $view_billing_voucher_list->PatientId->viewAttributes() ?>><?php echo $view_billing_voucher_list->PatientId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_billing_voucher_list->PatientName->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_PatientName" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientName" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->PatientName->EditValue ?>"<?php echo $view_billing_voucher_list->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PatientName" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_billing_voucher_list->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_PatientName" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientName" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->PatientName->EditValue ?>"<?php echo $view_billing_voucher_list->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_PatientName">
<span<?php echo $view_billing_voucher_list->PatientName->viewAttributes() ?>><?php echo $view_billing_voucher_list->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $view_billing_voucher_list->Mobile->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_Mobile" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_Mobile" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->Mobile->EditValue ?>"<?php echo $view_billing_voucher_list->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Mobile" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_billing_voucher_list->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_Mobile" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_Mobile" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->Mobile->EditValue ?>"<?php echo $view_billing_voucher_list->Mobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_Mobile">
<span<?php echo $view_billing_voucher_list->Mobile->viewAttributes() ?>><?php echo $view_billing_voucher_list->Mobile->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor" <?php echo $view_billing_voucher_list->Doctor->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_Doctor" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_Doctor" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->Doctor->EditValue ?>"<?php echo $view_billing_voucher_list->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Doctor" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($view_billing_voucher_list->Doctor->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_Doctor" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_Doctor" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->Doctor->EditValue ?>"<?php echo $view_billing_voucher_list->Doctor->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_Doctor">
<span<?php echo $view_billing_voucher_list->Doctor->viewAttributes() ?>><?php echo $view_billing_voucher_list->Doctor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" <?php echo $view_billing_voucher_list->ModeofPayment->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_ModeofPayment" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_billing_voucher_list->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment"<?php echo $view_billing_voucher_list->ModeofPayment->editAttributes() ?>>
			<?php echo $view_billing_voucher_list->ModeofPayment->selectOptionListHtml("x{$view_billing_voucher_list->RowIndex}_ModeofPayment") ?>
		</select>
</div>
<?php echo $view_billing_voucher_list->ModeofPayment->Lookup->getParamTag($view_billing_voucher_list, "p_x" . $view_billing_voucher_list->RowIndex . "_ModeofPayment") ?>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_ModeofPayment" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_billing_voucher_list->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_ModeofPayment" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_billing_voucher_list->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment"<?php echo $view_billing_voucher_list->ModeofPayment->editAttributes() ?>>
			<?php echo $view_billing_voucher_list->ModeofPayment->selectOptionListHtml("x{$view_billing_voucher_list->RowIndex}_ModeofPayment") ?>
		</select>
</div>
<?php echo $view_billing_voucher_list->ModeofPayment->Lookup->getParamTag($view_billing_voucher_list, "p_x" . $view_billing_voucher_list->RowIndex . "_ModeofPayment") ?>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_ModeofPayment">
<span<?php echo $view_billing_voucher_list->ModeofPayment->viewAttributes() ?>><?php echo $view_billing_voucher_list->ModeofPayment->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $view_billing_voucher_list->Amount->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_Amount" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_Amount" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->Amount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->Amount->EditValue ?>"<?php echo $view_billing_voucher_list->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Amount" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_billing_voucher_list->Amount->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_Amount" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_Amount" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->Amount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->Amount->EditValue ?>"<?php echo $view_billing_voucher_list->Amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_Amount">
<span<?php echo $view_billing_voucher_list->Amount->viewAttributes() ?>><?php echo $view_billing_voucher_list->Amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->BankName->Visible) { // BankName ?>
		<td data-name="BankName" <?php echo $view_billing_voucher_list->BankName->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_BankName" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_BankName" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->BankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->BankName->EditValue ?>"<?php echo $view_billing_voucher_list->BankName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BankName" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_billing_voucher_list->BankName->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_BankName" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_BankName" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->BankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->BankName->EditValue ?>"<?php echo $view_billing_voucher_list->BankName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_BankName">
<span<?php echo $view_billing_voucher_list->BankName->viewAttributes() ?>><?php echo $view_billing_voucher_list->BankName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->UserName->Visible) { // UserName ?>
		<td data-name="UserName" <?php echo $view_billing_voucher_list->UserName->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_UserName" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_UserName" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_billing_voucher_list->UserName->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_UserName">
<span<?php echo $view_billing_voucher_list->UserName->viewAttributes() ?>><?php echo $view_billing_voucher_list->UserName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->BillType->Visible) { // BillType ?>
		<td data-name="BillType" <?php echo $view_billing_voucher_list->BillType->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_BillType" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_BillType" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->BillType->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->BillType->EditValue ?>"<?php echo $view_billing_voucher_list->BillType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BillType" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_billing_voucher_list->BillType->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_BillType" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_BillType" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->BillType->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->BillType->EditValue ?>"<?php echo $view_billing_voucher_list->BillType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_BillType">
<span<?php echo $view_billing_voucher_list->BillType->viewAttributes() ?>><?php echo $view_billing_voucher_list->BillType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->CancelBill->Visible) { // CancelBill ?>
		<td data-name="CancelBill" <?php echo $view_billing_voucher_list->CancelBill->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_CancelBill" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher" data-field="x_CancelBill" data-value-separator="<?php echo $view_billing_voucher_list->CancelBill->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill"<?php echo $view_billing_voucher_list->CancelBill->editAttributes() ?>>
			<?php echo $view_billing_voucher_list->CancelBill->selectOptionListHtml("x{$view_billing_voucher_list->RowIndex}_CancelBill") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_CancelBill" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill" value="<?php echo HtmlEncode($view_billing_voucher_list->CancelBill->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_CancelBill" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher" data-field="x_CancelBill" data-value-separator="<?php echo $view_billing_voucher_list->CancelBill->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill"<?php echo $view_billing_voucher_list->CancelBill->editAttributes() ?>>
			<?php echo $view_billing_voucher_list->CancelBill->selectOptionListHtml("x{$view_billing_voucher_list->RowIndex}_CancelBill") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_CancelBill">
<span<?php echo $view_billing_voucher_list->CancelBill->viewAttributes() ?>><?php echo $view_billing_voucher_list->CancelBill->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->LabTest->Visible) { // LabTest ?>
		<td data-name="LabTest" <?php echo $view_billing_voucher_list->LabTest->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_LabTest" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_LabTest" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->LabTest->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->LabTest->EditValue ?>"<?php echo $view_billing_voucher_list->LabTest->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_LabTest" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" value="<?php echo HtmlEncode($view_billing_voucher_list->LabTest->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_LabTest" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_LabTest" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->LabTest->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->LabTest->EditValue ?>"<?php echo $view_billing_voucher_list->LabTest->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_LabTest">
<span<?php echo $view_billing_voucher_list->LabTest->viewAttributes() ?>><?php echo $view_billing_voucher_list->LabTest->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->sid->Visible) { // sid ?>
		<td data-name="sid" <?php echo $view_billing_voucher_list->sid->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_sid" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_sid" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_sid" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->sid->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->sid->EditValue ?>"<?php echo $view_billing_voucher_list->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_sid" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_sid" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_billing_voucher_list->sid->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_sid" class="form-group">
<span<?php echo $view_billing_voucher_list->sid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_billing_voucher_list->sid->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_sid" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_sid" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_billing_voucher_list->sid->CurrentValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_sid">
<span<?php echo $view_billing_voucher_list->sid->viewAttributes() ?>><?php echo $view_billing_voucher_list->sid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->SidNo->Visible) { // SidNo ?>
		<td data-name="SidNo" <?php echo $view_billing_voucher_list->SidNo->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_SidNo" class="form-group">
<input type="text" data-table="view_billing_voucher" data-field="x_SidNo" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->SidNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->SidNo->EditValue ?>"<?php echo $view_billing_voucher_list->SidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_SidNo" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" value="<?php echo HtmlEncode($view_billing_voucher_list->SidNo->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_SidNo" class="form-group">
<span<?php echo $view_billing_voucher_list->SidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_billing_voucher_list->SidNo->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_SidNo" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" value="<?php echo HtmlEncode($view_billing_voucher_list->SidNo->CurrentValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_SidNo">
<span<?php echo $view_billing_voucher_list->SidNo->viewAttributes() ?>><?php echo $view_billing_voucher_list->SidNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->createdDatettime->Visible) { // createdDatettime ?>
		<td data-name="createdDatettime" <?php echo $view_billing_voucher_list->createdDatettime->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_createdDatettime" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_createdDatettime" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_createdDatettime" value="<?php echo HtmlEncode($view_billing_voucher_list->createdDatettime->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_createdDatettime">
<span<?php echo $view_billing_voucher_list->createdDatettime->viewAttributes() ?>><?php echo $view_billing_voucher_list->createdDatettime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->GoogleReviewID->Visible) { // GoogleReviewID ?>
		<td data-name="GoogleReviewID" <?php echo $view_billing_voucher_list->GoogleReviewID->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_GoogleReviewID" class="form-group">
<div id="tp_x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_GoogleReviewID" data-value-separator="<?php echo $view_billing_voucher_list->GoogleReviewID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" value="{value}"<?php echo $view_billing_voucher_list->GoogleReviewID->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher_list->GoogleReviewID->checkBoxListHtml(FALSE, "x{$view_billing_voucher_list->RowIndex}_GoogleReviewID[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_GoogleReviewID" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" value="<?php echo HtmlEncode($view_billing_voucher_list->GoogleReviewID->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_GoogleReviewID" class="form-group">
<div id="tp_x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_GoogleReviewID" data-value-separator="<?php echo $view_billing_voucher_list->GoogleReviewID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" value="{value}"<?php echo $view_billing_voucher_list->GoogleReviewID->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher_list->GoogleReviewID->checkBoxListHtml(FALSE, "x{$view_billing_voucher_list->RowIndex}_GoogleReviewID[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCount ?>_view_billing_voucher_GoogleReviewID">
<span<?php echo $view_billing_voucher_list->GoogleReviewID->viewAttributes() ?>><?php echo $view_billing_voucher_list->GoogleReviewID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_billing_voucher_list->ListOptions->render("body", "right", $view_billing_voucher_list->RowCount);
?>
	</tr>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD || $view_billing_voucher->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_billing_voucherlist", "load"], function() {
	fview_billing_voucherlist.updateLists(<?php echo $view_billing_voucher_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_billing_voucher_list->isGridAdd())
		if (!$view_billing_voucher_list->Recordset->EOF)
			$view_billing_voucher_list->Recordset->moveNext();
}
?>
<?php
	if ($view_billing_voucher_list->isGridAdd() || $view_billing_voucher_list->isGridEdit()) {
		$view_billing_voucher_list->RowIndex = '$rowindex$';
		$view_billing_voucher_list->loadRowValues();

		// Set row properties
		$view_billing_voucher->resetAttributes();
		$view_billing_voucher->RowAttrs->merge(["data-rowindex" => $view_billing_voucher_list->RowIndex, "id" => "r0_view_billing_voucher", "data-rowtype" => ROWTYPE_ADD]);
		$view_billing_voucher->RowAttrs->appendClass("ew-template");
		$view_billing_voucher->RowType = ROWTYPE_ADD;

		// Render row
		$view_billing_voucher_list->renderRow();

		// Render list options
		$view_billing_voucher_list->renderListOptions();
		$view_billing_voucher_list->StartRowCount = 0;
?>
	<tr <?php echo $view_billing_voucher->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_billing_voucher_list->ListOptions->render("body", "left", $view_billing_voucher_list->RowIndex);
?>
	<?php if ($view_billing_voucher_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<span id="el$rowindex$_view_billing_voucher_createddatetime" class="form-group view_billing_voucher_createddatetime">
<input type="text" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->createddatetime->EditValue ?>"<?php echo $view_billing_voucher_list->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_voucher_list->createddatetime->ReadOnly && !$view_billing_voucher_list->createddatetime->Disabled && !isset($view_billing_voucher_list->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_voucher_list->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_voucherlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_billing_voucherlist", "x<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_createddatetime" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_billing_voucher_list->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber">
<span id="el$rowindex$_view_billing_voucher_BillNumber" class="form-group view_billing_voucher_BillNumber">
<input type="text" data-table="view_billing_voucher" data-field="x_BillNumber" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->BillNumber->EditValue ?>"<?php echo $view_billing_voucher_list->BillNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BillNumber" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($view_billing_voucher_list->BillNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<span id="el$rowindex$_view_billing_voucher_PatientId" class="form-group view_billing_voucher_PatientId">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientId" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->PatientId->EditValue ?>"<?php echo $view_billing_voucher_list->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PatientId" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_billing_voucher_list->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<span id="el$rowindex$_view_billing_voucher_PatientName" class="form-group view_billing_voucher_PatientName">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientName" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->PatientName->EditValue ?>"<?php echo $view_billing_voucher_list->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PatientName" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_billing_voucher_list->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile">
<span id="el$rowindex$_view_billing_voucher_Mobile" class="form-group view_billing_voucher_Mobile">
<input type="text" data-table="view_billing_voucher" data-field="x_Mobile" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->Mobile->EditValue ?>"<?php echo $view_billing_voucher_list->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Mobile" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_billing_voucher_list->Mobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor">
<span id="el$rowindex$_view_billing_voucher_Doctor" class="form-group view_billing_voucher_Doctor">
<input type="text" data-table="view_billing_voucher" data-field="x_Doctor" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->Doctor->EditValue ?>"<?php echo $view_billing_voucher_list->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Doctor" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($view_billing_voucher_list->Doctor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment">
<span id="el$rowindex$_view_billing_voucher_ModeofPayment" class="form-group view_billing_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_billing_voucher_list->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment"<?php echo $view_billing_voucher_list->ModeofPayment->editAttributes() ?>>
			<?php echo $view_billing_voucher_list->ModeofPayment->selectOptionListHtml("x{$view_billing_voucher_list->RowIndex}_ModeofPayment") ?>
		</select>
</div>
<?php echo $view_billing_voucher_list->ModeofPayment->Lookup->getParamTag($view_billing_voucher_list, "p_x" . $view_billing_voucher_list->RowIndex . "_ModeofPayment") ?>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_ModeofPayment" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_billing_voucher_list->ModeofPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<span id="el$rowindex$_view_billing_voucher_Amount" class="form-group view_billing_voucher_Amount">
<input type="text" data-table="view_billing_voucher" data-field="x_Amount" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->Amount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->Amount->EditValue ?>"<?php echo $view_billing_voucher_list->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Amount" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_billing_voucher_list->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->BankName->Visible) { // BankName ?>
		<td data-name="BankName">
<span id="el$rowindex$_view_billing_voucher_BankName" class="form-group view_billing_voucher_BankName">
<input type="text" data-table="view_billing_voucher" data-field="x_BankName" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->BankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->BankName->EditValue ?>"<?php echo $view_billing_voucher_list->BankName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BankName" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_billing_voucher_list->BankName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->UserName->Visible) { // UserName ?>
		<td data-name="UserName">
<input type="hidden" data-table="view_billing_voucher" data-field="x_UserName" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_UserName" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_billing_voucher_list->UserName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->BillType->Visible) { // BillType ?>
		<td data-name="BillType">
<span id="el$rowindex$_view_billing_voucher_BillType" class="form-group view_billing_voucher_BillType">
<input type="text" data-table="view_billing_voucher" data-field="x_BillType" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->BillType->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->BillType->EditValue ?>"<?php echo $view_billing_voucher_list->BillType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BillType" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_billing_voucher_list->BillType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->CancelBill->Visible) { // CancelBill ?>
		<td data-name="CancelBill">
<span id="el$rowindex$_view_billing_voucher_CancelBill" class="form-group view_billing_voucher_CancelBill">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher" data-field="x_CancelBill" data-value-separator="<?php echo $view_billing_voucher_list->CancelBill->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill"<?php echo $view_billing_voucher_list->CancelBill->editAttributes() ?>>
			<?php echo $view_billing_voucher_list->CancelBill->selectOptionListHtml("x{$view_billing_voucher_list->RowIndex}_CancelBill") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_CancelBill" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill" value="<?php echo HtmlEncode($view_billing_voucher_list->CancelBill->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->LabTest->Visible) { // LabTest ?>
		<td data-name="LabTest">
<span id="el$rowindex$_view_billing_voucher_LabTest" class="form-group view_billing_voucher_LabTest">
<input type="text" data-table="view_billing_voucher" data-field="x_LabTest" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->LabTest->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->LabTest->EditValue ?>"<?php echo $view_billing_voucher_list->LabTest->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_LabTest" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" value="<?php echo HtmlEncode($view_billing_voucher_list->LabTest->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->sid->Visible) { // sid ?>
		<td data-name="sid">
<span id="el$rowindex$_view_billing_voucher_sid" class="form-group view_billing_voucher_sid">
<input type="text" data-table="view_billing_voucher" data-field="x_sid" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_sid" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->sid->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->sid->EditValue ?>"<?php echo $view_billing_voucher_list->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_sid" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_sid" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_billing_voucher_list->sid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->SidNo->Visible) { // SidNo ?>
		<td data-name="SidNo">
<span id="el$rowindex$_view_billing_voucher_SidNo" class="form-group view_billing_voucher_SidNo">
<input type="text" data-table="view_billing_voucher" data-field="x_SidNo" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_list->SidNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_list->SidNo->EditValue ?>"<?php echo $view_billing_voucher_list->SidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_SidNo" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" value="<?php echo HtmlEncode($view_billing_voucher_list->SidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->createdDatettime->Visible) { // createdDatettime ?>
		<td data-name="createdDatettime">
<input type="hidden" data-table="view_billing_voucher" data-field="x_createdDatettime" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_createdDatettime" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_createdDatettime" value="<?php echo HtmlEncode($view_billing_voucher_list->createdDatettime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_list->GoogleReviewID->Visible) { // GoogleReviewID ?>
		<td data-name="GoogleReviewID">
<span id="el$rowindex$_view_billing_voucher_GoogleReviewID" class="form-group view_billing_voucher_GoogleReviewID">
<div id="tp_x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_GoogleReviewID" data-value-separator="<?php echo $view_billing_voucher_list->GoogleReviewID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" value="{value}"<?php echo $view_billing_voucher_list->GoogleReviewID->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher_list->GoogleReviewID->checkBoxListHtml(FALSE, "x{$view_billing_voucher_list->RowIndex}_GoogleReviewID[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_GoogleReviewID" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" value="<?php echo HtmlEncode($view_billing_voucher_list->GoogleReviewID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_billing_voucher_list->ListOptions->render("body", "right", $view_billing_voucher_list->RowIndex);
?>
<script>
loadjs.ready(["fview_billing_voucherlist", "load"], function() {
	fview_billing_voucherlist.updateLists(<?php echo $view_billing_voucher_list->RowIndex ?>);
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
<?php if ($view_billing_voucher_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $view_billing_voucher_list->FormKeyCountName ?>" id="<?php echo $view_billing_voucher_list->FormKeyCountName ?>" value="<?php echo $view_billing_voucher_list->KeyCount ?>">
<?php echo $view_billing_voucher_list->MultiSelectKey ?>
<?php } ?>
<?php if ($view_billing_voucher_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_billing_voucher_list->FormKeyCountName ?>" id="<?php echo $view_billing_voucher_list->FormKeyCountName ?>" value="<?php echo $view_billing_voucher_list->KeyCount ?>">
<?php echo $view_billing_voucher_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_billing_voucher->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_billing_voucher_list->Recordset)
	$view_billing_voucher_list->Recordset->Close();
?>
<?php if (!$view_billing_voucher_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_billing_voucher_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_billing_voucher_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_billing_voucher_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_billing_voucher_list->TotalRecords == 0 && !$view_billing_voucher->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_billing_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_billing_voucher_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_billing_voucher_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	$("[data-caption='Edit']").hide();
});
</script>
<?php if (!$view_billing_voucher->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_billing_voucher",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_billing_voucher_list->terminate();
?>