@extends('layouts.header')
@extends('layouts.sidebar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card px-5 py-3">
                <h5><i class="fa fa-user-plus" aria-hidden="true"></i> Edit Lead</h5>
                <form action="{{ route('editLeadContents') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value={{ $data['id'] }}>
                    <label>Name:</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value={{ $data['name'] }} >
                    </div>
                    @if($errors->has('name'))
                        <div class="alert alert-danger">{{ $errors->first('name')}}</div>
                    @endif
                    <label>Email:</label>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email"  value={{ $data['email'] }}>
                    </div>
                    @if($errors->has('email'))
                        <div class="alert alert-danger">{{ $errors->first('email')}}</div>
                    @endif
                    <label>Contact:</label>
                    <div class="form-group">
                        <input type="number" class="form-control" name="contact" id="contact" placeholder="Contact" value={{ $data['contact'] }}>
                    </div>
                    @if($errors->has('contact'))
                        <div class="alert alert-danger">{{ $errors->first('contact')}}</div>
                    @endif
                    <label>Address:</label>
                    <div class="form-group">
                        <textarea name="address" class="form-control" id="address" cols="30" rows="5" placeholder="Address">{{ $data['address']}}</textarea>
                    </div>
                    @if($errors->has('address'))
                        <div class="alert alert-danger">{{ $errors->first('address')}}</div>
                    @endif      
                    <label>Area:</label>              
                    <div class="form-group">
                        <input type="text" class="form-control" name="area" id="area" placeholder="Area" value={{ $data['area'] }}>
                    </div>
                    @if($errors->has('area'))
                        <div class="alert alert-danger">{{ $errors->first('area')}}</div>
                    @endif
                    <input type="submit" class="btn btn-primary" value="submit" name="editLead">
                </form>
            </div>
        </div>
    </div>
</div>
{!! Toastr::render() !!}
@endsection

