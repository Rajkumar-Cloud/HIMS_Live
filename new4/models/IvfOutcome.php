<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for ivf_outcome
 */
class IvfOutcome extends DbTable
{
    protected $SqlFrom = "";
    protected $SqlSelect = null;
    protected $SqlSelectList = null;
    protected $SqlWhere = "";
    protected $SqlGroupBy = "";
    protected $SqlHaving = "";
    protected $SqlOrderBy = "";
    public $UseSessionForListSql = true;

    // Column CSS classes
    public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
    public $RightColumnClass = "col-sm-10";
    public $OffsetColumnClass = "col-sm-10 offset-sm-2";
    public $TableLeftColumnClass = "w-col-2";

    // Export
    public $ExportDoc;

    // Fields
    public $id;
    public $RIDNO;
    public $Name;
    public $Age;
    public $treatment_status;
    public $ARTCYCLE;
    public $RESULT;
    public $status;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $outcomeDate;
    public $outcomeDay;
    public $OPResult;
    public $Gestation;
    public $TransferdEmbryos;
    public $InitalOfSacs;
    public $ImplimentationRate;
    public $EmbryoNo;
    public $ExtrauterineSac;
    public $PregnancyMonozygotic;
    public $TypeGestation;
    public $Urine;
    public $PTdate;
    public $Reduced;
    public $INduced;
    public $INducedDate;
    public $Miscarriage;
    public $Induced1;
    public $Type;
    public $IfClinical;
    public $GADate;
    public $GA;
    public $FoetalDeath;
    public $FerinatalDeath;
    public $TidNo;
    public $Ectopic;
    public $Extra;
    public $Implantation;
    public $DeliveryDate;
    public $BabyDetails;
    public $LSCSNormal;
    public $Notes;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'ivf_outcome';
        $this->TableName = 'ivf_outcome';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`ivf_outcome`";
        $this->Dbid = 'DB';
        $this->ExportAll = true;
        $this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
        $this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
        $this->ExportPageSize = "a4"; // Page size (PDF only)
        $this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
        $this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
        $this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
        $this->ExportWordColumnWidth = null; // Cell width (PHPWord only)
        $this->DetailAdd = false; // Allow detail add
        $this->DetailEdit = false; // Allow detail edit
        $this->DetailView = false; // Allow detail view
        $this->ShowMultipleDetails = false; // Show multiple details
        $this->GridAddRowCount = 5;
        $this->AllowAddDeleteRow = true; // Allow add/delete row
        $this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
        $this->BasicSearch = new BasicSearch($this->TableVar);

