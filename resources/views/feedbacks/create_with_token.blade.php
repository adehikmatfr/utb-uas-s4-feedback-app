@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Feedback') }}</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('feedback.store.with.token') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="customer_name" class="col-md-4 col-form-label text-md-end">{{ __('Customer Name') }}</label>

                            <div class="col-md-6">
                                <input id="customer_name" type="text" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name" value="{{ old('customer_name') }}" required autocomplete="customer_name" autofocus>

                                @error('customer_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="feedback_text" class="col-md-4 col-form-label text-md-end">{{ __('Feedback Text') }}</label>

                            <div class="col-md-6">
                                <textarea id="feedback_text" class="form-control @error('feedback_text') is-invalid @enderror" name="feedback_text" required>{{ old('feedback_text') }}</textarea>

                                @error('feedback_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rating" class="col-md-4 col-form-label text-md-end">{{ __('Rating') }}</label>

                            <div class="col-md-6">
                                <input id="rating" type="number" class="form-control @error('rating') is-invalid @enderror" name="rating" value="{{ old('rating') }}" required min="1" max="5">

                                @error('rating')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Feedback') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
