<div class="p-5">
    <input wire:model="search" type="text" placeholder="Search users..."/>
</div>

    <div class="p-5">
 
<?//dd($users);?>
 
    <ul>
        @foreach($users as $user)
            <li>{{ $user->cate_desc }}</li>
        @endforeach
    </ul>

 

 



 

    </div>

