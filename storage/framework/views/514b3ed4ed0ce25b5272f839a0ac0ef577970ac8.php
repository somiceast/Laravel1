</html>
<div class="home container card" ng-controller="HomeController" >
    <h1>最近动态</h1>
    <div class="hr"></div>
    <div class="item-set">
        <div ng-repeat="item in Timeline.data track by $index" class="feed item clearfix">
            <div ng-if="item.question_id" class="vote">
                <div ng-click="Timeline.vote({id:item.id,vote:1})" class="up">[: item.upvote_count:]</div>
                <div ng-click="Timeline.vote({id:item.id,vote:2})" class="down">踩[:item.downvote_count:]</div>
            </div>
            <div class="feed-item-content">
                <div ng-if="item.question_id" class="content-act">[: item.user.username :]添加了回答</div>
                <div ng-if="!item.question_id" class="content-act">[: item.user.username :]添加了提问</div>
                <div ></div>

                <div ng-if="item.question_id"
                     ui-sref="question.detail({id:item.id})"
                     class="title">[: item.question.title :]</div>
                <div ui-sref="question.detail({id:item.id})"
                     class="title">[: item.title :]</div>
                <div class="content-owner">[: item.user.username :]
                    <span class="desc">[:item.user.intro:]</span>
                </div>
                <div class="content-main">
                    <br />
                    [: item.content :]
                </div>
                <div class="action-set">
                    <div class="comment">Comment</div>
                </div>
                <div class="comment-block">
                    <?php /*点击才能显示*/ ?>
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
                        <?php /*点击才能显示*/ ?>
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
        <div ng-if="!Timeline.no_more_data" class="tac">加载中...</div>
        <?php /*<div ng-if="!Timeline.pending" class="tac">加载中...</div>*/ ?>
        <div ng-if="Timeline.no_more_data" class="tac">没有更多数据了</div>
    </div>
</div>