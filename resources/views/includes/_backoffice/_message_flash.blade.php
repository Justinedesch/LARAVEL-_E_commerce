@if ($message = Session::get('success'))
    <div class="alert alert-success bg-green-600 rounded text-white m-2 flex justify-center items-center p-4">
        <p>{{ $message }}</p>
    </div>
@endif
