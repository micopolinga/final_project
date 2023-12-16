@extends('Pages.welcome')

@section('content')
    <h1>
        Create New Dancer
    </h1>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <form action="{{url('/dancer/create')}}" method="POST">
                @csrf
                <div class="form-group mt-2">
                    <label for="full_name">Full Name:</label>
                    <input type="text" name="full_name" id="full_name" placeholder="Enter full name..." class="form-control">
                    @error('full_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="birth_date">BirthDate:</label>
                    <input type="date" name="birth_date" id="birth_date" placeholder="Enter birth_date..." class="form-control">
                    @error('birth_date')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="gender">Gender:</label>

                    <select name="gender" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Gay">Gay</option>
                    </select>
                    @error('gender')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="phone_number">Phone Number:</label>
                    <input type="number" name="phone_number" id="phone_number">
                    @error('phone_number')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                    <input class="btn btn-primary" value="Add Dancer" type="submit">

                </div>
            </form>
        </div>
    </div>
    <style>
        h1{
            text-align: center;
        }
    </style>

@endsection
