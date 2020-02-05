<div class="form-group" role="group" aria-label="Basic example">
  <form method="POST" action="{{ url($view.'/'.$data->id) }}" accept-charset="UTF-8" class="form_delete{{$data->id}}">
      {{ method_field('DELETE')}}
      {{ csrf_field() }}
  </form>
  <button type="button" class="delete_button btn btn-danger" value="{{$data->id}}"><i class="fa fa-trash"></i> Delete</button>
</div>

<script type="text/javascript">
$(document).ready(function(){

});
</script>