        // id
        $this->id = new DbField('ivf_outcome', 'ivf_outcome', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // RIDNO
        $this->RIDNO = new DbField('ivf_outcome', 'ivf_outcome', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, 11, -1, false, '`RIDNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNO->IsForeignKey = true; // Foreign key field
        $this->RIDNO->Sortable = true; // Allow sort
        $this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->RIDNO->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RIDNO->Param, "CustomMsg");
        $this->Fields['RIDNO'] = &$this->RIDNO;

        // Name
        $this->Name = new DbField('ivf_outcome', 'ivf_outcome', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, false, '`Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Name->IsForeignKey = true; // Foreign key field
        $this->Name->Sortable = true; // Allow sort
        $this->Name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Name->Param, "CustomMsg");
        $this->Fields['Name'] = &$this->Name;

        // Age
        $this->Age = new DbField('ivf_outcome', 'ivf_outcome', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, false, '`Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Age->Sortable = true; // Allow sort
        $this->Age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Age->Param, "CustomMsg");
        $this->Fields['Age'] = &$this->Age;

        // treatment_status
        $this->treatment_status = new DbField('ivf_outcome', 'ivf_outcome', 'x_treatment_status', 'treatment_status', '`treatment_status`', '`treatment_status`', 200, 45, -1, false, '`treatment_status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->treatment_status->Sortable = true; // Allow sort
        $this->treatment_status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->treatment_status->Param, "CustomMsg");
        $this->Fields['treatment_status'] = &$this->treatment_status;

        // ARTCYCLE
        $this->ARTCYCLE = new DbField('ivf_outcome', 'ivf_outcome', 'x_ARTCYCLE', 'ARTCYCLE', '`ARTCYCLE`', '`ARTCYCLE`', 200, 45, -1, false, '`ARTCYCLE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ARTCYCLE->Sortable = true; // Allow sort
        $this->ARTCYCLE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ARTCYCLE->Param, "CustomMsg");
        $this->Fields['ARTCYCLE'] = &$this->ARTCYCLE;

        // RESULT
        $this->RESULT = new DbField('ivf_outcome', 'ivf_outcome', 'x_RESULT', 'RESULT', '`RESULT`', '`RESULT`', 200, 45, -1, false, '`RESULT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RESULT->Sortable = true; // Allow sort
        $this->RESULT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RESULT->Param, "CustomMsg");
        $this->Fields['RESULT'] = &$this->RESULT;

        // status
        $this->status = new DbField('ivf_outcome', 'ivf_outcome', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status->Sortable = true; // Allow sort
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('ivf_outcome', 'ivf_outcome', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('ivf_outcome', 'ivf_outcome', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('ivf_outcome', 'ivf_outcome', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('ivf_outcome', 'ivf_outcome', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // outcomeDate
        $this->outcomeDate = new DbField('ivf_outcome', 'ivf_outcome', 'x_outcomeDate', 'outcomeDate', '`outcomeDate`', CastDateFieldForLike("`outcomeDate`", 0, "DB"), 135, 19, 0, false, '`outcomeDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->outcomeDate->Sortable = true; // Allow sort
        $this->outcomeDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->outcomeDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->outcomeDate->Param, "CustomMsg");
        $this->Fields['outcomeDate'] = &$this->outcomeDate;

        // outcomeDay
        $this->outcomeDay = new DbField('ivf_outcome', 'ivf_outcome', 'x_outcomeDay', 'outcomeDay', '`outcomeDay`', CastDateFieldForLike("`outcomeDay`", 0, "DB"), 135, 19, 0, false, '`outcomeDay`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->outcomeDay->Sortable = true; // Allow sort
        $this->outcomeDay->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->outcomeDay->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->outcomeDay->Param, "CustomMsg");
        $this->Fields['outcomeDay'] = &$this->outcomeDay;

        // OPResult
        $this->OPResult = new DbField('ivf_outcome', 'ivf_outcome', 'x_OPResult', 'OPResult', '`OPResult`', '`OPResult`', 200, 45, -1, false, '`OPResult`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OPResult->Sortable = true; // Allow sort
        $this->OPResult->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OPResult->Param, "CustomMsg");
        $this->Fields['OPResult'] = &$this->OPResult;

        // Gestation
        $this->Gestation = new DbField('ivf_outcome', 'ivf_outcome', 'x_Gestation', 'Gestation', '`Gestation`', '`Gestation`', 200, 45, -1, false, '`Gestation`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->Gestation->Sortable = true; // Allow sort
        $this->Gestation->Lookup = new Lookup('Gestation', 'ivf_outcome', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Gestation->OptionCount = 2;
        $this->Gestation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Gestation->Param, "CustomMsg");
        $this->Fields['Gestation'] = &$this->Gestation;

        // TransferdEmbryos
        $this->TransferdEmbryos = new DbField('ivf_outcome', 'ivf_outcome', 'x_TransferdEmbryos', 'TransferdEmbryos', '`TransferdEmbryos`', '`TransferdEmbryos`', 200, 45, -1, false, '`TransferdEmbryos`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TransferdEmbryos->Sortable = true; // Allow sort
        $this->TransferdEmbryos->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TransferdEmbryos->Param, "CustomMsg");
        $this->Fields['TransferdEmbryos'] = &$this->TransferdEmbryos;

        // InitalOfSacs
        $this->InitalOfSacs = new DbField('ivf_outcome', 'ivf_outcome', 'x_InitalOfSacs', 'InitalOfSacs', '`InitalOfSacs`', '`InitalOfSacs`', 200, 45, -1, false, '`InitalOfSacs`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->InitalOfSacs->Sortable = true; // Allow sort
        $this->InitalOfSacs->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->InitalOfSacs->Param, "CustomMsg");
        $this->Fields['InitalOfSacs'] = &$this->InitalOfSacs;

        // ImplimentationRate
        $this->ImplimentationRate = new DbField('ivf_outcome', 'ivf_outcome', 'x_ImplimentationRate', 'ImplimentationRate', '`ImplimentationRate`', '`ImplimentationRate`', 200, 45, -1, false, '`ImplimentationRate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ImplimentationRate->Sortable = true; // Allow sort
        $this->ImplimentationRate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ImplimentationRate->Param, "CustomMsg");
        $this->Fields['ImplimentationRate'] = &$this->ImplimentationRate;

        // EmbryoNo
        $this->EmbryoNo = new DbField('ivf_outcome', 'ivf_outcome', 'x_EmbryoNo', 'EmbryoNo', '`EmbryoNo`', '`EmbryoNo`', 200, 45, -1, false, '`EmbryoNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EmbryoNo->Sortable = true; // Allow sort
        $this->EmbryoNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EmbryoNo->Param, "CustomMsg");
        $this->Fields['EmbryoNo'] = &$this->EmbryoNo;

        // ExtrauterineSac
        $this->ExtrauterineSac = new DbField('ivf_outcome', 'ivf_outcome', 'x_ExtrauterineSac', 'ExtrauterineSac', '`ExtrauterineSac`', '`ExtrauterineSac`', 200, 45, -1, false, '`ExtrauterineSac`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ExtrauterineSac->Sortable = true; // Allow sort
        $this->ExtrauterineSac->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ExtrauterineSac->Param, "CustomMsg");
        $this->Fields['ExtrauterineSac'] = &$this->ExtrauterineSac;

        // PregnancyMonozygotic
        $this->PregnancyMonozygotic = new DbField('ivf_outcome', 'ivf_outcome', 'x_PregnancyMonozygotic', 'PregnancyMonozygotic', '`PregnancyMonozygotic`', '`PregnancyMonozygotic`', 200, 45, -1, false, '`PregnancyMonozygotic`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PregnancyMonozygotic->Sortable = true; // Allow sort
        $this->PregnancyMonozygotic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PregnancyMonozygotic->Param, "CustomMsg");
        $this->Fields['PregnancyMonozygotic'] = &$this->PregnancyMonozygotic;

        // TypeGestation
        $this->TypeGestation = new DbField('ivf_outcome', 'ivf_outcome', 'x_TypeGestation', 'TypeGestation', '`TypeGestation`', '`TypeGestation`', 200, 45, -1, false, '`TypeGestation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TypeGestation->Sortable = true; // Allow sort
        $this->TypeGestation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TypeGestation->Param, "CustomMsg");
        $this->Fields['TypeGestation'] = &$this->TypeGestation;

        // Urine
        $this->Urine = new DbField('ivf_outcome', 'ivf_outcome', 'x_Urine', 'Urine', '`Urine`', '`Urine`', 200, 45, -1, false, '`Urine`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Urine->Sortable = true; // Allow sort
        $this->Urine->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Urine->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Urine->Lookup = new Lookup('Urine', 'ivf_outcome', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Urine->OptionCount = 2;
        $this->Urine->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Urine->Param, "CustomMsg");
        $this->Fields['Urine'] = &$this->Urine;

        // PTdate
        $this->PTdate = new DbField('ivf_outcome', 'ivf_outcome', 'x_PTdate', 'PTdate', '`PTdate`', '`PTdate`', 200, 45, -1, false, '`PTdate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PTdate->Sortable = true; // Allow sort
        $this->PTdate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PTdate->Param, "CustomMsg");
        $this->Fields['PTdate'] = &$this->PTdate;

        // Reduced
        $this->Reduced = new DbField('ivf_outcome', 'ivf_outcome', 'x_Reduced', 'Reduced', '`Reduced`', '`Reduced`', 200, 45, -1, false, '`Reduced`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Reduced->Sortable = true; // Allow sort
        $this->Reduced->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Reduced->Param, "CustomMsg");
        $this->Fields['Reduced'] = &$this->Reduced;

        // INduced
        $this->INduced = new DbField('ivf_outcome', 'ivf_outcome', 'x_INduced', 'INduced', '`INduced`', '`INduced`', 200, 45, -1, false, '`INduced`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->INduced->Sortable = true; // Allow sort
        $this->INduced->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->INduced->Param, "CustomMsg");
        $this->Fields['INduced'] = &$this->INduced;

        // INducedDate
        $this->INducedDate = new DbField('ivf_outcome', 'ivf_outcome', 'x_INducedDate', 'INducedDate', '`INducedDate`', '`INducedDate`', 200, 45, -1, false, '`INducedDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->INducedDate->Sortable = true; // Allow sort
        $this->INducedDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->INducedDate->Param, "CustomMsg");
        $this->Fields['INducedDate'] = &$this->INducedDate;

        // Miscarriage
        $this->Miscarriage = new DbField('ivf_outcome', 'ivf_outcome', 'x_Miscarriage', 'Miscarriage', '`Miscarriage`', '`Miscarriage`', 200, 45, -1, false, '`Miscarriage`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->Miscarriage->Sortable = true; // Allow sort
        $this->Miscarriage->Lookup = new Lookup('Miscarriage', 'ivf_outcome', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Miscarriage->OptionCount = 2;
        $this->Miscarriage->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Miscarriage->Param, "CustomMsg");
        $this->Fields['Miscarriage'] = &$this->Miscarriage;

        // Induced1
        $this->Induced1 = new DbField('ivf_outcome', 'ivf_outcome', 'x_Induced1', 'Induced1', '`Induced1`', '`Induced1`', 200, 45, -1, false, '`Induced1`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->Induced1->Sortable = true; // Allow sort
        $this->Induced1->Lookup = new Lookup('Induced1', 'ivf_outcome', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Induced1->OptionCount = 2;
        $this->Induced1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Induced1->Param, "CustomMsg");
        $this->Fields['Induced1'] = &$this->Induced1;

        // Type
        $this->Type = new DbField('ivf_outcome', 'ivf_outcome', 'x_Type', 'Type', '`Type`', '`Type`', 200, 45, -1, false, '`Type`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->Type->Sortable = true; // Allow sort
        $this->Type->Lookup = new Lookup('Type', 'ivf_outcome', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Type->OptionCount = 2;
        $this->Type->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Type->Param, "CustomMsg");
        $this->Fields['Type'] = &$this->Type;

        // IfClinical
        $this->IfClinical = new DbField('ivf_outcome', 'ivf_outcome', 'x_IfClinical', 'IfClinical', '`IfClinical`', '`IfClinical`', 200, 45, -1, false, '`IfClinical`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IfClinical->Sortable = true; // Allow sort
        $this->IfClinical->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IfClinical->Param, "CustomMsg");
        $this->Fields['IfClinical'] = &$this->IfClinical;

        // GADate
        $this->GADate = new DbField('ivf_outcome', 'ivf_outcome', 'x_GADate', 'GADate', '`GADate`', '`GADate`', 200, 45, -1, false, '`GADate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GADate->Sortable = true; // Allow sort
        $this->GADate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GADate->Param, "CustomMsg");
        $this->Fields['GADate'] = &$this->GADate;

        // GA
        $this->GA = new DbField('ivf_outcome', 'ivf_outcome', 'x_GA', 'GA', '`GA`', '`GA`', 200, 45, -1, false, '`GA`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GA->Sortable = true; // Allow sort
        $this->GA->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GA->Param, "CustomMsg");
        $this->Fields['GA'] = &$this->GA;

        // FoetalDeath
        $this->FoetalDeath = new DbField('ivf_outcome', 'ivf_outcome', 'x_FoetalDeath', 'FoetalDeath', '`FoetalDeath`', '`FoetalDeath`', 200, 45, -1, false, '`FoetalDeath`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->FoetalDeath->Sortable = true; // Allow sort
        $this->FoetalDeath->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->FoetalDeath->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->FoetalDeath->Lookup = new Lookup('FoetalDeath', 'ivf_outcome', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->FoetalDeath->OptionCount = 2;
        $this->FoetalDeath->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FoetalDeath->Param, "CustomMsg");
        $this->Fields['FoetalDeath'] = &$this->FoetalDeath;

        // FerinatalDeath
        $this->FerinatalDeath = new DbField('ivf_outcome', 'ivf_outcome', 'x_FerinatalDeath', 'FerinatalDeath', '`FerinatalDeath`', '`FerinatalDeath`', 200, 45, -1, false, '`FerinatalDeath`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->FerinatalDeath->Sortable = true; // Allow sort
        $this->FerinatalDeath->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->FerinatalDeath->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->FerinatalDeath->Lookup = new Lookup('FerinatalDeath', 'ivf_outcome', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->FerinatalDeath->OptionCount = 2;
        $this->FerinatalDeath->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FerinatalDeath->Param, "CustomMsg");
        $this->Fields['FerinatalDeath'] = &$this->FerinatalDeath;

        // TidNo
        $this->TidNo = new DbField('ivf_outcome', 'ivf_outcome', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, false, '`TidNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TidNo->IsForeignKey = true; // Foreign key field
        $this->TidNo->Sortable = true; // Allow sort
        $this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->TidNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TidNo->Param, "CustomMsg");
        $this->Fields['TidNo'] = &$this->TidNo;

        // Ectopic
        $this->Ectopic = new DbField('ivf_outcome', 'ivf_outcome', 'x_Ectopic', 'Ectopic', '`Ectopic`', '`Ectopic`', 200, 45, -1, false, '`Ectopic`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->Ectopic->Sortable = true; // Allow sort
        $this->Ectopic->Lookup = new Lookup('Ectopic', 'ivf_outcome', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Ectopic->OptionCount = 3;
        $this->Ectopic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Ectopic->Param, "CustomMsg");
        $this->Fields['Ectopic'] = &$this->Ectopic;

        // Extra
        $this->Extra = new DbField('ivf_outcome', 'ivf_outcome', 'x_Extra', 'Extra', '`Extra`', '`Extra`', 200, 45, -1, false, '`Extra`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->Extra->Sortable = true; // Allow sort
        $this->Extra->Lookup = new Lookup('Extra', 'ivf_outcome', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Extra->OptionCount = 3;
        $this->Extra->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Extra->Param, "CustomMsg");
        $this->Fields['Extra'] = &$this->Extra;

        // Implantation
        $this->Implantation = new DbField('ivf_outcome', 'ivf_outcome', 'x_Implantation', 'Implantation', '`Implantation`', '`Implantation`', 200, 45, -1, false, '`Implantation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Implantation->Sortable = true; // Allow sort
        $this->Implantation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Implantation->Param, "CustomMsg");
        $this->Fields['Implantation'] = &$this->Implantation;

        // DeliveryDate
        $this->DeliveryDate = new DbField('ivf_outcome', 'ivf_outcome', 'x_DeliveryDate', 'DeliveryDate', '`DeliveryDate`', CastDateFieldForLike("`DeliveryDate`", 7, "DB"), 135, 19, 7, false, '`DeliveryDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DeliveryDate->Sortable = true; // Allow sort
        $this->DeliveryDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->DeliveryDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DeliveryDate->Param, "CustomMsg");
        $this->Fields['DeliveryDate'] = &$this->DeliveryDate;

        // BabyDetails
        $this->BabyDetails = new DbField('ivf_outcome', 'ivf_outcome', 'x_BabyDetails', 'BabyDetails', '`BabyDetails`', '`BabyDetails`', 201, 500, -1, false, '`BabyDetails`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BabyDetails->Sortable = true; // Allow sort
        $this->BabyDetails->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BabyDetails->Param, "CustomMsg");
        $this->Fields['BabyDetails'] = &$this->BabyDetails;

        // LSCSNormal
        $this->LSCSNormal = new DbField('ivf_outcome', 'ivf_outcome', 'x_LSCSNormal', 'LSCSNormal', '`LSCSNormal`', '`LSCSNormal`', 201, 500, -1, false, '`LSCSNormal`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LSCSNormal->Sortable = true; // Allow sort
        $this->LSCSNormal->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LSCSNormal->Param, "CustomMsg");
        $this->Fields['LSCSNormal'] = &$this->LSCSNormal;

        // Notes
        $this->Notes = new DbField('ivf_outcome', 'ivf_outcome', 'x_Notes', 'Notes', '`Notes`', '`Notes`', 201, 5000, -1, false, '`Notes`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Notes->Sortable = true; // Allow sort
        $this->Notes->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Notes->Param, "CustomMsg");
        $this->Fields['Notes'] = &$this->Notes;
    }

    // Field Visibility
    public function getFieldVisibility($fldParm)
    {
        global $Security;
        return $this->$fldParm->Visible; // Returns original value
    }

    // Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
    public function setLeftColumnClass($class)
    {
        if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
            $this->LeftColumnClass = $class . " col-form-label ew-label";
            $this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
            $this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
            $this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
        }
    }

    // Single column sort
    public function updateSort(&$fld)
    {
        if ($this->CurrentOrder == $fld->Name) {
            $sortField = $fld->Expression;
            $lastSort = $fld->getSort();
            if (in_array($this->CurrentOrderType, ["ASC", "DESC", "NO"])) {
                $curSort = $this->CurrentOrderType;
            } else {
                $curSort = $lastSort;
            }
            $fld->setSort($curSort);
            $orderBy = in_array($curSort, ["ASC", "DESC"]) ? $sortField . " " . $curSort : "";
            $this->setSessionOrderBy($orderBy); // Save to Session
        } else {
            $fld->setSort("");
        }
    }

    // Current master table name
    public function getCurrentMasterTable()
    {
        return Session(PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE"));
    }

    public function setCurrentMasterTable($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")] = $v;
    }

    // Session master WHERE clause
    public function getMasterFilter()
    {
        // Master filter
        $masterFilter = "";
        if ($this->getCurrentMasterTable() == "ivf_treatment_plan") {
            if ($this->RIDNO->getSessionValue() != "") {
                $masterFilter .= "" . GetForeignKeySql("`RIDNO`", $this->RIDNO->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->Name->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`Name`", $this->Name->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
            if ($this->TidNo->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`id`", $this->TidNo->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        return $masterFilter;
    }

    // Session detail WHERE clause
    public function getDetailFilter()
    {
        // Detail filter
        $detailFilter = "";
        if ($this->getCurrentMasterTable() == "ivf_treatment_plan") {
            if ($this->RIDNO->getSessionValue() != "") {
                $detailFilter .= "" . GetForeignKeySql("`RIDNO`", $this->RIDNO->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->Name->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`Name`", $this->Name->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
            if ($this->TidNo->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`TidNo`", $this->TidNo->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        return $detailFilter;
    }

    // Master filter
    public function sqlMasterFilter_ivf_treatment_plan()
    {
        return "`RIDNO`=@RIDNO@ AND `Name`='@Name@' AND `id`=@id@";
    }
    // Detail filter
    public function sqlDetailFilter_ivf_treatment_plan()
    {
        return "`RIDNO`=@RIDNO@ AND `Name`='@Name@' AND `TidNo`=@TidNo@";
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`ivf_outcome`";
    }

    public function sqlFrom() // For backward compatibility
    {
        return $this->getSqlFrom();
    }

    public function setSqlFrom($v)
    {
        $this->SqlFrom = $v;
    }

    public function getSqlSelect() // Select
    {
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*");
    }

    public function sqlSelect() // For backward compatibility
    {
        return $this->getSqlSelect();
    }

    public function setSqlSelect($v)
    {
        $this->SqlSelect = $v;
    }

    public function getSqlWhere() // Where
    {
        $where = ($this->SqlWhere != "") ? $this->SqlWhere : "";
        $this->DefaultFilter = "";
        AddFilter($where, $this->DefaultFilter);
        return $where;
    }

    public function sqlWhere() // For backward compatibility
    {
        return $this->getSqlWhere();
    }

    public function setSqlWhere($v)
    {
        $this->SqlWhere = $v;
    }

    public function getSqlGroupBy() // Group By
    {
        return ($this->SqlGroupBy != "") ? $this->SqlGroupBy : "";
    }

    public function sqlGroupBy() // For backward compatibility
    {
        return $this->getSqlGroupBy();
    }

    public function setSqlGroupBy($v)
    {
        $this->SqlGroupBy = $v;
    }

    public function getSqlHaving() // Having
    {
        return ($this->SqlHaving != "") ? $this->SqlHaving : "";
    }

    public function sqlHaving() // For backward compatibility
    {
        return $this->getSqlHaving();
    }

    public function setSqlHaving($v)
    {
        $this->SqlHaving = $v;
    }

    public function getSqlOrderBy() // Order By
    {
        return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : $this->DefaultSort;
    }

    public function sqlOrderBy() // For backward compatibility
    {
        return $this->getSqlOrderBy();
    }

    public function setSqlOrderBy($v)
    {
        $this->SqlOrderBy = $v;
    }

    // Apply User ID filters
    public function applyUserIDFilters($filter)
    {
        return $filter;
    }

    // Check if User ID security allows view all
    public function userIDAllow($id = "")
    {
        $allow = $this->UserIDAllowSecurity;
        switch ($id) {
            case "add":
            case "copy":
            case "gridadd":
            case "register":
            case "addopt":
                return (($allow & 1) == 1);
            case "edit":
            case "gridedit":
            case "update":
            case "changepassword":
            case "resetpassword":
                return (($allow & 4) == 4);
            case "delete":
                return (($allow & 2) == 2);
            case "view":
                return (($allow & 32) == 32);
            case "search":
                return (($allow & 64) == 64);
            default:
                return (($allow & 8) == 8);
        }
    }

    /**
     * Get record count
     *
     * @param string|QueryBuilder $sql SQL or QueryBuilder
     * @param mixed $c Connection
     * @return int
     */
    public function getRecordCount($sql, $c = null)
    {
        $cnt = -1;
        $rs = null;
        if ($sql instanceof \Doctrine\DBAL\Query\QueryBuilder) { // Query builder
            $sqlwrk = clone $sql;
            $sqlwrk = $sqlwrk->resetQueryPart("orderBy")->getSQL();
        } else {
            $sqlwrk = $sql;
        }
        $pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';
        // Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
        if (
            ($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
            preg_match($pattern, $sqlwrk) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sqlwrk) &&
            !preg_match('/^\s*select\s+distinct\s+/i', $sqlwrk) && !preg_match('/\s+order\s+by\s+/i', $sqlwrk)
        ) {
            $sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sqlwrk);
        } else {
            $sqlwrk = "SELECT COUNT(*) FROM (" . $sqlwrk . ") COUNT_TABLE";
        }
        $conn = $c ?? $this->getConnection();
        $rs = $conn->executeQuery($sqlwrk);
        $cnt = $rs->fetchColumn();
        if ($cnt !== false) {
            return (int)$cnt;
        }

        // Unable to get count by SELECT COUNT(*), execute the SQL to get record count directly
        return ExecuteRecordCount($sql, $conn);
    }

    // Get SQL
    public function getSql($where, $orderBy = "")
    {
        return $this->buildSelectSql(
            $this->getSqlSelect(),
            $this->getSqlFrom(),
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $where,
            $orderBy
        )->getSQL();
    }

    // Table SQL
    public function getCurrentSql()
    {
        $filter = $this->CurrentFilter;
        $filter = $this->applyUserIDFilters($filter);
        $sort = $this->getSessionOrderBy();
        return $this->getSql($filter, $sort);
    }

    /**
     * Table SQL with List page filter
     *
     * @return QueryBuilder
     */
    public function getListSql()
    {
        $filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
        AddFilter($filter, $this->CurrentFilter);
        $filter = $this->applyUserIDFilters($filter);
        $this->recordsetSelecting($filter);
        $select = $this->getSqlSelect();
        $from = $this->getSqlFrom();
        $sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
        $this->Sort = $sort;
        return $this->buildSelectSql(
            $select,
            $from,
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $filter,
            $sort
        );
    }

    // Get ORDER BY clause
    public function getOrderBy()
    {
        $orderBy = $this->getSqlOrderBy();
        $sort = $this->getSessionOrderBy();
        if ($orderBy != "" && $sort != "") {
            $orderBy .= ", " . $sort;
        } elseif ($sort != "") {
            $orderBy = $sort;
        }
        return $orderBy;
    }

    // Get record count based on filter (for detail record count in master table pages)
    public function loadRecordCount($filter)
    {
        $origFilter = $this->CurrentFilter;
        $this->CurrentFilter = $filter;
        $this->recordsetSelecting($this->CurrentFilter);
        $select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
        $having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
        $cnt = $this->getRecordCount($sql);
        $this->CurrentFilter = $origFilter;
        return $cnt;
    }

    // Get record count (for current List page)
    public function listRecordCount()
    {
        $filter = $this->getSessionWhere();
        AddFilter($filter, $this->CurrentFilter);
        $filter = $this->applyUserIDFilters($filter);
        $this->recordsetSelecting($filter);
        $select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
        $having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
        $cnt = $this->getRecordCount($sql);
        return $cnt;
    }

    /**
     * INSERT statement
     *
     * @param mixed $rs
     * @return QueryBuilder
     */
    protected function insertSql(&$rs)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->insert($this->UpdateTable);
        foreach ($rs as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom) {
                continue;
            }
            $type = GetParameterType($this->Fields[$name], $value, $this->Dbid);
            $queryBuilder->setValue($this->Fields[$name]->Expression, $queryBuilder->createPositionalParameter($value, $type));
        }
        return $queryBuilder;
    }

    // Insert
    public function insert(&$rs)
    {
        $conn = $this->getConnection();
        $success = $this->insertSql($rs)->execute();
        if ($success) {
            // Get insert id if necessary
            $this->id->setDbValue($conn->lastInsertId());
            $rs['id'] = $this->id->DbValue;
        }
        return $success;
    }

    /**
     * UPDATE statement
     *
     * @param array $rs Data to be updated
     * @param string|array $where WHERE clause
     * @param string $curfilter Filter
     * @return QueryBuilder
     */
    protected function updateSql(&$rs, $where = "", $curfilter = true)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->update($this->UpdateTable);
        foreach ($rs as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom || $this->Fields[$name]->IsAutoIncrement) {
                continue;
            }
            $type = GetParameterType($this->Fields[$name], $value, $this->Dbid);
            $queryBuilder->set($this->Fields[$name]->Expression, $queryBuilder->createPositionalParameter($value, $type));
        }
        $filter = ($curfilter) ? $this->CurrentFilter : "";
        if (is_array($where)) {
            $where = $this->arrayToFilter($where);
        }
        AddFilter($filter, $where);
        if ($filter != "") {
            $queryBuilder->where($filter);
        }
        return $queryBuilder;
    }

    // Update
    public function update(&$rs, $where = "", $rsold = null, $curfilter = true)
    {
        // If no field is updated, execute may return 0. Treat as success
        $success = $this->updateSql($rs, $where, $curfilter)->execute();
        $success = ($success > 0) ? $success : true;
        return $success;
    }

    /**
     * DELETE statement
     *
     * @param array $rs Key values
     * @param string|array $where WHERE clause
     * @param string $curfilter Filter
     * @return QueryBuilder
     */
    protected function deleteSql(&$rs, $where = "", $curfilter = true)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->delete($this->UpdateTable);
        if (is_array($where)) {
            $where = $this->arrayToFilter($where);
        }
        if ($rs) {
            if (array_key_exists('id', $rs)) {
                AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
            }
        }
        $filter = ($curfilter) ? $this->CurrentFilter : "";
        AddFilter($filter, $where);
        return $queryBuilder->where($filter != "" ? $filter : "0=1");
    }

    // Delete
    public function delete(&$rs, $where = "", $curfilter = false)
    {
        $success = true;
        if ($success) {
            $success = $this->deleteSql($rs, $where, $curfilter)->execute();
        }
        return $success;
    }

    // Load DbValue from recordset or array
    protected function loadDbValues($row)
    {
        if (!is_array($row)) {
            return;
        }
        $this->id->DbValue = $row['id'];
        $this->RIDNO->DbValue = $row['RIDNO'];
        $this->Name->DbValue = $row['Name'];
        $this->Age->DbValue = $row['Age'];
        $this->treatment_status->DbValue = $row['treatment_status'];
        $this->ARTCYCLE->DbValue = $row['ARTCYCLE'];
        $this->RESULT->DbValue = $row['RESULT'];
        $this->status->DbValue = $row['status'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->outcomeDate->DbValue = $row['outcomeDate'];
        $this->outcomeDay->DbValue = $row['outcomeDay'];
        $this->OPResult->DbValue = $row['OPResult'];
        $this->Gestation->DbValue = $row['Gestation'];
        $this->TransferdEmbryos->DbValue = $row['TransferdEmbryos'];
        $this->InitalOfSacs->DbValue = $row['InitalOfSacs'];
        $this->ImplimentationRate->DbValue = $row['ImplimentationRate'];
        $this->EmbryoNo->DbValue = $row['EmbryoNo'];
        $this->ExtrauterineSac->DbValue = $row['ExtrauterineSac'];
        $this->PregnancyMonozygotic->DbValue = $row['PregnancyMonozygotic'];
        $this->TypeGestation->DbValue = $row['TypeGestation'];
        $this->Urine->DbValue = $row['Urine'];
        $this->PTdate->DbValue = $row['PTdate'];
        $this->Reduced->DbValue = $row['Reduced'];
        $this->INduced->DbValue = $row['INduced'];
        $this->INducedDate->DbValue = $row['INducedDate'];
        $this->Miscarriage->DbValue = $row['Miscarriage'];
        $this->Induced1->DbValue = $row['Induced1'];
        $this->Type->DbValue = $row['Type'];
        $this->IfClinical->DbValue = $row['IfClinical'];
        $this->GADate->DbValue = $row['GADate'];
        $this->GA->DbValue = $row['GA'];
        $this->FoetalDeath->DbValue = $row['FoetalDeath'];
        $this->FerinatalDeath->DbValue = $row['FerinatalDeath'];
        $this->TidNo->DbValue = $row['TidNo'];
        $this->Ectopic->DbValue = $row['Ectopic'];
        $this->Extra->DbValue = $row['Extra'];
        $this->Implantation->DbValue = $row['Implantation'];
        $this->DeliveryDate->DbValue = $row['DeliveryDate'];
        $this->BabyDetails->DbValue = $row['BabyDetails'];
        $this->LSCSNormal->DbValue = $row['LSCSNormal'];
        $this->Notes->DbValue = $row['Notes'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "`id` = @id@";
    }

    // Get Key
    public function getKey($current = false)
    {
        $keys = [];
        $val = $current ? $this->id->CurrentValue : $this->id->OldValue;
        if (EmptyValue($val)) {
            return "";
        } else {
            $keys[] = $val;
        }
        return implode(Config("COMPOSITE_KEY_SEPARATOR"), $keys);
    }

    // Set Key
    public function setKey($key, $current = false)
    {
        $this->OldKey = strval($key);
        $keys = explode(Config("COMPOSITE_KEY_SEPARATOR"), $this->OldKey);
        if (count($keys) == 1) {
            if ($current) {
                $this->id->CurrentValue = $keys[0];
            } else {
                $this->id->OldValue = $keys[0];
            }
        }
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
        if (is_array($row)) {
            $val = array_key_exists('id', $row) ? $row['id'] : null;
        } else {
            $val = $this->id->OldValue !== null ? $this->id->OldValue : $this->id->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
        }
        return $keyFilter;
    }

    // Return page URL
    public function getReturnUrl()
    {
        $referUrl = ReferUrl();
        $referPageName = ReferPageName();
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if ($referUrl != "" && $referPageName != CurrentPageName() && $referPageName != "login") { // Referer not same page or login page
            $_SESSION[$name] = $referUrl; // Save to Session
        }
        return $_SESSION[$name] ?? GetUrl("IvfOutcomeList");
    }

    // Set return page URL
    public function setReturnUrl($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
    }

    // Get modal caption
    public function getModalCaption($pageName)
    {
        global $Language;
        if ($pageName == "IvfOutcomeView") {
            return $Language->phrase("View");
        } elseif ($pageName == "IvfOutcomeEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "IvfOutcomeAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // API page name
    public function getApiPageName($action)
    {
        switch (strtolower($action)) {
            case Config("API_VIEW_ACTION"):
                return "IvfOutcomeView";
            case Config("API_ADD_ACTION"):
                return "IvfOutcomeAdd";
            case Config("API_EDIT_ACTION"):
                return "IvfOutcomeEdit";
            case Config("API_DELETE_ACTION"):
                return "IvfOutcomeDelete";
            case Config("API_LIST_ACTION"):
                return "IvfOutcomeList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "IvfOutcomeList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("IvfOutcomeView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("IvfOutcomeView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "IvfOutcomeAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "IvfOutcomeAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("IvfOutcomeEdit", $this->getUrlParm($parm));
        return $this->addMasterUrl($url);
    }

    // Inline edit URL
    public function getInlineEditUrl()
    {
        $url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
        return $this->addMasterUrl($url);
    }

    // Copy URL
    public function getCopyUrl($parm = "")
    {
        $url = $this->keyUrl("IvfOutcomeAdd", $this->getUrlParm($parm));
        return $this->addMasterUrl($url);
    }

    // Inline copy URL
    public function getInlineCopyUrl()
    {
        $url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
        return $this->addMasterUrl($url);
    }

    // Delete URL
    public function getDeleteUrl()
    {
        return $this->keyUrl("IvfOutcomeDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        if ($this->getCurrentMasterTable() == "ivf_treatment_plan" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk_RIDNO", $this->RIDNO->CurrentValue ?? $this->RIDNO->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_Name", $this->Name->CurrentValue ?? $this->Name->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_id", $this->TidNo->CurrentValue ?? $this->TidNo->getSessionValue());
        }
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json .= "id:" . JsonEncode($this->id->CurrentValue, "number");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
        if ($this->id->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->id->CurrentValue);
        } else {
            return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
        }
        if ($parm != "") {
            $url .= "?" . $parm;
        }
        return $url;
    }

    // Render sort
    public function renderSort($fld)
    {
        $classId = $fld->TableVar . "_" . $fld->Param;
        $scriptId = str_replace("%id%", $classId, "tpc_%id%");
        $scriptStart = $this->UseCustomTemplate ? "<template id=\"" . $scriptId . "\">" : "";
        $scriptEnd = $this->UseCustomTemplate ? "</template>" : "";
        $jsSort = " class=\"ew-pointer\" onclick=\"ew.sort(event, '" . $this->sortUrl($fld) . "', 1);\"";
        if ($this->sortUrl($fld) == "") {
            $html = <<<NOSORTHTML
{$scriptStart}<div class="ew-table-header-caption">{$fld->caption()}</div>{$scriptEnd}
NOSORTHTML;
        } else {
            if ($fld->getSort() == "ASC") {
                $sortIcon = '<i class="fas fa-sort-up"></i>';
            } elseif ($fld->getSort() == "DESC") {
                $sortIcon = '<i class="fas fa-sort-down"></i>';
            } else {
                $sortIcon = '';
            }
            $html = <<<SORTHTML
{$scriptStart}<div{$jsSort}><div class="ew-table-header-btn"><span class="ew-table-header-caption">{$fld->caption()}</span><span class="ew-table-header-sort">{$sortIcon}</span></div></div>{$scriptEnd}
SORTHTML;
        }
        return $html;
    }

    // Sort URL
    public function sortUrl($fld)
    {
        if (
            $this->CurrentAction || $this->isExport() ||
            in_array($fld->Type, [128, 204, 205])
        ) { // Unsortable data type
                return "";
        } elseif ($fld->Sortable) {
            $urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->getNextSort());
            return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
        } else {
            return "";
        }
    }

    // Get record keys from Post/Get/Session
    public function getRecordKeys()
    {
        $arKeys = [];
        $arKey = [];
        if (Param("key_m") !== null) {
            $arKeys = Param("key_m");
            $cnt = count($arKeys);
        } else {
            if (($keyValue = Param("id") ?? Route("id")) !== null) {
                $arKeys[] = $keyValue;
            } elseif (IsApi() && (($keyValue = Key(0) ?? Route(2)) !== null)) {
                $arKeys[] = $keyValue;
            } else {
                $arKeys = null; // Do not setup
            }

            //return $arKeys; // Do not return yet, so the values will also be checked by the following code
        }
        // Check keys
        $ar = [];
        if (is_array($arKeys)) {
            foreach ($arKeys as $key) {
                if (!is_numeric($key)) {
                    continue;
                }
                $ar[] = $key;
            }
        }
        return $ar;
    }

    // Get filter from record keys
    public function getFilterFromRecordKeys($setCurrent = true)
    {
        $arKeys = $this->getRecordKeys();
        $keyFilter = "";
        foreach ($arKeys as $key) {
            if ($keyFilter != "") {
                $keyFilter .= " OR ";
            }
            if ($setCurrent) {
                $this->id->CurrentValue = $key;
            } else {
                $this->id->OldValue = $key;
            }
            $keyFilter .= "(" . $this->getRecordFilter() . ")";
        }
        return $keyFilter;
    }

    // Load recordset based on filter
    public function &loadRs($filter)
    {
        $sql = $this->getSql($filter); // Set up filter (WHERE Clause)
        $conn = $this->getConnection();
        $stmt = $conn->executeQuery($sql);
        return $stmt;
    }

    // Load row values from record
    public function loadListRowValues(&$rs)
    {
        if (is_array($rs)) {
            $row = $rs;
        } elseif ($rs && property_exists($rs, "fields")) { // Recordset
            $row = $rs->fields;
        } else {
            return;
        }
        $this->id->setDbValue($row['id']);
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->Name->setDbValue($row['Name']);
        $this->Age->setDbValue($row['Age']);
        $this->treatment_status->setDbValue($row['treatment_status']);
        $this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
        $this->RESULT->setDbValue($row['RESULT']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->outcomeDate->setDbValue($row['outcomeDate']);
        $this->outcomeDay->setDbValue($row['outcomeDay']);
        $this->OPResult->setDbValue($row['OPResult']);
        $this->Gestation->setDbValue($row['Gestation']);
        $this->TransferdEmbryos->setDbValue($row['TransferdEmbryos']);
        $this->InitalOfSacs->setDbValue($row['InitalOfSacs']);
        $this->ImplimentationRate->setDbValue($row['ImplimentationRate']);
        $this->EmbryoNo->setDbValue($row['EmbryoNo']);
        $this->ExtrauterineSac->setDbValue($row['ExtrauterineSac']);
        $this->PregnancyMonozygotic->setDbValue($row['PregnancyMonozygotic']);
        $this->TypeGestation->setDbValue($row['TypeGestation']);
        $this->Urine->setDbValue($row['Urine']);
        $this->PTdate->setDbValue($row['PTdate']);
        $this->Reduced->setDbValue($row['Reduced']);
        $this->INduced->setDbValue($row['INduced']);
        $this->INducedDate->setDbValue($row['INducedDate']);
        $this->Miscarriage->setDbValue($row['Miscarriage']);
        $this->Induced1->setDbValue($row['Induced1']);
        $this->Type->setDbValue($row['Type']);
        $this->IfClinical->setDbValue($row['IfClinical']);
        $this->GADate->setDbValue($row['GADate']);
        $this->GA->setDbValue($row['GA']);
        $this->FoetalDeath->setDbValue($row['FoetalDeath']);
        $this->FerinatalDeath->setDbValue($row['FerinatalDeath']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->Ectopic->setDbValue($row['Ectopic']);
        $this->Extra->setDbValue($row['Extra']);
        $this->Implantation->setDbValue($row['Implantation']);
        $this->DeliveryDate->setDbValue($row['DeliveryDate']);
        $this->BabyDetails->setDbValue($row['BabyDetails']);
        $this->LSCSNormal->setDbValue($row['LSCSNormal']);
        $this->Notes->setDbValue($row['Notes']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // RIDNO

        // Name

        // Age

        // treatment_status

        // ARTCYCLE

        // RESULT

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // outcomeDate

        // outcomeDay

        // OPResult

        // Gestation

        // TransferdEmbryos

        // InitalOfSacs

        // ImplimentationRate

        // EmbryoNo

        // ExtrauterineSac

        // PregnancyMonozygotic

        // TypeGestation

        // Urine

        // PTdate

        // Reduced

        // INduced

        // INducedDate

        // Miscarriage

        // Induced1

        // Type

        // IfClinical

        // GADate

        // GA

        // FoetalDeath

        // FerinatalDeath

        // TidNo

        // Ectopic

        // Extra

        // Implantation

        // DeliveryDate

        // BabyDetails

        // LSCSNormal

        // Notes

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // RIDNO
        $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
        $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
        $this->RIDNO->ViewCustomAttributes = "";

        // Name
        $this->Name->ViewValue = $this->Name->CurrentValue;
        $this->Name->ViewCustomAttributes = "";

        // Age
        $this->Age->ViewValue = $this->Age->CurrentValue;
        $this->Age->ViewCustomAttributes = "";

        // treatment_status
        $this->treatment_status->ViewValue = $this->treatment_status->CurrentValue;
        $this->treatment_status->ViewCustomAttributes = "";

        // ARTCYCLE
        $this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
        $this->ARTCYCLE->ViewCustomAttributes = "";

        // RESULT
        $this->RESULT->ViewValue = $this->RESULT->CurrentValue;
        $this->RESULT->ViewCustomAttributes = "";

        // status
        $this->status->ViewValue = $this->status->CurrentValue;
        $this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
        $this->status->ViewCustomAttributes = "";

        // createdby
        $this->createdby->ViewValue = $this->createdby->CurrentValue;
        $this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
        $this->createdby->ViewCustomAttributes = "";

        // createddatetime
        $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
        $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
        $this->createddatetime->ViewCustomAttributes = "";

        // modifiedby
        $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
        $this->modifiedby->ViewCustomAttributes = "";

        // modifieddatetime
        $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
        $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
        $this->modifieddatetime->ViewCustomAttributes = "";

        // outcomeDate
        $this->outcomeDate->ViewValue = $this->outcomeDate->CurrentValue;
        $this->outcomeDate->ViewValue = FormatDateTime($this->outcomeDate->ViewValue, 0);
        $this->outcomeDate->ViewCustomAttributes = "";

        // outcomeDay
        $this->outcomeDay->ViewValue = $this->outcomeDay->CurrentValue;
        $this->outcomeDay->ViewValue = FormatDateTime($this->outcomeDay->ViewValue, 0);
        $this->outcomeDay->ViewCustomAttributes = "";

        // OPResult
        $this->OPResult->ViewValue = $this->OPResult->CurrentValue;
        $this->OPResult->ViewCustomAttributes = "";

        // Gestation
        if (strval($this->Gestation->CurrentValue) != "") {
            $this->Gestation->ViewValue = $this->Gestation->optionCaption($this->Gestation->CurrentValue);
        } else {
            $this->Gestation->ViewValue = null;
        }
        $this->Gestation->ViewCustomAttributes = "";

        // TransferdEmbryos
        $this->TransferdEmbryos->ViewValue = $this->TransferdEmbryos->CurrentValue;
        $this->TransferdEmbryos->ViewCustomAttributes = "";

        // InitalOfSacs
        $this->InitalOfSacs->ViewValue = $this->InitalOfSacs->CurrentValue;
        $this->InitalOfSacs->ViewCustomAttributes = "";

        // ImplimentationRate
        $this->ImplimentationRate->ViewValue = $this->ImplimentationRate->CurrentValue;
        $this->ImplimentationRate->ViewCustomAttributes = "";

        // EmbryoNo
        $this->EmbryoNo->ViewValue = $this->EmbryoNo->CurrentValue;
        $this->EmbryoNo->ViewCustomAttributes = "";

        // ExtrauterineSac
        $this->ExtrauterineSac->ViewValue = $this->ExtrauterineSac->CurrentValue;
        $this->ExtrauterineSac->ViewCustomAttributes = "";

        // PregnancyMonozygotic
        $this->PregnancyMonozygotic->ViewValue = $this->PregnancyMonozygotic->CurrentValue;
        $this->PregnancyMonozygotic->ViewCustomAttributes = "";

        // TypeGestation
        $this->TypeGestation->ViewValue = $this->TypeGestation->CurrentValue;
        $this->TypeGestation->ViewCustomAttributes = "";

        // Urine
        if (strval($this->Urine->CurrentValue) != "") {
            $this->Urine->ViewValue = $this->Urine->optionCaption($this->Urine->CurrentValue);
        } else {
            $this->Urine->ViewValue = null;
        }
        $this->Urine->ViewCustomAttributes = "";

        // PTdate
        $this->PTdate->ViewValue = $this->PTdate->CurrentValue;
        $this->PTdate->ViewCustomAttributes = "";

        // Reduced
        $this->Reduced->ViewValue = $this->Reduced->CurrentValue;
        $this->Reduced->ViewCustomAttributes = "";

        // INduced
        $this->INduced->ViewValue = $this->INduced->CurrentValue;
        $this->INduced->ViewCustomAttributes = "";

        // INducedDate
        $this->INducedDate->ViewValue = $this->INducedDate->CurrentValue;
        $this->INducedDate->ViewCustomAttributes = "";

        // Miscarriage
        if (strval($this->Miscarriage->CurrentValue) != "") {
            $this->Miscarriage->ViewValue = $this->Miscarriage->optionCaption($this->Miscarriage->CurrentValue);
        } else {
            $this->Miscarriage->ViewValue = null;
        }
        $this->Miscarriage->ViewCustomAttributes = "";

        // Induced1
        if (strval($this->Induced1->CurrentValue) != "") {
            $this->Induced1->ViewValue = $this->Induced1->optionCaption($this->Induced1->CurrentValue);
        } else {
            $this->Induced1->ViewValue = null;
        }
        $this->Induced1->ViewCustomAttributes = "";

        // Type
        if (strval($this->Type->CurrentValue) != "") {
            $this->Type->ViewValue = $this->Type->optionCaption($this->Type->CurrentValue);
        } else {
            $this->Type->ViewValue = null;
        }
        $this->Type->ViewCustomAttributes = "";

        // IfClinical
        $this->IfClinical->ViewValue = $this->IfClinical->CurrentValue;
        $this->IfClinical->ViewCustomAttributes = "";

        // GADate
        $this->GADate->ViewValue = $this->GADate->CurrentValue;
        $this->GADate->ViewCustomAttributes = "";

        // GA
        $this->GA->ViewValue = $this->GA->CurrentValue;
        $this->GA->ViewCustomAttributes = "";

        // FoetalDeath
        if (strval($this->FoetalDeath->CurrentValue) != "") {
            $this->FoetalDeath->ViewValue = $this->FoetalDeath->optionCaption($this->FoetalDeath->CurrentValue);
        } else {
            $this->FoetalDeath->ViewValue = null;
        }
        $this->FoetalDeath->ViewCustomAttributes = "";

        // FerinatalDeath
        if (strval($this->FerinatalDeath->CurrentValue) != "") {
            $this->FerinatalDeath->ViewValue = $this->FerinatalDeath->optionCaption($this->FerinatalDeath->CurrentValue);
        } else {
            $this->FerinatalDeath->ViewValue = null;
        }
        $this->FerinatalDeath->ViewCustomAttributes = "";

        // TidNo
        $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
        $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
        $this->TidNo->ViewCustomAttributes = "";

        // Ectopic
        if (strval($this->Ectopic->CurrentValue) != "") {
            $this->Ectopic->ViewValue = $this->Ectopic->optionCaption($this->Ectopic->CurrentValue);
        } else {
            $this->Ectopic->ViewValue = null;
        }
        $this->Ectopic->ViewCustomAttributes = "";

        // Extra
        if (strval($this->Extra->CurrentValue) != "") {
            $this->Extra->ViewValue = $this->Extra->optionCaption($this->Extra->CurrentValue);
        } else {
            $this->Extra->ViewValue = null;
        }
        $this->Extra->ViewCustomAttributes = "";

        // Implantation
        $this->Implantation->ViewValue = $this->Implantation->CurrentValue;
        $this->Implantation->ViewCustomAttributes = "";

        // DeliveryDate
        $this->DeliveryDate->ViewValue = $this->DeliveryDate->CurrentValue;
        $this->DeliveryDate->ViewValue = FormatDateTime($this->DeliveryDate->ViewValue, 7);
        $this->DeliveryDate->ViewCustomAttributes = "";

        // BabyDetails
        $this->BabyDetails->ViewValue = $this->BabyDetails->CurrentValue;
        $this->BabyDetails->ViewCustomAttributes = "";

        // LSCSNormal
        $this->LSCSNormal->ViewValue = $this->LSCSNormal->CurrentValue;
        $this->LSCSNormal->ViewCustomAttributes = "";

        // Notes
        $this->Notes->ViewValue = $this->Notes->CurrentValue;
        $this->Notes->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // RIDNO
        $this->RIDNO->LinkCustomAttributes = "";
        $this->RIDNO->HrefValue = "";
        $this->RIDNO->TooltipValue = "";

        // Name
        $this->Name->LinkCustomAttributes = "";
        $this->Name->HrefValue = "";
        $this->Name->TooltipValue = "";

        // Age
        $this->Age->LinkCustomAttributes = "";
        $this->Age->HrefValue = "";
        $this->Age->TooltipValue = "";

        // treatment_status
        $this->treatment_status->LinkCustomAttributes = "";
        $this->treatment_status->HrefValue = "";
        $this->treatment_status->TooltipValue = "";

        // ARTCYCLE
        $this->ARTCYCLE->LinkCustomAttributes = "";
        $this->ARTCYCLE->HrefValue = "";
        $this->ARTCYCLE->TooltipValue = "";

        // RESULT
        $this->RESULT->LinkCustomAttributes = "";
        $this->RESULT->HrefValue = "";
        $this->RESULT->TooltipValue = "";

        // status
        $this->status->LinkCustomAttributes = "";
        $this->status->HrefValue = "";
        $this->status->TooltipValue = "";

        // createdby
        $this->createdby->LinkCustomAttributes = "";
        $this->createdby->HrefValue = "";
        $this->createdby->TooltipValue = "";

        // createddatetime
        $this->createddatetime->LinkCustomAttributes = "";
        $this->createddatetime->HrefValue = "";
        $this->createddatetime->TooltipValue = "";

        // modifiedby
        $this->modifiedby->LinkCustomAttributes = "";
        $this->modifiedby->HrefValue = "";
        $this->modifiedby->TooltipValue = "";

        // modifieddatetime
        $this->modifieddatetime->LinkCustomAttributes = "";
        $this->modifieddatetime->HrefValue = "";
        $this->modifieddatetime->TooltipValue = "";

        // outcomeDate
        $this->outcomeDate->LinkCustomAttributes = "";
        $this->outcomeDate->HrefValue = "";
        $this->outcomeDate->TooltipValue = "";

        // outcomeDay
        $this->outcomeDay->LinkCustomAttributes = "";
        $this->outcomeDay->HrefValue = "";
        $this->outcomeDay->TooltipValue = "";

        // OPResult
        $this->OPResult->LinkCustomAttributes = "";
        $this->OPResult->HrefValue = "";
        $this->OPResult->TooltipValue = "";

        // Gestation
        $this->Gestation->LinkCustomAttributes = "";
        $this->Gestation->HrefValue = "";
        $this->Gestation->TooltipValue = "";

        // TransferdEmbryos
        $this->TransferdEmbryos->LinkCustomAttributes = "";
        $this->TransferdEmbryos->HrefValue = "";
        $this->TransferdEmbryos->TooltipValue = "";

        // InitalOfSacs
        $this->InitalOfSacs->LinkCustomAttributes = "";
        $this->InitalOfSacs->HrefValue = "";
        $this->InitalOfSacs->TooltipValue = "";

        // ImplimentationRate
        $this->ImplimentationRate->LinkCustomAttributes = "";
        $this->ImplimentationRate->HrefValue = "";
        $this->ImplimentationRate->TooltipValue = "";

        // EmbryoNo
        $this->EmbryoNo->LinkCustomAttributes = "";
        $this->EmbryoNo->HrefValue = "";
        $this->EmbryoNo->TooltipValue = "";

        // ExtrauterineSac
        $this->ExtrauterineSac->LinkCustomAttributes = "";
        $this->ExtrauterineSac->HrefValue = "";
        $this->ExtrauterineSac->TooltipValue = "";

        // PregnancyMonozygotic
        $this->PregnancyMonozygotic->LinkCustomAttributes = "";
        $this->PregnancyMonozygotic->HrefValue = "";
        $this->PregnancyMonozygotic->TooltipValue = "";

        // TypeGestation
        $this->TypeGestation->LinkCustomAttributes = "";
        $this->TypeGestation->HrefValue = "";
        $this->TypeGestation->TooltipValue = "";

        // Urine
        $this->Urine->LinkCustomAttributes = "";
        $this->Urine->HrefValue = "";
        $this->Urine->TooltipValue = "";

        // PTdate
        $this->PTdate->LinkCustomAttributes = "";
        $this->PTdate->HrefValue = "";
        $this->PTdate->TooltipValue = "";

        // Reduced
        $this->Reduced->LinkCustomAttributes = "";
        $this->Reduced->HrefValue = "";
        $this->Reduced->TooltipValue = "";

        // INduced
        $this->INduced->LinkCustomAttributes = "";
        $this->INduced->HrefValue = "";
        $this->INduced->TooltipValue = "";

        // INducedDate
        $this->INducedDate->LinkCustomAttributes = "";
        $this->INducedDate->HrefValue = "";
        $this->INducedDate->TooltipValue = "";

        // Miscarriage
        $this->Miscarriage->LinkCustomAttributes = "";
        $this->Miscarriage->HrefValue = "";
        $this->Miscarriage->TooltipValue = "";

        // Induced1
        $this->Induced1->LinkCustomAttributes = "";
        $this->Induced1->HrefValue = "";
        $this->Induced1->TooltipValue = "";

        // Type
        $this->Type->LinkCustomAttributes = "";
        $this->Type->HrefValue = "";
        $this->Type->TooltipValue = "";

        // IfClinical
        $this->IfClinical->LinkCustomAttributes = "";
        $this->IfClinical->HrefValue = "";
        $this->IfClinical->TooltipValue = "";

        // GADate
        $this->GADate->LinkCustomAttributes = "";
        $this->GADate->HrefValue = "";
        $this->GADate->TooltipValue = "";

        // GA
        $this->GA->LinkCustomAttributes = "";
        $this->GA->HrefValue = "";
        $this->GA->TooltipValue = "";

        // FoetalDeath
        $this->FoetalDeath->LinkCustomAttributes = "";
        $this->FoetalDeath->HrefValue = "";
        $this->FoetalDeath->TooltipValue = "";

        // FerinatalDeath
        $this->FerinatalDeath->LinkCustomAttributes = "";
        $this->FerinatalDeath->HrefValue = "";
        $this->FerinatalDeath->TooltipValue = "";

        // TidNo
        $this->TidNo->LinkCustomAttributes = "";
        $this->TidNo->HrefValue = "";
        $this->TidNo->TooltipValue = "";

        // Ectopic
        $this->Ectopic->LinkCustomAttributes = "";
        $this->Ectopic->HrefValue = "";
        $this->Ectopic->TooltipValue = "";

        // Extra
        $this->Extra->LinkCustomAttributes = "";
        $this->Extra->HrefValue = "";
        $this->Extra->TooltipValue = "";

        // Implantation
        $this->Implantation->LinkCustomAttributes = "";
        $this->Implantation->HrefValue = "";
        $this->Implantation->TooltipValue = "";

        // DeliveryDate
        $this->DeliveryDate->LinkCustomAttributes = "";
        $this->DeliveryDate->HrefValue = "";
        $this->DeliveryDate->TooltipValue = "";

        // BabyDetails
        $this->BabyDetails->LinkCustomAttributes = "";
        $this->BabyDetails->HrefValue = "";
        $this->BabyDetails->TooltipValue = "";

        // LSCSNormal
        $this->LSCSNormal->LinkCustomAttributes = "";
        $this->LSCSNormal->HrefValue = "";
        $this->LSCSNormal->TooltipValue = "";

        // Notes
        $this->Notes->LinkCustomAttributes = "";
        $this->Notes->HrefValue = "";
        $this->Notes->TooltipValue = "";

        // Call Row Rendered event
        $this->rowRendered();

        // Save data for Custom Template
        $this->Rows[] = $this->customTemplateFieldValues();
    }

    // Render edit row values
    public function renderEditRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // id
        $this->id->EditAttrs["class"] = "form-control";
        $this->id->EditCustomAttributes = "";
        $this->id->EditValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // RIDNO
        $this->RIDNO->EditAttrs["class"] = "form-control";
        $this->RIDNO->EditCustomAttributes = "";
        if ($this->RIDNO->getSessionValue() != "") {
            $this->RIDNO->CurrentValue = GetForeignKeyValue($this->RIDNO->getSessionValue());
            $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
            $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
            $this->RIDNO->ViewCustomAttributes = "";
        } else {
            $this->RIDNO->EditValue = $this->RIDNO->CurrentValue;
            $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());
        }

        // Name
        $this->Name->EditAttrs["class"] = "form-control";
        $this->Name->EditCustomAttributes = "";
        if ($this->Name->getSessionValue() != "") {
            $this->Name->CurrentValue = GetForeignKeyValue($this->Name->getSessionValue());
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";
        } else {
            if (!$this->Name->Raw) {
                $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
            }
            $this->Name->EditValue = $this->Name->CurrentValue;
            $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
        }

        // Age
        $this->Age->EditAttrs["class"] = "form-control";
        $this->Age->EditCustomAttributes = "";
        if (!$this->Age->Raw) {
            $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
        }
        $this->Age->EditValue = $this->Age->CurrentValue;
        $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

        // treatment_status
        $this->treatment_status->EditAttrs["class"] = "form-control";
        $this->treatment_status->EditCustomAttributes = "";
        if (!$this->treatment_status->Raw) {
            $this->treatment_status->CurrentValue = HtmlDecode($this->treatment_status->CurrentValue);
        }
        $this->treatment_status->EditValue = $this->treatment_status->CurrentValue;
        $this->treatment_status->PlaceHolder = RemoveHtml($this->treatment_status->caption());

        // ARTCYCLE
        $this->ARTCYCLE->EditAttrs["class"] = "form-control";
        $this->ARTCYCLE->EditCustomAttributes = "";
        if (!$this->ARTCYCLE->Raw) {
            $this->ARTCYCLE->CurrentValue = HtmlDecode($this->ARTCYCLE->CurrentValue);
        }
        $this->ARTCYCLE->EditValue = $this->ARTCYCLE->CurrentValue;
        $this->ARTCYCLE->PlaceHolder = RemoveHtml($this->ARTCYCLE->caption());

        // RESULT
        $this->RESULT->EditAttrs["class"] = "form-control";
        $this->RESULT->EditCustomAttributes = "";
        if (!$this->RESULT->Raw) {
            $this->RESULT->CurrentValue = HtmlDecode($this->RESULT->CurrentValue);
        }
        $this->RESULT->EditValue = $this->RESULT->CurrentValue;
        $this->RESULT->PlaceHolder = RemoveHtml($this->RESULT->caption());

        // status
        $this->status->EditAttrs["class"] = "form-control";
        $this->status->EditCustomAttributes = "";
        $this->status->EditValue = $this->status->CurrentValue;
        $this->status->PlaceHolder = RemoveHtml($this->status->caption());

        // createdby
        $this->createdby->EditAttrs["class"] = "form-control";
        $this->createdby->EditCustomAttributes = "";
        $this->createdby->EditValue = $this->createdby->CurrentValue;
        $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

        // createddatetime
        $this->createddatetime->EditAttrs["class"] = "form-control";
        $this->createddatetime->EditCustomAttributes = "";
        $this->createddatetime->EditValue = FormatDateTime($this->createddatetime->CurrentValue, 8);
        $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

        // modifiedby
        $this->modifiedby->EditAttrs["class"] = "form-control";
        $this->modifiedby->EditCustomAttributes = "";
        $this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

        // modifieddatetime
        $this->modifieddatetime->EditAttrs["class"] = "form-control";
        $this->modifieddatetime->EditCustomAttributes = "";
        $this->modifieddatetime->EditValue = FormatDateTime($this->modifieddatetime->CurrentValue, 8);
        $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

        // outcomeDate
        $this->outcomeDate->EditAttrs["class"] = "form-control";
        $this->outcomeDate->EditCustomAttributes = "";
        $this->outcomeDate->EditValue = FormatDateTime($this->outcomeDate->CurrentValue, 8);
        $this->outcomeDate->PlaceHolder = RemoveHtml($this->outcomeDate->caption());

        // outcomeDay
        $this->outcomeDay->EditAttrs["class"] = "form-control";
        $this->outcomeDay->EditCustomAttributes = "";
        $this->outcomeDay->EditValue = FormatDateTime($this->outcomeDay->CurrentValue, 8);
        $this->outcomeDay->PlaceHolder = RemoveHtml($this->outcomeDay->caption());

        // OPResult
        $this->OPResult->EditAttrs["class"] = "form-control";
        $this->OPResult->EditCustomAttributes = "";
        if (!$this->OPResult->Raw) {
            $this->OPResult->CurrentValue = HtmlDecode($this->OPResult->CurrentValue);
        }
        $this->OPResult->EditValue = $this->OPResult->CurrentValue;
        $this->OPResult->PlaceHolder = RemoveHtml($this->OPResult->caption());

        // Gestation
        $this->Gestation->EditCustomAttributes = "";
        $this->Gestation->EditValue = $this->Gestation->options(false);
        $this->Gestation->PlaceHolder = RemoveHtml($this->Gestation->caption());

        // TransferdEmbryos
        $this->TransferdEmbryos->EditAttrs["class"] = "form-control";
        $this->TransferdEmbryos->EditCustomAttributes = "";
        if (!$this->TransferdEmbryos->Raw) {
            $this->TransferdEmbryos->CurrentValue = HtmlDecode($this->TransferdEmbryos->CurrentValue);
        }
        $this->TransferdEmbryos->EditValue = $this->TransferdEmbryos->CurrentValue;
        $this->TransferdEmbryos->PlaceHolder = RemoveHtml($this->TransferdEmbryos->caption());

        // InitalOfSacs
        $this->InitalOfSacs->EditAttrs["class"] = "form-control";
        $this->InitalOfSacs->EditCustomAttributes = "";
        if (!$this->InitalOfSacs->Raw) {
            $this->InitalOfSacs->CurrentValue = HtmlDecode($this->InitalOfSacs->CurrentValue);
        }
        $this->InitalOfSacs->EditValue = $this->InitalOfSacs->CurrentValue;
        $this->InitalOfSacs->PlaceHolder = RemoveHtml($this->InitalOfSacs->caption());

        // ImplimentationRate
        $this->ImplimentationRate->EditAttrs["class"] = "form-control";
        $this->ImplimentationRate->EditCustomAttributes = "";
        if (!$this->ImplimentationRate->Raw) {
            $this->ImplimentationRate->CurrentValue = HtmlDecode($this->ImplimentationRate->CurrentValue);
        }
        $this->ImplimentationRate->EditValue = $this->ImplimentationRate->CurrentValue;
        $this->ImplimentationRate->PlaceHolder = RemoveHtml($this->ImplimentationRate->caption());

        // EmbryoNo
        $this->EmbryoNo->EditAttrs["class"] = "form-control";
        $this->EmbryoNo->EditCustomAttributes = "";
        if (!$this->EmbryoNo->Raw) {
            $this->EmbryoNo->CurrentValue = HtmlDecode($this->EmbryoNo->CurrentValue);
        }
        $this->EmbryoNo->EditValue = $this->EmbryoNo->CurrentValue;
        $this->EmbryoNo->PlaceHolder = RemoveHtml($this->EmbryoNo->caption());

        // ExtrauterineSac
        $this->ExtrauterineSac->EditAttrs["class"] = "form-control";
        $this->ExtrauterineSac->EditCustomAttributes = "";
        if (!$this->ExtrauterineSac->Raw) {
            $this->ExtrauterineSac->CurrentValue = HtmlDecode($this->ExtrauterineSac->CurrentValue);
        }
        $this->ExtrauterineSac->EditValue = $this->ExtrauterineSac->CurrentValue;
        $this->ExtrauterineSac->PlaceHolder = RemoveHtml($this->ExtrauterineSac->caption());

        // PregnancyMonozygotic
        $this->PregnancyMonozygotic->EditAttrs["class"] = "form-control";
        $this->PregnancyMonozygotic->EditCustomAttributes = "";
        if (!$this->PregnancyMonozygotic->Raw) {
            $this->PregnancyMonozygotic->CurrentValue = HtmlDecode($this->PregnancyMonozygotic->CurrentValue);
        }
        $this->PregnancyMonozygotic->EditValue = $this->PregnancyMonozygotic->CurrentValue;
        $this->PregnancyMonozygotic->PlaceHolder = RemoveHtml($this->PregnancyMonozygotic->caption());

        // TypeGestation
        $this->TypeGestation->EditAttrs["class"] = "form-control";
        $this->TypeGestation->EditCustomAttributes = "";
        if (!$this->TypeGestation->Raw) {
            $this->TypeGestation->CurrentValue = HtmlDecode($this->TypeGestation->CurrentValue);
        }
        $this->TypeGestation->EditValue = $this->TypeGestation->CurrentValue;
        $this->TypeGestation->PlaceHolder = RemoveHtml($this->TypeGestation->caption());

        // Urine
        $this->Urine->EditAttrs["class"] = "form-control";
        $this->Urine->EditCustomAttributes = "";
        $this->Urine->EditValue = $this->Urine->options(true);
        $this->Urine->PlaceHolder = RemoveHtml($this->Urine->caption());

        // PTdate
        $this->PTdate->EditAttrs["class"] = "form-control";
        $this->PTdate->EditCustomAttributes = "";
        if (!$this->PTdate->Raw) {
            $this->PTdate->CurrentValue = HtmlDecode($this->PTdate->CurrentValue);
        }
        $this->PTdate->EditValue = $this->PTdate->CurrentValue;
        $this->PTdate->PlaceHolder = RemoveHtml($this->PTdate->caption());

        // Reduced
        $this->Reduced->EditAttrs["class"] = "form-control";
        $this->Reduced->EditCustomAttributes = "";
        if (!$this->Reduced->Raw) {
            $this->Reduced->CurrentValue = HtmlDecode($this->Reduced->CurrentValue);
        }
        $this->Reduced->EditValue = $this->Reduced->CurrentValue;
        $this->Reduced->PlaceHolder = RemoveHtml($this->Reduced->caption());

        // INduced
        $this->INduced->EditAttrs["class"] = "form-control";
        $this->INduced->EditCustomAttributes = "";
        if (!$this->INduced->Raw) {
            $this->INduced->CurrentValue = HtmlDecode($this->INduced->CurrentValue);
        }
        $this->INduced->EditValue = $this->INduced->CurrentValue;
        $this->INduced->PlaceHolder = RemoveHtml($this->INduced->caption());

        // INducedDate
        $this->INducedDate->EditAttrs["class"] = "form-control";
        $this->INducedDate->EditCustomAttributes = "";
        if (!$this->INducedDate->Raw) {
            $this->INducedDate->CurrentValue = HtmlDecode($this->INducedDate->CurrentValue);
        }
        $this->INducedDate->EditValue = $this->INducedDate->CurrentValue;
        $this->INducedDate->PlaceHolder = RemoveHtml($this->INducedDate->caption());

        // Miscarriage
        $this->Miscarriage->EditCustomAttributes = "";
        $this->Miscarriage->EditValue = $this->Miscarriage->options(false);
        $this->Miscarriage->PlaceHolder = RemoveHtml($this->Miscarriage->caption());

        // Induced1
        $this->Induced1->EditCustomAttributes = "";
        $this->Induced1->EditValue = $this->Induced1->options(false);
        $this->Induced1->PlaceHolder = RemoveHtml($this->Induced1->caption());

        // Type
        $this->Type->EditCustomAttributes = "";
        $this->Type->EditValue = $this->Type->options(false);
        $this->Type->PlaceHolder = RemoveHtml($this->Type->caption());

        // IfClinical
        $this->IfClinical->EditAttrs["class"] = "form-control";
        $this->IfClinical->EditCustomAttributes = "";
        if (!$this->IfClinical->Raw) {
            $this->IfClinical->CurrentValue = HtmlDecode($this->IfClinical->CurrentValue);
        }
        $this->IfClinical->EditValue = $this->IfClinical->CurrentValue;
        $this->IfClinical->PlaceHolder = RemoveHtml($this->IfClinical->caption());

        // GADate
        $this->GADate->EditAttrs["class"] = "form-control";
        $this->GADate->EditCustomAttributes = "";
        if (!$this->GADate->Raw) {
            $this->GADate->CurrentValue = HtmlDecode($this->GADate->CurrentValue);
        }
        $this->GADate->EditValue = $this->GADate->CurrentValue;
        $this->GADate->PlaceHolder = RemoveHtml($this->GADate->caption());

        // GA
        $this->GA->EditAttrs["class"] = "form-control";
        $this->GA->EditCustomAttributes = "";
        if (!$this->GA->Raw) {
            $this->GA->CurrentValue = HtmlDecode($this->GA->CurrentValue);
        }
        $this->GA->EditValue = $this->GA->CurrentValue;
        $this->GA->PlaceHolder = RemoveHtml($this->GA->caption());

        // FoetalDeath
        $this->FoetalDeath->EditAttrs["class"] = "form-control";
        $this->FoetalDeath->EditCustomAttributes = "";
        $this->FoetalDeath->EditValue = $this->FoetalDeath->options(true);
        $this->FoetalDeath->PlaceHolder = RemoveHtml($this->FoetalDeath->caption());

        // FerinatalDeath
        $this->FerinatalDeath->EditAttrs["class"] = "form-control";
        $this->FerinatalDeath->EditCustomAttributes = "";
        $this->FerinatalDeath->EditValue = $this->FerinatalDeath->options(true);
        $this->FerinatalDeath->PlaceHolder = RemoveHtml($this->FerinatalDeath->caption());

        // TidNo
        $this->TidNo->EditAttrs["class"] = "form-control";
        $this->TidNo->EditCustomAttributes = "";
        if ($this->TidNo->getSessionValue() != "") {
            $this->TidNo->CurrentValue = GetForeignKeyValue($this->TidNo->getSessionValue());
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";
        } else {
            $this->TidNo->EditValue = $this->TidNo->CurrentValue;
            $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());
        }

        // Ectopic
        $this->Ectopic->EditCustomAttributes = "";
        $this->Ectopic->EditValue = $this->Ectopic->options(false);
        $this->Ectopic->PlaceHolder = RemoveHtml($this->Ectopic->caption());

        // Extra
        $this->Extra->EditCustomAttributes = "";
        $this->Extra->EditValue = $this->Extra->options(false);
        $this->Extra->PlaceHolder = RemoveHtml($this->Extra->caption());

        // Implantation
        $this->Implantation->EditAttrs["class"] = "form-control";
        $this->Implantation->EditCustomAttributes = "";
        if (!$this->Implantation->Raw) {
            $this->Implantation->CurrentValue = HtmlDecode($this->Implantation->CurrentValue);
        }
        $this->Implantation->EditValue = $this->Implantation->CurrentValue;
        $this->Implantation->PlaceHolder = RemoveHtml($this->Implantation->caption());

        // DeliveryDate
        $this->DeliveryDate->EditAttrs["class"] = "form-control";
        $this->DeliveryDate->EditCustomAttributes = "";
        $this->DeliveryDate->EditValue = FormatDateTime($this->DeliveryDate->CurrentValue, 7);
        $this->DeliveryDate->PlaceHolder = RemoveHtml($this->DeliveryDate->caption());

        // BabyDetails
        $this->BabyDetails->EditAttrs["class"] = "form-control";
        $this->BabyDetails->EditCustomAttributes = "";
        if (!$this->BabyDetails->Raw) {
            $this->BabyDetails->CurrentValue = HtmlDecode($this->BabyDetails->CurrentValue);
        }
        $this->BabyDetails->EditValue = $this->BabyDetails->CurrentValue;
        $this->BabyDetails->PlaceHolder = RemoveHtml($this->BabyDetails->caption());

        // LSCSNormal
        $this->LSCSNormal->EditAttrs["class"] = "form-control";
        $this->LSCSNormal->EditCustomAttributes = "";
        if (!$this->LSCSNormal->Raw) {
            $this->LSCSNormal->CurrentValue = HtmlDecode($this->LSCSNormal->CurrentValue);
        }
        $this->LSCSNormal->EditValue = $this->LSCSNormal->CurrentValue;
        $this->LSCSNormal->PlaceHolder = RemoveHtml($this->LSCSNormal->caption());

        // Notes
        $this->Notes->EditAttrs["class"] = "form-control";
        $this->Notes->EditCustomAttributes = "";
        $this->Notes->EditValue = $this->Notes->CurrentValue;
        $this->Notes->PlaceHolder = RemoveHtml($this->Notes->caption());

        // Call Row Rendered event
        $this->rowRendered();
    }

    // Aggregate list row values
    public function aggregateListRowValues()
    {
    }

    // Aggregate list row (for rendering)
    public function aggregateListRow()
    {
        // Call Row Rendered event
        $this->rowRendered();
    }

    // Export data in HTML/CSV/Word/Excel/Email/PDF format
    public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
    {
        if (!$recordset || !$doc) {
            return;
        }
        if (!$doc->ExportCustom) {
            // Write header
            $doc->exportTableHeader();
            if ($doc->Horizontal) { // Horizontal format, write header
                $doc->beginExportRow();
                if ($exportPageType == "view") {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->RIDNO);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->treatment_status);
                    $doc->exportCaption($this->ARTCYCLE);
                    $doc->exportCaption($this->RESULT);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->outcomeDate);
                    $doc->exportCaption($this->outcomeDay);
                    $doc->exportCaption($this->OPResult);
                    $doc->exportCaption($this->Gestation);
                    $doc->exportCaption($this->TransferdEmbryos);
                    $doc->exportCaption($this->InitalOfSacs);
                    $doc->exportCaption($this->ImplimentationRate);
                    $doc->exportCaption($this->EmbryoNo);
                    $doc->exportCaption($this->ExtrauterineSac);
                    $doc->exportCaption($this->PregnancyMonozygotic);
                    $doc->exportCaption($this->TypeGestation);
                    $doc->exportCaption($this->Urine);
                    $doc->exportCaption($this->PTdate);
                    $doc->exportCaption($this->Reduced);
                    $doc->exportCaption($this->INduced);
                    $doc->exportCaption($this->INducedDate);
                    $doc->exportCaption($this->Miscarriage);
                    $doc->exportCaption($this->Induced1);
                    $doc->exportCaption($this->Type);
                    $doc->exportCaption($this->IfClinical);
                    $doc->exportCaption($this->GADate);
                    $doc->exportCaption($this->GA);
                    $doc->exportCaption($this->FoetalDeath);
                    $doc->exportCaption($this->FerinatalDeath);
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->Ectopic);
                    $doc->exportCaption($this->Extra);
                    $doc->exportCaption($this->Implantation);
                    $doc->exportCaption($this->DeliveryDate);
                    $doc->exportCaption($this->BabyDetails);
                    $doc->exportCaption($this->LSCSNormal);
                    $doc->exportCaption($this->Notes);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->RIDNO);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->treatment_status);
                    $doc->exportCaption($this->ARTCYCLE);
                    $doc->exportCaption($this->RESULT);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->outcomeDate);
                    $doc->exportCaption($this->outcomeDay);
                    $doc->exportCaption($this->OPResult);
                    $doc->exportCaption($this->Gestation);
                    $doc->exportCaption($this->TransferdEmbryos);
                    $doc->exportCaption($this->InitalOfSacs);
                    $doc->exportCaption($this->ImplimentationRate);
                    $doc->exportCaption($this->EmbryoNo);
                    $doc->exportCaption($this->ExtrauterineSac);
                    $doc->exportCaption($this->PregnancyMonozygotic);
                    $doc->exportCaption($this->TypeGestation);
                    $doc->exportCaption($this->Urine);
                    $doc->exportCaption($this->PTdate);
                    $doc->exportCaption($this->Reduced);
                    $doc->exportCaption($this->INduced);
                    $doc->exportCaption($this->INducedDate);
                    $doc->exportCaption($this->Miscarriage);
                    $doc->exportCaption($this->Induced1);
                    $doc->exportCaption($this->Type);
                    $doc->exportCaption($this->IfClinical);
                    $doc->exportCaption($this->GADate);
                    $doc->exportCaption($this->GA);
                    $doc->exportCaption($this->FoetalDeath);
                    $doc->exportCaption($this->FerinatalDeath);
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->Ectopic);
                    $doc->exportCaption($this->Extra);
                    $doc->exportCaption($this->Implantation);
                    $doc->exportCaption($this->DeliveryDate);
                }
                $doc->endExportRow();
            }
        }

        // Move to first record
        $recCnt = $startRec - 1;
        $stopRec = ($stopRec > 0) ? $stopRec : PHP_INT_MAX;
        while (!$recordset->EOF && $recCnt < $stopRec) {
            $row = $recordset->fields;
            $recCnt++;
            if ($recCnt >= $startRec) {
                $rowCnt = $recCnt - $startRec + 1;

                // Page break
                if ($this->ExportPageBreakCount > 0) {
                    if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0) {
                        $doc->exportPageBreak();
                    }
                }
                $this->loadListRowValues($row);

                // Render row
                $this->RowType = ROWTYPE_VIEW; // Render view
                $this->resetAttributes();
                $this->renderListRow();
                if (!$doc->ExportCustom) {
                    $doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
                    if ($exportPageType == "view") {
                        $doc->exportField($this->id);
                        $doc->exportField($this->RIDNO);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->treatment_status);
                        $doc->exportField($this->ARTCYCLE);
                        $doc->exportField($this->RESULT);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->outcomeDate);
                        $doc->exportField($this->outcomeDay);
                        $doc->exportField($this->OPResult);
                        $doc->exportField($this->Gestation);
                        $doc->exportField($this->TransferdEmbryos);
                        $doc->exportField($this->InitalOfSacs);
                        $doc->exportField($this->ImplimentationRate);
                        $doc->exportField($this->EmbryoNo);
                        $doc->exportField($this->ExtrauterineSac);
                        $doc->exportField($this->PregnancyMonozygotic);
                        $doc->exportField($this->TypeGestation);
                        $doc->exportField($this->Urine);
                        $doc->exportField($this->PTdate);
                        $doc->exportField($this->Reduced);
                        $doc->exportField($this->INduced);
                        $doc->exportField($this->INducedDate);
                        $doc->exportField($this->Miscarriage);
                        $doc->exportField($this->Induced1);
                        $doc->exportField($this->Type);
                        $doc->exportField($this->IfClinical);
                        $doc->exportField($this->GADate);
                        $doc->exportField($this->GA);
                        $doc->exportField($this->FoetalDeath);
                        $doc->exportField($this->FerinatalDeath);
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->Ectopic);
                        $doc->exportField($this->Extra);
                        $doc->exportField($this->Implantation);
                        $doc->exportField($this->DeliveryDate);
                        $doc->exportField($this->BabyDetails);
                        $doc->exportField($this->LSCSNormal);
                        $doc->exportField($this->Notes);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->RIDNO);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->treatment_status);
                        $doc->exportField($this->ARTCYCLE);
                        $doc->exportField($this->RESULT);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->outcomeDate);
                        $doc->exportField($this->outcomeDay);
                        $doc->exportField($this->OPResult);
                        $doc->exportField($this->Gestation);
                        $doc->exportField($this->TransferdEmbryos);
                        $doc->exportField($this->InitalOfSacs);
                        $doc->exportField($this->ImplimentationRate);
                        $doc->exportField($this->EmbryoNo);
                        $doc->exportField($this->ExtrauterineSac);
                        $doc->exportField($this->PregnancyMonozygotic);
                        $doc->exportField($this->TypeGestation);
                        $doc->exportField($this->Urine);
                        $doc->exportField($this->PTdate);
                        $doc->exportField($this->Reduced);
                        $doc->exportField($this->INduced);
                        $doc->exportField($this->INducedDate);
                        $doc->exportField($this->Miscarriage);
                        $doc->exportField($this->Induced1);
                        $doc->exportField($this->Type);
                        $doc->exportField($this->IfClinical);
                        $doc->exportField($this->GADate);
                        $doc->exportField($this->GA);
                        $doc->exportField($this->FoetalDeath);
                        $doc->exportField($this->FerinatalDeath);
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->Ectopic);
                        $doc->exportField($this->Extra);
                        $doc->exportField($this->Implantation);
                        $doc->exportField($this->DeliveryDate);
                    }
                    $doc->endExportRow($rowCnt);
                }
            }

            // Call Row Export server event
            if ($doc->ExportCustom) {
                $this->rowExport($row);
            }
            $recordset->moveNext();
        }
        if (!$doc->ExportCustom) {
            $doc->exportTableFooter();
        }
    }

    // Get file data
    public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0, $plugins = [])
    {
        // No binary fields
        return false;
    }

    // Table level events

    // Recordset Selecting event
    public function recordsetSelecting(&$filter)
    {
        // Enter your code here
    }

    // Recordset Selected event
    public function recordsetSelected(&$rs)
    {
        //Log("Recordset Selected");
    }

    // Recordset Search Validated event
    public function recordsetSearchValidated()
    {
        // Example:
        //$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value
    }

    // Recordset Searching event
    public function recordsetSearching(&$filter)
    {
        // Enter your code here
    }

    // Row_Selecting event
    public function rowSelecting(&$filter)
    {
        // Enter your code here
    }

    // Row Selected event
    public function rowSelected(&$rs)
    {
        //Log("Row Selected");
    }

    // Row Inserting event
    public function rowInserting($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
    }

    // Row Inserted event
    public function rowInserted($rsold, &$rsnew) {
    	//echo "Row Inserted"
    	$Urine = $rsnew["Urine"];
    	$Miscarriage = $rsnew["Miscarriage"];
    	$INduced = $rsnew["INduced"];
    	$Gestation = $rsnew["Gestation"];
    	$TidNo = $rsnew["TidNo"];
    	$dbhelper = &DbHelper();
    	if($Urine == 'Negative' || $Miscarriage == 'Yes' || $INduced == 'Yes' || $Gestation == 'No')
    	{
    		$sql = "UPDATE `ganeshkumar_bjhims`.`ivf_treatment_plan` SET `treatment_status`='Finalized' WHERE `id`='".$TidNo."';";
    		$results = $dbhelper->ExecuteRows($sql);
    	}else{
    		$sql = "UPDATE `ganeshkumar_bjhims`.`ivf_treatment_plan` SET `treatment_status`='On Going' WHERE `id`='".$TidNo."';";
    		$results = $dbhelper->ExecuteRows($sql);
    	}
    }

    // Row Updating event
    public function rowUpdating($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
    }

    // Row Updated event
    public function rowUpdated($rsold, &$rsnew) {
    	//echo "Row Updated";
    		$Urine = $rsnew["Urine"];
    	$Miscarriage = $rsnew["Miscarriage"];
    	$INduced = $rsnew["INduced"];
    	$Gestation = $rsnew["Gestation"];
    	$TidNo = $rsold["TidNo"];
    	$dbhelper = &DbHelper();
    	if($Urine == 'Negative' || $Miscarriage == 'Yes' || $INduced == 'Yes' || $Gestation == 'No')
    	{
    		$sql = "UPDATE `ganeshkumar_bjhims`.`ivf_treatment_plan` SET `treatment_status`='Finalized' WHERE `id`='".$TidNo."';";
    		$results = $dbhelper->ExecuteRows($sql);
    	}else{
    		$sql = "UPDATE `ganeshkumar_bjhims`.`ivf_treatment_plan` SET `treatment_status`='On Going' WHERE `id`='".$TidNo."';";
    		$results = $dbhelper->ExecuteRows($sql);
    	}
    }

    // Row Update Conflict event
    public function rowUpdateConflict($rsold, &$rsnew)
    {
        // Enter your code here
        // To ignore conflict, set return value to false
        return true;
    }

    // Grid Inserting event
    public function gridInserting()
    {
        // Enter your code here
        // To reject grid insert, set return value to false
        return true;
    }

    // Grid Inserted event
    public function gridInserted($rsnew)
    {
        //Log("Grid Inserted");
    }

    // Grid Updating event
    public function gridUpdating($rsold)
    {
        // Enter your code here
        // To reject grid update, set return value to false
        return true;
    }

    // Grid Updated event
    public function gridUpdated($rsold, $rsnew)
    {
        //Log("Grid Updated");
    }

    // Row Deleting event
    public function rowDeleting(&$rs)
    {
        // Enter your code here
        // To cancel, set return value to False
        return true;
    }

    // Row Deleted event
    public function rowDeleted(&$rs)
    {
        //Log("Row Deleted");
    }

    // Email Sending event
    public function emailSending($email, &$args)
    {
        //var_dump($email); var_dump($args); exit();
        return true;
    }

    // Lookup Selecting event
    public function lookupSelecting($fld, &$filter)
    {
        //var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
        // Enter your code here
    }

    // Row Rendering event
    public function rowRendering()
    {
        // Enter your code here
    }

    // Row Rendered event
    public function rowRendered()
    {
        // To view properties of field class, use:
        //var_dump($this-><FieldName>);
    }

    // User ID Filtering event
    public function userIdFiltering(&$filter)
    {
        // Enter your code here
    }
}
