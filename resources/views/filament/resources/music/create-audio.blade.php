<div>


  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.52.0/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>  
 

  <form wire:submit.prevent="simpan">

  <div class="form-control w-full">
      <label class="label">
        <span class="label-text">Title</span>
       
      </label>
      <input type="text" wire:model="judul" placeholder="Type here" class="input input-bordered w-full max-w-md" />
      @error('judul') <span class="error">{{ $message }}</span> @enderror
     
  </div>
  
  <div class="form-control w-full max-w-md">
      <label class="label">
        <span class="label-text">Creator</span>
       
      </label>
      <select class="select select-bordered" wire:model="creator_id">
        <option value="">Pilih Creator</option>
       @foreach($creators as $creator)
        <option value="{{ $creator->id }}">{{ $creator->name }}</option>
       @endforeach
      </select>   
      @error('creator_id') <span class="error">{{ $message }}</span> @enderror
  </div>



    <div class="form-control w-full max-w-md">
      <label class="label">
        <span class="label-text">Artis</span>
       
      </label>
      <select class="select select-bordered" wire:model="artis_id">
        <option value="">Pilih Artis</option>
       @foreach($artists as $art)
        <option value="{{ $art->id }}">{{ $art->name }}</option>
       @endforeach
      </select>   

      @error('artis_id') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="form-control w-full max-w-md">
      <label class="label">
        <span class="label-text">Album</span>
       
      </label>
      <select class="select select-bordered" wire:model="album_id">
        <option value="">Pilih Album</option>
       @foreach($albums as $album)
        <option value="{{ $album->id }}">{{ $album->name }}</option>
       @endforeach
      </select> 
      
      @error('album_id') <span class="error">{{ $message }}</span> @enderror
    </div>

  
  <div class="form-control w-full max-w-md"
      x-data="{ isUploading: false, progress: 0 }"
      x-on:livewire-upload-start="isUploading = true"
      x-on:livewire-upload-finish="isUploading = false"
      x-on:livewire-upload-error="isUploading = false"
      x-on:livewire-upload-progress="progress = $event.detail.progress"
  >
      <label class="label">
        <span class="label-text">Audio</span>
       
      </label>
      <input type="file" class="file-input file-input-bordered file-input-warning w-full max-w-md"  wire:model="audio" />
      @error('audio') <span class="error">{{ $message }}</span> @enderror  
      
      <!-- Progress Bar -->
        <div x-show="isUploading">
          <progress max="100" x-bind:value="progress"></progress>
      </div>

  </div>



  <div class="form-control w-full max-w-md">
    <label class="label">
      <span class="label-text">Thumbnail</span>
     
    </label>
    <input type="file" class="file-input file-input-bordered file-input-warning w-full max-w-md"  wire:model="thumbnail" />
    @error('thumbnail') <span class="error">{{ $message }}</span> @enderror   
</div>

<div class="form-control w-full">
  <label class="label">
    <span class="label-text">Detail</span>
   
  </label>
  <textarea wire:model="detail" id="" cols="30" rows="10" class="input input-bordered w-full max-w-md"></textarea>
 
</div>

<div class="form-control max-w-sm my-2">
  <label class="">  
    <input type="checkbox" checked="checked" class="checkbox checkbox-success" />
    <span class="label-text">Premium</span>
  </label>
</div>

  
  <br>
  
  <button type="submit" class="btn bg-warning btn-wide" wire:click="simpan">Simpan</button> 
  
    
    
  </form>



</div>



