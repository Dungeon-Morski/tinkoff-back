import toastr from 'toastr';

//timer
let sec = 1800,
    countDiv = document.querySelector('.payment_time'),
    countDown = setInterval(function () {
        'use strict';

        secpass();
    }, 1000);

function secpass() {
    'use strict';

    let min = Math.floor(sec / 60),
        remSec = sec % 60;

    if (remSec < 10) {

        remSec = '0' + remSec;

    }
    if (min < 10) {

        min = '0' + min;

    }
    countDiv.innerHTML = min + ":" + remSec;

    if (sec > 0) {

        sec = sec - 1;

    } else {

        clearInterval(countDown);

        countDiv.innerHTML = 'Время вышло';

    }
}
//copy notification
document.querySelector('.copyBtn').addEventListener('click', function () {
    let copyText = document.querySelector('.number').innerHTML;
    navigator.clipboard.writeText(copyText)

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
    Command: toastr["success"]("Скопировано")
})
