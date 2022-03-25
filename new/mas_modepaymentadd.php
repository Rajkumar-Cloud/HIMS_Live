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
$mas_modepayment_add = new mas_modepayment_add();

// Run the page
$mas_modepayment_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_modepayment_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_modepaymentadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmas_modepaymentadd = currentForm = new ew.Form("fmas_modepaymentadd", "add");

	// Validate form
	fmas_modepaymentadd.validate = function() {
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
			<?php if ($mas_modepayment_add->Mode->Required) { ?>
				elm = this.getElements("x" + infix + "_Mode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_modepayment_add->Mode->caption(), $mas_modepayment_add->Mode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_modepayment_add->BankingDatails->Required) { ?>
				elm = this.getElements("x" + infix + "_BankingDatails");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_modepayment_add->BankingDatails->caption(), $mas_modepayment_add->BankingDatails->RequiredErrorMessage)) ?>");
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
	fmas_modepaymentadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_modepaymentadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmas_modepaymentadd.lists["x_BankingDatails"] = <?php echo $mas_modepayment_add->BankingDatails->Lookup->toClientList($mas_modepayment_add) ?>;
	fmas_modepaymentadd.lists["x_BankingDatails"].options = <?php echo JsonEncode($mas_modepayment_add->BankingDatails->options(FALSE, TRUE)) ?>;
	loadjs.done("fmas_modepaymentadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_modepayment_add->showPageHeader(); ?>
<?php
$mas_modepayment_add->showMessage();
?>
<form name="fmas_modepaymentadd" id="fmas_modepaymentadd" class="<?php echo $mas_modepayment_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_modepayment">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$mas_modepayment_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($mas_modepayment_add->Mode->Visible) { // Mode ?>
	<div id="r_Mode" class="form-group row">
		<label id="elh_mas_modepayment_Mode" for="x_Mode" class="<?php echo $mas_modepayment_add->LeftColumnClass ?>"><?php echo $mas_modepayment_add->Mode->caption() ?><?php echo $mas_modepayment_add->Mode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_modepayment_add->RightColumnClass ?>"><div <?php echo $mas_modepayment_add->Mode->cellAttributes() ?>>
<span id="el_mas_modepayment_Mode">
<input type="text" data-table="mas_modepayment" data-field="x_Mode" name="x_Mode" id="x_Mode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_modepayment_add->Mode->getPlaceHolder()) ?>" value="<?php echo $mas_modepayment_add->Mode->EditValue ?>"<?php echo $mas_modepayment_add->Mode->editAttributes() ?>>
</span>
<?php echo $mas_modepayment_add->Mode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_modepayment_add->BankingDatails->Visible) { // BankingDatails ?>
	<div id="r_BankingDatails" class="form-group row">
		<label id="elh_mas_modepayment_BankingDatails" for="x_BankingDatails" class="<?php echo $mas_modepayment_add->LeftColumnClass ?>"><?php echo $mas_modepayment_add->BankingDatails->caption() ?><?php echo $mas_modepayment_add->BankingDatails->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_modepayment_add->RightColumnClass ?>"><div <?php echo $mas_modepayment_add->BankingDatails->cellAttributes() ?>>
<span id="el_mas_modepayment_BankingDatails">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_modepayment" data-field="x_BankingDatails" data-value-separator="<?php echo $mas_modepayment_add->BankingDatails->displayValueSeparatorAttribute() ?>" id="x_BankingDatails" name="x_BankingDatails"<?php echo $mas_modepayment_add->BankingDatails->editAttributes() ?>>
			<?php echo $mas_modepayment_add->BankingDatails->selectOptionListHtml("x_BankingDatails") ?>
		</select>
</div>
</span>
<?php echo $mas_modepayment_add->BankingDatails->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_modepayment_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_modepayment_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_modepayment_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_modepayment_add->showPageFooter();
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
$mas_modepayment_add->terminate();
?>