<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewReportRevenue1List = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_report_revenue1list;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_report_revenue1list = currentForm = new ew.Form("fview_report_revenue1list", "list");
    fview_report_revenue1list.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_report_revenue1list");
});
var fview_report_revenue1listsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_report_revenue1listsrch = currentSearchForm = new ew.Form("fview_report_revenue1listsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_report_revenue1")) ?>,
        fields = currentTable.fields;
    fview_report_revenue1listsrch.addFields([
        ["Date", [ew.Validators.datetime(7)], fields.Date.isInvalid],
        ["y_Date", [ew.Validators.between], false],
        ["BillType", [], fields.BillType.isInvalid],
        ["TotalAmount", [], fields.TotalAmount.isInvalid],
        ["HospID", [], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_report_revenue1listsrch.setInvalid();
    });

    // Validate form
    fview_report_revenue1listsrch.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj),
            rowIndex = "";
        $fobj.data("rowindex", rowIndex);

        // Validate fields
        if (!this.validateFields(rowIndex))
            return false;

        // Call Form_CustomValidate event
        if (!this.customValidate(fobj)) {
            this.focus();
            return false;
        }
        return true;
    }

    // Form_CustomValidate
    fview_report_revenue1listsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_report_revenue1listsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_report_revenue1listsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_report_revenue1listsrch");
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
    loadjs(ew.PATH_BASE + "js/ewpreview.js", "preview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($Page->TotalRecords > 0 && $Page->ExportOptions->visible()) { ?>
<?php $Page->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->ImportOptions->visible()) { ?>
<?php $Page->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->SearchOptions->visible()) { ?>
<?php $Page->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($Page->FilterOptions->visible()) { ?>
<?php $Page->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fview_report_revenue1listsrch" id="fview_report_revenue1listsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_report_revenue1listsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_report_revenue1">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->Date->Visible) { // Date ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Date" class="ew-cell form-group">
        <label for="x_Date" class="ew-search-caption ew-label"><?= $Page->Date->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_Date" id="z_Date" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->Date->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->Date->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->Date->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->Date->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->Date->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->Date->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->Date->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->Date->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->Date->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_report_revenue1_Date" class="ew-search-field">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="view_report_revenue1" data-field="x_Date" data-format="7" name="x_Date" id="x_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue ?>"<?= $Page->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage(false) ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_report_revenue1listsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_report_revenue1listsrch", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_report_revenue1_Date" class="ew-search-field2 d-none">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="view_report_revenue1" data-field="x_Date" data-format="7" name="y_Date" id="y_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue2 ?>"<?= $Page->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage(false) ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_report_revenue1listsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_report_revenue1listsrch", "y_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow > 0) { ?>
</div>
    <?php } ?>
<div id="xsr_<?= $Page->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
    <div class="ew-quick-search input-group">
        <input type="text" name="<?= Config("TABLE_BASIC_SEARCH") ?>" id="<?= Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?= HtmlEncode($Page->BasicSearch->getKeyword()) ?>" placeholder="<?= HtmlEncode($Language->phrase("Search")) ?>">
        <input type="hidden" name="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?= HtmlEncode($Page->BasicSearch->getType()) ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?= $Language->phrase("SearchBtn") ?></button>
            <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?= $Page->BasicSearch->getTypeNameShort() ?></span></button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?= $Language->phrase("QuickSearchAuto") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?= $Language->phrase("QuickSearchExact") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?= $Language->phrase("QuickSearchAll") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?= $Language->phrase("QuickSearchAny") ?></a>
            </div>
        </div>
    </div>
</div>
    </div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_report_revenue1">
<?php if (!$Page->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_report_revenue1list" id="fview_report_revenue1list" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_report_revenue1">
<div id="gmp_view_report_revenue1" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_report_revenue1list" class="table ew-table d-none"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left", "", "block", $Page->TableVar, "view_report_revenue1list");
?>
<?php if ($Page->Date->Visible) { // Date ?>
        <th data-name="Date" class="<?= $Page->Date->headerCellClass() ?>"><div id="elh_view_report_revenue1_Date" class="view_report_revenue1_Date"><?= $Page->renderSort($Page->Date) ?></div></th>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <th data-name="BillType" class="<?= $Page->BillType->headerCellClass() ?>"><div id="elh_view_report_revenue1_BillType" class="view_report_revenue1_BillType"><?= $Page->renderSort($Page->BillType) ?></div></th>
<?php } ?>
<?php if ($Page->TotalAmount->Visible) { // TotalAmount ?>
        <th data-name="TotalAmount" class="<?= $Page->TotalAmount->headerCellClass() ?>"><div id="elh_view_report_revenue1_TotalAmount" class="view_report_revenue1_TotalAmount"><?= $Page->renderSort($Page->TotalAmount) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_report_revenue1_HospID" class="view_report_revenue1_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right", "", "block", $Page->TableVar, "view_report_revenue1list");
?>
    </tr>
</thead>
<tbody>
<?php
if ($Page->ExportAll && $Page->isExport()) {
    $Page->StopRecord = $Page->TotalRecords;
} else {
    // Set the last record to display
    if ($Page->TotalRecords > $Page->StartRecord + $Page->DisplayRecords - 1) {
        $Page->StopRecord = $Page->StartRecord + $Page->DisplayRecords - 1;
    } else {
        $Page->StopRecord = $Page->TotalRecords;
    }
}
$Page->RecordCount = $Page->StartRecord - 1;
if ($Page->Recordset && !$Page->Recordset->EOF) {
    // Nothing to do
} elseif (!$Page->AllowAddDeleteRow && $Page->StopRecord == 0) {
    $Page->StopRecord = $Page->GridAddRowCount;
}

// Initialize aggregate
$Page->RowType = ROWTYPE_AGGREGATEINIT;
$Page->resetAttributes();
$Page->renderRow();
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;

        // Set up key count
        $Page->KeyCount = $Page->RowIndex;

        // Init row class and style
        $Page->resetAttributes();
        $Page->CssClass = "";
        if ($Page->isGridAdd()) {
            $Page->loadRowValues(); // Load default values
            $Page->OldKey = "";
            $Page->setKey($Page->OldKey);
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
            if ($Page->isGridEdit()) {
                $Page->OldKey = $Page->getKey(true); // Get from CurrentValue
                $Page->setKey($Page->OldKey);
            }
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_report_revenue1", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();

        // Save row and cell attributes
        $Page->Attrs[$Page->RowCount] = ["row_attrs" => $Page->rowAttributes(), "cell_attrs" => []];
        $Page->Attrs[$Page->RowCount]["cell_attrs"] = $Page->fieldCellAttributes();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount, "block", $Page->TableVar, "view_report_revenue1list");
?>
    <?php if ($Page->Date->Visible) { // Date ?>
        <td data-name="Date" <?= $Page->Date->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_report_revenue1_Date"><span id="el<?= $Page->RowCount ?>_view_report_revenue1_Date">
<span<?= $Page->Date->viewAttributes() ?>>
<?= $Page->Date->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->BillType->Visible) { // BillType ?>
        <td data-name="BillType" <?= $Page->BillType->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_report_revenue1_BillType"><span id="el<?= $Page->RowCount ?>_view_report_revenue1_BillType">
<span<?= $Page->BillType->viewAttributes() ?>>
<?= $Page->BillType->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->TotalAmount->Visible) { // TotalAmount ?>
        <td data-name="TotalAmount" <?= $Page->TotalAmount->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_report_revenue1_TotalAmount"><span id="el<?= $Page->RowCount ?>_view_report_revenue1_TotalAmount">
<span<?= $Page->TotalAmount->viewAttributes() ?>>
<?= $Page->TotalAmount->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_report_revenue1_HospID"><span id="el<?= $Page->RowCount ?>_view_report_revenue1_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount, "block", $Page->TableVar, "view_report_revenue1list");
?>
    </tr>
<?php
    }
    if (!$Page->isGridAdd()) {
        $Page->Recordset->moveNext();
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<div id="tpd_view_report_revenue1list" class="ew-custom-template"></div>
<template id="tpm_view_report_revenue1list">
<div id="ct_ViewReportRevenue1List"><?php if ($Page->RowCount > 0) { ?>
<table  style="width:100%">
  <thead>
  </thead>
  <tbody>
<?php for ($i = $Page->StartRowCount; $i <= $Page->RowCount; $i++) { ?>
  <tr>
	</tr>
<?php } ?>
</tbody>
  <?php if ($Page->TotalRecords > 0 && !$view_report_revenue1->isGridAdd() && !$view_report_revenue1->isGridEdit()) { ?>
<tfoot>
  </tfoot>
<?php } ?>  
</table>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Deptment Wise</h3>
	</div>
	<div class="card-body p-0">
<?php
$dbhelper = &DbHelper();
$Typpe = $view_report_revenue1->Date->AdvancedSearch->SearchOperator; //$_GET["z_createddate"];
$fromdte = $view_report_revenue1->Date->AdvancedSearch->SearchValue; //$_GET["z_createddate"];
$todate = $view_report_revenue1->Date->AdvancedSearch->SearchValue2; //$_GET["x_createddate"]
	$fromdte =  explode("/",$fromdte);
	if(count($fromdte)!=3)
	{
		 $fromdte =  explode("-",$fromdte);        
	}
	 $todate =  explode("/",$todate);
	if(count($todate)!=3)
	{
		 $todate =  explode("-",$todate);        
	}
	$fromdte =   $fromdte[2]."-".$fromdte[1]."-".$fromdte[0];
	$todate = $todate[2]."-".$todate[1]."-".$todate[0];
	if($fromdte == "--")
	{
	   $fromdte = date("Y-m-d");
	   $todate = date("Y-m-d");
	}	
	if($todate == "--")
	{
	  // $fromdte = $fromdte;
	   $todate = $fromdte;
	}
	(int)$rowid = 0;
	(int)$CARDsum = 0;
$dataPoints = array();
	$sql = "SELECT 
BillType ,sum(Amount) as TotalAmount 
	 FROM ganeshkumar_bjhims.billing_voucher
	where
createddatetime between '".$fromdte."' and '".$todate."' and HospID='".HospitalID()."' group by BillType, HospID";
	$results2 = $dbhelper->ExecuteRows($sql);
	$VCount = count($results2);
		$hhh = '<table class="table table-striped ew-table ew-export-table" width="100%">
<tr><td></td>
<td><b>BillType</b></td>
<td><b align="right">Amount</b></td></tr>';
for ($x = 0; $x < $VCount; $x++) {
				$UserName =  $results2[$x]["BillType"];				
$CARD =  $results2[$x]["TotalAmount"];
$CARDsum = $CARDsum + $CARD;
$bbbhhh =  "'".$UserName."'";
$hhh .= '<tr id="row'.$rowid.'"><td><i  onclick="selectedItemA(this, '.$rowid.', '.$bbbhhh.' )" id="'.$DEPARTMENT.'" class="fas fa-plus-square circle-icon"></i></td>  <td>'.$UserName.'</td><td align="right">'.$CARD.'</td></tr>  ';
	(int)$rowid = (int)$rowid + 1;
				$product_item=array(
"label"=> $UserName ,
 "y"=> $CARD
);
array_push($dataPoints , $product_item);
}
	$sql = "SELECT 
 'PH' as BillType ,sum(Amount) as TotalAmount 
	 FROM ganeshkumar_bjhims.pharmacy_billing_voucher
	where
createddatetime between '".$fromdte."' and '".$todate."' and HospID='".HospitalID()."' group by  HospID";
	$results2 = $dbhelper->ExecuteRows($sql);
	$VCount = count($results2);
for ($x = 0; $x < $VCount; $x++) {
				$UserName =  $results2[$x]["BillType"];				
$CARD =  $results2[$x]["TotalAmount"];
$CARDsum = $CARDsum + $CARD;
$hhh .= '<tr id="rowBB'.$rowid.'"><td><i  onclick="selectedItemB(this, '.$rowid.' )" id="'.$DEPARTMENT.'" class="fas fa-plus-square circle-icon"></i></td> <td>'.$UserName.'</td><td align="right">'.$CARD.'</td></tr>  ';
	(int)$rowid = (int)$rowid + 1;
				$product_item=array(
"label"=> $UserName ,
 "y"=> $CARD
);
array_push($dataPoints , $product_item);
}
echo $hhh;
echo '<br> Total = ' . $CARDsum;
?>
	</div>
</div>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<?php } ?>
</div>
</template>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$Page->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Page->Recordset) {
    $Page->Recordset->close();
}
?>
<?php if (!$Page->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Page->TotalRecords == 0 && !$Page->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_view_report_revenue1list", "tpm_view_report_revenue1list", "view_report_revenue1list", "<?= $Page->CustomExport ?>", ew.templateData);
    loadjs.done("customtemplate");
});
</script>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("view_report_revenue1");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    // Write your table-specific startup script here
    // document.write("page loaded");
    function selectedItemPharmachy(item, rowID, Services)
    {
     //alert(item.id);
     // $fromdte = date("Y-m-d");
    //	   $todate 
    	var fromdte = "<?php echo $fromdte; ?>";
    	var todate = "<?php echo $todate; ?>";
    	var HospitalID = "<?php echo HospitalID(); ?>";
    	var Itemmed = Services ; // item.id;
     								var user = [{
    									'fromdte': fromdte,
    									'todate': todate,
    									'HospitalID': HospitalID,
    									'Itemmed': Itemmed
    								}];
    								var jsonString = JSON.stringify(user);
    								$.ajax({
    									type: "GET",
    									url: "ajaxinsert.php?control=ServiceWiseBillNoPharmacy",
    									data: { data: jsonString },
    									cache: false,
    									success: function (data) {
    										let jsonObject = JSON.parse(data);
    										var json = jsonObject["records"];
    				var umAmount = 0;
    					$("#ServicTableRow").empty();
    		var	hhh = '<table id="ServicTableRow" class="table table-striped ew-table ew-export-table" width="100%"><tr><td style="width:10px;" ></td><td><b>Date</b></td><td><b>PatientId</b></td><td><b>PatientName</b></td><td><b align="right">Amount</b></td></tr>';									
    										for (var i = 0; i < json.length; i++) {
    											var obj = json[i];
    				var	createddate =  obj.createddate;											
    			var	PatientId =  obj.PatientId;
    			var	PatientName =  obj.PatientName;				
    			var	Mobile =  obj.Mobile;
    			var	amount =  obj.amount;
    			var	Vid =  obj.id;
    			var	hhh = hhh + '<tr><td><a href="pharmacy_billing_voucherview.php?showdetail=&id='+Vid+'" class="fas fa-search"></a> <a href="pharmacy_billing_voucheredit.php?showdetail=pharmacy_pharled&id='+ Vid +'" class="fas fa-edit"></a> </td> <td>' + createddate + '</td> <td>' + PatientId + '</td><td>' + PatientName + '</td><td align="right">' + amount + '</td></tr>  ';
    			umAmount = parseInt(umAmount) + parseInt(amount);
    										}
    hhh = hhh +  '<tr><td></td><td></td><td align="right">Total</td><td align="right">' + umAmount.toFixed(2) + '</td></tr></table>  ';
    		var rr = '#rowAABB' + rowID;
    		$(rr).after(hhh);

    //var x = document.getElementById(item.id).parentElement;
    //var child = x.childNodes(hhh);
    									}
    	});
    }

    function selectedItem(item, rowID)
    {
     //alert(item.id);
     // $fromdte = date("Y-m-d");
    //	   $todate 
    	var fromdte = "<?php echo $fromdte; ?>";
    	var todate = "<?php echo $todate; ?>";
    	var HospitalID = "<?php echo HospitalID(); ?>";
    	var Itemmed = item.id;
     								var user = [{
    									'fromdte': fromdte,
    									'todate': todate,
    									'HospitalID': HospitalID,
    									'Itemmed': Itemmed
    								}];
    								var jsonString = JSON.stringify(user);
    								$.ajax({
    									type: "GET",
    									url: "ajaxinsert.php?control=ServiceWiseBillNoBBBBBB",
    									data: { data: jsonString },
    									cache: false,
    									success: function (data) {
    										let jsonObject = JSON.parse(data);
    										var json = jsonObject["records"];
    				var umAmount = 0;
    					$("#ServicTableRow").empty();
    		var	hhh = '<table id="ServicTableRow" class="table table-striped ew-table ew-export-table" width="100%"><tr><td style="width:10px;" ></td><td><b>Date</b></td><td><b>PatientId</b></td><td><b>PatientName</b></td><td><b align="right">Amount</b></td></tr>';									
    										for (var i = 0; i < json.length; i++) {
    											var obj = json[i];
    				var	createddate =  obj.createddate;											
    			var	PatientId =  obj.PatientId;
    			var	PatientName =  obj.PatientName;				
    			var	Mobile =  obj.Mobile;
    			var	amount =  obj.amount;
    			var	Vid =  obj.Vid;
    			var	hhh = hhh + '<tr><td><a href="view_billing_voucherview.php?showdetail=&id='+Vid+'" class="fas fa-search"></a> <a href="view_billing_voucheredit.php?showdetail=view_patient_services&id='+ Vid +'" class="fas fa-edit"></a> </td> <td>' + createddate + '</td> <td>' + PatientId + '</td><td>' + PatientName + '</td><td align="right">' + amount + '</td></tr>  ';
    			umAmount = parseInt(umAmount) + parseInt(amount);
    										}
    hhh = hhh +  '<tr><td></td><td></td><td align="right">Total</td><td align="right">' + umAmount.toFixed(2) + '</td></tr></table>  ';
    		var rr = '#rowAA' + rowID;
    		$(rr).after(hhh);

    //var x = document.getElementById(item.id).parentElement;
    //var child = x.childNodes(hhh);
    									}
    	});		
    }

    function selectedItemA(item, rowID, uuusseer)
    {
     //alert(item.id);
     // $fromdte = date("Y-m-d");
    //	   $todate 
    	var fromdte = "<?php echo $fromdte; ?>";
    	var todate = "<?php echo $todate; ?>";
    	var HospitalID = "<?php echo HospitalID(); ?>";
     var ressss = uuusseer.replace('"', '');
    	var Itemmed = ressss;
     								var user = [{
    									'fromdte': fromdte,
    									'todate': todate,
    									'HospitalID': HospitalID,
    									'Itemmed': Itemmed
    								}];
    								var jsonString = JSON.stringify(user);
    								$.ajax({
    									type: "GET",
    									url: "ajaxinsert.php?control=ServiceWiseBillNoArevenueAAA",
    									data: { data: jsonString },
    									cache: false,
    									success: function (data) {
    										let jsonObject = JSON.parse(data);
    										var json = jsonObject["records"];
    				var umAmount = 0;
    				var $rowid = 0;
    					$("#ServicTableRowMM").empty();
    		var	hhh = '<table id="ServicTableRowMM" class="table table-striped ew-table ew-export-table" width="100%"><tr><td style="width:10px;" ></td><td><b>Services</b></td><td><b>Count</b></td><td><b align="right">Amount</b></td></tr>';									
    										for (var i = 0; i < json.length; i++) {
    											var obj = json[i];
    			var	Services =  obj.Services;
    			var	amount =  obj.amount;				
    			var	Count =  obj.Count;
    			var	hhh = hhh + '<tr id="rowAA'+$rowid+'"><td><i  onclick="selectedItem(this, ' +$rowid+' )" id="'+Services+'" class="fas fa-plus-square circle-iconA"></i></td><td>' + Services + '</td><td>' + Count + '</td><td align="right">' + amount + '</td></tr>  ';
    			umAmount = parseInt(umAmount) + parseInt(amount);
    		   $rowid = $rowid + 1;
    										}
    hhh = hhh +  '<tr><td></td><td></td><td align="right">Total</td><td align="right">' + umAmount.toFixed(2) + '</td></tr></table>  ';
    		var rr = '#row' + rowID;
    		$(rr).after(hhh);

    //var x = document.getElementById(item.id).parentElement;
    //var child = x.childNodes(hhh);
    									}
    	});		
    }

    function selectedItemB(item, rowID)
    {
    	var fromdte = "<?php echo $fromdte; ?>";
    	var todate = "<?php echo $todate; ?>";
    	var HospitalID = "<?php echo HospitalID(); ?>";
    	var Itemmed = item.id;
     								var user = [{
    									'fromdte': fromdte,
    									'todate': todate,
    									'HospitalID': HospitalID,
    									'Itemmed': Itemmed
    								}];
    								var jsonString = JSON.stringify(user);
    								$.ajax({
    									type: "GET",
    									url: "ajaxinsert.php?control=ServiceWiseBillNoArevenuePharmachy",
    									data: { data: jsonString },
    									cache: false,
    									success: function (data) {
    										let jsonObject = JSON.parse(data);
    										var json = jsonObject["records"];
    				var umAmount = 0;
    				var $rowid = 0;
    					$("#ServicTableRowMM").empty();
    		var	hhh = '<table id="ServicTableRowMM" class="table table-striped ew-table ew-export-table" width="100%"><tr><td style="width:10px;" ></td><td><b>Services</b></td><td><b>Count</b></td><td><b align="right">Amount</b></td></tr>';									
    										for (var i = 0; i < json.length; i++) {
    											var obj = json[i];
    			var	Services =  obj.Services;
    			var	amount =  obj.amount;				
    			var	Count =  obj.Count;
    var	ServicesAA = "'" + Services + "'";
    			var	hhh = hhh + '<tr id="rowAABB'+$rowid+'"><td><i  onclick="selectedItemPharmachy(this, ' +$rowid+', '+ServicesAA+'  )" id="'+Services+'" class="fas fa-plus-square circle-iconA"></i></td><td>' + Services + '</td><td>' + Count + '</td><td align="right">' + amount + '</td></tr>  ';
    			umAmount = parseInt(umAmount) + parseInt(amount);
    		   $rowid = $rowid + 1;
    										}
    hhh = hhh +  '<tr><td></td><td></td><td align="right">Total</td><td align="right">' + umAmount.toFixed(2) + '</td></tr></table>  ';
    		var rr = '#rowBB' + rowID;
    		$(rr).after(hhh);

    //var x = document.getElementById(item.id).parentElement;
    //var child = x.childNodes(hhh);
    									}
    	});		
    }

    function selectedItemBAAAAAAAA(item, rowID)
    {
     //alert(item.id);
     // $fromdte = date("Y-m-d");
    //	   $todate 
    	var fromdte = "<?php echo $fromdte; ?>";
    	var todate = "<?php echo $todate; ?>";
    	var HospitalID = "<?php echo HospitalID(); ?>";
    	var Itemmed = item.id;
     								var user = [{
    									'fromdte': fromdte,
    									'todate': todate,
    									'HospitalID': HospitalID,
    									'Itemmed': Itemmed
    								}];
    								var jsonString = JSON.stringify(user);
    								$.ajax({
    									type: "GET",
    									url: "ajaxinsert.php?control=ServiceWiseBillNoB",
    									data: { data: jsonString },
    									cache: false,
    									success: function (data) {
    										let jsonObject = JSON.parse(data);
    										var json = jsonObject["records"];
    				var umAmount = 0;
    					$("#ServicTableRow").empty();
    		var	hhh = '<table id="ServicTableRow" class="table table-striped ew-table ew-export-table" width="100%"><tr><td style="width:10px;" ></td><td><b>Date</b></td><td><b>PatientId</b></td><td><b>PatientName</b></td><td><b align="right">Amount</b></td></tr>';									
    										for (var i = 0; i < json.length; i++) {
    											var obj = json[i];
    			var	createddate =  obj.createddate;								
    			var	PatientId =  obj.PatientId;
    			var	PatientName =  obj.PatientName;				
    			var	Mobile =  obj.Mobile;
    			var	amount =  obj.amount;
    			var	Vid =  obj.Vid;
    			var	hhh = hhh + '<tr><td><a href="view_billing_voucherview.php?showdetail=&id='+Vid+'" class="fas fa-search"></a> <a href="view_billing_voucheredit.php?showdetail=view_patient_services&id='+ Vid +'" class="fas fa-edit"></a> </td><td>' + createddate + '</td><td>' + PatientId + '</td><td>' + PatientName + '</td><td align="right">' + amount + '</td></tr>  ';
    			umAmount = parseInt(umAmount) + parseInt(amount);
    										}
    hhh = hhh +  '<tr><td></td><td></td><td align="right">Total</td><td align="right">' + umAmount.toFixed(2) + '</td></tr></table>  ';
    		var rr = '#rowBB' + rowID;
    		$(rr).after(hhh);

    //var x = document.getElementById(item.id).parentElement;
    //var child = x.childNodes(hhh);
    									}
    	});		
    }
    </script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
    //window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
    	animationEnabled: true,
    	exportEnabled: true,
    	title:{
    		text: ""
    	},
    	subtitles: [{
    		text: ""
    	}],
    	data: [{
    		type: "pie",
    		showInLegend: "true",
    		legendText: "{label}",
    		indexLabelFontSize: 16,
    		indexLabel: "{label} - #percent%",
    		yValueFormatString: "฿#,##0",
    		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    	}]
    });
    chart.render();

    //}
    </script>
    <style>
    .circle-icon {
    	background: #0073b7;
    	/* width: 4px; */
    	/* height: 10px; */
    	border-radius: 50%;
    	text-align: center;
    	/* line-height: 10px; */
    	vertical-align: middle;
    	padding: 5px;
    	color: white;
    }
    .circle-iconA {
    	background: #28a745;
    	/* width: 4px; */
    	/* height: 10px; */
    	border-radius: 50%;
    	text-align: center;
    	/* line-height: 10px; */
    	vertical-align: middle;
    	padding: 5px;
    	color: white;
    }
    </style>
    <script>
});
</script>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_view_report_revenue1",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
