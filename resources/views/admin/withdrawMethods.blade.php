@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="mt-8 flex justify-content-between gap-4">
            <div class="col-12 col-lg-4">
                <form class="createWithdrawMethodForm" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Добавить новый способ вывода</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <label class="form-label" for="category_name">Название</label>
                                        <input type="text" class="form-control" id="category_name"
                                               placeholder="Введите название" name="title">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="submit" class="btn btn-primary">Добавить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex-grow-1">
                <p>Способы вывода</p>
                <table class="table withdrawMethodsTable table-bordered" id="table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Название</th>
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

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="edit-close" class="btn btn-default" data-dismiss="modal">Закрыть
                        </button>
                        <button type="button" id="edit-save" class="btn btn-primary save-withdraw-method">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection

