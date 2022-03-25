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
$room_types_edit = new room_types_edit();

// Run the page
$room_types_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$room_types_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var froom_typesedit = currentForm = new ew.Form("froom_typesedit", "edit");

// Validate form
froom_typesedit.validate = function() {
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
		<?php if ($room_types_edit->Id->Required) { ?>
			elm = this.getElements("x" + infix + "_Id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $room_types->Id->caption(), $room_types->Id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($room_types_edit->Types->Required) { ?>
			elm = this.getElements("x" + infix + "_Types");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $room_types->Types->caption(), $room_types->Types->RequiredErrorMessage)) ?>");
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
froom_typesedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
froom_typesedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $room_types_edit->showPageHeader(); ?>
<?php
$room_types_edit->showMessage();
?>
<form name="froom_typesedit" id="froom_typesedit" class="<?php echo $room_types_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($room_types_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $room_types_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="room_types">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$room_types_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($room_types->Id->Visible) { // Id ?>
	<div id="r_Id" class="form-group row">
		<label id="elh_room_types_Id" class="<?php echo $room_types_edit->LeftColumnClass ?>"><?php echo $room_types->Id->caption() ?><?php echo ($room_types->Id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $room_types_edit->RightColumnClass ?>"><div<?php echo $room_types->Id->cellAttributes() ?>>
<span id="el_room_types_Id">
<span<?php echo $room_types->Id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($room_types->Id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="room_types" data-field="x_Id" name="x_Id" id="x_Id" value="<?php echo HtmlEncode($room_types->Id->CurrentValue) ?>">
<?php echo $room_types->Id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($room_types->Types->Visible) { // Types ?>
	<div id="r_Types" class="form-group row">
		<label id="elh_room_types_Types" for="x_Types" class="<?php echo $room_types_edit->LeftColumnClass ?>"><?php echo $room_types->Types->caption() ?><?php echo ($room_types->Types->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $room_types_edit->RightColumnClass ?>"><div<?php echo $room_types->Types->cellAttributes() ?>>
<span id="el_room_types_Types">
<input type="text" data-table="room_types" data-field="x_Types" name="x_Types" id="x_Types" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($room_types->Types->getPlaceHolder()) ?>" value="<?php echo $room_types->Types->EditValue ?>"<?php echo $room_types->Types->editAttributes() ?>>
</span>
<?php echo $room_types->Types->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$room_types_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $room_types_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $room_types_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$room_types_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$room_types_edit->terminate();
?>