

<nav id="sidebar">
    <div class="sidebar-header">
        <h3>...</h3>
    </div>

    <ul class="list-unstyled components">
        <li>
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li>
            <a href="#bookSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Books</a>
            <ul class="collapse list-unstyled" id="bookSubmenu">
                <li>
                    <a href="#">Add New Book</a>
                </li>
                <li>
                    <a href="#">Book List</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#bookIssueSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Book Issue</a>
            <ul class="collapse list-unstyled" id="bookIssueSubmenu">
                <li>
                    <a href="#">Issue A Book</a>
                </li>
                <li>
                    <a href="#">Books Issued</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Return</a>
        </li>
        <li class="active">
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
        <li>
            <a href="#publisherSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Publisher</a>
            <ul class="collapse list-unstyled" id="publisherSubmenu">
                <li>
                    <a href="{{ route('publisher.create') }}">Add New Publisher</a>
                </li>
                <li>
                    <a href="{{ url('/publisher/') }}">Peblisher List</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#authorSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Author</a>
            <ul class="collapse list-unstyled" id="authorSubmenu">
                <li>
                    <a href="#">Add New Author</a>
                </li>
                <li>
                    <a href="#">Author List</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">About</a>
        </li>
        <li>
            <a href="#">Contact</a>
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