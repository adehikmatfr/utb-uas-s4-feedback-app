@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Feedback List</h2>
            <a class="btn btn-success mb-2" href="{{ route('feedbacks.create') }}">Create New Feedback</a>
            <a class="btn btn-primary mb-2" href="{{ route('feedbacks.pdf') }}">Print PDF</a>
            <form action="{{ route('feedbacks.index') }}" method="GET" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Customer Name</th>
            <th>Feedback Date</th>
            <th>Feedback Text</th>
            <th>Rating</th>
            <th width="280px">Action</th>
        </tr>
        @php $i = 0; @endphp
        @foreach ($feedbacks as $feedback)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $feedback->customer_name }}</td>
            <td>{{ $feedback->feedback_date }}</td>
            <td>{{ $feedback->feedback_text }}</td>
            <td>{{ $feedback->rating }}</td>
            <td>
                <form action="{{ route('feedbacks.destroy', $feedback->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('feedbacks.show', $feedback->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('feedbacks.edit', $feedback->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
