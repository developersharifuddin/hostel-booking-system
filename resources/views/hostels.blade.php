<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Include CSRF token in the page header -->

    <title>Booking</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    {{-- @include('layouts.welcomecss') --}}
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body class="antialiased">
    <div class="container-fluid bg-gray-100">
        <div class="row justify-content-end p-4">
            <div class="col-auto">
                @auth
                <div class="d-flex align-items-center">
                    <span class="me-2">Welcome, MR. {{ Auth()->user()->username }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary me-2">Logout</button>
                    </form>
                </div>
                @else
                @if (Route::has('register'))
                <a href="{{ route('user.register') }}" class="btn btn-primary">Register</a>
                @endif
                @endauth

            </div>
        </div>
    </div>



    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Hostel Name: {{ $hostel->name}}{{ $hostel->id}}</div>
                    <div class="card-header">Book a Room</div>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif


                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                    @endif

                    <div class="card-body">


                        <form method="POST" action="{{ route('bookings.store') }}">
                            @csrf
                            @method('POST')

                            <div class="mb-3">
                                <label for="room_type" class="form-label">Room Type:</label>
                                <select id="room_type" name="room_type" class="form-select @error('room_type') is-invalid @enderror">
                                    <option value="single">Single</option>
                                    <option value="double">Double</option>
                                </select>
                                @error('room_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="occupants" class="form-label">Number of Occupants:</label>
                                <input type="number" id="occupants" name="occupants" class="form-control @error('occupants') is-invalid @enderror" min="1" max="4" required>
                                @error('occupants')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="check_in_date" class="form-label">Check-in Date:</label>
                                <input type="date" id="check_in_date" class="form-control @error('check_in_date') is-invalid @enderror" name="check_in_date" required>
                                @error('check_in_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="check_out_date" class="form-label">Check-out Date:</label>
                                <input type="date" id="check_out_date" class="form-control @error('check_out_date') is-invalid @enderror" name="check_out_date" required>
                                @error('check_out_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="hidden" value="{{$hostel->id}}" name="hostel_id" required>


                            <button type="submit" class="btn btn-success">Book Room</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
