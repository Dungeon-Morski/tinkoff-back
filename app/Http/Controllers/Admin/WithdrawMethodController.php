<?php

namespace App\Http\Controllers\Admin;

use App\Actions\CreateWithdrawMethodAction;
use App\Actions\DeleteWithdrawMethodAction;
use App\Actions\UpdateWithdrawMethodAction;
use App\Http\Controllers\Controller;
use App\Models\WithdrawMethod;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WithdrawMethodController extends Controller
{
    public function index()
    {
        return view('admin.withdrawMethods');
    }

    public function getWithdrawMethods(Request $request)
    {
        if ($request->ajax()) {
            $data = WithdrawMethod::all();
            return datatables()->collection($data)
                ->setTotalRecords($data->count())
                ->addIndexColumn()
                ->addColumn('action', function ($row) use (&$index) {
                    $actionBtn = '<div class="d-flex align-items-center gap-2 justify-content-center">
<a class="d-flex  justify-content-center  edit btn btn-sm edit-btn withdraw-method-edit-btn" href="javascript:void(0)" data-id=' . $row->id . '>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="blue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
<a href="javascript:void(0)" class="withdraw-method-delete-btn" data-id=' . $row->id . '><svg style="color: red" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h4a1 1 0 1 1 0 2h-1.069l-.867 12.142A2 2 0 0 1 17.069 22H6.93a2 2 0 0 1-1.995-1.858L4.07 8H3a1 1 0 0 1 0-2h4V4zm2 2h6V4H9v2zM6.074 8l.857 12H17.07l.857-12H6.074z" fill="red"></path></svg></a>
</div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function updateMethod(Request $request, UpdateWithdrawMethodAction $action, WithdrawMethod $method)
    {
        $data = $request->validate([
            "title" => "string|required",
        ]);

        return $action($method, $data);
    }

    public function createMethod(Request $request, CreateWithdrawMethodAction $action)
    {

        $data = $request->validate([
            "title" => "string|required",

        ]);


        return $action($data);
    }

    public function deleteMethod(Request $request, DeleteWithdrawMethodAction $action, WithdrawMethod $method_id)
    {
        return $action($method_id);
    }
}
