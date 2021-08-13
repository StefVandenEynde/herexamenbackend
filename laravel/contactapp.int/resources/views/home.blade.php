@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">dashboard - add contact</div>
        </div>
        @if(count($contacts))
            <div class="panel panel-default">
                <table class="table table-hover">
                    <tr>
                        <th>name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td><a href="{{route('contact.edit',['id' ->$contact id])}}">edit </a>/ <a href="{{route('contact.delete',['id' ->$contact id])}}">delete</a></td>
                    </tr>
                @endforeach
                </table>
            </div>
            {{$contacts->links()}}
        @else
        <br />
        <div class="alert alert-warning" role="alert">
            <p>No Contacts found</p>
        </div>
        @endif
    </div>
</div>
@endsection
