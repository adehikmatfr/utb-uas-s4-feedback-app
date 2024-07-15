@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Feedback List</h2>
            <a class="btn btn-success mb-2" href="{{ route('feedbacks.create') }}">Create New Feedback</a>
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
