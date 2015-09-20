@extends('layouts.default')

@section('content')
@if (count($nodes))
  <div class="panel-heading">
  </div>
    <div class="row wrapper">
        <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="clear"></div>
        @foreach ($nodes['top'] as $top_node)
        <div class="section-title">
            <span class="title">{{$top_node->name}}</span>
            <div class="columns section in" style="height:auto;">
                @foreach ($nodes['second'][$top_node->id] as $snode)
                <div class="updated-card col-sm-5 col-md-4 col-lg-3">
                    <div class="card pin">
                        {{ $snode->name }}
                        <p>{{ mb_strlen($snode->description) < 50 ? $snode->description : mb_substr($snode->description, 0 ,50).'...' }}</p>
                        @if (in_array($snode->id,$userNode))
                        <a href="javascript:;" class="unfollow" node_id="{{$snode->id}}" data_url="{{ route('node.operate') }}">{{ lang('Unfollow') }}</a>
                        @else
                        <a href="javascript:;" class="follow" node_id="{{$snode->id}}" data_url="{{ route('node.operate') }}">{{ lang('Follow') }}</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>        
        <div class="clear gap"></div>
        @endforeach
        </div>
    </div>

@else
   <div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
@endif

</div>
@stop
