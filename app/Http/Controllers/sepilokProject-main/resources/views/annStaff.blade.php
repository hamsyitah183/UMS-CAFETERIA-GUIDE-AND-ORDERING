<x-app-layout>

<section class="annStaffview">
    <div class="annStaff">

            <ul>
                <li>           
                    <h2>Announcement Slideshow</h2>
                    <button class="open-button btn btn-secondary" onclick='openForm()'>Add Announcement</button>                        
                </li>
            </ul>
                    
        <table class = "annTable">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            @foreach($sliders as $sliders)
            <tr>
                <td>{{$sliders->annID}}</td>
                <td>{{$sliders->annTitle}}</td>
                <td>{{$sliders->annDesc}}</td>
                <td>
                    <img src="{{ asset($sliders->annImg) }}" style="width: 70px; height: 70px;" alt="Slider" >
                </td>
                <td>{{$sliders->annStatus == '0' ? 'Visibile':'Hidden'}}</td>
                <td>
                    <a href="{{ route('editAnn', ['sliders' => $sliders->annID]) }}" class="btn btn-secondary">Edit</a>                            
                    <form action="/deleteAnn/{{$sliders->annID}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
                
            </tr>

             @endforeach
                            
                            
        </table>
    </div>

    <div class="annCreate inv-form" id="annForm">
                <form method="POST" action="{{route('annStaff.annPost')}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    
                    <h3>New Announcement</h3>

                    <div class="annTitle">
                        <label for="annTitle">Announcement Title:</label><br>
                        <input type="text" id="annTitle" name="annTitle" placeholder="Title" ><br>
                        <x-input-error :messages="$errors->get('annTitle')" class="mt-2" />
                    </div>

                    <div class="annDesc">
                        <label for="annDesc">Announcement Description:</label><br>
                        <input type="text" id="annDesc" name="annDesc" placeholder="Description" class="form-control"><br>
                    </div>

                    <div class="annImg">
                        <label for="annImg">Image:</label><br>
                        <input type="file" id="annImg" name="annImg" class="form-control"><br>
                    </div>
                    
                    <div class="annStatus">
                        <label for="annStatus">Status:</label>
                        <input type="checkbox" id="annStatus" name="annStatus">
                        Checked=Hidden, Unchecked=Visible
                    </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                        <button type="button" class="btn btn-warning" onclick='closeForm()'>Cancel</button>
                </form>
            </div>

</section>

    <script>
        function openForm() {
        document.getElementById("annForm").style.display = "block";
        }

        function closeForm() {
        document.getElementById("annForm").style.display = "none";
        }
    </script>

</x-app-layout>