@extends('Pages.welcome')
@section('content')

<div class="row">
    <div class="col-md-5 mx-auto" style="border: 1px solid" style="border-radius:10px">
        <h1 style="color: black">CREATE STYLE</h1>

        <form action="{{url('/style/create')}}" method="POST">
            @csrf
            <div class="form-group ">
                <label for="dancer_id">Select Name</label>
                <select name="dancer_id" id="dancer_id" class="form-select" required>
                    <option hidden='true'>Sulect Name</option>
                    <option selected disabled>Select Name</option>
                    @foreach ($dancer as $dancerId => $dancer)
                        <option value="{{$dancerId}}">{{$dancer}}</option>
                    @endforeach
                </select>

                @error('full_name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="name">STYLE NAME</label>
                <input type="text" name="name" class="form-control">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="description">DESCRIPTION</label>
                <input type="text" name="description" class="form-control">
                @error('description')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="origin">ORIGIN</label>
                <input type="text" name="origin" class="form-control">
                @error('origin')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                <button class="btn btn-primary">Add Style</button>
            </div>
        </form>
    </div>
</div>



@endsection
