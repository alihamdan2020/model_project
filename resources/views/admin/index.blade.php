@extends('admin.layout')

@section('title','index admin page')

@section('content')
<h1>this is the login page</h1>
<div class="form" >
<form action="{{route('checkuser')}}" method="POST">
    @csrf
    <div class="group-controls">
        <label for="email">email</label>
        <input type="text" name="email" id="email" value={{old('email')}}>
        <p style="color:red">
            @error('email')
            {{$message}}
            @enderror
        </p>
        </p>
    </div>
    <div class="group-controls">
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <p style="color:red">
            @error('password')
            {{$message}}
            @enderror
        </p>
    </div>
    <div class="group-controls">
        <button>sign in</button>
    </div>
    <div class="group-controls">
    <a href="{{route('create')}}">create a new account</a>
    </div>
    <div class="group-controls" style="color:red;text-align:left">
    @if(session()->has('msg'))
{{session('msg')}}
    @endif
    </div>


</form>
</div>
@endsection