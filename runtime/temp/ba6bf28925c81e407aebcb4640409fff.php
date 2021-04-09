<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:78:"D:\phpstudy_pro\WWW\18pay\public/../application/admin\view\pay\cashed\add.html";i:1560933606;s:68:"D:\phpstudy_pro\WWW\18pay\application\admin\view\layout\default.html";i:1547349022;s:65:"D:\phpstudy_pro\WWW\18pay\application\admin\view\common\meta.html";i:1553246434;s:67:"D:\phpstudy_pro\WWW\18pay\application\admin\view\common\script.html";i:1547349022;}*/ ?>
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
    #select_f .dropdown-toggle{background-color: #ffffff}
</style>
<form id="add-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label  class="control-label col-xs-12 col-sm-2">可提现金额:</label>
        <div class="col-xs-12 col-sm-8">
            <input  disabled id="all_amount" class="form-control" step="0.01" value="<?php echo $moneyInfo['now_amount']; ?>" type="number">
        </div>
    </div>
    <div class="form-group">
        <label  class="control-label col-xs-12 col-sm-2">冻结金额:</label>
        <div class="col-xs-12 col-sm-8">
            <input  disabled id="freezed_amount" class="form-control" step="0.01" value="<?php echo $moneyInfo['freezed_amount']; ?>" type="number">
        </div>
    </div>

    <div class="form-group">
        <label  class="control-label col-xs-12 col-sm-2">提现费用:</label>
        <div class="col-xs-12 col-sm-8">
            <input disabled class="form-control" id="cost_amount" step="0.01" value="<?php echo $cost_amount; ?>" type="number">
        </div>
    </div>

    <div class="form-group">
        <label  class="control-label col-xs-12 col-sm-2">最低提现金额:</label>
        <div class="col-xs-12 col-sm-8">
            <input disabled class="form-control" step="0.01" value="<?php echo $min_cashed_amount; ?>" type="number">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">提现金额:</label>
        <div class="col-xs-12 col-sm-8">
            <input  class="form-control" id="cashed_amount" value="<?php echo $moneyInfo['now_amount']; ?>" step="0.01" name="row[amount]" type="number">
        </div>
    </div>

    <div class="form-group">
        <label  class="control-label col-xs-12 col-sm-2">到账金额:</label>
        <div class="col-xs-12 col-sm-8">
            <input disabled id="real_amount" class="form-control" step="0.01"  type="number">
        </div>
    </div>

    <div class="form-group" id="select_f">
        <label class="control-label col-xs-12 col-sm-2">选择银行卡:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="btn-group bootstrap-select form-control">
                <select id="bankList" class="form-control selectpicker"  tabindex="-98">
                    <?php if(is_array($bankList) || $bankList instanceof \think\Collection || $bankList instanceof \think\Paginator): if( count($bankList)==0 ) : echo "" ;else: foreach($bankList as $key=>$vo): ?>
                    <option value='<?php echo $vo; ?>' selected="selected"><?php echo $vo['bank_number']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>

    </div>


    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">银行卡号:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="bank_number" disabled class="form-control" data-rule="required" value="" type="text">
            <input id="bank_number_post" name="row[bank_number]" type="hidden">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">开户名称:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="real_name" disabled class="form-control" data-rule="required" type="text">
            <input id="real_name_post" name="row[real_name]" type="hidden">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">银行名称:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="bank_name" disabled class="form-control" data-rule="required"  type="text">
            <input id="bank_name_post" name="row[bank_name]" type="hidden">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">支行名称:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="bank_name2" disabled class="form-control" data-rule="required"  type="text">
            <input id="bank_name2_post" name="row[bank_name2]" type="hidden">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">提现密码:</label>
        <div class="col-xs-12 col-sm-8">
            <input  class="form-control" data-rule="required" value=""  name="row[cash_pwd]" type="password">
        </div>
    </div>


    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed" id="btnReset"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>
<script src="/assets/libs/jquery/dist/jquery.min.js"></script>
<script>
    function initAmount() {
        var real_amount = $("#cashed_amount").val() - $("#cost_amount").val();
        if(real_amount<0)
        {
            real_amount=0;
        }
        $("#real_amount").val(real_amount);
    }
    function initBankList() {
        var bankInfo = $("#bankList").val();
        console.log(bankInfo);
        if(bankInfo!=='')
        {
            bankInfo = jQuery.parseJSON(bankInfo);
            $("#bank_name").val(bankInfo.bank_name);
            $("#bank_name2").val(bankInfo.bank_name2);
            $("#real_name").val(bankInfo.real_name);
            $("#bank_number").val(bankInfo.bank_number);
            $("#bank_name_post").val(bankInfo.bank_name);
            $("#bank_name2_post").val(bankInfo.bank_name2);
            $("#real_name_post").val(bankInfo.real_name);
            $("#bank_number_post").val(bankInfo.bank_number);
        }
    }

    $(document).ready(function(){

        initAmount();
        $("#cashed_amount").on("input  propertychange",function(){
            initAmount()
        });
        initBankList();
        $("#bankList").change(function(){
            initBankList()
        });
    });
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