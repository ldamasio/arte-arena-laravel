@section('content')
    <div class="container">
        <h1 class="text-3xl font-bold text-center">Welcome to Arte Arena!</h1>
        <p class="text-lg text-center mt-4">Discover a world of art and creativity.</p>

        <div class="flex justify-center mt-8">
            <x-primary-button href="{{ route('dashboard') }}">
                Start Exploring
            </x-primary-button>
        </div>
    </div>
@endsection