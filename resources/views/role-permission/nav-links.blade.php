<div class="flex flex-wrap items-center space-x-4 space-y-4 md:space-x-20 mt-10">
    @can('view role')
        <a href="{{ url('roles') }}" class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 shadow-sm">Roles</a>
    @endcan
    @can('view permission')
        <a href="{{ url('permissions') }}" class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 shadow-sm">Permissions</a>
    @endcan
    @can('view user')
        <a href="{{ url('users') }}" class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 shadow-sm">Users</a>
    @endcan
    @can('view job')
        <a href="{{ url('alumni/jobs') }}" class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 shadow-sm">Jobs</a>
    @endcan
</div>
