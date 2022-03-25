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
$pres_genericinteractions_add = new pres_genericinteractions_add();

// Run the page
$pres_genericinteractions_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_genericinteractions_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_genericinteractionsadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpres_genericinteractionsadd = currentForm = new ew.Form("fpres_genericinteractionsadd", "add");

	// Validate form
	fpres_genericinteractionsadd.validate = function() {
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
			<?php if ($pres_genericinteractions_add->Genericname->Required) { ?>
				elm = this.getElements("x" + infix + "_Genericname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_add->Genericname->caption(), $pres_genericinteractions_add->Genericname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_genericinteractions_add->Catid->Required) { ?>
				elm = this.getElements("x" + infix + "_Catid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_add->Catid->caption(), $pres_genericinteractions_add->Catid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Catid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_genericinteractions_add->Catid->errorMessage()) ?>");
			<?php if ($pres_genericinteractions_add->Interactions->Required) { ?>
				elm = this.getElements("x" + infix + "_Interactions");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_add->Interactions->caption(), $pres_genericinteractions_add->Interactions->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_genericinteractions_add->Intid->Required) { ?>
				elm = this.getElements("x" + infix + "_Intid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_add->Intid->caption(), $pres_genericinteractions_add->Intid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Intid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_genericinteractions_add->Intid->errorMessage()) ?>");
			<?php if ($pres_genericinteractions_add->Createddt->Required) { ?>
				elm = this.getElements("x" + infix + "_Createddt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_add->Createddt->caption(), $pres_genericinteractions_add->Createddt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Createddt");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_genericinteractions_add->Createddt->errorMessage()) ?>");
			<?php if ($pres_genericinteractions_add->Createdtm->Required) { ?>
				elm = this.getElements("x" + infix + "_Createdtm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_add->Createdtm->caption(), $pres_genericinteractions_add->Createdtm->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Createdtm");
				if (elm && !ew.checkTime(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_genericinteractions_add->Createdtm->errorMessage()) ?>");
			<?php if ($pres_genericinteractions_add->Statusbit->Required) { ?>
				elm = this.getElements("x" + infix + "_Statusbit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_add->Statusbit->caption(), $pres_genericinteractions_add->Statusbit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Statusbit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_genericinteractions_add->Statusbit->errorMessage()) ?>");
			<?php if ($pres_genericinteractions_add->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_add->Remarks->caption(), $pres_genericinteractions_add->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_genericinteractions_add->Username->Required) { ?>
				elm = this.getElements("x" + infix + "_Username");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_genericinteractions_add->Username->caption(), $pres_genericinteractions_add->Username->RequiredErrorMessage)) ?>");
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
	fpres_genericinteractionsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_genericinteractionsadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpres_genericinteractionsadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_genericinteractions_add->showPageHeader(); ?>
<?php
$pres_genericinteractions_add->showMessage();
?>
<form name="fpres_genericinteractionsadd" id="fpres_genericinteractionsadd" class="<?php echo $pres_genericinteractions_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_genericinteractions">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pres_genericinteractions_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pres_genericinteractions_add->Genericname->Visible) { // Genericname ?>
	<div id="r_Genericname" class="form-group row">
		<label id="elh_pres_genericinteractions_Genericname" for="x_Genericname" class="<?php echo $pres_genericinteractions_add->LeftColumnClass ?>"><?php echo $pres_genericinteractions_add->Genericname->caption() ?><?php echo $pres_genericinteractions_add->Genericname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_add->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_add->Genericname->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Genericname">
<input type="text" data-table="pres_genericinteractions" data-field="x_Genericname" name="x_Genericname" id="x_Genericname" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_genericinteractions_add->Genericname->getPlaceHolder()) ?>" value="<?php echo $pres_genericinteractions_add->Genericname->EditValue ?>"<?php echo $pres_genericinteractions_add->Genericname->editAttributes() ?>>
</span>
<?php echo $pres_genericinteractions_add->Genericname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_genericinteractions_add->Catid->Visible) { // Catid ?>
	<div id="r_Catid" class="form-group row">
		<label id="elh_pres_genericinteractions_Catid" for="x_Catid" class="<?php echo $pres_genericinteractions_add->LeftColumnClass ?>"><?php echo $pres_genericinteractions_add->Catid->caption() ?><?php echo $pres_genericinteractions_add->Catid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_add->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_add->Catid->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Catid">
<input type="text" data-table="pres_genericinteractions" data-field="x_Catid" name="x_Catid" id="x_Catid" size="30" placeholder="<?php echo HtmlEncode($pres_genericinteractions_add->Catid->getPlaceHolder()) ?>" value="<?php echo $pres_genericinteractions_add->Catid->EditValue ?>"<?php echo $pres_genericinteractions_add->Catid->editAttributes() ?>>
</span>
<?php echo $pres_genericinteractions_add->Catid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_genericinteractions_add->Interactions->Visible) { // Interactions ?>
	<div id="r_Interactions" class="form-group row">
		<label id="elh_pres_genericinteractions_Interactions" for="x_Interactions" class="<?php echo $pres_genericinteractions_add->LeftColumnClass ?>"><?php echo $pres_genericinteractions_add->Interactions->caption() ?><?php echo $pres_genericinteractions_add->Interactions->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_add->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_add->Interactions->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Interactions">
<input type="text" data-table="pres_genericinteractions" data-field="x_Interactions" name="x_Interactions" id="x_Interactions" placeholder="<?php echo HtmlEncode($pres_genericinteractions_add->Interactions->getPlaceHolder()) ?>" value="<?php echo $pres_genericinteractions_add->Interactions->EditValue ?>"<?php echo $pres_genericinteractions_add->Interactions->editAttributes() ?>>
</span>
<?php echo $pres_genericinteractions_add->Interactions->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_genericinteractions_add->Intid->Visible) { // Intid ?>
	<div id="r_Intid" class="form-group row">
		<label id="elh_pres_genericinteractions_Intid" for="x_Intid" class="<?php echo $pres_genericinteractions_add->LeftColumnClass ?>"><?php echo $pres_genericinteractions_add->Intid->caption() ?><?php echo $pres_genericinteractions_add->Intid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_add->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_add->Intid->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Intid">
<input type="text" data-table="pres_genericinteractions" data-field="x_Intid" name="x_Intid" id="x_Intid" size="30" placeholder="<?php echo HtmlEncode($pres_genericinteractions_add->Intid->getPlaceHolder()) ?>" value="<?php echo $pres_genericinteractions_add->Intid->EditValue ?>"<?php echo $pres_genericinteractions_add->Intid->editAttributes() ?>>
</span>
<?php echo $pres_genericinteractions_add->Intid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_genericinteractions_add->Createddt->Visible) { // Createddt ?>
	<div id="r_Createddt" class="form-group row">
		<label id="elh_pres_genericinteractions_Createddt" for="x_Createddt" class="<?php echo $pres_genericinteractions_add->LeftColumnClass ?>"><?php echo $pres_genericinteractions_add->Createddt->caption() ?><?php echo $pres_genericinteractions_add->Createddt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_add->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_add->Createddt->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Createddt">
<input type="text" data-table="pres_genericinteractions" data-field="x_Createddt" name="x_Createddt" id="x_Createddt" placeholder="<?php echo HtmlEncode($pres_genericinteractions_add->Createddt->getPlaceHolder()) ?>" value="<?php echo $pres_genericinteractions_add->Createddt->EditValue ?>"<?php echo $pres_genericinteractions_add->Createddt->editAttributes() ?>>
<?php if (!$pres_genericinteractions_add->Createddt->ReadOnly && !$pres_genericinteractions_add->Createddt->Disabled && !isset($pres_genericinteractions_add->Createddt->EditAttrs["readonly"]) && !isset($pres_genericinteractions_add->Createddt->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpres_genericinteractionsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpres_genericinteractionsadd", "x_Createddt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pres_genericinteractions_add->Createddt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_genericinteractions_add->Createdtm->Visible) { // Createdtm ?>
	<div id="r_Createdtm" class="form-group row">
		<label id="elh_pres_genericinteractions_Createdtm" for="x_Createdtm" class="<?php echo $pres_genericinteractions_add->LeftColumnClass ?>"><?php echo $pres_genericinteractions_add->Createdtm->caption() ?><?php echo $pres_genericinteractions_add->Createdtm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_add->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_add->Createdtm->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Createdtm">
<input type="text" data-table="pres_genericinteractions" data-field="x_Createdtm" name="x_Createdtm" id="x_Createdtm" placeholder="<?php echo HtmlEncode($pres_genericinteractions_add->Createdtm->getPlaceHolder()) ?>" value="<?php echo $pres_genericinteractions_add->Createdtm->EditValue ?>"<?php echo $pres_genericinteractions_add->Createdtm->editAttributes() ?>>
<?php if (!$pres_genericinteractions_add->Createdtm->ReadOnly && !$pres_genericinteractions_add->Createdtm->Disabled && !isset($pres_genericinteractions_add->Createdtm->EditAttrs["readonly"]) && !isset($pres_genericinteractions_add->Createdtm->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpres_genericinteractionsadd", "timepicker"], function() {
	ew.createTimePicker("fpres_genericinteractionsadd", "x_Createdtm", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
<?php echo $pres_genericinteractions_add->Createdtm->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_genericinteractions_add->Statusbit->Visible) { // Statusbit ?>
	<div id="r_Statusbit" class="form-group row">
		<label id="elh_pres_genericinteractions_Statusbit" for="x_Statusbit" class="<?php echo $pres_genericinteractions_add->LeftColumnClass ?>"><?php echo $pres_genericinteractions_add->Statusbit->caption() ?><?php echo $pres_genericinteractions_add->Statusbit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_add->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_add->Statusbit->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Statusbit">
<input type="text" data-table="pres_genericinteractions" data-field="x_Statusbit" name="x_Statusbit" id="x_Statusbit" size="30" placeholder="<?php echo HtmlEncode($pres_genericinteractions_add->Statusbit->getPlaceHolder()) ?>" value="<?php echo $pres_genericinteractions_add->Statusbit->EditValue ?>"<?php echo $pres_genericinteractions_add->Statusbit->editAttributes() ?>>
</span>
<?php echo $pres_genericinteractions_add->Statusbit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_genericinteractions_add->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_pres_genericinteractions_Remarks" for="x_Remarks" class="<?php echo $pres_genericinteractions_add->LeftColumnClass ?>"><?php echo $pres_genericinteractions_add->Remarks->caption() ?><?php echo $pres_genericinteractions_add->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_add->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_add->Remarks->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Remarks">
<input type="text" data-table="pres_genericinteractions" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" placeholder="<?php echo HtmlEncode($pres_genericinteractions_add->Remarks->getPlaceHolder()) ?>" value="<?php echo $pres_genericinteractions_add->Remarks->EditValue ?>"<?php echo $pres_genericinteractions_add->Remarks->editAttributes() ?>>
</span>
<?php echo $pres_genericinteractions_add->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_genericinteractions_add->Username->Visible) { // Username ?>
	<div id="r_Username" class="form-group row">
		<label id="elh_pres_genericinteractions_Username" for="x_Username" class="<?php echo $pres_genericinteractions_add->LeftColumnClass ?>"><?php echo $pres_genericinteractions_add->Username->caption() ?><?php echo $pres_genericinteractions_add->Username->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_genericinteractions_add->RightColumnClass ?>"><div <?php echo $pres_genericinteractions_add->Username->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Username">
<input type="text" data-table="pres_genericinteractions" data-field="x_Username" name="x_Username" id="x_Username" placeholder="<?php echo HtmlEncode($pres_genericinteractions_add->Username->getPlaceHolder()) ?>" value="<?php echo $pres_genericinteractions_add->Username->EditValue ?>"<?php echo $pres_genericinteractions_add->Username->editAttributes() ?>>
</span>
<?php echo $pres_genericinteractions_add->Username->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_genericinteractions_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_genericinteractions_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_genericinteractions_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_genericinteractions_add->showPageFooter();
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
$pres_genericinteractions_add->terminate();
?>