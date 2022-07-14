@extends('admin')
@section('head')
    <style>
        .tox .tox-notification--warn,
        .tox .tox-notification--warning {
            display: none !important;
        }

        .feature_img_preview img {
            max-width: 300px;
            width: 100%;
            object-fit: contain;
        }
    </style>
@endsection
@section('content')
    <div class="row mt-4">

        <div class="card">
            <div class="card-body pt-0">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="message">

                </div>
                <h4 class="my-3">Add Blog:</h4>
                <form id="blog_form" action="{{ route('blog.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control js-blog-title" placeholder="Blog Title"
                                value="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" placeholder="Blog Meta Title"
                                value="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Meta Description</label>
                            <input type="text" name="meta_description" class="form-control"
                                placeholder="Blog Meta Description" value="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Slug</label>
                            <input type="text" name="slug" readonly class="form-control js-blog-slug"
                                placeholder="Blog Slug" value="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Location Address"
                                value="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Rating</label>
                            <input type="number" min="0" max="5" name="rating"
                                class="form-control js-blog-slug" placeholder="Rating 0 - 5" value="" required>
                        </div>
                        <div class="col-md-6 mb-3 ">
                            <label for="" class="form-label">Plot Size</label>
                            <select name="plot_size" class="form-control pointer" required >
                                <option value="1 marla" selected>1 Marla</option>
                                <option value="10 marla" >10 Marla</option>
                                <option value="1 kanal" >1 kanal</option>
                            </select>

                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Language</label>
                            <select name="lang_key" class="form-control">
                                @foreach (config('constants.languages') as $key => $value)
                                    <option value="{{ $value }}">{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Parent</label>
                            <select name="parent_id" class="form-control">
                                <option value="0" selected>This is parent</option>
                                @if ($parents->count() > 0)
                                    @foreach ($parents as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="blog" class="form-labeliiii">Status</label>
                            <select class="form-select" id="" name="pinch">
                                <option selected disabled>Add To Pinch</option>
                                <option value="1" selected>True</option>
                                <option value="0">False</option>
                            </select>
                        </div>

                        <div class=" col-md-12 mb-3">
                            <label for="contact" class="form-label">Detail</label>
                            <input class="form-control tool_textarea" name="blog_detail" id="blog_textarea" />
                        </div>
                        <div id="inputImgPreview" class="d-flex flex-wrap justify-evenly border-2"></div>
                        <div class="w-100 mb-3">
                            <label for="multipleImages" class="form-label">Choose Multiple Images</label>
                            <input class="form-control" name="property_images[]" type="file"
                                accept="image/png, image/jpg, image/jpeg" multiple id="multipleImages" required>
                        </div>
                    </div>

                    <div style="text-align: right">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            Submit
                        </button>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div>
    </div>
    <!-- Full width modal content -->

    <!-- /.modal -->
@endsection
@section('script')
    {{-- TINYMCE SCRIPT --}}
    <script defer src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script defer src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/jquery.tinymce.min.js" referrerpolicy="origin">
    </script>
    {{-- TINYMCE SCRIPT END --}}
    <script src="{{ asset('web_assets/admin/js/tinymce-script.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".js-blog-title").on("keydown input change", function() {
                let slug = $(this)
                    .val()
                    .replace(/[^a-zA-Z0-9\s]/gi, '')
                    .replace(/[_\s]/g, '-')
                    .toLowerCase();
                $(".js-blog-slug").val(slug);
            });
        });
    </script>
    <script src="{{ asset('web_assets/admin/js/admin-custom.js') }}"></script>
@endsection
