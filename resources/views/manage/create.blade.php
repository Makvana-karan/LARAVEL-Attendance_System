@extends('layout.layout')
@include('layout.css')
@include('layout.script')

@section('title', 'Create')

@section('content')
    <div class="d-flex justify-content-center align-items-center">

        <div class="card card-group flex-column w-25 p-3" style=" margin-top: 10%;">
            <h5 class="mt-2 mb-3">Add Student</h5>


            <form method="post" action="{{ route('student_add') }}">
                @csrf
                @method('post')
                <div class="form-group mb-3 "col-xs-4"">
                    <input
                        class="form-control w-full @error('name')
                is-invalid
                    @enderror"
                        type="text" placeholder="Name" name="name" />
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>

                </div>

                <div class="dropdown ">
                    <select name="grade" class="dropdown-toggle p-2 mb-3 w-8 border" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->grade }}">{{ $grade->grade }}</option>
                        @endforeach

                    </select>
                    <span class="text-danger">
                        @error('grade')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-group mb-3">
                    <input class="form-control  @error('address')
                is-invalid
                    @enderror"
                        type="text" placeholder="Address" name="address" />
                    <span class="text-danger">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                </div>


                <div class="form-group mb-3">
                    <input class="form-control  @error('contact')
                is-invalid
                    @enderror"
                        type="number" placeholder="Contect" name="contact" />
                    <span class="text-danger">
                        @error('contact')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="modal-footer">

                    <input type="submit" class="btn btn-primary" value="Add Student">
                </div>
            </form>
        </div>
    </div>
@endsection
