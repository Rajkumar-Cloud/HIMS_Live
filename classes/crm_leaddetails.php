<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for crm_leaddetails
 */
class crm_leaddetails extends DbTable
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
	public $leadid;
	public $lead_no;
	public $_email;
	public $interest;
	public $firstname;
	public $salutation;
	public $lastname;
	public $company;
	public $annualrevenue;
	public $industry;
	public $campaign;
	public $leadstatus;
	public $leadsource;
	public $converted;
	public $licencekeystatus;
	public $space;
	public $comments;
	public $priority;
	public $demorequest;
	public $partnercontact;
	public $productversion;
	public $product;
	public $maildate;
	public $nextstepdate;
	public $fundingsituation;
	public $purpose;
	public $evaluationstatus;
	public $transferdate;
	public $revenuetype;
	public $noofemployees;
	public $secondaryemail;
	public $noapprovalcalls;
	public $noapprovalemails;
	public $vat_id;
	public $registration_number_1;
	public $registration_number_2;
	public $verification;
	public $subindustry;
	public $atenttion;
	public $leads_relation;
	public $legal_form;
	public $sum_time;
	public $active;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'crm_leaddetails';
		$this->TableName = 'crm_leaddetails';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`crm_leaddetails`";
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

		// leadid
		$this->leadid = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_leadid', 'leadid', '`leadid`', '`leadid`', 3, -1, FALSE, '`leadid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->leadid->IsPrimaryKey = TRUE; // Primary key field
		$this->leadid->Nullable = FALSE; // NOT NULL field
		$this->leadid->Required = TRUE; // Required field
		$this->leadid->Sortable = TRUE; // Allow sort
		$this->leadid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['leadid'] = &$this->leadid;

		// lead_no
		$this->lead_no = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_lead_no', 'lead_no', '`lead_no`', '`lead_no`', 200, -1, FALSE, '`lead_no`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->lead_no->Nullable = FALSE; // NOT NULL field
		$this->lead_no->Required = TRUE; // Required field
		$this->lead_no->Sortable = TRUE; // Allow sort
		$this->fields['lead_no'] = &$this->lead_no;

		// email
		$this->_email = new DbField('crm_leaddetails', 'crm_leaddetails', 'x__email', 'email', '`email`', '`email`', 200, -1, FALSE, '`email`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_email->Sortable = TRUE; // Allow sort
		$this->fields['email'] = &$this->_email;

		// interest
		$this->interest = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_interest', 'interest', '`interest`', '`interest`', 200, -1, FALSE, '`interest`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->interest->Sortable = TRUE; // Allow sort
		$this->fields['interest'] = &$this->interest;

		// firstname
		$this->firstname = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_firstname', 'firstname', '`firstname`', '`firstname`', 200, -1, FALSE, '`firstname`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->firstname->Sortable = TRUE; // Allow sort
		$this->fields['firstname'] = &$this->firstname;

		// salutation
		$this->salutation = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_salutation', 'salutation', '`salutation`', '`salutation`', 200, -1, FALSE, '`salutation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->salutation->Sortable = TRUE; // Allow sort
		$this->fields['salutation'] = &$this->salutation;

		// lastname
		$this->lastname = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_lastname', 'lastname', '`lastname`', '`lastname`', 200, -1, FALSE, '`lastname`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->lastname->Sortable = TRUE; // Allow sort
		$this->fields['lastname'] = &$this->lastname;

		// company
		$this->company = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_company', 'company', '`company`', '`company`', 200, -1, FALSE, '`company`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->company->Nullable = FALSE; // NOT NULL field
		$this->company->Required = TRUE; // Required field
		$this->company->Sortable = TRUE; // Allow sort
		$this->fields['company'] = &$this->company;

		// annualrevenue
		$this->annualrevenue = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_annualrevenue', 'annualrevenue', '`annualrevenue`', '`annualrevenue`', 131, -1, FALSE, '`annualrevenue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->annualrevenue->Sortable = TRUE; // Allow sort
		$this->annualrevenue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['annualrevenue'] = &$this->annualrevenue;

		// industry
		$this->industry = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_industry', 'industry', '`industry`', '`industry`', 200, -1, FALSE, '`industry`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->industry->Sortable = TRUE; // Allow sort
		$this->fields['industry'] = &$this->industry;

		// campaign
		$this->campaign = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_campaign', 'campaign', '`campaign`', '`campaign`', 200, -1, FALSE, '`campaign`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->campaign->Sortable = TRUE; // Allow sort
		$this->fields['campaign'] = &$this->campaign;

		// leadstatus
		$this->leadstatus = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_leadstatus', 'leadstatus', '`leadstatus`', '`leadstatus`', 200, -1, FALSE, '`leadstatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->leadstatus->Sortable = TRUE; // Allow sort
		$this->fields['leadstatus'] = &$this->leadstatus;

		// leadsource
		$this->leadsource = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_leadsource', 'leadsource', '`leadsource`', '`leadsource`', 200, -1, FALSE, '`leadsource`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->leadsource->Sortable = TRUE; // Allow sort
		$this->fields['leadsource'] = &$this->leadsource;

		// converted
		$this->converted = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_converted', 'converted', '`converted`', '`converted`', 17, -1, FALSE, '`converted`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->converted->Nullable = FALSE; // NOT NULL field
		$this->converted->Sortable = TRUE; // Allow sort
		$this->converted->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['converted'] = &$this->converted;

		// licencekeystatus
		$this->licencekeystatus = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_licencekeystatus', 'licencekeystatus', '`licencekeystatus`', '`licencekeystatus`', 200, -1, FALSE, '`licencekeystatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->licencekeystatus->Sortable = TRUE; // Allow sort
		$this->fields['licencekeystatus'] = &$this->licencekeystatus;

		// space
		$this->space = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_space', 'space', '`space`', '`space`', 200, -1, FALSE, '`space`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->space->Sortable = TRUE; // Allow sort
		$this->fields['space'] = &$this->space;

		// comments
		$this->comments = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_comments', 'comments', '`comments`', '`comments`', 201, -1, FALSE, '`comments`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->comments->Sortable = TRUE; // Allow sort
		$this->fields['comments'] = &$this->comments;

		// priority
		$this->priority = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_priority', 'priority', '`priority`', '`priority`', 200, -1, FALSE, '`priority`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->priority->Sortable = TRUE; // Allow sort
		$this->fields['priority'] = &$this->priority;

		// demorequest
		$this->demorequest = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_demorequest', 'demorequest', '`demorequest`', '`demorequest`', 200, -1, FALSE, '`demorequest`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->demorequest->Sortable = TRUE; // Allow sort
		$this->fields['demorequest'] = &$this->demorequest;

		// partnercontact
		$this->partnercontact = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_partnercontact', 'partnercontact', '`partnercontact`', '`partnercontact`', 200, -1, FALSE, '`partnercontact`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->partnercontact->Sortable = TRUE; // Allow sort
		$this->fields['partnercontact'] = &$this->partnercontact;

		// productversion
		$this->productversion = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_productversion', 'productversion', '`productversion`', '`productversion`', 200, -1, FALSE, '`productversion`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->productversion->Sortable = TRUE; // Allow sort
		$this->fields['productversion'] = &$this->productversion;

		// product
		$this->product = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_product', 'product', '`product`', '`product`', 200, -1, FALSE, '`product`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->product->Sortable = TRUE; // Allow sort
		$this->fields['product'] = &$this->product;

		// maildate
		$this->maildate = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_maildate', 'maildate', '`maildate`', CastDateFieldForLike('`maildate`', 0, "DB"), 133, 0, FALSE, '`maildate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->maildate->Sortable = TRUE; // Allow sort
		$this->maildate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['maildate'] = &$this->maildate;

		// nextstepdate
		$this->nextstepdate = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_nextstepdate', 'nextstepdate', '`nextstepdate`', CastDateFieldForLike('`nextstepdate`', 0, "DB"), 133, 0, FALSE, '`nextstepdate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nextstepdate->Sortable = TRUE; // Allow sort
		$this->nextstepdate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['nextstepdate'] = &$this->nextstepdate;

		// fundingsituation
		$this->fundingsituation = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_fundingsituation', 'fundingsituation', '`fundingsituation`', '`fundingsituation`', 200, -1, FALSE, '`fundingsituation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fundingsituation->Sortable = TRUE; // Allow sort
		$this->fields['fundingsituation'] = &$this->fundingsituation;

		// purpose
		$this->purpose = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_purpose', 'purpose', '`purpose`', '`purpose`', 200, -1, FALSE, '`purpose`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->purpose->Sortable = TRUE; // Allow sort
		$this->fields['purpose'] = &$this->purpose;

		// evaluationstatus
		$this->evaluationstatus = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_evaluationstatus', 'evaluationstatus', '`evaluationstatus`', '`evaluationstatus`', 200, -1, FALSE, '`evaluationstatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->evaluationstatus->Sortable = TRUE; // Allow sort
		$this->fields['evaluationstatus'] = &$this->evaluationstatus;

		// transferdate
		$this->transferdate = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_transferdate', 'transferdate', '`transferdate`', CastDateFieldForLike('`transferdate`', 0, "DB"), 133, 0, FALSE, '`transferdate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->transferdate->Sortable = TRUE; // Allow sort
		$this->transferdate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['transferdate'] = &$this->transferdate;

		// revenuetype
		$this->revenuetype = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_revenuetype', 'revenuetype', '`revenuetype`', '`revenuetype`', 200, -1, FALSE, '`revenuetype`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->revenuetype->Sortable = TRUE; // Allow sort
		$this->fields['revenuetype'] = &$this->revenuetype;

		// noofemployees
		$this->noofemployees = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_noofemployees', 'noofemployees', '`noofemployees`', '`noofemployees`', 3, -1, FALSE, '`noofemployees`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->noofemployees->Sortable = TRUE; // Allow sort
		$this->noofemployees->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['noofemployees'] = &$this->noofemployees;

		// secondaryemail
		$this->secondaryemail = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_secondaryemail', 'secondaryemail', '`secondaryemail`', '`secondaryemail`', 200, -1, FALSE, '`secondaryemail`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->secondaryemail->Sortable = TRUE; // Allow sort
		$this->fields['secondaryemail'] = &$this->secondaryemail;

		// noapprovalcalls
		$this->noapprovalcalls = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_noapprovalcalls', 'noapprovalcalls', '`noapprovalcalls`', '`noapprovalcalls`', 2, -1, FALSE, '`noapprovalcalls`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->noapprovalcalls->Sortable = TRUE; // Allow sort
		$this->noapprovalcalls->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['noapprovalcalls'] = &$this->noapprovalcalls;

		// noapprovalemails
		$this->noapprovalemails = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_noapprovalemails', 'noapprovalemails', '`noapprovalemails`', '`noapprovalemails`', 2, -1, FALSE, '`noapprovalemails`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->noapprovalemails->Sortable = TRUE; // Allow sort
		$this->noapprovalemails->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['noapprovalemails'] = &$this->noapprovalemails;

		// vat_id
		$this->vat_id = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_vat_id', 'vat_id', '`vat_id`', '`vat_id`', 200, -1, FALSE, '`vat_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->vat_id->Sortable = TRUE; // Allow sort
		$this->fields['vat_id'] = &$this->vat_id;

		// registration_number_1
		$this->registration_number_1 = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_registration_number_1', 'registration_number_1', '`registration_number_1`', '`registration_number_1`', 200, -1, FALSE, '`registration_number_1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->registration_number_1->Sortable = TRUE; // Allow sort
		$this->fields['registration_number_1'] = &$this->registration_number_1;

		// registration_number_2
		$this->registration_number_2 = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_registration_number_2', 'registration_number_2', '`registration_number_2`', '`registration_number_2`', 200, -1, FALSE, '`registration_number_2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->registration_number_2->Sortable = TRUE; // Allow sort
		$this->fields['registration_number_2'] = &$this->registration_number_2;

		// verification
		$this->verification = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_verification', 'verification', '`verification`', '`verification`', 201, -1, FALSE, '`verification`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->verification->Sortable = TRUE; // Allow sort
		$this->fields['verification'] = &$this->verification;

		// subindustry
		$this->subindustry = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_subindustry', 'subindustry', '`subindustry`', '`subindustry`', 200, -1, FALSE, '`subindustry`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->subindustry->Sortable = TRUE; // Allow sort
		$this->fields['subindustry'] = &$this->subindustry;

		// atenttion
		$this->atenttion = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_atenttion', 'atenttion', '`atenttion`', '`atenttion`', 201, -1, FALSE, '`atenttion`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->atenttion->Sortable = TRUE; // Allow sort
		$this->fields['atenttion'] = &$this->atenttion;

		// leads_relation
		$this->leads_relation = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_leads_relation', 'leads_relation', '`leads_relation`', '`leads_relation`', 200, -1, FALSE, '`leads_relation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->leads_relation->Sortable = TRUE; // Allow sort
		$this->fields['leads_relation'] = &$this->leads_relation;

		// legal_form
		$this->legal_form = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_legal_form', 'legal_form', '`legal_form`', '`legal_form`', 200, -1, FALSE, '`legal_form`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->legal_form->Sortable = TRUE; // Allow sort
		$this->fields['legal_form'] = &$this->legal_form;

		// sum_time
		$this->sum_time = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_sum_time', 'sum_time', '`sum_time`', '`sum_time`', 131, -1, FALSE, '`sum_time`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sum_time->Sortable = TRUE; // Allow sort
		$this->sum_time->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['sum_time'] = &$this->sum_time;

		// active
		$this->active = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_active', 'active', '`active`', '`active`', 16, -1, FALSE, '`active`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->active->Sortable = TRUE; // Allow sort
		$this->active->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['active'] = &$this->active;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`crm_leaddetails`";
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
			if (array_key_exists('leadid', $rs))
				AddFilter($where, QuotedName('leadid', $this->Dbid) . '=' . QuotedValue($rs['leadid'], $this->leadid->DataType, $this->Dbid));
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
		$this->leadid->DbValue = $row['leadid'];
		$this->lead_no->DbValue = $row['lead_no'];
		$this->_email->DbValue = $row['email'];
		$this->interest->DbValue = $row['interest'];
		$this->firstname->DbValue = $row['firstname'];
		$this->salutation->DbValue = $row['salutation'];
		$this->lastname->DbValue = $row['lastname'];
		$this->company->DbValue = $row['company'];
		$this->annualrevenue->DbValue = $row['annualrevenue'];
		$this->industry->DbValue = $row['industry'];
		$this->campaign->DbValue = $row['campaign'];
		$this->leadstatus->DbValue = $row['leadstatus'];
		$this->leadsource->DbValue = $row['leadsource'];
		$this->converted->DbValue = $row['converted'];
		$this->licencekeystatus->DbValue = $row['licencekeystatus'];
		$this->space->DbValue = $row['space'];
		$this->comments->DbValue = $row['comments'];
		$this->priority->DbValue = $row['priority'];
		$this->demorequest->DbValue = $row['demorequest'];
		$this->partnercontact->DbValue = $row['partnercontact'];
		$this->productversion->DbValue = $row['productversion'];
		$this->product->DbValue = $row['product'];
		$this->maildate->DbValue = $row['maildate'];
		$this->nextstepdate->DbValue = $row['nextstepdate'];
		$this->fundingsituation->DbValue = $row['fundingsituation'];
		$this->purpose->DbValue = $row['purpose'];
		$this->evaluationstatus->DbValue = $row['evaluationstatus'];
		$this->transferdate->DbValue = $row['transferdate'];
		$this->revenuetype->DbValue = $row['revenuetype'];
		$this->noofemployees->DbValue = $row['noofemployees'];
		$this->secondaryemail->DbValue = $row['secondaryemail'];
		$this->noapprovalcalls->DbValue = $row['noapprovalcalls'];
		$this->noapprovalemails->DbValue = $row['noapprovalemails'];
		$this->vat_id->DbValue = $row['vat_id'];
		$this->registration_number_1->DbValue = $row['registration_number_1'];
		$this->registration_number_2->DbValue = $row['registration_number_2'];
		$this->verification->DbValue = $row['verification'];
		$this->subindustry->DbValue = $row['subindustry'];
		$this->atenttion->DbValue = $row['atenttion'];
		$this->leads_relation->DbValue = $row['leads_relation'];
		$this->legal_form->DbValue = $row['legal_form'];
		$this->sum_time->DbValue = $row['sum_time'];
		$this->active->DbValue = $row['active'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`leadid` = @leadid@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('leadid', $row) ? $row['leadid'] : NULL) : $this->leadid->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@leadid@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "crm_leaddetailslist.php";
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
		if ($pageName == "crm_leaddetailsview.php")
			return $Language->phrase("View");
		elseif ($pageName == "crm_leaddetailsedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "crm_leaddetailsadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "crm_leaddetailslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("crm_leaddetailsview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("crm_leaddetailsview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "crm_leaddetailsadd.php?" . $this->getUrlParm($parm);
		else
			$url = "crm_leaddetailsadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("crm_leaddetailsedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("crm_leaddetailsadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("crm_leaddetailsdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "leadid:" . JsonEncode($this->leadid->CurrentValue, "number");
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
		if ($this->leadid->CurrentValue != NULL) {
			$url .= "leadid=" . urlencode($this->leadid->CurrentValue);
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
			if (Param("leadid") !== NULL)
				$arKeys[] = Param("leadid");
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
			$this->leadid->CurrentValue = $key;
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
		$this->leadid->setDbValue($rs->fields('leadid'));
		$this->lead_no->setDbValue($rs->fields('lead_no'));
		$this->_email->setDbValue($rs->fields('email'));
		$this->interest->setDbValue($rs->fields('interest'));
		$this->firstname->setDbValue($rs->fields('firstname'));
		$this->salutation->setDbValue($rs->fields('salutation'));
		$this->lastname->setDbValue($rs->fields('lastname'));
		$this->company->setDbValue($rs->fields('company'));
		$this->annualrevenue->setDbValue($rs->fields('annualrevenue'));
		$this->industry->setDbValue($rs->fields('industry'));
		$this->campaign->setDbValue($rs->fields('campaign'));
		$this->leadstatus->setDbValue($rs->fields('leadstatus'));
		$this->leadsource->setDbValue($rs->fields('leadsource'));
		$this->converted->setDbValue($rs->fields('converted'));
		$this->licencekeystatus->setDbValue($rs->fields('licencekeystatus'));
		$this->space->setDbValue($rs->fields('space'));
		$this->comments->setDbValue($rs->fields('comments'));
		$this->priority->setDbValue($rs->fields('priority'));
		$this->demorequest->setDbValue($rs->fields('demorequest'));
		$this->partnercontact->setDbValue($rs->fields('partnercontact'));
		$this->productversion->setDbValue($rs->fields('productversion'));
		$this->product->setDbValue($rs->fields('product'));
		$this->maildate->setDbValue($rs->fields('maildate'));
		$this->nextstepdate->setDbValue($rs->fields('nextstepdate'));
		$this->fundingsituation->setDbValue($rs->fields('fundingsituation'));
		$this->purpose->setDbValue($rs->fields('purpose'));
		$this->evaluationstatus->setDbValue($rs->fields('evaluationstatus'));
		$this->transferdate->setDbValue($rs->fields('transferdate'));
		$this->revenuetype->setDbValue($rs->fields('revenuetype'));
		$this->noofemployees->setDbValue($rs->fields('noofemployees'));
		$this->secondaryemail->setDbValue($rs->fields('secondaryemail'));
		$this->noapprovalcalls->setDbValue($rs->fields('noapprovalcalls'));
		$this->noapprovalemails->setDbValue($rs->fields('noapprovalemails'));
		$this->vat_id->setDbValue($rs->fields('vat_id'));
		$this->registration_number_1->setDbValue($rs->fields('registration_number_1'));
		$this->registration_number_2->setDbValue($rs->fields('registration_number_2'));
		$this->verification->setDbValue($rs->fields('verification'));
		$this->subindustry->setDbValue($rs->fields('subindustry'));
		$this->atenttion->setDbValue($rs->fields('atenttion'));
		$this->leads_relation->setDbValue($rs->fields('leads_relation'));
		$this->legal_form->setDbValue($rs->fields('legal_form'));
		$this->sum_time->setDbValue($rs->fields('sum_time'));
		$this->active->setDbValue($rs->fields('active'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// leadid
		// lead_no
		// email
		// interest
		// firstname
		// salutation
		// lastname
		// company
		// annualrevenue
		// industry
		// campaign
		// leadstatus
		// leadsource
		// converted
		// licencekeystatus
		// space
		// comments
		// priority
		// demorequest
		// partnercontact
		// productversion
		// product
		// maildate
		// nextstepdate
		// fundingsituation
		// purpose
		// evaluationstatus
		// transferdate
		// revenuetype
		// noofemployees
		// secondaryemail
		// noapprovalcalls
		// noapprovalemails
		// vat_id
		// registration_number_1
		// registration_number_2
		// verification
		// subindustry
		// atenttion
		// leads_relation
		// legal_form
		// sum_time
		// active
		// leadid

		$this->leadid->ViewValue = $this->leadid->CurrentValue;
		$this->leadid->ViewValue = FormatNumber($this->leadid->ViewValue, 0, -2, -2, -2);
		$this->leadid->ViewCustomAttributes = "";

		// lead_no
		$this->lead_no->ViewValue = $this->lead_no->CurrentValue;
		$this->lead_no->ViewCustomAttributes = "";

		// email
		$this->_email->ViewValue = $this->_email->CurrentValue;
		$this->_email->ViewCustomAttributes = "";

		// interest
		$this->interest->ViewValue = $this->interest->CurrentValue;
		$this->interest->ViewCustomAttributes = "";

		// firstname
		$this->firstname->ViewValue = $this->firstname->CurrentValue;
		$this->firstname->ViewCustomAttributes = "";

		// salutation
		$this->salutation->ViewValue = $this->salutation->CurrentValue;
		$this->salutation->ViewCustomAttributes = "";

		// lastname
		$this->lastname->ViewValue = $this->lastname->CurrentValue;
		$this->lastname->ViewCustomAttributes = "";

		// company
		$this->company->ViewValue = $this->company->CurrentValue;
		$this->company->ViewCustomAttributes = "";

		// annualrevenue
		$this->annualrevenue->ViewValue = $this->annualrevenue->CurrentValue;
		$this->annualrevenue->ViewValue = FormatNumber($this->annualrevenue->ViewValue, 2, -2, -2, -2);
		$this->annualrevenue->ViewCustomAttributes = "";

		// industry
		$this->industry->ViewValue = $this->industry->CurrentValue;
		$this->industry->ViewCustomAttributes = "";

		// campaign
		$this->campaign->ViewValue = $this->campaign->CurrentValue;
		$this->campaign->ViewCustomAttributes = "";

		// leadstatus
		$this->leadstatus->ViewValue = $this->leadstatus->CurrentValue;
		$this->leadstatus->ViewCustomAttributes = "";

		// leadsource
		$this->leadsource->ViewValue = $this->leadsource->CurrentValue;
		$this->leadsource->ViewCustomAttributes = "";

		// converted
		$this->converted->ViewValue = $this->converted->CurrentValue;
		$this->converted->ViewValue = FormatNumber($this->converted->ViewValue, 0, -2, -2, -2);
		$this->converted->ViewCustomAttributes = "";

		// licencekeystatus
		$this->licencekeystatus->ViewValue = $this->licencekeystatus->CurrentValue;
		$this->licencekeystatus->ViewCustomAttributes = "";

		// space
		$this->space->ViewValue = $this->space->CurrentValue;
		$this->space->ViewCustomAttributes = "";

		// comments
		$this->comments->ViewValue = $this->comments->CurrentValue;
		$this->comments->ViewCustomAttributes = "";

		// priority
		$this->priority->ViewValue = $this->priority->CurrentValue;
		$this->priority->ViewCustomAttributes = "";

		// demorequest
		$this->demorequest->ViewValue = $this->demorequest->CurrentValue;
		$this->demorequest->ViewCustomAttributes = "";

		// partnercontact
		$this->partnercontact->ViewValue = $this->partnercontact->CurrentValue;
		$this->partnercontact->ViewCustomAttributes = "";

		// productversion
		$this->productversion->ViewValue = $this->productversion->CurrentValue;
		$this->productversion->ViewCustomAttributes = "";

		// product
		$this->product->ViewValue = $this->product->CurrentValue;
		$this->product->ViewCustomAttributes = "";

		// maildate
		$this->maildate->ViewValue = $this->maildate->CurrentValue;
		$this->maildate->ViewValue = FormatDateTime($this->maildate->ViewValue, 0);
		$this->maildate->ViewCustomAttributes = "";

		// nextstepdate
		$this->nextstepdate->ViewValue = $this->nextstepdate->CurrentValue;
		$this->nextstepdate->ViewValue = FormatDateTime($this->nextstepdate->ViewValue, 0);
		$this->nextstepdate->ViewCustomAttributes = "";

		// fundingsituation
		$this->fundingsituation->ViewValue = $this->fundingsituation->CurrentValue;
		$this->fundingsituation->ViewCustomAttributes = "";

		// purpose
		$this->purpose->ViewValue = $this->purpose->CurrentValue;
		$this->purpose->ViewCustomAttributes = "";

		// evaluationstatus
		$this->evaluationstatus->ViewValue = $this->evaluationstatus->CurrentValue;
		$this->evaluationstatus->ViewCustomAttributes = "";

		// transferdate
		$this->transferdate->ViewValue = $this->transferdate->CurrentValue;
		$this->transferdate->ViewValue = FormatDateTime($this->transferdate->ViewValue, 0);
		$this->transferdate->ViewCustomAttributes = "";

		// revenuetype
		$this->revenuetype->ViewValue = $this->revenuetype->CurrentValue;
		$this->revenuetype->ViewCustomAttributes = "";

		// noofemployees
		$this->noofemployees->ViewValue = $this->noofemployees->CurrentValue;
		$this->noofemployees->ViewValue = FormatNumber($this->noofemployees->ViewValue, 0, -2, -2, -2);
		$this->noofemployees->ViewCustomAttributes = "";

		// secondaryemail
		$this->secondaryemail->ViewValue = $this->secondaryemail->CurrentValue;
		$this->secondaryemail->ViewCustomAttributes = "";

		// noapprovalcalls
		$this->noapprovalcalls->ViewValue = $this->noapprovalcalls->CurrentValue;
		$this->noapprovalcalls->ViewValue = FormatNumber($this->noapprovalcalls->ViewValue, 0, -2, -2, -2);
		$this->noapprovalcalls->ViewCustomAttributes = "";

		// noapprovalemails
		$this->noapprovalemails->ViewValue = $this->noapprovalemails->CurrentValue;
		$this->noapprovalemails->ViewValue = FormatNumber($this->noapprovalemails->ViewValue, 0, -2, -2, -2);
		$this->noapprovalemails->ViewCustomAttributes = "";

		// vat_id
		$this->vat_id->ViewValue = $this->vat_id->CurrentValue;
		$this->vat_id->ViewCustomAttributes = "";

		// registration_number_1
		$this->registration_number_1->ViewValue = $this->registration_number_1->CurrentValue;
		$this->registration_number_1->ViewCustomAttributes = "";

		// registration_number_2
		$this->registration_number_2->ViewValue = $this->registration_number_2->CurrentValue;
		$this->registration_number_2->ViewCustomAttributes = "";

		// verification
		$this->verification->ViewValue = $this->verification->CurrentValue;
		$this->verification->ViewCustomAttributes = "";

		// subindustry
		$this->subindustry->ViewValue = $this->subindustry->CurrentValue;
		$this->subindustry->ViewCustomAttributes = "";

		// atenttion
		$this->atenttion->ViewValue = $this->atenttion->CurrentValue;
		$this->atenttion->ViewCustomAttributes = "";

		// leads_relation
		$this->leads_relation->ViewValue = $this->leads_relation->CurrentValue;
		$this->leads_relation->ViewCustomAttributes = "";

		// legal_form
		$this->legal_form->ViewValue = $this->legal_form->CurrentValue;
		$this->legal_form->ViewCustomAttributes = "";

		// sum_time
		$this->sum_time->ViewValue = $this->sum_time->CurrentValue;
		$this->sum_time->ViewValue = FormatNumber($this->sum_time->ViewValue, 2, -2, -2, -2);
		$this->sum_time->ViewCustomAttributes = "";

		// active
		$this->active->ViewValue = $this->active->CurrentValue;
		$this->active->ViewValue = FormatNumber($this->active->ViewValue, 0, -2, -2, -2);
		$this->active->ViewCustomAttributes = "";

		// leadid
		$this->leadid->LinkCustomAttributes = "";
		$this->leadid->HrefValue = "";
		$this->leadid->TooltipValue = "";

		// lead_no
		$this->lead_no->LinkCustomAttributes = "";
		$this->lead_no->HrefValue = "";
		$this->lead_no->TooltipValue = "";

		// email
		$this->_email->LinkCustomAttributes = "";
		$this->_email->HrefValue = "";
		$this->_email->TooltipValue = "";

		// interest
		$this->interest->LinkCustomAttributes = "";
		$this->interest->HrefValue = "";
		$this->interest->TooltipValue = "";

		// firstname
		$this->firstname->LinkCustomAttributes = "";
		$this->firstname->HrefValue = "";
		$this->firstname->TooltipValue = "";

		// salutation
		$this->salutation->LinkCustomAttributes = "";
		$this->salutation->HrefValue = "";
		$this->salutation->TooltipValue = "";

		// lastname
		$this->lastname->LinkCustomAttributes = "";
		$this->lastname->HrefValue = "";
		$this->lastname->TooltipValue = "";

		// company
		$this->company->LinkCustomAttributes = "";
		$this->company->HrefValue = "";
		$this->company->TooltipValue = "";

		// annualrevenue
		$this->annualrevenue->LinkCustomAttributes = "";
		$this->annualrevenue->HrefValue = "";
		$this->annualrevenue->TooltipValue = "";

		// industry
		$this->industry->LinkCustomAttributes = "";
		$this->industry->HrefValue = "";
		$this->industry->TooltipValue = "";

		// campaign
		$this->campaign->LinkCustomAttributes = "";
		$this->campaign->HrefValue = "";
		$this->campaign->TooltipValue = "";

		// leadstatus
		$this->leadstatus->LinkCustomAttributes = "";
		$this->leadstatus->HrefValue = "";
		$this->leadstatus->TooltipValue = "";

		// leadsource
		$this->leadsource->LinkCustomAttributes = "";
		$this->leadsource->HrefValue = "";
		$this->leadsource->TooltipValue = "";

		// converted
		$this->converted->LinkCustomAttributes = "";
		$this->converted->HrefValue = "";
		$this->converted->TooltipValue = "";

		// licencekeystatus
		$this->licencekeystatus->LinkCustomAttributes = "";
		$this->licencekeystatus->HrefValue = "";
		$this->licencekeystatus->TooltipValue = "";

		// space
		$this->space->LinkCustomAttributes = "";
		$this->space->HrefValue = "";
		$this->space->TooltipValue = "";

		// comments
		$this->comments->LinkCustomAttributes = "";
		$this->comments->HrefValue = "";
		$this->comments->TooltipValue = "";

		// priority
		$this->priority->LinkCustomAttributes = "";
		$this->priority->HrefValue = "";
		$this->priority->TooltipValue = "";

		// demorequest
		$this->demorequest->LinkCustomAttributes = "";
		$this->demorequest->HrefValue = "";
		$this->demorequest->TooltipValue = "";

		// partnercontact
		$this->partnercontact->LinkCustomAttributes = "";
		$this->partnercontact->HrefValue = "";
		$this->partnercontact->TooltipValue = "";

		// productversion
		$this->productversion->LinkCustomAttributes = "";
		$this->productversion->HrefValue = "";
		$this->productversion->TooltipValue = "";

		// product
		$this->product->LinkCustomAttributes = "";
		$this->product->HrefValue = "";
		$this->product->TooltipValue = "";

		// maildate
		$this->maildate->LinkCustomAttributes = "";
		$this->maildate->HrefValue = "";
		$this->maildate->TooltipValue = "";

		// nextstepdate
		$this->nextstepdate->LinkCustomAttributes = "";
		$this->nextstepdate->HrefValue = "";
		$this->nextstepdate->TooltipValue = "";

		// fundingsituation
		$this->fundingsituation->LinkCustomAttributes = "";
		$this->fundingsituation->HrefValue = "";
		$this->fundingsituation->TooltipValue = "";

		// purpose
		$this->purpose->LinkCustomAttributes = "";
		$this->purpose->HrefValue = "";
		$this->purpose->TooltipValue = "";

		// evaluationstatus
		$this->evaluationstatus->LinkCustomAttributes = "";
		$this->evaluationstatus->HrefValue = "";
		$this->evaluationstatus->TooltipValue = "";

		// transferdate
		$this->transferdate->LinkCustomAttributes = "";
		$this->transferdate->HrefValue = "";
		$this->transferdate->TooltipValue = "";

		// revenuetype
		$this->revenuetype->LinkCustomAttributes = "";
		$this->revenuetype->HrefValue = "";
		$this->revenuetype->TooltipValue = "";

		// noofemployees
		$this->noofemployees->LinkCustomAttributes = "";
		$this->noofemployees->HrefValue = "";
		$this->noofemployees->TooltipValue = "";

		// secondaryemail
		$this->secondaryemail->LinkCustomAttributes = "";
		$this->secondaryemail->HrefValue = "";
		$this->secondaryemail->TooltipValue = "";

		// noapprovalcalls
		$this->noapprovalcalls->LinkCustomAttributes = "";
		$this->noapprovalcalls->HrefValue = "";
		$this->noapprovalcalls->TooltipValue = "";

		// noapprovalemails
		$this->noapprovalemails->LinkCustomAttributes = "";
		$this->noapprovalemails->HrefValue = "";
		$this->noapprovalemails->TooltipValue = "";

		// vat_id
		$this->vat_id->LinkCustomAttributes = "";
		$this->vat_id->HrefValue = "";
		$this->vat_id->TooltipValue = "";

		// registration_number_1
		$this->registration_number_1->LinkCustomAttributes = "";
		$this->registration_number_1->HrefValue = "";
		$this->registration_number_1->TooltipValue = "";

		// registration_number_2
		$this->registration_number_2->LinkCustomAttributes = "";
		$this->registration_number_2->HrefValue = "";
		$this->registration_number_2->TooltipValue = "";

		// verification
		$this->verification->LinkCustomAttributes = "";
		$this->verification->HrefValue = "";
		$this->verification->TooltipValue = "";

		// subindustry
		$this->subindustry->LinkCustomAttributes = "";
		$this->subindustry->HrefValue = "";
		$this->subindustry->TooltipValue = "";

		// atenttion
		$this->atenttion->LinkCustomAttributes = "";
		$this->atenttion->HrefValue = "";
		$this->atenttion->TooltipValue = "";

		// leads_relation
		$this->leads_relation->LinkCustomAttributes = "";
		$this->leads_relation->HrefValue = "";
		$this->leads_relation->TooltipValue = "";

		// legal_form
		$this->legal_form->LinkCustomAttributes = "";
		$this->legal_form->HrefValue = "";
		$this->legal_form->TooltipValue = "";

		// sum_time
		$this->sum_time->LinkCustomAttributes = "";
		$this->sum_time->HrefValue = "";
		$this->sum_time->TooltipValue = "";

		// active
		$this->active->LinkCustomAttributes = "";
		$this->active->HrefValue = "";
		$this->active->TooltipValue = "";

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

		// leadid
		$this->leadid->EditAttrs["class"] = "form-control";
		$this->leadid->EditCustomAttributes = "";
		$this->leadid->EditValue = $this->leadid->CurrentValue;
		$this->leadid->EditValue = FormatNumber($this->leadid->EditValue, 0, -2, -2, -2);
		$this->leadid->ViewCustomAttributes = "";

		// lead_no
		$this->lead_no->EditAttrs["class"] = "form-control";
		$this->lead_no->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->lead_no->CurrentValue = HtmlDecode($this->lead_no->CurrentValue);
		$this->lead_no->EditValue = $this->lead_no->CurrentValue;
		$this->lead_no->PlaceHolder = RemoveHtml($this->lead_no->caption());

		// email
		$this->_email->EditAttrs["class"] = "form-control";
		$this->_email->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->_email->CurrentValue = HtmlDecode($this->_email->CurrentValue);
		$this->_email->EditValue = $this->_email->CurrentValue;
		$this->_email->PlaceHolder = RemoveHtml($this->_email->caption());

		// interest
		$this->interest->EditAttrs["class"] = "form-control";
		$this->interest->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->interest->CurrentValue = HtmlDecode($this->interest->CurrentValue);
		$this->interest->EditValue = $this->interest->CurrentValue;
		$this->interest->PlaceHolder = RemoveHtml($this->interest->caption());

		// firstname
		$this->firstname->EditAttrs["class"] = "form-control";
		$this->firstname->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->firstname->CurrentValue = HtmlDecode($this->firstname->CurrentValue);
		$this->firstname->EditValue = $this->firstname->CurrentValue;
		$this->firstname->PlaceHolder = RemoveHtml($this->firstname->caption());

		// salutation
		$this->salutation->EditAttrs["class"] = "form-control";
		$this->salutation->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->salutation->CurrentValue = HtmlDecode($this->salutation->CurrentValue);
		$this->salutation->EditValue = $this->salutation->CurrentValue;
		$this->salutation->PlaceHolder = RemoveHtml($this->salutation->caption());

		// lastname
		$this->lastname->EditAttrs["class"] = "form-control";
		$this->lastname->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->lastname->CurrentValue = HtmlDecode($this->lastname->CurrentValue);
		$this->lastname->EditValue = $this->lastname->CurrentValue;
		$this->lastname->PlaceHolder = RemoveHtml($this->lastname->caption());

		// company
		$this->company->EditAttrs["class"] = "form-control";
		$this->company->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->company->CurrentValue = HtmlDecode($this->company->CurrentValue);
		$this->company->EditValue = $this->company->CurrentValue;
		$this->company->PlaceHolder = RemoveHtml($this->company->caption());

		// annualrevenue
		$this->annualrevenue->EditAttrs["class"] = "form-control";
		$this->annualrevenue->EditCustomAttributes = "";
		$this->annualrevenue->EditValue = $this->annualrevenue->CurrentValue;
		$this->annualrevenue->PlaceHolder = RemoveHtml($this->annualrevenue->caption());
		if (strval($this->annualrevenue->EditValue) <> "" && is_numeric($this->annualrevenue->EditValue))
			$this->annualrevenue->EditValue = FormatNumber($this->annualrevenue->EditValue, -2, -2, -2, -2);

		// industry
		$this->industry->EditAttrs["class"] = "form-control";
		$this->industry->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->industry->CurrentValue = HtmlDecode($this->industry->CurrentValue);
		$this->industry->EditValue = $this->industry->CurrentValue;
		$this->industry->PlaceHolder = RemoveHtml($this->industry->caption());

		// campaign
		$this->campaign->EditAttrs["class"] = "form-control";
		$this->campaign->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->campaign->CurrentValue = HtmlDecode($this->campaign->CurrentValue);
		$this->campaign->EditValue = $this->campaign->CurrentValue;
		$this->campaign->PlaceHolder = RemoveHtml($this->campaign->caption());

		// leadstatus
		$this->leadstatus->EditAttrs["class"] = "form-control";
		$this->leadstatus->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->leadstatus->CurrentValue = HtmlDecode($this->leadstatus->CurrentValue);
		$this->leadstatus->EditValue = $this->leadstatus->CurrentValue;
		$this->leadstatus->PlaceHolder = RemoveHtml($this->leadstatus->caption());

		// leadsource
		$this->leadsource->EditAttrs["class"] = "form-control";
		$this->leadsource->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->leadsource->CurrentValue = HtmlDecode($this->leadsource->CurrentValue);
		$this->leadsource->EditValue = $this->leadsource->CurrentValue;
		$this->leadsource->PlaceHolder = RemoveHtml($this->leadsource->caption());

		// converted
		$this->converted->EditAttrs["class"] = "form-control";
		$this->converted->EditCustomAttributes = "";
		$this->converted->EditValue = $this->converted->CurrentValue;
		$this->converted->PlaceHolder = RemoveHtml($this->converted->caption());

		// licencekeystatus
		$this->licencekeystatus->EditAttrs["class"] = "form-control";
		$this->licencekeystatus->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->licencekeystatus->CurrentValue = HtmlDecode($this->licencekeystatus->CurrentValue);
		$this->licencekeystatus->EditValue = $this->licencekeystatus->CurrentValue;
		$this->licencekeystatus->PlaceHolder = RemoveHtml($this->licencekeystatus->caption());

		// space
		$this->space->EditAttrs["class"] = "form-control";
		$this->space->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->space->CurrentValue = HtmlDecode($this->space->CurrentValue);
		$this->space->EditValue = $this->space->CurrentValue;
		$this->space->PlaceHolder = RemoveHtml($this->space->caption());

		// comments
		$this->comments->EditAttrs["class"] = "form-control";
		$this->comments->EditCustomAttributes = "";
		$this->comments->EditValue = $this->comments->CurrentValue;
		$this->comments->PlaceHolder = RemoveHtml($this->comments->caption());

		// priority
		$this->priority->EditAttrs["class"] = "form-control";
		$this->priority->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->priority->CurrentValue = HtmlDecode($this->priority->CurrentValue);
		$this->priority->EditValue = $this->priority->CurrentValue;
		$this->priority->PlaceHolder = RemoveHtml($this->priority->caption());

		// demorequest
		$this->demorequest->EditAttrs["class"] = "form-control";
		$this->demorequest->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->demorequest->CurrentValue = HtmlDecode($this->demorequest->CurrentValue);
		$this->demorequest->EditValue = $this->demorequest->CurrentValue;
		$this->demorequest->PlaceHolder = RemoveHtml($this->demorequest->caption());

		// partnercontact
		$this->partnercontact->EditAttrs["class"] = "form-control";
		$this->partnercontact->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->partnercontact->CurrentValue = HtmlDecode($this->partnercontact->CurrentValue);
		$this->partnercontact->EditValue = $this->partnercontact->CurrentValue;
		$this->partnercontact->PlaceHolder = RemoveHtml($this->partnercontact->caption());

		// productversion
		$this->productversion->EditAttrs["class"] = "form-control";
		$this->productversion->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->productversion->CurrentValue = HtmlDecode($this->productversion->CurrentValue);
		$this->productversion->EditValue = $this->productversion->CurrentValue;
		$this->productversion->PlaceHolder = RemoveHtml($this->productversion->caption());

		// product
		$this->product->EditAttrs["class"] = "form-control";
		$this->product->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->product->CurrentValue = HtmlDecode($this->product->CurrentValue);
		$this->product->EditValue = $this->product->CurrentValue;
		$this->product->PlaceHolder = RemoveHtml($this->product->caption());

		// maildate
		$this->maildate->EditAttrs["class"] = "form-control";
		$this->maildate->EditCustomAttributes = "";
		$this->maildate->EditValue = FormatDateTime($this->maildate->CurrentValue, 8);
		$this->maildate->PlaceHolder = RemoveHtml($this->maildate->caption());

		// nextstepdate
		$this->nextstepdate->EditAttrs["class"] = "form-control";
		$this->nextstepdate->EditCustomAttributes = "";
		$this->nextstepdate->EditValue = FormatDateTime($this->nextstepdate->CurrentValue, 8);
		$this->nextstepdate->PlaceHolder = RemoveHtml($this->nextstepdate->caption());

		// fundingsituation
		$this->fundingsituation->EditAttrs["class"] = "form-control";
		$this->fundingsituation->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->fundingsituation->CurrentValue = HtmlDecode($this->fundingsituation->CurrentValue);
		$this->fundingsituation->EditValue = $this->fundingsituation->CurrentValue;
		$this->fundingsituation->PlaceHolder = RemoveHtml($this->fundingsituation->caption());

		// purpose
		$this->purpose->EditAttrs["class"] = "form-control";
		$this->purpose->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->purpose->CurrentValue = HtmlDecode($this->purpose->CurrentValue);
		$this->purpose->EditValue = $this->purpose->CurrentValue;
		$this->purpose->PlaceHolder = RemoveHtml($this->purpose->caption());

		// evaluationstatus
		$this->evaluationstatus->EditAttrs["class"] = "form-control";
		$this->evaluationstatus->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->evaluationstatus->CurrentValue = HtmlDecode($this->evaluationstatus->CurrentValue);
		$this->evaluationstatus->EditValue = $this->evaluationstatus->CurrentValue;
		$this->evaluationstatus->PlaceHolder = RemoveHtml($this->evaluationstatus->caption());

		// transferdate
		$this->transferdate->EditAttrs["class"] = "form-control";
		$this->transferdate->EditCustomAttributes = "";
		$this->transferdate->EditValue = FormatDateTime($this->transferdate->CurrentValue, 8);
		$this->transferdate->PlaceHolder = RemoveHtml($this->transferdate->caption());

		// revenuetype
		$this->revenuetype->EditAttrs["class"] = "form-control";
		$this->revenuetype->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->revenuetype->CurrentValue = HtmlDecode($this->revenuetype->CurrentValue);
		$this->revenuetype->EditValue = $this->revenuetype->CurrentValue;
		$this->revenuetype->PlaceHolder = RemoveHtml($this->revenuetype->caption());

		// noofemployees
		$this->noofemployees->EditAttrs["class"] = "form-control";
		$this->noofemployees->EditCustomAttributes = "";
		$this->noofemployees->EditValue = $this->noofemployees->CurrentValue;
		$this->noofemployees->PlaceHolder = RemoveHtml($this->noofemployees->caption());

		// secondaryemail
		$this->secondaryemail->EditAttrs["class"] = "form-control";
		$this->secondaryemail->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->secondaryemail->CurrentValue = HtmlDecode($this->secondaryemail->CurrentValue);
		$this->secondaryemail->EditValue = $this->secondaryemail->CurrentValue;
		$this->secondaryemail->PlaceHolder = RemoveHtml($this->secondaryemail->caption());

		// noapprovalcalls
		$this->noapprovalcalls->EditAttrs["class"] = "form-control";
		$this->noapprovalcalls->EditCustomAttributes = "";
		$this->noapprovalcalls->EditValue = $this->noapprovalcalls->CurrentValue;
		$this->noapprovalcalls->PlaceHolder = RemoveHtml($this->noapprovalcalls->caption());

		// noapprovalemails
		$this->noapprovalemails->EditAttrs["class"] = "form-control";
		$this->noapprovalemails->EditCustomAttributes = "";
		$this->noapprovalemails->EditValue = $this->noapprovalemails->CurrentValue;
		$this->noapprovalemails->PlaceHolder = RemoveHtml($this->noapprovalemails->caption());

		// vat_id
		$this->vat_id->EditAttrs["class"] = "form-control";
		$this->vat_id->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->vat_id->CurrentValue = HtmlDecode($this->vat_id->CurrentValue);
		$this->vat_id->EditValue = $this->vat_id->CurrentValue;
		$this->vat_id->PlaceHolder = RemoveHtml($this->vat_id->caption());

		// registration_number_1
		$this->registration_number_1->EditAttrs["class"] = "form-control";
		$this->registration_number_1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->registration_number_1->CurrentValue = HtmlDecode($this->registration_number_1->CurrentValue);
		$this->registration_number_1->EditValue = $this->registration_number_1->CurrentValue;
		$this->registration_number_1->PlaceHolder = RemoveHtml($this->registration_number_1->caption());

		// registration_number_2
		$this->registration_number_2->EditAttrs["class"] = "form-control";
		$this->registration_number_2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->registration_number_2->CurrentValue = HtmlDecode($this->registration_number_2->CurrentValue);
		$this->registration_number_2->EditValue = $this->registration_number_2->CurrentValue;
		$this->registration_number_2->PlaceHolder = RemoveHtml($this->registration_number_2->caption());

		// verification
		$this->verification->EditAttrs["class"] = "form-control";
		$this->verification->EditCustomAttributes = "";
		$this->verification->EditValue = $this->verification->CurrentValue;
		$this->verification->PlaceHolder = RemoveHtml($this->verification->caption());

		// subindustry
		$this->subindustry->EditAttrs["class"] = "form-control";
		$this->subindustry->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->subindustry->CurrentValue = HtmlDecode($this->subindustry->CurrentValue);
		$this->subindustry->EditValue = $this->subindustry->CurrentValue;
		$this->subindustry->PlaceHolder = RemoveHtml($this->subindustry->caption());

		// atenttion
		$this->atenttion->EditAttrs["class"] = "form-control";
		$this->atenttion->EditCustomAttributes = "";
		$this->atenttion->EditValue = $this->atenttion->CurrentValue;
		$this->atenttion->PlaceHolder = RemoveHtml($this->atenttion->caption());

		// leads_relation
		$this->leads_relation->EditAttrs["class"] = "form-control";
		$this->leads_relation->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->leads_relation->CurrentValue = HtmlDecode($this->leads_relation->CurrentValue);
		$this->leads_relation->EditValue = $this->leads_relation->CurrentValue;
		$this->leads_relation->PlaceHolder = RemoveHtml($this->leads_relation->caption());

		// legal_form
		$this->legal_form->EditAttrs["class"] = "form-control";
		$this->legal_form->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->legal_form->CurrentValue = HtmlDecode($this->legal_form->CurrentValue);
		$this->legal_form->EditValue = $this->legal_form->CurrentValue;
		$this->legal_form->PlaceHolder = RemoveHtml($this->legal_form->caption());

		// sum_time
		$this->sum_time->EditAttrs["class"] = "form-control";
		$this->sum_time->EditCustomAttributes = "";
		$this->sum_time->EditValue = $this->sum_time->CurrentValue;
		$this->sum_time->PlaceHolder = RemoveHtml($this->sum_time->caption());
		if (strval($this->sum_time->EditValue) <> "" && is_numeric($this->sum_time->EditValue))
			$this->sum_time->EditValue = FormatNumber($this->sum_time->EditValue, -2, -2, -2, -2);

		// active
		$this->active->EditAttrs["class"] = "form-control";
		$this->active->EditCustomAttributes = "";
		$this->active->EditValue = $this->active->CurrentValue;
		$this->active->PlaceHolder = RemoveHtml($this->active->caption());

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
					$doc->exportCaption($this->leadid);
					$doc->exportCaption($this->lead_no);
					$doc->exportCaption($this->_email);
					$doc->exportCaption($this->interest);
					$doc->exportCaption($this->firstname);
					$doc->exportCaption($this->salutation);
					$doc->exportCaption($this->lastname);
					$doc->exportCaption($this->company);
					$doc->exportCaption($this->annualrevenue);
					$doc->exportCaption($this->industry);
					$doc->exportCaption($this->campaign);
					$doc->exportCaption($this->leadstatus);
					$doc->exportCaption($this->leadsource);
					$doc->exportCaption($this->converted);
					$doc->exportCaption($this->licencekeystatus);
					$doc->exportCaption($this->space);
					$doc->exportCaption($this->comments);
					$doc->exportCaption($this->priority);
					$doc->exportCaption($this->demorequest);
					$doc->exportCaption($this->partnercontact);
					$doc->exportCaption($this->productversion);
					$doc->exportCaption($this->product);
					$doc->exportCaption($this->maildate);
					$doc->exportCaption($this->nextstepdate);
					$doc->exportCaption($this->fundingsituation);
					$doc->exportCaption($this->purpose);
					$doc->exportCaption($this->evaluationstatus);
					$doc->exportCaption($this->transferdate);
					$doc->exportCaption($this->revenuetype);
					$doc->exportCaption($this->noofemployees);
					$doc->exportCaption($this->secondaryemail);
					$doc->exportCaption($this->noapprovalcalls);
					$doc->exportCaption($this->noapprovalemails);
					$doc->exportCaption($this->vat_id);
					$doc->exportCaption($this->registration_number_1);
					$doc->exportCaption($this->registration_number_2);
					$doc->exportCaption($this->verification);
					$doc->exportCaption($this->subindustry);
					$doc->exportCaption($this->atenttion);
					$doc->exportCaption($this->leads_relation);
					$doc->exportCaption($this->legal_form);
					$doc->exportCaption($this->sum_time);
					$doc->exportCaption($this->active);
				} else {
					$doc->exportCaption($this->leadid);
					$doc->exportCaption($this->lead_no);
					$doc->exportCaption($this->_email);
					$doc->exportCaption($this->interest);
					$doc->exportCaption($this->firstname);
					$doc->exportCaption($this->salutation);
					$doc->exportCaption($this->lastname);
					$doc->exportCaption($this->company);
					$doc->exportCaption($this->annualrevenue);
					$doc->exportCaption($this->industry);
					$doc->exportCaption($this->campaign);
					$doc->exportCaption($this->leadstatus);
					$doc->exportCaption($this->leadsource);
					$doc->exportCaption($this->converted);
					$doc->exportCaption($this->licencekeystatus);
					$doc->exportCaption($this->space);
					$doc->exportCaption($this->priority);
					$doc->exportCaption($this->demorequest);
					$doc->exportCaption($this->partnercontact);
					$doc->exportCaption($this->productversion);
					$doc->exportCaption($this->product);
					$doc->exportCaption($this->maildate);
					$doc->exportCaption($this->nextstepdate);
					$doc->exportCaption($this->fundingsituation);
					$doc->exportCaption($this->purpose);
					$doc->exportCaption($this->evaluationstatus);
					$doc->exportCaption($this->transferdate);
					$doc->exportCaption($this->revenuetype);
					$doc->exportCaption($this->noofemployees);
					$doc->exportCaption($this->secondaryemail);
					$doc->exportCaption($this->noapprovalcalls);
					$doc->exportCaption($this->noapprovalemails);
					$doc->exportCaption($this->vat_id);
					$doc->exportCaption($this->registration_number_1);
					$doc->exportCaption($this->registration_number_2);
					$doc->exportCaption($this->subindustry);
					$doc->exportCaption($this->leads_relation);
					$doc->exportCaption($this->legal_form);
					$doc->exportCaption($this->sum_time);
					$doc->exportCaption($this->active);
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
						$doc->exportField($this->leadid);
						$doc->exportField($this->lead_no);
						$doc->exportField($this->_email);
						$doc->exportField($this->interest);
						$doc->exportField($this->firstname);
						$doc->exportField($this->salutation);
						$doc->exportField($this->lastname);
						$doc->exportField($this->company);
						$doc->exportField($this->annualrevenue);
						$doc->exportField($this->industry);
						$doc->exportField($this->campaign);
						$doc->exportField($this->leadstatus);
						$doc->exportField($this->leadsource);
						$doc->exportField($this->converted);
						$doc->exportField($this->licencekeystatus);
						$doc->exportField($this->space);
						$doc->exportField($this->comments);
						$doc->exportField($this->priority);
						$doc->exportField($this->demorequest);
						$doc->exportField($this->partnercontact);
						$doc->exportField($this->productversion);
						$doc->exportField($this->product);
						$doc->exportField($this->maildate);
						$doc->exportField($this->nextstepdate);
						$doc->exportField($this->fundingsituation);
						$doc->exportField($this->purpose);
						$doc->exportField($this->evaluationstatus);
						$doc->exportField($this->transferdate);
						$doc->exportField($this->revenuetype);
						$doc->exportField($this->noofemployees);
						$doc->exportField($this->secondaryemail);
						$doc->exportField($this->noapprovalcalls);
						$doc->exportField($this->noapprovalemails);
						$doc->exportField($this->vat_id);
						$doc->exportField($this->registration_number_1);
						$doc->exportField($this->registration_number_2);
						$doc->exportField($this->verification);
						$doc->exportField($this->subindustry);
						$doc->exportField($this->atenttion);
						$doc->exportField($this->leads_relation);
						$doc->exportField($this->legal_form);
						$doc->exportField($this->sum_time);
						$doc->exportField($this->active);
					} else {
						$doc->exportField($this->leadid);
						$doc->exportField($this->lead_no);
						$doc->exportField($this->_email);
						$doc->exportField($this->interest);
						$doc->exportField($this->firstname);
						$doc->exportField($this->salutation);
						$doc->exportField($this->lastname);
						$doc->exportField($this->company);
						$doc->exportField($this->annualrevenue);
						$doc->exportField($this->industry);
						$doc->exportField($this->campaign);
						$doc->exportField($this->leadstatus);
						$doc->exportField($this->leadsource);
						$doc->exportField($this->converted);
						$doc->exportField($this->licencekeystatus);
						$doc->exportField($this->space);
						$doc->exportField($this->priority);
						$doc->exportField($this->demorequest);
						$doc->exportField($this->partnercontact);
						$doc->exportField($this->productversion);
						$doc->exportField($this->product);
						$doc->exportField($this->maildate);
						$doc->exportField($this->nextstepdate);
						$doc->exportField($this->fundingsituation);
						$doc->exportField($this->purpose);
						$doc->exportField($this->evaluationstatus);
						$doc->exportField($this->transferdate);
						$doc->exportField($this->revenuetype);
						$doc->exportField($this->noofemployees);
						$doc->exportField($this->secondaryemail);
						$doc->exportField($this->noapprovalcalls);
						$doc->exportField($this->noapprovalemails);
						$doc->exportField($this->vat_id);
						$doc->exportField($this->registration_number_1);
						$doc->exportField($this->registration_number_2);
						$doc->exportField($this->subindustry);
						$doc->exportField($this->leads_relation);
						$doc->exportField($this->legal_form);
						$doc->exportField($this->sum_time);
						$doc->exportField($this->active);
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