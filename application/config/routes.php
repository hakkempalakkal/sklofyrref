<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/




$route['default_controller'] = 'Login_Control';
$route['Home'] = 'Login_Control/login';
$route['user-home'] = 'Login_Control/userhome';
$route['login'] = 'Login_Control/logout';
$route['forgot-password-page'] = 'Login_Control/viewforgotpassword';
$route['forgot-password'] = 'Login_Control/forgot_password';
$route['new-password'] = 'Login_Control/newpassword';
//$route['default_controller'] = 'usermanagement/Login/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// permission
$route['permission'] = 'usermanagement/permission/index';

$route['permission-create'] = 'usermanagement/permission/create';
$route['permission-edit'] = 'usermanagement/permission/edit';
//js permission
$route['permission-store'] = 'usermanagement/permission/store';
$route['permission-update'] = 'usermanagement/permission/update';
//roles
$route['roles'] = 'usermanagement/roles/index';
$route['roles-create'] = 'usermanagement/roles/create';
$route['roles-edit'] = 'usermanagement/roles/edit';

// js roles
$route['roles-store'] = 'usermanagement/roles/store';
$route['roles-update'] = 'usermanagement/roles/update';
 
//users
$route['users'] = 'usermanagement/users/index';
$route['users-create'] = 'usermanagement/users/add';
$route['users-store'] = 'usermanagement/users/store';

$route['users-edit'] = 'usermanagement/users/edit';
$route['users-enable-status/(:any)'] = 'usermanagement/users/enable_status/$1';
$route['users-disable-status/(:any)'] = 'usermanagement/users/disable_status/$1';
$route['checkMail'] = 'usermanagement/users/checkMail';



$route['users-update'] = 'usermanagement/users/update';

//login
$route['user-login']='usermanagement/Login/index';
$route['user-logout']='usermanagement/Login/logout';

//Master-Bank 
$route['bank']='masters/Bank_controller/index';
$route['create_bank']='masters/Bank_controller/add';
$route['bank-edit'] = 'masters/Bank_controller/edit';
$route['bank-enable-status/(:any)'] = 'masters/Bank_controller/enable_status/$1';
$route['bank-disable-status/(:any)'] = 'masters/Bank_controller/disable_status/$1';
$route['check-account'] = 'masters/Bank_controller/checkaccount';

// js carrier
$route['bank-store'] = 'masters/Bank_controller/store';
$route['bank-update'] = 'masters/Bank_controller/update';

//Master-carrier
$route['carrier']='masters/carrier_controller/index';
$route['create_carrier']='masters/carrier_controller/add';
$route['carrier-edit'] = 'masters/carrier_controller/edit';
$route['carrier-enable-status/(:any)'] ='masters/carrier_controller/enable_status/$1';
$route['carrier-disable-status/(:any)'] = 'masters/carrier_controller/disable_status/$1';
// js carrier
$route['carrier-store'] = 'masters/carrier_controller/store';
$route['carrier-update'] = 'masters/carrier_controller/update';

//master description
$route['description'] = 'masters/Description/index';
$route['description-create'] = 'masters/Description/create';
$route['description-edit'] = 'masters/Description/edit';
$route['description-enable-status/(:any)'] ='masters/Description/enable_status/$1';
$route['description-disable-status/(:any)'] = 'masters/Description/disable_status/$1';
//js description
$route['description-store'] = 'masters/Description/store';
$route['description-update'] = 'masters/Description/update';
//master supplier

$route['supplier'] = 'masters/Supplier/index';
$route['supplier-create'] = 'masters/Supplier/create';
$route['supplier-edit'] = 'masters/Supplier/edit';
$route['supplier-enable-status/(:any)'] ='masters/Supplier/enable_status/$1';
$route['supplier-disable-status/(:any)'] = 'masters/Supplier/disable_status/$1';
//js supplier
$route['supplier-store'] = 'masters/Supplier/store';
$route['supplier-update'] = 'masters/Supplier/update';
//master client

$route['client'] = 'masters/Client/index';
$route['clientpaymentlist'] = 'masters/Client/indexpayment';

$route['client-create'] = 'masters/Client/create';
$route['client-edit'] = 'masters/Client/edit';
$route['client-enable-status/(:any)'] ='masters/Client/enable_status/$1';
$route['client-disable-status/(:any)'] = 'masters/Client/disable_status/$1';
$route['check-client'] = 'masters/Client/checkclient';

