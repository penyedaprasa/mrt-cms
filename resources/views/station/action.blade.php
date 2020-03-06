<div class="form-group" role="group" aria-label="Basic example">
    <form method="POST" action="{{ route($view.'.destroy',$data->id) }}" accept-charset="UTF-8">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
        <a href="{{route($view.'.edit', $data->id)}}" class=" btn btn-info" value="{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
    </form>
</div>

<script type="text/javascript">
$(document).ready(function(){

});
</script>
