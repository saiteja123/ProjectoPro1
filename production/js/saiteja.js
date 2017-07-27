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