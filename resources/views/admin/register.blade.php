@extends('admin.layout')

@section('title','index admin page')

@section('content')
<h1>this is the signup page</h1>
<h2 style="text-align: center;">
    <a href="/"><i class="fa-solid fa-house"></i></a>
</h2>

<div class="form">
<form action="{{route('register')}}" method="POST">
    @csrf
    <div class="group-controls">
        <label for="email">name</label>
        <input type="text" name="name" id="name" value="{{old ('name')}}">
        <p style="color:red">
            @error('name')
            {{$message}}
            @enderror
        </p>
    </div>
    <div class="group-controls">
        <label for="email">email</label>
        <input type="text" name="email" id="email" value="{{old ('email')}}">
        <p style="color:red">
            @error('email')
            {{$message}}
            @enderror
        </p>
    </div>
    <div class="group-controls">
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <!-- old value not working in password -->
        <p style="color:red">
            @error('password')
            {{$message}}
            @enderror
        </p>
    </div>
    <div class="group-controls">
        <label for="role">role</label>
        <input type="checkbox" name="role" id="role" checked>
    </div>
    
    <div class="group-controls">
        <button>sign up</button>
    </div>
</form>
<p>
@if(session()->has('msg'))
        {{session('msg')}}
    @endif

</p>
</div>
@endsection