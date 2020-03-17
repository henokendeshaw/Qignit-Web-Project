
@extends('layouts.head')


    

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>sign up</h1>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
                
            @endforeach

        
        </div>    
        @endif
        
        <form action="{{ route('signup') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit">signup</button>
        </form>
    </div>
</div>
