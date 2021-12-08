(function() {
    function donutChart(e) {
        e.chart = '#' + $(e).attr('id') + ' .percent';
        e.datastart = $(e.chart).data("start");
        e.dataend = $(e.chart).data("end");
        if (e.dataend === 0) {
            $(e).fadeTo('slow', 0.3);
        }
        e.degree = e.datastart;
        animateChart(e);
    }

    function animateChart(e) {
        e.degree = 0;
        e.datadegree = 360 * (e.dataend / 100);
        e.firstslice = $('#' + $(e).attr('id') + ' .progress span');
        e.secondslice = $('#' + $(e).attr('id') + ' .mask');
        e.interval = setInterval(function() {
            if (e.degree < e.datadegree) {
                if (e.degree <= 180) {
                    rotate(e.firstslice, e.degree);
                } else {
                    e.firstslice.css('z-index', 301);
                    rotate(e.secondslice, e.degree - 179);
                }
                e.degree++;
                $(e.chart).html(Math.round(((e.degree / 360) * 100)) + '%');
                if (e.degree >= e.datadegree) {
                    clearInterval(e.interval);
                }
            }
        }, 5);
    }

    function rotate(e, degrees) {
        e.css({
            '-webkit-transform': 'rotate(' + degrees + 'deg)',
            '-moz-transform': 'rotate(' + degrees + 'deg)',
            '-ms-transform': 'rotate(' + degrees + 'deg)',
            '-o-transform': 'rotate(' + degrees + 'deg)',
            'transform': 'rotate(' + degrees + 'deg)',
            'zoom': 1
        });
    }
    
    $('.chart').each(function(i) {
        $(this).attr('id', 'chart' + i);
        donutChart(this);
    });
    
})();