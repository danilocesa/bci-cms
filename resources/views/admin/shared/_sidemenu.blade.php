<div class="menu_section">
  <!-- <h3>General</h3> -->
  <ul class="nav side-menu">
    <li><a href="{{ url('web-admin') }}"><i class="fa fa-home"></i> Home</a></li>
    @permission('view-page')
    <li><a href="{{ url('web-admin/page-management') }}"><i class="fa fa-edit"></i> Page Management</a></li>
    @endpermission
    @permission('view-user')
    <li><a href="{{ url('web-admin/user-management') }}"><i class="fa fa-desktop"></i> User Management </a></li>
    @endpermission
    @permission('view-logs')
    <li><a href="{{ url('web-admin/audit-trail') }}"><i class="fa fa-table"></i> Audit Trail</a></li>
    @endpermission
  </ul>
</div>
              