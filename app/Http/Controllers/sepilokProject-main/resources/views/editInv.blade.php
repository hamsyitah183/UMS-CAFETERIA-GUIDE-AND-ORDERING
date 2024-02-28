<x-app-layout>

<section class="inv">

    <div class="editForm">
                    <form method="POST">
                        @csrf
                        @method('PUT')
                        
                        <h3>Edit Details: </h3>
                        <label for="invName">Name:</label><br>
                            <div class="invName">
                            <input type="text" id="invName" name="invName" placeholder="Name" value="{{$inventory->invName}}"><br>
                        </div>
                        <div class="invDesc">
                            <label for="invDesc">Description:</label><br>
                            <input type="text" id="invDesc" name="invDesc" placeholder="Description" value="{{$inventory->invDesc}}"><br>
                        </div>
                        
                        <div class="invQuant">
                            <label for="quantityChange">Quantity Change:</label>
                                <select name="quantityChange" id="quantityChange">
                                    <option value="add">Add</option>
                                    <option value="subtract">Subtract</option>
                                </select>
                            <label for="invQuant">Quantity:</label>
                            <input type="number" id="invQuant" name="invQuant" min="0" max="500">
                            
                        </div>
                        <div class="invCategory">
                            <label for="invCategory">Category:</label>
                            <select name="invCategory" id="invCategory">
                                @foreach(['Raw Materials', 'Component Tools', 'Finished Goods', 'MRO Goods'] as $invCategory)
                                    <option value="{{ $invCategory }}" {{ $inventory->invCategory === $invCategory ? 'selected' : '' }}>
                                        {{ ucfirst($invCategory) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button>Save Changes</button>
                    </form>
    </div>

    </section>
</x-app-layout>
