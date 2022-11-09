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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

              <!-- Bordered Table -->
              <div class="card">
              
                  <h5 class="card-header">Posts</h5>

                <div class="card-body">
                  <div class="d-flex flex-wrap">
                    
                    <!-- <input name="catfilter"
                     class="form-control form-control-sm filtercatinput mb-2 me-2" type="text" style="width: 200px ;"
                     placeholder="search cetegory.....">
                    
                    <button class="btn btn-sm btn-primary filtercat mb-2"
                    style="width: 90px;"
                    >filter</button> -->
                  </div>
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered table-hover table-sm">
                      <thead>
                        <tr>
                          <th>title</th>
                          <th>categories</th>
                          <th>tags</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($posts as $post)
                        <tr>
                          <td>{{$post->title}}</td>
                          <td>
                            
                            <div class="subcats_cell">
                              @foreach($post->categories as $cat)
                                <button class="btn btn-sm btn-outline-primary">
                                  {{$cat->category_name}}
                                </button>
                              @endforeach 
                              </div> 
                          </td>
                          <td>
                              <div class="subcats_cell">
                                  @foreach($post->tags as $tag)
                                    <button class="btn btn-sm btn-outline-warning">
                                      {{$tag->tag_name}}
                                    </button>
                                  @endforeach 
                              </div> 
                          </td>                        
                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn btn-primary btn-sm p-1 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"
                              >
                                options 
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="/dashboard/posts/{{$post->id}}/edit"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit
                                 </a>
                                <a class="dropdown-item" href="/dashboard/posts/{{$post->id}}">
                                  <i class="bx bx-edit-alt me-1"></i>view
                                 </a>
                                <button class="dropdown-item deleteRecord" data-post-id="{{$post->id}}">
                                  <i class="bx bx-trash me-1 "></i> Delete
                                </button>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                    @if ($posts->links()->paginator->hasPages())
                        <div class="mt-4 p-4 box has-text-centered">
                            {{ $posts->links() }}
                        </div>
                    @endif
                </div>
              </div>
              <!--/ Bordered Table -->

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

    

    @includeif('dashboard.partials.script')
    @vite('resources/assets/js/post.js')
    <!-- {{dd(DB::getQueryLog())}}  -->
  </body>
</html>