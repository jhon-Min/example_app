<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Billing;
use Illuminate\Support\Str;
use App\Services\BillingService;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreBillingRequest;
use App\Http\Requests\UpdateBillingRequest;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('billing.index');
    }

    public function ssd()
    {
        $billing = Billing::with('clientName')->latest();
        return DataTables::of($billing)
            ->addColumn('action', function ($each) {
                $edit = '<a href="' . route('billing.edit', $each->id) . '" class="btn mr-1 btn-success btn-sm">Edit</a>';

                $del = '<a href="#" class="btn btn-danger btn-sm del-btn" data-id="' . $each->id . '"><i class="fa-solid fa-trash-alt fw-light"></i></a>';

                return '<div class="action-icon">' . $edit  . $del . '</div>';
            })
            ->addColumn('name', fn ($each) => $each->clientName->name)
            ->editColumn('desc', fn ($each) => Str::limit($each->description, 20))
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('billing.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBillingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBillingRequest $request, BillingService $billingService)
    {
        $response = $billingService->createBilling($request);
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function edit(Billing $billing)
    {
        $clients = Client::all();
        return view('billing.edit', compact('billing', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBillingRequest  $request
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillingRequest $request, Billing $billing, BillingService $billingService)
    {
        $response = $billingService->updateBilling($request, $billing);
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Billing $billing)
    {
        return $billing->delete();
    }
}
