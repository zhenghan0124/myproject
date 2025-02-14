<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8" />
  <title>登录</title>
  <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="/anlu/Public/admin/assets/images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="/anlu/Public/admin/assets/images/logo.png">

  <!-- style -->
  <link rel="stylesheet" href="/anlu/Public/admin/assets/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="/anlu/Public/admin/assets/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="/anlu/Public/admin/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="/anlu/Public/admin/assets/material-design-icons/material-design-icons.css" type="text/css" />

  <link rel="stylesheet" href="/anlu/Public/admin/assets/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
  <!-- build:css /anlu/Public/admin/assets/styles/app.min.css -->
  <link rel="stylesheet" href="/anlu/Public/admin/assets/styles/app.css" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="/anlu/Public/admin/assets/styles/font.css" type="text/css" />
</head>
<body>
  <div class="app" id="app">

<!-- ############ LAYOUT START-->
  <div class="center-block w-xxl w-auto-xs p-y-md">
    <div class="navbar">
      <div class="pull-center">
        <div ui-include="'../views/blocks/navbar.brand.html'"></div>
      </div>
    </div>
    <div class="p-a-md box-color r box-shadow-z1 text-color m-a">
      <div class="m-b text-sm">
        登录管理中心
      </div>
      <form class="validate" action="<?php echo U('Login/index');?>" method="post">
        <div class="md-form-group float-label">
          <input type="text" class="md-input" name="username" required>
          <label>用户名</label>
        </div>
        <div class="md-form-group float-label">
          <input type="password" class="md-input" name="password" required>
          <label>密码</label>
        </div>
        <div class="m-b-md">
          <label class="md-check">
            <input type="checkbox" checked><i class="primary"></i> 保持登录
          </label>
        </div>
        <button type="submit" class="btn primary btn-block p-x-md">登录</button>
      </form>
    </div>
  </div>

<!-- ############ LAYOUT END-->

  </div>
<!-- build:js /anlu/Public/admin/scripts/app.html.js -->
<!-- jQuery -->
  <script src="/anlu/Public/admin/libs/jquery/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
  <script src="/anlu/Public/admin/libs/jquery/tether/dist/js/tether.min.js"></script>
  <script src="/anlu/Public/admin/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
  <script src="/anlu/Public/admin/libs/jquery/underscore/underscore-min.js"></script>
  <script src="/anlu/Public/admin/libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
  <script src="/anlu/Public/admin/libs/jquery/PACE/pace.min.js"></script>

  <script src="/anlu/Public/admin/scripts/config.lazyload.js"></script>

  <script src="/anlu/Public/admin/scripts/palette.js"></script>
  <script src="/anlu/Public/admin/scripts/ui-load.js"></script>
  <script src="/anlu/Public/admin/scripts/ui-jp.js"></script>
  <script src="/anlu/Public/admin/scripts/ui-include.js"></script>
  <script src="/anlu/Public/admin/scripts/ui-device.js"></script>
  <script src="/anlu/Public/admin/scripts/ui-form.js"></script>
  <script src="/anlu/Public/admin/scripts/ui-nav.js"></script>
  <script src="/anlu/Public/admin/scripts/ui-screenfull.js"></script>
  <script src="/anlu/Public/admin/scripts/ui-scroll-to.js"></script>
  <script src="/anlu/Public/admin/scripts/ui-toggle-class.js"></script>

  <script src="/anlu/Public/admin/scripts/app.js"></script>

  <!-- ajax -->
  <script src="/anlu/Public/admin/libs/jquery/jquery-pjax/jquery.pjax.js"></script>
  <script src="/anlu/Public/admin/scripts/ajax.js"></script>
<!-- endbuild -->
</body>
</html>