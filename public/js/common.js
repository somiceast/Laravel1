;(function () {
  'use strict';
  angular.module('common',[])

    .service('TimelineService',[
      "$http",
      "AnswerService",
      function ($http,AnswerService) {
        var me = this;
        me.data = [];
        me.current_page = 1;
        me.no_more_data = false;

        /*获取首页数据*/
        me.get = function (conf) {
          if(me.pending||me.no_more_data) return;
          me.pending = true;
          conf = conf || {page: me.current_page};

          $http.post('/api/timeline',conf)
            .then(function (r) {
              if(r.data.status) {
                if(r.data.data.length){
                  me.data = me.data.concat(r.data.data);
                  /*统计票数*/
                  console.log('统计票数')
                  me.data = AnswerService.count_vote(me.data);
                  me.current_page++;
                }
                else
                  me.no_more_data = true;
              }
              else
                console.error('network error')
            },function () {
              console.error('network error')
            })
            .finally(function () {
              me.pending = false;
            })
        }

        /*在时间线中投票*/
        me.vote = function (conf) {
          AnswerService.vote(conf).then(function (r) {
            /*数据成功就更新*/
            if(r)
              AnswerService.update_data(conf.id);
          })
        }
      }

    ])
    .controller('HomeController',[
      '$scope',
      'TimelineService',
      'AnswerService',
      function ($scope,TimelineService,AnswerService) {
        var $win;

        $scope.Timeline = TimelineService;
        TimelineService.get();

        $win = $(window)
        $win.on('scroll',function () {
          if($win.scrollTop() - ($(document).height() - $win.height()) > -500) {
            TimelineService.get();
          }
        })

        /* 监听回答数据变化，如果回答数据有变化，同时更新其他模块中的回答*/
        $scope.$watch(function ()
        {
          return AnswerService.data;
        },function (new_data, old_data) {
          var timeline_data = TimelineService.data;
          for(var k in new_data) {
            /*更新在时间线内回答数据*/
            for(var i = 0; i< timeline_data.length; i++) {
              if(k == timeline_data[i].id) {
                timeline_data[i] = new_data[k];
              }
            }
          }
          TimelineService.data = AnswerService.count_vote(TimelineService.data)
        },true)
      }]
    )
})();