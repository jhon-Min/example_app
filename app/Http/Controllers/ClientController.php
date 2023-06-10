<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Services\ClientService;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{

    protected $clientService;
    protected $updateService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
        $this->updateService = $clientService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index');
    }

    public function ssd()
    {
        $clients = Client::orderBy('id', 'desc')->get();
        return DataTables::of($clients)
            ->addColumn('action', function ($each) {
                $edit = '<a href="' . route('clients.edit', $each->id) . '" class="btn mr-1 btn-success btn-sm">Edit</a>';

                $del = '<a href="#" class="btn btn-danger btn-sm del-btn" data-id="' . $each->id . '"><i class="fa-solid fa-trash-alt fw-light"></i></a>';

                return '<div class="action-icon">' . $edit  . $del . '</div>';
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $response = $this->clientService->createClient($request);
        return $response;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $response = $this->clientService->updateClient($request, $client);
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        return $client->delete();
    }
}
