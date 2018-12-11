<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{ route('admin.home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ route('post.index') }}"><i class="glyphicon glyphicon-hourglass"></i> Post</a>
            </li>
            <li>
                <a href="{{ route('comment.index') }}"><i class="
                    glyphicon glyphicon-envelope"></i> Comments</a>
            </li>
            @can('posts.author',Auth::user())
            <li>
                <a href="{{ route('user.index') }}"><i class="glyphicon glyphicon-user"></i> Authors</a>
            </li>
            @endcan
            @can('posts.category',Auth::user())
            <li>
                <a href="{{ route('category.index') }}"><i class="glyphicon glyphicon-th-list"></i> Category</a>
            </li>
            @endcan
            @can('posts.tag',Auth::user())
            <li>
                <a href="{{ route('tag.index') }}"><i class="glyphicon glyphicon-tags"></i> Tag</a>
            </li>
            @endcan
            @can('posts.permission',Auth::user())
            <li>
                <a href="{{ route('permission.index') }}"><i class="glyphicon glyphicon-user"></i> Permission</a>
            </li>
            @endcan
            @can('posts.role',Auth::user())
            <li>
                <a href="{{ route('role.index') }}"><i class="glyphicon glyphicon-user"></i> Role</a>
            </li>
            @endcan
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
