<aside style="background-color: black" class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <h4 class="brand-text text-center font-weight-bold "> WISDOMEUP</h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info text-center">
          <a href="#" class=" ml-5 ">{{Auth:: user()->name ?? ""}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


               <li class="nav-item
           
          @if(Route::is('orders')) 
       
             
            menu-open


           @endif
          
          ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa-solid fa-layer-group"></i>
              <p>
               Manage Order
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('orders')}}" class="nav-link 
                @if(Route::is('orders')) 
       
             
                active


                 @endif
                
                ">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Orders</p>

                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('categories.create')}}" class="nav-link
                
                @if(Route::is('categories.create')) 
       
             
                active


                 @endif
                
                ">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Create</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item
           
          @if(Route::is('categories.*')) 
       
             
            menu-open


           @endif
          
          ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa-solid fa-layer-group"></i>
              <p>
               Manage Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link 
                @if(Route::is('categories.index')) 
       
             
                active


                 @endif
                
                ">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Categories</p>

                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('categories.create')}}" class="nav-link
                
                @if(Route::is('categories.create')) 
       
             
                active


                 @endif
                
                ">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Create</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item 
         @if(Route::is('products.*')) 
       
         menu-open


         @endif
          
          ">
            <a href="#" class="nav-link 
            
            @if(Route::is('products.*')) 
       
             
                menu-open


            @endif
            
            ">
              <i class="nav-icon fa-solid fa-dolly"></i>
              <p>
               Manage Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link 
                @if(Route::is('products.index')) 
       
                active
       
       
                @endif ">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('products.create')}}" class="nav-link
                 
                @if(Route::is('products.create')) 
       
                active
       
       
                @endif
                
                ">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Create</p>
                </a>
              </li>

            </ul>
          </li>
            <li class="nav-item  
            @if(Route::is('brands.*')) 
       
             
            menu-open


           @endif
            
            ">
                <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Manage Brand
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('brands.index')}}" class="nav-link 
                        @if(Route::is('brands.index')) 
       
             
                        active
      
      
                         @endif
                        ">
                            <i class="far fa-circle nav-icon "></i>
                            <p>Brands</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('brands.create')}}" class="nav-link 
                        @if(Route::is('brands.create')) 
       
             
                        active
      
      
                         @endif
                        
                        
                        ">
                            <i class="far fa-circle nav-icon "></i>
                            <p>Create</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item  
            @if(Route::is('sellers.*')) 
       
             
            menu-open


           @endif
            
            ">
                <a href="#" class="nav-link ">
                    <i class="nav-icon fa-solid fa-user"></i>
                    <p>
                        Manage Seller
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('sellers.index')}}" class="nav-link
                        @if(Route::is('sellers.index')) 
       
             
                        active
      
      
                         @endif
                        
                        ">
                            <i class="far fa-circle nav-icon "></i>
                            <p>Sellers</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('sellers.create')}}" class="nav-link
                        
                        @if(Route::is('sellers.create')) 
       
             
                        active
      
      
                        @endif
                        
                        
                        ">
                            <i class="far fa-circle nav-icon "></i>
                            <p>Create</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item 
            @if(Route::is('sliders.*')) 
       
             
            menu-open


           @endif
            
            
            ">
              <a href="#" class="nav-link ">
                  <i class="nav-icon fa-solid fa-user"></i>
                  <p>
                      Manage Sliders
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a  href="{{route('sliders.index')}}" class="nav-link 
                      
                      
                      @if(Route::is('sliders.index')) 
       
             
                      active
    
    
                      @endif
                      
                      ">
                          <i class="far fa-circle nav-icon "></i>
                          <p>Sliders</p>
                      </a>
                  </li>
                  <li class="nav-item ">
                      <a  href="{{route('sliders.create')}}" class="nav-link itemnav
                      
                      @if(Route::is('sliders.create')) 
       
             
                      active
    
    
                       @endif
                      
                      ">
                          <i class="far fa-circle nav-icon "></i>
                          <p>Create</p>
                      </a>
                  </li>

              </ul>
          </li>
          <li class="nav-item
           
          @if(Route::is('banners.*')) 
       
             
            menu-open


           @endif
          
          
          
          ">
            <a href="#" class="nav-link ">
                <i class="nav-icon fa-solid fa-user"></i>
                <p>
                    Banners
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a  href="{{route('banners.index')}}" class="nav-link
                    
                    @if(Route::is('banners.index')) 
       
             
                    active
  
  
                    @endif
                    
                    
                    ">
                        <i class="far fa-circle nav-icon "></i>
                        <p>Banners</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a  href="{{route('banners.create')}}" class="nav-link itemnav 
                     
                    @if(Route::is('banners.create')) 
       
             
                    active
  
  
                     @endif
                    
                    
                    
                    ">
                        <i class="far fa-circle nav-icon "></i>
                        <p>Create</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item 
        
        
        @if(Route::is('places.*')) 
       
             
            menu-open


           @endif
        
        ">
          <a href="#" class="nav-link ">
              <i class="nav-icon fa-solid fa-user"></i>
              <p>
                 Manage  Place
                  <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a  href="{{route('places.index')}}" class="nav-link 
                  
                  @if(Route::is('places.index')) 
       
             
                  active


                   @endif
                  
                  
                  ">
                      <i class="far fa-circle nav-icon "></i>
                      <p>Places</p>
                  </a>
              </li>
              <li class="nav-item ">
                  <a  href="{{route('places.create')}}" class="nav-link itemnav
                  

                  @if(Route::is('places.create')) 
       
             
                  active


                  @endif
                  
                  
                  
                  ">
                      <i class="far fa-circle nav-icon "></i>
                      <p>Create</p>
                  </a>
              </li>

          </ul>
      </li>
      <li class="nav-item 
        
        
      @if(Route::is('places.*')) 
     
           
          menu-open


         @endif
      
      ">
        <a href="#" class="nav-link ">
            <i class="nav-icon fa-solid fa-user"></i>
            <p>
               Manage  Collection
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a  href="{{route('collections.index')}}" class="nav-link 
                
                @if(Route::is('collections.index')) 
     
           
                active


                 @endif
                
                
                ">
                    <i class="far fa-circle nav-icon "></i>
                    <p>Collections</p>
                </a>
            </li>
            <li class="nav-item ">
                <a  href="{{route('collections.create')}}" class="nav-link itemnav
                

                @if(Route::is('collections.create')) 
     
           
                active


                @endif
                
                
                
                ">
                    <i class="far fa-circle nav-icon "></i>
                    <p>Create</p>
                </a>
            </li>

        </ul>
    </li>


            {{-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Simple Link
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li> --}}
        </ul>



        <a title="Logout" class="btn btn-secondary btn-sm mt-5 w-100" href="{{route('admin.logout')}}"><i   class="fa-solid fa-arrow-right-from-bracket mt-2"></i> LOGOUT</a>  



      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
