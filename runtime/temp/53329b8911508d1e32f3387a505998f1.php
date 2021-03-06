<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:76:"D:\phpstudy_pro\WWW\18pay\public/../application/admin\view\pay\bank\add.html";i:1558363755;s:68:"D:\phpstudy_pro\WWW\18pay\application\admin\view\layout\default.html";i:1547349022;s:65:"D:\phpstudy_pro\WWW\18pay\application\admin\view\common\meta.html";i:1553246434;s:67:"D:\phpstudy_pro\WWW\18pay\application\admin\view\common\script.html";i:1547349022;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<link rel="shortcut icon" href="/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="/assets/css/backend.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG && !$config['fastadmin']['multiplenav']): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <form id="add-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">????????????:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-bank_name" data-rule="required" class="form-control" name="row[bank_name]" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">????????????:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-bank_name2" data-rule="required" class="form-control" name="row[bank_name2]" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">?????????:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-real_name" data-rule="required" class="form-control" name="row[real_name]" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Bank_number'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-bank_number" data-rule="required" class="form-control" name="row[bank_number]" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">????????????:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-province" data-rule="required" class="form-control" name="row[province]" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">????????????:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-city" data-rule="required" class="form-control" name="row[city]" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">??????:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-alias"  class="form-control" name="row[alias]" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">????????????:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-default"  class="form-control" name="row[default]" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">??????:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-marks"  class="form-control" name="row[marks]" type="text">
        </div>
    </div>


    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>