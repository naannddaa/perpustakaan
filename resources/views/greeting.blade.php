<p> Hello {{ $name }}</p>


@if($user->isAdmin())
    <p>Admin Panel</p>
@elseif ($user->isEditor())
    <p>Editor Panel</p>
@else
    <p>user panel</p>
@endif

@switch($status)
    @case('pending')
        <p>Order pending</p>
        @break
    @case('completed')
    <p>order completed</p>
    @break
    @default
        <p>Unknow status</p>
@endswitch


{{-- acra 12 nomer 3 --}}
@if($user->isAdmin())
    <p>Admin Panel</p>
@elseif($user->isEditor())
    <p>Editor Panel</p>
@else
    <p>User Panel</p>
@endif

@switch($status)
    @case('pending')
        <p>Order Pending</p>
        @break
    @case('completed')
        <p>Order Completed</p>
    @break
    @default
<p> Unknown Status</p>
@endswitch
