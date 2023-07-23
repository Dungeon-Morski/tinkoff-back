<?php

namespace App\Http\Controllers\Admin;


use App\Actions\UpdateUserAction;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{

    public function index(UsersDataTable $dataTable)
    {

        return view('admin.users');

    }

    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $data = User::all();
            return Datatables::of($data)
                ->setTotalRecords($data->count())
                ->addIndexColumn()
                ->addColumn('action', function ($row) use (&$index) {
                    $actionBtn = '<a class="d-flex mx-auto justify-content-center w-50 edit btn btn-sm edit-btn user-edit-btn" href="javascript:void(0)" data-id=' . $row->id . '>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="blue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function updateUser(Request $request, UpdateUserAction $action, User $user)
    {
        $data = $request->validate([
            "name" => "string|required",
            "surname" => "string|required",
            "password" => "string|required",
            "balance" => "integer|required",
        ]);

        return $action($user, $data);

    }
}
