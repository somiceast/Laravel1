<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    public function add()
    {
        //检查用户是否登陆
        if(!user_ins()->is_logged_in())
            return ['status' => 0, 'msg' => 'login required'];
        //检查参数中是否存在问题id和answer内容
        if(!rq('question_id')|| !rq('content'))
            return ['status' => 0, 'msg' => 'content or qustion_id required'];
        //检查问题id是否存在
        $question = question_ins()->find(rq('question_id'));
        if(!$question)
            return ['status' => 0, 'msg' => 'question not exist'];
        //检查answer是否回答过
        $answered = $this->where([
            'question_id' => rq('question_id'),
            'user_id'=> session('user_id')])
            ->count();

        if($answered)
            return ['status' => 0, 'msg' => 'duplicate answers'];

        //保存数据
        $this->content = rq('content');
        $this->question_id= rq('question_id');
        $this->user_id= session('user_id');

        return $this->save() ?
            ['status' => 1, 'id' => $this->id] :
            ['status' => 0, 'msg' => 'db insert failed'];
    }

    public function change()
    {
        //检查用户是否登陆
        if(!user_ins()->is_logged_in())
            return ['status' => 0, 'msg' => 'login required'];
        if(!rq('id') || !rq('content'))
            return ['status' => 0, 'msg' => 'answer id required'];
        $answer = $this->find(rq('id'));
        if($answer->user_id != session('user_id'))
            return ['status' => 0, 'msg' => 'permission denied'];

        $answer->content = rq('content');
        $answer->save() ?
            ['status' => 1]:
            ['status' => 0, 'msg' => 'db update failed'];
    }

    public function read()
    {
        //检查参数中是否有问题id和问题id
        if(!rq('id') && !rq('question_id'))
            return ['status' => 0, 'msg' => 'id or question_id required'];
//            检查参数中的id是否存在
        if (rq('id')) {
            $answer = $this->find(rq('id'));
            if(!$answer)
                return ['status' => 0, 'msg' => 'answer not exist'];
            return ['status' => 1, 'data' => $answer];
        }
//        检查参数中的问题是否存在
        if(!question_ins() -> find(rq('question_id')))
            return ['status' => 0, 'msg' => 'question not exist'];

        //返回回答列表
        $answers = $this
                ->where('question_id', rq('question_id'))
                ->get()
                ->keyBy('id');
        return ['status' => 1, 'data' => $answers];
    }

    public function remove()
    {
        //是否登录
        if(!user_ins()->is_logged_in())
            return ['status' => 0, 'msg' => 'login required'];
        //参数中是否含有id
        if(!rq('id'))
            return ['status' => 0, 'msg' => 'id is required'];
        //请求的answer是否存在
        $answer = $this->find(rq('id'));
        if(!$answer)
            return ['status' => 0, 'msg' => 'answer not exist'];
        //user_id是否与自己id一致
        if($answer->user_id != session('user_id'))
            return ['status' => 0, 'msg' => 'permission denied'];
        //删除数据
        return $answer->delete() ?
            ['status' => 1] :
            ['status' => 0, 'db delete failed'];
    }

    //投票
    public function vote()
    {
        //是否登录
        if(!user_ins()->is_logged_in())
            return ['status' => 0, 'msg' => 'login required'];
        //参数中是否含有id和vote
        if(!rq('id') || !rq('vote'))
            return ['status' => 0, 'msg' => 'vote or id required'];
        $answer = $this->find(rq('id'));
        //answer是否存在
        if(!$answer)
            return ['status' => 0, 'msg' => 'answer not exist'];
        //vote 1赞成2反对
        $vote = rq('vote') <=1 ? 1: 2;

        /*检查此用户是否在相同问题下投过票 投过就删*/
        $answer
            ->users()
            ->newPivotStatement()
            ->where('user_id', session('user_id'))
            ->where('answer_id', rq('id'))
            ->delete();
        /*在表中增加数据*/
        $answer
            ->users()
            ->attach(session('user_id'), ['vote' => (int)rq('vote')]);
        return ['status' => 1  ];
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function users()
    {
        return $this
            ->belongsToMany('APP\User')
            ->withPivot('vote')
            ->withTimestamps();
    }
}
