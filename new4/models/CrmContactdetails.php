<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for crm_contactdetails
 */
class CrmContactdetails extends DbTable
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
    public $contactid;
    public $contact_no;
    public $parentid;
    public $salutation;
    public $firstname;
    public $lastname;
    public $_email;
    public $phone;
    public $mobile;
    public $reportsto;
    public $training;
    public $usertype;
    public $contacttype;
    public $otheremail;
    public $donotcall;
    public $emailoptout;
    public $imagename;
    public $isconvertedfromlead;
    public $verification;
    public $secondary_email;
    public $notifilanguage;
    public $contactstatus;
    public $dav_status;
    public $jobtitle;
    public $decision_maker;
    public $sum_time;
    public $phone_extra;
    public $mobile_extra;
    public $approvals;
    public $gender;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'crm_contactdetails';
        $this->TableName = 'crm_contactdetails';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`crm_contactdetails`";
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

        // contactid
        $this->contactid = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_contactid', 'contactid', '`contactid`', '`contactid`', 3, 10, -1, false, '`contactid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->contactid->IsPrimaryKey = true; // Primary key field
        $this->contactid->Nullable = false; // NOT NULL field
        $this->contactid->Sortable = true; // Allow sort
        $this->contactid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->contactid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->contactid->Param, "CustomMsg");
        $this->Fields['contactid'] = &$this->contactid;

        // contact_no
        $this->contact_no = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_contact_no', 'contact_no', '`contact_no`', '`contact_no`', 200, 100, -1, false, '`contact_no`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->contact_no->Nullable = false; // NOT NULL field
        $this->contact_no->Required = true; // Required field
        $this->contact_no->Sortable = true; // Allow sort
        $this->contact_no->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->contact_no->Param, "CustomMsg");
        $this->Fields['contact_no'] = &$this->contact_no;

        // parentid
        $this->parentid = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_parentid', 'parentid', '`parentid`', '`parentid`', 3, 10, -1, false, '`parentid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->parentid->Sortable = true; // Allow sort
        $this->parentid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->parentid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->parentid->Param, "CustomMsg");
        $this->Fields['parentid'] = &$this->parentid;

        // salutation
        $this->salutation = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_salutation', 'salutation', '`salutation`', '`salutation`', 200, 200, -1, false, '`salutation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->salutation->Sortable = true; // Allow sort
        $this->salutation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->salutation->Param, "CustomMsg");
        $this->Fields['salutation'] = &$this->salutation;

        // firstname
        $this->firstname = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_firstname', 'firstname', '`firstname`', '`firstname`', 200, 40, -1, false, '`firstname`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->firstname->Sortable = true; // Allow sort
        $this->firstname->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->firstname->Param, "CustomMsg");
        $this->Fields['firstname'] = &$this->firstname;

        // lastname
        $this->lastname = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_lastname', 'lastname', '`lastname`', '`lastname`', 200, 80, -1, false, '`lastname`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->lastname->Nullable = false; // NOT NULL field
        $this->lastname->Required = true; // Required field
        $this->lastname->Sortable = true; // Allow sort
        $this->lastname->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->lastname->Param, "CustomMsg");
        $this->Fields['lastname'] = &$this->lastname;

        // email
        $this->_email = new DbField('crm_contactdetails', 'crm_contactdetails', 'x__email', 'email', '`email`', '`email`', 200, 100, -1, false, '`email`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_email->Sortable = true; // Allow sort
        $this->_email->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_email->Param, "CustomMsg");
        $this->Fields['email'] = &$this->_email;

        // phone
        $this->phone = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_phone', 'phone', '`phone`', '`phone`', 200, 50, -1, false, '`phone`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->phone->Sortable = true; // Allow sort
        $this->phone->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->phone->Param, "CustomMsg");
        $this->Fields['phone'] = &$this->phone;

        // mobile
        $this->mobile = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_mobile', 'mobile', '`mobile`', '`mobile`', 200, 50, -1, false, '`mobile`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mobile->Sortable = true; // Allow sort
        $this->mobile->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mobile->Param, "CustomMsg");
        $this->Fields['mobile'] = &$this->mobile;

        // reportsto
        $this->reportsto = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_reportsto', 'reportsto', '`reportsto`', '`reportsto`', 3, 11, -1, false, '`reportsto`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->reportsto->Sortable = true; // Allow sort
        $this->reportsto->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->reportsto->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->reportsto->Param, "CustomMsg");
        $this->Fields['reportsto'] = &$this->reportsto;

        // training
        $this->training = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_training', 'training', '`training`', '`training`', 200, 50, -1, false, '`training`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->training->Sortable = true; // Allow sort
        $this->training->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->training->Param, "CustomMsg");
        $this->Fields['training'] = &$this->training;

        // usertype
        $this->usertype = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_usertype', 'usertype', '`usertype`', '`usertype`', 200, 50, -1, false, '`usertype`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->usertype->Sortable = true; // Allow sort
        $this->usertype->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->usertype->Param, "CustomMsg");
        $this->Fields['usertype'] = &$this->usertype;

        // contacttype
        $this->contacttype = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_contacttype', 'contacttype', '`contacttype`', '`contacttype`', 200, 50, -1, false, '`contacttype`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->contacttype->Sortable = true; // Allow sort
        $this->contacttype->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->contacttype->Param, "CustomMsg");
        $this->Fields['contacttype'] = &$this->contacttype;

        // otheremail
        $this->otheremail = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_otheremail', 'otheremail', '`otheremail`', '`otheremail`', 200, 100, -1, false, '`otheremail`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->otheremail->Sortable = true; // Allow sort
        $this->otheremail->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->otheremail->Param, "CustomMsg");
        $this->Fields['otheremail'] = &$this->otheremail;

        // donotcall
        $this->donotcall = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_donotcall', 'donotcall', '`donotcall`', '`donotcall`', 2, 1, -1, false, '`donotcall`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->donotcall->Sortable = true; // Allow sort
        $this->donotcall->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->donotcall->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->donotcall->Param, "CustomMsg");
        $this->Fields['donotcall'] = &$this->donotcall;

        // emailoptout
        $this->emailoptout = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_emailoptout', 'emailoptout', '`emailoptout`', '`emailoptout`', 2, 1, -1, false, '`emailoptout`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->emailoptout->Sortable = true; // Allow sort
        $this->emailoptout->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->emailoptout->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->emailoptout->Param, "CustomMsg");
        $this->Fields['emailoptout'] = &$this->emailoptout;

        // imagename
        $this->imagename = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_imagename', 'imagename', '`imagename`', '`imagename`', 201, 65535, -1, false, '`imagename`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->imagename->Sortable = true; // Allow sort
        $this->imagename->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->imagename->Param, "CustomMsg");
        $this->Fields['imagename'] = &$this->imagename;

        // isconvertedfromlead
        $this->isconvertedfromlead = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_isconvertedfromlead', 'isconvertedfromlead', '`isconvertedfromlead`', '`isconvertedfromlead`', 2, 1, -1, false, '`isconvertedfromlead`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->isconvertedfromlead->Sortable = true; // Allow sort
        $this->isconvertedfromlead->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->isconvertedfromlead->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->isconvertedfromlead->Param, "CustomMsg");
        $this->Fields['isconvertedfromlead'] = &$this->isconvertedfromlead;

        // verification
        $this->verification = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_verification', 'verification', '`verification`', '`verification`', 201, 65535, -1, false, '`verification`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->verification->Sortable = true; // Allow sort
        $this->verification->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->verification->Param, "CustomMsg");
        $this->Fields['verification'] = &$this->verification;

        // secondary_email
        $this->secondary_email = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_secondary_email', 'secondary_email', '`secondary_email`', '`secondary_email`', 200, 100, -1, false, '`secondary_email`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->secondary_email->Sortable = true; // Allow sort
        $this->secondary_email->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->secondary_email->Param, "CustomMsg");
        $this->Fields['secondary_email'] = &$this->secondary_email;

        // notifilanguage
        $this->notifilanguage = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_notifilanguage', 'notifilanguage', '`notifilanguage`', '`notifilanguage`', 200, 100, -1, false, '`notifilanguage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->notifilanguage->Sortable = true; // Allow sort
        $this->notifilanguage->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->notifilanguage->Param, "CustomMsg");
        $this->Fields['notifilanguage'] = &$this->notifilanguage;

        // contactstatus
        $this->contactstatus = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_contactstatus', 'contactstatus', '`contactstatus`', '`contactstatus`', 200, 255, -1, false, '`contactstatus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->contactstatus->Sortable = true; // Allow sort
        $this->contactstatus->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->contactstatus->Param, "CustomMsg");
        $this->Fields['contactstatus'] = &$this->contactstatus;

        // dav_status
        $this->dav_status = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_dav_status', 'dav_status', '`dav_status`', '`dav_status`', 16, 1, -1, false, '`dav_status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->dav_status->Sortable = true; // Allow sort
        $this->dav_status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->dav_status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->dav_status->Param, "CustomMsg");
        $this->Fields['dav_status'] = &$this->dav_status;

        // jobtitle
        $this->jobtitle = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_jobtitle', 'jobtitle', '`jobtitle`', '`jobtitle`', 200, 100, -1, false, '`jobtitle`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->jobtitle->Sortable = true; // Allow sort
        $this->jobtitle->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->jobtitle->Param, "CustomMsg");
        $this->Fields['jobtitle'] = &$this->jobtitle;

        // decision_maker
        $this->decision_maker = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_decision_maker', 'decision_maker', '`decision_maker`', '`decision_maker`', 16, 1, -1, false, '`decision_maker`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->decision_maker->Sortable = true; // Allow sort
        $this->decision_maker->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->decision_maker->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->decision_maker->Param, "CustomMsg");
        $this->Fields['decision_maker'] = &$this->decision_maker;

        // sum_time
        $this->sum_time = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_sum_time', 'sum_time', '`sum_time`', '`sum_time`', 131, 10, -1, false, '`sum_time`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->sum_time->Sortable = true; // Allow sort
        $this->sum_time->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->sum_time->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->sum_time->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->sum_time->Param, "CustomMsg");
        $this->Fields['sum_time'] = &$this->sum_time;

        // phone_extra
        $this->phone_extra = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_phone_extra', 'phone_extra', '`phone_extra`', '`phone_extra`', 200, 100, -1, false, '`phone_extra`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->phone_extra->Sortable = true; // Allow sort
        $this->phone_extra->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->phone_extra->Param, "CustomMsg");
        $this->Fields['phone_extra'] = &$this->phone_extra;

        // mobile_extra
        $this->mobile_extra = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_mobile_extra', 'mobile_extra', '`mobile_extra`', '`mobile_extra`', 200, 100, -1, false, '`mobile_extra`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mobile_extra->Sortable = true; // Allow sort
        $this->mobile_extra->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mobile_extra->Param, "CustomMsg");
        $this->Fields['mobile_extra'] = &$this->mobile_extra;

        // approvals
        $this->approvals = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_approvals', 'approvals', '`approvals`', '`approvals`', 201, 65535, -1, false, '`approvals`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->approvals->Sortable = true; // Allow sort
        $this->approvals->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->approvals->Param, "CustomMsg");
        $this->Fields['approvals'] = &$this->approvals;

        // gender
        $this->gender = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_gender', 'gender', '`gender`', '`gender`', 200, 255, -1, false, '`gender`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->gender->Sortable = true; // Allow sort
        $this->gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->gender->Param, "CustomMsg");
        $this->Fields['gender'] = &$this->gender;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`crm_contactdetails`";
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
            if (array_key_exists('contactid', $rs)) {
                AddFilter($where, QuotedName('contactid', $this->Dbid) . '=' . QuotedValue($rs['contactid'], $this->contactid->DataType, $this->Dbid));
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
        $this->contactid->DbValue = $row['contactid'];
        $this->contact_no->DbValue = $row['contact_no'];
        $this->parentid->DbValue = $row['parentid'];
        $this->salutation->DbValue = $row['salutation'];
        $this->firstname->DbValue = $row['firstname'];
        $this->lastname->DbValue = $row['lastname'];
        $this->_email->DbValue = $row['email'];
        $this->phone->DbValue = $row['phone'];
        $this->mobile->DbValue = $row['mobile'];
        $this->reportsto->DbValue = $row['reportsto'];
        $this->training->DbValue = $row['training'];
        $this->usertype->DbValue = $row['usertype'];
        $this->contacttype->DbValue = $row['contacttype'];
        $this->otheremail->DbValue = $row['otheremail'];
        $this->donotcall->DbValue = $row['donotcall'];
        $this->emailoptout->DbValue = $row['emailoptout'];
        $this->imagename->DbValue = $row['imagename'];
        $this->isconvertedfromlead->DbValue = $row['isconvertedfromlead'];
        $this->verification->DbValue = $row['verification'];
        $this->secondary_email->DbValue = $row['secondary_email'];
        $this->notifilanguage->DbValue = $row['notifilanguage'];
        $this->contactstatus->DbValue = $row['contactstatus'];
        $this->dav_status->DbValue = $row['dav_status'];
        $this->jobtitle->DbValue = $row['jobtitle'];
        $this->decision_maker->DbValue = $row['decision_maker'];
        $this->sum_time->DbValue = $row['sum_time'];
        $this->phone_extra->DbValue = $row['phone_extra'];
        $this->mobile_extra->DbValue = $row['mobile_extra'];
        $this->approvals->DbValue = $row['approvals'];
        $this->gender->DbValue = $row['gender'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "`contactid` = @contactid@";
    }

    // Get Key
    public function getKey($current = false)
    {
        $keys = [];
        $val = $current ? $this->contactid->CurrentValue : $this->contactid->OldValue;
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
                $this->contactid->CurrentValue = $keys[0];
            } else {
                $this->contactid->OldValue = $keys[0];
            }
        }
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
        if (is_array($row)) {
            $val = array_key_exists('contactid', $row) ? $row['contactid'] : null;
        } else {
            $val = $this->contactid->OldValue !== null ? $this->contactid->OldValue : $this->contactid->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@contactid@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
        return $_SESSION[$name] ?? GetUrl("CrmContactdetailsList");
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
        if ($pageName == "CrmContactdetailsView") {
            return $Language->phrase("View");
        } elseif ($pageName == "CrmContactdetailsEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "CrmContactdetailsAdd") {
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
                return "CrmContactdetailsView";
            case Config("API_ADD_ACTION"):
                return "CrmContactdetailsAdd";
            case Config("API_EDIT_ACTION"):
                return "CrmContactdetailsEdit";
            case Config("API_DELETE_ACTION"):
                return "CrmContactdetailsDelete";
            case Config("API_LIST_ACTION"):
                return "CrmContactdetailsList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "CrmContactdetailsList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("CrmContactdetailsView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("CrmContactdetailsView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "CrmContactdetailsAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "CrmContactdetailsAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("CrmContactdetailsEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("CrmContactdetailsAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("CrmContactdetailsDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json .= "contactid:" . JsonEncode($this->contactid->CurrentValue, "number");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
        if ($this->contactid->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->contactid->CurrentValue);
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
            if (($keyValue = Param("contactid") ?? Route("contactid")) !== null) {
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
                $this->contactid->CurrentValue = $key;
            } else {
                $this->contactid->OldValue = $key;
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
        $this->contactid->setDbValue($row['contactid']);
        $this->contact_no->setDbValue($row['contact_no']);
        $this->parentid->setDbValue($row['parentid']);
        $this->salutation->setDbValue($row['salutation']);
        $this->firstname->setDbValue($row['firstname']);
        $this->lastname->setDbValue($row['lastname']);
        $this->_email->setDbValue($row['email']);
        $this->phone->setDbValue($row['phone']);
        $this->mobile->setDbValue($row['mobile']);
        $this->reportsto->setDbValue($row['reportsto']);
        $this->training->setDbValue($row['training']);
        $this->usertype->setDbValue($row['usertype']);
        $this->contacttype->setDbValue($row['contacttype']);
        $this->otheremail->setDbValue($row['otheremail']);
        $this->donotcall->setDbValue($row['donotcall']);
        $this->emailoptout->setDbValue($row['emailoptout']);
        $this->imagename->setDbValue($row['imagename']);
        $this->isconvertedfromlead->setDbValue($row['isconvertedfromlead']);
        $this->verification->setDbValue($row['verification']);
        $this->secondary_email->setDbValue($row['secondary_email']);
        $this->notifilanguage->setDbValue($row['notifilanguage']);
        $this->contactstatus->setDbValue($row['contactstatus']);
        $this->dav_status->setDbValue($row['dav_status']);
        $this->jobtitle->setDbValue($row['jobtitle']);
        $this->decision_maker->setDbValue($row['decision_maker']);
        $this->sum_time->setDbValue($row['sum_time']);
        $this->phone_extra->setDbValue($row['phone_extra']);
        $this->mobile_extra->setDbValue($row['mobile_extra']);
        $this->approvals->setDbValue($row['approvals']);
        $this->gender->setDbValue($row['gender']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // contactid

        // contact_no

        // parentid

        // salutation

        // firstname

        // lastname

        // email

        // phone

        // mobile

        // reportsto

        // training

        // usertype

        // contacttype

        // otheremail

        // donotcall

        // emailoptout

        // imagename

        // isconvertedfromlead

        // verification

        // secondary_email

        // notifilanguage

        // contactstatus

        // dav_status

        // jobtitle

        // decision_maker

        // sum_time

        // phone_extra

        // mobile_extra

        // approvals

        // gender

        // contactid
        $this->contactid->ViewValue = $this->contactid->CurrentValue;
        $this->contactid->ViewValue = FormatNumber($this->contactid->ViewValue, 0, -2, -2, -2);
        $this->contactid->ViewCustomAttributes = "";

        // contact_no
        $this->contact_no->ViewValue = $this->contact_no->CurrentValue;
        $this->contact_no->ViewCustomAttributes = "";

        // parentid
        $this->parentid->ViewValue = $this->parentid->CurrentValue;
        $this->parentid->ViewValue = FormatNumber($this->parentid->ViewValue, 0, -2, -2, -2);
        $this->parentid->ViewCustomAttributes = "";

        // salutation
        $this->salutation->ViewValue = $this->salutation->CurrentValue;
        $this->salutation->ViewCustomAttributes = "";

        // firstname
        $this->firstname->ViewValue = $this->firstname->CurrentValue;
        $this->firstname->ViewCustomAttributes = "";

        // lastname
        $this->lastname->ViewValue = $this->lastname->CurrentValue;
        $this->lastname->ViewCustomAttributes = "";

        // email
        $this->_email->ViewValue = $this->_email->CurrentValue;
        $this->_email->ViewCustomAttributes = "";

        // phone
        $this->phone->ViewValue = $this->phone->CurrentValue;
        $this->phone->ViewCustomAttributes = "";

        // mobile
        $this->mobile->ViewValue = $this->mobile->CurrentValue;
        $this->mobile->ViewCustomAttributes = "";

        // reportsto
        $this->reportsto->ViewValue = $this->reportsto->CurrentValue;
        $this->reportsto->ViewValue = FormatNumber($this->reportsto->ViewValue, 0, -2, -2, -2);
        $this->reportsto->ViewCustomAttributes = "";

        // training
        $this->training->ViewValue = $this->training->CurrentValue;
        $this->training->ViewCustomAttributes = "";

        // usertype
        $this->usertype->ViewValue = $this->usertype->CurrentValue;
        $this->usertype->ViewCustomAttributes = "";

        // contacttype
        $this->contacttype->ViewValue = $this->contacttype->CurrentValue;
        $this->contacttype->ViewCustomAttributes = "";

        // otheremail
        $this->otheremail->ViewValue = $this->otheremail->CurrentValue;
        $this->otheremail->ViewCustomAttributes = "";

        // donotcall
        $this->donotcall->ViewValue = $this->donotcall->CurrentValue;
        $this->donotcall->ViewValue = FormatNumber($this->donotcall->ViewValue, 0, -2, -2, -2);
        $this->donotcall->ViewCustomAttributes = "";

        // emailoptout
        $this->emailoptout->ViewValue = $this->emailoptout->CurrentValue;
        $this->emailoptout->ViewValue = FormatNumber($this->emailoptout->ViewValue, 0, -2, -2, -2);
        $this->emailoptout->ViewCustomAttributes = "";

        // imagename
        $this->imagename->ViewValue = $this->imagename->CurrentValue;
        $this->imagename->ViewCustomAttributes = "";

        // isconvertedfromlead
        $this->isconvertedfromlead->ViewValue = $this->isconvertedfromlead->CurrentValue;
        $this->isconvertedfromlead->ViewValue = FormatNumber($this->isconvertedfromlead->ViewValue, 0, -2, -2, -2);
        $this->isconvertedfromlead->ViewCustomAttributes = "";

        // verification
        $this->verification->ViewValue = $this->verification->CurrentValue;
        $this->verification->ViewCustomAttributes = "";

        // secondary_email
        $this->secondary_email->ViewValue = $this->secondary_email->CurrentValue;
        $this->secondary_email->ViewCustomAttributes = "";

        // notifilanguage
        $this->notifilanguage->ViewValue = $this->notifilanguage->CurrentValue;
        $this->notifilanguage->ViewCustomAttributes = "";

        // contactstatus
        $this->contactstatus->ViewValue = $this->contactstatus->CurrentValue;
        $this->contactstatus->ViewCustomAttributes = "";

        // dav_status
        $this->dav_status->ViewValue = $this->dav_status->CurrentValue;
        $this->dav_status->ViewValue = FormatNumber($this->dav_status->ViewValue, 0, -2, -2, -2);
        $this->dav_status->ViewCustomAttributes = "";

        // jobtitle
        $this->jobtitle->ViewValue = $this->jobtitle->CurrentValue;
        $this->jobtitle->ViewCustomAttributes = "";

        // decision_maker
        $this->decision_maker->ViewValue = $this->decision_maker->CurrentValue;
        $this->decision_maker->ViewValue = FormatNumber($this->decision_maker->ViewValue, 0, -2, -2, -2);
        $this->decision_maker->ViewCustomAttributes = "";

        // sum_time
        $this->sum_time->ViewValue = $this->sum_time->CurrentValue;
        $this->sum_time->ViewValue = FormatNumber($this->sum_time->ViewValue, 2, -2, -2, -2);
        $this->sum_time->ViewCustomAttributes = "";

        // phone_extra
        $this->phone_extra->ViewValue = $this->phone_extra->CurrentValue;
        $this->phone_extra->ViewCustomAttributes = "";

        // mobile_extra
        $this->mobile_extra->ViewValue = $this->mobile_extra->CurrentValue;
        $this->mobile_extra->ViewCustomAttributes = "";

        // approvals
        $this->approvals->ViewValue = $this->approvals->CurrentValue;
        $this->approvals->ViewCustomAttributes = "";

        // gender
        $this->gender->ViewValue = $this->gender->CurrentValue;
        $this->gender->ViewCustomAttributes = "";

        // contactid
        $this->contactid->LinkCustomAttributes = "";
        $this->contactid->HrefValue = "";
        $this->contactid->TooltipValue = "";

        // contact_no
        $this->contact_no->LinkCustomAttributes = "";
        $this->contact_no->HrefValue = "";
        $this->contact_no->TooltipValue = "";

        // parentid
        $this->parentid->LinkCustomAttributes = "";
        $this->parentid->HrefValue = "";
        $this->parentid->TooltipValue = "";

        // salutation
        $this->salutation->LinkCustomAttributes = "";
        $this->salutation->HrefValue = "";
        $this->salutation->TooltipValue = "";

        // firstname
        $this->firstname->LinkCustomAttributes = "";
        $this->firstname->HrefValue = "";
        $this->firstname->TooltipValue = "";

        // lastname
        $this->lastname->LinkCustomAttributes = "";
        $this->lastname->HrefValue = "";
        $this->lastname->TooltipValue = "";

        // email
        $this->_email->LinkCustomAttributes = "";
        $this->_email->HrefValue = "";
        $this->_email->TooltipValue = "";

        // phone
        $this->phone->LinkCustomAttributes = "";
        $this->phone->HrefValue = "";
        $this->phone->TooltipValue = "";

        // mobile
        $this->mobile->LinkCustomAttributes = "";
        $this->mobile->HrefValue = "";
        $this->mobile->TooltipValue = "";

        // reportsto
        $this->reportsto->LinkCustomAttributes = "";
        $this->reportsto->HrefValue = "";
        $this->reportsto->TooltipValue = "";

        // training
        $this->training->LinkCustomAttributes = "";
        $this->training->HrefValue = "";
        $this->training->TooltipValue = "";

        // usertype
        $this->usertype->LinkCustomAttributes = "";
        $this->usertype->HrefValue = "";
        $this->usertype->TooltipValue = "";

        // contacttype
        $this->contacttype->LinkCustomAttributes = "";
        $this->contacttype->HrefValue = "";
        $this->contacttype->TooltipValue = "";

        // otheremail
        $this->otheremail->LinkCustomAttributes = "";
        $this->otheremail->HrefValue = "";
        $this->otheremail->TooltipValue = "";

        // donotcall
        $this->donotcall->LinkCustomAttributes = "";
        $this->donotcall->HrefValue = "";
        $this->donotcall->TooltipValue = "";

        // emailoptout
        $this->emailoptout->LinkCustomAttributes = "";
        $this->emailoptout->HrefValue = "";
        $this->emailoptout->TooltipValue = "";

        // imagename
        $this->imagename->LinkCustomAttributes = "";
        $this->imagename->HrefValue = "";
        $this->imagename->TooltipValue = "";

        // isconvertedfromlead
        $this->isconvertedfromlead->LinkCustomAttributes = "";
        $this->isconvertedfromlead->HrefValue = "";
        $this->isconvertedfromlead->TooltipValue = "";

        // verification
        $this->verification->LinkCustomAttributes = "";
        $this->verification->HrefValue = "";
        $this->verification->TooltipValue = "";

        // secondary_email
        $this->secondary_email->LinkCustomAttributes = "";
        $this->secondary_email->HrefValue = "";
        $this->secondary_email->TooltipValue = "";

        // notifilanguage
        $this->notifilanguage->LinkCustomAttributes = "";
        $this->notifilanguage->HrefValue = "";
        $this->notifilanguage->TooltipValue = "";

        // contactstatus
        $this->contactstatus->LinkCustomAttributes = "";
        $this->contactstatus->HrefValue = "";
        $this->contactstatus->TooltipValue = "";

        // dav_status
        $this->dav_status->LinkCustomAttributes = "";
        $this->dav_status->HrefValue = "";
        $this->dav_status->TooltipValue = "";

        // jobtitle
        $this->jobtitle->LinkCustomAttributes = "";
        $this->jobtitle->HrefValue = "";
        $this->jobtitle->TooltipValue = "";

        // decision_maker
        $this->decision_maker->LinkCustomAttributes = "";
        $this->decision_maker->HrefValue = "";
        $this->decision_maker->TooltipValue = "";

        // sum_time
        $this->sum_time->LinkCustomAttributes = "";
        $this->sum_time->HrefValue = "";
        $this->sum_time->TooltipValue = "";

        // phone_extra
        $this->phone_extra->LinkCustomAttributes = "";
        $this->phone_extra->HrefValue = "";
        $this->phone_extra->TooltipValue = "";

        // mobile_extra
        $this->mobile_extra->LinkCustomAttributes = "";
        $this->mobile_extra->HrefValue = "";
        $this->mobile_extra->TooltipValue = "";

        // approvals
        $this->approvals->LinkCustomAttributes = "";
        $this->approvals->HrefValue = "";
        $this->approvals->TooltipValue = "";

        // gender
        $this->gender->LinkCustomAttributes = "";
        $this->gender->HrefValue = "";
        $this->gender->TooltipValue = "";

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

        // contactid
        $this->contactid->EditAttrs["class"] = "form-control";
        $this->contactid->EditCustomAttributes = "";
        $this->contactid->EditValue = $this->contactid->CurrentValue;
        $this->contactid->PlaceHolder = RemoveHtml($this->contactid->caption());

        // contact_no
        $this->contact_no->EditAttrs["class"] = "form-control";
        $this->contact_no->EditCustomAttributes = "";
        if (!$this->contact_no->Raw) {
            $this->contact_no->CurrentValue = HtmlDecode($this->contact_no->CurrentValue);
        }
        $this->contact_no->EditValue = $this->contact_no->CurrentValue;
        $this->contact_no->PlaceHolder = RemoveHtml($this->contact_no->caption());

        // parentid
        $this->parentid->EditAttrs["class"] = "form-control";
        $this->parentid->EditCustomAttributes = "";
        $this->parentid->EditValue = $this->parentid->CurrentValue;
        $this->parentid->PlaceHolder = RemoveHtml($this->parentid->caption());

        // salutation
        $this->salutation->EditAttrs["class"] = "form-control";
        $this->salutation->EditCustomAttributes = "";
        if (!$this->salutation->Raw) {
            $this->salutation->CurrentValue = HtmlDecode($this->salutation->CurrentValue);
        }
        $this->salutation->EditValue = $this->salutation->CurrentValue;
        $this->salutation->PlaceHolder = RemoveHtml($this->salutation->caption());

        // firstname
        $this->firstname->EditAttrs["class"] = "form-control";
        $this->firstname->EditCustomAttributes = "";
        if (!$this->firstname->Raw) {
            $this->firstname->CurrentValue = HtmlDecode($this->firstname->CurrentValue);
        }
        $this->firstname->EditValue = $this->firstname->CurrentValue;
        $this->firstname->PlaceHolder = RemoveHtml($this->firstname->caption());

        // lastname
        $this->lastname->EditAttrs["class"] = "form-control";
        $this->lastname->EditCustomAttributes = "";
        if (!$this->lastname->Raw) {
            $this->lastname->CurrentValue = HtmlDecode($this->lastname->CurrentValue);
        }
        $this->lastname->EditValue = $this->lastname->CurrentValue;
        $this->lastname->PlaceHolder = RemoveHtml($this->lastname->caption());

        // email
        $this->_email->EditAttrs["class"] = "form-control";
        $this->_email->EditCustomAttributes = "";
        if (!$this->_email->Raw) {
            $this->_email->CurrentValue = HtmlDecode($this->_email->CurrentValue);
        }
        $this->_email->EditValue = $this->_email->CurrentValue;
        $this->_email->PlaceHolder = RemoveHtml($this->_email->caption());

        // phone
        $this->phone->EditAttrs["class"] = "form-control";
        $this->phone->EditCustomAttributes = "";
        if (!$this->phone->Raw) {
            $this->phone->CurrentValue = HtmlDecode($this->phone->CurrentValue);
        }
        $this->phone->EditValue = $this->phone->CurrentValue;
        $this->phone->PlaceHolder = RemoveHtml($this->phone->caption());

        // mobile
        $this->mobile->EditAttrs["class"] = "form-control";
        $this->mobile->EditCustomAttributes = "";
        if (!$this->mobile->Raw) {
            $this->mobile->CurrentValue = HtmlDecode($this->mobile->CurrentValue);
        }
        $this->mobile->EditValue = $this->mobile->CurrentValue;
        $this->mobile->PlaceHolder = RemoveHtml($this->mobile->caption());

        // reportsto
        $this->reportsto->EditAttrs["class"] = "form-control";
        $this->reportsto->EditCustomAttributes = "";
        $this->reportsto->EditValue = $this->reportsto->CurrentValue;
        $this->reportsto->PlaceHolder = RemoveHtml($this->reportsto->caption());

        // training
        $this->training->EditAttrs["class"] = "form-control";
        $this->training->EditCustomAttributes = "";
        if (!$this->training->Raw) {
            $this->training->CurrentValue = HtmlDecode($this->training->CurrentValue);
        }
        $this->training->EditValue = $this->training->CurrentValue;
        $this->training->PlaceHolder = RemoveHtml($this->training->caption());

        // usertype
        $this->usertype->EditAttrs["class"] = "form-control";
        $this->usertype->EditCustomAttributes = "";
        if (!$this->usertype->Raw) {
            $this->usertype->CurrentValue = HtmlDecode($this->usertype->CurrentValue);
        }
        $this->usertype->EditValue = $this->usertype->CurrentValue;
        $this->usertype->PlaceHolder = RemoveHtml($this->usertype->caption());

        // contacttype
        $this->contacttype->EditAttrs["class"] = "form-control";
        $this->contacttype->EditCustomAttributes = "";
        if (!$this->contacttype->Raw) {
            $this->contacttype->CurrentValue = HtmlDecode($this->contacttype->CurrentValue);
        }
        $this->contacttype->EditValue = $this->contacttype->CurrentValue;
        $this->contacttype->PlaceHolder = RemoveHtml($this->contacttype->caption());

        // otheremail
        $this->otheremail->EditAttrs["class"] = "form-control";
        $this->otheremail->EditCustomAttributes = "";
        if (!$this->otheremail->Raw) {
            $this->otheremail->CurrentValue = HtmlDecode($this->otheremail->CurrentValue);
        }
        $this->otheremail->EditValue = $this->otheremail->CurrentValue;
        $this->otheremail->PlaceHolder = RemoveHtml($this->otheremail->caption());

        // donotcall
        $this->donotcall->EditAttrs["class"] = "form-control";
        $this->donotcall->EditCustomAttributes = "";
        $this->donotcall->EditValue = $this->donotcall->CurrentValue;
        $this->donotcall->PlaceHolder = RemoveHtml($this->donotcall->caption());

        // emailoptout
        $this->emailoptout->EditAttrs["class"] = "form-control";
        $this->emailoptout->EditCustomAttributes = "";
        $this->emailoptout->EditValue = $this->emailoptout->CurrentValue;
        $this->emailoptout->PlaceHolder = RemoveHtml($this->emailoptout->caption());

        // imagename
        $this->imagename->EditAttrs["class"] = "form-control";
        $this->imagename->EditCustomAttributes = "";
        $this->imagename->EditValue = $this->imagename->CurrentValue;
        $this->imagename->PlaceHolder = RemoveHtml($this->imagename->caption());

        // isconvertedfromlead
        $this->isconvertedfromlead->EditAttrs["class"] = "form-control";
        $this->isconvertedfromlead->EditCustomAttributes = "";
        $this->isconvertedfromlead->EditValue = $this->isconvertedfromlead->CurrentValue;
        $this->isconvertedfromlead->PlaceHolder = RemoveHtml($this->isconvertedfromlead->caption());

        // verification
        $this->verification->EditAttrs["class"] = "form-control";
        $this->verification->EditCustomAttributes = "";
        $this->verification->EditValue = $this->verification->CurrentValue;
        $this->verification->PlaceHolder = RemoveHtml($this->verification->caption());

        // secondary_email
        $this->secondary_email->EditAttrs["class"] = "form-control";
        $this->secondary_email->EditCustomAttributes = "";
        if (!$this->secondary_email->Raw) {
            $this->secondary_email->CurrentValue = HtmlDecode($this->secondary_email->CurrentValue);
        }
        $this->secondary_email->EditValue = $this->secondary_email->CurrentValue;
        $this->secondary_email->PlaceHolder = RemoveHtml($this->secondary_email->caption());

        // notifilanguage
        $this->notifilanguage->EditAttrs["class"] = "form-control";
        $this->notifilanguage->EditCustomAttributes = "";
        if (!$this->notifilanguage->Raw) {
            $this->notifilanguage->CurrentValue = HtmlDecode($this->notifilanguage->CurrentValue);
        }
        $this->notifilanguage->EditValue = $this->notifilanguage->CurrentValue;
        $this->notifilanguage->PlaceHolder = RemoveHtml($this->notifilanguage->caption());

        // contactstatus
        $this->contactstatus->EditAttrs["class"] = "form-control";
        $this->contactstatus->EditCustomAttributes = "";
        if (!$this->contactstatus->Raw) {
            $this->contactstatus->CurrentValue = HtmlDecode($this->contactstatus->CurrentValue);
        }
        $this->contactstatus->EditValue = $this->contactstatus->CurrentValue;
        $this->contactstatus->PlaceHolder = RemoveHtml($this->contactstatus->caption());

        // dav_status
        $this->dav_status->EditAttrs["class"] = "form-control";
        $this->dav_status->EditCustomAttributes = "";
        $this->dav_status->EditValue = $this->dav_status->CurrentValue;
        $this->dav_status->PlaceHolder = RemoveHtml($this->dav_status->caption());

        // jobtitle
        $this->jobtitle->EditAttrs["class"] = "form-control";
        $this->jobtitle->EditCustomAttributes = "";
        if (!$this->jobtitle->Raw) {
            $this->jobtitle->CurrentValue = HtmlDecode($this->jobtitle->CurrentValue);
        }
        $this->jobtitle->EditValue = $this->jobtitle->CurrentValue;
        $this->jobtitle->PlaceHolder = RemoveHtml($this->jobtitle->caption());

        // decision_maker
        $this->decision_maker->EditAttrs["class"] = "form-control";
        $this->decision_maker->EditCustomAttributes = "";
        $this->decision_maker->EditValue = $this->decision_maker->CurrentValue;
        $this->decision_maker->PlaceHolder = RemoveHtml($this->decision_maker->caption());

        // sum_time
        $this->sum_time->EditAttrs["class"] = "form-control";
        $this->sum_time->EditCustomAttributes = "";
        $this->sum_time->EditValue = $this->sum_time->CurrentValue;
        $this->sum_time->PlaceHolder = RemoveHtml($this->sum_time->caption());
        if (strval($this->sum_time->EditValue) != "" && is_numeric($this->sum_time->EditValue)) {
            $this->sum_time->EditValue = FormatNumber($this->sum_time->EditValue, -2, -2, -2, -2);
        }

        // phone_extra
        $this->phone_extra->EditAttrs["class"] = "form-control";
        $this->phone_extra->EditCustomAttributes = "";
        if (!$this->phone_extra->Raw) {
            $this->phone_extra->CurrentValue = HtmlDecode($this->phone_extra->CurrentValue);
        }
        $this->phone_extra->EditValue = $this->phone_extra->CurrentValue;
        $this->phone_extra->PlaceHolder = RemoveHtml($this->phone_extra->caption());

        // mobile_extra
        $this->mobile_extra->EditAttrs["class"] = "form-control";
        $this->mobile_extra->EditCustomAttributes = "";
        if (!$this->mobile_extra->Raw) {
            $this->mobile_extra->CurrentValue = HtmlDecode($this->mobile_extra->CurrentValue);
        }
        $this->mobile_extra->EditValue = $this->mobile_extra->CurrentValue;
        $this->mobile_extra->PlaceHolder = RemoveHtml($this->mobile_extra->caption());

        // approvals
        $this->approvals->EditAttrs["class"] = "form-control";
        $this->approvals->EditCustomAttributes = "";
        $this->approvals->EditValue = $this->approvals->CurrentValue;
        $this->approvals->PlaceHolder = RemoveHtml($this->approvals->caption());

        // gender
        $this->gender->EditAttrs["class"] = "form-control";
        $this->gender->EditCustomAttributes = "";
        if (!$this->gender->Raw) {
            $this->gender->CurrentValue = HtmlDecode($this->gender->CurrentValue);
        }
        $this->gender->EditValue = $this->gender->CurrentValue;
        $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

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
                    $doc->exportCaption($this->contactid);
                    $doc->exportCaption($this->contact_no);
                    $doc->exportCaption($this->parentid);
                    $doc->exportCaption($this->salutation);
                    $doc->exportCaption($this->firstname);
                    $doc->exportCaption($this->lastname);
                    $doc->exportCaption($this->_email);
                    $doc->exportCaption($this->phone);
                    $doc->exportCaption($this->mobile);
                    $doc->exportCaption($this->reportsto);
                    $doc->exportCaption($this->training);
                    $doc->exportCaption($this->usertype);
                    $doc->exportCaption($this->contacttype);
                    $doc->exportCaption($this->otheremail);
                    $doc->exportCaption($this->donotcall);
                    $doc->exportCaption($this->emailoptout);
                    $doc->exportCaption($this->imagename);
                    $doc->exportCaption($this->isconvertedfromlead);
                    $doc->exportCaption($this->verification);
                    $doc->exportCaption($this->secondary_email);
                    $doc->exportCaption($this->notifilanguage);
                    $doc->exportCaption($this->contactstatus);
                    $doc->exportCaption($this->dav_status);
                    $doc->exportCaption($this->jobtitle);
                    $doc->exportCaption($this->decision_maker);
                    $doc->exportCaption($this->sum_time);
                    $doc->exportCaption($this->phone_extra);
                    $doc->exportCaption($this->mobile_extra);
                    $doc->exportCaption($this->approvals);
                    $doc->exportCaption($this->gender);
                } else {
                    $doc->exportCaption($this->contactid);
                    $doc->exportCaption($this->contact_no);
                    $doc->exportCaption($this->parentid);
                    $doc->exportCaption($this->salutation);
                    $doc->exportCaption($this->firstname);
                    $doc->exportCaption($this->lastname);
                    $doc->exportCaption($this->_email);
                    $doc->exportCaption($this->phone);
                    $doc->exportCaption($this->mobile);
                    $doc->exportCaption($this->reportsto);
                    $doc->exportCaption($this->training);
                    $doc->exportCaption($this->usertype);
                    $doc->exportCaption($this->contacttype);
                    $doc->exportCaption($this->otheremail);
                    $doc->exportCaption($this->donotcall);
                    $doc->exportCaption($this->emailoptout);
                    $doc->exportCaption($this->isconvertedfromlead);
                    $doc->exportCaption($this->secondary_email);
                    $doc->exportCaption($this->notifilanguage);
                    $doc->exportCaption($this->contactstatus);
                    $doc->exportCaption($this->dav_status);
                    $doc->exportCaption($this->jobtitle);
                    $doc->exportCaption($this->decision_maker);
                    $doc->exportCaption($this->sum_time);
                    $doc->exportCaption($this->phone_extra);
                    $doc->exportCaption($this->mobile_extra);
                    $doc->exportCaption($this->gender);
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
                        $doc->exportField($this->contactid);
                        $doc->exportField($this->contact_no);
                        $doc->exportField($this->parentid);
                        $doc->exportField($this->salutation);
                        $doc->exportField($this->firstname);
                        $doc->exportField($this->lastname);
                        $doc->exportField($this->_email);
                        $doc->exportField($this->phone);
                        $doc->exportField($this->mobile);
                        $doc->exportField($this->reportsto);
                        $doc->exportField($this->training);
                        $doc->exportField($this->usertype);
                        $doc->exportField($this->contacttype);
                        $doc->exportField($this->otheremail);
                        $doc->exportField($this->donotcall);
                        $doc->exportField($this->emailoptout);
                        $doc->exportField($this->imagename);
                        $doc->exportField($this->isconvertedfromlead);
                        $doc->exportField($this->verification);
                        $doc->exportField($this->secondary_email);
                        $doc->exportField($this->notifilanguage);
                        $doc->exportField($this->contactstatus);
                        $doc->exportField($this->dav_status);
                        $doc->exportField($this->jobtitle);
                        $doc->exportField($this->decision_maker);
                        $doc->exportField($this->sum_time);
                        $doc->exportField($this->phone_extra);
                        $doc->exportField($this->mobile_extra);
                        $doc->exportField($this->approvals);
                        $doc->exportField($this->gender);
                    } else {
                        $doc->exportField($this->contactid);
                        $doc->exportField($this->contact_no);
                        $doc->exportField($this->parentid);
                        $doc->exportField($this->salutation);
                        $doc->exportField($this->firstname);
                        $doc->exportField($this->lastname);
                        $doc->exportField($this->_email);
                        $doc->exportField($this->phone);
                        $doc->exportField($this->mobile);
                        $doc->exportField($this->reportsto);
                        $doc->exportField($this->training);
                        $doc->exportField($this->usertype);
                        $doc->exportField($this->contacttype);
                        $doc->exportField($this->otheremail);
                        $doc->exportField($this->donotcall);
                        $doc->exportField($this->emailoptout);
                        $doc->exportField($this->isconvertedfromlead);
                        $doc->exportField($this->secondary_email);
                        $doc->exportField($this->notifilanguage);
                        $doc->exportField($this->contactstatus);
                        $doc->exportField($this->dav_status);
                        $doc->exportField($this->jobtitle);
                        $doc->exportField($this->decision_maker);
                        $doc->exportField($this->sum_time);
                        $doc->exportField($this->phone_extra);
                        $doc->exportField($this->mobile_extra);
                        $doc->exportField($this->gender);
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
