<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a>Company Name</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a>CP</a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Clients</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <x-menu-item link="{{ route('clients.index') }}">Client List</x-menu-item>
                    <x-menu-item link="{{ route('clients.create') }}">Add Client</x-menu-item>
                </ul>
            </li>

            <li class="menu-header">Billings</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fas fa-file-invoice"></i><span>Billing</span></a>
                <ul class="dropdown-menu">
                    <x-menu-item link="{{ route('billing.index') }}">Billing List</x-menu-item>
                    <x-menu-item link="{{ route('billing.create') }}">Add Billing</x-menu-item>
                </ul>
            </li>
        </ul>
    </aside>
</div>
