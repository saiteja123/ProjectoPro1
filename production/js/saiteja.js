/**
 * Created by ADMIN on 7/19/2017.
 */
function init_EasyPieChart() {
    if ("undefined" != typeof $.fn.easyPieChart) {
        console.log("init_EasyPieChart"), $(".charts").easyPieChart({
            easing: "easeOutElastic",
            delay: 3e3,
            barColor: "#0ddeff",
            trackColor: "#fff",
            scaleColor: !1,
            lineWidth: 10,
            trackWidth: 10,
            lineCap: "butt",

            onStep: function(a, b, c) {
                $(this.el).find(".percent").text(Math.round(c))
            }
        });
        var a = window.chart = $(".chart").data("easyPieChart");
        $(".js_update").on("click", function() {
            a.update(200 * Math.random() - 100)
        });
        var b = $.fn.popover.Constructor.prototype.leave;
        $.fn.popover.Constructor.prototype.leave = function(a) {
            var d, e, c = a instanceof this.constructor ? a : $(a.currentTarget)[this.type](this.getDelegateOptions()).data("bs." + this.type);
            b.call(this, a), a.currentTarget && (d = $(a.currentTarget).siblings(".popover"), e = c.timeout, d.one("mouseenter", function() {
                clearTimeout(e), d.one("mouseleave", function() {
                    $.fn.popover.Constructor.prototype.leave.call(c, c)
                })
            }))
        }, $("body").popover({
            selector: "[data-popover]",
            trigger: "click hover",
            delay: {
                show: 50,
                hide: 400
            }
        })
    }
}

$(document).ready(function() {
    $("#Review").click(function () {
        if ($("#step-2").is(":visible")) {
            $("#step-2").addClass("hidden");
        } else if ($("#step-3").is(":visible")) {
            $("#step-3").addClass("hidden");
        }
        $("#step-1").removeClass("hidden");

    });

    $("#Assign").click(function () {
        if ($("#step-1").is(":visible")) {
            $("#step-1").addClass("hidden");
        } else if ($("#step-3").is(":visible")) {
            $("#step-3").addClass("hidden");
        }
        $("#step-2").removeClass("hidden");

    });

    $("#Perform").click(function () {
        if ($("#step-1").is(":visible")) {
            $("#step-1").addClass("hidden");
        } else if ($("#step-2").is(":visible")) {
            $("#step-2").addClass("hidden");
        }
        $("#step-3").removeClass("hidden");

    });





    var i = 2;


    $(".pane1").on("click", ".plus", function () {
        var z = $(this).attr("id");
        $('#cont'+z+'').find("div.row")
            .append('<div id="row'+i+'">' +
                    '   <div class="col-md-11">' +
                    '       <input name="Task'+z+'[]" placeholder="Task" class="form-control tasks"  type="text" style="margin-left:15px; border: none; border-bottom: solid #e3e3e6 1px;box-shadow: none">' +
                    '   </div>' +
                    '   <div class="col-md-1">' +
                    '       <button type="button" class="fa fa-minus btn_remove1" id="'+i+'" style="margin-top: 15px"></button>' +
                    '   </div>' +
                    '</div>');
        i++;
    });

    $(document).on('click', '.btn_remove1', function () {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });


});