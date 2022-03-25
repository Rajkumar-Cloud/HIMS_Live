<?php

namespace PHPMaker2021\HIMS;

// Table
$view_labreport_print = Container("view_labreport_print");
?>
<?php if ($view_labreport_print->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_labreport_printmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($view_labreport_print->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->id->caption() ?></td>
            <td <?= $view_labreport_print->id->cellAttributes() ?>>
<span id="el_view_labreport_print_id">
<span<?= $view_labreport_print->id->viewAttributes() ?>>
<?= $view_labreport_print->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->PatID->Visible) { // PatID ?>
        <tr id="r_PatID">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->PatID->caption() ?></td>
            <td <?= $view_labreport_print->PatID->cellAttributes() ?>>
<span id="el_view_labreport_print_PatID">
<span<?= $view_labreport_print->PatID->viewAttributes() ?>>
<?= $view_labreport_print->PatID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->PatientName->Visible) { // PatientName ?>
        <tr id="r_PatientName">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->PatientName->caption() ?></td>
            <td <?= $view_labreport_print->PatientName->cellAttributes() ?>>
<span id="el_view_labreport_print_PatientName">
<span<?= $view_labreport_print->PatientName->viewAttributes() ?>>
<?= $view_labreport_print->PatientName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->Age->Visible) { // Age ?>
        <tr id="r_Age">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->Age->caption() ?></td>
            <td <?= $view_labreport_print->Age->cellAttributes() ?>>
<span id="el_view_labreport_print_Age">
<span<?= $view_labreport_print->Age->viewAttributes() ?>>
<?= $view_labreport_print->Age->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->Gender->Visible) { // Gender ?>
        <tr id="r_Gender">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->Gender->caption() ?></td>
            <td <?= $view_labreport_print->Gender->cellAttributes() ?>>
<span id="el_view_labreport_print_Gender">
<span<?= $view_labreport_print->Gender->viewAttributes() ?>>
<?= $view_labreport_print->Gender->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->sid->Visible) { // sid ?>
        <tr id="r_sid">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->sid->caption() ?></td>
            <td <?= $view_labreport_print->sid->cellAttributes() ?>>
<span id="el_view_labreport_print_sid">
<span<?= $view_labreport_print->sid->viewAttributes() ?>>
<?= $view_labreport_print->sid->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->ItemCode->Visible) { // ItemCode ?>
        <tr id="r_ItemCode">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->ItemCode->caption() ?></td>
            <td <?= $view_labreport_print->ItemCode->cellAttributes() ?>>
<span id="el_view_labreport_print_ItemCode">
<span<?= $view_labreport_print->ItemCode->viewAttributes() ?>>
<?= $view_labreport_print->ItemCode->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->DEptCd->Visible) { // DEptCd ?>
        <tr id="r_DEptCd">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->DEptCd->caption() ?></td>
            <td <?= $view_labreport_print->DEptCd->cellAttributes() ?>>
<span id="el_view_labreport_print_DEptCd">
<span<?= $view_labreport_print->DEptCd->viewAttributes() ?>>
<?= $view_labreport_print->DEptCd->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->Resulted->Visible) { // Resulted ?>
        <tr id="r_Resulted">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->Resulted->caption() ?></td>
            <td <?= $view_labreport_print->Resulted->cellAttributes() ?>>
<span id="el_view_labreport_print_Resulted">
<span<?= $view_labreport_print->Resulted->viewAttributes() ?>>
<?= $view_labreport_print->Resulted->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->Services->Visible) { // Services ?>
        <tr id="r_Services">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->Services->caption() ?></td>
            <td <?= $view_labreport_print->Services->cellAttributes() ?>>
<span id="el_view_labreport_print_Services">
<span<?= $view_labreport_print->Services->viewAttributes() ?>>
<?= $view_labreport_print->Services->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->Pic1->Visible) { // Pic1 ?>
        <tr id="r_Pic1">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->Pic1->caption() ?></td>
            <td <?= $view_labreport_print->Pic1->cellAttributes() ?>>
<span id="el_view_labreport_print_Pic1">
<span<?= $view_labreport_print->Pic1->viewAttributes() ?>>
<?= $view_labreport_print->Pic1->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->Pic2->Visible) { // Pic2 ?>
        <tr id="r_Pic2">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->Pic2->caption() ?></td>
            <td <?= $view_labreport_print->Pic2->cellAttributes() ?>>
<span id="el_view_labreport_print_Pic2">
<span<?= $view_labreport_print->Pic2->viewAttributes() ?>>
<?= $view_labreport_print->Pic2->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->TestUnit->Visible) { // TestUnit ?>
        <tr id="r_TestUnit">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->TestUnit->caption() ?></td>
            <td <?= $view_labreport_print->TestUnit->cellAttributes() ?>>
<span id="el_view_labreport_print_TestUnit">
<span<?= $view_labreport_print->TestUnit->viewAttributes() ?>>
<?= $view_labreport_print->TestUnit->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->Order->Visible) { // Order ?>
        <tr id="r_Order">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->Order->caption() ?></td>
            <td <?= $view_labreport_print->Order->cellAttributes() ?>>
<span id="el_view_labreport_print_Order">
<span<?= $view_labreport_print->Order->viewAttributes() ?>>
<?= $view_labreport_print->Order->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->Repeated->Visible) { // Repeated ?>
        <tr id="r_Repeated">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->Repeated->caption() ?></td>
            <td <?= $view_labreport_print->Repeated->cellAttributes() ?>>
<span id="el_view_labreport_print_Repeated">
<span<?= $view_labreport_print->Repeated->viewAttributes() ?>>
<?= $view_labreport_print->Repeated->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->Vid->Visible) { // Vid ?>
        <tr id="r_Vid">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->Vid->caption() ?></td>
            <td <?= $view_labreport_print->Vid->cellAttributes() ?>>
<span id="el_view_labreport_print_Vid">
<span<?= $view_labreport_print->Vid->viewAttributes() ?>>
<?= $view_labreport_print->Vid->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->invoiceId->Visible) { // invoiceId ?>
        <tr id="r_invoiceId">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->invoiceId->caption() ?></td>
            <td <?= $view_labreport_print->invoiceId->cellAttributes() ?>>
<span id="el_view_labreport_print_invoiceId">
<span<?= $view_labreport_print->invoiceId->viewAttributes() ?>>
<?= $view_labreport_print->invoiceId->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->DrID->Visible) { // DrID ?>
        <tr id="r_DrID">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->DrID->caption() ?></td>
            <td <?= $view_labreport_print->DrID->cellAttributes() ?>>
<span id="el_view_labreport_print_DrID">
<span<?= $view_labreport_print->DrID->viewAttributes() ?>>
<?= $view_labreport_print->DrID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->DrCODE->Visible) { // DrCODE ?>
        <tr id="r_DrCODE">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->DrCODE->caption() ?></td>
            <td <?= $view_labreport_print->DrCODE->cellAttributes() ?>>
<span id="el_view_labreport_print_DrCODE">
<span<?= $view_labreport_print->DrCODE->viewAttributes() ?>>
<?= $view_labreport_print->DrCODE->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->DrName->Visible) { // DrName ?>
        <tr id="r_DrName">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->DrName->caption() ?></td>
            <td <?= $view_labreport_print->DrName->cellAttributes() ?>>
<span id="el_view_labreport_print_DrName">
<span<?= $view_labreport_print->DrName->viewAttributes() ?>>
<?= $view_labreport_print->DrName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->Department->Visible) { // Department ?>
        <tr id="r_Department">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->Department->caption() ?></td>
            <td <?= $view_labreport_print->Department->cellAttributes() ?>>
<span id="el_view_labreport_print_Department">
<span<?= $view_labreport_print->Department->viewAttributes() ?>>
<?= $view_labreport_print->Department->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->createddatetime->caption() ?></td>
            <td <?= $view_labreport_print->createddatetime->cellAttributes() ?>>
<span id="el_view_labreport_print_createddatetime">
<span<?= $view_labreport_print->createddatetime->viewAttributes() ?>>
<?= $view_labreport_print->createddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->status->Visible) { // status ?>
        <tr id="r_status">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->status->caption() ?></td>
            <td <?= $view_labreport_print->status->cellAttributes() ?>>
<span id="el_view_labreport_print_status">
<span<?= $view_labreport_print->status->viewAttributes() ?>>
<?= $view_labreport_print->status->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->TestType->Visible) { // TestType ?>
        <tr id="r_TestType">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->TestType->caption() ?></td>
            <td <?= $view_labreport_print->TestType->cellAttributes() ?>>
<span id="el_view_labreport_print_TestType">
<span<?= $view_labreport_print->TestType->viewAttributes() ?>>
<?= $view_labreport_print->TestType->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->ResultDate->Visible) { // ResultDate ?>
        <tr id="r_ResultDate">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->ResultDate->caption() ?></td>
            <td <?= $view_labreport_print->ResultDate->cellAttributes() ?>>
<span id="el_view_labreport_print_ResultDate">
<span<?= $view_labreport_print->ResultDate->viewAttributes() ?>>
<?= $view_labreport_print->ResultDate->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->ResultedBy->Visible) { // ResultedBy ?>
        <tr id="r_ResultedBy">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->ResultedBy->caption() ?></td>
            <td <?= $view_labreport_print->ResultedBy->cellAttributes() ?>>
<span id="el_view_labreport_print_ResultedBy">
<span<?= $view_labreport_print->ResultedBy->viewAttributes() ?>>
<?= $view_labreport_print->ResultedBy->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->Printed->Visible) { // Printed ?>
        <tr id="r_Printed">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->Printed->caption() ?></td>
            <td <?= $view_labreport_print->Printed->cellAttributes() ?>>
<span id="el_view_labreport_print_Printed">
<span<?= $view_labreport_print->Printed->viewAttributes() ?>>
<?= $view_labreport_print->Printed->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->PrintBy->Visible) { // PrintBy ?>
        <tr id="r_PrintBy">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->PrintBy->caption() ?></td>
            <td <?= $view_labreport_print->PrintBy->cellAttributes() ?>>
<span id="el_view_labreport_print_PrintBy">
<span<?= $view_labreport_print->PrintBy->viewAttributes() ?>>
<?= $view_labreport_print->PrintBy->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_labreport_print->PrintDate->Visible) { // PrintDate ?>
        <tr id="r_PrintDate">
            <td class="<?= $view_labreport_print->TableLeftColumnClass ?>"><?= $view_labreport_print->PrintDate->caption() ?></td>
            <td <?= $view_labreport_print->PrintDate->cellAttributes() ?>>
<span id="el_view_labreport_print_PrintDate">
<span<?= $view_labreport_print->PrintDate->viewAttributes() ?>>
<?= $view_labreport_print->PrintDate->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
