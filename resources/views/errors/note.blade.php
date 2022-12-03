@if (Session::has('error'))
    <p class="alert alert-danger" style="color: rgb(235, 58, 58)">{{ Session::get('error') }}</p>
@endif