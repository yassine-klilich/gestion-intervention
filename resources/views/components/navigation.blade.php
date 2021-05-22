<aside class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
	<nav>
		<ul class="nav nav-pills flex-column mb-auto">
			<li class="nav-item"><a href="client" class="nav-link {{ (request()->is('client')) ? 'active' : '' }}">Gestion Client</a></li>
			<li class="nav-item"><a href="manager" class="nav-link {{ (request()->is('manager')) ? 'active' : '' }}">Gestion Manager</a></li>
			<li class="nav-item"><a href="employee" class="nav-link {{ (request()->is('employee')) ? 'active' : '' }}">Gestion Employee</a></li>
			<li class="nav-item"><a href="intervention" class="nav-link {{ (request()->is('intervention')) ? 'active' : '' }}">Gestion Intervention</a></li>
		</ul>
	</nav>
</aside>