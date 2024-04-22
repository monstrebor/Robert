@auth
<h4> Hey {{ Auth::user()->name }} share your ideas</h4>
<div class="row">
    <form action="{{ route('ideas.store') }}" method="POST"> {{-- Use the name you give in the web route--}}
        @csrf {{--  to prevent csrf attacks --}}
        <div class="mb-3">
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            @error('content')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
@endauth
@guest
    <h1 class="text-center">LOG IN TO SHARE YOUR IDEAS</h1>
@endguest

