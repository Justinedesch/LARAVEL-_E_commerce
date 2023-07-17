@if ($message = Session::get('success'))
    <div class="alert alert-success bg-green-600 rounded text-white m-2 flex justify-center items-center p-4">
        <p>{{ $message }}</p>
    </div>
@endif

@if ($message = Session::get('danger'))
    <div class="alert alert-danger bg-red-600 rounded text-white m-2 flex justify-center items-center p-4">
        <p>{{ $message }}</p>
    </div>
@endif
