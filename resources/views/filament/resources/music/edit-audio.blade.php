<div >
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.52.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>  
  
  
        <h3 class="text-xl">Update Data</h3>
      <form method="post" action="{{ route('music.update', $record->id) }}"
       class="card"
      
      enctype="multipart/form-data">
      @csrf
      <div class="form-control w-full">
          <label class="label">
          <span class="label-text">Titles</span>
          
          </label>
          <input type="text" name="judul" placeholder="Type here" class="input input-bordered w-full max-w-md"
          value="{{ $record->title }}"
          />
          @error('judul') <span class="error">{{ $message }}</span> @enderror
      
      </div>
      
      <div class="form-control w-full max-w-md">
          <label class="label">
          <span class="label-text">Creator</span>
          
          </label>
          <select class="select select-bordered" name="creator_id">
          <option value="">Pilih Creator</option>
          @foreach($creators as $creator)
          <option value="{{ $creator->id }}"
            {{ ($record->creator_id == $creator->id)? 'selected': '' }}
            >{{ $creator->name }}</option>
          @endforeach
          </select>   
          @error('creator_id') <span class="error">{{ $message }}</span> @enderror
      </div>
  
  
  
      <div class="form-control w-full max-w-md">
          <label class="label">
          <span class="label-text">Artis</span>
          
          </label>
          <select class="select select-bordered" name="artis_id">
          <option value="">Pilih Artis</option>
          @foreach($artists as $art)
          <option value="{{ $art->id }}"
            {{ ($record->artist_id == $art->id)? 'selected': '' }}
            >{{ $art->name }}</option>
          @endforeach
          </select>   
  
          @error('artis_id') <span class="error">{{ $message }}</span> @enderror
      </div>
  
      <div class="form-control w-full max-w-md">
          <label class="label">
          <span class="label-text">Album</span>
          
          </label>
          <select class="select select-bordered" name="album_id">
          <option value="">Pilih Album</option>
          @foreach($albums as $album)
          <option value="{{ $album->id }}"
            {{ ($record->album_id == $album->id)? 'selected': '' }}
            >{{ $album->name }}</option>
          @endforeach
          </select> 
          
          @error('album_id') <span class="error">{{ $message }}</span> @enderror
      </div>

      <div class="form-control w-full max-w-md">
        <label class="label">
        <span class="label-text">Gendre</span>
        
        </label>
        <select class="select select-bordered" name="gendre_id">
        <option value="">Pilih Gendre</option>
        @foreach($gendres as $gendre)
        <option value="{{ $gendre->id }}"
          {{ ($record->gendre_id == $gendre->id)? 'selected': '' }}
          >{{ $gendre->name }}</option>
        @endforeach
        </select> 
        
        @error('gendre_id') <span class="error">{{ $message }}</span> @enderror
    </div>
  
      
      <div class="form-control w-full max-w-md"
          
      >
          <label class="label">
          <span class="label-text">Audio</span>
          
          </label>
          <input type="file" class="file-input file-input-bordered file-input-warning w-full max-w-md"  name="audio" />
          @error('audio') <span class="error text-danger">{{ $message }}</span> @enderror  
          
        
  
      </div>
  
  
  
      
    </div>
  
    <div class="form-control w-full">
      <label class="label">
      <span class="label-text">Detail</span>
      
      </label>
      <textarea wire:model="detail" id="" cols="30" rows="10" class="input input-bordered w-full max-w-md"></textarea>
  
    </div>
  
    <div class="form-control max-w-sm my-2">
      <label class="">  
      <input type="checkbox" name="is_premium" checked="checked" class="checkbox checkbox-success" />
      <span class="label-text">Premium</span>
      </label>
    </div>
  
      
      <br>
      
      <button type="submit" class="btn bg-warning btn-wide">Simpan</button> 
      
      
      
      </form>
  
  
  
  </div>
  
  
  
  