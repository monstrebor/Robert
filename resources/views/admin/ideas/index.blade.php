@extends('layout.layout')
@section('title','Ideas | Admin Dashboard')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('admin.shared.left-sidebar')
            </div>
            <div class="col-9">
                <h1>Ideas</h1>

                <table class="table table-striped mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th class="col-1">ID</th>
                            <th class="col-1">User</th>
                            <th>Content</th>
                            <th class="col-2">Created At</th>
                            <th class="col-1">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ideas as $idea)
                        <tr>
                            <td>{{ $idea->id }}</td>
                            <td>
                                <a href="{{ route('users.show',$idea->user) }}">{{ $idea->user->name }}</a>
                            </td>
                            <td>{{ $idea->content }}</td>
                            <td>{{ $idea->created_at->toDateString() }}</td>
                            <td>
                                <a href="{{ route('ideas.show', $idea) }}">view</a>
                                <a href="{{ route('ideas.edit', $idea) }}">edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $ideas->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
