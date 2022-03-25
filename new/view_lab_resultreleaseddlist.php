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
$view_lab_resultreleasedd_list = new view_lab_resultreleasedd_list();

// Run the page
$view_lab_resultreleasedd_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_resultreleasedd_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_lab_resultreleasedd_list->isExport()) { ?>
<script>
var fview_lab_resultreleaseddlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_lab_resultreleaseddlist = currentForm = new ew.Form("fview_lab_resultreleaseddlist", "list");
	fview_lab_resultreleaseddlist.formKeyCountName = '<?php echo $view_lab_resultreleasedd_list->FormKeyCountName ?>';

	// Validate form
	fview_lab_resultreleaseddlist.validate = function() {
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
			<?php if ($view_lab_resultreleasedd_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->id->caption(), $view_lab_resultreleasedd_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->PatID->caption(), $view_lab_resultreleasedd_list->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd_list->PatID->errorMessage()) ?>");
			<?php if ($view_lab_resultreleasedd_list->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->PatientName->caption(), $view_lab_resultreleasedd_list->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->Age->caption(), $view_lab_resultreleasedd_list->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->Gender->caption(), $view_lab_resultreleasedd_list->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->sid->Required) { ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->sid->caption(), $view_lab_resultreleasedd_list->sid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd_list->sid->errorMessage()) ?>");
			<?php if ($view_lab_resultreleasedd_list->ItemCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ItemCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->ItemCode->caption(), $view_lab_resultreleasedd_list->ItemCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->DEptCd->Required) { ?>
				elm = this.getElements("x" + infix + "_DEptCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->DEptCd->caption(), $view_lab_resultreleasedd_list->DEptCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->Resulted->Required) { ?>
				elm = this.getElements("x" + infix + "_Resulted[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->Resulted->caption(), $view_lab_resultreleasedd_list->Resulted->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->Services->Required) { ?>
				elm = this.getElements("x" + infix + "_Services");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->Services->caption(), $view_lab_resultreleasedd_list->Services->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->LabReport->Required) { ?>
				elm = this.getElements("x" + infix + "_LabReport");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->LabReport->caption(), $view_lab_resultreleasedd_list->LabReport->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->Pic1->Required) { ?>
				felm = this.getElements("x" + infix + "_Pic1");
				elm = this.getElements("fn_x" + infix + "_Pic1");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->Pic1->caption(), $view_lab_resultreleasedd_list->Pic1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->Pic2->Required) { ?>
				felm = this.getElements("x" + infix + "_Pic2");
				elm = this.getElements("fn_x" + infix + "_Pic2");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->Pic2->caption(), $view_lab_resultreleasedd_list->Pic2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->TestUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_TestUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->TestUnit->caption(), $view_lab_resultreleasedd_list->TestUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->RefValue->Required) { ?>
				elm = this.getElements("x" + infix + "_RefValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->RefValue->caption(), $view_lab_resultreleasedd_list->RefValue->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->Order->caption(), $view_lab_resultreleasedd_list->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd_list->Order->errorMessage()) ?>");
			<?php if ($view_lab_resultreleasedd_list->Repeated->Required) { ?>
				elm = this.getElements("x" + infix + "_Repeated[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->Repeated->caption(), $view_lab_resultreleasedd_list->Repeated->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->Vid->Required) { ?>
				elm = this.getElements("x" + infix + "_Vid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->Vid->caption(), $view_lab_resultreleasedd_list->Vid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Vid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd_list->Vid->errorMessage()) ?>");
			<?php if ($view_lab_resultreleasedd_list->invoiceId->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->invoiceId->caption(), $view_lab_resultreleasedd_list->invoiceId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd_list->invoiceId->errorMessage()) ?>");
			<?php if ($view_lab_resultreleasedd_list->DrID->Required) { ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->DrID->caption(), $view_lab_resultreleasedd_list->DrID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd_list->DrID->errorMessage()) ?>");
			<?php if ($view_lab_resultreleasedd_list->DrCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_DrCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->DrCODE->caption(), $view_lab_resultreleasedd_list->DrCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->DrName->Required) { ?>
				elm = this.getElements("x" + infix + "_DrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->DrName->caption(), $view_lab_resultreleasedd_list->DrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->Department->caption(), $view_lab_resultreleasedd_list->Department->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->createddatetime->caption(), $view_lab_resultreleasedd_list->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd_list->createddatetime->errorMessage()) ?>");
			<?php if ($view_lab_resultreleasedd_list->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->status->caption(), $view_lab_resultreleasedd_list->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd_list->status->errorMessage()) ?>");
			<?php if ($view_lab_resultreleasedd_list->TestType->Required) { ?>
				elm = this.getElements("x" + infix + "_TestType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->TestType->caption(), $view_lab_resultreleasedd_list->TestType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->ResultDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->ResultDate->caption(), $view_lab_resultreleasedd_list->ResultDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->ResultedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->ResultedBy->caption(), $view_lab_resultreleasedd_list->ResultedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_resultreleasedd_list->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleasedd_list->HospID->caption(), $view_lab_resultreleasedd_list->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleasedd_list->HospID->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fview_lab_resultreleaseddlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_lab_resultreleaseddlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_lab_resultreleaseddlist.lists["x_Resulted[]"] = <?php echo $view_lab_resultreleasedd_list->Resulted->Lookup->toClientList($view_lab_resultreleasedd_list) ?>;
	fview_lab_resultreleaseddlist.lists["x_Resulted[]"].options = <?php echo JsonEncode($view_lab_resultreleasedd_list->Resulted->options(FALSE, TRUE)) ?>;
	fview_lab_resultreleaseddlist.lists["x_TestUnit"] = <?php echo $view_lab_resultreleasedd_list->TestUnit->Lookup->toClientList($view_lab_resultreleasedd_list) ?>;
	fview_lab_resultreleaseddlist.lists["x_TestUnit"].options = <?php echo JsonEncode($view_lab_resultreleasedd_list->TestUnit->lookupOptions()) ?>;
	fview_lab_resultreleaseddlist.autoSuggests["x_TestUnit"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fview_lab_resultreleaseddlist.lists["x_Repeated[]"] = <?php echo $view_lab_resultreleasedd_list->Repeated->Lookup->toClientList($view_lab_resultreleasedd_list) ?>;
	fview_lab_resultreleaseddlist.lists["x_Repeated[]"].options = <?php echo JsonEncode($view_lab_resultreleasedd_list->Repeated->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_lab_resultreleaseddlist");
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
<?php if (!$view_lab_resultreleasedd_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_lab_resultreleasedd_list->TotalRecords > 0 && $view_lab_resultreleasedd_list->ExportOptions->visible()) { ?>
<?php $view_lab_resultreleasedd_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->ImportOptions->visible()) { ?>
<?php $view_lab_resultreleasedd_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_lab_resultreleasedd_list->isExport() || Config("EXPORT_MASTER_RECORD") && $view_lab_resultreleasedd_list->isExport("print")) { ?>
<?php
if ($view_lab_resultreleasedd_list->DbMasterFilter != "" && $view_lab_resultreleasedd->getCurrentMasterTable() == "view_lab_servicess") {
	if ($view_lab_resultreleasedd_list->MasterRecordExists) {
		include_once "view_lab_servicessmaster.php";
	}
}
?>
<?php } ?>
<?php
$view_lab_resultreleasedd_list->renderOtherOptions();
?>
<?php $view_lab_resultreleasedd_list->showPageHeader(); ?>
<?php
$view_lab_resultreleasedd_list->showMessage();
?>
<?php if ($view_lab_resultreleasedd_list->TotalRecords > 0 || $view_lab_resultreleasedd->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_lab_resultreleasedd_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_resultreleasedd">
<?php if (!$view_lab_resultreleasedd_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_lab_resultreleasedd_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_lab_resultreleasedd_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_resultreleasedd_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_lab_resultreleaseddlist" id="fview_lab_resultreleaseddlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_resultreleasedd">
<?php if ($view_lab_resultreleasedd->getCurrentMasterTable() == "view_lab_servicess" && $view_lab_resultreleasedd->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_lab_servicess">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Vid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_lab_resultreleasedd" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_lab_resultreleasedd_list->TotalRecords > 0 || $view_lab_resultreleasedd_list->isGridEdit()) { ?>
<table id="tbl_view_lab_resultreleaseddlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_lab_resultreleasedd->RowType = ROWTYPE_HEADER;

// Render list options
$view_lab_resultreleasedd_list->renderListOptions();

// Render list options (header, left)
$view_lab_resultreleasedd_list->ListOptions->render("header", "left");
?>
<?php if ($view_lab_resultreleasedd_list->id->Visible) { // id ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_lab_resultreleasedd_list->id->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_id" class="view_lab_resultreleasedd_id"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_lab_resultreleasedd_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->id) ?>', 1);"><div id="elh_view_lab_resultreleasedd_id" class="view_lab_resultreleasedd_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->PatID->Visible) { // PatID ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $view_lab_resultreleasedd_list->PatID->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_PatID" class="view_lab_resultreleasedd_PatID"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $view_lab_resultreleasedd_list->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->PatID) ?>', 1);"><div id="elh_view_lab_resultreleasedd_PatID" class="view_lab_resultreleasedd_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_resultreleasedd_list->PatientName->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_PatientName" class="view_lab_resultreleasedd_PatientName"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_resultreleasedd_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->PatientName) ?>', 1);"><div id="elh_view_lab_resultreleasedd_PatientName" class="view_lab_resultreleasedd_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->Age->Visible) { // Age ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_lab_resultreleasedd_list->Age->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Age" class="view_lab_resultreleasedd_Age"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_lab_resultreleasedd_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Age) ?>', 1);"><div id="elh_view_lab_resultreleasedd_Age" class="view_lab_resultreleasedd_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->Gender->Visible) { // Gender ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_lab_resultreleasedd_list->Gender->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Gender" class="view_lab_resultreleasedd_Gender"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_lab_resultreleasedd_list->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Gender) ?>', 1);"><div id="elh_view_lab_resultreleasedd_Gender" class="view_lab_resultreleasedd_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->sid->Visible) { // sid ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $view_lab_resultreleasedd_list->sid->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_sid" class="view_lab_resultreleasedd_sid"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $view_lab_resultreleasedd_list->sid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->sid) ?>', 1);"><div id="elh_view_lab_resultreleasedd_sid" class="view_lab_resultreleasedd_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->sid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->sid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $view_lab_resultreleasedd_list->ItemCode->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_ItemCode" class="view_lab_resultreleasedd_ItemCode"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $view_lab_resultreleasedd_list->ItemCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->ItemCode) ?>', 1);"><div id="elh_view_lab_resultreleasedd_ItemCode" class="view_lab_resultreleasedd_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->ItemCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->ItemCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->ItemCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $view_lab_resultreleasedd_list->DEptCd->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_DEptCd" class="view_lab_resultreleasedd_DEptCd"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $view_lab_resultreleasedd_list->DEptCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->DEptCd) ?>', 1);"><div id="elh_view_lab_resultreleasedd_DEptCd" class="view_lab_resultreleasedd_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->DEptCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->DEptCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->DEptCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->Resulted->Visible) { // Resulted ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Resulted) == "") { ?>
		<th data-name="Resulted" class="<?php echo $view_lab_resultreleasedd_list->Resulted->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Resulted" class="view_lab_resultreleasedd_Resulted"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Resulted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resulted" class="<?php echo $view_lab_resultreleasedd_list->Resulted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Resulted) ?>', 1);"><div id="elh_view_lab_resultreleasedd_Resulted" class="view_lab_resultreleasedd_Resulted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Resulted->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->Resulted->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->Resulted->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->Services->Visible) { // Services ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $view_lab_resultreleasedd_list->Services->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Services" class="view_lab_resultreleasedd_Services"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $view_lab_resultreleasedd_list->Services->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Services) ?>', 1);"><div id="elh_view_lab_resultreleasedd_Services" class="view_lab_resultreleasedd_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Services->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->Services->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->Services->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->LabReport->Visible) { // LabReport ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->LabReport) == "") { ?>
		<th data-name="LabReport" class="<?php echo $view_lab_resultreleasedd_list->LabReport->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_LabReport" class="view_lab_resultreleasedd_LabReport"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->LabReport->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabReport" class="<?php echo $view_lab_resultreleasedd_list->LabReport->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->LabReport) ?>', 1);"><div id="elh_view_lab_resultreleasedd_LabReport" class="view_lab_resultreleasedd_LabReport">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->LabReport->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->LabReport->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->LabReport->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $view_lab_resultreleasedd_list->Pic1->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Pic1" class="view_lab_resultreleasedd_Pic1"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Pic1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $view_lab_resultreleasedd_list->Pic1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Pic1) ?>', 1);"><div id="elh_view_lab_resultreleasedd_Pic1" class="view_lab_resultreleasedd_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Pic1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->Pic1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->Pic1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $view_lab_resultreleasedd_list->Pic2->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Pic2" class="view_lab_resultreleasedd_Pic2"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Pic2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $view_lab_resultreleasedd_list->Pic2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Pic2) ?>', 1);"><div id="elh_view_lab_resultreleasedd_Pic2" class="view_lab_resultreleasedd_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Pic2->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->Pic2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->Pic2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->TestUnit) == "") { ?>
		<th data-name="TestUnit" class="<?php echo $view_lab_resultreleasedd_list->TestUnit->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_TestUnit" class="view_lab_resultreleasedd_TestUnit"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->TestUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestUnit" class="<?php echo $view_lab_resultreleasedd_list->TestUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->TestUnit) ?>', 1);"><div id="elh_view_lab_resultreleasedd_TestUnit" class="view_lab_resultreleasedd_TestUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->TestUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->TestUnit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->TestUnit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->RefValue->Visible) { // RefValue ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->RefValue) == "") { ?>
		<th data-name="RefValue" class="<?php echo $view_lab_resultreleasedd_list->RefValue->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_RefValue" class="view_lab_resultreleasedd_RefValue"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->RefValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefValue" class="<?php echo $view_lab_resultreleasedd_list->RefValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->RefValue) ?>', 1);"><div id="elh_view_lab_resultreleasedd_RefValue" class="view_lab_resultreleasedd_RefValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->RefValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->RefValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->RefValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->Order->Visible) { // Order ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_lab_resultreleasedd_list->Order->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Order" class="view_lab_resultreleasedd_Order"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_lab_resultreleasedd_list->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Order) ?>', 1);"><div id="elh_view_lab_resultreleasedd_Order" class="view_lab_resultreleasedd_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->Order->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->Order->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->Repeated->Visible) { // Repeated ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Repeated) == "") { ?>
		<th data-name="Repeated" class="<?php echo $view_lab_resultreleasedd_list->Repeated->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Repeated" class="view_lab_resultreleasedd_Repeated"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Repeated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Repeated" class="<?php echo $view_lab_resultreleasedd_list->Repeated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Repeated) ?>', 1);"><div id="elh_view_lab_resultreleasedd_Repeated" class="view_lab_resultreleasedd_Repeated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Repeated->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->Repeated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->Repeated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->Vid->Visible) { // Vid ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $view_lab_resultreleasedd_list->Vid->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Vid" class="view_lab_resultreleasedd_Vid"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $view_lab_resultreleasedd_list->Vid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Vid) ?>', 1);"><div id="elh_view_lab_resultreleasedd_Vid" class="view_lab_resultreleasedd_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->Vid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->Vid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $view_lab_resultreleasedd_list->invoiceId->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_invoiceId" class="view_lab_resultreleasedd_invoiceId"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->invoiceId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $view_lab_resultreleasedd_list->invoiceId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->invoiceId) ?>', 1);"><div id="elh_view_lab_resultreleasedd_invoiceId" class="view_lab_resultreleasedd_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->invoiceId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->invoiceId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->DrID->Visible) { // DrID ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_lab_resultreleasedd_list->DrID->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_DrID" class="view_lab_resultreleasedd_DrID"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_lab_resultreleasedd_list->DrID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->DrID) ?>', 1);"><div id="elh_view_lab_resultreleasedd_DrID" class="view_lab_resultreleasedd_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->DrID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->DrID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->DrCODE) == "") { ?>
		<th data-name="DrCODE" class="<?php echo $view_lab_resultreleasedd_list->DrCODE->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_DrCODE" class="view_lab_resultreleasedd_DrCODE"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->DrCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrCODE" class="<?php echo $view_lab_resultreleasedd_list->DrCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->DrCODE) ?>', 1);"><div id="elh_view_lab_resultreleasedd_DrCODE" class="view_lab_resultreleasedd_DrCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->DrCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->DrCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->DrCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->DrName->Visible) { // DrName ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $view_lab_resultreleasedd_list->DrName->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_DrName" class="view_lab_resultreleasedd_DrName"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $view_lab_resultreleasedd_list->DrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->DrName) ?>', 1);"><div id="elh_view_lab_resultreleasedd_DrName" class="view_lab_resultreleasedd_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->DrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->DrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->Department->Visible) { // Department ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $view_lab_resultreleasedd_list->Department->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Department" class="view_lab_resultreleasedd_Department"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $view_lab_resultreleasedd_list->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->Department) ?>', 1);"><div id="elh_view_lab_resultreleasedd_Department" class="view_lab_resultreleasedd_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->Department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->Department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_lab_resultreleasedd_list->createddatetime->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_createddatetime" class="view_lab_resultreleasedd_createddatetime"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_lab_resultreleasedd_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->createddatetime) ?>', 1);"><div id="elh_view_lab_resultreleasedd_createddatetime" class="view_lab_resultreleasedd_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->status->Visible) { // status ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_lab_resultreleasedd_list->status->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_status" class="view_lab_resultreleasedd_status"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_lab_resultreleasedd_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->status) ?>', 1);"><div id="elh_view_lab_resultreleasedd_status" class="view_lab_resultreleasedd_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->TestType->Visible) { // TestType ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $view_lab_resultreleasedd_list->TestType->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_TestType" class="view_lab_resultreleasedd_TestType"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $view_lab_resultreleasedd_list->TestType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->TestType) ?>', 1);"><div id="elh_view_lab_resultreleasedd_TestType" class="view_lab_resultreleasedd_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->TestType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->TestType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->TestType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $view_lab_resultreleasedd_list->ResultDate->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_ResultDate" class="view_lab_resultreleasedd_ResultDate"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $view_lab_resultreleasedd_list->ResultDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->ResultDate) ?>', 1);"><div id="elh_view_lab_resultreleasedd_ResultDate" class="view_lab_resultreleasedd_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->ResultDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->ResultDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $view_lab_resultreleasedd_list->ResultedBy->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_ResultedBy" class="view_lab_resultreleasedd_ResultedBy"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->ResultedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $view_lab_resultreleasedd_list->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->ResultedBy) ?>', 1);"><div id="elh_view_lab_resultreleasedd_ResultedBy" class="view_lab_resultreleasedd_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->ResultedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->ResultedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->ResultedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_lab_resultreleasedd_list->HospID->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_HospID" class="view_lab_resultreleasedd_HospID"><div class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_lab_resultreleasedd_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_resultreleasedd_list->SortUrl($view_lab_resultreleasedd_list->HospID) ?>', 1);"><div id="elh_view_lab_resultreleasedd_HospID" class="view_lab_resultreleasedd_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleasedd_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleasedd_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleasedd_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_resultreleasedd_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_lab_resultreleasedd_list->ExportAll && $view_lab_resultreleasedd_list->isExport()) {
	$view_lab_resultreleasedd_list->StopRecord = $view_lab_resultreleasedd_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_lab_resultreleasedd_list->TotalRecords > $view_lab_resultreleasedd_list->StartRecord + $view_lab_resultreleasedd_list->DisplayRecords - 1)
		$view_lab_resultreleasedd_list->StopRecord = $view_lab_resultreleasedd_list->StartRecord + $view_lab_resultreleasedd_list->DisplayRecords - 1;
	else
		$view_lab_resultreleasedd_list->StopRecord = $view_lab_resultreleasedd_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($view_lab_resultreleasedd->isConfirm() || $view_lab_resultreleasedd_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_lab_resultreleasedd_list->FormKeyCountName) && ($view_lab_resultreleasedd_list->isGridAdd() || $view_lab_resultreleasedd_list->isGridEdit() || $view_lab_resultreleasedd->isConfirm())) {
		$view_lab_resultreleasedd_list->KeyCount = $CurrentForm->getValue($view_lab_resultreleasedd_list->FormKeyCountName);
		$view_lab_resultreleasedd_list->StopRecord = $view_lab_resultreleasedd_list->StartRecord + $view_lab_resultreleasedd_list->KeyCount - 1;
	}
}
$view_lab_resultreleasedd_list->RecordCount = $view_lab_resultreleasedd_list->StartRecord - 1;
if ($view_lab_resultreleasedd_list->Recordset && !$view_lab_resultreleasedd_list->Recordset->EOF) {
	$view_lab_resultreleasedd_list->Recordset->moveFirst();
	$selectLimit = $view_lab_resultreleasedd_list->UseSelectLimit;
	if (!$selectLimit && $view_lab_resultreleasedd_list->StartRecord > 1)
		$view_lab_resultreleasedd_list->Recordset->move($view_lab_resultreleasedd_list->StartRecord - 1);
} elseif (!$view_lab_resultreleasedd->AllowAddDeleteRow && $view_lab_resultreleasedd_list->StopRecord == 0) {
	$view_lab_resultreleasedd_list->StopRecord = $view_lab_resultreleasedd->GridAddRowCount;
}

// Initialize aggregate
$view_lab_resultreleasedd->RowType = ROWTYPE_AGGREGATEINIT;
$view_lab_resultreleasedd->resetAttributes();
$view_lab_resultreleasedd_list->renderRow();
if ($view_lab_resultreleasedd_list->isGridEdit())
	$view_lab_resultreleasedd_list->RowIndex = 0;
while ($view_lab_resultreleasedd_list->RecordCount < $view_lab_resultreleasedd_list->StopRecord) {
	$view_lab_resultreleasedd_list->RecordCount++;
	if ($view_lab_resultreleasedd_list->RecordCount >= $view_lab_resultreleasedd_list->StartRecord) {
		$view_lab_resultreleasedd_list->RowCount++;
		if ($view_lab_resultreleasedd_list->isGridAdd() || $view_lab_resultreleasedd_list->isGridEdit() || $view_lab_resultreleasedd->isConfirm()) {
			$view_lab_resultreleasedd_list->RowIndex++;
			$CurrentForm->Index = $view_lab_resultreleasedd_list->RowIndex;
			if ($CurrentForm->hasValue($view_lab_resultreleasedd_list->FormActionName) && ($view_lab_resultreleasedd->isConfirm() || $view_lab_resultreleasedd_list->EventCancelled))
				$view_lab_resultreleasedd_list->RowAction = strval($CurrentForm->getValue($view_lab_resultreleasedd_list->FormActionName));
			elseif ($view_lab_resultreleasedd_list->isGridAdd())
				$view_lab_resultreleasedd_list->RowAction = "insert";
			else
				$view_lab_resultreleasedd_list->RowAction = "";
		}

		// Set up key count
		$view_lab_resultreleasedd_list->KeyCount = $view_lab_resultreleasedd_list->RowIndex;

		// Init row class and style
		$view_lab_resultreleasedd->resetAttributes();
		$view_lab_resultreleasedd->CssClass = "";
		if ($view_lab_resultreleasedd_list->isGridAdd()) {
			$view_lab_resultreleasedd_list->loadRowValues(); // Load default values
		} else {
			$view_lab_resultreleasedd_list->loadRowValues($view_lab_resultreleasedd_list->Recordset); // Load row values
		}
		$view_lab_resultreleasedd->RowType = ROWTYPE_VIEW; // Render view
		if ($view_lab_resultreleasedd_list->isGridEdit()) { // Grid edit
			if ($view_lab_resultreleasedd->EventCancelled)
				$view_lab_resultreleasedd_list->restoreCurrentRowFormValues($view_lab_resultreleasedd_list->RowIndex); // Restore form values
			if ($view_lab_resultreleasedd_list->RowAction == "insert")
				$view_lab_resultreleasedd->RowType = ROWTYPE_ADD; // Render add
			else
				$view_lab_resultreleasedd->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_lab_resultreleasedd_list->isGridEdit() && ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT || $view_lab_resultreleasedd->RowType == ROWTYPE_ADD) && $view_lab_resultreleasedd->EventCancelled) // Update failed
			$view_lab_resultreleasedd_list->restoreCurrentRowFormValues($view_lab_resultreleasedd_list->RowIndex); // Restore form values
		if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) // Edit row
			$view_lab_resultreleasedd_list->EditRowCount++;

		// Set up row id / data-rowindex
		$view_lab_resultreleasedd->RowAttrs->merge(["data-rowindex" => $view_lab_resultreleasedd_list->RowCount, "id" => "r" . $view_lab_resultreleasedd_list->RowCount . "_view_lab_resultreleasedd", "data-rowtype" => $view_lab_resultreleasedd->RowType]);

		// Render row
		$view_lab_resultreleasedd_list->renderRow();

		// Render list options
		$view_lab_resultreleasedd_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_lab_resultreleasedd_list->RowAction != "delete" && $view_lab_resultreleasedd_list->RowAction != "insertdelete" && !($view_lab_resultreleasedd_list->RowAction == "insert" && $view_lab_resultreleasedd->isConfirm() && $view_lab_resultreleasedd_list->emptyRow())) {
?>
	<tr <?php echo $view_lab_resultreleasedd->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_resultreleasedd_list->ListOptions->render("body", "left", $view_lab_resultreleasedd_list->RowCount);
?>
	<?php if ($view_lab_resultreleasedd_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_lab_resultreleasedd_list->id->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_id" class="form-group"></span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_id" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_id" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->id->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_id" class="form-group">
<span<?php echo $view_lab_resultreleasedd_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleasedd_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_id" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_id" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_id">
<span<?php echo $view_lab_resultreleasedd_list->id->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $view_lab_resultreleasedd_list->PatID->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_PatID" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->PatID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->PatID->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->PatID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_PatID" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->PatID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->PatID->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_PatID">
<span<?php echo $view_lab_resultreleasedd_list->PatID->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->PatID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_lab_resultreleasedd_list->PatientName->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_PatientName" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->PatientName->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_PatientName" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->PatientName->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_PatientName">
<span<?php echo $view_lab_resultreleasedd_list->PatientName->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $view_lab_resultreleasedd_list->Age->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Age" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Age" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->Age->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Age" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Age->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Age" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Age" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->Age->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Age">
<span<?php echo $view_lab_resultreleasedd_list->Age->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->Age->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $view_lab_resultreleasedd_list->Gender->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Gender" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->Gender->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Gender->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Gender" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->Gender->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Gender">
<span<?php echo $view_lab_resultreleasedd_list->Gender->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->Gender->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->sid->Visible) { // sid ?>
		<td data-name="sid" <?php echo $view_lab_resultreleasedd_list->sid->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_sid" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_sid" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->sid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->sid->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_sid" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->sid->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_sid" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_sid" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->sid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->sid->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->sid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_sid">
<span<?php echo $view_lab_resultreleasedd_list->sid->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->sid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" <?php echo $view_lab_resultreleasedd_list->ItemCode->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_ItemCode" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->ItemCode->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_ItemCode" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->ItemCode->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->ItemCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_ItemCode">
<span<?php echo $view_lab_resultreleasedd_list->ItemCode->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->ItemCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" <?php echo $view_lab_resultreleasedd_list->DEptCd->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_DEptCd" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->DEptCd->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_DEptCd" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->DEptCd->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->DEptCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_DEptCd">
<span<?php echo $view_lab_resultreleasedd_list->DEptCd->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->DEptCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted" <?php echo $view_lab_resultreleasedd_list->Resulted->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Resulted" class="form-group">
<div id="tp_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleasedd" data-field="x_Resulted" data-value-separator="<?php echo $view_lab_resultreleasedd_list->Resulted->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" value="{value}"<?php echo $view_lab_resultreleasedd_list->Resulted->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleasedd_list->Resulted->checkBoxListHtml(FALSE, "x{$view_lab_resultreleasedd_list->RowIndex}_Resulted[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Resulted" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Resulted->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Resulted" class="form-group">
<div id="tp_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleasedd" data-field="x_Resulted" data-value-separator="<?php echo $view_lab_resultreleasedd_list->Resulted->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" value="{value}"<?php echo $view_lab_resultreleasedd_list->Resulted->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleasedd_list->Resulted->checkBoxListHtml(FALSE, "x{$view_lab_resultreleasedd_list->RowIndex}_Resulted[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Resulted">
<span<?php echo $view_lab_resultreleasedd_list->Resulted->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->Resulted->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Services->Visible) { // Services ?>
		<td data-name="Services" <?php echo $view_lab_resultreleasedd_list->Services->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Services" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Services" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Services->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->Services->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Services" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Services->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Services" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Services" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Services->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->Services->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->Services->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Services">
<span<?php echo $view_lab_resultreleasedd_list->Services->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->Services->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->LabReport->Visible) { // LabReport ?>
		<td data-name="LabReport" <?php echo $view_lab_resultreleasedd_list->LabReport->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_LabReport" class="form-group">
<textarea data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->LabReport->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd_list->LabReport->editAttributes() ?>><?php echo $view_lab_resultreleasedd_list->LabReport->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->LabReport->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_LabReport" class="form-group">
<textarea data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->LabReport->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd_list->LabReport->editAttributes() ?>><?php echo $view_lab_resultreleasedd_list->LabReport->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_LabReport">
<span<?php echo $view_lab_resultreleasedd_list->LabReport->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->LabReport->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1" <?php echo $view_lab_resultreleasedd_list->Pic1->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Pic1" class="form-group">
<div id="fd_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $view_lab_resultreleasedd_list->Pic1->title() ?>" data-table="view_lab_resultreleasedd" data-field="x_Pic1" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" lang="<?php echo CurrentLanguageID() ?>"<?php echo $view_lab_resultreleasedd_list->Pic1->editAttributes() ?><?php if ($view_lab_resultreleasedd_list->Pic1->ReadOnly || $view_lab_resultreleasedd_list->Pic1->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd_list->Pic1->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd_list->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd_list->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Pic1" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Pic1->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Pic1" class="form-group">
<div id="fd_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $view_lab_resultreleasedd_list->Pic1->title() ?>" data-table="view_lab_resultreleasedd" data-field="x_Pic1" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" lang="<?php echo CurrentLanguageID() ?>"<?php echo $view_lab_resultreleasedd_list->Pic1->editAttributes() ?><?php if ($view_lab_resultreleasedd_list->Pic1->ReadOnly || $view_lab_resultreleasedd_list->Pic1->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd_list->Pic1->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo (Post("fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd_list->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd_list->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Pic1">
<span<?php echo $view_lab_resultreleasedd_list->Pic1->viewAttributes() ?>><?php echo GetFileViewTag($view_lab_resultreleasedd_list->Pic1, $view_lab_resultreleasedd_list->Pic1->getViewValue(), FALSE) ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2" <?php echo $view_lab_resultreleasedd_list->Pic2->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Pic2" class="form-group">
<div id="fd_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $view_lab_resultreleasedd_list->Pic2->title() ?>" data-table="view_lab_resultreleasedd" data-field="x_Pic2" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" lang="<?php echo CurrentLanguageID() ?>"<?php echo $view_lab_resultreleasedd_list->Pic2->editAttributes() ?><?php if ($view_lab_resultreleasedd_list->Pic2->ReadOnly || $view_lab_resultreleasedd_list->Pic2->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd_list->Pic2->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd_list->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd_list->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Pic2" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Pic2->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Pic2" class="form-group">
<div id="fd_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $view_lab_resultreleasedd_list->Pic2->title() ?>" data-table="view_lab_resultreleasedd" data-field="x_Pic2" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" lang="<?php echo CurrentLanguageID() ?>"<?php echo $view_lab_resultreleasedd_list->Pic2->editAttributes() ?><?php if ($view_lab_resultreleasedd_list->Pic2->ReadOnly || $view_lab_resultreleasedd_list->Pic2->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd_list->Pic2->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo (Post("fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd_list->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd_list->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Pic2">
<span<?php echo $view_lab_resultreleasedd_list->Pic2->viewAttributes() ?>><?php echo GetFileViewTag($view_lab_resultreleasedd_list->Pic2, $view_lab_resultreleasedd_list->Pic2->getViewValue(), FALSE) ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit" <?php echo $view_lab_resultreleasedd_list->TestUnit->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_TestUnit" class="form-group">
<?php
$onchange = $view_lab_resultreleasedd_list->TestUnit->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_lab_resultreleasedd_list->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit">
	<input type="text" class="form-control" name="sv_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" id="sv_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" value="<?php echo RemoveHtml($view_lab_resultreleasedd_list->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->TestUnit->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd_list->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" data-value-separator="<?php echo $view_lab_resultreleasedd_list->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->TestUnit->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_lab_resultreleaseddlist"], function() {
	fview_lab_resultreleaseddlist.createAutoSuggest({"id":"x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit","forceSelect":false});
});
</script>
<?php echo $view_lab_resultreleasedd_list->TestUnit->Lookup->getParamTag($view_lab_resultreleasedd_list, "p_x" . $view_lab_resultreleasedd_list->RowIndex . "_TestUnit") ?>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->TestUnit->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_TestUnit" class="form-group">
<?php
$onchange = $view_lab_resultreleasedd_list->TestUnit->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_lab_resultreleasedd_list->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit">
	<input type="text" class="form-control" name="sv_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" id="sv_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" value="<?php echo RemoveHtml($view_lab_resultreleasedd_list->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->TestUnit->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd_list->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" data-value-separator="<?php echo $view_lab_resultreleasedd_list->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->TestUnit->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_lab_resultreleaseddlist"], function() {
	fview_lab_resultreleaseddlist.createAutoSuggest({"id":"x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit","forceSelect":false});
});
</script>
<?php echo $view_lab_resultreleasedd_list->TestUnit->Lookup->getParamTag($view_lab_resultreleasedd_list, "p_x" . $view_lab_resultreleasedd_list->RowIndex . "_TestUnit") ?>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_TestUnit">
<span<?php echo $view_lab_resultreleasedd_list->TestUnit->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->TestUnit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->RefValue->Visible) { // RefValue ?>
		<td data-name="RefValue" <?php echo $view_lab_resultreleasedd_list->RefValue->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_RefValue" class="form-group">
<textarea data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd_list->RefValue->editAttributes() ?>><?php echo $view_lab_resultreleasedd_list->RefValue->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->RefValue->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_RefValue" class="form-group">
<textarea data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd_list->RefValue->editAttributes() ?>><?php echo $view_lab_resultreleasedd_list->RefValue->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_RefValue">
<span<?php echo $view_lab_resultreleasedd_list->RefValue->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->RefValue->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Order->Visible) { // Order ?>
		<td data-name="Order" <?php echo $view_lab_resultreleasedd_list->Order->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Order" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Order" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->Order->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Order" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Order->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Order" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Order" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->Order->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->Order->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Order">
<span<?php echo $view_lab_resultreleasedd_list->Order->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->Order->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated" <?php echo $view_lab_resultreleasedd_list->Repeated->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Repeated" class="form-group">
<div id="tp_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleasedd" data-field="x_Repeated" data-value-separator="<?php echo $view_lab_resultreleasedd_list->Repeated->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" value="{value}"<?php echo $view_lab_resultreleasedd_list->Repeated->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleasedd_list->Repeated->checkBoxListHtml(FALSE, "x{$view_lab_resultreleasedd_list->RowIndex}_Repeated[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Repeated" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Repeated->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Repeated" class="form-group">
<div id="tp_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleasedd" data-field="x_Repeated" data-value-separator="<?php echo $view_lab_resultreleasedd_list->Repeated->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" value="{value}"<?php echo $view_lab_resultreleasedd_list->Repeated->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleasedd_list->Repeated->checkBoxListHtml(FALSE, "x{$view_lab_resultreleasedd_list->RowIndex}_Repeated[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Repeated">
<span<?php echo $view_lab_resultreleasedd_list->Repeated->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->Repeated->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Vid->Visible) { // Vid ?>
		<td data-name="Vid" <?php echo $view_lab_resultreleasedd_list->Vid->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_lab_resultreleasedd_list->Vid->getSessionValue() != "") { ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Vid" class="form-group">
<span<?php echo $view_lab_resultreleasedd_list->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleasedd_list->Vid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Vid" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Vid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->Vid->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->Vid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Vid->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_lab_resultreleasedd_list->Vid->getSessionValue() != "") { ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Vid" class="form-group">
<span<?php echo $view_lab_resultreleasedd_list->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleasedd_list->Vid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Vid" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Vid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->Vid->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->Vid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Vid">
<span<?php echo $view_lab_resultreleasedd_list->Vid->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->Vid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId" <?php echo $view_lab_resultreleasedd_list->invoiceId->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_invoiceId" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->invoiceId->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->invoiceId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->invoiceId->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_invoiceId" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->invoiceId->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->invoiceId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_invoiceId">
<span<?php echo $view_lab_resultreleasedd_list->invoiceId->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->invoiceId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->DrID->Visible) { // DrID ?>
		<td data-name="DrID" <?php echo $view_lab_resultreleasedd_list->DrID->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_DrID" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->DrID->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->DrID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DrID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_DrID" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->DrID->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->DrID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_DrID">
<span<?php echo $view_lab_resultreleasedd_list->DrID->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->DrID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE" <?php echo $view_lab_resultreleasedd_list->DrCODE->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_DrCODE" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->DrCODE->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->DrCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DrCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_DrCODE" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->DrCODE->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->DrCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_DrCODE">
<span<?php echo $view_lab_resultreleasedd_list->DrCODE->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->DrCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->DrName->Visible) { // DrName ?>
		<td data-name="DrName" <?php echo $view_lab_resultreleasedd_list->DrName->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_DrName" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DrName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->DrName->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DrName->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_DrName" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DrName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->DrName->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->DrName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_DrName">
<span<?php echo $view_lab_resultreleasedd_list->DrName->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->DrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Department->Visible) { // Department ?>
		<td data-name="Department" <?php echo $view_lab_resultreleasedd_list->Department->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Department" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Department" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Department->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->Department->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Department" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Department->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Department" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Department" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Department->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->Department->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->Department->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_Department">
<span<?php echo $view_lab_resultreleasedd_list->Department->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->Department->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_lab_resultreleasedd_list->createddatetime->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_createddatetime" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->createddatetime->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_resultreleasedd_list->createddatetime->ReadOnly && !$view_lab_resultreleasedd_list->createddatetime->Disabled && !isset($view_lab_resultreleasedd_list->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_resultreleasedd_list->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_lab_resultreleaseddlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_lab_resultreleaseddlist", "x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_createddatetime" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->createddatetime->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_resultreleasedd_list->createddatetime->ReadOnly && !$view_lab_resultreleasedd_list->createddatetime->Disabled && !isset($view_lab_resultreleasedd_list->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_resultreleasedd_list->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_lab_resultreleaseddlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_lab_resultreleaseddlist", "x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_createddatetime">
<span<?php echo $view_lab_resultreleasedd_list->createddatetime->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $view_lab_resultreleasedd_list->status->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_status" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_status" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->status->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->status->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_status" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->status->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_status" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_status" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->status->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->status->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_status">
<span<?php echo $view_lab_resultreleasedd_list->status->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->TestType->Visible) { // TestType ?>
		<td data-name="TestType" <?php echo $view_lab_resultreleasedd_list->TestType->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_TestType" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->TestType->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->TestType->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->TestType->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_TestType" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->TestType->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->TestType->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->TestType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_TestType">
<span<?php echo $view_lab_resultreleasedd_list->TestType->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->TestType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" <?php echo $view_lab_resultreleasedd_list->ResultDate->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultDate" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ResultDate" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_ResultDate">
<span<?php echo $view_lab_resultreleasedd_list->ResultDate->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->ResultDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy" <?php echo $view_lab_resultreleasedd_list->ResultedBy->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultedBy" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ResultedBy" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_ResultedBy">
<span<?php echo $view_lab_resultreleasedd_list->ResultedBy->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->ResultedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_lab_resultreleasedd_list->HospID->cellAttributes() ?>>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_HospID" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->HospID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->HospID->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_HospID" class="form-group">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->HospID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->HospID->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_resultreleasedd_list->RowCount ?>_view_lab_resultreleasedd_HospID">
<span<?php echo $view_lab_resultreleasedd_list->HospID->viewAttributes() ?>><?php echo $view_lab_resultreleasedd_list->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_resultreleasedd_list->ListOptions->render("body", "right", $view_lab_resultreleasedd_list->RowCount);
?>
	</tr>
<?php if ($view_lab_resultreleasedd->RowType == ROWTYPE_ADD || $view_lab_resultreleasedd->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_lab_resultreleaseddlist", "load"], function() {
	fview_lab_resultreleaseddlist.updateLists(<?php echo $view_lab_resultreleasedd_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_lab_resultreleasedd_list->isGridAdd())
		if (!$view_lab_resultreleasedd_list->Recordset->EOF)
			$view_lab_resultreleasedd_list->Recordset->moveNext();
}
?>
<?php
	if ($view_lab_resultreleasedd_list->isGridAdd() || $view_lab_resultreleasedd_list->isGridEdit()) {
		$view_lab_resultreleasedd_list->RowIndex = '$rowindex$';
		$view_lab_resultreleasedd_list->loadRowValues();

		// Set row properties
		$view_lab_resultreleasedd->resetAttributes();
		$view_lab_resultreleasedd->RowAttrs->merge(["data-rowindex" => $view_lab_resultreleasedd_list->RowIndex, "id" => "r0_view_lab_resultreleasedd", "data-rowtype" => ROWTYPE_ADD]);
		$view_lab_resultreleasedd->RowAttrs->appendClass("ew-template");
		$view_lab_resultreleasedd->RowType = ROWTYPE_ADD;

		// Render row
		$view_lab_resultreleasedd_list->renderRow();

		// Render list options
		$view_lab_resultreleasedd_list->renderListOptions();
		$view_lab_resultreleasedd_list->StartRowCount = 0;
?>
	<tr <?php echo $view_lab_resultreleasedd->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_resultreleasedd_list->ListOptions->render("body", "left", $view_lab_resultreleasedd_list->RowIndex);
?>
	<?php if ($view_lab_resultreleasedd_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_view_lab_resultreleasedd_id" class="form-group view_lab_resultreleasedd_id"></span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_id" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_id" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<span id="el$rowindex$_view_lab_resultreleasedd_PatID" class="form-group view_lab_resultreleasedd_PatID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->PatID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->PatID->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<span id="el$rowindex$_view_lab_resultreleasedd_PatientName" class="form-group view_lab_resultreleasedd_PatientName">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->PatientName->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Age->Visible) { // Age ?>
		<td data-name="Age">
<span id="el$rowindex$_view_lab_resultreleasedd_Age" class="form-group view_lab_resultreleasedd_Age">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Age" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->Age->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Age" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<span id="el$rowindex$_view_lab_resultreleasedd_Gender" class="form-group view_lab_resultreleasedd_Gender">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->Gender->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->sid->Visible) { // sid ?>
		<td data-name="sid">
<span id="el$rowindex$_view_lab_resultreleasedd_sid" class="form-group view_lab_resultreleasedd_sid">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_sid" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->sid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->sid->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_sid" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->sid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode">
<span id="el$rowindex$_view_lab_resultreleasedd_ItemCode" class="form-group view_lab_resultreleasedd_ItemCode">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->ItemCode->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->ItemCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ItemCode" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->ItemCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd">
<span id="el$rowindex$_view_lab_resultreleasedd_DEptCd" class="form-group view_lab_resultreleasedd_DEptCd">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->DEptCd->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DEptCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted">
<span id="el$rowindex$_view_lab_resultreleasedd_Resulted" class="form-group view_lab_resultreleasedd_Resulted">
<div id="tp_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleasedd" data-field="x_Resulted" data-value-separator="<?php echo $view_lab_resultreleasedd_list->Resulted->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" value="{value}"<?php echo $view_lab_resultreleasedd_list->Resulted->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleasedd_list->Resulted->checkBoxListHtml(FALSE, "x{$view_lab_resultreleasedd_list->RowIndex}_Resulted[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Resulted" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Resulted[]" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Resulted->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Services->Visible) { // Services ?>
		<td data-name="Services">
<span id="el$rowindex$_view_lab_resultreleasedd_Services" class="form-group view_lab_resultreleasedd_Services">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Services" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Services->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->Services->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->Services->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Services" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Services" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Services->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->LabReport->Visible) { // LabReport ?>
		<td data-name="LabReport">
<span id="el$rowindex$_view_lab_resultreleasedd_LabReport" class="form-group view_lab_resultreleasedd_LabReport">
<textarea data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->LabReport->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd_list->LabReport->editAttributes() ?>><?php echo $view_lab_resultreleasedd_list->LabReport->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_LabReport" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->LabReport->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1">
<span id="el$rowindex$_view_lab_resultreleasedd_Pic1" class="form-group view_lab_resultreleasedd_Pic1">
<div id="fd_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $view_lab_resultreleasedd_list->Pic1->title() ?>" data-table="view_lab_resultreleasedd" data-field="x_Pic1" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" lang="<?php echo CurrentLanguageID() ?>"<?php echo $view_lab_resultreleasedd_list->Pic1->editAttributes() ?><?php if ($view_lab_resultreleasedd_list->Pic1->ReadOnly || $view_lab_resultreleasedd_list->Pic1->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd_list->Pic1->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd_list->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id= "fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo $view_lab_resultreleasedd_list->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Pic1" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Pic1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2">
<span id="el$rowindex$_view_lab_resultreleasedd_Pic2" class="form-group view_lab_resultreleasedd_Pic2">
<div id="fd_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $view_lab_resultreleasedd_list->Pic2->title() ?>" data-table="view_lab_resultreleasedd" data-field="x_Pic2" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" lang="<?php echo CurrentLanguageID() ?>"<?php echo $view_lab_resultreleasedd_list->Pic2->editAttributes() ?><?php if ($view_lab_resultreleasedd_list->Pic2->ReadOnly || $view_lab_resultreleasedd_list->Pic2->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fn_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd_list->Pic2->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fa_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="0">
<input type="hidden" name="fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fs_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fx_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd_list->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id= "fm_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo $view_lab_resultreleasedd_list->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Pic2" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Pic2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit">
<span id="el$rowindex$_view_lab_resultreleasedd_TestUnit" class="form-group view_lab_resultreleasedd_TestUnit">
<?php
$onchange = $view_lab_resultreleasedd_list->TestUnit->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_lab_resultreleasedd_list->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit">
	<input type="text" class="form-control" name="sv_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" id="sv_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" value="<?php echo RemoveHtml($view_lab_resultreleasedd_list->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->TestUnit->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd_list->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" data-value-separator="<?php echo $view_lab_resultreleasedd_list->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->TestUnit->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_lab_resultreleaseddlist"], function() {
	fview_lab_resultreleaseddlist.createAutoSuggest({"id":"x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit","forceSelect":false});
});
</script>
<?php echo $view_lab_resultreleasedd_list->TestUnit->Lookup->getParamTag($view_lab_resultreleasedd_list, "p_x" . $view_lab_resultreleasedd_list->RowIndex . "_TestUnit") ?>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestUnit" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->TestUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->RefValue->Visible) { // RefValue ?>
		<td data-name="RefValue">
<span id="el$rowindex$_view_lab_resultreleasedd_RefValue" class="form-group view_lab_resultreleasedd_RefValue">
<textarea data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleasedd_list->RefValue->editAttributes() ?>><?php echo $view_lab_resultreleasedd_list->RefValue->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_RefValue" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->RefValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Order->Visible) { // Order ?>
		<td data-name="Order">
<span id="el$rowindex$_view_lab_resultreleasedd_Order" class="form-group view_lab_resultreleasedd_Order">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Order" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->Order->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Order" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated">
<span id="el$rowindex$_view_lab_resultreleasedd_Repeated" class="form-group view_lab_resultreleasedd_Repeated">
<div id="tp_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleasedd" data-field="x_Repeated" data-value-separator="<?php echo $view_lab_resultreleasedd_list->Repeated->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" value="{value}"<?php echo $view_lab_resultreleasedd_list->Repeated->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_resultreleasedd_list->Repeated->checkBoxListHtml(FALSE, "x{$view_lab_resultreleasedd_list->RowIndex}_Repeated[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Repeated" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Repeated[]" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Repeated->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Vid->Visible) { // Vid ?>
		<td data-name="Vid">
<?php if ($view_lab_resultreleasedd_list->Vid->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Vid" class="form-group view_lab_resultreleasedd_Vid">
<span<?php echo $view_lab_resultreleasedd_list->Vid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_resultreleasedd_list->Vid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Vid" class="form-group view_lab_resultreleasedd_Vid">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Vid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->Vid->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->Vid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Vid" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Vid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId">
<span id="el$rowindex$_view_lab_resultreleasedd_invoiceId" class="form-group view_lab_resultreleasedd_invoiceId">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->invoiceId->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->invoiceId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_invoiceId" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->invoiceId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->DrID->Visible) { // DrID ?>
		<td data-name="DrID">
<span id="el$rowindex$_view_lab_resultreleasedd_DrID" class="form-group view_lab_resultreleasedd_DrID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->DrID->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->DrID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrID" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DrID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE">
<span id="el$rowindex$_view_lab_resultreleasedd_DrCODE" class="form-group view_lab_resultreleasedd_DrCODE">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->DrCODE->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->DrCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrCODE" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DrCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->DrName->Visible) { // DrName ?>
		<td data-name="DrName">
<span id="el$rowindex$_view_lab_resultreleasedd_DrName" class="form-group view_lab_resultreleasedd_DrName">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DrName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->DrName->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_DrName" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->DrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->Department->Visible) { // Department ?>
		<td data-name="Department">
<span id="el$rowindex$_view_lab_resultreleasedd_Department" class="form-group view_lab_resultreleasedd_Department">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_Department" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Department->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->Department->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Department" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<span id="el$rowindex$_view_lab_resultreleasedd_createddatetime" class="form-group view_lab_resultreleasedd_createddatetime">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->createddatetime->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_resultreleasedd_list->createddatetime->ReadOnly && !$view_lab_resultreleasedd_list->createddatetime->Disabled && !isset($view_lab_resultreleasedd_list->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_resultreleasedd_list->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_lab_resultreleaseddlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_lab_resultreleaseddlist", "x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->status->Visible) { // status ?>
		<td data-name="status">
<span id="el$rowindex$_view_lab_resultreleasedd_status" class="form-group view_lab_resultreleasedd_status">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_status" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->status->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->status->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_status" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_status" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->TestType->Visible) { // TestType ?>
		<td data-name="TestType">
<span id="el$rowindex$_view_lab_resultreleasedd_TestType" class="form-group view_lab_resultreleasedd_TestType">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->TestType->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->TestType->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->TestType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_TestType" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->TestType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultDate" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ResultDate" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->ResultDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultedBy" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ResultedBy" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->ResultedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_resultreleasedd_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<span id="el$rowindex$_view_lab_resultreleasedd_HospID" class="form-group view_lab_resultreleasedd_HospID">
<input type="text" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" id="x<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleasedd_list->HospID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleasedd_list->HospID->EditValue ?>"<?php echo $view_lab_resultreleasedd_list->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" id="o<?php echo $view_lab_resultreleasedd_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_resultreleasedd_list->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_resultreleasedd_list->ListOptions->render("body", "right", $view_lab_resultreleasedd_list->RowIndex);
?>
<script>
loadjs.ready(["fview_lab_resultreleaseddlist", "load"], function() {
	fview_lab_resultreleaseddlist.updateLists(<?php echo $view_lab_resultreleasedd_list->RowIndex ?>);
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
<?php if ($view_lab_resultreleasedd_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_lab_resultreleasedd_list->FormKeyCountName ?>" id="<?php echo $view_lab_resultreleasedd_list->FormKeyCountName ?>" value="<?php echo $view_lab_resultreleasedd_list->KeyCount ?>">
<?php echo $view_lab_resultreleasedd_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_lab_resultreleasedd->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_lab_resultreleasedd_list->Recordset)
	$view_lab_resultreleasedd_list->Recordset->Close();
?>
<?php if (!$view_lab_resultreleasedd_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_lab_resultreleasedd_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_lab_resultreleasedd_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_resultreleasedd_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_lab_resultreleasedd_list->TotalRecords == 0 && !$view_lab_resultreleasedd->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_lab_resultreleasedd_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_lab_resultreleasedd_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_lab_resultreleasedd_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_lab_resultreleasedd->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_lab_resultreleasedd",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_lab_resultreleasedd_list->terminate();
?>