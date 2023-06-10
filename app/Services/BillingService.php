<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Billing;


class BillingService
{
    public function createBilling($request)
    {
        Billing::create([
            "client_id" => $request->client_id,
            "amount" => $request->amount,
            "due_date" =>  Carbon::parse($request->due_date)->format('Y-m-d'),
            "description" => $request->description,
        ]);

        return redirect()->route('billing.index')->with('create', 'Successfully Created');
    }

    public function updateBilling($request, $billing)
    {
        $billing->update([
            'amount' => $request->amount,
            'due_date' => Carbon::parse($request->due_date)->format('Y-m-d'),
            'client_id' => $request->client_id,
            'description' => $request->description
        ]);

        return redirect()->route('billing.index')->with('updated', 'Successfully Updated');
    }
}
