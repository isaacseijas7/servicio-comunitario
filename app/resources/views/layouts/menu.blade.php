<li class="{{ Request::is('configurations*') ? 'active' : '' }}">
    <a href="{!! route('configurations.index') !!}"><i class="fa fa-edit"></i><span>Configurations</span></a>
</li>

<li class="{{ Request::is('people*') ? 'active' : '' }}">
    <a href="{!! route('people.index') !!}"><i class="fa fa-edit"></i><span>People</span></a>
</li>

<li class="{{ Request::is('students*') ? 'active' : '' }}">
    <a href="{!! route('students.index') !!}"><i class="fa fa-edit"></i><span>Students</span></a>
</li>

<li class="{{ Request::is('tutors*') ? 'active' : '' }}">
    <a href="{!! route('tutors.index') !!}"><i class="fa fa-edit"></i><span>Tutors</span></a>
</li>

<li class="{{ Request::is('inscriptions*') ? 'active' : '' }}">
    <a href="{!! route('inscriptions.index') !!}"><i class="fa fa-edit"></i><span>Inscriptions</span></a>
</li>

<li class="{{ Request::is('companies*') ? 'active' : '' }}">
    <a href="{!! route('companies.index') !!}"><i class="fa fa-edit"></i><span>Companies</span></a>
</li>

<li class="{{ Request::is('downloadables*') ? 'active' : '' }}">
    <a href="{!! route('downloadables.index') !!}"><i class="fa fa-edit"></i><span>Downloadables</span></a>
</li>

