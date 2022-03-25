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
$user_login_add = new user_login_add();

// Run the page
$user_login_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$user_login_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fuser_loginadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fuser_loginadd = currentForm = new ew.Form("fuser_loginadd", "add");

	// Validate form
	fuser_loginadd.validate = function() {
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
			<?php if ($user_login_add->User_Name->Required) { ?>
				elm = this.getElements("x" + infix + "_User_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_add->User_Name->caption(), $user_login_add->User_Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_add->mail_id->Required) { ?>
				elm = this.getElements("x" + infix + "_mail_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_add->mail_id->caption(), $user_login_add->mail_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_add->mobile_no->Required) { ?>
				elm = this.getElements("x" + infix + "_mobile_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_add->mobile_no->caption(), $user_login_add->mobile_no->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_add->password->Required) { ?>
				elm = this.getElements("x" + infix + "_password");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_add->password->caption(), $user_login_add->password->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_add->email_verified->Required) { ?>
				elm = this.getElements("x" + infix + "_email_verified");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_add->email_verified->caption(), $user_login_add->email_verified->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_add->ReportTo->Required) { ?>
				elm = this.getElements("x" + infix + "_ReportTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_add->ReportTo->caption(), $user_login_add->ReportTo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_add->_UserLevel->Required) { ?>
				elm = this.getElements("x" + infix + "__UserLevel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_add->_UserLevel->caption(), $user_login_add->_UserLevel->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_add->CreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_add->CreatedDateTime->caption(), $user_login_add->CreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_add->profilefield->Required) { ?>
				elm = this.getElements("x" + infix + "_profilefield");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_add->profilefield->caption(), $user_login_add->profilefield->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_add->_UserID->Required) { ?>
				elm = this.getElements("x" + infix + "__UserID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_add->_UserID->caption(), $user_login_add->_UserID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "__UserID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($user_login_add->_UserID->errorMessage()) ?>");
			<?php if ($user_login_add->GroupID->Required) { ?>
				elm = this.getElements("x" + infix + "_GroupID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_add->GroupID->caption(), $user_login_add->GroupID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_add->HospID->caption(), $user_login_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_add->PharID->Required) { ?>
				elm = this.getElements("x" + infix + "_PharID[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_add->PharID->caption(), $user_login_add->PharID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($user_login_add->StoreID->Required) { ?>
				elm = this.getElements("x" + infix + "_StoreID[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $user_login_add->StoreID->caption(), $user_login_add->StoreID->RequiredErrorMessage)) ?>");
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
	fuser_loginadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fuser_loginadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fuser_loginadd.lists["x_User_Name"] = <?php echo $user_login_add->User_Name->Lookup->toClientList($user_login_add) ?>;
	fuser_loginadd.lists["x_User_Name"].options = <?php echo JsonEncode($user_login_add->User_Name->lookupOptions()) ?>;
	fuser_loginadd.autoSuggests["x_User_Name"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fuser_loginadd.lists["x_email_verified"] = <?php echo $user_login_add->email_verified->Lookup->toClientList($user_login_add) ?>;
	fuser_loginadd.lists["x_email_verified"].options = <?php echo JsonEncode($user_login_add->email_verified->options(FALSE, TRUE)) ?>;
	fuser_loginadd.lists["x__UserLevel"] = <?php echo $user_login_add->_UserLevel->Lookup->toClientList($user_login_add) ?>;
	fuser_loginadd.lists["x__UserLevel"].options = <?php echo JsonEncode($user_login_add->_UserLevel->lookupOptions()) ?>;
	fuser_loginadd.lists["x_HospID"] = <?php echo $user_login_add->HospID->Lookup->toClientList($user_login_add) ?>;
	fuser_loginadd.lists["x_HospID"].options = <?php echo JsonEncode($user_login_add->HospID->lookupOptions()) ?>;
	fuser_loginadd.lists["x_PharID[]"] = <?php echo $user_login_add->PharID->Lookup->toClientList($user_login_add) ?>;
	fuser_loginadd.lists["x_PharID[]"].options = <?php echo JsonEncode($user_login_add->PharID->lookupOptions()) ?>;
	fuser_loginadd.lists["x_StoreID[]"] = <?php echo $user_login_add->StoreID->Lookup->toClientList($user_login_add) ?>;
	fuser_loginadd.lists["x_StoreID[]"].options = <?php echo JsonEncode($user_login_add->StoreID->lookupOptions()) ?>;
	loadjs.done("fuser_loginadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $user_login_add->showPageHeader(); ?>
<?php
$user_login_add->showMessage();
?>
<form name="fuser_loginadd" id="fuser_loginadd" class="<?php echo $user_login_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="user_login">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$user_login_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($user_login_add->User_Name->Visible) { // User_Name ?>
	<div id="r_User_Name" class="form-group row">
		<label id="elh_user_login_User_Name" class="<?php echo $user_login_add->LeftColumnClass ?>"><?php echo $user_login_add->User_Name->caption() ?><?php echo $user_login_add->User_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_add->RightColumnClass ?>"><div <?php echo $user_login_add->User_Name->cellAttributes() ?>>
<span id="el_user_login_User_Name">
<?php
$onchange = $user_login_add->User_Name->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$user_login_add->User_Name->EditAttrs["onchange"] = "";
?>
<span id="as_x_User_Name">
	<input type="text" class="form-control" name="sv_x_User_Name" id="sv_x_User_Name" value="<?php echo RemoveHtml($user_login_add->User_Name->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($user_login_add->User_Name->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($user_login_add->User_Name->getPlaceHolder()) ?>"<?php echo $user_login_add->User_Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="user_login" data-field="x_User_Name" data-value-separator="<?php echo $user_login_add->User_Name->displayValueSeparatorAttribute() ?>" name="x_User_Name" id="x_User_Name" value="<?php echo HtmlEncode($user_login_add->User_Name->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fuser_loginadd"], function() {
	fuser_loginadd.createAutoSuggest({"id":"x_User_Name","forceSelect":false});
});
</script>
<?php echo $user_login_add->User_Name->Lookup->getParamTag($user_login_add, "p_x_User_Name") ?>
</span>
<?php echo $user_login_add->User_Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_add->mail_id->Visible) { // mail_id ?>
	<div id="r_mail_id" class="form-group row">
		<label id="elh_user_login_mail_id" for="x_mail_id" class="<?php echo $user_login_add->LeftColumnClass ?>"><?php echo $user_login_add->mail_id->caption() ?><?php echo $user_login_add->mail_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_add->RightColumnClass ?>"><div <?php echo $user_login_add->mail_id->cellAttributes() ?>>
<span id="el_user_login_mail_id">
<input type="text" data-table="user_login" data-field="x_mail_id" name="x_mail_id" id="x_mail_id" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($user_login_add->mail_id->getPlaceHolder()) ?>" value="<?php echo $user_login_add->mail_id->EditValue ?>"<?php echo $user_login_add->mail_id->editAttributes() ?>>
</span>
<?php echo $user_login_add->mail_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_add->mobile_no->Visible) { // mobile_no ?>
	<div id="r_mobile_no" class="form-group row">
		<label id="elh_user_login_mobile_no" for="x_mobile_no" class="<?php echo $user_login_add->LeftColumnClass ?>"><?php echo $user_login_add->mobile_no->caption() ?><?php echo $user_login_add->mobile_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_add->RightColumnClass ?>"><div <?php echo $user_login_add->mobile_no->cellAttributes() ?>>
<span id="el_user_login_mobile_no">
<input type="text" data-table="user_login" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($user_login_add->mobile_no->getPlaceHolder()) ?>" value="<?php echo $user_login_add->mobile_no->EditValue ?>"<?php echo $user_login_add->mobile_no->editAttributes() ?>>
</span>
<?php echo $user_login_add->mobile_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_add->password->Visible) { // password ?>
	<div id="r_password" class="form-group row">
		<label id="elh_user_login_password" for="x_password" class="<?php echo $user_login_add->LeftColumnClass ?>"><?php echo $user_login_add->password->caption() ?><?php echo $user_login_add->password->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_add->RightColumnClass ?>"><div <?php echo $user_login_add->password->cellAttributes() ?>>
<span id="el_user_login_password">
<div class="input-group"><input type="password" name="x_password" id="x_password" autocomplete="new-password" data-field="x_password" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($user_login_add->password->getPlaceHolder()) ?>"<?php echo $user_login_add->password->editAttributes() ?>><div class="input-group-append"><button type="button" class="btn btn-default ew-toggle-password" onclick="ew.togglePassword(event);"><i class="fas fa-eye"></i></button></div></div>
</span>
<?php echo $user_login_add->password->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_add->email_verified->Visible) { // email_verified ?>
	<div id="r_email_verified" class="form-group row">
		<label id="elh_user_login_email_verified" for="x_email_verified" class="<?php echo $user_login_add->LeftColumnClass ?>"><?php echo $user_login_add->email_verified->caption() ?><?php echo $user_login_add->email_verified->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_add->RightColumnClass ?>"><div <?php echo $user_login_add->email_verified->cellAttributes() ?>>
<span id="el_user_login_email_verified">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="user_login" data-field="x_email_verified" data-value-separator="<?php echo $user_login_add->email_verified->displayValueSeparatorAttribute() ?>" id="x_email_verified" name="x_email_verified"<?php echo $user_login_add->email_verified->editAttributes() ?>>
			<?php echo $user_login_add->email_verified->selectOptionListHtml("x_email_verified") ?>
		</select>
</div>
</span>
<?php echo $user_login_add->email_verified->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_add->_UserLevel->Visible) { // UserLevel ?>
	<div id="r__UserLevel" class="form-group row">
		<label id="elh_user_login__UserLevel" for="x__UserLevel" class="<?php echo $user_login_add->LeftColumnClass ?>"><?php echo $user_login_add->_UserLevel->caption() ?><?php echo $user_login_add->_UserLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_add->RightColumnClass ?>"><div <?php echo $user_login_add->_UserLevel->cellAttributes() ?>>
<?php if (!$Security->isAdmin() && $Security->isLoggedIn()) { // Non system admin ?>
<span id="el_user_login__UserLevel">
<input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($user_login_add->_UserLevel->EditValue)) ?>">
</span>
<?php } else { ?>
<span id="el_user_login__UserLevel">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="user_login" data-field="x__UserLevel" data-value-separator="<?php echo $user_login_add->_UserLevel->displayValueSeparatorAttribute() ?>" id="x__UserLevel" name="x__UserLevel"<?php echo $user_login_add->_UserLevel->editAttributes() ?>>
			<?php echo $user_login_add->_UserLevel->selectOptionListHtml("x__UserLevel") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "userlevels") && !$user_login_add->_UserLevel->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x__UserLevel" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $user_login_add->_UserLevel->caption() ?>" data-title="<?php echo $user_login_add->_UserLevel->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x__UserLevel',url:'userlevelsaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $user_login_add->_UserLevel->Lookup->getParamTag($user_login_add, "p_x__UserLevel") ?>
</span>
<?php } ?>
<?php echo $user_login_add->_UserLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_add->_UserID->Visible) { // UserID ?>
	<div id="r__UserID" class="form-group row">
		<label id="elh_user_login__UserID" for="x__UserID" class="<?php echo $user_login_add->LeftColumnClass ?>"><?php echo $user_login_add->_UserID->caption() ?><?php echo $user_login_add->_UserID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_add->RightColumnClass ?>"><div <?php echo $user_login_add->_UserID->cellAttributes() ?>>
<span id="el_user_login__UserID">
<input type="text" data-table="user_login" data-field="x__UserID" name="x__UserID" id="x__UserID" size="30" placeholder="<?php echo HtmlEncode($user_login_add->_UserID->getPlaceHolder()) ?>" value="<?php echo $user_login_add->_UserID->EditValue ?>"<?php echo $user_login_add->_UserID->editAttributes() ?>>
</span>
<?php echo $user_login_add->_UserID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_add->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_user_login_HospID" for="x_HospID" class="<?php echo $user_login_add->LeftColumnClass ?>"><?php echo $user_login_add->HospID->caption() ?><?php echo $user_login_add->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_add->RightColumnClass ?>"><div <?php echo $user_login_add->HospID->cellAttributes() ?>>
<span id="el_user_login_HospID">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="user_login" data-field="x_HospID" data-value-separator="<?php echo $user_login_add->HospID->displayValueSeparatorAttribute() ?>" id="x_HospID" name="x_HospID"<?php echo $user_login_add->HospID->editAttributes() ?>>
			<?php echo $user_login_add->HospID->selectOptionListHtml("x_HospID") ?>
		</select>
</div>
<?php echo $user_login_add->HospID->Lookup->getParamTag($user_login_add, "p_x_HospID") ?>
</span>
<?php echo $user_login_add->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_add->PharID->Visible) { // PharID ?>
	<div id="r_PharID" class="form-group row">
		<label id="elh_user_login_PharID" class="<?php echo $user_login_add->LeftColumnClass ?>"><?php echo $user_login_add->PharID->caption() ?><?php echo $user_login_add->PharID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_add->RightColumnClass ?>"><div <?php echo $user_login_add->PharID->cellAttributes() ?>>
<span id="el_user_login_PharID">
<div id="tp_x_PharID" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="user_login" data-field="x_PharID" data-value-separator="<?php echo $user_login_add->PharID->displayValueSeparatorAttribute() ?>" name="x_PharID[]" id="x_PharID[]" value="{value}"<?php echo $user_login_add->PharID->editAttributes() ?>></div>
<div id="dsl_x_PharID" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $user_login_add->PharID->checkBoxListHtml(FALSE, "x_PharID[]") ?>
</div></div>
<?php echo $user_login_add->PharID->Lookup->getParamTag($user_login_add, "p_x_PharID") ?>
</span>
<?php echo $user_login_add->PharID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($user_login_add->StoreID->Visible) { // StoreID ?>
	<div id="r_StoreID" class="form-group row">
		<label id="elh_user_login_StoreID" class="<?php echo $user_login_add->LeftColumnClass ?>"><?php echo $user_login_add->StoreID->caption() ?><?php echo $user_login_add->StoreID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $user_login_add->RightColumnClass ?>"><div <?php echo $user_login_add->StoreID->cellAttributes() ?>>
<span id="el_user_login_StoreID">
<div id="tp_x_StoreID" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="user_login" data-field="x_StoreID" data-value-separator="<?php echo $user_login_add->StoreID->displayValueSeparatorAttribute() ?>" name="x_StoreID[]" id="x_StoreID[]" value="{value}"<?php echo $user_login_add->StoreID->editAttributes() ?>></div>
<div id="dsl_x_StoreID" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $user_login_add->StoreID->checkBoxListHtml(FALSE, "x_StoreID[]") ?>
</div></div>
<?php echo $user_login_add->StoreID->Lookup->getParamTag($user_login_add, "p_x_StoreID") ?>
</span>
<?php echo $user_login_add->StoreID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$user_login_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $user_login_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $user_login_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$user_login_add->showPageFooter();
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
$user_login_add->terminate();
?>