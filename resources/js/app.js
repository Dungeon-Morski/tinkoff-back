import './bootstrap';
import $ from 'jquery'
import 'laravel-datatables-vite';
import toastr from 'toastr';


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


//update users
$('table').on('click', '.user-edit-btn', function () {
    let index = $(this).attr('data-id');
    let row_data = table.row('#' + index).data();
    let table_row = table.row('#' + index);
    let row_index = index;
    let name = row_data.name;
    let surname = row_data.surname;
    let password = row_data.password;
    let balance = row_data.balance;


    $('.name').val(name)
    $('.surname').val(surname)
    $('.password').val(password)
    $('.balance').val(balance)

    let modal = $('.modal')

    modal.show();

    $('#edit-close').on('click', function () {
        modal.hide()
    })

    $('#edit-save').on('click', function () {
        let new_data = {
            name: $('.name').val(),
            surname: $('.surname').val(),
            password: $('.password').val(),
            balance: $('.balance').val(),
        }
        $.ajax({
            url: "/admin/users/" + index,
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

});

//update requisites
$('table').on('click', '.requisite-edit-btn', function () {
    let index = $(this).attr('data-id');
    let row_data = table.row('#' + index).data();
    let table_row = table.row('#' + index);
    let row_index = index;
    let title = row_data.title;
    let owner = row_data.owner;
    let requisites = row_data.requisites;
    let rate = row_data.rate;
    let status = row_data.status;
    let bank = row_data.bank;


    $('.title').val(title)
    $('.owner').val(owner)
    $('.requisites').val(requisites)
    $('.rate').val(rate)
    $('.status').val(status).change()
    $('.bank').val(bank)

    let modal = $('.modal')

    modal.show();

    $('#edit-close').on('click', function () {
        modal.hide()
    })

    $('#edit-save').on('click', function () {
        let new_data = {
            title: $('.title').val(),
            owner: $('.owner').val(),
            requisites: $('.requisites').val(),
            rate: $('.rate').val(),
            status: $('.status').val(),
            bank: $('.bank').val(),
        }
        $.ajax({
            url: "/admin/requisites/" + index,
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

});
