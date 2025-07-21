<?php

namespace App\Controllers;

use App\Models\ReportRequestModel;
use App\Models\CashierModel; // To get cashier (user) details
use App\Models\ReportTypeModel; // To get report type names
use CodeIgniter\Controller;

class AdminReportController extends BaseController
{
    protected ReportRequestModel $reportRequestModel;
    protected CashierModel $cashierModel; // Declare property
    protected ReportTypeModel $reportTypeModel; // Declare property

    public function __construct()
    {
        $this->reportRequestModel = new ReportRequestModel();
        $this->cashierModel = new CashierModel(); // Initialize model
        $this->reportTypeModel = new ReportTypeModel(); // Initialize model
    }

    public function listRequests()
    {
        // Fetch all report requests
        $reportRequests = $this->reportRequestModel->findAll();

        // Prepare data to include cashier username and report type name
        $processedRequests = [];
        foreach ($reportRequests as $request) {
            $cashier = $this->cashierModel->find($request->cashier_id);
            $reportType = $this->reportTypeModel->find($request->report_type_id);

            $request->cashier_username = $cashier ? $cashier->username : 'Unknown'; // Use username from users table
            $request->report_type_name = $reportType ? $reportType->type_name : 'Unknown';

            $processedRequests[] = $request;
        }

        $data = [
            'page_title' => 'Submitted Report Requests',
            'breadcrumbs' => [
                ['text' => 'Admin Dashboard', 'link' => base_url('admin/dashboard'), 'icon' => 'flaticon-home'],
                ['text' => 'Reports', 'link' => '#'],
                ['text' => 'Report Requests List', 'link' => base_url('admin/report-requests-list'), 'active' => true],
            ],
            'reportRequests' => $processedRequests, // Pass the processed requests to the view
        ];

        return view('admin/report_requests_list', $data);
    }

    public function markAsComplete($id)
    {
        // Get the request by ID
        $reportRequest = $this->reportRequestModel->find($id);

        if (!$reportRequest) {
            return redirect()->back()->with('error', 'Report request not found.');
        }

        // Update the status to 'completed'
        $updateData = [
            'status' => 'completed'
        ];

        if ($this->reportRequestModel->update($id, $updateData)) {
            return redirect()->back()->with('success', 'Report request marked as complete.');
        } else {
            return redirect()->back()->with('error', 'Failed to mark report request as complete.');
        }
    }

    // You might add a method for viewing details later
    // public function viewDetails($id) { ... }
}