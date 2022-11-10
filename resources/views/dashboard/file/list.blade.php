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
            <div class="table-responsive text-nowrap">
                    <h4>Files</h4>
                    <table class="table table-bordered table-hover table-sm">
                      <thead>
                        <tr>
                          <th>preview</th>
                          <th>name</th>
                          <th>type</th>
                          <th>size</th>
                          <th>actions</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($files as $file)
                        <tr>
                          <td>
                            <img src="/storage/{{$file->file_path}}" style="width:90px;height:80px">
                          </td>
                          <td>{{$file->file_name}}</td>
                          <td>{{$file->file_type}}</td>
                          <td>{{$file->size}} byte</td>
                          <td>
                            <a href="/files/delete/{{$file->id}}" class="btn btn-sm btn-danger">
                                delete
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    @if ($files->links()->paginator->hasPages())
                        <div class="mt-4 p-4 box has-text-centered">
                            {{ $files->links() }}
                        </div>
                    @endif
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

    

    @includeif('dashboard.partials.script')

  </body>
</html>