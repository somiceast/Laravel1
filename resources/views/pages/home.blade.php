<?php
/**
 * Created by PhpStorm.
 * User: Little Guy
 * Date: 2017/1/11
 * Time: 19:52
 */
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
    <div ng-if="!Timeline.no_more_data" class="tac">加载中...</div>
    {{--<div ng-if="!Timeline.pending" class="tac">加载中...</div>--}}
    <div ng-if="Timeline.no_more_data" class="tac">没有更多数据了</div>

</div>

</div>