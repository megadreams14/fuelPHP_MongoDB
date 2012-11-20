<?php echo Asset::css('sample.css'); ?>
<?php //echo Asset::js('sample.js'); ?>
<?php
//    var_dump($view_data);
    $data = array();
    foreach ($view_data['demos'] as $_data) {
        $data[] = $_data;
    }


    $key_name = $view_data['key_name'];
    if ($key_name == 'member') {
        $title='会員数';
    } else if ($key_name == 'sales') {
        $title='売上';
    } else {
        $title='アクティブ';
    }
?>

<script>
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


</script>
</head>
<body>
    <header>
        sample header
    </header>
    <?php echo $menu;?>
    <div class="container-fluid">
        <nav class="sidebar">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home">Home</a></li>
                <li><a href="#profile">Profile</a></li>
                <li><a href="#messages">Messages</a></li>
                <li><a href="#settings">Settings</a></li>
            </ul>
        </nav>
        <article class="content">
            <h1>
                Hello Bootstrap!
            </h1>
            <p>This is sample of contents</p>
            <div class="tab-content">
                <div class="tab-pane active" id="home">home</div>
                <div class="tab-pane" id="profile">profile</div>
                <div class="tab-pane" id="messages">message</div>
                <div class="tab-pane" id="settings">setting</div>
            </div>
            <div class="row">
                <div class="span4">
                    sample 1
                </div>
                <div class="span8">
                    sample 2
                </div>
            </div>
            <!--        <div class="alert">
                        <p>This is sample of alert</p>
                        <a class="close" data-dismiss="alert" href=""#">close</a>
                    </div>-->
            <div class="btn-group">
                <button class="btn btn-warning">表示項目</button>
                <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><?php echo Html::anchor('sample/index/sales','売上'); ?></li>
                    <li><?php echo Html::anchor('sample/index/member','会員数'); ?></li>
                    <li><?php echo Html::anchor('sample/index/active','アクティブ率'); ?></li>
                    <li class="divider"></li>
                    <li><a href="#">全体表示</a></li>
                </ul>
                </div>
            <div id="container" style="width: 100%; height: 400px"></div>
        </article>
    </div>
    <button id="button">modal</button>
    <div class="modal hide fade" id="myModal">
        <div class="modal-header">
            <a class="close" data-dismiss="modal">close</a>
            <h3>Modal header</h3>
        </div>
        <div class="modal-body">
            <p>this is sample modal body…</p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-primary">Save changes</a>
            <a href="#" class="btn">Close</a>
        </div>
    </div>
    <ul class="nav pills">
        <li class="active"><a href="#">Regular link</a></li>
        <li class="dropdown" id="menu1">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
                Dropdown
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
            </ul>
        </li>
    </ul>