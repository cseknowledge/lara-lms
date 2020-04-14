
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>...</h3>
    </div>

    <ul class="list-unstyled components">
        @if(Auth::user()->member_type == "Super Admin" || Auth::user()->member_type == "Admin") 
            <li class="{{ Request::segment(1) == '' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="{{ Request::segment(1) == 'book' ? 'active' : '' }}">
                <a href="#bookSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Books</a>
                <ul class="collapse list-unstyled" id="bookSubmenu">
                    <li>
                        <a href="{{ route('book.create') }}">Add New Book</a>
                    </li>
                    <li>
                        <a href="{{ route('book.list') }}">Book List</a>
                    </li>
                </ul>
            </li>     
            <li class="{{ Request::segment(1) == 'bookSuggest' ? 'active' : '' }}">
                <a href="{{ route('bookSuggest.list') }}">Book Suggest</a>
            </li> 
            <li class="{{ Request::segment(1) == 'bookIssued' ? 'active' : '' }}">
                <a href="#bookIssueSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Book Issue</a>
                <ul class="collapse list-unstyled" id="bookIssueSubmenu">
                    <li>
                        <a href="{{ route('bookIssued.create') }}">Issue A Book</a>
                    </li>
                    <li>
                        <a href="{{ route('bookIssued.list') }}">Books Issued</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::segment(1) == 'bookReturn' ? 'active' : '' }}">
                <a href="{{ route('bookReturn.create') }}">Return</a>
            </li>
            <li class="{{ Request::segment(1) == 'user' ? 'active' : '' }}">
                <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Users</a>
                <ul class="collapse list-unstyled" id="userSubmenu">
                    <li>
                        <a href="{{ route('user.create') }}">Add New User</a>
                    </li>
                    <li>
                        <a href="{{ route('user.list') }}">User List</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::segment(1) == 'publisher' ? 'active' : '' }}">
                <a href="#publisherSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Publisher</a>
                <ul class="collapse list-unstyled" id="publisherSubmenu">
                    <li>
                        <a href="{{ route('publisher.create') }}">Add New Publisher</a>
                    </li>
                    <li>
                        <a href="{{ route('publisher.list') }}">Peblisher List</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::segment(1) == 'author' ? 'active' : '' }}">
                <a href="#authorSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Author</a>
                <ul class="collapse list-unstyled" id="authorSubmenu">
                    <li>
                        <a href="{{ route('author.create') }}">Add New Author</a>
                    </li>
                    <li>
                        <a href="{{ route('author.list') }}">Author List</a>
                    </li>
                </ul>
            </li>
        @else 
            <li class="{{ Request::segment(1) == '' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="{{ Request::segment(1) == 'bookReview' ? 'active' : '' }}">
                <a href="#reviewSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Book Review</a>
                <ul class="collapse list-unstyled" id="reviewSubmenu">
                    <li>
                        <a href="{{ route('bookReview.create') }}">Add New Review</a>
                    </li>
                    <li>
                        <a href="{{ route('bookReview.list') }}">Review List</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::segment(1) == 'bookSuggest' ? 'active' : '' }}">
                <a href="#suggestSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Book Suggest</a>
                <ul class="collapse list-unstyled" id="suggestSubmenu">
                    <li>
                        <a href="{{ route('bookSuggest.create') }}">Add New Suggest</a>
                    </li>
                    <li>
                        <a href="{{ route('bookSuggest.list') }}">Suggest List</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::segment(1) == 'wishlist' ? 'active' : '' }}">
                <a href="#wishlistSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Wishlist</a>
                <ul class="collapse list-unstyled" id="wishlistSubmenu">
                    <li>
                        <a href="{{ route('wishlist.create') }}">Add New Book Wish</a>
                    </li>
                    <li>
                        <a href="{{ route('wishlist.list') }}">Book Wish List</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::segment(1) == 'bookIssued' ? 'active' : '' }}">
                <a href="#bookIssueSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Book Issue</a>
                <ul class="collapse list-unstyled" id="bookIssueSubmenu">
                    <li>
                        <a href="{{ route('bookIssued.create') }}">Issue A Book</a>
                    </li>
                    <li>
                        <a href="{{ route('bookIssued.list') }}">Books Issued</a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>

    <ul class="list-unstyled CTAs">
        <li>
            <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
        </li>
    </ul>
</nav>