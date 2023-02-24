{{-- <x-app-layout>
   
</x-app-layout> --}}
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')
      
        @include('admin.header')
        @include('admin.body')
        
    </div>
   
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>