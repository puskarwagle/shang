<h2>Unapproved Users</h2>
<table>
    <thead>
        <tr>
            <th>Email</th>
            <th>Password</th>
        </tr>
    </thead>
    <tbody>
        @foreach($unapprovedUsers as $unapproveduser)
        <tr>
            <td>{{ $unapproveduser->email }}</td>
            <td>{{ $unapproveduser->password }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h2>Approved Users</h2>
<table>
    <thead>
        <tr>
            <th>Email</th>
            <th>Password</th>
        </tr>
    </thead>
    <tbody>
        @foreach($approvedUsers as $approveduser)
        <tr>
            <td>{{ $approveduser->email }}</td>
            <td>{{ $approveduser->password }}</td>
        </tr>
        @endforeach
    </tbody>
</table>