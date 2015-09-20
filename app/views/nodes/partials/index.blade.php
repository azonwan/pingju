@if (isset($nodes) && count($nodes))
<div class="panel panel-default node-panel">
  <div class="panel-body remove-padding-vertically remove-padding-bottom">
  <dl class="dl-horizontal">
      @foreach ($nodes['top'] as $index => $top_node)
        @if (!empty($nodes['second'][$top_node->id]))
        <dt>{{{ $top_node->name }}}</dt>
      <dd>

        <ul class="list-inline">
          @foreach ($nodes['second'][$top_node->id] as $snode)
              @if (is_object($snode))
              <li><a href="javascript:void(0)" class="node_name" node_id="{{ $snode->id }}" data-url="{{ route('home.topic_list') }}">{{{ $snode->name }}}</a></li>
              @endif
          @endforeach
        </ul>

      </dd>

        @if (count($nodes['top']) != $index +1 )
          <div class="divider"></div>
        @endif

        @endif
      @endforeach
  </dl>
  </div>
</div>

@endif
