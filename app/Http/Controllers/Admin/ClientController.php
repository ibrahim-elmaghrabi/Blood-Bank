<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientController extends Controller
{
    public function __construct()
    {
         $this->middleware('permission:client-list', ['only' => ['index']]);
         $this->middleware('permission:client-delete', ['only' => ['destroy']]);
         $this->middleware('permission:client-updateStatus', ['only' => ['updateStatus']]);
    }

    public function index()
    {
        $clients = Client::paginate(20);
        return view('admin.clients.index', compact('clients'));
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return back()->with('status', 'client Deleted Successfully');
    }

    public function updateStatus(Client $client, $status)
    {
        $updated = $client->update([
            'active' => $status
        ]);
        if ($updated) {
            return back()->with('status', 'Status Updated Successfully');
        }
    }
}