//js supplier
$route['client-store'] = 'masters/Client/store';
$route['client-update'] = 'masters/Client/update';


//master shipper

$route['shipper'] = 'masters/Shipper/index';
$route['shipper-create'] = 'masters/Shipper/create';
$route['shipper-edit'] = 'masters/Shipper/edit';
$route['shipper-enable-status/(:any)'] ='masters/Shipper/enable_status/$1';
$route['shipper-disable-status/(:any)'] = 'masters/Shipper/disable_status/$1';
//js supplier
$route['shipper-store'] = 'masters/Shipper/store';
$route['shipper-update'] = 'masters/Shipper/update';

//master currency

$route['currency'] = 'masters/Currency/index';
$route['currency-create'] = 'masters/Currency/create';
$route['currency-edit'] = 'masters/Currency/edit';
$route['currency-enable-status/(:any)'] ='masters/Currency/enable_status/$1';
$route['currency-disable-status/(:any)'] ='masters/Currency/disable_status/$1';
//js supplier
$route['currency-store'] = 'masters/Currency/store';
$route['currency-update'] = 'masters/Currency/update';

//Accounts

//create ledger
$route['create-ledger-group'] = 'accounts/Ledger_group/create_ledger_group';
$route['create-ledger'] = 'accounts/Ledger/create_ledger';
$route['accounts-entry'] = 'accounts/Accounts_entry/accounts_entry';
$route['day-book'] = 'accounts/Day_book/index';
$route['trial-balance'] = 'accounts/Trial_balance/index';
$route['balance-sheet'] = 'accounts/Balance_sheet/index';
$route['ledger-view'] = 'accounts/Ledger_view/index';

$route['trial-balanceview'] = 'accounts/Trial_balance/gettrialbalance';

$route['find-ledger-view'] = 'accounts/Ledger_view/getledgerviewdata';


//js ledger group
$route['ledger-group'] = 'accounts/Ledger_group/store';
$route['list-ledger-group/(:any)'] = 'accounts/Ledger_group/getdata/$1';
//$route['list-group'] = 'accounts/ledger_group/list';

//js ledger 
$route['ledger'] = 'accounts/Ledger/store';
$route['ledger-edit'] = 'accounts/Ledger/editdata';
$route['list-ledger/(:any)'] = 'accounts/Ledger/getdata/$1';
//accounts entry 
$route['accounts-entry'] = 'accounts/Accounts_entry/accounts_entry';
$route['list-dropdown/(:any)'] = 'accounts/Accounts_entry/hidediv/$1';
//js accounts entry

$route['add-accounts-entry'] = 'accounts/Accounts_entry/store';
//js day book
$route['find-day-book'] = 'accounts/Day_book/finddata';


//transaction
//add job
$route['job'] = 'transaction/Transaction/index';
$route['transportation-store'] = 'transaction/Transaction/store';
$route['transportation-update'] = 'transaction/Transaction/update';
$route['transportation-description/(:any)'] = 'transaction/Transaction/getdescription/$1';
$route['transportation-jobdetails/(:any)'] = 'transaction/Transaction/jobdetails/$1';
$route['transportation-estimate'] = 'transaction/Transaction/store_estimate';
//invoice
//job-invoice
$route['job-invoice/(:any)'] = 'transaction/Job_invoice_controller/job_invoice/$1';
$route['job-invoice/job-invoice-description/(:any)'] = 'transaction/Job_invoice_controller/getdata/$1';
$route['insert-job-details'] = 'transaction/Job_invoice_controller/insert_job_details';
//print invoice
$route['invoice-print/(:any)'] = 'transaction/Job_invoice_controller/invoice_print/$1';
// change-invoice-status
$route['change-invoice-status/(:any)'] = 'transaction/Job_invoice_controller/change_invoice_status/$1';

//edit job invoice
$route['edit-job-invoice/(:any)'] = 'transaction/Job_invoice_controller/edit_job_invoice/$1';
$route['update-job-details'] = 'transaction/Job_invoice_controller/update_jobInvoice_details';
//Job Supplier Payment
$route['job-supplier-payment/(:any)'] = 'transaction/Job_supplier_payment_controller/index/$1';
$route['job-supplier-payment-get-client-details/(:any)'] = 'transaction/Job_supplier_payment_controller/select_client_details/$1';
$route['insert-job-supplier-payment-details'] = 'transaction/Job_supplier_payment_controller/insert_supplier_payment';
$route['edit-job-supplier-payment/(:any)'] = 'transaction/Job_supplier_payment_controller/edit_job_supplier_payment/$1';
$route['update-supplier-payment'] = 'transaction/Job_supplier_payment_controller/update_supplier_payment';
$route['print-supplier-payment/(:any)'] = 'transaction/Job_supplier_payment_controller/print_supplier_payment/$1';
$route['list-supplier'] = 'transaction/Job_supplier_payment_controller/list_supplier';

