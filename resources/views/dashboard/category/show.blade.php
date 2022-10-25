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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                      <h5 class="mb-0">category details</h5>
                       <a href="{{ route('category.index') }}" class="btn btn-sm btn-dark">category list</a>
                    </div>
                    <div class="card-body">
                     

                      <form class="col-md-7" 
                      >
                      
                        <!-- category name -->
                        <div class="mb-3">
                          <label class="form-label" for="category_name">Category Name</label>     
                          <input disabled type="text" class="form-control" id="category_name" 
                                 placeholder="example category..." name="category_name" 
                                 value="{{$category->category_name}}"                   
                          />
                        </div>

                        <!-- category slug -->
                        <div class="mb-3">
                          <label class="form-label" for="category_slug">Category slug</label>
                          <input disabled type="text" class="form-control" id="category_slug" 
                                 placeholder="example slug..." name="category_slug"
                                 value="{{$category->category_slug}}"                    
                          />
                        </div>

                        <!-- parent category -->
                        <div class="mb-3">
                          <label class="form-label" >parent category</label>
                          <input disabled type="text" class="form-control" 
                           value="{{$category->parentcat ? $category->parentcat->category_name:''}}"                    
                          />
                        </div>

                        <!-- category image -->
                        <div class="mb-3">
                          <label class="form-label" for="category_img">Category image</label>
                          @if($category->category_img_url)
                          <img src="{{$category->category_img_url}}" alt="" 
                            style="width:120px;height:80px; margin:10px 0; display:block; border-radius:3px ">
                          @endif
                        </div>

                        <!-- category description -->
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-message">category description</label>
                          <textarea disabled name="category_description" class="form-control"
                          >{{$category->category_description}}</textarea>
                        </div>

                        <!-- <button type="submit" class="btn btn-primary">update category</button> -->

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