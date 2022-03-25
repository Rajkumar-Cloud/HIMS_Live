<?php

namespace PHPMaker2021\HIMS;

// Table
$view_dashboard_patient_summary = Container("view_dashboard_patient_summary");
?>
<?php if ($view_dashboard_patient_summary->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_dashboard_patient_summarymaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($view_dashboard_patient_summary->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <tr id="r_WhereDidYouHear">
            <td class="<?= $view_dashboard_patient_summary->TableLeftColumnClass ?>"><?= $view_dashboard_patient_summary->WhereDidYouHear->caption() ?></td>
            <td <?= $view_dashboard_patient_summary->WhereDidYouHear->cellAttributes() ?>>
<span id="el_view_dashboard_patient_summary_WhereDidYouHear">
<span<?= $view_dashboard_patient_summary->WhereDidYouHear->viewAttributes() ?>>
<?= $view_dashboard_patient_summary->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_patient_summary->countWhereDidYouHear->Visible) { // count(WhereDidYouHear) ?>
        <tr id="r_countWhereDidYouHear">
            <td class="<?= $view_dashboard_patient_summary->TableLeftColumnClass ?>"><?= $view_dashboard_patient_summary->countWhereDidYouHear->caption() ?></td>
            <td <?= $view_dashboard_patient_summary->countWhereDidYouHear->cellAttributes() ?>>
<span id="el_view_dashboard_patient_summary_countWhereDidYouHear">
<span<?= $view_dashboard_patient_summary->countWhereDidYouHear->viewAttributes() ?>>
<?= $view_dashboard_patient_summary->countWhereDidYouHear->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_patient_summary->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $view_dashboard_patient_summary->TableLeftColumnClass ?>"><?= $view_dashboard_patient_summary->HospID->caption() ?></td>
            <td <?= $view_dashboard_patient_summary->HospID->cellAttributes() ?>>
<span id="el_view_dashboard_patient_summary_HospID">
<span<?= $view_dashboard_patient_summary->HospID->viewAttributes() ?>>
<?= $view_dashboard_patient_summary->HospID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_dashboard_patient_summary->createdDate->Visible) { // createdDate ?>
        <tr id="r_createdDate">
            <td class="<?= $view_dashboard_patient_summary->TableLeftColumnClass ?>"><?= $view_dashboard_patient_summary->createdDate->caption() ?></td>
            <td <?= $view_dashboard_patient_summary->createdDate->cellAttributes() ?>>
<span id="el_view_dashboard_patient_summary_createdDate">
<span<?= $view_dashboard_patient_summary->createdDate->viewAttributes() ?>>
<?= $view_dashboard_patient_summary->createdDate->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
