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
$userlevels_delete = new userlevels_delete();

// Run the page
$userlevels_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$userlevels_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fuserlevelsdelete = currentForm = new ew.Form("fuserlevelsdelete", "delete");

// Form_CustomValidate event
fuserlevelsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fuserlevelsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $userlevels_delete->showPageHeader(); ?>
<?php
$userlevels_delete->showMessage();
?>
<form name="fuserlevelsdelete" id="fuserlevelsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($userlevels_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $userlevels_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="userlevels">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($userlevels_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($userlevels->id->Visible) { // id ?>
		<th class="<?php echo $userlevels->id->headerCellClass() ?>"><span id="elh_userlevels_id" class="userlevels_id"><?php echo $userlevels->id->caption() ?></span></th>
<?php } ?>
<?php if ($userlevels->UserLevelsName->Visible) { // UserLevelsName ?>
		<th class="<?php echo $userlevels->UserLevelsName->headerCellClass() ?>"><span id="elh_userlevels_UserLevelsName" class="userlevels_UserLevelsName"><?php echo $userlevels->UserLevelsName->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$userlevels_delete->RecCnt = 0;
$i = 0;
while (!$userlevels_delete->Recordset->EOF) {
	$userlevels_delete->RecCnt++;
	$userlevels_delete->RowCnt++;

	// Set row properties
	$userlevels->resetAttributes();
	$userlevels->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$userlevels_delete->loadRowValues($userlevels_delete->Recordset);

	// Render row
	$userlevels_delete->renderRow();
?>
	<tr<?php echo $userlevels->rowAttributes() ?>>
<?php if ($userlevels->id->Visible) { // id ?>
		<td<?php echo $userlevels->id->cellAttributes() ?>>
<span id="el<?php echo $userlevels_delete->RowCnt ?>_userlevels_id" class="userlevels_id">
<span<?php echo $userlevels->id->viewAttributes() ?>>
<?php echo $userlevels->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($userlevels->UserLevelsName->Visible) { // UserLevelsName ?>
		<td<?php echo $userlevels->UserLevelsName->cellAttributes() ?>>
<span id="el<?php echo $userlevels_delete->RowCnt ?>_userlevels_UserLevelsName" class="userlevels_UserLevelsName">
<span<?php echo $userlevels->UserLevelsName->viewAttributes() ?>>
<?php echo $userlevels->UserLevelsName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$userlevels_delete->Recordset->moveNext();
}
$userlevels_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $userlevels_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$userlevels_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$userlevels_delete->terminate();
?>