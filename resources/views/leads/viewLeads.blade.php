
@extends('layouts.header')
@extends('layouts.sidebar')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card py-3 table-responsive mx-4">
                <h4 class="ml-4"><i class="fa fa-address-book" aria-hidden="true"></i> New Leads:</h4>
                <table class="table table-striped text-center mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col"><i class="fa fa-user-o"> Name</th>
                            <th scope="col"><i class="fa fa-envelope-o"> Email</th>
                            <th scope="col"><i class="fa fa-phone"> Contact</th>
                            <th scope="col"><i class="fa fa-map-marker"> Area</th>
                            <th scope="col"><i class="fa fa-wrench"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leads as $key=>$lead)
                        <tr class="row{{$lead->id}}">
                                <td>{{$lead->id}}</td>
                                <td>{{$lead->name}}</td>
                                <td>{{$lead->email}}</td>
                                <td>{{$lead->contact}}</td>
                                <td>{{$lead->area}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-info btn-sm dropdown-toggle" style="color:white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-cogs"></i> Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <form action="{{ route('editLead') }}" method="get" id="form" name="form">
                                                @csrf()
                                                <input type="hidden" value = {{ \Illuminate\Support\Facades\Crypt::encrypt($lead->id) }} name="id">
                                                <button class="dropdown-item" onclick="this.form.submit();"><i class="fa fa-pencil-square-o"></i> Edit</button>
                                            </form>
                                            <span class="dropdown-item delLead text-danger btn" data-id="{{$lead->id}}"><i class="fa fa-trash-o"></i> Delete </span>
                                        </div>
                                    </div>
                                </td>                            
                            </tr>
                        @endforeach
                </table>
                <span class="pull-right ml-5">
                    {{ $leads->links() }}
                </span>
            </div>
        </div>
    </div>
</div>
{!! Toastr::render() !!}
<script>
    $(document).ready(function(){
        $('.delLead').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url : '/delLead',
                type: 'post',
                data: {
                    '_token' : '{{csrf_token()}}',
                    'id' : $(this).data('id')
                },
                success:function(res){
                    $('.row'+id).remove();
                    console.log(res);
                    toastr.success('Lead deleted successfully.', 'Lead Deleted!', {timeOut: 5000});
                    // if(res.success){
                    // }
                }
            });
        });
    });
</script>
@endsection
