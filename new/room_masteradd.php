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
$room_master_add = new room_master_add();

// Run the page
$room_master_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$room_master_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var froom_masteradd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	froom_masteradd = currentForm = new ew.Form("froom_masteradd", "add");

	// Validate form
	froom_masteradd.validate = function() {
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
			<?php if ($room_master_add->RoomNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RoomNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $room_master_add->RoomNo->caption(), $room_master_add->RoomNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($room_master_add->RoomType->Required) { ?>
				elm = this.getElements("x" + infix + "_RoomType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $room_master_add->RoomType->caption(), $room_master_add->RoomType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($room_master_add->SharingRoom->Required) { ?>
				elm = this.getElements("x" + infix + "_SharingRoom");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $room_master_add->SharingRoom->caption(), $room_master_add->SharingRoom->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($room_master_add->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $room_master_add->Amount->caption(), $room_master_add->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($room_master_add->Amount->errorMessage()) ?>");
			<?php if ($room_master_add->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $room_master_add->Status->caption(), $room_master_add->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($room_master_add->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $room_master_add->PatientID->caption(), $room_master_add->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($room_master_add->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $room_master_add->PatientName->caption(), $room_master_add->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($room_master_add->MobileNo->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $room_master_add->MobileNo->caption(), $room_master_add->MobileNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($room_master_add->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $room_master_add->PatID->caption(), $room_master_add->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($room_master_add->PatID->errorMessage()) ?>");

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
	froom_masteradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	froom_masteradd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	froom_masteradd.lists["x_RoomType"] = <?php echo $room_master_add->RoomType->Lookup->toClientList($room_master_add) ?>;
	froom_masteradd.lists["x_RoomType"].options = <?php echo JsonEncode($room_master_add->RoomType->lookupOptions()) ?>;
	froom_masteradd.lists["x_SharingRoom"] = <?php echo $room_master_add->SharingRoom->Lookup->toClientList($room_master_add) ?>;
	froom_masteradd.lists["x_SharingRoom"].options = <?php echo JsonEncode($room_master_add->SharingRoom->options(FALSE, TRUE)) ?>;
	froom_masteradd.lists["x_Status"] = <?php echo $room_master_add->Status->Lookup->toClientList($room_master_add) ?>;
	froom_masteradd.lists["x_Status"].options = <?php echo JsonEncode($room_master_add->Status->options(FALSE, TRUE)) ?>;
	loadjs.done("froom_masteradd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $room_master_add->showPageHeader(); ?>
<?php
$room_master_add->showMessage();
?>
<form name="froom_masteradd" id="froom_masteradd" class="<?php echo $room_master_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="room_master">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$room_master_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($room_master_add->RoomNo->Visible) { // RoomNo ?>
	<div id="r_RoomNo" class="form-group row">
		<label id="elh_room_master_RoomNo" for="x_RoomNo" class="<?php echo $room_master_add->LeftColumnClass ?>"><?php echo $room_master_add->RoomNo->caption() ?><?php echo $room_master_add->RoomNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $room_master_add->RightColumnClass ?>"><div <?php echo $room_master_add->RoomNo->cellAttributes() ?>>
<span id="el_room_master_RoomNo">
<input type="text" data-table="room_master" data-field="x_RoomNo" name="x_RoomNo" id="x_RoomNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($room_master_add->RoomNo->getPlaceHolder()) ?>" value="<?php echo $room_master_add->RoomNo->EditValue ?>"<?php echo $room_master_add->RoomNo->editAttributes() ?>>
</span>
<?php echo $room_master_add->RoomNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($room_master_add->RoomType->Visible) { // RoomType ?>
	<div id="r_RoomType" class="form-group row">
		<label id="elh_room_master_RoomType" for="x_RoomType" class="<?php echo $room_master_add->LeftColumnClass ?>"><?php echo $room_master_add->RoomType->caption() ?><?php echo $room_master_add->RoomType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $room_master_add->RightColumnClass ?>"><div <?php echo $room_master_add->RoomType->cellAttributes() ?>>
<span id="el_room_master_RoomType">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RoomType"><?php echo EmptyValue(strval($room_master_add->RoomType->ViewValue)) ? $Language->phrase("PleaseSelect") : $room_master_add->RoomType->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($room_master_add->RoomType->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($room_master_add->RoomType->ReadOnly || $room_master_add->RoomType->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RoomType',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $room_master_add->RoomType->Lookup->getParamTag($room_master_add, "p_x_RoomType") ?>
<input type="hidden" data-table="room_master" data-field="x_RoomType" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $room_master_add->RoomType->displayValueSeparatorAttribute() ?>" name="x_RoomType" id="x_RoomType" value="<?php echo $room_master_add->RoomType->CurrentValue ?>"<?php echo $room_master_add->RoomType->editAttributes() ?>>
</span>
<?php echo $room_master_add->RoomType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($room_master_add->SharingRoom->Visible) { // SharingRoom ?>
	<div id="r_SharingRoom" class="form-group row">
		<label id="elh_room_master_SharingRoom" class="<?php echo $room_master_add->LeftColumnClass ?>"><?php echo $room_master_add->SharingRoom->caption() ?><?php echo $room_master_add->SharingRoom->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $room_master_add->RightColumnClass ?>"><div <?php echo $room_master_add->SharingRoom->cellAttributes() ?>>
<span id="el_room_master_SharingRoom">
<div id="tp_x_SharingRoom" class="ew-template"><input type="radio" class="custom-control-input" data-table="room_master" data-field="x_SharingRoom" data-value-separator="<?php echo $room_master_add->SharingRoom->displayValueSeparatorAttribute() ?>" name="x_SharingRoom" id="x_SharingRoom" value="{value}"<?php echo $room_master_add->SharingRoom->editAttributes() ?>></div>
<div id="dsl_x_SharingRoom" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $room_master_add->SharingRoom->radioButtonListHtml(FALSE, "x_SharingRoom") ?>
</div></div>
</span>
<?php echo $room_master_add->SharingRoom->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($room_master_add->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_room_master_Amount" for="x_Amount" class="<?php echo $room_master_add->LeftColumnClass ?>"><?php echo $room_master_add->Amount->caption() ?><?php echo $room_master_add->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $room_master_add->RightColumnClass ?>"><div <?php echo $room_master_add->Amount->cellAttributes() ?>>
<span id="el_room_master_Amount">
<input type="text" data-table="room_master" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($room_master_add->Amount->getPlaceHolder()) ?>" value="<?php echo $room_master_add->Amount->EditValue ?>"<?php echo $room_master_add->Amount->editAttributes() ?>>
</span>
<?php echo $room_master_add->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($room_master_add->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_room_master_Status" class="<?php echo $room_master_add->LeftColumnClass ?>"><?php echo $room_master_add->Status->caption() ?><?php echo $room_master_add->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $room_master_add->RightColumnClass ?>"><div <?php echo $room_master_add->Status->cellAttributes() ?>>
<span id="el_room_master_Status">
<div id="tp_x_Status" class="ew-template"><input type="radio" class="custom-control-input" data-table="room_master" data-field="x_Status" data-value-separator="<?php echo $room_master_add->Status->displayValueSeparatorAttribute() ?>" name="x_Status" id="x_Status" value="{value}"<?php echo $room_master_add->Status->editAttributes() ?>></div>
<div id="dsl_x_Status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $room_master_add->Status->radioButtonListHtml(FALSE, "x_Status") ?>
</div></div>
</span>
<?php echo $room_master_add->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($room_master_add->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_room_master_PatientID" for="x_PatientID" class="<?php echo $room_master_add->LeftColumnClass ?>"><?php echo $room_master_add->PatientID->caption() ?><?php echo $room_master_add->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $room_master_add->RightColumnClass ?>"><div <?php echo $room_master_add->PatientID->cellAttributes() ?>>
<span id="el_room_master_PatientID">
<input type="text" data-table="room_master" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($room_master_add->PatientID->getPlaceHolder()) ?>" value="<?php echo $room_master_add->PatientID->EditValue ?>"<?php echo $room_master_add->PatientID->editAttributes() ?>>
</span>
<?php echo $room_master_add->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($room_master_add->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_room_master_PatientName" for="x_PatientName" class="<?php echo $room_master_add->LeftColumnClass ?>"><?php echo $room_master_add->PatientName->caption() ?><?php echo $room_master_add->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $room_master_add->RightColumnClass ?>"><div <?php echo $room_master_add->PatientName->cellAttributes() ?>>
<span id="el_room_master_PatientName">
<input type="text" data-table="room_master" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($room_master_add->PatientName->getPlaceHolder()) ?>" value="<?php echo $room_master_add->PatientName->EditValue ?>"<?php echo $room_master_add->PatientName->editAttributes() ?>>
</span>
<?php echo $room_master_add->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($room_master_add->MobileNo->Visible) { // MobileNo ?>
	<div id="r_MobileNo" class="form-group row">
		<label id="elh_room_master_MobileNo" for="x_MobileNo" class="<?php echo $room_master_add->LeftColumnClass ?>"><?php echo $room_master_add->MobileNo->caption() ?><?php echo $room_master_add->MobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $room_master_add->RightColumnClass ?>"><div <?php echo $room_master_add->MobileNo->cellAttributes() ?>>
<span id="el_room_master_MobileNo">
<input type="text" data-table="room_master" data-field="x_MobileNo" name="x_MobileNo" id="x_MobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($room_master_add->MobileNo->getPlaceHolder()) ?>" value="<?php echo $room_master_add->MobileNo->EditValue ?>"<?php echo $room_master_add->MobileNo->editAttributes() ?>>
</span>
<?php echo $room_master_add->MobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($room_master_add->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_room_master_PatID" for="x_PatID" class="<?php echo $room_master_add->LeftColumnClass ?>"><?php echo $room_master_add->PatID->caption() ?><?php echo $room_master_add->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $room_master_add->RightColumnClass ?>"><div <?php echo $room_master_add->PatID->cellAttributes() ?>>
<span id="el_room_master_PatID">
<input type="text" data-table="room_master" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?php echo HtmlEncode($room_master_add->PatID->getPlaceHolder()) ?>" value="<?php echo $room_master_add->PatID->EditValue ?>"<?php echo $room_master_add->PatID->editAttributes() ?>>
</span>
<?php echo $room_master_add->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$room_master_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $room_master_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $room_master_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$room_master_add->showPageFooter();
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
$room_master_add->terminate();
?>