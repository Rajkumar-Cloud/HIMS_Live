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
$view_pharmacy_purchase_request_items_purchased_edit = new view_pharmacy_purchase_request_items_purchased_edit();

// Run the page
$view_pharmacy_purchase_request_items_purchased_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_items_purchased_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fview_pharmacy_purchase_request_items_purchasededit = currentForm = new ew.Form("fview_pharmacy_purchase_request_items_purchasededit", "edit");

// Validate form
fview_pharmacy_purchase_request_items_purchasededit.validate = function() {
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
		<?php if ($view_pharmacy_purchase_request_items_purchased_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->id->caption(), $view_pharmacy_purchase_request_items_purchased->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_edit->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->PRC->caption(), $view_pharmacy_purchase_request_items_purchased->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_edit->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->PrName->caption(), $view_pharmacy_purchase_request_items_purchased->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_edit->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->Quantity->caption(), $view_pharmacy_purchase_request_items_purchased->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_purchase_request_items_purchased->Quantity->errorMessage()) ?>");
		<?php if ($view_pharmacy_purchase_request_items_purchased_edit->ApprovedStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_ApprovedStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->caption(), $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_edit->PurchaseStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_PurchaseStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->caption(), $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->HospID->caption(), $view_pharmacy_purchase_request_items_purchased->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_edit->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->createdby->caption(), $view_pharmacy_purchase_request_items_purchased->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_edit->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->createddatetime->caption(), $view_pharmacy_purchase_request_items_purchased->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->modifiedby->caption(), $view_pharmacy_purchase_request_items_purchased->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->modifieddatetime->caption(), $view_pharmacy_purchase_request_items_purchased->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_edit->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->BRCODE->caption(), $view_pharmacy_purchase_request_items_purchased->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_edit->prid->Required) { ?>
			elm = this.getElements("x" + infix + "_prid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->prid->caption(), $view_pharmacy_purchase_request_items_purchased->prid->RequiredErrorMessage)) ?>");
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
fview_pharmacy_purchase_request_items_purchasededit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_purchase_request_items_purchasededit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_purchase_request_items_purchasededit.lists["x_PurchaseStatus"] = <?php echo $view_pharmacy_purchase_request_items_purchased_edit->PurchaseStatus->Lookup->toClientList() ?>;
fview_pharmacy_purchase_request_items_purchasededit.lists["x_PurchaseStatus"].options = <?php echo JsonEncode($view_pharmacy_purchase_request_items_purchased_edit->PurchaseStatus->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_pharmacy_purchase_request_items_purchased_edit->showPageHeader(); ?>
<?php
$view_pharmacy_purchase_request_items_purchased_edit->showMessage();
?>
<form name="fview_pharmacy_purchase_request_items_purchasededit" id="fview_pharmacy_purchase_request_items_purchasededit" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_purchase_request_items_purchased_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_purchased">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_purchase_request_items_purchased_edit->IsModal ?>">
<?php if ($view_pharmacy_purchase_request_items_purchased->getCurrentMasterTable() == "view_pharmacy_purchase_request_purchased") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_pharmacy_purchase_request_purchased">
<input type="hidden" name="fk_id" value="<?php echo $view_pharmacy_purchase_request_items_purchased->prid->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($view_pharmacy_purchase_request_items_purchased->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_id" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased->id->caption() ?><?php echo ($view_pharmacy_purchase_request_items_purchased->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_items_purchased->id->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_id">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->id->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_PRC" for="x_PRC" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased->PRC->caption() ?><?php echo ($view_pharmacy_purchase_request_items_purchased->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->PRC->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="x_PRC" id="x_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PRC->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_PrName" for="x_PrName" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased->PrName->caption() ?><?php echo ($view_pharmacy_purchase_request_items_purchased->PrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->PrName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="x_PrName" id="x_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PrName->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_Quantity" for="x_Quantity" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->caption() ?><?php echo ($view_pharmacy_purchase_request_items_purchased->Quantity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_Quantity">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<div id="r_ApprovedStatus" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" for="x_ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->caption() ?><?php echo ($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="x_ApprovedStatus" id="x_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<div id="r_PurchaseStatus" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" for="x_PurchaseStatus" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->caption() ?><?php echo ($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" data-value-separator="<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->displayValueSeparatorAttribute() ?>" id="x_PurchaseStatus" name="x_PurchaseStatus"<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->editAttributes() ?>>
		<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->selectOptionListHtml("x_PurchaseStatus") ?>
	</select>
</div>
</span>
<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_HospID" for="x_HospID" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased->HospID->caption() ?><?php echo ($view_pharmacy_purchase_request_items_purchased->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_items_purchased->HospID->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_HospID">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->HospID->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_HospID" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->HospID->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_createdby" for="x_createdby" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased->createdby->caption() ?><?php echo ($view_pharmacy_purchase_request_items_purchased->createdby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_items_purchased->createdby->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_createdby">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->createdby->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_createdby" name="x_createdby" id="x_createdby" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->createdby->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_createddatetime" for="x_createddatetime" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased->createddatetime->caption() ?><?php echo ($view_pharmacy_purchase_request_items_purchased->createddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_items_purchased->createddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_createddatetime">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->createddatetime->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->createddatetime->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_modifiedby" for="x_modifiedby" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased->modifiedby->caption() ?><?php echo ($view_pharmacy_purchase_request_items_purchased->modifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_items_purchased->modifiedby->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_modifiedby">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->modifiedby->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->modifiedby->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_modifieddatetime" for="x_modifieddatetime" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased->modifieddatetime->caption() ?><?php echo ($view_pharmacy_purchase_request_items_purchased->modifieddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_items_purchased->modifieddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_modifieddatetime">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->modifieddatetime->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->modifieddatetime->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_BRCODE" for="x_BRCODE" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased->BRCODE->caption() ?><?php echo ($view_pharmacy_purchase_request_items_purchased->BRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_items_purchased->BRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_BRCODE">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->BRCODE->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->BRCODE->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->prid->Visible) { // prid ?>
	<div id="r_prid" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_prid" for="x_prid" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased->prid->caption() ?><?php echo ($view_pharmacy_purchase_request_items_purchased->prid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div<?php echo $view_pharmacy_purchase_request_items_purchased->prid->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_prid">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->prid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->prid->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_prid" name="x_prid" id="x_prid" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->prid->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased->prid->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_pharmacy_purchase_request_items_purchased_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_pharmacy_purchase_request_items_purchased_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_purchase_request_items_purchased_edit->terminate();
?>