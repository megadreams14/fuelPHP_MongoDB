$(function() {
    $('#button').bind('click', function() {
        $('#myModal').modal('toggle');
    });
    $('a.btn').bind('click', function() {
        $('#myModal').modal('toggle');
    });
    //    $('.tabs a:last').tab('show');
    $('#button').popover({
        title: 'sample popover',
        content: 'this is sample of popover'
    });

    var chart1 = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            type: 'bar'
        },
        title: {
            text:"<?php echo $title; ?>"
        },
        xAxis: {
            categories: [
            <?php foreach ($data as $_data) { ?>
               <?php echo '"' . $_data['site'] . '",'; ?>
            <?php } ?>
               ]
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Jane',
            data:[
                <?php foreach ($data as $_data) { ?>
                    <?php echo  $_data[$key_name] . ','; ?>
                <?php } ?>
            ]

        }],
        //クリックイベント
        plotOptions: {
            series: {
                cursor: 'pointer',
                events: {
                    click: function(event) {

                        window.confirm(this.name +'の'+
                             event.point.category +'の詳細情報を表示します\n');

                        console.log('name:' + this.name);
                        console.log('index:' + event.delegateTarget.index);
                        console.log('category:' + event.point.category);
                        console.log('value:' + event.point.config);

                    }
                }
            }
        }
    });
});