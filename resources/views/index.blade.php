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
        @if(is_logged_in())
                <a ui-sref="login" class="navbar-item">{{session('username')}}</a>
                <a href="{{url('/api/logout')}}" class="navbar-item">登出</a>
            @else
                <a ui-sref="login" class="navbar-item">登录</a>
                <a ui-sref="signup" class="navbar-item">注册</a>
            @endif
        </div>
        <div class="fr"></div>
    </div>
</div>

<div class="page">
    <div ui-view></div>
</div>
<div class="version kkk clearfix">
    v1.0.0 Usay
    <label>{{session('username')}}</label>
</div>
</body>

<script type="text/ng-template" id="home.tpl">
    <div class="home container">
        <h1>首页</h1>
        简　介:《小鸡炖蘑菇》是由糗事百科出品的一档周播综艺脱口秀节目，除了有无节操女主播的犀利吐槽，还有好看的小剧场和路人恶搞等环节，每周三我们不见不散
    </div>
</script>
<script type="text/ng-template" id="home.tpl">
    <div class="home container card" ng-controller="HomeController">
        <h1>最近动态</h1>
            <div class="hr"></div>{{--水平线--}}
                <div class="item-set">
                    <div ng-repeat="row in Timeline.data" class="item">
                        <div class="vote"></div>
                        <div class="feed-item-content">
                            <div ng-if="row.question_id" class="content-act">[: row.user.username :]添加了回答</div>
                            <div ng-if="!row.question_id" class="content-act">[: row.user.username :]添加了提问</div>
                            <div class="title">[: row.title :]</div>
                            <div class="content-owner">[: row.user.username :]
                                <span class="desc">[:row.user.intro:]</span>
                            </div>
                            <div class="content-main">
                                [: row.desc :]
                            </div>
                            <div class="action-set">
                                <div class="comment">Comment</div>
                            </div>
                            <div class="comment-block">
                                {{--点击才能显示--}}
                                <div class="comment-item-set">
                                    <div class="rect"></div>
                                    <div class="hr"></div>
                                    <div class="comment-item clearfix">
                                        <div class="user">limi34234ng                                        </div>
                                        <div class="comment-content">
                                            This is known as a ‘fork bomb’. It will open more and more copies of itself, and those copies will open yet more copies. Your computer will be unusable within a couple of seconds after clicking the file and it will crash completely within a minute or two. Once you turn it back on it will be back to normal.
                                        </div>
                                    </div>
                                    <div class="comment-item clearfix">
                                        <div class="user">liming                                        </div>
                                        <div class="comment-content">
                                            This is known as a ‘fork bomb’. It will open more and more copies of itself, and those copies will open yet more copies. Your computer will be unusable within a couple of seconds after clicking the file and it will crash completely within a minute or two. Once you turn it back on it will be back to normal.
                                        </div>
                                    </div>
                                    <div class="comment-item clearfix">
                                        <div class="user">liming                                        </div>
                                        <div class="comment-content">
                                            This is known as a ‘fork bomb’. It will open more and more copies of itself, and those copies will open yet more copies. Your computer will be unusable within a couple of seconds after clicking the file and it will crash completely within a minute or two. Once you turn it back on it will be back to normal.
                                        </div>
                                    </div>
                                    <div class="comment-item clearfix">
                                        <div class="user">liming                                        </div>
                                        <div class="comment-content">
                                            This is known as a ‘fork bomb’. It will open more and more copies of itself, and those copies will open yet more copies. Your computer will be unusable within a couple of seconds after clicking the file and it will crash completely within a minute or two. Once you turn it back on it will be back to normal.
                                        </div>
                                    </div>
                                </div>
                            <div class="comment-block">
                                {{--点击才能显示--}}
                                <div class="comment-item-set">
                                    <div class="rect"></div>
                                    <div class="hr"></div>
                                    <div class="comment-item clearfix">
                                        <div class="user">limi34234ng                                        </div>
                                        <div class="comment-content">
                                            This is known as a ‘fork bomb’. It will open more and more copies of itself, and those copies will open yet more copies. Your computer will be unusable within a couple of seconds after clicking the file and it will crash completely within a minute or two. Once you turn it back on it will be back to normal.
                                        </div>
                                    </div>
                                    <div class="comment-item clearfix">
                                        <div class="user">liming                                        </div>
                                        <div class="comment-content">
                                            This is known as a ‘fork bomb’. It will open more and more copies of itself, and those copies will open yet more copies. Your computer will be unusable within a couple of seconds after clicking the file and it will crash completely within a minute or two. Once you turn it back on it will be back to normal.
                                        </div>
                                    </div>
                                    <div class="comment-item clearfix">
                                        <div class="user">liming                                        </div>
                                        <div class="comment-content">
                                            This is known as a ‘fork bomb’. It will open more and more copies of itself, and those copies will open yet more copies. Your computer will be unusable within a couple of seconds after clicking the file and it will crash completely within a minute or two. Once you turn it back on it will be back to normal.
                                        </div>
                                    </div>
                                    <div class="comment-item clearfix">
                                        <div class="user">liming                                        </div>
                                        <div class="comment-content">
                                            This is known as a ‘fork bomb’. It will open more and more copies of itself, and those copies will open yet more copies. Your computer will be unusable within a couple of seconds after clicking the file and it will crash completely within a minute or two. Once you turn it back on it will be back to normal.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr"></div>
                    </div>
                </div>
            </div>

    </div>
