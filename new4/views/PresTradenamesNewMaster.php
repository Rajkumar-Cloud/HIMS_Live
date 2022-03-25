<?php

namespace PHPMaker2021\HIMS;

// Table
$pres_tradenames_new = Container("pres_tradenames_new");
?>
<?php if ($pres_tradenames_new->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_pres_tradenames_newmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($pres_tradenames_new->ID->Visible) { // ID ?>
        <tr id="r_ID">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->ID->caption() ?></td>
            <td <?= $pres_tradenames_new->ID->cellAttributes() ?>>
<span id="el_pres_tradenames_new_ID">
<span<?= $pres_tradenames_new->ID->viewAttributes() ?>>
<?= $pres_tradenames_new->ID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Drug_Name->Visible) { // Drug_Name ?>
        <tr id="r_Drug_Name">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Drug_Name->caption() ?></td>
            <td <?= $pres_tradenames_new->Drug_Name->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Drug_Name">
<span<?= $pres_tradenames_new->Drug_Name->viewAttributes() ?>>
<?= $pres_tradenames_new->Drug_Name->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name->Visible) { // Generic_Name ?>
        <tr id="r_Generic_Name">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Generic_Name->caption() ?></td>
            <td <?= $pres_tradenames_new->Generic_Name->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name">
<span<?= $pres_tradenames_new->Generic_Name->viewAttributes() ?>>
<?= $pres_tradenames_new->Generic_Name->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Trade_Name->Visible) { // Trade_Name ?>
        <tr id="r_Trade_Name">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Trade_Name->caption() ?></td>
            <td <?= $pres_tradenames_new->Trade_Name->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Trade_Name">
<span<?= $pres_tradenames_new->Trade_Name->viewAttributes() ?>>
<?= $pres_tradenames_new->Trade_Name->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->PR_CODE->Visible) { // PR_CODE ?>
        <tr id="r_PR_CODE">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->PR_CODE->caption() ?></td>
            <td <?= $pres_tradenames_new->PR_CODE->cellAttributes() ?>>
<span id="el_pres_tradenames_new_PR_CODE">
<span<?= $pres_tradenames_new->PR_CODE->viewAttributes() ?>>
<?= $pres_tradenames_new->PR_CODE->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Form->Visible) { // Form ?>
        <tr id="r_Form">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Form->caption() ?></td>
            <td <?= $pres_tradenames_new->Form->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Form">
<span<?= $pres_tradenames_new->Form->viewAttributes() ?>>
<?= $pres_tradenames_new->Form->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Strength->Visible) { // Strength ?>
        <tr id="r_Strength">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Strength->caption() ?></td>
            <td <?= $pres_tradenames_new->Strength->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength">
<span<?= $pres_tradenames_new->Strength->viewAttributes() ?>>
<?= $pres_tradenames_new->Strength->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Unit->Visible) { // Unit ?>
        <tr id="r_Unit">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Unit->caption() ?></td>
            <td <?= $pres_tradenames_new->Unit->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit">
<span<?= $pres_tradenames_new->Unit->viewAttributes() ?>>
<?= $pres_tradenames_new->Unit->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <tr id="r_TypeOfDrug">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->TypeOfDrug->caption() ?></td>
            <td <?= $pres_tradenames_new->TypeOfDrug->cellAttributes() ?>>
<span id="el_pres_tradenames_new_TypeOfDrug">
<span<?= $pres_tradenames_new->TypeOfDrug->viewAttributes() ?>>
<?= $pres_tradenames_new->TypeOfDrug->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->ProductType->Visible) { // ProductType ?>
        <tr id="r_ProductType">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->ProductType->caption() ?></td>
            <td <?= $pres_tradenames_new->ProductType->cellAttributes() ?>>
<span id="el_pres_tradenames_new_ProductType">
<span<?= $pres_tradenames_new->ProductType->viewAttributes() ?>>
<?= $pres_tradenames_new->ProductType->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name1->Visible) { // Generic_Name1 ?>
        <tr id="r_Generic_Name1">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Generic_Name1->caption() ?></td>
            <td <?= $pres_tradenames_new->Generic_Name1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name1">
<span<?= $pres_tradenames_new->Generic_Name1->viewAttributes() ?>>
<?= $pres_tradenames_new->Generic_Name1->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Strength1->Visible) { // Strength1 ?>
        <tr id="r_Strength1">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Strength1->caption() ?></td>
            <td <?= $pres_tradenames_new->Strength1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength1">
<span<?= $pres_tradenames_new->Strength1->viewAttributes() ?>>
<?= $pres_tradenames_new->Strength1->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Unit1->Visible) { // Unit1 ?>
        <tr id="r_Unit1">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Unit1->caption() ?></td>
            <td <?= $pres_tradenames_new->Unit1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit1">
<span<?= $pres_tradenames_new->Unit1->viewAttributes() ?>>
<?= $pres_tradenames_new->Unit1->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name2->Visible) { // Generic_Name2 ?>
        <tr id="r_Generic_Name2">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Generic_Name2->caption() ?></td>
            <td <?= $pres_tradenames_new->Generic_Name2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name2">
<span<?= $pres_tradenames_new->Generic_Name2->viewAttributes() ?>>
<?= $pres_tradenames_new->Generic_Name2->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Strength2->Visible) { // Strength2 ?>
        <tr id="r_Strength2">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Strength2->caption() ?></td>
            <td <?= $pres_tradenames_new->Strength2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength2">
<span<?= $pres_tradenames_new->Strength2->viewAttributes() ?>>
<?= $pres_tradenames_new->Strength2->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Unit2->Visible) { // Unit2 ?>
        <tr id="r_Unit2">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Unit2->caption() ?></td>
            <td <?= $pres_tradenames_new->Unit2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit2">
<span<?= $pres_tradenames_new->Unit2->viewAttributes() ?>>
<?= $pres_tradenames_new->Unit2->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name3->Visible) { // Generic_Name3 ?>
        <tr id="r_Generic_Name3">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Generic_Name3->caption() ?></td>
            <td <?= $pres_tradenames_new->Generic_Name3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name3">
<span<?= $pres_tradenames_new->Generic_Name3->viewAttributes() ?>>
<?= $pres_tradenames_new->Generic_Name3->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Strength3->Visible) { // Strength3 ?>
        <tr id="r_Strength3">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Strength3->caption() ?></td>
            <td <?= $pres_tradenames_new->Strength3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength3">
<span<?= $pres_tradenames_new->Strength3->viewAttributes() ?>>
<?= $pres_tradenames_new->Strength3->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Unit3->Visible) { // Unit3 ?>
        <tr id="r_Unit3">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Unit3->caption() ?></td>
            <td <?= $pres_tradenames_new->Unit3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit3">
<span<?= $pres_tradenames_new->Unit3->viewAttributes() ?>>
<?= $pres_tradenames_new->Unit3->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name4->Visible) { // Generic_Name4 ?>
        <tr id="r_Generic_Name4">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Generic_Name4->caption() ?></td>
            <td <?= $pres_tradenames_new->Generic_Name4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name4">
<span<?= $pres_tradenames_new->Generic_Name4->viewAttributes() ?>>
<?= $pres_tradenames_new->Generic_Name4->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name5->Visible) { // Generic_Name5 ?>
        <tr id="r_Generic_Name5">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Generic_Name5->caption() ?></td>
            <td <?= $pres_tradenames_new->Generic_Name5->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name5">
<span<?= $pres_tradenames_new->Generic_Name5->viewAttributes() ?>>
<?= $pres_tradenames_new->Generic_Name5->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Strength4->Visible) { // Strength4 ?>
        <tr id="r_Strength4">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Strength4->caption() ?></td>
            <td <?= $pres_tradenames_new->Strength4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength4">
<span<?= $pres_tradenames_new->Strength4->viewAttributes() ?>>
<?= $pres_tradenames_new->Strength4->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Strength5->Visible) { // Strength5 ?>
        <tr id="r_Strength5">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Strength5->caption() ?></td>
            <td <?= $pres_tradenames_new->Strength5->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength5">
<span<?= $pres_tradenames_new->Strength5->viewAttributes() ?>>
<?= $pres_tradenames_new->Strength5->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Unit4->Visible) { // Unit4 ?>
        <tr id="r_Unit4">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Unit4->caption() ?></td>
            <td <?= $pres_tradenames_new->Unit4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit4">
<span<?= $pres_tradenames_new->Unit4->viewAttributes() ?>>
<?= $pres_tradenames_new->Unit4->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->Unit5->Visible) { // Unit5 ?>
        <tr id="r_Unit5">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->Unit5->caption() ?></td>
            <td <?= $pres_tradenames_new->Unit5->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit5">
<span<?= $pres_tradenames_new->Unit5->viewAttributes() ?>>
<?= $pres_tradenames_new->Unit5->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative1->Visible) { // AlterNative1 ?>
        <tr id="r_AlterNative1">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->AlterNative1->caption() ?></td>
            <td <?= $pres_tradenames_new->AlterNative1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative1">
<span<?= $pres_tradenames_new->AlterNative1->viewAttributes() ?>>
<?= $pres_tradenames_new->AlterNative1->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative2->Visible) { // AlterNative2 ?>
        <tr id="r_AlterNative2">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->AlterNative2->caption() ?></td>
            <td <?= $pres_tradenames_new->AlterNative2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative2">
<span<?= $pres_tradenames_new->AlterNative2->viewAttributes() ?>>
<?= $pres_tradenames_new->AlterNative2->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative3->Visible) { // AlterNative3 ?>
        <tr id="r_AlterNative3">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->AlterNative3->caption() ?></td>
            <td <?= $pres_tradenames_new->AlterNative3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative3">
<span<?= $pres_tradenames_new->AlterNative3->viewAttributes() ?>>
<?= $pres_tradenames_new->AlterNative3->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative4->Visible) { // AlterNative4 ?>
        <tr id="r_AlterNative4">
            <td class="<?= $pres_tradenames_new->TableLeftColumnClass ?>"><?= $pres_tradenames_new->AlterNative4->caption() ?></td>
            <td <?= $pres_tradenames_new->AlterNative4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative4">
<span<?= $pres_tradenames_new->AlterNative4->viewAttributes() ?>>
<?= $pres_tradenames_new->AlterNative4->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
