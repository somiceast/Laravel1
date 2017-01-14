<div ng-controller="UserController">
    <div class="user container card">
        <h1>用户详情</h1>
        <div class="hr"></div>
        <div class="basic">
            <div class="info_item clearfix">
                <div>用户名字</div>
                <div>[: User.current_user.username :]</div>
            </div>
            <div class="info_item clearfix">
                <div>用户介绍</div>
                <div>[: User.current_user.intro || '暂无介绍' :]</div>
            </div>
        </div>
        <h2>用户提问</h2>
        <div ng-repeat="(key, value) in User.his_questions">
            [: value.title :]
        </div>

        <h2>用户回答</h2>
        <div class="feed item" ng-repeat="(key, value) in User.his_answers">

            <div class="title">[:value.question.title:]
            </div>
            [: value.content:]
            <div {{--ui-sref=""--}} class="action-set">更新时间：
                [: value.updated_at :]
                <div class="comment-block">
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
            </div>
            <div class="hr"></div>
        </div>
    </div>

</div>