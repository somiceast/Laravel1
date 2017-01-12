;(function(){
    'use strict';
    angular.module('usay', [
        'ui.router',
        'common',
        'question',
        'user',
        'answer',
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
                        templateUrl:'/tpl/page/home'
                    })

                    .state('signup', {
                        url:'/signup',
                        templateUrl:'/tpl/page/signup'
                    })

                    .state('login', {
                        url:'/login',
                        templateUrl:'/tpl/page/login'
                    })
                    .state('question', {
                        abstract:true,
                        //抽象路由
                        url:'/question',
                        template:'<div ui-view></div>'
                    })
                    .state('question.add', {
                        url:'/add',
                        templateUrl:'/tpl/page/question_add'
                    })
        }])



})();