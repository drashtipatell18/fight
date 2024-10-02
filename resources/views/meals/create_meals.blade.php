@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">
                                {{ isset($meals) ? 'Edit Meals' : 'Add Meals' }}</h3>
                        </div>
                        <hr>
                        <form action="{{ isset($meals) ? '/meals/update/' . $meals->id : '/meals/insert' }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $meals->name ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description">{{ old('description', $meals->description ?? '') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $meals->price ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="">Select Type</option>
                                    <option value="veg" {{ old('type', $meals->type ?? '') == 'veg' ? 'selected' : '' }}>Veg</option>
                                    <option value="non-veg" {{ old('type', $meals->type ?? '') == 'non-veg' ? 'selected' : '' }}>Non-Veg</option>
                                </select>
                            </div>
                            <div class="text-center"> <!-- Added div to center the button -->
                                <button type="submit" class="btn btn-primary">
                                    @if (isset($meals))
                                        Update
                                    @else
                                        Save
                                    @endif
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

