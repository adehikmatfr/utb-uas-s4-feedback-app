@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dasbor Admin') }}</div>

                <div class="card-body">
                    <div class="mb-4">
                        <h4>Total Feedback: {{ $totalFeedback }}</h4>
                    </div>
                    <div class="mb-4">
                        <h4>Rata-rata Rating: {{ number_format($averageRating, 1) }}</h4>
                    </div>
                    <div class="mb-4">
                        <h4>Feedback Terbaru:</h4>
                        <ul class="list-group">
                            @foreach($feedbacks as $index => $feedback)
                                <li class="list-group-item">
                                    {{ $index + 1 }}. {{ $feedback->customer_name }} ({{ $feedback->rating }}) - {{ $feedback->feedback_text }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <a class="btn btn-success" href="{{ route('feedbacks.index') }}">Lihat Semua Feedback</a>
                </div>
            </div>
        </div>

        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">{{ __('Submit Feedback') }}</div>

                <div class="card-body">
                    <p>Click the link below to submit feedback:</p>
                    <p>
                        <a href="{{ route('feedback.create.with.token', ['token' => $userId]) }}" id="feedback-link">
                            {{ route('feedback.create.with.token', ['token' => $userId]) }}
                        </a>
                    </p>
                    <button onclick="copyToClipboard()" class="btn btn-primary">Copy Feedback Link</button>
                    <button onclick="redirectToFeedback()" class="btn btn-success">Go to Feedback Form</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function copyToClipboard() {
    var copyText = document.getElementById("feedback-link").href;
    navigator.clipboard.writeText(copyText).then(function() {
        alert("Feedback link copied to clipboard");
    }, function(err) {
        alert("Failed to copy feedback link: ", err);
    });
}

function redirectToFeedback() {
    window.location.href = document.getElementById("feedback-link").href;
}
</script>
@endsection
