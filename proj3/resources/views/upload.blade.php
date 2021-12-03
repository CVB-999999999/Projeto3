<h1>Upload File</h1>
<form action="upload" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="arquivo>"> <br> <br>
    <button type="submit" >UploadFile</button>
</form