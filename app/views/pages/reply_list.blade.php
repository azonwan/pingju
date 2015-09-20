        <div class="panel panel-heading" style="margin-bottom:5px;">
            <h3 class="panel-title text-center">
              {{$topic_title}} - {{ lang('Reply List') }} &nbsp;
            </h3>
        </div>
        <div class="panel panel-default list-panel">
            @include('replies.partials.replies')
        </div> 