</script>
<script type="text/ng-template" id="login.tpl">
    <div ng-controller='LoginController'
         class="login container">
        <div class="card">
            <h1>登录</h1>
            <form name="login_form"
                  ng-submit="User.login()">
                <div class="input-group">
                    <label>用户名</label>
                    <input type="text"
                           name="username"
                           ng-model="User.login_data.username"
                           required
                    >
                </div>
                <div class="input-group">
                    <label>密码</label>
                    <input type="password"
                           name="password"
                           ng-model="User.login_data.password"
                           required
                    >
                </div>
                <div ng-if="User.login_failed" class="input-error-set">
                    用户名或密码有误
                </div>
                <div class="input-group">
                    <button ng-disabled="login_form.username.$error.required || login_form.password.$error.required"
                            class="primary"
                            type="submit"
                    >登录</button>
                </div>
            </form>
        </div>
    </div>
</script>
<script type="text/ng-template" id="signup.tpl">
    <div ng-controller='SignupController'
         class="signup container">
        <div class="card">
            <h1>注册<br /></h1>
            {{--[: User.signup_data :]--}}
            <form name="signup_form"
                  ng-submit="User.signup()">
                <div class="input-group">
                    <label>用户名</label>
                    <input  name="username"
                            type="text"
                            ng-minlength="4"
                            ng-maxlength="16"
                            ng-model="User.signup_data.username"
                            ng-model-options="{debounce:1000}"

                            required
                    >
                    <div class="input-error-set" ng-if="signup_form.username.$touched">
                        <div ng-if="signup_form.username.$error.required">
                            用户名必填
                        </div>
                        <div ng-if="signup_form.username.$error.maxlength
                        || signup_form.username.$error.minlength">
                            用户名长度需在4-16字符之间
                        </div>
                        <div ng-if="User.signup_username_exists">
                            用户名已存在
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <label>密码</label>
                    <input
                            name="password"
                            type="password"
                            ng-minlength="6"
                            ng-maxlength="18"
                            ng-model="User.signup_data.password"
                            ng-model-options="{debounce:500}"
                            required
                    >
                    <div class="input-error-set" ng-if="signup_form.password.$touched">
                        <div ng-if="signup_form.password.$error.required ">
                            密码必填
                        </div>
                        <div ng-if="signup_form.password.$error.maxlength || signup_form.password.$error.minlength ">
                            密码长度需在6-18之间
                        </div>
                    </div>
                </div>

                <button
                        class="primary"
                        ng-disabled="signup_form.$invalid"
                        type="submit">注册
                </button>
            </form>
            简　介:《小鸡炖蘑菇》是由糗事百科出品的一档周播综艺脱口秀节目，除了有无节操女主播的犀利吐槽，还有好看的小剧场和路人恶搞等环节，每周三我们不见不散！******************
        </div>
    </div>
</script>
<script type="text/ng-template"
        id="question.add.tpl">
    <div ng-controller="QuestionAddController"
         class="question-add container">
        <div class="card">
            <form ng-submit="Question.add()"
                  name="question_add_form">
                <div class="input-group">
                    <label >问题标题</label>
                    <input name="title"
                           type="text"
                           ng-model="Question.new_question.title"
                           ng-minlength="5"
                           ng-maxlength="255"
                           required
                    >
                </div>
                <div class="input-group">
                    <label>问题描述</label>
                    <textarea name="desc"
                              type="text"
                              ng-model="Question.new_question.desc">

                    </textarea>
                </div>
                <div class="input-group">
                    <button
                            type="submit"
                            ng-disabled="question_add_form.$invalid"
                            class="primary">提交</button>
                </div>
            </form>
        </div>
    </div>
</script>
</html>