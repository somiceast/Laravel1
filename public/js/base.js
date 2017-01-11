;(function(){
    'use strict';
    angular.module('usay', [
        'ui.router'
    ])
        .config([
            '$interpolateProvider',
            '$stateProvider',
            '$urlRouterProvider',
            function (
                $interpolateProvider,
                $stateProvider,
                $urlRouterProvider)
            {
                $interpolateProvider.startSymbol('[:')
                $interpolateProvider.endSymbol(':]')
                $urlRouterProvider.otherwise('/home')
                $stateProvider
                    .state('home', {
                        url:'/home',
                        // template:'<h1>首页</h1>'
                        templateUrl:'home.tpl'
                    })

                    .state('signup', {
                        url:'/signup',
                        templateUrl:'signup.tpl'
                    })

                    .state('login', {
                        url:'/login',
                        templateUrl:'login.tpl'
                    })
                    .state('question', {
                        abstract:true,
                        //抽象路由
                        url:'/question',
                        template:'<div ui-view></div>'
                    })
                    .state('question.add', {
                        url:'/add',
                        templateUrl:'question.add.tpl'
                    })
        }])

        .service('UserService', [
            '$state',
            '$http',
            function ($state,$http) {
                var me = this;
                me.signup_data = {};
                me.login_data = {};
                me.signup = function () {
                    $http.post('/api/signup',
                        me.signup_data)
                        .then(function (r) {
                            if(r.data.status) {
                                me.signup_data = {};
                                //跳转到login
                                $state.go('login')
                            }
                        }, function (e) {
                            console.log('e', e)
                        })
                }
                me.username_exist = function() {
                    $http
                        .post('/api/user/exists',
                            {username: me.signup_data.username})
                        .then(function (r)
                        {
                            if(r.data.status && r.data.data.count){
                                me.signup_username_exists = true;
                            }else{
                                me.signup_username_exists = false;
                            }
                        },function (e)
                        {
                            console.log('e',e)
                        })
                }
                me.login = function () {
                    $http.post('/api/login',                    // $http.post('http://192.168.191.1/LaravelTest/public/api/login',
                        me.login_data)
                        .then(function (r) {
                            //如果返回的数据中的status为1
                            if(r.data.status){
                                //刷新界面
                                // location.href='http://www.baidu.com';
                                // location.reload();
                                location.href='/?#/home/';
                                // console.log(sessionStorage)
                            }else{
                                me.login_failed=true
                            }
                        },function () {

                        })
                }
            }
        ])

        .controller(
            'SignupController',[
                '$scope',
                'UserService',
                function ($scope, UserService) {
                    $scope.User = UserService;
                    $scope.$watch(function () {
                        return UserService.signup_data;
                    },function (n, o) {
                        if(n.username != o.username)
                            UserService.username_exist();
                        },true)
                }]
        )
        .controller(
            'LoginController',[
                '$scope',
                'UserService',
                function ($scope, UserService) {
                    $scope.User = UserService;
                }
            ]
        )
        .service('QuestionService', [
            '$state',
            '$http',
            function ($state,$http) {
                var me = this;
                me.go_add_quesion = function () {
                    $state.go('question.add')
                }
                me.add=function () {
                    if(!me.new_question.title)
                        return;
                    $http.post('/api/question/add',me.new_question)                    // $http.post('http://192.168.191.1/LaravelTest/public/api/question/add',me.new_question)
                        .then(function (r) {
                            if(r.data.status){
                                me.new_question ={}
                                $state.go('home')
                            }else{
                                $state.go('login')
                            }
                        }, function (e) {
                            console.log('e',e)
                        })
                }
            }
        ])
        .controller('QuestionAddController',[
                '$scope',
                'QuestionService',
                function ($scope,QuestionService) {
                    $scope.Question = QuestionService;
            }]
        )

        .service('TimelineService',[
            "$http",
            function ($http) {
                var me = this;
                me.data = []
                me.get = function (conf) {
                    $http.post('/api/timeline',conf)
                        .then(function (r) {
                            if(r.data.status) {
                                me.data = me.data.concat(r.data.data);
                                console.log(me.data)
                            }
                            else
                                console.error('network error')
                        },function () {
                            console.error('network error')
                        })
                }
            }

        ])
        .controller(
            'HomeController',[
                '$scope',
                'TimelineService',
                function ($scope,TimelineService) {
                    $scope.Timeline = TimelineService;
                    TimelineService.get();
            }]
        )
})();