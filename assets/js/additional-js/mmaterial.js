function iqtym() {
    // Ambil input elemen
    const inputQtyMaterialStock = document.getElementById('QtyMaterialStock');

    // Tambahkan event listener untuk memformat nomor saat pengguna memasukkan angka
    inputQtyMaterialStock.addEventListener('input', function() {
        // Ambil nilai yang dimasukkan pengguna
        let value = this.value;

        // Hapus semua karakter yang bukan angka
        value = value.replace(/\D/g, '');

        // Format nomor dengan menambahkan tanda koma setiap tiga digit dari belakang
        let formattedValue = "";
        for (let i = value.length - 1, count = 0; i >= 0; i--) {
            formattedValue = value[i] + formattedValue;
            count++;
            if (count === 3 && i !== 0) {
                formattedValue = "." + formattedValue;
                count = 0;
            }
        }

        // Tampilkan nilai yang diformat di input
        this.value = formattedValue;
    });

    // Tambahkan event listener untuk memastikan pengguna hanya memasukkan angka
    inputQtyMaterialStock.addEventListener('keypress', function(event) {
        const charCode = (event.which) ? event.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            // Hentikan input karakter selain angka
            event.preventDefault();
        }
    });
}


function hitungTotalHarga() {
    var qtyMaterialStock = parseInt(document.getElementById("QtyMaterialStock").value);
    var hargaPokokMaterial = parseInt(document.getElementById("HargaPokokMaterial").value.replace(/\D/g, '')); // Menghapus karakter non-digit dari harga pokok Material
    var totalHarga = qtyMaterialStock * hargaPokokMaterial;

    // Menggunakan formatRupiah untuk memformat total harga
    var formattedTotalHarga = formatRupiah(totalHarga.toString());

    document.getElementById("TotalHargaPokokMaterial").value = formattedTotalHarga;
}
    
// Panggil fungsi hitungTotalHarga() setiap kali nilai di form QtyMaterialStock atau HargaPokokMaterial berubah
document.getElementById("QtyMaterialStock").addEventListener("input", hitungTotalHarga);
document.getElementById("HargaPokokMaterial").addEventListener("input", hitungTotalHarga);
    
    // Fungsi formatRupiah yang Anda sediakan
function formatRupiah(angka) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
    return rupiah;
}
