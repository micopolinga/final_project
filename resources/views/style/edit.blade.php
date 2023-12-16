@extends('Pages.welcome')

@section('content')
<div class="row">
    <div class="modal fade" id="deleteStyleModal" tabindex="-1" aria-labelledby="deleteStyleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteStyleModalLabel">Delete Style -{{$style->full_name}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('style/delete/' . $style->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        Are you sure you want to delete this style?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete style</button>
                    </div>
                </form>
            </div>
        </div>

    </div>



    <div class="col-md-4 mx-auto" style="border: 1px solid">
        <h1 style="color: black">EDIT STYLE</h1>
        <form action="{{url('/style/'.$style->id)}}" method="POST">
            @csrf
            <div class="form-group mt-2">
                <label for="dancer_id">Select Name</label>
                <label for="dancer_id">Select Name</label>
                <input type="text" name="dancer_name" id="dancer_name" class="form-control" value="{{ $style->dancer->full_name }}" readonly>
                <input type="hidden" name="dancer_id" value="{{ $style->dancer->full_name }}">
                {{-- <label for="dancer_id">Full Name</label>
                <input type="text" name="dancer_name" id="dancer_name" class="form-control" value="{{ $style->dancer->dancer_name }}" readonly>
                <input type="hidden" name="dancer_id" value="{{ $style->dancer_id }}">
                @error('dancer_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror --}}
            </div>
            <div class="form-group mt-2">
                <label for="name">STYLE NAME</label>
                <input type="text" name="name" class="form-control" value="{{$style->name}}">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="descriptopn">Description</label>
                <input type="text" name="description" class="form-control" value="{{$style->description}}" required>
                @error('description')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="origin">Origin</label>
                <input type="text" name="origin" class="form-control" value="{{$style->origin}}" required>
                @error('origin')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                <button class="btn btn-primary">Edit Style</button>
                <button type="button" class="btn btn-danger me-md-2 mt-2" data-bs-toggle="modal" data-bs-target="#deleteStyleModal">
                    Delete Style
                  </button>
            </div>
        </form>
    </div>
</div>



@endsection