<?php

namespace Modules\Admin\Http\Controllers;

use App\Beneficiary;
use App\Building;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class OrchestraController extends Controller
{
    public function control(Request $request)
    {
        $id = $request->post('id');
        $request->post('model')::findOrFail($id)->update([
            'is_active' => $request->has('is_active'),
            'status' => $request->has('is_active') == 1 ? "confirmed" : "pending",
        ]);
        return back();
    }
}
