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
$view_pharmacy_consumption_list = new view_pharmacy_consumption_list();

// Run the page
$view_pharmacy_consumption_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_consumption_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_pharmacy_consumption_list->isExport()) { ?>
<script>
var fview_pharmacy_consumptionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_pharmacy_consumptionlist = currentForm = new ew.Form("fview_pharmacy_consumptionlist", "list");
	fview_pharmacy_consumptionlist.formKeyCountName = '<?php echo $view_pharmacy_consumption_list->FormKeyCountName ?>';

	// Validate form
	fview_pharmacy_consumptionlist.validate = function() {
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
			<?php if ($view_pharmacy_consumption_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_consumption_list->id->caption(), $view_pharmacy_consumption_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_consumption_list->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_consumption_list->PRC->caption(), $view_pharmacy_consumption_list->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_consumption_list->DES->Required) { ?>
				elm = this.getElements("x" + infix + "_DES");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_consumption_list->DES->caption(), $view_pharmacy_consumption_list->DES->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_consumption_list->BATCH->Required) { ?>
				elm = this.getElements("x" + infix + "_BATCH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_consumption_list->BATCH->caption(), $view_pharmacy_consumption_list->BATCH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_consumption_list->Stock->Required) { ?>
				elm = this.getElements("x" + infix + "_Stock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_consumption_list->Stock->caption(), $view_pharmacy_consumption_list->Stock->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_consumption_list->EXPDT->Required) { ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_consumption_list->EXPDT->caption(), $view_pharmacy_consumption_list->EXPDT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_consumption_list->BILLDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_BILLDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_consumption_list->BILLDATE->caption(), $view_pharmacy_consumption_list->BILLDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_consumption_list->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_consumption_list->MFRCODE->caption(), $view_pharmacy_consumption_list->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_consumption_list->Select->Required) { ?>
				elm = this.getElements("x" + infix + "_Select[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_consumption_list->Select->caption(), $view_pharmacy_consumption_list->Select->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_consumption_list->ConsQTY->Required) { ?>
				elm = this.getElements("x" + infix + "_ConsQTY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_consumption_list->ConsQTY->caption(), $view_pharmacy_consumption_list->ConsQTY->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fview_pharmacy_consumptionlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacy_consumptionlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_pharmacy_consumptionlist.lists["x_Select[]"] = <?php echo $view_pharmacy_consumption_list->Select->Lookup->toClientList($view_pharmacy_consumption_list) ?>;
	fview_pharmacy_consumptionlist.lists["x_Select[]"].options = <?php echo JsonEncode($view_pharmacy_consumption_list->Select->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_pharmacy_consumptionlist");
});
var fview_pharmacy_consumptionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_pharmacy_consumptionlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_consumptionlistsrch");

	// Validate function for search
	fview_pharmacy_consumptionlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_Stock");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_consumption_list->Stock->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_EXPDT");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_consumption_list->EXPDT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_BILLDATE");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_consumption_list->BILLDATE->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_pharmacy_consumptionlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacy_consumptionlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_pharmacy_consumptionlistsrch.filterList = <?php echo $view_pharmacy_consumption_list->getFilterList() ?>;
	loadjs.done("fview_pharmacy_consumptionlistsrch");
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
<?php if (!$view_pharmacy_consumption_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_consumption_list->TotalRecords > 0 && $view_pharmacy_consumption_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_consumption_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_consumption_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_consumption_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_consumption_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_consumption_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_consumption_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_consumption_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_consumption_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_consumption_list->isExport() && !$view_pharmacy_consumption->CurrentAction) { ?>
<form name="fview_pharmacy_consumptionlistsrch" id="fview_pharmacy_consumptionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_pharmacy_consumptionlistsrch-search-panel" class="<?php echo $view_pharmacy_consumption_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_consumption">
	<div class="ew-extended-search">
<?php

// Render search row
$view_pharmacy_consumption->RowType = ROWTYPE_SEARCH;
$view_pharmacy_consumption->resetAttributes();
$view_pharmacy_consumption_list->renderRow();
?>
<?php if ($view_pharmacy_consumption_list->DES->Visible) { // DES ?>
	<?php
		$view_pharmacy_consumption_list->SearchColumnCount++;
		if (($view_pharmacy_consumption_list->SearchColumnCount - 1) % $view_pharmacy_consumption_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_consumption_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_consumption_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_DES" class="ew-cell form-group">
		<label for="x_DES" class="ew-search-caption ew-label"><?php echo $view_pharmacy_consumption_list->DES->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DES" id="z_DES" value="LIKE">
</span>
		<span id="el_view_pharmacy_consumption_DES" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->DES->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->DES->EditValue ?>"<?php echo $view_pharmacy_consumption_list->DES->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_pharmacy_consumption_list->SearchColumnCount % $view_pharmacy_consumption_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_consumption_list->Stock->Visible) { // Stock ?>
	<?php
		$view_pharmacy_consumption_list->SearchColumnCount++;
		if (($view_pharmacy_consumption_list->SearchColumnCount - 1) % $view_pharmacy_consumption_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_consumption_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_consumption_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Stock" class="ew-cell form-group">
		<label for="x_Stock" class="ew-search-caption ew-label"><?php echo $view_pharmacy_consumption_list->Stock->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_Stock" id="z_Stock" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_pharmacy_consumption_list->Stock->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_pharmacy_consumption_list->Stock->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_pharmacy_consumption_list->Stock->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_pharmacy_consumption_list->Stock->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_pharmacy_consumption_list->Stock->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_pharmacy_consumption_list->Stock->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_pharmacy_consumption_list->Stock->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_pharmacy_consumption_list->Stock->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_pharmacy_consumption_list->Stock->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_pharmacy_consumption_Stock" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->Stock->EditValue ?>"<?php echo $view_pharmacy_consumption_list->Stock->editAttributes() ?>>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_pharmacy_consumption_Stock" class="ew-search-field2 d-none">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_Stock" name="y_Stock" id="y_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->Stock->EditValue2 ?>"<?php echo $view_pharmacy_consumption_list->Stock->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_pharmacy_consumption_list->SearchColumnCount % $view_pharmacy_consumption_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_consumption_list->EXPDT->Visible) { // EXPDT ?>
	<?php
		$view_pharmacy_consumption_list->SearchColumnCount++;
		if (($view_pharmacy_consumption_list->SearchColumnCount - 1) % $view_pharmacy_consumption_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_consumption_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_consumption_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_EXPDT" class="ew-cell form-group">
		<label for="x_EXPDT" class="ew-search-caption ew-label"><?php echo $view_pharmacy_consumption_list->EXPDT->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_EXPDT" id="z_EXPDT" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_pharmacy_consumption_list->EXPDT->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_pharmacy_consumption_list->EXPDT->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_pharmacy_consumption_list->EXPDT->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_pharmacy_consumption_list->EXPDT->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_pharmacy_consumption_list->EXPDT->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_pharmacy_consumption_list->EXPDT->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_pharmacy_consumption_list->EXPDT->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_pharmacy_consumption_list->EXPDT->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_pharmacy_consumption_list->EXPDT->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_pharmacy_consumption_EXPDT" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->EXPDT->EditValue ?>"<?php echo $view_pharmacy_consumption_list->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_consumption_list->EXPDT->ReadOnly && !$view_pharmacy_consumption_list->EXPDT->Disabled && !isset($view_pharmacy_consumption_list->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_consumption_list->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_consumptionlistsrch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_pharmacy_consumption_EXPDT" class="ew-search-field2 d-none">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_EXPDT" name="y_EXPDT" id="y_EXPDT" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->EXPDT->EditValue2 ?>"<?php echo $view_pharmacy_consumption_list->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_consumption_list->EXPDT->ReadOnly && !$view_pharmacy_consumption_list->EXPDT->Disabled && !isset($view_pharmacy_consumption_list->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_consumption_list->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_consumptionlistsrch", "y_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_pharmacy_consumption_list->SearchColumnCount % $view_pharmacy_consumption_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_consumption_list->BILLDATE->Visible) { // BILLDATE ?>
	<?php
		$view_pharmacy_consumption_list->SearchColumnCount++;
		if (($view_pharmacy_consumption_list->SearchColumnCount - 1) % $view_pharmacy_consumption_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_consumption_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_consumption_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_BILLDATE" class="ew-cell form-group">
		<label for="x_BILLDATE" class="ew-search-caption ew-label"><?php echo $view_pharmacy_consumption_list->BILLDATE->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_BILLDATE" id="z_BILLDATE" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_pharmacy_consumption_list->BILLDATE->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_pharmacy_consumption_list->BILLDATE->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_pharmacy_consumption_list->BILLDATE->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_pharmacy_consumption_list->BILLDATE->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_pharmacy_consumption_list->BILLDATE->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_pharmacy_consumption_list->BILLDATE->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_pharmacy_consumption_list->BILLDATE->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_pharmacy_consumption_list->BILLDATE->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_pharmacy_consumption_list->BILLDATE->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_pharmacy_consumption_BILLDATE" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_BILLDATE" name="x_BILLDATE" id="x_BILLDATE" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->BILLDATE->EditValue ?>"<?php echo $view_pharmacy_consumption_list->BILLDATE->editAttributes() ?>>
<?php if (!$view_pharmacy_consumption_list->BILLDATE->ReadOnly && !$view_pharmacy_consumption_list->BILLDATE->Disabled && !isset($view_pharmacy_consumption_list->BILLDATE->EditAttrs["readonly"]) && !isset($view_pharmacy_consumption_list->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_consumptionlistsrch", "x_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_pharmacy_consumption_BILLDATE" class="ew-search-field2 d-none">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_BILLDATE" name="y_BILLDATE" id="y_BILLDATE" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->BILLDATE->EditValue2 ?>"<?php echo $view_pharmacy_consumption_list->BILLDATE->editAttributes() ?>>
<?php if (!$view_pharmacy_consumption_list->BILLDATE->ReadOnly && !$view_pharmacy_consumption_list->BILLDATE->Disabled && !isset($view_pharmacy_consumption_list->BILLDATE->EditAttrs["readonly"]) && !isset($view_pharmacy_consumption_list->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_consumptionlistsrch", "y_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_pharmacy_consumption_list->SearchColumnCount % $view_pharmacy_consumption_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_pharmacy_consumption_list->SearchColumnCount % $view_pharmacy_consumption_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_pharmacy_consumption_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_consumption_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_consumption_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_consumption_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_consumption_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_consumption_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_consumption_list->showPageHeader(); ?>
<?php
$view_pharmacy_consumption_list->showMessage();
?>
<?php if ($view_pharmacy_consumption_list->TotalRecords > 0 || $view_pharmacy_consumption->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_consumption_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_consumption">
<?php if (!$view_pharmacy_consumption_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_consumption_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacy_consumption_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_consumption_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_consumptionlist" id="fview_pharmacy_consumptionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_consumption">
<div id="gmp_view_pharmacy_consumption" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_consumption_list->TotalRecords > 0 || $view_pharmacy_consumption_list->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_consumptionlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_consumption->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_consumption_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_consumption_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_consumption_list->id->Visible) { // id ?>
	<?php if ($view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_consumption_list->id->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_id" class="view_pharmacy_consumption_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_consumption_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->id) ?>', 1);"><div id="elh_view_pharmacy_consumption_id" class="view_pharmacy_consumption_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_consumption_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_consumption_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_consumption_list->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_consumption_list->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_PRC" class="view_pharmacy_consumption_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_consumption_list->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->PRC) ?>', 1);"><div id="elh_view_pharmacy_consumption_PRC" class="view_pharmacy_consumption_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_consumption_list->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_consumption_list->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_consumption_list->DES->Visible) { // DES ?>
	<?php if ($view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->DES) == "") { ?>
		<th data-name="DES" class="<?php echo $view_pharmacy_consumption_list->DES->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_DES" class="view_pharmacy_consumption_DES"><div class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->DES->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DES" class="<?php echo $view_pharmacy_consumption_list->DES->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->DES) ?>', 1);"><div id="elh_view_pharmacy_consumption_DES" class="view_pharmacy_consumption_DES">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->DES->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_consumption_list->DES->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_consumption_list->DES->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_consumption_list->BATCH->Visible) { // BATCH ?>
	<?php if ($view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->BATCH) == "") { ?>
		<th data-name="BATCH" class="<?php echo $view_pharmacy_consumption_list->BATCH->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_BATCH" class="view_pharmacy_consumption_BATCH"><div class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->BATCH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCH" class="<?php echo $view_pharmacy_consumption_list->BATCH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->BATCH) ?>', 1);"><div id="elh_view_pharmacy_consumption_BATCH" class="view_pharmacy_consumption_BATCH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->BATCH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_consumption_list->BATCH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_consumption_list->BATCH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_consumption_list->Stock->Visible) { // Stock ?>
	<?php if ($view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->Stock) == "") { ?>
		<th data-name="Stock" class="<?php echo $view_pharmacy_consumption_list->Stock->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_Stock" class="view_pharmacy_consumption_Stock"><div class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->Stock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stock" class="<?php echo $view_pharmacy_consumption_list->Stock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->Stock) ?>', 1);"><div id="elh_view_pharmacy_consumption_Stock" class="view_pharmacy_consumption_Stock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->Stock->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_consumption_list->Stock->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_consumption_list->Stock->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_consumption_list->EXPDT->Visible) { // EXPDT ?>
	<?php if ($view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_consumption_list->EXPDT->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_EXPDT" class="view_pharmacy_consumption_EXPDT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_consumption_list->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->EXPDT) ?>', 1);"><div id="elh_view_pharmacy_consumption_EXPDT" class="view_pharmacy_consumption_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_consumption_list->EXPDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_consumption_list->EXPDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_consumption_list->BILLDATE->Visible) { // BILLDATE ?>
	<?php if ($view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->BILLDATE) == "") { ?>
		<th data-name="BILLDATE" class="<?php echo $view_pharmacy_consumption_list->BILLDATE->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_BILLDATE" class="view_pharmacy_consumption_BILLDATE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->BILLDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDATE" class="<?php echo $view_pharmacy_consumption_list->BILLDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->BILLDATE) ?>', 1);"><div id="elh_view_pharmacy_consumption_BILLDATE" class="view_pharmacy_consumption_BILLDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->BILLDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_consumption_list->BILLDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_consumption_list->BILLDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_consumption_list->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_consumption_list->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_MFRCODE" class="view_pharmacy_consumption_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_consumption_list->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->MFRCODE) ?>', 1);"><div id="elh_view_pharmacy_consumption_MFRCODE" class="view_pharmacy_consumption_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_consumption_list->MFRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_consumption_list->MFRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_consumption_list->Select->Visible) { // Select ?>
	<?php if ($view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->Select) == "") { ?>
		<th data-name="Select" class="<?php echo $view_pharmacy_consumption_list->Select->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_Select" class="view_pharmacy_consumption_Select"><div class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->Select->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Select" class="<?php echo $view_pharmacy_consumption_list->Select->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->Select) ?>', 1);"><div id="elh_view_pharmacy_consumption_Select" class="view_pharmacy_consumption_Select">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->Select->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_consumption_list->Select->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_consumption_list->Select->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_consumption_list->ConsQTY->Visible) { // ConsQTY ?>
	<?php if ($view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->ConsQTY) == "") { ?>
		<th data-name="ConsQTY" class="<?php echo $view_pharmacy_consumption_list->ConsQTY->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_ConsQTY" class="view_pharmacy_consumption_ConsQTY"><div class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->ConsQTY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ConsQTY" class="<?php echo $view_pharmacy_consumption_list->ConsQTY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_consumption_list->SortUrl($view_pharmacy_consumption_list->ConsQTY) ?>', 1);"><div id="elh_view_pharmacy_consumption_ConsQTY" class="view_pharmacy_consumption_ConsQTY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_consumption_list->ConsQTY->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_consumption_list->ConsQTY->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_consumption_list->ConsQTY->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_consumption_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_consumption_list->ExportAll && $view_pharmacy_consumption_list->isExport()) {
	$view_pharmacy_consumption_list->StopRecord = $view_pharmacy_consumption_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_pharmacy_consumption_list->TotalRecords > $view_pharmacy_consumption_list->StartRecord + $view_pharmacy_consumption_list->DisplayRecords - 1)
		$view_pharmacy_consumption_list->StopRecord = $view_pharmacy_consumption_list->StartRecord + $view_pharmacy_consumption_list->DisplayRecords - 1;
	else
		$view_pharmacy_consumption_list->StopRecord = $view_pharmacy_consumption_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($view_pharmacy_consumption->isConfirm() || $view_pharmacy_consumption_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_pharmacy_consumption_list->FormKeyCountName) && ($view_pharmacy_consumption_list->isGridAdd() || $view_pharmacy_consumption_list->isGridEdit() || $view_pharmacy_consumption->isConfirm())) {
		$view_pharmacy_consumption_list->KeyCount = $CurrentForm->getValue($view_pharmacy_consumption_list->FormKeyCountName);
		$view_pharmacy_consumption_list->StopRecord = $view_pharmacy_consumption_list->StartRecord + $view_pharmacy_consumption_list->KeyCount - 1;
	}
}
$view_pharmacy_consumption_list->RecordCount = $view_pharmacy_consumption_list->StartRecord - 1;
if ($view_pharmacy_consumption_list->Recordset && !$view_pharmacy_consumption_list->Recordset->EOF) {
	$view_pharmacy_consumption_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_consumption_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_consumption_list->StartRecord > 1)
		$view_pharmacy_consumption_list->Recordset->move($view_pharmacy_consumption_list->StartRecord - 1);
} elseif (!$view_pharmacy_consumption->AllowAddDeleteRow && $view_pharmacy_consumption_list->StopRecord == 0) {
	$view_pharmacy_consumption_list->StopRecord = $view_pharmacy_consumption->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_consumption->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_consumption->resetAttributes();
$view_pharmacy_consumption_list->renderRow();
if ($view_pharmacy_consumption_list->isGridEdit())
	$view_pharmacy_consumption_list->RowIndex = 0;
while ($view_pharmacy_consumption_list->RecordCount < $view_pharmacy_consumption_list->StopRecord) {
	$view_pharmacy_consumption_list->RecordCount++;
	if ($view_pharmacy_consumption_list->RecordCount >= $view_pharmacy_consumption_list->StartRecord) {
		$view_pharmacy_consumption_list->RowCount++;
		if ($view_pharmacy_consumption_list->isGridAdd() || $view_pharmacy_consumption_list->isGridEdit() || $view_pharmacy_consumption->isConfirm()) {
			$view_pharmacy_consumption_list->RowIndex++;
			$CurrentForm->Index = $view_pharmacy_consumption_list->RowIndex;
			if ($CurrentForm->hasValue($view_pharmacy_consumption_list->FormActionName) && ($view_pharmacy_consumption->isConfirm() || $view_pharmacy_consumption_list->EventCancelled))
				$view_pharmacy_consumption_list->RowAction = strval($CurrentForm->getValue($view_pharmacy_consumption_list->FormActionName));
			elseif ($view_pharmacy_consumption_list->isGridAdd())
				$view_pharmacy_consumption_list->RowAction = "insert";
			else
				$view_pharmacy_consumption_list->RowAction = "";
		}

		// Set up key count
		$view_pharmacy_consumption_list->KeyCount = $view_pharmacy_consumption_list->RowIndex;

		// Init row class and style
		$view_pharmacy_consumption->resetAttributes();
		$view_pharmacy_consumption->CssClass = "";
		if ($view_pharmacy_consumption_list->isGridAdd()) {
			$view_pharmacy_consumption_list->loadRowValues(); // Load default values
		} else {
			$view_pharmacy_consumption_list->loadRowValues($view_pharmacy_consumption_list->Recordset); // Load row values
		}
		$view_pharmacy_consumption->RowType = ROWTYPE_VIEW; // Render view
		if ($view_pharmacy_consumption_list->isGridEdit()) { // Grid edit
			if ($view_pharmacy_consumption->EventCancelled)
				$view_pharmacy_consumption_list->restoreCurrentRowFormValues($view_pharmacy_consumption_list->RowIndex); // Restore form values
			if ($view_pharmacy_consumption_list->RowAction == "insert")
				$view_pharmacy_consumption->RowType = ROWTYPE_ADD; // Render add
			else
				$view_pharmacy_consumption->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_pharmacy_consumption_list->isGridEdit() && ($view_pharmacy_consumption->RowType == ROWTYPE_EDIT || $view_pharmacy_consumption->RowType == ROWTYPE_ADD) && $view_pharmacy_consumption->EventCancelled) // Update failed
			$view_pharmacy_consumption_list->restoreCurrentRowFormValues($view_pharmacy_consumption_list->RowIndex); // Restore form values
		if ($view_pharmacy_consumption->RowType == ROWTYPE_EDIT) // Edit row
			$view_pharmacy_consumption_list->EditRowCount++;

		// Set up row id / data-rowindex
		$view_pharmacy_consumption->RowAttrs->merge(["data-rowindex" => $view_pharmacy_consumption_list->RowCount, "id" => "r" . $view_pharmacy_consumption_list->RowCount . "_view_pharmacy_consumption", "data-rowtype" => $view_pharmacy_consumption->RowType]);

		// Render row
		$view_pharmacy_consumption_list->renderRow();

		// Render list options
		$view_pharmacy_consumption_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_pharmacy_consumption_list->RowAction != "delete" && $view_pharmacy_consumption_list->RowAction != "insertdelete" && !($view_pharmacy_consumption_list->RowAction == "insert" && $view_pharmacy_consumption->isConfirm() && $view_pharmacy_consumption_list->emptyRow())) {
?>
	<tr <?php echo $view_pharmacy_consumption->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_consumption_list->ListOptions->render("body", "left", $view_pharmacy_consumption_list->RowCount);
?>
	<?php if ($view_pharmacy_consumption_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_pharmacy_consumption_list->id->cellAttributes() ?>>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_id" class="form-group"></span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_id" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_id" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->id->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_id" class="form-group">
<span<?php echo $view_pharmacy_consumption_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_consumption_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_id" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_id" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_id">
<span<?php echo $view_pharmacy_consumption_list->id->viewAttributes() ?>><?php echo $view_pharmacy_consumption_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_consumption_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $view_pharmacy_consumption_list->PRC->cellAttributes() ?>>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_PRC" class="form-group">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_PRC" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->PRC->EditValue ?>"<?php echo $view_pharmacy_consumption_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_PRC" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->PRC->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_PRC" class="form-group">
<span<?php echo $view_pharmacy_consumption_list->PRC->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_consumption_list->PRC->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_PRC" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->PRC->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_PRC">
<span<?php echo $view_pharmacy_consumption_list->PRC->viewAttributes() ?>><?php echo $view_pharmacy_consumption_list->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_consumption_list->DES->Visible) { // DES ?>
		<td data-name="DES" <?php echo $view_pharmacy_consumption_list->DES->cellAttributes() ?>>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_DES" class="form-group">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_DES" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_DES" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->DES->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->DES->EditValue ?>"<?php echo $view_pharmacy_consumption_list->DES->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_DES" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_DES" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_DES" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->DES->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_DES" class="form-group">
<span<?php echo $view_pharmacy_consumption_list->DES->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_consumption_list->DES->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_DES" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_DES" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_DES" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->DES->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_DES">
<span<?php echo $view_pharmacy_consumption_list->DES->viewAttributes() ?>><?php echo $view_pharmacy_consumption_list->DES->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_consumption_list->BATCH->Visible) { // BATCH ?>
		<td data-name="BATCH" <?php echo $view_pharmacy_consumption_list->BATCH->cellAttributes() ?>>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_BATCH" class="form-group">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_BATCH" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BATCH" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BATCH" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->BATCH->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->BATCH->EditValue ?>"<?php echo $view_pharmacy_consumption_list->BATCH->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_BATCH" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BATCH" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BATCH" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->BATCH->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_BATCH" class="form-group">
<span<?php echo $view_pharmacy_consumption_list->BATCH->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_consumption_list->BATCH->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_BATCH" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BATCH" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BATCH" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->BATCH->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_BATCH">
<span<?php echo $view_pharmacy_consumption_list->BATCH->viewAttributes() ?>><?php echo $view_pharmacy_consumption_list->BATCH->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_consumption_list->Stock->Visible) { // Stock ?>
		<td data-name="Stock" <?php echo $view_pharmacy_consumption_list->Stock->cellAttributes() ?>>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_Stock" class="form-group">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_Stock" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Stock" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->Stock->EditValue ?>"<?php echo $view_pharmacy_consumption_list->Stock->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_Stock" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Stock" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Stock" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->Stock->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_Stock" class="form-group">
<span<?php echo $view_pharmacy_consumption_list->Stock->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_consumption_list->Stock->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_Stock" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Stock" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Stock" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->Stock->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_Stock">
<span<?php echo $view_pharmacy_consumption_list->Stock->viewAttributes() ?>><?php echo $view_pharmacy_consumption_list->Stock->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_consumption_list->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT" <?php echo $view_pharmacy_consumption_list->EXPDT->cellAttributes() ?>>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_EXPDT" class="form-group">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_EXPDT" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->EXPDT->EditValue ?>"<?php echo $view_pharmacy_consumption_list->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_consumption_list->EXPDT->ReadOnly && !$view_pharmacy_consumption_list->EXPDT->Disabled && !isset($view_pharmacy_consumption_list->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_consumption_list->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_consumptionlist", "x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_EXPDT" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_EXPDT" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_EXPDT" class="form-group">
<span<?php echo $view_pharmacy_consumption_list->EXPDT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_consumption_list->EXPDT->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->EXPDT->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_EXPDT">
<span<?php echo $view_pharmacy_consumption_list->EXPDT->viewAttributes() ?>><?php echo $view_pharmacy_consumption_list->EXPDT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_consumption_list->BILLDATE->Visible) { // BILLDATE ?>
		<td data-name="BILLDATE" <?php echo $view_pharmacy_consumption_list->BILLDATE->cellAttributes() ?>>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_BILLDATE" class="form-group">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_BILLDATE" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BILLDATE" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BILLDATE" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->BILLDATE->EditValue ?>"<?php echo $view_pharmacy_consumption_list->BILLDATE->editAttributes() ?>>
<?php if (!$view_pharmacy_consumption_list->BILLDATE->ReadOnly && !$view_pharmacy_consumption_list->BILLDATE->Disabled && !isset($view_pharmacy_consumption_list->BILLDATE->EditAttrs["readonly"]) && !isset($view_pharmacy_consumption_list->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_consumptionlist", "x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_BILLDATE" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BILLDATE" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BILLDATE" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->BILLDATE->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_BILLDATE" class="form-group">
<span<?php echo $view_pharmacy_consumption_list->BILLDATE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_consumption_list->BILLDATE->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_BILLDATE" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BILLDATE" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BILLDATE" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->BILLDATE->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_BILLDATE">
<span<?php echo $view_pharmacy_consumption_list->BILLDATE->viewAttributes() ?>><?php echo $view_pharmacy_consumption_list->BILLDATE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_consumption_list->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" <?php echo $view_pharmacy_consumption_list->MFRCODE->cellAttributes() ?>>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_MFRCODE" class="form-group">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_MFRCODE" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->MFRCODE->EditValue ?>"<?php echo $view_pharmacy_consumption_list->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_MFRCODE" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_MFRCODE" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->MFRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_MFRCODE" class="form-group">
<span<?php echo $view_pharmacy_consumption_list->MFRCODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_consumption_list->MFRCODE->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_MFRCODE" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->MFRCODE->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_MFRCODE">
<span<?php echo $view_pharmacy_consumption_list->MFRCODE->viewAttributes() ?>><?php echo $view_pharmacy_consumption_list->MFRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_consumption_list->Select->Visible) { // Select ?>
		<td data-name="Select" <?php echo $view_pharmacy_consumption_list->Select->cellAttributes() ?>>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_Select" class="form-group">
<div id="tp_x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Select" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_pharmacy_consumption" data-field="x_Select" data-value-separator="<?php echo $view_pharmacy_consumption_list->Select->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Select[]" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Select[]" value="{value}"<?php echo $view_pharmacy_consumption_list->Select->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Select" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_pharmacy_consumption_list->Select->checkBoxListHtml(FALSE, "x{$view_pharmacy_consumption_list->RowIndex}_Select[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_Select" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Select[]" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Select[]" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->Select->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_Select" class="form-group">
<div id="tp_x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Select" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_pharmacy_consumption" data-field="x_Select" data-value-separator="<?php echo $view_pharmacy_consumption_list->Select->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Select[]" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Select[]" value="{value}"<?php echo $view_pharmacy_consumption_list->Select->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Select" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_pharmacy_consumption_list->Select->checkBoxListHtml(FALSE, "x{$view_pharmacy_consumption_list->RowIndex}_Select[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_Select">
<span<?php echo $view_pharmacy_consumption_list->Select->viewAttributes() ?>><?php echo $view_pharmacy_consumption_list->Select->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_consumption_list->ConsQTY->Visible) { // ConsQTY ?>
		<td data-name="ConsQTY" <?php echo $view_pharmacy_consumption_list->ConsQTY->cellAttributes() ?>>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_ConsQTY" class="form-group">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_ConsQTY" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_ConsQTY" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_ConsQTY" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->ConsQTY->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->ConsQTY->EditValue ?>"<?php echo $view_pharmacy_consumption_list->ConsQTY->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_ConsQTY" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_ConsQTY" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_ConsQTY" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->ConsQTY->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_ConsQTY" class="form-group">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_ConsQTY" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_ConsQTY" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_ConsQTY" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->ConsQTY->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->ConsQTY->EditValue ?>"<?php echo $view_pharmacy_consumption_list->ConsQTY->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_consumption_list->RowCount ?>_view_pharmacy_consumption_ConsQTY">
<span<?php echo $view_pharmacy_consumption_list->ConsQTY->viewAttributes() ?>><?php echo $view_pharmacy_consumption_list->ConsQTY->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_consumption_list->ListOptions->render("body", "right", $view_pharmacy_consumption_list->RowCount);
?>
	</tr>
<?php if ($view_pharmacy_consumption->RowType == ROWTYPE_ADD || $view_pharmacy_consumption->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlist", "load"], function() {
	fview_pharmacy_consumptionlist.updateLists(<?php echo $view_pharmacy_consumption_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_pharmacy_consumption_list->isGridAdd())
		if (!$view_pharmacy_consumption_list->Recordset->EOF)
			$view_pharmacy_consumption_list->Recordset->moveNext();
}
?>
<?php
	if ($view_pharmacy_consumption_list->isGridAdd() || $view_pharmacy_consumption_list->isGridEdit()) {
		$view_pharmacy_consumption_list->RowIndex = '$rowindex$';
		$view_pharmacy_consumption_list->loadRowValues();

		// Set row properties
		$view_pharmacy_consumption->resetAttributes();
		$view_pharmacy_consumption->RowAttrs->merge(["data-rowindex" => $view_pharmacy_consumption_list->RowIndex, "id" => "r0_view_pharmacy_consumption", "data-rowtype" => ROWTYPE_ADD]);
		$view_pharmacy_consumption->RowAttrs->appendClass("ew-template");
		$view_pharmacy_consumption->RowType = ROWTYPE_ADD;

		// Render row
		$view_pharmacy_consumption_list->renderRow();

		// Render list options
		$view_pharmacy_consumption_list->renderListOptions();
		$view_pharmacy_consumption_list->StartRowCount = 0;
?>
	<tr <?php echo $view_pharmacy_consumption->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_consumption_list->ListOptions->render("body", "left", $view_pharmacy_consumption_list->RowIndex);
?>
	<?php if ($view_pharmacy_consumption_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_view_pharmacy_consumption_id" class="form-group view_pharmacy_consumption_id"></span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_id" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_id" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_consumption_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<span id="el$rowindex$_view_pharmacy_consumption_PRC" class="form-group view_pharmacy_consumption_PRC">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_PRC" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->PRC->EditValue ?>"<?php echo $view_pharmacy_consumption_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_PRC" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_consumption_list->DES->Visible) { // DES ?>
		<td data-name="DES">
<span id="el$rowindex$_view_pharmacy_consumption_DES" class="form-group view_pharmacy_consumption_DES">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_DES" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_DES" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->DES->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->DES->EditValue ?>"<?php echo $view_pharmacy_consumption_list->DES->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_DES" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_DES" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_DES" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->DES->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_consumption_list->BATCH->Visible) { // BATCH ?>
		<td data-name="BATCH">
<span id="el$rowindex$_view_pharmacy_consumption_BATCH" class="form-group view_pharmacy_consumption_BATCH">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_BATCH" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BATCH" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BATCH" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->BATCH->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->BATCH->EditValue ?>"<?php echo $view_pharmacy_consumption_list->BATCH->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_BATCH" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BATCH" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BATCH" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->BATCH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_consumption_list->Stock->Visible) { // Stock ?>
		<td data-name="Stock">
<span id="el$rowindex$_view_pharmacy_consumption_Stock" class="form-group view_pharmacy_consumption_Stock">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_Stock" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Stock" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->Stock->EditValue ?>"<?php echo $view_pharmacy_consumption_list->Stock->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_Stock" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Stock" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Stock" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->Stock->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_consumption_list->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT">
<span id="el$rowindex$_view_pharmacy_consumption_EXPDT" class="form-group view_pharmacy_consumption_EXPDT">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_EXPDT" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->EXPDT->EditValue ?>"<?php echo $view_pharmacy_consumption_list->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_consumption_list->EXPDT->ReadOnly && !$view_pharmacy_consumption_list->EXPDT->Disabled && !isset($view_pharmacy_consumption_list->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_consumption_list->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_consumptionlist", "x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_EXPDT" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_EXPDT" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->EXPDT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_consumption_list->BILLDATE->Visible) { // BILLDATE ?>
		<td data-name="BILLDATE">
<span id="el$rowindex$_view_pharmacy_consumption_BILLDATE" class="form-group view_pharmacy_consumption_BILLDATE">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_BILLDATE" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BILLDATE" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BILLDATE" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->BILLDATE->EditValue ?>"<?php echo $view_pharmacy_consumption_list->BILLDATE->editAttributes() ?>>
<?php if (!$view_pharmacy_consumption_list->BILLDATE->ReadOnly && !$view_pharmacy_consumption_list->BILLDATE->Disabled && !isset($view_pharmacy_consumption_list->BILLDATE->EditAttrs["readonly"]) && !isset($view_pharmacy_consumption_list->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_consumptionlist", "x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_BILLDATE" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BILLDATE" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_BILLDATE" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->BILLDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_consumption_list->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE">
<span id="el$rowindex$_view_pharmacy_consumption_MFRCODE" class="form-group view_pharmacy_consumption_MFRCODE">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_MFRCODE" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->MFRCODE->EditValue ?>"<?php echo $view_pharmacy_consumption_list->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_MFRCODE" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_MFRCODE" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->MFRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_consumption_list->Select->Visible) { // Select ?>
		<td data-name="Select">
<span id="el$rowindex$_view_pharmacy_consumption_Select" class="form-group view_pharmacy_consumption_Select">
<div id="tp_x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Select" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_pharmacy_consumption" data-field="x_Select" data-value-separator="<?php echo $view_pharmacy_consumption_list->Select->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Select[]" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Select[]" value="{value}"<?php echo $view_pharmacy_consumption_list->Select->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Select" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_pharmacy_consumption_list->Select->checkBoxListHtml(FALSE, "x{$view_pharmacy_consumption_list->RowIndex}_Select[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_Select" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Select[]" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_Select[]" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->Select->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_consumption_list->ConsQTY->Visible) { // ConsQTY ?>
		<td data-name="ConsQTY">
<span id="el$rowindex$_view_pharmacy_consumption_ConsQTY" class="form-group view_pharmacy_consumption_ConsQTY">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_ConsQTY" name="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_ConsQTY" id="x<?php echo $view_pharmacy_consumption_list->RowIndex ?>_ConsQTY" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_list->ConsQTY->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_list->ConsQTY->EditValue ?>"<?php echo $view_pharmacy_consumption_list->ConsQTY->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_ConsQTY" name="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_ConsQTY" id="o<?php echo $view_pharmacy_consumption_list->RowIndex ?>_ConsQTY" value="<?php echo HtmlEncode($view_pharmacy_consumption_list->ConsQTY->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_consumption_list->ListOptions->render("body", "right", $view_pharmacy_consumption_list->RowIndex);
?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlist", "load"], function() {
	fview_pharmacy_consumptionlist.updateLists(<?php echo $view_pharmacy_consumption_list->RowIndex ?>);
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
<?php if ($view_pharmacy_consumption_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_pharmacy_consumption_list->FormKeyCountName ?>" id="<?php echo $view_pharmacy_consumption_list->FormKeyCountName ?>" value="<?php echo $view_pharmacy_consumption_list->KeyCount ?>">
<?php echo $view_pharmacy_consumption_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_pharmacy_consumption->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_consumption_list->Recordset)
	$view_pharmacy_consumption_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_consumption_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_consumption_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacy_consumption_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_consumption_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_consumption_list->TotalRecords == 0 && !$view_pharmacy_consumption->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_consumption_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_consumption_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_consumption_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_pharmacy_consumption->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_pharmacy_consumption",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_pharmacy_consumption_list->terminate();
?>