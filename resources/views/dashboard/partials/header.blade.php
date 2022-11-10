<!-- Navbar -->
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center   bg-navbar-theme" id="layout-navbar"
  >
  
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  width="25px" height="25px" viewBox="0 0 462.89 462.891" style="enable-background:new 0 0 462.89 462.891;"
                  xml:space="preserve">
                          <g>
                  <g>
                  <path d="M459.375,38.609c0.203-3.941-0.757-7.569-2.752-10.524c-2.986-5.642-8.415-9.074-14.955-9.427
                    c-29.919-1.627-404.524-1.716-420.457-1.716c-4.928,0-9.199,1.711-12.405,4.951C2.108,26.049-1.122,33.3,0.351,41.019
                    c4.134,21.792,6.129,44.811,6.276,72.447c0.005,1.473,0.196,2.902,0.586,4.459c0.848,9.442,7.81,16.369,17.108,16.915
                    c11.527,0.68,76.52,1.366,151.778,2.163c111.228,1.173,249.649,2.635,266.371,4.636c0.776,0.094,1.533,0.142,2.259,0.142
                    c2.393,0,4.662-0.485,6.739-1.442c7.819-2.204,12.243-8.912,11.293-17.242C459.202,91.748,458.094,64.116,459.375,38.609z
                    M424.895,104.014c-28.381-1.062-135.846-1.925-231.741-2.694c-67.648-0.541-131.946-1.061-150.877-1.528
                    c-0.5-16.32-1.736-31.74-3.765-46.819l18.349,0.02c82.601,0.084,324.77,0.333,366.13,0.973
                    C422.792,69.976,423.422,86.449,424.895,104.014z"/>
                  <path d="M459.375,190.699c0.203-3.94-0.757-7.568-2.752-10.529c-2.986-5.642-8.415-9.075-14.955-9.427
                    c-30.062-1.633-416.562-1.716-420.457-1.716c-4.928,0-9.204,1.711-12.405,4.951c-6.698,4.154-9.927,11.408-8.455,19.126
                    c4.134,21.792,6.129,44.811,6.276,72.445c0.005,1.473,0.196,2.904,0.586,4.458c0.848,9.436,7.805,16.361,17.103,16.92
                    c11.532,0.681,76.563,1.361,151.862,2.164c111.195,1.168,249.58,2.63,266.297,4.631c0.776,0.097,1.528,0.143,2.249,0.143
                    c2.402,0,4.667-0.488,6.749-1.442c7.82-2.204,12.243-8.917,11.288-17.24C459.202,243.835,458.094,216.206,459.375,190.699z
                    M424.895,256.099c-28.381-1.062-135.892-1.925-231.822-2.696c-67.616-0.538-131.875-1.056-150.796-1.523
                    c-0.5-16.331-1.736-31.742-3.765-46.826l20.264,0.02c82.162,0.089,323.012,0.333,364.215,0.972
                    C422.792,222.061,423.422,238.534,424.895,256.099z"/>
                  <path d="M459.375,342.785c0.203-3.946-0.757-7.576-2.752-10.532c-2.986-5.637-8.415-9.069-14.955-9.419
                    c-29.874-1.631-404.524-1.712-420.457-1.717c-4.928,0-9.204,1.706-12.405,4.946c-6.698,4.158-9.927,11.41-8.455,19.129
                    c4.134,21.794,6.129,44.812,6.276,72.452c0.005,1.473,0.196,2.904,0.586,4.458c0.848,9.445,7.81,16.361,17.103,16.91
                    c11.537,0.681,76.609,1.371,151.966,2.163c111.147,1.178,249.481,2.641,266.193,4.642c0.776,0.091,1.528,0.132,2.249,0.132
                    c2.397,0,4.667-0.482,6.744-1.433c7.819-2.203,12.243-8.916,11.293-17.244C459.202,395.921,458.094,368.292,459.375,342.785z
                    M424.895,408.189c-28.371-1.057-135.79-1.92-231.652-2.691c-67.692-0.544-132.035-1.066-150.966-1.534
                    c-0.5-16.325-1.736-31.736-3.765-46.828l22.13,0.03c81.738,0.086,321.289,0.335,362.354,0.975
                    C422.792,374.151,423.422,390.624,424.895,408.189z"/>
                </g></g><g></g><g></g><g></g><g>
                  </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
      </svg>
    </a>
  </div>
  
  <!-- <div class="topbar-heading">
    <h6>Hi blogger, welcome to dblog blog system</h6>
  </div> -->
  
 
  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
  
  </div>
  <a href="/logout" class="btn btn-sm btn-primary">logout</a>
  <div class="user-info ms-auto" style="min-width: 100px; text-align:right">
   hi, {{auth()->user() ?auth()->user()->name:''}}
  </div>
</nav>
<!-- / Navbar -->