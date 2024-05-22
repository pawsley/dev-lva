$(document).ready(function () {
    var currentYear = new Date().getFullYear();
    
    $(".copyright-year").text(currentYear);

    $(".dash").removeClass("active");
        
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
        }
    }
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
});