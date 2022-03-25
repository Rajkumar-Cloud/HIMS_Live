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
$pres_trade_combination_names_add = new pres_trade_combination_names_add();

// Run the page
$pres_trade_combination_names_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_trade_combination_names_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_trade_combination_namesadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpres_trade_combination_namesadd = currentForm = new ew.Form("fpres_trade_combination_namesadd", "add");

	// Validate form
	fpres_trade_combination_namesadd.validate = function() {
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
			<?php if ($pres_trade_combination_names_add->tradenames_id->Required) { ?>
				elm = this.getElements("x" + infix + "_tradenames_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_add->tradenames_id->caption(), $pres_trade_combination_names_add->tradenames_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tradenames_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_trade_combination_names_add->tradenames_id->errorMessage()) ?>");
			<?php if ($pres_trade_combination_names_add->GENERIC_NAMES->Required) { ?>
				elm = this.getElements("x" + infix + "_GENERIC_NAMES");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_add->GENERIC_NAMES->caption(), $pres_trade_combination_names_add->GENERIC_NAMES->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_add->TRADE_NAME->Required) { ?>
				elm = this.getElements("x" + infix + "_TRADE_NAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_add->TRADE_NAME->caption(), $pres_trade_combination_names_add->TRADE_NAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_add->Drug_Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Drug_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_add->Drug_Name->caption(), $pres_trade_combination_names_add->Drug_Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_add->PR_CODE->Required) { ?>
				elm = this.getElements("x" + infix + "_PR_CODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_add->PR_CODE->caption(), $pres_trade_combination_names_add->PR_CODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_add->GenericNames_symbols->Required) { ?>
				elm = this.getElements("x" + infix + "_GenericNames_symbols");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_add->GenericNames_symbols->caption(), $pres_trade_combination_names_add->GenericNames_symbols->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_add->CONTAINER_TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_CONTAINER_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_add->CONTAINER_TYPE->caption(), $pres_trade_combination_names_add->CONTAINER_TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_add->STRENGTH->Required) { ?>
				elm = this.getElements("x" + infix + "_STRENGTH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_add->STRENGTH->caption(), $pres_trade_combination_names_add->STRENGTH->RequiredErrorMessage)) ?>");
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
	fpres_trade_combination_namesadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_trade_combination_namesadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpres_trade_combination_namesadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_trade_combination_names_add->showPageHeader(); ?>
<?php
$pres_trade_combination_names_add->showMessage();
?>
<form name="fpres_trade_combination_namesadd" id="fpres_trade_combination_namesadd" class="<?php echo $pres_trade_combination_names_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_trade_combination_names">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pres_trade_combination_names_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pres_trade_combination_names_add->tradenames_id->Visible) { // tradenames_id ?>
	<div id="r_tradenames_id" class="form-group row">
		<label id="elh_pres_trade_combination_names_tradenames_id" for="x_tradenames_id" class="<?php echo $pres_trade_combination_names_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_add->tradenames_id->caption() ?><?php echo $pres_trade_combination_names_add->tradenames_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_add->tradenames_id->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_tradenames_id">
<input type="text" data-table="pres_trade_combination_names" data-field="x_tradenames_id" name="x_tradenames_id" id="x_tradenames_id" size="30" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_add->tradenames_id->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_add->tradenames_id->EditValue ?>"<?php echo $pres_trade_combination_names_add->tradenames_id->editAttributes() ?>>
</span>
<?php echo $pres_trade_combination_names_add->tradenames_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_trade_combination_names_add->GENERIC_NAMES->Visible) { // GENERIC_NAMES ?>
	<div id="r_GENERIC_NAMES" class="form-group row">
		<label id="elh_pres_trade_combination_names_GENERIC_NAMES" for="x_GENERIC_NAMES" class="<?php echo $pres_trade_combination_names_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_add->GENERIC_NAMES->caption() ?><?php echo $pres_trade_combination_names_add->GENERIC_NAMES->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_add->GENERIC_NAMES->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_GENERIC_NAMES">
<textarea data-table="pres_trade_combination_names" data-field="x_GENERIC_NAMES" name="x_GENERIC_NAMES" id="x_GENERIC_NAMES" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_add->GENERIC_NAMES->getPlaceHolder()) ?>"<?php echo $pres_trade_combination_names_add->GENERIC_NAMES->editAttributes() ?>><?php echo $pres_trade_combination_names_add->GENERIC_NAMES->EditValue ?></textarea>
</span>
<?php echo $pres_trade_combination_names_add->GENERIC_NAMES->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_trade_combination_names_add->TRADE_NAME->Visible) { // TRADE_NAME ?>
	<div id="r_TRADE_NAME" class="form-group row">
		<label id="elh_pres_trade_combination_names_TRADE_NAME" for="x_TRADE_NAME" class="<?php echo $pres_trade_combination_names_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_add->TRADE_NAME->caption() ?><?php echo $pres_trade_combination_names_add->TRADE_NAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_add->TRADE_NAME->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_TRADE_NAME">
<textarea data-table="pres_trade_combination_names" data-field="x_TRADE_NAME" name="x_TRADE_NAME" id="x_TRADE_NAME" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_add->TRADE_NAME->getPlaceHolder()) ?>"<?php echo $pres_trade_combination_names_add->TRADE_NAME->editAttributes() ?>><?php echo $pres_trade_combination_names_add->TRADE_NAME->EditValue ?></textarea>
</span>
<?php echo $pres_trade_combination_names_add->TRADE_NAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_trade_combination_names_add->Drug_Name->Visible) { // Drug_Name ?>
	<div id="r_Drug_Name" class="form-group row">
		<label id="elh_pres_trade_combination_names_Drug_Name" for="x_Drug_Name" class="<?php echo $pres_trade_combination_names_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_add->Drug_Name->caption() ?><?php echo $pres_trade_combination_names_add->Drug_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_add->Drug_Name->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_Drug_Name">
<textarea data-table="pres_trade_combination_names" data-field="x_Drug_Name" name="x_Drug_Name" id="x_Drug_Name" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_add->Drug_Name->getPlaceHolder()) ?>"<?php echo $pres_trade_combination_names_add->Drug_Name->editAttributes() ?>><?php echo $pres_trade_combination_names_add->Drug_Name->EditValue ?></textarea>
</span>
<?php echo $pres_trade_combination_names_add->Drug_Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_trade_combination_names_add->PR_CODE->Visible) { // PR_CODE ?>
	<div id="r_PR_CODE" class="form-group row">
		<label id="elh_pres_trade_combination_names_PR_CODE" for="x_PR_CODE" class="<?php echo $pres_trade_combination_names_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_add->PR_CODE->caption() ?><?php echo $pres_trade_combination_names_add->PR_CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_add->PR_CODE->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_PR_CODE">
<input type="text" data-table="pres_trade_combination_names" data-field="x_PR_CODE" name="x_PR_CODE" id="x_PR_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_add->PR_CODE->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_add->PR_CODE->EditValue ?>"<?php echo $pres_trade_combination_names_add->PR_CODE->editAttributes() ?>>
</span>
<?php echo $pres_trade_combination_names_add->PR_CODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_trade_combination_names_add->GenericNames_symbols->Visible) { // GenericNames_symbols ?>
	<div id="r_GenericNames_symbols" class="form-group row">
		<label id="elh_pres_trade_combination_names_GenericNames_symbols" for="x_GenericNames_symbols" class="<?php echo $pres_trade_combination_names_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_add->GenericNames_symbols->caption() ?><?php echo $pres_trade_combination_names_add->GenericNames_symbols->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_add->GenericNames_symbols->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_GenericNames_symbols">
<textarea data-table="pres_trade_combination_names" data-field="x_GenericNames_symbols" name="x_GenericNames_symbols" id="x_GenericNames_symbols" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_add->GenericNames_symbols->getPlaceHolder()) ?>"<?php echo $pres_trade_combination_names_add->GenericNames_symbols->editAttributes() ?>><?php echo $pres_trade_combination_names_add->GenericNames_symbols->EditValue ?></textarea>
</span>
<?php echo $pres_trade_combination_names_add->GenericNames_symbols->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_trade_combination_names_add->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
	<div id="r_CONTAINER_TYPE" class="form-group row">
		<label id="elh_pres_trade_combination_names_CONTAINER_TYPE" for="x_CONTAINER_TYPE" class="<?php echo $pres_trade_combination_names_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_add->CONTAINER_TYPE->caption() ?><?php echo $pres_trade_combination_names_add->CONTAINER_TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_add->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_CONTAINER_TYPE">
<input type="text" data-table="pres_trade_combination_names" data-field="x_CONTAINER_TYPE" name="x_CONTAINER_TYPE" id="x_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_add->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_add->CONTAINER_TYPE->EditValue ?>"<?php echo $pres_trade_combination_names_add->CONTAINER_TYPE->editAttributes() ?>>
</span>
<?php echo $pres_trade_combination_names_add->CONTAINER_TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_trade_combination_names_add->STRENGTH->Visible) { // STRENGTH ?>
	<div id="r_STRENGTH" class="form-group row">
		<label id="elh_pres_trade_combination_names_STRENGTH" for="x_STRENGTH" class="<?php echo $pres_trade_combination_names_add->LeftColumnClass ?>"><?php echo $pres_trade_combination_names_add->STRENGTH->caption() ?><?php echo $pres_trade_combination_names_add->STRENGTH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_trade_combination_names_add->RightColumnClass ?>"><div <?php echo $pres_trade_combination_names_add->STRENGTH->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_STRENGTH">
<input type="text" data-table="pres_trade_combination_names" data-field="x_STRENGTH" name="x_STRENGTH" id="x_STRENGTH" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_add->STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_add->STRENGTH->EditValue ?>"<?php echo $pres_trade_combination_names_add->STRENGTH->editAttributes() ?>>
</span>
<?php echo $pres_trade_combination_names_add->STRENGTH->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_trade_combination_names_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_trade_combination_names_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_trade_combination_names_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_trade_combination_names_add->showPageFooter();
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
$pres_trade_combination_names_add->terminate();
?>