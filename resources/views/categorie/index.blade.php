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

                <form action="{{ route("category.store") }}" method="POST">
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

        <div class="rounded overflow-hidden shadow-lg flex items-center justify-center h-screen w-96 ml-20 ">



            <div class="font-bold text-xl mb-2 h-screen ">Categories</div>

            <div class="px-6 py-4">
                <ul class="list-group">
                @foreach ($categories as $category)
                    <li class="list-group-item h-screen mt-20">



                        @if ($category->children)
                            <ul class="list-group mt-2">
                            @foreach ($category->children as $child)
                                <li class="list-group-item">
                                <div class="px-6 py-4">
                                    {{ $child->name }}

                                    <div class="button-group d-flex">
                                    <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2" data-toggle="modal" data-target="#editCategoryModal" data-id="{{ $child->id }}" data-name="{{ $child->name }}">Edit</button>

                                    <form action="{{ route('category.destroy', $child->idcategorie) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Delete</button>
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

        <div class="w-full p-4 flex justify-center font-sans">
            <div class="card">
                <div class="flex justify-between py-1">
                    <h3>Create Category</h3>
                </div>

                <div class="rounded bg-grey-light w-140 p-2">
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('category.store') }}" method="POST">
                    @csrf


                        <div class="inline-block relative w-64">
                            <select name="parent_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Selectionner la catégorie principale</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->idcategorie }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" name="name" class="bg-white shadow-md rounded px-8 pt-2 pb-4 mt-2 mb-4" value="{{ old('name') }}" placeholder="Category Name" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Créer</button>
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
