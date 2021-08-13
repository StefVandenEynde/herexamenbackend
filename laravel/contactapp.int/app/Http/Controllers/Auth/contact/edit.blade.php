@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">dashboard - add contact</div>
        </div>
       <br>
       <div class="panel panel-default"> 
           <div class="panel-body">
                <form method="POST" action="{{route('contact.add.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="email">email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <input type="submit" value="Add contact" class="btn btn-privacy">
                </form>
           </div>
       </div>
    </div>
</div>
@endsection