//edit_job_supplier_payment_receipt
$route['payment-receipt/(:any)'] = 'transaction/Payment_receipt_controller/receipt/$1';
$route['payment-receipt-get-client-details/(:any)'] = 'transaction/Payment_receipt_controller/payment_receipt_select_client_details/$1';
$route['insert-payment-receipt-details'] = 'transaction/Payment_receipt_controller/insert_payment_receipt';
$route['edit-payment-receipt-details/(:any)'] = 'transaction/Payment_receipt_controller/edit_job_payment_receipt/$1';
$route['update-payment-receipt-details'] = 'transaction/Payment_receipt_controller/update_payment_receipt_details';
$route['payment-receipt-print/(:any)'] = 'transaction/Payment_receipt_controller/payment_receipt_print/$1';
//supplier expense


$route['supplier-expense/(:any)'] = 'transaction/Supplierexpense_Controller/supplier_expense/$1';
$route['supplier-expense/supplier-expense-description/(:any)'] = 'transaction/Supplierexpense_Controller/getdata/$1';
$route['insert-expense-details'] = 'transaction/Supplierexpense_Controller/supplier_expense_details';
$route['supplier-expense-print/(:any)'] = 'transaction/Supplierexpense_Controller/supplier_expense_print/$1';
$route['edit-supplier-expense/(:any)'] = 'transaction/Supplierexpense_Controller/edit_supplier_expense/$1';
$route['update-supplier-expense'] = 'transaction/Supplierexpense_Controller/update_supplier_expense';
$route['view-supplierexpense'] = 'transaction/Supplierexpense_Controller/index';

//debit note

$route['debit-note/(:any)'] = 'transaction/Debitnote_Controller/debit_note/$1';
$route['debit-note/debitnote-description/(:any)'] = 'transaction/Debitnote_Controller/getdata/$1';
$route['insert-debit-note'] = 'transaction/Debitnote_Controller/debit_note_details';
$route['debit-note-print/(:any)'] = 'transaction/Debitnote_Controller/debit_note_print/$1';
$route['edit-debitnote/(:any)'] = 'transaction/Debitnote_Controller/edit_debitnote/$1';
$route['update-debitnote'] = 'transaction/Debitnote_Controller/update_debitnote';

//credit note
$route['credit-note/(:any)'] = 'transaction/Creditnote_Controller/credit_note/$1';
$route['credit-note/creditnote-description/(:any)'] = 'transaction/Creditnote_Controller/getdata/$1';
$route['insert-credit-note'] = 'transaction/Creditnote_Controller/credit_note_details';
$route['credit-note-print/(:any)'] = 'transaction/Creditnote_Controller/credit_note_print/$1';
$route['edit-creditnote/(:any)'] = 'transaction/Creditnote_Controller/edit_creditnote/$1';
$route['update-creditnote'] = 'transaction/Creditnote_Controller/update_creditnote';
//reports
$route['job-reports'] = 'reports/Reports/job_reports';
$route['non-billed-jobs'] = 'reports/Reports/non_billed_jobs';
$route['invoice-reports'] = 'reports/Reports/invoice_reports';
$route['pending-invoice'] = 'reports/Reports/pending_invoice';
$route['bill-report'] = 'reports/Reports/bill_reports';
$route['pending-bills'] = 'reports/Reports/pending_bills';
//job search
$route['job-search'] = 'jobsearch/Job_Search/job_search';

$route['job-description/(:any)'] = 'jobsearch/job_Search/job_description/$1';
//supplier search
$route['supplier-search'] = 'suppliersearch/Supplier_Search/supplier_search';
$route['supplier-data/(:any)'] = 'suppliersearch/Supplier_Search/get_supplierdetails/$1';

//client search
$route['client-search'] = 'clientsearch/Client_Search/client_search';
$route['client-data'] = 'clientsearch/Client_Search/get_clientsearchdetails';
