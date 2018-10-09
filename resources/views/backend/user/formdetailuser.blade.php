<div style="margin-bottom: 10px;width:300px;height:300px;" class="col-4">
<img style="width:300px;height:300px;" src=@if ($userdetail->avatar == null)"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkgjWUXXQEfziJEK2lotHcpB9hXpYSJJtLJfaHWOh78M2XEOka" @elseif($userdetail->kode_jabatan === "member"){{$userdetail->avatar_original}} @else"{{ asset('storage/imageuser'.'/'.$userdetail->avatar) }}"@endif>
</div>
<div class="col-8">
<address>
  <strong>User Name : </strong><br>
  <div class="custom-dd dd">
       <div class="dd-list">
           <div class="dd-item">
               <div class="dd-handle">
                 <p >{{ $userdetail->name }}</p>
               </div>
           </div>
       </div>
   </div>
        <strong>Position : </strong><br>
        <div class="custom-dd dd">
             <div class="dd-list">
                 <div class="dd-item">
                     <div class="dd-handle">
                       <p>{{ $userdetail->kode_jabatan }}</p>
                     </div>
                 </div>
             </div>
         </div>
        <strong>E-mail : </strong><br>
        <div class="custom-dd dd">
             <div class="dd-list">
                 <div class="dd-item">
                     <div class="dd-handle">
                       <p>{{ $userdetail->email }}</p>
                     </div>
                 </div>
             </div>
         </div>
        <strong>Address : </strong><br>
        <div class="custom-dd dd">
             <div class="dd-list">
                 <div class="dd-item">
                     <div class="dd-handle">
                       <p>{{ $userdetail->alamat }}</p>
                     </div>
                 </div>
             </div>
         </div>
        <strong>Gender : </strong><br>
        <div class="custom-dd dd">
             <div class="dd-list">
                 <div class="dd-item">
                     <div class="dd-handle">
                       <p>{{ $userdetail->jenis_kelamin }}</p>
                     </div>
                 </div>
             </div>
         </div>
        <strong>Phone Number : </strong><br>
        <div class="custom-dd dd">
             <div class="dd-list">
                 <div class="dd-item">
                     <div class="dd-handle">
                       <p>{{ $userdetail->no_telp }}</p>
                     </div>
                 </div>
             </div>
         </div>
        <strong>Status : </strong><br>
        <div class="custom-dd dd">
             <div class="dd-list">
                 <div class="dd-item">
                     <div class="dd-handle">
                       <p>{{ $userdetail->status }}</p>
                     </div>
                 </div>
             </div>
         </div>
    </address>
</div>
