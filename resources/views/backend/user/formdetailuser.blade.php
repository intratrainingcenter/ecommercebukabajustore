<div style="margin-bottom: 10px;" class="col-4">
<img src="{{ asset('storage/imageuser'.'/'.$userdetail->avatar) }}">
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