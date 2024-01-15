@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Create Project</h2>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.projects.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="type_id">Type:</label>
                        <select class="form-control" name="type_id" id="type_id">
                            @foreach ( $types as $type )
                                <option value="{{ $type->id }}">
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="image_path">Image path:</label>
                        <input type="text" name="image_path" id="image_path" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="technologies">Tecnologie</label><br>
                        @foreach($technologies as $technology)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="technologies[]" value="{{ $technology->id }}">
                                <label class="form-check-label">{{ $technology->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Create Project</button>
                </form>
            </div>
        </div>
    </div>
@endsection