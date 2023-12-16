@extends('Pages.welcome')

@section('content')
    <h1>
        Edit Dancer
    </h1>
    <div class="modal fade" id="deleteDancerModal" tabindex="-1" aria-labelledby="deleteDancerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteDancerModalLabel">Delete Dancer -{{$dancer->full_name}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('dancer/delete/' . $dancer->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        Are you sure you want to delete this dancer?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete User</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


    <div class="row">

        <div class="col-md-4 mx-auto" style="border: 1px solid">
            <h1 style="color: black">EDIT DANCER</h1>
            <form action="{{url('/dancer/'.$dancer->id)}}" method="POST">
                @csrf
                <div class="form-group mt-2">
                    <label for="full_name">Full Name</label>
                    <input type="text" name="full_name" class="form-control" value="{{$dancer->full_name}}" required>
                    @error('full_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="birth_date">BirthDate</label>
                    <input type="text" name="birth_date" class="form-control" value="{{$dancer->birth_date}}">
                    @error('birth_date')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="gender">Gender</label>
                    <input type="text" name="gender" class="form-control" value="{{$dancer->gender}}" required>
                    @error('gender')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="phone_number">PhoneNumber</label>
                    <input type="text" name="phone_number" class="form-control" value="{{$dancer->phone_number}}" required>
                    @error('phone_number')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
    
                <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                    <button class="btn btn-primary">Edit Dancer</button>
                    <button type="button" class="btn btn-danger me-md-2 mt-2" data-bs-toggle="modal" data-bs-target="#deleteDancerModal">
                        Delete Dancer
                      </button>
                </div>
            </form>
        </div>
    </div>
    
    
    
    @endsection