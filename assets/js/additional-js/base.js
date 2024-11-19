$(document).ready(function () {
    var currentYear = new Date().getFullYear();
    
    $(".copyright-year").text(currentYear);

    $(".dash").removeClass("active");
        
    if (segment1 == "") {
      $(".dash").addClass("active");
    }else if (segment1 == "master-supplier"){
        $(".master").addClass("active");
        $(".msup").addClass("active");
        $(".sidebar-list.master").addClass('active');
        $(".sidebar-list.master .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
        $(".sidebar-list.master ul.sidebar-submenu").slideDown('normal');   
    }else if (segment1 == "master-karyawan"){
        $(".master").addClass("active");
        $(".mkar").addClass("active");
        $(".sidebar-list.master").addClass('active');
        $(".sidebar-list.master .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
        $(".sidebar-list.master ul.sidebar-submenu").slideDown('normal');   
    }else if (segment1 == "master-material"){
        $(".master").addClass("active");
        $(".mtrl").addClass("active");
        $(".sidebar-list.master").addClass('active');
        $(".sidebar-list.master .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
        $(".sidebar-list.master ul.sidebar-submenu").slideDown('normal');   
    }else if (segment1 == "master-bank"){
        $(".master").addClass("active");
        $(".mbnk").addClass("active");
        $(".sidebar-list.master").addClass('active');
        $(".sidebar-list.master .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
        $(".sidebar-list.master ul.sidebar-submenu").slideDown('normal');   
    }else if (segment1 == "master-size"){
        $(".master").addClass("active");
        $(".msize").addClass("active");
        $(".sidebar-list.master").addClass('active');
        $(".sidebar-list.master .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
        $(".sidebar-list.master ul.sidebar-submenu").slideDown('normal');   
    }else if (segment1 == "master-agen"){
        $(".master").addClass("active");
        $(".mag").addClass("active");
        $(".sidebar-list.master").addClass('active');
        $(".sidebar-list.master .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
        $(".sidebar-list.master ul.sidebar-submenu").slideDown('normal');   
    }else if (segment1 == "master-tipe-agen"){
        $(".master").addClass("active");
        $(".mta").addClass("active");
        $(".sidebar-list.master").addClass('active');
        $(".sidebar-list.master .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
        $(".sidebar-list.master ul.sidebar-submenu").slideDown('normal');   
    }else if (segment1 == "katalog"){
        if (segment2 == "buat-baru") {
            $(".katalog").addClass("active");
            $(".kbb").addClass("active");
            $(".sidebar-list.katalog").addClass('active');
            $(".sidebar-list.katalog .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
            $(".sidebar-list.katalog ul.sidebar-submenu").slideDown('normal'); 
        }else if(segment2 == "condiments") {
            $(".katalog").addClass("active");
            $(".kcon").addClass("active");
            $(".sidebar-list.katalog").addClass('active');
            $(".sidebar-list.katalog .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
            $(".sidebar-list.katalog ul.sidebar-submenu").slideDown('normal');
        }else if(segment2 == "daftar") {
            $(".katalog").addClass("active");
            $(".klva").addClass("active");
            $(".sidebar-list.katalog").addClass('active');
            $(".sidebar-list.katalog .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
            $(".sidebar-list.katalog ul.sidebar-submenu").slideDown('normal');
        }else if(segment2 == "list") {
            $(".katalog").addClass("active");
            $(".lkp").addClass("active");
            $(".sidebar-list.katalog").addClass('active');
            $(".sidebar-list.katalog .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
            $(".sidebar-list.katalog ul.sidebar-submenu").slideDown('normal');
        }
    }else if (segment1 == "customer"){
        if (segment2 == "buat-baru") {
            $(".customer").addClass("active");
            $(".cbb").addClass("active");
            $(".sidebar-list.customer").addClass('active');
            $(".sidebar-list.customer .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
            $(".sidebar-list.customer ul.sidebar-submenu").slideDown('normal'); 
        }else if(segment2 == "daftar-customer") {
            $(".customer").addClass("active");
            $(".cdac").addClass("active");
            $(".sidebar-list.customer").addClass('active');
            $(".sidebar-list.customer .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
            $(".sidebar-list.customer ul.sidebar-submenu").slideDown('normal');
        }
    }else if (segment1 == "pembelian"){
        if (segment2 == "pembelian-material") {
            $(".pembelian").addClass("active");
            $(".pbm").addClass("active");
            $(".sidebar-list.pembelian").addClass('active');
            $(".sidebar-list.pembelian .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
            $(".sidebar-list.pembelian ul.sidebar-submenu").slideDown('normal'); 
        }else if(segment2 == "print-material") {
            $(".pembelian").addClass("active");
            $(".prm").addClass("active");
            $(".sidebar-list.pembelian").addClass('active');
            $(".sidebar-list.pembelian .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
            $(".sidebar-list.pembelian ul.sidebar-submenu").slideDown('normal');
        }
    }else if (segment1 == "penjualan"){
        if (segment2 == "kasir") {
            $(".penjualan").addClass("active");
            $(".pjor").addClass("active");
            $(".sidebar-list.penjualan").addClass('active');
            $(".sidebar-list.penjualan .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
            $(".sidebar-list.penjualan ul.sidebar-submenu").slideDown('normal'); 
        } else if (segment2 == "riwayat") {
            $(".penjualan").addClass("active");
            $(".pjrw").addClass("active");
            $(".sidebar-list.penjualan").addClass('active');
            $(".sidebar-list.penjualan .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
            $(".sidebar-list.penjualan ul.sidebar-submenu").slideDown('normal'); 
        }
    }else if (segment1 == "gudang") {
        if (segment2 == "lva") {
            $(".gudang").addClass("active");
            $(".gdlva").addClass("active");
            $(".sidebar-list.gudang").addClass('active');
            $(".sidebar-list.gudang .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
            $(".sidebar-list.gudang ul.sidebar-submenu").slideDown('normal'); 
        }else if(segment2 == "ldp") {
            $(".gudang").addClass("active");
            $(".gdldp").addClass("active");
            $(".sidebar-list.gudang").addClass('active');
            $(".sidebar-list.gudang .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
            $(".sidebar-list.gudang ul.sidebar-submenu").slideDown('normal');
        }
    }else if (segment1 == "produksi"){
        if (segment2 == "produksi-baru") {
            $(".produksi").addClass("active");
            $(".prb").addClass("active");
            $(".sidebar-list.produksi").addClass('active');
            $(".sidebar-list.produksi .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
            $(".sidebar-list.produksi ul.sidebar-submenu").slideDown('normal'); 
        }
    }else if (segment1 == "status-order"){
        $(".stato").addClass("active");
    }
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
});