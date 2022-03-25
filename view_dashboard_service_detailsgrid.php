<?php
namespace PHPMaker2019\HIMS;

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
<?php if (!$view_dashboard_service_details->isExport()) { ?>
<script>

// Form object
var fview_dashboard_service_detailsgrid = new ew.Form("fview_dashboard_service_detailsgrid", "grid");
fview_dashboard_service_detailsgrid.formKeyCountName = '<?php echo $view_dashboard_service_details_grid->FormKeyCountName ?>';

// Validate form
fview_dashboard_service_detailsgrid.validate = function() {
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
		<?php if ($view_dashboard_service_details_grid->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details->PatientId->caption(), $view_dashboard_service_details->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_service_details_grid->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details->PatientName->caption(), $view_dashboard_service_details->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_service_details_grid->Services->Required) { ?>
			elm = this.getElements("x" + infix + "_Services");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details->Services->caption(), $view_dashboard_service_details->Services->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_service_details_grid->amount->Required) { ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details->amount->caption(), $view_dashboard_service_details->amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details->amount->errorMessage()) ?>");
		<?php if ($view_dashboard_service_details_grid->SubTotal->Required) { ?>
			elm = this.getElements("x" + infix + "_SubTotal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details->SubTotal->caption(), $view_dashboard_service_details->SubTotal->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SubTotal");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details->SubTotal->errorMessage()) ?>");
		<?php if ($view_dashboard_service_details_grid->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details->createdby->caption(), $view_dashboard_service_details->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_service_details_grid->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details->createddatetime->caption(), $view_dashboard_service_details->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details->createddatetime->errorMessage()) ?>");
		<?php if ($view_dashboard_service_details_grid->createdDate->Required) { ?>
			elm = this.getElements("x" + infix + "_createdDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details->createdDate->caption(), $view_dashboard_service_details->createdDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createdDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details->createdDate->errorMessage()) ?>");
		<?php if ($view_dashboard_service_details_grid->DrName->Required) { ?>
			elm = this.getElements("x" + infix + "_DrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details->DrName->caption(), $view_dashboard_service_details->DrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_service_details_grid->DRDepartment->Required) { ?>
			elm = this.getElements("x" + infix + "_DRDepartment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details->DRDepartment->caption(), $view_dashboard_service_details->DRDepartment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_service_details_grid->ItemCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details->ItemCode->caption(), $view_dashboard_service_details->ItemCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_service_details_grid->DEptCd->Required) { ?>
			elm = this.getElements("x" + infix + "_DEptCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details->DEptCd->caption(), $view_dashboard_service_details->DEptCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_service_details_grid->CODE->Required) { ?>
			elm = this.getElements("x" + infix + "_CODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details->CODE->caption(), $view_dashboard_service_details->CODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_service_details_grid->SERVICE->Required) { ?>
			elm = this.getElements("x" + infix + "_SERVICE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details->SERVICE->caption(), $view_dashboard_service_details->SERVICE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_service_details_grid->SERVICE_TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_SERVICE_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details->SERVICE_TYPE->caption(), $view_dashboard_service_details->SERVICE_TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_service_details_grid->DEPARTMENT->Required) { ?>
			elm = this.getElements("x" + infix + "_DEPARTMENT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details->DEPARTMENT->caption(), $view_dashboard_service_details->DEPARTMENT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_service_details_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details->HospID->caption(), $view_dashboard_service_details->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details->HospID->errorMessage()) ?>");
		<?php if ($view_dashboard_service_details_grid->vid->Required) { ?>
			elm = this.getElements("x" + infix + "_vid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_details->vid->caption(), $view_dashboard_service_details->vid->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
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
	return true;
}

// Form_CustomValidate event
fview_dashboard_service_detailsgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dashboard_service_detailsgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_dashboard_service_detailsgrid.lists["x_DrName"] = <?php echo $view_dashboard_service_details_grid->DrName->Lookup->toClientList() ?>;
fview_dashboard_service_detailsgrid.lists["x_DrName"].options = <?php echo JsonEncode($view_dashboard_service_details_grid->DrName->lookupOptions()) ?>;
fview_dashboard_service_detailsgrid.lists["x_HospID"] = <?php echo $view_dashboard_service_details_grid->HospID->Lookup->toClientList() ?>;
fview_dashboard_service_detailsgrid.lists["x_HospID"].options = <?php echo JsonEncode($view_dashboard_service_details_grid->HospID->lookupOptions()) ?>;
fview_dashboard_service_detailsgrid.autoSuggests["x_HospID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$view_dashboard_service_details_grid->renderOtherOptions();
?>
<?php $view_dashboard_service_details_grid->showPageHeader(); ?>
<?php
$view_dashboard_service_details_grid->showMessage();
?>
<?php if ($view_dashboard_service_details_grid->TotalRecs > 0 || $view_dashboard_service_details->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_dashboard_service_details_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_service_details">
<?php if ($view_dashboard_service_details_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_dashboard_service_details_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_dashboard_service_detailsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_dashboard_service_details" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_view_dashboard_service_detailsgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_dashboard_service_details_grid->RowType = ROWTYPE_HEADER;

// Render list options
$view_dashboard_service_details_grid->renderListOptions();

// Render list options (header, left)
$view_dashboard_service_details_grid->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_service_details->PatientId->Visible) { // PatientId ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_dashboard_service_details->PatientId->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_PatientId" class="view_dashboard_service_details_PatientId"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_dashboard_service_details->PatientId->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_PatientId" class="view_dashboard_service_details_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->PatientName->Visible) { // PatientName ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_dashboard_service_details->PatientName->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_PatientName" class="view_dashboard_service_details_PatientName"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_dashboard_service_details->PatientName->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_PatientName" class="view_dashboard_service_details_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->Services->Visible) { // Services ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $view_dashboard_service_details->Services->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_Services" class="view_dashboard_service_details_Services"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $view_dashboard_service_details->Services->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_Services" class="view_dashboard_service_details_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->Services->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->Services->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->Services->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->amount->Visible) { // amount ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $view_dashboard_service_details->amount->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_amount" class="view_dashboard_service_details_amount"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $view_dashboard_service_details->amount->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_amount" class="view_dashboard_service_details_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->SubTotal->Visible) { // SubTotal ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->SubTotal) == "") { ?>
		<th data-name="SubTotal" class="<?php echo $view_dashboard_service_details->SubTotal->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_SubTotal" class="view_dashboard_service_details_SubTotal"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->SubTotal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubTotal" class="<?php echo $view_dashboard_service_details->SubTotal->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_SubTotal" class="view_dashboard_service_details_SubTotal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->SubTotal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->SubTotal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->createdby->Visible) { // createdby ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_dashboard_service_details->createdby->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_createdby" class="view_dashboard_service_details_createdby"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_dashboard_service_details->createdby->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_createdby" class="view_dashboard_service_details_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_dashboard_service_details->createddatetime->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_createddatetime" class="view_dashboard_service_details_createddatetime"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_dashboard_service_details->createddatetime->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_createddatetime" class="view_dashboard_service_details_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->createdDate->Visible) { // createdDate ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->createdDate) == "") { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_service_details->createdDate->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_createdDate" class="view_dashboard_service_details_createdDate"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->createdDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_service_details->createdDate->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_createdDate" class="view_dashboard_service_details_createdDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->createdDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->createdDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->createdDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->DrName->Visible) { // DrName ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $view_dashboard_service_details->DrName->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DrName" class="view_dashboard_service_details_DrName"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $view_dashboard_service_details->DrName->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_DrName" class="view_dashboard_service_details_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->DrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->DrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->DRDepartment->Visible) { // DRDepartment ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->DRDepartment) == "") { ?>
		<th data-name="DRDepartment" class="<?php echo $view_dashboard_service_details->DRDepartment->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DRDepartment" class="view_dashboard_service_details_DRDepartment"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DRDepartment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DRDepartment" class="<?php echo $view_dashboard_service_details->DRDepartment->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_DRDepartment" class="view_dashboard_service_details_DRDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DRDepartment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->DRDepartment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->DRDepartment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $view_dashboard_service_details->ItemCode->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_ItemCode" class="view_dashboard_service_details_ItemCode"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $view_dashboard_service_details->ItemCode->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_ItemCode" class="view_dashboard_service_details_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->ItemCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->ItemCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->ItemCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $view_dashboard_service_details->DEptCd->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DEptCd" class="view_dashboard_service_details_DEptCd"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $view_dashboard_service_details->DEptCd->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_DEptCd" class="view_dashboard_service_details_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DEptCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->DEptCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->DEptCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->CODE->Visible) { // CODE ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $view_dashboard_service_details->CODE->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_CODE" class="view_dashboard_service_details_CODE"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $view_dashboard_service_details->CODE->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_CODE" class="view_dashboard_service_details_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->CODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->CODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->CODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->SERVICE->Visible) { // SERVICE ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->SERVICE) == "") { ?>
		<th data-name="SERVICE" class="<?php echo $view_dashboard_service_details->SERVICE->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_SERVICE" class="view_dashboard_service_details_SERVICE"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->SERVICE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE" class="<?php echo $view_dashboard_service_details->SERVICE->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_SERVICE" class="view_dashboard_service_details_SERVICE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->SERVICE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->SERVICE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->SERVICE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->SERVICE_TYPE) == "") { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $view_dashboard_service_details->SERVICE_TYPE->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_SERVICE_TYPE" class="view_dashboard_service_details_SERVICE_TYPE"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->SERVICE_TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $view_dashboard_service_details->SERVICE_TYPE->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_SERVICE_TYPE" class="view_dashboard_service_details_SERVICE_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->SERVICE_TYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->SERVICE_TYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->SERVICE_TYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->DEPARTMENT) == "") { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_details->DEPARTMENT->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DEPARTMENT" class="view_dashboard_service_details_DEPARTMENT"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DEPARTMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_details->DEPARTMENT->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_DEPARTMENT" class="view_dashboard_service_details_DEPARTMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DEPARTMENT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->DEPARTMENT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->DEPARTMENT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_service_details->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_HospID" class="view_dashboard_service_details_HospID"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_service_details->HospID->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_HospID" class="view_dashboard_service_details_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->vid->Visible) { // vid ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->vid) == "") { ?>
		<th data-name="vid" class="<?php echo $view_dashboard_service_details->vid->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_vid" class="view_dashboard_service_details_vid"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vid" class="<?php echo $view_dashboard_service_details->vid->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_details_vid" class="view_dashboard_service_details_vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->vid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->vid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
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
$view_dashboard_service_details_grid->StartRec = 1;
$view_dashboard_service_details_grid->StopRec = $view_dashboard_service_details_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $view_dashboard_service_details_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_dashboard_service_details_grid->FormKeyCountName) && ($view_dashboard_service_details->isGridAdd() || $view_dashboard_service_details->isGridEdit() || $view_dashboard_service_details->isConfirm())) {
		$view_dashboard_service_details_grid->KeyCount = $CurrentForm->getValue($view_dashboard_service_details_grid->FormKeyCountName);
		$view_dashboard_service_details_grid->StopRec = $view_dashboard_service_details_grid->StartRec + $view_dashboard_service_details_grid->KeyCount - 1;
	}
}
$view_dashboard_service_details_grid->RecCnt = $view_dashboard_service_details_grid->StartRec - 1;
if ($view_dashboard_service_details_grid->Recordset && !$view_dashboard_service_details_grid->Recordset->EOF) {
	$view_dashboard_service_details_grid->Recordset->moveFirst();
	$selectLimit = $view_dashboard_service_details_grid->UseSelectLimit;
	if (!$selectLimit && $view_dashboard_service_details_grid->StartRec > 1)
		$view_dashboard_service_details_grid->Recordset->move($view_dashboard_service_details_grid->StartRec - 1);
} elseif (!$view_dashboard_service_details->AllowAddDeleteRow && $view_dashboard_service_details_grid->StopRec == 0) {
	$view_dashboard_service_details_grid->StopRec = $view_dashboard_service_details->GridAddRowCount;
}

// Initialize aggregate
$view_dashboard_service_details->RowType = ROWTYPE_AGGREGATEINIT;
$view_dashboard_service_details->resetAttributes();
$view_dashboard_service_details_grid->renderRow();
if ($view_dashboard_service_details->isGridAdd())
	$view_dashboard_service_details_grid->RowIndex = 0;
if ($view_dashboard_service_details->isGridEdit())
	$view_dashboard_service_details_grid->RowIndex = 0;
while ($view_dashboard_service_details_grid->RecCnt < $view_dashboard_service_details_grid->StopRec) {
	$view_dashboard_service_details_grid->RecCnt++;
	if ($view_dashboard_service_details_grid->RecCnt >= $view_dashboard_service_details_grid->StartRec) {
		$view_dashboard_service_details_grid->RowCnt++;
		if ($view_dashboard_service_details->isGridAdd() || $view_dashboard_service_details->isGridEdit() || $view_dashboard_service_details->isConfirm()) {
			$view_dashboard_service_details_grid->RowIndex++;
			$CurrentForm->Index = $view_dashboard_service_details_grid->RowIndex;
			if ($CurrentForm->hasValue($view_dashboard_service_details_grid->FormActionName) && $view_dashboard_service_details_grid->EventCancelled)
				$view_dashboard_service_details_grid->RowAction = strval($CurrentForm->getValue($view_dashboard_service_details_grid->FormActionName));
			elseif ($view_dashboard_service_details->isGridAdd())
				$view_dashboard_service_details_grid->RowAction = "insert";
			else
				$view_dashboard_service_details_grid->RowAction = "";
		}

		// Set up key count
		$view_dashboard_service_details_grid->KeyCount = $view_dashboard_service_details_grid->RowIndex;

		// Init row class and style
		$view_dashboard_service_details->resetAttributes();
		$view_dashboard_service_details->CssClass = "";
		if ($view_dashboard_service_details->isGridAdd()) {
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
		if ($view_dashboard_service_details->isGridAdd()) // Grid add
			$view_dashboard_service_details->RowType = ROWTYPE_ADD; // Render add
		if ($view_dashboard_service_details->isGridAdd() && $view_dashboard_service_details->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_dashboard_service_details_grid->restoreCurrentRowFormValues($view_dashboard_service_details_grid->RowIndex); // Restore form values
		if ($view_dashboard_service_details->isGridEdit()) { // Grid edit
			if ($view_dashboard_service_details->EventCancelled)
				$view_dashboard_service_details_grid->restoreCurrentRowFormValues($view_dashboard_service_details_grid->RowIndex); // Restore form values
			if ($view_dashboard_service_details_grid->RowAction == "insert")
				$view_dashboard_service_details->RowType = ROWTYPE_ADD; // Render add
			else
				$view_dashboard_service_details->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_dashboard_service_details->isGridEdit() && ($view_dashboard_service_details->RowType == ROWTYPE_EDIT || $view_dashboard_service_details->RowType == ROWTYPE_ADD) && $view_dashboard_service_details->EventCancelled) // Update failed
			$view_dashboard_service_details_grid->restoreCurrentRowFormValues($view_dashboard_service_details_grid->RowIndex); // Restore form values
		if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) // Edit row
			$view_dashboard_service_details_grid->EditRowCnt++;
		if ($view_dashboard_service_details->isConfirm()) // Confirm row
			$view_dashboard_service_details_grid->restoreCurrentRowFormValues($view_dashboard_service_details_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_dashboard_service_details->RowAttrs = array_merge($view_dashboard_service_details->RowAttrs, array('data-rowindex'=>$view_dashboard_service_details_grid->RowCnt, 'id'=>'r' . $view_dashboard_service_details_grid->RowCnt . '_view_dashboard_service_details', 'data-rowtype'=>$view_dashboard_service_details->RowType));

		// Render row
		$view_dashboard_service_details_grid->renderRow();

		// Render list options
		$view_dashboard_service_details_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_dashboard_service_details_grid->RowAction <> "delete" && $view_dashboard_service_details_grid->RowAction <> "insertdelete" && !($view_dashboard_service_details_grid->RowAction == "insert" && $view_dashboard_service_details->isConfirm() && $view_dashboard_service_details_grid->emptyRow())) {
?>
	<tr<?php echo $view_dashboard_service_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_service_details_grid->ListOptions->render("body", "left", $view_dashboard_service_details_grid->RowCnt);
?>
	<?php if ($view_dashboard_service_details->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_dashboard_service_details->PatientId->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_PatientId" class="form-group view_dashboard_service_details_PatientId">
<input type="text" data-table="view_dashboard_service_details" data-field="x_PatientId" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->PatientId->EditValue ?>"<?php echo $view_dashboard_service_details->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_dashboard_service_details->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_PatientId" class="form-group view_dashboard_service_details_PatientId">
<input type="text" data-table="view_dashboard_service_details" data-field="x_PatientId" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->PatientId->EditValue ?>"<?php echo $view_dashboard_service_details->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_PatientId" class="view_dashboard_service_details_PatientId">
<span<?php echo $view_dashboard_service_details->PatientId->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->PatientId->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_dashboard_service_details->PatientId->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_dashboard_service_details->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_dashboard_service_details->PatientId->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_dashboard_service_details->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_dashboard_service_details->PatientName->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_PatientName" class="form-group view_dashboard_service_details_PatientName">
<input type="text" data-table="view_dashboard_service_details" data-field="x_PatientName" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->PatientName->EditValue ?>"<?php echo $view_dashboard_service_details->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_service_details->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_PatientName" class="form-group view_dashboard_service_details_PatientName">
<input type="text" data-table="view_dashboard_service_details" data-field="x_PatientName" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->PatientName->EditValue ?>"<?php echo $view_dashboard_service_details->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_PatientName" class="view_dashboard_service_details_PatientName">
<span<?php echo $view_dashboard_service_details->PatientName->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->PatientName->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_service_details->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_service_details->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_service_details->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_service_details->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->Services->Visible) { // Services ?>
		<td data-name="Services"<?php echo $view_dashboard_service_details->Services->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_Services" class="form-group view_dashboard_service_details_Services">
<input type="text" data-table="view_dashboard_service_details" data-field="x_Services" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->Services->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->Services->EditValue ?>"<?php echo $view_dashboard_service_details->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_dashboard_service_details->Services->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_Services" class="form-group view_dashboard_service_details_Services">
<input type="text" data-table="view_dashboard_service_details" data-field="x_Services" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->Services->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->Services->EditValue ?>"<?php echo $view_dashboard_service_details->Services->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_Services" class="view_dashboard_service_details_Services">
<span<?php echo $view_dashboard_service_details->Services->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->Services->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_dashboard_service_details->Services->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_dashboard_service_details->Services->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_dashboard_service_details->Services->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_dashboard_service_details->Services->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->amount->Visible) { // amount ?>
		<td data-name="amount"<?php echo $view_dashboard_service_details->amount->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_amount" class="form-group view_dashboard_service_details_amount">
<input type="text" data-table="view_dashboard_service_details" data-field="x_amount" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->amount->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->amount->EditValue ?>"<?php echo $view_dashboard_service_details->amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_dashboard_service_details->amount->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_amount" class="form-group view_dashboard_service_details_amount">
<input type="text" data-table="view_dashboard_service_details" data-field="x_amount" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->amount->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->amount->EditValue ?>"<?php echo $view_dashboard_service_details->amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_amount" class="view_dashboard_service_details_amount">
<span<?php echo $view_dashboard_service_details->amount->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->amount->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_dashboard_service_details->amount->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_dashboard_service_details->amount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_dashboard_service_details->amount->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_dashboard_service_details->amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal"<?php echo $view_dashboard_service_details->SubTotal->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_SubTotal" class="form-group view_dashboard_service_details_SubTotal">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->SubTotal->EditValue ?>"<?php echo $view_dashboard_service_details->SubTotal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_dashboard_service_details->SubTotal->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_SubTotal" class="form-group view_dashboard_service_details_SubTotal">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->SubTotal->EditValue ?>"<?php echo $view_dashboard_service_details->SubTotal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_SubTotal" class="view_dashboard_service_details_SubTotal">
<span<?php echo $view_dashboard_service_details->SubTotal->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->SubTotal->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_dashboard_service_details->SubTotal->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_dashboard_service_details->SubTotal->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_dashboard_service_details->SubTotal->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_dashboard_service_details->SubTotal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_dashboard_service_details->createdby->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_createdby" class="form-group view_dashboard_service_details_createdby">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdby" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->createdby->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->createdby->EditValue ?>"<?php echo $view_dashboard_service_details->createdby->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_service_details->createdby->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_createdby" class="form-group view_dashboard_service_details_createdby">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdby" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->createdby->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->createdby->EditValue ?>"<?php echo $view_dashboard_service_details->createdby->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_createdby" class="view_dashboard_service_details_createdby">
<span<?php echo $view_dashboard_service_details->createdby->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->createdby->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_service_details->createdby->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_service_details->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_service_details->createdby->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_service_details->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_dashboard_service_details->createddatetime->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_createddatetime" class="form-group view_dashboard_service_details_createddatetime">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->createddatetime->EditValue ?>"<?php echo $view_dashboard_service_details->createddatetime->editAttributes() ?>>
<?php if (!$view_dashboard_service_details->createddatetime->ReadOnly && !$view_dashboard_service_details->createddatetime->Disabled && !isset($view_dashboard_service_details->createddatetime->EditAttrs["readonly"]) && !isset($view_dashboard_service_details->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_detailsgrid", "x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_service_details->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_createddatetime" class="form-group view_dashboard_service_details_createddatetime">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->createddatetime->EditValue ?>"<?php echo $view_dashboard_service_details->createddatetime->editAttributes() ?>>
<?php if (!$view_dashboard_service_details->createddatetime->ReadOnly && !$view_dashboard_service_details->createddatetime->Disabled && !isset($view_dashboard_service_details->createddatetime->EditAttrs["readonly"]) && !isset($view_dashboard_service_details->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_detailsgrid", "x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_createddatetime" class="view_dashboard_service_details_createddatetime">
<span<?php echo $view_dashboard_service_details->createddatetime->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_service_details->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_service_details->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_service_details->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_service_details->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate"<?php echo $view_dashboard_service_details->createdDate->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_service_details->createdDate->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_createdDate" class="form-group view_dashboard_service_details_createdDate">
<span<?php echo $view_dashboard_service_details->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->createdDate->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode(FormatDateTime($view_dashboard_service_details->createdDate->CurrentValue, 7)) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_createdDate" class="form-group view_dashboard_service_details_createdDate">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->createdDate->EditValue ?>"<?php echo $view_dashboard_service_details->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_details->createdDate->ReadOnly && !$view_dashboard_service_details->createdDate->Disabled && !isset($view_dashboard_service_details->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_details->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_detailsgrid", "x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_details->createdDate->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_service_details->createdDate->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_createdDate" class="form-group view_dashboard_service_details_createdDate">
<span<?php echo $view_dashboard_service_details->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->createdDate->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode(FormatDateTime($view_dashboard_service_details->createdDate->CurrentValue, 7)) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_createdDate" class="form-group view_dashboard_service_details_createdDate">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->createdDate->EditValue ?>"<?php echo $view_dashboard_service_details->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_details->createdDate->ReadOnly && !$view_dashboard_service_details->createdDate->Disabled && !isset($view_dashboard_service_details->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_details->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_detailsgrid", "x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_createdDate" class="view_dashboard_service_details_createdDate">
<span<?php echo $view_dashboard_service_details->createdDate->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->createdDate->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_details->createdDate->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_details->createdDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_details->createdDate->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_details->createdDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DrName->Visible) { // DrName ?>
		<td data-name="DrName"<?php echo $view_dashboard_service_details->DrName->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_DrName" class="form-group view_dashboard_service_details_DrName">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName"><?php echo strval($view_dashboard_service_details->DrName->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_dashboard_service_details->DrName->ViewValue) : $view_dashboard_service_details->DrName->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_dashboard_service_details->DrName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_dashboard_service_details->DrName->ReadOnly || $view_dashboard_service_details->DrName->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_dashboard_service_details->DrName->Lookup->getParamTag("p_x" . $view_dashboard_service_details_grid->RowIndex . "_DrName") ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_dashboard_service_details->DrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" value="<?php echo $view_dashboard_service_details->DrName->CurrentValue ?>"<?php echo $view_dashboard_service_details->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_dashboard_service_details->DrName->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_DrName" class="form-group view_dashboard_service_details_DrName">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName"><?php echo strval($view_dashboard_service_details->DrName->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_dashboard_service_details->DrName->ViewValue) : $view_dashboard_service_details->DrName->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_dashboard_service_details->DrName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_dashboard_service_details->DrName->ReadOnly || $view_dashboard_service_details->DrName->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_dashboard_service_details->DrName->Lookup->getParamTag("p_x" . $view_dashboard_service_details_grid->RowIndex . "_DrName") ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_dashboard_service_details->DrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" value="<?php echo $view_dashboard_service_details->DrName->CurrentValue ?>"<?php echo $view_dashboard_service_details->DrName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_DrName" class="view_dashboard_service_details_DrName">
<span<?php echo $view_dashboard_service_details->DrName->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->DrName->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_dashboard_service_details->DrName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_dashboard_service_details->DrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_dashboard_service_details->DrName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_dashboard_service_details->DrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DRDepartment->Visible) { // DRDepartment ?>
		<td data-name="DRDepartment"<?php echo $view_dashboard_service_details->DRDepartment->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_DRDepartment" class="form-group view_dashboard_service_details_DRDepartment">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->DRDepartment->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->DRDepartment->EditValue ?>"<?php echo $view_dashboard_service_details->DRDepartment->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" value="<?php echo HtmlEncode($view_dashboard_service_details->DRDepartment->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_DRDepartment" class="form-group view_dashboard_service_details_DRDepartment">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->DRDepartment->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->DRDepartment->EditValue ?>"<?php echo $view_dashboard_service_details->DRDepartment->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_DRDepartment" class="view_dashboard_service_details_DRDepartment">
<span<?php echo $view_dashboard_service_details->DRDepartment->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->DRDepartment->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" value="<?php echo HtmlEncode($view_dashboard_service_details->DRDepartment->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" value="<?php echo HtmlEncode($view_dashboard_service_details->DRDepartment->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" value="<?php echo HtmlEncode($view_dashboard_service_details->DRDepartment->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" value="<?php echo HtmlEncode($view_dashboard_service_details->DRDepartment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode"<?php echo $view_dashboard_service_details->ItemCode->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_ItemCode" class="form-group view_dashboard_service_details_ItemCode">
<input type="text" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->ItemCode->EditValue ?>"<?php echo $view_dashboard_service_details->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_dashboard_service_details->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_ItemCode" class="form-group view_dashboard_service_details_ItemCode">
<input type="text" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->ItemCode->EditValue ?>"<?php echo $view_dashboard_service_details->ItemCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_ItemCode" class="view_dashboard_service_details_ItemCode">
<span<?php echo $view_dashboard_service_details->ItemCode->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->ItemCode->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_dashboard_service_details->ItemCode->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_dashboard_service_details->ItemCode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_dashboard_service_details->ItemCode->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_dashboard_service_details->ItemCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd"<?php echo $view_dashboard_service_details->DEptCd->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_DEptCd" class="form-group view_dashboard_service_details_DEptCd">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->DEptCd->EditValue ?>"<?php echo $view_dashboard_service_details->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_dashboard_service_details->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_DEptCd" class="form-group view_dashboard_service_details_DEptCd">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->DEptCd->EditValue ?>"<?php echo $view_dashboard_service_details->DEptCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_DEptCd" class="view_dashboard_service_details_DEptCd">
<span<?php echo $view_dashboard_service_details->DEptCd->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->DEptCd->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_dashboard_service_details->DEptCd->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_dashboard_service_details->DEptCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_dashboard_service_details->DEptCd->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_dashboard_service_details->DEptCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->CODE->Visible) { // CODE ?>
		<td data-name="CODE"<?php echo $view_dashboard_service_details->CODE->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_CODE" class="form-group view_dashboard_service_details_CODE">
<input type="text" data-table="view_dashboard_service_details" data-field="x_CODE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->CODE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->CODE->EditValue ?>"<?php echo $view_dashboard_service_details->CODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_dashboard_service_details->CODE->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_CODE" class="form-group view_dashboard_service_details_CODE">
<input type="text" data-table="view_dashboard_service_details" data-field="x_CODE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->CODE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->CODE->EditValue ?>"<?php echo $view_dashboard_service_details->CODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_CODE" class="view_dashboard_service_details_CODE">
<span<?php echo $view_dashboard_service_details->CODE->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->CODE->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_dashboard_service_details->CODE->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_dashboard_service_details->CODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_dashboard_service_details->CODE->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_dashboard_service_details->CODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE"<?php echo $view_dashboard_service_details->SERVICE->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_SERVICE" class="form-group view_dashboard_service_details_SERVICE">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->SERVICE->EditValue ?>"<?php echo $view_dashboard_service_details->SERVICE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_SERVICE" class="form-group view_dashboard_service_details_SERVICE">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->SERVICE->EditValue ?>"<?php echo $view_dashboard_service_details->SERVICE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_SERVICE" class="view_dashboard_service_details_SERVICE">
<span<?php echo $view_dashboard_service_details->SERVICE->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->SERVICE->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE"<?php echo $view_dashboard_service_details->SERVICE_TYPE->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_service_details->SERVICE_TYPE->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_SERVICE_TYPE" class="form-group view_dashboard_service_details_SERVICE_TYPE">
<span<?php echo $view_dashboard_service_details->SERVICE_TYPE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->SERVICE_TYPE->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE_TYPE->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_SERVICE_TYPE" class="form-group view_dashboard_service_details_SERVICE_TYPE">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->SERVICE_TYPE->EditValue ?>"<?php echo $view_dashboard_service_details->SERVICE_TYPE->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE_TYPE->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_service_details->SERVICE_TYPE->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_SERVICE_TYPE" class="form-group view_dashboard_service_details_SERVICE_TYPE">
<span<?php echo $view_dashboard_service_details->SERVICE_TYPE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->SERVICE_TYPE->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE_TYPE->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_SERVICE_TYPE" class="form-group view_dashboard_service_details_SERVICE_TYPE">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->SERVICE_TYPE->EditValue ?>"<?php echo $view_dashboard_service_details->SERVICE_TYPE->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_SERVICE_TYPE" class="view_dashboard_service_details_SERVICE_TYPE">
<span<?php echo $view_dashboard_service_details->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->SERVICE_TYPE->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE_TYPE->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE_TYPE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE_TYPE->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE_TYPE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT"<?php echo $view_dashboard_service_details->DEPARTMENT->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_service_details->DEPARTMENT->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_DEPARTMENT" class="form-group view_dashboard_service_details_DEPARTMENT">
<span<?php echo $view_dashboard_service_details->DEPARTMENT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->DEPARTMENT->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details->DEPARTMENT->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_DEPARTMENT" class="form-group view_dashboard_service_details_DEPARTMENT">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->DEPARTMENT->EditValue ?>"<?php echo $view_dashboard_service_details->DEPARTMENT->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details->DEPARTMENT->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_service_details->DEPARTMENT->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_DEPARTMENT" class="form-group view_dashboard_service_details_DEPARTMENT">
<span<?php echo $view_dashboard_service_details->DEPARTMENT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->DEPARTMENT->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details->DEPARTMENT->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_DEPARTMENT" class="form-group view_dashboard_service_details_DEPARTMENT">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->DEPARTMENT->EditValue ?>"<?php echo $view_dashboard_service_details->DEPARTMENT->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_DEPARTMENT" class="view_dashboard_service_details_DEPARTMENT">
<span<?php echo $view_dashboard_service_details->DEPARTMENT->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->DEPARTMENT->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details->DEPARTMENT->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details->DEPARTMENT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details->DEPARTMENT->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details->DEPARTMENT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_dashboard_service_details->HospID->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_service_details->HospID->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_HospID" class="form-group view_dashboard_service_details_HospID">
<span<?php echo $view_dashboard_service_details->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details->HospID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_HospID" class="form-group view_dashboard_service_details_HospID">
<?php
$wrkonchange = "" . trim(@$view_dashboard_service_details->HospID->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_dashboard_service_details->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" class="text-nowrap" style="z-index: <?php echo (9000 - $view_dashboard_service_details_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="sv_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo RemoveHtml($view_dashboard_service_details->HospID->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_service_details->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_service_details->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_service_details->HospID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details->HospID->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_dashboard_service_detailsgrid.createAutoSuggest({"id":"x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID","forceSelect":false});
</script>
<?php echo $view_dashboard_service_details->HospID->Lookup->getParamTag("p_x" . $view_dashboard_service_details_grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_service_details->HospID->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_HospID" class="form-group view_dashboard_service_details_HospID">
<span<?php echo $view_dashboard_service_details->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details->HospID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_HospID" class="form-group view_dashboard_service_details_HospID">
<?php
$wrkonchange = "" . trim(@$view_dashboard_service_details->HospID->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_dashboard_service_details->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" class="text-nowrap" style="z-index: <?php echo (9000 - $view_dashboard_service_details_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="sv_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo RemoveHtml($view_dashboard_service_details->HospID->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_service_details->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_service_details->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_service_details->HospID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details->HospID->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_dashboard_service_detailsgrid.createAutoSuggest({"id":"x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID","forceSelect":false});
</script>
<?php echo $view_dashboard_service_details->HospID->Lookup->getParamTag("p_x" . $view_dashboard_service_details_grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_HospID" class="view_dashboard_service_details_HospID">
<span<?php echo $view_dashboard_service_details->HospID->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details->HospID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details->HospID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->vid->Visible) { // vid ?>
		<td data-name="vid"<?php echo $view_dashboard_service_details->vid->cellAttributes() ?>>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" value="<?php echo HtmlEncode($view_dashboard_service_details->vid->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_vid" class="form-group view_dashboard_service_details_vid">
<span<?php echo $view_dashboard_service_details->vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->vid->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" value="<?php echo HtmlEncode($view_dashboard_service_details->vid->CurrentValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_details_grid->RowCnt ?>_view_dashboard_service_details_vid" class="view_dashboard_service_details_vid">
<span<?php echo $view_dashboard_service_details->vid->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->vid->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" value="<?php echo HtmlEncode($view_dashboard_service_details->vid->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" value="<?php echo HtmlEncode($view_dashboard_service_details->vid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" name="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" id="fview_dashboard_service_detailsgrid$x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" value="<?php echo HtmlEncode($view_dashboard_service_details->vid->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" name="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" id="fview_dashboard_service_detailsgrid$o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" value="<?php echo HtmlEncode($view_dashboard_service_details->vid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_service_details_grid->ListOptions->render("body", "right", $view_dashboard_service_details_grid->RowCnt);
?>
	</tr>
<?php if ($view_dashboard_service_details->RowType == ROWTYPE_ADD || $view_dashboard_service_details->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_dashboard_service_detailsgrid.updateLists(<?php echo $view_dashboard_service_details_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_dashboard_service_details->isGridAdd() || $view_dashboard_service_details->CurrentMode == "copy")
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
		$view_dashboard_service_details->RowAttrs = array_merge($view_dashboard_service_details->RowAttrs, array('data-rowindex'=>$view_dashboard_service_details_grid->RowIndex, 'id'=>'r0_view_dashboard_service_details', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_dashboard_service_details->RowAttrs["class"], "ew-template");
		$view_dashboard_service_details->RowType = ROWTYPE_ADD;

		// Render row
		$view_dashboard_service_details_grid->renderRow();

		// Render list options
		$view_dashboard_service_details_grid->renderListOptions();
		$view_dashboard_service_details_grid->StartRowCnt = 0;
?>
	<tr<?php echo $view_dashboard_service_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_service_details_grid->ListOptions->render("body", "left", $view_dashboard_service_details_grid->RowIndex);
?>
	<?php if ($view_dashboard_service_details->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_PatientId" class="form-group view_dashboard_service_details_PatientId">
<input type="text" data-table="view_dashboard_service_details" data-field="x_PatientId" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->PatientId->EditValue ?>"<?php echo $view_dashboard_service_details->PatientId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_PatientId" class="form-group view_dashboard_service_details_PatientId">
<span<?php echo $view_dashboard_service_details->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_dashboard_service_details->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_dashboard_service_details->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_PatientName" class="form-group view_dashboard_service_details_PatientName">
<input type="text" data-table="view_dashboard_service_details" data-field="x_PatientName" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->PatientName->EditValue ?>"<?php echo $view_dashboard_service_details->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_PatientName" class="form-group view_dashboard_service_details_PatientName">
<span<?php echo $view_dashboard_service_details->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_service_details->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_service_details->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->Services->Visible) { // Services ?>
		<td data-name="Services">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_Services" class="form-group view_dashboard_service_details_Services">
<input type="text" data-table="view_dashboard_service_details" data-field="x_Services" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->Services->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->Services->EditValue ?>"<?php echo $view_dashboard_service_details->Services->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_Services" class="form-group view_dashboard_service_details_Services">
<span<?php echo $view_dashboard_service_details->Services->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->Services->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_dashboard_service_details->Services->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_dashboard_service_details->Services->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->amount->Visible) { // amount ?>
		<td data-name="amount">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_amount" class="form-group view_dashboard_service_details_amount">
<input type="text" data-table="view_dashboard_service_details" data-field="x_amount" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->amount->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->amount->EditValue ?>"<?php echo $view_dashboard_service_details->amount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_amount" class="form-group view_dashboard_service_details_amount">
<span<?php echo $view_dashboard_service_details->amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->amount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_dashboard_service_details->amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($view_dashboard_service_details->amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_SubTotal" class="form-group view_dashboard_service_details_SubTotal">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->SubTotal->EditValue ?>"<?php echo $view_dashboard_service_details->SubTotal->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_SubTotal" class="form-group view_dashboard_service_details_SubTotal">
<span<?php echo $view_dashboard_service_details->SubTotal->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->SubTotal->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_dashboard_service_details->SubTotal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SubTotal" value="<?php echo HtmlEncode($view_dashboard_service_details->SubTotal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_createdby" class="form-group view_dashboard_service_details_createdby">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdby" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->createdby->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->createdby->EditValue ?>"<?php echo $view_dashboard_service_details->createdby->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_createdby" class="form-group view_dashboard_service_details_createdby">
<span<?php echo $view_dashboard_service_details->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->createdby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_service_details->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_service_details->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_createddatetime" class="form-group view_dashboard_service_details_createddatetime">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->createddatetime->EditValue ?>"<?php echo $view_dashboard_service_details->createddatetime->editAttributes() ?>>
<?php if (!$view_dashboard_service_details->createddatetime->ReadOnly && !$view_dashboard_service_details->createddatetime->Disabled && !isset($view_dashboard_service_details->createddatetime->EditAttrs["readonly"]) && !isset($view_dashboard_service_details->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_detailsgrid", "x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_createddatetime" class="form-group view_dashboard_service_details_createddatetime">
<span<?php echo $view_dashboard_service_details->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->createddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_service_details->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_service_details->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<?php if ($view_dashboard_service_details->createdDate->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_dashboard_service_details_createdDate" class="form-group view_dashboard_service_details_createdDate">
<span<?php echo $view_dashboard_service_details->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->createdDate->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode(FormatDateTime($view_dashboard_service_details->createdDate->CurrentValue, 7)) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_createdDate" class="form-group view_dashboard_service_details_createdDate">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->createdDate->EditValue ?>"<?php echo $view_dashboard_service_details->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_details->createdDate->ReadOnly && !$view_dashboard_service_details->createdDate->Disabled && !isset($view_dashboard_service_details->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_details->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_detailsgrid", "x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_createdDate" class="form-group view_dashboard_service_details_createdDate">
<span<?php echo $view_dashboard_service_details->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->createdDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_details->createdDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_details->createdDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DrName->Visible) { // DrName ?>
		<td data-name="DrName">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_DrName" class="form-group view_dashboard_service_details_DrName">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName"><?php echo strval($view_dashboard_service_details->DrName->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_dashboard_service_details->DrName->ViewValue) : $view_dashboard_service_details->DrName->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_dashboard_service_details->DrName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_dashboard_service_details->DrName->ReadOnly || $view_dashboard_service_details->DrName->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_dashboard_service_details->DrName->Lookup->getParamTag("p_x" . $view_dashboard_service_details_grid->RowIndex . "_DrName") ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_dashboard_service_details->DrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" value="<?php echo $view_dashboard_service_details->DrName->CurrentValue ?>"<?php echo $view_dashboard_service_details->DrName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_DrName" class="form-group view_dashboard_service_details_DrName">
<span<?php echo $view_dashboard_service_details->DrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->DrName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_dashboard_service_details->DrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_dashboard_service_details->DrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DRDepartment->Visible) { // DRDepartment ?>
		<td data-name="DRDepartment">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_DRDepartment" class="form-group view_dashboard_service_details_DRDepartment">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->DRDepartment->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->DRDepartment->EditValue ?>"<?php echo $view_dashboard_service_details->DRDepartment->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_DRDepartment" class="form-group view_dashboard_service_details_DRDepartment">
<span<?php echo $view_dashboard_service_details->DRDepartment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->DRDepartment->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" value="<?php echo HtmlEncode($view_dashboard_service_details->DRDepartment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DRDepartment" value="<?php echo HtmlEncode($view_dashboard_service_details->DRDepartment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_ItemCode" class="form-group view_dashboard_service_details_ItemCode">
<input type="text" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->ItemCode->EditValue ?>"<?php echo $view_dashboard_service_details->ItemCode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_ItemCode" class="form-group view_dashboard_service_details_ItemCode">
<span<?php echo $view_dashboard_service_details->ItemCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->ItemCode->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_dashboard_service_details->ItemCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_dashboard_service_details->ItemCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_DEptCd" class="form-group view_dashboard_service_details_DEptCd">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->DEptCd->EditValue ?>"<?php echo $view_dashboard_service_details->DEptCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_DEptCd" class="form-group view_dashboard_service_details_DEptCd">
<span<?php echo $view_dashboard_service_details->DEptCd->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->DEptCd->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_dashboard_service_details->DEptCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_dashboard_service_details->DEptCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->CODE->Visible) { // CODE ?>
		<td data-name="CODE">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_CODE" class="form-group view_dashboard_service_details_CODE">
<input type="text" data-table="view_dashboard_service_details" data-field="x_CODE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->CODE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->CODE->EditValue ?>"<?php echo $view_dashboard_service_details->CODE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_CODE" class="form-group view_dashboard_service_details_CODE">
<span<?php echo $view_dashboard_service_details->CODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->CODE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_dashboard_service_details->CODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_dashboard_service_details->CODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_SERVICE" class="form-group view_dashboard_service_details_SERVICE">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->SERVICE->EditValue ?>"<?php echo $view_dashboard_service_details->SERVICE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_SERVICE" class="form-group view_dashboard_service_details_SERVICE">
<span<?php echo $view_dashboard_service_details->SERVICE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->SERVICE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<?php if ($view_dashboard_service_details->SERVICE_TYPE->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_dashboard_service_details_SERVICE_TYPE" class="form-group view_dashboard_service_details_SERVICE_TYPE">
<span<?php echo $view_dashboard_service_details->SERVICE_TYPE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->SERVICE_TYPE->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE_TYPE->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_SERVICE_TYPE" class="form-group view_dashboard_service_details_SERVICE_TYPE">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->SERVICE_TYPE->EditValue ?>"<?php echo $view_dashboard_service_details->SERVICE_TYPE->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_SERVICE_TYPE" class="form-group view_dashboard_service_details_SERVICE_TYPE">
<span<?php echo $view_dashboard_service_details->SERVICE_TYPE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->SERVICE_TYPE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE_TYPE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE_TYPE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<?php if ($view_dashboard_service_details->DEPARTMENT->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_dashboard_service_details_DEPARTMENT" class="form-group view_dashboard_service_details_DEPARTMENT">
<span<?php echo $view_dashboard_service_details->DEPARTMENT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->DEPARTMENT->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details->DEPARTMENT->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_DEPARTMENT" class="form-group view_dashboard_service_details_DEPARTMENT">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->DEPARTMENT->EditValue ?>"<?php echo $view_dashboard_service_details->DEPARTMENT->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_DEPARTMENT" class="form-group view_dashboard_service_details_DEPARTMENT">
<span<?php echo $view_dashboard_service_details->DEPARTMENT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->DEPARTMENT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details->DEPARTMENT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details->DEPARTMENT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<?php if ($view_dashboard_service_details->HospID->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_dashboard_service_details_HospID" class="form-group view_dashboard_service_details_HospID">
<span<?php echo $view_dashboard_service_details->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details->HospID->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_HospID" class="form-group view_dashboard_service_details_HospID">
<?php
$wrkonchange = "" . trim(@$view_dashboard_service_details->HospID->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_dashboard_service_details->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" class="text-nowrap" style="z-index: <?php echo (9000 - $view_dashboard_service_details_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="sv_x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo RemoveHtml($view_dashboard_service_details->HospID->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_service_details->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_service_details->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_service_details->HospID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details->HospID->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_dashboard_service_detailsgrid.createAutoSuggest({"id":"x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID","forceSelect":false});
</script>
<?php echo $view_dashboard_service_details->HospID->Lookup->getParamTag("p_x" . $view_dashboard_service_details_grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_HospID" class="form-group view_dashboard_service_details_HospID">
<span<?php echo $view_dashboard_service_details->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->vid->Visible) { // vid ?>
		<td data-name="vid">
<?php if (!$view_dashboard_service_details->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_vid" class="form-group view_dashboard_service_details_vid">
<span<?php echo $view_dashboard_service_details->vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_details->vid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" name="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" id="x<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" value="<?php echo HtmlEncode($view_dashboard_service_details->vid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" name="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" id="o<?php echo $view_dashboard_service_details_grid->RowIndex ?>_vid" value="<?php echo HtmlEncode($view_dashboard_service_details->vid->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_service_details_grid->ListOptions->render("body", "right", $view_dashboard_service_details_grid->RowIndex);
?>
<script>
fview_dashboard_service_detailsgrid.updateLists(<?php echo $view_dashboard_service_details_grid->RowIndex ?>);
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
<?php if ($view_dashboard_service_details_grid->TotalRecs > 0 && $view_dashboard_service_details->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_dashboard_service_details_grid->renderListOptions();

// Render list options (footer, left)
$view_dashboard_service_details_grid->ListOptions->render("footer", "left");
?>
	<?php if ($view_dashboard_service_details->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" class="<?php echo $view_dashboard_service_details->PatientId->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_PatientId" class="view_dashboard_service_details_PatientId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" class="<?php echo $view_dashboard_service_details->PatientName->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_PatientName" class="view_dashboard_service_details_PatientName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->Services->Visible) { // Services ?>
		<td data-name="Services" class="<?php echo $view_dashboard_service_details->Services->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_Services" class="view_dashboard_service_details_Services">
		<span class="ew-aggregate"><?php echo $Language->phrase("COUNT") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_details->Services->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->amount->Visible) { // amount ?>
		<td data-name="amount" class="<?php echo $view_dashboard_service_details->amount->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_amount" class="view_dashboard_service_details_amount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_details->amount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" class="<?php echo $view_dashboard_service_details->SubTotal->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_SubTotal" class="view_dashboard_service_details_SubTotal">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_details->SubTotal->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->createdby->Visible) { // createdby ?>
		<td data-name="createdby" class="<?php echo $view_dashboard_service_details->createdby->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_createdby" class="view_dashboard_service_details_createdby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" class="<?php echo $view_dashboard_service_details->createddatetime->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_createddatetime" class="view_dashboard_service_details_createddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate" class="<?php echo $view_dashboard_service_details->createdDate->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_createdDate" class="view_dashboard_service_details_createdDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DrName->Visible) { // DrName ?>
		<td data-name="DrName" class="<?php echo $view_dashboard_service_details->DrName->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DrName" class="view_dashboard_service_details_DrName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DRDepartment->Visible) { // DRDepartment ?>
		<td data-name="DRDepartment" class="<?php echo $view_dashboard_service_details->DRDepartment->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DRDepartment" class="view_dashboard_service_details_DRDepartment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" class="<?php echo $view_dashboard_service_details->ItemCode->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_ItemCode" class="view_dashboard_service_details_ItemCode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" class="<?php echo $view_dashboard_service_details->DEptCd->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DEptCd" class="view_dashboard_service_details_DEptCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->CODE->Visible) { // CODE ?>
		<td data-name="CODE" class="<?php echo $view_dashboard_service_details->CODE->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_CODE" class="view_dashboard_service_details_CODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE" class="<?php echo $view_dashboard_service_details->SERVICE->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_SERVICE" class="view_dashboard_service_details_SERVICE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE" class="<?php echo $view_dashboard_service_details->SERVICE_TYPE->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_SERVICE_TYPE" class="view_dashboard_service_details_SERVICE_TYPE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_details->DEPARTMENT->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DEPARTMENT" class="view_dashboard_service_details_DEPARTMENT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_dashboard_service_details->HospID->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_HospID" class="view_dashboard_service_details_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->vid->Visible) { // vid ?>
		<td data-name="vid" class="<?php echo $view_dashboard_service_details->vid->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_vid" class="view_dashboard_service_details_vid">
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
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($view_dashboard_service_details_grid->Recordset)
	$view_dashboard_service_details_grid->Recordset->Close();
?>
</div>
<?php if ($view_dashboard_service_details_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_dashboard_service_details_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_dashboard_service_details_grid->TotalRecs == 0 && !$view_dashboard_service_details->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_dashboard_service_details_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_dashboard_service_details_grid->terminate();
?>
<?php if (!$view_dashboard_service_details->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_dashboard_service_details", "95%", "");
</script>
<?php } ?>