<style>
  /* Alert styles */
  .alert {
    padding: 1rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
    position: relative;
  }

  .alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
  }

  .alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
  }


  /* Close button styles */
  .close {
    position: absolute;
    top: 0;
    right: 0;
    padding: 0.75rem 1.25rem;
    color: inherit;
    background-color: transparent;
    border: 0;
    cursor: pointer;
  }
</style>

@if ($errors->any())
  <div class="alert alert-danger" role="alert">
    {{-- <strong>Whoops!</strong> There were some problems with your input.<br><br> --}}
    <ul>
      @foreach ($errors->all() as $error)
      <p>{{ $error }}</p>
      @endforeach
    </ul>
    <button type="button" class="close" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
    {{ $message }}
    <button type="button" class="close" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if ($message = Session::get('error'))
  <div class="alert alert-danger" role="alert">
    {{ $message }}
    <button type="button" class="close" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif


<script type="text/javascript">
  
      // Close button functionality
  document.querySelectorAll('.close').forEach(function(closeButton) {
    closeButton.addEventListener('click', function() {
      this.parentNode.style.display = 'none';
    });
  });
</script>