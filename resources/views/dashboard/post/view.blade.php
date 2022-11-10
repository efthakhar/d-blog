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
                          <h5 class="mb-0">view  post details</h5>
                      </div>
                      <div class="card-body">
                        

                        <form class="col-md-7" >
                           

                            <?php

                              function Childs($subcats,$post_cats)
                              {      

                                        foreach($subcats as $subcat)
                                        {
                                          ?>
                                            <div class="ms-4">
                                            <input disabled  type="checkbox" name="categories[]" 
                                            id="{{$subcat->category_name}}" value="{{$subcat->id}}"
                                            {{ in_array($subcat->id ,$post_cats) ? 'checked':'' }}
                                            >
                                            <label  for="{{$subcat->category_name}}">
                                              {{$subcat->category_name}}
                                            </label>
                                              {{Childs($subcat->subcats,$post_cats)}}
                                          </div>

                                          <?php
                                        }                      
                                  
                              }

                            ?>
                            

                            <!-- post date -->
                            <div class="mb-3">
                                <label class="form-label" for="date">date</label>
                                <input disabled type="date" class="form-control" id="date"   name="date" 
                                   value="{{date( "Y-m-d", strtotime($post->date))}}"                   
                                />
                            </div>
                            

                            <!-- post title -->
                            <div class="mb-3">
                                <label class="form-label" for="title">title</label>
                                <input disabled type="text" class="form-control" id="title" 
                                        placeholder="example title..." name="title" 
                                        value="{{$post->title}}"                   
                                />
                            </div>

                            <!-- post slug -->
                            <div class="mb-3">
                                <label class="form-label" for="slug">slug</label>
                                <input disabled type="text" class="form-control" id="slug" 
                                        placeholder="example slug..." name="slug"
                                        value="{{$post->slug}}"                    
                                />
                            </div>

                             <!-- Category -->
                             <div style="user-select:none">
                              <div class="bg-dark p-2 text-white catBoxHeader">
                                 <label >Categories</label>
                              </div>
                              
                              <div class="p-3 border border-dark  catBox">
                                    @foreach($categories as $category)
                                        <div>
                                          <input disabled  type="checkbox" name="categories[]"
                                            id="{{$category->category_name}}" value="{{$category->id}}"
                                            {{ in_array( $category->id ,$post_cats) ? 'checked':'' }}
                                          > 
                                          <label for="{{$category->category_name}}">  
                                             {{$category->category_name}}
                                          </label>  
                                          {{Childs($category->subcats,$post_cats) }} 

                                        </div>  
                                    @endforeach
                              </div>
                            </div>
                             <!-- Tags-->
                             <div style="user-select:none">
                              <div class="bg-dark p-2 text-white tagBoxHeader">
                                 <label >Tags</label>
                              </div>
                              
                              <div class="p-3 border border-dark  tagBox">
                                    @foreach($tags as $tag)
                                          <div>
                                          <input disabled  type="checkbox" name="tags[]"
                                          id="{{$tag->id}}" value="{{$tag->id}}"
                                          {{ in_array( $tag->id ,$post_tags) ? 'checked':'' }}
                                          > 
                                          <label for="{{$tag->id}}">{{$tag->tag_name}}</label>
                                          </div>
                                    @endforeach
                              </div>
                            </div>

                            <!-- Post image -->
                            <div class="mb-3">
                              <label class="form-label" for="post_thumbnail">Post Thumbnail</label>
                          
                              @if($post->post_thumbnail_url)                  
                              <img src="{{$post->post_thumbnail_url}}" alt="" 
                                style="width:100px;height:80px; margin:10px; display:block">
                              @endif
                            </div>

                            <!-- meta tag keywords -->
                            <div class="mb-3">
                                <label class="form-label" for="meta_keywords">Keywords ( seo meta keywords )</label>
                                @error('meta_keywords')
                                <p class="alert alert-danger">{{ $message }}</p>
                                @enderror  
                                <input disabled type="text" class="form-control" id="meta_keywords" 
                                        placeholder="keywords...." name="meta_keywords"
                                        value="{{$post->meta_keywords}}"                    
                                />
                            </div>

                            <!-- meta tag description -->
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-message">meta description ( seo  meta tag )</label>
                              <textarea disabled name="meta_description" class="form-control" placeholder="write short description of this post......" 
                              >{{$post->meta_description}}</textarea>
                            </div>


                            <!-- post excerpt -->
                            <div class="mb-3">
                                <label class="form-label" for="excerpt">Excerpt</label>
                                @error('excerpt')
                                <p class="alert alert-danger">{{ $message }}</p>
                                @enderror  
                                <textarea disabled name="excerpt" class="form-control" placeholder="excerpt of this post......" 
                                >{{$post->excerpt}}</textarea>
                            </div>

                            <!-- Post Content -->
                            <div class="mb-3 ">
                              <label class="form-label" for="excerpt">Content</label>
                              <textarea disabled id="editor" name="content" class="description form-control">{{$post->content}}</textarea>
                            </div>

                            <!-- featured or breaking -->

                            <div class="mb-3">
                              <input disabled type="checkbox" name="featured" class="form" id="featured"
                                {{$post->featured==1? 'checked':''}}
                              > 
                              <label for="featured"> is featured ?</label>
                            </div>
                            <div class="mb-3">
                              <input disabled type="checkbox" name="breaking" class="form" id="breaking"
                              {{$post->breaking==1? 'checked':''}}
                              > 
                              <label for="breaking"> is breaking ?</label>
                            </div>

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
    @vite('resources/assets/js/post.js')
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