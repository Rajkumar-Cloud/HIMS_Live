<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_pharmacy_movement_item
 */
class ViewPharmacyMovementItem extends DbTable
{
    protected $SqlFrom = "";
    protected $SqlSelect = null;
    protected $SqlSelectList = null;
    protected $SqlWhere = "";
    protected $SqlGroupBy = "";
    protected $SqlHaving = "";
    protected $SqlOrderBy = "";
    public $UseSessionForListSql = true;
    public $UseCustomTemplate = false; // Use custom template

    // Column CSS classes
    public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
    public $RightColumnClass = "col-sm-10";
    public $OffsetColumnClass = "col-sm-10 offset-sm-2";
    public $TableLeftColumnClass = "w-col-2";

    // Export
    public $ExportDoc;

    // Fields
    public $ProductFrom;
    public $Quantity;
    public $FreeQty;
    public $IQ;
    public $MRQ;
    public $BRCODE;
    public $OPNO;
    public $IPNO;
    public $PatientBILLNO;
    public $BILLDT;
    public $GRNNO;
    public $DT;
    public $Customername;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $BILLNO;
    public $prc;
    public $PrName;
    public $BatchNo;
    public $ExpDate;
    public $MFRCODE;
    public $hsn;
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
        $this->TableVar = 'view_pharmacy_movement_item';
        $this->TableName = 'view_pharmacy_movement_item';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_pharmacy_movement_item`";
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

        // ProductFrom
        $this->ProductFrom = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_ProductFrom', 'ProductFrom', '`ProductFrom`', '`ProductFrom`', 200, 11, -1, false, '`ProductFrom`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProductFrom->Sortable = true; // Allow sort
        $this->Fields['ProductFrom'] = &$this->ProductFrom;

        // Quantity
        $this->Quantity = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_Quantity', 'Quantity', '`Quantity`', '`Quantity`', 200, 11, -1, false, '`Quantity`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Quantity->Sortable = true; // Allow sort
        $this->Fields['Quantity'] = &$this->Quantity;

        // FreeQty
        $this->FreeQty = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_FreeQty', 'FreeQty', '`FreeQty`', '`FreeQty`', 200, 11, -1, false, '`FreeQty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FreeQty->Sortable = true; // Allow sort
        $this->Fields['FreeQty'] = &$this->FreeQty;

        // IQ
        $this->IQ = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_IQ', 'IQ', '`IQ`', '`IQ`', 200, 14, -1, false, '`IQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IQ->Sortable = true; // Allow sort
        $this->Fields['IQ'] = &$this->IQ;

        // MRQ
        $this->MRQ = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_MRQ', 'MRQ', '`MRQ`', '`MRQ`', 200, 14, -1, false, '`MRQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MRQ->Sortable = true; // Allow sort
        $this->Fields['MRQ'] = &$this->MRQ;

        // BRCODE
        $this->BRCODE = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 200, 11, -1, false, '`BRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BRCODE->Sortable = true; // Allow sort
        $this->Fields['BRCODE'] = &$this->BRCODE;

        // OPNO
        $this->OPNO = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_OPNO', 'OPNO', '`OPNO`', '`OPNO`', 200, 45, -1, false, '`OPNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OPNO->Sortable = true; // Allow sort
        $this->Fields['OPNO'] = &$this->OPNO;

        // IPNO
        $this->IPNO = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_IPNO', 'IPNO', '`IPNO`', '`IPNO`', 200, 45, -1, false, '`IPNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IPNO->Sortable = true; // Allow sort
        $this->Fields['IPNO'] = &$this->IPNO;

        // PatientBILLNO
        $this->PatientBILLNO = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_PatientBILLNO', 'PatientBILLNO', '`PatientBILLNO`', '`PatientBILLNO`', 200, 50, -1, false, '`PatientBILLNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientBILLNO->Sortable = true; // Allow sort
        $this->Fields['PatientBILLNO'] = &$this->PatientBILLNO;

        // BILLDT
        $this->BILLDT = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_BILLDT', 'BILLDT', '`BILLDT`', '`BILLDT`', 200, 19, -1, false, '`BILLDT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BILLDT->Sortable = true; // Allow sort
        $this->Fields['BILLDT'] = &$this->BILLDT;

