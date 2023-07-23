@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="mt-8 flex justify-content-between gap-4">
            <div class="col-12 col-lg-4">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Добавить новый способ пополнение</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="category_name">Название</label>
                                        <input type="text" class="form-control" id="category_name"
                                               placeholder="Введите название" name="req_name">
                                    </div>
                                    <div class="mt-4">
                                        <label for="req_status">Ссылка?</label>
                                        <div class="form-check form-switch mt-2">
                                            <input class="form-check-input" type="checkbox" id="req_link"
                                                   name="req_link">

                                        </div>
                                    </div>


                                    <div class="mt-4">
                                        <label for="req_status">Cтатус</label>
                                        <div class="form-check form-switch mt-2">
                                            <input class="form-check-input" type="checkbox" id="req_status" checked=""
                                                   name="req_status">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex-grow-1">
                <p>Текущие реквезиты</p>
                <table class="table table-bordered" id="table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Название</th>
                        <th>Имя Фамилия</th>
                        <th>Реквезиты</th>
                        <th>Курс</th>
                        <th>Статус</th>
                        <th>Банк</th>
                        <th>Действия</th>

                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>


    <div class="modal " style="background: #00000066;"
         id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="max-width: 700px; width: 100%;">
                <div class="modal-header">
                    <h4 class="modal-title" id="edit_modal_title">Редактирование</h4>
                    <span id="login_title" style="font-weight: bold"></span>
                </div>
                <form method="post" action="">
                    <div class="d-flex justify-content-between m-4 flex-column gap-2">

                        <style>
                            .form-group {
                                padding-bottom: 10px;
                            }
                        </style>

                        <div class="d-flex flex-row gap-2">
                            <div class="form-group d-flex flex-column">
                                <label for="">Название</label>
                                <input class="title py-2 pl-1 rounded" type="text" placeholder="Название">
                            </div>
                            <div class="form-group d-flex flex-column w-100">
                                <label for="status">Статус</label>
                                <select name="status" class="status pl-1 rounded py-2 w-100" id="status">
                                    <option name="status" value="1">Включен</option>
                                    <option name="status" value="0">Выключен</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="form-group d-flex flex-column w-100">
                                <label for="">Банк</label>
                                <input class="bank py-2 pl-1 rounded" type="text" placeholder="Банк">
                            </div>

                        </div>

                        <div class="d-flex">
                            <div class="form-group d-flex flex-column w-100">
                                <label for="">Имя Фамилия</label>
                                <input class="owner py-2 pl-1 rounded" type="text" placeholder="Иванов Иван">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="">Курс</label>
                            <input class="rate py-2 pl-1 rounded w-100" type="text" placeholder="Курс">
                        </div>

                        <div class="form-group">
                            <label for="">Реквезиты</label>
                            <input class="requisites py-2 pl-1 rounded w-100" type="text" placeholder="Реквезиты">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="edit-close" class="btn btn-default" data-dismiss="modal">Закрыть
                        </button>
                        <button type="button" id="edit-save" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>

        $(function () {

            table = $('#table').DataTable({
                "rowId": "id",
                processing: true,
                serverSide: true,
                ajax: '/admin/requisites/list',
                columns: [

                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'owner', name: 'owner'},
                    {data: 'requisites', name: 'requisites'},
                    {data: 'rate', name: 'rate'},
                    {data: 'status', name: 'status'},
                    {data: 'bank', name: 'bank'},
                    {data: 'action', name: 'action'},

                ]
            });
        });

    </script>

@endsection
