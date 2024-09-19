<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>
    <style>
        .container {
            margin-top: 30px;
        }

        .form-container {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
    @php
        if (@$note) {
            $url = url('notes/' . $note->id);
        } else {
            $url = url('notes/');
        }
    @endphp
    
    <div class="container">
        
        <div class="row">
            <div class="col-md-8 offset-md-3">
                <div class="form-container">
                    <h2 class="text-center"><b>Note Taking Application Form</b></h2>
                    <form id="noteForm" action="{{ $url }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (@$note)
                            @method('PUT')
                        @endif
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div>
                                    <label for="title" class="form-label">Title<span
                                            style="color: red">*<span></label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ @$note->title ?: old('title') }}" required>
                                    @error('title')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div>
                                    <label for="description" class="form-label">Description<span
                                            style="color: red">*<span></label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="10" required>{{@$note->description ?: old('description')}}</textarea>
                                    @error('description')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div>
                                    <label for="color" class="form-label">Color<span
                                            style="color: red">*<span></label>
                                    <input type="color" class="form-control" id="color" name="color"
                                        value="{{ @$note->color ?: old('color') }}" required>
                                    @error('color')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
