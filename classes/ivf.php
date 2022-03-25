<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for ivf
 */
class ivf extends DbTable
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
	public $Male;
	public $Female;
	public $status;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $malepropic;
	public $femalepropic;
	public $HusbandEducation;
	public $WifeEducation;
	public $HusbandWorkHours;
	public $WifeWorkHours;
	public $PatientLanguage;
	public $ReferedBy;
	public $ReferPhNo;
	public $WifeCell;
	public $HusbandCell;
	public $WifeEmail;
	public $HusbandEmail;
	public $ARTCYCLE;
	public $RESULT;
	public $malepic;
	public $femalepic;
	public $Mgendar;
	public $Fgendar;
	public $CoupleID;
	public $HospID;
	public $PatientName;
	public $PatientID;
	public $PartnerName;
	public $PartnerID;
	public $DrID;
	public $DrDepartment;
	public $Doctor;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'ivf';
		$this->TableName = 'ivf';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`ivf`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = TRUE; // Allow detail add
		$this->DetailEdit = TRUE; // Allow detail edit
		$this->DetailView = TRUE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('ivf', 'ivf', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// Male
		$this->Male = new DbField('ivf', 'ivf', 'x_Male', 'Male', '`Male`', '`Male`', 3, -1, FALSE, '`EV__Male`', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->Male->Nullable = FALSE; // NOT NULL field
		$this->Male->Required = TRUE; // Required field
		$this->Male->Sortable = TRUE; // Allow sort
		$this->Male->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Male->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Male->Lookup = new Lookup('Male', 'patient', FALSE, 'id', ["PatientID","first_name","mobile_no",""], [], [], [], [], ["mobile_no","PEmail","gender","first_name","PatientID"], ["x_HusbandCell","x_HusbandEmail","x_Mgendar","x_PartnerName","x_PartnerID"], '`id` DESC', '');
		$this->Male->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Male'] = &$this->Male;

		// Female
		$this->Female = new DbField('ivf', 'ivf', 'x_Female', 'Female', '`Female`', '`Female`', 3, -1, FALSE, '`EV__Female`', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->Female->IsForeignKey = TRUE; // Foreign key field
		$this->Female->Nullable = FALSE; // NOT NULL field
		$this->Female->Required = TRUE; // Required field
		$this->Female->Sortable = TRUE; // Allow sort
		$this->Female->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Female->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Female->Lookup = new Lookup('Female', 'patient', FALSE, 'id', ["PatientID","first_name","mobile_no",""], [], [], [], [], ["mobile_no","PEmail","gender","first_name","PatientID"], ["x_WifeCell","x_WifeEmail","x_Fgendar","x_PatientName","x_PatientID"], '`id` DESC', '');
		$this->Female->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Female'] = &$this->Female;

		// status
		$this->status = new DbField('ivf', 'ivf', 'x_status', 'status', '`status`', '`status`', 3, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->status->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->status->Lookup = new Lookup('status', 'sys_status', FALSE, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('ivf', 'ivf', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = FALSE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('ivf', 'ivf', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike('`createddatetime`', 0, "DB"), 135, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = FALSE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('ivf', 'ivf', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = FALSE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('ivf', 'ivf', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike('`modifieddatetime`', 0, "DB"), 135, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = FALSE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// malepropic
		$this->malepropic = new DbField('ivf', 'ivf', 'x_malepropic', 'malepropic', '`malepropic`', '`malepropic`', 201, -1, TRUE, '`malepropic`', FALSE, FALSE, FALSE, 'IMAGE', 'FILE');
		$this->malepropic->Sortable = TRUE; // Allow sort
		$this->fields['malepropic'] = &$this->malepropic;

		// femalepropic
		$this->femalepropic = new DbField('ivf', 'ivf', 'x_femalepropic', 'femalepropic', '`femalepropic`', '`femalepropic`', 201, -1, TRUE, '`femalepropic`', FALSE, FALSE, FALSE, 'IMAGE', 'FILE');
		$this->femalepropic->Sortable = TRUE; // Allow sort
		$this->fields['femalepropic'] = &$this->femalepropic;

		// HusbandEducation
		$this->HusbandEducation = new DbField('ivf', 'ivf', 'x_HusbandEducation', 'HusbandEducation', '`HusbandEducation`', '`HusbandEducation`', 200, -1, FALSE, '`HusbandEducation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HusbandEducation->Sortable = TRUE; // Allow sort
		$this->fields['HusbandEducation'] = &$this->HusbandEducation;

		// WifeEducation
		$this->WifeEducation = new DbField('ivf', 'ivf', 'x_WifeEducation', 'WifeEducation', '`WifeEducation`', '`WifeEducation`', 200, -1, FALSE, '`WifeEducation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WifeEducation->Sortable = TRUE; // Allow sort
		$this->fields['WifeEducation'] = &$this->WifeEducation;

		// HusbandWorkHours
		$this->HusbandWorkHours = new DbField('ivf', 'ivf', 'x_HusbandWorkHours', 'HusbandWorkHours', '`HusbandWorkHours`', '`HusbandWorkHours`', 200, -1, FALSE, '`HusbandWorkHours`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HusbandWorkHours->Sortable = TRUE; // Allow sort
		$this->fields['HusbandWorkHours'] = &$this->HusbandWorkHours;

		// WifeWorkHours
		$this->WifeWorkHours = new DbField('ivf', 'ivf', 'x_WifeWorkHours', 'WifeWorkHours', '`WifeWorkHours`', '`WifeWorkHours`', 200, -1, FALSE, '`WifeWorkHours`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WifeWorkHours->Sortable = TRUE; // Allow sort
		$this->fields['WifeWorkHours'] = &$this->WifeWorkHours;

		// PatientLanguage
		$this->PatientLanguage = new DbField('ivf', 'ivf', 'x_PatientLanguage', 'PatientLanguage', '`PatientLanguage`', '`PatientLanguage`', 200, -1, FALSE, '`PatientLanguage`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientLanguage->Sortable = TRUE; // Allow sort
		$this->fields['PatientLanguage'] = &$this->PatientLanguage;

		// ReferedBy
		$this->ReferedBy = new DbField('ivf', 'ivf', 'x_ReferedBy', 'ReferedBy', '`ReferedBy`', '`ReferedBy`', 200, -1, FALSE, '`EV__ReferedBy`', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->ReferedBy->Sortable = TRUE; // Allow sort
		$this->ReferedBy->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ReferedBy->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->ReferedBy->Lookup = new Lookup('ReferedBy', 'mas_reference_type', FALSE, 'reference', ["reference","","",""], [], [], [], [], ["ReferMobileNo"], ["x_ReferPhNo"], '', '');
		$this->fields['ReferedBy'] = &$this->ReferedBy;

		// ReferPhNo
		$this->ReferPhNo = new DbField('ivf', 'ivf', 'x_ReferPhNo', 'ReferPhNo', '`ReferPhNo`', '`ReferPhNo`', 200, -1, FALSE, '`ReferPhNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferPhNo->Sortable = TRUE; // Allow sort
		$this->fields['ReferPhNo'] = &$this->ReferPhNo;

		// WifeCell
		$this->WifeCell = new DbField('ivf', 'ivf', 'x_WifeCell', 'WifeCell', '`WifeCell`', '`WifeCell`', 200, -1, FALSE, '`WifeCell`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WifeCell->Sortable = TRUE; // Allow sort
		$this->fields['WifeCell'] = &$this->WifeCell;

		// HusbandCell
		$this->HusbandCell = new DbField('ivf', 'ivf', 'x_HusbandCell', 'HusbandCell', '`HusbandCell`', '`HusbandCell`', 200, -1, FALSE, '`HusbandCell`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HusbandCell->Sortable = TRUE; // Allow sort
		$this->fields['HusbandCell'] = &$this->HusbandCell;

		// WifeEmail
		$this->WifeEmail = new DbField('ivf', 'ivf', 'x_WifeEmail', 'WifeEmail', '`WifeEmail`', '`WifeEmail`', 200, -1, FALSE, '`WifeEmail`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WifeEmail->Sortable = TRUE; // Allow sort
		$this->fields['WifeEmail'] = &$this->WifeEmail;

		// HusbandEmail
		$this->HusbandEmail = new DbField('ivf', 'ivf', 'x_HusbandEmail', 'HusbandEmail', '`HusbandEmail`', '`HusbandEmail`', 200, -1, FALSE, '`HusbandEmail`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HusbandEmail->Sortable = TRUE; // Allow sort
		$this->fields['HusbandEmail'] = &$this->HusbandEmail;

		// ARTCYCLE
		$this->ARTCYCLE = new DbField('ivf', 'ivf', 'x_ARTCYCLE', 'ARTCYCLE', '`ARTCYCLE`', '`ARTCYCLE`', 200, -1, FALSE, '`ARTCYCLE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ARTCYCLE->Sortable = TRUE; // Allow sort
		$this->ARTCYCLE->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ARTCYCLE->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->ARTCYCLE->Lookup = new Lookup('ARTCYCLE', 'ivf', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->ARTCYCLE->OptionCount = 9;
		$this->fields['ARTCYCLE'] = &$this->ARTCYCLE;

		// RESULT
		$this->RESULT = new DbField('ivf', 'ivf', 'x_RESULT', 'RESULT', '`RESULT`', '`RESULT`', 200, -1, FALSE, '`RESULT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->RESULT->Sortable = TRUE; // Allow sort
		$this->RESULT->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->RESULT->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->RESULT->Lookup = new Lookup('RESULT', 'ivf', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->RESULT->OptionCount = 2;
		$this->fields['RESULT'] = &$this->RESULT;

		// malepic
		$this->malepic = new DbField('ivf', 'ivf', 'x_malepic', 'malepic', '\'\'', '\'\'', 201, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->malepic->IsCustom = TRUE; // Custom field
		$this->malepic->Sortable = TRUE; // Allow sort
		$this->fields['malepic'] = &$this->malepic;

		// femalepic
		$this->femalepic = new DbField('ivf', 'ivf', 'x_femalepic', 'femalepic', '\'\'', '\'\'', 201, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->femalepic->IsCustom = TRUE; // Custom field
		$this->femalepic->Sortable = TRUE; // Allow sort
		$this->fields['femalepic'] = &$this->femalepic;

		// Mgendar
		$this->Mgendar = new DbField('ivf', 'ivf', 'x_Mgendar', 'Mgendar', '\'\'', '\'\'', 201, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Mgendar->IsCustom = TRUE; // Custom field
		$this->Mgendar->Sortable = TRUE; // Allow sort
		$this->fields['Mgendar'] = &$this->Mgendar;

		// Fgendar
		$this->Fgendar = new DbField('ivf', 'ivf', 'x_Fgendar', 'Fgendar', '\'\'', '\'\'', 201, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Fgendar->IsCustom = TRUE; // Custom field
		$this->Fgendar->Sortable = TRUE; // Allow sort
		$this->fields['Fgendar'] = &$this->Fgendar;

		// CoupleID
		$this->CoupleID = new DbField('ivf', 'ivf', 'x_CoupleID', 'CoupleID', '`CoupleID`', '`CoupleID`', 200, -1, FALSE, '`CoupleID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CoupleID->Sortable = TRUE; // Allow sort
		$this->fields['CoupleID'] = &$this->CoupleID;

		// HospID
		$this->HospID = new DbField('ivf', 'ivf', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// PatientName
		$this->PatientName = new DbField('ivf', 'ivf', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// PatientID
		$this->PatientID = new DbField('ivf', 'ivf', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, -1, FALSE, '`PatientID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientID->Sortable = TRUE; // Allow sort
		$this->fields['PatientID'] = &$this->PatientID;

		// PartnerName
		$this->PartnerName = new DbField('ivf', 'ivf', 'x_PartnerName', 'PartnerName', '`PartnerName`', '`PartnerName`', 200, -1, FALSE, '`PartnerName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerName->Sortable = TRUE; // Allow sort
		$this->fields['PartnerName'] = &$this->PartnerName;

		// PartnerID
		$this->PartnerID = new DbField('ivf', 'ivf', 'x_PartnerID', 'PartnerID', '`PartnerID`', '`PartnerID`', 200, -1, FALSE, '`PartnerID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerID->Sortable = TRUE; // Allow sort
		$this->fields['PartnerID'] = &$this->PartnerID;

		// DrID
		$this->DrID = new DbField('ivf', 'ivf', 'x_DrID', 'DrID', '`DrID`', '`DrID`', 3, -1, FALSE, '`DrID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DrID->Sortable = TRUE; // Allow sort
		$this->DrID->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DrID->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->DrID->Lookup = new Lookup('DrID', 'doctors', FALSE, 'id', ["CODE","NAME","",""], [], [], [], [], ["DEPARTMENT","NAME"], ["x_DrDepartment","x_Doctor"], '', '');
		$this->DrID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DrID'] = &$this->DrID;

		// DrDepartment
		$this->DrDepartment = new DbField('ivf', 'ivf', 'x_DrDepartment', 'DrDepartment', '`DrDepartment`', '`DrDepartment`', 200, -1, FALSE, '`DrDepartment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrDepartment->Sortable = TRUE; // Allow sort
		$this->fields['DrDepartment'] = &$this->DrDepartment;

		// Doctor
		$this->Doctor = new DbField('ivf', 'ivf', 'x_Doctor', 'Doctor', '`Doctor`', '`Doctor`', 200, -1, FALSE, '`Doctor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Doctor->Sortable = TRUE; // Allow sort
		$this->fields['Doctor'] = &$this->Doctor;
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
			$sortFieldList = ($fld->VirtualExpression <> "") ? $fld->VirtualExpression : $sortField;
			$this->setSessionOrderByList($sortFieldList . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Session ORDER BY for List page
	public function getSessionOrderByList()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_ORDER_BY_LIST];
	}
	public function setSessionOrderByList($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_ORDER_BY_LIST] = $v;
	}

	// Current detail table name
	public function getCurrentDetailTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_DETAIL_TABLE];
	}
	public function setCurrentDetailTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_DETAIL_TABLE] = $v;
	}

	// Get detail url
	public function getDetailUrl()
	{

		// Detail url
		$detailUrl = "";
		if ($this->getCurrentDetailTable() == "ivf_treatment_plan") {
			$detailUrl = $GLOBALS["ivf_treatment_plan"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
			$detailUrl .= "&fk_Female=" . urlencode($this->Female->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "ivflist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`ivf`";
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
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT *, '' AS `malepic`, '' AS `femalepic`, '' AS `Mgendar`, '' AS `Fgendar` FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlSelectList() // Select for List page
	{
		$select = "";
		$select = "SELECT * FROM (" .
			"SELECT *, '' AS `malepic`, '' AS `femalepic`, '' AS `Mgendar`, '' AS `Fgendar`, (SELECT CONCAT(COALESCE(`PatientID`, ''),'" . ValueSeparator(1, $this->Male) . "',COALESCE(`first_name`,''),'" . ValueSeparator(2, $this->Male) . "',COALESCE(`mobile_no`,'')) FROM `patient` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`id` = `ivf`.`Male` LIMIT 1) AS `EV__Male`, (SELECT CONCAT(COALESCE(`PatientID`, ''),'" . ValueSeparator(1, $this->Female) . "',COALESCE(`first_name`,''),'" . ValueSeparator(2, $this->Female) . "',COALESCE(`mobile_no`,'')) FROM `patient` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`id` = `ivf`.`Female` LIMIT 1) AS `EV__Female`, (SELECT `reference` FROM `mas_reference_type` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`reference` = `ivf`.`ReferedBy` LIMIT 1) AS `EV__ReferedBy` FROM `ivf`" .
			") `TMP_TABLE`";
		return ($this->SqlSelectList <> "") ? $this->SqlSelectList : $select;
	}
	public function sqlSelectList() // For backward compatibility
	{
		return $this->getSqlSelectList();
	}
	public function setSqlSelectList($v)
	{
		$this->SqlSelectList = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere <> "") ? $this->SqlWhere : "";
		$this->TableFilter = "`Male`!= '0'";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "`id` DESC";
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
		if ($this->useVirtualFields()) {
			$select = $this->getSqlSelectList();
			$sort = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
		} else {
			$select = $this->getSqlSelect();
			$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		}
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = ($this->useVirtualFields()) ? $this->getSessionOrderByList() : $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Check if virtual fields is used in SQL
	protected function useVirtualFields()
	{
		$where = $this->UseSessionForListSql ? $this->getSessionWhere() : $this->CurrentFilter;
		$orderBy = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
		if ($where <> "")
			$where = " " . str_replace(array("(",")"), array("",""), $where) . " ";
		if ($orderBy <> "")
			$orderBy = " " . str_replace(array("(",")"), array("",""), $orderBy) . " ";
		if ($this->Male->AdvancedSearch->SearchValue <> "" ||
			$this->Male->AdvancedSearch->SearchValue2 <> "" ||
			ContainsString($where, " " . $this->Male->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->Male->VirtualExpression . " "))
			return TRUE;
		if ($this->Female->AdvancedSearch->SearchValue <> "" ||
			$this->Female->AdvancedSearch->SearchValue2 <> "" ||
			ContainsString($where, " " . $this->Female->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->Female->VirtualExpression . " "))
			return TRUE;
		if ($this->BasicSearch->getKeyword() <> "")
			return TRUE;
		if ($this->ReferedBy->AdvancedSearch->SearchValue <> "" ||
			$this->ReferedBy->AdvancedSearch->SearchValue2 <> "" ||
			ContainsString($where, " " . $this->ReferedBy->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->ReferedBy->VirtualExpression . " "))
			return TRUE;
		return FALSE;
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
		if ($this->useVirtualFields())
			$sql = BuildSelectSql($this->getSqlSelectList(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		else
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
		$this->Male->DbValue = $row['Male'];
		$this->Female->DbValue = $row['Female'];
		$this->status->DbValue = $row['status'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->malepropic->Upload->DbValue = $row['malepropic'];
		$this->femalepropic->Upload->DbValue = $row['femalepropic'];
		$this->HusbandEducation->DbValue = $row['HusbandEducation'];
		$this->WifeEducation->DbValue = $row['WifeEducation'];
		$this->HusbandWorkHours->DbValue = $row['HusbandWorkHours'];
		$this->WifeWorkHours->DbValue = $row['WifeWorkHours'];
		$this->PatientLanguage->DbValue = $row['PatientLanguage'];
		$this->ReferedBy->DbValue = $row['ReferedBy'];
		$this->ReferPhNo->DbValue = $row['ReferPhNo'];
		$this->WifeCell->DbValue = $row['WifeCell'];
		$this->HusbandCell->DbValue = $row['HusbandCell'];
		$this->WifeEmail->DbValue = $row['WifeEmail'];
		$this->HusbandEmail->DbValue = $row['HusbandEmail'];
		$this->ARTCYCLE->DbValue = $row['ARTCYCLE'];
		$this->RESULT->DbValue = $row['RESULT'];
		$this->malepic->DbValue = $row['malepic'];
		$this->femalepic->DbValue = $row['femalepic'];
		$this->Mgendar->DbValue = $row['Mgendar'];
		$this->Fgendar->DbValue = $row['Fgendar'];
		$this->CoupleID->DbValue = $row['CoupleID'];
		$this->HospID->DbValue = $row['HospID'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->PatientID->DbValue = $row['PatientID'];
		$this->PartnerName->DbValue = $row['PartnerName'];
		$this->PartnerID->DbValue = $row['PartnerID'];
		$this->DrID->DbValue = $row['DrID'];
		$this->DrDepartment->DbValue = $row['DrDepartment'];
		$this->Doctor->DbValue = $row['Doctor'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
		$oldFiles = EmptyValue($row['malepropic']) ? [] : [$row['malepropic']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->malepropic->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->malepropic->oldPhysicalUploadPath() . $oldFile);
		}
		$oldFiles = EmptyValue($row['femalepropic']) ? [] : [$row['femalepropic']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->femalepropic->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->femalepropic->oldPhysicalUploadPath() . $oldFile);
		}
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
			return "ivflist.php";
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
		if ($pageName == "ivfview.php")
			return $Language->phrase("View");
		elseif ($pageName == "ivfedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "ivfadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "ivflist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("ivfview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("ivfview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "ivfadd.php?" . $this->getUrlParm($parm);
		else
			$url = "ivfadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("ivfedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("ivfedit.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
		if ($parm <> "")
			$url = $this->keyUrl("ivfadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("ivfadd.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
		return $this->keyUrl("ivfdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
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
		$this->Male->setDbValue($rs->fields('Male'));
		$this->Female->setDbValue($rs->fields('Female'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->malepropic->Upload->DbValue = $rs->fields('malepropic');
		$this->femalepropic->Upload->DbValue = $rs->fields('femalepropic');
		$this->HusbandEducation->setDbValue($rs->fields('HusbandEducation'));
		$this->WifeEducation->setDbValue($rs->fields('WifeEducation'));
		$this->HusbandWorkHours->setDbValue($rs->fields('HusbandWorkHours'));
		$this->WifeWorkHours->setDbValue($rs->fields('WifeWorkHours'));
		$this->PatientLanguage->setDbValue($rs->fields('PatientLanguage'));
		$this->ReferedBy->setDbValue($rs->fields('ReferedBy'));
		$this->ReferPhNo->setDbValue($rs->fields('ReferPhNo'));
		$this->WifeCell->setDbValue($rs->fields('WifeCell'));
		$this->HusbandCell->setDbValue($rs->fields('HusbandCell'));
		$this->WifeEmail->setDbValue($rs->fields('WifeEmail'));
		$this->HusbandEmail->setDbValue($rs->fields('HusbandEmail'));
		$this->ARTCYCLE->setDbValue($rs->fields('ARTCYCLE'));
		$this->RESULT->setDbValue($rs->fields('RESULT'));
		$this->malepic->setDbValue($rs->fields('malepic'));
		$this->femalepic->setDbValue($rs->fields('femalepic'));
		$this->Mgendar->setDbValue($rs->fields('Mgendar'));
		$this->Fgendar->setDbValue($rs->fields('Fgendar'));
		$this->CoupleID->setDbValue($rs->fields('CoupleID'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->PatientID->setDbValue($rs->fields('PatientID'));
		$this->PartnerName->setDbValue($rs->fields('PartnerName'));
		$this->PartnerID->setDbValue($rs->fields('PartnerID'));
		$this->DrID->setDbValue($rs->fields('DrID'));
		$this->DrDepartment->setDbValue($rs->fields('DrDepartment'));
		$this->Doctor->setDbValue($rs->fields('Doctor'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// Male
		// Female
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// malepropic
		// femalepropic
		// HusbandEducation
		// WifeEducation
		// HusbandWorkHours
		// WifeWorkHours
		// PatientLanguage
		// ReferedBy
		// ReferPhNo
		// WifeCell
		// HusbandCell
		// WifeEmail
		// HusbandEmail
		// ARTCYCLE
		// RESULT
		// malepic
		// femalepic
		// Mgendar
		// Fgendar
		// CoupleID
		// HospID
		// PatientName
		// PatientID
		// PartnerName
		// PartnerID
		// DrID
		// DrDepartment
		// Doctor
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// Male
		if ($this->Male->VirtualValue <> "") {
			$this->Male->ViewValue = $this->Male->VirtualValue;
		} else {
		$curVal = strval($this->Male->CurrentValue);
		if ($curVal <> "") {
			$this->Male->ViewValue = $this->Male->lookupCacheOption($curVal);
			if ($this->Male->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->Male->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$this->Male->ViewValue = $this->Male->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Male->ViewValue = $this->Male->CurrentValue;
				}
			}
		} else {
			$this->Male->ViewValue = NULL;
		}
		}
		$this->Male->ViewCustomAttributes = "";

		// Female
		if ($this->Female->VirtualValue <> "") {
			$this->Female->ViewValue = $this->Female->VirtualValue;
		} else {
		$curVal = strval($this->Female->CurrentValue);
		if ($curVal <> "") {
			$this->Female->ViewValue = $this->Female->lookupCacheOption($curVal);
			if ($this->Female->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->Female->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$this->Female->ViewValue = $this->Female->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Female->ViewValue = $this->Female->CurrentValue;
				}
			}
		} else {
			$this->Female->ViewValue = NULL;
		}
		}
		$this->Female->ViewCustomAttributes = "";

		// status
		$curVal = strval($this->status->CurrentValue);
		if ($curVal <> "") {
			$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
			if ($this->status->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->status->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->status->ViewValue = $this->status->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->status->ViewValue = $this->status->CurrentValue;
				}
			}
		} else {
			$this->status->ViewValue = NULL;
		}
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

		// malepropic
		if (!EmptyValue($this->malepropic->Upload->DbValue)) {
			$this->malepropic->ImageWidth = 80;
			$this->malepropic->ImageHeight = 80;
			$this->malepropic->ImageAlt = $this->malepropic->alt();
			$this->malepropic->ViewValue = $this->malepropic->Upload->DbValue;
		} else {
			$this->malepropic->ViewValue = "";
		}
		$this->malepropic->ViewCustomAttributes = "";

		// femalepropic
		if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
			$this->femalepropic->ImageWidth = 80;
			$this->femalepropic->ImageHeight = 80;
			$this->femalepropic->ImageAlt = $this->femalepropic->alt();
			$this->femalepropic->ViewValue = $this->femalepropic->Upload->DbValue;
		} else {
			$this->femalepropic->ViewValue = "";
		}
		$this->femalepropic->ViewCustomAttributes = "";

		// HusbandEducation
		$this->HusbandEducation->ViewValue = $this->HusbandEducation->CurrentValue;
		$this->HusbandEducation->ViewCustomAttributes = "";

		// WifeEducation
		$this->WifeEducation->ViewValue = $this->WifeEducation->CurrentValue;
		$this->WifeEducation->ViewCustomAttributes = "";

		// HusbandWorkHours
		$this->HusbandWorkHours->ViewValue = $this->HusbandWorkHours->CurrentValue;
		$this->HusbandWorkHours->ViewCustomAttributes = "";

		// WifeWorkHours
		$this->WifeWorkHours->ViewValue = $this->WifeWorkHours->CurrentValue;
		$this->WifeWorkHours->ViewCustomAttributes = "";

		// PatientLanguage
		$this->PatientLanguage->ViewValue = $this->PatientLanguage->CurrentValue;
		$this->PatientLanguage->ViewCustomAttributes = "";

		// ReferedBy
		if ($this->ReferedBy->VirtualValue <> "") {
			$this->ReferedBy->ViewValue = $this->ReferedBy->VirtualValue;
		} else {
		$curVal = strval($this->ReferedBy->CurrentValue);
		if ($curVal <> "") {
			$this->ReferedBy->ViewValue = $this->ReferedBy->lookupCacheOption($curVal);
			if ($this->ReferedBy->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->ReferedBy->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->ReferedBy->ViewValue = $this->ReferedBy->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->ReferedBy->ViewValue = $this->ReferedBy->CurrentValue;
				}
			}
		} else {
			$this->ReferedBy->ViewValue = NULL;
		}
		}
		$this->ReferedBy->ViewCustomAttributes = "";

		// ReferPhNo
		$this->ReferPhNo->ViewValue = $this->ReferPhNo->CurrentValue;
		$this->ReferPhNo->ViewCustomAttributes = "";

		// WifeCell
		$this->WifeCell->ViewValue = $this->WifeCell->CurrentValue;
		$this->WifeCell->ViewCustomAttributes = "";

		// HusbandCell
		$this->HusbandCell->ViewValue = $this->HusbandCell->CurrentValue;
		$this->HusbandCell->ViewCustomAttributes = "";

		// WifeEmail
		$this->WifeEmail->ViewValue = $this->WifeEmail->CurrentValue;
		$this->WifeEmail->ViewCustomAttributes = "";

		// HusbandEmail
		$this->HusbandEmail->ViewValue = $this->HusbandEmail->CurrentValue;
		$this->HusbandEmail->ViewCustomAttributes = "";

		// ARTCYCLE
		if (strval($this->ARTCYCLE->CurrentValue) <> "") {
			$this->ARTCYCLE->ViewValue = $this->ARTCYCLE->optionCaption($this->ARTCYCLE->CurrentValue);
		} else {
			$this->ARTCYCLE->ViewValue = NULL;
		}
		$this->ARTCYCLE->ViewCustomAttributes = "";

		// RESULT
		if (strval($this->RESULT->CurrentValue) <> "") {
			$this->RESULT->ViewValue = $this->RESULT->optionCaption($this->RESULT->CurrentValue);
		} else {
			$this->RESULT->ViewValue = NULL;
		}
		$this->RESULT->ViewCustomAttributes = "";

		// malepic
		$this->malepic->ViewValue = $this->malepic->CurrentValue;
		$this->malepic->ViewCustomAttributes = "";

		// femalepic
		$this->femalepic->ViewValue = $this->femalepic->CurrentValue;
		$this->femalepic->ViewCustomAttributes = "";

		// Mgendar
		$this->Mgendar->ViewValue = $this->Mgendar->CurrentValue;
		$this->Mgendar->ViewCustomAttributes = "";

		// Fgendar
		$this->Fgendar->ViewValue = $this->Fgendar->CurrentValue;
		$this->Fgendar->ViewCustomAttributes = "";

		// CoupleID
		$this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
		$this->CoupleID->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// PatientID
		$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
		$this->PatientID->ViewCustomAttributes = "";

		// PartnerName
		$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
		$this->PartnerName->ViewCustomAttributes = "";

		// PartnerID
		$this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
		$this->PartnerID->ViewCustomAttributes = "";

		// DrID
		$curVal = strval($this->DrID->CurrentValue);
		if ($curVal <> "") {
			$this->DrID->ViewValue = $this->DrID->lookupCacheOption($curVal);
			if ($this->DrID->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->DrID->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$this->DrID->ViewValue = $this->DrID->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->DrID->ViewValue = $this->DrID->CurrentValue;
				}
			}
		} else {
			$this->DrID->ViewValue = NULL;
		}
		$this->DrID->ViewCustomAttributes = "";

		// DrDepartment
		$this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
		$this->DrDepartment->ViewCustomAttributes = "";

		// Doctor
		$this->Doctor->ViewValue = $this->Doctor->CurrentValue;
		$this->Doctor->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// Male
		$this->Male->LinkCustomAttributes = "";
		$this->Male->HrefValue = "";
		$this->Male->TooltipValue = "";

		// Female
		$this->Female->LinkCustomAttributes = "";
		$this->Female->HrefValue = "";
		$this->Female->TooltipValue = "";

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

		// malepropic
		$this->malepropic->LinkCustomAttributes = "";
		if (!EmptyValue($this->malepropic->Upload->DbValue)) {
			$this->malepropic->HrefValue = GetFileUploadUrl($this->malepropic, $this->malepropic->Upload->DbValue); // Add prefix/suffix
			$this->malepropic->LinkAttrs["target"] = ""; // Add target
			if ($this->isExport()) $this->malepropic->HrefValue = FullUrl($this->malepropic->HrefValue, "href");
		} else {
			$this->malepropic->HrefValue = "";
		}
		$this->malepropic->ExportHrefValue = $this->malepropic->UploadPath . $this->malepropic->Upload->DbValue;
		$this->malepropic->TooltipValue = "";
		if ($this->malepropic->UseColorbox) {
			if (EmptyValue($this->malepropic->TooltipValue))
				$this->malepropic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
			$this->malepropic->LinkAttrs["data-rel"] = "ivf_x_malepropic";
			AppendClass($this->malepropic->LinkAttrs["class"], "ew-lightbox");
		}

		// femalepropic
		$this->femalepropic->LinkCustomAttributes = "";
		if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
			$this->femalepropic->HrefValue = GetFileUploadUrl($this->femalepropic, $this->femalepropic->Upload->DbValue); // Add prefix/suffix
			$this->femalepropic->LinkAttrs["target"] = ""; // Add target
			if ($this->isExport()) $this->femalepropic->HrefValue = FullUrl($this->femalepropic->HrefValue, "href");
		} else {
			$this->femalepropic->HrefValue = "";
		}
		$this->femalepropic->ExportHrefValue = $this->femalepropic->UploadPath . $this->femalepropic->Upload->DbValue;
		$this->femalepropic->TooltipValue = "";
		if ($this->femalepropic->UseColorbox) {
			if (EmptyValue($this->femalepropic->TooltipValue))
				$this->femalepropic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
			$this->femalepropic->LinkAttrs["data-rel"] = "ivf_x_femalepropic";
			AppendClass($this->femalepropic->LinkAttrs["class"], "ew-lightbox");
		}

		// HusbandEducation
		$this->HusbandEducation->LinkCustomAttributes = "";
		$this->HusbandEducation->HrefValue = "";
		$this->HusbandEducation->TooltipValue = "";

		// WifeEducation
		$this->WifeEducation->LinkCustomAttributes = "";
		$this->WifeEducation->HrefValue = "";
		$this->WifeEducation->TooltipValue = "";

		// HusbandWorkHours
		$this->HusbandWorkHours->LinkCustomAttributes = "";
		$this->HusbandWorkHours->HrefValue = "";
		$this->HusbandWorkHours->TooltipValue = "";

		// WifeWorkHours
		$this->WifeWorkHours->LinkCustomAttributes = "";
		$this->WifeWorkHours->HrefValue = "";
		$this->WifeWorkHours->TooltipValue = "";

		// PatientLanguage
		$this->PatientLanguage->LinkCustomAttributes = "";
		$this->PatientLanguage->HrefValue = "";
		$this->PatientLanguage->TooltipValue = "";

		// ReferedBy
		$this->ReferedBy->LinkCustomAttributes = "";
		$this->ReferedBy->HrefValue = "";
		$this->ReferedBy->TooltipValue = "";

		// ReferPhNo
		$this->ReferPhNo->LinkCustomAttributes = "";
		$this->ReferPhNo->HrefValue = "";
		$this->ReferPhNo->TooltipValue = "";

		// WifeCell
		$this->WifeCell->LinkCustomAttributes = "";
		$this->WifeCell->HrefValue = "";
		$this->WifeCell->TooltipValue = "";

		// HusbandCell
		$this->HusbandCell->LinkCustomAttributes = "";
		$this->HusbandCell->HrefValue = "";
		$this->HusbandCell->TooltipValue = "";

		// WifeEmail
		$this->WifeEmail->LinkCustomAttributes = "";
		$this->WifeEmail->HrefValue = "";
		$this->WifeEmail->TooltipValue = "";

		// HusbandEmail
		$this->HusbandEmail->LinkCustomAttributes = "";
		$this->HusbandEmail->HrefValue = "";
		$this->HusbandEmail->TooltipValue = "";

		// ARTCYCLE
		$this->ARTCYCLE->LinkCustomAttributes = "";
		$this->ARTCYCLE->HrefValue = "";
		$this->ARTCYCLE->TooltipValue = "";

		// RESULT
		$this->RESULT->LinkCustomAttributes = "";
		$this->RESULT->HrefValue = "";
		$this->RESULT->TooltipValue = "";

		// malepic
		$this->malepic->LinkCustomAttributes = "";
		$this->malepic->HrefValue = "";
		$this->malepic->TooltipValue = "";

		// femalepic
		$this->femalepic->LinkCustomAttributes = "";
		$this->femalepic->HrefValue = "";
		$this->femalepic->TooltipValue = "";

		// Mgendar
		$this->Mgendar->LinkCustomAttributes = "";
		$this->Mgendar->HrefValue = "";
		$this->Mgendar->TooltipValue = "";

		// Fgendar
		$this->Fgendar->LinkCustomAttributes = "";
		$this->Fgendar->HrefValue = "";
		$this->Fgendar->TooltipValue = "";

		// CoupleID
		$this->CoupleID->LinkCustomAttributes = "";
		$this->CoupleID->HrefValue = "";
		$this->CoupleID->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// PatientName
		$this->PatientName->LinkCustomAttributes = "";
		$this->PatientName->HrefValue = "";
		$this->PatientName->TooltipValue = "";

		// PatientID
		$this->PatientID->LinkCustomAttributes = "";
		$this->PatientID->HrefValue = "";
		$this->PatientID->TooltipValue = "";

		// PartnerName
		$this->PartnerName->LinkCustomAttributes = "";
		$this->PartnerName->HrefValue = "";
		$this->PartnerName->TooltipValue = "";

		// PartnerID
		$this->PartnerID->LinkCustomAttributes = "";
		$this->PartnerID->HrefValue = "";
		$this->PartnerID->TooltipValue = "";

		// DrID
		$this->DrID->LinkCustomAttributes = "";
		$this->DrID->HrefValue = "";
		$this->DrID->TooltipValue = "";

		// DrDepartment
		$this->DrDepartment->LinkCustomAttributes = "";
		$this->DrDepartment->HrefValue = "";
		$this->DrDepartment->TooltipValue = "";

		// Doctor
		$this->Doctor->LinkCustomAttributes = "";
		$this->Doctor->HrefValue = "";
		$this->Doctor->TooltipValue = "";

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

		// Male
		$this->Male->EditAttrs["class"] = "form-control";
		$this->Male->EditCustomAttributes = "";

		// Female
		$this->Female->EditAttrs["class"] = "form-control";
		$this->Female->EditCustomAttributes = "";

		// status
		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";

		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// malepropic

		$this->malepropic->EditAttrs["class"] = "form-control";
		$this->malepropic->EditCustomAttributes = "";
		if (!EmptyValue($this->malepropic->Upload->DbValue)) {
			$this->malepropic->ImageWidth = 80;
			$this->malepropic->ImageHeight = 80;
			$this->malepropic->ImageAlt = $this->malepropic->alt();
			$this->malepropic->EditValue = $this->malepropic->Upload->DbValue;
		} else {
			$this->malepropic->EditValue = "";
		}
		if (!EmptyValue($this->malepropic->CurrentValue))
				$this->malepropic->Upload->FileName = $this->malepropic->CurrentValue;

		// femalepropic
		$this->femalepropic->EditAttrs["class"] = "form-control";
		$this->femalepropic->EditCustomAttributes = "";
		if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
			$this->femalepropic->ImageWidth = 80;
			$this->femalepropic->ImageHeight = 80;
			$this->femalepropic->ImageAlt = $this->femalepropic->alt();
			$this->femalepropic->EditValue = $this->femalepropic->Upload->DbValue;
		} else {
			$this->femalepropic->EditValue = "";
		}
		if (!EmptyValue($this->femalepropic->CurrentValue))
				$this->femalepropic->Upload->FileName = $this->femalepropic->CurrentValue;

		// HusbandEducation
		$this->HusbandEducation->EditAttrs["class"] = "form-control";
		$this->HusbandEducation->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HusbandEducation->CurrentValue = HtmlDecode($this->HusbandEducation->CurrentValue);
		$this->HusbandEducation->EditValue = $this->HusbandEducation->CurrentValue;
		$this->HusbandEducation->PlaceHolder = RemoveHtml($this->HusbandEducation->caption());

		// WifeEducation
		$this->WifeEducation->EditAttrs["class"] = "form-control";
		$this->WifeEducation->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->WifeEducation->CurrentValue = HtmlDecode($this->WifeEducation->CurrentValue);
		$this->WifeEducation->EditValue = $this->WifeEducation->CurrentValue;
		$this->WifeEducation->PlaceHolder = RemoveHtml($this->WifeEducation->caption());

		// HusbandWorkHours
		$this->HusbandWorkHours->EditAttrs["class"] = "form-control";
		$this->HusbandWorkHours->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HusbandWorkHours->CurrentValue = HtmlDecode($this->HusbandWorkHours->CurrentValue);
		$this->HusbandWorkHours->EditValue = $this->HusbandWorkHours->CurrentValue;
		$this->HusbandWorkHours->PlaceHolder = RemoveHtml($this->HusbandWorkHours->caption());

		// WifeWorkHours
		$this->WifeWorkHours->EditAttrs["class"] = "form-control";
		$this->WifeWorkHours->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->WifeWorkHours->CurrentValue = HtmlDecode($this->WifeWorkHours->CurrentValue);
		$this->WifeWorkHours->EditValue = $this->WifeWorkHours->CurrentValue;
		$this->WifeWorkHours->PlaceHolder = RemoveHtml($this->WifeWorkHours->caption());

		// PatientLanguage
		$this->PatientLanguage->EditAttrs["class"] = "form-control";
		$this->PatientLanguage->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientLanguage->CurrentValue = HtmlDecode($this->PatientLanguage->CurrentValue);
		$this->PatientLanguage->EditValue = $this->PatientLanguage->CurrentValue;
		$this->PatientLanguage->PlaceHolder = RemoveHtml($this->PatientLanguage->caption());

		// ReferedBy
		$this->ReferedBy->EditAttrs["class"] = "form-control";
		$this->ReferedBy->EditCustomAttributes = "";

		// ReferPhNo
		$this->ReferPhNo->EditAttrs["class"] = "form-control";
		$this->ReferPhNo->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ReferPhNo->CurrentValue = HtmlDecode($this->ReferPhNo->CurrentValue);
		$this->ReferPhNo->EditValue = $this->ReferPhNo->CurrentValue;
		$this->ReferPhNo->PlaceHolder = RemoveHtml($this->ReferPhNo->caption());

		// WifeCell
		$this->WifeCell->EditAttrs["class"] = "form-control";
		$this->WifeCell->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->WifeCell->CurrentValue = HtmlDecode($this->WifeCell->CurrentValue);
		$this->WifeCell->EditValue = $this->WifeCell->CurrentValue;
		$this->WifeCell->PlaceHolder = RemoveHtml($this->WifeCell->caption());

		// HusbandCell
		$this->HusbandCell->EditAttrs["class"] = "form-control";
		$this->HusbandCell->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HusbandCell->CurrentValue = HtmlDecode($this->HusbandCell->CurrentValue);
		$this->HusbandCell->EditValue = $this->HusbandCell->CurrentValue;
		$this->HusbandCell->PlaceHolder = RemoveHtml($this->HusbandCell->caption());

		// WifeEmail
		$this->WifeEmail->EditAttrs["class"] = "form-control";
		$this->WifeEmail->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->WifeEmail->CurrentValue = HtmlDecode($this->WifeEmail->CurrentValue);
		$this->WifeEmail->EditValue = $this->WifeEmail->CurrentValue;
		$this->WifeEmail->PlaceHolder = RemoveHtml($this->WifeEmail->caption());

		// HusbandEmail
		$this->HusbandEmail->EditAttrs["class"] = "form-control";
		$this->HusbandEmail->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HusbandEmail->CurrentValue = HtmlDecode($this->HusbandEmail->CurrentValue);
		$this->HusbandEmail->EditValue = $this->HusbandEmail->CurrentValue;
		$this->HusbandEmail->PlaceHolder = RemoveHtml($this->HusbandEmail->caption());

		// ARTCYCLE
		$this->ARTCYCLE->EditAttrs["class"] = "form-control";
		$this->ARTCYCLE->EditCustomAttributes = "";
		$this->ARTCYCLE->EditValue = $this->ARTCYCLE->options(TRUE);

		// RESULT
		$this->RESULT->EditAttrs["class"] = "form-control";
		$this->RESULT->EditCustomAttributes = "";
		$this->RESULT->EditValue = $this->RESULT->options(TRUE);

		// malepic
		$this->malepic->EditAttrs["class"] = "form-control";
		$this->malepic->EditCustomAttributes = "";
		$this->malepic->EditValue = $this->malepic->CurrentValue;
		$this->malepic->PlaceHolder = RemoveHtml($this->malepic->caption());

		// femalepic
		$this->femalepic->EditAttrs["class"] = "form-control";
		$this->femalepic->EditCustomAttributes = "";
		$this->femalepic->EditValue = $this->femalepic->CurrentValue;
		$this->femalepic->PlaceHolder = RemoveHtml($this->femalepic->caption());

		// Mgendar
		$this->Mgendar->EditAttrs["class"] = "form-control";
		$this->Mgendar->EditCustomAttributes = "";
		$this->Mgendar->EditValue = $this->Mgendar->CurrentValue;
		$this->Mgendar->PlaceHolder = RemoveHtml($this->Mgendar->caption());

		// Fgendar
		$this->Fgendar->EditAttrs["class"] = "form-control";
		$this->Fgendar->EditCustomAttributes = "";
		$this->Fgendar->EditValue = $this->Fgendar->CurrentValue;
		$this->Fgendar->PlaceHolder = RemoveHtml($this->Fgendar->caption());

		// CoupleID
		$this->CoupleID->EditAttrs["class"] = "form-control";
		$this->CoupleID->EditCustomAttributes = "";
		$this->CoupleID->EditValue = $this->CoupleID->CurrentValue;
		$this->CoupleID->ViewCustomAttributes = "";

		// HospID
		// PatientName

		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

		// PatientID
		$this->PatientID->EditAttrs["class"] = "form-control";
		$this->PatientID->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
		$this->PatientID->EditValue = $this->PatientID->CurrentValue;
		$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

		// PartnerName
		$this->PartnerName->EditAttrs["class"] = "form-control";
		$this->PartnerName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
		$this->PartnerName->EditValue = $this->PartnerName->CurrentValue;
		$this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

		// PartnerID
		$this->PartnerID->EditAttrs["class"] = "form-control";
		$this->PartnerID->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
		$this->PartnerID->EditValue = $this->PartnerID->CurrentValue;
		$this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

		// DrID
		$this->DrID->EditAttrs["class"] = "form-control";
		$this->DrID->EditCustomAttributes = "";

		// DrDepartment
		$this->DrDepartment->EditAttrs["class"] = "form-control";
		$this->DrDepartment->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->DrDepartment->CurrentValue = HtmlDecode($this->DrDepartment->CurrentValue);
		$this->DrDepartment->EditValue = $this->DrDepartment->CurrentValue;
		$this->DrDepartment->PlaceHolder = RemoveHtml($this->DrDepartment->caption());

		// Doctor
		$this->Doctor->EditAttrs["class"] = "form-control";
		$this->Doctor->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
		$this->Doctor->EditValue = $this->Doctor->CurrentValue;
		$this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

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
					$doc->exportCaption($this->Male);
					$doc->exportCaption($this->Female);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->malepropic);
					$doc->exportCaption($this->femalepropic);
					$doc->exportCaption($this->HusbandEducation);
					$doc->exportCaption($this->WifeEducation);
					$doc->exportCaption($this->HusbandWorkHours);
					$doc->exportCaption($this->WifeWorkHours);
					$doc->exportCaption($this->PatientLanguage);
					$doc->exportCaption($this->ReferedBy);
					$doc->exportCaption($this->ReferPhNo);
					$doc->exportCaption($this->WifeCell);
					$doc->exportCaption($this->HusbandCell);
					$doc->exportCaption($this->WifeEmail);
					$doc->exportCaption($this->HusbandEmail);
					$doc->exportCaption($this->ARTCYCLE);
					$doc->exportCaption($this->RESULT);
					$doc->exportCaption($this->malepic);
					$doc->exportCaption($this->femalepic);
					$doc->exportCaption($this->Mgendar);
					$doc->exportCaption($this->Fgendar);
					$doc->exportCaption($this->CoupleID);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->PartnerName);
					$doc->exportCaption($this->PartnerID);
					$doc->exportCaption($this->DrID);
					$doc->exportCaption($this->DrDepartment);
					$doc->exportCaption($this->Doctor);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->Male);
					$doc->exportCaption($this->Female);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->malepropic);
					$doc->exportCaption($this->femalepropic);
					$doc->exportCaption($this->HusbandEducation);
					$doc->exportCaption($this->WifeEducation);
					$doc->exportCaption($this->HusbandWorkHours);
					$doc->exportCaption($this->WifeWorkHours);
					$doc->exportCaption($this->PatientLanguage);
					$doc->exportCaption($this->ReferedBy);
					$doc->exportCaption($this->ReferPhNo);
					$doc->exportCaption($this->WifeCell);
					$doc->exportCaption($this->HusbandCell);
					$doc->exportCaption($this->WifeEmail);
					$doc->exportCaption($this->HusbandEmail);
					$doc->exportCaption($this->ARTCYCLE);
					$doc->exportCaption($this->RESULT);
					$doc->exportCaption($this->CoupleID);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->PartnerName);
					$doc->exportCaption($this->PartnerID);
					$doc->exportCaption($this->DrID);
					$doc->exportCaption($this->DrDepartment);
					$doc->exportCaption($this->Doctor);
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
						$doc->exportField($this->Male);
						$doc->exportField($this->Female);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->malepropic);
						$doc->exportField($this->femalepropic);
						$doc->exportField($this->HusbandEducation);
						$doc->exportField($this->WifeEducation);
						$doc->exportField($this->HusbandWorkHours);
						$doc->exportField($this->WifeWorkHours);
						$doc->exportField($this->PatientLanguage);
						$doc->exportField($this->ReferedBy);
						$doc->exportField($this->ReferPhNo);
						$doc->exportField($this->WifeCell);
						$doc->exportField($this->HusbandCell);
						$doc->exportField($this->WifeEmail);
						$doc->exportField($this->HusbandEmail);
						$doc->exportField($this->ARTCYCLE);
						$doc->exportField($this->RESULT);
						$doc->exportField($this->malepic);
						$doc->exportField($this->femalepic);
						$doc->exportField($this->Mgendar);
						$doc->exportField($this->Fgendar);
						$doc->exportField($this->CoupleID);
						$doc->exportField($this->HospID);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->PatientID);
						$doc->exportField($this->PartnerName);
						$doc->exportField($this->PartnerID);
						$doc->exportField($this->DrID);
						$doc->exportField($this->DrDepartment);
						$doc->exportField($this->Doctor);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->Male);
						$doc->exportField($this->Female);
						$doc->exportField($this->status);
						$doc->exportField($this->malepropic);
						$doc->exportField($this->femalepropic);
						$doc->exportField($this->HusbandEducation);
						$doc->exportField($this->WifeEducation);
						$doc->exportField($this->HusbandWorkHours);
						$doc->exportField($this->WifeWorkHours);
						$doc->exportField($this->PatientLanguage);
						$doc->exportField($this->ReferedBy);
						$doc->exportField($this->ReferPhNo);
						$doc->exportField($this->WifeCell);
						$doc->exportField($this->HusbandCell);
						$doc->exportField($this->WifeEmail);
						$doc->exportField($this->HusbandEmail);
						$doc->exportField($this->ARTCYCLE);
						$doc->exportField($this->RESULT);
						$doc->exportField($this->CoupleID);
						$doc->exportField($this->HospID);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->PatientID);
						$doc->exportField($this->PartnerName);
						$doc->exportField($this->PartnerID);
						$doc->exportField($this->DrID);
						$doc->exportField($this->DrDepartment);
						$doc->exportField($this->Doctor);
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
		global $COMPOSITE_KEY_SEPARATOR;

		// Set up field name / file name field / file type field
		$fldName = "";
		$fileNameFld = "";
		$fileTypeFld = "";
		if ($fldparm == 'malepropic') {
			$fldName = "malepropic";
			$fileNameFld = "malepropic";
		} elseif ($fldparm == 'femalepropic') {
			$fldName = "femalepropic";
			$fileNameFld = "femalepropic";
		} else {
			return FALSE; // Incorrect field
		}

		// Set up key values
		$ar = explode($COMPOSITE_KEY_SEPARATOR, $key);
		if (count($ar) == 1) {
			$this->id->CurrentValue = $ar[0];
		} else {
			return FALSE; // Incorrect key
		}

		// Set up filter (WHERE Clause)
		$filter = $this->getRecordFilter();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$dbtype = GetConnectionType($this->Dbid);
		if (($rs = $conn->execute($sql)) && !$rs->EOF) {
			$val = $rs->fields($fldName);
			if (!EmptyValue($val)) {
				$fld = $this->fields[$fldName];

				// Binary data
				if ($fld->DataType == DATATYPE_BLOB) {
					if ($dbtype <> "MYSQL") {
						if (is_array($val) || is_object($val)) // Byte array
							$val = BytesToString($val);
					}
					if ($resize)
						ResizeBinary($val, $width, $height);

					// Write file type
					if ($fileTypeFld <> "" && !EmptyValue($rs->fields($fileTypeFld))) {
						AddHeader("Content-type", $rs->fields($fileTypeFld));
					} else {
						AddHeader("Content-type", ContentType($val));
					}

					// Write file name
					if ($fileNameFld <> "" && !EmptyValue($rs->fields($fileNameFld)))
						AddHeader("Content-Disposition", "attachment; filename=\"" . $rs->fields($fileNameFld) . "\"");

					// Write file data
					if (StartsString("PK", $val) && ContainsString($val, "[Content_Types].xml") &&
						ContainsString($val, "_rels") && ContainsString($val, "docProps")) { // Fix Office 2007 documents
						if (!EndsString("\0\0\0", $val)) // Not ends with 3 or 4 \0
							$val .= "\0\0\0\0";
					}

					// Clear output buffer
					if (ob_get_length())
						ob_end_clean();

					// Write binary data
					Write($val);

				// Upload to folder
				} else {
					if ($fld->UploadMultiple)
						$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
					else
						$files = [$val];
					$data = [];
					$ar = [];
					foreach ($files as $file) {
						if (!EmptyValue($file))
							$ar[$file] = FullUrl($fld->hrefPath() . $file);
					}
					$data[$fld->Param] = $ar;
					WriteJson($data);
				}
			}
			$rs->close();
			return TRUE;
		}
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

			$rsnew["malepropic"] = $rsnew["malepic"];
			$rsnew["femalepropic"] = $rsnew["femalepic"];
			$Mgendar = $rsnew["Mgendar"];
			$Fgendar = $rsnew["Fgendar"];
				if($Mgendar=="")
				{
					$this->setFailureMessage("Please Select Partner Gender...");
					return FALSE;
				}
				if($Mgendar!="Male")
				{
					$this->setFailureMessage("Please Select Partner as Male Gender...");
					return FALSE;
				}
				if($Fgendar=="")
				{
					$this->setFailureMessage("Please Select Patient Gender...");
					return FALSE;
				}
				if($Fgendar!="Female")
				{
					$this->setFailureMessage("Please Select Patient as Female Gender...");
					return FALSE;
				}
				if($Fgendar==$Mgendar)
				{
					$this->setFailureMessage("Patient and Partner Gender can not be same...");
					return FALSE;
				}
			$UserProfile = new UserProfile();
			$id =  $UserProfile->Profile['id'];
			$HospID =  $UserProfile->Profile['HospID'];

		//	$hospital_PreFixCode = $UserProfile->Profile['hospital_PreFixCode'];
			if($hospital_PreFixCode == "")
			{
				getHospitalDetails($HospID);
				$UserProfile = new UserProfile();

			//	$hospital_PreFixCode = $UserProfile->Profile['hospital_PreFixCode'];
			}

		//	$rsnew["CoupleID"] =  'A4FC'. getCoupleID($HospID);
		$rsnew["CoupleID"] = $rsnew["PatientID"];
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

			$rsnew["malepropic"] = $rsnew["malepic"];
			$rsnew["femalepropic"] = $rsnew["femalepic"];
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