<nav class="navbar  navbar-expand-md p-0">
    
    <div class="collapse navbar-collapse" id="searchbar">

    <form class="form-inline" method="POST" action="{{ route('do_search')}}" autocomplete="off">
        {{ csrf_field() }}
        <input class="form-control mr-2 w-75" type="search" placeholder="Search" aria-label="Search" name="text">
        <button class="btn btn-outline-success my-2" type="submit"><i class="fas fa-search"></i></button>
    </form>
        
    </div>   
</nav>