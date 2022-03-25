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
$pres_trade_combination_names_new_add = new pres_trade_combination_names_new_add();

// Run the page
$pres_trade_combination_names_new_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_trade_combination_names_new_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_trade_combination_names_newadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpres_trade_combination_names_newadd = currentForm = new ew.Form("fpres_trade_combination_names_newadd", "add");

	// Validate form
	fpres_trade_combination_names_newadd.validate = function() {
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
			<?php if ($pres_trade_combination_names_new_add->tradenames_id->Required) { ?>
				elm = this.getElements("x" + infix + "_tradenames_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_add->tradenames_id->caption(), $pres_trade_combination_names_new_add->tradenames_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tradenames_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_trade_combination_names_new_add->tradenames_id->errorMessage()) ?>");
			<?php if ($pres_trade_combination_names_new_add->Drug_Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Drug_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_add->Drug_Name->caption(), $pres_trade_combination_names_new_add->Drug_Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_add->Generic_Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Generic_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_add->Generic_Name->caption(), $pres_trade_combination_names_new_add->Generic_Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_add->Trade_Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Trade_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_add->Trade_Name->caption(), $pres_trade_combination_names_new_add->Trade_Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_add->PR_CODE->Required) { ?>
				elm = this.getElements("x" + infix + "_PR_CODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_add->PR_CODE->caption(), $pres_trade_combination_names_new_add->PR_CODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_add->Form->Required) { ?>
				elm = this.getElements("x" + infix + "_Form");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_add->Form->caption(), $pres_trade_combination_names_new_add->Form->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_add->Strength->Required) { ?>
				elm = this.getElements("x" + infix + "_Strength");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_add->Strength->caption(), $pres_trade_combination_names_new_add->Strength->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_add->Unit->Required) { ?>
				elm = this.getElements("x" + infix + "_Unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_add->Unit->caption(), $pres_trade_combination_names_new_add->Unit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_add->CONTAINER_TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_CONTAINER_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_add->CONTAINER_TYPE->caption(), $pres_trade_combination_names_new_add->CONTAINER_TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_add->CONTAINER_STRENGTH->Required) { ?>
				elm = this.getElements("x" + infix + "_CONTAINER_STRENGTH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_add->CONTAINER_STRENGTH->caption(), $pres_trade_combination_names_new_add->CONTAINER_STRENGTH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_add->TypeOfDrug->Required) { ?>
				elm = this.getElements("x" + infix + "_TypeOfDrug");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_add->TypeOfDrug->caption(), $pres_trade_combination_names_new_add->TypeOfDrug->RequiredErrorMessage)) ?>");
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
	fpres_trade_combination_names_newadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_trade_combination_names_newadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpres_trade_combination_names_newadd.lists["x_Generic_Name"] = <?php echo $pres_trade_combination_names_new_add->Generic_Name->Lookup->toClientList($pres_trade_combination_names_new_add) ?>;
	fpres_trade_combination_names_newadd.lists["x_Generic_Name"].options = <?php echo JsonEncode($pres_trade_combination_names_new_add->Generic_Name->lookupOptions()) ?>;
	fpres_trade_combination_names_newadd.lists["x_Form"] = <?php echo $pres_trade_combination_names_new_add->Form->Lookup->toClientList($pres_trade_combination_names_new_add) ?>;
	fpres_trade_combination_names_newadd.lists["x_Form"].options = <?php echo JsonEncode($pres_trade_combination_names_new_add->Form->lookupOptions()) ?>;
	fpres_trade_combination_names_newadd.lists["x_Unit"] = <?php echo $pres_trade_combination_names_new_add->Unit->Lookup->toClientList($pres_trade_combination_names_new_add) ?>;
	fpres_trade_combination_names_newadd.lists["x_Unit"].options = <?php echo JsonEncode($pres_trade_combination_names_new_add->Unit->lookupOptions()) ?>;
	fpres_trade_combination_names_newadd.lists["x_TypeOfDrug"] = <?php echo $pres_trade_combination_names_new_add->TypeOfDrug->Lookup->toClientList($pres_trade_combination_names_new_add) ?>;
	fpres_trade_combination_names_newadd.lists["x_TypeOfDrug"].options = <?php echo JsonEncode($pres_trade_combination_names_new_add->TypeOfDrug->options(FALSE, TRUE)) ?>;
	loadjs.done("fpres_trade_combination_names_newadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_trade_combination_names_new_add->showPageHeader(); ?>
<?php
$pres_trade_combination_names_new_add->showMessage();
?>
<form name="fpres_trade_combination_names_newadd" id="fpres_trade_combination_names_newadd" class="<?php echo $pres_trade_combination_names_new_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_trade_combination_names_new">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pres_trade_combination_names_new_add->IsModal ?>">
<?php if ($pres_trade_combination_names_new->getCurrentMasterTable() == "pres_tradenames_new") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pres_tradenames_new">
<input type="hidden" name="fk_ID" value="<?php echo HtmlEncode($pres_trade_combination_names_new_add->tradenames_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($pres_trade_combination_names_new_add->tradenames_id->Visible) { // tradenames_id ?>
	<div id="r_tradenames_id" class="form-group row">
		<label id="elh_pres_trade_combination_names_new_tradenames_id" for="x_tradenames_id" class="<?php echo $pres_trade_combination_names_new_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_new_add->tradenames_id->caption() ?><?php echo $pres_trade_combination_names_new_add->tradenames_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_new_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_new_add->tradenames_id->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new_add->tradenames_id->getSessionValue() != "") { ?>
<span id="el_pres_trade_combination_names_new_tradenames_id">
<span<?php echo $pres_trade_combination_names_new_add->tradenames_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_add->tradenames_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_tradenames_id" name="x_tradenames_id" value="<?php echo HtmlEncode($pres_trade_combination_names_new_add->tradenames_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pres_trade_combination_names_new_tradenames_id">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="x_tradenames_id" id="x_tradenames_id" size="30" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_add->tradenames_id->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_add->tradenames_id->EditValue ?>"<?php echo $pres_trade_combination_names_new_add->tradenames_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pres_trade_combination_names_new_add->tradenames_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_trade_combination_names_new_add->Drug_Name->Visible) { // Drug_Name ?>
	<div id="r_Drug_Name" class="form-group row">
		<label id="elh_pres_trade_combination_names_new_Drug_Name" for="x_Drug_Name" class="<?php echo $pres_trade_combination_names_new_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_new_add->Drug_Name->caption() ?><?php echo $pres_trade_combination_names_new_add->Drug_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_new_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_new_add->Drug_Name->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Drug_Name">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="x_Drug_Name" id="x_Drug_Name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_add->Drug_Name->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_add->Drug_Name->EditValue ?>"<?php echo $pres_trade_combination_names_new_add->Drug_Name->editAttributes() ?>>
</span>
<?php echo $pres_trade_combination_names_new_add->Drug_Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_trade_combination_names_new_add->Generic_Name->Visible) { // Generic_Name ?>
	<div id="r_Generic_Name" class="form-group row">
		<label id="elh_pres_trade_combination_names_new_Generic_Name" for="x_Generic_Name" class="<?php echo $pres_trade_combination_names_new_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_new_add->Generic_Name->caption() ?><?php echo $pres_trade_combination_names_new_add->Generic_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_new_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_new_add->Generic_Name->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Generic_Name">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" data-value-separator="<?php echo $pres_trade_combination_names_new_add->Generic_Name->displayValueSeparatorAttribute() ?>" id="x_Generic_Name" name="x_Generic_Name"<?php echo $pres_trade_combination_names_new_add->Generic_Name->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_add->Generic_Name->selectOptionListHtml("x_Generic_Name") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_add->Generic_Name->Lookup->getParamTag($pres_trade_combination_names_new_add, "p_x_Generic_Name") ?>
</span>
<?php echo $pres_trade_combination_names_new_add->Generic_Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_trade_combination_names_new_add->Trade_Name->Visible) { // Trade_Name ?>
	<div id="r_Trade_Name" class="form-group row">
		<label id="elh_pres_trade_combination_names_new_Trade_Name" for="x_Trade_Name" class="<?php echo $pres_trade_combination_names_new_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_new_add->Trade_Name->caption() ?><?php echo $pres_trade_combination_names_new_add->Trade_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_new_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_new_add->Trade_Name->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Trade_Name">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="x_Trade_Name" id="x_Trade_Name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_add->Trade_Name->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_add->Trade_Name->EditValue ?>"<?php echo $pres_trade_combination_names_new_add->Trade_Name->editAttributes() ?>>
</span>
<?php echo $pres_trade_combination_names_new_add->Trade_Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_trade_combination_names_new_add->PR_CODE->Visible) { // PR_CODE ?>
	<div id="r_PR_CODE" class="form-group row">
		<label id="elh_pres_trade_combination_names_new_PR_CODE" for="x_PR_CODE" class="<?php echo $pres_trade_combination_names_new_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_new_add->PR_CODE->caption() ?><?php echo $pres_trade_combination_names_new_add->PR_CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_new_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_new_add->PR_CODE->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_PR_CODE">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="x_PR_CODE" id="x_PR_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_add->PR_CODE->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_add->PR_CODE->EditValue ?>"<?php echo $pres_trade_combination_names_new_add->PR_CODE->editAttributes() ?>>
</span>
<?php echo $pres_trade_combination_names_new_add->PR_CODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_trade_combination_names_new_add->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_pres_trade_combination_names_new_Form" for="x_Form" class="<?php echo $pres_trade_combination_names_new_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_new_add->Form->caption() ?><?php echo $pres_trade_combination_names_new_add->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_new_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_new_add->Form->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Form">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Form" data-value-separator="<?php echo $pres_trade_combination_names_new_add->Form->displayValueSeparatorAttribute() ?>" id="x_Form" name="x_Form"<?php echo $pres_trade_combination_names_new_add->Form->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_add->Form->selectOptionListHtml("x_Form") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_add->Form->Lookup->getParamTag($pres_trade_combination_names_new_add, "p_x_Form") ?>
</span>
<?php echo $pres_trade_combination_names_new_add->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_trade_combination_names_new_add->Strength->Visible) { // Strength ?>
	<div id="r_Strength" class="form-group row">
		<label id="elh_pres_trade_combination_names_new_Strength" for="x_Strength" class="<?php echo $pres_trade_combination_names_new_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_new_add->Strength->caption() ?><?php echo $pres_trade_combination_names_new_add->Strength->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_new_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_new_add->Strength->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Strength">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="x_Strength" id="x_Strength" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_add->Strength->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_add->Strength->EditValue ?>"<?php echo $pres_trade_combination_names_new_add->Strength->editAttributes() ?>>
</span>
<?php echo $pres_trade_combination_names_new_add->Strength->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_trade_combination_names_new_add->Unit->Visible) { // Unit ?>
	<div id="r_Unit" class="form-group row">
		<label id="elh_pres_trade_combination_names_new_Unit" for="x_Unit" class="<?php echo $pres_trade_combination_names_new_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_new_add->Unit->caption() ?><?php echo $pres_trade_combination_names_new_add->Unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_new_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_new_add->Unit->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Unit">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Unit" data-value-separator="<?php echo $pres_trade_combination_names_new_add->Unit->displayValueSeparatorAttribute() ?>" id="x_Unit" name="x_Unit"<?php echo $pres_trade_combination_names_new_add->Unit->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_add->Unit->selectOptionListHtml("x_Unit") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_add->Unit->Lookup->getParamTag($pres_trade_combination_names_new_add, "p_x_Unit") ?>
</span>
<?php echo $pres_trade_combination_names_new_add->Unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_trade_combination_names_new_add->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
	<div id="r_CONTAINER_TYPE" class="form-group row">
		<label id="elh_pres_trade_combination_names_new_CONTAINER_TYPE" for="x_CONTAINER_TYPE" class="<?php echo $pres_trade_combination_names_new_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_new_add->CONTAINER_TYPE->caption() ?><?php echo $pres_trade_combination_names_new_add->CONTAINER_TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_new_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_new_add->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_CONTAINER_TYPE">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="x_CONTAINER_TYPE" id="x_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_add->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_add->CONTAINER_TYPE->EditValue ?>"<?php echo $pres_trade_combination_names_new_add->CONTAINER_TYPE->editAttributes() ?>>
</span>
<?php echo $pres_trade_combination_names_new_add->CONTAINER_TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_trade_combination_names_new_add->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
	<div id="r_CONTAINER_STRENGTH" class="form-group row">
		<label id="elh_pres_trade_combination_names_new_CONTAINER_STRENGTH" for="x_CONTAINER_STRENGTH" class="<?php echo $pres_trade_combination_names_new_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_new_add->CONTAINER_STRENGTH->caption() ?><?php echo $pres_trade_combination_names_new_add->CONTAINER_STRENGTH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_new_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_new_add->CONTAINER_STRENGTH->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_CONTAINER_STRENGTH">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="x_CONTAINER_STRENGTH" id="x_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_add->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_add->CONTAINER_STRENGTH->EditValue ?>"<?php echo $pres_trade_combination_names_new_add->CONTAINER_STRENGTH->editAttributes() ?>>
</span>
<?php echo $pres_trade_combination_names_new_add->CONTAINER_STRENGTH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_trade_combination_names_new_add->TypeOfDrug->Visible) { // TypeOfDrug ?>
	<div id="r_TypeOfDrug" class="form-group row">
		<label id="elh_pres_trade_combination_names_new_TypeOfDrug" for="x_TypeOfDrug" class="<?php echo $pres_trade_combination_names_new_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_new_add->TypeOfDrug->caption() ?><?php echo $pres_trade_combination_names_new_add->TypeOfDrug->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_new_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_new_add->TypeOfDrug->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_TypeOfDrug">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" data-value-separator="<?php echo $pres_trade_combination_names_new_add->TypeOfDrug->displayValueSeparatorAttribute() ?>" id="x_TypeOfDrug" name="x_TypeOfDrug"<?php echo $pres_trade_combination_names_new_add->TypeOfDrug->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_add->TypeOfDrug->selectOptionListHtml("x_TypeOfDrug") ?>
		</select>
</div>
</span>
<?php echo $pres_trade_combination_names_new_add->TypeOfDrug->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_trade_combination_names_new_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_trade_combination_names_new_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_trade_combination_names_new_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_trade_combination_names_new_add->showPageFooter();
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
$pres_trade_combination_names_new_add->terminate();
?>