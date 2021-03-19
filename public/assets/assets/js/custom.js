$(document).ready(function() {
    (function($) {
        $.fn.countTo = function(options) {
            options = options || {};
            return $(this).each(function() {
                var settings = $.extend({}, $.fn.countTo.defaults, {
                    from: $(this).data('from'),
                    to: $(this).data('to'),
                    speed: $(this).data('speed'),
                    refreshInterval: $(this).data('refresh-interval'),
                    decimals: $(this).data('decimals')
                }, options);
                var loops = Math.ceil(settings.speed / settings.refreshInterval),
                    increment = (settings.to - settings.from) / loops;
                var self = this,
                    $self = $(this),
                    loopCount = 0,
                    value = settings.from,
                    data = $self.data('countTo') || {};
                $self.data('countTo', data);
                if (data.interval) {
                    clearInterval(data.interval);
                }
                data.interval = setInterval(updateTimer, settings.refreshInterval);
                render(value);

                function updateTimer() {
                    value += increment;
                    loopCount++;
                    render(value);
                    if (typeof(settings.onUpdate) == 'function') {
                        settings.onUpdate.call(self, value);
                    }
                    if (loopCount >= loops) {
                        $self.removeData('countTo');
                        clearInterval(data.interval);
                        value = settings.to;
                        if (typeof(settings.onComplete) == 'function') {
                            settings.onComplete.call(self, value);
                        }
                    }
                }

                function render(value) {
                    var formattedValue = settings.formatter.call(self, value, settings);
                    $self.html(formattedValue);
                }
            });
        };
        $.fn.countTo.defaults = {
            from: 0,
            to: 0,
            speed: 1000,
            refreshInterval: 100,
            decimals: 0,
            formatter: formatter,
            onUpdate: null,
            onComplete: null
        };

        function formatter(value, settings) {
            return value.toFixed(settings.decimals);
        }
    }(jQuery));
    jQuery(function($) {
        $('.count-number').data('countToOptions', {
            formatter: function(value, options) {
                return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            }
        });
        $('.timer').each(count);

        function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
            $this.countTo(options);
        }
    });
    $('.customer-logos').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 1000,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 1
            }
        
        }]
    });
    $('.news_slider').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll:1,
                infinite: true,
                dots: true
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });

    $('.webinar_responsive').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });

});
$(document).ready(function() {
    if ($(window).width() > 480) {
        $(".services_item-icon").hover(function() {
            $(this).parent().addClass("active");
            $(this).parent().siblings(".services_item-wrap").removeClass("active");
        })
    }
});
$(document).ready(function() {
    var url = window.location.pathname;
    var filename = url.substring(url.lastIndexOf('/') + 1);
    $('.navbar-nav li a:not(.btn)').each(function() {
        if (filename == $(this).attr('href')) {
            $(this).parent().addClass('active');
        }
    });
});
$(window).scroll(function() {
    if ($(window).scrollTop() >= 100) {
        $('header').addClass('fixed wow slideInDown animated');
    } else {
        $('header').removeClass('fixed wow slideInDown animated');
    }
});

//Marquee
$('#marquee-horizontal').marquee({
    direction: 'horizontal',
    delay: 0,
    timing: 15
});
//Crypto Table
$('#cryptoTable').DataTable({
    responsive: true
});
//Forex Table
$('#forexTable').DataTable({
    responsive: true
});
//Stocks Table
$('#stocksTable').DataTable({
    responsive: true
});
//expiredTable Table
$('#expiredTable').DataTable({
    rowReorder: {
        selector: 'td:nth-child(2)'
    },
    responsive: true
});
//topbroker Table
$('#topbroker-list').DataTable({
    responsive: true
});
//Dtatable Tab
$("a[data-toggle=\"tab\"]").on("shown.bs.tab", function(e) {
    $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
});
//Dtatable Link
// $('.table').on('click', 'tbody tr', function() {
//     window.location.href = $(this).data('href');
// });

// charts

am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_material);
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv", am4charts.XYChart);

var data = [];
var open = 100;
var close = 150;

var names = ["Raina",
  "Demarcus",
  "Carlo",
  "Jacinda",
  "Richie",
  "Antony",
  "Amada",
  "Idalia",
  "Janella",
  "Marla"
];

for (var i = 0; i < names.length; i++) {
  open += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 5);
  close = open + Math.round(Math.random() * 10) + 3;
  data.push({ category: names[i], open: open, close: close });
}

chart.data = data;
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.minGridDistance = 15;
categoryAxis.renderer.grid.template.location = 0.5;
categoryAxis.renderer.grid.template.strokeDasharray = "1,3";
categoryAxis.renderer.labels.template.rotation = -90;
categoryAxis.renderer.labels.template.horizontalCenter = "left";
categoryAxis.renderer.labels.template.location = 0.5;
categoryAxis.renderer.inside = true;

