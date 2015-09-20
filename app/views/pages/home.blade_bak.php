@extends('layouts.default')

@section('content')

<!--div class="box text-center">
  {{ lang('site_intro') }}
</div-->


<div class="panel panel-default list-panel">
  <div class="panel-heading">
    <h3 class="panel-title text-center">
      {{ lang('Excellent Topics') }} &nbsp;
      <!--a href="{{ route('feed') }}" style="color: #E5974E; font-size: 14px;" target="_blank">
         <i class="fa fa-rss"></i>
      </a-->
    </h3>

  </div>

    @include('nodes.partials.list')

  <div class="panel-body topic-content">
	@include('topics.partials.topics', ['column' => true])
  </div>

  <div class="panel-footer text-right">

  	<a href="topics?filter=excellent">
  		{{ lang('More Excellent Topics') }}...
  	</a>
  </div>
</div>


@stop
@section('scripts')
<!--script>
    $('.node_name').bind({
        click: function(){
            var node_id = $(this).attr('node_id');
            $.ajax({
                url: '{{ route('home.topic_list') }}', 
                data: {node_id:node_id },
                dataType: 'html',
                type: 'POST',
                success: function(data){
                  $('.topic-content').html(data);  
                }
            });
        }
    });
</script-->
@stop
