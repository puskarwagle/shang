<!DOCTYPE html>
<html>
  @include('includes.head')
  
  <body>
    @include('includes.header')
    <div class="page-container">
      @include('..contents.informatics', ['component' => 'comp-dataCenterServices'])
    </div>
    @include('includes.contact')
    @include('includes.footer')

  </body>
</html>