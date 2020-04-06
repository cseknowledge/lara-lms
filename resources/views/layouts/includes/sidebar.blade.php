
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>...</h3>
    </div>

    <ul class="list-unstyled components">
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
                    <a href="#">Add New User</a>
                </li>
                <li>
                    <a href="#">User List</a>
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
    </ul>

    <ul class="list-unstyled CTAs">
        <li>
            <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
        </li>
        <li>
            <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
        </li>
    </ul>
</nav>