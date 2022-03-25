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
<?php include_once "header.php"; ?>
<script>
var fview_pharmacy_purchase_request_items_purchasededit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fview_pharmacy_purchase_request_items_purchasededit = currentForm = new ew.Form("fview_pharmacy_purchase_request_items_purchasededit", "edit");

	// Validate form
	fview_pharmacy_purchase_request_items_purchasededit.validate = function() {
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
			<?php if ($view_pharmacy_purchase_request_items_purchased_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_edit->id->caption(), $view_pharmacy_purchase_request_items_purchased_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_purchase_request_items_purchased_edit->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_edit->PRC->caption(), $view_pharmacy_purchase_request_items_purchased_edit->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_purchase_request_items_purchased_edit->PrName->Required) { ?>
				elm = this.getElements("x" + infix + "_PrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_edit->PrName->caption(), $view_pharmacy_purchase_request_items_purchased_edit->PrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_purchase_request_items_purchased_edit->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_edit->Quantity->caption(), $view_pharmacy_purchase_request_items_purchased_edit->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_purchase_request_items_purchased_edit->Quantity->errorMessage()) ?>");
			<?php if ($view_pharmacy_purchase_request_items_purchased_edit->ApprovedStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_ApprovedStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_edit->ApprovedStatus->caption(), $view_pharmacy_purchase_request_items_purchased_edit->ApprovedStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_purchase_request_items_purchased_edit->PurchaseStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_PurchaseStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_edit->PurchaseStatus->caption(), $view_pharmacy_purchase_request_items_purchased_edit->PurchaseStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_purchase_request_items_purchased_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_edit->HospID->caption(), $view_pharmacy_purchase_request_items_purchased_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_purchase_request_items_purchased_edit->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_edit->createdby->caption(), $view_pharmacy_purchase_request_items_purchased_edit->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_purchase_request_items_purchased_edit->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_edit->createddatetime->caption(), $view_pharmacy_purchase_request_items_purchased_edit->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_purchase_request_items_purchased_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_edit->modifiedby->caption(), $view_pharmacy_purchase_request_items_purchased_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_purchase_request_items_purchased_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_edit->modifieddatetime->caption(), $view_pharmacy_purchase_request_items_purchased_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_purchase_request_items_purchased_edit->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_edit->BRCODE->caption(), $view_pharmacy_purchase_request_items_purchased_edit->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_purchase_request_items_purchased_edit->prid->Required) { ?>
				elm = this.getElements("x" + infix + "_prid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_edit->prid->caption(), $view_pharmacy_purchase_request_items_purchased_edit->prid->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fview_pharmacy_purchase_request_items_purchasededit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacy_purchase_request_items_purchasededit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_pharmacy_purchase_request_items_purchasededit.lists["x_PurchaseStatus"] = <?php echo $view_pharmacy_purchase_request_items_purchased_edit->PurchaseStatus->Lookup->toClientList($view_pharmacy_purchase_request_items_purchased_edit) ?>;
	fview_pharmacy_purchase_request_items_purchasededit.lists["x_PurchaseStatus"].options = <?php echo JsonEncode($view_pharmacy_purchase_request_items_purchased_edit->PurchaseStatus->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_pharmacy_purchase_request_items_purchasededit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_pharmacy_purchase_request_items_purchased_edit->showPageHeader(); ?>
<?php
$view_pharmacy_purchase_request_items_purchased_edit->showMessage();
?>
<form name="fview_pharmacy_purchase_request_items_purchasededit" id="fview_pharmacy_purchase_request_items_purchasededit" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_purchased">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_purchase_request_items_purchased_edit->IsModal ?>">
<?php if ($view_pharmacy_purchase_request_items_purchased->getCurrentMasterTable() == "view_pharmacy_purchase_request_purchased") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_pharmacy_purchase_request_purchased">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_edit->prid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($view_pharmacy_purchase_request_items_purchased_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_id" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased_edit->id->caption() ?><?php echo $view_pharmacy_purchase_request_items_purchased_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_purchase_request_items_purchased_edit->id->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_id">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_edit->id->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_edit->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_PRC" for="x_PRC" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased_edit->PRC->caption() ?><?php echo $view_pharmacy_purchase_request_items_purchased_edit->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_purchase_request_items_purchased_edit->PRC->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_edit->PRC->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_edit->PRC->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="x_PRC" id="x_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_edit->PRC->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased_edit->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_edit->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_PrName" for="x_PrName" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased_edit->PrName->caption() ?><?php echo $view_pharmacy_purchase_request_items_purchased_edit->PrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_purchase_request_items_purchased_edit->PrName->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_edit->PrName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_edit->PrName->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="x_PrName" id="x_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_edit->PrName->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased_edit->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_edit->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_Quantity" for="x_Quantity" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased_edit->Quantity->caption() ?><?php echo $view_pharmacy_purchase_request_items_purchased_edit->Quantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_purchase_request_items_purchased_edit->Quantity->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_Quantity">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_edit->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->Quantity->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased_edit->Quantity->editAttributes() ?>>
</span>
<?php echo $view_pharmacy_purchase_request_items_purchased_edit->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_edit->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<div id="r_ApprovedStatus" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" for="x_ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased_edit->ApprovedStatus->caption() ?><?php echo $view_pharmacy_purchase_request_items_purchased_edit->ApprovedStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_purchase_request_items_purchased_edit->ApprovedStatus->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_edit->ApprovedStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_edit->ApprovedStatus->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="x_ApprovedStatus" id="x_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_edit->ApprovedStatus->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased_edit->ApprovedStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_edit->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<div id="r_PurchaseStatus" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" for="x_PurchaseStatus" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased_edit->PurchaseStatus->caption() ?><?php echo $view_pharmacy_purchase_request_items_purchased_edit->PurchaseStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_purchase_request_items_purchased_edit->PurchaseStatus->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" data-value-separator="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->PurchaseStatus->displayValueSeparatorAttribute() ?>" id="x_PurchaseStatus" name="x_PurchaseStatus"<?php echo $view_pharmacy_purchase_request_items_purchased_edit->PurchaseStatus->editAttributes() ?>>
			<?php echo $view_pharmacy_purchase_request_items_purchased_edit->PurchaseStatus->selectOptionListHtml("x_PurchaseStatus") ?>
		</select>
</div>
</span>
<?php echo $view_pharmacy_purchase_request_items_purchased_edit->PurchaseStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_edit->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_HospID" for="x_HospID" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased_edit->HospID->caption() ?><?php echo $view_pharmacy_purchase_request_items_purchased_edit->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_purchase_request_items_purchased_edit->HospID->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_HospID">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_edit->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_edit->HospID->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_HospID" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_edit->HospID->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased_edit->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_edit->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_createdby" for="x_createdby" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased_edit->createdby->caption() ?><?php echo $view_pharmacy_purchase_request_items_purchased_edit->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_purchase_request_items_purchased_edit->createdby->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_createdby">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_edit->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_edit->createdby->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_createdby" name="x_createdby" id="x_createdby" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_edit->createdby->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased_edit->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_edit->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_createddatetime" for="x_createddatetime" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased_edit->createddatetime->caption() ?><?php echo $view_pharmacy_purchase_request_items_purchased_edit->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_purchase_request_items_purchased_edit->createddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_createddatetime">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_edit->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_edit->createddatetime->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_edit->createddatetime->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased_edit->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_edit->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_modifiedby" for="x_modifiedby" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased_edit->modifiedby->caption() ?><?php echo $view_pharmacy_purchase_request_items_purchased_edit->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_purchase_request_items_purchased_edit->modifiedby->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_modifiedby">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_edit->modifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_edit->modifiedby->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_edit->modifiedby->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased_edit->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_edit->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_modifieddatetime" for="x_modifieddatetime" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased_edit->modifieddatetime->caption() ?><?php echo $view_pharmacy_purchase_request_items_purchased_edit->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_purchase_request_items_purchased_edit->modifieddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_modifieddatetime">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_edit->modifieddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_edit->modifieddatetime->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_edit->modifieddatetime->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased_edit->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_edit->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_BRCODE" for="x_BRCODE" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased_edit->BRCODE->caption() ?><?php echo $view_pharmacy_purchase_request_items_purchased_edit->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_purchase_request_items_purchased_edit->BRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_BRCODE">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_edit->BRCODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_edit->BRCODE->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_edit->BRCODE->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased_edit->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_edit->prid->Visible) { // prid ?>
	<div id="r_prid" class="form-group row">
		<label id="elh_view_pharmacy_purchase_request_items_purchased_prid" for="x_prid" class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->LeftColumnClass ?>"><?php echo $view_pharmacy_purchase_request_items_purchased_edit->prid->caption() ?><?php echo $view_pharmacy_purchase_request_items_purchased_edit->prid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_pharmacy_purchase_request_items_purchased_edit->RightColumnClass ?>"><div <?php echo $view_pharmacy_purchase_request_items_purchased_edit->prid->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_prid">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_edit->prid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_edit->prid->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_prid" name="x_prid" id="x_prid" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_edit->prid->CurrentValue) ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased_edit->prid->CustomMsg ?></div></div>
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
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$view_pharmacy_purchase_request_items_purchased_edit->terminate();
?>