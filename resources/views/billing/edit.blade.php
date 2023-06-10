@extends('layouts.app')

@section('title')
    Edit Billing
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-12 col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Billing</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('billing.update', $billing->id) }}" id="createForm" method="POST">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label>Client Name*</label>
                            <select name="client_id" class="form-control select2">
                                <option value="">-- Please Choose --</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" @if (old('client_id', $billing->client_id) == $client->id) selected @endif>
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Amount</label>
                            <input type="number" class="form-control" name="amount"
                                value="{{ old('amount', $billing->amount) }}" placeholder="Eg@15000">
                        </div>

                        <div class="mb-3">
                            <label>Due date</label>
                            <input type="text" class="form-control due-date" name="due_date" placeholder=""
                                value="{{ old('due_date', Carbon\Carbon::parse($billing->due_date)->format('d.m.Y')) }}">
                        </div>

                        <div class="mb-4">
                            <label>Description</label>
                            <textarea name="description" class="form-control" cols="30" rows="10">{{ old('description', $billing->description) }}</textarea>
                        </div>


                        <div>
                            <a href="{{ route('billing.index') }}" class="btn btn-danger mr-2">Cancel</a>
                            <button class="btn btn-primary px-4">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\StoreBillingRequest', '#createForm') !!}
    <script>
        $(".due-date").flatpickr({
            dateFormat: "d.m.Y",
        });
    </script>
@endsection
