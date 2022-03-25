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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fmas_modepaymentadd = currentForm = new ew.Form("fmas_modepaymentadd", "add");

// Validate form
fmas_modepaymentadd.validate = function() {
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
		<?php if ($mas_modepayment_add->Mode->Required) { ?>
			elm = this.getElements("x" + infix + "_Mode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_modepayment->Mode->caption(), $mas_modepayment->Mode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_modepayment_add->BankingDatails->Required) { ?>
			elm = this.getElements("x" + infix + "_BankingDatails");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_modepayment->BankingDatails->caption(), $mas_modepayment->BankingDatails->RequiredErrorMessage)) ?>");
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
fmas_modepaymentadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_modepaymentadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_modepaymentadd.lists["x_BankingDatails"] = <?php echo $mas_modepayment_add->BankingDatails->Lookup->toClientList() ?>;
fmas_modepaymentadd.lists["x_BankingDatails"].options = <?php echo JsonEncode($mas_modepayment_add->BankingDatails->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_modepayment_add->showPageHeader(); ?>
<?php
$mas_modepayment_add->showMessage();
?>
<form name="fmas_modepaymentadd" id="fmas_modepaymentadd" class="<?php echo $mas_modepayment_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_modepayment_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_modepayment_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_modepayment">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$mas_modepayment_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($mas_modepayment->Mode->Visible) { // Mode ?>
	<div id="r_Mode" class="form-group row">
		<label id="elh_mas_modepayment_Mode" for="x_Mode" class="<?php echo $mas_modepayment_add->LeftColumnClass ?>"><?php echo $mas_modepayment->Mode->caption() ?><?php echo ($mas_modepayment->Mode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_modepayment_add->RightColumnClass ?>"><div<?php echo $mas_modepayment->Mode->cellAttributes() ?>>
<span id="el_mas_modepayment_Mode">
<input type="text" data-table="mas_modepayment" data-field="x_Mode" name="x_Mode" id="x_Mode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_modepayment->Mode->getPlaceHolder()) ?>" value="<?php echo $mas_modepayment->Mode->EditValue ?>"<?php echo $mas_modepayment->Mode->editAttributes() ?>>
</span>
<?php echo $mas_modepayment->Mode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_modepayment->BankingDatails->Visible) { // BankingDatails ?>
	<div id="r_BankingDatails" class="form-group row">
		<label id="elh_mas_modepayment_BankingDatails" for="x_BankingDatails" class="<?php echo $mas_modepayment_add->LeftColumnClass ?>"><?php echo $mas_modepayment->BankingDatails->caption() ?><?php echo ($mas_modepayment->BankingDatails->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_modepayment_add->RightColumnClass ?>"><div<?php echo $mas_modepayment->BankingDatails->cellAttributes() ?>>
<span id="el_mas_modepayment_BankingDatails">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_modepayment" data-field="x_BankingDatails" data-value-separator="<?php echo $mas_modepayment->BankingDatails->displayValueSeparatorAttribute() ?>" id="x_BankingDatails" name="x_BankingDatails"<?php echo $mas_modepayment->BankingDatails->editAttributes() ?>>
		<?php echo $mas_modepayment->BankingDatails->selectOptionListHtml("x_BankingDatails") ?>
	</select>
</div>
</span>
<?php echo $mas_modepayment->BankingDatails->CustomMsg ?></div></div>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_modepayment_add->terminate();
?>