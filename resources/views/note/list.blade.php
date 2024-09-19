<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>
    <div class="container mt-4">
        <a href="{{ url('notes/create') }}" class="btn btn-primary mb-3">Create New note</a>
        
        @if(session()->has('message'))
        <div class="alert alert-success alert-border-left alert-dismissible fade show" role="alert">
            <i class="ri-notification-off-line me-3 align-middle fs-16"></i>
{{ session()->get('message') }}
</div>
@endif
        <table id="notesTable" class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Color</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($notes))
                @foreach ($notes as $note)
                    <tr>
                        <td>{{ Str::limit($note->title,20) }}</td>
                        <td>{{ Str::limit($note->description,20) }}</td>
                        <td  style="background-color: {{ $note->color }};"></td>
                        <td>
                            <a href="{{ url('notes/'.$note->id.'/edit') }}" class="btn btn-warning btn-sm ">Edit</a>
                            <a class="btn btn-danger btn-sm deleteBtn" data-url="{{ url('notes', $note->id) }}" data-id="{{$note->id}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>