    <div class="col-md-4">
        <div class="panel-body" role="complementary">
            @include('topics.partials.index')
        </div> 
        <div class="panel-footer text-right">
            <a href="/topics?filter=excellent">{{lang('More Excellent Topics')}}</a>
        </div>
    </div>
    <div class="col-md-8  reply-content" role="main">
        <div class="panel panel-heading" style="margin-bottom:5px;">
            <h3 class="panel-title text-center">
              {{$topic_title}} - {{ lang('Reply List') }} &nbsp;
            </h3>
        </div>
        <div class="panel panel-default list-panel">
            @include('replies.partials.replies')
        </div> 
    </div> 