        // GRNNO
        $this->GRNNO = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_GRNNO', 'GRNNO', '`GRNNO`', '`GRNNO`', 200, 45, -1, false, '`GRNNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GRNNO->Sortable = true; // Allow sort
        $this->Fields['GRNNO'] = &$this->GRNNO;

        // DT
        $this->DT = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_DT', 'DT', '`DT`', '`DT`', 200, 19, -1, false, '`DT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DT->Sortable = true; // Allow sort
        $this->Fields['DT'] = &$this->DT;

        // Customername
        $this->Customername = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_Customername', 'Customername', '`Customername`', '`Customername`', 200, 45, -1, false, '`Customername`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Customername->Sortable = true; // Allow sort
        $this->Fields['Customername'] = &$this->Customername;

        // createdby
        $this->createdby = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, 45, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, 45, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // BILLNO
        $this->BILLNO = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_BILLNO', 'BILLNO', '`BILLNO`', '`BILLNO`', 200, 45, -1, false, '`BILLNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BILLNO->Sortable = true; // Allow sort
        $this->Fields['BILLNO'] = &$this->BILLNO;

        // prc
        $this->prc = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_prc', 'prc', '`prc`', '`prc`', 200, 9, -1, false, '`prc`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->prc->Sortable = true; // Allow sort
        $this->Fields['prc'] = &$this->prc;

        // PrName
        $this->PrName = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_PrName', 'PrName', '`PrName`', '`PrName`', 200, 100, -1, false, '`PrName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PrName->Sortable = true; // Allow sort
        $this->Fields['PrName'] = &$this->PrName;

        // BatchNo
        $this->BatchNo = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_BatchNo', 'BatchNo', '`BatchNo`', '`BatchNo`', 200, 45, -1, false, '`BatchNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BatchNo->Sortable = true; // Allow sort
        $this->Fields['BatchNo'] = &$this->BatchNo;

        // ExpDate
        $this->ExpDate = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_ExpDate', 'ExpDate', '`ExpDate`', CastDateFieldForLike("`ExpDate`", 0, "DB"), 135, 19, 0, false, '`ExpDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ExpDate->Sortable = true; // Allow sort
        $this->ExpDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['ExpDate'] = &$this->ExpDate;

