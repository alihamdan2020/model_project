@extends('admin.layout')
@section('title','dashboard')

@section('content')
@include('admin.header')



<div style="width:80vw;margin:20px auto">
    <div style="display:flex;flex-direction:column;gap:15px;">
        <p>Your name: {{ $user->name}}</p>
        <p>Your role: {{ $user->role == 1 ? 'Admin (Can Delete)' : 'User (Read-Only)'}}</p>
        <p style="color:{{session('color')}};text-transform:capitalize">
            {{session('confirmation')}}
        </p>
    </div>
    <div class="admin-container">


        @if(isset($msg) && $msg=='categories')
        @include('admin.categoryTable')
        @include('admin.addCategory')
        @else
        @if(isset($msg) && $msg=='products')
        @include('admin.productsTable')
        @include('admin.addProduct')
        @endif
        @endif
    </div>

</div>
@endsection