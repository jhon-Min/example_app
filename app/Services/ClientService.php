<?php

namespace App\Services;

use App\Models\Client;

class ClientService
{
    public function createClient($request)
    {
        Client::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return redirect()->route('clients.index')->with('created', 'Successfully Created');
    }

    public function updateClient($request, $client)
    {
        $client->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->adress,
        ]);

        return redirect()->route('clients.index')->with('updated', 'Successfully Updated');
    }
}
