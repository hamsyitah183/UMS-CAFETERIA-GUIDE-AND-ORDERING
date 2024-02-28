<x-app-layout>

<section>
<div class="editForm" id="annForm">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <h3>Edit Slider</h3>

                    <div class="annTitle">
                        <label for="annTitle">Announcement Title:</label><br>
                        <input type="text" id="annTitle" name="annTitle" placeholder="Title" value="{{$sliders->annTitle}}"><br>
                        <x-input-error :messages="$errors->get('annTitle')" class="mt-2" />
                    </div>

                    <div class="annDesc">
                        <label for="annDesc">Announcement Description:</label><br>
                        <input type="text" id="annDesc" name="annDesc" placeholder="Description" class="form-control" value="{{$sliders->annDesc}}"><br>
                    </div>

                    <div class="annImg">
                        <label for="annImg">Image:</label><br>
                        <input type="file" id="annImg" name="annImg" class="form-control"><br>
                        <img src="{{ asset($sliders->annImg) }}" style="width: 50px; height: 50px;" alt="Slider" >
                    </div>
                    
                    <div class="annStatus">
                        <label for="annStatus">Status:</label>
                        <input type="checkbox" id="annStatus" name="annStatus" {{$sliders->annStatus == '1' ? 'checked':'' }}>
                        Checked=Hidden, Unchecked=Visible
                    </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>

</section>


</x-app-layout>