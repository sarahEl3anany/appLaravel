@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('layout.Dashboard') }}</div>

                <div class="card-body">
{{--                    {{$users}}--}}
                    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">{{__('user.createUser')}}</a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>{{__('auth.name')}}</th>
                            <th>{{__('auth.email')}}</th>
                            <th>{{__('auth.phone')}}</th>
                            <th>{{__('auth.userPrivilege')}}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->fullname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->userPrivilege }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">{{__('layout.edit')}}</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            {{__('layout.delete')}}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('layout.loggedIn') }}--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
