<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des catégories') }} &#128202;
        </h2>
    </x-slot>

    @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Success!</h4>
                <p>{{ Session::get('success') }}</p>

                <button type="button" class="close" data-dismiss="alert aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif

        @if (Session::has('errors'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Error!</h4>
                <p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </p>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="w-full p-4 flex justify-center font-sans" tabindex="-1" role="dialog" id="editCategoryModal">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <form action="" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="form-group">
                    <input type="text" name="name" class="form-control" value="" placeholder="Category Name" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </div>
                </form>
            </div>
        </div>

        <div class="row">
        <div class="w-full p-4 flex justify-center font-sans">

            <div class="card">
            <div class="card-header">
                <h3>Categories</h3>
            </div>
            <div class="card-body">
                <ul class="list-group">
                @foreach ($categories as $category)
                    <li class="list-group-item">
                    <div class="d-flex justify-content-between">
                        {{ $category->name }}

                        <div class="button-group d-flex">
                        <button type="button" class="btn btn-sm btn-primary mr-1 edit-category" data-toggle="modal" data-target="#editCategoryModal" data-id="{{ $category->id }}" data-name="{{ $category->name }}">Edit</button>

                        <form action="{{ route('category.destroy', $category->idcategorie) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        </div>
                    </div>

                    @if ($category->children)
                        <ul class="list-group mt-2">
                        @foreach ($category->children as $child)
                            <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                {{ $child->name }}

                                <div class="button-group d-flex">
                                <button type="button" class="btn btn-sm btn-primary mr-1 edit-category" data-toggle="modal" data-target="#editCategoryModal" data-id="{{ $child->id }}" data-name="{{ $child->name }}">Edit</button>

                                <form action="{{ route('category.destroy', $child->idcategorie) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                </div>
                            </div>
                            </li>
                        @endforeach
                        </ul>
                    @endif
                    </li>
                @endforeach
                </ul>
            </div>
            </div>
        </div>

        <div class="w-full p-4 flex justify-center font-sans">
            <div class="card">
                <div class="flex justify-between py-1">
                    <h3>Create Category</h3>
                </div>

                <div class="rounded bg-grey-light w-140 p-2">
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('category.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <select class="w-full border bg-white rounded px-3 py-2 outline-none text-gray-700" name="parent_id">
                        <option value="">Select Parent Category</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->idcategorie }}">{{ $category->name }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" name="name" class="bg-white shadow-md rounded px-8 pt-2 pb-4 mb-4" value="{{ old('name') }}" placeholder="Category Name" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>

        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

                <script type="text/javascript">
                    $('.edit-category').on('click', function() {
                    var id = $(this).data('idcategorie');
                    var name = $(this).data('name');
                    var url = "{{ url('category') }}/" + idcategorie;

                    $('#editCategoryModal form').attr('action', url);
                    $('#editCategoryModal form input[name="name"]').val(name);
                    });
        </script>

</x-app-layout>
