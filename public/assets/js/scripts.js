$(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
        placeholder: "Please select ..."
    });
    $('.select2np').select2();
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
    //Date picker
    $('#datepicker').datepicker({
        autoclose: true
    });
    $('.datepicker').datepicker({
        autoclose: true
    });

    $('#search_period').datepicker({
        inputs: $('.actual_range'),
        format: 'dd-mm-yyyy'
    });
});

$('#product-table-grid').delegate('tbody > tr.clickable-row > td:not(:last-child)', 'click', function ()
{
    // 'this' refers to the current <td>, if you need information out of it
    var dhref = $(this).parent().data('href');

    window.location.href = dhref;
});


$('#data-table-grid').delegate('tbody > tr.clickable-row > td:not(:last-child)', 'click', function ()
{
    // 'this' refers to the current <td>, if you need information out of it
    var dhref = $(this).parent().data('href');

    window.location.href = dhref;
});



function printData()
{

    $("#custom-search-input").hide();

    $("nav.navbar").hide();


    $("button.printbtn").hide();

    $(".button-strip").hide();

    $(".hidden-print").hide();

    print();


    $("#custom-search-input").show();

    $("nav.navbar").show();


    $("button.printbtn").show();

    $(".button-strip").show();

    $(".hidden-print").show();
}

function filterTable() {

    $(".date-filter-tb tbody tr").each(function (indx, row) {
        var str = $(row).find("td.filterdate").html();
        str = str.split(" ");

        var dateFrom = $("#date_begin").val();
        var dateTo = $("#date_end").val();
        var dateCheck = str[0];//"11-5-2017";

        var d1 = dateFrom.split("-");
        var d2 = dateTo.split("-");
        var c = dateCheck.split("-");

        var from = new Date(d1[2], parseInt(d1[1]) - 1, d1[0]);  // -1 because months are from 0 to 11
        var to = new Date(d2[2], parseInt(d2[1]) - 1, d2[0]);
        var check = new Date(c[2], parseInt(c[1]) - 1, c[0]);

        if (check >= from && check <= to) {
            $(row).show();
        } else {
            $(row).hide();
        }

    });

}
