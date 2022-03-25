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
$user_login_edit = new user_login_edit();

// Run the page
$user_login_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$user_login_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fuser_loginedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fuser_loginedit = currentForm = new ew.Form("fuser_loginedit", "edit");

	// Validate form
	fuser_loginedit.validate = function() {
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
			<?php if ($user_login_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_edit->id->caption(), $user_login_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_edit->User_Name->Required) { ?>
				elm = this.getElements("x" + infix + "_User_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_edit->User_Name->caption(), $user_login_edit->User_Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_edit->mail_id->Required) { ?>
				elm = this.getElements("x" + infix + "_mail_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_edit->mail_id->caption(), $user_login_edit->mail_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_edit->mobile_no->Required) { ?>
				elm = this.getElements("x" + infix + "_mobile_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_edit->mobile_no->caption(), $user_login_edit->mobile_no->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_edit->password->Required) { ?>
				elm = this.getElements("x" + infix + "_password");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_edit->password->caption(), $user_login_edit->password->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_edit->email_verified->Required) { ?>
				elm = this.getElements("x" + infix + "_email_verified");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_edit->email_verified->caption(), $user_login_edit->email_verified->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_edit->ReportTo->Required) { ?>
				elm = this.getElements("x" + infix + "_ReportTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_edit->ReportTo->caption(), $user_login_edit->ReportTo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_edit->_UserLevel->Required) { ?>
				elm = this.getElements("x" + infix + "__UserLevel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_edit->_UserLevel->caption(), $user_login_edit->_UserLevel->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_edit->CreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_edit->CreatedDateTime->caption(), $user_login_edit->CreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_edit->profilefield->Required) { ?>
				elm = this.getElements("x" + infix + "_profilefield");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_edit->profilefield->caption(), $user_login_edit->profilefield->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_edit->_UserID->Required) { ?>
				elm = this.getElements("x" + infix + "__UserID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_edit->_UserID->caption(), $user_login_edit->_UserID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__UserID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($user_login_edit->_UserID->errorMessage()) ?>");
			<?php if ($user_login_edit->GroupID->Required) { ?>
				elm = this.getElements("x" + infix + "_GroupID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_edit->GroupID->caption(), $user_login_edit->GroupID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_edit->HospID->caption(), $user_login_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_edit->PharID->Required) { ?>
				elm = this.getElements("x" + infix + "_PharID[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_edit->PharID->caption(), $user_login_edit->PharID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_edit->StoreID->Required) { ?>
				elm = this.getElements("x" + infix + "_StoreID[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_edit->StoreID->caption(), $user_login_edit->StoreID->RequiredErrorMessage)) ?>");
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
	fuser_loginedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fuser_loginedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fuser_loginedit.lists["x_User_Name"] = <?php echo $user_login_edit->User_Name->Lookup->toClientList($user_login_edit) ?>;
	fuser_loginedit.lists["x_User_Name"].options = <?php echo JsonEncode($user_login_edit->User_Name->lookupOptions()) ?>;
	fuser_loginedit.autoSuggests["x_User_Name"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fuser_loginedit.lists["x_email_verified"] = <?php echo $user_login_edit->email_verified->Lookup->toClientList($user_login_edit) ?>;
	fuser_loginedit.lists["x_email_verified"].options = <?php echo JsonEncode($user_login_edit->email_verified->options(FALSE, TRUE)) ?>;
	fuser_loginedit.lists["x__UserLevel"] = <?php echo $user_login_edit->_UserLevel->Lookup->toClientList($user_login_edit) ?>;
	fuser_loginedit.lists["x__UserLevel"].options = <?php echo JsonEncode($user_login_edit->_UserLevel->lookupOptions()) ?>;
	fuser_loginedit.lists["x_HospID"] = <?php echo $user_login_edit->HospID->Lookup->toClientList($user_login_edit) ?>;
	fuser_loginedit.lists["x_HospID"].options = <?php echo JsonEncode($user_login_edit->HospID->lookupOptions()) ?>;
	fuser_loginedit.lists["x_PharID[]"] = <?php echo $user_login_edit->PharID->Lookup->toClientList($user_login_edit) ?>;
	fuser_loginedit.lists["x_PharID[]"].options = <?php echo JsonEncode($user_login_edit->PharID->lookupOptions()) ?>;
	fuser_loginedit.lists["x_StoreID[]"] = <?php echo $user_login_edit->StoreID->Lookup->toClientList($user_login_edit) ?>;
	fuser_loginedit.lists["x_StoreID[]"].options = <?php echo JsonEncode($user_login_edit->StoreID->lookupOptions()) ?>;
	loadjs.done("fuser_loginedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $user_login_edit->showPageHeader(); ?>
<?php
$user_login_edit->showMessage();
?>
<form name="fuser_loginedit" id="fuser_loginedit" class="<?php echo $user_login_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="user_login">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$user_login_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($user_login_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_user_login_id" class="<?php echo $user_login_edit->LeftColumnClass ?>"><?php echo $user_login_edit->id->caption() ?><?php echo $user_login_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_edit->RightColumnClass ?>"><div <?php echo $user_login_edit->id->cellAttributes() ?>>
<span id="el_user_login_id">
<span<?php echo $user_login_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($user_login_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="user_login" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($user_login_edit->id->CurrentValue) ?>">
<?php echo $user_login_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_edit->User_Name->Visible) { // User_Name ?>
	<div id="r_User_Name" class="form-group row">
		<label id="elh_user_login_User_Name" class="<?php echo $user_login_edit->LeftColumnClass ?>"><?php echo $user_login_edit->User_Name->caption() ?><?php echo $user_login_edit->User_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_edit->RightColumnClass ?>"><div <?php echo $user_login_edit->User_Name->cellAttributes() ?>>
<span id="el_user_login_User_Name">
<?php
$onchange = $user_login_edit->User_Name->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$user_login_edit->User_Name->EditAttrs["onchange"] = "";
?>
<span id="as_x_User_Name">
	<input type="text" class="form-control" name="sv_x_User_Name" id="sv_x_User_Name" value="<?php echo RemoveHtml($user_login_edit->User_Name->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($user_login_edit->User_Name->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($user_login_edit->User_Name->getPlaceHolder()) ?>"<?php echo $user_login_edit->User_Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="user_login" data-field="x_User_Name" data-value-separator="<?php echo $user_login_edit->User_Name->displayValueSeparatorAttribute() ?>" name="x_User_Name" id="x_User_Name" value="<?php echo HtmlEncode($user_login_edit->User_Name->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fuser_loginedit"], function() {
	fuser_loginedit.createAutoSuggest({"id":"x_User_Name","forceSelect":false});
});
</script>
<?php echo $user_login_edit->User_Name->Lookup->getParamTag($user_login_edit, "p_x_User_Name") ?>
</span>
<?php echo $user_login_edit->User_Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_edit->mail_id->Visible) { // mail_id ?>
	<div id="r_mail_id" class="form-group row">
		<label id="elh_user_login_mail_id" for="x_mail_id" class="<?php echo $user_login_edit->LeftColumnClass ?>"><?php echo $user_login_edit->mail_id->caption() ?><?php echo $user_login_edit->mail_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_edit->RightColumnClass ?>"><div <?php echo $user_login_edit->mail_id->cellAttributes() ?>>
<span id="el_user_login_mail_id">
<input type="text" data-table="user_login" data-field="x_mail_id" name="x_mail_id" id="x_mail_id" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($user_login_edit->mail_id->getPlaceHolder()) ?>" value="<?php echo $user_login_edit->mail_id->EditValue ?>"<?php echo $user_login_edit->mail_id->editAttributes() ?>>
</span>
<?php echo $user_login_edit->mail_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_edit->mobile_no->Visible) { // mobile_no ?>
	<div id="r_mobile_no" class="form-group row">
		<label id="elh_user_login_mobile_no" for="x_mobile_no" class="<?php echo $user_login_edit->LeftColumnClass ?>"><?php echo $user_login_edit->mobile_no->caption() ?><?php echo $user_login_edit->mobile_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_edit->RightColumnClass ?>"><div <?php echo $user_login_edit->mobile_no->cellAttributes() ?>>
<span id="el_user_login_mobile_no">
<input type="text" data-table="user_login" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($user_login_edit->mobile_no->getPlaceHolder()) ?>" value="<?php echo $user_login_edit->mobile_no->EditValue ?>"<?php echo $user_login_edit->mobile_no->editAttributes() ?>>
</span>
<?php echo $user_login_edit->mobile_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_edit->password->Visible) { // password ?>
	<div id="r_password" class="form-group row">
		<label id="elh_user_login_password" for="x_password" class="<?php echo $user_login_edit->LeftColumnClass ?>"><?php echo $user_login_edit->password->caption() ?><?php echo $user_login_edit->password->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_edit->RightColumnClass ?>"><div <?php echo $user_login_edit->password->cellAttributes() ?>>
<span id="el_user_login_password">
<div class="input-group"><input type="password" name="x_password" id="x_password" autocomplete="new-password" data-field="x_password" value="<?php echo $user_login_edit->password->EditValue ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($user_login_edit->password->getPlaceHolder()) ?>"<?php echo $user_login_edit->password->editAttributes() ?>><div class="input-group-append"><button type="button" class="btn btn-default ew-toggle-password" onclick="ew.togglePassword(event);"><i class="fas fa-eye"></i></button></div></div>
</span>
<?php echo $user_login_edit->password->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_edit->email_verified->Visible) { // email_verified ?>
	<div id="r_email_verified" class="form-group row">
		<label id="elh_user_login_email_verified" for="x_email_verified" class="<?php echo $user_login_edit->LeftColumnClass ?>"><?php echo $user_login_edit->email_verified->caption() ?><?php echo $user_login_edit->email_verified->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_edit->RightColumnClass ?>"><div <?php echo $user_login_edit->email_verified->cellAttributes() ?>>
<span id="el_user_login_email_verified">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="user_login" data-field="x_email_verified" data-value-separator="<?php echo $user_login_edit->email_verified->displayValueSeparatorAttribute() ?>" id="x_email_verified" name="x_email_verified"<?php echo $user_login_edit->email_verified->editAttributes() ?>>
			<?php echo $user_login_edit->email_verified->selectOptionListHtml("x_email_verified") ?>
		</select>
</div>
</span>
<?php echo $user_login_edit->email_verified->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_edit->_UserLevel->Visible) { // UserLevel ?>
	<div id="r__UserLevel" class="form-group row">
		<label id="elh_user_login__UserLevel" for="x__UserLevel" class="<?php echo $user_login_edit->LeftColumnClass ?>"><?php echo $user_login_edit->_UserLevel->caption() ?><?php echo $user_login_edit->_UserLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_edit->RightColumnClass ?>"><div <?php echo $user_login_edit->_UserLevel->cellAttributes() ?>>
<?php if (!$Security->isAdmin() && $Security->isLoggedIn()) { // Non system admin ?>
<span id="el_user_login__UserLevel">
<input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($user_login_edit->_UserLevel->EditValue)) ?>">
</span>
<?php } else { ?>
<span id="el_user_login__UserLevel">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="user_login" data-field="x__UserLevel" data-value-separator="<?php echo $user_login_edit->_UserLevel->displayValueSeparatorAttribute() ?>" id="x__UserLevel" name="x__UserLevel"<?php echo $user_login_edit->_UserLevel->editAttributes() ?>>
			<?php echo $user_login_edit->_UserLevel->selectOptionListHtml("x__UserLevel") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "userlevels") && !$user_login_edit->_UserLevel->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x__UserLevel" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $user_login_edit->_UserLevel->caption() ?>" data-title="<?php echo $user_login_edit->_UserLevel->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x__UserLevel',url:'userlevelsaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $user_login_edit->_UserLevel->Lookup->getParamTag($user_login_edit, "p_x__UserLevel") ?>
</span>
<?php } ?>
<?php echo $user_login_edit->_UserLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_edit->_UserID->Visible) { // UserID ?>
	<div id="r__UserID" class="form-group row">
		<label id="elh_user_login__UserID" for="x__UserID" class="<?php echo $user_login_edit->LeftColumnClass ?>"><?php echo $user_login_edit->_UserID->caption() ?><?php echo $user_login_edit->_UserID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_edit->RightColumnClass ?>"><div <?php echo $user_login_edit->_UserID->cellAttributes() ?>>
<span id="el_user_login__UserID">
<input type="text" data-table="user_login" data-field="x__UserID" name="x__UserID" id="x__UserID" size="30" placeholder="<?php echo HtmlEncode($user_login_edit->_UserID->getPlaceHolder()) ?>" value="<?php echo $user_login_edit->_UserID->EditValue ?>"<?php echo $user_login_edit->_UserID->editAttributes() ?>>
</span>
<?php echo $user_login_edit->_UserID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_edit->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_user_login_HospID" for="x_HospID" class="<?php echo $user_login_edit->LeftColumnClass ?>"><?php echo $user_login_edit->HospID->caption() ?><?php echo $user_login_edit->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_edit->RightColumnClass ?>"><div <?php echo $user_login_edit->HospID->cellAttributes() ?>>
<span id="el_user_login_HospID">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="user_login" data-field="x_HospID" data-value-separator="<?php echo $user_login_edit->HospID->displayValueSeparatorAttribute() ?>" id="x_HospID" name="x_HospID"<?php echo $user_login_edit->HospID->editAttributes() ?>>
			<?php echo $user_login_edit->HospID->selectOptionListHtml("x_HospID") ?>
		</select>
</div>
<?php echo $user_login_edit->HospID->Lookup->getParamTag($user_login_edit, "p_x_HospID") ?>
</span>
<?php echo $user_login_edit->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_edit->PharID->Visible) { // PharID ?>
	<div id="r_PharID" class="form-group row">
		<label id="elh_user_login_PharID" class="<?php echo $user_login_edit->LeftColumnClass ?>"><?php echo $user_login_edit->PharID->caption() ?><?php echo $user_login_edit->PharID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_edit->RightColumnClass ?>"><div <?php echo $user_login_edit->PharID->cellAttributes() ?>>
<span id="el_user_login_PharID">
<div id="tp_x_PharID" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="user_login" data-field="x_PharID" data-value-separator="<?php echo $user_login_edit->PharID->displayValueSeparatorAttribute() ?>" name="x_PharID[]" id="x_PharID[]" value="{value}"<?php echo $user_login_edit->PharID->editAttributes() ?>></div>
<div id="dsl_x_PharID" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $user_login_edit->PharID->checkBoxListHtml(FALSE, "x_PharID[]") ?>
</div></div>
<?php echo $user_login_edit->PharID->Lookup->getParamTag($user_login_edit, "p_x_PharID") ?>
</span>
<?php echo $user_login_edit->PharID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_edit->StoreID->Visible) { // StoreID ?>
	<div id="r_StoreID" class="form-group row">
		<label id="elh_user_login_StoreID" class="<?php echo $user_login_edit->LeftColumnClass ?>"><?php echo $user_login_edit->StoreID->caption() ?><?php echo $user_login_edit->StoreID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_edit->RightColumnClass ?>"><div <?php echo $user_login_edit->StoreID->cellAttributes() ?>>
<span id="el_user_login_StoreID">
<div id="tp_x_StoreID" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="user_login" data-field="x_StoreID" data-value-separator="<?php echo $user_login_edit->StoreID->displayValueSeparatorAttribute() ?>" name="x_StoreID[]" id="x_StoreID[]" value="{value}"<?php echo $user_login_edit->StoreID->editAttributes() ?>></div>
<div id="dsl_x_StoreID" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $user_login_edit->StoreID->checkBoxListHtml(FALSE, "x_StoreID[]") ?>
</div></div>
<?php echo $user_login_edit->StoreID->Lookup->getParamTag($user_login_edit, "p_x_StoreID") ?>
</span>
<?php echo $user_login_edit->StoreID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$user_login_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $user_login_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $user_login_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$user_login_edit->showPageFooter();
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
$user_login_edit->terminate();
?>