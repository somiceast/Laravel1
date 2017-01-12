<!doctype html>
<html lang="zh" ng-app="usay">
<head>
    <meta charset="UTF-8">
    <title>
        Usay
    </title>
    <link rel="stylesheet" href="/node_modules/normalize-css/normalize.css">
    <link rel="stylesheet" href="/css/base.css">
    <script src="/node_modules/jquery/dist/jquery.js"></script>
    <script src="/node_modules/angular/angular.js"></script>
    <script src="/node_modules/angular-ui-router/release/angular-ui-router.js"></script>
    <script src="/js/base.js"></script>
    <script src="/js/user.js"></script>
    <script src="/js/common.js"></script>
    <script src="/js/question.js"></script>
    <script src="/js/answer.js"></script>
</head>
<body>
<div class="navbar clearfix">
    <div class="container">
        <div class="fl">
            <div class="navbar-item brand">Usay</div>
            <form id="quick_ask" ng-submit="Question.go_add_quesion()" ng-controller="QuestionAddController">
                <div class="navbar-item">
                    <input type="text" ng-model="Question.new_question.title">
                </div>
                <div class="navbar-item">
                    <button class="primary" type="submit">提问</button>
                </div>
            </form>
        </div>
        <div class="fr">
            <a ui-sref="home" class="navbar-item">首页</a>
        <?php if(is_logged_in()): ?>
                <a ui-sref="login" class="navbar-item"><?php echo e(session('username')); ?></a>
                <a href="<?php echo e(url('/api/logout')); ?>" class="navbar-item">登出</a>
            <?php else: ?>
                <a ui-sref="login" class="navbar-item">登录</a>
                <a ui-sref="signup" class="navbar-item">注册</a>
            <?php endif; ?>
        </div>
        <div class="fr"></div>
    </div>
</div>

<div class="page">
    <div ui-view></div>
</div>
<div class="version kkk clearfix">
    v1.0.0 Usay
    <label><?php echo e(session('username')); ?></label>
</div>
</body>

</html>