$(document).ready(function(){
    // $('.user-menu').click(function(){
    //     if($(this).hasClass('open')){
    //         $(this).removeClass('open');
    //     } else {
    //         $(this).addClass('open');
    //     }
    // });
    setTimeout(function(){
        $('.mesh-loader').css('display','none');
        $('#app').css('opacity','1');
    },1000);
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
    });
    $('#datepicker_end_date').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
    });
    $('.select2').select2({
        placeholder: "Vui lòng chọn",
    });
    $('#reservation').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
    });
    
    var url = window.location;
    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
        return this.href == url;
    }).parent().siblings().removeClass('active').end().addClass('active');
    // for treeview
    $('ul.treeview-menu a').filter(function() {
        return this.href == url;
    }).parentsUntil(".sidebar-menu > .treeview-menu").siblings().removeClass('active').end().addClass('active');
});
