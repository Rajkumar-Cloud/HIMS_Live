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
$pres_tradenames_new_delete = new pres_tradenames_new_delete();

// Run the page
$pres_tradenames_new_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_tradenames_new_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpres_tradenames_newdelete = currentForm = new ew.Form("fpres_tradenames_newdelete", "delete");

// Form_CustomValidate event
fpres_tradenames_newdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_tradenames_newdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpres_tradenames_newdelete.lists["x_Generic_Name"] = <?php echo $pres_tradenames_new_delete->Generic_Name->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_Generic_Name"].options = <?php echo JsonEncode($pres_tradenames_new_delete->Generic_Name->lookupOptions()) ?>;
fpres_tradenames_newdelete.lists["x_Form"] = <?php echo $pres_tradenames_new_delete->Form->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_Form"].options = <?php echo JsonEncode($pres_tradenames_new_delete->Form->lookupOptions()) ?>;
fpres_tradenames_newdelete.lists["x_Unit"] = <?php echo $pres_tradenames_new_delete->Unit->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_Unit"].options = <?php echo JsonEncode($pres_tradenames_new_delete->Unit->lookupOptions()) ?>;
fpres_tradenames_newdelete.lists["x_TypeOfDrug"] = <?php echo $pres_tradenames_new_delete->TypeOfDrug->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_TypeOfDrug"].options = <?php echo JsonEncode($pres_tradenames_new_delete->TypeOfDrug->options(FALSE, TRUE)) ?>;
fpres_tradenames_newdelete.lists["x_ProductType"] = <?php echo $pres_tradenames_new_delete->ProductType->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_ProductType"].options = <?php echo JsonEncode($pres_tradenames_new_delete->ProductType->options(FALSE, TRUE)) ?>;
fpres_tradenames_newdelete.lists["x_Generic_Name1"] = <?php echo $pres_tradenames_new_delete->Generic_Name1->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_Generic_Name1"].options = <?php echo JsonEncode($pres_tradenames_new_delete->Generic_Name1->lookupOptions()) ?>;
fpres_tradenames_newdelete.lists["x_Unit1"] = <?php echo $pres_tradenames_new_delete->Unit1->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_Unit1"].options = <?php echo JsonEncode($pres_tradenames_new_delete->Unit1->lookupOptions()) ?>;
fpres_tradenames_newdelete.lists["x_Generic_Name2"] = <?php echo $pres_tradenames_new_delete->Generic_Name2->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_Generic_Name2"].options = <?php echo JsonEncode($pres_tradenames_new_delete->Generic_Name2->lookupOptions()) ?>;
fpres_tradenames_newdelete.lists["x_Unit2"] = <?php echo $pres_tradenames_new_delete->Unit2->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_Unit2"].options = <?php echo JsonEncode($pres_tradenames_new_delete->Unit2->lookupOptions()) ?>;
fpres_tradenames_newdelete.lists["x_Generic_Name3"] = <?php echo $pres_tradenames_new_delete->Generic_Name3->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_Generic_Name3"].options = <?php echo JsonEncode($pres_tradenames_new_delete->Generic_Name3->lookupOptions()) ?>;
fpres_tradenames_newdelete.lists["x_Unit3"] = <?php echo $pres_tradenames_new_delete->Unit3->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_Unit3"].options = <?php echo JsonEncode($pres_tradenames_new_delete->Unit3->lookupOptions()) ?>;
fpres_tradenames_newdelete.lists["x_Generic_Name4"] = <?php echo $pres_tradenames_new_delete->Generic_Name4->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_Generic_Name4"].options = <?php echo JsonEncode($pres_tradenames_new_delete->Generic_Name4->lookupOptions()) ?>;
fpres_tradenames_newdelete.lists["x_Generic_Name5"] = <?php echo $pres_tradenames_new_delete->Generic_Name5->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_Generic_Name5"].options = <?php echo JsonEncode($pres_tradenames_new_delete->Generic_Name5->lookupOptions()) ?>;
fpres_tradenames_newdelete.lists["x_Unit4"] = <?php echo $pres_tradenames_new_delete->Unit4->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_Unit4"].options = <?php echo JsonEncode($pres_tradenames_new_delete->Unit4->lookupOptions()) ?>;
fpres_tradenames_newdelete.lists["x_Unit5"] = <?php echo $pres_tradenames_new_delete->Unit5->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_Unit5"].options = <?php echo JsonEncode($pres_tradenames_new_delete->Unit5->lookupOptions()) ?>;
fpres_tradenames_newdelete.lists["x_AlterNative1"] = <?php echo $pres_tradenames_new_delete->AlterNative1->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_AlterNative1"].options = <?php echo JsonEncode($pres_tradenames_new_delete->AlterNative1->lookupOptions()) ?>;
fpres_tradenames_newdelete.lists["x_AlterNative2"] = <?php echo $pres_tradenames_new_delete->AlterNative2->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_AlterNative2"].options = <?php echo JsonEncode($pres_tradenames_new_delete->AlterNative2->lookupOptions()) ?>;
fpres_tradenames_newdelete.lists["x_AlterNative3"] = <?php echo $pres_tradenames_new_delete->AlterNative3->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_AlterNative3"].options = <?php echo JsonEncode($pres_tradenames_new_delete->AlterNative3->lookupOptions()) ?>;
fpres_tradenames_newdelete.lists["x_AlterNative4"] = <?php echo $pres_tradenames_new_delete->AlterNative4->Lookup->toClientList() ?>;
fpres_tradenames_newdelete.lists["x_AlterNative4"].options = <?php echo JsonEncode($pres_tradenames_new_delete->AlterNative4->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_tradenames_new_delete->showPageHeader(); ?>
<?php
$pres_tradenames_new_delete->showMessage();
?>
<form name="fpres_tradenames_newdelete" id="fpres_tradenames_newdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_tradenames_new_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_tradenames_new_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames_new">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_tradenames_new_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_tradenames_new->ID->Visible) { // ID ?>
		<th class="<?php echo $pres_tradenames_new->ID->headerCellClass() ?>"><span id="elh_pres_tradenames_new_ID" class="pres_tradenames_new_ID"><?php echo $pres_tradenames_new->ID->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Drug_Name->Visible) { // Drug_Name ?>
		<th class="<?php echo $pres_tradenames_new->Drug_Name->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Drug_Name" class="pres_tradenames_new_Drug_Name"><?php echo $pres_tradenames_new->Drug_Name->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name->Visible) { // Generic_Name ?>
		<th class="<?php echo $pres_tradenames_new->Generic_Name->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Generic_Name" class="pres_tradenames_new_Generic_Name"><?php echo $pres_tradenames_new->Generic_Name->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Trade_Name->Visible) { // Trade_Name ?>
		<th class="<?php echo $pres_tradenames_new->Trade_Name->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Trade_Name" class="pres_tradenames_new_Trade_Name"><?php echo $pres_tradenames_new->Trade_Name->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->PR_CODE->Visible) { // PR_CODE ?>
		<th class="<?php echo $pres_tradenames_new->PR_CODE->headerCellClass() ?>"><span id="elh_pres_tradenames_new_PR_CODE" class="pres_tradenames_new_PR_CODE"><?php echo $pres_tradenames_new->PR_CODE->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Form->Visible) { // Form ?>
		<th class="<?php echo $pres_tradenames_new->Form->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Form" class="pres_tradenames_new_Form"><?php echo $pres_tradenames_new->Form->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Strength->Visible) { // Strength ?>
		<th class="<?php echo $pres_tradenames_new->Strength->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Strength" class="pres_tradenames_new_Strength"><?php echo $pres_tradenames_new->Strength->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Unit->Visible) { // Unit ?>
		<th class="<?php echo $pres_tradenames_new->Unit->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Unit" class="pres_tradenames_new_Unit"><?php echo $pres_tradenames_new->Unit->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->TypeOfDrug->Visible) { // TypeOfDrug ?>
		<th class="<?php echo $pres_tradenames_new->TypeOfDrug->headerCellClass() ?>"><span id="elh_pres_tradenames_new_TypeOfDrug" class="pres_tradenames_new_TypeOfDrug"><?php echo $pres_tradenames_new->TypeOfDrug->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->ProductType->Visible) { // ProductType ?>
		<th class="<?php echo $pres_tradenames_new->ProductType->headerCellClass() ?>"><span id="elh_pres_tradenames_new_ProductType" class="pres_tradenames_new_ProductType"><?php echo $pres_tradenames_new->ProductType->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name1->Visible) { // Generic_Name1 ?>
		<th class="<?php echo $pres_tradenames_new->Generic_Name1->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Generic_Name1" class="pres_tradenames_new_Generic_Name1"><?php echo $pres_tradenames_new->Generic_Name1->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Strength1->Visible) { // Strength1 ?>
		<th class="<?php echo $pres_tradenames_new->Strength1->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Strength1" class="pres_tradenames_new_Strength1"><?php echo $pres_tradenames_new->Strength1->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Unit1->Visible) { // Unit1 ?>
		<th class="<?php echo $pres_tradenames_new->Unit1->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Unit1" class="pres_tradenames_new_Unit1"><?php echo $pres_tradenames_new->Unit1->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name2->Visible) { // Generic_Name2 ?>
		<th class="<?php echo $pres_tradenames_new->Generic_Name2->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Generic_Name2" class="pres_tradenames_new_Generic_Name2"><?php echo $pres_tradenames_new->Generic_Name2->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Strength2->Visible) { // Strength2 ?>
		<th class="<?php echo $pres_tradenames_new->Strength2->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Strength2" class="pres_tradenames_new_Strength2"><?php echo $pres_tradenames_new->Strength2->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Unit2->Visible) { // Unit2 ?>
		<th class="<?php echo $pres_tradenames_new->Unit2->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Unit2" class="pres_tradenames_new_Unit2"><?php echo $pres_tradenames_new->Unit2->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name3->Visible) { // Generic_Name3 ?>
		<th class="<?php echo $pres_tradenames_new->Generic_Name3->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Generic_Name3" class="pres_tradenames_new_Generic_Name3"><?php echo $pres_tradenames_new->Generic_Name3->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Strength3->Visible) { // Strength3 ?>
		<th class="<?php echo $pres_tradenames_new->Strength3->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Strength3" class="pres_tradenames_new_Strength3"><?php echo $pres_tradenames_new->Strength3->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Unit3->Visible) { // Unit3 ?>
		<th class="<?php echo $pres_tradenames_new->Unit3->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Unit3" class="pres_tradenames_new_Unit3"><?php echo $pres_tradenames_new->Unit3->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name4->Visible) { // Generic_Name4 ?>
		<th class="<?php echo $pres_tradenames_new->Generic_Name4->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Generic_Name4" class="pres_tradenames_new_Generic_Name4"><?php echo $pres_tradenames_new->Generic_Name4->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name5->Visible) { // Generic_Name5 ?>
		<th class="<?php echo $pres_tradenames_new->Generic_Name5->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Generic_Name5" class="pres_tradenames_new_Generic_Name5"><?php echo $pres_tradenames_new->Generic_Name5->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Strength4->Visible) { // Strength4 ?>
		<th class="<?php echo $pres_tradenames_new->Strength4->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Strength4" class="pres_tradenames_new_Strength4"><?php echo $pres_tradenames_new->Strength4->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Strength5->Visible) { // Strength5 ?>
		<th class="<?php echo $pres_tradenames_new->Strength5->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Strength5" class="pres_tradenames_new_Strength5"><?php echo $pres_tradenames_new->Strength5->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Unit4->Visible) { // Unit4 ?>
		<th class="<?php echo $pres_tradenames_new->Unit4->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Unit4" class="pres_tradenames_new_Unit4"><?php echo $pres_tradenames_new->Unit4->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->Unit5->Visible) { // Unit5 ?>
		<th class="<?php echo $pres_tradenames_new->Unit5->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Unit5" class="pres_tradenames_new_Unit5"><?php echo $pres_tradenames_new->Unit5->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative1->Visible) { // AlterNative1 ?>
		<th class="<?php echo $pres_tradenames_new->AlterNative1->headerCellClass() ?>"><span id="elh_pres_tradenames_new_AlterNative1" class="pres_tradenames_new_AlterNative1"><?php echo $pres_tradenames_new->AlterNative1->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative2->Visible) { // AlterNative2 ?>
		<th class="<?php echo $pres_tradenames_new->AlterNative2->headerCellClass() ?>"><span id="elh_pres_tradenames_new_AlterNative2" class="pres_tradenames_new_AlterNative2"><?php echo $pres_tradenames_new->AlterNative2->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative3->Visible) { // AlterNative3 ?>
		<th class="<?php echo $pres_tradenames_new->AlterNative3->headerCellClass() ?>"><span id="elh_pres_tradenames_new_AlterNative3" class="pres_tradenames_new_AlterNative3"><?php echo $pres_tradenames_new->AlterNative3->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative4->Visible) { // AlterNative4 ?>
		<th class="<?php echo $pres_tradenames_new->AlterNative4->headerCellClass() ?>"><span id="elh_pres_tradenames_new_AlterNative4" class="pres_tradenames_new_AlterNative4"><?php echo $pres_tradenames_new->AlterNative4->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_tradenames_new_delete->RecCnt = 0;
$i = 0;
while (!$pres_tradenames_new_delete->Recordset->EOF) {
	$pres_tradenames_new_delete->RecCnt++;
	$pres_tradenames_new_delete->RowCnt++;

	// Set row properties
	$pres_tradenames_new->resetAttributes();
	$pres_tradenames_new->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_tradenames_new_delete->loadRowValues($pres_tradenames_new_delete->Recordset);

	// Render row
	$pres_tradenames_new_delete->renderRow();
?>
	<tr<?php echo $pres_tradenames_new->rowAttributes() ?>>
<?php if ($pres_tradenames_new->ID->Visible) { // ID ?>
		<td<?php echo $pres_tradenames_new->ID->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_ID" class="pres_tradenames_new_ID">
<span<?php echo $pres_tradenames_new->ID->viewAttributes() ?>>
<?php echo $pres_tradenames_new->ID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Drug_Name->Visible) { // Drug_Name ?>
		<td<?php echo $pres_tradenames_new->Drug_Name->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Drug_Name" class="pres_tradenames_new_Drug_Name">
<span<?php echo $pres_tradenames_new->Drug_Name->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Drug_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name->Visible) { // Generic_Name ?>
		<td<?php echo $pres_tradenames_new->Generic_Name->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Generic_Name" class="pres_tradenames_new_Generic_Name">
<span<?php echo $pres_tradenames_new->Generic_Name->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Trade_Name->Visible) { // Trade_Name ?>
		<td<?php echo $pres_tradenames_new->Trade_Name->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Trade_Name" class="pres_tradenames_new_Trade_Name">
<span<?php echo $pres_tradenames_new->Trade_Name->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Trade_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->PR_CODE->Visible) { // PR_CODE ?>
		<td<?php echo $pres_tradenames_new->PR_CODE->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_PR_CODE" class="pres_tradenames_new_PR_CODE">
<span<?php echo $pres_tradenames_new->PR_CODE->viewAttributes() ?>>
<?php echo $pres_tradenames_new->PR_CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Form->Visible) { // Form ?>
		<td<?php echo $pres_tradenames_new->Form->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Form" class="pres_tradenames_new_Form">
<span<?php echo $pres_tradenames_new->Form->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Form->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Strength->Visible) { // Strength ?>
		<td<?php echo $pres_tradenames_new->Strength->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Strength" class="pres_tradenames_new_Strength">
<span<?php echo $pres_tradenames_new->Strength->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Strength->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Unit->Visible) { // Unit ?>
		<td<?php echo $pres_tradenames_new->Unit->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Unit" class="pres_tradenames_new_Unit">
<span<?php echo $pres_tradenames_new->Unit->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->TypeOfDrug->Visible) { // TypeOfDrug ?>
		<td<?php echo $pres_tradenames_new->TypeOfDrug->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_TypeOfDrug" class="pres_tradenames_new_TypeOfDrug">
<span<?php echo $pres_tradenames_new->TypeOfDrug->viewAttributes() ?>>
<?php echo $pres_tradenames_new->TypeOfDrug->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->ProductType->Visible) { // ProductType ?>
		<td<?php echo $pres_tradenames_new->ProductType->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_ProductType" class="pres_tradenames_new_ProductType">
<span<?php echo $pres_tradenames_new->ProductType->viewAttributes() ?>>
<?php echo $pres_tradenames_new->ProductType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name1->Visible) { // Generic_Name1 ?>
		<td<?php echo $pres_tradenames_new->Generic_Name1->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Generic_Name1" class="pres_tradenames_new_Generic_Name1">
<span<?php echo $pres_tradenames_new->Generic_Name1->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Strength1->Visible) { // Strength1 ?>
		<td<?php echo $pres_tradenames_new->Strength1->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Strength1" class="pres_tradenames_new_Strength1">
<span<?php echo $pres_tradenames_new->Strength1->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Strength1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Unit1->Visible) { // Unit1 ?>
		<td<?php echo $pres_tradenames_new->Unit1->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Unit1" class="pres_tradenames_new_Unit1">
<span<?php echo $pres_tradenames_new->Unit1->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Unit1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name2->Visible) { // Generic_Name2 ?>
		<td<?php echo $pres_tradenames_new->Generic_Name2->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Generic_Name2" class="pres_tradenames_new_Generic_Name2">
<span<?php echo $pres_tradenames_new->Generic_Name2->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Strength2->Visible) { // Strength2 ?>
		<td<?php echo $pres_tradenames_new->Strength2->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Strength2" class="pres_tradenames_new_Strength2">
<span<?php echo $pres_tradenames_new->Strength2->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Strength2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Unit2->Visible) { // Unit2 ?>
		<td<?php echo $pres_tradenames_new->Unit2->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Unit2" class="pres_tradenames_new_Unit2">
<span<?php echo $pres_tradenames_new->Unit2->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Unit2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name3->Visible) { // Generic_Name3 ?>
		<td<?php echo $pres_tradenames_new->Generic_Name3->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Generic_Name3" class="pres_tradenames_new_Generic_Name3">
<span<?php echo $pres_tradenames_new->Generic_Name3->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Strength3->Visible) { // Strength3 ?>
		<td<?php echo $pres_tradenames_new->Strength3->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Strength3" class="pres_tradenames_new_Strength3">
<span<?php echo $pres_tradenames_new->Strength3->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Strength3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Unit3->Visible) { // Unit3 ?>
		<td<?php echo $pres_tradenames_new->Unit3->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Unit3" class="pres_tradenames_new_Unit3">
<span<?php echo $pres_tradenames_new->Unit3->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Unit3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name4->Visible) { // Generic_Name4 ?>
		<td<?php echo $pres_tradenames_new->Generic_Name4->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Generic_Name4" class="pres_tradenames_new_Generic_Name4">
<span<?php echo $pres_tradenames_new->Generic_Name4->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name5->Visible) { // Generic_Name5 ?>
		<td<?php echo $pres_tradenames_new->Generic_Name5->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Generic_Name5" class="pres_tradenames_new_Generic_Name5">
<span<?php echo $pres_tradenames_new->Generic_Name5->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Strength4->Visible) { // Strength4 ?>
		<td<?php echo $pres_tradenames_new->Strength4->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Strength4" class="pres_tradenames_new_Strength4">
<span<?php echo $pres_tradenames_new->Strength4->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Strength4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Strength5->Visible) { // Strength5 ?>
		<td<?php echo $pres_tradenames_new->Strength5->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Strength5" class="pres_tradenames_new_Strength5">
<span<?php echo $pres_tradenames_new->Strength5->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Strength5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Unit4->Visible) { // Unit4 ?>
		<td<?php echo $pres_tradenames_new->Unit4->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Unit4" class="pres_tradenames_new_Unit4">
<span<?php echo $pres_tradenames_new->Unit4->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Unit4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->Unit5->Visible) { // Unit5 ?>
		<td<?php echo $pres_tradenames_new->Unit5->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_Unit5" class="pres_tradenames_new_Unit5">
<span<?php echo $pres_tradenames_new->Unit5->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Unit5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative1->Visible) { // AlterNative1 ?>
		<td<?php echo $pres_tradenames_new->AlterNative1->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_AlterNative1" class="pres_tradenames_new_AlterNative1">
<span<?php echo $pres_tradenames_new->AlterNative1->viewAttributes() ?>>
<?php echo $pres_tradenames_new->AlterNative1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative2->Visible) { // AlterNative2 ?>
		<td<?php echo $pres_tradenames_new->AlterNative2->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_AlterNative2" class="pres_tradenames_new_AlterNative2">
<span<?php echo $pres_tradenames_new->AlterNative2->viewAttributes() ?>>
<?php echo $pres_tradenames_new->AlterNative2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative3->Visible) { // AlterNative3 ?>
		<td<?php echo $pres_tradenames_new->AlterNative3->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_AlterNative3" class="pres_tradenames_new_AlterNative3">
<span<?php echo $pres_tradenames_new->AlterNative3->viewAttributes() ?>>
<?php echo $pres_tradenames_new->AlterNative3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative4->Visible) { // AlterNative4 ?>
		<td<?php echo $pres_tradenames_new->AlterNative4->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCnt ?>_pres_tradenames_new_AlterNative4" class="pres_tradenames_new_AlterNative4">
<span<?php echo $pres_tradenames_new->AlterNative4->viewAttributes() ?>>
<?php echo $pres_tradenames_new->AlterNative4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_tradenames_new_delete->Recordset->moveNext();
}
$pres_tradenames_new_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_tradenames_new_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_tradenames_new_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pres_tradenames_new_delete->terminate();
?>