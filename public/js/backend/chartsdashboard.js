/*
 Template Name: Admiry - Bootstrap 4 Admin Dashboard
 Author: Themesdesign
 Website: www.themesdesign.in
 File: Dashboard js
 */

 !function ($) {
    "use strict";

    var Dashboard = function () {
    };


    //creates area chart
    Dashboard.prototype.createAreaChart = function (element, pointSize, lineWidth, data, xkey, ykeys, labels, lineColors) {
        Morris.Area({
            element: element,
            pointSize: 4,
            lineWidth: 2,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            resize: true,
            gridLineColor: '#eee',
            hideHover: 'auto',
            lineColors: lineColors
        });
    },
        //creates Bar chart
        Dashboard.prototype.createBarChart = function (element, data, xkey, ykeys, labels, lineColors) {
            Morris.Bar({
                element: element,
                data: data,
                xkey: xkey,
                ykeys: ykeys,
                labels: labels,
                gridLineColor: '#eee',
                barSizeRatio: 0.4,
                resize: true,
                hideHover: 'auto',
                barColors: lineColors
            });
        },

        //creates Donut chart
        Dashboard.prototype.createDonutChart = function (element, data, colors) {
            Morris.Donut({
                element: element,
                data: data,
                resize: true,
                colors: colors,
            });
        },

        Dashboard.prototype.init = function () {
            //creating donut chart
            var getdataorder = getdatabyajax("gettransactionorder");

            var $transactionOrder = [];
            if(getdataorder.length != 0){
                $.each(getdataorder,function(object,invalue) {
                    $transactionOrder.push({label:invalue.status,value:invalue.countorder});
                });
            }else{

                $transactionOrder.push({label:'Empty data',value:0});
            }
            this.createDonutChart('charts-transaction-order', $transactionOrder, ['#391414', '#5f2122', '#ab3b3c','#ca6364','#d88d8e','#f2d9d9']);

            //creating donut chart\
            var getdataretur = getdatabyajax("gettransactionretur");
            var $transactionRetur = [];
            if(getdataretur.length != 0){
                $.each(getdataretur,function(object,invalue) {
                    $transactionRetur.push({label:invalue.status,value:invalue.countretur});
                });
            }else{
                $transactionRetur.push({label:'Empty data',value:0});
            }

            this.createDonutChart('charts-transaction-return', $transactionRetur, ['#391414', '#5f2122', '#ab3b3c','#ca6364','#d88d8e','#f2d9d9']);

        },
        //init
        $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard
    }(window.jQuery),

//initializing
function ($) {
    "use strict";
    $.Dashboard.init();
}(window.jQuery);



function getdatabyajax(pathname) {
    var returnx = '';
    $.ajax({
        headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
      },
      method:'get',
      async:false,
      url:location.origin+'/dashboard/'+pathname,
      success:function (data) {
        returnx = data;
    }
});
    return returnx;
}