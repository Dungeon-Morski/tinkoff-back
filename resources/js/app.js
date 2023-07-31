import './bootstrap';
import $ from 'jquery'
import 'laravel-datatables-vite';
import toastr from 'toastr';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/src/sweetalert2.scss';
import 'selectize';


let row_index;
let modal = $('.modal');
let table_row;
let table;
let bankSelect = $(".bank").selectize();
$(".bankSelect").selectize();

//loader
window.addEventListener('load', function () {

    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-56980351-1', 'auto');
    ga('send', 'pageview');

    $('#loading').fadeOut('slow');

});


//users table
let userTable = $('.usersTable').DataTable({
    "rowId": "id",
    processing: true,
    serverSide: true,
    ajax: '/admin/users/list',
    columns: [

        {data: 'id', name: 'id'},
        {data: 'name', name: 'name'},
        {data: 'surname', name: 'surname'},
        {data: 'phone', name: 'phone'},
        {data: 'login', name: 'login'},
        {data: 'password', name: 'password'},
        {data: 'balance', name: 'balance'},
        {data: 'created_at', name: 'created_at'},
        {data: 'action', name: 'action'},
    ]
});
//update users
$('.usersTable').on('click', '.user-edit-btn', function () {
    let index = $(this).attr('data-id');
    let row_data = userTable.row('#' + index).data();
    table_row = userTable.row('#' + index);
    row_index = index;
    let name = row_data.name;
    let surname = row_data.surname;
    let password = row_data.password;
    let balance = row_data.balance;

    $('.name').val(name)
    $('.surname').val(surname)
    $('.password').val(password)
    $('.balance').val(balance)

    modal.show();

});

$('.user-save').on('click', function () {
    let new_data = {
        name: $('.name').val(),
        surname: $('.surname').val(),
        password: $('.password').val(),
        balance: $('.balance').val(),
    }
    $.ajax({
        url: "/admin/users/" + row_index,
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        data: new_data,
        success: function (response, data, row_data) {
            modal.hide();

            if (response.success) {
                let row = table_row;

                for (let key in new_data) {
                    if (new_data.hasOwnProperty(key)) {
                        row.data()[key] = new_data[key];
                    }
                }
                row.invalidate('data').draw(false);


                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "800",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                Command: toastr["success"](response.message)


            } else {
                toastr.error(response.message);
            }
            $('#edit-save').prop('disabled', false)
        },
        error: function (xhr, status, error) {
            toastr.error('Ошибка соединения с API, попробуйте позже');
            $('#edit-save').prop('disabled', false)
        }
    });
})


//requisites table
let requisiteTable = $('.requisiteTable').DataTable({
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
        {data: 'min_deposit', name: 'min_deposit'},
        {data: 'rating', name: 'rating'},

        {

            data: 'status', render: function (data, type, row) {
                if (data) {
                    return '<div style="position: relative";>' +
                        '<p style="position: absolute; top:50%; transform: translateY(-50%)" class="px-1 bg-success rounded text-white text-center  w-100">Включен</p>' +
                        '</div>'
                } else {
                    return '<div style="position: relative;"><p class="px-' +
                        ' bg-danger rounded text-white text-center" style="position: absolute; top:50%; transform: translateY(-50%)">Выключен</p></div>'
                }

            },

            name: 'status'
        },
        {data: 'bank', name: 'bank'},

        {data: 'action', name: 'action'},

    ]
});

//update requisites
$('.requisiteTable').on('click', '.requisite-edit-btn', function () {
    let index = $(this).attr('data-id');
    let row_data = requisiteTable.row('#' + index).data();

    table_row = requisiteTable.row('#' + index);
    row_index = index;
    let title = row_data.title;
    let min_deposit = row_data.min_deposit;
    let rating = row_data.rating;
    let islink = row_data.islink;
    let owner = row_data.owner;
    let requisites = row_data.requisites;
    let rate = row_data.rate;
    let status = row_data.status;
    let bank = row_data.bank;

    $('.title').val(title)
    $('.min_deposit').val(min_deposit)

    if (islink === 1) {
        $('.link').prop('checked', true);
    } else {
        $('.link').prop('checked', false);
    }

    $('.owner').val(owner)
    $('.requisites').val(requisites)
    $('.rate').val(rate)
    $('.rating').val(rating)
    $('.req_status').val(rate)
    $('.bank').val(bank)

    bankSelect.selectize({
        plugins: ["restore_on_backspace", "remove_button"],
        delimiter: " - ",
        persist: false,
        maxItems: 1,


    });

    bankSelect[0].selectize.setValue(bank);

    if (status === 1) {
        $('.req_status option[value="1"]').prop('selected', true)
    } else if (status === 0) {
        $('.req_status option[value="0"]').prop('selected', true)
    }

    modal.show();

});
$('.save-requisite').on('click', function () {

    let new_data = {
        title: $('.title').val(),
        min_deposit: $('.min_deposit').val(),
        owner: $('.owner').val(),
        requisites: $('.requisites').val(),
        rate: $('.rate').val(),
        rating: $('.rating').val(),
        status: $('.req_status').val(),
        islink: $('.link').is(':checked'),
        bank: $('.bank').val(),

    }
    $.ajax({
        url: "/admin/requisites/" + row_index,
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        data: new_data,
        success: function (response, data, row_data) {
            modal.hide();

            if (response.success) {
                let row = table_row;

                for (let key in new_data) {
                    if (new_data.hasOwnProperty(key)) {
                        row.data()[key] = new_data[key];
                    }
                }
                row.invalidate('data').draw(false);


                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "800",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                Command: toastr["success"](response.message)


            } else {
                toastr.error(response.message);
            }
            $('#edit-save').prop('disabled', false)
        },
        error: function (xhr, status, error) {
            toastr.error('Ошибка соединения с API, попробуйте позже');
            $('#edit-save').prop('disabled', false)
        }
    });
})

