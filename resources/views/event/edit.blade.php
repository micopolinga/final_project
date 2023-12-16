@extends('Pages.welcome')

@section('content')
<div class="row">
    <div class="modal fade" id="deleteEventModal" tabindex="-1" aria-labelledby="deleteEventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteEventModalLabel">Delete Event -{{$event->name}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('event/delete/' . $event->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        Are you sure you want to delete this event?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete Event</button>
                    </div>
                </form>
            </div>
        </div>

    </div>



    <div class="col-md-4 mx-auto" style="border: 1px solid">
        <h1 style="color: black">EDIT EVENT</h1>
        <form action="{{url('/event/'.$event->id)}}" method="POST">
            @csrf
            <div class="form-group mt-2">
                <label for="style_id">StyleID</label>
                <input type="text" name="style_id" class="form-control" value="{{$event->style_id}}" required>
                @error('style_id')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="event_name">Event Name</label>
                <input type="text" name="event_name" class="form-control" value="{{$event->event_name}}">
                @error('event_name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="date">Date</label>
                <input type="date" name="date" class="form-control" value="{{$event->date}}" required>
                @error('date')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="venue">Venue</label>
                <input type="text" name="venue" class="form-control" value="{{$event->venue}}" required>
                @error('venue')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" value="{{$event->description}}" required>
                @error('description')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                <button class="btn btn-primary">Edit EVENT</button>
                <button type="button" class="btn btn-danger me-md-2 mt-2" data-bs-toggle="modal" data-bs-target="#deleteEventModal">
                    Delete Dancer
                  </button>
            </div>
        </form>
    </div>
</div>



@endsection
