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
$view_iui_excel_search = new view_iui_excel_search();

// Run the page
$view_iui_excel_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_iui_excel_search->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($view_iui_excel_search->IsModal) { ?>
var fview_iui_excelsearch = currentAdvancedSearchForm = new ew.Form("fview_iui_excelsearch", "search");
<?php } else { ?>
var fview_iui_excelsearch = currentForm = new ew.Form("fview_iui_excelsearch", "search");
<?php } ?>

// Form_CustomValidate event
fview_iui_excelsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_iui_excelsearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search
// Validate function for search

fview_iui_excelsearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_LMP");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_iui_excel->LMP->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_TRIGGERDATE");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_iui_excel->TRIGGERDATE->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_DONOR___I_D");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_iui_excel->DONOR___I_D->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PREG_TEST_DATE");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_iui_excel->PREG_TEST_DATE->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_EDD_Date");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_iui_excel->EDD_Date->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_iui_excel_search->showPageHeader(); ?>
<?php
$view_iui_excel_search->showMessage();
?>
<form name="fview_iui_excelsearch" id="fview_iui_excelsearch" class="<?php echo $view_iui_excel_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_iui_excel_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_iui_excel_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_iui_excel">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_iui_excel_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_iui_excel->NAME->Visible) { // NAME ?>
	<div id="r_NAME" class="form-group row">
		<label for="x_NAME" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_NAME"><?php echo $view_iui_excel->NAME->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_NAME" id="z_NAME" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->NAME->cellAttributes() ?>>
			<span id="el_view_iui_excel_NAME">
<input type="text" data-table="view_iui_excel" data-field="x_NAME" name="x_NAME" id="x_NAME" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_iui_excel->NAME->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->NAME->EditValue ?>"<?php echo $view_iui_excel->NAME->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->HUSBAND_NAME->Visible) { // HUSBAND NAME ?>
	<div id="r_HUSBAND_NAME" class="form-group row">
		<label for="x_HUSBAND_NAME" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_HUSBAND_NAME"><?php echo $view_iui_excel->HUSBAND_NAME->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HUSBAND_NAME" id="z_HUSBAND_NAME" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->HUSBAND_NAME->cellAttributes() ?>>
			<span id="el_view_iui_excel_HUSBAND_NAME">
<input type="text" data-table="view_iui_excel" data-field="x_HUSBAND_NAME" name="x_HUSBAND_NAME" id="x_HUSBAND_NAME" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_iui_excel->HUSBAND_NAME->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->HUSBAND_NAME->EditValue ?>"<?php echo $view_iui_excel->HUSBAND_NAME->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->CoupleID->Visible) { // CoupleID ?>
	<div id="r_CoupleID" class="form-group row">
		<label for="x_CoupleID" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_CoupleID"><?php echo $view_iui_excel->CoupleID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CoupleID" id="z_CoupleID" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->CoupleID->cellAttributes() ?>>
			<span id="el_view_iui_excel_CoupleID">
<input type="text" data-table="view_iui_excel" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->CoupleID->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->CoupleID->EditValue ?>"<?php echo $view_iui_excel->CoupleID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->AGE____WIFE->Visible) { // AGE  - WIFE ?>
	<div id="r_AGE____WIFE" class="form-group row">
		<label for="x_AGE____WIFE" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_AGE____WIFE"><?php echo $view_iui_excel->AGE____WIFE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_AGE____WIFE" id="z_AGE____WIFE" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->AGE____WIFE->cellAttributes() ?>>
			<span id="el_view_iui_excel_AGE____WIFE">
<input type="text" data-table="view_iui_excel" data-field="x_AGE____WIFE" name="x_AGE____WIFE" id="x_AGE____WIFE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->AGE____WIFE->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->AGE____WIFE->EditValue ?>"<?php echo $view_iui_excel->AGE____WIFE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->AGE__HUSBAND->Visible) { // AGE- HUSBAND ?>
	<div id="r_AGE__HUSBAND" class="form-group row">
		<label for="x_AGE__HUSBAND" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_AGE__HUSBAND"><?php echo $view_iui_excel->AGE__HUSBAND->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_AGE__HUSBAND" id="z_AGE__HUSBAND" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->AGE__HUSBAND->cellAttributes() ?>>
			<span id="el_view_iui_excel_AGE__HUSBAND">
<input type="text" data-table="view_iui_excel" data-field="x_AGE__HUSBAND" name="x_AGE__HUSBAND" id="x_AGE__HUSBAND" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->AGE__HUSBAND->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->AGE__HUSBAND->EditValue ?>"<?php echo $view_iui_excel->AGE__HUSBAND->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR->Visible) { // ANXIOUS TO CONCEIVE FOR ?>
	<div id="r_ANXIOUS_TO_CONCEIVE_FOR" class="form-group row">
		<label for="x_ANXIOUS_TO_CONCEIVE_FOR" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_ANXIOUS_TO_CONCEIVE_FOR"><?php echo $view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ANXIOUS_TO_CONCEIVE_FOR" id="z_ANXIOUS_TO_CONCEIVE_FOR" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR->cellAttributes() ?>>
			<span id="el_view_iui_excel_ANXIOUS_TO_CONCEIVE_FOR">
<input type="text" data-table="view_iui_excel" data-field="x_ANXIOUS_TO_CONCEIVE_FOR" name="x_ANXIOUS_TO_CONCEIVE_FOR" id="x_ANXIOUS_TO_CONCEIVE_FOR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR->EditValue ?>"<?php echo $view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->AMH_28_NG2FML29->Visible) { // AMH ( NG/ML) ?>
	<div id="r_AMH_28_NG2FML29" class="form-group row">
		<label for="x_AMH_28_NG2FML29" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_AMH_28_NG2FML29"><?php echo $view_iui_excel->AMH_28_NG2FML29->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_AMH_28_NG2FML29" id="z_AMH_28_NG2FML29" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->AMH_28_NG2FML29->cellAttributes() ?>>
			<span id="el_view_iui_excel_AMH_28_NG2FML29">
<input type="text" data-table="view_iui_excel" data-field="x_AMH_28_NG2FML29" name="x_AMH_28_NG2FML29" id="x_AMH_28_NG2FML29" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->AMH_28_NG2FML29->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->AMH_28_NG2FML29->EditValue ?>"<?php echo $view_iui_excel->AMH_28_NG2FML29->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
	<div id="r_TUBAL_PATENCY" class="form-group row">
		<label for="x_TUBAL_PATENCY" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_TUBAL_PATENCY"><?php echo $view_iui_excel->TUBAL_PATENCY->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TUBAL_PATENCY" id="z_TUBAL_PATENCY" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->TUBAL_PATENCY->cellAttributes() ?>>
			<span id="el_view_iui_excel_TUBAL_PATENCY">
<input type="text" data-table="view_iui_excel" data-field="x_TUBAL_PATENCY" name="x_TUBAL_PATENCY" id="x_TUBAL_PATENCY" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->TUBAL_PATENCY->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->TUBAL_PATENCY->EditValue ?>"<?php echo $view_iui_excel->TUBAL_PATENCY->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->HSG->Visible) { // HSG ?>
	<div id="r_HSG" class="form-group row">
		<label for="x_HSG" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_HSG"><?php echo $view_iui_excel->HSG->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HSG" id="z_HSG" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->HSG->cellAttributes() ?>>
			<span id="el_view_iui_excel_HSG">
<input type="text" data-table="view_iui_excel" data-field="x_HSG" name="x_HSG" id="x_HSG" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->HSG->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->HSG->EditValue ?>"<?php echo $view_iui_excel->HSG->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->DHL->Visible) { // DHL ?>
	<div id="r_DHL" class="form-group row">
		<label for="x_DHL" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_DHL"><?php echo $view_iui_excel->DHL->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DHL" id="z_DHL" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->DHL->cellAttributes() ?>>
			<span id="el_view_iui_excel_DHL">
<input type="text" data-table="view_iui_excel" data-field="x_DHL" name="x_DHL" id="x_DHL" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->DHL->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->DHL->EditValue ?>"<?php echo $view_iui_excel->DHL->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
	<div id="r_UTERINE_PROBLEMS" class="form-group row">
		<label for="x_UTERINE_PROBLEMS" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_UTERINE_PROBLEMS"><?php echo $view_iui_excel->UTERINE_PROBLEMS->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_UTERINE_PROBLEMS" id="z_UTERINE_PROBLEMS" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->UTERINE_PROBLEMS->cellAttributes() ?>>
			<span id="el_view_iui_excel_UTERINE_PROBLEMS">
<input type="text" data-table="view_iui_excel" data-field="x_UTERINE_PROBLEMS" name="x_UTERINE_PROBLEMS" id="x_UTERINE_PROBLEMS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->UTERINE_PROBLEMS->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->UTERINE_PROBLEMS->EditValue ?>"<?php echo $view_iui_excel->UTERINE_PROBLEMS->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
	<div id="r_W_COMORBIDS" class="form-group row">
		<label for="x_W_COMORBIDS" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_W_COMORBIDS"><?php echo $view_iui_excel->W_COMORBIDS->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_W_COMORBIDS" id="z_W_COMORBIDS" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->W_COMORBIDS->cellAttributes() ?>>
			<span id="el_view_iui_excel_W_COMORBIDS">
<input type="text" data-table="view_iui_excel" data-field="x_W_COMORBIDS" name="x_W_COMORBIDS" id="x_W_COMORBIDS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->W_COMORBIDS->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->W_COMORBIDS->EditValue ?>"<?php echo $view_iui_excel->W_COMORBIDS->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
	<div id="r_H_COMORBIDS" class="form-group row">
		<label for="x_H_COMORBIDS" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_H_COMORBIDS"><?php echo $view_iui_excel->H_COMORBIDS->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_H_COMORBIDS" id="z_H_COMORBIDS" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->H_COMORBIDS->cellAttributes() ?>>
			<span id="el_view_iui_excel_H_COMORBIDS">
<input type="text" data-table="view_iui_excel" data-field="x_H_COMORBIDS" name="x_H_COMORBIDS" id="x_H_COMORBIDS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->H_COMORBIDS->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->H_COMORBIDS->EditValue ?>"<?php echo $view_iui_excel->H_COMORBIDS->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
	<div id="r_SEXUAL_DYSFUNCTION" class="form-group row">
		<label for="x_SEXUAL_DYSFUNCTION" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_SEXUAL_DYSFUNCTION"><?php echo $view_iui_excel->SEXUAL_DYSFUNCTION->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SEXUAL_DYSFUNCTION" id="z_SEXUAL_DYSFUNCTION" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
			<span id="el_view_iui_excel_SEXUAL_DYSFUNCTION">
<input type="text" data-table="view_iui_excel" data-field="x_SEXUAL_DYSFUNCTION" name="x_SEXUAL_DYSFUNCTION" id="x_SEXUAL_DYSFUNCTION" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->SEXUAL_DYSFUNCTION->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->SEXUAL_DYSFUNCTION->EditValue ?>"<?php echo $view_iui_excel->SEXUAL_DYSFUNCTION->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->PREV_IUI->Visible) { // PREV IUI ?>
	<div id="r_PREV_IUI" class="form-group row">
		<label for="x_PREV_IUI" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_PREV_IUI"><?php echo $view_iui_excel->PREV_IUI->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PREV_IUI" id="z_PREV_IUI" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->PREV_IUI->cellAttributes() ?>>
			<span id="el_view_iui_excel_PREV_IUI">
<input type="text" data-table="view_iui_excel" data-field="x_PREV_IUI" name="x_PREV_IUI" id="x_PREV_IUI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->PREV_IUI->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->PREV_IUI->EditValue ?>"<?php echo $view_iui_excel->PREV_IUI->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->PREV_IVF->Visible) { // PREV_IVF ?>
	<div id="r_PREV_IVF" class="form-group row">
		<label for="x_PREV_IVF" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_PREV_IVF"><?php echo $view_iui_excel->PREV_IVF->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PREV_IVF" id="z_PREV_IVF" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->PREV_IVF->cellAttributes() ?>>
			<span id="el_view_iui_excel_PREV_IVF">
<input type="text" data-table="view_iui_excel" data-field="x_PREV_IVF" name="x_PREV_IVF" id="x_PREV_IVF" size="35" placeholder="<?php echo HtmlEncode($view_iui_excel->PREV_IVF->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->PREV_IVF->EditValue ?>"<?php echo $view_iui_excel->PREV_IVF->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->TABLETS->Visible) { // TABLETS ?>
	<div id="r_TABLETS" class="form-group row">
		<label for="x_TABLETS" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_TABLETS"><?php echo $view_iui_excel->TABLETS->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TABLETS" id="z_TABLETS" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->TABLETS->cellAttributes() ?>>
			<span id="el_view_iui_excel_TABLETS">
<input type="text" data-table="view_iui_excel" data-field="x_TABLETS" name="x_TABLETS" id="x_TABLETS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->TABLETS->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->TABLETS->EditValue ?>"<?php echo $view_iui_excel->TABLETS->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->INJTYPE->Visible) { // INJTYPE ?>
	<div id="r_INJTYPE" class="form-group row">
		<label for="x_INJTYPE" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_INJTYPE"><?php echo $view_iui_excel->INJTYPE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_INJTYPE" id="z_INJTYPE" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->INJTYPE->cellAttributes() ?>>
			<span id="el_view_iui_excel_INJTYPE">
<input type="text" data-table="view_iui_excel" data-field="x_INJTYPE" name="x_INJTYPE" id="x_INJTYPE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->INJTYPE->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->INJTYPE->EditValue ?>"<?php echo $view_iui_excel->INJTYPE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->LMP->Visible) { // LMP ?>
	<div id="r_LMP" class="form-group row">
		<label for="x_LMP" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_LMP"><?php echo $view_iui_excel->LMP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_LMP" id="z_LMP" value="="></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->LMP->cellAttributes() ?>>
			<span id="el_view_iui_excel_LMP">
<input type="text" data-table="view_iui_excel" data-field="x_LMP" name="x_LMP" id="x_LMP" placeholder="<?php echo HtmlEncode($view_iui_excel->LMP->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->LMP->EditValue ?>"<?php echo $view_iui_excel->LMP->editAttributes() ?>>
<?php if (!$view_iui_excel->LMP->ReadOnly && !$view_iui_excel->LMP->Disabled && !isset($view_iui_excel->LMP->EditAttrs["readonly"]) && !isset($view_iui_excel->LMP->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_iui_excelsearch", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->TRIGGERR->Visible) { // TRIGGERR ?>
	<div id="r_TRIGGERR" class="form-group row">
		<label for="x_TRIGGERR" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_TRIGGERR"><?php echo $view_iui_excel->TRIGGERR->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TRIGGERR" id="z_TRIGGERR" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->TRIGGERR->cellAttributes() ?>>
			<span id="el_view_iui_excel_TRIGGERR">
<input type="text" data-table="view_iui_excel" data-field="x_TRIGGERR" name="x_TRIGGERR" id="x_TRIGGERR" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($view_iui_excel->TRIGGERR->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->TRIGGERR->EditValue ?>"<?php echo $view_iui_excel->TRIGGERR->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
	<div id="r_TRIGGERDATE" class="form-group row">
		<label for="x_TRIGGERDATE" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_TRIGGERDATE"><?php echo $view_iui_excel->TRIGGERDATE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_TRIGGERDATE" id="z_TRIGGERDATE" value="="></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->TRIGGERDATE->cellAttributes() ?>>
			<span id="el_view_iui_excel_TRIGGERDATE">
<input type="text" data-table="view_iui_excel" data-field="x_TRIGGERDATE" name="x_TRIGGERDATE" id="x_TRIGGERDATE" placeholder="<?php echo HtmlEncode($view_iui_excel->TRIGGERDATE->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->TRIGGERDATE->EditValue ?>"<?php echo $view_iui_excel->TRIGGERDATE->editAttributes() ?>>
<?php if (!$view_iui_excel->TRIGGERDATE->ReadOnly && !$view_iui_excel->TRIGGERDATE->Disabled && !isset($view_iui_excel->TRIGGERDATE->EditAttrs["readonly"]) && !isset($view_iui_excel->TRIGGERDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_iui_excelsearch", "x_TRIGGERDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
	<div id="r_FOLLICLE_STATUS" class="form-group row">
		<label for="x_FOLLICLE_STATUS" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_FOLLICLE_STATUS"><?php echo $view_iui_excel->FOLLICLE_STATUS->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_FOLLICLE_STATUS" id="z_FOLLICLE_STATUS" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->FOLLICLE_STATUS->cellAttributes() ?>>
			<span id="el_view_iui_excel_FOLLICLE_STATUS">
<input type="text" data-table="view_iui_excel" data-field="x_FOLLICLE_STATUS" name="x_FOLLICLE_STATUS" id="x_FOLLICLE_STATUS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->FOLLICLE_STATUS->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->FOLLICLE_STATUS->EditValue ?>"<?php echo $view_iui_excel->FOLLICLE_STATUS->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
	<div id="r_NUMBER_OF_IUI" class="form-group row">
		<label for="x_NUMBER_OF_IUI" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_NUMBER_OF_IUI"><?php echo $view_iui_excel->NUMBER_OF_IUI->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_NUMBER_OF_IUI" id="z_NUMBER_OF_IUI" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->NUMBER_OF_IUI->cellAttributes() ?>>
			<span id="el_view_iui_excel_NUMBER_OF_IUI">
<input type="text" data-table="view_iui_excel" data-field="x_NUMBER_OF_IUI" name="x_NUMBER_OF_IUI" id="x_NUMBER_OF_IUI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->NUMBER_OF_IUI->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->NUMBER_OF_IUI->EditValue ?>"<?php echo $view_iui_excel->NUMBER_OF_IUI->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->PROCEDURE->Visible) { // PROCEDURE ?>
	<div id="r_PROCEDURE" class="form-group row">
		<label for="x_PROCEDURE" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_PROCEDURE"><?php echo $view_iui_excel->PROCEDURE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PROCEDURE" id="z_PROCEDURE" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->PROCEDURE->cellAttributes() ?>>
			<span id="el_view_iui_excel_PROCEDURE">
<input type="text" data-table="view_iui_excel" data-field="x_PROCEDURE" name="x_PROCEDURE" id="x_PROCEDURE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->PROCEDURE->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->PROCEDURE->EditValue ?>"<?php echo $view_iui_excel->PROCEDURE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
	<div id="r_LUTEAL_SUPPORT" class="form-group row">
		<label for="x_LUTEAL_SUPPORT" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_LUTEAL_SUPPORT"><?php echo $view_iui_excel->LUTEAL_SUPPORT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_LUTEAL_SUPPORT" id="z_LUTEAL_SUPPORT" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->LUTEAL_SUPPORT->cellAttributes() ?>>
			<span id="el_view_iui_excel_LUTEAL_SUPPORT">
<input type="text" data-table="view_iui_excel" data-field="x_LUTEAL_SUPPORT" name="x_LUTEAL_SUPPORT" id="x_LUTEAL_SUPPORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->LUTEAL_SUPPORT->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->LUTEAL_SUPPORT->EditValue ?>"<?php echo $view_iui_excel->LUTEAL_SUPPORT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->H2FD_SAMPLE->Visible) { // H/D SAMPLE ?>
	<div id="r_H2FD_SAMPLE" class="form-group row">
		<label for="x_H2FD_SAMPLE" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_H2FD_SAMPLE"><?php echo $view_iui_excel->H2FD_SAMPLE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_H2FD_SAMPLE" id="z_H2FD_SAMPLE" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->H2FD_SAMPLE->cellAttributes() ?>>
			<span id="el_view_iui_excel_H2FD_SAMPLE">
<input type="text" data-table="view_iui_excel" data-field="x_H2FD_SAMPLE" name="x_H2FD_SAMPLE" id="x_H2FD_SAMPLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->H2FD_SAMPLE->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->H2FD_SAMPLE->EditValue ?>"<?php echo $view_iui_excel->H2FD_SAMPLE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->DONOR___I_D->Visible) { // DONOR - I.D ?>
	<div id="r_DONOR___I_D" class="form-group row">
		<label for="x_DONOR___I_D" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_DONOR___I_D"><?php echo $view_iui_excel->DONOR___I_D->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DONOR___I_D" id="z_DONOR___I_D" value="="></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->DONOR___I_D->cellAttributes() ?>>
			<span id="el_view_iui_excel_DONOR___I_D">
<input type="text" data-table="view_iui_excel" data-field="x_DONOR___I_D" name="x_DONOR___I_D" id="x_DONOR___I_D" size="30" placeholder="<?php echo HtmlEncode($view_iui_excel->DONOR___I_D->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->DONOR___I_D->EditValue ?>"<?php echo $view_iui_excel->DONOR___I_D->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<div id="r_PREG_TEST_DATE" class="form-group row">
		<label for="x_PREG_TEST_DATE" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_PREG_TEST_DATE"><?php echo $view_iui_excel->PREG_TEST_DATE->caption() ?></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->PREG_TEST_DATE->cellAttributes() ?>>
		<span class="ew-search-operator"><select name="z_PREG_TEST_DATE" id="z_PREG_TEST_DATE" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_iui_excel->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_iui_excel->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_iui_excel->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_iui_excel->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_iui_excel->PREG_TEST_DATE->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_iui_excel->PREG_TEST_DATE->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_iui_excel->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_iui_excel->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_iui_excel->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
			<span id="el_view_iui_excel_PREG_TEST_DATE">
<input type="text" data-table="view_iui_excel" data-field="x_PREG_TEST_DATE" data-format="7" name="x_PREG_TEST_DATE" id="x_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($view_iui_excel->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->PREG_TEST_DATE->EditValue ?>"<?php echo $view_iui_excel->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$view_iui_excel->PREG_TEST_DATE->ReadOnly && !$view_iui_excel->PREG_TEST_DATE->Disabled && !isset($view_iui_excel->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($view_iui_excel->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_iui_excelsearch", "x_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
			<span class="ew-search-cond btw1_PREG_TEST_DATE d-none"><label><?php echo $Language->Phrase("AND") ?></label></span>
			<span id="e2_view_iui_excel_PREG_TEST_DATE" class="btw1_PREG_TEST_DATE d-none">
<input type="text" data-table="view_iui_excel" data-field="x_PREG_TEST_DATE" data-format="7" name="y_PREG_TEST_DATE" id="y_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($view_iui_excel->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->PREG_TEST_DATE->EditValue2 ?>"<?php echo $view_iui_excel->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$view_iui_excel->PREG_TEST_DATE->ReadOnly && !$view_iui_excel->PREG_TEST_DATE->Disabled && !isset($view_iui_excel->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($view_iui_excel->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_iui_excelsearch", "y_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->COLLECTION__METHOD->Visible) { // COLLECTION  METHOD ?>
	<div id="r_COLLECTION__METHOD" class="form-group row">
		<label for="x_COLLECTION__METHOD" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_COLLECTION__METHOD"><?php echo $view_iui_excel->COLLECTION__METHOD->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_COLLECTION__METHOD" id="z_COLLECTION__METHOD" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->COLLECTION__METHOD->cellAttributes() ?>>
			<span id="el_view_iui_excel_COLLECTION__METHOD">
<input type="text" data-table="view_iui_excel" data-field="x_COLLECTION__METHOD" name="x_COLLECTION__METHOD" id="x_COLLECTION__METHOD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->COLLECTION__METHOD->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->COLLECTION__METHOD->EditValue ?>"<?php echo $view_iui_excel->COLLECTION__METHOD->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->SAMPLE_SOURCE->Visible) { // SAMPLE SOURCE ?>
	<div id="r_SAMPLE_SOURCE" class="form-group row">
		<label for="x_SAMPLE_SOURCE" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_SAMPLE_SOURCE"><?php echo $view_iui_excel->SAMPLE_SOURCE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SAMPLE_SOURCE" id="z_SAMPLE_SOURCE" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->SAMPLE_SOURCE->cellAttributes() ?>>
			<span id="el_view_iui_excel_SAMPLE_SOURCE">
<input type="text" data-table="view_iui_excel" data-field="x_SAMPLE_SOURCE" name="x_SAMPLE_SOURCE" id="x_SAMPLE_SOURCE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->SAMPLE_SOURCE->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->SAMPLE_SOURCE->EditValue ?>"<?php echo $view_iui_excel->SAMPLE_SOURCE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
	<div id="r_SPECIFIC_PROBLEMS" class="form-group row">
		<label for="x_SPECIFIC_PROBLEMS" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_SPECIFIC_PROBLEMS"><?php echo $view_iui_excel->SPECIFIC_PROBLEMS->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SPECIFIC_PROBLEMS" id="z_SPECIFIC_PROBLEMS" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->SPECIFIC_PROBLEMS->cellAttributes() ?>>
			<span id="el_view_iui_excel_SPECIFIC_PROBLEMS">
<input type="text" data-table="view_iui_excel" data-field="x_SPECIFIC_PROBLEMS" name="x_SPECIFIC_PROBLEMS" id="x_SPECIFIC_PROBLEMS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->SPECIFIC_PROBLEMS->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->SPECIFIC_PROBLEMS->EditValue ?>"<?php echo $view_iui_excel->SPECIFIC_PROBLEMS->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->IMSC_1->Visible) { // IMSC_1 ?>
	<div id="r_IMSC_1" class="form-group row">
		<label for="x_IMSC_1" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_IMSC_1"><?php echo $view_iui_excel->IMSC_1->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IMSC_1" id="z_IMSC_1" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->IMSC_1->cellAttributes() ?>>
			<span id="el_view_iui_excel_IMSC_1">
<input type="text" data-table="view_iui_excel" data-field="x_IMSC_1" name="x_IMSC_1" id="x_IMSC_1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->IMSC_1->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->IMSC_1->EditValue ?>"<?php echo $view_iui_excel->IMSC_1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->IMSC_2->Visible) { // IMSC_2 ?>
	<div id="r_IMSC_2" class="form-group row">
		<label for="x_IMSC_2" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_IMSC_2"><?php echo $view_iui_excel->IMSC_2->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IMSC_2" id="z_IMSC_2" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->IMSC_2->cellAttributes() ?>>
			<span id="el_view_iui_excel_IMSC_2">
<input type="text" data-table="view_iui_excel" data-field="x_IMSC_2" name="x_IMSC_2" id="x_IMSC_2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->IMSC_2->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->IMSC_2->EditValue ?>"<?php echo $view_iui_excel->IMSC_2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
	<div id="r_LIQUIFACTION_STORAGE" class="form-group row">
		<label for="x_LIQUIFACTION_STORAGE" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_LIQUIFACTION_STORAGE"><?php echo $view_iui_excel->LIQUIFACTION_STORAGE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_LIQUIFACTION_STORAGE" id="z_LIQUIFACTION_STORAGE" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->LIQUIFACTION_STORAGE->cellAttributes() ?>>
			<span id="el_view_iui_excel_LIQUIFACTION_STORAGE">
<input type="text" data-table="view_iui_excel" data-field="x_LIQUIFACTION_STORAGE" name="x_LIQUIFACTION_STORAGE" id="x_LIQUIFACTION_STORAGE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->LIQUIFACTION_STORAGE->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->LIQUIFACTION_STORAGE->EditValue ?>"<?php echo $view_iui_excel->LIQUIFACTION_STORAGE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
	<div id="r_IUI_PREP_METHOD" class="form-group row">
		<label for="x_IUI_PREP_METHOD" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_IUI_PREP_METHOD"><?php echo $view_iui_excel->IUI_PREP_METHOD->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IUI_PREP_METHOD" id="z_IUI_PREP_METHOD" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->IUI_PREP_METHOD->cellAttributes() ?>>
			<span id="el_view_iui_excel_IUI_PREP_METHOD">
<input type="text" data-table="view_iui_excel" data-field="x_IUI_PREP_METHOD" name="x_IUI_PREP_METHOD" id="x_IUI_PREP_METHOD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->IUI_PREP_METHOD->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->IUI_PREP_METHOD->EditValue ?>"<?php echo $view_iui_excel->IUI_PREP_METHOD->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
	<div id="r_TIME_FROM_TRIGGER" class="form-group row">
		<label for="x_TIME_FROM_TRIGGER" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_TIME_FROM_TRIGGER"><?php echo $view_iui_excel->TIME_FROM_TRIGGER->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TIME_FROM_TRIGGER" id="z_TIME_FROM_TRIGGER" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->TIME_FROM_TRIGGER->cellAttributes() ?>>
			<span id="el_view_iui_excel_TIME_FROM_TRIGGER">
<input type="text" data-table="view_iui_excel" data-field="x_TIME_FROM_TRIGGER" name="x_TIME_FROM_TRIGGER" id="x_TIME_FROM_TRIGGER" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->TIME_FROM_TRIGGER->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->TIME_FROM_TRIGGER->EditValue ?>"<?php echo $view_iui_excel->TIME_FROM_TRIGGER->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
	<div id="r_COLLECTION_TO_PREPARATION" class="form-group row">
		<label for="x_COLLECTION_TO_PREPARATION" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_COLLECTION_TO_PREPARATION"><?php echo $view_iui_excel->COLLECTION_TO_PREPARATION->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_COLLECTION_TO_PREPARATION" id="z_COLLECTION_TO_PREPARATION" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
			<span id="el_view_iui_excel_COLLECTION_TO_PREPARATION">
<input type="text" data-table="view_iui_excel" data-field="x_COLLECTION_TO_PREPARATION" name="x_COLLECTION_TO_PREPARATION" id="x_COLLECTION_TO_PREPARATION" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->COLLECTION_TO_PREPARATION->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->COLLECTION_TO_PREPARATION->EditValue ?>"<?php echo $view_iui_excel->COLLECTION_TO_PREPARATION->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
	<div id="r_TIME_FROM_PREP_TO_INSEM" class="form-group row">
		<label for="x_TIME_FROM_PREP_TO_INSEM" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_TIME_FROM_PREP_TO_INSEM"><?php echo $view_iui_excel->TIME_FROM_PREP_TO_INSEM->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TIME_FROM_PREP_TO_INSEM" id="z_TIME_FROM_PREP_TO_INSEM" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
			<span id="el_view_iui_excel_TIME_FROM_PREP_TO_INSEM">
<input type="text" data-table="view_iui_excel" data-field="x_TIME_FROM_PREP_TO_INSEM" name="x_TIME_FROM_PREP_TO_INSEM" id="x_TIME_FROM_PREP_TO_INSEM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->TIME_FROM_PREP_TO_INSEM->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->TIME_FROM_PREP_TO_INSEM->EditValue ?>"<?php echo $view_iui_excel->TIME_FROM_PREP_TO_INSEM->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
	<div id="r_SPECIFIC_MATERNAL_PROBLEMS" class="form-group row">
		<label for="x_SPECIFIC_MATERNAL_PROBLEMS" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_SPECIFIC_MATERNAL_PROBLEMS"><?php echo $view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SPECIFIC_MATERNAL_PROBLEMS" id="z_SPECIFIC_MATERNAL_PROBLEMS" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
			<span id="el_view_iui_excel_SPECIFIC_MATERNAL_PROBLEMS">
<input type="text" data-table="view_iui_excel" data-field="x_SPECIFIC_MATERNAL_PROBLEMS" name="x_SPECIFIC_MATERNAL_PROBLEMS" id="x_SPECIFIC_MATERNAL_PROBLEMS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS->EditValue ?>"<?php echo $view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->RESULTS->Visible) { // RESULTS ?>
	<div id="r_RESULTS" class="form-group row">
		<label for="x_RESULTS" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_RESULTS"><?php echo $view_iui_excel->RESULTS->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RESULTS" id="z_RESULTS" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->RESULTS->cellAttributes() ?>>
			<span id="el_view_iui_excel_RESULTS">
<input type="text" data-table="view_iui_excel" data-field="x_RESULTS" name="x_RESULTS" id="x_RESULTS" size="35" placeholder="<?php echo HtmlEncode($view_iui_excel->RESULTS->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->RESULTS->EditValue ?>"<?php echo $view_iui_excel->RESULTS->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
	<div id="r_ONGOING_PREG" class="form-group row">
		<label for="x_ONGOING_PREG" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_ONGOING_PREG"><?php echo $view_iui_excel->ONGOING_PREG->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ONGOING_PREG" id="z_ONGOING_PREG" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->ONGOING_PREG->cellAttributes() ?>>
			<span id="el_view_iui_excel_ONGOING_PREG">
<input type="text" data-table="view_iui_excel" data-field="x_ONGOING_PREG" name="x_ONGOING_PREG" id="x_ONGOING_PREG" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->ONGOING_PREG->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->ONGOING_PREG->EditValue ?>"<?php echo $view_iui_excel->ONGOING_PREG->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_iui_excel->EDD_Date->Visible) { // EDD_Date ?>
	<div id="r_EDD_Date" class="form-group row">
		<label for="x_EDD_Date" class="<?php echo $view_iui_excel_search->LeftColumnClass ?>"><span id="elh_view_iui_excel_EDD_Date"><?php echo $view_iui_excel->EDD_Date->caption() ?></span>
		</label>
		<div class="<?php echo $view_iui_excel_search->RightColumnClass ?>"><div<?php echo $view_iui_excel->EDD_Date->cellAttributes() ?>>
		<span class="ew-search-operator"><select name="z_EDD_Date" id="z_EDD_Date" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_iui_excel->EDD_Date->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_iui_excel->EDD_Date->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_iui_excel->EDD_Date->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_iui_excel->EDD_Date->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_iui_excel->EDD_Date->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_iui_excel->EDD_Date->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_iui_excel->EDD_Date->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_iui_excel->EDD_Date->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_iui_excel->EDD_Date->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
			<span id="el_view_iui_excel_EDD_Date">
<input type="text" data-table="view_iui_excel" data-field="x_EDD_Date" name="x_EDD_Date" id="x_EDD_Date" placeholder="<?php echo HtmlEncode($view_iui_excel->EDD_Date->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->EDD_Date->EditValue ?>"<?php echo $view_iui_excel->EDD_Date->editAttributes() ?>>
<?php if (!$view_iui_excel->EDD_Date->ReadOnly && !$view_iui_excel->EDD_Date->Disabled && !isset($view_iui_excel->EDD_Date->EditAttrs["readonly"]) && !isset($view_iui_excel->EDD_Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_iui_excelsearch", "x_EDD_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
			<span class="ew-search-cond btw1_EDD_Date d-none"><label><?php echo $Language->Phrase("AND") ?></label></span>
			<span id="e2_view_iui_excel_EDD_Date" class="btw1_EDD_Date d-none">
<input type="text" data-table="view_iui_excel" data-field="x_EDD_Date" name="y_EDD_Date" id="y_EDD_Date" placeholder="<?php echo HtmlEncode($view_iui_excel->EDD_Date->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->EDD_Date->EditValue2 ?>"<?php echo $view_iui_excel->EDD_Date->editAttributes() ?>>
<?php if (!$view_iui_excel->EDD_Date->ReadOnly && !$view_iui_excel->EDD_Date->Disabled && !isset($view_iui_excel->EDD_Date->EditAttrs["readonly"]) && !isset($view_iui_excel->EDD_Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_iui_excelsearch", "y_EDD_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_iui_excel_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_iui_excel_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_iui_excel_search->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_iui_excel_search->terminate();
?>