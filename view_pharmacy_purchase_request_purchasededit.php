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
$view_pharmacy_purchase_request_purchased_edit = new view_pharmacy_purchase_request_purchased_edit();

// Run the page
$view_pharmacy_purchase_request_purchased_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_purchased_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fview_pharmacy_purchase_request_purchasededit = currentForm = new ew.Form("fview_pharmacy_purchase_request_purchasededit", "edit");

// Validate form
fview_pharmacy_purchase_request_purchasededit.validate = function() {
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
		<?php if ($view_pharmacy_purchase_request_purchased_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_purchased->id->caption(), $view_pharmacy_purchase_request_purchased->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_purchased_edit->DT->Required) { ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_purchased->DT->caption(), $view_pharmacy_purchase_request_purchased->DT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_purchased_edit->EmployeeName->Required) { ?>
			elm = this.getElements("x" + infix + "_EmployeeName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_purchased->EmployeeName->caption(), $view_pharmacy_purchase_request_purchased->EmployeeName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_purchased_edit->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_purchased->Department->caption(), $view_pharmacy_purchase_request_purchased->Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_purchased_edit->ApprovedStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_ApprovedStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_purchased->ApprovedStatus->caption(), $view_pharmacy_purchase_request_purchased->ApprovedStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_purchased_edit->PurchaseStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_PurchaseStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_purchased->PurchaseStatus->caption(), $view_pharmacy_purchase_request_purchased->PurchaseStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_purchased_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_purchased->HospID->caption(), $view_pharmacy_purchase_request_purchased->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_purchased_edit->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_purchased->createdby->caption(), $view_pharmacy_purchase_request_purchased->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_purchased_edit->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_purchased->createddatetime->caption(), $view_pharmacy_purchase_request_purchased->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_purchased_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_purchased->modifiedby->caption(), $view_pharmacy_purchase_request_purchased->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_purchased_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_purchased->modifieddatetime->caption(), $view_pharmacy_purchase_request_purchased->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_purchased_edit->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_purchased->BRCODE->caption(), $view_pharmacy_purchase_request_purchased->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
fview_pharmacy_purchase_request_purchasededit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_purchase_request_purchasededit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_purchase_request_purchasededit.lists["x_PurchaseStatus"] = <?php echo $view_pharmacy_purchase_request_purchased_edit->PurchaseStatus->Lookup->toClientList() ?>;
fview_pharmacy_purchase_request_purchasededit.lists["x_PurchaseStatus"].options = <?php echo JsonEncode($view_pharmacy_purchase_request_purchased_edit->PurchaseStatus->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_pharmacy_purchase_request_purchased_edit->showPageHeader(); ?>
<?php
$view_pharmacy_purchase_request_purchased_edit->showMessage();
?>
<form name="fview_pharmacy_purchase_request_purchasededit" id="fview_pharmacy_purchase_request_purchasededit" class="<?php echo $view_pharmacy_purchase_request_purchased_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_purchase_request_purchased_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_purchase_request_purchased_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_purchased">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_purchase_request_purchased_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($view_pharmacy_purchase_request_purchased->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_purchased_id" class="<?php echo $view_pharmacy_purchase_request_purchased_edit->LeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_id" class="view_pharmacy_purchase_request_purchasededit" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->id->caption() ?><?php echo ($view_pharmacy_purchase_request_purchased->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_pharmacy_purchase_request_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_purchased->id->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_id" class="view_pharmacy_purchase_request_purchasededit" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_id">
<span<?php echo $view_pharmacy_purchase_request_purchased->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_purchased->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_pharmacy_purchase_request_purchased" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_purchased->id->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_purchased->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_purchased_DT" for="x_DT" class="<?php echo $view_pharmacy_purchase_request_purchased_edit->LeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_DT" class="view_pharmacy_purchase_request_purchasededit" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->DT->caption() ?><?php echo ($view_pharmacy_purchase_request_purchased->DT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_pharmacy_purchase_request_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_purchased->DT->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_DT" class="view_pharmacy_purchase_request_purchasededit" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_DT">
<span<?php echo $view_pharmacy_purchase_request_purchased->DT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_purchased->DT->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_pharmacy_purchase_request_purchased" data-field="x_DT" name="x_DT" id="x_DT" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_purchased->DT->CurrentValue) ?>">
<script type="text/html" class="view_pharmacy_purchase_request_purchasededit_js">
ew.createDateTimePicker("fview_pharmacy_purchase_request_purchasededit", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_pharmacy_purchase_request_purchased->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->EmployeeName->Visible) { // EmployeeName ?>
	<div id="r_EmployeeName" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_purchased_EmployeeName" for="x_EmployeeName" class="<?php echo $view_pharmacy_purchase_request_purchased_edit->LeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_EmployeeName" class="view_pharmacy_purchase_request_purchasededit" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->caption() ?><?php echo ($view_pharmacy_purchase_request_purchased->EmployeeName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_pharmacy_purchase_request_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_EmployeeName" class="view_pharmacy_purchase_request_purchasededit" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_EmployeeName">
<span<?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_purchased->EmployeeName->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_pharmacy_purchase_request_purchased" data-field="x_EmployeeName" name="x_EmployeeName" id="x_EmployeeName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_purchased->EmployeeName->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->Department->Visible) { // Department ?>
	<div id="r_Department" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_purchased_Department" for="x_Department" class="<?php echo $view_pharmacy_purchase_request_purchased_edit->LeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_Department" class="view_pharmacy_purchase_request_purchasededit" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->Department->caption() ?><?php echo ($view_pharmacy_purchase_request_purchased->Department->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_pharmacy_purchase_request_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_purchased->Department->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_Department" class="view_pharmacy_purchase_request_purchasededit" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_Department">
<span<?php echo $view_pharmacy_purchase_request_purchased->Department->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_purchased->Department->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_pharmacy_purchase_request_purchased" data-field="x_Department" name="x_Department" id="x_Department" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_purchased->Department->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_purchased->Department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<div id="r_ApprovedStatus" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_purchased_ApprovedStatus" for="x_ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_purchased_edit->LeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_purchasededit" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->caption() ?><?php echo ($view_pharmacy_purchase_request_purchased->ApprovedStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_pharmacy_purchase_request_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_purchasededit" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_purchased->ApprovedStatus->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_pharmacy_purchase_request_purchased" data-field="x_ApprovedStatus" name="x_ApprovedStatus" id="x_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_purchased->ApprovedStatus->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<div id="r_PurchaseStatus" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_purchased_PurchaseStatus" for="x_PurchaseStatus" class="<?php echo $view_pharmacy_purchase_request_purchased_edit->LeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_purchasededit" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->caption() ?><?php echo ($view_pharmacy_purchase_request_purchased->PurchaseStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_pharmacy_purchase_request_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_purchasededit" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_PurchaseStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_purchase_request_purchased" data-field="x_PurchaseStatus" data-value-separator="<?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->displayValueSeparatorAttribute() ?>" id="x_PurchaseStatus" name="x_PurchaseStatus"<?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->editAttributes() ?>>
		<?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->selectOptionListHtml("x_PurchaseStatus") ?>
	</select>
</div>
</span>
</script>
<?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_purchased_HospID" for="x_HospID" class="<?php echo $view_pharmacy_purchase_request_purchased_edit->LeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_HospID" class="view_pharmacy_purchase_request_purchasededit" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->HospID->caption() ?><?php echo ($view_pharmacy_purchase_request_purchased->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_pharmacy_purchase_request_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_purchased->HospID->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_HospID" class="view_pharmacy_purchase_request_purchasededit" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_HospID">
<span<?php echo $view_pharmacy_purchase_request_purchased->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_purchased->HospID->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_pharmacy_purchase_request_purchased" data-field="x_HospID" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_purchased->HospID->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_purchased->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_purchased_createdby" for="x_createdby" class="<?php echo $view_pharmacy_purchase_request_purchased_edit->LeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_createdby" class="view_pharmacy_purchase_request_purchasededit" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->createdby->caption() ?><?php echo ($view_pharmacy_purchase_request_purchased->createdby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_pharmacy_purchase_request_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_purchased->createdby->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_createdby" class="view_pharmacy_purchase_request_purchasededit" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_createdby">
<span<?php echo $view_pharmacy_purchase_request_purchased->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_purchased->createdby->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_pharmacy_purchase_request_purchased" data-field="x_createdby" name="x_createdby" id="x_createdby" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_purchased->createdby->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_purchased->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_purchased_createddatetime" for="x_createddatetime" class="<?php echo $view_pharmacy_purchase_request_purchased_edit->LeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_createddatetime" class="view_pharmacy_purchase_request_purchasededit" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->createddatetime->caption() ?><?php echo ($view_pharmacy_purchase_request_purchased->createddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_pharmacy_purchase_request_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_purchased->createddatetime->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_createddatetime" class="view_pharmacy_purchase_request_purchasededit" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_createddatetime">
<span<?php echo $view_pharmacy_purchase_request_purchased->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_purchased->createddatetime->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_pharmacy_purchase_request_purchased" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_purchased->createddatetime->CurrentValue) ?>">
<script type="text/html" class="view_pharmacy_purchase_request_purchasededit_js">
ew.createDateTimePicker("fview_pharmacy_purchase_request_purchasededit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_pharmacy_purchase_request_purchased->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_purchased_modifiedby" for="x_modifiedby" class="<?php echo $view_pharmacy_purchase_request_purchased_edit->LeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_modifiedby" class="view_pharmacy_purchase_request_purchasededit" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->modifiedby->caption() ?><?php echo ($view_pharmacy_purchase_request_purchased->modifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_pharmacy_purchase_request_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_purchased->modifiedby->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_modifiedby" class="view_pharmacy_purchase_request_purchasededit" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_modifiedby">
<span<?php echo $view_pharmacy_purchase_request_purchased->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_purchased->modifiedby->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_pharmacy_purchase_request_purchased" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_purchased->modifiedby->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_purchased->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_purchased_modifieddatetime" for="x_modifieddatetime" class="<?php echo $view_pharmacy_purchase_request_purchased_edit->LeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_modifieddatetime" class="view_pharmacy_purchase_request_purchasededit" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->caption() ?><?php echo ($view_pharmacy_purchase_request_purchased->modifieddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_pharmacy_purchase_request_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_modifieddatetime" class="view_pharmacy_purchase_request_purchasededit" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_modifieddatetime">
<span<?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_purchased->modifieddatetime->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_pharmacy_purchase_request_purchased" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_purchased->modifieddatetime->CurrentValue) ?>">
<script type="text/html" class="view_pharmacy_purchase_request_purchasededit_js">
ew.createDateTimePicker("fview_pharmacy_purchase_request_purchasededit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_purchased_BRCODE" for="x_BRCODE" class="<?php echo $view_pharmacy_purchase_request_purchased_edit->LeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_BRCODE" class="view_pharmacy_purchase_request_purchasededit" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->BRCODE->caption() ?><?php echo ($view_pharmacy_purchase_request_purchased->BRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_pharmacy_purchase_request_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_purchased->BRCODE->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_BRCODE" class="view_pharmacy_purchase_request_purchasededit" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_BRCODE">
<span<?php echo $view_pharmacy_purchase_request_purchased->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_purchased->BRCODE->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_pharmacy_purchase_request_purchased" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_purchased->BRCODE->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_purchased->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_pharmacy_purchase_request_purchasededit" class="ew-custom-template"></div>
<script id="tpm_view_pharmacy_purchase_request_purchasededit" type="text/html">
<div id="ct_view_pharmacy_purchase_request_purchased_edit"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<input id="createdbyId" name="createdbyId" type="hidden" value="<?php echo CurrentUserName(); ?>">
<input id="HospIDId" name="HospIDId" type="hidden" value="<?php echo HospitalID(); ?>">
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_purchased_EmployeeName"/}}&nbsp;{{include tmpl="#tpx_view_pharmacy_purchase_request_purchased_EmployeeName"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_purchased_Department"/}}&nbsp;{{include tmpl="#tpx_view_pharmacy_purchase_request_purchased_Department"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_purchased_DT"/}}&nbsp;{{include tmpl="#tpx_view_pharmacy_purchase_request_purchased_DT"/}}</h3>
	</div>
</div>
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_purchased_ApprovedStatus"/}}&nbsp;{{include tmpl="#tpx_view_pharmacy_purchase_request_purchased_ApprovedStatus"/}}</h3>
	</div>
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_purchased_PurchaseStatus"/}}&nbsp;{{include tmpl="#tpx_view_pharmacy_purchase_request_purchased_PurchaseStatus"/}}</h3>
	</div>
</div>
</div>
</script>
<?php
	if (in_array("view_pharmacy_purchase_request_items_purchased", explode(",", $view_pharmacy_purchase_request_purchased->getCurrentDetailTable())) && $view_pharmacy_purchase_request_items_purchased->DetailEdit) {
?>
<?php if ($view_pharmacy_purchase_request_purchased->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("view_pharmacy_purchase_request_items_purchased", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_pharmacy_purchase_request_items_purchasedgrid.php" ?>
<?php } ?>
<?php if (!$view_pharmacy_purchase_request_purchased_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_pharmacy_purchase_request_purchased_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_pharmacy_purchase_request_purchased_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_pharmacy_purchase_request_purchased->Rows) ?> };
ew.applyTemplate("tpd_view_pharmacy_purchase_request_purchasededit", "tpm_view_pharmacy_purchase_request_purchasededit", "view_pharmacy_purchase_request_purchasededit", "<?php echo $view_pharmacy_purchase_request_purchased->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_pharmacy_purchase_request_purchasededit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_pharmacy_purchase_request_purchased_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_purchase_request_purchased_edit->terminate();
?>