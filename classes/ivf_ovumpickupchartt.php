<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for ivf_ovumpickupchartt
 */
class ivf_ovumpickupchartt extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

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
	public $SEX;
	public $Religion;
	public $Address;
	public $IdentificationMark;
	public $DoublewitnessName1;
	public $DoublewitnessName2;
	public $Chiefcomplaints;
	public $MenstrualHistory;
	public $ObstetricHistory;
	public $MedicalHistory;
	public $SurgicalHistory;
	public $Generalexaminationpallor;
	public $PR;
	public $CVS;
	public $PA;
	public $PROVISIONALDIAGNOSIS;
	public $Investigations;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'ivf_ovumpickupchartt';
		$this->TableName = 'ivf_ovumpickupchartt';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`ivf_ovumpickupchartt`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// RIDNO
		$this->RIDNO = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, -1, FALSE, '`RIDNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNO->IsForeignKey = TRUE; // Foreign key field
		$this->RIDNO->Sortable = TRUE; // Allow sort
		$this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNO'] = &$this->RIDNO;

		// Name
		$this->Name = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_Name', 'Name', '`Name`', '`Name`', 200, -1, FALSE, '`Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Name->IsForeignKey = TRUE; // Foreign key field
		$this->Name->Sortable = TRUE; // Allow sort
		$this->fields['Name'] = &$this->Name;

		// Age
		$this->Age = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_Age', 'Age', '`Age`', '`Age`', 200, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// SEX
		$this->SEX = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_SEX', 'SEX', '`SEX`', '`SEX`', 200, -1, FALSE, '`SEX`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SEX->Sortable = TRUE; // Allow sort
		$this->fields['SEX'] = &$this->SEX;

		// Religion
		$this->Religion = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_Religion', 'Religion', '`Religion`', '`Religion`', 200, -1, FALSE, '`Religion`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Religion->Sortable = TRUE; // Allow sort
		$this->fields['Religion'] = &$this->Religion;

		// Address
		$this->Address = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_Address', 'Address', '`Address`', '`Address`', 200, -1, FALSE, '`Address`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Address->Sortable = TRUE; // Allow sort
		$this->fields['Address'] = &$this->Address;

		// IdentificationMark
		$this->IdentificationMark = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_IdentificationMark', 'IdentificationMark', '`IdentificationMark`', '`IdentificationMark`', 200, -1, FALSE, '`IdentificationMark`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IdentificationMark->Sortable = TRUE; // Allow sort
		$this->fields['IdentificationMark'] = &$this->IdentificationMark;

		// DoublewitnessName1
		$this->DoublewitnessName1 = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_DoublewitnessName1', 'DoublewitnessName1', '`DoublewitnessName1`', '`DoublewitnessName1`', 200, -1, FALSE, '`DoublewitnessName1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DoublewitnessName1->Sortable = TRUE; // Allow sort
		$this->fields['DoublewitnessName1'] = &$this->DoublewitnessName1;

		// DoublewitnessName2
		$this->DoublewitnessName2 = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_DoublewitnessName2', 'DoublewitnessName2', '`DoublewitnessName2`', '`DoublewitnessName2`', 200, -1, FALSE, '`DoublewitnessName2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DoublewitnessName2->Sortable = TRUE; // Allow sort
		$this->fields['DoublewitnessName2'] = &$this->DoublewitnessName2;

		// Chiefcomplaints
		$this->Chiefcomplaints = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_Chiefcomplaints', 'Chiefcomplaints', '`Chiefcomplaints`', '`Chiefcomplaints`', 200, -1, FALSE, '`Chiefcomplaints`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Chiefcomplaints->Sortable = TRUE; // Allow sort
		$this->fields['Chiefcomplaints'] = &$this->Chiefcomplaints;

		// MenstrualHistory
		$this->MenstrualHistory = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_MenstrualHistory', 'MenstrualHistory', '`MenstrualHistory`', '`MenstrualHistory`', 200, -1, FALSE, '`MenstrualHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MenstrualHistory->Sortable = TRUE; // Allow sort
		$this->fields['MenstrualHistory'] = &$this->MenstrualHistory;

		// ObstetricHistory
		$this->ObstetricHistory = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_ObstetricHistory', 'ObstetricHistory', '`ObstetricHistory`', '`ObstetricHistory`', 200, -1, FALSE, '`ObstetricHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ObstetricHistory->Sortable = TRUE; // Allow sort
		$this->fields['ObstetricHistory'] = &$this->ObstetricHistory;

		// MedicalHistory
		$this->MedicalHistory = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_MedicalHistory', 'MedicalHistory', '`MedicalHistory`', '`MedicalHistory`', 200, -1, FALSE, '`MedicalHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MedicalHistory->Sortable = TRUE; // Allow sort
		$this->fields['MedicalHistory'] = &$this->MedicalHistory;

		// SurgicalHistory
		$this->SurgicalHistory = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_SurgicalHistory', 'SurgicalHistory', '`SurgicalHistory`', '`SurgicalHistory`', 200, -1, FALSE, '`SurgicalHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SurgicalHistory->Sortable = TRUE; // Allow sort
		$this->fields['SurgicalHistory'] = &$this->SurgicalHistory;

		// Generalexaminationpallor
		$this->Generalexaminationpallor = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_Generalexaminationpallor', 'Generalexaminationpallor', '`Generalexaminationpallor`', '`Generalexaminationpallor`', 200, -1, FALSE, '`Generalexaminationpallor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Generalexaminationpallor->Sortable = TRUE; // Allow sort
		$this->fields['Generalexaminationpallor'] = &$this->Generalexaminationpallor;

		// PR
		$this->PR = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_PR', 'PR', '`PR`', '`PR`', 200, -1, FALSE, '`PR`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PR->Sortable = TRUE; // Allow sort
		$this->fields['PR'] = &$this->PR;

		// CVS
		$this->CVS = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_CVS', 'CVS', '`CVS`', '`CVS`', 200, -1, FALSE, '`CVS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CVS->Sortable = TRUE; // Allow sort
		$this->fields['CVS'] = &$this->CVS;

		// PA
		$this->PA = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_PA', 'PA', '`PA`', '`PA`', 200, -1, FALSE, '`PA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PA->Sortable = TRUE; // Allow sort
		$this->fields['PA'] = &$this->PA;

		// PROVISIONALDIAGNOSIS
		$this->PROVISIONALDIAGNOSIS = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_PROVISIONALDIAGNOSIS', 'PROVISIONALDIAGNOSIS', '`PROVISIONALDIAGNOSIS`', '`PROVISIONALDIAGNOSIS`', 200, -1, FALSE, '`PROVISIONALDIAGNOSIS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PROVISIONALDIAGNOSIS->Sortable = TRUE; // Allow sort
		$this->fields['PROVISIONALDIAGNOSIS'] = &$this->PROVISIONALDIAGNOSIS;

		// Investigations
		$this->Investigations = new DbField('ivf_ovumpickupchartt', 'ivf_ovumpickupchartt', 'x_Investigations', 'Investigations', '`Investigations`', '`Investigations`', 200, -1, FALSE, '`Investigations`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Investigations->Sortable = TRUE; // Allow sort
		$this->fields['Investigations'] = &$this->Investigations;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
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
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Current master table name
	public function getCurrentMasterTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_MASTER_TABLE];
	}
	public function setCurrentMasterTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_MASTER_TABLE] = $v;
	}

	// Session master WHERE clause
	public function getMasterFilter()
	{

		// Master filter
		$masterFilter = "";
		if ($this->getCurrentMasterTable() == "ivf") {
			if ($this->RIDNO->getSessionValue() <> "")
				$masterFilter .= "`id`=" . QuotedValue($this->RIDNO->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->Name->getSessionValue() <> "")
				$masterFilter .= " AND `Female`=" . QuotedValue($this->Name->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $masterFilter;
	}

	// Session detail WHERE clause
	public function getDetailFilter()
	{

		// Detail filter
		$detailFilter = "";
		if ($this->getCurrentMasterTable() == "ivf") {
			if ($this->RIDNO->getSessionValue() <> "")
				$detailFilter .= "`RIDNO`=" . QuotedValue($this->RIDNO->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->Name->getSessionValue() <> "")
				$detailFilter .= " AND `Name`=" . QuotedValue($this->Name->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_ivf()
	{
		return "`id`=@id@ AND `Female`=@Female@";
	}

	// Detail filter
	public function sqlDetailFilter_ivf()
	{
		return "`RIDNO`=@RIDNO@ AND `Name`='@Name@'";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`ivf_ovumpickupchartt`";
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
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
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
		$where = ($this->SqlWhere <> "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
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
		return ($this->SqlGroupBy <> "") ? $this->SqlGroupBy : "";
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
		return ($this->SqlHaving <> "") ? $this->SqlHaving : "";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "";
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
		$allow = USER_ID_ALLOW;
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
			case "changepwd":
			case "forgotpwd":
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

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Get record count
	public function getRecordCount($sql)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery and SELECT DISTINCT
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) && !preg_match('/^\s*select\s+distinct\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = &$this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
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
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " ($names) VALUES ($values)";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {

			// Get insert id if necessary
			$this->id->setDbValue($conn->insert_ID());
			$rs['id'] = $this->id->DbValue;
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsPrimaryKey)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('id', $rs))
				AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = &$this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->id->DbValue = $row['id'];
		$this->RIDNO->DbValue = $row['RIDNO'];
		$this->Name->DbValue = $row['Name'];
		$this->Age->DbValue = $row['Age'];
		$this->SEX->DbValue = $row['SEX'];
		$this->Religion->DbValue = $row['Religion'];
		$this->Address->DbValue = $row['Address'];
		$this->IdentificationMark->DbValue = $row['IdentificationMark'];
		$this->DoublewitnessName1->DbValue = $row['DoublewitnessName1'];
		$this->DoublewitnessName2->DbValue = $row['DoublewitnessName2'];
		$this->Chiefcomplaints->DbValue = $row['Chiefcomplaints'];
		$this->MenstrualHistory->DbValue = $row['MenstrualHistory'];
		$this->ObstetricHistory->DbValue = $row['ObstetricHistory'];
		$this->MedicalHistory->DbValue = $row['MedicalHistory'];
		$this->SurgicalHistory->DbValue = $row['SurgicalHistory'];
		$this->Generalexaminationpallor->DbValue = $row['Generalexaminationpallor'];
		$this->PR->DbValue = $row['PR'];
		$this->CVS->DbValue = $row['CVS'];
		$this->PA->DbValue = $row['PA'];
		$this->PROVISIONALDIAGNOSIS->DbValue = $row['PROVISIONALDIAGNOSIS'];
		$this->Investigations->DbValue = $row['Investigations'];
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

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('id', $row) ? $row['id'] : NULL) : $this->id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") <> "" && ReferPageName() <> CurrentPageName() && ReferPageName() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "ivf_ovumpickupcharttlist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "ivf_ovumpickupcharttview.php")
			return $Language->phrase("View");
		elseif ($pageName == "ivf_ovumpickupcharttedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "ivf_ovumpickupcharttadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "ivf_ovumpickupcharttlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("ivf_ovumpickupcharttview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("ivf_ovumpickupcharttview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "ivf_ovumpickupcharttadd.php?" . $this->getUrlParm($parm);
		else
			$url = "ivf_ovumpickupcharttadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("ivf_ovumpickupcharttedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("ivf_ovumpickupcharttadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("ivf_ovumpickupcharttdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "ivf" && !ContainsString($url, TABLE_SHOW_MASTER . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . TABLE_SHOW_MASTER . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->RIDNO->CurrentValue);
			$url .= "&fk_Female=" . urlencode($this->Name->CurrentValue);
		}
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id:" . JsonEncode($this->id->CurrentValue, "number");
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm <> "")
			$url .= $parm . "&";
		if ($this->id->CurrentValue != NULL) {
			$url .= "id=" . urlencode($this->id->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$arKeys = array();
		$arKey = array();
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
		} else {
			if (Param("id") !== NULL)
				$arKeys[] = Param("id");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
					continue;
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys()
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter <> "") $keyFilter .= " OR ";
			$this->id->CurrentValue = $key;
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = &$this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->id->setDbValue($rs->fields('id'));
		$this->RIDNO->setDbValue($rs->fields('RIDNO'));
		$this->Name->setDbValue($rs->fields('Name'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->SEX->setDbValue($rs->fields('SEX'));
		$this->Religion->setDbValue($rs->fields('Religion'));
		$this->Address->setDbValue($rs->fields('Address'));
		$this->IdentificationMark->setDbValue($rs->fields('IdentificationMark'));
		$this->DoublewitnessName1->setDbValue($rs->fields('DoublewitnessName1'));
		$this->DoublewitnessName2->setDbValue($rs->fields('DoublewitnessName2'));
		$this->Chiefcomplaints->setDbValue($rs->fields('Chiefcomplaints'));
		$this->MenstrualHistory->setDbValue($rs->fields('MenstrualHistory'));
		$this->ObstetricHistory->setDbValue($rs->fields('ObstetricHistory'));
		$this->MedicalHistory->setDbValue($rs->fields('MedicalHistory'));
		$this->SurgicalHistory->setDbValue($rs->fields('SurgicalHistory'));
		$this->Generalexaminationpallor->setDbValue($rs->fields('Generalexaminationpallor'));
		$this->PR->setDbValue($rs->fields('PR'));
		$this->CVS->setDbValue($rs->fields('CVS'));
		$this->PA->setDbValue($rs->fields('PA'));
		$this->PROVISIONALDIAGNOSIS->setDbValue($rs->fields('PROVISIONALDIAGNOSIS'));
		$this->Investigations->setDbValue($rs->fields('Investigations'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// RIDNO
		// Name
		// Age
		// SEX
		// Religion
		// Address
		// IdentificationMark
		// DoublewitnessName1
		// DoublewitnessName2
		// Chiefcomplaints
		// MenstrualHistory
		// ObstetricHistory
		// MedicalHistory
		// SurgicalHistory
		// Generalexaminationpallor
		// PR
		// CVS
		// PA
		// PROVISIONALDIAGNOSIS
		// Investigations
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

		// SEX
		$this->SEX->ViewValue = $this->SEX->CurrentValue;
		$this->SEX->ViewCustomAttributes = "";

		// Religion
		$this->Religion->ViewValue = $this->Religion->CurrentValue;
		$this->Religion->ViewCustomAttributes = "";

		// Address
		$this->Address->ViewValue = $this->Address->CurrentValue;
		$this->Address->ViewCustomAttributes = "";

		// IdentificationMark
		$this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
		$this->IdentificationMark->ViewCustomAttributes = "";

		// DoublewitnessName1
		$this->DoublewitnessName1->ViewValue = $this->DoublewitnessName1->CurrentValue;
		$this->DoublewitnessName1->ViewCustomAttributes = "";

		// DoublewitnessName2
		$this->DoublewitnessName2->ViewValue = $this->DoublewitnessName2->CurrentValue;
		$this->DoublewitnessName2->ViewCustomAttributes = "";

		// Chiefcomplaints
		$this->Chiefcomplaints->ViewValue = $this->Chiefcomplaints->CurrentValue;
		$this->Chiefcomplaints->ViewCustomAttributes = "";

		// MenstrualHistory
		$this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
		$this->MenstrualHistory->ViewCustomAttributes = "";

		// ObstetricHistory
		$this->ObstetricHistory->ViewValue = $this->ObstetricHistory->CurrentValue;
		$this->ObstetricHistory->ViewCustomAttributes = "";

		// MedicalHistory
		$this->MedicalHistory->ViewValue = $this->MedicalHistory->CurrentValue;
		$this->MedicalHistory->ViewCustomAttributes = "";

		// SurgicalHistory
		$this->SurgicalHistory->ViewValue = $this->SurgicalHistory->CurrentValue;
		$this->SurgicalHistory->ViewCustomAttributes = "";

		// Generalexaminationpallor
		$this->Generalexaminationpallor->ViewValue = $this->Generalexaminationpallor->CurrentValue;
		$this->Generalexaminationpallor->ViewCustomAttributes = "";

		// PR
		$this->PR->ViewValue = $this->PR->CurrentValue;
		$this->PR->ViewCustomAttributes = "";

		// CVS
		$this->CVS->ViewValue = $this->CVS->CurrentValue;
		$this->CVS->ViewCustomAttributes = "";

		// PA
		$this->PA->ViewValue = $this->PA->CurrentValue;
		$this->PA->ViewCustomAttributes = "";

		// PROVISIONALDIAGNOSIS
		$this->PROVISIONALDIAGNOSIS->ViewValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
		$this->PROVISIONALDIAGNOSIS->ViewCustomAttributes = "";

		// Investigations
		$this->Investigations->ViewValue = $this->Investigations->CurrentValue;
		$this->Investigations->ViewCustomAttributes = "";

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

		// SEX
		$this->SEX->LinkCustomAttributes = "";
		$this->SEX->HrefValue = "";
		$this->SEX->TooltipValue = "";

		// Religion
		$this->Religion->LinkCustomAttributes = "";
		$this->Religion->HrefValue = "";
		$this->Religion->TooltipValue = "";

		// Address
		$this->Address->LinkCustomAttributes = "";
		$this->Address->HrefValue = "";
		$this->Address->TooltipValue = "";

		// IdentificationMark
		$this->IdentificationMark->LinkCustomAttributes = "";
		$this->IdentificationMark->HrefValue = "";
		$this->IdentificationMark->TooltipValue = "";

		// DoublewitnessName1
		$this->DoublewitnessName1->LinkCustomAttributes = "";
		$this->DoublewitnessName1->HrefValue = "";
		$this->DoublewitnessName1->TooltipValue = "";

		// DoublewitnessName2
		$this->DoublewitnessName2->LinkCustomAttributes = "";
		$this->DoublewitnessName2->HrefValue = "";
		$this->DoublewitnessName2->TooltipValue = "";

		// Chiefcomplaints
		$this->Chiefcomplaints->LinkCustomAttributes = "";
		$this->Chiefcomplaints->HrefValue = "";
		$this->Chiefcomplaints->TooltipValue = "";

		// MenstrualHistory
		$this->MenstrualHistory->LinkCustomAttributes = "";
		$this->MenstrualHistory->HrefValue = "";
		$this->MenstrualHistory->TooltipValue = "";

		// ObstetricHistory
		$this->ObstetricHistory->LinkCustomAttributes = "";
		$this->ObstetricHistory->HrefValue = "";
		$this->ObstetricHistory->TooltipValue = "";

		// MedicalHistory
		$this->MedicalHistory->LinkCustomAttributes = "";
		$this->MedicalHistory->HrefValue = "";
		$this->MedicalHistory->TooltipValue = "";

		// SurgicalHistory
		$this->SurgicalHistory->LinkCustomAttributes = "";
		$this->SurgicalHistory->HrefValue = "";
		$this->SurgicalHistory->TooltipValue = "";

		// Generalexaminationpallor
		$this->Generalexaminationpallor->LinkCustomAttributes = "";
		$this->Generalexaminationpallor->HrefValue = "";
		$this->Generalexaminationpallor->TooltipValue = "";

		// PR
		$this->PR->LinkCustomAttributes = "";
		$this->PR->HrefValue = "";
		$this->PR->TooltipValue = "";

		// CVS
		$this->CVS->LinkCustomAttributes = "";
		$this->CVS->HrefValue = "";
		$this->CVS->TooltipValue = "";

		// PA
		$this->PA->LinkCustomAttributes = "";
		$this->PA->HrefValue = "";
		$this->PA->TooltipValue = "";

		// PROVISIONALDIAGNOSIS
		$this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
		$this->PROVISIONALDIAGNOSIS->HrefValue = "";
		$this->PROVISIONALDIAGNOSIS->TooltipValue = "";

		// Investigations
		$this->Investigations->LinkCustomAttributes = "";
		$this->Investigations->HrefValue = "";
		$this->Investigations->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// RIDNO
		$this->RIDNO->EditAttrs["class"] = "form-control";
		$this->RIDNO->EditCustomAttributes = "";
		if ($this->RIDNO->getSessionValue() <> "") {
			$this->RIDNO->CurrentValue = $this->RIDNO->getSessionValue();
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
		if ($this->Name->getSessionValue() <> "") {
			$this->Name->CurrentValue = $this->Name->getSessionValue();
		$this->Name->ViewValue = $this->Name->CurrentValue;
		$this->Name->ViewCustomAttributes = "";
		} else {
		if (REMOVE_XSS)
			$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
		$this->Name->EditValue = $this->Name->CurrentValue;
		$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
		}

		// Age
		$this->Age->EditAttrs["class"] = "form-control";
		$this->Age->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
		$this->Age->EditValue = $this->Age->CurrentValue;
		$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

		// SEX
		$this->SEX->EditAttrs["class"] = "form-control";
		$this->SEX->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SEX->CurrentValue = HtmlDecode($this->SEX->CurrentValue);
		$this->SEX->EditValue = $this->SEX->CurrentValue;
		$this->SEX->PlaceHolder = RemoveHtml($this->SEX->caption());

		// Religion
		$this->Religion->EditAttrs["class"] = "form-control";
		$this->Religion->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Religion->CurrentValue = HtmlDecode($this->Religion->CurrentValue);
		$this->Religion->EditValue = $this->Religion->CurrentValue;
		$this->Religion->PlaceHolder = RemoveHtml($this->Religion->caption());

		// Address
		$this->Address->EditAttrs["class"] = "form-control";
		$this->Address->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Address->CurrentValue = HtmlDecode($this->Address->CurrentValue);
		$this->Address->EditValue = $this->Address->CurrentValue;
		$this->Address->PlaceHolder = RemoveHtml($this->Address->caption());

		// IdentificationMark
		$this->IdentificationMark->EditAttrs["class"] = "form-control";
		$this->IdentificationMark->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->IdentificationMark->CurrentValue = HtmlDecode($this->IdentificationMark->CurrentValue);
		$this->IdentificationMark->EditValue = $this->IdentificationMark->CurrentValue;
		$this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

		// DoublewitnessName1
		$this->DoublewitnessName1->EditAttrs["class"] = "form-control";
		$this->DoublewitnessName1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->DoublewitnessName1->CurrentValue = HtmlDecode($this->DoublewitnessName1->CurrentValue);
		$this->DoublewitnessName1->EditValue = $this->DoublewitnessName1->CurrentValue;
		$this->DoublewitnessName1->PlaceHolder = RemoveHtml($this->DoublewitnessName1->caption());

		// DoublewitnessName2
		$this->DoublewitnessName2->EditAttrs["class"] = "form-control";
		$this->DoublewitnessName2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->DoublewitnessName2->CurrentValue = HtmlDecode($this->DoublewitnessName2->CurrentValue);
		$this->DoublewitnessName2->EditValue = $this->DoublewitnessName2->CurrentValue;
		$this->DoublewitnessName2->PlaceHolder = RemoveHtml($this->DoublewitnessName2->caption());

		// Chiefcomplaints
		$this->Chiefcomplaints->EditAttrs["class"] = "form-control";
		$this->Chiefcomplaints->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Chiefcomplaints->CurrentValue = HtmlDecode($this->Chiefcomplaints->CurrentValue);
		$this->Chiefcomplaints->EditValue = $this->Chiefcomplaints->CurrentValue;
		$this->Chiefcomplaints->PlaceHolder = RemoveHtml($this->Chiefcomplaints->caption());

		// MenstrualHistory
		$this->MenstrualHistory->EditAttrs["class"] = "form-control";
		$this->MenstrualHistory->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MenstrualHistory->CurrentValue = HtmlDecode($this->MenstrualHistory->CurrentValue);
		$this->MenstrualHistory->EditValue = $this->MenstrualHistory->CurrentValue;
		$this->MenstrualHistory->PlaceHolder = RemoveHtml($this->MenstrualHistory->caption());

		// ObstetricHistory
		$this->ObstetricHistory->EditAttrs["class"] = "form-control";
		$this->ObstetricHistory->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ObstetricHistory->CurrentValue = HtmlDecode($this->ObstetricHistory->CurrentValue);
		$this->ObstetricHistory->EditValue = $this->ObstetricHistory->CurrentValue;
		$this->ObstetricHistory->PlaceHolder = RemoveHtml($this->ObstetricHistory->caption());

		// MedicalHistory
		$this->MedicalHistory->EditAttrs["class"] = "form-control";
		$this->MedicalHistory->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MedicalHistory->CurrentValue = HtmlDecode($this->MedicalHistory->CurrentValue);
		$this->MedicalHistory->EditValue = $this->MedicalHistory->CurrentValue;
		$this->MedicalHistory->PlaceHolder = RemoveHtml($this->MedicalHistory->caption());

		// SurgicalHistory
		$this->SurgicalHistory->EditAttrs["class"] = "form-control";
		$this->SurgicalHistory->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SurgicalHistory->CurrentValue = HtmlDecode($this->SurgicalHistory->CurrentValue);
		$this->SurgicalHistory->EditValue = $this->SurgicalHistory->CurrentValue;
		$this->SurgicalHistory->PlaceHolder = RemoveHtml($this->SurgicalHistory->caption());

		// Generalexaminationpallor
		$this->Generalexaminationpallor->EditAttrs["class"] = "form-control";
		$this->Generalexaminationpallor->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Generalexaminationpallor->CurrentValue = HtmlDecode($this->Generalexaminationpallor->CurrentValue);
		$this->Generalexaminationpallor->EditValue = $this->Generalexaminationpallor->CurrentValue;
		$this->Generalexaminationpallor->PlaceHolder = RemoveHtml($this->Generalexaminationpallor->caption());

		// PR
		$this->PR->EditAttrs["class"] = "form-control";
		$this->PR->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PR->CurrentValue = HtmlDecode($this->PR->CurrentValue);
		$this->PR->EditValue = $this->PR->CurrentValue;
		$this->PR->PlaceHolder = RemoveHtml($this->PR->caption());

		// CVS
		$this->CVS->EditAttrs["class"] = "form-control";
		$this->CVS->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CVS->CurrentValue = HtmlDecode($this->CVS->CurrentValue);
		$this->CVS->EditValue = $this->CVS->CurrentValue;
		$this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

		// PA
		$this->PA->EditAttrs["class"] = "form-control";
		$this->PA->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PA->CurrentValue = HtmlDecode($this->PA->CurrentValue);
		$this->PA->EditValue = $this->PA->CurrentValue;
		$this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

		// PROVISIONALDIAGNOSIS
		$this->PROVISIONALDIAGNOSIS->EditAttrs["class"] = "form-control";
		$this->PROVISIONALDIAGNOSIS->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PROVISIONALDIAGNOSIS->CurrentValue = HtmlDecode($this->PROVISIONALDIAGNOSIS->CurrentValue);
		$this->PROVISIONALDIAGNOSIS->EditValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
		$this->PROVISIONALDIAGNOSIS->PlaceHolder = RemoveHtml($this->PROVISIONALDIAGNOSIS->caption());

		// Investigations
		$this->Investigations->EditAttrs["class"] = "form-control";
		$this->Investigations->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Investigations->CurrentValue = HtmlDecode($this->Investigations->CurrentValue);
		$this->Investigations->EditValue = $this->Investigations->CurrentValue;
		$this->Investigations->PlaceHolder = RemoveHtml($this->Investigations->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
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
					$doc->exportCaption($this->SEX);
					$doc->exportCaption($this->Religion);
					$doc->exportCaption($this->Address);
					$doc->exportCaption($this->IdentificationMark);
					$doc->exportCaption($this->DoublewitnessName1);
					$doc->exportCaption($this->DoublewitnessName2);
					$doc->exportCaption($this->Chiefcomplaints);
					$doc->exportCaption($this->MenstrualHistory);
					$doc->exportCaption($this->ObstetricHistory);
					$doc->exportCaption($this->MedicalHistory);
					$doc->exportCaption($this->SurgicalHistory);
					$doc->exportCaption($this->Generalexaminationpallor);
					$doc->exportCaption($this->PR);
					$doc->exportCaption($this->CVS);
					$doc->exportCaption($this->PA);
					$doc->exportCaption($this->PROVISIONALDIAGNOSIS);
					$doc->exportCaption($this->Investigations);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->RIDNO);
					$doc->exportCaption($this->Name);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->SEX);
					$doc->exportCaption($this->Religion);
					$doc->exportCaption($this->Address);
					$doc->exportCaption($this->IdentificationMark);
					$doc->exportCaption($this->DoublewitnessName1);
					$doc->exportCaption($this->DoublewitnessName2);
					$doc->exportCaption($this->Chiefcomplaints);
					$doc->exportCaption($this->MenstrualHistory);
					$doc->exportCaption($this->ObstetricHistory);
					$doc->exportCaption($this->MedicalHistory);
					$doc->exportCaption($this->SurgicalHistory);
					$doc->exportCaption($this->Generalexaminationpallor);
					$doc->exportCaption($this->PR);
					$doc->exportCaption($this->CVS);
					$doc->exportCaption($this->PA);
					$doc->exportCaption($this->PROVISIONALDIAGNOSIS);
					$doc->exportCaption($this->Investigations);
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

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
						$doc->exportField($this->SEX);
						$doc->exportField($this->Religion);
						$doc->exportField($this->Address);
						$doc->exportField($this->IdentificationMark);
						$doc->exportField($this->DoublewitnessName1);
						$doc->exportField($this->DoublewitnessName2);
						$doc->exportField($this->Chiefcomplaints);
						$doc->exportField($this->MenstrualHistory);
						$doc->exportField($this->ObstetricHistory);
						$doc->exportField($this->MedicalHistory);
						$doc->exportField($this->SurgicalHistory);
						$doc->exportField($this->Generalexaminationpallor);
						$doc->exportField($this->PR);
						$doc->exportField($this->CVS);
						$doc->exportField($this->PA);
						$doc->exportField($this->PROVISIONALDIAGNOSIS);
						$doc->exportField($this->Investigations);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->RIDNO);
						$doc->exportField($this->Name);
						$doc->exportField($this->Age);
						$doc->exportField($this->SEX);
						$doc->exportField($this->Religion);
						$doc->exportField($this->Address);
						$doc->exportField($this->IdentificationMark);
						$doc->exportField($this->DoublewitnessName1);
						$doc->exportField($this->DoublewitnessName2);
						$doc->exportField($this->Chiefcomplaints);
						$doc->exportField($this->MenstrualHistory);
						$doc->exportField($this->ObstetricHistory);
						$doc->exportField($this->MedicalHistory);
						$doc->exportField($this->SurgicalHistory);
						$doc->exportField($this->Generalexaminationpallor);
						$doc->exportField($this->PR);
						$doc->exportField($this->CVS);
						$doc->exportField($this->PA);
						$doc->exportField($this->PROVISIONALDIAGNOSIS);
						$doc->exportField($this->Investigations);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Lookup data from table
	public function lookup()
	{
		global $Language, $LANGUAGE_FOLDER, $PROJECT_ID;
		if (!isset($Language))
			$Language = new Language($LANGUAGE_FOLDER, Post("language", ""));
		global $Security, $RequestSecurity;

		// Check token first
		$func = PROJECT_NAMESPACE . "CheckToken";
		$validRequest = FALSE;
		if (is_callable($func) && Post(TOKEN_NAME) !== NULL) {
			$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			if ($validRequest) {
				if (!isset($Security)) {
					if (session_status() !== PHP_SESSION_ACTIVE)
						session_start(); // Init session data
					$Security = new AdvancedSecurity();
					if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
					$Security->loadCurrentUserLevel($PROJECT_ID . $this->TableName);
					if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
					$validRequest = $Security->canList(); // List permission
				}
			}
		} else {

			// User profile
			$UserProfile = new UserProfile();

			// Security
			$Security = new AdvancedSecurity();
			if (is_array($RequestSecurity)) // Login user for API request
				$Security->loginUser(@$RequestSecurity["username"], @$RequestSecurity["userid"], @$RequestSecurity["parentuserid"], @$RequestSecurity["userlevelid"]);
			$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel(CurrentProjectID() . $this->TableName);
			$Security->TablePermission_Loaded();
			$validRequest = $Security->canList(); // List permission
		}

		// Reject invalid request
		if (!$validRequest)
			return FALSE;

		// Load lookup parameters
		$distinct = ConvertToBool(Post("distinct"));
		$linkField = Post("linkField");
		$displayFields = Post("displayFields");
		$parentFields = Post("parentFields");
		if (!is_array($parentFields))
			$parentFields = [];
		$childFields = Post("childFields");
		if (!is_array($childFields))
			$childFields = [];
		$filterFields = Post("filterFields");
		if (!is_array($filterFields))
			$filterFields = [];
		$filterFieldVars = Post("filterFieldVars");
		if (!is_array($filterFieldVars))
			$filterFieldVars = [];
		$filterOperators = Post("filterOperators");
		if (!is_array($filterOperators))
			$filterOperators = [];
		$autoFillSourceFields = Post("autoFillSourceFields");
		if (!is_array($autoFillSourceFields))
			$autoFillSourceFields = [];
		$formatAutoFill = FALSE;
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Get("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = AUTO_SUGGEST_MAX_ENTRIES;
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");

		// Selected records from modal, skip parent/filter fields and show all records
		if ($keys !== NULL) {
			$parentFields = [];
			$filterFields = [];
			$filterFieldVars = [];
			$offset = 0;
			$pageSize = 0;
		}

		// Create lookup object and output JSON
		$lookup = new Lookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $filterFieldVars, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(LOOKUP_FILTER_VALUE_SEPARATOR, $keys);
			$lookup->FilterValues[] = $keys; // Lookup values
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($filterFields) ? count($filterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect <> "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter <> "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy <> "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson();
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = THUMBNAIL_DEFAULT_WIDTH, $height = THUMBNAIL_DEFAULT_HEIGHT)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>