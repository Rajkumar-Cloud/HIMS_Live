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
$pres_categoryallergy_add = new pres_categoryallergy_add();

// Run the page
$pres_categoryallergy_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_categoryallergy_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_categoryallergyadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpres_categoryallergyadd = currentForm = new ew.Form("fpres_categoryallergyadd", "add");

	// Validate form
	fpres_categoryallergyadd.validate = function() {
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
			<?php if ($pres_categoryallergy_add->Genericname->Required) { ?>
				elm = this.getElements("x" + infix + "_Genericname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_categoryallergy_add->Genericname->caption(), $pres_categoryallergy_add->Genericname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_categoryallergy_add->CategoryDrug->Required) { ?>
				elm = this.getElements("x" + infix + "_CategoryDrug");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_categoryallergy_add->CategoryDrug->caption(), $pres_categoryallergy_add->CategoryDrug->RequiredErrorMessage)) ?>");
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
	fpres_categoryallergyadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_categoryallergyadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpres_categoryallergyadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_categoryallergy_add->showPageHeader(); ?>
<?php
$pres_categoryallergy_add->showMessage();
?>
<form name="fpres_categoryallergyadd" id="fpres_categoryallergyadd" class="<?php echo $pres_categoryallergy_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_categoryallergy">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pres_categoryallergy_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pres_categoryallergy_add->Genericname->Visible) { // Genericname ?>
	<div id="r_Genericname" class="form-group row">
		<label id="elh_pres_categoryallergy_Genericname" for="x_Genericname" class="<?php echo $pres_categoryallergy_add->LeftColumnClass ?>"><?php echo $pres_categoryallergy_add->Genericname->caption() ?><?php echo $pres_categoryallergy_add->Genericname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_categoryallergy_add->RightColumnClass ?>"><div <?php echo $pres_categoryallergy_add->Genericname->cellAttributes() ?>>
<span id="el_pres_categoryallergy_Genericname">
<input type="text" data-table="pres_categoryallergy" data-field="x_Genericname" name="x_Genericname" id="x_Genericname" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($pres_categoryallergy_add->Genericname->getPlaceHolder()) ?>" value="<?php echo $pres_categoryallergy_add->Genericname->EditValue ?>"<?php echo $pres_categoryallergy_add->Genericname->editAttributes() ?>>
</span>
<?php echo $pres_categoryallergy_add->Genericname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_categoryallergy_add->CategoryDrug->Visible) { // CategoryDrug ?>
	<div id="r_CategoryDrug" class="form-group row">
		<label id="elh_pres_categoryallergy_CategoryDrug" for="x_CategoryDrug" class="<?php echo $pres_categoryallergy_add->LeftColumnClass ?>"><?php echo $pres_categoryallergy_add->CategoryDrug->caption() ?><?php echo $pres_categoryallergy_add->CategoryDrug->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_categoryallergy_add->RightColumnClass ?>"><div <?php echo $pres_categoryallergy_add->CategoryDrug->cellAttributes() ?>>
<span id="el_pres_categoryallergy_CategoryDrug">
<input type="text" data-table="pres_categoryallergy" data-field="x_CategoryDrug" name="x_CategoryDrug" id="x_CategoryDrug" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($pres_categoryallergy_add->CategoryDrug->getPlaceHolder()) ?>" value="<?php echo $pres_categoryallergy_add->CategoryDrug->EditValue ?>"<?php echo $pres_categoryallergy_add->CategoryDrug->editAttributes() ?>>
</span>
<?php echo $pres_categoryallergy_add->CategoryDrug->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_categoryallergy_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_categoryallergy_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_categoryallergy_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_categoryallergy_add->showPageFooter();
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
$pres_categoryallergy_add->terminate();
?>