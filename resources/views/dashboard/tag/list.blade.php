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
              
                  <h5 class="card-header">Tags</h5>
                
                <div class="card-body">
                  <div class="d-flex flex-wrap">
                    
                    <input name="tagfilter"
                     class="form-control form-control-sm filtertaginput mb-2 me-2" type="text" style="width: 200px ;"
                     placeholder="search tag.....">
                    
                    <button class="btn btn-sm btn-primary filtertag mb-2" style="width: 90px;">filter</button>

                  </div>
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered table-hover table-sm">
                      <thead>
                        <tr>
                          <th>tag name</th>
                          <th>slug</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($tags as $tag)
                        <tr>
                         
                          <td>{{$tag->tag_name}}</td>
                          <td>{{$tag->tag_slug}}</td>
                          <td>
                            <div class="dropdown">
                              <button
                                type="button"
                                class="btn btn-primary btn-sm p-1 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown"
                              >options </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="/dashboard/tags/{{$tag->id}}/edit"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit
                                 </a>
                                <a class="dropdown-item" href="/dashboard/tags/{{$tag->id}}">
                                  <i class="bx bx-edit-alt me-1"></i>view
                                 </a>
                                <button class="dropdown-item deleteRecord" data-tag_id="{{$tag->id}}">
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
                    @if ($tags->links()->paginator->hasPages())
                        <div class="mt-4 p-4 box has-text-centered">
                            {{ $tags->links() }}
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

    <div class="buy-now">
      <a
        href=""
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div>

    @includeif('dashboard.partials.script')
    @vite('resources/assets/js/tag.js')
  </body>
</html>