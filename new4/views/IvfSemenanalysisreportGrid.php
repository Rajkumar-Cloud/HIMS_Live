<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("IvfSemenanalysisreportGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_semenanalysisreportgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fivf_semenanalysisreportgrid = new ew.Form("fivf_semenanalysisreportgrid", "grid");
    fivf_semenanalysisreportgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_semenanalysisreport")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_semenanalysisreport)
        ew.vars.tables.ivf_semenanalysisreport = currentTable;
    fivf_semenanalysisreportgrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null, ew.Validators.integer], fields.RIDNo.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["HusbandName", [fields.HusbandName.visible && fields.HusbandName.required ? ew.Validators.required(fields.HusbandName.caption) : null], fields.HusbandName.isInvalid],
        ["RequestDr", [fields.RequestDr.visible && fields.RequestDr.required ? ew.Validators.required(fields.RequestDr.caption) : null], fields.RequestDr.isInvalid],
        ["CollectionDate", [fields.CollectionDate.visible && fields.CollectionDate.required ? ew.Validators.required(fields.CollectionDate.caption) : null, ew.Validators.datetime(0)], fields.CollectionDate.isInvalid],
        ["ResultDate", [fields.ResultDate.visible && fields.ResultDate.required ? ew.Validators.required(fields.ResultDate.caption) : null, ew.Validators.datetime(0)], fields.ResultDate.isInvalid],
        ["RequestSample", [fields.RequestSample.visible && fields.RequestSample.required ? ew.Validators.required(fields.RequestSample.caption) : null], fields.RequestSample.isInvalid],
        ["CollectionType", [fields.CollectionType.visible && fields.CollectionType.required ? ew.Validators.required(fields.CollectionType.caption) : null], fields.CollectionType.isInvalid],
        ["CollectionMethod", [fields.CollectionMethod.visible && fields.CollectionMethod.required ? ew.Validators.required(fields.CollectionMethod.caption) : null], fields.CollectionMethod.isInvalid],
        ["Medicationused", [fields.Medicationused.visible && fields.Medicationused.required ? ew.Validators.required(fields.Medicationused.caption) : null], fields.Medicationused.isInvalid],
        ["DifficultiesinCollection", [fields.DifficultiesinCollection.visible && fields.DifficultiesinCollection.required ? ew.Validators.required(fields.DifficultiesinCollection.caption) : null], fields.DifficultiesinCollection.isInvalid],
        ["pH", [fields.pH.visible && fields.pH.required ? ew.Validators.required(fields.pH.caption) : null], fields.pH.isInvalid],
        ["Timeofcollection", [fields.Timeofcollection.visible && fields.Timeofcollection.required ? ew.Validators.required(fields.Timeofcollection.caption) : null], fields.Timeofcollection.isInvalid],
        ["Timeofexamination", [fields.Timeofexamination.visible && fields.Timeofexamination.required ? ew.Validators.required(fields.Timeofexamination.caption) : null], fields.Timeofexamination.isInvalid],
        ["Volume", [fields.Volume.visible && fields.Volume.required ? ew.Validators.required(fields.Volume.caption) : null], fields.Volume.isInvalid],
        ["Concentration", [fields.Concentration.visible && fields.Concentration.required ? ew.Validators.required(fields.Concentration.caption) : null], fields.Concentration.isInvalid],
        ["Total", [fields.Total.visible && fields.Total.required ? ew.Validators.required(fields.Total.caption) : null], fields.Total.isInvalid],
        ["ProgressiveMotility", [fields.ProgressiveMotility.visible && fields.ProgressiveMotility.required ? ew.Validators.required(fields.ProgressiveMotility.caption) : null], fields.ProgressiveMotility.isInvalid],
        ["NonProgrssiveMotile", [fields.NonProgrssiveMotile.visible && fields.NonProgrssiveMotile.required ? ew.Validators.required(fields.NonProgrssiveMotile.caption) : null], fields.NonProgrssiveMotile.isInvalid],
        ["Immotile", [fields.Immotile.visible && fields.Immotile.required ? ew.Validators.required(fields.Immotile.caption) : null], fields.Immotile.isInvalid],
        ["TotalProgrssiveMotile", [fields.TotalProgrssiveMotile.visible && fields.TotalProgrssiveMotile.required ? ew.Validators.required(fields.TotalProgrssiveMotile.caption) : null], fields.TotalProgrssiveMotile.isInvalid],
        ["Appearance", [fields.Appearance.visible && fields.Appearance.required ? ew.Validators.required(fields.Appearance.caption) : null], fields.Appearance.isInvalid],
        ["Homogenosity", [fields.Homogenosity.visible && fields.Homogenosity.required ? ew.Validators.required(fields.Homogenosity.caption) : null], fields.Homogenosity.isInvalid],
        ["CompleteSample", [fields.CompleteSample.visible && fields.CompleteSample.required ? ew.Validators.required(fields.CompleteSample.caption) : null], fields.CompleteSample.isInvalid],
        ["Liquefactiontime", [fields.Liquefactiontime.visible && fields.Liquefactiontime.required ? ew.Validators.required(fields.Liquefactiontime.caption) : null], fields.Liquefactiontime.isInvalid],
        ["Normal", [fields.Normal.visible && fields.Normal.required ? ew.Validators.required(fields.Normal.caption) : null], fields.Normal.isInvalid],
        ["Abnormal", [fields.Abnormal.visible && fields.Abnormal.required ? ew.Validators.required(fields.Abnormal.caption) : null], fields.Abnormal.isInvalid],
        ["Headdefects", [fields.Headdefects.visible && fields.Headdefects.required ? ew.Validators.required(fields.Headdefects.caption) : null], fields.Headdefects.isInvalid],
        ["MidpieceDefects", [fields.MidpieceDefects.visible && fields.MidpieceDefects.required ? ew.Validators.required(fields.MidpieceDefects.caption) : null], fields.MidpieceDefects.isInvalid],
        ["TailDefects", [fields.TailDefects.visible && fields.TailDefects.required ? ew.Validators.required(fields.TailDefects.caption) : null], fields.TailDefects.isInvalid],
        ["NormalProgMotile", [fields.NormalProgMotile.visible && fields.NormalProgMotile.required ? ew.Validators.required(fields.NormalProgMotile.caption) : null], fields.NormalProgMotile.isInvalid],
        ["ImmatureForms", [fields.ImmatureForms.visible && fields.ImmatureForms.required ? ew.Validators.required(fields.ImmatureForms.caption) : null], fields.ImmatureForms.isInvalid],
        ["Leucocytes", [fields.Leucocytes.visible && fields.Leucocytes.required ? ew.Validators.required(fields.Leucocytes.caption) : null], fields.Leucocytes.isInvalid],
        ["Agglutination", [fields.Agglutination.visible && fields.Agglutination.required ? ew.Validators.required(fields.Agglutination.caption) : null], fields.Agglutination.isInvalid],
        ["Debris", [fields.Debris.visible && fields.Debris.required ? ew.Validators.required(fields.Debris.caption) : null], fields.Debris.isInvalid],
        ["Diagnosis", [fields.Diagnosis.visible && fields.Diagnosis.required ? ew.Validators.required(fields.Diagnosis.caption) : null], fields.Diagnosis.isInvalid],
        ["Observations", [fields.Observations.visible && fields.Observations.required ? ew.Validators.required(fields.Observations.caption) : null], fields.Observations.isInvalid],
        ["Signature", [fields.Signature.visible && fields.Signature.required ? ew.Validators.required(fields.Signature.caption) : null], fields.Signature.isInvalid],
        ["SemenOrgin", [fields.SemenOrgin.visible && fields.SemenOrgin.required ? ew.Validators.required(fields.SemenOrgin.caption) : null], fields.SemenOrgin.isInvalid],
        ["Donor", [fields.Donor.visible && fields.Donor.required ? ew.Validators.required(fields.Donor.caption) : null], fields.Donor.isInvalid],
        ["DonorBloodgroup", [fields.DonorBloodgroup.visible && fields.DonorBloodgroup.required ? ew.Validators.required(fields.DonorBloodgroup.caption) : null], fields.DonorBloodgroup.isInvalid],
        ["Tank", [fields.Tank.visible && fields.Tank.required ? ew.Validators.required(fields.Tank.caption) : null], fields.Tank.isInvalid],
        ["Location", [fields.Location.visible && fields.Location.required ? ew.Validators.required(fields.Location.caption) : null], fields.Location.isInvalid],
        ["Volume1", [fields.Volume1.visible && fields.Volume1.required ? ew.Validators.required(fields.Volume1.caption) : null], fields.Volume1.isInvalid],
        ["Concentration1", [fields.Concentration1.visible && fields.Concentration1.required ? ew.Validators.required(fields.Concentration1.caption) : null], fields.Concentration1.isInvalid],
        ["Total1", [fields.Total1.visible && fields.Total1.required ? ew.Validators.required(fields.Total1.caption) : null], fields.Total1.isInvalid],
        ["ProgressiveMotility1", [fields.ProgressiveMotility1.visible && fields.ProgressiveMotility1.required ? ew.Validators.required(fields.ProgressiveMotility1.caption) : null], fields.ProgressiveMotility1.isInvalid],
        ["NonProgrssiveMotile1", [fields.NonProgrssiveMotile1.visible && fields.NonProgrssiveMotile1.required ? ew.Validators.required(fields.NonProgrssiveMotile1.caption) : null], fields.NonProgrssiveMotile1.isInvalid],
        ["Immotile1", [fields.Immotile1.visible && fields.Immotile1.required ? ew.Validators.required(fields.Immotile1.caption) : null], fields.Immotile1.isInvalid],
        ["TotalProgrssiveMotile1", [fields.TotalProgrssiveMotile1.visible && fields.TotalProgrssiveMotile1.required ? ew.Validators.required(fields.TotalProgrssiveMotile1.caption) : null], fields.TotalProgrssiveMotile1.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["Color", [fields.Color.visible && fields.Color.required ? ew.Validators.required(fields.Color.caption) : null], fields.Color.isInvalid],
        ["DoneBy", [fields.DoneBy.visible && fields.DoneBy.required ? ew.Validators.required(fields.DoneBy.caption) : null], fields.DoneBy.isInvalid],
        ["Method", [fields.Method.visible && fields.Method.required ? ew.Validators.required(fields.Method.caption) : null], fields.Method.isInvalid],
        ["Abstinence", [fields.Abstinence.visible && fields.Abstinence.required ? ew.Validators.required(fields.Abstinence.caption) : null], fields.Abstinence.isInvalid],
        ["ProcessedBy", [fields.ProcessedBy.visible && fields.ProcessedBy.required ? ew.Validators.required(fields.ProcessedBy.caption) : null], fields.ProcessedBy.isInvalid],
        ["InseminationTime", [fields.InseminationTime.visible && fields.InseminationTime.required ? ew.Validators.required(fields.InseminationTime.caption) : null], fields.InseminationTime.isInvalid],
        ["InseminationBy", [fields.InseminationBy.visible && fields.InseminationBy.required ? ew.Validators.required(fields.InseminationBy.caption) : null], fields.InseminationBy.isInvalid],
        ["Big", [fields.Big.visible && fields.Big.required ? ew.Validators.required(fields.Big.caption) : null], fields.Big.isInvalid],
        ["Medium", [fields.Medium.visible && fields.Medium.required ? ew.Validators.required(fields.Medium.caption) : null], fields.Medium.isInvalid],
        ["Small", [fields.Small.visible && fields.Small.required ? ew.Validators.required(fields.Small.caption) : null], fields.Small.isInvalid],
        ["NoHalo", [fields.NoHalo.visible && fields.NoHalo.required ? ew.Validators.required(fields.NoHalo.caption) : null], fields.NoHalo.isInvalid],
        ["Fragmented", [fields.Fragmented.visible && fields.Fragmented.required ? ew.Validators.required(fields.Fragmented.caption) : null], fields.Fragmented.isInvalid],
        ["NonFragmented", [fields.NonFragmented.visible && fields.NonFragmented.required ? ew.Validators.required(fields.NonFragmented.caption) : null], fields.NonFragmented.isInvalid],
        ["DFI", [fields.DFI.visible && fields.DFI.required ? ew.Validators.required(fields.DFI.caption) : null], fields.DFI.isInvalid],
        ["IsueBy", [fields.IsueBy.visible && fields.IsueBy.required ? ew.Validators.required(fields.IsueBy.caption) : null], fields.IsueBy.isInvalid],
        ["Volume2", [fields.Volume2.visible && fields.Volume2.required ? ew.Validators.required(fields.Volume2.caption) : null], fields.Volume2.isInvalid],
        ["Concentration2", [fields.Concentration2.visible && fields.Concentration2.required ? ew.Validators.required(fields.Concentration2.caption) : null], fields.Concentration2.isInvalid],
        ["Total2", [fields.Total2.visible && fields.Total2.required ? ew.Validators.required(fields.Total2.caption) : null], fields.Total2.isInvalid],
        ["ProgressiveMotility2", [fields.ProgressiveMotility2.visible && fields.ProgressiveMotility2.required ? ew.Validators.required(fields.ProgressiveMotility2.caption) : null], fields.ProgressiveMotility2.isInvalid],
        ["NonProgrssiveMotile2", [fields.NonProgrssiveMotile2.visible && fields.NonProgrssiveMotile2.required ? ew.Validators.required(fields.NonProgrssiveMotile2.caption) : null], fields.NonProgrssiveMotile2.isInvalid],
        ["Immotile2", [fields.Immotile2.visible && fields.Immotile2.required ? ew.Validators.required(fields.Immotile2.caption) : null], fields.Immotile2.isInvalid],
        ["TotalProgrssiveMotile2", [fields.TotalProgrssiveMotile2.visible && fields.TotalProgrssiveMotile2.required ? ew.Validators.required(fields.TotalProgrssiveMotile2.caption) : null], fields.TotalProgrssiveMotile2.isInvalid],
        ["IssuedBy", [fields.IssuedBy.visible && fields.IssuedBy.required ? ew.Validators.required(fields.IssuedBy.caption) : null], fields.IssuedBy.isInvalid],
        ["IssuedTo", [fields.IssuedTo.visible && fields.IssuedTo.required ? ew.Validators.required(fields.IssuedTo.caption) : null], fields.IssuedTo.isInvalid],
        ["PaID", [fields.PaID.visible && fields.PaID.required ? ew.Validators.required(fields.PaID.caption) : null], fields.PaID.isInvalid],
        ["PaName", [fields.PaName.visible && fields.PaName.required ? ew.Validators.required(fields.PaName.caption) : null], fields.PaName.isInvalid],
        ["PaMobile", [fields.PaMobile.visible && fields.PaMobile.required ? ew.Validators.required(fields.PaMobile.caption) : null], fields.PaMobile.isInvalid],
        ["PartnerID", [fields.PartnerID.visible && fields.PartnerID.required ? ew.Validators.required(fields.PartnerID.caption) : null], fields.PartnerID.isInvalid],
        ["PartnerName", [fields.PartnerName.visible && fields.PartnerName.required ? ew.Validators.required(fields.PartnerName.caption) : null], fields.PartnerName.isInvalid],
        ["PartnerMobile", [fields.PartnerMobile.visible && fields.PartnerMobile.required ? ew.Validators.required(fields.PartnerMobile.caption) : null], fields.PartnerMobile.isInvalid],
        ["PREG_TEST_DATE", [fields.PREG_TEST_DATE.visible && fields.PREG_TEST_DATE.required ? ew.Validators.required(fields.PREG_TEST_DATE.caption) : null, ew.Validators.datetime(0)], fields.PREG_TEST_DATE.isInvalid],
        ["SPECIFIC_PROBLEMS", [fields.SPECIFIC_PROBLEMS.visible && fields.SPECIFIC_PROBLEMS.required ? ew.Validators.required(fields.SPECIFIC_PROBLEMS.caption) : null], fields.SPECIFIC_PROBLEMS.isInvalid],
        ["IMSC_1", [fields.IMSC_1.visible && fields.IMSC_1.required ? ew.Validators.required(fields.IMSC_1.caption) : null], fields.IMSC_1.isInvalid],
        ["IMSC_2", [fields.IMSC_2.visible && fields.IMSC_2.required ? ew.Validators.required(fields.IMSC_2.caption) : null], fields.IMSC_2.isInvalid],
        ["LIQUIFACTION_STORAGE", [fields.LIQUIFACTION_STORAGE.visible && fields.LIQUIFACTION_STORAGE.required ? ew.Validators.required(fields.LIQUIFACTION_STORAGE.caption) : null], fields.LIQUIFACTION_STORAGE.isInvalid],
        ["IUI_PREP_METHOD", [fields.IUI_PREP_METHOD.visible && fields.IUI_PREP_METHOD.required ? ew.Validators.required(fields.IUI_PREP_METHOD.caption) : null], fields.IUI_PREP_METHOD.isInvalid],
        ["TIME_FROM_TRIGGER", [fields.TIME_FROM_TRIGGER.visible && fields.TIME_FROM_TRIGGER.required ? ew.Validators.required(fields.TIME_FROM_TRIGGER.caption) : null], fields.TIME_FROM_TRIGGER.isInvalid],
        ["COLLECTION_TO_PREPARATION", [fields.COLLECTION_TO_PREPARATION.visible && fields.COLLECTION_TO_PREPARATION.required ? ew.Validators.required(fields.COLLECTION_TO_PREPARATION.caption) : null], fields.COLLECTION_TO_PREPARATION.isInvalid],
        ["TIME_FROM_PREP_TO_INSEM", [fields.TIME_FROM_PREP_TO_INSEM.visible && fields.TIME_FROM_PREP_TO_INSEM.required ? ew.Validators.required(fields.TIME_FROM_PREP_TO_INSEM.caption) : null], fields.TIME_FROM_PREP_TO_INSEM.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_semenanalysisreportgrid,
            fobj = f.getForm(),
            $fobj = $(fobj),
            $k = $fobj.find("#" + f.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            f.setInvalid(rowIndex);
        }
    });

    // Validate form
    fivf_semenanalysisreportgrid.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        var addcnt = 0,
            $k = $fobj.find("#" + this.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1, // Check rowcnt == 0 => Inline-Add
            gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            $fobj.data("rowindex", rowIndex);
            var checkrow = (gridinsert) ? !this.emptyRow(rowIndex) : true;
            if (checkrow) {
                addcnt++;

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
            } // End Grid Add checking
        }
        return true;
    }

    // Check empty row
    fivf_semenanalysisreportgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "RIDNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HusbandName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RequestDr", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CollectionDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ResultDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RequestSample", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CollectionType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CollectionMethod", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Medicationused", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DifficultiesinCollection", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "pH", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Timeofcollection", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Timeofexamination", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Volume", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Concentration", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Total", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ProgressiveMotility", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NonProgrssiveMotile", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Immotile", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TotalProgrssiveMotile", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Appearance", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Homogenosity", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CompleteSample", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Liquefactiontime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Normal", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Abnormal", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Headdefects", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MidpieceDefects", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TailDefects", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NormalProgMotile", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ImmatureForms", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Leucocytes", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Agglutination", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Debris", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Diagnosis", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Observations", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Signature", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SemenOrgin", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Donor", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DonorBloodgroup", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Tank", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Location", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Volume1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Concentration1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Total1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ProgressiveMotility1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NonProgrssiveMotile1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Immotile1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TotalProgrssiveMotile1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TidNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Color", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DoneBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Method", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Abstinence", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ProcessedBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "InseminationTime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "InseminationBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Big", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Medium", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Small", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NoHalo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Fragmented", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NonFragmented", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DFI", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "IsueBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Volume2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Concentration2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Total2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ProgressiveMotility2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NonProgrssiveMotile2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Immotile2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TotalProgrssiveMotile2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "IssuedBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "IssuedTo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PaID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PaName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PaMobile", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PartnerID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PartnerName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PartnerMobile", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PREG_TEST_DATE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SPECIFIC_PROBLEMS", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "IMSC_1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "IMSC_2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "LIQUIFACTION_STORAGE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "IUI_PREP_METHOD", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TIME_FROM_TRIGGER", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "COLLECTION_TO_PREPARATION", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TIME_FROM_PREP_TO_INSEM", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fivf_semenanalysisreportgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_semenanalysisreportgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_semenanalysisreportgrid.lists.RequestSample = <?= $Grid->RequestSample->toClientList($Grid) ?>;
    fivf_semenanalysisreportgrid.lists.CollectionType = <?= $Grid->CollectionType->toClientList($Grid) ?>;
    fivf_semenanalysisreportgrid.lists.CollectionMethod = <?= $Grid->CollectionMethod->toClientList($Grid) ?>;
    fivf_semenanalysisreportgrid.lists.Medicationused = <?= $Grid->Medicationused->toClientList($Grid) ?>;
    fivf_semenanalysisreportgrid.lists.DifficultiesinCollection = <?= $Grid->DifficultiesinCollection->toClientList($Grid) ?>;
    fivf_semenanalysisreportgrid.lists.Homogenosity = <?= $Grid->Homogenosity->toClientList($Grid) ?>;
    fivf_semenanalysisreportgrid.lists.CompleteSample = <?= $Grid->CompleteSample->toClientList($Grid) ?>;
    fivf_semenanalysisreportgrid.lists.SemenOrgin = <?= $Grid->SemenOrgin->toClientList($Grid) ?>;
    fivf_semenanalysisreportgrid.lists.Donor = <?= $Grid->Donor->toClientList($Grid) ?>;
    fivf_semenanalysisreportgrid.lists.SPECIFIC_PROBLEMS = <?= $Grid->SPECIFIC_PROBLEMS->toClientList($Grid) ?>;
    fivf_semenanalysisreportgrid.lists.LIQUIFACTION_STORAGE = <?= $Grid->LIQUIFACTION_STORAGE->toClientList($Grid) ?>;
    fivf_semenanalysisreportgrid.lists.IUI_PREP_METHOD = <?= $Grid->IUI_PREP_METHOD->toClientList($Grid) ?>;
    fivf_semenanalysisreportgrid.lists.TIME_FROM_TRIGGER = <?= $Grid->TIME_FROM_TRIGGER->toClientList($Grid) ?>;
    fivf_semenanalysisreportgrid.lists.COLLECTION_TO_PREPARATION = <?= $Grid->COLLECTION_TO_PREPARATION->toClientList($Grid) ?>;
    loadjs.done("fivf_semenanalysisreportgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_semenanalysisreport">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_semenanalysisreportgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_semenanalysisreport" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_semenanalysisreportgrid" class="table ew-table"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Grid->RowType = ROWTYPE_HEADER;

// Render list options
$Grid->renderListOptions();

// Render list options (header, left)
$Grid->ListOptions->render("header", "left");
?>
<?php if ($Grid->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_id" class="ivf_semenanalysisreport_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->RIDNo->Visible) { // RIDNo ?>
        <th data-name="RIDNo" class="<?= $Grid->RIDNo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_RIDNo" class="ivf_semenanalysisreport_RIDNo"><?= $Grid->renderSort($Grid->RIDNo) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Grid->PatientName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PatientName" class="ivf_semenanalysisreport_PatientName"><?= $Grid->renderSort($Grid->PatientName) ?></div></th>
<?php } ?>
<?php if ($Grid->HusbandName->Visible) { // HusbandName ?>
        <th data-name="HusbandName" class="<?= $Grid->HusbandName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_HusbandName" class="ivf_semenanalysisreport_HusbandName"><?= $Grid->renderSort($Grid->HusbandName) ?></div></th>
<?php } ?>
<?php if ($Grid->RequestDr->Visible) { // RequestDr ?>
        <th data-name="RequestDr" class="<?= $Grid->RequestDr->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_RequestDr" class="ivf_semenanalysisreport_RequestDr"><?= $Grid->renderSort($Grid->RequestDr) ?></div></th>
<?php } ?>
<?php if ($Grid->CollectionDate->Visible) { // CollectionDate ?>
        <th data-name="CollectionDate" class="<?= $Grid->CollectionDate->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CollectionDate" class="ivf_semenanalysisreport_CollectionDate"><?= $Grid->renderSort($Grid->CollectionDate) ?></div></th>
<?php } ?>
<?php if ($Grid->ResultDate->Visible) { // ResultDate ?>
        <th data-name="ResultDate" class="<?= $Grid->ResultDate->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ResultDate" class="ivf_semenanalysisreport_ResultDate"><?= $Grid->renderSort($Grid->ResultDate) ?></div></th>
<?php } ?>
<?php if ($Grid->RequestSample->Visible) { // RequestSample ?>
        <th data-name="RequestSample" class="<?= $Grid->RequestSample->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_RequestSample" class="ivf_semenanalysisreport_RequestSample"><?= $Grid->renderSort($Grid->RequestSample) ?></div></th>
<?php } ?>
<?php if ($Grid->CollectionType->Visible) { // CollectionType ?>
        <th data-name="CollectionType" class="<?= $Grid->CollectionType->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CollectionType" class="ivf_semenanalysisreport_CollectionType"><?= $Grid->renderSort($Grid->CollectionType) ?></div></th>
<?php } ?>
<?php if ($Grid->CollectionMethod->Visible) { // CollectionMethod ?>
        <th data-name="CollectionMethod" class="<?= $Grid->CollectionMethod->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CollectionMethod" class="ivf_semenanalysisreport_CollectionMethod"><?= $Grid->renderSort($Grid->CollectionMethod) ?></div></th>
<?php } ?>
<?php if ($Grid->Medicationused->Visible) { // Medicationused ?>
        <th data-name="Medicationused" class="<?= $Grid->Medicationused->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Medicationused" class="ivf_semenanalysisreport_Medicationused"><?= $Grid->renderSort($Grid->Medicationused) ?></div></th>
<?php } ?>
<?php if ($Grid->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
        <th data-name="DifficultiesinCollection" class="<?= $Grid->DifficultiesinCollection->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DifficultiesinCollection" class="ivf_semenanalysisreport_DifficultiesinCollection"><?= $Grid->renderSort($Grid->DifficultiesinCollection) ?></div></th>
<?php } ?>
<?php if ($Grid->pH->Visible) { // pH ?>
        <th data-name="pH" class="<?= $Grid->pH->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_pH" class="ivf_semenanalysisreport_pH"><?= $Grid->renderSort($Grid->pH) ?></div></th>
<?php } ?>
<?php if ($Grid->Timeofcollection->Visible) { // Timeofcollection ?>
        <th data-name="Timeofcollection" class="<?= $Grid->Timeofcollection->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Timeofcollection" class="ivf_semenanalysisreport_Timeofcollection"><?= $Grid->renderSort($Grid->Timeofcollection) ?></div></th>
<?php } ?>
<?php if ($Grid->Timeofexamination->Visible) { // Timeofexamination ?>
        <th data-name="Timeofexamination" class="<?= $Grid->Timeofexamination->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Timeofexamination" class="ivf_semenanalysisreport_Timeofexamination"><?= $Grid->renderSort($Grid->Timeofexamination) ?></div></th>
<?php } ?>
<?php if ($Grid->Volume->Visible) { // Volume ?>
        <th data-name="Volume" class="<?= $Grid->Volume->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Volume" class="ivf_semenanalysisreport_Volume"><?= $Grid->renderSort($Grid->Volume) ?></div></th>
<?php } ?>
<?php if ($Grid->Concentration->Visible) { // Concentration ?>
        <th data-name="Concentration" class="<?= $Grid->Concentration->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Concentration" class="ivf_semenanalysisreport_Concentration"><?= $Grid->renderSort($Grid->Concentration) ?></div></th>
<?php } ?>
<?php if ($Grid->Total->Visible) { // Total ?>
        <th data-name="Total" class="<?= $Grid->Total->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Total" class="ivf_semenanalysisreport_Total"><?= $Grid->renderSort($Grid->Total) ?></div></th>
<?php } ?>
<?php if ($Grid->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
        <th data-name="ProgressiveMotility" class="<?= $Grid->ProgressiveMotility->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility" class="ivf_semenanalysisreport_ProgressiveMotility"><?= $Grid->renderSort($Grid->ProgressiveMotility) ?></div></th>
<?php } ?>
<?php if ($Grid->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
        <th data-name="NonProgrssiveMotile" class="<?= $Grid->NonProgrssiveMotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile" class="ivf_semenanalysisreport_NonProgrssiveMotile"><?= $Grid->renderSort($Grid->NonProgrssiveMotile) ?></div></th>
<?php } ?>
<?php if ($Grid->Immotile->Visible) { // Immotile ?>
        <th data-name="Immotile" class="<?= $Grid->Immotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Immotile" class="ivf_semenanalysisreport_Immotile"><?= $Grid->renderSort($Grid->Immotile) ?></div></th>
<?php } ?>
<?php if ($Grid->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
        <th data-name="TotalProgrssiveMotile" class="<?= $Grid->TotalProgrssiveMotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile" class="ivf_semenanalysisreport_TotalProgrssiveMotile"><?= $Grid->renderSort($Grid->TotalProgrssiveMotile) ?></div></th>
<?php } ?>
<?php if ($Grid->Appearance->Visible) { // Appearance ?>
        <th data-name="Appearance" class="<?= $Grid->Appearance->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Appearance" class="ivf_semenanalysisreport_Appearance"><?= $Grid->renderSort($Grid->Appearance) ?></div></th>
<?php } ?>
<?php if ($Grid->Homogenosity->Visible) { // Homogenosity ?>
        <th data-name="Homogenosity" class="<?= $Grid->Homogenosity->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Homogenosity" class="ivf_semenanalysisreport_Homogenosity"><?= $Grid->renderSort($Grid->Homogenosity) ?></div></th>
<?php } ?>
<?php if ($Grid->CompleteSample->Visible) { // CompleteSample ?>
        <th data-name="CompleteSample" class="<?= $Grid->CompleteSample->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CompleteSample" class="ivf_semenanalysisreport_CompleteSample"><?= $Grid->renderSort($Grid->CompleteSample) ?></div></th>
<?php } ?>
<?php if ($Grid->Liquefactiontime->Visible) { // Liquefactiontime ?>
        <th data-name="Liquefactiontime" class="<?= $Grid->Liquefactiontime->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Liquefactiontime" class="ivf_semenanalysisreport_Liquefactiontime"><?= $Grid->renderSort($Grid->Liquefactiontime) ?></div></th>
<?php } ?>
<?php if ($Grid->Normal->Visible) { // Normal ?>
        <th data-name="Normal" class="<?= $Grid->Normal->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Normal" class="ivf_semenanalysisreport_Normal"><?= $Grid->renderSort($Grid->Normal) ?></div></th>
<?php } ?>
<?php if ($Grid->Abnormal->Visible) { // Abnormal ?>
        <th data-name="Abnormal" class="<?= $Grid->Abnormal->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Abnormal" class="ivf_semenanalysisreport_Abnormal"><?= $Grid->renderSort($Grid->Abnormal) ?></div></th>
<?php } ?>
<?php if ($Grid->Headdefects->Visible) { // Headdefects ?>
        <th data-name="Headdefects" class="<?= $Grid->Headdefects->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Headdefects" class="ivf_semenanalysisreport_Headdefects"><?= $Grid->renderSort($Grid->Headdefects) ?></div></th>
<?php } ?>
<?php if ($Grid->MidpieceDefects->Visible) { // MidpieceDefects ?>
        <th data-name="MidpieceDefects" class="<?= $Grid->MidpieceDefects->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_MidpieceDefects" class="ivf_semenanalysisreport_MidpieceDefects"><?= $Grid->renderSort($Grid->MidpieceDefects) ?></div></th>
<?php } ?>
<?php if ($Grid->TailDefects->Visible) { // TailDefects ?>
        <th data-name="TailDefects" class="<?= $Grid->TailDefects->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TailDefects" class="ivf_semenanalysisreport_TailDefects"><?= $Grid->renderSort($Grid->TailDefects) ?></div></th>
<?php } ?>
<?php if ($Grid->NormalProgMotile->Visible) { // NormalProgMotile ?>
        <th data-name="NormalProgMotile" class="<?= $Grid->NormalProgMotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NormalProgMotile" class="ivf_semenanalysisreport_NormalProgMotile"><?= $Grid->renderSort($Grid->NormalProgMotile) ?></div></th>
<?php } ?>
<?php if ($Grid->ImmatureForms->Visible) { // ImmatureForms ?>
        <th data-name="ImmatureForms" class="<?= $Grid->ImmatureForms->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ImmatureForms" class="ivf_semenanalysisreport_ImmatureForms"><?= $Grid->renderSort($Grid->ImmatureForms) ?></div></th>
<?php } ?>
<?php if ($Grid->Leucocytes->Visible) { // Leucocytes ?>
        <th data-name="Leucocytes" class="<?= $Grid->Leucocytes->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Leucocytes" class="ivf_semenanalysisreport_Leucocytes"><?= $Grid->renderSort($Grid->Leucocytes) ?></div></th>
<?php } ?>
<?php if ($Grid->Agglutination->Visible) { // Agglutination ?>
        <th data-name="Agglutination" class="<?= $Grid->Agglutination->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Agglutination" class="ivf_semenanalysisreport_Agglutination"><?= $Grid->renderSort($Grid->Agglutination) ?></div></th>
<?php } ?>
<?php if ($Grid->Debris->Visible) { // Debris ?>
        <th data-name="Debris" class="<?= $Grid->Debris->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Debris" class="ivf_semenanalysisreport_Debris"><?= $Grid->renderSort($Grid->Debris) ?></div></th>
<?php } ?>
<?php if ($Grid->Diagnosis->Visible) { // Diagnosis ?>
        <th data-name="Diagnosis" class="<?= $Grid->Diagnosis->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Diagnosis" class="ivf_semenanalysisreport_Diagnosis"><?= $Grid->renderSort($Grid->Diagnosis) ?></div></th>
<?php } ?>
<?php if ($Grid->Observations->Visible) { // Observations ?>
        <th data-name="Observations" class="<?= $Grid->Observations->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Observations" class="ivf_semenanalysisreport_Observations"><?= $Grid->renderSort($Grid->Observations) ?></div></th>
<?php } ?>
<?php if ($Grid->Signature->Visible) { // Signature ?>
        <th data-name="Signature" class="<?= $Grid->Signature->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Signature" class="ivf_semenanalysisreport_Signature"><?= $Grid->renderSort($Grid->Signature) ?></div></th>
<?php } ?>
<?php if ($Grid->SemenOrgin->Visible) { // SemenOrgin ?>
        <th data-name="SemenOrgin" class="<?= $Grid->SemenOrgin->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_SemenOrgin" class="ivf_semenanalysisreport_SemenOrgin"><?= $Grid->renderSort($Grid->SemenOrgin) ?></div></th>
<?php } ?>
<?php if ($Grid->Donor->Visible) { // Donor ?>
        <th data-name="Donor" class="<?= $Grid->Donor->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Donor" class="ivf_semenanalysisreport_Donor"><?= $Grid->renderSort($Grid->Donor) ?></div></th>
<?php } ?>
<?php if ($Grid->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
        <th data-name="DonorBloodgroup" class="<?= $Grid->DonorBloodgroup->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DonorBloodgroup" class="ivf_semenanalysisreport_DonorBloodgroup"><?= $Grid->renderSort($Grid->DonorBloodgroup) ?></div></th>
<?php } ?>
<?php if ($Grid->Tank->Visible) { // Tank ?>
        <th data-name="Tank" class="<?= $Grid->Tank->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Tank" class="ivf_semenanalysisreport_Tank"><?= $Grid->renderSort($Grid->Tank) ?></div></th>
<?php } ?>
<?php if ($Grid->Location->Visible) { // Location ?>
        <th data-name="Location" class="<?= $Grid->Location->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Location" class="ivf_semenanalysisreport_Location"><?= $Grid->renderSort($Grid->Location) ?></div></th>
<?php } ?>
<?php if ($Grid->Volume1->Visible) { // Volume1 ?>
        <th data-name="Volume1" class="<?= $Grid->Volume1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Volume1" class="ivf_semenanalysisreport_Volume1"><?= $Grid->renderSort($Grid->Volume1) ?></div></th>
<?php } ?>
<?php if ($Grid->Concentration1->Visible) { // Concentration1 ?>
        <th data-name="Concentration1" class="<?= $Grid->Concentration1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Concentration1" class="ivf_semenanalysisreport_Concentration1"><?= $Grid->renderSort($Grid->Concentration1) ?></div></th>
<?php } ?>
<?php if ($Grid->Total1->Visible) { // Total1 ?>
        <th data-name="Total1" class="<?= $Grid->Total1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Total1" class="ivf_semenanalysisreport_Total1"><?= $Grid->renderSort($Grid->Total1) ?></div></th>
<?php } ?>
<?php if ($Grid->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
        <th data-name="ProgressiveMotility1" class="<?= $Grid->ProgressiveMotility1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility1" class="ivf_semenanalysisreport_ProgressiveMotility1"><?= $Grid->renderSort($Grid->ProgressiveMotility1) ?></div></th>
<?php } ?>
<?php if ($Grid->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
        <th data-name="NonProgrssiveMotile1" class="<?= $Grid->NonProgrssiveMotile1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile1" class="ivf_semenanalysisreport_NonProgrssiveMotile1"><?= $Grid->renderSort($Grid->NonProgrssiveMotile1) ?></div></th>
<?php } ?>
<?php if ($Grid->Immotile1->Visible) { // Immotile1 ?>
        <th data-name="Immotile1" class="<?= $Grid->Immotile1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Immotile1" class="ivf_semenanalysisreport_Immotile1"><?= $Grid->renderSort($Grid->Immotile1) ?></div></th>
<?php } ?>
<?php if ($Grid->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
        <th data-name="TotalProgrssiveMotile1" class="<?= $Grid->TotalProgrssiveMotile1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="ivf_semenanalysisreport_TotalProgrssiveMotile1"><?= $Grid->renderSort($Grid->TotalProgrssiveMotile1) ?></div></th>
<?php } ?>
<?php if ($Grid->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Grid->TidNo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TidNo" class="ivf_semenanalysisreport_TidNo"><?= $Grid->renderSort($Grid->TidNo) ?></div></th>
<?php } ?>
<?php if ($Grid->Color->Visible) { // Color ?>
        <th data-name="Color" class="<?= $Grid->Color->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Color" class="ivf_semenanalysisreport_Color"><?= $Grid->renderSort($Grid->Color) ?></div></th>
<?php } ?>
<?php if ($Grid->DoneBy->Visible) { // DoneBy ?>
        <th data-name="DoneBy" class="<?= $Grid->DoneBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DoneBy" class="ivf_semenanalysisreport_DoneBy"><?= $Grid->renderSort($Grid->DoneBy) ?></div></th>
<?php } ?>
<?php if ($Grid->Method->Visible) { // Method ?>
        <th data-name="Method" class="<?= $Grid->Method->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Method" class="ivf_semenanalysisreport_Method"><?= $Grid->renderSort($Grid->Method) ?></div></th>
<?php } ?>
<?php if ($Grid->Abstinence->Visible) { // Abstinence ?>
        <th data-name="Abstinence" class="<?= $Grid->Abstinence->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Abstinence" class="ivf_semenanalysisreport_Abstinence"><?= $Grid->renderSort($Grid->Abstinence) ?></div></th>
<?php } ?>
<?php if ($Grid->ProcessedBy->Visible) { // ProcessedBy ?>
        <th data-name="ProcessedBy" class="<?= $Grid->ProcessedBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProcessedBy" class="ivf_semenanalysisreport_ProcessedBy"><?= $Grid->renderSort($Grid->ProcessedBy) ?></div></th>
<?php } ?>
<?php if ($Grid->InseminationTime->Visible) { // InseminationTime ?>
        <th data-name="InseminationTime" class="<?= $Grid->InseminationTime->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_InseminationTime" class="ivf_semenanalysisreport_InseminationTime"><?= $Grid->renderSort($Grid->InseminationTime) ?></div></th>
<?php } ?>
<?php if ($Grid->InseminationBy->Visible) { // InseminationBy ?>
        <th data-name="InseminationBy" class="<?= $Grid->InseminationBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_InseminationBy" class="ivf_semenanalysisreport_InseminationBy"><?= $Grid->renderSort($Grid->InseminationBy) ?></div></th>
<?php } ?>
<?php if ($Grid->Big->Visible) { // Big ?>
        <th data-name="Big" class="<?= $Grid->Big->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Big" class="ivf_semenanalysisreport_Big"><?= $Grid->renderSort($Grid->Big) ?></div></th>
<?php } ?>
<?php if ($Grid->Medium->Visible) { // Medium ?>
        <th data-name="Medium" class="<?= $Grid->Medium->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Medium" class="ivf_semenanalysisreport_Medium"><?= $Grid->renderSort($Grid->Medium) ?></div></th>
<?php } ?>
<?php if ($Grid->Small->Visible) { // Small ?>
        <th data-name="Small" class="<?= $Grid->Small->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Small" class="ivf_semenanalysisreport_Small"><?= $Grid->renderSort($Grid->Small) ?></div></th>
<?php } ?>
<?php if ($Grid->NoHalo->Visible) { // NoHalo ?>
        <th data-name="NoHalo" class="<?= $Grid->NoHalo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NoHalo" class="ivf_semenanalysisreport_NoHalo"><?= $Grid->renderSort($Grid->NoHalo) ?></div></th>
<?php } ?>
<?php if ($Grid->Fragmented->Visible) { // Fragmented ?>
        <th data-name="Fragmented" class="<?= $Grid->Fragmented->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Fragmented" class="ivf_semenanalysisreport_Fragmented"><?= $Grid->renderSort($Grid->Fragmented) ?></div></th>
<?php } ?>
<?php if ($Grid->NonFragmented->Visible) { // NonFragmented ?>
        <th data-name="NonFragmented" class="<?= $Grid->NonFragmented->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonFragmented" class="ivf_semenanalysisreport_NonFragmented"><?= $Grid->renderSort($Grid->NonFragmented) ?></div></th>
<?php } ?>
<?php if ($Grid->DFI->Visible) { // DFI ?>
        <th data-name="DFI" class="<?= $Grid->DFI->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DFI" class="ivf_semenanalysisreport_DFI"><?= $Grid->renderSort($Grid->DFI) ?></div></th>
<?php } ?>
<?php if ($Grid->IsueBy->Visible) { // IsueBy ?>
        <th data-name="IsueBy" class="<?= $Grid->IsueBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IsueBy" class="ivf_semenanalysisreport_IsueBy"><?= $Grid->renderSort($Grid->IsueBy) ?></div></th>
<?php } ?>
<?php if ($Grid->Volume2->Visible) { // Volume2 ?>
        <th data-name="Volume2" class="<?= $Grid->Volume2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Volume2" class="ivf_semenanalysisreport_Volume2"><?= $Grid->renderSort($Grid->Volume2) ?></div></th>
<?php } ?>
<?php if ($Grid->Concentration2->Visible) { // Concentration2 ?>
        <th data-name="Concentration2" class="<?= $Grid->Concentration2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Concentration2" class="ivf_semenanalysisreport_Concentration2"><?= $Grid->renderSort($Grid->Concentration2) ?></div></th>
<?php } ?>
<?php if ($Grid->Total2->Visible) { // Total2 ?>
        <th data-name="Total2" class="<?= $Grid->Total2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Total2" class="ivf_semenanalysisreport_Total2"><?= $Grid->renderSort($Grid->Total2) ?></div></th>
<?php } ?>
<?php if ($Grid->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
        <th data-name="ProgressiveMotility2" class="<?= $Grid->ProgressiveMotility2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility2" class="ivf_semenanalysisreport_ProgressiveMotility2"><?= $Grid->renderSort($Grid->ProgressiveMotility2) ?></div></th>
<?php } ?>
<?php if ($Grid->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
        <th data-name="NonProgrssiveMotile2" class="<?= $Grid->NonProgrssiveMotile2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile2" class="ivf_semenanalysisreport_NonProgrssiveMotile2"><?= $Grid->renderSort($Grid->NonProgrssiveMotile2) ?></div></th>
<?php } ?>
<?php if ($Grid->Immotile2->Visible) { // Immotile2 ?>
        <th data-name="Immotile2" class="<?= $Grid->Immotile2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Immotile2" class="ivf_semenanalysisreport_Immotile2"><?= $Grid->renderSort($Grid->Immotile2) ?></div></th>
<?php } ?>
<?php if ($Grid->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
        <th data-name="TotalProgrssiveMotile2" class="<?= $Grid->TotalProgrssiveMotile2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="ivf_semenanalysisreport_TotalProgrssiveMotile2"><?= $Grid->renderSort($Grid->TotalProgrssiveMotile2) ?></div></th>
<?php } ?>
<?php if ($Grid->IssuedBy->Visible) { // IssuedBy ?>
        <th data-name="IssuedBy" class="<?= $Grid->IssuedBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IssuedBy" class="ivf_semenanalysisreport_IssuedBy"><?= $Grid->renderSort($Grid->IssuedBy) ?></div></th>
<?php } ?>
<?php if ($Grid->IssuedTo->Visible) { // IssuedTo ?>
        <th data-name="IssuedTo" class="<?= $Grid->IssuedTo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IssuedTo" class="ivf_semenanalysisreport_IssuedTo"><?= $Grid->renderSort($Grid->IssuedTo) ?></div></th>
<?php } ?>
<?php if ($Grid->PaID->Visible) { // PaID ?>
        <th data-name="PaID" class="<?= $Grid->PaID->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PaID" class="ivf_semenanalysisreport_PaID"><?= $Grid->renderSort($Grid->PaID) ?></div></th>
<?php } ?>
<?php if ($Grid->PaName->Visible) { // PaName ?>
        <th data-name="PaName" class="<?= $Grid->PaName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PaName" class="ivf_semenanalysisreport_PaName"><?= $Grid->renderSort($Grid->PaName) ?></div></th>
<?php } ?>
<?php if ($Grid->PaMobile->Visible) { // PaMobile ?>
        <th data-name="PaMobile" class="<?= $Grid->PaMobile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PaMobile" class="ivf_semenanalysisreport_PaMobile"><?= $Grid->renderSort($Grid->PaMobile) ?></div></th>
<?php } ?>
<?php if ($Grid->PartnerID->Visible) { // PartnerID ?>
        <th data-name="PartnerID" class="<?= $Grid->PartnerID->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PartnerID" class="ivf_semenanalysisreport_PartnerID"><?= $Grid->renderSort($Grid->PartnerID) ?></div></th>
<?php } ?>
<?php if ($Grid->PartnerName->Visible) { // PartnerName ?>
        <th data-name="PartnerName" class="<?= $Grid->PartnerName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PartnerName" class="ivf_semenanalysisreport_PartnerName"><?= $Grid->renderSort($Grid->PartnerName) ?></div></th>
<?php } ?>
<?php if ($Grid->PartnerMobile->Visible) { // PartnerMobile ?>
        <th data-name="PartnerMobile" class="<?= $Grid->PartnerMobile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PartnerMobile" class="ivf_semenanalysisreport_PartnerMobile"><?= $Grid->renderSort($Grid->PartnerMobile) ?></div></th>
<?php } ?>
<?php if ($Grid->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
        <th data-name="PREG_TEST_DATE" class="<?= $Grid->PREG_TEST_DATE->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PREG_TEST_DATE" class="ivf_semenanalysisreport_PREG_TEST_DATE"><?= $Grid->renderSort($Grid->PREG_TEST_DATE) ?></div></th>
<?php } ?>
<?php if ($Grid->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
        <th data-name="SPECIFIC_PROBLEMS" class="<?= $Grid->SPECIFIC_PROBLEMS->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="ivf_semenanalysisreport_SPECIFIC_PROBLEMS"><?= $Grid->renderSort($Grid->SPECIFIC_PROBLEMS) ?></div></th>
<?php } ?>
<?php if ($Grid->IMSC_1->Visible) { // IMSC_1 ?>
        <th data-name="IMSC_1" class="<?= $Grid->IMSC_1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IMSC_1" class="ivf_semenanalysisreport_IMSC_1"><?= $Grid->renderSort($Grid->IMSC_1) ?></div></th>
<?php } ?>
<?php if ($Grid->IMSC_2->Visible) { // IMSC_2 ?>
        <th data-name="IMSC_2" class="<?= $Grid->IMSC_2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IMSC_2" class="ivf_semenanalysisreport_IMSC_2"><?= $Grid->renderSort($Grid->IMSC_2) ?></div></th>
<?php } ?>
<?php if ($Grid->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
        <th data-name="LIQUIFACTION_STORAGE" class="<?= $Grid->LIQUIFACTION_STORAGE->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="ivf_semenanalysisreport_LIQUIFACTION_STORAGE"><?= $Grid->renderSort($Grid->LIQUIFACTION_STORAGE) ?></div></th>
<?php } ?>
<?php if ($Grid->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
        <th data-name="IUI_PREP_METHOD" class="<?= $Grid->IUI_PREP_METHOD->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IUI_PREP_METHOD" class="ivf_semenanalysisreport_IUI_PREP_METHOD"><?= $Grid->renderSort($Grid->IUI_PREP_METHOD) ?></div></th>
<?php } ?>
<?php if ($Grid->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
        <th data-name="TIME_FROM_TRIGGER" class="<?= $Grid->TIME_FROM_TRIGGER->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="ivf_semenanalysisreport_TIME_FROM_TRIGGER"><?= $Grid->renderSort($Grid->TIME_FROM_TRIGGER) ?></div></th>
<?php } ?>
<?php if ($Grid->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
        <th data-name="COLLECTION_TO_PREPARATION" class="<?= $Grid->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="ivf_semenanalysisreport_COLLECTION_TO_PREPARATION"><?= $Grid->renderSort($Grid->COLLECTION_TO_PREPARATION) ?></div></th>
<?php } ?>
<?php if ($Grid->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
        <th data-name="TIME_FROM_PREP_TO_INSEM" class="<?= $Grid->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM"><?= $Grid->renderSort($Grid->TIME_FROM_PREP_TO_INSEM) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Grid->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody>
<?php
$Grid->StartRecord = 1;
$Grid->StopRecord = $Grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($Grid->isConfirm() || $Grid->EventCancelled)) {
    $CurrentForm->Index = -1;
    if ($CurrentForm->hasValue($Grid->FormKeyCountName) && ($Grid->isGridAdd() || $Grid->isGridEdit() || $Grid->isConfirm())) {
        $Grid->KeyCount = $CurrentForm->getValue($Grid->FormKeyCountName);
        $Grid->StopRecord = $Grid->StartRecord + $Grid->KeyCount - 1;
    }
}
$Grid->RecordCount = $Grid->StartRecord - 1;
if ($Grid->Recordset && !$Grid->Recordset->EOF) {
    // Nothing to do
} elseif (!$Grid->AllowAddDeleteRow && $Grid->StopRecord == 0) {
    $Grid->StopRecord = $Grid->GridAddRowCount;
}

// Initialize aggregate
$Grid->RowType = ROWTYPE_AGGREGATEINIT;
$Grid->resetAttributes();
$Grid->renderRow();
if ($Grid->isGridAdd())
    $Grid->RowIndex = 0;
if ($Grid->isGridEdit())
    $Grid->RowIndex = 0;
while ($Grid->RecordCount < $Grid->StopRecord) {
    $Grid->RecordCount++;
    if ($Grid->RecordCount >= $Grid->StartRecord) {
        $Grid->RowCount++;
        if ($Grid->isGridAdd() || $Grid->isGridEdit() || $Grid->isConfirm()) {
            $Grid->RowIndex++;
            $CurrentForm->Index = $Grid->RowIndex;
            if ($CurrentForm->hasValue($Grid->FormActionName) && ($Grid->isConfirm() || $Grid->EventCancelled)) {
                $Grid->RowAction = strval($CurrentForm->getValue($Grid->FormActionName));
            } elseif ($Grid->isGridAdd()) {
                $Grid->RowAction = "insert";
            } else {
                $Grid->RowAction = "";
            }
        }

        // Set up key count
        $Grid->KeyCount = $Grid->RowIndex;

        // Init row class and style
        $Grid->resetAttributes();
        $Grid->CssClass = "";
        if ($Grid->isGridAdd()) {
            if ($Grid->CurrentMode == "copy") {
                $Grid->loadRowValues($Grid->Recordset); // Load row values
                $Grid->OldKey = $Grid->getKey(true); // Get from CurrentValue
            } else {
                $Grid->loadRowValues(); // Load default values
                $Grid->OldKey = "";
            }
        } else {
            $Grid->loadRowValues($Grid->Recordset); // Load row values
            $Grid->OldKey = $Grid->getKey(true); // Get from CurrentValue
        }
        $Grid->setKey($Grid->OldKey);
        $Grid->RowType = ROWTYPE_VIEW; // Render view
        if ($Grid->isGridAdd()) { // Grid add
            $Grid->RowType = ROWTYPE_ADD; // Render add
        }
        if ($Grid->isGridAdd() && $Grid->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) { // Insert failed
            $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
        }
        if ($Grid->isGridEdit()) { // Grid edit
            if ($Grid->EventCancelled) {
                $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
            }
            if ($Grid->RowAction == "insert") {
                $Grid->RowType = ROWTYPE_ADD; // Render add
            } else {
                $Grid->RowType = ROWTYPE_EDIT; // Render edit
            }
        }
        if ($Grid->isGridEdit() && ($Grid->RowType == ROWTYPE_EDIT || $Grid->RowType == ROWTYPE_ADD) && $Grid->EventCancelled) { // Update failed
            $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
        }
        if ($Grid->RowType == ROWTYPE_EDIT) { // Edit row
            $Grid->EditRowCount++;
        }
        if ($Grid->isConfirm()) { // Confirm row
            $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
        }

        // Set up row id / data-rowindex
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_ivf_semenanalysisreport", "data-rowtype" => $Grid->RowType]);

        // Render row
        $Grid->renderRow();

        // Render list options
        $Grid->renderListOptions();

        // Skip delete row / empty row for confirm page
        if ($Grid->RowAction != "delete" && $Grid->RowAction != "insertdelete" && !($Grid->RowAction == "insert" && $Grid->isConfirm() && $Grid->emptyRow())) {
?>
    <tr <?= $Grid->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Grid->ListOptions->render("body", "left", $Grid->RowCount);
?>
    <?php if ($Grid->id->Visible) { // id ?>
        <td data-name="id" <?= $Grid->id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_id" class="form-group"></span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_id" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_id" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo" <?= $Grid->RIDNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->RIDNo->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_RIDNo" class="form-group">
<span<?= $Grid->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RIDNo->getDisplayValue($Grid->RIDNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_RIDNo" name="x<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_RIDNo" class="form-group">
<input type="<?= $Grid->RIDNo->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="x<?= $Grid->RowIndex ?>_RIDNo" id="x<?= $Grid->RowIndex ?>_RIDNo" size="30" placeholder="<?= HtmlEncode($Grid->RIDNo->getPlaceHolder()) ?>" value="<?= $Grid->RIDNo->EditValue ?>"<?= $Grid->RIDNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RIDNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RIDNo" id="o<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->RIDNo->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_RIDNo" class="form-group">
<span<?= $Grid->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RIDNo->getDisplayValue($Grid->RIDNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_RIDNo" name="x<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_RIDNo" class="form-group">
<input type="<?= $Grid->RIDNo->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="x<?= $Grid->RowIndex ?>_RIDNo" id="x<?= $Grid->RowIndex ?>_RIDNo" size="30" placeholder="<?= HtmlEncode($Grid->RIDNo->getPlaceHolder()) ?>" value="<?= $Grid->RIDNo->EditValue ?>"<?= $Grid->RIDNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RIDNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_RIDNo">
<span<?= $Grid->RIDNo->viewAttributes() ?>>
<?= $Grid->RIDNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_RIDNo" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_RIDNo" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Grid->PatientName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->PatientName->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PatientName" class="form-group">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientName->getDisplayValue($Grid->PatientName->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->PatientName->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PatientName" class="form-group">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientName->getDisplayValue($Grid->PatientName->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<?= $Grid->PatientName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_PatientName" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_PatientName" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HusbandName->Visible) { // HusbandName ?>
        <td data-name="HusbandName" <?= $Grid->HusbandName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_HusbandName" class="form-group">
<input type="<?= $Grid->HusbandName->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="x<?= $Grid->RowIndex ?>_HusbandName" id="x<?= $Grid->RowIndex ?>_HusbandName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->HusbandName->getPlaceHolder()) ?>" value="<?= $Grid->HusbandName->EditValue ?>"<?= $Grid->HusbandName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HusbandName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HusbandName" id="o<?= $Grid->RowIndex ?>_HusbandName" value="<?= HtmlEncode($Grid->HusbandName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_HusbandName" class="form-group">
<input type="<?= $Grid->HusbandName->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="x<?= $Grid->RowIndex ?>_HusbandName" id="x<?= $Grid->RowIndex ?>_HusbandName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->HusbandName->getPlaceHolder()) ?>" value="<?= $Grid->HusbandName->EditValue ?>"<?= $Grid->HusbandName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HusbandName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_HusbandName">
<span<?= $Grid->HusbandName->viewAttributes() ?>>
<?= $Grid->HusbandName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_HusbandName" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_HusbandName" value="<?= HtmlEncode($Grid->HusbandName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_HusbandName" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_HusbandName" value="<?= HtmlEncode($Grid->HusbandName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->RequestDr->Visible) { // RequestDr ?>
        <td data-name="RequestDr" <?= $Grid->RequestDr->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_RequestDr" class="form-group">
<input type="<?= $Grid->RequestDr->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="x<?= $Grid->RowIndex ?>_RequestDr" id="x<?= $Grid->RowIndex ?>_RequestDr" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RequestDr->getPlaceHolder()) ?>" value="<?= $Grid->RequestDr->EditValue ?>"<?= $Grid->RequestDr->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RequestDr->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RequestDr" id="o<?= $Grid->RowIndex ?>_RequestDr" value="<?= HtmlEncode($Grid->RequestDr->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_RequestDr" class="form-group">
<input type="<?= $Grid->RequestDr->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="x<?= $Grid->RowIndex ?>_RequestDr" id="x<?= $Grid->RowIndex ?>_RequestDr" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RequestDr->getPlaceHolder()) ?>" value="<?= $Grid->RequestDr->EditValue ?>"<?= $Grid->RequestDr->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RequestDr->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_RequestDr">
<span<?= $Grid->RequestDr->viewAttributes() ?>>
<?= $Grid->RequestDr->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_RequestDr" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_RequestDr" value="<?= HtmlEncode($Grid->RequestDr->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_RequestDr" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_RequestDr" value="<?= HtmlEncode($Grid->RequestDr->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CollectionDate->Visible) { // CollectionDate ?>
        <td data-name="CollectionDate" <?= $Grid->CollectionDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_CollectionDate" class="form-group">
<input type="<?= $Grid->CollectionDate->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="x<?= $Grid->RowIndex ?>_CollectionDate" id="x<?= $Grid->RowIndex ?>_CollectionDate" placeholder="<?= HtmlEncode($Grid->CollectionDate->getPlaceHolder()) ?>" value="<?= $Grid->CollectionDate->EditValue ?>"<?= $Grid->CollectionDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CollectionDate->getErrorMessage() ?></div>
<?php if (!$Grid->CollectionDate->ReadOnly && !$Grid->CollectionDate->Disabled && !isset($Grid->CollectionDate->EditAttrs["readonly"]) && !isset($Grid->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?= $Grid->RowIndex ?>_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CollectionDate" id="o<?= $Grid->RowIndex ?>_CollectionDate" value="<?= HtmlEncode($Grid->CollectionDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_CollectionDate" class="form-group">
<input type="<?= $Grid->CollectionDate->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="x<?= $Grid->RowIndex ?>_CollectionDate" id="x<?= $Grid->RowIndex ?>_CollectionDate" placeholder="<?= HtmlEncode($Grid->CollectionDate->getPlaceHolder()) ?>" value="<?= $Grid->CollectionDate->EditValue ?>"<?= $Grid->CollectionDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CollectionDate->getErrorMessage() ?></div>
<?php if (!$Grid->CollectionDate->ReadOnly && !$Grid->CollectionDate->Disabled && !isset($Grid->CollectionDate->EditAttrs["readonly"]) && !isset($Grid->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?= $Grid->RowIndex ?>_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_CollectionDate">
<span<?= $Grid->CollectionDate->viewAttributes() ?>>
<?= $Grid->CollectionDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_CollectionDate" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_CollectionDate" value="<?= HtmlEncode($Grid->CollectionDate->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_CollectionDate" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_CollectionDate" value="<?= HtmlEncode($Grid->CollectionDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate" <?= $Grid->ResultDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_ResultDate" class="form-group">
<input type="<?= $Grid->ResultDate->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="x<?= $Grid->RowIndex ?>_ResultDate" id="x<?= $Grid->RowIndex ?>_ResultDate" placeholder="<?= HtmlEncode($Grid->ResultDate->getPlaceHolder()) ?>" value="<?= $Grid->ResultDate->EditValue ?>"<?= $Grid->ResultDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResultDate->getErrorMessage() ?></div>
<?php if (!$Grid->ResultDate->ReadOnly && !$Grid->ResultDate->Disabled && !isset($Grid->ResultDate->EditAttrs["readonly"]) && !isset($Grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?= $Grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResultDate" id="o<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_ResultDate" class="form-group">
<input type="<?= $Grid->ResultDate->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="x<?= $Grid->RowIndex ?>_ResultDate" id="x<?= $Grid->RowIndex ?>_ResultDate" placeholder="<?= HtmlEncode($Grid->ResultDate->getPlaceHolder()) ?>" value="<?= $Grid->ResultDate->EditValue ?>"<?= $Grid->ResultDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResultDate->getErrorMessage() ?></div>
<?php if (!$Grid->ResultDate->ReadOnly && !$Grid->ResultDate->Disabled && !isset($Grid->ResultDate->EditAttrs["readonly"]) && !isset($Grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?= $Grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_ResultDate">
<span<?= $Grid->ResultDate->viewAttributes() ?>>
<?= $Grid->ResultDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_ResultDate" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_ResultDate" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->RequestSample->Visible) { // RequestSample ?>
        <td data-name="RequestSample" <?= $Grid->RequestSample->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_RequestSample" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_RequestSample"
        name="x<?= $Grid->RowIndex ?>_RequestSample"
        class="form-control ew-select<?= $Grid->RequestSample->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_RequestSample"
        data-table="ivf_semenanalysisreport"
        data-field="x_RequestSample"
        data-value-separator="<?= $Grid->RequestSample->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->RequestSample->getPlaceHolder()) ?>"
        <?= $Grid->RequestSample->editAttributes() ?>>
        <?= $Grid->RequestSample->selectOptionListHtml("x{$Grid->RowIndex}_RequestSample") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->RequestSample->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_RequestSample']"),
        options = { name: "x<?= $Grid->RowIndex ?>_RequestSample", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_RequestSample", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.RequestSample.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.RequestSample.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RequestSample" id="o<?= $Grid->RowIndex ?>_RequestSample" value="<?= HtmlEncode($Grid->RequestSample->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_RequestSample" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_RequestSample"
        name="x<?= $Grid->RowIndex ?>_RequestSample"
        class="form-control ew-select<?= $Grid->RequestSample->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_RequestSample"
        data-table="ivf_semenanalysisreport"
        data-field="x_RequestSample"
        data-value-separator="<?= $Grid->RequestSample->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->RequestSample->getPlaceHolder()) ?>"
        <?= $Grid->RequestSample->editAttributes() ?>>
        <?= $Grid->RequestSample->selectOptionListHtml("x{$Grid->RowIndex}_RequestSample") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->RequestSample->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_RequestSample']"),
        options = { name: "x<?= $Grid->RowIndex ?>_RequestSample", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_RequestSample", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.RequestSample.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.RequestSample.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_RequestSample">
<span<?= $Grid->RequestSample->viewAttributes() ?>>
<?= $Grid->RequestSample->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_RequestSample" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_RequestSample" value="<?= HtmlEncode($Grid->RequestSample->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_RequestSample" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_RequestSample" value="<?= HtmlEncode($Grid->RequestSample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CollectionType->Visible) { // CollectionType ?>
        <td data-name="CollectionType" <?= $Grid->CollectionType->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_CollectionType" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_CollectionType"
        name="x<?= $Grid->RowIndex ?>_CollectionType"
        class="form-control ew-select<?= $Grid->CollectionType->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CollectionType"
        data-table="ivf_semenanalysisreport"
        data-field="x_CollectionType"
        data-value-separator="<?= $Grid->CollectionType->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->CollectionType->getPlaceHolder()) ?>"
        <?= $Grid->CollectionType->editAttributes() ?>>
        <?= $Grid->CollectionType->selectOptionListHtml("x{$Grid->RowIndex}_CollectionType") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->CollectionType->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CollectionType']"),
        options = { name: "x<?= $Grid->RowIndex ?>_CollectionType", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CollectionType", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.CollectionType.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.CollectionType.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CollectionType" id="o<?= $Grid->RowIndex ?>_CollectionType" value="<?= HtmlEncode($Grid->CollectionType->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_CollectionType" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_CollectionType"
        name="x<?= $Grid->RowIndex ?>_CollectionType"
        class="form-control ew-select<?= $Grid->CollectionType->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CollectionType"
        data-table="ivf_semenanalysisreport"
        data-field="x_CollectionType"
        data-value-separator="<?= $Grid->CollectionType->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->CollectionType->getPlaceHolder()) ?>"
        <?= $Grid->CollectionType->editAttributes() ?>>
        <?= $Grid->CollectionType->selectOptionListHtml("x{$Grid->RowIndex}_CollectionType") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->CollectionType->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CollectionType']"),
        options = { name: "x<?= $Grid->RowIndex ?>_CollectionType", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CollectionType", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.CollectionType.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.CollectionType.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_CollectionType">
<span<?= $Grid->CollectionType->viewAttributes() ?>>
<?= $Grid->CollectionType->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_CollectionType" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_CollectionType" value="<?= HtmlEncode($Grid->CollectionType->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_CollectionType" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_CollectionType" value="<?= HtmlEncode($Grid->CollectionType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CollectionMethod->Visible) { // CollectionMethod ?>
        <td data-name="CollectionMethod" <?= $Grid->CollectionMethod->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_CollectionMethod" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_CollectionMethod"
        name="x<?= $Grid->RowIndex ?>_CollectionMethod"
        class="form-control ew-select<?= $Grid->CollectionMethod->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CollectionMethod"
        data-table="ivf_semenanalysisreport"
        data-field="x_CollectionMethod"
        data-value-separator="<?= $Grid->CollectionMethod->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->CollectionMethod->getPlaceHolder()) ?>"
        <?= $Grid->CollectionMethod->editAttributes() ?>>
        <?= $Grid->CollectionMethod->selectOptionListHtml("x{$Grid->RowIndex}_CollectionMethod") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->CollectionMethod->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CollectionMethod']"),
        options = { name: "x<?= $Grid->RowIndex ?>_CollectionMethod", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CollectionMethod", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.CollectionMethod.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.CollectionMethod.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CollectionMethod" id="o<?= $Grid->RowIndex ?>_CollectionMethod" value="<?= HtmlEncode($Grid->CollectionMethod->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_CollectionMethod" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_CollectionMethod"
        name="x<?= $Grid->RowIndex ?>_CollectionMethod"
        class="form-control ew-select<?= $Grid->CollectionMethod->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CollectionMethod"
        data-table="ivf_semenanalysisreport"
        data-field="x_CollectionMethod"
        data-value-separator="<?= $Grid->CollectionMethod->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->CollectionMethod->getPlaceHolder()) ?>"
        <?= $Grid->CollectionMethod->editAttributes() ?>>
        <?= $Grid->CollectionMethod->selectOptionListHtml("x{$Grid->RowIndex}_CollectionMethod") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->CollectionMethod->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CollectionMethod']"),
        options = { name: "x<?= $Grid->RowIndex ?>_CollectionMethod", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CollectionMethod", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.CollectionMethod.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.CollectionMethod.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_CollectionMethod">
<span<?= $Grid->CollectionMethod->viewAttributes() ?>>
<?= $Grid->CollectionMethod->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_CollectionMethod" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_CollectionMethod" value="<?= HtmlEncode($Grid->CollectionMethod->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_CollectionMethod" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_CollectionMethod" value="<?= HtmlEncode($Grid->CollectionMethod->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Medicationused->Visible) { // Medicationused ?>
        <td data-name="Medicationused" <?= $Grid->Medicationused->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Medicationused" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Medicationused"
        name="x<?= $Grid->RowIndex ?>_Medicationused"
        class="form-control ew-select<?= $Grid->Medicationused->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_Medicationused"
        data-table="ivf_semenanalysisreport"
        data-field="x_Medicationused"
        data-value-separator="<?= $Grid->Medicationused->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Medicationused->getPlaceHolder()) ?>"
        <?= $Grid->Medicationused->editAttributes() ?>>
        <?= $Grid->Medicationused->selectOptionListHtml("x{$Grid->RowIndex}_Medicationused") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Medicationused->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_Medicationused']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Medicationused", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_Medicationused", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.Medicationused.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.Medicationused.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Medicationused" id="o<?= $Grid->RowIndex ?>_Medicationused" value="<?= HtmlEncode($Grid->Medicationused->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Medicationused" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Medicationused"
        name="x<?= $Grid->RowIndex ?>_Medicationused"
        class="form-control ew-select<?= $Grid->Medicationused->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_Medicationused"
        data-table="ivf_semenanalysisreport"
        data-field="x_Medicationused"
        data-value-separator="<?= $Grid->Medicationused->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Medicationused->getPlaceHolder()) ?>"
        <?= $Grid->Medicationused->editAttributes() ?>>
        <?= $Grid->Medicationused->selectOptionListHtml("x{$Grid->RowIndex}_Medicationused") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Medicationused->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_Medicationused']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Medicationused", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_Medicationused", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.Medicationused.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.Medicationused.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Medicationused">
<span<?= $Grid->Medicationused->viewAttributes() ?>>
<?= $Grid->Medicationused->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Medicationused" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Medicationused" value="<?= HtmlEncode($Grid->Medicationused->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Medicationused" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Medicationused" value="<?= HtmlEncode($Grid->Medicationused->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
        <td data-name="DifficultiesinCollection" <?= $Grid->DifficultiesinCollection->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_DifficultiesinCollection" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_DifficultiesinCollection"
        name="x<?= $Grid->RowIndex ?>_DifficultiesinCollection"
        class="form-control ew-select<?= $Grid->DifficultiesinCollection->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_DifficultiesinCollection"
        data-table="ivf_semenanalysisreport"
        data-field="x_DifficultiesinCollection"
        data-value-separator="<?= $Grid->DifficultiesinCollection->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->DifficultiesinCollection->getPlaceHolder()) ?>"
        <?= $Grid->DifficultiesinCollection->editAttributes() ?>>
        <?= $Grid->DifficultiesinCollection->selectOptionListHtml("x{$Grid->RowIndex}_DifficultiesinCollection") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->DifficultiesinCollection->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_DifficultiesinCollection']"),
        options = { name: "x<?= $Grid->RowIndex ?>_DifficultiesinCollection", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_DifficultiesinCollection", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.DifficultiesinCollection.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.DifficultiesinCollection.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DifficultiesinCollection" id="o<?= $Grid->RowIndex ?>_DifficultiesinCollection" value="<?= HtmlEncode($Grid->DifficultiesinCollection->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_DifficultiesinCollection" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_DifficultiesinCollection"
        name="x<?= $Grid->RowIndex ?>_DifficultiesinCollection"
        class="form-control ew-select<?= $Grid->DifficultiesinCollection->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_DifficultiesinCollection"
        data-table="ivf_semenanalysisreport"
        data-field="x_DifficultiesinCollection"
        data-value-separator="<?= $Grid->DifficultiesinCollection->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->DifficultiesinCollection->getPlaceHolder()) ?>"
        <?= $Grid->DifficultiesinCollection->editAttributes() ?>>
        <?= $Grid->DifficultiesinCollection->selectOptionListHtml("x{$Grid->RowIndex}_DifficultiesinCollection") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->DifficultiesinCollection->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_DifficultiesinCollection']"),
        options = { name: "x<?= $Grid->RowIndex ?>_DifficultiesinCollection", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_DifficultiesinCollection", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.DifficultiesinCollection.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.DifficultiesinCollection.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_DifficultiesinCollection">
<span<?= $Grid->DifficultiesinCollection->viewAttributes() ?>>
<?= $Grid->DifficultiesinCollection->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_DifficultiesinCollection" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_DifficultiesinCollection" value="<?= HtmlEncode($Grid->DifficultiesinCollection->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_DifficultiesinCollection" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_DifficultiesinCollection" value="<?= HtmlEncode($Grid->DifficultiesinCollection->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->pH->Visible) { // pH ?>
        <td data-name="pH" <?= $Grid->pH->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_pH" class="form-group">
<input type="<?= $Grid->pH->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_pH" name="x<?= $Grid->RowIndex ?>_pH" id="x<?= $Grid->RowIndex ?>_pH" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->pH->getPlaceHolder()) ?>" value="<?= $Grid->pH->EditValue ?>"<?= $Grid->pH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->pH->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" data-hidden="1" name="o<?= $Grid->RowIndex ?>_pH" id="o<?= $Grid->RowIndex ?>_pH" value="<?= HtmlEncode($Grid->pH->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_pH" class="form-group">
<input type="<?= $Grid->pH->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_pH" name="x<?= $Grid->RowIndex ?>_pH" id="x<?= $Grid->RowIndex ?>_pH" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->pH->getPlaceHolder()) ?>" value="<?= $Grid->pH->EditValue ?>"<?= $Grid->pH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->pH->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_pH">
<span<?= $Grid->pH->viewAttributes() ?>>
<?= $Grid->pH->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_pH" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_pH" value="<?= HtmlEncode($Grid->pH->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_pH" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_pH" value="<?= HtmlEncode($Grid->pH->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Timeofcollection->Visible) { // Timeofcollection ?>
        <td data-name="Timeofcollection" <?= $Grid->Timeofcollection->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Timeofcollection" class="form-group">
<input type="<?= $Grid->Timeofcollection->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="x<?= $Grid->RowIndex ?>_Timeofcollection" id="x<?= $Grid->RowIndex ?>_Timeofcollection" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Timeofcollection->getPlaceHolder()) ?>" value="<?= $Grid->Timeofcollection->EditValue ?>"<?= $Grid->Timeofcollection->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Timeofcollection->getErrorMessage() ?></div>
<?php if (!$Grid->Timeofcollection->ReadOnly && !$Grid->Timeofcollection->Disabled && !isset($Grid->Timeofcollection->EditAttrs["readonly"]) && !isset($Grid->Timeofcollection->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "timepicker"], function() {
    ew.createTimePicker("fivf_semenanalysisreportgrid", "x<?= $Grid->RowIndex ?>_Timeofcollection", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Timeofcollection" id="o<?= $Grid->RowIndex ?>_Timeofcollection" value="<?= HtmlEncode($Grid->Timeofcollection->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Timeofcollection" class="form-group">
<input type="<?= $Grid->Timeofcollection->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="x<?= $Grid->RowIndex ?>_Timeofcollection" id="x<?= $Grid->RowIndex ?>_Timeofcollection" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Timeofcollection->getPlaceHolder()) ?>" value="<?= $Grid->Timeofcollection->EditValue ?>"<?= $Grid->Timeofcollection->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Timeofcollection->getErrorMessage() ?></div>
<?php if (!$Grid->Timeofcollection->ReadOnly && !$Grid->Timeofcollection->Disabled && !isset($Grid->Timeofcollection->EditAttrs["readonly"]) && !isset($Grid->Timeofcollection->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "timepicker"], function() {
    ew.createTimePicker("fivf_semenanalysisreportgrid", "x<?= $Grid->RowIndex ?>_Timeofcollection", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Timeofcollection">
<span<?= $Grid->Timeofcollection->viewAttributes() ?>>
<?= $Grid->Timeofcollection->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Timeofcollection" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Timeofcollection" value="<?= HtmlEncode($Grid->Timeofcollection->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Timeofcollection" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Timeofcollection" value="<?= HtmlEncode($Grid->Timeofcollection->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Timeofexamination->Visible) { // Timeofexamination ?>
        <td data-name="Timeofexamination" <?= $Grid->Timeofexamination->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Timeofexamination" class="form-group">
<input type="<?= $Grid->Timeofexamination->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="x<?= $Grid->RowIndex ?>_Timeofexamination" id="x<?= $Grid->RowIndex ?>_Timeofexamination" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Timeofexamination->getPlaceHolder()) ?>" value="<?= $Grid->Timeofexamination->EditValue ?>"<?= $Grid->Timeofexamination->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Timeofexamination->getErrorMessage() ?></div>
<?php if (!$Grid->Timeofexamination->ReadOnly && !$Grid->Timeofexamination->Disabled && !isset($Grid->Timeofexamination->EditAttrs["readonly"]) && !isset($Grid->Timeofexamination->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "timepicker"], function() {
    ew.createTimePicker("fivf_semenanalysisreportgrid", "x<?= $Grid->RowIndex ?>_Timeofexamination", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Timeofexamination" id="o<?= $Grid->RowIndex ?>_Timeofexamination" value="<?= HtmlEncode($Grid->Timeofexamination->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Timeofexamination" class="form-group">
<input type="<?= $Grid->Timeofexamination->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="x<?= $Grid->RowIndex ?>_Timeofexamination" id="x<?= $Grid->RowIndex ?>_Timeofexamination" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Timeofexamination->getPlaceHolder()) ?>" value="<?= $Grid->Timeofexamination->EditValue ?>"<?= $Grid->Timeofexamination->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Timeofexamination->getErrorMessage() ?></div>
<?php if (!$Grid->Timeofexamination->ReadOnly && !$Grid->Timeofexamination->Disabled && !isset($Grid->Timeofexamination->EditAttrs["readonly"]) && !isset($Grid->Timeofexamination->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "timepicker"], function() {
    ew.createTimePicker("fivf_semenanalysisreportgrid", "x<?= $Grid->RowIndex ?>_Timeofexamination", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Timeofexamination">
<span<?= $Grid->Timeofexamination->viewAttributes() ?>>
<?= $Grid->Timeofexamination->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Timeofexamination" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Timeofexamination" value="<?= HtmlEncode($Grid->Timeofexamination->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Timeofexamination" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Timeofexamination" value="<?= HtmlEncode($Grid->Timeofexamination->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Volume->Visible) { // Volume ?>
        <td data-name="Volume" <?= $Grid->Volume->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Volume" class="form-group">
<input type="<?= $Grid->Volume->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="x<?= $Grid->RowIndex ?>_Volume" id="x<?= $Grid->RowIndex ?>_Volume" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Volume->getPlaceHolder()) ?>" value="<?= $Grid->Volume->EditValue ?>"<?= $Grid->Volume->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Volume->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Volume" id="o<?= $Grid->RowIndex ?>_Volume" value="<?= HtmlEncode($Grid->Volume->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Volume" class="form-group">
<input type="<?= $Grid->Volume->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="x<?= $Grid->RowIndex ?>_Volume" id="x<?= $Grid->RowIndex ?>_Volume" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Volume->getPlaceHolder()) ?>" value="<?= $Grid->Volume->EditValue ?>"<?= $Grid->Volume->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Volume->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Volume">
<span<?= $Grid->Volume->viewAttributes() ?>>
<?= $Grid->Volume->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Volume" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Volume" value="<?= HtmlEncode($Grid->Volume->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Volume" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Volume" value="<?= HtmlEncode($Grid->Volume->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Concentration->Visible) { // Concentration ?>
        <td data-name="Concentration" <?= $Grid->Concentration->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Concentration" class="form-group">
<input type="<?= $Grid->Concentration->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="x<?= $Grid->RowIndex ?>_Concentration" id="x<?= $Grid->RowIndex ?>_Concentration" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Concentration->getPlaceHolder()) ?>" value="<?= $Grid->Concentration->EditValue ?>"<?= $Grid->Concentration->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Concentration->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Concentration" id="o<?= $Grid->RowIndex ?>_Concentration" value="<?= HtmlEncode($Grid->Concentration->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Concentration" class="form-group">
<input type="<?= $Grid->Concentration->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="x<?= $Grid->RowIndex ?>_Concentration" id="x<?= $Grid->RowIndex ?>_Concentration" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Concentration->getPlaceHolder()) ?>" value="<?= $Grid->Concentration->EditValue ?>"<?= $Grid->Concentration->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Concentration->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Concentration">
<span<?= $Grid->Concentration->viewAttributes() ?>>
<?= $Grid->Concentration->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Concentration" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Concentration" value="<?= HtmlEncode($Grid->Concentration->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Concentration" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Concentration" value="<?= HtmlEncode($Grid->Concentration->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Total->Visible) { // Total ?>
        <td data-name="Total" <?= $Grid->Total->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Total" class="form-group">
<input type="<?= $Grid->Total->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Total" name="x<?= $Grid->RowIndex ?>_Total" id="x<?= $Grid->RowIndex ?>_Total" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Total->getPlaceHolder()) ?>" value="<?= $Grid->Total->EditValue ?>"<?= $Grid->Total->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Total->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Total" id="o<?= $Grid->RowIndex ?>_Total" value="<?= HtmlEncode($Grid->Total->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Total" class="form-group">
<input type="<?= $Grid->Total->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Total" name="x<?= $Grid->RowIndex ?>_Total" id="x<?= $Grid->RowIndex ?>_Total" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Total->getPlaceHolder()) ?>" value="<?= $Grid->Total->EditValue ?>"<?= $Grid->Total->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Total->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Total">
<span<?= $Grid->Total->viewAttributes() ?>>
<?= $Grid->Total->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Total" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Total" value="<?= HtmlEncode($Grid->Total->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Total" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Total" value="<?= HtmlEncode($Grid->Total->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
        <td data-name="ProgressiveMotility" <?= $Grid->ProgressiveMotility->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility" class="form-group">
<input type="<?= $Grid->ProgressiveMotility->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="x<?= $Grid->RowIndex ?>_ProgressiveMotility" id="x<?= $Grid->RowIndex ?>_ProgressiveMotility" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->ProgressiveMotility->getPlaceHolder()) ?>" value="<?= $Grid->ProgressiveMotility->EditValue ?>"<?= $Grid->ProgressiveMotility->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProgressiveMotility->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ProgressiveMotility" id="o<?= $Grid->RowIndex ?>_ProgressiveMotility" value="<?= HtmlEncode($Grid->ProgressiveMotility->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility" class="form-group">
<input type="<?= $Grid->ProgressiveMotility->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="x<?= $Grid->RowIndex ?>_ProgressiveMotility" id="x<?= $Grid->RowIndex ?>_ProgressiveMotility" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->ProgressiveMotility->getPlaceHolder()) ?>" value="<?= $Grid->ProgressiveMotility->EditValue ?>"<?= $Grid->ProgressiveMotility->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProgressiveMotility->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility">
<span<?= $Grid->ProgressiveMotility->viewAttributes() ?>>
<?= $Grid->ProgressiveMotility->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_ProgressiveMotility" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_ProgressiveMotility" value="<?= HtmlEncode($Grid->ProgressiveMotility->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_ProgressiveMotility" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_ProgressiveMotility" value="<?= HtmlEncode($Grid->ProgressiveMotility->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
        <td data-name="NonProgrssiveMotile" <?= $Grid->NonProgrssiveMotile->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile" class="form-group">
<input type="<?= $Grid->NonProgrssiveMotile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile" id="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->NonProgrssiveMotile->getPlaceHolder()) ?>" value="<?= $Grid->NonProgrssiveMotile->EditValue ?>"<?= $Grid->NonProgrssiveMotile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NonProgrssiveMotile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NonProgrssiveMotile" id="o<?= $Grid->RowIndex ?>_NonProgrssiveMotile" value="<?= HtmlEncode($Grid->NonProgrssiveMotile->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile" class="form-group">
<input type="<?= $Grid->NonProgrssiveMotile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile" id="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->NonProgrssiveMotile->getPlaceHolder()) ?>" value="<?= $Grid->NonProgrssiveMotile->EditValue ?>"<?= $Grid->NonProgrssiveMotile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NonProgrssiveMotile->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile">
<span<?= $Grid->NonProgrssiveMotile->viewAttributes() ?>>
<?= $Grid->NonProgrssiveMotile->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_NonProgrssiveMotile" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_NonProgrssiveMotile" value="<?= HtmlEncode($Grid->NonProgrssiveMotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_NonProgrssiveMotile" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_NonProgrssiveMotile" value="<?= HtmlEncode($Grid->NonProgrssiveMotile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Immotile->Visible) { // Immotile ?>
        <td data-name="Immotile" <?= $Grid->Immotile->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Immotile" class="form-group">
<input type="<?= $Grid->Immotile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="x<?= $Grid->RowIndex ?>_Immotile" id="x<?= $Grid->RowIndex ?>_Immotile" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Immotile->getPlaceHolder()) ?>" value="<?= $Grid->Immotile->EditValue ?>"<?= $Grid->Immotile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Immotile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Immotile" id="o<?= $Grid->RowIndex ?>_Immotile" value="<?= HtmlEncode($Grid->Immotile->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Immotile" class="form-group">
<input type="<?= $Grid->Immotile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="x<?= $Grid->RowIndex ?>_Immotile" id="x<?= $Grid->RowIndex ?>_Immotile" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Immotile->getPlaceHolder()) ?>" value="<?= $Grid->Immotile->EditValue ?>"<?= $Grid->Immotile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Immotile->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Immotile">
<span<?= $Grid->Immotile->viewAttributes() ?>>
<?= $Grid->Immotile->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Immotile" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Immotile" value="<?= HtmlEncode($Grid->Immotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Immotile" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Immotile" value="<?= HtmlEncode($Grid->Immotile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
        <td data-name="TotalProgrssiveMotile" <?= $Grid->TotalProgrssiveMotile->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile" class="form-group">
<input type="<?= $Grid->TotalProgrssiveMotile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile" id="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->TotalProgrssiveMotile->getPlaceHolder()) ?>" value="<?= $Grid->TotalProgrssiveMotile->EditValue ?>"<?= $Grid->TotalProgrssiveMotile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TotalProgrssiveMotile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TotalProgrssiveMotile" id="o<?= $Grid->RowIndex ?>_TotalProgrssiveMotile" value="<?= HtmlEncode($Grid->TotalProgrssiveMotile->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile" class="form-group">
<input type="<?= $Grid->TotalProgrssiveMotile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile" id="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->TotalProgrssiveMotile->getPlaceHolder()) ?>" value="<?= $Grid->TotalProgrssiveMotile->EditValue ?>"<?= $Grid->TotalProgrssiveMotile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TotalProgrssiveMotile->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile">
<span<?= $Grid->TotalProgrssiveMotile->viewAttributes() ?>>
<?= $Grid->TotalProgrssiveMotile->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile" value="<?= HtmlEncode($Grid->TotalProgrssiveMotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_TotalProgrssiveMotile" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_TotalProgrssiveMotile" value="<?= HtmlEncode($Grid->TotalProgrssiveMotile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Appearance->Visible) { // Appearance ?>
        <td data-name="Appearance" <?= $Grid->Appearance->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Appearance" class="form-group">
<input type="<?= $Grid->Appearance->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="x<?= $Grid->RowIndex ?>_Appearance" id="x<?= $Grid->RowIndex ?>_Appearance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Appearance->getPlaceHolder()) ?>" value="<?= $Grid->Appearance->EditValue ?>"<?= $Grid->Appearance->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Appearance->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Appearance" id="o<?= $Grid->RowIndex ?>_Appearance" value="<?= HtmlEncode($Grid->Appearance->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Appearance" class="form-group">
<input type="<?= $Grid->Appearance->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="x<?= $Grid->RowIndex ?>_Appearance" id="x<?= $Grid->RowIndex ?>_Appearance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Appearance->getPlaceHolder()) ?>" value="<?= $Grid->Appearance->EditValue ?>"<?= $Grid->Appearance->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Appearance->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Appearance">
<span<?= $Grid->Appearance->viewAttributes() ?>>
<?= $Grid->Appearance->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Appearance" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Appearance" value="<?= HtmlEncode($Grid->Appearance->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Appearance" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Appearance" value="<?= HtmlEncode($Grid->Appearance->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Homogenosity->Visible) { // Homogenosity ?>
        <td data-name="Homogenosity" <?= $Grid->Homogenosity->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Homogenosity" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Homogenosity"
        name="x<?= $Grid->RowIndex ?>_Homogenosity"
        class="form-control ew-select<?= $Grid->Homogenosity->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_Homogenosity"
        data-table="ivf_semenanalysisreport"
        data-field="x_Homogenosity"
        data-value-separator="<?= $Grid->Homogenosity->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Homogenosity->getPlaceHolder()) ?>"
        <?= $Grid->Homogenosity->editAttributes() ?>>
        <?= $Grid->Homogenosity->selectOptionListHtml("x{$Grid->RowIndex}_Homogenosity") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Homogenosity->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_Homogenosity']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Homogenosity", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_Homogenosity", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.Homogenosity.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.Homogenosity.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Homogenosity" id="o<?= $Grid->RowIndex ?>_Homogenosity" value="<?= HtmlEncode($Grid->Homogenosity->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Homogenosity" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Homogenosity"
        name="x<?= $Grid->RowIndex ?>_Homogenosity"
        class="form-control ew-select<?= $Grid->Homogenosity->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_Homogenosity"
        data-table="ivf_semenanalysisreport"
        data-field="x_Homogenosity"
        data-value-separator="<?= $Grid->Homogenosity->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Homogenosity->getPlaceHolder()) ?>"
        <?= $Grid->Homogenosity->editAttributes() ?>>
        <?= $Grid->Homogenosity->selectOptionListHtml("x{$Grid->RowIndex}_Homogenosity") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Homogenosity->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_Homogenosity']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Homogenosity", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_Homogenosity", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.Homogenosity.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.Homogenosity.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Homogenosity">
<span<?= $Grid->Homogenosity->viewAttributes() ?>>
<?= $Grid->Homogenosity->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Homogenosity" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Homogenosity" value="<?= HtmlEncode($Grid->Homogenosity->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Homogenosity" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Homogenosity" value="<?= HtmlEncode($Grid->Homogenosity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CompleteSample->Visible) { // CompleteSample ?>
        <td data-name="CompleteSample" <?= $Grid->CompleteSample->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_CompleteSample" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_CompleteSample"
        name="x<?= $Grid->RowIndex ?>_CompleteSample"
        class="form-control ew-select<?= $Grid->CompleteSample->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CompleteSample"
        data-table="ivf_semenanalysisreport"
        data-field="x_CompleteSample"
        data-value-separator="<?= $Grid->CompleteSample->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->CompleteSample->getPlaceHolder()) ?>"
        <?= $Grid->CompleteSample->editAttributes() ?>>
        <?= $Grid->CompleteSample->selectOptionListHtml("x{$Grid->RowIndex}_CompleteSample") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->CompleteSample->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CompleteSample']"),
        options = { name: "x<?= $Grid->RowIndex ?>_CompleteSample", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CompleteSample", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.CompleteSample.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.CompleteSample.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CompleteSample" id="o<?= $Grid->RowIndex ?>_CompleteSample" value="<?= HtmlEncode($Grid->CompleteSample->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_CompleteSample" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_CompleteSample"
        name="x<?= $Grid->RowIndex ?>_CompleteSample"
        class="form-control ew-select<?= $Grid->CompleteSample->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CompleteSample"
        data-table="ivf_semenanalysisreport"
        data-field="x_CompleteSample"
        data-value-separator="<?= $Grid->CompleteSample->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->CompleteSample->getPlaceHolder()) ?>"
        <?= $Grid->CompleteSample->editAttributes() ?>>
        <?= $Grid->CompleteSample->selectOptionListHtml("x{$Grid->RowIndex}_CompleteSample") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->CompleteSample->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CompleteSample']"),
        options = { name: "x<?= $Grid->RowIndex ?>_CompleteSample", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CompleteSample", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.CompleteSample.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.CompleteSample.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_CompleteSample">
<span<?= $Grid->CompleteSample->viewAttributes() ?>>
<?= $Grid->CompleteSample->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_CompleteSample" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_CompleteSample" value="<?= HtmlEncode($Grid->CompleteSample->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_CompleteSample" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_CompleteSample" value="<?= HtmlEncode($Grid->CompleteSample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Liquefactiontime->Visible) { // Liquefactiontime ?>
        <td data-name="Liquefactiontime" <?= $Grid->Liquefactiontime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Liquefactiontime" class="form-group">
<input type="<?= $Grid->Liquefactiontime->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="x<?= $Grid->RowIndex ?>_Liquefactiontime" id="x<?= $Grid->RowIndex ?>_Liquefactiontime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Liquefactiontime->getPlaceHolder()) ?>" value="<?= $Grid->Liquefactiontime->EditValue ?>"<?= $Grid->Liquefactiontime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Liquefactiontime->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Liquefactiontime" id="o<?= $Grid->RowIndex ?>_Liquefactiontime" value="<?= HtmlEncode($Grid->Liquefactiontime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Liquefactiontime" class="form-group">
<input type="<?= $Grid->Liquefactiontime->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="x<?= $Grid->RowIndex ?>_Liquefactiontime" id="x<?= $Grid->RowIndex ?>_Liquefactiontime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Liquefactiontime->getPlaceHolder()) ?>" value="<?= $Grid->Liquefactiontime->EditValue ?>"<?= $Grid->Liquefactiontime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Liquefactiontime->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Liquefactiontime">
<span<?= $Grid->Liquefactiontime->viewAttributes() ?>>
<?= $Grid->Liquefactiontime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Liquefactiontime" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Liquefactiontime" value="<?= HtmlEncode($Grid->Liquefactiontime->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Liquefactiontime" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Liquefactiontime" value="<?= HtmlEncode($Grid->Liquefactiontime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Normal->Visible) { // Normal ?>
        <td data-name="Normal" <?= $Grid->Normal->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Normal" class="form-group">
<input type="<?= $Grid->Normal->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="x<?= $Grid->RowIndex ?>_Normal" id="x<?= $Grid->RowIndex ?>_Normal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Normal->getPlaceHolder()) ?>" value="<?= $Grid->Normal->EditValue ?>"<?= $Grid->Normal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Normal->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Normal" id="o<?= $Grid->RowIndex ?>_Normal" value="<?= HtmlEncode($Grid->Normal->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Normal" class="form-group">
<input type="<?= $Grid->Normal->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="x<?= $Grid->RowIndex ?>_Normal" id="x<?= $Grid->RowIndex ?>_Normal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Normal->getPlaceHolder()) ?>" value="<?= $Grid->Normal->EditValue ?>"<?= $Grid->Normal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Normal->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Normal">
<span<?= $Grid->Normal->viewAttributes() ?>>
<?= $Grid->Normal->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Normal" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Normal" value="<?= HtmlEncode($Grid->Normal->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Normal" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Normal" value="<?= HtmlEncode($Grid->Normal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Abnormal->Visible) { // Abnormal ?>
        <td data-name="Abnormal" <?= $Grid->Abnormal->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Abnormal" class="form-group">
<input type="<?= $Grid->Abnormal->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="x<?= $Grid->RowIndex ?>_Abnormal" id="x<?= $Grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Abnormal->getPlaceHolder()) ?>" value="<?= $Grid->Abnormal->EditValue ?>"<?= $Grid->Abnormal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Abnormal->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Abnormal" id="o<?= $Grid->RowIndex ?>_Abnormal" value="<?= HtmlEncode($Grid->Abnormal->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Abnormal" class="form-group">
<input type="<?= $Grid->Abnormal->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="x<?= $Grid->RowIndex ?>_Abnormal" id="x<?= $Grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Abnormal->getPlaceHolder()) ?>" value="<?= $Grid->Abnormal->EditValue ?>"<?= $Grid->Abnormal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Abnormal->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Abnormal">
<span<?= $Grid->Abnormal->viewAttributes() ?>>
<?= $Grid->Abnormal->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Abnormal" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Abnormal" value="<?= HtmlEncode($Grid->Abnormal->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Abnormal" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Abnormal" value="<?= HtmlEncode($Grid->Abnormal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Headdefects->Visible) { // Headdefects ?>
        <td data-name="Headdefects" <?= $Grid->Headdefects->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Headdefects" class="form-group">
<input type="<?= $Grid->Headdefects->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="x<?= $Grid->RowIndex ?>_Headdefects" id="x<?= $Grid->RowIndex ?>_Headdefects" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Headdefects->getPlaceHolder()) ?>" value="<?= $Grid->Headdefects->EditValue ?>"<?= $Grid->Headdefects->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Headdefects->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Headdefects" id="o<?= $Grid->RowIndex ?>_Headdefects" value="<?= HtmlEncode($Grid->Headdefects->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Headdefects" class="form-group">
<input type="<?= $Grid->Headdefects->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="x<?= $Grid->RowIndex ?>_Headdefects" id="x<?= $Grid->RowIndex ?>_Headdefects" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Headdefects->getPlaceHolder()) ?>" value="<?= $Grid->Headdefects->EditValue ?>"<?= $Grid->Headdefects->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Headdefects->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Headdefects">
<span<?= $Grid->Headdefects->viewAttributes() ?>>
<?= $Grid->Headdefects->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Headdefects" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Headdefects" value="<?= HtmlEncode($Grid->Headdefects->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Headdefects" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Headdefects" value="<?= HtmlEncode($Grid->Headdefects->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MidpieceDefects->Visible) { // MidpieceDefects ?>
        <td data-name="MidpieceDefects" <?= $Grid->MidpieceDefects->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_MidpieceDefects" class="form-group">
<input type="<?= $Grid->MidpieceDefects->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="x<?= $Grid->RowIndex ?>_MidpieceDefects" id="x<?= $Grid->RowIndex ?>_MidpieceDefects" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MidpieceDefects->getPlaceHolder()) ?>" value="<?= $Grid->MidpieceDefects->EditValue ?>"<?= $Grid->MidpieceDefects->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MidpieceDefects->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MidpieceDefects" id="o<?= $Grid->RowIndex ?>_MidpieceDefects" value="<?= HtmlEncode($Grid->MidpieceDefects->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_MidpieceDefects" class="form-group">
<input type="<?= $Grid->MidpieceDefects->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="x<?= $Grid->RowIndex ?>_MidpieceDefects" id="x<?= $Grid->RowIndex ?>_MidpieceDefects" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MidpieceDefects->getPlaceHolder()) ?>" value="<?= $Grid->MidpieceDefects->EditValue ?>"<?= $Grid->MidpieceDefects->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MidpieceDefects->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_MidpieceDefects">
<span<?= $Grid->MidpieceDefects->viewAttributes() ?>>
<?= $Grid->MidpieceDefects->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_MidpieceDefects" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_MidpieceDefects" value="<?= HtmlEncode($Grid->MidpieceDefects->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_MidpieceDefects" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_MidpieceDefects" value="<?= HtmlEncode($Grid->MidpieceDefects->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TailDefects->Visible) { // TailDefects ?>
        <td data-name="TailDefects" <?= $Grid->TailDefects->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TailDefects" class="form-group">
<input type="<?= $Grid->TailDefects->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="x<?= $Grid->RowIndex ?>_TailDefects" id="x<?= $Grid->RowIndex ?>_TailDefects" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TailDefects->getPlaceHolder()) ?>" value="<?= $Grid->TailDefects->EditValue ?>"<?= $Grid->TailDefects->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TailDefects->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TailDefects" id="o<?= $Grid->RowIndex ?>_TailDefects" value="<?= HtmlEncode($Grid->TailDefects->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TailDefects" class="form-group">
<input type="<?= $Grid->TailDefects->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="x<?= $Grid->RowIndex ?>_TailDefects" id="x<?= $Grid->RowIndex ?>_TailDefects" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TailDefects->getPlaceHolder()) ?>" value="<?= $Grid->TailDefects->EditValue ?>"<?= $Grid->TailDefects->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TailDefects->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TailDefects">
<span<?= $Grid->TailDefects->viewAttributes() ?>>
<?= $Grid->TailDefects->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_TailDefects" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_TailDefects" value="<?= HtmlEncode($Grid->TailDefects->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_TailDefects" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_TailDefects" value="<?= HtmlEncode($Grid->TailDefects->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NormalProgMotile->Visible) { // NormalProgMotile ?>
        <td data-name="NormalProgMotile" <?= $Grid->NormalProgMotile->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_NormalProgMotile" class="form-group">
<input type="<?= $Grid->NormalProgMotile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="x<?= $Grid->RowIndex ?>_NormalProgMotile" id="x<?= $Grid->RowIndex ?>_NormalProgMotile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NormalProgMotile->getPlaceHolder()) ?>" value="<?= $Grid->NormalProgMotile->EditValue ?>"<?= $Grid->NormalProgMotile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NormalProgMotile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NormalProgMotile" id="o<?= $Grid->RowIndex ?>_NormalProgMotile" value="<?= HtmlEncode($Grid->NormalProgMotile->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_NormalProgMotile" class="form-group">
<input type="<?= $Grid->NormalProgMotile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="x<?= $Grid->RowIndex ?>_NormalProgMotile" id="x<?= $Grid->RowIndex ?>_NormalProgMotile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NormalProgMotile->getPlaceHolder()) ?>" value="<?= $Grid->NormalProgMotile->EditValue ?>"<?= $Grid->NormalProgMotile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NormalProgMotile->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_NormalProgMotile">
<span<?= $Grid->NormalProgMotile->viewAttributes() ?>>
<?= $Grid->NormalProgMotile->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_NormalProgMotile" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_NormalProgMotile" value="<?= HtmlEncode($Grid->NormalProgMotile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_NormalProgMotile" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_NormalProgMotile" value="<?= HtmlEncode($Grid->NormalProgMotile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ImmatureForms->Visible) { // ImmatureForms ?>
        <td data-name="ImmatureForms" <?= $Grid->ImmatureForms->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_ImmatureForms" class="form-group">
<input type="<?= $Grid->ImmatureForms->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="x<?= $Grid->RowIndex ?>_ImmatureForms" id="x<?= $Grid->RowIndex ?>_ImmatureForms" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ImmatureForms->getPlaceHolder()) ?>" value="<?= $Grid->ImmatureForms->EditValue ?>"<?= $Grid->ImmatureForms->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ImmatureForms->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ImmatureForms" id="o<?= $Grid->RowIndex ?>_ImmatureForms" value="<?= HtmlEncode($Grid->ImmatureForms->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_ImmatureForms" class="form-group">
<input type="<?= $Grid->ImmatureForms->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="x<?= $Grid->RowIndex ?>_ImmatureForms" id="x<?= $Grid->RowIndex ?>_ImmatureForms" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ImmatureForms->getPlaceHolder()) ?>" value="<?= $Grid->ImmatureForms->EditValue ?>"<?= $Grid->ImmatureForms->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ImmatureForms->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_ImmatureForms">
<span<?= $Grid->ImmatureForms->viewAttributes() ?>>
<?= $Grid->ImmatureForms->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_ImmatureForms" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_ImmatureForms" value="<?= HtmlEncode($Grid->ImmatureForms->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_ImmatureForms" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_ImmatureForms" value="<?= HtmlEncode($Grid->ImmatureForms->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Leucocytes->Visible) { // Leucocytes ?>
        <td data-name="Leucocytes" <?= $Grid->Leucocytes->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Leucocytes" class="form-group">
<input type="<?= $Grid->Leucocytes->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="x<?= $Grid->RowIndex ?>_Leucocytes" id="x<?= $Grid->RowIndex ?>_Leucocytes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Leucocytes->getPlaceHolder()) ?>" value="<?= $Grid->Leucocytes->EditValue ?>"<?= $Grid->Leucocytes->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Leucocytes->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Leucocytes" id="o<?= $Grid->RowIndex ?>_Leucocytes" value="<?= HtmlEncode($Grid->Leucocytes->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Leucocytes" class="form-group">
<input type="<?= $Grid->Leucocytes->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="x<?= $Grid->RowIndex ?>_Leucocytes" id="x<?= $Grid->RowIndex ?>_Leucocytes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Leucocytes->getPlaceHolder()) ?>" value="<?= $Grid->Leucocytes->EditValue ?>"<?= $Grid->Leucocytes->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Leucocytes->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Leucocytes">
<span<?= $Grid->Leucocytes->viewAttributes() ?>>
<?= $Grid->Leucocytes->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Leucocytes" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Leucocytes" value="<?= HtmlEncode($Grid->Leucocytes->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Leucocytes" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Leucocytes" value="<?= HtmlEncode($Grid->Leucocytes->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Agglutination->Visible) { // Agglutination ?>
        <td data-name="Agglutination" <?= $Grid->Agglutination->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Agglutination" class="form-group">
<input type="<?= $Grid->Agglutination->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="x<?= $Grid->RowIndex ?>_Agglutination" id="x<?= $Grid->RowIndex ?>_Agglutination" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Agglutination->getPlaceHolder()) ?>" value="<?= $Grid->Agglutination->EditValue ?>"<?= $Grid->Agglutination->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Agglutination->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Agglutination" id="o<?= $Grid->RowIndex ?>_Agglutination" value="<?= HtmlEncode($Grid->Agglutination->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Agglutination" class="form-group">
<input type="<?= $Grid->Agglutination->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="x<?= $Grid->RowIndex ?>_Agglutination" id="x<?= $Grid->RowIndex ?>_Agglutination" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Agglutination->getPlaceHolder()) ?>" value="<?= $Grid->Agglutination->EditValue ?>"<?= $Grid->Agglutination->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Agglutination->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Agglutination">
<span<?= $Grid->Agglutination->viewAttributes() ?>>
<?= $Grid->Agglutination->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Agglutination" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Agglutination" value="<?= HtmlEncode($Grid->Agglutination->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Agglutination" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Agglutination" value="<?= HtmlEncode($Grid->Agglutination->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Debris->Visible) { // Debris ?>
        <td data-name="Debris" <?= $Grid->Debris->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Debris" class="form-group">
<input type="<?= $Grid->Debris->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="x<?= $Grid->RowIndex ?>_Debris" id="x<?= $Grid->RowIndex ?>_Debris" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Debris->getPlaceHolder()) ?>" value="<?= $Grid->Debris->EditValue ?>"<?= $Grid->Debris->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Debris->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Debris" id="o<?= $Grid->RowIndex ?>_Debris" value="<?= HtmlEncode($Grid->Debris->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Debris" class="form-group">
<input type="<?= $Grid->Debris->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="x<?= $Grid->RowIndex ?>_Debris" id="x<?= $Grid->RowIndex ?>_Debris" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Debris->getPlaceHolder()) ?>" value="<?= $Grid->Debris->EditValue ?>"<?= $Grid->Debris->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Debris->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Debris">
<span<?= $Grid->Debris->viewAttributes() ?>>
<?= $Grid->Debris->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Debris" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Debris" value="<?= HtmlEncode($Grid->Debris->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Debris" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Debris" value="<?= HtmlEncode($Grid->Debris->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Diagnosis->Visible) { // Diagnosis ?>
        <td data-name="Diagnosis" <?= $Grid->Diagnosis->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Diagnosis" class="form-group">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="x<?= $Grid->RowIndex ?>_Diagnosis" id="x<?= $Grid->RowIndex ?>_Diagnosis" cols="35" rows="4" placeholder="<?= HtmlEncode($Grid->Diagnosis->getPlaceHolder()) ?>"<?= $Grid->Diagnosis->editAttributes() ?>><?= $Grid->Diagnosis->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Grid->Diagnosis->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Diagnosis" id="o<?= $Grid->RowIndex ?>_Diagnosis" value="<?= HtmlEncode($Grid->Diagnosis->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Diagnosis" class="form-group">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="x<?= $Grid->RowIndex ?>_Diagnosis" id="x<?= $Grid->RowIndex ?>_Diagnosis" cols="35" rows="4" placeholder="<?= HtmlEncode($Grid->Diagnosis->getPlaceHolder()) ?>"<?= $Grid->Diagnosis->editAttributes() ?>><?= $Grid->Diagnosis->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Grid->Diagnosis->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Diagnosis">
<span<?= $Grid->Diagnosis->viewAttributes() ?>>
<?= $Grid->Diagnosis->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Diagnosis" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Diagnosis" value="<?= HtmlEncode($Grid->Diagnosis->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Diagnosis" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Diagnosis" value="<?= HtmlEncode($Grid->Diagnosis->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Observations->Visible) { // Observations ?>
        <td data-name="Observations" <?= $Grid->Observations->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Observations" class="form-group">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Observations" name="x<?= $Grid->RowIndex ?>_Observations" id="x<?= $Grid->RowIndex ?>_Observations" cols="35" rows="4" placeholder="<?= HtmlEncode($Grid->Observations->getPlaceHolder()) ?>"<?= $Grid->Observations->editAttributes() ?>><?= $Grid->Observations->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Grid->Observations->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Observations" id="o<?= $Grid->RowIndex ?>_Observations" value="<?= HtmlEncode($Grid->Observations->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Observations" class="form-group">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Observations" name="x<?= $Grid->RowIndex ?>_Observations" id="x<?= $Grid->RowIndex ?>_Observations" cols="35" rows="4" placeholder="<?= HtmlEncode($Grid->Observations->getPlaceHolder()) ?>"<?= $Grid->Observations->editAttributes() ?>><?= $Grid->Observations->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Grid->Observations->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Observations">
<span<?= $Grid->Observations->viewAttributes() ?>>
<?= $Grid->Observations->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Observations" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Observations" value="<?= HtmlEncode($Grid->Observations->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Observations" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Observations" value="<?= HtmlEncode($Grid->Observations->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Signature->Visible) { // Signature ?>
        <td data-name="Signature" <?= $Grid->Signature->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Signature" class="form-group">
<input type="<?= $Grid->Signature->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="x<?= $Grid->RowIndex ?>_Signature" id="x<?= $Grid->RowIndex ?>_Signature" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Signature->getPlaceHolder()) ?>" value="<?= $Grid->Signature->EditValue ?>"<?= $Grid->Signature->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Signature->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Signature" id="o<?= $Grid->RowIndex ?>_Signature" value="<?= HtmlEncode($Grid->Signature->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Signature" class="form-group">
<input type="<?= $Grid->Signature->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="x<?= $Grid->RowIndex ?>_Signature" id="x<?= $Grid->RowIndex ?>_Signature" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Signature->getPlaceHolder()) ?>" value="<?= $Grid->Signature->EditValue ?>"<?= $Grid->Signature->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Signature->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Signature">
<span<?= $Grid->Signature->viewAttributes() ?>>
<?= $Grid->Signature->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Signature" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Signature" value="<?= HtmlEncode($Grid->Signature->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Signature" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Signature" value="<?= HtmlEncode($Grid->Signature->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SemenOrgin->Visible) { // SemenOrgin ?>
        <td data-name="SemenOrgin" <?= $Grid->SemenOrgin->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_SemenOrgin" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_SemenOrgin"
        name="x<?= $Grid->RowIndex ?>_SemenOrgin"
        class="form-control ew-select<?= $Grid->SemenOrgin->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_SemenOrgin"
        data-table="ivf_semenanalysisreport"
        data-field="x_SemenOrgin"
        data-value-separator="<?= $Grid->SemenOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->SemenOrgin->getPlaceHolder()) ?>"
        <?= $Grid->SemenOrgin->editAttributes() ?>>
        <?= $Grid->SemenOrgin->selectOptionListHtml("x{$Grid->RowIndex}_SemenOrgin") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->SemenOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_SemenOrgin']"),
        options = { name: "x<?= $Grid->RowIndex ?>_SemenOrgin", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_SemenOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.SemenOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.SemenOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SemenOrgin" id="o<?= $Grid->RowIndex ?>_SemenOrgin" value="<?= HtmlEncode($Grid->SemenOrgin->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_SemenOrgin" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_SemenOrgin"
        name="x<?= $Grid->RowIndex ?>_SemenOrgin"
        class="form-control ew-select<?= $Grid->SemenOrgin->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_SemenOrgin"
        data-table="ivf_semenanalysisreport"
        data-field="x_SemenOrgin"
        data-value-separator="<?= $Grid->SemenOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->SemenOrgin->getPlaceHolder()) ?>"
        <?= $Grid->SemenOrgin->editAttributes() ?>>
        <?= $Grid->SemenOrgin->selectOptionListHtml("x{$Grid->RowIndex}_SemenOrgin") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->SemenOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_SemenOrgin']"),
        options = { name: "x<?= $Grid->RowIndex ?>_SemenOrgin", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_SemenOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.SemenOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.SemenOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_SemenOrgin">
<span<?= $Grid->SemenOrgin->viewAttributes() ?>>
<?= $Grid->SemenOrgin->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_SemenOrgin" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_SemenOrgin" value="<?= HtmlEncode($Grid->SemenOrgin->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_SemenOrgin" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_SemenOrgin" value="<?= HtmlEncode($Grid->SemenOrgin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Donor->Visible) { // Donor ?>
        <td data-name="Donor" <?= $Grid->Donor->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Donor" class="form-group">
<?php $Grid->Donor->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_Donor"><?= EmptyValue(strval($Grid->Donor->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->Donor->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->Donor->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->Donor->ReadOnly || $Grid->Donor->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_Donor',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->Donor->getErrorMessage() ?></div>
<?= $Grid->Donor->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Donor") ?>
<input type="hidden" is="selection-list" data-table="ivf_semenanalysisreport" data-field="x_Donor" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->Donor->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Donor" id="x<?= $Grid->RowIndex ?>_Donor" value="<?= $Grid->Donor->CurrentValue ?>"<?= $Grid->Donor->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Donor" id="o<?= $Grid->RowIndex ?>_Donor" value="<?= HtmlEncode($Grid->Donor->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Donor" class="form-group">
<?php $Grid->Donor->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_Donor"><?= EmptyValue(strval($Grid->Donor->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->Donor->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->Donor->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->Donor->ReadOnly || $Grid->Donor->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_Donor',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->Donor->getErrorMessage() ?></div>
<?= $Grid->Donor->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Donor") ?>
<input type="hidden" is="selection-list" data-table="ivf_semenanalysisreport" data-field="x_Donor" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->Donor->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Donor" id="x<?= $Grid->RowIndex ?>_Donor" value="<?= $Grid->Donor->CurrentValue ?>"<?= $Grid->Donor->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Donor">
<span<?= $Grid->Donor->viewAttributes() ?>>
<?= $Grid->Donor->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Donor" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Donor" value="<?= HtmlEncode($Grid->Donor->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Donor" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Donor" value="<?= HtmlEncode($Grid->Donor->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
        <td data-name="DonorBloodgroup" <?= $Grid->DonorBloodgroup->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_DonorBloodgroup" class="form-group">
<input type="<?= $Grid->DonorBloodgroup->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="x<?= $Grid->RowIndex ?>_DonorBloodgroup" id="x<?= $Grid->RowIndex ?>_DonorBloodgroup" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DonorBloodgroup->getPlaceHolder()) ?>" value="<?= $Grid->DonorBloodgroup->EditValue ?>"<?= $Grid->DonorBloodgroup->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DonorBloodgroup->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DonorBloodgroup" id="o<?= $Grid->RowIndex ?>_DonorBloodgroup" value="<?= HtmlEncode($Grid->DonorBloodgroup->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_DonorBloodgroup" class="form-group">
<input type="<?= $Grid->DonorBloodgroup->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="x<?= $Grid->RowIndex ?>_DonorBloodgroup" id="x<?= $Grid->RowIndex ?>_DonorBloodgroup" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DonorBloodgroup->getPlaceHolder()) ?>" value="<?= $Grid->DonorBloodgroup->EditValue ?>"<?= $Grid->DonorBloodgroup->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DonorBloodgroup->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_DonorBloodgroup">
<span<?= $Grid->DonorBloodgroup->viewAttributes() ?>>
<?= $Grid->DonorBloodgroup->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_DonorBloodgroup" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_DonorBloodgroup" value="<?= HtmlEncode($Grid->DonorBloodgroup->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_DonorBloodgroup" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_DonorBloodgroup" value="<?= HtmlEncode($Grid->DonorBloodgroup->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Tank->Visible) { // Tank ?>
        <td data-name="Tank" <?= $Grid->Tank->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Tank" class="form-group">
<input type="<?= $Grid->Tank->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="x<?= $Grid->RowIndex ?>_Tank" id="x<?= $Grid->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Tank->getPlaceHolder()) ?>" value="<?= $Grid->Tank->EditValue ?>"<?= $Grid->Tank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Tank->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Tank" id="o<?= $Grid->RowIndex ?>_Tank" value="<?= HtmlEncode($Grid->Tank->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Tank" class="form-group">
<input type="<?= $Grid->Tank->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="x<?= $Grid->RowIndex ?>_Tank" id="x<?= $Grid->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Tank->getPlaceHolder()) ?>" value="<?= $Grid->Tank->EditValue ?>"<?= $Grid->Tank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Tank->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Tank">
<span<?= $Grid->Tank->viewAttributes() ?>>
<?= $Grid->Tank->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Tank" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Tank" value="<?= HtmlEncode($Grid->Tank->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Tank" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Tank" value="<?= HtmlEncode($Grid->Tank->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Location->Visible) { // Location ?>
        <td data-name="Location" <?= $Grid->Location->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Location" class="form-group">
<input type="<?= $Grid->Location->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Location" name="x<?= $Grid->RowIndex ?>_Location" id="x<?= $Grid->RowIndex ?>_Location" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Location->getPlaceHolder()) ?>" value="<?= $Grid->Location->EditValue ?>"<?= $Grid->Location->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Location->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Location" id="o<?= $Grid->RowIndex ?>_Location" value="<?= HtmlEncode($Grid->Location->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Location" class="form-group">
<input type="<?= $Grid->Location->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Location" name="x<?= $Grid->RowIndex ?>_Location" id="x<?= $Grid->RowIndex ?>_Location" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Location->getPlaceHolder()) ?>" value="<?= $Grid->Location->EditValue ?>"<?= $Grid->Location->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Location->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Location">
<span<?= $Grid->Location->viewAttributes() ?>>
<?= $Grid->Location->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Location" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Location" value="<?= HtmlEncode($Grid->Location->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Location" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Location" value="<?= HtmlEncode($Grid->Location->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Volume1->Visible) { // Volume1 ?>
        <td data-name="Volume1" <?= $Grid->Volume1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Volume1" class="form-group">
<input type="<?= $Grid->Volume1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="x<?= $Grid->RowIndex ?>_Volume1" id="x<?= $Grid->RowIndex ?>_Volume1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Volume1->getPlaceHolder()) ?>" value="<?= $Grid->Volume1->EditValue ?>"<?= $Grid->Volume1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Volume1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Volume1" id="o<?= $Grid->RowIndex ?>_Volume1" value="<?= HtmlEncode($Grid->Volume1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Volume1" class="form-group">
<input type="<?= $Grid->Volume1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="x<?= $Grid->RowIndex ?>_Volume1" id="x<?= $Grid->RowIndex ?>_Volume1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Volume1->getPlaceHolder()) ?>" value="<?= $Grid->Volume1->EditValue ?>"<?= $Grid->Volume1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Volume1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Volume1">
<span<?= $Grid->Volume1->viewAttributes() ?>>
<?= $Grid->Volume1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Volume1" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Volume1" value="<?= HtmlEncode($Grid->Volume1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Volume1" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Volume1" value="<?= HtmlEncode($Grid->Volume1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Concentration1->Visible) { // Concentration1 ?>
        <td data-name="Concentration1" <?= $Grid->Concentration1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Concentration1" class="form-group">
<input type="<?= $Grid->Concentration1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="x<?= $Grid->RowIndex ?>_Concentration1" id="x<?= $Grid->RowIndex ?>_Concentration1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Concentration1->getPlaceHolder()) ?>" value="<?= $Grid->Concentration1->EditValue ?>"<?= $Grid->Concentration1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Concentration1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Concentration1" id="o<?= $Grid->RowIndex ?>_Concentration1" value="<?= HtmlEncode($Grid->Concentration1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Concentration1" class="form-group">
<input type="<?= $Grid->Concentration1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="x<?= $Grid->RowIndex ?>_Concentration1" id="x<?= $Grid->RowIndex ?>_Concentration1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Concentration1->getPlaceHolder()) ?>" value="<?= $Grid->Concentration1->EditValue ?>"<?= $Grid->Concentration1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Concentration1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Concentration1">
<span<?= $Grid->Concentration1->viewAttributes() ?>>
<?= $Grid->Concentration1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Concentration1" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Concentration1" value="<?= HtmlEncode($Grid->Concentration1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Concentration1" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Concentration1" value="<?= HtmlEncode($Grid->Concentration1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Total1->Visible) { // Total1 ?>
        <td data-name="Total1" <?= $Grid->Total1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Total1" class="form-group">
<input type="<?= $Grid->Total1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="x<?= $Grid->RowIndex ?>_Total1" id="x<?= $Grid->RowIndex ?>_Total1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Total1->getPlaceHolder()) ?>" value="<?= $Grid->Total1->EditValue ?>"<?= $Grid->Total1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Total1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Total1" id="o<?= $Grid->RowIndex ?>_Total1" value="<?= HtmlEncode($Grid->Total1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Total1" class="form-group">
<input type="<?= $Grid->Total1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="x<?= $Grid->RowIndex ?>_Total1" id="x<?= $Grid->RowIndex ?>_Total1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Total1->getPlaceHolder()) ?>" value="<?= $Grid->Total1->EditValue ?>"<?= $Grid->Total1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Total1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Total1">
<span<?= $Grid->Total1->viewAttributes() ?>>
<?= $Grid->Total1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Total1" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Total1" value="<?= HtmlEncode($Grid->Total1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Total1" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Total1" value="<?= HtmlEncode($Grid->Total1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
        <td data-name="ProgressiveMotility1" <?= $Grid->ProgressiveMotility1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility1" class="form-group">
<input type="<?= $Grid->ProgressiveMotility1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="x<?= $Grid->RowIndex ?>_ProgressiveMotility1" id="x<?= $Grid->RowIndex ?>_ProgressiveMotility1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->ProgressiveMotility1->getPlaceHolder()) ?>" value="<?= $Grid->ProgressiveMotility1->EditValue ?>"<?= $Grid->ProgressiveMotility1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProgressiveMotility1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ProgressiveMotility1" id="o<?= $Grid->RowIndex ?>_ProgressiveMotility1" value="<?= HtmlEncode($Grid->ProgressiveMotility1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility1" class="form-group">
<input type="<?= $Grid->ProgressiveMotility1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="x<?= $Grid->RowIndex ?>_ProgressiveMotility1" id="x<?= $Grid->RowIndex ?>_ProgressiveMotility1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->ProgressiveMotility1->getPlaceHolder()) ?>" value="<?= $Grid->ProgressiveMotility1->EditValue ?>"<?= $Grid->ProgressiveMotility1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProgressiveMotility1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility1">
<span<?= $Grid->ProgressiveMotility1->viewAttributes() ?>>
<?= $Grid->ProgressiveMotility1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_ProgressiveMotility1" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_ProgressiveMotility1" value="<?= HtmlEncode($Grid->ProgressiveMotility1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_ProgressiveMotility1" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_ProgressiveMotility1" value="<?= HtmlEncode($Grid->ProgressiveMotility1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
        <td data-name="NonProgrssiveMotile1" <?= $Grid->NonProgrssiveMotile1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile1" class="form-group">
<input type="<?= $Grid->NonProgrssiveMotile1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile1" id="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->NonProgrssiveMotile1->getPlaceHolder()) ?>" value="<?= $Grid->NonProgrssiveMotile1->EditValue ?>"<?= $Grid->NonProgrssiveMotile1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NonProgrssiveMotile1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NonProgrssiveMotile1" id="o<?= $Grid->RowIndex ?>_NonProgrssiveMotile1" value="<?= HtmlEncode($Grid->NonProgrssiveMotile1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile1" class="form-group">
<input type="<?= $Grid->NonProgrssiveMotile1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile1" id="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->NonProgrssiveMotile1->getPlaceHolder()) ?>" value="<?= $Grid->NonProgrssiveMotile1->EditValue ?>"<?= $Grid->NonProgrssiveMotile1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NonProgrssiveMotile1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile1">
<span<?= $Grid->NonProgrssiveMotile1->viewAttributes() ?>>
<?= $Grid->NonProgrssiveMotile1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_NonProgrssiveMotile1" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_NonProgrssiveMotile1" value="<?= HtmlEncode($Grid->NonProgrssiveMotile1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_NonProgrssiveMotile1" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_NonProgrssiveMotile1" value="<?= HtmlEncode($Grid->NonProgrssiveMotile1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Immotile1->Visible) { // Immotile1 ?>
        <td data-name="Immotile1" <?= $Grid->Immotile1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Immotile1" class="form-group">
<input type="<?= $Grid->Immotile1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="x<?= $Grid->RowIndex ?>_Immotile1" id="x<?= $Grid->RowIndex ?>_Immotile1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Immotile1->getPlaceHolder()) ?>" value="<?= $Grid->Immotile1->EditValue ?>"<?= $Grid->Immotile1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Immotile1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Immotile1" id="o<?= $Grid->RowIndex ?>_Immotile1" value="<?= HtmlEncode($Grid->Immotile1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Immotile1" class="form-group">
<input type="<?= $Grid->Immotile1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="x<?= $Grid->RowIndex ?>_Immotile1" id="x<?= $Grid->RowIndex ?>_Immotile1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Immotile1->getPlaceHolder()) ?>" value="<?= $Grid->Immotile1->EditValue ?>"<?= $Grid->Immotile1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Immotile1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Immotile1">
<span<?= $Grid->Immotile1->viewAttributes() ?>>
<?= $Grid->Immotile1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Immotile1" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Immotile1" value="<?= HtmlEncode($Grid->Immotile1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Immotile1" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Immotile1" value="<?= HtmlEncode($Grid->Immotile1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
        <td data-name="TotalProgrssiveMotile1" <?= $Grid->TotalProgrssiveMotile1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="form-group">
<input type="<?= $Grid->TotalProgrssiveMotile1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile1" id="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->TotalProgrssiveMotile1->getPlaceHolder()) ?>" value="<?= $Grid->TotalProgrssiveMotile1->EditValue ?>"<?= $Grid->TotalProgrssiveMotile1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TotalProgrssiveMotile1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TotalProgrssiveMotile1" id="o<?= $Grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?= HtmlEncode($Grid->TotalProgrssiveMotile1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="form-group">
<input type="<?= $Grid->TotalProgrssiveMotile1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile1" id="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->TotalProgrssiveMotile1->getPlaceHolder()) ?>" value="<?= $Grid->TotalProgrssiveMotile1->EditValue ?>"<?= $Grid->TotalProgrssiveMotile1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TotalProgrssiveMotile1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile1">
<span<?= $Grid->TotalProgrssiveMotile1->viewAttributes() ?>>
<?= $Grid->TotalProgrssiveMotile1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile1" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?= HtmlEncode($Grid->TotalProgrssiveMotile1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_TotalProgrssiveMotile1" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?= HtmlEncode($Grid->TotalProgrssiveMotile1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Grid->TidNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->TidNo->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TidNo" class="form-group">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TidNo->getDisplayValue($Grid->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TidNo" class="form-group">
<input type="<?= $Grid->TidNo->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Grid->TidNo->getPlaceHolder()) ?>" value="<?= $Grid->TidNo->EditValue ?>"<?= $Grid->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TidNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TidNo" id="o<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->TidNo->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TidNo" class="form-group">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TidNo->getDisplayValue($Grid->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TidNo" class="form-group">
<input type="<?= $Grid->TidNo->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Grid->TidNo->getPlaceHolder()) ?>" value="<?= $Grid->TidNo->EditValue ?>"<?= $Grid->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TidNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TidNo">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<?= $Grid->TidNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_TidNo" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_TidNo" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Color->Visible) { // Color ?>
        <td data-name="Color" <?= $Grid->Color->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Color" class="form-group">
<input type="<?= $Grid->Color->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Color" name="x<?= $Grid->RowIndex ?>_Color" id="x<?= $Grid->RowIndex ?>_Color" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Color->getPlaceHolder()) ?>" value="<?= $Grid->Color->EditValue ?>"<?= $Grid->Color->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Color->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Color" id="o<?= $Grid->RowIndex ?>_Color" value="<?= HtmlEncode($Grid->Color->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Color" class="form-group">
<input type="<?= $Grid->Color->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Color" name="x<?= $Grid->RowIndex ?>_Color" id="x<?= $Grid->RowIndex ?>_Color" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Color->getPlaceHolder()) ?>" value="<?= $Grid->Color->EditValue ?>"<?= $Grid->Color->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Color->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Color">
<span<?= $Grid->Color->viewAttributes() ?>>
<?= $Grid->Color->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Color" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Color" value="<?= HtmlEncode($Grid->Color->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Color" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Color" value="<?= HtmlEncode($Grid->Color->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DoneBy->Visible) { // DoneBy ?>
        <td data-name="DoneBy" <?= $Grid->DoneBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_DoneBy" class="form-group">
<input type="<?= $Grid->DoneBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="x<?= $Grid->RowIndex ?>_DoneBy" id="x<?= $Grid->RowIndex ?>_DoneBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DoneBy->getPlaceHolder()) ?>" value="<?= $Grid->DoneBy->EditValue ?>"<?= $Grid->DoneBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DoneBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DoneBy" id="o<?= $Grid->RowIndex ?>_DoneBy" value="<?= HtmlEncode($Grid->DoneBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_DoneBy" class="form-group">
<input type="<?= $Grid->DoneBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="x<?= $Grid->RowIndex ?>_DoneBy" id="x<?= $Grid->RowIndex ?>_DoneBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DoneBy->getPlaceHolder()) ?>" value="<?= $Grid->DoneBy->EditValue ?>"<?= $Grid->DoneBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DoneBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_DoneBy">
<span<?= $Grid->DoneBy->viewAttributes() ?>>
<?= $Grid->DoneBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_DoneBy" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_DoneBy" value="<?= HtmlEncode($Grid->DoneBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_DoneBy" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_DoneBy" value="<?= HtmlEncode($Grid->DoneBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Method->Visible) { // Method ?>
        <td data-name="Method" <?= $Grid->Method->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Method" class="form-group">
<input type="<?= $Grid->Method->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Method" name="x<?= $Grid->RowIndex ?>_Method" id="x<?= $Grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Method->getPlaceHolder()) ?>" value="<?= $Grid->Method->EditValue ?>"<?= $Grid->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Method->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Method" id="o<?= $Grid->RowIndex ?>_Method" value="<?= HtmlEncode($Grid->Method->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Method" class="form-group">
<input type="<?= $Grid->Method->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Method" name="x<?= $Grid->RowIndex ?>_Method" id="x<?= $Grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Method->getPlaceHolder()) ?>" value="<?= $Grid->Method->EditValue ?>"<?= $Grid->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Method->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Method">
<span<?= $Grid->Method->viewAttributes() ?>>
<?= $Grid->Method->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Method" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Method" value="<?= HtmlEncode($Grid->Method->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Method" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Method" value="<?= HtmlEncode($Grid->Method->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Abstinence->Visible) { // Abstinence ?>
        <td data-name="Abstinence" <?= $Grid->Abstinence->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Abstinence" class="form-group">
<input type="<?= $Grid->Abstinence->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="x<?= $Grid->RowIndex ?>_Abstinence" id="x<?= $Grid->RowIndex ?>_Abstinence" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Abstinence->getPlaceHolder()) ?>" value="<?= $Grid->Abstinence->EditValue ?>"<?= $Grid->Abstinence->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Abstinence->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Abstinence" id="o<?= $Grid->RowIndex ?>_Abstinence" value="<?= HtmlEncode($Grid->Abstinence->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Abstinence" class="form-group">
<input type="<?= $Grid->Abstinence->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="x<?= $Grid->RowIndex ?>_Abstinence" id="x<?= $Grid->RowIndex ?>_Abstinence" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Abstinence->getPlaceHolder()) ?>" value="<?= $Grid->Abstinence->EditValue ?>"<?= $Grid->Abstinence->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Abstinence->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Abstinence">
<span<?= $Grid->Abstinence->viewAttributes() ?>>
<?= $Grid->Abstinence->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Abstinence" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Abstinence" value="<?= HtmlEncode($Grid->Abstinence->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Abstinence" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Abstinence" value="<?= HtmlEncode($Grid->Abstinence->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ProcessedBy->Visible) { // ProcessedBy ?>
        <td data-name="ProcessedBy" <?= $Grid->ProcessedBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_ProcessedBy" class="form-group">
<input type="<?= $Grid->ProcessedBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="x<?= $Grid->RowIndex ?>_ProcessedBy" id="x<?= $Grid->RowIndex ?>_ProcessedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ProcessedBy->getPlaceHolder()) ?>" value="<?= $Grid->ProcessedBy->EditValue ?>"<?= $Grid->ProcessedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProcessedBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ProcessedBy" id="o<?= $Grid->RowIndex ?>_ProcessedBy" value="<?= HtmlEncode($Grid->ProcessedBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_ProcessedBy" class="form-group">
<input type="<?= $Grid->ProcessedBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="x<?= $Grid->RowIndex ?>_ProcessedBy" id="x<?= $Grid->RowIndex ?>_ProcessedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ProcessedBy->getPlaceHolder()) ?>" value="<?= $Grid->ProcessedBy->EditValue ?>"<?= $Grid->ProcessedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProcessedBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_ProcessedBy">
<span<?= $Grid->ProcessedBy->viewAttributes() ?>>
<?= $Grid->ProcessedBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_ProcessedBy" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_ProcessedBy" value="<?= HtmlEncode($Grid->ProcessedBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_ProcessedBy" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_ProcessedBy" value="<?= HtmlEncode($Grid->ProcessedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->InseminationTime->Visible) { // InseminationTime ?>
        <td data-name="InseminationTime" <?= $Grid->InseminationTime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_InseminationTime" class="form-group">
<input type="<?= $Grid->InseminationTime->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="x<?= $Grid->RowIndex ?>_InseminationTime" id="x<?= $Grid->RowIndex ?>_InseminationTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->InseminationTime->getPlaceHolder()) ?>" value="<?= $Grid->InseminationTime->EditValue ?>"<?= $Grid->InseminationTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->InseminationTime->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_InseminationTime" id="o<?= $Grid->RowIndex ?>_InseminationTime" value="<?= HtmlEncode($Grid->InseminationTime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_InseminationTime" class="form-group">
<input type="<?= $Grid->InseminationTime->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="x<?= $Grid->RowIndex ?>_InseminationTime" id="x<?= $Grid->RowIndex ?>_InseminationTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->InseminationTime->getPlaceHolder()) ?>" value="<?= $Grid->InseminationTime->EditValue ?>"<?= $Grid->InseminationTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->InseminationTime->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_InseminationTime">
<span<?= $Grid->InseminationTime->viewAttributes() ?>>
<?= $Grid->InseminationTime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_InseminationTime" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_InseminationTime" value="<?= HtmlEncode($Grid->InseminationTime->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_InseminationTime" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_InseminationTime" value="<?= HtmlEncode($Grid->InseminationTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->InseminationBy->Visible) { // InseminationBy ?>
        <td data-name="InseminationBy" <?= $Grid->InseminationBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_InseminationBy" class="form-group">
<input type="<?= $Grid->InseminationBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="x<?= $Grid->RowIndex ?>_InseminationBy" id="x<?= $Grid->RowIndex ?>_InseminationBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->InseminationBy->getPlaceHolder()) ?>" value="<?= $Grid->InseminationBy->EditValue ?>"<?= $Grid->InseminationBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->InseminationBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_InseminationBy" id="o<?= $Grid->RowIndex ?>_InseminationBy" value="<?= HtmlEncode($Grid->InseminationBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_InseminationBy" class="form-group">
<input type="<?= $Grid->InseminationBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="x<?= $Grid->RowIndex ?>_InseminationBy" id="x<?= $Grid->RowIndex ?>_InseminationBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->InseminationBy->getPlaceHolder()) ?>" value="<?= $Grid->InseminationBy->EditValue ?>"<?= $Grid->InseminationBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->InseminationBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_InseminationBy">
<span<?= $Grid->InseminationBy->viewAttributes() ?>>
<?= $Grid->InseminationBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_InseminationBy" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_InseminationBy" value="<?= HtmlEncode($Grid->InseminationBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_InseminationBy" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_InseminationBy" value="<?= HtmlEncode($Grid->InseminationBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Big->Visible) { // Big ?>
        <td data-name="Big" <?= $Grid->Big->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Big" class="form-group">
<input type="<?= $Grid->Big->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Big" name="x<?= $Grid->RowIndex ?>_Big" id="x<?= $Grid->RowIndex ?>_Big" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Big->getPlaceHolder()) ?>" value="<?= $Grid->Big->EditValue ?>"<?= $Grid->Big->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Big->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Big" id="o<?= $Grid->RowIndex ?>_Big" value="<?= HtmlEncode($Grid->Big->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Big" class="form-group">
<input type="<?= $Grid->Big->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Big" name="x<?= $Grid->RowIndex ?>_Big" id="x<?= $Grid->RowIndex ?>_Big" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Big->getPlaceHolder()) ?>" value="<?= $Grid->Big->EditValue ?>"<?= $Grid->Big->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Big->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Big">
<span<?= $Grid->Big->viewAttributes() ?>>
<?= $Grid->Big->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Big" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Big" value="<?= HtmlEncode($Grid->Big->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Big" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Big" value="<?= HtmlEncode($Grid->Big->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Medium->Visible) { // Medium ?>
        <td data-name="Medium" <?= $Grid->Medium->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Medium" class="form-group">
<input type="<?= $Grid->Medium->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="x<?= $Grid->RowIndex ?>_Medium" id="x<?= $Grid->RowIndex ?>_Medium" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Medium->getPlaceHolder()) ?>" value="<?= $Grid->Medium->EditValue ?>"<?= $Grid->Medium->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Medium->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Medium" id="o<?= $Grid->RowIndex ?>_Medium" value="<?= HtmlEncode($Grid->Medium->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Medium" class="form-group">
<input type="<?= $Grid->Medium->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="x<?= $Grid->RowIndex ?>_Medium" id="x<?= $Grid->RowIndex ?>_Medium" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Medium->getPlaceHolder()) ?>" value="<?= $Grid->Medium->EditValue ?>"<?= $Grid->Medium->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Medium->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Medium">
<span<?= $Grid->Medium->viewAttributes() ?>>
<?= $Grid->Medium->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Medium" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Medium" value="<?= HtmlEncode($Grid->Medium->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Medium" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Medium" value="<?= HtmlEncode($Grid->Medium->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Small->Visible) { // Small ?>
        <td data-name="Small" <?= $Grid->Small->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Small" class="form-group">
<input type="<?= $Grid->Small->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Small" name="x<?= $Grid->RowIndex ?>_Small" id="x<?= $Grid->RowIndex ?>_Small" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Small->getPlaceHolder()) ?>" value="<?= $Grid->Small->EditValue ?>"<?= $Grid->Small->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Small->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Small" id="o<?= $Grid->RowIndex ?>_Small" value="<?= HtmlEncode($Grid->Small->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Small" class="form-group">
<input type="<?= $Grid->Small->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Small" name="x<?= $Grid->RowIndex ?>_Small" id="x<?= $Grid->RowIndex ?>_Small" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Small->getPlaceHolder()) ?>" value="<?= $Grid->Small->EditValue ?>"<?= $Grid->Small->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Small->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Small">
<span<?= $Grid->Small->viewAttributes() ?>>
<?= $Grid->Small->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Small" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Small" value="<?= HtmlEncode($Grid->Small->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Small" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Small" value="<?= HtmlEncode($Grid->Small->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NoHalo->Visible) { // NoHalo ?>
        <td data-name="NoHalo" <?= $Grid->NoHalo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_NoHalo" class="form-group">
<input type="<?= $Grid->NoHalo->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="x<?= $Grid->RowIndex ?>_NoHalo" id="x<?= $Grid->RowIndex ?>_NoHalo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NoHalo->getPlaceHolder()) ?>" value="<?= $Grid->NoHalo->EditValue ?>"<?= $Grid->NoHalo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoHalo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NoHalo" id="o<?= $Grid->RowIndex ?>_NoHalo" value="<?= HtmlEncode($Grid->NoHalo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_NoHalo" class="form-group">
<input type="<?= $Grid->NoHalo->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="x<?= $Grid->RowIndex ?>_NoHalo" id="x<?= $Grid->RowIndex ?>_NoHalo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NoHalo->getPlaceHolder()) ?>" value="<?= $Grid->NoHalo->EditValue ?>"<?= $Grid->NoHalo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoHalo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_NoHalo">
<span<?= $Grid->NoHalo->viewAttributes() ?>>
<?= $Grid->NoHalo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_NoHalo" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_NoHalo" value="<?= HtmlEncode($Grid->NoHalo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_NoHalo" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_NoHalo" value="<?= HtmlEncode($Grid->NoHalo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Fragmented->Visible) { // Fragmented ?>
        <td data-name="Fragmented" <?= $Grid->Fragmented->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Fragmented" class="form-group">
<input type="<?= $Grid->Fragmented->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="x<?= $Grid->RowIndex ?>_Fragmented" id="x<?= $Grid->RowIndex ?>_Fragmented" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Fragmented->getPlaceHolder()) ?>" value="<?= $Grid->Fragmented->EditValue ?>"<?= $Grid->Fragmented->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Fragmented->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Fragmented" id="o<?= $Grid->RowIndex ?>_Fragmented" value="<?= HtmlEncode($Grid->Fragmented->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Fragmented" class="form-group">
<input type="<?= $Grid->Fragmented->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="x<?= $Grid->RowIndex ?>_Fragmented" id="x<?= $Grid->RowIndex ?>_Fragmented" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Fragmented->getPlaceHolder()) ?>" value="<?= $Grid->Fragmented->EditValue ?>"<?= $Grid->Fragmented->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Fragmented->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Fragmented">
<span<?= $Grid->Fragmented->viewAttributes() ?>>
<?= $Grid->Fragmented->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Fragmented" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Fragmented" value="<?= HtmlEncode($Grid->Fragmented->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Fragmented" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Fragmented" value="<?= HtmlEncode($Grid->Fragmented->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NonFragmented->Visible) { // NonFragmented ?>
        <td data-name="NonFragmented" <?= $Grid->NonFragmented->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_NonFragmented" class="form-group">
<input type="<?= $Grid->NonFragmented->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="x<?= $Grid->RowIndex ?>_NonFragmented" id="x<?= $Grid->RowIndex ?>_NonFragmented" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NonFragmented->getPlaceHolder()) ?>" value="<?= $Grid->NonFragmented->EditValue ?>"<?= $Grid->NonFragmented->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NonFragmented->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NonFragmented" id="o<?= $Grid->RowIndex ?>_NonFragmented" value="<?= HtmlEncode($Grid->NonFragmented->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_NonFragmented" class="form-group">
<input type="<?= $Grid->NonFragmented->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="x<?= $Grid->RowIndex ?>_NonFragmented" id="x<?= $Grid->RowIndex ?>_NonFragmented" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NonFragmented->getPlaceHolder()) ?>" value="<?= $Grid->NonFragmented->EditValue ?>"<?= $Grid->NonFragmented->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NonFragmented->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_NonFragmented">
<span<?= $Grid->NonFragmented->viewAttributes() ?>>
<?= $Grid->NonFragmented->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_NonFragmented" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_NonFragmented" value="<?= HtmlEncode($Grid->NonFragmented->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_NonFragmented" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_NonFragmented" value="<?= HtmlEncode($Grid->NonFragmented->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DFI->Visible) { // DFI ?>
        <td data-name="DFI" <?= $Grid->DFI->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_DFI" class="form-group">
<input type="<?= $Grid->DFI->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="x<?= $Grid->RowIndex ?>_DFI" id="x<?= $Grid->RowIndex ?>_DFI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DFI->getPlaceHolder()) ?>" value="<?= $Grid->DFI->EditValue ?>"<?= $Grid->DFI->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DFI->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DFI" id="o<?= $Grid->RowIndex ?>_DFI" value="<?= HtmlEncode($Grid->DFI->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_DFI" class="form-group">
<input type="<?= $Grid->DFI->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="x<?= $Grid->RowIndex ?>_DFI" id="x<?= $Grid->RowIndex ?>_DFI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DFI->getPlaceHolder()) ?>" value="<?= $Grid->DFI->EditValue ?>"<?= $Grid->DFI->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DFI->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_DFI">
<span<?= $Grid->DFI->viewAttributes() ?>>
<?= $Grid->DFI->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_DFI" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_DFI" value="<?= HtmlEncode($Grid->DFI->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_DFI" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_DFI" value="<?= HtmlEncode($Grid->DFI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->IsueBy->Visible) { // IsueBy ?>
        <td data-name="IsueBy" <?= $Grid->IsueBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_IsueBy" class="form-group">
<input type="<?= $Grid->IsueBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="x<?= $Grid->RowIndex ?>_IsueBy" id="x<?= $Grid->RowIndex ?>_IsueBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IsueBy->getPlaceHolder()) ?>" value="<?= $Grid->IsueBy->EditValue ?>"<?= $Grid->IsueBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IsueBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IsueBy" id="o<?= $Grid->RowIndex ?>_IsueBy" value="<?= HtmlEncode($Grid->IsueBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_IsueBy" class="form-group">
<input type="<?= $Grid->IsueBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="x<?= $Grid->RowIndex ?>_IsueBy" id="x<?= $Grid->RowIndex ?>_IsueBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IsueBy->getPlaceHolder()) ?>" value="<?= $Grid->IsueBy->EditValue ?>"<?= $Grid->IsueBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IsueBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_IsueBy">
<span<?= $Grid->IsueBy->viewAttributes() ?>>
<?= $Grid->IsueBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_IsueBy" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_IsueBy" value="<?= HtmlEncode($Grid->IsueBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_IsueBy" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_IsueBy" value="<?= HtmlEncode($Grid->IsueBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Volume2->Visible) { // Volume2 ?>
        <td data-name="Volume2" <?= $Grid->Volume2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Volume2" class="form-group">
<input type="<?= $Grid->Volume2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="x<?= $Grid->RowIndex ?>_Volume2" id="x<?= $Grid->RowIndex ?>_Volume2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Volume2->getPlaceHolder()) ?>" value="<?= $Grid->Volume2->EditValue ?>"<?= $Grid->Volume2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Volume2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Volume2" id="o<?= $Grid->RowIndex ?>_Volume2" value="<?= HtmlEncode($Grid->Volume2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Volume2" class="form-group">
<input type="<?= $Grid->Volume2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="x<?= $Grid->RowIndex ?>_Volume2" id="x<?= $Grid->RowIndex ?>_Volume2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Volume2->getPlaceHolder()) ?>" value="<?= $Grid->Volume2->EditValue ?>"<?= $Grid->Volume2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Volume2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Volume2">
<span<?= $Grid->Volume2->viewAttributes() ?>>
<?= $Grid->Volume2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Volume2" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Volume2" value="<?= HtmlEncode($Grid->Volume2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Volume2" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Volume2" value="<?= HtmlEncode($Grid->Volume2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Concentration2->Visible) { // Concentration2 ?>
        <td data-name="Concentration2" <?= $Grid->Concentration2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Concentration2" class="form-group">
<input type="<?= $Grid->Concentration2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="x<?= $Grid->RowIndex ?>_Concentration2" id="x<?= $Grid->RowIndex ?>_Concentration2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Concentration2->getPlaceHolder()) ?>" value="<?= $Grid->Concentration2->EditValue ?>"<?= $Grid->Concentration2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Concentration2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Concentration2" id="o<?= $Grid->RowIndex ?>_Concentration2" value="<?= HtmlEncode($Grid->Concentration2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Concentration2" class="form-group">
<input type="<?= $Grid->Concentration2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="x<?= $Grid->RowIndex ?>_Concentration2" id="x<?= $Grid->RowIndex ?>_Concentration2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Concentration2->getPlaceHolder()) ?>" value="<?= $Grid->Concentration2->EditValue ?>"<?= $Grid->Concentration2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Concentration2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Concentration2">
<span<?= $Grid->Concentration2->viewAttributes() ?>>
<?= $Grid->Concentration2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Concentration2" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Concentration2" value="<?= HtmlEncode($Grid->Concentration2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Concentration2" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Concentration2" value="<?= HtmlEncode($Grid->Concentration2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Total2->Visible) { // Total2 ?>
        <td data-name="Total2" <?= $Grid->Total2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Total2" class="form-group">
<input type="<?= $Grid->Total2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="x<?= $Grid->RowIndex ?>_Total2" id="x<?= $Grid->RowIndex ?>_Total2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Total2->getPlaceHolder()) ?>" value="<?= $Grid->Total2->EditValue ?>"<?= $Grid->Total2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Total2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Total2" id="o<?= $Grid->RowIndex ?>_Total2" value="<?= HtmlEncode($Grid->Total2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Total2" class="form-group">
<input type="<?= $Grid->Total2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="x<?= $Grid->RowIndex ?>_Total2" id="x<?= $Grid->RowIndex ?>_Total2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Total2->getPlaceHolder()) ?>" value="<?= $Grid->Total2->EditValue ?>"<?= $Grid->Total2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Total2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Total2">
<span<?= $Grid->Total2->viewAttributes() ?>>
<?= $Grid->Total2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Total2" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Total2" value="<?= HtmlEncode($Grid->Total2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Total2" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Total2" value="<?= HtmlEncode($Grid->Total2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
        <td data-name="ProgressiveMotility2" <?= $Grid->ProgressiveMotility2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility2" class="form-group">
<input type="<?= $Grid->ProgressiveMotility2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="x<?= $Grid->RowIndex ?>_ProgressiveMotility2" id="x<?= $Grid->RowIndex ?>_ProgressiveMotility2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ProgressiveMotility2->getPlaceHolder()) ?>" value="<?= $Grid->ProgressiveMotility2->EditValue ?>"<?= $Grid->ProgressiveMotility2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProgressiveMotility2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ProgressiveMotility2" id="o<?= $Grid->RowIndex ?>_ProgressiveMotility2" value="<?= HtmlEncode($Grid->ProgressiveMotility2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility2" class="form-group">
<input type="<?= $Grid->ProgressiveMotility2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="x<?= $Grid->RowIndex ?>_ProgressiveMotility2" id="x<?= $Grid->RowIndex ?>_ProgressiveMotility2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ProgressiveMotility2->getPlaceHolder()) ?>" value="<?= $Grid->ProgressiveMotility2->EditValue ?>"<?= $Grid->ProgressiveMotility2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProgressiveMotility2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility2">
<span<?= $Grid->ProgressiveMotility2->viewAttributes() ?>>
<?= $Grid->ProgressiveMotility2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_ProgressiveMotility2" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_ProgressiveMotility2" value="<?= HtmlEncode($Grid->ProgressiveMotility2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_ProgressiveMotility2" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_ProgressiveMotility2" value="<?= HtmlEncode($Grid->ProgressiveMotility2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
        <td data-name="NonProgrssiveMotile2" <?= $Grid->NonProgrssiveMotile2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile2" class="form-group">
<input type="<?= $Grid->NonProgrssiveMotile2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile2" id="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NonProgrssiveMotile2->getPlaceHolder()) ?>" value="<?= $Grid->NonProgrssiveMotile2->EditValue ?>"<?= $Grid->NonProgrssiveMotile2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NonProgrssiveMotile2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NonProgrssiveMotile2" id="o<?= $Grid->RowIndex ?>_NonProgrssiveMotile2" value="<?= HtmlEncode($Grid->NonProgrssiveMotile2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile2" class="form-group">
<input type="<?= $Grid->NonProgrssiveMotile2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile2" id="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NonProgrssiveMotile2->getPlaceHolder()) ?>" value="<?= $Grid->NonProgrssiveMotile2->EditValue ?>"<?= $Grid->NonProgrssiveMotile2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NonProgrssiveMotile2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile2">
<span<?= $Grid->NonProgrssiveMotile2->viewAttributes() ?>>
<?= $Grid->NonProgrssiveMotile2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_NonProgrssiveMotile2" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_NonProgrssiveMotile2" value="<?= HtmlEncode($Grid->NonProgrssiveMotile2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_NonProgrssiveMotile2" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_NonProgrssiveMotile2" value="<?= HtmlEncode($Grid->NonProgrssiveMotile2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Immotile2->Visible) { // Immotile2 ?>
        <td data-name="Immotile2" <?= $Grid->Immotile2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Immotile2" class="form-group">
<input type="<?= $Grid->Immotile2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="x<?= $Grid->RowIndex ?>_Immotile2" id="x<?= $Grid->RowIndex ?>_Immotile2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Immotile2->getPlaceHolder()) ?>" value="<?= $Grid->Immotile2->EditValue ?>"<?= $Grid->Immotile2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Immotile2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Immotile2" id="o<?= $Grid->RowIndex ?>_Immotile2" value="<?= HtmlEncode($Grid->Immotile2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Immotile2" class="form-group">
<input type="<?= $Grid->Immotile2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="x<?= $Grid->RowIndex ?>_Immotile2" id="x<?= $Grid->RowIndex ?>_Immotile2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Immotile2->getPlaceHolder()) ?>" value="<?= $Grid->Immotile2->EditValue ?>"<?= $Grid->Immotile2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Immotile2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_Immotile2">
<span<?= $Grid->Immotile2->viewAttributes() ?>>
<?= $Grid->Immotile2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Immotile2" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_Immotile2" value="<?= HtmlEncode($Grid->Immotile2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Immotile2" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_Immotile2" value="<?= HtmlEncode($Grid->Immotile2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
        <td data-name="TotalProgrssiveMotile2" <?= $Grid->TotalProgrssiveMotile2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="form-group">
<input type="<?= $Grid->TotalProgrssiveMotile2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile2" id="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TotalProgrssiveMotile2->getPlaceHolder()) ?>" value="<?= $Grid->TotalProgrssiveMotile2->EditValue ?>"<?= $Grid->TotalProgrssiveMotile2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TotalProgrssiveMotile2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TotalProgrssiveMotile2" id="o<?= $Grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?= HtmlEncode($Grid->TotalProgrssiveMotile2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="form-group">
<input type="<?= $Grid->TotalProgrssiveMotile2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile2" id="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TotalProgrssiveMotile2->getPlaceHolder()) ?>" value="<?= $Grid->TotalProgrssiveMotile2->EditValue ?>"<?= $Grid->TotalProgrssiveMotile2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TotalProgrssiveMotile2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile2">
<span<?= $Grid->TotalProgrssiveMotile2->viewAttributes() ?>>
<?= $Grid->TotalProgrssiveMotile2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile2" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?= HtmlEncode($Grid->TotalProgrssiveMotile2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_TotalProgrssiveMotile2" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?= HtmlEncode($Grid->TotalProgrssiveMotile2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->IssuedBy->Visible) { // IssuedBy ?>
        <td data-name="IssuedBy" <?= $Grid->IssuedBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_IssuedBy" class="form-group">
<input type="<?= $Grid->IssuedBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="x<?= $Grid->RowIndex ?>_IssuedBy" id="x<?= $Grid->RowIndex ?>_IssuedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IssuedBy->getPlaceHolder()) ?>" value="<?= $Grid->IssuedBy->EditValue ?>"<?= $Grid->IssuedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IssuedBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IssuedBy" id="o<?= $Grid->RowIndex ?>_IssuedBy" value="<?= HtmlEncode($Grid->IssuedBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_IssuedBy" class="form-group">
<input type="<?= $Grid->IssuedBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="x<?= $Grid->RowIndex ?>_IssuedBy" id="x<?= $Grid->RowIndex ?>_IssuedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IssuedBy->getPlaceHolder()) ?>" value="<?= $Grid->IssuedBy->EditValue ?>"<?= $Grid->IssuedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IssuedBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_IssuedBy">
<span<?= $Grid->IssuedBy->viewAttributes() ?>>
<?= $Grid->IssuedBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_IssuedBy" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_IssuedBy" value="<?= HtmlEncode($Grid->IssuedBy->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_IssuedBy" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_IssuedBy" value="<?= HtmlEncode($Grid->IssuedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->IssuedTo->Visible) { // IssuedTo ?>
        <td data-name="IssuedTo" <?= $Grid->IssuedTo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_IssuedTo" class="form-group">
<input type="<?= $Grid->IssuedTo->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="x<?= $Grid->RowIndex ?>_IssuedTo" id="x<?= $Grid->RowIndex ?>_IssuedTo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IssuedTo->getPlaceHolder()) ?>" value="<?= $Grid->IssuedTo->EditValue ?>"<?= $Grid->IssuedTo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IssuedTo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IssuedTo" id="o<?= $Grid->RowIndex ?>_IssuedTo" value="<?= HtmlEncode($Grid->IssuedTo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_IssuedTo" class="form-group">
<input type="<?= $Grid->IssuedTo->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="x<?= $Grid->RowIndex ?>_IssuedTo" id="x<?= $Grid->RowIndex ?>_IssuedTo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IssuedTo->getPlaceHolder()) ?>" value="<?= $Grid->IssuedTo->EditValue ?>"<?= $Grid->IssuedTo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IssuedTo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_IssuedTo">
<span<?= $Grid->IssuedTo->viewAttributes() ?>>
<?= $Grid->IssuedTo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_IssuedTo" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_IssuedTo" value="<?= HtmlEncode($Grid->IssuedTo->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_IssuedTo" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_IssuedTo" value="<?= HtmlEncode($Grid->IssuedTo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PaID->Visible) { // PaID ?>
        <td data-name="PaID" <?= $Grid->PaID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PaID" class="form-group">
<input type="<?= $Grid->PaID->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="x<?= $Grid->RowIndex ?>_PaID" id="x<?= $Grid->RowIndex ?>_PaID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaID->getPlaceHolder()) ?>" value="<?= $Grid->PaID->EditValue ?>"<?= $Grid->PaID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PaID" id="o<?= $Grid->RowIndex ?>_PaID" value="<?= HtmlEncode($Grid->PaID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PaID" class="form-group">
<input type="<?= $Grid->PaID->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="x<?= $Grid->RowIndex ?>_PaID" id="x<?= $Grid->RowIndex ?>_PaID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaID->getPlaceHolder()) ?>" value="<?= $Grid->PaID->EditValue ?>"<?= $Grid->PaID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PaID">
<span<?= $Grid->PaID->viewAttributes() ?>>
<?= $Grid->PaID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_PaID" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_PaID" value="<?= HtmlEncode($Grid->PaID->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_PaID" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_PaID" value="<?= HtmlEncode($Grid->PaID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PaName->Visible) { // PaName ?>
        <td data-name="PaName" <?= $Grid->PaName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PaName" class="form-group">
<input type="<?= $Grid->PaName->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="x<?= $Grid->RowIndex ?>_PaName" id="x<?= $Grid->RowIndex ?>_PaName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaName->getPlaceHolder()) ?>" value="<?= $Grid->PaName->EditValue ?>"<?= $Grid->PaName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PaName" id="o<?= $Grid->RowIndex ?>_PaName" value="<?= HtmlEncode($Grid->PaName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PaName" class="form-group">
<input type="<?= $Grid->PaName->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="x<?= $Grid->RowIndex ?>_PaName" id="x<?= $Grid->RowIndex ?>_PaName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaName->getPlaceHolder()) ?>" value="<?= $Grid->PaName->EditValue ?>"<?= $Grid->PaName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PaName">
<span<?= $Grid->PaName->viewAttributes() ?>>
<?= $Grid->PaName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_PaName" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_PaName" value="<?= HtmlEncode($Grid->PaName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_PaName" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_PaName" value="<?= HtmlEncode($Grid->PaName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PaMobile->Visible) { // PaMobile ?>
        <td data-name="PaMobile" <?= $Grid->PaMobile->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PaMobile" class="form-group">
<input type="<?= $Grid->PaMobile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="x<?= $Grid->RowIndex ?>_PaMobile" id="x<?= $Grid->RowIndex ?>_PaMobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaMobile->getPlaceHolder()) ?>" value="<?= $Grid->PaMobile->EditValue ?>"<?= $Grid->PaMobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaMobile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PaMobile" id="o<?= $Grid->RowIndex ?>_PaMobile" value="<?= HtmlEncode($Grid->PaMobile->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PaMobile" class="form-group">
<input type="<?= $Grid->PaMobile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="x<?= $Grid->RowIndex ?>_PaMobile" id="x<?= $Grid->RowIndex ?>_PaMobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaMobile->getPlaceHolder()) ?>" value="<?= $Grid->PaMobile->EditValue ?>"<?= $Grid->PaMobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaMobile->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PaMobile">
<span<?= $Grid->PaMobile->viewAttributes() ?>>
<?= $Grid->PaMobile->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_PaMobile" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_PaMobile" value="<?= HtmlEncode($Grid->PaMobile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_PaMobile" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_PaMobile" value="<?= HtmlEncode($Grid->PaMobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PartnerID->Visible) { // PartnerID ?>
        <td data-name="PartnerID" <?= $Grid->PartnerID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PartnerID" class="form-group">
<input type="<?= $Grid->PartnerID->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="x<?= $Grid->RowIndex ?>_PartnerID" id="x<?= $Grid->RowIndex ?>_PartnerID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PartnerID->getPlaceHolder()) ?>" value="<?= $Grid->PartnerID->EditValue ?>"<?= $Grid->PartnerID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PartnerID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PartnerID" id="o<?= $Grid->RowIndex ?>_PartnerID" value="<?= HtmlEncode($Grid->PartnerID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PartnerID" class="form-group">
<input type="<?= $Grid->PartnerID->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="x<?= $Grid->RowIndex ?>_PartnerID" id="x<?= $Grid->RowIndex ?>_PartnerID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PartnerID->getPlaceHolder()) ?>" value="<?= $Grid->PartnerID->EditValue ?>"<?= $Grid->PartnerID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PartnerID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PartnerID">
<span<?= $Grid->PartnerID->viewAttributes() ?>>
<?= $Grid->PartnerID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_PartnerID" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_PartnerID" value="<?= HtmlEncode($Grid->PartnerID->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_PartnerID" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_PartnerID" value="<?= HtmlEncode($Grid->PartnerID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PartnerName->Visible) { // PartnerName ?>
        <td data-name="PartnerName" <?= $Grid->PartnerName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PartnerName" class="form-group">
<input type="<?= $Grid->PartnerName->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="x<?= $Grid->RowIndex ?>_PartnerName" id="x<?= $Grid->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PartnerName->getPlaceHolder()) ?>" value="<?= $Grid->PartnerName->EditValue ?>"<?= $Grid->PartnerName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PartnerName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PartnerName" id="o<?= $Grid->RowIndex ?>_PartnerName" value="<?= HtmlEncode($Grid->PartnerName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PartnerName" class="form-group">
<input type="<?= $Grid->PartnerName->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="x<?= $Grid->RowIndex ?>_PartnerName" id="x<?= $Grid->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PartnerName->getPlaceHolder()) ?>" value="<?= $Grid->PartnerName->EditValue ?>"<?= $Grid->PartnerName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PartnerName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PartnerName">
<span<?= $Grid->PartnerName->viewAttributes() ?>>
<?= $Grid->PartnerName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_PartnerName" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_PartnerName" value="<?= HtmlEncode($Grid->PartnerName->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_PartnerName" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_PartnerName" value="<?= HtmlEncode($Grid->PartnerName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PartnerMobile->Visible) { // PartnerMobile ?>
        <td data-name="PartnerMobile" <?= $Grid->PartnerMobile->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PartnerMobile" class="form-group">
<input type="<?= $Grid->PartnerMobile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="x<?= $Grid->RowIndex ?>_PartnerMobile" id="x<?= $Grid->RowIndex ?>_PartnerMobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PartnerMobile->getPlaceHolder()) ?>" value="<?= $Grid->PartnerMobile->EditValue ?>"<?= $Grid->PartnerMobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PartnerMobile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PartnerMobile" id="o<?= $Grid->RowIndex ?>_PartnerMobile" value="<?= HtmlEncode($Grid->PartnerMobile->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PartnerMobile" class="form-group">
<input type="<?= $Grid->PartnerMobile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="x<?= $Grid->RowIndex ?>_PartnerMobile" id="x<?= $Grid->RowIndex ?>_PartnerMobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PartnerMobile->getPlaceHolder()) ?>" value="<?= $Grid->PartnerMobile->EditValue ?>"<?= $Grid->PartnerMobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PartnerMobile->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PartnerMobile">
<span<?= $Grid->PartnerMobile->viewAttributes() ?>>
<?= $Grid->PartnerMobile->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_PartnerMobile" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_PartnerMobile" value="<?= HtmlEncode($Grid->PartnerMobile->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_PartnerMobile" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_PartnerMobile" value="<?= HtmlEncode($Grid->PartnerMobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
        <td data-name="PREG_TEST_DATE" <?= $Grid->PREG_TEST_DATE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PREG_TEST_DATE" class="form-group">
<input type="<?= $Grid->PREG_TEST_DATE->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="x<?= $Grid->RowIndex ?>_PREG_TEST_DATE" id="x<?= $Grid->RowIndex ?>_PREG_TEST_DATE" placeholder="<?= HtmlEncode($Grid->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?= $Grid->PREG_TEST_DATE->EditValue ?>"<?= $Grid->PREG_TEST_DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PREG_TEST_DATE->getErrorMessage() ?></div>
<?php if (!$Grid->PREG_TEST_DATE->ReadOnly && !$Grid->PREG_TEST_DATE->Disabled && !isset($Grid->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($Grid->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?= $Grid->RowIndex ?>_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PREG_TEST_DATE" id="o<?= $Grid->RowIndex ?>_PREG_TEST_DATE" value="<?= HtmlEncode($Grid->PREG_TEST_DATE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PREG_TEST_DATE" class="form-group">
<input type="<?= $Grid->PREG_TEST_DATE->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="x<?= $Grid->RowIndex ?>_PREG_TEST_DATE" id="x<?= $Grid->RowIndex ?>_PREG_TEST_DATE" placeholder="<?= HtmlEncode($Grid->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?= $Grid->PREG_TEST_DATE->EditValue ?>"<?= $Grid->PREG_TEST_DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PREG_TEST_DATE->getErrorMessage() ?></div>
<?php if (!$Grid->PREG_TEST_DATE->ReadOnly && !$Grid->PREG_TEST_DATE->Disabled && !isset($Grid->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($Grid->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?= $Grid->RowIndex ?>_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_PREG_TEST_DATE">
<span<?= $Grid->PREG_TEST_DATE->viewAttributes() ?>>
<?= $Grid->PREG_TEST_DATE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_PREG_TEST_DATE" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_PREG_TEST_DATE" value="<?= HtmlEncode($Grid->PREG_TEST_DATE->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_PREG_TEST_DATE" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_PREG_TEST_DATE" value="<?= HtmlEncode($Grid->PREG_TEST_DATE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
        <td data-name="SPECIFIC_PROBLEMS" <?= $Grid->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS"
        name="x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS"
        class="form-control ew-select<?= $Grid->SPECIFIC_PROBLEMS->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS"
        data-table="ivf_semenanalysisreport"
        data-field="x_SPECIFIC_PROBLEMS"
        data-value-separator="<?= $Grid->SPECIFIC_PROBLEMS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->SPECIFIC_PROBLEMS->getPlaceHolder()) ?>"
        <?= $Grid->SPECIFIC_PROBLEMS->editAttributes() ?>>
        <?= $Grid->SPECIFIC_PROBLEMS->selectOptionListHtml("x{$Grid->RowIndex}_SPECIFIC_PROBLEMS") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->SPECIFIC_PROBLEMS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS']"),
        options = { name: "x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.SPECIFIC_PROBLEMS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.SPECIFIC_PROBLEMS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="o<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?= HtmlEncode($Grid->SPECIFIC_PROBLEMS->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS"
        name="x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS"
        class="form-control ew-select<?= $Grid->SPECIFIC_PROBLEMS->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS"
        data-table="ivf_semenanalysisreport"
        data-field="x_SPECIFIC_PROBLEMS"
        data-value-separator="<?= $Grid->SPECIFIC_PROBLEMS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->SPECIFIC_PROBLEMS->getPlaceHolder()) ?>"
        <?= $Grid->SPECIFIC_PROBLEMS->editAttributes() ?>>
        <?= $Grid->SPECIFIC_PROBLEMS->selectOptionListHtml("x{$Grid->RowIndex}_SPECIFIC_PROBLEMS") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->SPECIFIC_PROBLEMS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS']"),
        options = { name: "x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.SPECIFIC_PROBLEMS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.SPECIFIC_PROBLEMS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<span<?= $Grid->SPECIFIC_PROBLEMS->viewAttributes() ?>>
<?= $Grid->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?= HtmlEncode($Grid->SPECIFIC_PROBLEMS->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?= HtmlEncode($Grid->SPECIFIC_PROBLEMS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->IMSC_1->Visible) { // IMSC_1 ?>
        <td data-name="IMSC_1" <?= $Grid->IMSC_1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_IMSC_1" class="form-group">
<input type="<?= $Grid->IMSC_1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="x<?= $Grid->RowIndex ?>_IMSC_1" id="x<?= $Grid->RowIndex ?>_IMSC_1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IMSC_1->getPlaceHolder()) ?>" value="<?= $Grid->IMSC_1->EditValue ?>"<?= $Grid->IMSC_1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IMSC_1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IMSC_1" id="o<?= $Grid->RowIndex ?>_IMSC_1" value="<?= HtmlEncode($Grid->IMSC_1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_IMSC_1" class="form-group">
<input type="<?= $Grid->IMSC_1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="x<?= $Grid->RowIndex ?>_IMSC_1" id="x<?= $Grid->RowIndex ?>_IMSC_1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IMSC_1->getPlaceHolder()) ?>" value="<?= $Grid->IMSC_1->EditValue ?>"<?= $Grid->IMSC_1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IMSC_1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_IMSC_1">
<span<?= $Grid->IMSC_1->viewAttributes() ?>>
<?= $Grid->IMSC_1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_IMSC_1" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_IMSC_1" value="<?= HtmlEncode($Grid->IMSC_1->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_IMSC_1" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_IMSC_1" value="<?= HtmlEncode($Grid->IMSC_1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->IMSC_2->Visible) { // IMSC_2 ?>
        <td data-name="IMSC_2" <?= $Grid->IMSC_2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_IMSC_2" class="form-group">
<input type="<?= $Grid->IMSC_2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="x<?= $Grid->RowIndex ?>_IMSC_2" id="x<?= $Grid->RowIndex ?>_IMSC_2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IMSC_2->getPlaceHolder()) ?>" value="<?= $Grid->IMSC_2->EditValue ?>"<?= $Grid->IMSC_2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IMSC_2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IMSC_2" id="o<?= $Grid->RowIndex ?>_IMSC_2" value="<?= HtmlEncode($Grid->IMSC_2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_IMSC_2" class="form-group">
<input type="<?= $Grid->IMSC_2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="x<?= $Grid->RowIndex ?>_IMSC_2" id="x<?= $Grid->RowIndex ?>_IMSC_2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IMSC_2->getPlaceHolder()) ?>" value="<?= $Grid->IMSC_2->EditValue ?>"<?= $Grid->IMSC_2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IMSC_2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_IMSC_2">
<span<?= $Grid->IMSC_2->viewAttributes() ?>>
<?= $Grid->IMSC_2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_IMSC_2" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_IMSC_2" value="<?= HtmlEncode($Grid->IMSC_2->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_IMSC_2" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_IMSC_2" value="<?= HtmlEncode($Grid->IMSC_2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
        <td data-name="LIQUIFACTION_STORAGE" <?= $Grid->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE"
        name="x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE"
        class="form-control ew-select<?= $Grid->LIQUIFACTION_STORAGE->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE"
        data-table="ivf_semenanalysisreport"
        data-field="x_LIQUIFACTION_STORAGE"
        data-value-separator="<?= $Grid->LIQUIFACTION_STORAGE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->LIQUIFACTION_STORAGE->getPlaceHolder()) ?>"
        <?= $Grid->LIQUIFACTION_STORAGE->editAttributes() ?>>
        <?= $Grid->LIQUIFACTION_STORAGE->selectOptionListHtml("x{$Grid->RowIndex}_LIQUIFACTION_STORAGE") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->LIQUIFACTION_STORAGE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE']"),
        options = { name: "x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.LIQUIFACTION_STORAGE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.LIQUIFACTION_STORAGE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="o<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?= HtmlEncode($Grid->LIQUIFACTION_STORAGE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE"
        name="x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE"
        class="form-control ew-select<?= $Grid->LIQUIFACTION_STORAGE->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE"
        data-table="ivf_semenanalysisreport"
        data-field="x_LIQUIFACTION_STORAGE"
        data-value-separator="<?= $Grid->LIQUIFACTION_STORAGE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->LIQUIFACTION_STORAGE->getPlaceHolder()) ?>"
        <?= $Grid->LIQUIFACTION_STORAGE->editAttributes() ?>>
        <?= $Grid->LIQUIFACTION_STORAGE->selectOptionListHtml("x{$Grid->RowIndex}_LIQUIFACTION_STORAGE") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->LIQUIFACTION_STORAGE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE']"),
        options = { name: "x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.LIQUIFACTION_STORAGE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.LIQUIFACTION_STORAGE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<span<?= $Grid->LIQUIFACTION_STORAGE->viewAttributes() ?>>
<?= $Grid->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?= HtmlEncode($Grid->LIQUIFACTION_STORAGE->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?= HtmlEncode($Grid->LIQUIFACTION_STORAGE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
        <td data-name="IUI_PREP_METHOD" <?= $Grid->IUI_PREP_METHOD->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_IUI_PREP_METHOD" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD"
        name="x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD"
        class="form-control ew-select<?= $Grid->IUI_PREP_METHOD->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD"
        data-table="ivf_semenanalysisreport"
        data-field="x_IUI_PREP_METHOD"
        data-value-separator="<?= $Grid->IUI_PREP_METHOD->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->IUI_PREP_METHOD->getPlaceHolder()) ?>"
        <?= $Grid->IUI_PREP_METHOD->editAttributes() ?>>
        <?= $Grid->IUI_PREP_METHOD->selectOptionListHtml("x{$Grid->RowIndex}_IUI_PREP_METHOD") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->IUI_PREP_METHOD->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD']"),
        options = { name: "x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.IUI_PREP_METHOD.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.IUI_PREP_METHOD.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IUI_PREP_METHOD" id="o<?= $Grid->RowIndex ?>_IUI_PREP_METHOD" value="<?= HtmlEncode($Grid->IUI_PREP_METHOD->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_IUI_PREP_METHOD" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD"
        name="x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD"
        class="form-control ew-select<?= $Grid->IUI_PREP_METHOD->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD"
        data-table="ivf_semenanalysisreport"
        data-field="x_IUI_PREP_METHOD"
        data-value-separator="<?= $Grid->IUI_PREP_METHOD->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->IUI_PREP_METHOD->getPlaceHolder()) ?>"
        <?= $Grid->IUI_PREP_METHOD->editAttributes() ?>>
        <?= $Grid->IUI_PREP_METHOD->selectOptionListHtml("x{$Grid->RowIndex}_IUI_PREP_METHOD") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->IUI_PREP_METHOD->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD']"),
        options = { name: "x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.IUI_PREP_METHOD.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.IUI_PREP_METHOD.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_IUI_PREP_METHOD">
<span<?= $Grid->IUI_PREP_METHOD->viewAttributes() ?>>
<?= $Grid->IUI_PREP_METHOD->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD" value="<?= HtmlEncode($Grid->IUI_PREP_METHOD->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_IUI_PREP_METHOD" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_IUI_PREP_METHOD" value="<?= HtmlEncode($Grid->IUI_PREP_METHOD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
        <td data-name="TIME_FROM_TRIGGER" <?= $Grid->TIME_FROM_TRIGGER->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER"
        name="x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER"
        class="form-control ew-select<?= $Grid->TIME_FROM_TRIGGER->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER"
        data-table="ivf_semenanalysisreport"
        data-field="x_TIME_FROM_TRIGGER"
        data-value-separator="<?= $Grid->TIME_FROM_TRIGGER->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->TIME_FROM_TRIGGER->getPlaceHolder()) ?>"
        <?= $Grid->TIME_FROM_TRIGGER->editAttributes() ?>>
        <?= $Grid->TIME_FROM_TRIGGER->selectOptionListHtml("x{$Grid->RowIndex}_TIME_FROM_TRIGGER") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->TIME_FROM_TRIGGER->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER']"),
        options = { name: "x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.TIME_FROM_TRIGGER.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.TIME_FROM_TRIGGER.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER" id="o<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?= HtmlEncode($Grid->TIME_FROM_TRIGGER->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER"
        name="x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER"
        class="form-control ew-select<?= $Grid->TIME_FROM_TRIGGER->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER"
        data-table="ivf_semenanalysisreport"
        data-field="x_TIME_FROM_TRIGGER"
        data-value-separator="<?= $Grid->TIME_FROM_TRIGGER->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->TIME_FROM_TRIGGER->getPlaceHolder()) ?>"
        <?= $Grid->TIME_FROM_TRIGGER->editAttributes() ?>>
        <?= $Grid->TIME_FROM_TRIGGER->selectOptionListHtml("x{$Grid->RowIndex}_TIME_FROM_TRIGGER") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->TIME_FROM_TRIGGER->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER']"),
        options = { name: "x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.TIME_FROM_TRIGGER.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.TIME_FROM_TRIGGER.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<span<?= $Grid->TIME_FROM_TRIGGER->viewAttributes() ?>>
<?= $Grid->TIME_FROM_TRIGGER->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?= HtmlEncode($Grid->TIME_FROM_TRIGGER->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?= HtmlEncode($Grid->TIME_FROM_TRIGGER->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
        <td data-name="COLLECTION_TO_PREPARATION" <?= $Grid->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION"
        name="x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION"
        class="form-control ew-select<?= $Grid->COLLECTION_TO_PREPARATION->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION"
        data-table="ivf_semenanalysisreport"
        data-field="x_COLLECTION_TO_PREPARATION"
        data-value-separator="<?= $Grid->COLLECTION_TO_PREPARATION->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->COLLECTION_TO_PREPARATION->getPlaceHolder()) ?>"
        <?= $Grid->COLLECTION_TO_PREPARATION->editAttributes() ?>>
        <?= $Grid->COLLECTION_TO_PREPARATION->selectOptionListHtml("x{$Grid->RowIndex}_COLLECTION_TO_PREPARATION") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->COLLECTION_TO_PREPARATION->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION']"),
        options = { name: "x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.COLLECTION_TO_PREPARATION.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.COLLECTION_TO_PREPARATION.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" data-hidden="1" name="o<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="o<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?= HtmlEncode($Grid->COLLECTION_TO_PREPARATION->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION"
        name="x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION"
        class="form-control ew-select<?= $Grid->COLLECTION_TO_PREPARATION->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION"
        data-table="ivf_semenanalysisreport"
        data-field="x_COLLECTION_TO_PREPARATION"
        data-value-separator="<?= $Grid->COLLECTION_TO_PREPARATION->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->COLLECTION_TO_PREPARATION->getPlaceHolder()) ?>"
        <?= $Grid->COLLECTION_TO_PREPARATION->editAttributes() ?>>
        <?= $Grid->COLLECTION_TO_PREPARATION->selectOptionListHtml("x{$Grid->RowIndex}_COLLECTION_TO_PREPARATION") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->COLLECTION_TO_PREPARATION->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION']"),
        options = { name: "x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.COLLECTION_TO_PREPARATION.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.COLLECTION_TO_PREPARATION.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<span<?= $Grid->COLLECTION_TO_PREPARATION->viewAttributes() ?>>
<?= $Grid->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?= HtmlEncode($Grid->COLLECTION_TO_PREPARATION->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?= HtmlEncode($Grid->COLLECTION_TO_PREPARATION->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
        <td data-name="TIME_FROM_PREP_TO_INSEM" <?= $Grid->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="form-group">
<input type="<?= $Grid->TIME_FROM_PREP_TO_INSEM->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="x<?= $Grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="x<?= $Grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TIME_FROM_PREP_TO_INSEM->getPlaceHolder()) ?>" value="<?= $Grid->TIME_FROM_PREP_TO_INSEM->EditValue ?>"<?= $Grid->TIME_FROM_PREP_TO_INSEM->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TIME_FROM_PREP_TO_INSEM->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="o<?= $Grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?= HtmlEncode($Grid->TIME_FROM_PREP_TO_INSEM->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="form-group">
<input type="<?= $Grid->TIME_FROM_PREP_TO_INSEM->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="x<?= $Grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="x<?= $Grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TIME_FROM_PREP_TO_INSEM->getPlaceHolder()) ?>" value="<?= $Grid->TIME_FROM_PREP_TO_INSEM->EditValue ?>"<?= $Grid->TIME_FROM_PREP_TO_INSEM->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TIME_FROM_PREP_TO_INSEM->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<span<?= $Grid->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>>
<?= $Grid->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" data-hidden="1" name="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="fivf_semenanalysisreportgrid$x<?= $Grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?= HtmlEncode($Grid->TIME_FROM_PREP_TO_INSEM->FormValue) ?>">
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" data-hidden="1" name="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="fivf_semenanalysisreportgrid$o<?= $Grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?= HtmlEncode($Grid->TIME_FROM_PREP_TO_INSEM->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowCount);
?>
    </tr>
<?php if ($Grid->RowType == ROWTYPE_ADD || $Grid->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid","load"], function () {
    fivf_semenanalysisreportgrid.updateLists(<?= $Grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
    }
    } // End delete row checking
    if (!$Grid->isGridAdd() || $Grid->CurrentMode == "copy")
        if (!$Grid->Recordset->EOF) {
            $Grid->Recordset->moveNext();
        }
}
?>
<?php
    if ($Grid->CurrentMode == "add" || $Grid->CurrentMode == "copy" || $Grid->CurrentMode == "edit") {
        $Grid->RowIndex = '$rowindex$';
        $Grid->loadRowValues();

        // Set row properties
        $Grid->resetAttributes();
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_ivf_semenanalysisreport", "data-rowtype" => ROWTYPE_ADD]);
        $Grid->RowAttrs->appendClass("ew-template");
        $Grid->RowType = ROWTYPE_ADD;

        // Render row
        $Grid->renderRow();

        // Render list options
        $Grid->renderListOptions();
        $Grid->StartRowCount = 0;
?>
    <tr <?= $Grid->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Grid->ListOptions->render("body", "left", $Grid->RowIndex);
?>
    <?php if ($Grid->id->Visible) { // id ?>
        <td data-name="id">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_id" class="form-group ivf_semenanalysisreport_id"></span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_id" class="form-group ivf_semenanalysisreport_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->RIDNo->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RIDNo" class="form-group ivf_semenanalysisreport_RIDNo">
<span<?= $Grid->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RIDNo->getDisplayValue($Grid->RIDNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_RIDNo" name="x<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RIDNo" class="form-group ivf_semenanalysisreport_RIDNo">
<input type="<?= $Grid->RIDNo->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="x<?= $Grid->RowIndex ?>_RIDNo" id="x<?= $Grid->RowIndex ?>_RIDNo" size="30" placeholder="<?= HtmlEncode($Grid->RIDNo->getPlaceHolder()) ?>" value="<?= $Grid->RIDNo->EditValue ?>"<?= $Grid->RIDNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RIDNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RIDNo" class="form-group ivf_semenanalysisreport_RIDNo">
<span<?= $Grid->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RIDNo->getDisplayValue($Grid->RIDNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RIDNo" id="x<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RIDNo" id="o<?= $Grid->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Grid->RIDNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->PatientName->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PatientName" class="form-group ivf_semenanalysisreport_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientName->getDisplayValue($Grid->PatientName->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PatientName" class="form-group ivf_semenanalysisreport_PatientName">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PatientName" class="form-group ivf_semenanalysisreport_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientName->getDisplayValue($Grid->PatientName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HusbandName->Visible) { // HusbandName ?>
        <td data-name="HusbandName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_HusbandName" class="form-group ivf_semenanalysisreport_HusbandName">
<input type="<?= $Grid->HusbandName->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="x<?= $Grid->RowIndex ?>_HusbandName" id="x<?= $Grid->RowIndex ?>_HusbandName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->HusbandName->getPlaceHolder()) ?>" value="<?= $Grid->HusbandName->EditValue ?>"<?= $Grid->HusbandName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HusbandName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_HusbandName" class="form-group ivf_semenanalysisreport_HusbandName">
<span<?= $Grid->HusbandName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HusbandName->getDisplayValue($Grid->HusbandName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HusbandName" id="x<?= $Grid->RowIndex ?>_HusbandName" value="<?= HtmlEncode($Grid->HusbandName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HusbandName" id="o<?= $Grid->RowIndex ?>_HusbandName" value="<?= HtmlEncode($Grid->HusbandName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RequestDr->Visible) { // RequestDr ?>
        <td data-name="RequestDr">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RequestDr" class="form-group ivf_semenanalysisreport_RequestDr">
<input type="<?= $Grid->RequestDr->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="x<?= $Grid->RowIndex ?>_RequestDr" id="x<?= $Grid->RowIndex ?>_RequestDr" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RequestDr->getPlaceHolder()) ?>" value="<?= $Grid->RequestDr->EditValue ?>"<?= $Grid->RequestDr->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RequestDr->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RequestDr" class="form-group ivf_semenanalysisreport_RequestDr">
<span<?= $Grid->RequestDr->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RequestDr->getDisplayValue($Grid->RequestDr->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RequestDr" id="x<?= $Grid->RowIndex ?>_RequestDr" value="<?= HtmlEncode($Grid->RequestDr->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RequestDr" id="o<?= $Grid->RowIndex ?>_RequestDr" value="<?= HtmlEncode($Grid->RequestDr->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CollectionDate->Visible) { // CollectionDate ?>
        <td data-name="CollectionDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CollectionDate" class="form-group ivf_semenanalysisreport_CollectionDate">
<input type="<?= $Grid->CollectionDate->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="x<?= $Grid->RowIndex ?>_CollectionDate" id="x<?= $Grid->RowIndex ?>_CollectionDate" placeholder="<?= HtmlEncode($Grid->CollectionDate->getPlaceHolder()) ?>" value="<?= $Grid->CollectionDate->EditValue ?>"<?= $Grid->CollectionDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CollectionDate->getErrorMessage() ?></div>
<?php if (!$Grid->CollectionDate->ReadOnly && !$Grid->CollectionDate->Disabled && !isset($Grid->CollectionDate->EditAttrs["readonly"]) && !isset($Grid->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?= $Grid->RowIndex ?>_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CollectionDate" class="form-group ivf_semenanalysisreport_CollectionDate">
<span<?= $Grid->CollectionDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CollectionDate->getDisplayValue($Grid->CollectionDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CollectionDate" id="x<?= $Grid->RowIndex ?>_CollectionDate" value="<?= HtmlEncode($Grid->CollectionDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CollectionDate" id="o<?= $Grid->RowIndex ?>_CollectionDate" value="<?= HtmlEncode($Grid->CollectionDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ResultDate" class="form-group ivf_semenanalysisreport_ResultDate">
<input type="<?= $Grid->ResultDate->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="x<?= $Grid->RowIndex ?>_ResultDate" id="x<?= $Grid->RowIndex ?>_ResultDate" placeholder="<?= HtmlEncode($Grid->ResultDate->getPlaceHolder()) ?>" value="<?= $Grid->ResultDate->EditValue ?>"<?= $Grid->ResultDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResultDate->getErrorMessage() ?></div>
<?php if (!$Grid->ResultDate->ReadOnly && !$Grid->ResultDate->Disabled && !isset($Grid->ResultDate->EditAttrs["readonly"]) && !isset($Grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?= $Grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ResultDate" class="form-group ivf_semenanalysisreport_ResultDate">
<span<?= $Grid->ResultDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ResultDate->getDisplayValue($Grid->ResultDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ResultDate" id="x<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResultDate" id="o<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RequestSample->Visible) { // RequestSample ?>
        <td data-name="RequestSample">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RequestSample" class="form-group ivf_semenanalysisreport_RequestSample">
    <select
        id="x<?= $Grid->RowIndex ?>_RequestSample"
        name="x<?= $Grid->RowIndex ?>_RequestSample"
        class="form-control ew-select<?= $Grid->RequestSample->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_RequestSample"
        data-table="ivf_semenanalysisreport"
        data-field="x_RequestSample"
        data-value-separator="<?= $Grid->RequestSample->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->RequestSample->getPlaceHolder()) ?>"
        <?= $Grid->RequestSample->editAttributes() ?>>
        <?= $Grid->RequestSample->selectOptionListHtml("x{$Grid->RowIndex}_RequestSample") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->RequestSample->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_RequestSample']"),
        options = { name: "x<?= $Grid->RowIndex ?>_RequestSample", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_RequestSample", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.RequestSample.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.RequestSample.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_RequestSample" class="form-group ivf_semenanalysisreport_RequestSample">
<span<?= $Grid->RequestSample->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RequestSample->getDisplayValue($Grid->RequestSample->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RequestSample" id="x<?= $Grid->RowIndex ?>_RequestSample" value="<?= HtmlEncode($Grid->RequestSample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RequestSample" id="o<?= $Grid->RowIndex ?>_RequestSample" value="<?= HtmlEncode($Grid->RequestSample->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CollectionType->Visible) { // CollectionType ?>
        <td data-name="CollectionType">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CollectionType" class="form-group ivf_semenanalysisreport_CollectionType">
    <select
        id="x<?= $Grid->RowIndex ?>_CollectionType"
        name="x<?= $Grid->RowIndex ?>_CollectionType"
        class="form-control ew-select<?= $Grid->CollectionType->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CollectionType"
        data-table="ivf_semenanalysisreport"
        data-field="x_CollectionType"
        data-value-separator="<?= $Grid->CollectionType->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->CollectionType->getPlaceHolder()) ?>"
        <?= $Grid->CollectionType->editAttributes() ?>>
        <?= $Grid->CollectionType->selectOptionListHtml("x{$Grid->RowIndex}_CollectionType") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->CollectionType->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CollectionType']"),
        options = { name: "x<?= $Grid->RowIndex ?>_CollectionType", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CollectionType", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.CollectionType.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.CollectionType.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CollectionType" class="form-group ivf_semenanalysisreport_CollectionType">
<span<?= $Grid->CollectionType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CollectionType->getDisplayValue($Grid->CollectionType->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CollectionType" id="x<?= $Grid->RowIndex ?>_CollectionType" value="<?= HtmlEncode($Grid->CollectionType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CollectionType" id="o<?= $Grid->RowIndex ?>_CollectionType" value="<?= HtmlEncode($Grid->CollectionType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CollectionMethod->Visible) { // CollectionMethod ?>
        <td data-name="CollectionMethod">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CollectionMethod" class="form-group ivf_semenanalysisreport_CollectionMethod">
    <select
        id="x<?= $Grid->RowIndex ?>_CollectionMethod"
        name="x<?= $Grid->RowIndex ?>_CollectionMethod"
        class="form-control ew-select<?= $Grid->CollectionMethod->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CollectionMethod"
        data-table="ivf_semenanalysisreport"
        data-field="x_CollectionMethod"
        data-value-separator="<?= $Grid->CollectionMethod->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->CollectionMethod->getPlaceHolder()) ?>"
        <?= $Grid->CollectionMethod->editAttributes() ?>>
        <?= $Grid->CollectionMethod->selectOptionListHtml("x{$Grid->RowIndex}_CollectionMethod") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->CollectionMethod->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CollectionMethod']"),
        options = { name: "x<?= $Grid->RowIndex ?>_CollectionMethod", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CollectionMethod", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.CollectionMethod.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.CollectionMethod.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CollectionMethod" class="form-group ivf_semenanalysisreport_CollectionMethod">
<span<?= $Grid->CollectionMethod->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CollectionMethod->getDisplayValue($Grid->CollectionMethod->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CollectionMethod" id="x<?= $Grid->RowIndex ?>_CollectionMethod" value="<?= HtmlEncode($Grid->CollectionMethod->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CollectionMethod" id="o<?= $Grid->RowIndex ?>_CollectionMethod" value="<?= HtmlEncode($Grid->CollectionMethod->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Medicationused->Visible) { // Medicationused ?>
        <td data-name="Medicationused">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Medicationused" class="form-group ivf_semenanalysisreport_Medicationused">
    <select
        id="x<?= $Grid->RowIndex ?>_Medicationused"
        name="x<?= $Grid->RowIndex ?>_Medicationused"
        class="form-control ew-select<?= $Grid->Medicationused->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_Medicationused"
        data-table="ivf_semenanalysisreport"
        data-field="x_Medicationused"
        data-value-separator="<?= $Grid->Medicationused->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Medicationused->getPlaceHolder()) ?>"
        <?= $Grid->Medicationused->editAttributes() ?>>
        <?= $Grid->Medicationused->selectOptionListHtml("x{$Grid->RowIndex}_Medicationused") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Medicationused->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_Medicationused']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Medicationused", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_Medicationused", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.Medicationused.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.Medicationused.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Medicationused" class="form-group ivf_semenanalysisreport_Medicationused">
<span<?= $Grid->Medicationused->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Medicationused->getDisplayValue($Grid->Medicationused->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Medicationused" id="x<?= $Grid->RowIndex ?>_Medicationused" value="<?= HtmlEncode($Grid->Medicationused->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Medicationused" id="o<?= $Grid->RowIndex ?>_Medicationused" value="<?= HtmlEncode($Grid->Medicationused->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
        <td data-name="DifficultiesinCollection">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DifficultiesinCollection" class="form-group ivf_semenanalysisreport_DifficultiesinCollection">
    <select
        id="x<?= $Grid->RowIndex ?>_DifficultiesinCollection"
        name="x<?= $Grid->RowIndex ?>_DifficultiesinCollection"
        class="form-control ew-select<?= $Grid->DifficultiesinCollection->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_DifficultiesinCollection"
        data-table="ivf_semenanalysisreport"
        data-field="x_DifficultiesinCollection"
        data-value-separator="<?= $Grid->DifficultiesinCollection->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->DifficultiesinCollection->getPlaceHolder()) ?>"
        <?= $Grid->DifficultiesinCollection->editAttributes() ?>>
        <?= $Grid->DifficultiesinCollection->selectOptionListHtml("x{$Grid->RowIndex}_DifficultiesinCollection") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->DifficultiesinCollection->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_DifficultiesinCollection']"),
        options = { name: "x<?= $Grid->RowIndex ?>_DifficultiesinCollection", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_DifficultiesinCollection", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.DifficultiesinCollection.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.DifficultiesinCollection.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DifficultiesinCollection" class="form-group ivf_semenanalysisreport_DifficultiesinCollection">
<span<?= $Grid->DifficultiesinCollection->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DifficultiesinCollection->getDisplayValue($Grid->DifficultiesinCollection->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DifficultiesinCollection" id="x<?= $Grid->RowIndex ?>_DifficultiesinCollection" value="<?= HtmlEncode($Grid->DifficultiesinCollection->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DifficultiesinCollection" id="o<?= $Grid->RowIndex ?>_DifficultiesinCollection" value="<?= HtmlEncode($Grid->DifficultiesinCollection->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->pH->Visible) { // pH ?>
        <td data-name="pH">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_pH" class="form-group ivf_semenanalysisreport_pH">
<input type="<?= $Grid->pH->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_pH" name="x<?= $Grid->RowIndex ?>_pH" id="x<?= $Grid->RowIndex ?>_pH" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->pH->getPlaceHolder()) ?>" value="<?= $Grid->pH->EditValue ?>"<?= $Grid->pH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->pH->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_pH" class="form-group ivf_semenanalysisreport_pH">
<span<?= $Grid->pH->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->pH->getDisplayValue($Grid->pH->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" data-hidden="1" name="x<?= $Grid->RowIndex ?>_pH" id="x<?= $Grid->RowIndex ?>_pH" value="<?= HtmlEncode($Grid->pH->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_pH" data-hidden="1" name="o<?= $Grid->RowIndex ?>_pH" id="o<?= $Grid->RowIndex ?>_pH" value="<?= HtmlEncode($Grid->pH->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Timeofcollection->Visible) { // Timeofcollection ?>
        <td data-name="Timeofcollection">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Timeofcollection" class="form-group ivf_semenanalysisreport_Timeofcollection">
<input type="<?= $Grid->Timeofcollection->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="x<?= $Grid->RowIndex ?>_Timeofcollection" id="x<?= $Grid->RowIndex ?>_Timeofcollection" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Timeofcollection->getPlaceHolder()) ?>" value="<?= $Grid->Timeofcollection->EditValue ?>"<?= $Grid->Timeofcollection->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Timeofcollection->getErrorMessage() ?></div>
<?php if (!$Grid->Timeofcollection->ReadOnly && !$Grid->Timeofcollection->Disabled && !isset($Grid->Timeofcollection->EditAttrs["readonly"]) && !isset($Grid->Timeofcollection->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "timepicker"], function() {
    ew.createTimePicker("fivf_semenanalysisreportgrid", "x<?= $Grid->RowIndex ?>_Timeofcollection", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Timeofcollection" class="form-group ivf_semenanalysisreport_Timeofcollection">
<span<?= $Grid->Timeofcollection->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Timeofcollection->getDisplayValue($Grid->Timeofcollection->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Timeofcollection" id="x<?= $Grid->RowIndex ?>_Timeofcollection" value="<?= HtmlEncode($Grid->Timeofcollection->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Timeofcollection" id="o<?= $Grid->RowIndex ?>_Timeofcollection" value="<?= HtmlEncode($Grid->Timeofcollection->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Timeofexamination->Visible) { // Timeofexamination ?>
        <td data-name="Timeofexamination">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Timeofexamination" class="form-group ivf_semenanalysisreport_Timeofexamination">
<input type="<?= $Grid->Timeofexamination->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="x<?= $Grid->RowIndex ?>_Timeofexamination" id="x<?= $Grid->RowIndex ?>_Timeofexamination" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Timeofexamination->getPlaceHolder()) ?>" value="<?= $Grid->Timeofexamination->EditValue ?>"<?= $Grid->Timeofexamination->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Timeofexamination->getErrorMessage() ?></div>
<?php if (!$Grid->Timeofexamination->ReadOnly && !$Grid->Timeofexamination->Disabled && !isset($Grid->Timeofexamination->EditAttrs["readonly"]) && !isset($Grid->Timeofexamination->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "timepicker"], function() {
    ew.createTimePicker("fivf_semenanalysisreportgrid", "x<?= $Grid->RowIndex ?>_Timeofexamination", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Timeofexamination" class="form-group ivf_semenanalysisreport_Timeofexamination">
<span<?= $Grid->Timeofexamination->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Timeofexamination->getDisplayValue($Grid->Timeofexamination->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Timeofexamination" id="x<?= $Grid->RowIndex ?>_Timeofexamination" value="<?= HtmlEncode($Grid->Timeofexamination->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Timeofexamination" id="o<?= $Grid->RowIndex ?>_Timeofexamination" value="<?= HtmlEncode($Grid->Timeofexamination->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Volume->Visible) { // Volume ?>
        <td data-name="Volume">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Volume" class="form-group ivf_semenanalysisreport_Volume">
<input type="<?= $Grid->Volume->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="x<?= $Grid->RowIndex ?>_Volume" id="x<?= $Grid->RowIndex ?>_Volume" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Volume->getPlaceHolder()) ?>" value="<?= $Grid->Volume->EditValue ?>"<?= $Grid->Volume->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Volume->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Volume" class="form-group ivf_semenanalysisreport_Volume">
<span<?= $Grid->Volume->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Volume->getDisplayValue($Grid->Volume->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Volume" id="x<?= $Grid->RowIndex ?>_Volume" value="<?= HtmlEncode($Grid->Volume->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Volume" id="o<?= $Grid->RowIndex ?>_Volume" value="<?= HtmlEncode($Grid->Volume->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Concentration->Visible) { // Concentration ?>
        <td data-name="Concentration">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Concentration" class="form-group ivf_semenanalysisreport_Concentration">
<input type="<?= $Grid->Concentration->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="x<?= $Grid->RowIndex ?>_Concentration" id="x<?= $Grid->RowIndex ?>_Concentration" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Concentration->getPlaceHolder()) ?>" value="<?= $Grid->Concentration->EditValue ?>"<?= $Grid->Concentration->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Concentration->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Concentration" class="form-group ivf_semenanalysisreport_Concentration">
<span<?= $Grid->Concentration->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Concentration->getDisplayValue($Grid->Concentration->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Concentration" id="x<?= $Grid->RowIndex ?>_Concentration" value="<?= HtmlEncode($Grid->Concentration->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Concentration" id="o<?= $Grid->RowIndex ?>_Concentration" value="<?= HtmlEncode($Grid->Concentration->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Total->Visible) { // Total ?>
        <td data-name="Total">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Total" class="form-group ivf_semenanalysisreport_Total">
<input type="<?= $Grid->Total->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Total" name="x<?= $Grid->RowIndex ?>_Total" id="x<?= $Grid->RowIndex ?>_Total" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Total->getPlaceHolder()) ?>" value="<?= $Grid->Total->EditValue ?>"<?= $Grid->Total->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Total->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Total" class="form-group ivf_semenanalysisreport_Total">
<span<?= $Grid->Total->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Total->getDisplayValue($Grid->Total->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Total" id="x<?= $Grid->RowIndex ?>_Total" value="<?= HtmlEncode($Grid->Total->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Total" id="o<?= $Grid->RowIndex ?>_Total" value="<?= HtmlEncode($Grid->Total->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
        <td data-name="ProgressiveMotility">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProgressiveMotility" class="form-group ivf_semenanalysisreport_ProgressiveMotility">
<input type="<?= $Grid->ProgressiveMotility->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="x<?= $Grid->RowIndex ?>_ProgressiveMotility" id="x<?= $Grid->RowIndex ?>_ProgressiveMotility" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->ProgressiveMotility->getPlaceHolder()) ?>" value="<?= $Grid->ProgressiveMotility->EditValue ?>"<?= $Grid->ProgressiveMotility->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProgressiveMotility->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProgressiveMotility" class="form-group ivf_semenanalysisreport_ProgressiveMotility">
<span<?= $Grid->ProgressiveMotility->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ProgressiveMotility->getDisplayValue($Grid->ProgressiveMotility->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ProgressiveMotility" id="x<?= $Grid->RowIndex ?>_ProgressiveMotility" value="<?= HtmlEncode($Grid->ProgressiveMotility->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ProgressiveMotility" id="o<?= $Grid->RowIndex ?>_ProgressiveMotility" value="<?= HtmlEncode($Grid->ProgressiveMotility->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
        <td data-name="NonProgrssiveMotile">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonProgrssiveMotile" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile">
<input type="<?= $Grid->NonProgrssiveMotile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile" id="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->NonProgrssiveMotile->getPlaceHolder()) ?>" value="<?= $Grid->NonProgrssiveMotile->EditValue ?>"<?= $Grid->NonProgrssiveMotile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NonProgrssiveMotile->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonProgrssiveMotile" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile">
<span<?= $Grid->NonProgrssiveMotile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NonProgrssiveMotile->getDisplayValue($Grid->NonProgrssiveMotile->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile" id="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile" value="<?= HtmlEncode($Grid->NonProgrssiveMotile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NonProgrssiveMotile" id="o<?= $Grid->RowIndex ?>_NonProgrssiveMotile" value="<?= HtmlEncode($Grid->NonProgrssiveMotile->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Immotile->Visible) { // Immotile ?>
        <td data-name="Immotile">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Immotile" class="form-group ivf_semenanalysisreport_Immotile">
<input type="<?= $Grid->Immotile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="x<?= $Grid->RowIndex ?>_Immotile" id="x<?= $Grid->RowIndex ?>_Immotile" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Immotile->getPlaceHolder()) ?>" value="<?= $Grid->Immotile->EditValue ?>"<?= $Grid->Immotile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Immotile->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Immotile" class="form-group ivf_semenanalysisreport_Immotile">
<span<?= $Grid->Immotile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Immotile->getDisplayValue($Grid->Immotile->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Immotile" id="x<?= $Grid->RowIndex ?>_Immotile" value="<?= HtmlEncode($Grid->Immotile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Immotile" id="o<?= $Grid->RowIndex ?>_Immotile" value="<?= HtmlEncode($Grid->Immotile->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
        <td data-name="TotalProgrssiveMotile">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TotalProgrssiveMotile" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile">
<input type="<?= $Grid->TotalProgrssiveMotile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile" id="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->TotalProgrssiveMotile->getPlaceHolder()) ?>" value="<?= $Grid->TotalProgrssiveMotile->EditValue ?>"<?= $Grid->TotalProgrssiveMotile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TotalProgrssiveMotile->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TotalProgrssiveMotile" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile">
<span<?= $Grid->TotalProgrssiveMotile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TotalProgrssiveMotile->getDisplayValue($Grid->TotalProgrssiveMotile->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile" id="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile" value="<?= HtmlEncode($Grid->TotalProgrssiveMotile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TotalProgrssiveMotile" id="o<?= $Grid->RowIndex ?>_TotalProgrssiveMotile" value="<?= HtmlEncode($Grid->TotalProgrssiveMotile->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Appearance->Visible) { // Appearance ?>
        <td data-name="Appearance">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Appearance" class="form-group ivf_semenanalysisreport_Appearance">
<input type="<?= $Grid->Appearance->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="x<?= $Grid->RowIndex ?>_Appearance" id="x<?= $Grid->RowIndex ?>_Appearance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Appearance->getPlaceHolder()) ?>" value="<?= $Grid->Appearance->EditValue ?>"<?= $Grid->Appearance->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Appearance->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Appearance" class="form-group ivf_semenanalysisreport_Appearance">
<span<?= $Grid->Appearance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Appearance->getDisplayValue($Grid->Appearance->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Appearance" id="x<?= $Grid->RowIndex ?>_Appearance" value="<?= HtmlEncode($Grid->Appearance->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Appearance" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Appearance" id="o<?= $Grid->RowIndex ?>_Appearance" value="<?= HtmlEncode($Grid->Appearance->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Homogenosity->Visible) { // Homogenosity ?>
        <td data-name="Homogenosity">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Homogenosity" class="form-group ivf_semenanalysisreport_Homogenosity">
    <select
        id="x<?= $Grid->RowIndex ?>_Homogenosity"
        name="x<?= $Grid->RowIndex ?>_Homogenosity"
        class="form-control ew-select<?= $Grid->Homogenosity->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_Homogenosity"
        data-table="ivf_semenanalysisreport"
        data-field="x_Homogenosity"
        data-value-separator="<?= $Grid->Homogenosity->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Homogenosity->getPlaceHolder()) ?>"
        <?= $Grid->Homogenosity->editAttributes() ?>>
        <?= $Grid->Homogenosity->selectOptionListHtml("x{$Grid->RowIndex}_Homogenosity") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Homogenosity->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_Homogenosity']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Homogenosity", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_Homogenosity", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.Homogenosity.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.Homogenosity.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Homogenosity" class="form-group ivf_semenanalysisreport_Homogenosity">
<span<?= $Grid->Homogenosity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Homogenosity->getDisplayValue($Grid->Homogenosity->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Homogenosity" id="x<?= $Grid->RowIndex ?>_Homogenosity" value="<?= HtmlEncode($Grid->Homogenosity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Homogenosity" id="o<?= $Grid->RowIndex ?>_Homogenosity" value="<?= HtmlEncode($Grid->Homogenosity->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CompleteSample->Visible) { // CompleteSample ?>
        <td data-name="CompleteSample">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CompleteSample" class="form-group ivf_semenanalysisreport_CompleteSample">
    <select
        id="x<?= $Grid->RowIndex ?>_CompleteSample"
        name="x<?= $Grid->RowIndex ?>_CompleteSample"
        class="form-control ew-select<?= $Grid->CompleteSample->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CompleteSample"
        data-table="ivf_semenanalysisreport"
        data-field="x_CompleteSample"
        data-value-separator="<?= $Grid->CompleteSample->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->CompleteSample->getPlaceHolder()) ?>"
        <?= $Grid->CompleteSample->editAttributes() ?>>
        <?= $Grid->CompleteSample->selectOptionListHtml("x{$Grid->RowIndex}_CompleteSample") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->CompleteSample->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CompleteSample']"),
        options = { name: "x<?= $Grid->RowIndex ?>_CompleteSample", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_CompleteSample", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.CompleteSample.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.CompleteSample.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_CompleteSample" class="form-group ivf_semenanalysisreport_CompleteSample">
<span<?= $Grid->CompleteSample->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CompleteSample->getDisplayValue($Grid->CompleteSample->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CompleteSample" id="x<?= $Grid->RowIndex ?>_CompleteSample" value="<?= HtmlEncode($Grid->CompleteSample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CompleteSample" id="o<?= $Grid->RowIndex ?>_CompleteSample" value="<?= HtmlEncode($Grid->CompleteSample->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Liquefactiontime->Visible) { // Liquefactiontime ?>
        <td data-name="Liquefactiontime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Liquefactiontime" class="form-group ivf_semenanalysisreport_Liquefactiontime">
<input type="<?= $Grid->Liquefactiontime->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="x<?= $Grid->RowIndex ?>_Liquefactiontime" id="x<?= $Grid->RowIndex ?>_Liquefactiontime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Liquefactiontime->getPlaceHolder()) ?>" value="<?= $Grid->Liquefactiontime->EditValue ?>"<?= $Grid->Liquefactiontime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Liquefactiontime->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Liquefactiontime" class="form-group ivf_semenanalysisreport_Liquefactiontime">
<span<?= $Grid->Liquefactiontime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Liquefactiontime->getDisplayValue($Grid->Liquefactiontime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Liquefactiontime" id="x<?= $Grid->RowIndex ?>_Liquefactiontime" value="<?= HtmlEncode($Grid->Liquefactiontime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Liquefactiontime" id="o<?= $Grid->RowIndex ?>_Liquefactiontime" value="<?= HtmlEncode($Grid->Liquefactiontime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Normal->Visible) { // Normal ?>
        <td data-name="Normal">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Normal" class="form-group ivf_semenanalysisreport_Normal">
<input type="<?= $Grid->Normal->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="x<?= $Grid->RowIndex ?>_Normal" id="x<?= $Grid->RowIndex ?>_Normal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Normal->getPlaceHolder()) ?>" value="<?= $Grid->Normal->EditValue ?>"<?= $Grid->Normal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Normal->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Normal" class="form-group ivf_semenanalysisreport_Normal">
<span<?= $Grid->Normal->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Normal->getDisplayValue($Grid->Normal->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Normal" id="x<?= $Grid->RowIndex ?>_Normal" value="<?= HtmlEncode($Grid->Normal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Normal" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Normal" id="o<?= $Grid->RowIndex ?>_Normal" value="<?= HtmlEncode($Grid->Normal->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Abnormal->Visible) { // Abnormal ?>
        <td data-name="Abnormal">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Abnormal" class="form-group ivf_semenanalysisreport_Abnormal">
<input type="<?= $Grid->Abnormal->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="x<?= $Grid->RowIndex ?>_Abnormal" id="x<?= $Grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Abnormal->getPlaceHolder()) ?>" value="<?= $Grid->Abnormal->EditValue ?>"<?= $Grid->Abnormal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Abnormal->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Abnormal" class="form-group ivf_semenanalysisreport_Abnormal">
<span<?= $Grid->Abnormal->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Abnormal->getDisplayValue($Grid->Abnormal->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Abnormal" id="x<?= $Grid->RowIndex ?>_Abnormal" value="<?= HtmlEncode($Grid->Abnormal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Abnormal" id="o<?= $Grid->RowIndex ?>_Abnormal" value="<?= HtmlEncode($Grid->Abnormal->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Headdefects->Visible) { // Headdefects ?>
        <td data-name="Headdefects">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Headdefects" class="form-group ivf_semenanalysisreport_Headdefects">
<input type="<?= $Grid->Headdefects->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="x<?= $Grid->RowIndex ?>_Headdefects" id="x<?= $Grid->RowIndex ?>_Headdefects" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Headdefects->getPlaceHolder()) ?>" value="<?= $Grid->Headdefects->EditValue ?>"<?= $Grid->Headdefects->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Headdefects->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Headdefects" class="form-group ivf_semenanalysisreport_Headdefects">
<span<?= $Grid->Headdefects->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Headdefects->getDisplayValue($Grid->Headdefects->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Headdefects" id="x<?= $Grid->RowIndex ?>_Headdefects" value="<?= HtmlEncode($Grid->Headdefects->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Headdefects" id="o<?= $Grid->RowIndex ?>_Headdefects" value="<?= HtmlEncode($Grid->Headdefects->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MidpieceDefects->Visible) { // MidpieceDefects ?>
        <td data-name="MidpieceDefects">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_MidpieceDefects" class="form-group ivf_semenanalysisreport_MidpieceDefects">
<input type="<?= $Grid->MidpieceDefects->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="x<?= $Grid->RowIndex ?>_MidpieceDefects" id="x<?= $Grid->RowIndex ?>_MidpieceDefects" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MidpieceDefects->getPlaceHolder()) ?>" value="<?= $Grid->MidpieceDefects->EditValue ?>"<?= $Grid->MidpieceDefects->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MidpieceDefects->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_MidpieceDefects" class="form-group ivf_semenanalysisreport_MidpieceDefects">
<span<?= $Grid->MidpieceDefects->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MidpieceDefects->getDisplayValue($Grid->MidpieceDefects->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MidpieceDefects" id="x<?= $Grid->RowIndex ?>_MidpieceDefects" value="<?= HtmlEncode($Grid->MidpieceDefects->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MidpieceDefects" id="o<?= $Grid->RowIndex ?>_MidpieceDefects" value="<?= HtmlEncode($Grid->MidpieceDefects->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TailDefects->Visible) { // TailDefects ?>
        <td data-name="TailDefects">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TailDefects" class="form-group ivf_semenanalysisreport_TailDefects">
<input type="<?= $Grid->TailDefects->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="x<?= $Grid->RowIndex ?>_TailDefects" id="x<?= $Grid->RowIndex ?>_TailDefects" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TailDefects->getPlaceHolder()) ?>" value="<?= $Grid->TailDefects->EditValue ?>"<?= $Grid->TailDefects->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TailDefects->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TailDefects" class="form-group ivf_semenanalysisreport_TailDefects">
<span<?= $Grid->TailDefects->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TailDefects->getDisplayValue($Grid->TailDefects->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TailDefects" id="x<?= $Grid->RowIndex ?>_TailDefects" value="<?= HtmlEncode($Grid->TailDefects->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TailDefects" id="o<?= $Grid->RowIndex ?>_TailDefects" value="<?= HtmlEncode($Grid->TailDefects->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NormalProgMotile->Visible) { // NormalProgMotile ?>
        <td data-name="NormalProgMotile">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NormalProgMotile" class="form-group ivf_semenanalysisreport_NormalProgMotile">
<input type="<?= $Grid->NormalProgMotile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="x<?= $Grid->RowIndex ?>_NormalProgMotile" id="x<?= $Grid->RowIndex ?>_NormalProgMotile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NormalProgMotile->getPlaceHolder()) ?>" value="<?= $Grid->NormalProgMotile->EditValue ?>"<?= $Grid->NormalProgMotile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NormalProgMotile->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NormalProgMotile" class="form-group ivf_semenanalysisreport_NormalProgMotile">
<span<?= $Grid->NormalProgMotile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NormalProgMotile->getDisplayValue($Grid->NormalProgMotile->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NormalProgMotile" id="x<?= $Grid->RowIndex ?>_NormalProgMotile" value="<?= HtmlEncode($Grid->NormalProgMotile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NormalProgMotile" id="o<?= $Grid->RowIndex ?>_NormalProgMotile" value="<?= HtmlEncode($Grid->NormalProgMotile->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ImmatureForms->Visible) { // ImmatureForms ?>
        <td data-name="ImmatureForms">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ImmatureForms" class="form-group ivf_semenanalysisreport_ImmatureForms">
<input type="<?= $Grid->ImmatureForms->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="x<?= $Grid->RowIndex ?>_ImmatureForms" id="x<?= $Grid->RowIndex ?>_ImmatureForms" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ImmatureForms->getPlaceHolder()) ?>" value="<?= $Grid->ImmatureForms->EditValue ?>"<?= $Grid->ImmatureForms->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ImmatureForms->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ImmatureForms" class="form-group ivf_semenanalysisreport_ImmatureForms">
<span<?= $Grid->ImmatureForms->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ImmatureForms->getDisplayValue($Grid->ImmatureForms->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ImmatureForms" id="x<?= $Grid->RowIndex ?>_ImmatureForms" value="<?= HtmlEncode($Grid->ImmatureForms->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ImmatureForms" id="o<?= $Grid->RowIndex ?>_ImmatureForms" value="<?= HtmlEncode($Grid->ImmatureForms->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Leucocytes->Visible) { // Leucocytes ?>
        <td data-name="Leucocytes">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Leucocytes" class="form-group ivf_semenanalysisreport_Leucocytes">
<input type="<?= $Grid->Leucocytes->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="x<?= $Grid->RowIndex ?>_Leucocytes" id="x<?= $Grid->RowIndex ?>_Leucocytes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Leucocytes->getPlaceHolder()) ?>" value="<?= $Grid->Leucocytes->EditValue ?>"<?= $Grid->Leucocytes->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Leucocytes->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Leucocytes" class="form-group ivf_semenanalysisreport_Leucocytes">
<span<?= $Grid->Leucocytes->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Leucocytes->getDisplayValue($Grid->Leucocytes->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Leucocytes" id="x<?= $Grid->RowIndex ?>_Leucocytes" value="<?= HtmlEncode($Grid->Leucocytes->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Leucocytes" id="o<?= $Grid->RowIndex ?>_Leucocytes" value="<?= HtmlEncode($Grid->Leucocytes->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Agglutination->Visible) { // Agglutination ?>
        <td data-name="Agglutination">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Agglutination" class="form-group ivf_semenanalysisreport_Agglutination">
<input type="<?= $Grid->Agglutination->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="x<?= $Grid->RowIndex ?>_Agglutination" id="x<?= $Grid->RowIndex ?>_Agglutination" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Agglutination->getPlaceHolder()) ?>" value="<?= $Grid->Agglutination->EditValue ?>"<?= $Grid->Agglutination->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Agglutination->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Agglutination" class="form-group ivf_semenanalysisreport_Agglutination">
<span<?= $Grid->Agglutination->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Agglutination->getDisplayValue($Grid->Agglutination->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Agglutination" id="x<?= $Grid->RowIndex ?>_Agglutination" value="<?= HtmlEncode($Grid->Agglutination->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Agglutination" id="o<?= $Grid->RowIndex ?>_Agglutination" value="<?= HtmlEncode($Grid->Agglutination->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Debris->Visible) { // Debris ?>
        <td data-name="Debris">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Debris" class="form-group ivf_semenanalysisreport_Debris">
<input type="<?= $Grid->Debris->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="x<?= $Grid->RowIndex ?>_Debris" id="x<?= $Grid->RowIndex ?>_Debris" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Debris->getPlaceHolder()) ?>" value="<?= $Grid->Debris->EditValue ?>"<?= $Grid->Debris->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Debris->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Debris" class="form-group ivf_semenanalysisreport_Debris">
<span<?= $Grid->Debris->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Debris->getDisplayValue($Grid->Debris->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Debris" id="x<?= $Grid->RowIndex ?>_Debris" value="<?= HtmlEncode($Grid->Debris->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Debris" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Debris" id="o<?= $Grid->RowIndex ?>_Debris" value="<?= HtmlEncode($Grid->Debris->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Diagnosis->Visible) { // Diagnosis ?>
        <td data-name="Diagnosis">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Diagnosis" class="form-group ivf_semenanalysisreport_Diagnosis">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="x<?= $Grid->RowIndex ?>_Diagnosis" id="x<?= $Grid->RowIndex ?>_Diagnosis" cols="35" rows="4" placeholder="<?= HtmlEncode($Grid->Diagnosis->getPlaceHolder()) ?>"<?= $Grid->Diagnosis->editAttributes() ?>><?= $Grid->Diagnosis->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Grid->Diagnosis->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Diagnosis" class="form-group ivf_semenanalysisreport_Diagnosis">
<span<?= $Grid->Diagnosis->viewAttributes() ?>>
<?= $Grid->Diagnosis->ViewValue ?></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Diagnosis" id="x<?= $Grid->RowIndex ?>_Diagnosis" value="<?= HtmlEncode($Grid->Diagnosis->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Diagnosis" id="o<?= $Grid->RowIndex ?>_Diagnosis" value="<?= HtmlEncode($Grid->Diagnosis->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Observations->Visible) { // Observations ?>
        <td data-name="Observations">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Observations" class="form-group ivf_semenanalysisreport_Observations">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Observations" name="x<?= $Grid->RowIndex ?>_Observations" id="x<?= $Grid->RowIndex ?>_Observations" cols="35" rows="4" placeholder="<?= HtmlEncode($Grid->Observations->getPlaceHolder()) ?>"<?= $Grid->Observations->editAttributes() ?>><?= $Grid->Observations->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Grid->Observations->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Observations" class="form-group ivf_semenanalysisreport_Observations">
<span<?= $Grid->Observations->viewAttributes() ?>>
<?= $Grid->Observations->ViewValue ?></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Observations" id="x<?= $Grid->RowIndex ?>_Observations" value="<?= HtmlEncode($Grid->Observations->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Observations" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Observations" id="o<?= $Grid->RowIndex ?>_Observations" value="<?= HtmlEncode($Grid->Observations->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Signature->Visible) { // Signature ?>
        <td data-name="Signature">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Signature" class="form-group ivf_semenanalysisreport_Signature">
<input type="<?= $Grid->Signature->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="x<?= $Grid->RowIndex ?>_Signature" id="x<?= $Grid->RowIndex ?>_Signature" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Signature->getPlaceHolder()) ?>" value="<?= $Grid->Signature->EditValue ?>"<?= $Grid->Signature->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Signature->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Signature" class="form-group ivf_semenanalysisreport_Signature">
<span<?= $Grid->Signature->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Signature->getDisplayValue($Grid->Signature->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Signature" id="x<?= $Grid->RowIndex ?>_Signature" value="<?= HtmlEncode($Grid->Signature->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Signature" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Signature" id="o<?= $Grid->RowIndex ?>_Signature" value="<?= HtmlEncode($Grid->Signature->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SemenOrgin->Visible) { // SemenOrgin ?>
        <td data-name="SemenOrgin">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_SemenOrgin" class="form-group ivf_semenanalysisreport_SemenOrgin">
    <select
        id="x<?= $Grid->RowIndex ?>_SemenOrgin"
        name="x<?= $Grid->RowIndex ?>_SemenOrgin"
        class="form-control ew-select<?= $Grid->SemenOrgin->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_SemenOrgin"
        data-table="ivf_semenanalysisreport"
        data-field="x_SemenOrgin"
        data-value-separator="<?= $Grid->SemenOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->SemenOrgin->getPlaceHolder()) ?>"
        <?= $Grid->SemenOrgin->editAttributes() ?>>
        <?= $Grid->SemenOrgin->selectOptionListHtml("x{$Grid->RowIndex}_SemenOrgin") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->SemenOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_SemenOrgin']"),
        options = { name: "x<?= $Grid->RowIndex ?>_SemenOrgin", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_SemenOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.SemenOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.SemenOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_SemenOrgin" class="form-group ivf_semenanalysisreport_SemenOrgin">
<span<?= $Grid->SemenOrgin->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SemenOrgin->getDisplayValue($Grid->SemenOrgin->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SemenOrgin" id="x<?= $Grid->RowIndex ?>_SemenOrgin" value="<?= HtmlEncode($Grid->SemenOrgin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SemenOrgin" id="o<?= $Grid->RowIndex ?>_SemenOrgin" value="<?= HtmlEncode($Grid->SemenOrgin->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Donor->Visible) { // Donor ?>
        <td data-name="Donor">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Donor" class="form-group ivf_semenanalysisreport_Donor">
<?php $Grid->Donor->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_Donor"><?= EmptyValue(strval($Grid->Donor->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->Donor->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->Donor->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->Donor->ReadOnly || $Grid->Donor->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_Donor',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->Donor->getErrorMessage() ?></div>
<?= $Grid->Donor->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Donor") ?>
<input type="hidden" is="selection-list" data-table="ivf_semenanalysisreport" data-field="x_Donor" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->Donor->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Donor" id="x<?= $Grid->RowIndex ?>_Donor" value="<?= $Grid->Donor->CurrentValue ?>"<?= $Grid->Donor->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Donor" class="form-group ivf_semenanalysisreport_Donor">
<span<?= $Grid->Donor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Donor->getDisplayValue($Grid->Donor->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Donor" id="x<?= $Grid->RowIndex ?>_Donor" value="<?= HtmlEncode($Grid->Donor->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Donor" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Donor" id="o<?= $Grid->RowIndex ?>_Donor" value="<?= HtmlEncode($Grid->Donor->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
        <td data-name="DonorBloodgroup">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DonorBloodgroup" class="form-group ivf_semenanalysisreport_DonorBloodgroup">
<input type="<?= $Grid->DonorBloodgroup->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="x<?= $Grid->RowIndex ?>_DonorBloodgroup" id="x<?= $Grid->RowIndex ?>_DonorBloodgroup" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DonorBloodgroup->getPlaceHolder()) ?>" value="<?= $Grid->DonorBloodgroup->EditValue ?>"<?= $Grid->DonorBloodgroup->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DonorBloodgroup->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DonorBloodgroup" class="form-group ivf_semenanalysisreport_DonorBloodgroup">
<span<?= $Grid->DonorBloodgroup->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DonorBloodgroup->getDisplayValue($Grid->DonorBloodgroup->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DonorBloodgroup" id="x<?= $Grid->RowIndex ?>_DonorBloodgroup" value="<?= HtmlEncode($Grid->DonorBloodgroup->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DonorBloodgroup" id="o<?= $Grid->RowIndex ?>_DonorBloodgroup" value="<?= HtmlEncode($Grid->DonorBloodgroup->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Tank->Visible) { // Tank ?>
        <td data-name="Tank">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Tank" class="form-group ivf_semenanalysisreport_Tank">
<input type="<?= $Grid->Tank->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="x<?= $Grid->RowIndex ?>_Tank" id="x<?= $Grid->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Tank->getPlaceHolder()) ?>" value="<?= $Grid->Tank->EditValue ?>"<?= $Grid->Tank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Tank->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Tank" class="form-group ivf_semenanalysisreport_Tank">
<span<?= $Grid->Tank->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Tank->getDisplayValue($Grid->Tank->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Tank" id="x<?= $Grid->RowIndex ?>_Tank" value="<?= HtmlEncode($Grid->Tank->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Tank" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Tank" id="o<?= $Grid->RowIndex ?>_Tank" value="<?= HtmlEncode($Grid->Tank->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Location->Visible) { // Location ?>
        <td data-name="Location">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Location" class="form-group ivf_semenanalysisreport_Location">
<input type="<?= $Grid->Location->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Location" name="x<?= $Grid->RowIndex ?>_Location" id="x<?= $Grid->RowIndex ?>_Location" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Location->getPlaceHolder()) ?>" value="<?= $Grid->Location->EditValue ?>"<?= $Grid->Location->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Location->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Location" class="form-group ivf_semenanalysisreport_Location">
<span<?= $Grid->Location->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Location->getDisplayValue($Grid->Location->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Location" id="x<?= $Grid->RowIndex ?>_Location" value="<?= HtmlEncode($Grid->Location->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Location" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Location" id="o<?= $Grid->RowIndex ?>_Location" value="<?= HtmlEncode($Grid->Location->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Volume1->Visible) { // Volume1 ?>
        <td data-name="Volume1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Volume1" class="form-group ivf_semenanalysisreport_Volume1">
<input type="<?= $Grid->Volume1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="x<?= $Grid->RowIndex ?>_Volume1" id="x<?= $Grid->RowIndex ?>_Volume1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Volume1->getPlaceHolder()) ?>" value="<?= $Grid->Volume1->EditValue ?>"<?= $Grid->Volume1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Volume1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Volume1" class="form-group ivf_semenanalysisreport_Volume1">
<span<?= $Grid->Volume1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Volume1->getDisplayValue($Grid->Volume1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Volume1" id="x<?= $Grid->RowIndex ?>_Volume1" value="<?= HtmlEncode($Grid->Volume1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Volume1" id="o<?= $Grid->RowIndex ?>_Volume1" value="<?= HtmlEncode($Grid->Volume1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Concentration1->Visible) { // Concentration1 ?>
        <td data-name="Concentration1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Concentration1" class="form-group ivf_semenanalysisreport_Concentration1">
<input type="<?= $Grid->Concentration1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="x<?= $Grid->RowIndex ?>_Concentration1" id="x<?= $Grid->RowIndex ?>_Concentration1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Concentration1->getPlaceHolder()) ?>" value="<?= $Grid->Concentration1->EditValue ?>"<?= $Grid->Concentration1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Concentration1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Concentration1" class="form-group ivf_semenanalysisreport_Concentration1">
<span<?= $Grid->Concentration1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Concentration1->getDisplayValue($Grid->Concentration1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Concentration1" id="x<?= $Grid->RowIndex ?>_Concentration1" value="<?= HtmlEncode($Grid->Concentration1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Concentration1" id="o<?= $Grid->RowIndex ?>_Concentration1" value="<?= HtmlEncode($Grid->Concentration1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Total1->Visible) { // Total1 ?>
        <td data-name="Total1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Total1" class="form-group ivf_semenanalysisreport_Total1">
<input type="<?= $Grid->Total1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="x<?= $Grid->RowIndex ?>_Total1" id="x<?= $Grid->RowIndex ?>_Total1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Total1->getPlaceHolder()) ?>" value="<?= $Grid->Total1->EditValue ?>"<?= $Grid->Total1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Total1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Total1" class="form-group ivf_semenanalysisreport_Total1">
<span<?= $Grid->Total1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Total1->getDisplayValue($Grid->Total1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Total1" id="x<?= $Grid->RowIndex ?>_Total1" value="<?= HtmlEncode($Grid->Total1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Total1" id="o<?= $Grid->RowIndex ?>_Total1" value="<?= HtmlEncode($Grid->Total1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
        <td data-name="ProgressiveMotility1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProgressiveMotility1" class="form-group ivf_semenanalysisreport_ProgressiveMotility1">
<input type="<?= $Grid->ProgressiveMotility1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="x<?= $Grid->RowIndex ?>_ProgressiveMotility1" id="x<?= $Grid->RowIndex ?>_ProgressiveMotility1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->ProgressiveMotility1->getPlaceHolder()) ?>" value="<?= $Grid->ProgressiveMotility1->EditValue ?>"<?= $Grid->ProgressiveMotility1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProgressiveMotility1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProgressiveMotility1" class="form-group ivf_semenanalysisreport_ProgressiveMotility1">
<span<?= $Grid->ProgressiveMotility1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ProgressiveMotility1->getDisplayValue($Grid->ProgressiveMotility1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ProgressiveMotility1" id="x<?= $Grid->RowIndex ?>_ProgressiveMotility1" value="<?= HtmlEncode($Grid->ProgressiveMotility1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ProgressiveMotility1" id="o<?= $Grid->RowIndex ?>_ProgressiveMotility1" value="<?= HtmlEncode($Grid->ProgressiveMotility1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
        <td data-name="NonProgrssiveMotile1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonProgrssiveMotile1" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile1">
<input type="<?= $Grid->NonProgrssiveMotile1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile1" id="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->NonProgrssiveMotile1->getPlaceHolder()) ?>" value="<?= $Grid->NonProgrssiveMotile1->EditValue ?>"<?= $Grid->NonProgrssiveMotile1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NonProgrssiveMotile1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonProgrssiveMotile1" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile1">
<span<?= $Grid->NonProgrssiveMotile1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NonProgrssiveMotile1->getDisplayValue($Grid->NonProgrssiveMotile1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile1" id="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile1" value="<?= HtmlEncode($Grid->NonProgrssiveMotile1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NonProgrssiveMotile1" id="o<?= $Grid->RowIndex ?>_NonProgrssiveMotile1" value="<?= HtmlEncode($Grid->NonProgrssiveMotile1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Immotile1->Visible) { // Immotile1 ?>
        <td data-name="Immotile1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Immotile1" class="form-group ivf_semenanalysisreport_Immotile1">
<input type="<?= $Grid->Immotile1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="x<?= $Grid->RowIndex ?>_Immotile1" id="x<?= $Grid->RowIndex ?>_Immotile1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->Immotile1->getPlaceHolder()) ?>" value="<?= $Grid->Immotile1->EditValue ?>"<?= $Grid->Immotile1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Immotile1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Immotile1" class="form-group ivf_semenanalysisreport_Immotile1">
<span<?= $Grid->Immotile1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Immotile1->getDisplayValue($Grid->Immotile1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Immotile1" id="x<?= $Grid->RowIndex ?>_Immotile1" value="<?= HtmlEncode($Grid->Immotile1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Immotile1" id="o<?= $Grid->RowIndex ?>_Immotile1" value="<?= HtmlEncode($Grid->Immotile1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
        <td data-name="TotalProgrssiveMotile1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile1">
<input type="<?= $Grid->TotalProgrssiveMotile1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile1" id="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile1" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->TotalProgrssiveMotile1->getPlaceHolder()) ?>" value="<?= $Grid->TotalProgrssiveMotile1->EditValue ?>"<?= $Grid->TotalProgrssiveMotile1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TotalProgrssiveMotile1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile1">
<span<?= $Grid->TotalProgrssiveMotile1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TotalProgrssiveMotile1->getDisplayValue($Grid->TotalProgrssiveMotile1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile1" id="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?= HtmlEncode($Grid->TotalProgrssiveMotile1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TotalProgrssiveMotile1" id="o<?= $Grid->RowIndex ?>_TotalProgrssiveMotile1" value="<?= HtmlEncode($Grid->TotalProgrssiveMotile1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->TidNo->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TidNo" class="form-group ivf_semenanalysisreport_TidNo">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TidNo->getDisplayValue($Grid->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TidNo" class="form-group ivf_semenanalysisreport_TidNo">
<input type="<?= $Grid->TidNo->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Grid->TidNo->getPlaceHolder()) ?>" value="<?= $Grid->TidNo->EditValue ?>"<?= $Grid->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TidNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TidNo" class="form-group ivf_semenanalysisreport_TidNo">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TidNo->getDisplayValue($Grid->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TidNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TidNo" id="o<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Color->Visible) { // Color ?>
        <td data-name="Color">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Color" class="form-group ivf_semenanalysisreport_Color">
<input type="<?= $Grid->Color->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Color" name="x<?= $Grid->RowIndex ?>_Color" id="x<?= $Grid->RowIndex ?>_Color" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Color->getPlaceHolder()) ?>" value="<?= $Grid->Color->EditValue ?>"<?= $Grid->Color->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Color->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Color" class="form-group ivf_semenanalysisreport_Color">
<span<?= $Grid->Color->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Color->getDisplayValue($Grid->Color->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Color" id="x<?= $Grid->RowIndex ?>_Color" value="<?= HtmlEncode($Grid->Color->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Color" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Color" id="o<?= $Grid->RowIndex ?>_Color" value="<?= HtmlEncode($Grid->Color->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DoneBy->Visible) { // DoneBy ?>
        <td data-name="DoneBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DoneBy" class="form-group ivf_semenanalysisreport_DoneBy">
<input type="<?= $Grid->DoneBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="x<?= $Grid->RowIndex ?>_DoneBy" id="x<?= $Grid->RowIndex ?>_DoneBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DoneBy->getPlaceHolder()) ?>" value="<?= $Grid->DoneBy->EditValue ?>"<?= $Grid->DoneBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DoneBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DoneBy" class="form-group ivf_semenanalysisreport_DoneBy">
<span<?= $Grid->DoneBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DoneBy->getDisplayValue($Grid->DoneBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DoneBy" id="x<?= $Grid->RowIndex ?>_DoneBy" value="<?= HtmlEncode($Grid->DoneBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DoneBy" id="o<?= $Grid->RowIndex ?>_DoneBy" value="<?= HtmlEncode($Grid->DoneBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Method->Visible) { // Method ?>
        <td data-name="Method">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Method" class="form-group ivf_semenanalysisreport_Method">
<input type="<?= $Grid->Method->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Method" name="x<?= $Grid->RowIndex ?>_Method" id="x<?= $Grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Method->getPlaceHolder()) ?>" value="<?= $Grid->Method->EditValue ?>"<?= $Grid->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Method->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Method" class="form-group ivf_semenanalysisreport_Method">
<span<?= $Grid->Method->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Method->getDisplayValue($Grid->Method->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Method" id="x<?= $Grid->RowIndex ?>_Method" value="<?= HtmlEncode($Grid->Method->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Method" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Method" id="o<?= $Grid->RowIndex ?>_Method" value="<?= HtmlEncode($Grid->Method->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Abstinence->Visible) { // Abstinence ?>
        <td data-name="Abstinence">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Abstinence" class="form-group ivf_semenanalysisreport_Abstinence">
<input type="<?= $Grid->Abstinence->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="x<?= $Grid->RowIndex ?>_Abstinence" id="x<?= $Grid->RowIndex ?>_Abstinence" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Abstinence->getPlaceHolder()) ?>" value="<?= $Grid->Abstinence->EditValue ?>"<?= $Grid->Abstinence->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Abstinence->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Abstinence" class="form-group ivf_semenanalysisreport_Abstinence">
<span<?= $Grid->Abstinence->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Abstinence->getDisplayValue($Grid->Abstinence->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Abstinence" id="x<?= $Grid->RowIndex ?>_Abstinence" value="<?= HtmlEncode($Grid->Abstinence->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Abstinence" id="o<?= $Grid->RowIndex ?>_Abstinence" value="<?= HtmlEncode($Grid->Abstinence->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ProcessedBy->Visible) { // ProcessedBy ?>
        <td data-name="ProcessedBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProcessedBy" class="form-group ivf_semenanalysisreport_ProcessedBy">
<input type="<?= $Grid->ProcessedBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="x<?= $Grid->RowIndex ?>_ProcessedBy" id="x<?= $Grid->RowIndex ?>_ProcessedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ProcessedBy->getPlaceHolder()) ?>" value="<?= $Grid->ProcessedBy->EditValue ?>"<?= $Grid->ProcessedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProcessedBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProcessedBy" class="form-group ivf_semenanalysisreport_ProcessedBy">
<span<?= $Grid->ProcessedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ProcessedBy->getDisplayValue($Grid->ProcessedBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ProcessedBy" id="x<?= $Grid->RowIndex ?>_ProcessedBy" value="<?= HtmlEncode($Grid->ProcessedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ProcessedBy" id="o<?= $Grid->RowIndex ?>_ProcessedBy" value="<?= HtmlEncode($Grid->ProcessedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->InseminationTime->Visible) { // InseminationTime ?>
        <td data-name="InseminationTime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_InseminationTime" class="form-group ivf_semenanalysisreport_InseminationTime">
<input type="<?= $Grid->InseminationTime->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="x<?= $Grid->RowIndex ?>_InseminationTime" id="x<?= $Grid->RowIndex ?>_InseminationTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->InseminationTime->getPlaceHolder()) ?>" value="<?= $Grid->InseminationTime->EditValue ?>"<?= $Grid->InseminationTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->InseminationTime->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_InseminationTime" class="form-group ivf_semenanalysisreport_InseminationTime">
<span<?= $Grid->InseminationTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->InseminationTime->getDisplayValue($Grid->InseminationTime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_InseminationTime" id="x<?= $Grid->RowIndex ?>_InseminationTime" value="<?= HtmlEncode($Grid->InseminationTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_InseminationTime" id="o<?= $Grid->RowIndex ?>_InseminationTime" value="<?= HtmlEncode($Grid->InseminationTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->InseminationBy->Visible) { // InseminationBy ?>
        <td data-name="InseminationBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_InseminationBy" class="form-group ivf_semenanalysisreport_InseminationBy">
<input type="<?= $Grid->InseminationBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="x<?= $Grid->RowIndex ?>_InseminationBy" id="x<?= $Grid->RowIndex ?>_InseminationBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->InseminationBy->getPlaceHolder()) ?>" value="<?= $Grid->InseminationBy->EditValue ?>"<?= $Grid->InseminationBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->InseminationBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_InseminationBy" class="form-group ivf_semenanalysisreport_InseminationBy">
<span<?= $Grid->InseminationBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->InseminationBy->getDisplayValue($Grid->InseminationBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_InseminationBy" id="x<?= $Grid->RowIndex ?>_InseminationBy" value="<?= HtmlEncode($Grid->InseminationBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_InseminationBy" id="o<?= $Grid->RowIndex ?>_InseminationBy" value="<?= HtmlEncode($Grid->InseminationBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Big->Visible) { // Big ?>
        <td data-name="Big">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Big" class="form-group ivf_semenanalysisreport_Big">
<input type="<?= $Grid->Big->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Big" name="x<?= $Grid->RowIndex ?>_Big" id="x<?= $Grid->RowIndex ?>_Big" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Big->getPlaceHolder()) ?>" value="<?= $Grid->Big->EditValue ?>"<?= $Grid->Big->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Big->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Big" class="form-group ivf_semenanalysisreport_Big">
<span<?= $Grid->Big->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Big->getDisplayValue($Grid->Big->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Big" id="x<?= $Grid->RowIndex ?>_Big" value="<?= HtmlEncode($Grid->Big->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Big" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Big" id="o<?= $Grid->RowIndex ?>_Big" value="<?= HtmlEncode($Grid->Big->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Medium->Visible) { // Medium ?>
        <td data-name="Medium">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Medium" class="form-group ivf_semenanalysisreport_Medium">
<input type="<?= $Grid->Medium->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="x<?= $Grid->RowIndex ?>_Medium" id="x<?= $Grid->RowIndex ?>_Medium" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Medium->getPlaceHolder()) ?>" value="<?= $Grid->Medium->EditValue ?>"<?= $Grid->Medium->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Medium->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Medium" class="form-group ivf_semenanalysisreport_Medium">
<span<?= $Grid->Medium->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Medium->getDisplayValue($Grid->Medium->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Medium" id="x<?= $Grid->RowIndex ?>_Medium" value="<?= HtmlEncode($Grid->Medium->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Medium" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Medium" id="o<?= $Grid->RowIndex ?>_Medium" value="<?= HtmlEncode($Grid->Medium->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Small->Visible) { // Small ?>
        <td data-name="Small">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Small" class="form-group ivf_semenanalysisreport_Small">
<input type="<?= $Grid->Small->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Small" name="x<?= $Grid->RowIndex ?>_Small" id="x<?= $Grid->RowIndex ?>_Small" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Small->getPlaceHolder()) ?>" value="<?= $Grid->Small->EditValue ?>"<?= $Grid->Small->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Small->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Small" class="form-group ivf_semenanalysisreport_Small">
<span<?= $Grid->Small->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Small->getDisplayValue($Grid->Small->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Small" id="x<?= $Grid->RowIndex ?>_Small" value="<?= HtmlEncode($Grid->Small->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Small" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Small" id="o<?= $Grid->RowIndex ?>_Small" value="<?= HtmlEncode($Grid->Small->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NoHalo->Visible) { // NoHalo ?>
        <td data-name="NoHalo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NoHalo" class="form-group ivf_semenanalysisreport_NoHalo">
<input type="<?= $Grid->NoHalo->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="x<?= $Grid->RowIndex ?>_NoHalo" id="x<?= $Grid->RowIndex ?>_NoHalo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NoHalo->getPlaceHolder()) ?>" value="<?= $Grid->NoHalo->EditValue ?>"<?= $Grid->NoHalo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoHalo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NoHalo" class="form-group ivf_semenanalysisreport_NoHalo">
<span<?= $Grid->NoHalo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NoHalo->getDisplayValue($Grid->NoHalo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NoHalo" id="x<?= $Grid->RowIndex ?>_NoHalo" value="<?= HtmlEncode($Grid->NoHalo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NoHalo" id="o<?= $Grid->RowIndex ?>_NoHalo" value="<?= HtmlEncode($Grid->NoHalo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Fragmented->Visible) { // Fragmented ?>
        <td data-name="Fragmented">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Fragmented" class="form-group ivf_semenanalysisreport_Fragmented">
<input type="<?= $Grid->Fragmented->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="x<?= $Grid->RowIndex ?>_Fragmented" id="x<?= $Grid->RowIndex ?>_Fragmented" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Fragmented->getPlaceHolder()) ?>" value="<?= $Grid->Fragmented->EditValue ?>"<?= $Grid->Fragmented->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Fragmented->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Fragmented" class="form-group ivf_semenanalysisreport_Fragmented">
<span<?= $Grid->Fragmented->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Fragmented->getDisplayValue($Grid->Fragmented->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Fragmented" id="x<?= $Grid->RowIndex ?>_Fragmented" value="<?= HtmlEncode($Grid->Fragmented->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Fragmented" id="o<?= $Grid->RowIndex ?>_Fragmented" value="<?= HtmlEncode($Grid->Fragmented->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NonFragmented->Visible) { // NonFragmented ?>
        <td data-name="NonFragmented">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonFragmented" class="form-group ivf_semenanalysisreport_NonFragmented">
<input type="<?= $Grid->NonFragmented->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="x<?= $Grid->RowIndex ?>_NonFragmented" id="x<?= $Grid->RowIndex ?>_NonFragmented" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NonFragmented->getPlaceHolder()) ?>" value="<?= $Grid->NonFragmented->EditValue ?>"<?= $Grid->NonFragmented->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NonFragmented->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonFragmented" class="form-group ivf_semenanalysisreport_NonFragmented">
<span<?= $Grid->NonFragmented->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NonFragmented->getDisplayValue($Grid->NonFragmented->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NonFragmented" id="x<?= $Grid->RowIndex ?>_NonFragmented" value="<?= HtmlEncode($Grid->NonFragmented->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NonFragmented" id="o<?= $Grid->RowIndex ?>_NonFragmented" value="<?= HtmlEncode($Grid->NonFragmented->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DFI->Visible) { // DFI ?>
        <td data-name="DFI">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DFI" class="form-group ivf_semenanalysisreport_DFI">
<input type="<?= $Grid->DFI->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="x<?= $Grid->RowIndex ?>_DFI" id="x<?= $Grid->RowIndex ?>_DFI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DFI->getPlaceHolder()) ?>" value="<?= $Grid->DFI->EditValue ?>"<?= $Grid->DFI->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DFI->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_DFI" class="form-group ivf_semenanalysisreport_DFI">
<span<?= $Grid->DFI->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DFI->getDisplayValue($Grid->DFI->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DFI" id="x<?= $Grid->RowIndex ?>_DFI" value="<?= HtmlEncode($Grid->DFI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_DFI" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DFI" id="o<?= $Grid->RowIndex ?>_DFI" value="<?= HtmlEncode($Grid->DFI->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->IsueBy->Visible) { // IsueBy ?>
        <td data-name="IsueBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IsueBy" class="form-group ivf_semenanalysisreport_IsueBy">
<input type="<?= $Grid->IsueBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="x<?= $Grid->RowIndex ?>_IsueBy" id="x<?= $Grid->RowIndex ?>_IsueBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IsueBy->getPlaceHolder()) ?>" value="<?= $Grid->IsueBy->EditValue ?>"<?= $Grid->IsueBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IsueBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IsueBy" class="form-group ivf_semenanalysisreport_IsueBy">
<span<?= $Grid->IsueBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->IsueBy->getDisplayValue($Grid->IsueBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_IsueBy" id="x<?= $Grid->RowIndex ?>_IsueBy" value="<?= HtmlEncode($Grid->IsueBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IsueBy" id="o<?= $Grid->RowIndex ?>_IsueBy" value="<?= HtmlEncode($Grid->IsueBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Volume2->Visible) { // Volume2 ?>
        <td data-name="Volume2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Volume2" class="form-group ivf_semenanalysisreport_Volume2">
<input type="<?= $Grid->Volume2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="x<?= $Grid->RowIndex ?>_Volume2" id="x<?= $Grid->RowIndex ?>_Volume2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Volume2->getPlaceHolder()) ?>" value="<?= $Grid->Volume2->EditValue ?>"<?= $Grid->Volume2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Volume2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Volume2" class="form-group ivf_semenanalysisreport_Volume2">
<span<?= $Grid->Volume2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Volume2->getDisplayValue($Grid->Volume2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Volume2" id="x<?= $Grid->RowIndex ?>_Volume2" value="<?= HtmlEncode($Grid->Volume2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Volume2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Volume2" id="o<?= $Grid->RowIndex ?>_Volume2" value="<?= HtmlEncode($Grid->Volume2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Concentration2->Visible) { // Concentration2 ?>
        <td data-name="Concentration2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Concentration2" class="form-group ivf_semenanalysisreport_Concentration2">
<input type="<?= $Grid->Concentration2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="x<?= $Grid->RowIndex ?>_Concentration2" id="x<?= $Grid->RowIndex ?>_Concentration2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Concentration2->getPlaceHolder()) ?>" value="<?= $Grid->Concentration2->EditValue ?>"<?= $Grid->Concentration2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Concentration2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Concentration2" class="form-group ivf_semenanalysisreport_Concentration2">
<span<?= $Grid->Concentration2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Concentration2->getDisplayValue($Grid->Concentration2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Concentration2" id="x<?= $Grid->RowIndex ?>_Concentration2" value="<?= HtmlEncode($Grid->Concentration2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Concentration2" id="o<?= $Grid->RowIndex ?>_Concentration2" value="<?= HtmlEncode($Grid->Concentration2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Total2->Visible) { // Total2 ?>
        <td data-name="Total2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Total2" class="form-group ivf_semenanalysisreport_Total2">
<input type="<?= $Grid->Total2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="x<?= $Grid->RowIndex ?>_Total2" id="x<?= $Grid->RowIndex ?>_Total2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Total2->getPlaceHolder()) ?>" value="<?= $Grid->Total2->EditValue ?>"<?= $Grid->Total2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Total2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Total2" class="form-group ivf_semenanalysisreport_Total2">
<span<?= $Grid->Total2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Total2->getDisplayValue($Grid->Total2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Total2" id="x<?= $Grid->RowIndex ?>_Total2" value="<?= HtmlEncode($Grid->Total2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Total2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Total2" id="o<?= $Grid->RowIndex ?>_Total2" value="<?= HtmlEncode($Grid->Total2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
        <td data-name="ProgressiveMotility2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProgressiveMotility2" class="form-group ivf_semenanalysisreport_ProgressiveMotility2">
<input type="<?= $Grid->ProgressiveMotility2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="x<?= $Grid->RowIndex ?>_ProgressiveMotility2" id="x<?= $Grid->RowIndex ?>_ProgressiveMotility2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ProgressiveMotility2->getPlaceHolder()) ?>" value="<?= $Grid->ProgressiveMotility2->EditValue ?>"<?= $Grid->ProgressiveMotility2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProgressiveMotility2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_ProgressiveMotility2" class="form-group ivf_semenanalysisreport_ProgressiveMotility2">
<span<?= $Grid->ProgressiveMotility2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ProgressiveMotility2->getDisplayValue($Grid->ProgressiveMotility2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ProgressiveMotility2" id="x<?= $Grid->RowIndex ?>_ProgressiveMotility2" value="<?= HtmlEncode($Grid->ProgressiveMotility2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ProgressiveMotility2" id="o<?= $Grid->RowIndex ?>_ProgressiveMotility2" value="<?= HtmlEncode($Grid->ProgressiveMotility2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
        <td data-name="NonProgrssiveMotile2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonProgrssiveMotile2" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile2">
<input type="<?= $Grid->NonProgrssiveMotile2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile2" id="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NonProgrssiveMotile2->getPlaceHolder()) ?>" value="<?= $Grid->NonProgrssiveMotile2->EditValue ?>"<?= $Grid->NonProgrssiveMotile2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NonProgrssiveMotile2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_NonProgrssiveMotile2" class="form-group ivf_semenanalysisreport_NonProgrssiveMotile2">
<span<?= $Grid->NonProgrssiveMotile2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NonProgrssiveMotile2->getDisplayValue($Grid->NonProgrssiveMotile2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile2" id="x<?= $Grid->RowIndex ?>_NonProgrssiveMotile2" value="<?= HtmlEncode($Grid->NonProgrssiveMotile2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NonProgrssiveMotile2" id="o<?= $Grid->RowIndex ?>_NonProgrssiveMotile2" value="<?= HtmlEncode($Grid->NonProgrssiveMotile2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Immotile2->Visible) { // Immotile2 ?>
        <td data-name="Immotile2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Immotile2" class="form-group ivf_semenanalysisreport_Immotile2">
<input type="<?= $Grid->Immotile2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="x<?= $Grid->RowIndex ?>_Immotile2" id="x<?= $Grid->RowIndex ?>_Immotile2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Immotile2->getPlaceHolder()) ?>" value="<?= $Grid->Immotile2->EditValue ?>"<?= $Grid->Immotile2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Immotile2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_Immotile2" class="form-group ivf_semenanalysisreport_Immotile2">
<span<?= $Grid->Immotile2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Immotile2->getDisplayValue($Grid->Immotile2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Immotile2" id="x<?= $Grid->RowIndex ?>_Immotile2" value="<?= HtmlEncode($Grid->Immotile2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Immotile2" id="o<?= $Grid->RowIndex ?>_Immotile2" value="<?= HtmlEncode($Grid->Immotile2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
        <td data-name="TotalProgrssiveMotile2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile2">
<input type="<?= $Grid->TotalProgrssiveMotile2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile2" id="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TotalProgrssiveMotile2->getPlaceHolder()) ?>" value="<?= $Grid->TotalProgrssiveMotile2->EditValue ?>"<?= $Grid->TotalProgrssiveMotile2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TotalProgrssiveMotile2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="form-group ivf_semenanalysisreport_TotalProgrssiveMotile2">
<span<?= $Grid->TotalProgrssiveMotile2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TotalProgrssiveMotile2->getDisplayValue($Grid->TotalProgrssiveMotile2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile2" id="x<?= $Grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?= HtmlEncode($Grid->TotalProgrssiveMotile2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TotalProgrssiveMotile2" id="o<?= $Grid->RowIndex ?>_TotalProgrssiveMotile2" value="<?= HtmlEncode($Grid->TotalProgrssiveMotile2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->IssuedBy->Visible) { // IssuedBy ?>
        <td data-name="IssuedBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IssuedBy" class="form-group ivf_semenanalysisreport_IssuedBy">
<input type="<?= $Grid->IssuedBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="x<?= $Grid->RowIndex ?>_IssuedBy" id="x<?= $Grid->RowIndex ?>_IssuedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IssuedBy->getPlaceHolder()) ?>" value="<?= $Grid->IssuedBy->EditValue ?>"<?= $Grid->IssuedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IssuedBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IssuedBy" class="form-group ivf_semenanalysisreport_IssuedBy">
<span<?= $Grid->IssuedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->IssuedBy->getDisplayValue($Grid->IssuedBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_IssuedBy" id="x<?= $Grid->RowIndex ?>_IssuedBy" value="<?= HtmlEncode($Grid->IssuedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IssuedBy" id="o<?= $Grid->RowIndex ?>_IssuedBy" value="<?= HtmlEncode($Grid->IssuedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->IssuedTo->Visible) { // IssuedTo ?>
        <td data-name="IssuedTo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IssuedTo" class="form-group ivf_semenanalysisreport_IssuedTo">
<input type="<?= $Grid->IssuedTo->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="x<?= $Grid->RowIndex ?>_IssuedTo" id="x<?= $Grid->RowIndex ?>_IssuedTo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IssuedTo->getPlaceHolder()) ?>" value="<?= $Grid->IssuedTo->EditValue ?>"<?= $Grid->IssuedTo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IssuedTo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IssuedTo" class="form-group ivf_semenanalysisreport_IssuedTo">
<span<?= $Grid->IssuedTo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->IssuedTo->getDisplayValue($Grid->IssuedTo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_IssuedTo" id="x<?= $Grid->RowIndex ?>_IssuedTo" value="<?= HtmlEncode($Grid->IssuedTo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IssuedTo" id="o<?= $Grid->RowIndex ?>_IssuedTo" value="<?= HtmlEncode($Grid->IssuedTo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PaID->Visible) { // PaID ?>
        <td data-name="PaID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PaID" class="form-group ivf_semenanalysisreport_PaID">
<input type="<?= $Grid->PaID->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="x<?= $Grid->RowIndex ?>_PaID" id="x<?= $Grid->RowIndex ?>_PaID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaID->getPlaceHolder()) ?>" value="<?= $Grid->PaID->EditValue ?>"<?= $Grid->PaID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PaID" class="form-group ivf_semenanalysisreport_PaID">
<span<?= $Grid->PaID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PaID->getDisplayValue($Grid->PaID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PaID" id="x<?= $Grid->RowIndex ?>_PaID" value="<?= HtmlEncode($Grid->PaID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PaID" id="o<?= $Grid->RowIndex ?>_PaID" value="<?= HtmlEncode($Grid->PaID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PaName->Visible) { // PaName ?>
        <td data-name="PaName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PaName" class="form-group ivf_semenanalysisreport_PaName">
<input type="<?= $Grid->PaName->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="x<?= $Grid->RowIndex ?>_PaName" id="x<?= $Grid->RowIndex ?>_PaName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaName->getPlaceHolder()) ?>" value="<?= $Grid->PaName->EditValue ?>"<?= $Grid->PaName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PaName" class="form-group ivf_semenanalysisreport_PaName">
<span<?= $Grid->PaName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PaName->getDisplayValue($Grid->PaName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PaName" id="x<?= $Grid->RowIndex ?>_PaName" value="<?= HtmlEncode($Grid->PaName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PaName" id="o<?= $Grid->RowIndex ?>_PaName" value="<?= HtmlEncode($Grid->PaName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PaMobile->Visible) { // PaMobile ?>
        <td data-name="PaMobile">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PaMobile" class="form-group ivf_semenanalysisreport_PaMobile">
<input type="<?= $Grid->PaMobile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="x<?= $Grid->RowIndex ?>_PaMobile" id="x<?= $Grid->RowIndex ?>_PaMobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaMobile->getPlaceHolder()) ?>" value="<?= $Grid->PaMobile->EditValue ?>"<?= $Grid->PaMobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaMobile->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PaMobile" class="form-group ivf_semenanalysisreport_PaMobile">
<span<?= $Grid->PaMobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PaMobile->getDisplayValue($Grid->PaMobile->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PaMobile" id="x<?= $Grid->RowIndex ?>_PaMobile" value="<?= HtmlEncode($Grid->PaMobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PaMobile" id="o<?= $Grid->RowIndex ?>_PaMobile" value="<?= HtmlEncode($Grid->PaMobile->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PartnerID->Visible) { // PartnerID ?>
        <td data-name="PartnerID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PartnerID" class="form-group ivf_semenanalysisreport_PartnerID">
<input type="<?= $Grid->PartnerID->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="x<?= $Grid->RowIndex ?>_PartnerID" id="x<?= $Grid->RowIndex ?>_PartnerID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PartnerID->getPlaceHolder()) ?>" value="<?= $Grid->PartnerID->EditValue ?>"<?= $Grid->PartnerID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PartnerID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PartnerID" class="form-group ivf_semenanalysisreport_PartnerID">
<span<?= $Grid->PartnerID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PartnerID->getDisplayValue($Grid->PartnerID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PartnerID" id="x<?= $Grid->RowIndex ?>_PartnerID" value="<?= HtmlEncode($Grid->PartnerID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PartnerID" id="o<?= $Grid->RowIndex ?>_PartnerID" value="<?= HtmlEncode($Grid->PartnerID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PartnerName->Visible) { // PartnerName ?>
        <td data-name="PartnerName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PartnerName" class="form-group ivf_semenanalysisreport_PartnerName">
<input type="<?= $Grid->PartnerName->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="x<?= $Grid->RowIndex ?>_PartnerName" id="x<?= $Grid->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PartnerName->getPlaceHolder()) ?>" value="<?= $Grid->PartnerName->EditValue ?>"<?= $Grid->PartnerName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PartnerName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PartnerName" class="form-group ivf_semenanalysisreport_PartnerName">
<span<?= $Grid->PartnerName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PartnerName->getDisplayValue($Grid->PartnerName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PartnerName" id="x<?= $Grid->RowIndex ?>_PartnerName" value="<?= HtmlEncode($Grid->PartnerName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PartnerName" id="o<?= $Grid->RowIndex ?>_PartnerName" value="<?= HtmlEncode($Grid->PartnerName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PartnerMobile->Visible) { // PartnerMobile ?>
        <td data-name="PartnerMobile">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PartnerMobile" class="form-group ivf_semenanalysisreport_PartnerMobile">
<input type="<?= $Grid->PartnerMobile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="x<?= $Grid->RowIndex ?>_PartnerMobile" id="x<?= $Grid->RowIndex ?>_PartnerMobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PartnerMobile->getPlaceHolder()) ?>" value="<?= $Grid->PartnerMobile->EditValue ?>"<?= $Grid->PartnerMobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PartnerMobile->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PartnerMobile" class="form-group ivf_semenanalysisreport_PartnerMobile">
<span<?= $Grid->PartnerMobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PartnerMobile->getDisplayValue($Grid->PartnerMobile->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PartnerMobile" id="x<?= $Grid->RowIndex ?>_PartnerMobile" value="<?= HtmlEncode($Grid->PartnerMobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PartnerMobile" id="o<?= $Grid->RowIndex ?>_PartnerMobile" value="<?= HtmlEncode($Grid->PartnerMobile->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
        <td data-name="PREG_TEST_DATE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PREG_TEST_DATE" class="form-group ivf_semenanalysisreport_PREG_TEST_DATE">
<input type="<?= $Grid->PREG_TEST_DATE->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="x<?= $Grid->RowIndex ?>_PREG_TEST_DATE" id="x<?= $Grid->RowIndex ?>_PREG_TEST_DATE" placeholder="<?= HtmlEncode($Grid->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?= $Grid->PREG_TEST_DATE->EditValue ?>"<?= $Grid->PREG_TEST_DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PREG_TEST_DATE->getErrorMessage() ?></div>
<?php if (!$Grid->PREG_TEST_DATE->ReadOnly && !$Grid->PREG_TEST_DATE->Disabled && !isset($Grid->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($Grid->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_semenanalysisreportgrid", "x<?= $Grid->RowIndex ?>_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_PREG_TEST_DATE" class="form-group ivf_semenanalysisreport_PREG_TEST_DATE">
<span<?= $Grid->PREG_TEST_DATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PREG_TEST_DATE->getDisplayValue($Grid->PREG_TEST_DATE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PREG_TEST_DATE" id="x<?= $Grid->RowIndex ?>_PREG_TEST_DATE" value="<?= HtmlEncode($Grid->PREG_TEST_DATE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PREG_TEST_DATE" id="o<?= $Grid->RowIndex ?>_PREG_TEST_DATE" value="<?= HtmlEncode($Grid->PREG_TEST_DATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
        <td data-name="SPECIFIC_PROBLEMS">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="form-group ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
    <select
        id="x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS"
        name="x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS"
        class="form-control ew-select<?= $Grid->SPECIFIC_PROBLEMS->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS"
        data-table="ivf_semenanalysisreport"
        data-field="x_SPECIFIC_PROBLEMS"
        data-value-separator="<?= $Grid->SPECIFIC_PROBLEMS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->SPECIFIC_PROBLEMS->getPlaceHolder()) ?>"
        <?= $Grid->SPECIFIC_PROBLEMS->editAttributes() ?>>
        <?= $Grid->SPECIFIC_PROBLEMS->selectOptionListHtml("x{$Grid->RowIndex}_SPECIFIC_PROBLEMS") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->SPECIFIC_PROBLEMS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS']"),
        options = { name: "x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.SPECIFIC_PROBLEMS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.SPECIFIC_PROBLEMS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="form-group ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<span<?= $Grid->SPECIFIC_PROBLEMS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SPECIFIC_PROBLEMS->getDisplayValue($Grid->SPECIFIC_PROBLEMS->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="x<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?= HtmlEncode($Grid->SPECIFIC_PROBLEMS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS" id="o<?= $Grid->RowIndex ?>_SPECIFIC_PROBLEMS" value="<?= HtmlEncode($Grid->SPECIFIC_PROBLEMS->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->IMSC_1->Visible) { // IMSC_1 ?>
        <td data-name="IMSC_1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IMSC_1" class="form-group ivf_semenanalysisreport_IMSC_1">
<input type="<?= $Grid->IMSC_1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="x<?= $Grid->RowIndex ?>_IMSC_1" id="x<?= $Grid->RowIndex ?>_IMSC_1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IMSC_1->getPlaceHolder()) ?>" value="<?= $Grid->IMSC_1->EditValue ?>"<?= $Grid->IMSC_1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IMSC_1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IMSC_1" class="form-group ivf_semenanalysisreport_IMSC_1">
<span<?= $Grid->IMSC_1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->IMSC_1->getDisplayValue($Grid->IMSC_1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_IMSC_1" id="x<?= $Grid->RowIndex ?>_IMSC_1" value="<?= HtmlEncode($Grid->IMSC_1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IMSC_1" id="o<?= $Grid->RowIndex ?>_IMSC_1" value="<?= HtmlEncode($Grid->IMSC_1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->IMSC_2->Visible) { // IMSC_2 ?>
        <td data-name="IMSC_2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IMSC_2" class="form-group ivf_semenanalysisreport_IMSC_2">
<input type="<?= $Grid->IMSC_2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="x<?= $Grid->RowIndex ?>_IMSC_2" id="x<?= $Grid->RowIndex ?>_IMSC_2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->IMSC_2->getPlaceHolder()) ?>" value="<?= $Grid->IMSC_2->EditValue ?>"<?= $Grid->IMSC_2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->IMSC_2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IMSC_2" class="form-group ivf_semenanalysisreport_IMSC_2">
<span<?= $Grid->IMSC_2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->IMSC_2->getDisplayValue($Grid->IMSC_2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_IMSC_2" id="x<?= $Grid->RowIndex ?>_IMSC_2" value="<?= HtmlEncode($Grid->IMSC_2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IMSC_2" id="o<?= $Grid->RowIndex ?>_IMSC_2" value="<?= HtmlEncode($Grid->IMSC_2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
        <td data-name="LIQUIFACTION_STORAGE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="form-group ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
    <select
        id="x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE"
        name="x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE"
        class="form-control ew-select<?= $Grid->LIQUIFACTION_STORAGE->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE"
        data-table="ivf_semenanalysisreport"
        data-field="x_LIQUIFACTION_STORAGE"
        data-value-separator="<?= $Grid->LIQUIFACTION_STORAGE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->LIQUIFACTION_STORAGE->getPlaceHolder()) ?>"
        <?= $Grid->LIQUIFACTION_STORAGE->editAttributes() ?>>
        <?= $Grid->LIQUIFACTION_STORAGE->selectOptionListHtml("x{$Grid->RowIndex}_LIQUIFACTION_STORAGE") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->LIQUIFACTION_STORAGE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE']"),
        options = { name: "x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.LIQUIFACTION_STORAGE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.LIQUIFACTION_STORAGE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="form-group ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<span<?= $Grid->LIQUIFACTION_STORAGE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->LIQUIFACTION_STORAGE->getDisplayValue($Grid->LIQUIFACTION_STORAGE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="x<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?= HtmlEncode($Grid->LIQUIFACTION_STORAGE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE" id="o<?= $Grid->RowIndex ?>_LIQUIFACTION_STORAGE" value="<?= HtmlEncode($Grid->LIQUIFACTION_STORAGE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
        <td data-name="IUI_PREP_METHOD">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IUI_PREP_METHOD" class="form-group ivf_semenanalysisreport_IUI_PREP_METHOD">
    <select
        id="x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD"
        name="x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD"
        class="form-control ew-select<?= $Grid->IUI_PREP_METHOD->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD"
        data-table="ivf_semenanalysisreport"
        data-field="x_IUI_PREP_METHOD"
        data-value-separator="<?= $Grid->IUI_PREP_METHOD->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->IUI_PREP_METHOD->getPlaceHolder()) ?>"
        <?= $Grid->IUI_PREP_METHOD->editAttributes() ?>>
        <?= $Grid->IUI_PREP_METHOD->selectOptionListHtml("x{$Grid->RowIndex}_IUI_PREP_METHOD") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->IUI_PREP_METHOD->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD']"),
        options = { name: "x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.IUI_PREP_METHOD.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.IUI_PREP_METHOD.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_IUI_PREP_METHOD" class="form-group ivf_semenanalysisreport_IUI_PREP_METHOD">
<span<?= $Grid->IUI_PREP_METHOD->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->IUI_PREP_METHOD->getDisplayValue($Grid->IUI_PREP_METHOD->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" data-hidden="1" name="x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD" id="x<?= $Grid->RowIndex ?>_IUI_PREP_METHOD" value="<?= HtmlEncode($Grid->IUI_PREP_METHOD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" data-hidden="1" name="o<?= $Grid->RowIndex ?>_IUI_PREP_METHOD" id="o<?= $Grid->RowIndex ?>_IUI_PREP_METHOD" value="<?= HtmlEncode($Grid->IUI_PREP_METHOD->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
        <td data-name="TIME_FROM_TRIGGER">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="form-group ivf_semenanalysisreport_TIME_FROM_TRIGGER">
    <select
        id="x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER"
        name="x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER"
        class="form-control ew-select<?= $Grid->TIME_FROM_TRIGGER->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER"
        data-table="ivf_semenanalysisreport"
        data-field="x_TIME_FROM_TRIGGER"
        data-value-separator="<?= $Grid->TIME_FROM_TRIGGER->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->TIME_FROM_TRIGGER->getPlaceHolder()) ?>"
        <?= $Grid->TIME_FROM_TRIGGER->editAttributes() ?>>
        <?= $Grid->TIME_FROM_TRIGGER->selectOptionListHtml("x{$Grid->RowIndex}_TIME_FROM_TRIGGER") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->TIME_FROM_TRIGGER->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER']"),
        options = { name: "x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.TIME_FROM_TRIGGER.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.TIME_FROM_TRIGGER.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="form-group ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<span<?= $Grid->TIME_FROM_TRIGGER->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TIME_FROM_TRIGGER->getDisplayValue($Grid->TIME_FROM_TRIGGER->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER" id="x<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?= HtmlEncode($Grid->TIME_FROM_TRIGGER->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER" id="o<?= $Grid->RowIndex ?>_TIME_FROM_TRIGGER" value="<?= HtmlEncode($Grid->TIME_FROM_TRIGGER->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
        <td data-name="COLLECTION_TO_PREPARATION">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="form-group ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
    <select
        id="x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION"
        name="x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION"
        class="form-control ew-select<?= $Grid->COLLECTION_TO_PREPARATION->isInvalidClass() ?>"
        data-select2-id="ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION"
        data-table="ivf_semenanalysisreport"
        data-field="x_COLLECTION_TO_PREPARATION"
        data-value-separator="<?= $Grid->COLLECTION_TO_PREPARATION->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->COLLECTION_TO_PREPARATION->getPlaceHolder()) ?>"
        <?= $Grid->COLLECTION_TO_PREPARATION->editAttributes() ?>>
        <?= $Grid->COLLECTION_TO_PREPARATION->selectOptionListHtml("x{$Grid->RowIndex}_COLLECTION_TO_PREPARATION") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->COLLECTION_TO_PREPARATION->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION']"),
        options = { name: "x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION", selectId: "ivf_semenanalysisreport_x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_semenanalysisreport.fields.COLLECTION_TO_PREPARATION.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_semenanalysisreport.fields.COLLECTION_TO_PREPARATION.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="form-group ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<span<?= $Grid->COLLECTION_TO_PREPARATION->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->COLLECTION_TO_PREPARATION->getDisplayValue($Grid->COLLECTION_TO_PREPARATION->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" data-hidden="1" name="x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="x<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?= HtmlEncode($Grid->COLLECTION_TO_PREPARATION->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" data-hidden="1" name="o<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION" id="o<?= $Grid->RowIndex ?>_COLLECTION_TO_PREPARATION" value="<?= HtmlEncode($Grid->COLLECTION_TO_PREPARATION->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
        <td data-name="TIME_FROM_PREP_TO_INSEM">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="form-group ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<input type="<?= $Grid->TIME_FROM_PREP_TO_INSEM->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="x<?= $Grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="x<?= $Grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TIME_FROM_PREP_TO_INSEM->getPlaceHolder()) ?>" value="<?= $Grid->TIME_FROM_PREP_TO_INSEM->EditValue ?>"<?= $Grid->TIME_FROM_PREP_TO_INSEM->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TIME_FROM_PREP_TO_INSEM->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="form-group ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<span<?= $Grid->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TIME_FROM_PREP_TO_INSEM->getDisplayValue($Grid->TIME_FROM_PREP_TO_INSEM->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="x<?= $Grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?= HtmlEncode($Grid->TIME_FROM_PREP_TO_INSEM->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" id="o<?= $Grid->RowIndex ?>_TIME_FROM_PREP_TO_INSEM" value="<?= HtmlEncode($Grid->TIME_FROM_PREP_TO_INSEM->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fivf_semenanalysisreportgrid","load"], function() {
    fivf_semenanalysisreportgrid.updateLists(<?= $Grid->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($Grid->CurrentMode == "add" || $Grid->CurrentMode == "copy") { ?>
<input type="hidden" name="<?= $Grid->FormKeyCountName ?>" id="<?= $Grid->FormKeyCountName ?>" value="<?= $Grid->KeyCount ?>">
<?= $Grid->MultiSelectKey ?>
<?php } ?>
<?php if ($Grid->CurrentMode == "edit") { ?>
<input type="hidden" name="<?= $Grid->FormKeyCountName ?>" id="<?= $Grid->FormKeyCountName ?>" value="<?= $Grid->KeyCount ?>">
<?= $Grid->MultiSelectKey ?>
<?php } ?>
<?php if ($Grid->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fivf_semenanalysisreportgrid">
</div><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Grid->Recordset) {
    $Grid->Recordset->close();
}
?>
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $Grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Grid->TotalRecords == 0 && !$Grid->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$Grid->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("ivf_semenanalysisreport");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php if (!$Grid->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_ivf_semenanalysisreport",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
