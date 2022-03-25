<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for crm_leaddetails
 */
class CrmLeaddetails extends DbTable
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

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'crm_leaddetails';
        $this->TableName = 'crm_leaddetails';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`crm_leaddetails`";
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

        // leadid
        $this->leadid = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_leadid', 'leadid', '`leadid`', '`leadid`', 3, 10, -1, false, '`leadid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->leadid->IsPrimaryKey = true; // Primary key field
        $this->leadid->Nullable = false; // NOT NULL field
        $this->leadid->Required = true; // Required field
        $this->leadid->Sortable = true; // Allow sort
        $this->leadid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->leadid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->leadid->Param, "CustomMsg");
        $this->Fields['leadid'] = &$this->leadid;

        // lead_no
        $this->lead_no = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_lead_no', 'lead_no', '`lead_no`', '`lead_no`', 200, 100, -1, false, '`lead_no`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->lead_no->Nullable = false; // NOT NULL field
        $this->lead_no->Required = true; // Required field
        $this->lead_no->Sortable = true; // Allow sort
        $this->lead_no->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->lead_no->Param, "CustomMsg");
        $this->Fields['lead_no'] = &$this->lead_no;

        // email
        $this->_email = new DbField('crm_leaddetails', 'crm_leaddetails', 'x__email', 'email', '`email`', '`email`', 200, 100, -1, false, '`email`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_email->Sortable = true; // Allow sort
        $this->_email->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_email->Param, "CustomMsg");
        $this->Fields['email'] = &$this->_email;

        // interest
        $this->interest = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_interest', 'interest', '`interest`', '`interest`', 200, 50, -1, false, '`interest`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->interest->Sortable = true; // Allow sort
        $this->interest->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->interest->Param, "CustomMsg");
        $this->Fields['interest'] = &$this->interest;

        // firstname
        $this->firstname = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_firstname', 'firstname', '`firstname`', '`firstname`', 200, 40, -1, false, '`firstname`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->firstname->Sortable = true; // Allow sort
        $this->firstname->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->firstname->Param, "CustomMsg");
        $this->Fields['firstname'] = &$this->firstname;

        // salutation
        $this->salutation = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_salutation', 'salutation', '`salutation`', '`salutation`', 200, 200, -1, false, '`salutation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->salutation->Sortable = true; // Allow sort
        $this->salutation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->salutation->Param, "CustomMsg");
        $this->Fields['salutation'] = &$this->salutation;

        // lastname
        $this->lastname = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_lastname', 'lastname', '`lastname`', '`lastname`', 200, 80, -1, false, '`lastname`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->lastname->Sortable = true; // Allow sort
        $this->lastname->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->lastname->Param, "CustomMsg");
        $this->Fields['lastname'] = &$this->lastname;

        // company
        $this->company = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_company', 'company', '`company`', '`company`', 200, 100, -1, false, '`company`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->company->Nullable = false; // NOT NULL field
        $this->company->Required = true; // Required field
        $this->company->Sortable = true; // Allow sort
        $this->company->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->company->Param, "CustomMsg");
        $this->Fields['company'] = &$this->company;

        // annualrevenue
        $this->annualrevenue = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_annualrevenue', 'annualrevenue', '`annualrevenue`', '`annualrevenue`', 131, 28, -1, false, '`annualrevenue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->annualrevenue->Sortable = true; // Allow sort
        $this->annualrevenue->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->annualrevenue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->annualrevenue->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->annualrevenue->Param, "CustomMsg");
        $this->Fields['annualrevenue'] = &$this->annualrevenue;

        // industry
        $this->industry = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_industry', 'industry', '`industry`', '`industry`', 200, 200, -1, false, '`industry`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->industry->Sortable = true; // Allow sort
        $this->industry->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->industry->Param, "CustomMsg");
        $this->Fields['industry'] = &$this->industry;

        // campaign
        $this->campaign = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_campaign', 'campaign', '`campaign`', '`campaign`', 200, 30, -1, false, '`campaign`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->campaign->Sortable = true; // Allow sort
        $this->campaign->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->campaign->Param, "CustomMsg");
        $this->Fields['campaign'] = &$this->campaign;

        // leadstatus
        $this->leadstatus = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_leadstatus', 'leadstatus', '`leadstatus`', '`leadstatus`', 200, 50, -1, false, '`leadstatus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->leadstatus->Sortable = true; // Allow sort
        $this->leadstatus->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->leadstatus->Param, "CustomMsg");
        $this->Fields['leadstatus'] = &$this->leadstatus;

        // leadsource
        $this->leadsource = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_leadsource', 'leadsource', '`leadsource`', '`leadsource`', 200, 200, -1, false, '`leadsource`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->leadsource->Sortable = true; // Allow sort
        $this->leadsource->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->leadsource->Param, "CustomMsg");
        $this->Fields['leadsource'] = &$this->leadsource;

        // converted
        $this->converted = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_converted', 'converted', '`converted`', '`converted`', 17, 1, -1, false, '`converted`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->converted->Nullable = false; // NOT NULL field
        $this->converted->Sortable = true; // Allow sort
        $this->converted->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->converted->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->converted->Param, "CustomMsg");
        $this->Fields['converted'] = &$this->converted;

        // licencekeystatus
        $this->licencekeystatus = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_licencekeystatus', 'licencekeystatus', '`licencekeystatus`', '`licencekeystatus`', 200, 50, -1, false, '`licencekeystatus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->licencekeystatus->Sortable = true; // Allow sort
        $this->licencekeystatus->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->licencekeystatus->Param, "CustomMsg");
        $this->Fields['licencekeystatus'] = &$this->licencekeystatus;

        // space
        $this->space = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_space', 'space', '`space`', '`space`', 200, 250, -1, false, '`space`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->space->Sortable = true; // Allow sort
        $this->space->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->space->Param, "CustomMsg");
        $this->Fields['space'] = &$this->space;

        // comments
        $this->comments = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_comments', 'comments', '`comments`', '`comments`', 201, 65535, -1, false, '`comments`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->comments->Sortable = true; // Allow sort
        $this->comments->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->comments->Param, "CustomMsg");
        $this->Fields['comments'] = &$this->comments;

        // priority
        $this->priority = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_priority', 'priority', '`priority`', '`priority`', 200, 50, -1, false, '`priority`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->priority->Sortable = true; // Allow sort
        $this->priority->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->priority->Param, "CustomMsg");
        $this->Fields['priority'] = &$this->priority;

        // demorequest
        $this->demorequest = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_demorequest', 'demorequest', '`demorequest`', '`demorequest`', 200, 50, -1, false, '`demorequest`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->demorequest->Sortable = true; // Allow sort
        $this->demorequest->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->demorequest->Param, "CustomMsg");
        $this->Fields['demorequest'] = &$this->demorequest;

        // partnercontact
        $this->partnercontact = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_partnercontact', 'partnercontact', '`partnercontact`', '`partnercontact`', 200, 50, -1, false, '`partnercontact`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->partnercontact->Sortable = true; // Allow sort
        $this->partnercontact->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->partnercontact->Param, "CustomMsg");
        $this->Fields['partnercontact'] = &$this->partnercontact;

        // productversion
        $this->productversion = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_productversion', 'productversion', '`productversion`', '`productversion`', 200, 20, -1, false, '`productversion`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->productversion->Sortable = true; // Allow sort
        $this->productversion->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->productversion->Param, "CustomMsg");
        $this->Fields['productversion'] = &$this->productversion;

        // product
        $this->product = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_product', 'product', '`product`', '`product`', 200, 50, -1, false, '`product`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->product->Sortable = true; // Allow sort
        $this->product->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->product->Param, "CustomMsg");
        $this->Fields['product'] = &$this->product;

        // maildate
        $this->maildate = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_maildate', 'maildate', '`maildate`', CastDateFieldForLike("`maildate`", 0, "DB"), 133, 10, 0, false, '`maildate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->maildate->Sortable = true; // Allow sort
        $this->maildate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->maildate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->maildate->Param, "CustomMsg");
        $this->Fields['maildate'] = &$this->maildate;

        // nextstepdate
        $this->nextstepdate = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_nextstepdate', 'nextstepdate', '`nextstepdate`', CastDateFieldForLike("`nextstepdate`", 0, "DB"), 133, 10, 0, false, '`nextstepdate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->nextstepdate->Sortable = true; // Allow sort
        $this->nextstepdate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->nextstepdate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->nextstepdate->Param, "CustomMsg");
        $this->Fields['nextstepdate'] = &$this->nextstepdate;

        // fundingsituation
        $this->fundingsituation = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_fundingsituation', 'fundingsituation', '`fundingsituation`', '`fundingsituation`', 200, 50, -1, false, '`fundingsituation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->fundingsituation->Sortable = true; // Allow sort
        $this->fundingsituation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->fundingsituation->Param, "CustomMsg");
        $this->Fields['fundingsituation'] = &$this->fundingsituation;

        // purpose
        $this->purpose = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_purpose', 'purpose', '`purpose`', '`purpose`', 200, 50, -1, false, '`purpose`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->purpose->Sortable = true; // Allow sort
        $this->purpose->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->purpose->Param, "CustomMsg");
        $this->Fields['purpose'] = &$this->purpose;

        // evaluationstatus
        $this->evaluationstatus = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_evaluationstatus', 'evaluationstatus', '`evaluationstatus`', '`evaluationstatus`', 200, 50, -1, false, '`evaluationstatus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->evaluationstatus->Sortable = true; // Allow sort
        $this->evaluationstatus->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->evaluationstatus->Param, "CustomMsg");
        $this->Fields['evaluationstatus'] = &$this->evaluationstatus;

        // transferdate
        $this->transferdate = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_transferdate', 'transferdate', '`transferdate`', CastDateFieldForLike("`transferdate`", 0, "DB"), 133, 10, 0, false, '`transferdate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->transferdate->Sortable = true; // Allow sort
        $this->transferdate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->transferdate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->transferdate->Param, "CustomMsg");
        $this->Fields['transferdate'] = &$this->transferdate;

        // revenuetype
        $this->revenuetype = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_revenuetype', 'revenuetype', '`revenuetype`', '`revenuetype`', 200, 50, -1, false, '`revenuetype`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->revenuetype->Sortable = true; // Allow sort
        $this->revenuetype->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->revenuetype->Param, "CustomMsg");
        $this->Fields['revenuetype'] = &$this->revenuetype;

        // noofemployees
        $this->noofemployees = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_noofemployees', 'noofemployees', '`noofemployees`', '`noofemployees`', 3, 50, -1, false, '`noofemployees`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->noofemployees->Sortable = true; // Allow sort
        $this->noofemployees->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->noofemployees->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->noofemployees->Param, "CustomMsg");
        $this->Fields['noofemployees'] = &$this->noofemployees;

        // secondaryemail
        $this->secondaryemail = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_secondaryemail', 'secondaryemail', '`secondaryemail`', '`secondaryemail`', 200, 100, -1, false, '`secondaryemail`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->secondaryemail->Sortable = true; // Allow sort
        $this->secondaryemail->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->secondaryemail->Param, "CustomMsg");
        $this->Fields['secondaryemail'] = &$this->secondaryemail;

        // noapprovalcalls
        $this->noapprovalcalls = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_noapprovalcalls', 'noapprovalcalls', '`noapprovalcalls`', '`noapprovalcalls`', 2, 1, -1, false, '`noapprovalcalls`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->noapprovalcalls->Sortable = true; // Allow sort
        $this->noapprovalcalls->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->noapprovalcalls->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->noapprovalcalls->Param, "CustomMsg");
        $this->Fields['noapprovalcalls'] = &$this->noapprovalcalls;

        // noapprovalemails
        $this->noapprovalemails = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_noapprovalemails', 'noapprovalemails', '`noapprovalemails`', '`noapprovalemails`', 2, 1, -1, false, '`noapprovalemails`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->noapprovalemails->Sortable = true; // Allow sort
        $this->noapprovalemails->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->noapprovalemails->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->noapprovalemails->Param, "CustomMsg");
        $this->Fields['noapprovalemails'] = &$this->noapprovalemails;

        // vat_id
        $this->vat_id = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_vat_id', 'vat_id', '`vat_id`', '`vat_id`', 200, 50, -1, false, '`vat_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vat_id->Sortable = true; // Allow sort
        $this->vat_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->vat_id->Param, "CustomMsg");
        $this->Fields['vat_id'] = &$this->vat_id;

        // registration_number_1
        $this->registration_number_1 = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_registration_number_1', 'registration_number_1', '`registration_number_1`', '`registration_number_1`', 200, 30, -1, false, '`registration_number_1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->registration_number_1->Sortable = true; // Allow sort
        $this->registration_number_1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->registration_number_1->Param, "CustomMsg");
        $this->Fields['registration_number_1'] = &$this->registration_number_1;

        // registration_number_2
        $this->registration_number_2 = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_registration_number_2', 'registration_number_2', '`registration_number_2`', '`registration_number_2`', 200, 30, -1, false, '`registration_number_2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->registration_number_2->Sortable = true; // Allow sort
        $this->registration_number_2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->registration_number_2->Param, "CustomMsg");
        $this->Fields['registration_number_2'] = &$this->registration_number_2;

        // verification
        $this->verification = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_verification', 'verification', '`verification`', '`verification`', 201, 65535, -1, false, '`verification`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->verification->Sortable = true; // Allow sort
        $this->verification->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->verification->Param, "CustomMsg");
        $this->Fields['verification'] = &$this->verification;

        // subindustry
        $this->subindustry = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_subindustry', 'subindustry', '`subindustry`', '`subindustry`', 200, 255, -1, false, '`subindustry`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->subindustry->Sortable = true; // Allow sort
        $this->subindustry->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->subindustry->Param, "CustomMsg");
        $this->Fields['subindustry'] = &$this->subindustry;

        // atenttion
        $this->atenttion = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_atenttion', 'atenttion', '`atenttion`', '`atenttion`', 201, 65535, -1, false, '`atenttion`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->atenttion->Sortable = true; // Allow sort
        $this->atenttion->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->atenttion->Param, "CustomMsg");
        $this->Fields['atenttion'] = &$this->atenttion;

        // leads_relation
        $this->leads_relation = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_leads_relation', 'leads_relation', '`leads_relation`', '`leads_relation`', 200, 255, -1, false, '`leads_relation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->leads_relation->Sortable = true; // Allow sort
        $this->leads_relation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->leads_relation->Param, "CustomMsg");
        $this->Fields['leads_relation'] = &$this->leads_relation;

        // legal_form
        $this->legal_form = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_legal_form', 'legal_form', '`legal_form`', '`legal_form`', 200, 255, -1, false, '`legal_form`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->legal_form->Sortable = true; // Allow sort
        $this->legal_form->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->legal_form->Param, "CustomMsg");
        $this->Fields['legal_form'] = &$this->legal_form;

        // sum_time
        $this->sum_time = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_sum_time', 'sum_time', '`sum_time`', '`sum_time`', 131, 10, -1, false, '`sum_time`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->sum_time->Sortable = true; // Allow sort
        $this->sum_time->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->sum_time->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->sum_time->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->sum_time->Param, "CustomMsg");
        $this->Fields['sum_time'] = &$this->sum_time;

        // active
        $this->active = new DbField('crm_leaddetails', 'crm_leaddetails', 'x_active', 'active', '`active`', '`active`', 16, 1, -1, false, '`active`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->active->Sortable = true; // Allow sort
        $this->active->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->active->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->active->Param, "CustomMsg");
        $this->Fields['active'] = &$this->active;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`crm_leaddetails`";
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
            if (array_key_exists('leadid', $rs)) {
                AddFilter($where, QuotedName('leadid', $this->Dbid) . '=' . QuotedValue($rs['leadid'], $this->leadid->DataType, $this->Dbid));
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

    // Get Key
    public function getKey($current = false)
    {
        $keys = [];
        $val = $current ? $this->leadid->CurrentValue : $this->leadid->OldValue;
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
                $this->leadid->CurrentValue = $keys[0];
            } else {
                $this->leadid->OldValue = $keys[0];
            }
        }
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
        if (is_array($row)) {
            $val = array_key_exists('leadid', $row) ? $row['leadid'] : null;
        } else {
            $val = $this->leadid->OldValue !== null ? $this->leadid->OldValue : $this->leadid->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@leadid@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
        return $_SESSION[$name] ?? GetUrl("CrmLeaddetailsList");
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
        if ($pageName == "CrmLeaddetailsView") {
            return $Language->phrase("View");
        } elseif ($pageName == "CrmLeaddetailsEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "CrmLeaddetailsAdd") {
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
                return "CrmLeaddetailsView";
            case Config("API_ADD_ACTION"):
                return "CrmLeaddetailsAdd";
            case Config("API_EDIT_ACTION"):
                return "CrmLeaddetailsEdit";
            case Config("API_DELETE_ACTION"):
                return "CrmLeaddetailsDelete";
            case Config("API_LIST_ACTION"):
                return "CrmLeaddetailsList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "CrmLeaddetailsList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("CrmLeaddetailsView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("CrmLeaddetailsView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "CrmLeaddetailsAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "CrmLeaddetailsAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("CrmLeaddetailsEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("CrmLeaddetailsAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("CrmLeaddetailsDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json .= "leadid:" . JsonEncode($this->leadid->CurrentValue, "number");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
        if ($this->leadid->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->leadid->CurrentValue);
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
            if (($keyValue = Param("leadid") ?? Route("leadid")) !== null) {
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
                $this->leadid->CurrentValue = $key;
            } else {
                $this->leadid->OldValue = $key;
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
        $this->leadid->setDbValue($row['leadid']);
        $this->lead_no->setDbValue($row['lead_no']);
        $this->_email->setDbValue($row['email']);
        $this->interest->setDbValue($row['interest']);
        $this->firstname->setDbValue($row['firstname']);
        $this->salutation->setDbValue($row['salutation']);
        $this->lastname->setDbValue($row['lastname']);
        $this->company->setDbValue($row['company']);
        $this->annualrevenue->setDbValue($row['annualrevenue']);
        $this->industry->setDbValue($row['industry']);
        $this->campaign->setDbValue($row['campaign']);
        $this->leadstatus->setDbValue($row['leadstatus']);
        $this->leadsource->setDbValue($row['leadsource']);
        $this->converted->setDbValue($row['converted']);
        $this->licencekeystatus->setDbValue($row['licencekeystatus']);
        $this->space->setDbValue($row['space']);
        $this->comments->setDbValue($row['comments']);
        $this->priority->setDbValue($row['priority']);
        $this->demorequest->setDbValue($row['demorequest']);
        $this->partnercontact->setDbValue($row['partnercontact']);
        $this->productversion->setDbValue($row['productversion']);
        $this->product->setDbValue($row['product']);
        $this->maildate->setDbValue($row['maildate']);
        $this->nextstepdate->setDbValue($row['nextstepdate']);
        $this->fundingsituation->setDbValue($row['fundingsituation']);
        $this->purpose->setDbValue($row['purpose']);
        $this->evaluationstatus->setDbValue($row['evaluationstatus']);
        $this->transferdate->setDbValue($row['transferdate']);
        $this->revenuetype->setDbValue($row['revenuetype']);
        $this->noofemployees->setDbValue($row['noofemployees']);
        $this->secondaryemail->setDbValue($row['secondaryemail']);
        $this->noapprovalcalls->setDbValue($row['noapprovalcalls']);
        $this->noapprovalemails->setDbValue($row['noapprovalemails']);
        $this->vat_id->setDbValue($row['vat_id']);
        $this->registration_number_1->setDbValue($row['registration_number_1']);
        $this->registration_number_2->setDbValue($row['registration_number_2']);
        $this->verification->setDbValue($row['verification']);
        $this->subindustry->setDbValue($row['subindustry']);
        $this->atenttion->setDbValue($row['atenttion']);
        $this->leads_relation->setDbValue($row['leads_relation']);
        $this->legal_form->setDbValue($row['legal_form']);
        $this->sum_time->setDbValue($row['sum_time']);
        $this->active->setDbValue($row['active']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

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

        // leadid
        $this->leadid->EditAttrs["class"] = "form-control";
        $this->leadid->EditCustomAttributes = "";
        $this->leadid->EditValue = $this->leadid->CurrentValue;
        $this->leadid->PlaceHolder = RemoveHtml($this->leadid->caption());

        // lead_no
        $this->lead_no->EditAttrs["class"] = "form-control";
        $this->lead_no->EditCustomAttributes = "";
        if (!$this->lead_no->Raw) {
            $this->lead_no->CurrentValue = HtmlDecode($this->lead_no->CurrentValue);
        }
        $this->lead_no->EditValue = $this->lead_no->CurrentValue;
        $this->lead_no->PlaceHolder = RemoveHtml($this->lead_no->caption());

        // email
        $this->_email->EditAttrs["class"] = "form-control";
        $this->_email->EditCustomAttributes = "";
        if (!$this->_email->Raw) {
            $this->_email->CurrentValue = HtmlDecode($this->_email->CurrentValue);
        }
        $this->_email->EditValue = $this->_email->CurrentValue;
        $this->_email->PlaceHolder = RemoveHtml($this->_email->caption());

        // interest
        $this->interest->EditAttrs["class"] = "form-control";
        $this->interest->EditCustomAttributes = "";
        if (!$this->interest->Raw) {
            $this->interest->CurrentValue = HtmlDecode($this->interest->CurrentValue);
        }
        $this->interest->EditValue = $this->interest->CurrentValue;
        $this->interest->PlaceHolder = RemoveHtml($this->interest->caption());

        // firstname
        $this->firstname->EditAttrs["class"] = "form-control";
        $this->firstname->EditCustomAttributes = "";
        if (!$this->firstname->Raw) {
            $this->firstname->CurrentValue = HtmlDecode($this->firstname->CurrentValue);
        }
        $this->firstname->EditValue = $this->firstname->CurrentValue;
        $this->firstname->PlaceHolder = RemoveHtml($this->firstname->caption());

        // salutation
        $this->salutation->EditAttrs["class"] = "form-control";
        $this->salutation->EditCustomAttributes = "";
        if (!$this->salutation->Raw) {
            $this->salutation->CurrentValue = HtmlDecode($this->salutation->CurrentValue);
        }
        $this->salutation->EditValue = $this->salutation->CurrentValue;
        $this->salutation->PlaceHolder = RemoveHtml($this->salutation->caption());

        // lastname
        $this->lastname->EditAttrs["class"] = "form-control";
        $this->lastname->EditCustomAttributes = "";
        if (!$this->lastname->Raw) {
            $this->lastname->CurrentValue = HtmlDecode($this->lastname->CurrentValue);
        }
        $this->lastname->EditValue = $this->lastname->CurrentValue;
        $this->lastname->PlaceHolder = RemoveHtml($this->lastname->caption());

        // company
        $this->company->EditAttrs["class"] = "form-control";
        $this->company->EditCustomAttributes = "";
        if (!$this->company->Raw) {
            $this->company->CurrentValue = HtmlDecode($this->company->CurrentValue);
        }
        $this->company->EditValue = $this->company->CurrentValue;
        $this->company->PlaceHolder = RemoveHtml($this->company->caption());

        // annualrevenue
        $this->annualrevenue->EditAttrs["class"] = "form-control";
        $this->annualrevenue->EditCustomAttributes = "";
        $this->annualrevenue->EditValue = $this->annualrevenue->CurrentValue;
        $this->annualrevenue->PlaceHolder = RemoveHtml($this->annualrevenue->caption());
        if (strval($this->annualrevenue->EditValue) != "" && is_numeric($this->annualrevenue->EditValue)) {
            $this->annualrevenue->EditValue = FormatNumber($this->annualrevenue->EditValue, -2, -2, -2, -2);
        }

        // industry
        $this->industry->EditAttrs["class"] = "form-control";
        $this->industry->EditCustomAttributes = "";
        if (!$this->industry->Raw) {
            $this->industry->CurrentValue = HtmlDecode($this->industry->CurrentValue);
        }
        $this->industry->EditValue = $this->industry->CurrentValue;
        $this->industry->PlaceHolder = RemoveHtml($this->industry->caption());

        // campaign
        $this->campaign->EditAttrs["class"] = "form-control";
        $this->campaign->EditCustomAttributes = "";
        if (!$this->campaign->Raw) {
            $this->campaign->CurrentValue = HtmlDecode($this->campaign->CurrentValue);
        }
        $this->campaign->EditValue = $this->campaign->CurrentValue;
        $this->campaign->PlaceHolder = RemoveHtml($this->campaign->caption());

        // leadstatus
        $this->leadstatus->EditAttrs["class"] = "form-control";
        $this->leadstatus->EditCustomAttributes = "";
        if (!$this->leadstatus->Raw) {
            $this->leadstatus->CurrentValue = HtmlDecode($this->leadstatus->CurrentValue);
        }
        $this->leadstatus->EditValue = $this->leadstatus->CurrentValue;
        $this->leadstatus->PlaceHolder = RemoveHtml($this->leadstatus->caption());

        // leadsource
        $this->leadsource->EditAttrs["class"] = "form-control";
        $this->leadsource->EditCustomAttributes = "";
        if (!$this->leadsource->Raw) {
            $this->leadsource->CurrentValue = HtmlDecode($this->leadsource->CurrentValue);
        }
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
        if (!$this->licencekeystatus->Raw) {
            $this->licencekeystatus->CurrentValue = HtmlDecode($this->licencekeystatus->CurrentValue);
        }
        $this->licencekeystatus->EditValue = $this->licencekeystatus->CurrentValue;
        $this->licencekeystatus->PlaceHolder = RemoveHtml($this->licencekeystatus->caption());

        // space
        $this->space->EditAttrs["class"] = "form-control";
        $this->space->EditCustomAttributes = "";
        if (!$this->space->Raw) {
            $this->space->CurrentValue = HtmlDecode($this->space->CurrentValue);
        }
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
        if (!$this->priority->Raw) {
            $this->priority->CurrentValue = HtmlDecode($this->priority->CurrentValue);
        }
        $this->priority->EditValue = $this->priority->CurrentValue;
        $this->priority->PlaceHolder = RemoveHtml($this->priority->caption());

        // demorequest
        $this->demorequest->EditAttrs["class"] = "form-control";
        $this->demorequest->EditCustomAttributes = "";
        if (!$this->demorequest->Raw) {
            $this->demorequest->CurrentValue = HtmlDecode($this->demorequest->CurrentValue);
        }
        $this->demorequest->EditValue = $this->demorequest->CurrentValue;
        $this->demorequest->PlaceHolder = RemoveHtml($this->demorequest->caption());

        // partnercontact
        $this->partnercontact->EditAttrs["class"] = "form-control";
        $this->partnercontact->EditCustomAttributes = "";
        if (!$this->partnercontact->Raw) {
            $this->partnercontact->CurrentValue = HtmlDecode($this->partnercontact->CurrentValue);
        }
        $this->partnercontact->EditValue = $this->partnercontact->CurrentValue;
        $this->partnercontact->PlaceHolder = RemoveHtml($this->partnercontact->caption());

        // productversion
        $this->productversion->EditAttrs["class"] = "form-control";
        $this->productversion->EditCustomAttributes = "";
        if (!$this->productversion->Raw) {
            $this->productversion->CurrentValue = HtmlDecode($this->productversion->CurrentValue);
        }
        $this->productversion->EditValue = $this->productversion->CurrentValue;
        $this->productversion->PlaceHolder = RemoveHtml($this->productversion->caption());

        // product
        $this->product->EditAttrs["class"] = "form-control";
        $this->product->EditCustomAttributes = "";
        if (!$this->product->Raw) {
            $this->product->CurrentValue = HtmlDecode($this->product->CurrentValue);
        }
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
        if (!$this->fundingsituation->Raw) {
            $this->fundingsituation->CurrentValue = HtmlDecode($this->fundingsituation->CurrentValue);
        }
        $this->fundingsituation->EditValue = $this->fundingsituation->CurrentValue;
        $this->fundingsituation->PlaceHolder = RemoveHtml($this->fundingsituation->caption());

        // purpose
        $this->purpose->EditAttrs["class"] = "form-control";
        $this->purpose->EditCustomAttributes = "";
        if (!$this->purpose->Raw) {
            $this->purpose->CurrentValue = HtmlDecode($this->purpose->CurrentValue);
        }
        $this->purpose->EditValue = $this->purpose->CurrentValue;
        $this->purpose->PlaceHolder = RemoveHtml($this->purpose->caption());

        // evaluationstatus
        $this->evaluationstatus->EditAttrs["class"] = "form-control";
        $this->evaluationstatus->EditCustomAttributes = "";
        if (!$this->evaluationstatus->Raw) {
            $this->evaluationstatus->CurrentValue = HtmlDecode($this->evaluationstatus->CurrentValue);
        }
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
        if (!$this->revenuetype->Raw) {
            $this->revenuetype->CurrentValue = HtmlDecode($this->revenuetype->CurrentValue);
        }
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
        if (!$this->secondaryemail->Raw) {
            $this->secondaryemail->CurrentValue = HtmlDecode($this->secondaryemail->CurrentValue);
        }
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
        if (!$this->vat_id->Raw) {
            $this->vat_id->CurrentValue = HtmlDecode($this->vat_id->CurrentValue);
        }
        $this->vat_id->EditValue = $this->vat_id->CurrentValue;
        $this->vat_id->PlaceHolder = RemoveHtml($this->vat_id->caption());

        // registration_number_1
        $this->registration_number_1->EditAttrs["class"] = "form-control";
        $this->registration_number_1->EditCustomAttributes = "";
        if (!$this->registration_number_1->Raw) {
            $this->registration_number_1->CurrentValue = HtmlDecode($this->registration_number_1->CurrentValue);
        }
        $this->registration_number_1->EditValue = $this->registration_number_1->CurrentValue;
        $this->registration_number_1->PlaceHolder = RemoveHtml($this->registration_number_1->caption());

        // registration_number_2
        $this->registration_number_2->EditAttrs["class"] = "form-control";
        $this->registration_number_2->EditCustomAttributes = "";
        if (!$this->registration_number_2->Raw) {
            $this->registration_number_2->CurrentValue = HtmlDecode($this->registration_number_2->CurrentValue);
        }
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
        if (!$this->subindustry->Raw) {
            $this->subindustry->CurrentValue = HtmlDecode($this->subindustry->CurrentValue);
        }
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
        if (!$this->leads_relation->Raw) {
            $this->leads_relation->CurrentValue = HtmlDecode($this->leads_relation->CurrentValue);
        }
        $this->leads_relation->EditValue = $this->leads_relation->CurrentValue;
        $this->leads_relation->PlaceHolder = RemoveHtml($this->leads_relation->caption());

        // legal_form
        $this->legal_form->EditAttrs["class"] = "form-control";
        $this->legal_form->EditCustomAttributes = "";
        if (!$this->legal_form->Raw) {
            $this->legal_form->CurrentValue = HtmlDecode($this->legal_form->CurrentValue);
        }
        $this->legal_form->EditValue = $this->legal_form->CurrentValue;
        $this->legal_form->PlaceHolder = RemoveHtml($this->legal_form->caption());

        // sum_time
        $this->sum_time->EditAttrs["class"] = "form-control";
        $this->sum_time->EditCustomAttributes = "";
        $this->sum_time->EditValue = $this->sum_time->CurrentValue;
        $this->sum_time->PlaceHolder = RemoveHtml($this->sum_time->caption());
        if (strval($this->sum_time->EditValue) != "" && is_numeric($this->sum_time->EditValue)) {
            $this->sum_time->EditValue = FormatNumber($this->sum_time->EditValue, -2, -2, -2, -2);
        }

        // active
        $this->active->EditAttrs["class"] = "form-control";
        $this->active->EditCustomAttributes = "";
        $this->active->EditValue = $this->active->CurrentValue;
        $this->active->PlaceHolder = RemoveHtml($this->active->caption());

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