categoryAxis.renderer.labels.template.adapter.add("dx", function(dx, target) {
    return -target.maxRight / 2;
})

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.tooltip.disabled = true;
valueAxis.renderer.ticks.template.disabled = true;
valueAxis.renderer.axisFills.template.disabled = true;

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryX = "category";
series.dataFields.openValueY = "open";
series.dataFields.valueY = "close";
series.tooltipText = "open: {openValueY.value} close: {valueY.value}";
series.sequencedInterpolation = true;
series.fillOpacity = 0;
series.strokeOpacity = 1;
series.columns.template.width = 0.01;
series.tooltip.pointerOrientation = "horizontal";

var openBullet = series.bullets.create(am4charts.CircleBullet);
openBullet.locationY = 1;

var closeBullet = series.bullets.create(am4charts.CircleBullet);

closeBullet.fill = chart.colors.getIndex(4);
closeBullet.stroke = closeBullet.fill;

chart.cursor = new am4charts.XYCursor();

chart.scrollbarX = new am4core.Scrollbar();
chart.scrollbarY = new am4core.Scrollbar();


}); // end am4core.ready()


// chart green-red
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv2", am4charts.XYChart);

// Add data
chart.dataSource.url = "https://poloniex.com/public?command=returnOrderBook&currencyPair=BTC_ETH&depth=50";
chart.dataSource.reloadFrequency = 30000;
chart.dataSource.adapter.add("parsedData", function(data) {
  
  // Function to process (sort and calculate cummulative volume)
  function processData(list, type, desc) {

    // Convert to data points
    for(var i = 0; i < list.length; i++) {
      list[i] = {
        value: Number(list[i][0]),
        volume: Number(list[i][1]),
      }
    }

    // Sort list just in case
    list.sort(function(a, b) {
      if (a.value > b.value) {
        return 1;
      }
      else if (a.value < b.value) {
        return -1;
      }
      else {
        return 0;
      }
    });

    // Calculate cummulative volume
    if (desc) {
      for(var i = list.length - 1; i >= 0; i--) {
        if (i < (list.length - 1)) {
          list[i].totalvolume = list[i+1].totalvolume + list[i].volume;
        }
        else {
          list[i].totalvolume = list[i].volume;
        }
        var dp = {};
        dp["value"] = list[i].value;
        dp[type + "volume"] = list[i].volume;
        dp[type + "totalvolume"] = list[i].totalvolume;
        res.unshift(dp);
      }
    }
    else {
      for(var i = 0; i < list.length; i++) {
        if (i > 0) {
          list[i].totalvolume = list[i-1].totalvolume + list[i].volume;
        }
        else {
          list[i].totalvolume = list[i].volume;
        }
        var dp = {};
        dp["value"] = list[i].value;
        dp[type + "volume"] = list[i].volume;
        dp[type + "totalvolume"] = list[i].totalvolume;
        res.push(dp);
      }
    }

  }

  // Init
  var res = [];
  processData(data.bids, "bids", true);
  processData(data.asks, "asks", false);

  return res;
});

// Set up precision for numbers
chart.numberFormatter.numberFormat = "#,###.####";

// Create axes
var xAxis = chart.xAxes.push(new am4charts.CategoryAxis());
xAxis.dataFields.category = "value";
//xAxis.renderer.grid.template.location = 0;
xAxis.renderer.minGridDistance = 50;
xAxis.title.text = "Price (BTC/ETH)";

var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
yAxis.title.text = "Volume";

// Create series
var series = chart.series.push(new am4charts.StepLineSeries());
series.dataFields.categoryX = "value";
series.dataFields.valueY = "bidstotalvolume";
series.strokeWidth = 2;
series.stroke = am4core.color("#0f0");
series.fill = series.stroke;
series.fillOpacity = 0.1;
series.tooltipText = "Ask: [bold]{categoryX}[/]\nTotal volume: [bold]{valueY}[/]\nVolume: [bold]{bidsvolume}[/]"

var series2 = chart.series.push(new am4charts.StepLineSeries());
series2.dataFields.categoryX = "value";
series2.dataFields.valueY = "askstotalvolume";
series2.strokeWidth = 2;
series2.stroke = am4core.color("#f00");
series2.fill = series2.stroke;
series2.fillOpacity = 0.1;
series2.tooltipText = "Ask: [bold]{categoryX}[/]\nTotal volume: [bold]{valueY}[/]\nVolume: [bold]{asksvolume}[/]"

var series3 = chart.series.push(new am4charts.ColumnSeries());
series3.dataFields.categoryX = "value";
series3.dataFields.valueY = "bidsvolume";
series3.strokeWidth = 0;
series3.fill = am4core.color("#000");
series3.fillOpacity = 0.2;

var series4 = chart.series.push(new am4charts.ColumnSeries());
series4.dataFields.categoryX = "value";
series4.dataFields.valueY = "asksvolume";
series4.strokeWidth = 0;
series4.fill = am4core.color("#000");
series4.fillOpacity = 0.2;

// Add cursor
chart.cursor = new am4charts.XYCursor();

}); // end am4core.ready()

 $(function() {
    $('input[type="checkbox"]').bootstrapToggle({
      size: 'mini'
    });
  });
