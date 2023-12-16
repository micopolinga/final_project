@extends('Pages.welcome')

@section('content')
    <h1>Create New Dancer</h1>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <form action="{{url('/event/create')}}" method="POST">
                @csrf
                <div class="form-group mt-2">
                    <label for="event_name">Event Name:</label>
                    <input type="text" name="event_name" id="event_name" class="form-control">
                    @error('event_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="style_id">Select Style:</label>
                    <select name="style_id" id="style_id" class="form-select" required>
                        <option hidden='true'>Select Style</option>
                        <option selected disabled>Select Style </option>
                        @foreach ($style as $styleId => $style)
                            <option value="{{$styleId}}">{{$style}}</option>
                        @endforeach
                    </select>
                    @error('style_id')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="date">Date:</label>
                    <input type="date" name="date" id="date" class="form-control">
                    @error('date')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="venue">Venue:</label>
                    <input type="text" name="venue" id="venue"  class="form-control">
                    @error('venue')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description" class="form-control">
                    @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                    <input class="btn btn-primary" value="Add Event" type="submit">
                </div>
            </form>
        </div>
    </div>
    <style>
        h1 {
            text-align: center;
        }
    </style>
@endsection
