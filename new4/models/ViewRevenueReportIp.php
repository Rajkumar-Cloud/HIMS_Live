<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_revenue_report_ip
 */
class ViewRevenueReportIp extends DbTable
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
    public $DATE;
    public $BillNumber;
    public $PatientId;
    public $PatientName;
    public $RefferedBy;
    public $CASES;
    public $WARD;
    public $OT;
    public $IMPLANT;
    public $LAB;
    public $PHARMACY;
    public $OUTSIDEDRSVISITNAME;
    public $OUTSIDEDRSVISITNAMEAmount;
    public $PHYSIO;
    public $PHYSIOAmount;
    public $SURGEON;
    public $SURGEONAmount;
    public $ASSTSURGEON;
    public $ASSTSURGEONAmount;
    public $ANESTHETIST;
    public $ANESTHETISTAmount;
    public $_Others;
    public $OtherServices;
    public $Amount;
    public $ModeofPayment;
    public $Cash;
    public $Card;
    public $Remarks;
    public $DiscountRemarks;
    public $HospID;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_revenue_report_ip';
        $this->TableName = 'view_revenue_report_ip';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_revenue_report_ip`";
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

        // DATE
        $this->DATE = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_DATE', 'DATE', '`DATE`', CastDateFieldForLike("`DATE`", 0, "DB"), 133, 10, 0, false, '`DATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DATE->Sortable = true; // Allow sort
        $this->DATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->DATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DATE->Param, "CustomMsg");
        $this->Fields['DATE'] = &$this->DATE;

        // BillNumber
        $this->BillNumber = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_BillNumber', 'BillNumber', '`BillNumber`', '`BillNumber`', 200, 45, -1, false, '`BillNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillNumber->Sortable = true; // Allow sort
        $this->BillNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillNumber->Param, "CustomMsg");
        $this->Fields['BillNumber'] = &$this->BillNumber;

        // PatientId
        $this->PatientId = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, 45, -1, false, '`PatientId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientId->Sortable = true; // Allow sort
        $this->PatientId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientId->Param, "CustomMsg");
        $this->Fields['PatientId'] = &$this->PatientId;

        // PatientName
        $this->PatientName = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // RefferedBy
        $this->RefferedBy = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_RefferedBy', 'RefferedBy', '`RefferedBy`', '`RefferedBy`', 200, 45, -1, false, '`RefferedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RefferedBy->Sortable = true; // Allow sort
        $this->RefferedBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RefferedBy->Param, "CustomMsg");
        $this->Fields['RefferedBy'] = &$this->RefferedBy;

        // CASES
        $this->CASES = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_CASES', 'CASES', '`CASES`', '`CASES`', 131, 34, -1, false, '`CASES`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CASES->Sortable = true; // Allow sort
        $this->CASES->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->CASES->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->CASES->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CASES->Param, "CustomMsg");
        $this->Fields['CASES'] = &$this->CASES;

        // WARD
        $this->WARD = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_WARD', 'WARD', '`WARD`', '`WARD`', 131, 34, -1, false, '`WARD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WARD->Sortable = true; // Allow sort
        $this->WARD->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->WARD->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->WARD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->WARD->Param, "CustomMsg");
        $this->Fields['WARD'] = &$this->WARD;

        // OT
        $this->OT = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_OT', 'OT', '`OT`', '`OT`', 131, 34, -1, false, '`OT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OT->Sortable = true; // Allow sort
        $this->OT->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->OT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OT->Param, "CustomMsg");
        $this->Fields['OT'] = &$this->OT;

        // IMPLANT
        $this->IMPLANT = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_IMPLANT', 'IMPLANT', '`IMPLANT`', '`IMPLANT`', 131, 34, -1, false, '`IMPLANT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IMPLANT->Sortable = true; // Allow sort
        $this->IMPLANT->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IMPLANT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->IMPLANT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IMPLANT->Param, "CustomMsg");
        $this->Fields['IMPLANT'] = &$this->IMPLANT;

        // LAB
        $this->LAB = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_LAB', 'LAB', '`LAB`', '`LAB`', 131, 34, -1, false, '`LAB`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LAB->Sortable = true; // Allow sort
        $this->LAB->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->LAB->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->LAB->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LAB->Param, "CustomMsg");
        $this->Fields['LAB'] = &$this->LAB;

        // PHARMACY
        $this->PHARMACY = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_PHARMACY', 'PHARMACY', '`PHARMACY`', '`PHARMACY`', 131, 34, -1, false, '`PHARMACY`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PHARMACY->Sortable = true; // Allow sort
        $this->PHARMACY->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PHARMACY->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PHARMACY->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PHARMACY->Param, "CustomMsg");
        $this->Fields['PHARMACY'] = &$this->PHARMACY;

        // OUT SIDE DRS VISIT NAME
        $this->OUTSIDEDRSVISITNAME = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_OUTSIDEDRSVISITNAME', 'OUT SIDE DRS VISIT NAME', '`OUT SIDE DRS VISIT NAME`', '`OUT SIDE DRS VISIT NAME`', 201, 16777215, -1, false, '`OUT SIDE DRS VISIT NAME`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->OUTSIDEDRSVISITNAME->Sortable = true; // Allow sort
        $this->OUTSIDEDRSVISITNAME->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OUTSIDEDRSVISITNAME->Param, "CustomMsg");
        $this->Fields['OUT SIDE DRS VISIT NAME'] = &$this->OUTSIDEDRSVISITNAME;

        // OUT SIDE DRS VISIT NAME Amount
        $this->OUTSIDEDRSVISITNAMEAmount = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_OUTSIDEDRSVISITNAMEAmount', 'OUT SIDE DRS VISIT NAME Amount', '`OUT SIDE DRS VISIT NAME Amount`', '`OUT SIDE DRS VISIT NAME Amount`', 131, 34, -1, false, '`OUT SIDE DRS VISIT NAME Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OUTSIDEDRSVISITNAMEAmount->Sortable = true; // Allow sort
        $this->OUTSIDEDRSVISITNAMEAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OUTSIDEDRSVISITNAMEAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->OUTSIDEDRSVISITNAMEAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OUTSIDEDRSVISITNAMEAmount->Param, "CustomMsg");
        $this->Fields['OUT SIDE DRS VISIT NAME Amount'] = &$this->OUTSIDEDRSVISITNAMEAmount;

        // PHYSIO
        $this->PHYSIO = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_PHYSIO', 'PHYSIO', '`PHYSIO`', '`PHYSIO`', 201, 16777215, -1, false, '`PHYSIO`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->PHYSIO->Sortable = true; // Allow sort
        $this->PHYSIO->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PHYSIO->Param, "CustomMsg");
        $this->Fields['PHYSIO'] = &$this->PHYSIO;

        // PHYSIO Amount
        $this->PHYSIOAmount = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_PHYSIOAmount', 'PHYSIO Amount', '`PHYSIO Amount`', '`PHYSIO Amount`', 131, 34, -1, false, '`PHYSIO Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PHYSIOAmount->Sortable = true; // Allow sort
        $this->PHYSIOAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PHYSIOAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PHYSIOAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PHYSIOAmount->Param, "CustomMsg");
        $this->Fields['PHYSIO Amount'] = &$this->PHYSIOAmount;

        // SURGEON
        $this->SURGEON = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_SURGEON', 'SURGEON', '`SURGEON`', '`SURGEON`', 201, 16777215, -1, false, '`SURGEON`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->SURGEON->Sortable = true; // Allow sort
        $this->SURGEON->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SURGEON->Param, "CustomMsg");
        $this->Fields['SURGEON'] = &$this->SURGEON;

        // SURGEON Amount
        $this->SURGEONAmount = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_SURGEONAmount', 'SURGEON Amount', '`SURGEON Amount`', '`SURGEON Amount`', 131, 34, -1, false, '`SURGEON Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SURGEONAmount->Sortable = true; // Allow sort
        $this->SURGEONAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SURGEONAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->SURGEONAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SURGEONAmount->Param, "CustomMsg");
        $this->Fields['SURGEON Amount'] = &$this->SURGEONAmount;

        // ASST SURGEON
        $this->ASSTSURGEON = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_ASSTSURGEON', 'ASST SURGEON', '`ASST SURGEON`', '`ASST SURGEON`', 201, 16777215, -1, false, '`ASST SURGEON`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ASSTSURGEON->Sortable = true; // Allow sort
        $this->ASSTSURGEON->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ASSTSURGEON->Param, "CustomMsg");
        $this->Fields['ASST SURGEON'] = &$this->ASSTSURGEON;

        // ASST SURGEON Amount
        $this->ASSTSURGEONAmount = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_ASSTSURGEONAmount', 'ASST SURGEON Amount', '`ASST SURGEON Amount`', '`ASST SURGEON Amount`', 131, 34, -1, false, '`ASST SURGEON Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ASSTSURGEONAmount->Sortable = true; // Allow sort
        $this->ASSTSURGEONAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ASSTSURGEONAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->ASSTSURGEONAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ASSTSURGEONAmount->Param, "CustomMsg");
        $this->Fields['ASST SURGEON Amount'] = &$this->ASSTSURGEONAmount;

        // ANESTHETIST
        $this->ANESTHETIST = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_ANESTHETIST', 'ANESTHETIST', '`ANESTHETIST`', '`ANESTHETIST`', 201, 16777215, -1, false, '`ANESTHETIST`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ANESTHETIST->Sortable = true; // Allow sort
        $this->ANESTHETIST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ANESTHETIST->Param, "CustomMsg");
        $this->Fields['ANESTHETIST'] = &$this->ANESTHETIST;

        // ANESTHETIST Amount
        $this->ANESTHETISTAmount = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_ANESTHETISTAmount', 'ANESTHETIST Amount', '`ANESTHETIST Amount`', '`ANESTHETIST Amount`', 131, 34, -1, false, '`ANESTHETIST Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ANESTHETISTAmount->Sortable = true; // Allow sort
        $this->ANESTHETISTAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ANESTHETISTAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->ANESTHETISTAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ANESTHETISTAmount->Param, "CustomMsg");
        $this->Fields['ANESTHETIST Amount'] = &$this->ANESTHETISTAmount;

        // Others
        $this->_Others = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x__Others', 'Others', '`Others`', '`Others`', 131, 34, -1, false, '`Others`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_Others->Sortable = true; // Allow sort
        $this->_Others->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->_Others->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->_Others->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_Others->Param, "CustomMsg");
        $this->Fields['Others'] = &$this->_Others;

        // Other Services
        $this->OtherServices = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_OtherServices', 'Other Services', '`Other Services`', '`Other Services`', 201, 16777215, -1, false, '`Other Services`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->OtherServices->Sortable = true; // Allow sort
        $this->OtherServices->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OtherServices->Param, "CustomMsg");
        $this->Fields['Other Services'] = &$this->OtherServices;

        // Amount
        $this->Amount = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 131, 10, -1, false, '`Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Amount->Sortable = true; // Allow sort
        $this->Amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Amount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Amount->Param, "CustomMsg");
        $this->Fields['Amount'] = &$this->Amount;

        // ModeofPayment
        $this->ModeofPayment = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_ModeofPayment', 'ModeofPayment', '`ModeofPayment`', '`ModeofPayment`', 200, 45, -1, false, '`ModeofPayment`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ModeofPayment->Sortable = true; // Allow sort
        $this->ModeofPayment->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ModeofPayment->Param, "CustomMsg");
        $this->Fields['ModeofPayment'] = &$this->ModeofPayment;

        // Cash
        $this->Cash = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_Cash', 'Cash', '`Cash`', '`Cash`', 131, 10, -1, false, '`Cash`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Cash->Sortable = true; // Allow sort
        $this->Cash->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Cash->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Cash->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Cash->Param, "CustomMsg");
        $this->Fields['Cash'] = &$this->Cash;

        // Card
        $this->Card = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_Card', 'Card', '`Card`', '`Card`', 131, 10, -1, false, '`Card`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Card->Sortable = true; // Allow sort
        $this->Card->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Card->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Card->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Card->Param, "CustomMsg");
        $this->Fields['Card'] = &$this->Card;

        // Remarks
        $this->Remarks = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 201, 65535, -1, false, '`Remarks`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Remarks->Sortable = true; // Allow sort
        $this->Remarks->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Remarks->Param, "CustomMsg");
        $this->Fields['Remarks'] = &$this->Remarks;

        // DiscountRemarks
        $this->DiscountRemarks = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_DiscountRemarks', 'DiscountRemarks', '`DiscountRemarks`', '`DiscountRemarks`', 201, 450, -1, false, '`DiscountRemarks`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->DiscountRemarks->Sortable = true; // Allow sort
        $this->DiscountRemarks->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DiscountRemarks->Param, "CustomMsg");
        $this->Fields['DiscountRemarks'] = &$this->DiscountRemarks;

        // HospID
        $this->HospID = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;
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

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_revenue_report_ip`";
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
        $this->DefaultFilter = "`HospID`='".HospitalID()."'  ";
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
        $this->DATE->DbValue = $row['DATE'];
        $this->BillNumber->DbValue = $row['BillNumber'];
        $this->PatientId->DbValue = $row['PatientId'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->RefferedBy->DbValue = $row['RefferedBy'];
        $this->CASES->DbValue = $row['CASES'];
        $this->WARD->DbValue = $row['WARD'];
        $this->OT->DbValue = $row['OT'];
        $this->IMPLANT->DbValue = $row['IMPLANT'];
        $this->LAB->DbValue = $row['LAB'];
        $this->PHARMACY->DbValue = $row['PHARMACY'];
        $this->OUTSIDEDRSVISITNAME->DbValue = $row['OUT SIDE DRS VISIT NAME'];
        $this->OUTSIDEDRSVISITNAMEAmount->DbValue = $row['OUT SIDE DRS VISIT NAME Amount'];
        $this->PHYSIO->DbValue = $row['PHYSIO'];
        $this->PHYSIOAmount->DbValue = $row['PHYSIO Amount'];
        $this->SURGEON->DbValue = $row['SURGEON'];
        $this->SURGEONAmount->DbValue = $row['SURGEON Amount'];
        $this->ASSTSURGEON->DbValue = $row['ASST SURGEON'];
        $this->ASSTSURGEONAmount->DbValue = $row['ASST SURGEON Amount'];
        $this->ANESTHETIST->DbValue = $row['ANESTHETIST'];
        $this->ANESTHETISTAmount->DbValue = $row['ANESTHETIST Amount'];
        $this->_Others->DbValue = $row['Others'];
        $this->OtherServices->DbValue = $row['Other Services'];
        $this->Amount->DbValue = $row['Amount'];
        $this->ModeofPayment->DbValue = $row['ModeofPayment'];
        $this->Cash->DbValue = $row['Cash'];
        $this->Card->DbValue = $row['Card'];
        $this->Remarks->DbValue = $row['Remarks'];
        $this->DiscountRemarks->DbValue = $row['DiscountRemarks'];
        $this->HospID->DbValue = $row['HospID'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "";
    }

    // Get Key
    public function getKey($current = false)
    {
        $keys = [];
        return implode(Config("COMPOSITE_KEY_SEPARATOR"), $keys);
    }

    // Set Key
    public function setKey($key, $current = false)
    {
        $this->OldKey = strval($key);
        $keys = explode(Config("COMPOSITE_KEY_SEPARATOR"), $this->OldKey);
        if (count($keys) == 0) {
        }
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
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
        return $_SESSION[$name] ?? GetUrl("ViewRevenueReportIpList");
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
        if ($pageName == "ViewRevenueReportIpView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewRevenueReportIpEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewRevenueReportIpAdd") {
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
                return "ViewRevenueReportIpView";
            case Config("API_ADD_ACTION"):
                return "ViewRevenueReportIpAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewRevenueReportIpEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewRevenueReportIpDelete";
            case Config("API_LIST_ACTION"):
                return "ViewRevenueReportIpList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewRevenueReportIpList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewRevenueReportIpView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewRevenueReportIpView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewRevenueReportIpAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewRevenueReportIpAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewRevenueReportIpEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewRevenueReportIpAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewRevenueReportIpDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
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
            //return $arKeys; // Do not return yet, so the values will also be checked by the following code
        }
        // Check keys
        $ar = [];
        if (is_array($arKeys)) {
            foreach ($arKeys as $key) {
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
        $this->DATE->setDbValue($row['DATE']);
        $this->BillNumber->setDbValue($row['BillNumber']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->RefferedBy->setDbValue($row['RefferedBy']);
        $this->CASES->setDbValue($row['CASES']);
        $this->WARD->setDbValue($row['WARD']);
        $this->OT->setDbValue($row['OT']);
        $this->IMPLANT->setDbValue($row['IMPLANT']);
        $this->LAB->setDbValue($row['LAB']);
        $this->PHARMACY->setDbValue($row['PHARMACY']);
        $this->OUTSIDEDRSVISITNAME->setDbValue($row['OUT SIDE DRS VISIT NAME']);
        $this->OUTSIDEDRSVISITNAMEAmount->setDbValue($row['OUT SIDE DRS VISIT NAME Amount']);
        $this->PHYSIO->setDbValue($row['PHYSIO']);
        $this->PHYSIOAmount->setDbValue($row['PHYSIO Amount']);
        $this->SURGEON->setDbValue($row['SURGEON']);
        $this->SURGEONAmount->setDbValue($row['SURGEON Amount']);
        $this->ASSTSURGEON->setDbValue($row['ASST SURGEON']);
        $this->ASSTSURGEONAmount->setDbValue($row['ASST SURGEON Amount']);
        $this->ANESTHETIST->setDbValue($row['ANESTHETIST']);
        $this->ANESTHETISTAmount->setDbValue($row['ANESTHETIST Amount']);
        $this->_Others->setDbValue($row['Others']);
        $this->OtherServices->setDbValue($row['Other Services']);
        $this->Amount->setDbValue($row['Amount']);
        $this->ModeofPayment->setDbValue($row['ModeofPayment']);
        $this->Cash->setDbValue($row['Cash']);
        $this->Card->setDbValue($row['Card']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->DiscountRemarks->setDbValue($row['DiscountRemarks']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // DATE

        // BillNumber

        // PatientId

        // PatientName

        // RefferedBy

        // CASES

        // WARD

        // OT

        // IMPLANT

        // LAB

        // PHARMACY

        // OUT SIDE DRS VISIT NAME

        // OUT SIDE DRS VISIT NAME Amount

        // PHYSIO

        // PHYSIO Amount

        // SURGEON

        // SURGEON Amount

        // ASST SURGEON

        // ASST SURGEON Amount

        // ANESTHETIST

        // ANESTHETIST Amount

        // Others

        // Other Services

        // Amount

        // ModeofPayment

        // Cash

        // Card

        // Remarks

        // DiscountRemarks

        // HospID

        // DATE
        $this->DATE->ViewValue = $this->DATE->CurrentValue;
        $this->DATE->ViewValue = FormatDateTime($this->DATE->ViewValue, 0);
        $this->DATE->ViewCustomAttributes = "";

        // BillNumber
        $this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
        $this->BillNumber->ViewCustomAttributes = "";

        // PatientId
        $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
        $this->PatientId->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // RefferedBy
        $this->RefferedBy->ViewValue = $this->RefferedBy->CurrentValue;
        $this->RefferedBy->ViewCustomAttributes = "";

        // CASES
        $this->CASES->ViewValue = $this->CASES->CurrentValue;
        $this->CASES->ViewValue = FormatNumber($this->CASES->ViewValue, 2, -2, -2, -2);
        $this->CASES->ViewCustomAttributes = "";

        // WARD
        $this->WARD->ViewValue = $this->WARD->CurrentValue;
        $this->WARD->ViewValue = FormatNumber($this->WARD->ViewValue, 2, -2, -2, -2);
        $this->WARD->ViewCustomAttributes = "";

        // OT
        $this->OT->ViewValue = $this->OT->CurrentValue;
        $this->OT->ViewValue = FormatNumber($this->OT->ViewValue, 2, -2, -2, -2);
        $this->OT->ViewCustomAttributes = "";

        // IMPLANT
        $this->IMPLANT->ViewValue = $this->IMPLANT->CurrentValue;
        $this->IMPLANT->ViewValue = FormatNumber($this->IMPLANT->ViewValue, 2, -2, -2, -2);
        $this->IMPLANT->ViewCustomAttributes = "";

        // LAB
        $this->LAB->ViewValue = $this->LAB->CurrentValue;
        $this->LAB->ViewValue = FormatNumber($this->LAB->ViewValue, 2, -2, -2, -2);
        $this->LAB->ViewCustomAttributes = "";

        // PHARMACY
        $this->PHARMACY->ViewValue = $this->PHARMACY->CurrentValue;
        $this->PHARMACY->ViewValue = FormatNumber($this->PHARMACY->ViewValue, 2, -2, -2, -2);
        $this->PHARMACY->ViewCustomAttributes = "";

        // OUT SIDE DRS VISIT NAME
        $this->OUTSIDEDRSVISITNAME->ViewValue = $this->OUTSIDEDRSVISITNAME->CurrentValue;
        $this->OUTSIDEDRSVISITNAME->ViewCustomAttributes = "";

        // OUT SIDE DRS VISIT NAME Amount
        $this->OUTSIDEDRSVISITNAMEAmount->ViewValue = $this->OUTSIDEDRSVISITNAMEAmount->CurrentValue;
        $this->OUTSIDEDRSVISITNAMEAmount->ViewValue = FormatNumber($this->OUTSIDEDRSVISITNAMEAmount->ViewValue, 2, -2, -2, -2);
        $this->OUTSIDEDRSVISITNAMEAmount->ViewCustomAttributes = "";

        // PHYSIO
        $this->PHYSIO->ViewValue = $this->PHYSIO->CurrentValue;
        $this->PHYSIO->ViewCustomAttributes = "";

        // PHYSIO Amount
        $this->PHYSIOAmount->ViewValue = $this->PHYSIOAmount->CurrentValue;
        $this->PHYSIOAmount->ViewValue = FormatNumber($this->PHYSIOAmount->ViewValue, 2, -2, -2, -2);
        $this->PHYSIOAmount->ViewCustomAttributes = "";

        // SURGEON
        $this->SURGEON->ViewValue = $this->SURGEON->CurrentValue;
        $this->SURGEON->ViewCustomAttributes = "";

        // SURGEON Amount
        $this->SURGEONAmount->ViewValue = $this->SURGEONAmount->CurrentValue;
        $this->SURGEONAmount->ViewValue = FormatNumber($this->SURGEONAmount->ViewValue, 2, -2, -2, -2);
        $this->SURGEONAmount->ViewCustomAttributes = "";

        // ASST SURGEON
        $this->ASSTSURGEON->ViewValue = $this->ASSTSURGEON->CurrentValue;
        $this->ASSTSURGEON->ViewCustomAttributes = "";

        // ASST SURGEON Amount
        $this->ASSTSURGEONAmount->ViewValue = $this->ASSTSURGEONAmount->CurrentValue;
        $this->ASSTSURGEONAmount->ViewValue = FormatNumber($this->ASSTSURGEONAmount->ViewValue, 2, -2, -2, -2);
        $this->ASSTSURGEONAmount->ViewCustomAttributes = "";

        // ANESTHETIST
        $this->ANESTHETIST->ViewValue = $this->ANESTHETIST->CurrentValue;
        $this->ANESTHETIST->ViewCustomAttributes = "";

        // ANESTHETIST Amount
        $this->ANESTHETISTAmount->ViewValue = $this->ANESTHETISTAmount->CurrentValue;
        $this->ANESTHETISTAmount->ViewValue = FormatNumber($this->ANESTHETISTAmount->ViewValue, 2, -2, -2, -2);
        $this->ANESTHETISTAmount->ViewCustomAttributes = "";

        // Others
        $this->_Others->ViewValue = $this->_Others->CurrentValue;
        $this->_Others->ViewValue = FormatNumber($this->_Others->ViewValue, 2, -2, -2, -2);
        $this->_Others->ViewCustomAttributes = "";

        // Other Services
        $this->OtherServices->ViewValue = $this->OtherServices->CurrentValue;
        $this->OtherServices->ViewCustomAttributes = "";

        // Amount
        $this->Amount->ViewValue = $this->Amount->CurrentValue;
        $this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
        $this->Amount->ViewCustomAttributes = "";

        // ModeofPayment
        $this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
        $this->ModeofPayment->ViewCustomAttributes = "";

        // Cash
        $this->Cash->ViewValue = $this->Cash->CurrentValue;
        $this->Cash->ViewValue = FormatNumber($this->Cash->ViewValue, 2, -2, -2, -2);
        $this->Cash->ViewCustomAttributes = "";

        // Card
        $this->Card->ViewValue = $this->Card->CurrentValue;
        $this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
        $this->Card->ViewCustomAttributes = "";

        // Remarks
        $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
        $this->Remarks->ViewCustomAttributes = "";

        // DiscountRemarks
        $this->DiscountRemarks->ViewValue = $this->DiscountRemarks->CurrentValue;
        $this->DiscountRemarks->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // DATE
        $this->DATE->LinkCustomAttributes = "";
        $this->DATE->HrefValue = "";
        $this->DATE->TooltipValue = "";

        // BillNumber
        $this->BillNumber->LinkCustomAttributes = "";
        $this->BillNumber->HrefValue = "";
        $this->BillNumber->TooltipValue = "";

        // PatientId
        $this->PatientId->LinkCustomAttributes = "";
        $this->PatientId->HrefValue = "";
        $this->PatientId->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // RefferedBy
        $this->RefferedBy->LinkCustomAttributes = "";
        $this->RefferedBy->HrefValue = "";
        $this->RefferedBy->TooltipValue = "";

        // CASES
        $this->CASES->LinkCustomAttributes = "";
        $this->CASES->HrefValue = "";
        $this->CASES->TooltipValue = "";

        // WARD
        $this->WARD->LinkCustomAttributes = "";
        $this->WARD->HrefValue = "";
        $this->WARD->TooltipValue = "";

        // OT
        $this->OT->LinkCustomAttributes = "";
        $this->OT->HrefValue = "";
        $this->OT->TooltipValue = "";

        // IMPLANT
        $this->IMPLANT->LinkCustomAttributes = "";
        $this->IMPLANT->HrefValue = "";
        $this->IMPLANT->TooltipValue = "";

        // LAB
        $this->LAB->LinkCustomAttributes = "";
        $this->LAB->HrefValue = "";
        $this->LAB->TooltipValue = "";

        // PHARMACY
        $this->PHARMACY->LinkCustomAttributes = "";
        $this->PHARMACY->HrefValue = "";
        $this->PHARMACY->TooltipValue = "";

        // OUT SIDE DRS VISIT NAME
        $this->OUTSIDEDRSVISITNAME->LinkCustomAttributes = "";
        $this->OUTSIDEDRSVISITNAME->HrefValue = "";
        $this->OUTSIDEDRSVISITNAME->TooltipValue = "";

        // OUT SIDE DRS VISIT NAME Amount
        $this->OUTSIDEDRSVISITNAMEAmount->LinkCustomAttributes = "";
        $this->OUTSIDEDRSVISITNAMEAmount->HrefValue = "";
        $this->OUTSIDEDRSVISITNAMEAmount->TooltipValue = "";

        // PHYSIO
        $this->PHYSIO->LinkCustomAttributes = "";
        $this->PHYSIO->HrefValue = "";
        $this->PHYSIO->TooltipValue = "";

        // PHYSIO Amount
        $this->PHYSIOAmount->LinkCustomAttributes = "";
        $this->PHYSIOAmount->HrefValue = "";
        $this->PHYSIOAmount->TooltipValue = "";

        // SURGEON
        $this->SURGEON->LinkCustomAttributes = "";
        $this->SURGEON->HrefValue = "";
        $this->SURGEON->TooltipValue = "";

        // SURGEON Amount
        $this->SURGEONAmount->LinkCustomAttributes = "";
        $this->SURGEONAmount->HrefValue = "";
        $this->SURGEONAmount->TooltipValue = "";

        // ASST SURGEON
        $this->ASSTSURGEON->LinkCustomAttributes = "";
        $this->ASSTSURGEON->HrefValue = "";
        $this->ASSTSURGEON->TooltipValue = "";

        // ASST SURGEON Amount
        $this->ASSTSURGEONAmount->LinkCustomAttributes = "";
        $this->ASSTSURGEONAmount->HrefValue = "";
        $this->ASSTSURGEONAmount->TooltipValue = "";

        // ANESTHETIST
        $this->ANESTHETIST->LinkCustomAttributes = "";
        $this->ANESTHETIST->HrefValue = "";
        $this->ANESTHETIST->TooltipValue = "";

        // ANESTHETIST Amount
        $this->ANESTHETISTAmount->LinkCustomAttributes = "";
        $this->ANESTHETISTAmount->HrefValue = "";
        $this->ANESTHETISTAmount->TooltipValue = "";

        // Others
        $this->_Others->LinkCustomAttributes = "";
        $this->_Others->HrefValue = "";
        $this->_Others->TooltipValue = "";

        // Other Services
        $this->OtherServices->LinkCustomAttributes = "";
        $this->OtherServices->HrefValue = "";
        $this->OtherServices->TooltipValue = "";

        // Amount
        $this->Amount->LinkCustomAttributes = "";
        $this->Amount->HrefValue = "";
        $this->Amount->TooltipValue = "";

        // ModeofPayment
        $this->ModeofPayment->LinkCustomAttributes = "";
        $this->ModeofPayment->HrefValue = "";
        $this->ModeofPayment->TooltipValue = "";

        // Cash
        $this->Cash->LinkCustomAttributes = "";
        $this->Cash->HrefValue = "";
        $this->Cash->TooltipValue = "";

        // Card
        $this->Card->LinkCustomAttributes = "";
        $this->Card->HrefValue = "";
        $this->Card->TooltipValue = "";

        // Remarks
        $this->Remarks->LinkCustomAttributes = "";
        $this->Remarks->HrefValue = "";
        $this->Remarks->TooltipValue = "";

        // DiscountRemarks
        $this->DiscountRemarks->LinkCustomAttributes = "";
        $this->DiscountRemarks->HrefValue = "";
        $this->DiscountRemarks->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

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

        // DATE
        $this->DATE->EditAttrs["class"] = "form-control";
        $this->DATE->EditCustomAttributes = "";
        $this->DATE->EditValue = FormatDateTime($this->DATE->CurrentValue, 8);
        $this->DATE->PlaceHolder = RemoveHtml($this->DATE->caption());

        // BillNumber
        $this->BillNumber->EditAttrs["class"] = "form-control";
        $this->BillNumber->EditCustomAttributes = "";
        if (!$this->BillNumber->Raw) {
            $this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
        }
        $this->BillNumber->EditValue = $this->BillNumber->CurrentValue;
        $this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

        // PatientId
        $this->PatientId->EditAttrs["class"] = "form-control";
        $this->PatientId->EditCustomAttributes = "";
        if (!$this->PatientId->Raw) {
            $this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
        }
        $this->PatientId->EditValue = $this->PatientId->CurrentValue;
        $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        if (!$this->PatientName->Raw) {
            $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
        }
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

        // RefferedBy
        $this->RefferedBy->EditAttrs["class"] = "form-control";
        $this->RefferedBy->EditCustomAttributes = "";
        if (!$this->RefferedBy->Raw) {
            $this->RefferedBy->CurrentValue = HtmlDecode($this->RefferedBy->CurrentValue);
        }
        $this->RefferedBy->EditValue = $this->RefferedBy->CurrentValue;
        $this->RefferedBy->PlaceHolder = RemoveHtml($this->RefferedBy->caption());

        // CASES
        $this->CASES->EditAttrs["class"] = "form-control";
        $this->CASES->EditCustomAttributes = "";
        $this->CASES->EditValue = $this->CASES->CurrentValue;
        $this->CASES->PlaceHolder = RemoveHtml($this->CASES->caption());
        if (strval($this->CASES->EditValue) != "" && is_numeric($this->CASES->EditValue)) {
            $this->CASES->EditValue = FormatNumber($this->CASES->EditValue, -2, -2, -2, -2);
        }

        // WARD
        $this->WARD->EditAttrs["class"] = "form-control";
        $this->WARD->EditCustomAttributes = "";
        $this->WARD->EditValue = $this->WARD->CurrentValue;
        $this->WARD->PlaceHolder = RemoveHtml($this->WARD->caption());
        if (strval($this->WARD->EditValue) != "" && is_numeric($this->WARD->EditValue)) {
            $this->WARD->EditValue = FormatNumber($this->WARD->EditValue, -2, -2, -2, -2);
        }

        // OT
        $this->OT->EditAttrs["class"] = "form-control";
        $this->OT->EditCustomAttributes = "";
        $this->OT->EditValue = $this->OT->CurrentValue;
        $this->OT->PlaceHolder = RemoveHtml($this->OT->caption());
        if (strval($this->OT->EditValue) != "" && is_numeric($this->OT->EditValue)) {
            $this->OT->EditValue = FormatNumber($this->OT->EditValue, -2, -2, -2, -2);
        }

        // IMPLANT
        $this->IMPLANT->EditAttrs["class"] = "form-control";
        $this->IMPLANT->EditCustomAttributes = "";
        $this->IMPLANT->EditValue = $this->IMPLANT->CurrentValue;
        $this->IMPLANT->PlaceHolder = RemoveHtml($this->IMPLANT->caption());
        if (strval($this->IMPLANT->EditValue) != "" && is_numeric($this->IMPLANT->EditValue)) {
            $this->IMPLANT->EditValue = FormatNumber($this->IMPLANT->EditValue, -2, -2, -2, -2);
        }

        // LAB
        $this->LAB->EditAttrs["class"] = "form-control";
        $this->LAB->EditCustomAttributes = "";
        $this->LAB->EditValue = $this->LAB->CurrentValue;
        $this->LAB->PlaceHolder = RemoveHtml($this->LAB->caption());
        if (strval($this->LAB->EditValue) != "" && is_numeric($this->LAB->EditValue)) {
            $this->LAB->EditValue = FormatNumber($this->LAB->EditValue, -2, -2, -2, -2);
        }

        // PHARMACY
        $this->PHARMACY->EditAttrs["class"] = "form-control";
        $this->PHARMACY->EditCustomAttributes = "";
        $this->PHARMACY->EditValue = $this->PHARMACY->CurrentValue;
        $this->PHARMACY->PlaceHolder = RemoveHtml($this->PHARMACY->caption());
        if (strval($this->PHARMACY->EditValue) != "" && is_numeric($this->PHARMACY->EditValue)) {
            $this->PHARMACY->EditValue = FormatNumber($this->PHARMACY->EditValue, -2, -2, -2, -2);
        }

        // OUT SIDE DRS VISIT NAME
        $this->OUTSIDEDRSVISITNAME->EditAttrs["class"] = "form-control";
        $this->OUTSIDEDRSVISITNAME->EditCustomAttributes = "";
        $this->OUTSIDEDRSVISITNAME->EditValue = $this->OUTSIDEDRSVISITNAME->CurrentValue;
        $this->OUTSIDEDRSVISITNAME->PlaceHolder = RemoveHtml($this->OUTSIDEDRSVISITNAME->caption());

        // OUT SIDE DRS VISIT NAME Amount
        $this->OUTSIDEDRSVISITNAMEAmount->EditAttrs["class"] = "form-control";
        $this->OUTSIDEDRSVISITNAMEAmount->EditCustomAttributes = "";
        $this->OUTSIDEDRSVISITNAMEAmount->EditValue = $this->OUTSIDEDRSVISITNAMEAmount->CurrentValue;
        $this->OUTSIDEDRSVISITNAMEAmount->PlaceHolder = RemoveHtml($this->OUTSIDEDRSVISITNAMEAmount->caption());
        if (strval($this->OUTSIDEDRSVISITNAMEAmount->EditValue) != "" && is_numeric($this->OUTSIDEDRSVISITNAMEAmount->EditValue)) {
            $this->OUTSIDEDRSVISITNAMEAmount->EditValue = FormatNumber($this->OUTSIDEDRSVISITNAMEAmount->EditValue, -2, -2, -2, -2);
        }

        // PHYSIO
        $this->PHYSIO->EditAttrs["class"] = "form-control";
        $this->PHYSIO->EditCustomAttributes = "";
        $this->PHYSIO->EditValue = $this->PHYSIO->CurrentValue;
        $this->PHYSIO->PlaceHolder = RemoveHtml($this->PHYSIO->caption());

        // PHYSIO Amount
        $this->PHYSIOAmount->EditAttrs["class"] = "form-control";
        $this->PHYSIOAmount->EditCustomAttributes = "";
        $this->PHYSIOAmount->EditValue = $this->PHYSIOAmount->CurrentValue;
        $this->PHYSIOAmount->PlaceHolder = RemoveHtml($this->PHYSIOAmount->caption());
        if (strval($this->PHYSIOAmount->EditValue) != "" && is_numeric($this->PHYSIOAmount->EditValue)) {
            $this->PHYSIOAmount->EditValue = FormatNumber($this->PHYSIOAmount->EditValue, -2, -2, -2, -2);
        }

        // SURGEON
        $this->SURGEON->EditAttrs["class"] = "form-control";
        $this->SURGEON->EditCustomAttributes = "";
        $this->SURGEON->EditValue = $this->SURGEON->CurrentValue;
        $this->SURGEON->PlaceHolder = RemoveHtml($this->SURGEON->caption());

        // SURGEON Amount
        $this->SURGEONAmount->EditAttrs["class"] = "form-control";
        $this->SURGEONAmount->EditCustomAttributes = "";
        $this->SURGEONAmount->EditValue = $this->SURGEONAmount->CurrentValue;
        $this->SURGEONAmount->PlaceHolder = RemoveHtml($this->SURGEONAmount->caption());
        if (strval($this->SURGEONAmount->EditValue) != "" && is_numeric($this->SURGEONAmount->EditValue)) {
            $this->SURGEONAmount->EditValue = FormatNumber($this->SURGEONAmount->EditValue, -2, -2, -2, -2);
        }

        // ASST SURGEON
        $this->ASSTSURGEON->EditAttrs["class"] = "form-control";
        $this->ASSTSURGEON->EditCustomAttributes = "";
        $this->ASSTSURGEON->EditValue = $this->ASSTSURGEON->CurrentValue;
        $this->ASSTSURGEON->PlaceHolder = RemoveHtml($this->ASSTSURGEON->caption());

        // ASST SURGEON Amount
        $this->ASSTSURGEONAmount->EditAttrs["class"] = "form-control";
        $this->ASSTSURGEONAmount->EditCustomAttributes = "";
        $this->ASSTSURGEONAmount->EditValue = $this->ASSTSURGEONAmount->CurrentValue;
        $this->ASSTSURGEONAmount->PlaceHolder = RemoveHtml($this->ASSTSURGEONAmount->caption());
        if (strval($this->ASSTSURGEONAmount->EditValue) != "" && is_numeric($this->ASSTSURGEONAmount->EditValue)) {
            $this->ASSTSURGEONAmount->EditValue = FormatNumber($this->ASSTSURGEONAmount->EditValue, -2, -2, -2, -2);
        }

        // ANESTHETIST
        $this->ANESTHETIST->EditAttrs["class"] = "form-control";
        $this->ANESTHETIST->EditCustomAttributes = "";
        $this->ANESTHETIST->EditValue = $this->ANESTHETIST->CurrentValue;
        $this->ANESTHETIST->PlaceHolder = RemoveHtml($this->ANESTHETIST->caption());

        // ANESTHETIST Amount
        $this->ANESTHETISTAmount->EditAttrs["class"] = "form-control";
        $this->ANESTHETISTAmount->EditCustomAttributes = "";
        $this->ANESTHETISTAmount->EditValue = $this->ANESTHETISTAmount->CurrentValue;
        $this->ANESTHETISTAmount->PlaceHolder = RemoveHtml($this->ANESTHETISTAmount->caption());
        if (strval($this->ANESTHETISTAmount->EditValue) != "" && is_numeric($this->ANESTHETISTAmount->EditValue)) {
            $this->ANESTHETISTAmount->EditValue = FormatNumber($this->ANESTHETISTAmount->EditValue, -2, -2, -2, -2);
        }

        // Others
        $this->_Others->EditAttrs["class"] = "form-control";
        $this->_Others->EditCustomAttributes = "";
        $this->_Others->EditValue = $this->_Others->CurrentValue;
        $this->_Others->PlaceHolder = RemoveHtml($this->_Others->caption());
        if (strval($this->_Others->EditValue) != "" && is_numeric($this->_Others->EditValue)) {
            $this->_Others->EditValue = FormatNumber($this->_Others->EditValue, -2, -2, -2, -2);
        }

        // Other Services
        $this->OtherServices->EditAttrs["class"] = "form-control";
        $this->OtherServices->EditCustomAttributes = "";
        $this->OtherServices->EditValue = $this->OtherServices->CurrentValue;
        $this->OtherServices->PlaceHolder = RemoveHtml($this->OtherServices->caption());

        // Amount
        $this->Amount->EditAttrs["class"] = "form-control";
        $this->Amount->EditCustomAttributes = "";
        $this->Amount->EditValue = $this->Amount->CurrentValue;
        $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
        if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue)) {
            $this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
        }

        // ModeofPayment
        $this->ModeofPayment->EditAttrs["class"] = "form-control";
        $this->ModeofPayment->EditCustomAttributes = "";
        if (!$this->ModeofPayment->Raw) {
            $this->ModeofPayment->CurrentValue = HtmlDecode($this->ModeofPayment->CurrentValue);
        }
        $this->ModeofPayment->EditValue = $this->ModeofPayment->CurrentValue;
        $this->ModeofPayment->PlaceHolder = RemoveHtml($this->ModeofPayment->caption());

        // Cash
        $this->Cash->EditAttrs["class"] = "form-control";
        $this->Cash->EditCustomAttributes = "";
        $this->Cash->EditValue = $this->Cash->CurrentValue;
        $this->Cash->PlaceHolder = RemoveHtml($this->Cash->caption());
        if (strval($this->Cash->EditValue) != "" && is_numeric($this->Cash->EditValue)) {
            $this->Cash->EditValue = FormatNumber($this->Cash->EditValue, -2, -2, -2, -2);
        }

        // Card
        $this->Card->EditAttrs["class"] = "form-control";
        $this->Card->EditCustomAttributes = "";
        $this->Card->EditValue = $this->Card->CurrentValue;
        $this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
        if (strval($this->Card->EditValue) != "" && is_numeric($this->Card->EditValue)) {
            $this->Card->EditValue = FormatNumber($this->Card->EditValue, -2, -2, -2, -2);
        }

        // Remarks
        $this->Remarks->EditAttrs["class"] = "form-control";
        $this->Remarks->EditCustomAttributes = "";
        $this->Remarks->EditValue = $this->Remarks->CurrentValue;
        $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

        // DiscountRemarks
        $this->DiscountRemarks->EditAttrs["class"] = "form-control";
        $this->DiscountRemarks->EditCustomAttributes = "";
        $this->DiscountRemarks->EditValue = $this->DiscountRemarks->CurrentValue;
        $this->DiscountRemarks->PlaceHolder = RemoveHtml($this->DiscountRemarks->caption());

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

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
                    $doc->exportCaption($this->DATE);
                    $doc->exportCaption($this->BillNumber);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->RefferedBy);
                    $doc->exportCaption($this->CASES);
                    $doc->exportCaption($this->WARD);
                    $doc->exportCaption($this->OT);
                    $doc->exportCaption($this->IMPLANT);
                    $doc->exportCaption($this->LAB);
                    $doc->exportCaption($this->PHARMACY);
                    $doc->exportCaption($this->OUTSIDEDRSVISITNAME);
                    $doc->exportCaption($this->OUTSIDEDRSVISITNAMEAmount);
                    $doc->exportCaption($this->PHYSIO);
                    $doc->exportCaption($this->PHYSIOAmount);
                    $doc->exportCaption($this->SURGEON);
                    $doc->exportCaption($this->SURGEONAmount);
                    $doc->exportCaption($this->ASSTSURGEON);
                    $doc->exportCaption($this->ASSTSURGEONAmount);
                    $doc->exportCaption($this->ANESTHETIST);
                    $doc->exportCaption($this->ANESTHETISTAmount);
                    $doc->exportCaption($this->_Others);
                    $doc->exportCaption($this->OtherServices);
                    $doc->exportCaption($this->Amount);
                    $doc->exportCaption($this->ModeofPayment);
                    $doc->exportCaption($this->Cash);
                    $doc->exportCaption($this->Card);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->DiscountRemarks);
                    $doc->exportCaption($this->HospID);
                } else {
                    $doc->exportCaption($this->DATE);
                    $doc->exportCaption($this->BillNumber);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->RefferedBy);
                    $doc->exportCaption($this->CASES);
                    $doc->exportCaption($this->WARD);
                    $doc->exportCaption($this->OT);
                    $doc->exportCaption($this->IMPLANT);
                    $doc->exportCaption($this->LAB);
                    $doc->exportCaption($this->PHARMACY);
                    $doc->exportCaption($this->OUTSIDEDRSVISITNAMEAmount);
                    $doc->exportCaption($this->PHYSIOAmount);
                    $doc->exportCaption($this->SURGEONAmount);
                    $doc->exportCaption($this->ASSTSURGEONAmount);
                    $doc->exportCaption($this->ANESTHETISTAmount);
                    $doc->exportCaption($this->_Others);
                    $doc->exportCaption($this->Amount);
                    $doc->exportCaption($this->ModeofPayment);
                    $doc->exportCaption($this->Cash);
                    $doc->exportCaption($this->Card);
                    $doc->exportCaption($this->HospID);
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
                        $doc->exportField($this->DATE);
                        $doc->exportField($this->BillNumber);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->RefferedBy);
                        $doc->exportField($this->CASES);
                        $doc->exportField($this->WARD);
                        $doc->exportField($this->OT);
                        $doc->exportField($this->IMPLANT);
                        $doc->exportField($this->LAB);
                        $doc->exportField($this->PHARMACY);
                        $doc->exportField($this->OUTSIDEDRSVISITNAME);
                        $doc->exportField($this->OUTSIDEDRSVISITNAMEAmount);
                        $doc->exportField($this->PHYSIO);
                        $doc->exportField($this->PHYSIOAmount);
                        $doc->exportField($this->SURGEON);
                        $doc->exportField($this->SURGEONAmount);
                        $doc->exportField($this->ASSTSURGEON);
                        $doc->exportField($this->ASSTSURGEONAmount);
                        $doc->exportField($this->ANESTHETIST);
                        $doc->exportField($this->ANESTHETISTAmount);
                        $doc->exportField($this->_Others);
                        $doc->exportField($this->OtherServices);
                        $doc->exportField($this->Amount);
                        $doc->exportField($this->ModeofPayment);
                        $doc->exportField($this->Cash);
                        $doc->exportField($this->Card);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->DiscountRemarks);
                        $doc->exportField($this->HospID);
                    } else {
                        $doc->exportField($this->DATE);
                        $doc->exportField($this->BillNumber);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->RefferedBy);
                        $doc->exportField($this->CASES);
                        $doc->exportField($this->WARD);
                        $doc->exportField($this->OT);
                        $doc->exportField($this->IMPLANT);
                        $doc->exportField($this->LAB);
                        $doc->exportField($this->PHARMACY);
                        $doc->exportField($this->OUTSIDEDRSVISITNAMEAmount);
                        $doc->exportField($this->PHYSIOAmount);
                        $doc->exportField($this->SURGEONAmount);
                        $doc->exportField($this->ASSTSURGEONAmount);
                        $doc->exportField($this->ANESTHETISTAmount);
                        $doc->exportField($this->_Others);
                        $doc->exportField($this->Amount);
                        $doc->exportField($this->ModeofPayment);
                        $doc->exportField($this->Cash);
                        $doc->exportField($this->Card);
                        $doc->exportField($this->HospID);
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
    public function rowInserted($rsold, &$rsnew)
    {
        //Log("Row Inserted");
    }

    // Row Updating event
    public function rowUpdating($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
    }

    // Row Updated event
    public function rowUpdated($rsold, &$rsnew)
    {
        //Log("Row Updated");
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
