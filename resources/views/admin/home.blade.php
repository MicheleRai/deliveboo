@extends('layouts.app')

@section('content')
<div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>
              {{$error}}
            </li>
            @endforeach
          </ul>
         </div>
        @endif
        @if(session()->get('message'))
        <div class="alert alert-success" role="alert">
          <strong>Success: </strong>{{session()->get('message')}}
        </div>
        @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profilo di {{Auth::user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($message = Session::get('success'))
                      <div class="alert alert-success">
                   <p>{{$message}}</p>
                      </div>
                   @endif
                   {{-- TODO: --}}
                    <form action="{{route('admin.profileupdate')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name"><strong>Name:</strong></label>
                        <input type="text" class="form-control" id ="name" name="name" value="{{Auth::user()->name}}">
                    </div>
                    <div class="form-group">
                        <label for="address"><strong>Indirizzo:</strong></label>
                        <input type="text" class="form-control" id ="address" value="{{Auth::user()->address}}" name="address">
                    </div>
                    <div class="form-group">
                        <label for="vat_number"><strong>Partita Iva:</strong></label>
                        <input type="text" class="form-control" id ="vat_number" value="{{Auth::user()->vat_number}}" name="vat_number">
                    </div>
                    <div class="form-group">
                        <label for="logo_image"><strong>Logo:</strong></label>
                        <input type="text" class="form-control" id ="logo_image" value="{{Auth::user()->logo_image}}" name="logo_image">
                    </div>
                    <div class="form-group">
                        <label for="cover_image"><strong>Immagine di copertina:</strong></label>
                        <input type="text" class="form-control" id ="cover_image" value="{{Auth::user()->cover_image}}" name="cover_image">
                    </div>
                        <button class="btn btn-primary" type="submit">Update Profile</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
