<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:80:"D:\phpstudy_pro\WWW\18pay\public/../application/admin\view\pay\config\index.html";i:1555573534;s:68:"D:\phpstudy_pro\WWW\18pay\application\admin\view\layout\default.html";i:1547349022;s:65:"D:\phpstudy_pro\WWW\18pay\application\admin\view\common\meta.html";i:1553246434;s:67:"D:\phpstudy_pro\WWW\18pay\application\admin\view\common\script.html";i:1547349022;}*/ ?>
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
                                <style>
    .profile-avatar-container {
        position: relative;
        width: 100px;
        margin: 0 auto;
    }

    .profile-avatar-container .profile-user-img {
        width: 100px;
        height: 100px;
    }

    .profile-avatar-container .profile-avatar-text {
        display: none;
    }

    .profile-avatar-container:hover .profile-avatar-text {
        display: block;
        position: absolute;
        height: 100px;
        width: 100px;
        background: #444;
        opacity: .6;
        color: #fff;
        top: 0;
        left: 0;
        line-height: 100px;
        text-align: center;
    }

    .profile-avatar-container button {
        position: absolute;
        top: 0;
        left: 0;
        width: 100px;
        height: 100px;
        opacity: 0;
    }
</style>
<div class="row animated fadeInRight">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="panel-heading">
                账户信息
            </div>
            <div class="panel-body">

                <form id="update-form" role="form" data-toggle="validator" method="POST" action="<?php echo url('general.profile/update'); ?>">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th width="15%"></th>
                            <th width="70%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>商户ID(appid)</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-8 col-xs-12">
                                        <input disabled type="text" value="<?php echo $adminInfo['appid']; ?>" class="form-control" >
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>支付密钥(appsecret)</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-8 col-xs-12">
                                        <input id="c-appsecret" type="text" name="row[appsecret]" value="<?php echo $adminInfo['appsecret']; ?>" class="form-control" data-tip="请填写商户appsecret">
                                    </div>
                                    <div  class="col-xs-4 col-sm-4">
                                        <button type="button" onclick="change_appsecret()" class="btn btn-success btn-embossed">生成密钥</button>
                                    </div>
                                </div>

                            </td>
                        </tr>

                        <tr>
                            <td>原提现密码</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-8 col-xs-12">
                                        <input  type="password" name="row[cash_pwd]" value="" class="form-control" data-tip="不修改请保留空" placeholder="不修改请保留空">
                                    </div>
                                </div>

                            </td>
                        </tr>

                        <tr>
                            <td>新提现密码</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-8 col-xs-12">
                                        <input  type="password" name="row[new_cash_pwd]" value="" class="form-control" data-tip="不修改请保留空" placeholder="不修改请保留空">
                                    </div>
                                </div>

                            </td>
                        </tr>




                        </tbody>
                        <tfoot>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-success btn-embossed">确定</button>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>









        <!--<div class="box box-success">
            <div class="panel-heading">
                账户资金
            </div>
            <div class="panel-body">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th width="15%"></th>
                            <th width="70%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>提现密码</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-8 col-xs-12">
                                        <input  type="text" name="row[cash_pwd]" value="" class="form-control" data-tip="不修改请保留空">
                                    </div>
                                </div>

                            </td>
                        </tr>

                        </tbody>

                    </table>

            </div>
        </div>-->





    </div>

</div>


<script type="text/javascript">
    function change_appid() {
        $("#c-appid").val(getRandomString2(10));
    }

    function change_appsecret() {
        $("#c-appsecret").val(getRandomString(32));
    }


    // 获取长度为len的随机字符串
    function getRandomString(len) {
        len = len || 32;
        var $chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678'; // 默认去掉了容易混淆的字符oOLl,9gq,Vv,Uu,I1
        var maxPos = $chars.length;
        var pwd = '';
        for (i = 0; i < len; i++) {
            pwd += $chars.charAt(Math.floor(Math.random() * maxPos));
        }
        return pwd;
    }

    // 获取长度为len的随机字符串
    function getRandomString2(len) {
        len = len || 32;
        var $chars = '1234567890';
        var maxPos = $chars.length;
        var pwd = '';
        var date=new Date;
        var year=date.getFullYear();
        pwd+=year.toString();
        for (i = 0; i < len; i++) {
            pwd += $chars.charAt(Math.floor(Math.random() * maxPos));
        }
        return pwd;
    }

</script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>