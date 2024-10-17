{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<x-backpack::menu-dropdown title="Add-ons" icon="la la-puzzle-piece">
    <x-backpack::menu-dropdown-header title="Authentication" />
    <x-backpack::menu-dropdown-item title="Users" icon="la la-user" :link="backpack_url('user')" />
    <x-backpack::menu-dropdown-item title="Roles" icon="la la-group" :link="backpack_url('role')" />
    <x-backpack::menu-dropdown-item title="Permissions" icon="la la-key" :link="backpack_url('permission')" />
</x-backpack::menu-dropdown>
@includeWhen(class_exists(\Backpack\DevTools\DevToolsServiceProvider::class), 'backpack.devtools::buttons.sidebar_item')


<x-backpack::menu-item title="Countries" icon="la la-flag" :link="backpack_url('country')" />
<x-backpack::menu-item title="Users" icon="la la-eraser" :link="backpack_url('user')" />
<x-backpack::menu-item title="Designations" icon="la la-vcard-o" :link="backpack_url('designation')" />

<x-backpack::menu-item title="Cities" icon="la la-atlas" :link="backpack_url('city')" />

<x-backpack::menu-item title="Employee types" icon="la la-dice-one" :link="backpack_url('employee-type')" />
<x-backpack::menu-item title="Employees" icon="la la-user-circle" :link="backpack_url('employee')" />

<x-backpack::menu-item title="Foreign tours" icon="la la-file-import" :link="backpack_url('foreign-tour')" />
