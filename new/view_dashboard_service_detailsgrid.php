<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_dashboard_service_details_grid))
	$view_dashboard_service_details_grid = new view_dashboard_service_details_grid();

// Run the page
$view_dashboard_service_details_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_service_details_grid->Page_Render();
?>
<?php if (!$view_dashboard_service_details_grid->isExport()) { ?>
<script>
var fview_dashboard_service_detailsgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fview_dashboard_service_detailsgrid = new ew.Form("fview_dashboard_service_detailsgrid", "grid");
	fview_dashboard_service_detailsgrid.formKeyCountName = '<?php echo $view_dashboard_service_details_grid->FormKeyCountName ?>';

	// Validate form
	fview_dashboard_service_detailsgrid.validate = function() {
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
			<?php if ($view_dashboard_service_details_grid->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details_grid->PatientId->caption(), $view_dashboard_service_details_grid->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_service_details_grid->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details_grid->PatientName->caption(), $view_dashboard_service_details_grid->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_service_details_grid->Services->Required) { ?>
				elm = this.getElements("x" + infix + "_Services");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details_grid->Services->caption(), $view_dashboard_service_details_grid->Services->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_service_details_grid->amount->Required) { ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details_grid->amount->caption(), $view_dashboard_service_details_grid->amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details_grid->amount->errorMessage()) ?>");
			<?php if ($view_dashboard_service_details_grid->SubTotal->Required) { ?>
				elm = this.getElements("x" + infix + "_SubTotal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details_grid->SubTotal->caption(), $view_dashboard_service_details_grid->SubTotal->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SubTotal");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details_grid->SubTotal->errorMessage()) ?>");
			<?php if ($view_dashboard_service_details_grid->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details_grid->createdby->caption(), $view_dashboard_service_details_grid->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_service_details_grid->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details_grid->createddatetime->caption(), $view_dashboard_service_details_grid->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details_grid->createddatetime->errorMessage()) ?>");
			<?php if ($view_dashboard_service_details_grid->createdDate->Required) { ?>
				elm = this.getElements("x" + infix + "_createdDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details_grid->createdDate->caption(), $view_dashboard_service_details_grid->createdDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createdDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details_grid->createdDate->errorMessage()) ?>");
			<?php if ($view_dashboard_service_details_grid->DrName->Required) { ?>
				elm = this.getElements("x" + infix + "_DrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details_grid->DrName->caption(), $view_dashboard_service_details_grid->DrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_service_details_grid->DRDepartment->Required) { ?>
				elm = this.getElements("x" + infix + "_DRDepartment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details_grid->DRDepartment->caption(), $view_dashboard_service_details_grid->DRDepartment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_service_details_grid->ItemCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ItemCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details_grid->ItemCode->caption(), $view_dashboard_service_details_grid->ItemCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_service_details_grid->DEptCd->Required) { ?>
				elm = this.getElements("x" + infix + "_DEptCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details_grid->DEptCd->caption(), $view_dashboard_service_details_grid->DEptCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_service_details_grid->CODE->Required) { ?>
				elm = this.getElements("x" + infix + "_CODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details_grid->CODE->caption(), $view_dashboard_service_details_grid->CODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_service_details_grid->SERVICE->Required) { ?>
				elm = this.getElements("x" + infix + "_SERVICE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details_grid->SERVICE->caption(), $view_dashboard_service_details_grid->SERVICE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_service_details_grid->SERVICE_TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_SERVICE_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details_grid->SERVICE_TYPE->caption(), $view_dashboard_service_details_grid->SERVICE_TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_service_details_grid->DEPARTMENT->Required) { ?>
				elm = this.getElements("x" + infix + "_DEPARTMENT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details_grid->DEPARTMENT->caption(), $view_dashboard_service_details_grid->DEPARTMENT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_service_details_grid->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details_grid->HospID->caption(), $view_dashboard_service_details_grid->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details_grid->HospID->errorMessage()) ?>");
			<?php if ($view_dashboard_service_details_grid->vid->Required) { ?>
				elm = this.getElements("x" + infix + "_vid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details_grid->vid->caption(), $view_dashboard_service_details_grid->vid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_vid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details_grid->vid->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fview_dashboard_service_detailsgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
		if (ew.valueChanged(fobj, infix, "Services", false)) return false;
		if (ew.valueChanged(fobj, infix, "amount", false)) return false;
		if (ew.valueChanged(fobj, infix, "SubTotal", false)) return false;
		if (ew.valueChanged(fobj, infix, "createdby", false)) return false;
		if (ew.valueChanged(fobj, infix, "createddatetime", false)) return false;
		if (ew.valueChanged(fobj, infix, "createdDate", false)) return false;
		if (ew.valueChanged(fobj, infix, "DrName", false)) return false;
		if (ew.valueChanged(fobj, infix, "DRDepartment", false)) return false;
		if (ew.valueChanged(fobj, infix, "ItemCode", false)) return false;
		if (ew.valueChanged(fobj, infix, "DEptCd", false)) return false;
		if (ew.valueChanged(fobj, infix, "CODE", false)) return false;
		if (ew.valueChanged(fobj, infix, "SERVICE", false)) return false;
		if (ew.valueChanged(fobj, infix, "SERVICE_TYPE", false)) return false;
		if (ew.valueChanged(fobj, infix, "DEPARTMENT", false)) return false;
		if (ew.valueChanged(fobj, infix, "HospID", false)) return false;
		if (ew.valueChanged(fobj, infix, "vid", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fview_dashboard_service_detailsgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_dashboard_service_detailsgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_dashboard_service_detailsgrid.lists["x_HospID"] = <?php echo $view_dashboard_service_details_grid->HospID->Lookup->toClientList($view_dashboard_service_details_grid) ?>;
	fview_dashboard_service_detailsgrid.lists["x_HospID"].options = <?php echo JsonEncode($view_dashboard_service_details_grid->HospID->lookupOptions()) ?>;
	fview_dashboard_service_detailsgrid.autoSuggests["x_HospID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fview_dashboard_service_detailsgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$view_dashboard_service_details_grid->renderOtherOptions();
?>
<?php if ($view_dashboard_service_details_grid->TotalRecords > 0 || $view_dashboard_service_details->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_dashboard_service_details_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_service_details">
<?php if ($view_dashboard_service_details_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_dashboard_service_details_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_dashboard_service_detailsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_dashboard_service_details" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_dashboard_service_detailsgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_dashboard_service_details->RowType = ROWTYPE_HEADER;

// Render list options
$view_dashboard_service_details_grid->renderListOptions();

// Render list options (header, left)
$view_dashboard_service_details_grid->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_service_details_grid->PatientId->Visible) { // PatientId ?>
	<?php if ($view_dashboard_service_details_grid->SortUrl($view_dashboard_service_details_grid->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_dashboard_service_details_grid->PatientId->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_PatientId" class="view_dashboard_service_details_PatientId"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_dashboard_service_details_grid->PatientId->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_PatientId" class="view_dashboard_service_details_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_grid->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_grid->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_grid->PatientName->Visible) { // PatientName ?>
	<?php if ($view_dashboard_service_details_grid->SortUrl($view_dashboard_service_details_grid->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_dashboard_service_details_grid->PatientName->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_PatientName" class="view_dashboard_service_details_PatientName"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_dashboard_service_details_grid->PatientName->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_PatientName" class="view_dashboard_service_details_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_grid->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_grid->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_grid->Services->Visible) { // Services ?>
	<?php if ($view_dashboard_service_details_grid->SortUrl($view_dashboard_service_details_grid->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $view_dashboard_service_details_grid->Services->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_Services" class="view_dashboard_service_details_Services"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $view_dashboard_service_details_grid->Services->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_Services" class="view_dashboard_service_details_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->Services->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_grid->Services->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_grid->Services->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_grid->amount->Visible) { // amount ?>
	<?php if ($view_dashboard_service_details_grid->SortUrl($view_dashboard_service_details_grid->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $view_dashboard_service_details_grid->amount->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_amount" class="view_dashboard_service_details_amount"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $view_dashboard_service_details_grid->amount->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_amount" class="view_dashboard_service_details_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_grid->amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_grid->amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_grid->SubTotal->Visible) { // SubTotal ?>
	<?php if ($view_dashboard_service_details_grid->SortUrl($view_dashboard_service_details_grid->SubTotal) == "") { ?>
		<th data-name="SubTotal" class="<?php echo $view_dashboard_service_details_grid->SubTotal->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_SubTotal" class="view_dashboard_service_details_SubTotal"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->SubTotal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubTotal" class="<?php echo $view_dashboard_service_details_grid->SubTotal->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_SubTotal" class="view_dashboard_service_details_SubTotal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_grid->SubTotal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_grid->SubTotal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_grid->createdby->Visible) { // createdby ?>
	<?php if ($view_dashboard_service_details_grid->SortUrl($view_dashboard_service_details_grid->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_dashboard_service_details_grid->createdby->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_createdby" class="view_dashboard_service_details_createdby"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_dashboard_service_details_grid->createdby->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_createdby" class="view_dashboard_service_details_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_grid->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_grid->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_grid->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_dashboard_service_details_grid->SortUrl($view_dashboard_service_details_grid->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_dashboard_service_details_grid->createddatetime->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_createddatetime" class="view_dashboard_service_details_createddatetime"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_dashboard_service_details_grid->createddatetime->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_createddatetime" class="view_dashboard_service_details_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_grid->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_grid->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_grid->createdDate->Visible) { // createdDate ?>
	<?php if ($view_dashboard_service_details_grid->SortUrl($view_dashboard_service_details_grid->createdDate) == "") { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_service_details_grid->createdDate->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_createdDate" class="view_dashboard_service_details_createdDate"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->createdDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_service_details_grid->createdDate->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_createdDate" class="view_dashboard_service_details_createdDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->createdDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_grid->createdDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_grid->createdDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_grid->DrName->Visible) { // DrName ?>
	<?php if ($view_dashboard_service_details_grid->SortUrl($view_dashboard_service_details_grid->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $view_dashboard_service_details_grid->DrName->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DrName" class="view_dashboard_service_details_DrName"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $view_dashboard_service_details_grid->DrName->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_DrName" class="view_dashboard_service_details_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_grid->DrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_grid->DrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_grid->DRDepartment->Visible) { // DRDepartment ?>
	<?php if ($view_dashboard_service_details_grid->SortUrl($view_dashboard_service_details_grid->DRDepartment) == "") { ?>
		<th data-name="DRDepartment" class="<?php echo $view_dashboard_service_details_grid->DRDepartment->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DRDepartment" class="view_dashboard_service_details_DRDepartment"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->DRDepartment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DRDepartment" class="<?php echo $view_dashboard_service_details_grid->DRDepartment->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_DRDepartment" class="view_dashboard_service_details_DRDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->DRDepartment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_grid->DRDepartment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_grid->DRDepartment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_grid->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_dashboard_service_details_grid->SortUrl($view_dashboard_service_details_grid->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $view_dashboard_service_details_grid->ItemCode->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_ItemCode" class="view_dashboard_service_details_ItemCode"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $view_dashboard_service_details_grid->ItemCode->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_ItemCode" class="view_dashboard_service_details_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->ItemCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_grid->ItemCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_grid->ItemCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_grid->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_dashboard_service_details_grid->SortUrl($view_dashboard_service_details_grid->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $view_dashboard_service_details_grid->DEptCd->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DEptCd" class="view_dashboard_service_details_DEptCd"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $view_dashboard_service_details_grid->DEptCd->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_DEptCd" class="view_dashboard_service_details_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->DEptCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_grid->DEptCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_grid->DEptCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_grid->CODE->Visible) { // CODE ?>
	<?php if ($view_dashboard_service_details_grid->SortUrl($view_dashboard_service_details_grid->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $view_dashboard_service_details_grid->CODE->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_CODE" class="view_dashboard_service_details_CODE"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $view_dashboard_service_details_grid->CODE->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_CODE" class="view_dashboard_service_details_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->CODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_grid->CODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_grid->CODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_grid->SERVICE->Visible) { // SERVICE ?>
	<?php if ($view_dashboard_service_details_grid->SortUrl($view_dashboard_service_details_grid->SERVICE) == "") { ?>
		<th data-name="SERVICE" class="<?php echo $view_dashboard_service_details_grid->SERVICE->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_SERVICE" class="view_dashboard_service_details_SERVICE"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->SERVICE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE" class="<?php echo $view_dashboard_service_details_grid->SERVICE->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_SERVICE" class="view_dashboard_service_details_SERVICE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->SERVICE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_grid->SERVICE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_grid->SERVICE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_grid->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<?php if ($view_dashboard_service_details_grid->SortUrl($view_dashboard_service_details_grid->SERVICE_TYPE) == "") { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $view_dashboard_service_details_grid->SERVICE_TYPE->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_SERVICE_TYPE" class="view_dashboard_service_details_SERVICE_TYPE"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->SERVICE_TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $view_dashboard_service_details_grid->SERVICE_TYPE->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_SERVICE_TYPE" class="view_dashboard_service_details_SERVICE_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->SERVICE_TYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_grid->SERVICE_TYPE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_grid->SERVICE_TYPE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_grid->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($view_dashboard_service_details_grid->SortUrl($view_dashboard_service_details_grid->DEPARTMENT) == "") { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_details_grid->DEPARTMENT->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DEPARTMENT" class="view_dashboard_service_details_DEPARTMENT"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->DEPARTMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_details_grid->DEPARTMENT->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_DEPARTMENT" class="view_dashboard_service_details_DEPARTMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->DEPARTMENT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_grid->DEPARTMENT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_grid->DEPARTMENT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_grid->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_service_details_grid->SortUrl($view_dashboard_service_details_grid->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_service_details_grid->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_HospID" class="view_dashboard_service_details_HospID"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_service_details_grid->HospID->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_HospID" class="view_dashboard_service_details_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_grid->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_grid->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_grid->vid->Visible) { // vid ?>
	<?php if ($view_dashboard_service_details_grid->SortUrl($view_dashboard_service_details_grid->vid) == "") { ?>
		<th data-name="vid" class="<?php echo $view_dashboard_service_details_grid->vid->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_vid" class="view_dashboard_service_details_vid"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vid" class="<?php echo $view_dashboard_service_details_grid->vid->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_vid" class="view_dashboard_service_details_vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_grid->vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_grid->vid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_grid->vid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_service_details_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_dashboard_service_details_grid->StartRecord = 1;
$view_dashboard_service_details_grid->StopRecord = $view_dashboard_service_details_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($view_dashboard_service_details->isConfirm() || $view_dashboard_service_details_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_dashboard_service_details_grid->FormKeyCountName) && ($view_dashboard_service_details_grid->isGridAdd() || $view_dashboard_service_details_grid->isGridEdit() || $view_dashboard_service_details->isConfirm())) {
		$view_dashboard_service_details_grid->KeyCount = $CurrentForm->getValue($view_dashboard_service_details_grid->FormKeyCountName);
		$view_dashboard_service_details_grid->StopRecord = $view_dashboard_service_details_grid->StartRecord + $view_dashboard_service_details_grid->KeyCount - 1;
	}
}
$view_dashboard_service_details_grid->RecordCount = $view_dashboard_service_details_grid->StartRecord - 1;
if ($view_dashboard_service_details_grid->Recordset && !$view_dashboard_service_details_grid->Recordset->EOF) {
	$view_dashboard_service_details_grid->Recordset->moveFirst();
	$selectLimit = $view_dashboard_service_details_grid->UseSelectLimit;
	if (!$selectLimit && $view_dashboard_service_details_grid->StartRecord > 1)
		$view_dashboard_service_details_grid->Recordset->move($view_dashboard_service_details_grid->StartRecord - 1);
} elseif (!$view_dashboard_service_details->AllowAddDeleteRow && $view_dashboard_service_details_grid->StopRecord == 0) {
	$view_dashboard_service_details_grid->StopRecord = $view_dashboard_service_details->GridAddRowCount;
}

// Initialize aggregate
$view_dashboard_service_details->RowType = ROWTYPE_AGGREGATEINIT;
$view_dashboard_service_details->resetAttributes();
$view_dashboard_service_details_grid->renderRow();
if ($view_dashboard_service_details_grid->isGridAdd())
	$view_dashboard_service_details_grid->RowIndex = 0;
if ($view_dashboard_service_details_grid->isGridEdit())
	$view_dashboard_service_details_grid->RowIndex = 0;
while ($view_dashboard_service_details_grid->RecordCount < $view_dashboard_service_details_grid->StopRecord) {
	$view_dashboard_service_details_grid->RecordCount++;
	if ($view_dashboard_service_details_grid->RecordCount >= $view_dashboard_service_details_grid->StartRecord) {
		$view_dashboard_service_details_grid->RowCount++;
		if ($view_dashboard_service_details_grid->isGridAdd() || $view_dashboard_service_details_grid->isGridEdit() || $view_dashboard_service_details->isConfirm()) {
			$view_dashboard_service_details_grid->RowIndex++;
			$CurrentForm->Index = $view_dashboard_service_details_grid->RowIndex;
			if ($CurrentForm->hasValue($view_dashboard_service_details_grid->FormActionName) && ($view_dashboard_service_details->isConfirm() || $view_dashboard_service_details_grid->EventCancelled))
				$view_dashboard_service_details_grid->RowAction = strval($CurrentForm->getValue($view_dashboard_service_details_grid->FormActionName));
			elseif ($view_dashboard_service_details_grid->isGridAdd())
				$view_dashboard_service_details_grid->RowAction = "insert";
			else
				$view_dashboard_service_details_grid->RowAction = "";
		}

		// Set up key count
		$view_dashboard_service_details_grid->KeyCount = $view_dashboard_service_details_grid->RowIndex;

		// Init row class and style
		$view_dashboard_service_details->resetAttributes();
		$view_dashboard_service_details->CssClass = "";
		if ($view_dashboard_service_details_grid->isGridAdd()) {
			if ($view_dashboard_service_details->CurrentMode == "copy") {
				$view_dashboard_service_details_grid->loadRowValues($view_dashboard_service_details_grid->Recordset); // Load row values
				$view_dashboard_service_details_grid->setRecordKey($view_dashboard_service_details_grid->RowOldKey, $view_dashboard_service_details_grid->Recordset); // Set old record key
			} else {
				$view_dashboard_service_details_grid->loadRowValues(); // Load default values
				$view_dashboard_service_details_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_dashboard_service_details_grid->loadRowValues($view_dashboard_service_details_grid->Recordset); // Load row values
		}
		$view_dashboard_service_details->RowType = ROWTYPE_VIEW; // Render view
		if ($view_dashboard_service_details_grid->isGridAdd()) // Grid add
			$view_dashboard_service_details->RowType = ROWTYPE_ADD; // Render add
		if ($view_dashboard_service_details_grid->isGridAdd() && $view_dashboard_service_details->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_dashboard_service_details_grid->restoreCurrentRowFormValues($view_dashboard_service_details_grid->RowIndex); // Restore form values
		if ($view_dashboard_service_details_grid->isGridEdit()) { // Grid edit
			if ($view_dashboard_service_details->EventCancelled)
				$view_dashboard_service_details_grid->restoreCurrentRowFormValues($view_dashboard_service_details_grid->RowIndex); // Restore form values
			if ($view_dashboard_service_details_grid->RowAction == "insert")
				$view_dashboard_service_details->RowType = ROWTYPE_ADD; // Render add
			else
				$view_dashboard_service_details->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_dashboard_service_details_grid->isGridEdit() && ($view_dashboard_service_details->RowType == ROWTYPE_EDIT || $view_dashboard_service_details->RowType == ROWTYPE_ADD) && $view_dashboard_service_details->EventCancelled) // Update failed
			$view_dashboard_service_details_grid->restoreCurrentRowFormValues($view_dashboard_service_details_grid->RowIndex); // Restore form values
		if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) // Edit row
			$view_dashboard_service_details_grid->EditRowCount++;
		if ($view_dashboard_service_details->isConfirm()) // Confirm row
			$view_dashboard_service_details_grid->restoreCurrentRowFormValues($view_dashboard_service_details_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_dashboard_service_details->RowAttrs->merge(["data-rowindex" => $view_dashboard_service_details_grid->RowCount, "id" => "r" . $view_dashboard_service_details_grid->RowCount . "_view_dashboard_service_details", "data-rowtype" => $view_dashboard_service_details->RowType]);

		// Render row
		$view_dashboard_service_details_grid->renderRow();

		// Render list options
		$view_dashboard_service_details_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_dashboard_service_details_grid->RowAction != "delete" && $view_dashboard_service_details_grid->RowAction != "insertdelete" && !($view_dashboard_service_details_grid->RowAction == "insert" && $view_dashboard_service_details->isConfirm() && $view_dashboard_service_details_grid->emptyRow())) {
?>
	<tr <?php echo $view_dashboard_service_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_service_details_grid->ListOptions->render("body", "left", $view_dashboard_service_details_grid->RowCount);
?>
	<?php if ($view_dashboard_service_details_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $view_dashboard_service_details_grid->PatientId->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_PatientId" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_PatientId" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->PatientId->EditValue ?>"<?php echo $view_dashboard_service_details_grid->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_PatientId" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_PatientId" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->PatientId->EditValue ?>"<?php echo $view_dashboard_service_details_grid->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_PatientId">
<span<?php echo $view_dashboard_service_details_grid->PatientId->viewAttributes() ?>><?php echo $view_dashboard_service_details_grid->PatientId->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_dashboard_service_details_grid->PatientName->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_PatientName" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_PatientName" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->PatientName->EditValue ?>"<?php echo $view_dashboard_service_details_grid->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_PatientName" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_PatientName" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->PatientName->EditValue ?>"<?php echo $view_dashboard_service_details_grid->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_PatientName">
<span<?php echo $view_dashboard_service_details_grid->PatientName->viewAttributes() ?>><?php echo $view_dashboard_service_details_grid->PatientName->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->Services->Visible) { // Services ?>
		<td data-name="Services" <?php echo $view_dashboard_service_details_grid->Services->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_Services" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_Services" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->Services->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->Services->EditValue ?>"<?php echo $view_dashboard_service_details_grid->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->Services->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_Services" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_Services" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->Services->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->Services->EditValue ?>"<?php echo $view_dashboard_service_details_grid->Services->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_Services">
<span<?php echo $view_dashboard_service_details_grid->Services->viewAttributes() ?>><?php echo $view_dashboard_service_details_grid->Services->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->Services->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->Services->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->Services->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->Services->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->amount->Visible) { // amount ?>
		<td data-name="amount" <?php echo $view_dashboard_service_details_grid->amount->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_amount" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_amount" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->amount->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->amount->EditValue ?>"<?php echo $view_dashboard_service_details_grid->amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->amount->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_amount" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_amount" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->amount->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->amount->EditValue ?>"<?php echo $view_dashboard_service_details_grid->amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_amount">
<span<?php echo $view_dashboard_service_details_grid->amount->viewAttributes() ?>><?php echo $view_dashboard_service_details_grid->amount->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->amount->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->amount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->amount->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" <?php echo $view_dashboard_service_details_grid->SubTotal->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_SubTotal" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->SubTotal->EditValue ?>"<?php echo $view_dashboard_service_details_grid->SubTotal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SubTotal->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_SubTotal" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->SubTotal->EditValue ?>"<?php echo $view_dashboard_service_details_grid->SubTotal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_SubTotal">
<span<?php echo $view_dashboard_service_details_grid->SubTotal->viewAttributes() ?>><?php echo $view_dashboard_service_details_grid->SubTotal->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SubTotal->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SubTotal->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SubTotal->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SubTotal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_dashboard_service_details_grid->createdby->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_createdby" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdby" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdby->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->createdby->EditValue ?>"<?php echo $view_dashboard_service_details_grid->createdby->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_createdby" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdby" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdby->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->createdby->EditValue ?>"<?php echo $view_dashboard_service_details_grid->createdby->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_createdby">
<span<?php echo $view_dashboard_service_details_grid->createdby->viewAttributes() ?>><?php echo $view_dashboard_service_details_grid->createdby->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_dashboard_service_details_grid->createddatetime->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_createddatetime" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->createddatetime->EditValue ?>"<?php echo $view_dashboard_service_details_grid->createddatetime->editAttributes() ?>>
<?php if (!$view_dashboard_service_details_grid->createddatetime->ReadOnly && !$view_dashboard_service_details_grid->createddatetime->Disabled && !isset($view_dashboard_service_details_grid->createddatetime->EditAttrs["readonly"]) && !isset($view_dashboard_service_details_grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_service_detailsgrid", "x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_createddatetime" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->createddatetime->EditValue ?>"<?php echo $view_dashboard_service_details_grid->createddatetime->editAttributes() ?>>
<?php if (!$view_dashboard_service_details_grid->createddatetime->ReadOnly && !$view_dashboard_service_details_grid->createddatetime->Disabled && !isset($view_dashboard_service_details_grid->createddatetime->EditAttrs["readonly"]) && !isset($view_dashboard_service_details_grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_service_detailsgrid", "x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_createddatetime">
<span<?php echo $view_dashboard_service_details_grid->createddatetime->viewAttributes() ?>><?php echo $view_dashboard_service_details_grid->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate" <?php echo $view_dashboard_service_details_grid->createdDate->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_service_details_grid->createdDate->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_createdDate" class="form-group">
<span<?php echo $view_dashboard_service_details_grid->createdDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->createdDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode(FormatDateTime($view_dashboard_service_details_grid->createdDate->CurrentValue, 7)) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_createdDate" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->createdDate->EditValue ?>"<?php echo $view_dashboard_service_details_grid->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_details_grid->createdDate->ReadOnly && !$view_dashboard_service_details_grid->createdDate->Disabled && !isset($view_dashboard_service_details_grid->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_details_grid->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_service_detailsgrid", "x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdDate->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_service_details_grid->createdDate->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_createdDate" class="form-group">
<span<?php echo $view_dashboard_service_details_grid->createdDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->createdDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode(FormatDateTime($view_dashboard_service_details_grid->createdDate->CurrentValue, 7)) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_createdDate" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->createdDate->EditValue ?>"<?php echo $view_dashboard_service_details_grid->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_details_grid->createdDate->ReadOnly && !$view_dashboard_service_details_grid->createdDate->Disabled && !isset($view_dashboard_service_details_grid->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_details_grid->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_service_detailsgrid", "x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_createdDate">
<span<?php echo $view_dashboard_service_details_grid->createdDate->viewAttributes() ?>><?php echo $view_dashboard_service_details_grid->createdDate->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdDate->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdDate->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->DrName->Visible) { // DrName ?>
		<td data-name="DrName" <?php echo $view_dashboard_service_details_grid->DrName->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_DrName" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DrName" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->DrName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->DrName->EditValue ?>"<?php echo $view_dashboard_service_details_grid->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DrName->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_DrName" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DrName" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->DrName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->DrName->EditValue ?>"<?php echo $view_dashboard_service_details_grid->DrName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_DrName">
<span<?php echo $view_dashboard_service_details_grid->DrName->viewAttributes() ?>><?php echo $view_dashboard_service_details_grid->DrName->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DrName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DrName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->DRDepartment->Visible) { // DRDepartment ?>
		<td data-name="DRDepartment" <?php echo $view_dashboard_service_details_grid->DRDepartment->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_DRDepartment" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->DRDepartment->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->DRDepartment->EditValue ?>"<?php echo $view_dashboard_service_details_grid->DRDepartment->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DRDepartment->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_DRDepartment" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->DRDepartment->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->DRDepartment->EditValue ?>"<?php echo $view_dashboard_service_details_grid->DRDepartment->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_DRDepartment">
<span<?php echo $view_dashboard_service_details_grid->DRDepartment->viewAttributes() ?>><?php echo $view_dashboard_service_details_grid->DRDepartment->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DRDepartment->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DRDepartment->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DRDepartment->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DRDepartment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" <?php echo $view_dashboard_service_details_grid->ItemCode->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_ItemCode" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->ItemCode->EditValue ?>"<?php echo $view_dashboard_service_details_grid->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_ItemCode" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->ItemCode->EditValue ?>"<?php echo $view_dashboard_service_details_grid->ItemCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_ItemCode">
<span<?php echo $view_dashboard_service_details_grid->ItemCode->viewAttributes() ?>><?php echo $view_dashboard_service_details_grid->ItemCode->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->ItemCode->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->ItemCode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->ItemCode->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->ItemCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" <?php echo $view_dashboard_service_details_grid->DEptCd->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_DEptCd" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->DEptCd->EditValue ?>"<?php echo $view_dashboard_service_details_grid->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_DEptCd" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->DEptCd->EditValue ?>"<?php echo $view_dashboard_service_details_grid->DEptCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_DEptCd">
<span<?php echo $view_dashboard_service_details_grid->DEptCd->viewAttributes() ?>><?php echo $view_dashboard_service_details_grid->DEptCd->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEptCd->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEptCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEptCd->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEptCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->CODE->Visible) { // CODE ?>
		<td data-name="CODE" <?php echo $view_dashboard_service_details_grid->CODE->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_CODE" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_CODE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->CODE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->CODE->EditValue ?>"<?php echo $view_dashboard_service_details_grid->CODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->CODE->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_CODE" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_CODE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->CODE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->CODE->EditValue ?>"<?php echo $view_dashboard_service_details_grid->CODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_CODE">
<span<?php echo $view_dashboard_service_details_grid->CODE->viewAttributes() ?>><?php echo $view_dashboard_service_details_grid->CODE->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->CODE->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->CODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->CODE->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->CODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE" <?php echo $view_dashboard_service_details_grid->SERVICE->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_SERVICE" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->SERVICE->EditValue ?>"<?php echo $view_dashboard_service_details_grid->SERVICE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_SERVICE" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->SERVICE->EditValue ?>"<?php echo $view_dashboard_service_details_grid->SERVICE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_SERVICE">
<span<?php echo $view_dashboard_service_details_grid->SERVICE->viewAttributes() ?>><?php echo $view_dashboard_service_details_grid->SERVICE->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE" <?php echo $view_dashboard_service_details_grid->SERVICE_TYPE->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_service_details_grid->SERVICE_TYPE->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_SERVICE_TYPE" class="form-group">
<span<?php echo $view_dashboard_service_details_grid->SERVICE_TYPE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->SERVICE_TYPE->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE_TYPE->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_SERVICE_TYPE" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->SERVICE_TYPE->EditValue ?>"<?php echo $view_dashboard_service_details_grid->SERVICE_TYPE->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE_TYPE->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_service_details_grid->SERVICE_TYPE->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_SERVICE_TYPE" class="form-group">
<span<?php echo $view_dashboard_service_details_grid->SERVICE_TYPE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->SERVICE_TYPE->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE_TYPE->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_SERVICE_TYPE" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->SERVICE_TYPE->EditValue ?>"<?php echo $view_dashboard_service_details_grid->SERVICE_TYPE->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_SERVICE_TYPE">
<span<?php echo $view_dashboard_service_details_grid->SERVICE_TYPE->viewAttributes() ?>><?php echo $view_dashboard_service_details_grid->SERVICE_TYPE->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE_TYPE->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE_TYPE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE_TYPE->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE_TYPE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT" <?php echo $view_dashboard_service_details_grid->DEPARTMENT->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_service_details_grid->DEPARTMENT->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_DEPARTMENT" class="form-group">
<span<?php echo $view_dashboard_service_details_grid->DEPARTMENT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->DEPARTMENT->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEPARTMENT->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_DEPARTMENT" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->DEPARTMENT->EditValue ?>"<?php echo $view_dashboard_service_details_grid->DEPARTMENT->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEPARTMENT->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_service_details_grid->DEPARTMENT->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_DEPARTMENT" class="form-group">
<span<?php echo $view_dashboard_service_details_grid->DEPARTMENT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->DEPARTMENT->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEPARTMENT->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_DEPARTMENT" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->DEPARTMENT->EditValue ?>"<?php echo $view_dashboard_service_details_grid->DEPARTMENT->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_DEPARTMENT">
<span<?php echo $view_dashboard_service_details_grid->DEPARTMENT->viewAttributes() ?>><?php echo $view_dashboard_service_details_grid->DEPARTMENT->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEPARTMENT->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEPARTMENT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEPARTMENT->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEPARTMENT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_dashboard_service_details_grid->HospID->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_service_details_grid->HospID->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_HospID" class="form-group">
<span<?php echo $view_dashboard_service_details_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_HospID" class="form-group">
<?php
$onchange = $view_dashboard_service_details_grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_dashboard_service_details_grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID">
	<input type="text" class="form-control" name="sv_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="sv_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo RemoveHtml($view_dashboard_service_details_grid->HospID->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_service_details_grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_service_details_grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid"], function() {
	fview_dashboard_service_detailsgrid.createAutoSuggest({"id":"x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID","forceSelect":false});
});
</script>
<?php echo $view_dashboard_service_details_grid->HospID->Lookup->getParamTag($view_dashboard_service_details_grid, "p_x" . $view_dashboard_service_details_grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_service_details_grid->HospID->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_HospID" class="form-group">
<span<?php echo $view_dashboard_service_details_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_HospID" class="form-group">
<?php
$onchange = $view_dashboard_service_details_grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_dashboard_service_details_grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID">
	<input type="text" class="form-control" name="sv_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="sv_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo RemoveHtml($view_dashboard_service_details_grid->HospID->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_service_details_grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_service_details_grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid"], function() {
	fview_dashboard_service_detailsgrid.createAutoSuggest({"id":"x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID","forceSelect":false});
});
</script>
<?php echo $view_dashboard_service_details_grid->HospID->Lookup->getParamTag($view_dashboard_service_details_grid, "p_x" . $view_dashboard_service_details_grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_HospID">
<span<?php echo $view_dashboard_service_details_grid->HospID->viewAttributes() ?>><?php echo $view_dashboard_service_details_grid->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->vid->Visible) { // vid ?>
		<td data-name="vid" <?php echo $view_dashboard_service_details_grid->vid->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_vid" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_vid" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->vid->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->vid->EditValue ?>"<?php echo $view_dashboard_service_details_grid->vid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->vid->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_vid" class="form-group">
<input type="text" data-table="view_dashboard_service_details" data-field="x_vid" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->vid->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->vid->EditValue ?>"<?php echo $view_dashboard_service_details_grid->vid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCount ?>_view_dashboard_service_details_vid">
<span<?php echo $view_dashboard_service_details_grid->vid->viewAttributes() ?>><?php echo $view_dashboard_service_details_grid->vid->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->vid->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->vid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->vid->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->vid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_service_details_grid->ListOptions->render("body", "right", $view_dashboard_service_details_grid->RowCount);
?>
	</tr>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD || $view_dashboard_service_details->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid", "load"], function() {
	fview_dashboard_service_detailsgrid.updateLists(<?php echo $view_dashboard_service_details_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_dashboard_service_details_grid->isGridAdd() || $view_dashboard_service_details->CurrentMode == "copy")
		if (!$view_dashboard_service_details_grid->Recordset->EOF)
			$view_dashboard_service_details_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_dashboard_service_details->CurrentMode == "add" || $view_dashboard_service_details->CurrentMode == "copy" || $view_dashboard_service_details->CurrentMode == "edit") {
		$view_dashboard_service_details_grid->RowIndex = '$rowindex$';
		$view_dashboard_service_details_grid->loadRowValues();

		// Set row properties
		$view_dashboard_service_details->resetAttributes();
		$view_dashboard_service_details->RowAttrs->merge(["data-rowindex" => $view_dashboard_service_details_grid->RowIndex, "id" => "r0_view_dashboard_service_details", "data-rowtype" => ROWTYPE_ADD]);
		$view_dashboard_service_details->RowAttrs->appendClass("ew-template");
		$view_dashboard_service_details->RowType = ROWTYPE_ADD;

		// Render row
		$view_dashboard_service_details_grid->renderRow();

		// Render list options
		$view_dashboard_service_details_grid->renderListOptions();
		$view_dashboard_service_details_grid->StartRowCount = 0;
?>
	<tr <?php echo $view_dashboard_service_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_service_details_grid->ListOptions->render("body", "left", $view_dashboard_service_details_grid->RowIndex);
?>
	<?php if ($view_dashboard_service_details_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_PatientId" class="form-group view_dashboard_service_details_PatientId">
<input type="text" data-table="view_dashboard_service_details" data-field="x_PatientId" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->PatientId->EditValue ?>"<?php echo $view_dashboard_service_details_grid->PatientId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_PatientId" class="form-group view_dashboard_service_details_PatientId">
<span<?php echo $view_dashboard_service_details_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_PatientName" class="form-group view_dashboard_service_details_PatientName">
<input type="text" data-table="view_dashboard_service_details" data-field="x_PatientName" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->PatientName->EditValue ?>"<?php echo $view_dashboard_service_details_grid->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_PatientName" class="form-group view_dashboard_service_details_PatientName">
<span<?php echo $view_dashboard_service_details_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->PatientName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->Services->Visible) { // Services ?>
		<td data-name="Services">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_Services" class="form-group view_dashboard_service_details_Services">
<input type="text" data-table="view_dashboard_service_details" data-field="x_Services" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->Services->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->Services->EditValue ?>"<?php echo $view_dashboard_service_details_grid->Services->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_Services" class="form-group view_dashboard_service_details_Services">
<span<?php echo $view_dashboard_service_details_grid->Services->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->Services->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->Services->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->Services->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->amount->Visible) { // amount ?>
		<td data-name="amount">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_amount" class="form-group view_dashboard_service_details_amount">
<input type="text" data-table="view_dashboard_service_details" data-field="x_amount" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->amount->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->amount->EditValue ?>"<?php echo $view_dashboard_service_details_grid->amount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_amount" class="form-group view_dashboard_service_details_amount">
<span<?php echo $view_dashboard_service_details_grid->amount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->amount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_SubTotal" class="form-group view_dashboard_service_details_SubTotal">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->SubTotal->EditValue ?>"<?php echo $view_dashboard_service_details_grid->SubTotal->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_SubTotal" class="form-group view_dashboard_service_details_SubTotal">
<span<?php echo $view_dashboard_service_details_grid->SubTotal->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->SubTotal->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SubTotal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SubTotal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_createdby" class="form-group view_dashboard_service_details_createdby">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdby" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdby->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->createdby->EditValue ?>"<?php echo $view_dashboard_service_details_grid->createdby->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_createdby" class="form-group view_dashboard_service_details_createdby">
<span<?php echo $view_dashboard_service_details_grid->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->createdby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_createddatetime" class="form-group view_dashboard_service_details_createddatetime">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->createddatetime->EditValue ?>"<?php echo $view_dashboard_service_details_grid->createddatetime->editAttributes() ?>>
<?php if (!$view_dashboard_service_details_grid->createddatetime->ReadOnly && !$view_dashboard_service_details_grid->createddatetime->Disabled && !isset($view_dashboard_service_details_grid->createddatetime->EditAttrs["readonly"]) && !isset($view_dashboard_service_details_grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_service_detailsgrid", "x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_createddatetime" class="form-group view_dashboard_service_details_createddatetime">
<span<?php echo $view_dashboard_service_details_grid->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->createddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<?php if ($view_dashboard_service_details_grid->createdDate->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_service_details_createdDate" class="form-group view_dashboard_service_details_createdDate">
<span<?php echo $view_dashboard_service_details_grid->createdDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->createdDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode(FormatDateTime($view_dashboard_service_details_grid->createdDate->CurrentValue, 7)) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_createdDate" class="form-group view_dashboard_service_details_createdDate">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->createdDate->EditValue ?>"<?php echo $view_dashboard_service_details_grid->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_details_grid->createdDate->ReadOnly && !$view_dashboard_service_details_grid->createdDate->Disabled && !isset($view_dashboard_service_details_grid->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_details_grid->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_service_detailsgrid", "x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_createdDate" class="form-group view_dashboard_service_details_createdDate">
<span<?php echo $view_dashboard_service_details_grid->createdDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->createdDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->createdDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->DrName->Visible) { // DrName ?>
		<td data-name="DrName">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_DrName" class="form-group view_dashboard_service_details_DrName">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DrName" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->DrName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->DrName->EditValue ?>"<?php echo $view_dashboard_service_details_grid->DrName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_DrName" class="form-group view_dashboard_service_details_DrName">
<span<?php echo $view_dashboard_service_details_grid->DrName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->DrName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->DRDepartment->Visible) { // DRDepartment ?>
		<td data-name="DRDepartment">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_DRDepartment" class="form-group view_dashboard_service_details_DRDepartment">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->DRDepartment->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->DRDepartment->EditValue ?>"<?php echo $view_dashboard_service_details_grid->DRDepartment->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_DRDepartment" class="form-group view_dashboard_service_details_DRDepartment">
<span<?php echo $view_dashboard_service_details_grid->DRDepartment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->DRDepartment->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DRDepartment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DRDepartment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_ItemCode" class="form-group view_dashboard_service_details_ItemCode">
<input type="text" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->ItemCode->EditValue ?>"<?php echo $view_dashboard_service_details_grid->ItemCode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_ItemCode" class="form-group view_dashboard_service_details_ItemCode">
<span<?php echo $view_dashboard_service_details_grid->ItemCode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->ItemCode->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->ItemCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->ItemCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_DEptCd" class="form-group view_dashboard_service_details_DEptCd">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->DEptCd->EditValue ?>"<?php echo $view_dashboard_service_details_grid->DEptCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_DEptCd" class="form-group view_dashboard_service_details_DEptCd">
<span<?php echo $view_dashboard_service_details_grid->DEptCd->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->DEptCd->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEptCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEptCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->CODE->Visible) { // CODE ?>
		<td data-name="CODE">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_CODE" class="form-group view_dashboard_service_details_CODE">
<input type="text" data-table="view_dashboard_service_details" data-field="x_CODE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->CODE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->CODE->EditValue ?>"<?php echo $view_dashboard_service_details_grid->CODE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_CODE" class="form-group view_dashboard_service_details_CODE">
<span<?php echo $view_dashboard_service_details_grid->CODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->CODE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->CODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->CODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_SERVICE" class="form-group view_dashboard_service_details_SERVICE">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->SERVICE->EditValue ?>"<?php echo $view_dashboard_service_details_grid->SERVICE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_SERVICE" class="form-group view_dashboard_service_details_SERVICE">
<span<?php echo $view_dashboard_service_details_grid->SERVICE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->SERVICE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<?php if ($view_dashboard_service_details_grid->SERVICE_TYPE->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_service_details_SERVICE_TYPE" class="form-group view_dashboard_service_details_SERVICE_TYPE">
<span<?php echo $view_dashboard_service_details_grid->SERVICE_TYPE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->SERVICE_TYPE->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE_TYPE->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_SERVICE_TYPE" class="form-group view_dashboard_service_details_SERVICE_TYPE">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->SERVICE_TYPE->EditValue ?>"<?php echo $view_dashboard_service_details_grid->SERVICE_TYPE->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_SERVICE_TYPE" class="form-group view_dashboard_service_details_SERVICE_TYPE">
<span<?php echo $view_dashboard_service_details_grid->SERVICE_TYPE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->SERVICE_TYPE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE_TYPE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->SERVICE_TYPE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<?php if ($view_dashboard_service_details_grid->DEPARTMENT->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_service_details_DEPARTMENT" class="form-group view_dashboard_service_details_DEPARTMENT">
<span<?php echo $view_dashboard_service_details_grid->DEPARTMENT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->DEPARTMENT->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEPARTMENT->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_DEPARTMENT" class="form-group view_dashboard_service_details_DEPARTMENT">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->DEPARTMENT->EditValue ?>"<?php echo $view_dashboard_service_details_grid->DEPARTMENT->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_DEPARTMENT" class="form-group view_dashboard_service_details_DEPARTMENT">
<span<?php echo $view_dashboard_service_details_grid->DEPARTMENT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->DEPARTMENT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEPARTMENT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->DEPARTMENT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<?php if ($view_dashboard_service_details_grid->HospID->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_service_details_HospID" class="form-group view_dashboard_service_details_HospID">
<span<?php echo $view_dashboard_service_details_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_HospID" class="form-group view_dashboard_service_details_HospID">
<?php
$onchange = $view_dashboard_service_details_grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_dashboard_service_details_grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID">
	<input type="text" class="form-control" name="sv_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="sv_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo RemoveHtml($view_dashboard_service_details_grid->HospID->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_service_details_grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_service_details_grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid"], function() {
	fview_dashboard_service_detailsgrid.createAutoSuggest({"id":"x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID","forceSelect":false});
});
</script>
<?php echo $view_dashboard_service_details_grid->HospID->Lookup->getParamTag($view_dashboard_service_details_grid, "p_x" . $view_dashboard_service_details_grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_HospID" class="form-group view_dashboard_service_details_HospID">
<span<?php echo $view_dashboard_service_details_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->vid->Visible) { // vid ?>
		<td data-name="vid">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_vid" class="form-group view_dashboard_service_details_vid">
<input type="text" data-table="view_dashboard_service_details" data-field="x_vid" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_grid->vid->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_grid->vid->EditValue ?>"<?php echo $view_dashboard_service_details_grid->vid->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_vid" class="form-group view_dashboard_service_details_vid">
<span<?php echo $view_dashboard_service_details_grid->vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_service_details_grid->vid->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->vid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" value="<?php echo HtmlEncode($view_dashboard_service_details_grid->vid->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_service_details_grid->ListOptions->render("body", "right", $view_dashboard_service_details_grid->RowIndex);
?>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid", "load"], function() {
	fview_dashboard_service_detailsgrid.updateLists(<?php echo $view_dashboard_service_details_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
<?php

// Render aggregate row
$view_dashboard_service_details->RowType = ROWTYPE_AGGREGATE;
$view_dashboard_service_details->resetAttributes();
$view_dashboard_service_details_grid->renderRow();
?>
<?php if ($view_dashboard_service_details_grid->TotalRecords > 0 && $view_dashboard_service_details->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_dashboard_service_details_grid->renderListOptions();

// Render list options (footer, left)
$view_dashboard_service_details_grid->ListOptions->render("footer", "left");
?>
	<?php if ($view_dashboard_service_details_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" class="<?php echo $view_dashboard_service_details_grid->PatientId->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_PatientId" class="view_dashboard_service_details_PatientId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" class="<?php echo $view_dashboard_service_details_grid->PatientName->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_PatientName" class="view_dashboard_service_details_PatientName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->Services->Visible) { // Services ?>
		<td data-name="Services" class="<?php echo $view_dashboard_service_details_grid->Services->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_Services" class="view_dashboard_service_details_Services">
		<span class="ew-aggregate"><?php echo $Language->phrase("COUNT") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_details_grid->Services->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->amount->Visible) { // amount ?>
		<td data-name="amount" class="<?php echo $view_dashboard_service_details_grid->amount->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_amount" class="view_dashboard_service_details_amount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_details_grid->amount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" class="<?php echo $view_dashboard_service_details_grid->SubTotal->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_SubTotal" class="view_dashboard_service_details_SubTotal">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_details_grid->SubTotal->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby" class="<?php echo $view_dashboard_service_details_grid->createdby->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_createdby" class="view_dashboard_service_details_createdby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" class="<?php echo $view_dashboard_service_details_grid->createddatetime->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_createddatetime" class="view_dashboard_service_details_createddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate" class="<?php echo $view_dashboard_service_details_grid->createdDate->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_createdDate" class="view_dashboard_service_details_createdDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->DrName->Visible) { // DrName ?>
		<td data-name="DrName" class="<?php echo $view_dashboard_service_details_grid->DrName->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DrName" class="view_dashboard_service_details_DrName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->DRDepartment->Visible) { // DRDepartment ?>
		<td data-name="DRDepartment" class="<?php echo $view_dashboard_service_details_grid->DRDepartment->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DRDepartment" class="view_dashboard_service_details_DRDepartment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" class="<?php echo $view_dashboard_service_details_grid->ItemCode->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_ItemCode" class="view_dashboard_service_details_ItemCode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" class="<?php echo $view_dashboard_service_details_grid->DEptCd->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DEptCd" class="view_dashboard_service_details_DEptCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->CODE->Visible) { // CODE ?>
		<td data-name="CODE" class="<?php echo $view_dashboard_service_details_grid->CODE->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_CODE" class="view_dashboard_service_details_CODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE" class="<?php echo $view_dashboard_service_details_grid->SERVICE->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_SERVICE" class="view_dashboard_service_details_SERVICE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE" class="<?php echo $view_dashboard_service_details_grid->SERVICE_TYPE->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_SERVICE_TYPE" class="view_dashboard_service_details_SERVICE_TYPE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_details_grid->DEPARTMENT->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DEPARTMENT" class="view_dashboard_service_details_DEPARTMENT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_dashboard_service_details_grid->HospID->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_HospID" class="view_dashboard_service_details_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_grid->vid->Visible) { // vid ?>
		<td data-name="vid" class="<?php echo $view_dashboard_service_details_grid->vid->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_vid" class="view_dashboard_service_details_vid">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_dashboard_service_details_grid->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($view_dashboard_service_details->CurrentMode == "add" || $view_dashboard_service_details->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_dashboard_service_details_grid->FormKeyCountName ?>" id="<?php echo $view_dashboard_service_details_grid->FormKeyCountName ?>" value="<?php echo $view_dashboard_service_details_grid->KeyCount ?>">
<?php echo $view_dashboard_service_details_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_dashboard_service_details->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_dashboard_service_details_grid->FormKeyCountName ?>" id="<?php echo $view_dashboard_service_details_grid->FormKeyCountName ?>" value="<?php echo $view_dashboard_service_details_grid->KeyCount ?>">
<?php echo $view_dashboard_service_details_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_dashboard_service_details->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_dashboard_service_detailsgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_dashboard_service_details_grid->Recordset)
	$view_dashboard_service_details_grid->Recordset->Close();
?>
<?php if ($view_dashboard_service_details_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_dashboard_service_details_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_dashboard_service_details_grid->TotalRecords == 0 && !$view_dashboard_service_details->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_dashboard_service_details_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$view_dashboard_service_details_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_dashboard_service_details->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_dashboard_service_details",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$view_dashboard_service_details_grid->terminate();
?>