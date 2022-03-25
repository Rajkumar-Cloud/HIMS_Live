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
$mas_typeofregsistration_add = new mas_typeofregsistration_add();

// Run the page
$mas_typeofregsistration_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_typeofregsistration_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_typeofregsistrationadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmas_typeofregsistrationadd = currentForm = new ew.Form("fmas_typeofregsistrationadd", "add");

	// Validate form
	fmas_typeofregsistrationadd.validate = function() {
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
			<?php if ($mas_typeofregsistration_add->RegsistrationType->Required) { ?>
				elm = this.getElements("x" + infix + "_RegsistrationType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_typeofregsistration_add->RegsistrationType->caption(), $mas_typeofregsistration_add->RegsistrationType->RequiredErrorMessage)) ?>");
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
	fmas_typeofregsistrationadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_typeofregsistrationadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmas_typeofregsistrationadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_typeofregsistration_add->showPageHeader(); ?>
<?php
$mas_typeofregsistration_add->showMessage();
?>
<form name="fmas_typeofregsistrationadd" id="fmas_typeofregsistrationadd" class="<?php echo $mas_typeofregsistration_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_typeofregsistration">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$mas_typeofregsistration_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($mas_typeofregsistration_add->RegsistrationType->Visible) { // RegsistrationType ?>
	<div id="r_RegsistrationType" class="form-group row">
		<label id="elh_mas_typeofregsistration_RegsistrationType" for="x_RegsistrationType" class="<?php echo $mas_typeofregsistration_add->LeftColumnClass ?>"><?php echo $mas_typeofregsistration_add->RegsistrationType->caption() ?><?php echo $mas_typeofregsistration_add->RegsistrationType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_typeofregsistration_add->RightColumnClass ?>"><div <?php echo $mas_typeofregsistration_add->RegsistrationType->cellAttributes() ?>>
<span id="el_mas_typeofregsistration_RegsistrationType">
<input type="text" data-table="mas_typeofregsistration" data-field="x_RegsistrationType" name="x_RegsistrationType" id="x_RegsistrationType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_typeofregsistration_add->RegsistrationType->getPlaceHolder()) ?>" value="<?php echo $mas_typeofregsistration_add->RegsistrationType->EditValue ?>"<?php echo $mas_typeofregsistration_add->RegsistrationType->editAttributes() ?>>
</span>
<?php echo $mas_typeofregsistration_add->RegsistrationType->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_typeofregsistration_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_typeofregsistration_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_typeofregsistration_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_typeofregsistration_add->showPageFooter();
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
$mas_typeofregsistration_add->terminate();
?>