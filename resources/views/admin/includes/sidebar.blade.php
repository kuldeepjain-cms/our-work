<div id="sidebar" class="sidebar responsive ace-save-state">
	<script type="text/javascript">
		try{ace.settings.loadState('sidebar')}catch(e){}
	</script>
	<!-- /.sidebar-shortcuts -->
	<ul class="nav nav-list">
		<li class="{{ request()->is('admin/dashboard*') ? 'active' : '' }}">
			<a href="{{ url('admin/dashboard') }}">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Dashboard </span>
			</a>

			<b class="arrow"></b>
		</li>
		<li class="{{ request()->is('admin/client*') ? 'active' : '' }}">
			<a href="{{ url('admin/client') }}">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Client </span>
			</a>

			<b class="arrow"></b>
		</li>
		<li class="{{ request()->is('admin/portfolio') ? 'active' : '' }} ||  {{ request()->is('admin/portfolio/add') ? 'active' : '' }} || {{ request()->is('admin/portfolio/edit/*') ? 'active' : ''}}">
			<a href="{{ url('admin/portfolio') }}">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Portfolio </span>
			</a>

			<b class="arrow"></b>
		</li>
		<li class="{{ request()->is('admin/portfolio/sortindex*') ? 'active' : '' }}">
			<a href="{{ url('admin/portfolio/sortindex') }}">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Portfolio index </span>
			</a>

			<b class="arrow"></b>
		</li>
		<li class="{{ request()->is('admin/accesstoken*') ? 'active' : '' }}">
			<a href="{{ url('admin/accesstoken') }}">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> AccessToken </span>
			</a>

			<b class="arrow"></b>
		</li>
		<li class="{{ request()->is('admin/category*') ? 'active' : '' }}">
			<a href="{{ url('admin/category') }}">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Category </span>
			</a>

			<b class="arrow"></b>
		</li>
		<li class="{{ request()->is('admin/technology*') ? 'active' : '' }}">
			<a href="{{ url('admin/technology') }}">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Technology </span>
			</a>

			<b class="arrow"></b>
		</li>
		<li class="{{ request()->is('admin/tags*') ? 'active' : '' }}">
			<a href="{{ url('admin/tags') }}">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Tag </span>
			</a>

			<b class="arrow"></b>
		</li>
		<li class="{{ request()->is('admin/server*') ? 'active' : '' }}">
			<a href="{{ url('admin/server') }}">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Server </span>
			</a>

			<b class="arrow"></b>
		</li>
		<li class="{{ request()->is('admin/themes*') ? 'active' : '' }}">
			<a href="{{ url('admin/themes') }}">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Themes </span>
			</a>

			<b class="arrow"></b>
		</li>
		<li class="{{ request()->is('admin/packages*') ? 'active' : '' }}">
			<a href="{{ url('admin/packages') }}">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Packages </span>
			</a>

			<b class="arrow"></b>
		</li>
		<li class="{{ request()->is('admin/payment-methods*') ? 'active' : '' }}">
			<a href="{{ url('admin/payment-methods') }}">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Payments Methods </span>
			</a>

			<b class="arrow"></b>
		</li>
	</ul><!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>