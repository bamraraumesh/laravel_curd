@extends('layout.master')
<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
@section('title', 'Display Result')
<div>
   
    @section('content')
        <section id="displaydata" class="d-flex align-items-center">
            <table style="width:100%">

                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <!-- <th>single record</th> -->
                </tr>

                @if(isset($contacts))
                    @foreach($contacts as $contacted)
                        <tr>
                            <td>{{$contacted->id }}</td>
                            <td>{{$contacted->name }}</td>
                            <td>{{$contacted->email }}</td>
                            <td>{{$contacted->subject}}</td>
                            <td>{{$contacted->message}}</td>
                           
                           
                <td><a href="{{ route('contacts.edit', $contacted->id) }}">Edit</a></td>
                <td>
                    <form method="POST" action="{{ route('display.destroy', $contacted->id) }}">
                        @csrf
                        @method('DELETE')   
                        <button type="submit">Delete</button>
                    </form>
                </td>

                        </tr>
                    @endforeach
                @elseif(isset($contact))
                    <tr>
                        <td>{{$contact->id }}</td>
                        <td>{{$contact->name }}</td>
                        <td>{{$contact->email }}</td>
                        <td>{{$contact->subject}}</td>
                        <td>{{$contact->message}}</td>
                        <td><a>Delete</a></td>
                    </tr>
                @endif

            </table>
        </section>
    @endsection
</div>
<div>
        <a href="{{route('contact.store')}}"></a>
    </div>