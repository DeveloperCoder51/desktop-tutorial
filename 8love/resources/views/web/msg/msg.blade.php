{{-- @if (session('success'))
<div class="alert alert-success" id="success-alert">
    {{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger" id="error-alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        setTimeout(() => {
            let successAlert = document.getElementById('success-alert');
            if (successAlert) {
                successAlert.style.display = 'none';
            }
            let errorAlert = document.getElementById('error-alert');
            if (errorAlert) {
                errorAlert.style.display = 'none';
            }
        }, 2000); // Hide after 2 seconds
    });
</script> --}}
<script src="{{ asset('admin/izitoast/izitoast/js/iziToast.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('admin/izitoast/izitoast/css/iziToast.min.css') }}">
@if (session()->has('success'))
    <script>
        iziToast.success({
            title: "{{ session()->get('success') }}",
            message: "",
            position: "topRight",
            icon: 'fa fa-check',
        });
    </script>
@endif

@if (session()->has('error'))
    <script>
        iziToast.error({
            title: "{{ session()->get('error') }}",
            message: "",
            position: "topRight",
        });
    </script>
@endif
