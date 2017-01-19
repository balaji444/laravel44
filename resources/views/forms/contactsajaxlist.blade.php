
                    
<table class="table" border="1">
    <head style="bold">
    <tr>
        <td>Name</td>
        <td>Email</td>
        <td>Subject</td>
        <td>Message</td>
        <td>Actions</td>
    </tr>
        
    </head>
                    @foreach($contacts as $contact)
                    <tr><td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->subject }}</td>
                    <td>{{ $contact->message }}</td>
                    <td> <a href="contactsview/{{ $contact->id }}">View</a> | Edit | Delete </td>
                    </tr>
                    @endforeach
                    
</table>
<span style="float:right;">{{ $contacts->links() }}</span>                
