;(function () {
    'use strict';
    angular.module('question',[])

        .service('QuestionService', [
            '$state',
            '$http',
            'AnswerService',
            function ($state,$http,AnswerService) {
                var me = this;

                me.new_question = {}
                me.data = {}

                me.go_add_quesion = function () {
                    $state.go('question.add')
                }
                me.add=function () {
                    if(!me.new_question.title)
                        return;
                    $http.post('/api/question/add',me.new_question)                    // $http.post('http://192.168.191.1/LaravelTest/pu·lic/api/question/add',me.new_question)
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
                };

                me.read = function (params) {
                    return $http.post('/api/question/read',params)
                        .then(function (r) {
                            var its_answers;
                            if (r.data.status){
                                if(params.id) {
                                    console.log(params);
                                    console.log('kkk');
                                    me.data[params.id] = me.current_question = r.data.data;
                                    its_answers = me.current_question.answers_with_user_info;
                                    its_answers = AnswerService.count_vote(its_answers);
                                    console.log('its_answers', its_answers);
                                }
                                else{
                                    me.data = angular.merge({}, me.data, r.data.data)
                                }
                                return r.data.data
                            }
                            return false;
                        }
                        )
                }
            }
        ])

        .controller('QuestionController',[
            '$scope',
            'QuestionService',
            function ($scope,QuestionService) {
                $scope.Question = QuestionService;

            }]
        )

        .controller('QuestionAddController',[
            '$scope',
            'QuestionService',
            function ($scope,QuestionService) {
            }]
        )

        .controller('QuestionDetailController',[
            '$scope',
            'QuestionService',
            '$stateParams',
            function ($scope, QuestionService,$stateParams) {
                QuestionService.read($stateParams)
            }
        ])

})();