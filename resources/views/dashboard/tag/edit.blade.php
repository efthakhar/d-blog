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
                      <h5 class="mb-0">Edit Tag</h5>
                       <a href="{{ route('tag.index') }}" class="btn btn-sm btn-dark">tag list</a>
                    </div>
                    <div class="card-body">
                      <p class="sm-text">  
                          @if(session('tag_update_status'))
                            <div class="alert alert-success">
                                {{ session('tag_update_status') }}
                            </div>
                          @endif
                        </p>


                      <form class="col-md-7" method="post" action="{{route('tag.update',$tag->id)}}" >
                        @csrf
                        @method('PUT')
                        <!-- tag name -->
                        <div class="mb-3">
                          <label class="form-label" for="tag_name">Tag Name</label>
                          @error('tag_name')
                              <p class="alert alert-danger">{{ $message }}</p>
                          @enderror      
                          <input type="text" class="form-control" id="tag_name" 
                                 placeholder="example tag..." name="tag_name" 
                                 value="{{$tag->tag_name}}"                   
                          />
                        </div>

                        <!-- tag slug -->
                        <div class="mb-3">
                          <label class="form-label" for="tag_slug">tag slug</label>
                          @error('tag_slug')
                              <p class="alert alert-danger">{{ $message }}</p>
                          @enderror  
                          <input type="text" class="form-control" id="tag_slug" 
                                 placeholder="example slug..." name="tag_slug"
                                 value="{{$tag->tag_slug}}"                    
                          />
                        </div>                     
  
                        <!-- tag description -->
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-message">tag description</label>
                          <textarea name="tag_description" class="form-control" placeholder="tag about something......" >{{$tag->tag_description}}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">update tag</button>

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