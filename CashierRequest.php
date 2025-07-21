<?php

namespace App\Controllers;

use App\Models\CashierModel;
use App\Models\ReportTypeModel;
use App\Models\ReportRequestModel;
use CodeIgniter\Controller;

class CashierRequest extends BaseController
{
    protected CashierModel $cashierModel;
    protected ReportTypeModel $reportTypeModel;
    protected ReportRequestModel $reportRequestModel;

    public function __construct()
    {
        $this->cashierModel = new CashierModel();
        $this->reportTypeModel = new ReportTypeModel();
        $this->reportRequestModel = new ReportRequestModel();
    }

    public function index()
    {
        $cashiers = $this->cashierModel
            ->where('status', 'approved')
            ->where('role', 'cashier')
            ->findAll();

        $reportTypes = $this->reportTypeModel->findAll();

        $data = [
            'page_title' => 'Cashier Account Requests',
            'breadcrumbs' => [
                ['text' => 'Admin Dashboard', 'link' => base_url('admin/dashboard'), 'icon' => 'flaticon-home'],
                ['text' => 'Reports', 'link' => '#'],
                ['text' => 'Cashier Account Requests', 'link' => base_url('admin/request'), 'active' => true],
            ],
            'cashiers' => $cashiers,
            'reportTypes' => $reportTypes,
        ];

        return view('admin/request_report', $data);
    }

    public function submitReportRequest()
    {
        $request = $this->request;

        $rules = [
            'cashier_id' => [
                'rules' => 'required|numeric|is_not_unique[users.id]',
                'errors' => [
                    'required' => 'Please select a cashier.',
                    'numeric' => 'Invalid cashier selection.',
                    'is_not_unique' => 'Selected cashier does not exist.',
                ],
            ],
            'report_type' => [ // This is the 'type_name' from the form
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please select a report type.',
                ],
            ],
            'date_range' => 'permit_empty|string',
            'notes' => 'permit_empty|string|max_length[500]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $cashierId = $request->getPost('cashier_id');
        $reportTypeName = $request->getPost('report_type'); // Get the name from the form
        $dateRange = $request->getPost('date_range');
        $notes = $request->getPost('notes');

        // --- IMPORTANT: Fetch report_type_id based on reportTypeName ---
        $reportType = $this->reportTypeModel->where('type_name', $reportTypeName)->first();
        if (!$reportType) {
            // Handle case where report type name is not found (should be prevented by good validation)
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid report type selected.');
        }
        $reportTypeId = $reportType->id; // Get the ID

        $parsedDateStart = null;
        $parsedDateEnd = null;

        if (!empty($dateRange)) {
            $dateRange = trim($dateRange);

            if (strpos($dateRange, 'to') !== false) {
                list($start, $end) = array_map('trim', explode('to', $dateRange));
                $parsedDateStart = date('Y-m-d', strtotime($start));
                $parsedDateEnd = date('Y-m-d', strtotime($end));
            } elseif (strtolower($dateRange) === 'today') {
                $parsedDateStart = date('Y-m-d');
                $parsedDateEnd = date('Y-m-d');
            } elseif (strtolower($dateRange) === 'yesterday') {
                $parsedDateStart = date('Y-m-d', strtotime('-1 day'));
                $parsedDateEnd = date('Y-m-d', strtotime('-1 day'));
            } else {
                $parsedDate = strtotime($dateRange);
                if ($parsedDate !== false) {
                    $parsedDateStart = date('Y-m-d', $parsedDate);
                    $parsedDateEnd = date('Y-m-d', $parsedDate);
                }
            }
        }

        $dataToSave = [
            'cashier_id' => $cashierId,
            'report_type_id' => $reportTypeId, // Changed to report_type_id
            'date_range_start' => $parsedDateStart,
            'date_range_end' => $parsedDateEnd,
            'additional_notes' => $notes,
            'status' => 'pending',
            'requested_by_admin_id' => session()->get('id'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($this->reportRequestModel->insert($dataToSave)) {
            return redirect()->to(base_url('admin/report-requests-list'))
                ->with('success', 'Report request submitted successfully!');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to submit report request. Please try again.');
        }
    }
}