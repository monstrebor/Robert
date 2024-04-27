@extends('layout.layout')

@section('title','Edit Profile')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('shared.left-sidebar')
            </div>
            <div class="col-6">

                @include('users.shared.user-edit-card')
                <div class="mt-3">

                @include('users.shared.user-card')
                </div>
                <hr>

                @forelse ($ideas as $idea)
                <div class="mt-3">
                    @include('ideas.shared.idea-card')
                </div>
                @empty
                    <p class="text-center my-4">No results found...</p>
                @endforelse

                <div class="mt-3">
                {{ $ideas->withQueryString()->links() }} {{--It makes us a pagination--}}
                </div>

            </div>
            <div class="col-3">
                @include('shared.search-bar')
                @include('shared.follow-box')
            </div>
        </div>
    </div>
@endsection