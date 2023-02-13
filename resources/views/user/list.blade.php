@foreach ($users as $user)
    <p>This is user {{ $user->id }}</p>
    <p>This is user {{ $user->username }}</p>
    <p>This is user {{ $user->password }}</p>
    <p>----------------</p>
@endforeach