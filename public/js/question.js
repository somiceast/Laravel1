;(function () {
    'use strict';
    angular.module('question',[])

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

})();