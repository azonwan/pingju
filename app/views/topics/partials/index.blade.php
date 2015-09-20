
@if (count($topics))

<ul class="list-group row topic-list">
    @foreach ($topics as $k => $topic)
     <li name="topic_li" topic_id="{{ $topic->id }}" data-url="{{route('home.reply_list')}}" class="list-group-item media {{$k?'':'li-active';}}" style="margin-top: 0px;height:auto;">

        <div class="infos">

          <div class="media-heading">

            <a href="{{ route('topics.show', [$topic->id]) }}" title="{{{ $topic->title }}}">
                {{{ $topic->title }}}
            </a>
          </div>
          <div class="media-list meta">
            {{{ substr($topic->body,0,100) }}}...
          </div>
          <div class="media-body meta" style="color:#333;margin-top:5px;">

            @if ($topic->vote_count > 0)
                <a href="{{ route('topics.show', [$topic->id]) }}" class="remove-padding-left" id="pin-{{ $topic->id }}">
                    <span class="fa fa-thumbs-o-up"> {{ $topic->vote_count }} </span>
                </a>
                <span> •  </span>
            @endif

            <a href="{{ route('nodes.show', [$topic->node->id]) }}" title="{{{ $topic->node->name }}}" {{ $topic->vote_count == 0 || 'class="remove-padding-left"'}}>
                {{{ $topic->node->name }}}
            </a>

            @if ($topic->reply_count == 0)
                <span> • </span>
                <a href="{{ route('users.show', [$topic->user_id]) }}" title="{{{ $topic->user->name }}}">
                    {{{ $topic->user->name }}}
                </a>
                <span> • </span>
                <span class="timeago">{{ $topic->created_at }}</span>
            @endif

            @if ($topic->reply_count > 0 && count($topic->lastReplyUser))
                <span> • </span>{{ lang('Last Reply by') }}
                <a href="{{{ URL::route('users.show', [$topic->lastReplyUser->id]) }}}">
                  {{{ $topic->lastReplyUser->name }}}
                </a>
                <span> • </span>
                <span class="timeago">{{ $topic->updated_at }}</span>
            @endif
          </div>

        </div>

    </li>
    @endforeach
</ul>

@else
<ul class="list-group row topic-list">
     <li class="list-group-item media" style="margin-top: 0px;height:auto;">
        {{ lang('Dont have any data Yet') }}~~
    </li>
</ul>
@endif
