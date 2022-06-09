@auth
@if(Auth::check() && Auth::user()->role=='user')
<ul class="navbar-nav me-auto">
    <div class="input-group mb-4">
        <div class="input-group-text p-0">
            <select class="form-select form-select-lg shadow-none bg-light border-0">
                <option>All</option>
                @foreach ($categories as $category)
                <option>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <input type="text" class="form-control" placeholder="Search Here">
        <button class="input-group-text shadow-none px-4 btn-primary">
            <i class="fa fa-search"></i>
        </button>
    </div>        
</ul>
@endif
@endauth