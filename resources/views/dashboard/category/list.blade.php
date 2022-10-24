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

              <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered table-hover table-sm">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>category name</th>
                          <th>slug</th>
                          <th>parent category</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($categories as $cat)
                        <tr>
                          <td><img src="{{$cat->category_img_url}}" alt="" class="table_img"></td>
                          <td>{{$cat->category_name}}</td>
                          <td>{{$cat->category_slug}}</td>
                          <td>{{$cat->category_parent_id}}</td>
                          
                          <td>
                            <div class="dropdown">
                              <button
                                type="button"
                                class="btn btn-primary btn-sm p-1 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown"
                              >options </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                >
                                <a class="dropdown-item" href="javascript:void(0);"
                                  ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                    @if ($categories->links()->paginator->hasPages())
                        <div class="mt-4 p-4 box has-text-centered">
                            {{ $categories->links() }}
                        </div>
                    @endif
                </div>
              </div>
              <!--/ Bordered Table -->

            </div>


            <?php
            //  echo '<pre>';
            //     // var_dump($categories);
            //     echo $categories->links()->paginator->total;
            //  echo '</pre>' ;
            ?>
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