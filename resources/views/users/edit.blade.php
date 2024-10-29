@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{__('user.editUser')}}</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">{{__('auth.name')}}</label>
                <input type="text" name="fullname" class="form-control" value="{{ $user->fullname }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">{{__('auth.email')}}</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">{{__('auth.phone')}}</label>
                <input type="tel" name="phone" class="form-control" value="{{ $user->phone }}" required>
            </div>
            <div class="mb-3">
                <label for="userPrivilege" class="form-label">{{__('auth.userPrivilege')}}</label>
                <div class="col-md-6">
                    <div class="form-check">
                        @if ($user->userPrivilege==1)
                        <input class="form-check-input" type="radio" name="userPrivilege" id="userPrivilege1" checked value="1">
                        @else
                        <input class="form-check-input" type="radio" name="userPrivilege" id="userPrivilege1" value="1">
                        @endif
                        <label class="form-check-label" for="userPrivilege1">
                            {{ __('auth.sysAdmin') }}
                        </label>
                    </div>
                    <div class="form-check">
                        @if ($user->userPrivilege==0)
                        <input class="form-check-input" type="radio" name="userPrivilege" id="userPrivilege2" checked value="0">
                        @else
                        <input class="form-check-input" type="radio" name="userPrivilege" id="userPrivilege2" value="0">
                        @endif
                        <label class="form-check-label" for="userPrivilege2">
                            {{ __('auth.user') }}
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{__('user.updateUser')}}</button>
        </form>
    </div>
@endsection
