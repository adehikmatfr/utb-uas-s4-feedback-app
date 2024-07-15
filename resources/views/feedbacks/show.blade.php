@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Feedback Details') }}</div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>{{ __('Customer Name') }}:</strong>
                        {{ $feedback->customer_name }}
                    </div>
                    <div class="mb-3">
                        <strong>{{ __('Feedback Date') }}:</strong>
                        {{ $feedback->feedback_date }}
                    </div>
                    <div class="mb-3">
                        <strong>{{ __('Feedback Text') }}:</strong>
                        {{ $feedback->feedback_text }}
                    </div>
                    <div class="mb-3">
                        <strong>{{ __('Rating') }}:</strong>
                        {{ $feedback->rating }}
                    </div>
                    <a class="btn btn-primary" href="{{ route('feedbacks.index') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
