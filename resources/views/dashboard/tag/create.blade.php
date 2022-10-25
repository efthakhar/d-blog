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
                        <h5 class="mb-0">add new tag</h5>
                        </div>
                        <div class="card-body">
                        <p class="sm-text">  
                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            </p>


                        <form class="col-md-7" method="post" action="{{url('dashboard/categories')}}"
                                enctype="multipart/form-data"
                        >
                            @csrf
                            <!-- category name -->
                            <div class="mb-3">
                            <label class="form-label" for="category_name">Category Name</label>
                            @error('category_name')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror      
                            <input type="text" class="form-control" id="category_name" 
                                    placeholder="example category..." name="category_name" 
                                    value="{{old('category_name')}}"                   
                            />
                            </div>

                            <!-- category slug -->
                            <div class="mb-3">
                            <label class="form-label" for="category_slug">Category slug</label>
                            @error('category_slug')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror  
                            <input type="text" class="form-control" id="category_slug" 
                                    placeholder="example slug..." name="category_slug"
                                    value="{{old('category_slug')}}"                    
                            />
                            </div>

                            

                            <!-- category image -->
                            <div class="mb-3">
                            <label class="form-label" for="category_img">Category image</label>

                        
                            @if(session('category_img_url'))
                            
                            <img src="{{session('category_img_url')}}" alt="" 
                                style="width:100px;height:80px; margin:10px; display:block">
                            @endif
                            
                            <input type="file" class="form-control" id="category_img" name="category_img" 
                                    value="{{old('category_img')}}"
                            />
                            </div>

                            <!-- category description -->
                            <div class="mb-3">
                            <label class="form-label" for="basic-default-message">category description</label>
                            <textarea name="category_description" class="form-control"
                                placeholder="category about something......" 
                                >{{old('category_description')}}</textarea>
                            </div>



                            <button type="submit" class="btn btn-primary">save category</button>

                        </form>
                        </div>
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

    <div class="buy-now">
      <a
        href=""
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div>

    @includeif('dashboard.partials.script')

  </body>
</html>