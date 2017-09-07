/**
 * Created by ADMIN on 7/6/2017.
 */

$(document).ready(function() {
    $('body').on("click", "#CreateProject1", function () {
        $("div.cont").replaceWith("#CreateProject");
        $("div.desc").removeClass('hidden');
    });

    /*objectives*/
    var i = 1;
    i++;
    $("body").on("click", "#obj", function () {
        $("div.obj").find("div.row1").append('<div id="row' + i + '"><div class="col-md-11" style="padding-bottom: 10px;"><input name="objective[]" placeholder="Type Here" class="form-control name_list1"></div><div class="col-md-1"><button type="button" name="remove" id="' + i + '" class="fa fa-minus btn_remove1"></button></div></div>');
    });

    $(document).on('click', '.btn_remove1', function () {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
    /*objectives*/


    /*modules*/
    var p = 1;
    p++;
    $("body").on("click", "#mod", function () {
        $("div.mod").find("div.row2").append('<div id="rowx' + p + '"><div class="col-md-11" style="padding-bottom: 10px;"><input name="module[]" placeholder="Type Here" class="form-control name_list2" ></div><div class="col-md-1"><button type="button" name="remove" id="' + p + '" class="fa fa-minus btn_remove2"></button></div></div>');
    });

    $(document).on('click', '.btn_remove2', function () {
        var button_id = $(this).attr("id");
        $('#rowx' + button_id + '').remove();
    });
    /*modules*/


    /*requirements*/
    var q = 1;
    q++;
    $("body").on("click", "#req", function () {
        $("div.req").find("div.row3").append('<div id="rowy' + q + '"><div class="col-md-11" style="padding-bottom: 10px;"><input name="requirement[]" placeholder="Type Here" class="form-control name_list3" ></div><div class="col-md-1"><button type="button" name="remove" id="' + q + '" class="fa fa-minus btn_remove3"></button></div></div>');
    });

    $(document).on('click', '.btn_remove3', function () {
        var button_id = $(this).attr("id");
        $('#rowy' + button_id + '').remove();
    });
    /*requirements*/


    var  Pid;
    $('body').on("click", "#submit", function (){
        $.ajax({
            url: "name.php",
            method: "POST",
            dataType:'json',
            data: $("#create").serialize(),
            success: function (data)
            {
                if(data.message1=="data inserted successfully")
                {
                    $("div.desc").replaceWith("members");
                    $("div.members").removeClass('hidden');
                    Pid=data.message2;
                }

                else alert(data);
            }
        });

    });

    $('body').on("click","#selectall1",function(){

        if($(this).attr("value")=="un select all")
        {
            $('#tbody1').find('tr>td>input').prop('checked', false);
            $(this).attr("value","select all")
        }
        else {
            $('#tbody1').find('tr>td>input').prop('checked', true);
            $(this).attr("value","un select all")
        }
    });

    $('body').on("click","#selectall2",function(){

        if($(this).attr("value")=="un select all")
        {
            $('#tbody2').find('tr>td>input').prop('checked', false);
            $(this).attr("value","select all")
        }
        else {
            $('#tbody2').find('tr>td>input').prop('checked', true);
            $(this).attr("value","un select all")
        }
    });

    $('body').on("click","#selectall3",function(){

        if($(this).attr("value")=="un select all")
        {
            $('#tbody3').find('tr>td>input').prop('checked', false);
            $(this).attr("value","select all")
        }
        else {
            $('#tbody3').find('tr>td>input').prop('checked', true);
            $(this).attr("value","un select all")
        }
    });


    $('body').on("click", "#send", function (){


        $.ajax({
            url: "choose_members.php",
            method: "POST",
            dataType:"html",
            data: {'Pid':Pid,'choked':$('#tbody1>tr>td>input:checked').serialize(),'choked1':$('#tbody2>tr>td>input:checked').serialize(),'choked2':$('#tbody3>tr>td>input:checked').serialize()},
            success: function (data)
            {
                $("div.members").replaceWith("<h3>Project created successfully</h3>");
                setTimeout(location.reload.bind(location), 5000);
                alert(data);
            }
        });


    });


});