//delete requisite
$('.requisiteTable').on('click', '.requisite-delete-btn', function () {
    let index = $(this).attr('data-id');
    let row_data = requisiteTable.row('#' + index).data();
    table_row = requisiteTable.row('#' + index);
    row_index = index;

    Swal.fire({
        title: 'Подтверждаете удаление?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Удалить',
        denyButtonText: `Отмена`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "/admin/requisites/" + row_index,
                type: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",

                success: function (response, data, row_data) {

                    console.log(response)
                    if (response.success) {
                        let row = table_row;

                        row.invalidate('data').draw(false);

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-bottom-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "800",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        Command: toastr["success"](response.message)


                    } else {
                        toastr.error(response.message);
                    }
                    $('#edit-save').prop('disabled', false)
                },
                error: function (xhr, status, error) {
                    toastr.error('Ошибка соединения с API, попробуйте позже');
                    $('#edit-save').prop('disabled', false)
                }
            });

        }
    })

});

//bank-select


//create requisite


$(".createRequisiteForm").submit(function (e) {
    e.preventDefault();

    $.ajax({
        url: '/admin/requisites',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: $(this).serialize(),
        dataType: 'JSON',

        success: function (response, data, row_data) {

            console.log(response)
            console.log(data)
            if (response.success) {
                $(".requisiteTable").DataTable().draw('page');

                $(".createRequisiteForm")[0].reset();

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "800",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                Command: toastr["success"](response.message)


            } else {
                console.log(response)
                console.log(data)
                toastr.error(response.message);
            }
            $('#edit-save').prop('disabled', false)
        },
        error: function (xhr, status, error) {
            toastr.error('Ошибка соединения с API, попробуйте позже');
            $('#edit-save').prop('disabled', false)
        }
    });
})


//withdrawMethods table

let withdrawMethodsTable = $('.withdrawMethodsTable').DataTable({
    "rowId": "id",
    processing: true,
    serverSide: true,
    ajax: '/admin/withdraw-methods/list',
    columns: [

        {data: 'id', name: 'id'},
        {data: 'title', name: 'title'},
        {data: 'action', name: 'action'},

    ]
});

//update withdraw methods
$('.withdrawMethodsTable').on('click', '.withdraw-method-edit-btn', function () {
    let index = $(this).attr('data-id');
    let row_data = withdrawMethodsTable.row('#' + index).data();

    table_row = withdrawMethodsTable.row('#' + index);
    row_index = index;
    let title = row_data.title;

    $('.title').val(title)

    modal.show();

});

$('.save-withdraw-method').on("click", function () {
    let new_data = {
        title: $('.title').val(),

    }
    $.ajax({
        url: "/admin/withdraw-methods/" + row_index,
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        data: new_data,
        success: function (response, data, row_data) {
            modal.hide();

            if (response.success) {
                let row = table_row;

                for (let key in new_data) {
                    if (new_data.hasOwnProperty(key)) {
                        row.data()[key] = new_data[key];
                    }
                }
                row.invalidate('data').draw(false);


                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "800",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                Command: toastr["success"](response.message)


            } else {
                toastr.error(response.message);
            }
            $('#edit-save').prop('disabled', false)
        },
        error: function (xhr, status, error) {
            toastr.error('Ошибка соединения с API, попробуйте позже');
            $('#edit-save').prop('disabled', false)
        }
    });
})

//delete withdraw method
$('.withdrawMethodsTable').on('click', '.withdraw-method-delete-btn', function () {
    let index = $(this).attr('data-id');
    let row_data = withdrawMethodsTable.row('#' + index).data();
    table_row = withdrawMethodsTable.row('#' + index);
    row_index = index;

    Swal.fire({
        title: 'Подтверждаете удаление?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Удалить',
        denyButtonText: `Отмена`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "/admin/withdraw-methods/" + row_index,
                type: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",

                success: function (response, data, row_data) {

                    console.log(response)
                    if (response.success) {
                        let row = table_row;

                        row.invalidate('data').draw(false);

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-bottom-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "800",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        Command: toastr["success"](response.message)


                    } else {
                        toastr.error(response.message);
                    }
                    $('#edit-save').prop('disabled', false)
                },
                error: function (xhr, status, error) {
                    toastr.error('Ошибка соединения с API, попробуйте позже');
                    $('#edit-save').prop('disabled', false)
                }
            });

        }
    })

});


//create withdraw method

$(".createWithdrawMethodForm").submit(function (e) {
    e.preventDefault();
    const token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: '/admin/withdraw-methods',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: $(this).serialize(),
        dataType: 'JSON',

        success: function (response, data, row_data) {

            console.log(response)
            if (response.success) {

                $(".withdrawMethodsTable").DataTable().draw('page');
                $(".createWithdrawMethodForm")[0].reset();

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "800",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                Command: toastr["success"](response.message)


            } else {
                toastr.error(response.message);
            }
            $('#edit-save').prop('disabled', false)
        },
        error: function (xhr, status, error) {
            toastr.error('Ошибка соединения с API, попробуйте позже');
            $('#edit-save').prop('disabled', false)
        }
    });
})

function modalClose() {
    $('#edit-close').on('click', function () {
        modal.hide()
    })
}

modalClose();