        // MFRCODE
        $this->MFRCODE = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_MFRCODE', 'MFRCODE', '`MFRCODE`', '`MFRCODE`', 200, 45, -1, false, '`MFRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MFRCODE->Sortable = true; // Allow sort
        $this->Fields['MFRCODE'] = &$this->MFRCODE;

        // hsn
        $this->hsn = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_hsn', 'hsn', '`hsn`', '`hsn`', 200, 45, -1, false, '`hsn`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->hsn->Sortable = true; // Allow sort
        $this->Fields['hsn'] = &$this->hsn;

        // HospID
        $this->HospID = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_pharmacy_movement_item`";
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
            $sql = $sql->resetQueryPart("orderBy")->getSQL();
        }
        $pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';
        // Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
        if (
            ($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
            preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) &&
            !preg_match('/^\s*select\s+distinct\s+/i', $sql) && !preg_match('/\s+order\s+by\s+/i', $sql)
        ) {
            $sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
        } else {
            $sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
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
        $this->ProductFrom->DbValue = $row['ProductFrom'];
        $this->Quantity->DbValue = $row['Quantity'];
        $this->FreeQty->DbValue = $row['FreeQty'];
        $this->IQ->DbValue = $row['IQ'];
        $this->MRQ->DbValue = $row['MRQ'];
        $this->BRCODE->DbValue = $row['BRCODE'];
        $this->OPNO->DbValue = $row['OPNO'];
        $this->IPNO->DbValue = $row['IPNO'];
        $this->PatientBILLNO->DbValue = $row['PatientBILLNO'];
        $this->BILLDT->DbValue = $row['BILLDT'];
        $this->GRNNO->DbValue = $row['GRNNO'];
        $this->DT->DbValue = $row['DT'];
        $this->Customername->DbValue = $row['Customername'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->BILLNO->DbValue = $row['BILLNO'];
        $this->prc->DbValue = $row['prc'];
        $this->PrName->DbValue = $row['PrName'];
        $this->BatchNo->DbValue = $row['BatchNo'];
        $this->ExpDate->DbValue = $row['ExpDate'];
        $this->MFRCODE->DbValue = $row['MFRCODE'];
        $this->hsn->DbValue = $row['hsn'];
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

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
        return $keyFilter;
    }

    // Return page URL
    public function getReturnUrl()
    {
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if (ReferUrl() != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login") { // Referer not same page or login page
            $_SESSION[$name] = ReferUrl(); // Save to Session
        }
        if (@$_SESSION[$name] != "") {
            return $_SESSION[$name];
        } else {
            return GetUrl("ViewPharmacyMovementItemList");
        }
    }

    public function setReturnUrl($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
    }

    // Get modal caption
    public function getModalCaption($pageName)
    {
        global $Language;
        if ($pageName == "ViewPharmacyMovementItemView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewPharmacyMovementItemEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewPharmacyMovementItemAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewPharmacyMovementItemList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewPharmacyMovementItemView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewPharmacyMovementItemView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewPharmacyMovementItemAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewPharmacyMovementItemAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewPharmacyMovementItemEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewPharmacyMovementItemAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewPharmacyMovementItemDelete", $this->getUrlParm());
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
        $this->ProductFrom->setDbValue($row['ProductFrom']);
        $this->Quantity->setDbValue($row['Quantity']);
        $this->FreeQty->setDbValue($row['FreeQty']);
        $this->IQ->setDbValue($row['IQ']);
        $this->MRQ->setDbValue($row['MRQ']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->OPNO->setDbValue($row['OPNO']);
        $this->IPNO->setDbValue($row['IPNO']);
        $this->PatientBILLNO->setDbValue($row['PatientBILLNO']);
        $this->BILLDT->setDbValue($row['BILLDT']);
        $this->GRNNO->setDbValue($row['GRNNO']);
        $this->DT->setDbValue($row['DT']);
        $this->Customername->setDbValue($row['Customername']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->BILLNO->setDbValue($row['BILLNO']);
        $this->prc->setDbValue($row['prc']);
        $this->PrName->setDbValue($row['PrName']);
        $this->BatchNo->setDbValue($row['BatchNo']);
        $this->ExpDate->setDbValue($row['ExpDate']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->hsn->setDbValue($row['hsn']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // ProductFrom

        // Quantity

        // FreeQty

        // IQ

        // MRQ

        // BRCODE

        // OPNO

        // IPNO

        // PatientBILLNO

        // BILLDT

        // GRNNO

        // DT

        // Customername

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // BILLNO

        // prc

        // PrName

        // BatchNo

        // ExpDate

        // MFRCODE

        // hsn

        // HospID

        // ProductFrom
        $this->ProductFrom->ViewValue = $this->ProductFrom->CurrentValue;
        $this->ProductFrom->ViewCustomAttributes = "";

        // Quantity
        $this->Quantity->ViewValue = $this->Quantity->CurrentValue;
        $this->Quantity->ViewCustomAttributes = "";

        // FreeQty
        $this->FreeQty->ViewValue = $this->FreeQty->CurrentValue;
        $this->FreeQty->ViewCustomAttributes = "";

        // IQ
        $this->IQ->ViewValue = $this->IQ->CurrentValue;
        $this->IQ->ViewCustomAttributes = "";

        // MRQ
        $this->MRQ->ViewValue = $this->MRQ->CurrentValue;
        $this->MRQ->ViewCustomAttributes = "";

        // BRCODE
        $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
        $this->BRCODE->ViewCustomAttributes = "";

        // OPNO
        $this->OPNO->ViewValue = $this->OPNO->CurrentValue;
        $this->OPNO->ViewCustomAttributes = "";

        // IPNO
        $this->IPNO->ViewValue = $this->IPNO->CurrentValue;
        $this->IPNO->ViewCustomAttributes = "";

        // PatientBILLNO
        $this->PatientBILLNO->ViewValue = $this->PatientBILLNO->CurrentValue;
        $this->PatientBILLNO->ViewCustomAttributes = "";

        // BILLDT
        $this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
        $this->BILLDT->ViewCustomAttributes = "";

        // GRNNO
        $this->GRNNO->ViewValue = $this->GRNNO->CurrentValue;
        $this->GRNNO->ViewCustomAttributes = "";

        // DT
        $this->DT->ViewValue = $this->DT->CurrentValue;
        $this->DT->ViewCustomAttributes = "";

        // Customername
        $this->Customername->ViewValue = $this->Customername->CurrentValue;
        $this->Customername->ViewCustomAttributes = "";

        // createdby
        $this->createdby->ViewValue = $this->createdby->CurrentValue;
        $this->createdby->ViewCustomAttributes = "";

        // createddatetime
        $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
        $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
        $this->createddatetime->ViewCustomAttributes = "";

        // modifiedby
        $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->ViewCustomAttributes = "";

        // modifieddatetime
        $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
        $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
        $this->modifieddatetime->ViewCustomAttributes = "";

        // BILLNO
        $this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
        $this->BILLNO->ViewCustomAttributes = "";

        // prc
        $this->prc->ViewValue = $this->prc->CurrentValue;
        $this->prc->ViewCustomAttributes = "";

        // PrName
        $this->PrName->ViewValue = $this->PrName->CurrentValue;
        $this->PrName->ViewCustomAttributes = "";

        // BatchNo
        $this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
        $this->BatchNo->ViewCustomAttributes = "";

        // ExpDate
        $this->ExpDate->ViewValue = $this->ExpDate->CurrentValue;
        $this->ExpDate->ViewValue = FormatDateTime($this->ExpDate->ViewValue, 0);
        $this->ExpDate->ViewCustomAttributes = "";

        // MFRCODE
        $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
        $this->MFRCODE->ViewCustomAttributes = "";

        // hsn
        $this->hsn->ViewValue = $this->hsn->CurrentValue;
        $this->hsn->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // ProductFrom
        $this->ProductFrom->LinkCustomAttributes = "";
        $this->ProductFrom->HrefValue = "";
        $this->ProductFrom->TooltipValue = "";

        // Quantity
        $this->Quantity->LinkCustomAttributes = "";
        $this->Quantity->HrefValue = "";
        $this->Quantity->TooltipValue = "";

        // FreeQty
        $this->FreeQty->LinkCustomAttributes = "";
        $this->FreeQty->HrefValue = "";
        $this->FreeQty->TooltipValue = "";

        // IQ
        $this->IQ->LinkCustomAttributes = "";
        $this->IQ->HrefValue = "";
        $this->IQ->TooltipValue = "";

        // MRQ
        $this->MRQ->LinkCustomAttributes = "";
        $this->MRQ->HrefValue = "";
        $this->MRQ->TooltipValue = "";

        // BRCODE
        $this->BRCODE->LinkCustomAttributes = "";
        $this->BRCODE->HrefValue = "";
        $this->BRCODE->TooltipValue = "";

        // OPNO
        $this->OPNO->LinkCustomAttributes = "";
        $this->OPNO->HrefValue = "";
        $this->OPNO->TooltipValue = "";

        // IPNO
        $this->IPNO->LinkCustomAttributes = "";
        $this->IPNO->HrefValue = "";
        $this->IPNO->TooltipValue = "";

        // PatientBILLNO
        $this->PatientBILLNO->LinkCustomAttributes = "";
        $this->PatientBILLNO->HrefValue = "";
        $this->PatientBILLNO->TooltipValue = "";

        // BILLDT
        $this->BILLDT->LinkCustomAttributes = "";
        $this->BILLDT->HrefValue = "";
        $this->BILLDT->TooltipValue = "";

        // GRNNO
        $this->GRNNO->LinkCustomAttributes = "";
        $this->GRNNO->HrefValue = "";
        $this->GRNNO->TooltipValue = "";

        // DT
        $this->DT->LinkCustomAttributes = "";
        $this->DT->HrefValue = "";
        $this->DT->TooltipValue = "";

        // Customername
        $this->Customername->LinkCustomAttributes = "";
        $this->Customername->HrefValue = "";
        $this->Customername->TooltipValue = "";

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

        // BILLNO
        $this->BILLNO->LinkCustomAttributes = "";
        $this->BILLNO->HrefValue = "";
        $this->BILLNO->TooltipValue = "";

        // prc
        $this->prc->LinkCustomAttributes = "";
        $this->prc->HrefValue = "";
        $this->prc->TooltipValue = "";

        // PrName
        $this->PrName->LinkCustomAttributes = "";
        $this->PrName->HrefValue = "";
        $this->PrName->TooltipValue = "";

        // BatchNo
        $this->BatchNo->LinkCustomAttributes = "";
        $this->BatchNo->HrefValue = "";
        $this->BatchNo->TooltipValue = "";

        // ExpDate
        $this->ExpDate->LinkCustomAttributes = "";
        $this->ExpDate->HrefValue = "";
        $this->ExpDate->TooltipValue = "";

        // MFRCODE
        $this->MFRCODE->LinkCustomAttributes = "";
        $this->MFRCODE->HrefValue = "";
        $this->MFRCODE->TooltipValue = "";

        // hsn
        $this->hsn->LinkCustomAttributes = "";
        $this->hsn->HrefValue = "";
        $this->hsn->TooltipValue = "";

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

        // ProductFrom
        $this->ProductFrom->EditAttrs["class"] = "form-control";
        $this->ProductFrom->EditCustomAttributes = "";
        if (!$this->ProductFrom->Raw) {
            $this->ProductFrom->CurrentValue = HtmlDecode($this->ProductFrom->CurrentValue);
        }
        $this->ProductFrom->EditValue = $this->ProductFrom->CurrentValue;
        $this->ProductFrom->PlaceHolder = RemoveHtml($this->ProductFrom->caption());

        // Quantity
        $this->Quantity->EditAttrs["class"] = "form-control";
        $this->Quantity->EditCustomAttributes = "";
        if (!$this->Quantity->Raw) {
            $this->Quantity->CurrentValue = HtmlDecode($this->Quantity->CurrentValue);
        }
        $this->Quantity->EditValue = $this->Quantity->CurrentValue;
        $this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

        // FreeQty
        $this->FreeQty->EditAttrs["class"] = "form-control";
        $this->FreeQty->EditCustomAttributes = "";
        if (!$this->FreeQty->Raw) {
            $this->FreeQty->CurrentValue = HtmlDecode($this->FreeQty->CurrentValue);
        }
        $this->FreeQty->EditValue = $this->FreeQty->CurrentValue;
        $this->FreeQty->PlaceHolder = RemoveHtml($this->FreeQty->caption());

        // IQ
        $this->IQ->EditAttrs["class"] = "form-control";
        $this->IQ->EditCustomAttributes = "";
        if (!$this->IQ->Raw) {
            $this->IQ->CurrentValue = HtmlDecode($this->IQ->CurrentValue);
        }
        $this->IQ->EditValue = $this->IQ->CurrentValue;
        $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());

        // MRQ
        $this->MRQ->EditAttrs["class"] = "form-control";
        $this->MRQ->EditCustomAttributes = "";
        if (!$this->MRQ->Raw) {
            $this->MRQ->CurrentValue = HtmlDecode($this->MRQ->CurrentValue);
        }
        $this->MRQ->EditValue = $this->MRQ->CurrentValue;
        $this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());

        // BRCODE
        $this->BRCODE->EditAttrs["class"] = "form-control";
        $this->BRCODE->EditCustomAttributes = "";
        if (!$this->BRCODE->Raw) {
            $this->BRCODE->CurrentValue = HtmlDecode($this->BRCODE->CurrentValue);
        }
        $this->BRCODE->EditValue = $this->BRCODE->CurrentValue;
        $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

        // OPNO
        $this->OPNO->EditAttrs["class"] = "form-control";
        $this->OPNO->EditCustomAttributes = "";
        if (!$this->OPNO->Raw) {
            $this->OPNO->CurrentValue = HtmlDecode($this->OPNO->CurrentValue);
        }
        $this->OPNO->EditValue = $this->OPNO->CurrentValue;
        $this->OPNO->PlaceHolder = RemoveHtml($this->OPNO->caption());

        // IPNO
        $this->IPNO->EditAttrs["class"] = "form-control";
        $this->IPNO->EditCustomAttributes = "";
        if (!$this->IPNO->Raw) {
            $this->IPNO->CurrentValue = HtmlDecode($this->IPNO->CurrentValue);
        }
        $this->IPNO->EditValue = $this->IPNO->CurrentValue;
        $this->IPNO->PlaceHolder = RemoveHtml($this->IPNO->caption());

        // PatientBILLNO
        $this->PatientBILLNO->EditAttrs["class"] = "form-control";
        $this->PatientBILLNO->EditCustomAttributes = "";
        if (!$this->PatientBILLNO->Raw) {
            $this->PatientBILLNO->CurrentValue = HtmlDecode($this->PatientBILLNO->CurrentValue);
        }
        $this->PatientBILLNO->EditValue = $this->PatientBILLNO->CurrentValue;
        $this->PatientBILLNO->PlaceHolder = RemoveHtml($this->PatientBILLNO->caption());

        // BILLDT
        $this->BILLDT->EditAttrs["class"] = "form-control";
        $this->BILLDT->EditCustomAttributes = "";
        if (!$this->BILLDT->Raw) {
            $this->BILLDT->CurrentValue = HtmlDecode($this->BILLDT->CurrentValue);
        }
        $this->BILLDT->EditValue = $this->BILLDT->CurrentValue;
        $this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

        // GRNNO
        $this->GRNNO->EditAttrs["class"] = "form-control";
        $this->GRNNO->EditCustomAttributes = "";
        if (!$this->GRNNO->Raw) {
            $this->GRNNO->CurrentValue = HtmlDecode($this->GRNNO->CurrentValue);
        }
        $this->GRNNO->EditValue = $this->GRNNO->CurrentValue;
        $this->GRNNO->PlaceHolder = RemoveHtml($this->GRNNO->caption());

        // DT
        $this->DT->EditAttrs["class"] = "form-control";
        $this->DT->EditCustomAttributes = "";
        if (!$this->DT->Raw) {
            $this->DT->CurrentValue = HtmlDecode($this->DT->CurrentValue);
        }
        $this->DT->EditValue = $this->DT->CurrentValue;
        $this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

        // Customername
        $this->Customername->EditAttrs["class"] = "form-control";
        $this->Customername->EditCustomAttributes = "";
        if (!$this->Customername->Raw) {
            $this->Customername->CurrentValue = HtmlDecode($this->Customername->CurrentValue);
        }
        $this->Customername->EditValue = $this->Customername->CurrentValue;
        $this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

        // createdby
        $this->createdby->EditAttrs["class"] = "form-control";
        $this->createdby->EditCustomAttributes = "";
        if (!$this->createdby->Raw) {
            $this->createdby->CurrentValue = HtmlDecode($this->createdby->CurrentValue);
        }
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
        if (!$this->modifiedby->Raw) {
            $this->modifiedby->CurrentValue = HtmlDecode($this->modifiedby->CurrentValue);
        }
        $this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

        // modifieddatetime
        $this->modifieddatetime->EditAttrs["class"] = "form-control";
        $this->modifieddatetime->EditCustomAttributes = "";
        $this->modifieddatetime->EditValue = FormatDateTime($this->modifieddatetime->CurrentValue, 8);
        $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

        // BILLNO
        $this->BILLNO->EditAttrs["class"] = "form-control";
        $this->BILLNO->EditCustomAttributes = "";
        if (!$this->BILLNO->Raw) {
            $this->BILLNO->CurrentValue = HtmlDecode($this->BILLNO->CurrentValue);
        }
        $this->BILLNO->EditValue = $this->BILLNO->CurrentValue;
        $this->BILLNO->PlaceHolder = RemoveHtml($this->BILLNO->caption());

        // prc
        $this->prc->EditAttrs["class"] = "form-control";
        $this->prc->EditCustomAttributes = "";
        if (!$this->prc->Raw) {
            $this->prc->CurrentValue = HtmlDecode($this->prc->CurrentValue);
        }
        $this->prc->EditValue = $this->prc->CurrentValue;
        $this->prc->PlaceHolder = RemoveHtml($this->prc->caption());

        // PrName
        $this->PrName->EditAttrs["class"] = "form-control";
        $this->PrName->EditCustomAttributes = "";
        if (!$this->PrName->Raw) {
            $this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
        }
        $this->PrName->EditValue = $this->PrName->CurrentValue;
        $this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

        // BatchNo
        $this->BatchNo->EditAttrs["class"] = "form-control";
        $this->BatchNo->EditCustomAttributes = "";
        if (!$this->BatchNo->Raw) {
            $this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
        }
        $this->BatchNo->EditValue = $this->BatchNo->CurrentValue;
        $this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

        // ExpDate
        $this->ExpDate->EditAttrs["class"] = "form-control";
        $this->ExpDate->EditCustomAttributes = "";
        $this->ExpDate->EditValue = FormatDateTime($this->ExpDate->CurrentValue, 8);
        $this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

        // MFRCODE
        $this->MFRCODE->EditAttrs["class"] = "form-control";
        $this->MFRCODE->EditCustomAttributes = "";
        if (!$this->MFRCODE->Raw) {
            $this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
        }
        $this->MFRCODE->EditValue = $this->MFRCODE->CurrentValue;
        $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

        // hsn
        $this->hsn->EditAttrs["class"] = "form-control";
        $this->hsn->EditCustomAttributes = "";
        if (!$this->hsn->Raw) {
            $this->hsn->CurrentValue = HtmlDecode($this->hsn->CurrentValue);
        }
        $this->hsn->EditValue = $this->hsn->CurrentValue;
        $this->hsn->PlaceHolder = RemoveHtml($this->hsn->caption());

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
                    $doc->exportCaption($this->ProductFrom);
                    $doc->exportCaption($this->Quantity);
                    $doc->exportCaption($this->FreeQty);
                    $doc->exportCaption($this->IQ);
                    $doc->exportCaption($this->MRQ);
                    $doc->exportCaption($this->BRCODE);
                    $doc->exportCaption($this->OPNO);
                    $doc->exportCaption($this->IPNO);
                    $doc->exportCaption($this->PatientBILLNO);
                    $doc->exportCaption($this->BILLDT);
                    $doc->exportCaption($this->GRNNO);
                    $doc->exportCaption($this->DT);
                    $doc->exportCaption($this->Customername);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->BILLNO);
                    $doc->exportCaption($this->prc);
                    $doc->exportCaption($this->PrName);
                    $doc->exportCaption($this->BatchNo);
                    $doc->exportCaption($this->ExpDate);
                    $doc->exportCaption($this->MFRCODE);
                    $doc->exportCaption($this->hsn);
                    $doc->exportCaption($this->HospID);
                } else {
                    $doc->exportCaption($this->ProductFrom);
                    $doc->exportCaption($this->Quantity);
                    $doc->exportCaption($this->FreeQty);
                    $doc->exportCaption($this->IQ);
                    $doc->exportCaption($this->MRQ);
                    $doc->exportCaption($this->BRCODE);
                    $doc->exportCaption($this->OPNO);
                    $doc->exportCaption($this->IPNO);
                    $doc->exportCaption($this->PatientBILLNO);
                    $doc->exportCaption($this->BILLDT);
                    $doc->exportCaption($this->GRNNO);
                    $doc->exportCaption($this->DT);
                    $doc->exportCaption($this->Customername);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->BILLNO);
                    $doc->exportCaption($this->prc);
                    $doc->exportCaption($this->PrName);
                    $doc->exportCaption($this->BatchNo);
                    $doc->exportCaption($this->ExpDate);
                    $doc->exportCaption($this->MFRCODE);
                    $doc->exportCaption($this->hsn);
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
                        $doc->exportField($this->ProductFrom);
                        $doc->exportField($this->Quantity);
                        $doc->exportField($this->FreeQty);
                        $doc->exportField($this->IQ);
                        $doc->exportField($this->MRQ);
                        $doc->exportField($this->BRCODE);
                        $doc->exportField($this->OPNO);
                        $doc->exportField($this->IPNO);
                        $doc->exportField($this->PatientBILLNO);
                        $doc->exportField($this->BILLDT);
                        $doc->exportField($this->GRNNO);
                        $doc->exportField($this->DT);
                        $doc->exportField($this->Customername);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->BILLNO);
                        $doc->exportField($this->prc);
                        $doc->exportField($this->PrName);
                        $doc->exportField($this->BatchNo);
                        $doc->exportField($this->ExpDate);
                        $doc->exportField($this->MFRCODE);
                        $doc->exportField($this->hsn);
                        $doc->exportField($this->HospID);
                    } else {
                        $doc->exportField($this->ProductFrom);
                        $doc->exportField($this->Quantity);
                        $doc->exportField($this->FreeQty);
                        $doc->exportField($this->IQ);
                        $doc->exportField($this->MRQ);
                        $doc->exportField($this->BRCODE);
                        $doc->exportField($this->OPNO);
                        $doc->exportField($this->IPNO);
                        $doc->exportField($this->PatientBILLNO);
                        $doc->exportField($this->BILLDT);
                        $doc->exportField($this->GRNNO);
                        $doc->exportField($this->DT);
                        $doc->exportField($this->Customername);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->BILLNO);
                        $doc->exportField($this->prc);
                        $doc->exportField($this->PrName);
                        $doc->exportField($this->BatchNo);
                        $doc->exportField($this->ExpDate);
                        $doc->exportField($this->MFRCODE);
                        $doc->exportField($this->hsn);
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
