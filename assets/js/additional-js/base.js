$(document).ready(function () {
    var currentYear = new Date().getFullYear();
    
    $(".copyright-year").text(currentYear);

    $(".dash, .gen, .fin, .prd").removeClass("active");
        
    if (segment1 == "") {
      $(".dash").addClass("active");
    }else if (segment1 == "master-diskon"){
        $(".master").addClass("active");
        $(".mdis").addClass("active");
        $(".sidebar-list.master").addClass('active');
        $(".sidebar-list.master .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
        $(".sidebar-list.master ul.sidebar-submenu").slideDown('normal');   
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
    }else if (segment1 == "master-kustomer"){
        $(".master").addClass("active");
        $(".mkus").addClass("active");
        $(".sidebar-list.master").addClass('active');
        $(".sidebar-list.master .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
        $(".sidebar-list.master ul.sidebar-submenu").slideDown('normal');   
    }else if (segment1 == "master-kategori"){
        $(".master").addClass("active");
        $(".mkat").addClass("active");
        $(".sidebar-list.master").addClass('active');
        $(".sidebar-list.master .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
        $(".sidebar-list.master ul.sidebar-submenu").slideDown('normal');   
    }else if (segment1 == "master-produk"){
        $(".master").addClass("active");
        $(".mprd").addClass("active");
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
    }else if (segment1 == "terima-barang"){
        $(".inven").addClass("active");
        $(".iskb").addClass("active");
        $(".sidebar-list.inven").addClass('active');
        $(".sidebar-list.inven .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
        $(".sidebar-list.inven ul.sidebar-submenu").slideDown('normal');   
    }else if (segment1 == "pindah-barang"){
        $(".inven").addClass("active");
        $(".ipb").addClass("active");
        $(".sidebar-list.inven").addClass('active');
        $(".sidebar-list.inven .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
        $(".sidebar-list.inven ul.sidebar-submenu").slideDown('normal');   
    }else if (segment1 == "stock-opname"){
        $(".inven").addClass("active");
        $(".iso").addClass("active");
        $(".sidebar-list.inven").addClass('active');
        $(".sidebar-list.inven .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
        $(".sidebar-list.inven ul.sidebar-submenu").slideDown('normal');   
    }else if (segment1 == "barang-masuk"){
        $(".inven").addClass("active");
        $(".ibm").addClass("active");
        $(".sidebar-list.inven").addClass('active');
        $(".sidebar-list.inven .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
        $(".sidebar-list.inven ul.sidebar-submenu").slideDown('normal');   
    }else if (segment1 == "barang-keluar"){
        $(".inven").addClass("active");
        $(".ibk").addClass("active");
        $(".sidebar-list.inven").addClass('active');
        $(".sidebar-list.inven .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
        $(".sidebar-list.inven ul.sidebar-submenu").slideDown('normal');   
    }else if (segment1 == "finance-supplier" && segment2 == "dp-supplier"){
        $(".finance").addClass("active");
        $(".dps").addClass("active");
        $(".sidebar-list.finance").addClass('active');
        $(".sidebar-list.finance .sidebar-title").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
        $(".sidebar-list.finance ul.sidebar-submenu").slideDown('normal');
        $(".submenu-title.fnc").addClass('active'); 
        $(".submenu-title.fnc").find('.according-menu i').removeClass('fa-angle-right').addClass('fa-angle-down');
        $(".submenu-title.fnc + .submenu-content").slideDown('normal');
    }
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
});