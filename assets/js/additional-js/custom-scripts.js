function formatRupiah(angka) {
    var number_string = angka.value.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
    angka.value = rupiah;
}

function kuotaDiskon(input) {
    input.value = input.value.replace(/[^0-9]/g, '');
}

function formatPhoneNumber(input) {
    let phoneNumber = input.value.replace(/\D/g, '');

    if (phoneNumber.startsWith('0')) {
        phoneNumber = phoneNumber.substring(1);
    } else if (phoneNumber.startsWith('62')) {
        phoneNumber = phoneNumber.substring(2);
    }
    input.value = '+62' + phoneNumber;
}
function updateDateTime(twid) {
    var now = new Date();
    var year = now.getFullYear();
    var month = (now.getMonth() + 1).toString().padStart(2, '0');
    var day = now.getDate().toString().padStart(2, '0');
    var hours = now.getHours().toString().padStart(2, '0');
    var minutes = now.getMinutes().toString().padStart(2, '0');
    twid = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;  
    return twid;
}
function formatNumber(input) {
    let value = $(input).val();
    // Replace commas with dots for consistency
    value = value.replace(',', '.');
    // Remove any character that is not a digit, dot, or comma
    value = value.replace(/[^0-9.]/g, '');
    // Set the cleaned value back to the input
    $(input).val(value);
}