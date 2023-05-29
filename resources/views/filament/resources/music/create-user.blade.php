<link href="https://cdn.jsdelivr.net/npm/daisyui@2.52.0/dist/full.css" rel="stylesheet" type="text/css" />
{{-- <script src="https://cdn.tailwindcss.com"></script> --}}


<div class="form-control w-full">
    <label class="label">
      <span class="label-text">Title</span>
     
    </label>
    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-md" />
   
</div>

<div class="form-control w-full max-w-xs">
    <label class="label">
      <span class="label-text">Creator</span>
     
    </label>
    <select class="select select-bordered">
      <option disabled selected>Pick one</option>
      <option>Star Wars</option>
      <option>Harry Potter</option>
      <option>Lord of the Rings</option>
      <option>Planet of the Apes</option>
      <option>Star Trek</option>
    </select>   
  </div>

<div class="form-control w-full max-w-xs">
    <label class="label">
      <span class="label-text">Audio</span>
     
    </label>
    <input type="file" class="file-input file-input-bordered file-input-warning w-full max-w-xs" />   
</div>

<br>

<button class="btn bg-warning btn-wide" wire:click="simpan">Button</button>


