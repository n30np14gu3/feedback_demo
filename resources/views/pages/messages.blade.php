@extends('index')

@section('page-title', 'FEEDBACK DEMO :: Messages')
@section('messages-list-active', 'active')

@section('page-content')
    <div class="ui  fluid container">
        <div class="ui segment">
            <table class="ui mini celled green stacked table selectable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Topic</th>
                    <th>View</th>
                </tr>
                </thead>
                <tbody>
                @foreach(@$messages as $m)
                    <tr>
                        <td>{{@$m->id}}</td>
                        <td>{{@$m->message_name}}</td>
                        <td>{{@$m->message_topic}}</td>
                        <td><a class="ui positive fluid button" href="{{url("/messages/$m->id")}}" target="_blank">View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
