@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{__('user.createUser')}}</h1>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{__('auth.name')}}</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">{{__('auth.email')}}</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">{{__('auth.phone')}}</label>
                <input type="phone" name="phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="userPrivilege" class="form-label">{{__('auth.userPrivilege')}}</label>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="userPrivilege" id="userPrivilege1" value="1">
                        <label class="form-check-label" for="userPrivilege1">
                            {{ __('auth.sysAdmin') }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="userPrivilege" id="userPrivilege2" checked value="0">
                        <label class="form-check-label" for="userPrivilege2">
                            {{ __('auth.user') }}
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{__('user.createUser')}}</button>
        </form>
    </div>
@endsection
