@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="mt-8">
            <p>Пользователи</p>
            <table class="table table-bordered usersTable" id="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>surname</th>
                    <th>phone</th>
                    <th>login</th>
                    <th>password</th>
                    <th>balance</th>
                    <th>action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>


    <div class="modal " style="background: #00000066;"
         id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 100%">
                <div class="modal-header">
                    <h4 class="modal-title" id="edit_modal_title">Редактирование</h4>
                    <span id="login_title" style="font-weight: bold"></span>
                </div>
                <form method="post" action="">
                    <div class="d-flex justify-content-between m-5 flex-row">

                        <style>
                            .form-group {
                                padding-bottom: 20px;
                            }
                        </style>
                        <div style="width: 45%">
                            <div class="form-group">
                                <label for="">Имя</label>
                                <input class="name py-2 pl-1 rounded" type="text" placeholder="Иван">
                            </div>
                            <div class="form-group">
                                <label for="">Фамилия</label>
                                <input class="surname py-2 pl-1 rounded" type="text" placeholder="Иван">
                            </div>


                        </div>
                        <div style="width: 45%">

                            <div class="form-group">
                                <label for="">Пароль</label>
                                <input class="password py-2 pl-1 rounded" type="text" placeholder="Иван">
                            </div>
                            <div class="form-group">
                                <label for="">Баланс</label>
                                <input class="balance py-2 pl-1 rounded" type="number" placeholder="Баланс">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="edit-close" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        <button type="button" id="edit-save" class="btn btn-primary user-save">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

