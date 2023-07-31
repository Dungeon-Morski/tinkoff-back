<?php

namespace App\Http\Controllers\Admin;

use App\Actions\CreateRequisiteAction;
use App\Actions\DeleteRequisiteAction;
use App\Actions\UpdateRequisiteAction;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Requisite;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\Exceptions\Exception;

class RequisiteController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {

        return view('admin.requisites');

    }

    /**
     * @throws Exception
     */
    public function getRequisites(Request $request)
    {
        if ($request->ajax()) {
            $data = Requisite::all();
            return datatables()->collection($data)
                ->setTotalRecords($data->count())
                ->addIndexColumn()
                ->addColumn('action', function ($row) use (&$index) {
                    $actionBtn = '<div class="d-flex align-items-center">
<a class="d-flex  justify-content-center  edit btn
                    btn-sm edit-btn requisite-edit-btn" href="javascript:void(0)" data-id=' . $row->id . '>

<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="blue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle">
<path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
</path></svg></a>
<a href="javascript:void(0)" class="requisite-delete-btn" data-id=' . $row->id . '><svg style="color: red" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h4a1 1 0 1 1 0 2h-1.069l-.867 12.142A2 2 0 0 1 17.069 22H6.93a2 2 0 0 1-1.995-1.858L4.07 8H3a1 1 0 0 1 0-2h4V4zm2 2h6V4H9v2zM6.074 8l.857 12H17.07l.857-12H6.074z" fill="red"></path></svg></a>
</div>
';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function updateRequisite(Request $request, UpdateRequisiteAction $action, Requisite $requisite)
    {

        $data = $request->validate([
            "title" => "string|required",
            "owner" => "string|required",
            "requisites" => "string|required",
            "rate" => "string|required",
            "rating" => "integer|required",
            "min_deposit" => "integer|required",
            "bank" => "string|required",
        ]);
        if ($request->status === "1") {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }

        if ($request->islink === "true") {
            $data['islink'] = 1;
        } else {
            $data['islink'] = 0;
        }

        return $action($requisite, $data);

    }

    public function createRequisite(Request $request, CreateRequisiteAction $action)
    {


        $data = $request->validate([
            "title" => "string|required",
            "owner" => "string|required",
            "requisites" => "string|required",
            "rate" => "string|required",
            "rating" => "integer|required",
            "min_deposit" => "integer|required",
            "bank" => "string|required",
        ]);

        if ($request->islink === "on") {
            $data['islink'] = 1;
        }
        if ($request->status === "on") {
            $data['status'] = 1;
        }


        return $action($data);
    }

    public function deleteRequisite(Request $request, DeleteRequisiteAction $action, Requisite $id)
    {
        return $action($id);
    }
}
