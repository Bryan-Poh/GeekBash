<div class="side-menu" id="admin-side-menu">
  <aside class="menu m-t-30 m-l-10">
    <p class="menu-label">
      General
    </p>
    <ul class="menu-list">
      <li><a href="{{route('manage.dashboard')}}" class="">Dashboard</a></li>
    </ul>

    <p class="menu-label">
      Content
    </p>
    <ul class="menu-list">
      <li><a href="#" class="#">Blog Posts</a></li>
    </ul>

    <p class="menu-label">
      Administration
    </p>
    <ul class="menu-list">
      <li><a href="{{ route('manage.users.index') }}" class="#">Manage Users</a></li>
      <li>
        <a class="has-submenu" href="{{ route('manage.permissions.index') }}">Roles &amp; Permissions</a>
        <ul class="submenu">
          <li><a href="#" class="">Roles</a></li>
          <li><a href="#" class="">Permissions</a></li>
        </ul>
      </li>
    </ul>
  </aside>
</div>