<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard</title>

    <meta name="description" content="" />

    @includeif('dashboard.partials.style')
    
  </head>

  <body>
    <!-- Layout wrapper -->

    <div class="layout-wrapper layout-content-navbar">

      <div class="layout-container">

        @includeif('dashboard.partials.sidebar')

        <!-- Layout container -->
        <div class="layout-page">

          @includeif('dashboard.partials.header')

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">

                    <div class="col-xl">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">add new post</h5>
                            </div>
                            <div class="card-body">
                                <p class="sm-text">  
                                    @if(session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                </p>

                                <form class="col-md-7" method="post" action="{{url('dashboard/posts')}}"
                                enctype="multipart/form-data" >
                                    @csrf

                                    <!-- post date -->
                                    <div class="mb-3">
                                        <label class="form-label" for="title">date</label>
                                        @error('date')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror      
                                        <input type="date" class="form-control" id="date" 
                                                name="date" value="{{old('date')}}"                   
                                        />
                                    </div>

                                    <!-- post title -->
                                    <div class="mb-3">
                                        <label class="form-label" for="title">title</label>
                                        @error('title')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror      
                                        <input type="text" class="form-control" id="title" 
                                                placeholder="example title..." name="title" 
                                                value="{{old('title')}}"                   
                                        />
                                    </div>

                                    <!-- post slug -->
                                    <div class="mb-3">
                                        <label class="form-label" for="slug">slug</label>
                                        @error('slug')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror  
                                        <input type="text" class="form-control" id="slug" 
                                                placeholder="example slug..." name="slug"
                                                value="{{old('slug')}}"                    
                                        />
                                    </div>

                                    <!-- Post image -->
                                    <div class="mb-3">
                                      <label class="form-label" for="post_thumbnail">Post Thumbnail</label>
                                  
                                      @if(session('post_thumbnail_url'))                  
                                      <img src="{{session('post_thumbnail_url')}}" alt="" 
                                        style="width:100px;height:80px; margin:10px; display:block">
                                      @endif
                                    
                                      <input type="file"
                                       class="form-control" id="post_thumbnail"     name="post_thumbnail" value="post_thumbnail"
                                      />
                                    </div>

                                    <!-- meta tag keywords -->
                                    <div class="mb-3">
                                        <label class="form-label" for="meta_keywords">Keywords ( seo meta keywords )</label>
                                        @error('meta_keywords')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror  
                                        <input type="text" class="form-control" id="meta_keywords" 
                                                placeholder="keywords...." name="meta_keywords"
                                                value="{{old('meta_keywords')}}"                    
                                        />
                                    </div>

                                    <!-- meta tag description -->
                                    <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">meta description ( seo  meta tag )</label>
                                    <textarea name="meta_description" class="form-control" placeholder="write short description of this post......" 
                                    >{{old('meta_description')}}</textarea>
                                    </div>


                                    <!-- post excerpt -->
                                    <div class="mb-3">
                                        <label class="form-label" for="excerpt">Excerpt</label>
                                        @error('excerpt')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                        @enderror  
                                        <textarea name="excerpt" class="form-control" placeholder="excerpt of this post......" 
                                        >{{old('excerpt')}}</textarea>
                                    </div>

                                    <!-- Post Content -->
                                    <div class="mb-3">
                                      <label class="form-label" for="excerpt">Content</label>
                                      <textarea id="editor" name="content" class="description form-control"></textarea>
                                    </div>

                                    <div class="mb-3">
                                      <input type="checkbox" name="featured" class="form" id="featured"> 
                                      <label for="featured"> is featured ?</label>
                                    </div>
                                    <div class="mb-3">
                                      <input type="checkbox" name="breaking" class="form" id="breaking"> 
                                      <label for="breaking"> is breaking ?</label>
                                    </div>


                                    <button type="submit" class="btn btn-primary mt-3">save post</button>

                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!-- / Content -->

            @includeif('dashboard.partials.footer')

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->


      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
      
    </div>
    <!-- / Layout wrapper -->
   
    
    @includeif( 'dashboard.partials.script')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
            ClassicEditor
            .create( document.querySelector( '#editor' ),{
                ckfinder: {
                            uploadUrl: "{{route('file.store').'?_token='.csrf_token()}}",
                          }
            })
            .catch( error => {
                console.error( error );
            });
    </script>
  


  </body>
</html>