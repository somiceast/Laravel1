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

        /*首页数据*/
        me.get = function (conf) {
          if(me.pending||me.no_more_data) return;
          me.pending = true;
          conf = conf || {page: me.current_page};

          $http.post('/api/timeline',conf)
            .then(function (r) {
              if(r.data.status) {
                if(r.data.data.length){
                  me.data = me.data.concat(r.data.data);
                  me.data = AnswerService.count_vote(me.data);
                  console.info('timeline');
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
        me.vote = function (conf) {
          console.info('d');
          AnswerService.vote(conf).then(function (r) {
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

        $scope.$watch(function ()
        {
          return AnswerService.data;
        },function (new_data, old_data) {
          var timeline_data = TimelineService.data;
          for(var k in new_data) {
            console.log('123');
            for(var i = 0; i< timeline_data.length; i++) {
              console.log('kkk');
              if(k == timeline_data[i].id) {
                timeline_data[i] = new_data[k];
                console.log(new_data[k])
              }
            }
          }
        },true)
      }]
    )
})();