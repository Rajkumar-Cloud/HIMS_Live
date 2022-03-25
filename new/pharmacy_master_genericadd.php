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
$pharmacy_master_generic_add = new pharmacy_master_generic_add();

// Run the page
$pharmacy_master_generic_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_generic_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_master_genericadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpharmacy_master_genericadd = currentForm = new ew.Form("fpharmacy_master_genericadd", "add");

	// Validate form
	fpharmacy_master_genericadd.validate = function() {
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
			<?php if ($pharmacy_master_generic_add->GENNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_GENNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_master_generic_add->GENNAME->caption(), $pharmacy_master_generic_add->GENNAME->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_master_generic_add->CODE->Required) { ?>
				elm = this.getElements("x" + infix + "_CODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_master_generic_add->CODE->caption(), $pharmacy_master_generic_add->CODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_master_generic_add->GRPCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_GRPCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_master_generic_add->GRPCODE->caption(), $pharmacy_master_generic_add->GRPCODE->RequiredErrorMessage)) ?>");
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
	fpharmacy_master_genericadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_master_genericadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_master_genericadd.lists["x_GRPCODE"] = <?php echo $pharmacy_master_generic_add->GRPCODE->Lookup->toClientList($pharmacy_master_generic_add) ?>;
	fpharmacy_master_genericadd.lists["x_GRPCODE"].options = <?php echo JsonEncode($pharmacy_master_generic_add->GRPCODE->lookupOptions()) ?>;
	loadjs.done("fpharmacy_master_genericadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_master_generic_add->showPageHeader(); ?>
<?php
$pharmacy_master_generic_add->showMessage();
?>
<form name="fpharmacy_master_genericadd" id="fpharmacy_master_genericadd" class="<?php echo $pharmacy_master_generic_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_generic">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_master_generic_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pharmacy_master_generic_add->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label id="elh_pharmacy_master_generic_GENNAME" for="x_GENNAME" class="<?php echo $pharmacy_master_generic_add->LeftColumnClass ?>"><?php echo $pharmacy_master_generic_add->GENNAME->caption() ?><?php echo $pharmacy_master_generic_add->GENNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_master_generic_add->RightColumnClass ?>"><div <?php echo $pharmacy_master_generic_add->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_master_generic_GENNAME">
<input type="text" data-table="pharmacy_master_generic" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_master_generic_add->GENNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_master_generic_add->GENNAME->EditValue ?>"<?php echo $pharmacy_master_generic_add->GENNAME->editAttributes() ?>>
</span>
<?php echo $pharmacy_master_generic_add->GENNAME->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_master_generic_add->CODE->Visible) { // CODE ?>
	<div id="r_CODE" class="form-group row">
		<label id="elh_pharmacy_master_generic_CODE" for="x_CODE" class="<?php echo $pharmacy_master_generic_add->LeftColumnClass ?>"><?php echo $pharmacy_master_generic_add->CODE->caption() ?><?php echo $pharmacy_master_generic_add->CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_master_generic_add->RightColumnClass ?>"><div <?php echo $pharmacy_master_generic_add->CODE->cellAttributes() ?>>
<span id="el_pharmacy_master_generic_CODE">
<input type="text" data-table="pharmacy_master_generic" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_master_generic_add->CODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_master_generic_add->CODE->EditValue ?>"<?php echo $pharmacy_master_generic_add->CODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_master_generic_add->CODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_master_generic_add->GRPCODE->Visible) { // GRPCODE ?>
	<div id="r_GRPCODE" class="form-group row">
		<label id="elh_pharmacy_master_generic_GRPCODE" for="x_GRPCODE" class="<?php echo $pharmacy_master_generic_add->LeftColumnClass ?>"><?php echo $pharmacy_master_generic_add->GRPCODE->caption() ?><?php echo $pharmacy_master_generic_add->GRPCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_master_generic_add->RightColumnClass ?>"><div <?php echo $pharmacy_master_generic_add->GRPCODE->cellAttributes() ?>>
<span id="el_pharmacy_master_generic_GRPCODE">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GRPCODE"><?php echo EmptyValue(strval($pharmacy_master_generic_add->GRPCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_master_generic_add->GRPCODE->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_master_generic_add->GRPCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_master_generic_add->GRPCODE->ReadOnly || $pharmacy_master_generic_add->GRPCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GRPCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_master_generic_add->GRPCODE->Lookup->getParamTag($pharmacy_master_generic_add, "p_x_GRPCODE") ?>
<input type="hidden" data-table="pharmacy_master_generic" data-field="x_GRPCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_master_generic_add->GRPCODE->displayValueSeparatorAttribute() ?>" name="x_GRPCODE" id="x_GRPCODE" value="<?php echo $pharmacy_master_generic_add->GRPCODE->CurrentValue ?>"<?php echo $pharmacy_master_generic_add->GRPCODE->editAttributes() ?>>
</span>
<?php echo $pharmacy_master_generic_add->GRPCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_master_generic_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_master_generic_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_master_generic_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_master_generic_add->showPageFooter();
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
$pharmacy_master_generic_add->terminate();
?>