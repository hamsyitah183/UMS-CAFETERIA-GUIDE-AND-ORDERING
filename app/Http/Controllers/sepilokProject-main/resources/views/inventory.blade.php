@php
    $counter = 1;
@endphp

<x-app-layout>

    <section class="inv">
        <div class="inv_page">

            <div class="inv_table">

                <h2>SEPILOK ORANGUTAN REHABILITATION CENTER</h2>
                <div class="inv_list" >
                    <table class="tableInvx">
                    <h2>Inventory</h2>
                    <ul>
                        <li>
                        <button class="open-button" onclick='openForm()'>Create New +</button>        
                        </li>
                    </ul>                
                        <tr>
                            <th>No</th>
                            <th>Items Name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Edit</th>

                        </tr>

                            <!-- List of Inventory Items -->
                            @foreach($inventory as $inventory)
                        <tr>
                            <td>{{$counter++}}</td>
                            <td>{{$inventory->invName}}</td>
                            <td>{{$inventory->invDesc}}</td>
                            <td>{{$inventory->invQuant}}</td>
                            <td>{{$inventory->invCategory}}</td>
                            <td>
                                <a href="{{ route('editInv', ['inventory' => $inventory->invID]) }}" class="btn btn-secondary">Edit</a>                            
                                <form action="/deleteInv/{{$inventory->invID}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>

            <div class="inv-form" id="invForm">
                <form method="POST" action="{{route('inventory.invPost')}}">
                    @csrf
                    @method('POST')
                    
                    <h3>Inventory Details: </h3>
                    <label for="invName">Name:</label><br>
                        <div class="invName">
                        <input type="text" id="invName" name="invName" placeholder="Name" value="{{old('invName')}}"><br>
                        <x-input-error :messages="$errors->get('invName')" class="mt-2" />
                    </div>
                    <div class="invDesc">
                        <label for="invDesc">Description:</label><br>
                        <input type="text" id="invDesc" name="invDesc" placeholder="Description" value="{{old('invDesc')}}"><br>
                        <x-input-error :messages="$errors->get('invDesc')" class="mt-2" />
                    </div>
                    <div class="invQuant">
                        <label for="invQuant">Quantity:</label>
                        <input type="number" id="invQuant" name="invQuant" min="0" max="500" value="{{old('invQuant')}}">
                        <x-input-error :messages="$errors->get('invQuant')" class="mt-2" />
                    </div>
                    <div class="invCategory">
                        <label for="invCategory">Category:</label>
                        <select name="invCategory" id="invCategory">
                            <option value="Raw Materials">Raw Materials</option>
                            <option value="Components Tools">Component Tools</option>
                            <option value="Finished Goods">Finished Goods</option>
                            <option value="MRO Goods">MRO Goods</option>
                        </select>
                        <x-input-error :messages="$errors->get('invCategory')" class="mt-2" />
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" onclick='closeForm()' class="btn btn-warning">Cancel</button>
                </form>
            </div>
        </div>


    </section>

    <script>
        function openForm() {
        document.getElementById("invForm").style.display = "block";
        }

        function closeForm() {
        document.getElementById("invForm").style.display = "none";
        }
    </script>

</x-app-layout>