<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_template_for_et
 */
class view_template_for_et extends DbTable
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
	public $HospID;
	public $PatientName;
	public $PatientID;
	public $PartnerName;
	public $PartnerID;
	public $RIDNO;
	public $Treatment;
	public $Ectopic;
	public $OPUDATE;
	public $ERA;
	public $PatientAge;
	public $PartnerAge;
	public $FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET;
	public $AFTER_HYSTEROSCOPY;
	public $AFTER_ERA;
	public $HRT;
	public $XGRAST2FPRP;
	public $EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C;
	public $LMWH_40MG;
	public $DF_hCG;
	public $Implantation_rate;
	public $Type_of_preg;
	public $MISCARRIAGE_EARLY_2F_LATE;
	public $ANC;
	public $NICU_ADMISSION;
	public $anomalies;
	public $baby_wt;
	public $GA_at_delivery;
	public $Pregnancy_outcome;
	public $DELIVERED_HOSPITAL;
	public $DOCTOR;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_template_for_et';
		$this->TableName = 'view_template_for_et';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_template_for_et`";
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
		$this->id = new DbField('view_template_for_et', 'view_template_for_et', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// HospID
		$this->HospID = new DbField('view_template_for_et', 'view_template_for_et', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// PatientName
		$this->PatientName = new DbField('view_template_for_et', 'view_template_for_et', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// PatientID
		$this->PatientID = new DbField('view_template_for_et', 'view_template_for_et', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, -1, FALSE, '`PatientID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientID->Sortable = TRUE; // Allow sort
		$this->fields['PatientID'] = &$this->PatientID;

		// PartnerName
		$this->PartnerName = new DbField('view_template_for_et', 'view_template_for_et', 'x_PartnerName', 'PartnerName', '`PartnerName`', '`PartnerName`', 200, -1, FALSE, '`PartnerName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerName->Sortable = TRUE; // Allow sort
		$this->fields['PartnerName'] = &$this->PartnerName;

		// PartnerID
		$this->PartnerID = new DbField('view_template_for_et', 'view_template_for_et', 'x_PartnerID', 'PartnerID', '`PartnerID`', '`PartnerID`', 200, -1, FALSE, '`PartnerID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerID->Sortable = TRUE; // Allow sort
		$this->fields['PartnerID'] = &$this->PartnerID;

		// RIDNO
		$this->RIDNO = new DbField('view_template_for_et', 'view_template_for_et', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, -1, FALSE, '`RIDNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNO->Sortable = TRUE; // Allow sort
		$this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNO'] = &$this->RIDNO;

		// Treatment
		$this->Treatment = new DbField('view_template_for_et', 'view_template_for_et', 'x_Treatment', 'Treatment', '`Treatment`', '`Treatment`', 200, -1, FALSE, '`Treatment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Treatment->Sortable = TRUE; // Allow sort
		$this->fields['Treatment'] = &$this->Treatment;

		// Ectopic
		$this->Ectopic = new DbField('view_template_for_et', 'view_template_for_et', 'x_Ectopic', 'Ectopic', '`Ectopic`', '`Ectopic`', 201, -1, FALSE, '`Ectopic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Ectopic->Nullable = FALSE; // NOT NULL field
		$this->Ectopic->Required = TRUE; // Required field
		$this->Ectopic->Sortable = TRUE; // Allow sort
		$this->fields['Ectopic'] = &$this->Ectopic;

		// OPUDATE
		$this->OPUDATE = new DbField('view_template_for_et', 'view_template_for_et', 'x_OPUDATE', 'OPUDATE', '`OPUDATE`', CastDateFieldForLike('`OPUDATE`', 0, "DB"), 135, 0, FALSE, '`OPUDATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OPUDATE->Sortable = TRUE; // Allow sort
		$this->OPUDATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['OPUDATE'] = &$this->OPUDATE;

		// ERA
		$this->ERA = new DbField('view_template_for_et', 'view_template_for_et', 'x_ERA', 'ERA', '`ERA`', '`ERA`', 201, -1, FALSE, '`ERA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ERA->Nullable = FALSE; // NOT NULL field
		$this->ERA->Required = TRUE; // Required field
		$this->ERA->Sortable = TRUE; // Allow sort
		$this->fields['ERA'] = &$this->ERA;

		// PatientAge
		$this->PatientAge = new DbField('view_template_for_et', 'view_template_for_et', 'x_PatientAge', 'PatientAge', '`PatientAge`', '`PatientAge`', 200, -1, FALSE, '`PatientAge`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientAge->Sortable = TRUE; // Allow sort
		$this->fields['PatientAge'] = &$this->PatientAge;

		// PartnerAge
		$this->PartnerAge = new DbField('view_template_for_et', 'view_template_for_et', 'x_PartnerAge', 'PartnerAge', '`PartnerAge`', '`PartnerAge`', 200, -1, FALSE, '`PartnerAge`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerAge->Sortable = TRUE; // Allow sort
		$this->fields['PartnerAge'] = &$this->PartnerAge;

		// FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET
		$this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET = new DbField('view_template_for_et', 'view_template_for_et', 'x_FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET', 'FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET', '`FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET`', '`FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET`', 201, -1, FALSE, '`FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET->Nullable = FALSE; // NOT NULL field
		$this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET->Required = TRUE; // Required field
		$this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET->Sortable = TRUE; // Allow sort
		$this->fields['FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET'] = &$this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET;

		// AFTER HYSTEROSCOPY
		$this->AFTER_HYSTEROSCOPY = new DbField('view_template_for_et', 'view_template_for_et', 'x_AFTER_HYSTEROSCOPY', 'AFTER HYSTEROSCOPY', '`AFTER HYSTEROSCOPY`', '`AFTER HYSTEROSCOPY`', 201, -1, FALSE, '`AFTER HYSTEROSCOPY`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->AFTER_HYSTEROSCOPY->Nullable = FALSE; // NOT NULL field
		$this->AFTER_HYSTEROSCOPY->Required = TRUE; // Required field
		$this->AFTER_HYSTEROSCOPY->Sortable = TRUE; // Allow sort
		$this->fields['AFTER HYSTEROSCOPY'] = &$this->AFTER_HYSTEROSCOPY;

		// AFTER ERA
		$this->AFTER_ERA = new DbField('view_template_for_et', 'view_template_for_et', 'x_AFTER_ERA', 'AFTER ERA', '`AFTER ERA`', '`AFTER ERA`', 201, -1, FALSE, '`AFTER ERA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->AFTER_ERA->Nullable = FALSE; // NOT NULL field
		$this->AFTER_ERA->Required = TRUE; // Required field
		$this->AFTER_ERA->Sortable = TRUE; // Allow sort
		$this->fields['AFTER ERA'] = &$this->AFTER_ERA;

		// HRT
		$this->HRT = new DbField('view_template_for_et', 'view_template_for_et', 'x_HRT', 'HRT', '`HRT`', '`HRT`', 201, -1, FALSE, '`HRT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->HRT->Nullable = FALSE; // NOT NULL field
		$this->HRT->Required = TRUE; // Required field
		$this->HRT->Sortable = TRUE; // Allow sort
		$this->fields['HRT'] = &$this->HRT;

		// XGRAST/PRP
		$this->XGRAST2FPRP = new DbField('view_template_for_et', 'view_template_for_et', 'x_XGRAST2FPRP', 'XGRAST/PRP', '`XGRAST/PRP`', '`XGRAST/PRP`', 201, -1, FALSE, '`XGRAST/PRP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->XGRAST2FPRP->Nullable = FALSE; // NOT NULL field
		$this->XGRAST2FPRP->Required = TRUE; // Required field
		$this->XGRAST2FPRP->Sortable = TRUE; // Allow sort
		$this->fields['XGRAST/PRP'] = &$this->XGRAST2FPRP;

		// EMBRYO DETAILS DAY 3/ 5, A, B, C
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C = new DbField('view_template_for_et', 'view_template_for_et', 'x_EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C', 'EMBRYO DETAILS DAY 3/ 5, A, B, C', '`EMBRYO DETAILS DAY 3/ 5, A, B, C`', '`EMBRYO DETAILS DAY 3/ 5, A, B, C`', 201, -1, FALSE, '`EMBRYO DETAILS DAY 3/ 5, A, B, C`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->Nullable = FALSE; // NOT NULL field
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->Required = TRUE; // Required field
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->Sortable = TRUE; // Allow sort
		$this->fields['EMBRYO DETAILS DAY 3/ 5, A, B, C'] = &$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C;

		// LMWH 40MG
		$this->LMWH_40MG = new DbField('view_template_for_et', 'view_template_for_et', 'x_LMWH_40MG', 'LMWH 40MG', '`LMWH 40MG`', '`LMWH 40MG`', 201, -1, FALSE, '`LMWH 40MG`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->LMWH_40MG->Nullable = FALSE; // NOT NULL field
		$this->LMWH_40MG->Required = TRUE; // Required field
		$this->LMWH_40MG->Sortable = TRUE; // Allow sort
		$this->fields['LMWH 40MG'] = &$this->LMWH_40MG;

		// ß-hCG
		$this->DF_hCG = new DbField('view_template_for_et', 'view_template_for_et', 'x_DF_hCG', 'ß-hCG', '`ß-hCG`', '`ß-hCG`', 201, -1, FALSE, '`ß-hCG`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->DF_hCG->Nullable = FALSE; // NOT NULL field
		$this->DF_hCG->Required = TRUE; // Required field
		$this->DF_hCG->Sortable = TRUE; // Allow sort
		$this->fields['ß-hCG'] = &$this->DF_hCG;

		// Implantation rate
		$this->Implantation_rate = new DbField('view_template_for_et', 'view_template_for_et', 'x_Implantation_rate', 'Implantation rate', '`Implantation rate`', '`Implantation rate`', 201, -1, FALSE, '`Implantation rate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Implantation_rate->Nullable = FALSE; // NOT NULL field
		$this->Implantation_rate->Required = TRUE; // Required field
		$this->Implantation_rate->Sortable = TRUE; // Allow sort
		$this->fields['Implantation rate'] = &$this->Implantation_rate;

		// Type of preg
		$this->Type_of_preg = new DbField('view_template_for_et', 'view_template_for_et', 'x_Type_of_preg', 'Type of preg', '`Type of preg`', '`Type of preg`', 201, -1, FALSE, '`Type of preg`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Type_of_preg->Nullable = FALSE; // NOT NULL field
		$this->Type_of_preg->Required = TRUE; // Required field
		$this->Type_of_preg->Sortable = TRUE; // Allow sort
		$this->fields['Type of preg'] = &$this->Type_of_preg;

		// MISCARRIAGE EARLY / LATE
		$this->MISCARRIAGE_EARLY_2F_LATE = new DbField('view_template_for_et', 'view_template_for_et', 'x_MISCARRIAGE_EARLY_2F_LATE', 'MISCARRIAGE EARLY / LATE', '`MISCARRIAGE EARLY / LATE`', '`MISCARRIAGE EARLY / LATE`', 201, -1, FALSE, '`MISCARRIAGE EARLY / LATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->MISCARRIAGE_EARLY_2F_LATE->Nullable = FALSE; // NOT NULL field
		$this->MISCARRIAGE_EARLY_2F_LATE->Required = TRUE; // Required field
		$this->MISCARRIAGE_EARLY_2F_LATE->Sortable = TRUE; // Allow sort
		$this->fields['MISCARRIAGE EARLY / LATE'] = &$this->MISCARRIAGE_EARLY_2F_LATE;

		// ANC
		$this->ANC = new DbField('view_template_for_et', 'view_template_for_et', 'x_ANC', 'ANC', '`ANC`', '`ANC`', 201, -1, FALSE, '`ANC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ANC->Nullable = FALSE; // NOT NULL field
		$this->ANC->Required = TRUE; // Required field
		$this->ANC->Sortable = TRUE; // Allow sort
		$this->fields['ANC'] = &$this->ANC;

		// NICU ADMISSION
		$this->NICU_ADMISSION = new DbField('view_template_for_et', 'view_template_for_et', 'x_NICU_ADMISSION', 'NICU ADMISSION', '`NICU ADMISSION`', '`NICU ADMISSION`', 201, -1, FALSE, '`NICU ADMISSION`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->NICU_ADMISSION->Nullable = FALSE; // NOT NULL field
		$this->NICU_ADMISSION->Required = TRUE; // Required field
		$this->NICU_ADMISSION->Sortable = TRUE; // Allow sort
		$this->fields['NICU ADMISSION'] = &$this->NICU_ADMISSION;

		// anomalies
		$this->anomalies = new DbField('view_template_for_et', 'view_template_for_et', 'x_anomalies', 'anomalies', '`anomalies`', '`anomalies`', 201, -1, FALSE, '`anomalies`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->anomalies->Nullable = FALSE; // NOT NULL field
		$this->anomalies->Required = TRUE; // Required field
		$this->anomalies->Sortable = TRUE; // Allow sort
		$this->fields['anomalies'] = &$this->anomalies;

		// baby wt
		$this->baby_wt = new DbField('view_template_for_et', 'view_template_for_et', 'x_baby_wt', 'baby wt', '`baby wt`', '`baby wt`', 201, -1, FALSE, '`baby wt`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->baby_wt->Nullable = FALSE; // NOT NULL field
		$this->baby_wt->Required = TRUE; // Required field
		$this->baby_wt->Sortable = TRUE; // Allow sort
		$this->fields['baby wt'] = &$this->baby_wt;

		// GA at delivery
		$this->GA_at_delivery = new DbField('view_template_for_et', 'view_template_for_et', 'x_GA_at_delivery', 'GA at delivery', '`GA at delivery`', '`GA at delivery`', 201, -1, FALSE, '`GA at delivery`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->GA_at_delivery->Nullable = FALSE; // NOT NULL field
		$this->GA_at_delivery->Required = TRUE; // Required field
		$this->GA_at_delivery->Sortable = TRUE; // Allow sort
		$this->fields['GA at delivery'] = &$this->GA_at_delivery;

		// Pregnancy outcome
		$this->Pregnancy_outcome = new DbField('view_template_for_et', 'view_template_for_et', 'x_Pregnancy_outcome', 'Pregnancy outcome', '`Pregnancy outcome`', '`Pregnancy outcome`', 201, -1, FALSE, '`Pregnancy outcome`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Pregnancy_outcome->Nullable = FALSE; // NOT NULL field
		$this->Pregnancy_outcome->Required = TRUE; // Required field
		$this->Pregnancy_outcome->Sortable = TRUE; // Allow sort
		$this->fields['Pregnancy outcome'] = &$this->Pregnancy_outcome;

		// DELIVERED HOSPITAL
		$this->DELIVERED_HOSPITAL = new DbField('view_template_for_et', 'view_template_for_et', 'x_DELIVERED_HOSPITAL', 'DELIVERED HOSPITAL', '`DELIVERED HOSPITAL`', '`DELIVERED HOSPITAL`', 201, -1, FALSE, '`DELIVERED HOSPITAL`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->DELIVERED_HOSPITAL->Nullable = FALSE; // NOT NULL field
		$this->DELIVERED_HOSPITAL->Required = TRUE; // Required field
		$this->DELIVERED_HOSPITAL->Sortable = TRUE; // Allow sort
		$this->fields['DELIVERED HOSPITAL'] = &$this->DELIVERED_HOSPITAL;

		// DOCTOR
		$this->DOCTOR = new DbField('view_template_for_et', 'view_template_for_et', 'x_DOCTOR', 'DOCTOR', '`DOCTOR`', '`DOCTOR`', 201, -1, FALSE, '`DOCTOR`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->DOCTOR->Nullable = FALSE; // NOT NULL field
		$this->DOCTOR->Required = TRUE; // Required field
		$this->DOCTOR->Sortable = TRUE; // Allow sort
		$this->fields['DOCTOR'] = &$this->DOCTOR;
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

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_template_for_et`";
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
		$this->HospID->DbValue = $row['HospID'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->PatientID->DbValue = $row['PatientID'];
		$this->PartnerName->DbValue = $row['PartnerName'];
		$this->PartnerID->DbValue = $row['PartnerID'];
		$this->RIDNO->DbValue = $row['RIDNO'];
		$this->Treatment->DbValue = $row['Treatment'];
		$this->Ectopic->DbValue = $row['Ectopic'];
		$this->OPUDATE->DbValue = $row['OPUDATE'];
		$this->ERA->DbValue = $row['ERA'];
		$this->PatientAge->DbValue = $row['PatientAge'];
		$this->PartnerAge->DbValue = $row['PartnerAge'];
		$this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET->DbValue = $row['FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET'];
		$this->AFTER_HYSTEROSCOPY->DbValue = $row['AFTER HYSTEROSCOPY'];
		$this->AFTER_ERA->DbValue = $row['AFTER ERA'];
		$this->HRT->DbValue = $row['HRT'];
		$this->XGRAST2FPRP->DbValue = $row['XGRAST/PRP'];
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->DbValue = $row['EMBRYO DETAILS DAY 3/ 5, A, B, C'];
		$this->LMWH_40MG->DbValue = $row['LMWH 40MG'];
		$this->DF_hCG->DbValue = $row['ß-hCG'];
		$this->Implantation_rate->DbValue = $row['Implantation rate'];
		$this->Type_of_preg->DbValue = $row['Type of preg'];
		$this->MISCARRIAGE_EARLY_2F_LATE->DbValue = $row['MISCARRIAGE EARLY / LATE'];
		$this->ANC->DbValue = $row['ANC'];
		$this->NICU_ADMISSION->DbValue = $row['NICU ADMISSION'];
		$this->anomalies->DbValue = $row['anomalies'];
		$this->baby_wt->DbValue = $row['baby wt'];
		$this->GA_at_delivery->DbValue = $row['GA at delivery'];
		$this->Pregnancy_outcome->DbValue = $row['Pregnancy outcome'];
		$this->DELIVERED_HOSPITAL->DbValue = $row['DELIVERED HOSPITAL'];
		$this->DOCTOR->DbValue = $row['DOCTOR'];
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
			return "view_template_for_etlist.php";
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
		if ($pageName == "view_template_for_etview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_template_for_etedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_template_for_etadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_template_for_etlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_template_for_etview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_template_for_etview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_template_for_etadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_template_for_etadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_template_for_etedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_template_for_etadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_template_for_etdelete.php", $this->getUrlParm());
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
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->PatientID->setDbValue($rs->fields('PatientID'));
		$this->PartnerName->setDbValue($rs->fields('PartnerName'));
		$this->PartnerID->setDbValue($rs->fields('PartnerID'));
		$this->RIDNO->setDbValue($rs->fields('RIDNO'));
		$this->Treatment->setDbValue($rs->fields('Treatment'));
		$this->Ectopic->setDbValue($rs->fields('Ectopic'));
		$this->OPUDATE->setDbValue($rs->fields('OPUDATE'));
		$this->ERA->setDbValue($rs->fields('ERA'));
		$this->PatientAge->setDbValue($rs->fields('PatientAge'));
		$this->PartnerAge->setDbValue($rs->fields('PartnerAge'));
		$this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET->setDbValue($rs->fields('FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET'));
		$this->AFTER_HYSTEROSCOPY->setDbValue($rs->fields('AFTER HYSTEROSCOPY'));
		$this->AFTER_ERA->setDbValue($rs->fields('AFTER ERA'));
		$this->HRT->setDbValue($rs->fields('HRT'));
		$this->XGRAST2FPRP->setDbValue($rs->fields('XGRAST/PRP'));
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->setDbValue($rs->fields('EMBRYO DETAILS DAY 3/ 5, A, B, C'));
		$this->LMWH_40MG->setDbValue($rs->fields('LMWH 40MG'));
		$this->DF_hCG->setDbValue($rs->fields('ß-hCG'));
		$this->Implantation_rate->setDbValue($rs->fields('Implantation rate'));
		$this->Type_of_preg->setDbValue($rs->fields('Type of preg'));
		$this->MISCARRIAGE_EARLY_2F_LATE->setDbValue($rs->fields('MISCARRIAGE EARLY / LATE'));
		$this->ANC->setDbValue($rs->fields('ANC'));
		$this->NICU_ADMISSION->setDbValue($rs->fields('NICU ADMISSION'));
		$this->anomalies->setDbValue($rs->fields('anomalies'));
		$this->baby_wt->setDbValue($rs->fields('baby wt'));
		$this->GA_at_delivery->setDbValue($rs->fields('GA at delivery'));
		$this->Pregnancy_outcome->setDbValue($rs->fields('Pregnancy outcome'));
		$this->DELIVERED_HOSPITAL->setDbValue($rs->fields('DELIVERED HOSPITAL'));
		$this->DOCTOR->setDbValue($rs->fields('DOCTOR'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// HospID
		// PatientName
		// PatientID
		// PartnerName
		// PartnerID
		// RIDNO
		// Treatment
		// Ectopic
		// OPUDATE
		// ERA
		// PatientAge
		// PartnerAge
		// FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET
		// AFTER HYSTEROSCOPY
		// AFTER ERA
		// HRT
		// XGRAST/PRP
		// EMBRYO DETAILS DAY 3/ 5, A, B, C
		// LMWH 40MG
		// ß-hCG
		// Implantation rate
		// Type of preg
		// MISCARRIAGE EARLY / LATE
		// ANC
		// NICU ADMISSION
		// anomalies
		// baby wt
		// GA at delivery
		// Pregnancy outcome
		// DELIVERED HOSPITAL
		// DOCTOR
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

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

		// RIDNO
		$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
		$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
		$this->RIDNO->ViewCustomAttributes = "";

		// Treatment
		$this->Treatment->ViewValue = $this->Treatment->CurrentValue;
		$this->Treatment->ViewCustomAttributes = "";

		// Ectopic
		$this->Ectopic->ViewValue = $this->Ectopic->CurrentValue;
		$this->Ectopic->ViewCustomAttributes = "";

		// OPUDATE
		$this->OPUDATE->ViewValue = $this->OPUDATE->CurrentValue;
		$this->OPUDATE->ViewValue = FormatDateTime($this->OPUDATE->ViewValue, 0);
		$this->OPUDATE->ViewCustomAttributes = "";

		// ERA
		$this->ERA->ViewValue = $this->ERA->CurrentValue;
		$this->ERA->ViewCustomAttributes = "";

		// PatientAge
		$this->PatientAge->ViewValue = $this->PatientAge->CurrentValue;
		$this->PatientAge->ViewCustomAttributes = "";

		// PartnerAge
		$this->PartnerAge->ViewValue = $this->PartnerAge->CurrentValue;
		$this->PartnerAge->ViewCustomAttributes = "";

		// FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET
		$this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET->ViewValue = $this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET->CurrentValue;
		$this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET->ViewCustomAttributes = "";

		// AFTER HYSTEROSCOPY
		$this->AFTER_HYSTEROSCOPY->ViewValue = $this->AFTER_HYSTEROSCOPY->CurrentValue;
		$this->AFTER_HYSTEROSCOPY->ViewCustomAttributes = "";

		// AFTER ERA
		$this->AFTER_ERA->ViewValue = $this->AFTER_ERA->CurrentValue;
		$this->AFTER_ERA->ViewCustomAttributes = "";

		// HRT
		$this->HRT->ViewValue = $this->HRT->CurrentValue;
		$this->HRT->ViewCustomAttributes = "";

		// XGRAST/PRP
		$this->XGRAST2FPRP->ViewValue = $this->XGRAST2FPRP->CurrentValue;
		$this->XGRAST2FPRP->ViewCustomAttributes = "";

		// EMBRYO DETAILS DAY 3/ 5, A, B, C
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->ViewValue = $this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->CurrentValue;
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->ViewCustomAttributes = "";

		// LMWH 40MG
		$this->LMWH_40MG->ViewValue = $this->LMWH_40MG->CurrentValue;
		$this->LMWH_40MG->ViewCustomAttributes = "";

		// ß-hCG
		$this->DF_hCG->ViewValue = $this->DF_hCG->CurrentValue;
		$this->DF_hCG->ViewCustomAttributes = "";

		// Implantation rate
		$this->Implantation_rate->ViewValue = $this->Implantation_rate->CurrentValue;
		$this->Implantation_rate->ViewCustomAttributes = "";

		// Type of preg
		$this->Type_of_preg->ViewValue = $this->Type_of_preg->CurrentValue;
		$this->Type_of_preg->ViewCustomAttributes = "";

		// MISCARRIAGE EARLY / LATE
		$this->MISCARRIAGE_EARLY_2F_LATE->ViewValue = $this->MISCARRIAGE_EARLY_2F_LATE->CurrentValue;
		$this->MISCARRIAGE_EARLY_2F_LATE->ViewCustomAttributes = "";

		// ANC
		$this->ANC->ViewValue = $this->ANC->CurrentValue;
		$this->ANC->ViewCustomAttributes = "";

		// NICU ADMISSION
		$this->NICU_ADMISSION->ViewValue = $this->NICU_ADMISSION->CurrentValue;
		$this->NICU_ADMISSION->ViewCustomAttributes = "";

		// anomalies
		$this->anomalies->ViewValue = $this->anomalies->CurrentValue;
		$this->anomalies->ViewCustomAttributes = "";

		// baby wt
		$this->baby_wt->ViewValue = $this->baby_wt->CurrentValue;
		$this->baby_wt->ViewCustomAttributes = "";

		// GA at delivery
		$this->GA_at_delivery->ViewValue = $this->GA_at_delivery->CurrentValue;
		$this->GA_at_delivery->ViewCustomAttributes = "";

		// Pregnancy outcome
		$this->Pregnancy_outcome->ViewValue = $this->Pregnancy_outcome->CurrentValue;
		$this->Pregnancy_outcome->ViewCustomAttributes = "";

		// DELIVERED HOSPITAL
		$this->DELIVERED_HOSPITAL->ViewValue = $this->DELIVERED_HOSPITAL->CurrentValue;
		$this->DELIVERED_HOSPITAL->ViewCustomAttributes = "";

		// DOCTOR
		$this->DOCTOR->ViewValue = $this->DOCTOR->CurrentValue;
		$this->DOCTOR->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

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

		// RIDNO
		$this->RIDNO->LinkCustomAttributes = "";
		$this->RIDNO->HrefValue = "";
		$this->RIDNO->TooltipValue = "";

		// Treatment
		$this->Treatment->LinkCustomAttributes = "";
		$this->Treatment->HrefValue = "";
		$this->Treatment->TooltipValue = "";

		// Ectopic
		$this->Ectopic->LinkCustomAttributes = "";
		$this->Ectopic->HrefValue = "";
		$this->Ectopic->TooltipValue = "";

		// OPUDATE
		$this->OPUDATE->LinkCustomAttributes = "";
		$this->OPUDATE->HrefValue = "";
		$this->OPUDATE->TooltipValue = "";

		// ERA
		$this->ERA->LinkCustomAttributes = "";
		$this->ERA->HrefValue = "";
		$this->ERA->TooltipValue = "";

		// PatientAge
		$this->PatientAge->LinkCustomAttributes = "";
		$this->PatientAge->HrefValue = "";
		$this->PatientAge->TooltipValue = "";

		// PartnerAge
		$this->PartnerAge->LinkCustomAttributes = "";
		$this->PartnerAge->HrefValue = "";
		$this->PartnerAge->TooltipValue = "";

		// FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET
		$this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET->LinkCustomAttributes = "";
		$this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET->HrefValue = "";
		$this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET->TooltipValue = "";

		// AFTER HYSTEROSCOPY
		$this->AFTER_HYSTEROSCOPY->LinkCustomAttributes = "";
		$this->AFTER_HYSTEROSCOPY->HrefValue = "";
		$this->AFTER_HYSTEROSCOPY->TooltipValue = "";

		// AFTER ERA
		$this->AFTER_ERA->LinkCustomAttributes = "";
		$this->AFTER_ERA->HrefValue = "";
		$this->AFTER_ERA->TooltipValue = "";

		// HRT
		$this->HRT->LinkCustomAttributes = "";
		$this->HRT->HrefValue = "";
		$this->HRT->TooltipValue = "";

		// XGRAST/PRP
		$this->XGRAST2FPRP->LinkCustomAttributes = "";
		$this->XGRAST2FPRP->HrefValue = "";
		$this->XGRAST2FPRP->TooltipValue = "";

		// EMBRYO DETAILS DAY 3/ 5, A, B, C
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->LinkCustomAttributes = "";
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->HrefValue = "";
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->TooltipValue = "";

		// LMWH 40MG
		$this->LMWH_40MG->LinkCustomAttributes = "";
		$this->LMWH_40MG->HrefValue = "";
		$this->LMWH_40MG->TooltipValue = "";

		// ß-hCG
		$this->DF_hCG->LinkCustomAttributes = "";
		$this->DF_hCG->HrefValue = "";
		$this->DF_hCG->TooltipValue = "";

		// Implantation rate
		$this->Implantation_rate->LinkCustomAttributes = "";
		$this->Implantation_rate->HrefValue = "";
		$this->Implantation_rate->TooltipValue = "";

		// Type of preg
		$this->Type_of_preg->LinkCustomAttributes = "";
		$this->Type_of_preg->HrefValue = "";
		$this->Type_of_preg->TooltipValue = "";

		// MISCARRIAGE EARLY / LATE
		$this->MISCARRIAGE_EARLY_2F_LATE->LinkCustomAttributes = "";
		$this->MISCARRIAGE_EARLY_2F_LATE->HrefValue = "";
		$this->MISCARRIAGE_EARLY_2F_LATE->TooltipValue = "";

		// ANC
		$this->ANC->LinkCustomAttributes = "";
		$this->ANC->HrefValue = "";
		$this->ANC->TooltipValue = "";

		// NICU ADMISSION
		$this->NICU_ADMISSION->LinkCustomAttributes = "";
		$this->NICU_ADMISSION->HrefValue = "";
		$this->NICU_ADMISSION->TooltipValue = "";

		// anomalies
		$this->anomalies->LinkCustomAttributes = "";
		$this->anomalies->HrefValue = "";
		$this->anomalies->TooltipValue = "";

		// baby wt
		$this->baby_wt->LinkCustomAttributes = "";
		$this->baby_wt->HrefValue = "";
		$this->baby_wt->TooltipValue = "";

		// GA at delivery
		$this->GA_at_delivery->LinkCustomAttributes = "";
		$this->GA_at_delivery->HrefValue = "";
		$this->GA_at_delivery->TooltipValue = "";

		// Pregnancy outcome
		$this->Pregnancy_outcome->LinkCustomAttributes = "";
		$this->Pregnancy_outcome->HrefValue = "";
		$this->Pregnancy_outcome->TooltipValue = "";

		// DELIVERED HOSPITAL
		$this->DELIVERED_HOSPITAL->LinkCustomAttributes = "";
		$this->DELIVERED_HOSPITAL->HrefValue = "";
		$this->DELIVERED_HOSPITAL->TooltipValue = "";

		// DOCTOR
		$this->DOCTOR->LinkCustomAttributes = "";
		$this->DOCTOR->HrefValue = "";
		$this->DOCTOR->TooltipValue = "";

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

		// HospID
		$this->HospID->EditAttrs["class"] = "form-control";
		$this->HospID->EditCustomAttributes = "";
		$this->HospID->EditValue = $this->HospID->CurrentValue;
		$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

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

		// RIDNO
		$this->RIDNO->EditAttrs["class"] = "form-control";
		$this->RIDNO->EditCustomAttributes = "";
		$this->RIDNO->EditValue = $this->RIDNO->CurrentValue;
		$this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

		// Treatment
		$this->Treatment->EditAttrs["class"] = "form-control";
		$this->Treatment->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Treatment->CurrentValue = HtmlDecode($this->Treatment->CurrentValue);
		$this->Treatment->EditValue = $this->Treatment->CurrentValue;
		$this->Treatment->PlaceHolder = RemoveHtml($this->Treatment->caption());

		// Ectopic
		$this->Ectopic->EditAttrs["class"] = "form-control";
		$this->Ectopic->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Ectopic->CurrentValue = HtmlDecode($this->Ectopic->CurrentValue);
		$this->Ectopic->EditValue = $this->Ectopic->CurrentValue;
		$this->Ectopic->PlaceHolder = RemoveHtml($this->Ectopic->caption());

		// OPUDATE
		$this->OPUDATE->EditAttrs["class"] = "form-control";
		$this->OPUDATE->EditCustomAttributes = "";
		$this->OPUDATE->EditValue = FormatDateTime($this->OPUDATE->CurrentValue, 8);
		$this->OPUDATE->PlaceHolder = RemoveHtml($this->OPUDATE->caption());

		// ERA
		$this->ERA->EditAttrs["class"] = "form-control";
		$this->ERA->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ERA->CurrentValue = HtmlDecode($this->ERA->CurrentValue);
		$this->ERA->EditValue = $this->ERA->CurrentValue;
		$this->ERA->PlaceHolder = RemoveHtml($this->ERA->caption());

		// PatientAge
		$this->PatientAge->EditAttrs["class"] = "form-control";
		$this->PatientAge->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientAge->CurrentValue = HtmlDecode($this->PatientAge->CurrentValue);
		$this->PatientAge->EditValue = $this->PatientAge->CurrentValue;
		$this->PatientAge->PlaceHolder = RemoveHtml($this->PatientAge->caption());

		// PartnerAge
		$this->PartnerAge->EditAttrs["class"] = "form-control";
		$this->PartnerAge->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PartnerAge->CurrentValue = HtmlDecode($this->PartnerAge->CurrentValue);
		$this->PartnerAge->EditValue = $this->PartnerAge->CurrentValue;
		$this->PartnerAge->PlaceHolder = RemoveHtml($this->PartnerAge->caption());

		// FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET
		$this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET->EditAttrs["class"] = "form-control";
		$this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET->EditCustomAttributes = "";
		$this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET->EditValue = $this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET->CurrentValue;
		$this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET->PlaceHolder = RemoveHtml($this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET->caption());

		// AFTER HYSTEROSCOPY
		$this->AFTER_HYSTEROSCOPY->EditAttrs["class"] = "form-control";
		$this->AFTER_HYSTEROSCOPY->EditCustomAttributes = "";
		$this->AFTER_HYSTEROSCOPY->EditValue = $this->AFTER_HYSTEROSCOPY->CurrentValue;
		$this->AFTER_HYSTEROSCOPY->PlaceHolder = RemoveHtml($this->AFTER_HYSTEROSCOPY->caption());

		// AFTER ERA
		$this->AFTER_ERA->EditAttrs["class"] = "form-control";
		$this->AFTER_ERA->EditCustomAttributes = "";
		$this->AFTER_ERA->EditValue = $this->AFTER_ERA->CurrentValue;
		$this->AFTER_ERA->PlaceHolder = RemoveHtml($this->AFTER_ERA->caption());

		// HRT
		$this->HRT->EditAttrs["class"] = "form-control";
		$this->HRT->EditCustomAttributes = "";
		$this->HRT->EditValue = $this->HRT->CurrentValue;
		$this->HRT->PlaceHolder = RemoveHtml($this->HRT->caption());

		// XGRAST/PRP
		$this->XGRAST2FPRP->EditAttrs["class"] = "form-control";
		$this->XGRAST2FPRP->EditCustomAttributes = "";
		$this->XGRAST2FPRP->EditValue = $this->XGRAST2FPRP->CurrentValue;
		$this->XGRAST2FPRP->PlaceHolder = RemoveHtml($this->XGRAST2FPRP->caption());

		// EMBRYO DETAILS DAY 3/ 5, A, B, C
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->EditAttrs["class"] = "form-control";
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->EditCustomAttributes = "";
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->EditValue = $this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->CurrentValue;
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->PlaceHolder = RemoveHtml($this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->caption());

		// LMWH 40MG
		$this->LMWH_40MG->EditAttrs["class"] = "form-control";
		$this->LMWH_40MG->EditCustomAttributes = "";
		$this->LMWH_40MG->EditValue = $this->LMWH_40MG->CurrentValue;
		$this->LMWH_40MG->PlaceHolder = RemoveHtml($this->LMWH_40MG->caption());

		// ß-hCG
		$this->DF_hCG->EditAttrs["class"] = "form-control";
		$this->DF_hCG->EditCustomAttributes = "";
		$this->DF_hCG->EditValue = $this->DF_hCG->CurrentValue;
		$this->DF_hCG->PlaceHolder = RemoveHtml($this->DF_hCG->caption());

		// Implantation rate
		$this->Implantation_rate->EditAttrs["class"] = "form-control";
		$this->Implantation_rate->EditCustomAttributes = "";
		$this->Implantation_rate->EditValue = $this->Implantation_rate->CurrentValue;
		$this->Implantation_rate->PlaceHolder = RemoveHtml($this->Implantation_rate->caption());

		// Type of preg
		$this->Type_of_preg->EditAttrs["class"] = "form-control";
		$this->Type_of_preg->EditCustomAttributes = "";
		$this->Type_of_preg->EditValue = $this->Type_of_preg->CurrentValue;
		$this->Type_of_preg->PlaceHolder = RemoveHtml($this->Type_of_preg->caption());

		// MISCARRIAGE EARLY / LATE
		$this->MISCARRIAGE_EARLY_2F_LATE->EditAttrs["class"] = "form-control";
		$this->MISCARRIAGE_EARLY_2F_LATE->EditCustomAttributes = "";
		$this->MISCARRIAGE_EARLY_2F_LATE->EditValue = $this->MISCARRIAGE_EARLY_2F_LATE->CurrentValue;
		$this->MISCARRIAGE_EARLY_2F_LATE->PlaceHolder = RemoveHtml($this->MISCARRIAGE_EARLY_2F_LATE->caption());

		// ANC
		$this->ANC->EditAttrs["class"] = "form-control";
		$this->ANC->EditCustomAttributes = "";
		$this->ANC->EditValue = $this->ANC->CurrentValue;
		$this->ANC->PlaceHolder = RemoveHtml($this->ANC->caption());

		// NICU ADMISSION
		$this->NICU_ADMISSION->EditAttrs["class"] = "form-control";
		$this->NICU_ADMISSION->EditCustomAttributes = "";
		$this->NICU_ADMISSION->EditValue = $this->NICU_ADMISSION->CurrentValue;
		$this->NICU_ADMISSION->PlaceHolder = RemoveHtml($this->NICU_ADMISSION->caption());

		// anomalies
		$this->anomalies->EditAttrs["class"] = "form-control";
		$this->anomalies->EditCustomAttributes = "";
		$this->anomalies->EditValue = $this->anomalies->CurrentValue;
		$this->anomalies->PlaceHolder = RemoveHtml($this->anomalies->caption());

		// baby wt
		$this->baby_wt->EditAttrs["class"] = "form-control";
		$this->baby_wt->EditCustomAttributes = "";
		$this->baby_wt->EditValue = $this->baby_wt->CurrentValue;
		$this->baby_wt->PlaceHolder = RemoveHtml($this->baby_wt->caption());

		// GA at delivery
		$this->GA_at_delivery->EditAttrs["class"] = "form-control";
		$this->GA_at_delivery->EditCustomAttributes = "";
		$this->GA_at_delivery->EditValue = $this->GA_at_delivery->CurrentValue;
		$this->GA_at_delivery->PlaceHolder = RemoveHtml($this->GA_at_delivery->caption());

		// Pregnancy outcome
		$this->Pregnancy_outcome->EditAttrs["class"] = "form-control";
		$this->Pregnancy_outcome->EditCustomAttributes = "";
		$this->Pregnancy_outcome->EditValue = $this->Pregnancy_outcome->CurrentValue;
		$this->Pregnancy_outcome->PlaceHolder = RemoveHtml($this->Pregnancy_outcome->caption());

		// DELIVERED HOSPITAL
		$this->DELIVERED_HOSPITAL->EditAttrs["class"] = "form-control";
		$this->DELIVERED_HOSPITAL->EditCustomAttributes = "";
		$this->DELIVERED_HOSPITAL->EditValue = $this->DELIVERED_HOSPITAL->CurrentValue;
		$this->DELIVERED_HOSPITAL->PlaceHolder = RemoveHtml($this->DELIVERED_HOSPITAL->caption());

		// DOCTOR
		$this->DOCTOR->EditAttrs["class"] = "form-control";
		$this->DOCTOR->EditCustomAttributes = "";
		$this->DOCTOR->EditValue = $this->DOCTOR->CurrentValue;
		$this->DOCTOR->PlaceHolder = RemoveHtml($this->DOCTOR->caption());

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
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->PartnerName);
					$doc->exportCaption($this->PartnerID);
					$doc->exportCaption($this->RIDNO);
					$doc->exportCaption($this->Treatment);
					$doc->exportCaption($this->Ectopic);
					$doc->exportCaption($this->OPUDATE);
					$doc->exportCaption($this->ERA);
					$doc->exportCaption($this->PatientAge);
					$doc->exportCaption($this->PartnerAge);
					$doc->exportCaption($this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET);
					$doc->exportCaption($this->AFTER_HYSTEROSCOPY);
					$doc->exportCaption($this->AFTER_ERA);
					$doc->exportCaption($this->HRT);
					$doc->exportCaption($this->XGRAST2FPRP);
					$doc->exportCaption($this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C);
					$doc->exportCaption($this->LMWH_40MG);
					$doc->exportCaption($this->DF_hCG);
					$doc->exportCaption($this->Implantation_rate);
					$doc->exportCaption($this->Type_of_preg);
					$doc->exportCaption($this->MISCARRIAGE_EARLY_2F_LATE);
					$doc->exportCaption($this->ANC);
					$doc->exportCaption($this->NICU_ADMISSION);
					$doc->exportCaption($this->anomalies);
					$doc->exportCaption($this->baby_wt);
					$doc->exportCaption($this->GA_at_delivery);
					$doc->exportCaption($this->Pregnancy_outcome);
					$doc->exportCaption($this->DELIVERED_HOSPITAL);
					$doc->exportCaption($this->DOCTOR);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->PartnerName);
					$doc->exportCaption($this->PartnerID);
					$doc->exportCaption($this->RIDNO);
					$doc->exportCaption($this->Treatment);
					$doc->exportCaption($this->Ectopic);
					$doc->exportCaption($this->OPUDATE);
					$doc->exportCaption($this->ERA);
					$doc->exportCaption($this->PatientAge);
					$doc->exportCaption($this->PartnerAge);
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
						$doc->exportField($this->HospID);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->PatientID);
						$doc->exportField($this->PartnerName);
						$doc->exportField($this->PartnerID);
						$doc->exportField($this->RIDNO);
						$doc->exportField($this->Treatment);
						$doc->exportField($this->Ectopic);
						$doc->exportField($this->OPUDATE);
						$doc->exportField($this->ERA);
						$doc->exportField($this->PatientAge);
						$doc->exportField($this->PartnerAge);
						$doc->exportField($this->FRESH_ET2F_FET2F_FRESH_OD_ET2F_OD_FET_2F_FRESH_DET2F_FROZEN_DET);
						$doc->exportField($this->AFTER_HYSTEROSCOPY);
						$doc->exportField($this->AFTER_ERA);
						$doc->exportField($this->HRT);
						$doc->exportField($this->XGRAST2FPRP);
						$doc->exportField($this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C);
						$doc->exportField($this->LMWH_40MG);
						$doc->exportField($this->DF_hCG);
						$doc->exportField($this->Implantation_rate);
						$doc->exportField($this->Type_of_preg);
						$doc->exportField($this->MISCARRIAGE_EARLY_2F_LATE);
						$doc->exportField($this->ANC);
						$doc->exportField($this->NICU_ADMISSION);
						$doc->exportField($this->anomalies);
						$doc->exportField($this->baby_wt);
						$doc->exportField($this->GA_at_delivery);
						$doc->exportField($this->Pregnancy_outcome);
						$doc->exportField($this->DELIVERED_HOSPITAL);
						$doc->exportField($this->DOCTOR);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->HospID);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->PatientID);
						$doc->exportField($this->PartnerName);
						$doc->exportField($this->PartnerID);
						$doc->exportField($this->RIDNO);
						$doc->exportField($this->Treatment);
						$doc->exportField($this->Ectopic);
						$doc->exportField($this->OPUDATE);
						$doc->exportField($this->ERA);
						$doc->exportField($this->PatientAge);
						$doc->exportField($this->PartnerAge);
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