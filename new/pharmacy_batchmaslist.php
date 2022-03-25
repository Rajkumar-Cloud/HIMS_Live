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
$pharmacy_batchmas_list = new pharmacy_batchmas_list();

// Run the page
$pharmacy_batchmas_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_batchmas_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_batchmas_list->isExport()) { ?>
<script>
var fpharmacy_batchmaslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_batchmaslist = currentForm = new ew.Form("fpharmacy_batchmaslist", "list");
	fpharmacy_batchmaslist.formKeyCountName = '<?php echo $pharmacy_batchmas_list->FormKeyCountName ?>';

	// Validate form
	fpharmacy_batchmaslist.validate = function() {
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
			<?php if ($pharmacy_batchmas_list->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->PRC->caption(), $pharmacy_batchmas_list->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_list->PrName->Required) { ?>
				elm = this.getElements("x" + infix + "_PrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->PrName->caption(), $pharmacy_batchmas_list->PrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_list->BATCHNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BATCHNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->BATCHNO->caption(), $pharmacy_batchmas_list->BATCHNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_list->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->MFRCODE->caption(), $pharmacy_batchmas_list->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_list->EXPDT->Required) { ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->EXPDT->caption(), $pharmacy_batchmas_list->EXPDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_list->EXPDT->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_list->PRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_PRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->PRCODE->caption(), $pharmacy_batchmas_list->PRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_list->OQ->Required) { ?>
				elm = this.getElements("x" + infix + "_OQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->OQ->caption(), $pharmacy_batchmas_list->OQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_list->OQ->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_list->RQ->Required) { ?>
				elm = this.getElements("x" + infix + "_RQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->RQ->caption(), $pharmacy_batchmas_list->RQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_list->RQ->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_list->FRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_FRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->FRQ->caption(), $pharmacy_batchmas_list->FRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FRQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_list->FRQ->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_list->IQ->Required) { ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->IQ->caption(), $pharmacy_batchmas_list->IQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_list->IQ->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_list->MRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->MRQ->caption(), $pharmacy_batchmas_list->MRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_list->MRQ->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_list->MRP->Required) { ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->MRP->caption(), $pharmacy_batchmas_list->MRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_list->MRP->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_list->UR->Required) { ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->UR->caption(), $pharmacy_batchmas_list->UR->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_list->UR->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_list->SSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->SSGST->caption(), $pharmacy_batchmas_list->SSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_list->SCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->SCGST->caption(), $pharmacy_batchmas_list->SCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_list->RT->Required) { ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->RT->caption(), $pharmacy_batchmas_list->RT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_list->RT->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_list->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->BRCODE->caption(), $pharmacy_batchmas_list->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_list->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->HospID->caption(), $pharmacy_batchmas_list->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_list->HospID->errorMessage()) ?>");
			<?php if ($pharmacy_batchmas_list->UM->Required) { ?>
				elm = this.getElements("x" + infix + "_UM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->UM->caption(), $pharmacy_batchmas_list->UM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_list->GENNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_GENNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->GENNAME->caption(), $pharmacy_batchmas_list->GENNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_batchmas_list->BILLDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_BILLDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas_list->BILLDATE->caption(), $pharmacy_batchmas_list->BILLDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BILLDATE");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_list->BILLDATE->errorMessage()) ?>");

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
	fpharmacy_batchmaslist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
		if (ew.valueChanged(fobj, infix, "PrName", false)) return false;
		if (ew.valueChanged(fobj, infix, "BATCHNO", false)) return false;
		if (ew.valueChanged(fobj, infix, "MFRCODE", false)) return false;
		if (ew.valueChanged(fobj, infix, "EXPDT", false)) return false;
		if (ew.valueChanged(fobj, infix, "PRCODE", false)) return false;
		if (ew.valueChanged(fobj, infix, "OQ", false)) return false;
		if (ew.valueChanged(fobj, infix, "RQ", false)) return false;
		if (ew.valueChanged(fobj, infix, "FRQ", false)) return false;
		if (ew.valueChanged(fobj, infix, "IQ", false)) return false;
		if (ew.valueChanged(fobj, infix, "MRQ", false)) return false;
		if (ew.valueChanged(fobj, infix, "MRP", false)) return false;
		if (ew.valueChanged(fobj, infix, "UR", false)) return false;
		if (ew.valueChanged(fobj, infix, "SSGST", false)) return false;
		if (ew.valueChanged(fobj, infix, "SCGST", false)) return false;
		if (ew.valueChanged(fobj, infix, "RT", false)) return false;
		if (ew.valueChanged(fobj, infix, "BRCODE", false)) return false;
		if (ew.valueChanged(fobj, infix, "HospID", false)) return false;
		if (ew.valueChanged(fobj, infix, "UM", false)) return false;
		if (ew.valueChanged(fobj, infix, "GENNAME", false)) return false;
		if (ew.valueChanged(fobj, infix, "BILLDATE", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpharmacy_batchmaslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_batchmaslist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_batchmaslist.lists["x_PrName"] = <?php echo $pharmacy_batchmas_list->PrName->Lookup->toClientList($pharmacy_batchmas_list) ?>;
	fpharmacy_batchmaslist.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_batchmas_list->PrName->lookupOptions()) ?>;
	fpharmacy_batchmaslist.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpharmacy_batchmaslist.lists["x_BRCODE"] = <?php echo $pharmacy_batchmas_list->BRCODE->Lookup->toClientList($pharmacy_batchmas_list) ?>;
	fpharmacy_batchmaslist.lists["x_BRCODE"].options = <?php echo JsonEncode($pharmacy_batchmas_list->BRCODE->lookupOptions()) ?>;
	loadjs.done("fpharmacy_batchmaslist");
});
var fpharmacy_batchmaslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_batchmaslistsrch = currentSearchForm = new ew.Form("fpharmacy_batchmaslistsrch");

	// Validate function for search
	fpharmacy_batchmaslistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_EXPDT");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_list->EXPDT->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fpharmacy_batchmaslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_batchmaslistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_batchmaslistsrch.lists["x_PrName"] = <?php echo $pharmacy_batchmas_list->PrName->Lookup->toClientList($pharmacy_batchmas_list) ?>;
	fpharmacy_batchmaslistsrch.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_batchmas_list->PrName->lookupOptions()) ?>;
	fpharmacy_batchmaslistsrch.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

	// Filters
	fpharmacy_batchmaslistsrch.filterList = <?php echo $pharmacy_batchmas_list->getFilterList() ?>;
	loadjs.done("fpharmacy_batchmaslistsrch");
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
<?php if (!$pharmacy_batchmas_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_batchmas_list->TotalRecords > 0 && $pharmacy_batchmas_list->ExportOptions->visible()) { ?>
<?php $pharmacy_batchmas_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->ImportOptions->visible()) { ?>
<?php $pharmacy_batchmas_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->SearchOptions->visible()) { ?>
<?php $pharmacy_batchmas_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->FilterOptions->visible()) { ?>
<?php $pharmacy_batchmas_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_batchmas_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_batchmas_list->isExport() && !$pharmacy_batchmas->CurrentAction) { ?>
<form name="fpharmacy_batchmaslistsrch" id="fpharmacy_batchmaslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_batchmaslistsrch-search-panel" class="<?php echo $pharmacy_batchmas_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_batchmas">
	<div class="ew-extended-search">
<?php

// Render search row
$pharmacy_batchmas->RowType = ROWTYPE_SEARCH;
$pharmacy_batchmas->resetAttributes();
$pharmacy_batchmas_list->renderRow();
?>
<?php if ($pharmacy_batchmas_list->PRC->Visible) { // PRC ?>
	<?php
		$pharmacy_batchmas_list->SearchColumnCount++;
		if (($pharmacy_batchmas_list->SearchColumnCount - 1) % $pharmacy_batchmas_list->SearchFieldsPerRow == 0) {
			$pharmacy_batchmas_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $pharmacy_batchmas_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PRC" class="ew-cell form-group">
		<label for="x_PRC" class="ew-search-caption ew-label"><?php echo $pharmacy_batchmas_list->PRC->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PRC" id="z_PRC" value="LIKE">
</span>
		<span id="el_pharmacy_batchmas_PRC" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRC" name="x_PRC" id="x_PRC" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->PRC->EditValue ?>"<?php echo $pharmacy_batchmas_list->PRC->editAttributes() ?>>
</span>
	</div>
	<?php if ($pharmacy_batchmas_list->SearchColumnCount % $pharmacy_batchmas_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->PrName->Visible) { // PrName ?>
	<?php
		$pharmacy_batchmas_list->SearchColumnCount++;
		if (($pharmacy_batchmas_list->SearchColumnCount - 1) % $pharmacy_batchmas_list->SearchFieldsPerRow == 0) {
			$pharmacy_batchmas_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $pharmacy_batchmas_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PrName" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $pharmacy_batchmas_list->PrName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PrName" id="z_PrName" value="LIKE">
</span>
		<span id="el_pharmacy_batchmas_PrName" class="ew-search-field">
<?php
$onchange = $pharmacy_batchmas_list->PrName->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_batchmas_list->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PrName">
	<input type="text" class="form-control" name="sv_x_PrName" id="sv_x_PrName" value="<?php echo RemoveHtml($pharmacy_batchmas_list->PrName->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_batchmas_list->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_batchmas_list->PrName->displayValueSeparatorAttribute() ?>" name="x_PrName" id="x_PrName" value="<?php echo HtmlEncode($pharmacy_batchmas_list->PrName->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_batchmaslistsrch"], function() {
	fpharmacy_batchmaslistsrch.createAutoSuggest({"id":"x_PrName","forceSelect":true});
});
</script>
<?php echo $pharmacy_batchmas_list->PrName->Lookup->getParamTag($pharmacy_batchmas_list, "p_x_PrName") ?>
</span>
	</div>
	<?php if ($pharmacy_batchmas_list->SearchColumnCount % $pharmacy_batchmas_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->BATCHNO->Visible) { // BATCHNO ?>
	<?php
		$pharmacy_batchmas_list->SearchColumnCount++;
		if (($pharmacy_batchmas_list->SearchColumnCount - 1) % $pharmacy_batchmas_list->SearchFieldsPerRow == 0) {
			$pharmacy_batchmas_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $pharmacy_batchmas_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_BATCHNO" class="ew-cell form-group">
		<label for="x_BATCHNO" class="ew-search-caption ew-label"><?php echo $pharmacy_batchmas_list->BATCHNO->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BATCHNO" id="z_BATCHNO" value="LIKE">
</span>
		<span id="el_pharmacy_batchmas_BATCHNO" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->BATCHNO->EditValue ?>"<?php echo $pharmacy_batchmas_list->BATCHNO->editAttributes() ?>>
</span>
	</div>
	<?php if ($pharmacy_batchmas_list->SearchColumnCount % $pharmacy_batchmas_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->MFRCODE->Visible) { // MFRCODE ?>
	<?php
		$pharmacy_batchmas_list->SearchColumnCount++;
		if (($pharmacy_batchmas_list->SearchColumnCount - 1) % $pharmacy_batchmas_list->SearchFieldsPerRow == 0) {
			$pharmacy_batchmas_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $pharmacy_batchmas_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_MFRCODE" class="ew-cell form-group">
		<label for="x_MFRCODE" class="ew-search-caption ew-label"><?php echo $pharmacy_batchmas_list->MFRCODE->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE">
</span>
		<span id="el_pharmacy_batchmas_MFRCODE" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->MFRCODE->EditValue ?>"<?php echo $pharmacy_batchmas_list->MFRCODE->editAttributes() ?>>
</span>
	</div>
	<?php if ($pharmacy_batchmas_list->SearchColumnCount % $pharmacy_batchmas_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->EXPDT->Visible) { // EXPDT ?>
	<?php
		$pharmacy_batchmas_list->SearchColumnCount++;
		if (($pharmacy_batchmas_list->SearchColumnCount - 1) % $pharmacy_batchmas_list->SearchFieldsPerRow == 0) {
			$pharmacy_batchmas_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $pharmacy_batchmas_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_EXPDT" class="ew-cell form-group">
		<label for="x_EXPDT" class="ew-search-caption ew-label"><?php echo $pharmacy_batchmas_list->EXPDT->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_EXPDT" id="z_EXPDT" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $pharmacy_batchmas_list->EXPDT->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $pharmacy_batchmas_list->EXPDT->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $pharmacy_batchmas_list->EXPDT->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $pharmacy_batchmas_list->EXPDT->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $pharmacy_batchmas_list->EXPDT->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $pharmacy_batchmas_list->EXPDT->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $pharmacy_batchmas_list->EXPDT->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $pharmacy_batchmas_list->EXPDT->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $pharmacy_batchmas_list->EXPDT->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_pharmacy_batchmas_EXPDT" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->EXPDT->EditValue ?>"<?php echo $pharmacy_batchmas_list->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_batchmas_list->EXPDT->ReadOnly && !$pharmacy_batchmas_list->EXPDT->Disabled && !isset($pharmacy_batchmas_list->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_batchmas_list->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmaslistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_batchmaslistsrch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_pharmacy_batchmas_EXPDT" class="ew-search-field2 d-none">
<input type="text" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="y_EXPDT" id="y_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->EXPDT->EditValue2 ?>"<?php echo $pharmacy_batchmas_list->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_batchmas_list->EXPDT->ReadOnly && !$pharmacy_batchmas_list->EXPDT->Disabled && !isset($pharmacy_batchmas_list->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_batchmas_list->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmaslistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_batchmaslistsrch", "y_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($pharmacy_batchmas_list->SearchColumnCount % $pharmacy_batchmas_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($pharmacy_batchmas_list->SearchColumnCount % $pharmacy_batchmas_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $pharmacy_batchmas_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_batchmas_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_batchmas_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_batchmas_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_batchmas_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_batchmas_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_batchmas_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_batchmas_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_batchmas_list->showPageHeader(); ?>
<?php
$pharmacy_batchmas_list->showMessage();
?>
<?php if ($pharmacy_batchmas_list->TotalRecords > 0 || $pharmacy_batchmas->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_batchmas_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_batchmas">
<?php if (!$pharmacy_batchmas_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_batchmas_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_batchmas_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_batchmas_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_batchmaslist" id="fpharmacy_batchmaslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_batchmas">
<div id="gmp_pharmacy_batchmas" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_batchmas_list->TotalRecords > 0 || $pharmacy_batchmas_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_batchmaslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_batchmas->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_batchmas_list->renderListOptions();

// Render list options (header, left)
$pharmacy_batchmas_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_batchmas_list->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_batchmas_list->PRC->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_PRC" class="pharmacy_batchmas_PRC"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_batchmas_list->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->PRC) ?>', 1);"><div id="elh_pharmacy_batchmas_PRC" class="pharmacy_batchmas_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->PrName->Visible) { // PrName ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $pharmacy_batchmas_list->PrName->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_PrName" class="pharmacy_batchmas_PrName"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $pharmacy_batchmas_list->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->PrName) ?>', 1);"><div id="elh_pharmacy_batchmas_PrName" class="pharmacy_batchmas_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->PrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->PrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $pharmacy_batchmas_list->BATCHNO->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_BATCHNO" class="pharmacy_batchmas_BATCHNO"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $pharmacy_batchmas_list->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->BATCHNO) ?>', 1);"><div id="elh_pharmacy_batchmas_BATCHNO" class="pharmacy_batchmas_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->BATCHNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->BATCHNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $pharmacy_batchmas_list->MFRCODE->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_MFRCODE" class="pharmacy_batchmas_MFRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $pharmacy_batchmas_list->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->MFRCODE) ?>', 1);"><div id="elh_pharmacy_batchmas_MFRCODE" class="pharmacy_batchmas_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->MFRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->MFRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->EXPDT->Visible) { // EXPDT ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $pharmacy_batchmas_list->EXPDT->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_EXPDT" class="pharmacy_batchmas_EXPDT"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $pharmacy_batchmas_list->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->EXPDT) ?>', 1);"><div id="elh_pharmacy_batchmas_EXPDT" class="pharmacy_batchmas_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->EXPDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->EXPDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->PRCODE->Visible) { // PRCODE ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->PRCODE) == "") { ?>
		<th data-name="PRCODE" class="<?php echo $pharmacy_batchmas_list->PRCODE->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_PRCODE" class="pharmacy_batchmas_PRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->PRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRCODE" class="<?php echo $pharmacy_batchmas_list->PRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->PRCODE) ?>', 1);"><div id="elh_pharmacy_batchmas_PRCODE" class="pharmacy_batchmas_PRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->PRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->PRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->PRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->OQ->Visible) { // OQ ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->OQ) == "") { ?>
		<th data-name="OQ" class="<?php echo $pharmacy_batchmas_list->OQ->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_OQ" class="pharmacy_batchmas_OQ"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->OQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OQ" class="<?php echo $pharmacy_batchmas_list->OQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->OQ) ?>', 1);"><div id="elh_pharmacy_batchmas_OQ" class="pharmacy_batchmas_OQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->OQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->OQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->OQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->RQ->Visible) { // RQ ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->RQ) == "") { ?>
		<th data-name="RQ" class="<?php echo $pharmacy_batchmas_list->RQ->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_RQ" class="pharmacy_batchmas_RQ"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->RQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RQ" class="<?php echo $pharmacy_batchmas_list->RQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->RQ) ?>', 1);"><div id="elh_pharmacy_batchmas_RQ" class="pharmacy_batchmas_RQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->RQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->RQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->RQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->FRQ->Visible) { // FRQ ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->FRQ) == "") { ?>
		<th data-name="FRQ" class="<?php echo $pharmacy_batchmas_list->FRQ->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_FRQ" class="pharmacy_batchmas_FRQ"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->FRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FRQ" class="<?php echo $pharmacy_batchmas_list->FRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->FRQ) ?>', 1);"><div id="elh_pharmacy_batchmas_FRQ" class="pharmacy_batchmas_FRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->FRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->FRQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->FRQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->IQ->Visible) { // IQ ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $pharmacy_batchmas_list->IQ->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_IQ" class="pharmacy_batchmas_IQ"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $pharmacy_batchmas_list->IQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->IQ) ?>', 1);"><div id="elh_pharmacy_batchmas_IQ" class="pharmacy_batchmas_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->IQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->IQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->MRQ->Visible) { // MRQ ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->MRQ) == "") { ?>
		<th data-name="MRQ" class="<?php echo $pharmacy_batchmas_list->MRQ->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_MRQ" class="pharmacy_batchmas_MRQ"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->MRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRQ" class="<?php echo $pharmacy_batchmas_list->MRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->MRQ) ?>', 1);"><div id="elh_pharmacy_batchmas_MRQ" class="pharmacy_batchmas_MRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->MRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->MRQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->MRQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->MRP->Visible) { // MRP ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $pharmacy_batchmas_list->MRP->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_MRP" class="pharmacy_batchmas_MRP"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $pharmacy_batchmas_list->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->MRP) ?>', 1);"><div id="elh_pharmacy_batchmas_MRP" class="pharmacy_batchmas_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->MRP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->MRP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->UR->Visible) { // UR ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->UR) == "") { ?>
		<th data-name="UR" class="<?php echo $pharmacy_batchmas_list->UR->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_UR" class="pharmacy_batchmas_UR"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->UR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UR" class="<?php echo $pharmacy_batchmas_list->UR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->UR) ?>', 1);"><div id="elh_pharmacy_batchmas_UR" class="pharmacy_batchmas_UR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->UR->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->UR->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->SSGST->Visible) { // SSGST ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $pharmacy_batchmas_list->SSGST->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_SSGST" class="pharmacy_batchmas_SSGST"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $pharmacy_batchmas_list->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->SSGST) ?>', 1);"><div id="elh_pharmacy_batchmas_SSGST" class="pharmacy_batchmas_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->SSGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->SSGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->SSGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->SCGST->Visible) { // SCGST ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $pharmacy_batchmas_list->SCGST->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_SCGST" class="pharmacy_batchmas_SCGST"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $pharmacy_batchmas_list->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->SCGST) ?>', 1);"><div id="elh_pharmacy_batchmas_SCGST" class="pharmacy_batchmas_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->SCGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->SCGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->SCGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->RT->Visible) { // RT ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $pharmacy_batchmas_list->RT->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_RT" class="pharmacy_batchmas_RT"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $pharmacy_batchmas_list->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->RT) ?>', 1);"><div id="elh_pharmacy_batchmas_RT" class="pharmacy_batchmas_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->RT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->RT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_batchmas_list->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_BRCODE" class="pharmacy_batchmas_BRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_batchmas_list->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->BRCODE) ?>', 1);"><div id="elh_pharmacy_batchmas_BRCODE" class="pharmacy_batchmas_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_batchmas_list->HospID->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_HospID" class="pharmacy_batchmas_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_batchmas_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->HospID) ?>', 1);"><div id="elh_pharmacy_batchmas_HospID" class="pharmacy_batchmas_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->UM->Visible) { // UM ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->UM) == "") { ?>
		<th data-name="UM" class="<?php echo $pharmacy_batchmas_list->UM->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_UM" class="pharmacy_batchmas_UM"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->UM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UM" class="<?php echo $pharmacy_batchmas_list->UM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->UM) ?>', 1);"><div id="elh_pharmacy_batchmas_UM" class="pharmacy_batchmas_UM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->UM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->UM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->UM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->GENNAME->Visible) { // GENNAME ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->GENNAME) == "") { ?>
		<th data-name="GENNAME" class="<?php echo $pharmacy_batchmas_list->GENNAME->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_GENNAME" class="pharmacy_batchmas_GENNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->GENNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENNAME" class="<?php echo $pharmacy_batchmas_list->GENNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->GENNAME) ?>', 1);"><div id="elh_pharmacy_batchmas_GENNAME" class="pharmacy_batchmas_GENNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->GENNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->GENNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->GENNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->BILLDATE->Visible) { // BILLDATE ?>
	<?php if ($pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->BILLDATE) == "") { ?>
		<th data-name="BILLDATE" class="<?php echo $pharmacy_batchmas_list->BILLDATE->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_BILLDATE" class="pharmacy_batchmas_BILLDATE"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->BILLDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDATE" class="<?php echo $pharmacy_batchmas_list->BILLDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_batchmas_list->SortUrl($pharmacy_batchmas_list->BILLDATE) ?>', 1);"><div id="elh_pharmacy_batchmas_BILLDATE" class="pharmacy_batchmas_BILLDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas_list->BILLDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas_list->BILLDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_batchmas_list->BILLDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_batchmas_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_batchmas_list->ExportAll && $pharmacy_batchmas_list->isExport()) {
	$pharmacy_batchmas_list->StopRecord = $pharmacy_batchmas_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_batchmas_list->TotalRecords > $pharmacy_batchmas_list->StartRecord + $pharmacy_batchmas_list->DisplayRecords - 1)
		$pharmacy_batchmas_list->StopRecord = $pharmacy_batchmas_list->StartRecord + $pharmacy_batchmas_list->DisplayRecords - 1;
	else
		$pharmacy_batchmas_list->StopRecord = $pharmacy_batchmas_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($pharmacy_batchmas->isConfirm() || $pharmacy_batchmas_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_batchmas_list->FormKeyCountName) && ($pharmacy_batchmas_list->isGridAdd() || $pharmacy_batchmas_list->isGridEdit() || $pharmacy_batchmas->isConfirm())) {
		$pharmacy_batchmas_list->KeyCount = $CurrentForm->getValue($pharmacy_batchmas_list->FormKeyCountName);
		$pharmacy_batchmas_list->StopRecord = $pharmacy_batchmas_list->StartRecord + $pharmacy_batchmas_list->KeyCount - 1;
	}
}
$pharmacy_batchmas_list->RecordCount = $pharmacy_batchmas_list->StartRecord - 1;
if ($pharmacy_batchmas_list->Recordset && !$pharmacy_batchmas_list->Recordset->EOF) {
	$pharmacy_batchmas_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_batchmas_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_batchmas_list->StartRecord > 1)
		$pharmacy_batchmas_list->Recordset->move($pharmacy_batchmas_list->StartRecord - 1);
} elseif (!$pharmacy_batchmas->AllowAddDeleteRow && $pharmacy_batchmas_list->StopRecord == 0) {
	$pharmacy_batchmas_list->StopRecord = $pharmacy_batchmas->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_batchmas->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_batchmas->resetAttributes();
$pharmacy_batchmas_list->renderRow();
if ($pharmacy_batchmas_list->isGridAdd())
	$pharmacy_batchmas_list->RowIndex = 0;
if ($pharmacy_batchmas_list->isGridEdit())
	$pharmacy_batchmas_list->RowIndex = 0;
while ($pharmacy_batchmas_list->RecordCount < $pharmacy_batchmas_list->StopRecord) {
	$pharmacy_batchmas_list->RecordCount++;
	if ($pharmacy_batchmas_list->RecordCount >= $pharmacy_batchmas_list->StartRecord) {
		$pharmacy_batchmas_list->RowCount++;
		if ($pharmacy_batchmas_list->isGridAdd() || $pharmacy_batchmas_list->isGridEdit() || $pharmacy_batchmas->isConfirm()) {
			$pharmacy_batchmas_list->RowIndex++;
			$CurrentForm->Index = $pharmacy_batchmas_list->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_batchmas_list->FormActionName) && ($pharmacy_batchmas->isConfirm() || $pharmacy_batchmas_list->EventCancelled))
				$pharmacy_batchmas_list->RowAction = strval($CurrentForm->getValue($pharmacy_batchmas_list->FormActionName));
			elseif ($pharmacy_batchmas_list->isGridAdd())
				$pharmacy_batchmas_list->RowAction = "insert";
			else
				$pharmacy_batchmas_list->RowAction = "";
		}

		// Set up key count
		$pharmacy_batchmas_list->KeyCount = $pharmacy_batchmas_list->RowIndex;

		// Init row class and style
		$pharmacy_batchmas->resetAttributes();
		$pharmacy_batchmas->CssClass = "";
		if ($pharmacy_batchmas_list->isGridAdd()) {
			$pharmacy_batchmas_list->loadRowValues(); // Load default values
		} else {
			$pharmacy_batchmas_list->loadRowValues($pharmacy_batchmas_list->Recordset); // Load row values
		}
		$pharmacy_batchmas->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_batchmas_list->isGridAdd()) // Grid add
			$pharmacy_batchmas->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_batchmas_list->isGridAdd() && $pharmacy_batchmas->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_batchmas_list->restoreCurrentRowFormValues($pharmacy_batchmas_list->RowIndex); // Restore form values
		if ($pharmacy_batchmas_list->isGridEdit()) { // Grid edit
			if ($pharmacy_batchmas->EventCancelled)
				$pharmacy_batchmas_list->restoreCurrentRowFormValues($pharmacy_batchmas_list->RowIndex); // Restore form values
			if ($pharmacy_batchmas_list->RowAction == "insert")
				$pharmacy_batchmas->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_batchmas->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_batchmas_list->isGridEdit() && ($pharmacy_batchmas->RowType == ROWTYPE_EDIT || $pharmacy_batchmas->RowType == ROWTYPE_ADD) && $pharmacy_batchmas->EventCancelled) // Update failed
			$pharmacy_batchmas_list->restoreCurrentRowFormValues($pharmacy_batchmas_list->RowIndex); // Restore form values
		if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_batchmas_list->EditRowCount++;

		// Set up row id / data-rowindex
		$pharmacy_batchmas->RowAttrs->merge(["data-rowindex" => $pharmacy_batchmas_list->RowCount, "id" => "r" . $pharmacy_batchmas_list->RowCount . "_pharmacy_batchmas", "data-rowtype" => $pharmacy_batchmas->RowType]);

		// Render row
		$pharmacy_batchmas_list->renderRow();

		// Render list options
		$pharmacy_batchmas_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_batchmas_list->RowAction != "delete" && $pharmacy_batchmas_list->RowAction != "insertdelete" && !($pharmacy_batchmas_list->RowAction == "insert" && $pharmacy_batchmas->isConfirm() && $pharmacy_batchmas_list->emptyRow())) {
?>
	<tr <?php echo $pharmacy_batchmas->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_batchmas_list->ListOptions->render("body", "left", $pharmacy_batchmas_list->RowCount);
?>
	<?php if ($pharmacy_batchmas_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $pharmacy_batchmas_list->PRC->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_PRC" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRC" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->PRC->EditValue ?>"<?php echo $pharmacy_batchmas_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PRC" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_batchmas_list->PRC->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_PRC" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRC" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->PRC->EditValue ?>"<?php echo $pharmacy_batchmas_list->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_PRC">
<span<?php echo $pharmacy_batchmas_list->PRC->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_id" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_id" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_batchmas_list->id->CurrentValue) ?>">
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_id" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_id" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_batchmas_list->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT || $pharmacy_batchmas->CurrentMode == "edit") { ?>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_id" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_id" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_batchmas_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($pharmacy_batchmas_list->PrName->Visible) { // PrName ?>
		<td data-name="PrName" <?php echo $pharmacy_batchmas_list->PrName->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_PrName" class="form-group">
<?php
$onchange = $pharmacy_batchmas_list->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_batchmas_list->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" id="sv_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" value="<?php echo RemoveHtml($pharmacy_batchmas_list->PrName->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_batchmas_list->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_batchmas_list->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_batchmas_list->PrName->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_batchmaslist"], function() {
	fpharmacy_batchmaslist.createAutoSuggest({"id":"x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName","forceSelect":true});
});
</script>
<?php echo $pharmacy_batchmas_list->PrName->Lookup->getParamTag($pharmacy_batchmas_list, "p_x" . $pharmacy_batchmas_list->RowIndex . "_PrName") ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_batchmas_list->PrName->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_PrName" class="form-group">
<?php
$onchange = $pharmacy_batchmas_list->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_batchmas_list->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" id="sv_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" value="<?php echo RemoveHtml($pharmacy_batchmas_list->PrName->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_batchmas_list->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_batchmas_list->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_batchmas_list->PrName->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_batchmaslist"], function() {
	fpharmacy_batchmaslist.createAutoSuggest({"id":"x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName","forceSelect":true});
});
</script>
<?php echo $pharmacy_batchmas_list->PrName->Lookup->getParamTag($pharmacy_batchmas_list, "p_x" . $pharmacy_batchmas_list->RowIndex . "_PrName") ?>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_PrName">
<span<?php echo $pharmacy_batchmas_list->PrName->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->PrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO" <?php echo $pharmacy_batchmas_list->BATCHNO->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_BATCHNO" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->BATCHNO->EditValue ?>"<?php echo $pharmacy_batchmas_list->BATCHNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_batchmas_list->BATCHNO->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_BATCHNO" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->BATCHNO->EditValue ?>"<?php echo $pharmacy_batchmas_list->BATCHNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_BATCHNO">
<span<?php echo $pharmacy_batchmas_list->BATCHNO->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->BATCHNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" <?php echo $pharmacy_batchmas_list->MFRCODE->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_MFRCODE" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->MFRCODE->EditValue ?>"<?php echo $pharmacy_batchmas_list->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($pharmacy_batchmas_list->MFRCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_MFRCODE" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->MFRCODE->EditValue ?>"<?php echo $pharmacy_batchmas_list->MFRCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_MFRCODE">
<span<?php echo $pharmacy_batchmas_list->MFRCODE->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->MFRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT" <?php echo $pharmacy_batchmas_list->EXPDT->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_EXPDT" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->EXPDT->EditValue ?>"<?php echo $pharmacy_batchmas_list->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_batchmas_list->EXPDT->ReadOnly && !$pharmacy_batchmas_list->EXPDT->Disabled && !isset($pharmacy_batchmas_list->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_batchmas_list->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmaslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_batchmaslist", "x<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_batchmas_list->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_EXPDT" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->EXPDT->EditValue ?>"<?php echo $pharmacy_batchmas_list->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_batchmas_list->EXPDT->ReadOnly && !$pharmacy_batchmas_list->EXPDT->Disabled && !isset($pharmacy_batchmas_list->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_batchmas_list->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmaslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_batchmaslist", "x<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_EXPDT">
<span<?php echo $pharmacy_batchmas_list->EXPDT->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->EXPDT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->PRCODE->Visible) { // PRCODE ?>
		<td data-name="PRCODE" <?php echo $pharmacy_batchmas_list->PRCODE->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_PRCODE" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->PRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->PRCODE->EditValue ?>"<?php echo $pharmacy_batchmas_list->PRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" value="<?php echo HtmlEncode($pharmacy_batchmas_list->PRCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_PRCODE" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->PRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->PRCODE->EditValue ?>"<?php echo $pharmacy_batchmas_list->PRCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_PRCODE">
<span<?php echo $pharmacy_batchmas_list->PRCODE->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->PRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->OQ->Visible) { // OQ ?>
		<td data-name="OQ" <?php echo $pharmacy_batchmas_list->OQ->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_OQ" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->OQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->OQ->EditValue ?>"<?php echo $pharmacy_batchmas_list->OQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_OQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" value="<?php echo HtmlEncode($pharmacy_batchmas_list->OQ->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_OQ" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->OQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->OQ->EditValue ?>"<?php echo $pharmacy_batchmas_list->OQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_OQ">
<span<?php echo $pharmacy_batchmas_list->OQ->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->OQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->RQ->Visible) { // RQ ?>
		<td data-name="RQ" <?php echo $pharmacy_batchmas_list->RQ->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_RQ" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->RQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->RQ->EditValue ?>"<?php echo $pharmacy_batchmas_list->RQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_RQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" value="<?php echo HtmlEncode($pharmacy_batchmas_list->RQ->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_RQ" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->RQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->RQ->EditValue ?>"<?php echo $pharmacy_batchmas_list->RQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_RQ">
<span<?php echo $pharmacy_batchmas_list->RQ->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->RQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->FRQ->Visible) { // FRQ ?>
		<td data-name="FRQ" <?php echo $pharmacy_batchmas_list->FRQ->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_FRQ" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_FRQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->FRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->FRQ->EditValue ?>"<?php echo $pharmacy_batchmas_list->FRQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_FRQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" value="<?php echo HtmlEncode($pharmacy_batchmas_list->FRQ->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_FRQ" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_FRQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->FRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->FRQ->EditValue ?>"<?php echo $pharmacy_batchmas_list->FRQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_FRQ">
<span<?php echo $pharmacy_batchmas_list->FRQ->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->FRQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->IQ->Visible) { // IQ ?>
		<td data-name="IQ" <?php echo $pharmacy_batchmas_list->IQ->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_IQ" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_IQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->IQ->EditValue ?>"<?php echo $pharmacy_batchmas_list->IQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_IQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_batchmas_list->IQ->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_IQ" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_IQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->IQ->EditValue ?>"<?php echo $pharmacy_batchmas_list->IQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_IQ">
<span<?php echo $pharmacy_batchmas_list->IQ->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->IQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ" <?php echo $pharmacy_batchmas_list->MRQ->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_MRQ" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->MRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->MRQ->EditValue ?>"<?php echo $pharmacy_batchmas_list->MRQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_MRQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($pharmacy_batchmas_list->MRQ->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_MRQ" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->MRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->MRQ->EditValue ?>"<?php echo $pharmacy_batchmas_list->MRQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_MRQ">
<span<?php echo $pharmacy_batchmas_list->MRQ->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->MRQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->MRP->Visible) { // MRP ?>
		<td data-name="MRP" <?php echo $pharmacy_batchmas_list->MRP->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_MRP" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRP" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->MRP->EditValue ?>"<?php echo $pharmacy_batchmas_list->MRP->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_MRP" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" value="<?php echo HtmlEncode($pharmacy_batchmas_list->MRP->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_MRP" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRP" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->MRP->EditValue ?>"<?php echo $pharmacy_batchmas_list->MRP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_MRP">
<span<?php echo $pharmacy_batchmas_list->MRP->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->MRP->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->UR->Visible) { // UR ?>
		<td data-name="UR" <?php echo $pharmacy_batchmas_list->UR->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_UR" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UR" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->UR->EditValue ?>"<?php echo $pharmacy_batchmas_list->UR->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_UR" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_batchmas_list->UR->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_UR" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UR" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->UR->EditValue ?>"<?php echo $pharmacy_batchmas_list->UR->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_UR">
<span<?php echo $pharmacy_batchmas_list->UR->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->UR->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST" <?php echo $pharmacy_batchmas_list->SSGST->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_SSGST" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SSGST" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->SSGST->EditValue ?>"<?php echo $pharmacy_batchmas_list->SSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_SSGST" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($pharmacy_batchmas_list->SSGST->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_SSGST" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SSGST" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->SSGST->EditValue ?>"<?php echo $pharmacy_batchmas_list->SSGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_SSGST">
<span<?php echo $pharmacy_batchmas_list->SSGST->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->SSGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST" <?php echo $pharmacy_batchmas_list->SCGST->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_SCGST" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SCGST" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->SCGST->EditValue ?>"<?php echo $pharmacy_batchmas_list->SCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_SCGST" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($pharmacy_batchmas_list->SCGST->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_SCGST" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SCGST" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->SCGST->EditValue ?>"<?php echo $pharmacy_batchmas_list->SCGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_SCGST">
<span<?php echo $pharmacy_batchmas_list->SCGST->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->SCGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->RT->Visible) { // RT ?>
		<td data-name="RT" <?php echo $pharmacy_batchmas_list->RT->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_RT" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RT" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->RT->EditValue ?>"<?php echo $pharmacy_batchmas_list->RT->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_RT" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_batchmas_list->RT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_RT" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RT" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->RT->EditValue ?>"<?php echo $pharmacy_batchmas_list->RT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_RT">
<span<?php echo $pharmacy_batchmas_list->RT->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->RT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $pharmacy_batchmas_list->BRCODE->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_BRCODE" class="form-group">
<div class="btn-group ew-dropdown-list" role="group">
	<div class="btn-group" role="group">
		<button type="button" class="btn form-control dropdown-toggle ew-dropdown-toggle" aria-haspopup="true" aria-expanded="false"<?php if ($pharmacy_batchmas_list->BRCODE->ReadOnly) { ?> readonly<?php } else { ?>data-toggle="dropdown"<?php } ?>><?php echo $pharmacy_batchmas_list->BRCODE->ViewValue ?></button>
		<div id="dsl_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" data-repeatcolumn="1" class="dropdown-menu">
			<div class="ew-items" style="overflow-x: hidden;">
<?php echo $pharmacy_batchmas_list->BRCODE->radioButtonListHtml(TRUE, "x{$pharmacy_batchmas_list->RowIndex}_BRCODE") ?>
			</div><!-- /.ew-items -->
		</div><!-- /.dropdown-menu -->
		<div id="tp_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" class="ew-template"><input type="radio" class="custom-control-input" data-table="pharmacy_batchmas" data-field="x_BRCODE" data-value-separator="<?php echo $pharmacy_batchmas_list->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" value="{value}"<?php echo $pharmacy_batchmas_list->BRCODE->editAttributes() ?>></div>
	</div><!-- /.btn-group -->
	<?php if (!$pharmacy_batchmas_list->BRCODE->ReadOnly) { ?>
	<button type="button" class="btn btn-default ew-dropdown-clear" disabled>
		<i class="fas fa-times ew-icon"></i>
	</button>
	<?php } ?>
</div><!-- /.ew-dropdown-list -->
<?php echo $pharmacy_batchmas_list->BRCODE->Lookup->getParamTag($pharmacy_batchmas_list, "p_x" . $pharmacy_batchmas_list->RowIndex . "_BRCODE") ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_BRCODE" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_batchmas_list->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_BRCODE" class="form-group">
<div class="btn-group ew-dropdown-list" role="group">
	<div class="btn-group" role="group">
		<button type="button" class="btn form-control dropdown-toggle ew-dropdown-toggle" aria-haspopup="true" aria-expanded="false"<?php if ($pharmacy_batchmas_list->BRCODE->ReadOnly) { ?> readonly<?php } else { ?>data-toggle="dropdown"<?php } ?>><?php echo $pharmacy_batchmas_list->BRCODE->ViewValue ?></button>
		<div id="dsl_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" data-repeatcolumn="1" class="dropdown-menu">
			<div class="ew-items" style="overflow-x: hidden;">
<?php echo $pharmacy_batchmas_list->BRCODE->radioButtonListHtml(TRUE, "x{$pharmacy_batchmas_list->RowIndex}_BRCODE") ?>
			</div><!-- /.ew-items -->
		</div><!-- /.dropdown-menu -->
		<div id="tp_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" class="ew-template"><input type="radio" class="custom-control-input" data-table="pharmacy_batchmas" data-field="x_BRCODE" data-value-separator="<?php echo $pharmacy_batchmas_list->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" value="{value}"<?php echo $pharmacy_batchmas_list->BRCODE->editAttributes() ?>></div>
	</div><!-- /.btn-group -->
	<?php if (!$pharmacy_batchmas_list->BRCODE->ReadOnly) { ?>
	<button type="button" class="btn btn-default ew-dropdown-clear" disabled>
		<i class="fas fa-times ew-icon"></i>
	</button>
	<?php } ?>
</div><!-- /.ew-dropdown-list -->
<?php echo $pharmacy_batchmas_list->BRCODE->Lookup->getParamTag($pharmacy_batchmas_list, "p_x" . $pharmacy_batchmas_list->RowIndex . "_BRCODE") ?>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_BRCODE">
<span<?php echo $pharmacy_batchmas_list->BRCODE->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $pharmacy_batchmas_list->HospID->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_HospID" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_HospID" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->HospID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->HospID->EditValue ?>"<?php echo $pharmacy_batchmas_list->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_HospID" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_batchmas_list->HospID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_HospID" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_HospID" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->HospID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->HospID->EditValue ?>"<?php echo $pharmacy_batchmas_list->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_HospID">
<span<?php echo $pharmacy_batchmas_list->HospID->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->UM->Visible) { // UM ?>
		<td data-name="UM" <?php echo $pharmacy_batchmas_list->UM->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_UM" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UM" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->UM->EditValue ?>"<?php echo $pharmacy_batchmas_list->UM->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_UM" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" value="<?php echo HtmlEncode($pharmacy_batchmas_list->UM->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_UM" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UM" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->UM->EditValue ?>"<?php echo $pharmacy_batchmas_list->UM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_UM">
<span<?php echo $pharmacy_batchmas_list->UM->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->UM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME" <?php echo $pharmacy_batchmas_list->GENNAME->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_GENNAME" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->GENNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->GENNAME->EditValue ?>"<?php echo $pharmacy_batchmas_list->GENNAME->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" value="<?php echo HtmlEncode($pharmacy_batchmas_list->GENNAME->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_GENNAME" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->GENNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->GENNAME->EditValue ?>"<?php echo $pharmacy_batchmas_list->GENNAME->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_GENNAME">
<span<?php echo $pharmacy_batchmas_list->GENNAME->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->GENNAME->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->BILLDATE->Visible) { // BILLDATE ?>
		<td data-name="BILLDATE" <?php echo $pharmacy_batchmas_list->BILLDATE->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_BILLDATE" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->BILLDATE->EditValue ?>"<?php echo $pharmacy_batchmas_list->BILLDATE->editAttributes() ?>>
<?php if (!$pharmacy_batchmas_list->BILLDATE->ReadOnly && !$pharmacy_batchmas_list->BILLDATE->Disabled && !isset($pharmacy_batchmas_list->BILLDATE->EditAttrs["readonly"]) && !isset($pharmacy_batchmas_list->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmaslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_batchmaslist", "x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" value="<?php echo HtmlEncode($pharmacy_batchmas_list->BILLDATE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_BILLDATE" class="form-group">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->BILLDATE->EditValue ?>"<?php echo $pharmacy_batchmas_list->BILLDATE->editAttributes() ?>>
<?php if (!$pharmacy_batchmas_list->BILLDATE->ReadOnly && !$pharmacy_batchmas_list->BILLDATE->Disabled && !isset($pharmacy_batchmas_list->BILLDATE->EditAttrs["readonly"]) && !isset($pharmacy_batchmas_list->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmaslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_batchmaslist", "x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCount ?>_pharmacy_batchmas_BILLDATE">
<span<?php echo $pharmacy_batchmas_list->BILLDATE->viewAttributes() ?>><?php echo $pharmacy_batchmas_list->BILLDATE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_batchmas_list->ListOptions->render("body", "right", $pharmacy_batchmas_list->RowCount);
?>
	</tr>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD || $pharmacy_batchmas->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpharmacy_batchmaslist", "load"], function() {
	fpharmacy_batchmaslist.updateLists(<?php echo $pharmacy_batchmas_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_batchmas_list->isGridAdd())
		if (!$pharmacy_batchmas_list->Recordset->EOF)
			$pharmacy_batchmas_list->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_batchmas_list->isGridAdd() || $pharmacy_batchmas_list->isGridEdit()) {
		$pharmacy_batchmas_list->RowIndex = '$rowindex$';
		$pharmacy_batchmas_list->loadRowValues();

		// Set row properties
		$pharmacy_batchmas->resetAttributes();
		$pharmacy_batchmas->RowAttrs->merge(["data-rowindex" => $pharmacy_batchmas_list->RowIndex, "id" => "r0_pharmacy_batchmas", "data-rowtype" => ROWTYPE_ADD]);
		$pharmacy_batchmas->RowAttrs->appendClass("ew-template");
		$pharmacy_batchmas->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_batchmas_list->renderRow();

		// Render list options
		$pharmacy_batchmas_list->renderListOptions();
		$pharmacy_batchmas_list->StartRowCount = 0;
?>
	<tr <?php echo $pharmacy_batchmas->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_batchmas_list->ListOptions->render("body", "left", $pharmacy_batchmas_list->RowIndex);
?>
	<?php if ($pharmacy_batchmas_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<span id="el$rowindex$_pharmacy_batchmas_PRC" class="form-group pharmacy_batchmas_PRC">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRC" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->PRC->EditValue ?>"<?php echo $pharmacy_batchmas_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PRC" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_batchmas_list->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<span id="el$rowindex$_pharmacy_batchmas_PrName" class="form-group pharmacy_batchmas_PrName">
<?php
$onchange = $pharmacy_batchmas_list->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_batchmas_list->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" id="sv_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" value="<?php echo RemoveHtml($pharmacy_batchmas_list->PrName->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_batchmas_list->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_batchmas_list->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_batchmas_list->PrName->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_batchmaslist"], function() {
	fpharmacy_batchmaslist.createAutoSuggest({"id":"x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName","forceSelect":true});
});
</script>
<?php echo $pharmacy_batchmas_list->PrName->Lookup->getParamTag($pharmacy_batchmas_list, "p_x" . $pharmacy_batchmas_list->RowIndex . "_PrName") ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_batchmas_list->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO">
<span id="el$rowindex$_pharmacy_batchmas_BATCHNO" class="form-group pharmacy_batchmas_BATCHNO">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->BATCHNO->EditValue ?>"<?php echo $pharmacy_batchmas_list->BATCHNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_batchmas_list->BATCHNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE">
<span id="el$rowindex$_pharmacy_batchmas_MFRCODE" class="form-group pharmacy_batchmas_MFRCODE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->MFRCODE->EditValue ?>"<?php echo $pharmacy_batchmas_list->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($pharmacy_batchmas_list->MFRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT">
<span id="el$rowindex$_pharmacy_batchmas_EXPDT" class="form-group pharmacy_batchmas_EXPDT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->EXPDT->EditValue ?>"<?php echo $pharmacy_batchmas_list->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_batchmas_list->EXPDT->ReadOnly && !$pharmacy_batchmas_list->EXPDT->Disabled && !isset($pharmacy_batchmas_list->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_batchmas_list->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmaslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_batchmaslist", "x<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_batchmas_list->EXPDT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->PRCODE->Visible) { // PRCODE ?>
		<td data-name="PRCODE">
<span id="el$rowindex$_pharmacy_batchmas_PRCODE" class="form-group pharmacy_batchmas_PRCODE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->PRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->PRCODE->EditValue ?>"<?php echo $pharmacy_batchmas_list->PRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" value="<?php echo HtmlEncode($pharmacy_batchmas_list->PRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->OQ->Visible) { // OQ ?>
		<td data-name="OQ">
<span id="el$rowindex$_pharmacy_batchmas_OQ" class="form-group pharmacy_batchmas_OQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->OQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->OQ->EditValue ?>"<?php echo $pharmacy_batchmas_list->OQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_OQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" value="<?php echo HtmlEncode($pharmacy_batchmas_list->OQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->RQ->Visible) { // RQ ?>
		<td data-name="RQ">
<span id="el$rowindex$_pharmacy_batchmas_RQ" class="form-group pharmacy_batchmas_RQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->RQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->RQ->EditValue ?>"<?php echo $pharmacy_batchmas_list->RQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_RQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" value="<?php echo HtmlEncode($pharmacy_batchmas_list->RQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->FRQ->Visible) { // FRQ ?>
		<td data-name="FRQ">
<span id="el$rowindex$_pharmacy_batchmas_FRQ" class="form-group pharmacy_batchmas_FRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_FRQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->FRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->FRQ->EditValue ?>"<?php echo $pharmacy_batchmas_list->FRQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_FRQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" value="<?php echo HtmlEncode($pharmacy_batchmas_list->FRQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->IQ->Visible) { // IQ ?>
		<td data-name="IQ">
<span id="el$rowindex$_pharmacy_batchmas_IQ" class="form-group pharmacy_batchmas_IQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_IQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->IQ->EditValue ?>"<?php echo $pharmacy_batchmas_list->IQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_IQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_batchmas_list->IQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ">
<span id="el$rowindex$_pharmacy_batchmas_MRQ" class="form-group pharmacy_batchmas_MRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->MRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->MRQ->EditValue ?>"<?php echo $pharmacy_batchmas_list->MRQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_MRQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($pharmacy_batchmas_list->MRQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->MRP->Visible) { // MRP ?>
		<td data-name="MRP">
<span id="el$rowindex$_pharmacy_batchmas_MRP" class="form-group pharmacy_batchmas_MRP">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRP" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->MRP->EditValue ?>"<?php echo $pharmacy_batchmas_list->MRP->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_MRP" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" value="<?php echo HtmlEncode($pharmacy_batchmas_list->MRP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->UR->Visible) { // UR ?>
		<td data-name="UR">
<span id="el$rowindex$_pharmacy_batchmas_UR" class="form-group pharmacy_batchmas_UR">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UR" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->UR->EditValue ?>"<?php echo $pharmacy_batchmas_list->UR->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_UR" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_batchmas_list->UR->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST">
<span id="el$rowindex$_pharmacy_batchmas_SSGST" class="form-group pharmacy_batchmas_SSGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SSGST" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->SSGST->EditValue ?>"<?php echo $pharmacy_batchmas_list->SSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_SSGST" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($pharmacy_batchmas_list->SSGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST">
<span id="el$rowindex$_pharmacy_batchmas_SCGST" class="form-group pharmacy_batchmas_SCGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SCGST" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->SCGST->EditValue ?>"<?php echo $pharmacy_batchmas_list->SCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_SCGST" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($pharmacy_batchmas_list->SCGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->RT->Visible) { // RT ?>
		<td data-name="RT">
<span id="el$rowindex$_pharmacy_batchmas_RT" class="form-group pharmacy_batchmas_RT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RT" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->RT->EditValue ?>"<?php echo $pharmacy_batchmas_list->RT->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_RT" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_batchmas_list->RT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<span id="el$rowindex$_pharmacy_batchmas_BRCODE" class="form-group pharmacy_batchmas_BRCODE">
<div class="btn-group ew-dropdown-list" role="group">
	<div class="btn-group" role="group">
		<button type="button" class="btn form-control dropdown-toggle ew-dropdown-toggle" aria-haspopup="true" aria-expanded="false"<?php if ($pharmacy_batchmas_list->BRCODE->ReadOnly) { ?> readonly<?php } else { ?>data-toggle="dropdown"<?php } ?>><?php echo $pharmacy_batchmas_list->BRCODE->ViewValue ?></button>
		<div id="dsl_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" data-repeatcolumn="1" class="dropdown-menu">
			<div class="ew-items" style="overflow-x: hidden;">
<?php echo $pharmacy_batchmas_list->BRCODE->radioButtonListHtml(TRUE, "x{$pharmacy_batchmas_list->RowIndex}_BRCODE") ?>
			</div><!-- /.ew-items -->
		</div><!-- /.dropdown-menu -->
		<div id="tp_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" class="ew-template"><input type="radio" class="custom-control-input" data-table="pharmacy_batchmas" data-field="x_BRCODE" data-value-separator="<?php echo $pharmacy_batchmas_list->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" value="{value}"<?php echo $pharmacy_batchmas_list->BRCODE->editAttributes() ?>></div>
	</div><!-- /.btn-group -->
	<?php if (!$pharmacy_batchmas_list->BRCODE->ReadOnly) { ?>
	<button type="button" class="btn btn-default ew-dropdown-clear" disabled>
		<i class="fas fa-times ew-icon"></i>
	</button>
	<?php } ?>
</div><!-- /.ew-dropdown-list -->
<?php echo $pharmacy_batchmas_list->BRCODE->Lookup->getParamTag($pharmacy_batchmas_list, "p_x" . $pharmacy_batchmas_list->RowIndex . "_BRCODE") ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_BRCODE" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_batchmas_list->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<span id="el$rowindex$_pharmacy_batchmas_HospID" class="form-group pharmacy_batchmas_HospID">
<input type="text" data-table="pharmacy_batchmas" data-field="x_HospID" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->HospID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->HospID->EditValue ?>"<?php echo $pharmacy_batchmas_list->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_HospID" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_batchmas_list->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->UM->Visible) { // UM ?>
		<td data-name="UM">
<span id="el$rowindex$_pharmacy_batchmas_UM" class="form-group pharmacy_batchmas_UM">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UM" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->UM->EditValue ?>"<?php echo $pharmacy_batchmas_list->UM->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_UM" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" value="<?php echo HtmlEncode($pharmacy_batchmas_list->UM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME">
<span id="el$rowindex$_pharmacy_batchmas_GENNAME" class="form-group pharmacy_batchmas_GENNAME">
<input type="text" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->GENNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->GENNAME->EditValue ?>"<?php echo $pharmacy_batchmas_list->GENNAME->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" value="<?php echo HtmlEncode($pharmacy_batchmas_list->GENNAME->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->BILLDATE->Visible) { // BILLDATE ?>
		<td data-name="BILLDATE">
<span id="el$rowindex$_pharmacy_batchmas_BILLDATE" class="form-group pharmacy_batchmas_BILLDATE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_list->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_list->BILLDATE->EditValue ?>"<?php echo $pharmacy_batchmas_list->BILLDATE->editAttributes() ?>>
<?php if (!$pharmacy_batchmas_list->BILLDATE->ReadOnly && !$pharmacy_batchmas_list->BILLDATE->Disabled && !isset($pharmacy_batchmas_list->BILLDATE->EditAttrs["readonly"]) && !isset($pharmacy_batchmas_list->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmaslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_batchmaslist", "x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" value="<?php echo HtmlEncode($pharmacy_batchmas_list->BILLDATE->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_batchmas_list->ListOptions->render("body", "right", $pharmacy_batchmas_list->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_batchmaslist", "load"], function() {
	fpharmacy_batchmaslist.updateLists(<?php echo $pharmacy_batchmas_list->RowIndex ?>);
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
<?php if ($pharmacy_batchmas_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $pharmacy_batchmas_list->FormKeyCountName ?>" id="<?php echo $pharmacy_batchmas_list->FormKeyCountName ?>" value="<?php echo $pharmacy_batchmas_list->KeyCount ?>">
<?php echo $pharmacy_batchmas_list->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $pharmacy_batchmas_list->FormKeyCountName ?>" id="<?php echo $pharmacy_batchmas_list->FormKeyCountName ?>" value="<?php echo $pharmacy_batchmas_list->KeyCount ?>">
<?php echo $pharmacy_batchmas_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$pharmacy_batchmas->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_batchmas_list->Recordset)
	$pharmacy_batchmas_list->Recordset->Close();
?>
<?php if (!$pharmacy_batchmas_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_batchmas_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_batchmas_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_batchmas_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_batchmas_list->TotalRecords == 0 && !$pharmacy_batchmas->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_batchmas_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_batchmas_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_batchmas_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// document.write("page loaded");

	</script>
	<style>
	.input-group {
		position: relative;
		display: flex;
		flex-wrap: nowrap;
		align-items: stretch;
		width: 80%;
	}
	.form-control {
		width: 100%;
		flex-grow: 0;
	}
	.input-group>.form-control {
		width: 100%;
		flex-grow: 0;
	}
	</style>
	<script>
});
</script>
<?php if (!$pharmacy_batchmas->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_batchmas",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_batchmas_list->terminate();
?>