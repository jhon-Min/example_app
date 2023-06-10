@extends('layouts.app')

@section('title')
    Create Client
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h4>Add Client</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('clients.store') }}" id="createForm" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Name*</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                placeholder="Eg@Mg Mg">
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                placeholder="Eg@mgmg@gmail.com">
                        </div>

                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="number" class="form-control" name="phone" value="{{ old('phone') }}"
                                placeholder="Eg@09421711078">
                        </div>

                        <div class="mb-4">
                            <label>Address</label>
                            <textarea name="address" class="form-control" cols="30" rows="10">{{ old('address') }}</textarea>
                        </div>


                        <div>
                            <a href="{{ route('clients.index') }}" class="btn btn-danger mr-2">Cancel</a>
                            <button class="btn btn-primary px-4">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\StoreClientRequest', '#createForm') !!}
@endsection
